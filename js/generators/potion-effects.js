(function (W) {
  'use strict';
  const pick = values => W.pick(values), int = (a, b) => W.rng.int(a, b);
  W.isTroll = p => /^tt/.test(W.game(p).slug);
  W.ability = (p, name) => W.game(p).slug === 'tt5e' ? ({ WIZ: 'INT', SPD: 'DEX', POW: 'STR' })[name] || name : name === 'POW' ? 'WIZ' : name;
  W.lycanthrope = () => pick(['werebear', 'wereboar', 'wererat', 'weretiger', 'werewolf', 'werewolf', 'werewolf', 'werewolf']);
  W.curseDuration = function (level, who, worn = false) {
    if (worn) {
      let text = ' until curse removing magic is used, which destroys the item';
      if (W.d(100) > 50) text = ' until curse removing magic is used, which makes the item normal';
      if (W.d(100) > 80) text = ' until the item is removed from the ' + who;
      return text;
    }
    if (W.d(100) > 40) return ' until curse removing magic is used';
    if (W.d(100) > 70) return ` for about ${level + 1} days`;
    if (W.d(100) > 95) return ' forever';
    return ` for about ${level * 2} hours`;
  };
  W.curse = function (p, level, who = 'drinker') {
    const troll = W.isTroll(p), color = () => W.color('plainColor');
    const ability = () => pick(troll ? W.game(p).slug === 'tt5e' ? ['strength', 'constitution', 'dexterity', 'intelligence', 'luck', 'charisma'] : ['strength', 'constitution', 'dexterity', 'speed', 'intelligence', 'wizardry', 'luck', 'charisma'] : ['strength', 'dexterity', 'intelligence', 'constitution', 'charisma', 'wisdom']);
    const effects = [
      () => `'s hair turns ${color()} and grows ${int(2, 5)} feet longer`,
      () => ` grows a ${pick(['lion', 'lizard', 'rabbit', 'dog', 'wolf', 'cat', 'horse', 'devil', 'cow'])} tail`,
      () => `'s skin turns to a ${color()} color`, () => ' changes sex',
      () => ` turns into a new race (${pick(['bugbears', 'dwarves', 'elves', 'gnolls', 'gnomes', 'goblins', 'hobbits', 'humans', 'hobgoblins', 'kobolds', 'orcs', 'troglodites'])})`,
      () => troll || ['bfrpg', 'ssxs'].includes(W.game(p).slug) ? ' cannot stop crying, where maybe nearby monsters may hear' : "'s alignment changes",
      () => troll ? ` loses 2 ${ability()} points` : ' loses a level', () => ' turns to a cloud of smoke',
      () => troll ? `'s sight is impaired, giving -${int(2, 6)} to SR and combat rolls` : "'s sight is impaired, giving -2 to attacks and save rolls",
      () => ' grows about 1 foot', () => ' shrinks about 1 foot',
      () => ` turns into a ${pick(['toad', 'frog', 'snake', 'bird', 'mouse', 'rat', 'squirrel', 'chipmunk', 'skunk', 'sheep', 'rabbit', 'lizard'])}`, () => ' goes insane',
      () => troll ? ` fumbles during combats and suffers ${int(1, 2)} less dice to roll for combat` : ` fumbles during combats, with a ${int(1, W.game(p).slug === 'ssxs' ? 2 : 6)} penalty to attack rolls`,
      () => ' cannot speak clearly because of stuttering', () => ' falls in love with the first person they see',
      () => troll ? ` loses 1 ${ability()} point` : ' loses 1 point in strength and constitution',
      () => ' begins to see all friends as enemies, attacking them', () => ' begins to see all friends as monsters, fleeing from them',
      () => ` suffers a penalty of 1 to ${ability()}`, () => ' speaks every word backwards', () => ' cannot hear anything',
      () => ` has all of their ${pick(['coins', 'metal objects', 'cloth apparel', 'wooden objects', 'magic weapons', 'magic armor', 'magic items', 'gems', 'jewels', 'food', 'leather items'])} turn to ${pick(['stone', 'dust', 'coal', 'leaves', 'mold', 'water', 'mud', color() + ' smoke', color() + ' ooze', 'sand'])}.`,
      () => {
        const ugly = pick(['ugly ', 'grotesque ', 'horrible ', '', '', 'painful ', 'itchy ', 'thick ', 'frightful ', 'grisly ', 'hideous ', 'unsightly ', 'horrid ']);
        return `'s skin gets covered in ${pick([ugly + 'warts', ugly + 'blisters', color() + ' scales', color() + ' hair', color() + ' feathers', ugly + 'boils', ugly + 'freckles', ugly + 'moles', ugly + 'lumps', ugly + 'scabs'])}`;
      },
      () => ' will cause flowers to wilt whenever they pass nearby', () => ' will begin to walk in a crookedly manner',
      () => ' will see only their bones in reflective surfaces', () => `'s eyes change to solid ${pick(['white', 'black'])}`,
      () => ' will have nightmares every time they try to sleep, causing a poor rest session', () => "'s hands and eyes will randomly drip blood",
      () => ' will cause domestic animals to flee from them', () => ' is always cold, requiring extra clothing',
      () => ' will cause nearby flames and torches to extinquish', () => ' will cause any food to spoild when touched',
      () => "'s clothes will become tattered and gray", () => "'s fingernails change to a black color, grow an inch longer, and drip blood occasionally",
      () => ' is always hot, causing them to shed their armor and robes'
    ];
    const index = int(0, effects.length - 1);
    return who + effects[index]() + (index === 22 ? '' : W.curseDuration(level, who));
  };

  // The 58 brewable effects, in the order of ttPotionMaker. The last column is
  // the Intelligence saving roll needed to brew it, not its duration level.
  const recipes = [
    ['Acid Resistance', 2], ['Animal Domination', 3], ['Blessing', 1], ['Bluntness', 2], ['Cleansing', 1], ['Cold Resistance', 2], ['Curing', 2], ['Cursed', 1], ['Dexterity', 1], ['Disenchanting', 3], ['Dragon Breath', 3], ['Dragon Domination', 4], ['Elemental Protection', 2], ['Etherealness', 4], ['Fire Resistance', 2], ['Flaming', 1], ['Flying', 2], ['Giant Domination', 4], ['Giant Strength', 3], ['Growing', 2], ['Healing', 1], ['Heroic', 1], ['Humanoid Domination', 2], ['Infernal', 2], ['Intellect', 1], ['Invisibility', 2], ['Invulnerable', 4], ['Levitation', 2], ['Life Giving', 5], ['Lore', 1], ['Luck', 1], ['Lycanthropy', 3], ['Lying', 1], ['Mind Reading', 3], ['Mist', 2], ['Persuasive', 1], ['Plant Control', 3], ['Poison Antidote', 1], ['Poison Cure', 2], ['Poison Immunity', 3], ['Polymorph', 2], ['Purity', 1], ['Secret Doors', 2], ['Sharpening', 2], ['Shrinking', 2], ['Slippery', 1], ['Speech', 2], ['Speed', 1], ['Spider', 3], ['Super Heroic', 3], ['Swimming', 2], ['Treasure Seeking', 4], ['Truthfulness', 1], ['Undead Domination', 3], ['Underwater Breathing', 2], ['Ventriloquism', 1], ['Vile', 2], ['Youth', 6]
  ];
  W.trollPotion = function (p, effect, level = int(5, 15)) {
    const entry = typeof effect === 'number' ? recipes[effect] : recipes.find(([name]) => name === effect);
    const base = entry ? entry[0] : effect;
    const hours = `lasts for ${level + 1} hours`, minutes = `lasts for ${level * 2} minutes`;
    const increase = (attr, amount) => `increases the drinker's ${W.ability(p, attr)} by ${amount} for ${level + 1} hours`;
    const does = {
      'Acid Resistance': () => 'rub on self or items...lasts until acid is splashed on them',
      'Animal Domination': () => hours, 'Blessing': () => 'drinker will have a curse lifted, or it can be poured on an item to remove a curse from it',
      'Bluntness': () => `any blunt weapon it is rubbed on has an extra ${int(2, 4)} dice for ${level + 1} hours`,
      'Cleansing': () => 'drinker will have a curse lifted, or it can be poured on an item to remove a curse from it',
      'Cold Resistance': () => hours, 'Curing': () => 'cures disease and illness', 'Cursed': () => W.curse(p, level),
      'Dexterity': () => increase('DEX', 5), 'Disenchanting': () => 'remove enchantments on those it is rubbed on',
      'Dragon Breath': () => 'drinker can breath fire instead of a normal attack with a 6+6', 'Dragon Domination': () => hours,
      'Elemental Protection': () => hours, 'Etherealness': () => `can pass through ${int(2, 10)} feet thick walls for ${level + 5} minutes`,
      'Fire Resistance': () => hours, 'Flaming': () => `burns as soon as it is exposed to air for ${level + 1} hours`,
      'Flying': () => `lasts for ${level + 10} minutes`, 'Giant Domination': () => hours, 'Giant Strength': () => increase('STR', 10),
      'Growing': () => `drinker and items grow to 4x normal size for ${level + 1} minutes`, 'Healing': () => `restores ${int(1, 2)}d6+${level} CON`,
      'Heroic': () => `drinker gets to add an extra dice to everything they do for ${level * 2} minutes`, 'Humanoid Domination': () => hours,
      'Infernal': () => W.curse(p, level), 'Intellect': () => increase('INT', 5), 'Invisibility': () => `lasts for ${level + 1} minutes`,
      'Invulnerable': () => minutes, 'Levitation': () => `can levitate ${int(1, 6)} feet off the ground for ${level + 10} minutes`,
      'Life Giving': () => 'brings those back from the dead', 'Lore': () => `can identify and appraise any item ${(level + 1) * 10} minutes`,
      'Luck': () => increase('LCK', 5), 'Lycanthropy': () => `drinker will turn into a ${W.lycanthrope()} for ${int(2, 12)} hours, but is not permanent and it unaffects those suffering from lycanthropy`,
      'Lying': () => `drinker can convincely tell lies for ${int(10, 20)} minutes`, 'Mind Reading': () => minutes,
      'Mist': () => `drinker and items turn to mist for ${level * 2} minutes`,
      'Persuasive': () => `can convince others to so something non-life threatening for ${level * 2} minutes`, 'Plant Control': () => hours,
      'Poison Antidote': () => `allows +${level} for any SR against poison`, 'Poison Cure': () => 'can cure any poison if consumed quick enough',
      'Poison Immunity': () => `can provide poison immunity for ${int(2, 24)} hours`, 'Polymorph': () => `can turn into another creature the same size for ${level + 1} hours`,
      'Purity': () => 'turns impure liquids to pure', 'Secret Doors': () => 'drinker can see secret doors and compartments for about an hour',
      'Sharpening': () => `any sharp weapon it is rubbed on has an extra ${int(2, 4)} dice for ${level + 1} hours`,
      'Shrinking': () => `drinker and items shrink to 5% normal size for ${level + 1} minutes`, 'Slippery': () => 'poured on the floor where anyone slips and falls',
      'Speech': () => `can talk in the same language as the one you are trying to converse with for ${(level + 1) * 10} minutes`, 'Speed': () => increase('SPD', 5),
      'Spider': () => `can walk on walls and ceilings for ${(level + 1) * 10} minutes`, 'Super Heroic': () => `drinker gets to add two extra dice to everything they do for ${level * 2} minutes`,
      'Swimming': () => 'drinker can move through water as though they are moving on land for an hour', 'Treasure Seeking': () => `can find nearby treasure for ${level * 2} minutes`,
      'Truthfulness': () => `drinker tells nothing but the truth for ${int(10, 20)} minutes unless they may an L${level}SR vs. INT`, 'Undead Domination': () => hours,
      'Underwater Breathing': () => hours, 'Ventriloquism': () => `drinker can throw their voice ${int(10, 20)} minutes`, 'Vile': () => W.curse(p, level),
      'Youth': () => `drinker becomes ${int(2, 20)} years younger`
    };
    const poisons = {
      'Curare Poison': 'which the opponent loses combat adds for every hit by the poisoned weapon',
      'Dragon Venom': 'which the opponent suffers an additional 4 hits of damage from the weapon',
      'Hellfire Juice': 'which the opponent takes additional damage [1st time is 1d6 - 2nd time is 2d6 - 3rd time is 3d6 - ect] from hits by the weapon',
      'Manbane Paste': 'causes 2d6 damage and a 1d6 reduction from a character`s two highest attributes',
      'Mandrake Powder': 'where the victim loses 1/10th of their CON permanently',
      'Naga Spittle': `where it reduces ${W.game(p).slug === 'tt5e' ? 'INT' : 'INT and WIZ'} by half${W.game(p).slug === 'tt5e' ? '' : ' their maximum'}...down to 1 where the victim would fall unconscious`,
      'Scorpion Venom': 'and it will reduce a victim`s combat adds to 75%',
      'Spider Venom': 'and can only affect human sized creatures or smaller...where they will suffer paralysis...which wears off after 5 combat rounds',
      'Stone-Fish Toxin': 'where the opponent hit would suffer 3d6 damage and make an L1SR vs. CON or drop dead',
      'Werebane Syrup': 'does 2 extra damage to non-weres, but weres suffer 4x damage from the weapon and must make an L2SR vs. CON or take 8d6 damage [if the SR fails, they are cured of lycanthropy]',
      'Wolfbane Powder': 'where the opponent suffers a loss of 3 points where going to 0 kills the victim'
    };
    const poison = Object.hasOwn(poisons, base);
    return {
      name: base + (poison || ['Poison Antidote'].includes(base) ? '' : ' ' + pick(['Potion', 'Elixir', 'Concoction', 'Draught', 'Liquid', 'Mixture'])),
      effect: poison ? `this poison can be put on weapons...${poisons[base]}...but is only effective for ${int(2, 17)} hits with the weapon before it loses effectiveness` : does[base](),
      save: `L${base === 'Curing' ? 1 : base === 'Cursed' ? 2 : entry ? entry[1] : 1}SR`, base
    };
  };
  W.trollPotionRecipes = p => recipes.map((_, i) => W.trollPotion(p, i));
  W.trollPotions = p => [...recipes.map(([name]) => name), 'Curare Poison', 'Dragon Venom', 'Hellfire Juice', 'Manbane Paste', 'Mandrake Powder', 'Naga Spittle', 'Scorpion Venom', 'Spider Venom', 'Stone-Fish Toxin', 'Werebane Syrup', 'Wolfbane Powder'].sort().map(name => W.trollPotion(p, name));
})(window.WZ);
