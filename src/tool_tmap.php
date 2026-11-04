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

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Random Treasure Maps</p>";
	echo "<p style='text-align: justify;'>";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_game'>";
	?>
		Here you can generate some treasure maps for your fantasy role-playing game. These are not actual &quot;picture&quot; maps, but the descriptions of the maps for use in your treasure. 
		They will be ranked from I to XX, depending on the level of the map. The higher the level map, the more treasure there may be. It is up to the Game Master to decide what details to give about 
		the discovered map. The maps will have a short legend of the map, what the map is written on, where it can be found, any protection of the treasure, and what is told to be inside the treasure. 
		You may also have a false map, or a map to a treasure that has already been ransacked.

		<br>

		<div id="div_table">
			<div class="row">
				<span class="cell">Quantity:</span>
				<span class="cell"><select size="1" id="DropOption" name="amount"><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cell">Level:</span>
			<?php if ($x_game == "Swords & Six-Siders"){ ?>
				<span class="cell"><select size="1" id="DropOption" name="level"><?php $runner=6; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?><option>Random</option></select></span>
			<?php } else { ?>
				<span class="cell"><select size="1" id="DropOption" name="level"><?php $runner=20; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?><option>Random</option></select></span>
			<?php } ?>
			</div>
		<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cell">Weapons/Armor:</span>
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
<?php if ( ($x_game == "OSRIC") || ($x_game == "Swords & Six-Siders") || ($x_game == "BFRPG") || ($x_game == "AD&D") || ($x_game == "BD&D") || ($x_game == "Labyrinth Lord") || ($x_game == "Swords & Wizardry") ){ ?>
			<div class="row">
				<span class="cull">Magic Items:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_whichmagic"><option>50</option><?php $runner=101; $running=0; while ($runner > 0) : echo "<option>" . $running . "</option>"; $runner = $runner-1; $running = $running+1; endwhile; ?></select> % from the Game &amp; the remaining created by Wizardawn</span>
			</div>
<?php } ?>
		<?php if ($x_game == "Data") { ?>
			<div class="row">
				<span class="cell">Data:</span>
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

$process_1 = 1;
$process_3 = 1;
$process_4 = 1;

$x_oldway = $_POST['x_oldway']; // USED FOR T&T CLASSIC WEAPONS/ARMOR...OR THE SIMPLE WEAPONS/ARMOR
	if ($x_oldway == 1){ $_SESSION['tt_easy_items'] = 1; } else { unset($_SESSION['tt_easy_items']); }

$x_package = $_POST['x_game'];
$x_whichmagic = $_POST['x_whichmagic'];
$x_cut = mt_rand(25,50);

$ua = $_SESSION["SESSION_ADD_UA"] = $_POST['ua']+0;
$aec = $_SESSION["SESSION_ADD_AEC"] = $_POST['aec']+0;

$mapqty = $_POST['amount'];
$level = $_POST['level'];
   $randum = $level;

if ($x_package == "OSRIC"){
	$bottom_notices = 1;
	$db_lister = 1;
}
else if ($x_package == "Labyrinth Lord"){
	$bottom_notices = 2;
	$db_lister = 1;
}
else if ($x_package == "Swords & Wizardry"){
	$bottom_notices = 5;
	$db_lister = 1;
}
else if ($x_package == "Swords & Six-Siders"){
	$bottom_notices = 18;
	$db_lister = 1;
	$x_cut = ceil($x_cut/5);
}
else if ($x_package == "BFRPG"){
	$bottom_notices = 11;
	$db_lister = 1;
}
else if ($x_package == "BD&D" || $x_package == "AD&D"){
	$bottom_notices = 13;
	$db_lister = 1;
}
else if (($x_package == "Tunnels & Trolls 5th Edition") || ($x_package == "Tunnels & Trolls 7th Edition") || ($x_package == "Tunnels & Trolls Deluxe")){
	$bottom_notices = 7;
	$db_lister = 1;
}
else {$x_datas = $_POST['x_data'];}

include("functions/data_process.php");

?>

<p style="margin-top: 0; margin-bottom: 0" align="center"><img border="0" src="pics_tools/tools_tmaps.jpg"></p><hr>

<?php
    while ($mapqty > 0) :

	if ($randum == "Random"){$level = mt_rand(1,20);}

	$tmap_level = $level;
	echo mapMaker($level,$x_package);
	$tmap_code = "";
	$whereisit = 3;
	$g_loot = 0;
	$filler = $level + mt_rand(2,10);
	$filled = "";
	$bags_of_coins = 0;

	while ($filler > 0):

		if ($db_lister == 1)
		{
			if ($bags_of_coins > 0){$ghrz = 91;} else {$ghrz = 1;}
			$my_reward = mt_rand($ghrz,100);
			if ($my_reward < 91){$dynamic_loot = currencyBuilder(mt_rand(1,20),mt_rand(1,3),0,$x_cut,1,$x_package);	$bags_of_coins = 1;}
			else if ($my_reward < 96){$dynamic_loot = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator($x_cut));}
			else if ($my_reward < 98){$dynamic_loot = "JEWELRY:&nbsp;" . ucwords(jewelCreator($x_cut));}
			else
			{
				if (($x_package == "Tunnels & Trolls 5th Edition") || ($x_package == "Tunnels & Trolls 7th Edition") || ($x_package == "Tunnels & Trolls Deluxe")){ $dynamic_loot = makeMagicItem(mt_rand(1,20),mt_rand(1,3),0,$x_package,0,$x_cut); }
				else if ($x_whichmagic >= mt_rand(1,100)) { $dynamic_loot = makeRPGmagic($x_package,0); }
				else { $dynamic_loot = makeMagicItem(mt_rand(1,20),mt_rand(1,3),0,$x_package,0,$x_cut); }
			}
				$treasure_item = $dynamic_loot;
		}
		else
		{
			$qry5 = "SELECT * FROM $gable_treasure WHERE treasure!='' AND mylist=0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
			$res5 = wz_query( $connection, $qry5 ); /*qry5*/
			$ary5 = wz_fetch_assoc($res5);
			$g_loot = wz_num_rows($res5);

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

		$thisone = $treasure_item;

		if ($filler == 1){$filled = $filled . "" . $thisone;}
		else {$filled = $filled . "" . $thisone . "&nbsp;-&nbsp;-&nbsp;-&nbsp;-&nbsp;- ";}

		$filler = $filler - 1;

	endwhile;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if (($level+50) >= mt_rand(1,100))
	{
		if ($db_lister == 1)
		{
			$picked_trap = trapMaker($level,box,$x_package,0,0);
			$rigged = "&nbsp;-&nbsp;TRAPPED: " . $picked_trap[0] . "]"; $uhoh = 1;
		}
		else
		{
			$rigged = "&nbsp;-&nbsp;TRAPPED: " . $my_traps_array[mt_rand(0,$my_traps_max)] . "]"; $uhoh = 1;
		}
	}
	else
	{
		$rigged = "]";
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if ($db_lister == 1)
	{
		echo "TREASURE&nbsp;:&nbsp;[" . boxMakerRoom() . "" . $rigged . ":&nbsp;" . stripslashes($filled);
	}
	else
	{
		echo "TREASURE&nbsp;:&nbsp;[" . $my_boxes_array[mt_rand(0,$my_boxes_max)] . "" . $rigged . ":&nbsp;" . stripslashes($filled);
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if ($g_loot > 0){} else {$filled = "&nbsp; Unknown Treasure.";}

	echo "</font><hr>";

	$mapqty = $mapqty - 1;

    endwhile;

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>