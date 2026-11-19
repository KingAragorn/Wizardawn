// Development-only exporter. The browser never loads this file or runs PHP.
// Static editorial HTML is preserved; generator algorithms are written by hand.
import { readFileSync, writeFileSync, mkdirSync, existsSync, copyFileSync, readdirSync } from 'node:fs';
import { resolve, dirname } from 'node:path';
import { boot } from '../tests/php-node.mjs';
const root = resolve(import.meta.dirname, '..');
const out = resolve(root, 'js');
const save = (name, value) => writeFileSync(`${out}/data/${name}.js`, `// Exported from the original Wizardawn sources. See PORTING.md.\nwindow.WZ_DATA = window.WZ_DATA || {};\nwindow.WZ_DATA.${name} = ${JSON.stringify(value)};\n`);
function element(html, id) {
  const open = new RegExp(`<div\\b[^>]*\\bid=["']${id}["'][^>]*>`, 'i').exec(html);
  if (!open) return '';
  const start = open.index + open[0].length;
  const tags = /<\/?div\b[^>]*>/gi; tags.lastIndex = start;
  let depth = 1, tag;
  while ((tag = tags.exec(html))) {
    depth += tag[0].startsWith('</') ? -1 : 1;
    if (!depth) return html.slice(start, tag.index);
  }
  throw new Error(`Unclosed ${id}`);
}
function copyAsset(file) {
  file = file.replaceAll('\\', '/').split(/[?#]/)[0];
  if (/^(https?:|#|mailto:)/.test(file) || !file || file.includes('..')) return;
  const source = `${root}/src/${file}`, target = `${out}/${file}`;
  if (existsSync(source) && !file.endsWith('.php')) {
    mkdirSync(dirname(target), { recursive: true }); copyFileSync(source, target);
  }
}
// Some original styles reference font formats that were never supplied.
// Keep the available original formats so file origins do not request missing files.
const cleanCss = css => css.replace(/src:\s*([^;]+);/g, (whole, sources) => {
  const available = sources.split(',').filter(source => {
    const match = /url\(["']?([^)'"\s]+)/.exec(source);
    return !match || existsSync(`${root}/src/${match[1].split(/[?#]/)[0]}`);
  });
  return available.length ? 'src: ' + available.join(',') + ';' : '';
});
const table = name => {
  const { columns, rows } = JSON.parse(readFileSync(`${root}/data/json/${name}.json`));
  return rows.map(row => Object.fromEntries(columns.map((c, i) => [c.name, row[i]])));
};
save('menus', table('menus').filter(row => !row.mn_inactive));
const { server, logs } = await boot();
async function page(path) {
  const result = await server.handle({ path: '/' + path });
  const log = logs(); if (log.fatal || log.sql) throw new Error(JSON.stringify(log));
  return new TextDecoder().decode(result.bytes);
}
const portal = await page('index.php');
const css = cleanCss(/<style[^>]*>([\s\S]*?)<\/style>/i.exec(portal)[1].replace('<!--', '').replace('-->', ''));
writeFileSync(`${out}/portal.css`, css);
let shell = portal.slice(portal.indexOf('<body>') + 6, portal.lastIndexOf('</body>'));
for (const id of ['menu_left', 'menu_right', 'menu_center', 'div_credit']) {
  shell = shell.replace(element(shell, id), `{{${id}}}`);
}
save('portal', { shell, home: element(portal, 'menu_center'), left: element(portal, 'menu_left'), right: element(portal, 'menu_right'), credits: element(portal, 'div_credit') });
const pages = {};
for (const file of readdirSync(`${root}/src`).filter(f => /^(help_|rpg_|game_)/.test(f) && !/^(game_defaults|game_options)\./.test(f))) {
  const html = await page(file);
  const stylesheet = 'theme-' + file.replace('.php', '.css');
  const style = cleanCss(/<style[^>]*>([\s\S]*?)<\/style>/i.exec(html)[1].replace('<!--', '').replace('-->', ''));
  if (style) { writeFileSync(`${out}/${stylesheet}`, style); for (const m of style.matchAll(/url\(["']?([^)'"\s]+)/g)) copyAsset(m[1]); }
  pages[file] = { stylesheet, center: element(html, 'menu_center'), left: element(html, 'menu_left'), right: element(html, 'menu_right'), credits: element(html, 'div_credit') };
}
for (const file of ['data_help.php']) {
  const html = await page(file); pages[file] = { center: element(html, 'menu_center') };
}
for (const file of readdirSync(`${root}/src/lic`).filter(f => /^lic_.*\.html$/.test(f))) {
  const html = readFileSync(`${root}/src/lic/${file}`, 'utf8');
  pages[`lic/${file}`] = { center: /<body[^>]*>([\s\S]*?)<\/body>/i.exec(html)?.[1] || html };
}
save('pages', pages);
for (const html of [portal, css, JSON.stringify(pages)]) {
  const unescaped = html.replaceAll('\\"', '"');
  for (const m of unescaped.matchAll(/(?:src|href)\s*=\s*["']([^"']+)["']|url\(["']?([^)'"\s]+)/gi)) copyAsset(m[1] || m[2]);
}
for (const file of ['lic_ll.pdf', 'lic_mf.pdf']) copyAsset(`lic/${file}`);
console.log(`Exported portal, ${Object.keys(pages).length} editorial pages, menus and referenced assets.`);
process.exit(0);
