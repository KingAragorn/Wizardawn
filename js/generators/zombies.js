(function (W, D) {
  'use strict';
  const pick = a => W.pick(a), int = (a, b) => W.rng.int(a, b), esc = W.escape, f = W.field;
  const varying = () => ['bright ', 'dark ', 'deep ', 'dirty ', 'dull ', 'light ', 'shiny ', 'vibrant '][int(0, 14)] || '';
  const color = () => { const c = pick(['black', 'blue', 'brown', 'gray', 'green', 'orange', 'purple', 'red', 'tan', 'violet', 'white', 'yellow']); return (c === 'black' ? '' : varying()) + c; };
  const cloth = () => { const quality = ['rotten', 'dirty', 'tattered', 'worn', 'bloody', 'soiled', 'shredded', 'frayed', 'shabby', 'ripped', '', 'rugged', 'scraggy'][int(0, 18)]; return quality ? quality + ', ' : ''; };
  W.scavengeItem = function (type, depth = 0) {
    if (depth > 4) return '';
    if (!['magazine', 'book', 'toy', 'zombie', 'home', 'corpse'].includes(type) && W.d(10) === 1) type = 'generic';
    if (['home', 'dept_store'].includes(type) && W.d(10) === 1) type = 'junk';
    const cell = pick(D.scavenging[type] || D.scavenging.generic);
    if (typeof cell === 'string') return cell;
    if (cell.table) return W.scavengeItem(cell.table, depth + 1);
    const [min, max, multiplier] = cell.quantity, n = int(min, max) * multiplier;
    return cell.before + (cell.formatted ? n.toLocaleString('en-US') : n) + cell.after;
  };
  W.itemCondition = function () {
    const roll = W.d(20);
    return roll === 20 ? 'perfect condition' : roll > 17 ? 'excellent condition' : roll > 14 ? 'good condition' : roll > 10 ? 'fair condition' : 'totally ruined';
  };
  W.zombie = function (corpse = false) {
    const female = W.d(2) === 2, child = W.d(10) === 1, pronoun = female ? 'She' : 'He', possessive = female ? 'her' : 'his';
    const first = pick(D.modernNames[female ? 'todayGirlName' : 'todayManName']), last = pick(D.modernNames.todayLastName);
    const clothes = [], hat = int(0, 19), shirtIndex = int(female ? 5 : 0, female ? 41 : 34);
    if (W.d(4) === 1) clothes.push((hat >= 10 && hat <= 12 ? '' : cloth()) + color() + ' ' + D.zombieTables.hat[hat]);
    let longClothes = [16, 35, 38, 39, 40].includes(shirtIndex);
    if (W.d(10) !== 1) clothes.push(cloth() + color() + ' ' + D.zombieTables.shirt[shirtIndex]); else longClothes = false;
    const pantsIndex = int(female ? 20 : 0, female ? 40 : 22);
    let pants = false;
    if (!longClothes && W.d(10) !== 1) {
      pants = true;
      const name = D.zombieTables.pants[pantsIndex];
      clothes.push(cloth() + (name === 'blue jeans' ? '' : color() + ' ') + name);
    }
    if (W.d(10) !== 1) clothes.push(cloth() + color() + ' socks');
    if (W.d(10) !== 1) {
      const footwear = int(female ? 1 : 0, female ? 19 : 15);
      const shoes = ['loafers', 'boots', 'hiking boots', 'work boots', 'motorcycle boots', 'steel-toed boots', 'cowboy boots', 'tennis shoes', 'athletic shoes', 'flip-flops', 'bowling shoes', 'snow boots', 'high-top shoes', 'sandals', 'dress shoes', 'formal shoes', 'dancing shoes', 'high-heel shoes', 'slingback shoes', 'court shoes'];
      const special = W.d(4) === 1, leather = footwear < 7 || [13, 14, 15].includes(footwear);
      clothes.push(cloth() + (special && leather ? varying() + W.color('leatherColor') : color()) + ' ' + (special ? shoes[footwear] : 'shoes'));
    }
    const hairColor = pick(child ? ['black', 'brown', 'red', 'auburn', 'blonde'] : ['black', 'brown', 'red', 'auburn', 'gray', 'white', 'blonde']);
    const hair = pick(female || child ? ['long', 'short', 'curly'] : ['bald', 'long', 'short', 'curly']);
    let hairText = hair === 'bald' ? `${pronoun} ${corpse ? 'was' : 'is'} bald` : `${pronoun} ${corpse ? 'had' : 'has'} ${hair}, ${hairColor} hair`;
    const beard = !female && !child && W.d(100) > 70, mustache = !female && !child && W.d(100) > 70;
    if (beard || mustache) hairText += ` with a ${pick(['thick', 'long', 'short'])}${hair === 'bald' ? ', ' + hairColor : ''} ${beard ? 'beard and moustache' : 'moustache'}`;
    else if (hair === 'bald') hairText += ' with no facial hair at all';
    const side = pick(['left', 'right']);
    const injuries = [
      `is also missing ${possessive} ${side} arm`, `is also missing ${possessive} ${side} hand`, `is also missing ${int(2, 4)} fingers on ${possessive} ${side} hand`,
      `is also missing ${possessive} ${side} foot`, `is also missing most of the ${side} side of ${possessive} face`,
      `also has a chunk taken out of ${possessive} ${side} leg`, `also has a chunk taken out of ${possessive} ${side} arm`, `also has a chunk taken out of ${possessive} face`,
      `also has a chunk taken out of ${possessive} stomach`, 'has bites all over', 'has bites and cuts all over', 'has bites and scratches all over', 'has some bullet holes in places'
    ];
    let injury = injuries[int(0, 19)];
    const skin = pick(['green', 'light-green', 'dark-green', 'yellowish', 'light-yellow', 'darkened', 'sickly', 'gray', 'grayish-green']);
    const pale = pick(['rotten', 'dirty', 'very rotten', 'muddy', 'bloody', 'blotchy', 'burned', 'gross', 'slimy', 'gory', '', 'gruesome', 'ashen', 'horrible', 'disgusting', 'ghastly', 'hideous', 'grisly', 'revolting']);
    let appearance = `${pronoun} ${corpse ? 'had' : 'has'} ${skin} skin that ${corpse ? 'was' : 'is'} ${pale} in appearance.`;
    let cause = '';
    if (corpse && W.d(6) === 1) {
      const time = `${int(2, 12)} ${pick(['days', 'weeks'])} ago`;
      appearance = pick([`${pronoun} seems to have met ${possessive} end roughly ${time}`, `${pronoun} seems to have died from starvation roughly ${time}`, `${pronoun} seems to have died from natural causes roughly ${time}`, `${pronoun} seems to have died from dehydration roughly ${time}`, `${pronoun} seems to have been killed by a gun shot to the ${pick(['head', 'stomach', 'chest', 'back', 'shoulder', 'thigh', 'arm'])} roughly ${time}`, `${pronoun} seems to have been killed by a ${pick(['blunt weapon', 'bladed weapon', 'knife', 'spiked club', 'severe beating', 'wild animal'])} roughly ${time}`]) + '.';
      injury = '';
    } else if (corpse) cause = 'zombie (' + pick([`seems to have suffered a gun shot to ${possessive} head`, `seems to have suffered from a stab wound to ${possessive} head`, `seems to have suffered a crushing blow to ${possessive} head`, `seems to have had the top of ${possessive} head chopped off`, `seems to have had ${possessive} head smashed in`, `seems to have had ${possessive} skull crushed`]) + ')';
    let clothing = clothes.length ? 'CLOTHING [' + clothes.join(' / ') + '].' : '';
    if (!pants && !longClothes) {
      const nude = pick(['completely', 'totally', 'entirely', 'fully', 'utterly']);
      clothing = pick([`${pronoun} is ${nude} void of any type of clothing.`, `${pronoun} is also ${nude} naked.`, `${pronoun} is also ${nude} nude.`, `${pronoun} is barely covered with ${cloth()}${color()} rags.`, `${pronoun} is somewhat covered with ${cloth()}${color()} rags.`, `${pronoun} is ${nude} covered with ${cloth()}${color()} rags.`]);
    }
    const pocketless = [10, 15, 16, 17, 18, 28, 32, 38, 39].includes(pantsIndex);
    const inventory = !corpse && pants && !pocketless ? 'HOLDING [' + W.range(int(2, 8)).map(() => W.scavengeItem('zombie')).join(' / ') + '].' : '';
    return { first, last, female, child, cause, description: `${first} ${corpse ? 'was' : 'is'} a ${female ? 'female' : 'male'}${child ? ', child' : ''}${corpse ? ' ' + (cause || 'corpse') : ' zombie'} that ${hairText}. ${injury ? pronoun + ' ' + injury + '. ' : ''}${appearance} ${clothing} ${inventory}` };
  };
  W.register('zombies', 'Zombie Hordes', 'Create random zombies for a survival horror game, with descriptions, clothing and carried items. Necropalyx adds combat statistics.', [W.gameField, W.countField('Zombies')], p => W.range(W.count(p, 'amount')).map(() => {
    const zombie = W.zombie(), necro = W.game(p).slug === 'necro';
    const stats = necro ? W.table(['Stamina', 'Protection', 'Hit', 'Attacks', 'Damage', 'Move'], [[int(10, 60), int(0, 5), int(6, 10), '1 bite / 1 claw', pick(['1d4', '1d6', '1d6', '1d6', '1d6', '1d8']) + ' bite / ' + pick(['1d4', '1d4', '1d4', '1d4', '1d6', '1d8']) + ' claw', "12′ walk / 120′ fast walk"]]) : '';
    return `<section class="zombie"><h3>${esc(zombie.first + ' ' + zombie.last)}</h3>${stats}<p>${esc(zombie.description)}</p></section>`;
  }).join(''));
  const buildings = [['random', 'Random'], ['book_store', 'Book Store'], ['cloth_store', 'Clothing Store'], ['dept_store', 'Department Store'], ['electric_store', 'Electronics Store'], ['fire_station', 'Fire Station'], ['gas_store', 'Gas Station/Convenient Store'], ['generic', 'Building'], ['food_store', 'Grocery Store'], ['tool_store', 'Hardware Store'], ['home', 'Home'], ['hospital', 'Hospital/Pharmacy'], ['army_base', 'Military Base/Army Surplus Store'], ['police_station', 'Police Station'], ['restaurant', 'Restaurant'], ['sport_store', 'Sporting Goods Store'], ['toy_store', 'Toy Store']];
  W.register('scavenge', 'Scavenging Lists', 'Generate scavenging finds in buildings and on corpses. Choose the number of sets and the amount of items in each set.', [W.gameField, f('building', 'Building', 'select', { value: 'random', options: buildings }), f('sets', 'Building sets', 'number', { value: 1, min: 0, max: 100 }), f('amount1', 'Minimum items per building', 'number', { value: 1, min: 1, max: 100 }), f('amount2', 'Maximum items per building', 'number', { value: 1, min: 1, max: 100 }), f('csets', 'Corpses', 'number', { value: 0, min: 0, max: 100 }), f('camount1', 'Minimum items per corpse', 'number', { value: 1, min: 1, max: 20 }), f('camount2', 'Maximum items per corpse', 'number', { value: 1, min: 1, max: 20 }), f('condition', 'Condition items', 'checkbox')], p => {
    const sets = W.number(p.sets ?? p.n, 1, 0), corpses = W.number(p.csets, 0, 0);
    const items = (type, min, max) => W.table(['Item', 'Find'], W.range(int(Math.min(min, max), max)).map(i => [i, esc(W.scavengeItem(type)) + (p.condition === '1' ? ' <i>(' + W.itemCondition() + ')</i>' : '')]));
    const sections = W.range(sets).map(() => {
      const building = buildings.find(([key]) => key === p.building) || buildings[0];
      const [type, title] = building[0] === 'random' ? pick(buildings.slice(1)) : building;
      return `<section class="scavenge-building"><h3>${esc(title)}</h3>${items(type, W.number(p.amount1, 1), W.number(p.amount2, 1))}</section>`;
    });
    W.range(corpses).forEach(() => {
      const zombie = W.zombie(true);
      sections.push(`<section class="scavenge-corpse"><h3>${esc(zombie.first + ' ' + zombie.last)}</h3><p>${esc(zombie.description)} Found on or near the corpse is...</p>${items(W.d(4) === 1 ? 'corpse' : 'zombie', W.number(p.camount1, 1, 1, 20), W.number(p.camount2, 1, 1, 20))}</section>`);
    });
    return sections.join('') || '<p>Choose at least one building or corpse.</p>';
  });
})(window.WZ, window.WZ_DATA);
