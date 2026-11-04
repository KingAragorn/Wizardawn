// Direct file:// smoke test. No HTTP server or web runtime is involved.
import assert from 'node:assert/strict';
import { chromium } from 'playwright-core';
import { resolve } from 'node:path';
import { pathToFileURL } from 'node:url';
const browser = await chromium.launch({ executablePath: process.env.CHROME || '/Applications/Google Chrome.app/Contents/MacOS/Google Chrome', headless: true });
try {
  const page = await browser.newPage({ viewport: { width: 1440, height: 1100 } });
  const errors = [], network = [];
  page.on('pageerror', error => errors.push(error.message));
  page.on('console', message => { if (message.type() === 'error') errors.push(message.text()); });
  page.on('request', request => { if (/^https?:/.test(request.url())) network.push(request.url()); });
  const base = pathToFileURL(resolve(import.meta.dirname, '../js/index.html')).href;
  await page.goto(base);
  await page.locator('#menu_center img[src="pics/main.jpg"]').waitFor();
  await page.screenshot({ path: '/tmp/wizardawn-js-home.png', fullPage: true });
  for (const route of ['coins?game=lablord&n=3&seed=smoke', 'names?n_dwarf=1&n=3&seed=smoke', 'basic-spells?listing=Cleric&level=1&run=1', 'brews?game=osric&run=1&seed=smoke', 'items?game=mutfut&n=3&seed=smoke', 'wander?game=lablord&n=3&seed=smoke', 'dungeon-map?width=2&height=2&keyed=1&seed=smoke', 'settlement-map?type=Keep&width=2&height=2&keyed=1&seed=smoke', 'world?width=2&height=2&seed=smoke', 'hex-crawl?run=1&seed=smoke', 'help/about', 'licence/ogl']) {
    await page.goto(base + '#/' + route);
    await page.locator('#menu_center').waitFor();
    await page.evaluate(() => Promise.all([...document.images].map(image => image.complete ? Promise.resolve() : new Promise(resolve => { image.onload = resolve; image.onerror = resolve; }))));
    const broken = await page.locator('img').evaluateAll(images => images.filter(image => !image.naturalWidth).map(image => image.getAttribute('src')));
    assert.deepEqual(broken, [], route);
  }
  await page.goto(base + '#/coins?game=lablord');
  await page.locator('[name="n"]').fill('3');
  await page.locator('#generator-form button[type="submit"]').click();
  await page.locator('#results tbody tr').nth(2).waitFor();
  assert.match(new URL(page.url()).hash, /n=3/);
  assert.match(new URL(page.url()).hash, /game=lablord/);
  const saved = page.url();
  const result = await page.locator('#results').innerHTML();
  await page.reload();
  assert.equal(await page.locator('#results').innerHTML(), result);
  assert.equal(page.url(), saved);
  assert.deepEqual(errors, []);
  assert.deepEqual(network, []);
  console.log('file:// routes, assets, form bookmarks and reloads passed. Screenshot: /tmp/wizardawn-js-home.png');
} finally {
  await browser.close();
}
