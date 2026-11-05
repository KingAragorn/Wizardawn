(function (W, D) {
  'use strict';
  const esc = W.escape, lore = D.supplements;
  const options = p => ({ game: String(p.ttvs) === '7' ? 'tt7e' : String(p.ttvs) === '9' ? 'ttde' : 'tt5e', ttlvl: p.lvl ?? 1, noNames: '1' });
  const heading = part => `<div class="supplement-heading"><img src="pics_tools/tt_bw_logo.jpg" alt="Tunnels &amp; Trolls"><span><img src="pics_tools/tt_mg_magestykc.jpg" alt="Magestykc"><br><img src="pics_tools/tt_mg_${part}.jpg" alt="${part}"></span></div>`;
  W.magestykcLanguages = function () {
    const monsters = D.monsters_rpgs.filter(row => row.creator === 'TT');
    const languages = new Set(monsters.filter(row => !['None', 'Any'].includes(row.spdef)).flatMap(row => row.spdef.split('/')));
    const sorted = [...languages].sort((a, b) => a === 'Common' ? -1 : b === 'Common' ? 1 : a.localeCompare(b));
    return sorted.map(name => ({ name, skill: 'L' + (lore.languageLevels[name] || '') + 'SR', count: monsters.filter(row => row.spdef === 'Any' || row.spdef.includes(name)).length }));
  };
  W.magestykcKindred = function (p) {
    const seven = String(p.ttvs) === '7';
    return D.monsters_rpgs.filter(row => row.creator === 'TT' && row.loot).sort((a, b) => +b.xp - +a.xp || a.name.localeCompare(b.name)).map(row => {
      const cells = row.loot.split(' '), descriptions = row.treasure.split('_');
      const keys = ['STR', 'CON', 'DEX', 'INT', 'LCK', 'CHR', ...(seven ? ['WIZ'] : []), 'HGT', 'WGT'];
      const indices = [1, 4, 7, 10, 13, 16, ...(seven ? [19] : []), 22, 25];
      return { name: row.name === 'Man, Merchant' ? 'Human' : row.name, type: row.type, size: row.size, move: row.move, language: row.spdef.split('/')[0], modifiers: Object.fromEntries(keys.map((key, i) => [key, cells[indices[i]]])), description: seven || !descriptions[1] ? descriptions[0] : descriptions[1] };
    });
  };
  W.routes.data_magestykc = { title: 'Magestykc Supplement', render: () => W.layout('<h1>Magestykc Supplement</h1><p>' + lore.intro + '</p>', { game: 'tt5e', left: W.menu('Supplements', row => row.mn_group === 'Supplements' && /x14x/.test(row.mn_members)), right: W.menu('Generators', row => row.mn_group === 'Generators' && /x14x/.test(row.mn_members)) }) };
  W.register('data_magestykc_run', 'Magestykc Supplement', 'Original language, kindred and monster reference supplements for Tunnels & Trolls.', [W.field('id', 'Supplement', 'select', { value: 'lang', options: [['lang', 'Languages'], ['kin', 'Kindred'], ['mon', 'Tome of Monsters']] }), W.field('ttvs', 'Edition', 'select', { value: '5', options: [['5', '5th edition'], ['7', '7th edition'], ['9', 'Deluxe']] }), W.field('lvl', 'Monster difficulty', 'select', { value: 1, options: [[9, 'Easy'], [1, 'Normal'], [2, 'Challenging'], [3, 'Difficult'], [4, 'Heroic'], [5, 'Epic']] })], p => {
    if (p.id === 'lang' || !p.id) {
      const rows = W.magestykcLanguages();
      return heading('languages') + '<p>' + lore.languageIntro + '</p>' + W.table(['Creatures', 'Learning SR', 'Language'], rows.map(row => [row.count, row.skill, esc(row.name)])) + '<p>' + lore.languageRules + '</p>';
    }
    if (p.id === 'kin') {
      const rows = W.magestykcKindred(p), attributes = Object.keys(rows[0]?.modifiers || {});
      return heading('kindred') + '<p>' + lore.kindredIntro + '</p>' + rows.map(row => `<article class="kindred"><h3>${esc(row.name)}</h3><p>Type: ${esc(row.type)}; Size: ${esc(row.size)}; Move: ${esc(row.move)}; Language: ${esc(row.language)}</p><p>${Object.entries(row.modifiers).map(([key, value]) => esc(key + ': ' + value)).join(' / ')}</p><p>${esc(W.plainText(row.description))}</p></article>`).join('') + '<h3>Kindred Attribute Modifier Table</h3>' + W.table(['Kindred', ...attributes], rows.map(row => [esc(row.name), ...attributes.map(key => esc(row.modifiers[key]))]));
    }
    const settings = options(p), monsters = D.monsters_rpgs.filter(row => row.creator === 'TT').sort((a, b) => a.name.localeCompare(b.name));
    return heading('monsters') + '<p>Monsters are listed with Type, MR, Dice, number appearing, Size, Move, attributes, special abilities, languages and terrain.</p>' + monsters.map(row => '<article class="supplement-monster">' + W.monsterStats(row, true, settings) + '<p><b>Terrain:</b> ' + esc(row.location) + '; <b>Languages:</b> ' + esc(row.spdef) + '</p></article>').join('');
  });
  W.routes.data_magestykc_run.defaultGame = 'tt5e';
})(window.WZ, window.WZ_DATA);
