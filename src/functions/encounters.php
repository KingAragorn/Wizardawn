<?php
/// THIS FILE IS USED TO CALCULATE HOW MANY ENEMIES ARE TO APPEAR IN A ROOM DEPENDING ON LEVELS AND CHARACTERS PRESENT ///

function PAcalculateLife($level,$heroes,$game,$stamina,$mlevel,$might1,$might2,$v_scare,$more_monsters_later)
{
	if ($game == "Gamma World"){ $might1=1; $might2=6; }
	else if ($game == "Metamorphosis Alpha"){ $might1=1; $might2=6; }

	if ($game != "Broken Urthe"){ $blood = "HIT POINTS"; }
	else { $blood = "STAMINA"; }

	$more_monsters_later = $more_monsters_later + 1;

	if ($heroes < 1){$heroes = mt_rand(4,8);}	// IF NO HEROES...SET A NUMBER

	if ($more_monsters_later == 1){$x = 12;}
	else if ($more_monsters_later == 2){$x = 11;}
	else if ($more_monsters_later == 3){$x = 9;}
	else if ($more_monsters_later == 4){$x = 7;}
	else {$x = 1;}
	switch (mt_rand(0,$x))
	{
		case 0:		$monsters_here = mt_rand(1,$heroes);				break;
		case 1:		$monsters_here = mt_rand(1,$heroes);				break;
		case 2:		$monsters_here = mt_rand(1,$heroes);				break;
		case 3:		$monsters_here = mt_rand(1,$heroes);				break;
		case 4:		$monsters_here = mt_rand(1,$heroes);				break;
		case 5:		$monsters_here = floor(mt_rand(1,($heroes*1.5)));	break;
		case 6:		$monsters_here = floor(mt_rand(1,($heroes*1.5)));	break;
		case 7:		$monsters_here = floor(mt_rand(1,($heroes*1.5)));	break;
		case 8:		$monsters_here = floor(mt_rand(1,($heroes*1.75)));	break;
		case 9:		$monsters_here = floor(mt_rand(1,($heroes*1.75)));	break;
		case 10:	$monsters_here = mt_rand(1,($heroes*2));			break;
		case 11:	$monsters_here = mt_rand(1,($heroes*2));			break;
		case 12:	$monsters_here = mt_rand(1,($heroes*3));			break;
	}

	if ($monsters_here > 1){$adj = "are";} else {$adj = "is";}
	$hit_points = "&nbsp;--&nbsp;There&nbsp;" . $adj . "&nbsp;" . $monsters_here . "&nbsp;in&nbsp;this&nbsp;" . $v_scare . "&nbsp;[" . $blood . ":&nbsp;";

	while ($monsters_here > 0) :

		if ($game == "Mutant Future"){ $hit_dice = mt_rand($might1, $might2); }
		else
		{
			$life_cycle = $mlevel;
			$hit_dice = 0;

			while ($life_cycle > 0) :
				$hit_dice = $hit_dice + mt_rand($might1,($might1 *$might2));
				$life_cycle = $life_cycle - 1;
			endwhile;

			if ($mlevel < 1){$hit_dice = mt_rand(1,4);}
		}

		if ($hit_dice < 1){$hit_dice = 1;}

		$hit_points = $hit_points . $hit_dice . ",&nbsp;";
		$monsters_here = $monsters_here - 1;

	endwhile;

	return substr($hit_points, 0, -7) . "]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function calculateLife($level,$heroes,$m_app_min,$m_app_max,$m_hp_min,$m_hp_max,$m_hp_mod,$game,$my_mr_is,$tt_dice,$tt_adds,$tt_vary,$more_monsters_later)
{
	$more_monsters_later = $more_monsters_later + 1;

	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")) ////////////////////////////////////////////
	{
		$character_rolls = ($tt_dice * 6) + $tt_adds;

		while ($monsters_picked != 1) :
			$monsters_here = $monsters_here + 1;
			$my_dice_i_use = (FLOOR(($my_mr_is * $monsters_here)/10)+1);
			while ($my_dice_i_use > 0) :
				$my_dice_is = $my_dice_is + mt_rand(1,6);
				$my_dice_i_use = $my_dice_i_use - 1;
			endwhile;
			$my_dice_is + (CEIL(($my_mr_is * $monsters_here)/2));
			if ($my_dice_is > $character_rolls){ $monsters_picked = 1; $monsters_here = $monsters_here - 1;}
		endwhile;

		if ($more_monsters_later > 1){$monsters_here = CEIL($monsters_here / $more_monsters_later);} // FOR MORE THAN ONE TYPE OF MONSTER IN A ROOM //

		if ($tt_vary > 0){$monsters_here = mt_rand(1,$monsters_here);}

		if ($monsters_here < 1){$monsters_here = 1;}
		if ($monsters_here > 1){$adj = "are";} else {$adj = "is";}

		$my_dcrl_is = (FLOOR(($my_mr_is * $monsters_here)/10)+1) . "+" . (CEIL(($my_mr_is * $monsters_here)/2));

		$hit_points = "&nbsp;--&nbsp;There&nbsp;" . $adj . "&nbsp;" . $monsters_here . "&nbsp;in&nbsp;this&nbsp;area&nbsp;[MR(<u>" . ($my_mr_is * $monsters_here) . "</u>)&nbsp;/&nbsp;DICE(<u>" . $my_dcrl_is . "</u>)&nbsp;/&nbsp;";

		while ($monsters_here > 0) :

			if ($my_mr_is < 1){$my_mr_is = 1;}

			$hit_points = $hit_points . $my_mr_is . ",      ";

			$monsters_here = $monsters_here - 1;

		endwhile;
	}
	else if ($game == "AD&D") /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		if ($m_app_max > 30){$m_app_max = 30;} $m_app_min = 1;

		$myhp = "HIT&nbsp;POINTS";

		if ($tt_dice == 6){$monster_hit_dice = 6;} else {$monster_hit_dice = 8;}

		if ($heroes < 1){$heroes = mt_rand(4,8);}							// IF NO HEROES...SET A NUMBER
		$character_life = (6 * $level) * $heroes;							// (6 x 3) x 5 = 120hp
		$monster_life = $m_hp_max;											// 				   8hp
		$monsters_here = round($character_life / $monster_life);			//	120hp / 8hp = 15 monsters
			if ($monster_life < 1){$monsters_here = 1;}						// FOR THE MOLDS AND PHANTOMS
			if ($monsters_here > $m_app_max){$monsters_here = $m_app_max;}

		$monsters_here = mt_rand($m_app_min,$monsters_here);
		if ($monsters_here > (mt_rand($heroes,($level * $heroes)))){$monsters_here = mt_rand($heroes,($level * $heroes) + mt_rand(1,$level));}
		$monsters_min = $monsters_here - 2;		if ($monsters_min < 1){$monsters_min = 1;}
		$monsters_max = $monsters_here + 2;
		$monsters_here = mt_rand($monsters_min,$monsters_max);
			if ($level > 0){} else {$monsters_here = mt_rand(1,10);}
		if ($more_monsters_later > 1){$monsters_here = CEIL($monsters_here / $more_monsters_later);} // FOR MORE THAN ONE TYPE OF MONSTER IN A ROOM //
		if ($monsters_here < 1){$monsters_here = 1;}
		if ($m_app_max > 1){} else {$monsters_here = 1;}

		if ($monsters_here > 1){$adj = "are";} else {$adj = "is";}
		$hit_points = "&nbsp;--&nbsp;There&nbsp;" . $adj . "&nbsp;" . $monsters_here . "&nbsp;in&nbsp;this&nbsp;area&nbsp;[" . $myhp . ":&nbsp;";

		while ($monsters_here > 0) :
			$my_hit_points = mt_rand($m_hp_min,$m_hp_max);
			if ($my_hit_points < 1){$my_hit_points = 1;}
			$hit_points = $hit_points . $my_hit_points . ",&nbsp;";
			$monsters_here = $monsters_here - 1;
		endwhile;
	}
	else if ($game == "Swords & Six-Siders") /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		$myhp = "HIT&nbsp;POINTS";

		if ($heroes < 1){$heroes = mt_rand(4,8);}							// IF NO HEROES...SET A NUMBER
		$character_life = (6 * $level) * $heroes;							// (6 x 3) x 5 = 120hp
		$monster_life = $m_hp_max;											// 				   8hp
		$monsters_here = round($character_life / $monster_life);			//	120hp / 8hp = 15 monsters
			if ($monster_life < 1){$monsters_here = 1;}						// FOR THE MOLDS AND PHANTOMS
			if ($monsters_here > $m_app_max){$monsters_here = $m_app_max;}

		$monsters_here = mt_rand($m_app_min,$monsters_here);
		if ($monsters_here > (mt_rand($heroes,($level * $heroes)))){$monsters_here = mt_rand($heroes,($level * $heroes) + mt_rand(1,$level));}
		$monsters_min = $monsters_here - 2;		if ($monsters_min < 1){$monsters_min = 1;}
		$monsters_max = $monsters_here + 2;
		$monsters_here = mt_rand($monsters_min,$monsters_max);
			if ($level > 0){} else {$monsters_here = mt_rand(1,10);}
		if ($more_monsters_later > 1){$monsters_here = CEIL($monsters_here / $more_monsters_later);} // FOR MORE THAN ONE TYPE OF MONSTER IN A ROOM //
		if ($monsters_here < 1){$monsters_here = 1;}
		if ($m_app_max > 1){} else {$monsters_here = 1;}

		if ($monsters_here > 1){$adj = "are";} else {$adj = "is";}
		$hit_points = "&nbsp;--&nbsp;There&nbsp;" . $adj . "&nbsp;" . $monsters_here . "&nbsp;in&nbsp;this&nbsp;area&nbsp;[" . $myhp . ":&nbsp;";

		while ($monsters_here > 0) :
			$my_hit_points = mt_rand($m_hp_min,$m_hp_max);
			if ($my_hit_points < 1){$my_hit_points = 1;}
			$hit_points = $hit_points . $my_hit_points . ",&nbsp;";
			$monsters_here = $monsters_here - 1;
		endwhile;
	}
	else ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		if ($m_app_max > 30){$m_app_max = 30;} $m_app_min = 1;

		if (($game == "OSRIC") || ($game == "BD&D") || ($game == "BFRPG") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry")){$myhp = "HIT&nbsp;POINTS";} else {$myhp = "LIFE";}

		if ($tt_dice == 6){$monster_hit_dice = 6;} else {$monster_hit_dice = 8;}

		if ($heroes < 1){$heroes = mt_rand(4,8);}							// IF NO HEROES...SET A NUMBER
		$character_life = (6 * $level) * $heroes;							// (6 x 3) x 5 = 120hp
		$monster_life = ($monster_hit_dice * $m_hp_max) + $m_hp_mod;		// 				   8hp
		$monsters_here = round($character_life / $monster_life);			//	120hp / 8hp = 15 monsters
			if ($monster_life < 1){$monsters_here = 1;}						// FOR THE MOLDS AND PHANTOMS
			if ($monsters_here > $m_app_max){$monsters_here = $m_app_max;}

		$monsters_here = mt_rand($m_app_min,$monsters_here);
		if ($monsters_here > (mt_rand($heroes,($level * $heroes)))){$monsters_here = mt_rand($heroes,($level * $heroes) + mt_rand(1,$level));}
		$monsters_min = $monsters_here - 2;		if ($monsters_min < 1){$monsters_min = 1;}
		$monsters_max = $monsters_here + 2;
		$monsters_here = mt_rand($monsters_min,$monsters_max);
			if ($level > 0){} else {$monsters_here = mt_rand(1,10);}
		if ($more_monsters_later > 1){$monsters_here = CEIL($monsters_here / $more_monsters_later);} // FOR MORE THAN ONE TYPE OF MONSTER IN A ROOM //
		if ($monsters_here < 1){$monsters_here = 1;}
		if ($m_app_max > 1){} else {$monsters_here = 1;}

		if ($monsters_here > 1){$adj = "are";} else {$adj = "is";}
		$hit_points = "&nbsp;--&nbsp;There&nbsp;" . $adj . "&nbsp;" . $monsters_here . "&nbsp;in&nbsp;this&nbsp;area&nbsp;[" . $myhp . ":&nbsp;";

		while ($monsters_here > 0) :

			$life = $m_hp_mod;
				if (($m_hp_min < 1) && ($m_hp_max < 1) && ($m_hp_mod == 90000)){$life = 1;} 				// FOR 1 hp
				else if (($m_hp_min < 1) && ($m_hp_max < 1) && ($m_hp_mod == 91000)){$life = 2;} 			// FOR 2 hp
				else if (($m_hp_min < 1) && ($m_hp_max < 1) && ($m_hp_mod == 1)){$life = mt_rand(1,2);} 	// FOR 1d2 hp
				else if (($m_hp_min < 1) && ($m_hp_max < 1) && ($m_hp_mod == 4)){$life = mt_rand(1,4);} 	// FOR 1d4 hp
				else if (($m_hp_min < 1) && ($m_hp_max < 1) && ($m_hp_mod == 5)){$life = mt_rand(1,4)+1;} 	// FOR 1d4+1 hp
				else if (($m_hp_min < 1) && ($m_hp_max < 1) && ($m_hp_mod == 8)){$life = mt_rand(4,8);}		// FOR 4-8 hp
				else if (($m_hp_min < 1) && ($m_hp_max < 1) && ($m_hp_mod == 2)){$life = mt_rand(2,4);}		// FOR 2-4 hp
				else if (($m_hp_min < 1) && ($m_hp_max < 1) && ($m_hp_mod == 3)){$life = mt_rand(1,3);} 	// FOR 1d3 hp
				else if (($m_hp_min < 1) && ($m_hp_max < 1) && ($m_hp_mod == 6)){$life = mt_rand(1,6);} 	// FOR 1d6 hp

			$hit_dice = mt_rand($m_hp_min,$m_hp_max);

			while ($hit_dice > 0) :

				$life = $life + mt_rand(1,$monster_hit_dice);
				$hit_dice = $hit_dice - 1;

			endwhile;

			if ($life < 1){$life = 1;}

			$hit_points = $hit_points . $life . ",&nbsp;";

			$monsters_here = $monsters_here - 1;

		endwhile;
	}
	return substr($hit_points, 0, -7) . "]";
}
?>