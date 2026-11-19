(function (W) {
  'use strict';
  const pick = rows => W.pick(rows), int = (a, b) => W.rng.int(a, b), sign = n => n > 0 ? '+' + n : String(n);
  W.osricModifiers = function (stats, className, race, exceptional = 0) {
    const strength = stats.STR, dexterity = stats.DEX, constitution = stats.CON, wisdom = stats.WIS;
    const strengthRow = strength > 18 ? [3, 6, '1-5', '40%'] : strength > 17 ? exceptional > 90 ? [2, 5, '1-4', '35%'] : exceptional > 75 ? [2, 4, '1-4', '30%'] : exceptional > 50 ? [2, 3, '1-4', '25%'] : exceptional > 0 ? [1, 3, '1-3', '20%'] : [1, 2, '1-3', '16%'] : strength > 16 ? [1, 1, '1-3', '13%'] : strength > 15 ? [0, 1, '1-3', '10%'] : strength > 13 ? [0, 0, '1-2', '7%'] : strength > 11 ? [0, 0, '1-2', '4%'] : strength > 9 ? [0, 0, '1-2', '2%'] : strength > 7 ? [0, 0, '1-2', '1%'] : strength < 4 ? [-3, -1, '1', '0%'] : strength < 6 ? [-2, -1, '1', '0%'] : [-1, 0, '1', '0%'];
    const dex = dexterity > 17 ? [3, -4] : dexterity > 16 ? [2, -3] : dexterity > 15 ? [1, -2] : dexterity > 14 ? [0, -1] : dexterity < 4 ? [-3, 4] : dexterity < 5 ? [-2, 3] : dexterity < 6 ? [-1, 2] : dexterity < 7 ? [0, 1] : [0, 0];
    const warrior = ['Fighter', 'Paladin', 'Ranger'].includes(className);
    const hp = constitution > 16 && warrior ? constitution - 14 : constitution > 15 ? 2 : constitution > 14 ? 1 : constitution < 4 ? -2 : constitution < 7 ? -1 : 0;
    const survival = { 3: [40, 35], 4: [45, 40], 5: [50, 45], 6: [55, 50], 7: [60, 55], 8: [65, 60], 9: [70, 65], 10: [75, 70], 11: [80, 75], 12: [85, 80], 13: [90, 85], 14: [92, 88], 15: [94, 91], 16: [96, 95], 17: [98, 97] }[constitution] || [100, 99];
    const languages = stats.INT > 18 ? 8 : stats.INT > 17 ? 7 : stats.INT > 16 ? 6 : stats.INT > 15 ? 5 : stats.INT > 13 ? 4 : stats.INT > 11 ? 3 : stats.INT > 9 ? 2 : stats.INT > 7 ? 1 : 0;
    const mentalSave = wisdom > 14 ? wisdom - 14 : wisdom < 4 ? -3 : wisdom < 5 ? -2 : wisdom < 8 ? -1 : 0;
    const hench = { 3: [1, -30, -25], 4: [1, -30, -25], 5: [2, -25, -20], 6: [2, -20, -15], 7: [3, -15, -10], 8: [3, -10, -5], 9: [4, -5, 0], 10: [4, 0, 0], 11: [4, 0, 0], 12: [5, 0, 0], 13: [5, 0, 5], 14: [6, 5, 10], 15: [7, 15, 15], 16: [8, 20, 25], 17: [10, 30, 30], 18: [15, 40, 35], 19: [20, 50, 40] }[stats.CHA];
    return { hit: strengthRow[0], damage: strengthRow[1], minor: strengthRow[2], major: strengthRow[3], surprise: dex[0], range: dex[0], acAdjustment: dex[1], hp, resurrection: survival[0], systemShock: survival[1], languages, mentalSave, racialSave: ['Dwarf', 'Gnome', 'Halfling'].includes(race) ? Math.floor(constitution / 3.5) : 0, henchmen: hench[0], loyalty: hench[1], reaction: hench[2] };
  };
  W.osricAbilities = function (className, race, level, modifiers) {
    const abilities = [];
    if (race !== 'Human') abilities.push('Infravision 60 feet');
    if (race === 'Dwarf') abilities.push('+1 to hit goblins, half-orcs, hobgoblins and orcs; giants, ogres, ogre mages, titans and trolls suffer -4 to attack');
    if (race === 'Gnome') abilities.push('+1 to hit kobolds and goblins; bugbears, giants, gnolls, ogres, ogre mages, titans and trolls suffer -4 to attack');
    if (race === 'Elf' || race === 'Half-Elf') abilities.push((race === 'Elf' ? '90%' : '30%') + ' resistance to sleep and charm spells');
    if (race === 'Halfling') abilities.push('+3 attack bonus with bows and slings');
    if (modifiers.racialSave) abilities.push(sign(modifiers.racialSave) + ' to saves against magic' + (race === 'Halfling' ? ', rods, staffs, wands' : '') + ' and poison');
    if (modifiers.mentalSave) abilities.push(sign(modifiers.mentalSave) + ' to mental saving throws');
    if (className === 'Druid') abilities.push('+2 to saves against fire and lightning');
    if (className === 'Fighter' && level > 6) abilities.push(level > 12 ? 'Two attacks per round' : 'Three attacks every two rounds');
    if (className === 'Ranger') {
      abilities.push('+' + level + ' melee damage against evil humanoids or giant opponents');
      if (level > 7) abilities.push(level > 14 ? 'Two attacks per round' : 'Three attacks every two rounds');
      if (level > 9) abilities.push('May use devices such as crystal balls for scrying');
    }
    if (className === 'Paladin') {
      abilities.push('Cure disease by touch ' + (level > 9 ? 'three times' : level > 6 ? 'twice' : 'once') + ' a week', "Detect evil 60 feet; radiates a 10-foot aura of protection from evil", 'Lay hands once daily: heal ' + level * 2 + ' hit points');
      if (level > 4) abilities.push('Turn undead as a level ' + (level - 2) + ' cleric');
      if (level > 7) abilities.push(level > 15 ? 'Two attacks per round' : 'Three attacks every two rounds');
    }
    return abilities;
  };
  W.osricGear = function (p, className, level, dexAdjustment) {
    const primary = [['battle axe', 2], ['halberd', 2], ['javelin', 2], ['morning star', 1], ['heavy pick', 2], ['light pick', 1], ['pole arm', 2], ['spear', 2], ['claymore', 2], ['bastard sword', 2], ['broad sword', 2], ['long sword', 1], ['scimitar', 1], ['short sword', 1], ['two-handed sword', 2], ['trident', 2], ['club', 1], ['staff', 2], ['heavy mace', 2], ['light mace', 1], ['heavy war hammer', 2], ['light war hammer', 1], ['heavy flail', 2], ['light flail', 1]];
    let weapons = primary;
    if (className === 'Thief') weapons = [['club', 1], ['dagger', 1], ['long sword', 1], ['scimitar', 1], ['short sword', 1]];
    if (['Magic-User', 'Illusionist'].includes(className)) weapons = [['dagger', 1], ['staff', 2]];
    if (className === 'Cleric') weapons = [['club', 1], ['staff', 2], ['heavy mace', 2], ['light mace', 1], ['heavy war hammer', 2], ['light war hammer', 1], ['heavy flail', 2], ['light flail', 1]];
    if (className === 'Druid') weapons = [['club', 1], ['staff', 2], ['heavy war hammer', 2], ['light war hammer', 1], ['scimitar', 1], ['spear', 2]];
    const chosen = pick(weapons), parts = [chosen[0]], pack = [];
    const armorPool = ['Magic-User', 'Illusionist'].includes(className) ? [['robes', 0]] : ['Thief', 'Assassin', 'Druid'].includes(className) ? [['leather armor', 2], ['studded leather armor', 3]] : [['leather armor', 2], ['studded leather armor', 3], ['banded mail armor', 6], ['chain mail armor', 5], ['plate mail armor', 7], ['ring mail armor', 3], ['scale mail armor', 4], ['splint mail armor', 6]];
    let [armor, protection] = pick(armorPool);
    if (className !== 'Cleric' && W.d(100) > 60) {
      const ranged = ['Thief', 'Druid'].includes(className) ? ['dagger', 'darts (' + int(5, 20) + ' ea)', 'sling, sling stones (' + int(10, 30) + ' ea)'] : ['Magic-User', 'Illusionist'].includes(className) ? ['darts (' + int(5, 20) + ' ea)'] : ['darts (' + int(5, 20) + ' ea)', ...['long bow', 'short bow', 'composite long bow', 'composite short bow'].map(name => name + ', arrows (' + int(10, 30) + ' ea)'), ...['heavy crossbow', 'light crossbow'].map(name => name + ', crossbow bolts (' + int(10, 30) + ' ea)'), 'sling, sling stones (' + int(10, 30) + ' ea)', 'hand axe', 'dagger'];
      parts.push(pick(ranged));
    }
    const shieldChance = ({ Assassin: 30, Druid: 40, Fighter: 70, Cleric: 70, Paladin: 70, Ranger: 70 })[className] || 0;
    if (chosen[1] !== 2 && W.d(100) <= shieldChance) { armor += className === 'Druid' ? ', wooden shield' : ', shield'; protection++; }
    if (className === 'Thief' || className === 'Assassin') pack.push('thief tools');
    if (['Magic-User', 'Illusionist'].includes(className)) pack.push('spell book');
    if (className === 'Cleric') { pack.push(pick(['wooden', 'silver', 'iron']) + ' holy symbol'); if (W.d(3) !== 3) pack.push('holy water'); if (W.d(3) !== 3) pack.push('prayer beads'); }
    if (className === 'Druid') pack.push(pick(['mistletoe', 'holly', 'oak leaves']));
    pack.push(pick(['bedroll', 'blanket']), pick(['backpack', 'leather sack']), pick(['cheese', 'bread', 'ration']), pick(['waterskin', 'bottle of water', 'bottle of wine', 'bottle of ale']));
    const gear = ['scroll case', 'chain (' + int(5, 20) + ' ft)', 'crowbar', 'empty flask', 'flint & steel', 'garlic (' + int(2, 6) + ' ea)', (W.d(2) === 1 ? 'grappling hook, ' : '') + 'rope (' + int(2, 10) * 10 + ' ft)', 'hammer', 'vial of ink', 'quill', 'torch', pick(['bullseye', 'hooded']) + ' lantern', 'lock & key', 'manacles', 'small mirror', 'flask of oil', 'paper (' + int(5, 20) + ' ea)', 'ten foot pole', 'hammer & chisel', 'shovel', 'iron spikes (' + int(5, 20) + ' ea)', 'spyglass', 'wooden stakes (' + int(3, 8) + ' ea)', 'candle', 'wolfsbane', 'chalk', 'bell', 'bone dice', 'fishing net', 'needle & thread', 'whistle', 'tent', 'twine (' + int(4, 10) * 10 + ' ft)', 'whetstone'];
    pack.push(...W.shuffle(gear).slice(0, int(3, 7)));
    if (String(p.x_relics) === '1') {
      const enchant = Math.max(1, Math.ceil(level / 5));
      if (W.d(100) <= level * 10) parts[0] += ' +' + int(1, enchant);
      if (protection && W.d(100) <= level * 10) { const extra = int(1, enchant); armor += ' +' + extra; protection += extra; }
    }
    return { weapon: parts.join(', '), armor, protection, ac: Math.max(-10, Math.min(10, 10 - protection + dexAdjustment)), equipment: pack.join(', ') };
  };
})(window.WZ);
