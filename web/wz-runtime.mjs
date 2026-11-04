// Shared by the service worker (browser) and the Node tests.
// Turns an HTTP-ish request into a run of the original Wizardawn PHP code.
export const DOCROOT = '/var/www/html';
export const DATADIR = '/wizardawn-data';

// php-bundle.bin: [u32 LE index length][index JSON: [[path, offset, length], ...]][file bytes]
export function unpackBundle(buf) {
  const u8 = new Uint8Array(buf);
  const n = new DataView(u8.buffer, u8.byteOffset, 4).getUint32(0, true);
  const index = JSON.parse(new TextDecoder().decode(u8.subarray(4, 4 + n)));
  const base = 4 + n;
  return index.map(([p, o, l]) => [p, u8.subarray(base + o, base + o + l)]);
}

export function packBundle(entries) {
  let off = 0; const index = [];
  for (const [p, data] of entries) { index.push([p, off, data.length]); off += data.length; }
  const head = new TextEncoder().encode(JSON.stringify(index));
  const out = new Uint8Array(4 + head.length + off);
  new DataView(out.buffer).setUint32(0, head.length, true);
  out.set(head, 4);
  let pos = 4 + head.length;
  for (const [, data] of entries) { out.set(data, pos); pos += data.length; }
  return out;
}

export function installFiles(php, files, sqliteBytes) {
  for (const [p, data] of files) {
    const full = `${DOCROOT}/${p}`;
    php.mkdir(full.slice(0, full.lastIndexOf('/')));
    php.writeFile(full, data);
  }
  php.mkdir(DATADIR);
  php.writeFile(`${DATADIR}/wizardawn.sqlite`, sqliteBytes);
  php.mkdir('/tmp/sessions');
  php.writeFile(`${DATADIR}/guard.php`, GUARD_PHP);
}

// Some generators (e.g. tool_hexcrawl with no game picked) loop forever on the
// original server too. The original was saved by Apache/PHP time limits; in the
// browser we stop a page once it has written OUTPUT_LIMIT bytes.
export const OUTPUT_LIMIT = 40 * 1024 * 1024;
const GUARD_PHP = `<?php
$GLOBALS['__wz_out'] = 0;
ob_start(function ($buf) {
  $GLOBALS['__wz_out'] += strlen($buf);
  if ($GLOBALS['__wz_out'] > ${OUTPUT_LIMIT}) {
    if (empty($GLOBALS['__wz_stop'])) { $GLOBALS['__wz_stop'] = 1; return $buf . "<p><b>Wizardawn stopped this page: the generator produced too much output (it would loop forever on the original server too). Try different options.</b></p>"; }
    trigger_error("Wizardawn output limit reached", E_USER_ERROR);
    return '';
  }
  return $buf;
}, 1048576);
`;

export class WzServer {
  constructor(php, { debug = false } = {}) {
    this.php = php; this.debug = debug; this.sessionId = null; this.queue = Promise.resolve();
  }
  // req: { path: 'tool_names.php', search: '?run=1', method, headers: {}, body: Uint8Array|string }
  handle(req) {
    const p = this.queue.then(() => this._run(req));
    this.queue = p.catch(() => {});
    return p;
  }
  async _run({ path, search = '', method = 'GET', headers = {}, body, host = 'localhost', basePath = '/' }) {
    path = path.replace(/^\/+/, '') || 'index.php';
    const scriptPath = `${DOCROOT}/${path}`;
    if (!this.php.fileExists(scriptPath)) {
      return { status: 404, headers: { 'content-type': 'text/html' }, bytes: new TextEncoder().encode('<h1>Not found</h1>') };
    }
    const h = { ...headers };
    const cookie = this.sessionId ? `PHPSESSID=${this.sessionId}` : '';
    if (cookie) h.cookie = cookie;
    let res;
    try {
    res = await this.php.run({
      scriptPath,
      relativeUri: `/${path}${search}`,
      method,
      headers: h,
      body: typeof body === 'string' ? new TextEncoder().encode(body) : body,
      env: this.debug ? { WZ_DEBUG: '1', ...(process.env.WZ_TRACE ? { WZ_TRACE: '1' } : {}) } : {},
      $_SERVER: {
        DOCUMENT_ROOT: DOCROOT,
        SCRIPT_FILENAME: scriptPath,
        SCRIPT_NAME: `${basePath}${path}`,
        PHP_SELF: `${basePath}${path}`,
        REQUEST_URI: `${basePath}${path}${search}`,
        QUERY_STRING: search.replace(/^\?/, ''),
        HTTP_HOST: host,
        SERVER_NAME: host,
        ...(this.debug ? { WZ_DEBUG: '1', ...(process.env.WZ_TRACE ? { WZ_TRACE: '1' } : {}) } : {}),
      },
    });
    } catch (e) {
      // A PHP fatal error: like Apache with display_errors off, send what was printed.
      if (!e || !e.response) throw e;
      res = e.response;
      res.httpStatusCode = res.text.includes("Wizardawn stopped this page") ? 200 : 500;
    }
    const outHeaders = {};
    for (const [k, v] of Object.entries(res.headers || {})) {
      const val = Array.isArray(v) ? v : [v];
      if (k.toLowerCase() === 'set-cookie') {
        for (const c of val) { const m = /PHPSESSID=([^;]+)/.exec(c); if (m) this.sessionId = m[1]; }
        continue;
      }
      outHeaders[k] = val.join(', ');
    }
    if (!Object.keys(outHeaders).some((k) => k.toLowerCase() === 'content-type')) outHeaders['content-type'] = 'text/html; charset=UTF-8';
    return { status: res.httpStatusCode || 200, headers: outHeaders, bytes: res.bytes };
  }
}

export const PHP_INI = {
  'session.save_path': '/tmp/sessions',
  'memory_limit': '512M',
  'max_execution_time': '0',
  'date.timezone': 'America/Chicago',
  'auto_prepend_file': '/wizardawn-data/guard.php',
};
