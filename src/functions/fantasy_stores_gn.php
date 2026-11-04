<?php

if ($city_size > 800){$economy = 3;}
else if ($city_size > 400){$economy = 2;}
else {$economy = 1;}

while ($economy > 0) :

	$max_shops = 14;
	$max_guild = 3;

	if ($doneit == 1){ $huts = 0; $shplimit = $max_shops; }
	else if ($doneit == 2){ $huts = 16; $shplimit = $max_guild; }
	else if ($doneit == 3){ $huts = 15; $shplimit = 1; }
	else if ($doneit == 4){ $huts = 14; $shplimit = 1; }

///////////////////////////////////////////////////// TIME TO BUILD ALL OF THE STORES /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$shopqry = "SELECT * FROM shop_track WHERE shop=0 AND didit=0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $shplimit";
$shopres = wz_query( $connection, $shopqry ); /* shopqry. */

	while ($shopary=wz_fetch_assoc($shopres)) :

		if (($doneit == 1) && ($huts > 13)){ $huts = 0; }
		else if (($doneit == 2) && ($huts > 18)){ $huts = 16; }
		else if (($doneit == 3) && ($huts > 15)){ $huts = 15; }
		else if (($doneit == 4) && ($huts > 14)){ $huts = 14; }

		$huts = $huts + 1;

			if ($huts == 1){$hutname = "Tavern";}
			else if ($huts == 2){$hutname = "Inn";}
			else if ($huts == 3){$hutname = "Provisioner";}
			else if ($huts == 4){$hutname = "Blacksmith";}
			else if ($huts == 5){$hutname = "Bowyer";}
			else if ($huts == 6){$hutname = "Leatherworker";}
			else if ($huts == 7){$hutname = "Tailor";}
			else if ($huts == 8){$hutname = "Stables";}
			else if ($huts == 9){$hutname = "Carpenter";}
			else if ($huts == 10){$hutname = "Alchemist";}
			else if ($huts == 11){$hutname = "Baker";}
			else if ($huts == 12){$hutname = "Library";}
			else if ($huts == 13){$hutname = "Jeweler";}
			else if ($huts == 14){$hutname = "Music";}
			else if ($huts == 15){$hutname = "Church";}
			else if ($huts == 16){$hutname = "Guardhouse";}
			else if ($huts == 17){$hutname = "Warriors Guild";}
			else if ($huts == 18){$hutname = "Wizards Guild";}
			else if ($huts == 19){$hutname = "Rogues Guild";}

		$shpq = "UPDATE shop_track SET shop=$huts, type='$hutname', didit=$doneit WHERE building=$shopary[building]";
		wz_query( $connection, $shpq ); /* shpq. */

	endwhile;

$shopqry = "SELECT * FROM shop_track WHERE shop>0 AND didit=$doneit AND shop!=99 ORDER BY building";
$shopres = wz_query( $connection, $shopqry ); /* shopqry. */

while ($shopary=wz_fetch_assoc($shopres)) :

	if ($shopary[shop] == 1){$owned = "Bartender";}
	else if ($shopary[shop] == 2){$owned = "Inn Keeper";}
	else if ($shopary[shop] == 3){$owned = "Merchant";}
	else if ($shopary[shop] == 4){$owned = "Blacksmith";}
	else if ($shopary[shop] == 5){$owned = "Fletcher"; if (mt_rand(1,2) == 1){$owned = "Bowyer";} }
	else if ($shopary[shop] == 6){$owned = "Tanner"; if (mt_rand(1,2) == 1){$owned = "Leatherworker";} }
	else if ($shopary[shop] == 7){$owned = "Tailor"; if (mt_rand(1,2) == 1){$owned = "Dressmaker";} }
	else if ($shopary[shop] == 8){$owned = "Animal Trainer"; if (mt_rand(1,2) == 1){$owned = "Stable Master";} }
	else if ($shopary[shop] == 9){$owned = "Woodworker"; if (mt_rand(1,2) == 1){$owned = "Carpenter";} }
	else if ($shopary[shop] == 10){$owned = "Alchemist"; if (mt_rand(1,2) == 1){$owned = "Herbalist";} }
	else if ($shopary[shop] == 11){$owned = "Cook"; if (mt_rand(1,2) == 1){$owned = "Baker";} }
	else if ($shopary[shop] == 12){$owned = "Librarian";}
	else if ($shopary[shop] == 13){$owned = "Jeweler";}
	else if ($shopary[shop] == 14){$owned = "Musician";}
	else {$owned = "Caretaker";}

	$business = GFTBusiness($shopary[shop],$game,$stock,$jack,$oldway,$showcase1,$showcase2,$water,$columns,$shelf);

	$shopuqry = "UPDATE shop_track SET shop=99 WHERE building=$shopary[building]";
	wz_query( $connection, $shopuqry ); /* shopuqry. */
?>

<hr><b><i><font size="3"><?php echo $shopary[building]; ?></font></i></b><font size="2">&nbsp;-&nbsp;<b><?php echo $business[0]; ?></b>&nbsp;
	<?php	if ($owned != "Caretaker"){echo " [" . number_format(mt_rand(50,3000)) . "gp] ";}
			else {echo " [" . $shopary[type] . "] ";}

			echo "<b>" . $owned . ":</b> " . $shopary[info];

			echo "<hr color='#C0C0C0' size='1'>";
			if ($shopary[shop] == 16)
			{
				$guards = mt_rand(2,5);
				$line_up = $guards;
				while ($guards > 0) :
					if ($guards != $line_up){echo "<hr color='#C0C0C0' size='1'>";}
						echo "<font size='2'><b>GUARD:</b>  <i>[Level " . GameLvlChar($game,1) . " Warrior]</i> "; 
							$emp_kindred = GFTRace($x_races);
							$emp_gender = "Male"; if (mt_rand(1,2) == 1){$emp_gender = "Female";}
							$emp_citizen = GFTCitizen($emp_kindred,adult,$emp_gender);
							$equipment = GFTequipCitizen(guard); 
						echo $emp_citizen[2] . " <b>ARMS&nbsp;&amp;&nbsp;ARMOR:</b> " . strtolower(getWeapon(giant)) . ", " . $equipment[0] . ", " . $equipment[1] . "</font>";
					$guards = $guards - 1;
				endwhile;
			}
			else if ($shopary[shop] > 16)
			{
				$guildy = mt_rand(2,5);
				$line_up = $guildy;
				$guild_leader = 0;
				while ($guildy > 0) :
					if ($shopary[shop] == 17){$guild_class = "warrior"; $guild_title = "WARRIORS GUILD MEMBER"; $equipment = GFTequipCitizen(warrior); $weaponsize = "giant";}
					else if ($shopary[shop] == 18){$guild_class = "wizard"; $guild_title = "WIZARDS GUILD MEMBER"; $equipment = GFTequipCitizen(wizard); $weaponsize = "small";}
					else {$guild_class = "rogue"; $guild_title = "ROGUES GUILD MEMBER"; $equipment = GFTequipCitizen(rogue); $weaponsize = "medium";}
					$guild_job = $guild_class;
					$guild_does = 0;
					$guild_level = GameLvlChar($game,2);

					if ($guild_leader == 0)
					{
						$guild_does = 1;
						$guild_leader = 1;
						$guild_title = substr($guild_title, 0, -7) . " LEADER";
						$guild_job = "leader_" . $guild_job;
						$guild_level = GameLvlChar($game,4);
					}

					$emp_kindred = GFTRace($x_races);
					$emp_gender = "Male"; if (mt_rand(1,2) == 1){$emp_gender = "Female";}
					$emp_citizen = GFTCitizen($emp_kindred,adult,$emp_gender);

					if ($guildy != $line_up){echo "<hr color='#C0C0C0' size='1'>";}
						echo "<font size='2'><b>" . $guild_title . ":</b>  <i>[Level " . $guild_level . " " . ucwords($guild_class). "]</i> "; 
						echo $emp_citizen[2] . " <b>ARMS&nbsp;&amp;&nbsp;ARMOR:</b> " . strtolower(getWeapon($weaponsize)) . ", " . $equipment[0] . ", " . $equipment[1] . "</font>";
					$guildy = $guildy - 1;

				endwhile;
			}
			else if ($shopary[shop] == 15)
			{
				$guildy = mt_rand(2,5);
				$line_up = $guildy;
				$guild_leader = 0;
				while ($guildy > 0) :

					$guild_title = "CHURCH PRIEST";
					$guild_job = "priest";
					$guild_level = GameLvlChar($game,2);

					if ($guild_leader == 0)
					{
						$guild_leader = 1;
						$guild_title = "CHURCH LEADER";
						$guild_job = "leader_priest";
						$guild_level = GameLvlChar($game,4);
					}

					$emp_kindred = GFTRace($x_races);
					$emp_gender = "Male"; if (mt_rand(1,2) == 1){$emp_gender = "Female";}
					$emp_citizen = GFTCitizen($emp_kindred,adult,$emp_gender);
					$equipment = GFTequipCitizen(priest);

					if ($guildy != $line_up){echo "<hr color='#C0C0C0' size='1'>";}
						echo "<font size='2'><b>" . $guild_title . ":</b>  <i>[Level " . $guild_level . " Priest]</i> "; 
						echo $emp_citizen[2] . " <b>ARMS&nbsp;&amp;&nbsp;ARMOR:</b> " . strtolower(getWeapon(small)) . ", " . $equipment[0] . ", " . $equipment[1] . "</font>";

					$guildy = $guildy - 1;

					if ($guild_title == "CHURCH LEADER")
					{
						echo "<hr color='#C0C0C0' size='1'><font size='2'>The church will cast spells if a donation is made to the church. They will cast <i>Healing</i> for 50gp, <i>Cure</i> for 100gp, <i>Remove Curse</i> or 600gp, or <i>Resurrection</i> for 1,000gp.</font><br>";
					}

				endwhile;
			}
			else {echo $business[1];}

	?></font>

<?php endwhile; $economy = $economy - 1; endwhile; ?>
