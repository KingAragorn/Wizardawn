(function (W, D) {
  'use strict';
  const f = W.field, esc = W.escape, int = (a, b) => W.rng.int(a, b), pick = a => W.pick(a);
  const enabled = (p, key, fallback = true) => String(p[key] ?? (fallback ? 1 : 0)) === '1';
  const basics = { cleric: 'Cleric', dwarf: 'Dwarf', elf: 'Elf', fighter: 'Fighter', halfling: 'Halfling', mage: 'Magic-User', thief: 'Thief' };
  const advanced = { assassin: 'Assassin', cleric: 'Cleric', druid: 'Druid', fighter: 'Fighter', illusionist: 'Illusionist', mage: 'Magic-User', paladin: 'Paladin', ranger: 'Ranger', thief: 'Thief' };
  const bonus = value => value < 4 ? -3 : value < 6 ? -2 : value < 9 ? -1 : value < 13 ? 0 : value < 16 ? 1 : value < 18 ? 2 : 3;
  const signed = value => value > 0 ? '+' + value : String(value);
  const allowed = { Dwarf: ['Assassin', 'Cleric', 'Fighter', 'Thief'], Elf: ['Assassin', 'Cleric', 'Fighter', 'Thief', 'Magic-User'], Gnome: ['Assassin', 'Cleric', 'Fighter', 'Thief', 'Illusionist'], 'Half-Elf': ['Assassin', 'Cleric', 'Fighter', 'Ranger', 'Thief', 'Magic-User'], Halfling: ['Fighter', 'Druid', 'Thief'], 'Half-Orc': ['Assassin', 'Cleric', 'Fighter', 'Thief'], Human: Object.values(advanced) };
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
  function characterSpells(className, level, slots, rules, intelligence, advancedSheet = false) {
    const mage = ['Magic-User', 'Elf', 'Illusionist'].includes(className), spells = [];
    slots.forEach((count, i) => {
      if (!count) return;
      const spellLevel = i + 1;
      let pool;
      if (rules !== 'osric' && mage) pool = D.characterRules[rules].magicSpells[spellLevel] || [];
      else pool = (rules === 'osric' ? D.osric_spells : D.lablord_spells).filter(row => rules === 'osric' ? row.mage === className && +row.level === spellLevel : row.ls_class === (mage ? 'Mage' : 'Cleric') && +row.ls_level === spellLevel).map(row => row.name || row.ls_name);
      if (!pool.length) return;
      let known = mage ? Math.max(2, Math.ceil(level / 2 - spellLevel) + int(0, 1)) : pool.length;
      if (mage && known < 2) known = int(2, 3);
      const cap = rules === 'll' && advancedSheet ? D.characterDetails.attributes.ll[intelligence].aecmod6 : 100;
      known = Math.min(known, pool.length, cap === 'Unlimited' ? 100 : +cap || 100);
      const remaining = pool.slice(), chosen = [];
      for (let j = 0; j < known; j++) chosen.push(remaining.splice(int(0, remaining.length - 1), 1)[0]);
      spells.push({ level: spellLevel, slots: count, names: chosen.sort() });
    });
    return spells;
  }
  W.basicAttribute = function (rules, type, score, className, advancedSheet = false) {
    const row = { ...D.characterDetails.attributes[rules][score] };
    if (!['Magic-User', 'Elf'].includes(className)) row.aecmod4 = row.aecmod5 = row.aecmod6 = '-';
    if (className !== 'Cleric') { row.aecmod7 = '0'; row.aecmod8 = '-'; }
    const display = value => !value || value === '0' ? '-' : value;
    const fields = { STR: ['mod1'], DEX: ['mod2', 'mod3', 'mod4'], CON: ['mod5'], INT: ['mod6'], WIS: ['mod7'], CHA: ['mod8', 'mod9', 'mod10'] };
    if (rules === 'll' && advancedSheet) {
      fields.CON.push('aecmod1', 'aecmod2', 'aecmod3');
      fields.INT.push('aecmod4', 'aecmod5', 'aecmod6');
      fields.WIS.push('aecmod7', 'aecmod8');
    }
    return fields[type].map(key => display(row[key])).join(' / ');
  };
  W.experienceBonus = function (rules, className, stats) {
    const penalty = rules === 'bx' ? -20 : -10, lesserPenalty = penalty / 2;
    const primary = stats[({ Cleric: 'WIS', Thief: 'DEX', 'Magic-User': 'INT' })[className] || 'STR'];
    let value;
    if (className === 'Elf') value = stats.STR < 6 || stats.INT < 6 ? penalty : stats.STR < 9 || stats.INT < 6 ? lesserPenalty : stats.STR > 15 && stats.INT > 15 ? 10 : stats.STR > 12 && stats.INT > 12 ? 5 : 0;
    else if (className === 'Halfling') value = stats.STR < 6 || stats.DEX < 6 ? penalty : stats.STR < 9 || stats.DEX < 6 ? lesserPenalty : stats.STR > 12 && stats.DEX > 12 ? 10 : stats.STR > 12 || stats.DEX > 12 ? 5 : 0;
    else value = primary < 6 ? penalty : primary < 9 ? lesserPenalty : primary > 15 ? 10 : primary > 12 ? 5 : 0;
    return value;
  };
  W.osricSpellSlots = function (className, level, wisdom) {
    const extra = ({ 13: [1], 14: [2], 15: [2, 1], 16: [2, 2], 17: [2, 2, 1], 18: [2, 2, 1, 1], 19: [3, 2, 1, 1] })[wisdom] || [];
    return (D.characterDetails.spellSlots[className][level] || []).map(group => ({ className: group.className, slots: group.slots.map((count, i) => count + (group.wisdom ? extra[i] || 0 : 0)) }));
  };
  W.osricThaco = function (className, level) {
    if (['Fighter', 'Paladin', 'Ranger'].includes(className)) return Math.max(1, 21 - level);
    const rows = className === 'Assassin' ? [[13, 14], [9, 16], [5, 19], [0, 20]] : className === 'Cleric' ? [[19, 9], [16, 10], [13, 12], [10, 14], [7, 16], [4, 18], [0, 20]] : className === 'Druid' ? [[13, 12], [10, 14], [7, 16], [4, 18], [0, 20]] : className === 'Thief' ? [[21, 10], [17, 12], [13, 14], [9, 16], [5, 19], [0, 20]] : [[21, 13], [16, 15], [11, 17], [6, 19], [0, 20]];
    return rows.find(([min]) => level >= min)[1];
  };
  W.thiefSkills = function (race, dexterity, level) {
    const base = D.characterDetails.thieves[Math.min(24, level)], raceBonus = D.characterDetails.races[race].thief;
    const dex = ({ 9: [0, -15, 0, -10, -20, -10, -15, 0], 10: [0, -10, 0, -5, -15, -5, -10, 0], 11: [0, -5, 0, 0, -10, 0, -5, 0], 12: [0, 0, 0, 0, -5, 0, 0, 0], 16: [0, 0, 0, 0, 0, 5, 0, 0], 17: [0, 5, 0, 5, 5, 10, 0, 0], 18: [0, 10, 0, 10, 10, 15, 5, 0], 19: [0, 15, 0, 15, 15, 20, 15, 0] })[dexterity] || [];
    return base.map((value, i) => Math.min(99, value + (raceBonus[i] || 0) + (dex[i] || 0)));
  };
  W.basicGear = function (p, rules, className, level, dexterity) {
    const pool = D.characterDetails.gear[rules], parts = [];
    let hands = 1;
    const choose = kind => {
      const options = pool.filter(row => row.kind === kind && row.classes.includes(className));
      const row = pick(options);
      hands = row.hands;
      let text = W.descriptionText(row.parts, {});
      const magical = enabled(p, 'x_relics', false) && W.d(100) <= level * 4;
      const magicBonus = magical ? int(1, Math.max(1, Math.ceil(level / 5))) : 0;
      if (rules === 'bx' && !enabled(p, 'x_var_dmg', false)) text = text.replace(/ \(1d\d+(?:\/2d4)? dmg\)/, '').replace(/1d\d+ dmg \/ /, '');
      if (magicBonus) text = text.replace(/ \(/, ' +' + magicBonus + ' (').replace(/ dmg/, '+' + magicBonus + ' dmg');
      parts.push(text);
      return text;
    };
    const weapon = choose('weapon');
    if (W.d(3) !== 1) choose('weapon2');
    if (W.d(4) !== 1 && className !== 'Cleric') parts.push((W.d(10) === 1 ? 'silver ' : '') + 'dagger' + (rules !== 'bx' || enabled(p, 'x_var_dmg', false) ? ' (1d4 dmg)' : ''));
    const armorRanges = rules === 'bx' ? { 'Magic-User': [0, 0], Thief: [1, 1] } : { 'Magic-User': [0, 0], Thief: [1, 2], Halfling: [1, 2], Cleric: [3, 8] };
    const armorIndex = int(...(armorRanges[className] || (rules === 'bx' ? [1, 3] : [4, 8])));
    const armorTypes = rules === 'bx' ? [['robes', 0], ['leather armor', 2], ['chain mail armor', 4], ['plate mail armor', 6]] : [['robes', 0], ['padded armor', 1], ['leather armor', 1], ['studded leather armor', 2], ['scale mail armor', 3], ['chain mail armor', 4], ['banded mail armor', 5], ['splint mail armor', 5], ['plate mail armor', 6]];
    let [armor, protection] = armorTypes[armorIndex];
    if (armorIndex && enabled(p, 'x_relics', false) && W.d(100) <= level * 4) { const extra = int(1, Math.ceil(level / 7)); protection += extra; armor += ' +' + extra; }
    if (W.d(3) !== 1 && hands !== 2 && !['Magic-User', 'Thief'].includes(className)) { armor += ', shield'; protection++; }
    if (W.d(3) !== 1 && !['Magic-User', 'Thief'].includes(className)) armor += ', helmet';
    // Match the original equipment helper's treatment of DEX 17.
    const dexBonus = dexterity === 17 ? 0 : bonus(dexterity);
    return { weapon, armor, arms: parts.join(', '), ac: 9 - protection - dexBonus };
  };
  W.character = function (p = {}, rules = 'll', className = 'Fighter', race) {
    const osric = rules === 'osric', game = rules === 'bx' ? 'bdd' : osric ? 'osric' : 'lablord';
    const low = W.number(p.x_lvl1 ?? p.minLevel, 1, 1, osric ? 24 : rules === 'bx' ? 14 : 20), high = W.number(p.x_lvl2 ?? p.maxLevel, rules === 'bx' ? 14 : 20, 1, osric ? 24 : rules === 'bx' ? 14 : 20);
    let level = int(Math.min(low, high), high);
    let age, exceptionalStrength = 0;
    const sex = ['Male', 'Female'].includes(p.x_sex) ? p.x_sex : pick(osric ? ['Male', 'Male', 'Female'] : ['Male', 'Female']);
    if (osric) {
      const pool = Object.keys(allowed).filter(r => allowed[r].includes(className));
      race = pool.includes(race || p.x_race) ? race || p.x_race : pick(pool);
    } else race = ['Dwarf', 'Elf', 'Halfling'].includes(className) ? className : 'Human';
    let stats;
    if (osric) {
      const racial = D.characterDetails.races[race], detail = racial.classes[className];
      stats = Object.fromEntries(Object.entries({ ...racial.ranges, ...detail.ranges }).map(([key, bounds]) => [key, int(...bounds)]));
      let limit = detail.caps.at(-1) || 20;
      if (detail.caps.length > 1 && !(race === 'Gnome' && className === 'Illusionist')) {
        const attribute = className === 'Magic-User' ? stats.INT : className === 'Thief' ? stats.DEX : stats.STR;
        limit = attribute > 17 ? detail.caps[0] : attribute > 16 ? detail.caps[1] ?? limit : limit;
      }
      level = Math.min(level, limit);
      age = detail.age[0] + int(detail.age[1], detail.age[2]) + level;
      if (stats.STR === 18 && ['Fighter', 'Paladin', 'Ranger'].includes(className)) {
        exceptionalStrength = int(1, 100);
        if (exceptionalStrength === 100) { stats.STR = 19; exceptionalStrength = 0; }
      }
    } else {
      stats = Object.fromEntries(['STR', 'DEX', 'CON', 'INT', 'WIS', 'CHA'].map(key => [key, int(3, 18)]));
      const prime = ({ Cleric: 'WIS', Dwarf: 'STR', Elf: 'STR', Fighter: 'STR', 'Magic-User': 'INT', Thief: 'DEX' })[className];
      if (prime) stats[prime] = Math.max(...W.range(4).map(() => int(3, 18)));
      if (className === 'Dwarf' || className === 'Halfling') stats.CON = int(9, 18);
      if (className === 'Elf') stats.INT = int(9, 18);
      if (className === 'Halfling') stats.DEX = int(9, 18);
      level = Math.min(level, ({ Dwarf: 12, Elf: 10, Halfling: 8 })[className] || 20);
      const ages = { Cleric: [18, 1, 6, 1], Dwarf: [40, 4, 24, 2], Elf: [125, 5, 40, 3], Fighter: [16, 1, 4, 1], Halfling: [40, 1, 6, 2], 'Magic-User': [27, 1, 8, 1], Thief: [18, 1, 4, 1] }[className];
      age = ages[0] + int(ages[1], ages[2]) + level * ages[3];
    }
    const progression = osric ? D.characterRules.osric[className] : D.characterRules[rules].progression[className][level];
    const hitDie = osric ? progression.hitDie : ({ Dwarf: 8, Fighter: 8, Thief: 4, 'Magic-User': 4 })[className] || 6;
    const endDice = osric ? ({ Cleric: 9, Fighter: 9, Paladin: 9, Ranger: 11, Thief: 10, Assassin: 10, Illusionist: 10, 'Magic-User': 11, Druid: 14 })[className] : className === 'Halfling' ? 8 : 9;
    const extra = osric ? ['Fighter', 'Paladin'].includes(className) ? 3 : ['Ranger', 'Cleric', 'Thief'].includes(className) ? 2 : 1 : ['Dwarf'].includes(className) ? 3 : ['Fighter', 'Elf', 'Thief'].includes(className) ? 2 : 1;
    const conBonus = osric ? stats.CON < 4 ? -2 : stats.CON < 7 ? -1 : stats.CON < 15 ? 0 : stats.CON === 15 ? 1 : ['Fighter', 'Paladin', 'Ranger'].includes(className) ? Math.min(5, stats.CON - 14) : 2 : stats.CON === 17 ? 0 : bonus(stats.CON);
    const hitPoints = W.range(level).reduce((hp, i) => hp + (i > endDice ? extra : Math.max(1, (enabled(p, 'x_maxhp', false) ? hitDie : W.d(hitDie)) + conBonus)), 0);
    const spellGroups = osric ? W.osricSpellSlots(className, level, stats.WIS) : [{ className, slots: progression.spells || [] }];
    const slots = spellGroups[0]?.slots || [];
    const saves = osric ? progression.saves.find(row => level >= row.min)?.values || [14, 16, 13, 12, 15] : D.characterRules[rules].saves.find(row => row.class === className && level >= row.min && level <= row.max).values;
    const xpMin = osric ? progression.xp[level] || 0 : progression.xp1, xpMax = osric ? progression.xp[level + 1] || xpMin : progression.xp2;
    const xp = enabled(p, 'x_rand_xp', false) && xpMax > xpMin ? int(xpMin, xpMax - 1) : xpMin;
    const name = W.name(race === 'Dwarf' ? 'dwarf' : race === 'Elf' || race === 'Half-Elf' ? sex === 'Female' ? 'elf_f' : 'elf_m' : ['Halfling', 'Gnome'].includes(race) ? 'gnome' : /Magic|Illusion/.test(className) && W.d(2) === 1 ? 'wizard' : sex === 'Female' ? 'female' : 'male');
    const alignment = osric ? className === 'Paladin' ? 'LG' : className === 'Druid' ? 'N' : className === 'Assassin' ? pick(['LE', 'NE', 'CE']) : className === 'Ranger' ? pick(['LG', 'NG', 'CG']) : pick(['LG', 'LN', 'LE', 'NG', 'N', 'NE', 'CG', 'CN', 'CE']) : pick(['Lawful', 'Neutral', 'Chaotic']);
    const basicGear = osric ? null : W.basicGear(p, rules, className, level, stats.DEX);
    const armored = !['Magic-User', 'Illusionist', 'Thief', 'Assassin'].includes(className), armor = basicGear ? basicGear.armor : armored ? pick(['leather armor', 'chain mail', 'plate mail']) : /Thief|Assassin/.test(className) ? 'leather armor' : 'robes';
    const ac = basicGear ? basicGear.ac : (rules === 'bx' || rules === 'll' ? 9 : 10) - ({ 'leather armor': 2, 'chain mail': 4, 'plate mail': 6, robes: 0 })[armor] - bonus(stats.DEX);
    const weapon = basicGear ? basicGear.arms : /Magic|Illusion/.test(className) ? pick(['dagger', 'quarterstaff']) : className === 'Cleric' ? pick(['mace', 'war hammer', 'flail']) : className === 'Halfling' ? 'short sword' : pick(['long sword', 'short sword', 'battle axe', 'spear']);
    const skills = [];
    if (className === 'Thief' || className === 'Assassin') {
      const adjustment = rules === 'll' && enabled(p, 'x_used_sh', false) ? stats.DEX < 4 ? -60 : stats.DEX < 6 ? -30 : stats.DEX < 9 ? -15 : stats.DEX > 18 ? 15 : stats.DEX > 17 ? 10 : stats.DEX > 15 ? 5 : 0 : 0;
      const values = osric ? W.thiefSkills(race, stats.DEX, level) : (progression.steal || []).map((value, i) => i === 6 ? value : +value + adjustment < 0 ? 1 : +value + adjustment);
      const labels = osric ? ['Climb Walls', 'Find Traps', 'Hear Noise', 'Hide in Shadows', 'Move Quietly', 'Open Locks', 'Pick Pockets', 'Read Languages'] : ['Pick Locks', 'Find/Remove Traps', 'Pick Pockets', 'Move Silently', 'Climb Walls', 'Hide in Shadows', 'Hear Noise'];
      skills.push(...values.map((value, i) => labels[i] + ': ' + value + (i === 6 && !osric ? ' on 1d6' : '%')), 'Backstab: +4 to hit, ' + (osric ? Math.min(5, Math.floor((level - 1) / 4) + 2) : 2) + '× damage');
    }
    if (race === 'Dwarf') skills.push('Infravision 60 feet; detect stone traps, new construction and sloping passages');
    if (race === 'Elf') skills.push('Infravision 60 feet; detect secret doors; immunity to ghoul paralysis');
    if (race === 'Halfling') skills.push('Hide outdoors: 90%; hide indoors: 2 in 6; +1 to missile attacks; +1 initiative when alone or with other halflings; -2 AC against creatures larger than human size');
    if (className === 'Cleric') {
      if (osric) skills.push('Turn undead');
      else {
        const table = D.characterDetails.turning[rules][level] || D.characterDetails.turning[rules].last;
        const undead = rules === 'bx' ? ['Skeleton', 'Zombie', 'Ghoul', 'Wight', 'Wraith', 'Mummy', 'Spectre', 'Vampire'] : W.range(10).map(i => i === 10 ? 'Infernal' : 'HD' + i);
        skills.push('Turn undead: ' + table.map((value, i) => value === '0' ? '' : undead[i] + ' [' + value + ']').filter(Boolean).join(', '));
      }
    }
    if (!osric && className === 'Fighter' && level > 14) skills.push(level > 19 ? 'Three attacks per round' : 'Two attacks per round');
    if (className === 'Thief' && !osric) { if (level > 3) skills.push('Read Languages: 80%'); if (level > 9) skills.push('Use Scrolls: 90%'); }
    const languages = osric ? ['Common', ...(race !== 'Human' ? [race] : [])] : ({ Dwarf: ['Common', 'Dwarf', 'Goblin', 'Gnome', 'Kobold'], Elf: ['Common', 'Elf', 'Gnoll', 'Hobgoblin', 'Orc'], Halfling: ['Common', 'Halfling'] })[race] || ['Common'];
    const languagePool = osric ? D.characterDetails.languages.ll : rules === 'll' && !enabled(p, 'x_lang_aec', false) ? D.characterDetails.languages.ll.slice(0, 33) : D.characterDetails.languages[rules];
    const extraLanguages = osric ? stats.INT < 8 ? 0 : stats.INT < 10 ? 1 : stats.INT < 12 ? 2 : stats.INT < 14 ? 3 : stats.INT < 16 ? 4 : stats.INT - 11 : Math.max(0, bonus(stats.INT));
    if (enabled(p, 'x_lang_set')) for (let i = 0; i < extraLanguages; i++) { const options = languagePool.filter(x => !languages.includes(x)); if (options.length) languages.push(pick(options)); }
    const relics = [];
    if (enabled(p, 'x_relics', false)) for (let i = 3; i <= level; i++) if (W.d(100) > 90) relics.push(rules === 'bx' ? W.basicMagic({ ...p, game }, W.d(4) === 1 ? 'potion' : undefined) : W.magicItem({ ...p, game }));
    return { game, rules, name, className, race, level, sex, stats, hitDie, hitPoints, saves, xp, nextXP: xpMax > xpMin ? xpMax : 0, xpBonus: osric ? 0 : W.experienceBonus(rules, className, stats), slots, spellGroups, spells: spellGroups.flatMap(group => characterSpells(group.className, level, group.slots, rules, stats.INT, enabled(p, 'x_used_sh', false)).map(row => ({ ...row, className: group.className }))), skills, languages, ac, armor, weapon, relics, alignment, age, exceptionalStrength, thaco: osric ? W.osricThaco(className, level) : null, attacks: osric ? W.range(11, -1).map(ac => W.osricThaco(className, level) - ac) : W.basicAttacks(className, level, rules), equipment: enabled(p, 'x_show_eq') ? W.pack({ ...p, game }) : '', coins: W.coinPile(level * 10 + int(0, 10), W.game({ game }).name, true) };
  };
  W.renderCharacter = function (c, p = {}) {
    const named = enabled(p, 'x_name'), sheet = p.x_output === 'Character Sheets';
    if (sheet && c.rules !== 'osric') return W.renderBasicSheet(c, p);
    const title = (named ? c.name + ' — ' : '') + `${c.sex} ${c.className}, Level ${c.level}`;
    const saveLabels = c.rules === 'bx' ? ['Death/Poison', 'Wands', 'Paralysis/Stone', 'Breath', 'Spells/Rods/Staves'] : c.rules === 'll' ? ['Breath', 'Poison/Death', 'Petrify/Paralyze', 'Wands', 'Spells'] : ['Poison/Death', 'Breath', 'Wands', 'Petrify/Paralyze', 'Spells'];
    let html = `<article class="character${sheet ? ' character-sheet' : ''}"><h3>${esc(title)}</h3><p>${c.rules === 'osric' ? esc(c.race) + '; ' : ''}${enabled(p, 'x_show_al') ? 'Alignment: ' + esc(c.alignment) + '; ' : ''}${enabled(p, 'x_show_age', false) ? 'Age: ' + c.age + '; ' : ''}<b>AC:</b> ${c.ac}; <b>HP:</b> ${c.hitPoints}; <b>XP:</b> ${c.xp.toLocaleString('en-US')}</p>`;
    html += W.table(Object.keys(c.stats), [Object.entries(c.stats).map(([key, value]) => key === 'STR' && c.exceptionalStrength ? value + '/' + c.exceptionalStrength : value), ...(c.rules === 'osric' ? [] : [Object.entries(c.stats).map(([key, value]) => esc(W.basicAttribute(c.rules, key, value, c.className, enabled(p, 'x_used_sh', false))))])]) + '<h4>Saving Throws</h4>' + W.table(saveLabels, [c.saves]);
    if (c.rules !== 'osric') html += '<p><b>XP adjustment:</b> ' + signed(c.xpBonus) + '%; <b>Next level:</b> ' + (c.nextXP ? c.nextXP.toLocaleString('en-US') : 'Max Level') + '</p>';
    html += '<h4>Attack Rolls</h4>' + W.table(c.attacks.map((_, i) => 'AC ' + (c.rules === 'bx' ? 9 - i : c.rules === 'll' ? i - 3 : i - 1)), [c.attacks]) + (c.thaco != null ? '<p><b>THAC0:</b> ' + c.thaco + '</p>' : '');
    if (enabled(p, 'x_lang_set')) html += '<p><b>Languages:</b> ' + esc(c.languages.join(', ')) + '</p>';
    if (enabled(p, 'x_show_sk') && c.skills.length) html += '<p><b>Skills &amp; Abilities:</b> ' + esc(c.skills.join('; ')) + '</p>';
    for (const group of c.spellGroups) if (group.slots.length) html += '<p><b>' + esc(group.className) + ' spells per day:</b> ' + group.slots.join(' / ') + '</p>';
    if (enabled(p, 'x_show_ss', false)) html += c.spells.map(s => `<p><b>Spell Book — Level ${s.level}:</b> ${esc(s.names.join(', '))}</p>`).join('');
    if (enabled(p, 'x_show_eq')) html += `<p><b>Equipment:</b> ${esc(c.weapon)}, ${esc(c.armor)}; ${esc(c.equipment)} <b>Coins:</b> ${esc(c.coins)}${c.relics.length ? '; <b>Magic Items:</b> ' + esc(c.relics.join('; ')) : ''}</p>`;
    if (named && enabled(p, 'x_show_me')) html += '<p><b>Description:</b> ' + W.citizen({ ...p, game: c.game, possessions: '0', dress: '1' }, 'rules', { race: c.race, sex: c.sex }).html.replace(/^.*?\] /, '') + '</p>';
    return html + '</article>';
  };
  for (const [route, rules, title] of [['bxadvg', 'bx', 'Adventurers Guild — BD&D'], ['ladvg', 'll', 'Adventurers Guild — Labyrinth Lord'], ['oadvg', 'osric', 'Adventurers Guild — OSRIC']]) {
    const classes = rules === 'osric' ? advanced : basics;
    const fields = [f('x_output', 'Output', 'select', { value: 'Character Listing', options: ['Character Listing', 'Character Sheets'] }), f('x_lvl1', 'Minimum level', 'number', { value: 1, min: 1, max: rules === 'bx' ? 14 : 20 }), f('x_lvl2', 'Maximum level', 'number', { value: rules === 'bx' ? 14 : 20, min: 1, max: rules === 'bx' ? 14 : 24 }), f('x_sex', 'Gender', 'select', { value: 'Any', options: ['Any', 'Male', 'Female'] }), ...(rules === 'osric' ? [f('x_race', 'Race', 'select', { value: 'Any', options: ['Any', ...Object.keys(allowed)] })] : []), ...Object.entries(classes).map(([key, label]) => f('x_qty_' + key, label, 'number', { value: 0, min: 0, max: 20 })), ...[['x_name', 'Name characters', 1], ['x_show_al', 'Alignment', 1], ['x_show_eq', 'Equipment', 1], ['x_show_sk', 'Skills and abilities', 1], ['x_show_ss', 'Spell books', 0], ['x_lang_set', 'Choose languages', 1], ['x_show_me', 'Descriptions', 1], ['x_show_age', 'Age', 0], ['x_maxhp', 'Maximum hit points', 0], ['x_rand_xp', 'Random experience', 0], ['x_relics', 'Magic items', 0], ['x_var_dmg', 'Variable weapon damage (BD&D)', 0]].map(([key, label, value]) => f(key, label, 'checkbox', { value }))];
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
