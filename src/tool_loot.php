<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
	if ($_SESSION["SESSION_SECTION"] == "DATA"){$menu_on_left = "menus/menu_data.php";}
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Labyrinth Lord";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' target='_blank' method='POST' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Random Treasure</p>";
	echo "<p style='text-align: justify;'>This is the place to create yourself a table of random treasure for your game. This will mix up all of your treasure to give you a random list of various goods one may find during their adventure. Simply choose a quantity of how many sets of treasure you want to generate. Then select the minimum/maximum treasure that will appear in each set. If you want the treasure to appear in a list form (one right under the other), check the 'list' box. Otherwise, the treasure will be listed in a line with a few spaces separating each one.";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_package'>";
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cull">Quantity:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_amount"><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cull">List:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_list" value="1"></span>
			</div>
<?php if (($x_game == "Mutant Future") || ($x_game == "Broken Urthe") || ($x_game == "Gamma World")){ ?>
			<div class="row">
				<span class="cull">Condition Items:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_cond" value="1"></span>
			</div>
<?php } ?>
<?php if ($x_game != "Data") { ?>
			<div class="row">
				<span class="cull">Type:</span>
				<span class="cell">
					<select size="1" id="DropOption" name="x_type">
					<option value="0">Valuables &amp; Relics</option>
					<option value="2">Valuables</option>
					<option value="1">Relics</option>
					</select>
				</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cull">Minimum:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_min"><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cull">Maximum:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_max"><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cull">Weapons/Armor:</span>
				<span class="cell"><input type="radio" value="0" checked id="InputOption" name="x_oldway">Use T&amp;T Items...or...<input type="radio" value="1" id="InputOption" name="x_oldway">Use Magestykc Items</span>
			</div>
<?php } ?>
<?php if ($x_game == "AD&D"){ ?>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="ua" value="1">&nbsp;&nbsp;Include Unearthed Arcana</span>
			</div>
<?php } ?>
<?php if ($x_game == "Labyrinth Lord"){ ?>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="aec" value="1">&nbsp;&nbsp;Include AEC</span>
			</div>
<?php } ?>
<?php if (($x_game != "Tunnels & Trolls 5th Edition") && ($x_game != "Tunnels & Trolls 7th Edition") && ($x_game != "Tunnels & Trolls Deluxe") && ($x_game != "Data") && ($x_game != "Broken Urthe") && ($x_game != "Metamorphosis Alpha") && ($x_game != "Mutant Future") && ($x_game != "Gamma World")){ ?>
			<div class="row">
				<span class="cull">Magic Items:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_whichmagic"><option>50</option><?php $runner=101; $running=0; while ($runner > 0) : echo "<option>" . $running . "</option>"; $runner = $runner-1; $running = $running+1; endwhile; ?></select> % from the Game &amp; the remaining created by Wizardawn</span>
			</div>
<?php } ?>
<?php if ($x_game == "Data") { ?>
			<div class="row">
				<span class="cull">Data:</span>
				<span class="cell"><textarea rows="4" id="InputOption" name="x_data" cols="90"></textarea></span>
			</div>
<?php } ?>
		</div>
		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create">

<?php if ($x_game == "Data") { ?>
		<br></p><p style='text-align: justify;'>Just copy and paste from your data file into the DATA section. This information is used to create the enemies...dependent on the game system you play.
<?php } ?>

		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

$process_4 = 1;

$picuse = "tools_loot.jpg";

$x_oldway = $_POST['x_oldway']; // USED FOR T&T CLASSIC WEAPONS/ARMOR...OR THE SIMPLE WEAPONS/ARMOR
	if ($x_oldway == 1){ $_SESSION['tt_easy_items'] = 1; } else { unset($_SESSION['tt_easy_items']); }

$ua = $_SESSION["SESSION_ADD_UA"] = $_POST['ua']+0;
$aec = $_SESSION["SESSION_ADD_AEC"] = $_POST['aec']+0;

$x_package = $_POST['x_package'];
$x_whichmagic = $_POST['x_whichmagic'];
$v_tech = 0;
$x_cond = $_POST['x_cond'];
	if ($x_cond > 0){$x_cond = 0;} else {$x_cond = 1;}
$x_amount = $_POST['x_amount'];
$x_min = $_POST['x_min'];
$x_max = $_POST['x_max'];
	if ($x_min > $x_max){$x_min=$x_max;}
$x_type = $_POST['x_type'];
$x_list = $_POST['x_list'];
  if ($x_list > 0){$sepr = "<br>";}
  else {$sepr = "&nbsp;&nbsp;---&nbsp; ";}

if ($x_package == "OSRIC"){ $bottom_notices = 1; }
else if ($x_package == "Labyrinth Lord"){ $bottom_notices = 2; }
else if ($x_package == "Mutant Future"){
	$bottom_notices = 3;
	$x_money = "gp";
	$x_mappack = "Ruined City";
	$picuse = "tools_bomb_shelter_treasure_hoards.jpg";
}
else if ($x_package == "Swords & Wizardry"){ $bottom_notices = 5; }
else if ($x_package == "Swords & Six-Siders"){ $bottom_notices = 18; }
else if ($x_package == "BFRPG"){ $bottom_notices = 11; }
else if ($x_package == "BD&D" || $x_package == "AD&D"){ $bottom_notices = 13; }
else if (($x_package == "Tunnels & Trolls 5th Edition") || ($x_package == "Tunnels & Trolls 7th Edition") || ($x_package == "Tunnels & Trolls Deluxe")){ $bottom_notices = 7; }
else if ($x_package == "Broken Urthe"){
	$bottom_notices = 8;
	$x_money = "xm";
	$x_mappack = "Ruined City";
	$picuse = "tools_bomb_shelter_treasure_hoards.jpg";
}
else if ($x_package == "Gamma World"){
	$bottom_notices = 16;
	$x_money = "domars";
	$x_mappack = "Ruined City";
	$picuse = "tools_bomb_shelter_treasure_hoards.jpg";
}
else if ($x_package == "Metamorphosis Alpha"){
	$bottom_notices = 17;
	$v_tech = 1;
	$x_money = "domars";
	$x_mappack = "Spaceship";
	$picuse = "tools_bomb_shelter_treasure_hoards.jpg";
}
else {$x_datas = $_POST['x_data'];}

include("functions/data_process.php");

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	echo "<img border='0' src='pics_tools/" . $picuse . "'>";

	echo "<hr size='1' color='#000000'>";

	echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";

	while ($x_amount > 0) :

		$x_line = $x_line + 1;

		echo "<tr><td width='42' valign='top' style='border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px' align='center'><font size='2'>";
		echo $x_line . "&nbsp;&nbsp;";
		echo "</font></td><td style='border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px'><font size='2'>";

			$loot_mash = mt_rand($x_min,$x_max);
			$filled = "";
			$bags_of_coins = 0;

			while ($loot_mash > 0) :

				$loot_nums = 1;

				if (($x_package == "Tunnels & Trolls 5th Edition") || ($x_package == "Tunnels & Trolls 7th Edition") || ($x_package == "Tunnels & Trolls Deluxe"))
				{
					if ($x_type == 1)
					{
						$my_reward = 100;
					}
					else if ($x_type == 2)
					{
						$my_reward = mt_rand(70,91);
					}
					else
					{
						if ($bags_of_coins > 0){$ghrz = 51;} else {$ghrz = 1;}
						$my_reward = mt_rand($ghrz,100);
					}
					if ($my_reward < 51){$dynamic_loot = currencyBuilder(mt_rand(1,20),mt_rand(1,3),0,mt_rand(25,75),1,$x_package); $bags_of_coins = 1;}
					else if ($my_reward < 86){$dynamic_loot = otherThanCoins(mt_rand(1,3),mt_rand(25,75),$x_package,1,mt_rand(1,20));}
					else if ($my_reward < 90){$dynamic_loot = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator(mt_rand(25,75)));}
					else if ($my_reward < 92){$dynamic_loot = "JEWELRY:&nbsp;" . ucwords(jewelCreator(mt_rand(25,75)));}
					else {$dynamic_loot = makeMagicItem(mt_rand(1,20),mt_rand(1,3),0,$x_package,0,mt_rand(25,75));}
						$treasure_item = $dynamic_loot;
				}
				else if (($x_package == "Broken Urthe") || ($x_package == "Metamorphosis Alpha") || ($x_package == "Mutant Future") || ($x_package == "Gamma World"))
				{
					if ($x_type == 1)
					{
						$my_reward = 100;
					}
					else if ($x_type == 2)
					{
						$my_reward = mt_rand(25,84);
					}
					else
					{
						if ($bags_of_coins > 0){$ghrz = 50;} else {$ghrz = 1;}
						$my_reward = mt_rand($ghrz,100);
					}

					if ($my_reward < 50){$dynamic_loot = PAcurrencyBuilder(mt_rand(1,20),mt_rand(1,3),0,mt_rand(25,75),1,$x_money,$x_mappack);	$bags_of_coins = 1;}
					else if ($my_reward < 85){$dynamic_loot  = ucfirst(PAmakeNormalItem(1,1,$x_money,$v_tech,$x_package));}
					else
					{
						if ($x_package == "Metamorphosis Alpha"){$dynamic_loot = makeMAItem(mt_rand(1,20),mt_rand(1,3));}
						else if ($x_package == "Gamma World"){$dynamic_loot = makeGWItem($treasure_level,$loot_size);}
						else if ($x_package != "Broken Urthe"){$dynamic_loot = makePAItem(mt_rand(1,20),mt_rand(1,3),$x_cond);}
						else {$dynamic_loot = makeBUItem(mt_rand(1,20),mt_rand(1,3),$x_cond);}
					}
					$treasure_item = $dynamic_loot;
				}
				else if (($x_package == "Swords & Six-Siders") || ($x_package == "Swords & Wizardry") || ($x_package == "AD&D") || ($x_package == "BD&D") || ($x_package == "BFRPG") || ($x_package == "Labyrinth Lord") || ($x_package == "OSRIC"))
				{
					$cutup = mt_rand(25,75);
					if ($x_package == "Swords & Six-Siders"){ $cutup = mt_rand(5,10); }

					if ($x_type == 1)
					{
						$my_reward = 100;
					}
					else if ($x_type == 2)
					{
						$my_reward = mt_rand(70,91);
					}
					else
					{
						if ($bags_of_coins > 0){$ghrz = 51;} else {$ghrz = 1;}
						$my_reward = mt_rand($ghrz,100);
					}
					if ($my_reward < 51){$dynamic_loot = currencyBuilder(mt_rand(1,20),mt_rand(1,3),0,$cutup,1,$x_package); $bags_of_coins = 1;}
					else if ($my_reward < 86){$dynamic_loot = otherThanCoins(mt_rand(1,3),$cutup,$x_package,1,mt_rand(1,20));}
					else if ($my_reward < 90){$dynamic_loot = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator($cutup));}
					else if ($my_reward < 92){$dynamic_loot = "JEWELRY:&nbsp;" . ucwords(jewelCreator($cutup));}
					else
					{
						if ($x_whichmagic >= mt_rand(1,100)){ $dynamic_loot = makeRPGmagic($x_package,0); }
						else { $dynamic_loot = makeMagicItem(mt_rand(1,20),mt_rand(1,3),0,$x_package,0,mt_rand(25,75)); }
					}
					$treasure_item = $dynamic_loot;
				}
				else
				{
					$qry5 = "SELECT * FROM $gable_treasure WHERE treasure!='' AND mylist=0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
					$res5 = wz_query( $connection, $qry5 ); /*qry5*/
					$ary5 = wz_fetch_assoc($res5);

					if ($ary5[sublist] > 0){$sub_lists = 1;} else {$sub_lists = 0;}
					$treasure_item = $ary5[treasure];
					$mylisting = $ary5[sublist];

					while ($sub_lists > 0) :

						$qry5s = "SELECT * FROM $gable_treasure WHERE mylist=$mylisting ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
						$res5s = wz_query( $connection, $qry5s ); /*qry5s*/
						$ary5s = wz_fetch_assoc($res5s);

						if ($ary5s[sublist] > 0){$mylisting = $ary5s[sublist];} else {$sub_lists = 0;}

						if ($ary5s[treasure] != ""){$treasure_item = $treasure_item . ", " . $ary5s[treasure];}

					endwhile;
				}

				if ($x_list > 0){$thisone = "-&nbsp;" . ucfirst($treasure_item);} else {$thisone = ucfirst($treasure_item);}
				if ($loot_mash > 1){$filled = $filled . "" . $thisone . "" . $sepr;} else {$filled = $filled . "" . $thisone;}
				$loot_mash = $loot_mash - 1;

			endwhile;

		echo stripslashes($filled);

		echo "</font></td></tr>";

		$x_amount = $x_amount -1;

	endwhile;

	echo "</table>";

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>