<?php

function smartSword()
{
	$moral = 2;
	switch (mt_rand(0,11))
	{
		case 0:	$word = demonName() . " the demon";	$moral = 0;	break;
		case 1:	$word = dragonName() . " the dragon";			break;
		case 2:	$word = mageName() . " the wizard";			break;
		case 3:	$word = orcName() . " the orc";				break;
		case 4:	$word = elfName() . " the elf";				break;
		case 5:	$word = elfName() . " the dark elf";			break;
		case 6:	$word = dwarfName() . " the dwarf";			break;
		case 7:	$word = gnomeName() . " the gnome";			break;
		case 8:	$word = humanMaleName() . " the " . jobName();		break;
		case 9:	$word = humanFemaleName() . " the " . jobName();	break;
		case 10:$word = authorName() . " the " . jobName();		break;
		case 11:$word = genericName() . " the " . jobName();		break;
	}

	switch (mt_rand(0,$moral))
	{
		case 0:	$feel = "good";		break;
		case 1:	$feel = "neutral";	break;
		case 2:	$feel = "evil";		break;
	}

	switch (mt_rand(0,2))
	{
		case 0:	$span = "day";		break;
		case 1:	$span = "day";		break;
		case 2:	$span = "week";		break;
	}

	switch (mt_rand(0,5))
	{
		case 0:	$talk = "whispering";	break;
		case 1:	$talk = "speaking";	break;
		case 2:	$talk = "speaking";	break;
		case 3:	$talk = "shouting";	break;
		case 4:	$talk = "telepathy";	break;
		case 5:	$talk = "telepathy";	break;
	}

	switch (mt_rand(0,12))
	{
		case 0:	$power1 = "...it can find good or evil creatures " . (mt_rand(1,4)*5) ." feet away";	break;
		case 1:	$power1 = "...it can find precious metals " . (mt_rand(1,4)*5) ." feet away";		break;
		case 2:	$power1 = "...it can find moving rooms and walls " . (mt_rand(1,4)*5) ." feet away";	break;
		case 3:	$power1 = "...it can find passages that slope " . (mt_rand(1,4)*5) ." feet away";	break;
		case 4:	$power1 = "...it can find traps " . (mt_rand(1,4)*5) ." feet away";			break;
		case 5:	$power1 = "...it can find gems " . (mt_rand(1,4)*5) ." feet away";			break;
		case 6:	$power1 = "...it can find magic " . (mt_rand(1,4)*5) ." feet away";			break;
		case 7:	$power1 = "...it can find hidden doors " . (mt_rand(1,4)*5) ." feet away";		break;
		case 8:	$power1 = "...it can find invisibility " . (mt_rand(1,4)*5) ." feet away";		break;
		case 9:	$power1 = "...it can find an item " . mt_rand(4,12) . "0 feet away";			break;
		case 10:$power1 = "...it can find water " . (mt_rand(1,4)*5) ." feet away";			break;
		case 11:$power1 = "...it can find living creatures " . (mt_rand(1,4)*5) ." feet away";		break;
		case 12:$power1 = "...it can find non-living creatures " . (mt_rand(1,4)*5) ." feet away";	break;
	}

	switch (mt_rand(0,12))
	{
		case 0:	$power2 = "...it can also charm a creature " . mt_rand(2,4) . " times a " . $span . "";	break;
		case 1:	$power2 = "...it can also create an illusion for " . (mt_rand(1,6)*5) . " minutes, " . mt_rand(2,4) . " times a " . $span . "";	break;
		case 2:	$power2 = "...it can also allow the wielder to read minds for " . mt_rand(2,10) . " minutes, " . mt_rand(2,4) . " times a " . $span . "";	break;
		case 3:	$power2 = "...it can also allow the wielder to fly for 1 hour a " . $span . "";	break;
		case 4:	$power2 = "...it can also heal the wielder for " . (mt_rand(1,6)*5) . " life, " . mt_rand(2,4) . " times a " . $span . "";	break;
		case 5:	$power2 = "...it can also cast a strength spell " . mt_rand(2,4) . " times a " . $span . "";	break;
		case 6:	$power2 = "...it can also allow the wielder to use telekinesis " . mt_rand(2,4) . " times a " . $span . " with " . (mt_rand(1,5)*5) . "0 pounds";	break;
		case 7:	$power2 = "...it can also cast a teleport spell " . mt_rand(2,4) . " times a " . $span . "";	break;
		case 8:	$power2 = "...it can also allow the wielder to see through walls for " . mt_rand(2,10) . " minutes," . mt_rand(2,4) . " times a " . $span . "";	break;
		case 9:	$power2 = "...it can also allow the wielder to levitate for " . mt_rand(2,10) . " minutes, " . mt_rand(2,4) . " times a " . $span . "";	break;
		case 10:$power2 = "...it can also cast a clairaudience spell " . mt_rand(2,4) . " times a " . $span . "";	break;
		case 11:$power2 = "...it can also cast a clairvoyance spell " . mt_rand(2,4) . " times a " . $span . "";	break;
		case 12:$power2 = "...it can also cure a wielder of disease and poison " . mt_rand(2,4) . " times a " . $span . "";	break;
	}

	if (($feel == "good") && (mt_rand(1,100) > 60))
	{
		switch (mt_rand(0,10))
		{
			case 0:	$need = "...it needs to slay the darkest evil whenever encountered";	break;
			case 1:	$need = "...it needs to have about " . mt_rand(1,6) . "0% of obtained wealth given to charity";	break;
			case 2:	$need = "...it needs to slay evil wizards whenever encountered";	break;
			case 3:	$need = "...it needs to slay evil thieves whenever encountered";	break;
			case 4:	$need = "...it needs to slay evil assassins whenever encountered";	break;
			case 5:	$need = "...it needs to slay evil fighters whenever encountered";	break;
			case 6:	$need = "...it needs to slay evil clerics whenever encountered";	break;
			case 7:	$need = "...it needs to slay evil " . humanType() . " whenever encountered";	break;
			case 8:	$need = "...it needs to slay " . undeadType() . " whenever encountered";	break;
			case 9:	$need = "...it needs to slay " . giantType() . " whenever encountered";	break;
			case 10:$need = "...it needs to slay evil dragons whenever encountered";	break;
		}
	}
	else if (($feel == "evil") && (mt_rand(1,100) > 60))
	{
		switch (mt_rand(1,10))
		{
			case 1:	$need = "...it needs to slay the kindest and pure whenever encountered";	break;
			case 2:	$need = "...it needs to slay good wizards whenever encountered";	break;
			case 3:	$need = "...it needs to slay good druids whenever encountered";	break;
			case 4:	$need = "...it needs to slay knights or paladins whenever encountered";	break;
			case 5:	$need = "...it needs to slay good fighters whenever encountered";	break;
			case 6:	$need = "...it needs to slay good clerics whenever encountered";	break;
			case 7:	$need = "...it needs to slay " . humanType() . " whenever encountered";	break;
			case 8:	$need = "...it needs to slay " . undeadType() . " whenever encountered";	break;
			case 9:	$need = "...it needs to slay " . giantType() . " whenever encountered";	break;
			case 10:$need = "...it needs to slay good dragons whenever encountered";	break;
		}
	}
	if ($need != "")
	{
		switch (mt_rand(0,10))
		{
			case 0:	$orelse = "or else the wielder will become blind for " . mt_rand(2,12) . " rounds";	break;
			case 1:	$orelse = "or else the wielder will become confused for " . mt_rand(2,12) . " rounds";	break;
			case 2:	$orelse = "or else the wielder will become afraid of everything for " . mt_rand(2,12) . " rounds";	break;
			case 3:	$orelse = "or else the wielder will vanish forever";	break;
			case 4:	$orelse = "or else the wielder will have one of their magic items become disenchanted";	break;
			case 5:	$orelse = "or else the wielder will suffer from illness";	break;
			case 6:	$orelse = "or else the wielder will become insane for " . mt_rand(2,6) . " rounds";	break;
			case 7:	$orelse = "or else the wielder will be paralyzed for " . mt_rand(2,6) . " rounds";	break;
			case 8:	$orelse = "or else the wielder will turn to stone";	break;
			case 9:	$orelse = "or else the wielder will be unable to make a sound for " . mt_rand(2,6) . " rounds";	break;
			case 10:$orelse = "or else the wielder will become much slower for " . mt_rand(2,12) . " rounds";	break;
		}
		$urge = $need . " " . $orelse . " {it has a will of " . mt_rand(10,20) . " that the wielder may try to overpower with their own}";
	}

	$value = "**this weapon contains the spirit of " . $word . " who is " . $feel . " in alignment with a " . mt_rand(13,19) . " intelligence {they communicate with the wielder by " . $talk . "}" . $power1 . "" . $power2 . "" . $urge . "**";
	return $value;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function slayerTypeSX()
{
	switch (mt_rand(1,15))
	{
		case 1:		$bane = "animals"; break;
		case 2:		$bane = "beasts"; break;
		case 3:		$bane = "constructs"; break;
		case 4:		$bane = "dragons"; break;
		case 5:		$bane = "elementals"; break;
		case 6:		$bane = "feys"; break;
		case 7:		$bane = "giants"; break;
		case 8:		$bane = "humanoids"; break;
		case 9:		$bane = "insects"; break;
		case 10:	$bane = "monstrous creatures"; break;
		case 11:	$bane = "planar creatures"; break;
		case 12:	$bane = "plants"; break;
		case 13:	$bane = "reptiles"; break;
		case 14:	$bane = "slimes"; break;
		case 15:	$bane = "the undead"; break;
	}

	return $bane;
}

function slayerType($type)
{
	switch (mt_rand(0,29))
	{
		case 0:	$value = "lycanthropes";	if (mt_rand(1,100) > 50){$name = "were";} else {$name = "moon";}	break;
		case 1:	$value = "spell-casters";	if (mt_rand(1,100) > 50){$name = "wizard";} else if (mt_rand(1,100) > 50){$name = "sorcerer";} else {$name = "mage";}	break;
		case 2:	$value = "trolls";		$name = "troll";	break;
		case 3:	$value = "giants";		if (mt_rand(1,100) > 50){$name = "giant";} else if (mt_rand(1,100) > 50){$name = "titan";} else {$name = "cyclops";}	break;
		case 4:	$value = "dragons";		if (mt_rand(1,100) > 50){$name = "dragon";} else if (mt_rand(1,100) > 50){$name = "wyrm";} else {$name = "drake";}	break;
		case 5:	$value = "demons";		$name = "demon";	break;
		case 6:	$value = "devils";		$name = "devil";	break;
		case 7:	$value = "undead";		if (mt_rand(1,100) > 50){$name = "deathly";} else if (mt_rand(1,100) > 50){$name = "undead";} else {$name = "corpse";}	break;
		case 8:	$value = "golems";		$name = "golem";	break;
		case 9:	$value = "elementals";		$name = "elemental";	break;
		case 10:$value = "insects";		if (mt_rand(1,100) > 50){$name = "beetle";} else if (mt_rand(1,100) > 50){$name = "wasp";} else {$name = "scorpion";}	break;
		case 11:$value = "ogres";		$name = "ogre";		break;
		case 12:$value = "snakes";		if (mt_rand(1,100) > 50){$name = "serpent";} else {$name = "snake";}	break;
		case 13:$value = "lizards";		if (mt_rand(1,100) > 50){$name = "lizard";} else {$name = "reptile";}	break;
		case 14:$value = "canines";		if (mt_rand(1,100) > 50){$name = "wolf";} else {$name = "hound";}	break;
		case 15:$value = "felines";		if (mt_rand(1,100) > 50){$name = "lion";} else if (mt_rand(1,100) > 50){$name = "tiger";} else {$name = "panther";}	break;
		case 16:$value = "birds";		if (mt_rand(1,100) > 50){$name = "talon";} else if (mt_rand(1,100) > 50){$name = "avian";} else {$name = "bird";}	break;
		case 17:$value = "worms";		$name = "worm";		break;
		case 18:$value = "witches";		if (mt_rand(1,100) > 50){$name = "witch";} else {$name = "hag";}	break;
		case 19:$value = "sea creatures";	if (mt_rand(1,100) > 50){$name = "kraken";} else if (mt_rand(1,100) > 50){$name = "whale";} else {$name = "shark";}	break;
		case 20:$value = "spiders";		$name = "spider";	break;
		case 21:$value = "slimes";		if (mt_rand(1,100) > 50){$name = "ooze";} else if (mt_rand(1,100) > 50){$name = "slime";} else {$name = "gelatinous";}	break;
		case 22:$value = "feys";		if (mt_rand(1,100) > 50){$name = "pixie";} else if (mt_rand(1,100) > 50){$name = "centaur";} else {$name = "sprite";}	break;
		case 23:$value = "plants";		if (mt_rand(1,100) > 50){$name = "wood";} else if (mt_rand(1,100) > 50){$name = "plant";} else {$name = "fungus";}	break;
		case 24:$value = "magical beasts";	if (mt_rand(1,100) > 50){$name = "pegasus";} else if (mt_rand(1,100) > 50){$name = "medusa";} else {$name = "unicorn";}	break;
		case 25:$value = "frogs and toads";	if (mt_rand(1,100) > 50){$name = "toad";} else {$name = "frog";}	break;
		case 26:$value = "fire creatures";	if (mt_rand(1,100) > 50){$name = "fire";} else if (mt_rand(1,100) > 50){$name = "flame";} else {$name = "scorching";}	break;
		case 27:$value = "frost creatures";	if (mt_rand(1,100) > 50){$name = "cold";} else if (mt_rand(1,100) > 50){$name = "frost";} else {$name = "ice";}	break;
		case 28:$value = humanType();		if ($value == "dwarves"){$name = "dwarf";} else if ($value == "elves"){$name = "elf";} else {$name = substr($value, 0, -1);}	break;
		case 29:$value = humanType();		if ($value == "dwarves"){$name = "dwarf";} else if ($value == "elves"){$name = "elf";} else {$name = substr($value, 0, -1);}	break;
	}
	switch (mt_rand(0,10))
	{
		case 0:	$slay = "slayer";	break;
		case 1:	$slay = "bane";		break;
		case 2:	$slay = "demise";	break;
		case 3:	$slay = "scourge";	break;
		case 4:	$slay = "torment";	break;
		case 5:	$slay = "ruin";		break;
		case 6:	$slay = "destruction";	break;
		case 7:	$slay = "hunter";	break;
		case 8:	$slay = "stalker";	break;
		case 9:	$slay = "enforcer";	break;
		case 10:$slay = "avenger";	break;
	}
	switch (mt_rand(0,2))
	{
		case 0:	$protect = "defender";	break;
		case 1:	$protect = "protector";	break;
		case 2:	$protect = "guardian";	break;
	}

	if ($type == "armor"){ $slayme = $value . " (" . $name . " " . $protect . ")"; } else { $slayme = $value . " (" . $name . " " . $slay . ")"; }

	return $slayme;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function enchantedType($type)
{
	if ($type == "hilt"){$roll = 14;} else {$roll = 11;}
	switch (mt_rand(0,$roll))
	{
		case 0:	$value = "of good fortune (1 bonus to saves and " . mt_rand(2,5) . " wishes)";	break;
		case 1:	$value = "of death dealing (attack roll of 20 drains all life from opponent " . mt_rand(5,9) . " times)";	break;
		case 2:	$value = "of defending (a bonus of " . mt_rand(1,2) . " to saves and armor)";	break;
		case 3:	$value = "of bleeding (any hit on opponent cannot be healed or regenerated)";	break;
		case 4:	$value = "of life leech (attack roll of 20 drains " . mt_rand(2,8) . " life from opponent and heals the wielder)";	break;
		case 5:	$value = "of purity (only useable by priest and knights...giving +" . mt_rand(5,10) . " damage to undead opponents)";	break;
		case 6:	$value = "of holy power (only useable by priest and knights...giving +" . mt_rand(5,10) . " damage to vile opponents)";	break;
		case 7:	$value = "of speed (wielder always gets the first strike)";	break;
		case 8:	$value = "of demonic dread (only useable by the vile...giving +" . mt_rand(5,10) . " damage to kind opponents)";	break;
		case 9:	$value = "of fire (weapon burns and does an additional +" . mt_rand(2,6) . " fire damage)";	break;
		case 10:$value = "of frost (weapon is freezing to all but the wielder and does an additional +" . mt_rand(2,6) . " frost damage)";	break;
		case 11:$value = "of light (will light a " . mt_rand(2,6) . "0 foot area when wielded)";	break;
		case 12:$value = "of decapitation (attack roll of 20 cuts off an opponent`s head)";	break;
		case 13:$value = "of severing (attack roll of 20 cuts off an opponent`s limb)";	break;
		case 14:$value = "of singing (has a " . mt_rand(1,5) . " in 6 chance to sing at the start of a battle where it provides an additional +" . mt_rand(1,2) . " but also causes more wandering monster checks)";	break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function candleMagic($game,$level)
{
	if ($level > 0){} else {$level = mt_rand(1,20);}

	switch (mt_rand(0,4))
	{
		case 0:	$feel = "evil";			break;
		case 1:	$feel = "good";			break;
		case 2:	$feel = "fair";			break;
		case 3:	$feel = "dishonest";	break;
		case 4:	$feel = "honest";		break;
	}
	switch (mt_rand(0,5))
	{
		case 0:	$burn = "...the candle can only burn for an hour";							break;
		case 1:	$burn = "...the candle can only burn for " . mt_rand(2,24) . " hours";		break;
		case 2:	$burn = "...the candle can only burn for a day";							break;
		case 3:	$burn = "...the candle can only burn for " . mt_rand(2,30) . " days";		break;
		case 4:	$burn = "...the candle can only burn for " . mt_rand(5,50) . " minutes";	break;
		case 5:	$burn = "...the candle can burn forever";									break;
	}
	switch (mt_rand(0,20))
	{
		case 0:	$wards = "lycanthropes";	break;
		case 1: $wards = "spiders";			break;
		case 2:	$wards = "trolls";			break;
		case 3:	$wards = "giants";			break;
		case 4:	$wards = "dragons";			break;
		case 5:	$wards = "demons";			break;
		case 6:	$wards = "devils";			break;
		case 7:	$wards = "undead";			break;
		case 8:	$wards = "golems";			break;
		case 9:	$wards = "elementals";		break;
		case 10:$wards = "insects";			break;
		case 11:$wards = "ogres";			break;
		case 12:$wards = "snakes";			break;
		case 13:$wards = "lizards";			break;
		case 14:$wards = "canines";			break;
		case 15:$wards = "felines";			break;
		case 16:$wards = "birds";			break;
		case 17:$wards = "slimes";			break;
		case 18:$wards = "feys";			break;
		case 19:$wards = "magical beasts";	break;
		case 20:$wards = "frogs and toads";	break;
	}
	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
	{
		switch (mt_rand(0,6))
		{
			case 0:	$value = "those within " . (mt_rand(1,3)*5) . "' must speak the truth when asked questions unless they make an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . $burn;	break;
			case 1:	$value = "it will never burn down and will illuminate an area of " . mt_rand(1,3) . "0 feet with a " . beamColor(0) . " light";	break;
			case 2:	$value = "secret doors and compartments will be revealed if within its " . (mt_rand(1,3)*5) . "' glow" . $burn;	break;
			case 3:	if (mt_rand(1,4) > 1){$feel = "evil";} else {$feel = "good";} $value = "it will glow brighter when someone of " . $feel . " tendencies is within its " . (mt_rand(1,3)*5) . "' glow" . $burn;	break;
			case 4:	$value = $wards . " are warded off from its " . (mt_rand(1,3)*5) . "' glow" . $burn;	break;
			case 5:	$value = "it will warm a 20' area as though it was a campfire" . $burn;	break;
			case 6:	$value = "it will light up a " . (mt_rand(1,3)*5) . "' area that only the candle holder can see" . $burn;	break;
		}
	}
	else
	{
		switch (mt_rand(0,6))
		{
			case 0:	$value = "those within 5 feet must speak the truth when asked questions unless they save for spells" . $burn;	break;
			case 1:	$value = "it will never burn down and will illuminate an area of " . mt_rand(1,3) . "0 feet with a " . beamColor(0) . " light";	break;
			case 2:	$value = "secret doors and compartments will be revealed if within its " . (mt_rand(1,3)*5) . "' glow" . $burn;	break;
			case 3:	if (mt_rand(1,4) > 1){$feel = "evil";} else {$feel = "good";} $value = "it will glow brighter when someone of " . $feel . " tendencies is within its " . (mt_rand(1,3)*5) . "' glow" . $burn;	break;
			case 4:	$value = $wards . " are warded off from its " . (mt_rand(1,3)*5) . "' glow" . $burn;	break;
			case 5:	$value = "it will warm a 20' area as though it was a campfire" . $burn;	break;
			case 6:	$value = "it will light up a " . (mt_rand(1,3)*5) . "' area that only the candle holder can see" . $burn;	break;
		}
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function smartType($owner)
{
	$moral = 2;
	switch (mt_rand(0,11))
	{
		case 0:	$word = demonName() . " the demon";	$moral = 0;	break;
		case 1:	$word = dragonName() . " the dragon";			break;
		case 2:	$word = mageName() . " the wizard";			break;
		case 3:	$word = orcName() . " the orc";				break;
		case 4:	$word = elfName() . " the elf";				break;
		case 5:	$word = elfName() . " the dark elf";			break;
		case 6:	$word = dwarfName() . " the dwarf";			break;
		case 7:	$word = gnomeName() . " the gnome";			break;
		case 8:	$word = humanMaleName() . " the " . jobName();		break;
		case 9:	$word = humanFemaleName() . " the " . jobName();	break;
		case 10:$word = authorName() . " the " . jobName();		break;
		case 11:$word = genericName() . " the " . jobName();		break;
	}
	if ($owner != ""){$word = $owner . " the " . jobName(); $moral = 2;}
	switch (mt_rand(0,$moral))
	{
		case 0:	$feel = "kind";	break;
		case 1:	$feel = "fair";	break;
		case 2:	$feel = "vile";	break;
	}

	switch (mt_rand(0,5))
	{
		case 0:	$talk = "whispering";	break;
		case 1:	$talk = "speaking";	break;
		case 2:	$talk = "speaking";	break;
		case 3:	$talk = "shouting";	break;
		case 4:	$talk = "telepathy";	break;
		case 5:	$talk = "telepathy";	break;
	}

	switch (mt_rand(0,12))
	{
		case 0:	$power1 = "...it can find kind or vile creatures " . (mt_rand(1,4)*5) ." feet away";	break;
		case 1:	$power1 = "...it can find precious metals " . (mt_rand(1,4)*5) ." feet away";		break;
		case 2:	$power1 = "...it can find moving rooms and walls " . (mt_rand(1,4)*5) ." feet away";	break;
		case 3:	$power1 = "...it can find passages that slope " . (mt_rand(1,4)*5) ." feet away";	break;
		case 4:	$power1 = "...it can find traps " . (mt_rand(1,4)*5) ." feet away";			break;
		case 5:	$power1 = "...it can find gems " . (mt_rand(1,4)*5) ." feet away";			break;
		case 6:	$power1 = "...it can find magic " . (mt_rand(1,4)*5) ." feet away";			break;
		case 7:	$power1 = "...it can find hidden doors " . (mt_rand(1,4)*5) ." feet away";		break;
		case 8:	$power1 = "...it can find invisibility " . (mt_rand(1,4)*5) ." feet away";		break;
		case 9:	$power1 = "...it can find an item " . mt_rand(4,12) . "0 feet away";			break;
		case 10:$power1 = "...it can find water " . (mt_rand(1,4)*5) ." feet away";			break;
		case 11:$power1 = "...it can find living creatures " . (mt_rand(1,4)*5) ." feet away";		break;
		case 12:$power1 = "...it can find non-living creatures " . (mt_rand(1,4)*5) ." feet away";	break;
	}

	switch (mt_rand(0,12))
	{
		case 0:	$power2 = "...it can also charm a creature " . mt_rand(2,4) . " times a day";	break;
		case 1:	$power2 = "...it can also create an illusion for " . (mt_rand(1,6)*5) . " minutes, " . mt_rand(2,4) . " times a day";	break;
		case 2:	$power2 = "...it can also allow the wielder to read minds for " . mt_rand(2,10) . " minutes, " . mt_rand(2,4) . " times a day";	break;
		case 3:	$power2 = "...it can also allow the wielder to fly for 1 hour a day";	break;
		case 4:	$power2 = "...it can also heal the wielder for " . (mt_rand(1,6)*5) . " life, " . mt_rand(2,4) . " times a day";	break;
		case 5:	$power2 = "...it can also cast a strength spell " . mt_rand(2,4) . " times a day";	break;
		case 6:	$power2 = "...it can also allow the wielder to use telekinesis " . mt_rand(2,4) . " times a day with " . (mt_rand(1,5)*5) . "0 pounds";	break;
		case 7:	$power2 = "...it can also cast a teleport spell " . mt_rand(2,4) . " times a day";	break;
		case 8:	$power2 = "...it can also allow the wielder to see through walls for " . mt_rand(2,10) . " minutes," . mt_rand(2,4) . " times a day";	break;
		case 9:	$power2 = "...it can also allow the wielder to levitate for " . mt_rand(2,10) . " minutes, " . mt_rand(2,4) . " times a day";	break;
		case 10:$power2 = "...it can also cast a clairaudience spell " . mt_rand(2,4) . " times a day";	break;
		case 11:$power2 = "...it can also cast a clairvoyance spell " . mt_rand(2,4) . " times a day";	break;
		case 12:$power2 = "...it can also cure a wielder of disease and poison " . mt_rand(2,4) . " times a day";	break;
	}

	if (($feel == "kind") && (mt_rand(1,100) > 60))
	{
		switch (mt_rand(0,10))
		{
			case 0:	$need = "...it needs to slay the darkest evil whenever encountered";	break;
			case 1:	$need = "...it needs to have about " . mt_rand(1,6) . "0% of obtained wealth given to charity";	break;
			case 2:	$need = "...it needs to slay vile wizards whenever encountered";	break;
			case 3:	$need = "...it needs to slay vile thieves whenever encountered";	break;
			case 4:	$need = "...it needs to slay vile assassins whenever encountered";	break;
			case 5:	$need = "...it needs to slay vile warriors whenever encountered";	break;
			case 6:	$need = "...it needs to slay vile priests whenever encountered";	break;
			case 7:	$need = "...it needs to slay vile " . humanType() . " whenever encountered";	break;
			case 8:	$need = "...it needs to slay " . undeadType() . " whenever encountered";	break;
			case 9:	$need = "...it needs to slay " . giantType() . " whenever encountered";	break;
			case 10:$need = "...it needs to slay vile dragons whenever encountered";	break;
		}
	}
	else if (($feel == "vile") && (mt_rand(1,100) > 60))
	{
		switch (mt_rand(1,10))
		{
			case 1:	$need = "...it needs to slay the kindest and pure whenever encountered";	break;
			case 2:	$need = "...it needs to slay kind wizards whenever encountered";	break;
			case 3:	$need = "...it needs to slay kind druids whenever encountered";	break;
			case 4:	$need = "...it needs to slay knights or paladins whenever encountered";	break;
			case 5:	$need = "...it needs to slay kind warriors whenever encountered";	break;
			case 6:	$need = "...it needs to slay kind priests whenever encountered";	break;
			case 7:	$need = "...it needs to slay " . humanType() . " whenever encountered";	break;
			case 8:	$need = "...it needs to slay " . undeadType() . " whenever encountered";	break;
			case 9:	$need = "...it needs to slay " . giantType() . " whenever encountered";	break;
			case 10:$need = "...it needs to slay kind dragons whenever encountered";	break;
		}
	}
	if ($need != "")
	{
		switch (mt_rand(0,10))
		{
			case 0:	$orelse = "or else the wielder will become blind for " . mt_rand(2,12) . " rounds";	break;
			case 1:	$orelse = "or else the wielder will become confused for " . mt_rand(2,12) . " rounds";	break;
			case 2:	$orelse = "or else the wielder will become afraid of everything for " . mt_rand(2,12) . " rounds";	break;
			case 3:	$orelse = "or else the wielder will vanish forever";	break;
			case 4:	$orelse = "or else the wielder will have one of their magic items become disenchanted";	break;
			case 5:	$orelse = "or else the wielder will suffer from illness";	break;
			case 6:	$orelse = "or else the wielder will become insanse for " . mt_rand(2,6) . " rounds";	break;
			case 7:	$orelse = "or else the wielder will be paralyzed for " . mt_rand(2,6) . " rounds";	break;
			case 8:	$orelse = "or else the wielder will turn to stone";	break;
			case 9:	$orelse = "or else the wielder will be unable to make a sound for " . mt_rand(2,6) . " rounds";	break;
			case 10:$orelse = "or else the wielder will become much slower for " . mt_rand(2,12) . " rounds";	break;
		}
		$urge = $need . " " . $orelse . " {it has a will of " . mt_rand(10,20) . " that the wielder may try to overpower with their own}";
	}

	$value = "(this contains the spirit of " . $word . " who is " . $feel . " in morality with a " . mt_rand(13,20) . " intellect {they communicate with the wielder by " . $talk . "}" . $power1 . "" . $power2 . "" . $urge . ")";
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function tomePower($chance,$curst,$level,$cut,$game)
{
	$gem = ucwords(gemCreator($cut));
	if ($level > 0){} else {$level = mt_rand(1,20);}
	if ($level < 4){$spell = "lowest";}
	else if ($level < 7){$spell = "lower";}
	else if ($level < 10){$spell = "low";}
	else if ($level < 13){$spell = "medium";}
	else if ($level < 16){$spell = "high";}
	else if ($level < 19){$spell = "higher";}
	else {$spell = "highest";}

	if (($game != "Tunnels & Trolls 5th Edition") && ($game != "Tunnels & Trolls 7th Edition") && ($game != "Tunnels & Trolls Deluxe"))
	{
		if (($game == "BFRGP") || ($game == "Swords & Wizardry") || ($game == "BD&D") || ($game == "Labyrinth Lord" && $_SESSION["SESSION_ADD_AEC"] != 1))
		{
			switch (mt_rand(0,3))
			{
				case 0:	$job = "fighter";		$skill = "strength";		break;
				case 1:	$job = "cleric";		$skill = "wisdom";			break;
				case 2:	$job = "magic-user";	$skill = "intelligence";	break;
				case 3:	$job = "thief";			$skill = "dexterity";		break;
			}
		}
		else if ($game == "Swords & Six-Siders")
		{
			switch (mt_rand(0,3))
			{
				case 0:	$job = "fighter";		$skill = "strength";		break;
				case 1:	$job = "myrmidon";		$skill = "strength";		break;
				case 2:	$job = "wizard";		$skill = "intelligence";	break;
				case 3:	$job = "thief";			$skill = "dexterity";		break;
			}
		}
		else
		{
			switch (mt_rand(0,8))
			{
				case 0:	$job = "fighter";		$skill = "strength";		break;
				case 1:	$job = "paladin";		$skill = "strength";		break;
				case 2:	$job = "cleric";		$skill = "wisdom";			break;
				case 3:	$job = "magic-user";	$skill = "intelligence";	break;
				case 4:	$job = "ranger";		$skill = "strength";		break;
				case 5:	$job = "illusionist";	$skill = "intelligence";	break;
				case 6:	$job = "druid";			$skill = "wisdom";			break;
				case 7:	$job = "thief";			$skill = "dexterity";		break;
				case 8:	$job = "assassin";		$skill = "dexterity";		break;
			}
		}
		switch (mt_rand(0,3))
		{
			case 0:	$golem = "clay";	$maker = "cleric";	break;
			case 1:	$golem = "flesh";	$maker = "magic-user";	break;
			case 2:	$golem = "iron";	$maker = "magic-user";	break;
			case 3:	$golem = "stone";	$maker = "magic-user";	break;
		}
	}
	else 
	{
		switch (mt_rand(0,6))
		{
			case 0:	$golem = "clay";	$golval = (mt_rand(1,3)*5) . ",000 gold in clay";			break;
			case 1:	$golem = "diamond";	$golval = (mt_rand(16,20)*5) . ",000 gold in diamonds";		break;
			case 2:	$golem = "emerald";	$golval = (mt_rand(10,12)*5) . ",000 gold in emeralds";		break;
			case 3:	$golem = "flesh";	$golval = (mt_rand(1,2)*5) . ",000 gold in body parts";		break;
			case 4:	$golem = "iron";	$golval = (mt_rand(7,9)*5) . ",000 gold in iron";			break;
			case 5:	$golem = "ruby";	$golval = (mt_rand(13,15)*5) . ",000 gold in rubies";		break;
			case 6:	$golem = "stone";	$golval = (mt_rand(4,6)*5) . ",000 gold in stone";			break;
		}
	}

	switch (mt_rand(0,2))
	{
		case 0:$curse = "cursed - the book is about some sort of fairy tale where the reader gets pulled out of existence and into the story...where they must defeat the story`s villain to escape";	break;
		case 1:$curse = "cursed - the book causes the reader to keep reading it over and over and not doing anything else...no eating, drinking, moving, etc" . curseDuration(1,reader,$level);	break;
		case 2:$curse = "cursed - the " . curseType($level,reader,item,$game);																break;
	}

	$power = "";
	if (mt_rand(1,100) <= $chance)
	{
		if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
		{
			switch (mt_rand(0,15))
			{
				case 0:	$power = "the book is magical and will answer " . mt_rand(2,10) . " questions once per " . timesMaker() . " with text appearing on the blank pages with the answer";		break;
				case 1:	$power = "the book is magical and blank when found, where the owner`s spoken words will magically appear on the pages";								break;
				case 2:	$power = "the book is written in poisonous ink so if a reader is not wearing gloves they must make an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . " or die";	break;
				case 3:
					switch (mt_rand(0,8))
					{
						case 0: $power = "the book contains secrets of a great wizard...where once read...it vanishes and the reader can raise their " . abilityTranslate($game,WIZ) . " by 1 point";	break;
						case 1: $power = "the book contains secrets of a great sage...where once read...it vanishes and the reader can raise their " . abilityTranslate($game,INT) . " by 1 point";	break;
						case 2: $power = "the book contains secrets of a great warrior...where once read...it vanishes and the reader can raise their " . abilityTranslate($game,STR) . " by 1 point";	break;
						case 3: $power = "the book contains secrets of a great thief...where once read...it vanishes and the reader can raise their " . abilityTranslate($game,SPD) . " by 1 point";	break;
						case 4: $power = "the book contains secrets of a great ranger...where once read...it vanishes and the reader can raise their " . abilityTranslate($game,DEX) . " by 1 point";	break;
						case 5: $power = "the book contains secrets of a great gambler...where once read...it vanishes and the reader can raise their " . abilityTranslate($game,LCK) . " by 1 point";	break;
						case 6: $power = "the book contains secrets of a great healer...where once read...it vanishes and the reader can raise their " . abilityTranslate($game,CON) . " by 1 point";	break;
						case 7: $power = "the book contains secrets of a great leader...where once read...it vanishes and the reader can raise their " . abilityTranslate($game,CHR) . " by 1 point";	break;
						case 8: $power = "the book contains secrets of a great adventurer...where once read...it vanishes and the reader can raise an attribute by 1 point";	break;
					}
					break;
				case 4:	$power = "the book contains clues about the current dungeon or a nearby dungeon";												break;
				case 5:	$power = "the book can be written in but only the owner can understand what it says";											break;
				case 6:	$power = "the book is hollow and contains " . mt_rand(2,10) . " gems [" . $gem . "]";											break;
				case 7:	$power = "the book is hollow and contains " . mt_rand(2,30) . " " . coinMaker($game) . " coins";								break;
				case 8:	$power = "the book contains a treasure map [" . mapMaker(998,$game) . "]";														break;
				case 9:	$power = "the book contains the research for a spell called <i>" . researchSpell() . "</i> which must be described by the wizard and the game master";						break;
				case 10:$power = "the book contains artifact descriptions, giving a " . mt_rand(1,5) . " in 6 chance to identify a discovered magical item";										break;
				case 11:$power = "the book is blank but will write the translation of the words spoken of another creature when the reader focuses on such creature speaking";						break;
				case 12:$power = "the book contains detailed instructions for a wizard to make a " . $golem . " golem with " . $golval . " and a " . mt_rand(1,5) . " in 6 chance success rate";	break;
				case 13:$power = "the book is a mystical mage tome that allows a spellcaster to reduce the cost of casting a spell by " . CEIL(1+($level/2)) . " points";	break;
				case 14:
							$my_mr_is = mt_rand(5,20) * 10;
							$my_dc_is = (FLOOR($my_mr_is/10)+1) . "&nbsp;+&nbsp;" . (CEIL($my_mr_is/2));
							$power = "the book sprouts teeth and attacks as an MR " . $my_mr_is . " creature with " . $my_dc_is . " DICE";
						break;
				case 15:$power = "the book is one of the fabled Necronomicons...where if read out loud, it will raise the corpses in the area where they will fight [with their same MR and dice] for the reader for the duration of the combat where they then fall and cannot be raised ever again";	break;
			}
		}
		else
		{
			switch (mt_rand(0,16))
			{
				case 0:	$power = "the book is magical and will answer " . mt_rand(2,10) . " questions once per " . timesMaker() . " with text appearing on the blank pages with the answer";		break;
				case 1:	$power = "the book is magical and blank when found, where the owner`s spoken words will magically appear on the pages";								break;
				case 2:	$power = "the book is written in poisonous ink so if a reader is not wearing gloves they must make a save for poison or die";							break;
				case 3: $wiz = mt_rand(1,20); if ($game == "Swords & Six-Siders"){ $wiz = mt_rand(1,6); }
					$power = "the book gives instructions, for a level " . $wiz . " wizard, on how to summon a level " . mt_rand(1,$wiz) . " demon known as " . demonName() . ". If summoned properly, they will serve the wizard for " . mt_rand(2,16) . " " . timeSpan(round) . "..." . timeSpan(often) . " per " . timeSpan(per) . ".";
				break;
				case 4:	$power = "the book contains clues about the current dungeon or a nearby dungeon";												break;
				case 5:	$power = "the book can be written in but only the owner can understand what it says";												break;
				case 6:	$power = "the book is hollow and contains " . mt_rand(2,10) . " gems [" . $gem . "]";												break;
				case 7:	$power = "the book is hollow and contains " . mt_rand(2,30) . " " . coinMaker($game) . " coins";											break;
				case 8:	$power = "the book contains a treasure map [" . mapMaker(998,$game) . "]";														break;
				case 9: $power = "the book contains the research for a spell called <i>" . researchSpell() . "</i> which must be described by the mage and the game master";	break;
				case 10:
					$power = "the book contains artifact descriptions, giving a " . mt_rand(1,10) . "0% chance to identify a discovered magical item";
					if ($game == "Swords & Six-Siders"){ $power = "the book contains artifact descriptions, giving a " . mt_rand(1,5) . " in 6 chance to identify a discovered magical item"; }
				break;
				case 11:$power = "the book is blank but will write the translation of the words spoken of another creature when the reader focuses on such creature speaking";				break;
				case 12:
					$power = "the book contains detailed instructions for a " . $maker . " to make a " . $golem . " golem with " . (mt_rand(5,20)*5) . ",000 gold in materials and a " . mt_rand(1,10) . "0% success rate";
					if ($game == "Swords & Six-Siders"){ $power = "the book contains detailed instructions for a wizard to make a " . $golem . " golem with " . mt_rand(1,6) . ",000 gold in materials and a " . mt_rand(1,3) . " in 6 chance success rate"; }
				break;
				case 13:$power = "the book contains secrets of the " . $job . " where they will gain 1 " . $skill . " point if fully read for a week and enough experience to attain their next level";
					if ($game == "Swords & Six-Siders"){ $power = "the book contains secrets of the " . $job . " where they will gain 1 " . $skill . " point if fully read for a week"; }
				break;
				case 14:$power = "the book can be used as a spellbook but the power really comes from the " . mt_rand(1,3) . " bonus to all saves made by the wielder";					break;
				case 15:
					$hd = mt_rand(1,10);
					$hp = $hd*mt_rand(4,8);
					$power = "the book sprouts teeth and attacks the one opening it as a " . $hd . "HD creature with " . $hp . " hit points and a " . mt_rand(6,9) . " armor class.";
					if ($game == "Swords & Six-Siders")
					{
						$ml = mt_rand(1,6);
						$power = "the book sprouts teeth and attacks the one opening it as an M" . $hd . " creature.";
					}
				break;
				case 16:
					$pages = mt_rand(2,9);
					while ( $pages > 0 ) :
						$pages = $pages - 1;
						$page_contents = $page_contents . gameSpellChooser($game,0,'') . ", ";
					endwhile;
					$page_contents = substr($page_contents, 0, -2);
					$power = "the book contains some spell on certain pages (" . $page_contents . ")";
				break;
			}
		}

		if ($curst > 0){$power = $curse;}
	}
	if (($chance != 100) && ($power != "")){$power = "..." . $power;}

	return $power;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function bootPower($curst,$level,$game)
{
	switch (mt_rand(0,15))
	{
		case 0:	$tracks = "basilisk";	break;
		case 1:	$tracks = "bear";	break;
		case 2:	$tracks = "boar";	break;
		case 3:	$tracks = "bull";	break;
		case 4:	$tracks = "camel";	break;
		case 5:	$tracks = "dog";	break;
		case 6:	$tracks = "hill giant";	break;
		case 7:	$tracks = "goat";	break;
		case 8:	$tracks = "horse";	break;
		case 9:	$tracks = "lion";	break;
		case 10:$tracks = "mule";	break;
		case 11:$tracks = "rabbit";	break;
		case 12:$tracks = "deer";	break;
		case 13:$tracks = "tiger";	break;
		case 14:$tracks = "wolf";	break;
		case 15:$tracks = "dragon";	break;
	}
	if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$written = "learned by identifying the item";} else {$written = "learned from identifying magic";}
	switch (mt_rand(0,7))
	{
		case 0:	$written = "stitched on the heel";		break;
		case 1:	$written = "stitched on the tounge";	break;
		case 2:	$written = "stitched on the side";		break;
		case 3:	$written = "stitched on the bottom";	break;
	}

	switch (mt_rand(0,2))
	{
		case 0:	$curse = "are cursed and will cause the wearer to dance if they try to fight or flee" . curseDuration(1,wearer,mt_rand(1,20));	break;
		case 1:	$curse = "are cursed and wearer will be unable to move from the spot they are on" . curseDuration(1,wearer,mt_rand(1,20));	break;
		case 2:	$curse = "are cursed and the " . curseType(mt_rand(1,20),wearer,equip,$game);								break;
	}

	switch (mt_rand(0,13))
	{
		case 0:	$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots allow the wearer to walk on water up to " . mt_rand(10,30) . "0 feet per day";																			break;
		case 1:	$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots allow one to levitate " . mt_rand(1,10) . "0 feet off the ground at the rate of 10 feet per round...the magic word to activate the boots is `" . castingName() . "` which is " . $written;					break;
		case 2:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots allow one to run as fast as a horse and provides an additional " . mt_rand(2,6) . " hits to their armor";}
				else if ($game == "Swords & Six-Siders"){$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots allow one to run as fast as a horse and provide +" . mt_rand(1,1) . " to their armor";}
				else {$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots allow one to run as fast as a horse and provide +" . mt_rand(1,3) . " to their armor";}
			break;
		case 3:	$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots allow one to jump foward and upward about " . mt_rand(1,6) . "0 feet...and half that backwards";																break;
		case 4:	$power = "these fur boots allow one to travel snow without slowness or leaving tracks...as well as walk on ice without slipping";																						break;
		case 5:	$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots will leave tracks of a " . $tracks . " when the wearer walks";																					break;
		case 6:	$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots allow the wearer to fly " . mt_rand(6,12) . "0 feet per round for up to 2 hours a day...the magic word to activate the boots is `" . castingName() . "` which is " . $written;							break;
		case 7:	$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots allow the wearer to walk up walls as though they are walking on the ground...but only for " . mt_rand (1,6) . "0 minutes a day";												break;
		case 8:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "anyone walking in these boots will be able to add " . mt_rand(1,3) . " dice to any sneaking SR's";}
				else if ($game == "Wizardy & Warriors"){$power = "anyone walking in these boots will have a +" . mt_rand(1,3) . " to sneaking SR's";}
				else if ($game == "Swords & Six-Siders"){$power = "anyone walking in these boots will have a +" . mt_rand(1,2) . " to their dexterity";}
				else {$power = "anyone walking in these boots will be able to sneak with a " . mt_rand(2,10) . "0% success rate";}
			break;
		case 9: $power = "these " . leatherColor() . " " . materialType(leather) . " skin boots allow the wearer to teleport " . mt_rand(2,20) . "0 feet, but only " . mt_rand(2,8) . " times per day...the magic word to activate the boots is `" . castingName() . "` which is " . $written;					break;
		case 10:$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots give the wearer a cat-like grace...if they jump from a height no greater than " . mt_rand(1,9) . "0 feet (or a pit opens up beneath them) they will always land on their feet, and even safely between spikes, without taking any damage";	break;
		case 11:$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots allow the wearer to walk on lava up to " . mt_rand(10,30) . "0 feet per day";	break;
		case 12:$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots will leave no tracks when the wearer walks";	break;
		case 13:$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots allow the wearer to never be knocked off their feet from a combat move";	break;
	}

	if ($curst > 0){$power = "these " . leatherColor() . " " . materialType(leather) . " skin boots " . $curse;}
	return $power;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function cloakPower($curst,$level,$game)
{
	switch (mt_rand(0,1))
	{
		case 0:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$curse = "is cursed and will poison the wearer where they must make an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . " or die" . curseDuration(1,wearer,mt_rand(1,20));}
				else {$curse = "is cursed and will poison the wearer where they must save for poison or die" . curseDuration(1,wearer,mt_rand(1,20));}
			break;
		case 1:	$curse = "is cursed and the " . curseType(mt_rand(1,20),wearer,equip,$game);								break;
	}
	if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$written = "learned by identifying the item";} else {$written = "learned from identifying magic";}
	switch (mt_rand(0,3))
	{
		case 0:	$written = "stitched on the inside of the hood";	break;
		case 1:	$written = "stitched on the inside";		break;
	}
	switch (mt_rand(0,9))
	{
		case 0:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "this " . candleColor(0) . " cloak is made from spider silk and grants the wearer an extra " . mt_rand(1,3) . " combat dice when attacking spiders...as well as able to climb walls like them while also being immune to their webbing";}
				else if ($game == "Swords & Six-Siders") {$power = "this " . candleColor(0) . " cloak is made from spider silk and grants the wearer +" . mt_rand(1,2) . " to attacking and defending from spiders...as well as able to climb walls like them while also being immune to their webbing";}
				else {$power = "this " . candleColor(0) . " cloak is made from spider silk and grants the wearer +" . mt_rand(1,4) . " to attacking and defending from spiders...as well as able to climb walls like them while also being immune to their webbing";}
			break;
		case 1:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "when this " . candleColor(0) . " cloak is worn, it will turn a darker black shade when going further into the shadows...giving the wearer a " . mt_rand(1,5) . " in 6 chance of hiding in the shadows if they hold still";}
				else if ($game == "Swords & Six-Siders"){$power = "when this " . candleColor(0) . " cloak is worn, it will turn a darker black shade when going further into the shadows...giving the wearer a +" . mt_rand(1,2) . " to hiding in the shadows if they hold still";}
				else {$power = "when this " . candleColor(0) . " cloak is worn, it will turn a darker black shade when going further into the shadows...giving the wearer a " . mt_rand(2,10) . "0% chance of hiding in the shadows if they hold still";}
			break;
		case 2:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "this " . candleColor(0) . " cloak distorts the image of the wearer where they appear to be about a foot or two from where they are actually standing...giving them an extra " . mt_rand(1,2) . " dice for attacks and combat SR's";}
				else if ($game == "Swords & Six-Siders"){$power = "this " . candleColor(0) . " cloak distorts the image of the wearer where they appear to be about a foot or two from where they are actually standing...giving them a +" . mt_rand(1,2) . " to attacks and a bonus of " . mt_rand(1,2) . " to directed saves";}
				else {$power = "this " . candleColor(0) . " cloak distorts the image of the wearer where they appear to be about a foot or two from where they are actually standing...giving them a +2 to attacks and a bonus of 2 to directed saves";}
			break;
		case 3:	$power = "this " . candleColor(0) . " cloak allows the wearer to become invisible for " . mt_rand(2,4) . " hours per day...the magic word to activate the cloak is `" . castingName() . "` which is " . $written;				break;
		case 4:	$power = "this blue-colored cloak allows the wearer to breathe and swim underwater with the grace of a fish as soon as they enter the water...but the effect only lasts for about " . mt_rand(2,10) . " hours per day";				break;
		case 5:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "this " . candleColor(0) . " cloak gives the wearer an additional " . mt_rand(2,8) . " hits with their armor";}
				else if ($game == "Swords & Six-Siders"){$power = "this " . candleColor(0) . " cloak gives the wearer an additional +" . mt_rand(1,2) . " to their armor";}
				else {$power = "this " . candleColor(0) . " cloak gives the wearer an additional +" . mt_rand(1,5) . " to their armor";}
			break;
		case 6:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "this " . candleColor(0) . " cloak gives the wearer a +" . mt_rand(1,6) . " bonus to their SR's";}
				else if ($game == "Swords & Six-Siders"){$power = "this " . candleColor(0) . " cloak gives the wearer a " . mt_rand(1,2) . " bonus to their save rolls";}
				else {$power = "this " . candleColor(0) . " cloak gives the wearer a " . mt_rand(1,5) . " bonus to their save rolls";}
			break;
		case 7:	$power = "this " . candleColor(0) . " cloak gives the wearer the ability to appear as another humanoid of medium or small size up to " . mt_rand(2,6) . " hours per day by simply saying the magic word along with the name of the race...the magic word to activate the cloak is `" . castingName() . "` which is " . $written;	break;
		case 8:	$power = "this " . candleColor(0) . " cloak gives the wearer protection from fire and flame...including fiery forms of dragon breath";														break;
		case 9:	$power = "this " . candleColor(0) . " cloak gives the wearer the ability to fly up to " . mt_rand(10,100) . "0 feet per day...the magic word to activate the cloak is `" . castingName() . "` which is " . $written;				break;
	}
	if ($curst > 0){$power = "this " . candleColor(0) . " cloak " . $curse;}
	return $power;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function robePower($curst,$level,$game)
{
	switch (mt_rand(0,2))
	{
		case 0:	$curse = "is cursed and the wearer will be bitten by many magical bugs that infest it" . curseDuration(1,wearer,mt_rand(1,20));	break;
		case 1:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$curse = "is cursed and the wearer will suffer a -3 to " . abilityType($game) . curseDuration(1,wearer,mt_rand(1,20));}
				else if ($game == "Swords & Six-Siders"){$curse = "is cursed and the wearer will suffer a -1 to their " . abilityType($game) . curseDuration(1,wearer,mt_rand(1,20));}
				else {$curse = "is cursed and the wearer will suffer a -3 to their prime attribute" . curseDuration(1,wearer,mt_rand(1,20));}
			break;
		case 2:	$curse = "is cursed and the " . curseType(mt_rand(1,20),wearer,equip,$game);								break;
	}
	if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$written = "learned by identifying the item";} else {$written = "learned from identifying magic";}
	switch (mt_rand(0,5))
	{
		case 0:	$written = "stitched on the inside";			break;
		case 1:	$written = "stitched on the robe`s tie belt";		break;
		case 2:	$written = "stitched on the inside the robe`s collar";	break;
	}
	switch (mt_rand(0,9))
	{
		case 0:	$power = "this " . candleColor(0) . " robe will move around as though one is wearing it when the magic word is spoken...the magic word to activate the robe is `" . castingName() . "` which is " . $written;											break;
		case 1:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "this " . candleColor(0) . " robe gives the wearer a +" . mt_rand(1,5) . " to any SR's made against magic, an additional " . mt_rand(3,8) . " hits to armor, and spells cast only cost half as much";}
				else if ($game == "Swords & Six-Siders"){$power = "this " . candleColor(0) . " robe gives the wearer a +" . mt_rand(1,2) . " to magic saves, a +" . mt_rand(1,2) . " to armor, and spells cast at enemies are twice as effective...only useable by wizards";}
				else {$power = "this " . candleColor(0) . " robe gives the wearer a " . mt_rand(5,10) . "% resistance to magic, a +" . mt_rand(1,5) . " to armor, and spells cast at enemies are " . (mt_rand(1,5)*5) . "% more effective...only useable by wizards and illusionists";}
			break;
		case 2:	$power = "this " . candleColor(0) . " robe gives the wearer the ability to appear as some object of equal mass and size by simply concentrating on an item and saying the magic word...the magic word to activate the robe is `" . castingName() . "` which is " . $written;	break;
		case 3:	$power = "this " . candleColor(0) . " robe gives the wearer the ability to see in all directions, without the need for a light source";																				break;
		case 4:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "this multi-colored robe allows the wearer to cause the robe to shift colors, lights, and patterns up to " . mt_rand(2,6) . " times per day...giving them an extra die to roll for combat...it also causes enemies to be hypnotized for " . mt_rand(2,5) . " rounds, " . mt_rand(2,5) . " times a day, if they fail an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,WIZ) . "...the magic word to activate the robe is `" . castingName() . "` which is " . $written;}
				else if ($game == "Swords & Six-Siders"){$power = "this multi-colored robe allows the wearer to cause the robe to shift colors, lights, and patterns up to " . mt_rand(2,6) . " times per day...giving them a +1 for attack rolls...it also causes enemies to be hypnotized for " . mt_rand(2,5) . " rounds, " . mt_rand(2,5) . " times a day, if they fail save against magic...the magic word to activate the robe is `" . castingName() . "` which is " . $written;}
				else {$power = "this multi-colored robe allows the wearer to cause the robe to shift colors, lights, and patterns up to " . mt_rand(2,6) . " times per day...giving them an extra +1 to armor per combat round to a maximum of +5...it also causes enemies to be hypnotized for " . mt_rand(2,5) . " rounds if they fail a save for magic...the magic word to activate the robe is `" . castingName() . "` which is " . $written;}
			break;
		case 5:	$power = "this " . candleColor(0) . " robe allows the wearer to blink out of existence for " . mt_rand(2,10) . " rounds where only the robe remains and falls to the ground...they can appear sooner if they wish but if the robe is destroyed during that time they are lost forever...the magic word to activate the robe is `" . castingName() . "` which is " . $written;	break;
		case 6:	$power = "this black robe gives the wearer the ability to appear as one of the " . undeadType() . " that roam the tombs and cemeteries, up to " . mt_rand(2,4) . " times per day for about to " . mt_rand(1,6) . "0 minutes each time...the magic word to activate the robe is `" . castingName() . "` which is " . $written;		break;
		case 7:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "this " . candleColor(0) . " robe will release a swarm of insects when opened and the magic word uttered up to " . mt_rand(2,3) . " times per day...which will swarm around enemies and reducing their combat add by half for " . mt_rand(2,5) . " rounds where the insects then magically vanish...the magic word to activate the cloak is `" . castingName() . "` which is " . $written;}
				else if ($game == "Swords & Six-Siders"){$power = "this " . candleColor(0) . " robe will release a swarm of insects when opened and the magic word uttered up to " . mt_rand(2,3) . " times per day...which will swarm around enemies giving them -2 to attack for " . mt_rand(2,5) . " rounds where the insects then magically vanish...the magic word to activate the cloak is `" . castingName() . "` which is " . $written;}
				else {$power = "this " . candleColor(0) . " robe will release a swarm of insects when opened and the magic word uttered up to " . mt_rand(2,3) . " times per day...which will swarm around enemies giving them -4 to attack for " . mt_rand(2,5) . " rounds where the insects then magically vanish...the magic word to activate the cloak is `" . castingName() . "` which is " . $written;}
			break;
		case 8:	$power = "this " . candleColor(0) . " robe gives the wearer protection from acidic attacks like acid breath and slimes";																					break;
		case 9:	$power = "this " . candleColor(0) . " robe prevents the wearer from falling into suddenly open pits...where they may take a few steps in mid-air until they reach solid ground";														break;
	}
	if ($curst > 0){$power = "this " . candleColor(0) . " robe " . $curse;}
	return $power;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function beltPower($curst,$level,$game)
{
	$decorate = leatherColor() . " " . materialType(leather) . " skin belt has a " . preciousChooser() . " buckle";
	if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$written = "learned by identifying the item";} else {$written = "learned from identifying magic";}
	switch (mt_rand(0,5))
	{
		case 0:	$written = "stitched on the inside";	break;
		case 1:	$written = "stitched on the outside";	break;
		case 2:	$written = "etched on the buckle";	break;
	}
	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
	{
		switch (mt_rand(4,14))
		{
			case 4:	$power = "this " . $decorate . " and allows the wearer to always deal with " . humanType() . " on peaceful terms...unless the wearer does something hostile toward them";		break;
			case 5:	$power = "this " . $decorate . " and can completely restore the wearer's " . abilityTranslate($game,CON) . "...but only has " . mt_rand(5,20) . " charges";							break;
			case 6:	$power = "this " . $decorate . " and has a pouch permanently connected to it...where it can weightlessly hold " . mt_rand(2,6) . " items without appearing to take up space";	break;
			case 7:	$power = "this " . $decorate . " and allows the buckle to produce a light in a " . mt_rand(1,5) . "0 foot radius when the magic word is spoken...the magic word to activate the robe is `" . castingName() . "` which is " . $written;	break;
			case 8:	$power = "this " . $decorate . " and will slightly tighten around the wearer when within " . mt_rand(1,3) . "0 feet of " . searchList() . " and the wearer concentrates";		break;
			case 9:	$power = "this " . $decorate . " and allows the buckle to absorb electrical energy or bolts, where the wearer than then direct that same damaging energy elsewhere";			break;
			case 10:$power = "this " . $decorate . " and causes the wearer to never be hungry or thirsty, but for only " . mt_rand(2,90) . " days after which the magic is drained";			break;
			case 11:$power = "this " . $decorate . " and gives the wearer the strength of a giant...which gives +" . mt_rand(3,9) . " to strength";	break;
			case 12:$power = "this " . $decorate . " and gives the wearer +" . mt_rand(1,6) . " to any SR's against magic";										break;
			case 13:$power = "this " . $decorate . " and gives the wearer +" . mt_rand(3,9) . " bonus to the hits of their armor";											break;
			case 14:$power = "this " . $decorate . " and gives the wearer +" . mt_rand(1,6) . " to any SR's against dragon breath";										break;
		}
	}
	else
	{
		switch (mt_rand(0,10))
		{
			case 0:	$power = "this " . $decorate . " and allows the wearer to always deal with " . humanType() . " on peaceful terms...unless the wearer does something hostile toward them";		break;
			case 1:	$power = "this " . $decorate . " and gives the wearer the strength of a giant...which gives +" . mt_rand(3,6) . " to attacks and +" . mt_rand(7,12) . " to damage with melee weapons only...they can also throw boulders like hill giants do";
				if ($game == "Swords & Six-Siders"){ $power = "this " . $decorate . " and gives the wearer the strength of a giant...which gives +" . mt_rand(2,3) . " to attacks and +" . mt_rand(2,3) . " to damage with melee weapons only...they can also throw boulders like hill giants do"; }
			break;
			case 2:	$power = "this " . $decorate . " and gives the wearer +" . mt_rand(1,4) . " to saves for magical spells";
				if ($game == "Swords & Six-Siders"){ $power = "this " . $decorate . " and gives the wearer +" . mt_rand(1,2) . " to saves for magical spells"; }
			break;
			case 3:	$power = "this " . $decorate . " and gives the wearer +" . mt_rand(1,3) . " bonus to their armor";
				if ($game == "Swords & Six-Siders"){ $power = "this " . $decorate . " and gives the wearer +" . mt_rand(1,2) . " bonus to their armor"; }
			break;
			case 4:	$power = "this " . $decorate . " and gives the wearer +" . mt_rand(1,4) . " to saves for breath weapons";
				if ($game == "Swords & Six-Siders"){ $power = "this " . $decorate . " and gives the wearer +" . mt_rand(1,2) . " to saves for breath weapons"; }
			break;
			case 5:
					if (($game == "OSRIC") || ($game == "AD&D") || ($game == "BD&D") || ($game == "BFRPG") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry")){$power = "this " . $decorate . " and gives the wearer an 18 constitution for the entire day...but only has " . mt_rand(5,20) . " charges";}
					else if ($game == "Swords & Six-Siders"){$power = "this " . $decorate . " and gives the wearer a 6 constitution for the entire day...but only has " . mt_rand(5,20) . " charges";}
					else {$power = "this " . $decorate . " and gives the wearer maximum stamina for the entire day...but only has " . mt_rand(5,20) . " charges";}
				break;
			case 6:	$power = "this " . $decorate . " and has a pouch permanently connected to it...where it can weightlessly hold " . mt_rand(5,20) . ",000 coins without appearing to take up space";
				if ($game == "Swords & Six-Siders"){ $power = "this " . $decorate . " and has a pouch permanently connected to it...where it can weightlessly hold " . mt_rand(1,5) . ",000 pounds without appearing to take up space"; }
			break;
			case 7:	$power = "this " . $decorate . " and allows the buckle to produce a light in a " . mt_rand(1,5) . "0 foot radius when the magic word is spoken...the magic word to activate the robe is `" . castingName() . "` which is " . $written;	break;
			case 8:	$power = "this " . $decorate . " and will slightly tighten around the wearer when within " . mt_rand(1,3) . "0 feet of " . searchList() . " and the wearer concentrates";		break;
			case 9:	$power = "this " . $decorate . " and allows the buckle to absorb electrical energy or bolts, where the wearer than then direct that same damaging energy elsewhere";			break;
			case 10:$power = "this " . $decorate . " and causes the wearer to never be hungry or thirsty, but for only " . mt_rand(2,90) . " days after which the magic is drained";			break;
		}
	}
	if ($curst > 0){$power = "this " . $decorate . " but is cursed and the " . curseType(mt_rand(1,20),wearer,equip,$game);}
	return $power;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function gloveType()
{
	switch (mt_rand(0,2))
	{
		case 0:	$value = "gloves";	break;
		case 1:	$value = "bracers";	break;
		case 2:	$value = "gauntlets";	break;
	}
	return $value;
}
function glovePower($glove,$curst,$level,$game)
{
	switch (mt_rand(0,1))
	{
		case 0:
				if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$curse = "are cursed and will cause the wearer to drop their weapon about 3 out of 6 times each combat round " . curseDuration(1,wearer,mt_rand(1,20));}
				else {$curse = "are cursed and will cause the wearer to drop their weapon about 50% of the time " . curseDuration(1,wearer,mt_rand(1,20));}
			break;
		case 1:	$curse = "are cursed and the " . curseType(mt_rand(1,20),wearer,equip,$game);									break;
	}
	if ($glove == "gloves")
	{
		if (mt_rand(1,100) > 50){$decorate = leatherColor() . " " . materialType(leather) . " skin gloves";}
		else {$decorate = candleColor(0) . " gloves";}
		switch (mt_rand(0,2))
		{
			case 0:	$power = "these " . $decorate . " grants the wearer the ability to grab arrows out of the air " . mt_rand(2,5) . " times per day";			break;
			case 1:	$power = "these " . $decorate . " grants the wearer the ability to make a single hand-held object disappear and reappear at will from the glove";	break;
			case 2:
				if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "these " . $decorate . " grants the wearer the ability to climb walls with a " . mt_rand(1,5) . " in 6 success rate";}
				else {$power = "these " . $decorate . " grants the wearer the ability to climb walls with " . mt_rand(3,10) . "0% success rate";}
			break;
		}
	}
	else if ($glove == "bracers")
	{
		$decorate = leatherColor() . " " . materialType(leather) . " skin bracers";
		if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
		{
			switch (mt_rand(0,2))
			{
				case 0:	$power = "these " . $decorate . " grants the wearer +" . mt_rand(2,6) . " when attacking with bows or crossbows";				break;
				case 1:	$power = "these " . $decorate . " grants the wearer +" . mt_rand(5,9) . " when attacking with bows or crossbows";				break;
				case 2:	$power = "these " . $decorate . " grants the wearer " . mt_rand(4,12) . " hits to armor but only if they don't use a shield";	break;
			}
		}
		else if ($game == "Swords & Six-Siders")
		{
			switch (mt_rand(0,2))
			{
				case 0:	$power = "these " . $decorate . " grants the wearer +" . mt_rand(1,2) . " when attacking with bows or crossbows";							break;
				case 1:	$power = "these " . $decorate . " grants the wearer +" . mt_rand(2,3) . " when attacking with bows or crossbows and +" . mt_rand(1,2) . " to damage with such weapons";	break;
				case 2:	$power = "these " . $decorate . " grants the wearer +" . mt_rand(1,3) . " to armor but only if they use no shield or wear any other piece of armor";			break;
			}
		}
		else
		{
			switch (mt_rand(0,2))
			{
				case 0:	$power = "these " . $decorate . " grants the wearer +" . mt_rand(1,2) . " when attacking with bows or crossbows";							break;
				case 1:	$power = "these " . $decorate . " grants the wearer +" . mt_rand(2,3) . " when attacking with bows or crossbows and +" . mt_rand(1,2) . " to damage with such weapons";	break;
				case 2:	$power = "these " . $decorate . " grants the wearer +" . mt_rand(1,8) . " to armor but only if they use no shield or wear any other piece of armor";			break;
			}
		}
	}
	else
	{
		$decorate = preciousChooser() . " gauntlets";
		if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
		{
			switch (mt_rand(0,2))
			{
				case 0:	$power = "these " . $decorate . " grants the wearer the strength of an ogre by giving +" . mt_rand(3,6) . " to strength...and only if they do not have a magical device that enhances such strength already";	break;
				case 1:	$power = "these " . $decorate . " grants the wearer the skills of a great warrior by giving  +" . mt_rand(3,10) . " to combat rolls";	break;
				case 2:	$power = "these " . $decorate . " grants the wearer the ability to hold a two-handed weapon effectively in one hand";					break;
			}
		}
		else if ($game == "Swords & Six-Siders")
		{
			switch (mt_rand(0,2))
			{
				case 0:	$power = "these " . $decorate . " grants the wearer the strength of an ogre by giving +" . mt_rand(1,3) . " to hit and +" . mt_rand(1,3) . " to damage with melee weapons...and only if they do not have a magical device that enhances such strength already";	break;
				case 1:	$power = "these " . $decorate . " grants the wearer the skills of a great warrior by giving  +" . mt_rand(1,2) . " to hit when attacking with melee weapons";	break;
				case 2:	$power = "these " . $decorate . " grants the wearer the ability to hold a two-handed weapon effectively in one hand";						break;
			}
		}
		else
		{
			switch (mt_rand(0,2))
			{
				case 0:	$power = "these " . $decorate . " grants the wearer the strength of an ogre by giving +" . mt_rand(1,3) . " to hit and +" . mt_rand(1,6) . " to damage with melee weapons...and only if they do not have a magical device that enhances such strength already";	break;
				case 1:	$power = "these " . $decorate . " grants the wearer the skills of a great warrior by giving  +" . mt_rand(1,3) . " to hit when attacking with melee weapons";	break;
				case 2:	$power = "these " . $decorate . " grants the wearer the ability to hold a two-handed weapon effectively in one hand";						break;
			}
		}
	}

	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
	{
		switch (mt_rand(3,8))
		{
			case 3:	$power = "these " . $decorate . " grants the wearer the ability to pass their hand and arm through about a foot of non-organic material " . mt_rand(2,6) . " times a day...like a wall or door";	break;
			case 4:	$power = "these " . $decorate . " grants the wearer the ability to detect magic by touching an item...but only " . mt_rand(2,6) . " times a day";							break;
			case 5:	$power = "these " . $decorate . " grants the wearer the ability to cure disease and poison by touching the infected...but only once per day";								break;
			case 6:	$power = "these " . $decorate . " grants the wearer an additional " . mt_rand(2,6) . " " . abilityType($game) . " points while they are worn";	break;
			case 7:	$power = "these " . $decorate . " grants the wearer an extra 2 dice when rolling for any SR with roguery";		break;
			case 8:	$power = "these " . $decorate . " grants the wearer " . mt_rand(3,8) . " points to their armor hits but only if they are not holding a shield";						break;
		}
	}
	else if ($game == "Swords & Six-Siders")
	{
		switch (mt_rand(0,11))
		{
			case 0:	$power = "these " . $decorate . " grants the wearer an additional " . abilityType($game) . " point while they are worn";	break;
			case 1:	$power = "these " . $decorate . " grants the wearer either a +" . mt_rand(2,3) . " to pick locks or a +" . mt_rand(1,2) . " to those that can already pick locks";		break;
			case 2:	$power = "these " . $decorate . " grants the wearer either a +" . mt_rand(2,3) . " to pick pockets or a +" . mt_rand(1,2) . " to those that can already pick pockets";	break;
			case 3:	$power = "these " . $decorate . " grants the wearer the ability to pass their hand and arm through about a foot of non-organic material " . mt_rand(2,6) . " times a day...like a wall or door";	break;
			case 4:	$power = "these " . $decorate . " grants the wearer +" . mt_rand(1,2) . " to armor but only if they are not holding a shield";										break;
			case 5:	$power = "these " . $decorate . " grants the wearer the ability to detect magic by touching an item...but only " . mt_rand(2,6) . " times a day";							break;
			case 6:	$power = "these " . $decorate . " grants the wearer the ability to cure disease and poison by touching the infected...but only once per day";								break;
		}
	}
	else
	{
		switch (mt_rand(0,11))
		{
			case 0:	$power = "these " . $decorate . " grants the wearer an additional " . abilityType($game) . " point while they are worn";	break;
			case 1:	$power = "these " . $decorate . " grants the wearer either a " . mt_rand(2,3) . "0% chance to pick locks or an additional " . mt_rand(1,2) . "0% chance to those that can already pick locks";		break;
			case 2:	$power = "these " . $decorate . " grants the wearer either a " . mt_rand(2,3) . "0% chance to pick pockets or an additional " . mt_rand(1,2) . "0% chance to those that can already pick pockets";	break;
			case 3:	$power = "these " . $decorate . " grants the wearer the ability to pass their hand and arm through about a foot of non-organic material " . mt_rand(2,6) . " times a day...like a wall or door";	break;
			case 4:	$power = "these " . $decorate . " grants the wearer +" . mt_rand(1,3) . " to armor but only if they are not holding a shield";										break;
			case 5:	$power = "these " . $decorate . " grants the wearer the ability to detect magic by touching an item...but only " . mt_rand(2,6) . " times a day";							break;
			case 6:	$power = "these " . $decorate . " grants the wearer the ability to cure disease and poison by touching the infected...but only once per day";								break;
		}
	}

	if ($curst > 0){$power = "these " . $decorate . " " . $curse;}
	return $power;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function amuletType()
{
	switch (mt_rand(0,7))
	{
		case 0:	$value = "amulet";	break;
		case 1:	$value = "necklace";	break;
		case 2:	$value = "pendant";	break;
		case 3:	$value = "locket";	break;
		case 4:	$value = "amulet";	break;
		case 5:	$value = "medallion";	break;
		case 6:	$value = "talisman";	break;
		case 7:	$value = "scarab";	break;
	}
	return $value;
}
function amuletPower($amulet,$curst,$level,$game)
{
	switch (mt_rand(0,3))
	{
		case 0:	$curse = "but is cursed and will appear to hide one`s location from magic, but actually enhances it";						break;
		case 1:	$curse = "but is cursed and strangle those who put it on...killing them in " . mt_rand(2,6) . " rounds unless curse removing magic is used";	break;
		case 2:	$curse = "but is cursed and the " . curseType(mt_rand(1,20),wearer,equip,$game);										break;
		case 3:	$curse = "but is cursed and will cause the wearer to become a " . lycanthrope() . " unless curse removing magic is used which nullfies the object";	break;
	}
	$decorate = preciousChooser() . " " . $amulet . " has a " . gemChooser() . " set in it";
	if (mt_rand(1,100) > 50){$decorate = preciousChooser() . " " . $amulet . " has a " . designType(0) . " symbol on it";}

	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
	{
		switch (mt_rand(6,25))
		{
			case 6:	$power = "this " . $decorate . " and grants the wearer an immunity to possession type magic, or having their soul taken";								break;
			case 7:	$power = "this " . $decorate . " and grants the wearer an immunity to being detected or found by magical means";					break;
			case 8:	$power = "this " . $decorate . " and grants the wearer the ability to read one`s thoughts " . mt_rand(2,6) . " times a day";				break;
			case 9:	$power = "this " . $decorate . " and grants the wearer the ability to project one`s thoughts into another creature " . mt_rand(2,6) . " times a day";	break;
			case 10:$power = "this " . $decorate . " and grants the wearer the ability to cast any known first level spell at no cost...once per day";			break;
			case 11:$power = "this " . $decorate . " and allows the wearer to attack enemies...that require a magic or silver weapon...with normal weapons";					break;
			case 12:$power = "this " . $decorate . " and grants the wearer the ability to detect golems within " . mt_rand(3,10) . "0 feet and hurt them no matter the weapon used";	break;
			case 13:$power = "this " . $decorate . " and will absorb up to " . (mt_rand(1,10)*10) . "0 points of magical spell damage before being destroyed";			break;
			case 14:$power = "this " . $decorate . " and grants the wearer the ability to resist any type of disease";							break;
			case 15:$power = "this " . $decorate . " and grants the wearer the ability to resist any type of poison";							break;
			case 16:$power = "this " . $decorate . " and will stabalize the wearer if their " . abilityTranslate($game,CON) . " drops below 1...keeping them at 1 " . abilityTranslate($game,CON) . ", but only once a week";	break;
			case 17:$power = "this " . $decorate . " and grants the wearer immunity from having their head severed";							break;
			case 18:$power = "this " . $decorate . " and will detect any undead that are within " . mt_rand(1,10) . "0 feet but only " . mt_rand(2,6) . " times per day";	break;
			case 19:$power = "this " . $decorate . " and will release a cloud of " . fogColor() . " smoke in a " . mt_rand(1,3) . "0 foot area that will dissipate in " . mt_rand(2,20) . " minutes...but only once per day and when the word `" . castingName() . "` is spoken";	break;
			case 20:$power = "this " . $decorate . " and grants the wearer an additional " . mt_rand(2,6) . " " . abilityType($game) . " points while wearing it";					break;
			case 21:$power = "this " . $decorate . " and grants the wearer the ability to battle undead with " . mt_rand(1,3) . " additional combat dice";			break;
			case 22:$power = "this " . $decorate . " and grants the wearer +" . mt_rand(5,15) . " with hand-to-hand attacks only";						break;
			case 23:$power = "this " . $decorate . " and grants the wearer +" . mt_rand(3,9) . " to their armor hits";								break;
			case 24:$power = "this " . $decorate . " and grants the wearer the ability to cast spells one level higher without penalty";	break;
			case 25:$power = "this " . $decorate . " and grants the wearer an additional " . mt_rand(2,7) . " hits to armor and a bonus of +" . mt_rand(2,7) . " to SR's";	break;
		}
	}
	else
	{
		switch (mt_rand(0,19))
		{
			case 0:	$power = "this " . $decorate . " and grants the wearer an additional " . abilityType($game) . " point while wearing it";					break;
			case 1:	$power = "this " . $decorate . " and grants the wearer the ability to turn undead just as a level " . mt_rand(3,12) . " priest";
				if ($game == "Swords & Six-Siders"){ $power = "this " . $decorate . " and grants the wearer the ability to turn undead just as the spell"; }
				break;
			case 2:	$power = "this " . $decorate . " and grants the wearer an immunity to possession type magic";								break;
			case 3:	$power = "this " . $decorate . " and grants the wearer an immunity to being detected or found by magical means";					break;
			case 4:	$power = "this " . $decorate . " and grants the wearer +" . mt_rand(1,3) . " with hand-to-hand attacks only";
				if ($game == "Swords & Six-Siders"){ $power = "this " . $decorate . " and grants the wearer +" . mt_rand(1,2) . " with hand-to-hand attacks only"; }
				break;
			case 5:	$power = "this " . $decorate . " and grants the wearer +" . mt_rand(1,4) . " to their armor";
				if ($game == "Swords & Six-Siders"){ $power = "this " . $decorate . " and grants the wearer +" . mt_rand(1,2) . " to their armor"; }
				break;
			case 6:	$power = "this " . $decorate . " and grants the wearer the ability to read one`s thoughts " . mt_rand(2,6) . " times a day";				break;
			case 7:	$power = "this " . $decorate . " and grants the wearer the ability to project one`s thoughts into another creature " . mt_rand(2,6) . " times a day";	break;
			case 8:	$power = "this " . $decorate . " and grants the wearer the ability to cast spells as though they were 2 levels higher than their current level";
				if ($game == "Swords & Six-Siders"){ $power = "this " . $decorate . " and grants the wearer the ability to cast spells as though they were a level " . mt_rand(1,3) . " wizard"; }
				break;
			case 9:	$power = "this " . $decorate . " and grants the wearer the ability to cast any first level " . spellSchool($game) . " spell once per day";			break;
			case 10:$power = "this " . $decorate . " will absorb death magic up to " . mt_rand(6,12) . " times before it is destroyed";					break;
			case 11:$power = "this " . $decorate . " and grants the wearer the ability to detect golems within " . mt_rand(3,10) . "0 feet and hurt them no matter the weapon used";	break;
			case 12:$power = "this " . $decorate . " and grants the wearer a +" . mt_rand(1,2) . " to armor and a bonus of " . mt_rand(1,2) . " to saves...but also provokes enemies to attack the wearer";	break;
			case 13:$power = "this " . $decorate . " and will absorb up to " . mt_rand(1,10) . "0 points of magical spell damage before being destroyed";			break;
			case 14:$power = "this " . $decorate . " and grants the wearer the ability to resist any type of disease";							break;
			case 15:$power = "this " . $decorate . " and grants the wearer the ability to resist any type of poison";							break;
			case 16:$power = "this " . $decorate . " and will stabilize the wearer if their health drops below 0 but no less than -9";
				if ($game == "Swords & Six-Siders"){ $power = "this " . $decorate . " and will stabilize the wearer if their health drops below 0, but they will die after " . mt_rand(2,10) . " rounds if not healed"; }
				break;
			case 17:$power = "this " . $decorate . " and grants the wearer immunity from having their head severed";							break;
			case 18:$power = "this " . $decorate . " and will detect any undead that are within " . mt_rand(1,10) . "0 feet but only " . mt_rand(2,6) . " times per day";	break;
			case 19:$power = "this " . $decorate . " and will release a cloud of " . fogColor() . " smoke in a " . mt_rand(1,3) . "0 foot area that will dissipate in " . mt_rand(2,20) . " minutes...but only once per day and when the word `" . castingName() . "` is spoken";	break;
		}
	}

	if ($curst > 0){$power = "this " . $decorate . " " . $curse;}
	return $power;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function rockType()
{
	switch (mt_rand(0,7))
	{
		case 0:	$value = "rock";	break;
		case 1:	$value = "stone";	break;
		case 2:	$value = "orb";		break;
		case 3:	$value = "cube";	break;
		case 4:	$value = "prism";	break;
		case 5:	$value = "rune";	break;
		case 6:	$value = "crystal";	break;
		case 7:	$value = "gem";		break;
	}
	return $value;
}
function rockPower($rock,$curst,$level,$game)
{
	$magic_word = castingName();

	switch (mt_rand(0,7))
	{
		case 0:	$adj = "mystical";	break;
		case 1:	$adj = "polished";	break;
		case 2:	$adj = "rough";		break;
		case 3:	$adj = "magical";	break;
		case 4:	$adj = "odd";		break;
		case 5:	$adj = "carved";	break;
		case 6:	$adj = "strange";	break;
		case 7:	$adj = "unusual";	break;
	}

	if (($rock == "crystal") || ($rock == "gem")){$extra = slimeColor() . " "; }

	if (($rock == "orb") || ($rock == "cube")){$extra = plainColor() . " "; if (mt_rand(1,2) == 1){$more = " has some " . designColor() . " symbols on it and ";} }

	switch (mt_rand(0,7))
	{
		case 0:	$shield = "gases";				break;
		case 1:	$shield = "lifeless material";	break;
		case 2:	$shield = "living material";	break;
		case 3:	$shield = "magic";				break;
		case 4:	$shield = "everything";			break;
		case 5:	$shield = "liquids";			break;
		case 6:	$shield = "extreme cold";		break;
		case 7:	$shield = "extreme heat";		break;
	}
	switch (mt_rand(0,2))
	{
		case 0:	$light = "in a " . mt_rand(1,5) . "0 foot radius";	break;
		case 1:	$light = "in a " . mt_rand(3,7) . "0 foot beam";	break;
		case 2:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$light = "a bright flash of light in a  " . mt_rand(2,5) . "0 foot area that one must make an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,SPD) . " or " . abilityTranslate($game,LCK) . " or be blinded for " . mt_rand(2,8) . " rounds";}
				else {$light = "a bright flash of light in a  " . mt_rand(2,5) . "0 foot area that one must save for magic or be blinded for " . mt_rand(2,8) . " rounds";}
			break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$activate = "...to activate it one must hold it in front of themselves";					break;
		case 1:	$activate = "...to activate it one must tap it with their finger about " . mt_rand(2,10) . " times";	break;
		case 2:	$activate = "...to activate it one must hold it and speak the word `" . $magic_word . "`";		break;
		case 3:	$activate = "...to activate it one must tap it with their finger about " . mt_rand(2,10) . " times and speak the word `" . $magic_word . "`";	break;
	}

	$adj = "this " . $adj . " " . $extra . "" . $rock . "" . $more;

	switch (mt_rand(0,4))
	{
		case 0:	$curse = "is cursed where the one who touches it will guard it and begin to think that all others will kill them to possess it" . curseDuration(1,possessor,$level);	break;
		case 1:	$curse = "is cursed where the one who touches it will protect it and will encounter wandering enemies twice as often" . curseDuration(1,possessor,$level);	break;
		case 2:
				if ($game == "Tunnels & Trolls 5th Edition"){$curse = "is cursed where the one who touches it will be pulled into it unless they can make an " . TTSaves($level,$game) . " vs. INT...once inside another can simply utter the command word `" . $magic_word . "` to project an illusion of the one trapped...the " . $rock . " can only hold one soul and cannot be replaced by another soul...one can be freed from the " . $rock . " if it is destroyed";}
				else if ($game == "Tunnels & Trolls 7th Edition" || $game == "Tunnels & Trolls Deluxe"){$curse = "is cursed where the one who touches it will be pulled into it unless they can make an " . TTSaves($level,$game) . " vs. INT or WIZ...once inside another can simply utter the command word `" . $magic_word . "` to project an illusion of the one trapped...the " . $rock . " can only hold one soul and cannot be replaced by another soul...one can be freed from the " . $rock . " if it is destroyed";}
				else {$curse = "is cursed where the one who touches it will be pulled into it unless they can save for spells...once inside another can simply utter the command word `" . $magic_word . "` to project an illusion of the one trapped...the " . $rock . " can only hold one soul and cannot be replaced by another soul...one can be freed from the " . $rock . " if it is destroyed";}
			break;
		case 3:	$curse = "is cursed where the one who carries it will suffer from the magically incredible weight and begin to travel more slowly and avoid dangers less often" . curseDuration(1,possessor,$level);	break;
		case 4:	$curse = "is cursed and the " . curseType($level,possessor,item,$game);										break;
	}
	switch (mt_rand(0,9))
	{
		case 0:	$power = "creates an invisible barrier about 10 feet around the wielder that blocks all " . $shield . " for about " . mt_rand(2,4) . " hours";			break;
		case 1:	$power = "creates a magical portal that leads to a particular spot where the " . $rock . " was set in the ground and the word `" . $magic_word . "` is spoken";	break;
		case 2:	$power = "creates a magical light that emits " . $light;	break;
		case 3:	$power = "vibrates when it comes within " . mt_rand(2,20) . " feet of " . searchList() . " where such a detection depletes a single charge";	$activate = ""; break;
		case 4:	$power = "will heal anyone that activates it for " . mt_rand(1,2) . "d" . (mt_rand(2,6)*2) . " damage";	break;
		case 5:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "will give +" . mt_rand(5,10) . " armor hits to whoever activates it for " . mt_rand(2,12) . " rounds";}
				else if ($game == "Swords & Six-Siders"){$power = "will give +" . mt_rand(1,2) . " damage reduction to whoever activates it for " . mt_rand(2,12) . " rounds";}
				else {$power = "will give +" . mt_rand(1,5) . " protection to whoever activates it for " . mt_rand(2,12) . " rounds";}
			break;
		case 6:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "will allow a spellcaster reduce a spell casting cost by 10 points...per charge";}
				else if ($game == "Swords & Six-Siders"){$power = "will allow a spellcaster to recast any spell they have but only once per day";}
				else {$power = "will allow a spellcaster to prepare an extra spell of " . powerUp($level) . " level per charge";}
			break;
		case 7:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$power = "can be thrown or hurled with a sling where upon impact it will explode for " . mt_rand(3,6) . "d6 damage to those in a 30 foot radius from the blast";	$activate = "";}
				else if ($game == "Swords & Six-Siders"){$power = "can be thrown or hurled with a sling where upon impact it will explode for " . mt_rand(1,3) . "d6 damage to those in a 30 foot radius from the blast";	$activate = "";}
				else {$power = "can be thrown or hurled with a sling where upon impact it will explode for " . mt_rand(3,6) . "d" . (mt_rand(2,6)*2) . " damage to those in a 30 foot radius from the blast";	$activate = "";}
			break;
		case 8:	$power = "will hypnotize another that it is directly shown to where they are forced to follow the suggestion of the possessor and thus forget they encountered the possessor";	break;
		case 9:	$power = "will purify any water that it is put into where each purification exhausts a charge";	$activate = ""; break;
	}
	if ($curst > 0){$power = $curse;}

	return $adj . " " . $power . "" . $activate . "...it has " . mt_rand(5,50) . " charges";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function helmType()
{
	switch (mt_rand(0,9))
	{
		case 0:	$hat = "feathered hat";	break;
		case 1:	$hat = "jester hat"; break;
		case 2:	$hat = "straw hat"; break;
		case 3:	$hat = "tall straw hat"; break;
		case 4:	$hat = "wide-brim hat"; break;
		case 5:	$hat = "wizard hat"; break;
		case 6:	$hat = "tricorne hat"; break;
		case 7:	$hat = "floppy hat"; break;
		case 8:	$hat = "skullcap"; break;
		case 9:	$hat = "bonnet"; break;
	}
	$value = $hat;
	switch (mt_rand(0,11))
	{
		case 0:	$value = "crown";	break;
		case 1:	$value = "helm";	break;
		case 2:	$value = "helmet";	break;
		case 3:	$value = "helm";	break;
		case 4:	$value = "helmet";	break;
		case 5:	$value = "tiarra";	break;
		case 6:	$value = "headband";break;
		case 7:	$value = "circlet";	break;
	}
	return $value;
}
function helmPower($helm,$curst,$level,$game)
{
	switch (mt_rand(0,3))
	{
		case 0:	
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$curse = "is cursed and will cause the wearer to lose " . mt_rand(1,5) . " " . abilityTranslate($game,INT) . " " . curseDuration(1,wearer,mt_rand(1,20));}
				else {$curse = "is cursed and will cause the wearer to become evil " . curseDuration(1,wearer,mt_rand(1,20));}
			break;
		case 1:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$curse = "is cursed and will cause the wearer to lose " . mt_rand(1,5) . " " . abilityTranslate($game,CHR) . " " . curseDuration(1,wearer,mt_rand(1,20));}
				else {$curse = "is cursed and will cause the wearer to become good " . curseDuration(1,wearer,mt_rand(1,20));}
			break;
		case 2:	$curse = "is cursed and the " . curseType(mt_rand(1,20),wearer,equip,$game);					break;
		case 3:	$curse = "is cursed and the " . curseType(mt_rand(1,20),wearer,equip,$game);					break;
	}

	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
	{
		switch (mt_rand(1,5))
		{
			case 1:	$special = "concentrate and create a wall of stone...but the item only has " . mt_rand(10,40) . " charges";						break;
			case 2:	$special = "concentrate and part a water no more than 100 feet across...but the item only has " . mt_rand(10,40) . " charges";							break;
			case 3:	$special = "concentrate and create a " . mt_rand(3,9) . "0 foot aura of daylight...but the item only has " . mt_rand(10,40) . " charges";		break;
			case 4:	$special = "concentrate and create a " . mt_rand(1,4) . "0 foot holy aura that undead cannot enter...but the item only has " . mt_rand(10,40) . " charges";	break;
			case 5:	$special = "concentrate and cause their weapon to become a slayer of " . slayerType('') . " for a single combat...which allows for double the combat dice...but the item only has " . mt_rand(10,40) . " charges";	break;
		}
	}
	else if ($game == "Swords & Six-Siders")
	{
		switch (mt_rand(0,3))
		{
			case 0:	$wall = "fire"; break;
			case 1:	$wall = "ice"; break;
			case 2:	$wall = "stone"; break;
			case 3:	$wall = "thorns"; break;
		}
		switch (mt_rand(0,4))
		{
			case 0:	$special = "concentrate and create a wall of " . $wall . "...but the item only has " . mt_rand(10,40) . " charges";						break;
			case 1:	$special = "concentrate and cast fireball...but the item only has " . mt_rand(10,40) . " charges";							break;
			case 2:	$special = "concentrate and create a " . mt_rand(3,9) . "0 foot aura of daylight...but the item only has " . mt_rand(10,40) . " charges";		break;
			case 3:	$special = "concentrate and create a " . mt_rand(1,4) . "0 foot holy aura that does " . mt_rand(1,2) . "d6 damage to undead...but the item only has " . mt_rand(10,40) . " charges";	break;
			case 4:	$special = "concentrate and cause their weapon to become a +" . " . mt_rand(2,3) . " . " slayer of " . slayerTypeSX() . "...but the item only has " . mt_rand(10,40) . " charges";	break;
		}
	}
	else
	{
		switch (mt_rand(0,4))
		{
			case 0:	$special = "concentrate and create a wall of fire...but the item only has " . mt_rand(10,40) . " charges";						break;
			case 1:	$special = "concentrate and cast fireball...but the item only has " . mt_rand(10,40) . " charges";							break;
			case 2:	$special = "concentrate and create a " . mt_rand(3,9) . "0 foot aura of daylight...but the item only has " . mt_rand(10,40) . " charges";		break;
			case 3:	$special = "concentrate and create a " . mt_rand(1,4) . "0 foot holy aura that does " . mt_rand(1,2) . "d" . (mt_rand(2,6)*2) . " damage to undead...but the item only has " . mt_rand(10,40) . " charges";	break;
			case 4:	$special = "concentrate and cause their weapon to become a slayer of " . slayerType('') . "...but the item only has " . mt_rand(10,40) . " charges";	break;
		}
	}

	if (($helm == "crown") || ($helm == "tiarra")){$decorate = preciousChooser() . " " . $helm . " has " . mt_rand(2,14) . " " . gemChooser() . "s set in it and"; $written = "etched inside it";}
	else if (($helm == "helm") || ($helm == "helmet"))
	{
		$decorate = preciousChooser() . " " . $helm;			$written = "etched inside of it";
		if (mt_rand(1,100) > 50){$decorate = preciousChooser() . " " . $helm . " has a " . designType(0) . " symbol on the sides and";}
	}
	else if ($helm == "circlet"){$decorate = preciousChooser() . " " . $helm . " has a " . gemChooser() . " set in it and";	$written = "etched inside of it";}
	else if ($helm == "headband"){$decorate = leatherColor() . " " . materialType(leather) . " skin " . $helm;	$written = "stitched inside of it";}
	else if ($helm == "jester hat"){$decorate = "multi-colored " . $helm;	$written = "stitched inside of it";}
	else if (($helm == "feathered hat") || ($helm == "jester hat") || ($helm == "wide-brim hat") || ($helm == "wizard hat") || ($helm == "tricorne hat") || ($helm == "floppy hat") || ($helm == "skullcap") || ($helm == "bonnet"))
		{$decorate = candleColor(0) . " " . $helm;		$written = "stitched inside of it";}
	else {$decorate = $helm;					$written = "stitched inside of it";}

	if (mt_rand(1,100) > 50){if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$written = "learned by identifying the item";} else {$written = "learned from identifying magic";}}

	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
	{
		switch (mt_rand(2,10))
		{
			case 2:	$power = "this " . $decorate . " grants the wearer the ability to appear exactly as another humanoid of medium or small size up to " . mt_rand(2,6) . " hours per day by simply saying the magic word while concentrating on how they want to look...the magic word to activate the power is `" . castingName() . "` which is " . $written;	break;
			case 3:	$power = "this " . $decorate . " grants the wearer the ability to read magic and other languages";						break;
			case 4:	$power = "this " . $decorate . " grants the wearer the ability to read one`s mind and communicate telepathically...but only once per day";	break;
			case 5:	$power = "this " . $decorate . " allows the wearer to teleport " . mt_rand(2,20) . "0 feet, but only " . mt_rand(2,8) . " times per day...the magic word to activate the power is `" . castingName() . "` which is " . $written;	break;
			case 6:	$power = "this " . $decorate . " grants the wearer the ability to see perfectly underwater up to " . mt_rand(5,12) . "0 feet away and breathe normally...the magic word to activate the power is `" . castingName() . "` which is " . $written;	break;
			case 7:	$power = "this " . $decorate . " grants the wearer the ability to detect " . searchList() . " within " . mt_rand(1,5) . "0 feet if they concentrate...and only " . mt_rand(2,4) . " times per day";	break;
			case 8:	$power = "this " . $decorate . " grants the wearer the ability to " . $special;									break;
			case 9:	$power = "this " . $decorate . " increases the wearer`s " . abilityTranslate($game,CHR) . " by " . mt_rand(2,9) . " points while wearing it";				break;
			case 10:$power = "this " . $decorate . " increases the wearer`s " . abilityType($game) . " by " . mt_rand(2,10) . " points while wearing it";						break;
		}
	}
	else if ($game == "Swords & Six-Siders")
	{
		switch (mt_rand(0,9))
		{
			case 0:	$power = "this " . $decorate . " increases the wearer`s charisma by " . mt_rand(1,2) . " while wearing it";				break;
			case 1:	$power = "this " . $decorate . " increases the wearer`s " . abilityType($game) . " by 1 point while wearing it";						break;
			case 2:	$power = "this " . $decorate . " grants the wearer the ability to appear exactly as another humanoid of medium or small size up to " . mt_rand(2,6) . " hours per day by simply saying the magic word while concentrating on how they want to look...the magic word to activate the power is `" . castingName() . "` which is " . $written;	break;
			case 3:	$power = "this " . $decorate . " allows the wearer to make a magical attack with their mind causing " . mt_rand(1,3) . "d6 damage once per day";	break;
			case 4:	$power = "this " . $decorate . " grants the wearer the ability to read magic and other languages";						break;
			case 5:	$power = "this " . $decorate . " grants the wearer the ability to read one`s mind and communicate telepathically...but only once per day";	break;
			case 6:	$power = "this " . $decorate . " allows the wearer to teleport " . mt_rand(2,20) . "0 feet, but only " . mt_rand(2,8) . " times per day...the magic word to activate the power is `" . castingName() . "` which is " . $written;	break;
			case 7:	$power = "this " . $decorate . " grants the wearer the ability to see perfectly underwater up to " . mt_rand(5,12) . "0 feet away and breathe normally...the magic word to activate the power is `" . castingName() . "` which is " . $written;	break;
			case 8:	$power = "this " . $decorate . " grants the wearer the ability to detect " . searchList() . " within " . mt_rand(1,5) . "0 feet if they concentrate...and only " . mt_rand(2,4) . " times per day";	break;
			case 9:	$power = "this " . $decorate . " grants the wearer the ability to " . $special;									break;
		}
	}
	else
	{
		switch (mt_rand(0,9))
		{
			case 0:	$power = "this " . $decorate . " increases the wearer`s charisma by " . mt_rand(2,3) . " points while wearing it";				break;
			case 1:	$power = "this " . $decorate . " increases the wearer`s " . abilityType($game) . " by 1 point while wearing it";						break;
			case 2:	$power = "this " . $decorate . " grants the wearer the ability to appear exactly as another humanoid of medium or small size up to " . mt_rand(2,6) . " hours per day by simply saying the magic word while concentrating on how they want to look...the magic word to activate the power is `" . castingName() . "` which is " . $written;	break;
			case 3:	$power = "this " . $decorate . " allows the wearer to make a magical attack with their mind causing " . mt_rand(1,4) . "d" . (mt_rand(2,6)*2) . " damage once per day";	break;
			case 4:	$power = "this " . $decorate . " grants the wearer the ability to read magic and other languages";						break;
			case 5:	$power = "this " . $decorate . " grants the wearer the ability to read one`s mind and communicate telepathically...but only once per day";	break;
			case 6:	$power = "this " . $decorate . " allows the wearer to teleport " . mt_rand(2,20) . "0 feet, but only " . mt_rand(2,8) . " times per day...the magic word to activate the power is `" . castingName() . "` which is " . $written;	break;
			case 7:	$power = "this " . $decorate . " grants the wearer the ability to see perfectly underwater up to " . mt_rand(5,12) . "0 feet away and breathe normally...the magic word to activate the power is `" . castingName() . "` which is " . $written;	break;
			case 8:	$power = "this " . $decorate . " grants the wearer the ability to detect " . searchList() . " within " . mt_rand(1,5) . "0 feet if they concentrate...and only " . mt_rand(2,4) . " times per day";	break;
			case 9:	$power = "this " . $decorate . " grants the wearer the ability to " . $special;									break;
		}
	}

	if ($curst > 0){$power = "this " . $decorate . " " . $curse;}
	return $power;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function searchList()
{
	switch (mt_rand(0,10))
	{
		case 0:	$value = "traps";		break;
		case 1:	$value = "poison";		break;
		case 2:	$value = "secret doors";	break;
		case 3:	$value = "monsters";		break;
		case 4:	$value = "illusions";		break;
		case 5:	$value = "invisible things";	break;
		case 6:	$value = "cursed things";	break;
		case 7:	$value = "gems";		break;
		case 8:	$value = "jewelry";		break;
		case 9:	$value = "coins";		break;
		case 10:$value = "magical things";	break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function lycanthrope()
{
	$value = array('werebear', 'wereboar', 'wererat', 'weretiger', 'werewolf', 'werewolf', 'werewolf', 'werewolf');
	return $value[mt_rand(0,7)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function protectionType()
{
	$bonus = mt_rand(1,100);
	if ($bonus < 70){$bon = "+1";}
	else if ($bonus < 83){$bon = "+2";}
	else if ($bonus < 84){$bon = "+2 (on self and all friends 5 feet away)";}
	else if ($bonus < 91){$bon = "+3";}
	else if ($bonus < 92){$bon = "+3 (on self and all friends 5 feet away)";}
	else if ($bonus < 94){$bon = "+4";}
	else if ($bonus < 96){$bon = "+4 (+2 on save rolls)";}
	else if ($bonus < 98){$bon = "+5";}
	else if ($bonus < 99){$bon = "+5 (+1 on save rolls)";}
	else if ($bonus < 100){$bon = "+6";}
	else {$bon = "+6 (+1 on save rolls)";}

	return $bon;
}
?>