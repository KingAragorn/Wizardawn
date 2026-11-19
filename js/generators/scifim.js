(function (W, D) {
  'use strict';
  // Port of src/tool_scifim.php. PHP keeps loop variables between creatures; `s` mirrors that shared scope.
  const esc = W.escape, f = W.field, int = (a, b) => W.rng.int(a, b), at = a => a[int(0, a.length - 1)];
  const ucfirst = t => String(t).charAt(0).toUpperCase() + String(t).slice(1);
  const ucwords = t => String(t).replace(/(^|\s)(\S)/g, (m, a, b) => a + b.toUpperCase());
  const vowel = c => 'aeiou'.includes(c) && c !== '';
  const moveFeet = m => m >= 1 && m <= 16 ? 20 + m * 10 : undefined;
  const dmg = ['1d4', '1d4', '1d4', '1d4', '1d4', '1d4', '1d4', '1d6', '1d6', '1d6', '1d6', '1d6', '1d6', '1d8', '1d8', '1d8', '1d8', '2d4', '2d4', '1d10', '1d10', '1d12', '1d12', '2d6', '2d8'];
  const colors = ['blue-green', 'black', 'blue', 'gray', 'green', 'violet', 'red', 'brown', 'orange', 'yellowish-green', 'tan', 'gold', 'yellow', 'purple', 'silver', 'forest-green', 'white'];
  const row = (label, value, extra = '') => `<tr><td width="103"${extra}>${label}</td><td>${value}</td></tr>`;
  W.scifiMutant = function (s) {
    const rows = D.scifim.mutants, ary = at(rows);
    const sleep = int(1, 100) > 50 ? 'any' : ['any', 'day', 'night'][int(0, 2)];
    const dwell = ['desert', 'forest', 'swampy', 'jungle', 'ruins', 'underground', 'radioactive', 'cold or snowy', 'grassland', 'mountainous', 'hilly', 'freshwater', 'sea'][int(0, 12)];
    const sea = dwell === 'freshwater' || dwell === 'sea' ? 1 : 0;
    const pool = rows.filter(r => r[0] !== ary[0] && (sea ? r[5] === 1 : r[4] === 1)), ary4 = at(pool);
    const flies = int(1, 100), wings = flies > 25 && !sea && (ary[6] === 1 || ary4[6] === 1) ? 1 : 0;
    const flylike = wings ? ary4[6] === 1 ? ary4[1] : ary[1] : '';
    const walks = int(1, 100);
    if (walks > 25 && ary4[7] === 1) { s.legs = 0; s.snake = 1; }
    else if (walks > 25 && ary4[5] === 1) { s.legs = 0; s.fish = 1; }
    else { s.legs = [2, 4, 6, 8][int(0, 3)]; s.snake = 0; s.fish = 0; }
    const movement = s.legs === 2 ? int(4, 10) : s.legs === 4 ? int(6, 12) : s.legs === 6 ? int(8, 14) : s.legs === 8 ? int(10, 16) : int(1, 10);
    const skin = ['scales', 'fur', 'feathers', 'skin'][int(0, 3)], color = colors[int(0, 16)];
    const color2 = ['bright', '', 'dark', 'light', 'dull', 'vibrant', 'thick', 'dirty', 'deep', 'rich', 'shiny'][int(0, 10)];
    const iq = ['animal', 'low', 'average', 'high', 'genius'][int(0, 4)];
    const [smarty, willpower] = iq === 'animal' ? ['exhibit animal behavior', int(3, 8)] : iq === 'low' ? ['are not very intelligent', int(3, 13)] : iq === 'average' ? ['have average intelligence', int(3, 18)] : iq === 'high' ? ['are quite intelligent', int(7, 19)] : ['are extremely intelligent', int(11, 21)];
    const eyes = int(1, 8), ecolor = colors[int(0, 16)];
    if (int(1, 100) > 95) s.heads = 2;
    const height = int(3, 12);
    const encs = ['1', '1d2', '1d4', '1d6', '1d8', '1d10', '2d4', '2d6', '2d8', '2d10'], enc = encs[int(0, 9)];
    const lair = int(1, 100) > 30 ? enc : ['1d2', '1d4', '1d6', '1d8', '1d10', '2d4', '2d6', '2d8', '2d10', '3d6', '3d4'][int(encs.indexOf(enc), 10)];
    const alignment = iq === 'animal' ? 'Neutral' : ['Lawful', 'Neutral', 'Chaotic'][int(0, 2)];
    const armor = 10 - int(1, 16);
    let hitdice = int(1, 20), hdMod = 0;
    if (int(1, 100) <= 25) { hdMod = ['+1', '+2', '+3', '+4', '+5', '+6', '+7', '+8', '+9', '+10', '-1', '-2', '-3', '-4', '-5', '-6'][int(0, 15)]; if (+hdMod > 0) hitdice++; }
    const thaco = hitdice < 8 ? 20 - hitdice : hitdice < 10 ? 12 : hitdice < 12 ? 11 : hitdice < 14 ? 10 : hitdice < 16 ? 9 : hitdice < 18 ? 8 : hitdice < 20 ? 7 : hitdice < 22 ? 6 : 5;
    const brave = int(3, 11);
    const cash = n => ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII', 'XIII', 'XIV', 'XV', 'XVI', 'XVII', 'XVIII', 'XIX', 'XX', 'XXI', 'XXII'][n];
    let loot;
    if (iq === 'animal') loot = 'None';
    else if (iq === 'low' && int(1, 100) > 50) loot = 'None';
    else if (iq === 'low') loot = cash(int(0, 4));
    else if (iq === 'average') loot = cash(int(0, 7));
    else if (iq === 'high') loot = cash(5 + int(0, 10));
    else loot = cash(7 + int(0, 14));
    const moving = moveFeet(movement), flying = wings ? moving * 2 : 0;
    const swimming = sea && 75 > int(1, 100) ? moving * 2 : sea ? moving : 0;
    let arms = int(1, 100) > 25 ? 2 : 2 * int(1, 3);
    const fights = Array(10).fill(0);
    let hitters = '', hurts = '';
    const hit = (i, count, word) => { fights[i] = count; hitters = (count > 1 ? count + ' ' + word : word) + ', ' + hitters; for (let c = count; c > 0; c--) hurts = dmg[int(0, 24)] + '/' + hurts; };
    const hand = ['talons', 'claw', 'fist', 'pincer', 'pincers'], head = ['antlers', 'horn', 'horns', 'peck', 'bite', 'tusks', 'tongue'], tail = ['spray', 'stinger', 'ink'];
    if (hand.includes(ary[2])) hit(1, int(1, 100) > 25 && arms === 2 ? arms - 1 : arms, ary[2]);
    if (hand.includes(ary[3])) hit(2, int(1, 100) > 25 && arms === 2 ? arms - 1 : arms, ary[3]);
    if (head.includes(ary[2])) hit(3, int(1, 100) > 25 && s.heads > 1 ? 2 : 1, ary[2]);
    if (head.includes(ary[3])) hit(4, int(1, 100) > 25 && s.heads > 1 ? 2 : 1, ary[3]);
    if (tail.includes(ary4[2])) hit(5, 1, ary4[2]);
    if (tail.includes(ary4[3])) hit(6, 1, ary4[3]);
    if ([ary4[2], ary4[3], ary[2], ary[3]].includes('quills')) hit(7, 1, 'quills');
    if (ary[2] === 'sonic' || ary[3] === 'sonic') hit(8, 1, 'sonic');
    if (ary4[2] === 'tail' || ary4[3] === 'tail') hit(9, 1, 'tail');
    const fight = Math.max(1, fights.reduce((a, b) => a + b, 0));
    hurts = hurts ? hurts.slice(0, -1) : dmg[int(0, 24)];
    if (hitters) hitters = '(' + hitters.slice(0, -2) + ')';
    let myname = int(1, 100) > 50 ? ary[1] : ary4[1];
    myname = myname.slice(0, int(Math.ceil(myname.length / 3), myname.length));
    let suf = W.pick(D.postTables.helpers.mutantName[0][1]).toLowerCase(), callme;
    const v1 = vowel(myname.slice(-1)), v2 = vowel(suf.slice(-1));
    if (v1 && v2) callme = int(1, 100) > 50 ? myname.slice(0, -1) + suf : myname + suf.slice(1);
    else if (!v1 && !v2) callme = myname + (int(1, 5) === 1 ? 'a' : 'u') + suf;
    else callme = myname + suf;
    let weaponUse = '', weaponHas = 0;
    if (fights[1] + fights[2] <= 0) {
      if (iq === 'animal') arms = 0;
      else if (iq === 'low' && int(1, 100) > 25) arms = 0;
      else if (iq === 'average' && int(1, 100) > 50) arms = 0;
    }
    if (arms > 0 && iq === 'low' && int(1, 100) > 70) { weaponHas = 1; weaponUse = 'They sometimes use weapons such as crude spears and clubs. '; }
    else if (arms > 0 && iq === 'average' && int(1, 100) > 50) { weaponHas = 1; weaponUse = 'They sometimes use weapons such as swords and bows. '; }
    else if (arms > 0 && iq === 'high' && int(1, 100) > 30) { weaponHas = 1; weaponUse = 'They sometimes use weapons such as swords, bows and primitive firearms. '; }
    else if (arms > 0 && iq === 'genius' && int(1, 100) > 10) { weaponHas = 1; weaponUse = 'They sometimes use advanced weaponry and other technology. '; }
    const mix = ['a mixture of', 'a mutation of', 'a hybrid of', 'a combination of', 'a cross between', 'a blend of', 'a fusion of', 'a merger of', 'a union of', 'an abomination of', 'a mongrel of', 'a monster in the form of', 'a beast in the form of'][int(1, 13) - 1];
    const limb = ['short ', 'long ', 'muscular ', 'thin ', 'large ', 'small '];
    const adj1 = limb[int(1, 14) - 1] || '', adj2 = limb[int(1, 14) - 1] || '';
    const adjc = int(1, 16);
    if (adjc <= 7) s.adj3 = ['small ', 'large ', 'bulbous ', 'small ', 'large ', 'small ', 'large '][adjc - 1];
    const lands = dwell === 'ruins' ? 'ruins' : dwell === 'sea' ? 'oceans & seas' : dwell === 'freshwater' ? 'lakes & rivers' : dwell + ' areas';
    const save = int(1, 20);
    const feet = n => `${n}' (${n / 2}')`;
    const legs = s.legs, snake = s.snake, fish = s.fish, heads = s.heads;
    let html = `<section class="scifi-creature scifi-mutant"><h3>${esc(ucfirst(callme))}</h3><table class="scifi-stats">`;
    html += row('Appearing:', `${enc} (${lair})`) + row('Alignment:', alignment) + row('Movement:', swimming > 0 && legs === 0 && snake !== 1 ? 'Swim: ' + feet(swimming) : feet(moving));
    if (swimming > 0 && legs > 0) html += row('<i>Swim:&nbsp;</i>', `<i>${feet(swimming)}</i>`, ' align="right"');
    if (flying > 0) html += row('<i>Flying:&nbsp;</i>', `<i>${feet(flying)}</i>`, ' align="right"');
    html += row('Armor Class:', armor) + row('Hit Dice:', hitdice + (hdMod !== 0 ? ' ' + hdMod : '')) + row('Attacks:', fight + ' ' + hitters + (weaponHas ? ' or weapon' : '')) + row('Damage:', hurts + (weaponHas ? ' or by weapon' : '')) + row('THAC0:', thaco) + row('Save:', 'L' + save) + row('Morale:', brave) + row('Intellect:', ucfirst(iq)) + row('Willpower:', willpower) + row('Habitat:', esc(ucwords(lands))) + row('Hoard Class:', loot) + '</table>';
    const text = `The ${ucfirst(callme)} seem to be ${mix} a ${ary[1]} and a ${ary4[1]}. Their upper body is mostly ${ary[1]}${heads > 1 ? ', with two heads,' : ''} and the lower part is mostly ${ary4[1]}. They ${snake === 1 ? 'slither around' : fish === 1 ? 'have fins for swimming' : `have ${legs} ${adj1}legs`}${arms > 0 ? ` and also have ${arms} ${adj2}arms` : ''}. ${wings ? `They also have wings, like a ${flylike}, that allow them to fly around. ` : ''}They are usually about ${height} feet ${legs === 0 ? 'long' : 'tall'} and ${smarty}. Their bodies are covered in ${color !== 'white' && color !== 'black' ? color2 : ''} ${color} colored ${skin}. They have ${eyes} ${s.adj3 || ''}${eyes > 1 ? 'eyes that are' : 'eye that is'} ${ecolor} in color. They inhabit the ${lands} of the world${sleep !== 'any' ? ' and only come out during the ' + sleep : ''}. ${weaponUse}`;
    return html + `<p>${esc(text.replace(/\s+/g, ' ').trim())}</p></section>`;
  };
  W.scifiRobot = function (s) {
    const T = D.scifim;
    let fuel = ['steam', 'clockworks', 'alien technology', 'petroleum', 'electricity', 'radiation', 'plutonium', 'uranium', 'nuclear'][int(0, 8)], tech;
    if (fuel === 'steam' || fuel === 'clockworks') tech = 1;
    else if (fuel === 'alien technology') tech = 4;
    else if (fuel === 'petroleum') tech = 2;
    else if (fuel === 'electricity') tech = int(2, 3);
    else { tech = 3; fuel += ' ' + ['batteries', 'cells', 'clips', 'liquid', 'generators'][int(0, 4)]; }
    const im = fuel === 'steam' || fuel === 'clockworks' ? int(0, 2) : fuel === 'alien technology' ? int(5, 9) : int(0, 9);
    const metal = ['iron', 'aluminium', 'steel', 'silicon steel', 'durasteel', 'crystal alloy', 'adamant', 'promethium', 'unobtainium', 'an uknown metal'][im], armor = 7 - im;
    let move = ['hover', 'legs', 'legs', 'legs', 'legs', 'legs', 'propeller', 'water propulsion', 'rotor', 'stationary', 'tracks', 'treads', 'wheels', 'rockets', 'anti-gravity'][int(0, 14)];
    let weapons = 0, bonus = 0, someadd = 0, a1 = '', a2 = '', a3 = '';
    const more = ['Recorder', 'Fire Extinguisher', 'Storage Unit', 'Arming Mechanism', 'Mounted Tool', 'Voice', 'Mounted Weapon', 'Magnetic Force Field', 'Self-Destruct System', 'Holographic Screen', 'Gravity Field', 'Self-Repair Tools', 'Camouflage', 'Repair Unit', 'Transmitter', 'Remote Control'];
    const armed = x => x === 'Arming Mechanism' || x === 'Mounted Weapon';
    if (int(1, 100) > 40) { s.extra1 = more[int(0, 15)]; if (armed(s.extra1)) weapons++; a1 = s.extra1 + '; '; someadd = 1; }
    if (int(1, 100) > 60 && a1) { s.extra2 = more[int(0, 15)]; if (s.extra1 !== s.extra2) { if (armed(s.extra2)) weapons++; a2 = s.extra2 + '; '; someadd = 2; } }
    if (int(1, 100) > 80 && a2) { s.extra3 = more[int(0, 15)]; if (s.extra1 !== s.extra3 && s.extra2 !== s.extra3) { if (armed(s.extra3)) weapons++; a3 = s.extra3 + '; '; someadd = 3; } }
    const extras = someadd > 0 ? (a1 + a2 + a3).slice(0, -2) : 'None';
    const eyes = T.eyes[int(0, 31)];
    const iq = ['programmed', 'programmed', 'programmed', 'artificial intelligence'][int(0, 3)];
    let software = 0;
    if (iq === 'programmed') { s.job = ['combat', 'combat', 'combat', 'combat', 'combat', 'retrieval', 'spying', 'guarding', 'escorting', 'exploration'][int(0, 9)]; if (move === 'stationary') s.job = 'guarding'; software = 1; }
    const framez = int(1, 100) > 35 ? 0 : move === 'rotor' || move === 'rockets' ? int(63, 68) : move === 'propeller' ? int(69, 75) : move === 'legs' ? int(51, 63) : 0;
    let shape = ' It is a standard robot build and is about ' + int(3, 12) + ' feet in size. ';
    const handsList = ['claws', 'jaws', 'pincers', 'probes', 'grips', 'hands'], hands = handsList[int(0, 5)];
    let attacks = int(1, 2), hitters = attacks + '(' + hands + ')';
    const hurt = ['1d4', '1d4', '1d4', '1d4', '1d4', '1d6', '1d6', '1d6', '1d6', '1d8', '1d8', '1d8', '1d10', '1d10', '1d12'], hurto = hurt[int(0, 14)];
    let hitting = attacks > 1 ? hurto + '/' + hurto : hurto;
    if (int(1, 100) > 75) {
      for (const h of handsList) if (h !== hands) s.xfers = (s.xfers ?? '') + '_' + h;
      const hands2 = s.xfers.split('_')[int(1, 5)], attacks2 = int(1, 2);
      hitters += '/' + attacks2 + '(' + hands2 + ')';
      const hurt2 = hurt[int(0, 14)];
      hitting += attacks2 > 1 ? '/' + hurt2 + '/' + hurt2 : '/' + hurt2;
      attacks += attacks2;
    }
    if (framez > 0) {
      const animal = int(1, 100) > 50 ? 'a humanoid' : ['a bear', 'a beetle', 'a lizard', 'a crab', 'a rat', 'a scorpion', 'a snake', 'a spider', 'a tiger', 'a wolf', 'a worm', 'an ant', 'an ape', 'a dragon', 'a wasp', 'a bird', 'a bat', 'a fly', 'an eel', 'a fish', 'a dolphin', 'a shark', 'a squid', 'a sea serpent', 'a lobster'][int(0, 24)];
      if (animal !== 'a humanoid') {
        const p1 = hurt[int(0, 14)], p2 = hurt[int(0, 14)];
        const water = () => { s.walkers = 0; move = int(1, 100) > 60 ? 'propeller' : 'water propulsion'; };
        if (animal === 'a beetle' || animal === 'an ant') { attacks = 1; hitters = '1(pincer)'; hitting = p1; s.walkers = 6; }
        else if (animal === 'a wasp') { attacks = 1; hitters = '1(stinger)'; hitting = p1; s.walkers = 0; move = 'wings'; }
        else if (animal === 'a lobster' || animal === 'a crab') { attacks = 2; hitters = '2(pincers)'; hitting = p1 + '/' + p1; if (int(1, 100) > 60) { s.walkers = 0; move = 'propeller'; } else if (int(1, 100) > 80) { s.walkers = 0; move = 'water propulsion'; } else { s.walkers = 10; move = 'legs'; } }
        else if (animal === 'a scorpion') { attacks = 3; hitters = '2(pincers)/1(tail)'; hitting = p1 + '/' + p1 + '/' + p2; s.walkers = 8; move = 'legs'; }
        else if (animal === 'a spider') { attacks = 1; hitters = '1(bite)'; hitting = p1; s.walkers = 8; move = 'legs'; }
        else if (animal === 'a bat' || animal === 'a fly') { hitters = '1(bite)'; hitting = p1; s.walkers = 0; move = 'wings'; }
        else if (animal === 'a bird') { hitters = '2(talons)/1(beak)'; attacks = 3; hitting = p1 + '/' + p1 + '/' + p2; s.walkers = 0; move = 'wings'; }
        else if (animal === 'an ape') { attacks = 2; hitters = '2(claws)'; hitting = p1 + '/' + p1; s.walkers = 2; move = 'legs'; }
        else if (animal === 'a squid') { attacks = 8; hitters = '8(tentacles)'; hitting = '8x(' + p1 + ')'; water(); }
        else if (['a sea serpent', 'a shark', 'a dolphin', 'a fish', 'an eel'].includes(animal)) { hitters = '1(jaw)'; attacks = 1; hitting = p1; water(); }
        else if (animal === 'a worm' || animal === 'a snake') { hitters = '1(jaw)'; attacks = 1; hitting = p1; s.walkers = 0; move = 'legs'; }
        else { hitters = '2(claws)/1(jaw)'; attacks = 3; hitting = p1 + '/' + p1 + '/' + p2; s.walkers = 4; move = 'legs'; }
        shape = ' It is built in the form of ' + animal + ' and is about ' + int(3, 12) + ' feet in size. ';
      } else { shape = ' It is built in standard mechanical form and is about ' + int(3, 12) + ' feet in size. '; s.walkers = 2; }
    }
    const walkers = s.walkers ?? '';
    let travel;
    if (walkers === 0 && move === 'legs') travel = 'It has no legs so it mechanically slithers around.';
    else if (['legs', 'tracks', 'treads', 'wheels', 'rockets'].includes(move)) travel = 'It can move around on ' + walkers + ' ' + move + '.';
    else if (['hover', 'propeller', 'water propulsion', 'rotor', 'anti-gravity'].includes(move)) travel = 'It can move around with an installed ' + move + ' device.';
    else if (move === 'wings') travel = 'It can fly around with a set of wings.';
    else travel = 'It is stationary and cannot move around.';
    travel = ' ' + travel + ' ';
    const encounter = int(1, 100) > 50 ? 1 : hurt[int(0, 14)];
    let moving = moveFeet(int(1, 16)); if (move === 'stationary') moving = 0;
    let alienBuilt = '', name = '', ending = s.ending ?? '', withText = s.with ?? '';
    if (fuel === 'alien technology') {
      if (int(1, 100) > 25) { s.aldash = int(1, 100) > 75 ? '-' : ''; s.aliensub = at(T.alienName); }
      name = ucfirst(at(T.alienName) + (s.aldash ?? '') + (s.aliensub ?? ''));
      const b = int(1, 6);
      alienBuilt = b === 1 ? ' (built by an ancient alien race known as the ' + name + ')' : b === 2 ? ' (constructed by an alien race known as the ' + name + ')' : b === 3 ? ' (from a crashed spaceship of an alien race known as the ' + name + ')' : b === 4 ? ' (from an ancient war with aliens known as the ' + name + ')' : b === 5 ? ' (used by a group of aliens known as the ' + name + ')' : ' (left behind by race of aliens known as the ' + name + ')';
    } else {
      let dashit = 0, perc = 100;
      for (let spaces = int(4, 6); spaces > 0; spaces--) {
        perc -= 20;
        if (int(1, 100) > perc && name !== '' && dashit !== 1) { dashit = 1; s.entf = '-'; }
        name = (int(1, 100) > 60 ? String.fromCharCode(97 + int(0, 25)) : String(int(0, 9))) + (s.entf ?? '') + name;
        s.entf = '';
      }
      name = name.toUpperCase();
    }
    if (iq === 'artificial intelligence') {
      const u = int(1, 3);
      [ending, withText] = u === 1 ? [' Robot', 'a robot with advanced AI'] : u === 2 ? [' Cyborg', 'a cybernetic machine with human-like intellect'] : [' Android', 'an android built with artificial intelligence'];
    } else if (software === 1) {
      const ender = [' Robot', ' Bot', ' Droid', ' Mech'][int(1, 4) - 1];
      const jobs = {
        combat: ['a combat', () => { weapons++; return 20; }, ['Battle', 'War', 'Combat', 'Military', 'Fighting', 'Assassin', 'Hunter', 'Assault', 'Attack']],
        retrieval: ['a retrieval', () => { if (int(1, 100) > 75) weapons++; return 90; }, ['Retrieval', 'Recovery', 'Recall', 'Search', 'Capture']],
        spying: ['a spy', () => { if (int(1, 100) > 65) weapons++; return 80; }, ['Spy', 'Tactical Surveillance', 'Surveillance', 'Recon', 'Scout', 'Observation', 'Examination', 'Scanner', 'Discovery']],
        guarding: ['a guard', () => { weapons++; return 20; }, ['Guard', 'Protection', 'Defender', 'Guardian', 'Lookout', 'Sentinel', 'Sentry', 'Defense', 'Security']],
        escorting: ['an escort', () => { if (int(1, 100) > 25) weapons++; return 50; }, ['Escort', 'Attendant', 'Convoy', 'Company', 'Guide', 'Travel']],
        exploration: ['an exploration', () => { if (int(1, 100) > 80) weapons++; return 95; }, ['Exploration', 'Investigation', 'Survey', 'Inspection', 'Probe', 'Research', 'Excavation', 'Pioneer']]
      }[s.job];
      withText = jobs[0] + ender.toLowerCase(); bonus = jobs[1](); ending = ' ' + jobs[2][int(1, jobs[2].length) - 1] + ' ' + ender;
    }
    s.ending = ending; s.with = withText;
    name += ending;
    if (int(1, 100) > bonus) weapons++;
    const wepgold = weapons;
    let robocop = '';
    for (; weapons > 0; weapons--) robocop = at(T.guns[tech - 1]) + '; ' + robocop;
    robocop = robocop.slice(0, -2) || 'None';
    const hitsd = int(1, 10) * 5, saved = int(5, 20);
    const value = hitsd * 100 + attacks * 100 + saved * 50 + someadd * 50 + wepgold * 100;
    let html = `<section class="scifi-creature scifi-robot"><h3>${esc(name)}</h3><table class="scifi-stats">`;
    html += row('Appearing:', encounter) + row('Move:', moving === 0 ? 'None' : `${moving}' (${moving / 2}')`) + row('Armor Class:', armor) + row('Hit Dice:', hitsd) + row('Attacks:', hitters + (wepgold > 0 ? ' or 1(weapon)' : '')) + row('Damage:', hitting + (wepgold > 0 ? ' or by weapons' : '')) + row('Save:', 'L' + saved) + row('THAC0:', ({ 5: 15, 10: 11, 15: 9, 20: 7 })[hitsd] || 5) + row('Extras:', esc(extras)) + row('Weapons:', esc(robocop)) + row('Value:', '$' + value.toLocaleString('en-US')) + '</table>';
    const text = 'The ' + name + alienBuilt + ' is ' + withText + ' that runs on ' + fuel + ' and is made mostly of ' + metal + '. ' + shape + travel + ' It has ' + eyes + '.';
    return html + `<p>${esc(text.replace(/\s+/g, ' ').trim())}</p></section>`;
  };
  W.scifiRetroRobot = function (s, liveinr) {
    const T = D.scifim;
    for (;;) {
      const level = int(1, 20), salvage = Math.round(100 - (level - 1) * 5);
      let dwell = 'Anywhere but Water', weapons = 0;
      let fuel = ['steam', 'clockworks', 'alien technology', 'petroleum', 'electricity', 'radiation', 'plutonium', 'uranium', 'nuclear', 'xormite', 'xormite', 'xormite', 'xormite'][int(0, 12)], tech, stage;
      if (fuel === 'steam' || fuel === 'clockworks') { tech = 1; stage = 'Industrial'; }
      else if (fuel === 'alien technology') { tech = 4; stage = 'Advanced'; }
      else if (fuel === 'petroleum') { tech = 2; stage = 'Industrial'; }
      else if (fuel === 'electricity') { tech = int(2, 3); stage = 'Modern'; }
      else { stage = 'Modern'; tech = 3; fuel += ' ' + ['batteries', 'cells', 'clips', 'liquid', 'generators'][int(0, 4)]; }
      const im = fuel === 'steam' || fuel === 'clockworks' ? int(0, 2) : fuel === 'alien technology' ? int(5, 9) : int(0, 9);
      const metal = ['iron', 'aluminium', 'steel', 'plastoid', 'durasteel', 'crystal alloy', 'adamant', 'promethium', 'unobtainium', 'unknown metal'][im];
      const armor = im < 3 ? int(im + 1, im + 2) : im < 9 ? int(im + 2, im + 3) : int(5, 15);
      let move = ['hover', 'legs', 'legs', 'legs', 'legs', 'legs', 'propeller', 'water propulsion', 'rotor', 'stationary', 'tracks', 'treads', 'wheels', 'rockets', 'anti-gravity'][int(0, 14)];
      const iq = ['programmed', 'programmed', 'programmed', 'artificial intelligence'][int(0, 3)];
      let software = 0;
      if (iq === 'programmed') { s.job = ['combat', 'combat', 'combat', 'combat', 'combat', 'retrieval', 'spying', 'guarding', 'escorting', 'exploration'][int(0, 9)]; if (move === 'stationary') s.job = 'guarding'; software = 1; }
      const size = int(3, 12);
      let shape = ' It is a standard robot build and is about ' + size + ' feet in size. ';
      const hands = ['claw', 'jaw', 'pincer', 'fist'][int(0, 3)];
      let attacks = int(1, 2), hitters = attacks > 1 ? attacks + ' ' + hands + 's' : attacks + ' ' + hands;
      const hurt = ['1d4', '1d4', '1d4', '1d4', '1d4', '1d6', '1d6', '1d6', '1d6', '1d8', '1d8', '1d8', '1d10', '1d10', '1d12'], hurto = hurt[int(0, 14)];
      let hitting = attacks > 1 ? hurto + ' ' + hands + ' / ' + hurto + ' ' + hands : hurto + ' ' + hands;
      const animal = int(1, 100) > 30 ? 'a humanoid' : ['a bear', 'a beetle', 'a lizard', 'a crab', 'a rat', 'a scorpion', 'a snake', 'a spider', 'a tiger', 'a wolf', 'a worm', 'an ant', 'an ape', 'a dragon', 'a wasp', 'a bird', 'a bat', 'a fly', 'an eel', 'a fish', 'a dolphin', 'a shark', 'a squid', 'a sea serpent', 'a lobster'][int(0, 24)];
      if (animal !== 'a humanoid') {
        const p1 = hurt[int(0, 14)], p2 = hurt[int(0, 14)];
        const water = () => { s.walkers = 0; move = int(1, 100) > 60 ? 'propeller' : 'water propulsion'; };
        if (animal === 'a beetle' || animal === 'an ant') { attacks = 1; hitters = '1 pincer'; hitting = p1 + ' pincer'; s.walkers = 6; }
        else if (animal === 'a wasp') { attacks = 1; hitters = '1 stinger'; hitting = p1 + ' stinger'; s.walkers = 0; move = 'wings'; }
        else if (animal === 'a lobster' || animal === 'a crab') { attacks = 2; hitters = '1 pincer'; hitting = p1 + ' pincer'; if (int(1, 100) > 60) { s.walkers = 0; move = 'propeller'; } else if (int(1, 100) > 80) { s.walkers = 0; move = 'water propulsion'; } else { s.walkers = 10; move = 'legs'; } }
        else if (animal === 'a scorpion') { attacks = 3; hitters = '1 pincer / 1 tail'; hitting = p1 + ' pincer / ' + p2 + ' tail'; s.walkers = 8; move = 'legs'; }
        else if (animal === 'a spider') { attacks = 1; hitters = '1 bite '; hitting = p1 + ' bite'; s.walkers = 8; move = 'legs'; }
        else if (animal === 'a bat' || animal === 'a fly') { hitters = '1 bite'; hitting = p1 + ' bite'; s.walkers = 0; move = 'wings'; }
        else if (animal === 'a bird') { hitters = '1 talon / 1 beak'; attacks = 3; hitting = p1 + ' talon / ' + p2 + ' beak'; s.walkers = 0; move = 'wings'; }
        else if (animal === 'an ape') { attacks = 2; hitters = '1 claw'; hitting = p1 + ' claw'; s.walkers = 2; move = 'legs'; }
        else if (animal === 'a squid') { attacks = 8; hitters = '2 tentacles '; hitting = p1 + ' tentacles'; water(); }
        else if (['a sea serpent', 'a shark', 'a dolphin', 'a fish', 'an eel'].includes(animal)) { hitters = '1 jaw '; attacks = 1; hitting = p1 + ' jaw'; water(); }
        else if (animal === 'a worm' || animal === 'a snake') { hitters = '1 jaw '; attacks = 1; hitting = p1 + ' jaw'; s.walkers = 0; move = 'legs'; }
        else { hitters = '1 claw / 1 jaw'; attacks = 3; hitting = p1 + ' claw / ' + p2 + ' jaw'; s.walkers = 4; move = 'legs'; }
        shape = ' It is built in the form of ' + animal + ' and is about ' + size + ' feet in size. ';
      } else { shape = ' It is built in standard robotic form and is about ' + size + ' feet in size. '; s.walkers = 2; }
      const walkers = s.walkers, ground = ['legs', 'tracks', 'treads', 'wheels', 'rockets'].includes(move);
      let travel;
      if (walkers === 0 && move === 'legs') travel = 'It has no legs so it mechanically slithers around.';
      else if (ground && walkers > 1) travel = 'It can move around on ' + walkers + ' ' + move + '.';
      else if (ground) travel = 'It can move around on 2 ' + move + '.';
      else if (['hover', 'propeller', 'anti-gravity'].includes(move)) travel = 'It can hover around with an installed ' + move + ' device.';
      else if (move === 'water propulsion' || move === 'rotor') { travel = 'It moves only in water with an installed ' + move + ' device.'; dwell = 'Water Only'; }
      else if (move === 'wings') { travel = 'It can fly around with a set of wings.'; dwell = 'Outdoors Only'; }
      else travel = 'It is stationary and cannot move around.';
      travel = ' ' + travel + ' ';
      let moving = moveFeet(int(1, 16)); if (move === 'stationary') moving = 0;
      let alienBuilt = '', name = '';
      if (fuel === 'alien technology') {
        if (int(1, 100) > 25) { s.aldash = int(1, 100) > 75 ? '-' : ''; s.aliensub = at(T.alienName); }
        name = ucfirst(at(T.alienName) + (s.aldash ?? '') + (s.aliensub ?? ''));
        const b = int(1, 6);
        alienBuilt = [' (built by an ancient alien race known as the ', ' (constructed by an alien race known as the ', ' (from a crashed spaceship of an alien race known as the ', ' (from an ancient war with aliens known as the ', ' (used by a group of aliens known as the ', ' (left behind by race of aliens known as the '][b - 1] + name + ')';
      } else {
        let dashit = 0, perc = 100;
        for (let spaces = int(4, 6); spaces > 0; spaces--) {
          perc -= 20;
          if (int(1, 100) > perc && name !== '' && dashit !== 1) { dashit = 1; s.entf = '-'; }
          name = (int(1, 100) > 60 ? String.fromCharCode(97 + int(0, 25)) : String(int(0, 9))) + (s.entf ?? '') + name;
          s.entf = '';
        }
        name = name.toUpperCase();
      }
      if (iq === 'artificial intelligence') {
        const u = int(1, 3);
        [s.ending, s.with] = u === 1 ? [' Robot', 'a robot with advanced AI'] : u === 2 ? [' Cyborg', 'a cybernetic machine with human-like intellect'] : [' Android', 'an android built with artificial intelligence'];
        s.softwares = '2 Skills';
      } else if (software === 1) {
        const ender = [' Robot', ' Bot', ' Droid', ' Mech'][int(1, 4) - 1];
        const job = {
          combat: ['a combat', () => { weapons++; return 20; }, ['Battle', 'War', 'Combat', 'Military', 'Fighting', 'Assassin', 'Hunter', 'Assault', 'Attack'], '2 Military Skills'],
          retrieval: ['a retrieval', () => { if (int(1, 100) > 75) weapons++; return 90; }, ['Retrieval', 'Recovery', 'Recall', 'Search', 'Capture'], '1 Technical Skill and 1 Military Skill'],
          spying: ['a spy', () => { if (int(1, 100) > 65) weapons++; return 80; }, ['Spy', 'Tactical Surveillance', 'Surveillance', 'Recon', 'Scout', 'Observation', 'Examination', 'Scanner', 'Discovery'], '2 Spying Skills'],
          guarding: ['a guard', () => { weapons++; return 20; }, ['Guard', 'Protection', 'Defender', 'Guardian', 'Lookout', 'Sentinel', 'Sentry', 'Defense', 'Security'], '2 Military Skills'],
          escorting: ['an escort', () => { if (int(1, 100) > 25) weapons++; return 50; }, ['Escort', 'Attendant', 'Convoy', 'Company', 'Guide', 'Travel'], '1 Technical Skill and 1 Academic Skill'],
          exploration: ['an exploration', () => { if (int(1, 100) > 80) weapons++; return 95; }, ['Exploration', 'Investigation', 'Survey', 'Inspection', 'punch', 'Research', 'Excavation', 'Pioneer'], '2 Academic Skills']
        }[s.job];
        s.with = job[0] + ender.toLowerCase(); s.weaponBonus = job[1](); s.ending = ' ' + job[2][int(1, job[2].length) - 1] + ' ' + ender; s.softwares = job[3];
      }
      name += s.ending ?? '';
      if (int(1, 100) > (s.weaponBonus ?? 0)) weapons++;
      let botWeapon = '', botHurt = '';
      if (weapons > 0) [botWeapon, botHurt] = at(T.retroWeapons[tech - 1]);
      const color = ['black', 'blue', 'gray', 'green', 'red', 'rust', 'orange', 'gold', 'bronze', 'silver', 'white'][int(0, 10)];
      const dut = ['metallic', 'dull', 'shiny', 'smooth', 'rough', 'light', 'dark', 'metallic'][int(0, 7)];
      const hue = ['colored', 'tinted', 'shaded', 'hued', 'painted', 'coated', 'looking'][int(0, 6)];
      const r = T.retroRobotLevels[Math.min(level, 20) - 1].map(([a, b]) => int(a, b));
      let [stamina, hit, energy, , radiation] = r;
      stamina = level < 5 ? stamina : Math.round(stamina * (level < 9 ? 1.25 : level < 13 ? 1.5 : level < 17 ? 1.75 : 2));
      if (botWeapon) { hitters += ' or 1 ' + botWeapon.toLowerCase(); hitting += ' or ' + botHurt.toLowerCase(); }
      const cost = Math.round(level / 2), tier = Math.min(Math.max(cost, 1), 10) - 1;
      const value = [200, 600, 1000, 1600, 2600, 4200, 6800, 11000, 17800, 28800][tier] + cost * 200 + 500, grade = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X'][tier];
      const run = liveinr === 1 ? dwell === 'Water Only' || dwell === 'Outdoors Only' : liveinr === 2 ? dwell === 'Anywhere but Water' : liveinr === 3 ? dwell === 'Anywhere but Water' || dwell === 'Outdoors Only' : true;
      if (!run) continue;
      let html = `<section class="scifi-creature scifi-robot"><h3>${esc(name)}</h3><table class="scifi-stats">`;
      html += row('Condition:', stamina) + row('Protection:', armor) + row('Hit:', hit) + row('Attacks:', esc(hitters)) + row('Damage:', esc(hitting)) + row('Speed:', moving === 0 ? 'None' : moving + "'") + row('Stage:', stage) + row('Size:', size + "'") + row('Defenses:', `E:${energy}/R:${radiation}`) + row('Found In:', dwell) + row('Level:', level) + row('Software:', grade + ' in ' + esc(s.softwares ?? '')) + row('Salvage:', salvage + '%') + row('Value:', value.toLocaleString('en-US') + 'xm') + '</table>';
      const text = 'The ' + name + alienBuilt + ' is ' + (s.with ?? '') + ' that runs on ' + fuel + ' and is made mostly of a ' + dut + ', ' + color + ' ' + hue + ', ' + metal + '. ' + shape + travel;
      return html + `<p>${esc(text.replace(/\s+/g, ' ').trim())}</p></section>`;
    }
  };
  const plainColor = () => ['black', 'blue', 'gray', 'green', 'red', 'brown', 'orange', 'yellow', 'tan', 'purple', 'white', 'gold', 'silver', 'bronze', 'copper', 'platinum'][int(0, 15)];
  const leatherColor = () => ['black', 'blue', 'gray', 'green', 'red', 'brown', 'brown', 'brown', 'brown', 'brown', 'brown', 'brown', 'brown', 'brown', 'orange', 'yellow', 'tan', 'purple', 'white'][int(0, 18)];
  const designColor = () => ['gold', 'silver', 'scarlet', 'amber', 'azure', 'emerald', 'indigo', 'ivory', 'jade', 'maroon', 'royal blue', 'violet'][int(0, 11)];
  // PAgetWeapon($type, "Broken Urthe") from functions/weapon_equipped.php; the scifim aliens always pass Broken Urthe, so the (x2)/(x3) modifiers are blank.
  const paWeapon = type => at(D.paWeapons[[8, 0, 1, 3, 5, 7][type] ?? 8]).map(part => typeof part === 'string' ? part : part.quantity ? int(...part.quantity) : '').join('');
  // Housing tables (tool_scifim.php lines 1838-2160): [primitive, how_primitive 1, how_primitive 2, industrial, modern, advanced, texts].
  // Text kinds: g/k/i = "They live in {size}{group|knight|industry} ...", m/a = modern/advanced industry towns, M3/A3 = shore, floating or sky; `$` is the size word again.
  const cityTables = {
    forest: [[0, 4], [4, 5], [5, 8], [9, 10], 11, 12, ['g|within the large tree roots', 'g|high in the trees', 'g|within burrows in the ground', 'g|within tents made of leaves and branches', 'g|within tents made of furs and skins', 'g|within houses built from trees', 'g|within wood and stone houses', 'k|within wood and stone houses', 'k|within stone houses', 'i|built with wood and stone', 'i|built with wood, stone, and metal', 'm', 'a']],
    hills: [[0, 2], [2, 4], [5, 7], [5, 9], 10, 11, ['g|within tents made of leaves and grasses', 'g|within burrows in the ground', 'g|within tents made of leaves and grasses', 'g|within tents made of furs and skins', 'g|within wood and mud houses', 'k|within wood and plaster houses', 'k|within stone houses', 'k|within stone houses and buildings', 'i|built with concrete', 'i|built with concrete and metal', 'm', 'a']],
    mountains: [[0, 2], [2, 3], [3, 6], [6, 8], 9, 10, ['g|within mountain caves', 'g|within tents made of furs and skins', 'g|within tents made of furs and skins', 'g|within wood and mud houses', 'k|within wood and plaster houses', 'k|within stone houses', 'k|within stone houses and buildings', 'i|built with concrete', 'i|built with concrete and metal', 'm', 'a']],
    swamps: [[0, 1], [1, 3], [4, 6], [5, 8], 9, 10, ['g|within tents made of leaves and branches', 'g|within tents made of furs and skins', 'g|within houses built from trees', 'g|within wood and stone houses', 'k|within wood and stone houses', 'k|within stone houses', 'k|within stone houses and buildings', 'i|built with wood and stone', 'i|built with wood, stone, and metal', 'm', 'a']],
    deserts: [[0, 2], [2, 4], [5, 7], [7, 9], 10, 11, ['g|under the sand dunes', 'g|within tents made of furs and skins', 'g|within tents made of furs and skins', 'g|within houses built from mud and sticks', 'g|within mud and stone houses', 'k|within plaster and stone houses', 'k|within stone houses', 'k|within stone houses and buildings', 'i|built with wood and stone', 'i|built with wood, stone, and metal', 'm', 'a']],
    snow: [[0, 3], [2, 5], [5, 9], [9, 11], 12, 13, ['g|within small caves', 'g|within burrows under the ice and snow', 'g|within ice stacked homes', 'g|within tents made of furs and skins', 'g|within tents made of furs and skins', 'g|within houses built from trees', 'g|within wood and stone houses', 'k|within wood and stone houses', 'k|within stone houses', 'k|within stone houses and buildings', 'i|built with wood and stone', 'i|built with wood, stone, and metal', 'm', 'a']],
    underground: [[0, 1], [1, 3], [2, 3], [3, 4], 5, 6, ['g|within $ caves', 'g|within $ caverns with tents made of furs and skins', 'g|within $ caverns with tents made of furs and skins', 'g|within $ caverns with homes carved into the stone', 'g|within $ caverns with stone structures', 'm| in gigantic caverns below the surface', 'a| in gigantic caverns below the surface']],
    both: [[0, 3], [3, 6], [5, 9], [9, 12], [13, 14], [15, 16], ['g|within $ underwater caves', 'g|within $ underwater caverns', 'g|within tents on the shore made of leaves and branches', 'g|within tents on the shore made of furs and skins', 'g|within houses built from trees on the shore', 'g|within $ underwater caverns with homes carved into the stone', 'g|within $ underwater caverns with stone structures', 'g|within wood and stone houses on the shore', 'k|within stone houses on the shore', 'k|within stone houses and buildings on the shore', 'i|built with wood and stone on the shore', 'g|within $ underwater caverns with stone structures', 'i|built with wood, stone, and metal on the shore', 'M3', 'm| under the water', 'A3', 'a| under the water']],
    swim: [[0, 1], [0, 2], [0, 3], 3, 4, 5, ['g|within $ underwater caves', 'g|within $ underwater caverns', 'g|within $ underwater caverns with homes carved into the stone', 'g|within $ underwater caverns with stone structures', 'm| under the water', 'a| under the water']],
    shore: [[0, 1], [1, 2], [3, 5], [6, 7], 8, 9, ['g|within tents on the shore made of leaves and branches', 'g|within tents on the shore made of furs and skins', 'g|within houses built from trees on the shore', 'g|within wood and stone houses on the shore', 'k|within stone houses on the shore', 'k|within stone houses and buildings on the shore', 'i|built with wood and stone on the shore', 'i|built with wood, stone, and metal on the shore', 'M3', 'A3']]
  };
  // Name list from tool_scifim.php lines 939-975: speciesName() with random vowel/consonant padding, then sorted.
  W.scifiAlienNames = function (count) {
    const cons = 'bcdfghjklmnprstvwxyz', vow = 'aeiou', isV = c => vow.includes(c) && c !== '';
    const pad = name => {
      const top = name.charAt(0), end = name.slice(-1);
      if (isV(end) && int(1, 4) !== 1) name += cons[int(0, 19)];
      else if (!isV(end) && int(1, 4) !== 1) name += vow[int(0, 4)];
      if (isV(top) && int(1, 3) !== 1) name = cons[int(0, 19)] + name;
      else if (!isV(top) && int(1, 3) !== 1) name = vow[int(0, 4)] + name;
      return name;
    };
    const names = [];
    for (let i = 0; i < count; i++) {
      let name = pad(String(at(D.postTables.helpers.speciesName[0][1])).toLowerCase());
      if (int(1, 2) === 1) name = pad(name);
      names.push(name);
    }
    return names.sort();
  };
  const slimeColor = () => ['dark', 'blue', 'gray', 'black', 'green', 'red', 'brown', 'orange', 'yellow', 'purple', 'clear', 'white'][int(0, 11)];
  const beamColor = () => ['red', 'blue', 'green', 'orange', 'yellow', 'purple', 'white'][int(0, 6)];
  const fogColor = () => ['dark', 'blue', 'gray', 'gray', 'gray', 'gray', 'green', 'red', 'brown', 'orange', 'yellow', 'purple', 'white', 'white', 'white', 'white'][int(0, 15)];
  // specialAbility() from tool_scifim.php, including its fixed RNG call order.
  W.scifiSpecialAbility = function (level, game, eyes, swims) {
    if (level < 1) level = int(1, 20);
    const half = Math.ceil(level / 2 + 1), fifth = Math.ceil(level / 5), feet = () => int(1, 4) * 5;
    const w1 = ['by bending light around them', 'by chemically changing their color'][int(0, 1)];
    const w2 = ['hit with energy based weapons', 'hit with blunt objects', 'they feel threatened'][int(0, 2)];
    const w3 = ['they want to escape a dangerous situation', 'they are preparing for a stealthy attack'][int(0, 1)];
    let w4 = ['powder substance on themselves', 'slimy substance on themselves'][int(0, 1)];
    if (swims > 0) w4 = 'slimy substance on themselves';
    const w5 = ['die', 'suffer 1d4 damage', 'suffer 1d6 damage', 'suffer 1d8 damage', 'suffer 2d4 damage', 'suffer 2d6 damage', 'suffer 2d8 damage', 'suffer 3d6 damage', 'suffer 2d10 damage', 'suffer 2d12 damage', 'suffer 3d8 damage'][int(0, Math.round(level / 2))] ?? 'suffer 1d4 damage';
    const [w6, w6save] = [['electrical', 'energy'], ['freezing', 'energy'], ['scorching', 'energy'], ['irradiated', 'radiation']][int(0, 3)];
    let w7 = ['1d4', '1d4', '1d6', '1d8', '2d4'][int(0, Math.round(level / 5))] ?? '1d4';
    if (int(1, 3) === 1) w7 += '+' + int(1, 4);
    const w8 = ['suffer a -' + fifth + ' to attack rolls', 'fall down gagging for ' + fifth + ' rounds.', 'forced to retreat.', 'be put into a trance for ' + fifth + ' rounds.', 'fall unconscious for ' + fifth + ' rounds.'][int(0, 4)];
    const w9 = eyes === 1 ? 'eye' : eyes > 1 ? 'eyes' : 'mouth';
    const w10 = ['spikes', 'quills', 'bristles', 'needles'][int(0, 3)];
    const w11 = eyes > 0 && int(1, 2) === 1 ? eyes === 1 ? 'eye' : 'eyes' : 'body';
    const k12 = int(0, 9);
    const w12 = k12 === 0 ? 'mercury' : 'a ' + slimeColor() + ' ' + ['', 'acid', 'bile', 'poison', 'flammable liquid', 'liquid, that can cause a euphoric effect if ingested, ', 'liquid, that can cure many illnesses if ingested, ', null, 'liquid, that has healing properties if rubbed on wounds, ', 'liquid, that has a numbing effect if rubbed on skin, '][k12];
    const w12f = k12 === 7 ? w12.replace(/null$/, 'liquid, that can slowly kill one over a period of ' + int(2, 15) + ' days if ingested, ') : w12;
    const w13 = [() => 'become electrified for ' + half + ' rounds, where anyone touching it must make an energy defense test or ' + w5 + '.', () => 'emit an electrical field for ' + half + ' rounds, where anyone within ' + (level + 4) + ' feet of it must make an energy defense test or ' + w5 + '.', () => 'emit an electro-magnetic field for ' + half + ' rounds, where any electronic device within ' + (level + 4) + ' feet will be deactivated.'][int(0, 2)]();
    const w14 = ['an acidic substance that will corrode items or cause ' + w7 + ' damage if touched.', 'a slippery substance that will allow it to fit through smaller openings or escape one`s grasp.', 'an hallucinogenic substance that will cause one to hallucinate for ' + half + ' rounds unless the can make a mind defense test.', 'a numbing substance that will cause one to drop their items, unable to pick them up for about ' + half + ' rounds unless they can make a defense test for toxin.', 'a paralytic substance that will cause one to fall over, unable to move for about ' + half + ' rounds unless they can make a defense test for toxin.', 'a sticky substance that will cause melee weapons or others to stick to it for about ' + half + ' rounds.', 'a toxic substance that will cause ' + w7 + ' damage if touched, unless one makes a defense test for toxins.', 'a smelly substance that will cause anyone that touches it to smell horrible for about ' + half + ' days unless they chemically clean themselves.', 'an irradiates substance that will cause ' + w7 + ' damage if touched, unless one can make a defense test against radiation.'][int(0, 8)];
    const w15 = [() => 'is acidic and will corrode items or cause ' + w7 + ' damage to those within the ' + feet() + ' foot cloud.', () => 'will cause blindness to those within the ' + feet() + ' foot cloud unless they can make a defense test for toxin.', () => 'will cause one to hallucinate for ' + half + ' rounds unless the can make a mind defense test.', () => 'will cause eye irritation to those within the ' + feet() + ' foot cloud, suffering a -' + fifth + ' to attack rolls unless they can make a defense test for toxin.', () => 'will cause paralysis, unable to move for about ' + (level / 2 + 1) + ' rounds unless they can make a defense test for toxin.', () => 'is toxic and will cause ' + w7 + ' damage to those within the ' + feet() + ' foot cloud, unless one makes a defense test for toxins.', () => 'smells horrible and will cause anyone within the ' + feet() + ' foot cloud to stink for about ' + half + ' days unless they chemically clean themselves.', () => 'is irradiated and will cause ' + w7 + ' damage to anyone within the ' + feet() + ' foot cloud, unless one can make a defense test against radiation.', () => 'will cause those to fall asleep for ' + half + ' rounds if within the ' + feet() + ' foot cloud, and only if they fail to make a defense test for toxin.'][int(0, 8)]();
    const w16 = ['has an ability to control the minds of opponents for ' + half + ' rounds unless they can make a mind defense test.', 'has an ability to reflect any energy based projectiles (lasers and plasma weapons) back at the attacker, allowing them to make a range attack back at the attacker.', 'has an ability to track prey that has been in the area recently and no more than ' + (level * 100 + 100).toLocaleString('en-US') + ' feet away.', 'has a long sticky tongue that can grab nearby objects, disarm enemies, or grab prey.', 'has the ability to stretch their limbs up to ' + level * 5 + ' feet, allowing them to get to objects or opponents from a greater distance.'][int(0, 4)];
    const w17 = ['another humanoid', 'a rock', 'a plant', 'a harmless creature'][int(0, 3)];
    const range = half * 5;
    const w18 = ['an electrical breath weapon that has a range of ' + range + ' feet, where anyone hit by it, that fails to make a defense test for energy, will ' + w5 + '.', 'a frost breath weapon that has a range of ' + range + ' feet, where anyone hit by it will suffer ' + w7 + ' damage.', 'a flaming breath weapon that has a range of ' + range + ' feet, where anyone hit by it will suffer ' + w7 + ' damage.', 'a plasma breath weapon that has a range of ' + range + ' feet, where anyone hit by it, that fails to make a defense test for energy, will ' + w5 + '.', 'a poison breath weapon that has a range of ' + range + ' feet, where anyone hit by it, that fails to make a defense test for toxins, will ' + w5 + '.', 'a sonic breath weapon that has a range of ' + range + ' feet, where anyone hit by it will suffer ' + w7 + ' damage.', 'a radiation breath weapon that has a range of ' + range + ' feet, where anyone hit by it, that fails to make a defense test for radiation, will ' + w5 + '.'][int(0, 6)];
    const effect = w6 === 'electrical' ? 'turn into a pile of dust' : w6 === 'freezing' ? 'turn into a solid block of ice' : w6 === 'scorching' ? 'turn into a pile of melted goo' : 'turn into a scorched corpse';
    const w19 = ['causes ' + w7 + ' damage unless one can make a defense test against ' + w6save, 'causes ' + w7 + ' damage, but will do double damage unless one can make a defense test against ' + w6save, 'causes one to ' + effect + ' unless one can make a defense test against ' + w6save][int(0, 2)];
    const two = (a, b) => int(1, 2) === 1 ? a() : b();
    const cases = [
      () => 'can change their color to match the surrounding area, with a ' + int(1, 5) + '0% chance to be noticed by others. They do this ' + w1 + '.',
      () => 'can grow ' + int(5, 10) + '0% larger when ' + w2 + '.',
      () => 'can shrink ' + int(5, 10) + '0% smaller when ' + w3 + '.',
      () => 'has a poisonous ' + w4 + ' where, if one touches them, must make a defense test for toxin or ' + w5 + '.',
      () => 'can turn almost invisible, with a ' + int(1, 5) * 5 + '% chance to be noticed by others. They do this ' + w1 + '.',
      () => 'can emit a beam of ' + beamColor() + ' ' + w6 + ' energy from their ' + w9 + ' that ' + w19 + '.',
      () => 'can heal up to ' + w7 + ' damage when hit with energy-based weapons.',
      () => 'can change their appearance to look like a ' + w17 + ' for ' + half + ' turns unless they are attacked.',
      () => two(() => 'can have their body protrude ' + w10 + ' that are poisonous to the touch where one must make a defense test for toxin or ' + w5 + '.', () => 'can have their body protrude ' + w10 + ' that can cause ' + w7 + ' damage if touched.'),
      () => two(() => 'can launch a sticky ' + slimeColor() + ' substance from their mouth as a separate ranged attack...which will immobilize the victim for ' + half + ' rounds.', () => 'can launch a sticky ' + slimeColor() + ' substance from their mouth as a separate ranged attack...which will immobilize the victim until ' + level * 5 + ' points of damage can be done to the substance to free the victim.'),
      () => 'can emit a ' + beamColor() + ' light from their ' + w11 + ' that will light up a ' + int(2, 20) * 5 + ' foot area for ' + half + ' turns.',
      () => 'has ' + w12f + ' in their system instead of normal blood.',
      () => two(() => 'can cause an illness if physically touched that will cause ' + w7 + ' damage per day if not treated.', () => 'can cause an illness if physically touched that will cause ' + w7 + ' damage per day, and death occurs after ' + int(4, 10) + ' days, if not treated.'),
      () => 'can ' + w13,
      () => 'can excrete ' + w14,
      () => two(() => 'can super heat their external temperature for ' + half + ' rounds where anyone within ' + feet() + ' feet will suffer ' + w7 + ' damage per round.', () => 'can super cool their external temperature for ' + half + ' rounds where anyone within ' + feet() + ' feet will suffer ' + w7 + ' damage per round.'),
      () => w16,
      () => 'can regenerate themselves at the rate of ' + level * 2 + ' points per turn',
      () => 'can change the molecular structure of their bodies and pass through objects up to ' + half + ' feet at a single time.',
      () => { const t = int(1, 3); return t === 1 ? 'can teleport up to ' + level * 10 + ' feet at a single time.' : t === 2 ? 'can turn into a ' + fogColor() + ' colored gas for up to ' + half + ' rounds before having to turn back to normal.' : 'can turn into a ' + slimeColor() + ' colored liquid for up to ' + half + ' rounds before having to turn back to normal.'; },
      () => 'can produce a force field around themselves for ' + half + ' rounds and can absorb up to ' + level * 4 + ' damage.',
      () => two(() => 'can mimic any sound they hear, often confusing others and luring them toward them.', () => 'can throw any sound they make, often confusing others and distracting them.'),
      () => eyes > 0 && int(1, 2) === 1 ? 'can see perfectly in total darkness, without the need for a light source.' : eyes > 0 ? 'can see through objects that are no more than ' + half + ' feet thick.' : swims > 0 ? 'can release a ' + slimeColor() + ' ink that will consume a ' + level * 10 + ' foot area, causing others to be unable to see while in it.' : 'will explode if they are killed, leaving quite a mess.',
      () => two(() => 'can emit an odor for ' + half + ' rounds, where anyone breathing it in must make a defense test for toxin or ' + w8 + '.', () => 'can emit a fragrance for ' + half + ' rounds, where anyone nearbry breathing it in must make a defense test for toxin or be lured in by it.'),
      () => 'can breath a ' + fogColor() + ' colored gas that ' + w15,
      // PHP case 25 echoes the bare constant `word18` (a typo for $word18); the intended breath weapon text is used.
      () => 'has ' + w18,
      () => 'can move around without making a single sound.'
    ];
    return W.retroText(cases[int(0, swims > 0 ? 22 : 26)](), { game }, 0);
  };
  const xcolors2 = ['bright ', '', 'dark ', 'light ', 'dull ', 'vibrant ', 'thick ', 'faded ', 'deep ', 'rich ', 'shiny '];
  const tint = () => xcolors2[int(0, 10)] + colors[int(0, 16)];
  // One alien creature from the non-Mutant Future branch (tool_scifim.php lines 980-2297).
  W.scifiAlien = function (s, callme, game) {
    let flies = 0, swims = 0, legs = 0, arms = 0, skinSpec = 0, mySimilar = '';
    const xsmart = int(1, 100);
    let stage = xsmart > 25 ? 'Animal' : xsmart > 16 ? 'Primitive' : xsmart > 9 ? 'Industrial' : xsmart > 5 ? 'Modern' : 'Advanced';
    const specluk = ['almost similar to', 'somewhat similar to', 'almost like', 'somewhat like', 'close to', 'roughly like', 'relatively like', 'like a mutated version of', 'like a deformed'][int(0, 8)];
    let species = ['amphibian', 'bird', 'fish', 'invertebrate', 'mammal', 'reptile'][int(0, 5)];
    if (species === 'amphibian') { swims = 1; legs = 1; s.skinPicker = int(4, 7); }
    else if (species === 'bird') { if (int(1, 10) > 1) flies = 1; legs = 1; s.skinPicker = int(12, 15); }
    else if (species === 'mammal') { legs = 1; s.skinPicker = int(4, 11); }
    // PHP compares the stage name with 25 (`$stage > 25`), which is false for every stage under PHP 7, so reptiles never gain swimming.
    else if (species === 'reptile') { int(1, 10); s.skinPicker = int(0, 3); }
    if (species === 'invertebrate') {
      const k = int(0, 5);
      if (k === 0) species = 'insect';
      else if (k === 1 || k === 2) { species = k === 1 ? 'worm' : 'slug'; legs = 98; s.skinPicker = int(4, 7); if (int(1, 4) !== 1) stage = 'Instinctual'; }
      else if (k === 3) { species = 'squid'; swims = 1; if (int(1, 2) === 1) legs = 1; s.skinPicker = int(4, 7); }
      else if (k === 4) { species = 'crab'; if (int(1, 2) === 1) species = 'lobster'; swims = 1; legs = 1; }
      else { species = 'arachnid'; if (int(1, 2) === 1) species = 'spider'; legs = 8; if (int(1, 3) === 1) legs = 6; }
    }
    if (species === 'reptile') { if (int(1, 6) === 1) { species = 'snake'; legs = 99; } else { species = 'lizard'; legs = 1; } }
    if (species === 'insect') {
      const k = int(0, 7);
      if (k === 0) { species = 'moth'; if (int(1, 2) === 1) species = 'butterfly'; flies = 1; legs = 1; s.skinPicker = 16; }
      else if (k === 1) { species = 'grasshopper'; if (int(1, 2) === 1) species = 'cricket'; if (int(1, 2) === 1) flies = 1; legs = 1; s.skinPicker = 16; }
      else if (k === 2 || k === 3) { species = k === 2 ? 'dragonfly' : 'fly'; flies = 1; legs = 1; s.skinPicker = 16; }
      else if (k === 4) { species = 'bee'; if (int(1, 2) === 1) species = 'wasp'; flies = 1; legs = 1; s.skinPicker = 16; }
      else if (k === 5) { species = 'ant'; legs = 1; s.skinPicker = 16; }
      else if (k === 6) { species = 'beetle'; if (int(1, 3) === 1) flies = 1; legs = 1; s.skinPicker = 16; }
      else { species = 'catepillar'; legs = 6; s.skinPicker = int(4, 7); if (int(1, 2) === 1) { species = 'centipede'; legs = int(2, 10) * 10; s.skinPicker = 16; } }
    }
    if (species === 'fish') {
      swims = 1; s.skinPicker = int(0, 3);
      if (int(1, 4) === 1) {
        const k = int(0, 6);
        species = ['shark', 'whale', 'hippocampus', 'seal', 'eel', 'turtle', 'ray'][k];
        s.skinPicker = k === 0 ? int(0, 3) : int(4, 7);
        if (k === 2) skinSpec = 1; else if (k === 5) skinSpec = 2; else if (k === 6) s.skinPicker = 16;
      }
      if (xsmart < 26 && int(1, 5) === 1) legs = 1;
    }
    if (species === 'mammal') {
      const k = int(0, 11);
      let similar = ['cat', 'dog', 'bear', 'horse', 'cow', 'monkey', 'deer', 'armadillo', 'elephant', 'hippo', 'rhino', 'pig'][k];
      const alt = { cat: ['tiger', 'lion'], dog: ['wolf'], cow: ['bull'], monkey: ['gorilla'], deer: ['moose', 'elk'], armadillo: ['badger', 'beaver'], pig: ['boar'] }[similar];
      if (alt) { if (int(1, 2) === 1) similar = alt[0]; if (alt[1] && int(1, 4) === 1) similar = alt[1]; }
      if (int(1, 3) === 1) mySimilar = 'They look ' + specluk + ' a ' + similar + '.';
    }
    if (species === 'amphibian') { const similar = ['frog', 'salamander'][int(0, 1)]; if (int(1, 3) === 1) mySimilar = 'They look ' + specluk + ' a ' + similar + '.'; }
    if (int(1, 10) === 1) s.skinPicker = int(0, 16);
    const picker = s.skinPicker ?? 0;
    let skin = ['scales', 'small scales', 'thick scales', 'large scales', 'squishy skin', 'fleshy skin', 'leathery skin', 'tough skin', 'fur', 'thick fur', 'short fur', 'long fur', 'feathers', 'long feathers', 'short feathers', 'thick feathers', 'exoskeleton'][picker];
    if (skinSpec === 1) skin += ' over bony plates'; else if (skinSpec === 2) skin += ' with a ' + tint() + ' shell';
    const colorA = xcolors2[int(0, 10)], colorB = colors[int(0, 16)], skinColor = colorA + colorB;
    const mySkin = picker === 16 ? 'They are covered in a ' + skinColor + ' ' + skin : 'They are covered in ' + skinColor + ' ' + skin;
    let fingers = int(2, 10), myWings, myHands;
    const wingTable = (tiers) => { const fl = int(1, 100); for (const [min, make] of tiers) if (fl > min) return make(); return tiers[tiers.length - 1][1](); };
    const sameB = t => () => xcolors2[int(0, 10)] + colorB + ' ' + t, anyC = t => () => tint() + ' ' + t, plain = t => () => t;
    if (picker <= 3) { myWings = wingTable([[50, plain('leathery')], [30, sameB('leathery')], [20, anyC('leathery')], [10, plain('feathery')], [5, anyC('feathery')], [-1, sameB('feathery')]]); myHands = ['scaly claws', 'scaly hands'][int(0, 1)]; }
    else if (picker <= 7) { myWings = wingTable([[50, plain('leathery')], [30, sameB('leathery')], [-1, anyC('leathery')]]); myHands = ['claws', 'hands'][int(0, 1)]; }
    else if (picker <= 11) { const wung = ['furry', 'hairy', 'fuzzy'][int(0, 2)]; myWings = wingTable([[50, plain('leathery')], [30, sameB('leathery')], [20, anyC('leathery')], [10, plain(wung + ' skinned')], [5, anyC(wung + ' skinned')], [-1, sameB(wung + ' skinned')]]); myHands = ['furry claws', 'furry hands', 'claws', 'hands'][int(0, 3)]; }
    else if (picker <= 15) { myWings = wingTable([[50, plain('feathery')], [30, sameB('feathery')], [20, anyC('feathery')], [10, plain('leathery')], [5, anyC('leathery')], [-1, sameB('leathery')]]); myHands = ['talons', 'talons', 'claws', 'hands'][int(0, 3)]; }
    else { myWings = wingTable([[50, plain('leathery')], [30, sameB('leathery')], [-1, anyC('leathery')]]); myHands = ['claws', 'hands'][int(0, 1)]; }
    if (stage === 'Animal') {
      const sharpHand = ['sharp ', 'huge ', 'small ', 'blunt ', 'crushing ', 'razor sharp ', 'monstrous ', '', ''][int(0, 8)];
      const sharpClaw = ['sharp ', 'huge ', 'small ', 'razor sharp ', 'monstrous ', '', ''][int(0, 6)];
      const webbed = () => { myHands = sharpClaw + 'claws'; if (int(1, 2) === 1) myHands = sharpClaw + 'webbed claws'; };
      const bug = () => { myHands = sharpClaw + 'claws'; if (int(1, 3) === 1) { fingers = 0; myHands = sharpHand + 'pincers'; } };
      if (['amphibian', 'squid', 'fish', 'shark', 'hippocampus', 'eel', 'turtle', 'ray'].includes(species)) webbed();
      else if (species === 'bird') { myHands = sharpClaw + 'talons'; if (int(1, 4) === 1) myHands = sharpClaw + 'claws'; }
      else if (['mammal', 'reptile', 'snake', 'lizard', 'whale', 'seal'].includes(species)) myHands = sharpClaw + 'claws';
      else if (['crab', 'lobster', 'arachnid', 'spider'].includes(species)) { fingers = 0; myHands = sharpHand + 'pincers'; }
      else if (['moth', 'butterfly', 'grasshopper', 'cricket', 'dragonfly', 'fly', 'bee', 'wasp', 'ant', 'beetle', 'catepillar', 'centipede'].includes(species)) bug();
    }
    const lastFoot = myHands.split(' ').pop();
    const swiper = lastFoot === 'talons' ? 'talon' : lastFoot === 'hands' ? 'fist' : lastFoot === 'pincers' ? 'pincer' : 'claw';
    if ((legs === 1 && int(1, 100) > 75) || species === 'bird') legs = [2, 2, 2, 2, 2, 4, 4, 6, 8][int(0, 8)];
    else if (legs === 1) legs = [2, 4, 4, 4, 4, 4, 6, 6, 8][int(0, 8)];
    const legSize = ['', '', '', 'short ', 'long ', 'large ', 'small '];
    const movement = (legs === 2 ? int(4, 10) : legs === 4 ? int(6, 12) : legs === 6 ? int(8, 14) : legs === 8 ? int(10, 16) : int(4, 16)) * 10;
    const moveSwim = int(6, 16) * 10, moveFly = int(6, 16) * 10;
    let mover = 0;
    // PHP sets the slither text for 99 legs, then its `else if ($legs > 0)` (paired with the 98 test) overwrites it.
    if (legs === 99) { s.myLegs = "They slither around, moving " + movement + "' per turn."; mover = 1; }
    if (legs === 98) { s.myLegs = "They use their muscles to push themselves along, moving " + movement + "' per turn."; mover = 1; }
    else if (legs > 0) {
      s.myLegs = "They move about " + movement + "' per turn on " + legs + ' ' + legSize[int(0, 6)] + 'legs'; mover = 1;
      s.myLegs += stage === 'Animal' && swiper !== 'pincer' ? ' with ' + myHands + ' for feet.' : '.';
    }
    if (swims > 0 && mover > 0) s.myLegs += " They can also swim at about " + moveSwim + "' per turn.";
    else if (swims > 0) { s.myLegs = "They can swim at about " + moveSwim + "' per turn."; mover = 1; }
    if (int(1, 100) > 96) flies = 1;
    if (flies > 0 && mover > 0) s.myLegs += ' They have ' + myWings + " wings that allow them to fly at about " + moveFly + "' per turn.";
    else if (flies > 0) s.myLegs = "They can fly at about " + moveFly + "' per turn with their " + myWings + ' wings.';
    const myDwell = swims > 0 ? int(10, 11) : game === 'urthe' ? int(0, 9) : int(1, 9);
    let dwell = ['wastelands', 'forests', 'hills', 'mountains', 'plains & grasslands', 'swamps & marshes', 'deserts', 'jungles', 'snow & icy regions', 'underground areas', 'rivers & lakes', 'oceans'][myDwell];
    if (myDwell === 6 && int(1, 4) === 1) dwell = 'deserts & tropics';
    if (myDwell === 7 && int(1, 4) === 1) dwell = 'jungles & tropics';
    if (myDwell >= 10 && flies === 0) swims = 1;
    if (int(1, 100) <= 50) int(0, 2);
    let myDaily = ['They inhabit the ' + dwell + ' and are more active during the day.', 'They inhabit the ' + dwell + ' and are more active during the night.', 'They inhabit the ' + dwell + ' and are only active during the day.', 'They inhabit the ' + dwell + ' and are only active during the night.'][int(0, 8)] ?? 'They inhabit the ' + dwell + ' and are active during varying times of day or night.';
    if (dwell === 'underground areas') myDaily = 'They inhabit the ' + dwell + ' like caves and tunnels.';
    let pFood = ['leafy plants', 'plant roots', 'fruits', 'vegetables', 'shrubs and bushes', 'tree bark', 'succulent plants', 'grasses'][int(0, 7)];
    let mFood = ['meat', 'smaller creatures', 'live creatures', 'creature carcasses', 'insects', 'reptiles', 'birds', 'any meat'][int(0, 7)];
    if ((swims > 0 && legs === 0) || (swims > 0 && legs > 0 && int(1, 3) === 1)) { pFood = ['seaweed', 'algae'][int(0, 1)]; mFood = ['meat', 'smaller creatures', 'shellfish', 'fish', 'reptiles', 'any meat'][int(0, 5)]; }
    let myDiet = ['They are carnivores, eating ' + mFood + ' as their main diet.', 'They are herbivores, eating ' + pFood + ' as their main diet.', 'They are omnivores, eating ' + mFood + ' or ' + pFood + '.'][int(0, 2)];
    if (['Primitive', 'Industrial', 'Modern', 'Advanced'].includes(stage)) myDiet = ['They are mainly carnivores, eating various meats.', 'They are mainly herbivores, eating various fruits and vegetables.', 'They are mainly omnivores, eating various fruits, vegetables, and meat.', 'They are mainly omnivores, eating various fruits, vegetables, and meat.'][int(0, 3)];
    const beast = stage === 'Animal' || stage === 'Instinctual';
    if (['slug', 'worm', 'snake'].includes(species) && beast) arms = 0;
    else if (beast && int(1, 10) !== 1) arms = 0;
    else if (int(1, 100) > 25) arms = 2;
    else arms = 2 * int(1, 3);
    const armSize = ['', 'short ', 'long ', 'muscular ', 'thin ', 'large ', 'small '];
    const myArms = arms === 0 ? '' : fingers === 0 ? 'They have ' + arms + ' ' + armSize[int(0, 6)] + 'arms with ' + myHands + '.' : 'They have ' + arms + ' ' + armSize[int(0, 6)] + 'arms with ' + fingers + ' digit ' + myHands + '.';
    let high = 0, wide = 0, long = 0, humanoid = 0;
    const xsize = int(1, 100), dolphin = () => { if (species === 'whale') species = 'dolphin'; };
    if (beast) {
      if (xsize > 40) { high = int(1, 5); dolphin(); } else if (xsize > 20) { high = int(3, 8); dolphin(); } else if (xsize > 10) { high = int(5, 12); dolphin(); } else if (xsize > 5) high = int(15, 30); else high = int(20, 60);
    } else if (xsize > 80) { high = int(1, 5); dolphin(); } else if (xsize > 30) { high = int(3, 8); dolphin(); } else if (xsize > 2) { high = int(5, 12); dolphin(); } else high = int(15, 30);
    const longOnes = ['squid', 'catepillar', 'centipede', 'eel', 'snake', 'slug', 'worm'];
    const stretch = div => { long = high; high = long / div; if (high < 1) high = 1; if (high === long) long = high * int(3, 12); wide = high; if (species === 'centipede') wide = high / 3; else if (species === 'squid') wide = high + int(-2, 2); };
    const flat = (a, b) => { long = high; high = long / int(a, b); if (high < 1) high = 1; wide = high / int(2, 3); };
    if (beast) {
      if (longOnes.includes(species)) stretch(int(8, 12));
      else if (['hippocampus', 'seal', 'shark', 'dolphin', 'whale', 'fish', 'lobster', 'lizard'].includes(species)) flat(5, 10);
      else if (['turtle', 'amphibian', 'crab', 'spider', 'arachnid'].includes(species)) flat(2, 3);
      else if (species === 'bird') { wide = high / 5; long = high * int(2, 3); }
      else if (species === 'mammal') { wide = high / 2; long = high * int(3, 5); }
      else if (['moth', 'butterfly', 'grasshopper', 'cricket', 'dragonfly', 'wasp', 'ant'].includes(species)) { long = high; high = long / int(3, 6); if (high < 1) high = 1; wide = high; }
      else if (['fly', 'bee', 'beetle'].includes(species)) { long = high; high = long / int(2, 4); if (high < 1) high = 1; wide = high * int(1, 2); }
      else if (species === 'ray') { wide = high; long = high * int(1, 3); high = high / 10; }
    } else if (longOnes.includes(species)) stretch(2);
    else humanoid = 1;
    high = Math.floor(high); wide = Math.floor(wide); long = Math.floor(long);
    const wing = high + long + int(1, 5);
    const unit = v => v < 1 ? int(4, 11) + '"' : v + "'";
    const sHigh = unit(high), sWide = unit(wide), sLong = unit(long);
    const mes = ['roughly ', 'usually ', 'normally ', '', 'about '];
    let mySize, myBig;
    if (humanoid > 0) { mySize = 'that is ' + mes[int(0, 4)] + sHigh + ' tall'; myBig = sHigh + ' tall'; }
    else if (sHigh === sWide) { mySize = 'that is ' + mes[int(0, 4)] + sWide + ' wide, and ' + sLong + ' long'; myBig = sWide + ' wide&nbsp;/&nbsp;' + sLong + ' long'; }
    else { mySize = 'that is ' + mes[int(0, 4)] + sHigh + ' tall, ' + sWide + ' wide, and ' + sLong + ' long'; myBig = sHigh + ' tall&nbsp;/&nbsp;' + sWide + ' wide&nbsp;/&nbsp;' + sLong + ' long'; }
    if (flies > 0) mySize += ", with a wingspan of " + wing + "'";
    const xeyes = [0, 1, 2, 2, 2, 2, 3, 4, 6, 8];
    let eyes = xeyes[int(0, 9)];
    const eyeColor = (() => { const c = colors[int(0, 16)]; return xcolors2[int(0, 10)] + c; })();
    const eyeSize = ['', 'small ', 'large ', 'bulbous ', 'small ', 'large ', 'small ', 'large '];
    if (flies > 0 || swims > 0) eyes = xeyes[int(1, 9)];
    const myEyes = eyes === 1 ? 'and they can see with a single ' + eyeSize[int(0, 7)] + eyeColor + ' eye.' : eyes > 0 ? 'and they see with ' + eyes + ' ' + eyeSize[int(0, 7)] + eyeColor + ' eyes.' : ['and they cannot see but sense heat patterns in the area.', 'and they cannot see but feel vibrations in the area.', 'and they cannot see but emit a sonar sound to detect objects in the area.', 'and they cannot see but listen to their surroundings.', 'and they cannot see but touch and feel everything around them instead.'][int(0, 4)];
    const level = int(1, 20);
    const pmin = [-2, -1, 0, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 10][level - 1];
    const protection = int(pmin, pmin + 8);
    const hit = 10 - Math.floor((level - 1) / 2) - int(-2, 2);
    const stamina = level * 8 + int(0, level);
    const saves = [[5, 3, 4, 5, 4, 1], [6, 4, 5, 6, 5, 1], [6, 5, 5, 7, 6, 2], [7, 6, 6, 8, 7, 2], [7, 7, 6, 8, 8, 3], [8, 8, 6, 9, 9, 3], [8, 9, 7, 9, 9, 4], [9, 10, 7, 10, 10, 4], [9, 10, 7, 10, 10, 5], [9, 10, 8, 11, 11, 5], [10, 11, 8, 11, 11, 6], [10, 11, 8, 12, 12, 6], [10, 11, 9, 12, 12, 7], [11, 12, 9, 13, 13, 8], [11, 12, 9, 13, 13, 9], [11, 12, 10, 14, 13, 10], [12, 13, 10, 14, 14, 11], [12, 13, 11, 15, 14, 12], [12, 13, 11, 15, 14, 13], [13, 14, 12, 16, 15, 14]][level - 1];
    let [saveE, saveM, saveR, saveS, saveT] = saves.slice(0, 5).map(v => v + int(-1, 1));
    const dmgMax = saves[5];
    if (stage === 'Instinctual') saveM = '-'; else if (stage === 'Animal') saveM -= 3; else if (stage === 'Primitive') saveM -= 2; else if (stage === 'Industrial') saveM -= 1; else if (stage !== 'Modern') saveM += 2;
    if (dwell === 'wastelands') saveR = int(16, 19);
    const sep = '&nbsp;/&nbsp;';
    const defenses = 'E:' + saveE + sep + 'M:' + saveM + sep + 'R:' + saveR + sep + 'S:' + saveS + sep + 'T:' + saveT;
    let myAttack = '', myDamage = '', myWeapon = '';
    const dice = ['1d4', '1d6', '1d8', '2d4', '1d10', '1d12', '2d6', '2d8', '1d20', '2d10', '2d12', '3d6', '3d8', '3d10', '3d12'];
    const mods = ['+1', '+1', '+1', '+1', '+1', '+1', '+1', '+1', '+2', '+2', '+2', '+2', '+2', '+2', '+2', '+2', '+2', '+2', '+3', '+3', '+3', '+3', '+4'];
    const roll = () => { let d = dice[int(0, dmgMax)]; if (int(1, 10) === 1) d += mods[int(0, 22)]; return d; };
    const damageDone = roll();
    if (stage === 'Instinctual') { myAttack = '1 bite'; myDamage = damageDone; }
    else if (stage === 'Animal') {
      if (int(1, 4) !== 1 || (legs === 0 && myArms === '') || swiper === 'fist' || swiper === 'pincer') { myAttack = '1 bite'; myDamage = damageDone; }
      if ((int(1, 4) === 1 || myAttack === '') && ((legs > 0 && legs < 9) || myArms !== '') && swiper !== 'fist' && swiper !== 'pincer') {
        const swipe = roll();
        if (myAttack !== '') { myAttack += sep + '1 ' + swiper; myDamage += sep + swipe; }
        else if (int(1, 4) === 1) { myAttack = '2 ' + swiper + 's'; myDamage = swipe + ' each'; }
        else { myAttack = '1 ' + swiper; myDamage = swipe; }
      }
    } else {
      if (int(1, 2) === 1 && (swiper === 'talon' || swiper === 'claw')) { myAttack = '1 ' + swiper; myDamage = damageDone; }
      if (myAttack === '' || int(1, 4) !== 1 || stage !== 'Primitive') {
        if (myAttack !== '') { myAttack += sep + '1 weapon'; myDamage += sep + 'weapon'; } else { myAttack = '1 weapon'; myDamage = 'weapon'; }
        let guns;
        // PHP keeps $how_primitive from earlier creatures; it only changes for Primitive weapon users.
        if (stage === 'Primitive') { s.howPrimitive = int(0, 2); guns = paWeapon(s.howPrimitive); }
        else if (stage === 'Industrial') guns = paWeapon(3);
        else if (stage === 'Modern') guns = paWeapon(int(3, 4));
        else guns = paWeapon(int(4, 5));
        const reason = [' as their combat weapon.', ' for the battles they fight.', ' as their favored weapon.', ' for any attacks.', ' for attacking enemies.', ' as their primary weapon.'][int(0, 5)];
        myWeapon = 'They often carry a ' + guns.toLowerCase() + reason;
      }
      if (myAttack === '') { myAttack = '1 ' + swiper; myDamage = damageDone; }
    }
    const garbColor = [plainColor, leatherColor, designColor][int(0, 2)]();
    const hp = s.howPrimitive;
    let myGarb = '';
    if (stage === 'Primitive') {
      if (hp === 1) myGarb = [() => ' and often wear leathery type armor made from nearby animals.', () => ' and often wear animal furs they collected from nearby animals.', () => ' and often wear ' + leatherColor() + ' colored leathery type armor.', () => ' and often wear ' + leatherColor() + ' colored animal furs.'][int(0, 3)]();
      else if (hp === 2) myGarb = [() => ' and often wear hand-stitched clothing.', () => ' and often wear medieval looking armors.', () => ' and often wear ragged clothing.', () => ' and often wear leathery type armor made from nearby animals.', () => ' and often wear ' + leatherColor() + ' colored leathery type armor.'][int(0, 4)]();
      else myGarb = [' and often wear leafy plants over some of their bodies.', ' and often wear animal furs they collected from nearby animals.', ' and often paint parts of their bodies in some type of ' + garbColor + ' color.', '.', '.'][int(0, 4)];
      if (swims > 0) myGarb = '';
    } else if (stage === 'Industrial') {
      myGarb = [' and often wear finely-stitched clothing.', ' and often wear rugged clothing.', ' and often wear steel plated military type armors that are mostly ' + garbColor + ' in color.', ' and often wear colorfully designed clothing.', ' and often wear a similar cloth uniform that is mostly ' + garbColor + ' in color.'][int(0, 4)];
      if (swims > 0) myGarb = [' and often wear skin tight, water resistant, clothing of varying colors.', '.', '.', '.', '.', ' and often wear a skin tight uniform that is mainly ' + garbColor + ' in color.'][int(0, 5)];
    } else if (stage === 'Modern' || stage === 'Advanced') {
      myGarb = [' and often wear finely-stitched clothing.', ' and often wear average clothing.', ' and often wear modern military type armor that is mostly ' + garbColor + ' in color.', ' and often wear colorfully designed clothing.', ' and often wear a similar cloth uniform that is mostly ' + garbColor + ' in color.'][int(0, 4)];
      if (swims > 0) myGarb = [' and often wear skin tight, water resistant, clothing of varying colors.', ' and often wear a plastoid type armor that is mostly ' + garbColor + ' in color.', ' and often wear a silicoid type armor that is mostly ' + garbColor + ' in color.', '.', ' and often wear a skin tight uniform that is mainly ' + garbColor + ' in color.'][int(0, 4)];
    }
    let myCity = '';
    if (!beast) {
      const G = ['tribes', 'communities', 'groups', 'settlements', 'villages'][int(0, 4)];
      const K = ['towns', 'communities', 'groups', 'settlements', 'villages'][int(0, 4)];
      const I = ['towns', 'cities', 'forts', 'villages'][int(0, 3)];
      int(0, 2); // $my_city_tech is rolled but never shown.
      const Z = ['large ', 'small ', '', ''][int(0, 3)];
      const water = dwell === 'rivers & lakes' || dwell === 'oceans';
      const key = ['forests', 'jungles', 'jungles & tropics', 'deserts & tropics'].includes(dwell) ? 'forest' : ['hills', 'plains & grasslands'].includes(dwell) ? 'hills' : water ? (flies > 0 && swims > 0 ? 'both' : swims > 0 ? 'swim' : 'shore') : ({ mountains: 'mountains', 'swamps & marshes': 'swamps', deserts: 'deserts', 'snow & icy regions': 'snow', 'underground areas': 'underground' })[dwell];
      const table = key && cityTables[key];
      if (table) {
        const [prim, h1, h2, ind, mod, adv, texts] = table, r = v => Array.isArray(v) ? int(...v) : v;
        let city;
        if (stage === 'Primitive') { city = int(...prim); if (hp === 1) city = int(...h1); else if (hp === 2) city = int(...h2); }
        else city = r(stage === 'Industrial' ? ind : stage === 'Modern' ? mod : adv);
        const t = texts[city];
        const [kind, rest = ''] = t.split('|');
        const tail = rest.replace('$', Z);
        if (kind === 'M3' || kind === 'A3') myCity = 'They live in ' + (kind === 'M3' ? 'modern looking ' : 'technologically advanced ') + Z + I + [' on the shore', ' floating on the water', ' floating in the sky above'][int(0, 2)];
        else if (kind === 'm') myCity = 'They live in modern looking ' + Z + I + tail;
        else if (kind === 'a') myCity = 'They live in technologically advanced ' + Z + I + tail;
        else myCity = 'They live in ' + Z + ({ g: G, k: K, i: I })[kind] + ' ' + tail;
      }
    }
    const birth = int(1, 100), births = birth < 20 ? 0 : birth < 40 ? 1 : birth < 60 ? 2 : birth < 80 ? 3 : birth < 96 ? 4 : birth < 97 ? 5 : birth < 98 ? 6 : birth < 99 ? 7 : birth < 100 ? 8 : 9;
    const lower = callme.toLowerCase(), candle = () => ['black', 'blue', 'gray', 'green', 'red', 'brown', 'orange', 'yellow', 'purple', 'white'][int(0, 9)];
    const contact = 'They reproduce by making some form of physical contact with another biological species, ';
    const myLiveOn = [
      () => 'They reproduce by laying up to ' + int(2, 10) + ' ' + candle() + ' eggs that have a ' + int(1, 12) + ' month incubation period before they hatch.',
      () => 'They reproduce by laying a single ' + candle() + ' egg that has a ' + int(1, 12) + ' month incubation period before it hatches.',
      () => 'They reproduce by giving birth to a single baby ' + lower + ', which the female would have carried up to ' + int(2, 12) + ' months before giving birth.',
      () => 'They reproduce by giving birth to about ' + int(2, 10) + ' ' + lower + ' babies, which the female would have carried up to ' + int(2, 12) + ' months before giving birth.',
      () => contact + 'where the victim would slowly become a ' + lower + ' after about ' + int(1, 12) * 10 + ' days.',
      () => contact + 'which puts an egg into the new host. After about ' + int(1, 12) * 10 + ' days of incubation, the egg will hatch and burst through the body of the host where a new ' + lower + ' is born.',
      () => contact + 'which puts an egg into the new host. After about ' + int(1, 12) * 10 + ' days of incubation, the egg will hatch and the baby ' + lower + ' will eat the host from the inside out.',
      () => contact + 'which puts eggs into the new host. After about ' + int(1, 12) * 10 + ' days of incubation, the eggs will hatch and burst through the body of the host where the new ' + lower + ' babies are born.',
      () => contact + 'which puts eggs into the new host. After about ' + int(1, 12) * 10 + ' days of incubation, the eggs will hatch and the ' + lower + ' babies will eat the host from the inside out.',
      () => 'They reproduce when there is swelling begins on various parts of themselves that will pop off after about ' + int(1, 12) * 10 + ' days, giving birth up to ' + int(2, 10) + ' ' + lower + ' babies.'][births]();
    const mySpecial = int(1, 3) === 1 ? 'The ' + lower + ' ' + W.scifiSpecialAbility(level, game, eyes, swims) : '';
    const myStyle = 'The ' + lower + ' is some type of ' + (beast ? '' : 'humanoid ') + species + ' ' + mySize + '.';
    let speed = '';
    if (legs > 0) speed += movement + "'&nbsp;&nbsp;";
    if (swims > 0) speed += 'Swim: ' + moveSwim + "'&nbsp;&nbsp;";
    if (flies > 0) speed += 'Fly: ' + moveFly + "'";
    const text = [myStyle, mySimilar, mySkin, myEyes, s.myLegs ?? '', myArms, myDaily, myDiet, myLiveOn, mySpecial, myCity + myGarb, myWeapon].join(' ');
    return { dwell, stats: [['Stamina:', stamina], ['Protection:', protection], ['Hit:', hit], ['Attacks:', myAttack], ['Damage:', myDamage], ['Speed:', speed], ['Stage:', stage], ['Size:', myBig], ['Defenses:', defenses], ['Habitat:', ucwords(dwell)], ['Level:', level]], text };
  };
  const amount = v => W.number(v, 0, 0, 100);
  W.register('scifim', 'Sci-Fi Enemies', 'A random set of mutants and robots for science-fiction or post-apocalyptic games.', [{ ...W.gameField, value: 'mutfut' }, f('r_amount', 'Robots', 'number', { value: 1, min: 0, max: 100 }), f('m_amount', 'Mutants', 'number', { value: 1, min: 0, max: 100 }), f('x_terrain', 'Terrain (other games)', 'select', { value: '', options: ['', 'deserts', 'forests', 'hills', 'jungles', 'mountains', 'plains & grasslands', 'snow & icy regions', 'swamps & marshes', 'rivers & lakes', 'oceans', 'underground areas', 'wastelands'] })], p => {
    const game = W.game(p);
    if (game.slug !== 'mutfut') {
      const livein = String(p.x_terrain ?? ''), liveinr = livein === 'oceans' || livein === 'rivers & lakes' ? 1 : livein === 'underground areas' ? 2 : livein === '' ? 0 : 3;
      const s = {}, robots = amount(p.r_amount);
      let html = '<section class="scifi-enemies">';
      if (robots > 0) html += '<h2>Robots</h2>';
      for (let i = 0; i < robots; i++) html += W.scifiRetroRobot(s, liveinr) + '<hr>';
      const aliens = amount(p.m_amount);
      if (aliens > 0) {
        // PHP repeats until `amount` creatures match the chosen terrain, taking the next sorted name each time.
        const names = W.scifiAlienNames(aliens);
        html += '<h2>Creatures</h2>';
        let n = 0, left = aliens;
        while (left > 0) {
          const callme = ucwords(names[n] ?? '');
          const beast = W.scifiAlien(s, callme, game.slug);
          if (livein !== '' && livein !== beast.dwell) continue;
          n++; left--;
          html += `<section class="scifi-creature scifi-alien"><h3>${esc(ucfirst(callme))}</h3><table class="scifi-stats">` + beast.stats.map(([k, v]) => row(k, v)).join("") + `</table><p>${esc(beast.text.replace(/\s+/g, ' ').trim())}</p></section><hr>`;
        }
      }
      return html + '</section>';
    }
    const s = {};
    let html = '<section class="scifi-enemies">';
    const robots = amount(p.r_amount), mutants = amount(p.m_amount);
    if (robots > 0) html += '<h2>Robots</h2>';
    for (let i = 0; i < robots; i++) html += W.scifiRobot(s) + '<hr>';
    if (mutants > 0) html += '<h2>Mutants</h2>';
    for (let i = 0; i < mutants; i++) html += W.scifiMutant(s) + '<hr>';
    return html + '</section>';
  });
})(window.WZ, window.WZ_DATA);
