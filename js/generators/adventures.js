(function (W, D) {
  'use strict';
  const f = W.field, esc = W.escape, int = (a, b) => W.rng.int(Math.min(a, b), Math.max(a, b)), pick = a => W.pick(a);
  const yes = (p, key, fallback = 1) => String(p[key] ?? fallback) === '1';
  const cell = key => pick(D.dungeonText.cells[key]);
  const tableChoice = (file, name, key, fallback) => {
    const rows = D.roomTables[file]?.[name]?.[key]?.[0];
    return rows?.length ? pick(rows) : fallback;
  };
  W.container = function (post = false) {
    if (W.d(3) === 1) return W.color() + ' ' + pick(post ? ['nylon', 'plastic', 'canvas'] : ['leather', 'cloth', 'canvas']) + ' ' + cell('bagCreator');
    return pick(['oak', 'pine', 'iron', 'cedar', 'steel']) + ' ' + cell('boxMakerRoom') + (W.d(2) === 1 ? ' with a locked ' + pick(['padlock', 'keyhole']) : '');
  };
  W.trap = function (p, type = 'room', selected) {
    const level = int(1, W.number(p.level ?? p.x_level, 20, 1, 100)), troll = W.isTroll(p), group = Math.min(9, Math.floor((level - 1) / 2));
    const scopes = {
      box: ['come out of the container', 'the opener', 'in front of the container', 'whoever opens the container', 'container', 'from the container'],
      item: ['come out near the item', 'the one touching it', 'in front of the item', 'whoever touches the item', 'item', 'from the item'],
      idol: ['come out of it', 'the toucher', 'in front of it', 'whoever touches it', 'thing', 'from the idol'],
      room: ['fill the area', 'anyone inside', 'in the area', 'whoever first enters the area', 'central spot of the area', 'from the area']
    };
    const scope = scopes[type] || scopes.room, lethal = W.d(2) === 1, damage = `suffer 1d${troll ? 6 : pick([4, 6, 8, 10, 12])}x${Math.ceil(level / 2) + 1} damage`;
    const death = lethal ? ['die', pick(['be decapitated', 'be sliced clean in half']), 'be turned into a statue of solid ' + cell('statueMake'), pick(['be encased in a block of ice', 'be frozen solid and then shatter to pieces']), pick(['be turned to ash', 'be set ablaze and melt into a puddle of goo']), 'fall', 'cold', troll ? 'be instantly killed from being impaled' : 'death', 'be instantly killed from being impaled'] : [damage, damage, damage + (troll ? ' and become paralyzed for 1d6 hours' : ' and become paralyzed for 1d4 rounds'), damage, damage, 'rise', 'heat', troll ? damage : 'magical spells', damage];
    const slots = { level, damageScale: Math.ceil(level / 2) + 1, pit_depth: group ? int(group * 10 + 1, group * 10 + 10) : 10, pit_damage: [1, 2, 3, 4, 5, 7, 10, 14, 19, 25][group] + 'd6', fogColor: W.color(), color: W.color(), savingRoll: 'L' + level + 'SR', luck: 'LCK', speed: W.ability(p, 'SPD'), strength: 'STR', constitution: 'CON', intelligence: 'INT', noise: pick(['magical noise', 'ringing bell noise', 'screeching metal noise', 'air horn noise']), piles: pick(['trash', 'straw', 'dirt', 'refuse', 'hay']) };
    ['t_where', 't_who', 't_pit', 't_first', 't_close', 't_noise'].forEach((key, i) => { slots[key] = scope[i]; });
    death.forEach((value, i) => { slots['death' + i] = value; });
    slots.shrooms = pick(['blindness', 'fear', 'hallucinations', 'sleep']) + ' for ' + int(2, 6) + ' hours unless they can ' + (troll ? 'make a ' + slots.savingRoll + ' vs. STR or CON' : 'save for poison');
    const index = selected ?? int(0, ['box', 'idol'].includes(type) ? 48 : 50), row = D.dungeonText.traps[troll ? 0 : 1][index];
    let text;
    if (row) text = row.map(part => typeof part === 'string' ? part : part.roll ? int(...part.roll) : slots[part.slot] ?? '').join('');
    else if (index === 48) text = `A magical teleporter will send ${scope[1]} ${pick(['just outside the adventuring area', 'to a random location in the adventuring area', 'to the nearest confined area', int(2, 10) + ' miles away in a random direction'])}${W.d(2) === 1 ? ' naked while their belongings drop to the floor' : ''}.`;
    else if ([35, 36, 37].includes(+index)) text = 'A magical curse affects ' + scope[1] + ': ' + W.curse(p, level, scope[1]) + '.';
    else if (+index === 38) text = `A summoned creature attacks ${scope[1]} (${troll ? 'MR ' + level * 15 : level + ' HD'}).`;
    else text = `A magical trap affects ${scope[1]}, causing ${damage.replace('suffer ', '')}; ${troll ? 'make a ' + slots.savingRoll + ' vs. LCK or DEX' : 'save for spells'} to avoid it.`;
    if (W.game(p).slug === 'ssxs') text = text.replace(/1d[48]/g, '1d6');
    return W.plainText(text);
  };
  W.atmosphere = function (p) {
    const chance = W.number(p.atmo ?? p.x_atmo, 999, 0, 999);
    if (chance === 999) return '';
    let text;
    if (W.d(100) < chance) text = pick(['The area seems normal for this type of place', 'The area appears similar to the rest of the place', 'The area looks average compared with other sections of this place', 'The area is pretty ordinary at first glance', 'The area seems plain when you first look upon it']);
    else {
      const mood = int(50, 100);
      text = 'The area ' + (mood < 75 ? cell('smellMakerRoom') : mood < 85 ? cell('smellMakerRoom') + ' and ' + cell('airMakerRoom') : mood < 95 ? cell('airMakerRoom') : 'has ' + cell('fogMakerRoom'));
    }
    if (W.d(100) > 90) text += '. You can make out ' + pick(['a faint', 'a loud', 'a quiet', 'an eerie', 'a strange', 'an odd', 'an echoey', 'a muffled', 'a distant', 'a close']) /* atmosphere.php soundWhereRoom */ + ' ' + cell('soundMakerRoom') + ' sound coming from somewhere';
    return text + '.';
  };
  W.unusualRoom = function (p, rooms = 20) {
    const level = W.number(p.x_level, 1, 1, 100), value = int(1, 6);
    if (value === 1) return `An altar of ${cell('statueMake')} dedicated to ${W.name('demon')}. Offerings ${W.d(2) === 1 ? 'heal 1d6 damage' : 'trigger a curse: ' + W.curse(p, level, 'the worshipper')}.`;
    if (value === 2) return `A ${W.d(2) === 1 ? 'pool' : 'fountain'} of ${W.color()} liquid. Drinking ${W.d(2) === 1 ? 'heals 1d6 damage' : 'causes ' + W.trap(p, 'item')}`;
    if (value === 3 || value === 4) return `A ${value === 3 ? 'small idol' : 'statue'} of ${cell('statueMake')} representing ${W.name('demon')}. ${W.d(2) === 1 ? 'A secret compartment contains ' + W.gem() : W.trap(p, 'idol')}`;
    if (value === 5) return `A wizard floor symbol drawn in ${W.color()}. Entering it teleports the character to room ${int(1, rooms)}.`;
    return `A magical talking mouth speaks ${pick(['a riddle', 'a warning', 'a prophecy', 'a clue to a secret door'])} in ${tableChoice('descriptions', 'languageType', 'language', 'Common')}.`;
  };
  function attempts(p, kind, defaults, action) {
    const base = W.number(p['x_' + kind + '_c'], defaults[0], 0, 100);
    let min = W.number(p['x_' + kind + '_c_min'], defaults[1], 0, 100);
    const max = W.number(p['x_' + kind + '_c_max'], defaults[2], 0, 100), reduction = Math.ceil(base * W.number(p['x_' + kind + '_c_low'], defaults[3], 0, 100) / 100);
    if (W.d(100) > base) return;
    let chance = 100;
    const decrease = () => { min--; chance = min > 0 ? 100 : min === 0 ? base - reduction : chance - reduction; };
    for (let i = 0; i < max; i++) {
      if (kind === 'c') decrease();
      if (W.d(100) <= chance) action();
      if (kind !== 'c') decrease();
    }
  }

  W.adventureRoom = function (p, number, total, cave = false, post = false) {
    const content = [], encounters = [], treasures = [], traps = [];
    const customText = W.dataText(p), custom = customText ? W.parseData(customText, { ...p, terrain: p.terrain || p.x_terrain || 'DG' }) : null;
    const atmosphere = W.atmosphere(p);
    const contents = [], hiding = [];
    if (yes(p, 'x_furnish')) {
      if (custom) { if (custom.decorations.length) contents.push(pick(custom.decorations)); }
      else if (post) attempts(p, 'u', [30, 1, 3, 0], () => {
        const item = W.postRoomItem(p);
        contents.push(item.text);
        if (item.place && item.size) hiding.push({ place: item.place, size: item.size });
      });
      else {
        const furniture = W.furnishDetails(p, cave);
        contents.push(furniture.text);
        hiding.push(...furniture.hiding);
      }
    }
    const furnish = contents.join('; ');
    if (atmosphere || furnish) content.push('<p>' + esc([atmosphere, furnish].filter(Boolean).join(' ')) + '</p>');
    if (W.d(100) <= W.number(p.x_weird, post ? 0 : 1, 0, 100)) content.push('<p><b>SOMETHING UNUSUAL IN THE AREA...</b> ' + esc(post && W.postFeature ? W.postFeature(p, total) : W.unusualRoom(p, total)) + '</p>');
    if (post && W.d(100) <= W.number(p.x_frob, 0, 0, 100)) {
      const robots = W.monsters({ ...p, terrain: '', level: 0 }).filter(m => /robot|android|cyborg/i.test(m.name));
      if (robots.length) content.push('<div class="stranded-robot"><b>STRANDED ROBOT:</b> ' + W.monsterStats(pick(robots), true, p) + '</div>');
    }
    if (post && W.d(100) <= W.number(p.x_fveh, 0, 0, 100)) content.push('<p class="stranded-vehicle"><b>STRANDED VEHICLE:</b> ' + esc(pick(['automobile', 'truck', 'motorcycle', 'bus', 'van', 'all-terrain vehicle']) + ' (' + pick(['ruined', 'poor', 'fair', 'good', 'excellent', 'perfect']) + '); ' + int(0, 100) + '% fuel remaining') + '.</p>');
    let difficulty = 0, hoard = 0;
    attempts(p, 'c', [35, 1, 1, 0], () => {
      const options = { ...p, level: p.level ?? p.x_level ?? 0, terrain: p.terrain || 'DG', dungeonOnly: '1' };
      let monster;
      for (let i = 1; i <= 2; i++) if (!monster && p['x_enemy_' + i] && W.d(100) <= W.number(p['x_main_chance_' + i], 0, 0, 100)) monster = W.monsters({ ...options, level: 0, terrain: '' }).find(m => String(m.id) === String(p['x_enemy_' + i]) || W.monsterName(m) === p['x_enemy_' + i]);
      if (!monster && p.floorType === 'T' && W.d(100) > 20) monster = W.monsterPick({ ...options, x_undead: '1' });
      monster ||= W.monsterPick(options);
      if (!monster && yes(p, 'x_outside', 0)) monster = W.monsterPick({ ...options, terrain: p.x_terrain || 'DG', dungeonOnly: '0' });
      if (!monster) { content.push('<p class="empty-encounter">No Enemies Found for this terrain and level.</p>'); return; }
      difficulty = Math.max(difficulty, +monster.difficulty || 0);
      if (yes(p, 'x_rich', 0)) hoard = Math.max(hoard, ({ 1: 70, 2: 90, 3: 50 })[+monster.m_hoard] || 0);
      const life = W.monsterLife(monster, options);
      encounters.push({ id: monster.id, name: W.monsterName(monster), life, difficulty: +monster.difficulty || 0 });
      content.push(`<div class="room-encounter"><b>ENCOUNTER:</b> ${W.monsterStats(monster, yes(p, 'x_describe'), options)}${monster.custom ? '' : `<p>There ${life.length === 1 ? 'is' : 'are'} ${life.length} in this area. <b>${W.isTroll(p) ? 'MR' : W.game(p).slug === 'urthe' ? 'STAMINA' : 'HIT POINTS'}:</b> ${life.join(', ')}</p>`}</div>`);
    });
    const trapText = type => custom ? custom.traps.length ? pick(custom.traps) : '' : post && W.postTrap ? W.postTrap(p, type) : W.trap(p, type);
    attempts(p, 't', [10, 1, 1, 0], () => { const text = trapText('room'); if (text) { traps.push(text); content.push('<p class="room-trap"><b>TRAP:</b> ' + esc(text) + '</p>'); } });
    const level = difficulty || W.number(p.level ?? p.x_level, 0, 0, 100) || int(1, 20);
    const chance = W.number(p.x_l_c, 20, 0, 100), adjusted = Math.min(100, chance + (difficulty ? difficulty * W.number(p.x_adjust, 2, 0, 100) : 0) + (chance ? hoard : 0));
    const lootOptions = { ...p, level }, treasureState = { coins: false };
    attempts({ ...p, x_l_c: adjusted }, 'l', [20, 1, 5, 20], () => {
      const hidden = !custom && hiding.length ? hiding.shift() : null;
      const container = hidden ? 'Located ' + hidden.place : custom ? custom.containers.length ? pick(custom.containers) : '' : post && W.postContainer ? W.postContainer(p) : W.container();
      const trapped = W.d(100) <= W.number(p.x_rigged_chance, 30, 0, 100), trap = trapped ? trapText(hidden ? 'item' : 'box') : '';
      const treasure = custom ? W.dataTreasure(custom) : W.adventureFind(lootOptions, treasureState, hidden?.size || 3, post);
      if (!treasure) return;
      treasures.push({ container, trap, treasure, size: hidden?.size || 3 });
      content.push(`<p class="room-treasure"><b>TREASURE:</b> ${esc(container)}${trap ? ' [TRAPPED: ' + esc(trap) + ']' : ''}: ${esc(treasure)}</p>`);
    });
    return { number, encounters, traps, treasures, html: `<section class="adventure-room" data-room="${number}"><h3>${number}.</h3>${content.length ? content.join('') : '<p>This area is empty.</p>'}</section>` };
  };
  W.adventureFields = [W.gameField, f('x_area', 'Adventure name', 'text'), f('width', 'Map width', 'number', { value: 1, min: 1, max: 10 }), f('height', 'Map height', 'number', { value: 1, min: 1, max: 10 }), f('map_rooms', 'Rooms on your own map (0 = generate map)', 'number', { value: 0, min: 0, max: 1000 }), f('x_level', 'Party level (0 = any)', 'number', { value: 0, min: 0, max: 100 }), f('x_characters', 'Party size (0 = random)', 'number', { value: 0, min: 0, max: 100 }), f('x_terrain', 'Outdoor terrain', 'select', { value: 'DG', options: W.terrains }), f('x_outside', 'Use outdoor creatures', 'checkbox'), f('atmo', 'Atmosphere (999 = none)', 'number', { value: 999, min: 0, max: 999 }), f('x_furnish', 'Furnish rooms', 'checkbox', { value: 1 }), f('x_describe', 'Describe creatures', 'checkbox', { value: 1 }), f('x_weird', 'Unusual features (%)', 'number', { value: 1, min: 0, max: 100 }), f('x_cut', 'Treasure value (%)', 'number', { value: 100, min: 0, max: 1000 }), f('x_rigged_chance', 'Trapped containers (%)', 'number', { value: 30, min: 0, max: 100 }), f('wandering', 'Wandering encounter tables', 'checkbox', { value: 1 }), ...[['c', 'Encounters', 35, 1, 0], ['t', 'Traps', 10, 1, 0], ['l', 'Treasure', 20, 5, 20]].flatMap(([code, label, chance, max, reduction]) => [f('x_' + code + '_c', label + ' (%)', 'number', { value: chance, min: 0, max: 100 }), f('x_' + code + '_c_min', label + ' minimum', 'number', { value: 1, min: 0, max: 100 }), f('x_' + code + '_c_max', label + ' maximum', 'number', { value: max, min: 0, max: 100 }), f('x_' + code + '_c_low', label + ' chance reduction', 'number', { value: reduction, min: 0, max: 100 })]), ...W.dataFields];
  W.adventureFields.push(f('x_undead', 'Undead only', 'checkbox'), f('x_adjust', 'Extra loot chance per enemy level (%)', 'number', { value: 2, min: 0, max: 100 }), f('x_rich', 'Hoarding creatures have treasure', 'checkbox'), f('x_low_magic', 'Magic item chance (%)', 'number', { value: 100, min: 0, max: 100 }), f('x_whichmagic', 'Original game magic items (%)', 'number', { value: 50, min: 0, max: 100 }), f('aec', 'Include AEC', 'checkbox'), f('dd_ff', 'Include Fiend Folio', 'checkbox'), f('dd_mm2', 'Include Monster Manual II', 'checkbox'), f('x_extra', 'Include Monsters of Myth', 'checkbox'));
  W.adventure = function (p, mode) {
    const post = ['uexfl', 'uruins'].includes(mode), game = p.game || (p.x_game || p.x_package ? W.game(p).slug : post ? 'mutfut' : W.game(p).slug), options = { ...p, game };
    const complex = mode === 'delve' && ['Complex', 'Progressive'].includes(p.x_delve), progressive = p.x_delve === 'Progressive';
    const own = W.number(p.map_rooms, 0, 0, 1000), type = mode === 'delve' ? 'Side View' : p.type || p.map_type || (mode === 'uexfl' ? 'Building' : 'Cavernous Dungeon');
    const map = own ? { html: '', tiles: [], rooms: W.range(own, W.number(p.start ?? p.map_numbers, 1, 1, 100000)).map(number => ({ number, type: 'D', size: 'S' })) } : W.geomorphMap({ ...p, type, complex: complex ? '1' : '0', keyed: '1' }, mode === 'uruins' ? 'ruins' : mode === 'uexfl' ? 'scifi' : 'dungeon');
    const floors = [], rooms = [];
    let careerLevel = W.number(p.x_level, 1, 1, 100), currentFloor = 0;
    const maximumLevel = Math.max(careerLevel, game === 'ssxs' ? 6 : 21), floorsPerLevel = Math.round(map.rooms.length / Math.max(1, maximumLevel - careerLevel));
    let html = `<h2>${esc(p.x_area || ({ delve: 'Dungeon Delve', ultimate: 'Ultimate Dungeon', uexfl: 'Ultimate Sci-Fi Adventure', uruins: 'Ultimate Ruins' })[mode])}</h2>` + map.html;
    for (const [index, area] of map.rooms.entries()) {
      const remaining = map.rooms.length - index - 1;
      if (progressive && (++currentFloor >= floorsPerLevel && careerLevel < maximumLevel || remaining < 5 && careerLevel < 16 || remaining < 4 && careerLevel < 17 || remaining < 3 && careerLevel < 18 || remaining < 2 && careerLevel < 19 || remaining < 1 && careerLevel < 20)) { careerLevel++; currentFloor = 0; }
      const level = progressive ? careerLevel : options.x_level;
      const floorOptions = { ...options, x_level: level, floorType: area.type };
      if (complex) {
        const size = area.type === 'W' ? [1, 1] : area.size === 'L' ? W.d(2) === 1 ? [2, 1] : [1, 2] : area.size === 'M' ? [1, 1] : [0, 0];
        const floor = W.geomorphMap({ ...p, width: size[0], height: size[1], type: area.type === 'W' ? 'Water Cavern' : area.type === 'C' ? 'Cavernous' : 'Dungeon', interior: '1', keyed: '1', start: 1 }, 'dungeon');
        floors.push({ number: area.number, level, tiles: floor.tiles, rooms: floor.rooms });
        html += `<section class="delve-floor"><h2>Floor ${area.number}${progressive ? ' — Level ' + level : ''}</h2>${floor.html}`;
        for (const room of floor.rooms) { const result = W.adventureRoom(floorOptions, room.number, floor.rooms.length, ['C', 'W'].includes(area.type)); rooms.push({ floor: area.number, ...result }); html += result.html; }
        html += '</section>';
      } else {
        const result = W.adventureRoom(floorOptions, area.number, map.rooms.length, /cavern/i.test(type), post);
        rooms.push(result); html += result.html;
      }
    }
    if (yes(p, 'wandering')) {
      const count = progressive ? W.isTroll(options) || game === 'ssxs' ? 35 : 39 : W.isTroll(options) || game === 'ssxs' ? 11 : 12;
      for (const [terrain, label] of [['DG', 'RANDOM ENCOUNTERS IN THIS DUNGEON'], ...(p.x_terrain && p.x_terrain !== 'DG' ? [[p.x_terrain, 'RANDOM ENCOUNTERS OUTDOORS']] : [])]) html += `<section class="adventure-wandering"><h3>${label}</h3>` + W.routes.wander.generate({ ...options, terrain, n: count }) + '</section>';
    }
    W.storage.set('last-adventure', { mode, options: p, tiles: map.tiles, floors, rooms });
    return html;
  };
  for (const [route, title] of [['delve', 'Dungeon Delve'], ['ultimate', 'Ultimate Dungeon'], ['uexfl', 'Ultimate Sci-Fi Adventure'], ['uruins', 'Ultimate Ruins']]) {
    const fields = [...W.adventureFields];
    if (route === 'delve') fields.push(f('x_delve', 'Delve type', 'select', { value: 'Simple', options: ['Simple', 'Complex', 'Progressive'] }), f('x_floors', 'Omit floors (%)', 'number', { value: 0, min: 0, max: 100 }));
    else if (route === 'ultimate') fields.push(f('type', 'Map type', 'select', { value: 'Cavernous Dungeon', options: ['Dungeon', 'Cavernous', 'Cavernous Dungeon'] }));
    else if (route === 'uexfl') fields.push(f('type', 'Map type', 'select', { value: 'Building', options: ['Building', 'Spaceship', 'Exodus Spaceship'] }));
    W.register(route, title, 'Generate a map and keyed adventure with room contents, encounters, traps, treasure and wandering enemies. Results stay on this computer.', fields, p => W.adventure(p, route));
  }
})(window.WZ, window.WZ_DATA);
