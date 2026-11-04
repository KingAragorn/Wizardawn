// Runs the original PHP pages on PHP 7.4 (WebAssembly) against the SQLite data.
import test from 'node:test';
import assert from 'node:assert/strict';
import { readdirSync } from 'node:fs';
import { boot, ROOT } from './php-node.mjs';
import { forms, encode } from './forms.mjs';

const { server, logs } = await boot();
const dec = (b) => new TextDecoder().decode(b);
const text = (h) => h.replace(/<style[\s\S]*?<\/style>|<script[\s\S]*?<\/script>/gi, '').replace(/<[^>]+>/g, ' ').replace(/\s+/g, ' ');
const post = async (page, all = true) => {
  const html = dec((await server.handle({ path: page })).bytes);
  const f = forms(html).find((x) => x.method === 'POST' && /run=1/.test(x.action));
  assert.ok(f, `${page} has a run form`);
  const [path, search = ''] = f.action.split(/(?=\?)/);
  const r = await server.handle({ path, search, method: 'POST', headers: { 'content-type': 'application/x-www-form-urlencoded' }, body: new TextEncoder().encode(encode(f, all, true)) });
  return { ...r, html: dec(r.bytes) };
};

const SKIP = ['db.php', 'vars.php', 'top.php', 'body.php', 'css.php', 'css_reports.php', 'notices.php', 'save_image.php'];
const pages = readdirSync(ROOT + 'src').filter((f) => f.endsWith('.php') && !SKIP.includes(f));

test('every top-level page renders without PHP or SQL errors', async () => {
  const bad = [];
  for (const p of pages) {
    const r = await server.handle({ path: p });
    const l = logs();
    if (![200, 302].includes(r.status) || l.fatal || l.sql) bad.push(`${p}: ${r.status} ${l.fatal} ${l.sql}`.slice(0, 300));
  }
  assert.deepEqual(bad, []);
});

// tool_bmbs.php is for the post-apocalyptic games. With Mutant Future (or no game) it calls makePAItem()
// with 2 of its 3 arguments, a fatal error on the original PHP 7.4 server as well, so pick Gamma World first.
for (const [page, min, all] of [['tool_brew.php', 2000, true], ['tool_door.php', 2000, true], ['tool_bmbs.php', 2000, true], ['tool_ftown.php', 2000, true]]) {
  test(`${page} generates output`, async () => {
    if (page === 'tool_bmbs.php') await server.handle({ path: 'rpg_gamma.php' });
    const r = await post(page, all);
    if (page === 'tool_bmbs.php') await server.handle({ path: 'rpg_lablord.php' });
    const l = logs();
    assert.equal(l.fatal, '');
    assert.equal(r.status, 200); assert.equal(l.sql, '');
    assert.ok(text(r.html).length > min, `${page}: ${text(r.html).length} chars`);
  });
}

test('the game choice is kept in the session', async () => {
  await server.handle({ path: 'rpg_osric.php' });
  const r = dec((await server.handle({ path: 'index.php' })).bytes);
  assert.match(r, /OSRIC/);
  await server.handle({ path: 'rpg_lablord.php' });
});

// Hex Crawl with no game system posted loops forever on the original server too.
test('a page that loops forever (as on the original server) is stopped', async () => {
  const html = dec((await server.handle({ path: 'tool_hexcrawl.php' })).bytes);
  const f = forms(html).find((x) => /run=1/.test(x.action));
  const r = await server.handle({ path: 'tool_hexcrawl.php', search: '?run=1', method: 'POST', headers: { 'content-type': 'application/x-www-form-urlencoded' }, body: new TextEncoder().encode(encode(f).replace(/x_package=[^&]*/, 'x_package=')) });
  logs();
  assert.equal(r.status, 200);
  assert.match(dec(r.bytes), /Wizardawn stopped this page/);
});
