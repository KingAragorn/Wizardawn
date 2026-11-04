<?php

function raceAdventurer()
{
	switch (mt_rand(0,6))
	{
		case 0:	$p_race = "Dwarf";	break;
		case 1:	$p_race = "Elf";	break;
		case 2:	$p_race = "Gnome";	break;
		case 3:	$p_race = "Half-Elf";	break;
		case 4:	$p_race = "Halfling";	break;
		case 5:	$p_race = "Half-Orc";	break;
		case 6:	$p_race = "Human";	break;
	}
	return $p_race;
}
function jobsAdventurer($jclass)
{
	if ($jclass == "Assassin"){ 		switch (mt_rand(0,5)){case 0: $worker = "Dwarf"; break;		case 1: $worker = "Elf"; break;		case 2: $worker = "Gnome"; break;	case 3: $worker = "Half-Elf"; break;	case 4: $worker = "Half-Orc"; break;	case 5: $worker = "Human"; break; } }
	else if ($jclass == "Cleric"){		switch (mt_rand(0,5)){case 0: $worker = "Dwarf"; break;		case 1: $worker = "Elf"; break;		case 2: $worker = "Gnome"; break;	case 3: $worker = "Half-Elf"; break;	case 4: $worker = "Half-Orc"; break;	case 5: $worker = "Human"; break; } }
	else if ($jclass == "Druid"){		switch (mt_rand(0,1)){case 0: $worker = "Halfling"; break;	case 1: $worker = "Human"; break; } }
	else if ($jclass == "Fighter"){		switch (mt_rand(0,6)){case 0: $worker = "Dwarf"; break;		case 1: $worker = "Elf"; break;		case 2: $worker = "Gnome"; break;	case 3: $worker = "Half-Elf"; break;	case 4: $worker = "Half-Orc"; break;	case 5: $worker = "Human"; break;	case 6: $worker = "Halfling"; } }
	else if ($jclass == "Illusionist"){	switch (mt_rand(0,1)){case 0: $worker = "Gnome"; break;		case 1: $worker = "Human"; break; } }
	else if ($jclass == "Magic-User"){	switch (mt_rand(0,2)){case 0: $worker = "Elf"; break;		case 1: $worker = "Half-Elf"; break;		case 2: $worker = "Human"; break; } }
	else if ($jclass == "Paladin"){		switch (mt_rand(0,0)){case 0: $worker = "Human"; break; } }
	else if ($jclass == "Ranger"){		switch (mt_rand(0,1)){case 0: $worker = "Half-Elf"; break;	case 1: $worker = "Human"; break; } }
	else if ($jclass == "Thief"){		switch (mt_rand(0,6)){case 0: $worker = "Dwarf"; break;		case 1: $worker = "Elf"; break;		case 2: $worker = "Gnome"; break;	case 3: $worker = "Half-Elf"; break;	case 4: $worker = "Half-Orc"; break;	case 5: $worker = "Human"; break;	case 6: $worker = "Halfling"; } }

	return $worker;
}
function checkAdventurer($jclass,$jrace)
{
	$true = 0;
	if (($jclass == "Assassin") && (($jrace == "Dwarf") || ($jrace == "Elf") || ($jrace == "Gnome") || ($jrace == "Half-Elf") || ($jrace == "Half-Orc") || ($jrace == "Human"))){$true = 1;}
	else if (($jclass == "Cleric") && (($jrace == "Dwarf") || ($jrace == "Elf") || ($jrace == "Gnome") || ($jrace == "Half-Elf") || ($jrace == "Half-Orc") || ($jrace == "Human"))){$true = 1;}
	else if (($jclass == "Druid") && (($jrace == "Halfling") || ($jrace == "Human"))){$true = 1;}
	else if (($jclass == "Fighter") && (($jrace == "Dwarf") || ($jrace == "Elf") || ($jrace == "Gnome") || ($jrace == "Half-Elf") || ($jrace == "Half-Orc") || ($jrace == "Human") || ($jrace == "Halfling"))){$true = 1;}
	else if (($jclass == "Illusionist") && (($jrace == "Gnome") || ($jrace == "Human"))){$true = 1;}
	else if (($jclass == "Magic-User") && (($jrace == "Elf") || ($jrace == "Half-Elf") || ($jrace == "Human"))){$true = 1;}
	else if (($jclass == "Paladin") && ($jrace == "Human")){$true = 1;}
	else if (($jclass == "Ranger") && (($jrace == "Half-Elf") || ($jrace == "Human"))){$true = 1;}
	else if (($jclass == "Thief") && (($jrace == "Dwarf") || ($jrace == "Elf") || ($jrace == "Gnome") || ($jrace == "Half-Elf") || ($jrace == "Half-Orc") || ($jrace == "Human") || ($jrace == "Halfling"))){$true = 1;}

	return $true;
}
function makeAdventurer($jclass,$jrace,$jmax,$jlvl1,$jlvl2,$jrelics,$jsex)
{
	$game = "OSRIC";

	///// PICK A SEX /////////////////////////////////////////////////////////////////////////////////////////////
	if ($jsex == "Male"){$p_sex = "Male"; $p_sufn = "He"; $p_sufx = "him";} else if ($jsex == "Female"){$p_sex = "Female"; $p_sufn = "She"; $p_sufx = "her";}
	else
	{
		switch (mt_rand(0,2))
		{
			case 0:	$p_sex = "Male";	$p_sufn = "He";		$p_sufx = "him";		break;
			case 1:	$p_sex = "Male";	$p_sufn = "He";		$p_sufx = "him";		break;
			case 2:	$p_sex = "Female";	$p_sufn = "She";	$p_sufx = "her";		break;
		}
	}

	if (($jclass != "0") && ($jrace != "0")){ $allowable = checkAdventurer($jclass,$jrace); }
		if (($jclass != "0") && ($jrace != "0") && ($allowable > 0)){ $p_race = $jrace; }
		else if ($jclass != "0"){ $p_race = jobsAdventurer($jclass); }
		else if ($jrace != "0"){ $p_race = $jrace; $jclass = "";}
		else
		{
			if (mt_rand(1,3) > 1)
			{
				switch (mt_rand(0,8))
				{
					case 0:	$jclass = "Assassin";		break;
					case 1:	$jclass = "Cleric";			break;
					case 2:	$jclass = "Druid";			break;
					case 3:	$jclass = "Fighter";		break;
					case 4:	$jclass = "Paladin";		break;
					case 5:	$jclass = "Ranger";			break;
					case 6:	$jclass = "Illusionist";	break;
					case 7:	$jclass = "Magic-User";		break;
					case 8:	$jclass = "Thief";			break;
				}
				$p_race = jobsAdventurer($jclass);
			}
			else
			{
				$p_race = raceAdventurer();
			}
		}

	///// PICK A CLASS ////////////////////////////////////////////////////////////////////////////////////////////
	if ($p_race == "Dwarf")
	{
		$th_sk1 = -10;	$th_sk2 = 15;	$th_sk3 = 0;	$th_sk4 = 0;	$th_sk5 = -5;	$th_sk6 = 15;	$th_sk7 = 0;	$th_sk8 = -5;	
		$p_ab_str = mt_rand(8,18);	$p_ab_dex = mt_rand(3,17);	$p_ab_con = mt_rand(12,19);	$p_ab_int = mt_rand(3,18);	$p_ab_wis = mt_rand(3,18);	$p_ab_cha = mt_rand(3,16);
		$p_name = dwarfName();
		if ($jclass == "Assassin"){$jme = 0;} else if ($jclass == "Cleric"){$jme = 1;} else if ($jclass == "Fighter"){$jme = 2;} else if ($jclass == "Thief"){$jme = 3;} else {$jme = mt_rand(0,3);}
		switch ($jme)
		{
			case 0:	$p_class = "Assassin";	$p_age = 75+mt_rand(3,18);		$p_lvl_limit = 9;		$p_ab_str = mt_rand(12,18);		$p_ab_dex = mt_rand(12,17);		$p_ab_con = mt_rand(12,19);		$p_ab_int = mt_rand(11,18);		$p_ab_wis = mt_rand(6,18);		break;
			case 1:	$p_class = "Cleric";	$p_age = 250+mt_rand(2,40);		$p_lvl_limit = 8;		$p_ab_str = mt_rand(8,18);		$p_ab_dex = mt_rand(3,7);		$p_ab_con = mt_rand(12,19);		$p_ab_int = mt_rand(6,18);		$p_ab_wis = mt_rand(9,18);		$p_ab_cha = mt_rand(6,16);		break;
			case 2:	$p_class = "Fighter";	$p_age = 40+mt_rand(5,20);		$p_ab_str = mt_rand(9,18);   if ($p_ab_str > 17){$p_lvl_limit = 9;}	else if ($p_ab_str > 16){$p_lvl_limit = 8;}	else {$p_lvl_limit = 7;}				$p_ab_dex = mt_rand(6,17);		$p_ab_con = mt_rand(12,19);		$p_ab_int = mt_rand(3,18);		$p_ab_wis = mt_rand(6,18);		$p_ab_cha = mt_rand(6,16);		break;
			case 3:	$p_class = "Thief";		$p_age = 75+mt_rand(3,18);		$p_lvl_limit = 20;	break;
		}
		$p_notes = $p_sufn . " has a +1 to hit goblins, half-orcs, hobgoblins, and orcs. " . $p_sufn . " also gives a -4 penalty to any giants, ogres, orge mages, titans, or trolls that attack " . $p_sufx . ". " . $p_sufn . " can speak dwarf, gnome, goblin, kobold, and orc. They have infravision up to 60'. ";
		$p_skills = "Detect the existence of slopes or grades: 75% / Detect the existence of new construction: 75% / Detect sliding or shifting rooms or walls: 66% / Detect traps involving stonework: 50% / Determine depth underground: 50% / ";
	}
	else if ($p_race == "Elf")
	{
		$th_sk1 = -5;	$th_sk2 = 5;	$th_sk3 = 5;	$th_sk4 = 10;	$th_sk5 = 5;	$th_sk6 = -5;	$th_sk7 = 5;	$th_sk8 = 10;	
		$p_ab_str = mt_rand(3,18);	$p_ab_dex = mt_rand(7,19);	$p_ab_con = mt_rand(8,17);	$p_ab_int = mt_rand(8,18);	$p_ab_wis = mt_rand(3,18);	$p_ab_cha = mt_rand(8,18);
		$p_name = elfName();
		if ($jclass == "Assassin"){$jme = 0;} else if ($jclass == "Cleric"){$jme = 1;} else if ($jclass == "Fighter"){$jme = 2;} else if ($jclass == "Thief"){$jme = 3;} else if ($jclass == "Magic-User"){$jme = 4;} else {$jme = mt_rand(0,4);}
		switch ($jme)
		{
			case 0:	$p_class = "Assassin";		$p_age = 100+mt_rand(5,30);		$p_lvl_limit = 10;		$p_ab_str = mt_rand(12,18);		$p_ab_dex = mt_rand(12,19);		$p_ab_con = mt_rand(8,17);		$p_ab_int = mt_rand(11,18);		$p_ab_wis = mt_rand(6,18);		break;
			case 1:	$p_class = "Cleric";		$p_age = 500+mt_rand(10,100);	$p_lvl_limit = 7;		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(7,19);		$p_ab_con = mt_rand(8,17);		$p_ab_int = mt_rand(8,18);		$p_ab_wis = mt_rand(9,18);		$p_ab_cha = mt_rand(8,18);		break;
			case 2:	$p_class = "Fighter";		$p_age = 130+mt_rand(5,30);		$p_ab_str = mt_rand(9,18);		if ($p_ab_str > 17){$p_lvl_limit = 7;}	else if ($p_ab_str > 16){$p_lvl_limit = 6;}	else {$p_lvl_limit = 5;}	$p_ab_dex = mt_rand(7,19);		$p_ab_con = mt_rand(8,17);		$p_ab_int = mt_rand(8,18);		$p_ab_wis = mt_rand(6,18);		$p_ab_cha = mt_rand(8,18);		break;
			case 3:	$p_class = "Thief";			$p_age = 100+mt_rand(5,30);		$p_lvl_limit = 10;		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(9,19);		$p_ab_con = mt_rand(8,17);		$p_ab_int = mt_rand(8,18);		$p_ab_cha = mt_rand(8,18);		break;
			case 4:	$p_class = "Magic-User";	$p_age = 150+mt_rand(5,30);		$p_ab_str = mt_rand(3,18);		$p_ab_dex = mt_rand(7,19);		$p_ab_con = mt_rand(8,17);		$p_ab_int = mt_rand(9,18);		if ($p_ab_int > 17){$p_lvl_limit = 11;}	else if ($p_ab_int > 16){$p_lvl_limit = 10;}	else {$p_lvl_limit = 9;}	$p_ab_wis = mt_rand(6,18);		$p_ab_cha = mt_rand(8,18);		break;
		}
		$p_notes = $p_sufn . " has a 90% resistance to sleep and charm spells. " . $p_sufn . " can speak elf, gnoll, gnome, goblin, halfling, hobgoblin, and orc. " . $p_sufn . " has infravision up to 60'. ";
		$p_skills = "Detect secret doors: 2 in 6 / Surprised: 4 in 6 / +1 to hit with pulled bows, long swords, and short swords / ";
	}
	else if ($p_race == "Gnome")
	{
		$th_sk1 = -15;	$th_sk2 = 0;	$th_sk3 = 5;	$th_sk4 = 0;	$th_sk5 = 0;	$th_sk6 = 10;	$th_sk7 = 0;	$th_sk8 = 0;	
		$p_ab_str = mt_rand(6,18);	$p_ab_dex = mt_rand(3,18);	$p_ab_con = mt_rand(8,18);	$p_ab_int = mt_rand(7,18);	$p_ab_wis = mt_rand(3,18);	$p_ab_cha = mt_rand(3,18);
		$p_name = gnomeName();
		if ($jclass == "Assassin"){$jme = 0;} else if ($jclass == "Cleric"){$jme = 1;} else if ($jclass == "Fighter"){$jme = 2;} else if ($jclass == "Thief"){$jme = 3;} else if ($jclass == "Illusionist"){$jme = 4;} else {$jme = mt_rand(0,4);}
		switch ($jme)
		{
			case 0:	$p_class = "Assassin";		$p_age = 80+mt_rand(3,36);		$p_lvl_limit = 8;		$p_ab_str = mt_rand(12,18);		$p_ab_dex = mt_rand(12,18);		$p_ab_con = mt_rand(8,18);		$p_ab_int = mt_rand(11,18);		$p_ab_wis = mt_rand(6,18);		break;
			case 1:	$p_class = "Cleric";		$p_age = 300+mt_rand(3,36);		$p_lvl_limit = 7;		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(3,18);		$p_ab_con = mt_rand(8,18);		$p_ab_int = mt_rand(7,18);		$p_ab_wis = mt_rand(9,18);		$p_ab_cha = mt_rand(6,18);		break;
			case 2:	$p_class = "Fighter";		$p_age = 60+mt_rand(5,20);		$p_ab_str = mt_rand(9,18);		if ($p_ab_str > 17){$p_lvl_limit = 6;}	else {$p_lvl_limit = 5;}	$p_ab_dex = mt_rand(6,18);		$p_ab_con = mt_rand(8,18);		$p_ab_int = mt_rand(7,18);		$p_ab_wis = mt_rand(6,18);		$p_ab_cha = mt_rand(6,18);		break;
			case 3:	$p_class = "Thief";			$p_age = 80+mt_rand(3,36);		$p_lvl_limit = 8;		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(9,18);		$p_ab_con = mt_rand(8,18);		$p_ab_int = mt_rand(7,18);		$p_ab_cha = mt_rand(6,18);		break;
			case 4:	$p_class = "Illusionist";	$p_age = 100+mt_rand(2,24);		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(16,18);		$p_ab_int = mt_rand(15,18);		$p_ab_wis = mt_rand(7,18);		$p_ab_cha = mt_rand(6,18);
							if (($p_ab_dev > 17) && ($p_ad_int > 16)){$p_lvl_limit = 7;}
							else if (($p_ab_dev > 16) && ($p_ad_int > 17)){$p_lvl_limit = 7;}
							else if (($p_ab_dev > 16) && ($p_ad_int > 16)){$p_lvl_limit = 6;}
							else {$p_lvl_limit = 5;}
					break;
		}
		$p_notes = $p_sufn . " has a +1 to hit kobolds and goblins. " . $p_sufn . " also gives a -4 penalty to any bugbears, giants, gnolls, ogres, ogre mages, titans, and trolls that attack " . $p_sufx . ". " . $p_sufn . " can speak dwarf, gnome, goblin, halfling, and kobold. " . $p_sufn . " has infravision up to 60'. ";
		$p_skills = "Detect the existence of slopes or grades: 80% / Detect the existence of unsafe walls, ceilings, or floors: 70% / Detect direction underground: 50% / Determine depth underground: 60% / ";
	}
	else if ($p_race == "Half-Elf")
	{
		$th_sk1 = 0;	$th_sk2 = 0;	$th_sk3 = 0;	$th_sk4 = 5;	$th_sk5 = 0;	$th_sk6 = 0;	$th_sk7 = 10;	$th_sk8 = 0;	
		$p_ab_str = mt_rand(3,18);	$p_ab_dex = mt_rand(6,18);	$p_ab_con = mt_rand(6,18);	$p_ab_int = mt_rand(4,18);	$p_ab_wis = mt_rand(3,18);	$p_ab_cha = mt_rand(3,18);
		if ($p_sex == "Male"){$p_name = humanMaleName();} else {$p_name = humanFemaleName();}
		if (mt_rand(1,2) == 1){ $p_name = elfName(); }
		if ($jclass == "Assassin"){$jme = 0;} else if ($jclass == "Cleric"){$jme = 1;} else if ($jclass == "Fighter"){$jme = 2;} else if ($jclass == "Thief"){$jme = 3;} else if ($jclass == "Magic-User"){$jme = 4;} else if ($jclass == "Ranger"){$jme = 5;} else {$jme = mt_rand(0,5);}
		switch ($jme)
		{
			case 0:	$p_class = "Assassin";		$p_age = 22+mt_rand(3,24);		$p_lvl_limit = 11;		$p_ab_str = mt_rand(12,18);		$p_ab_dex = mt_rand(12,18);		$p_ab_con = mt_rand(6,18);		$p_ab_int = mt_rand(11,18);		$p_ab_wis = mt_rand(6,18);		break;
			case 1:	$p_class = "Cleric";		$p_age = 40+mt_rand(2,8);		$p_lvl_limit = 5;		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(6,18);		$p_ab_con = mt_rand(6,18);		$p_ab_int = mt_rand(6,18);		$p_ab_wis = mt_rand(9,18);		$p_ab_cha = mt_rand(6,18);		break;
			case 2:	$p_class = "Fighter";		$p_age = 22+mt_rand(3,12);		$p_ab_str = mt_rand(9,18);		if ($p_ab_str > 17){$p_lvl_limit = 8;}	else if ($p_ab_str > 16){$p_lvl_limit = 7;}	else {$p_lvl_limit = 6;}		$p_ab_dex = mt_rand(6,18);		$p_ab_con = mt_rand(7,18);		$p_ab_int = mt_rand(3,18);		$p_ab_wis = mt_rand(6,18);		$p_ab_cha = mt_rand(6,18);		break;
			case 3:	$p_class = "Thief";			$p_age = 22+mt_rand(3,24);		$p_lvl_limit = 11;		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(9,18);		$p_ab_con = mt_rand(6,18);		$p_ab_int = mt_rand(6,18);		$p_ab_cha = mt_rand(6,18);		break;
			case 4:	$p_class = "Magic-User";	$p_age = 30+mt_rand(2,16);		$p_ab_str = mt_rand(3,18);		$p_ab_dex = mt_rand(6,18);		$p_ab_con = mt_rand(6,18);		$p_ab_int = mt_rand(9,18);		if ($p_ab_int > 17){$p_lvl_limit = 8;}	else if ($p_ab_int > 16){$p_lvl_limit = 7;}	else {$p_lvl_limit = 6;}	$p_ab_wis = mt_rand(6,18);		$p_ab_cha = mt_rand(6,18);		break;
			case 5:	$p_class = "Ranger";		$p_age = 22+mt_rand(3,12);		$p_ab_str = mt_rand(13,18);		if ($p_ab_str > 17){$p_lvl_limit = 8;}	else if ($p_ab_str > 16){$p_lvl_limit = 7;}	else {$p_lvl_limit = 6;}	$p_ab_dex = mt_rand(6,18);		$p_ab_con = mt_rand(14,18);		$p_ab_int = mt_rand(13,18);		$p_ab_wis = mt_rand(14,18);		$p_ab_cha = mt_rand(6,18);		break;
		}
		$p_notes = $p_sufn . " has a 30% resistance to sleep and charm spells. " . $p_sufn . " can speak elf, gnoll, gnome, goblin, halfling, hobgoblin, and orc. " . $p_sufn . " has infravision up to 60'. ";
		$p_skills = "Detect secret doors: 2 in 6 / ";
	}
	else if ($p_race == "Halfling")
	{
		$th_sk1 = -15;	$th_sk2 = 0;	$th_sk3 = 5;	$th_sk4 = 15;	$th_sk5 = 15;	$th_sk6 = 0;	$th_sk7 = 5;	$th_sk8 = -5;	
		$p_ab_str = mt_rand(6,17);	$p_ab_dex = mt_rand(8,19);	$p_ab_con = mt_rand(10,18);	$p_ab_int = mt_rand(6,18);	$p_ab_wis = mt_rand(3,17);	$p_ab_cha = mt_rand(3,18);
		if ($p_sex == "Male"){$p_name = humanMaleName();} else {$p_name = humanFemaleName();}
		if (mt_rand(1,2) == 1){ $p_name = gnomeName(); }
		if (mt_rand(1,2) == 1){ $p_name = elfName(); }
		if ($jclass == "Fighter"){$jme = 0;} else if ($jclass == "Druid"){$jme = 1;} else if ($jclass == "Thief"){$jme = 2;} else {$jme = mt_rand(0,2);}
		switch ($jme)
		{
			case 0:	$p_class = "Fighter";	$p_age = 20+mt_rand(3,12);		$p_lvl_limit = 4;	$p_ab_dex = mt_rand(8,19);		$p_ab_con = mt_rand(10,18);		$p_ab_int = mt_rand(6,18);		$p_ab_wis = mt_rand(6,17);		$p_ab_cha = mt_rand(6,18);		break;
			case 1:	$p_class = "Druid";		$p_age = 40+mt_rand(3,12);		$p_lvl_limit = 6;	$p_ab_str = mt_rand(6,17);		$p_ab_dex = mt_rand(8,19);		$p_ab_con = mt_rand(10,18);		$p_ab_int = mt_rand(6,18);		$p_ab_wis = mt_rand(12,17);		$p_ab_cha = mt_rand(15,18);		break;
			case 2:	$p_class = "Thief";		$p_age = 40+mt_rand(2,8);		$p_lvl_limit = 20;	$p_ab_str = mt_rand(6,17);		$p_ab_dex = mt_rand(9,19);		$p_ab_con = mt_rand(10,18);		$p_ab_int = mt_rand(6,18);		$p_ab_cha = mt_rand(6,18);		break;
		}		
		$p_notes = $p_sufn . " has a +3 attack bonus with bows or slings. " . $p_sufn . " can speak dwarf, gnome, goblin, halfling, and orc. " . $p_sufn . " has infravision up to 60'. ";
	}
	else if ($p_race == "Half-Orc")
	{
		$th_sk1 = -5;	$th_sk2 = 5;	$th_sk3 = 5;	$th_sk4 = 0;	$th_sk5 = 0;	$th_sk6 = 5;	$th_sk7 = -5;	$th_sk8 = -10;	
		$p_ab_str = mt_rand(6,18);	$p_ab_dex = mt_rand(3,17);	$p_ab_con = mt_rand(13,19);	$p_ab_int = mt_rand(3,17);	$p_ab_wis = mt_rand(3,14);	$p_ab_cha = mt_rand(3,12);
		if ($p_sex == "Male"){$p_name = humanMaleName();} else {$p_name = humanFemaleName();}
		if (mt_rand(1,2) == 1){ $p_name = orcName(); }
		if ($jclass == "Assassin"){$jme = 0;} else if ($jclass == "Cleric"){$jme = 1;} else if ($jclass == "Fighter"){$jme = 2;} else if ($jclass == "Thief"){$jme = 3;} else {$jme = mt_rand(0,3);}
		switch ($jme)
		{
			case 0:	$p_class = "Assassin";	$p_age = 20+mt_rand(2,8);		$p_lvl_limit = 15;		$p_ab_str = mt_rand(12,18);		$p_ab_dex = mt_rand(12,17);		$p_ab_con = mt_rand(13,19);		$p_ab_int = mt_rand(11,17);		$p_ab_wis = mt_rand(6,14);		break;
			case 1:	$p_class = "Cleric";	$p_age = 20+mt_rand(1,4);		$p_lvl_limit = 4;		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(3,17);		$p_ab_con = mt_rand(13,19);		$p_ab_int = mt_rand(6,17);		$p_ab_wis = mt_rand(9,14);		$p_ab_cha = mt_rand(6,12);		break;
			case 2:	$p_class = "Fighter";	$p_age = 13+mt_rand(1,4);		$p_lvl_limit = 10;		$p_ab_str = mt_rand(9,18);		$p_ab_dex = mt_rand(6,17);		$p_ab_con = mt_rand(13,19);		$p_ab_int = mt_rand(3,17);		$p_ab_wis = mt_rand(6,14);		$p_ab_cha = mt_rand(6,12);		break;
			case 3:	$p_class = "Thief";		$p_age = 20+mt_rand(2,8);		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(9,17);		if ($p_ab_dex > 16){$p_lvl_limit = 7;}	else {$p_lvl_limit = 6;}	$p_ab_con = mt_rand(13,19);		$p_ab_int = mt_rand(6,17);		$p_ab_cha = mt_rand(6,12);		break;
		}
		$p_notes = $p_sufn . " can speak orc and has infravision up to 60'. ";
	}
	else if ($p_race == "Human")
	{
		$th_sk1 = 5;	$th_sk2 = 0;	$th_sk3 = 0;	$th_sk4 = 0;	$th_sk5 = 0;	$th_sk6 = 5;	$th_sk7 = 0;	$th_sk8 = 0;	
		$p_ab_str = mt_rand(3,18);	$p_ab_dex = mt_rand(3,18);	$p_ab_con = mt_rand(3,18);	$p_ab_int = mt_rand(3,18);	$p_ab_wis = mt_rand(3,18);	$p_ab_cha = mt_rand(3,18);
		if ($p_sex == "Male"){$p_name = humanMaleName();} else {$p_name = humanFemaleName();}
		if ($jclass == "Assassin"){$jme = 0;} else if ($jclass == "Cleric"){$jme = 1;} else if ($jclass == "Druid"){$jme = 2;} else if ($jclass == "Fighter"){$jme = 3;} else if ($jclass == "Illusionist"){$jme = 4;} else if ($jclass == "Magic-User"){$jme = 5;} else if ($jclass == "Paladin"){$jme = 6;} else if ($jclass == "Ranger"){$jme = 7;} else if ($jclass == "Thief"){$jme = 8;} else {$jme = mt_rand(0,8);}
		switch ($jme)
		{
			case 0:	$p_class = "Assassin";		$p_age = 20+mt_rand(1,4);		$p_lvl_limit = 15;		$p_ab_str = mt_rand(12,18);		$p_ab_dex = mt_rand(12,18);		$p_ab_con = mt_rand(6,18);		$p_ab_int = mt_rand(11,18);		$p_ab_wis = mt_rand(6,18);		break;
			case 1:	$p_class = "Cleric";		$p_age = 20+mt_rand(1,4);		$p_lvl_limit = 20;		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(3,18);		$p_ab_con = mt_rand(6,18);		$p_ab_int = mt_rand(6,18);		$p_ab_wis = mt_rand(9,18);		$p_ab_cha = mt_rand(6,18);		break;
			case 2:	$p_class = "Druid";			$p_age = 20+mt_rand(1,4);		$p_lvl_limit = 14;		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(6,18);		$p_ab_con = mt_rand(6,18);		$p_ab_int = mt_rand(6,18);		$p_ab_wis = mt_rand(12,18);		$p_ab_cha = mt_rand(15,18);		break;
			case 3:	$p_class = "Fighter";		$p_age = 15+mt_rand(1,4);		$p_lvl_limit = 20;		$p_ab_str = mt_rand(9,18);		$p_ab_dex = mt_rand(6,18);		$p_ab_con = mt_rand(7,18);		$p_ab_int = mt_rand(3,18);		$p_ab_wis = mt_rand(6,18);		$p_ab_cha = mt_rand(6,18);		break;
			case 4:	$p_class = "Illusionist";	$p_age = 24+mt_rand(2,8);		$p_lvl_limit = 20;		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(16,18);		$p_ab_int = mt_rand(15,18);		$p_ab_wis = mt_rand(6,18);		$p_ab_cha = mt_rand(6,18);		break;
			case 5:	$p_class = "Magic-User";	$p_age = 24+mt_rand(2,8);		$p_lvl_limit = 20;		$p_ab_str = mt_rand(3,18);		$p_ab_dex = mt_rand(6,18);		$p_ab_con = mt_rand(5,18);		$p_ab_int = mt_rand(9,18);		$p_ab_wis = mt_rand(6,18);		$p_ab_cha = mt_rand(6,18);		break;
			case 6:	$p_class = "Paladin";		$p_age = 15+mt_rand(1,4);		$p_lvl_limit = 20;		$p_ab_str = mt_rand(12,18);		$p_ab_dex = mt_rand(6,18);		$p_ab_con = mt_rand(9,18);		$p_ab_int = mt_rand(9,18);		$p_ab_wis = mt_rand(13,18);		$p_ab_cha = mt_rand(17,18);		break;
			case 7:	$p_class = "Ranger";		$p_age = 15+mt_rand(1,4);		$p_lvl_limit = 20;		$p_ab_str = mt_rand(13,18);		$p_ab_dex = mt_rand(6,18);		$p_ab_con = mt_rand(14,18);		$p_ab_int = mt_rand(13,18);		$p_ab_wis = mt_rand(14,18);		$p_ab_cha = mt_rand(6,18);		break;
			case 8:	$p_class = "Thief";			$p_age = 20+mt_rand(1,4);		$p_lvl_limit = 20;		$p_ab_str = mt_rand(6,18);		$p_ab_dex = mt_rand(9,18);		$p_ab_con = mt_rand(6,18);		$p_ab_int = mt_rand(6,18);		$p_ab_cha = mt_rand(6,18);		break;
		}
	}

	if (mt_rand(1,100) > 80)
	{
		if ($p_sex == "Male")
		{
			switch (mt_rand(0,2))
			{
				case 0:	$p_name = holmesName(male,1);		break;
				case 1:	$p_name = MaleName();				break;
				case 2:	$p_name = ConanName(none,male);		break;
			}
		}
		else
		{
			switch (mt_rand(0,2))
			{
				case 0:	$p_name = holmesName(female,1);		break;
				case 1:	$p_name = FemaleName();				break;
				case 2:	$p_name = ConanName(none,female);	break;
			}
		}
	}

	///// EXCEPTIONAL STRENGTH ? ///////////////////////////////////////////////////////////////////////////////////
	if (($p_ab_str == 18) && ($p_class == "Ranger" || $p_class == "Fighter" || $p_class == "Paladin")){$p_ab_str_xtra = mt_rand(1,100);} else {$p_ab_str_xtra = 0;}
	if ($p_ab_str_xtra > 99){$p_ab_str_xtra = 0; $p_ab_str = 19;}

	///// PICK A NAME //////////////////////////////////////////////////////////////////////////////////////////////
	if (mt_rand(1,3) == 1){ if ($p_sex == "Male"){$p_name = humanMaleName();} else {$p_name = humanFemaleName();} }
	else if (mt_rand(1,4) == 1){ $p_name = genericName(); }
	else if (mt_rand(1,6) == 1){ $p_name = authorName(); }
	if ((($p_class == "Magic-User") || ($p_class == "Illusionist")) && (mt_rand(1,2) == 1)){ $p_name = mageName(); }

	///// PICK AN ALIGNMENT ////////////////////////////////////////////////////////////////////////////////////////
	switch (mt_rand(0,2))
	{
		case 0:	$v_al1 = "L";	break;
		case 1:	$v_al1 = "N";	break;
		case 2:	$v_al1 = "C";	break;
	}
	switch (mt_rand(0,2))
	{
		case 0:	$v_al2 = "G";	break;
		case 1:	$v_al2 = "N";	break;
		case 2:	$v_al2 = "E";	break;
	}
		$p_alignment = $v_al1 . $v_al2;
		if ($p_alignment == "NN"){$p_alignment = "N";}
	if ($p_class == "Assassin"){$p_alignment = $v_al1 . "E";}
	else if ($p_class == "Druid"){$p_alignment = "N";}
	else if ($p_class == "Paladin"){$p_alignment = "LG";}
	else if ($p_class == "Ranger"){$p_alignment = $v_al1 . "G";}
	else if ($p_class == "Thief"){ if (($p_alignment == "LG") || ($p_alignment == "CG")){$p_alignment = "N";} }

	///// GET ABILITY BONUSES ////////////////////////////////////////////////////////////////////////////////////////
	$p_bdmg = ""; $p_bhit = ""; $p_minor_test = ""; $p_major_test = "";
	if ($p_ab_str > 18){$p_bhit = "+3"; $p_bdmg = "+6"; $p_minor_test = "1-5"; $p_major_test = "40%";}
	else if (($p_ab_str > 17) && ($p_ab_str_xtra > 90)){$p_bhit = "+2"; $p_bdmg = "+5"; $p_minor_test = "1-4"; $p_major_test = "35%";}
	else if (($p_ab_str > 17) && ($p_ab_str_xtra > 75)){$p_bhit = "+2"; $p_bdmg = "+4"; $p_minor_test = "1-4"; $p_major_test = "30%";}
	else if (($p_ab_str > 17) && ($p_ab_str_xtra > 50)){$p_bhit = "+2"; $p_bdmg = "+3"; $p_minor_test = "1-4"; $p_major_test = "25%";}
	else if (($p_ab_str > 17) && ($p_ab_str_xtra > 0)){$p_bhit = "+1"; $p_bdmg = "+3"; $p_minor_test = "1-3"; $p_major_test = "20%";}
	else if ($p_ab_str > 17){$p_bhit = "+1"; $p_bdmg = "+2"; $p_minor_test = "1-3"; $p_major_test = "16%";}
	else if ($p_ab_str > 16){$p_bhit = "+1"; $p_bdmg = "+1"; $p_minor_test = "1-3"; $p_major_test = "13%";}
	else if ($p_ab_str > 15){$p_bdmg = "+1"; $p_minor_test = "1-3"; $p_major_test = "10%";}
	else if ($p_ab_str > 13){$p_minor_test = "1-2"; $p_major_test = "7%";}
	else if ($p_ab_str > 11){$p_minor_test = "1-2"; $p_major_test = "4%";}
	else if ($p_ab_str > 9){$p_minor_test = "1-2"; $p_major_test = "2%";}
	else if ($p_ab_str > 7){$p_minor_test = "1-2"; $p_major_test = "1%";}
	else if ($p_ab_str < 4){$p_bhit = "-3"; $p_bdmg = "-1"; $p_minor_test = "1"; $p_major_test = "0%";}
	else if ($p_ab_str < 6){$p_bhit = "-2"; $p_bdmg = "-1"; $p_minor_test = "1"; $p_major_test = "0%";}
	else if ($p_ab_str < 8){$p_bhit = "-1"; $p_minor_test = "1"; $p_major_test = "0%";}

	$p_brng = ""; $p_barm = ""; $p_bsrp = ""; $x_my_acb = 0;
	if ($p_ab_dex > 17){$p_bsrp = "+3"; $p_brng = "+3"; $p_barm = "-4"; $x_my_acb = 4;}			else if ($p_ab_dex > 16){$p_bsrp = "+2"; $p_brng = "+2"; $p_barm = "-3"; $x_my_acb = 3;}
	else if ($p_ab_dex > 15){$p_bsrp = "+1"; $p_brng = "+1"; $p_barm = "-2"; $x_my_acb = 2;}	else if ($p_ab_dex > 14){$p_barm = "-1"; $x_my_acb = 1;}
	else if ($p_ab_dex < 4){$p_bsrp = "-3"; $p_brng = "-3"; $p_barm = "+4"; $x_my_acb = -4;}	else if ($p_ab_dex < 5){$p_bsrp = "-2"; $p_brng = "-2"; $p_barm = "+3"; $x_my_acb = -3;}
	else if ($p_ab_dex < 6){$p_bsrp = "-1"; $p_brng = "-1"; $p_barm = "+2"; $x_my_acb = -2;}	else if ($p_ab_dex < 7){$p_barm = "+1"; $x_my_acb = -1;}

	$p_bhps = ""; $x_bhps = 0; $p_consv = ""; $p_consh = "";
	if (($p_ab_con > 18) && (($p_class == "Fighter") || ($p_class == "Ranger") || ($p_class == "Paladin"))){$p_bhps = "+5"; $x_bhps = 5;}
	else if (($p_ab_con > 17) && (($p_class == "Fighter") || ($p_class == "Ranger") || ($p_class == "Paladin"))){$p_bhps = "+4"; $x_bhps = 4;}
	else if (($p_ab_con > 16) && (($p_class == "Fighter") || ($p_class == "Ranger") || ($p_class == "Paladin"))){$p_bhps = "+3"; $x_bhps = 3;}
	else if ($p_ab_con > 15){$p_bhps = "+2"; $x_bhps = 2;}
	else if ($p_ab_con > 14){$p_bhps = "+1"; $x_bhps = 1;}
	else if ($p_ab_con < 4){$p_bhps = "-2"; $x_bhps = -2;}
	else if ($p_ab_con < 7){$p_bhps = "-1"; $x_bhps = -1;}
	if ($p_ab_con < 4){ $p_consv = "40%"; $p_consh = "35%"; }	else if ($p_ab_con == 4){ $p_consv = "45%"; $p_consh = "40%"; }
	else if ($p_ab_con == 5){ $p_consv = "50%"; $p_consh = "45%"; }	else if ($p_ab_con == 14){ $p_consv = "92%"; $p_consh = "88%"; }
	else if ($p_ab_con == 6){ $p_consv = "55%"; $p_consh = "50%"; }	else if ($p_ab_con == 15){ $p_consv = "94%"; $p_consh = "91%"; }
	else if ($p_ab_con == 7){ $p_consv = "60%"; $p_consh = "55%"; }	else if ($p_ab_con == 16){ $p_consv = "96%"; $p_consh = "95%"; }
	else if ($p_ab_con == 8){ $p_consv = "65%"; $p_consh = "60%"; }	else if ($p_ab_con == 17){ $p_consv = "98%"; $p_consh = "97%"; }
	else if ($p_ab_con == 9){ $p_consv = "70%"; $p_consh = "65%"; }
	else if ($p_ab_con == 10){ $p_consv = "75%"; $p_consh = "70%"; }
	else if ($p_ab_con == 11){ $p_consv = "80%"; $p_consh = "75%"; }
	else if ($p_ab_con == 12){ $p_consv = "85%"; $p_consh = "80%"; }
	else if ($p_ab_con == 13){ $p_consv = "90%"; $p_consh = "85%"; } else { $p_consv = "100%"; $p_consh = "99%"; }

	$p_lngu = "";
	if ($p_ab_int > 18){ $p_lngu = "8 Extra Languages"; }	else if ($p_ab_int > 17){ $p_lngu = "7 Extra Languages"; }
	else if ($p_ab_int > 16){ $p_lngu = "6 Extra Languages"; }	else if ($p_ab_int > 15){ $p_lngu = "5 Extra Languages"; }
	else if ($p_ab_int > 13){ $p_lngu = "4 Extra Languages"; }	else if ($p_ab_int > 11){ $p_lngu = "3 Extra Languages"; }
	else if ($p_ab_int > 9){ $p_lngu = "2 Extra Languages"; }	else if ($p_ab_int > 7){ $p_lngu = "1 Extra Language"; }

	$p_hench = "";
	if ($p_ab_cha == 3){ $p_hench = "Hench: 1 / Loyal: -30% / React: -25%";}
	else if ($p_ab_cha == 4){ $p_hench = "Hench: 1 / Loyal: -30% / React: -25%";}
	else if ($p_ab_cha == 5){ $p_hench = "Hench: 2 / Loyal: -25% / React: -20%";}
	else if ($p_ab_cha == 6){ $p_hench = "Hench: 2 / Loyal: -20% / React: -15%";}
	else if ($p_ab_cha == 7){ $p_hench = "Hench: 3 / Loyal: -15% / React: -10%";}
	else if ($p_ab_cha == 8){ $p_hench = "Hench: 3 / Loyal: -10% / React: -5%";}
	else if ($p_ab_cha == 9){ $p_hench = "Hench: 4 / Loyal: -5%";}
	else if ($p_ab_cha == 10){ $p_hench = "Hench: 4";}
	else if ($p_ab_cha == 11){ $p_hench = "Hench: 4";}
	else if ($p_ab_cha == 12){ $p_hench = "Hench: 5";}
	else if ($p_ab_cha == 13){ $p_hench = "Hench: 5 / React: +5%";}
	else if ($p_ab_cha == 14){ $p_hench = "Hench: 6 / Loyal: +5% / React: +10%";}
	else if ($p_ab_cha == 15){ $p_hench = "Hench: 7 / Loyal: +15% / React: +15%";}
	else if ($p_ab_cha == 16){ $p_hench = "Hench: 8 / Loyal: +20% / React: +25%";}
	else if ($p_ab_cha == 17){ $p_hench = "Hench: 10 / Loyal: +30% / React: +30%";}
	else if ($p_ab_cha == 18){ $p_hench = "Hench: 15 / Loyal: +40% / React: +35%";}
	else if ($p_ab_cha > 18){ $p_hench = "Hench: 20 / Loyal: +50% / React: +40%";}

	///// ANY SAVING THROW BONUSES ///////////////////////////////////////////////////////////////////////////////////
	$p_msvt = ""; $b_rcsb=0;
	if ($p_ab_wis > 18){$p_msvt = "+5";}		else if ($p_ab_wis > 17){$p_msvt = "+4";}		else if ($p_ab_wis > 16){$p_msvt = "+3";}
	else if ($p_ab_wis > 15){$p_msvt = "+2";}	else if ($p_ab_wis > 14){$p_msvt = "+1";}		else if ($p_ab_wis < 4){$p_msvt = "-3";}
	else if ($p_ab_wis < 5){$p_msvt = "-2";}	else if ($p_ab_wis < 8){$p_msvt = "-1";}
	if ($p_msvt != ""){$p_notes = $p_notes . " " . $p_sufn . " has a " . $p_msvt . " to mental saving throws. ";}

	if (($p_race == "Dwarf") || ($p_race == "Gnome") || ($p_race == "Halfling")){ $b_rcsb = floor($p_ab_con/3.5); }
	if (($b_rcsb > 0) && (($p_race == "Dwarf") || ($p_race == "Gnome"))){$p_notes = $p_notes . " " . $p_sufn . " has a +" . $b_rcsb . " to saves against magic and poison. ";}
	else if (($b_rcsb > 0) && ($p_race == "Halfling")){$p_notes = $p_notes . " " . $p_sufn . " has a +" . $b_rcsb . " to saves against magic, rods, staffs, wands, and poison. ";}

	///// WHAT LEVEL ARE THEY ////////////////////////////////////////////////////////////////////////////////////////
	if ($jlvl2 > $p_lvl_limit){$jlvl2 = $p_lvl_limit;}
	if ($jlvl1 > $jlvl2){$jlvl1 = $jlvl2;}
	$p_level = mt_rand($jlvl1,$jlvl2);
		$p_age = $p_age + $p_level; // ASSUME A YEAR PER ADVENTURE LEVEL
	$p_hp = 0;
	$cyc_level = $p_level;
	$w_level = 0;

	if ($p_class == "Assassin")
	{
		if ($p_level > 12){$p_thaco = 14;} else if ($p_level > 8){$p_thaco = 16;} else if ($p_level > 4){$p_thaco = 19;} else {$p_thaco = 20;}
		$hit_dice = 6;
		if ($p_level > 12){		$p_xsv1 = 8;	$p_xsv2 = 13;	$p_xsv3 = 10;	$p_xsv4 = 9;	$p_xsv5 = 9;	$p_skills = $p_skills . "Read Scrolls / ";}
		else if ($p_level > 8){	$p_xsv1 = 10;	$p_xsv2 = 14;	$p_xsv3 = 11;	$p_xsv4 = 10;	$p_xsv5 = 11;}
		else if ($p_level > 4){	$p_xsv1 = 12;	$p_xsv2 = 15;	$p_xsv3 = 12;	$p_xsv4 = 11;	$p_xsv5 = 13;}
		else {					$p_xsv1 = 14;	$p_xsv2 = 16;	$p_xsv3 = 13;	$p_xsv4 = 12;	$p_xsv5 = 15;}
			$p_skills = $p_skills . "Assassination / Disguise / Poison / ";
			if ($p_level > 12){$p_notes = $p_notes . " " . $p_sufn . " can backstab with a +4 to hit and 5x damage. ";}
			else if ($p_level > 8){$p_notes = $p_notes . " " . $p_sufn . " can backstab with a +4 to hit and 4x damage. ";}
			else if ($p_level > 4){$p_notes = $p_notes . " " . $p_sufn . " can backstab with a +4 to hit and 3x damage. ";}
			else {$p_notes = $p_notes . " " . $p_sufn . " can backstab with a +4 to hit and 2x damage. ";}
	}
	else if ($p_class == "Cleric")
	{
		if ($p_level > 18){$p_thaco = 9;} else if ($p_level > 15){$p_thaco = 10;} else if ($p_level > 12){$p_thaco = 12;} else if ($p_level > 9){$p_thaco = 14;} else if ($p_level > 6){$p_thaco = 16;} else if ($p_level > 3){$p_thaco = 18;} else {$p_thaco = 20;}
		$sp_c_1 = 0;	$sp_c_2 = 0;	$sp_c_3 = 0;	$sp_c_4 = 0;
		$hit_dice = 8;
		if ($p_level > 18){		$p_xsv1 = 6;	$p_xsv2 = 8;	$p_xsv3 = 2;	$p_xsv4 = 5;	$p_xsv5 = 7;}
		else if ($p_level > 15){$p_xsv1 = 8;	$p_xsv2 = 10;	$p_xsv3 = 4;	$p_xsv4 = 7;	$p_xsv5 = 9;}
		else if ($p_level > 12){$p_xsv1 = 9;	$p_xsv2 = 11;	$p_xsv3 = 5;	$p_xsv4 = 8;	$p_xsv5 = 10;}
		else if ($p_level > 9){	$p_xsv1 = 10;	$p_xsv2 = 12;	$p_xsv3 = 6;	$p_xsv4 = 9;	$p_xsv5 = 11;}
		else if ($p_level > 6){	$p_xsv1 = 11;	$p_xsv2 = 13;	$p_xsv3 = 7;	$p_xsv4 = 10;	$p_xsv5 = 12;}
		else if ($p_level > 3){	$p_xsv1 = 13;	$p_xsv2 = 15;	$p_xsv3 = 9;	$p_xsv4 = 12;	$p_xsv5 = 14;}
		else {					$p_xsv1 = 14;	$p_xsv2 = 16;	$p_xsv3 = 10;	$p_xsv4 = 13;	$p_xsv5 = 15;}
			$p_skills = $p_skills . "Turn undead / ";
				if ($p_ab_wis == 13){$sp_c_1 = 1;}
				else if ($p_ab_wis == 14){$sp_c_1 = 2;}
				else if ($p_ab_wis == 15){$sp_c_1 = 2; $sp_c_2 = 1;}
				else if ($p_ab_wis == 16){$sp_c_1 = 2; $sp_c_2 = 2;}
				else if ($p_ab_wis == 17){$sp_c_1 = 2; $sp_c_2 = 2; $sp_c_3 = 1;}
				else if ($p_ab_wis == 18){$sp_c_1 = 2; $sp_c_2 = 2; $sp_c_3 = 1; $sp_c_4 = 1;}
				else if ($p_ab_wis == 19){$sp_c_1 = 3; $sp_c_2 = 2; $sp_c_3 = 1; $sp_c_4 = 1;}
					if ($p_level == 1){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+1) . "&nbsp;" . ($sp_c_2+0) . "&nbsp;" . ($sp_c_3+0) . "&nbsp;" . ($sp_c_4+0) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 2){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+2) . "&nbsp;" . ($sp_c_2+0) . "&nbsp;" . ($sp_c_3+0) . "&nbsp;" . ($sp_c_4+0) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 3){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+2) . "&nbsp;" . ($sp_c_2+1) . "&nbsp;" . ($sp_c_3+0) . "&nbsp;" . ($sp_c_4+0) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 4){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+3) . "&nbsp;" . ($sp_c_2+2) . "&nbsp;" . ($sp_c_3+0) . "&nbsp;" . ($sp_c_4+0) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 5){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+3) . "&nbsp;" . ($sp_c_2+3) . "&nbsp;" . ($sp_c_3+1) . "&nbsp;" . ($sp_c_4+0) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 6){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+3) . "&nbsp;" . ($sp_c_2+3) . "&nbsp;" . ($sp_c_3+2) . "&nbsp;" . ($sp_c_4+0) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 7){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+3) . "&nbsp;" . ($sp_c_2+3) . "&nbsp;" . ($sp_c_3+2) . "&nbsp;" . ($sp_c_4+1) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 8){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+3) . "&nbsp;" . ($sp_c_2+3) . "&nbsp;" . ($sp_c_3+3) . "&nbsp;" . ($sp_c_4+2) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 9){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+4) . "&nbsp;" . ($sp_c_2+4) . "&nbsp;" . ($sp_c_3+3) . "&nbsp;" . ($sp_c_4+2) . "&nbsp;1&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 10){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+4) . "&nbsp;" . ($sp_c_2+4) . "&nbsp;" . ($sp_c_3+3) . "&nbsp;" . ($sp_c_4+3) . "&nbsp;2&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 11){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+5) . "&nbsp;" . ($sp_c_2+4) . "&nbsp;" . ($sp_c_3+4) . "&nbsp;" . ($sp_c_4+3) . "&nbsp;2&nbsp;1&nbsp;0) / ";}
					else if ($p_level == 12){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+6) . "&nbsp;" . ($sp_c_2+5) . "&nbsp;" . ($sp_c_3+5) . "&nbsp;" . ($sp_c_4+3) . "&nbsp;2&nbsp;2&nbsp;0) / ";}
					else if ($p_level == 13){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+6) . "&nbsp;" . ($sp_c_2+6) . "&nbsp;" . ($sp_c_3+6) . "&nbsp;" . ($sp_c_4+4) . "&nbsp;2&nbsp;2&nbsp;0) / ";}
					else if ($p_level == 14){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+6) . "&nbsp;" . ($sp_c_2+6) . "&nbsp;" . ($sp_c_3+6) . "&nbsp;" . ($sp_c_4+5) . "&nbsp;3&nbsp;2&nbsp;0) / ";}
					else if ($p_level == 15){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+7) . "&nbsp;" . ($sp_c_2+7) . "&nbsp;" . ($sp_c_3+7) . "&nbsp;" . ($sp_c_4+5) . "&nbsp;4&nbsp;2&nbsp;0) / ";}
					else if ($p_level == 16){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+7) . "&nbsp;" . ($sp_c_2+7) . "&nbsp;" . ($sp_c_3+7) . "&nbsp;" . ($sp_c_4+6) . "&nbsp;5&nbsp;3&nbsp;1) / ";}
					else if ($p_level == 17){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+8) . "&nbsp;" . ($sp_c_2+8) . "&nbsp;" . ($sp_c_3+8) . "&nbsp;" . ($sp_c_4+6) . "&nbsp;5&nbsp;3&nbsp;1) / ";}
					else if ($p_level == 18){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+8) . "&nbsp;" . ($sp_c_2+8) . "&nbsp;" . ($sp_c_3+8) . "&nbsp;" . ($sp_c_4+7) . "&nbsp;6&nbsp;4&nbsp;1) / ";}
					else if ($p_level == 19){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+9) . "&nbsp;" . ($sp_c_2+9) . "&nbsp;" . ($sp_c_3+9) . "&nbsp;" . ($sp_c_4+7) . "&nbsp;6&nbsp;4&nbsp;2) / ";}
					else if ($p_level == 20){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+9) . "&nbsp;" . ($sp_c_2+9) . "&nbsp;" . ($sp_c_3+9) . "&nbsp;" . ($sp_c_4+8) . "&nbsp;7&nbsp;5&nbsp;2) / ";}
					else if ($p_level == 21){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+9) . "&nbsp;" . ($sp_c_2+9) . "&nbsp;" . ($sp_c_3+9) . "&nbsp;" . ($sp_c_4+9) . "&nbsp;8&nbsp;6&nbsp;2) / ";}
					else if ($p_level == 22){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+9) . "&nbsp;" . ($sp_c_2+9) . "&nbsp;" . ($sp_c_3+9) . "&nbsp;" . ($sp_c_4+9) . "&nbsp;9&nbsp;6&nbsp;3) / ";}
					else if ($p_level == 23){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+9) . "&nbsp;" . ($sp_c_2+9) . "&nbsp;" . ($sp_c_3+9) . "&nbsp;" . ($sp_c_4+9) . "&nbsp;9&nbsp;7&nbsp;3) / ";}
					else {$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(" . ($sp_c_1+9) . "&nbsp;" . ($sp_c_2+9) . "&nbsp;" . ($sp_c_3+9) . "&nbsp;" . ($sp_c_4+9) . "&nbsp;9&nbsp;8&nbsp;3) / ";}
	}
	else if ($p_class == "Druid")
	{
		if ($p_level > 12){$p_thaco = 12;} else if ($p_level > 9){$p_thaco = 14;} else if ($p_level > 6){$p_thaco = 16;} else if ($p_level > 3){$p_thaco = 18;} else {$p_thaco = 20;}
		$sp_c_1 = 0;	$sp_c_2 = 0;	$sp_c_3 = 0;	$sp_c_4 = 0;
		$hit_dice = 8;
		if ($p_level > 12){		$p_xsv1 = 9;	$p_xsv2 = 11;	$p_xsv3 =5;		$p_xsv4 = 8;	$p_xsv5 = 10;}
		else if ($p_level > 9){	$p_xsv1 = 10;	$p_xsv2 = 12;	$p_xsv3 = 6;	$p_xsv4 = 9;	$p_xsv5 = 11;}
		else if ($p_level > 6){	$p_xsv1 = 11;	$p_xsv2 = 13;	$p_xsv3 = 7;	$p_xsv4 = 10;	$p_xsv5 = 12;}
		else if ($p_level > 3){	$p_xsv1 = 13;	$p_xsv2 = 15;	$p_xsv3 = 9;	$p_xsv4 = 12;	$p_xsv5 = 14;}
		else {					$p_xsv1 = 14;	$p_xsv2 = 16;	$p_xsv3 = 10;	$p_xsv4 = 13;	$p_xsv5 = 15;}
			$p_notes = $p_notes . " " . $p_sufn . " has a +2 to saving throws against fire and lightning attacks. ";
			if ($p_level > 2){$p_skills = $p_skills . "Druid's knowledge / Wilderness mount / ";}
			if ($p_level > 6){$p_skills = $p_skills . "Immunity to fey charm / Shapeshift / ";}
				if ($p_ab_wis == 13){$sp_c_1 = 1;}
				else if ($p_ab_wis == 14){$sp_c_1 = 2;}
				else if ($p_ab_wis == 15){$sp_c_1 = 2; $sp_c_2 = 1;}
				else if ($p_ab_wis == 16){$sp_c_1 = 2; $sp_c_2 = 2;}
				else if ($p_ab_wis == 17){$sp_c_1 = 2; $sp_c_2 = 2; $sp_c_3 = 1;}
				else if ($p_ab_wis == 18){$sp_c_1 = 2; $sp_c_2 = 2; $sp_c_3 = 1; $sp_c_4 = 1;}
				else if ($p_ab_wis == 19){$sp_c_1 = 3; $sp_c_2 = 2; $sp_c_3 = 1; $sp_c_4 = 1;}
					if ($p_level == 1){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+2) . "&nbsp;" . ($sp_c_2+0) . "&nbsp;" . ($sp_c_3+0) . "&nbsp;" . ($sp_c_4+0) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 2){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+2) . "&nbsp;" . ($sp_c_2+1) . "&nbsp;" . ($sp_c_3+0) . "&nbsp;" . ($sp_c_4+0) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 3){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+3) . "&nbsp;" . ($sp_c_2+2) . "&nbsp;" . ($sp_c_3+1) . "&nbsp;" . ($sp_c_4+0) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 4){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+4) . "&nbsp;" . ($sp_c_2+2) . "&nbsp;" . ($sp_c_3+2) . "&nbsp;" . ($sp_c_4+0) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 5){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+4) . "&nbsp;" . ($sp_c_2+3) . "&nbsp;" . ($sp_c_3+2) . "&nbsp;" . ($sp_c_4+0) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 6){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+4) . "&nbsp;" . ($sp_c_2+3) . "&nbsp;" . ($sp_c_3+2) . "&nbsp;" . ($sp_c_4+1) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 7){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+4) . "&nbsp;" . ($sp_c_2+4) . "&nbsp;" . ($sp_c_3+3) . "&nbsp;" . ($sp_c_4+1) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 8){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+4) . "&nbsp;" . ($sp_c_2+4) . "&nbsp;" . ($sp_c_3+3) . "&nbsp;" . ($sp_c_4+2) . "&nbsp;0&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 9){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+5) . "&nbsp;" . ($sp_c_2+4) . "&nbsp;" . ($sp_c_3+3) . "&nbsp;" . ($sp_c_4+2) . "&nbsp;1&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 10){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+5) . "&nbsp;" . ($sp_c_2+4) . "&nbsp;" . ($sp_c_3+3) . "&nbsp;" . ($sp_c_4+3) . "&nbsp;2&nbsp;0&nbsp;0) / ";}
					else if ($p_level == 11){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+5) . "&nbsp;" . ($sp_c_2+5) . "&nbsp;" . ($sp_c_3+3) . "&nbsp;" . ($sp_c_4+3) . "&nbsp;2&nbsp;1&nbsp;0) / ";}
					else if ($p_level == 12){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+5) . "&nbsp;" . ($sp_c_2+5) . "&nbsp;" . ($sp_c_3+4) . "&nbsp;" . ($sp_c_4+4) . "&nbsp;3&nbsp;2&nbsp;1) / ";}
					else if ($p_level == 13){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+6) . "&nbsp;" . ($sp_c_2+5) . "&nbsp;" . ($sp_c_3+5) . "&nbsp;" . ($sp_c_4+5) . "&nbsp;4&nbsp;3&nbsp;2) / ";}
					else if ($p_level == 14){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(" . ($sp_c_1+6) . "&nbsp;" . ($sp_c_2+6) . "&nbsp;" . ($sp_c_3+6) . "&nbsp;" . ($sp_c_4+6) . "&nbsp;5&nbsp;4&nbsp;3) / ";}
	}
	else if ($p_class == "Fighter")
	{
		if ($p_level == 0){$p_thaco = 20;} else if ($p_level == 1){$p_thaco = 20;} else if ($p_level == 2){$p_thaco = 19;} else if ($p_level == 3){$p_thaco = 18;} else if ($p_level == 4){$p_thaco = 17;} else if ($p_level == 5){$p_thaco = 16;} else if ($p_level == 6){$p_thaco = 15;} else if ($p_level == 7){$p_thaco = 14;} else if ($p_level == 8){$p_thaco = 13;} else if ($p_level == 9){$p_thaco = 12;} else if ($p_level == 10){$p_thaco = 11;} else if ($p_level == 11){$p_thaco = 10;} else if ($p_level == 12){$p_thaco = 9;} else if ($p_level == 13){$p_thaco = 8;} else if ($p_level == 14){$p_thaco = 7;} else if ($p_level == 15){$p_thaco = 6;} else if ($p_level == 16){$p_thaco = 5;} else if ($p_level == 17){$p_thaco = 4;} else if ($p_level == 18){$p_thaco = 3;} else if ($p_level == 19){$p_thaco = 2;} else {$p_thaco = 1;}
		$hit_dice = 10;
		if ($p_level > 18){		$p_xsv1 = 4;	$p_xsv2 = 3;	$p_xsv3 = 2;	$p_xsv4 = 3;	$p_xsv5 = 5;}
		else if ($p_level > 16){$p_xsv1 = 5;	$p_xsv2 = 4;	$p_xsv3 = 3;	$p_xsv4 = 4;	$p_xsv5 = 6;}
		else if ($p_level > 14){$p_xsv1 = 6;	$p_xsv2 = 4;	$p_xsv3 = 4;	$p_xsv4 = 5;	$p_xsv5 = 7;}
		else if ($p_level > 12){$p_xsv1 = 7;	$p_xsv2 = 5;	$p_xsv3 = 5;	$p_xsv4 = 6;	$p_xsv5 = 8;}
		else if ($p_level > 10){$p_xsv1 = 9;	$p_xsv2 = 8;	$p_xsv3 = 7;	$p_xsv4 = 8;	$p_xsv5 = 10;}
		else if ($p_level > 8){	$p_xsv1 = 10;	$p_xsv2 = 9;	$p_xsv3 = 8;	$p_xsv4 = 9;	$p_xsv5 = 11;}
		else if ($p_level > 6){	$p_xsv1 = 12;	$p_xsv2 = 12;	$p_xsv3 = 10;	$p_xsv4 = 11;	$p_xsv5 = 13;}
		else if ($p_level > 4){	$p_xsv1 = 13;	$p_xsv2 = 13;	$p_xsv3 = 11;	$p_xsv4 = 12;	$p_xsv5 = 14;}
		else if ($p_level > 2){	$p_xsv1 = 15;	$p_xsv2 = 16;	$p_xsv3 = 13;	$p_xsv4 = 14;	$p_xsv5 = 16;}
		else if ($p_level > 0){	$p_xsv1 = 16;	$p_xsv2 = 17;	$p_xsv3 = 14;	$p_xsv4 = 15;	$p_xsv5 = 17;}
		else {					$p_xsv1 = 18;	$p_xsv2 = 20;	$p_xsv3 = 16;	$p_xsv4 = 17;	$p_xsv5 = 19;}
			if ($p_level > 12){$p_notes = $p_notes . " " . $p_sufn . " can attack twice per round. ";}
			else if ($p_level > 6){$p_notes = $p_notes . " " . $p_sufn . " can attack three times for every two rounds. ";}
	}
	else if ($p_class == "Illusionist")
	{
		if ($p_level > 20){$p_thaco = 13;} else if ($p_level > 15){$p_thaco = 15;} else if ($p_level > 10){$p_thaco = 17;} else if ($p_level > 5){$p_thaco = 19;} else {$p_thaco = 20;}
		$hit_dice = 4;
		if ($p_level > 20){		$p_xsv1 = 3;	$p_xsv2 = 7;	$p_xsv3 = 8;	$p_xsv4 = 5;	$p_xsv5 = 4;}
		else if ($p_level > 15){$p_xsv1 = 5;	$p_xsv2 = 9;	$p_xsv3 = 10;	$p_xsv4 = 7;	$p_xsv5 = 6;}
		else if ($p_level > 10){$p_xsv1 = 7;	$p_xsv2 = 11;	$p_xsv3 = 11;	$p_xsv4 = 9;	$p_xsv5 = 8;}
		else if ($p_level > 5){	$p_xsv1 = 9;	$p_xsv2 = 13;	$p_xsv3 = 13;	$p_xsv4 = 11;	$p_xsv5 = 10;}
		else {					$p_xsv1 = 11;	$p_xsv2 = 15;	$p_xsv3 = 14;	$p_xsv4 = 13;	$p_xsv5 = 12;}
			if ($p_level == 1){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(1&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
			else if ($p_level == 2){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(2&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
			else if ($p_level == 3){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(2&nbsp;1&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
			else if ($p_level == 4){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(3&nbsp;2&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
			else if ($p_level == 5){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(4&nbsp;3&nbsp;1&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
			else if ($p_level == 6){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(4&nbsp;3&nbsp;2&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
			else if ($p_level == 7){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(4&nbsp;3&nbsp;2&nbsp;1&nbsp;0&nbsp;0&nbsp;0) / ";}
			else if ($p_level == 8){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(4&nbsp;3&nbsp;2&nbsp;2&nbsp;0&nbsp;0&nbsp;0) / ";}
			else if ($p_level == 9){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(5&nbsp;3&nbsp;3&nbsp;2&nbsp;0&nbsp;0&nbsp;0) / ";}
			else if ($p_level == 10){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(5&nbsp;4&nbsp;3&nbsp;2&nbsp;1&nbsp;0&nbsp;0) / ";}
			else if ($p_level == 11){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(5&nbsp;4&nbsp;3&nbsp;3&nbsp;2&nbsp;0&nbsp;0) / ";}
			else if ($p_level == 12){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(5&nbsp;5&nbsp;4&nbsp;3&nbsp;2&nbsp;1&nbsp;0) / ";}
			else if ($p_level == 13){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(5&nbsp;5&nbsp;4&nbsp;3&nbsp;2&nbsp;2&nbsp;0) / ";}
			else if ($p_level == 14){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(5&nbsp;5&nbsp;4&nbsp;3&nbsp;2&nbsp;2&nbsp;1) / ";}
			else if ($p_level == 15){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(5&nbsp;5&nbsp;4&nbsp;4&nbsp;2&nbsp;2&nbsp;2) / ";}
			else if ($p_level == 16){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(5&nbsp;5&nbsp;5&nbsp;4&nbsp;3&nbsp;2&nbsp;2) / ";}
			else if ($p_level == 17){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(6&nbsp;5&nbsp;5&nbsp;4&nbsp;3&nbsp;3&nbsp;2) / ";}
			else if ($p_level == 18){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(6&nbsp;6&nbsp;5&nbsp;4&nbsp;4&nbsp;3&nbsp;2) / ";}
			else if ($p_level == 19){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(6&nbsp;6&nbsp;5&nbsp;5&nbsp;5&nbsp;3&nbsp;2) / ";}
			else if ($p_level == 20){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(6&nbsp;6&nbsp;6&nbsp;5&nbsp;5&nbsp;4&nbsp;2) / ";}
			else if ($p_level == 21){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(6&nbsp;6&nbsp;6&nbsp;6&nbsp;5&nbsp;4&nbsp;3) / ";}
			else if ($p_level == 22){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(6&nbsp;6&nbsp;6&nbsp;6&nbsp;5&nbsp;5&nbsp;3) / ";}
			else if ($p_level == 23){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(6&nbsp;6&nbsp;6&nbsp;6&nbsp;6&nbsp;5&nbsp;4) / ";}
			else if ($p_level == 24){$p_skills = $p_skills . "Illusionist&nbsp;spells&nbsp;(6&nbsp;6&nbsp;6&nbsp;6&nbsp;6&nbsp;6&nbsp;5) / ";}
	}
	else if ($p_class == "Magic-User")
	{
		if ($p_level > 20){$p_thaco = 13;} else if ($p_level > 15){$p_thaco = 15;} else if ($p_level > 10){$p_thaco = 17;} else if ($p_level > 5){$p_thaco = 19;} else {$p_thaco = 20;}
		$hit_dice = 4;
		if ($p_level > 20){		$p_xsv1 = 3;	$p_xsv2 = 7;	$p_xsv3 = 8;	$p_xsv4 = 5;	$p_xsv5 = 4;}
		else if ($p_level > 15){$p_xsv1 = 5;	$p_xsv2 = 9;	$p_xsv3 = 10;	$p_xsv4 = 7;	$p_xsv5 = 6;}
		else if ($p_level > 10){$p_xsv1 = 7;	$p_xsv2 = 11;	$p_xsv3 = 11;	$p_xsv4 = 9;	$p_xsv5 = 8;}
		else if ($p_level > 5){	$p_xsv1 = 9;	$p_xsv2 = 13;	$p_xsv3 = 13;	$p_xsv4 = 11;	$p_xsv5 = 10;}
		else {					$p_xsv1 = 11;	$p_xsv2 = 15;	$p_xsv3 = 14;	$p_xsv4 = 13;	$p_xsv5 = 12;}
			if ($p_level > 6){$p_skills = $p_skills . "Eldritch craft / ";}
			if ($p_level > 11){$p_skills = $p_skills . "Eldritch power / ";}
				if ($p_level == 1){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(1&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 2){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(2&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 3){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(2&nbsp;1&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 4){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(3&nbsp;2&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 5){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(4&nbsp;2&nbsp;1&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 6){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(4&nbsp;3&nbsp;2&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 7){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(4&nbsp;3&nbsp;2&nbsp;1&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 8){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(4&nbsp;3&nbsp;3&nbsp;2&nbsp;0&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 9){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(4&nbsp;4&nbsp;3&nbsp;2&nbsp;1&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 10){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(4&nbsp;4&nbsp;3&nbsp;2&nbsp;2&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 11){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(4&nbsp;4&nbsp;4&nbsp;3&nbsp;3&nbsp;0&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 12){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(5&nbsp;4&nbsp;4&nbsp;3&nbsp;3&nbsp;1&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 13){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(5&nbsp;5&nbsp;4&nbsp;3&nbsp;3&nbsp;2&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 14){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(5&nbsp;5&nbsp;5&nbsp;4&nbsp;4&nbsp;2&nbsp;1&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 15){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(5&nbsp;5&nbsp;5&nbsp;4&nbsp;4&nbsp;3&nbsp;2&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 16){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(5&nbsp;5&nbsp;5&nbsp;4&nbsp;4&nbsp;3&nbsp;2&nbsp;1&nbsp;0) / ";}
				else if ($p_level == 17){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(5&nbsp;5&nbsp;5&nbsp;5&nbsp;5&nbsp;4&nbsp;3&nbsp;2&nbsp;0) / ";}
				else if ($p_level == 18){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(5&nbsp;5&nbsp;5&nbsp;5&nbsp;5&nbsp;4&nbsp;3&nbsp;2&nbsp;1) / ";}
				else if ($p_level == 19){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(5&nbsp;5&nbsp;5&nbsp;5&nbsp;5&nbsp;5&nbsp;4&nbsp;3&nbsp;1) / ";}
				else if ($p_level == 20){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(5&nbsp;5&nbsp;5&nbsp;5&nbsp;5&nbsp;5&nbsp;4&nbsp;3&nbsp;2) / ";}
				else if ($p_level == 21){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(6&nbsp;6&nbsp;5&nbsp;5&nbsp;5&nbsp;5&nbsp;4&nbsp;4&nbsp;2) / ";}
				else if ($p_level == 22){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(6&nbsp;6&nbsp;6&nbsp;6&nbsp;5&nbsp;5&nbsp;5&nbsp;4&nbsp;2) / ";}
				else if ($p_level == 23){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(6&nbsp;6&nbsp;6&nbsp;6&nbsp;6&nbsp;6&nbsp;5&nbsp;4&nbsp;3) / ";}
				else if ($p_level == 24){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(6&nbsp;6&nbsp;6&nbsp;6&nbsp;6&nbsp;6&nbsp;6&nbsp;5&nbsp;3) / ";}
	}
	else if ($p_class == "Paladin")
	{
		if ($p_level == 0){$p_thaco = 20;} else if ($p_level == 1){$p_thaco = 20;} else if ($p_level == 2){$p_thaco = 19;} else if ($p_level == 3){$p_thaco = 18;} else if ($p_level == 4){$p_thaco = 17;} else if ($p_level == 5){$p_thaco = 16;} else if ($p_level == 6){$p_thaco = 15;} else if ($p_level == 7){$p_thaco = 14;} else if ($p_level == 8){$p_thaco = 13;} else if ($p_level == 9){$p_thaco = 12;} else if ($p_level == 10){$p_thaco = 11;} else if ($p_level == 11){$p_thaco = 10;} else if ($p_level == 12){$p_thaco = 9;} else if ($p_level == 13){$p_thaco = 8;} else if ($p_level == 14){$p_thaco = 7;} else if ($p_level == 15){$p_thaco = 6;} else if ($p_level == 16){$p_thaco = 5;} else if ($p_level == 17){$p_thaco = 4;} else if ($p_level == 18){$p_thaco = 3;} else if ($p_level == 19){$p_thaco = 2;} else {$p_thaco = 1;}
		$hit_dice = 10;
		if ($p_level > 18){		$p_xsv1 = 2;	$p_xsv2 = 2;	$p_xsv3 = 2;	$p_xsv4 = 2;	$p_xsv5 = 3;}
		else if ($p_level > 16){$p_xsv1 = 3;	$p_xsv2 = 2;	$p_xsv3 = 2;	$p_xsv4 = 2;	$p_xsv5 = 4;}
		else if ($p_level > 14){$p_xsv1 = 4;	$p_xsv2 = 2;	$p_xsv3 = 2;	$p_xsv4 = 3;	$p_xsv5 = 5;}
		else if ($p_level > 12){$p_xsv1 = 5;	$p_xsv2 = 3;	$p_xsv3 = 3;	$p_xsv4 = 4;	$p_xsv5 = 6;}
		else if ($p_level > 10){$p_xsv1 = 7;	$p_xsv2 = 6;	$p_xsv3 = 5;	$p_xsv4 = 6;	$p_xsv5 = 8;}
		else if ($p_level > 8){	$p_xsv1 = 8;	$p_xsv2 = 7;	$p_xsv3 = 6;	$p_xsv4 = 7;	$p_xsv5 = 9;}
		else if ($p_level > 6){	$p_xsv1 = 10;	$p_xsv2 = 10;	$p_xsv3 = 8;	$p_xsv4 = 9;	$p_xsv5 = 11;}
		else if ($p_level > 4){	$p_xsv1 = 11;	$p_xsv2 = 11;	$p_xsv3 = 9;	$p_xsv4 = 10;	$p_xsv5 = 12;}
		else if ($p_level > 2){	$p_xsv1 = 13;	$p_xsv2 = 14;	$p_xsv3 = 11;	$p_xsv4 = 12;	$p_xsv5 = 14;}
		else {					$p_xsv1 = 14;	$p_xsv2 = 15;	$p_xsv3 = 12;	$p_xsv4 = 13;	$p_xsv5 = 15;}
			if ($p_level > 9){$p_notes = $p_notes . " " . $p_sufn . " can cure disease with a touch three times a week. ";}
			else if ($p_level > 6){$p_notes = $p_notes . " " . $p_sufn . " can cure disease with a touch twice a week. ";}
			else {$p_notes = $p_notes . " " . $p_sufn . " can cure disease with a touch once a week. ";}
			$p_notes = $p_notes . " " . $p_sufn . " may detect evil up to 60' away and radiate a 10' aura of evil protection. ";
			$p_notes = $p_notes . " " . $p_sufn . " can lay hands, healing " . (2*$p_level) . " points of damage once per day. ";
			if ($p_level > 4){$p_notes = $p_notes . " " . $p_sufn . " can turn undead as a level " . ($p_level - 2) . " cleric. ";}
			if ($p_level > 15){$p_notes = $p_notes . " " . $p_sufn . " can attack twice per round. ";}
			else if ($p_level > 7){$p_notes = $p_notes . " " . $p_sufn . " can attack three times for every two rounds. ";}
				if ($p_level == 9){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(1&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 10){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(2&nbsp;0&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 11){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(2&nbsp;1&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 12){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(2&nbsp;2&nbsp;0&nbsp;0) / ";}
				else if ($p_level == 13){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(2&nbsp;2&nbsp;1&nbsp;0) / ";}
				else if ($p_level == 14){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(3&nbsp;2&nbsp;1&nbsp;0) / ";}
				else if ($p_level == 15){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(3&nbsp;2&nbsp;1&nbsp;1) / ";}
				else if ($p_level == 16){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(3&nbsp;3&nbsp;1&nbsp;1) / ";}
				else if ($p_level == 17){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(3&nbsp;3&nbsp;2&nbsp;1) / ";}
				else if ($p_level == 18){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(3&nbsp;3&nbsp;3&nbsp;1) / ";}
				else if ($p_level == 19){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(3&nbsp;3&nbsp;3&nbsp;2) / ";}
				else if ($p_level == 20){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(3&nbsp;3&nbsp;3&nbsp;3) / ";}
				else if ($p_level == 21){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(4&nbsp;3&nbsp;3&nbsp;3) / ";}
				else if ($p_level == 22){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(4&nbsp;4&nbsp;3&nbsp;3) / ";}
				else if ($p_level == 23){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(4&nbsp;4&nbsp;4&nbsp;3) / ";}
				else if ($p_level == 24){$p_skills = $p_skills . "Cleric&nbsp;spells&nbsp;(4&nbsp;4&nbsp;4&nbsp;4) / ";}
	}
	else if ($p_class == "Ranger")
	{
		if ($p_level == 0){$p_thaco = 20;} else if ($p_level == 1){$p_thaco = 20;} else if ($p_level == 2){$p_thaco = 19;} else if ($p_level == 3){$p_thaco = 18;} else if ($p_level == 4){$p_thaco = 17;} else if ($p_level == 5){$p_thaco = 16;} else if ($p_level == 6){$p_thaco = 15;} else if ($p_level == 7){$p_thaco = 14;} else if ($p_level == 8){$p_thaco = 13;} else if ($p_level == 9){$p_thaco = 12;} else if ($p_level == 10){$p_thaco = 11;} else if ($p_level == 11){$p_thaco = 10;} else if ($p_level == 12){$p_thaco = 9;} else if ($p_level == 13){$p_thaco = 8;} else if ($p_level == 14){$p_thaco = 7;} else if ($p_level == 15){$p_thaco = 6;} else if ($p_level == 16){$p_thaco = 5;} else if ($p_level == 17){$p_thaco = 4;} else if ($p_level == 18){$p_thaco = 3;} else if ($p_level == 19){$p_thaco = 2;} else {$p_thaco = 1;}
		$hit_dice = 8; $cyc_hp = mt_rand(1,8);
		if ($p_level > 18){		$p_xsv1 = 4;	$p_xsv2 = 3;	$p_xsv3 = 2;	$p_xsv4 = 3;	$p_xsv5 = 5;}
		else if ($p_level > 16){$p_xsv1 = 5;	$p_xsv2 = 4;	$p_xsv3 = 3;	$p_xsv4 = 4;	$p_xsv5 = 6;}
		else if ($p_level > 14){$p_xsv1 = 6;	$p_xsv2 = 4;	$p_xsv3 = 4;	$p_xsv4 = 5;	$p_xsv5 = 7;}
		else if ($p_level > 12){$p_xsv1 = 7;	$p_xsv2 = 5;	$p_xsv3 = 5;	$p_xsv4 = 6;	$p_xsv5 = 8;}
		else if ($p_level > 10){$p_xsv1 = 9;	$p_xsv2 = 8;	$p_xsv3 = 7;	$p_xsv4 = 8;	$p_xsv5 = 10;}
		else if ($p_level > 8){	$p_xsv1 = 10;	$p_xsv2 = 9;	$p_xsv3 = 8;	$p_xsv4 = 9;	$p_xsv5 = 11;}
		else if ($p_level > 6){	$p_xsv1 = 12;	$p_xsv2 = 12;	$p_xsv3 = 10;	$p_xsv4 = 11;	$p_xsv5 = 13;}
		else if ($p_level > 4){	$p_xsv1 = 13;	$p_xsv2 = 13;	$p_xsv3 = 11;	$p_xsv4 = 12;	$p_xsv5 = 14;}
		else if ($p_level > 2){	$p_xsv1 = 15;	$p_xsv2 = 16;	$p_xsv3 = 13;	$p_xsv4 = 14;	$p_xsv5 = 16;}
		else {					$p_xsv1 = 16;	$p_xsv2 = 17;	$p_xsv3 = 14;	$p_xsv4 = 15;	$p_xsv5 = 17;}
			if ($p_race != "Elf"){$p_skills = $p_skills . "Surprise others: 3 in 6 / ";}
			else {$p_skills = $p_skills . "Surprise others: 3 in 6 / Surprised: 1 in 6 / ";}
			$p_notes = $p_notes . " " . $p_sufn . " has a +" . $p_level . " damage bonus against evil humanoids or giant opponents, but only with melee weapons. ";
			$p_skills = $p_skills . "Rural tracking: 90% / Urban or dungeon tracking: 65% / ";
			if ($p_level > 14){$p_notes = $p_notes . " " . $p_sufn . " can attack twice per round. ";}
			else if ($p_level > 7){$p_notes = $p_notes . " " . $p_sufn . " can attack three times for every two rounds. ";}
			if ($p_level > 9){$p_notes = $p_notes . " " . $p_sufn . " is also able to use devices like crystal balls for scrying. ";}
				if ($p_level == 8){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(1&nbsp;0&nbsp;0&nbsp;) / ";}
				else if ($p_level == 9){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(1&nbsp;0&nbsp;0&nbsp;) / ";}
				else if ($p_level == 10){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(2&nbsp;0&nbsp;0&nbsp;) / ";}
				else if ($p_level == 11){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(2&nbsp;0&nbsp;0&nbsp;) / ";}
				else if ($p_level == 12){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(2&nbsp;1&nbsp;0&nbsp;) / ";}
				else if ($p_level == 13){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(2&nbsp;1&nbsp;0&nbsp;) / ";}
				else if ($p_level == 14){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(2&nbsp;2&nbsp;0&nbsp;) / ";}
				else if ($p_level == 15){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(2&nbsp;2&nbsp;0&nbsp;) / ";}
				else if ($p_level == 16){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(2&nbsp;2&nbsp;1&nbsp;) / ";}
				else if ($p_level == 17){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(2&nbsp;2&nbsp;2&nbsp;) / ";}
				else if ($p_level == 18){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(3&nbsp;2&nbsp;2&nbsp;) / ";}
				else if ($p_level == 19){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(3&nbsp;2&nbsp;2&nbsp;) / ";}
				else if ($p_level == 20){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(3&nbsp;3&nbsp;2&nbsp;) / ";}
				else if ($p_level == 21){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(3&nbsp;3&nbsp;2&nbsp;) / ";}
				else if ($p_level == 22){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(3&nbsp;3&nbsp;3&nbsp;) / ";}
				else if ($p_level == 23){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(4&nbsp;3&nbsp;3&nbsp;) / ";}
				else if ($p_level == 24){$p_skills = $p_skills . "Druid&nbsp;spells&nbsp;(4&nbsp;3&nbsp;3&nbsp;) / ";}

				if ($p_level == 9){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(1&nbsp;0) / ";}
				else if ($p_level == 10){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(1&nbsp;0) / ";}
				else if ($p_level == 11){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(2&nbsp;0) / ";}
				else if ($p_level == 12){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(2&nbsp;0) / ";}
				else if ($p_level == 13){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(2&nbsp;1) / ";}
				else if ($p_level == 14){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(2&nbsp;1) / ";}
				else if ($p_level == 15){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(2&nbsp;2) / ";}
				else if ($p_level == 16){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(2&nbsp;2) / ";}
				else if ($p_level == 17){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(2&nbsp;2) / ";}
				else if ($p_level == 18){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(2&nbsp;2) / ";}
				else if ($p_level == 19){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(3&nbsp;2) / ";}
				else if ($p_level == 20){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(3&nbsp;2) / ";}
				else if ($p_level == 21){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(3&nbsp;3) / ";}
				else if ($p_level == 22){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(3&nbsp;3) / ";}
				else if ($p_level == 23){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(3&nbsp;3) / ";}
				else if ($p_level == 24){$p_skills = $p_skills . "Magic-User&nbsp;spells&nbsp;(4&nbsp;3) / ";}
	}
	else if ($p_class == "Thief")
	{
		if ($p_level > 20){$p_thaco = 10;} else if ($p_level > 16){$p_thaco = 12;} else if ($p_level > 12){$p_thaco = 14;} else if ($p_level > 8){$p_thaco = 16;} else if ($p_level > 4){$p_thaco = 19;} else {$p_thaco = 20;}
		$hit_dice = 6;
		if ($p_level > 20){		$p_xsv1 = 4;	$p_xsv2 = 11;	$p_xsv3 = 8;	$p_xsv4 = 7;	$p_xsv5 = 5;}
		else if ($p_level > 16){$p_xsv1 = 6;	$p_xsv2 = 12;	$p_xsv3 = 9;	$p_xsv4 = 8;	$p_xsv5 = 7;}
		else if ($p_level > 12){$p_xsv1 = 8;	$p_xsv2 = 13;	$p_xsv3 = 10;	$p_xsv4 = 9;	$p_xsv5 = 9;}
		else if ($p_level > 8){	$p_xsv1 = 10;	$p_xsv2 = 14;	$p_xsv3 = 11;	$p_xsv4 = 10;	$p_xsv5 = 11;}
		else if ($p_level > 4){	$p_xsv1 = 12;	$p_xsv2 = 15;	$p_xsv3 = 12;	$p_xsv4 = 11;	$p_xsv5 = 13;}
		else {					$p_xsv1 = 14;	$p_xsv2 = 16;	$p_xsv3 = 13;	$p_xsv4 = 12;	$p_xsv5 = 15;}
			if ($p_level > 12){$p_notes = $p_notes . " " . $p_sufn . " can backstab with a +4 to hit and 5x damage. ";}
			else if ($p_level > 8){$p_notes = $p_notes . " " . $p_sufn . " can backstab with a +4 to hit and 4x damage. ";}
			else if ($p_level > 4){$p_notes = $p_notes . " " . $p_sufn . " can backstab with a +4 to hit and 3x damage. ";}
			else {$p_notes = $p_notes . " " . $p_sufn . " can backstab with a +4 to hit and 2x damage. ";}
	}

	///// DO THE HIT POINTS ////////////////////////////////////////////////////////////////////////////////////////
	while ($cyc_level > 0) :
		$w_level = $w_level + 1;
		if (($p_class == "Cleric") && ($w_level > 9)){$p_hp = $p_hp + 2;}
		else if (($p_class == "Fighter") && ($w_level > 9)){$p_hp = $p_hp + 3;}
		else if (($p_class == "Illusionist") && ($w_level > 10)){$p_hp = $p_hp + 1;}
		else if (($p_class == "Magic-User") && ($w_level > 11)){$p_hp = $p_hp + 1;}
		else if (($p_class == "Paladin") && ($w_level > 9)){$p_hp = $p_hp + 3;}
		else if (($p_class == "Ranger") && ($w_level > 11)){$p_hp = $p_hp + 2;}
		else if (($p_class == "Thief") && ($w_level > 10)){$p_hp = $p_hp + 2;}
		else if ($jmax > 0){$p_hp = $p_hp + $hit_dice + $x_bhps;}
		else {$p_hp = $p_hp + mt_rand(1,$hit_dice) + $x_bhps;}
		$cyc_level = $cyc_level-1;
	endwhile;

	///// THIEF SKILLS ////////////////////////////////////////////////////////////////////////////////////////////
	if (($p_class == "Thief") || ($p_class == "Assassin"))
	{
		if (($p_class == "Aassassin") && ($p_level < 4)){$a_level = 1;}		else if ($p_class == "Aassassin"){$a_level = $p_level - 2;}		else {$a_level = $p_level;}

		/// DEX BONUS ///
		if ($p_ab_dex == 9){		$th_sk2 = $th_sk2-15;	$th_sk4 = $th_sk4-10;	$th_sk5 = $th_sk5-20;	$th_sk6 = $th_sk6-10;	$th_sk7 = $th_sk7-15;}
		else if ($p_ab_dex == 10){	$th_sk2 = $th_sk2-10;	$th_sk4 = $th_sk4-5;	$th_sk5 = $th_sk5-15;	$th_sk6 = $th_sk6-5;	$th_sk7 = $th_sk7-10;}
		else if ($p_ab_dex == 11){	$th_sk2 = $th_sk2-5;	$th_sk4 = $th_sk4+0;	$th_sk5 = $th_sk5-10;	$th_sk6 = $th_sk6+0;	$th_sk7 = $th_sk7-5;}
		else if ($p_ab_dex == 12){	$th_sk2 = $th_sk2+0;	$th_sk4 = $th_sk4+0;	$th_sk5 = $th_sk5-5;	$th_sk6 = $th_sk6+0;	$th_sk7 = $th_sk7+0;}
		else if ($p_ab_dex == 16){	$th_sk2 = $th_sk2+0;	$th_sk4 = $th_sk4+0;	$th_sk5 = $th_sk5+0;	$th_sk6 = $th_sk6+5;	$th_sk7 = $th_sk7+0;}
		else if ($p_ab_dex == 17){	$th_sk2 = $th_sk2+5;	$th_sk4 = $th_sk4+5;	$th_sk5 = $th_sk5+5;	$th_sk6 = $th_sk6+10;	$th_sk7 = $th_sk7+0;}
		else if ($p_ab_dex == 18){	$th_sk2 = $th_sk2+10;	$th_sk4 = $th_sk4+10;	$th_sk5 = $th_sk5+10;	$th_sk6 = $th_sk6+15;	$th_sk7 = $th_sk7+5;}
		else if ($p_ab_dex == 19){	$th_sk2 = $th_sk2+15;	$th_sk4 = $th_sk4+15;	$th_sk5 = $th_sk5+15;	$th_sk6 = $th_sk6+20;	$th_sk7 = $th_sk7+15;}

		if ($a_level == 1){$th_sk1=$th_sk1+80; $th_sk2=$th_sk2+25; $th_sk3=$th_sk3+10; $th_sk4=$th_sk4+20; $th_sk5=$th_sk5+20; $th_sk6=$th_sk6+30; $th_sk7=$th_sk7+35; $th_sk8=$th_sk8+1;}
		else if ($a_level == 2){$th_sk1=$th_sk1+82; $th_sk2=$th_sk2+29; $th_sk3=$th_sk3+13; $th_sk4=$th_sk4+25; $th_sk5=$th_sk5+25; $th_sk6=$th_sk6+34; $th_sk7=$th_sk7+39; $th_sk8=$th_sk8+5;}
		else if ($a_level == 3){$th_sk1=$th_sk1+84; $th_sk2=$th_sk2+33; $th_sk3=$th_sk3+16; $th_sk4=$th_sk4+30; $th_sk5=$th_sk5+30; $th_sk6=$th_sk6+38; $th_sk7=$th_sk7+43; $th_sk8=$th_sk8+10;}
		else if ($a_level == 4){$th_sk1=$th_sk1+86; $th_sk2=$th_sk2+37; $th_sk3=$th_sk3+19; $th_sk4=$th_sk4+35; $th_sk5=$th_sk5+35; $th_sk6=$th_sk6+42; $th_sk7=$th_sk7+47; $th_sk8=$th_sk8+15;}
		else if ($a_level == 5){$th_sk1=$th_sk1+88; $th_sk2=$th_sk2+41; $th_sk3=$th_sk3+22; $th_sk4=$th_sk4+40; $th_sk5=$th_sk5+40; $th_sk6=$th_sk6+46; $th_sk7=$th_sk7+51; $th_sk8=$th_sk8+20;}
		else if ($a_level == 6){$th_sk1=$th_sk1+90; $th_sk2=$th_sk2+45; $th_sk3=$th_sk3+25; $th_sk4=$th_sk4+45; $th_sk5=$th_sk5+45; $th_sk6=$th_sk6+50; $th_sk7=$th_sk7+55; $th_sk8=$th_sk8+25;}
		else if ($a_level == 7){$th_sk1=$th_sk1+91; $th_sk2=$th_sk2+49; $th_sk3=$th_sk3+28; $th_sk4=$th_sk4+50; $th_sk5=$th_sk5+50; $th_sk6=$th_sk6+54; $th_sk7=$th_sk7+59; $th_sk8=$th_sk8+30;}
		else if ($a_level == 8){$th_sk1=$th_sk1+92; $th_sk2=$th_sk2+53; $th_sk3=$th_sk3+31; $th_sk4=$th_sk4+55; $th_sk5=$th_sk5+55; $th_sk6=$th_sk6+58; $th_sk7=$th_sk7+63; $th_sk8=$th_sk8+35;}
		else if ($a_level == 9){$th_sk1=$th_sk1+93; $th_sk2=$th_sk2+57; $th_sk3=$th_sk3+34; $th_sk4=$th_sk4+60; $th_sk5=$th_sk5+60; $th_sk6=$th_sk6+62; $th_sk7=$th_sk7+67; $th_sk8=$th_sk8+40;}
		else if ($a_level == 10){$th_sk1=$th_sk1+94; $th_sk2=$th_sk2+61; $th_sk3=$th_sk3+37; $th_sk4=$th_sk4+65; $th_sk5=$th_sk5+65; $th_sk6=$th_sk6+66; $th_sk7=$th_sk7+71; $th_sk8=$th_sk8+45;}
		else if ($a_level == 11){$th_sk1=$th_sk1+95; $th_sk2=$th_sk2+65; $th_sk3=$th_sk3+40; $th_sk4=$th_sk4+70; $th_sk5=$th_sk5+70; $th_sk6=$th_sk6+70; $th_sk7=$th_sk7+75; $th_sk8=$th_sk8+50;}
		else if ($a_level == 12){$th_sk1=$th_sk1+96; $th_sk2=$th_sk2+69; $th_sk3=$th_sk3+43; $th_sk4=$th_sk4+75; $th_sk5=$th_sk5+75; $th_sk6=$th_sk6+74; $th_sk7=$th_sk7+79; $th_sk8=$th_sk8+55;}
		else if ($a_level == 13){$th_sk1=$th_sk1+97; $th_sk2=$th_sk2+73; $th_sk3=$th_sk3+46; $th_sk4=$th_sk4+80; $th_sk5=$th_sk5+80; $th_sk6=$th_sk6+78; $th_sk7=$th_sk7+83; $th_sk8=$th_sk8+60;}
		else if ($a_level == 14){$th_sk1=$th_sk1+98; $th_sk2=$th_sk2+77; $th_sk3=$th_sk3+49; $th_sk4=$th_sk4+85; $th_sk5=$th_sk5+85; $th_sk6=$th_sk6+82; $th_sk7=$th_sk7+87; $th_sk8=$th_sk8+65;}
		else if ($a_level == 15){$th_sk1=$th_sk1+99; $th_sk2=$th_sk2+81; $th_sk3=$th_sk3+52; $th_sk4=$th_sk4+90; $th_sk5=$th_sk5+90; $th_sk6=$th_sk6+86; $th_sk7=$th_sk7+90; $th_sk8=$th_sk8+70;}
		else if ($a_level == 16){$th_sk1=$th_sk1+99; $th_sk2=$th_sk2+85; $th_sk3=$th_sk3+55; $th_sk4=$th_sk4+91; $th_sk5=$th_sk5+91; $th_sk6=$th_sk6+90; $th_sk7=$th_sk7+91; $th_sk8=$th_sk8+75;}
		else if ($a_level == 17){$th_sk1=$th_sk1+99; $th_sk2=$th_sk2+89; $th_sk3=$th_sk3+58; $th_sk4=$th_sk4+92; $th_sk5=$th_sk5+92; $th_sk6=$th_sk6+92; $th_sk7=$th_sk7+92; $th_sk8=$th_sk8+80;}
		else if ($a_level == 18){$th_sk1=$th_sk1+99; $th_sk2=$th_sk2+91; $th_sk3=$th_sk3+61; $th_sk4=$th_sk4+93; $th_sk5=$th_sk5+93; $th_sk6=$th_sk6+93; $th_sk7=$th_sk7+93; $th_sk8=$th_sk8+85;}
		else if ($a_level == 19){$th_sk1=$th_sk1+99; $th_sk2=$th_sk2+93; $th_sk3=$th_sk3+64; $th_sk4=$th_sk4+94; $th_sk5=$th_sk5+94; $th_sk6=$th_sk6+94; $th_sk7=$th_sk7+94; $th_sk8=$th_sk8+90;}
		else if ($a_level == 20){$th_sk1=$th_sk1+99; $th_sk2=$th_sk2+95; $th_sk3=$th_sk3+67; $th_sk4=$th_sk4+95; $th_sk5=$th_sk5+95; $th_sk6=$th_sk6+95; $th_sk7=$th_sk7+95; $th_sk8=$th_sk8+92;}
		else if ($a_level == 21){$th_sk1=$th_sk1+99; $th_sk2=$th_sk2+97; $th_sk3=$th_sk3+70; $th_sk4=$th_sk4+96; $th_sk5=$th_sk5+96; $th_sk6=$th_sk6+96; $th_sk7=$th_sk7+96; $th_sk8=$th_sk8+94;}
		else if ($a_level == 22){$th_sk1=$th_sk1+99; $th_sk2=$th_sk2+99; $th_sk3=$th_sk3+73; $th_sk4=$th_sk4+97; $th_sk5=$th_sk5+97; $th_sk6=$th_sk6+97; $th_sk7=$th_sk7+97; $th_sk8=$th_sk8+96;}
		else if ($a_level == 23){$th_sk1=$th_sk1+99; $th_sk2=$th_sk2+99; $th_sk3=$th_sk3+76; $th_sk4=$th_sk4+98; $th_sk5=$th_sk5+98; $th_sk6=$th_sk6+98; $th_sk7=$th_sk7+98; $th_sk8=$th_sk8+98;}
		else {$th_sk1=$th_sk1+99; $th_sk2=$th_sk2+99; $th_sk3=$th_sk3+79; $th_sk4=$th_sk4+99; $th_sk5=$th_sk5+99; $th_sk6=$th_sk6+99; $th_sk7=$th_sk7+99; $th_sk8=$th_sk8+99;}

		/// SET THE MAX TO 99 ///
		if ($th_sk1 > 99){$th_sk1 = 99;} if ($th_sk2 > 99){$th_sk2 = 99;} if ($th_sk3 > 99){$th_sk3 = 99;} if ($th_sk4 > 99){$th_sk4 = 99;} if ($th_sk5 > 99){$th_sk5 = 99;} if ($th_sk6 > 99){$th_sk6 = 99;} if ($th_sk7 > 99){$th_sk7 = 99;} if ($th_sk8 > 99){$th_sk8 = 99;}

		$p_skills = "Climb Walls: " . $th_sk1 . "% / Find Traps: " . $th_sk2 . "% / Hear Noise: " . $th_sk3 . "% / Hide in Shadows: " . $th_sk4 . "% / Move Quietly: " . $th_sk5 . "% / Open Locks: " . $th_sk6 . "% / Pick Pockets: " . $th_sk7 . "% / Read Languages: " . $th_sk8 . "% / " . $p_skills;
	}

	///// ADD SOME GEAR ////////////////////////////////////////////////////////////////////////////////////////////
	$hcolor = array('blue-green', 'black', 'blue', 'gray', 'dark-gray', 'light-gray', 'green', 'light-gray', 'red', 'brown', 'orange', 'yellowish-green', 'tan', 'light-blue', 'yellow', 'purple', 'light-purple', 'dark-purple', 'light-green', 'forest-green', 'white', 'dark-green', 'dark-red', 'light-red', 'light-brown', 'dark-brown');
	$bcolor = array('black', 'dark-brown', 'gray', 'dark-green', 'dark-red', 'brown', 'tan');
	$scolor = array('gold', 'silver', 'bronze', 'copper', 'platinum', 'metal', 'iron');
		$feet = array('fur boots', 'boots', 'thigh boots', 'shoes', 'sandals');
		$head = array('skullcap', 'tricorne hat', 'wide-brim hat', 'cap', 'bandana', 'feathered hat', 'floppy hat', 'wizard hat');
		$robe = array('robe', 'cloak');
		$shirt = array('doublet', 'tunic', 'shirt');
		$pants = array('pants', 'short pants', 'pants');

	$w_shoe = "";	$w_legs = "";	$w_vest = "";	$w_belt="";		$w_head = "";	$w_robe = "";

	if (($p_class == "Assassin") || ($p_class == "Thief"))
	{
		$w_shoe = ", " . $bcolor[mt_rand(0,6)] . " " . $feet[mt_rand(0,3)];
		$w_legs = ", " . $hcolor[mt_rand(0,25)] . " " . $pants[mt_rand(0,2)];
		$w_vest = ", " . $hcolor[mt_rand(0,25)] . " " . $shirt[mt_rand(0,2)];
		if (mt_rand(1,100) > 50){$w_head = ", " . $hcolor[mt_rand(0,25)] . " " . $head[mt_rand(0,6)];}
		if (mt_rand(1,100) > 60){$w_belt = ", a " . $bcolor[mt_rand(0,6)] . " belt"; if (mt_rand(1,100) > 60){$w_belt = $w_belt . " with a " . $scolor[mt_rand(0,6)] . " buckle";}}
	}
	else if (($p_class == "Magic-User") || ($p_class == "Illusionist"))
	{
		$w_shoe = ", " . $bcolor[mt_rand(0,6)] . " " . $feet[mt_rand(1,4)];
		$w_legs = ", " . $hcolor[mt_rand(0,25)] . " " . $pants[mt_rand(0,2)];
		$w_vest = ", " . $hcolor[mt_rand(0,25)] . " " . $shirt[mt_rand(0,2)];
		if (mt_rand(1,100) > 50){$w_head = ", " . $hcolor[mt_rand(0,25)] . " " . $head[mt_rand(2,7)];}
		if (mt_rand(1,100) > 30){$w_robe = ", " . $hcolor[mt_rand(0,25)] . " " . $robe[mt_rand(0,1)];}
		if (mt_rand(1,100) > 60){$w_belt = ", a " . $bcolor[mt_rand(0,6)] . " belt"; if (mt_rand(1,100) > 60){$w_belt = $w_belt . " with a " . $scolor[mt_rand(0,6)] . " buckle";}}
	}
	else if (($p_class == "Fighter") || ($p_class == "Paladin"))
	{
		$w_shoe = ", " . $bcolor[mt_rand(0,6)] . " " . $feet[mt_rand(0,2)];
		$w_legs = ", " . $hcolor[mt_rand(0,25)] . " " . $pants[mt_rand(0,2)];
		$w_vest = ", " . $hcolor[mt_rand(0,25)] . " " . $shirt[mt_rand(0,2)];
		if (mt_rand(1,100) > 50){$w_head = ", " . $hcolor[mt_rand(0,25)] . " " . $head[mt_rand(0,6)]; if (mt_rand(1,2) == 1){$w_head = ", helmet";}}
		if (mt_rand(1,100) > 60){$w_belt = ", a " . $bcolor[mt_rand(0,6)] . " belt"; if (mt_rand(1,100) > 60){$w_belt = $w_belt . " with a " . $scolor[mt_rand(0,6)] . " buckle";}}
	}
	else if ($p_class == "Cleric")
	{
		$w_shoe = ", " . $bcolor[mt_rand(0,6)] . " " . $feet[mt_rand(1,4)];
		$w_legs = ", " . $hcolor[mt_rand(0,25)] . " " . $pants[mt_rand(0,2)];
		$w_vest = ", " . $hcolor[mt_rand(0,25)] . " " . $shirt[mt_rand(0,2)];
		if (mt_rand(1,100) > 50){$w_head = ", " . $hcolor[mt_rand(0,25)] . " " . $head[mt_rand(0,6)]; if (mt_rand(1,3) == 1){$w_head = ", helmet";}}
		if (mt_rand(1,100) > 80){$w_robe = ", " . $hcolor[mt_rand(0,25)] . " " . $robe[mt_rand(0,1)];}
		if (mt_rand(1,100) > 60){$w_belt = ", a " . $bcolor[mt_rand(0,6)] . " belt"; if (mt_rand(1,100) > 60){$w_belt = $w_belt . " with a " . $scolor[mt_rand(0,6)] . " buckle";}}
	}
	else if ($p_class == "Druid")
	{
		$w_shoe = ", " . $bcolor[mt_rand(0,6)] . " " . $feet[mt_rand(1,3)];
		$w_legs = ", " . $hcolor[mt_rand(0,25)] . " " . $pants[mt_rand(0,2)];
		$w_vest = ", " . $hcolor[mt_rand(0,25)] . " " . $shirt[mt_rand(0,2)];
		if (mt_rand(1,100) > 50){$w_head = ", " . $hcolor[mt_rand(0,25)] . " " . $head[mt_rand(0,6)];}
		if (mt_rand(1,100) > 80){$w_robe = ", " . $hcolor[mt_rand(0,25)] . " " . $robe[mt_rand(0,1)];}
		if (mt_rand(1,100) > 60){$w_belt = ", a " . $bcolor[mt_rand(0,6)] . " belt"; if (mt_rand(1,100) > 60){$w_belt = $w_belt . " with a " . $scolor[mt_rand(0,6)] . " buckle";}}
	}
	else if ($p_class == "Ranger")
	{
		$w_shoe = ", " . $bcolor[mt_rand(0,6)] . " " . $feet[mt_rand(0,2)];
		$w_legs = ", " . $hcolor[mt_rand(0,25)] . " " . $pants[mt_rand(0,2)];
		$w_vest = ", " . $hcolor[mt_rand(0,25)] . " " . $shirt[mt_rand(0,2)];
		if (mt_rand(1,100) > 50){$w_head = ", " . $hcolor[mt_rand(0,25)] . " " . $head[mt_rand(0,6)]; if (mt_rand(1,6) == 1){$w_head = ", helmet";}}
		if (mt_rand(1,100) > 60){$w_belt = ", a " . $bcolor[mt_rand(0,6)] . " belt"; if (mt_rand(1,100) > 60){$w_belt = $w_belt . " with a " . $scolor[mt_rand(0,6)] . " buckle";}}
	}

	switch (mt_rand(0,2)) // ADD SOME MONEY //////////////////////////////////////////////////
	{
		case 0:	$w_cash = ", and a small pouch (" . currencyBuilder($p_level,1,0,$p_level,0,$game) . ")";	break;
		case 1:	$w_cash = ", and a belt pouch (" . currencyBuilder($p_level,1,0,$p_level,0,$game) . ")";	break;
		case 2:	$w_cash = ", and a small sack (" . currencyBuilder($p_level,1,0,$p_level,0,$game) . ")";	break;
	}

	$w_gear = givemeGear($p_class,$p_level,$jrelics);
	$w_stuff = $w_shoe . $w_belt . $w_legs . $w_head . $w_robe . $w_vest . $w_cash;
	$w_stuff = substr($w_stuff, 2);
	$w_stuff = $w_gear[0] . $w_stuff;
	$w_stuff = ucfirst($w_stuff) . ". ";

	$p_armor = 10-($w_gear[1] + $x_my_acb); if ($p_armor > 10){$p_armor = 10;} if ($p_armor < -10){$p_armor = -10;}

	return array($p_name, $p_race, $p_age, $p_sex, $p_class, $p_alignment, $p_ab_str, $p_ab_str_xtra, $p_ab_int, $p_ab_wis, $p_ab_dex, $p_ab_con, $p_ab_cha, $p_level, $p_hp, $p_armor, $p_barm, $p_bsrp, $p_bhit, $p_bdmg, $p_brng, $p_thaco, $p_xsv1, $p_xsv2, $p_xsv3, $p_xsv4, $p_xsv5, $p_notes, $p_skills, $w_stuff, $x_my_acb, $p_minor_test, $p_major_test, $p_consv, $p_consh, $p_bhps, $p_lngu, $p_msvt, $p_hench);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function givemeGear($class,$level,$relics)
{
	if (($relics > 0) && (($level*10) >= mt_rand(1,100)))
	{
		if (mt_rand(1,3) == 1){$arty = OsricMagicItem(club,$level,$class,1,0); $weapon = $arty[0] . ", "; }
		else {$arty = OsricMagicItem(sword,$level,$class,1,0); $weapon = $arty[0] . ", "; }
	}
	else
	{
		switch (mt_rand(2,25))
		{
			case 2:	$weapon = "battle axe, ";		$hands = 2; break;
			case 3:	$weapon = "halberd, ";			$hands = 2; break;
			case 4:	$weapon = "javelin, ";			$hands = 2; break;
			case 5:	$weapon = "morning star, ";		break;
			case 6:	$weapon = "heavy pick, ";		$hands = 2; break;
			case 7:	$weapon = "light pick, ";		break;
			case 8:	$weapon = "pole arm, ";			$hands = 2; break;
			case 9:	$weapon = "spear, ";			$hands = 2; break;
			case 10:$weapon = "claymore, ";			$hands = 2; break;
			case 11:$weapon = "bastard sword, ";	$hands = 2; break;
			case 12:$weapon = "broad sword, ";		$hands = 2; break;
			case 13:$weapon = "long sword, ";		break;
			case 14:$weapon = "scimitar, ";			break;
			case 15:$weapon = "short sword, ";		break;
			case 16:$weapon = "two-handed sword, ";	$hands = 2; break;
			case 17:$weapon = "trident, ";			$hands = 2; break;
			case 18:$weapon = "club, ";				break;
			case 19:$weapon = "staff, ";			$hands = 2; break;
			case 20:$weapon = "heavy mace, ";		$hands = 2; break;
			case 21:$weapon = "light mace, ";		break;
			case 22:$weapon = "heavy war hammer, ";	$hands = 2; break;
			case 23:$weapon = "light war hammer, ";	break;
			case 24:$weapon = "heavy flail, ";		$hands = 2; break;
			case 25:$weapon = "light flail, ";		break;
		}
	}
	if ((($class == "Fighter") || ($class == "Paladin") || ($class == "Ranger") || ($class == "Assassin")) && (mt_rand(1,100) > 60))
	{
		if (($relics > 0) && (($level*5) >= mt_rand(1,100))){$arty = OsricMagicItem(bow,$level,$class,1,1); $weapon = $weapon . $arty[0] . ", ";}
		else
		{
			switch (mt_rand(0,9))
			{
				case 0:	$weapon = $weapon . "dart (" . mt_rand(5,20) . " ea), ";							break;
				case 1:	$weapon = $weapon . "long bow, arrows (" . mt_rand(10,30) . " ea), ";				break;
				case 2:	$weapon = $weapon . "short bow, arrows (" . mt_rand(10,30) . " ea), ";				break;
				case 3:	$weapon = $weapon . "composite long bow, arrows (" . mt_rand(10,30) . " ea), ";		break;
				case 4:	$weapon = $weapon . "composite short bow, arrows (" . mt_rand(10,30) . " ea), ";	break;
				case 5:	$weapon = $weapon . "heavy crossbow, crossbow bolts (" . mt_rand(10,30) . " ea), ";	break;
				case 6:	$weapon = $weapon . "light crossbow, crossbow bolts (" . mt_rand(10,30) . " ea), ";	break;
				case 7:	$weapon = $weapon . "sling, sling stones (" . mt_rand(10,30) . " ea), ";			break;
				case 8:	$weapon = $weapon . "hand axe, ";													break;
				case 9:	$weapon = $weapon . "dagger, ";														break;
			}
		}
	}

	if (($class == "Assassin") || ($class == "Thief"))
	{
		if (($relics > 0) && (($level*10) >= mt_rand(1,100))){$arty = OsricMagicItem(suit,$level,$class,1,0); $armor = $arty[0] . ", "; $ac=$arty[1];}
		else
		{
			switch (mt_rand(0,1))
			{
				case 0:	$armor = "leather armor, ";			$ac = 2;		break;
				case 1:	$armor = "studded leather armor, ";	$ac = 3;		break;
			}
		}
		if ($class == "Thief")
		{
			if (($relics > 0) && (($level*10) >= mt_rand(1,100)))
			{
				if (mt_rand(1,3) == 1){$arty = OsricMagicItem(club,$level,$class,1,0); $weapon = $arty[0] . ", "; }
				else {$arty = OsricMagicItem(sword,$level,$class,1,0); $weapon = $arty[0] . ", "; }
			}
			else
			{
				switch (mt_rand(0,4))
				{
					case 0:	$weapon = "club, ";			break;
					case 1:	$weapon = "dagger, ";		break;
					case 2:	$weapon = "long sword, ";	break;
					case 3:	$weapon = "scimitar, ";		break;
					case 4:	$weapon = "short sword, ";	break;
				}
			}
			if (mt_rand(1,100) > 60)
			{
				if (($relics > 0) && (($level*5) >= mt_rand(1,100))){$arty = OsricMagicItem(bow,$level,$class,1,1); $weapon = $weapon . $arty[0] . ", ";}
				else
				{
					switch (mt_rand(0,2))
					{
						case 0:	$weapon = $weapon . "dagger, ";		break;
						case 1:	$weapon = $weapon . "darts[" . mt_rand(5,20) . " ea], ";		break;
						case 2:	$weapon = $weapon . "sling, sling stones (" . mt_rand(10,30) . " ea), ";		break;
					}
				}
			}
		}
		$pack = "thief tools, ";
		if ((mt_rand(1,100) > 70) && ($hands != 2) && ($class == "Assassin"))
		{
			if (($relics > 0) && (($level*10) >= mt_rand(1,100))){$arty = OsricMagicItem(shield,$level,$class,1,0); $shield = $arty[0] . ", "; $ac=$ac+$arty[1];}
			else {$shield = "shield, ";	$ac = $ac + 1;}
		}
	}
	else if (($class == "Magic-User") || ($class == "Illusionist"))
	{
		if (($relics > 0) && (($level*10) >= mt_rand(1,100))){$arty = OsricMagicItem(club,$level,$class,1,0); $weapon = $arty[0] . ", "; }
		else
		{
			switch (mt_rand(0,1))
			{
				case 0:	$weapon = "dagger, ";	break;
				case 1:	$weapon = "staff, ";	break;
			}
		}
		$pack = "spell book, ";
		if (mt_rand(1,100) > 60)
		{
			if (($relics > 0) && (($level*5) >= mt_rand(1,100))){$arty = OsricMagicItem(bow,$level,$class,1,1); $weapon = $weapon . $arty[0] . ", ";}
			else {$weapon = $weapon . "darts [" . mt_rand(5,20) . " ea], "; $i_have_range = 1;}
		}
	}
	else if (($class == "Fighter") || ($class == "Paladin") || ($class == "Ranger") || ($class == "Cleric"))
	{
		if (($relics > 0) && (($level*10) >= mt_rand(1,100))){$arty = OsricMagicItem(suit,$level,$class,1,0); $armor = $arty[0] . ", "; $ac=$arty[1];}
		else
		{
			switch (mt_rand(0,7))
			{
				case 0:	$armor = "leather armor, ";			$ac = 2;		break;
				case 1:	$armor = "studded leather armor, ";	$ac = 3;		break;
				case 2:	$armor = "banded mail armor, ";		$ac = 6;		break;
				case 3:	$armor = "chain mail armor, ";		$ac = 5;		break;
				case 4:	$armor = "plate mail armor, ";		$ac = 7;		break;
				case 5:	$armor = "ring mail armor, ";		$ac = 3;		break;
				case 6:	$armor = "scale mail armor, ";		$ac = 4;		break;
				case 7:	$armor = "splint mail armor, ";		$ac = 6;		break;
			}
		}
		if ($class == "Cleric")
		{
			if (($relics > 0) && (($level*10) >= mt_rand(1,100))){$arty = OsricMagicItem(club,$level,$class,1,0); $weapon = $arty[0] . ", "; }
			else
			{
			switch (mt_rand(0,7))
				{
					case 0:	$weapon = "club, ";					break;
					case 1:	$weapon = "staff, ";				$hands = 2; break;
					case 2:	$weapon = "heavy mace, ";			$hands = 2; break;
					case 3:	$weapon = "light mace, ";			break;
					case 4:	$weapon = "heavy war hammer, ";		$hands = 2; break;
					case 5:	$weapon = "light war hammer, ";		break;
					case 6:	$weapon = "heavy flail, ";			$hands = 2; break;
					case 7:	$weapon = "light flail, ";			break;
				}
			}
			switch (mt_rand(0,2))
			{
				case 0:	$pack = "wooden holy symbol, ";		break;
				case 1:	$pack = "silver holy symbol, ";		break;
				case 2:	$pack = "iron holy symbol, ";		break;
			}
			if (mt_rand(1,3) != 3){$pack = $pack . "holy water, ";}
			if (mt_rand(1,3) != 3){$pack = $pack . "prayer beads, ";}
		}
		if ((mt_rand(1,100) > 30) && ($hands != 2))
		{
			if (($relics > 0) && (($level*10) >= mt_rand(1,100))){$arty = OsricMagicItem(shield,$level,$class,1,0); $shield = $arty[0] . ", "; $ac=$ac+$arty[1];}
			else {$shield = "shield, ";	$ac = $ac + 1;}
		}
	}
	else if ($class == "Druid")
	{
		if (($relics > 0) && (($level*10) >= mt_rand(1,100))){$arty = OsricMagicItem(suit,$level,$class,1,0); $armor = $arty[0] . ", "; $ac=$arty[1];}
		else
		{
			switch (mt_rand(0,1))
			{
				case 0:	$armor = "leather armor, ";			$ac = 2;		break;
				case 1:	$armor = "studded leather armor, ";	$ac = 3;		break;
			}
		}
		if (($relics > 0) && (($level*10) >= mt_rand(1,100)))
		{
			if (mt_rand(1,3) == 1){$arty = OsricMagicItem(club,$level,$class,1,0); $weapon = $arty[0] . ", "; }
			else {$arty = OsricMagicItem(sword,$level,$class,1,0); $weapon = $arty[0] . ", "; }
		}
		else
		{
			switch (mt_rand(0,5))
			{
				case 0:	$weapon = "club, ";				break;
				case 1:	$weapon = "staff, ";			$hands = 2;break;
				case 2:	$weapon = "heavy war hammer, ";	$hands = 2;break;
				case 3:	$weapon = "light war hammer, ";	break;
				case 4:	$weapon = "scimitar, ";			break;
				case 5:	$weapon = "spear, ";			$hands = 2;break;
			}
		}
			if (mt_rand(1,100) > 60)
			{
				if (($relics > 0) && (($level*5) >= mt_rand(1,100))){$arty = OsricMagicItem(bow,$level,$class,1,1); $weapon = $weapon . $arty[0] . ", ";}
				else
				{
					switch (mt_rand(0,2))
					{
						case 0:	$weapon = $weapon . "dagger, ";		break;
						case 1:	$weapon = $weapon . "darts[" . mt_rand(5,20) . " ea], ";		break;
						case 2:	$weapon = $weapon . "sling, sling stones (" . mt_rand(10,30) . " ea), ";		break;
					}
				}
			}
			switch (mt_rand(0,2))
			{
				case 0:	$pack = "mistletoe, ";	break;
				case 1:	$pack = "holly, ";		break;
				case 2:	$pack = "oak leaves, ";	break;
			}
		if ((mt_rand(1,100) > 60) && ($hands != 2))
		{
			if (($relics > 0) && (($level*10) >= mt_rand(1,100))){$arty = OsricMagicItem(shield,$level,$class,1,0); $shield = $arty[0] . ", "; $ac=$ac+$arty[1];}
			else {$shield = "wooden shield, ";	$ac = $ac + 1;}
		}
	}

	// ANY FOOD AND OTHER CAMP GEAR //
	switch (mt_rand(0,1))
	{
		case 0:	$pack = $pack . "bedroll, ";	break;
		case 1:	$pack = $pack . "blanket, ";		break;
	}
	switch (mt_rand(0,1))
	{
		case 0:	$pack = $pack . "backpack, ";	break;
		case 1:	$pack = $pack . "leather sack, ";		break;
	}
	switch (mt_rand(0,2))
	{
		case 0:	$pack = $pack . "cheese, ";		break;
		case 1:	$pack = $pack . "bread, ";		break;
		case 2:	$pack = $pack . "ration, ";		break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$pack = $pack . "waterskin, ";			break;
		case 1:	$pack = $pack . "bottle of water, ";	break;
		case 2:	$pack = $pack . "bottle of wine, ";		break;
		case 3:	$pack = $pack . "bottle of ale, ";		break;
	}
	$packing = mt_rand(3,7);

	$xpik1 = 0;	$xpik2 = 0;	$xpik3 = 0;	$xpik4 = 0;	$xpik5 = 0;	$xpik6 = 0;	$xpik7 = 0;
	while ($packing > 0) :
		$pick = mt_rand(0,34);
			if (($xpik1 == $pick) || ($xpik2 == $pick) || ($xpik3 == $pick) || ($xpik4 == $pick) || ($xpik5 == $pick) || ($xpik6 == $pick) || ($xpik7 == $pick)){} else {
				switch ($pick)
				{
					case 0:	$pack = $pack . "block&nbsp;&&nbsp;tackle, ";		break;
					case 1:	$pack = $pack . "scroll&nbsp;case, ";		break;
					case 2:	$pack = $pack . "chain&nbsp;(" . mt_rand(5,20) . "&nbsp;ft), ";		break;
					case 3:	$pack = $pack . "crowbar, ";		break;
					case 4:	$pack = $pack . "empty&nbsp;flask, ";		break;
					case 5:	$pack = $pack . "flint&nbsp;&&nbsp;steel, ";		break;
					case 6:	$pack = $pack . "garlic&nbsp;(" . mt_rand(2,6) . "&nbsp;ea), ";		break;
					case 7:	if (mt_rand(1,2) == 1){$pack = $pack . "grappling&nbsp;hook, rope&nbsp;(" . mt_rand(2,10) . "0&nbsp;ft), ";} else {$pack = $pack . "rope&nbsp;(" . mt_rand(2,10) . "0&nbsp;ft), ";}		break;
					case 8:	$pack = $pack . "hammer, ";		break;
					case 9:	$pack = $pack . "vial&nbsp;of&nbsp;ink, ";		break;
					case 10:$pack = $pack . "quill, ";		break;
					case 11:$pack = $pack . "torch, ";		break;
					case 12:if (mt_rand(1,2) == 1){$pack = $pack . "bullseye&nbsp;lantern, ";} else {$pack = $pack . "hooded&nbsp;lantern, ";}		break;
					case 13:$pack = $pack . "lock&nbsp;&&nbsp;key, ";		break;
					case 14:$pack = $pack . "manacles, ";		break;
					case 15:$pack = $pack . "small&nbsp;mirror, ";		break;
					case 16:$pack = $pack . "flask&nbsp;of&nbsp;oil, ";		break;
					case 17:$pack = $pack . "paper&nbsp;(" . mt_rand(5,20) . "&nbsp;ea), ";		break;
					case 18:$pack = $pack . "ten&nbsp;foot&nbsp;pole, ";		break;
					case 19:$pack = $pack . "hammer&nbsp;&&nbsp;chisel, ";		break;
					case 20:$pack = $pack . "shovel, ";		break;
					case 21:$pack = $pack . "iron&nbsp;spikes (" . mt_rand(5,20) . "&nbsp;ea), ";		break;
					case 22:$pack = $pack . "spyglass, ";		break;
					case 23:$pack = $pack . "wooden&nbsp;stakes (" . mt_rand(3,8) . "&nbsp;ea), ";		break;
					case 24:$pack = $pack . "candle, ";		break;
					case 25:$pack = $pack . "wolfsbane, ";		break;
					case 26:$pack = $pack . "chalk, ";		break;
					case 27:$pack = $pack . "bell, ";		break;
					case 28:$pack = $pack . "bone&nbsp;dice, ";		break;
					case 29:$pack = $pack . "fishing&nbsp;net, ";		break;
					case 30:$pack = $pack . "needle&nbsp;&&nbsp;thread, ";		break;
					case 31:$pack = $pack . "whistle, ";		break;
					case 32:$pack = $pack . "tent, ";		break;
					case 33:$pack = $pack . "twine&nbsp;(" . mt_rand(4,10) . "0&nbsp;ft), ";		break;
					case 34:$pack = $pack . "whetstone, ";		break;
				}
				if ($xpik1 == 0){$xpik1 = $pick;} else if ($xpik2 == 0){$xpik2 = $pick;}  else if ($xpik3 == 0){$xpik3 = $pick;}  else if ($xpik4 == 0){$xpik4 = $pick;}  else if ($xpik5 == 0){$xpik5 = $pick;}  else if ($xpik6 == 0){$xpik6 = $pick;}  else if ($xpik7 == 0){$xpik7 = $pick;} 
				$packing = $packing - 1;
		}

	endwhile;

	// ANY LOOSE MAGICAL ITEMS
	if ($relics > 0)
	{
		if ((($level*15) >= mt_rand(1,100)) && ($class == "Magic-User")){$pack = $pack . "ring of protection (+" . mt_rand(1,3) . "), ";}
		if ((($level*15) >= mt_rand(1,100)) && ($class == "Illusionist")){$pack = $pack . "ring of protection (+" . mt_rand(1,3) . "), ";}
		if ((($level*2) >= mt_rand(1,100)) && ($class == "Cleric")){$pack = $pack . "ring of protection (+" . mt_rand(1,3) . "), ";}
		if ((($level*5) >= mt_rand(1,100)) && ($class == "Druid")){$pack = $pack . "ring of protection (+" . mt_rand(1,3) . "), ";}
		if ((($level*4) >= mt_rand(1,100)) && ($class == "Thief")){$pack = $pack . "ring of protection (+" . mt_rand(1,3) . "), ";}
		if ((($level*3) >= mt_rand(1,100)) && ($class == "Assassin")){$pack = $pack . "ring of protection (+" . mt_rand(1,3) . "), ";}
		if ((($level*4) >= mt_rand(1,100)) && ($class == "Magic-User")){$pack = $pack . "bracers of armor (+" . mt_rand(1,8) . "), ";}
		if ((($level*4) >= mt_rand(1,100)) && ($class == "Illusionist")){$pack = $pack . "bracers of armor (+" . mt_rand(1,8) . "), ";}

		if ((($level*6) >= mt_rand(1,100)) && ($class == "Cleric")){$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
		if ((($level*8) >= mt_rand(1,100)) && ($class == "Fighter")){$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
		if ((($level*6) >= mt_rand(1,100)) && ($class == "Paladin")){$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
		if ((($level*7) >= mt_rand(1,100)) && ($class == "Ranger")){$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
		if ((($level*5) >= mt_rand(1,100)) && ($class == "Assassin")){$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
		if ((($level*11) >= mt_rand(1,100)) && ($class == "Druid"))
		{
			$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";
			if (mt_rand(1,2) == 1){$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
		}
		if ((($level*10) >= mt_rand(1,100)) && ($class == "Illusionist"))
		{
			$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";
			if (mt_rand(1,2) == 1){$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
		}
		if ((($level*9) >= mt_rand(1,100)) && ($class == "Thief"))
		{
			$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";
			if (mt_rand(1,2) == 1){$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
		}
		if ((($level*10) >= mt_rand(1,100)) && ($class == "Magic-User"))
		{
			$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";
			if (mt_rand(1,2) == 1){$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
			if (mt_rand(1,3) == 1){$arty = OsricMagicItem(potion,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
		}
		if (($level > 4) && ($level*5) >= mt_rand(1,100)){$arty = OsricMagicItem(magic,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
		if (($level > 4) && ($level*5) >= mt_rand(1,100)){$arty = OsricMagicItem(magic,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
		if (($level > 4) && ($level*5) >= mt_rand(1,100)){$arty = OsricMagicItem(magic,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
		if (($level > 4) && ($level*5) >= mt_rand(1,100)){$arty = OsricMagicItem(magic,$level,$class,1,0); $pack = $pack . $arty[0] . ", ";}
	}

	$gear = $armor . $shield . $weapon . $pack;
	return array($gear, $ac);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function givemeXP($class,$level)
{

	if ($class == "Assassin")
	{
		if ($level == 2){$xp = 1600;}
		else if ($level == 3){$xp = 3000;}
		else if ($level == 4){$xp = 5750;}
		else if ($level == 5){$xp = 12250;}
		else if ($level == 6){$xp = 24750;}
		else if ($level == 7){$xp = 50000;}
		else if ($level == 8){$xp = 99000;}
		else if ($level == 9){$xp = 200500;}
		else if ($level == 10){$xp = 300000;}
		else if ($level == 11){$xp = 400000;}
		else if ($level == 12){$xp = 600000;}
		else if ($level == 13){$xp = 750000;}
		else if ($level == 14){$xp = 1000000;}
		else if ($level > 14){$xp = 1500000;}
		else {$xp = 0;}
	}
	else if ($class == "Cleric")
	{
		if ($level == 2){$xp = 1550;}
		else if ($level == 3){$xp = 2900;}
		else if ($level == 4){$xp = 6000;}
		else if ($level == 5){$xp = 13250;}
		else if ($level == 6){$xp = 27000;}
		else if ($level == 7){$xp = 55000;}
		else if ($level == 8){$xp = 110000;}
		else if ($level == 9){$xp = 220000;}
		else if ($level == 10){$xp = 450000;}
		else if ($level == 11){$xp = 675000;}
		else if ($level == 12){$xp = 900000;}
		else if ($level == 13){$xp = 1125000;}
		else if ($level == 14){$xp = 1350000;}
		else if ($level == 15){$xp = 1575000;}
		else if ($level == 16){$xp = 1800000;}
		else if ($level == 17){$xp = 2025000;}
		else if ($level == 18){$xp = 2250000;}
		else if ($level == 19){$xp = 2475000;}
		else if ($level == 20){$xp = 2700000;}
		else if ($level == 21){$xp = 2925000;}
		else if ($level == 22){$xp = 3150000;}
		else if ($level == 23){$xp = 3375000;}
		else if ($level > 23){$xp = 3600000;}
		else {$xp = 0;}
	}
	else if ($class == "Druid")
	{
		if ($level == 2){$xp = 2000;}
		else if ($level == 3){$xp = 4000;}
		else if ($level == 4){$xp = 8000;}
		else if ($level == 5){$xp = 12000;}
		else if ($level == 6){$xp = 20000;}
		else if ($level == 7){$xp = 35000;}
		else if ($level == 8){$xp = 60000;}
		else if ($level == 9){$xp = 90000;}
		else if ($level == 10){$xp = 125000;}
		else if ($level == 11){$xp = 200000;}
		else if ($level == 12){$xp = 300000;}
		else if ($level == 13){$xp = 750000;}
		else if ($level > 13){$xp = 1500000;}
		else {$xp = 0;}
	}
	else if ($class == "Fighter")
	{
		if ($level == 2){$xp = 1900;}
		else if ($level == 3){$xp = 4250;}
		else if ($level == 4){$xp = 7750;}
		else if ($level == 5){$xp = 16000;}
		else if ($level == 6){$xp = 35000;}
		else if ($level == 7){$xp = 75000;}
		else if ($level == 8){$xp = 125000;}
		else if ($level == 9){$xp = 250000;}
		else if ($level == 10){$xp = 500000;}
		else if ($level == 11){$xp = 750000;}
		else if ($level == 12){$xp = 1000000;}
		else if ($level == 13){$xp = 1250000;}
		else if ($level == 14){$xp = 1500000;}
		else if ($level == 15){$xp = 1750000;}
		else if ($level == 16){$xp = 2000000;}
		else if ($level == 17){$xp = 2250000;}
		else if ($level == 18){$xp = 2500000;}
		else if ($level == 19){$xp = 2750000;}
		else if ($level > 19){$xp = 3000000;}
		else {$xp = 0;}
	}
	else if ($class == "Illusionist")
	{
		if ($level == 2){$xp = 2500;}
		else if ($level == 3){$xp = 4750;}
		else if ($level == 4){$xp = 9000;}
		else if ($level == 5){$xp = 18000;}
		else if ($level == 6){$xp = 35000;}
		else if ($level == 7){$xp = 60250;}
		else if ($level == 8){$xp = 95000;}
		else if ($level == 9){$xp = 144500;}
		else if ($level == 10){$xp = 220000;}
		else if ($level == 11){$xp = 440000;}
		else if ($level == 12){$xp = 660000;}
		else if ($level == 13){$xp = 880000;}
		else if ($level == 14){$xp = 1100000;}
		else if ($level == 15){$xp = 1320000;}
		else if ($level == 16){$xp = 1540000;}
		else if ($level == 17){$xp = 1760000;}
		else if ($level == 18){$xp = 1980000;}
		else if ($level == 19){$xp = 2200000;}
		else if ($level == 20){$xp = 2420000;}
		else if ($level == 21){$xp = 2640000;}
		else if ($level == 22){$xp = 2860000;}
		else if ($level == 23){$xp = 3080000;}
		else if ($level > 23){$xp = 3300000;}
		else {$xp = 0;}
	}
	else if ($class == "Magic-User")
	{
		if ($level == 2){$xp = 2400;}
		else if ($level == 3){$xp = 4800;}
		else if ($level == 4){$xp = 10250;}
		else if ($level == 5){$xp = 22000;}
		else if ($level == 6){$xp = 40000;}
		else if ($level == 7){$xp = 60000;}
		else if ($level == 8){$xp = 80000;}
		else if ($level == 9){$xp = 140000;}
		else if ($level == 10){$xp = 250000;}
		else if ($level == 11){$xp = 375000;}
		else if ($level == 12){$xp = 750000;}
		else if ($level == 13){$xp = 1125000;}
		else if ($level == 14){$xp = 1500000;}
		else if ($level == 15){$xp = 1875000;}
		else if ($level == 16){$xp = 2250000;}
		else if ($level == 17){$xp = 2625000;}
		else if ($level == 18){$xp = 3000000;}
		else if ($level == 19){$xp = 3375000;}
		else if ($level == 20){$xp = 3750000;}
		else if ($level == 21){$xp = 4125000;}
		else if ($level == 22){$xp = 4500000;}
		else if ($level == 23){$xp = 4875000;}
		else if ($level > 23){$xp = 5250000;}
		else {$xp = 0;}
	}
	else if ($class == "Paladin")
	{
		if ($level == 2){$xp = 2550;}
		else if ($level == 3){$xp = 5500;}
		else if ($level == 4){$xp = 12500;}
		else if ($level == 5){$xp = 25000;}
		else if ($level == 6){$xp = 45000;}
		else if ($level == 7){$xp = 95000;}
		else if ($level == 8){$xp = 175000;}
		else if ($level == 9){$xp = 325000;}
		else if ($level == 10){$xp = 600000;}
		else if ($level == 11){$xp = 1000000;}
		else if ($level == 12){$xp = 1350000;}
		else if ($level == 13){$xp = 1700000;}
		else if ($level == 14){$xp = 2050000;}
		else if ($level == 15){$xp = 2400000;}
		else if ($level == 16){$xp = 2750000;}
		else if ($level == 17){$xp = 3100000;}
		else if ($level == 18){$xp = 3450000;}
		else if ($level == 19){$xp = 3800000;}
		else if ($level == 20){$xp = 4150000;}
		else if ($level == 21){$xp = 4500000;}
		else if ($level == 22){$xp = 4850000;}
		else if ($level == 23){$xp = 5200000;}
		else if ($level > 23){$xp = 5550000;}
		else {$xp = 0;}
	}
	else if ($class == "Ranger")
	{
		if ($level == 2){$xp = 2250;}
		else if ($level == 3){$xp = 4500;}
		else if ($level == 4){$xp = 9500;}
		else if ($level == 5){$xp = 20000;}
		else if ($level == 6){$xp = 40000;}
		else if ($level == 7){$xp = 90000;}
		else if ($level == 8){$xp = 150000;}
		else if ($level == 9){$xp = 225000;}
		else if ($level == 10){$xp = 325000;}
		else if ($level == 11){$xp = 650000;}
		else if ($level == 12){$xp = 975000;}
		else if ($level == 13){$xp = 1300000;}
		else if ($level == 14){$xp = 1625000;}
		else if ($level == 15){$xp = 1950000;}
		else if ($level == 16){$xp = 2275000;}
		else if ($level == 17){$xp = 2600000;}
		else if ($level == 18){$xp = 2925000;}
		else if ($level == 19){$xp = 3250000;}
		else if ($level == 20){$xp = 3575000;}
		else if ($level == 21){$xp = 3900000;}
		else if ($level == 22){$xp = 4225000;}
		else if ($level == 23){$xp = 4550000;}
		else if ($level > 23){$xp = 4875000;}
		else {$xp = 0;}
	}
	else if ($class == "Thief")
	{
		if ($level == 2){$xp = 1250;}
		else if ($level == 3){$xp = 2500;}
		else if ($level == 4){$xp = 5000;}
		else if ($level == 5){$xp = 10000;}
		else if ($level == 6){$xp = 20000;}
		else if ($level == 7){$xp = 40000;}
		else if ($level == 8){$xp = 70000;}
		else if ($level == 9){$xp = 110000;}
		else if ($level == 10){$xp = 160000;}
		else if ($level == 11){$xp = 220000;}
		else if ($level == 12){$xp = 440000;}
		else if ($level == 13){$xp = 660000;}
		else if ($level == 14){$xp = 880000;}
		else if ($level == 15){$xp = 1100000;}
		else if ($level == 16){$xp = 1320000;}
		else if ($level == 17){$xp = 1540000;}
		else if ($level == 18){$xp = 1760000;}
		else if ($level == 19){$xp = 1980000;}
		else if ($level == 20){$xp = 2200000;}
		else if ($level == 21){$xp = 2420000;}
		else if ($level == 22){$xp = 2640000;}
		else if ($level == 23){$xp = 2860000;}
		else if ($level > 23){$xp = 3080000;}
		else {$xp = 0;}
	}
	return $xp;
}

?>