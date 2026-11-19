(function (W, D) {
  'use strict';
  const f = W.field, esc = W.escape;
  const colors = D.equipment.colors.plainColor.color[0];
  const bottle = () => W.pick(['crystal bottle', 'ceramic bottle', 'glass bottle', 'glass jar', 'test tube', 'clay bottle', 'clay jar', 'crystal bottle', 'iron flask', 'glass decanter']);
  W.bottle = () => W.pick(['crystal bottle', 'ceramic jug', 'glass bottle', 'glass jar', 'test tube', 'clay jug', 'waterskin', 'iron flask', 'spherical, glass bottle', 'wine bottle', W.pick(colors) + '-colored, glass bottle', W.pick(colors) + '-colored, decanter']);
  const animal = () => W.pick(D.animals).toLowerCase();
  W.reagent = function (game, maximum = 2) {
    const t = D.reagents.contentsChooser;
    const category = W.d(maximum);
    if (category === 1) return W.pick(t.value[game.startsWith('Tunnels & Trolls') ? 0 : 1]) + ' ' + W.pick(t.stuff[0]);
    if (category === 2) {
      let item = W.pick(t.stuff[1]);
      if (item === 'slime') item = W.pick(['dark', 'blue', 'gray', 'black', 'green', 'red', 'brown', 'orange', 'yellow', 'purple', 'clear', 'white']) + ' slime';
      if (['bees', 'ants', 'wasps', 'leeches', 'mosquitoes', 'worms', 'bloodworms', 'centipedes'].includes(item)) item = (W.d(100) > 30 ? 'dead ' : 'live ') + item;
      return item;
    }
    return W.pick([...D.rareReagents, `glands from a ${animal()}`, `organs from a ${animal()}`, `brains of a ${W.pick(['cloud', 'fire', 'frost', 'hill', 'stone', 'storm'])} giant`, `brains of a ${W.pick(['black', 'blue', 'gold', 'green', 'red', 'white'])} dragon`]);
  };
  function duration() {
    const roll = W.rng.int(0, 11);
    if (roll < 6) return `${W.d(10) * 5} minutes`;
    if (roll === 6) return 'an hour';
    if (roll < 10) return `${W.rng.int(2, 8)} hours`;
    return roll === 10 ? `${W.rng.int(2, 7)} days` : 'a day';
  }
  function liquid() {
    const kind = W.d(4);
    if (kind === 1) return W.pick(['stale water', 'fresh water', 'sea water', 'water', 'swamp water', 'river water', 'lake water']);
    if (kind === 2) return W.pick(['wine', 'brandy', 'ale', 'cider', 'mead', 'grog']);
    if (kind === 3) return W.pick(['lemon juice', 'orange juice', 'apple juice', 'cow milk', 'goat milk', 'coconut juice', 'cranberry juice', 'grape juice', 'grapefruit juice', 'lime juice', 'pineapple juice', 'strawberry juice', 'tomato juice', 'carrot juice']);
    return W.pick(['sheep', 'pig', ...W.range(14).map(animal)]) + ' blood';
  }
  W.potionRecipe = function (game) {
    const ingredients = [];
    // Sample without replacement, so even small tables cannot cause retry loops.
    const available = Array.from(new Set(W.range(20).map(() => W.reagent(game))));
    // Deterministic fallback also guarantees three ingredients with a constant RNG.
    for (const item of D.reagents.contentsChooser.stuff[1]) if (available.length < 3 && !available.includes(item)) available.push(item);
    while (ingredients.length < 3 && available.length) ingredients.push(available.splice(W.rng.int(0, available.length - 1), 1)[0]);
    const [a, b, c] = ingredients;
    let first;
    switch (W.d(3)) {
      case 1: first = `Let ${a} sit in the sun for ${duration()}.`; break;
      case 2: { const soak = liquid(); ingredients.push(soak); first = `Let ${a} set in ${soak} for ${duration()}.`; break; }
      default: first = `Heat up ${a} in an alembic for ${duration()} so a new liquid, that you will use, forms in a separate container.`;
    }
    let second;
    switch (W.d(4)) {
      case 1: second = `Grind ${b} and ${c} with a mortar and pestle until you get ${W.pick(['a thick paste', 'a gooey substance', 'a watery substance', 'a thin paste'])} (about ${W.rng.int(2, 12)} minutes).`; break;
      case 2: second = `Cook ${b} and ${c} together in a pan for ${W.rng.int(2, 15)} minutes and let sit in the pan for ${duration()}.`; break;
      case 3: { const soak = liquid(); ingredients.push(soak); second = `Mix ${b} and ${c} together in a ${W.pick(['heated', 'warm', 'cold'])} cauldron with some ${soak} and let sit for ${duration()}.`; break; }
      default: { const soak = liquid(); ingredients.push(soak); second = `Boil ${b} and ${c} in ${soak} and then let simmer for ${duration()}.`; }
    }
    const finish = [
      () => `Mix it all together in a container and let sit for ${duration()} before drinking it.`,
      () => `Mix it all together in a clean cauldron and let simmer for ${duration()} to finish.`,
      () => 'Mix it all together in a container and filter with a cloth into a clean container to finish.',
      () => `Mix it all together in a container and set it in the sun for ${duration()} before drinking it.`,
      () => `Mix it all together in a container and bury it under fertile soil for ${duration()}. Dig it up and then you are able to drink it.`,
      () => `Mix it all together in a container and bury it over someone's grave for ${duration()}. Dig it up and then you are able to drink it.`,
      () => `Mix it all together in a container and set it in complete darkness for ${duration()} before drinking it.`,
      () => 'Mix it all together in a container to finish.',
      () => 'Mix it all together in a container to finish.'
    ];
    return { ingredients, text: (W.d(2) === 1 ? [first, second] : [second, first]).concat(W.pick(finish)()).join(' ') };
  };
  const values = [f('min', 'Minimum reagent value (gp)', 'number', { value: 1, min: 0, max: 1000 }), f('max', 'Maximum reagent value (gp)', 'number', { value: 10, min: 0, max: 1000 })];
  const expansions = [f('aec', 'Include AEC (Labyrinth Lord)', 'checkbox'), f('ua', 'Include Unearthed Arcana (AD&D)', 'checkbox')];
  W.register('brews', 'Alchemy Recipes', 'Generate alchemy recipes and an alphabetized reagent price list for your game.', [W.gameField, ...values, ...expansions], p => {
    const names = W.potionNames(p, true), game = W.game(p).name;
    const troll = W.isTroll(p), effects = troll ? W.trollPotionRecipes(p) : [];
    if (!names.length) return '<p>Choose a fantasy game to create its alchemy recipe list.</p>';
    const min = W.number(p.min ?? p.x_value1, 1, 0, 1000), max = Math.max(min, W.number(p.max ?? p.x_value2, 10, 0, 1000));
    const reagents = new Set();
    const rows = names.map((name, i) => {
      const recipe = W.potionRecipe(game); recipe.ingredients.forEach(x => reagents.add(x));
      const label = troll ? effects[i].name + ' — ' + effects[i].save + ' vs. INT' : ['OSRIC', 'AD&D', 'BD&D'].includes(game) ? name : 'Potion of ' + name;
      return [esc(label), esc((troll ? effects[i].effect + '. ' : '') + W.potionAppearance() + ' ' + recipe.text)];
    });
    return '<h3>Recipes</h3>' + W.table(['Potion', 'Appearance and recipe'], rows) + '<h3>Alchemists sell the below items with the following prices...</h3>' + W.table(['Reagent', 'Container', 'Price'], [...reagents].sort().map(item => [esc(item), bottle(), `${W.rng.int(min, max)}gp`]));
  });
  W.register('alchemist', 'Alchemy Shelf', 'Generate bottles for an alchemy shop or wizard’s laboratory. Reagent prices are optional; set the minimum to zero to omit them.', [W.gameField, W.countField('Bottles'), f('potion', 'Chance of potions (%)', 'number', { value: 0, min: 0, max: 100 }), ...values, ...expansions], p => {
    const min = W.number(p.min ?? p.x_value1, 0, 0, 1000), max = Math.max(min, W.number(p.max ?? p.x_value2, 0, 0, 1000));
    const game = W.game(p).name, potions = W.potionNames(p);
    const chance = W.number(p.potion ?? p.x_potion, 0, 0);
    return W.table(['Bottle', 'Contents', ...(min ? ['Value'] : [])], W.range(W.count(p, 'x_amount')).map(i => {
      const magic = potions.length && W.d(100) <= chance;
      let item;
      if (magic && W.isTroll(p)) { const potion = W.pick(W.trollPotions(p)); item = `${potion.name} (${potion.effect})`; }
      else item = magic ? W.potionChoice(p) : W.reagent(game, 3);
      return [i, esc(`${W.bottle()} (${magic ? item : 'filled with ' + item})`), ...(min ? [magic ? 'Magic' : `${W.rng.int(Math.max(1, min), Math.max(1, max))}gp`] : [])];
    }));
  });
})(window.WZ, window.WZ_DATA);
