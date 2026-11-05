(function (W, D) {
  'use strict';
  const f = W.field, esc = W.escape;
  const climates = [[1, 'Cold north & warm south'], [2, 'Warm north & cold south'], [10, 'Cold north & south'], [11, 'Warm north & south'], [3, 'Snow'], [4, 'Desert'], [5, 'Forest'], [6, 'Jungle'], [7, 'Tropics'], [8, 'Lifeless'], [12, 'Underworld'], [9, 'Random']];
  const terrainClimate = { 100: 'desert', 101: 'forest', 102: 'hills', 103: 'jungle', 104: 'mountains', 105: 'plains', 106: 'sea', 107: 'arctic', 108: 'swamp', 111: 'desert', 112: 'underworld' };
  const names = new Map([...D.worldmap_legend.map(r => [r.ll_image, r.ll_name]), ...Object.entries(D.worldDetails.legend)]);
  W.worldMap = function (p, crawl = false) {
    const wide = W.number(p.width ?? p.map_wide, crawl ? 2 : 1, 1, 10), high = W.number(p.height ?? p.map_high, crawl ? 2 : 1, 1, 10);
    let climate = +(p.climate ?? p.map_climate ?? (crawl ? 101 : 1));
    const chosenGenre = p.genre ?? p.map_genre ?? 'Fantasy', mixed = chosenGenre === 'Post-Apocalyptic Fantasy';
    if (mixed && climate === 8) climate = 9;
    const genre = climate === 8 && chosenGenre !== 'Empty' ? 'Lunar' : chosenGenre;
    const options = { ...p, climate, lifelessShip: chosenGenre === 'Exodus Spaceship', moonColor: W.pick(['moon', 'mars']) };
    const hull = +p.hull > 0, borderValue = edge => W.number(p['water_' + edge], 0, 0, 2) || (hull ? 2 : 0);
    const cells = [], sites = [], legends = new Set(), blocks = [], latitudes = [];
    const excluded = new Set(D.worldDetails.excluded);
    for (let by = 0; by < high; by++) {
      const baseTerrain = W.worldLatitude(climate, by, high); latitudes.push(baseTerrain);
      for (let bx = 0; bx < wide; bx++) {
        const vertical = by === 0 && borderValue('n') ? 'n' : by === high - 1 && borderValue('s') ? 's' : '';
        const horizontal = bx === 0 && borderValue('w') ? 'w' : bx === wide - 1 && borderValue('e') ? 'e' : '';
        const category = vertical || horizontal ? 'ocean_' + vertical + horizontal : 'land';
        const mountainBorder = baseTerrain === 'moon' || [vertical, horizontal].some(edge => edge && borderValue(edge) === 2);
        const candidates = D.worldmap.filter(t => t.lm_done && t.lm_category === category);
        const tile = W.weighted(candidates.map(t => ({ weight: Math.max(1, +t.lm_amount), value: t })));
        blocks.push(`<img class="hex-grid" src="land/hexes.png" alt="Hex grid" style="position:absolute;z-index:1;left:${10 + bx * 320}px;top:${10 + by * 272}px">`);
        const symbols = tile.lm_hexes.split('_');
        for (let i = 0; i < 80; i++) {
          const row = Math.floor(i / 5), column = i % 5, number = cells.length + 1;
          const [choices, inheritance] = symbols[i].split('^');
          let alternatives = choices.split('|');
          if (!hull) alternatives = alternatives.filter(s => s !== 'T');
          let symbol = hull && alternatives.includes('T') ? 'T' : alternatives.length ? W.pick(alternatives) : 'O';
          if (crawl && baseTerrain === 'sea' && ['S', 'X'].includes(symbol)) symbol = W.pick(['U', 'W', 'O', 'O', 'O', 'O']);
          if (mountainBorder && 'WUS'.includes(symbol)) symbol = 'X';
          if (genre === 'Empty' && 'XWSU'.includes(symbol)) symbol = W.pick(['A', 'B', 'C', 'D', 'A', 'B', 'C', 'D', 'M']);
          const terrain = by && (+inheritance === 1 || +inheritance === 2 && W.d(2) === 1) ? latitudes[by - 1] : baseTerrain;
          if (crawl && excluded.has(number)) symbol = W.pick(['A', 'B', 'C', 'D']);
          if (crawl && terrain === 'sea' && W.d(2) === 1) symbol = 'O';
          const localGenre = mixed ? W.pick(['Fantasy', 'Post-Apocalyptic']) : genre;
          const appearance = W.worldIcon(symbol, terrain, localGenre, options, crawl, mountainBorder);
          const x = 10 + bx * 320 + column * 64 + (row % 2 ? 32 : 0), y = 10 + by * 272 + row * 17;
          const cell = { x, y, terrain, row: by * 16 + row, column: bx * 5 + column, ...appearance, category };
          cell.overlay = W.worldOverlay(cell, options);
          if (+p.color && symbol === 'O' && mountainBorder) cell.overlay = terrain === 'underworld' ? '_color_caverns.png' : '_color_mountains.png';
          cells.push(cell);
          if (cell.icon) legends.add(cell.icon);
          if (cell.overlay) legends.add(cell.sunken ? +p.color ? 'color_sunken_c.png' : 'color_sunken.png' : cell.overlay);
          if (crawl && !excluded.has(number) && 'XWSU'.includes(cell.symbol) && sites.length < W.number(p.n, 320, 1, 320)) { cell.number = sites.length + 1; sites.push(cell); }
        }
      }
    }
    const layer = (cell, icon, overlay = false) => `<img class="${overlay ? 'terrain-overlay' : 'terrain-icon'}" src="land/${icon}" alt="${esc(names.get(icon) || cell.terrain)}" style="position:absolute;z-index:${overlay ? 3 : 2};left:${cell.x + (overlay || cell.symbol === 'O' && !['mountains.png', 'cavern.png'].includes(icon) || cell.symbol === 'T' ? 1 : 6)}px;top:${cell.y + (overlay || cell.symbol === 'O' && !['mountains.png', 'cavern.png'].includes(icon) || cell.symbol === 'T' ? 1 : 3)}px">`;
    const html = `<div class="world-map" role="img" aria-label="World hex map" style="position:relative;background:white;width:${wide * 320 + 52}px;height:${high * 272 + 28}px">${blocks.join('')}${cells.map(c => (c.icon ? layer(c, c.icon) : '') + (c.overlay ? layer(c, c.overlay, true) : '') + (c.number ? `<span class="site-number" style="position:absolute;z-index:10;left:${c.x + 16}px;top:${c.y - 2}px;background:white;color:red;font:bold 12px Arial">${c.number}</span>` : '')).join('')}</div>`;
    const legend = W.table(['Icon', 'Terrain or landmark'], [...legends].filter(icon => !icon.includes('highlight') && !icon.includes('highwhite')).sort((a, b) => (names.get(a) || a).localeCompare(names.get(b) || b)).map(icon => [`<img src="land/${icon}" alt="">`, esc(names.get(icon) || icon.replace(/\.png$/, '').replaceAll('_', ' '))]));
    return { html, legend, sites, cells, latitudes };
  };
  const fields = [f('map_name', 'World name', 'text'), f('genre', 'Map style', 'select', { value: 'Fantasy', options: ['Fantasy', 'Post-Apocalyptic', 'Exodus Spaceship', 'Sci-Fi', 'Post-Apocalyptic Fantasy', 'Empty'] }), f('climate', 'Climate', 'select', { value: 1, options: climates }), f('width', 'Width (10 hexes per block)', 'number', { value: 1, min: 1, max: 10 }), f('height', 'Height (8 hexes per block)', 'number', { value: 1, min: 1, max: 10 }), f('map_equals', 'Miles per hex', 'number', { value: 6, min: 1, max: 1000 }), ...['n', 's', 'e', 'w'].map((edge, i) => f('water_' + edge, ['Northern', 'Southern', 'Eastern', 'Western'][i] + ' border', 'select', { value: 0, options: [[0, 'None'], [1, 'Water']] })), f('info', 'Include map information', 'checkbox', { value: 1 }), f('legend', 'Include legend', 'checkbox', { value: 1 })];
  fields.forEach(field => { if (field.name.startsWith('water_')) field.options.push([2, 'Mountains / caverns']); });
  fields.push(f('hull', 'Outer hull (Exodus Spaceship)', 'checkbox'), f('color', 'Color map', 'checkbox'), f('colorl', 'Highlight landmarks', 'checkbox'));
  W.register('world', 'World Maps', 'Generate a world or underworld map with the original classic hex grid, terrain icons and land templates.', fields, p => {
    const map = W.worldMap(p);
    W.storage.set('last-world', { options: p, cells: map.cells });
    return map.html + (String(p.info ?? '1') === '1' ? `${p.map_name ? '<h3>' + esc(p.map_name) + '</h3>' : ''}<p>1 Hex = ${W.number(p.map_equals, 6, 1, 1000)} Miles <img src="land/compass.png" alt="North" style="vertical-align:middle"></p>${String(p.legend ?? '1') === '1' ? '<h3>Legend</h3>' + map.legend : ''}` : '');
  });
})(window.WZ, window.WZ_DATA);
