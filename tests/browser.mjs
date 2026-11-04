// Browser smoke test: serves dist/ on a temporary local server, opens it in
// headless Chromium, and runs a few generators through the service worker.
// Usage: node tests/browser.mjs [base-url] [--shots dir]
// With no base-url a server is started on 127.0.0.1 and stopped at the end.
import { chromium } from 'playwright-core';
import { createServer } from 'node:http';
import { createReadStream, existsSync, statSync, mkdirSync } from 'node:fs';
import { join, extname } from 'node:path';
import { homedir } from 'node:os';

const ROOT = new URL('..', import.meta.url).pathname;
const args = process.argv.slice(2);
const shotsAt = args.indexOf('--shots');
const shots = shotsAt >= 0 ? args.splice(shotsAt, 2)[1] : null;
let base = args[0];
let server = null;
const TYPES = { '.html': 'text/html; charset=utf-8', '.js': 'text/javascript', '.css': 'text/css', '.wasm': 'application/wasm', '.png': 'image/png', '.jpg': 'image/jpeg', '.gif': 'image/gif', '.woff2': 'font/woff2', '.svg': 'image/svg+xml' };
if (!base) {
  const dist = join(ROOT, 'dist');
  server = createServer((req, res) => {
    let p = decodeURIComponent(new URL(req.url, 'http://x').pathname);
    if (!p.startsWith('/wizardawn/')) { res.writeHead(404); return res.end(); }
    p = join(dist, p.slice('/wizardawn/'.length));
    if (existsSync(p) && statSync(p).isDirectory()) p = join(p, 'index.html');
    if (!p.startsWith(dist) || !existsSync(p)) { res.writeHead(404); return res.end('not found'); }
    res.writeHead(200, { 'content-type': TYPES[extname(p)] || 'application/octet-stream' });
    createReadStream(p).pipe(res);
  });
  await new Promise((ok) => server.listen(0, '127.0.0.1', ok));
  base = `http://127.0.0.1:${server.address().port}/wizardawn/`;
}
const exe = process.env.CHROME || join(homedir(), 'Library/Caches/ms-playwright/chromium-1248/chrome-mac-arm64/Google Chrome for Testing.app/Contents/MacOS/Google Chrome for Testing');
const browser = await chromium.launch({ executablePath: existsSync(exe) ? exe : undefined, headless: true });
let failures = 0;
const check = (ok, msg) => { console.log((ok ? 'ok   ' : 'FAIL ') + msg); if (!ok) failures++; };
try {
  const ctx = await browser.newContext({ viewport: { width: 1280, height: 900 } });
  const page = await ctx.newPage();
  page.on('pageerror', (e) => console.log('  pageerror:', e.message));
  if (shots) mkdirSync(shots, { recursive: true });
  const shot = async (n) => { if (shots) await page.screenshot({ path: join(shots, n), fullPage: false }); };

  await page.goto(base);
  await page.waitForFunction(() => /Ready|failed|support/.test(document.getElementById('status').textContent), null, { timeout: Number(process.env.READY_TIMEOUT || 120000) });
  const status = await page.textContent('#status');
  check(/Ready/.test(status), `launcher: ${status.trim()}`);
  const n = await page.locator('ul.grid a').count();
  check(n > 100, `launcher lists ${n} links`);
  await shot('01-launcher.png');

  await page.goto(base + 'index.php');
  check(/Wizardawn/i.test(await page.title() + await page.textContent('body')), 'original portal index.php renders');
  await shot('02-portal.png');

  // Run generators with their default options and look for real output.
  for (const [tool, shotName, minText] of [['tool_brew.php', '03-brew.png', 2000], ['tool_door.php', null, 2000], ['tool_bmbs.php', '04-mundane-items.png', 2000], ['tool_ftown.php', '05-town.png', 2000]]) {
    if (server && !existsSync(join(ROOT, 'src', tool))) continue;
    await page.goto(base + tool);
    const before = (await page.textContent('body')).length;
    const btn = page.locator('form[action*="run=1"] input[type=submit], form[action*="run=1"] button').first();
    if (!(await btn.count())) { check(false, `${tool}: no run form`); continue; }
    // Like a user would: pick something in every empty drop-down and tick every box.
    await page.evaluate(() => {
      const f = [...document.forms].find((x) => /run=1/.test(x.getAttribute('action') || ''));
      for (const sel of f.querySelectorAll('select')) if (sel.value === '') { const o = [...sel.options].find((x) => x.value !== ''); if (o) sel.value = o.value; }
      for (const c of f.querySelectorAll('input[type=checkbox]')) c.checked = true;
    });
    // The original forms open results in a new tab (target=_blank).
    const [out] = await Promise.all([ctx.waitForEvent('page', { timeout: 30000 }), btn.click()]);
    await out.waitForLoadState('load', { timeout: 180000 });
    const body = await out.textContent('body');
    check(out.url().includes('run=1') && body.length > minText, `${tool}: generated ${body.length} chars (form page ${before})`);
    if (shotName && shots) await out.screenshot({ path: join(shots, shotName) });
    await out.close();
  }
} finally {
  await browser.close();
  if (server) server.close();
}
console.log(failures ? `${failures} failure(s)` : 'all browser checks passed');
process.exit(failures ? 1 : 0);
