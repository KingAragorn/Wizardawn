(function (W, D) {
  'use strict';
  const f = W.field, esc = W.escape, int = (a, b) => W.rng.int(a, b), pick = a => W.pick(a);
  const enabled = (p, key, fallback = true) => String(p[key] ?? (fallback ? 1 : 0)) === '1';
  const basics = { cleric: 'Cleric', dwarf: 'Dwarf', elf: 'Elf', fighter: 'Fighter', halfling: 'Halfling', mage: 'Magic-User', thief: 'Thief' };
  const advanced = { assassin: 'Assassin', cleric: 'Cleric', druid: 'Druid', fighter: 'Fighter', illusionist: 'Illusionist', mage: 'Magic-User', paladin: 'Paladin', ranger: 'Ranger', thief: 'Thief' };
  const bonus = value => value < 4 ? -3 : value < 6 ? -2 : value < 9 ? -1 : value < 13 ? 0 : value < 16 ? 1 : value < 18 ? 2 : 3;
  const signed = value => value > 0 ? '+' + value : String(value);
  const allowed = { Dwarf: ['Assassin', 'Cleric', 'Fighter', 'Thief'], Elf: ['Assassin', 'Cleric', 'Fighter', 'Thief', 'Magic-User'], Gnome: ['Assassin', 'Cleric', 'Fighter', 'Thief', 'Illusionist'], 'Half-Elf': ['Assassin', 'Cleric', 'Druid', 'Fighter', 'Ranger', 'Thief', 'Magic-User'], Halfling: ['Fighter', 'Druid', 'Thief'], 'Half-Orc': ['Assassin', 'Cleric', 'Fighter', 'Thief'], Human: Object.values(advanced) };
  W.basicAttacks = function (className, level, rules) {
    let row;
    if (rules === 'bx') {
      if (['Cleric', 'Thief'].includes(className)) row = level < 5 ? 2 : level < 9 ? 3 : level < 13 ? 4 : 5;
      else if (className === 'Magic-User') row = level < 6 ? 2 : level < 11 ? 3 : 4;
      else row = level < 1 ? 1 : level < 4 ? 2 : level < 7 ? 3 : level < 10 ? 4 : level < 13 ? 5 : 6;
    } else {
      if (['Cleric', 'Thief'].includes(className)) row = level < 4 ? 2 : level < 6 ? 3 : level < 9 ? 4 : level < 11 ? 5 : level === 11 ? 6 : level === 12 ? 7 : level < 15 ? 8 : level < 17 ? 9 : level < 19 ? 10 : 11;
      else if (className === 'Magic-User') row = level < 4 ? 2 : level < 8 ? 3 : level < 11 ? 4 : level < 13 ? 5 : level === 13 ? 6 : level < 16 ? 7 : level < 19 ? 8 : 9;
      else row = level < 1 ? 1 : level < 3 ? 2 : level < 7 ? level : level < 9 ? 7 : level === 9 ? 8 : level < 12 ? 9 : Math.min(17, level - 2);
    }
    return D.characterRules[rules].attacks[row];
  };
  function characterSpells(className, level, slots, rules, intelligence) {
    const mage = ['Magic-User', 'Elf', 'Illusionist'].includes(className), spells = [];
    slots.forEach((count, i) => {
      if (!count) return;
      const spellLevel = i + 1;
      let pool;
      if (rules !== 'osric' && mage) pool = D.characterRules[rules].magicSpells[spellLevel] || [];
      else pool = (rules === 'osric' ? D.osric_spells : D.lablord_spells).filter(row => rules === 'osric' ? row.mage === className && +row.level === spellLevel : row.ls_class === (mage ? 'Mage' : 'Cleric') && +row.ls_level === spellLevel).map(row => row.name || row.ls_name);
      if (!pool.length) return;
      let known = mage ? Math.max(2, Math.ceil(level / 2 - spellLevel) + int(0, 1)) : pool.length;
      if (mage && known < 3) known = int(2, 3);
      known = Math.min(known, pool.length, intelligence < 9 ? 4 : intelligence < 13 ? 6 : intelligence < 16 ? 9 : 100);
      const remaining = pool.slice(), chosen = [];
      for (let j = 0; j < known; j++) chosen.push(remaining.splice(int(0, remaining.length - 1), 1)[0]);
      spells.push({ level: spellLevel, slots: count, names: chosen.sort() });
    });
    return spells;
  }
  W.character = function (p = {}, rules = 'll', className = 'Fighter', race) {
    const osric = rules === 'osric', game = rules === 'bx' ? 'bdd' : osric ? 'osric' : 'lablord';
    const low = W.number(p.x_lvl1 ?? p.minLevel, 1, 1, osric ? 24 : rules === 'bx' ? 14 : 20), high = W.number(p.x_lvl2 ?? p.maxLevel, rules === 'bx' ? 14 : 20, 1, osric ? 24 : rules === 'bx' ? 14 : 20);
    let level = int(Math.min(low, high), high);
    const sex = ['Male', 'Female'].includes(p.x_sex) ? p.x_sex : pick(osric ? ['Male', 'Male', 'Female'] : ['Male', 'Female']);
    if (osric) {
      const pool = Object.keys(allowed).filter(r => allowed[r].includes(className));
      race = pool.includes(race || p.x_race) ? race || p.x_race : pick(pool);
    } else race = ['Dwarf', 'Elf', 'Halfling'].includes(className) ? className : 'Human';
    const stats = Object.fromEntries(['STR', 'DEX', 'CON', 'INT', 'WIS', 'CHA'].map(key => [key, int(3, 18)]));
    const prime = ({ Cleric: 'WIS', Druid: 'WIS', Dwarf: 'STR', Elf: 'STR', Fighter: 'STR', Paladin: 'CHA', Ranger: 'STR', 'Magic-User': 'INT', Illusionist: 'INT', Thief: 'DEX', Assassin: 'DEX' })[className];
    if (prime) stats[prime] = Math.max(...W.range(4).map(() => int(3, 18)));
    if (className === 'Dwarf') stats.CON = Math.max(9, stats.CON);
    if (className === 'Elf') stats.INT = Math.max(9, stats.INT);
    if (className === 'Halfling') { stats.CON = Math.max(9, stats.CON); stats.DEX = Math.max(9, stats.DEX); }
    let limit = !osric ? ({ Dwarf: 12, Elf: 10, Halfling: 8 })[className] || 20 : race === 'Human' || className === 'Thief' ? 24 : race === 'Halfling' ? 4 : race === 'Dwarf' ? className === 'Cleric' ? 8 : 9 : race === 'Elf' ? className === 'Magic-User' ? 11 : 7 : race === 'Gnome' ? className === 'Illusionist' ? 7 : 6 : 12;
    level = Math.min(level, limit);
    if (osric) {
      const minimums = { Assassin: { STR: 12, DEX: 12, INT: 11 }, Cleric: { WIS: 9 }, Druid: { WIS: 12, CHA: 15 }, Fighter: { STR: 9, CON: 7 }, Illusionist: { INT: 15, DEX: 16 }, 'Magic-User': { INT: 9, DEX: 6 }, Paladin: { STR: 12, CON: 9, INT: 9, WIS: 13, CHA: 17 }, Ranger: { STR: 13, CON: 14, INT: 13, WIS: 14 }, Thief: { DEX: 9 } }[className];
      for (const [key, value] of Object.entries(minimums)) stats[key] = Math.max(value, stats[key]);
    }
    const progression = osric ? D.characterRules.osric[className] : D.characterRules[rules].progression[className][level];
    const hitDie = osric ? progression.hitDie : ({ Dwarf: 8, Fighter: 8, Thief: 4, 'Magic-User': 4 })[className] || 6;
    const endDice = osric ? ({ Cleric: 9, Fighter: 9, Paladin: 9, Ranger: 11, Thief: 10, Assassin: 10, Illusionist: 10, 'Magic-User': 11, Druid: 14 })[className] : className === 'Halfling' ? 8 : 9;
    const extra = osric ? ['Fighter', 'Paladin'].includes(className) ? 3 : ['Ranger', 'Cleric', 'Thief'].includes(className) ? 2 : 1 : ['Dwarf'].includes(className) ? 3 : ['Fighter', 'Elf', 'Thief'].includes(className) ? 2 : 1;
    const conBonus = osric ? stats.CON < 4 ? -2 : stats.CON < 7 ? -1 : stats.CON < 15 ? 0 : stats.CON === 15 ? 1 : ['Fighter', 'Paladin', 'Ranger'].includes(className) ? Math.min(5, stats.CON - 14) : 2 : bonus(stats.CON);
    const hitPoints = W.range(level).reduce((hp, i) => hp + (i > endDice ? extra : Math.max(1, (enabled(p, 'x_maxhp', false) ? hitDie : W.d(hitDie)) + conBonus)), 0);
    const slots = osric ? progression.slots[level] || [] : progression.spells || [];
    const saves = osric ? progression.saves.find(row => level >= row.min)?.values || [14, 16, 13, 12, 15] : D.characterRules[rules].saves.find(row => row.class === className && level >= row.min && level <= row.max).values;
    const xpMin = osric ? progression.xp[level] || 0 : progression.xp1, xpMax = osric ? progression.xp[level + 1] || xpMin : progression.xp2;
    const xp = enabled(p, 'x_rand_xp', false) && xpMax > xpMin ? int(xpMin, xpMax - 1) : xpMin;
    const name = W.name(race === 'Dwarf' ? 'dwarf' : race === 'Elf' || race === 'Half-Elf' ? sex === 'Female' ? 'elf_f' : 'elf_m' : ['Halfling', 'Gnome'].includes(race) ? 'gnome' : /Magic|Illusion/.test(className) && W.d(2) === 1 ? 'wizard' : sex === 'Female' ? 'female' : 'male');
    const alignment = osric ? className === 'Paladin' ? 'LG' : className === 'Druid' ? 'N' : className === 'Assassin' ? pick(['LE', 'NE', 'CE']) : className === 'Ranger' ? pick(['LG', 'NG', 'CG']) : pick(['LG', 'LN', 'LE', 'NG', 'N', 'NE', 'CG', 'CN', 'CE']) : pick(['Lawful', 'Neutral', 'Chaotic']);
    const armored = !['Magic-User', 'Illusionist', 'Thief', 'Assassin'].includes(className), armor = armored ? pick(['leather armor', 'chain mail', 'plate mail']) : /Thief|Assassin/.test(className) ? 'leather armor' : 'robes';
    const ac = (rules === 'bx' || rules === 'll' ? 9 : 10) - ({ 'leather armor': 2, 'chain mail': 4, 'plate mail': 6, robes: 0 })[armor] - bonus(stats.DEX);
    const weapon = /Magic|Illusion/.test(className) ? pick(['dagger', 'quarterstaff']) : className === 'Cleric' ? pick(['mace', 'war hammer', 'flail']) : className === 'Halfling' ? 'short sword' : pick(['long sword', 'short sword', 'battle axe', 'spear']);
    const skills = [];
    if (className === 'Thief' || className === 'Assassin') {
      const values = osric ? [Math.min(99, 80 + (level - 1) * 2), Math.min(99, 25 + (level - 1) * 4), Math.min(99, 10 + (level - 1) * 3), Math.min(99, 20 + (level - 1) * 5), Math.min(99, 20 + (level - 1) * 5), Math.min(99, 30 + (level - 1) * 4), Math.min(99, 35 + (level - 1) * 4), Math.min(99, Math.max(1, level * 5 - 5))] : progression.steal || [];
      const labels = osric ? ['Climb Walls', 'Find Traps', 'Hear Noise', 'Hide in Shadows', 'Move Quietly', 'Open Locks', 'Pick Pockets', 'Read Languages'] : ['Pick Locks', 'Find/Remove Traps', 'Pick Pockets', 'Move Silently', 'Climb Walls', 'Hide in Shadows', 'Hear Noise'];
      skills.push(...values.map((value, i) => labels[i] + ': ' + value + (i === 6 && !osric ? ' on 1d6' : '%')), 'Backstab: +4 to hit, ' + (osric ? Math.min(5, Math.floor((level - 1) / 4) + 2) : 2) + '× damage');
    }
    if (race === 'Dwarf') skills.push('Infravision 60 feet; detect stone traps, new construction and sloping passages');
    if (race === 'Elf') skills.push('Infravision 60 feet; detect secret doors; immunity to ghoul paralysis');
    if (race === 'Halfling') skills.push('Hide outdoors: 90%; hide indoors: 2 in 6; +1 to missile attacks');
    if (className === 'Cleric') skills.push('Turn undead');
    const languages = ['Common', ...(race !== 'Human' ? [race === 'Elf' ? 'Elvish' : race === 'Dwarf' ? 'Dwarvish' : race] : [])];
    const languagePool = ['Dwarvish', 'Elvish', 'Gnomish', 'Goblin', 'Halfling', 'Kobold', 'Orcish', 'Hobgoblin', 'Bugbear', 'Gnoll', 'Ogre', 'Dragon'];
    for (let i = 0; i < Math.max(0, bonus(stats.INT)); i++) { const options = languagePool.filter(x => !languages.includes(x)); languages.push(pick(options)); }
    return { game, rules, name, className, race, level, sex, stats, hitDie, hitPoints, saves, xp, slots, spells: characterSpells(className, level, slots, rules, stats.INT), skills, languages, ac, armor, weapon, alignment, age: int(16, 30) + level + (race === 'Elf' ? 100 : race === 'Dwarf' ? 40 : 0), attacks: osric ? W.range(11, -1).map(ac => Math.max(2, 21 - Math.ceil(level / (armored ? 1 : 2)) - ac)) : W.basicAttacks(className, level, rules), equipment: enabled(p, 'x_show_eq') ? W.pack({ ...p, game }) : '', coins: int(10, 100) * level + 'gp' };
  };
  W.renderCharacter = function (c, p = {}) {
    const named = enabled(p, 'x_name'), sheet = p.x_output === 'Character Sheets';
    const title = (named ? c.name + ' — ' : '') + `${c.sex} ${c.className}, Level ${c.level}`;
    const saveLabels = c.rules === 'bx' ? ['Death/Poison', 'Wands', 'Paralysis/Stone', 'Breath', 'Spells/Rods/Staves'] : c.rules === 'll' ? ['Breath', 'Poison/Death', 'Petrify/Paralyze', 'Wands', 'Spells'] : ['Poison/Death', 'Breath', 'Wands', 'Petrify/Paralyze', 'Spells'];
    let html = `<article class="character${sheet ? ' character-sheet' : ''}"><h3>${esc(title)}</h3><p>${c.rules === 'osric' ? esc(c.race) + '; ' : ''}${enabled(p, 'x_show_al') ? 'Alignment: ' + esc(c.alignment) + '; ' : ''}${enabled(p, 'x_show_age', false) ? 'Age: ' + c.age + '; ' : ''}<b>AC:</b> ${c.ac}; <b>HP:</b> ${c.hitPoints}; <b>XP:</b> ${c.xp.toLocaleString('en-US')}</p>`;
    html += W.table(Object.keys(c.stats), [Object.values(c.stats)]) + '<h4>Saving Throws</h4>' + W.table(saveLabels, [c.saves]);
    html += '<h4>Attack Rolls</h4>' + W.table(c.attacks.map((_, i) => 'AC ' + (c.rules === 'bx' ? 9 - i : c.rules === 'll' ? i - 3 : i - 1)), [c.attacks]);
    if (enabled(p, 'x_lang_set')) html += '<p><b>Languages:</b> ' + esc(c.languages.join(', ')) + '</p>';
    if (enabled(p, 'x_show_sk') && c.skills.length) html += '<p><b>Skills &amp; Abilities:</b> ' + esc(c.skills.join('; ')) + '</p>';
    if (c.slots.length) html += '<p><b>Spells per day:</b> ' + c.slots.join(' / ') + '</p>';
    if (enabled(p, 'x_show_ss', false)) html += c.spells.map(s => `<p><b>Spell Book — Level ${s.level}:</b> ${esc(s.names.join(', '))}</p>`).join('');
    if (enabled(p, 'x_show_eq')) html += `<p><b>Equipment:</b> ${esc(c.weapon)}, ${esc(c.armor)}; ${esc(c.equipment)} <b>Coins:</b> ${esc(c.coins)}${enabled(p, 'x_relics', false) ? '; <b>Magic Items:</b> ' + esc(W.artifactName(pick(['Ring', 'Sword', 'Amulet', 'Cloak']))) + ' (+' + int(1, 3) + ')' : ''}</p>`;
    if (named && enabled(p, 'x_show_me')) html += '<p><b>Description:</b> ' + W.citizen({ ...p, game: c.game, possessions: '0', dress: '1' }, 'rules', { race: c.race, sex: c.sex }).html.replace(/^.*?\] /, '') + '</p>';
    return html + '</article>';
  };
  for (const [route, rules, title] of [['bxadvg', 'bx', 'Adventurers Guild — BD&D'], ['ladvg', 'll', 'Adventurers Guild — Labyrinth Lord'], ['oadvg', 'osric', 'Adventurers Guild — OSRIC']]) {
    const classes = rules === 'osric' ? advanced : basics;
    const fields = [f('x_output', 'Output', 'select', { value: 'Character Listing', options: ['Character Listing', 'Character Sheets'] }), f('x_lvl1', 'Minimum level', 'number', { value: 1, min: 1, max: rules === 'bx' ? 14 : 20 }), f('x_lvl2', 'Maximum level', 'number', { value: rules === 'bx' ? 14 : 20, min: 1, max: rules === 'bx' ? 14 : 24 }), f('x_sex', 'Gender', 'select', { value: 'Any', options: ['Any', 'Male', 'Female'] }), ...(rules === 'osric' ? [f('x_race', 'Race', 'select', { value: 'Any', options: ['Any', ...Object.keys(allowed)] })] : []), ...Object.entries(classes).map(([key, label]) => f('x_qty_' + key, label, 'number', { value: 0, min: 0, max: 20 })), ...[['x_name', 'Name characters', 1], ['x_show_al', 'Alignment', 1], ['x_show_eq', 'Equipment', 1], ['x_show_sk', 'Skills and abilities', 1], ['x_show_ss', 'Spell books', 0], ['x_lang_set', 'Choose languages', 1], ['x_show_me', 'Descriptions', 1], ['x_show_age', 'Age', 0], ['x_maxhp', 'Maximum hit points', 0], ['x_rand_xp', 'Random experience', 0], ['x_relics', 'Magic items', 0]].map(([key, label, value]) => f(key, label, 'checkbox', { value }))];
    W.register(route, title, 'Create adventurers with attributes, saving throws, attack rolls, equipment, languages, skills and spells.', fields, p => {
      let requests = Object.entries(classes).flatMap(([key, className]) => W.range(W.number(p['x_qty_' + key], 0, 0, 20)).map(() => className));
      if (!requests.length) requests = W.range(W.count(p)).map(() => 'Fighter');
      const characters = requests.map(className => W.character(p, rules, className));
      W.storage.set('last-characters', { options: p, rules, characters });
      return characters.map(c => W.renderCharacter(c, p)).join('');
    });
    W.routes[route].defaultGame = rules === 'bx' ? 'bdd' : rules === 'll' ? 'lablord' : 'osric';
  }
})(window.WZ, window.WZ_DATA);
