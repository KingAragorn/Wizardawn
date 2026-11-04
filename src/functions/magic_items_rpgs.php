<?php

function getADDPower($table)
{
	if ($table == 1){$dice = mt_rand(1,50);}
	else if ($table == 2){$dice = mt_rand(51,101);}
	else if ($table == 3){$dice = mt_rand(102,125);}
	else if ($table == 4){$dice = mt_rand(126,159);}
	else if ($table == 5){$dice = mt_rand(160,197);}
	else {$dice = mt_rand(198,215);}

	switch ($dice)
	{
		case 1: $arty = "{I}&nbsp;Adds 1 point to possessor`s major attribute"; break;
		case 2: $arty = "{I}&nbsp;Animate dead (1 figure) (by touch) - 7 times/week"; break;
		case 3: $arty = "{I}&nbsp;Audible glamer upon command - 3 times/day"; break;
		case 4: $arty = "{I}&nbsp;Bless (by touch)"; break;
		case 5: $arty = "{I}&nbsp;Clairaudience (when touched to the ear)"; break;
		case 6: $arty = "{I}&nbsp;Clairvoyance (when touched to the eyes)"; break;
		case 7: $arty = "{I}&nbsp;Color spray - 3 times/day"; break;
		case 8: $arty = "{I}&nbsp;Comprehend languages when held"; break;
		case 9: $arty = "{I}&nbsp;Create food and water - 1 time/day"; break;
		case 10: $arty = "{I}&nbsp;Cure light wounds - 7 times/week"; break;
		case 11: $arty = "{I}&nbsp;Darkness (" . (mt_rand(1,3)*5) . "` radius) - 3 times/day"; break;
		case 12: $arty = "{I}&nbsp;Detect charm - 3 times/day"; break;
		case 13: $arty = "{I}&nbsp;Detect evil/good when held or ordered"; break;
		case 14: $arty = "{I}&nbsp;Detect invisibility when held and ordered"; break;
		case 15: $arty = "{I}&nbsp;Detect magic - 3 times/day"; break;
		case 16: $arty = "{I}&nbsp;ESP (" . (mt_rand(3,6)*10) . "` range) - 3 times/day"; break;
		case 17: $arty = "{I}&nbsp;Feather fall when grasped and ordered"; break;
		case 18: $arty = "{I}&nbsp;Find traps - 3 times/day"; break;
		case 19: $arty = "{I}&nbsp;Fly when held and ordered - 1 time/day"; break;
		case 20: $arty = "{I}&nbsp;Hypnotic pattern (when moved) - 3 times/day"; break;
		case 21: $arty = "{I}&nbsp;Infravision when held or worn"; break;
		case 22: $arty = "{I}&nbsp;Invisibility (improved) - 3 times/day"; break;
		case 23: $arty = "{I}&nbsp;Know alignment when held and ordered - 1 time/day"; break;
		case 24: $arty = "{I}&nbsp;Levitate when held and ordered - 3 times/day"; break;
		case 25: $arty = "{I}&nbsp;Light - 7 times/week"; break;
		case 26: $arty = "{I}&nbsp;Mind blank - 3 times/day"; break;
		case 27: $arty = "{I}&nbsp;Obscurement - 1 time/day"; break;
		case 28: $arty = "{I}&nbsp;Pass without trace - 1 time/day"; break;
		case 29: $arty = "{I}&nbsp;Possessor immune to disease"; break;
		case 30: $arty = "{I}&nbsp;Possessor immune to fear"; break;
		case 31: $arty = "{I}&nbsp;Possessor immune to gas of any type"; break;
		case 32: $arty = "{I}&nbsp;Possessor need neither eat nor drink for up to 1 week"; break;
		case 33: $arty = "{I}&nbsp;Protection +2 when held or worn"; break;
		case 34: $arty = "{I}&nbsp;Remove fear by touch"; break;
		case 35: $arty = "{I}&nbsp;Sanctuary when held or worn - 1 time/day"; break;
		case 36: $arty = "{I}&nbsp;Shield, when held or worn, upon command - 3 times/day"; break;
		case 37: $arty = "{I}&nbsp;Speak with animals - 3 times/day"; break;
		case 38: $arty = "{I}&nbsp;Speak with dead - 1 time/day"; break;
		case 39: $arty = "{I}&nbsp;Speak with plants - 7 times/week"; break;
		case 40: $arty = "{I}&nbsp;Tongues when held or worn and commanded"; break;
		case 41: $arty = "{I}&nbsp;Ultravision when held or worn"; break;
		case 42: $arty = "{I}&nbsp;Ventriloquism upon command - 3 times/day"; break;
		case 43: $arty = "{I}&nbsp;Water breathing upon command"; break;
		case 44: $arty = "{I}&nbsp;Water walking ability"; break;
		case 45: $arty = "{I}&nbsp;Wearer immune ta charm or hold spells"; break;
		case 46: $arty = "{I}&nbsp;Wearer immune to magic missiles"; break;
		case 47: $arty = "{I}&nbsp;Web - 1 time/day"; break;
		case 48: $arty = "{I}&nbsp;Wizard lock - 7 times/week"; break;
		case 49: $arty = "{I}&nbsp;Write - 1 time/day"; break;
		case 50: $arty = "{I}&nbsp;Zombie animation - 1 time/week"; break;
		case 51: $relic = array('II', 'III'); $arty = "{II}&nbsp;Animal summoning " . $relic[mt_rand(0,1)] . " - 2 times/day"; break;
		case 52: $arty = "{II}&nbsp;Animate object upon command - 1 time/day"; break;
		case 53: $arty = "{II}&nbsp;+2 to armor class of possessor or AC 0, whichever is better"; break;
		case 54: $arty = "{II}&nbsp;Cause serious wounds by touch"; break;
		case 55: $arty = "{II}&nbsp;Charm monster - 2 times/day"; break;
		case 56: $arty = "{II}&nbsp;Charm person - 7 times/week"; break;
		case 57: $arty = "{II}&nbsp;Cone of cold (9 - 12 dice) - 2 times/day"; break;
		case 58: $arty = "{II}&nbsp;Confusion - 1 time/day"; break;
		case 59: $arty = "{II}&nbsp;Cure blindness by touch"; break;
		case 60: $arty = "{II}&nbsp;Cure disease by touch"; break;
		case 61: $arty = "{II}&nbsp;Dimension door - 2 times/day"; break;
		case 62: $arty = "{II}&nbsp;Disintegrate - 1 time/day"; break;
		case 63: $arty = "{II}&nbsp;Dispel illusion upon command - 2 times/day"; break;
		case 64: $arty = "{II}&nbsp;Dispel magic upon command - 2 times/day"; break;
		case 65: $arty = "{II}&nbsp;Double movement speed (on foot)"; break;
		case 66: $arty = "{II}&nbsp;Emotion - 2 times/day"; break;
		case 67: $arty = "{II}&nbsp;Exorcise - 1 time/month"; break;
		case 68: $arty = "{II}&nbsp;Fear by touch or gaze"; break;
		case 69: $arty = "{II}&nbsp;Fireball (9 - 12 dice) - 2 times/day"; break;
		case 70: $arty = "{II}&nbsp;Fire shield - 2 times/day"; break;
		case 71: $relic = array('Storm', 'Cloud', 'Fire', 'Frost', 'Stone', 'Hill'); $arty = "{II}&nbsp;" . $relic[mt_rand(0,5)] . " giant strength for 2 turns"; break; 
		case 72: $arty = "{II}&nbsp;Haste - 1 time/day"; break;
		case 73: $arty = "{II}&nbsp;Heal - 1 time/day"; break;
		case 74: $arty = "{II}&nbsp;Hold animal - 1 time/day"; break;
		case 75: $arty = "{II}&nbsp;Hold monster - 1 time/day"; break;
		case 76: $arty = "{II}&nbsp;Hold person - 1 time/day"; break;
		case 77: $arty = "{II}&nbsp;Lightning bolt (9 - 12 dice) - 2 times/day"; break;
		case 78: $arty = "{II}&nbsp;Minor globe of invulnerability - 1 time/day"; break;
		case 79: $arty = "{II}&nbsp;Paralyzation by touch"; break;
		case 80: $arty = "{II}&nbsp;Passwall - 2 times/day"; break;
		case 81: $arty = "{II}&nbsp;Phantasmal killer - 1 time/day"; break;
		case 82: $arty = "{II}&nbsp;Polymorph self - 7 times/week"; break;
		case 83: $arty = "{II}&nbsp;Regenerate 2 hp/turn (but not if killed)"; break;
		case 84: $arty = "{II}&nbsp;Remove curse by touch - 7 times/week"; break;
		case 85: $arty = "{II}&nbsp;Slow - 1 time/day"; break;
		case 86: $arty = "{II}&nbsp;Speak with monster - 2 times/day"; break;
		case 87: $arty = "{II}&nbsp;Stone to flesh - 1 time/day"; break;
		case 88: $arty = "{II}&nbsp;Suggestion - 2 times/day"; break;
		case 89: $arty = "{II}&nbsp;Telekinesis (" . mt_rand(1,6) . ",000 gp weight) - 2 times/day"; break;
		case 90: $arty = "{II}&nbsp;Teleport (no error) - 2 times/day"; break;
		case 91: $arty = "{II}&nbsp;Transmute rock to mud - 2 times/day"; break;
		case 92: $arty = "{II}&nbsp;True seeing - 1 time/day"; break;
		case 93: $arty = "{II}&nbsp;Turn wood - 1 time/day"; break;
		case 94: $arty = "{II}&nbsp;Wall of fire - 2 times/day"; break;
		case 95: $arty = "{II}&nbsp;Wall of ice - 2 times/day"; break;
		case 96: $arty = "{II}&nbsp;Wall of thorns - 2 times/day"; break;
		case 97: $arty = "{II}&nbsp;Weapon damage is +2 hit points"; break;
		case 98: $arty = "{II}&nbsp;Wind walk - 1 time/day"; break;
		case 99: $arty = "{II}&nbsp;Wizard eye - 2 times/day"; break;
		case 100: $arty = "{II}&nbsp;Word of recall - 1 time/day"; break;
		case 101: $arty = "{II}&nbsp;X-ray vision - 2 times/day"; break;
		case 102: $arty = "{III}&nbsp;Acne on possessor`s face"; break;
		case 103: $arty = "{III}&nbsp;Blindness for 1d4 rounds when first used against an enemy"; break;
		case 104: $arty = "{III}&nbsp;Body odor noticeable at 10 distance"; break;
		case 105: $arty = "{III}&nbsp;Deafness for 1 - 4 turns when first used against an enemy"; break;
		case 106: $arty = "{III}&nbsp;Gems or jewelry found never increase in value"; break;
		case 107: $arty = "{III}&nbsp;Holy water within 10` of item becomes polluted"; break;
		case 108: $arty = "{III}&nbsp;Lose 1d4 points of charisma for 1d4 days when major power used"; break;
		case 109: $arty = "{III}&nbsp;Possessor loses interest in sex"; break;
		case 110: $arty = "{III}&nbsp;Possessor has satyriasis"; break;
		case 111: $arty = "{III}&nbsp;Possessor`s hair turns white"; break;
		case 112: $arty = "{III}&nbsp;Saving throws versus magic are at -1"; break;
		case 113: $arty = "{III}&nbsp;Saving throws versus poison are at -2"; break;
		case 114: $arty = "{III}&nbsp;Sense of smell lost for 2d4 hours when first used against an enemy"; break;
		case 115: $arty = "{III}&nbsp;Small fires (torches, candles, etc) extinguished when major power used"; break;
		case 116: $arty = "{III}&nbsp;Small items of wood rot from possessor`s touch (any item up to normal door size, 1-7 days time)"; break;
		case 117: $arty = "{III}&nbsp;Touch of possessor kills green plants"; break;
		case 118: $arty = "{III}&nbsp;User causes hostility towards himself in all mammals within 60 inches"; break;
		case 119: $arty = "{III}&nbsp;User must eat and drink 6 times the normal amount due to the item`s drain upon him or her"; break;
		case 120: $arty = "{III}&nbsp;User`s sex changes"; break;
		case 121: $arty = "{III}&nbsp;Wart appears on possessor`s nose"; break;
		case 122: $arty = "{III}&nbsp;Weight gain of " . mt_rand(1,4) . "0 pounds"; break;
		case 123: $arty = "{III}&nbsp;Weight loss of " . mt_rand(5,30) . " pounds"; break;
		case 124: $arty = "{III}&nbsp;Yearning for item forces possessor to never be away from it for more than 1 day if at all possible"; break;
		case 125: $arty = "{III}&nbsp;Yelling becomes necessary to invoke spells with verbal components"; break;
		case 126: $arty = "{IV}&nbsp;Body rot is 10% cumulative likely whenever a primary power is used, and part of the body is lost permanently"; break;
		case 127: $arty = "{IV}&nbsp;Capricious alignment change each time a primary power is used"; break;
		case 128: $arty = "{IV}&nbsp;Geas/quest placed upon possessor"; break;
		case 129: $arty = "{IV}&nbsp;Item contains the life force of another person, and after a set number of uses, the possessor`s life force is drawn into it and the former soul released"; break;
		case 130: $arty = "{IV}&nbsp;Item has power to affect its possessor when a primary power is used if the character has not followed the alignment or purposes of the artifact/relic"; break;
		case 131: $arty = "{IV}&nbsp;Item is a prison for a powerful being; and there is a 1-4% cumulative chance per usage that it will break free, kill the possessor`s soul, and, using his or her body, proceed to slay all associates and henchmen of this character"; break;
		case 132: $arty = "{IV}&nbsp;Item is itself a living, sentient being forced to serve; but each usage of a primary power gives a 1-3% cumulative possibility that the spell will be broken and the being will (d4): 1) change the possessor into a like artifact/relic; 2) geas/quest the possessor to perform a mission of its choosing; 3) kill the possessor; 4) mentally enslave the possessor for a period of 2d4 weeks"; break;
		case 133: $arty = "{IV}&nbsp;Item is powerless against and hates 1-3 species of creatures, and when within 10 inches of any such creatures it forces its possessor to attack"; break;
		case 134: $arty = "{IV}&nbsp;Item releases a gas which renders all creatures, including wielder, within 20` powerless to move for 5d4 rounds"; break;
		case 135: $arty = "{IV}&nbsp;Lose 1 point of charisma permanently"; break;
		case 136: $arty = "{IV}&nbsp;Lose 1 point of constitution permanently"; break;
		case 137: $arty = "{IV}&nbsp;Lose 1 point of dexterity permanently"; break;
		case 138: $arty = "{IV}&nbsp;Lose 1 point from hit points permanently"; break;
		case 139: $arty = "{IV}&nbsp;Lose 1 point of intelligence permanently"; break;
		case 140: $arty = "{IV}&nbsp;Lose 1 point of strength permanently"; break;
		case 141: $arty = "{IV}&nbsp;Lose 1 point of wisdom permanently"; break;
		case 142: $arty = "{IV}&nbsp;Magic drained from the most powerful magic item (other than an artifact or relic) within 20` of user"; break;
		case 143: $arty = "{IV}&nbsp;Reverse alignment permanently"; break;
		case 144: $arty = "{IV}&nbsp;Sacrifice a certain animal to activate item for 1 day"; break;
		case 145: $arty = "{IV}&nbsp;Sacrifice a human or player character to activate item for 1 day"; break;
		case 146: $arty = "{IV}&nbsp;Sacrifice " . mt_rand(1,6) . "0,000 gp worth of gems and/or jewelry to activate item for 1 day"; break;
		case 147: $arty = "{IV}&nbsp;User becomes berserk and attacks creatures within 20` randomly (check each round) for 5d4 rounds"; break;
		case 148: $arty = "{IV}&nbsp;User goes insane for 1d4 days"; break;
		case 149: $arty = "{IV}&nbsp;User grows 3 inches taller each time primary power is used"; break;
		case 150: $arty = "{IV}&nbsp;User instantly killed (but may be raised or resurrected)"; break;
		case 151: $arty = "{IV}&nbsp;User loses 1 level of experience"; break;
		case 152: $arty = "{IV}&nbsp;User receives 2d10 hit points damage"; break;
		case 153: $arty = "{IV}&nbsp;User receives 5d60 hit points damage"; break;
		case 154: $arty = "{IV}&nbsp;User required to slay a certain type of creature to activate item, and slaying another set type will deactivate item"; break;
		case 155: $arty = "{IV}&nbsp;User shrinks 3 inches each time primary power is used"; break;
		case 156: $arty = "{IV}&nbsp;User transformed into a very powerful but minor being from another plane (demon, devil, godling) by creator of item and is carried off to serve this new master (start a new character)"; break;
		case 157: $arty = "{IV}&nbsp;User withers and ages 3d10 years each time the primary power is used, eventually turning the possessor into a deathless withered zombie guardian of the item"; break;
		case 158: $arty = "{IV}&nbsp;Utterance of a spell causes complete loss of voice for one day"; break;
		case 159: $arty = "{IV}&nbsp;Yearning to be worshipped is uncontrollable; those failing to bow and scrape to the artifact`s possessor will be subject to instant attack"; break;
		case 160: $arty = "{V}&nbsp;All of possessor`s ability totals permanently raised 2 points each upon pronouncement of a command word (18 maximum)"; break;
		case 161: $arty = "{V}&nbsp;All of possessor`s ability totals raised to 18 each upon pronouncement of a command word"; break;
		case 162: $arty = "{V}&nbsp;Bones/exoskeleton/cartilage of opponent turned to jelly - 1 time/day"; break;
		case 163: $arty = "{V}&nbsp;Cacodemon - like power summons a demon lord, arch-devil, or nycadaemon - 1 time/month"; break;
		case 164: $arty = "{V}&nbsp;Creeping doom callable - 1 time/day"; break;
		case 165: $arty = "{V}&nbsp;Death ray equal to a finger of death with no saving throw - 1 time/day"; break;
		case 166: $arty = "{V}&nbsp;Death spell power of " . mt_rand(11,20) . "0% effectiveness with respect to number of levels affected - 1 time/day"; break;
		case 167: $arty = "{V}&nbsp;Gate spell power, 100% effective - 1 time/day"; break;
		case 168: $arty = "{V}&nbsp;Imprisonment spell power - 1 time/week"; break;
		case 169: $arty = "{V}&nbsp;Magical resistance of " . mt_rand(50,75) . "% for possessor upon command word - 1 time/day"; break;
		case 170: $arty = "{V}&nbsp;Major attribute permanently raised to 19 upon command word"; break;
		case 171: $arty = "{V}&nbsp;Meteor swarm - 1 time/day"; break;
		case 172: $arty = "{V}&nbsp;Monster summoning VIII - 2 times/day"; break;
		case 173: $arty = "{V}&nbsp;Plane shift - 1 time/day"; break;
		case 174: $arty = "{V}&nbsp;Polymorph any object - 1 time/day"; break;
		case 175: $arty = "{V}&nbsp;Power word blind/kill/stun - 1 time/day"; break;
		case 176: $arty = "{V}&nbsp;Premonition of death or serious harm to possessor"; break;
		case 177: $arty = "{V}&nbsp;Prismatic spray - 1 time/day"; break;
		case 178: $arty = "{V}&nbsp;Restoration - 1 time/day"; break;
		case 179: $arty = "{V}&nbsp;Resurrection - 7 times/week"; break;
		case 180: $arty = "{V}&nbsp;Shades - 2 times/day"; break;
		case 181: $arty = "{V}&nbsp;Shape change - 2 times/day"; break;
		case 182: $arty = "{V}&nbsp;Spell absorption, " . mt_rand(19,24) . " levels - 1 time/week"; break;
		case 183: $arty = "{V}&nbsp;Summon 1 of each type of elemental, 16 hit dice each, no need for control - 1 time/week"; break;
		case 184: $arty = "{V}&nbsp;Summon djinn or efreet lord (8 hp/die, +2 to hit and +4 damage) for 1 day of service - 1 time/week"; break;
		case 185: $arty = "{V}&nbsp;Super sleep spell affects double the number of creatures plus up to two 5th or 6th and one 7th or 8th level creature"; break;
		case 186: $arty = "{V}&nbsp;Temporal stasis, no saving throw, upon touch - 1 time/month"; break;
		case 187: $arty = "{V}&nbsp;The item enables the possessor to legend fore, commune, or contact higher plane (" . mt_rand(7,10) . "th) - 1 time/week"; break;
		case 188: $arty = "{V}&nbsp;Time stop of twice normal duration - 1 time/week"; break;
		case 189: $arty = "{V}&nbsp;Total fire/heat resistance for all creatures within 20` of the item"; break;
		case 190: $arty = "{V}&nbsp;Total immunity from all forms of mental and psionic attacks"; break;
		case 191: $arty = "{V}&nbsp;Total immunity from all forms of cold"; break;
		case 192: $arty = "{V}&nbsp;Trap the soul with 90% effectiveness - 1 time/month"; break;
		case 193: $arty = "{V}&nbsp;User can cast combination spells (if a spell caster) as follows (d4): 1) 1st and 2nd level spells simultaneously; 2) 2nd and 3rd level spells simultaneously; 3) 3rd and 4th level spells simultaneously; 4) 1st, 2nd and 3rd level spells simultaneously; "; break;
		case 194: $arty = "{V}&nbsp;Vanish - 2 times/day"; break;
		case 195: $arty = "{V}&nbsp;Vision - 1 time/day"; break;
		case 196: $arty = "{V}&nbsp;Wish - 1 time/day"; break;
		case 197: $arty = "{V}&nbsp;Youth restored to creature touched - 1 time/month"; break;
		case 198: $arty = "{VI}&nbsp;Alignment of possessor permanently changed to that of item"; break;
		case 199: $arty = "{VI}&nbsp;Charisma of possessor reduced to 3 as long as item is owned"; break;
		case 200: $arty = "{VI}&nbsp;Fear reaction possible in any creature within 20` of the item whenever a major or primary power is used; all, including possessor, must save versus magic or flee in panic"; break;
		case 201: $arty = "{VI}&nbsp;Fumble reaction possible in any creature within 20` of the item whenever a major or primary power is used; all, including possessor, must save versus magic or fumble"; break;
		case 202: $arty = "{VI}&nbsp;Greed and covetousness reaction in all intelligent creatures viewing the item; save versus magic or attack possessor and steal the item - associates are only 25% likely to have to check; henchmen check loyalty first, failure then requires saving throw as above"; break;
		case 203: $arty = "{VI}&nbsp;Lycanthropy inflicted upon the possessor, type according to alignment of item, change to animal form involuntary and 50% likely (1 check only) whenever confronted and attacked by an enemy"; break;
		case 204: $arty = "{VI}&nbsp;Treasure within 5` radius of mineral nature (metal or gems) of non-magical type is reduced by " . mt_rand(2,8) . "0% as the item consumes it to sustain its power"; break;
		case 205: $arty = "{VI}&nbsp;User becomes ethereal whenever any major or primary power of the item is activated, and there is a 5% cumulative chance that he or she will thereafter become ethereal whenever a stress (combat, life-or-death, difficult problem involving user`s decision) situation exists; the ethereal state lasts until stress is removed"; break;
		case 206: $arty = "{VI}&nbsp;User becomes fantastically strong (18/00 or 19 if 18/00 already) but very clumsy; so dexterity is reduced by as many points as strength was increased, and so no `to hit` bonuses are allowed for strength, and a -2 for clumsiness is given instead; furthermore, the individual must be checked as if he or she has a fumble spell cast upon him or her whenever any item is handled or spell is to be cast by the user"; break;
		case 207: $arty = "{VI}&nbsp;User cannot touch or be touched by any (even magical) metal; metal simply passes through his or her body as if it did not exist and has no effect"; break;
		case 208: $arty = "{VI}&nbsp;User has a poison touch which requires that humans and man-sized humanoids (but not undead) save versus poison whenever touched"; break;
		case 209: $arty = "{VI}&nbsp;User has limited omniscience and may request the DM to answer 1 question per game day (answer is given with limitations set by DM`s discretion, with overall campaign factors and knowledge of player vs player character overriding considerations)"; break;
		case 210: $arty = "{VI}&nbsp;User has short-duration super charismatic effect upon creatures of the same basic alignment - evil, good, neutral (chaotic, lawful, true) - so that they will willingly join and serve the character for 1d4, 2d4, or 3d4 turns (depending upon how exact the alignment match is); thereafter the effect of the dweomer wears off and the creature will no longer serve due to realization of the enchantment and fear of it (and hostility is possible)"; break;
		case 211: $arty = "{VI}&nbsp;Whenever any power of the item is used, temperature within a 6 inch radius is raised " . mt_rand(2,5) . "0 degrees Fahrenheit for 2d4 turns (moves with item)"; break;
		case 212: $arty = "{VI}&nbsp;Whenever the major or prime power of the item is used, temperature within a 6 inch radius is lowered " . mt_rand(2,8) . "0 degrees Fahrenheit for 2d6 turns (moves with item)"; break;
		case 213: $arty = "{VI}&nbsp;Whenever the prime power is used the possessor must save versus magic or lose 1 level of experience"; break;
		case 214: $arty = "{VI}&nbsp;Whenever the prime power is used, those creatures friendly to the user within 20` excluding the user, will sustain 5d4 hit points of damage"; break;
		case 215: $arty = "{VI}&nbsp;Whenever this item is used as a weapon to strike an enemy, it does double normal damage to the opponent but the wielder takes (normal) damage just as if he or she had been struck by the item"; break;
	}
	return $arty;
}

function getADDPickPowers()
{
	switch (mt_rand(1,30))
	{
		case 1: $artifact = "Axe of the Dwarvish Lords"; $value = "2 1 1 1 1 1"; break;
		case 2: $artifact = "Baba Yaga`s Hut"; $value = "4 2 1 1 1 1"; break;
		case 3: $artifact = "Codex of the Infinite Planes"; $value = "4 4 2 2 2 2"; break;
		case 4: $dice = mt_rand(1,3);
				if ($dice == 1){$sub = "Evil";}
				else if ($dice == 2){$sub = "Good";}
				else {$sub = "Neutral";}
				$artifact = $sub . " Crown of Might"; $value = "2 1 1 99 99 99";
			break;
		case 5: $artifact = "Crystal of the Ebon Flame"; $value = "4 2 1 1 1 1"; break;
		case 6: $artifact = "Cup of Al`Akbar"; $value = "4 99 1 99 99 99"; break;
		case 7: $artifact = "Talisman of Al`Akbar"; $value = "99 2 99 99 99 1"; break;
		case 8: $artifact = "Eye of Vecna"; $value = "2 2 99 1 1 99"; break;
		case 9: $artifact = "Hand of Vecna"; $value = "10 5 2 2 2 1"; break;
		case 10: $artifact = "Howard`s Mystical Organ"; $value = "7 7 3 7 7 3"; break;
		case 11: $artifact = "Horn of Change"; $value = "1 1 1 1 1 1"; break;
		case 12: $artifact = "Invulnerable Coat of Arnd"; $value = "3 2 2 1 1 1"; break;
		case 13: $dice = mt_rand(1,3);
				if ($dice == 1){$sub = " (imprisoning a greater devil)";}
				else if ($dice == 2){$sub = " (imprisoning a groaning spirit)";}
				else if ($dice == 2){$sub = " (imprisoning a major demon)";}
				else if ($dice == 2){$sub = " (imprisoning a night hag)";}
				else if ($dice == 2){$sub = " (imprisoning a nycadaemon)";}
				else {$sub = " (imprisoning a greater devil)";}
				$artifact = "Iron Flask of Tuerny the Merciless" . $sub; $value = "3 99 1 99 1 1";
			break;
		case 14: $artifact = "Jacinth of Inestimable Beauth"; $value = "2 2 1 1 1 1"; break;
		case 15: $artifact = "Johydee`s Mask"; $value = "2 1 99 99 99 1"; break;
		case 16: $artifact = "Kuroth`s Quill"; $value = "2 99 1 1 99 1"; break;
		case 17: $artifact = "Mace of Cuthbert"; $value = "3 2 99 99 99 1"; break;
		case 18: $artifact = "Machine of Lum the Mad"; $value = "15 15 10 10 15 5"; break;
		case 19: $artifact = "Mighty Servant of Leuk-O"; $value = "6 6 1 2 99 2"; break;
		case 20:
			switch (mt_rand(1,8))
			{
				case 1: $artifact = "Orb of the Hatchling"; $value = "3 99 99 99 99 99"; break;
				case 2: $artifact = "Orb of the Wyrmkin"; $value = "2 1 99 99 99 99"; break;
				case 3: $artifact = "Orb of the Dragonette"; $value = "3 1 1 99 99 99"; break;
				case 4: $artifact = "Orb of the Dragon"; $value = "4 1 1 99 99 99"; break;
				case 5: $artifact = "Orb of the Great Serpent"; $value = "3 2 1 99 99 1"; break;
				case 6: $artifact = "Orb of the Firedrake"; $value = "3 3 2 99 99 1"; break;
				case 7: $artifact = "Orb of the Elder Wyrm"; $value = "4 3 2 1 1 1"; break;
				case 8: $artifact = "Orb of the Eternal Grand Dragon"; $value = "4 3 2 1 2 1"; break;
			}
			break;
		case 21: $dice = mt_rand(1,3);
				if ($dice == 1){$sub = "Evil";}
				else if ($dice == 2){$sub = "Good";}
				else {$sub = "Neutral";}
				$artifact = $sub . " Orb of Might"; $value = "2 99 1 99 99 99";
			break;
		case 22: $artifact = "Queen Ehlissa`s Marvelous Nightingale"; $value = "4 2 1 1 1 1"; break;
		case 23: $artifact = "Recorder of Ye`Cind"; $value = "5 2 1 1 1 1"; break;
		case 24: $artifact = "Ring of Gaxx"; $value = "3 2 1 1 1 1"; break;
		case 25: $rod = " Piece of the Rod of Seven Parts";
			if (mt_rand(1,100) == 1){ $artifact = "Rod of Seven Parts"; $value = "3 2 3 1 2 2"; $rod=""; }
			else if (mt_rand(1,100) > 80)
			{
				switch (mt_rand(1,6))
				{
					case 1: $artifact = "1st & 2nd Pieces of the Rod of Seven Parts"; $value = "99 99 1 99 99 99"; break;
					case 2: $artifact = "2nd & 3rd Pieces of the Rod of Seven Parts"; $value = "1 99 99 99 99 99"; break;
					case 3: $artifact = "3rd & 4th Pieces of the Rod of Seven Parts"; $value = "1 99 99 99 99 99"; break;
					case 4: $artifact = "4th & 5th Pieces of the Rod of Seven Parts"; $value = "99 99 99 1 99 99"; break;
					case 5: $artifact = "5th & 6th Pieces of the Rod of Seven Parts"; $value = "99 1 99 99 99 99"; break;
					case 6: $artifact = "6th & 7th Pieces of the Rod of Seven Parts"; $value = "99 99 99 99 99 1"; break;
				}
				$artifact = "The " . $artifact;  $rod=""; 
			}
			else
			{
				switch (mt_rand(1,7))
				{
					case 1: $artifact = "1st" . $rod; break;
					case 2: $artifact = "2nd" . $rod; break;
					case 3: $artifact = "3rd" . $rod; break;
					case 4: $artifact = "4th" . $rod; break;
					case 5: $artifact = "5th" . $rod; break;
					case 6: $artifact = "6th" . $rod; break;
					case 7: $artifact = "7th" . $rod; break;
				}
				$artifact = "The " . $artifact;
			}
			break;
		case 26: $dice = mt_rand(1,3);
				if ($dice == 1){$sub = "Evil";}
				else if ($dice == 2){$sub = "Good";}
				else {$sub = "Neutral";}
				$artifact = $sub . " Sceptre of Might"; $value = "1 1 99 99 99 1";
			break;
		case 27: $artifact = "Sword of Kas"; $value = "5 2 1 2 2 1"; break;
		case 28: $artifact = " Tooth of Dahiver-Nar (of 32)";
			switch (mt_rand(1,32))
			{
				case 1: $artifact = "1st" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 2: $artifact = "2nd" . $artifact; $value = "99 1 99 99 99 99"; break;
				case 3: $artifact = "3rd" . $artifact; $value = "99 99 1 99 99 99"; break;
				case 4: $artifact = "4th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 5: $artifact = "5th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 6: $artifact = "6th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 7: $artifact = "7th" . $artifact; $value = "99 99 99 99 99 1"; break;
				case 8: $artifact = "8th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 9: $artifact = "9th" . $artifact; $value = "99 99 1 99 99 99"; break;
				case 10: $artifact = "10th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 11: $artifact = "11th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 12: $artifact = "12th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 13: $artifact = "13th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 14: $artifact = "14th" . $artifact; $value = "99 99 99 99 99 1"; break;
				case 15: $artifact = "15th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 16: $artifact = "16th" . $artifact; $value = "99 1 99 99 99 99"; break;
				case 17: $artifact = "17th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 18: $artifact = "18th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 19: $artifact = "19th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 20: $artifact = "20th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 21: $artifact = "21st" . $artifact; $value = "99 99 99 99 99 1"; break;
				case 22: $artifact = "22nd" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 23: $artifact = "23rd" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 24: $artifact = "24th" . $artifact; $value = "99 1 99 99 99 99"; break;
				case 25: $artifact = "25th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 26: $artifact = "26th" . $artifact; $value = "99 99 1 99 99 99"; break;
				case 27: $artifact = "27th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 28: $artifact = "28th" . $artifact; $value = "99 1 99 99 99 99"; break;
				case 29: $artifact = "29th" . $artifact; $value = "99 99 1 99 99 99"; break;
				case 30: $artifact = "30th" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 31: $artifact = "31st" . $artifact; $value = "1 99 99 99 99 99"; break;
				case 32: $artifact = "32nd" . $artifact; $value = "1 99 99 99 99 99"; break;
			}
			$artifact = "The " . $artifact;
			break;
		case 29: $artifact = "Throne of the Gods"; $value = "3 3 2 2 2 2"; break;
		case 30: $artifact = "Wand of Orcus"; $value = "4 2 2 1 99 1"; break;
	}

	$powers = explode(" ", $value);
	$cyc = 0;
	$power_count = count($powers);
		if ($rod != ""){$power_count = 0; $special = "[Other pieces are needed to draw power from the rod]";}
	$power_array = array();

	while ($power_count > 0) :

		$table = $table + 1;

		if ($powers[$cyc] < 50)
		{
			$each = $powers[$cyc];
			while ($each > 0) :
				$mystic = getADDPower($table);
				if (in_array($mystic, $power_array)){ }
				else
				{
					array_push($power_array, $mystic);
					$each = $each - 1;
					$special = $special . "[" . $mystic . "]";
				}
			endwhile;
		}
		$cyc=$cyc+1;
		$power_count = $power_count - 1;

	endwhile;

	return $artifact . " **" . $special . "**";
}

function makeRPGmagic($game,$varb)
{
	if ($game == "OSRIC") ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		// CHOOSE A CATEGORY
		$category = mt_rand(1,100);

		if ($varb == 1){$category = 1;}
		else if ($varb == 2){$category = 62;}
		else if ($varb == 3){$category = 57;}
		else if ($varb == 4){$category = 21;}
		else if ($varb == 5){$category = 26;}

		if ($category >= 93){ $mi = mt_rand(1,106); } // ARMOR
		else if ($category >= 80){ $mi = mt_rand(107,212); } // WEAPONS
		else if ($category >= 67){ $mi = mt_rand(213,318); } // SWORDS
		else if ($category >= 62){							 // MISC
			$wrlic = mt_rand(1,100);
			if ($wrlic <= 50){ $mi = mt_rand(877,1005); }
			else if ($wrlic <= 70){ $mi = mt_rand(1006,1155); }
			else if ($wrlic <= 90){ $mi = mt_rand(1156,1285); }
			else { $mi = mt_rand(1286,1374); }
		}
		else if ($category >= 57){ $mi = mt_rand(645,773); } // WAND
		else if ($category >= 26){ $mi = mt_rand(774,876); } // SCROLL
		else if ($category >= 21){ $mi = mt_rand(529,644); } // RING
		else { $mi = mt_rand(319,528); } // POTION

		$armor_d = mt_rand(1,110);
		if ($armor_d <= 14){ $armor = "Chain Mail Armor"; }
		else if ($armor_d <= 17){ $armor = "Elfin Chain Mail Armor"; }
		else if ($armor_d <= 28){ $armor = "Leather Armor"; }
		else if ($armor_d <= 44){ $armor = "Plate Mail Armor"; }
		else if ($armor_d <= 50){ $armor = "Ring Mail Armor"; }
		else if ($armor_d <= 61){ $armor = "Splint Mail Armor"; }
		else if ($armor_d <= 72){ $armor = "Scale Mail Armor"; }
		else if ($armor_d <= 78){ $armor = "Studded Leather Armor"; }
		else if ($armor_d <= 104){ $armor = "Shield"; }
		else { $armor = "Banded Mail Armor"; }

		$sword_d = mt_rand(1,111);
		if ($sword_d <= 6){ $sword = "Claymore Sword"; }
		else if ($sword_d <= 12){ $sword = "Bastard Sword"; }
		else if ($sword_d <= 23){ $sword = "Broad Sword"; }
		else if ($sword_d <= 94){ $sword = "Long Sword"; }
		else if ($sword_d <= 105){ $sword = "Short Sword"; }
		else { $sword = "Two-Handed Sword"; }

		$weapon_d = mt_rand(1,190);
		if ($weapon_d <= 16){ $weapon = "Arrows (" . mt_rand(2,24) . "ea)"; if ($mi >= 196 && $mi <= 201){$mi=107;} }
		else if ($weapon_d <= 22){ $weapon = "Crossbow Bolts (" . mt_rand(2,24) . "ea)"; if ($mi >= 196 && $mi <= 201){$mi=107;} }
		else if ($weapon_d <= 28){ $weapon = "Darts (" . mt_rand(1,4) . "ea)"; if ($mi >= 196 && $mi <= 201){$mi=107;} }
		else if ($weapon_d <= 31){ $weapon = "Sling Bullets (" . mt_rand(2,24) . "ea)"; if ($mi >= 196 && $mi <= 201){$mi=107;} }
		else if ($weapon_d <= 35){ $weapon = "Sling Stones (" . mt_rand(2,24) . "ea)"; if ($mi >= 196 && $mi <= 201){$mi=107;} }
		else if ($weapon_d <= 41){ $weapon = "Hand Axe"; }
		else if ($weapon_d <= 47){ $weapon = "Battle Axe"; }
		else if ($weapon_d <= 51){ $weapon = "Long Bow"; }
		else if ($weapon_d <= 54){ $weapon = "Short Bow"; }
		else if ($weapon_d <= 57){ $weapon = "Composite Long Bow"; }
		else if ($weapon_d <= 59){ $weapon = "Composite Short Bow"; }
		else if ($weapon_d <= 62){ $weapon = "Heavy Crossbow"; }
		else if ($weapon_d <= 64){ $weapon = "Light Crossbow"; }
		else if ($weapon_d <= 70){ $weapon = "Heavy Flail"; }
		else if ($weapon_d <= 76){ $weapon = "Light Flail"; }
		else if ($weapon_d <= 82){ $weapon = "Heavy War Hammer"; }
		else if ($weapon_d <= 88){ $weapon = "Light War Hammer"; }
		else if ($weapon_d <= 94){ $weapon = "Heavy Mace"; }
		else if ($weapon_d <= 100){ $weapon = "Light Mace"; }
		else if ($weapon_d <= 106){ $weapon = "Heavy Pick"; }
		else if ($weapon_d <= 112){ $weapon = "Light Pick"; }
		else if ($weapon_d <= 118){ $weapon = "Club"; }
		else if ($weapon_d <= 127){ $weapon = "Dagger"; }
		else if ($weapon_d <= 133){ $weapon = "Halberd"; }
		else if ($weapon_d <= 139){ $weapon = "Javelin"; }
		else if ($weapon_d <= 148){ $weapon = "Morning Star"; }
		else if ($weapon_d <= 154){ $weapon = "Pole Arm"; }
		else if ($weapon_d <= 160){ $weapon = "Sling"; }
		else if ($weapon_d <= 166){ $weapon = "Spear"; }
		else if ($weapon_d <= 172){ $weapon = "Staff"; }
		else if ($weapon_d <= 181){ $weapon = "Trident"; }
		else { $weapon = "Scimitar"; }
		
		$metal = mt_rand(1,100);
		if ($metal >= 35 ){$metals = " that fits a normal man";}
		else if ($metal >= 15){$metals = " that fits an elf or half-elf";}
		else if ($metal >= 5){$metals = " that fits a dwarf";}
		else {$metals = " that fits a gnome or halfling";}
		if ($armor == "Shield"){$metals = "";}

		$rod_charge = " with " . mt_rand(2,40) . " charges";
		$staff_charge = " with " . mt_rand(2,20) . " charges";
		$wand_charge = " with " . mt_rand(2,80) . " charges";

		switch ($mi)
		{
			case $mi >= 1 and $mi <= 51: $item = $armor . " +1" . $metals; break; // Armor
			case $mi >= 52 and $mi <= 77: $item = $armor . " +2" . $metals; break; // Armor
			case $mi >= 78 and $mi <= 83: $item = $armor . " +3" . $metals; break; // Armor
			case $mi >= 84 and $mi <= 87: $item = $armor . " +4" . $metals; break; // Armor
			case $mi >= 88 and $mi <= 89: $item = $armor . " +5" . $metals; break; // Armor
			case $mi >= 90 and $mi <= 95:										// Armor
				$dice = mt_rand(1,20);
				if ($dice >= 20){ $item = $armor . " +5" . $metals . "(Cursed: " . curseType(mt_rand(1,10),user,equip,$game) . ")"; }
				else if ($dice >= 18){$item = $armor . " +4" . $metals . "(Cursed: " . curseType(mt_rand(1,10),user,equip,$game) . ")"; }	
				else if ($dice >= 14){$item = $armor . " +3" . $metals . "(Cursed: " . curseType(mt_rand(1,10),user,equip,$game) . ")"; }			
				else if ($dice >= 12){$item = $armor . " +2" . $metals . "(Cursed: " . curseType(mt_rand(1,10),user,equip,$game) . ")"; }
				else if ($dice >= 8){$item = $armor . " +1" . $metals . "(Cursed: " . curseType(mt_rand(1,10),user,equip,$game) . ")"; }
				else if ($dice >= 5){$item = $armor . " -1" . $metals . "(Cursed: " . curseType(mt_rand(1,10),user,equip,$game) . ")"; }
				else {$item = $armor . " -2" . $metals . "(Cursed: " . curseType(mt_rand(1,10),user,equip,$game) . ")"; }
				break;
			case $mi >= 96 and $mi <= 106:							// Armor
				$dice = mt_rand(1,2);
				if ($dice >= 2){$item = "Plate Mail Armor of Ethereality +5";}		
				else {$item = "Large Shield +1 of Missile Deflection";}									
				break;
			case $mi >= 107 and $mi <= 157: $item = $weapon . " +1"; break; // Weapon
			case $mi >= 158 and $mi <= 183: $item = $weapon . " +2"; break; // Weapon
			case $mi >= 184 and $mi <= 189: $item = $weapon . " +3"; break; // Weapon
			case $mi >= 190 and $mi <= 193: $item = $weapon . " +4"; break; // Weapon
			case $mi >= 194 and $mi <= 195: $item = $weapon . " +5"; break; // Weapon
			case $mi >= 196 and $mi <= 201:									// Weapon
				$dice = mt_rand(1,20);
				if ($dice >= 20){ $item = $weapon . " +5 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }
				else if ($dice >= 18){$item = $weapon . " +4 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }	
				else if ($dice >= 14){$item = $weapon . " +3 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }			
				else if ($dice >= 12){$item = $weapon . " +2 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }
				else if ($dice >= 8){$item = $weapon . " +1 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }
				else if ($dice >= 5){$item = $weapon . " -1 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }
				else {$item = $weapon . " -2 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }
				break;
			case $mi >= 202 and $mi <= 212:									// Weapon
				$dice = mt_rand(1,100);
				if ($dice >= 86){$item = "Trident of Extending";}
				else if ($dice >= 76){$item = "Sling of the Halfling";}
				else if ($dice >= 71){$item = "Holy Mace";}
				else if ($dice >= 61){$item = "Hammer of the Dwarf";}
				else if ($dice >= 51){$item = "Dagger of Venom";}
				else if ($dice >= 41){$item = "Crossbow of Speed";}
				else if ($dice >= 31){$item = "Crossbow of Range";}
				else if ($dice >= 16){$item = "Crossbow of Accuracy";}
				else if ($dice >= 6){$item = "Axe of Hurling";}
				else {$item = "Arrow of Slaying";
					$slay = array('Clerics', 'Demi-Humans', 'Demons', 'Devils', 'Dinosaurs', 'Dragons', 'Druids', 'Dwarfs', 'Elementals', 'Elves', 'Ettin', 'Fighters', 'Ghouls', 'Giants', 'Gnolls', 'Gnomes', 'Goblins', 'Golems', 'Humans', 'Hydras', 'Illusionists', 'Kobolds', 'Liches', 'Lizard Men', 'Lycanthropes', 'Magic Users', 'Mammals', 'Medusae', 'Mummies', 'Naga', 'Ogres', 'Orcs', 'Paladins', 'Rangers', 'Reptiles', 'Skeletons', 'Griffons', 'Halflings', 'Harpies', 'Hell Hounds', 'Hippogriffs', 'Hobgoblins', 'Humanoids', 'Spiders', 'Thieves', 'Troglodytes', 'Trolls', 'Undead', 'Vampires', 'Zombies');
					$part = count($slay)-1;
					$item = $item . " (Against " . $slay[mt_rand(0,$part)] . ")";
				}
				break;
			case $mi >= 213 and $mi <= 263: $item = $sword . " +1"; $ego = 1; include("smart_swords.php"); break; // Sword
			case $mi >= 264 and $mi <= 289: $item = $sword . " +2"; $ego = 2; include("smart_swords.php"); break; // Sword
			case $mi >= 290 and $mi <= 295: $item = $sword . " +3"; $ego = 3; include("smart_swords.php"); break; // Sword
			case $mi >= 296 and $mi <= 299: $item = $sword . " +4"; $ego = 4; include("smart_swords.php"); break; // Sword
			case $mi >= 300 and $mi <= 301: $item = $sword . " +5"; $ego = 5; include("smart_swords.php"); break; // Sword
			case $mi >= 302 and $mi <= 307:									// Sword
				$dice = mt_rand(1,20);
				if ($dice >= 20){ $item = $sword . " +5 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }
				else if ($dice >= 18){$item = $sword . " +4 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }	
				else if ($dice >= 14){$item = $sword . " +3 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }			
				else if ($dice >= 12){$item = $sword . " +2 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }
				else if ($dice >= 8){$item = $sword . " +1 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }
				else if ($dice >= 5){$item = $sword . " -1 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }
				else {$item = $sword . " -2 (Cursed: " . curseType(mt_rand(1,10),wielder,equip,$game) . ")"; }
				break;
			case $mi >= 308 and $mi <= 318:									// Sword
				$dice = mt_rand(1,99);
				if ($dice >= 96){$item = $sword . " of Wyrmbane"; $ego = 5; include("smart_swords.php"); }
				else if ($dice >= 91){$item = $sword . " of Werebane"; $ego = 3; include("smart_swords.php"); }
				else if ($dice >= 90){$item = $sword . " of Vorpal Power"; $ego = 6; include("smart_swords.php"); }
				else if ($dice >= 85){$item = $sword . " of Vampiric Power"; $ego = 4; include("smart_swords.php"); }
				else if ($dice >= 80){$item = $sword . " of Trollbane"; $ego = 4; include("smart_swords.php"); }
				else if ($dice >= 75){$item = $sword . " of Nine Lives Stealing"; $ego = 4; include("smart_swords.php"); }
				else if ($dice >= 70){$item = $sword . " of Magebane"; $ego =3; include("smart_swords.php"); }
				else if ($dice >= 54){$item = $sword . " of Luck"; $ego = 2; include("smart_swords.php"); }
				else if ($dice >= 52){$item = $sword . " of Keenblade"; $ego = 6; include("smart_swords.php"); }
				else if ($dice >= 47){$item = $sword . " of Holiness"; $ego = 10; include("smart_swords.php"); }
				else if ($dice >= 37){$item = $sword . " of Giantbane"; $ego = 5; include("smart_swords.php"); }
				else if ($dice >= 32){$item = $sword . " of Frost Brand"; $ego = 9; include("smart_swords.php"); }
				else if ($dice >= 22){$item = $sword . " of Flames"; $ego = 5; include("smart_swords.php"); }
				else if ($dice >= 17)
				{
					$ego = 6; 
					$drg = mt_rand(1,10);
					if ($drg == 1){ $item = $sword . " of Black Dragonbane"; include("smart_swords.php"); }
					else if ($drg == 2){ $item = $sword . " of Blue Dragonbane"; include("smart_swords.php"); }
					else if ($drg == 3){ $item = $sword . " of Brass Dragonbane"; include("smart_swords.php"); }
					else if ($drg == 4){ $item = $sword . " of Bronze Dragonbane"; include("smart_swords.php"); }
					else if ($drg == 5){ $item = $sword . " of Copper Dragonbane"; include("smart_swords.php"); }
					else if ($drg == 6){ $item = $sword . " of Gold Dragonbane"; include("smart_swords.php"); }
					else if ($drg == 7){ $item = $sword . " of Green Dragonbane"; include("smart_swords.php"); }
					else if ($drg == 8){ $item = $sword . " of Red Dragonbane"; include("smart_swords.php"); }
					else if ($drg == 9){ $item = $sword . " of Silver Dragonbane"; include("smart_swords.php"); }
					else { $item = $sword . " of White Dragonbane"; include("smart_swords.php"); }
				}
				else if ($dice >= 7){$item = $sword . " of Defending"; $ego = 8; include("smart_swords.php"); }
				else if ($dice >= 2){$item = $sword . " of Dancing"; $ego = 2; include("smart_swords.php"); }
				else {$item = $sword . " of Bleeding"; $ego = 2; include("smart_swords.php"); }
				break;
			case $mi >= 319 and $mi <= 324:											// Potion
				$dice = mt_rand(1,20);
				if ($dice >= 20){$item = "Potion of Any Animal Control";}
				else if ($dice >= 18){$item = "Potion of Amphibian/Reptile/Fish Control";}		
				else if ($dice >= 14){$item = "Potion of Amphibian/Reptile Control";}				
				else if ($dice >= 12){$item = "Potion of Mammal/Avian Control";}				
				else if ($dice >= 8){$item = "Potion of Mammal/Marsupial Control";}				
				else if ($dice >= 5){$item = "Potion of Fish Control";}				
				else {$item = "Potion of Avian Control";}									
				break;
			case $mi >= 325 and $mi <= 330: $item = "Potion of Clairaudience"; break; // Potion
			case $mi >= 331 and $mi <= 336: $item = "Potion of Clairvoyance"; break; // Potion
			case $mi >= 337 and $mi <= 342: $item = "Potion of Climbing"; break; // Potion
			case $mi >= 343 and $mi <= 344: $item = "Potion (Cursed: " . curseType(mt_rand(1,10),drinker,item,$game) . ")"; break; // Potion
			case $mi >= 345 and $mi <= 348: $item = "Potion (Poison)"; break; // Potion
			case $mi >= 349 and $mi <= 354: $item = "Potion of Delusion"; break; // Potion
			case $mi >= 355 and $mi <= 360: $item = "Potion of Diminution"; break; // Potion
			case $mi >= 361 and $mi <= 366:											// Potion
				$dice = mt_rand(1,20);
				if ($dice >= 20){$item = "Potion of Good Dragon Control";}
				else if ($dice >= 18){$item = "Potion of Evil Dragon Control";}
				else if ($dice >= 16){$item = "Potion of White Dragon Control";}
				else if ($dice >= 15){$item = "Potion of Silver Dragon Control";}	
				else if ($dice >= 14){$item = "Potion of Red Dragon Control";}	
				else if ($dice >= 11){$item = "Potion of Green Dragon Control";}	
				else if ($dice >= 10){$item = "Potion of Gold Dragon Control";}	
				else if ($dice >= 8){$item = "Potion of Copper Dragon Control";}	
				else if ($dice >= 7){$item = "Potion of Bronze Dragon Control";}	
				else if ($dice >= 5){$item = "Potion of Brass Dragon Control";}	
				else if ($dice >= 3){$item = "Potion of Blue Dragon Control";}	
				else {$item = "Potion of Black Dragon Control";}								
				break;
			case $mi >= 367 and $mi <= 372: $item = "Potion of ESP"; break; // Potion
			case $mi >= 373 and $mi <= 378: $item = "Potion of Extra-Healing"; break; // Potion
			case $mi >= 379 and $mi <= 384: $item = "Potion of Fire Resistance"; break; // Potion
			case $mi >= 385 and $mi <= 390: $item = "Potion of Flying"; break; // Potion
			case $mi >= 391 and $mi <= 396: $item = "Potion of Gaseous Form"; break; // Potion
			case $mi >= 397 and $mi <= 402:											// Potion
				$dice = mt_rand(1,20);
				if ($dice >= 20){$item = "Potion of Storm Giant Control";}
				else if ($dice >= 16){$item = "Potion of Stone Giant Control";}
				else if ($dice >= 11){$item = "Potion of Hill Giant Control";}
				else if ($dice >= 7){$item = "Potion of Frost Giant Control";}	
				else if ($dice >= 3){$item = "Potion of Fire Giant Control";}	
				else {$item = "Potion of Cloud Giant Control";}								
				break;
			case $mi >= 403 and $mi <= 408:											// Potion
				$dice = mt_rand(1,20);
				if ($dice >= 20){$item = "Potion of Storm Giant Strength";}
				else if ($dice >= 18){$item = "Potion of Cloud Giant Strength";}
				else if ($dice >= 15){$item = "Potion of Fire Giant Strength";}
				else if ($dice >= 11){$item = "Potion of Frost Giant Strength";}	
				else if ($dice >= 7){$item = "Potion of Stone Giant Strength";}	
				else {$item = "Potion of Hill Giant Strength";}								
				break;
			case $mi >= 409 and $mi <= 414: $item = "Potion of Growth"; break; // Potion
			case $mi >= 415 and $mi <= 420: $item = "Potion of Healing"; break; // Potion
			case $mi >= 421 and $mi <= 426: $item = "Potion of Heroism"; break; // Potion
			case $mi >= 427 and $mi <= 432:											// Potion
				$dice = mt_rand(1,20);
				if ($dice >= 18){$item = "Potion of Orc/Gnoll/Goblin/Etc Control";}
				else if ($dice >= 12){$item = "Potion of Human Control";}
				else if ($dice >= 10){$item = "Potion of Half-Orc Control";}
				else if ($dice >= 8){$item = "Potion of Halfling Control";}	
				else if ($dice >= 6){$item = "Potion of Gnome Control";}	
				else if ($dice >= 5){$item = "Potion of Elf/Half-Elf/Human Control";}	
				else if ($dice >= 3){$item = "Potion of Elf/Half-Elf Control";}	
				else {$item = "Potion of Dwarf Control";}								
				break;
			case $mi >= 433 and $mi <= 438: $item = "Potion of Invisibility"; break; // Potion
			case $mi >= 439 and $mi <= 444: $item = "Potion of Invulnerability"; break; // Potion
			case $mi >= 445 and $mi <= 450: $item = "Potion of Levitation"; break; // Potion
			case $mi >= 451 and $mi <= 456: $item = "Potion of Longevity"; break; // Potion
			case $mi >= 457 and $mi <= 462: $item = "Oil of Etherealness"; break; // Potion
			case $mi >= 463 and $mi <= 468: $item = "Oil off Slipperiness"; break; // Potion
			case $mi >= 469 and $mi <= 474: $item = "Philtre of Love"; break; // Potion
			case $mi >= 475 and $mi <= 480: $item = "Philtre of Persuasiveness"; break; // Potion
			case $mi >= 481 and $mi <= 487: $item = "Potion of Plant Control"; break; // Potion
			case $mi >= 488 and $mi <= 492: $item = "Potion of Polymorph"; break; // Potion
			case $mi >= 493 and $mi <= 498: $item = "Potion of Speed"; break; // Potion
			case $mi >= 499 and $mi <= 504: $item = "Potion of Super-Heroism"; break; // Potion
			case $mi >= 505 and $mi <= 510: $item = "Potion of Sweet Water"; break; // Potion
			case $mi >= 511 and $mi <= 518: $item = "Potion of Treasure Finding"; break; // Potion
			case $mi >= 519 and $mi <= 522:											// Potion
				$dice = mt_rand(1,20);
				if ($dice >= 19){$item = "Potion of Ghast Control";}
				else if ($dice >= 17){$item = "Potion of Ghost Control";}
				else if ($dice >= 15){$item = "Potion of Ghoul Control";}
				else if ($dice >= 13){$item = "Potion of Shadow Control";}	
				else if ($dice >= 11){$item = "Potion of Skeleton Control";}	
				else if ($dice >= 9){$item = "Potion of Spectre Control";}	
				else if ($dice >= 7){$item = "Potion of Vampire Control";}	
				else if ($dice >= 5){$item = "Potion of Wight Control";}	
				else if ($dice >= 3){$item = "Potion of Wraith Control";}	
				else {$item = "Potion of Zombie Control";}								
				break;
			case $mi >= 523 and $mi <= 528: $item = "Potion of Water Breathing"; break; // Potion
			case $mi >= 529 and $mi <= 534: $item = "Ring of Charisma"; break; // Ring
			case $mi >= 535 and $mi <= 545: $item = "Ring of Feather Falling"; break; // Ring
			case $mi >= 546 and $mi <= 551: $item = "Ring of Fire Resistance"; break; // Ring
			case $mi >= 552 and $mi <= 557: $item = "Ring of Free Action"; break; // Ring
			case $mi >= 558 and $mi <= 563: $item = "Ring of Genie Summoning"; break; // Ring
			case $mi >= 564 and $mi <= 569: $item = "Ring of Invisibility"; break; // Ring
			case $mi >= 570 and $mi <= 595: $item = "Ring of Protection";			// Ring
				$dice = mt_rand(1,100);
				if ($dice >= 100){$item = $item . " +5 AC, +1 save";}
				else if ($dice >= 99){$item = $item . " +4 AC, +1 save";}
				else if ($dice >= 98){$item = $item . " +3, 5` radius";}
				else if ($dice >= 94){$item = $item . " +3";}
				else if ($dice >= 93){$item = $item . " +2, 5` radius";}
				else if ($dice >= 71){$item = $item . " +2";}
				else if ($dice >= 69){$item = $item . " +1, 5` radius";}
				else {$item = $item . " +1";}
				break;
			case $mi >= 596 and $mi <= 597: $item = "Ring of Regeneration"; break; // Ring
			case $mi >= 598 and $mi <= 602: $item = "Ring of Spell Storing"; break; // Ring
			case $mi >= 603 and $mi <= 608: $item = "Ring of Spell Turning"; break; // Ring
			case $mi >= 609 and $mi <= 614: $item = "Ring of Swimming"; break; // Ring
			case $mi >= 615 and $mi <= 618: $item = "Ring of Telekinesis"; // Ring
				$dice = mt_rand(1,100);
				if ($dice >= 100){$item = $item . " (400 lbs)";}
				else if ($dice >= 90){$item = $item . " (200 lbs)";}
				else if ($dice >= 51){$item = $item . " (100 lbs)";}
				else if ($dice >= 26){$item = $item . " (50 lbs)";}
				else {$item = $item . " (25 lbs)";}
				break;
			case $mi >= 619 and $mi <= 621: $item = "Ring of Three Wishes"; break; // Ring
			case $mi >= 622 and $mi <= 627: $item = "Ring of Warmth"; break; // Ring
			case $mi >= 628 and $mi <= 638: $item = "Ring of Water Walking"; break; // Ring
			case $mi >= 639 and $mi <= 644: $item = "Ring of Wizardry"; // Ring
				$dice = mt_rand(1,100);
				if ($dice >= 100){$item = $item . " at 4th/5th level power";}
				else if ($dice >= 96){$item = $item . " at 1st/2nd/3rd level power";}
				else if ($dice >= 93){$item = $item . " at 5th level power";}
				else if ($dice >= 89){$item = $item . " at 4th level power";}
				else if ($dice >= 83){$item = $item . " at 1st/2nd level power";}
				else if ($dice >= 76){$item = $item . " at 3rd level power";}
				else if ($dice >= 46){$item = $item . " at 2nd level power";}
				else {$item = $item . " at 1st level power";}
				break;
			case $mi >= 645 and $mi <= 650: $item = "Rod of Absorption" . $rod_charge; break; // Wands
			case $mi >= 651 and $mi <= 661: $item = "Rod of Cancellation" . $rod_charge; break; // Wands
			case $mi >= 662 and $mi <= 664: $item = "Rod of Captivation" . $rod_charge; break; // Wands
			case $mi >= 665 and $mi <= 667: $item = "Rod of Lordly Might" . $rod_charge; break; // Wands
			case $mi >= 668 and $mi <= 669: $item = "Rod of Resurrection" . $rod_charge; break; // Wands
			case $mi >= 670 and $mi <= 672: $item = "Rod of Rulership" . $rod_charge; break; // Wands
			case $mi >= 673 and $mi <= 676: $item = "Rod of Striking" . $rod_charge; break; // Wands
			case $mi >= 677 and $mi <= 679: $item = "Staff of Compulsion" . $staff_charge; break; // Wands
			case $mi >= 680 and $mi <= 683: $item = "Staff of Healing" . $staff_charge; break; // Wands
			case $mi >= 684 and $mi <= 685: $item = "Staff of Power" . $staff_charge; break; // Wands
			case $mi >= 686 and $mi <= 690: $item = "Staff of the Serpent" . $staff_charge; break; // Wands
			case $mi >= 691 and $mi <= 695: $item = "Staff of Withering" . $staff_charge; break; // Wands
			case $mi >= 696 and $mi <= 697: $item = "Staff of Wizardry" . $staff_charge; break; // Wands
			case $mi >= 698 and $mi <= 703: $item = "Wand of Detecting Magic" . $wand_charge; break; // Wands
			case $mi >= 704 and $mi <= 709: $item = "Wand of Detecting Minerals & Metals" . $wand_charge; break; // Wands
			case $mi >= 710 and $mi <= 715: $item = "Wand of Detecting Traps & Secret Doors" . $wand_charge; break; // Wands
			case $mi >= 716 and $mi <= 721: $item = "Wand of Enemy Detection" . $wand_charge; break; // Wands
			case $mi >= 722 and $mi <= 724: $item = "Wand of Fear" . $wand_charge; break; // Wands
			case $mi >= 725 and $mi <= 728: $item = "Wand of Fire" . $wand_charge; break; // Wands
			case $mi >= 729 and $mi <= 731: $item = "Wand of Ice" . $wand_charge; break; // Wands
			case $mi >= 732 and $mi <= 735: $item = "Wand of Light" . $wand_charge; break; // Wands
			case $mi >= 736 and $mi <= 738: $item = "Wand of Illusion" . $wand_charge; break; // Wands
			case $mi >= 739 and $mi <= 742: $item = "Wand of Lightning" . $wand_charge; break; // Wands
			case $mi >= 743 and $mi <= 748: $item = "Wand of Magic Missiles" . $wand_charge; break; // Wands
			case $mi >= 749 and $mi <= 754: $item = "Wand of Negation" . $wand_charge; break; // Wands
			case $mi >= 755 and $mi <= 760: $item = "Wand of Paralysation" . $wand_charge; break; // Wands
			case $mi >= 761 and $mi <= 766: $item = "Wand of Polymorphing" . $wand_charge; break; // Wands
			case $mi >= 767 and $mi <= 770: $item = "Wand of Summoning" . $wand_charge; break; // Wands
			case $mi >= 771 and $mi <= 773: $item = "Wand of Wonder" . $wand_charge; break; // Wands
			case $mi >= 774 and $mi <= 774: $item = mapMaker(997,$game); break; // Scrolls
			case $mi >= 775 and $mi <= 834: 										// Scrolls
				$mag = mt_rand(1,60);
				switch ($mag)
				{
					case $mag >= 1 and $mag <= 19: $scroll_picker = 1; $item = "Spell Scroll ("; break;
					case $mag >= 20 and $mag <= 27: $scroll_picker = 2; $item = "Spell Scrolls 2 ("; break;
					case $mag >= 28 and $mag <= 35: $scroll_picker = 3; $item = "Spell Scrolls 3 ("; break;
					case $mag >= 36 and $mag <= 42: $scroll_picker = 4; $item = "Spell Scrolls 4 ("; break;
					case $mag >= 43 and $mag <= 49: $scroll_picker = 5; $item = "Spell Scrolls 5 ("; break;
					case $mag >= 50 and $mag <= 54: $scroll_picker = 6; $item = "Spell Scrolls 6 ("; break;
					case $mag >= 55: $scroll_picker = 7; $item = "Spell Scrolls 7 ("; break;
				}
				break;
			case $mi >= 835 and $mi <= 870:															// Scrolls
				$dice = mt_rand(1,100);
				if ($dice >= 90){$item = "Scroll of Undead Warding";}
				else if ($dice >= 80){$item = "Scroll of Polymorph Warding";}
				else if ($dice >= 70){$item = "Scroll of Petrifaction Warding";}
				else if ($dice >= 55){$item = "Scroll of Magic Warding";}
				else if ($dice >= 54){$item = "Scroll of Werebear Warding";}
				else if ($dice >= 52){$item = "Scroll of Wereboar Warding";}
				else if ($dice >= 50){$item = "Scroll of Wererat Warding";}
				else if ($dice >= 49){$item = "Scroll of Weretiger Warding";}
				else if ($dice >= 47){$item = "Scroll of Werewolf Warding";}
				else if ($dice >= 46){$item = "Scroll of Lycanthrope Warding";}
				else if ($dice >= 45){$item = "Scroll of Shape-Changer Warding";}
				else if ($dice >= 38){$item = "Scroll of Any Elemental Warding";}
				else if ($dice >= 36){$item = "Scroll of Water Elemental Warding";}
				else if ($dice >= 34){$item = "Scroll of Fire Elemental Warding";}
				else if ($dice >= 32){$item = "Scroll of Earth Elemental Warding";}
				else if ($dice >= 30){$item = "Scroll of Air Elemental Warding";}
				else if ($dice >= 20){$item = "Scroll of Devil Warding";}
				else if ($dice >= 10){$item = "Scroll of Demon Warding";}
				else {$item = "Scroll of Acid Warding";}
				break;
			case $mi >= 871 and $mi <= 876: $item = "Cursed Scroll (" . curseType(mt_rand(1,10),reader,item,$game) . ")"; break; // Scrolls
			case $mi >= 877 and $mi <= 878: $item = "Incense of Meditation (1d4+1 cones)"; break; // Misc I
			case $mi >= 879 and $mi <= 880: $item = "Javelin of the Raptor"; break; // Misc I
			case $mi >= 881 and $mi <= 882: $item = "Thunder Spear"; break; // Misc I
			case $mi >= 883 and $mi <= 884: $item = "Boots of Elvenkind"; break; // Misc I
			case $mi >= 885 and $mi <= 886: $item = "Candle of Invocation"; break; // Misc I
			case $mi >= 887 and $mi <= 888: $item = "Dust of Appearance"; break; // Misc I
			case $mi >= 889 and $mi <= 890: $item = "Dust of Disappearance"; break; // Misc I
			case $mi >= 891 and $mi <= 892: $item = "Rope of Climbing"; break; // Misc I
			case $mi >= 893 and $mi <= 894: $item = "Scarab of Protection"; break; // Misc I
			case $mi >= 895 and $mi <= 896: $item = "Slippers of Spider Climbing"; break; // Misc I
			case $mi >= 897 and $mi <= 898: $item = "Strand of Prayer Beads"; // Misc I
				$dice = mt_rand(1,100);
				if ($dice >= 50){$item = $item . " (blessing & healing)";}
				else if ($dice >= 20){$item = $item . " (healing, karma, & smiting)";}
				else {$item = $item . " (healing, karma, summons, & wind walking)";}
				break;
			case $mi >= 899 and $mi <= 901: $item = "Amulet of Natural Armour"; break; // Misc I
			case $mi >= 902 and $mi <= 904: $item = "Blessed Book"; break; // Misc I
			case $mi >= 905 and $mi <= 907: $item = "Brooch of Shielding"; break; // Misc I
			case $mi >= 908 and $mi <= 910: $item = "Hat of Disguise"; break; // Misc I
			case $mi >= 911 and $mi <= 913: 								 // Misc I
				$dice = mt_rand(1,100);
				if ($dice >= 91){$item = "Iron Horn of Valhalla";}
				else if ($dice >= 76){$item = "Bronze Horn of Valhalla";}
				else if ($dice >= 41){$item = "Brass Horn of Valhalla";}
				else {$item = "Silver Horn of Valhalla";}							
				break;
			case $mi >= 914 and $mi <= 916: $item = "Periapt of Proof Against Poison"; break; // Misc I
			case $mi >= 917 and $mi <= 919: $item = "Phylactery of Faithfulness"; break; // Misc I
			case $mi >= 920 and $mi <= 922: $item = "Robe of Blending"; break; // Misc I
			case $mi >= 923 and $mi <= 926: $item = "Pipes of the Sewers"; break; // Misc I
			case $mi >= 927 and $mi <= 930: $item = "Restorative Ointment"; break; // Misc I
			case $mi >= 931 and $mi <= 934: $item = "Robe of Useful Items"; break; // Misc I
			case $mi >= 935 and $mi <= 938: $item = "Vest of Escape"; break; // Misc I
			case $mi >= 939 and $mi <= 942: $item = "Cloak of Elvenkind"; break; // Misc I
			case $mi >= 943 and $mi <= 947: $item = "Wings of Flying"; break; // Misc I
			case $mi >= 948 and $mi <= 957: $item = "Cloak of Resistance"; // Misc I
				$dice = mt_rand(1,100);
				if ($dice >= 100){$item = $item . " +5 to saves";}
				else if ($dice >= 91){$item = $item . " +4 to saves";}
				else if ($dice >= 76){$item = $item . " +3 to saves";}
				else if ($dice >= 51){$item = $item . " +2 to saves";}
				else {$item = $item . " +1 to saves";}							
				break;
			case $mi >= 958 and $mi <= 968: $item = "Feather Token"; // Misc I
				$dice = mt_rand(1,6);
				if ($dice >= 1){ $item = $item . " (Anchor)"; }
				else if ($dice >= 2){ $item = $item . " (Bird)"; }
				else if ($dice >= 3){ $item = $item . " (Fan)"; }
				else if ($dice >= 4){ $item = $item . " (Swan Boat)"; }
				else if ($dice >= 5){ $item = $item . " (Tree)"; }
				else { $item = $item . " (Whip)"; }
				break;
			case $mi >= 969 and $mi <= 979: $item = "Figurines of Wondrous Power"; // Misc I
				$dice = mt_rand(1,36);
				if ($dice >= 4){ $item = $item . " (Bronze Griffon)"; }
				else if ($dice >= 8){ $item = $item . " (Ebony Fly)"; }
				else if ($dice >= 12){ $item = $item . " (Golden Lion)"; }
				else if ($dice >= 13){ $item = $item . " (3 Ivory Goats)"; }
				else if ($dice >= 14){ $item = $item . " (Goat of Traveling)"; }
				else if ($dice >= 15){ $item = $item . " (Goat of Travail)"; }
				else if ($dice >= 16){ $item = $item . " (Goat of Terror)"; }
				else if ($dice >= 20){ $item = $item . " (Marble Elephant)"; }
				else if ($dice >= 24){ $item = $item . " (Obsidian Steed)"; }
				else if ($dice >= 28){ $item = $item . " (Onyx Dog)"; }
				else if ($dice >= 32){ $item = $item . " (Serpentine Owl)"; }
				else { $item = $item . " (Silver Raven)"; }
				break;
			case $mi >= 980 and $mi <= 1005: $item = "Bracers of Armour"; break; // Misc I
			case $mi >= 1006 and $mi <= 1007: $item = "Arrow of Direction"; break; // Misc II
			case $mi >= 1008 and $mi <= 1009: $item = "Brazier of Commanding Fire Elementals"; break; // Misc II
			case $mi >= 1010 and $mi <= 1011: $item = "Cape of the Mountebank"; break; // Misc II
			case $mi >= 1012 and $mi <= 1013: $item = "Cloak of the Manta Ray"; break; // Misc II
			case $mi >= 1014 and $mi <= 1015: $item = "Decanter of Endless Water"; break; // Misc II
			case $mi >= 1016 and $mi <= 1017: $item = "Dust of Dryness"; break; // Misc II
			case $mi >= 1018 and $mi <= 1019: $item = "Elixir of Swimming"; break; // Misc II
			case $mi >= 1020 and $mi <= 1021: $item = "Gloves of Arrow Snaring"; break; // Misc II
			case $mi >= 1022 and $mi <= 1023: $item = "Gloves of Swimming and Climbing"; break; // Misc II
			case $mi >= 1024 and $mi <= 1025: $item = "Goggles of Night"; break; // Misc II
			case $mi >= 1026 and $mi <= 1027: $item = "Horseshoes of Speed"; break; // Misc II
			case $mi >= 1028 and $mi <= 1029: $item = "Necklace of Adaptation"; break; // Misc II
			case $mi >= 1030 and $mi <= 1031: $item = "Orb of Storms"; break; // Misc II
			case $mi >= 1032 and $mi <= 1033: $item = "Periapt of Health"; break; // Misc II
			case $mi >= 1034 and $mi <= 1035: $item = "Pipes of Haunting"; break; // Misc II
			case $mi >= 1036 and $mi <= 1037: $item = "Ring Gates"; break; // Misc II
			case $mi >= 1038 and $mi <= 1039: $item = "Robe of Bones"; break; // Misc II
			case $mi >= 1040 and $mi <= 1041: $item = "Unguent of Timelessness"; break; // Misc II
			case $mi >= 1042 and $mi <= 1044: $item = "Universal Solvent"; break; // Misc II
			case $mi >= 1045 and $mi <= 1047: $item = "Amulet of Proof Against Detection or Location"; break; // Misc II
			case $mi >= 1048 and $mi <= 1050: $item = "Boots of Speed"; break; // Misc II
			case $mi >= 1051 and $mi <= 1053: $item = "Boots of Striding and Springing"; break; // Misc II
			case $mi >= 1054 and $mi <= 1056: $item = "Lesser Bracers of Archery"; break; // Misc II
			case $mi >= 1057 and $mi <= 1059: $item = "Candle of Truth"; break; // Misc II
			case $mi >= 1060 and $mi <= 1062: $item = "Minor Cloak of Displacement"; break; // Misc II
			case $mi >= 1063 and $mi <= 1065: $item = "Cloak of the Bat"; break; // Misc II
			case $mi >= 1066 and $mi <= 1068: $item = "Dark Skull"; break; // Misc II
			case $mi >= 1069 and $mi <= 1071: $item = "Dust of Tracelessness"; break; // Misc II
			case $mi >= 1072 and $mi <= 1074: $item = "Elixir of Truth"; break; // Misc II
			case $mi >= 1075 and $mi <= 1077: $item = "Elixir of Vision"; break; // Misc II
			case $mi >= 1078 and $mi <= 1080: $item = "Glove of Storing"; break; // Misc II
			case $mi >= 1081 and $mi <= 1083: $item = "Horn of the Tritons"; break; // Misc II
			case $mi >= 1084 and $mi <= 1086: $item = "Necklace of Fireballs"; // Misc II
				$dice = mt_rand(1,180);
				if ($dice >= 140){ $item = $item . " (Type I)"; }
				else if ($dice >= 105){ $item = $item . " (Type II)"; }
				else if ($dice >= 75){ $item = $item . " (Type III)"; }
				else if ($dice >= 50){ $item = $item . " (Type IV)"; }
				else if ($dice >= 30){ $item = $item . " (Type V)"; }
				else if ($dice >= 15){ $item = $item . " (Type VI)"; }
				else {$item = $item . " (Type VII)"; }
				break;
			case $mi >= 1087 and $mi <= 1089: $item = "Periapt of Wound Closure"; break; // Misc II
			case $mi >= 1090 and $mi <= 1092: $item = "Phylactery of Undead Turning"; break; // Misc II
			case $mi >= 1093 and $mi <= 1095: $item = "Rope of Entanglement"; break; // Misc II
			case $mi >= 1096 and $mi <= 1098: $item = "Stone Horse"; break; // Misc II
			case $mi >= 1099 and $mi <= 1101: $item = "Stone of Alarm"; break; // Misc II
			case $mi >= 1102 and $mi <= 1104: $item = "Sustaining Spoon"; break; // Misc II
			case $mi >= 1105 and $mi <= 1107: $item = "Wind Fan"; break; // Misc II
			case $mi >= 1108 and $mi <= 1111: $item = "Bag of Holding"; // Misc II
				$dice = mt_rand(1,20);
				if ($dice >= 8){ $item = $item . " (weighs 15 lbs, but can hold 250 lbs with 30` of cubic space)"; }
				else if ($dice >= 14){ $item = $item . " (weighs 25 lbs, but can hold 500 lbs with 70` of cubic space)"; }
				else if ($dice >= 18){ $item = $item . " (weighs 35 lbs, but can hold 1,000 lbs with 150` of cubic space)"; }
				else {$item = $item . " (weighs 60 lbs, but can hold 1,500 lbs with 250` of cubic space)"; }
				break;
			case $mi >= 1112 and $mi <= 1115: $item = "Boots of Levitation"; break; // Misc II
			case $mi >= 1116 and $mi <= 1119: $item = "Bottle of Air"; break; // Misc II
			case $mi >= 1120 and $mi <= 1123: $item = "Broom of Flying"; break; // Misc II
			case $mi >= 1124 and $mi <= 1127: $item = "Crystal Ball"; // Misc II
				$dice = mt_rand(1,100);
				if ($dice >= 96){$item = $item . " with True Seeing";}
				else if ($dice >= 91){$item = $item . " with ESP";}
				else if ($dice >= 86){$item = $item . " with Invisibility Seeing";}
				else if ($dice >= 76){$item = $item . " with Clairaudience";}					
				break;
			case $mi >= 1128 and $mi <= 1131: $item = "Elixir of Fire Breath"; break; // Misc II
			case $mi >= 1132 and $mi <= 1135: $item = "Elixir of Hiding"; break; // Misc II
			case $mi >= 1136 and $mi <= 1139: $item = "Handy Haversack"; break; // Misc II
			case $mi >= 1140 and $mi <= 1143: $item = "Harp of Charming"; break; // Misc II
			case $mi >= 1144 and $mi <= 1147: $item = "Helm of Comprehend Languages and Read Magic"; break; // Misc II
			case $mi >= 1148 and $mi <= 1151: $item = "Helm of Underwater Action"; break; // Misc II
			case $mi >= 1152 and $mi <= 1155: $item = "Horn of Fog"; break; // Misc II
			case $mi >= 1156 and $mi <= 1157: $item = "Ahmek`s Copious Coin Purse"; break; // Misc III
			case $mi >= 1158 and $mi <= 1159: $item = "Alchemy Jug"; break; // Misc III
			case $mi >= 1160 and $mi <= 1161: $item = "Amulet of Health"; break; // Misc III
			case $mi >= 1162 and $mi <= 1163: $item = "Amulet of the Planes"; break; // Misc III
			case $mi >= 1164 and $mi <= 1165: $item = "Apparatus of the Lobster"; break; // Misc III
			case $mi >= 1166 and $mi <= 1167: $item = "Bag of Tricks"; // Misc III
				$dice = mt_rand(1,3);
				if ($dice >= 1){ $item = $item . " (gray colored)"; }
				else if ($dice >= 2){ $item = $item . " (rust colored)"; }
				else { $item = $item . " (tan colored)"; }
				break;
			case $mi >= 1168 and $mi <= 1169: $item = "Bead of Force"; break; // Misc III
			case $mi >= 1170 and $mi <= 1171: $item = "Blemish Blotter"; break; // Misc III
			case $mi >= 1172 and $mi <= 1173: $item = "Boots of the Winterlands"; break; // Misc III
			case $mi >= 1174 and $mi <= 1175: $item = "Bowl of Commanding Water Elementals"; break; // Misc III
			case $mi >= 1176 and $mi <= 1177: $item = "Bracelet of Friends"; break; // Misc III
			case $mi >= 1178 and $mi <= 1179: $item = "Greater Bracers of Archery"; break; // Misc III
			case $mi >= 1180 and $mi <= 1181: $item = "Carpet of Flying"; // Misc III
				$dice = mt_rand(1,3);
				if ($dice >= 1){ $item = $item . " (5` x 5` and holds 200 lbs)"; }
				else if ($dice >= 2){ $item = $item . " (5` x 10` and holds 400 lbs)"; }
				else { $item = $item . " (10` x 10` and holds 800 lbs)"; }
				break;
			case $mi >= 1182 and $mi <= 1183: $item = "Censer of Controlling Air Elementals"; break; // Misc III
			case $mi >= 1184 and $mi <= 1185: $item = "Chime of Interruption"; break; // Misc III
			case $mi >= 1186 and $mi <= 1187: $item = "Chime of Opening"; break; // Misc III
			case $mi >= 1188 and $mi <= 1189: $item = "Minor Circlet of Blasting"; break; // Misc III
			case $mi >= 1190 and $mi <= 1191: $item = "Circlet of Persuasion"; break; // Misc III
			case $mi >= 1192 and $mi <= 1193: $item = "Cloak of Etherealness"; break; // Misc III
			case $mi >= 1194 and $mi <= 1195: $item = "Cloak of Arachnida"; break; // Misc III
			case $mi >= 1196 and $mi <= 1197: $item = "Cloak of Charisma"; break; // Misc III
			case $mi >= 1198 and $mi <= 1199: $item = "Major Cloak of Displacement"; break; // Misc III
			case $mi >= 1200 and $mi <= 1201: $item = "Cube of Force"; break; // Misc III
			case $mi >= 1202 and $mi <= 1203: $item = "Cube of Frost Resistance"; break; // Misc III
			case $mi >= 1204 and $mi <= 1205: $item = "Cubic Gate"; break; // Misc III
			case $mi >= 1206 and $mi <= 1207: $item = "Deck of Illusion"; break; // Misc III
			case $mi >= 1208 and $mi <= 1209: $item = "Dimensional Shackles"; break; // Misc III
			case $mi >= 1210 and $mi <= 1211: $item = "Drums of Panic"; break; // Misc III
			case $mi >= 1212 and $mi <= 1213: $item = "Dust of Illusion"; break; // Misc III
			case $mi >= 1214 and $mi <= 1215: $item = "Efficient Quiver"; break; // Misc III
			case $mi >= 1216 and $mi <= 1217: $item = "Elemental Gem"; break; // Misc III
			case $mi >= 1218 and $mi <= 1219: $item = "Eyes of the Eagle"; break; // Misc III
			case $mi >= 1220 and $mi <= 1221: $item = "Gauntlets of Ogre Power"; break; // Misc III
			case $mi >= 1222 and $mi <= 1223: $item = "Gauntlets of Rust"; break; // Misc III
			case $mi >= 1224 and $mi <= 1225: $item = "Gloves of Dexterity"; break; // Misc III
			case $mi >= 1226 and $mi <= 1227: $item = "Goggles of Minute Seeing"; break; // Misc III
			case $mi >= 1228 and $mi <= 1229: $item = "Headband of Intellect"; break; // Misc III
			case $mi >= 1230 and $mi <= 1231: $item = "Helm of Telepathy"; break; // Misc III
			case $mi >= 1232 and $mi <= 1233: $item = "Horn of Goodness/Evil"; break; // Misc III
			case $mi >= 1234 and $mi <= 1235: $item = "Horseshoes of the Zephyr"; break; // Misc III
			case $mi >= 1236 and $mi <= 1237: $item = "Instant Fortress"; break; // Misc III
			case $mi >= 1238 and $mi <= 1239: $item = "Iron Bands of Binding"; break; // Misc III
			case $mi >= 1240 and $mi <= 1241: $item = "Iron Flask"; break; // Misc III
			case $mi >= 1242 and $mi <= 1243: $item = "Lantern of Revealing"; break; // Misc III
			case $mi >= 1244 and $mi <= 1245: $item = "Mantle of Faith"; break; // Misc III
			case $mi >= 1246 and $mi <= 1247: $item = "Mantle of Magic Resistance"; break; // Misc III
			case $mi >= 1248 and $mi <= 1249: $item = "Marvellous Pigments (1d4 pots)"; break; // Misc III
			case $mi >= 1250 and $mi <= 1251: $item = "Mask of the Skull"; break; // Misc III
			case $mi >= 1252 and $mi <= 1253: $item = "Medallion of Thoughts"; break; // Misc III
			case $mi >= 1254 and $mi <= 1255: $item = "Pearl of Power"; break; // Misc III
			case $mi >= 1256 and $mi <= 1257: $item = "Pearl of the Sirines"; break; // Misc III
			case $mi >= 1258 and $mi <= 1259: $item = "Periapt of Wisdom"; break; // Misc III
			case $mi >= 1260 and $mi <= 1261: $item = "Pipes of Pain"; break; // Misc III
			case $mi >= 1262 and $mi <= 1263: $item = "Pipes of Sounding"; break; // Misc III
			case $mi >= 1264 and $mi <= 1265: $item = "Plentiful Vessel"; break; // Misc III
			case $mi >= 1266 and $mi <= 1267: $item = "Robe of Stars"; break; // Misc III
			case $mi >= 1268 and $mi <= 1269: $item = "Scabbard of Keen Edges"; break; // Misc III
			case $mi >= 1270 and $mi <= 1271: $item = "Scarab of Golem Bane"; break; // Misc III
			case $mi >= 1272 and $mi <= 1273: $item = "Silversheen"; break; // Misc III
			case $mi >= 1274 and $mi <= 1275: $item = "Sovereign Glue"; break; // Misc III
			case $mi >= 1276 and $mi <= 1277: $item = "Stone of Controlling Earth Elementals"; break; // Misc III
			case $mi >= 1278 and $mi <= 1279: $item = "Stone of Good Luck"; break; // Misc III
			case $mi >= 1280 and $mi <= 1281: $item = "Stone Salve"; break; // Misc III
			case $mi >= 1282 and $mi <= 1283: $item = "Druid`s Vestment"; break; // Misc III
			case $mi >= 1284 and $mi <= 1285: $item = "Well of Many Worlds"; break; // Misc III
			case $mi >= 1286 and $mi <= 1287: $item = "Afreeti Bottle"; break; // Misc IV
			case $mi >= 1288 and $mi <= 1289: $item = "Amulet of Life Protection"; break; // Misc IV
			case $mi >= 1290 and $mi <= 1291: $item = "Amulet of Mighty Fists"; break; // Misc IV
			case $mi >= 1292 and $mi <= 1293: $item = "Belt of Dwarfkind"; break; // Misc IV
			case $mi >= 1294 and $mi <= 1295: $item = "Belt of Giant Strength"; break; // Misc IV
			case $mi >= 1296 and $mi <= 1297: $item = "Boat Folding"; break; // Misc IV
			case $mi >= 1298 and $mi <= 1299: $item = "Boots of Teleportation"; break; // Misc IV
			case $mi >= 1300 and $mi <= 1301: $item = "Winged Boots"; break; // Misc IV
			case $mi >= 1302 and $mi <= 1303: $item = "Brooch of Instigation"; break; // Misc IV
			case $mi >= 1304 and $mi <= 1305: $item = "Major Circlet of Blasting"; break; // Misc IV
			case $mi >= 1306 and $mi <= 1307: $item = "Eversmoking Bottle"; break; // Misc IV
			case $mi >= 1308 and $mi <= 1309: $item = "Eyes of Charming"; break; // Misc IV
			case $mi >= 1310 and $mi <= 1311: $item = "Eyes of Doom"; break; // Misc IV
			case $mi >= 1312 and $mi <= 1313: $item = "Eyes of Petrifaction"; break; // Misc IV
			case $mi >= 1314 and $mi <= 1315: $item = "Gem of Brightness"; break; // Misc IV
			case $mi >= 1316 and $mi <= 1317: $item = "Gem of Seeing"; break; // Misc IV
			case $mi >= 1318 and $mi <= 1319: $item = "Golem Manual"; break; // Misc IV
			case $mi >= 1320 and $mi <= 1321: $item = "Helm of Brilliance"; break; // Misc IV
			case $mi >= 1322 and $mi <= 1323: $item = "Helm of Teleportation"; break; // Misc IV
			case $mi >= 1324 and $mi <= 1325: $item = "Horn of Blasting"; break; // Misc IV
			case $mi >= 1326 and $mi <= 1327: $item = "Greater Horn of Blasting"; break; // Misc IV
			case $mi >= 1328 and $mi <= 1329: $item = "Ioun Stone"; // Misc IV
				$dice = mt_rand(1,96);
				if ($dice >= 90){$item = $item . " (Lavender & Green Ellipsoid)"; }
				else if ($dice >= 84){$item = $item . " (Orange Prism)"; }
				else if ($dice >= 78){$item = $item . " (Pale Green Prism)"; }
				else if ($dice >= 73){$item = $item . " (Pearly White Spindle)"; }
				else if ($dice >= 67){$item = $item . " (Pale Lavender Ellipsoid)"; }
				else if ($dice >= 61){$item = $item . " (Iridescent Spindle)"; }
				else if ($dice >= 55){$item = $item . " (Vibrant Purple Prism)"; }
				else if ($dice >= 49){$item = $item . " (Dark Blue Rhomboid)"; }
				else if ($dice >= 43){$item = $item . " (Scarlet & Blue Sphere)"; }
				else if ($dice >= 37){$item = $item . " (Pink & Green Sphere)"; }
				else if ($dice >= 31){$item = $item . " (Pink Rhomboid)"; }
				else if ($dice >= 25){$item = $item . " (Pale Blue Rhomboid)"; }
				else if ($dice >= 19){$item = $item . " (Incandescent Blue Sphere)"; }
				else if ($dice >= 14){$item = $item . " (Deep Red Sphere)"; }
				else if ($dice >= 7){$item = $item . " (Dusty Rose Prism)"; }
				else {$item = $item . " (Clear Spindle)"; }
				break;
			case $mi >= 1330 and $mi <= 1331: $item = "Lyre of Building"; break; // Misc IV
			case $mi >= 1332 and $mi <= 1333: $item = "Manual of Bodily Health"; break; // Misc IV
			case $mi >= 1334 and $mi <= 1335: $item = "Manual of Gainful Exercise"; break; // Misc IV
			case $mi >= 1336 and $mi <= 1337: $item = "Manual of Quickness of Action"; break; // Misc IV
			case $mi >= 1338 and $mi <= 1339: $item = "Mattock of the Titans"; break; // Misc IV
			case $mi >= 1340 and $mi <= 1341: $item = "Maul of the Titans"; break; // Misc IV
			case $mi >= 1342 and $mi <= 1343: $item = "Mirror of Life Trapping"; break; // Misc IV
			case $mi >= 1344 and $mi <= 1345: $item = "Mirror of Mental Prowess"; break; // Misc IV
			case $mi >= 1346 and $mi <= 1347: $item = "Mirror of Opposition"; break; // Misc IV
			case $mi >= 1348 and $mi <= 1349: $item = "Oil of Famishing"; break; // Misc IV
			case $mi >= 1350 and $mi <= 1351: $item = "Portable Hole"; break; // Misc IV
			case $mi >= 1352 and $mi <= 1353: $item = "Robe of Eyes"; break; // Misc IV
			case $mi >= 1354 and $mi <= 1355: $item = "Robe of Scintillating Colours"; break; // Misc IV
			case $mi >= 1356 and $mi <= 1357: $item = "Robe of the Archmagi"; break; // Misc IV
			case $mi >= 1358 and $mi <= 1359: $item = "Sagacious Volume"; // Misc IV
				$dice = mt_rand(1,9);
				if ($dice >= 9){$item = $item . " (Assassin)"; }
				else if ($dice >= 8){$item = $item . " (Cleric)"; }
				else if ($dice >= 7){$item = $item . " (Druid)"; }
				else if ($dice >= 6){$item = $item . " (Fighter)"; }
				else if ($dice >= 5){$item = $item . " (Illusionist)"; }
				else if ($dice >= 4){$item = $item . " (Magic-User)"; }
				else if ($dice >= 3){$item = $item . " (Paladin)"; }
				else if ($dice >= 2){$item = $item . " (Ranger)"; }
				else {$item = $item . " (Thief)"; }
				break;
			case $mi >= 1360 and $mi <= 1361: $item = "Shrouds of Disintegration"; break; // Misc IV
			case $mi >= 1362 and $mi <= 1363: $item = "Tome of Clear Thought"; break; // Misc IV
			case $mi >= 1364 and $mi <= 1365: $item = "Tome of Leadership and Influence"; break; // Misc IV
			case $mi >= 1366 and $mi <= 1367: $item = "Tome of Understanding"; break; // Misc IV
			case $mi >= 1368 and $mi <= 1372:											// Misc IV
				$dice = mt_rand(1,95);
				if ($dice <= 5){$item = "Amulet of Inescapable Location"; }
				else if ($dice <= 7){$item = "Armour of Arrow Attraction"; }
				else if ($dice <= 10){$item = "Armour of Rage"; }
				else if ($dice <= 13){$item = "Bag of Devouring"; }
				else if ($dice <= 17){$item = "Boots of Dancing"; }
				else if ($dice <= 22){$item = "Bracers of Defencelessness"; }
				else if ($dice <= 23){$item = "Broom of Animated Attack"; }
				else if ($dice <= 24){$item = "Cloak of Poisonousness"; }
				else if ($dice <= 25){$item = "Crystal Hypnosis Ball"; }
				else if ($dice <= 27){$item = "Dust of Sneezing and Choking"; }
				else if ($dice <= 33){$item = "Flask of Curses"; }
				else if ($dice <= 38){$item = "Gauntlets of Fumbling"; }
				else if ($dice <= 39){$item = "Helm of Opposite Alignment"; }
				else if ($dice <= 44){$item = "Incense of Obsession"; }
				else if ($dice <= 49){$item = "Mace of Blood"; }
				else if ($dice <= 52){$item = "Medallion of Thought Projection"; }
				else if ($dice <= 53){$item = "Necklace of Strangulation"; }
				else if ($dice <= 55){$item = "Net of Snaring"; }
				else if ($dice <= 58){$item = "Periapt of Foul Rotting"; }
				else if ($dice <= 63){$item = "Plate Mail Armor of Vulnerability"; }
				else if ($dice <= 66){$item = "Ring of Clumsiness"; }
				else if ($dice <= 70){$item = "Ring of Weakness"; }
				else if ($dice <= 73)
				{
					$rncs = mt_rand(1,6);
					if ($rncs == 1){$item = "Ring of Contrariness & Flying";}
					else if ($rncs == 2){$item = "Ring of Contrariness & Invisibility";}				
					else if ($rncs == 3){$item = "Ring of Contrariness & Levitation";}
					else if ($rncs == 4){$item = "Ring of Contrariness & Shocking Grasp";}
					else if ($rncs == 5){$item = "Ring of Contrariness & Spell Turning";}	
					else {$item = "Ring of Contrariness & Strength (18.99)";}				
				}
				else if ($dice <= 75){$item = "Robe of Powerlessness"; }
				else if ($dice <= 80){$item = "Robe of Vermin"; }
				else if ($dice <= 81){$item = "Scarab of Death"; }
				else if ($dice <= 86){$item = "Cursed Backbiter Spear"; }
				else if ($dice <= 91){$item = "Stone of Weight (Loadstone)"; }
				else if ($dice <= 94){$item = "Sword of the Berserker"; }
				else if ($dice <= 98){$item = "Shield -1 of Missile Attraction"; }
				else {$item = "Vacuous Grimoire"; }
				break;
			case $mi >= 1373:											// Misc IV - OSRIC Artifacts
				$dice = mt_rand(1,9);
				if ($dice <= 1){$item = "Book of Infinite Spells";
					$pages = 20 + mt_rand(2,12);
						$item = $item . " with " . $pages . " pages [";
						while ($pages > 0):
							$dice = mt_rand(1,100);
							$page = $page + 1;
							if ($dice >= 96){ $item = $item . "pg" . $page . " " . gameSpellChooser($game,0,Illusionist) . ", "; }
							else if ($dice >= 61){ $item = $item . "pg" . $page . " " . gameSpellChooser($game,0,Magic-User) . ", "; }
							else if ($dice >= 51){ $item = $item . "pg" . $page . " " . gameSpellChooser($game,0,Cleric) . ", "; }
							else if ($dice >= 31){ $item = $item . "pg" . $page . " " . gameSpellChooser($game,0,Druid) . ", "; }
							else { $item = $item . "pg" . $page . " is blank, "; }
							$pages = $pages - 1;
						endwhile;
						$item = substr($item, 0, -2);
						$item = $item . "]";
				}
				else if ($dice <= 2){$item = "Deck of Many Things"; }
				else if ($dice <= 3){$item = "Hammer of Thunderbolts"; }
				else if ($dice <= 4){$item = "Philosopher`s Stone"; }
				else if ($dice <= 5){$item = "Sphere of Annihilation"; }
				else if ($dice <= 6){$item = "Talisman of Pure Good"; }
				else if ($dice <= 7){$item = "Talisman of the Sphere"; }
				else if ($dice <= 8){$item = "Talisman of Reluctant Wishes"; }
				else {$item = "Talisman of Pure Evil"; }
				break;
		}
		if ($scroll_picker > 0)
		{
			while ($scroll_picker > 0) :
				$spell = $spell . gameSpellChooser($game,mt_rand(1,20),'') . ", ";
				$scroll_picker = $scroll_picker - 1;
			endwhile;
			$item = $item . substr($spell, 0, -2) . ")";
		}
	}
/////////////////////////// END OF THE OSRIC SECTION ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	else if ($game == "AD&D") ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		$ua = $_SESSION["SESSION_ADD_UA"];

		// CHOOSE A CATEGORY
		$category = mt_rand(1,20);
		if ($category > 18){$magic_item = "sword"; if ($ua > 0){$mi = mt_rand(1,199);} else {$mi = mt_rand(1,162);} }
		else if ($category > 15){$magic_item = "scroll"; if ($ua > 0){$mi = mt_rand(0,200);} else {$mi = mt_rand(0,100);} }
		else if ($category > 14){$magic_item = "wand"; if ($ua > 0){$mi = mt_rand(1,195);} else {$mi = mt_rand(1,109);} }
		else if ($category > 13){$magic_item = "ring"; if ($ua > 0){$mi = mt_rand(1,198);} else {$mi = mt_rand(1,100);} }
		else if ($category > 9){$magic_item = "potion"; if ($ua > 0){$mi = mt_rand(1,200);} else {$mi = mt_rand(1,100);} }
		else if ($category > 6){$magic_item = "weapon"; if ($ua > 0){$mi = mt_rand(1,200);} else {$mi = mt_rand(1,139);} }
		else if ($category > 3)
		{
			$magic_item = "magic";
			if (mt_rand(1,1000) == 1){$mi = 0;}
			else if ($ua > 0){$mi = mt_rand(1,699);}
			else {$mi = mt_rand(1,500);}
		}
		else {$magic_item = "armor"; if ($ua > 0){$mi = mt_rand(1,199);} else {$mi = mt_rand(1,96);} }

		if ($varb == 1){$magic_item = "potion";}

		$elfin = mt_rand(1,100);
		if ($elfin >= 96 ){$elfins = " that fits a large man";}
		else if ($elfin >= 81){$elfins = " that fits a normal man";}
		else if ($elfin >= 16){$elfins = " that fits an elf or half-elf";}
		else if ($elfin >= 11){$elfins = " that fits a dwarf or halfling";}
		else {$elfins = " that fits a gnome or halfling";}

		$metal = mt_rand(1,100);
		if ($metal >= 35 ){$metals = " that fits a normal man";}
		else if ($metal >= 15){$metals = " that fits an elf or half-elf";}
		else if ($metal >= 5){$metals = " that fits a dwarf";}
		else {$metals = " that fits a gnome or halfling";}

		$rod_charge = " with " . mt_rand(2,40) . " charges";
		$staff_charge = " with " . mt_rand(2,20) . " charges";
		$wand_charge = " with " . mt_rand(2,80) . " charges";

		if ($magic_item == "armor") ///////////////////////////////////////////////////
		{
			switch($mi)
			{
				case $mi >= 1 and $mi <= 5: $item = "Chain Mail +1" . $metals; break; //DM - Armor
				case $mi >= 6 and $mi <= 9: $item = "Chain Mail +2" . $metals; break; //DM - Armor
				case $mi >= 10 and $mi <= 11: $item = "Chain Mail +3" . $metals; break; //DM - Armor
				case $mi >= 12 and $mi <= 19: $item = "Leather Armor +1" . $metals; break; //DM - Armor
				case $mi >= 20 and $mi <= 26: $item = "Plate Mail +1" . $metals; break; //DM - Armor
				case $mi >= 27 and $mi <= 32: $item = "Plate Mail +2" . $metals; break; //DM - Armor
				case $mi >= 33 and $mi <= 35: $item = "Plate Mail +3" . $metals; break; //DM - Armor
				case $mi >= 36 and $mi <= 37: $item = "Plate Mail +4" . $metals; break; //DM - Armor
				case $mi >= 38 and $mi <= 38: $item = "Plate Mail +5" . $metals; break; //DM - Armor
				case $mi >= 39 and $mi <= 39: $item = "Plate Mail of Etherealness" . $metals; break; //DM - Armor
				case $mi >= 40 and $mi <= 44: $item = "Plate Mail of Vulnerability" . $metals; break; //DM - Armor
				case $mi >= 45 and $mi <= 50: $item = "Ring Mail +1" . $metals; break; //DM - Armor
				case $mi >= 51 and $mi <= 55: $item = "Scale Mail +1" . $metals; break; //DM - Armor
				case $mi >= 56 and $mi <= 64: $item = "Shield +1"; break; //DM - Armor
				case $mi >= 65 and $mi <= 69: $item = "Shield +2"; break; //DM - Armor
				case $mi >= 70 and $mi <= 73: $item = "Shield +3"; break; //DM - Armor
				case $mi >= 74 and $mi <= 75: $item = "Shield +4"; break; //DM - Armor
				case $mi >= 76 and $mi <= 76: $item = "Shield +5"; break; //DM - Armor
				case $mi >= 77 and $mi <= 79: $item = "Shield -1, missile attractor"; break; //DM - Armor
				case $mi >= 80 and $mi <= 80: $item = "Shield, large, +1, +4 vs missiles"; break; //DM - Armor
				case $mi >= 81 and $mi <= 84: $item = "Splint Mail +1" . $metals; break; //DM - Armor
				case $mi >= 85 and $mi <= 87: $item = "Splint Mail +2" . $metals; break; //DM - Armor
				case $mi >= 88 and $mi <= 89: $item = "Splint Mail +3" . $metals; break; //DM - Armor
				case $mi >= 90 and $mi <= 90: $item = "Splint Mail +4" . $metals; break; //DM - Armor
				case $mi >= 91 and $mi <= 96: $item = "Studded Leather +1" . $metals; break; //DM - Armor
				case $mi >= 97 and $mi <= 102: $item = "Bronze Plate Mail +1" . $metals; break; //UA - Armor
				case $mi >= 103 and $mi <= 106: $item = "Bronze Plate Mail +2" . $metals; break; //UA - Armor
				case $mi >= 107 and $mi <= 112: $item = "Buckler +1"; break; //UA - Armor
				case $mi >= 113 and $mi <= 116: $item = "Buckler +2"; break; //UA - Armor
				case $mi >= 117 and $mi <= 118: $item = "Buckler +3"; break; //UA - Armor
				case $mi >= 119 and $mi <= 120: $item = "Chain Mail +4" . $metals; break; //UA - Armor
				case $mi >= 121 and $mi <= 126: $item = "Elfin Chain Mail +1" . $elfins; break; //UA - Armor
				case $mi >= 127 and $mi <= 130: $item = "Elfin Chain Mail +2" . $elfins; break; //UA - Armor
				case $mi >= 131 and $mi <= 133: $item = "Elfin Chain Mail +3" . $elfins; break; //UA - Armor
				case $mi >= 134 and $mi <= 135: $item = "Elfin Chain Mail +4" . $elfins; break; //UA - Armor
				case $mi >= 136 and $mi <= 136: $item = "Elfin Chain Mail +5" . $elfins; break; //UA - Armor
				case $mi >= 137 and $mi <= 143: $item = "Field Plate Armor +1" . $metals; break; //UA - Armor
				case $mi >= 144 and $mi <= 149: $item = "Field Plate Armor +2" . $metals; break; //UA - Armor
				case $mi >= 150 and $mi <= 152: $item = "Field Plate Armor +3" . $metals; break; //UA - Armor
				case $mi >= 153 and $mi <= 154: $item = "Field Plate Armor +4" . $metals; break; //UA - Armor
				case $mi >= 155 and $mi <= 155: $item = "Field Plate Armor +5" . $metals; break; //UA - Armor
				case $mi >= 156 and $mi <= 161: $item = "Full Plate Armor +1" . $metals; break; //UA - Armor
				case $mi >= 162 and $mi <= 165: $item = "Full Plate Armor +2" . $metals; break; //UA - Armor
				case $mi >= 166 and $mi <= 168: $item = "Full Plate Armor +3" . $metals; break; //UA - Armor
				case $mi >= 169 and $mi <= 170: $item = "Full Plate Armor +4" . $metals; break; //UA - Armor
				case $mi >= 171 and $mi <= 179: $item = "Leather Armor +2" . $metals; break; //UA - Armor
				case $mi >= 180 and $mi <= 184: $item = "Leather Armor +3" . $metals; break; //UA - Armor
				case $mi >= 185 and $mi <= 188: $item = "Ring Mail +2" . $metals; break; //UA - Armor
				case $mi >= 189 and $mi <= 192: $item = "Scale Mail +2" . $metals; break; //UA - Armor
				case $mi >= 193 and $mi <= 194: $item = "Scale Mail +3" . $metals; break; //UA - Armor
				case $mi >= 195: $item = "Studded Leather +2" . $metals; break; //UA - Armor
			}
		}
		else if ($magic_item == "magic") ///////////////////////////////////////////////////
		{
			switch($mi)
			{
				case 0: $item = getADDPickPowers(); break;
				case $mi >= 1 and $mi <= 2: $item = "Alchemy Jug"; break; //DM - Misc
				case $mi >= 3 and $mi <= 4: $item = "Amulet of Inescapable Location"; break; //DM - Misc
				case $mi >= 5 and $mi <= 5: $item = "Amulet of Life Protection"; break; //DM - Misc
				case $mi >= 6 and $mi <= 9: $item = "Amulet of Proof Against Detection and Location"; break; //DM - Misc
				case $mi >= 10 and $mi <= 11: $item = "Amulet of the Planes"; break; //DM - Misc
				case $mi >= 12 and $mi <= 13: $item = "Apparatus of Kwalish"; break; //DM - Misc
				case $mi >= 14 and $mi <= 16: $item = "Arrow of Direction"; break; //DM - Misc
				case $mi >= 17 and $mi <= 19: $item = "Bag of Beans"; break; //DM - Misc
				case $mi >= 20 and $mi <= 20: $item = "Bag of Devouring"; break; //DM - Misc
				case $mi >= 21 and $mi <= 25: $item = "Bag of Holding"; //DM - Misc
						$dice = mt_rand(1,100);
						if ($dice >= 91){$item = $item . " that weighs 60lbs and holds 250lbs in 250 cubic feet";}
						else if ($dice >= 71){$item = $item . " that weighs 35lbs and holds 500lbs in 150 cubic feet";}
						else if ($dice >= 31){$item = $item . " that weighs 15lbs and holds 1,000lbs in 70 cubic feet";}
						else {$item = $item . " that weighs 15lbs and holds 1,500lbs in 30 cubic feet";}
					break;
				case $mi >= 26 and $mi <= 26: $item = "Bag of Transmuting"; break; //DM - Misc
				case $mi >= 27 and $mi <= 28: $item = "Bag of Tricks"; break; //DM - Misc
				case $mi >= 29 and $mi <= 30: $item = "Beaker of Plentiful Potions"; break; //DM - Misc
				case $mi >= 31 and $mi <= 31: $item = "Book of Exalted Deeds"; break; //DM - Misc
				case $mi >= 32 and $mi <= 32: $item = "Book of Infinite Spells"; //DM - Misc
					$pages = 22 + mt_rand(1,8);
						$item = $item . " with " . $pages . " pages [";
						while ($pages > 0):
							$dice = mt_rand(1,100);
							$page = $page + 1;
							if ($dice >= 96){ $item = $item . "pg" . $page . " " . gameSpellChooser($game,0,Illusionist) . ", "; }
							else if ($dice >= 61){ $item = $item . "pg" . $page . " " . gameSpellChooser($game,0,Magic-User) . ", "; }
							else if ($dice >= 51){ $item = $item . "pg" . $page . " " . gameSpellChooser($game,0,Cleric) . ", "; }
							else if ($dice >= 31){ $item = $item . "pg" . $page . " " . gameSpellChooser($game,0,Druid) . ", "; }
							else { $item = $item . "pg" . $page . " is blank, "; }
							$pages = $pages - 1;
						endwhile;
						$item = substr($item, 0, -2);
						$item = $item . "]";
					break;
				case $mi >= 33 and $mi <= 33: $item = "Book of Vile Darkness"; break; //DM - Misc
				case $mi >= 34 and $mi <= 34: $item = "Boots of Dancing"; break; //DM - Misc
				case $mi >= 35 and $mi <= 40: $item = "Boots of Elvenkind"; break; //DM - Misc
				case $mi >= 41 and $mi <= 45: $item = "Boots of Levitation"; break; //DM - Misc
				case $mi >= 46 and $mi <= 49: $item = "Boots of Speed"; break; //DM - Misc
				case $mi >= 50 and $mi <= 53: $item = "Boots of Striding andSpringing"; break; //DM - Misc
				case $mi >= 54 and $mi <= 56: $item = "Bowl Commanding Water Elementals"; break; //DM - Misc
				case $mi >= 57 and $mi <= 57: $item = "Bowl of Watery Death"; break; //DM - Misc
				case $mi >= 58 and $mi <= 77: $item = "Bracers of Defense"; //DM - Misc
						$dice = mt_rand(1,100);
						if ($dice >= 86){$item = $item . " with AC 2";}
						else if ($dice >= 71){$item = $item . " with AC 3";}
						else if ($dice >= 51){$item = $item . " with AC 4";}
						else if ($dice >= 36){$item = $item . " with AC 5";}
						else if ($dice >= 16){$item = $item . " with AC 6";}
						else if ($dice >= 6){$item = $item . " with AC 7";}
						else {$item = $item . " with AC 8";}
					break;
				case $mi >= 78 and $mi <= 79: $item = "Bracers of Defenselessness"; break; //DM - Misc
				case $mi >= 80 and $mi <= 82: $item = "Brazier Commanding Fire Elementals"; break; //DM - Misc
				case $mi >= 83 and $mi <= 83: $item = "Brazier of Sleep Smoke"; break; //DM - Misc
				case $mi >= 84 and $mi <= 90: $item = "Brooch of Shielding"; break; //DM - Misc
				case $mi >= 91 and $mi <= 91: $item = "Broom of Animated Attack"; break; //DM - Misc
				case $mi >= 92 and $mi <= 96: $item = "Broom of Flying"; break; //DM - Misc
				case $mi >= 97 and $mi <= 98: $item = "Bucknard`s Everfull Purse"; break; //DM - Misc
				case $mi >= 99 and $mi <= 104: $item = "Candle of Invocation"; break; //DM - Misc
				case $mi >= 105 and $mi <= 106: $item = "Carpet of Flying"; //DM - Misc
						$dice = mt_rand(1,100);
						if ($dice >= 81){$item = $item . " that is 6`x9` and can hold 4 people at a speed of 24`";}
						else if ($dice >= 56){$item = $item . " that is 5`x7` and can hold 3 people at a speed of 30`";}
						else if ($dice >= 21){$item = $item . " that is 4`x6` and can hold 2 people at a speed of 36`";}
						else {$item = $item . " that is 3`x5` and can hold 1 person at a speed of 42`";}
					break;
				case $mi >= 107 and $mi <= 108: $item = "Censer Controlling Air Elementals"; break; //DM - Misc
				case $mi >= 109 and $mi <= 109: $item = "Censer of Summoning Hostile Air Elementals"; break; //DM - Misc
				case $mi >= 110 and $mi <= 110: $item = "Chime of Hunger"; break; //DM - Misc
				case $mi >= 111 and $mi <= 112: $item = "Chime of Opening"; break; //DM - Misc
				case $mi >= 113 and $mi <= 116: $item = "Cloak of Displacement"; break; //DM - Misc
				case $mi >= 117 and $mi <= 125: $item = "Cloak of Elvenkind"; break; //DM - Misc
				case $mi >= 126 and $mi <= 128: $item = "Cloak of Manta Ray"; break; //DM - Misc
				case $mi >= 129 and $mi <= 130: $item = "Cloak of Poisonousness"; break; //DM - Misc
				case $mi >= 131 and $mi <= 153: $item = "Cloak of Protection"; //DM - Misc
						$dice = mt_rand(1,20);
						if ($dice >= 96){$item = $item . " +5";}
						else if ($dice >= 86){$item = $item . " +4";}
						else if ($dice >= 66){$item = $item . " +3";}
						else if ($dice >= 36){$item = $item . " +2";}
						else {$item = $item . " +2";}
					break;
				case $mi >= 154 and $mi <= 158: $item = "Crystal Ball"; //DM - Misc
						$dice = mt_rand(1,100);
						if ($dice >= 91){$item = $item . " with Telepathy";}
						else if ($dice >= 76){$item = $item . " with ESP";}
						else if ($dice >= 51){$item = $item . " with Clairaudience";}
					break;
				case $mi >= 159 and $mi <= 159: $item = "Crystal Hypnosis Ball"; break; //DM - Misc
				case $mi >= 160 and $mi <= 161: $item = "Cube of Force"; break; //DM - Misc
				case $mi >= 162 and $mi <= 163: $item = "Cube of Frost Resistance"; break; //DM - Misc
				case $mi >= 164 and $mi <= 165: $item = "Cubic Gate"; break; //DM - Misc
				case $mi >= 166 and $mi <= 167: $item = "Daern`s Instant Fortress"; break; //DM - Misc
				case $mi >= 168 and $mi <= 170: $item = "Decanter of Endless Water"; break; //DM - Misc
				case $mi >= 171 and $mi <= 174: $item = "Deck of Many Things"; break; //DM - Misc
				case $mi >= 175 and $mi <= 175: $item = "Drums of Deafening"; break; //DM - Misc
				case $mi >= 176 and $mi <= 177: $item = "Drums of Panic"; break; //DM - Misc
				case $mi >= 178 and $mi <= 183: $item = "Dust of Appearance"; break; //DM - Misc
				case $mi >= 184 and $mi <= 189: $item = "Dust of Disappearance"; break; //DM - Misc
				case $mi >= 190 and $mi <= 190: $item = "Dust of Sneezing and Choking"; break; //DM - Misc
				case $mi >= 191 and $mi <= 191: $item = "Efreeti Bottle"; break; //DM - Misc
				case $mi >= 192 and $mi <= 192: $item = "Eversmoking Bottle"; break; //DM - Misc
				case $mi >= 193 and $mi <= 193: $item = "Eyes of Charming"; break; //DM - Misc
				case $mi >= 194 and $mi <= 195: $item = "Eyes of Minute Seeing"; break; //DM - Misc
				case $mi >= 196 and $mi <= 196: $item = "Eyes of Petrification"; break; //DM - Misc
				case $mi >= 197 and $mi <= 198: $item = "Eyes of the Eagle"; break; //DM - Misc
				case $mi >= 199 and $mi <= 213: $item = "Figurine of Wondrous Power"; //DM - Misc
						$dice = mt_rand(1,100);
						if ($dice >= 86){$item = $item . " in the form of a Serpentine Owl";}
						else if ($dice >= 66){$item = $item . " in the form of an Onyx Dog";}
						else if ($dice >= 56){$item = $item . " in the form of an Obsidian Steed";}
						else if ($dice >= 41)
						{
							$dicer = mt_rand(1,100);
							if ($dicer >= 94){$item = $item . " in the form of a Marble Mastodan";}
							else if ($dicer >= 91){$item = $item . " in the form of a Marble Mammoth";}
							else if ($dicer >= 51){$item = $item . " in the form of a Marble African Elephant";}
							else {$item = $item . " in the form of a Marble Asiatic Elephant";}
						}
						else if ($dice >= 31){$item = $item . " in the form of a trio of Ivory Goats";}
						else if ($dice >= 16){$item = $item . " in the form of a pair of Golden Lions";}
						else {$item = $item . " in the form of an Ebony Fly";}
					break;
				case $mi >= 214 and $mi <= 214: $item = "Flask of Curses"; break; //DM - Misc
				case $mi >= 215 and $mi <= 215: $item = "Folding Boat"; break; //DM - Misc
				case $mi >= 216 and $mi <= 217: $item = "Gauntlets of Dexterity"; break; //DM - Misc
				case $mi >= 218 and $mi <= 219: $item = "Gauntlets of Fumbling"; break; //DM - Misc
				case $mi >= 220 and $mi <= 221: $item = "Gauntlets of Ogre Power"; break; //DM - Misc
				case $mi >= 222 and $mi <= 224: $item = "Gauntlets of Swimming and Climbing"; break; //DM - Misc
				case $mi >= 225 and $mi <= 225: $item = "Gem of Brightness"; break; //DM - Misc
				case $mi >= 226 and $mi <= 226: $item = "Gem of Seeing"; break; //DM - Misc
				case $mi >= 227 and $mi <= 227: $item = "Girdle of Femininity/Masculinity"; break; //DM - Misc
				case $mi >= 228 and $mi <= 228: $item = "Girdle of Giant Strength"; //DM - Misc
						$dice = mt_rand(1,100);
						if ($dice >= 96){$item = "Girdle of Hill Giant Strength";}
						else if ($dice >= 86){$item = "Girdle of Stone Giant Strength";}
						else if ($dice >= 71){$item = "Girdle of Frost Giant Strength";}
						else if ($dice >= 51){$item = "Girdle of Fire Giant Strength";}
						else if ($dice >= 31){$item = "Girdle of Cloud Giant Strength";}
						else {$item = "Girdle of Storm Giant Strength";}
					break;
				case $mi >= 229 and $mi <= 229: $item = "Helm of Brilliance"; break; //DM - Misc
				case $mi >= 230 and $mi <= 234: $item = "Helm of Comprehending Languages & Reading Magic"; break; //DM - Misc
				case $mi >= 235 and $mi <= 236: $item = "Helm of Opposite Alignment"; break; //DM - Misc
				case $mi >= 237 and $mi <= 238: $item = "Helm of Telepathy"; break; //DM - Misc
				case $mi >= 239 and $mi <= 239: $item = "Helm of Teleportation"; break; //DM - Misc
				case $mi >= 240 and $mi <= 244: $item = "Helm of Underwater Action"; break; //DM - Misc
				case $mi >= 245 and $mi <= 245: $item = "Horn of Blasting"; break; //DM - Misc
				case $mi >= 246 and $mi <= 247: $item = "Horn of Bubbles"; break; //DM - Misc
				case $mi >= 248 and $mi <= 248: $item = "Horn of Collapsing"; break; //DM - Misc
				case $mi >= 249 and $mi <= 252: $item = "Horn of the Tritons"; break; //DM - Misc
				case $mi >= 253 and $mi <= 259: $item = "Horn of Valhalla"; //DM - Misc
						$dice = mt_rand(1,20);
						if ($dice >= 19){$item = $item . " made of silver";}
						else if ($dice >= 16){$item = $item . " made of brass";}
						else if ($dice >= 9){$item = $item . " made of bronze";}
						else {$item = $item . " made of iron";}
					break;
				case $mi >= 260 and $mi <= 261: $item = "Horseshoes of a Zephyr"; break; //DM - Misc
				case $mi >= 262 and $mi <= 264: $item = "Horseshoes of Speed"; break; //DM - Misc
				case $mi >= 265 and $mi <= 269: $item = "Incense of Meditation"; break; //DM - Misc
				case $mi >= 270 and $mi <= 270: $item = "Incense of Obsession"; break; //DM - Misc
				case $mi >= 271 and $mi <= 276: $item = "Instrument of the Bards"; break; //DM - Misc
				case $mi >= 277 and $mi <= 277: $item = "Ioun Stone"; //DM - Misc
						$dice = mt_rand(1,20);
						if ($dice >= 15){$item = $item . " that is dull gray in color";}
						else if ($dice == 14){$item = $item . " that is dusty rose in color";}
						else if ($dice == 13){$item = $item . " that is vibrant purple in color";}
						else if ($dice == 12){$item = $item . " that is lavender & green in color";}
						else if ($dice == 11){$item = $item . " that is pale lavender in color";}
						else if ($dice == 10){$item = $item . " that is pearly white in color";}
						else if ($dice == 9){$item = $item . " that is iridescent in appearance";}
						else if ($dice == 8){$item = $item . " that is clear in appearance";}
						else if ($dice == 7){$item = $item . " that is pale green in color";}
						else if ($dice == 6){$item = $item . " that is pink & green in color";}
						else if ($dice == 5){$item = $item . " that is pink in color";}
						else if ($dice == 4){$item = $item . " that is deep red in color";}
						else if ($dice == 3){$item = $item . " that is incandescent blue in color";}
						else if ($dice == 2){$item = $item . " that is scarlet & blue in color";}
						else {$item = $item . " that is pale blue in color";}
					break;
				case $mi >= 278 and $mi <= 279: $item = "Iron Flask"; //DM - Misc
						$dice = mt_rand(1,100);
						if ($dice >= 100){$item = $item . " that contains a xorn";}
						else if ($dice >= 98){$item = $item . " that contains a wind walker";}
						else if ($dice >= 94){$item = $item . " that contains a water elemental";}
						else if ($dice >= 90){$item = $item . " that contains a salamander";}
						else if ($dice >= 87){$item = $item . " that contains a rakshasa";}
						else if ($dice >= 86){$item = $item . " that contains a nycodeamon";}
						else if ($dice >= 84){$item = $item . " that contains a night hag";}
						else if ($dice >= 82){$item = $item . " that contains a mezzodaemon";}
						else if ($dice >= 77){$item = $item . " that contains a invisible stalker";}
						else if ($dice >= 73){$item = $item . " that contains a fire elemental";}
						else if ($dice >= 70){$item = $item . " that contains a efreeti";}
						else if ($dice >= 66){$item = $item . " that contains a earth elemental";}
						else if ($dice >= 61){$item = $item . " that contains a djinni";}
						else if ($dice >= 60){$item = $item . " that contains a greater devil";}
						else if ($dice >= 58){$item = $item . " that contains a lesser devil";}
						else if ($dice >= 57){$item = $item . " that contains a type VI demon";}
						else if ($dice >= 56){$item = $item . " that contains a type V demon";}
						else if ($dice >= 55){$item = $item . " that contains a type IV demon";}
						else if ($dice >= 54){$item = $item . " that contains a type III demon";}
						else if ($dice >= 53){$item = $item . " that contains a type II demon";}
						else if ($dice >= 52){$item = $item . " that contains a type I demon";}
						else if ($dice >= 48){$item = $item . " that contains an air elemental";}
						else {$item = $item . " that is empty";}
					break;
				case $mi >= 280 and $mi <= 284: $item = "Javelin of Lightning"; break; //DM - Misc
				case $mi >= 285 and $mi <= 289: $item = "Javelin of Piercing"; break; //DM - Misc
				case $mi >= 290 and $mi <= 290: $item = "Jewel of Attacks"; break; //DM - Misc
				case $mi >= 291 and $mi <= 291: $item = "Jewel of Flawlessness"; break; //DM - Misc
				case $mi >= 292 and $mi <= 299: $item = "Keoghtom`s Ointment"; break; //DM - Misc
				case $mi >= 300 and $mi <= 300: $item = "Libram of Gainful Conjuration"; break; //DM - Misc
				case $mi >= 301 and $mi <= 301: $item = "Libram of Ineffable Damnation"; break; //DM - Misc
				case $mi >= 302 and $mi <= 302: $item = "Libram of Silver Magic"; break; //DM - Misc
				case $mi >= 303 and $mi <= 303: $item = "Lyre of Building"; break; //DM - Misc
				case $mi >= 304 and $mi <= 304: $item = "Manual of Bodily Health"; break; //DM - Misc
				case $mi >= 305 and $mi <= 305: $item = "Manual of Gainful Exercise"; break; //DM - Misc
				case $mi >= 306 and $mi <= 306: $item = "Manual of Golems"; //DM - Misc
						$dice = mt_rand(1,20);
						if ($dice >= 19){$item = "Manual of Stone Golems";}
						else if ($dice >= 18){$item = "Manual of Iron Golems";}
						else if ($dice >= 6){$item = "Manual of Flesh Golems";}
						else {$item = "Manual of Clay Golems";}
					break;
				case $mi >= 307 and $mi <= 307: $item = "Manual of Puissant Skill at Arms"; break; //DM - Misc
				case $mi >= 308 and $mi <= 308: $item = "Manual of Quickness of Action"; break; //DM - Misc
				case $mi >= 309 and $mi <= 309: $item = "Manual of Stealthy Pilfering"; break; //DM - Misc
				case $mi >= 310 and $mi <= 310: $item = "Mattock of the Titans"; break; //DM - Misc
				case $mi >= 311 and $mi <= 311: $item = "Maul of the Titans"; break; //DM - Misc
				case $mi >= 312 and $mi <= 314: $item = "Medallion of ESP"; //DM - Misc
						$dice = mt_rand(1,20);
						if ($dice >= 20){$item = $item . " with a 90` range";}
						else if ($dice >= 19){$item = $item . " with a 60` range";}
						else if ($dice >= 16){$item = $item . " with a 30` range with empathy";}
						else {$item = $item . " with a 30` range";}
					break;
				case $mi >= 315 and $mi <= 316: $item = "Medallion of Thought Projection"; break; //DM - Misc
				case $mi >= 317 and $mi <= 318: $item = "Mirror of Life Trapping"; break; //DM - Misc
				case $mi >= 319 and $mi <= 319: $item = "Mirror of Mental Prowess"; break; //DM - Misc
				case $mi >= 320 and $mi <= 320: $item = "Mirror of Opposition"; break; //DM - Misc
				case $mi >= 321 and $mi <= 323: $item = "Necklace of Adaptation"; break; //DM - Misc
				case $mi >= 324 and $mi <= 327: $item = "Necklace of Missiles"; //DM - Misc
						$dice = mt_rand(1,20);
						if ($dice >= 20){$item = $item . " with one 11 dice/two 9 dice/two 7 dice/two 5 dice/two 3 dice missiles";}
						else if ($dice >= 19){$item = $item . " with one 10 dice/two 8 dice/two 6 dice/four 4 dice missiles";}
						else if ($dice >= 17){$item = $item . " with one 9 dice/two 7 dice/two 5 dice/two 3 dice missiles";}
						else if ($dice >= 13){$item = $item . " with one 8 dice/two 6 dice/two 4 dice/four 2 dice missiles";}
						else if ($dice >= 9){$item = $item . " with one 7 dice/two 5 dice/four 3 dice missiles";}
						else if ($dice >= 5){$item = $item . " with one 6 dice/two 4 dice/two 2 dice missiles";}
						else {$item = $item . " with one 5 dice/two 3 dice missiles";}
					break;
				case $mi >= 328 and $mi <= 333: $item = "Necklace of Prayer Beads"; //DM - Misc
					$stone = mt_rand(3,6);
					$item = $item . " that has " . mt_rand(25,30) . " " . gemChooser() . " and " . $stone . " " . gemChooser() . " where each one is a ";
					while ($stone > 0) :
						$dice = mt_rand(1,20);
						if ($dice >= 19){ $beads = $beads . "Bead of Wind Walking, "; }
						else if ($dice >= 18){ $beads = $beads . "Bead of Summons, "; }
						else if ($dice >= 16){ $beads = $beads . "Bead of Karma, "; }
						else if ($dice >= 11){ $beads = $beads . "Bead of Curing, "; }
						else if ($dice >= 6){ $beads = $beads . "Bead of Blessing, "; }
						else { $beads = $beads . "Bead of Atonement, "; }
						$stone = $stone - 1;
					endwhile;
					$item = $item . substr($beads, 0, -2);
					break;
				case $mi >= 334 and $mi <= 335: $item = "Necklace of Strangulation"; break; //DM - Misc
				case $mi >= 336 and $mi <= 338: $item = "Net of Entrapment"; break; //DM - Misc
				case $mi >= 339 and $mi <= 342: $item = "Net of Snaring"; break; //DM - Misc
				case $mi >= 343 and $mi <= 344: $item = "Nolzur`s Marvelous Pigments"; break; //DM - Misc
				case $mi >= 345 and $mi <= 346: $item = "Pearl of Power"; //DM - Misc
						$dice = mt_rand(1,100);
						if ($dice >= 100)
						{
							$dicer = mt_rand(1,6);
							if ($dicer == 1){$item = $item . " that recalls 2 spells of the 1st level";}
							else if ($dicer == 2){$item = $item . " that recalls 2 spells of the 2nd level";}
							else if ($dicer == 3){$item = $item . " that recalls 2 spells of the 3rd level";}
							else if ($dicer == 4){$item = $item . " that recalls 2 spells of the 4th level";}
							else if ($dicer == 5){$item = $item . " that recalls 2 spells of the 5th level";}
							else {$item = $item . " that recalls 2 spells of the 6th level";}
						}
						else if ($dice >= 99){$item = $item . " of the 9th level";}
						else if ($dice >= 97){$item = $item . " of the 8th level";}
						else if ($dice >= 93){$item = $item . " of the 7th level";}
						else if ($dice >= 86){$item = $item . " of the 6th level";}
						else if ($dice >= 76){$item = $item . " of the 5th level";}
						else if ($dice >= 61){$item = $item . " of the 4th level";}
						else if ($dice >= 46){$item = $item . " of the 3rd level";}
						else if ($dice >= 26){$item = $item . " of the 2nd level";}
						else {$item = $item . " of the 1st level";}
					break;
				case $mi >= 347 and $mi <= 348: $item = "Pearl of Wisdom"; break; //DM - Misc
				case $mi >= 349 and $mi <= 350: $item = "Periapt of Foul Rotting"; break; //DM - Misc
				case $mi >= 351 and $mi <= 353: $item = "Periapt of Health"; break; //DM - Misc
				case $mi >= 354 and $mi <= 360: $item = "Periapt of Proof Against Poison"; //DM - Misc
						$dice = mt_rand(1,20);
						if ($dice >= 20){$item = $item . " with +4 for saves";}
						else if ($dice >= 15){$item = $item . " with +2 for saves";}
						else if ($dice >= 9){$item = $item . " with +3 for saves";}
						else {$item = $item . " with +1 for saves";}
					break;
				case $mi >= 361 and $mi <= 364: $item = "Periapt of Wound Closure"; break; //DM - Misc
				case $mi >= 365 and $mi <= 370: $item = "Phylactery of Faithfulness"; break; //DM - Misc
				case $mi >= 371 and $mi <= 374: $item = "Phylactery of Long Years"; break; //DM - Misc
				case $mi >= 375 and $mi <= 376: $item = "Phylactery of Monstrous Attention"; break; //DM - Misc
				case $mi >= 377 and $mi <= 384: $item = "Pipes of the Sewers"; break; //DM - Misc
				case $mi >= 385 and $mi <= 385: $item = "Portable Hole"; break; //DM - Misc
				case $mi >= 386 and $mi <= 400: $item = "Quaal`s Feather Token"; //DM - Misc
						$dice = mt_rand(1,20);
						if ($dice >= 19){$item = $item . " of the Whip";}
						else if ($dice >= 14){$item = $item . " of the Tree";}
						else if ($dice >= 11){$item = $item . " of the Swan Boat";}
						else if ($dice >= 8){$item = $item . " of the Fan";}
						else if ($dice >= 5){$item = $item . " of the Bird";}
						else {$item = $item . " of the Anchor";}
					break;
				case $mi >= 401 and $mi <= 407: $item = "Robe of Blending"; break; //DM - Misc
				case $mi >= 408 and $mi <= 408: $item = "Robe of Eyes"; break; //DM - Misc
				case $mi >= 409 and $mi <= 409: $item = "Robe of Powerlessness"; break; //DM - Misc
				case $mi >= 410 and $mi <= 410: $item = "Robe of Scintillating Colors"; break; //DM - Misc
				case $mi >= 411 and $mi <= 411: $item = "Robe of the Archmagi"; //DM - Misc
						$dice = mt_rand(1,100);
						if ($dice >= 55){$item = $item . " that is white in color-good";}
						else if ($dice >= 25){$item = $item . " that is gray in color-neutral";}
						else {$item = $item . " that is black in color-evil";}
					break;
				case $mi >= 412 and $mi <= 419: $item = "Robe of Useful Items"; break; //DM - Misc
				case $mi >= 420 and $mi <= 425: $item = "Rope of Climbing"; break; //DM - Misc
				case $mi >= 426 and $mi <= 427: $item = "Rope of Constriction"; break; //DM - Misc
				case $mi >= 428 and $mi <= 431: $item = "Rope of Entanglement"; break; //DM - Misc
				case $mi >= 432 and $mi <= 432: $item = "Rug of Smothering"; break; //DM - Misc
				case $mi >= 433 and $mi <= 433: $item = "Rug of Welcome"; break; //DM - Misc
				case $mi >= 434 and $mi <= 434: $item = "Saw of Mighty Cutting"; break; //DM - Misc
				case $mi >= 435 and $mi <= 435: $item = "Scarab of Death"; break; //DM - Misc
				case $mi >= 436 and $mi <= 438: $item = "Scarab of Enraging Enemies"; break; //DM - Misc
				case $mi >= 439 and $mi <= 440: $item = "Scarab of Insanity"; break; //DM - Misc
				case $mi >= 441 and $mi <= 446: $item = "Scarab of Protection"; break; //DM - Misc
				case $mi >= 447 and $mi <= 447: $item = "Spade of Colossal Excavation"; break; //DM - Misc
				case $mi >= 448 and $mi <= 448: $item = "Sphere of Annihilation"; break; //DM - Misc
				case $mi >= 449 and $mi <= 450: $item = "Stone of Controlling Earth Elementals"; break; //DM - Misc
				case $mi >= 451 and $mi <= 452: $item = "Stone of Good Luck (Luckstone)"; break; //DM - Misc
				case $mi >= 453 and $mi <= 454: $item = "Stone of Weight (Loadstone)"; break; //DM - Misc
				case $mi >= 455 and $mi <= 457: $item = "Talisman of Pure Good"; break; //DM - Misc
				case $mi >= 458 and $mi <= 458: $item = "Talisman of the Sphere"; break; //DM - Misc
				case $mi >= 459 and $mi <= 460: $item = "Talisman of Ultimate Evil"; break; //DM - Misc
				case $mi >= 461 and $mi <= 466: $item = "Talisman of Zagy"; break; //DM - Misc
				case $mi >= 467 and $mi <= 467: $item = "Tome of Clear Thought"; break; //DM - Misc
				case $mi >= 468 and $mi <= 468: $item = "Tome of Leadership and Influence"; break; //DM - Misc
				case $mi >= 469 and $mi <= 469: $item = "Tome of Understanding"; break; //DM - Misc
				case $mi >= 470 and $mi <= 476: $item = "Trident of Fish"; break; //DM - Misc
				case $mi >= 477 and $mi <= 478: $item = "Trident of Submission"; break; //DM - Misc
				case $mi >= 479 and $mi <= 483: $item = "Trident of Warning"; break; //DM - Misc
				case $mi >= 484 and $mi <= 485: $item = "Trident of Yearning"; break; //DM - Misc
				case $mi >= 486 and $mi <= 487: $item = "Vacuous Grimoire"; break; //DM - Misc
				case $mi >= 488 and $mi <= 490: $item = "Well of Many Worlds"; break; //DM - Misc
				case $mi >= 491 and $mi <= 500: $item = "Wings of Flying"; break; //DM - Misc
				case $mi >= 501 and $mi <= 504: $item = "Amulet Versus Undead"; //UA - Misc
						$dice = mt_rand(1,100);
						if ($dice >= 91 ){$item = $item . " as a 9th level cleric";}
						else if ($dice >= 76){$item = $item . " as a 8th level cleric";}
						else if ($dice >= 56){$item = $item . " as a 7th level cleric";}
						else if ($dice >= 31){$item = $item . " as a 6th level cleric";}
						else {$item = $item . " as a 5th level cleric";}
					break;
				case $mi >= 505 and $mi <= 506: $item = "Beads of Force"; break; //UA - Misc
				case $mi >= 507 and $mi <= 513: $item = "Boccob`s Blessed Book"; break; //UA - Misc
				case $mi >= 514 and $mi <= 515: $item = "Boots of the North"; break; //UA - Misc
				case $mi >= 516 and $mi <= 518: $item = "Boots of Varied Tracks"; //UA - Misc
					$foot_array = array();
					while ( $foot < 5 ) :
						switch (mt_rand(1,16))
						{
							case 1: if (in_array("basilisk", $foot_array)){ } else { array_push($foot_array, "basilisk"); $foot = $foot + 1; } break;
							case 2: if (in_array("bear", $foot_array)){ } else { array_push($foot_array, "bear"); $foot = $foot + 1; } break;
							case 3: if (in_array("boar", $foot_array)){ } else { array_push($foot_array, "boar"); $foot = $foot + 1; } break;
							case 4: if (in_array("bull", $foot_array)){ } else { array_push($foot_array, "bull"); $foot = $foot + 1; } break;
							case 5: if (in_array("camel", $foot_array)){ } else { array_push($foot_array, "camel"); $foot = $foot + 1; } break;
							case 6: if (in_array("dog", $foot_array)){ } else { array_push($foot_array, "dog"); $foot = $foot + 1; } break;
							case 7: if (in_array("hill giant", $foot_array)){ } else { array_push($foot_array, "hill giant"); $foot = $foot + 1; } break;
							case 8: if (in_array("goat", $foot_array)){ } else { array_push($foot_array, "goat"); $foot = $foot + 1; } break;
							case 9: if (in_array("horse", $foot_array)){ } else { array_push($foot_array, "horse"); $foot = $foot + 1; } break;
							case 10: if (in_array("lion", $foot_array)){ } else { array_push($foot_array, "lion"); $foot = $foot + 1; } break;
							case 11: if (in_array("mule", $foot_array)){ } else { array_push($foot_array, "mule"); $foot = $foot + 1; } break;
							case 12: if (in_array("rabbit", $foot_array)){ } else { array_push($foot_array, "rabbit"); $foot = $foot + 1; } break;
							case 13: if (in_array("stag", $foot_array)){ } else { array_push($foot_array, "stag"); $foot = $foot + 1; } break;
							case 14: if (in_array("tiger", $foot_array)){ } else { array_push($foot_array, "tiger"); $foot = $foot + 1; } break;
							case 15: if (in_array("wolf", $foot_array)){ } else { array_push($foot_array, "wolf"); $foot = $foot + 1; } break;
							case 16: if (in_array("wyvern", $foot_array)){ } else { array_push($foot_array, "wyvern"); $foot = $foot + 1; } break;
						}
					endwhile;
					$item = $item . " which can also leave tracks as a " . $foot_array[0] . ", " . $foot_array[1] . ", " . $foot_array[2] . ", and " . $foot_array[3];
					break;
				case $mi >= 519 and $mi <= 522: $item = "Bracers of Archery"; break; //UA - Misc
				case $mi >= 523 and $mi <= 524: $item = "Bracers of Brachiation"; break; //UA - Misc
				case $mi >= 525 and $mi <= 526: $item = "Chime of Interruption"; break; //UA - Misc
				case $mi >= 527 and $mi <= 528: $item = "Cloak of Arachnida"; break; //UA - Misc
				case $mi >= 529 and $mi <= 532: $item = "Cloak of the Bat"; break; //UA - Misc
				case $mi >= 533 and $mi <= 534: $item = "Cyclocone"; break; //UA - Misc
				case $mi >= 535 and $mi <= 538: $item = "Dart of the Hornets` Nest"; break; //UA - Misc
				case $mi >= 539 and $mi <= 540: $item = "Deck of Illusions"; break; //UA - Misc
				case $mi >= 541 and $mi <= 542: $item = "Dicerion of Light & Darkness"; break; //UA - Misc
				case $mi >= 543 and $mi <= 545: $item = "Dust of Dryness"; break; //UA - Misc
				case $mi >= 546 and $mi <= 548: $item = "Dust of Illusion"; break; //UA - Misc
				case $mi >= 549 and $mi <= 552: $item = "Dust of Tracelessness"; break; //UA - Misc
				case $mi >= 553 and $mi <= 554: $item = "Egg of Desire"; //UA - Misc
						$dice = mt_rand(1,5);
						if ($dice == 1 ){$item = "Black " . $item;}
						else if ($dice == 2){$item = "Bone " . $item;}
						else if ($dice == 3){$item = "Crystal " . $item;}
						else if ($dice == 4){$item = "Golden " . $item;}
						else {$item = "Scarlet " . $item;}
					break;
				case $mi >= 555 and $mi <= 558: $item = "Egg of Reason"; break; //UA - Misc
				case $mi >= 559 and $mi <= 560: $item = "Egg of Shattering"; break; //UA - Misc
				case $mi >= 561 and $mi <= 563: $item = "Gem of Insight"; break; //UA - Misc
				case $mi >= 564 and $mi <= 566: $item = "Girdle of Dwarvenkind"; break; //UA - Misc
				case $mi >= 567 and $mi <= 574: $item = "Girdle of Many Pouches"; break; //UA - Misc
				case $mi >= 575 and $mi <= 577: $item = "Gloves of Missile Snaring"; break; //UA - Misc
				case $mi >= 578 and $mi <= 581: $item = "Gloves of Thievery"; break; //UA - Misc
				case $mi >= 582 and $mi <= 586: $item = "Hat of Difference"; break; //UA - Misc
				case $mi >= 587 and $mi <= 593: $item = "Hat of Disguise"; break; //UA - Misc
				case $mi >= 594 and $mi <= 598: $item = "Hat of Stupidity"; break; //UA - Misc
				case $mi >= 599 and $mi <= 603: $item = "Heward`s Handy Haversack"; break; //UA - Misc
				case $mi >= 604 and $mi <= 608: $item = "Horn of Fog"; break; //UA - Misc
				case $mi >= 609 and $mi <= 610: $item = "Horn of Goodness/Evil"; break; //UA - Misc
				case $mi >= 611 and $mi <= 612: $item = "Iron Bands of Bilarro"; break; //UA - Misc
				case $mi >= 613 and $mi <= 616: $item = "Lens of Detection"; break; //UA - Misc
				case $mi >= 617 and $mi <= 619: $item = "Lens of Ultravision"; break; //UA - Misc
				case $mi >= 620 and $mi <= 621: $item = "Mantle of Celestian"; break; //UA - Misc
				case $mi >= 622 and $mi <= 625: $item = "Murlynd`s Spoon"; break; //UA - Misc
				case $mi >= 626 and $mi <= 627: $item = "Pearl of the Sirines"; break; //UA - Misc
				case $mi >= 628 and $mi <= 629: $item = "Philosopher`s Stone"; break; //UA - Misc
				case $mi >= 630 and $mi <= 635: $item = "Pouch of Accessibility"; break; //UA - Misc
				case $mi >= 636 and $mi <= 636: $item = "Prison of Zagyg"; break; //UA - Misc
				case $mi >= 637 and $mi <= 638: $item = "Quiver of Ehlonna"; break; //UA - Misc
				case $mi >= 639 and $mi <= 640: $item = "Robe of Stars"; break; //UA - Misc
				case $mi >= 641 and $mi <= 646: $item = "Robe of Vermin"; break; //UA - Misc
				case $mi >= 647 and $mi <= 648: $item = "Scarab Versus Golems"; //UA - Misc
						$dice = mt_rand(1,100);
						if ($dice >= 96 ){$item = "Scarab Versus Any Golems";}
						else if ($dice >= 86){$item = "Scarab Versus Flesh/Clay/Wood Golems";}
						else if ($dice >= 76){$item = "Scarab Versus Iron Golems";}
						else if ($dice >= 56){$item = "Scarab Versus Stone Golems";}
						else if ($dice >= 31){$item = "Scarab Versus Clay Golems";}
						else {$item = "Scarab Versus Flesh Golems";}
					break;
				case $mi >= 649 and $mi <= 652: $item = "Shadow Lanthorn"; break; //UA - Misc
				case $mi >= 653 and $mi <= 655: $item = "Sheet of Smallness"; break; //UA - Misc
				case $mi >= 656 and $mi <= 657: $item = "Shoes of Fharlanghn"; break; //UA - Misc
				case $mi >= 658 and $mi <= 662: $item = "Slippers of Kicking"; break; //UA - Misc
				case $mi >= 663 and $mi <= 668: $item = "Slippers of Spider Climbing"; break; //UA - Misc
				case $mi >= 669 and $mi <= 670: $item = "Sovereign Glue"; break; //UA - Misc
				case $mi >= 671 and $mi <= 675: $item = "Spoon of Stirring"; break; //UA - Misc
				case $mi >= 676 and $mi <= 679: $item = "Stone Horse"; //UA - Misc
						$dice = mt_rand(1,1);
						if ($dice == 1 ){$item = "Courser Stone Horse";}
						else {$item = "Destrier Stone Horse";}
					break;
				case $mi >= 680 and $mi <= 682: $item = "Ultimate Solution"; break; //UA - Misc
				case $mi >= 683 and $mi <= 686: $item = "Wind Fan"; break; //UA - Misc
				case $mi >= 687 and $mi <= 687: $item = "Winged Boots"; //UA - Misc
						$dice = mt_rand(1,4);
						if ($dice == 1 ){$item = $item . " 15` flying speed and an `A` maneuverability";}
						else if ($dice == 2){$item = $item . " 18` flying speed and an `B` maneuverability";}
						else if ($dice == 3){$item = $item . " 21` flying speed and an `C` maneuverability";}
						else {$item = $item . " 24` flying speed and an `D` maneuverability";}
					break;
				case $mi >= 688 and $mi <= 691: $item = "Zagyg`s Flowing Flagon"; break; //UA - Misc
				case $mi >= 692: $item = "Zagyg`s Spell Component Case"; //UA - Misc
						$dice = mt_rand(1,20);
						if ($dice >= 20 ){$item = $item . " can be used 7 times a day";}
						else if ($dice >= 15){$item = $item . " can be used 6 times a day";}
						else if ($dice >= 11){$item = $item . " can be used 5 times a day";}
						else if ($dice >= 7){$item = $item . " can be used 4 times a day";}
						else if ($dice >= 4){$item = $item . " can be used 3 times a day";}
						else {$item = $item . " can be used 2 times a day";}
					break;
			}
		}
		else if ($magic_item == "potion") ///////////////////////////////////////////////////
		{
			switch($mi)
			{
				case $mi >= 1 and $mi <= 3: $item = "Oil of Etherealness"; break; //DM - Potion
				case $mi >= 4 and $mi <= 6: $item = "Oil of Slipperiness"; break; //DM - Potion
				case $mi >= 7 and $mi <= 9: $item = "Philter of Love"; break; //DM - Potion
				case $mi >= 10 and $mi <= 12: $item = "Philter of Persuasiveness"; break; //DM - Potion
				case $mi >= 13 and $mi <= 15: $item = "Poison"; break; //DM - Potion
				case $mi >= 16 and $mi <= 18: $item = "Potion of Animal Control"; //DM - Potion
						$dice = mt_rand(1,20);
						if ($dice >= 20){$item = $item . " toward all animals";}
						else if ($dice >= 18){$item = $item . " toward reptiles/amphibians/fish";}
						else if ($dice >= 16){$item = $item . " toward mammals/marsupials/avian";}
						else if ($dice >= 13){$item = $item . " toward fish";}
						else if ($dice >= 9){$item = $item . " toward reptiles/amphibians";}
						else if ($dice >= 5){$item = $item . " toward avian";}
						else {$item = $item . " toward mammals/marsupials";}
					break;
				case $mi >= 19 and $mi <= 21: $item = "Potion of Clairaudience"; break; //DM - Potion
				case $mi >= 22 and $mi <= 24: $item = "Potion of Clairvoyance"; break; //DM - Potion
				case $mi >= 25 and $mi <= 27: $item = "Potion of Climbing"; break; //DM - Potion
				case $mi >= 28 and $mi <= 30: $item = "Potion of Delusion"; break; //DM - Potion
				case $mi >= 31 and $mi <= 33: $item = "Potion of Diminution"; break; //DM - Potion
				case $mi >= 34 and $mi <= 35: $item = "Potion of Dragon Control"; //DM - Potion
						$dice = mt_rand(1,20);
						if ($dice >= 20){$item = $item . " toward white dragons";}
						else if ($dice >= 18){$item = $item . " toward black dragons";}
						else if ($dice >= 17){$item = $item . " toward green dragons";}
						else if ($dice >= 16){$item = $item . " toward blue dragons";}
						else if ($dice >= 15){$item = $item . " toward red dragons";}
						else if ($dice >= 13){$item = $item . " toward brass dragons";}
						else if ($dice >= 11){$item = $item . " toward copper dragons";}
						else if ($dice >= 10){$item = $item . " toward bronze dragons";}
						else if ($dice >= 8){$item = $item . " toward silver dragons";}
						else if ($dice >= 5){$item = $item . " toward gold dragons";}
						else if ($dice >= 3){$item = $item . " toward evil dragons";}
						else {$item = $item . " toward good dragons";}
					break;
				case $mi >= 36 and $mi <= 38: $item = "Potion of ESP"; break; //DM - Potion
				case $mi >= 39 and $mi <= 41: $item = "Potion of Extra-Healing"; break; //DM - Potion
				case $mi >= 42 and $mi <= 44: $item = "Potion of Fire Resistance"; break; //DM - Potion
				case $mi >= 45 and $mi <= 47: $item = "Potion of Flying"; break; //DM - Potion
				case $mi >= 48 and $mi <= 49: $item = "Potion of Gaseous Form"; break; //DM - Potion
				case $mi >= 50 and $mi <= 51: $item = "Potion of Giant Control"; //DM - Potion
						$dice = mt_rand(1,20);
						if ($dice >= 20){$item = $item . " toward storm giants";}
						else if ($dice >= 18){$item = $item . " toward cloud giants";}
						else if ($dice >= 14){$item = $item . " toward fire giants";}
						else if ($dice >= 10){$item = $item . " toward frost giants";}
						else if ($dice >= 6){$item = $item . " toward stone giants";}
						else {$item = $item . " toward hill giants";}
					break;
				case $mi >= 52 and $mi <= 54: $item = "Potion of Giant Strength"; //DM - Potion
						$dice = mt_rand(1,20);
						if ($dice >= 20){$item = "Potion of Storm Giant Strength";}
						else if ($dice >= 18){$item = "Potion of Cloud Giant Strength";}
						else if ($dice >= 14){$item = "Potion of Fire Giant Strength";}
						else if ($dice >= 10){$item = "Potion of Frost Giant Strength";}
						else if ($dice >= 6){$item = "Potion of Stone Giant Strength";}
						else {$item = "Potion of Hill Giant Strength";}
					break;
				case $mi >= 55 and $mi <= 56: $item = "Potion of Growth"; break; //DM - Potion
				case $mi >= 57 and $mi <= 62: $item = "Potion of Healing"; break; //DM - Potion
				case $mi >= 63 and $mi <= 64: $item = "Potion of Heroism"; break; //DM - Potion
				case $mi >= 65 and $mi <= 66: $item = "Potion of Humanoid Control"; //DM - Potion
						$dice = mt_rand(1,20);
						if ($dice >= 20){$item = $item . " toward elves/half-elves/humans";}
						else if ($dice >= 17){$item = $item . " toward gnolls/orcs/goblins/etc";}
						else if ($dice >= 11){$item = $item . " toward humans";}
						else if ($dice >= 9){$item = $item . " toward half-orcs";}
						else if ($dice >= 7){$item = $item . " toward halflings";}
						else if ($dice >= 5){$item = $item . " toward gnomes";}
						else if ($dice >= 3){$item = $item . " toward elves/half-elves";}
						else {$item = $item . " toward dwarves";}
					break;
				case $mi >= 67 and $mi <= 69: $item = "Potion of Invisibility"; break; //DM - Potion
				case $mi >= 70 and $mi <= 72: $item = "Potion of Invulnerability"; break; //DM - Potion
				case $mi >= 73 and $mi <= 75: $item = "Potion of Levitation"; break; //DM - Potion
				case $mi >= 76 and $mi <= 78: $item = "Potion of Longevity"; break; //DM - Potion
				case $mi >= 79 and $mi <= 81: $item = "Potion of Plant Control"; break; //DM - Potion
				case $mi >= 82 and $mi <= 84: $item = "Potion of Polymorph Self"; break; //DM - Potion
				case $mi >= 85 and $mi <= 87: $item = "Potion of Speed"; break; //DM - Potion
				case $mi >= 88 and $mi <= 90: $item = "Potion of Super-Heroism "; break; //DM - Potion
				case $mi >= 91 and $mi <= 93: $item = "Potion of Sweet Water"; break; //DM - Potion
				case $mi >= 94 and $mi <= 96: $item = "Potion of Treasure Finding"; break; //DM - Potion
				case $mi >= 97 and $mi <= 97: $item = "Potion of Undead Control"; //DM - Potion
						$dice = mt_rand(1,10);
						if ($dice == 10){$item = $item . " toward ghasts";}
						else if ($dice == 9){$item = $item . " toward ghosts";}
						else if ($dice == 8){$item = $item . " toward ghouls";}
						else if ($dice == 7){$item = $item . " toward shadows";}
						else if ($dice == 6){$item = $item . " toward skeletons";}
						else if ($dice == 5){$item = $item . " toward spectres";}
						else if ($dice == 4){$item = $item . " toward wights";}
						else if ($dice == 3){$item = $item . " toward wraiths";}
						else if ($dice == 2){$item = $item . " toward vampires";}
						else {$item = $item . " toward zombies";}
					break;
				case $mi >= 98 and $mi <= 100: $item = "Potion of Water Breathing"; break; //DM - Potion
				case $mi >= 101 and $mi <= 105: $item = "Elixir of Health"; break; //UA - Potion
				case $mi >= 106 and $mi <= 115: $item = "Elixir of Life"; break; //UA - Potion
				case $mi >= 116 and $mi <= 120: $item = "Elixir of Madness"; break; //UA - Potion
				case $mi >= 121 and $mi <= 125: $item = "Elixir of Youth"; break; //UA - Potion
				case $mi >= 126 and $mi <= 130: $item = "Potion of Fire Breath"; break; //UA - Potion
				case $mi >= 131 and $mi <= 135: $item = "Oil of Acid Resistance"; break; //UA - Potion
				case $mi >= 136 and $mi <= 140: $item = "Oil of Disenchantment"; break; //UA - Potion
				case $mi >= 141 and $mi <= 145: $item = "Oil of Elemental Invulnerability"; break; //UA - Potion
				case $mi >= 146 and $mi <= 149: $item = "Oil of Fiery Burning"; break; //UA - Potion
				case $mi >= 150 and $mi <= 155: $item = "Oil of Fumbling"; break; //UA - Potion
				case $mi >= 156 and $mi <= 160: $item = "Oil of Impact"; break; //UA - Potion
				case $mi >= 161 and $mi <= 165: $item = "Oil of Sharpness"; //UA - Potion
						$dice = mt_rand(1,20);
						if ($dice >= 20 ){$item = $item . " with +6 to hit and damage";}
						else if ($dice >= 17){$item = $item . " with +5 to hit and damage";}
						else if ($dice >= 12){$item = $item . " with +4 to hit and damage";}
						else if ($dice >= 6){$item = $item . " with +3 to hit and damage";}
						else if ($dice >= 3){$item = $item . " with +2 to hit and damage";}
						else {$item = $item . " with +1 to hit and damage";}
					break;
				case $mi >= 166 and $mi <= 170: $item = "Oil of Timelessness"; break; //UA - Potion
				case $mi >= 171 and $mi <= 175: $item = "Philter of Beauty"; break; //UA - Potion
				case $mi >= 176 and $mi <= 180: $item = "Philter of Glibness"; break; //UA - Potion
				case $mi >= 181 and $mi <= 185: $item = "Philter of Stammering & Stuttering"; break; //UA - Potion
				case $mi >= 186 and $mi <= 190: $item = "Potion of Rainbow Hues"; break; //UA - Potion
				case $mi >= 191 and $mi <= 195: $item = "Potion of Ventriloquism"; break; //UA - Potion
				case $mi >= 196: $item = "Potion of Vitality"; break; //UA - Potion
			}
		}
		else if ($magic_item == "ring") ///////////////////////////////////////////////////
		{
			switch($mi)
			{
				case $mi >= 1 and $mi <= 6: $item = "Ring of Contrariness"; //DM - Ring
						$dice = mt_rand(1,100);
						if ($dice >= 81){$item = $item . " with 18/00 Strength";}
						else if ($dice >= 71){$item = $item . " with Spell Turning";}
						else if ($dice >= 61){$item = $item . " with Shocking Grasp once per round";}
						else if ($dice >= 41){$item = $item . " with Levitation";}
						else if ($dice >= 21){$item = $item . " with Invisibility";}
						else {$item = $item . " with Flying";}
					break;
				case $mi >= 7 and $mi <= 12: $item = "Ring of Delusion"; break; //DM - Ring
				case $mi >= 13 and $mi <= 14: $item = "Ring of Djinni Summoning"; break; //DM - Ring
				case $mi >= 15 and $mi <= 15: $item = "Ring of Elemental Command"; //DM - Ring
						$dice = mt_rand(1,4);
						if ($dice == 1){$item = "Ring of Water Elemental Command";}
						else if ($dice == 2){$item = "Ring of Fire Elemental Command";}
						else if ($dice == 3){$item = "Ring of Earth Elemental Command";}
						else {$item = "Ring of Air Elemental Command";}
					break;
				case $mi >= 16 and $mi <= 21: $item = "Ring of Feather Falling"; break; //DM - Ring
				case $mi >= 22 and $mi <= 27: $item = "Ring of Fire Resistance"; break; //DM - Ring
				case $mi >= 28 and $mi <= 30: $item = "Ring of Free Action"; break; //DM - Ring
				case $mi >= 31 and $mi <= 33: $item = "Ring of Human Influence"; break; //DM - Ring
				case $mi >= 34 and $mi <= 40: $item = "Ring of Invisibility"; break; //DM - Ring
				case $mi >= 41 and $mi <= 43: $item = "Ring of Mammal Control"; break; //DM - Ring
				case $mi >= 44 and $mi <= 44: $item = "Ring of Multiple Wishes"; break; //DM - Ring
				case $mi >= 45 and $mi <= 60: $item = "Ring of Protection"; //DM - Ring
						$dice = mt_rand(1,100);
						if ($dice >= 98){$item = $item . " +6 AC & +1 on saves";}
						else if ($dice >= 92){$item = $item . " +4 AC & +2 on saves";}
						else if ($dice >= 91){$item = $item . " +3 with 5` radius";}
						else if ($dice >= 84){$item = $item . " +3";}
						else if ($dice >= 83){$item = $item . " +2 with 5` radius";}
						else if ($dice >= 71){$item = $item . " +2";}
						else {$item = $item . " +1";}
					break;
				case $mi >= 61 and $mi <= 61: $item = "Ring of Regeneration"; break; //DM - Ring
				case $mi >= 62 and $mi <= 63: $item = "Ring of Shooting Stars"; break; //DM - Ring
				case $mi >= 64 and $mi <= 65: $item = "Ring of Spell Storing"; break; //DM - Ring
				case $mi >= 66 and $mi <= 69: $item = "Ring of Spell Turning"; break; //DM - Ring
				case $mi >= 70 and $mi <= 75: $item = "Ring of Swimming"; break; //DM - Ring
				case $mi >= 76 and $mi <= 77: $item = "Ring of Telekinesis"; //DM - Ring
						$dice = mt_rand(1,100);
						if ($dice >= 100){$item = $item . " for 4,000 gp maximum weight";}
						else if ($dice >= 90){$item = $item . " for 2,000 gp maximum weight";}
						else if ($dice >= 51){$item = $item . " for 1,000 gp maximum weight";}
						else if ($dice >= 26){$item = $item . " for 500 gp maximum weight";}
						else {$item = $item . " for 250 gp maximum weight";}
					break;
				case $mi >= 78 and $mi <= 79: $item = "Ring of Three Wishes"; break; //DM - Ring
				case $mi >= 80 and $mi <= 85: $item = "Ring of Warmth"; break; //DM - Ring
				case $mi >= 86 and $mi <= 90: $item = "Ring of Water Walking"; break; //DM - Ring
				case $mi >= 91 and $mi <= 98: $item = "Ring of Weakness"; break; //DM - Ring
				case $mi >= 99 and $mi <= 99: $item = "Ring of Wizardry"; //DM - Ring
						$dice = mt_rand(1,100);
						if ($dice >= 100){$item = $item . " which doubles 4th & 5th level spells";}
						else if ($dice >= 96){$item = $item . " which doubles 1st-3rd level spells";}
						else if ($dice >= 93){$item = $item . " which doubles 5th level spells";}
						else if ($dice >= 89){$item = $item . " which doubles 4th level spells";}
						else if ($dice >= 83){$item = $item . " which doubles 1st & 2nd level spells";}
						else if ($dice >= 76){$item = $item . " which doubles 3rd level spells";}
						else if ($dice >= 51){$item = $item . " which doubles 2nd level spells";}
						else {$item = $item . " which doubles 1st level spells";}
					break;
				case $mi >= 100 and $mi <= 100: $item = "Ring of X-Ray Vision"; break; //DM - Ring
				case $mi >= 101 and $mi <= 108: $item = "Ring of Animal Friendship"; break; //UA - Ring
				case $mi >= 109 and $mi <= 118: $item = "Ring of Blinking"; break; //UA - Ring
				case $mi >= 119 and $mi <= 120: $item = "Ring of Boccob"; break; //UA - Ring
				case $mi >= 121 and $mi <= 129: $item = "Ring of Chameleon Power"; break; //UA - Ring
				case $mi >= 130 and $mi <= 138: $item = "Ring of Clumsiness"; //UA - Ring
						$dice = mt_rand(1,100);
						if ($dice >= 81 ){$item = $item . " with Water Walking";}
						else if ($dice >= 61){$item = $item . " with Warmth";}
						else if ($dice >= 51){$item = $item . " with Swimming";}
						else if ($dice >= 36){$item = $item . " with Jumping";}
						else if ($dice >= 21){$item = $item . " with Invisibility";}
						else if ($dice >= 11){$item = $item . " with Feather Falling";}
						else {$item = $item . " with Free Action";}
					break;
				case $mi >= 139 and $mi <= 147: $item = "Ring of Faerie"; break; //UA - Ring
				case $mi >= 148 and $mi <= 156: $item = "Ring of Jumping"; break; //UA - Ring
				case $mi >= 157 and $mi <= 165: $item = "Ring of Mind Shielding"; break; //UA - Ring
				case $mi >= 166 and $mi <= 174: $item = "Ring of Shocking Grasp"; break; //UA - Ring
				case $mi >= 175 and $mi <= 187: $item = "Ring of Sustenance"; break; //UA - Ring
				case $mi >= 188 and $mi <= 190: $item = "Ring of the Ram"; break; //UA - Ring
				case $mi >= 191: $item = "Ring of Truth"; break; //UA - Ring
			}
		}
		else if ($magic_item == "scroll") ///////////////////////////////////////////////////
		{
			switch($mi)
			{
				case 0: $item = mapMaker(997,$game); break; //DM - Scroll
				case $mi >= 1 and $mi <= 19: $scroll_picker = 1; $item = "Spell Scroll ("; break; //DM - Scroll
				case $mi >= 20 and $mi <= 27: $scroll_picker = 2; $item = "Spell Scrolls 2 ("; break; //DM - Scroll
				case $mi >= 28 and $mi <= 35: $scroll_picker = 3; $item = "Spell Scrolls 3 ("; break; //DM - Scroll
				case $mi >= 36 and $mi <= 42: $scroll_picker = 4; $item = "Spell Scrolls 4 ("; break; //DM - Scroll
				case $mi >= 43 and $mi <= 49: $scroll_picker = 5; $item = "Spell Scrolls 5 ("; break; //DM - Scroll
				case $mi >= 50 and $mi <= 54: $scroll_picker = 6; $item = "Spell Scrolls 6 ("; break; //DM - Scroll
				case $mi >= 55 and $mi <= 60: $scroll_picker = 7; $item = "Spell Scrolls 7 ("; break; //DM - Scroll
				case $mi >= 61 and $mi <= 63: $item = "Cursed Scroll (" . curseType(mt_rand(1,10),reader,item,$game) . ")"; break; //DM - Scroll
				case $mi >= 64 and $mi <= 65: $item = "Scroll of Protection from Demons"; break; //DM - Scroll
				case $mi >= 66 and $mi <= 67: $item = "Scroll of Protection from Devils"; break; //DM - Scroll
				case $mi >= 68 and $mi <= 73: $item = "Scroll of Protection from Elementals"; //DM - Scroll
						$dice = mt_rand(1,100);
						if ($dice >= 61){$item = "Scroll of Protection from All Elementals";}
						else if ($dice >= 46){$item = "Scroll of Protection from Water Elementals";}
						else if ($dice >= 31){$item = "Scroll of Protection from Fire Elementals";}
						else if ($dice >= 16){$item = "Scroll of Protection from Earth Elementals";}
						else {$item = "Scroll of Protection from Air Elementals";}
					break;
				case $mi >= 74 and $mi <= 79: $item = "Scroll of Protection from Lycanthropes"; //DM - Scroll
						$dice = mt_rand(1,100);
						if ($dice >= 99){$item = "Scroll of Protection from Shape-Changers";}
						else if ($dice >= 41){$item = "Scroll of Protection from All Lycanthropes";}
						else if ($dice >= 26){$item = "Scroll of Protection from Werewolves";}
						else if ($dice >= 21){$item = "Scroll of Protection from Weretigers";}
						else if ($dice >= 11){$item = "Scroll of Protection from Wererats";}
						else if ($dice >= 6){$item = "Scroll of Protection from Wereboars";}
						else {$item = "Scroll of Protection from Werebears";}
					break;
				case $mi >= 80 and $mi <= 85: $item = "Scroll of Protection from Magic"; break; //DM - Scroll
				case $mi >= 86 and $mi <= 90: $item = "Scroll of Protection from Petrification"; break; //DM - Scroll
				case $mi >= 91 and $mi <= 95: $item = "Scroll of Protection from Possession"; break; //DM - Scroll
				case $mi >= 96 and $mi <= 100: $item = "Scroll of Protection from Undead"; break; //DM - Scroll
				case $mi >= 101 and $mi <= 102: $item = "Scroll of Protection from Acid"; break; //UA - Scroll
				case $mi >= 103 and $mi <= 107: $item = "Scroll of Protection from Cold"; break; //UA - Scroll
				case $mi >= 108 and $mi <= 112: $item = "Scroll of Protection from Dragon Breath"; break; //UA - Scroll
				case $mi >= 113 and $mi <= 117: $item = "Scroll of Protection from Electricity"; break; //UA - Scroll
				case $mi >= 118 and $mi <= 122: $item = "Scroll of Protection from Fire"; break; //UA - Scroll
				case $mi >= 123 and $mi <= 127: $item = "Scroll of Protection from Gas"; break; //UA - Scroll
				case $mi >= 128 and $mi <= 132: $item = "Scroll of Protection from Illusions"; break; //UA - Scroll
				case $mi >= 133 and $mi <= 138: $item = "Scroll of Protection from Magical Blunt Weapons"; break; //UA - Scroll
				case $mi >= 139 and $mi <= 144: $item = "Scroll of Protection from Magical Edged Weapons"; break; //UA - Scroll
				case $mi >= 145 and $mi <= 150: $item = "Scroll of Protection from Magical Missile Weapons"; break; //UA - Scroll
				case $mi >= 151 and $mi <= 155: $item = "Scroll of Protection from Non-Dragon Breath"; break; //UA - Scroll
				case $mi >= 156 and $mi <= 161: $item = "Scroll of Protection from Ordinary Blunt Weapons"; break; //UA - Scroll
				case $mi >= 162 and $mi <= 167: $item = "Scroll of Protection from Ordinary Edged Weapons"; break; //UA - Scroll
				case $mi >= 168 and $mi <= 173: $item = "Scroll of Protection from Ordinary Missile Weapons"; break; //UA - Scroll
				case $mi >= 174 and $mi <= 178: $item = "Scroll of Protection from Paralyzation"; break; //UA - Scroll
				case $mi >= 179 and $mi <= 184: $item = "Scroll of Protection from Plants"; break; //UA - Scroll
				case $mi >= 185 and $mi <= 190: $item = "Scroll of Protection from Poison"; break; //UA - Scroll
				case $mi >= 191 and $mi <= 195: $item = "Scroll of Protection from Traps"; break; //UA - Scroll
				case $mi >= 196: $item = "Scroll of Protection from Water"; break; //UA - Scroll
			}
			if ($scroll_picker > 0)
			{
				while ($scroll_picker > 0) :
					$spell = $spell . gameSpellChooser($game,mt_rand(1,20),'') . ", ";
					$scroll_picker = $scroll_picker - 1;
				endwhile;
				$item = $item . substr($spell, 0, -2) . ")";
			}
		}
		else if ($magic_item == "sword") ///////////////////////////////////////////////////
		{
			switch($mi)
			{
				case $mi >= 1 and $mi <= 6: $item = "Cursed XXXSword +1"; break; //DM - Sword
				case $mi >= 7 and $mi <= 10: $item = "Cursed XXXSword -2"; break; //DM - Sword
				case $mi >= 11 and $mi <= 12: $item = "Cursed XXXSword of Berserking"; break; //DM - Sword
				case $mi >= 13 and $mi <= 27: $item = "Holy Avenger XXXSword +5"; $ego = 10; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 28 and $mi <= 34: $item = "Holy Avenger XXXSword +6"; $ego = 12; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 35 and $mi <= 35: $item = "Luck Blade XXXSword +1"; $ego = 2; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 36 and $mi <= 36: $item = "Vorpal XXXSword"; $ego = 6; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 37 and $mi <= 61: $item = "XXXSword +1"; $ego = 1; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 62 and $mi <= 66: $item = "XXXSword +1, +2 vs magic-using & enchanted creatures"; $ego = 3; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 67 and $mi <= 71: $item = "XXXSword +1, +3 vs lycanthropes & shape-changers"; $ego = 4; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 72 and $mi <= 76: $item = "XXXSword +1, +3 vs regenerating creatures"; $ego = 4; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 77 and $mi <= 81: $item = "XXXSword +1, +4 vs reptiles"; $ego = 5; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 82 and $mi <= 89: $item = "XXXSword +2"; $ego = 2; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 90 and $mi <= 95: $item = "XXXSword +3"; $ego = 3; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 96 and $mi <= 98: $item = "XXXSword +4"; $ego = 4; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 99 and $mi <= 100: $item = "XXXSword +5"; $ego = 5; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 101 and $mi <= 113: $item = "XXXSword of Dancing"; $ego = 4; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 114 and $mi <= 117: $item = "XXXSword of Dragon Slayer +2"; $ego = 6; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 118 and $mi <= 121: $item = "XXXSword of Flame Tongue +1, +2 vs regenerating creatures, +3 vs cold-using/inflammable/avian creatures, +4 vs undead"; $ego = 5; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 122 and $mi <= 124: $item = "XXXSword of Frost Brand +3, +6 vs fire using/dwelling creatures"; $ego = 9; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 125 and $mi <= 128: $item = "XXXSword of Giant Slayer +2"; $ego = 3; include("smart_swords.php"); $ego = 5; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 129 and $mi <= 130: $item = "XXXSword of Life Stealing"; $ego = 4; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 131 and $mi <= 132: $item = "XXXSword of Nine Lives Stealing +2"; $ego = 4; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 133 and $mi <= 134: $item = "XXXSword of Sharpness"; $ego = 6; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 135 and $mi <= 136: $item = "XXXSword of the Defender +4"; $ego = 8; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 137 and $mi <= 152: $item = "XXXSword of the Defender +5"; $ego = 10; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 153 and $mi <= 160: $item = "XXXSword of the Defender +6"; $ego = 12; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 161 and $mi <= 162: $item = "XXXSword of Wounding"; $ego = 2; include("smart_swords.php"); break; //DM - Sword
				case $mi >= 163 and $mi <= 178: $item = "Broadsword of the Final Word"; $ego = 6; include("smart_swords.php"); break; //UA - Sword
				case $mi >= 179 and $mi <= 182: $item = "Short Sword of Quickness +2"; $ego = 4; include("smart_swords.php"); break; //UA - Sword
				case $mi >= 183 and $mi <= 197: $item = "Sun Blade"; $ego = 8; include("smart_swords.php"); break; //UA - Sword
				case $mi >= 198: $item = "XXXSword of the Planes"; $ego = 8; include("smart_swords.php"); break; //UA - Sword
			}
		}
		else if ($magic_item == "wand") ///////////////////////////////////////////////////
		{
			switch($mi)
			{
				case $mi >= 1 and $mi <= 6: $item = "Rod of Absorption" . $rod_charge; break; //DM - Wand
				case $mi >= 7 and $mi <= 7: $item = "Rod of Beguiling" . $rod_charge; break; //DM - Wand
				case $mi >= 8 and $mi <= 17: $item = "Rod of Cancellation" . $rod_charge; break; //DM - Wand
				case $mi >= 18 and $mi <= 18: $item = "Rod of Lordly Might" . $rod_charge; break; //DM - Wand
				case $mi >= 19 and $mi <= 19: $item = "Rod of Resurrection" . $rod_charge; break; //DM - Wand
				case $mi >= 20 and $mi <= 20: $item = "Rod of Rulership" . $rod_charge; break; //DM - Wand
				case $mi >= 21 and $mi <= 21: $item = "Rod of Smiting" . $rod_charge; break; //DM - Wand
				case $mi >= 22 and $mi <= 22: $item = "Staff of Command" . $staff_charge; break; //DM - Wand
				case $mi >= 23 and $mi <= 29: $item = "Staff of Curing" . $staff_charge; break; //DM - Wand
				case $mi >= 30 and $mi <= 30: $item = "Staff of Power" . $staff_charge; break; //DM - Wand
				case $mi >= 31 and $mi <= 36: $item = "Staff of Striking" . $staff_charge; break; //DM - Wand
				case $mi >= 37 and $mi <= 37: $item = "Staff of the Magi" . $staff_charge; break; //DM - Wand
				case $mi >= 38 and $mi <= 43: $item = "Staff of the Serpent" . $staff_charge; break; //DM - Wand
				case $mi >= 44 and $mi <= 45: $item = "Wand of Conjuration" . $wand_charge; break; //DM - Wand
				case $mi >= 46 and $mi <= 49: $item = "Wand of Enemy Detection" . $wand_charge; break; //DM - Wand
				case $mi >= 50 and $mi <= 53: $item = "Wand of Fear" . $wand_charge; break; //DM - Wand
				case $mi >= 54 and $mi <= 55: $item = "Wand of Fire" . $wand_charge; break; //DM - Wand
				case $mi >= 56 and $mi <= 56: $item = "Wand of Frost" . $wand_charge; break; //DM - Wand
				case $mi >= 57 and $mi <= 60: $item = "Wand of Illumination" . $wand_charge; break; //DM - Wand
				case $mi >= 61 and $mi <= 64: $item = "Wand of Illusion" . $wand_charge; break; //DM - Wand
				case $mi >= 65 and $mi <= 66: $item = "Wand of Lightning" . $wand_charge; break; //DM - Wand
				case $mi >= 67 and $mi <= 70: $item = "Wand of Magic Detection" . $wand_charge; break; //DM - Wand
				case $mi >= 71 and $mi <= 78: $item = "Wand of Magic Missiles" . $wand_charge; break; //DM - Wand
				case $mi >= 79 and $mi <= 83: $item = "Wand of Metal & Mineral Detection" . $wand_charge; break; //DM - Wand
				case $mi >= 84 and $mi <= 89: $item = "Wand of Negation" . $wand_charge; break; //DM - Wand
				case $mi >= 90 and $mi <= 93: $item = "Wand of Paralyzation" . $wand_charge; break; //DM - Wand
				case $mi >= 94 and $mi <= 97: $item = "Wand of Polymorphing" . $wand_charge; break; //DM - Wand
				case $mi >= 98 and $mi <= 101: $item = "Wand of Secret Door & Trap Location" . $wand_charge; break; //DM - Wand
				case $mi >= 102 and $mi <= 109: $item = "Wand of Wonder" . $wand_charge; break; //DM - Wand
				case $mi >= 110 and $mi <= 113: $item = "Buckler Wand" . $wand_charge; break; //UA - Wand
				case $mi >= 114 and $mi <= 117: $item = "Rod of Alertness" . $rod_charge; break; //UA - Wand
				case $mi >= 118 and $mi <= 122: $item = "Rod of Flailing" . $rod_charge; break; //UA - Wand
				case $mi >= 123 and $mi <= 125: $item = "Rod of Passage" . $rod_charge; break; //UA - Wand
				case $mi >= 126 and $mi <= 129: $item = "Rod of Security" . $rod_charge; break; //UA - Wand
				case $mi >= 130 and $mi <= 132: $item = "Rod of Splendor" . $rod_charge; break; //UA - Wand
				case $mi >= 133 and $mi <= 139: $item = "Staff of Slinging" . $staff_charge; break; //UA - Wand
				case $mi >= 140 and $mi <= 142: $item = "Staff of Swarming Insects" . $staff_charge; break; //UA - Wand
				case $mi >= 143 and $mi <= 152: $item = "Staff of the Woodlands" . $staff_charge; break; //UA - Wand
				case $mi >= 153 and $mi <= 153: $item = "Staff of Thunder & Lightning" . $staff_charge; break; //UA - Wand
				case $mi >= 154 and $mi <= 160: $item = "Staff-Mace" . $staff_charge; break; //UA - Wand
				case $mi >= 161 and $mi <= 166: $item = "Staff-Spear" . $staff_charge; //UA - Wand
						$dice = mt_rand(1,20);
						if ($dice >= 20 ){$item = $item . " +3 2d8 damage";}
						else if ($dice >= 17){$item = $item . " +5";}
						else if ($dice >= 14){$item = $item . " +4";}
						else if ($dice >= 11){$item = $item . " +3";}
						else if ($dice >= 7){$item = $item . " +2";}
						else {$item = $item . " +1";}
					break;
				case $mi >= 167 and $mi <= 169: $item = "Wand of Defoliation" . $wand_charge; break; //UA - Wand
				case $mi >= 170 and $mi <= 171: $item = "Wand of Earth & Stone" . $wand_charge; break; //UA - Wand
				case $mi >= 172 and $mi <= 175: $item = "Wand of Fireballs" . $wand_charge; break; //UA - Wand
				case $mi >= 176 and $mi <= 179: $item = "Wand of Flame Extinguishing" . $wand_charge; break; //UA - Wand
				case $mi >= 180 and $mi <= 180: $item = "Wand of Force" . $wand_charge; break; //UA - Wand
				case $mi >= 181 and $mi <= 183: $item = "Wand of Ice Storms" . $wand_charge; break; //UA - Wand
				case $mi >= 184 and $mi <= 187: $item = "Wand of Lightning Bolts" . $wand_charge; break; //UA - Wand
				case $mi >= 188 and $mi <= 189: $item = "Wand of Metal Command" . $wand_charge; break; //UA - Wand
				case $mi >= 190 and $mi <= 193: $item = "Wand of Size Alteration" . $wand_charge; break; //UA - Wand
				case $mi >= 194: $item = "Wand of Steam & Vapor" . $wand_charge; break; //UA - Wand
			}
		}
		else if ($magic_item == "weapon") ///////////////////////////////////////////////////
		{
			switch($mi)
			{
				case $mi >= 1 and $mi <= 8: $item = "Arrow +1 (" . mt_rand(2,24) . "ea)"; break; //DM - Weapon
				case $mi >= 9 and $mi <= 12: $item = "Arrow +2 (" . mt_rand(2,16) . "ea)"; break; //DM - Weapon
				case $mi >= 13 and $mi <= 14: $item = "Arrow +3 (" . mt_rand(2,12) . "ea)"; break; //DM - Weapon
				case $mi >= 15 and $mi <= 15: $item = "Arrow of Slaying"; break; //DM - Weapon
				case $mi >= 16 and $mi <= 20: $item = "Axe +1"; break; //DM - Weapon
				case $mi >= 21 and $mi <= 22: $item = "Axe +2"; break; //DM - Weapon
				case $mi >= 23 and $mi <= 23: $item = "Axe +2, Throwing"; break; //DM - Weapon
				case $mi >= 24 and $mi <= 24: $item = "Axe +3"; break; //DM - Weapon
				case $mi >= 25 and $mi <= 27: $item = "Battle Axe +1"; break; //DM - Weapon
				case $mi >= 28 and $mi <= 34: $item = "Bolt +1 (" . mt_rand(6,36) . "ea)"; break; //DM - Weapon
				case $mi >= 35 and $mi <= 39: $item = "Bolt +2 (" . mt_rand(2,20) . "ea)"; //DM - Weapon
				case $mi >= 40 and $mi <= 42: $item = "Bow +1"; break; //DM - Weapon
				case $mi >= 43 and $mi <= 43: $item = "Crossbow of Accuracy +3"; break; //DM - Weapon
				case $mi >= 44 and $mi <= 44: $item = "Crossbow of Distance"; break; //DM - Weapon
				case $mi >= 45 and $mi <= 45: $item = "Crossbow of Speed"; break; //DM - Weapon
				case $mi >= 46 and $mi <= 47: $item = "Cursed Spear of the Backbiter"; break; //DM - Weapon
				case $mi >= 48 and $mi <= 52: $item = "Dagger +1"; break; //DM - Weapon
				case $mi >= 53 and $mi <= 60: $item = "Dagger +1, +2 vs creatures smaller than man-sized"; break; //DM - Weapon
				case $mi >= 61 and $mi <= 61: $item = "Dagger +2"; break; //DM - Weapon
				case $mi >= 62 and $mi <= 65: $item = "Dagger +2, +3 vs creatures larger than man-sized"; break; //DM - Weapon
				case $mi >= 66 and $mi <= 66: $item = "Dagger of Venom"; break; //DM - Weapon
				case $mi >= 67 and $mi <= 70: $item = "Dart +1 (" . mt_rand(3,12) . "ea)"; break; //DM - Weapon
				case $mi >= 71 and $mi <= 73: $item = "Dart +2 (" . mt_rand(2,8) . "ea)"; break; //DM - Weapon
				case $mi >= 74 and $mi <= 78: $item = "Flail +1"; break; //DM - Weapon
				case $mi >= 79 and $mi <= 82: $item = "Hammer +1"; break; //DM - Weapon
				case $mi >= 83 and $mi <= 84: $item = "Hammer +2"; break; //DM - Weapon
				case $mi >= 85 and $mi <= 85: $item = "Hammer of Dwarven Throwing +3"; break; //DM - Weapon
				case $mi >= 86 and $mi <= 86: $item = "Hammer of Thunderbolts"; break; //DM - Weapon
				case $mi >= 87 and $mi <= 91: $item = "Javelin +1"; break; //DM - Weapon
				case $mi >= 92 and $mi <= 94: $item = "Javelin +2"; break; //DM - Weapon
				case $mi >= 95 and $mi <= 99: $item = "Mace +1"; break; //DM - Weapon
				case $mi >= 100 and $mi <= 102: $item = "Mace +2"; break; //DM - Weapon
				case $mi >= 103 and $mi <= 104: $item = "Mace +3"; break; //DM - Weapon
				case $mi >= 105 and $mi <= 105: $item = "Mace +4"; break; //DM - Weapon
				case $mi >= 106 and $mi <= 106: $item = "Mace of Disruption"; break; //DM - Weapon
				case $mi >= 107 and $mi <= 109: $item = "Military Pick +1"; break; //DM - Weapon
				case $mi >= 110 and $mi <= 112: $item = "Morning Star +1"; break; //DM - Weapon
				case $mi >= 113 and $mi <= 115: $item = "Scimitar +1"; break; //DM - Weapon
				case $mi >= 116 and $mi <= 120: $item = "Scimitar +2"; break; //DM - Weapon
				case $mi >= 121 and $mi <= 125: $item = "Sling Bullet +1 (" . mt_rand(5,20) . "ea)"; break; //DM - Weapon
				case $mi >= 126 and $mi <= 129: $item = "Sling Bullet +2 (" . mt_rand(3,12) . "ea)"; break; //DM - Weapon
				case $mi >= 130 and $mi <= 130: $item = "Sling of Seeking +2"; break; //DM - Weapon
				case $mi >= 131 and $mi <= 135: $item = "Spear +1"; break; //DM - Weapon
				case $mi >= 136 and $mi <= 137: $item = "Spear +2"; break; //DM - Weapon
				case $mi >= 138 and $mi <= 138: $item = "Spear +3"; break; //DM - Weapon
				case $mi >= 139 and $mi <= 139: $item = "Trident +3"; break; //DM - Weapon
				case $mi >= 140 and $mi <= 141: $item = "Arrow +4 (" . mt_rand(2,8) . "ea)"; break; //UA - Weapon
				case $mi >= 142 and $mi <= 142: $item = "Axe +4"; break; //UA - Weapon
				case $mi >= 143 and $mi <= 143: $item = "Axe of Hurling"; //UA - Weapon
						$dice = mt_rand(1,20);
						if ($dice >= 20){$item = $item . " +5";}
						else if ($dice >= 16){$item = $item . " +4";}
						else if ($dice >= 11){$item = $item . " +3";}
						else if ($dice >= 6){$item = $item . " +2";}
						else {$item = $item . " +1";}
					break;
				case $mi >= 144 and $mi <= 149: $item = "Battle Axe +2"; break; //UA - Weapon
				case $mi >= 150 and $mi <= 152: $item = "Battle Axe +3"; break; //UA - Weapon
				case $mi >= 153 and $mi <= 154: $item = "Bolt +3 (" . mt_rand(3,12) . "ea)"; break; //UA - Weapon
				case $mi >= 155 and $mi <= 155: $item = "Buckle Knife"; //UA - Weapon
						$dice = mt_rand(1,10);
						if ($dice >= 10){$item = $item . " +4";}
						else if ($dice >= 8){$item = $item . " +3";}
						else if ($dice >= 5){$item = $item . " +2";}
						else {$item = $item . " +1";}
					break;
				case $mi >= 156 and $mi <= 157: $item = "Dagger +3"; break; //UA - Weapon
				case $mi >= 158 and $mi <= 158: $item = "Dagger of Throwing"; //UA - Weapon
						$dice = mt_rand(1,100);
						if ($dice >= 91){$item = $item . " +4";}
						else if ($dice >= 66){$item = $item . " +3";}
						else if ($dice >= 36){$item = $item . " +2";}
						else {$item = $item . " +1";}
					break;
				case $mi >= 159 and $mi <= 160: $item = "Dart +3 (" . mt_rand(1,4) . "ea)"; break; //UA - Weapon
				case $mi >= 161 and $mi <= 161: $item = "Dart of Homing (" . mt_rand(1,2) . "ea)"; break; //UA - Weapon
				case $mi >= 162 and $mi <= 165: $item = "Flail +2"; break; //UA - Weapon
				case $mi >= 166 and $mi <= 166: $item = "Hammer +4"; break; //UA - Weapon
				case $mi >= 167 and $mi <= 167: $item = "Hornblade"; //UA - Weapon
						$dice = mt_rand(1,100);
						if ($dice >= 91){$item = $item . " that is +3 and scimitar-sized";}
						else if ($dice >= 71){$item = $item . " that is +2 and scimitar-sized";}
						else if ($dice >= 51){$item = $item . " that is +2 and dagger-sized";}
						else if ($dice >= 36){$item = $item . " that is +1 and dagger-sized";}
						else if ($dice >= 21){$item = $item . " that is +2 and knife-sized";}
						else {$item = $item . " that is +1 and knife-sized";}
					break;
				case $mi >= 168 and $mi <= 169: $item = "Javelin +3"; break; //UA - Weapon
				case $mi >= 170 and $mi <= 174: $item = "Knife +1"; break; //UA - Weapon
				case $mi >= 175 and $mi <= 177: $item = "Knife +2"; break; //UA - Weapon
				case $mi >= 178 and $mi <= 179: $item = "Lance +1"; break; //UA - Weapon
				case $mi >= 180 and $mi <= 182: $item = "Longtooth Dagger +2"; break; //UA - Weapon
				case $mi >= 183 and $mi <= 184: $item = "Magic Quarterstaff"; //UA - Weapon
						$dice = mt_rand(1,20);
						if ($dice >= 18){$item = $item . " +5";}
						else if ($dice >= 14){$item = $item . " +4";}
						else if ($dice >= 10){$item = $item . " +3";}
						else if ($dice >= 6){$item = $item . " +2";}
						else {$item = $item . " +1";}
					break;
				case $mi >= 185 and $mi <= 187: $item = "Morning Star +2"; break; //UA - Weapon
				case $mi >= 188 and $mi <= 188: $item = "Pole Arm +1"; break; //UA - Weapon
				case $mi >= 189 and $mi <= 190: $item = "Scimitar +3"; break; //UA - Weapon
				case $mi >= 191 and $mi <= 191: $item = "Scimitar +4"; break; //UA - Weapon
				case $mi >= 192 and $mi <= 192: $item = "Scimitar of Speed"; //UA - Weapon
						$dice = mt_rand(1,100);
						if ($dice >= 91){$item = $item . " +5";}
						else if ($dice >= 76){$item = $item . " +4";}
						else if ($dice >= 51){$item = $item . " +3";}
						else if ($dice >= 25){$item = $item . " +2";}
						else {$item = $item . " +1";}
					break;
				case $mi >= 193 and $mi <= 195: $item = "Sling Bullet +3 (" . mt_rand(2,8) . "ea)"; break; //UA - Weapon
				case $mi >= 196 and $mi <= 196: $item = "Sling Bullet of Impact (" . mt_rand(1,4) . "ea)"; break; //UA - Weapon
				case $mi >= 197 and $mi <= 199: $item = "Spear +4"; break; //UA - Weapon
				case $mi >= 200: $item = "Spear +5"; break; //UA - Weapon
			}
		}
		$blade = mt_rand(1,100);
		if ($blade >= 30 ){$item = str_replace("XXXSword", "Long Sword", $item);}
		else if ($blade >= 10){$item = str_replace("XXXSword", "Broad Sword", $item);}
		else if ($blade >= 5){$item = str_replace("XXXSword", "Short Sword", $item);}
		else if ($blade >= 2){$item = str_replace("XXXSword", "Bastard Sword", $item);}
		else {$item = str_replace("XXXSword", "Two-Handed Sword", $item);}
	}
/////////////////////////// END OF THE AD&D SECTION ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	else if ($game == "BFRPG") /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		// CHOOSE A CATEGORY
		$category = mt_rand(1,100);
		if ($category > 95){$magic_item = "magic";}
		else if ($category > 90){$magic_item = "wand";}
		else if ($category > 85){$magic_item = "ring";}
		else if ($category > 55){$magic_item = "scroll";}
		else if ($category > 35){$magic_item = "potion";}
		else if ($category > 25){$magic_item = "armor";}
		else {$magic_item = "weapon";}

		if ($varb == 1){$magic_item = "potion";}

		if ($magic_item == "armor") ///////////////////////////////////////////////////
		{
			$armor_cat = mt_rand(1,100);
			if ($armor_cat > 43){$armor = "Shield";}
			else if ($armor_cat > 28){$armor = "Plate Mail";}
			else if ($armor_cat > 9){$armor = "Chain Mail";}
			else {$armor = "Leather Armor";}

			$table2 = mt_rand(1,100);
			if ($table2 > 95){$item = "Cursed " . $armor . " (AC 11)";}
			else if ($table2 > 90)
			{
				$table3 = mt_rand(1,90);
				if ($table3 > 80){$bad = "-3";}
				else if ($table3 > 50){$bad = "-2";}
				else {$bad = "-1";}
				$item = "Cursed " . $armor . " (" . $bad . ")";
			}
			else if ($table2 > 80){$item = $armor . " +3";}
			else if ($table2 > 50){$item = $armor . " +2";}
			else {$item = $armor . " +1";}
		}

		else if ($magic_item == "weapon") ///////////////////////////////////////////////////
		{
			switch (mt_rand(0,5))
			{
				case 0:	$slay = "Dragons"; 		break;
				case 1:	$slay = "Enchanted";	break;
				case 2:	$slay = "Lycanthropes"; break;
				case 3:	$slay = "Regenerators"; break;
				case 4:	$slay = "Spell Users";	break;
				case 5:	$slay = "Undead"; 		break;
			}

			$table9 = mt_rand(1,20);
			if ($table9 > 19){$power = "Wishes";}
			else if ($table9 > 16){$power = "Located Objects";}
			else if ($table9 > 12){$power = "Flames on Command";}
			else if ($table9 > 11){$power = "Drains Energy";}
			else if ($table9 > 9){$power = "Charm Person";}
			else {$power = "Casts Light on Command";}

			$table1 = mt_rand(1,100);
			if ($table1 > 97){$item = "Spear";}
			else if ($table1 > 96){$item = "Sling Bullet"; $missile=1;}
			else if ($table1 > 95){$item = "Pole Arm";}
			else if ($table1 > 94){$item = "Maul";}
			else if ($table1 > 86){$item = "Mace";}
			else if ($table1 > 83){$item = "Warhammer";}
			else if ($table1 > 81){$item = "Two-Handed Sword";}
			else if ($table1 > 79){$item = "Scimitar";}
			else if ($table1 > 65){$item = "Longsword";}
			else if ($table1 > 59){$item = "Shortsword";}
			else if ($table1 > 47){$item = "Dagger";}
			else if ($table1 > 43){$item = "Heavy Quarrel"; $missile=1;}
			else if ($table1 > 35){$item = "Light Quarrel"; $missile=1;}
			else if ($table1 > 31){$item = "Longbow Arrow"; $missile=1;}
			else if ($table1 > 27){$item = "Longbow"; $missile=1;}
			else if ($table1 > 19){$item = "Shortbow Arrow"; $missile=1;}
			else if ($table1 > 11){$item = "Shortbow"; $missile=1;}
			else if ($table1 > 9){$item = "Hand Axe";}
			else if ($table1 > 2){$item = "Battle Axe";}
			else {$item = "Great Axe";}

			if ($missile == 1)
			{
				$table2 = mt_rand(1,100);
				if ($table2 > 98){$item = "Cursed " . $item . " -2";}
				else if ($table2 > 94){$item = "Cursed " . $item . " -1";}
				else if ($table2 > 82){$item = $item . " +1, +3 vs. " . $slay;}
				else if ($table2 > 64){$item = $item . " +1, +2 vs. " . $slay;}
				else if ($table2 > 58){$item = $item . " +3";}
				else if ($table2 > 46){$item = $item . " +2";}
				else {$item = $item . " +1";}
			}
			else
			{
				$table2 = mt_rand(1,100);
				if ($table2 > 98){$item = "Cursed " . $item . " -2";}
				else if ($table2 > 95){$item = "Cursed " . $item . " -1";}
				else if ($table2 > 85){$item = $item . " +" . mt_rand(1,3) . ", " . $power;}
				else if ($table2 > 75){$item = $item . " +1, +3 vs. " . $slay;}
				else if ($table2 > 58){$item = $item . " +1, +2 vs. " . $slay;}
				else if ($table2 > 57){$item = $item . " +5";}
				else if ($table2 > 55){$item = $item . " +4";}
				else if ($table2 > 50){$item = $item . " +3";}
				else if ($table2 > 40){$item = $item . " +2";}
				else {$item = $item . " +1";}
			}
		}

		else if ($magic_item == "potion") ///////////////////////////////////////////////////
		{
			$table1 = mt_rand(1,100);
			if ($table1 > 97){$item = "Clairaudience";}
			else if ($table1 > 89){$item = "Clairvoyance";}
			else if ($table1 > 86){$item = "Control Animal";}
			else if ($table1 > 84){$item = "Control Dragon";}
			else if ($table1 > 80){$item = "Control Giant";}
			else if ($table1 > 76){$item = "Control Human";}
			else if ($table1 > 72){$item = "Control Plant";}
			else if ($table1 > 68){$item = "Control Undead";}
			else if ($table1 > 63){$item = "Delusion";}
			else if ($table1 > 59){$item = "Diminution";}
			else if ($table1 > 55){$item = "ESP";}
			else if ($table1 > 51){$item = "Fire Resistance";}
			else if ($table1 > 47){$item = "Flying";}
			else if ($table1 > 43){$item = "Gaseous Form";}
			else if ($table1 > 39){$item = "Giant Strength";}
			else if ($table1 > 35){$item = "Growth";}
			else if ($table1 > 32){$item = "Healing";}
			else if ($table1 > 25){$item = "Heroism";}
			else if ($table1 > 22){$item = "Invisibility";}
			else if ($table1 > 19){$item = "Invulnerability";}
			else if ($table1 > 16){$item = "Levitation";}
			else if ($table1 > 13){$item = "Longevity";}
			else if ($table1 > 10){$item = "Poison";}
			else if ($table1 > 7){$item = "Polymorph Self";}
			else if ($table1 > 3){$item = "Speed";}
			else {$item = "Treasure Finding";}

			$item = "Potion of " . $item;
		}

		else if ($magic_item == "ring") ///////////////////////////////////////////////////
		{
			$table1 = mt_rand(1,100);
			if ($table1 > 98){$item = "X-Ray Vision";}
			else if ($table1 > 97){$item = "Wishes";}
			else if ($table1 > 90){$item = "Weakness";}
			else if ($table1 > 83){$item = "Water Walking";}
			else if ($table1 > 81){$item = "Telekinesis";}
			else if ($table1 > 75){$item = "Spell Turning";}
			else if ($table1 > 73){$item = "Spell Storing";}
			else if ($table1 > 71){$item = "Regeneration";}
			else if ($table1 > 70){$item = "Protection +3";}
			else if ($table1 > 66){$item = "Protection +2";}
			else if ($table1 > 57){$item = "Protection +1";}
			else if ($table1 > 44){$item = "Invisibility";}
			else if ($table1 > 33){$item = "Fire Resistance";}
			else if ($table1 > 30){$item = "Djinni Summoning";}
			else if ($table1 > 19){$item = "Delusion";}
			else if ($table1 > 12){$item = "Control Plant";}
			else if ($table1 > 6){$item = "Control Human";}
			else {$item = "Control Animal";}

			$item = "Ring of " . $item;
		}

		else if ($magic_item == "wand") ///////////////////////////////////////////////////
		{
			$table1 = mt_rand(1,100);
			if ($table1 >92){$item = "Wand of Trap Detection";}
			else if ($table1 >84){$item = "Wand of Secret Door Detection";}
			else if ($table1 >79){$item = "Wand of Polymorph";}
			else if ($table1 >73){$item = "Wand of Paralyzation";}
			else if ($table1 >65){$item = "Wand of Magic Detection";}
			else if ($table1 >60){$item = "Wand of Lightning Bolts";}
			else if ($table1 >55){$item = "Wand of Illusion";}
			else if ($table1 >50){$item = "Wand of Fireballs";}
			else if ($table1 >45){$item = "Wand of Fear";}
			else if ($table1 >40){$item = "Wand of Enemy Detection";}
			else if ($table1 >35){$item = "Wand of Cold";}
			else if ($table1 >34){$item = "Staff of Wizardry";}
			else if ($table1 >30){$item = "Staff of Striking";}
			else if ($table1 >28){$item = "Staff of Power";}
			else if ($table1 >17){$item = "Staff of Healing";}
			else if ($table1 >13){$item = "Staff of Commanding";}
			else if ($table1 >8){$item = "Snake Staff";}
			else {$item = "Rod of Cancellation";}
		}

		else if ($magic_item == "scroll") ///////////////////////////////////////////////////
		{
			$table1 = mt_rand(1,20);
			if ($table1 > 19){$item = "cursed";}
			else if ($table1 > 12){$item = "protection";}
			else {$item = "spell";}

			if ($item == "spell")
			{
				$item = "scroll (" . gameSpellChooser($game,mt_rand(1,20),'') . ")";
			}
			else if ($item == "protection")
			{
				$table2 = mt_rand(1,3);
				if ($table2 == 1){$bonus = "Elementals";}
				else if ($table2 == 2){$bonus = "Lycanthropes";}
				else if ($table2 == 3){$bonus = "Magic";}
				else {$bonus = "Undead";}

				$item = "Protection from " . $bonus . " Scroll";
			}
			else if (mt_rand(1,100) == 1){$item = mapMaker(997,$game);}
			else
			{
				$item = "Cursed Scroll (" . curseType(mt_rand(1,20),reader,item,$game) . ")";
			}
		}
		else ///////////////////////////////////////////////////////////////////////////////////
		{
			$table2 = mt_rand(1,100);

			if ($table2 > 99){$item = "Stone of Commanding Earth Elementals";}
			else if ($table2 > 96){$item = "Scarab of Protection";}
			else if ($table2 > 91){$item = "Rope of Climbing";}
			else if ($table2 > 90){$item = "Mirror of Life Trapping";}
			else if ($table2 > 81){$item = "Medallion of ESP";}
			else if ($table2 > 80){$item = "Horn of Blasting";}
			else if ($table2 > 79){$item = "Helm of Teleportation";}
			else if ($table2 > 78){$item = "Helm of Telepathy";}
			else if ($table2 > 72){$item = "Helm of Reading Languages & Magic";}
			else if ($table2 > 70){$item = "Girdle of Giant Strength";}
			else if ($table2 > 63){$item = "Gauntlets of Ogre Power";}
			else if ($table2 > 61){$item = "Flying Carpet";}
			else if ($table2 > 54){$item = "Elven Cloak";}
			else if ($table2 > 47){$item = "Elven Boots";}
			else if ($table2 > 46){$item = "Efreeti Bottle";}
			else if ($table2 > 45){$item = "Drums of Panic";}
			else if ($table2 > 43){$item = "Crystal Ball with Clairaudience";}
			else if ($table2 > 39){$item = "Crystal Ball";}
			else if ($table2 > 36){$item = "Cloak of Displacement";}
			else if ($table2 > 35){$item = "Censer of Commanding Air Elementals";}
			else if ($table2 > 29){$item = "Broom of Flying";}
			else if ($table2 > 28){$item = "Brazier of Commanding Fire Elementals";}
			else if ($table2 > 27){$item = "Bowl of Commanding Water Elementals";}
			else if ($table2 > 22){$item = "Boots of Traveling & Leaping";}
			else if ($table2 > 17){$item = "Boots of Speed";}
			else if ($table2 > 12){$item = "Boots of Levitation";}
			else if ($table2 > 6){$item = "Bag of Holding";}
			else if ($table2 > 4){$item = "Bag of Devouring";}
			else {$item = "Amulet of Proof against Detection & Location";}
		}
	}

/////////////////////////// END OF THE BFRPG SECTION ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	else if ($game == "Labyrinth Lord") /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		$aec = $_SESSION["SESSION_ADD_AEC"];

		// CHOOSE A CATEGORY
		$category = mt_rand(1,100);

		if ($varb == 1){$category = 1;}
		else if ($varb == 2){$category = 62;}
		else if ($varb == 3){$category = 57;}
		else if ($varb == 4){$category = 21;}
		else if ($varb == 5){$category = 26;}

		if ($category >= 93){ $mi = mt_rand(1417,1538); } // ARMOR
		else if ($category >= 88){ if ($aec > 0){$mi = mt_rand(1,150);} else {$mi = mt_rand(1,121);} } // WEAPONS
		else if ($category >= 67){ if ($aec > 0){$mi = mt_rand(319,461);} else {$mi = mt_rand(319,438);} } // SWORDS
		else if ($category >= 62){ if ($aec > 0){$mi = mt_rand(853,1416);} else {$mi = mt_rand(853,1000);} } // MISC
		else if ($category >= 57){ if ($aec > 0){$mi = mt_rand(151,318);} else {$mi = mt_rand(151,273);} } // WAND
		else if ($category >= 26){ $mi = mt_rand(462,555); } // SCROLL
		else if ($category >= 21){ $mi = mt_rand(575,690); } // RING
		else { $mi = mt_rand(691,852); } // POTION

		$armors = mt_rand(1,100);
		if ($armors > 96){$armor = "Studded Leather Armor";}
		else if ($armors > 91){$armor = "Splint Mail Armor";}
		else if ($armors > 86){$armor = "Scale Mail Armor";}
		else if ($armors > 68){$armor = "Plate Mail Armor";}
		else if ($armors > 61){$armor = "Padded Armor";}
		else if ($armors > 31){$armor = "Leather Armor";}
		else if ($armors > 11){$armor = "Chain Mail Armor";}
		else {$armor = "Banded Mail Armor";}

		$swords = mt_rand(1,100);
		if ($swords > 90){$sword = "Two-Handed Sword";}
		else if ($swords > 70){$sword = "Short Sword";}
		else if ($swords > 60){$sword = "Bastard Sword";}
		else {$sword = "Long Sword";}

		switch ($mi)
		{
			case $mi >= 1 and $mi <= 2: $item = "Arrow +3, Slaying Arrow";  // WEAPONS LL
					$dice = mt_rand(1,20);
					if ($dice == 1){$item = $item . " vs Avians";}
					else if ($dice == 2){$item = $item . " vs Chimera";}
					else if ($dice == 3){$item = $item . " vs Clerics";}
					else if ($dice == 4){$item = $item . " vs Dragons";}
					else if ($dice == 5){$item = $item . " vs Dwarves";}
					else if ($dice == 6){$item = $item . " vs Efreeti";}
					else if ($dice == 7){$item = $item . " vs Elementals";}
					else if ($dice == 8){$item = $item . " vs Elves";}
					else if ($dice == 9){$item = $item . " vs Fighters";}
					else if ($dice == 10){$item = $item . " vs Giants";}
					else if ($dice == 11){$item = $item . " vs Giant Animals";}
					else if ($dice == 12){$item = $item . " vs Golems";}
					else if ($dice == 13){$item = $item . " vs Halflings";}
					else if ($dice == 14){$item = $item . " vs Magic-Users";}
					else if ($dice == 15){$item = $item . " vs Mammals";}
					else if ($dice == 16){$item = $item . " vs Reptiles";}
					else if ($dice == 17){$item = $item . " vs Sea Creatures";}
					else if ($dice == 18){$item = $item . " vs Spiders";}
					else if ($dice == 19){$item = $item . " vs Thieves";}
					else {$item = $item . " vs Undead";}
				break;
			case $mi >= 3 and $mi <= 13: $item = "Arrows +1 (" . mt_rand(2,12) . "ea)"; break;  // WEAPONS LL
			case $mi >= 14 and $mi <= 16: $item = "Arrows +1 (" . mt_rand(3,30) . "ea)"; break;  // WEAPONS LL
			case $mi >= 17 and $mi <= 23: $item = "Arrows +2 (" . mt_rand(1,6) . "ea)"; break;  // WEAPONS LL
			case $mi >= 24 and $mi <= 27: $item = "Arrows +3 (" . mt_rand(1,4) . "ea)"; break;  // WEAPONS LL
			case $mi >= 28 and $mi <= 37: $item = "Axe +1"; break;  // WEAPONS LL
			case $mi >= 38 and $mi <= 41: $item = "Axe +2"; break;  // WEAPONS LL
			case $mi >= 42 and $mi <= 49: $item = "Bow +1"; break;  // WEAPONS LL
			case $mi >= 50 and $mi <= 60: $item = "Crossbow Bolts +1 (" . mt_rand(2,12) . "ea)"; break;  // WEAPONS LL
			case $mi >= 61 and $mi <= 63: $item = "Crossbow Bolts +1 (" . mt_rand(3,30) . "ea)"; break;  // WEAPONS LL
			case $mi >= 64 and $mi <= 71: $item = "Crossbow Bolts +2 (" . mt_rand(1,6) . "ea)"; break;  // WEAPONS LL
			case $mi >= 72 and $mi <= 75: $item = "Crossbow Bolts +3 (" . mt_rand(1,4) . "ea)"; break;  // WEAPONS LL
			case $mi >= 76 and $mi <= 81: $item = "Dagger +1"; break;  // WEAPONS LL
			case $mi >= 82 and $mi <= 83: $item = "Dagger +2, +3 vs Goblins, Kobolds, & Orcs"; break;  // WEAPONS LL
			case $mi >= 84 and $mi <= 90: $item = "Sling +1"; break;  // WEAPONS LL
			case $mi >= 91 and $mi <= 98: $item = "Spear +1"; break;  // WEAPONS LL
			case $mi >= 99 and $mi <= 103: $item = "Spear +2"; break;  // WEAPONS LL
			case $mi >= 104 and $mi <= 105: $item = "Spear +3"; break;  // WEAPONS LL
			case $mi >= 106 and $mi <= 113: $item = "War Hammer +1"; break;  // WEAPONS LL
			case $mi >= 114 and $mi <= 119: $item = "War Hammer +2"; break;  // WEAPONS LL
			case $mi >= 120 and $mi <= 121: $item = "War Hammer +3, Dwarven Thrower"; break;  // WEAPONS LL
			case $mi >= 122 and $mi <= 123: $item = "Dagger +1, Venom"; break;  // WEAPONS AEC
			case $mi >= 124 and $mi <= 125: $item = "Dagger +2, Assassin"; break;  // WEAPONS AEC
			case $mi >= 126 and $mi <= 129: $item = "Dagger -1, Cursed"; break;  // WEAPONS AEC
			case $mi >= 130 and $mi <= 135: $item = "Mace +1"; break;  // WEAPONS AEC
			case $mi >= 136 and $mi <= 138: $item = "Mace +1, Disruption"; break;  // WEAPONS AEC
			case $mi >= 139 and $mi <= 142: $item = "Mace +2"; break;  // WEAPONS AEC
			case $mi >= 143 and $mi <= 146: $item = "Trident +1, Fish Command"; break;  // WEAPONS AEC
			case $mi >= 147 and $mi <= 150: $item = "Trident +2, Warning"; break;  // WEAPONS AEC
			case $mi >= 151 and $mi <= 157: $item = "Rod of Cancellation"; break;  // WAND LL
			case $mi >= 158 and $mi <= 160: $item = "Rod of Resurrection"; break;  // WAND LL
			case $mi >= 161 and $mi <= 163: $item = "Staff of Commanding"; break;  // WAND LL
			case $mi >= 164 and $mi <= 174: $item = "Staff of Healing"; break;  // WAND LL
			case $mi >= 175 and $mi <= 177: $item = "Staff of Power"; break;  // WAND LL
			case $mi >= 178 and $mi <= 182: $item = "Staff of Striking"; break;  // WAND LL
			case $mi >= 183 and $mi <= 190: $item = "Staff of the Serpent"; break;  // WAND LL
			case $mi >= 191 and $mi <= 193: $item = "Staff of Withering"; break;  // WAND LL
			case $mi >= 194 and $mi <= 195: $item = "Staff of Wizardry"; break;  // WAND LL
			case $mi >= 196 and $mi <= 200: $item = "Wand of Cold"; break;  // WAND LL
			case $mi >= 201 and $mi <= 206: $item = "Wand of Detecting Enemies"; break;  // WAND LL
			case $mi >= 207 and $mi <= 212: $item = "Wand of Detecting Magic"; break;  // WAND LL
			case $mi >= 213 and $mi <= 218: $item = "Wand of Detecting Metals"; break;  // WAND LL
			case $mi >= 219 and $mi <= 224: $item = "Wand of Detecting Secret Doors"; break;  // WAND LL
			case $mi >= 225 and $mi <= 229: $item = "Wand of Detecting Traps"; break;  // WAND LL
			case $mi >= 230 and $mi <= 235: $item = "Wand of Device Negation"; break;  // WAND LL
			case $mi >= 236 and $mi <= 241: $item = "Wand of Fear"; break;  // WAND LL
			case $mi >= 242 and $mi <= 247: $item = "Wand of Fire Balls"; break;  // WAND LL
			case $mi >= 248 and $mi <= 253: $item = "Wand of Illusion"; break;  // WAND LL
			case $mi >= 254 and $mi <= 258: $item = "Wand of Lightning Bolts"; break;  // WAND LL
			case $mi >= 259 and $mi <= 264: $item = "Wand of Magic Missiles"; break;  // WAND LL
			case $mi >= 265 and $mi <= 268: $item = "Wand of Paralyzation"; break;  // WAND LL
			case $mi >= 269 and $mi <= 273: $item = "Wand of Polymorphing"; break;  // WAND LL
			case $mi >= 274 and $mi <= 278: $item = "Rod of Absorption"; break;  // WAND AEC
			case $mi >= 279 and $mi <= 281: $item = "Rod of Captivation"; break;  // WAND AEC
			case $mi >= 282 and $mi <= 285: $item = "Rod of Lordly Might"; break;  // WAND AEC
			case $mi >= 286 and $mi <= 288: $item = "Rod of Rulership"; break;  // WAND AEC
			case $mi >= 289 and $mi <= 292: $item = "Rod of Striking"; break;  // WAND AEC
			case $mi >= 293 and $mi <= 294: $item = "Staff of the Magi"; break;  // WAND AEC
			case $mi >= 295 and $mi <= 297: $item = "Wand of Fire"; break;  // WAND AEC
			case $mi >= 298 and $mi <= 301: $item = "Wand of Ice"; break;  // WAND AEC
			case $mi >= 302 and $mi <= 305: $item = "Wand of Light"; break;  // WAND AEC
			case $mi >= 306 and $mi <= 308: $item = "Wand of Lightning"; break;  // WAND AEC
			case $mi >= 309 and $mi <= 311: $item = "Wand of Negation"; break;  // WAND AEC
			case $mi >= 312 and $mi <= 314: $item = "Wand of Summoning"; break;  // WAND AEC
			case $mi >= 315 and $mi <= 318: $item = "Wand of Wonder"; break;  // WAND AEC
			case $mi >= 319 and $mi <= 358: $item = "XXXSword +1"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 359 and $mi <= 364: $item = "XXXSword +1, +2 vs Lycanthropes"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 365 and $mi <= 370: $item = "XXXSword +1, +2 vs Spell Casters"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 371 and $mi <= 375: $item = "XXXSword +1, +3 vs Dragons"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 376 and $mi <= 381: $item = "XXXSword +1, +3 vs Magical Monsters"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 382 and $mi <= 387: $item = "XXXSword +1, +3 vs Regenerating Monsters"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 388 and $mi <= 392: $item = "XXXSword +1, +3 vs Undead"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 393 and $mi <= 401: $item = "XXXSword +1, can cast Light 30` radius"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 402 and $mi <= 405: $item = "XXXSword +1, can cast Locate Objects"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 406 and $mi <= 411: $item = "XXXSword +1, Flame Tongue"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 412 and $mi <= 413: $item = "XXXSword +1, Life Drinker"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 414 and $mi <= 416: $item = "XXXSword +1, Luck Blade"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 417 and $mi <= 418: $item = "XXXSword +1, Wish Blade"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 419 and $mi <= 422: $item = "XXXSword +2"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 423 and $mi <= 425: $item = "XXXSword +2, can cast Charm Person"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 426 and $mi <= 428: $item = "XXXSword +3"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 429 and $mi <= 430: $item = "XXXSword +3, Frost Brand"; include("smart_swords.php"); break;  // SWORD LL
			case $mi >= 431 and $mi <= 435: $item = "XXXSword -1, Cursed"; break;  // SWORD LL
			case $mi >= 436 and $mi <= 438: $item = "XXXSword -2, Cursed"; break;  // SWORD LL
			case $mi >= 439 and $mi <= 441: $item = "XXXSword +1, Dancing"; include("smart_swords.php"); break;  // SWORD AEC
			case $mi >= 442 and $mi <= 443: $item = "XXXSword +1, Dismembering"; include("smart_swords.php"); break;  // SWORD AEC
			case $mi >= 444 and $mi <= 446: $item = "XXXSword +1, Wounding"; include("smart_swords.php"); break;  // SWORD AEC
			case $mi >= 447 and $mi <= 453: $item = "XXXSword +2, +3 vs Giants"; include("smart_swords.php"); break;  // SWORD AEC
			case $mi >= 454 and $mi <= 455: $item = "XXXSword +2, Berserking"; include("smart_swords.php"); break;  // SWORD AEC
			case $mi >= 456 and $mi <= 457: $item = "XXXSword +2, Holy Avenger"; include("smart_swords.php"); break;  // SWORD AEC
			case $mi >= 458 and $mi <= 459: $item = "XXXSword +2, Nine Lives Stealer"; include("smart_swords.php"); break;  // SWORD AEC
			case $mi >= 460 and $mi <= 461: $item = "XXXSword +4, Defending"; include("smart_swords.php"); break;  // SWORD AEC
			case $mi >= 462 and $mi <= 467: $item = "Cursed Scroll (" . curseType(mt_rand(1,10),reader,item,$game) . ")"; break;  // SCROLL LL
			case $mi >= 468 and $mi <= 478: $item = "Scroll Warding Against Elementals"; break;  // SCROLL LL
			case $mi >= 479 and $mi <= 489: $item = "Scroll Warding Against Lycanthropes"; break;  // SCROLL LL
			case $mi >= 490 and $mi <= 495: $item = "Scroll Warding Against Magic"; break;  // SCROLL LL
			case $mi >= 496 and $mi <= 506: $item = "Scroll Warding Against Undead"; break;  // SCROLL LL
			case $mi >= 507 and $mi <= 522: $scroll_picker = 1; $item = "Spell Scroll ("; break;  // SCROLL LL
			case $mi >= 523 and $mi <= 534: $scroll_picker = 2; $item = "Spell Scrolls 2 ("; break;  // SCROLL LL
			case $mi >= 535 and $mi <= 538: $scroll_picker = 3; $item = "Spell Scrolls 3 ("; break;  // SCROLL LL
			case $mi >= 539 and $mi <= 542: $scroll_picker = 4; $item = "Spell Scrolls 4 ("; break;  // SCROLL LL
			case $mi >= 543 and $mi <= 545: $scroll_picker = 5; $item = "Spell Scrolls 5 ("; break;  // SCROLL LL
			case $mi >= 546 and $mi <= 547: $scroll_picker = 6; $item = "Spell Scrolls 6 ("; break;  // SCROLL LL
			case $mi >= 548 and $mi <= 549: $scroll_picker = 7; $item = "Spell Scrolls 7 ("; break;  // SCROLL LL
			case $mi >= 550 and $mi <= 574: $item = mapMaker(997,$game); break;  // SCROLL LL
			case $mi >= 575 and $mi <= 579: $item = "Ring of Animal Command"; break;  // RING LL
			case $mi >= 580 and $mi <= 585: $item = "Ring of Command Human"; break;  // RING LL
			case $mi >= 586 and $mi <= 592: $item = "Ring of Command Plant"; break;  // RING LL
			case $mi >= 593 and $mi <= 603: $item = "Ring of Delusion"; break;  // RING LL
			case $mi >= 604 and $mi <= 606: $item = "Ring of Djinni Calling"; break;  // RING LL
			case $mi >= 607 and $mi <= 618: $item = "Ring of Fire Resistance"; break;  // RING LL
			case $mi >= 619 and $mi <= 630: $item = "Ring of Invisibility"; break;  // RING LL
			case $mi >= 631 and $mi <= 652: $item = "Ring of Protection";   // RING LL
					$dice = mt_rand(1,100);
					if ($dice >= 100){$item = $item . " +3 with 5` radius";}
					else if ($dice >= 93){$item = $item . " +3";}
					else if ($dice >= 92){$item = $item . " +2 with 5` radius";}
					else if ($dice >= 81){$item = $item . " +2";}
					else {$item = $item . " +1";}
				break;
			case $mi >= 653 and $mi <= 655: $item = "Ring of Regeneration"; break;  // RING LL
			case $mi >= 656 and $mi <= 658: $item = "Ring of Spell Storing"; break;  // RING LL
			case $mi >= 659 and $mi <= 664: $item = "Ring of Spell Turning"; break;  // RING LL
			case $mi >= 665 and $mi <= 667: $item = "Ring of Telekinesis"; break;  // RING LL
			case $mi >= 668 and $mi <= 674: $item = "Ring of Water Walking"; break;  // RING LL
			case $mi >= 675 and $mi <= 682: $item = "Ring of Weakness"; break;  // RING LL
			case $mi >= 683 and $mi <= 686: $item = "Ring of Wishes"; break;  // RING LL
			case $mi >= 687 and $mi <= 690: $item = "Ring of X-Ray Vision"; break;  // RING LL
			case $mi >= 691 and $mi <= 693: $item = "Oil of Etherealness"; break;  // POTION  LL
			case $mi >= 694 and $mi <= 696: $item = "Oil of Slipperiness"; break;  // POTION  LL
			case $mi >= 697 and $mi <= 703: $item = "Philter of Love"; break;  // POTION  LL
			case $mi >= 704 and $mi <= 722: $item = "Poison"; break;  // POTION  LL
			case $mi >= 723 and $mi <= 726:							// POTION  LL
					$dice = mt_rand(1,20);
					if ($dice >= 20){$item = "Potion of Any Animal Control";}
					else if ($dice >= 18){$item = "Potion of Amphibian/Reptile/Fish Control";}
					else if ($dice >= 14){$item = "Potion of Amphibian/Reptile Control";}
					else if ($dice >= 12){$item = "Potion of Mammal/Avian Control";}
					else if ($dice >= 8){$item = "Potion of Mammal/Marsupial Control";}
					else if ($dice >= 5){$item = "Potion of Fish Control";}
					else {$item = "Potion of Avian Control";}
				break;
			case $mi >= 727 and $mi <= 730: $item = "Potion of Clairaudience"; break;  // POTION  LL
			case $mi >= 731 and $mi <= 734: $item = "Potion of Clairvoyance"; break;  // POTION  LL
			case $mi >= 735 and $mi <= 738: $item = "Potion of Climbing"; break;  // POTION  LL
			case $mi >= 739 and $mi <= 744: $item = "Potion of Delusion"; break;  // POTION  LL
			case $mi >= 745 and $mi <= 748: $item = "Potion of Diminution"; break;  // POTION  LL
			case $mi >= 749 and $mi <= 752:											// POTION  LL
					if ($aec > 0){$dice = mt_rand(1,14);} else {$dice = mt_rand(1,10);}
					if ($dice >= 14){$item = "Potion of Brass Dragon Control";}
					else if ($dice >= 14){$item = "Potion of Bronze Dragon Control";}
					else if ($dice >= 12){$item = "Potion of Copper Dragon Control";}
					else if ($dice >= 11){$item = "Potion of Silver Dragon Control";}
					else if ($dice >= 10){$item = "Potion of Gold Dragon Control";}
					else if ($dice >= 7){$item = "Potion of White Dragon Control";}
					else if ($dice >= 6){$item = "Potion of Red Dragon Control";}
					else if ($dice >= 4){$item = "Potion of Green Dragon Control";}
					else if ($dice >= 3){$item = "Potion of Blue Dragon Control";}
					else {$item = "Potion of Black Dragon Control";}
				break;
			case $mi >= 753 and $mi <= 756: $item = "Potion of ESP"; break;  // POTION  LL
			case $mi >= 757 and $mi <= 759: $item = "Potion of Extra-Healing"; break;  // POTION  LL
			case $mi >= 760 and $mi <= 763: $item = "Potion of Fire Resistance"; break;  // POTION  LL
			case $mi >= 764 and $mi <= 769: $item = "Potion of Flying"; break;  // POTION  LL
			case $mi >= 770 and $mi <= 774: $item = "Potion of Gaseous Form"; break;  // POTION  LL
			case $mi >= 775 and $mi <= 778: 										// POTION  LL
					$dice = mt_rand(1,20);
					if ($dice >= 20){$item = "Potion of Storm Giant Control";}
					else if ($dice >= 16){$item = "Potion of Stone Giant Control";}
					else if ($dice >= 11){$item = "Potion of Hill Giant Control";}
					else if ($dice >= 7){$item = "Potion of Frost Giant Control";}
					else if ($dice >= 3){$item = "Potion of Fire Giant Control";}
					else {$item = "Potion of Cloud Giant Control";}
				break;
			case $mi >= 779 and $mi <= 783: $item = "Potion of Giant Strength"; break;  // POTION  LL
			case $mi >= 784 and $mi <= 787: $item = "Potion of Growth"; break;  // POTION  LL
			case $mi >= 788 and $mi <= 792: $item = "Potion of Healing"; break;  // POTION  LL
			case $mi >= 793 and $mi <= 797: $item = "Potion of Heroism"; break;  // POTION  LL
			case $mi >= 798 and $mi <= 801: 										// POTION  LL
					$dice = mt_rand(1,12);
					if ($dice >= 12){$item = "Potion of Orc/Gnoll/Goblin/Etc Control";}
					else if ($dice >= 10){$item = "Potion of Human Control";}
					else if ($dice >= 8){$item = "Potion of Halfling Control";}
					else if ($dice >= 6){$item = "Potion of Gnome Control";}
					else if ($dice >= 5){$item = "Potion of Elf/Human Control";}
					else if ($dice >= 3){$item = "Potion of Elf Control";}
					else {$item = "Potion of Dwarf Control";}
				break;
			case $mi >= 802 and $mi <= 805: $item = "Potion of Invisibility"; break;  // POTION  LL
			case $mi >= 806 and $mi <= 808: $item = "Potion of Invulnerability"; break;  // POTION  LL
			case $mi >= 809 and $mi <= 812: $item = "Potion of Levitation"; break;  // POTION  LL
			case $mi >= 813 and $mi <= 822: $item = "Potion of Longevity"; break;  // POTION  LL
			case $mi >= 823 and $mi <= 828: $item = "Potion of Plant Control"; break;  // POTION  LL
			case $mi >= 829 and $mi <= 831: $item = "Potion of Polymorph"; break;  // POTION  LL
			case $mi >= 832 and $mi <= 835: $item = "Potion of Speed"; break;  // POTION  LL
			case $mi >= 836 and $mi <= 838: $item = "Potion of Super-Heroism"; break;  // POTION  LL
			case $mi >= 839 and $mi <= 842: $item = "Potion of Sweet Water"; break;  // POTION  LL
			case $mi >= 843 and $mi <= 845: $item = "Potion of Treasure Finding"; break;  // POTION  LL
			case $mi >= 846 and $mi <= 848: $item = "Potion of Undead Control"; break;  // POTION  LL
			case $mi >= 849 and $mi <= 852: $item = "Potion of Water Breathing"; break;  // POTION  LL
			case $mi >= 853 and $mi <= 855: $item = "Amulet vs Crystal Balls & ESP"; break;  // MISC LL
			case $mi >= 856 and $mi <= 857: $item = "Apparatus of the Crab"; break;  // MISC LL
			case $mi >= 858 and $mi <= 860: $item = "Bag of Devouring"; break;  // MISC LL
			case $mi >= 861 and $mi <= 866: $item = "Bag of Holding"; break;  // MISC LL
			case $mi >= 867 and $mi <= 870: $item = "Boots of Levitation"; break;  // MISC LL
			case $mi >= 871 and $mi <= 874: $item = "Boots of Speed"; break;  // MISC LL
			case $mi >= 875 and $mi <= 878: $item = "Boots of Traveling & Springing"; break;  // MISC LL
			case $mi >= 879 and $mi <= 880: $item = "Bowl of Commanding Water Elementals"; break;  // MISC LL
			case $mi >= 881 and $mi <= 883: $item = "Bracers of Armor";   // MISC LL
					$dice = mt_rand(1,100);
					if ($dice >= 87){$item = $item . " with AC 2";}
					else if ($dice >= 72){$item = $item . " with AC 3";}
					else if ($dice >= 52){$item = $item . " with AC 4";}
					else if ($dice >= 37){$item = $item . " with AC 5";}
					else if ($dice >= 17){$item = $item . " with AC 6";}
					else if ($dice >= 7){$item = $item . " with AC 7";}
					else {$item = $item . " with AC 8";}
				break;
			case $mi >= 884 and $mi <= 885: $item = "Brazier of Commanding Fire Elementals"; break;  // MISC LL
			case $mi >= 886 and $mi <= 888: $item = "Brooch of Shielding"; break;  // MISC LL
			case $mi >= 889 and $mi <= 892: $item = "Broom of Flying"; break;  // MISC LL
			case $mi >= 893 and $mi <= 894: $item = "Censer of Controlling Air Elementals"; break;  // MISC LL
			case $mi >= 895 and $mi <= 896: $item = "Chime of Opening"; break;  // MISC LL
			case $mi >= 897 and $mi <= 899: $item = "Cloak of Protection"; // MISC LL
					$dice = mt_rand(1,100);
					if ($dice >= 92){$item = $item . " +3";}
					else if ($dice >= 81){$item = $item . " +2";}
					else {$item = $item . " +1";}
				break;
			case $mi >= 900 and $mi <= 903: $item = "Crystal Ball"; break;  // MISC LL
			case $mi >= 904 and $mi <= 906: $item = "Crystal Ball with Clairaudience"; break;  // MISC LL
			case $mi >= 907 and $mi <= 908: $item = "Crystal Ball with ESP"; break;  // MISC LL
			case $mi >= 909 and $mi <= 910: $item = "Cube of Force"; break;  // MISC LL
			case $mi >= 911 and $mi <= 912: $item = "Cube of Frost Resistance"; break;  // MISC LL
			case $mi >= 913 and $mi <= 915: $item = "Decanter of Endless Water"; break;  // MISC LL
			case $mi >= 916 and $mi <= 918: $item = "Displacer Cloak"; break;  // MISC LL
			case $mi >= 919 and $mi <= 920: $item = "Drums of Panic"; break;  // MISC LL
			case $mi >= 921 and $mi <= 924: $item = "Dust of Appearance"; break;  // MISC LL
			case $mi >= 925 and $mi <= 928: $item = "Dust of Disappearance"; break;  // MISC LL
			case $mi >= 929 and $mi <= 930: $item = "Efreeti Bottle"; break;  // MISC LL
			case $mi >= 931 and $mi <= 935: $item = "Elven Boots"; break;  // MISC LL
			case $mi >= 936 and $mi <= 940: $item = "Elven Cloak"; break;  // MISC LL
			case $mi >= 941 and $mi <= 942: $item = "Eyes of Charming"; break;  // MISC LL
			case $mi >= 943 and $mi <= 946: $item = "Eyes of Petrification"; break;  // MISC LL
			case $mi >= 947 and $mi <= 949: $item = "Eyes of the Eagle"; break;  // MISC LL
			case $mi >= 950 and $mi <= 954: $item = "Flying Carpet"; break;  // MISC LL
			case $mi >= 955 and $mi <= 956: $item = "Folding Boat"; break;  // MISC LL
			case $mi >= 957 and $mi <= 960: $item = "Gauntlets of Ogre Power"; break;  // MISC LL
			case $mi >= 961 and $mi <= 964: $item = "Girdle of Giant Strength"; break;  // MISC LL
			case $mi >= 965 and $mi <= 968: $item = "Helm of Alignment Change"; break;  // MISC LL
			case $mi >= 969 and $mi <= 973: $item = "Helm of Comprehend Languages & Read Magic"; break;  // MISC LL
			case $mi >= 974 and $mi <= 975: $item = "Helm of Telepathy"; break;  // MISC LL
			case $mi >= 976 and $mi <= 977: $item = "Helm of Teleportation"; break;  // MISC LL
			case $mi >= 978 and $mi <= 979: $item = "Horn of Blasting"; break;  // MISC LL
			case $mi >= 980 and $mi <= 983: $item = "Medallion of Thoughts"; break;  // MISC LL
			case $mi >= 984 and $mi <= 986: $item = "Medallion of Thoughts (90`)"; break;  // MISC LL
			case $mi >= 987 and $mi <= 988: $item = "Mirror of Life Trapping"; break;  // MISC LL
			case $mi >= 989 and $mi <= 990: $item = "Mirror of Opposition"; break;  // MISC LL
			case $mi >= 991 and $mi <= 992: $item = "Necklace of Adaptation"; break;  // MISC LL
			case $mi >= 993 and $mi <= 995: $item = "Rope of Climbing"; break;  // MISC LL
			case $mi >= 996 and $mi <= 998: $item = "Scarab of Protection"; break;  // MISC LL
			case $mi >= 999 and $mi <= 1000: $item = "Stone of Controlling Earth Elementals"; break;  // MISC LL
			case $mi >= 1001 and $mi <= 1005: $item = "Amulet of Inescapable Location"; break;  // MISC AEC
			case $mi >= 1006 and $mi <= 1009: $item = "Amulet of Proof vs Detection & Location"; break;  // MISC AEC
			case $mi >= 1010 and $mi <= 1012: $item = "Amulet of the Planes"; break;  // MISC AEC
			case $mi >= 1013 and $mi <= 1016: $item = "Amulet vs Possession"; break;  // MISC AEC
			case $mi >= 1017 and $mi <= 1020: $item = "Arrow of Location"; break;  // MISC AEC
			case $mi >= 1021 and $mi <= 1024: $item = "Bag of Transformation"; break;  // MISC AEC
			case $mi >= 1025 and $mi <= 1028: $item = "Bag of Tricks"; break;  // MISC AEC
			case $mi >= 1029 and $mi <= 1033: $item = "Book of Chaotic Wisdom"; break;  // MISC AEC
			case $mi >= 1034 and $mi <= 1038: $item = "Book of Infinite Spells";  // MISC AEC
				$pages = 20 + mt_rand(1,10);
					$item = $item . " with " . $pages . " pages [";
					while ($pages > 0):
						$dice = mt_rand(1,100);
						$page = $page + 1;
						if ($dice >= 96){ $item = $item . "pg" . $page . " " . gameSpellChooser($game,0,Illusionist) . ", "; }
						else if ($dice >= 61){ $item = $item . "pg" . $page . " " . gameSpellChooser($game,0,Magic-User) . ", "; }
						else if ($dice >= 51){ $item = $item . "pg" . $page . " " . gameSpellChooser($game,0,Cleric) . ", "; }
						else if ($dice >= 31){ $item = $item . "pg" . $page . " " . gameSpellChooser($game,0,Druid) . ", "; }
						else { $item = $item . "pg" . $page . " is blank, "; }
						$pages = $pages - 1;
					endwhile;
					$item = substr($item, 0, -2);
					$item = $item . "]";
				break;
			case $mi >= 1039 and $mi <= 1043: $item = "Book of Lawful Wisdom"; break;  // MISC AEC
			case $mi >= 1044 and $mi <= 1047: $item = "Boots of Dancing"; break;  // MISC AEC
			case $mi >= 1048 and $mi <= 1051: $item = "Bowl of Drowning"; break;  // MISC AEC
			case $mi >= 1052 and $mi <= 1055: $item = "Brazier of Cursed Sleep"; break;  // MISC AEC
			case $mi >= 1056 and $mi <= 1060: $item = "Broom of Animated Attack"; break;  // MISC AEC
			case $mi >= 1061 and $mi <= 1065: $item = "Broom of Animated Attack"; break;  // MISC AEC
			case $mi >= 1066 and $mi <= 1069: $item = "Censer of Cursed Summoning"; break;  // MISC AEC
			case $mi >= 1070 and $mi <= 1073: $item = "Chime of Cannibalism"; break;  // MISC AEC
			case $mi >= 1074 and $mi <= 1077: $item = "Cloak of Arachnida"; break;  // MISC AEC
			case $mi >= 1078 and $mi <= 1081: $item = "Cloak of Poisonousness"; break;  // MISC AEC
			case $mi >= 1082 and $mi <= 1085: $item = "Crystal Ball of Hypnosis"; break;  // MISC AEC
			case $mi >= 1086 and $mi <= 1089: $item = "Cubic Gate"; break;  // MISC AEC
			case $mi >= 1090 and $mi <= 1092: $item = "Deck of Many Things"; break;  // MISC AEC
			case $mi >= 1093 and $mi <= 1096: $item = "Drums of Stunning"; break;  // MISC AEC
			case $mi >= 1097 and $mi <= 1100: $item = "Dust of Sneezing & Choking"; break;  // MISC AEC
			case $mi >= 1101 and $mi <= 1104: $item = "Eversmoking Bottle"; break;  // MISC AEC
			case $mi >= 1105 and $mi <= 1108: $item = "Eyes of Magnification"; break;  // MISC AEC
			case $mi >= 1109 and $mi <= 1112: $item = "Feather Token"; break;  // MISC AEC
			case $mi >= 1113 and $mi <= 1116: $item = "Figurines of Wondrous Power";  // MISC AEC
					$dice = mt_rand(1,8);
					if ($dice > 7){$item = $item . " (Bronze Griffon)";}
					else if ($dice > 6){$item = $item . " (Ebony Fly)";}
					else if ($dice > 5){$item = $item . " (Golden Lions)";}
					else if ($dice > 4){$item = $item . " (Ivory Goats)";}
					else if ($dice > 3){$item = $item . " (Marble Elephant)";}
					else if ($dice > 2){$item = $item . " (Obsidian Steed)";}
					else if ($dice > 1){$item = $item . " (Onyx Wolf)";}
					else {$item = $item . " (Serpentine Owl)";}
				break;
			case $mi >= 1117 and $mi <= 1120: $item = "Flask of Curses"; break;  // MISC AEC
			case $mi >= 1121 and $mi <= 1125: $item = "Gauntlets of Fumbling"; break;  // MISC AEC
			case $mi >= 1126 and $mi <= 1130: $item = "Gem of Brightness"; break;  // MISC AEC
			case $mi >= 1131 and $mi <= 1135: $item = "Gem of Seeing"; break;  // MISC AEC
			case $mi >= 1136 and $mi <= 1140: $item = "Gloves of Dexterity"; break;  // MISC AEC
			case $mi >= 1141 and $mi <= 1145: $item = "Gloves of Swimming & Climbing"; break;  // MISC AEC
			case $mi >= 1146 and $mi <= 1150: $item = "Golem Manual";  // MISC AEC
					$dice = mt_rand(1,100);
					if ($dice >= 91){$item = $item . " (Wood/60,000gp/4 weeks)";}
					else if ($dice >= 81){$item = $item . " (Stone/80,000gp/3 months)";}
					else if ($dice >= 76){$item = $item . " (Iron/100,000gp/4 months)";}
					else if ($dice >= 66){$item = $item . " (Flesh/45,000gp/2 months)";}
					else if ($dice >= 51){$item = $item . " (Clay/65,000gp/4 weeks)";}
					else if ($dice >= 41){$item = $item . " (Bronze/90,000gp/4 months)";}
					else if ($dice >= 11){$item = $item . " (Bone/40,000gp/4 weeks)";}
					else {$item = $item . " (Amber/75,000gp/2 months)";}
				break;
			case $mi >= 1151 and $mi <= 1155: $item = "Helm of Brilliance"; break;  // MISC AEC
			case $mi >= 1156 and $mi <= 1160: $item = "Helm of Opposite Alignment"; break;  // MISC AEC
			case $mi >= 1161 and $mi <= 1165: $item = "Helm of Underwater Action"; break;  // MISC AEC
			case $mi >= 1166 and $mi <= 1170:   // MISC AEC
					$dice = mt_rand(1,100);
					if ($dice >= 91){$item = "Iron Horn of Valhalla";}
					else if ($dice >= 76){$item = "Bronze Horn of Valhalla";}
					else if ($dice >= 41){$item = "Brass Horn of Valhalla";}
					else {$item = "Silver Horn of Valhalla";}
				break;
			case $mi >= 1171 and $mi <= 1175: $item = "Horseshoes of a Zephyr"; break;  // MISC AEC
			case $mi >= 1176 and $mi <= 1180: $item = "Horseshoes of Speed"; break;  // MISC AEC
			case $mi >= 1181 and $mi <= 1185: $item = "Incense of Meditation"; break;  // MISC AEC
			case $mi >= 1186 and $mi <= 1190: $item = "Incense of Obsession"; break;  // MISC AEC
			case $mi >= 1191 and $mi <= 1195: $item = "Instant Fortress"; break;  // MISC AEC
			case $mi >= 1196 and $mi <= 1200: $item = "Ioun Stones";  // MISC AEC
					$dice = mt_rand(1,14);
					if ($dice == 1){$item = $item . " that is clear in appearance";}
					else if ($dice == 2){$item = $item . " that is dusty rose in color";}
					else if ($dice == 3){$item = $item . " that is deep red in color";}
					else if ($dice == 4){$item = $item . " that is incandescent blue in color";}
					else if ($dice == 5){$item = $item . " that is pale blue in color";}
					else if ($dice == 6){$item = $item . " that is pink in color";}
					else if ($dice == 7){$item = $item . " that is pink and green in color";}
					else if ($dice == 8){$item = $item . " that is scarlet and blue in color";}
					else if ($dice == 9){$item = $item . " that is vibrant purple in color";}
					else if ($dice == 10){$item = $item . " that is iridescent in appearance";}
					else if ($dice == 11){$item = $item . " that is pale lavender in color";}
					else if ($dice == 12){$item = $item . " that is pearly white in color";}
					else if ($dice == 13){$item = $item . " that is pale green in color";}
					else {$item = $item . " that is lavender and green in color";}
				break;
			case $mi >= 1201 and $mi <= 1205: $item = "Javelin of Lightning"; break;  // MISC AEC
			case $mi >= 1206 and $mi <= 1210: $item = "Jewl of Monster Attraction"; break;  // MISC AEC
			case $mi >= 1211 and $mi <= 1214: $item = "Lyre of Building"; break;  // MISC AEC
			case $mi >= 1215 and $mi <= 1218: $item = "Manual of Bodily Health"; break;  // MISC AEC
			case $mi >= 1219 and $mi <= 1222: $item = "Manual of Gainful Exercise"; break;  // MISC AEC
			case $mi >= 1223 and $mi <= 1226: $item = "Manual of Quickness of Action"; break;  // MISC AEC
			case $mi >= 1227 and $mi <= 1230: $item = "Mattock of the Titans"; break;  // MISC AEC
			case $mi >= 1231 and $mi <= 1234: $item = "Maul of the Titans"; break;  // MISC AEC
			case $mi >= 1235 and $mi <= 1238: $item = "Mavelous Pigments"; break;  // MISC AEC
			case $mi >= 1239 and $mi <= 1242: $item = "Mirror of Mental Prowess"; break;  // MISC AEC
			case $mi >= 1243 and $mi <= 1246: $item = "Necklace of Strangulation"; break;  // MISC AEC
			case $mi >= 1247 and $mi <= 1250: $item = "Net of Entanglement"; break;  // MISC AEC
			case $mi >= 1251 and $mi <= 1254: $item = "Net of Snaring"; break;  // MISC AEC
			case $mi >= 1255 and $mi <= 1258: $item = "Ointment of Healing"; break;  // MISC AEC
			case $mi >= 1259 and $mi <= 1262: $item = "Pearl of Power";  // MISC AEC
					$dice = mt_rand(1,100);
					if ($dice >= 100){$item = $item . " (9th Level Power";}
					else if ($dice >= 98){$item = $item . " (8th Level Power";}
					else if ($dice >= 94){$item = $item . " (7th Level Power";}
					else if ($dice >= 86){$item = $item . " (6th Level Power";}
					else if ($dice >= 76){$item = $item . " (5th Level Power";}
					else if ($dice >= 61){$item = $item . " (4th Level Power";}
					else if ($dice >= 41){$item = $item . " (3rd Level Power";}
					else if ($dice >= 21){$item = $item . " (2nd Level Power";}
					else {$item = $item . " (1st Level Power";}
						if (mt_rand(1,100) == 1){$item = $item . " with 2 Spells)";}
						else if (mt_rand(1,100) >= 5){$item = $item . " Cursed)";}
						else {$item = $item . ")";}
				break;
			case $mi >= 1263 and $mi <= 1266: $item = "Pearl of Wisdom"; break;  // MISC AEC
			case $mi >= 1267 and $mi <= 1270: $item = "Periapt of Foul Rotting"; break;  // MISC AEC
			case $mi >= 1271 and $mi <= 1274: $item = "Periapt of Health"; break;  // MISC AEC
			case $mi >= 1275 and $mi <= 1278: $item = "Periapt of Proof vs Poison"; break;  // MISC AEC
			case $mi >= 1279 and $mi <= 1282: $item = "Periapt of Wound Closure"; break;  // MISC AEC
			case $mi >= 1283 and $mi <= 1286: $item = "Phylactery of Faithfulness"; break;  // MISC AEC
			case $mi >= 1287 and $mi <= 1290: $item = "Phylactery of Undead Turning"; break;  // MISC AEC
			case $mi >= 1291 and $mi <= 1294: $item = "Phylactery of Youth"; break;  // MISC AEC
			case $mi >= 1295 and $mi <= 1298: $item = "Pipes of the Sewers"; break;  // MISC AEC
			case $mi >= 1299 and $mi <= 1302: $item = "Portable Hole"; break;  // MISC AEC
			case $mi >= 1303 and $mi <= 1306: $item = "Potion Jug"; break;  // MISC AEC
			case $mi >= 1307 and $mi <= 1311: $item = "Robe of Blending"; break;  // MISC AEC
			case $mi >= 1312 and $mi <= 1316: $item = "Robe of Eyes"; break;  // MISC AEC
			case $mi >= 1317 and $mi <= 1321: $item = "Robe of Powerlessness"; break;  // MISC AEC
			case $mi >= 1322 and $mi <= 1326: $item = "Robe of Scintillating Colors"; break;  // MISC AEC
			case $mi >= 1327 and $mi <= 1329: $item = "Robe of the Archmagi"; break;  // MISC AEC
			case $mi >= 1330 and $mi <= 1334: $item = "Robe of Useful Items"; break;  // MISC AEC
			case $mi >= 1335 and $mi <= 1338: $item = "Rope of Entanglement"; break;  // MISC AEC
			case $mi >= 1339 and $mi <= 1342: $item = "Rope of Strangulation"; break;  // MISC AEC
			case $mi >= 1343 and $mi <= 1346: $item = "Scarab of Death"; break;  // MISC AEC
			case $mi >= 1347 and $mi <= 1351: $item = "Slippers of Spider Climbing"; break;  // MISC AEC
			case $mi >= 1352 and $mi <= 1354: $item = "Sphere of Annihilation"; break;  // MISC AEC
			case $mi >= 1355 and $mi <= 1358: $item = "Stone of Good Luck (Luckstone)"; break;  // MISC AEC
			case $mi >= 1359 and $mi <= 1362: $item = "Stone of Weight (Loadstone)"; break;  // MISC AEC
			case $mi >= 1363 and $mi <= 1367: $item = "Talisman of Pure Good"; break;  // MISC AEC
			case $mi >= 1368 and $mi <= 1371: $item = "Talisman of the Sphere"; break;  // MISC AEC
			case $mi >= 1372 and $mi <= 1376: $item = "Talisman of Ultimate Evil"; break;  // MISC AEC
			case $mi >= 1377 and $mi <= 1381: $item = "Tome of Clear Thought"; break;  // MISC AEC
			case $mi >= 1382 and $mi <= 1386: $item = "Tome of Knowledge"; break;  // MISC AEC
			case $mi >= 1387 and $mi <= 1391: $item = "Tome of Leadership & Influence"; break;  // MISC AEC
			case $mi >= 1392 and $mi <= 1396: $item = "Tome of Martial Knowledge"; break;  // MISC AEC
			case $mi >= 1397 and $mi <= 1401: $item = "Tome of Stealth"; break;  // MISC AEC
			case $mi >= 1402 and $mi <= 1406: $item = "Tome of Understanding"; break;  // MISC AEC
			case $mi >= 1407 and $mi <= 1411: $item = "Well of Many Worlds"; break;  // MISC AEC
			case $mi >= 1412 and $mi <= 1416: $item = "Wings of Flying"; break;  // MISC AEC
			case $mi >= 1417 and $mi <= 1420: $item = "XXXArmor -1, Cursed"; break;  // ARMOR LL
			case $mi >= 1421 and $mi <= 1422: $item = "XXXArmor -1, Cursed & Shield +1"; break;  // ARMOR LL
			case $mi >= 1423 and $mi <= 1426: $item = "XXXArmor -2, Cursed"; break;  // ARMOR LL
			case $mi >= 1427 and $mi <= 1428: $item = "XXXArmor -2, Cursed & Shield +1"; break;  // ARMOR LL
			case $mi >= 1429 and $mi <= 1432: $item = "XXXArmor AC 9, Cursed"; break;  // ARMOR LL
			case $mi >= 1433 and $mi <= 1453: $item = "Shield +1"; break;  // ARMOR LL
			case $mi >= 1454 and $mi <= 1464: $item = "Shield +2"; break;  // ARMOR LL
			case $mi >= 1465 and $mi <= 1471: $item = "Shield +3"; break;  // ARMOR LL
			case $mi >= 1472 and $mi <= 1476: $item = "Shield -1, Cursed"; break;  // ARMOR LL
			case $mi >= 1477 and $mi <= 1480: $item = "Shield -2, Cursed"; break;  // ARMOR LL
			case $mi >= 1481 and $mi <= 1484: $item = "Shield AC 9, Cursed"; break;  // ARMOR LL
			case $mi >= 1485 and $mi <= 1500: $item = "XXXArmor +1"; break;  // ARMOR LL
			case $mi >= 1501 and $mi <= 1511: $item = "XXXArmor +1 & Shield +1"; break;  // ARMOR LL
			case $mi >= 1512 and $mi <= 1514: $item = "XXXArmor +1 & Shield +2"; break;  // ARMOR LL
			case $mi >= 1515 and $mi <= 1516: $item = "XXXArmor +1 & Shield +3"; break;  // ARMOR LL
			case $mi >= 1517 and $mi <= 1521: $item = "XXXArmor +2"; break;  // ARMOR LL
			case $mi >= 1522 and $mi <= 1525: $item = "XXXArmor +2 & Shield +1"; break;  // ARMOR LL
			case $mi >= 1526 and $mi <= 1529: $item = "XXXArmor +2 & Shield +2"; break;  // ARMOR LL
			case $mi >= 1530 and $mi <= 1531: $item = "XXXArmor +2 & Shield +3"; break;  // ARMOR LL
			case $mi >= 1532 and $mi <= 1533: $item = "XXXArmor +3"; break;  // ARMOR LL
			case $mi >= 1534 and $mi <= 1535: $item = "XXXArmor +3 & Shield +1"; break;  // ARMOR LL
			case $mi >= 1536 and $mi <= 1537: $item = "XXXArmor +3 & Shield +2"; break;  // ARMOR LL
			case $mi >= 1538: $item = "XXXArmor +3 & Shield +3"; break;  // ARMOR LL
		}

		if ($scroll_picker > 0)
		{
			while ($scroll_picker > 0) :
				$spell = $spell . gameSpellChooser($game,mt_rand(1,20),'') . ", ";
				$scroll_picker = $scroll_picker - 1;
			endwhile;
			$item = $item . substr($spell, 0, -2) . ")";
		}
		$item = str_replace("XXXArmor", $armor, $item);
		$item = str_replace("XXXSword", $sword, $item);
	}

/////////////////////////// END OF THE LABYRINTH LORD SECTION /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	else if ($game == "Swords & Wizardry") /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		// CHOOSE A CATEGORY
		$category = mt_rand(1,100);
		if ($category > 92){$magic_item = "armor";}
		else if ($category > 66){$magic_item = "weapon";}
		else if ($category > 61){$magic_item = "magic";}
		else if ($category > 56){$magic_item = "wand";}
		else if ($category > 25){$magic_item = "scroll";}
		else if ($category > 20){$magic_item = "ring";}
		else {$magic_item = "potion";}

		if ($varb == 1){$magic_item = "potion";}

		if ($magic_item == "armor") ///////////////////////////////////////////////////
		{
			switch (mt_rand(0,4))
			{
				case 0:	$item = "plate mail armor"; break;
				case 1:	$item = "chain mail armor"; break;
				case 2:	$item = "leather armor"; break;
				case 3:	$item = "ring mail armor"; break;
				case 4:	$item = "shield"; break;
			}
			switch (mt_rand(0,4))
			{
				case 0:	$bonus = "special"; break;
				case 1:	$bonus = "cursed"; break;
				case 2:	$bonus = "+1"; break;
				case 3:	$bonus = "+2"; break;
				case 4:	$bonus = "+3"; break;
			}
			if ($bonus == "special")
			{
				if ($item == "shield")
				{
					switch (mt_rand(0,1))
					{
						case 0:	$item = $item . " +4"; break;
						case 1:	$item = $item . " +5"; break;
					}
				}
				else
				{
					switch (mt_rand(0,5))
					{
						case 0:	$item = $item . " +4"; break;
						case 1:	$item = $item . " +5"; break;
						case 2:	$item = $item . " of arrow deflection"; break;
						case 3:	$item = "demonic " . $item; break;
						case 4:	$item = "ethereal " . $item; break;
						case 5:	$item = "fiery " . $item; break;
					}
				}
			}
			else if ($bonus == "cursed")
			{
				switch (mt_rand(0,7))
				{
					case 0:	$item = "cursed " . $item . " -1"; break;
					case 1:	$item = "cursed " . $item . " -1"; break;
					case 2:	$item = "cursed " . $item . " -2"; break;
					case 3:	$item = "cursed " . $item . " -2"; break;
					case 4:	$item = "cursed " . $item . " -3"; break;
					case 5:	$item = "cursed " . $item . " (attracts missiles fired from anyone at +1 to hit)"; break;
					case 6:	$item = "cursed " . $item . " (causes them to run away from combat)"; break;
					case 7:	$item = "cursed " . $item . " (causes them to charge into combat)"; break;
				}
			}
			else {$item = $item . " (" . $bonus . ")";}
		}

		else if ($magic_item == "weapon") ///////////////////////////////////////////////////
		{
			$msw = 7;
			switch (mt_rand(0,31))
			{
				case 0:	$item = "battle axe"; break;
				case 1:	$item = "battle axe"; break;
				case 2:	$item = "hand axe"; break;
				case 3:	$item = "dagger"; break;
				case 4:	$item = "dagger"; break;
				case 5:	$item = "war hammer"; break;
				case 6:	$item = "lance"; break;
				case 7:	$item = "heavy mace"; break;
				case 8:	$item = "heavy mace"; break;
				case 9: $item = "light mace"; break;
				case 10:$item = "spear"; break;
				case 11:$item = "staff"; break;
				case 12:$item = "club"; break;
				case 13:$item = "polearm"; break;
				case 14:$item = "flail"; break;
				case 15:$item = "arrows [" . mt_rand(2,12). "ea]"; break;
				case 16:$item = "sling stones [" . mt_rand(1,10). "ea]"; break;
				case 17:$item = "darts [" . mt_rand(2,8). "ea]"; break;
				case 18:$item = "bolts [" . mt_rand(2,12). "ea]"; break;
				case 19:$item = "javelin"; break;
				case 20:$item = "short sword"; $msw = 11; break;
				case 21:$item = "two-handed sword"; $msw = 11; break;
				case 22:$item = "bastard sword"; $msw = 11; break;
				case 23:$item = "long sword"; $msw = 11; break;
				case 24:$item = "long sword"; $msw = 11; break;
				case 25:$item = "long sword"; $msw = 11; break;
				case 26:$item = "short sword"; $msw = 11; break;
				case 27:$item = "two-handed sword"; $msw = 11; break;
				case 28:$item = "bastard sword"; $msw = 11; break;
				case 29:$item = "long sword"; $msw = 11; break;
				case 30:$item = "long sword"; $msw = 11; break;
				case 31:$item = "long sword"; $msw = 11; break;
			}
			switch (mt_rand(0,5))
			{
				case 0:	$bonus = "special"; break;
				case 1:	$bonus = "cursed"; break;
				case 2:	$bonus = "+1"; break;
				case 3:	$bonus = "+2"; break;
				case 4:	$bonus = "+3"; break;
				case 5:	$bonus = "extra"; break;
			}
			if ($bonus == "special")
			{
				switch (mt_rand(0,$msw))
				{
					case 0:	$item = $item . " +1 (destroys undead)"; break;
					case 1:	$item = $item . " +1 (with an extra attack)"; break;
					case 2:	$item = $item . " +1 (will return to hand if dropped or thrown)"; break;
					case 3:	$item = $item . " +1 [+2 vs. " . slayerType(weapon) . "]"; break;
					case 4:	$item = $item . " +1 [+4 vs. " . slayerType(weapon) . "]"; break;
					case 5:	$item = $item . " +2 [+3 vs. " . slayerType(weapon) . "]"; break;
					case 6:	$item = $item . " +4"; break;
					case 7:	$item = $item . " +5"; break;
					case 8:	$item = $item . " (flaming)"; break;
					case 9:	$item = $item . " (freezing)"; break;
					case 10:$item = $item . " (dancing)"; break;
					case 11: include("smart_swords.php"); break;
				}
			}
			else if ($bonus == "extra")
			{
				switch (mt_rand(0,3))
				{
					case 0:	$item = $item . " +1 to hit, +2 damage"; break;
					case 1:	$item = $item . " +1 (sheds light in a 15` radius)"; break;
					case 2:	$item = $item . " +1 (sheds light in a 30` radius)"; break;
					case 3:	$item = $item . " +1 [+4 damage vs. " . slayerType(weapon) . "]"; break;
				}
			}
			else if ($bonus == "cursed")
			{
				switch (mt_rand(0,7))
				{
					case 0:	$item = "cursed " . $item . " -1"; break;
					case 1:	$item = "cursed " . $item . " -1"; break;
					case 2:	$item = "cursed " . $item . " -2"; break;
					case 3:	$item = "cursed " . $item . " -2"; break;
					case 4:	$item = "cursed " . $item . " -3"; break;
					case 5:	$item = "cursed " . $item . " (attracts missiles fired from anyone at +1 to hit)"; break;
					case 6:	$item = "cursed " . $item . " (causes them to run away from combat)"; break;
					case 7:	$item = "cursed " . $item . " (causes them to charge into combat)"; break;
				}
			}
			else {$item = $item . " " . $bonus . "";}
		}

		else if ($magic_item == "potion") ///////////////////////////////////////////////////
		{
			$table1 = mt_rand(1,100);
			if ($table1 > 75){$item = "Potion of Healing";}
			else if ($table1 > 64){$item = "Potion of Extra Healing";}
			else if ($table1 > 61){$item = "Potion of Undead Control";}
			else if ($table1 > 58){$item = "Potion of Treasure Finding";}
			else if ($table1 > 55){$item = "Potion of Slipperiness";}
			else if ($table1 > 48){$item = "Bottle of Poison";}
			else if ($table1 > 45){$item = "Potion of Plant Control";}
			else if ($table1 > 42){$item = "Potion of Levitation";}
			else if ($table1 > 39){$item = "Potion of Invulnerability";}
			else if ($table1 > 36){$item = "Potion of Invisibility";}
			else if ($table1 > 33){$item = "Potion of Heroism";}
			else if ($table1 > 30){$item = "Potion of Growth";}
			else if ($table1 > 27){$item = "Potion of Giant Strength";}
			else if ($table1 > 25){$item = "Potion of Gaseous Form";}
			else if ($table1 > 24){$item = "Potion of Frozen Concoction";}
			else if ($table1 > 21){$item = "Potion of Flying";}
			else if ($table1 > 18){$item = "Potion of Fire Resistance";}
			else if ($table1 > 15){$item = "Potion of Ethereality";}
			else if ($table1 > 12){$item = "Potion of Dragon Control";}
			else if ($table1 > 9){$item = "Potion of Diminution";}
			else if ($table1 > 6){$item = "Potion of Clairvoyance";}
			else if ($table1 > 3){$item = "Potion of Clairaudience";}
			else {$item = "Potion of Animal Control";}
		}

		else if ($magic_item == "ring") ///////////////////////////////////////////////////
		{
			if (mt_rand(1,4) > 1)
			{
				switch (mt_rand(0,5))
				{
					case 0:	$item = "ring of fire resistance"; break;
					case 1:	$item = "ring of invisibility"; break;
					case 2:	$item = "ring of mammal control"; break;
					case 3:	$item = "ring of poison resistance"; break;
					case 4:	$item = "ring of protection +1"; break;
					case 5:	$item = "ring of protection +2"; break;
				}
			}
			else
			{
				switch (mt_rand(0,9))
				{
					case 0:	$item = "ring of djinni summoning"; break;
					case 1:	$item = "ring of human control"; break;
					case 2:	$item = "ring of regeneration"; break;
					case 3:	$item = "ring of shooting stars"; break;
					case 4:	$item = "ring of magic-user spell storing"; break;
					case 5:	$item = "ring of cleric spell storing"; break;
					case 6:	$item = "ring of spell turning"; break;
					case 7:	$item = "ring of telekinesis"; break;
					case 8:	$item = "ring of three wishes"; break;
					case 9:	$item = "ring of x-ray vision"; break;
				}
			}
		}

		else if ($magic_item == "wand") ///////////////////////////////////////////////////
		{
			$pickme = mt_rand(1,10);
			if ($pickme > 4)
			{
				switch (mt_rand(0,2))
				{
					case 0:	$item = "wand (" . gameSpellChooser($game,1,'') . ") with 10 charges"; break;
					case 1:	$item = "wand (" . gameSpellChooser($game,2,'') . ") with 5 charges"; break;
					case 2:	$item = "wand (" . gameSpellChooser($game,3,'') . ") with 2 charges"; break;
				}
			}
			else if ($pickme > 2)
			{
				switch (mt_rand(0,9))
				{
					case 0:	$item = "wand (" . gameSpellChooser($game,3,'') . ") with 10 charges"; break;
					case 1:	$item = "wand (" . gameSpellChooser($game,4,'') . ") with 10 charges"; break;
					case 2:	$item = "wand of cold"; break;
					case 3:	$item = "wand of enemy detection"; break;
					case 4:	$item = "wand of magic detection"; break;
					case 5:	$item = "wand of metal detection"; break;
					case 6:	$item = "wand of traps and secret door detection"; break;
					case 7:	$item = "wand of fear"; break;
					case 8:	$item = "wand of paralyzing"; break;
					case 9:	$item = "wand of polymorph"; break;
				}
			}
			else
			{
				switch (mt_rand(0,9))
				{
					case 0:	$item = "staff of absorption"; break;
					case 1:	$item = "staff of beguiling"; break;
					case 2:	$item = "staff of command"; break;
					case 3:	$item = "staff of healing"; break;
					case 4:	$item = "staff of power"; break;
					case 5:	$item = "staff of resurrection"; break;
					case 6:	$item = "staff of the snake"; break;
					case 7:	$item = "staff of striking"; break;
					case 8:	$item = "staff of withering"; break;
					case 9:	$item = "staff of wizardry"; break;
				}
			}
		}

		else if ($magic_item == "scroll") ///////////////////////////////////////////////////
		{
			$table1 = mt_rand(1,20);
			if ($table1 > 19){$item = "cursed";}
			else if ($table1 > 12){$item = "protection";}
			else {$item = "spell";}

			if ($item == "spell")
			{
				$item = "scroll (" . gameSpellChooser($game,mt_rand(1,20),'') . ")";
			}
			else if ($item == "protection")
			{
				$table2 = mt_rand(1,8);
				if ($table2 == 1){$bonus = "Demons";}
				else if ($table2 == 2){$bonus = "Drowning";}
				else if ($table2 == 3){$bonus = "Elementals";}
				else if ($table2 == 4){$bonus = "Magic";}
				else if ($table2 == 5){$bonus = "Metal";}
				else if ($table2 == 6){$bonus = "Poison";}
				else if ($table2 == 7){$bonus = "Undead";}
				else {$bonus = "Were-Creatures";}

				$item = "Protection From " . $bonus . " Scroll";
			}
			else if (mt_rand(1,100) == 1){$item = mapMaker(997,$game);}
			else
			{
				switch (mt_rand(0,19))
				{
					case 0:	$curse = "Blindness (3d6 turns)."; break;
					case 1:	$curse = "Causes an aversion: roll 1d6. The character gains strong aversion to: (1) Swords, (2) Spiders, (3) Armor, (4) Spell casting, (5) Bathing, (6) Being Underground."; break;
					case 2:	$curse = "Confusion. Character acts randomly."; break;
					case 3:	$curse = "Despondency (1d6 days duration). The character will refuse to go anywhere, as there is simply no point to it."; break;
					case 4:	$curse = "Dimensional Vortex. The character is physically sucked up into the scroll, appearing as a new word on the page until rescued by a remove curse spell."; break;
					case 5:	$curse = "Hallucinations (3d6 turns). The exact nature of the hallucination varies, but in general the character will either begin casting spells and/or attacking nearby people, or will remain fascinated by the colors, unwilling to move."; break;
					case 6:	$curse = "Instant Death."; break;
					case 7:	$curse = "Levitation. The character levitates one inch off the ground, and cannot get back down."; break;
					case 8:	$curse = "Lose 1d10x100 experience points."; break;
					case 9:	$curse = "Lose one point of a randomly-determined ability score."; break;
					case 10:$curse = "Magically adhesive scroll."; break;
					case 11:$curse = "Obedience (3d6 turns). The character does what anyone suggests."; break;
					case 12:$curse = "Paralysis (3d6 turns)."; break;
					case 13:$curse = "Paralysis: Everyone in a radius of 20 feet must make a saving throw or be paralyzed for 3d6 turns with the exception of the reader of the scroll, who is unaffected."; break;
					case 14:$curse = "Permanent diminution in size. Some of these reduce the reader to half size (50%) and the rest reduce the reader to 6 inches tall."; break;
					case 15:$curse = "Polymorph: roll 1d6. The character turns into (1) pig, (2) a mouse, (3) a flamingo, (4) a talking parrot, (5) a dog, (6) a water buffalo."; break;
					case 16:$curse = "Sleep (until curse is removed). In some cases, magical sleep can be broken by a kiss. Otherwise the curse can only be removed by magic."; break;
					case 17:$curse = "Smell. The character smells foul for 1d8 days."; break;
					case 18:$curse = "Turned to Stone."; break;
					case 19:$curse = "Uncontrollable sneezing (3d6 turns). The reader is likely to attract wandering monsters, especially those that prey upon the weak."; break;
				}
				if (mt_rand(1,4) == 1){$item = "Cursed Scroll (" . curseType(mt_rand(1,20),reader,item,$game) . ")";}
				else {$item = "Cursed Scroll (" . $curse . ")";}
			}
		}

		else ///////////////////////////////////////////////////////////////////////////////////
		{
			$table1 = mt_rand(1,6);
			if ($table1 > 5){$section = "rare";}
			else if ($table1 > 3){$section = "uncommon";}
			else {$section = "common";}

			if ($section == "common")
			{
				switch (mt_rand(0,21))
				{
					case 0: $item = "Arrow of Direction"; break;
					case 1: $item = "Bag of Holding"; break;
					case 2: $item = "Boots of Elvenkind"; break;
					case 3: $item = "Boots of Speed"; break;
					case 4: $item = "Boots of Leaping"; break;
					case 5: $item = "Bracers of Defense (AC 6[13])"; break;
					case 6: $item = "Chime of Opening"; break;
					case 7: $item = "Cloak of Elvenkind"; break;
					case 8: $item = "Cloak of Protection +1"; break;
					case 9: $item = "Cursed Item"; break;
					case 10: $item = "Decanter of Endless Water"; break;
					case 11: $item = "Dust of Appearance"; break;
					case 12: $item = "Dust of Disappearance"; break;
					case 13: $item = "Dust of Sneezing and Choking"; break;
					case 14: $item = "Gauntlets of Swimming and Climbing "; break;
					case 15: $item = "Horseshoes of Speed"; break;
					case 16: $item = "Luckstone"; break;
					case 17: $item = "Manual of Beneficial Exercise"; break;
					case 18: $item = "Pipes of the Sewers"; break;
					case 19: $item = "Rope of Climbing"; break;
					case 20: $item = "Rope of Entanglement"; break;
					case 21: $item = "Spade of Excavation"; break;
				}
			}
			else if ($section == "uncommon")
			{
				switch (mt_rand(0,21))
				{
					case 0: $item = "Amulet Against Scrying"; break;
					case 1: $item = "Boots of Flying"; break;
					case 2: $item = "Bracers of Defense (AC 4[15])"; break;
					case 3: $item = "Bracers of Defense (AC 2[17])"; break;
					case 4: $item = "Carpet of Flying"; break;
					case 5: $item = "Cloak of Displacement"; break;
					case 6: $item = "Cloak of Protection +2"; break;
					case 7: $item = "Cloak of Protection +3"; break;
					case 8: $item = "Deck of Many Things"; break;
					case 9: $item = "Figurine of the Onyx Dog"; break;
					case 10: $item = "Gauntlets of Ogre Power"; break;
					case 11: $item = "Helm of Reading Magic and Languages"; break;
					case 12: $item = "Portable Hole"; break;
					case 13: $item = "Bronze Horn of Valhalla"; break;
					case 14: $item = "Silver Horn of Valhalla"; break;
					case 15: $item = "Jug of Alchemy"; break;
					case 16: $item = "Manual of Quickness"; break;
					case 17: $item = "Medallion of ESP"; break;
					case 18: $item = "Mirror of Mental Scrying"; break;
					case 19: $item = "Robe of Blending"; break;
					case 20: $item = "Robe of Eyes"; break;
					case 21: $item = "Robe of Wizardry"; break;
				}
			}
			else
			{
				switch (mt_rand(0,3))
				{
					case 0: $rock = "Bowl"; break;
					case 1: $rock = "Censer"; break;
					case 2: $rock = "Brazier"; break;
					case 3: $rock = "Stone"; break;
				}
				switch (mt_rand(0,19))
				{
					case 0: $item = "Amulet of Demon Control"; break;
					case 1: $item = "Beaker of Potions"; break;
					case 2: $item = $rock . " of Controlling Elementals"; break;
					case 3: $item = "Crystal Ball"; break;
					case 4: $item = "Efreeti Bottle"; break;
					case 5: $item = "Figurine of the Golden Lion"; break;
					case 6: $item = "Gauntlets of Dexterity"; break;
					case 7: $item = "Gem of Seeing"; break;
					case 8: $item = "Girdle of Giant Strength"; break;
					case 9: $item = "Helm of Fiery Brilliance"; break;
					case 10: $item = "Helm of Teleportation"; break;
					case 11: $item = "Horn of Blasting"; break;
					case 12: $item = "Iron Horn of Valhalla"; break;
					case 13: $item = "Lenses of Charming"; break;
					case 14: $item = "Magical Libram"; break;
					case 15: $item = "Manual of Golems"; break;
					case 16: $item = "Manual of Intelligence"; break;
					case 17: $item = "Manual of Wisdom"; break;
					case 18: $item = "Necklace of Firebaubles"; break;
					case 19: $item = "Scarab of Insanity"; break;
				}
			}
			if ($item == "Cursed Item")
			{
				switch (mt_rand(0,9))
				{
					case 0: $item = "Bag of Devouring"; break;
					case 1: $item = "Censer of Hostile Elementals"; break;
					case 2: $item = "Cloak of Poison"; break;
					case 3: $item = "Crystal Ball of Suggestion"; break;
					case 4: $item = "Dancing Boots"; break;
					case 5: $item = "Flask of Stoppered Curses"; break;
					case 6: $item = "Horn of Collapse"; break;
					case 7: $item = "Medallion of Projecting Thoughts"; break;
					case 8: $item = "Mirror of Opposition"; break;
					case 9: $item = "Robe of Feeblemindedness"; break;
				}
			}
		}
	}

/////////////////////////// END OF THE SWORDS & WIZARDRY SECTION /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	else if ($game == "Swords & Six-Siders") /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		// CHOOSE A CATEGORY
		$category = mt_rand(1,6);
		if ($category == 1){$magic_item = "weapon";}
		else if ($category == 2){$magic_item = "armor";}
		else if ($category == 3){$magic_item = "potion";}
		else if ($category == 4){$magic_item = "scroll";}
		else if ($category == 5){$magic_item = "wand";}
		else {$magic_item = "magic";}

		if ($varb == 1){$magic_item = "potion";}

		if ($magic_item == "weapon") ///////////////////////////////////////////////////
		{
			$sx_type = "sword";
			$bonus = "";
			$spell_power = "";
			$spell_1 = "";
			$spell_2 = "";
			$spell_3 = "";

			if ( mt_rand(1,6) == 6 ){ $sx_type="intellect"; }
			switch (mt_rand(0,2))
			{
				case 0:	$item = "short sword"; break;
				case 1:	$item = "sword"; break;
				case 2:	$item = "two-handed sword"; break;
			}

			switch (mt_rand(1,6))
			{
				case 4: $sx_type = "range";
					switch (mt_rand(0,4))
					{
						case 0:	$item = "sling"; break;
						case 1:	$item = "dart"; break;
						case 2:	$item = "short bow"; break;
						case 3:	$item = "crossbow"; break;
						case 4:	$item = "long bow"; break;
					}
					break;
				case 5: case 6: $sx_type = "weapon";
					switch (mt_rand(0,11))
					{
						case 0:		$item = "hand axe"; break;
						case 1:		$item = "club"; break;
						case 2:		$item = "dagger"; break;
						case 3:		$item = "short spear"; break;
						case 4:		$item = "battle axe"; break;
						case 5:		$item = "war hammer"; break;
						case 6:		$item = "mace"; break;
						case 7:		$item = "spear"; break;
						case 8:		$item = "staff"; break;
						case 9:		$item = "great axe"; break;
						case 10:	$item = "great maul"; break;
						case 11:	$item = "pole arm"; break;
					}
					break;
			}

			if ( $item == "short bow" || $item == "crossbow" || $item == "long bow" )
			{
				switch (mt_rand(1,7))
				{
					case 1:	case 2:	case 3:	case 4:	$bonus = "+1 to hit"; break;
					case 5:	case 6:	$bonus = "+2 to hit"; break;
					case 7:	$bonus = "+3 to hit"; break;
				}
			}
			else if ( $sx_type == "weapon" )
			{
				switch (mt_rand(1,7))
				{
					case 1:	case 2:	case 3:	case 4:	$bonus = "+1 to dmg"; break;
					case 5:	case 6:	$bonus = "+2 to dmg"; break;
					case 7:	$bonus = "+3 to dmg"; break;
				}
			}
			else if ( $sx_type="intellect" )
			{
				$spell_power = " (casts " . strtolower(gameSpellChooser($game,mt_rand(1,6),wizard)) . " once per day)";
				if ( mt_rand(1,10) == 1 ){ $spell_power = " (casts " . strtolower(gameSpellChooser($game,mt_rand(1,6),wizard)) . " twice per day)"; }
				if ( mt_rand(1,40) == 1 ){ $spell_power = " (vorpal)"; }
				if ( mt_rand(1,40) == 1 ){ $spell_power = " (dancing)"; }

				switch (mt_rand(1,6))
				{
					case 1:	case 2:	$bonus = "+1 dmg, +3 dmg against " . slayerTypeSX(); break;
					case 3:	$bonus = "+1 dmg " . $spell_power; break;
					case 4:	$bonus = "+2 dmg " . $spell_power; break;
					case 5:	$bonus = "+1 dmg, +3 dmg against " . slayerTypeSX(); $sx_type = "powerful"; break;
					case 6:	$bonus = "+2 dmg, +3 dmg against " . slayerTypeSX(); $sx_type = "powerful"; break;
				}

				if ( $sx_type == "powerful" )
				{
					$item = "intelligent " . $item;
					switch (mt_rand(1,6))
					{
						case 1:	case 2:	case 3:	$powers = 1;	$pwctot = 1;	break;
						case 4:	case 5:			$powers = 2;	$pwctot = 2;	break;
						case 6:					$powers = 3;	$pwctot = 3;	break;
					}
					while ( $powers > 0 ) :

						if ( $no_change_1 != 1 ){ $spell_1 = strtolower(gameSpellChooser($game,mt_rand(1,6),wizard)); }
						if ( $no_change_2 != 1 ){ $spell_2 = strtolower(gameSpellChooser($game,mt_rand(1,6),wizard)); }
						if ( $no_change_3 != 1 ){ $spell_3 = strtolower(gameSpellChooser($game,mt_rand(1,6),wizard)); }

						if ( $powers == 1 ){ $magicsx = $spell_1; }
						if ( $powers == 2 ){ $magicsx = $spell_2; }
						if ( $powers == 3 ){ $magicsx = $spell_3; }

						if ( $pwctot == 3 && ($spell_1 == $spell_2 || $spell_1 == $spell_3 || $spell_2 == $spell_3) ){}
						else if ( $pwctot == 2 && $spell_1 == $spell_2 ){}
						else
						{
							if ( $powers == 1 ){ $no_change_1 = 1; }
							if ( $powers == 2 ){ $no_change_2 = 1; }
							if ( $powers == 3 ){ $no_change_3 = 1; }
							$powers = $powers - 1;
							if (mt_rand(1,3) == 1){ $timez = "twice"; } else { $timez = "once"; }
							$bonus = $bonus . " (casts " . $magicsx . " " . $timez . " per day)";
						}

					endwhile;
				}
			}

			$item = $item . " " . $bonus;
		}
		else if ($magic_item == "armor") ///////////////////////////////////////////////////
		{
			$sizeup = "human sized";
			switch (mt_rand(1,18))
			{
				case 1:	case 2:	case 3:	case 4:	$sizeup = "elf sized"; break;
				case 5:	$sizeup = "dwarf sized"; break;
				case 6:	$sizeup = "halfling sized"; break;
			}

			switch (mt_rand(1,6))
			{
				case 1:	$armorsz = "light leather armor "; break;
				case 2:	$armorsz = "light studded leather armor "; break;
				case 3:	$armorsz = "medium chain mail armor "; break;
				case 4:	$armorsz = "medium ring mail armor "; break;
				case 5:	$armorsz = "heavy splint mail armor "; break;
				case 6:	$armorsz = "heavy plate mail armor "; break;
			}

			switch (mt_rand(1,5))
			{
				case 1: $protez = "cold"; break;
				case 2:	$protez = "fire"; break;
				case 3:	$protez = "acid"; break;
				case 4: $protez = "electricity"; break;
				case 5:	$protez = "magic"; break;
			}

			$powersz = "light weight";
			switch (mt_rand(1,30))
			{
				case 1:		$powersz = "+" . mt_rand(1,2) . " DR against " . slayerTypeSX(); break;
				case 2:		$powersz = "+" . mt_rand(1,2) . " DR against " . $protez; break;
				case 3:		$powersz = "+" . mt_rand(1,2) . " to hide in shadows"; break;
				case 4:		$powersz = "+" . mt_rand(1,2) . " to saves"; break;
				case 5:		$powersz = "can freely swim"; break;
				case 6:		$powersz = "can breath underwater"; break;
				case 7:		$powersz = "+1 to reaction rolls"; break;
				case 8:		$powersz = "+" . mt_rand(1,2) . " to move silent"; break;
				case 9:		$powersz = "+" . mt_rand(1,2) . " to climb"; break;
				case 10:	$powersz = "can turn invisible for " . mt_rand(2,10) . " rounds " . mt_rand(2,4) . " times a day"; break;
			}

			switch (mt_rand(1,6))
			{
				case 1:	case 2:
					$item = "shield +1";
					switch (mt_rand(1,6))
					{
						case 6:	$item = "shield +1, +2 against ranged"; break;
					}
					break;
				case 3:	$item = "helmet +1"; break;
				case 4:	case 5:	case 6:	$item = $armorsz . "(" . $sizeup . "&nbsp;/&nbsp;" . $powersz . ")";
				break;
			}
		}
		else if ($magic_item == "potion") ///////////////////////////////////////////////////
		{
			$liq_roll = mt_rand(1,6);
			switch (mt_rand(1,6))
			{
				case 1:	$item = "potion of healing"; break;
				case 2:
					if ( $liq_roll >=0 ){ $item = "potion of levitation"; }
					if ( $liq_roll >=3 ){ $item = "potion of gaseous form"; }
					if ( $liq_roll >=6 ){ $item = "potion of flying"; }
					break;
				case 3:
					if ( $liq_roll >=0 ){ $item = "potion of neutralize poison"; }
					if ( $liq_roll >=5 ){ $item = "potion of remove disease"; }
					break;
				case 4:
					if ( $liq_roll >=0 ){ $item = "potion of invisibility"; }
					if ( $liq_roll >=4 ){ $item = "potion of poison"; }
					break;
				case 5:
					if ( $liq_roll >=0 ){ $item = "potion of growth"; }
					if ( $liq_roll >=3 ){ $item = "potion of shrinking"; }
					if ( $liq_roll >=5 ){ $item = "potion of giant strength"; }
					break;
				case 6:
					if ( $liq_roll >=0 ){ $item = "potion of remove paralysis"; }
					if ( $liq_roll >=3 ){ $item = "potion of stone to flesh"; }
					if ( $liq_roll >=5 ){ $item = "potion of healing"; }
					break;
			}
		}
		else if ($magic_item == "scroll") ///////////////////////////////////////////////////
		{
			switch (mt_rand(1,6))
			{
				case 1:	case 2:	case 3:
						$item = "scroll (" . gameSpellChooser($game,mt_rand(1,6),'') . ")";
					break;
				case 4:	case 5:
						$item = mapMaker(997,$game);
					break;
				case 6:
						$item = "protection from " . slayerTypeSX() . " scroll";
						switch (mt_rand(0,14))
						{
							case 0:	$item = "protection from fire scroll"; break;
							case 1:	$item = "protection from cold scroll"; break;
							case 2:	$item = "protection from acid scroll"; break;
							case 3:	$item = "protection from magic scroll"; break;
							case 4:	$item = "protection from poison scroll"; break;
							case 5:	$item = "protection from curses scroll"; break;
							case 6:	$item = "protection from traps scroll"; break;
							case 7:	$item = "protection from electricity scroll"; break;
						}
					break;
			}
		}
		else if ($magic_item == "wand") ///////////////////////////////////////////////////
		{
			switch (mt_rand(1,6))
			{
				case 1:	case 2:
						switch (mt_rand(1,6))
						{
							case 1:	case 2:	$item = "ring of protection +1"; break;
							case 3:	$item = "ring of feather fall"; break;
							case 4:	$item = "ring of water walking"; break;
							case 5:	$item = "ring of fire resistance"; break;
							case 6:
								switch (mt_rand(1,6))
								{
									case 1:	case 2:	case 3:	$item = "ring of regeneration"; break;
									case 4:	case 5:	$item = "ring of x-ray vision"; break;
									case 6:	$item = "ring of three wishes"; break;
								}
							break;
						}
					break;
				case 3:	case 4:	case 5:
						switch (mt_rand(1,16))
						{
							case 1:		$item = "wand of detect magic"; break;
							case 2:		$item = "wand of detect traps"; break;
							case 3:		$item = "wand of detect secret doors"; break;
							case 4:		$item = "wand of detect poison"; break;
							case 5:		$item = "wand of light"; break;
							case 6:		$item = "wand of arcane portal"; break;
							case 7:		$item = "wand of charm person"; break;
							case 8:		$item = "wand of sleep"; break;
							case 9:		$item = "wand of magic eyebeam"; break;
							case 10:	$item = "wand of illusion"; break;
							case 11:	$item = "wand of locate object"; break;
							case 12:	$item = "wand of web"; break;
							case 13:	$item = "wand of dispel magic"; break;
							case 14:	$item = "wand of fireball"; break;
							case 15:	$item = "wand of lightning bolt"; break;
							case 16:	$item = "wand of stone turning"; break;
						}
					break;
				case 6:
						switch (mt_rand(1,16))
						{
							case 1:	case 2: case 3:		$item = "staff of healing"; break;
							case 4:	case 5: case 6:		$item = "staff of striking"; break;
							case 7:	case 8: case 9:		$item = "staff of snakes"; break;
							case 10: case 11: case 12:	$item = "staff of commanding"; break;
							case 13: case 14: case 15:	$item = "staff of power"; break;
							case 16:					$item = "staff of wizardry"; break;
						}
					break;
			}
		}
		else ///////////////////////////////////////////////////////////////////////////////////
		{
			switch (mt_rand(0,21))
			{
				case 0: $item = "bracers of AC +1"; break;
				case 1: $item = "helm of comprehend languages"; break;
				case 2: $item = "boots of elven kind"; break;
				case 3: $item = "helm of read magic"; break;
				case 4: $item = "cloak of elven kind"; break;
				case 5: $item = "boots of striding & leaping"; break;
				case 6: $item = "handy haversack"; break;
				case 7: $item = "folding boat"; break;
				case 8: $item = "rope of climbing"; break;
				case 9: $item = "boots of levitation"; break;
				case 10: $item = "cloak of resistance"; break;
				case 11: $item = "boots of speed"; break;
				case 12: $item = "broom of flying"; break;
				case 13: $item = "belt of giant strength"; break;
				case 14: $item = "horn of blasting"; break;
				case 15: $item = "scarab of protection"; break;
				case 16: $item = "carpet of flying"; break;
				case 17: $item = "crystal ball"; break;
				case 18: $item = "cloak of displacement"; break;
				case 19: $item = "helm of teleportation"; break;
				case 20: $item = "cloak of the bat"; break;
				case 21: $item = "efreeti bottle"; break;
				case 22: $item = "gauntlets of ogre power"; break;
				case 23: $item = "medallion of thoughts"; break;
			}
		}
	}

/////////////////////////// END OF THE SWORDS & SIX-SIDERS SECTION /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	else if ($game == "BD&D") ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		// CHOOSE A CATEGORY
		$category = mt_rand(1,100);
		if ($category < 21){$magic_item = "sword";}
		else if ($category < 31){$magic_item = "armor";}
		else if ($category < 41){$magic_item = "weapon";}
		else if ($category < 66){$magic_item = "potion";}
		else if ($category < 86){$magic_item = "scroll";}
		else if ($category < 91){$magic_item = "ring";}
		else if ($category < 96){$magic_item = "wand";}
		else {$magic_item = "misc";}

		$dice = mt_rand(1,100);

		if ($varb == 1){$magic_item = "potion";}

		if ($magic_item == "sword") ///////////////////////////////////////////////////
		{
			$swords = array('Short Sword', 'Sword', 'Two-Handed Sword'); $picked = $swords[array_rand($swords)];
			switch ($dice)
			{
				case ($dice >=1 && $dice <=40): $magic_relic = $picked . " +1"; include("smart_swords.php"); break;
				case ($dice >=41 && $dice <=46): $magic_relic = $picked . " +1, +2 vs. lycanthropes"; include("smart_swords.php"); break;
				case ($dice >=47 && $dice <=52): $magic_relic = $picked . " +1, +2 vs. spell users"; include("smart_swords.php"); break;
				case ($dice >=53 && $dice <=57): $magic_relic = $picked . " +1, +3 vs. undead"; include("smart_swords.php"); break;
				case ($dice >=58 && $dice <=62): $magic_relic = $picked . " +1, +3 vs. dragons"; include("smart_swords.php"); break;
				case ($dice >=63 && $dice <=67): $magic_relic = $picked . " +1, +3 vs. regenerating creatures"; include("smart_swords.php"); break;
				case ($dice >=68 && $dice <=72): $magic_relic = $picked . " +1, +3 vs. enchanted monsters"; include("smart_swords.php"); break;
				case ($dice >=73 && $dice <=80): $magic_relic = $picked . " +1, casts light on command 30` radius"; include("smart_swords.php"); break;
				case ($dice >=81 && $dice <=83): $magic_relic = $picked . " +1, locate objects"; include("smart_swords.php"); break;
				case ($dice >=84 && $dice <=87): $magic_relic = $picked . " +1, flames on command"; include("smart_swords.php"); break;
				case ($dice ==88): $magic_relic = $picked . " +1, drains life energy for 5-8 levels"; include("smart_swords.php"); break;
				case ($dice ==89): $magic_relic = $picked . " +1, wishes"; include("smart_swords.php"); break;
				case ($dice >=90 && $dice <=92): $magic_relic = $picked . " +2"; include("smart_swords.php"); break;
				case ($dice >=93 && $dice <=94): $magic_relic = $picked . " +2, charm person"; include("smart_swords.php"); break;
				case ($dice >=95 && $dice <=96): $magic_relic = $picked . " +3"; include("smart_swords.php"); break;
				case ($dice >=97 && $dice <=98): $magic_relic = $picked . " -1 cursed"; break;
				case ($dice >=99): $magic_relic = $picked . " -2 cursed"; break;
			}
		}
		else if ($magic_item == "armor") ///////////////////////////////////////////////////
		{
			$armors = array('Chain Mail', 'Leather', 'Plate Mail'); $picked = $armors[array_rand($armors)];
			switch ($dice)
			{
				case ($dice >=1 && $dice <=20): $magic_relic = "Shield +1"; break;
				case ($dice >=21 && $dice <=35): $magic_relic = $picked . " Armor +1"; break;
				case ($dice >=36 && $dice <=45): $magic_relic = $picked . " Armor +1 & Shield +1"; break;
				case ($dice >=46 && $dice <=55): $magic_relic = "Shield +2"; break;
				case ($dice >=56 && $dice <=60): $magic_relic = $picked . " Armor +2"; break;
				case ($dice >=61 && $dice <=65): $magic_relic = $picked . " Armor +2 & Shield +2"; break;
				case ($dice >=66 && $dice <=70): $magic_relic = "Shield +3"; break;
				case ($dice >=71 && $dice <=73): $magic_relic = $picked . " Armor +3"; break;
				case ($dice ==74): $magic_relic = $picked . " Armor +3 & Shield +3"; break;
				case ($dice >=75 && $dice <=80): $magic_relic = "Shield, Cursed -2"; break;
				case ($dice >=81 && $dice <=82): $magic_relic = $picked . " Armor, Cursed -2"; break;
				case ($dice >=83 && $dice <=85): $magic_relic = $picked . " Armor, Cursed -1"; break;
				case ($dice >=86 && $dice <=88): $magic_relic = "Shield, Cursed AC 9"; break;
				case ($dice >=89 && $dice <=90): $magic_relic = $picked . " Armor, Cursed AC9"; break;
				case ($dice >=91 && $dice <=93): $magic_relic = $picked . " Armor +2 & Shield +1"; break;
				case ($dice >=94 && $dice <=95): $magic_relic = $picked . " Armor +1 & Shield +2"; break;
				case ($dice ==96): $magic_relic = $picked . " Armor +1 & Shield +3"; break;
				case ($dice ==97): $magic_relic = $picked . " Armor +3 & Shield +1"; break;
				case ($dice ==98): $magic_relic = $picked . " Armor +3 & Shield +2"; break;
				case ($dice ==99): $magic_relic = $picked . " Armor +2 & Shield +3"; break;
				case ($dice >99): $magic_relic = $picked . " Armor, Cursed -2 & Shield +1"; break;
			}
		}
		else if ($magic_item == "weapon") ///////////////////////////////////////////////////
		{
			switch ($dice)
			{
				case ($dice >=1 && $dice <=10): $magic_relic = "Arrow +1 (" . mt_rand(2,12) . "ea)"; break;
				case ($dice >=11 && $dice <=12): $magic_relic = "Arrow +1 (" . mt_rand(3,30) . "ea)"; break;
				case ($dice >=13 && $dice <=18): $magic_relic = "Arrow +2 (" . mt_rand(1,6) . "ea)"; break;
				case ($dice >=19 && $dice <=28): $magic_relic = "Crossbow Bolt + 1 (" . mt_rand(2,12) . "ea)"; break;
				case ($dice >=29 && $dice <=30): $magic_relic = "Crossbow Bolt + 1 (" . mt_rand(3,30) . "ea)"; break;
				case ($dice >=31 && $dice <=37): $magic_relic = "Crossbow Bolt +2 (" . mt_rand(1,6) . "ea)"; break;
				case ($dice ==38): $magic_relic = "Long Bow +1"; break;
				case ($dice ==39): $magic_relic = "Short Bow +1"; break;
				case ($dice ==40): $magic_relic = "Crossbow +1"; break;
				case ($dice >=41 && $dice <=45): $magic_relic = "Hand Axe +1"; break;
				case ($dice >=46 && $dice <=49): $magic_relic = "Battle Axe +1"; break;
				case ($dice >=50 && $dice <=51): $magic_relic = "Hand Axe +2"; break;
				case ($dice == 52): $magic_relic = "Battle Axe +2"; break;
				case ($dice >=53 && $dice <=60): $magic_relic = "Mace +1"; break;
				case ($dice >=61 && $dice <=63): $magic_relic = "Mace +2"; break;
				case ($dice ==64): $magic_relic = "Mace +3"; break;
				case ($dice >=65 && $dice <=67): $magic_relic = "Dagger +1"; break;
				case ($dice ==68): $magic_relic = "Dagger +2, +3 vs. orcs/goblins/kobolds"; break;
				case ($dice >=69 && $dice <=75): $magic_relic = "War Hammer +1"; break;
				case ($dice >=76 && $dice <=80): $magic_relic = "War Hammer +2"; break;
				case ($dice ==81): $magic_relic = "War Hammer +3, returns if thrown by a dwarf"; break;
				case ($dice >=82 && $dice <=87): $magic_relic = "Sling +1"; break;
				case ($dice >=88 && $dice <=95): $magic_relic = "Spear +1"; break;
				case ($dice >=96 && $dice <=99): $magic_relic = "Spear +2"; break;
				case ($dice >99): $magic_relic = "Spear +3"; break;
			}
		}
		else if ($magic_item == "potion") ///////////////////////////////////////////////////
		{
			switch (mt_rand(0,5))
			{
				case 0: $dragon = "(White Dragon)"; $giant = "(Hill Giant)"; break;
				case 1: $dragon = "(Black Dragon)"; $giant = "(Stone Giant)"; break;
				case 2: $dragon = "(Green Dragon)"; $giant = "(Frost Giant)"; break;
				case 3: $dragon = "(Blue Dragon)"; $giant = "(Fire Giant)"; break;
				case 4: $dragon = "(Red Dragon)"; $giant = "(Cloud Giant)"; break;
				case 5: $dragon = "(Gold Dragon)"; $giant = "(Storm Giant)"; break;
			}
			switch ($dice)
			{
				case ($dice >=1 && $dice <=3): $magic_relic = "Potion of Clairaudience"; break;
				case ($dice >=4 && $dice <=7): $magic_relic = "Potion of Clairvoyance"; break;
				case ($dice >=8 && $dice <=10): $magic_relic = "Potion of Control Animal"; break;
				case ($dice >=11 && $dice <=13): $magic_relic = "Potion of Control Dragon " . $dragon; break;
				case ($dice >=14 && $dice <=16): $magic_relic = "Potion of Control Giant " . $giant; break;
				case ($dice >=17 && $dice <=19): $magic_relic = "Potion of Control Human"; break;
				case ($dice >=20 && $dice <=22): $magic_relic = "Potion of Control Plant"; break;
				case ($dice >=23 && $dice <=25): $magic_relic = "Potion of Control Undead"; break;
				case ($dice >=26 && $dice <=28): $magic_relic = "Potion of Diminution"; break;
				case ($dice >=29 && $dice <=35): $magic_relic = "Potion of Delusion"; break;
				case ($dice >=36 && $dice <=39): $magic_relic = "Potion of ESP"; break;
				case ($dice >=40 && $dice <=43): $magic_relic = "Potion of Fire Resistance"; break;
				case ($dice >=44 && $dice <=47): $magic_relic = "Potion of Flying"; break;
				case ($dice >=48 && $dice <=51): $magic_relic = "Potion of Gaseous Form"; break;
				case ($dice >=52 && $dice <=55): $magic_relic = "Potion of Giant Strength"; break;
				case ($dice >=56 && $dice <=59): $magic_relic = "Potion of Growth"; break;
				case ($dice >=60 && $dice <=63): $magic_relic = "Potion of Healing"; break;
				case ($dice >=64 && $dice <=68): $magic_relic = "Potion of Heroism"; break;
				case ($dice >=69 && $dice <=72): $magic_relic = "Potion of Invisibility"; break;
				case ($dice >=73 && $dice <=76): $magic_relic = "Potion of Invulnerability"; break;
				case ($dice >=77 && $dice <=80): $magic_relic = "Potion of Levitation"; break;
				case ($dice >=81 && $dice <=84): $magic_relic = "Potion of Longevity"; break;
				case ($dice >=85 && $dice <=86): $magic_relic = "Poison"; break;
				case ($dice >=87 && $dice <=89): $magic_relic = "Potion of Polymorph Self"; break;
				case ($dice >=90 && $dice <=97): $magic_relic = "Potion of Speed"; break;
				case ($dice >=98): $magic_relic = "Potion of Treasure Finding"; break;
			}
		}
		else if ($magic_item == "scroll") ///////////////////////////////////////////////////
		{
			switch ($dice)
			{
				case ($dice >= 1 && $dice <= 15): $scroll_picker = 1; $magic_relic = "Spell Scroll ("; break;
				case ($dice >= 16 && $dice <= 25): $scroll_picker = 2; $magic_relic = "Spell Scrolls 2 ("; break;
				case ($dice >= 26 && $dice <= 31): $scroll_picker = 3; $magic_relic = "Spell Scrolls 3 ("; break;
				case ($dice >= 32 && $dice <= 34): $scroll_picker = 5; $magic_relic = "Spell Scrolls 5 ("; break;
				case ($dice == 35): $scroll_picker = 7; $magic_relic = "Spell Scrolls 7 ("; break;
				case ($dice >= 36 && $dice <= 50): $magic_relic = "Cursed Scroll (" . curseType(mt_rand(1,10),reader,item,$game) . ")"; break;
				case ($dice >= 51 && $dice <= 60): $magic_relic = "Scroll of Protection from Lycanthropes"; break;
				case ($dice >= 61 && $dice <= 70): $magic_relic = "Scroll of Protection from Undead"; break;
				case ($dice >= 71 && $dice <= 80): $magic_relic = "Scroll of Protection from Elementals"; break;
				case ($dice >= 81 && $dice <= 95): $magic_relic = "Scroll of Protection from Magic"; break;
				case ($dice >= 96): $magic_relic = mapMaker(997,$game); break;
			}
			if ($scroll_picker > 0)
			{
				while ($scroll_picker > 0) :
					$written = $written . gameSpellChooser($game,mt_rand(1,20),'') . ", ";
					$scroll_picker = $scroll_picker - 1;
				endwhile;
				$magic_relic = $magic_relic . substr($written, 0, -2) . ")";
			}
		}
		else if ($magic_item == "ring") ///////////////////////////////////////////////////
		{
			switch ($dice)
			{
				case ($dice >=1 && $dice <=5): $magic_relic = "Ring of Control Animal"; break;
				case ($dice >=6 && $dice <=10): $magic_relic = "Ring of Control Human"; break;
				case ($dice >=11 && $dice <=16): $magic_relic = "Ring of Control Plant"; break;
				case ($dice >=17 && $dice <=26): $magic_relic = "Ring of Delusion"; break;
				case ($dice >=27 && $dice <=29): $magic_relic = "Ring of Djinni Summoning"; break;
				case ($dice >=30 && $dice <=39): $magic_relic = "Ring of Fire Resistance"; break;
				case ($dice >=40 && $dice <=50): $magic_relic = "Ring of Invisibility"; break;
				case ($dice >=51 && $dice <=65): $magic_relic = "Ring of Protection +1"; break;
				case ($dice >=66 && $dice <=70): $magic_relic = "Ring of Protection +1, 5` radius"; break;
				case ($dice >=71 && $dice <=72): $magic_relic = "Ring of Regeneration"; break;
				case ($dice >=73 && $dice <=74): $magic_relic = "Ring of Spell Storing"; break;
				case ($dice >=75 && $dice <=80): $magic_relic = "Ring of Spell Turning"; break;
				case ($dice >=81 && $dice <=82): $magic_relic = "Ring of Telekinesis"; break;
				case ($dice >=83 && $dice <=88): $magic_relic = "Ring of Water Walking"; break;
				case ($dice >=89 && $dice <=94): $magic_relic = "Ring of Weakness"; break;
				case ($dice >=95 && $dice <=96): $magic_relic = "Ring of Wishes (1-2)"; break;
				case ($dice ==97): $magic_relic = "Ring of Wishes (1-3)"; break;
				case ($dice ==98): $magic_relic = "Ring of Wishes (2-4)"; break;
				case ($dice >=99): $magic_relic = "Ring of X-Ray Vision"; break;
			}
		}
		else if ($magic_item == "wand") ///////////////////////////////////////////////////
		{
			switch ($dice)
			{
				case ($dice >=1 && $dice <=8): $magic_relic = "Rod of Cancellation {" . mt_rand(1,10) . " charges}"; break;
				case ($dice >=9 && $dice <=11): $magic_relic = "Staff of Commanding {" . mt_rand(3,30) . " charges}"; break;
				case ($dice >=12 && $dice <=21): $magic_relic = "Staff of Healing {" . mt_rand(3,30) . " charges}"; break;
				case ($dice >=22 && $dice <=23): $magic_relic = "Staff of Power {" . mt_rand(3,30) . " charges}"; break;
				case ($dice >=24 && $dice <=28): $magic_relic = "Snake Staff {" . mt_rand(3,30) . " charges}"; break;
				case ($dice >=29 && $dice <=30): $magic_relic = "Staff of Striking {" . mt_rand(3,30) . " charges}"; break;
				case ($dice >=31 && $dice <=34): $magic_relic = "Staff of Withering {" . mt_rand(3,30) . " charges}"; break;
				case ($dice ==35): $magic_relic = "Staff of Wizardry {" . mt_rand(3,30) . " charges}"; break;
				case ($dice >=36 && $dice <=40): $magic_relic = "Wand of Enemy Detection {" . mt_rand(2,20) . " charges}"; break;
				case ($dice >=41 && $dice <=45): $magic_relic = "Wand of Magic Detection {" . mt_rand(2,20) . " charges}"; break;
				case ($dice >=46 && $dice <=50): $magic_relic = "Wand of Metal Detection {" . mt_rand(2,20) . " charges}"; break;
				case ($dice >=51 && $dice <=55): $magic_relic = "Wand of Secret Door Detection {" . mt_rand(2,20) . " charges}"; break;
				case ($dice >=56 && $dice <=60): $magic_relic = "Wand of Trap Detection {" . mt_rand(2,20) . " charges}"; break;
				case ($dice >=61 && $dice <=65): $magic_relic = "Wand of Fear {" . mt_rand(2,20) . " charges}"; break;
				case ($dice >=66 && $dice <=70): $magic_relic = "Wand of Cold {" . mt_rand(2,20) . " charges}"; break;
				case ($dice >=71 && $dice <=75): $magic_relic = "Wand of Fire Balls {" . mt_rand(2,20) . " charges}"; break;
				case ($dice >=76 && $dice <=80): $magic_relic = "Wand of Illusion {" . mt_rand(2,20) . " charges}"; break;
				case ($dice >=81 && $dice <=85): $magic_relic = "Wand of Lightning Bolts {" . mt_rand(2,20) . " charges}"; break;
				case ($dice >=86 && $dice <=90): $magic_relic = "Wand of Negation {" . mt_rand(2,20) . " charges}"; break;
				case ($dice >=91 && $dice <=95): $magic_relic = "Wand of Paralyzation {" . mt_rand(2,20) . " charges}"; break;
				case ($dice >=96): $magic_relic = "Wand of Polymorph {" . mt_rand(2,20) . " charges}"; break;
			}
		}
		else ///// MISC ////////////////////////////////////////////////////////////////////////////
		{
			switch ($dice)
			{
				case ($dice >=1 && $dice <=3): $magic_relic = "Amulet vs. Crystal Ball and ESP"; break;
				case ($dice >=4 && $dice <=5): $magic_relic = "Bag of Devouring"; break;
				case ($dice >=6 && $dice <=11): $magic_relic = "Bag of Holding"; break;
				case ($dice >=12 && $dice <=16): $magic_relic = "Boots of Levitation"; break;
				case ($dice >=17 && $dice <=21): $magic_relic = "Boots of Speed"; break;
				case ($dice >=22 && $dice <=26): $magic_relic = "Boots of Traveling and Leaping"; break;
				case ($dice >=27 && $dice <=31): $magic_relic = "Broom of Flying"; break;
				case ($dice >=32 && $dice <=35): $magic_relic = "Crystal Ball"; break;
				case ($dice >=36 && $dice <=37): $magic_relic = "Crystal Ball with Clairaudience"; break;
				case ($dice ==38): $magic_relic = "Crystal Ball with ESP"; break;
				case ($dice ==39): $magic_relic = "Drums of Panic"; break;
				case ($dice ==40): $magic_relic = "Efreeti Bottle"; break;
				case ($dice >=41 && $dice <=42): $magic_relic = "Displacer Cloak"; break;
				case ($dice ==43): $magic_relic = "Bowl of Commanding Water Elementals"; break;
				case ($dice ==44): $magic_relic = "Brazier of Commanding Fire Elementals"; break;
				case ($dice ==45): $magic_relic = "Censer of Controlling Air Elementals"; break;
				case ($dice ==46): $magic_relic = "Stone of Controlling Earth Elementals"; break;
				case ($dice >=47 && $dice <=51): $magic_relic = "Elven Cloak"; break;
				case ($dice >=52 && $dice <=56): $magic_relic = "Elven Boots"; break;
				case ($dice ==57): $magic_relic = "Flying Carpet"; break;
				case ($dice >=58 && $dice <=64): $magic_relic = "Gauntlets of Ogre Power"; break;
				case ($dice >=65 && $dice <=66): $magic_relic = "Girdle of Giant Strength"; break;
				case ($dice >=67 && $dice <=77): $magic_relic = "Helm of Alignment Change"; break;
				case ($dice ==78): $magic_relic = "Helm of Telepathy"; break;
				case ($dice >=79 && $dice <=83): $magic_relic = "Helm of Reading Languages and Magic"; break;
				case ($dice ==84): $magic_relic = "Helm of Teleportation"; break;
				case ($dice ==85): $magic_relic = "Horn of Blasting"; break;
				case ($dice >=86 && $dice <=90): $magic_relic = "Medallion of ESP 30`"; break;
				case ($dice >=91 && $dice <=93): $magic_relic = "Medallion of ESP 90`"; break;
				case ($dice ==94): $magic_relic = "Mirror of Life Trapping"; break;
				case ($dice >=95 && $dice <=97): $magic_relic = "Rope of Climbing"; break;
				case ($dice >=98): $magic_relic = "Scarab of Protection"; break;
			}
		}
		$item = $magic_relic;
	}

/////////////////////////// END OF THE BASIC DUNGEONS & DRAGONS SECTION /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	return ucfirst($item);
}


?>
