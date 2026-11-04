<?php

function OsricMagicItem($xitem,$xlevel,$xclass,$xcursed,$xammo)
{
	// LEVEL NEEDED FOR SOME FUNCTIONS
	if ($xlevel > 0){} else {$xlevel = mt_rand(1,20);}

while ($runme != 1) :

	// CHOOSE A CATEGORY
	$category = mt_rand(1,20);
	if ($category > 18){$magic_item = "sword";}
	else if ($category > 15){$magic_item = "scroll";}
	else if ($category > 14){$magic_item = "wand";}
	else if ($category > 13){$magic_item = "ring";}
	else if ($category > 9){$magic_item = "potion";}
	else if ($category > 6){$magic_item = "weapon";}
	else if ($category > 3){$magic_item = "magic";}
	else {$magic_item = "armor";}
	if ($xitem != ""){$magic_item = $xitem;}

	$wcharges = 100 - mt_rand(0,19);
	$rcharges = 50 - mt_rand(0,9);
	$scharges = 25 - mt_rand(0,5);
	$charges = mt_rand(5,25);

	$allowed = "ALL";

	// DO ANY AMMO IF NEEDED //
	if ($xammo > 0)
	{
		$ammo_sling = "sling stones (" . mt_rand(10,30) . " ea), ";
		$ammo_bow = "crossbow bolts (" . mt_rand(10,30) . " ea), ";
		$ammo_crossbow = "arrows (" . mt_rand(10,30) . " ea), ";
	}

	if (($magic_item == "armor") || ($magic_item == "shield") || ($magic_item == "suit")) ////////////////////////////////////////////
	{
		$category = mt_rand(1,20); if ($magic_item == "shield"){$category = 0;} else if ($magic_item == "suit"){$category = mt_rand(2,20);}
		$xcurse = "wearer";
		if ($category > 15){$item = "banded mail armor"; $allowed = "C_F_P_R"; $armor_class = 6;}
		else if ($category > 14){$item = "chain mail armor"; $armor_class = 5; if (mt_rand(1,100) >= 90){$item = "elfin chain mail armor"; } $allowed = "C_F_P_R";}
		else if ($category > 12){$item = "leather armor"; $armor_class = 2; $allowed = "A_C_F_P_R_T";}
		else if ($category > 10){$item = "plate mail armor"; $armor_class = 7; $allowed = "C_F_P_R";}
		else if ($category > 9){$item = "ring mail armor"; $armor_class = 3; $allowed = "C_F_P_R";}
		else if ($category > 6){$item = "splint mail armor"; $armor_class = 6; $allowed = "C_F_P_R";}
		else if ($category > 4){$item = "scale mail armor"; $armor_class = 4; $allowed = "C_F_P_R";}
		else if ($category > 1){$item = "studded leather armor"; $armor_class = 3; $allowed = "A_C_D_F_P_R_T";}
		else {$item = "shield"; $xcurse = "wielder"; $armor_class = 1; $allowed = "A_C_F_P_R"; if (($xclass == "Druid") || (mt_rand(1,3) == 1)){$item = "wooden shield"; $allowed = "A_C_D_F_P_R";}}

		$category = mt_rand(1,20);
		if ($category > 18)
		{
			if ($item == "shield"){$item = "large shield of missile deflection +1"; $allowed = "A_C_F_P_R";}
			else {$item = "plate mail armor of ethereality"; $allowed = "C_F_P_R";}
		}
		else if ($category > 17)
		{
			if ($xcursed > 0){$item = $item . " +1"; }
			else if (mt_rand(1,3) > 1){$item = $item . " (cursed: " . curseType($xlevel,$xcurse,equip,OSRIC) . ")";}
			else if ($item == "shield"){$item = "shield of missile attraction -1"; $allowed = "A_C_F_P_R"; if (($xclass == "Druid") || (mt_rand(1,3) == 1)){$item = "wooden shield of missile attraction -1"; $allowed = "A_C_D_F_P_R";}}
			else
			{
				switch (mt_rand(0,2))
				{
					case 0:	$item = "plate mail armor of arrow attraction"; $allowed = "C_F_P_R";	break;
					case 1:	$item = "plate mail armor of rage"; 			$allowed = "C_F_P_R";	break;
					case 2: $item = "plate mail armor of vulnerability"; 	$allowed = "C_F_P_R";	break;
				}
			}
		}
		else if ($category > 16){if (mt_rand(1,100) > 65){$item = $item . " +5"; } else {$item = $item . " +4"; } }
		else if ($category > 15){$item = $item . " +3"; }
		else if ($category > 10){$item = $item . " +2"; }
		else {$item = $item . " +1"; }
	}
	else if (($magic_item == "weapon") || ($magic_item == "bow") || ($magic_item == "club")) //////////////////////////////////////
	{
		switch (mt_rand(0,3))
		{
			case 0:	$bow = "(long, composite)";		break;
			case 1:	$bow = "(short, composite)";	break;
			case 2: $bow = "(short)";				break;
			case 3: $bow = "(short)";				break;
		}
		switch (mt_rand(0,1))
		{
			case 0:	$cbow = "(heavy)";	break;
			case 1:	$cbow = "(light)";	break;
		}
		$category = mt_rand(1,20);	if ($magic_item == "bow"){$category = mt_rand(0,6);} else if ($magic_item == "club"){$category = mt_rand(5,19);}
		$xcurse = "wielder";
		if ($category > 19){$item = "bolt [" . mt_rand(1,5) . "ea]"; $allowed = "A_F_P_R"; if (mt_rand(1,2) == 1){$item = "arrow [" . mt_rand(1,5) . "ea]"; $allowed = "A_F_P_R";}}
		else if ($category > 18){$item = "spear"; $allowed = "A_D_F_P_R";}
		else if ($category > 17){$item = "scimitar"; $allowed = "A_D_F_P_R_T";}
		else if ($category > 16){$varw = mt_rand(1,3); if ($varw == 1){$item = "military pick";} else if ($varw == 2){$item = "morning star";} else {$item = "pole arm";} $allowed = "A_F_P_R";}
		else if ($category > 14){$item = "mace"; $allowed = "A_C_F_P_R";}
		else if ($category > 13){$item = "javelin"; $allowed = "A_F_P_R";}
		else if ($category > 12){$item = "hammer"; $allowed = "A_C_D_F_P_R";}
		else if ($category > 11){$item = "flail"; $allowed = "A_C_F_P_R";}
		else if ($category > 7){$item = "axe"; $allowed = "A_F_P_R";}
		else if ($category > 6){$item = "trident"; $allowed = "A_F_P_R";}
		else if ($category > 4){$item = "dagger"; $allowed = "A_D_F_I_M_P_R_T";}
		else
		{
			$item = $ammo_bow . "bow " . $bow;
			if (($xclass == "Illusionist") || ($xclass == "Magic-User")){$item = "dart"; $allowed = "I_M";}
			else if (($xclass == "Druid") || ($xclass == "Thief")){$item = $ammo_sling . "sling"; $allowed = "A_D_F_P_R_T";}
			else if (mt_rand(1,100) >= 50){$item = $ammo_crossbow . "crossbow " . $cbow; $allowed = "A_F_P_R";}
			else if (mt_rand(1,100) >= 50){$item = $ammo_sling . "sling"; $allowed = "A_D_F_P_R_T";}
		}

		$category = mt_rand(1,20);
		if ($category > 18)
		{
			switch (mt_rand(0,49))
			{
				case 0: $slay = "clerics"; break;
				case 1: $slay = "demi-humans"; break;
				case 2: $slay = "demons"; break;
				case 3: $slay = "devils"; break;
				case 4: $slay = "dinosaurs"; break;
				case 5: $slay = "dragons"; break;
				case 6: $slay = "druids"; break;
				case 7: $slay = "dwarfs"; break;
				case 8: $slay = "elementals"; break;
				case 9: $slay = "elves"; break;
				case 10: $slay = "ettin"; break;
				case 11: $slay = "fighters"; break;
				case 12: $slay = "ghouls"; break;
				case 13: $slay = "giants"; break;
				case 14: $slay = "gnolls"; break;
				case 15: $slay = "gnomes"; break;
				case 16: $slay = "goblins"; break;
				case 17: $slay = "golems"; break;
				case 18: $slay = "griffins"; break;
				case 19: $slay = "halflings"; break;
				case 20: $slay = "harpies"; break;
				case 21: $slay = "hell hounds"; break;
				case 22: $slay = "hippogriffs"; break;
				case 23: $slay = "hobgoblins"; break;
				case 24: $slay = "humanoids"; break;
				case 25: $slay = "humans"; break;
				case 26: $slay = "hydras"; break;
				case 27: $slay = "illusionists"; break;
				case 28: $slay = "kobolds"; break;
				case 29: $slay = "liches"; break;
				case 30: $slay = "lizard men"; break;
				case 31: $slay = "lycanthropes"; break;
				case 32: $slay = "magic-users"; break;
				case 33: $slay = "mammals"; break;
				case 34: $slay = "medusae"; break;
				case 35: $slay = "mummies"; break;
				case 36: $slay = "naga"; break;
				case 37: $slay = "ogres"; break;
				case 38: $slay = "orcs"; break;
				case 39: $slay = "paladins"; break;
				case 40: $slay = "rangers"; break;
				case 41: $slay = "reptiles"; break;
				case 42: $slay = "skeletons"; break;
				case 43: $slay = "spiders"; break;
				case 44: $slay = "thieves"; break;
				case 45: $slay = "troglodytes"; break;
				case 46: $slay = "trolls"; break;
				case 47: $slay = "undead"; break;
				case 48: $slay = "vampires"; break;
				case 49: $slay = "zombies"; break;
			}
			if ($magic_item == "bow"){$swct = mt_rand(6,9);} else if ($magic_item == "club"){$swct = mt_rand(0,4);} else {$swct = mt_rand(0,9);}
			switch ($swct)
			{
				case 0: $item = "hammer of the dwarves";					$allowed = "F"; 			break;
				case 1: $item = "holy mace";								$allowed = "C_F_P_R"; 		break;
				case 2: $item = "dagger of venom";							$allowed = "A_F_T"; 		break;
				case 3: $item = "trident fork";								$allowed = "A_F_P_R_T"; 	break;
				case 4:	$item = "axe of hurling";							$allowed = "A_F_P_R";		break;
				case 5:	$item = "arrow of slaying (" . $slay . ")";			$allowed = "A_F_P_R_T";		break;
				case 6: $item = $ammo_crossbow . "crossbow of accuracy";	$allowed = "A_F_P_R_T"; 	break;
				case 7: $item = $ammo_crossbow . "crossbow of range";		$allowed = "A_F_P_R_T"; 	break;
				case 8: $item = $ammo_crossbow . "crossbow of speed";		$allowed = "A_F_P_R_T"; 	break;
				case 9: $item = $ammo_sling . "sling of the halfling";		$allowed = "A_F_P_R_T"; 	break;
			}
		}
		else if ($category > 17)
		{
			if ($xcursed > 0){$item = $item . " +1";}
			else if (mt_rand(1,3) > 1){$item = $item . " (cursed: " . curseType($xlevel,$xcurse,equip,OSRIC) . ")";}
			else
			{
				switch (mt_rand(0,1))
				{
					case 0:	$item = "mace of blood";				$allowed = "A_C_F_P_R";		break;
					case 1:	$item = "spear of cursed backbiter";	$allowed = "A_D_F_P_R";		break;
				}
			}
		}
		else if ($category > 16){if (mt_rand(1,100) > 65){$item = $item . " +5"; } else {$item = $item . " +4";}}
		else if ($category > 15){$item = $item . " +3";}
		else if ($category > 10){$item = $item . " +2";}
		else {$item = $item . " +1";}
	}
	else if ($magic_item == "sword") ///////////////////////////////////////////////////////////////////////////////////////////////
	{
		$allowed = "A_F_P_R_T";
		$xcurse = "wielder";

			switch (mt_rand(0,9))
			{
				case 0: $dragon = "black"; break;
				case 1: $dragon = "blue"; break;
				case 2: $dragon = "brass"; break;
				case 3: $dragon = "bronze"; break;
				case 4: $dragon = "copper"; break;
				case 5: $dragon = "gold"; break;
				case 6: $dragon = "green"; break;
				case 7: $dragon = "red"; break;
				case 8: $dragon = "silver"; break;
				case 9: $dragon = "white"; break;
			}

		$swd = mt_rand(1,20);
		if ($swd > 19){$item = "short sword"; if (mt_rand(1,5) == 1){$item = "scimitar"; $allowed = "A_D_F_P_R_T";}}
		else if ($swd > 5){$item = "long sword";}
		else if ($swd > 1){$item = "broad sword";}
		else {$item = "bastard sword"; $allowed = "A_F_P_R"; if (mt_rand(1,5) == 1){$item = "two-handed sword";}}

		$category = mt_rand(1,20);
		if ($category > 18)
		{
			$spwd = mt_rand(1,100);
			if ($spwd > 95){$item = $item . " (wyrmbane)";}
			else if ($spwd > 90){$item = $item . " (werebane)";}
			else if ($spwd > 89){$item = $item . " (vorpal blade)";}
			else if ($spwd > 84){$item = $item . " (vampire blade)";}
			else if ($spwd > 79){$item = $item . " (trollbane)";}
			else if ($spwd > 74){$item = $item . " (nine lives stealer)";}
			else if ($spwd > 69){$item = $item . " (magebane)";}
			else if ($spwd > 53){$item = $item . " (luck blade)";}
			else if ($spwd > 51){$item = $item . " (keenblade)";}
			else if ($spwd > 46){$item = $item . " (holy sword)"; $allowed = "P";}
			else if ($spwd > 36){$item = $item . " (giantbane)";}
			else if ($spwd > 31){$item = $item . " (frost brand)";}
			else if ($spwd > 21){$item = $item . " (flaming blade){command word: <i>" . castingName() . "</i>}";}
			else if ($spwd > 16){$item = $item . " (dragonbane)[x3 damage to " . $dragon . " dragons]";}
			else if ($spwd > 6){$item = $item . " (defender)";}
			else if ($spwd > 1){$item = $item . " (dancing sword)";}
			else {$item = $item . " (bleeding sword)";}
		}
		else if ($category > 17)
		{
			if ($xcursed > 0){$item = $item . " +1";}
			else if (mt_rand(1,3) > 1){$item = $item . " (cursed: " . curseType($xlevel,$xcurse,equip,OSRIC) . ")";}
			else
			{
				switch (mt_rand(0,2))
				{
					case 0:	$item = $item . " (cursed +1)";				break;
					case 1:	$item = $item . " (cursed -2)";				break;
					case 2:	$item = $item . " (cursed, berserker +2)";	break;
				}
			}
		}
		else if ($category > 16){if (mt_rand(1,100) > 65){$item = $item . " +5"; } else {$item = $item . " +4";}}
		else if ($category > 15){$item = $item . " +3";}
		else if ($category > 10){$item = $item . " +2";}
		else {$item = $item . " +1";}
	}
	else if ($magic_item == "potion") ///////////////////////////////////////////////////////////////////////////////////////////////
	{
		$category = mt_rand(1,20);
		$xcurse = "drinker";
		$allowed = "ALL";

			switch (mt_rand(0,11))
			{
				case 0: $dragon = "black"; break;
				case 1: $dragon = "blue"; break;
				case 2: $dragon = "brass"; break;
				case 3: $dragon = "bronze"; break;
				case 4: $dragon = "copper"; break;
				case 5: $dragon = "gold"; break;
				case 6: $dragon = "green"; break;
				case 7: $dragon = "red"; break;
				case 8: $dragon = "silver"; break;
				case 9: $dragon = "white"; break;
				case 10: $dragon = "evil dragons"; break;
				case 11: $dragon = "good dragons"; break;
			}
				$gct = mt_rand(1,20);
				if ($gct > 19){$giant = "storm";}
				else if ($gct > 15){$giant = "stone";}
				else if ($gct > 10){$giant = "hill";}
				else if ($gct > 16){$giant = "frost";}
				else if ($gct > 2){$giant = "fire";}
				else {$giant = "cloud";}

				if ($gct > 19){$animal = "any";}
				else if ($gct > 17){$animal = "amphibian, reptile, & fish";}
				else if ($gct > 13){$animal = "amphibian & reptile";}
				else if ($gct > 11){$animal = "mammal & avian";}
				else if ($gct > 7){$animal = "mammal";}
				else if ($gct > 4){$animal = "fish";}
				else {$animal = "avian";}

			switch (mt_rand(0,8))
			{
				case 0: $humoid = "dwarf"; break;
				case 1: $humoid = "elf & half-elf"; break;
				case 2: $humoid = "elf, half-elf, & human"; break;
				case 3: $humoid = "gnome"; break;
				case 4: $humoid = "halfling"; break;
				case 5: $humoid = "half-orc"; break;
				case 6: $humoid = "green"; break;
				case 7: $humoid = "human"; break;
				case 8: $humoid = "orcs, goblins, etc."; break;
			}
			switch (mt_rand(0,9))
			{
				case 0: $dead = "ghast"; break;
				case 1: $dead = "ghost"; break;
				case 2: $dead = "ghoul"; break;
				case 3: $dead = "shadow"; break;
				case 4: $dead = "skeleton"; break;
				case 5: $dead = "spectre"; break;
				case 6: $dead = "vampire"; break;
				case 7: $dead = "wight"; break;
				case 8: $dead = "wraith"; break;
				case 9: $dead = "zombie"; break;
			}
		if (($xcursed > 0) && ($category == 18)){$item = "potion of healing";}
		else if ($category > 19){$item = "potion of animal control (" . $animal . ")"; if (mt_rand(1,2) > 1){$item = "potion of clairaudience";}}
		else if ($category > 18){$item = "potion of clairvoyance"; if (mt_rand(1,2) > 1){$item = "potion of climbing";}}
		else if ($category > 17){$item = "potion (cursed: " . curseType($xlevel,$xcurse,drink,OSRIC) . ")"; if (mt_rand(1,2) > 1){$item = "potion of delusion";}}
		else if ($category > 16){$item = "potion of diminution"; if (mt_rand(1,3) > 2){$item = "potion of dragon control (" . $dragon . ")";}}
		else if ($category > 15){$item = "potion of ESP";}
		else if ($category > 14){$item = "potion of extra-healing"; if (mt_rand(1,3) > 2){$item = "potion of fire resistance";}}
		else if ($category > 13){$item = "potion of flying"; if (mt_rand(1,2) > 1){$item = "potion of gaseous form";}}
		else if ($category > 12){$item = "potion of giant control (" . $giant . ")"; if (mt_rand(1,2) > 1){$item = "potion of giant strength (" . $giant . ")"; $allowed = "F_P_R";}}
		else if ($category > 11){$item = "potion of growth";}
		else if ($category > 10){$item = "potion of healing";}
		else if ($category > 9){$item = "potion of human control (" . $humoid . ")"; if (mt_rand(1,2) > 1){$item = "potion of heroism"; $allowed = "F_P_R";}}
		else if ($category > 8){$item = "potion of invisibility"; if (mt_rand(1,2) > 1){$item = "potion of invulnerability"; $allowed = "F";}}
		else if ($category > 7){$item = "potion of levitation"; if (mt_rand(1,2) > 1){$item = "potion of longevity";}}
		else if ($category > 6){$item = "oil of etherealness"; if (mt_rand(1,2) > 1){$item = "oil of slipperiness";}}
		else if ($category > 5){$item = "philtre of love"; if (mt_rand(1,2) > 1){$item = "philtre of persuasiveness";}}
		else if ($category > 4){$item = "potion of plant control"; if (mt_rand(1,3) == 1){$item = "potion of polymorph";}}
		else if ($category > 3){$item = "potion of speed"; if (mt_rand(1,2) > 1){$item = "potion of super-heroism"; $allowed = "F_P_R";}}
		else if ($category > 2){$item = "potion of sweet water";}
		else if ($category > 1){$item = "potion of treasure finding"; if (mt_rand(1,4) == 1){$item = "potion of undead control (" . $dead . ")";}}
		else {$item = "potion of water breathing";}
	}
	else if ($magic_item == "ring") ///////////////////////////////////////////////////////////////////////////////////////////////
	{
		$category = mt_rand(1,20);
		$allowed = "ALL";

			$rct = mt_rand(1,100);
			if ($rct > 99){$prot = "+5 AC/+1 SV";}
			else if ($rct > 98){$prot = "+4 AC/+1 SV";}
			else if ($rct > 97){$prot = "+3 5' radius";}
			else if ($rct > 93){$prot = "+3";}
			else if ($rct > 92){$prot = "+2 5' radius";}
			else if ($rct > 70){$prot = "+2";}
			else if ($rct > 68){$prot = "+1 5' radius";}
			else {$prot = "+1";}

			$wct = mt_rand(1,100);
			if ($wct > 99){$weit = "400 lbs";}
			else if ($wct > 89){$weit = "200 lbs";}
			else if ($wct > 50){$weit = "100 lbs";}
			else if ($wct > 25){$weit = "50 lbs";}
			else {$weit = "25 lbs";}

			$sct = mt_rand(1,100);
			if ($sct > 30){$stor = "magic-user spells"; if (mt_rand(1,10) == 1){$stor = "illusionist spells";}}
			else {$stor = "cleric spells"; if (mt_rand(1,4) == 1){$stor = "druid spells";}}

			$hct = mt_rand(1,100);
			if ($hct > 25){$wish = "wish"; }
			else {$wish = "limited wish"; }

			$mct = mt_rand(1,100);
			if ($mct > 99){$magc = "4th/5th level";}
			else if ($mct > 95){$magc = "1st/2nd/3rd level, ";}
			else if ($mct > 92){$magc = "5th level";}
			else if ($mct > 88){$magc = "4th level";}
			else if ($mct > 82){$magc = "1st/2nd level";}
			else if ($mct > 75){$magc = "3rd level";}
			else if ($mct > 45){$magc = "2nd level";}
			else {$magc = "1st level";}

		if ($category > 19){$item = "ring of charisma [" . $charges . " charges]";}
		else if ($category > 17){$item = "ring of feather falling";}
		else if ($category > 16){$item = "ring fire resitance";}
		else if ($category > 15){$item = "ring of free action";}
		else if ($category > 14){$item = "ring of genie summoning [" . $charges . " charges]";}
		else if ($category > 13){$item = "ring of invisibility";}
		else if ($category > 12){$item = "ring of protection (" . $prot . ")";}
		else if ($category > 7){$item = "ring of regeneration"; if (mt_rand(1,4) > 1){$item = "ring of spell storing (" . mt_rand(2,8) . " " . $stor . ")";}}
		else if ($category > 6){$item = "ring of spell turning";}
		else if ($category > 5){$item = "ring of swimming";}
		else if ($category > 4){$item = "ring of telekinesis (" . $weit . ")[" . $charges . " charges]"; if (mt_rand(1,2) == 1){$item = "ring of three wishes (" . $wish . ")";}}
		else if ($category > 3){$item = "ring of warmth";}
		else if ($category > 1){$item = "ring of water walking";}
		else {$item = "ring of wizardry (" . $magc . ")"; $allowed = "M";}
	}
	else if ($magic_item == "wand") ///////////////////////////////////////////////////////////////////////////////////////////////
	{
		$category = mt_rand(1,20);
		$allowed = "ALL";

			$zct = mt_rand(1,100);
			if ($zct > 40){$snak = "python";}
			else {$snak = "viper";}

		if ($category > 19){$item = "wand of wonder [" . $wcharges . " charges]"; if (mt_rand(1,2) == 1){$item = "wand of summoning [" . $wcharges . " charges]"; $allowed = "C_D_I_M";}}
		else if ($category > 18){$item = "wand of polymorphing [" . $wcharges . " charges]"; $allowed = "D_M";}
		else if ($category > 17){$item = "wand of paralyzation [" . $wcharges . " charges]"; $allowed = "C_D_I_M";}
		else if ($category > 16){$item = "wand of negation [" . $wcharges . " charges]"; $allowed = "C_D_I_M";}
		else if ($category > 15){$item = "wand of magic missiles [" . $wcharges . " charges]"; $allowed = "M";}
		else if ($category > 14){$item = "wand of illusion [" . $wcharges . " charges]"; $allowed = "I_M"; if (mt_rand(1,2) == 1){$item = "wand of lightning [" . $wcharges . " charges]"; $allowed = "D_M";}}
		else if ($category > 13){$item = "wand of ice [" . $wcharges . " charges]"; $allowed = "D_M"; if (mt_rand(1,2) == 1){$item = "wand of light [" . $wcharges . " charges]"; $allowed = "C_D_I_M";}}
		else if ($category > 12){$item = "wand of fear [" . $wcharges . " charges]"; $allowed = "C_D_I_M"; if (mt_rand(1,2) == 1){$item = "wand of fire [" . $wcharges . " charges]"; $allowed = "D_M";}}
		else if ($category > 11){$item = "wand of enemy detection [" . $wcharges . " charges]";}
		else if ($category > 10){$item = "wand of detecting traps & secret doors [" . $wcharges . " charges]";}
		else if ($category > 9){$item = "wand of detecting minerals & metals [" . $wcharges . " charges]";}
		else if ($category > 8){$item = "wand of detecting magic [" . $wcharges . " charges]"; $allowed = "C_D_I_M";}
		else if ($category > 7){$item = "staff of withering [" . $scharges . " charges]"; $allowed = "C_D_I_M"; if (mt_rand(1,4) == 1){$item = "staff of wizardry [" . $scharges . " charges]"; $allowed = "M";}}
		else if ($category > 6){$item = "staff of power [" . $scharges . " charges]"; $allowed = "I_M"; if (mt_rand(1,4) == 1){$item = "staff of the serpent (" . $snak . ")"; $allowed = "C_D";}}
		else if ($category > 5){$item = "staff of compulsion [" . $scharges . " charges]"; $allowed = "C_M"; if (mt_rand(1,2) == 1){$item = "staff of healing [" . $scharges . " charges]"; $allowed = "C_D";}}
		else if ($category > 4){$item = "rod of rulership [" . $rcharges . " charges]"; $allowed = "F_P_R"; if (mt_rand(1,2) == 1){$item = "rod of striking [" . $rcharges . " charges]"; $allowed = "C_D_I_M";}}
		else if ($category > 3){$varw = mt_rand(1,4); if ($varw == 1){$item = "rod of captivation [" . $rcharges . " charges]"; $allowed = "C_D_I_M";} else if ($varw == 2){$item = "rod of resurrection [" . $rcharges . " charges]"; $allowed = "C";} else {$item = "rod of lordly might [" . $rcharges . " charges]"; $allowed = "F_P_R";}}
		else if ($category > 1){$item = "rod of cancellation [" . $rcharges . " charges]";}
		else {$item = "rod of absorption";}

		$item = $item . " {command word: <i>" . castingName() . "</i>}";
	}
	else if ($magic_item == "scroll") ///////////////////////////////////////////////////////////////////////////////////////////////
	{
		$category = mt_rand(1,20);
		$allowed = "ALL";

			$elt = mt_rand(1,20);
			if ($elt > 12){$ely = "air";}
			else if ($elt > 9){$ely = "earth";}
			else if ($elt > 6){$ely = "fire";}
			else if ($elt > 3){$ely = "water";}
			else {$ely = "all";}

			$elt = mt_rand(1,20);
			if ($elt > 19){$lycn = "all shape changers";}
			else if ($elt > 8){$lycn = "all";}
			else if ($elt > 5){$lycn = "werewolves";}
			else if ($elt > 4){$lycn = "weretigers";}
			else if ($elt > 2){$lycn = "wererats";}
			else if ($elt > 1){$lycn = "wereboars";}
			else {$lycn = "werebears";}

		if (($xcursed > 0) && ($category == 20)){$item = "scroll (" . gameSpellChooser('OSRIC',$xlevel,'') . ")";}
		else if ($category > 19){$item = "scroll, cursed (" . curseType($xlevel,reader,item,OSRIC) . ")";}
		else if ($category > 12)
		{
			switch (mt_rand(0,8))
			{
				case 0:	$item = "scroll, warding (acid)";	break;
				case 1:	$item = "scroll, warding (demons)";	break;
				case 2: $item = "scroll, warding (devils)";	break;
				case 3: $item = "scroll, warding (elementals - " . $ely . ")";	break;
				case 4:	$item = "scroll, warding (lycanthropes - " . $lycn . ")";	break;
				case 5:	$item = "scroll, warding (magic)";	break;
				case 6: $item = "scroll, warding (petrification)";	break;
				case 7: $item = "scroll, warding (polymorph)";	break;
				case 8:	$item = "scroll, warding (undead)";	break;
			}
		}
		else {$item = "scroll (" . gameSpellChooser('OSRIC',$xlevel,'') . ")";}
	}
	else if ($magic_item == "magic") ///////////////////////////////////////////////////////////////////////////////////////////////
	{
		$xcurse = "owner";

		$mig = mt_rand(1,100); if ($xcursed > 0){$mig = mt_rand(1,99);}
		if ($mig > 99){$miscmg = mt_rand(187,210);}
		else if ($mig > 90){$miscmg = mt_rand(146,186);}
		else if ($mig > 70){$miscmg = mt_rand(81,145);}
		else if ($mig > 50){$miscmg = mt_rand(29,80);}
		else {$miscmg = mt_rand(0,28);}

		switch (mt_rand(0,3))
		{
			case 0:	$bhold = "type I";		break;
			case 1:	$bhold = "type II";		break;
			case 2: $bhold = "type III";	break;
			case 3: $bhold = "type IV";		break;
		}
		switch (mt_rand(0,2))
		{
			case 0:	$carp = "5x5 ft";		break;
			case 1:	$carp = "5x10 ft";		break;
			case 2: $carp = "10x10 ft";	break;
		}
		switch (mt_rand(0,5))
		{
			case 0:	$feat = "anchor";		break;
			case 1:	$feat = "bird";			break;
			case 2: $feat = "fan";			break;
			case 3:	$feat = "swan boat";	break;
			case 4:	$feat = "tree";			break;
			case 5: $feat = "whip";			break;
		}
		switch (mt_rand(0,8))
		{
			case 0:	$figr = "bronze griffin";	break;
			case 1:	$figr = "ebony fly";		break;
			case 2: $figr = "golden lions";		break;
			case 3:	$figr = "ivory goats";		break;
			case 4:	$figr = "marble elephant";	break;
			case 5: $figr = "obsidian steed";	break;
			case 6: $figr = "onyx dog";			break;
			case 7:	$figr = "serpentine owl";	break;
			case 8:	$figr = "silver raven";		break;
		}
		switch (mt_rand(0,3))
		{
			case 0:	$golem = "clay";	break;
			case 1:	$golem = "stone";	break;
			case 2: $golem = "iron";	break;
			case 3:	$golem = "flesh";	break;
		}
		switch (mt_rand(0,6))
		{
			case 0:	$firn = "type I";	break;
			case 1:	$firn = "type II";	break;
			case 2: $firn = "type III";	break;
			case 3:	$firn = "type IV";	break;
			case 4:	$firn = "type V";	break;
			case 5:	$firn = "type VI";	break;
			case 6: $firn = "type VII";	break;
		}
		switch (mt_rand(0,8))
		{
			case 0:	$sbok = "Assassin";		$allowed = "A";	break;
			case 1:	$sbok = "Cleric";		$allowed = "C";	break;
			case 2: $sbok = "Druid";		$allowed = "D";	break;
			case 3:	$sbok = "Fighter";		$allowed = "F";	break;
			case 4:	$sbok = "Illusionist";	$allowed = "I";	break;
			case 5:	$sbok = "Magic-User";	$allowed = "M";	break;
			case 6: $sbok = "Paladin";		$allowed = "P";	break;
			case 7:	$sbok = "Ranger";		$allowed = "R";	break;
			case 8:	$sbok = "Thief";		$allowed = "T";	break;
		}
		switch (mt_rand(0,14))
		{
			case 0:	$iston = "dusty rose spindle";			break;
			case 1:	$iston = "deep red sphere";				break;
			case 2: $iston = "incandescent blue sphere";	break;
			case 3:	$iston = "pale blue rhomboid";			break;
			case 4:	$iston = "pink rhomboid";				break;
			case 5: $iston = "pink & green sphere";			break;
			case 6: $iston = "scarlet & blue sphere";		break;
			case 7:	$iston = "dark blue rhomboid";			break;
			case 8:	$iston = "vibrant purple prism";		break;
			case 8:	$iston = "iridescent spindle";			break;
			case 10:$iston = "pale lavender ellipsoid";		break;
			case 11:$iston = "pearly white spindle";		break;
			case 12:$iston = "pale green prism";			break;
			case 13:$iston = "orange prism";				break;
			case 14:$iston = "lavender & green ellipsoid";	break;
		}
		switch (mt_rand(0,5))
		{
			case 0:	$roct = "flying";			break;
			case 1:	$roct = "invisibility";		break;
			case 2: $roct = "levitation";		break;
			case 3:	$roct = "shocking grasp";	break;
			case 4:	$roct = "spell turning";	break;
			case 5: $roct = "strength 18/99";	break;
		}
			$rss = mt_rand(1,100);
			if ($rss > 99){$ress = "+5 to all saves";}
			else if ($rss > 90){$ress = "+4 to all saves";}
			else if ($rss > 75){$ress = "+3 to all saves";}
			else if ($rss > 50){$ress = "+2 to all saves";}
			else {$ress = "+1 to all saves";}

			$css = mt_rand(1,100);
			if ($css > 95){$cyst = " (with true seeing)";}
			else if ($css > 90){$cyst = " (with ESP)";}
			else if ($css > 85){$cyst = " (with see invisibility)";}
			else if ($css > 75){$cyst = " (with clairaudience)";}
			else {$cyst = "";}

			$hns = mt_rand(1,100);
			if ($hns > 90){$horn = "iron"; $allowed = "A_F_P_R_T";}
			else if ($hns > 75){$horn = "bronze"; $allowed = "A_F_P_R_T";}
			else if ($hns > 40){$horn = "brass"; $allowed = "C_D_I_M";}
			else {$horn = "silver"; $allowed = "ALL";}

			$ifk = mt_rand(1,100);
			if ($ifk > 99){$iflsk = " (contains a xorn";}
			else if ($ifk > 97){$iflsk = " (contains a wind walker";}
			else if ($ifk > 93){$iflsk = " (contains a water elemental";}
			else if ($ifk > 89){$iflsk = " (contains a salamander";}
			else if ($ifk > 86){$iflsk = " (contains a rakshasa";}
			else if ($ifk > 85){$iflsk = " (contains a quasit";}
			else if ($ifk > 83){$iflsk = " (contains a night hag";}
			else if ($ifk > 81){$iflsk = " (contains a dretch";}
			else if ($ifk > 76){$iflsk = " (contains an invisible stalker";}
			else if ($ifk > 72){$iflsk = " (contains a fire elemental";}
			else if ($ifk > 69){$iflsk = " (contains an efreeti";}
			else if ($ifk > 65){$iflsk = " (contains an earth elemental";}
			else if ($ifk > 60){$iflsk = " (contains a djinni";}
			else if ($ifk > 59){$iflsk = " (contains a greater devil";}
			else if ($ifk > 57){$iflsk = " (contains a lesser devil";}
			else if ($ifk > 56){$iflsk = " (contains a demon [class D-F])";}
			else if ($ifk > 54){$iflsk = " (contains a demon [class A-C])";}
			else if ($ifk > 50){$iflsk = " (contains an air elemental";}
			else {$iflsk = "";}

			switch ($miscmg)
			{
				case 0: $item = "incense of meditation (" . mt_rand(1,4) . " cones)"; $allowed = "C"; break;
				case 1: $item = "javelin of the raptor"; $allowed = "A_F_P_R"; break;
				case 2: $item = "thunder spear"; $allowed = "A_F_P_R"; break;
				case 3: $item = "boots of elvenkind"; $allowed = "ALL"; break;
				case 4: $item = "candle of invocation"; $allowed = "C"; break;
				case 5: $item = "dust of appearance"; $allowed = "ALL"; break;
				case 6: $item = "dust of disappearance"; $allowed = "ALL"; break;
				case 7: $item = "rope of climbing"; $allowed = "ALL"; break;
				case 8: $item = "scarab of protection"; $allowed = "ALL"; break;
				case 9: $item = "slippers of spider climbing"; $allowed = "ALL"; break;
				case 10: $item = "strand of prayer beads"; $allowed = "C"; break;
				case 11: $item = "amulet of natural armor (+" . mt_rand(1,4) . ")"; $allowed = "ALL"; break;
				case 12: $item = "blessed book"; $allowed = "I_M"; break;
				case 13: $item = "brooch of shielding"; $allowed = "ALL"; break;
				case 14: $item = "hat of disguise"; $allowed = "ALL"; break;
				case 15: $item = "horn of valhalla (" . $horn . ")"; break;
				case 16: $item = "periapt of proof against poison"; $allowed = "ALL"; break;
				case 17: $item = "phylactery of faithfulness"; $allowed = "C_P"; break;
				case 18: $item = "robe of blending"; $allowed = "I_M"; break;
				case 19: $item = "pipes of the sewers"; $allowed = "ALL"; break;
				case 20: $item = "restorative ointment"; $allowed = "ALL"; break;
				case 21: $item = "robe of useful items"; $allowed = "I_M"; break;
				case 22: $item = "vest of escape"; $allowed = "A_T"; break;
				case 23: $item = "cloak of elvenkind"; $allowed = "ALL"; break;
				case 24: $item = "wings of flying"; $allowed = "ALL"; break;
				case 25: $item = "cloak of resistance (" . $ress . ")"; $allowed = "ALL"; break;
				case 26: $item = "feather token (" . $feat . ")"; $allowed = "ALL"; break;
				case 27: $item = "figurines of wondrous power (" . $figr . ")"; $allowed = "ALL"; break;
				case 28: $item = "bracers of armor (+" . mt_rand(1,8) . ")"; $allowed = "ALL"; break;
				case 29: $item = "arrow of direction"; $allowed = "ALL"; break;
				case 30: $item = "brazier of commanding fire elementals"; $allowed = "D_M"; break;
				case 31: $item = "cape of the mountebank"; $allowed = "A_T"; break;
				case 32: $item = "cloak of the manta ray"; $allowed = "ALL"; break;
				case 33: $item = "decanter of endless water"; $allowed = "ALL"; break;
				case 34: $item = "dust of dryness"; $allowed = "ALL"; break;
				case 35: $item = "elixir of swimming"; $allowed = "ALL"; break;
				case 36: $item = "gloves of arrow snaring"; $allowed = "ALL"; break;
				case 37: $item = "gloves of swimming and climbing"; $allowed = "ALL"; break;
				case 38: $item = "goggles of night"; $allowed = "ALL"; break;
				case 39: $item = "horseshoes of speed"; $allowed = "ALL"; break;
				case 40: $item = "necklace of adaptation"; $allowed = "ALL"; break;
				case 41: $item = "orb of storms"; $allowed = "C_D"; break;
				case 42: $item = "periapt of health"; $allowed = "ALL"; break;
				case 43: $item = "pipes of haunting"; $allowed = "ALL"; break;
				case 44: $item = "ring gates"; $allowed = "ALL"; break;
				case 45: $item = "robe of bones"; $allowed = "I_M"; break;
				case 46: $item = "unguent of timelessness"; $allowed = "ALL"; break;
				case 47: $item = "universal solvent"; $allowed = "ALL"; break;
				case 48: $item = "amulet of proof against detection or location"; $allowed = "ALL"; break;
				case 49: $item = "boots of speed"; $allowed = "ALL"; break;
				case 50: $item = "boots of striding and springing"; $allowed = "ALL"; break;
				case 51: $item = "lesser bracers of archery"; $allowed = "A_F_P_R_T"; break;
				case 52: $item = "candle of truth"; $allowed = "C_P"; break;
				case 53: $item = "minor cloak of displacement"; $allowed = "ALL"; break;
				case 54: $item = "cloak of the bat"; $allowed = "ALL"; break;
				case 55: $item = "dark skull"; $allowed = "C"; break;
				case 56: $item = "dust of tracelessness"; $allowed = "ALL"; break;
				case 57: $item = "elixir of truth"; $allowed = "ALL"; break;
				case 58: $item = "elixir of vision"; $allowed = "ALL"; break;
				case 59: $item = "glove of storing"; $allowed = "A_T"; break;
				case 60: $item = "horn of the tritons"; $allowed = "D_M"; break;
				case 61: $item = "necklace of fireballs (" . $firn . ")"; $allowed = "D_M"; break;
				case 62: $item = "periapt of wound closure"; $allowed = "ALL"; break;
				case 63: $item = "phylactery of undead turning"; $allowed = "C_P"; break;
				case 64: $item = "rope of entanglement"; $allowed = "A_F_P_R_T"; break;
				case 65: $item = "stone horse"; $allowed = "ALL"; break;
				case 66: $item = "stone of alarm {command word: <i>" . castingName() . "</i>}"; $allowed = "ALL"; break;
				case 67: $item = "sustaining spoon"; $allowed = "ALL"; break;
				case 68: $item = "wind fan"; $allowed = "ALL"; break;
				case 69: $item = "bag of holding (" . $bhold . ")"; $allowed = "ALL"; break;
				case 70: $item = "boots of levitation"; $allowed = "ALL"; break;
				case 71: $item = "bottle of air"; $allowed = "ALL"; break;
				case 72: $item = "broom of flying"; $allowed = "M"; break;
				case 73: $item = "crystal ball"; $allowed = "I_M"; break;
				case 74: $item = "elixir of fire breath"; $allowed = "ALL"; break;
				case 75: $item = "elixir of hiding"; $allowed = "ALL"; break;
				case 76: $item = "handy haversack"; $allowed = "ALL"; break;
				case 77: $item = "harp of charming"; $allowed = "ALL"; break;
				case 78: $item = "helm of comprehend languages and read magic"; $allowed = "ALL"; break;
				case 79: $item = "helm of underwater action"; $allowed = "ALL"; break;
				case 80: $item = "horn of fog"; $allowed = "ALL"; break;
				case 81: $item = "ahmek’s copious coin purse"; $allowed = "ALL"; break;
				case 82: $item = "alchemy jug"; $allowed = "I_M"; break;
				case 83: $item = "amulet of health"; $allowed = "ALL"; break;
				case 84: $item = "amulet of the planes"; $allowed = "ALL"; break;
				case 85: $item = "apparatus of the lobster"; $allowed = "ALL"; break;
				case 86: $item = "bag of tricks"; $allowed = "ALL"; break;
				case 87: $item = "bead of force"; $allowed = "ALL"; break;
				case 88: $item = "blemish blotter"; $allowed = "ALL"; break;
				case 89: $item = "boots of the winterlands"; $allowed = "ALL"; break;
				case 90: $item = "bowl of commanding water elementals"; $allowed = "D_M"; break;
				case 91: $item = "bracelet of friends"; $allowed = "C_D_I_M"; break;
				case 92: $item = "greater bracers of archery"; $allowed = "A_F_P_R_T"; break;
				case 93: $item = "carpet of flying (" . $carp . ")"; $allowed = "ALL"; break;
				case 94: $item = "censer of controlling air elementals"; $allowed = "D_M"; break;
				case 95: $item = "chime of interruption"; $allowed = "ALL"; break;
				case 96: $item = "chime of opening"; $allowed = "ALL"; break;
				case 97: $item = "minor circlet of blasting"; $allowed = "M"; break;
				case 98: $item = "circlet of persuasion"; $allowed = "ALL"; break;
				case 99: $item = "cloak of etherealness"; $allowed = "ALL"; break;
				case 100: $item = "cloak of arachnida"; $allowed = "ALL"; break;
				case 101: $item = "cloak of charisma"; $allowed = "ALL"; break;
				case 102: $item = "major cloak of displacement"; $allowed = "ALL"; break;
				case 103: $item = "cube of force"; $allowed = "ALL"; break;
				case 104: $item = "cube of frost resistance"; $allowed = "ALL"; break;
				case 105: $item = "cubic gate" . $cyst . ""; $allowed = "C_D_I_M"; break;
				case 106: $item = "deck of illusion"; $allowed = "ALL"; break;
				case 107: $item = "dimensional shackles"; $allowed = "C_D_I_M"; break;
				case 108: $item = "drums of panic"; $allowed = "ALL"; break;
				case 109: $item = "dust of illusion"; $allowed = "I_M"; break;
				case 110: $item = "efficient quiver"; $allowed = "A_F_P_R_T"; break;
				case 111: $item = "elemental gem"; $allowed = "D_M"; break;
				case 112: $item = "eyes of the eagle"; $allowed = "I_M"; break;
				case 113: $item = "gauntlets of ogre power"; $allowed = "A_C_D_F_P_R_T"; break;
				case 114: $item = "gauntlets of rust"; $allowed = "A_C_D_F_P_R_T"; break;
				case 115: $item = "gloves of dexterity"; $allowed = "A_T"; break;
				case 116: $item = "goggles of minute seeing"; $allowed = "ALL"; break;
				case 117: $item = "headband of intellect"; $allowed = "I_M"; break;
				case 118: $item = "helm of telepathy"; $allowed = "ALL"; break;
				case 119: $item = "horn of goodness/evil"; $allowed = "C_P"; break;
				case 120: $item = "horseshoes of the zephyr"; $allowed = "ALL"; break;
				case 121: $item = "instant fortress {command word: <i>" . castingName() . "</i>}"; $allowed = "ALL"; break;
				case 122: $item = "iron bands of binding"; $allowed = "ALL"; break;
				case 123: $item = "iron flask" . $iflsk . ""; $allowed = "C_D_M"; break;
				case 124: $item = "lantern of revealing"; $allowed = "C_D_I_M"; break;
				case 125: $item = "mantle of faith"; $allowed = "C_D"; break;
				case 126: $item = "mantle of magic resistance"; $allowed = "ALL"; break;
				case 127: $item = "marvellous pigments"; $allowed = "ALL"; break;
				case 128: $item = "mask of the skull"; $allowed = "A_I_M_T"; break;
				case 129: $item = "medallion of thoughts"; $allowed = "I_M"; break;
				case 130: $item = "pearl of power"; $allowed = "C_D_I_M"; break;
				case 131: $item = "pearl of the sirines"; $allowed = "ALL"; break;
				case 132: $item = "periapt of wisdom"; $allowed = "ALL"; break;
				case 133: $item = "pipes of pain"; $allowed = "ALL"; break;
				case 134: $item = "pipes of sounding"; $allowed = "I_M"; break;
				case 135: $item = "plentiful vessel"; $allowed = "ALL"; break;
				case 136: $item = "robe of stars"; $allowed = "I_M"; break;
				case 137: $item = "scabbard of keen edges"; $allowed = "A_F_P_R_T"; break;
				case 138: $item = "scarab of golem bane"; $allowed = "ALL"; break;
				case 139: $item = "silversheen"; $allowed = "ALL"; break;
				case 140: $item = "sovereign glue (" . mt_rand(1,7) . "oz)"; $allowed = "ALL"; break;
				case 141: $item = "stone of controlling earth elementals"; $allowed = "D_M"; break;
				case 142: $item = "stone of good luck"; $allowed = "ALL"; break;
				case 143: $item = "stone salve (" . mt_rand(1,4) . "oz)"; $allowed = "ALL"; break;
				case 144: $item = "druid's vestment"; $allowed = "D"; break;
				case 145: $item = "well of many worlds"; $allowed = "ALL"; break;
				case 146: $item = "afreeti bottle"; $allowed = "C_D_I_M"; break;
				case 147: $item = "amulet of life protection"; $allowed = "ALL"; break;
				case 148: $item = "amulet of mighty fists"; $allowed = "ALL"; break;
				case 149: $item = "belt of dwarvenkind"; $allowed = "ALL"; break;
				case 150: $item = "belt of giant strength"; $allowed = "F_P_R"; break;
				case 151: $item = "boat folding"; $allowed = "ALL"; break;
				case 152: $item = "boots of teleportation"; $allowed = "ALL"; break;
				case 153: $item = "winged boots"; $allowed = "ALL"; break;
				case 154: $item = "brooch of instigation"; $allowed = "ALL"; break;
				case 155: $item = "major circlet of blasting"; $allowed = "M"; break;
				case 156: $item = "eversmoking bottle"; $allowed = "ALL"; break;
				case 157: $item = "eyes of charming"; $allowed = "I_M"; break;
				case 158: $item = "eyes of doom"; $allowed = "I_M"; break;
				case 159: $item = "eyes of petrifaction"; $allowed = "I_M"; break;
				case 160: $item = "gem of brightness [" . $rcharges . " charges]"; $allowed = "C_D_I_M"; break;
				case 161: $item = "gem of seeing"; $allowed = "ALL"; break;
				case 162: $item = "golem manual (" . $golem . ")"; $allowed = "C_M"; break;
				case 163: $item = "helm of brilliance"; $allowed = "ALL"; break;
				case 164: $item = "helm of teleportation"; $allowed = "ALL"; break;
				case 165: $item = "horn of blasting"; $allowed = "F_P_R"; break;
				case 166: $item = "greater horn of blasting"; $allowed = "F_P_R"; break;
				case 167: $item = "ioun stone (" . $iston . ")"; $allowed = "ALL"; break;
				case 168: $item = "lyre of building"; $allowed = "ALL"; break;
				case 169: $item = "manual of bodily health"; $allowed = "ALL"; break;
				case 170: $item = "manual of gainful exercise"; $allowed = "ALL"; break;
				case 171: $item = "manual of quickness of action"; $allowed = "ALL"; break;
				case 172: $item = "mattock of the titans"; $allowed = "NONE"; break;
				case 173: $item = "maul of the titans"; $allowed = "NONE"; break;
				case 174: $item = "mirror of life trapping"; $allowed = "C_M"; break;
				case 175: $item = "mirror of mental prowess"; $allowed = "M"; break;
				case 176: $item = "mirror of opposition"; $allowed = "M"; break;
				case 177: $item = "oil of famishing"; $allowed = "ALL"; break;
				case 178: $item = "portable hole"; $allowed = "ALL"; break;
				case 179: $item = "robe of eyes"; $allowed = "I_M"; break;
				case 180: $item = "robe of scintillating colours"; $allowed = "I_M"; break;
				case 181: $item = "robe of the archmagi"; $allowed = "I_M"; break;
				case 182: $item = "sagacious volume (" . $sbok . ")"; break;
				case 183: $item = "shrouds of disintegration"; $allowed = "C"; break;
				case 184: $item = "tome of clear thought"; $allowed = "ALL"; break;
				case 185: $item = "tome of leadership and influence"; $allowed = "ALL"; break;
				case 186: $item = "tome of understanding"; $allowed = "ALL"; break;
				case 187: $item = "bag of devouring [cursed]"; $allowed = "ALL"; break;
				case 188: $item = "boots of dancing [cursed]"; $allowed = "ALL"; break;
				case 189: $item = "bracers of defenselessness [cursed]"; $allowed = "ALL"; break;
				case 190: $item = "broom of animated attack [cursed]"; $allowed = "ALL"; break;
				case 191: $item = "cloak of poisonousness [cursed]"; $allowed = "ALL"; break;
				case 192: $item = "crystal hypnosis ball [cursed]"; $allowed = "I_M"; break;
				case 193: $item = "dust of sneezing and choking [cursed]"; $allowed = "ALL"; break;
				case 194: $item = "flask of curses [cursed]"; $allowed = "ALL"; break;
				case 195: $item = "gauntlets of fumbling [cursed]"; $allowed = "ALL"; break;
				case 196: $item = "helm of opposite alignment [cursed]"; $allowed = "ALL"; break;
				case 197: $item = "incense of obsession [cursed]"; $allowed = "C"; break;
				case 198: $item = "medallion of thought projection [cursed]"; $allowed = "ALL"; break;
				case 199: $item = "necklace of strangulation [cursed]"; $allowed = "ALL"; break;
				case 200: $item = "net of snaring [cursed]"; $allowed = "A_F_P_R_T"; break;
				case 201: $item = "periapt of foul rotting [cursed]"; $allowed = "ALL"; break;
				case 202: $item = "potion (poisoned)"; $allowed = "ALL"; break;
				case 203: $item = "ring of clumsiness [cursed]"; $allowed = "ALL"; break;
				case 204: $item = "ring of contrariness (" . $roct . ") [cursed]"; $allowed = "ALL"; break;
				case 205: $item = "ring of weakness [cursed]"; $allowed = "ALL"; break;
				case 206: $item = "robe of powerlessness [cursed]"; $allowed = "I_M"; break;
				case 207: $item = "robe of vermin [cursed]"; $allowed = "I_M"; break;
				case 208: $item = "scarab of death [cursed]"; $allowed = "ALL"; break;
				case 209: $item = "stone of weight [cursed]"; $allowed = "ALL"; break;
				case 210: $item = "vacuous grimoire [cursed]"; $allowed = "ALL"; break;
			}
	}

	if (($allowed == "ALL") || ($xclass == "none")){$runme = 1;}
	else
	{
		$ald = explode("_", $allowed);
		$c_ald = count($ald);
		$g = 0;
		while ($c_ald > 0):
			if (($ald[$g] == "A") && ($xclass == "Assassin")){$runme = 1;}
			if (($ald[$g] == "C") && ($xclass == "Cleric")){$runme = 1;}
			if (($ald[$g] == "D") && ($xclass == "Druid")){$runme = 1;}
			if (($ald[$g] == "F") && ($xclass == "Fighter")){$runme = 1;}
			if (($ald[$g] == "I") && ($xclass == "Illusionist")){$runme = 1;}
			if (($ald[$g] == "M") && ($xclass == "Magic-User")){$runme = 1;}
			if (($ald[$g] == "P") && ($xclass == "Paladin")){$runme = 1;}
			if (($ald[$g] == "R") && ($xclass == "Ranger")){$runme = 1;}
			if (($ald[$g] == "T") && ($xclass == "Thief")){$runme = 1;}

			$g = $g + 1;	$c_ald = $c_ald - 1;
		endwhile;

	}

	$run_fail = $run_fail + 1;
	if ($run_fail > 10)
	{
		$runme = 1;
		if ((($magic_item == "armor") || ($magic_item == "suit")) && (($xclass == "Magic-User") || ($xclass == "Illusionist"))){$item = candleColor(0) . " cloak of protection (+1)";}
		else if (($magic_item == "armor") || ($magic_item == "suit")){$item = "leather armor +1"; $armor_class = 2;}
		else if ((($magic_item == "shield")) && (($xclass == "Magic-User") || ($xclass == "Illusionist") || ($xclass == "Thief"))){$item = "silver dagger +1";}
		else if (($magic_item == "shield")){$item = "shield +1"; $armor_class = 1;}
		else if ((($magic_item == "weapon") || ($magic_item == "club")) && (($xclass == "Cleric"))){$item = "silver club +1";}
		else if (($magic_item == "weapon") || ($magic_item == "club")){$item = "silver dagger +1";}
		else if ((($magic_item == "bow")) && (($xclass == "Cleric"))){$item = "potion of extra-healing";}
		else if (($magic_item == "bow")){$item = "dart +1";}
		else {$item = "potion of healing";}
	}

endwhile;

	return array($item,$armor_class);
}

?>