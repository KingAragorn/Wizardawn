(function (W, D) {
  'use strict';
  const esc = W.escape, f = W.field, pick = a => W.pick(a), int = (a, b) => W.rng.int(a, b);
  const yes = (p, key, fallback = 1) => String(p[key] ?? fallback) === '1';
  const terrains = { 100: ['PD', 'Desert'], 101: ['PF', 'Forest'], 102: ['PH', 'Hills'], 103: ['TF', 'Jungle'], 104: ['PM', 'Mountains'], 105: ['PP', 'Plains'], 106: ['SW', 'Sea'], 107: ['CF', 'Snow'], 108: ['PS', 'Swamp'], 111: ['PD', 'Wastelands'], 112: ['DG', 'Underworld'] };
  const postGame = p => ['mutfut', 'urthe', 'gamma', 'meta', 'apoc', 'scifi', 'ryft', 'millen'].includes(W.game(p).slug);
  const legend = new Map([...D.worldmap_legend.map(row => [row.ll_image, row.ll_name]), ...Object.entries(D.worldDetails.legend)]);
  function siteKind(icon) {
    if (/boat/.test(icon)) return 'wreck';
    if (/camp|primitive|totem/.test(icon)) return 'camp';
    if (/tower/.test(icon)) return 'tower';
    if (/cave|mine/.test(icon)) return 'cave';
    if (/animal|skull/.test(icon)) return 'lair';
    if (/ruins|stones/.test(icon)) return 'ruins';
    if (/ship_crash|space_station/.test(icon)) return 'spaceship';
    if (/castle|fort|dungeon|temple/.test(icon) && !/^sf_/.test(icon)) return 'dungeon';
    return 'building';
  }
  W.site = function (p, site) {
    const post = postGame(p), icon = site.icon.replace(/\.png$/, ''), kind = siteKind(icon), submerged = site.sunken || site.symbol === 'U' || /boat/.test(icon);
    const terrain = p.terrain || terrains[p.climate ?? p.x_terrain ?? 101]?.[0] || 'PF';
    const waterTerrain = terrain === 'SW' ? 'SW' : 'FW';
    const select = { ...p, terrain: submerged ? waterTerrain : terrain, ...(submerged ? { swimmer: 1 } : {}) };
    let candidates = W.monsters(select).filter(m => +m.m_no_dungeon !== 1);
    if (!candidates.length && !submerged) candidates = W.monsters({ ...p, terrain: 'DG', dungeonOnly: '1' });
    // Empty selections terminate here. No retry/SQL insertion loop is needed.
    const owner = candidates.length ? W.weighted(candidates.map(m => ({ value: m, weight: Math.max(1, +m.freq_code) }))) : null;
    const label = legend.get(site.icon) || icon.replaceAll('_', ' '), person = W.manyName(), scary = pick(['Ancient', 'Forgotten', 'Haunted', 'Lost', 'Crumbling', 'Cursed', 'Hidden']);
    const name = p.siteName || (kind === 'wreck' ? 'The ' + scary + ' Ship of ' + person : kind === 'camp' ? (owner?.m_fort_name || person) + ' Camp' : scary + ' ' + label + ' of ' + person);
    const depth = submerged ? int(2, 20) * 100 : 0, sealed = submerged && kind === 'spaceship' && W.d(2) === 1;
    const floors = [], rooms = [];
    let html = `<article class="hex-site" id="site-${site.number}" data-site="${site.number}"><h2><img src="land/${esc(site.icon)}" alt=""> ${site.number}. ${esc(name)}</h2>`;
    if (submerged) html += `<p><i>${depth.toLocaleString('en-US')} feet below the surface${sealed ? ', sealed air tight' : ''}.</i></p>`;
    const occupants = owner ? W.monsterLife(owner, select) : [];
    html += `<section class="site-inhabitants"><h3>Inhabitants</h3>${owner ? W.monsterStats(owner, yes(p, 'x_describe'), select) + (owner.custom ? '' : `<p>${occupants.length} inhabitants. <b>${W.isTroll(p) ? 'MR' : W.game(p).slug === 'urthe' ? 'STAMINA' : 'HIT POINTS'}:</b> ${occupants.join(', ')}</p>`) : '<p>No enemies found for this terrain and difficulty.</p>'}</section>`;
    let floorCount = 0;
    const mapKind = kind === 'cave' || kind === 'lair' ? 'dungeon' : kind === 'ruins' ? post ? 'ruins' : 'dungeon' : kind === 'spaceship' || kind === 'building' && post ? 'scifi' : 'dungeon';
    const own = W.number(p.map_rooms, 0, 0, 1000);
    if (!['camp', 'wreck', 'lair'].includes(kind) || own) {
      const roll = W.d(100);
      floorCount = kind === 'tower' ? roll > 90 ? 6 : roll > 70 ? 5 : roll > 40 ? 4 : 3 : roll > 95 ? 4 : roll > 85 ? 3 : roll > 70 ? 2 : 1;
      for (let floorNumber = 1; floorNumber <= floorCount; floorNumber++) {
        const size = kind === 'tower' || W.d(3) === 1 ? 0 : 1;
        const floorKind = post && floorNumber > 1 && /military|ruins/.test(icon) ? 'sewer' : mapKind;
        const type = floorKind === 'scifi' ? kind === 'spaceship' ? 'Spaceship' : 'Building' : kind === 'cave' ? 'Cavernous' : 'Dungeon';
        const map = own ? { html: '', tiles: [], rooms: W.range(own).map(number => ({ number })) } : W.geomorphMap({ ...p, type, width: size, height: size, interior: '1', keyed: '1', start: 1, geomorph_colored: '1' }, floorKind);
        const options = { ...p, terrain: submerged ? waterTerrain : 'DG', x_terrain: terrain, type, ...(submerged ? { swimmer: 1 } : {}), floorType: /tomb|crypt|temple|skull/.test(icon) ? 'T' : 'D' };
        const results = map.rooms.map(room => W.adventureRoom(options, room.number, map.rooms.length, kind === 'cave', post));
        floors.push({ number: floorNumber, type, kind: floorKind, tiles: map.tiles, rooms: results });
        rooms.push(...results.map(room => ({ floor: floorNumber, ...room })));
        html += `<section class="site-floor" data-floor="${floorNumber}"><h3>Level ${floorNumber}</h3>${map.html}${results.map(room => room.html).join('')}</section>`;
      }
    } else {
      const outdoor = W.adventureRoom({ ...p, terrain: submerged ? waterTerrain : terrain, x_furnish: '0', ...(submerged ? { swimmer: 1 } : {}) }, 1, 1, false, post);
      rooms.push(outdoor);
      html += `<p>${kind === 'wreck' ? 'This ship ' + pick(['vanished', 'disappeared', 'sank', 'was lost']) + ' about ' + int(5, 90) * 10 + ' years ago.' : kind === 'camp' ? 'The inhabitants have made a camp around ' + pick(['a fire pit', 'a wooden totem', 'a ring of stones', 'a crude shrine']) + '.' : 'The creature has made its lair here.'}</p>` + outdoor.html;
    }
    return { number: site.number, icon: site.icon, kind, name, submerged, depth, sealed, ownerId: owner?.id || null, occupants, floors, rooms, html: html + '</article>' };
  };
  const siteFields = [f('x_u_c', 'Loose contents chance (%)', 'number', { value: 30, min: 0, max: 100 }), f('x_u_c_min', 'Minimum loose contents', 'number', { value: 1, min: 0, max: 100 }), f('x_u_c_max', 'Maximum loose contents', 'number', { value: 3, min: 0, max: 100 }), f('x_u_c_low', 'Loose contents reduction (%)', 'number', { value: 0, min: 0, max: 100 }), f('x_mutants', 'Mutants only', 'checkbox'), f('x_money', 'Post-apocalyptic currency', 'text'), f('x_low_tech', 'Exceptional technology chance (%)', 'number', { value: 100, min: 0, max: 100 }), f('x_frob', 'Stranded robot (%)', 'number', { value: 0, min: 0, max: 100 }), f('x_fveh', 'Stranded vehicle (%)', 'number', { value: 0, min: 0, max: 100 }), f('x_might1', 'Minimum hit point roll', 'number', { value: 1, min: 1, max: 20 }), f('x_might2', 'Hit point die size', 'number', { value: 8, min: 1, max: 20 })];
  for (const route of ['uexfl', 'uruins']) W.routes[route].fields.push(...siteFields);
  W.register('hex-crawl', 'World Adventure', 'Generate a world adventure with a numbered map, terrain encounters, site inhabitants, interior maps and keyed rooms.', [...W.adventureFields.filter(field => !['width', 'height', 'x_terrain', 'x_outside'].includes(field.name)), f('climate', 'Terrain', 'select', { value: 101, options: Object.entries(terrains).map(([key, row]) => [key, row[1]]) }), f('n', 'Maximum keyed sites', 'number', { value: 320, min: 1, max: 320 }), f('map_name', 'Map name', 'text'), f('map_equals', 'Miles per hex', 'number', { value: 6, min: 1, max: 1000 }), f('info', 'Map information', 'checkbox', { value: 1 }), f('color', 'Color map', 'checkbox'), ...siteFields], p => {
    const game = W.game(p), climate = p.climate ?? p.x_terrain ?? p.map_climate ?? 101;
    const options = { ...p, game: game.slug, climate, level: p.level ?? p.x_level ?? 0, terrain: terrains[climate]?.[0] || 'PF', genre: p.genre || (postGame(p) ? 'Post-Apocalyptic' : 'Fantasy'), mutate: p.mutate ?? p.x_mutants };
    const map = W.worldMap({ ...options, n: W.number(p.n, 320, 1, 320), width: 2, height: 2 }, true);
    const sites = map.sites.map(site => W.site(options, site));
    let html = `<h2>${esc(p.x_area || p.map_name || 'World Adventure')}</h2><p>${esc(game.name)}</p>${map.html}`;
    if (yes(p, 'info')) html += `<p>1 Hex = ${W.number(p.map_equals, 6, 1, 1000)} Miles. ${sites.length} unique areas.</p>`;
    const rows = sites.map(site => [site.number, `<a href="#site-${site.number}" data-scroll-site="${site.number}">${esc(site.name)}</a>`, esc(site.kind)]);
    html += '<h3>Keyed Areas</h3>' + (rows.length ? W.table(['Area', 'Landmark', 'Type'], rows) : '<p>No landmarks on this map.</p>');
    if (yes(p, 'wandering')) {
      const troll = W.isTroll(options) || game.slug === 'ssxs', sea = options.terrain === 'SW';
      html += '<section class="crawl-wandering"><h3>' + (sea ? 'RANDOM ENCOUNTERS ON THE SURFACE' : 'RANDOM ENCOUNTERS') + '</h3>' + W.routes.wander.generate({ ...options, n: sea ? troll ? 21 : 20 : troll ? 19 : 18 }) + (!sea ? '<p>19: ROLL ON THE RANDOM ITEM I TABLE<br>20: ROLL ON THE RANDOM ITEM II TABLE</p>' : '') + '</section>';
      if (climate != 112 && (sea || map.sites.some(site => site.sunken))) html += '<section class="crawl-water"><h3>RANDOM FRESHWATER ENCOUNTERS</h3>' + W.routes.wander.generate({ ...options, terrain: sea ? 'SW' : 'FW', n: troll ? 11 : 12 }) + '</section>';
      if (!sea) for (const label of ['I', 'II']) html += '<section class="crawl-items"><h3>RANDOM ITEM ' + label + '</h3>' + W.table(['Roll', 'Find'], W.range(20).map(i => [i, esc(postGame(options) ? W.postRoomItem(options).text : W.fantasyItem(options))])) + '</section>';
    }
    html += sites.map(site => site.html).join('') + '<h3>Legend</h3>' + map.legend;
    W.storage.set('last-hex-crawl', { options, sites, rows, cells: map.cells });
    return html;
  });
  // The Locale page uses the same site rules without a surrounding world map.
  const fantasyLocales = ['Random Area', 'Castle', 'Cave', 'Fort', 'Mine', 'Ruins', 'Sunken Ship', 'Temple', 'Tower', 'Unknown Danger', 'Underwater Castle', 'Underwater Cave', 'Underwater Ruins', 'Underwater Temple', 'Underwater Tower', 'Underwater Danger', 'Dungeon'];
  const postLocales = ['Random Area', 'Airport', 'Bomb Shelter', 'Cave', 'Communications', 'Crashed Ship', 'Crater', 'Den', 'Factory', 'Fort', 'Fortress', 'Laboratory', 'Military Base', 'Mine', 'Oil Rig', 'Power Plant', 'Prison', 'Ruins', 'Space Station', 'Sunken Ship', 'Underwater Airport', 'Underwater Bomb Shelter', 'Underwater Cave', 'Underwater Communications', 'Underwater Crashed Ship', 'Underwater Crater', 'Underwater Den', 'Underwater Factory', 'Underwater Fortress', 'Underwater Laboratory', 'Underwater Military Base', 'Underwater Oil Rig', 'Underwater Power Plant', 'Underwater Prison', 'Underwater Ruins', 'Underwater Space Station', 'Primitive Temple'];
  const fantasyIcons = ['', 'castle', 'cave', 'fort', 'mine', 'ruins', 'boat', 'temple', 'tower', 'skull', 'castle', 'cave', 'ruins', 'temple', 'tower', 'skull', 'dungeon'];
  const postIcons = ['', 'pa_airport', 'pa_vault', 'cave', 'pa_communicate', 'sf_ship_crash', 'crater', 'animal', 'pa_factory', 'fort', 'sf_evil_fortress', 'pa_science', 'pa_military', 'mine', 'pa_oil', 'pa_power_plant', 'pa_prison', 'pa_ruins', 'pa_space_station', 'pa_boat', 'pa_airport', 'pa_vault', 'cave', 'pa_communicate', 'sf_ship_crash', 'crater', 'animal', 'pa_factory', 'sf_evil_fortress', 'pa_science', 'pa_oil', 'pa_power_plant', 'pa_prison', 'pa_ruins', 'pa_space_station', 'totem'];
  W.register('locale', 'Adventure Locale', 'Create one detailed adventure site with its inhabitants, interior maps and keyed areas.', [...W.adventureFields, f('x_locale', 'Fantasy locale', 'select', { value: 0, options: fantasyLocales.map((name, i) => [i, name]) }), f('post_locale', 'Post-apocalyptic locale (takes precedence for those games)', 'select', { value: 0, options: postLocales.map((name, i) => [i, name]) }), ...siteFields], p => {
    const post = postGame(p), locations = post ? postIcons : fantasyIcons, selected = W.number(post ? p.post_locale ?? p.x_locale : p.x_locale, 0, 0, locations.length - 1) || int(1, locations.length - 1);
    const icon = locations[selected] + '.png', sunken = post ? selected >= 19 && selected <= 35 : selected === 6 || selected >= 10 && selected <= 15;
    const site = W.site({ ...p, game: W.game(p).slug, siteName: p.x_area, terrain: p.terrain || (sunken ? 'FW' : 'DG') }, { number: 1, icon, sunken, symbol: sunken ? 'U' : 'X' });
    W.storage.set('last-locale', { options: p, site });
    return site.html;
  });
})(window.WZ, window.WZ_DATA);
