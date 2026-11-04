<?php

function sizeMake()
{
	$make = array('large', 'long', 'short', 'round', 'low', 'square', 'small');
	return $make[mt_rand(0,6)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function sizeMakeWall()
{
	$make = array('large', 'tall', 'short', 'round', 'wide', 'square', 'small');
	return $make[mt_rand(0,6)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function timeSpan($type)
{
	if ($type == "per"){ $time = array('hour', 'day', 'week', 'month', 'season', 'year'); $pick = $time[mt_rand(0,5)]; }
	else if ($type == "often"){ $time = array('once', 'twice', 'three times', 'four times', 'five times', 'six times', 'seven times', 'eight times', 'nine times', 'ten times'); $pick = $time[mt_rand(0,9)]; }
	else if ($type == "round"){ $time = array('rounds', 'turns', 'minutes', 'hours'); $pick = $time[mt_rand(0,3)]; }
	return $pick;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function itisStrange()
{
	switch (mt_rand(0,5))
	{
		case 0:	$look = "an odd";		break;
		case 1:	$look = "a bizarre";	break;
		case 2:	$look = "a curious";	break;
		case 3:	$look = "a peculiar";	break;
		case 4:	$look = "a strange";	break;
		case 5:	$look = "a weird";		break;
	}
	return $look;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function woodenType()
{
	switch (mt_rand(0,6))
	{
		case 0:	$value = "maple";		break;
		case 1:	$value = "cedar";		break;
		case 2:	$value = "oak";			break;
		case 3:	$value = "rosewood";	break;
		case 4:	$value = "walnut";		break;
		case 5:	$value = "mahogany";	break;
		case 6:	$value = "birch";		break;
	}
	return $value;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function itemValues($game,$chance)
{
	if ($chance > 0){$x=1; $y=3;} else {$x=0; $y=0;}
	switch (mt_rand($x,$y))
	{
		case 0:	$worth = "";	break;
		case 1:	$worth = " worth " . mt_rand(2,10) . " " . coinMaker($game);	break;
		case 2:	$worth = " worth " . mt_rand(10,50) . " " . coinMaker($game);	break;
		case 3:	$worth = " worth " . mt_rand(20,100) . " " . coinMaker($game);	break;
	}
	return $worth;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function conditionType($category)
{
	if ($category == "cloth")
	{
		switch (mt_rand(0,7))
		{
			case 0:	$value = "torn ";	break;
			case 1:	$value = "ripped ";	break;
			case 2:	$value = "ruined ";	break;
			case 3:	$value = "moldy ";	break;
		}
	}
	else if ($category == "iron")
	{
		switch (mt_rand(0,7))
		{
			case 0:	$value = "rusty ";	break;
			case 1:	$value = "corroded ";	break;
			case 2:	$value = "bent ";	break;
			case 3:	$value = "ruined ";	break;
		}
	}
	else if ($category == "wood")
	{
		switch (mt_rand(0,7))
		{
			case 0:	$value1 = "warped ";	break;
			case 1:	$value1 = "ruined ";	break;
			case 2:	$value1 = "cracked ";	break;
			case 3:	$value1 = "moldy ";	break;
		}
	}
	else if ($category == "water")
	{
		switch (mt_rand(0,5))
		{
			case 0:	$value = "clean ";	break;
			case 1:	$value = "stagnant ";	break;
			case 2:	$value = "dirty ";	break;
			case 3:	$value = "murky ";	break;
			case 4:	$value = "oily ";	break;
			case 5:	$value = "poisoned ";	break;
		}
	}
	else if ($category == "item")
	{
		switch (mt_rand(0,5))
		{
			case 0:	$value = "broken ";	break;
			case 1:	$value = "ruined ";	break;
			case 2:	$value = "useless ";	break;
		}
	}
	else if ($category == "jar")
	{
		switch (mt_rand(0,5))
		{
			case 0:	$value = "broken ";	break;
			case 1:	$value = "ruined ";	break;
			case 2:	$value = "empty ";	break;
		}
	}
	else if ($category == "paper")
	{
		switch (mt_rand(0,3))
		{
			case 0:	$value = "blank ";	break;
			case 1:	$value = "ruined ";	break;
			case 2:	$value = "burnt ";	break;
			case 3:	$value = "wet ";	break;
		}
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function designType($painting)
{
	if ($painting == 1){$rn = 27;} else {$rn = 33;}
	switch (mt_rand(0,$rn))
	{
		case 0:	$value = "tower";	break;
		case 1: $value = "griffin";	break;
		case 2:	$value = "crown";	break;
		case 3:	$value = "sword";	break;
		case 4:	$value = "axe";		break;
		case 5:	$value = "lion";	break;
		case 6:	$value = "bear";	break;
		case 7:	$value = "bat";		break;
		case 8:	$value = "boar";	break;
		case 9:	$value = "buffalo";	break;
		case 10:$value = "chimera";	break;
		case 11:$value = "snake";	break;
		case 12:$value = "demon";	break;
		case 13:$value = "devil";	break;
		case 14:$value = "angel";	break;
		case 15:$value = "dragon";	break;
		case 16:$value = "dog";		break;
		case 17:$value = "eagle";	break;
		case 18:$value = "hawk";	break;
		case 19:$value = "hippogriff";	break;
		case 20:$value = "horse";	break;
		case 21:$value = "wolf";	break;
		case 22:$value = "pegasus";	break;
		case 23:$value = "ram";		break;
		case 24:$value = "skull";	break;
		case 25:$value = "spider";	break;
		case 26:$value = "unicorn";	break;
		case 27:$value = "scorpion";	break;
		case 28:$value = "hand";	break;
		case 29:$value = "fist";	break;
		case 30:$value = "eye";		break;
		case 31:$value = "cross";	break;
		case 32:$value = "woman";	break;
		case 33:$value = "man";		break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function materialType($category)
{
	if ($category == "leather")
	{
		$value = "animal";
		switch (mt_rand(0,35))
		{
			case 0:	$value = "deer";	break;
			case 1:	$value = "wolf";	break;
			case 2:	$value = "dinosaur";	break;
			case 3:	$value = "dragon";	break;
			case 4:	$value = "crocodile";	break;
			case 5:	$value = "lizard";	break;
			case 6:	$value = "serpent";	break;
			case 7:	$value = "bear";	break;
			case 8:	$value = "lion";	break;
			case 9:	$value = "mammoth";	break;
			case 10:$value = "manticore";	break;
			case 11:$value = "rhinoceros";	break;
			case 12:$value = "sabretooth";	break;
			case 13:$value = "basilisk";	break;
			case 14:$value = "gargoyle";	break;
			case 15:$value = "unicorn";	break;
			case 16:$value = "pegasus";	break;
			case 17:$value = "demon";	break;
			case 18:$value = "griffin";	break;
			case 19:$value = "alligator";	break;
			case 20:$value = "snake";	break;
		}
	}
	else if ($category == "iron")
	{
		switch (mt_rand(0,10))
		{
			case 0:	$value = "iron";	break;
			case 1:	$value = "steel";	break;
			case 2:	$value = "bronze";	break;
			case 3:	$value = "adamant";	break;
			case 4:	$value = "mithril";	break;
			case 5:	$value = "gold";	break;
			case 6:	$value = "silver";	break;
			case 7:	$value = "iron";	break;
			case 8:	$value = "steel";	break;
			case 9:	$value = "iron";	break;
			case 10:$value = "steel";	break;
		}
	}
	else if ($category == "fur")
	{
		switch (mt_rand(0,16))
		{
			case 0:	$value = "yeti";				break;
			case 1:	$value = "bear";		if (mt_rand(1,5) == 1){$value = "polar bear";}	break;
			case 2:	$value = "deer";		if (mt_rand(1,2) == 1){$value = "stag";}		break;
			case 3:	$value = "badger";				break;
			case 4:	$value = "mammoth";		if (mt_rand(1,2) == 1){$value = "mastadon";}	break;
			case 5:	$value = "buffalo";				break;
			case 6:	$value = "camel";				break;
			case 7:
				switch (mt_rand(0,7))
				{
					case 0:	$value = "cheetah";				break;
					case 1:	$value = "leopard";				break;
					case 2:	$value = "lion";				break;
					case 3:	$value = "panther";				break;
					case 4:	$value = "lynx";				break;
					case 5:	$value = "cougar";				break;
					case 6:	$value = "sabretooth tiger";	break;
					case 7:	$value = "tiger";				break;
				}
				break;
			case 8:	$value = "goat";				break;
			case 9:	$value = "griffin";				break;
			case 10:$value = "hippogriff";			break;
			case 11:$value = "hyena";		if (mt_rand(1,5) == 1){$value = "jackal";}		if (mt_rand(1,2) == 1){$value = "wolf";}	break;
			case 12:$value = "otter";				break;
			case 13:$value = "wooly rhinoceros";	break;
			case 14:$value = "unicorn";		if (mt_rand(1,2) == 1){$value = "pegasus";}	break;
			case 15:$value = "weasel";				break;
			case 16:$value = "wolverine";			break;
		}
	}
	else if ($category == "wood")
	{
		switch (mt_rand(0,6))
		{
			case 0:	$value1 = "wood";			break;
			case 1:	$value1 = "oak";			break;
			case 2:	$value1 = "maple";			break;
			case 3:	$value1 = "yew wood";		break;
			case 4:	$value1 = "reaper wood";	break;
			case 5:	$value1 = "wood";			break;
			case 6:	$value1 = "wood";			break;
		}
		switch (mt_rand(0,6))
		{
			case 0:	$value3 = "carved";		break;
			case 1:	$value3 = "crafted";	break;
			case 2:	$value3 = "formed";		break;
			case 3:	$value3 = "assembled";	break;
			case 4:	$value3 = "fashioned";	break;
			case 5:	$value3 = "whittled";	break;
			case 6:	$value3 = "sculpted";	break;
		}
		return $value3 . " " . $value1;
	}
	else if ($category == "cloth")
	{
		switch (mt_rand(0,6))
		{
			case 0:	$value1 = "cotton";			break;
			case 1:	$value1 = "silk";			break;
			case 2:	$value1 = "hemp";			break;
			case 3:	$value1 = "wool";			break;
			case 4:	$value1 = "fur";			break;
			case 5:	$value1 = "cloth";			break;
			case 6:	$value1 = "cloth";			break;
		}
		switch (mt_rand(0,4))
		{
			case 0:	$value3 = "sewn";		break;
			case 1:	$value3 = "knitted";	break;
			case 2:	$value3 = "tailored";	break;
			case 3:	$value3 = "stitched";	break;
			case 4:	$value3 = "fashioned";	break;
		}
		return $value3 . " " . $value1;
	}
	else if ($category == "bow")
	{
		switch (mt_rand(0,6))
		{
			case 0:	$value1 = "wood";			break;
			case 1:	$value1 = "oak";			break;
			case 2:	$value1 = "maple";			break;
			case 3:	$value1 = "yew wood";		break;
			case 4:	$value1 = "reaper wood";	break;
			case 5:	$value1 = "wood";			break;
			case 6:	$value1 = "wood";			break;
		}
		switch (mt_rand(0,6))
		{
			case 0:	$value2 = "ranger";		break;
			case 1:	$value2 = "elven";		break;
			case 2:	$value2 = "magically";	break;
			case 3:	$value2 = "sylvan";		break;
			case 4:	$value2 = "druid";		break;
			case 5:	$value2 = "bowyer";		break;
			case 6:	$value2 = "fletcher";	break;
		}
		switch (mt_rand(0,6))
		{
			case 0:	$value3 = "carved";		break;
			case 1:	$value3 = "crafted";	break;
			case 2:	$value3 = "formed";		break;
			case 3:	$value3 = "assembled";	break;
			case 4:	$value3 = "fashioned";	break;
			case 5:	$value3 = "whittled";	break;
			case 6:	$value3 = "sculpted";	break;
		}
		return $value2 . " " . $value3 . " of " . $value1;
	}
	else if ($category == "mwood")
	{
		switch (mt_rand(0,6))
		{
			case 0:	$value1 = "wood";			break;
			case 1:	$value1 = "oak";			break;
			case 2:	$value1 = "maple";			break;
			case 3:	$value1 = "yew wood";		break;
			case 4:	$value1 = "reaper wood";	break;
			case 5:	$value1 = "wood";			break;
			case 6:	$value1 = "wood";			break;
		}
		switch (mt_rand(0,4))
		{
			case 0:	$value2 = "ranger";		break;
			case 1:	$value2 = "elven";		break;
			case 2:	$value2 = "magically";	break;
			case 3:	$value2 = "sylvan";		break;
			case 4:	$value2 = "druid";		break;
		}
		switch (mt_rand(0,6))
		{
			case 0:	$value3 = "carved";		break;
			case 1:	$value3 = "crafted";	break;
			case 2:	$value3 = "formed";		break;
			case 3:	$value3 = "assembled";	break;
			case 4:	$value3 = "fashioned";	break;
			case 5:	$value3 = "whittled";	break;
			case 6:	$value3 = "sculpted";	break;
		}
		return $value2 . " " . $value3 . " of " . $value1;
	}
	else if ($category == "mcloth")
	{
		switch (mt_rand(0,6))
		{
			case 0:	$value1 = "cotton";			break;
			case 1:	$value1 = "silk";			break;
			case 2:	$value1 = "hemp";			break;
			case 3:	$value1 = "wool";			break;
			case 4:	$value1 = "fur";			break;
			case 5:	$value1 = "cloth";			break;
			case 6:	$value1 = "cloth";			break;
		}
		switch (mt_rand(0,4))
		{
			case 0:	$value2 = "elven";		break;
			case 1:	$value2 = "finely";		break;
			case 2:	$value2 = "magically";	break;
			case 3:	$value2 = "elegantly";	break;
			case 4:	$value2 = "exquisitely";break;
		}
		switch (mt_rand(0,4))
		{
			case 0:	$value3 = "sewn";		break;
			case 1:	$value3 = "knitted";	break;
			case 2:	$value3 = "tailored";	break;
			case 3:	$value3 = "stitched";	break;
			case 4:	$value3 = "fashioned";	break;
		}
		return $value2 . " " . $value3 . " of " . $value1;
	}
	else
	{
		switch (mt_rand(0,11))
		{
			case 0:	$value = "iron";	break;
			case 1:	$value = "steel";	break;
			case 2:	$value = "bronze";	break;
			case 3:	$value = "wood";	break;
			case 4:	$value = "metal";	break;
			case 5:	$value = "gold";	break;
			case 6:	$value = "silver";	break;
			case 7:	$value = "wood";	break;
			case 8:	$value = "wood";	break;
			case 9:	$value = "wood";	break;
			case 10:$value = "wood";	break;
			case 11:$value = "bone";	break;
		}
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function animalType()
{
	switch (mt_rand(0,6))
	{
		case 0:	$value = "mammals";	break;
		case 1:	$value = "birds";	break;
		case 2:	$value = "reptiles";	break;
		case 3:	$value = "mammals";	break;
		case 4:	$value = "birds";	break;
		case 5:	$value = "reptiles";	break;
		case 6:	$value = "any animal";	break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function birdType()
{
	switch (mt_rand(0,17))
	{
		case 0:	$value = "hawk";		break;
		case 1:	$value = "eagle";		break;
		case 2:	$value = "crow";		break;
		case 3:	$value = "raven";		break;
		case 4:	$value = "sparrow";		break;
		case 5:	$value = "pelican";		break;
		case 6:	$value = "seagull";		break;
		case 7:	$value = "dove";		break;
		case 8:	$value = "pigeon";		break;
		case 9:	$value = "parrot";		break;
		case 10:$value = "raven";		break;
		case 11:$value = "cuckoo";		break;
		case 12:$value = "owl";			break;
		case 13:$value = "vulture";		break;
		case 14:$value = "woodpecker";	break;
		case 15:$value = "falcon";		break;
		case 16:$value = "swallow";		break;
		case 17:$value = "toucan";		break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function languageType($game)
{
	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe") || ($game == "Swords & Six-Siders"))
	{
		switch (mt_rand(0,23))
		{
			case 0: $value = "balrog"; break;
			case 1: $value = "brownie"; break;
			case 2: $value = "centaur"; break;
			case 3: $value = "devlish"; break;
			case 4: $value = "dragon"; break;
			case 5: $value = "dwarvish"; break;
			case 6: $value = "elven"; break;
			case 7: $value = "fey"; break;
			case 8: $value = "gargoyle"; break;
			case 9: $value = "giant"; break;
			case 10: $value = "gnoll"; break;
			case 11: $value = "goblin"; break;
			case 12: $value = "gremlin"; break;
			case 13: $value = "hobling"; if ($game == "Swords & Six-Siders"){$value="halfling";} break;
			case 14: $value = "mermen"; break;
			case 15: $value = "minotaur"; break;
			case 16: $value = "naga"; break;
			case 17: $value = "ogrish"; break;
			case 18: $value = "orkish"; if ($game == "Swords & Six-Siders"){$value="orcish";} break;
			case 19: $value = "sphinx"; break;
			case 20: $value = "treekin"; break;
			case 21: $value = "trollish"; break;
			case 22: $value = "undead"; break;
			case 23: $value = "vampire"; break;
		}
	}
	else
	{
		switch (mt_rand(0,7))
		{
			case 0:	$value = "elvish";		break;
			case 1:	$value = "dwarvish";	break;
			case 2:	$value = "human";		break;
			case 3:	$value = "orcish";		break;
			case 4:	$value = "goblinoid";	break;
			case 5:	$value = "gnomish";		break;
			case 6:	$value = "demonic";		break;
			case 7:	$value = "draconic";	break;
		}
	}
	switch (mt_rand(0,5))
	{
		case 0:	$adj = "a ";			break;
		case 1:	$adj = "an odd ";		break;
		case 2:	$adj = "an ancient ";	break;
		case 3:	$adj = "a long dead ";	break;
		case 4:	$adj = "a cryptic ";	break;
		case 5:	$adj = "a ";			break;
	}
	return $adj . "" . $value . " language";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function dragonType($potion)
{
	if ($potion > 0){$val = mt_rand(0,9);} else {$val = mt_rand(0,17);}
	switch ($val)
	{
		case 0:	$value = "white dragon";	break;
		case 1:	$value = "black dragon";	break;
		case 2:	$value = "green dragon";	break;
		case 3:	$value = "blue dragon";		break;
		case 4:	$value = "red dragon";		break;
		case 5:	$value = "brass dragon";	break;
		case 6:	$value = "copper dragon";	break;
		case 7:	$value = "bronze dragon";	break;
		case 8:	$value = "silver dragon";	break;
		case 9:	$value = "gold dragon";		break;
		case 10:$value = "wyrm";			break;
		case 11:$value = "cloud dragon";	break;
		case 12:$value = "mist dragon";		break;
		case 13:$value = "shadow dragon";	break;
		case 14:$value = "wyvern";			break;
		case 15:$value = "hydra";			break;
		case 16:$value = "vile dragon";		break;
		case 17:$value = "kind dragon";		break;
	}
	if ($potion > 0){$value = $value;} else {$value = $value . "s";}

	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function giantType($potion)
{
	if ($potion > 0){$val = mt_rand(0,7);} else {$val = mt_rand(0,12);}
	switch ($val)
	{
		case 0:	$value = "cloud giants";	break;
		case 1:	$value = "fire giants";		break;
		case 2:	$value = "fog giants";		break;
		case 3:	$value = "frost giants";	break;
		case 4:	$value = "hill giants";		break;
		case 5:	$value = "mountain giants";	break;
		case 6:	$value = "stone giants";	break;
		case 7:	$value = "storm giants";	break;
		case 8:	$value = "cyclops";			break;
		case 9:	$value = "ettins";			break;
		case 10:$value = "ogres";			break;
		case 11:$value = "titans";			break;
		case 12:$value = "trolls";			break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function animalPicker()
{
	switch (mt_rand(0,39))
	{
		case 0: $animal = "Badger"; break;
		case 1: $animal = "Bat"; break;
		case 2: $animal = "Bear"; break;
		case 3: $animal = "Beaver"; break;
		case 4: $animal = "Bird"; break;
		case 5: $animal = "Boar"; break;
		case 6: $animal = "Buffalo"; break;
		case 7: $animal = "Bull"; break;
		case 8: $animal = "Camel"; break;
		case 9: $animal = "Cat"; break;
		case 10: $animal = "Cheetah"; break;
		case 11: $animal = "Dog"; break;
		case 12: $animal = "Elephant"; break;
		case 13: $animal = "Goat"; break;
		case 14: $animal = "Gorilla"; break;
		case 15: $animal = "Hippopotamus"; break;
		case 16: $animal = "Horse"; break;
		case 17: $animal = "Hyena"; break;
		case 18: $animal = "Jackal"; break;
		case 19: $animal = "Jaguar"; break;
		case 20: $animal = "Leopard"; break;
		case 21: $animal = "Lion"; break;
		case 22: $animal = "Lynx"; break;
		case 23: $animal = "Mammoth"; break;
		case 24: $animal = "Mastodon"; break;
		case 25: $animal = "Mule"; break;
		case 26: $animal = "Otter"; break;
		case 27: $animal = "Owl"; break;
		case 28: $animal = "Pony"; break;
		case 29: $animal = "Porcupine"; break;
		case 30: $animal = "Ram"; break;
		case 31: $animal = "Rat"; break;
		case 32: $animal = "Rhinoceros"; break;
		case 33: $animal = "Tiger"; break;
		case 34: $animal = "Skunk"; break;
		case 35: $animal = "Squirrel"; break;
		case 36: $animal = "Stag"; break;
		case 37: $animal = "Weasel"; break;
		case 38: $animal = "Wolf"; break;
		case 39: $animal = "Wolverine"; break;
	}
	return $animal;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function humanType()
{
	switch (mt_rand(0,11))
	{
		case 0:	$value = "bugbears";	break;
		case 1:	$value = "dwarves";	break;
		case 2:	$value = "elves";	break;
		case 3:	$value = "gnolls";	break;
		case 4:	$value = "gnomes";	break;
		case 5:	$value = "goblins";	break;
		case 6:	$value = "hobbits";	break;
		case 7:	$value = "humans";	break;
		case 8:	$value = "hobgoblins";	break;
		case 9:	$value = "kobolds";	break;
		case 10:$value = "orcs";	break;
		case 11:$value = "troglodites";	break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function undeadType()
{
	switch (mt_rand(0,10))
	{
		case 0:	$value = "ghasts";	break;
		case 1:	$value = "ghosts";	break;
		case 2:	$value = "ghouls";	break;
		case 3:	$value = "shadows";	break;
		case 4:	$value = "skeletons";	break;
		case 5:	$value = "spectres";	break;
		case 6:	$value = "wights";	break;
		case 7:	$value = "wraiths";	break;
		case 8:	$value = "vampires";	break;
		case 9:	$value = "zombies";	break;
		case 10:$value = "mummies";	break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function elementalType($game)
{
	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe") || ($game == "Swords & Six-Siders"))
	{
		switch (mt_rand(0,9))
		{
			case 0:	$value = "water elemental";		break;
			case 1:	$value = "earth elemental";		break;
			case 2:	$value = "air elemental";		break;
			case 3:	$value = "fire elemental";		break;
			case 4:	$value = "acid elemental";		break;
			case 5:	$value = "blood elemental";		break;
			case 6:	$value = "lightning elemental";	break;
			case 7:	$value = "rock elemental";		break;
			case 8:	$value = "smoke elemental";		break;
			case 9:	$value = "any elemental";		break;
		}
	}
	else
	{
		switch (mt_rand(0,8))
		{
			case 0:	$value = "water elemental";	break;
			case 1:	$value = "earth elemental";	break;
			case 2:	$value = "air elemental";	break;
			case 3:	$value = "fire elemental";	break;
			case 4:	$value = "water elemental";	break;
			case 5:	$value = "earth elemental";	break;
			case 6:	$value = "air elemental";	break;
			case 7:	$value = "fire elemental";	break;
			case 8:	$value = "any elemental";	break;
		}
	}

	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function polymorphType()
{
	switch (mt_rand(0,11))
	{
		case 0:	$value = "toad";	break;
		case 1:	$value = "frog";	break;
		case 2:	$value = "snake";	break;
		case 3:	$value = "bird";	break;
		case 4:	$value = "mouse";	break;
		case 5:	$value = "rat";		break;
		case 6:	$value = "squirrel";	break;
		case 7:	$value = "chipmunk";	break;
		case 8:	$value = "skunk";	break;
		case 9:	$value = "sheep";	break;
		case 10:$value = "rabbit";	break;
		case 11:$value = "lizard";	break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function caveDescription()
{
	$qty = array('many', 'a few', 'some', 'a couple of');
	$hig = array('looming', 'sharp', 'crumbling', 'loose', 'thick', 'thin', 'dripping', 'short', 'long');
	$low = array('sharp', 'low', 'loose', 'thick', 'thin', 'short', 'long');
	$prt = array('part', 'section', 'area');
	$cav = array('cave', 'cavern', 'tunnel');
	$mad = array('stone', 'rock', 'limestone', 'limestone', 'dolomite', 'gypsum');
	$wal = array('walls', 'ceiling', 'walls and ceiling', 'floor', 'walls and floor', 'ceiling and floor');
	$min = array('gold', 'silver', 'copper', 'platinum', 'iron', 'iron', 'lead');
	$gem = array('garnets', 'opals', 'quartz', 'sapphires', 'rubies', 'topaz', 'tourmalines', 'turquoise', 'amethysts', 'aquamarines', 'diamonds', 'emeralds', 'peridots', 'spinels');
	$hol = array('small holes', 'holes of varying sizes', 'large holes');
	$slm = array('moisture', 'cobwebs', 'slime', 'moss', 'mold', 'grime', 'scrapes', 'scratches', 'blood');
	$pud = array('puddles of water', 'pools of water', 'blood stains', 'patches of moss', 'scrapes', 'scratches', 'bits of fur');
	$stk = array('protruding from', 'sticking out of', 'extending from', 'poking out from');

	switch (mt_rand(1,5))
	{
		case 1:	$stal = " There are " . $qty[mt_rand(0,3)] . " " . $low[mt_rand(0,6)] . " stalagmites " . $stk[mt_rand(0,3)] . " the floor, with " . $qty[mt_rand(0,3)] . " " . $hig[mt_rand(0,8)] . " stalactites " . $stk[mt_rand(0,3)] . " the ceiling.";	break;
		case 2:	$stal = " There are " . $qty[mt_rand(0,3)] . " " . $hig[mt_rand(0,8)] . " stalactites " . $stk[mt_rand(0,3)] . " the ceiling.";	break;
		case 3:	$stal = " There are " . $qty[mt_rand(0,3)] . " " . $low[mt_rand(0,6)] . " stalagmites " . $stk[mt_rand(0,3)] . " the floor.";	break;
	}

	switch (mt_rand(1,10))
	{
		case 1:	$deco = " with " . $slm[mt_rand(0,8)] . " on the surface of the " . $mad[mt_rand(0,5)] . " " . $wal[mt_rand(0,5)];	break;
		case 2:	$deco = " and seems mostly formed of " . $mad[mt_rand(0,5)];	break;
		case 3:	$deco = " with water dripping from the " . $mad[mt_rand(0,5)] . " " . $wal[mt_rand(0,2)];	break;
		case 4:	$deco = " with veins of " . $min[mt_rand(0,6)] . " ore in the  " . $mad[mt_rand(0,5)] . " " . $wal[mt_rand(0,5)];	break;
		case 5:	$deco = " with " . $qty[mt_rand(0,3)] . " " . $gem[mt_rand(0,13)] . " in the  " . $mad[mt_rand(0,5)] . " " . $wal[mt_rand(0,5)];	break;
		case 6:	$deco = " with " . $qty[mt_rand(0,3)] . " " . $hol[mt_rand(0,2)] . " in the  " . $mad[mt_rand(0,5)] . " " . $wal[mt_rand(0,5)];	break;
		case 7:	$deco = " with " . $qty[mt_rand(0,3)] . " " . $pud[mt_rand(0,6)] . " on the  " . $mad[mt_rand(0,5)] . " floor";	break;
	}

	$cave = "This " . $prt[mt_rand(0,2)] . " of the " . $cav[mt_rand(0,2)] . " is about " . mt_rand(9,40) . " feet high" . $deco . "." . $stal;

	return $cave;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function abilityType($game)
{
	if ($game == "Tunnels & Trolls 5th Edition")
	{
		switch (mt_rand(0,5))
		{
			case 0:	$value = "strength";		break;
			case 1:	$value = "constitution";	break;
			case 2:	$value = "dexterity";		break;
			case 3:	$value = "intelligence";	break;
			case 4:	$value = "luck";			break;
			case 5:	$value = "charisma";		break;
		}
	}
	else if ($game == "Tunnels & Trolls 7th Edition" || $game == "Tunnels & Trolls Deluxe")
	{
		switch (mt_rand(0,7))
		{
			case 0:	$value = "strength";		break;
			case 1:	$value = "constitution";	break;
			case 2:	$value = "dexterity";		break;
			case 3:	$value = "speed";			break;
			case 4:	$value = "intelligence";	break;
			case 5:	$value = "wizardry";		break;
			case 6:	$value = "luck";			break;
			case 7:	$value = "charisma";		break;
		}
	}
	else
	{
		switch (mt_rand(0,5))
		{
			case 0:	$value = "strength";		break;
			case 1:	$value = "dexterity";		break;
			case 2:	$value = "intelligence";	break;
			case 3:	$value = "constitution";	break;
			case 4:	$value = "charisma";		break;
			case 5:	$value = "wisdom";			break;
		}
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function abilityTranslate($game,$ability)
{
	if ($game == "Tunnels & Trolls 5th Edition")
	{
		if ($ability == "STR"){$value = "STR";}
		else if ($ability == "DEX"){$value = "DEX";}
		else if ($ability == "CON"){$value = "CON";}
		else if ($ability == "CHR"){$value = "CHR";}
		else if ($ability == "SPD"){$value = "DEX";}
		else if ($ability == "WIZ"){$value = "INT";}
		else if ($ability == "LCK"){$value = "LCK";}
		else if ($ability == "INT"){$value = "INT";}
		else if ($ability == "POW"){$value = "STR";}
	}
	else
	{
		if ($ability == "POW"){$value = "WIZ";}
		else {$value = $ability;}
	}

	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function tomeType()
{
	switch (mt_rand(0,11))
	{
		case 0:	$value = "book";	break;
		case 1:	$value = "compendium";	break;
		case 2:	$value = "lexicon";	break;
		case 3:	$value = "manual";	break;
		case 4:	$value = "omnibus";	break;
		case 5:	$value = "tome";	break;
		case 6:	$value = "volume";	break;
		case 7:	$value = "journal";	break;
		case 8:	$value = "almanac";	break;
		case 9:	$value = "diary";	break;
		case 10:$value = "book";	break;
		case 11:$value = "book";	break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function bardType()
{
	switch (mt_rand(0,8))
	{
		case 0:	$value = "chimes";		break;
		case 1:	$value = "flute";		break;
		case 2:	$value = "drum";		break;
		case 3:	$value = "small harp";	break;
		case 4:	$value = "horn";		break;
		case 5:	$value = "lute";		break;
		case 6:	$value = "mandolin";	break;
		case 7:	$value = "pipes";		break;
		case 8:	$value = "recorder";	break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function niceClothType($size)
{
	if ($size == 1){$x=3;} else {$x=9;}
	switch (mt_rand(0,$x))
	{
		case 0:	$cloth = candleColor(0) . ", " . materialType(cloth) . " cloak";	break;
		case 1:	$cloth = candleColor(0) . ", " . materialType(cloth) . " shirt";	break;
		case 2:	$cloth = leatherColor() . " belt made of " . materialType(leather) . " skin and with a " . materialType(iron) . "  buckle";	break;
		case 3:	$cloth = candleColor(0) . ", " . materialType(cloth) . " cape";		break;
		case 4:	$cloth = candleColor(0) . ", " . materialType(cloth) . " dress";	break;
		case 5:	$cloth = candleColor(0) . ", " . materialType(cloth) . " robe";		break;
		case 6:	$cloth = candleColor(0) . ", " . materialType(cloth) . " coat";		break;
		case 7:	$cloth = "pair of " . leatherColor() . " boots made of " . materialType(leather) . " skin";		if (mt_rand(1,2) == 1){$cloth = "pair of boots made of " . materialType(fur) . " fur";} break;
		case 8:	$cloth = "pair of " . leatherColor() . " shoes made of " . materialType(leather) . " skin";		break;
		case 9:	$cloth = "pair of " . leatherColor() . " sandals made of " . materialType(leather) . " skin";	break;
	}
	return $cloth;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function rareCoins($amount,$needed)
{
	$amount = CEIL( mt_rand(($amount/2), $amount));
	if ($amount < 12){$amount = mt_rand(6,26);}
	switch (mt_rand(0,7))
	{
		case 0:	$material = "mithril";		break;
		case 1:	$material = "jade";			break;
		case 2:	$material = "palladium";	break;
		case 3:	$material = "bronze";		break;
		case 4:	$material = "iron";			break;
		case 5:	$material = "steel";		break;
		case 6:	$material = "sandstone";	break;
		case 7:	$material = "pewter";		break;
	}
	switch (mt_rand(0,13))
	{
		case 0:	$age = "from a long dead civilization";		break;
		case 1:	$age = "from an ancient race";				break;
		case 2:	$age = "of a secret order";					break;
		case 3:	$age = "of a far off land";					break;
		case 4:	$age = "of unknown origin";					break;
		case 5:	$age = "from long ago";						break;
		case 6:	$age = "from a lost city";					break;
		case 7:	$age = "from a mysterious land";			break;
		case 8:	$age = "from the dark times";				break;
		case 9:	$age = "of an old race";					break;
		case 10:$age = "of a lost race";					break;
		case 11:$age = "from a missing land";				break;
		case 12:$age = "from an unknown era";				break;
		case 13:$age = "used centuries ago";				break;
	}

	if ($needed > 0){$cash = "this coin was " . $age . " and is made of " . $material . " with a symbol of a " . designType(0) . " on it";}
	else {$cash = "coins " . $age . " that are made of " . $material . " with a symbol of a " . designType(0) . " on it (" . $amount . " ea)";}
	return $cash;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function furMaker($value)
{
	if ($value > 2000){$y = 0; $z = 8;} else if ($value > 1000){$y = 3; $z = 6;} else {$y = 0; $z = 3;} 
	switch (mt_rand($y,$z))
	{
		case 0:	$material = "muskrat";		break;
		case 1:	$material = "beaver";		break;
		case 2:	$material = "seal";			break;
		case 3:	$material = "fox";			break;
		case 4:	$material = "bear";			break;
		case 5:	$material = "marten";		break;
		case 6:	$material = "mink";			break;
		case 7:	$material = "ermine";		break;
		case 8:	$material = "sable";		break;
	}
	switch (mt_rand(0.5))
	{
		case 0:	$make = "cape";		break;
		case 1:	$make = "cloak";	break;
		case 2:	$make = "coat";		break;
		case 3:	$make = "blanket";	break;
		case 4:	$make = "pelt";		break;
		case 5:	$make = "pelt";		break;
	}

	return $material . " fur " . $make;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function potteryRare()
{
	switch (mt_rand(0,4))
	{
		case 0:	$make = "bowl";		break;
		case 1:	$make = "vase";		break;
		case 2:	$make = "jug";		break;
		case 3:	$make = "plate";	break;
		case 4:	$make = "bottle";	break;
	}
	switch (mt_rand(0,10))
	{
		case 0:	$material = "wooden";		break;
		case 1:	$material = "pewter";		break;
		case 2:	$material = "jade";			break;
		case 3:	$material = "ceramic";		break;
		case 4:	$material = "silver";		break;
		case 5: $material = "bronze";		break;
		case 6: $material = "clay";			break;
		case 7: $material = "porcelain";	break;
		case 8: $material = "brass";		break;
		case 9: $material = "golden";		break;
		case 10:$material = "crystal";		break;
	}

	return $material . " " . $make;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function displayWeapon($size)
{
	$gems_used = explode(" (", gemChooser()); $gems_used = $gems_used[0];
	$owner = manyName();

	switch (mt_rand(0,1))
	{
		case 0:	$hamm = "battle";		break;
		case 1:	$hamm = "war";			break;
	}

	if ($size == 1){$z = 1;} else if ($size == 2){$z = 7;} else {$z = 8;}
	switch (mt_rand(0,$z))
	{
		case 0:	$decoi = "dagger made of " . materialType(iron);		$gemit = " where the handle is decorated with " . mt_rand(2,6) . " " . $gems_used . "s";		$engrave = " and the name of `" . $owner . "` is engraved on the blade";		break;
		case 1:	$decoi = "knife made of " . materialType(iron);			$gemit = " where the handle is decorated with " . mt_rand(2,6) . " " . $gems_used . "s";		$engrave = " and the name of `" . $owner . "` is engraved on the blade";		break;
		case 2:	$decoi = "crown made of " . materialType(iron);			$gemit = " and is decorated with " . mt_rand(2,6) . " " . $gems_used . "s";					$engrave = " and the name of `" . $owner . "` is engraved on the inside";		break;
		case 3:	$decoi = "helm made of " . materialType(iron);			$gemit = " and is decorated with " . mt_rand(2,6) . " " . $gems_used . "s";					$engrave = " and the name of `" . $owner . "` is engraved on the inside";		break;
		case 4:	$decoi = $hamm . " hammer made of " . materialType(iron);	$gemit = " where the handle is decorated with " . mt_rand(2,6) . " " . $gems_used . "s";		$engrave = " and the name of `" . $owner . "` is engraved on the head";			break;
		case 5:	$decoi = "sword made of " . materialType(iron);			$gemit = " where the hilt is decorated with " . mt_rand(2,6) . " " . $gems_used . "s";		$engrave = " and the name of `" . $owner . "` is engraved on the blade";		break;
		case 6:	$decoi = "axe made of " . materialType(iron);			$gemit = " where the handle is decorated with " . mt_rand(2,6) . " " . $gems_used . "s";		$engrave = " and the name of `" . $owner . "` is engraved on the head";		break;
		case 7:	$decoi = "shield made of " . materialType(iron);		$gemit = " with a " . designType(0) . " symbol on it that is " . designColor() . " in color";		$engrave = " and the edge is decorated with " . mt_rand(4,12) . " " . $gems_used . "s";	break;
		case 8:	$decoi = "suit of armor made of " . materialType(iron);	$gemit = " with a " . designType(0) . " symbol on the chest piece that is " . designColor() . " in color";		$engrave = "";															break;
	}

	switch (mt_rand(0,2))
	{
		case 0:	$decon = "decorative";			break;
		case 1:	$decon = "ceremonial";			break;
		case 2:	$decon = "ornamental";			break;
	}

	switch (mt_rand(0,3))
	{
		case 0:	$item = $decon . " " . $decoi . $gemit;				break;
		case 1:	$item = $decon . " " . $decoi . $engrave;			break;
		case 2:	$item = $decon . " " . $decoi . $gemit . $engrave;	break;
		case 3:	$item = $decon . " " . $decoi;						break;
	}

	return $item;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function carvingMaterial($type)
{
	if ($type == 1){$z = 8;} else {$z = 20;}
	switch (mt_rand(0,$z))
	{
		case 0:	$material = "ivory";		break;
		case 1:	$material = "wooden";		break;
		case 2:	$material = "pewter";		break;
		case 3:	$material = "sandstone";	break;
		case 4:	$material = "onyx";			break;
		case 5:	$material = "limestone";	break;
		case 6:	$material = "granite";		break;
		case 7:	$material = "jade";			break;
		case 8:	$material = "limestone";	break;
		case 9:	$material = "silver";		break;
		case 10:$material = "bronze";		break;
		case 11:$material = "marble";		break;
		case 12:$material = "stone";		break;
		case 13:$material = "brass";		break;
		case 14:$material = "golden";		break;
		case 15:$material = "jasper";		break;
		case 16:$material = "quartz";		break;
		case 17:$material = "garnet";		break;
		case 18:$material = "crystal";		break;
		case 19:$material = "obsidian";		break;
		case 20:$material = "agate";		break;
	}
	return $material;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function scrollCase()
{
	$gem = explode(" (", gemCreator(0));

	switch (mt_rand(0,7))
	{
		case 0:	$case = "ivory";		break;
		case 1:	$case = "pewter";		break;
		case 2:	$case = "silver";		break;
		case 3: $case = "bronze";		break;
		case 4: $case = "brass";		break;
		case 5: $case = "golden";		break;
		case 6: $case = "platinum";		break;
		case 7: $case = "bone";			break;
	}

	switch (mt_rand(0,5))
	{
		case 0:	$ends = "bronze";		break;
		case 1:	$ends = "gold";			break;
		case 2:	$ends = "silver";		break;
		case 3:	$ends = "brass";		break;
		case 4:	$ends = "wood";			break;
		case 5:	$ends = "platinum";		break;
	}

	return "scroll case made of " . $case . " with " . $ends . " endcaps and decorated with " . mt_rand(2,8) . " gems [" . $gem[0] . "]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function relicAdjective()
{
	$adjective = array('Exotic', 'Mysterious', 'Enchanted', 'Marvelous', 'Amazing', 'Astonishing', 'Mystical', 'Astounding', 'Magical', 'Divine', 'Excellent', 'Magnificent', 'Phenomenal', 'Fantastic', 'Incredible', 'Extraordinary', 'Fabulous', 'Wondrous', 'Glorious', 'Lost', 'Fabled', 'Legendary', 'Mythical', 'Missing', 'Ancestral', 'Ornate', 'Ultimate', 'Rare', 'Wonderful', 'Sacred', 'Almighty', 'Supreme', 'Mighty', 'Unspeakable', 'Unknown', 'Forgotten');
	return $adjective[mt_rand(0,35)];
}
?>