(function (W, D) {
  'use strict';
  const f = W.field;
  const authors = [['dyson', '0dyson0', 'Dyson Logos'], ['risus', '0risus0', 'Risus Monkey'], ['rorsch', '0rorschachhamster0', 'Rorschachhamster'], ['stone', '0stonewerks0', 'Stonewerks'], ['glenn', '0glenn0jupp0', 'Glenn Jupp'], ['stuart', '0stuart0', 'Stuart Robertson'], ['zero', '0infinite0zer00', 'Infinite Zer0']];
  const dimensions = [f('width', 'Width (geomorphs)', 'number', { value: 1, min: 1, max: 10 }), f('height', 'Height (geomorphs)', 'number', { value: 1, min: 1, max: 10 })];
  const numbering = [f('keyed', 'Number areas', 'checkbox'), f('start', 'Start numbering at', 'number', { value: 1, min: 1, max: 100000 })];
  W.geomorphMap = function (params, kind) {
    // A small delve floor consists of four corner geomorphs, with no center.
    const minimum = params.interior === '1' ? 0 : 1;
    const width = W.number(params.width ?? params.map_wide, 1, minimum, 10), height = W.number(params.height ?? params.map_high, 1, minimum, 10);
    const type = String(params.type || (kind === 'dungeon' ? 'Cavernous Dungeon' : kind === 'settlement' ? 'City' : kind === 'scifi' ? 'Building' : kind));
    const side = type.toLowerCase() === 'side view', suburb = kind === 'suburb';
    const border = suburb ? 75 : 150, topHeight = side ? 300 : border;
    const fullWidth = width * 300 + 2 * border + 20, fullHeight = height * 300 + topHeight + border + 20;
    const keyed = String(params.keyed) === '1';
    let key = W.number(params.start ?? params.map_numbers, 1, 1, 100000) - 1;
    let available = D.geomorphs;
    const castleIndex = params.castle !== '0' && ['City', 'Keep', 'Village'].includes(type) && (params.castle === '1' || W.d(2) === 1) ? W.rng.int(0, width * height - 1) : -1;
    const castle = type === 'Village' ? 'village_ruler' : width * height >= 50 ? 'keep_king' : width * height >= 20 ? W.pick(['keep_king', 'keep_prince']) : width * height >= 5 ? W.pick(['keep_prince', 'keep_baron']) : 'keep_baron';
    const climate = W.d(100) > 30 ? 'scifi-ma-desert' : 'scifi-ma-woods';
    if (kind === 'dungeon') {
      if (side) available = available.filter(t => t.image.includes('dgside'));
      else {
        const terrain = type.toLowerCase() === 'dungeon' ? ['dungeon'] : ['cavernous', 'water cavern'].includes(type.toLowerCase()) ? ['cave'] : ['cave', 'dungeon'];
        const selectedAuthors = authors.filter(([slug]) => String(params['cave_' + slug] ?? '1') === '1');
        available = available.filter(t => terrain.includes(t.terrain) && selectedAuthors.some(([, token]) => t.image.includes(token)));
      }
    } else if (kind === 'settlement') {
      const terrains = type === 'Village' ? ['village', 'village_ruler'] : type === 'Keep' ? ['keep', 'city', castle, 'docks'] : ['city', castle, 'docks'];
      available = available.filter(t => terrains.includes(t.terrain) && (params.water !== '0' || t.terrain !== 'docks'));
    } else if (kind === 'scifi') {
      const terrains = type === 'Building' ? ['scifi-building'] : type === 'Spaceship' ? ['scifi-ship'] : ['scifi-ship', climate];
      available = available.filter(t => terrains.includes(t.terrain));
    } else available = available.filter(t => t.terrain === ({ sewer: 'sewers', ruins: 'ruins', suburb: 'suburb' }[kind] || kind));
    if (params.interior === '1') available = available.filter(t => t.delve !== 'X');
    const tiles = [], rooms = [], gates = new Set();
    const dock = W.d(4);
    for (let y = 0; y < height + 2; y++) for (let x = 0; x < width + 2; x++) {
      const vertical = y === 0 ? 't' : y === height + 1 ? 'b' : '';
      const horizontal = x === 0 ? 'l' : x === width + 1 ? 'r' : '';
      const spot = vertical + horizontal;
      let choices = available.filter(t => t.spot === spot);
      if (params.interior === '1' && !spot) choices = choices.filter(t => +t.wayout !== 1 && (type === 'Water Cavern' ? t.delve === 'W' : t.delve !== 'W'));
      if (kind === 'settlement') {
        if (!spot) {
          const centerIndex = (y - 1) * width + x - 1;
          const terrain = centerIndex === castleIndex ? castle : type === 'Village' ? 'village' : 'city';
          choices = choices.filter(t => t.terrain === terrain);
        } else if (type === 'Keep' && spot.length === 1) {
          const gate = !gates.has(spot) && W.d(4) === 1;
          if (gate) gates.add(spot);
          choices = choices.filter(t => gate ? t.terrain === 'keep' && t.more === 'G' : t.more === '');
        } else choices = choices.filter(t => t.terrain !== 'docks' || t.image.includes(`_${dock}.gif`) || t.image.includes(`_0${dock}.jpg`));
      }
      if (kind === 'sewer' && !spot) {
        const room = W.d(100) < W.number(params.halls, 0, 0, 100);
        choices = choices.filter(t => room ? t.rooms.length > 0 : t.rooms.length === 0);
      }
      if (kind === 'scifi' && type === 'Exodus Spaceship' && !spot) {
        const edge = y === 1 ? x === 1 ? 'tleft.jpg' : x === width ? 'tright.jpg' : 'top.jpg' : y === height ? x === 1 ? 'bleft.jpg' : x === width ? 'bright.jpg' : 'bottom.jpg' : x === 1 ? 'xleft.jpg' : x === width ? 'xright.jpg' : '';
        choices = choices.filter(t => edge ? t.image.endsWith(edge) : t.terrain === climate && !/(tleft|top|tright|bleft|bright|bottom|xleft|xright)\.jpg$/.test(t.image));
      }
      if (!choices.length) return { html: '<p>No matching geomorphs for this selection. Choose another map type or at least one artist.</p>', tiles: [], rooms: [] };
      const chosen = W.pick(choices);
      const tileWidth = horizontal ? border : 300, tileHeight = y === 0 ? topHeight : vertical ? border : 300;
      const left = 20 + (x ? border + (x - 1) * 300 : 0), top = 20 + (y ? topHeight + (y - 1) * 300 : 0);
      const image = (kind === 'scifi' && String(params.geomorph_colored) === '1' ? 'bw_' : '') + chosen.image;
      tiles.push({ image, left, top, width: tileWidth, height: tileHeight, spot });
      const levels = side && params.complex === '1' ? chosen.more.split('_').filter(Boolean).map(cell => { const [coordinate, type, size] = cell.split('^'); return { coordinate: +coordinate, type, size }; }) : chosen.rooms.map(coordinate => ({ coordinate, type: chosen.terrain === 'cave' ? 'C' : 'D' }));
      if (keyed) for (const area of levels) {
        if (side && params.complex === '1' && W.d(100) < W.number(params.x_floors, 0, 0, 100)) continue;
        const coordinate = area.coordinate;
        const columns = tileWidth === 150 ? 5 : 10;
        rooms.push({ number: ++key, type: area.type, size: area.size, x: left + (((coordinate - 1) % columns) * 10 + 5) * 3 - 2, y: top + (Math.floor((coordinate - 1) / columns) * 10 + 5) * 3 - 3 });
      }
    }
    const html = `<div class="geomorph-map" role="img" aria-label="${W.escape(type)} map" style="position:relative;background:white;width:${fullWidth}px;height:${fullHeight}px">${tiles.map(t => `<img class="geomorph" src="maps/${W.escape(t.image)}" alt="${t.spot || 'central'} geomorph" style="position:absolute;left:${t.left}px;top:${t.top}px;width:${t.width}px;height:${t.height}px">`).join('')}${rooms.map(r => `<span class="map-number" style="position:absolute;left:${r.x}px;top:${r.y}px;font:12px Arial;color:red;background:white">${r.number}</span>`).join('')}</div>`;
    return { html, tiles, rooms, width: fullWidth, height: fullHeight };
  };
  const tools = [
    ['dungeon-map', 'Dungeon Maps', 'dungeon', [f('type', 'Map type', 'select', { value: 'Cavernous Dungeon', options: ['Cavernous Dungeon', 'Dungeon', 'Cavernous', 'Side View'] }), ...authors.map(([slug, , name]) => f('cave_' + slug, name, 'checkbox', { value: 1 }))]],
    ['settlement-map', 'Settlement Maps', 'settlement', [f('type', 'Settlement type', 'select', { value: 'City', options: ['City', 'Keep', 'Village'] })]],
    ['sci-fi-map', 'Sci-Fi Maps', 'scifi', [f('type', 'Map type', 'select', { value: 'Building', options: ['Building', 'Spaceship', 'Exodus Spaceship'] }), f('geomorph_colored', 'Color', 'select', { value: 0, options: [[0, 'Classic Blue'], [1, 'Black & White']] })]],
    ['sewer-map', 'Sewer Maps', 'sewer', [f('halls', 'Chance of rooms (%)', 'number', { value: 0, min: 0, max: 100 })]],
    ['suburb-map', 'Suburb Maps', 'suburb', []],
    ['ruined-city-map', 'Ruined City Maps', 'ruins', []]
  ];
  for (const [route, title, kind, fields] of tools) W.register(route, title, 'Generate a random map from the original geomorphs. Artwork by Dyson Logos, Risus Monkey, Rorschachhamster, Stonewerks, Glenn Jupp, Stuart Robertson, Infinite Zer0, Shane Knysh and Wizardawn Entertainment, as credited in the original tools.', [...fields, ...dimensions, ...(kind === 'suburb' ? [] : numbering)], p => {
    const map = W.geomorphMap(p, kind);
    W.storage.set('last-map', { route, options: p, tiles: map.tiles, rooms: map.rooms });
    return map.html;
  });
})(window.WZ, window.WZ_DATA);
