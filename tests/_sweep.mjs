import { boot, ROOT } from './php-node.mjs';
import { forms, encode } from './forms.mjs';
import { readdirSync, writeFileSync } from 'node:fs';
const { php, server, logs } = await boot();
const pages = readdirSync(ROOT + 'src').filter((f) => f.endsWith('.php') && !['db.php','vars.php','top.php','body.php','css.php','css_reports.php','notices.php','save_image.php'].includes(f));
const results = [];
const dec = (b) => new TextDecoder().decode(b);
const only = process.argv[2];
for (const p of pages) {
  if (only && !p.includes(only)) continue;
  const t0 = Date.now();
  const r = await server.handle({ path: p });
  const html = dec(r.bytes); const l = logs();
  const row = { page: p, get: r.status, getLen: html.length, getFatal: l.fatal, getSql: l.sql, posts: [] };
  const fs = forms(html).filter((f) => f.method === 'POST' && /run=1/.test(f.action));
  for (const f of fs.slice(0, 3)) {
    for (const all of (process.env.DEFAULTS_ONLY ? [false] : [false, true])) {
      console.error("  post", f.action, all);
      const [path, search = ''] = f.action.split(/(?=\?)/);
      const rr = await server.handle({ path, search, method: 'POST', headers: { 'content-type': 'application/x-www-form-urlencoded' }, body: new TextEncoder().encode(encode(f, all)) });
      const h = dec(rr.bytes); const ll = logs();
      row.posts.push({ action: f.action, all, status: rr.status, len: h.length, text: h.replace(/<style[\s\S]*?<\/style>|<script[\s\S]*?<\/script>/gi, '').replace(/<[^>]+>/g, ' ').replace(/\s+/g, ' ').length, fatal: ll.fatal, sql: ll.sql.slice(0, 600) });
    }
  }
  row.ms = Date.now() - t0;
  row.q = php.fileExists('/tmp/wz_qcount.log') ? Math.max(...php.readFileAsText('/tmp/wz_qcount.log').trim().split('\n').map(Number)) : 0; if (row.q) php.unlink('/tmp/wz_qcount.log');
  results.push(row);
  const loop = row.posts.some((x) => x.fatal && /output limit|query limit/.test(x.fatal)); if (loop) row.posts.forEach((x) => { if (x.fatal && /output limit|query limit/.test(x.fatal)) x.fatal = ""; });
  const bad = row.getFatal || row.getSql || row.posts.some((x) => x.fatal || x.sql || x.status !== 200)
  console.log((bad ? "BAD " : loop ? "LOOP" : "ok  ") + p, row.get, row.getLen, row.posts.map((x) => `${x.status}/${x.text}`).join(' '), row.ms + 'ms', 'q=' + row.q, bad ? JSON.stringify([row.getFatal, row.getSql, row.posts.map((x) => [x.fatal, x.sql])]).slice(0, 900) : '');
}
writeFileSync('/tmp/wz-sweep.json', JSON.stringify(results, null, 1));
process.exit(0);
