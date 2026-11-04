<?php

function curseType($level,$who,$type,$game)
{

	if ( ($game == "OSRIC") || ($game == "AD&D") || ($game == "BD&D") || ($game == "Swords & Wizardry") || ($game == "Labyrinth Lord") ){$morality = "alignment";} else {$morality = "morality";}

	if ($level > 0){} else {$level = mt_rand(1,20);}
    if ($type == "equip")
    {
		switch (mt_rand(0,35))
		{
			case 0:	$value = $who . "'s hair turns " . plainColor() . " and grows " . mt_rand(2,5) . " feet longer";	break;
			case 1:	$value = $who . " grows a " . tailType() . " tail";	break;
			case 2:	$value = $who . "'s skin turns to a " . plainColor() . " color";	break;
			case 3:	$value = $who . " changes sex";	break;
			case 4:	$value = $who . " turns into a new race (" . humanType() . ")";	break;
			case 5:		if (($game == "BFRPG") || ($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$value = $who . " cannot stop crying, where maybe nearby monsters may hear";} 
						else {$value = $who . "'s " . $morality . " changes";}
				break;
			case 6:		if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$value = $who . " suffers a penalty of " . mt_rand(1,2) . " less dice to roll for combat";} 
						else {$value = $who . " suffers a penalty of " . mt_rand(1,2) . " to attack rolls";}
				break;
			case 7:		if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$value = $who . " suffers a penalty of " . mt_rand(1,5) . " to SR`s";} 
						else {$value = $who . " suffers a penalty of " . mt_rand(1,2) . " to save rolls";}
				break;
			case 8:		if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$value = $who . "'s sight is impaired, giving -" . mt_rand(2,6) . " to SR and combat rolls";} 
						else {$value = $who . "'s sight is impaired, giving -2 to attacks and save rolls";}
				break;
			case 9:	$value = $who . " grows about 1 foot";	break;
			case 10:$value = $who . " shrinks about 1 foot";	break;
			case 11:	if ($game == "Tunnels & Trolls"){$value = $who . " suffers a -" . mt_rand(5,10) . " to the hits that their armor can absorb";} 
						else {$value = $who . " suffers a penalty of " . mt_rand(1,2) . " to armor";}
				break;
			case 12:$value = $who . " goes insane";	break;
			case 13:$value = $who . " fumbles during combats, with a " . mt_rand(1,6) . " penalty to attack rolls";	break;
			case 14:$value = $who . " cannot speak clearly because of stuttering";	break;
			case 15:$value = $who . " falls in love with the first person they see";	break;
			case 16:$value = $who . " suffers a penalty of " . mt_rand(1,2) . " to " . abilityType($game);	break;
			case 17:$value = $who . " begins to see all friends as enemies, attacking them";	break;
			case 18:$value = $who . " begins to see all friends as monsters, fleeing from them";	break;
			case 19:$value = $who . " speaks every word backwards";	break;
			case 20:$value = $who . " cannot hear anything";	break;
			case 21:$value = $who . " has all of their " . destroyMe() . ".";	$screwed = 1;	break;
			case 22:$value = $who . "'s skin gets covered in " . acneMe();	break;
			case 23:$value = $who . " will cause flowers to wilt whenever they pass nearby";	break;
			case 24:$value = $who . " will begin to walk in a crookedly manner";	break;
			case 25:$value = $who . " will see only their bones in reflective surfaces";	break;
			case 26: if (mt_rand(1,2) == 1){$ecol="white";} else {$ecol="black";} $value = $who . "'s eyes change to solid " . $ecol;	break;
			case 27:$value = $who . " will have nightmares every time they try to sleep, causing a poor rest session";	break;
			case 28:$value = $who . "'s hands and eyes will randomly drip blood";	break;
			case 29:$value = $who . " will cause domestic animals to flee from them";	break;
			case 30:$value = $who . " is always cold, requiring extra clothing";	break;
			case 31:$value = $who . " is always hot, causing them to shed their armor and robes";	break;
			case 32:$value = $who . " will cause nearby flames and torches to extinquish";	break;
			case 33:$value = $who . " will cause any food to spoild when touched";	break;
			case 34:$value = $who . "'s clothes will become tattered and gray";	break;
			case 35:$value = $who . "'s fingernails change to a black color, grow an inch longer, and drip blood occasionally";	break;
		}
		$time = curseDuration(1,$who,$level);
    }
    else
    {
		switch (mt_rand(0,36))
		{
			case 0:	$value = $who . "'s hair turns " . plainColor() . " and grows " . mt_rand(2,5) . " feet longer";	break;
			case 1:	$value = $who . " grows a " . tailType() . " tail";	break;
			case 2:	$value = $who . "'s skin turns to a " . plainColor() . " color";	break;
			case 3:	$value = $who . " changes sex";	break;
			case 4:	$value = $who . " turns into a new race (" . humanType() . ")";	break;
			case 5:		if (($game == "BFRPG") || ($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$value = $who . " cannot stop crying, where maybe nearby monsters may hear";} 
						else {$value = $who . "'s " . $morality . " changes";}
				break;
			case 6:		if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$value = $who . " loses 2 " . abilityType($game) . " points";}
						else {$value = $who . " loses a level";}
				break;
			case 7:	$value = $who . " turns to a cloud of smoke";	break;
			case 8:		if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$value = $who . "'s sight is impaired, giving -" . mt_rand(2,6) . " to SR and combat rolls";} 
						else {$value = $who . "'s sight is impaired, giving -2 to attacks and save rolls";}
				break;
			case 9:	$value = $who . " grows about 1 foot";	break;
			case 10:$value = $who . " shrinks about 1 foot";	break;
			case 11:$value = $who . " turns into a " . polymorphType();	break;
			case 12:$value = $who . " goes insane";	break;
			case 13:	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$value = $who . " fumbles during combats and suffers " . mt_rand(1,2) . " less dice to roll for combat";} 
						if ($game == "Swords & Six-Siders") {$value = $who . " fumbles during combats, with a " . mt_rand(1,2) . " penalty to attack rolls";}
						else {$value = $who . " fumbles during combats, with a " . mt_rand(1,6) . " penalty to attack rolls";}
				break;
			case 14:$value = $who . " cannot speak clearly because of stuttering";	break;
			case 15:$value = $who . " falls in love with the first person they see";	break;
			case 16:	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$value = $who . " loses 1 " . abilityType($game) . " point";} 
						else if (($game == "OSRIC") || ($game == "Swords & Six-Siders") || ($game == "AD&D") || ($game == "BD&D") || ($game == "BFRPG") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry")){$value = $who . " loses 1 point in strength and constitution";}
						else {$value = $who . " loses 1 point in strength and stamina";}
				break;
			case 17:$value = $who . " begins to see all friends as enemies, attacking them";	break;
			case 18:$value = $who . " begins to see all friends as monsters, fleeing from them";	break;
			case 19:$value = $who . " suffers a penalty of 1 to " . abilityType($game);	break;
			case 20:$value = $who . " speaks every word backwards";	break;
			case 21:$value = $who . " cannot hear anything";	break;
			case 22:$value = $who . " has all of their " . destroyMe() . ".";	$screwed = 1;	break;
			case 23:$value = $who . "'s skin gets covered in " . acneMe();	break;
			case 24:$value = $who . " will cause flowers to wilt whenever they pass nearby";	break;
			case 25:$value = $who . " will begin to walk in a crookedly manner";	break;
			case 26:$value = $who . " will see only their bones in reflective surfaces";	break;
			case 27: if (mt_rand(1,2) == 1){$ecol="white";} else {$ecol="black";} $value = $who . "'s eyes change to solid " . $ecol;	break;
			case 28:$value = $who . " will have nightmares every time they try to sleep, causing a poor rest session";	break;
			case 29:$value = $who . "'s hands and eyes will randomly drip blood";	break;
			case 30:$value = $who . " will cause domestic animals to flee from them";	break;
			case 31:$value = $who . " is always cold, requiring extra clothing";	break;
			case 32:$value = $who . " will cause nearby flames and torches to extinquish";	break;
			case 33:$value = $who . " will cause any food to spoild when touched";	break;
			case 34:$value = $who . "'s clothes will become tattered and gray";	break;
			case 35:$value = $who . "'s fingernails change to a black color, grow an inch longer, and drip blood occasionally";	break;
			case 36:$value = $who . " is always hot, causing them to shed their armor and robes";	break;
		}
		$time = curseDuration(0,$who,$level);
    }
	if ($screwed == 1){$curse = $value;} else {$curse = $value . "" . $time;}
	return $curse;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function curseDuration($worn,$who,$level)
{
	if ($level > 0){} else {$level = mt_rand(1,20);}
	if ($worn == 1)
	{
		$time = " until curse removing magic is used, which destroys the item";
		if (mt_rand(1,100) > 50){$time = " until curse removing magic is used, which makes the item normal";}
		if (mt_rand(1,100) > 80){$time = " until the item is removed from the " . $who;}
	}
	else
	{
		if (mt_rand(1,100) > 40){$time = " until curse removing magic is used";}
		else if (mt_rand(1,100) > 70){$time = " for about " . ($level+1) . " days";}
		else if (mt_rand(1,100) > 95){$time = " forever";}
		else {$time = " for about " . ($level*2) . " hours";}
	}
	return $time;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function acneMe()
{
	switch (mt_rand(0,12))
	{
		case 0:	$ugly = "ugly ";		break;
		case 1:	$ugly = "grotesque ";	break;
		case 2:	$ugly = "horrible ";	break;
		case 3:	$ugly = "";				break;
		case 4:	$ugly = "";				break;
		case 5:	$ugly = "painful ";		break;
		case 6:	$ugly = "itchy ";		break;
		case 7:	$ugly = "thick ";		break;
		case 8:	$ugly = "frightful ";	break;
		case 9:	$ugly = "grisly ";		break;
		case 10:$ugly = "hideous ";		break;
		case 11:$ugly = "unsightly ";	break;
		case 12:$ugly = "horrid ";		break;
	}

	switch (mt_rand(0,9))
	{
		case 0:	$skin = $ugly . "warts";			break;
		case 1:	$skin = $ugly . "blisters";			break;
		case 2:	$skin = plainColor() . " scales";	break;
		case 3:	$skin = plainColor() . " hair";		break;
		case 4:	$skin = plainColor() . " feathers";	break;
		case 5:	$skin = $ugly . "boils";			break;
		case 6:	$skin = $ugly . "freckles";			break;
		case 7:	$skin = $ugly . "moles";			break;
		case 8:	$skin = $ugly . "lumps";			break;
		case 9:	$skin = $ugly . "scabs";			break;
	}
	return $skin;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function destroyMe()
{
	switch (mt_rand(0,9))
	{
		case 0:	$junk = "stone";	break;
		case 1:	$junk = "dust";		break;
		case 2:	$junk = "coal";		break;
		case 3:	$junk = "leaves";	break;
		case 4:	$junk = "mold";		break;
		case 5:	$junk = "water";	break;
		case 6:	$junk = "mud";		break;
		case 7:	$junk = plainColor() . " smoke";	break;
		case 8:	$junk = plainColor() . " ooze";		break;
		case 9:	$junk = "sand";		break;
	}

	switch (mt_rand(0,10))
	{
		case 0:	$item = "coins";			break;
		case 1:	$item = "metal objects";	break;
		case 2:	$item = "cloth apparel";	break;
		case 3:	$item = "wooden objects";	break;
		case 4:	$item = "magic weapons";	break;
		case 5:	$item = "magic armor";		break;
		case 6:	$item = "magic items";		break;
		case 7:	$item = "gems";				break;
		case 8:	$item = "jewels";			break;
		case 9:	$item = "food";				break;
		case 10:$item = "leather items";	break;
	}
	return $item . " turn to " . $junk;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function tailType()
{
	$value = array('lion', 'lizard', 'rabbit', 'dog', 'wolf', 'cat', 'horse', 'devil', 'cow');
	return $value[mt_rand(0,8)];
}
?>