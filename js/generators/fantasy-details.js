(function (W, D) {
  'use strict';
  const int = (a, b) => W.rng.int(a, b), pick = a => W.pick(a), esc = W.escape;
  W.color = (kind = 'candleColor') => pick(D.equipment.colors[kind].color[0]);
  W.manyName = () => W.name(pick(['wizard', 'demon', 'elf_m', 'imp', 'lizardman', 'ratman', 'orc', 'goblin', 'female', 'male', 'human_f', 'human_m', 'genericName', 'gnome', 'dwarf', 'dragon', 'wolf', 'catm']));
  W.artifactName = function (name, cursed = false, book = false) {
    const owner = W.manyName(), adjective = cursed ? pick(['Evil', 'Vile', 'Cursed', 'Wicked', 'Unholy', 'Hated', 'Despised', 'Ruined', 'Unspeakable']) : W.name('adjName');
    if (book) return owner + (owner.endsWith('s') ? '` ' : '`s ') + (W.d(100) > 50 ? '' : adjective + ' ') + name;
    return `${adjective} ${name} of ${owner}${W.d(100) > 60 ? ' the ' + W.name('jobName') : ''}`;
  };
  W.gem = function (cut = 100) {
    const roll = W.d(100), index = roll < 31 ? 0 : roll < 56 ? 1 : roll < 76 ? 2 : roll < 91 ? 3 : roll < 100 ? 4 : 5;
    const names = D.equipment.gems.gemChooser.gem[0];
    const starts = [0, 13, 30, 43, 49, 59, 66];
    const value = int(index % 2 ? 2 : 4, index % 2 ? 8 : 16) * [1, 10, 10, 100, 100, 1000][index];
    return `${pick(names.slice(starts[index], starts[index + 1]))} (${Math.ceil(value * cut / 100).toLocaleString('en-US')}gp)`;
  };
  W.currency = function (p, level = 1, size = 1, cut = 100) {
    const roll = W.d(90), copper = Math.ceil((roll < 36 ? 1500 : roll < 66 ? 7500 : roll < 81 ? 25000 : 50000) * Math.max(1, level) * cut / 100);
    const game = W.game(p), variance = size === 1 ? 80 : size === 2 ? 50 : 0;
    if (game.slug === 'ssxs') return Math.ceil(copper / 100).toLocaleString('en-US') + 'gp';
    let balance = copper;
    return [[500, 'pp', 90, !W.isTroll(p) && game.slug !== 'sandw'], [100, 'gp', 70, true], [50, 'ep', 60, !W.isTroll(p) && game.slug !== 'sandw'], [20, 'sp', 30, true], [1, 'cp', -1, true]].map(([worth, unit, chance, enabled]) => {
      const max = Math.floor(balance / worth);
      const n = enabled && W.d(100) > chance - variance && max ? (worth === 1 ? max : int(1, max)) : 0;
      balance -= worth * n;
      return n ? n.toLocaleString('en-US') + unit : '';
    }).filter(Boolean).join(' / ');
  };
  W.treasureClue = function (p, level = int(5, 15), parchment = false) {
    const troll = W.isTroll(p), six = W.game(p).slug === 'ssxs';
    const owner = W.name('genericName'), adjective = W.name('adjName').toLowerCase(), job = W.name('jobName');
    const falseMap = W.d(20) < 5 ? pick(['[False Map] ', '[Treasure Was Already Looted] ']) : '';
    const paper = parchment ? 10 : W.d(20);
    const medium = paper === 1 ? `a metal ${pick(['shield', 'helm', 'axe', 'breastplate', 'sword'])}, with etchings` : [null, null, 'made of leather, with burned markings', 'a stone tablet, with carvings', 'an amulet, with etchings', 'a book with notes and sketches', 'inside a clay bowl, with paintings', 'made of cloth, with stitching', 'made of tree bark, with carvings'][paper] || 'made of parchment, with drawings';
    const write = W.d(15), language = pick(['Common', 'Dwarvish', 'Elvish', 'Goblin', 'Orcish', 'Draconic', 'Gnomish', 'Halfling']);
    const writings = [null, `It is written in the thieves' code, so only a ${troll ? 'rogue' : six ? 'thief' : 'thief or assassin'} will be able to read the map.`, `It is written with magical symbols, so only a ${troll || six ? 'wizard' : 'mage or illusionist (or maybe those with a Read Languages skill)'} will be able to read the map.`, troll || six ? `The words only appear magically scattered every few seconds, requiring ${troll ? 'an L' + (level + 4) + 'SR vs. INT' : 'a ' + int(3, 6) + ' intelligence'} to read the map.` : 'It is written with druidic symbols so only a druid or ranger (or maybe those with a Read Languages skill) will be able to read the map.', `It is written with religious symbols, so only a ${troll ? 'priest' : six ? 'wizard or myrmidon' : 'cleric or paladin (or maybe those with a Read Languages skill)'} will be able to read the map.`, `It is written in ${language}, and only those that speak the language will be able to read the map.`, 'It is written backwards, requiring a mirror to read the map.', `It is written in some strange code, requiring ${troll ? 'an L' + level + 'SR vs. INT' : six ? 'a ' + int(3, 6) + ' intelligence' : 'an intelligence of at least 17'} to read the map.`, `It is written in the form of a riddle, requiring ${troll ? 'an L' + (level + 5) + 'SR vs. INT' : six ? 'a ' + int(3, 6) + ' wisdom' : 'a wisdom of at least 17'} to read the map.`];
    const story = `This is a map to the ${adjective} treasure of ${owner} the ${job}. Known to have ${pick(['died', 'disappeared', 'lived', 'vanished'])} about ${int(5, 90) * 10} years ago, their treasure is shown to be in an area just ${W.d(100) * 5} miles from here.`;
    let legend = '';
    if (W.d(100) > 30) {
      const opening = pick(['Legends', 'Stories', 'Rumors', 'Tales', 'Myths', 'Fables']) + ' tell of ' + owner;
      legend = W.d(100) > 50 ? `${opening} stealing this treasure from a ${W.name('jobName')} known as ${W.manyName()}.` : `${opening} and their ${pick(['riches', 'deeds', 'adventures', 'exploits', 'treasure'])}.`;
    }
    const haunt = pick(['an ancient', 'a haunted', 'a crumbling', 'a mysterious', 'a cursed', 'an abandoned']);
    const domain = pick(['an outdoor area', 'a dungeon', 'a cave', haunt + ' ruins', haunt + ' temple', haunt + ' castle', 'a graveyard', 'a crypt', 'a tomb', 'a chest at the bottom of the nearest lake', 'a chest at the bottom of the widest part of the nearest river', `sunken ship about ${W.d(9) * 100} feet off of the nearest sea shore`]);
    const guard = W.d(100) > 50 ? pick([', hexed by a magical spell.', `, guarded by a ${troll ? 'creature (MR ' + level * 10 + ' with ' + (level + 1) + ' + ' + level * 5 + ' DICE)' : six ? 'powerful beast (M' + int(3, 6) + ' Creature)' : 'powerful beast (' + level + 'HD Creature)'}.`, ', protected by a lethal trap.']) : '.';
    return `${falseMap}The map is ${medium} of the treasure's surrounding area. ${writings[write] || ''} ${story} ${legend} The map reads that ${owner} had ${pick(['hidden', 'buried', 'left', 'put'])} this treasure in ${domain}${guard}`;
  };
  W.unusualBook = function (p) {
    const level = int(1, 20), troll = W.isTroll(p), six = W.game(p).slug === 'ssxs', cursed = W.d(100) > 97;
    const type = pick(['book', 'compendium', 'lexicon', 'manual', 'omnibus', 'tome', 'volume', 'journal', 'almanac', 'diary', 'book', 'book']);
    const title = W.artifactName(type[0].toUpperCase() + type.slice(1), cursed, true);
    const golems = troll ? ['clay', 'diamond', 'emerald', 'flesh', 'iron', 'ruby', 'stone'] : ['clay', 'flesh', 'iron', 'stone'];
    const golem = pick(golems), golemPrices = { clay: [1, 3, 'clay'], diamond: [16, 20, 'diamonds'], emerald: [10, 12, 'emeralds'], flesh: [1, 2, 'body parts'], iron: [7, 9, 'iron'], ruby: [13, 15, 'rubies'], stone: [4, 6, 'stone'] };
    const classes = six ? ['fighter', 'myrmidon', 'wizard', 'thief'] : ['bdd', 'sandw'].includes(W.game(p).slug) || W.game(p).slug === 'lablord' && p.aec !== '1' ? ['fighter', 'cleric', 'magic-user', 'thief'] : ['fighter', 'paladin', 'cleric', 'magic-user', 'ranger', 'illusionist', 'druid', 'thief', 'assassin'];
    const job = pick(classes), skill = ['fighter', 'paladin', 'ranger', 'myrmidon'].includes(job) ? 'strength' : ['cleric', 'druid'].includes(job) ? 'wisdom' : ['thief', 'assassin'].includes(job) ? 'dexterity' : 'intelligence';
    const effects = [
      () => `the book is magical and will answer ${int(2, 10)} questions once per ${pick(['hour', 'day', 'month', 'year', 'season', 'full moon'])} with text appearing on the blank pages with the answer`,
      () => 'the book is magical and blank when found, where the owner`s spoken words will magically appear on the pages',
      () => 'the book is written in poisonous ink so if a reader is not wearing gloves they must make ' + (troll ? `an L${level}SR vs. STR or CON` : 'a save for poison') + ' or die',
      () => {
        if (troll) {
          const [career, ability] = pick([['wizard', W.ability(p, 'WIZ')], ['sage', 'INT'], ['warrior', 'STR'], ['thief', 'SPD'], ['ranger', 'DEX'], ['gambler', 'LCK'], ['healer', 'CON'], ['leader', 'CHR'], ['adventurer', 'an attribute']]);
          return `the book contains secrets of a great ${career}...where once read...it vanishes and the reader can raise ${ability === 'an attribute' ? ability : 'their ' + ability} by 1 point`;
        }
        const wizard = int(1, six ? 6 : 20);
        return `the book gives instructions, for a level ${wizard} wizard, on how to summon a level ${int(1, wizard)} demon known as ${W.name('demonName')}. If summoned properly, they will serve the wizard for ${int(2, 16)} ${pick(['rounds', 'turns', 'minutes', 'hours'])}...${pick(['once', 'twice', 'three times', 'four times', 'five times', 'six times', 'seven times', 'eight times', 'nine times', 'ten times'])} per ${pick(['hour', 'day', 'week', 'month', 'season', 'year'])}.`;
      },
      () => 'the book contains clues about the current dungeon or a nearby dungeon',
      () => 'the book can be written in but only the owner can understand what it says',
      () => `the book is hollow and contains ${int(2, 10)} gems [${W.gem()}]`,
      () => `the book is hollow and contains ${int(2, 30)} ${six ? 'gold' : pick(troll || W.game(p).slug === 'sandw' ? ['copper', 'silver', 'gold'] : ['copper', 'silver', 'gold', 'electrum', 'platinum'])} coins`,
      () => `the book contains a treasure map [${W.treasureClue(p, int(5, 15), true)}]`,
      () => `the book contains the research for a spell called ${W.name('spell')} which must be described by the ${troll ? 'wizard' : 'mage'} and the game master`,
      () => `the book contains artifact descriptions, giving a ${troll || six ? int(1, 5) + ' in 6' : int(1, 10) * 10 + '%'} chance to identify a discovered magical item`,
      () => 'the book is blank but will write the translation of the words spoken of another creature when the reader focuses on such creature speaking',
      () => {
        const [min, max, material] = golemPrices[golem];
        const price = troll ? int(min, max) * 5 + ',000 gold in ' + material : (six ? W.d(6) : int(5, 20) * 5) + ',000 gold in materials';
        return `the book contains detailed instructions for a ${troll || six ? 'wizard' : golem === 'clay' ? 'cleric' : 'magic-user'} to make a ${golem} golem with ${price} and a ${troll || six ? int(1, six ? 3 : 5) + ' in 6 chance' : W.d(10) * 10 + '%'} success rate`;
      },
      () => troll ? `the book is a mystical mage tome that allows a spellcaster to reduce the cost of casting a spell by ${Math.ceil(1 + level / 2)} points` : `the book contains secrets of the ${job} where they will gain 1 ${skill} point if fully read for a week${six ? '' : ' and enough experience to attain their next level'}`,
      () => {
        if (troll) { const mr = int(5, 20) * 10; return `the book sprouts teeth and attacks as an MR ${mr} creature with ${Math.floor(mr / 10) + 1} + ${Math.ceil(mr / 2)} DICE`; }
        return `the book can be used as a spellbook but the power really comes from the ${int(1, 3)} bonus to all saves made by the wielder`;
      },
      () => {
        if (troll) return 'the book is one of the fabled Necronomicons...where if read out loud, it will raise the corpses in the area where they will fight [with their same MR and dice] for the reader for the duration of the combat where they then fall and cannot be raised ever again';
        const hd = int(1, 10);
        return six ? `the book sprouts teeth and attacks the one opening it as an M${hd} creature.` : `the book sprouts teeth and attacks the one opening it as a ${hd}HD creature with ${hd * int(4, 8)} hit points and a ${int(6, 9)} armor class.`;
      },
      () => `the book contains some spell on certain pages (${W.range(int(2, 9)).map(() => W.gameSpell(p)).join(', ')})`
    ];
    let effect = effects[int(0, troll ? 15 : 16)]();
    if (cursed) effect = pick([
      () => 'cursed - the book is about some sort of fairy tale where the reader gets pulled out of existence and into the story...where they must defeat the story`s villain to escape',
      () => 'cursed - the book causes the reader to keep reading it over and over and not doing anything else...no eating, drinking, moving, etc' + W.curseDuration(level, 'reader', true),
      () => 'cursed - the ' + W.curse(p, level, 'reader')
    ])();
    return esc(title) + ' {' + esc(effect) + '}';
  };
  W.gameSpell = p => {
    const spells = W.game(p).slug === 'osric' || W.game(p).slug === 'add' ? D.osric_spells : D.lablord_spells;
    const spell = pick(spells);
    return spell.ls_name || spell.os_name || spell.name || 'Light';
  };

  W.pack = function (p) {
    const color = () => W.color(), leather = () => W.color('leatherColor');
    const parts = [], used = new Set(), pile = int(5, 15), bottle = () => pick(['ceramic jug', 'glass bottle', 'glass jar', 'clay jug', 'waterskin']);
    const light = int(0, 4);
    if (light !== 3) used.add(34);
    const gear = index => {
      const metal = pick(['iron', 'steel', 'bronze', 'wooden', 'wooden', 'silver', 'copper']), rope = pick(['silk', 'hemp']);
      const dynamic = {
        4: () => `blank book bound in ${leather()} leather (${int(5, 20) * 10} pages)`, 5: W.bottle,
        6: () => `${color()} candles (${int(2, 8)} ea)`, 7: () => `iron chain (${int(2, 10)}')`,
        11: () => metal + ' tankard', 13: () => `firewood (${int(2, 5)} pieces)`, 18: () => `wooden snuff box with ${int(2, 5)} pinches`,
        19: () => `grappling hook & ${rope} rope (${int(5, 10) * 10}')`, 20: () => `${rope} rope (${int(5, 10) * 10}')`,
        21: () => W.bottle() + ' of holy water', 24: () => `iron spikes (${int(6, 12)} ea)`, 27: () => `small pouch of ${color()} sand`,
        28: () => `${int(2, 10) * 10}' ball of ${color()} string`, 34: () => `${bottle()} of lamp oil (${int(2, 5)} pints)`,
        36: () => `jar of ${color()} paint with brush`, 37: () => `parchment (${int(5, 50)} sheets)`, 49: () => `leather strap (${int(3, 10)}')`,
        50: () => `tent (${int(1, 4)} person)`, 54: () => `small ${metal} sundial`, 55: () => `twine (${int(1, 5) * 10}')`,
        58: () => { const herb = pick(['belladonna', 'garlic', 'spiderwort', 'wolfsbane', 'yarrow', 'yarrow']); return `small pouch of ${herb} (${int(2, 10)} ${herb === 'garlic' ? 'ea' : 'oz'})`; },
        60: () => `bottle of ${color()} cloth dye`, 61: () => `bottle of ${color()} hair dye`,
        62: () => pick(['iron', 'steel', 'bronze']) + ' ' + pick(['necklace', 'ring', 'ring', 'earrings', 'earring', 'medallion']),
        65: () => `${color()} ${pick(['cloth rag', 'silk handkerchief', 'handkerchief'])}`, 66: () => `bandages (${int(5, 20)} ea)`,
        67: () => `wooden stake (${int(2, 6)} ea)`, 72: () => `lockpicks (${int(2, 6)} ea)`, 73: () => `${metal} holy symbol`
      };
      return dynamic[index] ? dynamic[index]() : D.equipment.pack[index].replace(/, $/, '');
    };
    // Removing chosen indices reproduces the PHP's no-duplicate categories
    // without retrying indefinitely when a random source repeats a value.
    const pool = W.range(74, 0).filter(i => !used.has(i));
    for (let i = 0; i < pile; i++) parts.push(gear(pool.splice(int(0, pool.length - 1), 1)[0]));
    if ((p.eat ?? p.x_eat) === '1') parts.push(`rations (${int(4, 8)} ea)`, `waterskin (${int(2, 4)} ea)`);
    else {
      const foods = ['head of lettuce', 'bag of nuts', 'onion', 'orange', 'peach', 'apple', 'turnip', 'bag of berries', 'loaf of bread', '', 'head of cabbage', 'bag of cherries', 'carrot', 'dried beef', 'apricot', 'dried pork', 'wheel of cheese', 'dried pork', 'wheel of cheese', 'loaf of bread', 'dried beef', 'dried pork', 'wheel of cheese', 'loaf of bread', 'dried beef'];
      W.range(int(4, 8)).forEach(() => { const food = pick(foods); if (food) parts.push(food); });
      W.range(int(2, 4)).forEach(() => parts.push(pick(['waterskin', 'waterskin', 'waterskin', 'iron flask', 'iron flask', 'copper flask', 'pewter flask', 'glass bottle', 'clay bottle', 'glass jar', 'clay jar', 'waterskin', 'waterskin', 'waterskin']) + ' of ' + (W.d(4) === 1 ? pick(['ale', 'beer', 'brandy', 'cider', 'grog', 'mead', 'rum', 'wine']) : 'water')));
    }
    parts.push(W.d(2) === 1 ? 'bedroll' : color() + ' blanket');
    parts.push(light === 3 ? `torches (${int(2, 4)} ea)` : `${['bullseye lantern', 'hooded lantern', 'clay oil lamp', '', 'brass oil-burning torch'][light]}, ${bottle()} of lamp oil (${int(2, 5)} pints)`);
    parts.push(pick(['leather backpack', 'large leather bag', 'large ' + color() + ' sack', 'leather satchel', 'leather backpack', 'leather satchel']));
    if (W.d(10) === 1) parts.push(pick(['small drum', 'flute', 'harp', 'horn', 'lute', 'mandolin']));
    parts.push(pick(['heavy boots', 'high hard boots', 'soft high boots', 'hard low boots', 'soft low boots', 'soft boots', 'fur boots', 'shoes', 'sandals', 'thigh boots']), color() + pick([' shirt', ' tunic']), pick([color() + ' heavy trousers', color() + ' kilt', color() + ' light trousers', 'leather trousers']));
    if (W.d(3) === 1) parts.push('leather belt');
    if (W.d(5) === 1) parts.push(pick([color() + ' cloth cap', 'leather cap', color() + ' hat', 'straw hat', 'tall straw hat', color() + ' feathered hat', color() + ' floppy hat', color() + ' skullcap', color() + ' wide-brim hat', color() + ' bandana']));
    if (W.d(5) === 1) parts.push(W.d(4) === 4 ? color() + ' cloth gloves' : 'leather gloves');
    if (W.d(3) === 1) parts.push(pick([color() + ' cape', 'fur cloak', color() + ' cloak']));
    if (W.d(5) === 1) parts.push(color() + pick([' silk robe', ' linen robe']));
    parts.push(`and a ${pick(['small pouch', 'belt pouch', 'small sack'])} (${W.currency(p, 1, 1, int(1, 10))}).`);
    return parts.join(', ');
  };
  W.register('packs', 'Adventuring Gear', 'Generate packs of adventuring gear, food, clothing and coins.', [W.gameField, W.countField('Packs'), W.field('eat', 'Simple food and drink', 'checkbox')], p => W.table(['Pack', 'Adventuring gear'], W.range(W.count(p, 'x_packs')).map(i => [i, esc(W.pack(p))])));
})(window.WZ, window.WZ_DATA);
