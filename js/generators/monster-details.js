(function (W, D) {
  'use strict';
  const esc = W.escape, int = (a, b) => W.rng.int(a, b);
  W.plainText = value => String(value ?? '').replace(/<[^>]*>/g, '').replace(/&nbsp;/g, ' ').replace(/&amp;/g, '&').replace(/&#(?:0*39|x27);|&apos;/g, "'").replace(/&quot;/g, '"').replace(/&#(\d+);/g, (_, n) => String.fromCharCode(+n)).replace(/\r/g, '');
  W.retroText = function (text, p, level) {
    const game = W.game(p).slug;
    if (['meta', 'gamma'].includes(game)) level = Math.min(18, Math.max(3, +level || 3));
    for (const [before, after] of D.retroText[game] || []) text = text.split(before).join(after.replaceAll('{level}', level));
    return W.plainText(text);
  };
  W.trollStats = function (m, p) {
    const game = W.game(p).slug, five = game === 'tt5e' || game === 'ww' || game === 'millen' && p.mmtt_vs !== '7';
    const difficulty = W.number(p.ttlvl ?? p.x_ttlvl ?? p.wwlvl ?? p.mmttlvl, 1, 1, 9), scale = difficulty === 9 ? 0.5 : difficulty;
    const extra = scale > 4 ? 10 : scale > 2 ? 5 : 0;
    const rating = Math.round(scale * (game === 'millen' ? (+m.difficulty * 2 + +m.ac + 15) + (+m.ac + 20) : +m.m_hp_min + +m.ac)) + extra * +m.difficulty;
    const adds = game === 'ttde' ? Math.floor(rating / 2) : Math.ceil(rating / 2), dice = Math.floor(rating / 10) + 1, modifier = Math.ceil(rating / 10);
    let intelligence = game === 'millen' ? ({ Instinctual: 1, Animal: 5, Primitive: 10, Industrial: 15, Modern: 20 })[m.iq] || 25 : +m.iq || 1;
    const originalIQ = intelligence;
    if (five) intelligence = game === 'millen' || +m.iq >= 1 ? Math.ceil(intelligence + modifier) : 1;
    else if (game === 'millen') { if (intelligence > 5) intelligence += modifier; }
    else if (+m.iq >= 5) intelligence = Math.ceil(+m.iq + modifier + +m.mr * 2);
    const wizardry = game === 'millen' ? originalIQ < 6 || m.type === 'R' ? 0 : modifier + originalIQ : +m.iq < 5 && +m.mr < 1 ? 0 : +m.mr + modifier + +m.iq;
    const priority = String(m.spatk).replace(/d/g, five ? 'd' : 'd|x').split('|'), count = five ? 3 : 4;
    const attributes = {};
    for (let i = 0; i < count; i++) {
      const rank = count - i, value = Math.round(adds / (five ? 6 : 10) * rank);
      attributes[({ d: 'DEX', l: 'LCK', x: 'SPD' })[priority[i]] || 'STR'] = value < 0 ? 9 - value : value > 0 ? 12 + value : 13 - rank;
    }
    Object.assign(attributes, { CON: rating, INT: intelligence, ...(five ? {} : { WIZ: wizardry }), CHR: Math.max(1, Math.floor((game === 'millen' ? (+m.ac + 15 + +m.difficulty) / 2 : +m.bravery / 2) + (five ? intelligence : originalIQ))) });
    let description = game === 'millen' ? W.retroText(m.description || '', p, 0) : W.plainText(m.description);
    description = description.replaceAll('HURT', Math.min(5, Math.max(1, Math.ceil(+m.difficulty / 5))) + 'd6').replaceAll('SAVE', `L${m.difficulty}SR`);
    if (five) for (const [from, to] of [['WIZ', 'INT'], ['SPD and DEX', 'DEX'], ['STR, DEX, and SPD', 'STR and DEX'], ['SPD or DEX', 'DEX'], ['DEX, SPD, and STR', 'STR and DEX'], ['1-STR; 2-DEX; 3-SPD; 4-INT; 5-LCK; 6-CHR', '1-STR; 2-DEX; 3-CON; 4-INT; 5-LCK; 6-CHR'], ['SPD', 'DEX'], ['Any spells that fail to affect them are reflected on the caster.', 'Any spells cast at them are reflected back on the caster.']]) description = description.replaceAll(from, to);
    const trigger = Math.max(1, Math.min(dice - 1, Math.ceil(dice / 3)));
    description = description.replaceAll('DICE', game === 'ww' ? "roll a '1' on their damage die roll" : `roll a '6' at least ${trigger}x with their attack`);
    if (game === 'ww') description = description.replace(/Each target that gets damaged .*? suffers from the effects\./gis, '').replace(/Each target that gets damaged [^.]*\./gi, '');
    return { rating, dice, adds, intelligence, wizardry, attributes, description };
  };
  W.monsterWeapon = function (m, p) {
    if (!m.weapons) return '';
    const game = W.game(p).slug, troll = W.isTroll(p) || game === 'ww', fn = troll ? 'TTgetWeapon' : game === 'ssxs' ? 'getSXWeapon' : 'getWeapon';
    if (/^\d+$/.test(m.weapons)) {
      const kind = +m.weapons, meta = game === 'meta';
      const group = kind === 1 ? 0 : kind === 2 ? 1 : kind === 3 ? meta ? 2 : 3 : kind === 4 ? meta ? 4 : 5 : kind === 5 ? meta ? 6 : 7 : 8;
      const min = game === 'lablord' ? ({ 3: 11, 4: 12, 5: 7 })[kind] || 0 : 0;
      return W.pick(D.paWeapons[group].slice(min)).map(part => typeof part === 'string' ? part : part.quantity ? int(...part.quantity) : ['urthe', 'lablord'].includes(game) ? '' : part.modifier === 'mod1' ? '(x2)' : '(x3)').join('');
    }
    const tables = D.weaponTables[fn], offset = troll && (p.x_oldway ?? p.simple) !== '1' ? 5 : 0;
    const kind = m.weapons === 'giant' ? 0 : m.weapons === 'small' ? 1 : m.weapons === 'demon' ? 3 : 4;
    let item = W.pick(tables[offset + kind]);
    if (!item && kind === 3) {
      const [name, damage] = W.pick([['trident', '1d6'], ['longsword', '2d4'], ['spear', '1d6'], ['staff', '1d6'], ['whip', '1d2']]);
      item = `${W.pick(tables[offset + 2])} ${name} (${damage}+${W.d(5)} fire damage)`;
    }
    if (typeof item === 'object') item = item.before + int(...item.quantity) + item.after;
    return item || '';
  };
  const defaultGame = m => ({ LL: 'lablord', OSRIC: 'osric', BX: 'bdd', BFRPG: 'bfrpg', TT: 'tt5e', SX: 'ssxs', BU: 'urthe', MF: 'mutfut', SW: 'sandw', WIZ: 'fantasy' })[m.creator] || (String(m.creator).startsWith('SRC:') ? 'add' : 'lablord');
  W.monsterFields = function (m, p = {}) {
    const game = W.game({ game: defaultGame(m), ...p }).slug;
    const val = key => W.plainText(m[key]);
    if (W.isTroll({ game }) || ['ww', 'millen'].includes(game)) {
      const stats = W.trollStats(m, { ...p, game });
      if (game === 'ww') return [['LVL', m.difficulty], ['TYP', m.type], ['APP', m.enc], ['SZ', m.size], ['MV', m.move], ['MR (Life)', stats.rating], ['ATK', stats.dice], ['DMG', '1d6+' + (Math.floor(stats.adds / 10) + stats.dice)], ['CR', Math.max(1, Math.floor(stats.rating / 10))], ['LANG', m.spdef], ['AP', stats.rating]];
      return [['TYPE', m.type], ['MR', stats.rating], ...(game === 'ttde' ? [['LVL', Math.ceil(stats.rating / 25)]] : []), ['DICE', stats.dice + ' + ' + stats.adds], ['#APP', m.enc], ['SIZE', m.size], ['MOVE', m.move], [game === 'tt5e' ? 'INT' : 'WIZ', game === 'tt5e' ? stats.intelligence : stats.wizardry], ['LANG', m.spdef]];
    }
    if (['urthe', 'meta', 'gamma'].includes(game)) {
      const mutant = (p.mutate ?? p.x_mutate ?? p.x_mutants) === '1' && m.treasure, robot = m.type === 'R';
      if (game === 'urthe') return [[robot ? 'Cond' : 'Stam', m.hd], ['Prot', m.ac], ['Hit', m.thaco], ['Atks', m.atk], ['Dmg', m.dmg], ['Spd', m.move], ['Stg', m.iq], ['Size', m.size], ['Dfn', m.lair], ['Level', m.level], ...(robot ? [['Salv', m.salvage + '%'], ['Sft', m.mr]] : []), ...(mutant ? [['Mutations', m.treasure]] : [])];
      const resists = String(m.lair).split('/'), resistance = index => { const value = +String(resists[index] || '').split(':')[1] || 0; return value > 18 ? 'immune' : Math.max(3, value); };
      const hit = +m.level < 2 ? 1 : +m.level < 4 ? 2 : +m.level < 6 ? 3 : +m.level < 9 ? 4 : +m.level < 13 ? 5 : +m.level < 17 ? 6 : +m.level < 20 ? 7 : 8;
      return [['MV', W.retroText(val('move'), { game }, m.level)], ['SZ', m.size], ['AC', Math.max(1, 8 - Math.floor((+m.ac || 0) / 2))], ['HD', Math.max(1, +m.level || 1)], ['ATK', m.atk], ['ATK CLASS', hit], ['DMG', robot && m.al ? m.al : m.dmg], ['RAD RESIST', resistance(2)], ...(robot ? [] : [['MIND RESIST', resistance(1)], ['POISON RESIST', resistance(4)]])];
    }
    const columns = {
      osric: [['FREQ', 'freq'], ['ENC', 'enc'], ['SIZE', 'size'], ['MOVE', 'move'], ['AC', 'ac'], ['HD', 'hd'], ['ATK', 'atk'], ['DMG', 'dmg'], ['MR', 'mr'], ['LAIR', 'lair'], ['INT', 'iq'], ['AL', 'al'], ['XP', 'xp'], ['BOOK', 'creator'], ['Special Attack', 'spatk'], ['Special Defense', 'spdef']],
      lablord: [['ENC', 'enc'], ['AL', 'al'], ['MV', 'move'], ['AC', 'ac'], ['HD', 'hd'], ['ATK', 'atk'], ['DMG', 'dmg'], ['SV', 'spdef'], ['ML', 'bravery'], ['TRS', 'loot'], ['XP', 'xp'], ['LVL', 'level'], ['THAC0', 'thaco'], ['BOOK', 'creator']],
      bdd: [['AC', 'ac'], ['HD', 'hd'], ['MV', 'move'], ['THAC0', 'thaco'], ['ATK', 'atk'], ['DMG', 'dmg'], ['#APP', 'enc'], ['SV', 'spdef'], ['ML', 'bravery'], ['TT', 'loot'], ['AL', 'al'], ['LV', 'difficulty'], ['XP', 'xp'], ['PAGE', 'lair']],
      bfrpg: [['AC', 'ac'], ['HD', 'hd'], ['ATK', 'atk'], ['DMG', 'dmg'], ['MV', 'move'], ['#APP', 'enc'], ['SV', 'spdef'], ['ML', 'bravery'], ['TRS', 'treasure'], ['XP', 'xp']],
      mutfut: [['ENC', 'enc'], ['AL', 'al'], ['MV', 'move'], ['AC', 'ac'], ['HD', 'hd'], ['AT', 'atk'], ['DMG', 'dmg'], ['SV', 'spdef'], ['ML', 'bravery'], ['IQ', 'iq'], ['THAC0', 'thaco'], ['TRS', 'loot']],
      sandw: [['LV', 'level'], ['HD', 'hd'], ['AC', 'ac'], ['ATK', 'atk'], ['SV', 'spdef'], ['SPEC', 'spatk'], ['MV', 'move'], ['AL', 'al'], ['XP', 'xp'], ['TOHIT', 'thaco']],
      ssxs: [['LVL', 'al'], ['AC', 'ac'], ['DR', 'atk'], ['TOHIT', 'thaco'], ['DMG', 'dmg'], ['SV', 'thaco'], ['TYPE', 'type'], ['LANG', 'spdef']],
      add: [['FREQ', 'freq'], ['ENC', 'enc'], ['SIZE', 'size'], ['MOVE', 'move'], ['AC', 'ac'], ['HD', 'hd'], ['APP', 'description'], ['ATK', 'atk'], ['DMG', 'dmg'], ['MR', 'mr'], ['LAIR', 'lair'], ['INT', 'iq'], ['AL', 'al'], ['XP', 'xp'], ['THAC0', 'thaco'], ['BOOK', 'creator']]
    };
    return (columns[game] || columns.lablord).map(([label, key]) => [label, val(key).replace(new RegExp('^' + label.replace('#', '') + ':\\s*', 'i'), '').replace(/;\s*$/, '')]);
  };
  W.monsterStats = function (m, describe = false, p = {}) {
    if (m.custom) return `<strong>${esc(m.name)}</strong>${m.description ? ' — ' + esc(m.description) : ''}`;
    const game = W.game({ game: defaultGame(m), ...p }).slug, mutated = (p.mutate ?? p.x_mutate ?? p.x_mutants) === '1' && m.creator === 'BU' && m.treasure && m.type !== 'R';
    let description = mutated ? m.treasure + ' ' + String(m.description).replace(/This is a creature from Urthe`s [^.]+\./g, '') : m.description || '';
    const stats = W.monsterFields(m, { ...p, game }), troll = W.isTroll({ game }) || ['ww', 'millen'].includes(game);
    if (troll) { const computed = W.trollStats(m, { ...p, game }); description = computed.description + ' (' + Object.entries(computed.attributes).map(([name, value]) => name + ': ' + value).join(' / ') + ')'; }
    else if (m.creator === 'BU') description = W.retroText(description, { ...p, game }, m.level);
    const weapon = m.weapons ? W.monsterWeapon(m, { ...p, game }) : '';
    const extraName = p.noNames !== '1' && ['dragon', 'demon', 'lich'].includes(m.m_myname) ? ' {Known as ' + W.name(m.m_myname === 'lich' ? 'wizard' : m.m_myname) + '}' : '';
    return `<strong>${esc(W.plainText(mutated ? m.loot : W.monsterName(m)) + extraName)}</strong><br>${stats.filter(([, value]) => value !== '' && value != null).map(([label, value]) => `<b>${esc(label)}:</b> ${esc(W.plainText(value))}`).join('; ')}${weapon ? '; <b>WEP:</b> ' + esc(weapon) : ''}${(describe || troll || m.creator === 'BU') && description ? '<p>' + esc(W.plainText(description)) + '</p>' : ''}`;
  };
})(window.WZ, window.WZ_DATA);
