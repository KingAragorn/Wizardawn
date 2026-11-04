
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">

<?php

if ($city_size > 800){$economy = 3;}
else if ($city_size > 400){$economy = 2;}
else {$economy = 1;}

while ($economy > 0) :

	$max_shops = 14;
	$max_guild = 5;

	if ($doneit == 1){ $huts = 0; $shplimit = $max_shops; }
	else if ($doneit == 2){ $huts = 17; $shplimit = $max_guild; }
	else if ($doneit == 3){ $huts = 14; $shplimit = 1; }
	else if ($doneit == 4){ $huts = 16; $shplimit = 1; }
	else if ($doneit == 5){ $huts = 15; $shplimit = 1; }

///////////////////////////////////////////////////// TIME TO BUILD ALL OF THE STORES /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$shopqry = "SELECT * FROM shop_track WHERE shop=0 AND didit=0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $shplimit";
$shopres = wz_query( $connection, $shopqry ); /* shopqry. */

	while ($shopary=wz_fetch_assoc($shopres)) :

		if (($doneit == 1) && ($huts > 13)){ $huts = 0; }
		else if (($doneit == 2) && ($huts > 21)){ $huts = 17; } // GUILDS
		else if (($doneit == 3) && ($huts > 14)){ $huts = 14; } // BANKS
		else if (($doneit == 4) && ($huts > 16)){ $huts = 16; } // GUARDS
		else if (($doneit == 5) && ($huts > 15)){ $huts = 15; } // CHURCH

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
			else if ($huts == 15){$hutname = "Bank";}
			else if ($huts == 16){$hutname = "Church";}
			else if ($huts == 17){$hutname = "Guardhouse";}
			else if ($huts == 18){$hutname = "Fighters Guild";}
			else if ($huts == 19){$hutname = "Wizards Guild";}
			else if ($huts == 20){$hutname = "Thieves Guild";}
			else if ($huts == 21){$hutname = "Rangers Guild";}
			else if ($huts == 22){$hutname = "Assassins Guild";}
			//else if ($huts == 23){$hutname = "Bards Guild";}

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
	else if ($shopary[shop] == 15){$owned = "Banker";}
	else {$owned = "Caretaker";}

	$business = wizardBusiness($shopary[shop],$game,$stock,$jack,$columns,$shelf);

	$shopuqry = "UPDATE shop_track SET shop=99 WHERE building=$shopary[building]";
	wz_query( $connection, $shopuqry ); /* shopuqry. */
?>

<hr><b><i><font size="3"><?php echo $shopary[building]; ?></font></i></b><font size="2">&nbsp;-&nbsp;<b><?php echo $business[0]; ?></b>&nbsp;
	<?php	if ($owned != "Caretaker"){echo " [" . number_format(mt_rand(50,3000)) . "gp] ";}
			else {echo " [" . $shopary[type] . "] ";}
			//if ($empty > 0){ echo "<b>" . $owned . ":</b> " . $shopary[owner] . " " . $shopary[stats];} else {echo "<b>" . $owned . ":</b> " . $shopary[info]; }
			echo "<b>" . $owned . ":</b> " . $shopary[info];

			echo "<hr color='#C0C0C0' size='1'>";
			if ($owned == "Banker")
			{
				$bank_line = 0;
				$bankboxes = "";
				$boxes = mt_rand(2,10); $line_up = $boxes;
				while ($boxes > 0) :
					$bank_line = $bank_line + 1;
					$bank_limits = mt_rand(2,10);
					if ($boxes != $line_up){$bankboxes = $bankboxes . "<br>";}
					$bankboxes = $bankboxes . "<b>IRON CHEST #" . $bank_line . ":</b> ";
					while ($bank_limits > 0) :
						$my_reward = mt_rand(1,100);
						if ($my_reward > 55){$my_prize = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator(mt_rand(10,100)));}
						else if ($my_reward > 10){$my_prize = "JEWELRY:&nbsp;" . ucwords(jewelCreator(mt_rand(10,100)));}
						else {$my_prize = OsricMagicItem('',0,'',0,0); $my_prize = $my_prize[0]; }
							$bankboxes = $bankboxes . $my_prize . "&nbsp;---&nbsp;";
						$bank_limits = $bank_limits - 1;
					endwhile;
					$boxes = $boxes - 1;
					$bankboxes = $bankboxes . currencyBuilder(mt_rand(1,20),3,0,100,1,$game);
				endwhile;
				echo $bankboxes;
				$guards = mt_rand(1,3);
				while ($guards > 0) :
					if ($xracep >= mt_rand(1,100)){$racy = $xrace;} else {$racy = "none";}
					$dude = makeAdventurer(Fighter,$racy,0,$x_lvl1,$x_lvl2,0,0);
					$adv_list_tp = 1;
						echo "<hr color='#C0C0C0' size='1'><font size='2'><b>BANK GUARD:</b> "; 
							include("functions/stat_adventurer.php");
						echo "</font>";
					$guards = $guards - 1;
				endwhile;
			}
			else if ($shopary[shop] == 17)
			{
				$guards = mt_rand(2,5); $line_up = $guards;
				while ($guards > 0) :
					if ($xracep >= mt_rand(1,100)){$racy = $xrace;} else {$racy = "none";}
					$dude = makeAdventurer(Fighter,$racy,0,$x_lvl1,$x_lvl2,0,0);
					$adv_list_tp = 1;
					if ($guards != $line_up){echo "<hr color='#C0C0C0' size='1'>";}
						echo "<font size='2'><b>GUARD:</b> "; 
							include("functions/stat_adventurer.php");
						echo "</font>";
					$guards = $guards - 1;
				endwhile;
			}
			else if ($shopary[shop] > 17)
			{
				$guildy = mt_rand(2,5); $line_up = $guildy;
				$guild_leader = 0;
				while ($guildy > 0) :
					if ($shopary[shop] == 18){$guild_class = "Fighter"; if (mt_rand(1,4) == 1){$guild_class = "Paladin";} $guild_title = "FIGHTERS GUILD MEMBER"; }
					else if ($shopary[shop] == 19){$guild_class = "Magic-User"; if (mt_rand(1,3) == 1){$guild_class = "Illusionist";} $guild_title = "WIZARDS GUILD MEMBER";}
					else if ($shopary[shop] == 20){$guild_class = "Thief"; $guild_title = "THIEVES GUILD MEMBER";}
					else if ($shopary[shop] == 21){$guild_class = "Ranger"; if (mt_rand(1,4) == 1){$guild_class = "Druid";} $guild_title = "RANGERS GUILD MEMBER";}
					else if ($shopary[shop] == 22){$guild_class = "Assassin"; $guild_title = "ASSASSINS GUILD MEMBER";}
					else if ($shopary[shop] == 23){$guild_class = "Bard"; $guild_title = "BARDS GUILD MEMBER";}

					if ($xracep >= mt_rand(1,100)){$racy = $xrace;} else {$racy = "none";}
					if ($guild_leader == 0){$dude = makeAdventurer($guild_class,$racy,0,$x_lvl2,$x_lvl2,1,0); $guild_leader = 1; $guild_title = substr($guild_title, 0, -7) . " LEADER";}
					else {$dude = makeAdventurer($guild_class,$racy,0,$x_lvl1,$x_lvl2,1,0); }
					$adv_list_tp = 1;
					if ($guildy != $line_up){echo "<hr color='#C0C0C0' size='1'>";}
						echo "<font size='2'><b>" . $guild_title . ":</b> "; 
							include("functions/stat_adventurer.php");
						echo "</font>";
					$guildy = $guildy - 1;
				endwhile;
			}
			else if ($shopary[shop] == 16)
			{
				echo $business[1];
				$guildy = mt_rand(2,5);
				$guild_leader = 0;
				while ($guildy > 0) :
					$guild_class = "Cleric"; if (mt_rand(1,3) == 1){$guild_class = "Paladin";}
					if ($xracep >= mt_rand(1,100)){$racy = $xrace;} else {$racy = "none";}
					if ($guild_leader == 0){$guild_class = "Cleric"; $dude = makeAdventurer($guild_class,$racy,0,$x_lvl2,$x_lvl2,1,0); $guild_leader = 1; $guild_title = "CHURCH LEADER";}
					else {$dude = makeAdventurer($guild_class,$racy,0,$x_lvl1,$x_lvl2,1,0); $guild_title = "CHURCH MEMBER";}
					$adv_list_tp = 1;
						echo "<hr color='#C0C0C0' size='1'><font size='2'><b>" . $guild_title . ":</b> "; 
							include("functions/stat_adventurer.php");
						echo "</font>";
					$guildy = $guildy - 1;
					if ($guild_title == "CHURCH LEADER"){$priests = wizardBusiness(99,$game,$p_level,$jack,$columns,0); echo "<hr color='#C0C0C0' size='1'><b><font size='2'><u>The Church Leader Provides These Services</u></b></font><br>" . $priests[1];}
				endwhile;
			}
			else {echo $business[1];}

	?></font>

<?php endwhile; $economy = $economy - 1; endwhile; ?>
