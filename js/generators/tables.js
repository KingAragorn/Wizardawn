(function (W, D) {
  'use strict';
  const f = W.field, esc = W.escape;
  W.coinPile = function (value, game, mixed = false) {
    // The PHP routine leaves copper unreduced after assigning gold. Correct the
    // duplicated value; mixed piles conserve the exact copper value as well.
    if (!mixed || game === 'Swords & Six-Siders') return `${value.toLocaleString('en-US')}gp`;
    const standard = ['Labyrinth Lord', 'AD&D', 'BD&D', 'OSRIC', 'BFRPG'].includes(game);
    const noPlatinum = game.startsWith('Tunnels & Trolls') || game === 'Swords & Wizardry';
    const denominations = noPlatinum ? [[100, 'gp'], [10, 'sp'], [1, 'cp']] : [[500, 'pp'], [100, 'gp'], [50, 'ep'], [standard ? 10 : 20, 'sp'], [1, 'cp']];
    let copper = value * 100;
    return denominations.map(([worth, unit], i) => {
      const max = Math.floor(copper / worth);
      const amount = i === denominations.length - 1 ? max : W.rng.int(0, max);
      copper -= amount * worth;
      return amount ? `${amount.toLocaleString('en-US')}${unit}` : '';
    }).filter(Boolean).join(' / ');
  };
  W.register('coins', 'Piles of Coins', 'Generate a random set of coin denominations for your fantasy role-playing game. Choose the gold value range and the number of piles.', [W.gameField, W.countField('Piles'), f('min', 'Minimum gold value', 'number', { value: 1, min: 1, max: 100000000 }), f('max', 'Maximum gold value', 'number', { value: 100, min: 1, max: 100000000 }), f('mixed', 'Mix denominations', 'checkbox')], p => {
    const min = W.number(p.min ?? p.x_value1, 1, 1, 100000000), max = Math.max(min, W.number(p.max ?? p.x_value2, 100, 1, 100000000));
    return W.table(['Pile', 'Coins'], W.range(W.count(p, 'x_pile')).map(i => [i, W.coinPile(W.rng.int(min, max), W.game(p).name, p.mixed === '1')]));
  });
  W.bookTitle = function () {
    const t = D.books.tomeMaker, pick = n => W.pick(t['book' + n][0]);
    const author = W.name('authorName');
    const titles = [
      () => `The ${pick(1)} ${pick(2)} of the ${pick(4)}`,
      () => `The ${pick(2)} of the ${pick(1)} ${pick(4)}`,
      () => `The ${pick(4)} in the ${pick(5)}`,
      () => `The ${pick(2)} of the ${pick(3)} in the ${pick(5)}`,
      () => `The ${pick(1)} ${pick(5)} of the ${pick(3)}`,
      () => `The ${pick(8)} of the ${pick(1)} ${pick(7)} of ${author}`,
      () => `The ${pick(8)} of the ${pick(7)} of ${author}`,
      () => `The ${pick(7)} and the ${pick(3)}`,
      () => `The ${pick(2)} of ${author} the ${pick(3)}`,
      () => `The ${pick(2)} of ${author} the ${pick(3)}`,
      () => `The ${pick(2)} of ${author} the ${pick(3)}`
    ];
    const title = W.pick(titles)();
    return W.d(100) > 70 ? title.slice(4) : title;
  };
  W.register('books', 'Books &amp; Tomes', 'Create a random set of books for your fantasy role-playing game.', [W.gameField, W.countField('Books')], p => W.list(W.range(W.count(p, 'amount')).map(() => esc(W.bookTitle()))));
  W.potionAppearance = function () {
    const t = D.potionLooks.potionPretty, look = W.rng.int(0, 14);
    let text = (look === 12 ? 'This potion is ' : 'This liquid looks ') + t.pot_look[0][look];
    const colors = t.pot_culur[0];
    if (look === 11) text += ` [${W.pick(colors)} colored]`;
    if (look === 12) text += ` [colors of ${W.pick(colors.slice(0, 25))}, ${W.pick(colors.slice(25, 50))}, and ${W.pick(colors.slice(50))}]`;
    return `${text} in appearance. It also has a ${W.pick(t.pot_feel[0])} taste and smell to it. It seems to be ${W.pick(t.pot_color[0])} in color.`;
  };
  W.potionNames = function (p, brew = false) {
    const game = W.game(p).slug;
    const index = { osric: 0, lablord: p.aec === '1' ? 1 : 2, bdd: 3, ssxs: brew ? 4 : 6, add: p.ua === '1' ? (brew ? 6 : 5) : (brew ? 5 : 4), bfrpg: brew ? 8 : 7, sandw: brew ? 7 : 8 }[game];
    if (index == null) return [];
    return (brew ? D.brewPotions : D.potionNames)[index];
  };
  W.register('potions', 'Potion Appearances', 'Create random tastes, smells and appearances for potions. Enter zero for a complete list of the selected game’s potions.', [W.gameField, f('n', 'Amount (0 = game list)', 'number', { value: 1, min: 0, max: 100 }), f('aec', 'Include AEC (Labyrinth Lord)', 'checkbox'), f('ua', 'Include Unearthed Arcana (AD&D)', 'checkbox')], p => {
    const count = W.number(p.n ?? p.amount, 1, 0);
    const names = count ? W.range(count).map(i => `Potion ${i}`) : W.potionNames(p);
    if (!names.length) return '<p>A complete potion list is not yet ported for this game. Choose an amount to generate generic appearances.</p>';
    return W.table(['Potion', 'Appearance'], names.map(name => [esc(name), esc(W.potionAppearance())]));
  });
  W.register('dice', 'Combat Dice Sheets', 'Pre-roll combat dice for Tunnels &amp; Trolls. Each set lists the number of each face, the total, and optional spite damage.', [f('min', 'Minimum dice', 'number', { value: 1, min: 1, max: 1000 }), f('max', 'Maximum dice', 'number', { value: 1, min: 1, max: 1000 }), f('n', 'Sets for each dice amount', 'number', { value: 2, min: 1, max: 1000 }), f('spite', 'Show spite damage', 'checkbox', { value: 1 })], p => {
    const min = W.number(p.min ?? p.dice_min, 1, 1, 1000), max = Math.max(min, W.number(p.max ?? p.dice_max, 1, 1, 1000));
    const count = W.number(p.n ?? p.dice_num, 2, 1, 1000);
    // Bound total work without unbounded loops from manually edited bookmarks.
    if ((max - min + 1) * count * max > 5000000) return '<p>Choose a smaller dice range or fewer sets (at most five million dice per sheet).</p>';
    const rows = [];
    for (let dice = min; dice <= max; dice++) for (let i = 0; i < count; i++) {
      const faces = Array(6).fill(0);
      for (let j = 0; j < dice; j++) faces[W.d(6) - 1]++;
      const total = faces.reduce((sum, n, face) => sum + n * (face + 1), 0);
      rows.push([dice, faces.map((n, face) => `${face + 1}: ${n}`).join(' / '), total, ...(p.spite === '0' || p.tt_vs === '5' ? [] : [faces[5]])]);
    }
    return W.table(['Dice', 'Results (face: count)', 'Total', ...(p.spite === '0' || p.tt_vs === '5' ? [] : ['Spite Damage'])], rows);
  });
})(window.WZ, window.WZ_DATA);
