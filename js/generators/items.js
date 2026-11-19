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
})(window.WZ, window.WZ_DATA);
