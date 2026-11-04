(function (W) {
  'use strict';
  const f = W.field, esc = W.escape;
  const categories = [['c', 'Encounter', 30, 1, 0], ['t', 'Trap', 10, 1, 0], ['u', 'Contents', 0, 3, 0], ['l', 'Loot', 10, 10, 5]];
  const fields = categories.flatMap(([key, label, chance, max, low]) => [f(`x_${key}_c`, `${label} chance (%)`, 'number', { value: chance, min: 0, max: 100 }), f(`x_${key}_c_min`, `${label} minimum rolls`, 'number', { value: 1, min: 1, max: 25 }), f(`x_${key}_c_max`, `${label} maximum rolls`, 'number', { value: max, min: 1, max: 25 }), f(`x_${key}_c_low`, `${label} chance reduction per roll (%)`, 'number', { value: low, min: 0, max: 100 })]);
  W.register('area', 'Random Area', 'Create a custom area with encounters, traps, contents and loot from a Wizardawn data file. Paste your data or choose an original data file.', [f('x_area', 'Area name', 'text'), f('x_level', 'Level (0 = any)', 'number', { value: 0, min: 0, max: 100 }), f('n', 'Areas', 'number', { value: 1, min: 1, max: 1000 }), ...fields, f('x_rigged_chance', 'Loot trapped (%)', 'number', { value: 25, min: 0, max: 100 }), f('x_adjust', 'Adjust loot for encounter level', 'checkbox', { value: 1 }), f('x_adjustment', 'Extra loot chance per encounter level (%)', 'number', { value: 5, min: 0, max: 100 }), f('x_code', 'Terrain code (optional)', 'text'), f('x_main', 'Main encounters (tab separated data rows)', 'textarea', { rows: 2 }), f('x_main_chance', 'Main encounters appear (%)', 'number', { value: 50, min: 0, max: 100 }), ...W.dataFields], p => {
    const text = W.dataText(p);
    if (!text) return '<p>Choose an original data file or paste your custom data.</p>';
    const data = W.parseData(text, p), main = String(p.x_main || '').split(/\r?\n/).filter(s => s.trim()).map(s => s.trim().replace(/ {3}/g, '\t').split('\t'));
    const sample = pool => pool.length ? W.pick(pool) : '';
    const setting = (key, suffix, fallback, min = 0, max = 100) => W.number(p[`x_${key}_c${suffix}`], fallback, min, max);
    const attempts = (key, maxDefault) => { const max = setting(key, '_max', maxDefault, 1, 25); return W.rng.int(Math.min(max, setting(key, '_min', 1, 1, 25)), max); };
    const rolls = (key, defaults, adjustment, callback, count, reductionKey = key) => {
      const low = setting(reductionKey, '_low', defaults[1]);
      for (let i = 0, n = count ?? attempts(key, defaults[2]); i < n; i++) if (W.d(100) <= setting(key, '', defaults[0]) - i * low + adjustment) callback();
    };
    const results = W.range(W.number(p.n ?? p.x_areas, 1, 1, 1000)).map(number => {
      const entries = [], contents = [], loot = [];
      let enemyLevel = 0, trapped = false;
      rolls('c', [30, 0, 1], 0, () => {
        let enemy;
        if (main.length && W.d(100) <= W.number(p.x_main_chance, 50, 0)) {
          const row = W.pick(main); enemy = { name: row[0], description: row[4] || '', level: +row[2] || 0 };
        } else enemy = W.dataEnemy(data);
        if (enemy) { entries.push('<b>ENCOUNTER:</b> ' + esc(enemy.name + (enemy.description ? ' - ' + enemy.description : ''))); enemyLevel = enemy.level; }
      });
      // The original applies the loot reduction to contents too; keep this
      // behavior for existing data files and option sets.
      rolls('u', [0, 5, 3], 0, () => { const value = sample(data.decorations); if (value) contents.push(value); }, undefined, 'l');
      if (contents.length) entries.push('<b>CONTENTS:</b> ' + contents.map(esc).join('; '));
      const adjustment = (p.x_adjust ?? '1') === '1' ? enemyLevel * W.number(p.x_adjustment, 5, 0) : 0;
      rolls('l', [10, 5, 10], adjustment, () => { const value = W.dataTreasure(data); if (value) loot.push(value); });
      if (loot.length) {
        trapped = W.d(100) <= W.number(p.x_rigged_chance, 25, 0) && data.traps.length > 0;
        entries.push('<b>LOOT:</b> [' + esc(sample(data.containers)) + (trapped ? ' - TRAPPED: ' + esc(sample(data.traps)) : '') + ']: ' + loot.map(esc).join('; '));
      }
      rolls('t', [10, 0, 1], 0, () => { const value = sample(data.traps); if (value) entries.push('<b>ROOM TRAP:</b> ' + esc(value)); }, Math.max(0, attempts('t', 1) - Number(trapped)));
      return `<section class="area"><h3>${number}.</h3>${entries.join('<br>')}</section>`;
    });
    const result = `<h2>${esc(p.x_area || '')}${+p.x_level > 0 ? ' — Level ' + W.number(p.x_level, 1) : ''}</h2>` + results.join('');
    W.storage.set('random-area', { options: p, html: result });
    return result;
  });
})(window.WZ);
