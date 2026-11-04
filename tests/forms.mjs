// Tiny HTML form reader: finds each <form> and its default field values.
export function forms(html) {
  const out = [];
  const re = /<form\b([^>]*)>([\s\S]*?)(?=<\/form>|<form\b|$)/gi;
  let m;
  while ((m = re.exec(html))) {
    const attrs = m[1], inner = m[2];
    const attr = (s, n) => { const r = new RegExp(`\\b${n}\\s*=\\s*(?:'([^']*)'|"([^"]*)"|([^\\s>]+))`, 'i').exec(s); return r ? (r[1] ?? r[2] ?? r[3]) : null; };
    const form = { action: attr(attrs, 'action') || '', method: (attr(attrs, 'method') || 'GET').toUpperCase(), fields: [] };
    for (const t of inner.matchAll(/<(input|select|textarea)\b([^>]*)>/gi)) {
      const tag = t[1].toLowerCase(), a = t[2], name = attr(a, 'name');
      if (tag !== 'input') { const rest = inner.slice(t.index + t[0].length); const end = rest.search(new RegExp(`</${tag}>`, 'i')); t[3] = end < 0 ? rest : rest.slice(0, end); }
      if (!name) continue;
      if (tag === 'input') {
        const type = (attr(a, 'type') || 'text').toLowerCase();
        if (type === 'checkbox') { form.fields.push([name, attr(a, 'value') ?? 'on', 'checkbox', /\bchecked\b/i.test(a)]); continue; }
        if (type === 'radio') { if (/\bchecked\b/i.test(a)) form.fields.push([name, attr(a, 'value') ?? 'on']); else form.fields.push([name, attr(a, 'value') ?? 'on', 'radio']); continue; }
        if (type === 'button' || type === 'image' || type === 'file' || type === 'reset') continue;
        form.fields.push([name, attr(a, 'value') ?? '', type]);
      } else if (tag === 'select') {
        const opts = [...(t[3] || '').matchAll(/<option\b([^>]*)>([^<]*)/gi)];
        const sel = opts.find((o) => /\bselected\b/i.test(o[1])) || opts[0];
        const val = (o) => attr(o[1], 'value') ?? o[2].trim();
        const filled = opts.map(val).find((v) => v !== '');
        if (sel) form.fields.push([name, val(sel), 'select', filled]);
      } else form.fields.push([name, '']);
    }
    out.push(form);
  }
  return out;
}
// Default submission: browser semantics, plus every checkbox ticked when allBoxes is set.
// fill: an empty select gets its first non-empty option (most generators need a choice).
export function encode(form, allBoxes = false, fill = false) {
  const p = new URLSearchParams(); const radios = new Set(form.fields.filter((f) => f[2] === undefined).map((f) => f[0]));
  for (const [n, v, kind, checked] of form.fields) {
    if (kind === 'checkbox') { if (checked || allBoxes) p.append(n, v); continue; }
    if (kind === 'radio') { if (!radios.has(n)) { radios.add(n); p.append(n, v); } continue; }
    if (kind === 'submit') { continue; }
    if (kind === 'select' && v === '' && fill && checked !== undefined) { p.append(n, checked); continue; }
    p.append(n, v);
  }
  const sub = form.fields.find((f) => f[2] === 'submit'); if (sub) p.append(sub[0], sub[1]);
  return p.toString();
}
