<?php

function potionPretty()
{
	$pot_look = array("bubbling", "cloudy", "effervescent", "fuming", "oily", "smoky", "syrupy", "vaporous", "viscous", "watery", "clear", "flecked", "layered", "luminous", "rainbowed");
	$pot_feel = array("acidic", "bilious", "bitter", "burning", "buttery", "dusty", "earthy", "fiery", "fishy", "greasy", "herbal", "honeyed", "lemony", "meaty", "metallic", "milky", "musty", "oniony", "peppery", "perfumy", "salty", "sugary", "sour", "spicy", "sweet", "tart", "vinegary", "watery");
	$pot_color = array("brassy (metallic)", "bronze (metallic)", "coppery (metallic)", "gold (metallic)", "silvery (metallic)", "steely (metallic)", "fuchsia (violet)", "heliotrope (violet)", "lake (violet)", "lavender (violet)", "lilac (violet)", "magenta (violet)", "mauve (violet)", "plum (violet)", "puce (violet)", "purple (violet)", "bone (white)", "colorless (white)", "ivory (white)", "pearl (white)", "amber (yellow)", "buff (yellow)", "citrine (yellow)", "cream (yellow)", "fallow (yellow)", "flaxen (yellow)", "ochre (yellow)", "peach (yellow)", "saffron (yellow)", "straw (yellow)", "dove (gray)", "dun (gray)", "neutral (gray)", "carmine (red)", "cerise (red)", "cherry (red)", "cinnabar (red)", "coral (red)", "crimson (red)", "madder (red)", "maroon (red)", "pink (red)", "rose (red)", "ruby (red)", "russet (red)", "rust (red)", "sanguine (red)", "scarlet (red)", "vermilion (red)", "chocolate (brown)", "ecru (brown)", "fawn (brown)", "mahogany (brown)", "tan (brown)", "terra cotta (brown)", "aquamarine (brown)", "emerald (brown)", "olive (brown)", "azure (blue)", "cerulean (blue)", "indigo (blue)", "sapphire (blue)", "turquoise (blue)", "ultramarine (blue)", "ebony (black)", "inky (black)", "pitchy (black)", "sable (black)", "sooty (black)", "apricot (orange)", "flame (orange)", "golden (orange)", "salmon (orange)", "tawny (orange)");
	$pot_culur = array("brown", "sea green", "midnight blue", "aquamarine", "lemon yellow", "mint", "dandelion", "carrot orange", "wild strawberry", "scarlet", "gold", "umber", "canary", "eggplant", "blue", "magenta", "fuchsia", "gray", "jungle green", "bluish gray", "apricot", "forest green", "white", "snow white", "pine green", "silver", "copper", "spring green", "turquoise blue", "bluish violet", "violet", "bluish green", "blush", "pink", "salmon", "orchid", "maize", "lime", "desert sand", "orange", "blood red", "tan", "almond", "yellow", "shamrock", "burnt sienna", "reddish purple", "chestnut", "yellowish orange", "black", "royal purple", "sunset orange", "purple", "asparagus", "fern", "sky blue", "green", "peach", "cornflower", "burnt orange", "teal blue", "plum", "indigo", "reddish orange", "yellowish green", "red", "mulberry", "antique brass", "lavender", "mahogany", "sunglow", "thistle", "reddish brown", "olive green");

	$pot_luk = mt_rand(0,14);

	if ($pot_luk != 12){ $liquid = "This liquid looks " . $pot_look[$pot_luk];} else {$liquid = "This potion is " . $pot_look[$pot_luk];}
	if ($pot_luk == 11){ $liquid = $liquid . " [" . $pot_culur[mt_rand(0,73)] . " colored]"; }
	if ($pot_luk == 12){ $liquid = $liquid . " [colors of " . $pot_culur[mt_rand(0,24)] . ", " . $pot_culur[mt_rand(25,49)] . ", and " . $pot_culur[mt_rand(50,73)] . "]"; }
	$liquid = $liquid . " in appearance.&nbsp; It also has a " . $pot_feel[mt_rand(0,27)] . " taste and smell to it.&nbsp; ";
	$liquid = $liquid . "It seems to be " . $pot_color[mt_rand(0,73)] . " in color.";

	return $liquid;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ttbottlePicker()
{
	switch (mt_rand(0,9))
	{
		case 0:	$bottle = "crystal bottle";		break;
		case 1:	$bottle = "ceramic bottle";		break;
		case 2:	$bottle = "glass bottle";		break;
		case 3:	$bottle = "glass jar";			break;
		case 4:	$bottle = "test tube";			break;
		case 5:	$bottle = "clay bottle";		break;
		case 6:	$bottle = "clay jar";			break;
		case 7:	$bottle = "crystal bottle";		break;
		case 8:	$bottle = "iron flask";			break;
		case 9: $bottle = "glass decanter";		break;
	}
	return $bottle;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ttPotionStage($stage)
{
	if ($stage == 1)
	{
		switch (mt_rand(0,3))
		{
			case 0:	$item = "a thick paste";		break;
			case 1:	$item = "a gooey substance";	break;
			case 2:	$item = "a watery substance";	break;
			case 3:	$item = "a thin paste";			break;
		}
	}
	else if ($stage == 2)
	{
		$which = mt_rand(1,4);

		if ($which == 1)
		{
			switch (mt_rand(0,6))
			{
				case 0:	$item = "stale water";	break;
				case 1:	$item = "fresh water";	break;
				case 2:	$item = "sea water";	break;
				case 3:	$item = "water";		break;
				case 4:	$item = "swamp water";	break;
				case 5:	$item = "river water";	break;
				case 6:	$item = "lake water";	break;
			}
		}
		else if ($which == 2)
		{
			switch (mt_rand(0,5))
			{
				case 0:	$item = "wine";			break;
				case 1:	$item = "brandy";		break;
				case 2:	$item = "ale";			break;
				case 3:	$item = "cider";		break;
				case 4:	$item = "mead";			break;
				case 5:	$item = "grog";			break;
			}
		}
		else if ($which == 3)
		{
			switch (mt_rand(0,13))
			{
				case 0:	$item = "lemon juice";			break;
				case 1: $item = "orange juice";			break;
				case 2: $item = "apple juice";			break;
				case 3: $item = "cow milk";				break;
				case 4: $item = "goat milk";			break;
				case 5: $item = "coconut juice";		break;
				case 6: $item = "cranberry juice";		break;
				case 7: $item = "grape juice";			break;
				case 8: $item = "grapefruit juice";		break;
				case 9: $item = "lime juice";			break;
				case 10:$item = "pineapple juice";		break;
				case 11:$item = "strawberry juice";		break;
				case 12:$item = "tomato juice";			break;
				case 13:$item = "carrot juice";			break;
			}
		}
		else
		{
			$item = strtolower(animalPicker()) . " blood";
			switch (mt_rand(0,15))
			{
				case 0: $item = "sheep blood";	break;
				case 1: $item = "pig blood";	break;
			}
		}
	}
	else if ($stage == 3)
	{
		switch (mt_rand(0,11))
		{
			case 0:	$item = "minutes";	$limit = mt_rand(1,10)*5; break;
			case 1:	$item = "minutes";	$limit = mt_rand(1,10)*5; break;
			case 2:	$item = "minutes";	$limit = mt_rand(1,10)*5; break;
			case 3:	$item = "minutes";	$limit = mt_rand(1,10)*5; break;
			case 4:	$item = "minutes";	$limit = mt_rand(1,10)*5; break;
			case 5:	$item = "minutes";	$limit = mt_rand(1,10)*5; break;
			case 6:	$item = "hour";		$limit = "an"; break;
			case 7:	$item = "hours";	$limit = mt_rand(2,8); break;
			case 8:	$item = "hours";	$limit = mt_rand(2,8); break;
			case 9:	$item = "hours";	$limit = mt_rand(2,8); break;
			case 10:$item = "days";		$limit = mt_rand(2,7); break;
			case 11:$item = "day";		$limit = "a"; break;
		}
	}
	else
	{
		switch (mt_rand(0,2))
		{
			case 0:	$item = "heated";	break;
			case 1:	$item = "warm";		break;
			case 2:	$item = "cold";		break;
		}
	}
	return array($item,$limit);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ttPotionMixer($game)
{
	$mix1 = "";		$mix2 = "";		$mix3 = "";		$running = 1;		$mix4 = "";		$mix5 = "";

	while ($running > 0) :

		$mixer = contentsChooser(1,$game,2);

		if (($mix1 == "") && ($mixer != "")){$mix1 = $mixer;}
		else if (($mix2 == "") && ($mixer != $mix1) && ($mixer != "")){$mix2 = $mixer;}
		else if (($mix2 != "") && ($mix3 == "") && ($mixer != $mix1) && ($mixer != $mix2) && ($mixer != "")){$mix3 = $mixer; $running = 0;}

	endwhile;

	switch (mt_rand(0,2))
	{
		case 0:	$stage = ttPotionStage(3); $ing1 = "Let " . $mix1 . " sit in the sun for " . $stage[1] . " " . $stage[0] . ".";	break;
		case 1:	$soak = ttPotionStage(2); $mix4 = $soak[0]; $stage = ttPotionStage(3); $ing1 = "Let " . $mix1 . " set in " . $mix4 . " for " . $stage[1] . " " . $stage[0] . ".";	break;
		case 2:	$stage = ttPotionStage(3); $ing1 = "Heat up " . $mix1 . " in an alembic for " . $stage[1] . " " . $stage[0] . " so a new liquid, that you will use, forms in a separate container.";		break;
	}

	switch (mt_rand(0,3))
	{
		case 0:	$stage = ttPotionStage(1); $ing2 = "Grind " . $mix2 . " and " . $mix3 . " with a mortar and pestle until you get " . $stage[0] . " (about " . mt_rand(2,12) . " minutes).";	break;
		case 1:	$stage = ttPotionStage(3); $ing2 = "Cook " . $mix2 . " and " . $mix3 . " together in a pan for " . mt_rand(2,15) . " minutes and let sit in the pan for " . $stage[1] . " " . $stage[0] . ".";	break;
		case 2:	$stage = ttPotionStage(3); $heat = ttPotionStage(4); $soak = ttPotionStage(2); $mix5 = $soak[0]; $ing2 = "Mix " . $mix2 . " and " . $mix3 . " together in a " . $heat[0] . " cauldron with some " . $mix5 . " and let sit for " . $stage[1] . " " . $stage[0] . ".";		break;
		case 3:	$stage = ttPotionStage(3); $soak = ttPotionStage(2); $mix5 = $soak[0]; $ing2 = "Boil " . $mix2 . " and " . $mix3 . " in " . $mix5 . " and then let simmer for " . $stage[1] . " " . $stage[0] . ".";	break;
	}

	switch (mt_rand(0,8))
	{
		case 0:	$stage = ttPotionStage(3); $ing3 = "Mix it all together in a container and let sit for " . $stage[1] . " " . $stage[0] . " before drinking it.";	break;
		case 1:	$stage = ttPotionStage(3); $ing3 = "Mix it all together in a clean cauldron and let simmer for " . $stage[1] . " " . $stage[0] . " to finish.";	break;
		case 2:	$ing3 = "Mix it all together in a container and filter with a cloth into a clean container to finish.";	break;
		case 3:	$stage = ttPotionStage(3); $ing3 = "Mix it all together in a container and set it in the sun for " . $stage[1] . " " . $stage[0] . " before drinking it.";	break;
		case 4:	$stage = ttPotionStage(3); $ing3 = "Mix it all together in a container and bury it under fertile soil for " . $stage[1] . " " . $stage[0] . ".&nbsp; Dig it up and then you are able to drink it.";	break;
		case 5:	$stage = ttPotionStage(3); $ing3 = "Mix it all together in a container and bury it over someone's grave for " . $stage[1] . " " . $stage[0] . ".&nbsp; Dig it up and then you are able to drink it.";	break;
		case 6:	$stage = ttPotionStage(3); $ing3 = "Mix it all together in a container and set it in complete darkness for " . $stage[1] . " " . $stage[0] . " before drinking it.";	break;
		case 7:	$ing3 = "Mix it all together in a container to finish.";	break;
		case 8:	$ing3 = "Mix it all together in a container to finish.";	break;
	}

	if (mt_rand(1,2) == 1){$recipe = $ing1 . "&nbsp; " . $ing2 . "&nbsp; " . $ing3;}
	else {$recipe = $ing2 . "&nbsp; " . $ing1 . "&nbsp; " . $ing3;}

	return array($mix1,$mix2,$mix3,$mix4,$mix5,$recipe);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ttPotionMaker($game,$potion)
{
	$level = mt_rand(5,15);

	switch (mt_rand(0,5))
	{
		case 0:	$lqud = "Potion";		break;
		case 1:	$lqud = "Elixir";		break;
		case 2:	$lqud = "Concoction";	break;
		case 3:	$lqud = "Draught";		break;
		case 4:	$lqud = "Liquid";		break;
		case 5:	$lqud = "Mixture";		break;
	}

	switch ($potion)
	{
		case 0: $item = "Acid Resistance " . $lqud; $does = "rub on self or items...lasts until acid is splashed on them"; $level = "L2SR"; break;
		case 1:	$item = "Animal Domination " . $lqud; $does = "lasts for " . ($level+1) . " hours"; $level = "L3SR"; break;
		case 2: $item = "Blessing " . $lqud; $does = "drinker will have a curse lifted, or it can be poured on an item to remove a curse from it"; $level = "L1SR"; break;
		case 3: $item = "Bluntness " . $lqud; $does = "any blunt weapon it is rubbed on has an extra " . mt_rand(2,4) . " dice for  " . ($level+1) . " hours"; $level = "L2SR"; break;
		case 4: $item = "Cleansing " . $lqud; $does = "drinker will have a curse lifted, or it can be poured on an item to remove a curse from it"; $level = "L1SR"; break;
		case 5: $item = "Cold Resistance " . $lqud; $does = "lasts for " . ($level+1) . " hours"; $level = "L2SR"; break;
		case 6:	$item = "Curing " . $lqud; $does = "cures disease and illness"; $level = "L1SR"; break;
		case 7: $item = "Cursed " . $lqud; $does = "" . curseType($level,drinker,item,$game) . ""; $level = "L2SR"; break;
		case 8: $item = "Dexterity " . $lqud; $does = "increases the drinker's " . abilityTranslate($game,DEX) . " by 5 for " . ($level+1) . " hours"; $level = "L1SR"; break;
		case 9: $item = "Disenchanting " . $lqud; $does = "remove enchantments on those it is rubbed on"; $level = "L3SR"; break;
		case 10:$item = "Dragon Breath " . $lqud; $does = "drinker can breath fire instead of a normal attack with a 6+6"; $level = "L3SR"; break;
		case 11:$item = "Dragon Domination " . $lqud; $does = "lasts for " . ($level+1) . " hours"; $level = "L4SR"; break;
		case 12:$item = "Elemental Protection " . $lqud; $does = "lasts for " . ($level+1) . " hours"; $level = "L2SR"; break;
		case 13:$item = "Etherealness " . $lqud; $does = "can pass through " . mt_rand(2,10) . " feet thick walls for " . ($level+5) . " minutes"; $level = "L4SR"; break;
		case 14:$item = "Fire Resistance " . $lqud; $does = "lasts for " . ($level+1) . " hours"; $level = "L2SR"; break;
		case 15:$item = "Flaming " . $lqud; $does = "burns as soon as it is exposed to air for " . ($level+1) . " hours"; $level = "L1SR"; break;
		case 16:$item = "Flying " . $lqud; $does = "lasts for " . ($level+10) . " minutes"; $level = "L2SR"; break;
		case 17:$item = "Giant Domination " . $lqud; $does = "lasts for " . ($level+1) . " hours"; $level = "L4SR"; break;
		case 18:$item = "Giant Strength " . $lqud; $does = "increases the drinker's " . abilityTranslate($game,STR) . " by 10 for " . ($level+1) . " hours"; $level = "L3SR"; break;
		case 19:$item = "Growing " . $lqud; $does = "drinker and items grow to 4x normal size for " . ($level+1) . " minutes"; $level = "L2SR"; break;
		case 20:$item = "Healing " . $lqud; $does = "restores " . mt_rand(1,2) . "d6+" . $level . " " . abilityTranslate($game,CON) . ""; $level = "L1SR"; break;
		case 21:$item = "Heroic " . $lqud; $does = "drinker gets to add an extra dice to everything they do for " . ($level *2) . " minutes"; $level = "L1SR"; break;
		case 22:$item = "Humanoid Domination " . $lqud; $does = "lasts for " . ($level+1) . " hours"; $level = "L2SR"; break;
		case 23:$item = "Infernal " . $lqud; $does = "" . curseType($level,drinker,item,$game) . ""; $level = "L2SR"; break;
		case 24:$item = "Intellect " . $lqud; $does = "increases the drinker's " . abilityTranslate($game,INT) . " by 5 for " . ($level+1) . " hours"; $level = "L1SR"; break;
		case 25:$item = "Invisibility " . $lqud; $does = "lasts for " . ($level+1) . " minutes"; $level = "L2SR"; break;
		case 26:$item = "Invulnerable " . $lqud; $does = "lasts for " . ($level *2) . " minutes"; $level = "L4SR"; break;
		case 27:$item = "Levitation " . $lqud; $does = "can levitate " . mt_rand(1,6) . " feet off the ground for " . ($level+10) . " minutes"; $level = "L2SR"; break;
		case 28:$item = "Life Giving " . $lqud; $does = "brings those back from the dead"; $level = "L5SR"; break;
		case 29:$item = "Lore " . $lqud; $does = "can identify and appraise any item " . (($level+1)*10) . " minutes"; $level = "L1SR"; break;
		case 30:$item = "Luck " . $lqud; $does = "increases the drinker's " . abilityTranslate($game,LCK) . " by 5 for " . ($level+1) . " hours"; $level = "L1SR"; break;
		case 31:$item = "Lycanthropy " . $lqud; $does = "drinker will turn into a " . lycanthrope() . " for " . mt_rand(2,12) . " hours, but is not permanent and it unaffects those suffering from lycanthropy"; $level = "L3SR"; break;
		case 32:$item = "Lying " . $lqud; $does = "drinker can convincely tell lies for " . mt_rand(10,20) . " minutes"; $level = "L1SR"; break;
		case 33:$item = "Mind Reading " . $lqud; $does = "lasts for " . ($level *2) . " minutes"; $level = "L3SR"; break;
		case 34:$item = "Mist " . $lqud; $does = "drinker and items turn to mist for " . ($level *2) . " minutes"; $level = "L2SR"; break;
		case 35:$item = "Persuasive " . $lqud; $does = "can convince others to so something non-life threatening for " . ($level *2) . " minutes"; $level = "L1SR"; break;
		case 36:$item = "Plant Control " . $lqud; $does = "lasts for " . ($level+1) . " hours"; $level = "L3SR"; break;
		case 37:$item = "Poison Antidote"; $does = "allows +" . $level . " for any SR against poison"; $level = "L1SR"; break;
		case 38:$item = "Poison Cure " . $lqud; $does = "can cure any poison if consumed quick enough"; $level = "L2SR"; break;
		case 39:$item = "Poison Immunity " . $lqud; $does = "can provide poison immunity for " . mt_rand(2,24) . " hours"; $level = "L3SR"; break;
		case 40:$item = "Polymorph " . $lqud; $does = "can turn into another creature the same size for " . ($level+1) . " hours"; $level = "L2SR"; break;
		case 41:$item = "Purity " . $lqud; $does = "turns impure liquids to pure"; $level = "L1SR"; break;
		case 42:$item = "Secret Doors " . $lqud; $does = "drinker can see secret doors and compartments for about an hour"; $level = "L2SR"; break;
		case 43:$item = "Sharpening " . $lqud; $does = "any sharp weapon it is rubbed on has an extra " . mt_rand(2,4) . " dice for  " . ($level+1) . " hours"; $level = "L2SR"; break;
		case 44:$item = "Shrinking " . $lqud; $does = "drinker and items shrink to 5% normal size for " . ($level+1) . " minutes"; $level = "L2SR"; break;
		case 45:$item = "Slippery " . $lqud; $does = "poured on the floor where anyone slips and falls"; $level = "L1SR"; break;
		case 46:$item = "Speech " . $lqud; $does = "can talk in the same language as the one you are trying to converse with for " . (($level+1)*10) . " minutes"; $level = "L3SR"; break;
		case 47:$item = "Speed " . $lqud; $does = "increases the drinker's " . abilityTranslate($game,SPD) . " by 5 for " . ($level+1) . " hours"; $level = "L1SR"; break;
		case 48:$item = "Spider " . $lqud; $does = "can walk on walls and ceilings for " . (($level+1)*10) . " minutes"; $level = "L3SR"; break;
		case 49:$item = "Super Heroic " . $lqud; $does = "drinker gets to add two extra dice to everything they do for " . ($level *2) . " minutes"; $level = "L3SR"; break;
		case 50:$item = "Swimming " . $lqud; $does = "drinker can move through water as though they are moving on land for an hour"; $level = "L2SR"; break;
		case 51:$item = "Treasure Seeking " . $lqud; $does = "can find nearby treasure for " . ($level*2) . " minutes"; $level = "L4SR"; break;
		case 52:$item = "Truthfulness " . $lqud; $does = "drinker tells nothing but the truth for " . mt_rand(10,20) . " minutes unless they may an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . ""; $level = "L1SR"; break;
		case 53:$item = "Undead Domination " . $lqud; $does = "lasts for " . ($level+1) . " hours"; $level = "L3SR"; break;
		case 54:$item = "Underwater Breathing " . $lqud; $does = "lasts for " . ($level + 1) . " hours"; $level = "L2SR"; break;
		case 55:$item = "Ventriloquism " . $lqud; $does = "drinker can throw their voice " . mt_rand(10,20) . " minutes"; $level = "L1SR"; break;
		case 56:$item = "Vile " . $lqud; $does = "" . curseType($level,drinker,item,$game) . ""; $level = "L2SR"; break;
		case 57:$item = "Youth " . $lqud; $does = "drinker becomes " . mt_rand(2,20) . " years younger"; $level = "L6SR"; break;
	}
	return array($item,$does,$level);
}

?>