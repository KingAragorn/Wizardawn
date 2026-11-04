(function (W, D) {
  'use strict';
  W.junkItem = function (params) {
    const row = W.pick(D.junk), game = W.game(params).slug;
    const currency = String(params.money || ({ gamma: 'domars', urthe: 'xormite', meta: 'gold' }[game] || 'gold'));
    if (game === 'meta') {
      const value = row[W.rng.int(2, 6)];
      return row[1] + (value ? ` (worth ${value} ${currency})` : '');
    }
    const roll = W.rng.int(2, 12), condition = roll < 6 ? 0 : roll < 8 ? 1 : roll < 10 ? 2 : roll < 11 ? 3 : roll < 12 ? 4 : 5;
    const name = row[params.tech === '1' ? 1 : 0];
    return `${name} (${['ruined', 'poor', 'fair', 'good', 'excellent', 'perfect'][condition]}${condition && row[condition + 1] ? ` - worth ${row[condition + 1]} ${currency}` : ''})`;
  };
  W.register('items', 'Apocalypse — Mundane Items', 'Generate a table of mundane post-apocalyptic items. Each roll contains several finds in varying condition.', [W.gameField, W.countField('Table entries', 100), W.field('money', 'Currency', 'text', { value: 'gold' }), W.field('tech', 'Use futuristic items', 'checkbox')], p => {
    // All arguments are explicit and defaults are local. Mutant Future and a
    // missing game use this same safe path rather than PHP's missing-argument call.
    return '<h3>Mundane Items</h3>' + W.table(['Roll', 'Mundane Items'], W.range(W.count(p)).map(i => [i, W.escape(W.range(W.rng.int(3, 13)).map(() => W.junkItem(p)).join('; '))]));
  });
})(window.WZ, window.WZ_DATA);
