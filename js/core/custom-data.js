(function (W, D) {
  'use strict';
  W.dataFields = [W.field('dataset', 'Original data file (optional)', 'select', { options: [['', 'Use pasted data'], ...Object.keys(D.customFiles).map(k => [k, k.replace('data_', '').toUpperCase()])] }), W.field('data', 'Custom Wizardawn data', 'textarea')];
  W.dataText = p => p.data || p.x_data || D.customFiles[p.dataset] || '';
  W.parseData = function (text, p = {}) {
    const source = String(text).split(/\r?\n/).map(s => s.trim().replace(/ {3}/g, '\t')).join('\n');
    const body = source.split('--BEGIN--')[1] || '';
    const sections = body.split('--END--').map(section => section.split('\n').map(line => line.trim()).filter(Boolean).map(line => line.split('\t')));
    const terrain = String(p.terrain ?? p.x_code ?? p.x_terrain ?? '').toLowerCase();
    const level = W.number(p.level ?? p.x_level, 0, 0);
    const enemies = (sections[0] || []).filter(row => (!terrain || (row[1] || '').toLowerCase().includes(terrain)) && (!level || (+row[2] || 0) <= level)).map(row => ({ name: row[0], terrain: row[1] || '', level: +row[2] || 0, weight: Math.max(0, +row[3] || 0), description: row.slice(4).join('\t') }));
    const cells = i => (sections[i] || []).map(row => row[0]);
    return { enemies, traps: cells(1), decorations: cells(2), containers: cells(3), treasure: sections.slice(4).map(section => section.map(row => ({ text: row[0], weight: Math.max(0, +row[1] || 0), sublist: W.number(row[2], 0, 0, 1000) }))) };
  };
  W.dataEnemy = data => {
    const pool = data.enemies.filter(row => row.weight > 0);
    return pool.length ? W.weighted(pool.map(row => ({ value: row, weight: row.weight }))) : null;
  };
  W.dataTreasure = function (data) {
    let index = 0;
    const visited = new Set(), parts = [];
    while (!visited.has(index)) {
      visited.add(index);
      const pool = (data.treasure[index] || []).filter(row => index > 0 || row.weight > 0);
      if (!pool.length) break;
      // PHP weights the root list and samples sublists uniformly.
      const row = index === 0 ? W.weighted(pool.map(row => ({ value: row, weight: row.weight }))) : W.pick(pool);
      if (row.text) parts.push(row.text);
      if (!row.sublist) break;
      index = row.sublist;
    }
    return parts.join(', ');
  };
})(window.WZ, window.WZ_DATA);
