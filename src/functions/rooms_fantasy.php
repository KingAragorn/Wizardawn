<?php
/// THINGS YOU WOULD FIND IN A DUNGEON OR FANTASY AREA ///

function specialMakerRoom($cut,$room_min,$room_max,$game,$extra)
{
	if (mt_rand(1,100) > 50){$thing = "pool";} else {$thing = "fountain";}
	switch (mt_rand(0,5))
	{
		case 0:	$stuff = "An altar (<i>" . altarMaker($cut,$game,$extra) . "</i>).";									break;
		case 1:	$stuff = "A " . $thing . " (<i>" . fountainMaker($cut,$game,$extra) . "</i>).";							break;
		case 2:	$stuff = "An idol (<i>" . idolMaker(1,4,1,$cut,$game,$extra) . "</i>).";								break;
		case 3:	$stuff = "A statue (<i>" . idolMaker(4,12,1,$cut,$game,$extra) . "</i>).";								break;
		case 4:	$stuff = "A wizard floor symbol (<i>" . circleMaker($cut,$game,$extra) . "</i>).";						break;
		case 5:	$stuff = "A magical talking mouth (<i>" . mouthMaker($cut,$room_min,$room_max,$game,$extra) . "</i>).";	break;
	}
	return $stuff;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function tortureMaker($game,$cut,$type)
{
	switch (mt_rand(0,3))
	{
		case 0:	$device = "a torture rack made mostly of " . conditionType(wood) . "" . woodenType();	$where = "lying on";	break;
		case 1:	$device = "an iron maiden made mostly of " . conditionType(iron) . "" . steelMaker();	$where = "inside";		break;
		case 2:	$device = "a spiked torture chair made mostly of " . conditionType(wood) . "" . woodenType() . " with " . steelMaker() . " spikes on it";	$where = "sitting in";	break;
		case 3:	$device = "a pillory made mostly of " . conditionType(wood) . "" . woodenType();	$where = "locked in";	break;
	}
	if ($type != 1)
	{
		if (mt_rand(1,100) > 70){$device = $device . "..." . $where . " it is a " . corpseMaker(). " " . makeNormalItem(5,3,1,$game,$cut,0);}
		if (mt_rand(1,100) > 60){$device = $device . "...it has some areas of dried blood";}
	}
	return $device;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function ashMaker($game)
{
	switch (mt_rand(0,1))
	{
		case 0:	$look = "a large pile";	break;
		case 1:	$look = "a pile";	break;
	}
	switch (mt_rand(0,9))
	{
		case 0:	$hat = candleColor(0) . " feathered hat";	break;
		case 1:	$hat = "jester hat"; break;
		case 2:	$hat = "straw hat"; break;
		case 3:	$hat = "tall straw hat"; break;
		case 4:	$hat = candleColor(0) . " wide-brim hat"; break;
		case 5:	$hat = candleColor(0) . " wizard hat"; break;
		case 6:	$hat = candleColor(0) . " tricorne hat"; break;
		case 7:	$hat = candleColor(0) . " floppy hat"; break;
		case 8:	$hat = candleColor(0) . " skullcap"; break;
		case 9:	$hat = candleColor(0) . " bonnet"; break;
	}
	switch (mt_rand(0,8))
	{
		case 0:	$value = " with a " . conditionType(iron) . "" . steelMaker() . " helmet lying on top of it";		break;
		case 1:	$value = " with a " . conditionType(cloth) . "" . $hat . " lying on top of it";	break;
		case 2:	$value = " with a " . conditionType(iron) . "" . steelMaker() . " shield next to it";			break;
		case 3:	$value = " with a " . normalWeapons(1,3,$game) . " next to it";							break;
		case 4:	$value = " with a " . preciousChooser() . " amulet (worth " . mt_rand(2,100) . " " . coinMaker($game) . ") lying on top of it";					break;
		case 5:	$value = " with a humanoid skull lying on top of it";							break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$ash = "of ashes";				break;
		case 1:	$ash = "of ashes";				break;
		case 2:	$ash = "of ashes";				break;
		case 3:	$ash = "of " . candleColor(0) . " ashes";	break;
	}
	return $look . " " . $ash . "" . $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function eggMaker()
{
	switch (mt_rand(0,2))
	{
		case 0:	$look = "large broken and";	break;
		case 1:	$look = "small broken and";	break;
		case 2:	$look = "broken and";		break;
	}
	switch (mt_rand(0,4))
	{
		case 0:	$value = "dirty";	break;
		case 1:	$value = "dry";		break;
		case 2:	$value = "fresh";	break;
		case 3:	$value = "rotten";	break;
		case 4:	$value = "old";		break;
	}
	return $look . " " . $value . " eggshells";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function ingotMaker()
{
	switch (mt_rand(0,8))
	{
		case 0:	$value = "lead";							break;
		case 1:	$value = "iron";							break;
		case 2:	$value = "lead";							break;
		case 3:	$value = "iron";							break;
		case 4:	$value = "bronze";							break;
		case 5:	$value = "copper...worth " . mt_rand(1,3) . " gold each";		break;
		case 6:	$value = "silver...worth " . mt_rand(3,5) . " gold each";		break;
		case 7:	$value = "gold...worth " . mt_rand(5,25) . " gold each";		break;
		case 8:	$value = "platinum...worth " . mt_rand(5,25) . "0 gold each";	break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function drawingTypes()
{
	switch (mt_rand(0,7))
	{
		case 0:	$value = "runic symbols";		break;
		case 1:	$value = "circles";			break;
		case 2:	$value = "triangles";			break;
		case 3:	$value = "squares";			break;
		case 4:	$value = "constellations";		break;
		case 5:	$value = "alchemic symbols";		break;
		case 6:	$value = "the map for this area";	break;
		case 7:	$value = "the map to a treasure {located about " . mt_rand(1,20) . "0 miles away from here}";	break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function chickenScratch($game)
{
	switch (mt_rand(0,6))
	{
		case 0:	$value = "tells the location of a nearby secret room";		break;
		case 1:	$value = "warns of a nearby trap";				break;
		case 2:	$value = "tells the location of a nearby treasure";		break;
		case 3:	$value = "warns of a nearby creature";				break;
		case 4:	$value = "warns others to leave this place";			break;
		case 5:	$value = "spells out one of the adventurer`s name";		break;
		case 6:	$value = "warns others that they will surely perish";		break;
	}
	return $value . "...but written in " . languageType($game);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function drawWith()
{
	switch (mt_rand(0,5))
	{
		case 0:	$value = "coal";						break;
		case 1:	$value = "chalk";						break;
		case 2:	$value = "chiseled";					break;
		case 3:	$value = candleColor(0) . " painted";	break;
		case 4:	$value = "carved";						break;
		case 5:	$value = "dried blood";					break;
	}
	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function corpseMaker()
{
	switch (mt_rand(0,4))
	{
		case 0:	$look = "bloody";	break;
		case 1:	$look = "decayed";	break;
		case 2:	$look = "rotted";	break;
		case 3:	$look = "half-eaten";	break;
		case 4:	$look = "mutilated";	break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$noun = "body";		break;
		case 1:	$noun = "corpse";	break;
		case 2:	$noun = "remains";	break;
		case 3:	$noun = "bones";	break;
	}
	switch (mt_rand(0,16))
	{
		case 0:	$race = "a human";	break;
		case 1:	$race = "an elf";	break;
		case 2:	$race = "a dwarf";	break;
		case 3:	$race = "a gnome";	break;
		case 4:	$race = "a hobbit";	break;
		case 5:	$race = "a goblin";	break;
		case 6:	$race = "an orc";	break;
		case 7:	$race = "a kobold";	break;
		case 8:	$race = "a bugbear";	break;
		case 9:	$race = "an ogre";	break;
		case 10:$race = "a hobgoblin";	break;
		case 11:$race = "a lizard man";	break;
		case 12:$race = "a human";	break;
		case 13:$race = "an elf";	break;
		case 14:$race = "a dwarf";	break;
		case 15:$race = "a gnome";	break;
		case 16:$race = "a hobbit";	break;
	}
	return $look . " " . $noun . " of " . $race;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function headoffMaker($bone)
{
	switch (mt_rand(0,4))
	{
		case 0:	$look = "bloody";	break;
		case 1:	$look = "decayed";	break;
		case 2:	$look = "rotted";	break;
		case 3:	$look = "half-eaten";	break;
		case 4:	$look = "mutilated";	break;
	}
	switch (mt_rand(0,16))
	{
		case 0:	$race = "a human";	break;
		case 1:	$race = "an elf";	break;
		case 2:	$race = "a dwarf";	break;
		case 3:	$race = "a gnome";	break;
		case 4:	$race = "a hobbit";	break;
		case 5:	$race = "a goblin";	break;
		case 6:	$race = "an orc";	break;
		case 7:	$race = "a kobold";	break;
		case 8:	$race = "a bugbear";	break;
		case 9:	$race = "an ogre";	break;
		case 10:$race = "a hobgoblin";	break;
		case 11:$race = "a lizard man";	break;
		case 12:$race = "a human";	break;
		case 13:$race = "an elf";	break;
		case 14:$race = "a dwarf";	break;
		case 15:$race = "a gnome";	break;
		case 16:$race = "a hobbit";	break;
	}
	$head = $look . " head of " . $race;
	if ((mt_rand(1,100) > 80) || ($bone > 0)){$head = "skull of " . $race;}
	return $head;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function footprintMaker()
{
	switch (mt_rand(0,2))
	{
		case 0:	$look = "large ";	break;
		case 1:	$look = "small ";	break;
		case 2:	$look = "";		break;
	}
	switch (mt_rand(0,11))
	{
		case 0:	$race = "boot prints";		break;
		case 1:	$race = "shoe prints";		break;
		case 2:	$race = "paw prints";		break;
		case 3:	$race = "foot prints";		break;
		case 4:	$race = "webbed feet prints";	break;
		case 5:	$race = "rat tracks";		break;
		case 6:	$race = "talon tracks";		break;
		case 7:	$race = "boot prints";		break;
		case 8:	$race = "shoe prints";		break;
		case 9:	$race = "boot prints";		break;
		case 10:$race = "shoe prints";		break;
		case 11:$race = "hoof prints";		break;
	}
	return $look . "" . $race;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function timesMaker()
{
	switch (mt_rand(0,5))
	{
		case 0:	$time = "hour";		break;
		case 1:	$time = "day";		break;
		case 2:	$time = "month";	break;
		case 3:	$time = "year";		break;
		case 4:	$time = "season";	break;
		case 5:	$time = "full moon";	break;
	}
	return $time;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function weaponRack($game,$type)
{
	if ($type != 1){$rack = "{<i>HOLDS:&nbsp;";}
	$many = mt_rand(1,6);
	while ($many > 0) :
		$rack = $rack . "" . normalWeapons(1,3,$game) . "&nbsp;--- ";
		$many = $many - 1;
	endwhile;

	if ($type == 1){$stuff = substr($rack, 0, -10); }
	else {$stuff = substr($rack, 0, -10) . "</i>}"; }

	return $stuff;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function armorRack($game,$type)
{
	if ($type != 1){$rack = "{<i>HOLDS:&nbsp;";}
	$many = mt_rand(1,6);
	while ($many > 0) :
		$rack = $rack . "" . normalArmor(1,$game) . "&nbsp;--- ";
		$many = $many - 1;
	endwhile;

	if ($type == 1){$stuff = substr($rack, 0, -10); }
	else {$stuff = substr($rack, 0, -10) . "</i>}"; }

	return $stuff;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function altarMaker($cut,$game,$extra)
{
	if (mt_rand(1,100) > 50){$chg = "good"; } else {$chg = "evil"; }
	switch (mt_rand(0,3))
	{
		case 0:	$shell = "large turtle shell";		break;
		case 1:	$shell = "large beetle carapace";	break;
		case 2:	$shell = "large crab shell";		break;
		case 3:	$shell = "giant sea shell";		break;
	}
	$look = "stone";
	switch (mt_rand(0,28))
	{
		case 0:	$look = "crystal";				break;
		case 1:	$look = "glass";				break;
		case 2:	$look = materialType(wood);			break;
		case 3:	$look = "brass";				break;
		case 4:	$look = "wood bound with metal";		break;
		case 5:	$look = "rusted iron";				break;
		case 6:	$look = "animal bones";				break;
		case 7:	$look = "humanoid bones";			break;
		case 8:	$look = "clay bricks";				break;
		case 9:	$look = "unknown metal";			break;
		case 10:$look = "lava rock";				break;
		case 11:$look = $shell;					break;
		case 12:$look = designColor() . " colored stone";	break;
		case 13:$look = "gold";					break;
		case 14:$look = "silver";				break;
		case 15:$look = "marble";				break;
		case 16:$look = "granite";				break;
	}
	$deco = "various carvings";
	$gem = ucwords(gemCreator($cut));
	switch (mt_rand(0,30))
	{
		case 0:	$deco = "a gong";						break;
		case 1:	$deco = "two braziers";						break;
		case 2:	$deco = "two burning braziers";					break;
		case 3:	$deco = "a statue [" . idolMaker(1,2,0,$cut,$game,$extra) . "]";				break;
		case 4:	$deco = "a " . candleColor(0) . " colored cloth on top";	break;
		case 5:	$deco = "an offering bowl";	if (mt_rand(1,100)>80){$deco = $deco . " that has " . mt_rand(2,100) . " " . coinMaker($game) . " coins";}	break;
		case 6:	$deco = "bones";						break;
		case 7:	$deco = "blood";						break;
		case 8:	$deco = "chains";						break;
		case 9:	$deco = "ropes";						break;
		case 10:$deco = mt_rand(2,8) . " " . candleColor(0) . " candles on it";	break;
		case 11:$deco = "a holy symbol made of " . materialType(iron);		break;
		case 12:$deco = "a small bell";						break;
		case 13:$deco = "a large bell";						break;
		case 14:$deco = "a incense bowl";					break;
		case 15:$deco = "various plants and flowers";				break;
		case 16:$deco = "covered in " . materialType(leather) . " skins";	break;
		case 17:
			if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$deco = "decorated with " . mt_rand(10,50) . " gems " . $gem . " that require a L" . mt_rand(1,5) . "SR vs. " . abilityTranslate($game,STR) . " to pry off each one.";}
			else {$deco = "decorated with " . mt_rand(10,50) . " gems " . $gem . " that require a major strength test to pry off each one.";}
			break;
		case 18:$deco = "a goblet made of " . materialType(iron);		break;
		case 19:$deco = "a sacrificial knife";	if (mt_rand(1,100)>80){$deco = $deco . " with dried blood";}	break;
		case 20:$deco = "the " . corpseMaker(). " " . makeNormalItem(5,3,1,$game,$cut,0);	break;
	}
	$effect = "";
	$trap = trapMaker(mt_rand(1,20),idol,$game,$extra,0);
	switch (mt_rand(0,20))
	{
		case 0:	$effect = "..grants good luck to anyone who gives an offering...giving them a 1 bonus to die rolls [lasts for a single day].";		break;
		case 1:	$effect = "..causes anyone that touches it to become " . $chg . ".";									break;
		case 2: $effect = "..it is cursed where the " . curseType(mt_rand(1,20),toucher,item,$game) . ".";							break;
		case 3:	$effect = "..any food or water placed on it will be purified.";										break;
		case 4:	$effect = "..any magic items set on it will be disenchanted.";										break;
		case 5:	$effect = "..any magic items set on it needing charges will be recharged.";								break;
		case 6:	$effect = "..any metal items set on it turn to gold.";											break;
		case 7:	$effect = "..touching it triggers a trap [" . $trap[0] . "].";							break;
		case 8:	$effect = "..anyone examing it will find a hidden opening with " . currencyBuilder(mt_rand(3,10),1,1,$cut,1,$game) . ".";				break;
		case 9: $effect = "..any container of water placed on it will be turned into a type " . strtolower(makeMagicItem(mt_rand(1,5),0,1,$game,$extra,$cut)) . ".";	break;
		case 10:$effect = "..will resurrect the recently dead once per " . timesMaker() .".";								break;
		case 11:
				if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$effect = "..anyone who touches it experiences great pain where they suffer " . mt_rand(1,4) . "d6 damage.";}
				else {$effect = "..anyone who touches it experiences great pain where they suffer " . mt_rand(1,4) . "d" . (2*mt_rand(2,6)) ." damage.";}
			break;
		case 12:$effect = "..causes a curse if touched where the " . curseType(mt_rand(1,20),toucher,item,$game) . ".";					break;
	}
	return "made of " . $look . " and has " . $deco . " on it." . $effect;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function circleMaker($cut,$game,$extra)
{
	$wide = mt_rand(5,10) . " feet across";
	if (mt_rand(1,100) > 50){$loss = "gain 1";	$chg = "good"; } else {$loss = "lose 1";	$chg = "evil"; }
	switch (mt_rand(0,8))
	{
		case 0:	$shape = "pentagram";	break;
		case 1:	$shape = "pentagram";	break;
		case 2:	$shape = "circle";	break;
		case 3:	$shape = "oval";	break;
		case 4:	$shape = "square";	break;
		case 5:	$shape = "rectangle";	break;
		case 6:	$shape = "triangle";	break;
		case 7:	$shape = "hexagon";	break;
		case 8:	$shape = "pentagon";	break;
	}
	switch (mt_rand(0,5))
	{
		case 0:	$vision = "show the location of a secret door";		break;
		case 1:	$vision = "show the location of a secret treasure";	break;
		case 2:	$vision = "show the contents of a nearby room";		break;
		case 3:	$vision = "open a magical doorway out of the dungeon";	break;
		case 4:	$vision = "show an event from the area`s past";		break;
		case 5:	$vision = "show an image of a nearby monster";		break;
	}
	switch (mt_rand(0,14))
	{
		case 0:	$look = "salt";					break;
		case 1:	$look = "dirt";					break;
		case 2:	$look = candleColor(0) . " sand";		break;
		case 3:	$look = "blood";				break;
		case 4:	$look = "bone dust";				break;
		case 5:	$look = candleColor(0) . " paint";		break;
		case 6:	$look = candleColor(0) . " ink";		break;
		case 7:	$look = "dried leaves";				break;
		case 8:	$look = "dead bugs";				break;
		case 9:	$look = "carvings in the floor";		break;
		case 10:$look = "dried mud";				break;
		case 11:$look = "gold flakes [worth " . number_format(mt_rand(1,9)*15) . "gp if swept up]";	break;
		case 12:$look = designColor() . " colored pebbles";	break;
		case 13:$look = "small rocks and pebbles";		break;
		case 14:$look = "ashes";				break;
	}
	$deco = "various wizard symbols among it";
	switch (mt_rand(0,20))
	{
		case 0:	$deco = mt_rand(2,10) . " " . candleColor(0) . " candles among it.";		break;
		case 1:	$deco = mt_rand(2,10) . " lit " . candleColor(0) . " candles among it.";	break;
		case 2:	$deco = "the " . corpseMaker(). " " . makeNormalItem(5,3,1,$game,$cut,0) . ".";		break;
		case 3:	$deco = "a statue [" . idolMaker(1,2,0,$cut,$game,$extra) . "] in the center.";			break;
		case 4:	$deco = "humanoid bones among it.";						break;
		case 5:	$deco = "blood scattered around it.";						break;
		case 6:	$deco = "a puddle of blood in the center.";					break;
		case 7:	$deco = "a pile of ropes in it.";						break;
		case 8: $deco = "animal bones among it.";						break;
		case 9: $deco = "a couple of chains connected to the floor.";				break;
		case 10:$deco = "a incense bowl in the center.";					break;
		case 11:$deco = "a bowl made of " . materialType(iron) . " lying in the middle.";	break;
		case 12:$deco = "various plants and flowers scattered around it.";			break;
		case 13:$deco = "a sacrificial knife";	if (mt_rand(1,100)>80){$deco = $deco . " with dried blood among it.";}	break;
	}
	$effect = "";
	$trap = trapMaker(mt_rand(1,20),circle,$game,$extra,0);
	switch (mt_rand(0,20))
	{
		case 0:	$effect = "..anyone that enters the shape and speaks the proper magic word will be teleported to another location.";		$words = 1;	break;
		case 1:	$effect = "..contains a trapped demon that will attempt to answer " . mt_rand(2,6) . " questions about the area if set free.";	$words = 1;	break;
		case 2:	$effect = "..anyone who enters the shape will be trapped by an invisible wall, unless they know the proper magic word.";	$words = 1;	break;
		case 3:	$effect = "..any magic items brought in it will be disenchanted.";										break;
		case 4:	$effect = "..any magic items brought in it needing charges will be recharged if one knows the magic word.";			$words = 1;	break;
		case 5:	$effect = "..anyone that enters the shape will " . $loss . " " . abilityType($game) . " point only once.";						break;
		case 6:	$effect = "..entering it triggers a trap [" . $trap[0] . "].";								break;
		case 7:	$effect = "..speaking the magic word produces a cloud of " . fogColor() . " smoke that will " . $vision . ".";			$words = 1;	break;
		case 8: $effect = "..speaking the magic word will summon a demon that will do one task for the summoner before leaving this plane.";	$words = 1;	break;
		case 9: $effect = "..any magic item put in it will be identified by a demonic voice if one speaks the magic word.";			$words = 1;	break;
		case 10:$effect = "..anyone that enters the shape is cursed where the " . curseType(mt_rand(1,20),trespasser,item,$game) . ". The curse can be removed if one speaks the magic word.";	$words = 1;	break;
		case 11:$effect = "..anyone that enters the shape suffers " . mt_rand(1,4) . "d" . (2*mt_rand(2,6)) ." damage.";					break;
	}
	if ($words == 1)
	{
		$say = " A mage with a " . mt_rand(10,18) . " intellect can read the symbols to learn the magic word is `" . castingName() . "`, which activates or deactivates the shape`s power.";
	}
	return "constructed with " . $look . ", is " . $wide . ", and in the shape of a " . $shape . "...it has " . $deco . "." . $effect . "" . $say;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function idolMaker($small,$large,$magic,$cut,$game,$extra)
{
	$height = mt_rand($small,$large);
	$gem = ucwords(gemCreator($cut));

	$statue = statueMake();

	$carve = array('Angel', 'Ant', 'Ape', 'Badger', 'Basilisk', 'Bat', 'Bear', 'Beetle', 'Boar', 'Buffalo', 'Bull', 'Cat', 'Centaur', 'Cerberus', 'Cheetah', 'Chimera', 'Cobra', 'Crab', 'Cricket', 'Crocodile', 'Cyclops', 'Demon', 'Devil', 'Dog', 'Dolphin', 'Dragon', 'Dwarf', 'Eagle', 'Elephant', 'Elf', 'Ettin', 'Falcon', 'Fish', 'Frog', 'Gargoyle', 'Giant', 'Gnome', 'Goat', 'Griffin', 'Harpy', 'Hawk', 'Hippogriff', 'Hippopotamus', 'Hobbit', 'Horse', 'Human', 'Hydra', 'Jaguar', 'Kelpie', 'Leopard', 'Leprechaun', 'Lion', 'Lizard', 'Mammoth', 'Manticore', 'Medusa', 'Minotaur', 'Monkey', 'Ogre', 'Otter', 'Owl', 'Pegasus', 'Pixie', 'Ram', 'Rat', 'Rhinoceros', 'Satyr', 'Scorpion', 'Snake', 'Spider', 'Squirrel', 'Stag', 'Succubus', 'Tiger', 'Titan', 'Toad', 'Troll', 'Turtle', 'Unicorn', 'Weasel', 'Whale', 'Wolf ', 'Wolverine', 'Worm', 'Wyrm', 'Wyvern');
	$carve = $carve[mt_rand(0,85)];
	$effect = "";
	$trap = trapMaker(mt_rand(1,20),idol,$game,$extra,0);
	if ($magic == 1)
	{
	    switch (mt_rand(0,20))
	    {
		case 0:	$effect = "..grants good luck to anyone who touches it giving them a 1 bonus to die rolls [lasts for a single day].";				break;
		case 1:	$effect = "..contains an intelligent spirit that will attempt to answer " . mt_rand(2,6) . " questions about the area in return for a favor.";	break;
		case 2: $effect = "..it is cursed where the " . curseType(mt_rand(1,20),toucher,item,$game) . ".";								break;
		case 3:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$effect = "..anyone who touches will be bitten by it and killed unless they can make a L" . mt_rand(1,5) . "SR vs " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,CON) . ".";}
				else {$effect = "..anyone who touches will be bitten by it and killed unless they can save for poison.";}
			break;
		case 4:	$effect = "..any magic items that touch it will be disenchanted.";										break;
		case 5:	$effect = "..any magic items that touch it needing charges will be recharged.";								break;
		case 6:	$effect = "..it points toward a secret door, clue, or treasure.";										break;
		case 7:	$effect = "..touching it triggers a trap [" . $trap[0] . "].";								break;
		case 8:	$effect = "..anyone examing it will find a hidden opening with " . currencyBuilder(mt_rand(3,10),1,1,$cut,1,$game) . ".";					break;
		case 9: $effect = "..anyone who touches it will notice it is dispensing a liquid " . strtolower(makeMagicItem(mt_rand(1,5),0,1,$game,$extra,$cut)) . " out of the mouth.";		break;
		case 10:$effect = "..contains an intelligent spirit that will identify magic items in return for a favor.";						break;
		case 11:
				if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$effect = "..anyone who touches it experiences great pain where they suffer " . mt_rand(1,4) . "d6 damage.";}
				else {$effect = "..anyone who touches it experiences great pain where they suffer " . mt_rand(1,4) . "d" . (2*mt_rand(2,6)) ." damage.";}
			break;
	    }
	}
	
	$idol = "it is about " . $height . " feet high and made of " . $statue . " and looks like a " . strtolower($carve);
	if (mt_rand(1,100) > 70){$idol = $idol . " that has gems for eyes - " . $gem . ".";} else {$idol = $idol . ".";}
	return $idol . "" . $effect;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function mouthMaker($cut,$room_min,$room_max,$game,$extra)
{
	$job = array('wizard', 'mage', 'sage', 'magician', 'priest', 'conjurer', 'medium', 'necromancer', 'shaman', 'seer', 'occultist');
	$job = ucfirst($job[mt_rand(0,10)]);

	$room = mt_rand($room_min,$room_max);

	if (mt_rand(1,2) == 1){$gender = "her";} else {$gender = "him";}

	switch (mt_rand(0,5))
	{
		case 0:	$inthe = "ceiling";		break;
		case 1:	$inthe = "floor";		break;
		case 2:	$inthe = "north wall";	break;
		case 3:	$inthe = "south wall";	break;
		case 4:	$inthe = "east wall";	break;
		case 5:	$inthe = "west wall";	break;
	}
	switch (mt_rand(0,2))
	{
		case 0: $voldic = mt_rand(1,5);
				if ($voldic == 1){$volume = "shout the word `" . castingName() . "`";}
				else if ($voldic == 2){$volume = "say the word `" . castingName() . "`";}
				else if ($voldic == 3){$volume = "whisper the word `" . castingName() . "`";}
				else if ($voldic == 4){$volume = "speak the word `" . castingName() . "`";}
				else {$volume = "write the word `" . castingName() . "` on the " . dungeonWall() . "";}
			break;
		case 1:	$volume = "search for an invisible item";	break;
		case 2:	$volume = "search for a secret panel in the " . $inthe;	break;
	}
	$goody = mt_rand(1,3);
	if ($goody == 1){$itum = "a magic item"; $found = "A magic item will be found. " . makeMagicItem(mt_rand(1,20),3,0,$game,$extra,$cut) . ".";}
	else if ($goody == 2){$itum = "some coins"; $found = "Some coins will be found. " . currencyBuilder(mt_rand(3,10),1,0,$cut,1,$game) . ".";}
	else
	{
		if (mt_rand(1,2) == 1){$itum = "a magic item";} else {$itum = "some coins";}
		$trap = trapMaker(mt_rand(1,20),room,$game,$extra,0); $found = "It is really a trick that springs a trap. " . $trap[0];
	}

	switch (mt_rand(0,13))
	{
		case 0:	$effect = "it warns of a nearby trap.";	break;
		case 1:	$effect = "it warns the adventurers to turn back now.";	break;
		case 2: $effect = "it laughs at the adventurers and tells them they are too late.";	break;
		case 3:	$effect = "it chuckles at the adventurers and tells them that they will soon meet their doom.";	break;
		case 4:	$effect = "it tells the adventurers the location of a nearby treasure.";	break;
		case 5:	$effect = "it pleads to the adventurers to hurry before it is too late.";	break;
		case 6:	$effect = "it laughs at the adventurers and tells them they will never save " . $gender . " in time.";	break;
		case 7:	$effect = "it tells an adventurer, by name, that they were expecting them.";	break;
		case 8:	$effect = "it warns that one of their magic items bears a horrible curse, which could be true or false.";	break;
		case 9: $effect = "it tells the adventurers that they are trespassing and to get out.";	break;
		case 10:$effect = "it pleads to the adventurers to hurry and save " . $gender . ".";	break;
		case 11:$effect = "it tells the adventurers about " . $itum . " that is hidden in room #" . $room . ", which will only appear if they go into the room and " . $volume . ". " . $found;	break;
		case 12:$effect = "it warns that this place is inhabited by " . demonName() . " the demon.";	break;
		case 13:$effect = "it tells of a dragon, known as " . dragonName() . ", living somewhere in this place.";	break;
	}

	if (mt_rand(1,100) > 70){$creator = "created by " . mageName() . " the " . $job . "...";}

	return $creator . "" . $effect;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function fountainMaker($cut,$game,$extra)
{
	$contents = "appears to be empty";
	$deep = mt_rand(1,5) . " feet deep";
	$wide = mt_rand(5,10) . " feet wide";
	$look = "stone";
	switch (mt_rand(0,8))
	{
		case 0:	$shape = "circle";	break;
		case 1:	$shape = "circle";	break;
		case 2:	$shape = "circle";	break;
		case 3:	$shape = "oval";	break;
		case 4:	$shape = "square";	break;
		case 5:	$shape = "rectangle";	break;
		case 6:	$shape = "triangle";	break;
		case 7:	$shape = "hexagon";	break;
		case 8:	$shape = "pentagon";	break;
	}
	switch (mt_rand(0,16))
	{
		case 0:	$look = "brass";	break;
		case 1:	$look = "bronze";	break;
		case 2:	$look = "gold";		break;
		case 3:	$look = "silver";	break;
		case 4:	$look = "marble";	break;
		case 5:	$look = "granite";	break;
		case 6:	$look = "glass";	break;
		case 7:	$look = "clay";		break;
		case 8:	$look = "crystal";	break;
		case 9: $look = "iron";		break;
		case 10:$look = "steel";	break;
	}
	switch (mt_rand(0,16))
	{
		case 0:	$contents = "is filled with a clear liquid";					$props = 1;		break;
		case 1:	$contents = "is filled with blood";						$props = 1;		break;
		case 2:	$contents = "is filled with blood and bones";					$props = 1;		break;
		case 3:	$contents = "is full " . strtolower(makeMagicItem(mt_rand(1,5),0,1,$game,$extra,$cut));					break;
		case 4:	$contents = "is filled with " . slimeColor() . " slime";			$props = 1;		break;
		case 5:	$contents = "is filled with " . slimeColor() . " oil";				$props = 1;		break;
		case 6:	$contents = "is filled with an odd " . slimeColor() . " liquid";		$props = 1;		break;
		case 7:	$contents = "is filled with murky liquid";					$props = 1;		break;
		case 8:	$contents = "is filled with mud";									break;
		case 9: $contents = "is filled with a clear liquid";					$props = 1;		break;
		case 10:$contents = "is filled with a clear liquid";					$props = 1;		break;
		case 11:$contents = "is filled with " . currencyBuilder(mt_rand(3,10),1,0,$cut,1,$game);		break;
	}
	$effect = "";
	if (mt_rand(1,100) > 50){$loss = "gain 1";	$doit = "toucher"; } else {$loss = "lose 1";	$doit = "drinker"; }
	if ($props == 1)
	{
	    switch (mt_rand(0,26))
	    {
		case 0:	$effect = "..anyone that enters it will be teleported to another location.";				break;
		case 1:	$effect = "..contains an elemental type creature that will emerge and attack.";				break;
		case 2:	$effect = "..contains an intelligent spirit that will attempt to answer " . mt_rand(2,6) . " questions about the area.";				break;
		case 3:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$effect = "..anyone who drinks it will be killed unless they can make a L" . mt_rand(1,5) . "SR vs " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,CON) . ".";}
				else {$effect = "..anyone who drinks it will be killed unless they can save for poison.";}
			break;
		case 4:	$effect = "..anything that gets put in it will be eaten away by a powerful acid.";			break;
		case 5:	$effect = "..any magic items put in it will be disenchanted.";						break;
		case 6:	$effect = "..any magic items put in it needing charges will be recharged.";				break;
		case 7:	$effect = "..the liquid turns gold into ";	if (mt_rand(1,100)>50){$effect = $effect . " lead.";} else {$effect = $effect . " platinum.";}		break;
		case 8:	$effect = "..anyone that drinks from it will " . $loss . " " . abilityType($game) . " point only once.";	break;
		case 9:	$effect = "..anyone looking in it can see various places in the area.";					break;
		case 10:$effect = "..anyone looking in it can see the past for the area.";					break;
		case 11:$effect = "..any magic item put in it will be identified by a haunting voice.";				break;
		case 12:$effect = "..liquid is cursed where the " . curseType(mt_rand(1,20),$doit,item,$game) . ".";			break;
		case 13:$effect = "..liquid is painful where the " . $doit . " suffers " . mt_rand(1,4) . "d" . (2*mt_rand(2,6)) ." damage.";					break;
		case 14:$effect = "..liquid is healing where the " . $doit . " is fully refreshed and healed.";			break;
		case 15:$effect = "..liquid is medicinal where the " . $doit . " fully recovers from disease and poisons.";	break;
		case 16:$effect = "..large bubbles form and float to the top where anyone touching the liquid will become trapped in a large bubble that can only be popped with " . mt_rand(3,10) . "0 points of damage done to it.";	break;
	    }
	}
	if (mt_rand(1,100) > 80){$deco = " with a statue [" . idolMaker(5,10,0,$cut,$game,$extra) . "] in the center ";}

	return "made of " . $look . "" . $deco . " and " . $contents . "...it is " . $deep . " and " . $wide . " in the shape of a " . $shape . "." . $effect;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function statueMake()
{
	switch (mt_rand(0,12))
	{
		case 0:	$statue = "brass [worth " . number_format(mt_rand(10,90)) . "gp]";		break;
		case 1:	$statue = "bronze [worth " . number_format(mt_rand(10,90)*5) . "gp]";	break;
		case 2:	$statue = "gold [worth " . number_format(mt_rand(10,90)*100) . "gp]";	break;
		case 3:	$statue = "silver [worth " . number_format(mt_rand(10,90)*10) . "gp]";	break;
		case 4:	$statue = "marble [worth " . number_format(mt_rand(10,90)*10) . "gp]";	break;
		case 5:	$statue = "granite";													break;
		case 6:	$statue = "stone";														break;
		case 7:	$statue = "glass [worth " . number_format(mt_rand(10,90)*2) . "gp]";	break;
		case 8:	$statue = "clay";														break;
		case 9:	$statue = "ivory [worth " . number_format(mt_rand(10,90)*10) . "gp]";	break;
		case 10:$statue = "iron [worth " . number_format(mt_rand(10,90)) . "gp]";		break;
		case 11:$statue = "steel [worth " . number_format(mt_rand(10,90)*2) . "gp]";	break;
		case 12:$statue = "jade [worth " . number_format(mt_rand(10,90)*100) . "gp]";	break;
	}
	return $statue;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function cauldronMaker($game,$extra,$cut)
{
	$make = steelMaker();
	switch (mt_rand(0,6))
	{
		case 0:	$feel = "cold";		break;
		case 1:	$feel = "warm";		break;
		case 2:	$feel = "hot";		break;
		case 3:	$feel = "poisoned";	break;
		case 4:	$feel = "spoiled";	break;
		case 5:	$feel = "contaminated";	break;
	}
	$pot = "";
	switch (mt_rand(0,14))
	{
		case 0:	$pot = "full of " . $feel . " stew";				break;
		case 1:	$pot = "full of " . $feel . " soup";				break;
		case 2:	$pot = "full of " . $feel . " water";				break;
		case 3:	$pot = "full of blood";						break;
		case 4:	$pot = "full of blood and bones";				break;
		case 5:	$pot = "full of bones";						break;
		case 6:	$pot = "full " . strtolower(makeMagicItem(mt_rand(1,5),0,1,$game,$extra,$cut));	break;
	}
	if ($make = "broken"){$pot = "";}
	return $make . " cauldron " . $pot;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function figureMaker()
{
	$figure = array('ape', 'badger', 'bat', 'bear', 'beaver', 'bird', 'boar', 'buffalo', 'bull', 'camel', 'cat', 'cheetah', 'crab', 'dog', 'dolphin', 'eagle', 'elephant', 'falcon', 'frog', 'goat', 'gorilla', 'hawk', 'hippopotamus', 'horse', 'hyena', 'jackal', 'jaguar', 'leopard', 'lion', 'mammoth', 'mule', 'otter', 'owl', 'pony', 'ram', 'rat', 'rhinoceros', 'squirrel', 'stag', 'tiger', 'toad', 'turtle', 'vulture', 'weasel', 'whale', 'wolf', 'wolverine');
	return $figure[mt_rand(0,46)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function kegFiller($item,$game,$extra,$cut)
{
	switch (mt_rand(0,8))
	{
		case 0:	$fill = "an almost empty";		break;
		case 1:	$fill = "a quarter full";		break;
		case 2:	$fill = "a half full";			break;
		case 3:	$fill = "a three quarters full";	break;
		case 4:	$fill = "a full";			break;
		case 5:	$fill = "an empty";			break;
		case 6:	$fill = "an empty";			break;
		case 7:	$fill = "an empty";			break;
		case 8:	$fill = "an empty";			break;
	}

	$filler = mt_rand(1,100);
	if ($fill == "an empty"){$contents = "";}
	else if ($filler < 60){$contents = " of water";}
	else if ($filler < 75){$contents = " of ale";}
	else if ($filler < 90){$contents = " of wine";}
	else if ($filler < 95){$contents = " of contaminated water";}
	else {$contents = " " . strtolower(makeMagicItem(mt_rand(1,5),0,1,$game,$extra,$cut));}

	return $fill . " " . $item . "" . $contents;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function steelMaker()
{
	switch (mt_rand(0,4))
	{
		case 0:	$model = "iron";		break;
		case 1:	$model = "iron";		break;
		case 2:	$model = "metal";		break;
		case 3:	$model = "bronze";		break;
		case 4:	$model = "brass";		break;
	}
	return $model;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function cageMaker()
{
	switch (mt_rand(1,4))
	{
		case 1:	$make = "small";		break;
		case 2:	$make = "medium-short";		break;
		case 3:	$make = "medium-sized";		break;
		case 4:	$make = "large";		break;
	}
	switch (mt_rand(0,6))
	{
		case 0:	$model = "rusty";		break;
		case 1:	$model = "iron";		break;
		case 2:	$model = "metal";		break;
		case 3:	$model = "broken";		break;
		case 4:	$model = "locked rusty";	break;
		case 5:	$model = "locked iron";		break;
		case 6:	$model = "locked metal";	break;
	}
	$fill = "";
	switch (mt_rand(0,13))
	{
		case 0:	$fill = " with straw on the bottom";			break;
		case 1:	$fill = " with humanoid bones on the bottom";		break;
		case 2:	$fill = " with animal bones on the bottom";		break;
		case 3:	$fill = " with ashes on the bottom";			break;
		case 4:	$fill = " with rotten food on the bottom";		break;
		case 5:	$fill = " with a rotted mat on the bottom";		break;
		case 6:	$fill = " with an empty wooden bowl on the bottom";	break;
	}
	return "a " . $make . " " . $model . " cage" . $fill;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function carpetMaker($condition)
{
	$size = array('small', 'large', 'medium-sized');	$size = $size[mt_rand(0,2)];
	$shape = array('square', 'rectangular', 'round');	$shape = $shape[mt_rand(0,2)];
	$name = array('rug', 'carpet');				$name = $name[mt_rand(0,1)];

	if (mt_rand(1,100) > 50){$design = " with a dark " . candleColor(1) . " design on it";}
	if ($condition == 1){$look = array(' worn', ' ruined', ' badly worn', ' rotten', ' moldy', ' torn', ' wet', '', '');	$look = $look[mt_rand(0,8)];}

	if ($condition == 2){$rug = $size . "" . $look . " " . candleColor(0) . " " . $name . "" . $design;}
	else {$rug = "a " . $size . "" . $look . " " . candleColor(0) . " " . $name . "" . $design;}

	return $rug;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function headMount()
{
	$mount = array('bear', 'lion', 'tiger', 'deer', 'boar', 'tiger', 'polar bear', 'dragon', 'ogre', 'giant', 'cougar', 'grizzly bear', 'deer', 'elk', 'moose', 'antelope');
	$mounted = $mount[mt_rand(0,15)];

	if ($mounted == "dragon")
	{
		switch (mt_rand(0,10))
		{
			case 0:	$mounted = "white dragon";	break;
			case 1:	$mounted = "black dragon";	break;
			case 2:	$mounted = "green dragon";	break;
			case 3:	$mounted = "blue dragon";	break;
			case 4:	$mounted = "red dragon";	break;
			case 5:	$mounted = "brass dragon";	break;
			case 6:	$mounted = "copper dragon";	break;
			case 7:	$mounted = "bronze dragon";	break;
			case 8:	$mounted = "silver dragon";	break;
			case 9:	$mounted = "gold dragon";	break;
			case 10:$mounted = "wyvern";		break;
		}
	}
	return $mounted;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function furnitureMake()
{
	$make = array('wooden', 'stone', 'oak', 'granite', 'marble', 'iron', 'steel', 'maple', 'broken wood', 'broken stone', 'rotting wood', 'warped wood', 'crumbling stone', 'cracked granite', 'ruined wood', 'rusty iron');
	return $make[mt_rand(0,15)];
}
?>