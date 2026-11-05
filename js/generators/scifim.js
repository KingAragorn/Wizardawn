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
  const amount = v => W.number(v, 0, 0, 100);
  W.register('scifim', 'Sci-Fi Enemies', 'A random set of mutants and robots for science-fiction or post-apocalyptic games (Mutant Future rules).', [{ ...W.gameField, value: 'mutfut' }, f('r_amount', 'Robots', 'number', { value: 1, min: 0, max: 100 }), f('m_amount', 'Mutants', 'number', { value: 1, min: 0, max: 100 })], p => {
    const game = W.game(p);
    if (game.slug !== 'mutfut') return `<section class="scifi-enemies"><p>The ${esc(game.name)} sci-fi enemy rules are not ported yet; choose Mutant Future.</p></section>`;
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
