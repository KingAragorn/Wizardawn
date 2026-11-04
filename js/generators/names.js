(function (W, D) {
  'use strict';
  const cap = s => s.charAt(0).toUpperCase() + s.slice(1);
  const choose = (name, key = 'name', table = 0) => W.pick(D.names[name][key][table]);
  function holmesTitle(female) {
    const roll = W.rng.int(0, 108), titles = D.holmesTitles;
    if (roll >= 9 && roll <= 21) return W.pick(titles.places);
    const color = () => cap(W.pick(D.potionLooks.potionPretty.pot_culur[0]));
    if (roll >= 3 && roll <= 5) return 'of the ' + color() + ' ' + ['Cloak', 'Robe', 'Order'][roll - 3];
    if (roll >= 6 && roll <= 8) return 'of the ' + cap(W.pick(titles.gearColors)) + ' ' + ['Shield', 'Sword', 'Helm'][roll - 6];
    if (roll === 22) return 'the ' + color();
    if (roll === 58) return female ? 'of ' + W.pick(['Flowing', 'Long', 'Frazzled', 'Short']) + ' ' + W.pick(['Blond', 'Red', 'Black', 'Brown', 'Auburn', 'Chestnut', 'Gray', 'White', 'Scarlet', 'Golden', 'Dirty']) + ' Hair' : W.pick(['the Hairy', 'the Bald']);
    return W.pick(titles.rows[roll]);
  }
  W.name = function (type) {
    if (D.names[type]?.name?.length === 1) return choose(type);
    if (type === 'male' || type === 'female') {
      const fn = type === 'male' ? 'MaleName' : 'FemaleName';
      return W.d(3) === 1 ? choose(fn, 'name', 0) + choose(fn, 'name', 1) : choose(fn, 'name', 2);
    }
    if (type === 'elf_m' || type === 'elf_f') return W.d(2) === 1 ? choose(type === 'elf_m' ? 'elfboyName' : 'elfgirlName') : choose('elfName');
    if (type === 'fairy') return choose(W.d(2) === 1 ? 'elfboyName' : 'elfgirlName');
    if (type === 'catm' || type === 'catf') return choose('catName', 'name', W.d(2) === 1 ? (type === 'catm' ? 0 : 1) : 2);
    if (type === 'generic') return choose(W.d(2) === 1 ? 'genericName' : 'authorName');
    if (type === 'delf_f' || type === 'delf_m') {
      const index = type === 'delf_f' ? 0 : 2, style = W.d(8);
      const prefix = choose('DarkElfParts', 'name', index);
      const suffix = () => choose('DarkElfParts', 'name', index + 1);
      if (style <= 3) return prefix + suffix();
      if (style <= 5) return prefix + suffix() + suffix();
      if (style <= 7) return prefix + suffix() + '`' + suffix();
      return cap(prefix) + '`' + suffix().toLowerCase() + suffix();
    }
    if (type === 'wolf') return choose('wolfName') + choose('wolfName', 'end') + (W.d(3) === 1 ? '' : ' ' + choose('wolfName', 'pfx') + choose('wolfName', 'sfx').toLowerCase());
    if (type.startsWith('hb_')) {
      const culture = { st: 0, ci: 2, aq: 4 }[type.slice(3, 5)];
      const index = culture + (type.endsWith('m') ? 1 : 0);
      const last = choose('ConanLast', 'name', index);
      const limit = [48, 49, 59, 70, 90, 145][index];
      const firsts = D.names.ConanFirst.name[index];
      let first = W.pick(last.length < 3 ? firsts.slice(0, limit) : firsts);
      if (/^[AEIOUY]$/.test(first)) first += choose('ConanFirst', 'consonant');
      return W.d(20) === 1 ? choose('ConanPlain', 'name', index) : first + last;
    }
    if (type === 'holm_f' || type === 'holm_m') {
      const part = () => choose('holmesPart');
      const roll = W.d(100);
      let first = part(), last = '';
      if (roll >= 11) first += part();
      if ((roll >= 45 && roll < 60) || roll >= 95) first += part();
      if (roll >= 95) first += part();
      if (roll >= 60 && roll < 65) { first = part(); if (W.d(2) === 1) first += first.slice(-1); last = part() + part(); }
      if (roll >= 65 && roll < 80) { last = part(); if (W.d(2) === 1) last += last.slice(-1); }
      if (roll >= 80 && roll < 95) last = part() + part();
      if (roll < 11 && W.d(2) === 1) first += first.slice(-1);
      while (first.length < 2) first += part();
      while (last && last.length < 2) last += part();
      let name = cap(first.toLowerCase()) + (last ? ' ' + cap(last.toLowerCase()) : '');
      if (type === 'holm_f' && !/[ai]$/.test(name)) name += W.pick(['a', 'ina', 'iene', 'ne', 'te', 'ova']);
      if (W.d(2) === 1) name += ' ' + holmesTitle(type === 'holm_f');
      return name;
    }
    if (type === 'spell') {
      const t = D.spellNames.researchSpell;
      return `${W.pick(t.Name1[0])}\`s Spell of ${W.pick(t.Name2[0])} ${W.pick(t.Name3[0])}`;
    }
    if (type === 'village') {
      const stem = cap(choose('villageName', 'name', 0)) + choose('villageName', 'name', 1);
      const place = W.d(2) === 1 ? W.pick(['Village', 'Town', 'Hamlet', 'Settlement', 'Borough', 'Crossroads', 'Point']) + ' of ' + stem : stem + ' ' + W.pick(['Village', 'Borough', 'Hamlet', 'Settlement', 'Crossroads', 'Point']);
      return (W.d(2) === 1 ? 'The ' : '') + place;
    }
    if (type === 'tavern') {
      const p = key => choose('tavernName', 'bar_' + key);
      const animal = () => {
        const roll = W.d(6);
        const habitat = ['air', 'water', 'land'][roll - 1];
        return habitat ? p(habitat + 'creature') + ' ' + p(habitat + 'monster') : p('animal');
      };
      const person = p('person'), a = animal(), item = p('items'), ending = p('ending');
      let usedEnding = false, name;
      if (W.d(12) === 1) {
        const style = W.rng.int(0, 8);
        const specials = [`${person}'s Arms`, `${a} in Hand`, `${item} in Hand`, `${a}'s Head`, `${person}'s Head`, `${person}'s Mug`, `${person}'s Tankard`, `${a}'s ${ending}`, `${person}'s ${ending}`];
        name = specials[style]; usedEnding = style >= 7;
      } else {
        const pair = () => W.pick([`${person} and ${item}`, `${person} and ${a}`, `${person} and ${p('person')}`, `${item} and ${a}`, `${a} and ${animal()}`, `${item} and ${p('items')}`]);
        const style = W.rng.int(0, 10);
        if (style <= 5) name = pair();
        else if (style <= 7) name = (style === 7 ? p('adjvective') + ' ' : '') + p('adjvective') + ' ' + pair();
        else name = p('adjvective') + ' and ' + [person, a, item][style - 8];
      }
      if (W.d(2) === 1) name += 's';
      if (W.d(2) === 1) name = 'The ' + name;
      if (W.d(4) > 1 && !usedEnding) name += ' ' + ending;
      return name;
    }
    const simple = { demon: 'demonName', dragon: 'dragonName', dwarf: 'dwarfName', gnome: 'gnomeName', goblin: 'goblinName', human_m: 'humanMaleName', human_f: 'humanFemaleName', imp: 'impName', lizardman: 'lizardmanName', orc: 'orcName', ratman: 'ratmanName', wizard: 'mageName' };
    if (!simple[type]) throw new Error('Unknown name category: ' + type);
    return choose(simple[type]);
  };
  const categories = [
    ['demon', 'Demon'], ['dragon', 'Dragon'], ['dwarf', 'Dwarf'], ['elf_f', 'Elf Female'], ['elf_m', 'Elf Male'], ['delf_f', 'Dark Elf Female'], ['delf_m', 'Dark Elf Male'], ['fairy', 'Fairy'], ['catf', 'Feline Humanoid - Female'], ['catm', 'Feline Humanoid - Male'], ['female', 'Generic Female'], ['male', 'Generic Male'], ['generic', 'Generic'], ['gnome', 'Gnome'], ['goblin', 'Goblin'], ['holm_f', 'Holmesian Female'], ['holm_m', 'Holmesian Male'], ['human_f', 'Human Female'], ['human_m', 'Human Male'], ['imp', 'Imp'], ['lizardman', 'Lizardman'], ['orc', 'Orc'], ['ratman', 'Ratman'], ['spell', 'Spell'], ['tavern', 'Tavern'], ['village', 'Village'], ['wizard', 'Wizard'], ['wolf', 'Wolfen Humanoid'], ['hb_aqm', 'Hyborian Names - Aquilonian - Male'], ['hb_cim', 'Hyborian Names - Cimmerian - Male'], ['hb_stm', 'Hyborian Names - Stygian - Male'], ['hb_aqf', 'Hyborian Names - Aquilonian - Female'], ['hb_cif', 'Hyborian Names - Cimmerian - Female'], ['hb_stf', 'Hyborian Names - Stygian - Female']
  ];
  W.routes.names = {
    title: 'Fantasy Names', description: 'Generate random names for your fantasy role-playing game. Choose one or more categories. Holmesian names are based on the tables assembled by Zenopus (Zenopus Archives).',
    fields: [W.field('n', 'Names for each category', 'number', { value: 10, min: 1, max: 100 }), ...categories.map(([key, label]) => W.field('n_' + key, label, 'checkbox')), W.field('seed', 'Seed (optional)', 'text')],
    generate(params) {
      const count = W.number(params.n ?? params.amount, 10);
      const selected = categories.filter(([key]) => params['n_' + key] === '1' || params.type === key);
      if (!selected.length) return '<p>Choose at least one name category.</p>';
      return selected.map(([key, label]) => `<section class="name-category"><h3>${label}${key.startsWith('hb_') ? '' : ' Names'}</h3>${W.list(W.range(count).map(() => W.escape(W.name(key))))}</section>`).join('');
    }
  };
})(window.WZ, window.WZ_DATA);
