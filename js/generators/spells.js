(function (W, D) {
  'use strict';
  for (const basic of [true, false]) {
    const data = (basic ? D.lablord_spells : D.osric_spells).map(row => basic ? {
      id: row.ls_id, name: row.ls_name, mage: row.ls_class === 'Mage' ? 'Magic-User' : row.ls_class, level: row.ls_level, duration: row.ls_duration, range: row.ls_range, description: row.ls_text, reverse: row.ls_reverse, refs: row.ls_ref
    } : row);
    const classes = basic ? ['All', 'Cleric', 'Elf', 'Magic-User'] : ['All', 'Cleric', 'Druid', 'Illusionist', 'Magic-User'];
    const fields = [W.field('listing', 'Spell class', 'select', { value: 'All', options: [...classes, ['', 'Select individual spells below']] }), W.field('level', 'Spell level (0 = all)', 'number', { value: 1, min: 0, max: 9 }), W.field('mins', 'Level selection', 'select', { value: 0, options: [[0, 'Exactly'], [1, 'Up to'], [2, 'At least']] }), W.field('sort', 'Sort spells', 'select', { value: 1, options: [[1, 'Alphabetical'], [2, 'Class / Alphabetical'], [3, 'Class / Level / Alphabetical'], [4, 'Level / Alphabetical'], [5, 'Level / Class / Alphabetical']] }), W.field('extra', 'Include spell references', 'checkbox'), ...data.slice().sort((a, b) => a.name.localeCompare(b.name)).map(s => W.field(`spell_${s.id}`, `${s.name} (${s.mage} ${s.level})`, 'checkbox', { checkedValue: s.id }))];
    W.register(basic ? 'basic-spells' : 'spells', basic ? 'Basic Spell Books' : 'Spell Books', basic ? 'Create a custom listing of spells for Labyrinth Lord, with descriptions and optional spell references.' : 'Create a custom OSRIC spell book, with descriptions and optional spell references.', fields, p => {
      const listing = p.listing ?? 'All', level = W.number(p.level, 0, 0, 9);
      let selected = data.filter(s => {
        if (listing === '') return !!+p['spell_' + s.id];
        if (listing !== 'All' && s.mage !== (listing === 'Elf' ? 'Magic-User' : listing)) return false;
        if (listing === 'Elf' && s.level >= 6) return false;
        if (!level) return true;
        return String(p.mins) === '1' ? s.level <= level : String(p.mins) === '2' ? s.level >= level : s.level === level;
      });
      const keys = { 1: ['name'], 2: ['mage', 'name'], 3: ['mage', 'level', 'name'], 4: ['level', 'name'], 5: ['level', 'mage', 'name'] }[p.sort || 1] || ['name'];
      selected.sort((a, b) => { for (const key of keys) { const diff = key === 'level' ? a[key] - b[key] : a[key].localeCompare(b[key]); if (diff) return diff; } return a.id - b.id; });
      if (!selected.length) return '<p>No spells selected.</p>';
      const text = value => String(value ?? '').replace(/\r?\n/g, '<br>'); // Original trusted rulebook text includes tables.
      return selected.map(s => {
        const stats = [['Class', s.mage], ['Level', s.level], ['Duration', s.duration], ['Range', s.range]];
        if (!basic) stats.push(['School', s.school], ['Area', s.area], ['Components', s.components], ['Casting Time', s.casting], ['Saving Throw', s.save]);
        const ref = data.find(row => row.id === +s.refs);
        return `<article class="spell"><h3>${W.escape(s.name)}${s.reverse ? ' <i>(Reversible)</i>' : ''}</h3>${W.table(['Property', 'Value'], stats.map(([k, v]) => [k, W.escape(v)]))}<p>${text(s.description)}</p>${p.extra === '1' && ref ? `<p><b>SPELL REFERENCE:</b> ${text(ref.description)}</p>` : ''}</article>`;
      }).join('');
    });
  }
})(window.WZ, window.WZ_DATA);
