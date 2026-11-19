(function (W) {
  'use strict';
  W.escape = value => String(value ?? '').replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
  W.number = (value, fallback, min = 1, max = 100) => {
    if (value === '' || value == null || !Number.isFinite(+value)) return fallback;
    return Math.max(min, Math.min(max, Math.trunc(+value)));
  };
  W.range = (n, start = 1) => Array.from({ length: n }, (_, i) => start + i);
  W.list = (values, cls = '') => `<ol class="${W.escape(cls)}">${values.map(x => `<li>${x}</li>`).join('')}</ol>`;
  W.table = (headings, rows) => `<table class="results-table"><thead><tr>${headings.map(x => `<th scope="col">${W.escape(x)}</th>`).join('')}</tr></thead><tbody>${rows.map(row => `<tr>${row.map(x => `<td>${x}</td>`).join('')}</tr>`).join('')}</tbody></table>`;
  W.field = function (name, label, type = 'number', options = {}) {
    return { name, label, type, ...options };
  };
  // Options the original form only offers for some games (js/data/fieldGames.js, exported from the $x_game conditions in src/tool_*.php).
  W.fieldGames = tool => {
    const map = window.WZ_DATA?.fieldGames || {};
    const file = tool.route != null && Object.keys(map).find(file => W.routeFor(file) === tool.route);
    return file ? map[file] : {};
  };
  W.formFields = (tool, params) => {
    const only = W.fieldGames(tool);
    const slug = tool.fields.some(f => f.name === 'game') ? W.toolGame(tool, params).slug : null;
    return tool.fields.filter(f => { const games = only[f.name] || f.games; return !slug || !games || games.includes(slug); });
  };
  W.form = (tool, params) => `<form id="generator-form"><div class="options">${W.formFields(tool, params).map(f => {
    const value = params[f.name] ?? f.value ?? '';
    let input;
    if (f.type === 'select') input = `<select name="${f.name}" id="opt-${f.name}">${f.options.map(option => {
      const [val, label] = Array.isArray(option) ? option : [option, option];
      return `<option value="${W.escape(val)}"${String(val) === String(value) ? ' selected' : ''}>${W.escape(label)}</option>`;
    }).join('')}</select>`;
    else if (f.type === 'textarea') input = `<textarea name="${f.name}" id="opt-${f.name}" rows="${f.rows || 5}">${W.escape(value)}</textarea>`;
    else if (f.type === 'checkbox') input = `<input type="checkbox" name="${f.name}" id="opt-${f.name}" value="1"${String(value) === '1' ? ' checked' : ''}>`;
    else input = `<input type="${f.type}" name="${f.name}" id="opt-${f.name}" value="${W.escape(value)}"${f.min != null ? ` min="${f.min}"` : ''}${f.max != null ? ` max="${f.max}"` : ''}>`;
    return `<div class="option"><label for="opt-${f.name}">${W.escape(f.label)}</label>${input}</div>`;
  }).join('')}</div><button type="submit">Create</button></form>`;
  const memory = new Map();
  W.storage = {
    get(key, fallback = []) {
      if (memory.has(key)) return memory.get(key);
      try {
        const value = JSON.parse(localStorage.getItem(`wizardawn.${key}`));
        if (value != null) { memory.set(key, value); return value; }
      } catch { /* file:// or private mode may deny storage. */ }
      return fallback;
    },
    set(key, value) {
      memory.set(key, value);
      try { localStorage.setItem(`wizardawn.${key}`, JSON.stringify(value)); }
      catch { /* The in-memory copy remains available. */ }
    }
  };
})(window.WZ);
