// Service worker: runs Wizardawn's original PHP pages with PHP 7.4 compiled to
// WebAssembly. Requests for *.php under this site's folder are answered here;
// everything else (images, css, js) comes from the static files as usual.
import { loadWebRuntime } from '@php-wasm/web';
import { PHP, setPhpIniEntries } from '@php-wasm/universal';
import { unpackBundle, installFiles, WzServer, PHP_INI } from './wz-runtime.mjs';

const BASE = new URL('./', self.location.href);
const VERSION = '__BUILD_ID__';
let serverPromise = null;

function boot() {
  if (!serverPromise) {
    serverPromise = (async () => {
      const [runtime, bundle, db] = await Promise.all([
        loadWebRuntime('7.4'),
        fetch(new URL(`php-bundle.bin?v=${VERSION}`, BASE)).then((r) => r.arrayBuffer()),
        fetch(new URL(`wizardawn.sqlite?v=${VERSION}`, BASE)).then((r) => r.arrayBuffer()),
      ]);
      const php = new PHP(runtime);
      await setPhpIniEntries(php, PHP_INI);
      installFiles(php, unpackBundle(bundle), new Uint8Array(db));
      return new WzServer(php);
    })();
    serverPromise.catch(() => { serverPromise = null; });
  }
  return serverPromise;
}

self.addEventListener('install', (e) => { self.skipWaiting(); e.waitUntil(boot().catch(() => {})); });
self.addEventListener('activate', (e) => e.waitUntil(self.clients.claim()));

self.addEventListener('fetch', (event) => {
  const url = new URL(event.request.url);
  if (url.origin !== BASE.origin || !url.pathname.startsWith(BASE.pathname)) return;
  const rel = decodeURIComponent(url.pathname.slice(BASE.pathname.length));
  if (!rel.endsWith('.php')) return;
  event.respondWith(runPhp(event.request, rel, url));
});

async function runPhp(request, rel, url) {
  try {
    const server = await boot();
    const headers = {};
    request.headers.forEach((v, k) => { headers[k] = v; });
    const body = ['GET', 'HEAD'].includes(request.method) ? undefined : new Uint8Array(await request.arrayBuffer());
    const r = await server.handle({ path: rel, search: url.search, method: request.method, headers, body, host: url.host, basePath: BASE.pathname });
    const h = new Headers();
    for (const [k, v] of Object.entries(r.headers)) {
      if (k.toLowerCase() === 'set-cookie') continue;
      for (const x of [].concat(v)) h.append(k, x);
    }
    if (!h.has('content-type')) h.set('content-type', 'text/html; charset=UTF-8');
    if (r.status >= 300 && r.status < 400 && h.has('location')) {
      return Response.redirect(new URL(h.get('location'), url).href, r.status);
    }
    return new Response(r.bytes, { status: r.status, headers: h });
  } catch (e) {
    return new Response(`<h1>Wizardawn could not start</h1><pre>${String(e && e.stack || e).replace(/</g, '&lt;')}</pre>`, { status: 500, headers: { 'content-type': 'text/html' } });
  }
}
