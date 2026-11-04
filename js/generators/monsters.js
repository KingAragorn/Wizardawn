(function (W, D) {
  'use strict';
  const esc = W.escape, f = W.field, int = (a, b) => W.rng.int(Math.min(a, b), Math.max(a, b));
  W.terrains = [['', 'Any'], ['DG', 'Dungeon / ruins'], ['PF', 'Forest'], ['PH', 'Hills'], ['PM', 'Mountains'], ['PP', 'Plains'], ['PS', 'Swamp'], ['PD', 'Desert'], ['FW', 'Freshwater'], ['SW', 'Sea'], ['RD', 'Wastelands'], ['TW', 'Settlement'], ['CF', 'Snowy forest'], ['CH', 'Snowy hills'], ['CM', 'Snowy mountains'], ['CP', 'Snowy plains'], ['TF', 'Jungle forest'], ['TH', 'Tropical hills'], ['TM', 'Tropical mountains'], ['TS', 'Tropical swamp'], ['VG', 'Village'], ['LW', 'Lost world']];
  W.monsterGame = p => p.game || ({ 1: 'add', 2: 'osric', 3: 'lablord', 4: 'sandw', 5: p.tt_vs === '7' ? 'tt7e' : p.tt_vs === '9' ? 'ttde' : 'tt5e', 6: 'bfrpg', 8: 'millen', 51: 'ww', 99: 'bdd', 165: 'ssxs' })[p.listing] || W.game(p).slug;
  W.monsters = function (params) {
    const game = W.monsterGame(params), text = W.dataText(params);
    if (text) return W.parseData(text, params).enemies.map((row, i) => ({ custom: true, id: 'custom-' + i, name: row.name, description: row.description, difficulty: row.level, location: row.terrain, freq_code: row.weight }));
    const creator = { osric: 'OSRIC', lablord: 'LL', bdd: 'BX', bfrpg: 'BFRPG', sandw: 'SW', ssxs: 'SX', mutfut: 'MF', urthe: 'BU', gamma: 'BU', meta: 'BU', tt5e: 'TT', tt7e: 'TT', ttde: 'TT', ww: 'TT', millen: 'BU' }[game] || 'LL';
    const level = W.number(params.level ?? params.x_level, 100, 0, 100) || 100;
    const terrain = params.terrain ?? params.x_terrain ?? '';
    return D.monsters_rpgs.filter(m => {
      const source = game === 'add' ? /^SRC: MM /.test(m.creator) || m.creator === 'ADDDD' || (params.dd_ff === '1' && m.creator.startsWith('SRC: FF ')) || (params.dd_mm2 === '1' && m.creator.startsWith('SRC: MM2 ')) : m.creator === creator || (creator === 'LL' && params.aec === '1' && m.creator.startsWith('AEC')) || (creator === 'OSRIC' && (params.x_mom ?? params.mom ?? params.x_extra) === '1' && m.creator === 'MoM');
      return source && +m.difficulty <= level && (!terrain || m.location.split(' ').includes(terrain)) && (params.swimmer == null || +m.swimmer === +params.swimmer);
    });
  };
  W.monsterPick = params => {
    const monsters = W.monsters(params).filter(m => !m.custom || m.freq_code > 0);
    return monsters.length ? W.weighted(monsters.map(m => ({ value: m, weight: Math.max(1, +m.freq_code) }))) : null;
  };
  W.monsterName = m => m.name.replace(/[\r\n]/g, '').split('^')[0].trim();
  W.monsterLife = function (m, p) {
    if (m.custom) return [];
    const game = W.monsterGame(p), level = W.number(p.level ?? p.x_level, 1, 0), heroes = W.number(p.characters ?? p.x_characters, 0, 0) || int(4, 8), sides = W.number(p.hitDie ?? p.x_hit_dice, 8, 1, 20);
    const post = ['urthe', 'gamma', 'meta', 'mutfut'].includes(game);
    let amount;
    if (W.isTroll({ game }) || ['ww', 'millen'].includes(game)) {
      const stats = W.trollStats(m, { ...p, game }), target = W.number(p.tt_dice, 0, 0, 1000) * 6 + W.number(p.tt_adds, 0, 0, 10000);
      let cumulative = 0, maximum = 1;
      // Preserve the source's accumulating combat-roll comparison, but cap the
      // work for edited bookmarks and an unusually weak creature.
      for (; maximum < 1000; maximum++) {
        cumulative += W.roll(Math.max(1, Math.floor(stats.rating * maximum / 10) + 1) + 'd6');
        if (cumulative > target) break;
      }
      amount = int(1, Math.max(1, maximum - 1));
      return W.range(amount).map(() => Math.max(1, stats.rating));
    }
    if (post) {
      const step = int(0, 12), multiplier = step < 5 ? 1 : step < 8 ? 1.5 : step < 10 ? 1.75 : step < 12 ? 2 : 3;
      amount = int(1, Math.max(1, Math.floor(heroes * multiplier)));
    } else {
      const cap = Math.min(30, +m.m_app_max || 1), monsterLife = ['add', 'ssxs'].includes(game) ? +m.m_hp_max : sides * +m.m_hp_max + +m.m_hp_mod;
      let average = monsterLife > 0 ? Math.round(6 * level * heroes / monsterLife) : 1;
      average = Math.max(1, Math.min(cap, average));
      amount = int(1, average);
      if (amount > int(heroes, Math.max(heroes, level * heroes))) amount = int(heroes, Math.max(heroes, level * heroes + int(1, Math.max(1, level))));
      amount = int(Math.max(1, amount - 2), amount + 2);
      if (!level) amount = int(1, 10);
      if (+m.m_app_max <= 1) amount = 1;
    }
    return W.range(Math.min(1000, amount)).map(() => {
      if (post) {
        if (game === 'mutfut') return Math.max(1, int(+m.m_hp_min || 1, +m.m_hp_max || 1));
        const min = W.number(p.mightMin ?? p.x_might1, 1, 1, 100), max = ['gamma', 'meta'].includes(game) ? 6 : W.number(p.mightMax ?? p.x_might2, 8, 1, 100);
        return +m.difficulty < 1 ? W.d(4) : W.range(Math.min(100, Math.ceil(+m.difficulty))).reduce(sum => sum + int(min, min * max), 0);
      }
      if (['add', 'ssxs'].includes(game)) return Math.max(1, int(+m.m_hp_min || 1, +m.m_hp_max || 1));
      const min = +m.m_hp_min || 0, max = +m.m_hp_max || 0, mod = +m.m_hp_mod || 0;
      let life = mod;
      if (min < 1 && max < 1) life = ({ 90000: () => 1, 91000: () => 2, 1: () => int(1, 2), 4: () => W.d(4), 5: () => W.d(4) + 1, 8: () => int(4, 8), 2: () => int(2, 4), 3: () => W.d(3), 6: () => W.d(6) })[mod]?.() ?? mod;
      const dice = int(min, max);
      return Math.max(1, life + (dice > 0 ? W.roll(Math.min(1000, dice) + 'd' + sides) : 0));
    });
  };
  const common = [W.gameField, f('level', 'Maximum difficulty (0 = any)', 'number', { value: 0, min: 0, max: 100 }), f('terrain', 'Terrain', 'select', { value: '', options: W.terrains }), f('aec', 'Include AEC', 'checkbox'), f('x_mom', 'Include Monsters of Myth (OSRIC)', 'checkbox'), f('dd_ff', 'Include Fiend Folio (AD&D)', 'checkbox'), f('dd_mm2', 'Include Monster Manual II (AD&D)', 'checkbox'), f('mutate', 'Mutated animals', 'checkbox'), f('ttlvl', 'T&T difficulty', 'select', { value: 1, options: [[9, 'Easy'], [1, 'Normal'], [2, 'Challenging'], [3, 'Difficult'], [4, 'Heroic'], [5, 'Epic']] }), f('describe', 'Show descriptions', 'checkbox', { value: 1 })];
  W.register('wander', 'Wandering Enemies', 'Make a numbered table of wandering enemies for your game and terrain, or use a custom data file.', [...common, W.countField('Table entries', 10), ...W.dataFields], p => {
    const options = { ...p, game: W.monsterGame(p) }, candidates = W.monsters(options);
    if (!candidates.length) return '<p>No Enemies Found! Try a different terrain or difficulty.</p>';
    let available = [];
    const rows = W.range(W.count(p, 'x_amount')).map(i => {
      let monster;
      if (candidates[0].custom) {
        if (!available.length) available = candidates.slice();
        monster = available.splice(int(0, available.length - 1), 1)[0];
      } else monster = W.monsterPick(options);
      return [i, W.monsterStats(monster, (p.describe ?? p.x_describe ?? '1') === '1', options)];
    });
    W.storage.set('wandering-enemies', { options: p, rows });
    return W.table(['Roll', 'Enemy'], rows);
  });
  W.register('encounters', 'Encounter Creation', 'Generate encounters with a selected creature, each with its own group size and hit points.', [...common, f('enemy', 'Enemy name or original ID (optional)', 'text'), W.countField('Encounters'), f('characters', 'Characters and followers (0 = random)', 'number', { value: 0, min: 0, max: 100 }), f('hitDie', 'Hit die size', 'select', { value: 8, options: [6, 8] }), f('tt_dice', 'T&T group dice', 'number', { value: 0, min: 0, max: 1000 }), f('tt_adds', 'T&T group adds', 'number', { value: 0, min: 0, max: 10000 })], p => {
    const options = { ...p, game: W.monsterGame(p) }, query = String(p.enemy ?? p.x_enemy ?? '').trim();
    const candidates = W.monsters({ ...options, level: 0, terrain: '' });
    const monster = query ? candidates.find(m => String(m.id) === query || W.monsterName(m).toLowerCase() === query.toLowerCase()) : W.monsterPick(options);
    if (!monster) return '<p>No matching enemy found for this game.</p>';
    return W.table(['Encounter', 'Creatures and statistics'], W.range(W.count(p, 'x_amount')).map(i => {
      const life = W.monsterLife(monster, options), troll = W.isTroll(options), rating = life.reduce((sum, n) => sum + n, 0);
      return [i, `<section class="encounter">${W.monsterStats(monster, (p.describe ?? '1') === '1', options)}<p>There ${life.length === 1 ? 'is' : 'are'} ${life.length} in this area. ${troll ? 'MR: ' + rating + '; DICE: ' + (Math.floor(rating / 10) + 1) + ' + ' + Math.ceil(rating / 2) + '; ' : ''}<b>${options.game === 'urthe' ? 'STAMINA' : troll ? 'MR' : 'HIT POINTS'}:</b> ${life.join(', ')}</p></section>`];
    }));
  });
  W.register('lists', 'Monster Listing', 'List creatures in columns or stat blocks, sorted by name or difficulty, optionally grouped by terrain.', [...common, f('sorting', 'Sort by', 'select', { value: 1, options: [[1, 'Name'], [2, 'Level']] }), f('type', 'Report type', 'select', { value: 1, options: [[1, 'List'], [2, 'Terrain']] }), f('statb', 'Appearance', 'select', { value: 2, options: [[1, 'Columns'], [2, 'Stat blocks']] }), f('show_terrain', 'Include terrain codes', 'checkbox'), ...W.dataFields], p => {
    const options = { ...p, game: W.monsterGame(p), noNames: '1' }, monsters = W.monsters(options).slice();
    monsters.sort((a, b) => (String(p.sorting) === '2' ? (options.game.startsWith('tt') ? +a.m_hp_min + +a.ac + +a.difficulty - (+b.m_hp_min + +b.ac + +b.difficulty) : +a.difficulty - +b.difficulty) : 0) || W.monsterName(a).localeCompare(W.monsterName(b)));
    if (!monsters.length) return '<p>No Enemies Found!</p>';
    const render = pool => {
      if (String(p.statb) !== '1' || pool[0]?.custom) return W.table(['ID', 'Monster'], pool.map(m => [m.id, W.monsterStats(m, (p.describe ?? p.x_describe) === '1', options) + (p.show_terrain === '1' ? '<br>Terrain: ' + esc(m.location) : '')]));
      const headings = [...new Set(pool.flatMap(m => W.monsterFields(m, options).map(([label]) => label)))];
      return W.table(['Monster', ...headings, ...(p.show_terrain === '1' ? ['Terrain'] : [])], pool.map(m => {
        const fields = Object.fromEntries(W.monsterFields(m, options));
        return [esc(W.monsterName(m)), ...headings.map(label => esc(W.plainText(fields[label]))), ...(p.show_terrain === '1' ? [esc(m.location)] : [])];
      }));
    };
    if (String(p.type) !== '2') return render(monsters);
    const terrains = W.terrains.filter(([code]) => code && (options.game === 'bdd' || code !== 'LW') && (['bdd', 'mutfut'].includes(options.game) || !['TW', 'VG'].includes(code)) && (['urthe', 'gamma', 'meta', 'mutfut', 'millen'].includes(options.game) || code !== 'RD'));
    return terrains.map(([code, name]) => {
      const water = ['FW', 'SW'].includes(code);
      return (water ? [0, 1] : [null]).map(swimmer => {
        const pool = monsters.filter(m => m.location.split(' ').includes(code) && (swimmer == null || +m.swimmer === swimmer));
        return pool.length ? `<section class="monster-terrain"><h3>${esc(name + (water ? swimmer ? ', Below' : ', Above' : ''))}</h3>${render(pool)}</section>` : '';
      }).join('');
    }).join('');
  });
})(window.WZ, window.WZ_DATA);
