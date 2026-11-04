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
