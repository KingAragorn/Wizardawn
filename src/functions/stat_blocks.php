<?php
		$notes = "";	$note1 = "";	$note2 = "";	$note3 = "";	$monster_info = "";		$note_wep = "";		$note_owep = "";	$note_build = "";	$my_real_name = $ary[name];

			if ($x_crossover == "Goblinoid")
			{
				if ($ary[weapons] != "")
				{
					if ($ary[creator] == "MF"){ $notes = " | <b>Weapon</b>: " . PAgetWeapon(($ary[weapons]+0),$x_game) . " "; }
					else { $notes = " | <b>Weapon</b>: " . PAgetWeapon(mt_rand(1,5),$x_game) . " "; }
					$notes = str_replace(" ", "&nbsp;", $notes);
				}
			}
			else if ($x_game == "Labyrinth Lord")
			{
				if ($ary[weapons] != "")
				{
					$notes = " | <b>WEP</b>: " . getWeapon($ary[weapons]);
					$notes = str_replace(" ", "&nbsp;", $notes);
				}
			}
			else if ($x_game == "Swords & Six-Siders")
			{
				if ($ary[weapons] != "")
				{
					$notes = " | WEP: " . getSXWeapon($ary[weapons]);
					$notes = str_replace(" ", "&nbsp;", $notes);
				}
				if (($show_detail_monster_info > 0) && ($ary[description] != "")){ $notes = $notes . " |&nbsp;NOTES:&nbsp;" . $ary[description]; }
				$show_detail_monster_info = 0;
			}
			else if ($x_game == "BD&D")
			{
				if ($ary[weapons] != "")
				{
					$notes = "&nbsp;| WEAPON: " . getWeapon($ary[weapons]);
					$notes = str_replace(" ", "&nbsp;", $notes);
				}
				if (($show_detail_monster_info > 0) && ($ary[description] != "")){ $notes = $notes . "&nbsp;| NOTES:&nbsp;" . $ary[description]; }
				$show_detail_monster_info = 0;
			}
			else if ($x_game == "Swords & Wizardry")
			{
				if ($ary[weapons] != "")
				{
					$notes = " | WEP: " . getWeapon($ary[weapons]);
					$notes = str_replace(" ", "&nbsp;", $notes);
				}
			}
			else if ($x_game == "BFRPG")
			{
				if ($ary[weapons] != "")
				{
					$notes = " WEAPON: " . getWeapon($ary[weapons]);
					$notes = str_replace(" ", "&nbsp;", $notes);
				}
			}
			else if ($x_game == "AD&D")
			{
				if ( ( $show_detail_monster_info > 0 || $list_omit < 1 ) && $ary[weapons] != "" )
				{
					$notes = " WEP: " . getWeapon($ary[weapons]);
					$notes = str_replace(" ", "&nbsp;", $notes) . ";";
				}
			}
			else if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
			{
				if ($ary[weapons] != "")
				{
					if ($x_supplement == "WW")
					{
						$notes = "Uses " . TTgetWeapon($ary[weapons]);
					}
					else
					{
						$notes = " {" . TTgetWeapon($ary[weapons]) . "}";
					}
					$notes = str_replace(" ", "&nbsp;", $notes);
				}
			}
			else if (($x_game == "Millenniums & Mutations 5th Edition") || ($x_game == "Millenniums & Mutations 7th Edition"))
			{
				if ($ary[weapons] != "")
				{
					$note_wep = " | <b>Weapon</b>: " . PAgetWeapon(($ary[weapons]+0),$x_game) . " ";
					$note_wep = str_replace(" ", "&nbsp;", $note_wep);

					$note_owep = " | <b>WEP</b>: " . PAgetWeapon(($ary[weapons]+0),$x_game) . " ";
					$note_owep = str_replace(" ", "&nbsp;", $note_owep);
				}
			}
			else if ($x_game == "OSRIC")
			{
				if ((($ary[spatk] != "") && ($ary[spatk] != "None")) || (($ary[spdef] != "") && ($ary[spdef] != "None")) || ($ary[weapons] != ""))
				{
					if ($ary[weapons] != ""){$note3 = "<u>Weapon</u> (" . getWeapon($ary[weapons]) . ")";}
					if (($ary[spatk] != "") && ($ary[spatk] != "None")){$note1 = "<u>Special Attack</u> (" . $ary[spatk] . ")";}
					if (($ary[spdef] != "") && ($ary[spdef] != "None")){$note2 = "<u>Special Defense</u> (" . $ary[spdef] . ")";}
					$notes = " | Notes: " . $note3 . " " . $note1 . " " . $note2;
					$notes = str_replace(" ", "&nbsp;", $notes);
				}
			}
			else if (($x_game == "Broken Urthe") || ($x_game == "Metamorphosis Alpha") || ($x_game == "Gamma World") || ($x_game == "Mutant Future"))
			{
				if ($ary[weapons] != "")
				{
					$note_wep = " | <b>Weapon:</b> " . PAgetWeapon(($ary[weapons]+0),$x_game) . " ";
					$note_wep = str_replace(" ", "&nbsp;", $note_wep);

					$note_owep = " | <b>WEP:</b> " . PAgetWeapon(($ary[weapons]+0),$x_game) . " ";
					$note_owep = str_replace(" ", "&nbsp;", $note_owep);
				}
				if (($x_game != "Broken Urthe") && ($ary[type] == "R"))
				{
					$notes = retroBot($ary[description],$x_game);
					if ($x_game == "Metamorphosis Alpha" || $x_game == "Gamma World")
					{
						$old_armor = MAconvertArmor($ary[ac]);
						$old_hit = MAconvertHit($ary[level]);
					}
					else
					{
						$old_armor = PAconvertArmor($ary[ac]);
						$old_hit = PAconvertHit($ary[level]);
					}
					if ($ary[al] != ""){$robot_hurt = $ary[al];} else {$robot_hurt = $ary[dmg];}
				}
				else if ($x_game == "Metamorphosis Alpha")
				{
					if (($x_mutants > 0) && ($ary[treasure] != ""))
					{
						$note_build = $ary[description];
						$note_build = str_replace("This is a creature from Urthe`s ancient past that once were extinct, but have somehow reappeared in recent centuries.", "", $note_build);
						$note_build = str_replace("This is a creature from Urthe`s past that still exists today.", "", $note_build);
						$note_build = str_replace("This is a creature from Urthe`s past that still exists today, although mutated or evolved somewhat.", "", $note_build);
						$notes = $ary[treasure] . " " . $note_build;
						$notes = retroNotes($notes,$x_game,$ary[level]);
						$my_real_name = $ary[loot];
					}
					else { $notes = retroNotes($ary[description],$x_game,$ary[level]); }

					$old_armor = MAconvertArmor($ary[ac]);
					$old_hit = MAconvertHit($ary[level]);
				}
				else if ($x_game == "Gamma World")
				{
					if (($x_mutants > 0) && ($ary[treasure] != ""))
					{
						$note_build = $ary[description];
						$note_build = str_replace("This is a creature from Urthe`s ancient past that once were extinct, but have somehow reappeared in recent centuries.", "", $note_build);
						$note_build = str_replace("This is a creature from Urthe`s past that still exists today.", "", $note_build);
						$note_build = str_replace("This is a creature from Urthe`s past that still exists today, although mutated or evolved somewhat.", "", $note_build);
						$notes = $ary[treasure] . " " . $note_build;
						$notes = retroNotes($notes,$x_game,$ary[level]);
						$my_real_name = $ary[loot];
					}
					else { $notes = retroNotes($ary[description],$x_game,$ary[level]); }

					$old_armor = MAconvertArmor($ary[ac]);
					$old_hit = MAconvertHit($ary[level]);
				}
				else if ($ary[type] == "R")
				{
					$notes = retroBot($ary[description],$x_game);
				}
				else
				{
					if (($x_mutants > 0) && ($ary[treasure] != ""))
					{
						$note_build = $ary[description];
						$note_build = str_replace("This is a creature from Urthe`s ancient past that once were extinct, but have somehow reappeared in recent centuries.", "", $note_build);
						$note_build = str_replace("This is a creature from Urthe`s past that still exists today.", "", $note_build);
						$note_build = str_replace("This is a creature from Urthe`s past that still exists today, although mutated or evolved somewhat.", "", $note_build);
						$notes = $ary[treasure] . " " . $note_build;
						$my_real_name = $ary[loot];
					}
					else { $notes = $ary[description]; }
				}
				if ($notes != ""){$notes = "<br>SPAYC" . $notes;}
			}

			$notes = str_replace(" ", "SPAYC", $notes);

			// ANY EXTRA NAMES ///////////////////////////////////////////////////////
			$extra_name = "";
			if ( $no_name_creatures != 1 )
			{
				if ($ary[m_myname] == "dragon")
				{
					$extra_name = " {Known as " . dragonName() . "}";
					if ((mt_rand(1,100) > 80) && ($ary[m_hoard] == 2))
					{
						$notes = $notes . " | <u>Dragon Egg</u> (This dragon has an egg with a " . mt_rand(1,9) . "0% chance to survive)";
						$notes = str_replace(" ", "&nbsp;", $notes);
					}
				}
				else if ($ary[m_myname] == "demon"){$extra_name = " {Known as " . demonName() . "}";}
				else if ($ary[m_myname] == "lich"){$extra_name = " {Known as " . mageName() . "}";}
			}
			/////////////////////////////////////////////////////////////////////////

			if ($x_game == "OSRIC")
			{
				$monster_info = strtoupper($ary[name]) . $extra_name . " [FREQ: " . $ary[freq] . " | ENC: " . $ary[enc] . " | SIZE: " . $ary[size] . " | MOVE: " . $ary[move] . " | AC: " . $ary[ac] . " | HD: " . $ary[hd] . " | ATK: " . $ary[atk] . " | DMG: " . $ary[dmg] . " | MR: " . $ary[mr] . " | LAIR: " . $ary[lair] . " | INT: " . $ary[iq] . " | AL: " . $ary[al] . " | XP: " . $ary[xp] . " | BOOK: " . $ary[creator] . $notes . "&nbsp;]";
			}
			else if ($x_game == "AD&D")
			{
				if ( $ary[mr] == "" ){ $magic_resist = "MR: 0%;"; } else { $magic_resist = $ary[mr]; }
				if ( ( $show_detail_monster_info > 0 || $list_omit < 1 ) && $ary[treasure] != "" ){ $spec_add_info = " " . $ary[treasure] . " "; $spec_add_info = str_replace("SPAYC", " ", $spec_add_info); } else { $spec_add_info = ""; }
				$monster_info = $ary[name] . $extra_name . " [" . $ary[freq] . " " . $ary[enc] . " " . $ary[size] . " " . $ary[move] . " " . $ary[ac] . " " . $ary[hd] . " " . $ary[description] . " " . $ary[atk] . " " . $ary[dmg] . " " . $magic_resist . " " . $ary[lair] . " " . $ary[iq] . " " . $ary[al] . " " . $ary[xp] . " " . $ary[thaco] . " " . $notes . $spec_add_info . $ary[creator] . "]";
				$monster_info = str_replace(" APP: ", "; APP: ", $monster_info);
				$monster_info = str_replace(";]", "]", $monster_info);
			}
			else if ($x_game == "Mutant Future")
			{
				$monster_info = strtoupper($ary[name]) . $extra_name . " [<b>ENC:</b>&nbsp;" . $ary[enc] . "; <b>AL:</b>&nbsp;" . $ary[al] . "; <b>MV:</b>&nbsp;" . $ary[move] . "; <b>AC:</b>&nbsp;" . $ary[ac] . "; <b>HD:</b>&nbsp;" . $ary[hd] . "; <b>AT:</b>&nbsp;" . $ary[atk] . "; <b>DMG:</b>&nbsp;" . $ary[dmg] . "; <b>SV:</b>&nbsp;L" . $ary[spdef] . "; <b>ML:</b>&nbsp;" . $ary[bravery] . "; <b>IQ:</b>&nbsp;" . $ary[iq] . "; <b>THAC0:</b>&nbsp;" . $ary[thaco] . "; <b>TRS:</b>&nbsp;" . $ary[loot] . $notes . " " . $note_owep . "&nbsp;]";
			}
			else if ($x_game == "Swords & Wizardry")
			{
				$monster_info = strtoupper($ary[name]) . $extra_name . " [LV:&nbsp;" . $ary[level] . "&nbsp;| HD:&nbsp;" . $ary[hd] . "&nbsp;| AC:&nbsp;" . $ary[ac] . "&nbsp;| ATK:&nbsp;" . $ary[atk] . "&nbsp;| SV:&nbsp;" . $ary[spdef] . "&nbsp;| SPEC:&nbsp;" . $ary[spatk] . "&nbsp;| MV:&nbsp;" . $ary[move] . "&nbsp;| AL:&nbsp;" . $ary[al] . "&nbsp;| XP:&nbsp;" . $ary[xp] . "&nbsp;| TOHIT:&nbsp;" . $ary[thaco] . $notes . "&nbsp;]";
			}
			else if ($x_game == "Swords & Six-Siders")
			{
				if ( $ary[thaco] < 1 ){ $svsx = $ary[thaco]; } else { $svsx = "+" . $ary[thaco]; }
				$monster_info = strtoupper($ary[name]) . $extra_name . " [LVL:&nbsp;" . $ary[al] . "&nbsp;| AC:&nbsp;" . $ary[ac] . "&nbsp;| DR:&nbsp;" . $ary[atk] . "&nbsp;| TOHIT:&nbsp;" . $svsx . "&nbsp;| DMG:&nbsp;" . $ary[dmg] . "&nbsp;| SV:&nbsp;" . $svsx . "&nbsp;| TYPE:&nbsp;" . $ary[type] . "&nbsp;| LANG:&nbsp;" . $ary[spdef] . $notes . "&nbsp;]";
			}
			else if ($x_game == "BD&D")
			{
				$monster_info = strtoupper($ary[name]) . $extra_name . " [AC:&nbsp;" . $ary[ac] . "&nbsp;| HD:&nbsp;" . $ary[hd] . "&nbsp;| MV:&nbsp;" . $ary[move] . "&nbsp;| THAC0:&nbsp;" . $ary[thaco] . "&nbsp;| ATK:&nbsp;" . $ary[atk] . "&nbsp;| DMG:&nbsp;" . $ary[dmg] . "&nbsp;| #APP:&nbsp;" . $ary[enc] . "&nbsp;| SV:&nbsp;" . $ary[spdef] . "&nbsp;| ML:&nbsp;" . $ary[bravery] . "&nbsp;| TT:&nbsp;" . $ary[loot] . "&nbsp;| AL:&nbsp;" . $ary[al] . "&nbsp;| LV:&nbsp;" . $ary[difficulty] . "&nbsp;| XP:&nbsp;" . $ary[xp] . "&nbsp;| PAGE:&nbsp;" . $ary[lair] . $notes . "&nbsp;]";
			}
			else if ($x_game == "BFRPG")
			{
				$ac = str_replace("‡", "&#8225;", $ary[ac]); $ac = str_replace("†", "&#8224;", $ac);
				$monster_info = strtoupper($ary[name]) . $extra_name . " [AC:&nbsp;" . $ac . "&nbsp;| HD:&nbsp;" . $ary[hd] . "&nbsp;| ATK:&nbsp;" . $ary[atk] . "&nbsp;| DMG:&nbsp;" . $ary[dmg] . "&nbsp;| MV:&nbsp;" . $ary[move] . "&nbsp;| #APP:&nbsp;" . $ary[enc] . "&nbsp;| SV:&nbsp;" . $ary[spdef] . "&nbsp;| ML:&nbsp;" . $ary[bravery] . "&nbsp;| TRS:&nbsp;" . $ary[treasure] . "&nbsp;| XP:&nbsp;" . $ary[xp] . $notes . "&nbsp;]";

				if ($ary[name] == "Headless Horseman")
				{
					$mount = "<br>MOUNT: Nightmare [AC: 4 | HD: 6+6 | ATK: 2 hooves/1 bite | DMG: 1d6+4/1d6+4/2d4 | MV: 80` (10`) Fly 160` (10`) | SV: Fighter: 6 | XP: 525 ]";
					$monster_info = $monster_info . $mount;
				}
			}
			else if ($x_game == "Tunnels & Trolls 5th Edition")
			{
				include("functions/monsters_tt.php");

				if ($x_supplement == "WW")
				{
					$monster_info = strtoupper($ary[name]) . $extra_name . " [LVL:&nbsp;" . $ary[difficulty] . "&nbsp;|&nbsp;TYP:&nbsp;" . $ary[type] . "&nbsp;|&nbsp;APP:&nbsp;" . $ary[enc] . "&nbsp;|&nbsp;SZ:&nbsp;" . $ary[size] . "&nbsp;|&nbsp;MV:&nbsp;" . $ary[move] . "&nbsp;|&nbsp;MR:&nbsp;" . $my_mr_is . "&nbsp;<i>(Life)</i>&nbsp;|&nbsp;ATK:&nbsp;" . $mn_mod_attack . "&nbsp;|&nbsp;DMG:&nbsp;1d6+" . $mn_mod_damage . "&nbsp;|&nbsp;CR:&nbsp;" . $mn_mod_level . "&nbsp;<i>(" . $cr_monster . ")</i>&nbsp;|&nbsp;LANG:&nbsp;" . $ary[spdef] . "&nbsp;|&nbsp;AP:&nbsp;" . $my_mr_is;
					if ($notes != ""){$monster_info = $monster_info . "&nbsp;|&nbsp;NOTE:&nbsp;" . $notes;}
				}
				else
				{
					if ($do_not_show_creatures != 1){$monster_info = strtoupper($ary[name]) . $extra_name . " [TYPE:&nbsp;" . $ary[type] . "&nbsp;|&nbsp;MR:&nbsp;" . $my_mr_is . $notes . "&nbsp;|&nbsp;DICE:&nbsp;" . $my_dc_is . "&nbsp;|&nbsp;SIZE:&nbsp;" . $ary[size] . "&nbsp;|&nbsp;MOVE:&nbsp;" . $ary[move] . "&nbsp;|&nbsp;INT:&nbsp;" . $my_int_is . "&nbsp;|&nbsp;LANG:&nbsp;" . $ary[spdef];}
					else {$monster_info = strtoupper($ary[name]) . $extra_name . " [TYPE:&nbsp;" . $ary[type] . "&nbsp;|&nbsp;MR:&nbsp;" . $my_mr_is . $notes . "&nbsp;|&nbsp;DICE:&nbsp;" . $my_dc_is . "&nbsp;|&nbsp;#APP:&nbsp;" . $ary[enc] . "&nbsp;|&nbsp;SIZE:&nbsp;" . $ary[size] . "&nbsp;|&nbsp;MOVE:&nbsp;" . $ary[move] . "&nbsp;|&nbsp;INT:&nbsp;" . $my_int_is . "&nbsp;|&nbsp;LANG:&nbsp;" . $ary[spdef];}
				}
			}
			else if ($x_game == "Tunnels & Trolls 7th Edition" || $x_game == "Tunnels & Trolls Deluxe")
			{
				include("functions/monsters_tt.php");
				if ($x_game == "Tunnels & Trolls Deluxe")
				{
					$mr_is_level = "|&nbsp;LVL:&nbsp;" . CEIL($my_mr_is/25) . "&nbsp;";
				}
				if ($do_not_show_creatures != 1){$monster_info = strtoupper($ary[name]) . $extra_name . " [TYPE:&nbsp;" . $ary[type] . "&nbsp;|&nbsp;MR:&nbsp;" . $my_mr_is . $notes . "&nbsp;" . $mr_is_level . "|&nbsp;DICE:&nbsp;" . $my_dc_is . "&nbsp;|&nbsp;SIZE:&nbsp;" . $ary[size] . "&nbsp;|&nbsp;MOVE:&nbsp;" . $ary[move] . "&nbsp;|&nbsp;WIZ:&nbsp;" . $my_wiz_is . "&nbsp;|&nbsp;LANG:&nbsp;" . $ary[spdef];}
				else {$monster_info = strtoupper($ary[name]) . $extra_name . " [TYPE:&nbsp;" . $ary[type] . "&nbsp;|&nbsp;MR:&nbsp;" . $my_mr_is . $notes . "&nbsp;" . $mr_is_level . "|&nbsp;DICE:&nbsp;" . $my_dc_is . "&nbsp;|&nbsp;#APP:&nbsp;" . $ary[enc] . "&nbsp;|&nbsp;SIZE:&nbsp;" . $ary[size] . "&nbsp;|&nbsp;MOVE:&nbsp;" . $ary[move] . "&nbsp;|&nbsp;WIZ:&nbsp;" . $my_wiz_is . "&nbsp;|&nbsp;LANG:&nbsp;" . $ary[spdef];}
			}
			else if (($x_game == "Millenniums & Mutations 5th Edition") || ($x_game == "Millenniums & Mutations 7th Edition"))
			{
				include("functions/monsters_tt.php");
				$monster_info = strtoupper($my_real_name) . " [<b>MR:</b>&nbsp;" . $my_mr_is . $notes . "&nbsp;|&nbsp;<b>DICE:</b>&nbsp;" . $my_dc_is . "&nbsp;|&nbsp;<b>SIZE:</b>&nbsp;" . $ary[size] . "&nbsp;|&nbsp;<b>MOVE:</b>&nbsp;" . $ary[move] . "&nbsp;|&nbsp;<b>NOTES:</b>&nbsp;" . $description . "&nbsp;]";
			}
			else if ($x_game == "Broken Urthe")
			{
				if ($ary[type] == "R"){ $monster_info = strtoupper($ary[name]) . " [<b>Cond:</b> " . $ary[hd] . " | <b>Prot:</b> " . $ary[ac] . " | <b>Hit:</b> " . $ary[thaco] . " | <b>Atks:</b> " . $ary[atk] . " | <b>Dmg:</b> " . $ary[dmg] . " | <b>Spd:</b> " . $ary[move] . " | <b>Stg:</b> " . $ary[iq] . " | <b>Size:</b> " . $ary[size] . " | <b>Dfn:</b> " . $ary[lair] . " | <b>Level:</b> " . $ary[level] . " | <b>Salv:</b> " . $ary[salvage] . "% | <b>Sft:</b> " . $ary[mr] . "&nbsp;]" . $notes; }
				else { $monster_info = strtoupper($my_real_name) . " [<b>Stam:</b> " . $ary[hd] . " | <b>Prot:</b> " . $ary[ac] . " | <b>Hit:</b> " . $ary[thaco] . " | <b>Atks:</b> " . $ary[atk] . " | <b>Dmg:</b> " . $ary[dmg] . " " . $note_wep . " | <b>Spd:</b> " . $ary[move] . " | <b>Stg:</b> " . $ary[iq] . " | <b>Size:</b> " . $ary[size] . " | <b>Dfn:</b> " . $ary[lair] . " | <b>Level:</b> " . $ary[level] . "&nbsp;]" . $notes; }
			}
			else if ($x_game == "Metamorphosis Alpha" || $x_game == "Gamma World")
			{
				if ($ary[level] < 1){ $metalpha_level = 1; } else { $metalpha_level = $ary[level]; }
				$resistances = explode("/", $ary[lair]);
				$resist_mind = explode(":", $resistances[1]);	if (($resist_mind[1] < 3) || ($resist_mind[1] == "-")){$resist_minds = 3;} else if ($resist_mind[1] > 18){$resist_minds = "immune";} else {$resist_minds = $resist_mind[1];}
				$resist_rads = explode(":", $resistances[2]);	if (($resist_rads[1] < 3) || ($resist_rads[1] == "-")){$resist_radss = 3;} else if ($resist_rads[1] > 18){$resist_radss = "immune";} else {$resist_radss = $resist_rads[1];}
				$resist_toxn = explode(":", $resistances[4]);	if (($resist_toxn[1] < 3) || ($resist_toxn[1] == "-")){$resist_toxns = 3;} else if ($resist_toxn[1] > 18){$resist_toxns = "immune";} else {$resist_toxns = $resist_toxn[1];}

				if ($ary[type] == "R"){ $monster_info = strtoupper($ary[name]) . " [<b>MV:</b> " . retroNotes($ary[move],$x_game,$ary[level]) . " | <b>SZ:</b> " . $ary[size] . " | <b>AC:</b> " . $old_armor . " | <b>HD:</b> " . $metalpha_level . " | <b>ATK:</b> " . $ary[atk] . " | <b>ATK&nbsp;CLASS:</b> " . $old_hit . " | <b>DMG:</b> " . $robot_hurt . " | <b>RAD&nbsp;RESIST:</b> " . $resist_radss . "&nbsp;]" . $notes; }
				else { $monster_info = strtoupper($my_real_name) . " [<b>MV:</b> " . retroNotes($ary[move],$x_game,$ary[level]) . " | <b>SZ:</b> " . $ary[size] . " | <b>AC:</b> " . $old_armor . " | <b>HD:</b> " . $metalpha_level . " | <b>ATK:</b> " . $ary[atk] . " " . $note_owep . " | <b>ATK&nbsp;CLASS:</b> " . $old_hit . " | <b>DMG:</b> " . $ary[dmg] . " | <b>RAD&nbsp;RESIST:</b> " . $resist_radss . " | <b>MIND&nbsp;RESIST:</b> " . $resist_minds . " | <b>POISON&nbsp;RESIST:</b> " . $resist_toxns . "&nbsp;]" . $notes; }
			}
			else if ($x_crossover == "Goblinoid")
			{
				if ($ary[al] == "Neutral"){$aligner = "N";} else if ($ary[al] == "Lawful"){$aligner = "L";} else if ($ary[al] == "Chaotic"){$aligner = "C";} else {$aligner = $ary[al];}
				$monster_info = strtoupper($ary[name]) . $extra_name . " [<b>ENC:</b> " . $ary[enc] . " | <b>AL:</b> " . $aligner . " | <b>MV:</b> " . $ary[move] . " | <b>AC:</b> " . $ary[ac] . " | <b>HD:</b> " . $ary[hd] . " | <b>ATK:</b> " . $ary[atk] . " | <b>DMG:</b> " . $ary[dmg] . " | <b>SV:</b> " . $ary[spdef] . " | <b>ML:</b> " . $ary[bravery] . " | <b>TRS:</b> " . $ary[loot] . " | <b>LVL:</b> " . $ary[level] . " | <b>THAC0:</b> " . $ary[thaco] . " | <b>BOOK:</b> " . $ary[creator] . $notes . " " . $note_owep . "&nbsp;]";
			}
			else if ($x_game == "Labyrinth Lord")
			{
				$monster_info = strtoupper($ary[name]) . $extra_name . " [<b>ENC:</b> " . $ary[enc] . " | <b>AL:</b> " . $ary[al] . " | <b>MV:</b> " . $ary[move] . " | <b>AC:</b> " . $ary[ac] . " | <b>HD:</b> " . $ary[hd] . " | <b>ATK:</b> " . $ary[atk] . " | <b>DMG:</b> " . $ary[dmg] . " | <b>SV:</b> " . $ary[spdef] . " | <b>ML:</b> " . $ary[bravery] . " | <b>TRS:</b> " . $ary[loot] . " | <b>XP:</b> " . $ary[xp] . " | <b>LVL:</b> " . $ary[level] . " | <b>THAC0:</b> " . $ary[thaco] . " | <b>BOOK:</b> " . $ary[creator] . $notes . "&nbsp;]";
			}

		$monster_info = str_replace(" ", "&nbsp;", $monster_info);
		$monster_info = str_replace("|&nbsp;", "| ", $monster_info);
		if ($x_game == "AD&D"){ $monster_info = str_replace(";&nbsp;", "&nbsp;| ", $monster_info); }
		$monster_info = str_replace("SPAYC", " ", $monster_info);

		if ((($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) && ($description != "")){$monster_info = $monster_info . "&nbsp;|&nbsp;DESC:&nbsp;" . $description . "&nbsp;]";}
		else if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){$monster_info = $monster_info . "&nbsp;]";}
?>