<?php

function bx_basic_stat($type, $min, $max, $class, $race, $sheet)
{
	$min_val = $min+0; if ($min_val < 3){$min_val = 3;}
	$max_val = $max+0; if ($max_val > 18){$max_val = 18;}
	$roll = mt_rand($min_val,$max_val);
	$what = "";
	$languages = 0;

	switch ($roll)
	{
		case 3: $mod1="-3"; $mod2="+3"; $mod3="-3"; $mod4="-2"; $mod5="-3"; $mod6="0"; $mod7="-3"; $mod8="-2"; $mod9="1"; $mod10="4"; 			break;
		case 4: $mod1="-2"; $mod2="+2"; $mod3="-2"; $mod4="-1"; $mod5="-2"; $mod6="0"; $mod7="-2"; $mod8="-1"; $mod9="2"; $mod10="5"; 			break;
		case 5: $mod1="-2"; $mod2="+2"; $mod3="-2"; $mod4="-1"; $mod5="-2"; $mod6="0"; $mod7="-2"; $mod8="-1"; $mod9="2"; $mod10="5"; 			break;
		case 6: $mod1="-1"; $mod2="+1"; $mod3="-1"; $mod4="-1"; $mod5="-1"; $mod6="0"; $mod7="-1"; $mod8="-1"; $mod9="3"; $mod10="6"; 			break;
		case 7: $mod1="-1"; $mod2="+1"; $mod3="-1"; $mod4="-1"; $mod5="-1"; $mod6="0"; $mod7="-1"; $mod8="-1"; $mod9="3"; $mod10="6"; 			break;
		case 8: $mod1="-1"; $mod2="+1"; $mod3="-1"; $mod4="-1"; $mod5="-1"; $mod6="0"; $mod7="-1"; $mod8="-1"; $mod9="3"; $mod10="6"; 			break;
		case 9: $mod1="0"; $mod2="0"; $mod3="0"; $mod4="0"; $mod5="0"; $mod6="0"; $mod7="0"; $mod8="0"; $mod9="4"; $mod10="7"; 					break;
		case 10: $mod1="0"; $mod2="0"; $mod3="0"; $mod4="0"; $mod5="0"; $mod6="0"; $mod7="0"; $mod8="0"; $mod9="4"; $mod10="7"; 				break;
		case 11: $mod1="0"; $mod2="0"; $mod3="0"; $mod4="0"; $mod5="0"; $mod6="0"; $mod7="0"; $mod8="0"; $mod9="4"; $mod10="7"; 				break;
		case 12: $mod1="0"; $mod2="0"; $mod3="0"; $mod4="0"; $mod5="0"; $mod6="0"; $mod7="0"; $mod8="0"; $mod9="4"; $mod10="7"; 				break;
		case 13: $mod1="+1"; $mod2="-1"; $mod3="+1"; $mod4="+1"; $mod5="+1"; $mod6="1"; $mod7="+1"; $mod8="+1"; $mod9="5"; $mod10="8"; 			break;
		case 14: $mod1="+1"; $mod2="-1"; $mod3="+1"; $mod4="+1"; $mod5="+1"; $mod6="1"; $mod7="+1"; $mod8="+1"; $mod9="5"; $mod10="8"; 			break;
		case 15: $mod1="+1"; $mod2="-1"; $mod3="+1"; $mod4="+1"; $mod5="+1"; $mod6="1"; $mod7="+1"; $mod8="+1"; $mod9="5"; $mod10="8"; 			break;
		case 16: $mod1="+2"; $mod2="-2"; $mod3="+2"; $mod4="+1"; $mod5="+2"; $mod6="2"; $mod7="+2"; $mod8="+1"; $mod9="6"; $mod10="9"; 			break;
		case 17: $mod1="+2"; $mod2="-2"; $mod3="+2"; $mod4="+1"; $mod5="+2"; $mod6="2"; $mod7="+2"; $mod8="+1"; $mod9="6"; $mod10="9"; 			break;
		case 18: $mod1="+3"; $mod2="-3"; $mod3="+3"; $mod4="+2"; $mod5="+3"; $mod6="3"; $mod7="+3"; $mod8="+2"; $mod9="7"; $mod10="10"; 		break;
	}

	if (($type == "Strength") && ($mod1 != "0")){ $what = $mod1; } else if ($type == "Strength"){ $what = "-";}
	else if ($type == "Dexterity")
	{
		if ($mod2 != "0"){ $what = $what . $mod2 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		if ($mod3 != "0"){ $what = $what . $mod3 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		if ($mod4 != "0"){ $what = $what . $mod4 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		$what = substr($what, 0, -13);
	}
	else if (($type == "Constitution") && ($mod5 != "0")){ $what = $mod5; } else if ($type == "Constitution") { $what = "-"; }
	else if (($type == "Intelligence") && ($mod6 != "0")){ $what = $mod6; $languages = $mod6; } else if ($type == "Intelligence") { $what = "-"; }
	else if (($type == "Wisdom") && ($mod7 != "0")){ $what = $mod7; } else if ($type == "Wisdom") { $what = "-"; }
	else if ($type == "Charisma")
	{
		if ($mod8 != "0"){ $what = $what . $mod8 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		if ($mod9 != "0"){ $what = $what . $mod9 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		if ($mod10 != "0"){ $what = $what . $mod10 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		$what = substr($what, 0, -13);
	}

	return array($roll, $what, $mod1, $mod2, $mod3, $mod4, $mod5, $mod6, $mod7, $mod8, $mod9, $mod10, $languages);
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_basic_alignment()
{
	switch (mt_rand(1,3))
	{
		case 1: $mood = "Lawful"; break;
		case 2: $mood = "Neutral"; break;
		case 3: $mood = "Chaotic"; break;
	}
	return $mood;
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_languages($show,$race,$amount,$aec)
{
	if ($show != 1){$amount = 0;}

	$talk_array = array();

	// WHAT DO RACES ALREADY SPEAK //
	if ($race == "Dwarf")
	{
		if ($amount > 0){array_push($talk_array, "Common"); array_push($talk_array, "Dwarf"); array_push($talk_array, "Goblin"); array_push($talk_array, "Gnome"); array_push($talk_array, "Kobold"); }
		else {$speech = "Common, Dwarf, Goblin, Gnome, &amp; Kobold, ";}
	}
	else if ($race == "Elf")
	{
		if ($amount > 0){array_push($talk_array, "Common"); array_push($talk_array, "Elf"); array_push($talk_array, "Gnoll"); array_push($talk_array, "Hobgoblin"); array_push($talk_array, "Orc"); }
		else {$speech = "Common, Elf, Gnoll, Hobgoblin, &amp; Orc, ";}
	}
	else if ($race == "Halfling")
	{
		if ($amount > 0){array_push($talk_array, "Common"); array_push($talk_array, "Halfling"); }
		else {$speech = "Common &amp; Halfling, ";}
	}
	else
	{
		if ($amount > 0){array_push($talk_array, "Common"); }
		else {$speech = "Common, ";}
	}

	while ($amount > 0) :

		switch (mt_rand(0,31))
		{
			case 0: $talk = "Common"; break;
			case 1: $talk = "Bugbear"; break;
			case 2: $talk = "Centaur"; break;
			case 3: $talk = "Cyclops"; break;
			case 4: $talk = "Doppleganger"; break;
			case 5: $talk = "Dragon"; break;
			case 6: $talk = "Dryad"; break;
			case 7: $talk = "Dwarf"; break;
			case 8: $talk = "Elf"; break;
			case 9: $talk = "Ettin"; break;
			case 10: $talk = "Gargoyle"; break;
			case 11: $talk = "Giant"; break;
			case 12: $talk = "Gnoll"; break;
			case 13: $talk = "Gnome"; break;
			case 14: $talk = "Goblin"; break;
			case 15: $talk = "Halfling"; break;
			case 16: $talk = "Harpy"; break;
			case 17: $talk = "Hobgoblin"; break;
			case 18: $talk = "Kobold"; break;
			case 19: $talk = "Lizardman"; break;
			case 20: $talk = "Medusa"; break;
			case 21: $talk = "Merman"; break;
			case 22: $talk = "Minotaur"; break;
			case 23: $talk = "Neanderthal"; break;
			case 24: $talk = "Nixie"; break;
			case 25: $talk = "Ogre"; break;
			case 26: $talk = "Orc"; break;
			case 27: $talk = "Pixie"; break;
			case 28: $talk = "Sprite"; break;
			case 29: $talk = "Treant"; break;
			case 30: $talk = "Troglodyte"; break;
			case 31: $talk = "Troll"; break;
		}

		if (in_array($talk, $talk_array)){} else { array_push($talk_array, $talk); $amount = $amount - 1; }

	endwhile;

	$talk_count = count($talk_array);
	$comma_use = $talk_count;
	$s = 0;
	while ($talk_count > 0) :
		if ($talk_count > 1){$speech = $speech . $talk_array[$s] . ", ";} else {$speech = $speech . "&amp; " . $talk_array[$s] . ", ";} 
		$s = $s + 1;
		$talk_count = $talk_count - 1;
	endwhile;

	$speech = "Can speak " . substr(strtolower($speech), 0, -2);

	if ( $comma_use == 2 ){ $speech = str_replace(", &amp;", " &amp;", $speech); }

	return $speech . ".";
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_basic_saves($class, $level)
{
	if ($class=="Cleric" && $level>0 && $level<5){			$sv1=11; $sv2=12; $sv3=14; $sv4=16; $sv5=15;}
	else if ($class=="Cleric" && $level>4 && $level<9){		$sv1=9;  $sv2=10; $sv3=12; $sv4=14; $sv5=12;}
	else if ($class=="Cleric" && $level>8 && $level<13){	$sv1=6;  $sv2=7;  $sv3=9;  $sv4=11; $sv5=9;}
	else if ($class=="Cleric" && $level>12){				$sv1=3;  $sv2=5;  $sv3=7;  $sv4=8;  $sv5=7;}

	else if ($class=="Dwarf" && $level>0 && $level<4){		$sv1=8; $sv2=9; $sv3=10; $sv4=13; $sv5=12;}
	else if ($class=="Dwarf" && $level>3 && $level<7){		$sv1=6; $sv2=7; $sv3=8;  $sv4=10; $sv5=10;}
	else if ($class=="Dwarf" && $level>6 && $level<10){		$sv1=4; $sv2=5; $sv3=6;  $sv4=7;  $sv5=8;}
	else if ($class=="Dwarf" && $level>9){					$sv1=2; $sv2=3; $sv3=4;  $sv4=4;  $sv5=6;}

	else if ($class=="Halfling" && $level>0 && $level<4){	$sv1=8; $sv2=9; $sv3=10; $sv4=13; $sv5=12;}
	else if ($class=="Halfling" && $level>3 && $level<7){	$sv1=6; $sv2=7; $sv3=8;  $sv4=10; $sv5=10;}
	else if ($class=="Halfling" && $level>6){				$sv1=4; $sv2=5; $sv3=6;  $sv4=7;  $sv5=8;}

	else if ($class=="Elf" && $level>0 && $level<4){		$sv1=12; $sv2=13; $sv3=13; $sv4=15; $sv5=15;}
	else if ($class=="Elf" && $level>3 && $level<7){		$sv1=10; $sv2=11; $sv3=11; $sv4=13; $sv5=12;}
	else if ($class=="Elf" && $level>6 && $level<10){		$sv1=8;  $sv2=9;  $sv3=9;  $sv4=10; $sv5=10;}
	else if ($class=="Elf" && $level>9){					$sv1=6;  $sv2=7;  $sv3=8;  $sv4=8;  $sv5=8;}

	else if ($class=="Fighter" && $level<1){				$sv1=14; $sv2=15; $sv3=16; $sv4=17; $sv5=18;}
	else if ($class=="Fighter" && $level>0 && $level<4){	$sv1=12; $sv2=13; $sv3=14; $sv4=15; $sv5=16;}
	else if ($class=="Fighter" && $level>3 && $level<7){	$sv1=10; $sv2=11; $sv3=12; $sv4=13; $sv5=14;}
	else if ($class=="Fighter" && $level>6 && $level<10){	$sv1=8;  $sv2=9;  $sv3=10; $sv4=10; $sv5=12;}
	else if ($class=="Fighter" && $level>9 && $level<13){	$sv1=6;  $sv2=7;  $sv3=8;  $sv4=8;  $sv5=10;}
	else if ($class=="Fighter" && $level>12){				$sv1=4;  $sv2=5;  $sv3=6;  $sv4=5;  $sv5=8;}

	else if ($class=="Magic-User" && $level>0 && $level<6){	$sv1=13; $sv2=14; $sv3=13; $sv4=16; $sv5=15;}
	else if ($class=="Magic-User" && $level>5 && $level<11){$sv1=11; $sv2=12; $sv3=11; $sv4=14; $sv5=12;}
	else if ($class=="Magic-User" && $level>10){			$sv1=8;  $sv2=9;  $sv3=8;  $sv4=11; $sv5=8;}

	else if ($class=="Thief" && $level>0 && $level<5){		$sv1=13; $sv2=14; $sv3=13; $sv4=16; $sv5=15;}
	else if ($class=="Thief" && $level>4 && $level<9){		$sv1=12; $sv2=13; $sv3=11; $sv4=14; $sv5=13;}
	else if ($class=="Thief" && $level>8 && $level<13){		$sv1=10; $sv2=11; $sv3=9;  $sv4=12; $sv5=10;}
	else if ($class=="Thief" && $level>12){					$sv1=8;  $sv2=9;  $sv3=7;  $sv4=10; $sv5=8;}

	return array($sv1,$sv2,$sv3,$sv4,$sv5);
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_basic_attacks($class, $level)
{
	if (($class=="Cleric" || $class=="Thief") && $level>=0 && $level<=4){$value=2;}
	else if (($class=="Cleric" || $class=="Thief") && $level>=5 && $level<=8){$value=3;}
	else if (($class=="Cleric" || $class=="Thief") && $level>=9 && $level<=12){$value=4;}
	else if ($class=="Cleric" || $class=="Thief"){$value=5;}

	else if ($class=="Magic-User" && $level>=0 && $level<=5){$value=2;}
	else if ($class=="Magic-User" && $level>=6 && $level<=10){$value=3;}
	else if ($class=="Magic-User"){$value=4;}

	else if ($level<1){$value=1;}
	else if ($level>=1 && $level<=3){$value=2;}
	else if ($level>=4 && $level<=6){$value=3;}
	else if ($level>=7 && $level<=9){$value=4;}
	else if ($level>=10 && $level<=12){$value=5;}
	else {$value=6;}

	switch ($value)
	{
		case 1: $attacks = "11_12_13_14_15_16_17_18_19_20"; break;
		case 2: $attacks = "10_11_12_13_14_15_16_17_18_19"; break;
		case 3: $attacks = "8_9_10_11_12_13_14_15_16_17"; break;
		case 4: $attacks = "5_6_7_8_9_10_11_12_13_14"; break;
		case 5: $attacks = "3_4_5_6_7_8_9_10_11_12"; break;
		case 6: $attacks = "2_2_3_4_5_6_7_8_9_10"; break;
	}

	return $attacks;
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_basic_hit_points($class, $level, $con, $max)
{
	if ($con<4){$mod = -3;}
	else if ($con>=4 && $con<=5){$mod = -2;}
	else if ($con>=6 && $con<=8){$mod = -1;}
	else if ($con>=13 && $con<=15){$mod = 1;}
	else if ($con>=16 && $con<=16){$mod = 2;}
	else if ($con>=18){$mod = 3;}

	if ($class == "Cleric"){ $dce=6; $lvl=10; $xhp=1; }
	else if ($class == "Dwarf"){ $dce=8; $lvl=10; $xhp=3; }
	else if ($class == "Elf"){ $dce=6; $lvl=10; $xhp=2; }
	else if ($class == "Fighter"){ $dce=8; $lvl=10; $xhp=2; }
	else if ($class == "Halfling"){ $dce=6; $lvl=9; $xhp=0; }
	else if ($class == "Magic-User"){ $dce=4; $lvl=10; $xhp=1; }
	else if ($class == "Thief"){ $dce=4; $lvl=10; $xhp=2; }

	$start_level = 1;
	while ($level > 0) :
		if ($start_level >= $lvl){$hd = xhp;}
		else { $hd = mt_rand(1,$dce) + $mod; if ($max > 0){$hd = $mod + $dce;} }

		if ($hd < 1){$hd = 1;}
			$hp = $hp + $hd;

		$level = $level - 1;
		$start_level = $start_level + 1;
	endwhile;

	return $hp;
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_basic_age($class, $level)
{
	if ($class == "Cleric"){ $age=18 + mt_rand(1,6) + $level; }
	else if ($class == "Dwarf"){ $age=40 + mt_rand(4,24) + ($level*2); }
	else if ($class == "Elf"){ $age=125 + mt_rand(5,40) + ($level*3); }
	else if ($class == "Fighter"){ $age=16 + mt_rand(1,4) + $level; }
	else if ($class == "Halfling"){ $age=40 + mt_rand(1,6) + ($level*2); }
	else if ($class == "Magic-User"){ $age=27 + mt_rand(1,8) + $level; }
	else if ($class == "Thief"){ $age=18 + mt_rand(1,4) + $level; }

	return $age;
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_basic_gear($class, $level, $dex, $magic, $vardmg)
{
	while ($run_weapons != 1) :

		switch (mt_rand(1,21))
		{
			case 1: $weapon = "battle axe (1d8 dmg)"; $hands=2; $classes = array('Elf', 'Fighter', 'Thief'); break;
			case 2: $weapon = "hand axe (1d6 dmg)"; $hands=1; $classes = array('Dwarf', 'Elf', 'Fighter', 'Halfling', 'Thief'); break;
			case 3: $weapon = "club (1d4 dmg)"; $hands=1; $classes = array('Cleric', 'Dwarf', 'Elf', 'Fighter', 'Halfling', 'Thief'); break;
			case 4: $weapon = "dagger (1d4 dmg)"; $hands=1; $classes = array('Dwarf', 'Elf', 'Fighter', 'Halfling', 'Magic-User', 'Thief'); break;
			case 5: $weapon = "trident (1d6 dmg)"; $hands=2; $classes = array('Elf', 'Fighter', 'Thief'); break;
			case 6: $weapon = "flail (1d6 dmg)"; $hands=1; $classes = array('Cleric', 'Dwarf', 'Elf', 'Fighter', 'Halfling', 'Thief'); break;
			case 7: $weapon = "heavy flail (1d8 dmg)"; $hands=2; $classes = array('Cleric', 'Elf', 'Fighter', 'Thief'); break;
			case 8: $weapon = "light hammer (1d4 dmg)"; $hands=1; $classes = array('Cleric', 'Dwarf', 'Elf', 'Fighter', 'Halfling', 'Thief'); break;
			case 9: $weapon = "war hammer (1d6 dmg)"; $hands=2; $classes = array('Cleric', 'Elf', 'Fighter', 'Thief'); break;
			case 10: $weapon = "mace (1d6 dmg)"; $hands=1; $classes = array('Cleric', 'Dwarf', 'Elf', 'Fighter', 'Halfling', 'Thief'); break;
			case 11: $weapon = "morningstar (1d6 dmg)"; $hands=2; $classes = array('Elf', 'Fighter', 'Thief'); break;
			case 12: $weapon = "heavy pick (1d8 dmg)"; $hands=2; $classes = array('Elf', 'Fighter', 'Thief'); break;
			case 13: $weapon = "light pick (1d6 dmg)"; $hands=1; $classes = array('Dwarf', 'Elf', 'Fighter', 'Halfling', 'Thief'); break;
			case 14: $weapon = "pole arm (1d10 dmg)"; $hands=2; $classes = array('Elf', 'Fighter', 'Thief'); break;
			case 15: $weapon = "quarterstaff (1d6 dmg)"; $hands=2; $classes = array('Cleric', 'Elf', 'Fighter', 'Thief'); break;
			case 16: $weapon = "scimitar (1d8 dmg)"; $hands=1; $classes = array('Dwarf', 'Elf', 'Fighter', 'Halfling', 'Thief'); break;
			case 17: $weapon = "spear (1d6 dmg)"; $hands=1; $classes = array('Dwarf', 'Elf', 'Fighter', 'Halfling', 'Thief'); break;
			case 18: $weapon = "long sword (1d8 dmg)"; $hands=1; $classes = array('Dwarf', 'Elf', 'Fighter', 'Thief'); break;
			case 19: $weapon = "bastard sword (1d8/2d4 dmg)"; $hands=1; $classes = array('Dwarf', 'Elf', 'Fighter', 'Thief'); break;
			case 20: $weapon = "short sword (1d8 dmg)"; $hands=1; $classes = array('Dwarf', 'Elf', 'Fighter', 'Halfling', 'Thief'); break;
			case 21: $weapon = "two-handed sword (1d10 dmg)"; $hands=2; $classes = array('Elf', 'Fighter', 'Thief'); break;
		}

		if ( $vardmg == 0 ){ $novardmg = explode(" (", $weapon); $weapon = $novardmg[0]; } // NO VARIABLE WEAPON DAMAGE SO DON'T SHOW IT

		if (in_array($class, $classes)){$run_weapons = 1;}
			$cyc_catch1 = $cyc_catch1 + 1; if ($cyc_catch1 > 100){$run_weapons = 1;}

	endwhile;

	if (($level*4) >= mt_rand(1,100) && $magic>0 && $weapon != "")
	{
		$magic_bonus = ceil($level/5);
			if ($magic_bonus < 1){$magic_bonus = 1;}
		$magic_props = "+" . mt_rand(1,$magic_bonus);
		$weapon = str_replace(" (", " " . $magic_props . " (", $weapon);
		$weapon = str_replace(" dmg)", "" . $magic_props . " dmg)", $weapon);
	}
	$weapon = str_replace(" ", "&nbsp;", $weapon) . ",&nbsp;&nbsp;&nbsp;&nbsp; ";

	if (mt_rand(1,3) != 1)
	{
		while ($run_weapons2 != 1) :

			switch (mt_rand(1,7))
			{
				case 1: $weapon2 = "javelin (1d6 dmg / " . mt_rand(1,4) . " each)"; $hands=1; $classes = array('Dwarf', 'Elf', 'Fighter', 'Halfling', 'Thief'); $magic_thing = ""; break;
				case 2: $weapon2 = "heavy crossbow (1d8 dmg / " . mt_rand(10,30) . " bolts in case)"; $hands=2; $classes = array('Dwarf', 'Elf', 'Fighter', 'Thief'); $magic_thing = "bolts"; break;
				case 3: $weapon2 = "light crossbow (1d6 dmg / " . mt_rand(10,30) . " bolts in case)"; $hands=2; $classes = array('Dwarf', 'Elf', 'Fighter', 'Halfling', 'Thief'); $magic_thing = "bolts"; break;
				case 4: $weapon2 = "darts (1d4 dmg / " . mt_rand(1,4) . " each)"; $hands=1; $classes = array('Dwarf', 'Elf', 'Fighter', 'Halfling', 'Magic-User', 'Thief'); $magic_thing = ""; break;
				case 5: $weapon2 = "longbow (1d8 dmg / " . mt_rand(10,30) . " arrows in quiver)"; $hands=2; $classes = array('Elf', 'Fighter', 'Thief'); $magic_thing = "arrows"; break;
				case 6: $weapon2 = "shortbow (1d6 dmg / " . mt_rand(10,30) . " arrows in quiver)"; $hands=2; $classes = array('Dwarf', 'Elf', 'Fighter', 'Halfling', 'Thief'); $magic_thing = "arrows"; break;
				case 7: $weapon2 = "sling (1d4 dmg / " . mt_rand(10,30) . " stones)"; $hands=1; $classes = array('Cleric', 'Dwarf', 'Elf', 'Fighter', 'Halfling', 'Magic-User', 'Thief'); $magic_thing = "stones"; break;
			}

			if ( $vardmg == 0 ) // NO VARIABLE WEAPON DAMAGE SO DON'T SHOW IT
			{
				$novardmg1 = explode(" (", $weapon2); $weapon_a = $novardmg1[0];
				$novardmg2 = explode(" / ", $weapon2); $weapon_b = $novardmg2[1];
				$weapon2 = $weapon_a . " (" . $weapon_b;
			}

			if (in_array($class, $classes)){$run_weapons2 = 1;}
				$cyc_catch2 = $cyc_catch2 + 1; if ($cyc_catch2 > 100){$run_weapons2 = 1;}

		endwhile;

		if (($level*4) >= mt_rand(1,100) && $magic>0 && $weapon2 != "")
		{
			$magic_bonus = ceil($level/5);
				if ($magic_bonus < 1){$magic_bonus = 1;}
			$magic_props = "+" . mt_rand(1,$magic_bonus);
			$weapon2 = str_replace("javelin", "javelin " . $magic_props . "", $weapon2);
			$weapon2 = str_replace("darts", "darts " . $magic_props . "", $weapon2);
				if ($magic_thing == ""){$weapon2 = str_replace(" dmg", $magic_props . " dmg", $weapon2);}
				if ($magic_thing != ""){$weapon4 = $magic_thing . "&nbsp;" . $magic_props . "&nbsp;(" . mt_rand(2,5) . "&nbsp;each),&nbsp;&nbsp;&nbsp;&nbsp; ";}
		}

		$weapon2 = str_replace(" ", "&nbsp;", $weapon2) . ",&nbsp;&nbsp;&nbsp;&nbsp; " . $weapon4;
	}

	if ((mt_rand(1,4) != 1) && ($class != "Cleric"))
	{
		if (mt_rand(1,10) == 1){$weapon3 = "silver dagger (1d4 dmg)";}
		else {$weapon3 = "dagger (1d4 dmg)";}

		if ( $vardmg == 0 ){ $novardmg = explode(" (", $weapon3); $weapon3 = $novardmg[0]; } // NO VARIABLE WEAPON DAMAGE SO DON'T SHOW IT

		if (($level*4) >= mt_rand(1,100) && $magic>0 && $weapon3 != "")
		{
			$magic_bonus = ceil($level/5);
				if ($magic_bonus < 1){$magic_bonus = 1;}
			$magic_props = "+" . mt_rand(1,$magic_bonus);
			$weapon3 = str_replace(" (", " " . $magic_props . " (", $weapon3);
			$weapon3 = str_replace(" dmg)", "" . $magic_props . " dmg)", $weapon3);
		}

		$weapon3 = str_replace(" ", "&nbsp;", $weapon3) . ",&nbsp;&nbsp;&nbsp;&nbsp; ";
	}

	//////////////////////////////////

	if ($dex<4){$mod = 3;}
	else if ($dex>=4 && $dex<=5){$mod = 2;}
	else if ($dex>=6 && $dex<=8){$mod = 1;}
	else if ($dex>=13 && $dex<=15){$mod = -1;}
	else if ($dex>=16 && $dex<=16){$mod = -2;}
	else if ($dex>=18){$mod = -3;}

	if ($class == "Cleric"){ $min=1; $max=3; }
	else if ($class == "Dwarf"){ $min=1; $max=3; }
	else if ($class == "Elf"){ $min=1; $max=3; }
	else if ($class == "Fighter"){ $min=1; $max=3; }
	else if ($class == "Halfling"){ $min=1; $max=3; }
	else if ($class == "Magic-User"){ $min=0; $max=0; }
	else if ($class == "Thief"){ $min=1; $max=1; }

	switch (mt_rand($min,$max))
	{
		case 1: $armor = "leather armor"; $ac=-2; break;
		case 2: $armor = "chain mail armor"; $ac=-4; break;
		case 3: $armor = "plate mail armor"; $ac=-6; break;
	}

	if (($level*4) >= mt_rand(1,100) && $magic>0 && $armor != "")
	{
		$magic_bonus = ceil($level/7);
			if ($magic_bonus < 1){$magic_bonus = 1;}
			$ac_bonus = mt_rand(1,$magic_bonus);
		$magic_props = "+" . $ac_bonus;
		$armor = $armor . " " . $magic_props;
		$ac = $ac - $ac_bonus;
	}

	if ((mt_rand(1,3) != 1) && ($hands != 2) && ($class == "Cleric" || $class == "Dwarf" || $class == "Elf" || $class == "Fighter" || $class == "Halfling")){$armor = $armor . ",&nbsp;&nbsp;&nbsp;&nbsp; shield"; $ac=-1 + $ac;}
	if ((mt_rand(1,3) != 1) && ($class == "Cleric" || $class == "Dwarf" || $class == "Elf" || $class == "Fighter" || $class == "Halfling")){$armor = $armor . ",&nbsp;&nbsp;&nbsp;&nbsp; helmet"; $ac=0 + $ac;}

	if ($armor != ""){$armor = $armor . ",&nbsp;&nbsp;&nbsp;&nbsp; ";}
	$ac = $ac + $mod;

	//////////////////////////////////

	$gear = $armor . $weapon . $weapon2 . $weapon3;

	return array($gear, $ac);
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_basic_xp_bonus($class, $str, $dex, $con, $wis, $cha, $int)
{
	$value = "-";
	if ($class == "Cleric")
	{
		if ($wis < 6){$bonus = "-20% Penalty to Experience Points"; $value = "-20%";}
		else if ($wis < 9){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($wis > 15){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($wis > 12){$bonus = "5% Bonus to Experience Points"; $value = "5%";}
	}
	else if ($class == "Dwarf")
	{
		if ($str < 6){$bonus = "-20% Penalty to Experience Points"; $value = "-20%";}
		else if ($str < 9){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($str > 15){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($str > 12){$bonus = "5% Bonus to Experience Points"; $value = "-10%";}
	}
	else if ($class == "Elf")
	{
		if ($str<6 || $int<6){$bonus = "-20% Penalty to Experience Points"; $value = "-20%";}
		else if ($str<9 || $int<6){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($str>15 && $int>15){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($str>12 && $int>12){$bonus = "5% Bonus to Experience Points"; $value = "5%";}
	}
	else if ($class == "Fighter")
	{
		if ($str < 6){$bonus = "-20% Penalty to Experience Points"; $value = "-20%";}
		else if ($str < 9){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($str > 15){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($str > 12){$bonus = "5% Bonus to Experience Points"; $value = "5%";}
	}
	else if ($class == "Halfling")
	{
		if ($str<6 || $dex<6){$bonus = "-20% Penalty to Experience Points"; $value = "-20%";}
		else if ($str<9 || $dex<6){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($str>12 && $dex>12){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($str>12 || $dex>12){$bonus = "5% Bonus to Experience Points"; $value = "5%";}
	}
	else if ($class == "Magic-User")
	{
		if ($int < 6){$bonus = "-20% Penalty to Experience Points"; $value = "-20%";}
		else if ($int < 9){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($int > 15){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($int > 12){$bonus = "5% Bonus to Experience Points"; $value = "5%";}
	}
	else if ($class == "Thief")
	{
		if ($dex < 6){$bonus = "-20% Penalty to Experience Points"; $value = "-20%";}
		else if ($dex < 9){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($dex > 15){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($dex > 12){$bonus = "5% Bonus to Experience Points"; $value = "5%";}
	}

	return array($bonus,$value);
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_basic_level($class, $level, $randxp, $max_spells, $dexterity, $use_aec)
{
	$spell = ""; $steal = "";

	if ($class == "Cleric" && $level == 1){$hp=$hp+$hd; $xp1 = "0"; $xp2 = "1,500"; }
	else if ($class == "Cleric" && $level == 2){$hp=$hp+$hd; $spells = "1|0|0|0|0"; $xp1 = "1,500"; $xp2 = "3,000"; $max_spebx_level = 1; }
	else if ($class == "Cleric" && $level == 3){$hp=$hp+$hd; $spells = "2|0|0|0|0"; $xp1 = "3,000"; $xp2 = "6,000"; $max_spebx_level = 1; }
	else if ($class == "Cleric" && $level == 4){$hp=$hp+$hd; $spells = "2|1|0|0|0"; $xp1 = "6,000"; $xp2 = "12,000"; $max_spebx_level = 2; }
	else if ($class == "Cleric" && $level == 5){$hp=$hp+$hd; $spells = "2|2|0|0|0"; $xp1 = "12,000"; $xp2 = "25,000"; $max_spebx_level = 2; }
	else if ($class == "Cleric" && $level == 6){$hp=$hp+$hd; $spells = "2|2|1|1|0"; $xp1 = "25,000"; $xp2 = "50,000"; $max_spebx_level = 4; }
	else if ($class == "Cleric" && $level == 7){$hp=$hp+$hd; $spells = "2|2|2|1|1"; $xp1 = "50,000"; $xp2 = "100,000"; $max_spebx_level = 5; }
	else if ($class == "Cleric" && $level == 8){$hp=$hp+$hd; $spells = "3|3|2|2|1"; $xp1 = "100,000"; $xp2 = "200,000"; $max_spebx_level = 5; }
	else if ($class == "Cleric" && $level == 9){$hp=$hp+$hd; $spells = "3|3|3|2|2"; $xp1 = "200,000"; $xp2 = "300,000"; $max_spebx_level = 5; }
	else if ($class == "Cleric" && $level == 10){$hp=$hp+1; $spells = "4|4|3|3|2"; $xp1 = "300,000"; $xp2 = "400,000"; $max_spebx_level = 5; }
	else if ($class == "Cleric" && $level == 11){$hp=$hp+1; $spells = "4|4|4|3|3"; $xp1 = "400,000"; $xp2 = "500,000"; $max_spebx_level = 5; }
	else if ($class == "Cleric" && $level == 12){$hp=$hp+1; $spells = "5|5|4|4|3"; $xp1 = "500,000"; $xp2 = "600,000"; $max_spebx_level = 5; }
	else if ($class == "Cleric" && $level == 13){$hp=$hp+1; $spells = "5|5|5|4|4"; $xp1 = "600,000"; $xp2 = "700,000"; $max_spebx_level = 5; }
	else if ($class == "Cleric" && $level == 14){$hp=$hp+1; $spells = "6|5|5|5|4"; $xp1 = "700,000"; $xp2 = "800,000"; $max_spebx_level = 5; }
	else if ($class == "Dwarf" && $level == 1){$hp=$hp+$hd; $xp1 = "0"; $xp2 = "2,200";}
	else if ($class == "Dwarf" && $level == 2){$hp=$hp+$hd; $xp1 = "2,200"; $xp2 = "4,400";}
	else if ($class == "Dwarf" && $level == 3){$hp=$hp+$hd; $xp1 = "4,400"; $xp2 = "8,800";}
	else if ($class == "Dwarf" && $level == 4){$hp=$hp+$hd; $xp1 = "8,800"; $xp2 = "17,500";}
	else if ($class == "Dwarf" && $level == 5){$hp=$hp+$hd; $xp1 = "17,000"; $xp2 = "35,000";}
	else if ($class == "Dwarf" && $level == 6){$hp=$hp+$hd; $xp1 = "35,000"; $xp2 = "70,000";}
	else if ($class == "Dwarf" && $level == 7){$hp=$hp+$hd; $xp1 = "70,000"; $xp2 = "140,000";}
	else if ($class == "Dwarf" && $level == 8){$hp=$hp+$hd; $xp1 = "140,000"; $xp2 = "270,000";}
	else if ($class == "Dwarf" && $level == 9){$hp=$hp+$hd; $xp1 = "270,000"; $xp2 = "400,000";}
	else if ($class == "Dwarf" && $level == 10){$hp=$hp+3; $xp1 = "400,000"; $xp2 = "530,000";}
	else if ($class == "Dwarf" && $level == 11){$hp=$hp+3; $xp1 = "530,000"; $xp2 = "660,000";}
	else if ($class == "Dwarf" && $level == 12){$hp=$hp+3; $xp1 = "660,000"; $xp2 = "0";}
	else if ($class == "Elf" && $level == 1){$hp=$hp+$hd; $spells = "1|0|0|0|0"; $xp1 = "0"; $xp2 = "4,000"; $max_spebx_level = 1; }
	else if ($class == "Elf" && $level == 2){$hp=$hp+$hd; $spells = "2|0|0|0|0"; $xp1 = "4,000"; $xp2 = "8,000"; $max_spebx_level = 1; }
	else if ($class == "Elf" && $level == 3){$hp=$hp+$hd; $spells = "2|1|0|0|0"; $xp1 = "8,000"; $xp2 = "16,000"; $max_spebx_level = 2; }
	else if ($class == "Elf" && $level == 4){$hp=$hp+$hd; $spells = "2|2|0|0|0"; $xp1 = "16,000"; $xp2 = "32,000"; $max_spebx_level = 2; }
	else if ($class == "Elf" && $level == 5){$hp=$hp+$hd; $spells = "2|2|1|0|0"; $xp1 = "32,000"; $xp2 = "64,000"; $max_spebx_level = 3; }
	else if ($class == "Elf" && $level == 6){$hp=$hp+$hd; $spells = "2|2|2|0|0"; $xp1 = "64,000"; $xp2 = "120,000"; $max_spebx_level = 3; }
	else if ($class == "Elf" && $level == 7){$hp=$hp+$hd; $spells = "3|2|2|1|0"; $xp1 = "120,000"; $xp2 = "250,000"; $max_spebx_level = 4; }
	else if ($class == "Elf" && $level == 8){$hp=$hp+$hd; $spells = "3|3|2|2|0"; $xp1 = "250,000"; $xp2 = "400,000"; $max_spebx_level = 4; }
	else if ($class == "Elf" && $level == 9){$hp=$hp+$hd; $spells = "3|3|3|2|1"; $xp1 = "400,000"; $xp2 = "600,000"; $max_spebx_level = 5; }
	else if ($class == "Elf" && $level == 10){$hp=$hp+2; $spells = "3|3|3|3|2"; $xp1 = "600,000"; $xp2 = "0"; $max_spebx_level = 5; }
	else if ($class == "Fighter" && $level == 1){$hp=$hp+$hd; $xp1 = "0"; $xp2 = "2,000";}
	else if ($class == "Fighter" && $level == 2){$hp=$hp+$hd; $xp1 = "2,000"; $xp2 = "4,000";}
	else if ($class == "Fighter" && $level == 3){$hp=$hp+$hd; $xp1 = "4,000"; $xp2 = "8,000";}
	else if ($class == "Fighter" && $level == 4){$hp=$hp+$hd; $xp1 = "8,000"; $xp2 = "16,000";}
	else if ($class == "Fighter" && $level == 5){$hp=$hp+$hd; $xp1 = "16,000"; $xp2 = "32,000";}
	else if ($class == "Fighter" && $level == 6){$hp=$hp+$hd; $xp1 = "32,000"; $xp2 = "64,000";}
	else if ($class == "Fighter" && $level == 7){$hp=$hp+$hd; $xp1 = "64,000"; $xp2 = "120,000";}
	else if ($class == "Fighter" && $level == 8){$hp=$hp+$hd; $xp1 = "120,000"; $xp2 = "240,000";}
	else if ($class == "Fighter" && $level == 9){$hp=$hp+$hd; $xp1 = "240,000"; $xp2 = "360,000";}
	else if ($class == "Fighter" && $level == 10){$hp=$hp+2; $xp1 = "360,000"; $xp2 = "480,000";}
	else if ($class == "Fighter" && $level == 11){$hp=$hp+2; $xp1 = "480,000"; $xp2 = "600,000";}
	else if ($class == "Fighter" && $level == 12){$hp=$hp+2; $xp1 = "600,000"; $xp2 = "720,000";}
	else if ($class == "Fighter" && $level == 13){$hp=$hp+2; $xp1 = "720,000"; $xp2 = "840,000";}
	else if ($class == "Fighter" && $level == 14){$hp=$hp+2; $xp1 = "840,000"; $xp2 = "960,000";}
	else if ($class == "Halfling" && $level == 1){$hp=$hp+$hd; $xp1 = "0"; $xp2 = "2,000";}
	else if ($class == "Halfling" && $level == 2){$hp=$hp+$hd; $xp1 = "2,000"; $xp2 = "4,000";}
	else if ($class == "Halfling" && $level == 3){$hp=$hp+$hd; $xp1 = "4,000"; $xp2 = "8,000";}
	else if ($class == "Halfling" && $level == 4){$hp=$hp+$hd; $xp1 = "8,000"; $xp2 = "16,000";}
	else if ($class == "Halfling" && $level == 5){$hp=$hp+$hd; $xp1 = "16,000"; $xp2 = "32,000";}
	else if ($class == "Halfling" && $level == 6){$hp=$hp+$hd; $xp1 = "32,000"; $xp2 = "64,000";}
	else if ($class == "Halfling" && $level == 7){$hp=$hp+$hd; $xp1 = "64,000"; $xp2 = "120,000";}
	else if ($class == "Halfling" && $level == 8){$hp=$hp+$hd; $xp1 = "120,000"; $xp2 = "0";}
	else if ($class == "Magic-User" && $level == 1){$hp=$hp+$hd; $spells = "1|0|0|0|0|0"; $xp1 = "0"; $xp2 = "2,500"; $max_spebx_level = 1; }
	else if ($class == "Magic-User" && $level == 2){$hp=$hp+$hd; $spells = "2|0|0|0|0|0"; $xp1 = "2,500"; $xp2 = "5,000"; $max_spebx_level = 1; }
	else if ($class == "Magic-User" && $level == 3){$hp=$hp+$hd; $spells = "2|1|0|0|0|0"; $xp1 = "5,000"; $xp2 = "10,000"; $max_spebx_level = 2; }
	else if ($class == "Magic-User" && $level == 4){$hp=$hp+$hd; $spells = "2|2|0|0|0|0"; $xp1 = "10,000"; $xp2 = "20,000"; $max_spebx_level = 2; }
	else if ($class == "Magic-User" && $level == 5){$hp=$hp+$hd; $spells = "2|2|1|0|0|0"; $xp1 = "20,000"; $xp2 = "40,000"; $max_spebx_level = 3; }
	else if ($class == "Magic-User" && $level == 6){$hp=$hp+$hd; $spells = "2|2|2|0|0|0"; $xp1 = "40,000"; $xp2 = "80,000"; $max_spebx_level = 3; }
	else if ($class == "Magic-User" && $level == 7){$hp=$hp+$hd; $spells = "3|2|2|1|0|0"; $xp1 = "80,000"; $xp2 = "150,000"; $max_spebx_level = 4; }
	else if ($class == "Magic-User" && $level == 8){$hp=$hp+$hd; $spells = "3|3|2|2|0|0"; $xp1 = "150,000"; $xp2 = "300,000"; $max_spebx_level = 4; }
	else if ($class == "Magic-User" && $level == 9){$hp=$hp+$hd; $spells = "3|3|3|2|1|0"; $xp1 = "300,000"; $xp2 = "450,000"; $max_spebx_level = 5; }
	else if ($class == "Magic-User" && $level == 10){$hp=$hp+1; $spells = "3|3|3|3|2|0"; $xp1 = "450,000"; $xp2 = "600,000"; $max_spebx_level = 5; }
	else if ($class == "Magic-User" && $level == 11){$hp=$hp+1; $spells = "4|3|3|3|2|1"; $xp1 = "600,000"; $xp2 = "750,000"; $max_spebx_level = 6; }
	else if ($class == "Magic-User" && $level == 12){$hp=$hp+1; $spells = "4|4|3|3|3|2"; $xp1 = "750,000"; $xp2 = "900,000"; $max_spebx_level = 6; }
	else if ($class == "Magic-User" && $level == 13){$hp=$hp+1; $spells = "4|4|4|3|3|3"; $xp1 = "900,000"; $xp2 = "1,050,000"; $max_spebx_level = 6; }
	else if ($class == "Magic-User" && $level == 14){$hp=$hp+1; $spells = "4|4|4|4|3|3"; $xp1 = "1,050,000"; $xp2 = "1,200,000"; $max_spebx_level = 6; }
	else if ($class == "Thief" && $level == 1){$hp=$hp+$hd; $steal = "15_10_20_20_87_10_1-2"; $xp1 = "0"; $xp2 = "1,200";}
	else if ($class == "Thief" && $level == 2){$hp=$hp+$hd; $steal = "20_15_25_25_88_15_1-2"; $xp1 = "1,200"; $xp2 = "2,400";}
	else if ($class == "Thief" && $level == 3){$hp=$hp+$hd; $steal = "25_20_30_30_89_20_1-3"; $xp1 = "2,400"; $xp2 = "4,800";}
	else if ($class == "Thief" && $level == 4){$hp=$hp+$hd; $steal = "30_25_35_35_90_25_1-3"; $xp1 = "4,800"; $xp2 = "9,600";}
	else if ($class == "Thief" && $level == 5){$hp=$hp+$hd; $steal = "35_30_40_40_91_30_1-3"; $xp1 = "9,600"; $xp2 = "20,000";}
	else if ($class == "Thief" && $level == 6){$hp=$hp+$hd; $steal = "45_40_45_45_92_35_1-3"; $xp1 = "20,000"; $xp2 = "40,000";}
	else if ($class == "Thief" && $level == 7){$hp=$hp+$hd; $steal = "55_50_55_55_93_45_1-4"; $xp1 = "40,000"; $xp2 = "80,000";}
	else if ($class == "Thief" && $level == 8){$hp=$hp+$hd; $steal = "65_60_65_65_94_55_1-4"; $xp1 = "80,000"; $xp2 = "160,000";}
	else if ($class == "Thief" && $level == 9){$hp=$hp+$hd; $steal = "75_70_75_75_95_65_1-4"; $xp1 = "160,000"; $xp2 = "280,000";}
	else if ($class == "Thief" && $level == 10){$hp=$hp+2; $steal = "85_80_85_85_96_75_1-4"; $xp1 = "280,000"; $xp2 = "400,000";}
	else if ($class == "Thief" && $level == 11){$hp=$hp+2; $steal = "95_90_95_95_97_85_1-5"; $xp1 = "400,000"; $xp2 = "520,000";}
	else if ($class == "Thief" && $level == 12){$hp=$hp+2; $steal = "96_95_105_96_98_90_1-5"; $xp1 = "520,000"; $xp2 = "640,000";}
	else if ($class == "Thief" && $level == 13){$hp=$hp+2; $steal = "97_97_115_98_99_95_1-5"; $xp1 = "640,000"; $xp2 = "760,000";}
	else if ($class == "Thief" && $level == 14){$hp=$hp+2; $steal = "99_99_125_99_99_99_1-5"; $xp1 = "760,000"; $xp2 = "840,000";}

	// RANDOM XP TO START WITH
	if (($xp2 != "0") && ($randxp > 0))
	{
		$xp3 = str_replace(",", "", $xp1)+0;
		$xp4 = str_replace(",", "", $xp2)-1;
		$xp1 = number_format(mt_rand($xp3,$xp4));
	}

	if ($spells != "")
	{
		$mage = explode("|", $spells);
		$skills = "Spells&nbsp;Per&nbsp;Day:&nbsp;";
		if ($mage[0] > 0){$skills = $skills . " Lvl1&nbsp;[" . $mage[0] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spebx_book = $spebx_book . bx_basic_magic_spells($level, 1, $class, $max_spells);} }
		if ($mage[1] > 0){$skills = $skills . " Lvl2&nbsp;[" . $mage[1] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spebx_book = $spebx_book . bx_basic_magic_spells($level, 2, $class, $max_spells);} }
		if ($mage[2] > 0){$skills = $skills . " Lvl3&nbsp;[" . $mage[2] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spebx_book = $spebx_book . bx_basic_magic_spells($level, 3, $class, $max_spells);} }
		if ($mage[3] > 0){$skills = $skills . " Lvl4&nbsp;[" . $mage[3] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spebx_book = $spebx_book . bx_basic_magic_spells($level, 4, $class, $max_spells);} }
		if ($mage[4] > 0){$skills = $skills . " Lvl5&nbsp;[" . $mage[4] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spebx_book = $spebx_book . bx_basic_magic_spells($level, 5, $class, $max_spells);} }
		if ($mage[5] > 0){$skills = $skills . " Lvl6&nbsp;[" . $mage[5] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spebx_book = $spebx_book . bx_basic_magic_spells($level, 6, $class, $max_spells);} }
		if ($mage[6] > 0){$skills = $skills . " Lvl7&nbsp;[" . $mage[6] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spebx_book = $spebx_book . bx_basic_magic_spells($level, 7, $class, $max_spells);} }
		if ($mage[7] > 0){$skills = $skills . " Lvl8&nbsp;[" . $mage[7] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spebx_book = $spebx_book . bx_basic_magic_spells($level, 8, $class, $max_spells);} }
		if ($mage[8] > 0){$skills = $skills . " Lvl9&nbsp;[" . $mage[8] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spebx_book = $spebx_book . bx_basic_magic_spells($level, 9, $class, $max_spells);} }

		if ($class != "Cleric"){$spebx_book = substr($spebx_book, 0, -1);} // TRIM THE SPELL BOOK LIST

		if ($level > 8 && $class == "Magic-User"){$skills = $skills . "&nbsp;&nbsp;&nbsp; Can&nbsp;Create&nbsp;Spells&nbsp;&amp;&nbsp;Magic&nbsp;Items";}
	}
	if ($class == "Cleric")
	{
		if ($level == 1){$turning = "7_9_11_0_0_0_0_0";}
		else if ($level == 2){$turning = "T_7_9_11_0_0_0_0";}
		else if ($level == 3){$turning = "T_T_7_9_11_0_0_0";}
		else if ($level == 4){$turning = "D_T_T_7_9_11_0_0";}
		else if ($level == 5){$turning = "D_D_T_T_7_9_11_0";}
		else if ($level == 6){$turning = "D_D_D_T_T_7_9_11";}
		else if ($level == 7){$turning = "D_D_D_D_T_T_7_9";}
		else if ($level == 8){$turning = "D_D_D_D_D_T_T_7";}
		else if ($level == 9){$turning = "D_D_D_D_D_D_T_T";}
		else if ($level == 10){$turning = "D_D_D_D_D_D_D_T";}
		else {$turning = "D_D_D_D_D_D_D_D";}

		$priest = explode("_", $turning);

			$i = 0;
			$skills = $skills . "<br>Turn&nbsp;Undead:&nbsp;";

				while ($turn_table != 1) :

					$cycdead = $cycdead + 1;

					if ($cycdead == 1){$rot = "Skeleton";}
					else if ($cycdead == 2){$rot = "Zombie";}
					else if ($cycdead == 3){$rot = "Ghoul";}
					else if ($cycdead == 4){$rot = "Wight";}
					else if ($cycdead == 5){$rot = "Wraith";}
					else if ($cycdead == 6){$rot = "Mummy";}
					else if ($cycdead == 7){$rot = "Spectre";}
					else if ($cycdead == 8){$rot = "Vampire";}

					if (($priest[$i] == "") || ($priest[$i] == "0") || ($i > 13)){ $turn_table = 1; }
					else { $skills = $skills . " " . $rot . "&nbsp;[" . $priest[$i] . "]&nbsp;&nbsp;&nbsp; ";}

					$i = $i + 1;

				endwhile;
	}
	if ($class == "Dwarf")
	{
		$skills = "Infravision 60ft.&nbsp;&nbsp;&nbsp; 1-2&nbsp;(on&nbsp;1d6) to Find Traps, False Walls, Hidden Construction, &amp; Notice if a Passage is Sloped";
	}
	if ($class == "Elf")
	{
		$skills = $skills . "<br>Infravision 60ft.&nbsp;&nbsp;&nbsp; 1-2&nbsp;(on&nbsp;1d6) to Find Hidden &amp; Secret Doors&nbsp;&nbsp;&nbsp; Immune to Ghoul Paralysis";
	}
	if ($class == "Halfling")
	{
		$skills = "90% Chance to Hide in Bushes or Other Outdoor Cover&nbsp;&nbsp;&nbsp; 1-2&nbsp;(on&nbsp;1d6) to Hide in Shadows or Cover while Underground&nbsp;&nbsp;&nbsp; +1 to Initiative when Alone or with Other Halflings&nbsp;&nbsp;&nbsp; +1 to Missile Attacks&nbsp;&nbsp;&nbsp; -2 Armor Class when Attacked by Creatures Greater than Human Size";
	}
	if ($steal != "")
	{
		$thief = explode("_", $steal);

		$thief_ability_1 = $thief[0]; if ($thief_ability_1 < 0){$thief_ability_1 = 1;}
		$thief_ability_2 = $thief[1]; if ($thief_ability_2 < 0){$thief_ability_2 = 1;}
		$thief_ability_3 = $thief[2]; if ($thief_ability_3 < 0){$thief_ability_3 = 1;}
		$thief_ability_4 = $thief[3]; if ($thief_ability_4 < 0){$thief_ability_4 = 1;}
		$thief_ability_5 = $thief[4]; if ($thief_ability_5 < 0){$thief_ability_5 = 1;}
		$thief_ability_6 = $thief[5]; if ($thief_ability_6 < 0){$thief_ability_6 = 1;}

		$skills = "Open&nbsp;Locks:&nbsp;" . $thief_ability_1 . "%&nbsp;&nbsp;&nbsp; Find&nbsp;&amp;&nbsp;Remove&nbsp;Traps:&nbsp;" . $thief_ability_2 . "%&nbsp;&nbsp;&nbsp; Pick&nbsp;Pockets:&nbsp;" . $thief_ability_3 . "%&nbsp;&nbsp;&nbsp; Move&nbsp;Silently:&nbsp;" . $thief_ability_4 . "%&nbsp;&nbsp;&nbsp; Climb&nbsp;Walls:&nbsp;" . $thief_ability_5 . "%&nbsp;&nbsp;&nbsp; Hide&nbsp;in&nbsp;Shadows:&nbsp;" . $thief_ability_6 . "%&nbsp;&nbsp;&nbsp; Hear&nbsp;Noise:&nbsp;" . $thief[6] . "&nbsp;&nbsp;&nbsp; Back&nbsp;Stab:&nbsp;+4&nbsp;Attack,&nbsp;x2&nbsp;Damage";

		if ($level > 3){$skills = $skills . "&nbsp;&nbsp;&nbsp; Read&nbsp;Languages:&nbsp;80%";}
		if ($level > 9){$skills = $skills . "&nbsp;&nbsp;&nbsp; Use&nbsp;Scrolls:&nbsp;90%";}
	}

	return array($spebx_book, $skills, $xp1, $xp2, $max_spebx_level);
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_basic_name($class, $gender)
{
	if ($gender == "Male")
	{ 
		switch (mt_rand(1,5))
		{
			case 1: $my_name = holmesName(male,0); break;
			case 2: $my_name = holmesName(male,0); break;
			case 3: $my_name = ConanName(Aquilonian,male); if (mt_rand(1,2) == 1){$my_name = $my_name . " " . holmesTitle($gender);} break;
			case 4: $my_name = ConanName(Cimmerian,male); if (mt_rand(1,2) == 1){$my_name = $my_name . " " . holmesTitle($gender);} break;
			case 5: $my_name = ConanName(Stygian,male); if (mt_rand(1,2) == 1){$my_name = $my_name . " " . holmesTitle($gender);} break;
		}
	}
	else
	{
		switch (mt_rand(1,5))
		{
			case 1: $my_name = holmesName(female,0); break;
			case 2: $my_name = holmesName(female,0); break;
			case 3: $my_name = ConanName(Aquilonian,female); if (mt_rand(1,2) == 1){$my_name = $my_name . " " . holmesTitle($gender);} break;
			case 4: $my_name = ConanName(Cimmerian,female); if (mt_rand(1,2) == 1){$my_name = $my_name . " " . holmesTitle($gender);} break;
			case 5: $my_name = ConanName(Stygian,female); if (mt_rand(1,2) == 1){$my_name = $my_name . " " . holmesTitle($gender);} break;
		}
	}
	return $my_name;
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_basic_pocket_change($level,$format)
{
	$value = mt_rand(0,10) + ($level * 10);
	$game = "BD&D";
	$money = coinBuilder($value,$game,1);

	if ($format == 1)
	{
		switch (mt_rand(0,2))
		{
			case 0:	$money = ",&nbsp;&nbsp;&nbsp;&nbsp; small&nbsp;pouch&nbsp;(" . $money . ")";	break;
			case 1:	$money = ",&nbsp;&nbsp;&nbsp;&nbsp; belt&nbsp;pouch&nbsp;(" . $money . ")";		break;
			case 2:	$money = ",&nbsp;&nbsp;&nbsp;&nbsp; small&nbsp;sack&nbsp;(" . $money . ")";		break;
		}
	}
	else { $money = str_replace("&nbsp;/&nbsp;", "<br>", $money); }

	return $money;
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_basic_magic_items($level, $class)
{
	while ( $level > 2 ) :
		if (mt_rand(1,100) > 90){ $item = $item . "<i>" . str_replace(" ", "&nbsp;", strtolower(makeRPGmagic("BD&D",mt_rand(1,4)))) . "</i>" . ",&nbsp;&nbsp;&nbsp;&nbsp; ";}
		$level = $level - 1;
	endwhile;

	$item = substr($item, 0, -26);

	return $item;
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function bx_basic_magic_spells($level, $splvl, $class, $max_spells)
{
	$spebx_array = array();
	$spells_found = ceil(($level/2) - $splvl) + mt_rand(0,1);
	if ($spells_found < 2){$spells_found = mt_rand(2,3);}
	if ($spells_found > $max_spells){$spells_found = $max_spells;}

	while ($spells_found > 0) :

		if ($splvl == 1)
		{
			switch (mt_rand(1,12))
			{
				case 1: $magic_spell = "Charm Person"; break;
				case 2: $magic_spell = "Detect Magic"; break;
				case 3: $magic_spell = "Floating Disc"; break;
				case 4: $magic_spell = "Hold Portal"; break;
				case 5: $magic_spell = "Light"; break;
				case 6: $magic_spell = "Magic Missile"; break;
				case 7: $magic_spell = "Protection from Evil"; break;
				case 8: $magic_spell = "Read Languages"; break;
				case 9: $magic_spell = "Read Magic"; break;
				case 10: $magic_spell = "Shield"; break;
				case 11: $magic_spell = "Sleep"; break;
				case 12: $magic_spell = "Ventriloquism"; break;
			}
		}
		else if ($splvl == 2)
		{
			switch (mt_rand(1,12))
			{
				case 1: $magic_spell = "Wizard Lock"; break;
				case 2: $magic_spell = "Continual Light"; break;
				case 3: $magic_spell = "Detect Evil"; break;
				case 4: $magic_spell = "Detect Invisible"; break;
				case 5: $magic_spell = "ESP"; break;
				case 6: $magic_spell = "Invisibility"; break;
				case 7: $magic_spell = "Knock"; break;
				case 8: $magic_spell = "Levitate"; break;
				case 9: $magic_spell = "Locate Object"; break;
				case 10: $magic_spell = "Mirror Image"; break;
				case 11: $magic_spell = "Phantasmal Force"; break;
				case 12: $magic_spell = "Web"; break;
			}
		}
		else if ($splvl == 3)
		{
			switch (mt_rand(1,12))
			{
				case 1: $magic_spell = "Clairvoyance"; break;
				case 2: $magic_spell = "Dispel Magic"; break;
				case 3: $magic_spell = "Fire Ball"; break;
				case 4: $magic_spell = "Fly"; break;
				case 5: $magic_spell = "Haste"; break;
				case 6: $magic_spell = "Hold Person"; break;
				case 7: $magic_spell = "Infravision"; break;
				case 8: $magic_spell = "Invisibility 10` radius"; break;
				case 9: $magic_spell = "Lightning Bolt"; break;
				case 10: $magic_spell = "Protection from Evil 10` radius"; break;
				case 11: $magic_spell = "Protection from Normal Missiles"; break;
				case 12: $magic_spell = "Water Breathing"; break;
			}
		}
		else if ($splvl == 4)
		{
			switch (mt_rand(1,12))
			{
				case 1: $magic_spell = "Wizard Eye"; break;
				case 2: $magic_spell = "Charm Monster"; break;
				case 3: $magic_spell = "Confusion"; break;
				case 4: $magic_spell = "Dimension Door"; break;
				case 5: $magic_spell = "Hallucinatory Terrain"; break;
				case 6: $magic_spell = "Massmorph"; break;
				case 7: $magic_spell = "Growth of Plants"; break;
				case 8: $magic_spell = "Polymorph Others"; break;
				case 9: $magic_spell = "Polymorph Self"; break;
				case 10: $magic_spell = "Remove Curse"; break;
				case 11: $magic_spell = "Wall of Fire"; break;
				case 12: $magic_spell = "Wall of Ice"; break;
			}
		}
		else if ($splvl == 5)
		{
			switch (mt_rand(1,12))
			{
				case 1: $magic_spell = "Animate Dead"; break;
				case 2: $magic_spell = "Cloudkill"; break;
				case 3: $magic_spell = "Conjure Elemental"; break;
				case 4: $magic_spell = "Contact Higher Plane"; break;
				case 5: $magic_spell = "Feeblemind"; break;
				case 6: $magic_spell = "Hold Monster"; break;
				case 7: $magic_spell = "Magic Jar"; break;
				case 8: $magic_spell = "Pass-Wall"; break;
				case 9: $magic_spell = "Telekinesis"; break;
				case 10: $magic_spell = "Teleport"; break;
				case 11: $magic_spell = "Transmute Rock to Mud"; break;
				case 12: $magic_spell = "Wall of Stone"; break;
			}
		}
		else
		{
			switch (mt_rand(1,12))
			{
				case 1: $magic_spell = "Anti-Magic Shell"; break;
				case 2: $magic_spell = "Control Weather"; break;
				case 3: $magic_spell = "Death Spell"; break;
				case 4: $magic_spell = "Disintegrate"; break;
				case 5: $magic_spell = "Geas"; break;
				case 6: $magic_spell = "Invisible Stalker"; break;
				case 7: $magic_spell = "Lower Water"; break;
				case 8: $magic_spell = "Move Earth"; break;
				case 9: $magic_spell = "Part Water"; break;
				case 10: $magic_spell = "Projected Image"; break;
				case 11: $magic_spell = "Reincarnation"; break;
				case 12: $magic_spell = "Stone to Flesh"; break;
			}
		}

		if (in_array($magic_spell, $spebx_array)){} else { array_push($spebx_array, $magic_spell); $spells_found = $spells_found - 1; }
			$cyc_catch = $cyc_catch + 1; if ($cyc_catch > 100){$spells_found = 0;}

	endwhile;

	$spebx_count = count($spebx_array);
	$s = 0;
	while ($spebx_count > 0) :
		$spells_known = $spells_known . $spebx_array[$s] . "_";
		$s = $s + 1;
		$spebx_count = $spebx_count - 1;
	endwhile;

	return $spells_known;
}



?>