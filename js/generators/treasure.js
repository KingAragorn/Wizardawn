(function (W, D) {
  'use strict';
  const f = W.field, esc = W.escape, pick = a => W.pick(a), int = (a, b) => W.rng.int(Math.min(a, b), Math.max(a, b));
  const yes = (p, key, fallback = 1) => String(p[key] ?? fallback) === '1';
  W.potionChoice = function (p) {
    const game = W.game(p).slug, rows = D.magicItems.potions[game];
    if (!rows?.length) return pick(W.potionNames(p));
    const bounds = { osric: [319, 528], lablord: [691, 852] }[game];
    const available = bounds ? rows.filter(row => row.min >= bounds[0] && row.max <= bounds[1]) : rows;
    const row = W.weighted(available.map(row => ({ value: row, weight: row.max - row.min + 1 })));
    if (row.nested?.length) { const roll = int(...row.die); return row.nested.find(item => roll >= item.min)?.name || pick(row.names); }
    return pick(row.names);
  };
  W.magicItem = function (p) {
    if (W.d(100) <= 20 && W.potionNames(p).length) return W.potionChoice(p) + ' — ' + W.potionAppearance();
    const game = W.game(p).slug, pool = (D.magicItems.names[game] || D.magicItems.names.lablord).filter(name => !/^Potion|^Oil |^Philter|^Elixir/.test(name));
    return W.plainText(pick(pool));
  };
  W.rpgMagicItem = W.magicItem; // makeRPGmagic(): the game's own items (magic-items.js later wraps W.magicItem).
  W.jewel = function (cut = 100) {
    return pick(['gold', 'silver', 'platinum', 'bronze', 'ivory']) + ' ' + pick(['ring', 'necklace', 'bracelet', 'earrings', 'brooch', 'medallion', 'tiara', 'circlet']) + (W.d(2) === 1 ? ' set with ' + W.gem(cut) : ' (' + Math.max(1, Math.ceil(int(10, 1000) * cut / 100)) + 'gp)');
  };
  W.loot = function (p) {
    const max = W.number(p.max ?? p.x_max, 10, 1, 100), min = Math.min(max, W.number(p.min ?? p.x_min, 1, 1, 100)), amount = int(min, max);
    const dataText = W.dataText(p);
    if (dataText) {
      const data = W.parseData(dataText);
      return W.range(amount).map(() => W.dataTreasure(data)).join('; ');
    }
    const game = W.game(p).slug, post = ['mutfut', 'gamma', 'meta', 'urthe', 'apoc', 'scifi', 'ryft'].includes(game);
    const type = String(p.type ?? p.x_type ?? '0');
    const currency = p.money || p.x_money || ({ gamma: 'domars', meta: 'domars', urthe: 'xm' })[game] || 'gp';
    let coins = false;
    return W.range(amount).map(() => {
      const reward = type === '1' ? 100 : type === '2' ? int(post ? 25 : 70, post ? 84 : 91) : int(coins ? post ? 50 : 51 : 1, 100);
      const level = W.number(p.level ?? p.x_level, int(1, 20), 1, 100), cut = W.number(p.x_cut, game === 'ssxs' ? int(5, 10) : int(25, 75), 0, 1000);
      if (reward < (post ? 50 : 51)) { coins = true; return post ? W.postCurrency({ ...p, money: currency, type: game === 'meta' ? 'Spaceship' : 'Building' }, level, int(1, 3), cut, true) : W.currency(p, level, int(1, 3), cut); }
      if (post) return reward < 85 ? W.junkItem({ ...p, money: currency, tech: game === 'meta' ? '1' : '0' }) : W.postArtifact({ ...p, money: currency, condition: yes(p, 'x_cond', 0) ? '0' : '1' });
      if (reward < 86) return W.jewel(cut);
      if (reward < 90) return 'GEMS [' + int(1, 3) + ' each]: ' + W.gem(cut);
      if (reward < 92) return 'JEWELRY: ' + W.jewel(cut);
      if (W.d(100) > W.number(p.x_low_magic, 100, 0, 100)) return W.jewel(cut);
      // tool_loot.php: x_whichmagic % from the game's own tables, the rest from Wizardawn's generator.
      if (p.x_whichmagic !== undefined && p.x_whichmagic !== '' && D.magicItems.names[game] && W.number(p.x_whichmagic, 50, 0, 100) >= int(1, 100)) return W.plainText(W.rpgMagicItem(p));
      return W.magicItem(p);
    }).join('; ');
  };
  W.adventureFind = function (p, state, size = 3, post = false) {
    const level = W.number(p.level ?? p.x_level, 1, 1, 100), cut = W.number(p.x_cut, 100, 0, 1000);
    const reward = int(state.coins ? 91 : 1, 100);
    if (reward < 91) {
      state.coins = true;
      return post ? W.postCurrency(p, level, size, cut, true) : W.currency(p, level, size, cut);
    }
    if (post) return W.d(100) <= W.number(p.x_low_tech, 100, 0, 100) ? W.postArtifact(p, size) : W.junkItem(p);
    if (reward < 96) return 'GEMS [' + int(1, 3) + ' each]: ' + W.gem(cut);
    if (reward < 98) return 'JEWELRY: ' + W.jewel(cut);
    if (W.d(100) > W.number(p.x_low_magic, 100, 0, 100)) return W.jewel(cut);
      // tool_loot.php: x_whichmagic % from the game's own tables, the rest from Wizardawn's generator.
      if (p.x_whichmagic !== undefined && p.x_whichmagic !== '' && D.magicItems.names[game] && W.number(p.x_whichmagic, 50, 0, 100) >= int(1, 100)) return W.plainText(W.rpgMagicItem(p));
      return W.magicItem(p);
  };
  W.register('loot', 'Treasure Hoards', 'Generate treasure hoards, or roll weighted treasure lists from a custom Wizardawn data file.', [W.gameField, W.countField('Hoards'), f('min', 'Minimum finds', 'number', { value: 1, min: 1, max: 100 }), f('max', 'Maximum finds', 'number', { value: 10, min: 1, max: 100 }), f('x_type', 'Treasure type', 'select', { value: 0, options: [[0, 'Valuables & Relics'], [2, 'Valuables'], [1, 'Relics']] }), f('x_list', 'One item per line', 'checkbox'), f('x_cond', 'Condition items', 'checkbox'), f('x_oldway', 'T&T items', 'select', { value: 0, options: [[0, 'Use T&T Items'], [1, 'Use Magestykc Items']] }), f('ua', 'Include Unearthed Arcana', 'checkbox'), f('aec', 'Include AEC', 'checkbox'), f('x_whichmagic', '% from the Game & the remaining created by Wizardawn', 'number', { value: 50, min: 0, max: 100 }), ...W.dataFields], p => W.table(['Hoard', 'Treasure'], W.range(W.count(p, 'x_amount')).map(i => {
    const parts = W.loot(p).split('; ');
    return [i, yes(p, 'x_list', 0) ? W.list(parts.map(esc)) : parts.map(esc).join('; ')];
  })));
  const roman = value => { let text = ''; for (const [n, digit] of [[10, 'X'], [9, 'IX'], [5, 'V'], [4, 'IV'], [1, 'I']]) while (value >= n) { value -= n; text += digit; } return text; };
  W.treasureMap = function (p, level) {
    const data = W.dataText(p) ? W.parseData(W.dataText(p)) : null;
    const cut = W.number(p.x_cut, int(25, 50), 0, 1000) / (W.game(p).slug === 'ssxs' ? 5 : 1);
    const container = data ? data.containers.length ? pick(data.containers) : '' : W.container();
    const trapped = W.d(100) <= level + 50;
    const trap = trapped ? data ? data.traps.length ? pick(data.traps) : '' : W.trap({ ...p, level }, 'box') : '';
    let coins = false;
    const treasure = W.range(level + int(2, 10)).map(() => {
      if (data) return W.dataTreasure(data);
      const roll = int(coins ? 91 : 1, 100);
      if (roll < 91) { coins = true; return W.currency(p, int(1, 20), int(1, 3), cut); }
      if (roll < 96) return 'GEMS [' + int(1, 3) + ' each]: ' + W.gem(cut);
      if (roll < 98) return 'JEWELRY: ' + W.jewel(cut);
      return W.magicItem({ ...p, x_cut: cut });
    }).filter(Boolean);
    const clue = W.treasureClue(p, level);
    return { level, container, trap, treasure, clue, owner: clue.match(/treasure of (.+?) the /)?.[1] || '' };
  };
  W.register('tmap', 'Random Treasure Maps', 'Generate descriptions of treasure maps, their legends, hiding places, protections and hoards.', [W.gameField, W.countField('Maps'), f('level', 'Map level (0 = random)', 'number', { value: 0, min: 0, max: 20 }), f('x_cut', 'Treasure value (%)', 'number', { value: 35, min: 0, max: 1000 }), f('x_whichmagic', 'Original game magic items (%)', 'number', { value: 50, min: 0, max: 100 }), f('x_oldway', 'Use Magestykc weapons and armor', 'checkbox'), f('aec', 'Include AEC', 'checkbox'), f('ua', 'Include Unearthed Arcana', 'checkbox'), ...W.dataFields], p => {
    const maps = W.range(W.count(p, 'amount')).map(() => W.treasureMap(p, W.number(p.level, 0, 0, 20) || int(1, 20)));
    W.storage.set('last-treasure-maps', { options: p, maps });
    return maps.map((map, i) => `<article class="treasure-map"><h3>Map ${i + 1}</h3><p><b>Treasure Map</b> [ Type ${roman(map.level)} ] ${esc(map.clue.replace(/^(\[[^\]]+\] )?/, '$1- '))} ${esc(map.owner)} was known to have had:</p><p><b>TREASURE:</b> [${esc(map.container)}${map.trap ? ' — TRAPPED: ' + esc(map.trap) : ''}]: ${esc(map.treasure.join(' ----- ')) || 'Unknown Treasure'}</p></article>`).join('');
  });
  const doorSections = [['mi', 'Mundane Items', 100], ['ui', 'Unusual Items', 20], ['rt', 'Room Traps', 20], ['c', 'Containers', 20], ['ct', 'Container Traps', 20], ['cs', 'Curses', 20], ['ggj', 'Coins, Gems, Jewels', 100], ['ei', 'Exceptional Items', 20], ['th', 'Treasure Hoards', 20], ['en', 'Encounters', 100]];
  W.register('doors', 'Dungeon Door', 'Create the original collection of dungeon reference tables, choosing which sections to include.', [W.gameField, f('x_level', 'Dungeon level (0 = random)', 'number', { value: 0, min: 0, max: 100 }), ...doorSections.map(([key, title]) => f('x_show_' + key, title, 'checkbox', { value: 1 })), f('x_describe', 'Creature descriptions', 'checkbox', { value: 1 })], p => {
    const troll = W.isTroll(p) || W.game(p).slug === 'ssxs';
    return doorSections.filter(([key]) => yes(p, 'x_show_' + key)).map(([key, title, normalCount]) => {
      const count = troll ? normalCount === 100 ? 96 : 16 : normalCount;
      return `<section class="door-section" data-section="${key}"><h3>${title}</h3>` + W.table(['Roll', title], W.range(count).map(i => {
        let value;
        if (key === 'mi') value = esc(W.range(int(3, 13)).map(() => W.fantasyItem(p)).join('; '));
        else if (key === 'ui') value = esc(W.unusualRoom(p));
        else if (key === 'rt' || key === 'ct') value = esc(W.trap(p, key === 'ct' ? 'box' : 'room'));
        else if (key === 'c') value = esc(W.container());
        else if (key === 'cs') value = esc(W.curse(p, W.number(p.x_level, int(1, 20)), 'person'));
        else if (key === 'ggj') value = esc(W.d(10) < 8 ? W.currency(p, int(1, 20), int(1, 3), int(5, 10)) : W.d(2) === 1 ? W.gem() : W.jewel());
        else if (key === 'ei') value = esc(W.magicItem(p));
        else if (key === 'th') value = esc(W.loot({ ...p, min: 5, max: 15 }));
        else { const monster = W.monsterPick({ ...p, terrain: 'DG' }); value = monster ? W.monsterStats(monster, yes(p, 'x_describe'), p) : 'No Enemies Found!'; }
        const roll = troll ? normalCount === 100 ? 'S' + (Math.floor((i - 1) / 16) + 1) + '/' + ((i - 1) % 16 + 3) : i + 2 : i;
        return [roll, value];
      })) + '</section>';
    }).join('');
  });
  const dataLists = ['Dungeon Containers', 'Dungeon Decorations', 'Dungeon Traps', 'Dungeon Treasure (3 Denominations)', 'Dungeon Treasure (5 Denominations)', ...['Post-Apocalyptic', 'Sci-Fi', 'T&T 5e', 'T&T 7e'].flatMap(type => ['Containers', 'Decorations', 'Traps', 'Treasure'].map(part => type + ' ' + part)), 'T&T 5e Simple', 'T&T 7e Simple', 'T&T Deluxe Treasure'];
  W.register('data', 'Generating Data', 'Create copyable Wizardawn data tables for custom areas, treasure and wandering enemies.', [f('data_lists', 'Data table', 'select', { value: dataLists[0], options: dataLists }), f('data_amount', 'Entries', 'number', { value: 10, min: 1, max: 1000 })], p => {
    const type = p.data_lists || dataLists[0], amount = W.number(p.n ?? p.data_amount, 10, 1, 1000), post = /Post-Apocalyptic|Sci-Fi/.test(type), game = /5e/.test(type) ? 'tt5e' : /Deluxe/.test(type) ? 'ttde' : /7e/.test(type) ? 'tt7e' : /3 Denominations/.test(type) ? 'sandw' : post ? 'mutfut' : 'lablord';
    const options = { game, type: /Sci-Fi/.test(type) ? 'Spaceship' : 'Building', money: /Sci-Fi/.test(type) ? 'pc' : '$', tech: '1', x_oldway: /Simple/.test(type) ? '1' : '0' }, cells = [];
    if (/Treasure|Simple/.test(type)) {
      cells.push((post ? 'Money' : 'Riches') + '\t' + (game.startsWith('tt') ? '5' : '20') + '\t1', 'Item\t1\t2', '--END--');
      const riches = Math.ceil(amount / 3), magic = Math.ceil(amount - amount / 3);
      W.range(riches).forEach(() => cells.push((post ? W.postCurrency(options, int(1, 20), int(1, 3), int(1, 30)) : W.loot({ ...options, min: 1, max: 1, type: 2 })) + '\t1\t0'));
      cells.push('--END--');
      W.range(magic).forEach(() => cells.push((post ? W.postArtifact(options) : W.loot({ ...options, min: 1, max: 1, type: 1 })) + '\t1\t0'));
    } else W.range(amount).forEach(() => cells.push(/Containers/.test(type) ? post ? W.d(3) === 1 ? W.postBag({ type: 'Spaceship' }) : W.postContainer(options) : W.container() : /Traps/.test(type) ? post ? W.postTrap(options, 'list') : W.trap(options) : post ? W.postRoomItem(options).text : W.fantasyItem(options)));
    const text = cells.join('\n');
    W.storage.set('generated-data', { type, text });
    return `<h3>${esc(type)}</h3><textarea class="data-output" aria-label="Generated data" readonly rows="20" style="width:100%">${esc(text)}</textarea>`;
  });
})(window.WZ, window.WZ_DATA);
