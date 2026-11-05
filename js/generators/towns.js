(function (W, D) {
  'use strict';
  const esc = W.escape, f = W.field, pick = a => W.pick(a), int = (a, b) => W.rng.int(a, b);
  const on = (p, key, fallback = 1) => String(p[key] ?? fallback) === '1';
  const shuffle = values => { const result = values.slice(); for (let i = result.length - 1; i > 0; i--) { const j = int(0, i); [result[i], result[j]] = [result[j], result[i]]; } return result; };
  const cap = s => s.charAt(0).toUpperCase() + s.slice(1);
  const kindred = ['human', ...Object.keys(D.townTables.city_tt.multipliers)];
  const species = { human: 'Human', mhuman: 'Mutant Human', insect: 'Humanoid Insect', animal: 'Humanoid Animal', plant: 'Humanoid Plant', robot: 'Robot' };
  const genericRaces = { daklafar: 'daklafar (dark elf)', dwurman: 'dwurman (dark dwarf)', falcoran: 'falcoran (bird man)', fruglum: 'fruglum (frog man)', greyling: 'greyling (gray brownie)', mantaran: 'mantaran (insect man)', rattanu: 'rattanu (rat man)', sauriman: 'sauriman (lizard man)', slitheran: 'slitheran (snake man)', suvart: 'suvart (deep gnome)', tigran: 'tigran (cat man)', wulfan: 'wulfan (wolf man)' };
  const shops = ['', 'Tavern', 'Inn', 'Provisioner', 'Blacksmith', 'Bowyer', 'Leatherworker', 'Tailor', 'Stables', 'Carpenter', 'Alchemist', 'Baker', 'Library', 'Jeweler', 'Music', 'Church', 'Guardhouse', 'Warriors Guild', 'Wizards Guild', 'Rogues Guild', 'Bank'];
  const ruleShops = [...shops.slice(0, 15), 'Bank', 'Church', 'Guardhouse', 'Fighters Guild', 'Wizards Guild', 'Thieves Guild', 'Rangers Guild', 'Assassins Guild'];
  const postShops = ['', 'Military', 'Bar', 'Tailor', 'Medical', 'Stable', 'Vehicle', 'Supplies', 'Junk', 'Bank', 'Mechanic', 'Robot'];
  const table = (source, name, version = 0) => source[name]?.[version] || source[name]?.[0] || [];
  function racePool(p, mode) {
    if (mode === 'post') {
      let keys = Object.keys(species).filter(k => on(p, 'species_' + k));
      if (!keys.length) keys = Object.keys(species);
      if (W.game(p).slug === 'urthe') keys = keys.filter(k => !['plant', 'robot'].includes(k));
      return keys.map(k => species[k]);
    }
    if (mode === 'rules') return ['Dwarf', 'Elf', 'Gnome', 'Halfling', 'Human'];
    const aliases = mode === 'generic' ? { hobling: 'hobbit', orke: 'orc', fruglum: 'fruglum' } : {};
    const selected = kindred.filter(k => on(p, 'x_race_' + k, 0) || on(p, 'x_race_' + (aliases[k] || k), 0) || k === 'fruglum' && on(p, 'x_race_fruglum', 0));
    return [...new Set(selected.length ? selected : kindred)].map(k => mode === 'generic' ? genericRaces[k] || aliases[k] || k : k);
  }
  function citizenName(race, sex) {
    const base = race.toLowerCase().split(' (')[0];
    const types = { dwarf: 'dwarf', dwurman: 'dwarf', elf: sex === 'Female' ? 'elf_f' : 'elf_m', daklafar: sex === 'Female' ? 'delf_f' : 'delf_m', gnome: 'gnome', hobling: 'gnome', halfling: 'gnome', goblin: 'goblin', orke: 'orc', troll: 'orc', cyclops: 'orc', ogre: 'orc', rattanu: 'ratman', tigran: 'catm', wulfan: 'wolf', sauriman: 'lizardman', slitheran: 'lizardman', imp: 'imp' };
    return W.name(W.d(100) > 75 ? 'genericName' : types[base] || (sex === 'Female' ? 'female' : 'male'));
  }
  W.citizenStats = function (p, race, age = 'adult', job = 'citizen', mode = 'generic') {
    const family = mode === 'tt' ? D.townTables.city_tt : D.townTables.city_gn;
    const raceKey = race.toLowerCase().split(' (')[0];
    const multiplier = family.multipliers[raceKey] || family.multipliers[genericRaces[raceKey]] || family.multipliers[{ hobbit: 'hobling', orc: 'orke' }[raceKey]] || {};
    const stats = {};
    if (mode === 'tt') {
      for (const key of ['str', 'con', 'dex', 'int', 'lck', 'chr', 'spd', 'wiz']) stats[key.toUpperCase()] = Math.ceil(int(3, 18) * (multiplier[key] ?? 1));
      if (job !== 'citizen') {
        const warrior = /warrior|guard/.test(job), wizard = /wizard|priest/.test(job), factor = job.startsWith('leader_') ? 2 : 1;
        const ranges = warrior ? [[2, 8], [3, 10], [2, 8], [1, 3], [2, 8], [1, 3], [2, 8], [1, 5]] : wizard ? [[1, 3], [3, 10], [2, 8], [2, 8], [3, 6], [2, 8], [3, 6], [25, 55]] : [[3, 10], [3, 10], [2, 8], [2, 8], [2, 8], [2, 10], [3, 10], [2, 8]];
        const additions = Object.fromEntries(Object.keys(stats).map((key, i) => [key, int(...ranges[i]) * factor]));
        additions[pick(warrior ? ['STR', 'DEX', 'LCK', 'SPD'] : wizard ? ['DEX', 'INT', 'CHR'] : ['DEX', 'INT', 'LCK', 'WIZ'])] = int(20, 50) * factor;
        if (wizard && factor === 2) { additions.INT = Math.max(additions.INT, int(84, 100)); additions.DEX = Math.max(additions.DEX, int(84, 100)); }
        for (const key of Object.keys(stats)) stats[key] += additions[key];
      }
      if (W.game(p).slug === 'tt5e') { delete stats.SPD; delete stats.WIZ; }
    }
    if (mode === 'tt' || mode === 'generic') {
      const size = int(0, 15), heights = [48, 51, 53, 56, 58, 61, 63, 66, 68, 71, 73, 76, 78, 81, 83, 86], weights = [75, 90, 105, 120, 135, 150, 160, 170, 180, 190, 200, 225, 250, 280, 310, 350];
      const height = Math.ceil(heights[size] * (multiplier.hgt ?? 1) / (age === 'child' ? 2 : 1));
      stats.HGT = (height >= 12 ? Math.floor(height / 12) + 'ft' : '') + (height % 12 ? (height >= 12 ? ', ' : '') + height % 12 + 'in' : '');
      stats.WGT = Math.ceil(weights[size] * (multiplier.wgt ?? 1) / (age === 'child' ? 2 : 1)) + ' lbs';
    } else {
      const game = W.game(p).slug, sides = W.number(p.might2, 8, 1, 100), dice = W.number(p.might1, 1, 1, 20);
      const ages = { child: [3, 9, 1], young: [5, 12, 2], mature: [7, 18, 3], 'middle-aged': [6, 17, 2], old: [4, 10, 1] }, range = ages[age] || ages.mature;
      const postDice = mode === 'post' && game !== 'urthe';
      const robot = mode === 'post' && race === 'Robot';
      const hd = robot ? int(9, 18) : postDice ? int(range[0], range[1]) : age === 'child' ? 1 : pick([1, 1, 1, 1, 1, 2, 2, 2, 3, 4]);
      const hp = postDice || robot ? W.range(hd).reduce(total => total + int(Math.min(dice, sides), Math.max(dice, sides)), 0) : Math.max(1, Math.ceil(hd * int(dice, dice * sides) / (age === 'child' ? 2 : 1)));
      const ac = (['lablord', 'mutfut'].includes(game) ? 9 : 10) - pick([0, 0, 0, 0, 0, 1, 1, 2]);
      Object.assign(stats, { AC: ac, HD: hd, HP: hp, AT: 1, DMG: '1d' + pick([3, 3, 3, 3, 4, 4, 4, 6]), SV: 'F' + hd, AL: pick(['Lawful', 'Lawful', 'Lawful', 'Neutral', 'Neutral', 'Neutral', 'Neutral', 'Neutral', 'Neutral', 'Chaotic']), INT: pick(['Low', 'Average', 'Average', 'Average', 'Average', 'Very', 'Very', 'High']) });
      if (mode === 'post') {
        stats.SV = 'L' + range[2];
        if (game !== 'mutfut') stats.AL = pick(['Good', 'Good', 'Good', 'Fair', 'Fair', 'Fair', 'Fair', 'Fair', 'Fair', 'Evil']);
        if (game === 'urthe') {
          Object.assign(stats, { Prot: 10 - ac, Lvl: hd, Stam: hp, Atk: 1, Dmg: stats.DMG, IQ: stats.INT });
          for (const key of ['AC', 'HD', 'HP', 'AT', 'DMG', 'SV', 'AL', 'INT']) delete stats[key];
        } else if (game !== 'mutfut') {
          Object.assign(stats, { 'ATK CLASS': 1, 'RAD RESIST': int(range[0], range[1]), 'MIND RESIST': int(range[0], range[1]), 'POISON RESIST': int(range[0], range[1]) });
          stats.DMG = ({ child: '1', young: '1d3', mature: '1d4', 'middle-aged': '1d4', old: '1d2' })[age] || '1d4';
        }
      }
    }
    return stats;
  };
  W.citizen = function (p, mode, { race, age = 'adult', sex, job = 'citizen', form, body } = {}) {
    const game = W.game(p).slug, source = mode === 'post' ? D.townTables.city_post_apocalyptic.nuclearCitizen : mode === 'rules' ? D.townTables.city_fantasy.wizardCitizen : mode === 'tt' ? D.townTables.city_tt.TTCitizen : D.townTables.city_gn.GFTCitizen;
    const pool = racePool(p, mode);
    race ||= mode === 'rules' && p.race && p.race !== 'Any' && W.d(100) <= W.number(p.race_part, 100, 0) ? p.race : pick(pool);
    sex ||= pick(['Male', 'Female']);
    age = age === 'child' ? age : pick(table(source, 'ages'));
    const name = mode === 'post' ? W.name(pick(['orc', 'dwarf', 'gnome', 'elf_m', 'genericName', 'demon', 'imp', 'lizardman', 'ratman', 'goblin', 'imp', 'wolf', 'catm', sex === 'Female' ? 'female' : 'male', sex === 'Female' ? 'human_f' : 'human_m'])) : citizenName(race, sex), pronoun = sex === 'Male' ? 'He' : 'She', possessive = sex === 'Male' ? 'His' : 'Her';
    const stats = W.citizenStats(p, race, age, job, mode);
    const statHtml = '[' + Object.entries(stats).map(([key, value]) => `<b>${key}:</b> ${esc(value)}`).join('; ') + ']';
    const personality = W.d(8), trait = key => pick(table(source, key, key === 'trait3' ? personality < 6 ? 0 : personality < 8 ? 1 : 2 : 0));
    const baseRace = race.toLowerCase().split(' (')[0];
    const ordinaryHair = ['human', 'centaur', 'cyclops', 'dwarf', 'gnome', 'hobbit', 'hobling', 'halfling', 'leprechaun', 'ogre'].includes(baseRace);
    const elvenHair = ['elf', 'brownie', 'fairy', 'pixie', 'satyr', 'sprite'].includes(baseRace);
    const darkHair = ['daklafar', 'dwurman', 'greyling', 'suvart'].includes(baseRace);
    const goblinHair = ['orke', 'orc', 'goblin', 'hobgoblin', 'troll'].includes(baseRace);
    const hair = pick(sex === 'Male' ? ['bald', 'long', 'short', 'curly'] : ['long', 'short', 'curly']);
    if (mode === 'post' && race === 'Robot') { form ||= pick(['android', 'synthetic', 'replicant']); age = ''; }
    let description = `${pronoun} is a ${age} ${sex.toLowerCase()} ${race.toLowerCase()}${form ? ' (' + form + ')' : ''} that is ${trait('trait1')} in appearance. `;
    if (mode === 'post' ? ['Human', 'Mutant Human', 'Robot'].includes(race) : ordinaryHair || elvenHair || darkHair || goblinHair || mode === 'rules') {
      const colors = mode === 'post' ? table(source, 'haircolor', race === 'Mutant Human' ? 2 : 0) : goblinHair ? ['black', 'white'] : darkHair ? baseRace === 'greyling' ? ['black', 'white', 'grey'] : ['white'] : elvenHair ? ['black', 'brown', 'red', 'auburn', 'blonde'] : ['black', 'brown', 'red', 'auburn', 'gray', 'white', 'blonde'];
      const hairColor = pick(colors), beard = sex === 'Male' && age !== 'child' && !elvenHair && baseRace !== 'daklafar' && baseRace !== 'greyling' && W.d(100) > 70;
      const moustache = sex === 'Male' && age !== 'child' && W.d(100) > 70;
      description += (hair === 'bald' ? pronoun + ' is bald' : pronoun + ' has ' + hair + ', ' + hairColor + ' hair') + (beard ? ' with a ' + pick(['thick', 'long', 'short']) + ' beard and moustache' : moustache ? ' with a ' + pick(['thick', 'long', 'short']) + ' moustache' : hair === 'bald' ? ' with no facial hair at all' : '') + '. ';
    }
    description += `${pronoun} is generally ${trait('trait2')}, but also ${trait('trait3')}. ${possessive} disposition is ${trait('trait4')} but ${pronoun.toLowerCase()} is ${trait('trait5')} by nature. `;
    const brave = W.d(8), energy = W.d(8);
    if (brave > 3) description += `${pronoun} is quite ${['foolhardy', 'brave', 'fearless', 'cowardly', 'timid'][brave - 4]} in the face of danger. `;
    if (energy >= 4 && energy < 8) description += `${pronoun} comes off as being quite ${['slothful', 'lazy', 'motivated', 'driven'][energy - 4]}. `;
    description += `${pronoun} can be perceived as ${trait('trait6')} when it comes to ${possessive.toLowerCase()} morality. `;
    const interest = age === 'child' ? 'none' : pick(table(source, 'interests'));
    if (interest && interest !== 'none') description += `${pronoun} ${interest === 'collector' ? 'is a collector of ' + pick(table(source, 'collects')) : 'has a great interest in ' + interest}. `;
    let extra = '';
    if (on(p, 'dress')) {
      const clothing = [], choose = key => pick(table(source, key));
      const shirtPool = table(source, 'shirt').filter(item => sex === 'Female' || !/dress$/.test(item));
      const shirt = pick(shirtPool), pants = table(source, 'pants').filter(item => sex === 'Female' || item !== 'skirt');
      if (table(source, 'feet').length && !['minotaur', 'slitheran', 'satyr', 'centaur'].includes(baseRace)) clothing.push(choose('bcolor') + ' ' + choose('feet'));
      if (W.d(100) > 60) clothing.push(choose('bcolor') + ' belt' + (W.d(100) > 60 ? ' with a ' + choose('scolor') + ' buckle' : ''));
      if (!/dress$/.test(shirt) && !['slitheran', 'satyr', 'centaur'].includes(baseRace)) clothing.push(choose('hcolor') + ' ' + pick(pants));
      if (W.d(100) > 60) clothing.push(choose('hcolor') + ' ' + pick(table(source, 'head').filter(item => sex === 'Female' || item !== 'bonnet')));
      if (W.d(100) > 80) clothing.push(choose('hcolor') + ' ' + choose('robe'));
      clothing.push(choose('hcolor') + ' ' + shirt);
      extra += '<b>DRESSED IN:</b> ' + esc(clothing.join(', ')) + '. ';
    }
    if (on(p, 'possessions')) {
      const things = table(source, 'things'), junk = table(source, 'junky'), item = pool => {
        const [title, max, unit] = pick(pool).split('_');
        return title + (max === 'person' ? ' a ' + pick(table(source, source.royalty ? 'royalty' : 'rsvp')) : +max > 0 ? ` (${int(1, +max)} ${unit})` : '');
      };
      const items = [];
      if (things.length) items.push(item(things));
      if (things.length && W.d(100) > 40) items.push(item(things));
      if (junk.length && W.d(100) > 30) items.push(item(junk));
      if (W.d(100) > 80 && table(source, 'weapon').length) items.push(item(table(source, 'weapon')));
      const packs = table(source, 'packs');
      if (W.d(100) > 60) items.push((packs.length ? pick(packs) + ' with ' : '') + `${int(2, 10)}${mode === 'post' ? p.money || 'gp' : pick(['cp', 'sp'])}` + (mode !== 'post' && W.d(100) > 70 ? ' and ' + int(2, 10) + 'gp' : ''));
      if (mode !== 'post' && W.d(100) > 80) {
        const gems = [table(source, 'gem1'), table(source, 'gem2')];
        const stone = pool => pick(pool) + ' - ' + int(1, 5) + 'ea worth ' + int(100, 500) + 'gp';
        if (gems[0].length) items.push((packs.length ? pick(packs) : 'small pouch') + ' with precious stones (' + stone(gems[0]) + ')' + (gems[1].length && W.d(100) > 80 ? ' and (' + stone(gems[1]) + ')' : ''));
      }
      if (items.length) extra += '<b>POSSESSIONS:</b> ' + esc(items.join(', ')) + '. ';
    }
    if (mode === 'post' && race !== 'Human' && race !== 'Robot') {
      const forms = table(source, 'forms', race === 'Humanoid Plant' ? 0 : race === 'Humanoid Animal' ? 1 : 2);
      if (forms.length && /^Humanoid/.test(race)) { form ||= pick(forms); description += 'Form: ' + form + '. '; }
      if (!body) {
        const eyes = pick(table(source, 'eyes')), skin = pick(table(source, 'skin', race === 'Mutant Human' ? 1 : 0));
        const appearance = pick(table(source, 'skinhue')) + ' ' + pick(table(source, 'skincolor'));
        body = (on(p, 'dose', 0) && race !== 'Humanoid Plant' ? 'has ' + pick(table(source, 'legs')) + ' legs, ' + pick(table(source, 'arms')) + ' arms, ' : '') + (race === 'Humanoid Plant' ? 'looks similar to a humanoid ' + form + ' that is ' + appearance + ' in color' : (skin === 'skin' ? 'has ' : 'is covered in ') + appearance + ' ' + skin) + ', and has ' + eyes + ' ' + pick(table(source, 'eyehue')) + ' ' + pick(table(source, 'eyecolor')) + ' ' + (eyes === '1' ? 'eye' : 'eyes');
      }
      if (race === 'Mutant Human' || race === 'Humanoid Plant' || on(p, 'dose', 0)) description += pronoun + ' ' + body + '. ';
    }
    return { name, race, sex, age, form, body, stats, statHtml, html: `<span class="citizen"><b>${esc(name)}:</b> ${statHtml} ${esc(description)}${extra}</span>` };
  };
  // Shop stock is a set of original database records, filtered before rolling
  // availability. Keeping records makes inventory constraints testable.
  W.townStock = function (p, mode, type) {
    const post = mode === 'post', game = W.game(p).slug, shelf = on(p, 'shelf');
    const category = (post ? postShops : mode === 'rules' ? ruleShops : shops)[type];
    const cash = post ? p.money || 'gp' : 'gp', stock = W.number(p.stock, 70, 0, 100);
    const line = (item, cost, qty = 1, source = null) => ({ item: W.plainText(item), cost, qty, source });
    if (!post && type === 13) return W.range(int(10, 40)).map(() => line(W.d(2) === 1 ? W.gem(int(10, 100)) : W.jewel(int(10, 100)), '', 1));
    if (post && type === 8) return W.range(50).filter(() => W.d(100) <= stock).map(() => { const row = pick(D.junk); return line(row[0], Math.max(1, row[6]) + cash, 1); });
    const tag = post ? game === 'urthe' ? 'BU' : game === 'mutfut' ? 'MF' : 'PA' : mode === 'tt' ? 'TT' : 'DD';
    const era = mode === 'tt' ? game === 'ttde' ? on(p, 'x_oldway', 0) ? 'Deluxe' : 'Deluxes' : on(p, 'x_oldway', 0) ? 'Simple' : 'Complex' : '';
    const storeNames = [category];
    if (type === 3 && !post && +p.jack > 0) storeNames.push('Leatherworker');
    if (type === 3 && !post && +p.jack > 1) storeNames.push('Bowyer');
    const rows = D.storeItems.filter(row => row.game.split('x').includes(tag) && storeNames.includes(row.store)
      && (post || on(p, 'water') || +row.qty !== 2)
      && (mode !== 'tt' || row.era === '' || row.era === era)
      && (!post || !['1', '2'].includes(String(p.techy)) || row.era === 'both' || row.era === (String(p.techy) === '1' ? 'low' : 'hi')))
      .sort((a, b) => (mode === 'tt' ? a.note1.localeCompare(b.note1) : 0) || a.item.localeCompare(b.item));
    const result = [];
    for (const row of rows) {
      // Generic and T&T shops always carry at least one item. OSRIC and
      // post-apocalyptic shops may be empty, apart from cloning services.
      if (W.d(100) > stock && !(result.length === 0 && ['generic', 'tt'].includes(mode)) && !/Cloning Tube/.test(row.item)) continue;
      const cost = post ? row.cost + cash : game === 'ssxs' && /[cse]p$/.test(row.cost) ? '1gp' : row.cost;
      const qty = shelf && (mode === 'rules' || post ? +row.qty !== 1 : +row.qty === 0) ? int(1, 10) : 1;
      result.push(line(row.item, cost, qty, row));
    }
    if (!post && type === 12) for (let i = 0, count = int(5, 15); i < count; i++) if (W.d(100) <= stock || result.length === 0 && mode !== 'rules') result.push(line(W.bookTitle(), int(5, 200) + cash));
    return result;
  };
  W.townEquipment = function (p, mode, job) {
    job = job.replace('leader_', '');
    const simple = mode !== 'tt' || on(p, 'x_oldway', 0), cloth = simple ? 'cloth armor' : 'quilted armor';
    const armor = pick(job === 'wizard' || job === 'priest' ? [cloth, 'heavy cloth armor'] : job === 'rogue' ? simple ? ['cloth armor', 'heavy cloth armor', 'leather armor', 'studded leather armor'] : ['quilted armor', 'soft leather armor', 'heavy cloth armor'] : simple ? ['ring mail armor', 'scale mail armor', 'chain mail armor', 'banded mail armor', 'splint mail armor', 'plate mail armor', 'heavy plate mail armor'] : ['banded mail armor', 'cuirboille armor', 'heavy plate armor', 'lamellar armor', 'mail armor', 'plate armor', 'ring-joined plate armor', 'scale mail armor']);
    const shield = pick(job === 'wizard' ? ['magic wand', 'quarterstaff', 'magic staff', 'crystal ball'] : job === 'priest' ? ['silver holy symbol', 'quarterstaff', 'golden holy symbol', 'prayer beads', 'wooden holy symbol'] : job === 'rogue' ? ['buckler', W.monsterWeapon({ weapons: 'small' }, p)] : simple ? ['wooden shield', 'shield', ...(mode === 'tt' ? ['dwarven shield'] : []), 'heater shield', 'kite shield', 'tower shield', 'great shield'] : ['dwarven spike shield', 'heater shield', 'kite shield', 'lantern shield']);
    return [W.monsterWeapon({ weapons: job === 'wizard' || job === 'priest' ? 'small' : job === 'rogue' ? 'medium' : 'giant' }, p), armor, shield].join(', ');
  };
  function officer(p, mode, job, sex, race) {
    if (mode !== 'rules') {
      const rank = W.game(p).slug === 'ssxs' ? job.startsWith('leader_') ? int(4, 6) : job === 'guard' ? int(1, 2) : int(2, 3) : job.startsWith('leader_') ? int(10, 20) : job === 'guard' ? int(1, 5) : int(4, 9);
      return (mode === 'generic' ? `<i>[Level ${rank} ${esc(cap(job.replace('leader_', '')))}]</i> ` : '') + W.citizen(p, mode, { job, sex, race }).html + ' <b>ARMS &amp; ARMOR:</b> ' + esc(W.townEquipment(p, mode, job));
    }
    const leader = job.startsWith('leader_'), low = W.number(p.x_lvl1, 1, 1, 20), high = W.number(p.x_lvl2, 9, 1, 20);
    const className = ({ warrior: 'Fighter', guard: 'Fighter', wizard: 'Magic-User', priest: 'Cleric', rogue: 'Thief', ranger: 'Ranger', assassin: 'Assassin', jester: 'Thief' })[job.replace('leader_', '')] || 'Fighter';
    const options = { ...p, x_lvl1: leader ? high : Math.min(low, high), x_lvl2: Math.max(low, high), x_sex: sex || 'Any', x_race: race || (p.race !== 'Any' && W.d(100) <= W.number(p.race_part, 100, 0, 100) ? p.race : 'Any'), x_name: '1', x_show_eq: '1', x_show_me: '0' };
    return W.renderCharacter(W.character(options, 'osric', className), options);
  }
  function business(p, mode, type, owner) {
    const post = mode === 'post', rules = mode === 'rules';
    const family = D.townTables[post ? 'city_post_apocalyptic' : mode === 'tt' ? 'city_tt' : rules ? 'city_fantasy' : 'city_gn'];
    const common = family[post ? 'PABusiness' : mode === 'tt' ? 'TTBusiness' : rules ? 'wizardBusiness' : 'GFTBusiness'];
    const custom = family.shops[type] || {};
    const word = key => pick(table(custom, key).length && (key === 'hut1' || W.d(100) > 30) ? table(custom, key) : table(common, key));
    const category = (post ? postShops : rules ? ruleShops : shops)[type];
    const guild = !post && type >= (rules ? 18 : 17), church = !post && type === (rules ? 16 : 15), guards = !post && type === (rules ? 17 : 16), bank = type === (post ? 9 : rules ? 15 : 20);
    // Names follow GFTBusiness/TTBusiness/wizardBusiness: "[The ]hut3 hut2 hut1".
    // Churches, guardhouses and guilds always use their own words; guilds put
    // the member word first ("The Wizards Secret Lodge"), as the original does.
    let name;
    if (guild) {
      const members = { warrior: ['Fighters', 'Warriors', 'Champions', 'Soldiers', 'Gladiators', 'Defenders', 'Mercenaries', 'Legionnaires'], wizard: ['Wizards', 'Mages', 'Sorcerers', 'Magicians', 'Magic-Users', 'Occultists', 'Enchanters', 'Conjurers'], rogue: [rules ? 'Thieves' : 'Rogues', 'Bandits', 'Burglars', 'Sneaks', 'Prowlers', 'Highwaymen', 'Muggers', 'Swindlers'], ranger: ['Rangers', 'Hunters', 'Woodsmen', 'Travelers', 'Adventurers', 'Rangers', 'Hunters', 'Woodsmen'], assassin: ['Assassins', 'Murderers', 'Killers', 'Slayers', 'Executioners', 'Cut-Throats', 'Assassins', 'Cut-Throats'] };
      const kind = ({ 'Fighters Guild': 'warrior', 'Warriors Guild': 'warrior', 'Wizards Guild': 'wizard', 'Rangers Guild': 'ranger', 'Assassins Guild': 'assassin' })[category] || 'rogue';
      const adjective = pick(['Dark', '', 'Hidden', 'Grand', 'Glorious', 'Mysterious', 'Secret', 'Great', 'Marvelous', 'Amazing', 'Mystical', 'Legendary', 'Eternal', 'Exalted', 'Ultimate', 'Royal', 'Almighty', 'Supreme', 'Dominant', 'Fallen', 'Mighty', 'Unknown', 'Forgotten']);
      const lodge = pick(['Guild', 'Guild', 'Lodge', 'League', 'Order', 'Society', 'Clan', 'Fraternity', 'Circle', 'Ring', 'Union']);
      name = (W.d(100) > 30 ? 'The ' : '') + [pick(members[kind]), adjective, lodge].join(' ');
    } else if (church) {
      name = (W.d(100) > 30 ? 'The ' : '') + [pick(table(custom, 'hut3')), pick(table(custom, 'hut2')), 'of ' + pick(table(custom, 'hut1'))].join(' ');
    } else if (guards) {
      name = (W.d(100) > 30 ? 'The ' : '') + [pick(table(custom, 'hut3')), pick(table(common, 'hut2')), pick(table(custom, 'hut1'))].join(' ');
    } else name = (W.d(100) > 30 ? 'The ' : '') + [word('hut3'), word('hut2'), word('hut1') || category].join(' ');
    name = name.replace(/\s+/g, ' ');
    const cash = post ? p.money || 'gp' : 'gp';
    // Original owner titles (fantasy_stores_*.php); non-merchants are caretakers
    // and show the building type instead of stored gold.
    const titles = [, 'Bartender', 'Inn Keeper', 'Merchant', 'Blacksmith', ['Fletcher', 'Bowyer'], ['Tanner', 'Leatherworker'], ['Tailor', 'Dressmaker'], ['Animal Trainer', 'Stable Master'], ['Woodworker', 'Carpenter'], ['Alchemist', 'Herbalist'], ['Cook', 'Baker'], 'Librarian', 'Jeweler', 'Musician', ...(rules ? ['Banker'] : [])];
    const postTypes = [, 'Army Surplus', 'Tavern', 'Tailor', 'Doctor', 'Stables', 'Vehicles', 'Supplies', 'Junk', 'Vault', 'Mechanic', 'Robotics'];
    const titled = post ? null : titles[type], ownerTitle = post ? ({ 9: 'Banker', 2: 'Bartender', 4: 'Doctor', 7: 'Pawn Broker' })[type] || 'Owner (' + postTypes[type] + ')' : Array.isArray(titled) ? titled[W.d(2) === 1 ? 1 : 0] : titled || 'Caretaker';
    const purse = ownerTitle === 'Caretaker' ? category : int(50, 3000).toLocaleString('en-US') + cash;
    let html = `<h4>${esc(name)}${!post && type === 2 ? ` <i>(${int(2, 7)}sp per night)</i>` : ''} <small>[${esc(purse)}]</small></h4><p><b>${esc(ownerTitle)}:</b> ${owner.html}</p>`;

    if (bank) {
      // tool_mtown.php: vault numbers run on through the whole settlement and
      // each lists conditioned junk with its value, then a bag of money.
      const conditions = ['ruined', 'rough', 'average', 'good', 'perfect'];
      if (post) html += W.range(int(2, 10)).map(() => `<p><b>VAULT #${++vaultLine}:</b> ${W.range(int(5, 15)).map(() => { const row = pick(D.junk), c = int(1, 5); return esc(conditions[c - 1] + ' ' + row[0] + ' [' + (+row[c + 1] || 0).toLocaleString('en-US') + cash + ']'); }).join(' --- ')} --- ${esc(W.postBag(p) + ' filled with [' + int(5, 5000).toLocaleString('en-US') + cash + ']')}</p>`).join('');
      else html += W.range(int(2, 10)).map(i => `<p><b>IRON CHEST #${i}:</b> ${post ? '' : W.range(int(2, 10)).map(() => esc(W.d(100) > 55 ? W.gem(int(10, 100)) : W.d(100) > 10 ? W.jewel(int(10, 100)) : W.magicItem(p))).join('; ')}; ${esc(post ? int(5, 5000) + cash : W.currency(p, int(1, 20), 3))}</p>`).join('');
      if (rules) html += W.range(int(1, 3)).map(() => '<div><b>BANK GUARD:</b> ' + officer(p, mode, 'guard') + '</div>').join('');
    } else if (guild || church || guards) {
      const job = church ? 'priest' : guards ? 'guard' : ({ 'Fighters Guild': 'warrior', 'Warriors Guild': 'warrior', 'Wizards Guild': 'wizard', 'Rangers Guild': 'ranger', 'Assassins Guild': 'assassin' })[category] || 'rogue';
      // As in the original, church services follow the leader's entry.
      const services = () => {
        if (rules) {
          const rows = D.storeItems.filter(row => row.game === 'DD' && row.store === 'Priest' && +row.era <= W.number(p.x_lvl2, 9, 1, 20));
          return '<p><b><u>The Church Leader Provides These Services</u></b></p>' + W.table(['Divine service', 'Donation'], rows.map(row => [esc(W.plainText(row.item)), row.cost + 'gp']));
        }
        return mode === 'tt' ? '<p>The church will cast spells if a donation is made to the church. They will cast <i>Healing Feeling</i> for 50gp, <i>Too-Bad Toxin</i> for 100gp, <i>Pygmalion</i> for 600gp, or <i>Born Again</i> for 1,000gp.</p>' : '<p>The church will cast spells if a donation is made to the church. They will cast <i>Healing</i> for 50gp, <i>Cure</i> for 100gp, <i>Remove Curse</i> for 600gp, or <i>Resurrection</i> for 1,000gp.</p>';
      };
      const member = church && !rules ? ' PRIEST' : ' MEMBER';
      html += W.range(int(2, 5)).map(i => `<div><b>${guards ? 'GUARD' : (church ? 'CHURCH' : category.toUpperCase()) + (i === 1 ? ' LEADER' : member)}:</b> ${officer(p, mode, i === 1 && !guards ? 'leader_' + job : job)}</div>` + (church && i === 1 ? services() : '')).join('');
      if (mode === 'tt' && job === 'wizard') html += '<p>The guild teaches spells to wizards for 1,000gp per spell level. Detect Magic: 100gp; Omnipotent Eye: 200gp; For What It\'s Worth: 300gp. Ordinary magic staff: 100gp; deluxe magic staff: 5,000gp.</p>';
      if (mode === 'tt' && job === 'rogue') html += '<p>The guild secretly teaches spells for 2,000gp per spell level and appraises an item for 400gp.</p>';
    } else {
      const stock = W.townStock(p, mode, type), shelf = on(p, 'shelf');
      if (stock.length) html += W.table(['Item', 'Cost', ...(shelf ? ['In Stock'] : [])], stock.map(row => [esc(row.item) + (mode === 'tt' && on(p, 'showcase1', 0) && row.source?.note1 ? '<br>' + esc(row.source.note1) : '') + (mode === 'tt' && on(p, 'showcase2', 0) && row.source?.note2 ? '<br>' + esc(row.source.note2) : ''), esc(row.cost), ...(shelf ? [row.qty] : [])]));
    }
    return html;
  }
  let vaultLine = 0;
  W.town = function (p, mode) {
    vaultLine = 0;
    p = { ...p, rulers: p.rulers ?? p.ruler, police: p.police ?? p.guards };
    if (!p.game && (p.x_game || p.x_package)) p.game = W.game(p).slug;
    const width = W.number(p.width ?? p.map_wide, 1, 1, 10), height = W.number(p.height ?? p.map_high, 1, 1, 10), own = W.number(p.map_rooms, 0, 0, 1000);
    const rulers = on(p, 'rulers', on(p, 'ruler') ? 1 : 0);
    const built = mode === 'post' ? ['2', 'Village', 'Fantasy'].includes(String(p.use_maps)) ? 'Village' : 'City' : p.built || 'City';
    const mapKind = mode === 'post' && ['1', 'Ruined City'].includes(String(p.use_maps)) ? 'ruins' : 'settlement';
    const map = own ? { html: '', rooms: W.range(own).map(number => ({ number })), tiles: [] } : W.geomorphMap({ ...p, width, height, keyed: '1', start: 1, type: built, castle: rulers && mode !== 'post' ? '1' : '0' }, mapKind);
    const title = p.name || (mode === 'post' ? width * height > 24 ? 'City' : width * height > 16 ? 'Town' : width * height > 8 ? 'Village' : 'Hamlet' : W.name('village'));
    const populate = on(p, 'empty', mode === 'post' ? 1 : 0);
    const buildings = map.rooms.map(room => {
      const empty = populate && W.d(100) > 90;
      const owner = empty ? null : W.citizen(p, mode);
      const family = [];
      if (populate && owner && owner.race !== 'Robot') {
        if (W.d(100) > 50) family.push(W.citizen(p, mode, { race: owner.race, form: owner.form, body: owner.body, sex: owner.sex === 'Male' ? 'Female' : 'Male' }));
        if (W.d(100) > 70) family.push(W.citizen(p, mode, { race: owner.race, form: owner.form, body: owner.body, age: 'child' }));
        if (W.d(100) > 90) family.push(W.citizen(p, mode, { race: owner.race, form: owner.form, body: owner.body, age: 'child' }));
      }
      return { number: room.number, owner, family, type: 0 };
    });
    let html = `<h2>${esc(title)}</h2>${map.html}`;
    if (populate) html += `<section class="town-citizens"><img src="pics_tools/wtown_01.jpg" alt=""><h3>Citizens</h3><p>Each group is associated with a numbered building.</p>${buildings.map(b => `<article class="town-building" data-building="${b.number}"><h4>${b.number}.</h4>${b.owner ? b.owner.html + b.family.map(c => '<p>' + c.html + '</p>').join('') : '<p>This building is empty.</p>'}</article>`).join('')}</section>`;
    const kingdom = own ? own / 10 : width * height, realm = own ? Math.ceil(own / 50) + Math.floor(own / 50) : width + height;
    if (rulers && mode !== 'post') {
      const titles = kingdom >= 60 ? ['King', 'Queen'] : kingdom >= 50 ? ['Grand Duke', 'Grand Duchess'] : kingdom >= 40 ? ['Viceroy', 'Vicereine'] : kingdom >= 30 ? ['Archduke', 'Archduchess'] : kingdom >= 20 ? ['Prince', 'Princess'] : kingdom >= 10 ? ['Duke', 'Duchess'] : kingdom >= 5 ? ['Count', 'Countess'] : built === 'Village' ? ['Lord', 'Lady'] : ['Baron', 'Baroness'];
      const guards = kingdom >= 60 ? int(4, 9) : kingdom >= 50 ? int(4, 8) : kingdom >= 40 ? int(3, 7) : kingdom >= 30 ? int(3, 6) : kingdom >= 20 ? int(2, 5) : kingdom >= 10 ? int(2, 4) : kingdom >= 5 ? int(1, 3) : 1;
      const roles = [];
      if (W.d(4) > 1) roles.push([titles[0], 'leader_warrior', 'Male'], [titles[1], 'leader_' + pick(['wizard', 'warrior', 'rogue']), 'Female']);
      else { const sex = W.d(3) > 1 ? 'Male' : 'Female'; roles.push([titles[sex === 'Male' ? 0 : 1], 'leader_warrior', sex]); }
      if (realm >= W.d(20)) roles.push(['Royal Wizard', 'leader_wizard']);
      if (mode === 'rules' && realm >= W.d(20)) roles.push(['Royal Jester', 'leader_jester']);
      if (realm >= W.d(15)) roles.push(['Royal Spy', 'leader_rogue']);
      if (realm >= W.d(5)) roles.push([on(p, 'police') && W.d(2) === 1 ? 'Captain of the Guards' : 'Sheriff', 'leader_warrior']);
      if (on(p, 'police')) for (let i = 0; i < guards; i++) roles.push(['Royal Guard', 'guard']);
      const vault = W.range(int(realm + 10, realm + 20)).map(() => { const roll = W.d(100); return roll > 60 ? 'GEMS: ' + W.gem(int(10, 100)) : roll > 20 ? 'JEWELRY: ' + W.jewel(int(10, 100)) : W.magicItem(p); });
      html += '<section class="town-rulers"><img src="pics_tools/wtown_02.jpg" alt=""><h3>Rulers</h3>' + roles.map(([role, job, sex]) => `<div><b>${esc(role.toUpperCase())}:</b> ${officer(p, mode, job, sex)}</div>`).join('') + `<p><b>ROYAL VAULT:</b> ${esc(W.currency(p, realm, 3))}; ${vault.map(esc).join('; ')}</p></section>`;
    }
    let available = buildings.filter(b => b.owner);
    const assign = (label, types) => {
      const placed = [];
      for (const type of types) {
        if (!available.length) break;
        const b = available.splice(int(0, available.length - 1), 1)[0];
        b.type = type;
        placed.push(b);
      }
      if (placed.length) html += `<section class="town-businesses"><h3>${label}</h3>${placed.sort((a, b) => a.number - b.number).map(b => `<article class="town-business" data-building="${b.number}" data-shop="${b.type}"><h4>Building ${b.number}</h4>${business(p, mode, b.type, b.owner)}</article>`).join('')}</section>`;
    };
    const economy = buildings.length > 800 ? 3 : buildings.length > 400 ? 2 : 1;
    const sections = [['stores', 'Merchants', W.range(mode === 'post' ? W.game(p).slug === 'urthe' ? 11 : 9 : 14)]];
    if (mode === 'rules') sections.push(['guilds', 'Guilds', [18, 19, 20, 21, 22]], ['banks', 'Banks', [15]], ['police', 'Guards', [17]], ['church', 'Churches', [16]]);
    else if (mode !== 'post') sections.push(['guilds', 'Guilds', [17, 18, 19]], ['police', 'Guards', [16]], ['church', 'Churches', [15]]);
    for (const [key, label, types] of sections) if (on(p, key)) for (let i = 0; i < economy; i++) assign(label, types);
    if (mode === 'post' && on(p, 'law')) {
      const officials = available.length >= 3 ? shuffle(available).slice(0, Math.ceil(width * height / 3) + int(2, 5)) : shuffle(buildings.filter(b => b.owner)).slice(0, 2);
      html += '<section class="town-officials"><h3>' + esc(title) + ' Officials</h3>' + officials.map((b, i) => `<p><b>${i === 0 ? buildings.length > 800 ? 'GOVERNOR' : buildings.length > 400 ? 'MAYOR' : 'CONSTABLE' : 'LAW ENFORCEMENT'}:</b> ${b.owner.html} (Lives in #${b.number}).</p>`).join('') + '</section>';
    }
    W.storage.set('last-town', { options: p, mode, title, buildings, tiles: map.tiles });
    return html;
  };
  const common = [f('name', 'Settlement name', 'text'), f('built', 'Map type', 'select', { value: 'City', options: ['City', 'Keep', 'Village'] }), f('width', 'Map width', 'number', { value: 1, min: 1, max: 10 }), f('height', 'Map height', 'number', { value: 1, min: 1, max: 10 }), f('map_rooms', 'Buildings on your own map (0 = generate map)', 'number', { value: 0, min: 0, max: 1000 }), f('empty', 'Populate homes', 'checkbox'), f('rulers', 'Rulers', 'checkbox', { value: 1 }), f('stores', 'Merchants', 'checkbox', { value: 1 }), f('guilds', 'Guilds', 'checkbox', { value: 1 }), f('police', 'Guards', 'checkbox', { value: 1 }), f('church', 'Churches', 'checkbox', { value: 1 }), f('water', 'Sea side / boats in stock', 'checkbox', { value: 1 }), f('stock', 'Item availability (%)', 'number', { value: 70, min: 0, max: 100 }), f('shelf', 'Show quantities in stock', 'checkbox', { value: 1 })];
  for (const [route, mode, title, game] of [['town', 'generic', 'Fantasy Settlements', 'fantasy'], ['ttown', 'tt', 'Tunnels & Trolls Settlements', 'tt5e'], ['wtown', 'rules', 'Fantasy Settlements', 'osric'], ['mtown', 'post', 'Post-Apocalyptic Settlements', 'mutfut']]) {
    const fields = [ { ...W.gameField, value: game }, ...common.filter(field => mode !== 'post' || !['built', 'rulers', 'guilds', 'police', 'church'].includes(field.name)).map(field => mode === 'post' && field.name === 'empty' ? { ...field, value: 1 } : field) ];
    if (mode === 'rules') fields.push(f('x_lvl1', 'Minimum official level', 'number', { value: 1, min: 1, max: 20 }), f('x_lvl2', 'Maximum official level', 'number', { value: 9, min: 1, max: 20 }), f('race', 'Dominant race', 'select', { value: 'Any', options: ['Any', ...racePool({}, mode)] }), f('race_part', 'Dominant race (%)', 'number', { value: 100, min: 0, max: 100 }), f('banks', 'Banks', 'checkbox', { value: 1 }));
    else if (mode === 'post') fields.push(f('money', 'Currency', 'text', { value: 'gp' }), f('techy', 'Technology', 'select', { value: 3, options: [[1, 'Primitive'], [2, 'Advanced'], [3, 'Any']] }), f('use_maps', 'Settlement artwork', 'select', { value: '0', options: [[0, 'New City'], [2, 'New Village'], [1, 'Ruined City']] }), f('law', 'Officials and law enforcement', 'checkbox', { value: 1 }), f('dose', 'More mutations', 'checkbox'), ...Object.entries(species).map(([key, label]) => f('species_' + key, label, 'checkbox', { value: 1 })));
    else fields.push(...kindred.map(k => f('x_race_' + k, cap(k), 'checkbox')));
    if (mode === 'tt') fields.push(f('x_oldway', 'Use simple weapons / armor', 'checkbox'), f('showcase1', 'Show equipment classifications', 'checkbox'), f('showcase2', 'Show equipment statistics', 'checkbox'));
    if (mode === 'rules' || mode === 'post') fields.push(f('might1', 'Hit point minimum per die', 'number', { value: 1, min: 1, max: 20 }), f('might2', 'Hit point die size', 'number', { value: 8, min: 1, max: 100 }));
    fields.push(f('dress', 'Dress citizens', 'checkbox', { value: 1 }), f('possessions', 'Citizens carry items', 'checkbox', { value: 1 }));
    W.register(route, title, 'Generate a numbered settlement with citizens, government and merchant inventories using the original geomorphs and store tables.', fields, p => W.town({ ...p, game: p.game || (p.x_game ? W.game(p).slug : game) }, mode));
  }
  W.routes.ftown = W.routes.town;
})(window.WZ, window.WZ_DATA);
