import { boot } from './php-node.mjs';
import { forms, encode } from './forms.mjs';
const { server } = await boot();
const CT = 'http://192.168.1.226/';
const txt = (h) => h.replace(/<style[\s\S]*?<\/style>|<script[\s\S]*?<\/script>/gi, '').replace(/<[^>]+>/g, ' ').replace(/\s+/g, ' ').trim();
const dec = (b) => new TextDecoder().decode(b);
for (const t of process.argv.slice(2)) {
  const html = await (await fetch(CT + t)).text();
  const f = forms(html).filter((f) => f.method === 'POST' && /run=1/.test(f.action))[0];
  if (!f) { console.log(t, 'no form'); continue; }
  const body = encode(f, !!process.env.ALL, true);
  const [path, search = ''] = f.action.split(/(?=\?)/);
  const ct = await (await fetch(CT + path + search, { method: 'POST', body, headers: { 'content-type': 'application/x-www-form-urlencoded' } })).text();
  const me = dec((await server.handle({ path, search, method: 'POST', headers: { 'content-type': 'application/x-www-form-urlencoded' }, body: new TextEncoder().encode(body) })).bytes);
  console.log(`${t}\n  CT  ${ct.length}/${txt(ct).length}: ${txt(ct).slice(0, 160)}\n  WZ  ${me.length}/${txt(me).length}: ${txt(me).slice(0, 160)}`);
}
process.exit(0);
