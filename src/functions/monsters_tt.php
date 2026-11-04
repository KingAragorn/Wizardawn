<?php

/// THIS IS THE TUNNELS & TROLLS CONVERSION FILES ///////////////////////////////////////////////////////////////////////////////////////////////////
/// IT DYNAMICAL DOES THE MONSTERS STATS PER LEVEL //////////////////////////////////////////////////////////////////////////////////////////////////

		if ($ttlvl == 9){$ttlvl = 0.5;} // FOR EASY MONSTERS
		if ($ttlvl > 4){$roll = 10;} else if ($ttlvl > 2){$roll = 5;} else {$roll = 0;}

		$my_mr_is = ROUND( $ttlvl * ($ary[m_hp_min] + $ary[ac]) ) + ($roll * $ary[difficulty]);	// MR
		if (($x_game == "Millenniums & Mutations 5th Edition") || ($x_game == "Millenniums & Mutations 7th Edition"))
		{
			$my_mr_is = ROUND( $ttlvl * ((($ary[difficulty]*2)+$ary[ac]+15) + ($ary[ac]+20)) ) + ($roll * $ary[difficulty]);	// MR
		}

		if ($x_game == "Tunnels & Trolls Deluxe"){ $my_ad_is = FLOOR($my_mr_is/2); }
		else { $my_ad_is = CEIL($my_mr_is/2); }													// ADDS

		$my_rl_is = FLOOR($my_mr_is/10)+1;														// DICE

		$my_dc_is = $my_rl_is . "&nbsp;+&nbsp;" . $my_ad_is;

		$modifer_for_difficulty = CEIL( $my_mr_is*0.10 );

		$my_trigger = CEIL($my_dc_is/3);
			if ($my_trigger >= $my_dc_is){$my_trigger = $my_dc_is - 1;}
			if ($my_trigger < 1){$my_trigger = 1;}

		$my_sp_is = "roll a '6' at least " . $my_trigger . "x with their attack";
		if ($x_supplement == "WW"){$my_sp_is = "roll a '1' on their damage die roll";}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			if ($x_game == "Millenniums & Mutations 5th Edition") ////////////////////////////////////////////////////////////////////////////////////////////////
			{
				if ($ary[iq] == "Instinctual"){$my_int_is = "1";}
				else if ($ary[iq] == "Animal"){$my_int_is = "5";}
				else if ($ary[iq] == "Primitive"){$my_int_is = "10";}
				else if ($ary[iq] == "Industrial"){$my_int_is = "15";}
				else if ($ary[iq] == "Modern"){$my_int_is = "20";}
				else {$my_int_is = "25";}
				$my_int_is = CEIL($my_int_is + $modifer_for_difficulty);							// INT
					if ($ary[iq] < 1){$my_int_is = "1";}

				$my_total_adds = $my_ad_is / 6;

				$abilities = explode("|", $ary[spatk]);
				$body_build = 3;
				$body_i = 0;

				while ($body_build > 0) :

					if ($abilities[$body_i] == "d")
					{
						$my_dex_is = round($my_total_adds * $body_build);
						if ($my_dex_is < 0){$my_dex_is = 9 - $my_dex_is;} else if ($my_dex_is > 0){$my_dex_is = 12 + $my_dex_is;} else {$my_dex_is = 13 - $body_build;}
					}
					else if ($abilities[$body_i] == "l")
					{
						$my_lck_is = round($my_total_adds * $body_build);
						if ($my_lck_is < 0){$my_lck_is = 9 - $my_lck_is;} else if ($my_lck_is > 0){$my_lck_is = 12 + $my_lck_is;} else {$my_lck_is = 13 - $body_build;}
					}
					else
					{
						$my_str_is = round($my_total_adds * $body_build);
						if ($my_str_is < 0){$my_str_is = 9 - $my_str_is;} else if ($my_str_is > 0){$my_str_is = 12 + $my_str_is;} else {$my_str_is = 13 - $body_build;}
					}

					$body_i = $body_i + 1;
					$body_build = $body_build - 1;

				endwhile;

				$my_chr_is = FLOOR((($ary[ac]+15+$ary[difficulty])/2) + $my_int_is); if ($my_chr_is < 1){$my_chr_is = 1;}

				$monster_statistics = "STR:" . $my_str_is . "&nbsp;/ DEX:" . $my_dex_is . "&nbsp;/ LCK:" . $my_lck_is . "&nbsp;/ CON:" . $my_mr_is . "&nbsp;/ INT:" . $my_int_is . "&nbsp;/ CHR:" . $my_chr_is . "";
			}
			else if ($x_game == "Millenniums & Mutations 7th Edition") ////////////////////////////////////////////////////////////////////////////////////////////////
			{
				if ($ary[iq] == "Instinctual"){$my_int_is = "1";}
				else if ($ary[iq] == "Animal"){$my_int_is = "5";}
				else if ($ary[iq] == "Primitive"){$my_int_is = "10";}
				else if ($ary[iq] == "Industrial"){$my_int_is = "15";}
				else if ($ary[iq] == "Modern"){$my_int_is = "20";}
				else {$my_int_is = "25";}
				if ($my_int_is > 5){$my_int_is = CEIL($my_int_is + $modifer_for_difficulty);}		// INT
					if ($my_int_is < 1){$my_int_is = "1";}

				$my_wiz_is = $modifer_for_difficulty + $my_int_is;									// WIZ
					if ($my_int_is < 6){$my_wiz_is = "0";}
					if ($ary[type] == "R"){$my_wiz_is = "0";} // ROBOTS HAVE NO WIZ

				$my_total_adds = $my_ad_is / 10;

				$attribute_priority = str_replace("d", "d|x", $ary[spatk]);
				$abilities = explode("|", $attribute_priority);
				$body_build = 4;
				$body_i = 0;

				while ($body_build > 0) :

					if ($abilities[$body_i] == "d")
					{
						$my_dex_is = round($my_total_adds * $body_build);
						if ($my_dex_is < 0){$my_dex_is = 9 - $my_dex_is;} else if ($my_dex_is > 0){$my_dex_is = 12 + $my_dex_is;} else {$my_dex_is = 13 - $body_build;}
					}
					else if ($abilities[$body_i] == "x")
					{
						$my_spd_is = round($my_total_adds * $body_build);
						if ($my_dex_is < 0){$my_spd_is = 9 - $my_spd_is;} else if ($my_spd_is > 0){$my_spd_is = 12 + $my_spd_is;} else {$my_spd_is = 13 - $body_build;}
					}
					else if ($abilities[$body_i] == "l")
					{
						$my_lck_is = round($my_total_adds * $body_build);
						if ($my_lck_is < 0){$my_lck_is = 9 - $my_lck_is;} else if ($my_lck_is > 0){$my_lck_is = 12 + $my_lck_is;} else {$my_lck_is = 13 - $body_build;}
					}
					else
					{
						$my_str_is = round($my_total_adds * $body_build);
						if ($my_str_is < 0){$my_str_is = 9 - $my_str_is;} else if ($my_str_is > 0){$my_str_is = 12 + $my_str_is;} else {$my_str_is = 13 - $body_build;}
					}

					$body_i = $body_i + 1;
					$body_build = $body_build - 1;

				endwhile;

				$my_chr_is = FLOOR((($ary[ac]+15+$ary[difficulty])/2) + $my_int_is); if ($my_chr_is < 1){$my_chr_is = 1;}

				$monster_statistics = "STR:" . $my_str_is . "&nbsp;/ DEX:" . $my_dex_is . "&nbsp;/ LCK:" . $my_lck_is . "&nbsp;/ SPD:" . $my_spd_is . "&nbsp;/ CON:" . $my_mr_is . "&nbsp;/ INT:" . $my_int_is . "&nbsp;/ WIZ:" . $my_wiz_is . "&nbsp;/ CHR:" . $my_chr_is . "";
			}
			else if ($x_game == "Tunnels & Trolls 5th Edition") ////////////////////////////////////////////////////////////////////////////////////////////////
			{
				$my_int_is = CEIL($ary[iq] + $modifer_for_difficulty);							// INT
					if ($ary[iq] < 1){$my_int_is = "1";}

				$my_total_adds = $my_ad_is / 6;

				$abilities = explode("|", $ary[spatk]);
				$body_build = 3;
				$body_i = 0;

				while ($body_build > 0) :

					if ($abilities[$body_i] == "d")
					{
						$my_dex_is = round($my_total_adds * $body_build);
						if ($my_dex_is < 0){$my_dex_is = 9 - $my_dex_is;} else if ($my_dex_is > 0){$my_dex_is = 12 + $my_dex_is;} else {$my_dex_is = 13 - $body_build;}
					}
					else if ($abilities[$body_i] == "l")
					{
						$my_lck_is = round($my_total_adds * $body_build);
						if ($my_lck_is < 0){$my_lck_is = 9 - $my_lck_is;} else if ($my_lck_is > 0){$my_lck_is = 12 + $my_lck_is;} else {$my_lck_is = 13 - $body_build;}
					}
					else
					{
						$my_str_is = round($my_total_adds * $body_build);
						if ($my_str_is < 0){$my_str_is = 9 - $my_str_is;} else if ($my_str_is > 0){$my_str_is = 12 + $my_str_is;} else {$my_str_is = 13 - $body_build;}
					}

					$body_i = $body_i + 1;
					$body_build = $body_build - 1;

				endwhile;

				$my_chr_is = FLOOR(($ary[bravery]/2) + $my_int_is); if ($my_chr_is < 1){$my_chr_is = 1;}

				$monster_statistics = "STR:" . $my_str_is . "&nbsp;/ DEX:" . $my_dex_is . "&nbsp;/ LCK:" . $my_lck_is . "&nbsp;/ CON:" . $my_mr_is . "&nbsp;/ INT:" . $my_int_is . "&nbsp;/ CHR:" . $my_chr_is . "";
			}
			else ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			{
				$my_int_is = CEIL($ary[iq] + $modifer_for_difficulty + ($ary[mr]*2));				// INT
					if ($ary[iq] < 5){$my_int_is = $ary[iq];}
					if ($ary[iq] < 1){$my_int_is = "1";}

				$my_wiz_is = $ary[mr] + $modifer_for_difficulty + $ary[iq];							// WIZ
					if (($ary[iq] < 5) && (($ary[mr]+0) < 1)){$my_wiz_is = "0";}

				$my_total_adds = $my_ad_is / 10;

				$attribute_priority = str_replace("d", "d|x", $ary[spatk]);
				$abilities = explode("|", $attribute_priority);
				$body_build = 4;
				$body_i = 0;

				while ($body_build > 0) :

					if ($abilities[$body_i] == "d")
					{
						$my_dex_is = round($my_total_adds * $body_build);
						if ($my_dex_is < 0){$my_dex_is = 9 - $my_dex_is;} else if ($my_dex_is > 0){$my_dex_is = 12 + $my_dex_is;} else {$my_dex_is = 13 - $body_build;}
					}
					else if ($abilities[$body_i] == "x")
					{
						$my_spd_is = round($my_total_adds * $body_build);
						if ($my_dex_is < 0){$my_spd_is = 9 - $my_spd_is;} else if ($my_spd_is > 0){$my_spd_is = 12 + $my_spd_is;} else {$my_spd_is = 13 - $body_build;}
					}
					else if ($abilities[$body_i] == "l")
					{
						$my_lck_is = round($my_total_adds * $body_build);
						if ($my_lck_is < 0){$my_lck_is = 9 - $my_lck_is;} else if ($my_lck_is > 0){$my_lck_is = 12 + $my_lck_is;} else {$my_lck_is = 13 - $body_build;}
					}
					else
					{
						$my_str_is = round($my_total_adds * $body_build);
						if ($my_str_is < 0){$my_str_is = 9 - $my_str_is;} else if ($my_str_is > 0){$my_str_is = 12 + $my_str_is;} else {$my_str_is = 13 - $body_build;}
					}

					$body_i = $body_i + 1;
					$body_build = $body_build - 1;

				endwhile;

				$my_chr_is = FLOOR(($ary[bravery]/2) + $ary[iq]); if ($my_chr_is < 1){$my_chr_is = 1;}

				$monster_statistics = "STR:" . $my_str_is . "&nbsp;/ DEX:" . $my_dex_is . "&nbsp;/ LCK:" . $my_lck_is . "&nbsp;/ SPD:" . $my_spd_is . "&nbsp;/ CON:" . $my_mr_is . "&nbsp;/ INT:" . $my_int_is . "&nbsp;/ WIZ:" . $my_wiz_is . "&nbsp;/ CHR:" . $my_chr_is . "";
			}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			$my_real_name = $ary[name];

			if (($x_game == "Millenniums & Mutations 5th Edition") || ($x_game == "Millenniums & Mutations 7th Edition"))
			{
				if ($ary[type] == "R")
				{
					if ($ary[atk] != ""){ $description = $ary[description] . " They are programmed to attack with: " . trim($ary[atk]) . "."; } else { $description = $ary[description]; }
					$description = retroBot($description,$x_game);
				}
				else
				{
					if (($x_mutants > 0) && ($ary[treasure] != ""))
					{
						$description = $ary[description];
						$description = str_replace("This is a creature from Urthe`s ancient past that once were extinct, but have somehow reappeared in recent centuries.", "", $description);
						$description = str_replace("This is a creature from Urthe`s past that still exists today.", "", $description);
						$description = str_replace("This is a creature from Urthe`s past that still exists today, although mutated or evolved somewhat.", "", $description);
						$description = $ary[treasure] . " " . $description;
						$description = retroNotes($description,$x_game,0);
						$my_real_name = $ary[loot];
					}
					else { $description = retroNotes($ary[description],$x_game,0); }
				}
			}
			else { $description = $ary[description]; }

			if ($ary[difficulty] < 6){$description = str_replace("HURT", "1d6", $description);}
			else if ($ary[difficulty] < 11){$description = str_replace("HURT", "2d6", $description);}
			else if ($ary[difficulty] < 16){$description = str_replace("HURT", "3d6", $description);}
			else if ($ary[difficulty] < 21){$description = str_replace("HURT", "4d6", $description);}
			else {$description = str_replace("HURT", "5d6", $description);}

			$description = str_replace("SAVE", TTSaves($ary[difficulty],$x_game), $description);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Millenniums & Mutations 5th Edition"))
			{
				$description = str_replace("WIZ", "INT", $description);
				$description = str_replace("SPD and DEX", "DEX", $description);
				$description = str_replace("STR, DEX, and SPD", "STR and DEX", $description);
				$description = str_replace("SPD or DEX", "DEX", $description);
				$description = str_replace("DEX, SPD, and STR", "STR and DEX", $description);
				$description = str_replace("1-STR; 2-DEX; 3-SPD; 4-INT; 5-LCK; 6-CHR", "1-STR; 2-DEX; 3-CON; 4-INT; 5-LCK; 6-CHR", $description);
				$description = str_replace("SPD", "DEX", $description);
				$description = str_replace("Any spells that fail to affect them are reflected on the caster.", "Any spells cast at them are reflected back on the caster.", $description);
			}
			if ($x_supplement == "WW")
			{
				$startPoint='Each target that gets damaged ';
				$endPoint=' suffers from the effects.';
				$newText='xxxxxxxx';
				$description = preg_replace('#('.preg_quote($startPoint).')(.*)('.preg_quote($endPoint).')#si', '$1'.$newText.'$3', $description);
				$description = str_replace("Each target that gets damaged xxxxxxxx suffers from the effects.", "", $description);
				$endPoint='.';
				$description = preg_replace('#('.preg_quote($startPoint).')(.*)('.preg_quote($endPoint).')#si', '$1'.$newText.'$3', $description);
				$description = str_replace("Each target that gets damaged xxxxxxxx.", "", $description);

				$mn_mod_attack = $my_rl_is;
				$mn_mod_damage = FLOOR($my_ad_is/10) + $my_rl_is;
				$mn_mod_level = FLOOR($my_mr_is/10);
					if ($mn_mod_level < 1){$mn_mod_level = 1;}
				$cr_monster = $mn_mod_level + 15;
			}

			$description = str_replace("DICE", $my_sp_is, $description) . " (" . $monster_statistics . ")";
?>