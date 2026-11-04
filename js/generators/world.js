(function (W, D) {
  'use strict';
  const f = W.field, esc = W.escape;
  const climates = [[1, 'Cold north & warm south'], [2, 'Warm north & cold south'], [10, 'Cold north & south'], [11, 'Warm north & south'], [3, 'Snow'], [4, 'Desert'], [5, 'Forest'], [6, 'Jungle'], [7, 'Tropics'], [8, 'Lifeless'], [12, 'Underworld'], [9, 'Random']];
  const terrainClimate = { 100: 'desert', 101: 'forest', 102: 'hills', 103: 'jungle', 104: 'mountains', 105: 'plains', 106: 'sea', 107: 'arctic', 108: 'swamp', 111: 'desert', 112: 'underworld' };
  function latitude(climate, y, height) {
    if (terrainClimate[climate]) return terrainClimate[climate];
    const fixed = { 3: 'arctic', 4: 'desert', 5: 'forest', 6: 'jungle', 7: 'tropic', 8: 'moon', 12: 'underworld' };
    if (fixed[climate]) return fixed[climate];
    if (+climate === 9) return W.pick(['desert', 'forest', 'jungle', 'arctic', 'tropic']);
    const sequence = ['arctic', 'forest', 'jungle', 'desert', 'tropic'];
    let fraction = height > 1 ? y / (height - 1) : 0;
    if (+climate === 2) fraction = 1 - fraction;
    if (+climate === 10) fraction = 1 - Math.abs(2 * fraction - 1);
    if (+climate === 11) fraction = Math.abs(2 * fraction - 1);
    return sequence[Math.min(4, Math.floor(fraction * 5))];
  }
  const names = new Map(D.worldmap_legend.map(r => [r.ll_image, r.ll_name]));
  function iconFor(symbol, terrain, genre) {
    if (symbol === 'T') return 'color_hull.png';
    if (symbol === 'O') return 'water.png';
    if (symbol === '-') return '';
    if ('XWSU'.includes(symbol)) {
      const fantasy = ['castle.png', 'ruins.png', 'skull.png', 'tower.png', 'temple.png', 'lighthouse.png', 'fort.png', 'city.png', 'dungeon.png', 'cave.png'];
      const scifi = ['sf_military.png', 'sf_city.png', 'sf_ship_crash.png', 'pa_communicate.png', 'pa_space_station.png', 'pa_science.png', 'sf_industry.png', 'sf_alien_outpost.png'];
      const apocalypse = ['pa_airport.png', 'pa_communicate.png', 'pa_science.png', 'pa_space_station.png', 'pa_military.png', 'sf_ruins.png', 'robots.png'];
      return W.pick(genre === 'Sci-Fi' || genre === 'Exodus Spaceship' ? scifi : genre === 'Post-Apocalyptic' ? apocalypse : fantasy);
    }
    if (symbol === 'M') return terrain === 'underworld' ? 'cavern.png' : terrain === 'sea' ? 'water.png' : 'mountains.png';
    if (symbol === 'V') return terrain === 'underworld' ? 'lava.png' : terrain === 'sea' ? 'water.png' : 'volcano.png';
    const mapping = {
      desert: ['desert.png', 'desert.png', 'dune.png', 'mountains.png'],
      forest: ['forest.png', 'grasslands.png', 'hills.png', 'mountains.png'],
      jungle: ['jungle.png', 'grasslands.png', 'hills.png', 'mountains.png'],
      arctic: ['snow_forest.png', 'snow.png', 'snow_hills.png', 'mountains.png'],
      tropic: ['jungle.png', 'desert.png', 'dune.png', 'mountains.png'],
      moon: ['moon_rocky.png', 'moon_flats.png', 'hills.png', 'moon_crack.png'],
      underworld: ['moon_rocky.png', 'under_flats.png', 'hills.png', 'cavern.png'],
      hills: ['forest.png', 'grasslands.png', 'hills.png', 'hills.png'],
      mountains: ['mountains.png', 'mountains.png', 'hills.png', 'mountains.png'],
      plains: ['grasslands.png', 'grasslands.png', 'hills.png', 'forest.png'],
      sea: ['water.png', 'water.png', 'water.png', 'water.png'],
      swamp: ['swamp.png', 'marsh.png', 'hills.png', 'marsh.png']
    };
    return (mapping[terrain] || mapping.forest)[Math.max(0, 'ABCD'.indexOf(symbol))];
  }
  W.worldMap = function (p, crawl = false) {
    const wide = W.number(p.width ?? p.map_wide, crawl ? 2 : 1, 1, 10), high = W.number(p.height ?? p.map_high, crawl ? 2 : 1, 1, 10);
    const climate = p.climate ?? p.map_climate ?? (crawl ? 101 : 1), genre = p.genre ?? p.map_genre ?? 'Fantasy';
    const cells = [], sites = [], legends = new Set(), blocks = [];
    for (let by = 0; by < high; by++) {
      const terrain = latitude(climate, by, high);
      for (let bx = 0; bx < wide; bx++) {
        const vertical = by === 0 && +p.water_n ? 'n' : by === high - 1 && +p.water_s ? 's' : '';
        const horizontal = bx === 0 && +p.water_w ? 'w' : bx === wide - 1 && +p.water_e ? 'e' : '';
        const category = vertical || horizontal ? 'ocean_' + vertical + horizontal : 'land';
        const candidates = D.worldmap.filter(t => t.lm_done && t.lm_category === category);
        const tile = W.weighted(candidates.map(t => ({ weight: Math.max(1, t.lm_amount), value: t })));
        blocks.push(`<img class="hex-grid" src="land/hexes.png" alt="Hex grid" style="position:absolute;left:${10 + bx * 320}px;top:${10 + by * 272}px">`);
        const symbols = tile.lm_hexes.split('_');
        for (let i = 0; i < 80; i++) {
          const row = Math.floor(i / 5), column = i % 5;
          const alternatives = symbols[i].split('^')[0].split('|').filter(s => s !== 'T' || p.hull === '1');
          let symbol = alternatives.length ? W.pick(alternatives) : 'O';
          if (genre === 'Empty' && 'XWSU'.includes(symbol)) symbol = W.pick(['A', 'B', 'C', 'D', 'A', 'B', 'C', 'D', 'M']);
          const icon = iconFor(symbol, terrain, genre === 'Post-Apocalyptic Fantasy' ? W.pick(['Fantasy', 'Post-Apocalyptic']) : genre);
          const x = 10 + bx * 320 + column * 64 + (row % 2 ? 32 : 0), y = 10 + by * 272 + row * 17;
          const cell = { x, y, symbol, icon, terrain, row: by * 16 + row, column: bx * 5 + column };
          cells.push(cell);
          if (icon) legends.add(icon);
          if (crawl && 'XWSU'.includes(symbol) && sites.length < W.count(p)) { cell.number = sites.length + 1; sites.push(cell); }
        }
      }
    }
    const html = `<div class="world-map" role="img" aria-label="World hex map" style="position:relative;background:white;width:${wide * 320 + 52}px;height:${high * 272 + 28}px">${blocks.join('')}${cells.map(c => (c.icon ? `<img class="terrain-icon" src="land/${c.icon}" alt="${esc(names.get(c.icon) || c.terrain)}" style="position:absolute;left:${c.x + 6}px;top:${c.y + 3}px">` : '') + (c.number ? `<span class="site-number" style="position:absolute;left:${c.x + 16}px;top:${c.y - 2}px;background:white;color:red;font:bold 12px Arial">${c.number}</span>` : '')).join('')}</div>`;
    const legend = W.table(['Icon', 'Terrain or landmark'], [...legends].sort().map(icon => [`<img src="land/${icon}" alt="">`, esc(names.get(icon) || icon.replace(/\.png$/, '').replaceAll('_', ' '))]));
    return { html, legend, sites, cells };
  };
  const fields = [f('map_name', 'World name', 'text'), f('genre', 'Map style', 'select', { value: 'Fantasy', options: ['Fantasy', 'Post-Apocalyptic', 'Exodus Spaceship', 'Sci-Fi', 'Post-Apocalyptic Fantasy', 'Empty'] }), f('climate', 'Climate', 'select', { value: 1, options: climates }), f('width', 'Width (10 hexes per block)', 'number', { value: 1, min: 1, max: 10 }), f('height', 'Height (8 hexes per block)', 'number', { value: 1, min: 1, max: 10 }), f('map_equals', 'Miles per hex', 'number', { value: 6, min: 1, max: 1000 }), ...['n', 's', 'e', 'w'].map((edge, i) => f('water_' + edge, ['Northern', 'Southern', 'Eastern', 'Western'][i] + ' border', 'select', { value: 0, options: [[0, 'None'], [1, 'Water']] })), f('info', 'Include map information', 'checkbox', { value: 1 }), f('legend', 'Include legend', 'checkbox', { value: 1 })];
  W.register('world', 'World Maps', 'Generate a world or underworld map with the original classic hex grid, terrain icons and land templates.', fields, p => {
    const map = W.worldMap(p);
    W.storage.set('last-world', { options: p, cells: map.cells });
    return map.html + (String(p.info ?? '1') === '1' ? `<h3>${esc(p.map_name || 'World Map')}</h3><p>1 Hex = ${W.number(p.map_equals, 6, 1, 1000)} Miles</p>${String(p.legend ?? '1') === '1' ? '<h3>Legend</h3>' + map.legend : ''}` : '');
  });
  W.register('hex-crawl', 'World Adventure', 'Generate a hex crawl map with numbered landmarks and a keyed encounter table.', [W.gameField, f('climate', 'Terrain', 'select', { value: 101, options: Object.entries(terrainClimate).map(([n, name]) => [n, name]) }), f('level', 'Maximum enemy difficulty', 'number', { value: 3, min: 1, max: 20 }), f('map_name', 'Adventure name', 'text'), W.countField('Maximum keyed sites', 20)], p => {
    // A known game is always selected before building candidates. Every loop has
    // a finite bound; an empty monster pool produces text, never a retry loop.
    const game = W.game(p), options = { ...p, game: game.slug };
    const map = W.worldMap({ ...options, width: 2, height: 2 }, true);
    const terrain = { 100: 'PD', 101: 'PF', 102: 'PH', 103: 'TF', 104: 'PM', 105: 'PP', 106: 'SW', 107: 'CF', 108: 'PS', 111: 'PD', 112: 'DG' }[p.climate ?? 101];
    const sites = map.sites.slice(0, W.count(p));
    const rows = sites.map(site => {
      const monster = W.monsterPick({ ...options, terrain });
      const name = site.icon.includes('city') ? W.name('village') : names.get(site.icon) || site.icon.replace(/\.png$/, '').replaceAll('_', ' ');
      return [site.number, esc(name), monster ? W.monsterStats(monster, true) : 'No enemies found for this terrain and difficulty.'];
    });
    W.storage.set('last-hex-crawl', { options, sites, rows });
    return `<h3>${esc(p.map_name || 'World Adventure')}</h3><p>${esc(game.name)}</p>${map.html}<h3>Keyed Areas</h3>${rows.length ? W.table(['Area', 'Landmark', 'Encounter'], rows) : '<p>No landmarks on this map.</p>'}<h3>Legend</h3>${map.legend}`;
  });
})(window.WZ, window.WZ_DATA);
