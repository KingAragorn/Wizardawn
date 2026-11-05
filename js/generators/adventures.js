(function (W, D) {
  'use strict';
  const f = W.field, esc = W.escape, int = (a, b) => W.rng.int(Math.min(a, b), Math.max(a, b)), pick = a => W.pick(a);
  const yes = (p, key, fallback = 1) => String(p[key] ?? fallback) === '1';
  const cell = key => pick(D.dungeonText.cells[key]);
  const tableChoice = (file, name, key, fallback) => {
    const rows = D.roomTables[file]?.[name]?.[key]?.[0];
    return rows?.length ? pick(rows) : fallback;
  };
  W.container = function (post = false) {
    if (W.d(3) === 1) return W.color() + ' ' + pick(post ? ['nylon', 'plastic', 'canvas'] : ['leather', 'cloth', 'canvas']) + ' ' + cell('bagCreator');
    return pick(['oak', 'pine', 'iron', 'cedar', 'steel']) + ' ' + cell('boxMakerRoom') + (W.d(2) === 1 ? ' with a locked ' + pick(['padlock', 'keyhole']) : '');
  };
  W.trap = function (p, type = 'room', selected) {
    const level = int(1, W.number(p.level ?? p.x_level, 20, 1, 100)), troll = W.isTroll(p), group = Math.min(9, Math.floor((level - 1) / 2));
    const scopes = {
      box: ['come out of the container', 'the opener', 'in front of the container', 'whoever opens the container', 'container', 'from the container'],
      item: ['come out near the item', 'the one touching it', 'in front of the item', 'whoever touches the item', 'item', 'from the item'],
      idol: ['come out of it', 'the toucher', 'in front of it', 'whoever touches it', 'thing', 'from the idol'],
      room: ['fill the area', 'anyone inside', 'in the area', 'whoever first enters the area', 'central spot of the area', 'from the area']
    };
    const scope = scopes[type] || scopes.room, lethal = W.d(2) === 1, damage = `suffer 1d${troll ? 6 : pick([4, 6, 8, 10, 12])}x${Math.ceil(level / 2) + 1} damage`;
    const death = lethal ? ['die', pick(['be decapitated', 'be sliced clean in half']), 'be turned into a statue of solid ' + cell('statueMake'), pick(['be encased in a block of ice', 'be frozen solid and then shatter to pieces']), pick(['be turned to ash', 'be set ablaze and melt into a puddle of goo']), 'fall', 'cold', troll ? 'be instantly killed from being impaled' : 'death', 'be instantly killed from being impaled'] : [damage, damage, damage + (troll ? ' and become paralyzed for 1d6 hours' : ' and become paralyzed for 1d4 rounds'), damage, damage, 'rise', 'heat', troll ? damage : 'magical spells', damage];
    const slots = { level, damageScale: Math.ceil(level / 2) + 1, pit_depth: group ? int(group * 10 + 1, group * 10 + 10) : 10, pit_damage: [1, 2, 3, 4, 5, 7, 10, 14, 19, 25][group] + 'd6', fogColor: W.color(), color: W.color(), savingRoll: 'L' + level + 'SR', luck: 'LCK', speed: W.ability(p, 'SPD'), strength: 'STR', constitution: 'CON', intelligence: 'INT', noise: pick(['magical noise', 'ringing bell noise', 'screeching metal noise', 'air horn noise']), piles: pick(['trash', 'straw', 'dirt', 'refuse', 'hay']) };
    ['t_where', 't_who', 't_pit', 't_first', 't_close', 't_noise'].forEach((key, i) => { slots[key] = scope[i]; });
    death.forEach((value, i) => { slots['death' + i] = value; });
    slots.shrooms = pick(['blindness', 'fear', 'hallucinations', 'sleep']) + ' for ' + int(2, 6) + ' hours unless they can ' + (troll ? 'make a ' + slots.savingRoll + ' vs. STR or CON' : 'save for poison');
    const index = selected ?? int(0, ['box', 'idol'].includes(type) ? 48 : 50), row = D.dungeonText.traps[troll ? 0 : 1][index];
    let text;
    if (row) text = row.map(part => typeof part === 'string' ? part : part.roll ? int(...part.roll) : slots[part.slot] ?? '').join('');
    else if (index === 48) text = `A magical teleporter will send ${scope[1]} ${pick(['just outside the adventuring area', 'to a random location in the adventuring area', 'to the nearest confined area', int(2, 10) + ' miles away in a random direction'])}${W.d(2) === 1 ? ' naked while their belongings drop to the floor' : ''}.`;
    else if ([35, 36, 37].includes(+index)) text = 'A magical curse affects ' + scope[1] + ': ' + W.curse(p, level, scope[1]) + '.';
    else if (+index === 38) text = `A summoned creature attacks ${scope[1]} (${troll ? 'MR ' + level * 15 : level + ' HD'}).`;
    else text = `A magical trap affects ${scope[1]}, causing ${damage.replace('suffer ', '')}; ${troll ? 'make a ' + slots.savingRoll + ' vs. LCK or DEX' : 'save for spells'} to avoid it.`;
    if (W.game(p).slug === 'ssxs') text = text.replace(/1d[48]/g, '1d6');
    return W.plainText(text);
  };
  W.atmosphere = function (p) {
    const chance = W.number(p.atmo ?? p.x_atmo, 999, 0, 999);
    if (chance === 999) return '';
    let text;
    if (W.d(100) < chance) text = pick(['The area seems normal for this type of place', 'The area appears similar to the rest of the place', 'The area looks average compared with other sections of this place', 'The area is pretty ordinary at first glance', 'The area seems plain when you first look upon it']);
    else {
      const mood = int(50, 100);
      text = 'The area ' + (mood < 75 ? cell('smellMakerRoom') : mood < 85 ? cell('smellMakerRoom') + ' and ' + cell('airMakerRoom') : mood < 95 ? cell('airMakerRoom') : 'has ' + cell('fogMakerRoom'));
    }
    if (W.d(100) > 90) text += '. You can make out ' + pick(['a faint', 'a loud', 'a quiet', 'an eerie', 'a strange', 'an odd', 'an echoey', 'a muffled', 'a distant', 'a close']) /* atmosphere.php soundWhereRoom */ + ' ' + cell('soundMakerRoom') + ' sound coming from somewhere';
    return text + '.';
  };
  W.unusualRoom = function (p, rooms = 20) {
    const level = W.number(p.x_level, 1, 1, 100), value = int(1, 6);
    if (value === 1) return `An altar of ${cell('statueMake')} dedicated to ${W.name('demon')}. Offerings ${W.d(2) === 1 ? 'heal 1d6 damage' : 'trigger a curse: ' + W.curse(p, level, 'the worshipper')}.`;
    if (value === 2) return `A ${W.d(2) === 1 ? 'pool' : 'fountain'} of ${W.color()} liquid. Drinking ${W.d(2) === 1 ? 'heals 1d6 damage' : 'causes ' + W.trap(p, 'item')}`;
    if (value === 3 || value === 4) return `A ${value === 3 ? 'small idol' : 'statue'} of ${cell('statueMake')} representing ${W.name('demon')}. ${W.d(2) === 1 ? 'A secret compartment contains ' + W.gem() : W.trap(p, 'idol')}`;
    if (value === 5) return `A wizard floor symbol drawn in ${W.color()}. Entering it teleports the character to room ${int(1, rooms)}.`;
    return `A magical talking mouth speaks ${pick(['a riddle', 'a warning', 'a prophecy', 'a clue to a secret door'])} in ${tableChoice('descriptions', 'languageType', 'language', 'Common')}.`;
  };
  function attempts(p, kind, defaults, action) {
    const base = W.number(p['x_' + kind + '_c'], defaults[0], 0, 100);
    let min = W.number(p['x_' + kind + '_c_min'], defaults[1], 0, 100);
    const max = W.number(p['x_' + kind + '_c_max'], defaults[2], 0, 100), reduction = Math.ceil(base * W.number(p['x_' + kind + '_c_low'], defaults[3], 0, 100) / 100);
    if (W.d(100) > base) return;
    let chance = 100;
    const decrease = () => { min--; chance = min > 0 ? 100 : min === 0 ? base - reduction : chance - reduction; };
    for (let i = 0; i < max; i++) {
      if (kind === 'c') decrease();
      if (W.d(100) <= chance) action();
      if (kind !== 'c') decrease();
    }
  }

  // vehicle_and_robots.php VehicleRobotMaker($game, $type, $level): type 1 = vehicle, 0 = robot.
  const ALIEN_NAMES = ["aba", "abbe", "achko", "acno", "acu", "ada", "addo", "ade", "afthu", "agha", "aghu", "agi", "agnu", "aha", "aho", "ahtho", "ahvi", "akwa", "alhe", "alo", "amgi", "amlhe", "ani", "ape", "apho", "aphvu", "aqde", "aqi", "aqja", "ari", "arwa", "asfa", "ashe", "ashgho", "aszi", "ata", "ate", "athca", "athhi", "athpi", "atpi", "avdo", "avha", "awi", "awja", "awyu", "axphu", "aya", "ayo", "aze", "azhi", "azhja", "azho", "bab", "baih", "baph", "bej", "biozh", "bith", "buoc", "bus", "caeg", "calh", "cap", "cev", "cew", "chaaw", "chak", "chek", "chew", "chiel", "chiet", "chit", "choav", "choeq", "choeth", "choop", "chuev", "chuey", "chug", "chup", "cir", "coad", "coor", "couf", "cuf", "daax", "dad", "dap", "den", "deuth", "dieph", "diuy", "doay", "duox", "duph", "ebgu", "echa", "echi", "echzhi", "ecjo", "eclho", "ecwi", "eda", "edfo", "edna", "egha", "eghbi", "eghe", "egi", "ehfe", "ehno", "ejno", "ele", "elhe", "elhno", "elho", "eli", "emche", "enje", "enphu", "epha", "eqi", "eru", "esgho", "eshe", "eshi", "ethho", "ethu", "ethxi", "eti", "etzho", "eve", "evi", "evlhe", "ewla", "ewme", "ewu", "exa", "exba", "exsi", "exu", "eye", "eyi", "eyu", "ezchi", "ezhi", "ezhva", "ezo", "ezsa", "ezu", "faup", "fef", "fep", "foam", "foos", "foth", "fov", "fum", "fun", "gach", "gaph", "geolh", "ghah", "ghaih", "gham", "ghaut", "ghegh", "gheuh", "ghiom", "ghiuh", "ghoish", "ghoup", "ghoy", "ghuer", "ghuk", "ghuoc", "ghuv", "giey", "giub", "giugh", "goof", "goox", "guix", "guj", "guth", "guum", "hah", "haph", "hech", "heezh", "hiam", "hich", "hiep", "hizh", "huij", "huop", "ibe", "ibke", "ibu", "ibwi", "ica", "icfi", "ichwo", "ici", "icu", "idlho", "ifphe", "ighpho", "ihku", "ihze", "ijfe", "iji", "iju", "ike", "ikma", "iko", "ikxi", "ile", "ilhchi", "ilhe", "ilhga", "ilhghe", "ilho", "ilhtha", "imo", "imsha", "imthu", "imu", "ina", "innu", "iphke", "ipi", "iplha", "ipo", "ipu", "iqshe", "iqthe", "iro", "isghu", "ishi", "isla", "itca", "ite", "itu", "iva", "iwi", "iwje", "iwso", "ixa", "ixi", "iyge", "izbe", "izha", "izhu", "japh", "jiolh", "jogh", "joish", "jot", "juiy", "juut", "kaip", "kaux", "kax", "kech", "ked", "keoz", "kip", "kiq", "kith", "kiux", "kox", "kued", "laeth", "lauf", "law", "leiq", "lhaop", "lhauh", "lhech", "lheol", "lhesh", "lhet", "lhezh", "lhis", "lhoc", "lhoog", "loas", "log", "lom", "luus", "maos", "moen", "mol", "molh", "muc", "naf", "neep", "nef", "nialh", "nic", "nigh", "nilh", "noet", "obde", "obyu", "ochghe", "oco", "octi", "odci", "odli", "odo", "odya", "ofe", "ofro", "ofu", "oghi", "oju", "ojwi", "ole", "olha", "olhce", "olhtha", "olji", "omfi", "omi", "onli", "onqi", "onta", "onu", "opa", "opgho", "ophu", "oppe", "oqi", "oqu", "ore", "orgi", "orma", "oshi", "oshki", "oshla", "ostho", "othe", "othfo", "otho", "othu", "otu", "ovqo", "ovyu", "owi", "owu", "owvu", "oya", "oyi", "ozhi", "ozhsu", "ozhu", "peac", "peeb", "pem", "phaav", "phep", "pher", "phez", "phich", "phiip", "phij", "phoish", "phoix", "photh", "phov", "phoy", "phuay", "pic", "pieth", "pik", "pin", "piq", "poac", "poc", "poen", "poey", "pof", "pouv", "pul", "puz", "qab", "qauth", "qeux", "qiej", "qiesh", "qior", "qix", "qoad", "qoc", "qor", "raax", "raesh", "raez", "raf", "raow", "rich", "roov", "ruid", "ruov", "ruuch", "saey", "sej", "sek", "sen", "shat", "shauw", "sheop", "shiech", "shiin", "shil", "shilh", "shoig", "shoiz", "shuen", "shuev", "shuth", "siaq", "sigh", "siit", "siv", "sogh", "sooz", "suet", "sush", "tas", "tek", "tex", "thaith", "thax", "theer", "theeth", "thef", "thelh", "thet", "thiux", "thoc", "thosh", "thox", "thueph", "tiev", "tiib", "toib", "toim", "tuun", "uba", "ubpu", "uce", "ucha", "uchghi", "uchi", "uchno", "uco", "ude", "ufe", "ufghe", "ufta", "ufzhi", "uggo", "ugha", "ughqa", "ughu", "ugzo", "uha", "uhlhu", "ukdu", "ulhji", "ulho", "ullu", "ulo", "ulu", "umxe", "untu", "upfa", "upho", "uqte", "uqtha", "urgu", "usha", "ushko", "utda", "uthro", "uthu", "utlu", "utxi", "uva", "uvru", "uwu", "uxo", "uyo", "uzha", "uzhe", "uzhi", "uzhwi", "vazh", "vik", "voat", "voez", "vog", "vot", "waugh", "wauph", "weoq", "wid", "wium", "wot", "wuc", "wuur", "xaef", "xam", "xion", "xit", "xiut", "xoch", "xoy", "xuph", "yach", "yaugh", "yauth", "yeez", "yeor", "yeq", "yius", "yoz", "yuaj", "yuar", "yuot", "yuus", "zaf", "zaoy", "zap", "zat", "zaz", "zes", "zhah", "zheuc", "zhik", "zhish", "zhooy", "ziegh", "zoch", "zom", "zoux", "zueh", "zuj", "zun"];
  W.vehicleRobot = function (p, type = 1, level = W.number(p.x_level, 0, 0, 100)) {
    level = level > 0 ? int(1, level) : int(1, 20);
    const working = int(2, 12), work = working < 6 ? ' (totally ruined)' : working < 8 ? ' (poor condition)' : working < 10 ? ' (fair condition)' : working < 11 ? ' (good condition)' : working < 12 ? ' (excellent condition)' : ' (perfect condition)';
    const drained = W.d(3) === 1, power = drained ? ' totally drained of power.' : ' with ' + int(1, 10) + '0% power.', fuel = drained ? ' totally drained of fuel.' : ' with ' + int(1, 10) + '0% fuel.';
    const candle = () => pick(['black', 'blue', 'gray', 'green', 'red', 'brown', 'orange', 'yellow', 'purple', 'white']);
    const military = () => pick(['black', 'green camouflage', 'desert camouflage', 'snow camouflage', 'gray camouflage', 'green']);
    const colored = ([kind, name]) => (kind ? military() : candle()) + ' ' + name;
    const words = text => text.replace(/(^|\s)\S/g, c => c.toUpperCase());
    const slug = W.game(p).slug;
    if (slug === 'meta' && type === 1) return words(candle() + ' ' + pick(['hover car', 'anti-grav car', 'environmental car', 'bubble car', 'hover bike', 'hover bus', 'hover truck', 'anti-grav cart'])) + work + fuel;
    if (slug === 'meta') return words(pick(['agricultural ecology bot', 'wilderness ecology bot', 'standard engineering bot', 'light engineering bot', 'heavy engineering bot', 'medical bot', 'general household bot', 'security bot', 'supervisory bot', 'android', 'standard bot'])) + work + power;
    if (slug === 'gamma' && type !== 1) return words(pick(['light cargo lifter', 'heavy cargo lifter', 'light cargo transport', 'heavy cargo transport', 'ecology bot (ag)', 'ecology bot (wild)', 'engineering bot (std)', 'engineering bot (lt)', 'engineering bot (hvy)', 'medical robotoid', 'security robotoid', 'general household robotoid', 'supervisory borg', 'defense borg', 'attack borg', 'war bot', 'death machine'])) + work + power;
    if (slug !== 'urthe' && type === 1) return words(colored(pick([[1, 'military jeep'], [1, 'military truck'], [1, 'military tank'], [0, 'turbine car'], [0, 'hover car'], [0, 'anti-grav car'], [0, 'environmental car'], [0, 'bubble car'], [0, 'motorcycle'], [0, 'bus'], [0, 'car'], [0, 'truck'], [0, 'helicopter'], [0, 'hover bike'], [0, 'hover bus'], [0, 'hover truck']]))) + work + fuel;
    if (slug !== 'urthe') return words(pick(['light cargo litter', 'heavy cargo litter', 'small cargo transport', 'large cargo transport', 'agricultural ecology robot', 'wilderness ecology robot', 'standard engineering robot', 'light engineering robot', 'heavy engineering robot', 'medical robotoid', 'general household robot', 'security robot', 'supervisory borg', 'defense borg', 'attack borg', 'warbot', 'death machine', 'cybernetic installation', 'think tank'])) + work + power;
    if (type === 1) return words(colored(pick([[0, 'motorcycle'], [0, 'anti-grav cycle'], [0, 'jeep'], [0, 'anti-grav car'], [0, 'explorer'], [0, 'anti-grav explorer'], [0, 'helicopter'], [0, 'jet'], [0, 'semi truck'], [0, 'semi truck with trailer'], [0, 'ATV'], [0, 'bus'], [0, 'mini bus'], [0, 'car'], [0, 'dune buggy'], [0, 'hovercraft'], [0, 'moped'], [1, 'robotic tank'], [1, 'tank'], [1, 'anti-grav tank'], [1, 'cargo truck'], [1, 'jeep'], [0, 'pickup truck'], [0, 'van']]))) + work + fuel;
    // Broken Urthe robots: serial or alien name, software level by level, metal and fuel.
    const soft = ['I', 'I', 'I', 'II', 'II', 'III', 'III', 'IV', 'IV', 'V', 'V', 'VI', 'VI', 'VII', 'VII', 'VIII', 'VIII', 'IX', 'IX'][level] || 'X';
    const fuelType = pick(['alien technology', 'petroleum', 'electricity', 'radiation', 'plutonium', 'uranium', 'nuclear', 'xormite', 'xormite', 'xormite', 'xormite']);
    const metal = pick(['iron', 'aluminium', 'steel', 'plastoid', 'durasteel', 'crystal alloy', 'adamant', 'promethium', 'unobtainium', 'unknown metal']);
    let name = '';
    if (fuelType === 'alien technology') { name = pick(ALIEN_NAMES); name = name.charAt(0).toUpperCase() + name.slice(1); }
    else {
      let spaces = int(4, 6), dashit = false, perc = 100;
      while (spaces-- > 0) {
        perc -= 20;
        let dash = '';
        if (W.d(100) > perc && name !== '' && !dashit) { dashit = true; dash = '-'; }
        name = (W.d(100) > 60 ? String.fromCharCode(96 + W.d(26)) : String(int(0, 9))) + dash + name;
      }
      name = name.toUpperCase();
    }
    const [bot, skill] = pick([['exploration', 'geography'], ['medical', 'medicine'], ['science', 'science'], ['communication', 'sociology'], ['security', 'security'], ['tracking', 'sneaking'], ['spy', 'tracking'], ['operations', 'computers'], ['repair', 'mechanics'], ['piloting', 'piloting'], ['engineering', 'robotics'], ['battle', 'ranged']]);
    return words(name + ' ' + bot + ' ' + pick(['droid', 'bot', 'mech'])) + work + ' made mostly of ' + metal + ' and runs on ' + fuelType + ' for fuel. It has Software ' + soft + ' in ' + skill.charAt(0).toUpperCase() + skill.slice(1) + ' installed and is' + power;
  };
  W.strandedVehicle = p => W.vehicleRobot(p, 1);
  W.adventureRoom = function (p, number, total, cave = false, post = false) {
    const content = [], encounters = [], treasures = [], traps = [];
    const customText = W.dataText(p), custom = customText ? W.parseData(customText, { ...p, terrain: p.terrain || p.x_terrain || 'DG' }) : null;
    const atmosphere = W.atmosphere(p);
    const contents = [], hiding = [];
    if (yes(p, 'x_furnish')) {
      if (custom) { if (custom.decorations.length) contents.push(pick(custom.decorations)); }
      else if (post) attempts(p, 'u', [30, 1, 3, 0], () => {
        const item = W.postRoomItem(p);
        contents.push(item.text);
        if (item.place && item.size) hiding.push({ place: item.place, size: item.size });
      });
      else {
        const furniture = W.furnishDetails(p, cave);
        contents.push(furniture.text);
        hiding.push(...furniture.hiding);
      }
    }
    const furnish = contents.join('; ');
    // tool_uexfl.php/tool_uruins.php: with no atmosphere a post room reads "This area contains..." or "Empty of mundane items."
    if (post && !atmosphere && yes(p, 'x_furnish') && !custom) content.push('<p>' + esc(furnish ? 'This area contains...' + furnish.replace(/\.$/, '') + '.' : 'Empty of mundane items.') + '</p>');
    else if (atmosphere || furnish) content.push('<p>' + esc([atmosphere, furnish].filter(Boolean).join(' ')) + '</p>');
    // tool_uexfl.php always uses a fixed 2% unusual-room chance.
    if (W.d(100) <= (p.adventureMode === 'uexfl' ? 2 : W.number(p.x_weird, post ? 0 : 1, 0, 100))) content.push('<p><b>SOMETHING UNUSUAL IN THE ' + (p.adventureMode === 'uexfl' ? 'ROOM' : 'AREA') + '...</b> ' + esc(post && W.postFeature ? W.postFeature(p, total) : W.unusualRoom(p, total)) + '</p>');
    if (post && W.d(100) <= W.number(p.x_fveh, 0, 0, 100)) content.push('<p class="stranded-vehicle"><b>STRANDED VEHICLE NEXT TO THE BUILDING...</b><br>' + esc(W.strandedVehicle(p)) + '</p>');
    if (post && W.d(100) <= W.number(p.x_frob, 0, 0, 100)) content.push('<div class="stranded-robot"><b>' + (p.adventureMode === 'uruins' ? 'STRANDED ROBOT ' + (W.d(2) === 1 ? 'INSIDE' : 'NEXT TO') + ' THE BUILDING...' : 'DERELICT ROBOT IN THE ROOM...') + '</b><br>' + esc(W.vehicleRobot(p, 0)) + '</div>');
    let difficulty = 0, hoard = 0;
    attempts(p, 'c', [35, 1, 1, 0], () => {
      const options = { ...p, level: p.level ?? p.x_level ?? 0, terrain: p.terrain || 'DG', dungeonOnly: '1' };
      let monster;
      for (let i = 1; i <= 2; i++) if (!monster && p['x_enemy_' + i] && W.d(100) <= W.number(p['x_main_chance_' + i], 0, 0, 100)) monster = W.monsters({ ...options, level: 0, terrain: '' }).find(m => String(m.id) === String(p['x_enemy_' + i]) || W.monsterName(m) === p['x_enemy_' + i]);
      if (!monster && p.floorType === 'T' && W.d(100) > 20) monster = W.monsterPick({ ...options, x_undead: '1' });
      monster ||= W.monsterPick(options);
      if (!monster && yes(p, 'x_outside', 0)) monster = W.monsterPick({ ...options, terrain: p.x_terrain || 'DG', dungeonOnly: '0' });
      if (!monster) { content.push('<p class="empty-encounter">No Enemies Found for this terrain and level.</p>'); return; }
      difficulty = Math.max(difficulty, +monster.difficulty || 0);
      if (yes(p, 'x_rich', 0)) hoard = Math.max(hoard, ({ 1: 70, 2: 90, 3: 50 })[+monster.m_hoard] || 0);
      const life = W.monsterLife(monster, options);
      encounters.push({ id: monster.id, name: W.monsterName(monster), life, difficulty: +monster.difficulty || 0 });
      content.push(`<div class="room-encounter"><b>ENCOUNTER:</b> ${W.monsterStats(monster, yes(p, 'x_describe'), options)}${monster.custom ? '' : `<p>There ${life.length === 1 ? 'is' : 'are'} ${life.length} in this area. <b>${W.isTroll(p) ? 'MR' : W.game(p).slug === 'urthe' ? 'STAMINA' : 'HIT POINTS'}:</b> ${life.join(', ')}</p>`}</div>`);
    });
    const trapText = type => custom ? custom.traps.length ? pick(custom.traps) : '' : post && W.postTrap ? W.postTrap(p, type) : W.trap(p, type);
    attempts(p, 't', [10, 1, 1, 0], () => { const text = trapText('room'); if (text) { traps.push(text); content.push('<p class="room-trap"><b>TRAP:</b> ' + esc(text) + '</p>'); } });
    const level = difficulty || W.number(p.level ?? p.x_level, 0, 0, 100) || int(1, 20);
    const chance = W.number(p.x_l_c, 20, 0, 100), adjusted = Math.min(100, chance + (difficulty ? difficulty * W.number(p.x_adjust, 2, 0, 100) : 0) + (chance ? hoard : 0));
    const lootOptions = { ...p, level }, treasureState = { coins: false };
    attempts({ ...p, x_l_c: adjusted }, 'l', [20, 1, 5, 20], () => {
      const hidden = !custom && hiding.length ? hiding.shift() : null;
      const container = hidden ? 'Located ' + hidden.place : custom ? custom.containers.length ? pick(custom.containers) : '' : post && W.postContainer ? W.postContainer(p) : W.container();
      const trapped = W.d(100) <= W.number(p.x_rigged_chance, 30, 0, 100), trap = trapped ? trapText(hidden ? 'item' : 'box') : '';
      const treasure = custom ? W.dataTreasure(custom) : W.adventureFind(lootOptions, treasureState, hidden?.size || 3, post);
      if (!treasure) return;
      treasures.push({ container, trap, treasure, size: hidden?.size || 3 });
      content.push(`<p class="room-treasure"><b>TREASURE:</b> ${esc(container)}${trap ? ' [TRAPPED: ' + esc(trap) + ']' : ''}: ${esc(treasure)}</p>`);
    });
    return { number, encounters, traps, treasures, html: `<section class="adventure-room" data-room="${number}"><h3>${number}.</h3>${content.length ? content.join('') : '<p>This area is empty.</p>'}</section>` };
  };
  W.adventureFields = [W.gameField, f('x_area', 'Adventure name', 'text'), f('width', 'Map width', 'number', { value: 1, min: 1, max: 10 }), f('height', 'Map height', 'number', { value: 1, min: 1, max: 10 }), f('map_rooms', 'Rooms on your own map (0 = generate map)', 'number', { value: 0, min: 0, max: 1000 }), f('x_level', 'Party level (0 = any)', 'number', { value: 0, min: 0, max: 100 }), f('x_characters', 'Party size (0 = random)', 'number', { value: 0, min: 0, max: 100 }), f('x_terrain', 'Outdoor terrain', 'select', { value: 'DG', options: W.terrains }), f('x_outside', 'Use outdoor creatures', 'checkbox'), f('atmo', 'Atmosphere (999 = none)', 'number', { value: 999, min: 0, max: 999 }), f('x_furnish', 'Furnish rooms', 'checkbox', { value: 1 }), f('x_describe', 'Describe creatures', 'checkbox', { value: 1 }), f('x_weird', 'Unusual features (%)', 'number', { value: 1, min: 0, max: 100 }), f('x_cut', 'Treasure value (%)', 'number', { value: 100, min: 0, max: 1000 }), f('x_rigged_chance', 'Trapped containers (%)', 'number', { value: 30, min: 0, max: 100 }), f('wandering', 'Wandering encounter tables', 'checkbox', { value: 1 }), ...[['c', 'Encounters', 35, 1, 0], ['t', 'Traps', 10, 1, 0], ['l', 'Treasure', 20, 5, 20]].flatMap(([code, label, chance, max, reduction]) => [f('x_' + code + '_c', label + ' (%)', 'number', { value: chance, min: 0, max: 100 }), f('x_' + code + '_c_min', label + ' minimum', 'number', { value: 1, min: 0, max: 100 }), f('x_' + code + '_c_max', label + ' maximum', 'number', { value: max, min: 0, max: 100 }), f('x_' + code + '_c_low', label + ' chance reduction', 'number', { value: reduction, min: 0, max: 100 })]), ...W.dataFields];
  W.adventureFields.push(f('x_undead', 'Undead only', 'checkbox'), f('x_adjust', 'Extra loot chance per enemy level (%)', 'number', { value: 2, min: 0, max: 100 }), f('x_rich', 'Hoarding creatures have treasure', 'checkbox'), f('x_low_magic', 'Magic item chance (%)', 'number', { value: 100, min: 0, max: 100 }), f('x_whichmagic', 'Original game magic items (%)', 'number', { value: 50, min: 0, max: 100 }), f('aec', 'Include AEC', 'checkbox'), f('dd_ff', 'Include Fiend Folio', 'checkbox'), f('dd_mm2', 'Include Monster Manual II', 'checkbox'), f('x_extra', 'Include Monsters of Myth', 'checkbox'));
  W.adventure = function (p, mode) {
    const post = ['uexfl', 'uruins'].includes(mode), game = p.game || (p.x_game || p.x_package ? W.game(p).slug : post ? 'mutfut' : W.game(p).slug), options = { ...p, game, adventureMode: mode };
    const complex = mode === 'delve' && ['Complex', 'Progressive'].includes(p.x_delve), progressive = p.x_delve === 'Progressive';
    const own = W.number(p.map_rooms, 0, 0, 1000), type = mode === 'delve' ? 'Side View' : p.type || p.map_type || (mode === 'uexfl' ? 'Building' : 'Cavernous Dungeon');
    const map = own ? { html: '', tiles: [], rooms: W.range(own, W.number(p.start ?? p.map_numbers, 1, 1, 100000)).map(number => ({ number, type: 'D', size: 'S' })) } : W.geomorphMap({ ...p, type, complex: complex ? '1' : '0', keyed: '1' }, mode === 'uruins' ? 'ruins' : mode === 'uexfl' ? 'scifi' : 'dungeon');
    const floors = [], rooms = [];
    let careerLevel = W.number(p.x_level, 1, 1, 100), currentFloor = 0;
    const maximumLevel = Math.max(careerLevel, game === 'ssxs' ? 6 : 21), floorsPerLevel = Math.round(map.rooms.length / Math.max(1, maximumLevel - careerLevel));
    let html = `<h2>${esc(p.x_area || ({ delve: 'Dungeon Delve', ultimate: 'Ultimate Dungeon', uexfl: 'Ultimate Sci-Fi Adventure', uruins: 'Ultimate Ruins' })[mode])}</h2>` + map.html;
    for (const [index, area] of map.rooms.entries()) {
      const remaining = map.rooms.length - index - 1;
      if (progressive && (++currentFloor >= floorsPerLevel && careerLevel < maximumLevel || remaining < 5 && careerLevel < 16 || remaining < 4 && careerLevel < 17 || remaining < 3 && careerLevel < 18 || remaining < 2 && careerLevel < 19 || remaining < 1 && careerLevel < 20)) { careerLevel++; currentFloor = 0; }
      const level = progressive ? careerLevel : options.x_level;
      const floorOptions = { ...options, x_level: level, floorType: area.type };
      if (complex) {
        const size = area.type === 'W' ? [1, 1] : area.size === 'L' ? W.d(2) === 1 ? [2, 1] : [1, 2] : area.size === 'M' ? [1, 1] : [0, 0];
        const floor = W.geomorphMap({ ...p, width: size[0], height: size[1], type: area.type === 'W' ? 'Water Cavern' : area.type === 'C' ? 'Cavernous' : 'Dungeon', interior: '1', keyed: '1', start: 1 }, 'dungeon');
        floors.push({ number: area.number, level, tiles: floor.tiles, rooms: floor.rooms });
        html += `<section class="delve-floor"><h2>Floor ${area.number}${progressive ? ' — Level ' + level : ''}</h2>${floor.html}`;
        for (const room of floor.rooms) { const result = W.adventureRoom(floorOptions, room.number, floor.rooms.length, ['C', 'W'].includes(area.type)); rooms.push({ floor: area.number, ...result }); html += result.html; }
        html += '</section>';
      } else {
        const result = W.adventureRoom(floorOptions, area.number, map.rooms.length, /cavern/i.test(type), post);
        rooms.push(result); html += result.html;
      }
    }
    if (yes(p, 'wandering')) {
      const count = progressive ? W.isTroll(options) || game === 'ssxs' ? 35 : 39 : W.isTroll(options) || game === 'ssxs' ? 11 : 12;
      for (const [terrain, label] of [['DG', 'RANDOM ENCOUNTERS IN THIS DUNGEON'], ...(p.x_terrain && p.x_terrain !== 'DG' ? [[p.x_terrain, 'RANDOM ENCOUNTERS OUTDOORS']] : [])]) html += `<section class="adventure-wandering"><h3>${label}</h3>` + W.routes.wander.generate({ ...options, terrain, n: count }) + '</section>';
    }
    W.storage.set('last-adventure', { mode, options: p, tiles: map.tiles, floors, rooms });
    return html;
  };
  for (const [route, title] of [['delve', 'Dungeon Delve'], ['ultimate', 'Ultimate Dungeon'], ['uexfl', 'Ultimate Sci-Fi Adventure'], ['uruins', 'Ultimate Ruins']]) {
    const fields = [...W.adventureFields];
    if (route === 'delve') fields.push(f('x_delve', 'Delve type', 'select', { value: 'Simple', options: ['Simple', 'Complex', 'Progressive'] }), f('x_floors', 'Omit floors (%)', 'number', { value: 0, min: 0, max: 100 }));
    else if (route === 'ultimate') fields.push(f('type', 'Map type', 'select', { value: 'Cavernous Dungeon', options: ['Dungeon', 'Cavernous', 'Cavernous Dungeon'] }));
    else if (route === 'uexfl') fields.push(f('type', 'Map type', 'select', { value: 'Building', options: ['Building', 'Spaceship', 'Exodus Spaceship'] }));
    W.register(route, title, 'Generate a map and keyed adventure with room contents, encounters, traps, treasure and wandering enemies. Results stay on this computer.', fields, p => W.adventure(p, route));
  }
})(window.WZ, window.WZ_DATA);
