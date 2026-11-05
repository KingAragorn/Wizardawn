(function (W, D) {
  'use strict';
  // Port of makeMagicItem() (non-T&T branch) and magic_item_properties.php.
  // Switch case text lives in data/magicItemText.js (exported by export-magic-item-data.py);
  // the control flow around each switch is hand-written here from the PHP.
  const int = (a, b) => W.rng.int(a, b), d100 = () => int(1, 100), pick = a => a[int(0, a.length - 1)];
  const T = () => D.magicItemText;
  const TROLLS = ['Tunnels & Trolls 5th Edition', 'Tunnels & Trolls 7th Edition', 'Tunnels & Trolls Deluxe'];
  const DND = ['OSRIC', 'Swords & Six-Siders', 'AD&D', 'BD&D', 'BFRPG', 'Labyrinth Lord', 'Swords & Wizardry'];
  const ucfirst = s => s.charAt(0).toUpperCase() + s.slice(1);
  const ucwords = s => s.replace(/(^|[\s\t\r\n\f\v])(\S)/g, (m, a, b) => a + b.toUpperCase());
  const strrev = s => [...s].reverse().join('');
  const arr = list => list[int(0, list.length - 1)];

  // ---- interpreter for exported case cells ----
  const compare = (a, op, b) => op === '==' ? a == b : op === '!=' ? a != b : op === '<' ? a < b : op === '>' ? a > b : op === '<=' ? a <= b : op === '>=' ? a >= b : false;
  function test(c, x) {
    if (!c) return true;
    if (c.all) return c.all.every(k => test(k, x));
    if (c.any) return c.any.some(k => test(k, x));
    if (c.games) return c.games.includes(x.v.game) !== !!c.not;
    if (c.rand) return compare(int(c.rand[0], c.rand[1]), c.op, c.n);
    if (c.v) { const v = x.v[c.v]; return compare(typeof c.n === 'number' ? Number(v) || 0 : v ?? '', c.op, c.n); }
    throw new Error('magic item condition ' + JSON.stringify(c));
  }
  function run(stmts, x) {
    for (const s of stmts || []) {
      if (s.set) x.v[s.set] = render(s.t, x), x.last = x.v[s.set];
      else if (s.chain) { const b = s.chain.find(b => test(b.cond, x)); if (b) run(b.body, x); }
    }
  }
  const php = (src, x) => {
    const js = src.replace(/\$(\w+)/g, (m, n) => 'Number(v.' + n + ')||0').replace(/mt_rand\s*\(/g, 'R(').replace(/CEIL/g, 'Math.ceil').replace(/FLOOR/g, 'Math.floor');
    return String(new Function('v', 'R', 'return ' + js)(x.v, int));
  };
  function render(parts, x) {
    return (parts || []).map(t => typeof t === 'string' ? t : t.roll ? String(int(t.roll[0], t.roll[1]))
      : t.var ? String(x.v[t.var] ?? '') : t.expr ? php(t.expr, x) : t.raw ? php(t.raw, x) : t.call ? call(t.call, t.args, x) : '').join('');
  }
  function sw(fn, i, x, a, b) {
    const s = T()[fn][i]; if (!s) throw new Error('no switch ' + fn + ' ' + i);
    if (a === undefined) { a = Number(s.from); b = Number(s.to); }
    const roll = int(a, b); x.last = '';
    run(s.cases[roll], x);
    return roll;
  }
  const ctx = (p, v = {}) => ({ p, v: { game: W.game(p).name, ...v } });
  const one = (fn, p, name, v) => { const x = ctx(p, v); sw(fn, 0, x); return x.v[name] ?? ''; };
  const arg = (raw, x) => { raw = raw.trim(); if (raw[0] === '$') return x.v[raw.slice(1)]; if (/^mt_rand/.test(raw)) return Number(php(raw, x)); if (/^'.*'$/.test(raw)) return raw.slice(1, -1); return isNaN(raw) ? raw : Number(raw); };
  const args = (raw, x) => { const out = []; let depth = 0, cur = ''; for (const ch of raw) { if (ch === ',' && !depth) { out.push(cur); cur = ''; continue; } if (ch === '(') depth++; if (ch === ')') depth--; cur += ch; } if (cur.trim()) out.push(cur); return out.map(a => arg(a, x)); };

  // ---- helpers from colors / descriptions / names ----
  const M = W.magicHelpers = {};
  M.candleColor = white => arr(['black', 'blue', 'gray', 'green', 'red', 'brown', 'orange', 'yellow', 'purple', 'white'].slice(0, white == 1 ? 9 : 10));
  M.slimeColor = () => arr(['dark', 'blue', 'gray', 'black', 'green', 'red', 'brown', 'orange', 'yellow', 'purple', 'clear', 'white']);
  M.plainColor = () => arr(['black', 'blue', 'gray', 'green', 'red', 'brown', 'orange', 'yellow', 'tan', 'purple', 'white', 'gold', 'silver', 'bronze', 'copper', 'platinum']);
  M.leatherColor = () => arr(['black', 'blue', 'gray', 'green', 'red', 'brown', 'brown', 'brown', 'brown', 'brown', 'brown', 'brown', 'brown', 'brown', 'orange', 'yellow', 'tan', 'purple', 'white']);
  M.designColor = () => arr(['gold', 'silver', 'scarlet', 'amber', 'azure', 'emerald', 'indigo', 'ivory', 'jade', 'maroon', 'royal blue', 'violet']);
  M.fogColor = () => arr(['dark', 'blue', 'gray', 'gray', 'gray', 'gray', 'green', 'red', 'brown', 'orange', 'yellow', 'purple', 'white', 'white', 'white', 'white']);
  M.beamColor = () => arr(['red', 'blue', 'green', 'orange', 'yellow', 'purple', 'white']);
  M.preciousChooser = () => arr(['copper', 'silver', 'gold', 'platinum', 'iron', 'copper', 'silver', 'gold', 'platinum', 'iron', 'copper', 'silver', 'gold', 'platinum', 'iron', 'bone']);
  M.timeSpan = type => type === 'per' ? arr(['hour', 'day', 'week', 'month', 'season', 'year']) : type === 'often' ? arr(['once', 'twice', 'three times', 'four times', 'five times', 'six times', 'seven times', 'eight times', 'nine times', 'ten times']) : arr(['rounds', 'turns', 'minutes', 'hours']);
  M.abilityTranslate = (p, a) => W.ability(p, a);
  M.protectionType = () => { const b = d100(); return b < 70 ? '+1' : b < 83 ? '+2' : b < 84 ? '+2 (on self and all friends 5 feet away)' : b < 91 ? '+3' : b < 92 ? '+3 (on self and all friends 5 feet away)' : b < 94 ? '+4' : b < 96 ? '+4 (+2 on save rolls)' : b < 98 ? '+5' : b < 99 ? '+5 (+1 on save rolls)' : b < 100 ? '+6' : '+6 (+1 on save rolls)'; };
  M.carpetMaker = condition => {
    const size = arr(['small', 'large', 'medium-sized']), shape = arr(['square', 'rectangular', 'round']), name = arr(['rug', 'carpet']); void shape;
    const design = d100() > 50 ? ' with a dark ' + M.candleColor(1) + ' design on it' : '';
    const look = condition == 1 ? arr([' worn', ' ruined', ' badly worn', ' rotten', ' moldy', ' torn', ' wet', '', '']) : '';
    return (condition == 2 ? '' : 'a ') + size + look + ' ' + M.candleColor(0) + ' ' + name + design;
  };
  M.castingName = p => {
    let word = one('castingName', p, 'word');
    word = strrev(word.toLowerCase());
    // alienName()/mutantName() are not ported; approximated with two name parts (see PORTING.md).
    if (d100() > 80) word = (W.name('mageName') + W.name('orcName')).toLowerCase();
    return word;
  };
  M.materialType = (p, category) => {
    const x = ctx(p);
    if (category === 'leather') { x.v.value = 'animal'; sw('materialType', 0, x); return x.v.value; }
    if (category === 'iron') { sw('materialType', 1, x); return x.v.value ?? ''; }
    if (category === 'fur') { if (sw('materialType', 2, x) === 7) sw('materialType', 3, x); return x.v.value ?? ''; }
    if (category === 'wood') { sw('materialType', 4, x); sw('materialType', 5, x); return x.v.value3 + ' ' + x.v.value1; }
    if (category === 'cloth') { sw('materialType', 6, x); sw('materialType', 7, x); return x.v.value3 + ' ' + x.v.value1; }
    if (category === 'bow') { sw('materialType', 8, x); sw('materialType', 9, x); sw('materialType', 10, x); return x.v.value2 + ' ' + x.v.value3 + ' of ' + x.v.value1; }
    if (category === 'mwood') { sw('materialType', 11, x); sw('materialType', 12, x); sw('materialType', 13, x); return x.v.value2 + ' ' + x.v.value3 + ' of ' + x.v.value1; }
    if (category === 'mcloth') { sw('materialType', 14, x); sw('materialType', 15, x); sw('materialType', 16, x); return x.v.value2 + ' ' + x.v.value3 + ' of ' + x.v.value1; }
    sw('materialType', 17, x); return x.v.value ?? '';
  };
  M.designType = (p, painting) => { const x = ctx(p); sw('designType', 0, x, 0, painting == 1 ? 27 : 33); return x.v.value; };
  M.dragonType = (p, potion) => { const x = ctx(p); sw('dragonType', 0, x, 0, potion > 0 ? 9 : 17); return potion > 0 ? x.v.value : x.v.value + 's'; };
  M.giantType = (p, potion) => { const x = ctx(p); sw('giantType', 0, x, 0, potion > 0 ? 7 : 12); return x.v.value; };
  M.coinMaker = p => { const g = W.game(p).name, x = ctx(p); let val = ['Swords & Wizardry', ...TROLLS].includes(g) ? int(0, 2) : int(0, 4); if (g === 'Swords & Six-Siders') val = 2; sw('coinMaker', 0, x, val, val); return x.v.coin; };
  M.elementalType = p => { const x = ctx(p); sw('elementalType', [...TROLLS, 'Swords & Six-Siders'].includes(x.v.game) ? 0 : 1, x); return x.v.value; };
  M.abilityType = p => { const x = ctx(p), g = x.v.game; sw('abilityType', g === TROLLS[0] ? 0 : TROLLS.includes(g) ? 1 : 2, x); return x.v.value; };
  M.headMount = p => { const mounted = arr(['bear', 'lion', 'tiger', 'deer', 'boar', 'tiger', 'polar bear', 'dragon', 'ogre', 'giant', 'cougar', 'grizzly bear', 'deer', 'elk', 'moose', 'antelope']); if (mounted !== 'dragon') return mounted; const x = ctx(p, { mounted }); sw('headMount', 0, x); return x.v.mounted; };
  M.bagCreator = p => { const x = ctx(p); sw('bagCreator', 0, x); sw('bagCreator', 1, x); return x.v.model + ' ' + x.v.make; };
  M.rareCoins = (p, amount, needed) => {
    amount = Math.ceil(int(Math.floor(amount / 2), amount)); if (amount < 12) amount = int(6, 26);
    const x = ctx(p); sw('rareCoins', 0, x); sw('rareCoins', 1, x);
    return needed > 0 ? 'this coin was ' + x.v.age + ' and is made of ' + x.v.material + ' with a symbol of a ' + M.designType(p, 0) + ' on it'
      : 'coins ' + x.v.age + ' that are made of ' + x.v.material + ' with a symbol of a ' + M.designType(p, 0) + ' on it (' + amount + ' ea)';
  };
  M.researchSpell = () => W.researchSpell ? W.researchSpell() : W.name('mageName') + '`s Spell of ' + W.name('adjName');

  // ---- magic_item_properties.php ----
  const evilGood = (fn, p, owner, good, evil, idx) => {
    const x = ctx(p, { moral: 2, need: '', urge: '', power1: '', power2: '' });
    sw(fn, 0, x);
    if (fn === 'smartType' && owner) { x.v.word = owner + ' the ' + W.name('jobName'); x.v.moral = 2; }
    sw(fn, 1, x, 0, Number(x.v.moral));
    for (const i of idx.flow) sw(fn, i, x);
    if (x.v.feel === good && d100() > 60) sw(fn, idx.good, x);
    else if (x.v.feel === evil && d100() > 60) sw(fn, idx.evil, x);
    if (x.v.need !== '') { sw(fn, idx.orelse, x); x.v.urge = x.v.need + ' ' + x.v.orelse + ' {it has a will of ' + int(10, 20) + ' that the wielder may try to overpower with their own}'; }
    return x;
  };
  M.smartSword = p => { const x = evilGood('smartSword', p, '', 'good', 'evil', { flow: [2, 3, 4, 5], good: 6, evil: 7, orelse: 8 }); return '**this weapon contains the spirit of ' + x.v.word + ' who is ' + x.v.feel + ' in alignment with a ' + int(13, 19) + ' intelligence {they communicate with the wielder by ' + x.v.talk + '}' + x.v.power1 + x.v.power2 + x.v.urge + '**'; };
  M.smartType = (p, owner) => { const x = evilGood('smartType', p, owner, 'kind', 'vile', { flow: [2, 3, 4], good: 5, evil: 6, orelse: 7 }); return '(this contains the spirit of ' + x.v.word + ' who is ' + x.v.feel + ' in morality with a ' + int(13, 20) + ' intellect {they communicate with the wielder by ' + x.v.talk + '}' + x.v.power1 + x.v.power2 + x.v.urge + ')'; };
  M.slayerTypeSX = p => one('slayerTypeSX', p, 'bane');
  M.slayerType = (p, type) => { const x = ctx(p); sw('slayerType', 0, x); sw('slayerType', 1, x); sw('slayerType', 2, x); return x.v.value + ' (' + x.v.name + ' ' + (type === 'armor' ? x.v.protect : x.v.slay) + ')'; };
  M.enchantedType = (p, type) => { const x = ctx(p); sw('enchantedType', 0, x, 0, type === 'hilt' ? 14 : 11); return x.v.value; };
  M.candleMagic = (p, level) => { const x = ctx(p, { level: level > 0 ? level : int(1, 20) }); sw('candleMagic', 0, x); sw('candleMagic', 1, x); sw('candleMagic', 2, x); sw('candleMagic', TROLLS.includes(x.v.game) ? 3 : 4, x); return x.v.value; };
  const written = g => [...TROLLS, 'Swords & Six-Siders'].includes(g) ? 'learned by identifying the item' : 'learned from identifying magic';
  M.tomePower = (p, chance, curst, level, cut) => {
    const x = ctx(p, { curst, cut, chance }), g = x.v.game;
    x.v.gem = ucwords(W.gem(cut));
    x.v.level = level = level > 0 ? level : int(1, 20);
    x.v.spell = level < 4 ? 'lowest' : level < 7 ? 'lower' : level < 10 ? 'low' : level < 13 ? 'medium' : level < 16 ? 'high' : level < 19 ? 'higher' : 'highest';
    if (!TROLLS.includes(g)) {
      if (['BFRGP', 'Swords & Wizardry', 'BD&D'].includes(g) || (g === 'Labyrinth Lord' && String(p.aec ?? p.x_aec ?? '0') !== '1')) sw('tomePower', 0, x);
      else if (g === 'Swords & Six-Siders') sw('tomePower', 1, x); else sw('tomePower', 2, x);
      sw('tomePower', 3, x);
    } else sw('tomePower', 4, x);
    sw('tomePower', 5, x);
    x.v.power = '';
    if (d100() <= chance) {
      if (TROLLS.includes(g)) { if (sw('tomePower', 6, x) === 3) sw('tomePower', 7, x); }
      else if (sw('tomePower', 8, x) === 16) {
        const pages = W.range(int(2, 9)).map(() => W.gameSpell(p, 0, ''));
        x.v.power = 'the book contains some spell on certain pages (' + pages.join(', ') + ')';
      }
      if (curst > 0) x.v.power = x.v.curse;
    }
    if (chance != 100 && x.v.power !== '') x.v.power = '...' + x.v.power;
    return x.v.power;
  };
  M.bootPower = (p, curst, level) => { const x = ctx(p, { curst, level }); sw('bootPower', 0, x); x.v.written = written(x.v.game); sw('bootPower', 1, x); sw('bootPower', 2, x); sw('bootPower', 3, x); if (curst > 0) x.v.power = 'these ' + M.leatherColor() + ' ' + M.materialType(p, 'leather') + ' skin boots ' + x.v.curse; return x.v.power; };
  M.cloakPower = (p, curst, level) => { const x = ctx(p, { curst, level }); sw('cloakPower', 0, x); x.v.written = written(x.v.game); sw('cloakPower', 1, x); sw('cloakPower', 2, x); if (curst > 0) x.v.power = 'this ' + M.candleColor(0) + ' cloak ' + x.v.curse; return x.v.power; };
  M.robePower = (p, curst, level) => { const x = ctx(p, { curst, level }); sw('robePower', 0, x); x.v.written = written(x.v.game); sw('robePower', 1, x); sw('robePower', 2, x); if (curst > 0) x.v.power = 'this ' + M.candleColor(0) + ' robe ' + x.v.curse; return x.v.power; };
  M.beltPower = (p, curst, level) => {
    const x = ctx(p, { curst, level }); x.v.decorate = M.leatherColor() + ' ' + M.materialType(p, 'leather') + ' skin belt has a ' + M.preciousChooser() + ' buckle';
    x.v.written = written(x.v.game); sw('beltPower', 0, x); sw('beltPower', TROLLS.includes(x.v.game) ? 1 : 2, x);
    if (curst > 0) x.v.power = 'this ' + x.v.decorate + ' but is cursed and the ' + W.curse(p, int(1, 20), 'wearer');
    return x.v.power;
  };
  M.gloveType = p => one('gloveType', p, 'value');
  M.glovePower = (p, glove, curst, level) => {
    const x = ctx(p, { glove, curst, level }), g = x.v.game, pick3 = i => sw('glovePower', TROLLS.includes(g) ? i : g === 'Swords & Six-Siders' ? i + 1 : i + 2, x);
    sw('glovePower', 0, x);
    if (glove === 'gloves') { x.v.decorate = d100() > 50 ? M.leatherColor() + ' ' + M.materialType(p, 'leather') + ' skin gloves' : M.candleColor(0) + ' gloves'; sw('glovePower', 1, x); }
    else if (glove === 'bracers') { x.v.decorate = M.leatherColor() + ' ' + M.materialType(p, 'leather') + ' skin bracers'; pick3(2); }
    else { x.v.decorate = M.preciousChooser() + ' gauntlets'; pick3(5); }
    pick3(8); // the PHP re-rolls a general glove power after the type-specific one
    if (curst > 0) x.v.power = 'these ' + x.v.decorate + ' ' + x.v.curse;
    return x.v.power;
  };
  M.amuletType = p => one('amuletType', p, 'value');
  M.amuletPower = (p, amulet, curst, level) => {
    const x = ctx(p, { amulet, curst, level }); sw('amuletPower', 0, x);
    x.v.decorate = M.preciousChooser() + ' ' + amulet + ' has a ' + W.gem(W.number(p.x_cut, 100)) + ' set in it';
    if (d100() > 50) x.v.decorate = M.preciousChooser() + ' ' + amulet + ' has a ' + M.designType(p, 0) + ' symbol on it';
    sw('amuletPower', TROLLS.includes(x.v.game) ? 1 : 2, x);
    if (curst > 0) x.v.power = 'this ' + x.v.decorate + ' ' + x.v.curse;
    return x.v.power;
  };
  M.rockType = p => one('rockType', p, 'value');
  M.rockPower = (p, rock, curst, level) => {
    const x = ctx(p, { rock, curst, level, extra: '', more: '' }); x.v.magic_word = M.castingName(p);
    sw('rockPower', 0, x);
    if (rock === 'crystal' || rock === 'gem') x.v.extra = M.slimeColor() + ' ';
    if (rock === 'orb' || rock === 'cube') { x.v.extra = M.plainColor() + ' '; if (int(1, 2) === 1) x.v.more = ' has some ' + M.designColor() + ' symbols on it and '; }
    sw('rockPower', 1, x); sw('rockPower', 2, x); sw('rockPower', 3, x);
    const adj = 'this ' + x.v.adj + ' ' + x.v.extra + rock + x.v.more;
    sw('rockPower', 4, x); sw('rockPower', 5, x);
    if (curst > 0) x.v.power = x.v.curse;
    return adj + ' ' + x.v.power + x.v.activate + '...it has ' + int(5, 50) + ' charges';
  };
  M.helmType = p => { const x = ctx(p); sw('helmType', 0, x); x.v.value = x.v.hat; sw('helmType', 1, x); return x.v.value; };
  M.helmPower = (p, helm, curst, level) => {
    const x = ctx(p, { helm, curst, level }), g = x.v.game, v = x.v, gem = () => W.gem(W.number(p.x_cut, 100));
    sw('helmPower', 0, x);
    if (TROLLS.includes(g)) sw('helmPower', 1, x); else if (g === 'Swords & Six-Siders') { sw('helmPower', 2, x); sw('helmPower', 3, x); } else sw('helmPower', 4, x);
    if (helm === 'crown' || helm === 'tiarra') { v.decorate = M.preciousChooser() + ' ' + helm + ' has ' + int(2, 14) + ' ' + gem() + 's set in it and'; v.written = 'etched inside it'; }
    else if (helm === 'helm' || helm === 'helmet') { v.decorate = M.preciousChooser() + ' ' + helm; v.written = 'etched inside of it'; if (d100() > 50) v.decorate = M.preciousChooser() + ' ' + helm + ' has a ' + M.designType(p, 0) + ' symbol on the sides and'; }
    else if (helm === 'circlet') { v.decorate = M.preciousChooser() + ' ' + helm + ' has a ' + gem() + ' set in it and'; v.written = 'etched inside of it'; }
    else if (helm === 'headband') { v.decorate = M.leatherColor() + ' ' + M.materialType(p, 'leather') + ' skin ' + helm; v.written = 'stitched inside of it'; }
    else if (helm === 'jester hat') { v.decorate = 'multi-colored ' + helm; v.written = 'stitched inside of it'; }
    else if (['feathered hat', 'wide-brim hat', 'wizard hat', 'tricorne hat', 'floppy hat', 'skullcap', 'bonnet'].includes(helm)) { v.decorate = M.candleColor(0) + ' ' + helm; v.written = 'stitched inside of it'; }
    else { v.decorate = helm; v.written = 'stitched inside of it'; }
    if (d100() > 50) v.written = written(g);
    sw('helmPower', TROLLS.includes(g) ? 5 : g === 'Swords & Six-Siders' ? 6 : 7, x);
    if (curst > 0) v.power = 'this ' + v.decorate + ' ' + v.curse;
    return v.power;
  };

  // ---- calls made from case text ----
  const names = { demonName: 'demonName', dragonName: 'dragonName', mageName: 'mageName', orcName: 'orcName', elfName: 'elfName', dwarfName: 'dwarfName', gnomeName: 'gnomeName', genericName: 'genericName', humanMaleName: 'humanMaleName', humanFemaleName: 'humanFemaleName', jobName: 'jobName', authorName: 'authorName' };
  function call(name, raw, x) {
    const p = x.p, a = () => args(raw, x);
    if (names[name]) return W.name(names[name]);
    switch (name) {
      case 'wolfName': return W.name('wolf');
      case 'catName': return W.name(W.d(2) === 1 ? 'catm' : 'catf');
      case 'castingName': return M.castingName(p);
      case 'candleColor': return M.candleColor(a()[0]);
      case 'leatherColor': case 'plainColor': case 'designColor': case 'fogColor': case 'slimeColor': case 'beamColor': case 'preciousChooser': return M[name]();
      case 'timeSpan': return M.timeSpan(raw.trim());
      case 'timesMaker': return one('timesMaker', p, 'time');
      case 'abilityTranslate': return M.abilityTranslate(p, raw.split(',')[1].trim());
      case 'materialType': return M.materialType(p, raw.trim());
      case 'designType': return M.designType(p, a()[0]);
      case 'dragonType': return M.dragonType(p, a()[0] || 0);
      case 'giantType': return M.giantType(p, a()[0] || 0);
      case 'coinMaker': return M.coinMaker(p);
      case 'elementalType': return M.elementalType(p);
      case 'abilityType': return M.abilityType(p);
      case 'headMount': return M.headMount(p);
      case 'bagCreator': return M.bagCreator(p);
      case 'rareCoins': return M.rareCoins(p, ...a());
      case 'carpetMaker': return M.carpetMaker(a()[0]);
      case 'researchSpell': return M.researchSpell();
      case 'protectionType': return M.protectionType();
      case 'lycanthrope': return W.lycanthrope();
      case 'bottlePicker': return one('bottlePicker', p, 'bottle');
      case 'bardType': case 'woodenType': case 'tomeType': case 'animalType': case 'birdType': case 'humanType': case 'undeadType': case 'searchList': return one(name, p, 'value');
      case 'gloveType': case 'amuletType': case 'rockType': case 'helmType': case 'slayerTypeSX': return M[name](p);
      case 'slayerType': return M.slayerType(p, a()[0]);
      case 'smartType': return M.smartType(p, a()[0]);
      case 'candleMagic': return M.candleMagic(p, x.v.level);
      case 'tomePower': { const [chance, curst, level, cut] = a(); return M.tomePower(p, chance, curst, level, cut); }
      case 'bootPower': case 'cloakPower': case 'robePower': case 'beltPower': { const [curst, level] = a(); return M[name](p, curst, level); }
      case 'glovePower': case 'amuletPower': case 'rockPower': case 'helmPower': { const [thing, curst, level] = a(); return M[name](p, thing, curst, level); }
      case 'curseType': { const [level, who] = a(); return W.curse(p, Number(level) || int(1, 20), who); }
      case 'curseDuration': { const [, who, level] = a(); return W.curseDuration(Number(level) || 1, who); }
      case 'gameSpellChooser': return W.gameSpell(p, 0, '');
      case 'powerUp': return W.powerUp(x.v.level);
      case 'spellSchool': return W.spellSchool(p);
      case 'mapMaker': return W.plainText(W.treasureClue(p, int(1, 20), true)); // mapMaker(998) = a short map description
      case 'idolMaker': return W.idol ? W.idol(p) : 'a ' + M.preciousChooser() + ' statue of ' + W.name('genericName');
      case 'mt_rand': case 'CEIL': return php(name + '(' + raw + ')', x);
      case 'substr': { const [v, , len] = raw.split(','); return String(x.v[v.trim().slice(1)] ?? '').slice(0, Number(len)); }
      case 'TTSaves': return W.ttSave ? W.ttSave(p, x.v.level) : 'L' + Math.ceil(x.v.level / 2) + '-SR';
    }
    throw new Error('magic item call ' + name + '(' + raw + ')');
  }
  M.call = call;
  // Fantasy treasure now uses the ported generator (tool_loot/encounter/delve call makeMagicItem in the PHP);
  // BD&D keeps its basic table, T&T and the post-apocalyptic games keep their own lists.
  const previousMagic = W.magicItem;
  W.magicItem = function (p) {
    const game = W.game(p);
    if (!DND.includes(game.name) && !['fantasy', 'ww'].includes(game.slug) || game.slug === 'bdd') return previousMagic(p);
    return W.plainText(W.makeMagicItem(p, W.number(p.level ?? p.x_level, 0, 0, 20), int(1, 3)));
  };

  // ---- makeMagicItem() ----
  W.makeMagicItem = function (p, level = 0, size = 3, varb = 0) {
    const g = W.game(p).name, six = g === 'Swords & Six-Siders', cut = W.number(p.x_cut, 100, 0, 1000);
    if (TROLLS.includes(g)) return W.magicItem(p); // T&T branch not ported
    level = level > 0 ? int(1, level) : int(1, 20); if (level > 20) level = 20;
    const x = ctx(p, { level, cut, size, varb }), v = x.v, lang = () => W.language(p), art = (n, c, career) => career === 2 ? W.artifactName(n, !!c, true) : W.artifactName(ucwords(n), !!c);
    const which = d100();
    let the = which < 21 ? 'potion' : which < 36 ? 'scroll' : which < 41 ? 'ring' : which < 46 ? 'wand' : which < 61 ? 'magic' : which < 76 ? (size != 3 ? 'weapon' : 'armor') : 'weapon';
    if (varb == 1) the = 'potion';
    let item = '';
    if (the === 'potion') {
      const bottle = one('bottlePicker', p, 'bottle');
      sw('makeMagicItem', 0, x); sw('makeMagicItem', 1, x);
      const pretty = W.potionAppearance();
      item = varb == 1 ? v.item + ' {<i>' + pretty + '</i>}' : bottle + ' ' + v.item + '. ' + pretty;
    } else if (the === 'scroll') {
      v.item = DND.includes(g) ? 'Scroll with a ' + W.gameSpell(p, level, '') : 'Scroll with ' + W.powerUp(level) + ' level ' + W.spellSchool(p) + ' spell';
      sw('makeMagicItem', 2, x);
      item = v.item + (d100() > 60 ? ' [written in ' + lang() + ']' : '');
    } else if (the === 'ring') {
      v.charges = int(10, 50); v.curses = 0; v.no_words = 0; v.use_charges = 0;
      sw('makeMagicItem', 3, x);
      let decorate = '[a ' + M.preciousChooser() + ' ring with a ' + W.gem(cut) + ' set in it';
      if (d100() > 50) decorate = '[a ' + M.preciousChooser() + ' ring';
      let words = '';
      if (v.curses != 1 && v.no_words != 1) {
        if (d100() > 70) words = '...there is a command word engraved on the inside written in ' + lang() + ' that says `' + M.castingName(p) + '`';
        if (d100() > 90) words = '...the command word to use this is `' + M.castingName(p) + '`, which can be learned with identifying magic';
      }
      decorate += words;
      item = v.item + ' ' + decorate + (d100() > 70 && v.curses != 1 && v.use_charges != 1 ? ' - it has ' + v.charges + ' charges]' : ']');
      if (d100() > 50) item = '<u>' + art('ring', v.curses, 0) + '</u> - ' + item;
    } else if (the === 'wand') {
      sw('makeMagicItem', 4, x, size == 1 ? 20 : size == 2 ? 10 : 0, 47);
      const kind = String(v.item).slice(0, 3), first = String(v.item).split(' ')[0];
      let charges, extradj = '';
      if (kind === 'rod') { charges = int(10, 50); sw('makeMagicItem', 5, x); if (d100() > 50) extradj = ' and has a ' + W.gem(cut) + ' at each end'; }
      else if (kind === 'wan') { charges = int(20, 100); sw('makeMagicItem', 6, x); if (d100() > 50) extradj = ' and has a ' + W.gem(cut) + ' at the end of it'; }
      else { charges = int(5, 25); sw('makeMagicItem', 7, x); if (d100() > 50) extradj = ' and has a ' + W.gem(cut) + ' at the top'; }
      let words = '';
      if (d100() > 70) words = '. There is a command word carved on it in ' + lang() + ' that says `' + M.castingName(p) + '`';
      if (d100() > 90) words = '. The command word to use this is `' + M.castingName(p) + '`, which can be learned with identifying magic';
      item = v.item + ' [this has ' + charges + ' charges and is made of ' + v.material + extradj + words + ']';
      if (d100() > 50) item = '<u>' + art(first, 0, 1) + '</u> - ' + item;
    } else if (the === 'armor') {
      const smithy = int(1, 20), lit = six ? '(light) ' : '', med = six ? '(medium) ' : '', hev = six ? '(heavy) ' : '';
      let wearer = 'wearer', roller = 100, leather = 0; v.mystic_item = 'Armor';
      if (smithy < 2) v.armor = hev + 'banded mail armor';
      else if (smithy < 5) v.armor = med + (d100() >= 90 ? 'elvish chain mail armor' : 'chain mail armor');
      else if (smithy < 7) { v.armor = lit + 'leather armor'; leather = 1; }
      else if (smithy < 10) v.armor = hev + 'plate mail armor';
      else if (smithy < 11) v.armor = med + 'ring mail armor';
      else if (smithy < 13) v.armor = hev + 'splint mail armor';
      else if (smithy < 15) { v.armor = lit + 'studded leather armor'; leather = 1; }
      else { wearer = 'equipper'; roller = 105; v.mystic_item = 'Shield'; sw('makeMagicItem', 8, x); }
      let forge = int(1, roller); if (six && forge > 74 && forge < 87) forge = 74;
      let heatup, cursing = 0;
      if (forge < 50) heatup = '+1'; else if (forge < 75) heatup = '+2'; else if (forge < 85) heatup = '+3';
      else if (forge < 87) heatup = d100() >= 65 ? '+5' : '+4';
      else if (forge < 91) heatup = '+1 with a 1 save bonus'; else if (forge < 94) heatup = '+2 with a 1 save bonus';
      else if (forge < 101) { cursing = 1; v.wearer = wearer; sw('makeMagicItem', 9, x); heatup = v.heatup; }
      else heatup = d100() > 50 ? 'that fully blocks any attacks from breath weapons' : '+1 with a +' + (six ? int(1, 2) : int(2, 4)) + ' against missile attacks';
      item = cursing ? heatup : v.armor + ' ' + heatup;
      let logo = '';
      if (smithy > 14 && d100() > 60) logo = '...with a ' + M.designType(p, 0) + ' symbol on the front that is ' + M.designColor() + ' in color';
      if (smithy < 15 && d100() > 60) { const r = d100(); const sew = r > 66 ? 'back' : r > 33 ? 'front' : 'front and back'; logo = '...with a ' + M.designType(p, 0) + ' symbol on the ' + sew + ' that is ' + M.designColor() + ' in color'; }
      const decorate = leather ? '[made of ' + M.materialType(p, 'leather') + ' hide and is ' + M.leatherColor() + ' in color' + logo + ']' : '[made of ' + M.materialType(p, 'iron') + logo + ']';
      item += ' ' + decorate;
      if (d100() > 50) item = '<u>' + art(v.mystic_item, cursing, 0) + '</u> - ' + item;
    } else if (the === 'weapon') {
      Object.assign(v, { smith1: '', smith2: '', quiver: '', bow: 0, pole: 0, forge: d100() });
      sw('makeMagicItem', 10, x, 0, size == 1 ? 4 : size == 2 ? 21 : 36);
      const owner = W.manyName(), words = String(v.item).split(' ');
      let mine = '', decorate = '', belongs = '', noname = 0, cursing = 0;
      let mystic = words[1] ? (['arm', 'star'].includes(words[1]) ? ucwords(v.item) : words[1]) : words[0];
      const grip = () => d100() > 20 ? 'leather' : M.materialType(p, 'leather') + ' leather';
      const etched = (verb) => { if (d100() > 80) { belongs = '...the name of <i>' + owner + '</i> is ' + verb + ' on the ' + (int(1, 2) === 1 ? v.smith1 : v.smith2); mine = owner; } };
      if (v.smith2 === 'hilt') {
        decorate = '[the ' + v.smith1 + ' is made of ' + M.materialType(p, 'iron') + ' with a ' + grip() + ' grip'; etched('engraved');
        decorate += d100() > 80 ? '...the ' + (int(1, 2) === 1 ? v.smith1 : v.smith2) + ' is decorated with ' + int(3, 12) + ' gems {' + W.gem(cut) + '}]' : belongs + ']';
      } else if (v.smith1 !== '') {
        decorate = '[the ' + v.smith1 + ' is made of iron and has a ' + M.materialType(p, 'handle') + ' ' + v.smith2 + (v.pole == 1 ? '' : ' with a ' + grip() + ' grip'); etched('engraved');
        decorate += d100() > 80 ? '...the ' + (int(1, 2) === 1 ? v.smith1 : v.smith2) + ' is decorated with ' + int(3, 12) + ' gems {' + W.gem(cut) + '}]' : belongs + ']';
      } else if (v.bow == 1) {
        decorate = '[' + M.materialType(p, 'bow'); if (d100() > 80) { belongs = '...the name of <i>' + owner + '</i> is carved on it'; mine = owner; } decorate += belongs + ']';
      } else if (v.bow == 2) {
        decorate = '[made of ' + M.materialType(p, 'leather') + ' hide'; if (d100() > 80) { belongs = '...the name of <i>' + owner + '</i> is ' + (int(1, 2) === 1 ? 'burned' : 'stitched') + ' on it'; mine = owner; }
        if (d100() > 80) decorate += '...the cradle is decorated with a ' + W.gem(cut); decorate += belongs + ']';
      }
      let forge = Number(v.forge); if (six && forge > 74 && forge < 87) forge = 74;
      let heatup;
      if (forge < 50) heatup = '+1'; else if (forge < 75) heatup = '+2'; else if (forge < 85) heatup = '+3';
      else if (forge < 87) heatup = d100() >= 65 ? '+5' : '+4';
      else if (forge < 92) heatup = six ? '+1 with a +2 against ' + M.slayerTypeSX(p) : '+1 with a +3 against ' + M.slayerType(p, '');
      else if (forge < 95) heatup = six ? '+2 with a +3 against ' + M.slayerTypeSX(p) : '+2 with a +4 against ' + M.slayerType(p, '');
      else if (forge < 97) { cursing = 1; v.wearer = 'wielder'; sw('makeMagicItem', 11, x); heatup = v.heatup; }
      else if (forge < 98) { heatup = six ? '+3' : '+' + int(1, 5) + ' ' + M.smartType(p, mine); noname = 1; }
      else heatup = six ? '+2, +3 against ' + M.slayerTypeSX(p) : '+' + int(1, 3) + ' ' + M.enchantedType(p, v.smith2);
      item = (cursing ? heatup : v.item + ' ' + heatup) + v.quiver + ' ' + decorate;
      if (d100() > 98 && !v.quiver) item += ' ' + M.smartSword(p);
      if (d100() > 50 && !noname && !v.quiver) item = '<u>' + art(mystic, cursing, 0) + '</u> - ' + item;
      void mine;
    } else {
      const [sz1, sz2, sz3] = size == 1 ? [0, 51, 2] : size == 2 ? [52, 70, 4] : [71, 92, 6];
      Object.assign(v, { use_other: 0, m_misc: '', toy: '', rock: '' });
      v.book_spell = d100() < 71 ? 'mage' : six ? 'wizard' : 'illusionist';
      v.pages_book = int(5, 14) + ' of the lowest level spells, ' + int(4, 12) + ' of the lower level spells, ' + int(3, 10) + ' of the low level spells, ' + int(2, 8) + ' of the medium level spells, ' + int(2, 6) + ' of the high level spells, ' + int(1, 4) + ' of the higher level spells, and ' + int(1, 2) + ' of the highest level spells';
      v.curse_me = d100() > 97 ? 1 : 0;
      v.written = 'shown somewhere on it'; if (int(1, 2) === 1) v.written = 'learned from identifying magic';
      sw('makeMagicItem', 12, x, sz1, sz2);
      if (v.use_other == 1) { v.curse_me = 0; sw('makeMagicItem', 13, x); }
      if (v.use_other == 2) { sw('makeMagicItem', 14, x); sw('makeMagicItem', 15, x); sw('makeMagicItem', 16, x); if (v.curse_me > 0) v.m_misc = v.m_dustt + '___{this small ' + v.m_dustc + ' of ' + M.candleColor(0) + ' ' + v.m_dustt + ' can be thrown into the air where everyone within 20 feet will be incapacitated by choking and sneezing for ' + int(5, 20) + ' rounds...everyone must save for breath or suffer ' + int(1, 2) + 'd' + int(2, 6) * 2 + ' damage...this same save must be made each round they are in the dust}'; }
      if (v.use_other == 3) { sw('makeMagicItem', 17, x); sw('makeMagicItem', 18, x); if (v.curse_me > 0) sw('makeMagicItem', 19, x); }
      if (int(1, 4) > 1) sw('makeMagicItem', 20, x, 0, sz3);
      if (!v.m_misc) return W.makeMagicItem(p, level, size, varb); // safety retry, as in the PHP
      if (!(v.use_other > 0)) v.curse_me = 0;
      const [head, tail = ''] = String(v.m_misc).split('___');
      const name = ucwords(head).replace(/ Of /g, ' of ').replace(/ And /g, ' and ').replace(/ The /g, ' the ');
      item = art(name, v.curse_me > 0, 2) + ' ' + tail;
    }
    return ucfirst(item);
  };
})(window.WZ, window.WZ_DATA);
