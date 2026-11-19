(function (W, D) {
  'use strict';
  W.gameSpellRecord = function (p = {}, casterLevel = 0, className = '') {
    const game = W.game(p).slug, basic = ['bdd', 'bfrpg', 'sandw'].includes(game);
    let level = casterLevel > 0 ? casterLevel : W.rng.int(1, 20), magic;
    if (W.d(100) < 71) magic = W.d(100) > 89 && !basic ? 'illusionist' : 'mage';
    else magic = W.d(100) > 74 && !basic ? 'druid' : 'cleric';
    if (game === 'lablord' && String(p.aec) !== '1') magic = magic === 'illusionist' ? 'mage' : magic === 'druid' ? 'cleric' : magic;
    magic = ({ Illusionist: 'illusionist', 'Magic-User': 'mage', Cleric: 'cleric', Druid: 'druid', Elf: 'mage' })[className] || magic;
    if (game === 'ssxs') { magic = 'wizard'; level = level < 4 ? 1 : level < 6 ? 2 : 3; }
    else if (game === 'bdd') level = Math.min(magic === 'mage' ? 6 : 5, Math.ceil(level / 3));
    else {
      level = level < 4 ? 1 : level < 7 ? 2 : level < 10 ? 3 : level < 13 ? 4 : level < 16 ? 5 : level < 19 ? magic === 'mage' ? W.rng.int(6, 7) : 6 : magic === 'mage' ? W.rng.int(8, 9) : 7;
      // Original BFRPG chooser uses an unset $plevel, yielding its first table.
      if (game === 'bfrpg') level = 1;
    }
    const tables = D.spellChoices[game] || D.spellChoices.osric;
    const row = tables[magic]?.[level] || tables.mage?.[Math.max(...Object.keys(tables.mage).map(Number))];
    const expanded = game === 'lablord' ? p.aec : game === 'add' ? p.ua : '0';
    const name = W.pick(String(expanded) === '1' && row.expanded ? row.expanded : row.base);
    return { level, magic, name };
  };
  W.gameSpell = function (p, level = 0, className = '') {
    const spell = W.gameSpellRecord(p, level, className);
    return 'level ' + spell.level + ' ' + spell.magic + ' spell...' + spell.name;
  };
})(window.WZ, window.WZ_DATA);
