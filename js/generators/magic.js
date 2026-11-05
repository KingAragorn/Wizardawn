(function (W, D) {
  'use strict';
  const pick = rows => W.pick(rows), int = (a, b) => W.rng.int(a, b);
  const previousMagic = W.magicItem, previousPotion = W.potionChoice;
  W.basicMagic = function (p, category, selected) {
    const roll = int(1, 100);
    category ||= roll < 21 ? 'sword' : roll < 31 ? 'armor' : roll < 41 ? 'weapon' : roll < 66 ? 'potion' : roll < 86 ? 'scroll' : roll < 91 ? 'ring' : roll < 96 ? 'wand' : 'misc';
    const result = selected ?? int(1, 100), row = D.fantasyTables.basicMagic[category].find(row => result >= row.min && result <= row.max);
    const form = int(0, 5), slots = {
      picked: category === 'armor' ? pick(['Chain Mail', 'Leather', 'Plate Mail']) : pick(['Short Sword', 'Sword', 'Two-Handed Sword']),
      dragon: '(' + ['White', 'Black', 'Green', 'Blue', 'Red', 'Gold'][form] + ' Dragon)',
      giant: '(' + ['Hill', 'Stone', 'Frost', 'Fire', 'Cloud', 'Storm'][form] + ' Giant)',
      curse: () => W.curse(p, int(1, 10), 'reader'), map: () => W.treasureClue(p, int(1, 20), true)
    };
    let text = W.descriptionText(row.parts, slots);
    if (row.spells) text += W.range(row.spells).map(() => W.gameSpell({ ...p, game: 'bdd' })).join(', ') + ')';
    return text;
  };
  W.potionChoice = p => W.game(p).slug === 'bdd' ? W.basicMagic(p, 'potion') : previousPotion(p);
  W.magicItem = function (p) {
    if (W.game(p).slug === 'bdd') return W.basicMagic(p);
    return previousMagic(p);
  };
})(window.WZ, window.WZ_DATA);
