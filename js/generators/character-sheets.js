(function (W) {
  'use strict';
  const esc = W.escape, enabled = (p, key, fallback = 1) => String(p[key] ?? fallback) === '1';
  W.renderBasicSheet = function (c, p) {
    const bx = c.rules === 'bx', advanced = !bx && enabled(p, 'x_used_sh', 0), age = advanced || enabled(p, 'x_show_age', 0);
    const image = bx ? age ? 'bx_char_sheet_age' : 'bx_char_sheet' : advanced ? 'll_char_sheet_basic_aec' : age ? 'll_char_sheet_basic_age' : 'll_char_sheet_basic';
    const element = (text, x, y, width = 31, size = 24, align = 'center') => `<span style="position:absolute;left:${x}px;top:${y - 4}px;width:${width}px;font-size:${size}px;text-align:${align};line-height:1.15">${esc(text)}</span>`;
    const page = (name, text) => `<section class="original-character-sheet" aria-label="${esc(c.name + ' ' + name)}" style="position:relative;width:700px;height:905px;color:black;background:white;font-family:serif;break-after:page"><img src="pics_tools/${name}.jpg" width="700" height="905" alt="Original Wizardawn character sheet" style="position:absolute;left:0;top:0;max-width:none">${text}</section>`;
    let fields = '';
    const name = enabled(p, 'x_name') ? c.name : '';
    if (bx) {
      fields += element(name, 53, 60, 220, 16, 'left') + element(c.sex + ' ' + c.className, 53, 120, 220, 16, 'left');
      fields += element(enabled(p, 'x_show_al') ? c.alignment : '', 325, 60, 100, 16, 'left') + element(c.level, 240, 120, 80, 16);
      if (age) fields += element(c.age, 325, 120, 80, 16);
      ['STR', 'INT', 'WIS', 'DEX', 'CON', 'CHA'].forEach((key, i) => {
        fields += element(c.stats[key], 57, 328 + i * 53);
        fields += element(W.basicAttribute(c.rules, key, c.stats[key], c.className), 232, 336 + i * 53, 160, 20);
      });
      c.saves.forEach((value, i) => { fields += element(value, 430, [343, 407, 467, 530, 592][i]); });
      fields += element(c.hitPoints, 280, 175) + element(c.ac, 127, 175);
      c.attacks.forEach((value, i) => { fields += element(value, [239, 284, 327, 371, 415, 459, 503, 548, 592, 637][i], 871, 31, 18); });
      fields += element(c.languages.join(', '), 135, 677, 536, 14, 'left');
      if (enabled(p, 'x_show_sk')) fields += element(c.skills.join('; '), 50, 730, 587, 14, 'left');
    } else {
      fields += element(name, 293, 70, 220, 16, 'left') + element(c.sex, 538, 52, 100, 16, 'left') + element(c.className, 538, 70, 120, 16, 'left');
      fields += element(enabled(p, 'x_show_al') ? c.alignment : '', 293, 127, 100, 16, 'left') + element(c.level, 395, 127, 80, 16);
      if (age) fields += element(c.age, 275, 180, 80, 16);
      ['STR', 'DEX', 'CON', 'INT', 'WIS', 'CHA'].forEach((key, i) => {
        fields += element(c.stats[key], 75, [378, 430, 482, 533, 584, 636][i]);
        fields += element(W.basicAttribute(c.rules, key, c.stats[key], c.className, advanced), 212, [387, 440, 491, 542, 593, 644][i] + (advanced && i > 1 && i < 5 ? 8 : 0), 160, advanced && i > 1 && i < 5 ? 15 : 20);
      });
      c.saves.forEach((value, i) => { fields += element(value, 390, [383, 447, 507, 570, 632][i]); });
      fields += element(c.hitPoints, 355, 260) + element(c.ac, 519, 252);
      c.attacks.forEach((value, i) => { fields += element(value, [177, 211, 245, 279, 313, 347, 383, 417, 451, 485, 519, 552, 587][i], 871, 31, 18); });
      fields += element(c.languages.join(', '), 175, 700, 480, 14, 'left');
      if (enabled(p, 'x_show_sk')) fields += element(c.skills.join('; '), 77, 748, 555, 14, 'left');
    }
    const notes = [];
    if (enabled(p, 'x_show_me')) notes.push(W.plainText(W.citizen({ ...p, game: c.game, possessions: '0', dress: '1' }, 'rules', { race: c.race, sex: c.sex }).html));
    if (enabled(p, 'x_show_ss', 0)) notes.push(...c.spells.map(row => 'Spell Book — Level ' + row.level + ': ' + row.names.join(', ')));
    const gear = enabled(p, 'x_show_eq') ? [c.weapon, c.armor, c.equipment, ...c.relics].join('; ') : '';
    let back = element(gear, bx ? 57 : 77, bx ? 55 : 105, bx ? 580 : 537, bx ? 16 : 14, 'left');
    back += element(notes.join('\n\n'), bx ? 57 : 77, bx ? 400 : 460, bx ? 580 : 537, bx ? 16 : 14, 'left');
    back += element(enabled(p, 'x_show_eq') ? c.coins : '', bx ? 150 : 430, bx ? 750 : 767, 230, 16, 'left');
    back += element(c.xp.toLocaleString('en-US'), bx ? 450 : 134, bx ? 750 : 767, 123, 18);
    back += element((c.xpBonus > 0 ? '+' : '') + c.xpBonus + '% XP', bx ? 450 : 134, bx ? 785 : 805, 123, 14);
    back += element(c.nextXP ? c.nextXP.toLocaleString('en-US') : 'Max Level', bx ? 530 : 212, bx ? 852 : 872, 123, 18);
    return `<article class="character character-sheet" data-character="${esc(c.name)}">${page(image, fields)}${page(bx ? 'bx_char_sheet_notes' : 'll_char_sheet_notes', back)}</article>`;
  };
  // tool_oadvg.php "Character Sheets": a 700px table sheet built from the
  // ocsht_*.jpg label images, with " / "-joined ability notes that omit
  // blank modifiers, an equipment box and a notes box (description, then
  // notes and skills).
  W.renderOsricSheet = function (c, p) {
    const m = c.modifiers || {}, img = (n, w, h) => `<img src="pics_tools/ocsht_${n}.jpg" width="${w}" height="${h}" alt="">`;
    const sgn = v => (+v > 0 ? '+' : '') + v, has = v => v !== undefined && v !== null && v !== '' && +v !== 0;
    const join = parts => parts.filter(([, v, show = has(v)]) => show).map(([k, v]) => k + v).join(' / ');
    const line = (v, w = 50) => `<table width="${w}" style="border-bottom:1px solid #000"><tr><td align="center">${v === '' ? '&nbsp;' : esc(String(v))}</td></tr></table>`;
    const info = {
      STR: join([['Hit: ', has(m.hit) ? sgn(m.hit) : ''], ['Dmg: ', has(m.damage) ? sgn(m.damage) : ''], ['Min: ', m.minor, !!m.minor], ['Maj: ', m.major, m.major != null && m.major !== '']]),
      DEX: join([['Surprise: ', has(m.surprise) ? sgn(m.surprise) : ''], ['Range: ', has(m.range) ? sgn(m.range) : ''], ['AC: ', has(m.acAdjustment) ? sgn(m.acAdjustment) : '']]),
      CON: join([['HP: ', has(m.hp) ? sgn(m.hp) : ''], ['Res: ', m.resurrection + '%', m.resurrection != null], ['Sys Shk: ', m.systemShock + '%', m.systemShock != null]]),
      INT: has(m.languages) ? m.languages + (+m.languages === 1 ? ' Extra Language' : ' Extra Languages') : '',
      WIS: has(m.mentalSave) ? 'Magic Save Bonus: ' + sgn(m.mentalSave) : '',
      CHA: join([['Hench: ', m.henchmen, m.henchmen != null], ['Loyal: ', has(m.loyalty) ? sgn(m.loyalty) + '%' : ''], ['React: ', has(m.reaction) ? sgn(m.reaction) + '%' : '']])
    };
    const name = enabled(p, 'x_name') ? c.name : '';
    const head = [[['01', 51, 25], name, 200, ['02', 55, 18], c.className, 130], [['03', 50, 18], c.sex + ' ' + c.race, 150, ['04', 39, 20], c.age, 50], [['05', 105, 20], c.alignment, 50, ['06', 112, 19], c.xp.toLocaleString('en-US'), 130], [['07', 55, 19], c.level, 50, ['22', 71, 18], c.thaco ?? '', 50], [['10', 104, 19], c.hitPoints, 50, ['08', 127, 18], c.ac, 50]];
    let html = `<article class="character character-sheet osric-sheet" data-character="${esc(c.name)}"><div align="center"><table width="700"><tr><td valign="top"><p align="center">${img(26, 680, 67)}</p><table width="100%">`;
    html += head.map(([a, av, aw, b, bv, bw]) => `<tr><td height="35" valign="top" width="125">${img(...a)}</td><td valign="top">${line(av, aw)}</td><td valign="top" width="135">${img(...b)}</td><td align="right" width="146" valign="top">${line(bv, bw)}</td></tr>`).join('');
    html += `</table><table width="100%"><tr><td>${img('09', 129, 23)}</td><td align="right">${img(11, 211, 30)}</td></tr></table><table width="100%">`;
    const rows = [['STR', 18, 43, 18, 20, 176, 20], ['DEX', 17, 42, 24, 21, 162, 19], ['CON', 16, 42, 23, 23, 239, 24], ['INT', 15, 37, 23, 24, 195, 20], ['WIS', 19, 41, 18, 25, 63, 18], ['CHA', 14, 42, 18]];
    html += rows.map(([key, n, w, h, sn, sw, sh], i) => `<tr><td width="63" height="35" valign="top">${img(n, w, h)}</td><td width="68" valign="top">${line(key === 'STR' && c.exceptionalStrength ? c.stats.STR + '.' + c.exceptionalStrength : c.stats[key])}</td><td valign="top">${line(info[key], 240)}</td>` + (sn ? `<td width="247" valign="top">${img(sn, sw, sh)}</td><td align="right" width="64" valign="top">${line(c.saves[i] ?? '')}</td>` : `<td colspan="2" align="center">${img(27, 250, 50)}</td>`) + '</tr>').join('');
    const gear = enabled(p, 'x_show_eq') ? esc([c.weapon, c.armor, c.equipment].filter(Boolean).join(', ') + (c.coins ? '; ' + c.coins : '') + (c.relics.length ? '; ' + c.relics.join('; ') : '')) : '';
    const notes = [];
    if (enabled(p, 'x_show_me')) notes.push(W.citizen({ ...p, game: c.game, possessions: '0', dress: '1' }, 'rules', { race: c.race, sex: c.sex }).html.replace(/^.*?\] /, ''));
    if (enabled(p, 'x_show_sk') && c.skills.length) notes.push(esc(c.skills.join('; ')));
    html += `</table><table border="1" width="100%" style="border-collapse:collapse;margin-top:6px"><tr><td>${img(12, 147, 29)}<br>${gear}<br><br><br><br></td></tr></table>`;
    html += `<table border="1" width="100%" style="border-collapse:collapse;margin-top:6px"><tr><td>${img(13, 87, 29)}<br>${notes.join('<br><br>')}<br><br><br><br></td></tr></table>`;
    return html + '</td></tr></table></div><div style="page-break-after:always;height:1px">&nbsp;</div></article>';
  };
  for (const route of ['bxadvg', 'ladvg']) {
    const fields = W.routes[route].fields;
    if (route === 'ladvg') fields.push(W.field('x_used_sh', 'Advanced character sheet', 'checkbox'), W.field('x_lang_aec', 'AEC monster languages', 'checkbox'));
  }
})(window.WZ);
