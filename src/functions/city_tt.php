<?php

function TTRace($races)
{
	$my_races = array();

	$kindred = explode("_", $races);

	if ($kindred[0] == 1){ array_push($my_races, "human"); $c=$c+1;}
	if ($kindred[1] == 1){ array_push($my_races, "brownie"); $c=$c+1;}
	if ($kindred[2] == 1){ array_push($my_races, "centaur"); $c=$c+1;}
	if ($kindred[3] == 1){ array_push($my_races, "cyclops"); $c=$c+1;}
	if ($kindred[4] == 1){ array_push($my_races, "daklafar"); $c=$c+1;}
	if ($kindred[5] == 1){ array_push($my_races, "dwarf"); $c=$c+1;}
	if ($kindred[6] == 1){ array_push($my_races, "dwurman"); $c=$c+1;}
	if ($kindred[7] == 1){ array_push($my_races, "elf"); $c=$c+1;}
	if ($kindred[8] == 1){ array_push($my_races, "fairy"); $c=$c+1;}
	if ($kindred[9] == 1){ array_push($my_races, "falcoran"); $c=$c+1;}
	if ($kindred[10] == 1){ array_push($my_races, "fruglum"); $c=$c+1;}
	if ($kindred[11] == 1){ array_push($my_races, "gnome"); $c=$c+1;}
	if ($kindred[12] == 1){ array_push($my_races, "goblin"); $c=$c+1;}
	if ($kindred[13] == 1){ array_push($my_races, "gremlin"); $c=$c+1;}
	if ($kindred[14] == 1){ array_push($my_races, "greyling"); $c=$c+1;}
	if ($kindred[15] == 1){ array_push($my_races, "hobgoblin"); $c=$c+1;}
	if ($kindred[16] == 1){ array_push($my_races, "hobling"); $c=$c+1;}
	if ($kindred[17] == 1){ array_push($my_races, "imp"); $c=$c+1;}
	if ($kindred[18] == 1){ array_push($my_races, "kobold"); $c=$c+1;}
	if ($kindred[19] == 1){ array_push($my_races, "leprechaun"); $c=$c+1;}
	if ($kindred[20] == 1){ array_push($my_races, "mantaran"); $c=$c+1;}
	if ($kindred[21] == 1){ array_push($my_races, "minotaur"); $c=$c+1;}
	if ($kindred[22] == 1){ array_push($my_races, "neptar"); $c=$c+1;}
	if ($kindred[23] == 1){ array_push($my_races, "ogre"); $c=$c+1;}
	if ($kindred[24] == 1){ array_push($my_races, "orke"); $c=$c+1;}
	if ($kindred[25] == 1){ array_push($my_races, "pixie"); $c=$c+1;}
	if ($kindred[26] == 1){ array_push($my_races, "rattanu"); $c=$c+1;}
	if ($kindred[27] == 1){ array_push($my_races, "satyr"); $c=$c+1;}
	if ($kindred[28] == 1){ array_push($my_races, "slitheran"); $c=$c+1;}
	if ($kindred[29] == 1){ array_push($my_races, "sprite"); $c=$c+1;}
	if ($kindred[30] == 1){ array_push($my_races, "suvart"); $c=$c+1;}
	if ($kindred[31] == 1){ array_push($my_races, "troll"); $c=$c+1;}
	if ($kindred[32] == 1){ array_push($my_races, "sauriman"); $c=$c+1;}
	if ($kindred[33] == 1){ array_push($my_races, "tigran"); $c=$c+1;}
	if ($kindred[34] == 1){ array_push($my_races, "wulfan"); $c=$c+1;}

	$c = $c - 1;
	$race = $my_races[mt_rand(0,$c)];

	return $race;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function TTStats($race,$age,$job)
{
	$my_races = array();

	$kindred = explode("_", $races);

	if ($race == "brownie"){$str = 0.33; $con = 0.5; $dex = 2; $int = 1; $lck = 1.5; $chr = 1; $wiz = 0.75; $hgt = 0.25; $wgt = 0.25;}
	else if ($race == "centaur"){$str = 1; $con = 1.5; $dex = 2; $int = 0.75; $lck = 1; $chr = 0.5; $wiz = 0.5; $hgt = 1.5; $wgt = 1.5;}
	else if ($race == "cyclops"){$str = 2.5; $con = 2.5; $dex = 0.5; $int = 0.5; $lck = 0.75; $chr = 0.25; $wiz = 0.5; $hgt = 1.5; $wgt = 2;}
	else if ($race == "daklafar"){$str = 1; $con = 0.67; $dex = 1; $int = 1.5; $lck = 1; $chr = 0.5; $wiz = 1; $hgt = 1; $wgt = 0.67;}
	else if ($race == "dwarf"){$str = 2; $con = 2; $dex = 0.75; $int = 1; $lck = 0.67; $chr = 1; $wiz = 0.75; $hgt = 0.65; $wgt = 1;}
	else if ($race == "dwurman"){$str = 2; $con = 2; $dex = 1; $int = 1; $lck = 0.67; $chr = 0.25; $wiz = 0.75; $hgt = 0.65; $wgt = 1;}
	else if ($race == "elf"){$str = 1; $con = 0.67; $dex = 2; $int = 1; $lck = 1.5; $chr = 2; $wiz = 1; $hgt = 1; $wgt = 0.67;}
	else if ($race == "fairy"){$str = 0.25; $con = 0.25; $dex = 2; $int = 1; $lck = 2; $chr = 1; $wiz = 2; $hgt = 0.165; $wgt = 0.1;}
	else if ($race == "falcoran"){$str = 1.5; $con = 1; $dex = 1.5; $int = 0.75; $lck = 1; $chr = 1; $wiz = 0.75; $hgt = 1; $wgt = 1.25;}
	else if ($race == "fruglum"){$str = 1.5; $con = 1; $dex = 1.5; $int = 0.75; $lck = 1.25; $chr = 0.25; $wiz = 0.75; $hgt = 0.8; $wgt = 0.8;}
	else if ($race == "gnome"){$str = 0.75; $con = 0.75; $dex = 1.5; $int = 1.5; $lck = 1; $chr = 1; $wiz = 1.5; $hgt = 0.5; $wgt = 0.75;}
	else if ($race == "goblin"){$str = 0.75; $con = 0.75; $dex = 1.5; $int = 1; $lck = 1; $chr = 0.5; $wiz = 1; $hgt = 0.65; $wgt = 0.5;}
	else if ($race == "gremlin"){$str = 0.25; $con = 0.33; $dex = 2; $int = 1; $lck = 2; $chr = 1; $wiz = 1; $hgt = 0.165; $wgt = 0.1;}
	else if ($race == "greyling"){$str = 0.33; $con = 0.5; $dex = 1.5; $int = 1.5; $lck = 0.75; $chr = 0.5; $wiz = 1.5; $hgt = 0.25; $wgt = 0.25;}
	else if ($race == "hobgoblin"){$str = 1.33; $con = 1.33; $dex = 1; $int = 0.75; $lck = 0.5; $chr = 0.75; $wiz = 1; $hgt = 1; $wgt = 1.5;}
	else if ($race == "hobling"){$str = 0.5; $con = 1.25; $dex = 1.25; $int = 1; $lck = 1.5; $chr = 1; $wiz = 0.75; $hgt = 0.5; $wgt = 0.5;}
	else if ($race == "imp"){$str = 0.5; $con = 0.5; $dex = 1; $int = 1.5; $lck = 1; $chr = 0.25; $wiz = 2; $hgt = 0.35; $wgt = 0.35;}
	else if ($race == "kobold"){$str = 0.5; $con = 0.5; $dex = 1.5; $int = 1; $lck = 2; $chr = 0.75; $wiz = 1; $hgt = 0.5; $wgt = 0.5;}
	else if ($race == "leprechaun"){$str = 0.5; $con = 0.5; $dex = 1.5; $int = 1.5; $lck = 1.5; $chr = 2; $wiz = 1; $hgt = 0.35; $wgt = 0.25;}
	else if ($race == "mantaran"){$str = 2; $con = 2; $dex = 1; $int = 1; $lck = 0.5; $chr = 0.25; $wiz = 0.5; $hgt = 1; $wgt = 0.75;}
	else if ($race == "minotaur"){$str = 2; $con = 2; $dex = 0.75; $int = 1; $lck = 0.5; $chr = 0.5; $wiz = 0.5; $hgt = 1.25; $wgt = 1.5;}
	else if ($race == "neptar"){$str = 1; $con = 1.5; $dex = 1; $int = 1; $lck = 1; $chr = 0.5; $wiz = 1; $hgt = 1; $wgt = 1;}
	else if ($race == "ogre"){$str = 2; $con = 2; $dex = 1; $int = 0.75; $lck = 0.75; $chr = 0.5; $wiz = 0.75; $hgt = 1.35; $wgt = 1.75;}
	else if ($race == "orke"){$str = 1.25; $con = 1.25; $dex = 1; $int = 0.75; $lck = 0.75; $chr = 0.25; $wiz = 0.5; $hgt = 1; $wgt = 1.25;}
	else if ($race == "pixie"){$str = 0.5; $con = 0.75; $dex = 1.25; $int = 1.25; $lck = 1.25; $chr = 1; $wiz = 1; $hgt = 0.4; $wgt = 0.25;}
	else if ($race == "rattanu"){$str = 0.5; $con = 0.75; $dex = 2; $int = 0.75; $lck = 2; $chr = 0.5; $wiz = 0.75; $hgt = 0.8; $wgt = 0.8;}
	else if ($race == "satyr"){$str = 1; $con = 1; $dex = 1.5; $int = 1; $lck = 1; $chr = 2; $wiz = 1; $hgt = 1; $wgt = 1;}
	else if ($race == "sauriman"){$str = 1.33; $con = 1.33; $dex = 1; $int = 0.75; $lck = 0.5; $chr = 0.75; $wiz = 1; $hgt = 1.25; $wgt = 1.5;}
	else if ($race == "slitheran"){$str = 1; $con = 1; $dex = 1.5; $int = 1.5; $lck = 0.5; $chr = 0.33; $wiz = 1; $hgt = 1; $wgt = 1.25;}
	else if ($race == "sprite"){$str = 0.5; $con = 0.75; $dex = 1.25; $int = 1.25; $lck = 1.25; $chr = 1; $wiz = 1; $hgt = 0.35; $wgt = 0.25;}
	else if ($race == "suvart"){$str = 0.75; $con = 0.75; $dex = 1.5; $int = 1; $lck = 1.5; $chr = 0.25; $wiz = 1; $hgt = 0.5; $wgt = 0.75;}
	else if ($race == "troll"){$str = 2.5; $con = 2.5; $dex = 0.75; $int = 0.25; $lck = 0.5; $chr = 0.33; $wiz = 0.25; $hgt = 1.4; $wgt = 1.75;}
	else if ($race == "tigran"){$str = 1; $con = 0.67; $dex = 2; $int = 1; $lck = 1.5; $chr = 3; $wiz = 1; $hgt = 1; $wgt = 0.67;}
	else if ($race == "wulfan"){$str = 1; $con = 1.5; $dex = 1; $int = 1; $lck = 1.5; $chr = 1; $wiz = 1; $hgt = 1; $wgt = 1;}
	else {$str = 1; $con = 1; $dex = 1; $int = 1; $lck = 1; $chr = 1; $wiz = 1; $hgt = 1; $wgt = 1;}
	$c = $c - 1;
	$race = $my_races[mt_rand(0,$c)];

	$str = CEIL(mt_rand(3,18) * $str);
	$con = CEIL(mt_rand(3,18) * $con);
	$dex = CEIL(mt_rand(3,18) * $dex);
	$int = CEIL(mt_rand(3,18) * $int);
	$lck = CEIL(mt_rand(3,18) * $lck);
	$chr = CEIL(mt_rand(3,18) * $chr);
	$spd = mt_rand(3,18);
	$wiz = CEIL(mt_rand(3,18) * $wiz);

	if ($job != "citizen")
	{
		$var = 1;
		if (($job == "warrior") || ($job == "guard") || ($job == "leader_warrior"))
		{
			if ($job == "leader_warrior"){$var = 2;}
			$j_str=mt_rand(2,8) * $var;
			$j_con=mt_rand(3,10) * $var;
			$j_dex=mt_rand(2,8) * $var;
			$j_int=mt_rand(1,3) * $var;
			$j_lck=mt_rand(2,8) * $var;
			$j_chr=mt_rand(1,3) * $var;
			$j_spd=mt_rand(2,8) * $var;
			$j_wiz=mt_rand(1,5) * $var;
			switch (mt_rand(0,3))
			{
				case 0:	$j_str=mt_rand(20,50) * $var;	break;
				case 1:	$j_dex=mt_rand(20,50) * $var;	break;
				case 2:	$j_lck=mt_rand(20,50) * $var;	break;
				case 3:	$j_spd=mt_rand(20,50) * $var;	break;
			}
		}
		else if (($job == "priest") || ($job == "wizard") || ($job == "leader_wizard") || ($job == "leader_priest"))
		{
			if (($job == "leader_wizard") || ($job == "leader_priest")){$var = 2;}
			$j_str=mt_rand(1,3) * $var;
			$j_con=mt_rand(3,10) * $var;
			$j_dex=mt_rand(2,8) * $var;
			$j_int=mt_rand(2,8) * $var;
			$j_lck=mt_rand(3,6) * $var;
			$j_chr=mt_rand(2,8) * $var;
			$j_spd=mt_rand(3,6) * $var;
			$j_wiz=mt_rand(25,55) * $var;
			switch (mt_rand(0,2))
			{
				case 0:	$j_dex=mt_rand(20,50) * $var;	break;
				case 1:	$j_int=mt_rand(20,50) * $var;	break;
				case 2:	$j_chr=mt_rand(20,50) * $var;	break;
			}
			if ((($job == "leader_wizard") || ($job == "leader_priest")) && ($j_int < 84)){$j_int = mt_rand(84,100);}
			if ((($job == "leader_wizard") || ($job == "leader_priest")) && ($j_dex < 84)){$j_dex = mt_rand(84,100);}
		}
		else
		{
			if ($job == "leader_rogue"){$var = 2;}
			$j_str=mt_rand(3,10) * $var;
			$j_con=mt_rand(3,10) * $var;
			$j_dex=mt_rand(2,8) * $var;
			$j_int=mt_rand(2,8) * $var;
			$j_lck=mt_rand(2,8) * $var;
			$j_chr=mt_rand(2,10) * $var;
			$j_spd=mt_rand(3,10) * $var;
			$j_wiz=mt_rand(2,8) * $var;
			switch (mt_rand(0,3))
			{
				case 0:	$j_dex=mt_rand(20,50) * $var;	break;
				case 1:	$j_int=mt_rand(20,50) * $var;	break;
				case 2:	$j_lck=mt_rand(20,50) * $var;	break;
				case 3:	$j_wiz=mt_rand(20,50) * $var;	break;
			}
		}

		$str = CEIL($str + $j_str);
		$con = CEIL($con + $j_con);
		$dex = CEIL($dex + $j_dex);
		$int = CEIL($int + $j_int);
		$lck = CEIL($lck + $j_lck);
		$chr = CEIL($chr + $j_chr);
		$spd = CEIL($spd + $j_spd);
		$wiz = CEIL($wiz + $j_wiz);
	}

	$size = mt_rand(3,18);
	if ($size == 3){$height = 48; $weight = 75;}
	else if ($size == 4){$height = 51; $weight = 90;}
	else if ($size == 5){$height = 53; $weight = 105;}
	else if ($size == 6){$height = 56; $weight = 120;}
	else if ($size == 7){$height = 58; $weight = 135;}
	else if ($size == 8){$height = 61; $weight = 150;}
	else if ($size == 9){$height = 63; $weight = 160;}
	else if ($size == 10){$height = 66; $weight = 170;}
	else if ($size == 11){$height = 68; $weight = 180;}
	else if ($size == 12){$height = 71; $weight = 190;}
	else if ($size == 13){$height = 73; $weight = 200;}
	else if ($size == 14){$height = 76; $weight = 225;}
	else if ($size == 15){$height = 78; $weight = 250;}
	else if ($size == 16){$height = 81; $weight = 280;}
	else if ($size == 17){$height = 83; $weight = 310;}
	else {$height = 86; $weight = 350;}

	if ($age == "child"){$height = $height/2; $weight = $weight/2;}

	$hgt = CEIL($height * $hgt);
		$feet = FLOOR($hgt/12);
		$inch = $hgt - ($feet * 12);
		if (($inch > 0) && ($feet < 1)){$high = $inch . "in";}
		else if ($inch > 0){$high = $feet . "ft, " . $inch . "in";}
		else {$high = $feet . "ft";}

	$wgt = CEIL($weight * $wgt);

	return array($str,$con,$dex,$int,$lck,$chr,$wiz,$dex,$int,$lck,$spd,$wiz,$high,$wgt);
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function TTCitizen($race,$age,$sex,$job,$game)
{
	//////////////////////////////////////////////////////////////////////////////////// AGE
	$ages = array('young', 'young', 'young', 'mature', 'mature', 'mature', 'mature', 'middle-aged', 'old');
		if ($age != "child"){$age = $ages[mt_rand(0,8)];}

	//////////////////////////////////////////////////////////////////////////////////// INTELLECT
	$iq = array('Low', 'Average', 'Average', 'Average', 'Average', 'Very', 'Very', 'High');

	//////////////////////////////////////////////////////////////////////////////////// MORALITY
	$alignment = array('Good','Good','Good','Fair','Fair','Fair','Fair','Fair','Fair', 'Evil');

	//////////////////////////////////////////////////////////////////////////////////// TRAITS
	$trait1 = array('dirty', 'clean', 'unkempt', 'immaculate', 'rough', 'ragged', 'dandyish', 'foppish', 'average', 'imposing');
	$trait2 = array('optimistic', 'pessimistic', 'hedonistic', 'altruistic', 'helpful and kindly', 'careless', 'capricious and mischievous', 'attentive', 'curious and inquisitive', 'moody', 'trusting', 'suspicious and cautious', 'precise and exacting', 'perceptive', 'opinionated', 'violent and warlike', 'studious', 'foul and barbaric', 'cruel and callous', 'a prankster', 'servile and obsequious', 'fanatical and obsessive', 'malevolent', 'loquacious');
	$trait4 = array('cheerful', 'morose', 'compassionate', 'insensitive', 'humble', 'proud', 'even tempered', 'hot tempered', 'easy going', 'harsh');
	$trait5 = array('soft-hearted', 'forgiving', 'hard-hearted', 'unforgiving', 'jealous', 'vengeful', 'scrupulous', 'honorable', 'truthful', 'deceitful');
	$trait6 = array('aesthetic', 'virtuous', 'normal', 'normal', 'lusty', 'lusty', 'lustful', 'immoral', 'amoral', 'aesthetic', 'virtuous', 'normal', 'normal', 'lusty', 'lusty', 'lustful', 'immoral', 'amoral', 'perverted', 'sadistic', 'depraved');

	//////////////////////////////////////////////////////////////////////////////////// PERSONALITY
	$personality = mt_rand(1,8);
		if ($personality < 6){$trait3 = array('modest', 'egoist and arrogant', 'friendly', 'aloof', 'hostile', 'well-spoken', 'diplomatic', 'abrasive');}
		else if ($personality < 8){$trait3 = array('forceful', 'overbearing', 'friendly', 'blustering', 'antagonistic', 'rude', 'rash', 'diplomatic');}
		else {$trait3 = array('retiring', 'reserved', 'friendly', 'aloof', 'hostile', 'rude', 'courteous', 'solitary and secretive');}

	//////////////////////////////////////////////////////////////////////////////////// SEX
	if (($age == "child") && (mt_rand(1,2) == 2)){$sex = "Male";} else if ($age == "child"){$sex = "Female";}

	//////////////////////////////////////////////////////////////////////////////////// HAIR STYLE
	if (($race == "human") || ($race == "centaur") || ($race == "cyclops") || ($race == "dwarf") || ($race == "gnome") || ($race == "hobling") || ($race == "leprechaun") || ($race == "ogre"))
	{
		$haircolor = array('black', 'brown', 'red', 'auburn', 'gray', 'white', 'blonde');
		$hcolor = $haircolor[mt_rand(0,6)];
		if ($birth == "child"){$haircolor = array('black', 'brown', 'red', 'auburn', 'blonde'); $hcolor = $haircolor[mt_rand(0,4)];}
		$h_brd = 1;			$h_mst = 1;			$h_bld = 1;
	}
	else if (($race == "elf") || ($race == "brownie") || ($race == "fairy") || ($race == "pixie") || ($race == "satyr") || ($race == "sprite"))
	{
		$haircolor = array('black', 'brown', 'red', 'auburn', 'blonde');
		$hcolor = $haircolor[mt_rand(0,4)];
		$h_brd = 0;			$h_mst = 1;			$h_bld = 0;
	}
	else if (($race == "daklafar") || ($race == "suvart") || ($race == "greyling") || ($race == "dwurman"))
	{
		if ($race == "daklafar"){	 $h_brd = 0;		$h_mst = 1;			$h_bld = 0;			$hcolor = "white";}
		else if ($race == "suvart"){ $h_brd = 1;		$h_mst = 1;			$h_bld = 2;			$hcolor = "white";}
		else if ($race == "dwurman"){$h_brd = 1;		$h_mst = 1;			$h_bld = 1;			$hcolor = "white";}
		else {						 $h_brd = 0;		$h_mst = 1;			$h_bld = 0;			$haircolor = array('black', 'white', 'grey');		$hcolor = $haircolor[mt_rand(0,2)];}
	}
	else if (($race == "orke") || ($race == "goblin") || ($race == "hobgoblin") || ($race == "troll"))
	{
		$haircolor = array('black', 'white');
		$hcolor = $haircolor[mt_rand(0,1)];
		$h_brd = 1;			$h_mst = 1;			$h_bld = 1;
	}
	else
	{
		$do_not_config_hair = 1;
	}
		/////////////////////////////////////////////
		if ($sex == "Male")
		{
			$gender = "Male";
			$hisp = "He";
			$husp = "His";
			$hairy = array('bald', 'long', 'short', 'curly');
			if ((mt_rand(1,100) > 70) && ($h_brd == 1)){$beard = 1;} else if ($h_brd == 2){$beard = 1;}
			if ((mt_rand(1,100) > 70) && ($h_mst == 1)){$mustc = 1;} else if ($h_mst == 2){$mustc = 1;}
			if ((mt_rand(1,100) > 70) && ($h_bld == 1)){$bald = 1;} else if ($h_bld == 2){$bald = 1;}
			$bhair = array('thick', 'long', 'short');
			$hare = $hairy[mt_rand(0,3)];
			if ($birth == "child")
			{
				$beard=0; $mustc=0; $bald=0; $hare = $hairy[mt_rand(1,3)];
			}
		}
		else
		{
			$gender = "Female";
			$hisp = "She";
			$husp = "Her";
			$hairy = array('braided', 'long', 'short', 'curly');
			$beard=0; $mustc=0; $bald=0; $hare = $hairy[mt_rand(1,3)];
		}
			/////////////////////////////////////////////
			if ($do_not_config_hair != 1)
			{
				if ($hare == "bald"){$hair1 = $hisp . " is bald"; $hair2 = ", " . $hcolor;}
				else {$hair1 = $hisp . " has " . $hare . ", " . $hcolor . " hair";}

				if ($beard == 1){$hairr = $hair1 . " with a " . $bhair[mt_rand(0,2)] . "" . $hair2 . " beard and moustache.&nbsp; ";}
				else if (($beard != 1) && ($mustc == 1)){$hairr = $hair1 . " with a " . $bhair[mt_rand(0,2)] . "" . $hair2 . " moustache.&nbsp; ";}
				else if ($hare == "bald"){$hairr = $hair1 . " with no facial hair at all.&nbsp; ";}
				else {$hairr = $hair1 . ".&nbsp; ";}
			}

	//////////////////////////////////////////////////////////////////////////////////// BRAVERY
	$bravery = mt_rand(1,8);
	if ($bravery == 4){$brave = $hisp . " is quite foolhardy in the face of danger. ";}
	else if ($bravery == 5){$brave = $hisp . " is quite brave in the face of danger. ";}
	else if ($bravery == 6){$brave = $hisp . " is quite fearless in the face of danger. ";}
	else if ($bravery == 7){$brave = $hisp . " is quite cowardly in the face of danger. ";}
	else if ($bravery == 8){$brave = $hisp . " is quite timid in the face of danger. ";}

	//////////////////////////////////////////////////////////////////////////////////// ENERGY
	$energy = mt_rand(1,8);
	if ($energy == 4){$engy = strtolower($hisp) . " comes off as being quite slothful. ";}
	else if ($energy == 5){$engy = strtolower($hisp) . " comes off as being quite lazy. ";}
	else if ($energy == 5){$engy = strtolower($hisp) . " comes off as being quite energetic. ";}
	else if ($energy == 6){$engy = strtolower($hisp) . " comes off as being quite motivated. ";}
	else if ($energy == 7){$engy = strtolower($hisp) . " comes off as being quite driven. ";}

	//////////////////////////////////////////////////////////////////////////////////// INTERESTS
	$interests = array('none', 'none', 'none', 'religion', 'legends', 'history', 'nature', 'exotic animals', 'hunting', 'fishing', 'handicrafts', 'politics', 'wines and spirits', 'cooking', 'gambling', 'herbalism', 'collector', 'collector', 'collector', 'collector');
	$interest = $interests[mt_rand(0,19)];
	 if ($birth == "child"){$interest = "none";}
	  if ($interest != "none")
	  {
		if ($interest == "collector")
		{
			$collects = array('plants and flowers', 'knives and daggers', 'swords', 'weapons', 'shields and armor', 'books and scrolls', 'minerals and gems', 'ornaments and jewelry', 'coins and tokens', 'trophies and skins', 'porcelain, china and crystal', 'artwork');
			$desire = $hisp . " is a collector of " . $collects[mt_rand(0,11)] . ".&nbsp; ";
		}
		else
		{
			$desire = $hisp . " has a great interest in " . $interest . ".&nbsp; ";
		}
	  }

	//////////////////////////////////////////////////////////////////////////////////// NAMES

	if (( ($race == "dwarf") || ($race == "dwurman") || ($race == "gnome") || ($race == "suvart") ) && (mt_rand(1,100) > 25)){ $name = dwarfName(); }
	else if (( ($race == "hobling") || ($race == "leprechaun") || ($race == "brownie") ) && (mt_rand(1,100) > 25)){ $name = gnomeName(); }
	else if (( ($race == "daklafar") || ($race == "greyling") ) && (mt_rand(1,100) > 50)){ $name = elfName(); }
	else if (( ($race == "elf") || ($race == "fairy") || ($race == "pixie") || ($race == "sprite") ) && ($gender == "Male") && (mt_rand(1,100) > 25)){ $name = elfboyName(); }
	else if (( ($race == "elf") || ($race == "fairy") || ($race == "pixie") || ($race == "sprite") ) && ($gender == "Female") && (mt_rand(1,100) > 25)){ $name = elfgirlName(); }
	else if (( ($race == "ogre") || ($race == "orke") || ($race == "troll") || ($race == "cyclops") || ($race == "minotaur")) && (mt_rand(1,100) > 25)){ $name = orcName(); }
	else if (( ($race == "fruglum") || ($race == "goblin") || ($race == "hobgoblin") ) && (mt_rand(1,100) > 25)){ $name = goblinName(); }
	else if (( ($race == "sauriman") || ($race == "slitheran") || ($race == "kobold") || ($race == "cyclops") || ($race == "minotaur") ) && (mt_rand(1,100) > 25)){ $name = lizardmanName(); }
	else if (($race == "rattanu") && (mt_rand(1,100) > 25)){ $name = ratmanName(); }
	else if (($race == "tigran") && (mt_rand(1,100) > 25))
	{
		if ($gender == "Male"){ $name = catName(male); }
		else { $name = catName(female); }
		if (mt_rand(1,3) == 1){ $name = catName(''); }
	}
	else if (($race == "wulfan") && (mt_rand(1,100) > 25)){ $name = wolfName(''); }
	else if (( ($race == "imp") || ($race == "gremlin") ) && (mt_rand(1,100) > 25)){ $name = impName(); }
	else if (( ($race == "satyr") || ($race == "centaur") ) && (mt_rand(1,100) > 25)){ $name = authorName(); }
	else if (($race == "mantaran") && (mt_rand(1,100) > 25)){ $name = speciesName() . "`" . speciesName(); }
	else if (($race == "neptar") && (mt_rand(1,100) > 25)){ $name = mutantName(); }
	else if (($race == "falcoran") && (mt_rand(1,100) > 25)){ $name = genericName(); }
	else if (($gender == "Male") && ($race == "human") && (mt_rand(1,100) > 25)){ $name = humanMaleName(); }
	else if (($gender == "Female") && ($race == "human") && (mt_rand(1,100) > 25)){ $name = humanFemaleName(); }
	else
	{
		if ($gender == "Male"){$dcn = mt_rand(0,1);} else {$dcn = mt_rand(1,2);}
		switch ($dcn)
		{
			case 0:	$name = MaleName();			break;
			case 1: $name = genericName();		break;
			case 2:	$name = FemaleName();		break;
		}
	}

	$names = $name;

	//////////////////////////////////////////////////////////////////////////////////// EQUIPMENT
		$hcolor = array('blue-green', 'black', 'blue', 'gray', 'dark-gray', 'light-gray', 'green', 'light-gray', 'red', 'brown', 'orange', 'yellowish-green', 'tan', 'light-blue', 'yellow', 'purple', 'light-purple', 'dark-purple', 'light-green', 'forest-green', 'white', 'dark-green', 'dark-red', 'light-red', 'light-brown', 'dark-brown');
		$bcolor = array('black', 'dark-brown', 'gray', 'dark-green', 'dark-red', 'brown', 'tan');
		$scolor = array('gold', 'silver', 'bronze', 'copper', 'platinum', 'metal', 'iron');

			$packs = array('small cloth bag', 'small leather bag', 'belt pouch', 'concealed pouch', 'cloth sack', 'leather sack', 'small wooden box', 'small metal box');
			$things = array('thistle burrs_10_ea', 'mouse', 'rat', 'rock_8_ea', 'twine_20_ft', 'quill', 'clay flask of alcohol', 'silver arrowhead', 'wooden hair brush', 'tinderbox', 'acorns_4_ea', 'cork', 'wooden comb', 'wooden figurine', 'small pouch', 'vial of insect repellent', 'list of alchemy reagents', 'small wooden flute', 'dead bug', 'pair of bone dice', 'set of wooden teeth', 'deed to a ship', 'feather', 'deck of playing cards', 'invitation to a royal event', 'canvas bag', 'green snake (6 in long)', 'glass magnifying lens', 'small glass bottle', 'mousetrap', 'iron keys_4_ea', 'cheap cigars_4_ea', 'copper wire_6_ft', 'orange peels', 'cheese', 'small dictionary', 'small portrait of a woman', 'small portrait of a man', 'shelled nuts_18_ea', 'bag of beans_100_ea', 'dart', 'wooden pipe', 'scarf', 'box of matches_100_ea', 'silver animal figurine', 'flask of water', 'yarn_60_ft', 'handful of seeds_10_ea', 'glass inkpot', 'ball of string', 'sheet of parchment', 'note regarding a secret meeting', 'ransom note', 'compass', 'love letter', 'wooden case containing paints', 'cabbage', 'small mirror', 'rodent skull', 'soiled rag', 'vial of perfume', 'fake treasure map', 'jar of glue', 'message about a rebellion', 'onion', 'lump of coal', 'thimble', 'wooden snuff box_4_pinch', 'one-quarter pound sack of oats', 'brass knuckles', 'turnip', 'wooden spoon', 'flyer of a wanted criminal', 'stiff parchment business card', 'map to a nearby dungeon', 'smoke powder', 'rusty iron nails_12_ea', 'vial of mild poison', 'bent copper piece', 'small leather book (black, 50 pg)', 'rubber ball', 'leather strap', 'list of corrupt guards', 'promissory note_1000_gp', 'small toad', 'letter from_person', 'sealed letter_person', 'rawhide necklace', 'ornate iron key', 'cowhide wallet', 'long pin', 'book containing prayers', 'tattered map of the area', 'jerky_4_ea', 'small slip of parchment', 'small knife', 'wooden brooch', 'candle', 'pouch of sand', 'glass eye', 'wooden wrist sundial', 'chess piece', 'poison antidote', 'silk handkerchief', 'lint', 'cloth napkin', 'stone arrowhead', 'small silver holy symbol', 'small blank cards_24_ea', 'egg', 'clump of dirt', 'brass tacks_16_ea', 'key to a crypt', 'pair of cloth gloves', 'wooden stake', 'bread', 'map for castle secret entrance', 'sand', 'wooden vial of spice', 'deck of tarot cards', 'silver spoon', 'flower', 'colored glass spheres_8_ea - 1 inch in diameter', 'treasure map', 'potato', 'cloth bag of crushed herbs', 'carrot', 'flask of cheap wine', 'personal diary', 'small lead figurine', 'radish', 'apple', 'lock of hair', 'rabbit foot', 'handkerchief');
			$junky = array('apricot', 'bag of berries', 'bag of nuts', 'bar of soap', 'beeswax', 'belladonna_8_oz', 'bone scrollcase', 'bottle of holy water', 'candle', 'carrot', 'chalk', 'cherries_8_ea', 'evil holy symbol', 'clay cup', 'climbing peg', 'cloth dye', 'corncob pipe', 'crystal vial', 'dice', 'empty spell book', 'feverfew_8_oz', 'fife', 'fish hook', 'flint & steel', 'garlic', 'glass flask', 'glass tube', 'glue_8_oz', 'hair dye', 'hairbrush', 'hand bell', 'hollyhock_8_oz', 'incense stick', 'ink_8_oz', 'lantern', 'leather flask', 'leather scrollcase', 'lemon', 'lettuce', 'loaded dice', 'manacles', 'metal file', 'orange', 'padlock with key', 'scroll with ancient text', 'spell scroll', 'fake gold coin', 'paint brush', 'peach', 'perfume_8_oz', 'pewter cup', 'pewter holy symbol', 'pipe tobacco', 'pliers', 'prayer beads', 'quill', 'rue_8_oz', 'sage_8_oz', 'scissors', 'sewing needle', 'sheet of parchment', 'pouch of colored sand', 'sheet of vellum', 'silver cup', 'silver holy symbol', 'sling with_20_bullets', 'small bell', 'small leather bag', 'small mirror', 'spiderwort_8_oz', 'copper necklace_10_cp', 'silver necklace_10_sp', 'gold necklace_10_gp', 'platinum necklace_80_gp', 'copper ring_10_cp', 'silver ring_10_sp', 'gold ring_10_gp', 'platinum ring_50_gp', 'strawberries_5_ea', 'tongs', 'torch', 'turnip', 'tweezers', 'waterskin', 'whetstone', 'whistle', 'wolfsbane_8_oz', 'wooden cup', 'wooden holy symbol', 'yarrow_8_oz');
			$thingz = count($things)-1;
			$junks = count($junky)-1;

			$royalty = array('king', 'queen', 'prince', 'princess', 'baron', 'mayor', 'govenor', 'priest', 'noble', 'emperor', 'duke', 'duchess', 'wizard', 'knight', 'necromancer', 'wanted criminal');

			if (mt_rand(1,100) > 0)
			{
				$thing1 = $things[mt_rand(0,$thingz)]; $trinket = 1;
				$thing1 = explode("_", $thing1);
				if ($thing1[1] == "person"){$thing1 = ", " . $thing1[0] . " a " . $royalty[mt_rand(0,15)]; }
				else if ($thing1[1] > 0){$thing1 = ", " . $thing1[0] . " (" . mt_rand(1,$thing1[1]) . " " . $thing1[2] . ")";}
				else {$thing1 = ", " . $thing1[0];}
			}
			if (mt_rand(1,100) > 40)
			{
				$thing2 = $things[mt_rand(0,$thingz)]; $trinket = 1;
				$thing2 = explode("_", $thing2);
				if ($thing2[1] == "person"){$thing2 = ", " . $thing2[0] . " from a " . $royalty[mt_rand(0,15)]; }
				else if ($thing2[1] > 0){$thing2 = ", " . $thing2[0] . " (" . mt_rand(1,$thing2[1]) . " " . $thing2[2] . ")";}
				else {$thing2 = ", " . $thing2[0];}
			}
			if (mt_rand(1,100) > 30)
			{
				$thing3 = $junky[mt_rand(0,$junks)]; $trinket = 1;
				$thing3 = explode("_", $thing3);
				if ($thing3[1] > 0){$thing3 = ", " . $thing3[0] . " (" . mt_rand(1,$thing3[1]) . " " . $thing3[2] . ")";}
				else {$thing3 = ", " . $thing3[0];}
			}
			if (mt_rand(1,100) > 80)
			{
				$weapon = array('knife', 'dagger', 'stilleto', 'blackjack', 'club', 'short sword', 'darts_3_ea', 'hand axe', 'razor', 'sling_10_stones');
				$thing4 = $weapon[mt_rand(0,9)]; $trinket = 1;
				$thing4 = explode("_", $thing4);
				if ($thing4[1] > 0){$thing4 = ", " . $thing4[0] . " (" . mt_rand(2,$thing4[1]) . " " . $thing4[2] . ")";}
				else {$thing4 = ", " . $thing4[0];}
			}
			if (mt_rand(1,100) > 60)
			{
				$coins = array('cp', 'sp');
				$trinket = 1;
				$thing5 = ", " . $packs[mt_rand(0,7)] . " with " . mt_rand(2,10) . "" . $coins[mt_rand(0,1)];
				if ((mt_rand(1,100) > 70) && ($poor != 1) && ($stage != 2))
				{
					$thing5 = $thing5 . " and " . mt_rand(2,10) . "gp";
				}
			}
			if ((mt_rand(1,100) > 80) && ($poor != 1) && ($stage != 2))
			{
				$gem1 = array('alexandrite', 'amethyst', 'azurite', 'black opal', 'black star sapphire', 'blue diamond', 'blue sapphire', 'blue-white diamond', 'canary diamond', 'chalcedony', 'chrysoprase', 'coral', 'emerald', 'fiery yellow corundum', 'freshwater pearl', 'golden pearl', 'green emerald', 'hematite', 'jacinth', 'jasper', 'malachite', 'moss agate', 'onyx', 'pink diamond', 'red spinel', 'rich purple corundum', 'rose quartz', 'sardonyx quartz', 'smoky quartz', 'star ruby', 'tourmaline', 'violet garnet', 'white pearl');
				$gem2 = array('amber', 'aquamarine', 'banded agate', 'black pearl', 'bloodstone', 'blue quartz', 'blue star sapphire', 'brown diamond', 'carnelian', 'chrysoberyl', 'citrine', 'deep blue spinel', 'eye agate', 'fire opal', 'garnet', 'golden yellow topaz', 'green spinel', 'iolite', 'jade', 'lapis lazuli', 'moonstone', 'obsidian', 'peridot', 'pink pearl', 'rhodochrosite', 'rock crystal', 'sard quartz', 'silver pearl', 'star rose quartz', 'tiger eye', 'turquoise', 'white opal', 'zircon');

				$trinket = 1;
				$thing6 = ", " . $packs[mt_rand(0,7)] . " with precious stones (" . $gem1[mt_rand(0,32)] . " - " . mt_rand(1,5) . "ea worth " . mt_rand(100,500) . "gp)";
				if (mt_rand(1,100) > 80)
				{
					$coinz = array('gp', 'sp');
					$thing6 = $thing6 . " and (" . $gem2[mt_rand(0,32)] . " - " . mt_rand(1,5) . "ea worth " . mt_rand(100,500) . "gp)";
				}
			}

			if (($race != "minotaur") && ($race != "slitheran") && ($race != "satyr") && ($race != "centaur"))
			{
				$feet = array('boots', 'fur boots', 'sandals', 'thigh boots', 'shoes');
					$w_shoe = ", " . $bcolor[mt_rand(0,6)] . " " . $feet[mt_rand(0,4)];
			}

			if (($race != "slitheran") && ($race != "satyr") && ($race != "centaur"))
			{
				$pants = array('kilt', 'long pants', 'short pants', 'long pants', 'short pants', 'long pants', 'short pants', 'skirt');
					if ($sex == "Female"){$pantc = 7;} else {$pantc = 6;}
					$w_legs = ", " . $hcolor[mt_rand(0,25)] . " " . $pants[mt_rand(0,$pantc)];
			}

			$head = array('feathered hat', 'floppy hat', 'skullcap', 'tricorne hat', 'wide-brim hat', 'cap', 'bandana', 'bonnet');
				if ($sex == "Female"){$hatc = 7;} else {$hatc = 6;}
				if (mt_rand(1,100) > 60){$w_head = ", " . $hcolor[mt_rand(0,25)] . " " . $head[mt_rand(0,$hatc)];} else {$w_head = "";}

			$robe = array('robe', 'cloak');
				if (mt_rand(1,100) > 80){$w_robe = ", " . $hcolor[mt_rand(0,25)] . " " . $robe[mt_rand(0,1)];} else {$w_robe = "";}

			if (mt_rand(1,100) > 60)
			{
				$w_belt = ", a " . $bcolor[mt_rand(0,6)] . " belt";
				if (mt_rand(1,100) > 60){$w_belt = $w_belt . " with a " . $scolor[mt_rand(0,6)] . " buckle";}

			} else {$w_belt = "";}

			$shirt = array('fancy shirt', 'formal shirt', 'doublet', 'tunic', 'shirt', 'plain dress', 'gilded dress', 'fancy dress');
				if ($sex == "Female"){$shirtc = 7;} else {$shirtc = 4;}
				$dresses = mt_rand(0,$shirtc); if ($dresses > 4){$w_legs = "";}
				$w_vest = ", and a " . $hcolor[mt_rand(0,25)] . " " . $shirt[$dresses];

			$stuff = $w_shoe . "" . $w_belt . "" . $w_legs . "" . $w_head . "" . $w_robe . "" . $w_vest; $stuff = substr($stuff, 2); $stuff = "<b>DRESSED&nbsp;IN:</b> " . $stuff . ".";

			if ($trinket > 0)
			{
				$things = $thing1 . "" . $thing2 . "" . $thing3 . "" . $thing4 . "" . $thing5 . "" . $thing6;
				$things = substr($things, 2);
				$stuff = $stuff . " <b>POSSESSIONS:</b> " . $things . ".";
			}


	//////////////////////////////////////////////////////////////////////////////////// ALL DONE

	$my_stats = TTStats($race,$age,$job);

	if ($game == "Tunnels & Trolls 5th Edition"){$stats = "[<b>STR:</b> " . $my_stats[0] . "; <b>CON:</b> " . $my_stats[1] . "; <b>DEX:</b> " . $my_stats[2] . "; <b>INT:</b> " . $my_stats[3] . "; <b>LCK:</b> " . $my_stats[4] . "; <b>CHR:</b> " . $my_stats[5] . "; <b>HGT:</b> " . $my_stats[12] . "; <b>WGT:</b> " . $my_stats[13] . " lbs]";}
	else {$stats = "[<b>STR:</b> " . $my_stats[0] . "; <b>CON:</b> " . $my_stats[1] . "; <b>DEX:</b> " . $my_stats[2] . "; <b>SPD:</b> " . $my_stats[10] . "; <b>INT:</b> " . $my_stats[3] . "; <b>WIZ:</b> " . $my_stats[6] . "; <b>LCK:</b> " . $my_stats[4] . "; <b>CHR:</b> " . $my_stats[5] . "; <b>HGT:</b> " . $my_stats[12] . "; <b>WGT:</b> " . $my_stats[13] . " lbs]";}

	$finally = "<b>" . ucfirst($name) . ":</b>&nbsp;" . $stats . " " . $hisp . " is a " . $age . " " . strtolower($sex) . " " . $race . " that is " . $trait1[mt_rand(0,9)] . " in appearance. " . $hairr . " " . $hisp . " is generally " . $trait2[mt_rand(0,23)] . ", but also " . $trait3[mt_rand(0,7)] . ". " . $husp . " disposition is " . $trait4[mt_rand(0,9)] . " but " . strtolower($hisp) . " is " . $trait5[mt_rand(0,9)] . " by nature. " . $brave . $engy . $hisp . " can be perceived as " . $trait6[mt_rand(0,20)] . " when it comes to " . strtolower($husp) . " morality. " . $desire . $stuff;

	return array($gender,$race,$finally,ucfirst($name),$stats);
}




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





function TTBusiness($type,$game,$stock,$jack,$oldway,$showcase1,$showcase2,$water,$columns,$shelf)
{
  $hut2 = array('Badger', 'Basilisk', 'Bear', 'Boar', 'Bufallo', 'Bugbear', 'Bull', 'Centaur', 'Chimera', 'Cloud Giant', 'Crocodile', 'Cyclops', 'Demon', 'Devil', 'Dog', 'Dragon', 'Drake', 'Dryad', 'Dwarf', 
		'Elephant', 'Elf', 'Ettin', 'Fire Giant', 'Fish', 'Frog', 'Frost Giant', 'Gargoyle', 'Genie', 'Gnoll', 'Gnome', 'Goblin', 'Gorgon', 'Griffin', 'Hag', 'Hobbit', 'Harpy', 'Hell Hound', 'Hill Giant', 'Hippogriff', 
		'Hippopotamus', 'Hobling', 'Hobgoblin', 'Horse', 'Hydra', 'Imp', 'Jackal', 'Kobold', 'Kraken', 'Leprechaun', 'Lion', 'Lizard', 'Manticore', 'Golem', 'Minotaur', 'Mule', 'Naga', 'Nixie', 'Nymph', 'Fruglum', 
		'Ogre', 'Orke', 'Witch', 'Pegasus', 'Phoenix', 'Pixie', 'Giant Worm', 'Greyling', 'Banshee', 'Scorpion', 'Serpent', 'Reaper', 'Snake', 'Sphinx', 'Spider', 'Sprite', 'Stone Giant', 'Storm Giant', 
		'Succubus', 'Tiger', 'Titan', 'Toad', 'Morlock', 'Triton', 'Troglodite', 'Troll', 'Turtle', 'Unicorn', 'Walrus', 'Weasel', 'Werewolf', 'Whale', 'Wisp', 'Wolf', 'Wolverine', 'Wyrm', 'Wyvern', 'Zorn', 'Yeti', 'Lich', 'Ghost', 'Demon');
  $hut2 = $hut2[mt_rand(0,100)];

   if (mt_rand(1,100) > 70)
   {
	$hut2 = array('Adventurer', 'Axe', 'Bandit', 'Barbarian', 'Bard', 'Baron', 'Berserker', 'Claw', 'Club', 'Coin', 'Conjurer', 'Dagger', 'Dancer', 'Druid', 'Dutchess', 'Eye', 'Fighter', 'Hammer', 'Helm', 
		'Hermit', 'Hunter', 'Idol', 'Jester', 'King', 'Knife', 'Knight', 'Mace', 'Mage', 'Magician', 'Monk', 'Nail', 'Pirate', 'Priest', 'Prince', 'Princess', 'Prophet', 'Queen', 'Ranger', 'Scout', 'Shield', 
		'Singer', 'Sorcerer', 'Sword', 'Thief', 'Tracker', 'Tree', 'Warlock', 'Warrior', 'Whip', 'Witch', 'Wizard', 'Staff');
	$hut2 = $hut2[mt_rand(0,51)];
   }

  $hut3 = array('Steel', 'Wooden', 'Iron', 'Bronze', 'Silver', 'Gold', 'Copper', 'Stone', 'Platinum', 'Wild', 'Sleeping', 'Lone', 'Savage', 'Scarlett', 'Twin', 'Old', 'Dark', 'Needy', 'Wealthy', 'Common', 
		'Cursed', 'Elegant', 'Great', 'Smiling', 'Keen', 'Needy', 'Quiet', 'Jealous', 'Cheap', 'Fiery', 'Hidden', 'Mighty', 'New');
  $hut3 = $hut3[mt_rand(0,32)];

  $store = "AND store='NONE'";

if ($type == 5) // BOWYER ///////////////////////////////////////////////
{
	$hut1 = array('Bows', 'Bowyer Shoppe', 'Fletcher Shoppe', 'Bow Shoppe', 'Archery Shoppe', 'Bow Crafters', 'Archery Supplies', 'Archer Store', 'Bow & Arrow Dealer');
	$hut1 = $hut1[mt_rand(0,8)];

	if (mt_rand(1,100) > 30)
	{
		$hut2 = array('Shot', 'Arrow', 'Bolt', 'Target', 'Trueshot', 'Aim', 'Feather', 'Tipped');
		$hut2 = $hut2[mt_rand(0,7)];
	}
	$store = "AND store='Bowyer'";
}
else if ($type == 1) // TAVERN ///////////////////////////////////////////////
{
	$hut1 = array('Alehouse', 'Tavern', 'Saloon', 'Bar', 'Stein', 'Keg', 'Barrel', 'Flagon', 'Mug');
	$hut1 = $hut1[mt_rand(0,8)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Drunken', 'Leaping', 'Sleepy', 'Crazy', 'Angry', 'Dancing', 'Bloody', 'Running', 'Screaming', 'Growling', 'Mighty', 'Laughing', 'Broken', 'Wild');
		$hut3 = $hut3[mt_rand(0,13)];
	}
	$store = "AND store='Tavern'";
}
else if ($type == 2) // INN ///////////////////////////////////////////////
{
	$hut1 = array('Inn', 'Inn', 'Inn', 'Inn', 'Inn', 'Hostel', 'Lodge', 'Boarding House', 'Cabin');
	$hut1 = $hut1[mt_rand(0,8)];
	$hut1 = $hut1 . " </b><i>(" . mt_rand(2,7) . "sp per night)</i><b>";

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Weary', 'Restful', 'Sleepy', 'Cozy', 'Tired', 'Restless', 'Dreamy', 'Silent', 'Calm', 'Faint', 'Yawning', 'Dead', 'Tuckered', 'Dozing', 'Tranquil');
		$hut3 = $hut3[mt_rand(0,14)];
	}
	$store = "AND store='Inn'";
}
else if ($type == 7) // TAILOR ///////////////////////////////////////////////
{
	$hut1 = array('Tailor', 'Tailor Shoppe', 'Sewing Shoppe', 'Fine Cloth', 'Clothing Shoppe', 'Dress Shoppe', 'Dresses');
	$hut1 = $hut1[mt_rand(0,6)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Wooly', 'Knitted', 'Needled', 'Stitched', 'Hooded', 'Dressed', 'Cloaked', 'Robed');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Tailor'";
}
else if ($type == 10) // ALCHEMIST ///////////////////////////////////////////////
{
	$hut1 = array('Herbalist', 'Herb Shoppe', 'Alchemist', 'Potion Shoppe', 'Elixirs', 'Alchemy Shoppe', 'Cauldron');
	$hut1 = $hut1[mt_rand(0,6)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Brewed', 'Boiled', 'Stirred', 'Fermented', 'Concocted', 'Brewed');
		$hut3 = $hut3[mt_rand(0,5)];
	}
	$store = "AND store='Alchemist'";
}
else if ($type == 4) // BLACKSMITH ///////////////////////////////////////////////
{
	$hut1 = array('Anvil', 'Smithy', 'Forge', 'Hammer', 'Blacksmith', 'Blacksmith', 'Smithy', 'Arms & Armor', 'Weapons', 'Shields');
	$hut1 = $hut1[mt_rand(0,9)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Melted', 'Steel', 'Iron', 'Dented', 'Armored', 'Metal', 'Smelted', 'Heated');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Blacksmith'";
}
else if ($type == 8) // STABLES ///////////////////////////////////////////////
{
	$hut1 = array('Stables', 'Pets', 'Animals', 'Stables', 'Barn Yard', 'Animal Trainer', 'Stables');
	$hut1 = $hut1[mt_rand(0,6)];

	$hut2 = array('Beast', 'Bear', 'Boar', 'Horse', 'Steed', 'Rider', 'Mule', 'Pony');
	$hut2 = $hut2[mt_rand(0,7)];

	$store = "AND store='Stables'";
}
else if ($type == 9) // CARPENTER ///////////////////////////////////////////////
{
	$hut1 = array('Carpenter', 'Wood Shoppe', 'Carvings', 'Woodworking', 'Carpentry Shoppe', 'Wooden Crafts');
	$hut1 = $hut1[mt_rand(0,5)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Oak', 'Cedar', 'Pine', 'Ash', 'Maple', 'Birch', 'Mahogany', 'Spruce');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Carpenter'";
}
else if ($type == 6) // LEATHER ///////////////////////////////////////////////
{
	$hut1 = array('Leatherworking', 'Tanning Shoppe', 'Leather Market', 'Stitched Hide', 'Rawhide', 'Thick Skins');
	$hut1 = $hut1[mt_rand(0,5)];

	$store = "AND store='Leatherworker'";
}
else if ($type == 11) // BAKER ///////////////////////////////////////////////
{
	$hut1 = array('Baked Goods', 'Bakery', 'Bake Shoppe', 'Foods', 'Food Market');
	$hut1 = $hut1[mt_rand(0,4)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Delightful', 'Tasty', 'Homemade', 'Oven Fresh', 'Toasty', 'Yummy', 'Savory', 'Sweet', 'Hungry', 'Starving');
		$hut3 = $hut3[mt_rand(0,9)];
	}
	$store = "AND store='Baker'";
}
else if ($type == 3) // PROVISIONER ///////////////////////////////////////////////
{
	$hut1 = array('Pawn', 'Pawn Shoppe', 'Provisioner', 'Supplies', 'Equipment', 'Goods');
	$hut1 = $hut1[mt_rand(0,5)];

	if ((mt_rand(1,100) > 30) && ($gamma != 2))
	{
		$hut3 = array('Adventurous', 'Impish', 'Treasured', 'Royal', 'Traveling', 'Cheap', 'Golden', 'Grand');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Provisioner'";
	if ($jack == 1){$store = "AND (store='Provisioner' OR store='Leatherworker')";}
	else if ($jack == 2){$store = "AND (store='Provisioner' OR store='Leatherworker' OR store='Bowyer')";}
}
else if ($type == 12) // LIBRARY ///////////////////////////////////////////////
{
	$hut1 = array('Books', 'Writings', 'Library', 'Atheneum', 'Scrolls', 'Book Shoppe');
	$hut1 = $hut1[mt_rand(0,5)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Cryptic', 'Ancient', 'Runic', 'Mysterious', 'Wizardly', 'Thinking', 'Royal', 'Scribbled');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Library'";
}
else if ($type == 15) // CHURCH ///////////////////////////////////////////////
{
	$hut2 = array('Temple', 'Church', 'Abbey', 'Shrine', 'Sanctuary', 'Temple', 'Church', 'House');
	$hut2 = $hut2[mt_rand(0,7)];

	$hut3 = array('Holy', 'Sacred', 'Virtuous', 'Devoted', 'Devout', 'Divine', 'Faithful', 'Glorious', 'Righteous', 'Saintly', 'Sanctified');
	$hut3 = $hut3[mt_rand(0,10)];

	$hut1 = array('the Gods', 'the Creator', 'the Father', 'the Mother', 'the Almighty', 'the Lord', 'the Goddess', 'the Maker', 'Devotion', 'Praise', 'Worship');
	$hut1 = $hut1[mt_rand(0,10)];
	$hut1 = "of " . $hut1;
	$store = "AND store='Church'";
}
else if ($type == 14) // MUSIC ///////////////////////////////////////////////
{
	$hut1 = array('Music Shoppe', 'Instruments', 'Instrument Crafters', 'Drummer', 'Lute Makers', 'Stringed Instruments');
	$hut1 = $hut1[mt_rand(0,5)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Singing', 'Humming', 'Harmonic', 'Lyrical', 'Choral', 'Melodic', 'Harmonious', 'Tuneful');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Music'";
}
else if ($type == 13) // JEWELER ///////////////////////////////////////////////
{
	$hut1 = array('Jeweler', 'Gem Shoppe', 'Jewelry Shoppe', 'Fine Stones', 'Precious Gems', 'Diamonds', 'Emeralds', 'Rubies', 'Pearls');
	$hut1 = $hut1[mt_rand(0,8)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Shiny', 'Sparkly', 'Twinkling', 'Gleaming', 'Shimmering', 'Glinting', 'Rare', 'Priceless');
		$hut3 = $hut3[mt_rand(0,7)];
	}
}
else if ($type == 16) // GUARD HOUSE ///////////////////////////////////////////////
{
	$hut1 = array('Guardhouse', 'Barracks', 'Sleeping Quarters', 'Sentry Post', 'Guardhouse', 'Barracks');
	$hut1 = $hut1[mt_rand(0,5)];

	$hut3 = array('Patrolling', 'Watchful', 'Guarding', 'Defending', 'Protecting');
	$hut3 = $hut3[mt_rand(0,4)];
}
else if ($type > 16) // GUILDS /////////////////////////////////////////////////
{
	$hut1 = array('Guild', 'Guild', 'Lodge', 'League', 'Order', 'Society', 'Clan', 'Fraternity', 'Circle', 'Ring', 'Union');
	$hut1 = $hut1[mt_rand(0,10)];

	if ($type == 17){$hut3 = array('Fighters', 'Warriors', 'Champions', 'Soldiers', 'Gladiators', 'Defenders', 'Mercenaries', 'Legionnaires');}
	else if ($type == 18){$hut3 = array('Wizards', 'Mages', 'Sorcerers', 'Magicians', 'Magic-Users', 'Occultists', 'Enchanters', 'Conjurers');}
	else {$hut3 = array('Rogues', 'Bandits', 'Burglars', 'Sneaks', 'Prowlers', 'Highwaymen', 'Muggers', 'Swindlers');}

	$hut3 = $hut3[mt_rand(0,7)];

	$hut2 = array('Dark', '', 'Hidden', 'Grand', 'Glorious', 'Mysterious', 'Secret', 'Great', 'Marvelous', 'Amazing', 'Mystical', 'Legendary', 'Eternal', 'Exalted', 'Ultimate', 'Royal', 'Almighty', 'Supreme', 'Dominant', 'Fallen', 'Mighty', 'Unknown', 'Forgotten');
	$hut2 = $hut2[mt_rand(0,22)];

	$guild = "The " . $hut2 . " " . $hut1 . " of " . $hut3;
}
	/////////////////////////// FILL UP THE BUSINESSES ////////////////////////////////////////////////////////////////////////////////////
	if ($type == 13)
	{
		$inventory = mt_rand(10,40);

		$tabx = "<table border='0' cellpadding='0' cellspacing='0'><tr><td width='20'>&nbsp;</td>";
		$tabx = $tabx . "<td NOWRAP><b><font size='2'>Item</font></b></td>";
		$tabx = $tabx . "<td NOWRAP align='right'><b><font size='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cost</font></b></td>";
		if ($shelf > 0){$tabx = $tabx . "<td NOWRAP align='center'><b><font size='2'>&nbsp;&nbsp;&nbsp;In Stock&nbsp;&nbsp;&nbsp;</font></b></td>";}
		$tabx = $tabx . "<td width='20'>&nbsp;</td></tr>";

		while ($inventory > 0) :
			if (mt_rand(1,2) == 1){	$item = explode(" (", ucwords(gemCreator(mt_rand(10,100))));		$price = explode(")", $item[1]);}
			else {					$item = explode(" (", ucwords(jewelCreator(mt_rand(10,100))));		$price = explode(")", $item[1]);}

			$tabx = $tabx . "<tr><td width='20'>&nbsp;</td>";
			$tabx = $tabx . "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'><font size='2'>" . $item[0] . "</font></td>";
			$tabx = $tabx . "<td NOWRAP align='right' style='border-top-style: solid; border-top-width: 1px'><font size='2'>" . $price[0] . "</font></td>";
			if ($shelf > 0){$tabx = $tabx . "<td NOWRAP align='center' style='border-top-style: solid; border-top-width: 1px'><font size='2'>1</font></td>";}
			$tabx = $tabx . "<td width='20'>&nbsp;</td></tr>";

			$inventory = $inventory - 1;

		endwhile;

		$tabx = $tabx . "</table>";
	}
	else
	{
		include("db.php");

		if ($water > 0){} else {$no_boats = "AND qty!=2";}
		if ($oldway > 0)
		{
			$mgmd = "AND (era='' OR era='Simple')";
			if ($game == "Tunnels & Trolls Deluxe"){ $mgmd = "AND (era='' OR era='Deluxe')"; }
		}
		else
		{
			$mgmd = "AND (era='' OR era='Complex')";
			if ($game == "Tunnels & Trolls Deluxe"){ $mgmd = "AND (era='' OR era='Deluxes')"; }
		}

		$qry = "SELECT * FROM store_items WHERE game='TT' $mgmd $store $no_boats ORDER BY note1, item";
		$res = wz_query( $connection, $qry ); /* qry. */
		$num = wz_num_rows($res);
		$at_least_one_item = 0;

		$tabx = "<table border='0' cellpadding='0' cellspacing='0'><tr><td width='20'>&nbsp;</td>";
		$tabx = $tabx . "<td NOWRAP><b><font size='2'>Item</font></b></td>";
		$tabx = $tabx . "<td NOWRAP align='right'><b><font size='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cost</font></b></td>";
		if ($shelf > 0){$tabx = $tabx . "<td NOWRAP align='center'><b><font size='2'>&nbsp;&nbsp;&nbsp;In Stock&nbsp;&nbsp;&nbsp;</font></b></td>";}
		$tabx = $tabx . "<td NOWRAP><b><font size='2'>&nbsp;</font></b></td>";
		$tabx = $tabx . "<td width='20'>&nbsp;</td></tr>";

		while ($ary=wz_fetch_assoc($res)) :

			$add_store_item = 0;
			$num = $num - 1;
			if ((mt_rand(1,100) <= $stock) || ($at_least_one_item != 1))
			{
				$at_least_one_item = 1;
				if ($ary[qty] == 0){$myshelf = mt_rand(1,10);} else {$myshelf = 1;}
				if (($showcase1 > 0) && ($ary[note1] != "")){$ipfx = $ary[note1];} else {$ipfx = "&nbsp;";}
				if (($showcase2 > 0) && ($ary[note2] != "")){$isfx = "[" . $ary[note2] . "]";} else {$isfx = "&nbsp;";}
				if (($ipfx != "&nbsp;") && ($isfx != "&nbsp;")){$ibrk = "<br>";} else {$ibrk = "";}
				$my_item = $ary[item];
				$my_cost = $ary[cost];
				$add_store_item = 1;
			}
			if (($num == 0) && ($type == 12)) /// ANY EXTRA LIBRARY BOOKS ///
			{
				$ipfx = "&nbsp;";
				$isfx = "&nbsp;";
				$myshelf = 1;
				$books = mt_rand(5,15);
				while ($books > 0) :
					if ((mt_rand(1,100) <= $stock) || ($at_least_one_item != 1))
					{
						$at_least_one_item = 1;
						$add_store_item = 1;
						$my_item = tomeMaker($game);
						$my_cost = mt_rand(5,200) . "gp";
					}
					$books = $books - 1;
				endwhile;
			}
			if ($add_store_item == 1)
			{
				$tabx = $tabx . "<tr><td width='20'>&nbsp;</td>";
				$tabx = $tabx . "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'><font size='2'>" . $my_item . "</font></td>";
				$tabx = $tabx . "<td NOWRAP align='right' style='border-top-style: solid; border-top-width: 1px'><font size='2'>" . $my_cost . "</font></td>";
				if ($shelf > 0){$tabx = $tabx . "<td NOWRAP align='center' style='border-top-style: solid; border-top-width: 1px'><font size='2'>" . $myshelf . "</font></td>";}
				$tabx = $tabx . "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'><font size='2'>" . $ipfx . $ibrk . $isfx . "</font></td>";
				$tabx = $tabx . "<td width='20'>&nbsp;</td></tr>";
			}

		endwhile;

		$tabx = $tabx . "</table>";
	}

if (mt_rand(1,100) > 30){$prex = "The ";} else {$prex = "";}
$house = $prex . "" . $hut3 . " " . $hut2 . " " . $hut1;

return array($house,$tabx);

}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




function TTequipCitizen($job) 
{
	$tt_easy_items = $_SESSION['tt_easy_items'];

	if ($job == "rogue")
	{
		switch (mt_rand(0,1))
		{
			case 0:	$shield = "Buckler";						break;
			case 1:	$shield = strtolower(TTgetWeapon(small));	break;
		}
		if ( $tt_easy_items == 1 ) // USE THE SIMPLE ITEMS FROM MAGESTYKC ////////////////////////////
		{
			switch (mt_rand(0,3))
			{
				case 0:	$armor = "Cloth Armor";				break;
				case 1:	$armor = "Heavy Cloth Armor";		break;
				case 2:	$armor = "Leather Armor";			break;
				case 3:	$armor = "Studded Leather Armor";	break;
			}
		}
		else
		{
			switch (mt_rand(0,2))
			{
				case 0:	$armor = "Quilted Armor";		break;
				case 1:	$armor = "Soft Leather Armor";	break;
				case 2:	$armor = "Heavy Cloth Armor";	break;
			}
		}
	}
	else if (($job == "wizard") || ($job == "priest"))
	{
		if ($job == "priest")
		{
			switch (mt_rand(0,4))
			{
				case 0:	$shield = "Silver Holy Symbol";		break;
				case 1:	$shield = "Quarterstaff";			break;
				case 2:	$shield = "Golden Holy Symbol";		break;
				case 3:	$shield = "Prayer Beads";			break;
				case 4:	$shield = "Wooden Holy Symbol";		break;
			}
		}
		else
		{
			switch (mt_rand(0,3))
			{
				case 0:	$shield = "Magic Wand";		break;
				case 1:	$shield = "Quarterstaff";	break;
				case 2:	$shield = "Magic Staff";	break;
				case 3:	$shield = "Crystal Ball";	break;
			}
		}
		if ( $tt_easy_items == 1 ) // USE THE SIMPLE ITEMS FROM MAGESTYKC ////////////////////////////
		{
			switch (mt_rand(0,1))
			{
				case 0:	$armor = "Cloth Armor";				break;
				case 1:	$armor = "Heavy Cloth Armor";		break;
			}
		}
		else
		{
			switch (mt_rand(0,1))
			{
				case 0:	$armor = "Quilted Armor";		break;
				case 1:	$armor = "Heavy Cloth Armor";	break;
			}
		}
	}
	else
	{
		if ( $tt_easy_items == 1 ) // USE THE SIMPLE ITEMS FROM MAGESTYKC ////////////////////////////
		{
			switch (mt_rand(0,6))
			{
				case 0: $shield = "Wooden Shield";		break;
				case 1: $shield = "Shield";				break;
				case 2: $shield = "Dwarven Shield";		break;
				case 3: $shield = "Heater Shield";		break;
				case 4: $shield = "Kite Shield";		break;
				case 5: $shield = "Tower Shield";		break;
				case 6: $shield = "Great Shield";		break;
			}
			switch (mt_rand(0,6))
			{
				case 0:	$armor = "Ring Mail Armor";			break;
				case 1:	$armor = "Scale Mail Armor";		break;
				case 2:	$armor = "Chain Mail Armor";		break;
				case 3:	$armor = "Banded Mail Armor";		break;
				case 4:	$armor = "Splint Mail Armor";		break;
				case 5:	$armor = "Plate Mail Armor";		break;
				case 6:	$armor = "Heavy Plate Mail Armor";	break;
			}
		}
		else
		{
			switch (mt_rand(0,3))
			{
				case 0: $shield = "Dwarven Spike Shield";	break;
				case 1: $shield = "Heater Shield";			break;
				case 2: $shield = "Kite Shield";			break;
				case 3: $shield = "Lantern Shield";			break;
				case 4: $shield = "Madu";					break;
				case 5: $shield = "Pavise";					break;
				case 6: $shield = "Scutum";					break;
				case 7: $shield = "Sopok";					break;
				case 8: $shield = "Target Shield";			break;
				case 9: $shield = "Tower Shield";			break;
			}
			switch (mt_rand(0,7))
			{
				case 0:	$armor = "Banded Mail Armor";			break;
				case 1:	$armor = "Cuirboille Armor";			break;
				case 2:	$armor = "Heavy Plate Armor";			break;
				case 3:	$armor = "Lamellar Armor";				break;
				case 4:	$armor = "Mail Armor";					break;
				case 5:	$armor = "Plate Armor";					break;
				case 6:	$armor = "Ring-Joined Plate Armor";		break;
				case 7:	$armor = "Scale Mail Armor";			break;
			}
		}
	}

	$armor = strtolower($armor);
	$shield = strtolower($shield);

	return array($armor,$shield);
}

?>
