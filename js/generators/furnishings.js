(function (W, D) {
  'use strict';
  const pick = a => W.pick(a), int = (a, b) => W.rng.int(a, b), color = () => W.color();
  const vocab = (name, key = 'value') => {
    const row = D.fantasyTables.vocab[name];
    return pick(row.arrays.length ? row.arrays[0][1] : row.cells[key]);
  };
  const wood = () => pick(['maple', 'cedar', 'oak', 'rosewood', 'walnut', 'mahogany', 'birch']);
  const metal = () => pick(['iron', 'iron', 'metal', 'bronze', 'brass']);
  const condition = kind => kind === 'wood' ? '' : W.postCondition(kind);
  const furniture = () => vocab('furnitureMake'), size = () => vocab('sizeMake');
  const alot = () => pick(['are some', 'is alot of', 'are many', 'are faint', 'is a few', 'is a bunch of']);
  const bag = () => pick([W.color('leatherColor') + ' leather', 'leather', color() + ' cloth', W.color('leatherColor') + ' canvas']) + ' ' + pick(['bag', 'sack', 'satchel', 'backpack', 'rucksack', 'knapsack', 'pouch']);
  const corpse = () => vocab('corpseMaker', 'look') + ' ' + pick(['body', 'corpse', 'remains', 'bones']) + ' of ' + vocab('corpseMaker', 'race');
  const head = skull => (skull || W.d(100) > 80 ? 'skull' : vocab('headoffMaker', 'look') + ' head') + ' of ' + vocab('headoffMaker', 'race');
  const tracks = () => vocab('footprintMaker', 'look') + vocab('footprintMaker', 'race');
  const coin = p => W.isTroll(p) ? 'gold' : 'gp';
  const clothes = (p, small = false) => {
    const i = int(0, small ? 37 : 34), noun = D.fantasyTables.vocab.closetFiller.cells.cloth[i];
    const leather = [1, 36, 37].includes(i) || [11, 23].includes(i) && W.d(2) === 1;
    let text = (leather ? W.color('leatherColor') + ' leather ' : color() + ([11, 22, 23].includes(i) ? ' cloth ' : ' ')) + noun;
    if (i === 22) text += ' (contains ' + int(3, 30) + ' ' + coin(p) + ')';
    if (noun !== 'pouch' && W.d(100) > 30) text = pick(['torn', 'ripped', 'ruined', 'moldy', 'dirty']) + ' ' + text;
    return text;
  };
  const keg = () => wood() + ' keg containing ' + pick(['ale', 'beer', 'brandy', 'cider', 'grog', 'mead', 'rum', 'wine', 'water']);
  const mundaneSlots = p => {
    const fine = W.d(4) === 1, casting = fine ? vocab('goodmetalChooser') : metal();
    const slots = {
      color, plainColor: () => W.color('plainColor'), leather: () => W.color('leatherColor'), metal, wood, casting, bag, bottle: W.bottle,
      figure: () => vocab('figureMaker'), tracks, head: () => head(false), skull: () => head(true), coin: coin(p),
      value: () => fine ? ' worth ' + int(...pick([[2, 10], [10, 50], [20, 100]])) + ' ' + coin(p) : '',
      gem: () => W.gem(W.number(p.x_cut, 100)), jewel: () => W.jewel(W.number(p.x_cut, 100)),
      music: () => condition('item') + vocab('musicChooser'), clothing: () => clothes(p, true),
      books: () => W.range(int(1, int(2, 7))).map(() => W.bookTitle()).join('; '),
      weapon: () => W.monsterWeapon({ weapons: 'giant' }, p), armor: () => W.townEquipment(p, 'generic', 'guard'),
      material: () => pick(['bone', 'wood', 'brass', 'iron', 'silver']), design: () => vocab('designType'),
      contents: () => pick(['water', 'wine', 'oil', 'sand', 'powder', 'poison']), cask: keg, keg,
      ashes: () => 'a pile of ashes', eggs: () => pick(['bird eggs', 'snake eggs', 'lizard eggs', 'insect eggs']), luck: '+1 to attack rolls but only one good luck charm at any time'
    };
    for (const kind of ['iron', 'wood', 'cloth', 'jar', 'item', 'water', 'paper']) slots['condition_' + kind] = () => condition(kind);
    return slots;
  };
  W.fantasyMundane = function (p = {}, shelf = false, selected) {
    const index = selected ?? int(0, shelf ? 173 : 191), variants = D.fantasyTables.items[shelf ? 'fantasyShelfItem' : 'fantasyRoomItem'][index];
    if (!shelf && index === 144) return `grappling hook & ${pick(['hemp', 'silk'])} rope (${int(5, 10) * 10}')`;
    if (index === 168) { const n = int(0, 3); return ['bullseye lantern', 'hooded lantern', 'broken bullseye lantern', 'broken hooded lantern'][n] + (n < 2 && W.d(5) === 1 ? ' with oil' : ''); }
    const slots = mundaneSlots(p);
    let variant = 0;
    if (variants.length > 1) {
      // Most alternatives are a second 50% roll. These cells have other odds.
      const odds = shelf ? { 15: 3, 18: 5, 72: 3, 75: 6, 109: 2, 154: 10 } : { 7: 4, 15: 3, 54: 3, 75: 6, 109: 2, 180: 3, 190: 5 };
      if ((!shelf && [181, 183].includes(index)) || (shelf && [73, 74].includes(index))) variant = Math.min(int(0, 5), variants.length - 1);
      else if (W.d(odds[index] || 2) === 1) variant = variants.length - 1;
    }
    return W.descriptionText(variants[variant], slots);
  };
  // rooms_fantasy.php cageMaker().
  const cage = () => 'a ' + pick(['small', 'medium-short', 'medium-sized', 'large']) + ' ' + pick(['rusty', 'iron', 'metal', 'broken', 'locked rusty', 'locked iron', 'locked metal']) + ' cage' + ([' with straw on the bottom', ' with humanoid bones on the bottom', ' with animal bones on the bottom', ' with ashes on the bottom', ' with rotten food on the bottom', ' with a rotted mat on the bottom', ' with an empty wooden bowl on the bottom'][int(0, 13)] || '');
  // item_fantasy.php scrollContents().
  const scrollContents = () => {
    const paper = pick(['parchment', 'scroll', 'note']), dirc = pick(['north', 'south', 'east', 'west']), locc = pick(['island', 'dungeon', 'crypt', 'castle', 'temple', 'ruins', 'graveyard', 'cave']);
    const who = W.name(pick(['mageName', 'elfName', 'female', 'male', 'humanFemaleName', 'humanMaleName', 'genericName', 'gnomeName', 'dwarfName'])), mine = pick(['gold', 'silver', 'gem', 'iron']);
    const code = pick(['a nearby thieves guild', 'a nearby assassins guild', "a local lord's spy network", "an evil lord's spy network", 'a nearby bandit group', 'a nearby smuggling operation', 'a well known group of pirates', 'a little known rebel group', 'an unusual cult']);
    const notes = ['a map to some unknown ' + locc + ' to the ' + dirc + ' of here', 'a recipe of some type of meal', 'lyrics to a song', 'a poem written by someone named ' + who, 'musical notes', 'a prayer for some unknown religion', 'a list of food items', 'a map of a nearby area showing where ' + int(2, 4) + ' ' + mine + ' mines may be located', 'a map of a nearby royal home showing secret doors and treasure vaults', 'a ransom demand from a group of bandits holding a captive', "a map of a nearby city's sewer system", 'a plain letter written to ' + who, 'a translation of coded letters from ' + code, 'the last will and testament of someone named ' + who, 'a list of alchemy reagents and some are checked off', 'a suicide note'];
    return 'a ' + paper + ' containing ' + pick(notes);
  };
  // spells.php spellSchool() and powerUp(); Labyrinth Lord assumes the AEC option is off.
  W.spellSchool = function (p) {
    const name = W.game(p).name, roll = int(1, 100);
    if (['OSRIC', 'AD&D'].includes(name)) return roll < 71 ? (int(1, 100) > 89 ? 'illusionist' : 'magic-user') : (int(1, 100) > 74 ? 'druid' : 'cleric');
    if (name === 'Swords & Six-Siders') return 'wizard';
    return roll < 71 ? 'magic-user' : 'cleric';
  };
  W.powerUp = (level = 0) => { level = level > 0 ? level : int(1, 20); return level < 4 ? 'the lowest' : level < 7 ? 'a lower' : level < 10 ? 'a low' : level < 13 ? 'a medium' : level < 16 ? 'a high' : level < 19 ? 'a higher' : 'the highest'; };
  // item_fantasy.php fantasyGroundItem(): hex crawl items found on the ground.
  W.fantasyGroundItem = function (p = {}, selected) {
    const index = selected ?? int(0, 205), name = W.game(p).name, troll = W.isTroll(p);
    if (index === 82) return corpse() + ' [<i>CONTAINS:&nbsp;' + W.range(int(1, 5)).map(() => W.fantasyMundane(p, true)).join('&nbsp;--- ') + '</i>]';
    if (index === 144) {
      if (troll) return 'scroll with smudged writing';
      // The PHP list says "BFRGP", so BFRPG falls through to the school text.
      if (['OSRIC', 'AD&D', 'BD&D', 'Swords & Six-Siders', 'Labyrinth Lord', 'Swords & Wizardry'].includes(name)) { W.powerUp(); W.spellSchool(p); return 'scroll with a ' + W.gameSpell(p); }
      return 'scroll with ' + W.powerUp() + ' level ' + W.spellSchool(p) + ' spell';
    }
    if (index === 157) return 'book {<u>' + W.bookTitle() + '</u>}';
    if (index === 176) return 'blank ' + (troll ? '' : 'spell ') + 'book bound in ' + W.color('leatherColor') + ' leather with a symbol of a ' + vocab('designType') + ' on the cover';
    if (index === 184) return 'a small diary of ' + W.name('authorName') + ' the adventurer...that explored this area long ago...but this book will give one a ' + (troll || name === 'Swords & Six-Siders' ? int(1, 5) + ' in 6' : int(1, 6) * 5 + '%') + ' chance to know the location of a nearby landmark';
    const variants = D.fantasyTables.items.fantasyGroundItem[index];
    const slots = { ...mundaneSlots(p), cage, scroll: scrollContents, corpse, wall: () => pick(['wall', 'ceiling', 'floor']) };
    // Alternatives are sequential overrides; the fire pit's last one is a d4.
    let variant = 0;
    for (let i = 1; i < variants.length; i++) if (W.d(index === 77 && i === 2 ? 4 : 2) === 1) variant = i;
    return W.descriptionText(variants[variant], slots);
  };
  W.fantasyItem = p => W.d(100) <= W.number(p.unusual, 0, 0, 100) ? W.unusualRoom(p) : W.fantasyMundane(p);
  // item_fantasy.php paintingMaker($condition = 1, $type): 1 painting, 0 tapestry.
  const painting = type => {
    const noun = type === 1 ? 'painting' : 'tapestry';
    const pfx = W.d(100) > 50 ? (W.d(100) > 50 ? 'torn ' : 'ruined ') + noun + ' of ' : noun + ' of ';
    const i = int(0, 11);
    if (i === 10) return pfx + 'a ' + vocab('designType');
    if (i === 11) { const who = W.name('genericName'), job = W.name('jobName'); return pfx + who + ' the ' + job.charAt(0).toUpperCase() + job.slice(1); }
    return pfx + ['a scenic forest view', 'a scenic ocean view', 'a scenic desert view', 'a scenic jungle view', 'a keep', 'a house', 'some ruins', 'a castle', 'a city', 'a mountain'][i];
  };
  // rooms_fantasy.php tortureMaker($game, $cut, 1): the corpse/blood extras are only for other types.
  const torture = () => [
    () => 'a torture rack made mostly of ' + condition('wood') + wood(),
    () => 'an iron maiden made mostly of ' + condition('iron') + metal(),
    () => 'a spiked torture chair made mostly of ' + condition('wood') + wood() + ' with ' + metal() + ' spikes on it',
    () => 'a pillory made mostly of ' + condition('wood') + wood()
  ][int(0, 3)]();
  // rooms_fantasy.php cauldronMaker(): `if ($make = "broken")` assigns, so every
  // cauldron reads "broken cauldron" with no contents; the rolls are still made.
  const cauldron = () => { metal(); int(0, 6); int(0, 14); return 'broken cauldron'; };
  W.furnishing = function (p, kind, selected) {
    const index = selected ?? int(0, { wall: 27, near: 31, floor: 48, ceiling: 22 }[kind]);
    const result = { text: '', place: '', size: 0, fill: 0, fillPlace: '' };
    const object = (name, place = '', capacity = 0, fill = 0, fillPlace = '') => {
      result.text = 'is a ' + name; result.place = place ? place + ' the ' + name : ''; result.size = capacity; result.fill = fill; result.fillPlace = fillPlace ? fillPlace + ' the ' + name : result.place;
    };
    const stain = noun => { result.text = alot() + ' ' + noun; };
    const drawings = writing => { result.text = 'are ' + vocab('drawWith') + (writing ? ' writings that are written in ' + W.language(p) : ' drawings of ' + vocab('drawingTypes')); };
    const liquid = noun => {
      stain(noun);
      if (W.d(10) === 1) stain('areas of ' + color() + ' liquid');
      if (W.d(10) === 1) stain('areas of ' + color() + ' slime');
    };
    const light = ceiling => {
      object((ceiling ? '' : int(2, 5) + ' foot tall ') + (W.d(2) === 1 ? condition('iron') + metal() : wood()) + (ceiling ? ' chandelier' : ' candelabrum'));
      if (W.d(3) === 1) result.text += ' with ' + (ceiling ? int(2, 6) * 2 : int(1, 5)) + ' ' + color() + ' candles in it';
      if (W.d(5) === 1) result.text += ' with ' + (ceiling ? int(2, 6) * 2 : int(1, 5)) + ' burned down ' + color() + ' candles in it';
    };
    const body = suffix => { const name = corpse(); result.text = 'are ' + condition('iron') + metal() + ' manacles with a ' + name + suffix; result.place = 'on the ' + name; result.size = 3; result.fill = 3; };
    const chain = suffix => { result.text = 'is ' + int(2, 5) + ' feet of ' + condition('iron') + 'iron chain ' + suffix; };
    const rope = suffix => { result.text = 'is ' + int(10, 50) + ' feet of ' + condition('cloth') + 'rope ' + suffix; };
    // rooms_fantasy.php cageMaker(); furnish.php keeps its leading "a".
    const caged = hanging => { const made = cage(); result.text = 'is ' + made + (hanging ? ' hanging' : ''); result.place = hanging ? 'inside the cage' : 'inside the ' + made; result.size = 3; };
    if (kind === 'ceiling') {
      switch (index) {
        case 0: chain('hanging'); break;
        case 1: stain('cobwebs'); break;
        case 2: stain('cracks'); break;
        case 3: stain('blood smears'); break;
        case 4: stain('areas of dried blood'); break;
        case 5: stain('areas of moisture'); break;
        case 6: liquid('areas of water dripping'); break;
        case 7: stain('traces of ' + pick(['moss', 'mold'])); break;
        case 8: stain('fungi growing'); break;
        case 9: stain('areas of mold'); break;
        case 10: rope('hanging'); break;
        case 11: stain('scratches and claw marks'); break;
        case 12: object(condition('iron') + 'brazier with a ' + int(1, 3) + ' foot iron chain hanging'); break;
        case 13: case 14: light(true); break;
        case 15: object(int(1, 4) + ' foot wide hole that goes ' + int(1, 4) + ' feet up'); break;
        case 16: drawings(false); break;
        case 17: drawings(true); break;
        case 18: object(condition('iron') + metal() + ' bell with a ' + int(1, 3) + ' foot iron chain hanging'); break;
        case 19: caged(true); break;
        case 20: result.text = 'are ' + int(2, 10) + ' ' + condition('iron') + metal() + ' hooks'; break;
        case 21: result.text = 'are ' + condition('iron') + metal() + ' manacles hanging'; break;
        case 22: body(' hanging'); break;
      }
    } else if (kind === 'wall') {
      switch (index) {
        case 0: chain('hanging'); break;
        case 1: stain('cobwebs'); break;
        case 2: stain('cracks'); break;
        case 3: stain('blood smears'); break;
        case 4: stain('areas of dried blood'); break;
        case 5: rope('hanging'); break;
        case 6: object(condition('item') + bag(), 'inside', 1, 8); result.text += ' hanging'; break;
        case 7: object(wood() + ' armor rack', 'on', 0, 1); result.text += ' hanging'; break;
        case 8: stain('scratches and claw marks'); break;
        case 9: object('fireplace' + (W.d(2) === 1 ? ' with wood inside' : ''), 'inside', 3, 10, 'on the mantle of'); break;
        case 10: object('mounted ' + vocab('headMount') + ' head', 'inside', 1); break;
        case 11: result.text = 'are ' + int(2, 10) + ' ' + condition('iron') + metal() + ' wall sconces' + (W.d(2) === 1 ? ' with ' + color() + ' candles' : W.d(2) === 1 ? ' with ' + color() + ', burned down candles' : ''); break;
        case 12: object(furniture() + ' shelf', 'on top of', 3, 9); result.text += ' hanging'; break;
        case 13: object(condition('iron') + metal() + ' shield hanging'); break;
        case 14: object(furniture() + ' wall basin', 'inside', 1); if (W.d(3) > 1) result.text += ', filled with ' + condition('water') + 'water'; break;
        case 15: object(vocab('sizeMakeWall') + ' ' + condition('iron') + metal() + ' mirror', 'behind', 3); result.text += ' hanging'; break;
        case 16: case 17: object(painting(index === 16 ? 1 : 0), 'behind', 3); break;
        case 18: body(''); break;
        case 19: object(wood() + ' weapon rack', 'on', 0, 2); result.text += ' hanging'; break;
        case 20: result.text = 'is ' + int(2, 10) * 10 + ' feet of twine hanging'; break;
        case 21: drawings(false); break;
        case 22: drawings(true); break;
        case 23: object(wood() + ' cupboard', 'inside', 1, 4); result.text += ' hanging'; break;
        case 24: result.text = 'are ' + int(2, 10) + ' ' + condition('iron') + metal() + ' hooks'; break;
        case 25: { const n = int(5, 10); result.text = 'are ' + n + ' torches held in ' + metal() + ' wall sconces [only ' + Math.ceil(n / int(2, 4)) + ' are useable]'; break; }
        case 26: result.text = 'are ' + condition('iron') + metal() + ' manacles'; break;
        case 27: liquid('areas of moisture'); break;
      }
    } else {
      // Floor and near-wall furnishings share the original indices 0–31.
      switch (index) {
        case 0: object(furniture() + ' armchair', 'under', 1, 10, 'on'); break;
        case 1: if (kind === 'floor') object(int(1, 4) + ' foot wide hole that is ' + int(2, 8) + ' feet deep'); else object(wood() + ' bed', 'under', 3, 11, 'on'); break;
        case 2: object(furniture() + ' bench', 'under', 3, 10, 'on'); break;
        case 3: case 34: object(condition('iron') + 'brazier'); break;
        case 4: if (kind === 'floor') chain('fastened'); else object(wood() + ' bunk bed', 'under', 3, 11, 'on'); break;
        case 5: case 6: object((index === 6 ? 'padded ' : '') + furniture() + ' chair', 'under', 1, 10, 'on'); break;
        case 7: if (kind === 'floor') stain('cracks'); else object(condition('cloth') + color() + ' couch', 'under', 1, 11, 'on'); break;
        case 8: object(pick(['', '', 'broken ', 'worn down ']) + 'grindstone'); break;
        case 9: object('loom'); break;
        case 10: object(condition('cloth') + 'mattress', 'under', 2, 11, 'on'); break;
        case 11: object('pallet', 'under', 3, 11, 'on'); break;
        case 12: object(furniture() + ' shelf', 'on top of', 1, 9); break;
        case 13: case 14: object((index === 13 ? 'high ' : '') + wood() + ' stool'); break;
        case 15: object(size() + ' ' + furniture() + ' table', 'under', 3, 11, 'on'); break;
        case 16: object(furniture() + ' throne', 'behind', 3, 10, 'on'); break;
        case 17: object(furniture() + ' tub', 'inside', 3); break;
        case 18: if (kind === 'floor') stain('blood smears'); else object(furniture() + ' workbench', 'under', 3, 11, 'on'); break;
        case 19: case 20: if (kind === 'floor') stain(index === 19 ? 'areas of dried blood' : 'areas of moisture'); else object(wood() + (index === 19 ? ' chest of drawers' : ' armoire'), 'inside', index === 19 ? 2 : 3, 5); break;
        case 21: if (kind === 'floor') liquid('areas of water'); else object(wood() + ' weapon rack', 'on', 0, 2); break;
        case 22: object(condition('iron') + metal() + ' standing mirror'); break;
        case 23: result.text = 'is a ' + keg(); break;
        case 24: if (kind === 'floor') stain('traces of ' + pick(['moss', 'mold'])); else object(wood() + ' cupboard', 'inside', 1, 4); break;
        case 25: if (kind === 'floor') stain('fungi growing'); else object(wood() + ' desk', 'inside', 1, 6, W.d(2) === 1 ? 'on' : ''); break;
        case 26: result.text = 'is ' + torture(); if (W.d(10) > 6) result.text += ' with areas of dried blood'; if (W.d(10) > 7) { const dead = corpse(); result.text += ' and has a ' + dead; result.place = 'on the ' + dead; result.size = 3; result.fill = 3; } break;
        case 27: case 38: caged(false); break;
        case 28: object(wood() + ' barrel', 'inside', 2); break;
        case 29: object(wood() + ' ' + pick(['box', 'cabinet', 'footlocker', 'chest', 'crate', 'casket', 'trunk']), 'inside', 2, 7); if (W.d(4) === 1) result.text += pick([' that is locked with a padlock', ' that has a locked keyhole']); break;
        case 30: result.text = 'is a ' + cauldron(); result.place = 'inside the cauldron'; result.size = 2; break;
        case 31: if (kind === 'floor') stain('areas of mold'); else object(wood() + ' armor rack', 'on', 0, 1); break;
        case 32: rope('fastened'); break;
        case 33: stain('scratches and claw marks'); break;
        case 35: light(false); break;
        case 36: drawings(false); break;
        case 37: drawings(true); break;
        case 39: result.text = 'are ' + condition('iron') + metal() + ' manacles fastened'; break;
        case 40: body(' fastened'); break;
        case 41: case 42: { const water = condition('water') + 'water'; result.text = 'is a ' + (index === 41 ? 'small' : 'large') + ' puddle of ' + water; result.place = 'in the puddle of ' + water; result.size = index === 41 ? 1 : 2; break; }
        case 43: object(condition('cloth') + 'mat', 'under', 3); break;
        case 44: object(furniture() + ' pedestal', 'on top of', 1); break;
        case 45: result.text = 'are some ' + tracks() + ' in various spots'; break;
        case 46: object('fire pit' + (W.d(4) === 1 ? ' with wood' : W.d(2) === 1 ? ' with ashes' : '')); break;
        case 47: object(corpse(), 'on', 3, 3); break;
        case 48: object(condition('cloth') + color() + ' carpet', 'under', 3); break;
      }
    }
    return result;
  };
  W.furnishDetails = function (p, cave = false) {
    const decorations = [], hiding = [], fillings = [];
    if (String(p.x_furnish ?? 1) !== '1') return { text: '', hiding, fillings, decorations };
    // tool_delve.php: eight cavern descriptions, with dripping water on 1 in 6.
    if (cave) return { text: pick(['This is a cavernous area.', 'This is a cavernous area where fungi grows in various places.', 'This is a cavernous area with a few stalactites on the ceiling.', 'This is a cavernous area with a few stalagmites on the ground.', 'This is a cavernous area with a few stalactites and stalagmites.', 'This is a cavernous area with a few stalactites on the ceiling. Some fungi grows in various places.', 'This is a cavernous area with a few stalagmites on the ground. Some fungi grows in various places.', 'This is a cavernous area with a few stalactites and stalagmites. Some fungi grows in various places.']) + (W.d(6) === 1 ? ' Water drips from up above in places.' : ''), hiding, fillings, decorations };
    const places = ['floor', 'ceiling', 'northfloor', 'southfloor', 'eastfloor', 'westfloor', 'northwall', 'southwall', 'eastwall', 'westwall', 'scatter'].filter(() => W.d(5) === 1);
    for (const place of W.shuffle(places)) {
      if (place === 'scatter') { decorations.push('There is ' + W.range(int(2, 10)).map(() => W.fantasyMundane(p)).join(', ') + '...scattered around the room.'); continue; }
      const kind = place === 'floor' || place === 'ceiling' ? place : place.endsWith('wall') ? 'wall' : 'near';
      const item = W.furnishing(p, kind), direction = place.replace(/floor|wall/, '');
      const position = kind === 'wall' ? 'on the ' + direction + ' wall' : kind === 'near' ? 'by the ' + direction + 'ern wall' : 'at the ' + pick(['north end', 'northeast end', 'northwest end', 'south end', 'southeast end', 'southwest end', 'east end', 'west end', 'center', 'center', 'center', 'center', 'center']) + ' of the ' + (kind === 'ceiling' ? 'ceiling' : 'room');
      decorations.push('There ' + item.text + ' ' + position + '.');
      if (item.size && item.place) hiding.push({ place: item.place, size: item.size });
      // The original only reveals furniture contents when mt_rand(1,100) > 60.
      if (item.fill && W.d(100) > 60) {
        let content;
        if (item.fill === 1) content = W.townEquipment(p, 'generic', 'guard');
        else if (item.fill === 2) content = W.range(int(1, 5)).map(() => W.monsterWeapon({ weapons: 'giant' }, p)).join('; ');
        else if (item.fill === 4) content = 'spoiled foods of ' + W.range(int(1, 10)).map(() => vocab('foodFiller', 'food')).join('; ');
        else if (item.fill === 5) content = W.range(int(1, 10)).map(() => clothes(p)).join('; ');
        else if (item.fill === 9 && W.d(4) === 1) content = W.range(int(1, int(2, 7))).map(() => W.bookTitle()).join('; ');
        else content = W.range(int(1, ({ 3: 5, 6: 10, 7: 5, 8: 2, 9: 2, 10: 1, 11: 3, 12: 6 })[item.fill])).map(() => W.fantasyMundane(p, true)).join('; ');
        fillings.push({ place: item.fillPlace || item.place, content });
      }
    }
    const text = decorations.length ? decorations.join(' ') + fillings.map(row => ' ' + row.place.charAt(0).toUpperCase() + row.place.slice(1) + ' is...' + row.content + '.').join('') : pick(D.dungeonText.cells.furnishRoom);
    return { text, hiding, fillings, decorations };
  };
  W.furnish = (p, cave) => W.furnishDetails(p, cave).text;
})(window.WZ, window.WZ_DATA);
