(function (W, D) {
  'use strict';
  const esc = W.escape, f = W.field;
  W.terrains = [['', 'Any'], ['DG', 'Dungeon / ruins'], ['PF', 'Forest'], ['PH', 'Hills'], ['PM', 'Mountains'], ['PP', 'Plains'], ['PS', 'Swamp'], ['PD', 'Desert'], ['FW', 'Freshwater'], ['SW', 'Sea'], ['RD', 'Wastelands'], ['TW', 'Settlement'], ['CF', 'Snowy forest'], ['CH', 'Snowy hills'], ['CM', 'Snowy mountains'], ['CP', 'Snowy plains'], ['TF', 'Jungle forest'], ['TH', 'Tropical hills'], ['TM', 'Tropical mountains'], ['TS', 'Tropical swamp'], ['VG', 'Village'], ['LW', 'Lost world']];
  W.monsters = function (params) {
    const game = W.game(params).slug;
    const creator = { osric: 'OSRIC', lablord: 'LL', bdd: 'BX', bfrpg: 'BFRPG', sandw: 'SW', ssxs: 'SX', mutfut: 'MF', urthe: 'BU', gamma: 'BU', meta: 'BU', tt5e: 'TT', tt7e: 'TT', ttde: 'TT', ww: 'TT', millen: 'BU' }[game] || 'LL';
    const level = W.number(params.level ?? params.x_level, 100, 0, 100) || 100;
    const terrain = params.terrain ?? params.x_terrain ?? '';
    return D.monsters_rpgs.filter(m => {
      const source = game === 'add' ? /^SRC: MM \(/.test(m.creator) || (params.dd_ff === '1' && m.creator.startsWith('SRC: FF')) || (params.dd_mm2 === '1' && m.creator.startsWith('SRC: MM2')) : m.creator === creator || (creator === 'LL' && params.aec === '1' && m.creator.startsWith('AEC')) || (creator === 'OSRIC' && params.x_mom === '1' && m.creator === 'MoM');
      return source && +m.difficulty <= level && (!terrain || m.location.split(' ').includes(terrain));
    });
  };
  W.monsterPick = params => {
    const monsters = W.monsters(params);
    return monsters.length ? W.weighted(monsters.map(m => ({ value: m, weight: Math.max(1, +m.freq_code) }))) : null;
  };
  W.monsterName = m => m.name.replace(/[\r\n]/g, '').split('^')[0].trim();
  W.monsterStats = function (m, describe = false) {
    const stats = [['AC', m.ac], ['HD', m.hd], ['Move', m.move], ['Attacks', m.atk], ['Damage', m.dmg], ['Special attacks', m.spatk], ['Special defenses', m.spdef], ['Magic resistance', m.mr], ['Alignment', m.al], ['XP', m.xp]].filter(([, v]) => v !== '' && v != null);
    return `<strong>${esc(W.monsterName(m))}</strong><br>${stats.map(([k, v]) => `<b>${k}:</b> ${esc(String(v).trim())}`).join('; ')}${describe && m.description ? '<p>' + esc(m.description) + '</p>' : ''}`;
  };
  function hp(monster, params) {
    if (monster.creator === 'BU') return Math.max(1, +monster.hd || 1);
    const source = monster.hd.replace(/\*/g, '').trim();
    const dice = /(\d*)d(\d+)(?:\s*([+-])\s*(\d+))?/i.exec(source);
    if (dice) return Math.max(1, W.roll(dice[0]));
    const match = /^(\d+)(?:\s*([+-])\s*(\d+))?/.exec(source);
    if (!match) return W.d(8);
    const sides = W.number(params.hitDie ?? params.x_hit_dice, 8, 1, 20);
    return Math.max(1, W.roll(`${Math.min(100, +match[1])}d${sides}`) + (match[2] === '-' ? -1 : 1) * +(match[3] || 0));
  }
  const common = [W.gameField, f('level', 'Maximum difficulty (0 = any)', 'number', { value: 0, min: 0, max: 100 }), f('terrain', 'Terrain', 'select', { value: '', options: W.terrains }), f('aec', 'Include AEC', 'checkbox'), f('x_mom', 'Include Monsters of Myth (OSRIC)', 'checkbox'), f('dd_ff', 'Include Fiend Folio (AD&D)', 'checkbox'), f('dd_mm2', 'Include Monster Manual II (AD&D)', 'checkbox'), f('describe', 'Show descriptions', 'checkbox', { value: 1 })];
  W.register('wander', 'Wandering Enemies', 'Make a numbered table of wandering enemies for your game and terrain.', [...common, W.countField('Table entries', 10)], p => {
    const candidates = W.monsters(p);
    if (!candidates.length) return '<p>No Enemies Found! Try a different terrain or difficulty.</p>';
    const rows = W.range(W.count(p, 'x_amount')).map(i => {
      const monster = W.monsterPick(p);
      return [i, W.monsterStats(monster, (p.describe ?? p.x_describe ?? '1') === '1')];
    });
    // Replace the original invalid INSERT and temporary tables with local data.
    W.storage.set('wandering-enemies', { options: p, rows });
    return W.table(['Roll', 'Enemy'], rows);
  });
  W.register('encounters', 'Encounter Creation', 'Choose an enemy by name or number, or generate a random encounter. Each creature receives its own hit point roll.', [...common, f('enemy', 'Enemy name or original ID (optional)', 'text'), W.countField('Creatures'), f('hitDie', 'Hit die size', 'select', { value: 8, options: [6, 8] })], p => {
    const query = String(p.enemy ?? p.x_enemy ?? '').trim();
    const candidates = W.monsters({ ...p, level: 0, terrain: '' });
    const monster = query ? candidates.find(m => String(m.id) === query || W.monsterName(m).toLowerCase() === query.toLowerCase()) : W.monsterPick(p);
    if (!monster) return '<p>No matching enemy found for this game.</p>';
    return `<section class="encounter">${W.monsterStats(monster, (p.describe ?? '1') === '1')}${W.table(['Creature', 'Hit points'], W.range(W.count(p, 'x_amount')).map(i => [i, hp(monster, p)]))}</section>`;
  });
  W.register('lists', 'Monster Listing', 'List monsters for your game, difficulty and terrain.', common, p => {
    const monsters = W.monsters(p).slice().sort((a, b) => W.monsterName(a).localeCompare(W.monsterName(b)));
    if (!monsters.length) return '<p>No Enemies Found!</p>';
    return W.table(['ID', 'Monster'], monsters.map(m => [m.id, W.monsterStats(m, p.describe === '1')]));
  });
})(window.WZ, window.WZ_DATA);
