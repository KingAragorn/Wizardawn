<?php

function makeMagicItem($level,$size,$varb,$game,$extra,$cut)
{
	if ($level > 20){$level = 20;}

if (($game != "Tunnels & Trolls 5th Edition") && ($game != "Tunnels & Trolls 7th Edition") && ($game != "Tunnels & Trolls Deluxe"))
{
	if ($level > 0){$level = mt_rand(1,$level);} else {$level = mt_rand(1,20);}

	$which_item = mt_rand(1,100);

	if ($which_item < 21){$the_item = "potion";}
	else if ($which_item < 36){$the_item = "scroll";}
	else if ($which_item < 41){$the_item = "ring";}
	else if ($which_item < 46){$the_item = "wand";}
	else if ($which_item < 61){$the_item = "magic";}
	else if ($which_item < 76){$the_item = "armor"; if ($size != 3){$the_item = "weapon";} }
	else {$the_item = "weapon";}

	// SPECIAL CONSTRUCT VARS SENT //
	if ($varb == 1){$the_item = "potion";}

	 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ($the_item == "potion")
	{
		$bottle = bottlePicker();

		switch (mt_rand(0,5))
		{
			case 0:	$lqud = "potion";	break;
			case 1:	$lqud = "elixir";	break;
			case 2:	$lqud = "concoction";	break;
			case 3:	$lqud = "draught";	break;
			case 4:	$lqud = "liquid";	break;
			case 5:	$lqud = "mixture";	break;
		}

		switch (mt_rand(0,54))
		{
			case 0:	$item = "of healing " . $lqud . " (restores 1d4x" . $level . " health)";
				if ($game == "Swords & Six-Siders"){ $item = "of healing " . $lqud . " (restores 1d6x" . $level . " health)"; }
				break;
			case 1:	$item = "of curing " . $lqud . " (cures disease and illness)";	break;
			case 2:	$item = "of poison antidote (gives a " . $level . " save bonus for poison bonus if consumed in time)";	break;
			case 3:	$item = "of invisibility " . $lqud . " (invisibility for " . ($level+1) . " turns)";	break;
			case 4:	$item = "of animal domination " . $lqud . " (" . animalType() . ")";	break;
			case 5:	$item = "of clairaudience " . $lqud . "";	break;
			case 6:	$item = "of clairvoyance " . $lqud . "";	break;
			case 7:	$item = "of shrinking " . $lqud . " (drinker and items shrink to 5% normal size for " . ($level+1) . " turns)";	break;
			case 8:	$item = "of dragon domination " . $lqud . " (" . dragonType(0) . ")";	break;
			case 9:	$item = "of mind reading " . $lqud . " (lasts for " . ($level *2) . " minutes)";	break;
			case 10:$item = "of fire resistance " . $lqud . "";	break;
			case 11:$item = "of cold resistance " . $lqud . "";	break;
			case 12:$item = "of flying " . $lqud . "";	break;
			case 13:$item = "of mist " . $lqud . " (drinker and items turn to mist for " . ($level *2) . " minutes)";	break;
			case 14:$item = "of giant domination " . $lqud . " (" . giantType(1) . ")";	break;
			case 15:$item = "of giant strength " . $lqud . " (" . giantType(1) . ")";	break;
			case 16:$item = "of growing " . $lqud . " (drinker and items grow to 4x normal size for " . ($level+1) . " turns)";	break;
			case 17:$item = "of heroism " . $lqud . "";	break;
			case 18:$item = "of humanoid domination " . $lqud . " (" . humanType() . ")";	break;
			case 19:$item = "of invulnerable " . $lqud . " (lasts for " . ($level *2) . " minutes)";	break;
			case 20:$item = "of levitation " . $lqud . "";	break;
			case 21:$item = "of youth " . $lqud . "";	break;
			case 22:$item = "of etherealness " . $lqud . "";	break;
			case 23:$item = "of slippery, magical oil";	break;
			case 24:$item = "of blessing oil (remove curses on those it is rubbed on)";	break;
			case 25:$item = "of persuasive " . $lqud . "";	break;
			case 26:$item = "of plant control " . $lqud . "";	break;
			case 27:$item = "of polymorph " . $lqud . "";	break;
			case 28:$item = "of speed " . $lqud . "";	break;
			case 29:$item = "of super heroism " . $lqud . "";	break;
			case 30:$item = "of purity " . $lqud . " (turns impure liquids to pure)";	break;
			case 31:$item = "of treasure seeking " . $lqud . "";	break;
			case 32:$item = "of undead domination " . $lqud . " (" . undeadType() . ")";	break;
			case 33:$item = "of underwater breathing " . $lqud . "";	break;
			case 34:$item = "of life giving " . $lqud . " (brings those back from the dead)";	break;
			case 35:$item = "of dragon breath " . $lqud . " (drinker can breath fire)";	break;
			case 36:$item = "of acid resistance oil (rub on self or items)";	break;
			case 37:$item = "of disenchanting oil (remove enchantments on those it is rubbed on)";	break;
			case 38:$item = "of elemental protection " . $lqud . " (" . elementalType($game) . ")";	break;
			case 39:$item = "of flaming oil (burns as soon as it is exposed to air)";	break;
			case 40:$item = "of bluntness oil (makes blunt weapons behave at +" . mt_rand(1,4) . " for " . ($level+1) . " hours)";
				if ($game == "Swords & Six-Siders"){ $item = "of bluntness oil (gives blunt weapons +" . mt_rand(1,2) . " to damage for " . ($level+1) . " hours)"; }
				break;
			case 41:$item = "of sharpening oil (makes edge weapons behave at +" . mt_rand(1,6) . " for " . ($level+1) . " hours)";
				if ($game == "Swords & Six-Siders"){ $item = "of sharpening oil (gives edge weapons +" . mt_rand(1,2) . " to damage for " . ($level+1) . " hours)"; }
				break;
			case 42:$item = "of lying " . $lqud . " (drinker can convincingly tell lies for " . ($level+1) . " hours)";	break;
			case 43:$item = "of ventriloquism " . $lqud . "";	break;
			case 44:$item = "of vitality " . $lqud . "";	break;
			case 45:$item = "of truthfulness " . $lqud . " (drinker tells nothing but the truth for 10 minutes unless they save for magic)";	break;
			case 46:$item = "of swimming " . $lqud . " (drinker can move through water as though they are moving on land for an hour)";	break;
			case 47:$item = "of secret doors " . $lqud . " (drinker can see secret doors and compartments for about an hour)";	break;
			case 48:$item = "of spider " . $lqud . " (can walk on walls and ceilings for " . (($level+1)*10) . " minutes)";	break;
			case 49:$item = "of lore " . $lqud . " (can identify and appraise any item " . (($level+1)*10) . " minutes)";	break;
			case 50:$item = "of speech " . $lqud . " (can talk in the same language as the one you are trying to converse with for " . (($level+1)*10) . " minutes)";	break;
			case 51:$item = "of cursed " . $lqud . " (" . curseType($level,drinker,item,$game) . ")";	break;
			case 52:$item = "of vile " . $lqud . " (" . curseType($level,drinker,item,$game) . ")";	break;
			case 53:$item = "of infernal " . $lqud . " (" . curseType($level,drinker,item,$game) . ")";	break;
			case 54:$item = "of lycanthropy (drinker will turn into a " . lycanthrope() . " for " . mt_rand(2,12) . " hours, but is not permanent and it is ineffective toward those suffering from lycanthropy)";	break;
		}

		if ($varb != 1){$item = $bottle . " " . $item . ". " . potionPretty();} else {$item = $item . " {<i>" . potionPretty() . "</i>}";}
	} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "scroll")
	{
		if (($game == "OSRIC") || ($game == "Swords & Six-Siders") || ($game == "AD&D") || ($game == "BD&D") || ($game == "BFRPG") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry")){$item = "Scroll with a " . gameSpellChooser($game,$level,'');}
		else {$item = "Scroll with " . powerUp($level) . " level " . spellSchool($game) . " spell";}

		switch (mt_rand(0,48))
		{
			case 0:	$item = "protection from demons scroll";	break;
			case 1:	$item = "protection from devils scroll";	break;
			case 2:	$item = "protection from " . elementalType($game) . " elementals scroll";	break;
			case 3:	$item = "protection from " . lycanthrope() . " scroll";	break;
			case 4:	$item = "protection from magic scroll";	break;
			case 5:	$item = "protection from stone flesh scroll";	break;
			case 6:	$item = "protection from possession scroll";	break;
			case 7:	$item = "protection from acidic attacks scroll";	break;
			case 8:	$item = "protection from dragon's breath scroll";	break;
			case 9:	$item = "protection from cold scroll";	break;
			case 10:$item = "protection from fire scroll";	break;
			case 11:$item = "protection from electricity scroll";	break;
			case 12:$item = "protection from breath attacks scroll (does not work against dragons)";	break;
			case 13:$item = "protection from gases scroll";	break;
			case 14:$item = "protection from illusions scroll";	break;
			case 15:$item = "protection from magical holding scroll";	break;
			case 16:$item = "protection from plants scroll";	break;
			case 17:$item = "protection from poison scroll";	break;
			case 18:$item = "protection from traps scroll";	break;
			case 19:$item = "protection from water scroll";	break;
			case 20:$item = "protection from magical weapons scroll";	break;
			case 21:$item = "protection from normal weapons scroll";	break;
			case 22:$item = "cursed scroll (" . curseType($level,reader,item,$game) . ")";	break;
			case 23:$item = "vile parchment (" . curseType($level,reader,item,$game) . ")";	break;
			case 24:$item = "infernal scroll (" . curseType($level,reader,item,$game) . ")";	break;
		}
		if (mt_rand(1,100) > 60){$item = $item . " [written in " . languageType($game) . "]";}
	} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "ring")
	{
		$charges = mt_rand(10,50);
		switch (mt_rand(0,38))
		{
			case 0:	$item = "ring of djinn summoning";	break;
			case 1:	$item = "ring of elemental domination (" . elementalType($game) . ")";	break;
			case 2:	$item = "ring of feather falling";	break;
			case 3:	$item = "ring of fire resistance";		$use_charges = 1;	$no_words = 1; 	break;
			case 4:	$item = "ring of cold resistance";		$use_charges = 1;	$no_words = 1; 	break;
			case 5:	$item = "ring of free movement";	break;
			case 6:	$item = "ring of influence";	break;
			case 7:	$item = "ring of invisibility";	break;
			case 8:	$item = "ring of animal domination (" . animalType() . ")";	break;
			case 9:	$item = "ring of protection " . protectionType();	break;
			case 10:$item = "ring of regenerating";	break;
			case 11:$item = "ring of magic (contains " . mt_rand(2,5) . " " . spellSchool($game) . " spells)";	break;
			case 12:$item = "ring of turning spells";	break;
			case 13:$roll = mt_rand(1,100); if ($roll < 26){$load = "25";} else if ($roll < 51){$load = "50";} else if ($roll < 90){$load = "100";} else if ($roll < 100){$load = "200";} else {$load = "400";}
				$item = "ring of telekinesis (" . $load . " pounds)";	break;
			case 14:$item = "ring of swimming";	break;
			case 15:$item = "ring of warmth";	break;
			case 16:$item = "ring of water walking";	break;
			case 17:$item = "ring of sorcery (wizards only: double the " . $power . " level spells)";	break;
			case 18:$item = "ring of sight (can see through obstacles)";	break;
			case 19:$item = "ring of animal taming";	break;
			case 20:$item = "ring of phasing (allows wearer to blink out of existence for a short time)";	break;
			case 21:$item = "ring of the chameleon";	break;
			case 22:$item = "ring of elven power (abilities like an elf)";	break;
			case 23:$item = "ring of leaping (can leap 30 feet or 10 feet high)";	break;
			case 24:$item = "ring of shielded mind (immune to mind reading magic)";	break;
			case 25:$item = "ring of lightning touch (shock opponent for 1d8+6 damage 3 times a day)";
				if ($game == "Swords & Six-Siders"){ $item = "ring of lightning touch (shock opponent for 1d6+6 damage 3 times a day)"; }
				break;
			case 26:$item = "ring of falsehood (can detect lies and cannot tell any)";	break;
			case 27:$item = "ring of the warrior (+" . mt_rand(1,3) . " to attack rolls)";
				if ($game == "Swords & Six-Siders"){ $item = "ring of the warrior (+" . mt_rand(1,2) . " to attack rolls)"; }
				break;
			case 28:$item = "ring of the thief (thieves only: +" . mt_rand(5,15) . " to thief skills)";
				if ($game == "Swords & Six-Siders"){ $item = "ring of the thief (thieves only: +" . mt_rand(1,2) . " to thief skills)"; }
				break;
			case 29:$item = "ring of strength +1";	if (($game == "Swords & Six-Siders") || ($game == "OSRIC") || ($game == "AD&D") || ($game == "BD&D") || ($game == "BFRGP") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry")){$item = "ring of strength +1";} $no_words = 1; $use_charges = 1;	break;
			case 30:$item = "ring of intellect +1";	if (($game == "Swords & Six-Siders") || ($game == "OSRIC") || ($game == "AD&D") || ($game == "BD&D") || ($game == "BFRGP") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry")){$item = "ring of intelligence +1";} $no_words = 1; $use_charges = 1;	break;
			case 31:$item = "ring of agility +1";	if (($game == "Swords & Six-Siders") || ($game == "OSRIC") || ($game == "AD&D") || ($game == "BD&D") || ($game == "BFRGP") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry")){$item = "ring of dexterity +1";} $no_words = 1; $use_charges = 1;	break;
			case 32:$item = "ring of stamina +1";	if (($game == "Swords & Six-Siders") || ($game == "OSRIC") || ($game == "AD&D") || ($game == "BD&D") || ($game == "BFRGP") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry")){$item = "ring of constitution +1";} $no_words = 1; $use_charges = 1;	break;
			case 33:$item = "ring of turning (automatically turn " . undeadType() . ")";	break;
			case 34:$item = "cursed ring (" . curseType($level,wearer,equip,$game) . ")";		$curses = 1; break;
			case 35:$item = "vile ring (" . curseType($level,wearer,equip,$game) . ")";		$curses = 1; break;
			case 36:	$ring_picks = mt_rand(1,3);
				if ($ring_picks == 1){$item = "ring of envy (anyone who sees this ring has to have it...most often resorting to violence...unless they can save for spells)"; }
				else if ($ring_picks == 2){$item = "ring of severing (anyone who puts this ring on will have their finger cut off)"; $curses = 1; }
				else {$item = "infernal ring (" . curseType($level,wearer,equip,$game) . ")";}
					$curses = 1;
						break;
			case 37:$item = "rings of fellowship (if one wears this ring and begins to get harmed, the other will begin to glow with a " . beamColor() . " light on the other wearer`s hand)";	$no_words = 1; $use_charges = 1;	break;
			case 38:$item = "rings of the birds (this will cause the wearer, and all of their possessions, to turn into a " . birdType() . " for " . mt_rand(2,6) . " hours per day)";	break;
		}
			$decorate = "[a " . preciousChooser() . " ring with a " . gemChooser() . " set in it";
				if (mt_rand(1,100) > 50){$decorate = "[a " . preciousChooser() . " ring";}
			if ((mt_rand(1,100) > 70) && ($curses != 1) && ($no_words != 1)){$words = "...there is a command word engraved on the inside written in " . languageType($game) . " that says `" . castingName() . "`";}
				if ((mt_rand(1,100) > 90) && ($curses != 1) && ($no_words != 1)){$words = "...the command word to use this is `" . castingName() . "`, which can be learned with identifying magic";}
			$decorate = $decorate . "" . $words;
			if ((mt_rand(1,100) > 70) && ($curses != 1) && ($use_charges != 1)){$item = $item . " " . $decorate . " - it has " . $charges . " charges]";} else {$item = $item . " " . $decorate . "]";}
			if (mt_rand(1,100) > 50){$item = "<u>" . artifactNaming(ring,'',$curses,0) . "</u> - " . $item;}
	} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "wand")
	{
		if ($size == 1){$r_min=20; $r_max = 47;} else if ($size == 2){$r_min=10; $r_max = 47;} else {$r_min=0; $r_max = 47;}
		switch (mt_rand($r_min,$r_max))
		{
			case 0:$item = "staff of domination";		break;
			case 1:$item = "staff of curing";		break;
			case 2:$item = "staff of the wizard";		break;
			case 3:$item = "staff of power";		break;
			case 4:$item = "staff of the snake";		break;
			case 5:$item = "staff of striking";		break;
			case 6:$item = "staff of withering";		break;
			case 7:$item = "staff of insect swarm";		break;
			case 8:$item = "staff of thunderstorms";	break;
			case 9:$item = "staff of the forest";		break;
			case 10:$item = "rod of absorbing magic";	break;
			case 11:$item = "rod of beguilement";		break;
			case 12:$item = "rod of cancelling";		break;
			case 13:$item = "rod of the mighty lord";	break;
			case 14:$item = "rod of resurrecting";		break;
			case 15:$item = "rod of domination";		break;
			case 16:$item = "rod of smite enemy";		break;
			case 17:$item = "rod of awareness";		break;
			case 18:$item = "rod of astral travel";		break;
			case 19:$item = "rod of safe haven";		break;
			case 20:$item = "wand of conjuring";		break;
			case 21:$item = "wand of finding foes";		break;
			case 22:$item = "wand of fearing";		break;
			case 23:$item = "wand of fire";			break;
			case 24:$item = "wand of frost";		break;
			case 25:$item = "wand of lights";		break;
			case 26:$item = "wand of illusions";		break;
			case 27:$item = "wand of lightning";		break;
			case 28:$item = "wand of finding magic";	break;
			case 29:$item = "wand of finding metals";	break;
			case 30:$item = "wand of conjuring";		break;
			case 31:$item = "wand of magic arrows";		break;
			case 32:$item = "wand of negating";		break;
			case 33:$item = "wand of paralyzing";		break;
			case 34:$item = "wand of polymorph";		break;
			case 35:$item = "wand of finding secret doors";	break;
			case 36:$item = "wand of finding traps";	break;
			case 37:$item = "wand of wonderous magic";	break;
			case 38:$item = "wand of autumn (clears plants and vegetation)";		break;
			case 39:$item = "wand of the worm (digs, moves earth, changes rock to mud)";	break;
			case 40:$item = "wand of fireballs";		break;
			case 41:$item = "wand of extinguishing";	break;
			case 42:$item = "wand of great force";		break;
			case 43:$item = "wand of snow storms";		break;
			case 44:$item = "wand of lightning bolts";	break;
			case 45:$item = "wand of metal control";	break;
			case 46:$item = "wand of size control";		break;
			case 47:$item = "wand of vaporous steam";	break;
		}
		$mystic_item = explode(" ", $item);
		if (substr($item, 0, 3) == "rod")
		{
			$charges = mt_rand(10,50);
			switch (mt_rand(0,8))
			{
				case 0:	$material = "bone";	break;
				case 1:	$material = "ivory";	break;
				case 2:	$material = "silver";	break;
				case 3:	$material = "iron";	break;
				case 4:	$material = "bronze";	break;
				case 5:	$material = "metal";	break;
				case 6:	$material = "platinum";	break;
				case 7:	$material = "gold";	break;
				case 8:	$material = "wood";	break;
			}
			if (mt_rand(1,100) > 50){$extradj = " and has a " . gemChooser() . " at each end";}
		}
		else if (substr($item, 0, 3) == "wan")
		{
			$charges = mt_rand(20,100);
			switch (mt_rand(0,9))
			{
				case 0:	$material = "bone";		break;
				case 1:	$material = "ivory";		break;
				case 2:	$material = "wood";		break;
				case 3:	$material = "strange wood";	break;
				case 4:	$material = "bone";		break;
				case 5:	$material = "ivory";		break;
				case 6:	$material = "wood";		break;
				case 7:	$material = "strange wood";	break;
				case 8:	$material = "demon bone";	break;
				case 9:	$material = "dragon bone";	break;
			}
			if (mt_rand(1,100) > 50){$extradj = " and has a " . gemChooser() . " at the end of it";}
		}
		else
		{
			$charges = mt_rand(5,25);
			switch (mt_rand(0,10))
			{
				case 0:	$material = "ash wood";		break;
				case 1:	$material = "wood";		break;
				case 2:	$material = "oak wood";		break;
				case 3:	$material = "yew wood";		break;
				case 4:	$material = "ash wood";		break;
				case 5:	$material = "wood";		break;
				case 6:	$material = "oak wood";		break;
				case 7:	$material = "yew wood";		break;
				case 8:	$material = "strange wood";	break;
				case 9:	$material = "dragon bone";	break;
				case 10:$material = "giant bone";	break;
			}
			if (mt_rand(1,100) > 50){$extradj = " and has a " . gemChooser() . " at the top";}
		}
		$decorate = "[this has " . $charges . " charges and is made of " . $material . "" . $extradj;
		if (mt_rand(1,100) > 70){$words = ". There is a command word carved on it in " . languageType($game) . " that says `" . castingName() . "`";}
		if (mt_rand(1,100) > 90){$words = ". The command word to use this is `" . castingName() . "`, which can be learned with identifying magic";}
		$decorate = $decorate . "" . $words . "]";
		$item = $item . " " . $decorate;
		if (mt_rand(1,100) > 50){$item = "<u>" . artifactNaming($mystic_item[0],'',0,1) . "</u> - " . $item;}
	} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "armor")
	{
		$smithy = mt_rand(1,20);
		$wearer = "wearer";
		$roller = 100;
		$mystic_item = "Armor";

		if ($game == "Swords & Six-Siders")
		{
			$dr_lit = "(light) ";
			$dr_med = "(medium) ";
			$dr_hev = "(heavy) ";
		}

		if ($smithy < 2){$armor = $dr_hev . "banded mail armor";}
		else if ($smithy < 5){$armor = $dr_med . "chain mail armor"; if (mt_rand(1,100) >= 90){$armor = "elvish chain mail armor";} }
		else if ($smithy < 7){$armor = $dr_lit . "leather armor"; $leather = 1;}
		else if ($smithy < 10){$armor = $dr_hev . "plate mail armor";}
		else if ($smithy < 11){$armor = $dr_med . "ring mail armor";}
		else if ($smithy < 13){$armor = $dr_hev . "splint mail armor";}
		else if ($smithy < 15){$armor = $dr_lit . "studded leather armor"; $leather = 1;}
		else
		{
			$wearer = "equipper";	$roller = 105;		$mystic_item = "Shield";
			switch (mt_rand(0,4))
			{
				case 0:	$armor = "small shield";	break;
				case 1:	$armor = "large shield";	break;
				case 2:	$armor = "tower shield";	break;
				case 3:	$armor = "buckler";		$mystic_item = "Buckler";	break;
				case 4:	$armor = "shield";		break;
			}
		}

		$forge = mt_rand(1,$roller);

		if ( $game == "Swords & Six-Siders" && $forge < 87 && $forge > 74 ){ $forge = 74; }
		if ($forge < 50){$heatup = "+1";}
		else if ($forge < 75){$heatup = "+2";}
		else if ($forge < 85){$heatup = "+3";}
		else if ($forge < 87){$heatup = "+4"; if (mt_rand(1,100) >= 65){$heatup = "+5";} }
		else if ($forge < 91){$heatup = "+1 with a 1 save bonus";}
		else if ($forge < 94){$heatup = "+2 with a 1 save bonus";}
		else if ($forge < 101)
		{	$cursing = 1;
			switch (mt_rand(0,2))
			{
				case 0:$heatup = "cursed " . $armor . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
				case 1:$heatup = "vile " . $armor . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
				case 2:$heatup = "infernal " . $armor . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
			}
		}
		else
		{
			if (mt_rand(1,2) == 1){ $heatup = "that fully blocks any attacks from breath weapons"; }
			else if ( $game == "Swords & Six-Siders" ){ $heatup = "+1 with a +" . mt_rand(1,2) . " against missile attacks"; }
			else { $heatup = "+1 with a +" . mt_rand(2,4) . " against missile attacks"; }
		}

		if ($cursing == 1){$item = $heatup;} else {$item = $armor . " " . $heatup;}


		if (($smithy > 14) && (mt_rand(1,100) > 60)){$logo = "...with a " . designType(0) . " symbol on the front that is " . designColor() . " in color";}
		if (($smithy < 15) && (mt_rand(1,100) > 60))
		{
			if (mt_rand(1,100) > 50){$sew = "back";} else if (mt_rand(1,100) > 50){$sew = "front";} else {$sew = "front and back";
		}
			$logo = "...with a " . designType(0) . " symbol on the " . $sew . " that is " . designColor() . " in color";}
	
		if ($leather == 1){$decorate = "[made of " . materialType(leather) . " hide and is " . leatherColor() . " in color" . $logo. "]";}
		else {$decorate = "[made of " . materialType(iron) . "" . $logo. "]";}
		$item = $item . " " . $decorate;
		if (mt_rand(1,100) > 50){$item = "<u>" . artifactNaming($mystic_item,'',$cursing,0) . "</u> - " . $item;}
	} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "weapon")
	{
		$wearer = "wielder";
		$forge = mt_rand(1,100);
		if ($size == 1){$r_min=0; $r_max = 4;} else if ($size == 2){$r_min=0; $r_max = 21;} else {$r_min=0; $r_max = 36;}
		switch (mt_rand($r_min,$r_max))
		{
			case 0:	$item = "knife";		$smith1 = "blade";	$smith2 = "handle";	break;
			case 1:	$item = "arrow";		$quiver = " {" . mt_rand(5,20) . " each}";	$forge = mt_rand(1,94);	break;
			case 2:	$item = "bolt";			$quiver = " {" . mt_rand(5,20) . " each}";	$forge = mt_rand(1,94);	break;
			case 3:	$item = "dagger";		$smith1 = "blade";	$smith2 = "handle";	break;
			case 4: $item = "sling";			$bow = 2; break;
			case 5: $item = "scimitar";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 6:	$item = "axe";			$smith1 = "blade";	$smith2 = "handle";	break;
			case 7:	$item = "hand axe";		$smith1 = "blade";	$smith2 = "handle";	break;
			case 8:	$item = "battle axe";		$smith1 = "blade";	$smith2 = "handle";	break;
			case 9:	$item = "bow";			$bow = 1; $forge = mt_rand(1,96);	break;
			case 10:$item = "crossbow";		$bow = 1; $forge = mt_rand(1,96);	break;
			case 11:$item = "light flail";		$smith1 = "end";	$smith2 = "handle";	break;
			case 12:$item = "heavy flail";		$smith1 = "end";	$smith2 = "handle";	break;
			case 13:$item = "light warhammer";	$smith1 = "blunt end";	$smith2 = "handle";	break;
			case 14:$item = "heavy warhammer";	$smith1 = "blunt end";	$smith2 = "handle";	break;
			case 15:$item = "light mace";		$smith1 = "blunt end";	$smith2 = "handle";	break;
			case 16:$item = "heavy mace";		$smith1 = "blunt end";	$smith2 = "handle";	break;
			case 17:$item = "morning star";		$smith1 = "star";	$smith2 = "handle";	break;
			case 18:$item = "light pick";		$smith1 = "pick";	$smith2 = "handle";	break;
			case 19:$item = "heavy pick";		$smith1 = "pick";	$smith2 = "handle";	break;
			case 20:$item = "short sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 21:$item = "short sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 22:$item = "long sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 23:$item = "bastard sword";	$smith1 = "blade";	$smith2 = "hilt";	break;
			case 24:$item = "broad sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 25:$item = "two-handed sword";	$smith1 = "blade";	$smith2 = "hilt";	break;
			case 26:$item = "halberd";		$smith1 = "blade";	$smith2 = "handle";	$pole = 1;	break;
			case 27:$item = "pole arm";		$smith1 = "tip";	$smith2 = "handle";	$pole = 1;	break;
			case 28:$item = "battle staff";		$smith1 = "length";	$smith2 = "handle";	$pole = 1;	break;
			case 29:$item = "spear";		$smith1 = "tip";	$smith2 = "handle";	$pole = 1;	break;
			case 30:$item = "trident";		$smith1 = "fork";	$smith2 = "handle";	$pole = 1;	break;
			case 31:$item = "kryss";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 32:$item = "great sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 33:$item = "long sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 34:$item = "bastard sword";	$smith1 = "blade";	$smith2 = "hilt";	break;
			case 35:$item = "broad sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 36:$item = "two-handed sword";	$smith1 = "blade";	$smith2 = "hilt";	break;
		}
		$owner = manyName();
		$mystic_mine = "";
		$mystic_items = explode(" ", $item);
		$mystic_item = $mystic_items[0];	if ($mystic_items[1] != ""){$mystic_item = $mystic_items[1];}	if (($mystic_items[1] == "arm") || ($mystic_items[1] == "star")){$mystic_item = ucwords($item);}
		if ($smith2 == "hilt")
		{
			if (mt_rand(1,100) > 80){$smith3 = materialType(leather) . " leather";} else {$smith3 = "leather";}
				$decorate = "[the " . $smith1 . " is made of " . materialType(iron) . " with a " . $smith3 . " grip";
			if (mt_rand(1,100) > 50){$etch = $smith1;} else {$etch = $smith2;}
			if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is engraved on the " . $etch; $mystic_mine = $owner;}
			if (mt_rand(1,100) > 80){$decorate = $decorate . "...the " . $etch . " is decorated with " . mt_rand(3,12) . " gems {" . gemChooser() . "}]";}
			else {$decorate = $decorate . "" . $belongs . "]";}
		}
		else if ($smith1 != "")
		{
			if (mt_rand(1,100) > 80){$smith3 = materialType(leather) . " leather";} else {$smith3 = "leather";}
				$decorate = "[the " . $smith1 . " is made of " . materialType(iron) . " and has a " . materialType(handle) . " " . $smith2 . " with a " . $smith3 . " grip";
				if ($pole == 1){$decorate = "[the " . $smith1 . " is made of " . materialType(iron) . " and has a " . materialType(handle) . " " . $smith2;}
			if (mt_rand(1,100) > 50){$etch = $smith1;} else {$etch = $smith2;}
			if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is engraved on the " . $etch; $mystic_mine = $owner;}
			if (mt_rand(1,100) > 80){$decorate = $decorate . "...the " . $etch . " is decorated with " . mt_rand(3,12) . " gems {" . gemChooser() . "}]";}
			else {$decorate = $decorate . "" . $belongs . "]";}
		}
		else if ($bow == 1){ $decorate = "[" . materialType(bow);
			if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is carved on it"; $mystic_mine = $owner;}
			$decorate = $decorate . "" . $belongs . "]";
		}
		else if ($bow == 2){ $decorate = "[made of " . materialType(leather) . " hide";
			if (mt_rand(1,100) > 50){$etch = "burned";} else {$etch = "stitched";}
			if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is " . $etch . " on it"; $mystic_mine = $owner;}
			if (mt_rand(1,100) > 80){$belongs = $belongs . "...the cradle is decorated with a " . gemChooser();}
			$decorate = $decorate . "" . $belongs . "]";
		}

		if ( $game == "Swords & Six-Siders" && $forge < 87 && $forge > 74 ){ $forge = 74; }
		if ($forge < 50){$heatup = "+1";}
		else if ($forge < 75){$heatup = "+2";}
		else if ($forge < 85){$heatup = "+3";}
		else if ($forge < 87){$heatup = "+4"; if (mt_rand(1,100) >= 65){$heatup = "+5";} }
		else if ($forge < 92){$heatup = "+1 with a +3 against " . slayerType(''); if ( $game == "Swords & Six-Siders" ){ $heatup = "+1 with a +2 against " . slayerType(''); } }
		else if ($forge < 95){$heatup = "+2 with a +4 against " . slayerType(''); if ( $game == "Swords & Six-Siders" ){ $heatup = "+2 with a +3 against " . slayerType(''); } }
		else if ($forge < 97)
		{	$cursing = 1;
			switch (mt_rand(0,2))
			{
				case 0:$heatup = "cursed " . $item . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
				case 1:$heatup = "vile " . $item . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
				case 2:$heatup = "infernal " . $item . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
			}
		}
		else if ($forge < 98)
		{
			$heatup = "+" . mt_rand(1,5) . " " . smartType($owner); $noname = 1;
			if ( $game == "Swords & Six-Siders" ){ $heatup = "+3"; }
		}
		else
		{
			$heatup = "+" . mt_rand(1,3) . " " . enchantedType($smith2);
			if ( $game == "Swords & Six-Siders" ){ $heatup = "+2, +3 against " . slayerTypeSX(); }
		}

		if ($cursing == 1){$item = $heatup;} else {$item = $item . " " . $heatup;}

		$item = $item . "" . $quiver . " " . $decorate;
		if (mt_rand(1,100)>98 && $quiver == ""){$item = $item . " " . smartSword();}
		if ((mt_rand(1,100) > 50) && ($noname != 1) && ($quiver == "")){$item = "<u>" . artifactNaming($mystic_item,$mystic_mine,$cursing,0) . "</u> - " . $item;}
	} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else // MAGIC RELICS
	{
		if ($size == 1){$sz1 = 0; $sz2 = 51; $sz3 = 2;} else if ($size == 2){$sz1 = 52; $sz2 = 70; $sz3 = 4;} else {$sz1 = 71; $sz2 = 92; $sz3 = 6;}

		if (mt_rand(1,100) < 71){$book_spell = "mage";} else {$book_spell = "illusionist";} // USED FOR THE GRAND SPELL BOOK BELOW
		if ($game == "Swords & Six-Siders"){ $book_spell = "wizard"; }
		$pages_book = mt_rand(5,14) . " of the lowest level spells, " . mt_rand(4,12) . " of the lower level spells, " . mt_rand(3,10) . " of the low level spells, " . mt_rand(2,8) . " of the medium level spells, " . mt_rand(2,6) . " of the high level spells, " . mt_rand(1,4) . " of the higher level spells, " . mt_rand(1,2) . " of the highest level spells";

		/// MAYBE A CURSED ITEM ???? ///
		if (mt_rand(1,100) > 97){$curse_me = 1;} else {$curse_me = 0;}

		$written = "shown somewhere on it";	if (mt_rand(1,100) > 50){$written = "learned from identifying magic";}

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		switch (mt_rand($sz1,$sz2))
		{
			case 0: $use_other = 2; break;
			case 1: $use_other = 2; break;
			case 2: $use_other = 2; break;
			case 3: $use_other = 3; break;
			case 4: $use_other = 3; break;
			case 5: $use_other = 3; break;
			case 6: $rock = rockType();		$m_misc = $rock . "___{" . rockPower($rock,$curse_me,$level,$game) . "}";	break;
			case 7: $rock = rockType();		$m_misc = $rock . "___{" . rockPower($rock,$curse_me,$level,$game) . "}";	break;
			case 8: $rock = rockType();		$m_misc = $rock . "___{" . rockPower($rock,$curse_me,$level,$game) . "}";	break;
			case 9: $m_misc = tomeType() . "___{" . tomePower(100,$curse_me,$level,$cut,$game) . "}";	$use_other = 100;	break;
			case 10:$m_misc = tomeType() . "___{" . tomePower(100,$curse_me,$level,$cut,$game) . "}";	$use_other = 100;	break;
			case 11:$m_misc = "spell book___{this " . $book_spell . " spell book is bound in " . leatherColor() . " " . materialType(leather) . " skin with " . designColor() . " colored symbols of a " . designType(0) . " on the front and a " . designType(0) . " on the back...it contains " . $pages_book . "}";	break;
			case 12:$m_misc = "skeleton keys___{these " . mt_rand(2,6) . " keys will unlock any lock, each one vanishing afterwards}"; break;
			case 13:$m_misc = materialType(iron) . " goblet___{any liquid put in this cup will turn into pure water}"; break;
			case 14:$m_misc = materialType(iron) . " hand mirror___{can make the viewer`s face change to another as long as it is the same gender and race}"; break;
			case 15:$m_misc = "tobacco pipe of haze___{requires tobacco...when smoked, it will create a dense " . fogColor() . " fog in front of the one smoking the pipe}"; break;
			case 16:$m_misc = materialType(iron) . " bell of alarming___{this small bell will ring whenever a hostile creature comes within 50 feet of the owner}"; break;
			case 17:$m_misc = materialType(iron) . " fork___{this dinner fork will turn into a trident +" . mt_rand(1,5) . " when the word `" . castingName() . "` is spoken (which is " . $written . ")...and back to a fork when spoken again}";
				if ($game == "Swords & Six-Siders"){ $m_misc = materialType(iron) . " fork___{this dinner fork will turn into a trident +" . mt_rand(1,3) . " when the word `" . castingName() . "` is spoken (which is " . $written . ")...and back to a fork when spoken again}"; }
				break;
			case 18:$m_misc = "ointment___{this small jar has " . mt_rand(2,7) . " uses and will cure poison and disease...along with healing " . mt_rand(6,13) . " damage}"; break;
			case 19:$m_misc = "paint brush___{once a day this brush can paint a doorway on a wall that is no more than 10 feet thick...but it does require a pint of paint}"; break;
			case 20:$m_misc = "candle___{when this " . candleColor(0) . " candle is burning, "  . candleMagic($game,$level) . "}"; break;
			case 21:$m_misc = bottlePicker() . "___{will refill itself with clean water when the sun rises}"; break;
			case 22:$m_misc = bottlePicker() . "___{contains an endless supply of air that one may breathe from}"; break;
			case 23:$m_misc = bottlePicker() . "___{contains an endless supply of air that one may breathe from}"; break;
			case 24:$m_misc = "monocle___{allows the wearer to charm someone by looking at them unless they save for spells...it can be used " . mt_rand(2,6) . " times per day}"; break;
			case 25:$m_misc = "monocle___{allows the wearer the ability to see how hurt others are around them...it can be used " . mt_rand(2,6) . " times per day}"; break;
			case 26:$m_misc = "monocle___{allows the wearer to turn someone to stone by looking at them unless they save for petrification...it can be used " . mt_rand(2,6) . " times per day}"; break;
			case 27:$m_misc = "monocle___{allows the wearer to see secret compartments and doors}"; break;
			case 28:$m_misc = bottlePicker() . "___{there is magical runes on this that show the word `" . castingName() . "` which needs a mage to decipher and only if they have an intelligence greater than " . mt_rand(9,17) . "...when it is open, and the word spoken, any creature it is pointed at will get sucked into the bottle an imprisoned (where only one at a time may exist in the bottle) until the owner releases them}";
				if ($game == "Swords & Six-Siders"){ $m_misc = bottlePicker() . "___{there is magical runes on this that show the word `" . castingName() . "` which needs a wizard to decipher and only if they have an intelligence greater than " . mt_rand(3,5) . "...when it is open, and the word spoken, any creature it is pointed at will get sucked into the bottle an imprisoned (where only one at a time may exist in the bottle) until the owner releases them}"; }
				break;
			case 29:$m_misc = bottlePicker() . "___{contains a genie that will grant 1 reasonable wish...where the item then vanishes}"; break;
			case 30:$m_misc = bottlePicker() . "___{when opened, this will create a dense " . fogColor() . " fog in the area...which will last for about " . mt_rand(4,8) . " turns}"; break;
			case 31:$m_misc = "deck of playing cards___{will surround, whirl, and distract an enemy when thrown at them}"; break;
			case 32:$m_misc = "chess piece___{this looks like a rook piece but when the word `" . castingName() . "` is spoken (which is " . $written . ") a stone tower appears that is 30 feet high and 20 feet wide...if it is empty, the command word will turn it back into a rook piece}"; break;
			case 33:$m_misc = "stones___{these " . mt_rand(2,10) . " sling stones will always hit their target}"; break;
			case 34:$m_misc = "glue___{this " . bottlePicker() . " of glue has " . mt_rand(2,8) . " uses and cause anything to stick to anything else...permanently}"; break;
			case 35:$m_misc = materialType(iron) . " holy symbol___{while held, priest spells can double their effects...but does not affect save rolls}";
				if ($game == "Swords & Six-Siders"){ $m_misc = materialType(iron) . " holy symbol___{while held, one can turn back any undead as the wizard spells}"; }
				break;
			case 36:$m_misc = "rings___{these 8 inch " . materialType(iron) . " rings are found in pairs that are magically linked together...anyone putting their arm throw one ring will have it come through the other ring instead}"; break;
			case 37:$m_misc = "key___{this " . materialType(iron) . " key can be used once per day where it is pushed into a solid wall and turned...revealing a door that leads to where the key was tuned...tuning the key requires one to hold the key in a particular spot and saying the word `" . castingName() . "` which is engraved on the key}"; break;
			case 38:$m_misc = "scrolls___{there are " . mt_rand(2,6) . " scrolls bunched together...when a scroll is written on, it will appear on the other scrolls for almost a minute before vanishing}"; break;
			case 39:$m_misc = "coin___{" . rareCoins(1,1) . "...where it can be flipped in a heads or tails fashion to help answer " . mt_rand(2,6) . " questions a day}"; break;
			case 40:$m_misc = "apple___{this silver apple can be bitten into a total of 12 times before it is useless...where each bite restores " . mt_rand(2,12) . " " . abilityTranslate($game,CON) . "}";
				if ($game == "Swords & Six-Siders"){ $m_misc = "apple___{this silver apple can be bitten into a total of 12 times before it is useless...where each bite restores " . mt_rand(2,12) . " hit points}"; }
				break;
			case 41:$m_misc = "stone___{this small stone will begin to scream whenever one approaches that will do the owner harm...but it has to be activated and deactivated by speaking the word `" . castingName() . "`, which can be learned by identifying the item}"; break;
			case 42:$m_misc = "throwing knife___{this " . materialType(iron) . " knife gives +" . mt_rand(1,3) . " to damage, and when it is thrown, it will always hit the intended target}"; break;
			case 43:$m_misc = "biting skull___{this skull will bite down with unbreakable magical force when the word `" . castingName() . "` is spoken, which can be learned by identifying the item...speaking the same word will cause the skull to open the mouth}"; break;
			case 44:$m_misc = "stick___{this " . woodenType() . " stick is about " . mt_rand(2,4) . " feet long and will safely set off a nearby trap when tapped on the floor or ground, but only " . mt_rand(2,6) . " times a day}"; break;
			case 45:$m_misc = "stick___{this " . woodenType() . " stick is about " . mt_rand(2,4) . " feet long and will detect any fresh water source that is within " . (mt_rand(1,9)*100) . " feet";	break;
			case 46:$m_misc = "veil___{when this " . candleColor(0) . " veil is worn, anyone looking through it is immune to gaze attacks";	break;
			case 47:$m_misc = "candle___{when this " . candleColor(0) . " candle is lit, " . candleMagic($game,$level) . "}"; break;
			case 48:$m_misc = "tankard___{this " . materialType(iron) . " tankard allows one to drink any amount of alcohol from it without any of the effects}"; break;
			case 49:$m_misc = "quill___{this " . birdType() . " feathered quill will magically write the spoken words of the owner, as long as it has paper and ink, for " . mt_rand(2,6) . " hours per day}"; break;
			///////////////////////////////////////////
			case 50:$m_misc = "arrow___{when this arrow is fired straight into the sky, it will travel up to " . mt_rand(2,20) . "0 miles to reach the recipient of whoever an attached message is for}"; break;
			case 51:$m_misc = "torch___{when this " . materialType(iron) . " torch is lit, it will illuminate an area of " . mt_rand(1,3) . "0 feet with a " . beamColor(0) . " light...but for only " . mt_rand(2,4) . " hours per day, where no undead or shadowy creatures may enter}"; break;
			case 52:$m_misc = "lantern___{anyone holding the lantern can see the illumination...but others cannot}"; break;
			case 53:$m_misc = "nourishing iron pot___{will magically fill itself with warm stew when the word `" . castingName() . "` is spoken, which is " . $written . "}"; break;
			case 54:$m_misc = "torch___{if the word `" . castingName() . "` is spoken (which is " . $written . "), this torch will light and follow the owner by floating nearby...but only for about " . mt_rand(3,12) . " hours a day}"; break;
			case 55:$m_misc = "lamp oil___{this lantern oil will cause the lamp`s light to hurt undead within it`s glow for " . mt_rand(1,3) . "d" . (mt_rand(2,6)*2) . " damage per round}";
				if ($game == "Swords & Six-Siders"){ $m_misc = "lamp oil___{this lantern oil will cause the lamp`s light to hurt undead within it`s glow for " . mt_rand(1,2) . "d6 damage per round}"; }
				break;
			case 56:$m_misc = materialType(iron) . " hand mirror___{when one sees their reflection, and the word spoken by the wielder, any creature looking at their reflection at will get sucked into the mirror (where only one at a time may exist in the mirror) and imprisoned until the owner breaks it}"; break;
			case 57:$m_misc = "crystal ball___{allows a wizard or illusionist to see what is happening " . (mt_rand(1,20)*5) . " miles away and only if they are somewhat familiar with the area they are looking}"; break;
			case 58:$m_misc = "evil skull___{only the vile may hold this skull where anyone else touching it will suffer " . mt_rand(1,3) . "d" . (mt_rand(2,6)*2) . " damage...it will cause any undead to ignore the wielder}";
				if ($game == "Swords & Six-Siders"){ $m_misc = "evil skull___{only evil ones may hold this skull where anyone else touching it will suffer " . mt_rand(1,2) . "d6 damage...it will cause any undead to ignore the wielder}"; }
				break;
			case 59:$m_misc = "shackles___{anyone bound in these cannot escape by even magical means...unless the owner speaks the word `" . castingName() . "`, which is " . $written . "}"; break;
			case 60:$m_misc = "talking skull___{if the owner asks the skull of nearby " . searchList() . ", it will speak to confirm or deny as such}"; break;
			case 61:$m_misc = "chains___{when thrown at an enemy, they will chain them up unless they can make a major strength test...if the word `" . castingName() . "` is spoken (which is " . $written . "), then the chains release the prisoner}"; break;
			case 62:$m_misc = "lantern___{any invisible object or creature is revealed in the light of this}"; break;
			case 63:$m_misc = "ship in a bottle___{when the word `" . castingName() . "` is spoken (which is " . $written . ") this turns into a ship complete...if it is empty, the command word will turn it back into a ship in the bottle}"; break;
			case 64:$m_misc = "driftwood___{when the word `" . castingName() . "` is spoken (which is " . $written . ") this turns into a raft that can hold about 4 humanoids...the command word will turn it back into driftwood}"; break;
			case 65:$m_misc = "net___{when thrown at an enemy, they will be captured unless they can make a major strength test...if the word `" . castingName() . "` is spoken (which is " . $written . "), then the net release the prisoner}"; break;
			case 66:$m_misc = "paint___{this pint of " . candleColor(0) . " paint can be used to paint and object that comes to be real and useable...such as swords, boxes, armor, food...but nothing of high value}"; break;
			case 67:$m_misc = materialType(iron) . " hand mirror___{when the mirror is spoken into, it will answer one question per day}"; break;
			case 68:$m_misc = "vortex___{this is a round black cloth that is 6 feet wide when laid out...it creates a hole that is 10 feet deep in which anyone that falls in must get out before the cloth is picked back up or vanish forever}"; break;
			case 69:if (mt_rand(1,100) > 50){$toy = "teddy bear";} else {$toy = "doll";} $m_misc = $toy . "___{this " . $toy . " (able to sustain " . mt_rand(6,24) . " damage) can come to life and serve the owner for " . mt_rand(2,12) . " hours per week if the word `" . castingName() . "` is spoken (which is " . $written . ")...it will not fight but do other various chores"; break;
			case 70:$m_misc = "tablecloth___{once a day, when this " . candleColor(0) . " tablecloth is put on a table, it will unfold with a feast for up to " . mt_rand(4,8) . " people}"; break;
			///////////////////////////////////////////
			case 71:$m_misc = "pickaxe___{this pickaxe will dig humanoid sized tunnels up to " . mt_rand(1,10) . "0 feet per day at the rate of 1 foot per minute}"; break;
			case 72:$m_misc = "shovel___{anyone who digs with the shovel will not tire from the effort}"; break;
			case 73:$m_misc = "glass sword___{this two-handed sword weighs very little and can be used by anyone...but once it hits an opponent it will do 1d8x" . mt_rand(4,10) . " damage and then shatter, becoming useless}";
				if ($game == "Swords & Six-Siders"){ $m_misc = "glass sword___{this two-handed sword weighs very little and can be used by anyone...but once it hits an opponent it will do 1d6x" . mt_rand(4,10) . " damage and then shatter, becoming useless}"; }
				break;
			case 74:$m_misc = "broom___{this broom can fly for about " . mt_rand(5,10) . " hours per day carrying one medium humanoid or two small ones...and only if the word `" . castingName() . "` is spoken, which is " . $written . "}"; break;
			case 75:$m_misc = "statue___{" . idolMaker(1,2,0,50,$game,$extra) . "..(able to sustain " . mt_rand(30,100) . " damage) that can come to life and serve the owner for " . mt_rand(2,12) . " hours per week if the word `" . castingName() . "` is spoken (which is " . $written . ")...it will not fight but do other various chores}"; break;
			case 76:$m_misc = "wooden chest___{will float and follow the owner when the word `" . castingName() . "` is spoken, which is " . $written . "}"; break;
			case 77:$m_misc = "mounted " . headMount() . " head___{will talk to the owner and tell of everything that went on in the area while they were away}"; break;
			case 78:$m_misc = "brazier___{if the word `" . castingName() . "` is spoken (which is " . $written . "), this brazier will light and follow the owner...walking on it`s legs...but only for about " . mt_rand(3,12) . " hours a day}"; break;
			case 79:$m_misc = "blanket___{will magically warm whoever is wrapped in it...no matter the outside temperature}"; break;
			case 80:$m_misc = "bedroll___{this bedroll can levitate about " . mt_rand(1,4) . "0 feet above the ground for about 8 hours...and only if the word `" . castingName() . "` is spoken, which is " . $written . "}"; break;
			case 81:$m_misc = "carpet___{this is " . carpetMaker(0) . " that can fly 240 feet per round or about 50 miles a day}"; break;
			case 82:$m_misc = "saddle___{any steed this is used in can travel twice as fast for twice as long}"; break;
			case 83:$m_misc = "saddle___{any steed this is used on will run or walk about 6 inches off the ground}"; break;
			case 84:$m_misc = "rope___{when the word `" . castingName() . "` is spoken (which is " . $written . ") then this " . mt_rand(5,20) . "0 foot rope will ascend so it can be climbed up}"; break;
			case 85:$m_misc = "rope___{when used as a lasso, this rope will wrap around a target unless they make a major strength test...if the word `" . castingName() . "` is spoken (which is " . $written . "), then the rope release the target}"; break;
			case 86:$m_misc = "scabbard___{any edged weapon pulled from this scabbard will give a +" . mt_rand(1,3) . " to attack and damage but for only " . mt_rand(2,5) . " battles a day}"; break;
			case 87:$m_misc = "tent___{this " . candleColor(0) . " tent looks like it can only accommodate one person but when you look inside, it really has space for " . mt_rand(4,12) . " people...if the word `" . castingName() . "` (which is " . $written . ") is spoken by someone inside, it will vanish from this plane of existence until the word is spoken again...allowing for safe rest}"; break;
			case 88:$use_other = 1; break;
			case 89:$use_other = 1; break;
			case 90:$use_other = 1; break;
			case 91:$m_misc = "log___{looks like an ordinary log about 1 foot long and 4 inches thick with the word `" . castingName() . "` carved on the side...when the word is spoken nearby it will light up and burn for about " . mt_rand(2,10) . " hours or unless the word is spoken again...the log will not burn up nor feel hot when extinguished}"; break;
			case 92:$m_misc = "axe___{looks like an ordinary hatchet but cut down a 3 foot thick tree in one swing...but only has " . mt_rand(5,20) . " charges where a tree exhausts such charges}"; break;
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ($use_other == 1)
		{
		    $curse_me = 0;
		    switch (mt_rand(0,16))
		    {
			case 1: $m_misc = bardType() . "___{will float, play music, and follow the owner when tossed into the air...giving the group +1 to attacks and damage}"; break;
			case 2: $m_misc = bardType() . "___{when played, this will produce a sound where no magic words can be spoken by anyone for " . mt_rand(2,5) . " rounds and only " . mt_rand(2,6) . " times a day}"; break;
			case 3: $m_misc = bardType() . "___{when played, this will produce a sound that will open anything that does open...even if locked, but only " . mt_rand(2,4) . " times a day}"; break;
			case 4: $m_misc = bardType() . "___{when played, this will produce a sound that causes fear in those 20 to 120 feet away, but only once a day}"; break;
			case 5: $m_misc = bardType() . "___{when played, this will produce a sound that scares any enemy within 30 feet and have less than 6 health dice, but only twice a day}"; break;
			case 6: $m_misc = bardType() . "___{when played, this will produce a sound that causes 1d" . (mt_rand(2,6)*2) . " damage to all those that can hear it and cannot make a save for wands}";
				if ($game == "Swords & Six-Siders"){ $m_misc = bardType() . "___{when played, this will produce a sound that causes " . mt_rand(1,2) . "d6 damage to all those that can hear it and cannot make a save for magic}"; }
				break;
			case 7: $m_misc = bardType() . "___{when played, this will produce a sound that can be directed as if it was coming from somewhere else up to " . mt_rand(6,18) . "0 feet away}"; break;
			case 8: $m_misc = bardType() . "___{when played, this will produce a sound that will stop " . mt_rand(2,10) . " enemies from fighting if they cannot save for spells}"; break;
			case 9: $m_misc = bardType() . "___{when played, this will produce a sound that will spring traps " . mt_rand(2,10) . "0 feet away from the musician}"; break;
			case 10:$m_misc = bardType() . "___{when played, this will produce a sound that will cause invisible objects to briefly appear within " . mt_rand(2,10) . "0 feet of the musician}"; break;
			case 11:$m_misc = bardType() . "___{when played, this will produce a sound that will create a protection from evil or good enemies in a 10 foot radius...based off the opposite of the musician`s alignment}";
				if ($game == "Swords & Six-Siders"){ $m_misc = bardType() . "___{when played, this will produce a sound that will create a protection from evil enemies in a 10 foot radius}"; }
				break;
			case 12:$m_misc = bardType() . "___{when played, this will produce a sound that will calm waters, scare away sea life, or summon medium sized sea creatures to aid the musician}"; break;
			case 13:$m_misc = bardType() . "___{when played, the music will call forth " . mt_rand(2,10) . " mystical warriors to aid in the current battle...where they then vanish afterwards, and only once per " . timesMaker() . "}"; break;
			case 14:$m_misc = bardType() . "___{when played, this will produce a sound that summons up to " . mt_rand(4,10) . "0 rats if in the area where the musician can then control them as long as they continue playing}"; break;
			case 15:$m_misc = "horn___{when played, this will create a dense " . fogColor() . " fog in front of the musician...which will last for about " . mt_rand(4,8) . " turns}"; break;
			case 16:$m_misc = "horn___{when played, this will not produce sound but make a large gusting wind that will extinguish fires and knock smaller creatures off their feet...while holding medium sized creatures at bay momentarily...and only once per day}"; break;
		    }
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ($use_other == 2)
		{
		    switch (mt_rand(0,3))
		    {
				case 0: $m_dustc = "pouch";		break;
				case 1: $m_dustc = "jar";		break;
				case 2: $m_dustc = "sack";		break;
				case 3: $m_dustc = "bottle";	break;
		    }
		    switch (mt_rand(0,2))
		    {
				case 0: $m_dustt = "dust";		break;
				case 1: $m_dustt = "powder";	break;
				case 2: $m_dustt = "sand";		break;
		    }
		    switch (mt_rand(0,7))
		    {
				case 0: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be sprinkled on anything...where the " . $m_dustt . " then becomes invisible. Anyone touching it will turn bright " . candleColor(0) . " for " . mt_rand(2,10) . " days}"; break;
				case 1: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown in the area to reveal invisible things within a 10 foot radius and lasts 5 minutes}"; break;
				case 2: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown onto anything of medium size or smaller to make them invisible for " . mt_rand(2,6) . " turns}"; break;
				case 3: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown onto any slime creature where it causes it to wither away}"; break;
				case 4: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown into water to absorb about 100 gallons...or it can slay a water elemental if they fail a save for death}"; break;
				case 5: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown onto anything of medium size or smaller to make them appear as something else the thrower thinks of for " . mt_rand(3,12) . "0 minutes...a save for spells is allowed to ignore the effects}"; break;
				case 6: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown into an area where it will give the appearance of it being undisturbed for years...but only in 100 square foot area}"; break;
				case 7: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be used to create a summoning circle to call forth an elemental [" . elementalType($game) . "] that will serve the summoner...but only a level " . mt_rand(3,16) . " wizard may use this " . $m_dustt . "}";
					if ($game == "Swords & Six-Siders"){ $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be used to create a summoning circle to call forth an elemental [" . elementalType($game) . "] that will serve the summoner...but only a level " . mt_rand(2,6) . " wizard may use this " . $m_dustt . "}"; }
					break;
		    }
		    if ($curse_me > 0)
			{
				$m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown into the air where everyone within 20 feet will be incapacitated by choking and sneezing for " . mt_rand(5,20) . " rounds...everyone must save for breath or suffer " . mt_rand(1,2) . "d" . (mt_rand(2,6)*2) . " damage...this same save must be made each round they are in the dust}";
					if ($game == "Swords & Six-Siders"){ $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown into the air where everyone within 20 feet will be incapacitated by choking and sneezing for " . mt_rand(5,20) . " rounds...everyone must save or suffer " . mt_rand(1,2) . "d6 damage...this save must be made each round they are in the dust}"; }
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ($use_other == 3)
		{
			switch (mt_rand(0,13))
			{
				case 0: $bag_a = "bat"; break;
				case 1: $bag_a = "rat"; break;
				case 2: $bag_a = "cat"; break;
				case 3: $bag_a = "weasel"; break;
				case 4: $bag_a = "badger"; break;
				case 5: $bag_a = "wolverine"; break;
				case 6: $bag_a = "wolf"; break;
				case 7: $bag_a = "boar"; break;
				case 8: $bag_a = "black bear"; break;
				case 9: $bag_a = "brown bear"; break;
				case 10:$bag_a = "lion"; break;
				case 11:$bag_a = "horse"; break;
				case 12:$bag_a = "tiger"; break;
				case 13:$bag_a = "rhinoceros"; break;
			}
		    switch (mt_rand(0,8))
		    {
				case 0: $curse_me = 0; $bags = 250 * mt_rand(1,6);	$m_misc = bagCreator() . "___{can hold up to " . $bags . " pounds but would feel like " . ($bags/25) . " pounds...it also has " . (($bags/10)*2) . " cubic feet of magical space inside...all the while not appearing to take up more space than the bag appears to have}"; break;
				case 1: $curse_me = 0; $bags = 250 * mt_rand(1,6);	$m_misc = bagCreator() . "___{can hold up to " . $bags . " pounds but would feel like " . ($bags/25) . " pounds...it also has " . (($bags/10)*2) . " cubic feet of magical space inside...all the while not appearing to take up more space than the bag appears to have}"; break;
				case 2: $curse_me = 0; $bags = 250 * mt_rand(1,6);	$m_misc = bagCreator() . "___{can hold up to " . $bags . " pounds but would feel like " . ($bags/25) . " pounds...it also has " . (($bags/10)*2) . " cubic feet of magical space inside...all the while not appearing to take up more space than the bag appears to have}"; break;
				case 3: $curse_me = 0; $bags = 250 * mt_rand(1,6);	$m_misc = bagCreator() . "___{can hold up to " . $bags . " pounds but would feel like " . ($bags/25) . " pounds...it also has " . (($bags/10)*2) . " cubic feet of magical space inside...all the while not appearing to take up more space than the bag appears to have}"; break;
				case 4: $curse_me = 0; $m_misc = bagCreator() . "___{this bag can be used " . mt_rand(2,5) . " times per week...where the owner reaches in and pulls out a ball of fur that is then thrown to the ground where a " . $bag_a . " will appear and serve the owner for about 10 minutes and then vanish}"; break;
				case 5: $curse_me = 0; $m_misc = bagCreator() . "___{this bag can be used " . mt_rand(2,5) . " times per week...where the owner reaches in and pulls out a ball of fur that is then thrown to the ground where a " . $bag_a . " will appear and serve the owner for about 10 minutes and then vanish}"; break;
				case 6: $curse_me = 0; $m_misc = bagCreator() . "___{this contains " . mt_rand(3,15) . " " . coinMaker($game) . "...whenever the sun rises, anything in the bag will vanish and that same number of coins will reappear}";
					if ($game == "Swords & Six-Siders"){ $m_misc = bagCreator() . "___{this contains " . mt_rand(3,15) . " gold...whenever the sun rises, anything in the bag will vanish and that same number of gold will reappear}"; }
					break;
				case 7: $curse_me = 0; $m_misc = bagCreator() . "___{this contains " . mt_rand(5,15) . " " . candleColor(0) . " beans...when all of them are thrown on the ground or floor, they will sink in and sprout a giant vine about " . mt_rand(1,10) . " feet wide and that will grow until it reaches the surface where it is able to get sun...which the vine can then be climbed on}"; break;
				case 8: $curse_me = 0; $m_misc = bagCreator() . "___{this contains " . mt_rand(5,15) . " " . candleColor(0) . " beans...when all of them are thrown on the sun lit ground, they will sink in and sprout a giant vine about " . mt_rand(1,10) . " feet wide and that will grow until it reaches the cloud of a storm giant`s castle...which the vine can then be climbed on}"; break;
			}
		    if ($curse_me > 0)
		    {
				switch (mt_rand(0,1))
				{
					case 0: $m_misc = bagCreator() . "___{whoever puts their hand in will be swallowed up if they fail a major strength test...if trapped they can only be freed with curse removing magic}"; break;
					case 1: $m_misc = bagCreator() . "___{if coins are put into it, they turn to lead...if gems are put in it, they turn to common stones}"; break;
				}
		    }
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (mt_rand(1,4) > 1)
		{
			switch (mt_rand(0,$sz3))
			{
				case 0: $glove = gloveType();		$m_misc = $glove . "___{" . glovePower($glove,$curse_me,$level,$game) . "}";	break;
				case 1: $amulet = amuletType();	$m_misc = $amulet . "___{" . amuletPower($amulet,$curse_me,$level,$game) . "}";	break;
				case 2: $m_misc = "belt___{" . beltPower($curse_me,$level,$game) . "}"; 						break;
				case 3: $m_misc = "cloak___{" . cloakPower($curse_me,$level,$game) . "}";						break;
				case 4: $m_misc = "robe___{" . robePower($curse_me,$level,$game) . "}";						break;
				case 5: $m_misc = "boots___{" . bootPower($curse_me,$level,$game) . "}"; 						break;
				case 6: $helm = helmType();	$m_misc = $helm . "___{" . helmPower($helm,$curse_me,$level,$game) . "}";		break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$item = $m_misc;

		if ($item == ""){$safety = 1;}

		if ($use_other > 0){} else {$curse_me = 0;}

		$itemm = explode("___", $item);
		$item = ucwords($itemm[0]);		$item = str_replace(" Of ", " of ", $item);	$item = str_replace(" And ", " and ", $item);	$item = str_replace(" The ", " the ", $item);
		$item = artifactNaming($item,'',$curse_me,2) . " " . $itemm[1];

		if ($safety > 0){$item = makeMagicItem($level,$size,$varb,$game,$extra,$cut);} // TRY AGAIN IF IT COMES UP WITH NOTHING //
	}

	$item = ucfirst($item);
	return $item;
}
else /// THIS STUFF BELOW IS SPECIFICALLY FOR THE TUNNELS & TROLLS GAME ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	$term = "DICE";
	$turm = "";
	if ( $game == "Tunnels & Trolls Deluxe" ){ $term = "DMG"; $turm = "d6"; }

	switch (mt_rand(0,22))
	{
		case 0:	$plus = "1"; break; case 1:	$plus = "1"; break; case 2:	$plus = "1"; break; case 3:	$plus = "1"; break; case 4:	$plus = "1"; break; case 5:	$plus = "2"; break; case 6:	$plus = "2"; break;
		case 7:	$plus = "2"; break; case 8:	$plus = "2"; break; case 9:	$plus = "3"; break; case 10: $plus = "3"; break; case 11: $plus = "3"; break; case 12: $plus = "4"; break; case 13: $plus = "4"; break;
		case 14: $plus = "4"; break; case 15: $plus = "5"; break; case 16: $plus = "5"; break; case 17: $plus = "6"; break; case 18: $plus = "6"; break; case 19: $plus = "7"; break; case 20: $plus = "8"; break;
		case 21: $plus = "9"; break; case 22: $plus = "10"; break;
	}

	if ($level > 0){$level = mt_rand(1,$level);} else {$level = mt_rand(1,20);}

	switch (mt_rand(0,6))
	{
		case 0: $the_item = "potion"; break;
		case 1: $the_item = "scroll"; break;
		case 2: $the_item = "ring"; break;
		case 3: $the_item = "wand"; break;
		case 4: $the_item = "magic"; break;
		case 5: $the_item = "armor"; break;
		case 6: $the_item = "weapon"; break;
	}

	// SPECIAL CONSTRUCT VARS SENT //
	if ($varb == 1){$the_item = "potion";}

	 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ($the_item == "potion")
	{
		$bottle = bottlePicker();

		$poisonuse = "this poison can be put on weapons";
		$effective = "but is only effective for " . mt_rand(2,17) . " hits with the weapon before it loses effectiveness";

		$p = 12; if ($game == "Tunnels & Trolls Deluxe"){ $p = 16; }
		switch (mt_rand(0,$p))
		{
			case 0:$poison = "of curare poison (" . $poisonuse . "...which the opponent loses combat adds for every hit by the poisoned weapon..." . $effective . ")";	break;
			case 1:$poison = "of dragon venom (" . $poisonuse . "...which the opponent suffers an additional 4 hits of damage from the weapon..." . $effective . ")";	break;
			case 2:$poison = "of hellfire juice (" . $poisonuse . "...which the opponent takes additional damage [1st time is 1d6 - 2nd time is 2d6 - 3rd time is 3d6 - ect] from hits by the weapon..." . $effective . ")";	break;
			case 3:$poison = "of manbane paste (" . $poisonuse . "...causes 2d6 damage and a 1d6 reduction from a character`s two highest attributes..." . $effective . ")";	break;
			case 4:$poison = "of mandrake powder (" . $poisonuse . "...where the victim loses 1/10th of their " . abilityTranslate($game,CON) . " permanently..." . $effective . ")";	break;
			case 5:
					if ($game == "Tunnels & Trolls 5th Edition"){$poison = "of naga spittle (" . $poisonuse . "...where it reduces " . abilityTranslate($game,INT) . " by half...down to 1 where the victim would fall unconscious..." . $effective . ")";}
					else {$poison = "of naga spittle (" . $poisonuse . "...where it reduces " . abilityTranslate($game,INT) . " and " . abilityTranslate($game,WIZ) . " by half their maximum...down to 1 where the victim would fall unconscious..." . $effective . ")";}
				break;
			case 6:$poison = "of scorpion venom (" . $poisonuse . "...and it will reduce a victim`s combat adds to 75%..." . $effective . ")";	break;
			case 7:$poison = "of spider venom (" . $poisonuse . "...and can only affect human sized creatures or smaller...where they will suffer paralysis...which wears off after 5 combat rounds..." . $effective . ")";	break;
			case 8:$poison = "of stone-fish toxin (" . $poisonuse . "...where the opponent hit would suffer 3d6 damage and make an L1SR vs. " . abilityTranslate($game,CON) . " or drop dead..." . $effective . ")";	break;
			case 9:$poison = "of werebane syrup (" . $poisonuse . "...does 2 extra damage to non-weres, but weres suffer 4x damage from the weapon and must make an L2SR vs. " . abilityTranslate($game,CON) . " or take 8d6 damage [if the SR fails, they are cured of lycanthropy]..." . $effective . ")";	break;
			case 10:$poison = "of wolfbane powder (" . $poisonuse . "...where the opponent suffers a loss of 3 points where going to 0 kills the victim..." . $effective . ")";	break;
			case 11:$poison = "of poison antidote (can cure any poison if consumed quick enough)";	break;
			case 12:$poison = "of poison immunity (can provide poison immunity for " . mt_rand(2,24) . " hours)";	break;
			case 13:$poison = "of heart's bane (" . $poisonuse . "...where the opponent must make an L2SR for CON or their combat adds are halved. Failure causes a heart attack..." . $effective . ")";	break;
			case 14:$poison = "of poison dart frog venom (" . $poisonuse . "...where the opponent must make an L2SR for CON or fall unconscious. Failure causes loss of all combat dice..." . $effective . ")";	break;
			case 15:$poison = "of snake venom (" . $poisonuse . "...where the opponent suffers 1 CON damage per round for 24 hours..." . $effective . ")";	break;
			case 16:$poison = "of sea snake venom (" . $poisonuse . "...where the opponent must make an L1SR for CON or become paralyzed..." . $effective . ")";	break;
		}

		switch (mt_rand(0,5))
		{
			case 0:	$lqud = "potion";	break;
			case 1:	$lqud = "elixir";	break;
			case 2:	$lqud = "concoction";	break;
			case 3:	$lqud = "draught";	break;
			case 4:	$lqud = "liquid";	break;
			case 5:	$lqud = "mixture";	break;
		}

		switch (mt_rand(0,59))
		{
			case 0:	$item = "of healing " . $lqud . " (restores " . mt_rand(1,2) . "d6+" . $level . " " . abilityTranslate($game,CON) . ")";	break;
			case 1:	$item = "of curing " . $lqud . " (cures disease and illness)";	break;
			case 2:	$item = "of poison antidote (allows +" . $level . " for any SR against poison)";	break;
			case 3:	$item = "of invisibility " . $lqud . " (lasts for " . ($level+1) . " minutes)";	break;
			case 4:	$item = "of animal domination " . $lqud . " [" . animalType() . "] (lasts for " . ($level+1) . " hours)";	break;
			case 5: $item = "of swimming " . $lqud . " (drinker can move through water as though they are moving on land for an hour)";	break;
			case 6: $item = "of secret doors " . $lqud . " (drinker can see secret doors and compartments for about an hour)";	break;
			case 7:	$item = "of shrinking " . $lqud . " (drinker and items shrink to 5% normal size for " . ($level+1) . " minutes)";	break;
			case 8:	$item = "of dragon domination " . $lqud . " [" . dragonType(0) . "] (lasts for " . ($level+1) . " hours)";	break;
			case 9:	$item = "of mind reading " . $lqud . " (lasts for " . ($level *2) . " minutes)";	break;
			case 10:$item = "of fire resistance " . $lqud . " (lasts for " . ($level+1) . " hours)";	break;
			case 11:$item = "of cold resistance " . $lqud . " (lasts for " . ($level+1) . " hours)";	break;
			case 12:$item = "of flying " . $lqud . " (lasts for " . ($level+10) . " minutes)";	break;
			case 13:$item = "of mist " . $lqud . " (drinker and items turn to mist for " . ($level *2) . " minutes)";	break;
			case 14:$item = "of giant domination " . $lqud . " [" . giantType() . "] (lasts for " . ($level+1) . " hours)";	break;
			case 15:$item = "of giant strength " . $lqud . " (increases the drinker's " . abilityTranslate($game,STR) . " by 10 for " . ($level+1) . " hours)";	break;
			case 16:$item = "of growing " . $lqud . " (drinker and items grow to 4x normal size for " . ($level+1) . " minutes)";	break;
			case 17:$item = "of heroic " . $lqud . " (drinker gets to add an extra dice to everything they do for " . ($level *2) . " minutes)";	break;
			case 18:$item = "of humanoid domination " . $lqud . " [" . humanType() . "] (lasts for " . ($level+1) . " hours)";	break;
			case 19:$item = "of invulnerable " . $lqud . " (lasts for " . ($level *2) . " minutes)";	break;
			case 20:$item = "of levitation " . $lqud . " (can levitate " . mt_rand(1,6) . " feet off the ground for " . ($level+10) . " minutes)";	break;
			case 21:$item = "of youth " . $lqud . " (drinker becomes " . mt_rand(2,20) . " years younger)";	break;
			case 22:$item = "of etherealness " . $lqud . " (can pass through " . mt_rand(2,10) . " feet thick walls for " . ($level+5) . " minutes)";	break;
			case 23:$item = "of slippery, magical oil (poured on the floor where anyone slips and falls)";	break;
			case 24:$item = "of blessing oil (remove curses on those it is rubbed on)";	break;
			case 25:$item = "of persuasive " . $lqud . " (can convince others to so something non-life threatening for " . ($level *2) . " minutes)";	break;
			case 26:$item = "of plant control " . $lqud . " (lasts for " . ($level+1) . " hours)";	break;
			case 27:$item = "of polymorph " . $lqud . " (can turn into another creature the same size for " . ($level+1) . " hours)";	break;
			case 28:$item = "of speed " . $lqud . " (increases the drinker's " . abilityTranslate($game,SPD) . " by 5 for " . ($level+1) . " hours)";	break;
			case 29:$item = "of super heroic " . $lqud . " (drinker gets to add two extra dice to everything they do for " . ($level *2) . " minutes)";	break;
			case 30:$item = "of purity " . $lqud . " (turns impure liquids to pure)";	break;
			case 31:$item = "of treasure seeking " . $lqud . " (can find nearby treasure for " . ($level*2) . " minutes)";	break;
			case 32:$item = "of undead domination " . $lqud . " [" . undeadType() . "] (lasts for " . ($level+1) . " hours)";	break;
			case 33:$item = "of underwater breathing " . $lqud . " (lasts for " . ($level + 1) . " hours)";	break;
			case 34:$item = "of life giving " . $lqud . " (brings those back from the dead)";	break;
			case 35:$item = "of dragon breath " . $lqud . " (drinker can breath fire instead of a normal attack with a 6+6)";	break;
			case 36:$item = "of acid resistance oil (rub on self or items...lasts until acid is splashed on them)";	break;
			case 37:$item = "of disenchanting oil (remove enchantments on those it is rubbed on)";	break;
			case 38:$item = "of elemental protection " . $lqud . " [" . elementalType() . "] (lasts for " . ($level+1) . " hours)";	break;
			case 39:$item = "of flaming oil (burns as soon as it is exposed to air for " . ($level+1) . " hours)";	break;
			case 40:$item = "of bluntness oil (any blunt weapon it is rubbed on has an extra " . mt_rand(2,4) . " dice for  " . ($level+1) . " hours)";	break;
			case 41:$item = "of sharpening oil (any sharp weapon it is rubbed on has an extra " . mt_rand(2,4) . " dice for  " . ($level+1) . " hours)";	break;
			case 42:$item = "of lying " . $lqud . " (drinker can convincely tell lies for " . mt_rand(10,20) . " minutes)";	break;
			case 43:$item = "of ventriloquism " . $lqud . " (drinker can throw their voice " . mt_rand(10,20) . " minutes)";	break;
			case 44:$item = "of intellect " . $lqud . " (increases the drinker's " . abilityTranslate($game,INT) . " by 5 for " . ($level+1) . " hours)";	break;
			case 45:$item = "of dexterity " . $lqud . " (increases the drinker's " . abilityTranslate($game,DEX) . " by 5 for " . ($level+1) . " hours)";	break;
			case 46:$item = "of luck " . $lqud . " (increases the drinker's " . abilityTranslate($game,LCK) . " by 5 for " . ($level+1) . " hours)";	break;
			case 47:$item = "of spider " . $lqud . " (can walk on walls and ceilings for " . (($level+1)*10) . " minutes)";	break;
			case 48:$item = "of lore " . $lqud . " (can identify and appraise any item " . (($level+1)*10) . " minutes)";	break;
			case 49:$item = "of truthfulness " . $lqud . " (drinker tells nothing but the truth for " . mt_rand(10,20) . " minutes unless they may an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . ")";	break;
			case 50:$item = "of speech " . $lqud . " (can talk in the same language as the one you are trying to converse with for " . (($level+1)*10) . " minutes)";	break;
			case 51:$item = "of cursed " . $lqud . " (" . curseType($level,drinker,item,$game) . ")";	break;
			case 52:$item = "of vile " . $lqud . " (" . curseType($level,drinker,item,$game) . ")";	break;
			case 53:$item = "of infernal " . $lqud . " (" . curseType($level,drinker,item,$game) . ")";	break;
			case 54:$item = "of blessing " . $lqud . " (drinker will have a curse lifted, or it can be poured on an item to remove a curse from it)";	break;
			case 55:$item = "of cleansing " . $lqud . " (drinker will have a curse lifted, or it can be poured on an item to remove a curse from it)";	break;
			case 56:$item = "of purity " . $lqud . " (drinker will have a curse lifted, or it can be poured on an item to remove a curse from it)";	break;
			case 57:$item = $poison;	break;
			case 58:$item = $poison;	break;
			case 59:$item = "of lycanthropy " . $lqud . " (drinker will turn into a " . lycanthrope() . " for " . mt_rand(2,12) . " hours, but is not permanent and it unaffects those suffering from lycanthropy)";	break;
		}

		if ($varb != 1){$item = $bottle . " " . $item . ". " . potionPretty();} else {$item = $item . " {<i>" . potionPretty() . "</i>}";}
	} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "scroll")
	{
		switch (mt_rand(0,4))
		{
			case 0:	$magitm = "powder";		break;
			case 1:	$magitm = "oil";		break;
			case 2:	$magitm = "powder";		break;
			case 3:	$magitm = "oil";		break;
			case 4:	$magitm = "scroll";		break;
		}
		if ($magitm == "powder")
		{
		    switch (mt_rand(0,3))
		    {
				case 0: $m_dustc = "pouch";		break;
				case 1: $m_dustc = "jar";		break;
				case 2: $m_dustc = "sack";		break;
				case 3: $m_dustc = "bottle";	break;
		    }
		    switch (mt_rand(0,2))
		    {
				case 0: $m_dustt = "dust";		break;
				case 1: $m_dustt = "powder";	break;
				case 2: $m_dustt = "sand";		break;
		    }
			$paper = "a small " . $m_dustc . " with " . candleColor(0) . " " . $m_dustt;
			$effec = "can be sprinkled on " . mt_rand(2,12) . " individuals";
			$effeh = "whatever it is sprinkled on";
		}
		else if ($magitm == "oil")
		{
			$paper = "a small " . bottlePicker() . " with " . candleColor(0) . " oil";
			$effec = "can be poured on " . mt_rand(2,12) . " individuals";
			$effeh = "whatever it is poured on";
		}
		else 
		{
		    switch (mt_rand(0,5))
		    {
				case 0: $rollo = "a magical";		break;
				case 1: $rollo = "a mystical";		break;
				case 2: $rollo = "an enchanted";	break;
				case 3: $rollo = "a magic";			break;
				case 4: $rollo = "a mysterious";	break;
				case 5: $rollo = "a strange";		break;
		    }
		    switch (mt_rand(0,4))
		    {
				case 0: $rollu = "fades away";		break;
				case 1: $rollu = "vanishes";		break;
				case 2: $rollu = "turns to dust";	break;
				case 3: $rollu = "burns away";		break;
				case 4: $rollu = "turns blank";		break;
		    }
			$paper = $rollo . " scroll (written in " . languageType($game) . ")";
			$effec = "can be read only once...where it then " . $rollu . "...to affect " . mt_rand(2,12) . " individuals";
			$effeh = "whoever it is read to";
		}

		switch (mt_rand(0,27))
		{
			case 0:	$item = $paper . " that protects one from demons (" . $effec . " and demons cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 1:	$item = $paper . " that protects one from devils (" . $effec . " and devils cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 2:	$item = $paper . " that protects one from " . elementalType($game) . "s (" . $effec . " and these elementals cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 3:	$item = $paper . " that protects one from " . lycanthrope() . "s (" . $effec . " and these lycanthropes cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 4:	$item = $paper . " that protects one from magic (" . $effec . " and magic cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 5:	$item = $paper . " that protects one from stone flesh (" . $effec . " and one turned to stone will be restored)";	break;
			case 6:	$item = $paper . " that protects one from possession (" . $effec . " and they cannot be possessed, or have their soul stolen, for " . mt_rand(2,18) . " hours)";	break;
			case 7:	$item = $paper . " that protects one from acidic attacks (" . $effec . " and acid cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 8:	$item = $paper . " that protects one from dragon's breath (" . $effec . " and dragon breath cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 9:	$item = $paper . " that protects one from cold (" . $effec . " and cold cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 10:$item = $paper . " that protects one from fire (" . $effec . " and fire cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 11:$item = $paper . " that protects one from electricity (" . $effec . " and electricity cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 12:$item = $paper . " that protects one from gaze attacks (" . $effec . " and gazes cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 13:$item = $paper . " that protects one from gases (" . $effec . " and gases cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 14:$item = $paper . " that protects one from illusions (" . $effec . " and they can see the truth of illusions for " . mt_rand(2,18) . " hours)";	break;
			case 15:$item = $paper . " that protects one from spiders (" . $effec . " and spiders, along with their webbing, cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 16:$item = $paper . " that protects one from plants (" . $effec . " and plants cannot harm or entangle them for " . mt_rand(2,18) . " hours)";	break;
			case 17:$item = $paper . " that protects one from poison (" . $effec . " and poisons cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 18:$item = $paper . " that protects one from traps (" . $effec . " and traps cannot harm them for " . mt_rand(2,12) . " hours)";	break;
			case 19:$item = $paper . " that protects one from water (" . $effec . " and water/ice/snow/vapor-based attacks cannot harm them for " . mt_rand(2,18) . " hours)";	break;
			case 20:$item = $paper . " that protects one from magical weapons (" . $effec . " and magic weapons cannot harm them for " . mt_rand(2,4) . " hours)";	break;
			case 21:$item = $paper . " that protects one from normal weapons (" . $effec . " and weapons cannot harm them for " . mt_rand(2,4) . " hours)";	break;
			case 22:$item = $paper . " with an evil curse to " . $effeh . " (" . curseType($level,person,item,$game) . ")";	break;
			case 23:$item = $paper . " with a vile hex to " . $effeh . " (" . curseType($level,person,item,$game) . ")";	break;
			case 24:$item = $paper . " with horrible magic to " . $effeh . " (" . curseType($level,person,item,$game) . ")";	break;
			case 25:$item = $paper . " of blessing (" . $effec . " where they will have a curse lifted)";	break;
			case 26:$item = $paper . " of curse removal (" . $effec . " where they will have a curse lifted)";	break;
			case 27:
				if ($game == "Tunnels & Trolls 5th Edition"){$item = $paper . " of weakness (" . $effec . " where they will be totally drained of all their " . abilityTranslate($game,STR) . " points)";}
				else {$item = $paper . " of nullification (" . $effec . " where they will be totally drained of all their " . abilityTranslate($game,WIZ) . " points)";}
				break;
		}
	} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "ring")
	{
		if ($game == "Tunnels & Trolls 5th Edition"){$rmax = 41;} else {$rmax = 43;}

		$charges = mt_rand(10,50);
		switch (mt_rand(0,$rmax))
		{
			case 0:	$item = "ring of efreet summoning (will summon a efreet to fight with the group for a single combat)";	break;
			case 1:	$item = "ring of elemental domination [" . elementalType($game) . "] (will control a single elemental for " . mt_rand(1,9) . "0 minutes)";	break;
			case 2:	$item = "ring of feather falling (will cause the wearer to fall slowly)";	break;
			case 3:	$item = "ring of fire resistance (allows the wearer to roll an extra die for any SR's involving fire)";		$use_charges = 1;	$no_words = 1; break;
			case 4:	$item = "ring of cold resistance (allows the wearer to roll an extra die for any SR's involving cold)";		$use_charges = 1;	$no_words = 1; break;
			case 5:	$item = "ring of freedom (allows the wearer to break free from any form of imprisonment)";	break;
			case 6:	$item = "ring of influence (allows the wearer to roll an extra die for any SR's involving " . abilityTranslate($game,CHR) . ")";	break;
			case 7:	$item = "ring of invisibility (the wearer can turn invisible for " . mt_rand(1,9) . "0 minutes)";	break;
			case 8:	$item = "ring of animal domination [" . animalType() . "] (will control a single animal for " . mt_rand(1,9) . "0 minutes)";	break;
			case 9:	$item = "ring of protection +" . $plus . " (gives additional points to armor hits)";	break;
			case 10:$item = "ring of regenerating (restores " . $plus . " " . abilityTranslate($game,CON) . " every hour)";	$use_charges = 1;	break;
			case 11:$item = "ring of magic (allows the wearer reduce a spell casting cost by " . $plus . " point)";	break;
			case 12:$item = "ring of turning spells (allows the wearer to reflect a spell back at the caster)";	break;
			case 13:$item = "ring of telekinesis (allows the wearer to move an object they can see, and that they can lift themselves, with their mind up to " . mt_rand(1,10) . "0 feet)";	break;
			case 14:$item = "ring of swimming (makes the wearer a perfect swimmer)";	$use_charges = 1;	break;
			case 15:$item = "ring of warmth (keeps the wearer warm in cold weather climates)";	$use_charges = 1;	break;
			case 16:$item = "ring of water walking (allows the wearer to walk on water up to " . mt_rand(1,10) . "0 feet per charge)";	break;
			case 17:$item = "ring of sorcery (allows one to cast spells one level higher without penalty)";	$no_words = 1; break;
			case 18:$item = "ring of sight (can see through obstacles up to " . mt_rand(2,10) . " feet thick)";	break;
			case 19:$item = "ring of phasing (can pass through obstacles up to " . mt_rand(2,10) . " feet thick)";	break;
			case 20:$item = "ring of the chameleon (the wearer can blend in with a surface for " . mt_rand(1,9) . "0 minutes and only if they hold still)";	break;
			case 21:$item = "ring of leaping (can leap 30 feet or 10 feet high)";	break;
			case 22:$item = "ring of shielded mind (allows the wearer to roll an extra die for any SR's involving magical mind control done against them)";	break;
			case 23:$item = "ring of falsehood (can detect lies and cannot tell any)";	break;
			case 24:$item = "ring of the warrior (allows the wearer to roll an extra die for combat)";	$no_words = 1; break;
			case 25:$item = "ring of the rogue (allows the wearer to roll an extra die for roguery)";	$no_words = 1; break;
			case 26:$item = "ring of strength +" . $plus;		$use_charges = 1;	$no_words = 1; break;
			case 27:$item = "ring of intelligence +" . $plus;	$use_charges = 1;	$no_words = 1; break;
			case 28:$item = "ring of constitution +" . $plus;	$use_charges = 1;	$no_words = 1; break;
			case 29:$item = "ring of luck +" . $plus;			$use_charges = 1;	$no_words = 1; break;
			case 30:$item = "ring of charisma +" . $plus;		$use_charges = 1;	$no_words = 1; break;
			case 31:$item = "ring of dexterity +" . $plus;		$use_charges = 1;	$no_words = 1; break;
			case 32:$item = "ring of the dead [" . undeadType() . "] (will control a single undead for " . mt_rand(1,9) . "0 minutes)";	break;
			case 33:$item = "cursed ring (" . curseType($level,wearer,equip,$game) . ")";	$curses = 1; break;
			case 34:$item = "vile ring (" . curseType($level,wearer,equip,$game) . ")";		$curses = 1; break;
			case 35:$item = "infernal ring (" . curseType($level,wearer,equip,$game) . ")";	$curses = 1; break;
			case 36:$item = "ring of the warlock (can reduce the " . abilityTranslate($game,POW) . " cost to cast a spell by " . mt_rand(2,10) . ")";	$no_words = 1; break;
			case 37:$item = "ring of the witch (can reduce the " . abilityTranslate($game,POW) . " cost to cast a spell by " . mt_rand(2,10) . ")";		$no_words = 1; break;
			case 38:$item = "ring of the mystic (can cast a spell at 1 level higher efficacy without spending extra " . abilityTranslate($game,POW) . " points)";	$no_words = 1; break;
			case 39:	$ring_picks = mt_rand(1,3);
				if ($ring_picks == 1){$item = "ring of envy (anyone who sees this ring has to have it...most often resorting to violence...unless they can make an L" . mt_rand(1,3) . "SR vs. " . abilityTranslate($game,INT) . ")"; $curses = 1; }
				else if ($ring_picks == 2){$item = "ring of severing (anyone who puts this ring on will have their finger cut off)"; $curses = 1; }
				else if ($game == "Tunnels & Trolls 5th Edition"){$item = "ring of weakness (if the wearer of this ring touches someone, and wills it, they can drain the victim of all their " . abilityTranslate($game,STR) . " points once per day)";}
				else {$item = "ring of nullification (if the wearer of this ring touches someone, and wills it, they can drain the victim of all their " . abilityTranslate($game,WIZ) . " points once per day)";}
				break;
			case 40:$item = "rings of fellowship (if one wears this ring and begins to get harmed, the other will begin to glow with a " . beamColor() . " light on the other wearer`s hand)";	$no_words = 1; $use_charges = 1;	break;
			case 41:$item = "rings of the birds (this will cause the wearer, and all of their possessions, to turn into a " . birdType() . " for " . mt_rand(2,6) . " hours per day)";	break;
			case 42:$item = "ring of speed +" . $plus;			$use_charges = 1;	break;
			case 43:$item = "ring of wizardry +" . $plus;		$use_charges = 1;	break;
		}
			$decorate = "[a " . preciousChooser() . " ring with a " . gemChooser() . " set in it";
				if (mt_rand(1,100) > 50){$decorate = "[a " . preciousChooser() . " ring";}
			if ((mt_rand(1,100) > 70) && ($curses != 1) && ($no_words != 1)){$words = "...there is a command word engraved on the inside written in " . languageType($game) . " that says `" . castingName() . "`";}
				if ((mt_rand(1,100) > 90) && ($curses != 1) && ($no_words != 1)){$words = "...the command word to use this is `" . castingName() . "`, which can be learned by identifying the item";}
			$decorate = $decorate . "" . $words;
			if ((mt_rand(1,100) > 70) && ($curses != 1) && ($use_charges != 1)){$item = $item . " " . $decorate . " - it has " . $charges . " charges]";} else {$item = $item . " " . $decorate . "]";}
			if (mt_rand(1,100) > 50){$item = "<u>" . artifactNaming(ring,'',$curses,0) . "</u> - " . $item;}
	} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "wand")
	{
		if ($size == 1){$r_min=20; $r_max = 48;} else if ($size == 2){$r_min=20; $r_max = 48;} else {$r_min=0; $r_max = 48;}

		$staff_hurt = "{" . $term . ":" . mt_rand(2,6) . $turm . "+" . mt_rand(1,10) . "&nbsp;/&nbsp;STR:" . mt_rand(3,10) . "&nbsp;/&nbsp;DEX:" . mt_rand(2,8) . "&nbsp;/&nbsp;Wizards&nbsp;Ignore&nbsp;2&nbsp;Dice&nbsp;Penalty}";
		$staff_smit = "{" . $term . ":" . mt_rand(4,10) . $turn . "+" . mt_rand(3,12) . "&nbsp;/&nbsp;STR:" . mt_rand(3,10) . "&nbsp;/&nbsp;DEX:" . mt_rand(2,8) . "&nbsp;/&nbsp;Wizards&nbsp;Ignore&nbsp;2&nbsp;Dice&nbsp;Penalty}";

		$smy_mr_is = ($level * 10) + 30;
		$smy_dc_is = (FLOOR($smy_mr_is/10)+1) . "&nbsp;+&nbsp;" . (CEIL($smy_mr_is/2));

		switch (mt_rand($r_min,$r_max))
		{
			case 0:$item = "staff of domination " . $staff_hurt . " (will control a single creature for " . mt_rand(1,9) . "0 minutes)";		break;
			case 1:$item = "staff of curing " . $staff_hurt . " (can cure anyone of poison or disease)";		break;
			case 2:$item = "staff of the wizard " . $staff_hurt . " (grants a +" . mt_rand(3,10) . " to " . abilityTranslate($game,INT) . "...without using charges...and can reduce the " . abilityTranslate($game,POW) . " cost to cast a spell by " . mt_rand(5,15) . " per charge)";		break;
			case 3:$item = "staff of power " . $staff_hurt . " (can allow the wielder, and nearby comrades, an extra dice to anything they attempt for " . mt_rand(2,6) . " hours per charge)";		break;
			case 4:$item = "staff of the snake " . $staff_hurt . " (if thrown on the ground, this will turn into a giant serpent {MR " . $smy_mr_is . " creature with " . $smy_dc_is . " DICE} for the duration of a single combat)";		break;
			case 5:$item = "staff of the sorcerer " . $staff_hurt . " (grants a +" . mt_rand(3,10) . " to " . abilityTranslate($game,LCK) . "...without using charges...and can reduce the " . abilityTranslate($game,POW) . " cost to cast a spell by " . mt_rand(5,15) . " per charge)";		break;
			case 6:$item = "staff of withering " . $staff_hurt . " (every charge used will cause a target to lose 10 points of MR and 5 points of " . abilityTranslate($game,WIZ) . ")";		break;
			case 7:$item = "staff of insect swarm " . $staff_hurt . " (can produce a magical swarm of insects for a single combat...that will either allow a group to escape or cause an opponent to reduce their combat dice in half...rounded up)";		break;
			case 8:$item = "staff of the mage " . $staff_hurt . " (can cast a spell at 1 level higher efficacy without spending extra " . abilityTranslate($game,POW) . " points)";		break;
			case 9:$item = "staff of the conjurer " . $staff_hurt . " (grants a +" . mt_rand(3,10) . " to " . abilityTranslate($game,DEX) . "...without using charges...and can reduce the " . abilityTranslate($game,POW) . " cost to cast a spell by " . mt_rand(5,15) . " per charge)";		break;
			case 10:$item = "staff of magical vortex " . $staff_hurt . " (can absorb magic unleashed on the wielder and cast out at a later time...but only able to hold one magic effect at a time)";	break;
			case 11:$item = "staff of friendship " . $staff_hurt . " (can make up to " . mt_rand(2,10) . " enemies be friendly to the wielder for " . mt_rand(5,20) . " minutes)";		break;
			case 12:$item = "staff of nullifying " . $staff_hurt . " (using this rod on a magic item will remove all magical effects...even curses)";		break;
			case 13:$item = "staff of resurrection " . $staff_hurt . " (will resurrect one that has recently died)";	break;
			case 14:$item = "staff of door knocking " . $staff_hurt . " (can unlock any door with a simple tap)";		break;
			case 15:$item = "staff of domination " . $staff_hurt . " (can force up to " . mt_rand(2,10) . " enemies follow the commands of the wielder for " . mt_rand(5,20) . " minutes)";		break;
			case 16:$item = "staff of smite enemy " . $staff_smit . " (each hit with this weapon uses a charge...where it turns into a normal quarterstaff weapon after all charges are used)";		break;
			case 17:$item = "staff of awareness " . $staff_hurt . " (every charge of this staff will keep the wielder from getting surprised by others)";		break;
			case 18:$item = "staff of travel " . $staff_hurt . " (if tapped on the ground 3 times, this staff can later open a dimensional door that will allow others to travel back to that spot)";		break;
			case 19:$item = "staff of safe haven " . $staff_hurt . " (can create an area of safety where dangers cannot penetrate and a group can rest without concern)";		break;
			case 20:$item = "wand of conjuring (can summon any creature for the duration of a single combat...but no matter the creature...it will only have an MR of the wielder`s " . abilityTranslate($game,INT) . "x10)";		break;
			case 21:$item = "wand of finding foes (will find enemies nearby and an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . " will even show what type they are)";		break;
			case 22:$item = "wand of fright (will cause an opponent to collapse in fear and do nothing for " . mt_rand(2,5) . " combat rounds)";		break;
			case 23:$item = "wand of the illusionist (can reduce the " . abilityTranslate($game,POW) . " cost to cast a spell by " . mt_rand(2,10) . " per charge)";	break;
			case 24:$item = "wand of freezing (will cause an opponent to be frozen for " . mt_rand(2,5) . " combat rounds, after which they fully thaw)";		break;
			case 25:$item = "wand of light (will radiate light like a torch or lantern for about " . mt_rand(2,12) . " hours per charge";		break;
			case 26:$item = "wand of illusion (can create an illusion of any medium-sized creature that will cause an opponent to attack that for " . mt_rand(2,5) . " combat rounds...and only if they fail an L" . mt_rand(1,4) . "SR vs. " . abilityTranslate($game,INT);		break;
			case 27:$item = "wand of the magician (can cast a spell at 1 level higher efficacy without spending extra " . abilityTranslate($game,POW) . " points)";	break;
			case 28:$item = "wand of finding magic (will point in the direction of any magic item or creature that is nearby and an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . " will even show what it is)";		break;
			case 29:$item = "wand of finding coins (will point in the direction of any coins that is nearby and an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . " will even show what they are and how much)";		break;
			case 30:$item = "wand of the magi (can cast a spell at 1 level higher efficacy without spending extra " . abilityTranslate($game,POW) . " points)";	break;
			case 31:$item = "wand of magic arrow (will create an arrow that attacks on its own for one combat round and then vanishes...based on the wielder, it has DICE:[" . abilityTranslate($game,INT) . "+2]d6+[" . abilityTranslate($game,POW) . "])";		break;
			case 32:$item = "wand of negating (will destroy any magical effect or curse)";		break;
			case 33:$item = "wand of paralyzing (will paralyze an opponent for " . mt_rand(2,5) . " combat rounds)";		break;
			case 34:$item = "wand of polymorph (will turn an opponent into a " . polymorphType() . " for " . mt_rand(2,5) . " combat rounds)";		break;
			case 35:$item = "wand of secrets (will find nearby secret/hidden doors)";	break;
			case 36:$item = "wand of finding traps (will find nearby traps)";	break;
			case 37:$item = "wand of wonderous magic (can cast a spell at 1 level higher efficacy without spending extra " . abilityTranslate($game,POW) . " points...or can reduce the " . abilityTranslate($game,POW) . " cost to cast a spell by " . mt_rand(5,15) . "...per charge)";	break;
			case 38:$item = "wand of autumn (clears plants and vegetation in a 100 foot area per charge)";		break;
			case 39:$item = "wand of the worm (digs, moves earth, changes rock to mud...but only 20 feet per charge)";	break;
			case 40:$item = "wand of fireball (will create a fireball that attacks on its own for one combat round and then burns away...based on the wielder, it has DICE:[" . abilityTranslate($game,INT) . "+4]d6+[" . abilityTranslate($game,POW) . "])";		break;
			case 41:$item = "wand of extinguishing (puts out fires and can even stop the effects of fire based attacks)";	break;
			case 42:$item = "wand of sorcery (can reduce the " . abilityTranslate($game,POW) . " cost to cast a spell by " . mt_rand(2,10) . " per charge)";	break;
			case 43:$item = "wand of icicles (will create icicles that attacks on its own for one combat round and then melts away...based on the wielder, it has DICE:[" . abilityTranslate($game,INT) . "+6]d6+[" . abilityTranslate($game,POW) . "])";		break;
			case 44:$item = "wand of lightning (will create a lightning bolt that attacks on its own for one combat round and then fizzles away...based on the wielder, it has DICE:[" . abilityTranslate($game,INT) . "+8]d6+[" . abilityTranslate($game,POW) . "])";		break;
			case 45:$item = "wand of necromancy (can make one dead creature`s corpse rise and fight with the group for a single combat...after which the corpse turns to dust)";	break;
			case 46:$item = "wand of the puppet master (will cause one opponent to join the wielder and fight alongside for " . mt_rand(2,5) . " combat rounds)";		break;
			case 47:$item = "wand of animation (will cause a nearby statue or furniture {chair, table, etc} to join the wielder and fight alongside for " . mt_rand(2,5) . " combat rounds...based on the wielder, it will have a CON:[" . abilityTranslate($game,INT) . "+" . abilityTranslate($game,POW) . "] and DICE:[" . abilityTranslate($game,INT) . "+2]d6+[" . abilityTranslate($game,CON) . "])";		break;
			case 48:
				if ($game == "Tunnels & Trolls 5th Edition"){$item = "wand of weakness (every charge used will drain " . mt_rand(5,25) . " " . abilityTranslate($game,POW) . " from an opponent)";}
				else {$item = "wand of nullification (every charge used will drain " . mt_rand(5,25) . " " . abilityTranslate($game,POW) . " from an opponent)";}
				break;
		}
		$mystic_item = explode(" ", $item);
		if (substr($item, 0, 3) == "wan")
		{
			$charges = mt_rand(20,100);
			switch (mt_rand(0,9))
			{
				case 0:	$material = "bone";		break;
				case 1:	$material = "ivory";		break;
				case 2:	$material = "wood";		break;
				case 3:	$material = "strange wood";	break;
				case 4:	$material = "bone";		break;
				case 5:	$material = "ivory";		break;
				case 6:	$material = "wood";		break;
				case 7:	$material = "strange wood";	break;
				case 8:	$material = "demon bone";	break;
				case 9:	$material = "dragon bone";	break;
			}
			if (mt_rand(1,100) > 50){$extradj = " and has a " . gemChooser() . " at the end of it";}
		}
		else
		{
			$charges = mt_rand(5,25);
			switch (mt_rand(0,10))
			{
				case 0:	$material = "ash wood";		break;
				case 1:	$material = "wood";		break;
				case 2:	$material = "oak wood";		break;
				case 3:	$material = "yew wood";		break;
				case 4:	$material = "ash wood";		break;
				case 5:	$material = "wood";		break;
				case 6:	$material = "oak wood";		break;
				case 7:	$material = "yew wood";		break;
				case 8:	$material = "strange wood";	break;
				case 9:	$material = "dragon bone";	break;
				case 10:$material = "giant bone";	break;
			}
			if (mt_rand(1,100) > 50){$extradj = " and has a " . gemChooser() . " at the top";}
		}
		$decorate = "[this has " . $charges . " charges and is made of " . $material . "" . $extradj;
		if (mt_rand(1,100) > 70){$words = ". There is a command word carved on it in " . languageType($game) . " that says `" . castingName() . "`";}
		if (mt_rand(1,100) > 90){$words = ". The command word to use this is `" . castingName() . "`, which can be learned by identifying the item";}
		$decorate = $decorate . "" . $words . "]";
		$item = $item . " " . $decorate;
		if (mt_rand(1,100) > 50){$item = "<u>" . artifactNaming($mystic_item[0],'',0,1) . "</u> - " . $item;}
	} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "armor")
	{
		$wearer = "wearer";
		$tt_easy_items = $_SESSION['tt_easy_items'];
		if ( $tt_easy_items == 1 ) //////////////////////////////// MAGESTYKC SIMPLE ARMOR ////////////////////////////////////////////////////////////////////////////////
		{
			if ($game == "Tunnels & Trolls Deluxe"){ $item_from_tt = TTArmsArmor(2,0,42,$game); } else { $item_from_tt = TTArmsArmor(2,0,32,$game); }
				$nt_type = $item_from_tt[0];
				$nt_category = $item_from_tt[1];
				$nt_name = $item_from_tt[2];
				$nt_str = $item_from_tt[5];
				$nt_val = $item_from_tt[8];
				$nt_hits = $item_from_tt[11];
				$nt_material = $item_from_tt[12];

			if ($game == "Tunnels & Trolls Deluxe")
			{
				if ($nt_category == "Shield"){$nt_iam = "shield";}
				else if ($nt_category == "Suit"){$nt_iam = "full suit of armor";}
				else {$nt_iam = "piece of armor";}
			}
			else
			{
				if ($nt_category == "Shield"){$nt_iam = "shield";}
				else if ($nt_category == "Suit"){$nt_iam = "full suit of armor";}
				else {$nt_iam = "armor for " . strtolower($nt_category);}
			}

			$ttm_item = $nt_name;
			$ttm_mystic = $nt_name;
			$ttm_style = $nt_iam;
			$ttm_hits = $nt_hits;
			$ttm_str = $nt_str;
		}
		else ////////////////////////////////////////////////////// T&T NORMAL ARMOR //////////////////////////////////////////////////////////////////////////////////////
		{
			if ($game == "Tunnels & Trolls Deluxe"){	if ($size == 1){$r_min=0; $r_max = 14;} else if ($size == 2){$r_min=0; $r_max = 36;} else {$r_min=0; $r_max = 42;} }
			else {										if ($size == 1){$r_min=0; $r_max = 13;} else if ($size == 2){$r_min=0; $r_max = 23;} else {$r_min=0; $r_max = 41;} }

			$item_from_tt = TTArmsArmor(3,$r_min,$r_max,$game);
				$nt_type = $item_from_tt[0];
				$nt_category = $item_from_tt[1];
				$nt_name = $item_from_tt[2];
				$nt_str = $item_from_tt[5];
				$nt_val = $item_from_tt[8];
				$nt_hits = $item_from_tt[11];
				$nt_material = $item_from_tt[12];

			$ttm_item = $nt_name;
			$ttm_mystic = $nt_category;
			$ttm_style = $nt_type;
			$ttm_hits = $nt_hits;
			$ttm_str = $nt_str;
			$wearer = $item_from_tt[18];
		}

		$forge = mt_rand(1,100);

		if ($forge < 50){ $ttm_hits = $ttm_hits * mt_rand(2,4); $ttm_str = CEIL($ttm_str - mt_rand(1,2)); if ($ttm_str < 1){$ttm_str = 1;} }
		else if ($forge < 75){ $ttm_hits = $ttm_hits * mt_rand(5,7); $ttm_str = CEIL($ttm_str - mt_rand(3,4)); if ($ttm_str < 1){$ttm_str = 1;} }
		else if ($forge < 85){ $ttm_hits = $ttm_hits * mt_rand(8,10); $ttm_str = CEIL($ttm_str - mt_rand(5,6)); if ($ttm_str < 1){$ttm_str = 1;} }
		else if ($forge < 90){ $ttm_hits = $ttm_hits * mt_rand(11,13); $ttm_str = CEIL($ttm_str - mt_rand(7,8)); if ($ttm_str < 1){$ttm_str = 1;} }
		else if ($forge < 95){ $ttm_hits = $ttm_hits * mt_rand(2,4); $ttm_str = CEIL($ttm_str - mt_rand(1,2)); if ($ttm_str < 1){$ttm_str = 1;} $bonus = "BONUS&nbsp;+" . mt_rand(1,3) . " for any SR's made from attacks"; }
		else if ($forge < 99){ $ttm_hits = $ttm_hits * mt_rand(2,4); $ttm_str = CEIL($ttm_str - mt_rand(1,2)); if ($ttm_str < 1){$ttm_str = 1;} $bonus = "BONUS&nbsp;+" . mt_rand(3,6) . " for any SR's made from attacks"; }
		else
		{	$cursing = 1;
			$curs = strtolower($ttm_mystic);
			switch (mt_rand(0,2))
			{
				case 0:$bonus = "cursed " . $curs . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
				case 1:$bonus = "vile " . $curs . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
				case 2:$bonus = "infernal " . $curs . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
			}
		}
		if ( ($cursing != 1) && (mt_rand(1,100) > 95) && ($ttm_style != "Armor/Shield") && ($ttm_style != "Shield") )
		{
			switch (mt_rand(0,7))
			{
				case 0:$bonus = "shadow armor - wearer can turn invisible for " . mt_rand(2,10) . " minutes but only " . mt_rand(2,6) . " times a day";	break;
				case 1:$bonus = "troll armor - wearer can regenerate " . mt_rand(2,10) . " " . abilityTranslate($game,CON) . " during 1 combat round but only " . mt_rand(5,15) . " times a day";	break;
				case 2:$bonus = "wearer can absorb 2x the hits when attacked by " . slayerType(armor);	break;
				case 3:$bonus = "wearer can absorb 3x the hits when attacked by " . slayerType(armor);	break;
				case 4:$bonus = "bright light armor - can light a " . mt_rand(2,6) . "0 foot area when worn...and the wearer wills it";	break;
				case 5:$bonus = "warmonger armor - doubles the wearer`s combat adds " . mt_rand(2,10) . " times a day";	break;
				case 6:$bonus = "ghost armor - wearer can walk through objects no more than " . mt_rand(2,10) . " feet thick but only " . mt_rand(2,6) . " times a day";	break;
				case 7:$bonus = "reflective armor - attacks can bounce back at the attacker but only " . mt_rand(2,6) . " times a day";	break;
			}
		}
		if ( ($cursing != 1) && (mt_rand(1,100) > 95) && ( ($ttm_style == "Armor/Shield") || ($ttm_style == "Shield") ) )
		{
			switch (mt_rand(0,7))
			{
				case 0:$bonus = "dragon shield - wielder can block the effect of any dragon breath " . mt_rand(2,10) . " times a day";	break;
				case 1:$bonus = "mirror shield - wielder can reflect any gaze attacks back at the attacker " . mt_rand(2,10) . " times a day";	break;
				case 2:$bonus = "wielder cannot be harmed when attacked by " . slayerType(armor);	break;
				case 3:$bonus = "wielder can absorb 2x the hits when attacked by " . slayerType(armor);	break;
				case 4:$bonus = "star shine shield - can light a " . mt_rand(2,6) . "0 foot area when worn...and the wearer wills it";	break;
				case 5:$bonus = "spell shield - wielder can block the effects of any spells directed at them " . mt_rand(2,10) . " times a day.";	break;
				case 6:$bonus = "door basher - can bash open any non-magically locked/sealed door " . mt_rand(2,10) . " times a day";	break;
				case 7:$bonus = "breath shield - wielder can block the effect of any breath attack " . mt_rand(2,5) . " times a day";	break;
			}
		}

		if ($bonus != ""){$bonus = "&nbsp;--&nbsp[" . $bonus . "]";}

		$ttm_bonus = "HITS:" . $ttm_hits . "&nbsp;--&nbspSTR:" . $ttm_str . $bonus;

		$item = strtolower($ttm_item);

		if ( $tt_easy_items == 1 ) //////////////////////////////// MAGESTYKC SIMPLE ARMOR ////////////////////////////////////////////////////////////////////////////////
		{
			if ( ($nt_category == "Shield") && (mt_rand(1,100) > 60) ){$logo = "...with a " . designType(0) . " symbol on the front that is " . designColor() . " in color";}
			if ( ( ($nt_category == "Suit") || ($nt_category == "Chest") ) && (mt_rand(1,100) > 60))
			{
				if (mt_rand(1,100) > 50){$sew = "back";} else if (mt_rand(1,100) > 50){$sew = "front";} else {$sew = "front and back";
			}
				$logo = "...with a " . designType(0) . " symbol on the " . $sew . " that is " . designColor() . " in color";}
		
			if ($nt_material == "L"){$decorate = "[made of " . materialType(leather) . " hide and is " . leatherColor() . " in color" . $logo. "]";}
			else if ($nt_material == "C"){$decorate = "[made of " . materialType(cloth) . " and is " . leatherColor() . " in color" . $logo. "]";}
			else if ($nt_material == "W"){$decorate = "[made of " . materialType(wood) . " and is " . leatherColor() . " in color" . $logo. "]";}
			else {$decorate = "[made of " . materialType(iron) . "" . $logo. "]";}
		}
		else ////////////////////////////////////////////////////// T&T NORMAL ARMOR //////////////////////////////////////////////////////////////////////////////////////
		{
			if (mt_rand(1,100) > 60){$logo = "...with a " . designType(0) . " symbol on it that is " . designColor() . " in color";}

			if ($ttm_mat == "L"){$decorate = "[made of " . materialType(leather) . " hide and is " . leatherColor() . " in color" . $logo. "]";}
			else if ($ttm_mat == "M"){$decorate = "[made of " . materialType(iron) . "" . $logo. "]";}
			else {$decorate = "[it is " . candleColor(0) . " in color" . $logo. "]";}
		}

		$item = $item . " [magical " . strtolower($ttm_style) . "] (" . $ttm_bonus . ") " . $decorate;

		if (mt_rand(1,100) > 50){$item = "<u>" . artifactNaming($ttm_mystic,'',$cursing,0) . "</u> - " . $item;}

	} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "weapon")
	{
		$wearer = "wielder";

		$tt_easy_items = $_SESSION['tt_easy_items'];

		if ( $tt_easy_items == 1 ) // USE THE SIMPLE WEAPONS FROM MAGESTYKC ////////////////////////////
		{
			if ($game == "Tunnels & Trolls Deluxe"){	if ($size == 1){$r_min=0; $r_max = 25;} else if ($size == 2){$r_min=0; $r_max = 44;} else {$r_min=0; $r_max = 89;} }
			else {										if ($size == 1){$r_min=0; $r_max = 21;} else if ($size == 2){$r_min=0; $r_max = 43;} else {$r_min=0; $r_max = 94;} }

			$item_from_tt = TTArmsArmor(1,$r_min,$r_max,$game);
				$nt_type = $item_from_tt[0];
				$nt_category = $item_from_tt[1];
				$nt_name = $item_from_tt[2];
				$nt_dice = $item_from_tt[3];
				$nt_adds = $item_from_tt[4];
				$nt_str = $item_from_tt[5];
				$nt_dex1 = $item_from_tt[6];
				$nt_dex2 = $item_from_tt[7];
				$nt_val = $item_from_tt[8];
				$nt_hands = $item_from_tt[9];
				$nt_range = $item_from_tt[10];
				$nt_hits = $item_from_tt[11];
				$nt_material = $item_from_tt[12];
				$bow = $item_from_tt[13];
				$quiver = $item_from_tt[14];
				$pole = $item_from_tt[15];
				$smith2 = $item_from_tt[16];
				$smith1 = $item_from_tt[17];

			$item = strtolower($nt_name);
			$ttw_type = strtolower($nt_category);
			$ttw_name = strtolower($nt_name);
			$ttw_mystic = strtolower($nt_name);
			$ttw_dice = $nt_dice;
			$ttw_adds = $nt_adds;
			$ttw_str = $nt_str;
			$ttw_dex1 = $nt_dex1;
			$ttw_dex2 = $nt_dex2;
		}
		else // USE THE WEAPONS FROM THE T&T GAME //////////////////////////////////////////////////////
		{
			$which_tt_weapon = mt_rand(1,100);

			if ($which_tt_weapon > 40)
			{
				if ($game == "Tunnels & Trolls Deluxe"){	if ($size == 1){$r_min=0; $r_max = 23;} else if ($size == 2){$r_min=0; $r_max = 83;} else {$r_min=0; $r_max = 164;} }
				else {										if ($size == 1){$r_min=0; $r_max = 17;} else if ($size == 2){$r_min=0; $r_max = 47;} else {$r_min=0; $r_max = 121;} }
				$item_from_tt = TTArmsArmor(4,$r_min,$r_max,$game);
			}
			else if ($which_tt_weapon > 10)
			{
				if ($game == "Tunnels & Trolls Deluxe"){	if ($size == 1){$r_min=0; $r_max = 6;} else if ($size == 2){$r_min=0; $r_max = 8;} else {$r_min=0; $r_max = 17;} }
				else {										if ($size == 1){$r_min=0; $r_max = 4;} else if ($size == 2){$r_min=0; $r_max = 10;} else {$r_min=0; $r_max = 26;} }
				$item_from_tt = TTArmsArmor(5,$r_min,$r_max,$game);
			}
			else
			{
				if ($game == "Tunnels & Trolls Deluxe"){	if ($size == 1){$r_min=0; $r_max = 15;} else if ($size == 2){$r_min=0; $r_max = 16;} else {$r_min=0; $r_max = 16;} }
				else {										if ($size == 1){$r_min=0; $r_max = 6;} else if ($size == 2){$r_min=0; $r_max = 13;} else {$r_min=0; $r_max = 14;} }
				$item_from_tt = TTArmsArmor(6,$r_min,$r_max,$game);
			}
			$nt_type = $item_from_tt[0];
			$nt_category = $item_from_tt[1];
			$nt_name = $item_from_tt[2];
			$nt_dice = $item_from_tt[3];
			$nt_adds = $item_from_tt[4];
			$nt_str = $item_from_tt[5];
			$nt_dex1 = $item_from_tt[6];
			$nt_dex2 = $item_from_tt[7];

			$ttw_type= $nt_type;
			$ttw_name = $nt_name;
			$ttw_mystic = $nt_category;
			$ttw_dice = $nt_dice;
			$ttw_adds = $nt_adds;
			$ttw_str = $nt_str;
			$ttw_dex1 = $nt_dex1;
			$ttw_dex2 = $nt_dex2;
		}

		$forge = mt_rand(1,100);

		if (mt_rand(1,10) == 1) //// THIS MAKES WEAPONS WITH EXTRA ADDS AND NOT EXTRA DICE...WITH WIZARDS IN MIND ////
		{
			if ($forge < 50){ 		$ttw_adds = $ttw_adds + mt_rand(2,5); 		$ttw_str = $ttw_str - mt_rand(0,1);		$ttw_dex1 = $ttw_dex1 - mt_rand(0,1);		if ($ttw_dex2 > 0){$ttw_dext = $ttw_dex2 - mt_rand(0,1);}	}
			else if ($forge < 75){ 	$ttw_adds = $ttw_adds + mt_rand(4,7); 		$ttw_str = $ttw_str - mt_rand(0,2);		$ttw_dex1 = $ttw_dex1 - mt_rand(0,2);		if ($ttw_dex2 > 0){$ttw_dext = $ttw_dex2 - mt_rand(0,2);}	}
			else if ($forge < 85){ 	$ttw_adds = $ttw_adds + mt_rand(6,9); 		$ttw_str = $ttw_str - mt_rand(0,3);		$ttw_dex1 = $ttw_dex1 - mt_rand(0,3);		if ($ttw_dex2 > 0){$ttw_dext = $ttw_dex2 - mt_rand(0,3);}	}
			else if ($forge < 90){ 	$ttw_adds = $ttw_adds + mt_rand(8,11); 		$ttw_str = $ttw_str - mt_rand(0,4);		$ttw_dex1 = $ttw_dex1 - mt_rand(0,4);		if ($ttw_dex2 > 0){$ttw_dext = $ttw_dex2 - mt_rand(0,4);}	}
			else if ($forge < 95){ 	$ttw_adds = $ttw_adds + mt_rand(10,13); 	$ttw_str = $ttw_str - mt_rand(0,5);		$ttw_dex1 = $ttw_dex1 - mt_rand(0,5);		if ($ttw_dex2 > 0){$ttw_dext = $ttw_dex2 - mt_rand(0,5);}	}
			else if ($forge < 99){	$ttw_adds = $ttw_adds + mt_rand(12,16); 	$ttw_str = $ttw_str - mt_rand(0,6);		$ttw_dex1 = $ttw_dex1 - mt_rand(0,6);		if ($ttw_dex2 > 0){$ttw_dext = $ttw_dex2 - mt_rand(0,6);}	}
			else
			{	$cursing = 1;
				$curs = strtolower($ttw_mystic);
				switch (mt_rand(0,2))
				{
					case 0:$bonus = "cursed " . $curs . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
					case 1:$bonus = "vile " . $curs . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
					case 2:$bonus = "infernal " . $curs . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
				}
			}
		}
		else ////////////////////// THIS MAKES WEAPONS WITH ADDS AND DICE ////////////////////////////////////////////
		{
			if ($forge < 50){ 		$ttw_dice = $ttw_dice + mt_rand(1,2);		$ttw_adds = $ttw_adds + mt_rand(2,4); 		$ttw_str = $ttw_str - mt_rand(0,1);		$ttw_dex1 = $ttw_dex1 - mt_rand(0,1);		if ($ttw_dex2 > 0){$ttw_dext = $ttw_dex2 - mt_rand(0,1);}	}
			else if ($forge < 75){ 	$ttw_dice = $ttw_dice + mt_rand(1,3);		$ttw_adds = $ttw_adds + mt_rand(4,6); 		$ttw_str = $ttw_str - mt_rand(0,2);		$ttw_dex1 = $ttw_dex1 - mt_rand(0,2);		if ($ttw_dex2 > 0){$ttw_dext = $ttw_dex2 - mt_rand(0,2);}	}
			else if ($forge < 85){ 	$ttw_dice = $ttw_dice + mt_rand(2,3);		$ttw_adds = $ttw_adds + mt_rand(6,8); 		$ttw_str = $ttw_str - mt_rand(0,3);		$ttw_dex1 = $ttw_dex1 - mt_rand(0,3);		if ($ttw_dex2 > 0){$ttw_dext = $ttw_dex2 - mt_rand(0,3);}	}
			else if ($forge < 90){ 	$ttw_dice = $ttw_dice + mt_rand(2,4);		$ttw_adds = $ttw_adds + mt_rand(8,10); 		$ttw_str = $ttw_str - mt_rand(0,4);		$ttw_dex1 = $ttw_dex1 - mt_rand(0,4);		if ($ttw_dex2 > 0){$ttw_dext = $ttw_dex2 - mt_rand(0,4);}	}
			else if ($forge < 95){ 	$ttw_dice = $ttw_dice + mt_rand(3,4);		$ttw_adds = $ttw_adds + mt_rand(10,12); 	$ttw_str = $ttw_str - mt_rand(0,5);		$ttw_dex1 = $ttw_dex1 - mt_rand(0,5);		if ($ttw_dex2 > 0){$ttw_dext = $ttw_dex2 - mt_rand(0,5);}	}
			else if ($forge < 99){	$ttw_dice = $ttw_dice + mt_rand(3,5);		$ttw_adds = $ttw_adds + mt_rand(12,14); 	$ttw_str = $ttw_str - mt_rand(0,6);		$ttw_dex1 = $ttw_dex1 - mt_rand(0,6);		if ($ttw_dex2 > 0){$ttw_dext = $ttw_dex2 - mt_rand(0,6);}	}
			else
			{	$cursing = 1;
				$curs = strtolower($ttw_mystic);
				switch (mt_rand(0,2))
				{
					case 0:$bonus = "cursed " . $curs . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
					case 1:$bonus = "vile " . $curs . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
					case 2:$bonus = "infernal " . $curs . " (" . curseType($level,$wearer,equip,$game) . ")";	break;
				}
			}
		}
		if (($cursing != 1) && (mt_rand(1,100) > 90))
		{
			switch (mt_rand(0,14))
			{
				case 0:$bonus = "add " . mt_rand(1,5) . " extra combat dice against " . slayerType('');	break;
				case 1:$bonus = "+" . mt_rand(3,12) . " combat adds when used against " . slayerType('');	break;
				case 2:$bonus = "legendary weapon - doubles the wielder`s combat dice " . mt_rand(2,10) . " times a day";	break;
				case 3:$bonus = "good fortune weapon - wielder gets a +" . mt_rand(1,5) . " to " . abilityTranslate($game,LCK) . "";	break;
				case 4:$bonus = "sun light weapon - can light a " . mt_rand(2,6) . "0 foot area when wielded and the wielder wills it";	break;
				case 5:$bonus = "defender weapon - gives an additional " . mt_rand(5,15) . " to armor hits";	break;
				case 6:$bonus = "haste weapon - wielder gets a +" . mt_rand(1,5) . " to " . abilityTranslate($game,SPD) . "";	break;
				case 7:$bonus = "vampiric weapon - wielder can restore " . mt_rand(1,2) . "d6 of their own " . abilityTranslate($game,CON) . " from the damage dealt with this weapon...but only " . mt_rand(5,20) . " times a day";	break;
				case 8:$bonus = "bloody weapon - any opponent hit with this weapon cannot heal themselves, or regenerate, for " . mt_rand(2,6) . " combat rounds";	break;
				case 9:$bonus = "weapon of chance - the wielder may roll their combat dice over if they do not like the first results, once per combat round...they must accept the second results";	break;
				case 10:$bonus = "magic leech weapon - any opponent hit with this weapon will lose " . mt_rand(3,20) . " of their " . abilityTranslate($game,POW) . "";	break;
				case 11:$bonus = "warmonger weapon - doubles the wielder`s combat adds " . mt_rand(2,10) . " times a day";	break;
				case 12:$bonus = "wizard weapon - any wizard can use this weapon without any penalty...and if their " . abilityTranslate($game,STR) . " allows";	break;
				case 13:$bonus = "fire weapon - this weapon will appear to be on fire when wielded in combat, but will not burn the wielder";	break;
				case 14:$bonus = "singing weapon - has a " . mt_rand(1,5) . " in 6 chance to sing at the start of a battle where it provides an additional " . (mt_rand(1,5)*5) . " ADDS but also causes more wandering monster checks)";	break;
			}
		}

		if ( $tt_easy_items == 1 ) //////////////////////////////// MAGESTYKC SIMPLE WEAPONS ////////////////////////////////////////////////////////////////////////////////
		{
			$owner = manyName();
			if ($smith2 == "hilt")
			{
				if (mt_rand(1,100) > 80){$smith3 = materialType(leather) . " leather";} else {$smith3 = "leather";}
					$decorate = "[the " . $smith1 . " is made of " . materialType(iron) . " with a " . $smith3 . " grip";
				if (mt_rand(1,100) > 50){$etch = $smith1;} else {$etch = $smith2;}
				if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is engraved on the " . $etch;}
				if (mt_rand(1,100) > 80){$decorate = $decorate . "...the " . $etch . " is decorated with " . mt_rand(3,12) . " gems {" . gemChooser() . "}]";}
				else {$decorate = $decorate . "" . $belongs . "]";}
			}
			else if ($smith1 != "")
			{
				if (mt_rand(1,100) > 80){$smith3 = materialType(leather) . " leather";} else {$smith3 = "leather";}
					$decorate = "[the " . $smith1 . " is made of " . materialType(iron) . " and has a " . materialType(handle) . " " . $smith2 . " with a " . $smith3 . " grip";
					if ($pole == 1){$decorate = "[the " . $smith1 . " is made of " . materialType(iron) . " and has a " . materialType(handle) . " " . $smith2;}
				if (mt_rand(1,100) > 50){$etch = $smith1;} else {$etch = $smith2;}
				if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is engraved on the " . $etch;}
				if (mt_rand(1,100) > 80){$decorate = $decorate . "...the " . $etch . " is decorated with " . mt_rand(3,12) . " gems {" . gemChooser() . "}]";}
				else {$decorate = $decorate . "" . $belongs . "]";}
			}
			else if ($bow == 1){ $decorate = "[" . materialType(bow);
				if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is carved on it";}
				$decorate = $decorate . "" . $belongs . "]";
			}
			else if ($bow == 2){ $decorate = "[made of " . materialType(leather) . " hide";
				if (mt_rand(1,100) > 50){$etch = "burned";} else {$etch = "stitched";}
				if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is " . $etch . " on it";}
				if (mt_rand(1,100) > 80){$belongs = $belongs . "...the cradle is decorated with a " . gemChooser();}
				$decorate = $decorate . "" . $belongs . "]";
			}
			else if ($nt_material == "M"){ $decorate = "[made of " . materialType(iron) . "]"; }
			else if ($nt_material == "W"){ $decorate = "[made of " . materialType(wood) . "]"; }

			$item = $item . " " . $decorate;

			if ($bonus != ""){$bonus = "&nbsp[" . $bonus . "]";}

			if ($cursing == 1)
			{
				if ($nt_dex2 > 0){ $nt_dex = $nt_dex1 . "/" . $nt_dex2; } else { $nt_dex = $nt_dex1; }
				if ($nt_range > 0){ $nt_haul = "&nbsp;/&nbsp;RNG:" . $nt_range; } else { $nt_haul = ""; }
				if ($nt_adds > 0){ $nt_roll = $nt_dice . $turm . "+" . $nt_adds; } else if ($nt_adds < 0){ $nt_roll = $nt_dice . $turm . $nt_adds; } else { $nt_roll = $nt_dice . $turm; }

				$item = $item . " (cursed " . strtolower($ttw_type) . "&nbsp;/&nbsp;" . $term . ":" . $nt_roll . "&nbsp;/&nbsp;STR:" . $nt_str . "&nbsp;/&nbsp;DEX:" . $nt_dex . "&nbsp;/&nbsp;HND:" . $nt_hands . $nt_haul . ")" . $bonus;
			}
			else
			{
				if ($ttw_str < 1){$ttw_str = 1;}
				if ($ttw_dex1 < 1){$ttw_dex1 = 1;}
				if ($ttw_dex2 > 0){ $ttw_dex = $ttw_dex1 . "/" . $ttw_dex2; } else { $ttw_dex = $ttw_dex1; }
				if ($ttw_range > 0){ $ttw_haul = "&nbsp;/&nbsp;RNG:" . $ttw_range; } else { $ttw_haul = ""; }
				if ($ttw_adds > 0){ $ttw_roll = $ttw_dice . $turm . "+" . $ttw_adds; } else if ($ttw_adds < 0){ $ttw_roll = $ttw_dice . $turm . $ttw_adds; } else { $ttw_roll = $ttw_dice . $turm; }

				$item = $item . " (magical " . strtolower($ttw_type) . "&nbsp;/&nbsp;" . $term . ":" . $ttw_roll . "&nbsp;/&nbsp;STR:" . $ttw_str . "&nbsp;/&nbsp;DEX:" . $ttw_dex . "&nbsp;/&nbsp;HND:" . $nt_hands . $ttw_haul . ")" . $bonus;
			}

			if (mt_rand(1,100) > 30){$item = "<u>" . artifactNaming($ttw_mystic,'',$cursing,0) . "</u> - " . $item;}
		}
		else ////////////////////////////////////////////////////// T&T NORMAL WEAPONS //////////////////////////////////////////////////////////////////////////////////////
		{
			if (mt_rand(1,100) > 80)
			{
				switch (mt_rand(0,20))
				{
					case 0: $material = "silvery ";			break;
					case 1: $material = "golden ";			break;
					case 2: $material = "ancient ";			break;
					case 3: $material = "fine-crafted ";	break;
					case 4: $material = "pristine ";		break;
					case 5: $material = "old ";				break;
				}
			}
			if ($ttw_str < 1){$ttw_str = 1;}
				if ($ttw_name == "Athame"){$ttw_str = 0;}
			if ($ttw_dex1 < 1){$ttw_dex1 = 1;}
			if (($ttw_dex2 > 0) && ($ttw_dext < 1)){$ttw_dext = 1; $ttw_dex = $ttw_dex1 . "/" . $ttw_dext;} else {$ttw_dex = $ttw_dex1;}

			if ($bonus != ""){$bonus = "&nbsp;--&nbsp[" . $bonus . "]";}

			$ttw_bonus = $term . ":" . $ttw_dice . $turm . "+" . $ttw_adds . "&nbsp;--&nbspSTR:" . $ttw_str . "&nbsp;--&nbspDEX:" . $ttw_dex . $bonus;

			$item = $material . strtolower($ttw_name) . " [magical " . strtolower($ttw_type) . "] (" . $ttw_bonus . ")";

			if (mt_rand(1,100) > 30){$item = "<u>" . artifactNaming($ttw_mystic,'',$cursing,0) . "</u> - " . $item;}
		}
	} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else // MAGIC RELICS
	{
		if ($size == 1){$sz1 = 0; $sz2 = 52; $sz3 = 1;} else if ($size == 2){$sz1 = 53; $sz2 = 73; $sz3 = 4;} else {$sz1 = 74; $sz2 = 95; $sz3 = 6;}

		/// MAYBE A CURSED ITEM ???? ///
		if (mt_rand(1,100) > 97){$curse_me = 1;} else {$curse_me = 0;}

		$written = "shown somewhere on it";	if (mt_rand(1,100) > 50){$written = "learned by identifying the item";}

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		switch (mt_rand($sz1,$sz2))
		{
			case 0: $use_other = 2; break;
			case 1: $use_other = 2; break;
			case 2: $use_other = 2; break;
			case 3: $use_other = 3; break;
			case 4: $use_other = 3; break;
			case 5: $use_other = 3; break;
			case 6: $rock = rockType();		$m_misc = $rock . "___{" . rockPower($rock,$curse_me,$level,$game) . "}";	break;
			case 7: $rock = rockType();		$m_misc = $rock . "___{" . rockPower($rock,$curse_me,$level,$game) . "}";	break;
			case 8: $rock = rockType();		$m_misc = $rock . "___{" . rockPower($rock,$curse_me,$level,$game) . "}";	break;
			case 9: $m_misc = tomeType() . "___{" . tomePower(100,$curse_me,$level,$cut,$game) . "}";	$use_other = 100;	break;
			case 10:$m_misc = tomeType() . "___{" . tomePower(100,$curse_me,$level,$cut,$game) . "}";	$use_other = 100;	break;
			case 11:
					if ($game == "Tunnels & Trolls 5th Edition"){$m_misc = "wizardry book___{this " . $book_spell . " spell book is bound in " . leatherColor() . " " . materialType(leather) . " skin with " . designColor() . " colored symbols of a " . designType(0) . " on the front and a " . designType(0) . " on the back...it gives the owner a +" . mt_rand(2,10) . " to " . abilityTranslate($game,INT) . " for spell casting only}";}
					else {$m_misc = "wizardry book___{this " . $book_spell . " spell book is bound in " . leatherColor() . " " . materialType(leather) . " skin with " . designColor() . " colored symbols of a " . designType(0) . " on the front and a " . designType(0) . " on the back...it allows the owner to add an extra die for " . abilityTranslate($game,INT) . " SR's when casting spells}";}
				break;
			case 12:$m_misc = "skeleton keys___{these " . mt_rand(2,6) . " keys will unlock any lock, each one vanishing afterwards}"; break;
			case 13:$m_misc = materialType(iron) . " goblet___{any liquid put in this cup will turn into pure water}"; break;
			case 14:$m_misc = materialType(iron) . " hand mirror___{can make the viewer`s face change to another as long as it is the same gender and race}"; break;
			case 15:$m_misc = "tobacco pipe of haze___{requires tobacco...when smoked, it will create a dense " . fogColor() . " fog in front of the one smoking the pipe}"; break;
			case 16:$m_misc = materialType(iron) . " bell of alarming___{this small bell will ring whenever a hostile creature comes within 50 feet of the owner}"; break;
			case 17:$m_misc = materialType(iron) . " fork___{this dinner fork will turn into a trident {" . $term . ":6" . $turm . "+6} when the word `" . castingName() . "` is spoken (which is " . $written . ")...and back to a fork when spoken again}"; break;
			case 18:$m_misc = "ointment___{this small jar has " . mt_rand(2,7) . " uses and will cure poison and disease...along with healing " . mt_rand(6,13) . " " . abilityTranslate($game,CON) . "}"; break;
			case 19:$m_misc = "paint brush___{once a day this brush can paint a doorway on a wall that is no more than 10 feet thick...but it does require a pint of paint}"; break;
			case 20:$m_misc = "candle___{when this " . candleColor(0) . " candle is burning, " . candleMagic($game,$level) . "}"; break;
			case 21:$m_misc = bottlePicker() . "___{will refill itself with clean water when the sun rises}"; break;
			case 22:$m_misc = bottlePicker() . "___{contains an endless supply of air that one may breathe from}"; break;
			case 23:$m_misc = bottlePicker() . "___{contains an endless supply of air that one may breathe from}"; break;
			case 24:$m_misc = "monocle___{allows the wearer to charm someone by looking at them unless they make an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . "...it can be used " . mt_rand(2,6) . " times per day}"; break;
			case 25:$m_misc = "monocle___{allows the wearer the ability to see how hurt others are around them...it can be used " . mt_rand(2,6) . " times per day}"; break;
			case 26:$m_misc = "monocle___{allows the wearer to turn someone to stone by looking at them unless they make an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,SPD) . " or " . abilityTranslate($game,LCK) . "...it can be used " . mt_rand(2,6) . " times per day}"; break;
			case 27:$m_misc = "monocle___{allows the wearer to see secret compartments and doors}"; break;
			case 28:$m_misc = bottlePicker() . "___{there is magical runes on this that show the word `" . castingName() . "` which needs an " . abilityTranslate($game,INT) . " greater than " . ($level + 10) . "...when it is open, and the word spoken, any creature it is pointed at will get sucked into the bottle an imprisoned (where only one at a time may exist in the bottle) until the owner releases them}"; break;
			case 29:$m_misc = bottlePicker() . "___{contains a genie that will grant 1 reasonable wish...where the item then vanishes}"; break;
			case 30:$m_misc = bottlePicker() . "___{when opened, this will create a dense " . fogColor() . " fog in the area...which will last for about " . mt_rand(4,8) . " turns}"; break;
			case 31:$m_misc = "deck of playing cards___{will surround, whirl, and distract an enemy when thrown at them}"; break;
			case 32:$m_misc = "chess piece___{this looks like a rook piece but when the word `" . castingName() . "` is spoken (which is " . $written . ") a stone tower appears that is 30 feet high and 20 feet wide...if it is empty, the command word will turn it back into a rook piece}"; break;
			case 33:$m_misc = "stones___{these " . mt_rand(2,10) . " sling stones that will allow any sling-type weapon to have " . mt_rand(1,4) . " additional dice for combat rolls}"; break;
			case 34:$m_misc = "glue___{this " . bottlePicker() . " of glue has " . mt_rand(2,8) . " uses and cause anything to stick to anything else...permanently}"; break;
			case 35:
					if ($game == "Tunnels & Trolls 5th Edition"){$m_misc = materialType(iron) . " holy symbol___{while held, undead can only use half of their dice and adds in combat}";}
					else {$m_misc = materialType(iron) . " holy symbol___{while held, undead can only use half of their adds in combat and they cannot do spite damage}";}
				break;
			case 36:$m_misc = "rings___{these 8 inch " . materialType(iron) . " rings are found in pairs that are magically linked together...anyone putting their arm throw one ring will have it come through the other ring instead}"; break;
			case 37:$m_misc = "key___{this " . materialType(iron) . " key can be used once per day where it is pushed into a solid wall and turned...revealing a door that leads to where the key was tuned...tuning the key requires one to hold the key in a particular spot and saying the word `" . castingName() . "` which is engraved on the key}"; break;
			case 38:$m_misc = "scrolls___{there are " . mt_rand(2,6) . " scrolls bunched together...when a scroll is written on, it will appear on the other scrolls for almost a minute before vanishing}"; break;
			case 39:$m_misc = "lense___{this " . beamColor() . " lense can be used to identify an item if one looks through it at the item}"; break;
			case 40:$m_misc = "orb___{this " . beamColor() . " glass orb can fit in the hand and will drain the " . abilityTranslate($game,POW) . " from an opponent at the rate of " . mt_rand(5,20) . " " . abilityTranslate($game,POW) . " per combat round...but it only has " . mt_rand(10,50) . " charges and it uses a charge for each combat round used}"; break;
			case 41:$m_misc = "sage book___{this mystical book is bound in " . leatherColor() . " " . materialType(leather) . " skin with " . designColor() . " colored symbols of a " . designType(0) . " on the front and a " . designType(0) . " on the back...any item placed on a blank page [there are only " . mt_rand(5,25) . " blank pages] will have magical words appear on that page that identifies the item}";	break;
			case 42:$m_misc = "coin___{" . rareCoins(1,1) . "...where it can be flipped in a heads or tails fashion to help answer " . mt_rand(2,6) . " questions a day}"; break;
			case 43:$m_misc = "apple___{this silver apple can be bitten into a total of 12 times before it is useless...where each bite restores " . mt_rand(2,12) . " " . abilityTranslate($game,CON) . "}"; break;
			case 44:$m_misc = "stone___{this small stone will begin to scream whenever one approaches that will do the owner harm...but it has to be activated and deactivated by speaking the word `" . castingName() . "`, which can be learned by identifying the item}"; break;
			case 45:$m_misc = "throwing knife___{this " . materialType(iron) . " knife (" . $term . ":" . mt_rand(2,3) . $turm . "+" . mt_rand(3,5) . ") and when it is thrown, it will always hit the intended target}"; break;
			case 46:$m_misc = "biting skull___{this skull will bite down with unbreakable magical force when the word `" . castingName() . "` is spoken, which can be learned by identifying the item...speaking the same word will cause the skull to open the mouth}"; break;
			case 47:$m_misc = "stick___{this " . woodenType() . " stick is about " . mt_rand(2,4) . " feet long and will safely set off a nearby trap when tapped on the floor or ground, but only " . mt_rand(2,6) . " times a day}"; break;
			case 48:$m_misc = "stick___{this " . woodenType() . " stick is about " . mt_rand(2,4) . " feet long and will detect any fresh water source that is within " . (mt_rand(1,9)*100) . " feet";	break;
			case 49:$m_misc = "veil___{when this " . candleColor(0) . " veil is worn, anyone looking through it is immune to gaze attacks";	break;
			case 50:$m_misc = "candle___{when this " . candleColor(0) . " candle is lit, " . candleMagic($game,$level) . "}"; break;
			case 51:$m_misc = "tankard___{this " . materialType(iron) . " tankard allows one to drink any amount of alcohol from it without any of the effects}"; break;
			case 52:$m_misc = "quill___{this " . birdType() . " feathered quill will magically write the spoken words of the owner, as long as it has paper and ink, for " . mt_rand(2,6) . " hours per day}"; break;
			/////////////////////////////////
			case 53:$m_misc = "arrow___{when this arrow is fired straight into the sky, it will travel up to " . mt_rand(2,20) . "0 miles to reach the recipient of whoever an attached message is for}"; break;
			case 54:$m_misc = "torch___{when this " . materialType(iron) . " torch is lit, it will illuminate an area of " . mt_rand(1,3) . "0 feet with a " . beamColor(0) . " light...but for only " . mt_rand(2,4) . " hours per day, where no undead or shadowy creatures may enter}"; break;
			case 55:$m_misc = "lantern___{anyone holding the lantern can see the illumination...but others cannot}"; break;
			case 56:$m_misc = "nourishing iron pot___{will magically fill itself with warm stew when the word `" . castingName() . "` is spoken, which is " . $written . "}"; break;
			case 57:$m_misc = "torch___{if the word `" . castingName() . "` is spoken (which is " . $written . "), this torch will light and follow the owner by floating nearby...but only for about " . mt_rand(3,12) . " hours a day}"; break;
			case 58:$m_misc = "lamp oil___{this lantern oil will cause the lamp`s light to hurt undead within it`s glow for " . mt_rand(1,3) . "d6 damage per round}"; break;
			case 59:$m_misc = materialType(iron) . " hand mirror___{when one sees their reflection, and the word spoken by the wielder, any creature looking at their reflection at will get sucked into the mirror (where only one at a time may exist in the mirror) and imprisoned until the owner breaks it}"; break;
			case 60:$m_misc = "crystal ball___{allows someone to see what is happening " . (mt_rand(1,20)*5) . " miles away and only if they are somewhat familiar with the area they are looking}"; break;
			case 61:$m_misc = "evil skull___{holding it will cause any undead to ignore the wielder}"; break;
			case 62:$m_misc = "shackles___{anyone bound in these cannot escape by even magical means...unless the owner speaks the word `" . castingName() . "`, which is " . $written . "}"; break;
			case 63:$m_misc = "talking skull___{if the owner asks the skull of nearby " . searchList() . ", it will speak to confirm or deny as such}"; break;
			case 64:$m_misc = "chains___{when thrown at an enemy, they will chain them up unless they can make an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . "...if the word `" . castingName() . "` is spoken (which is " . $written . "), then the chains release the prisoner}"; break;
			case 65:$m_misc = "lantern___{any invisible object or creature is revealed in the light of this}"; break;
			case 66:$m_misc = "ship in a bottle___{when the word `" . castingName() . "` is spoken (which is " . $written . ") this turns into a ship complete...if it is empty, the command word will turn it back into a ship in the bottle}"; break;
			case 67:$m_misc = "driftwood___{when the word `" . castingName() . "` is spoken (which is " . $written . ") this turns into a raft that can hold about 4 humanoids...the command word will turn it back into driftwood}"; break;
			case 68:$m_misc = "net___{when thrown at an enemy, they will be captured unless they can make an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . "...if the word `" . castingName() . "` is spoken (which is " . $written . "), then the net release the prisoner}"; break;
			case 69:$m_misc = "paint___{this pint of " . candleColor(0) . " paint can be used to paint an object that comes to be real and useable...such as swords, boxes, armor, food...but nothing of high value}"; break;
			case 70:$m_misc = materialType(iron) . " hand mirror___{when the mirror is spoken into, it will answer one question per day}"; break;
			case 71:$m_misc = "vortex___{this is a round black cloth that is 6 feet wide when laid out...it creates a hole that is 10 feet deep in which anyone that falls in must get out before the cloth is picked back up or vanish forever}"; break;
			case 72:if (mt_rand(1,100) > 50){$toy = "teddy bear";} else {$toy = "doll";} $m_misc = $toy . "___{this " . $toy . " can come to life and serve the owner for " . mt_rand(2,12) . " hours per week if the word `" . castingName() . "` is spoken (which is " . $written . ")...it will not fight but do other various chores"; break;
			case 73:$m_misc = "tablecloth___{once a day, when this " . candleColor(0) . " tablecloth is put on a table, it will unfold with a feast for up to " . mt_rand(4,8) . " people}"; break;
			/////////////////////////////////
			case 74:$m_misc = "pickaxe___{this pickaxe will dig humanoid sized tunnels up to " . mt_rand(1,10) . "0 feet per day at the rate of 1 foot per minute}"; break;
			case 75:$m_misc = "shovel___{anyone who digs with the shovel will not tire from the effort}"; break;
			case 76:$m_misc = "glass sword___{this two-handed sword weighs very little and can be used by anyone...but once it hits an opponent it will do (" . $term . ":" . mt_rand(9,12) . $turm . "+" . mt_rand(10,30) . ") and then shatter, becoming useless}"; break;
			case 77:$m_misc = "broom___{this broom can fly for about " . mt_rand(5,10) . " hours per day carrying one medium humanoid or two small ones...and only if the word `" . castingName() . "` is spoken, which is " . $written . "}"; break;
			case 78:$m_misc = "statue___{" . idolMaker(1,2,0,50,$game,$extra) . "...can come to life and serve the owner for " . mt_rand(2,12) . " hours per week if the word `" . castingName() . "` is spoken (which is " . $written . ")...it will not fight but do other various chores}"; break;
			case 79:$m_misc = "wooden chest___{will float and follow the owner when the word `" . castingName() . "` is spoken, which is " . $written . "}"; break;
			case 80:$m_misc = "mounted " . headMount() . " head___{will talk to the owner and tell of everything that went on in the area while they were away}"; break;
			case 81:$m_misc = "brazier___{if the word `" . castingName() . "` is spoken (which is " . $written . "), this brazier will light and follow the owner...walking on it`s legs...but only for about " . mt_rand(3,12) . " hours a day}"; break;
			case 82:$m_misc = "blanket___{will magically warm whoever is wrapped in it...no matter the outside temperature}"; break;
			case 83:$m_misc = "bedroll___{this bedroll can levitate about " . mt_rand(1,4) . "0 feet above the ground for about 8 hours...and only if the word `" . castingName() . "` is spoken, which is " . $written . "}"; break;
			case 84:$m_misc = "carpet___{this is " . carpetMaker(0) . " that can fly 240 feet per round or about 50 miles a day}"; break;
			case 85:$m_misc = "saddle___{any steed this is used in can travel twice as fast for twice as long}"; break;
			case 86:$m_misc = "saddle___{any steed this is used on will run or walk about 6 inches off the ground}"; break;
			case 87:$m_misc = "rope___{when the word `" . castingName() . "` is spoken (which is " . $written . ") then this " . mt_rand(5,20) . "0 foot rope will ascend so it can be climbed up}"; break;
			case 88:$m_misc = "rope___{when used as a lasso, this rope will wrap around a target unless they make an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . "...if the word `" . castingName() . "` is spoken (which is " . $written . "), then the rope release the target}"; break;
			case 89:$m_misc = "scabbard___{any edged weapon pulled from this scabbard will give " . mt_rand(1,4) . " additional combat dice but for only " . mt_rand(2,5) . " combats a day}"; break;
			case 90:$m_misc = "tent___{this " . candleColor(0) . " tent looks like it can only accommodate one person but when you look inside, it really has space for " . mt_rand(4,12) . " people...if the word `" . castingName() . "` (which is " . $written . ") is spoken by someone inside, it will vanish from this plane of existence until the word is spoken again...allowing for safe rest}"; break;
			case 91:$use_other = 1; break;
			case 92:$use_other = 1; break;
			case 93:$use_other = 1; break;
			case 94:$m_misc = "log___{looks like an ordinary log about 1 foot long and 4 inches thick with the word `" . castingName() . "` carved on the side...when the word is spoken nearby it will light up and burn for about " . mt_rand(2,10) . " hours or unless the word is spoken again...the log will not burn up nor feel hot when extinguished}"; break;
			case 95:$m_misc = "axe___{looks like an ordinary hatchet but cut down a 3 foot thick tree in one swing...but only has " . mt_rand(5,20) . " charges where a tree exhausts such charges}"; break;
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ($use_other == 1)
		{
		    $curse_me = 0;
		    switch (mt_rand(0,16))
		    {
			case 1: $m_misc = bardType() . "___{will float, play music, and follow the owner when tossed into the air...giving the group +" . $plus . " for combat}"; break;
			case 2: $m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will produce a sound where no magic words can be spoken by anyone for " . mt_rand(2,5) . " rounds and only " . mt_rand(2,6) . " times a day}"; break;
			case 3: $m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will produce a sound that will open anything that does open...even if locked, but only " . mt_rand(2,4) . " times a day}"; break;
			case 4: $m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will produce a sound that causes fear in those 20 to 120 feet away, but only once a day}"; break;
			case 5: $m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will produce a sound that scares any enemies within 30 feet and if they have a less total MR than the group, but only twice a day}"; break;
			case 6: $m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will produce a sound that causes 1d6 damage to all those that can hear it}"; break;
			case 7: $m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will produce a sound that can be directed as if it was coming from somewhere else up to " . mt_rand(6,18) . "0 feet away}"; break;
			case 8: $m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will produce a sound that will stop " . mt_rand(2,10) . " enemies from fighting for " . mt_rand(2,5) . " rounds, but only twice a day}"; break;
			case 9: $m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will produce a sound that will spring traps " . mt_rand(2,10) . "0 feet away from the musician}"; break;
			case 10:$m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will produce a sound that will cause invisible objects to briefly appear within " . mt_rand(2,10) . "0 feet of the musician}"; break;
			case 11:$m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will produce a sound that will give the group " . mt_rand(1,2) . " additional dice for any SR's they need to make}"; break;
			case 12:$m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will produce a sound that will calm waters, scare away sea life, or summon medium sized sea creatures to aid the musician}"; break;
			case 13:
						$my_mr_is = $level * 10;
						$my_dc_is = (FLOOR($my_mr_is/10)+1) . "&nbsp;+&nbsp;" . (CEIL($my_mr_is/2));
					$m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], the music will call forth " . mt_rand(2,10) . " mystical warriors [EACH&nbsp;HAVE...MR:" . $my_mr_is . "&nbsp;/&nbsp;DICE:" . $my_dc_is . "] to aid in the current battle...where they then vanish afterwards, and only once per " . timesMaker() . "}";
				break;
			case 14:$m_misc = bardType() . "___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will produce a sound that summons up to " . mt_rand(4,10) . "0 rats if in the area where the musician can then control them as long as they continue playing}"; break;
			case 15:$m_misc = "horn___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will create a dense " . fogColor() . " fog in front of the musician...which will last for about " . mt_rand(4,8) . " turns}"; break;
			case 16:$m_misc = "horn___{when played [by making a musical " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,DEX) . "], this will not produce sound but make a large gusting wind that will extinguish fires and knock smaller creatures off their feet...while holding medium sized creatures at bay momentarily...and only once per day}"; break;
		    }
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ($use_other == 2)
		{
		    switch (mt_rand(0,3))
		    {
				case 0: $m_dustc = "pouch";		break;
				case 1: $m_dustc = "jar";		break;
				case 2: $m_dustc = "sack";		break;
				case 3: $m_dustc = "bottle";	break;
		    }
		    switch (mt_rand(0,2))
		    {
				case 0: $m_dustt = "dust";		break;
				case 1: $m_dustt = "powder";	break;
				case 2: $m_dustt = "sand";		break;
		    }
		    switch (mt_rand(0,7))
		    {
				case 0: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be sprinkled on anything...where the " . $m_dustt . " then becomes invisible. Anyone touching it will turn bright " . candleColor(0) . " for " . mt_rand(2,10) . " days}"; break;
				case 1: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown in the area to reveal invisible things within a 10 foot radius and lasts 5 minutes}"; break;
				case 2: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown onto anything of medium size or smaller to make them invisible for " . mt_rand(2,6) . " turns}"; break;
				case 3: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown onto any slime creature where it causes it to wither away}"; break;
				case 4: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown into water to absorb about 100 gallons...or it can slay a water elemental}"; break;
				case 5: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown onto anything of medium size or smaller to make them appear as something else the thrower thinks of for " . mt_rand(3,12) . "0 minutes}"; break;
				case 6: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown into an area where it will give the appearance of it being undisturbed for years...but only in 100 square foot area}"; break;
				case 7: $curse_me = 0; $m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be used to create a summoning circle to call forth an elemental [" . elementalType($game) . "] that will serve the summoner...but must spend " . mt_rand(10,30) . " " . abilityTranslate($game,POW) . " to use this " . $m_dustt . "}"; break;
			}
		    if ($curse_me > 0){$m_misc = $m_dustt . "___{this small " . $m_dustc . " of " . candleColor(0) . " " . $m_dustt . " can be thrown into the air where everyone within 20 feet will be incapacitated by choking and sneezing for " . mt_rand(5,20) . " rounds...everyone must make an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . " or suffer " . mt_rand(1,2) . "d6 damage...this same SR must be made each round they are in the dust}";}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ($use_other == 3)
		{
			switch (mt_rand(0,13))
			{
				case 0: $bag_a = "bat"; break;
				case 1: $bag_a = "rat"; break;
				case 2: $bag_a = "cat"; break;
				case 3: $bag_a = "weasel"; break;
				case 4: $bag_a = "badger"; break;
				case 5: $bag_a = "wolverine"; break;
				case 6: $bag_a = "wolf"; break;
				case 7: $bag_a = "boar"; break;
				case 8: $bag_a = "black bear"; break;
				case 9: $bag_a = "brown bear"; break;
				case 10:$bag_a = "lion"; break;
				case 11:$bag_a = "horse"; break;
				case 12:$bag_a = "tiger"; break;
				case 13:$bag_a = "rhinoceros"; break;
			}
		    switch (mt_rand(0,8))
		    {
				case 0: $curse_me = 0; $m_misc = bagCreator() . "___{can hold up to 5 items of any size that can fit in the bag opening...where the items and bag feel weightless...and the bag does not grow in size}"; break;
				case 1: $curse_me = 0; $m_misc = bagCreator() . "___{can hold up to 10 items of any size that can fit in the bag opening...where the items and bag feel weightless...and the bag does not grow in size}"; break;
				case 2: $curse_me = 0; $m_misc = bagCreator() . "___{can hold up to 15 items of any size that can fit in the bag opening...where the items and bag feel weightless...and the bag does not grow in size}"; break;
				case 3: $curse_me = 0; $m_misc = bagCreator() . "___{can hold up to 20 items of any size that can fit in the bag opening...where the items and bag feel weightless...and the bag does not grow in size}"; break;
				case 4: $curse_me = 0; $m_misc = bagCreator() . "___{this bag can be used " . mt_rand(2,5) . " times per week...where the owner reaches in and pulls out a ball of fur that is then thrown to the ground where a " . $bag_a . " will appear and serve the owner for about 10 minutes and then vanish}"; break;
				case 5: $curse_me = 0; $m_misc = bagCreator() . "___{this bag can be used " . mt_rand(2,5) . " times per week...where the owner reaches in and pulls out a ball of fur that is then thrown to the ground where a " . $bag_a . " will appear and serve the owner for about 10 minutes and then vanish}"; break;
				case 6: $curse_me = 0; $m_misc = bagCreator() . "___{this contains " . mt_rand(3,15) . " " . coinMaker($game) . "...whenever the sun rises, anything in the bag will vanish and that same number of coins will reappear}"; break;
				case 7: $curse_me = 0; $m_misc = bagCreator() . "___{this contains " . mt_rand(5,15) . " " . candleColor(0) . " beans...when all of them are thrown on the ground or floor, they will sink in and sprout a giant vine about " . mt_rand(1,10) . " feet wide and that will grow until it reaches the surface where it is able to get sun...which the vine can then be climbed on}"; break;
				case 8: $curse_me = 0; $m_misc = bagCreator() . "___{this contains " . mt_rand(5,15) . " " . candleColor(0) . " beans...when all of them are thrown on the sun lit ground, they will sink in and sprout a giant vine about " . mt_rand(1,10) . " feet wide and that will grow until it reaches the cloud of a storm giant`s castle...which the vine can then be climbed on}"; break;
			}
		    if ($curse_me > 0)
		    {
				switch (mt_rand(0,1))
				{
					case 0: $m_misc = bagCreator() . "___{whoever puts their hand in will be swallowed up if they fail an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . "...if trapped they can only be freed with curse removing magic}"; break;
					case 1: $m_misc = bagCreator() . "___{if coins are put into it, they turn to lead...if gems are put in it, they turn to common stones}"; break;
				}
		    }
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (mt_rand(1,2) == 2)
		{
			switch (mt_rand(0,$sz3))
			{
				case 0: $glove = gloveType();		$m_misc = $glove . "___{" . glovePower($glove,$curse_me,$level,$game) . "}";	break;
				case 1: $amulet = amuletType();	$m_misc = $amulet . "___{" . amuletPower($amulet,$curse_me,$level,$game) . "}";		break;
				case 2: $m_misc = "belt___{" . beltPower($curse_me,$level,$game) . "}"; 											break;
				case 3: $m_misc = "cloak___{" . cloakPower($curse_me,$level,$game) . "}";											break;
				case 4: $m_misc = "robe___{" . robePower($curse_me,$level,$game) . "}";												break;
				case 5: $m_misc = "boots___{" . bootPower($curse_me,$level,$game) . "}"; 											break;
				case 6: $helm = helmType();	$m_misc = $helm . "___{" . helmPower($helm,$curse_me,$level,$game) . "}";				break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$item = $m_misc;

		if ($item == ""){$safety = 1;}

		if ($use_other > 0){} else {$curse_me = 0;}$rock = rockType();

		$itemm = explode("___", $item);
		$item = ucwords($itemm[0]);		$item = str_replace(" Of ", " of ", $item);	$item = str_replace(" And ", " and ", $item);	$item = str_replace(" The ", " the ", $item);
		$item = artifactNaming($item,'',$curse_me,2) . " " . $itemm[1];

		if ($safety > 0){$item = makeMagicItem($level,$size,$varb,$game,$extra,$cut);} // TRY AGAIN IF IT COMES UP WITH NOTHING //
	}

	$item = ucfirst($item);
	return $item;
}

}

?>