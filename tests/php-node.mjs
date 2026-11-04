// Boots PHP 7.4 (WebAssembly, Node build) with the Wizardawn source and data.
import { loadNodeRuntime } from '@php-wasm/node';
import { PHP, setPhpIniEntries } from '@php-wasm/universal';
import { readFileSync, readdirSync, statSync } from 'node:fs';
import { join, relative } from 'node:path';
import { execFileSync } from 'node:child_process';
import { installFiles, WzServer, PHP_INI, DOCROOT } from '../web/wz-runtime.mjs';

export const ROOT = new URL('..', import.meta.url).pathname;
export function phpFiles() {
  const out = [];
  const walk = (d) => { for (const n of readdirSync(d)) { const f = join(d, n); if (statSync(f).isDirectory()) walk(f); else if (n.endsWith('.php')) out.push([relative(join(ROOT, 'src'), f), readFileSync(f)]); } };
  walk(join(ROOT, 'src'));
  return out;
}
export async function boot() {
  const db = '/tmp/wz-test.sqlite';
  execFileSync('python3', [join(ROOT, 'build/json2sqlite.py'), db]);
  const php = new PHP(await loadNodeRuntime('7.4', { emscriptenOptions: { processId: 1 } }));
  await setPhpIniEntries(php, PHP_INI);
  installFiles(php, phpFiles(), readFileSync(db));
  const server = new WzServer(php, { debug: true });
  const logs = () => {
    const r = {};
    for (const f of ['/tmp/wz_fatal.log', '/tmp/wz_sql_errors.log']) { r[f] = php.fileExists(f) ? php.readFileAsText(f) : ''; if (r[f]) php.unlink(f); }
    return { fatal: r['/tmp/wz_fatal.log'], sql: r['/tmp/wz_sql_errors.log'] };
  };
  return { php, server, logs };
}
