// Builds the static site into dist/.
//   dist/index.html                       invisible loader -> original index.php
//   dist/sw.js                              service worker: runs the PHP pages
//   dist/7_4_33/php_7_4.wasm                PHP 7.4 (WebAssembly)
//   dist/php-bundle.bin                     the original .php sources
//   dist/wizardawn.sqlite                   the database (from data/json)
//   dist/<everything else from src/>        images, css, js, fonts, maps, PDFs ...
import { build } from 'esbuild';
import { execFileSync } from 'node:child_process';
import { cpSync, mkdirSync, readFileSync, readdirSync, rmSync, statSync, writeFileSync, copyFileSync } from 'node:fs';
import { join, relative, dirname } from 'node:path';
import { createHash } from 'node:crypto';
import { packBundle } from '../web/wz-runtime.mjs';

const ROOT = new URL('..', import.meta.url).pathname;
const SRC = join(ROOT, 'src');
const DIST = join(ROOT, 'dist');
rmSync(DIST, { recursive: true, force: true });
mkdirSync(DIST, { recursive: true });

// 1. Static assets and PHP bundle.
const php = [];
const walk = (d) => {
  for (const n of readdirSync(d).sort()) {
    const f = join(d, n); const rel = relative(SRC, f);
    if (statSync(f).isDirectory()) { walk(f); continue; }
    if (n.endsWith('.php')) { php.push([rel, readFileSync(f)]); continue; }
    if (rel === 'index.html') continue; // replaced by the loader
    mkdirSync(join(DIST, dirname(rel)), { recursive: true });
    copyFileSync(f, join(DIST, rel));
  }
};
walk(SRC);
const bundle = packBundle(php);
writeFileSync(join(DIST, 'php-bundle.bin'), bundle);

// 2. Database.
execFileSync('python3', [join(ROOT, 'build/json2sqlite.py'), join(DIST, 'wizardawn.sqlite')], { stdio: 'inherit' });

// 3. PHP runtime (asyncify build only, so one wasm works in every browser).
const wasmSrc = join(ROOT, 'node_modules/@php-wasm/web-7-4/asyncify/7_4_33/php_7_4.wasm');
mkdirSync(join(DIST, '7_4_33'));
copyFileSync(wasmSrc, join(DIST, '7_4_33/php_7_4.wasm'));

const buildId = createHash('sha256').update(bundle).update(readFileSync(join(DIST, 'wizardawn.sqlite'))).digest('hex').slice(0, 12);
const noJspi = {
  name: 'force-asyncify',
  setup(b) {
    b.onResolve({ filter: /^wasm-feature-detect$/ }, () => ({ path: 'wfd', namespace: 'stub' }));
    b.onLoad({ filter: /.*/, namespace: 'stub' }, () => ({ contents: 'export const jspi = async () => false;', loader: 'js' }));
    b.onResolve({ filter: /\.so\?url$|\.dat$|jspi\/php_\d_\d\.js$/ }, () => ({ path: 'empty', namespace: 'empty' }));
    // Only PHP 7.4 (the version the original site ran on) is shipped.
    b.onResolve({ filter: /^@php-wasm\/web-\d-\d$/ }, (a) => (a.path === '@php-wasm/web-7-4' ? undefined : { path: 'empty', namespace: 'empty' }));
    b.onLoad({ filter: /.*/, namespace: 'empty' }, () => ({ contents: 'export default ""; export const dependencyFilename = ""; export const dependenciesTotalSize = 0; export function init() { throw new Error("unused"); }', loader: 'js' }));
  },
};
await build({
  entryPoints: [join(ROOT, 'web/sw.mjs')], bundle: true, format: 'esm', platform: 'browser', target: 'es2022',
  outfile: join(DIST, 'sw.js'), minify: true, legalComments: 'eof', plugins: [noJspi], logLevel: 'warning',
  define: { 'process.env.NODE_ENV': '"production"' },
  external: ['fs', 'path', 'crypto', 'os', 'module', 'url', 'ws', 'worker_threads', 'node:*'],
});
writeFileSync(join(DIST, 'sw.js'), readFileSync(join(DIST, 'sw.js'), 'utf8').replace(/__BUILD_ID__/g, buildId));
// The PHP loader resolves the wasm relative to the script: sw.js lives at the root.

// 4. Loader: index.html starts the service worker and opens the original index.php.
copyFileSync(join(ROOT, 'web/index.html'), join(DIST, 'index.html'));
console.log(`dist/ built (${buildId}); ${php.length} PHP files bundled.`);
