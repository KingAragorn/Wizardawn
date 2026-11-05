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
  for (const route of ['bxadvg', 'ladvg']) {
    const fields = W.routes[route].fields;
    if (route === 'ladvg') fields.push(W.field('x_used_sh', 'Advanced character sheet', 'checkbox'), W.field('x_lang_aec', 'AEC monster languages', 'checkbox'));
  }
})(window.WZ);
