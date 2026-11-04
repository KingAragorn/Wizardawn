(function (W, D) {
  'use strict';
  const esc = W.escape, f = W.field, pick = a => W.pick(a), int = (a, b) => W.rng.int(a, b);
  const on = (p, key, fallback = 1) => String(p[key] ?? fallback) === '1';
  const shuffle = values => { const result = values.slice(); for (let i = result.length - 1; i > 0; i--) { const j = int(0, i); [result[i], result[j]] = [result[j], result[i]]; } return result; };
  const cap = s => s.charAt(0).toUpperCase() + s.slice(1);
  const kindred = ['human', ...Object.keys(D.townTables.city_tt.multipliers)];
  const species = { human: 'Human', mhuman: 'Mutant Human', insect: 'Humanoid Insect', animal: 'Humanoid Animal', plant: 'Humanoid Plant', robot: 'Robot' };
  const shops = ['', 'Tavern', 'Inn', 'Provisioner', 'Blacksmith', 'Bowyer', 'Leatherworker', 'Tailor', 'Stables', 'Carpenter', 'Alchemist', 'Baker', 'Library', 'Jeweler', 'Music', 'Church', 'Guardhouse', 'Warriors Guild', 'Wizards Guild', 'Rogues Guild', 'Bank'];
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
    const aliases = mode === 'generic' ? { hobling: 'hobbit' } : {};
    const selected = kindred.filter(k => on(p, 'x_race_' + k, 0) || on(p, 'x_race_' + (aliases[k] || k), 0));
    return [...new Set(selected.length ? selected : kindred)];
  }
  function citizenName(race, sex) {
    const base = race.toLowerCase();
    const types = { dwarf: 'dwarf', dwurman: 'dwarf', elf: sex === 'Female' ? 'elf_f' : 'elf_m', daklafar: sex === 'Female' ? 'delf_f' : 'delf_m', gnome: 'gnome', hobling: 'gnome', halfling: 'gnome', goblin: 'goblin', orke: 'orc', troll: 'orc', cyclops: 'orc', ogre: 'orc', rattanu: 'ratman', tigran: 'catm', wulfan: 'wolf', sauriman: 'lizardman', slitheran: 'lizardman', imp: 'imp' };
    return W.name(W.d(100) > 75 ? 'genericName' : types[base] || (sex === 'Female' ? 'female' : 'male'));
  }
  W.citizenStats = function (p, race, age = 'adult', job = 'citizen', mode = 'generic') {
    const family = mode === 'tt' ? D.townTables.city_tt : D.townTables.city_gn;
    const multiplier = family.multipliers[race.toLowerCase()] || {};
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
      const game = W.game(p).slug, hd = age === 'child' ? 1 : pick([1, 1, 1, 1, 1, 2, 2, 2, 3, 4]), sides = W.number(p.might2, ['gamma', 'meta', 'urthe'].includes(game) ? 6 : 8, 1, 100), dice = W.number(p.might1, 1, 1, 20);
      const hp = Math.max(1, Math.ceil(hd * int(dice, dice * sides) / (age === 'child' ? 2 : 1)));
      const ac = (['lablord', 'mutfut'].includes(game) ? 9 : 10) - pick([0, 0, 0, 0, 0, 1, 1, 2]);
      Object.assign(stats, { AC: ac, HD: hd, HP: hp, AT: 1, DMG: '1d' + pick([3, 3, 3, 3, 4, 4, 4, 6]), SV: 'F' + hd, AL: pick(['Lawful', 'Lawful', 'Lawful', 'Neutral', 'Neutral', 'Neutral', 'Neutral', 'Neutral', 'Neutral', 'Chaotic']), INT: pick(['Low', 'Average', 'Average', 'Average', 'Average', 'Very', 'Very', 'High']) });
      if (mode === 'post' && ['urthe', 'apoc'].includes(game)) { stats.STAMINA = hp; stats.PROTECTION = 10 - ac; delete stats.AC; delete stats.HP; }
    }
    return stats;
  };
  W.citizen = function (p, mode, { race, age = 'adult', sex, job = 'citizen' } = {}) {
    const game = W.game(p).slug, source = mode === 'post' ? D.townTables.city_post_apocalyptic.nuclearCitizen : mode === 'rules' ? D.townTables.city_fantasy.wizardCitizen : mode === 'tt' ? D.townTables.city_tt.TTCitizen : D.townTables.city_gn.GFTCitizen;
    const pool = racePool(p, mode);
    race ||= mode === 'rules' && p.race && p.race !== 'Any' && W.d(100) <= W.number(p.race_part, 100, 0) ? p.race : pick(pool);
    sex ||= pick(['Male', 'Female']);
    age = age === 'child' ? age : pick(table(source, 'ages'));
    const name = citizenName(race, sex), pronoun = sex === 'Male' ? 'He' : 'She', possessive = sex === 'Male' ? 'His' : 'Her';
    const stats = W.citizenStats(p, race, age, job, mode);
    const statHtml = '[' + Object.entries(stats).map(([key, value]) => `<b>${key}:</b> ${esc(value)}`).join('; ') + ']';
    const personality = W.d(8), trait = key => pick(table(source, key, key === 'trait3' ? personality < 6 ? 0 : personality < 8 ? 1 : 2 : 0));
    const hair = pick(sex === 'Male' ? ['bald', 'long', 'short', 'curly'] : ['braided', 'long', 'short', 'curly']);
    let description = `${pronoun} is a ${age} ${sex.toLowerCase()} ${race.toLowerCase()} that is ${trait('trait1')} in appearance. ${hair === 'bald' ? pronoun + ' is bald' : pronoun + ' has ' + hair + ', ' + pick(table(source, 'haircolor')) + ' hair'}${sex === 'Male' && age !== 'child' && W.d(100) > 70 ? ' with a ' + pick(['thick', 'long', 'short']) + ' beard and moustache' : ''}. ${pronoun} is generally ${trait('trait2')}, but also ${trait('trait3')}. ${possessive} disposition is ${trait('trait4')} but ${pronoun.toLowerCase()} is ${trait('trait5')} by nature. `;
    const brave = W.d(8), energy = W.d(8);
    if (brave > 3) description += `${pronoun} is quite ${['foolhardy', 'brave', 'fearless', 'cowardly', 'timid'][brave - 4]} in the face of danger. `;
    if (energy >= 4 && energy < 8) description += `${pronoun} comes off as being quite ${['slothful', 'lazy', 'motivated', 'driven'][energy - 4]}. `;
    description += `${pronoun} can be perceived as ${trait('trait6')} when it comes to ${possessive.toLowerCase()} morality. `;
    const interest = age === 'child' ? 'none' : pick(table(source, 'interests'));
    if (interest && interest !== 'none') description += `${pronoun} ${interest === 'collector' ? 'is a collector of ' + pick(table(source, 'collects')) : 'has a great interest in ' + interest}. `;
    let extra = '';
    if (on(p, 'dress', mode === 'generic' || mode === 'tt' ? 1 : 1)) extra += `<b>DRESSED IN:</b> ${esc(W.color())} ${esc(sex === 'Female' && W.d(3) === 1 ? 'dress' : 'shirt and trousers')}, ${esc(pick(['shoes', 'boots', 'sandals']))}. `;
    if (on(p, 'possessions')) {
      const things = table(source, 'things'), junk = table(source, 'junky'), item = pool => {
        const [title, max, unit] = pick(pool).split('_');
        return title + (max === 'person' ? ' a ' + pick(table(source, source.royalty ? 'royalty' : 'rsvp')) : +max > 0 ? ` (${int(1, +max)} ${unit})` : '');
      };
      const items = [];
      if (things.length) items.push(item(things));
      if (things.length && W.d(100) > 40) items.push(item(things));
      if (junk.length && W.d(100) > 30) items.push(item(junk));
      if (W.d(100) > 60) items.push(`${int(2, 10)}${mode === 'post' ? p.money || 'gp' : pick(['cp', 'sp'])}`);
      if (items.length) extra += '<b>POSSESSIONS:</b> ' + esc(items.join(', ')) + '. ';
    }
    if (mode === 'post' && race !== 'Human' && race !== 'Robot') {
      const forms = table(source, 'forms', race === 'Humanoid Plant' ? 0 : race === 'Humanoid Animal' ? 1 : 2);
      if (forms.length && /^Humanoid/.test(race)) description += 'Form: ' + pick(forms) + '. ';
      if (W.mutations) extra += '<b>MUTATIONS:</b> ' + esc(W.mutations({ ...p, game }, int(1, on(p, 'dose', 0) ? 6 : 3))) + '. ';
    }
    return { name, race, sex, age, stats, statHtml, html: `<span class="citizen"><b>${esc(name)}:</b> ${statHtml} ${esc(description)}${extra}</span>` };
  };
  function business(p, mode, type, owner) {
    const post = mode === 'post', family = D.townTables[post ? 'city_post_apocalyptic' : mode === 'tt' ? 'city_tt' : mode === 'rules' ? 'city_fantasy' : 'city_gn'];
    const common = family[post ? 'PABusiness' : mode === 'tt' ? 'TTBusiness' : mode === 'rules' ? 'wizardBusiness' : 'GFTBusiness'];
    const custom = family.shops[type] || {};
    const word = key => pick(table(custom, key).length && (key === 'hut1' || W.d(100) > 30) ? table(custom, key) : table(common, key));
    const category = post ? postShops[type] : shops[type], name = type >= 17 && !post ? 'The ' + esc(category) + ' of ' + esc(owner.name) : esc((W.d(100) > 30 ? 'The ' : '') + [word('hut3'), word('hut2'), word('hut1') || category].join(' '));
    const stock = W.number(p.stock, 70, 0, 100), shelf = on(p, 'shelf'), cash = post ? p.money || 'gp' : 'gp';
    let inventory = [];
    if (!post && type === 13) inventory = W.range(int(10, 40)).map(() => { const item = W.gem(); return [esc(item.split(' (')[0]), esc(item.split(' (')[1].replace(')', '')), ...(shelf ? [1] : [])]; });
    else if (post && type === 8) inventory = W.range(50).filter(() => W.d(100) <= stock).map(() => { const row = pick(D.junk); return [esc(row[0]), esc(Math.max(1, row[6]) + cash), ...(shelf ? [int(1, 10)] : [])]; });
    else {
      const store = category === 'Jeweler' ? '' : category;
      const candidates = D.storeItems.filter(item => (post ? item.game.includes(W.game(p).slug === 'urthe' ? 'BU' : W.game(p).slug === 'mutfut' ? 'MF' : 'PA') : item.game === (mode === 'tt' ? 'TT' : 'DD')) && item.store === store && (on(p, 'water') || !/boat|ship|canoe|raft/i.test(item.item)) && (!post || String(p.techy || 3) === '3' || item.era === 'both' || item.era === (String(p.techy) === '1' ? 'old' : 'new')));
      inventory = candidates.sort((a, b) => a.item.localeCompare(b.item)).filter((row, i) => W.d(100) <= stock || i === 0 && !post || /Cloning Tube/.test(row.item)).map(row => [esc(row.item) + (mode === 'tt' && on(p, 'showcase1', 0) ? '<br>' + esc(row.note1) : '') + (mode === 'tt' && on(p, 'showcase2', 0) ? '<br>' + esc(row.note2) : ''), esc(mode === 'post' ? row.cost + cash : W.game(p).slug === 'ssxs' && /[cse]p$/.test(row.cost) ? '1gp' : row.cost), ...(shelf ? [+row.qty === 0 ? int(1, 10) : 1] : [])]);
    }
    if (!post && type === 12) inventory.push([esc(W.bookTitle()), int(5, 200) + cash, ...(shelf ? [1] : [])]);
    let html = `<h4>${name} <small>[${esc(category)}; ${int(50, 3000)}${esc(cash)}]</small></h4><p><b>Owner:</b> ${owner.html}</p>`;
    if (type === (post ? 9 : 20)) html += W.range(int(2, 10)).map(i => `<p><b>VAULT #${i}:</b> ${esc(W.currency(p, int(1, 10), 3))}; ${esc(W.gem())}</p>`).join('');
    else if (!post && type >= 15 && type <= 19) {
      const job = type === 15 ? 'priest' : type === 18 ? 'wizard' : type === 19 ? 'rogue' : 'warrior';
      html += W.range(int(2, 5)).map(i => `<p><b>${type === 16 ? 'GUARD' : (type === 15 ? 'CHURCH' : category.toUpperCase()) + (i === 1 ? ' LEADER' : ' MEMBER')}:</b> ${W.citizen(p, mode, { job: i === 1 ? 'leader_' + job : job }).html} <b>ARMS &amp; ARMOR:</b> ${esc(W.monsterWeapon({ weapons: job === 'wizard' ? 'small' : 'medium' }, p))}</p>`).join('');
      if (type === 15) html += '<p>The church will cast spells if a donation is made: Healing 50gp; Cure 100gp; Remove Curse 600gp; Resurrection 1,000gp.</p>';
    } else if (inventory.length) html += W.table(['Item', 'Cost', ...(shelf ? ['In Stock'] : [])], inventory);
    return html;
  }
  W.town = function (p, mode) {
    const width = W.number(p.width ?? p.map_wide, 1, 1, 10), height = W.number(p.height ?? p.map_high, 1, 1, 10), own = W.number(p.map_rooms, 0, 0, 1000);
    const rulers = on(p, 'rulers', on(p, 'ruler') ? 1 : 0), built = p.built || 'City';
    const map = own ? { html: '', rooms: W.range(own).map(number => ({ number })), tiles: [] } : W.geomorphMap({ ...p, width, height, keyed: '1', start: 1, type: built, castle: rulers ? '1' : '0' }, mode === 'post' ? p.use_maps === 'Village' ? 'settlement' : 'suburb' : 'settlement');
    const title = p.name || (mode === 'post' ? width * height > 24 ? 'City' : width * height > 16 ? 'Town' : width * height > 8 ? 'Village' : 'Hamlet' : W.name('village'));
    const populate = on(p, 'empty', mode === 'post' ? 1 : 0);
    const buildings = map.rooms.map(room => {
      const empty = populate && W.d(100) > 90;
      const owner = empty ? null : W.citizen(p, mode);
      const family = [];
      if (populate && owner) {
        if (W.d(100) > 50) family.push(W.citizen(p, mode, { race: owner.race, sex: owner.sex === 'Male' ? 'Female' : 'Male' }));
        if (W.d(100) > 70) family.push(W.citizen(p, mode, { race: owner.race, age: 'child' }));
        if (W.d(100) > 90) family.push(W.citizen(p, mode, { race: owner.race, age: 'child' }));
      }
      return { number: room.number, owner, family, type: 0 };
    });
    let html = `<h2>${esc(title)}</h2>${map.html}`;
    if (populate) html += `<section class="town-citizens"><h3>Citizens</h3><p>Each group is associated with a numbered building.</p>${buildings.map(b => `<article class="town-building" data-building="${b.number}"><h4>${b.number}.</h4>${b.owner ? b.owner.html + b.family.map(c => '<p>' + c.html + '</p>').join('') : '<p>This building is empty.</p>'}</article>`).join('')}</section>`;
    const kingdom = own ? own / 10 : width * height, realm = own ? Math.ceil(own / 50) + Math.floor(own / 50) : width + height;
    if (rulers && mode !== 'post') {
      const titles = kingdom >= 60 ? ['King', 'Queen'] : kingdom >= 50 ? ['Grand Duke', 'Grand Duchess'] : kingdom >= 40 ? ['Viceroy', 'Vicereine'] : kingdom >= 30 ? ['Archduke', 'Archduchess'] : kingdom >= 20 ? ['Prince', 'Princess'] : kingdom >= 10 ? ['Duke', 'Duchess'] : kingdom >= 5 ? ['Count', 'Countess'] : built === 'Village' ? ['Lord', 'Lady'] : ['Baron', 'Baroness'];
      const roles = [[titles[0], 'leader_warrior'], ...(W.d(4) > 1 ? [[titles[1], 'leader_wizard']] : []), ...(realm >= W.d(20) ? [['Royal Wizard', 'leader_wizard']] : []), ...(realm >= W.d(15) ? [['Royal Spy', 'leader_rogue']] : []), ...(realm >= W.d(5) ? [['Sheriff', 'leader_warrior']] : []), ...(on(p, 'police') ? [['Royal Guard', 'guard']] : [])];
      html += '<section class="town-rulers"><h3>Rulers</h3>' + roles.map(([role, job]) => `<p><b>${esc(role.toUpperCase())}:</b> ${W.citizen(p, mode, { job }).html} <b>ARMS &amp; ARMOR:</b> ${esc(W.monsterWeapon({ weapons: /wizard/.test(job) ? 'small' : 'medium' }, p))}</p>`).join('') + `<p><b>ROYAL VAULT:</b> ${esc(W.currency(p, realm, 3))}; ${W.range(int(realm + 10, realm + 20)).map(() => esc(W.gem())).join('; ')}</p></section>`;
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
    for (let i = 0; i < economy; i++) {
      if (on(p, 'stores')) assign('Merchants', W.range(mode === 'post' ? W.game(p).slug === 'urthe' ? 11 : 9 : 14));
      if (mode !== 'post') {
        if (on(p, 'banks', mode === 'rules' ? 1 : 0)) assign('Banks', [20]);
        if (on(p, 'guilds')) assign('Guilds', [17, 18, 19]);
        if (on(p, 'police')) assign('Guards', [16]);
        if (on(p, 'church')) assign('Churches', [15]);
      }
    }
    if (mode === 'post' && on(p, 'law')) {
      const officials = shuffle(available.length >= 3 ? available : buildings.filter(b => b.owner)).slice(0, Math.ceil(width * height / 3) + int(2, 5));
      html += '<section class="town-officials"><h3>' + esc(title) + ' Officials</h3>' + officials.map((b, i) => `<p><b>${i === 0 ? buildings.length > 800 ? 'GOVERNOR' : buildings.length > 400 ? 'MAYOR' : 'CONSTABLE' : 'LAW ENFORCEMENT'}:</b> ${b.owner.html} (Lives in #${b.number}).</p>`).join('') + '</section>';
    }
    W.storage.set('last-town', { options: p, mode, title, buildings, tiles: map.tiles });
    return html;
  };
  const common = [f('name', 'Settlement name', 'text'), f('built', 'Map type', 'select', { value: 'City', options: ['City', 'Keep', 'Village'] }), f('width', 'Map width', 'number', { value: 1, min: 1, max: 10 }), f('height', 'Map height', 'number', { value: 1, min: 1, max: 10 }), f('map_rooms', 'Buildings on your own map (0 = generate map)', 'number', { value: 0, min: 0, max: 1000 }), f('empty', 'Populate homes', 'checkbox'), f('rulers', 'Rulers', 'checkbox', { value: 1 }), f('stores', 'Merchants', 'checkbox', { value: 1 }), f('guilds', 'Guilds', 'checkbox', { value: 1 }), f('police', 'Guards', 'checkbox', { value: 1 }), f('church', 'Churches', 'checkbox', { value: 1 }), f('water', 'Sea side / boats in stock', 'checkbox', { value: 1 }), f('stock', 'Item availability (%)', 'number', { value: 70, min: 0, max: 100 }), f('shelf', 'Show quantities in stock', 'checkbox', { value: 1 })];
  for (const [route, mode, title, game] of [['town', 'generic', 'Fantasy Settlements', 'fantasy'], ['ttown', 'tt', 'Tunnels & Trolls Settlements', 'tt5e'], ['wtown', 'rules', 'Fantasy Settlements', 'osric'], ['mtown', 'post', 'Post-Apocalyptic Settlements', 'mutfut']]) {
    const fields = [ { ...W.gameField, value: game }, ...common ];
    if (mode === 'rules') fields.push(f('race', 'Dominant race', 'select', { value: 'Any', options: ['Any', ...racePool({}, mode)] }), f('race_part', 'Dominant race (%)', 'number', { value: 100, min: 0, max: 100 }), f('banks', 'Banks', 'checkbox', { value: 1 }));
    else if (mode === 'post') fields.push(f('money', 'Currency', 'text', { value: 'gp' }), f('techy', 'Technology', 'select', { value: 3, options: [[1, 'Primitive'], [2, 'Advanced'], [3, 'Any']] }), f('use_maps', 'Settlement artwork', 'select', { value: 'Suburb', options: ['Suburb', 'Village'] }), f('law', 'Officials and law enforcement', 'checkbox', { value: 1 }), f('dose', 'More mutations', 'checkbox'), ...Object.entries(species).map(([key, label]) => f('species_' + key, label, 'checkbox', { value: 1 })));
    else fields.push(...kindred.map(k => f('x_race_' + k, cap(k), 'checkbox')));
    if (mode === 'tt') fields.push(f('x_oldway', 'Use simple weapons / armor', 'checkbox'), f('showcase1', 'Show equipment classifications', 'checkbox'), f('showcase2', 'Show equipment statistics', 'checkbox'));
    fields.push(f('dress', 'Dress citizens', 'checkbox', { value: 1 }), f('possessions', 'Citizens carry items', 'checkbox', { value: 1 }));
    W.register(route, title, 'Generate a numbered settlement with citizens, government and merchant inventories using the original geomorphs and store tables.', fields, p => W.town({ game, ...p }, mode));
  }
  W.routes.ftown = W.routes.town;
})(window.WZ, window.WZ_DATA);
