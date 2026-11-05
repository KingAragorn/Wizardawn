(function (W, D) {
  'use strict';
  const esc = W.escape, f = W.field, pick = a => W.pick(a), int = (a, b) => W.rng.int(Math.min(a, b), Math.max(a, b));
  const yes = (p, key, fallback = 1) => String(p[key] ?? fallback) === '1';
  const space = p => ['Spaceship', 'Exodus Spaceship'].includes(p.type || p.map_type || p.map);
  const cash = p => String(p.money || p.x_money || ({ urthe: 'xormite', gamma: 'domars', meta: 'domars' })[W.game(p).slug] || 'gold');
  const wood = () => pick(['maple', 'cedar', 'oak', 'rosewood', 'walnut', 'mahogany', 'birch']);
  const metal = () => pick(['iron', 'iron', 'metal', 'bronze', 'brass']);
  const helper = key => pick(D.postTables.helpers[key][0][1]);
  W.mutantSurname = function () {
    const parts = [helper('speciesName'), helper('mutantName')];
    if (W.d(2) === 1) parts.reverse();
    const name = parts.join('').toLowerCase();
    return name.charAt(0).toUpperCase() + name.slice(1);
  };
  W.descriptionText = function (parts, slots) {
    return W.plainText(parts.map(part => typeof part === 'string' ? part : part.roll ? int(...part.roll) : typeof slots[part.slot] === 'function' ? slots[part.slot]() : slots[part.slot] ?? '').join(''));
  };
  W.postCondition = function (kind) {
    const words = { cloth: ['torn ', 'ripped ', 'ruined ', 'moldy ', '', '', '', ''], iron: ['rusty ', 'corroded ', 'bent ', 'ruined ', '', '', '', ''], wood: ['rotten ', 'warped ', 'broken ', 'ruined ', '', '', '', ''], item: ['broken ', 'ruined ', 'useless ', '', '', ''], jar: ['broken ', 'ruined ', 'empty ', '', '', ''], water: ['clean ', 'stagnant ', 'dirty ', 'murky ', 'oily ', 'poisoned '], paper: ['blank ', 'ruined ', 'burnt ', 'wet '] };
    return pick(words[kind] || words.item);
  };
  W.postBag = function (p = {}) {
    const alien = space(p), type = int(0, 6), color = () => W.color();
    const bag = (alien ? ['bag', 'sack', 'mining bag', 'backpack', 'medical bag', 'tool pouch', 'pouch'] : ['bag', 'sack', 'satchel', 'backpack', 'duffel bag', 'garbage bag', 'briefcase'])[type];
    const material = alien ? pick([W.color('leatherColor') + ' nylon', 'woven titanium mesh', color() + ' cloth', W.color('leatherColor') + ' silicon']) : type === 5 ? color() + ' plastic' : pick([W.color('leatherColor') + ' leather', 'leather', W.color('leatherColor') + ' canvas', ...(type === 6 ? [] : [color() + ' cloth', color() + ' nylon'])]);
    return material + ' ' + bag;
  };
  W.postContainer = function (p = {}) {
    const tech = p.tech ?? p.x_tech ?? (space(p) ? 1 : 0), roll = int(0, 9), advanced = String(tech) === '1';
    if (roll < 3) return advanced ? ['metal safe with a bio-mechanical lock', 'metal safe with a keypad combination in odd alien symbols', 'metal safe with a broken door'][roll] : ['steel safe with a dial combination of ' + int(1, 39) + 'R ' + int(1, 39) + 'L ' + int(1, 39) + 'R', 'steel safe with a keypad combination of ' + W.range(4).map(() => int(0, 9)).join(''), 'steel safe with a broken door'][roll];
    const type = ['chest', 'trunk', 'footlocker', 'case', 'desk', 'cabinet', 'box'][roll - 3];
    const lock = advanced ? pick(['retina scanner lock', 'thermal scanner lock']) : pick(['locked padlock', 'locked keyhole']);
    return advanced ? pick(['metal ' + type + ' with a ' + lock, 'metal ' + type + ' with a broken ' + lock, 'metal ' + type, 'hard plastic ' + type]) : pick([wood() + ' ' + type + ' with a ' + lock, 'iron ' + type + ' with a ' + lock, wood() + ' ' + type, 'iron ' + type]);
  };
  W.postCurrency = function (p, level = 1, size = 3, cut = 100, bagged = false) {
    const roll = int(1, size === 1 ? 65 : size === 2 ? 80 : 90), value = (roll < 36 ? 500 : roll < 66 ? 1000 : roll < 81 ? 2000 : 5000) * Math.max(1, level);
    const amount = Math.ceil(int(Math.round(value / 4), value) * cut / 100);
    return (bagged ? 'A ' + W.postBag(p).toUpperCase() + ' CONTAINING: ' : '') + amount.toLocaleString('en-US') + ' ' + cash(p);
  };
  W.postJewel = p => W.gem(W.number(p.x_cut, 100, 0, 1000)).replace(/gp\)/, ' ' + cash(p) + ')');
  W.postArtifact = function (p, size = int(1, 3), category, selected) {
    const game = W.game(p).slug, legacy = ['gamma', 'meta'].includes(game), bu = game === 'urthe';
    const groups = D.postTables.artifacts[game === 'gamma' ? 'makeGWItem' : game === 'meta' ? 'makeMAItem' : bu ? 'makeBUItem' : 'makePAItem'];
    const roll = int(1, size === 1 ? 50 : size === 2 ? 60 : legacy || bu ? 70 : 80);
    category ||= legacy ? roll <= 10 ? 'pistol' : roll <= 20 ? 'grenade' : roll <= 40 ? 'device' : roll <= 50 ? 'weapon' : roll <= 60 ? 'armor' : 'rifle' : bu ? ['pistol', 'grenade', 'drug', 'device', 'weapon', 'armor', 'rifle'][Math.floor((roll - 1) / 10)] : ['pistol', 'grenade', 'device', 'weapon', 'drug', 'bomb', 'rifle', 'armor'][Math.floor((roll - 1) / 10)];
    if (bu && category === 'drug') return pick(['stasis belt', 'adrenaline shot', 'mutagen shot', 'steroid shot', 'medshot', 'medwrap', 'toxshot']);
    let rows = groups[category] || groups.device;
    if (!legacy && !bu) {
      const limit = category === 'weapon' ? size === 1 ? 4 : size === 2 ? 8 : 10 : category === 'bomb' ? size < 3 ? 12 : 21 : category === 'drug' ? size === 1 ? 18 : size === 2 ? 19 : 21 : Infinity;
      rows = rows.filter(row => row.index <= limit);
    }
    const row = selected == null ? pick(rows) : rows.find(row => row.index === selected) || rows[0];
    const shortRange = int(10, 16) * 5, toHit = int(7, 10);
    let text = W.descriptionText(row.parts, { ranges: `${shortRange}'/${shortRange + 125}'/${shortRange + 225}'`, shoots: `${toHit}/${toHit + 3}/${toHit + 8}` });
    if (!legacy && String(p.condition) !== '1' && !['drug', 'grenade'].includes(category)) { const die = int(2, 12); text += ' (' + (die < 6 ? 'ruined' : die < 8 ? 'poor' : die < 10 ? 'fair' : die < 11 ? 'good' : die < 12 ? 'excellent' : 'perfect') + ')'; }
    return text.charAt(0).toUpperCase() + text.slice(1);
  };
  W.postCorpse = function () {
    const look = pick(['bloody', 'decayed', 'rotted', 'half-eaten', 'mutilated']);
    const noun = pick(['body', 'corpse', 'remains', 'bones']);
    const species = W.d(100) > 70 ? 'human' : 'humanoid ' + helper('PAcorpseMaker');
    return look + ' ' + noun + ' of a ' + (noun === 'bones' ? '' : (W.d(100) > 70 ? 'female' : 'male') + ' ') + species;
  };
  W.postFeature = function (p, totalRooms = 20, selected) {
    const room = int(1, Math.max(1, totalRooms)), power = W.game(p).slug === 'meta' ? 'power cells' : 'power clips and batteries';
    const form = pick(D.postTables.helpers.postFeatureForms[W.d(3) > 1 ? 0 : 1][1]);
    const mutation = pick(['skin turns to ' + W.color() + ' feathers', 'skin turns ' + W.color(), 'skin turns to ' + W.color() + ' scales', 'can see in total darkness but now sensitive to light', 'everyone in the area is vaporized', 'hair turns ' + W.color(), 'hair falls out', 'turns everyone into a humanoid ' + form]);
    const fruit = pick(['poisonous', 'restores 1d6 damage when eaten', 'explodes if thrown causing 2d6 damage', 'causes sleep for ' + int(1, 12) + ' turns if eaten', 'gives infravision for ' + int(1, 12) + ' turns if eaten', 'gives poison resistance for ' + int(1, 12) + ' turns if eaten']);
    const button = pick(['causes self-destruct in ' + int(2, 10) + ' turns', 'opens every door in the entire ship', 'causes a nearby wall to open, revealing a random creature', 'causes vents to fill the room with ' + W.color() + ' smoke', 'triggers a loud alarm that can be heard throughout the ship', 'causes a bright flash of light that drains all ' + power + ' and energy weapons', 'triggers soft music to play in the room', "turns the room's lights on and off", 'launches a missile from the ship', 'fires a large exterior laser cannon', 'activates radiation lights that changes everyone in the room [' + mutation + ']', 'closes and locks every door in the entire ship', 'triggers a loud alarm that can be heard throughout the ship, with flashing red lights everywhere']);
    const computer = pick(['the screen shows a live feed of room #' + room, 'voice activated and can answer ' + int(2, 6) + ' questions about the ship', 'shows a map of a section of the ship', 'with a series of buttons, and a large ' + W.color() + ' button [' + button + ']', 'with a slot to recharge ' + power]);
    return [
      'A food vending machine that requires a keypad input to dispense food or drink.',
      'A glowing pad on the floor that teleports anyone standing on it to room #' + room + '.',
      'A large ' + W.color() + ' plant that has ' + int(3, 12) + ' odd ' + W.color() + ' fruit (' + fruit + ').',
      "A cloning tube that will clone another creature from some of it's dead organic material.",
      'An escape pod that can hold ' + int(2, 10) + ' humanoids. If activated, it will launch the pod and land about ' + int(1, 10) * 10 + ' miles away.',
      'A computer terminal (' + computer + ')'
    ][selected ?? int(0, 5)];
  };
  W.postRoomItem = function (p = {}, selected) {
    const alien = space(p), game = W.game(p).slug;
    if (selected == null && W.d(100) > 80) return { text: W.junkItem({ ...p, money: cash(p), tech: alien ? '1' : '0' }), place: '', size: 0, trapped: false };
    const number = selected ?? int(0, alien && ['meta', 'lablord'].includes(game) ? 142 : 143), row = D.postTables.clutter[alien ? 0 : 1][number];
    const slots = { cash: cash(p), color: () => W.color(), wall: () => pick(['floor', 'wall', 'ceiling']), wood, metal, furniture: () => helper('PAfurnitureMake'), alienFurniture: () => helper('AlienfurnitureMake'), bag: () => W.postBag(p), precious: () => helper('PApreciousChooser'), jewel: () => W.postJewel(p), animal: () => helper('PAheadMount'), size: () => pick(['large', 'long', 'short', 'round', 'low', 'square', 'small']), bottle: () => pick(['glass bottle', 'glass jar', 'plastic bottle', 'ceramic jug', 'clay jug']), carpet: () => W.postCondition('cloth') + W.color() + ' carpet', eggs: () => pick(['bird eggs', 'snake eggs', 'lizard eggs', 'insect eggs']), cage: () => pick(['iron cage', 'wooden cage', 'steel cage']), tracks: () => pick(['footprints', 'boot prints', 'claw prints', 'paw prints']), clothes: () => '[CONTAINS: ' + W.range(int(2, 10)).map(() => W.postCondition('cloth') + pick(['shirt', 'trousers', 'skirt', 'jacket', 'robe', 'socks', 'dress'])).join(', ') + ']' };
    for (const kind of ['item', 'iron', 'wood', 'cloth', 'jar', 'water', 'paper']) slots['condition_' + kind] = () => W.postCondition(kind);
    let text;
    if (row.parts) text = W.descriptionText(row.parts, slots);
    else {
      const furniture = () => alien ? helper('AlienfurnitureMake') : helper('PAfurnitureMake');
      const manual = {
        52: () => W.postCondition('wood') + 'framed painting of ' + W.name('village'),
        71: () => { const bulbs = int(5, 10); return bulbs + ' light bulbs on the ' + (alien ? 'ceiling' : 'walls in ' + metal() + ' wall sconces') + '...but only ' + Math.ceil(bulbs / int(2, 4)) + ' are still useable'; },
        103: () => W.postCondition('iron') + (alien ? 'metal space helmet with an alien head' : metal() + ' dented helmet with a humanoid head') + ' still in it',
        106: () => 'a pile of ashes containing ' + pick(['human', 'animal', 'insect', 'alien']) + ' bone fragments',
        110: () => (alien ? 'an alien corpse' : W.postCorpse()) + ' [CONTAINS: ' + W.range(int(2, 5)).map(() => W.junkItem(p)).join('; ') + ']',
        138: () => W.postCondition('iron') + pick(alien ? ['steel sword', 'metal spear', 'alien axe', 'metal club'] : ['sword', 'spear', 'hand axe', 'crossbow', 'long bow', 'knife']),
        139: () => W.postCondition('item') + pick(alien ? ['space helmet', 'metal breastplate', 'protective suit'] : ['leather armor', 'metal helmet', 'ballistic vest', 'riot shield']),
        140: () => W.postCondition('iron') + 'locker [CONTAINS: ' + W.range(int(2, 5)).map(() => W.junkItem({ ...p, tech: alien ? '1' : '0' })).join('; ') + ']'
      };
      text = manual[number] ? manual[number]() : furniture() + ' cabinet';
    }
    if ([0, 2, 63, 87, 89, 130, 132].includes(+number) && W.d(2) === 1) {
      if (+number === 0) text = text.replace(/arrows/, 'crossbow bolts');
      if (+number === 2) text = alien ? 'alien bones' : 'animal bones';
      if (+number === 63) text = alien ? 'metal drum with 50 gallons of ' + W.color() + ' flammable liquid' : 'metal drum with 50 gallons of gasoline';
      if (+number === 87) text = text.replace('bandages', 'bloody bandages');
      if (+number === 89 && !alien) text = 'fire pit with ' + pick(['ashes', 'wood']);
      if (+number === 130 && !alien) text = 'an incomplete and scattered chess set';
      if (+number === 132 && alien) text = text.replace('glass', 'steel');
    }
    return { ...row, text };
  };
  W.postTrap = function (p = {}, type = 'room', selected) {
    const level = int(1, W.number(p.level ?? p.x_level, 20, 1, 100)), group = Math.min(9, Math.floor((level - 1) / 2)), game = W.game(p).slug;
    const rad = Math.min(18, level), legacy = ['gamma', 'meta'].includes(game), mf = game === 'mutfut';
    const saves = mf ? ['save for poison', 'save for radiation', 'save for energy attacks', 'save for stun attacks', 'make a willpower check'] : legacy ? [`resist the poison (strength ${rad})`, `resist the radiation (intensity ${rad})`, `resist the radiation (intensity ${rad})`, 'roll equal or under their constitution on 1d20', `resist the mind effect (power ${rad})`] : game === 'lablord' ? ['save for poison', 'save for wands', 'save for breath attacks', 'save for paralysis', 'save for spells'] : ['defend for toxins', 'defend for radiation', 'defend for energy', 'defend for shock', 'defend for the mind'];
    const box = type === 'box', damage = 'suffer 1d' + pick([4, 6, 8, 10, 12]) + 'x' + (Math.ceil(level / 2) + 1) + ' damage', lethal = W.d(2) === 1;
    const slots = { level, damageScale: Math.ceil(level / 2) + 1, pit_depth: group ? int(group * 10 + 1, group * 10 + 10) : 10, pit_damage: [1, 2, 3, 4, 5, 7, 10, 14, 19, 25][group] + 'd6', color: () => W.color(), fogColor: () => W.color(), scorez: legacy ? 'weapon' : mf || game === 'lablord' ? 'THAC0' : 'HIT', hitscore: legacy ? Math.min(8, group + 1) : 10 - group, t_first: box ? 'whoever opens the container' : 'whoever first enters the area', t_where: box ? 'come out of the container' : 'fill the area', t_who: box ? 'the opener' : 'anyone inside', t_pit: box ? 'in front of the container' : 'in the area', t_close: box ? 'container' : 'central spot of the area', vineHits: level * 20, acidDamage: level * 2, blindDays: level + 1, blindTurns: level + 2, death0: lethal ? 'die' : damage, death1: lethal ? pick(['be decapitated', 'be sliced clean in half']) : damage, death2: lethal ? 'be mutated into creating a new mutant character (keeping all items and experience intact)' : damage + ' and become stunned for 1d4 rounds', death3: lethal ? pick(['be encased in a block of ice', 'be frozen solid and then shatter to pieces']) : damage, death4: lethal ? pick(['be turned to ash', 'be set ablaze and melt into a puddle of goo']) : damage, death5: lethal ? 'fall' : 'rise', death6: lethal ? 'cold' : 'heat' };
    saves.forEach((save, i) => { slots['save' + (i + 1)] = save; });
    const index = selected ?? int(space(p) || String(p.tech ?? p.x_tech) === '1' ? 10 : 0, space(p) || String(p.tech ?? p.x_tech) === '1' ? 54 : 44);
    if (D.postTables.traps[index]) return W.descriptionText(D.postTables.traps[index], slots);
    const monster = () => { const m = W.monsterPick({ ...p, level, terrain: [8, 53].includes(+index) ? 'FW' : 'DG' }); return m ? W.plainText(W.monsterStats(m, true, p)) : 'creature'; };
    if ([8, 28, 53].includes(+index)) return `A pit opens up ${slots.t_pit} that drops ${slots.pit_depth} feet. ${+index === 28 ? 'Anyone who falls takes ' + slots.pit_damage + ' damage' : 'It is flooded with water'} and must face a ${monster()}.`;
    if (+index === 27) return 'A nearby wall opens to reveal a ' + monster() + '.';
    if (+index === 36) return `Chemical ${W.color()} mists ${slots.t_where} where ${slots.t_who} must ${saves[0]} or suffer from amnesia ${mf || game === 'urthe' ? 'and lose a level (cannot go below level 1)' : 'for 1d4+' + level + ' hours'}.`;
    const effect = pick([`causes blindness for ${int(2, 12)} hours unless the victim can ${saves[3]}`, `causes insanity for ${int(2, 12)} hours unless the victim can ${saves[4]}`, `poisons the victim, causing death unless they can ${saves[0]}`, `covers the victim in radioactive dust where they suffer 1d${pick([4, 6, 8, 10, 12])} damage unless they can ${saves[1]}`, `covers the victim in dust that ignites, causing 1d${pick([4, 6, 8, 10, 12])} damage unless they can ${saves[2]}`]);
    return +index === 54 ? `A wall exhaust fan sprays a ${W.color()} dust that ${effect}.` : `A ${int(1, 6)} foot tall ${W.color()} flower emerges ${slots.t_pit} and sprays ${W.color()} pollen that ${effect}.`;
  };
  const sections = [['mi', 'Mundane Items', 100, 'mundane'], ['rt', 'Room Traps', 20, 'trap'], ['c', 'Containers', 20, 'cont'], ['ct', 'Container Traps', 20, 'ctrap'], ['ggj', 'Money', 100, 'money'], ['ei', 'Exceptional Items', 100, 'items'], ['th', 'Hoards of Goods', 20, 'hoard'], ['en', 'Encounters', 100, 'enc']];
  W.register('items', 'The Apocalypse', 'Reference tables for exploring the apocalypse: mundane room clutter, traps, containers, money, exceptional items, hoards and encounters, with the original optional solitaire rules.', [{ ...W.gameField, value: 'mutfut' }, f('x_level', 'Adventure level (0 = any)', 'number', { value: 0, min: 0, max: 100 }), f('money', 'Currency (blank = game default)', 'text'), f('x_mutants', 'Mutated animals only', 'checkbox'), f('x_show_ru', 'Include solitaire rules', 'checkbox'), ...sections.map(([key, title]) => f('x_show_' + key, title, 'checkbox', { value: 1 }))], p => {
    const game = p.game || p.x_game || p.x_package ? W.game(p).slug : 'mutfut';
    const options = { ...p, game, mutate: p.x_mutants, money: cash({ ...p, game }), tech: String(p.tech ?? int(0, 1)) };
    const level = W.number(p.x_level ?? p.level, 0, 0, 100) || int(1, 20);
    let html = '<img src="pics_tools/apoc_title.jpg" alt="The Apocalypse">';
    if (yes(p, 'x_show_ru', 0)) html += '<section class="apocalypse-rules"><h3>Rules</h3>' + D.postRules.replaceAll('{{genre}}', game === 'meta' ? 'disastrous spaceship' : 'post-apocalyptic').replaceAll('{{money}}', esc(options.money)).replaceAll('{{start}}', String(int(1, 24))) + '</section>';
    const reports = [];
    for (const [key, title, count, image] of sections) {
      if (!yes(p, 'x_show_' + key)) continue;
      const rows = W.range(key === 'mi' && p.n ? W.count(p) : count).map(i => {
        const rowOptions = { ...options, level };
        if (key === 'mi') return [i, esc(W.range(int(3, 13)).map(() => W.postRoomItem(rowOptions).text).join('; '))];
        if (key === 'c') return [i, esc(W.postContainer(rowOptions)), esc(W.postBag(rowOptions))];
        if (key === 'rt' || key === 'ct') return [i, esc(W.postTrap(rowOptions, key === 'ct' ? 'box' : 'room'))];
        if (key === 'ggj') return [i, esc(W.postCurrency(rowOptions, level, 3, int(5, 10)))];
        if (key === 'ei') return [i, esc(W.postArtifact(rowOptions))];
        if (key === 'th') {
          let coins = false;
          const loot = W.range(int(5, 15)).map(() => { const roll = int(coins ? 91 : 1, 100); if (roll < 91) { coins = true; return W.postCurrency(rowOptions, level, int(1, 3), int(30, 100), true); } return roll < 93 ? W.postJewel(rowOptions) : W.postArtifact(rowOptions); });
          return [i, esc(loot.join(' ----- '))];
        }
        const monster = W.monsterPick({ ...rowOptions, terrain: 'DG', dungeonOnly: '1' });
        return [i, monster ? W.monsterStats(monster, true, rowOptions) : 'No Enemies Found!'];
      });
      reports.push({ section: key, rows });
      html += `<section class="apocalypse-section" data-section="${key}"><img src="pics_tools/apoc_${image}.jpg" alt=""><h3>${title}</h3>` + W.table(key === 'c' ? ['Roll', 'Large Container', 'Small Container'] : ['Roll', title], rows) + '</section>';
    }
    W.storage.set('last-apocalypse', { options, reports });
    return html;
  });
})(window.WZ, window.WZ_DATA);
