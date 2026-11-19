(function (W) {
  'use strict';
  const pick = a => W.pick(a), chance = n => W.d(n) === 1;
  const latitudeRows = {
    1: { 1: 'a', 2: 'a j/f', 3: 'a j/f d/t', 4: 'a j/f d/j d/t', 5: 'a f j d t', 6: 'a f j d j t', 7: 'a f f j d j t', 8: 'a a f f j d j t', 9: 'a a f f j d d j t', 10: 'a a f f f j d d j t' },
    2: { 1: 't', 2: 't j/f', 3: 't j/f a', 4: 't j/d f a', 5: 't d j f a', 6: 't d j f a a', 7: 't d j f f a a', 8: 't d j f f f a a', 9: 't d d j j f f a a', 10: 't d d j j f f f a a' },
    10: { 1: 'a', 2: 'a a/f', 3: 'a j/f a', 4: 'a f/j/d/d f/j/d/d a', 5: 'a f j/d f a', 6: 'a f j/d d/j f a', 7: 'a f j d/j j/d f a', 8: 'a a f j/d d/j f a a', 9: 'a a f j d/j j/d f a a', 10: 'a a f f j/d d/j j/d f a a' },
    11: { 1: 't', 2: 't t/d/j/j', 3: 't t/d/j/j t/d', 4: 't f/j d/j t', 5: 't j/d f j/d t', 6: 't j/d f f j/d t', 7: 't j/d f a f j/d t', 8: 't j/d f f/a a f j/d t', 9: 't d j f a f/a j d t', 10: 't d j f a a f j d t' }
  };
  const terrains = { a: 'arctic', f: 'forest', j: 'jungle', d: 'desert', t: 'tropic' };
  W.worldLatitude = function (climate, row, height) {
    const fixed = { 3: 'arctic', 4: 'desert', 5: 'forest', 6: 'jungle', 7: 'tropic', 8: 'moon', 12: 'underworld', 100: 'desert', 101: 'forest', 102: 'hills', 103: 'jungle', 104: 'mountains', 105: 'plains', 106: 'sea', 107: 'arctic', 108: 'swamp', 111: 'desert', 112: 'underworld' };
    if (fixed[climate]) return fixed[climate];
    const rows = latitudeRows[climate]?.[height];
    return rows ? terrains[pick(rows.split(' ')[row].split('/'))] : pick(Object.values(terrains));
  };
  W.worldIcon = function (symbol, terrain, genre, p, crawl = false, border = false) {
    const color = +p.color > 0, under = terrain === 'underworld', desert = ['desert', 'tropic'].includes(terrain), alien = ['Sci-Fi', 'Exodus Spaceship'].includes(genre);
    const pair = (a, b, n = 2) => chance(n) ? b : a;
    const city = () => { const name = pick(['city', 'sf_city', 'sf_city_dome', 'sf_city_float']); return under && name === 'sf_city_float' ? 'sf_city_dome' : name; };
    const dwelling = () => pick(['dwelling', 'village', 'pa_village', 'city']);
    const castle = () => chance(4) ? 'dungeon' : pair('castle', 'castle_evil');
    const ruins = (stones = false) => desert && !chance(4) ? 'sf_ruins' : stones && chance(2) ? 'stones' : 'ruins';
    const temple = (totem = false) => under ? 'temple2' : totem && chance(6) ? 'totem' : pair('temple', 'temple2');
    const camp = base => { let name = pair(base, 'sf_primitive'); if (chance(10)) name = 'totem'; return under ? 'u_primitive' : name; };
    let icon = '', sunken = false;
    if (symbol === 'O') icon = border ? (under ? 'cavern' : 'mountains') : color ? (terrain === 'sea' ? '_color_water' : '_color_sea') : terrain === 'sea' ? 'sea_cover' : 'sea';
    else if (symbol === 'T') icon = color ? '_color_hull' : 'color_hull';
    else if (symbol === 'M') icon = under ? 'cavern' : terrain === 'sea' ? 'water' : genre === 'Exodus Spaceship' && chance(20) ? 'shards' : 'mountains';
    else if (symbol === 'V') icon = under ? 'lava' : terrain === 'sea' ? 'water' : terrain === 'moon' ? 'mountains' : 'volcano';
    else if ('ABCD'.includes(symbol)) {
      const base = { desert: ['desert', 'desert', color ? 'hills' : 'dune', 'barrens'], forest: ['forest', 'grasslands', 'hills', 'swamp'], jungle: ['jungle', 'grasslands', 'hills', 'swamp'], arctic: [color ? 'forest' : 'snow_forest', 'snow', color ? 'hills' : 'snow_hills', color ? 'barrens' : 'snow_barrens'], tropic: ['jungle', 'desert', color ? 'hills' : 'dune', 'swamp'], moon: ['moon_rocky', 'moon_flats', 'hills', 'moon_crack'], underworld: ['moon_rocky', 'under_flats', 'fungus', 'moon_crack'], hills: ['hills', 'grasslands', 'hills', 'swamp'], mountains: ['mountains', 'mountains', 'mountains', 'mountains'], plains: ['grasslands', 'grasslands', 'grasslands', 'swamp'], sea: ['water', 'water', 'water', 'water'], swamp: ['swamp', 'marsh', 'swamp', 'swamp'] };
      icon = (base[terrain] || base.forest)['ABCD'.indexOf(symbol)];
      if (symbol === 'A' && terrain === 'desert' && +p.climate !== 111 && chance(10)) icon = 'cactus';
      if (symbol === 'B' && terrain === 'plains' && chance(4)) icon = 'hills';
      if (symbol === 'B' && terrain === 'moon' && chance(10)) icon = 'lava';
      if (symbol === 'C' && terrain === 'swamp') icon = pair('swamp', 'marsh');
      if (under) {
        if (chance(5)) icon = 'cavern';
        else if (symbol !== 'B' && chance(10)) icon = { A: 'crystals', C: 'thorns', D: 'lava' }[symbol];
      } else if (symbol === 'D') {
        if (terrain === 'desert' && chance(10)) icon = alien || +p.climate === 111 ? 'thorns' : 'dead_tree';
        if (terrain === 'arctic' && chance(10)) icon = alien ? 'thorns' : color ? 'dead_tree' : 'snow_dead_tree';
        if (['forest', 'swamp', 'hills', 'plains', 'jungle', 'tropic'].includes(terrain)) { icon = pair('swamp', alien ? 'fungus' : 'marsh'); if (chance(10)) icon = alien ? 'thorns' : 'dead_tree'; }
      }
      if (+p.climate !== 106 && chance(200)) {
        if (['Post-Apocalyptic', 'Exodus Spaceship'].includes(genre)) icon = chance(4) ? 'sf_biohazard' : 'pa_radiation';
        else if (genre === 'Sci-Fi') icon = pair('pa_radiation', 'sf_biohazard');
        else if (terrain === 'moon') icon = 'crater';
      }
    } else if ('XWSU'.includes(symbol)) {
      const water = symbol === 'W' || symbol === 'U';
      if (water) { sunken = symbol === 'U' && chance(3); if (!sunken) symbol = 'W'; }
      if (genre === 'Fantasy') {
        const choices = water ? [() => 'boat', castle, () => ruins(), () => 'skull', () => 'tower', () => temple(true), () => pair('lighthouse', 'boat'), () => 'fort', () => under ? 'city_underworld' : 'city'] : symbol === 'S' ? [() => 'dock', () => 'waterfall', () => 'fort', () => 'dungeon'] : [() => pair('skull', 'dungeon', 4), () => pair('mine', 'dungeon', 10), () => 'tower', () => 'fort', () => ruins(true), () => temple(), castle, () => pair('cave', 'dungeon', 10), () => camp('camp'), () => under ? 'village_underworld' : 'village', () => under ? 'city_underworld' : 'city'];
        const lo = water ? crawl ? 0 : 1 : symbol === 'S' && crawl ? 2 : 0, hi = water ? crawl ? 5 : 8 : symbol === 'S' ? 3 : crawl ? 8 : 10;
        icon = choices[W.rng.int(lo, hi)]();
        if (icon === 'boat') sunken = true;
        if (icon === 'lighthouse' && under) icon = 'tower';
      } else if (genre === 'Sci-Fi') {
        const common = [() => pair('mine', symbol === 'S' ? 'waterfall' : 'crater', symbol === 'S' ? 2 : 4), () => pair('sf_military', 'sf_industry'), () => symbol === 'S' ? pair('pa_space_station', 'sf_ship_crash') : 'pa_space_station', city, () => desert && !chance(4) ? 'sf_ruins' : 'stones', () => 'pa_communicate', () => 'sf_village', () => symbol === 'S' ? pair(chance(10) ? 'totem' : 'sf_primitive', 'sf_evil_fortress') : pair('sf_alien_outpost', 'sf_ship_crash'), () => 'pa_science', () => symbol === 'S' ? pair('cave', 'crater', 4) : pair('cave', 'animal'), () => symbol === 'S' ? pair('sf_alien_outpost', 'animal') : camp('pa_camp')];
        const coastal = [() => 'sf_military', city, () => chance(10) ? 'totem' : desert && !chance(4) ? 'sf_ruins' : 'stones', () => 'sf_ship_crash', () => 'pa_communicate', () => pair('pa_space_station', 'sf_alien_outpost'), () => 'pa_science', () => pair('mine', 'sf_industry'), () => pair('cave', 'animal'), () => pair('robots', 'robot_factory')];
        const index = W.rng.int(0, (water ? coastal : common).length - 1);
        icon = (water ? coastal : common)[index]();
        if (water && index === 3) sunken = true;
        if (water && index === 5) sunken = false;
        if (water && icon === 'sf_city_dome' && W.d(3) > 1) sunken = true;
        if (under && icon === 'sf_primitive') icon = 'u_primitive';
      } else if (genre === 'Exodus Spaceship') {
        const common = [() => pair('mine', 'hatch', 4), () => pair('sf_security', 'sf_generator'), () => 'power', dwelling, () => 'pa_communicate', () => pair('robot_factory', 'robots'), () => pair('medical', 'research'), () => pair('computers', 'atomic'), () => pair('supplies', 'food'), () => pair('cave', 'animal'), () => camp('pa_camp'), () => pair('sf_evil_fortress', 'skull')];
        const coastal = [() => pair('sf_security', 'medical'), () => pick(['dwelling', 'village', 'pa_village', 'city', 'sf_city_dome']), () => 'hatch', () => pair('pa_communicate', 'hydro'), () => pair('supplies', 'food'), () => pair('pa_science', 'atomic'), () => pair('research', 'computers'), () => pair('sf_generator', 'power'), () => pair('cave', 'animal'), () => pair('robot_factory', 'robots')];
        icon = (water ? pick(coastal) : symbol === 'S' ? pick([() => 'dock', () => 'waterfall', () => 'hydro', dwelling]) : pick(common))();
        if (water && icon === 'hatch') sunken = true;
        if (water && icon === 'sf_city_dome') { sunken = W.d(3) > 1; }
        else if (water && ['dwelling', 'village', 'pa_village', 'city'].includes(icon)) sunken = false;
      } else if (genre === 'Lunar') {
        const ship = [() => pair('mine', 'hatch', 4), () => pair('sf_security', 'sf_city_dome'), () => pair('pa_communicate', 'atomic'), () => pair('sf_evil_fortress', 'skull'), () => pair('supplies', 'food'), () => pair('pa_science', 'medical'), () => pair('research', 'computers'), () => pair('sf_generator', 'power'), () => 'cave', () => pair('robot_factory', 'robots')];
        const common = [() => pair('mine', 'crater', 4), () => pair('sf_military', 'sf_industry'), () => symbol === 'S' ? pair('pa_space_station', 'sf_ship_crash') : pair('pa_space_station', 'crater', 4), () => pair('sf_city_dome', 'crater', 4), () => W.d(3) > 1 ? 'sf_ruins' : 'stones', () => pair('pa_communicate', 'crater', 4), () => pair('sf_village', 'crater', 4), () => symbol === 'S' ? pair('pa_science', 'crater', 4) : pair('sf_alien_outpost', 'sf_ship_crash'), () => symbol === 'S' ? pair('cave', 'crater', 4) : pair('pa_science', 'crater', 4), () => symbol === 'S' ? pair('sf_alien_outpost', 'crater', 4) : pair('cave', 'crater', 4)];
        const coastal = [() => pair('sf_military', 'crater', 4), () => pair('sf_city_dome', 'crater', 4), () => pair('stones', 'crater', 4), () => pair('sf_ship_crash', 'crater', 4), () => pair('pa_communicate', 'crater', 4), () => pair('pa_space_station', 'sf_alien_outpost'), () => pair('pa_science', 'crater', 4), () => pair('mine', 'sf_industry'), () => pair('cave', 'crater', 4)];
        icon = pick(p.lifelessShip ? ship : water ? coastal : common)(); sunken = false;
      } else {
        const common = [() => pair('pa_oil', 'mine'), () => pair('pa_military', 'sf_military', 4), () => pair('pa_space_station', 'sf_ship_crash'), () => pair('pa_ruins', 'crater', 4), () => pair('pa_communicate', 'pa_communicate2'), () => pair('pa_power_plant', 'pa_factory'), () => pair('pa_science', 'pa_airport'), () => pair('cave', 'skull'), () => camp('pa_camp'), () => pair('sf_evil_fortress', 'animal'), () => pair('pa_prison', 'pa_vault'), () => pair('pa_village', 'village', 3), city];
        const coastal = [() => 'pa_boat', () => pair('pa_oil', 'power'), () => pair('pa_military', 'sf_military', 4), () => pair('pa_communicate', 'pa_communicate2'), () => 'pa_power_plant', () => pair('pa_prison', 'pa_vault'), () => pair('pa_ruins', 'totem', 10), () => 'pa_science', () => pair('pa_space_station', 'sf_ship_crash'), () => pair('atomic', 'research', 4), () => pair('computers', 'medical', 4), () => pair('lighthouse', 'pa_boat'), () => pair('robots', 'robot_factory', 4), city];
        icon = water ? coastal[W.rng.int(crawl ? 0 : 1, crawl ? 10 : 13)]() : symbol === 'S' ? pick(crawl ? ['pa_military', 'sf_military'] : ['dock', 'waterfall', 'pa_military', 'sf_military']) : common[W.rng.int(0, crawl ? 10 : 12)]();
        if (water && ['pa_boat', 'sf_ship_crash'].includes(icon)) sunken = true;
        if (water && ['city', 'sf_city', 'sf_city_float'].includes(icon)) sunken = false;
        if (water && icon === 'sf_city_dome' && chance(2)) sunken = true;
      }
    }
    if (terrain === 'sea' && !['O', 'W'].includes(symbol)) sunken = true;
    return { icon: icon ? icon + '.png' : '', sunken: sunken && !border, symbol };
  };
  W.worldOverlay = function (cell, p) {
    const { icon, terrain, symbol, sunken } = cell, image = icon.replace('.png', '');
    if (sunken) return +p.color ? '_color_water.png' : 'sea_cover.png';
    if (!+p.color || ['T', 'O'].includes(symbol)) return '';
    const highlight = +p.colorl && 'XWS'.includes(symbol);
    let name;
    if (['sf_biohazard', 'pa_radiation'].includes(image)) name = 'danger';
    else if (terrain === 'underworld') name = ({ moon_crack: 'ucracks', moon_rocky: 'ucracks', crystals: 'ucrystal', fungus: 'uplant', thorns: 'thorns', cavern: 'caverns', lava: 'lava' })[image] || (highlight ? 'highlight' : 'uworld');
    else if (terrain === 'moon') {
      const moon = p.moonColor || 'moon';
      name = ['hills', 'moon_crack', 'moon_rocky', 'crater'].includes(image) ? moon + '_' + ({ hills: 'hills', moon_crack: 'rocks', moon_rocky: 'rocks', crater: 'flats' })[image] : image === 'mountains' ? 'mountains' : highlight ? moon === 'moon' ? 'highwhite' : 'highlight' : moon + '_flats';
    } else if (image === 'mountains' || terrain === 'mountains' && symbol !== 'V') name = 'mountains';
    else if (terrain === 'sea' && symbol === 'W') name = pick(['sand', 'tree', 'jungle', 'grass', 'sand_hills']);
    else if (terrain === 'arctic' && ['forest', 'hills', 'barrens'].includes(image)) name = 'snow';
    else if (['desert', 'tropic'].includes(terrain) && image === 'hills') name = 'sand_hills';
    else if (terrain === 'desert' && image === 'barrens') name = 'sand';
    else name = ({ shards: 'shards', water: 'water', desert: 'sand', cactus: 'sand_plants', forest: 'tree', jungle: 'jungle', snow_forest: 'snow', grasslands: 'grass', snow: 'snow', dune: 'sand_hills', hills: 'hills', snow_hills: 'snow', thorns: 'dead', dead_tree: 'dead', swamp: 'swamp', fungus: 'marsh', marsh: 'marsh', snow_barrens: 'snow', snow_dead_tree: 'snow', volcano: 'volcano' })[image] || (highlight ? 'highlight' : ({ desert: 'sand', forest: 'grass', jungle: 'grass', arctic: 'snow', tropic: 'sand', hills: 'hills', swamp: 'swamp', plains: 'grass' })[terrain]);
    return name ? '_color_' + name + '.png' : '';
  };
})(window.WZ);
