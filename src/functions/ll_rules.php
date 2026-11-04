<?php

function ll_basic_stat($type, $min, $max, $class, $race, $sheet)
{
	$min_val = $min+0; if ($min_val < 3){$min_val = 3;}
	$max_val = $max+0; if ($max_val > 18){$max_val = 18;}
	$roll = mt_rand($min_val,$max_val);
	$what = "";
	$languages = 0;

	switch ($roll)
	{
		case 3: $mod1="-3"; $mod2="+3"; $mod3="-3"; $mod4="-2"; $mod5="-3"; $mod6="0"; $mod7="-3"; $mod8="+2"; $mod9="1"; $mod10="4"; 			$aecmod1="-2"; $aecmod2="40%"; $aecmod3="35%"; $aecmod4="20%"; $aecmod5="2"; $aecmod6="3"; $aecmod7="20%"; $aecmod8="-"; break;
		case 4: $mod1="-2"; $mod2="+2"; $mod3="-2"; $mod4="-1"; $mod5="-2"; $mod6="0"; $mod7="-2"; $mod8="+1"; $mod9="2"; $mod10="5"; 			$aecmod1="-1"; $aecmod2="45%"; $aecmod3="40%"; $aecmod4="30%"; $aecmod5="2"; $aecmod6="4"; $aecmod7="20%"; $aecmod8="-"; break;
		case 5: $mod1="-2"; $mod2="+2"; $mod3="-2"; $mod4="-1"; $mod5="-2"; $mod6="0"; $mod7="-2"; $mod8="+1"; $mod9="2"; $mod10="5"; 			$aecmod1="-1"; $aecmod2="50%"; $aecmod3="45%"; $aecmod4="30%"; $aecmod5="2"; $aecmod6="4"; $aecmod7="20%"; $aecmod8="-"; break;
		case 6: $mod1="-1"; $mod2="+1"; $mod3="-1"; $mod4="-1"; $mod5="-1"; $mod6="0"; $mod7="-1"; $mod8="+1"; $mod9="3"; $mod10="6"; 			$aecmod1="0"; $aecmod2="55%"; $aecmod3="50%"; $aecmod4="35%"; $aecmod5="2"; $aecmod6="5"; $aecmod7="20%"; $aecmod8="-"; break;
		case 7: $mod1="-1"; $mod2="+1"; $mod3="-1"; $mod4="-1"; $mod5="-1"; $mod6="0"; $mod7="-1"; $mod8="+1"; $mod9="3"; $mod10="6"; 			$aecmod1="0"; $aecmod2="60%"; $aecmod3="55%"; $aecmod4="35%"; $aecmod5="2"; $aecmod6="5"; $aecmod7="20%"; $aecmod8="-"; break;
		case 8: $mod1="-1"; $mod2="+1"; $mod3="-1"; $mod4="-1"; $mod5="-1"; $mod6="0"; $mod7="-1"; $mod8="+1"; $mod9="3"; $mod10="6"; 			$aecmod1="0"; $aecmod2="65%"; $aecmod3="60%"; $aecmod4="40%"; $aecmod5="3"; $aecmod6="6"; $aecmod7="20%"; $aecmod8="-"; break;
		case 9: $mod1="0"; $mod2="0"; $mod3="0"; $mod4="0"; $mod5="0"; $mod6="0"; $mod7="0"; $mod8="0"; $mod9="4"; $mod10="7"; 					$aecmod1="0"; $aecmod2="70%"; $aecmod3="65%"; $aecmod4="40%"; $aecmod5="3"; $aecmod6="6"; $aecmod7="20%"; $aecmod8="-"; break;
		case 10: $mod1="0"; $mod2="0"; $mod3="0"; $mod4="0"; $mod5="0"; $mod6="0"; $mod7="0"; $mod8="0"; $mod9="4"; $mod10="7"; 				$aecmod1="0"; $aecmod2="75%"; $aecmod3="70%"; $aecmod4="50%"; $aecmod5="4"; $aecmod6="7"; $aecmod7="15%"; $aecmod8="-"; break;
		case 11: $mod1="0"; $mod2="0"; $mod3="0"; $mod4="0"; $mod5="0"; $mod6="0"; $mod7="0"; $mod8="0"; $mod9="4"; $mod10="7"; 				$aecmod1="0"; $aecmod2="80%"; $aecmod3="75%"; $aecmod4="50%"; $aecmod5="4"; $aecmod6="7"; $aecmod7="5%"; $aecmod8="-"; break;
		case 12: $mod1="0"; $mod2="0"; $mod3="0"; $mod4="0"; $mod5="0"; $mod6="0"; $mod7="0"; $mod8="0"; $mod9="4"; $mod10="7"; 				$aecmod1="0"; $aecmod2="85%"; $aecmod3="80%"; $aecmod4="50%"; $aecmod5="4"; $aecmod6="7"; $aecmod7="0"; $aecmod8="1[1]"; break;
		case 13: $mod1="+1"; $mod2="-1"; $mod3="+1"; $mod4="+1"; $mod5="+1"; $mod6="1"; $mod7="+1"; $mod8="-1"; $mod9="5"; $mod10="8"; 			$aecmod1="0"; $aecmod2="90%"; $aecmod3="85%"; $aecmod4="70%"; $aecmod5="5"; $aecmod6="9"; $aecmod7="0"; $aecmod8="2[1]"; break;
		case 14: $mod1="+1"; $mod2="-1"; $mod3="+1"; $mod4="+1"; $mod5="+1"; $mod6="1"; $mod7="+1"; $mod8="-1"; $mod9="5"; $mod10="8"; 			$aecmod1="0"; $aecmod2="92%"; $aecmod3="90%"; $aecmod4="70%"; $aecmod5="5"; $aecmod6="9"; $aecmod7="0"; $aecmod8="2[1],1[2]"; break;
		case 15: $mod1="+1"; $mod2="-1"; $mod3="+1"; $mod4="+1"; $mod5="+1"; $mod6="1"; $mod7="+1"; $mod8="-1"; $mod9="5"; $mod10="8"; 			$aecmod1="0"; $aecmod2="94%"; $aecmod3="93%"; $aecmod4="75%"; $aecmod5="6"; $aecmod6="11"; $aecmod7="0"; $aecmod8="2[1],2[2]"; break;
		case 16: $mod1="+2"; $mod2="-2"; $mod3="+2"; $mod4="+1"; $mod5="+2"; $mod6="2"; $mod7="+2"; $mod8="-1"; $mod9="6"; $mod10="9"; 			$aecmod1="0"; $aecmod2="96%"; $aecmod3="95%"; $aecmod4="75%"; $aecmod5="6"; $aecmod6="11"; $aecmod7="0"; $aecmod8="2[1],2[2],1[3]"; break;
		case 17: $mod1="+2"; $mod2="-2"; $mod3="+2"; $mod4="+1"; $mod5="+2"; $mod6="2"; $mod7="+2"; $mod8="-1"; $mod9="6"; $mod10="9"; 			$aecmod1="0"; $aecmod2="98%"; $aecmod3="97%"; $aecmod4="85%"; $aecmod5="7"; $aecmod6="Unlimited"; $aecmod7="0"; $aecmod8="2[1],2[2],1[3],1[4]"; break;
		case 18: $mod1="+3"; $mod2="-3"; $mod3="+3"; $mod4="+2"; $mod5="+3"; $mod6="3"; $mod7="+3"; $mod8="-2"; $mod9="7"; $mod10="10"; 		$aecmod1="0"; $aecmod2="100%"; $aecmod3="99%"; $aecmod4="90%"; $aecmod5="8"; $aecmod6="Unlimited"; $aecmod7="0"; $aecmod8="3[1],2[2],1[3],1[4]"; break;
		case 19: $mod1="+3"; $mod2="-4"; $mod3="+3"; $mod4="+2"; $mod5="+3"; $mod6="3"; $mod7="+4"; $mod8="-2"; $mod9="7"; $mod10="10"; 		$aecmod1="+1"; $aecmod2="100%"; $aecmod3="99%"; $aecmod4="90%"; $aecmod5="8"; $aecmod6="Unlimited"; $aecmod7="0"; $aecmod8="3[1],2[2],1[3],1[4]"; break;
	}

	// SOME ATTRIBUTE MODS DO NOT GO WITH SOME CLASSES //
	if (($class != "Magic-User") && ($class != "Elf"))
	{
		$aecmod4="-"; $aecmod5="-"; $aecmod6="-";
	}
	if ($class != "Cleric")
	{
		$aecmod7="0"; $aecmod8="-";
	}
	if (($class == "Fighter") && ($roll == 19))
	{
		$mod1="+4"; $mod5="+4";
	}

	if (($type == "Strength") && ($mod1 != "0")){ $what = $mod1; } else if ($type == "Strength"){ $what = "-";}
	else if ($type == "Dexterity")
	{
		if ($mod2 != "0"){ $what = $what . $mod2 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		if ($mod3 != "0"){ $what = $what . $mod3 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		if ($mod4 != "0"){ $what = $what . $mod4 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		$what = substr($what, 0, -13);
	}
	else if (($type == "Constitution") && ($sheet == 1)) // AEC CONSTITUTION BONUSES
	{
		if ($mod5 != "0"){ $what = $what . $mod5 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		if ($aecmod1 != "0"){ $what = $what . $aecmod1 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		$what = $what . $aecmod2 . "&nbsp;/&nbsp;";
		$what = $what . $aecmod3 . "&nbsp;/&nbsp;";
		$what = substr($what, 0, -13);
	}
	else if (($type == "Intelligence") && ($sheet == 1)) // AEC INTELLIGENCE BONUSES
	{
		if ($mod6 != "0"){ $what = $what . $mod6 . "&nbsp;/&nbsp;"; $languages = $mod6; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		if ($aecmod4 != "-"){ $what = $what . $aecmod4 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		if ($aecmod5 != "-"){ $what = $what . $aecmod5 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		if ($aecmod6 != "-"){ $what = $what . $aecmod6 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		$what = substr($what, 0, -13);
	}
	else if (($type == "Wisdom") && ($sheet == 1)) // AEC WISDOM BONUSES
	{
		if ($mod7 != "0"){ $what = $what . $mod7 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		if ($aecmod7 != "0"){ $what = $what . $aecmod7 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
		if ($aecmod8 != "-"){ $what = $what . $aecmod8 . "&nbsp;/&nbsp;"; } else { $what = $what . "-&nbsp;/&nbsp;"; }
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

	return array($roll, $what, $mod1, $mod2, $mod3, $mod4, $mod5, $mod6, $mod7, $mod8, $mod9, $mod10, $languages, $aecmod1, $aecmod2, $aecmod3, $aecmod4, $aecmod5, $aecmod6, $aecmod7, $aecmod8);
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function ll_basic_alignment()
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

function ll_languages($show,$race,$amount,$aec)
{
	if ($aec == 1){$max = 46;} else {$max = 32;}
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

		switch (mt_rand(0,$max))
		{
			case 0: $talk = "Common"; break;
			case 1: $talk = "Bugbear"; break;
			case 2: $talk = "Centaur"; break;
			case 3: $talk = "Cyclops"; break;
			case 4: $talk = "Doppelganger"; break;
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
			case 19: $talk = "Lizardfolk"; break;
			case 20: $talk = "Medusa"; break;
			case 21: $talk = "Merfolk"; break;
			case 22: $talk = "Minotaur"; break;
			case 23: $talk = "Morlock"; break;
			case 24: $talk = "Neanderthal"; break;
			case 25: $talk = "Nixie"; break;
			case 26: $talk = "Ogre"; break;
			case 27: $talk = "Orc"; break;
			case 28: $talk = "Pixie"; break;
			case 29: $talk = "Sprite"; break;
			case 30: $talk = "Treant"; break;
			case 31: $talk = "Troglodyte"; break;
			case 32: $talk = "Troll"; break;
			case 33: $talk = "Brownie"; break; // BEGIN AEC MONSTERS
			case 34: $talk = "Demon"; break;
			case 35: $talk = "Devil"; break;
			case 36: $talk = "Hag"; break;
			case 37: $talk = "Lammasu"; break;
			case 38: $talk = "Leprechaun"; break;
			case 39: $talk = "Locathah"; break;
			case 40: $talk = "Naga"; break;
			case 41: $talk = "Nymph"; break;
			case 42: $talk = "Sahuagin"; break;
			case 43: $talk = "Satyr"; break;
			case 44: $talk = "Sphinx"; break;
			case 45: $talk = "Titan"; break;
			case 46: $talk = "Triton"; break;
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

function ll_basic_saves($class, $level)
{
	if ($class=="Cleric" && $level>0 && $level<5){$sv1=16; $sv2=11; $sv3=14; $sv4=12; $sv5=15;}
	else if ($class=="Cleric" && $level>4 && $level<9){$sv1=14; $sv2=9; $sv3=12; $sv4=10; $sv5=12;}
	else if ($class=="Cleric" && $level>8 && $level<13){$sv1=12; $sv2=7; $sv3=10; $sv4=8; $sv5=9;}
	else if ($class=="Cleric" && $level>12 && $level<17){$sv1=8; $sv2=3; $sv3=8; $sv4=4; $sv5=6;}
	else if ($class=="Cleric" && $level>16 && $level<21){$sv1=6; $sv2=2; $sv3=6; $sv4=4; $sv5=5;}

	else if ($class=="Dwarf" && $level>0 && $level<4){$sv1=13; $sv2=8; $sv3=10; $sv4=9; $sv5=12;}
	else if ($class=="Dwarf" && $level>3 && $level<7){$sv1=10; $sv2=6; $sv3=8; $sv4=7; $sv5=10;}
	else if ($class=="Dwarf" && $level>6 && $level<10){$sv1=7; $sv2=4; $sv3=6; $sv4=5; $sv5=8;}
	else if ($class=="Dwarf" && $level>9 && $level<21){$sv1=4; $sv2=2; $sv3=4; $sv4=3; $sv5=6;}

	else if ($class=="Halfling" && $level>0 && $level<4){$sv1=13; $sv2=8; $sv3=10; $sv4=9; $sv5=12;}
	else if ($class=="Halfling" && $level>3 && $level<7){$sv1=10; $sv2=6; $sv3=8; $sv4=7; $sv5=10;}
	else if ($class=="Halfling" && $level>6 && $level<21){$sv1=7; $sv2=4; $sv3=6; $sv4=5; $sv5=8;}

	else if ($class=="Elf" && $level>0 && $level<4){$sv1=15; $sv2=12; $sv3=13; $sv4=13; $sv5=15;}
	else if ($class=="Elf" && $level>3 && $level<7){$sv1=13; $sv2=10; $sv3=11; $sv4=11; $sv5=13;}
	else if ($class=="Elf" && $level>6 && $level<10){$sv1=9; $sv2=8; $sv3=9; $sv4=9; $sv5=11;}
	else if ($class=="Elf" && $level>9 && $level<21){$sv1=7; $sv2=6; $sv3=7; $sv4=7; $sv5=9;}

	else if ($class=="Fighter" && $level<1){$sv1=17; $sv2=14; $sv3=16; $sv4=15; $sv5=18;}
	else if ($class=="Fighter" && $level>0 && $level<4){$sv1=15; $sv2=12; $sv3=14; $sv4=13; $sv5=16;}
	else if ($class=="Fighter" && $level>3 && $level<7){$sv1=13; $sv2=10; $sv3=12; $sv4=11; $sv5=14;}
	else if ($class=="Fighter" && $level>6 && $level<10){$sv1=9; $sv2=8; $sv3=10; $sv4=9; $sv5=12;}
	else if ($class=="Fighter" && $level>9 && $level<13){$sv1=7; $sv2=6; $sv3=8; $sv4=7; $sv5=10;}
	else if ($class=="Fighter" && $level>12 && $level<16){$sv1=5; $sv2=4; $sv3=6; $sv4=5; $sv5=8;}
	else if ($class=="Fighter" && $level>15 && $level<19){$sv1=4; $sv2=4; $sv3=5; $sv4=4; $sv5=7;}
	else if ($class=="Fighter" && $level>18 && $level<21){$sv1=4; $sv2=3; $sv3=4; $sv4=3; $sv5=6;}

	else if ($class=="Magic-User" && $level>0 && $level<6){$sv1=16; $sv2=13; $sv3=13; $sv4=13; $sv5=14;}
	else if ($class=="Magic-User" && $level>5 && $level<11){$sv1=14; $sv2=11; $sv3=11; $sv4=11; $sv5=12;}
	else if ($class=="Magic-User" && $level>10 && $level<16){$sv1=12; $sv2=9; $sv3=9; $sv4=9; $sv5=8;}
	else if ($class=="Magic-User" && $level>15 && $level<19){$sv1=8; $sv2=7; $sv3=6; $sv4=5; $sv5=6;}
	else if ($class=="Magic-User" && $level>18 && $level<21){$sv1=7; $sv2=6; $sv3=5; $sv4=4; $sv5=4;}

	else if ($class=="Thief" && $level>0 && $level<5){$sv1=16; $sv2=14; $sv3=13; $sv4=15; $sv5=14;}
	else if ($class=="Thief" && $level>4 && $level<9){$sv1=14; $sv2=12; $sv3=11; $sv4=13; $sv5=12;}
	else if ($class=="Thief" && $level>8 && $level<13){$sv1=12; $sv2=10; $sv3=9; $sv4=11; $sv5=10;}
	else if ($class=="Thief" && $level>12 && $level<17){$sv1=10; $sv2=8; $sv3=7; $sv4=9; $sv5=8;}
	else if ($class=="Thief" && $level>16 && $level<21){$sv1=8; $sv2=6; $sv3=5; $sv4=7; $sv5=6;}

	return array($sv1,$sv2,$sv3,$sv4,$sv5);
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function ll_basic_attacks($class, $level)
{
	if (($class=="Cleric" || $class=="Thief") && $level>=0 && $level<=3){$value=2;}
	else if (($class=="Cleric" || $class=="Thief") && $level>=4 && $level<=5){$value=3;}
	else if (($class=="Cleric" || $class=="Thief") && $level>=6 && $level<=8){$value=4;}
	else if (($class=="Cleric" || $class=="Thief") && $level>=9 && $level<=10){$value=5;}
	else if (($class=="Cleric" || $class=="Thief") && $level>=11 && $level<=11){$value=6;}
	else if (($class=="Cleric" || $class=="Thief") && $level>=12 && $level<=12){$value=7;}
	else if (($class=="Cleric" || $class=="Thief") && $level>=13 && $level<=14){$value=8;}
	else if (($class=="Cleric" || $class=="Thief") && $level>=15 && $level<=16){$value=9;}
	else if (($class=="Cleric" || $class=="Thief") && $level>=17 && $level<=18){$value=10;}
	else if (($class=="Cleric" || $class=="Thief") && $level>=19 && $level<=20){$value=11;}
	else if ($class=="Cleric" || $class=="Thief"){$value=12;}

	else if ($class=="Magic-User" && $level>=0 && $level<=3){$value=2;}
	else if ($class=="Magic-User" && $level>=4 && $level<=7){$value=3;}
	else if ($class=="Magic-User" && $level>=8 && $level<=10){$value=4;}
	else if ($class=="Magic-User" && $level>=11 && $level<=12){$value=5;}
	else if ($class=="Magic-User" && $level>=13 && $level<=13){$value=6;}
	else if ($class=="Magic-User" && $level>=14 && $level<=15){$value=7;}
	else if ($class=="Magic-User" && $level>=16 && $level<=18){$value=8;}
	else if ($class=="Magic-User" && $level>=19 && $level<=20){$value=9;}
	else if ($class=="Magic-User" && $level>=21 && $level<=23){$value=10;}
	else if ($class=="Magic-User"){$value=11;}

	else if ($level<1){$value=1;}
	else if ($level>=1 && $level<=2){$value=2;}
	else if ($level==3){$value=3;}
	else if ($level==4){$value=4;}
	else if ($level==5){$value=5;}
	else if ($level==6){$value=6;}
	else if ($level>=7 && $level<=8){$value=7;}
	else if ($level==9){$value=8;}
	else if ($level>=10 && $level<=11){$value=9;}
	else if ($level==12){$value=10;}
	else if ($level==13){$value=11;}
	else if ($level==14){$value=12;}
	else if ($level==15){$value=13;}
	else if ($level==16){$value=14;}
	else if ($level==17){$value=15;}
	else if ($level==18){$value=16;}
	else {$value=17;}

	switch ($value)
	{
		case 1: $attacks = "20_20_20_20_19_18_17_16_15_14_13_12_11"; break;
		case 2: $attacks = "20_20_20_19_18_17_16_15_14_13_12_11_10"; break;
		case 3: $attacks = "20_20_19_18_17_16_15_14_13_12_11_10_9"; break;
		case 4: $attacks = "20_19_18_17_16_15_14_13_12_11_10_9_8"; break;
		case 5: $attacks = "19_18_17_16_15_14_13_12_11_10_9_8_7"; break;
		case 6: $attacks = "18_17_16_15_14_13_12_11_10_9_8_7_6"; break;
		case 7: $attacks = "17_16_15_14_13_12_11_10_9_8_7_6_5"; break;
		case 8: $attacks = "16_15_14_13_12_11_10_9_8_7_6_5_4"; break;
		case 9: $attacks = "15_14_13_12_11_10_9_8_7_6_5_4_3"; break;
		case 10: $attacks = "14_13_12_11_10_9_8_7_6_5_4_3_2"; break;
		case 11: $attacks = "13_12_11_10_9_8_7_6_5_4_3_2_2"; break;
		case 12: $attacks = "12_11_10_9_8_7_6_5_4_3_2_2_2"; break;
		case 13: $attacks = "11_10_9_8_7_6_5_4_3_2_2_2_2"; break;
		case 14: $attacks = "10_9_8_7_6_5_4_3_2_2_2_2_2"; break;
		case 15: $attacks = "9_8_7_6_5_4_3_2_2_2_2_2_2"; break;
		case 16: $attacks = "8_7_6_5_4_3_2_2_2_2_2_2_2"; break;
		case 17: $attacks = "7_6_5_4_3_2_2_2_2_2_2_2_2"; break;
	}

	return $attacks;
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function ll_basic_hit_points($class, $level, $con, $max)
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

function ll_basic_age($class, $level)
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

function ll_basic_gear($class, $level, $dex, $magic)
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

	if ($class == "Cleric"){ $min=3; $max=8; }
	else if ($class == "Dwarf"){ $min=4; $max=8; }
	else if ($class == "Elf"){ $min=4; $max=8; }
	else if ($class == "Fighter"){ $min=4; $max=8; }
	else if ($class == "Halfling"){ $min=1; $max=2; }
	else if ($class == "Magic-User"){ $min=0; $max=0; }
	else if ($class == "Thief"){ $min=1; $max=2; }

	switch (mt_rand($min,$max))
	{
		case 1: $armor = "padded armor"; $ac=-1; break;
		case 2: $armor = "leather armor"; $ac=-1; break;
		case 3: $armor = "studded leather armor"; $ac=-2; break;
		case 4: $armor = "scale mail armor"; $ac=-3; break;
		case 5: $armor = "chain mail armor"; $ac=-4; break;
		case 6: $armor = "banded mail armor"; $ac=-5; break;
		case 7: $armor = "splint mail armor"; $ac=-5; break;
		case 8: $armor = "plate mail armor"; $ac=-6; break;
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

function ll_basic_xp_bonus($class, $str, $dex, $con, $wis, $cha, $int)
{
	$value = "-";
	if ($class == "Cleric")
	{
		if ($wis < 6){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($wis < 9){$bonus = "-5% Penalty to Experience Points"; $value = "-5%";}
		else if ($wis > 15){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($wis > 12){$bonus = "5% Bonus to Experience Points"; $value = "5%";}
	}
	else if ($class == "Dwarf")
	{
		if ($str < 6){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($str < 9){$bonus = "-5% Penalty to Experience Points"; $value = "-5%";}
		else if ($str > 15){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($str > 12){$bonus = "5% Bonus to Experience Points"; $value = "-10%";}
	}
	else if ($class == "Elf")
	{
		if ($str<6 || $int<6){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($str<9 || $int<6){$bonus = "-5% Penalty to Experience Points"; $value = "-5%";}
		else if ($str>15 && $int>15){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($str>12 && $int>12){$bonus = "5% Bonus to Experience Points"; $value = "5%";}
	}
	else if ($class == "Fighter")
	{
		if ($str < 6){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($str < 9){$bonus = "-5% Penalty to Experience Points"; $value = "-5%";}
		else if ($str > 15){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($str > 12){$bonus = "5% Bonus to Experience Points"; $value = "5%";}
	}
	else if ($class == "Halfling")
	{
		if ($str<6 || $dex<6){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($str<9 || $dex<6){$bonus = "-5% Penalty to Experience Points"; $value = "-5%";}
		else if ($str>12 && $dex>12){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($str>12 || $dex>12){$bonus = "5% Bonus to Experience Points"; $value = "5%";}
	}
	else if ($class == "Magic-User")
	{
		if ($int < 6){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($int < 9){$bonus = "-5% Penalty to Experience Points"; $value = "-5%";}
		else if ($int > 15){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($int > 12){$bonus = "5% Bonus to Experience Points"; $value = "5%";}
	}
	else if ($class == "Thief")
	{
		if ($dex < 6){$bonus = "-10% Penalty to Experience Points"; $value = "-10%";}
		else if ($dex < 9){$bonus = "-5% Penalty to Experience Points"; $value = "-5%";}
		else if ($dex > 15){$bonus = "10% Bonus to Experience Points"; $value = "10%";}
		else if ($dex > 12){$bonus = "5% Bonus to Experience Points"; $value = "5%";}
	}

	return array($bonus,$value);
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function ll_basic_level($class, $level, $randxp, $max_spells, $dexterity, $use_aec)
{
	$spell = ""; $steal = "";

	// ANY THIEF SKILL ADJUSTMENTS //
	if ( $use_aec > 0 )
	{
		if ($dexterity < 4){$thief_mod = -60;}
		else if ($dexterity < 6){$thief_mod = -30;}
		else if ($dexterity < 9){$thief_mod = -15;}
		else if ($dexterity > 18){$thief_mod = 15;}
		else if ($dexterity > 17){$thief_mod = 10;}
		else if ($dexterity > 15){$thief_mod = 5;}
	}

	if ($class == "Cleric" && $level == 1){$hp=$hp+$hd; $spells = "1|0|0|0|0|0|0"; $xp1 = "0"; $xp2 = "1,565"; $max_spell_level = 1; }
	else if ($class == "Cleric" && $level == 2){$hp=$hp+$hd; $spells = "2|0|0|0|0|0|0"; $xp1 = "1,565"; $xp2 = "3,125"; $max_spell_level = 1; }
	else if ($class == "Cleric" && $level == 3){$hp=$hp+$hd; $spells = "2|1|0|0|0|0|0"; $xp1 = "3,125"; $xp2 = "6,251"; $max_spell_level = 2; }
	else if ($class == "Cleric" && $level == 4){$hp=$hp+$hd; $spells = "3|2|0|0|0|0|0"; $xp1 = "6,251"; $xp2 = "12,501"; $max_spell_level = 2; }
	else if ($class == "Cleric" && $level == 5){$hp=$hp+$hd; $spells = "3|2|1|0|0|0|0"; $xp1 = "12,501"; $xp2 = "25,001"; $max_spell_level = 3; }
	else if ($class == "Cleric" && $level == 6){$hp=$hp+$hd; $spells = "3|3|2|0|0|0|0"; $xp1 = "25,001"; $xp2 = "50,001"; $max_spell_level = 3; }
	else if ($class == "Cleric" && $level == 7){$hp=$hp+$hd; $spells = "4|3|2|1|0|0|0"; $xp1 = "50,001"; $xp2 = "100,001"; $max_spell_level = 4; }
	else if ($class == "Cleric" && $level == 8){$hp=$hp+$hd; $spells = "4|3|3|2|0|0|0"; $xp1 = "100,001"; $xp2 = "200,001"; $max_spell_level = 4; }
	else if ($class == "Cleric" && $level == 9){$hp=$hp+$hd; $spells = "4|4|3|2|1|0|0"; $xp1 = "200,001"; $xp2 = "300,001"; $max_spell_level = 5; }
	else if ($class == "Cleric" && $level == 10){$hp=$hp+1; $spells = "5|4|3|3|2|0|0"; $xp1 = "300,001"; $xp2 = "400,001"; $max_spell_level = 5; }
	else if ($class == "Cleric" && $level == 11){$hp=$hp+1; $spells = "5|4|4|3|2|1|0"; $xp1 = "400,001"; $xp2 = "500,001"; $max_spell_level = 6; }
	else if ($class == "Cleric" && $level == 12){$hp=$hp+1; $spells = "5|5|4|3|3|2|0"; $xp1 = "500,001"; $xp2 = "600,001"; $max_spell_level = 6; }
	else if ($class == "Cleric" && $level == 13){$hp=$hp+1; $spells = "6|5|4|4|3|2|0"; $xp1 = "600,001"; $xp2 = "700,001"; $max_spell_level = 6; }
	else if ($class == "Cleric" && $level == 14){$hp=$hp+1; $spells = "6|5|5|4|3|3|0"; $xp1 = "700,001"; $xp2 = "800,001"; $max_spell_level = 6; }
	else if ($class == "Cleric" && $level == 15){$hp=$hp+1; $spells = "7|6|5|4|4|3|1"; $xp1 = "800,001"; $xp2 = "900,001"; $max_spell_level = 7; }
	else if ($class == "Cleric" && $level == 16){$hp=$hp+1; $spells = "7|6|5|5|4|3|2"; $xp1 = "900,001"; $xp2 = "1,000,001"; $max_spell_level = 7; }
	else if ($class == "Cleric" && $level == 17){$hp=$hp+1; $spells = "8|7|6|5|4|4|2"; $xp1 = "1,000,001"; $xp2 = "1,100,001"; $max_spell_level = 7; }
	else if ($class == "Cleric" && $level == 18){$hp=$hp+1; $spells = "8|7|6|5|5|4|3"; $xp1 = "1,100,001"; $xp2 = "1,200,001"; $max_spell_level = 7; }
	else if ($class == "Cleric" && $level == 19){$hp=$hp+1; $spells = "9|8|7|6|5|4|3"; $xp1 = "1,200,001"; $xp2 = "1,300,001"; $max_spell_level = 7; }
	else if ($class == "Cleric" && $level == 20){$hp=$hp+1; $spells = "9|8|7|6|5|5|3"; $xp1 = "1,300,001"; $xp2 = "0"; $max_spell_level = 7; }
	else if ($class == "Dwarf" && $level == 1){$hp=$hp+$hd; $xp1 = "0"; $xp2 = "2,187";}
	else if ($class == "Dwarf" && $level == 2){$hp=$hp+$hd; $xp1 = "2,187"; $xp2 = "4,375";}
	else if ($class == "Dwarf" && $level == 3){$hp=$hp+$hd; $xp1 = "4,375"; $xp2 = "8,751";}
	else if ($class == "Dwarf" && $level == 4){$hp=$hp+$hd; $xp1 = "8,751"; $xp2 = "17,501";}
	else if ($class == "Dwarf" && $level == 5){$hp=$hp+$hd; $xp1 = "17,501"; $xp2 = "35,001";}
	else if ($class == "Dwarf" && $level == 6){$hp=$hp+$hd; $xp1 = "35,001"; $xp2 = "70,001";}
	else if ($class == "Dwarf" && $level == 7){$hp=$hp+$hd; $xp1 = "70,001"; $xp2 = "140,001";}
	else if ($class == "Dwarf" && $level == 8){$hp=$hp+$hd; $xp1 = "140,001"; $xp2 = "280,001";}
	else if ($class == "Dwarf" && $level == 9){$hp=$hp+$hd; $xp1 = "280,001"; $xp2 = "400,001";}
	else if ($class == "Dwarf" && $level == 10){$hp=$hp+3; $xp1 = "400,001"; $xp2 = "540,001";}
	else if ($class == "Dwarf" && $level == 11){$hp=$hp+3; $xp1 = "540,001"; $xp2 = "660,001";}
	else if ($class == "Dwarf" && $level == 12){$hp=$hp+3; $xp1 = "660,001"; $xp2 = "0";}
	else if ($class == "Elf" && $level == 1){$hp=$hp+$hd; $spells = "1|0|0|0|0"; $xp1 = "0"; $xp2 = "4,065"; $max_spell_level = 1; }
	else if ($class == "Elf" && $level == 2){$hp=$hp+$hd; $spells = "2|0|0|0|0"; $xp1 = "4,065"; $xp2 = "8,125"; $max_spell_level = 1; }
	else if ($class == "Elf" && $level == 3){$hp=$hp+$hd; $spells = "2|1|0|0|0"; $xp1 = "8,125"; $xp2 = "16,251"; $max_spell_level = 2; }
	else if ($class == "Elf" && $level == 4){$hp=$hp+$hd; $spells = "2|2|0|0|0"; $xp1 = "16,251"; $xp2 = "32,501"; $max_spell_level = 2; }
	else if ($class == "Elf" && $level == 5){$hp=$hp+$hd; $spells = "2|2|1|0|0"; $xp1 = "32,501"; $xp2 = "65,001"; $max_spell_level = 3; }
	else if ($class == "Elf" && $level == 6){$hp=$hp+$hd; $spells = "2|2|2|0|0"; $xp1 = "65,001"; $xp2 = "130,001"; $max_spell_level = 3; }
	else if ($class == "Elf" && $level == 7){$hp=$hp+$hd; $spells = "3|2|2|1|0"; $xp1 = "130,001"; $xp2 = "200,001"; $max_spell_level = 4; }
	else if ($class == "Elf" && $level == 8){$hp=$hp+$hd; $spells = "3|3|2|2|0"; $xp1 = "200,001"; $xp2 = "400,001"; $max_spell_level = 4; }
	else if ($class == "Elf" && $level == 9){$hp=$hp+$hd; $spells = "3|3|3|2|1"; $xp1 = "400,001"; $xp2 = "600,001"; $max_spell_level = 5; }
	else if ($class == "Elf" && $level == 10){$hp=$hp+2; $spells = "3|3|3|3|2"; $xp1 = "600,001"; $xp2 = "0"; $max_spell_level = 5; }
	else if ($class == "Fighter" && $level == 1){$hp=$hp+$hd; $xp1 = "0"; $xp2 = "2,035";}
	else if ($class == "Fighter" && $level == 2){$hp=$hp+$hd; $xp1 = "2,035"; $xp2 = "4,065";}
	else if ($class == "Fighter" && $level == 3){$hp=$hp+$hd; $xp1 = "4,065"; $xp2 = "8,125";}
	else if ($class == "Fighter" && $level == 4){$hp=$hp+$hd; $xp1 = "8,125"; $xp2 = "16,251";}
	else if ($class == "Fighter" && $level == 5){$hp=$hp+$hd; $xp1 = "16,251"; $xp2 = "32,501";}
	else if ($class == "Fighter" && $level == 6){$hp=$hp+$hd; $xp1 = "32,501"; $xp2 = "65,001";}
	else if ($class == "Fighter" && $level == 7){$hp=$hp+$hd; $xp1 = "65,001"; $xp2 = "120,001";}
	else if ($class == "Fighter" && $level == 8){$hp=$hp+$hd; $xp1 = "120,001"; $xp2 = "240,001";}
	else if ($class == "Fighter" && $level == 9){$hp=$hp+$hd; $xp1 = "240,001"; $xp2 = "360,001";}
	else if ($class == "Fighter" && $level == 10){$hp=$hp+2; $xp1 = "360,001"; $xp2 = "480,001";}
	else if ($class == "Fighter" && $level == 11){$hp=$hp+2; $xp1 = "480,001"; $xp2 = "600,001";}
	else if ($class == "Fighter" && $level == 12){$hp=$hp+2; $xp1 = "600,001"; $xp2 = "720,001";}
	else if ($class == "Fighter" && $level == 13){$hp=$hp+2; $xp1 = "720,001"; $xp2 = "840,001";}
	else if ($class == "Fighter" && $level == 14){$hp=$hp+2; $xp1 = "840,001"; $xp2 = "960,001";}
	else if ($class == "Fighter" && $level == 15){$hp=$hp+2; $xp1 = "960,001"; $xp2 = "1,080,001";}
	else if ($class == "Fighter" && $level == 16){$hp=$hp+2; $xp1 = "1,080,001"; $xp2 = "1,200,001";}
	else if ($class == "Fighter" && $level == 17){$hp=$hp+2; $xp1 = "1,200,001"; $xp2 = "1,320,001";}
	else if ($class == "Fighter" && $level == 18){$hp=$hp+2; $xp1 = "1,320,001"; $xp2 = "1,440,001";}
	else if ($class == "Fighter" && $level == 19){$hp=$hp+2; $xp1 = "1,440,001"; $xp2 = "1,560,001";}
	else if ($class == "Fighter" && $level == 20){$hp=$hp+2; $xp1 = "1,560,001"; $xp2 = "0";}
	else if ($class == "Halfling" && $level == 1){$hp=$hp+$hd; $xp1 = "0"; $xp2 = "2,035";}
	else if ($class == "Halfling" && $level == 2){$hp=$hp+$hd; $xp1 = "2,035"; $xp2 = "4,065";}
	else if ($class == "Halfling" && $level == 3){$hp=$hp+$hd; $xp1 = "4,065"; $xp2 = "8,125";}
	else if ($class == "Halfling" && $level == 4){$hp=$hp+$hd; $xp1 = "8,125"; $xp2 = "16,251";}
	else if ($class == "Halfling" && $level == 5){$hp=$hp+$hd; $xp1 = "16,251"; $xp2 = "32,501";}
	else if ($class == "Halfling" && $level == 6){$hp=$hp+$hd; $xp1 = "32,501"; $xp2 = "65,001";}
	else if ($class == "Halfling" && $level == 7){$hp=$hp+$hd; $xp1 = "65,001"; $xp2 = "130,001";}
	else if ($class == "Halfling" && $level == 8){$hp=$hp+$hd; $xp1 = "130,001"; $xp2 = "0";}
	else if ($class == "Magic-User" && $level == 1){$hp=$hp+$hd; $spells = "1|0|0|0|0|0|0|0|0"; $xp1 = "0"; $xp2 = "2,501"; $max_spell_level = 1; }
	else if ($class == "Magic-User" && $level == 2){$hp=$hp+$hd; $spells = "2|0|0|0|0|0|0|0|0"; $xp1 = "2,501"; $xp2 = "5,001"; $max_spell_level = 1; }
	else if ($class == "Magic-User" && $level == 3){$hp=$hp+$hd; $spells = "2|1|0|0|0|0|0|0|0"; $xp1 = "5,001"; $xp2 = "10,001"; $max_spell_level = 2; }
	else if ($class == "Magic-User" && $level == 4){$hp=$hp+$hd; $spells = "2|2|0|0|0|0|0|0|0"; $xp1 = "10,001"; $xp2 = "20,001"; $max_spell_level = 2; }
	else if ($class == "Magic-User" && $level == 5){$hp=$hp+$hd; $spells = "2|2|1|0|0|0|0|0|0"; $xp1 = "20,001"; $xp2 = "40,001"; $max_spell_level = 3; }
	else if ($class == "Magic-User" && $level == 6){$hp=$hp+$hd; $spells = "2|2|2|0|0|0|0|0|0"; $xp1 = "40,001"; $xp2 = "80,001"; $max_spell_level = 3; }
	else if ($class == "Magic-User" && $level == 7){$hp=$hp+$hd; $spells = "3|2|2|1|0|0|0|0|0"; $xp1 = "80,001"; $xp2 = "160,001"; $max_spell_level = 4; }
	else if ($class == "Magic-User" && $level == 8){$hp=$hp+$hd; $spells = "3|3|2|2|0|0|0|0|0"; $xp1 = "160,001"; $xp2 = "310,001"; $max_spell_level = 4; }
	else if ($class == "Magic-User" && $level == 9){$hp=$hp+$hd; $spells = "3|3|3|2|1|0|0|0|0"; $xp1 = "310,001"; $xp2 = "460,001"; $max_spell_level = 5; }
	else if ($class == "Magic-User" && $level == 10){$hp=$hp+1; $spells = "3|3|3|3|2|0|0|0|0"; $xp1 = "460,001"; $xp2 = "610,001"; $max_spell_level = 5; }
	else if ($class == "Magic-User" && $level == 11){$hp=$hp+1; $spells = "4|3|3|3|2|1|0|0|0"; $xp1 = "610,001"; $xp2 = "760,001"; $max_spell_level = 6; }
	else if ($class == "Magic-User" && $level == 12){$hp=$hp+1; $spells = "4|4|3|3|3|2|0|0|0"; $xp1 = "760,001"; $xp2 = "910,001"; $max_spell_level = 6; }
	else if ($class == "Magic-User" && $level == 13){$hp=$hp+1; $spells = "4|4|4|3|3|2|1|0|0"; $xp1 = "910,001"; $xp2 = "1,060,001"; $max_spell_level = 7; }
	else if ($class == "Magic-User" && $level == 14){$hp=$hp+1; $spells = "4|4|4|4|3|3|2|0|0"; $xp1 = "1,060,001"; $xp2 = "1,210,001"; $max_spell_level = 7; }
	else if ($class == "Magic-User" && $level == 15){$hp=$hp+1; $spells = "5|4|4|4|4|3|2|1|0"; $xp1 = "1,210,001"; $xp2 = "1,360,001"; $max_spell_level = 8; }
	else if ($class == "Magic-User" && $level == 16){$hp=$hp+1; $spells = "5|5|4|4|4|4|3|2|0"; $xp1 = "1,360,001"; $xp2 = "1,510,001"; $max_spell_level = 8; }
	else if ($class == "Magic-User" && $level == 17){$hp=$hp+1; $spells = "5|5|5|4|4|4|4|3|1"; $xp1 = "1,510,001"; $xp2 = "1,660,001"; $max_spell_level = 9; }
	else if ($class == "Magic-User" && $level == 18){$hp=$hp+1; $spells = "5|5|5|5|4|4|4|4|2"; $xp1 = "1,660,001"; $xp2 = "1,810,001"; $max_spell_level = 9; }
	else if ($class == "Magic-User" && $level == 19){$hp=$hp+1; $spells = "6|5|5|5|5|4|4|4|3"; $xp1 = "1,810,001"; $xp2 = "1,960,001"; $max_spell_level = 9; }
	else if ($class == "Magic-User" && $level == 20){$hp=$hp+1; $spells = "6|6|5|5|5|5|4|4|4"; $xp1 = "1,960,001"; $xp2 = "0"; $max_spell_level = 9; }
	else if ($class == "Thief" && $level == 1){$hp=$hp+$hd; $steal = "17|14|23|23|87|13|1-2"; $xp1 = "0"; $xp2 = "1,251";}
	else if ($class == "Thief" && $level == 2){$hp=$hp+$hd; $steal = "23|17|27|27|88|17|1-2"; $xp1 = "1,251"; $xp2 = "2,501";}
	else if ($class == "Thief" && $level == 3){$hp=$hp+$hd; $steal = "27|20|30|30|89|20|1-3"; $xp1 = "2,501"; $xp2 = "5,001";}
	else if ($class == "Thief" && $level == 4){$hp=$hp+$hd; $steal = "31|23|37|37|90|27|1-3"; $xp1 = "5,001"; $xp2 = "10,001";}
	else if ($class == "Thief" && $level == 5){$hp=$hp+$hd; $steal = "35|33|40|40|91|30|1-3"; $xp1 = "10,001"; $xp2 = "20,001";}
	else if ($class == "Thief" && $level == 6){$hp=$hp+$hd; $steal = "45|43|43|43|92|37|1-4"; $xp1 = "20,001"; $xp2 = "40,001";}
	else if ($class == "Thief" && $level == 7){$hp=$hp+$hd; $steal = "55|53|53|53|93|47|1-4"; $xp1 = "40,001"; $xp2 = "80,001";}
	else if ($class == "Thief" && $level == 8){$hp=$hp+$hd; $steal = "65|63|63|63|94|57|1-4"; $xp1 = "80,001"; $xp2 = "160,001";}
	else if ($class == "Thief" && $level == 9){$hp=$hp+$hd; $steal = "75|73|73|73|95|67|1-4"; $xp1 = "160,001"; $xp2 = "280,001";}
	else if ($class == "Thief" && $level == 10){$hp=$hp+2; $steal = "85|83|83|83|96|77|1-5"; $xp1 = "280,001"; $xp2 = "400,001";}
	else if ($class == "Thief" && $level == 11){$hp=$hp+2; $steal = "95|93|93|93|97|87|1-5"; $xp1 = "400,001"; $xp2 = "520,001";}
	else if ($class == "Thief" && $level == 12){$hp=$hp+2; $steal = "97|95|105|95|98|90|1-5"; $xp1 = "520,001"; $xp2 = "640,001";}
	else if ($class == "Thief" && $level == 13){$hp=$hp+2; $steal = "99|97|115|97|99|97|1-5"; $xp1 = "640,001"; $xp2 = "760,001";}
	else if ($class == "Thief" && $level == 14){$hp=$hp+2; $steal = "99|99|125|99|99|99|1-5"; $xp1 = "760,001"; $xp2 = "880,001";}
	else if ($class == "Thief" && $level == 15){$hp=$hp+2; $steal = "99|99|125|99|99|99|1-5"; $xp1 = "880,001"; $xp2 = "1,000,001";}
	else if ($class == "Thief" && $level == 16){$hp=$hp+2; $steal = "99|99|125|99|99|99|1-5"; $xp1 = "1,000,001"; $xp2 = "1,120,001";}
	else if ($class == "Thief" && $level == 17){$hp=$hp+2; $steal = "99|99|125|99|99|99|1-5"; $xp1 = "1,120,001"; $xp2 = "1,240,001";}
	else if ($class == "Thief" && $level == 18){$hp=$hp+2; $steal = "99|99|125|99|99|99|1-5"; $xp1 = "1,240,001"; $xp2 = "1,360,001";}
	else if ($class == "Thief" && $level == 19){$hp=$hp+2; $steal = "99|99|125|99|99|99|1-5"; $xp1 = "1,360,001"; $xp2 = "1,480,001";}
	else if ($class == "Thief" && $level == 20){$hp=$hp+2; $steal = "99|99|125|99|99|99|1-5"; $xp1 = "1,480,001"; $xp2 = "0";}

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
		if ($mage[0] > 0){$skills = $skills . " Lvl1&nbsp;[" . $mage[0] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spell_book = $spell_book . ll_basic_magic_spells($level, 1, $class, $max_spells);} }
		if ($mage[1] > 0){$skills = $skills . " Lvl2&nbsp;[" . $mage[1] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spell_book = $spell_book . ll_basic_magic_spells($level, 2, $class, $max_spells);} }
		if ($mage[2] > 0){$skills = $skills . " Lvl3&nbsp;[" . $mage[2] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spell_book = $spell_book . ll_basic_magic_spells($level, 3, $class, $max_spells);} }
		if ($mage[3] > 0){$skills = $skills . " Lvl4&nbsp;[" . $mage[3] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spell_book = $spell_book . ll_basic_magic_spells($level, 4, $class, $max_spells);} }
		if ($mage[4] > 0){$skills = $skills . " Lvl5&nbsp;[" . $mage[4] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spell_book = $spell_book . ll_basic_magic_spells($level, 5, $class, $max_spells);} }
		if ($mage[5] > 0){$skills = $skills . " Lvl6&nbsp;[" . $mage[5] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spell_book = $spell_book . ll_basic_magic_spells($level, 6, $class, $max_spells);} }
		if ($mage[6] > 0){$skills = $skills . " Lvl7&nbsp;[" . $mage[6] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spell_book = $spell_book . ll_basic_magic_spells($level, 7, $class, $max_spells);} }
		if ($mage[7] > 0){$skills = $skills . " Lvl8&nbsp;[" . $mage[7] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spell_book = $spell_book . ll_basic_magic_spells($level, 8, $class, $max_spells);} }
		if ($mage[8] > 0){$skills = $skills . " Lvl9&nbsp;[" . $mage[8] . "]&nbsp;&nbsp;&nbsp; "; if ($class != "Cleric"){$spell_book = $spell_book . ll_basic_magic_spells($level, 9, $class, $max_spells);} }

		if ($class != "Cleric"){$spell_book = substr($spell_book, 0, -1);} // TRIM THE SPELL BOOK LIST

		if ($level > 8 && $class == "Magic-User"){$skills = $skills . "&nbsp;&nbsp;&nbsp; Can&nbsp;Create&nbsp;Spells&nbsp;&amp;&nbsp;Magic&nbsp;Items";}
	}
	if ($class == "Cleric")
	{
		if ($level == 1){$turning = "7|9|11|0|0|0|0|0|0|0";}
		else if ($level == 2){$turning = "5|7|9|11|0|0|0|0|0|0";}
		else if ($level == 3){$turning = "3|5|7|9|11|0|0|0|0|0";}
		else if ($level == 4){$turning = "T|3|5|7|9|11|0|0|0|0";}
		else if ($level == 5){$turning = "T|T|3|5|7|9|11|0|0|0";}
		else if ($level == 6){$turning = "D|T|T|3|5|7|9|11|0|0";}
		else if ($level == 7){$turning = "D|D|T|T|3|5|7|9|11|0";}
		else if ($level == 8){$turning = "D|D|D|T|T|3|5|7|9|11";}
		else if ($level == 9){$turning = "D|D|D|D|T|T|3|5|7|9";}
		else if ($level == 10){$turning = "D|D|D|D|D|T|T|3|5|7";}
		else if ($level == 11){$turning = "D|D|D|D|D|D|T|T|3|5";}
		else if ($level == 12){$turning = "D|D|D|D|D|D|D|T|T|3";}
		else if ($level == 13){$turning = "D|D|D|D|D|D|D|D|T|T";}
		else {$turning = "D|D|D|D|D|D|D|D|D|T";}
		$priest = explode("|", $turning);

			$i = 0;
			$skills = $skills . "<br>Turn&nbsp;Undead:&nbsp;";

				while ($turn_table != 1) :

					$dead = "HD" . ($i+1);
					if ($i > 8){$dead = "Infernal";}

					if (($priest[$i] == "") || ($priest[$i] == "0") || ($i > 13)){ $turn_table = 1; }
					else { $skills = $skills . " " . $dead . "&nbsp;[" . $priest[$i] . "]&nbsp;&nbsp;&nbsp; ";}

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
	if ($class == "Fighter")
	{
		if ($level > 14){$skills = "Two Attacks Per Round";}
		if ($level > 19){$skills = "Three Attacks Per Round";}
	}
	if ($class == "Halfling")
	{
		$skills = "90% Chance to Hide in Bushes or Other Outdoor Cover&nbsp;&nbsp;&nbsp; 1-2&nbsp;(on&nbsp;1d6) to Hide in Shadows or Cover while Underground&nbsp;&nbsp;&nbsp; +1 to Initiative when Alone or with Other Halflings&nbsp;&nbsp;&nbsp; +1 to Missile Attacks&nbsp;&nbsp;&nbsp; -2 Armor Class when Attacked by Creatures Greater than Human Size";
	}
	if ($steal != "")
	{
		$thief = explode("|", $steal);

		$thief_ability_1 = $thief[0] + $thief_mod; if ($thief_ability_1 < 0){$thief_ability_1 = 1;}
		$thief_ability_2 = $thief[1] + $thief_mod; if ($thief_ability_2 < 0){$thief_ability_2 = 1;}
		$thief_ability_3 = $thief[2] + $thief_mod; if ($thief_ability_3 < 0){$thief_ability_3 = 1;}
		$thief_ability_4 = $thief[3] + $thief_mod; if ($thief_ability_4 < 0){$thief_ability_4 = 1;}
		$thief_ability_5 = $thief[4] + $thief_mod; if ($thief_ability_5 < 0){$thief_ability_5 = 1;}
		$thief_ability_6 = $thief[5] + $thief_mod; if ($thief_ability_6 < 0){$thief_ability_6 = 1;}

		$skills = "Pick&nbsp;Locks:&nbsp;" . $thief_ability_1 . "%&nbsp;&nbsp;&nbsp; Find&nbsp;&amp;&nbsp;Remove&nbsp;Traps:&nbsp;" . $thief_ability_2 . "%&nbsp;&nbsp;&nbsp; Pick&nbsp;Pockets:&nbsp;" . $thief_ability_3 . "%&nbsp;&nbsp;&nbsp; Move&nbsp;Silently:&nbsp;" . $thief_ability_4 . "%&nbsp;&nbsp;&nbsp; Climb&nbsp;Walls:&nbsp;" . $thief_ability_5 . "%&nbsp;&nbsp;&nbsp; Hide&nbsp;in&nbsp;Shadows:&nbsp;" . $thief_ability_6 . "%&nbsp;&nbsp;&nbsp; Hear&nbsp;Noise:&nbsp;" . $thief[6] . "&nbsp;&nbsp;&nbsp; Back&nbsp;Stab:&nbsp;+4&nbsp;Attack,&nbsp;x2&nbsp;Damage";

		if ($level > 3){$skills = $skills . "&nbsp;&nbsp;&nbsp; Read&nbsp;Languages:&nbsp;80%";}
		if ($level > 9){$skills = $skills . "&nbsp;&nbsp;&nbsp; Use&nbsp;Scrolls:&nbsp;90%";}
	}

	return array($spell_book, $skills, $xp1, $xp2, $max_spell_level);
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function ll_basic_name($class, $gender)
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

function ll_basic_pocket_change($level,$format)
{
	$value = mt_rand(0,10) + ($level * 10);
	$game = "Labyrinth Lord";
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

function ll_basic_magic_items($level, $class)
{
	while ( $level > 2 ) :
		if (mt_rand(1,100) > 90){ $item = $item . "<i>" . str_replace(" ", "&nbsp;", strtolower(makeRPGmagic("Labyrinth Lord",mt_rand(1,4)))) . "</i>" . ",&nbsp;&nbsp;&nbsp;&nbsp; ";}
		$level = $level - 1;
	endwhile;

	$item = substr($item, 0, -26);

	return $item;
}

///////////////////////////////////////////////////////////////////////////////////////////////////

function ll_basic_magic_spells($level, $splvl, $class, $max_spells)
{
	$spell_array = array();
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
				case 1: $magic_spell = "Arcane Lock"; break;
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
				case 1: $magic_spell = "Arcane Eye"; break;
				case 2: $magic_spell = "Charm Monster"; break;
				case 3: $magic_spell = "Confusion"; break;
				case 4: $magic_spell = "Dimension Door"; break;
				case 5: $magic_spell = "Hallucinatory Terrain"; break;
				case 6: $magic_spell = "Massmorph"; break;
				case 7: $magic_spell = "Plant Growth"; break;
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
				case 4: $magic_spell = "Contact Other Plane"; break;
				case 5: $magic_spell = "Feeblemind"; break;
				case 6: $magic_spell = "Hold Monster"; break;
				case 7: $magic_spell = "Magic Jar"; break;
				case 8: $magic_spell = "Passwall"; break;
				case 9: $magic_spell = "Telekinesis"; break;
				case 10: $magic_spell = "Teleport"; break;
				case 11: $magic_spell = "Transmute Rock to Mud"; break;
				case 12: $magic_spell = "Wall of Stone"; break;
			}
		}
		else if ($splvl == 6)
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
				case 10: $magic_spell = "Project Image"; break;
				case 11: $magic_spell = "Reincarnation"; break;
				case 12: $magic_spell = "Stone to Flesh"; break;
			}
		}
		else if ($splvl == 7)
		{
			switch (mt_rand(1,12))
			{
				case 1: $magic_spell = "Grasping Hand"; break;
				case 2: $magic_spell = "Delayed Blast Fireball"; break;
				case 3: $magic_spell = "Instant Summons"; break;
				case 4: $magic_spell = "Duo-Dimension"; break;
				case 5: $magic_spell = "Limited Wish"; break;
				case 6: $magic_spell = "Mass Invisibility"; break;
				case 7: $magic_spell = "Magic Sword"; break;
				case 8: $magic_spell = "Phase Door"; break;
				case 9: $magic_spell = "Power Word Stun"; break;
				case 10: $magic_spell = "Reverse Gravity"; break;
				case 11: $magic_spell = "Simulacrum"; break;
				case 12: $magic_spell = "Statue"; break;
			}
		}
		else if ($splvl == 8)
		{
			switch (mt_rand(1,12))
			{
				case 1: $magic_spell = "Antipathy/Sympathy"; break;
				case 2: $magic_spell = "Clenched Fist"; break;
				case 3: $magic_spell = "Clone"; break;
				case 4: $magic_spell = "Glass Like Steel"; break;
				case 5: $magic_spell = "Incendiary Cloud"; break;
				case 6: $magic_spell = "Irresistible Dance"; break;
				case 7: $magic_spell = "Mass Charm"; break;
				case 8: $magic_spell = "Maze"; break;
				case 9: $magic_spell = "Mind Blank"; break;
				case 10: $magic_spell = "Polymorph Any Object"; break;
				case 11: $magic_spell = "Symbol"; break;
				case 12: $magic_spell = "Trap the Soul"; break;
			}
		}
		else
		{
			switch (mt_rand(1,9))
			{
				case 1: $magic_spell = "Crushing Hand"; break;
				case 2: $magic_spell = "Imprisonment"; break;
				case 3: $magic_spell = "Meteor Swarm"; break;
				case 4: $magic_spell = "Power Word Kill"; break;
				case 5: $magic_spell = "Prismatic Sphere"; break;
				case 6: $magic_spell = "Shape Change"; break;
				case 7: $magic_spell = "Temporal Stasis"; break;
				case 8: $magic_spell = "Time Stop"; break;
				case 9: $magic_spell = "Wish"; break;
			}
		}

		if (in_array($magic_spell, $spell_array)){} else { array_push($spell_array, $magic_spell); $spells_found = $spells_found - 1; }
			$cyc_catch = $cyc_catch + 1; if ($cyc_catch > 100){$spells_found = 0;}

	endwhile;

	$spell_count = count($spell_array);
	$s = 0;
	while ($spell_count > 0) :
		$spells_known = $spells_known . $spell_array[$s] . "_";
		$s = $s + 1;
		$spell_count = $spell_count - 1;
	endwhile;

	return $spells_known;
}



?>