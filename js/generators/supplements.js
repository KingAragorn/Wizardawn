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
    // data_magestykc_run.php monster listing with functions/monsters_tt.php ratings.
    const settings = options(p), deluxe = settings.game === 'ttde', lvl = String(p.lvl ?? 1);
    const difficult = { 1: 'a normal', 2: 'a challenging', 3: 'a difficult', 4: 'a heroic', 9: 'a simple' }[lvl] || 'an epic';
    const places = { PF: 'forests', PH: 'hills', PM: 'mountains', PP: 'plains', PS: 'swamps', PD: 'deserts', FW: 'rivers/lakes', SW: 'oceans', CF: 'snowy forests', CH: 'snowy hills', CM: 'snowy mountains', CP: 'snowy plains', TF: 'jungle/tropical forests', TH: 'jungle/tropical hills', TM: 'jungle/tropical mountains', TS: 'jungle/tropical swamps' };
    // PHP's list builder: "a", "a and b", "a, b, and c" via " x," prefixes.
    const list = items => items.length === 1 ? items[0] : items.slice(0, -1).map(x => ' ' + x + ',').join('') + ' and ' + items[items.length - 1];
    const sorted = values => values.slice().sort((a, b) => a < b ? -1 : a > b ? 1 : 0);
    const monsters = D.monsters_rpgs.filter(row => row.creator === 'TT').sort((a, b) => a.name.toLowerCase() < b.name.toLowerCase() ? -1 : a.name.toLowerCase() > b.name.toLowerCase() ? 1 : 0);
    let breaker = 1, cut = 8, html = heading('monsters') + `<p>This is a listing of the different monsters for the Tunnels &amp; Trolls&trade; supplement, Magestyck&trade;.&nbsp; These monsters are determined for ${difficult} adventure.  Monsters are listed with a <i>Type</i> to help determine what family the monster belongs to.&nbsp; They also have their <i>MR</i> and <i>Dice</i> calculated, where any natural protection is calculated into the <i>MR</i> instead of hit absorption.&nbsp; There is a <i>#App</i> for a guidance of how many monsters are encountered at a given time.&nbsp; There are <i>Size</i> and <i>Move</i> values to give an indication on how big they are and how fast they can move during a normal minute or two of travel.&nbsp; They also have their attributes in case they are needed during certain game situations.&nbsp; Some monsters may have a description if needed, an explanation of special abilities, languages spoken, and where they dwell in the world.</p>`;
    for (const row of monsters) {
      breaker++; if (breaker > cut) { html += '<div class="page-break" style="page-break-after:always;height:1px">&nbsp;</div>'; breaker = 1; cut = 7; }
      const t = W.trollStats(row, settings), a = t.attributes;
      const stats = ['STR', 'DEX', 'LCK', ...(settings.game === 'tt5e' ? [] : ['SPD']), 'CON', 'INT', ...(settings.game === 'tt5e' ? [] : ['WIZ']), 'CHR'].map(key => key + ':' + a[key]).join('&nbsp;/ ');
      const dwell = list(sorted(String(row.location).split(' ')).map(code => places[code] || 'dungeons'));
      let info = esc(t.description) + ' (' + stats + ')&nbsp;The areas they dwell are the ' + dwell + '.';
      const talking = list(sorted(String(row.spdef).split('/')));
      if (talking !== 'None') info += '&nbsp;They are able to speak ' + esc(talking) + '.';
      html += '<hr><article class="supplement-monster"><b>' + esc(row.name) + '</b><table class="monster-line"><tr><td>Type: <i>' + esc(row.type) + '</i></td><td>MR: <i>' + t.rating + '</i></td>' + (deluxe ? '<td>Lvl: <i>' + Math.ceil(t.rating / 25) + '</i></td>' : '') + '<td>Dice: <i>' + t.dice + '&nbsp;+&nbsp;' + t.adds + '</i></td><td>#App: <i>' + esc(row.enc) + '</i></td><td>Size: <i>' + esc(row.size) + '</i></td><td>Move: <i>' + esc(row.move) + '</i></td></tr></table><p>' + info + '</p></article>';
    }
    return html + '<hr>';
  });
  W.routes.data_magestykc_run.defaultGame = 'tt5e';
})(window.WZ, window.WZ_DATA);
