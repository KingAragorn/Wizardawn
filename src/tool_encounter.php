<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Labyrinth Lord";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	include("game_options.php");

	$rowpic = 5;

	if ($x_game == "OSRIC")
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE (creator='OSRIC' OR creator='MoM') ORDER BY name";
		$lifes = "hit points";
		$loot = "Treasure";
	}
	else if ($x_game == "Labyrinth Lord")
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE (creator LIKE 'AEC%' OR creator LIKE 'LL%') ORDER BY name";
		$lifes = "hit points";
		$loot = "Treasure";
	}
	else if ($x_game == "Swords & Wizardry")
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='SW' ORDER BY name";
		$lifes = "hit points";
		$loot = "Treasure";
	}
	else if ($x_game == "BFRPG")
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='BFRPG' ORDER BY name";
		$lifes = "hit points";
		$loot = "Treasure";
	}
	else if ($x_game == "Swords & Six-Siders")
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='SX' ORDER BY name";
		$lifes = "hit points";
		$loot = "Treasure";
	}
	else if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='TT' ORDER BY name";
		$rowpic = 7;
		$lifes = "appropriate monsters";
		$loot = "Treasure";
	}
	else if ($x_game == "Mutant Future")
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE CREATOR='MF' ORDER BY name";
		$cash = "gold";
		$lifes = "hit points";
		$pagame = 1;
		$rowpic = 6;
		$lifes = "hit points";
		$loot = "Loot";
	}
	else if ($x_game == "Broken Urthe")
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='BU' AND type!='R' ORDER BY name";
		$qry2 = "SELECT * FROM monsters_rpgs WHERE creator='BU' AND type='R' ORDER BY name";
		$res3 = wz_query( $connection, $qry2 ); /*qry2*/
		$res4 = wz_query( $connection, $qry2 ); /*qry2*/
		$hdc = 8;
		$cash = "xormite";
		$lifes = "life points";
		$hdu = "Life";
		$pagame = 1;
		$rowpic = 8;
		$lifes = "stamina";
		$loot = "Loot";
	}
	else if ($x_game == "Gamma World")
	{
		$credits = " This tool uses creatures converted from the Wizardawn role-playing game, Broken Urthe.";
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='BU' AND type!='R' ORDER BY name";
		$qry2 = "SELECT * FROM monsters_rpgs WHERE creator='BU' AND type='R' ORDER BY name";
		$res3 = wz_query( $connection, $qry2 ); /*qry2*/
		$res4 = wz_query( $connection, $qry2 ); /*qry2*/
		$hdc = 6;
		$cash = "domars";
		$pagame = 1;
		$rowpic = 8;
		$lifes = "hit points";
		$loot = "Loot";
	}
	else if ($x_game == "Metamorphosis Alpha")
	{
		$credits = " This tool uses creatures converted from the Wizardawn role-playing game, Broken Urthe.";
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='BU' AND type!='R' ORDER BY name";
		$qry2 = "SELECT * FROM monsters_rpgs WHERE creator='BU' AND type='R' ORDER BY name";
		$res3 = wz_query( $connection, $qry2 ); /*qry2*/
		$res4 = wz_query( $connection, $qry2 ); /*qry2*/
		$hdc = 6;
		$cash = "domars";
		$lifes = "hit points";
		$pagame = 1;
		$rowpic = 8;
		$loot = "Loot";
	}
	else if ($x_game == "BD&D")
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='BX' ORDER BY name";
		$lifes = "hit points";
		$loot = "Treasure";
	}
	else if ($x_game == "AD&D")
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE creator LIKE 'SRC%' ORDER BY name";
		$lifes = "hit points";
		$loot = "Treasure";
	}
	else
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='WIZ' ORDER BY name";
		$source = "There are about 500 creatures from lore, myth, and legend.";
		$loot = "Treasure";
	}

	if ($qry != "")
	{
		$res1 = wz_query( $connection, $qry ); /*qry*/
		$res2 = wz_query( $connection, $qry ); /*qry*/
	}

	echo "<form style='margin-bottom:0; margin-top:0;' target='_blank' method='POST' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Encounter Creation</p>";
	echo "<p style='text-align: justify;'>This will create a number of encounters based off the chosen enemy and the experience of the characters facing it. You may also decided to have some random treasure appear with each encounter. Some encounters may prove easy, or difficult." . $credits;

	echo "<input type='hidden' value='" . $x_game . "' name='x_package'>";

	?>
		<br>

		<div id="div_table">
		<?php if ($pagame == 1){?>
			<div class="row">
				<span class="cull">Currency:</span>
				<span class="cell"><input type="text" value="<?php echo $cash; ?>" id="InputOption" name="x_money" size="10"></span>
			</div>
		<?php } ?>
		<?php if (($x_game != "Tunnels & Trolls 5th Edition") && ($x_game != "Tunnels & Trolls 7th Edition") && ($x_game != "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cull">Level:</span>
			<?php if ($x_game == "Swords & Six-Siders"){ ?>
				<span class="cell"><select size="1" id="DropOption" name="x_level"><option></option><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?><option value='100'>6+</option></select></span>
			<?php } else { ?>
				<span class="cell"><select size="1" id="DropOption" name="x_level"><option></option><?php $runner=19; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?><option value='100'>20+</option></select></span>
			<?php } ?>
			</div>
		<?php } ?>
		<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cull">Dice + Adds:</span>
				<span class="cell"><select size="1" id="DropOption" name="tt_dice"><?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>&nbsp;+&nbsp;<select size="1" id="DropOption" name="tt_ads"><?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cull">Difficulty:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_ttlvl">
					<option value="9">Easy</option>
					<option value="1" selected>Normal</option>
					<option value="2">Challenging</option>
					<option value="3">Difficult</option>
					<option value="4">Heroic</option>
					<option value="5">Epic</option>
				</select></span>
			</div>
		<?php } else { ?>
			<div class="row">
				<span class="cull">Characters:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_characters"><?php $runner=20; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
		<?php } ?>
			<div class="row">
				<span class="cull">Encounter:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_enemy">
					<?php while ($ary=wz_fetch_assoc($res2)) : if ($x_game == "Swords & Wizardry"){$pulnam = explode("^", $ary['name']);} else if ($x_game == "BFRPG"){$pulnam = explode("(", $ary['description']);} else {$pulnam = explode("(", $ary['name']);} ?>
							<option value="<?php echo $ary['id']; ?>"><?php echo $pulnam[0]; ?> [<?php if ($x_game == "Swords & Six-Siders"){ $sxlvl = explode(" (", $ary['al']); echo $sxlvl[0]; } else { echo $ary['difficulty']; } ?>]</option>
					<?php endwhile; ?>
					<?php if (($x_game == "Broken Urthe") || ($x_game == "Gamma World")){ while ($ary=wz_fetch_assoc($res4)) : ?>
							<option style="color: #0000FF" value="<?php echo $ary['id']; ?>"><?php echo $ary['name']; ?> [<?php echo $ary['level']; ?>]</option>
					<?php endwhile; } ?>
					</select>
				</span>
			</div>
		<?php if ($x_game == "Swords & Wizardry"){ ?>
			<div class="row">
				<span class="cull">Hit Dice:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_hit_dice"><option value="6">1d6</option><option value="8" selected>1d8</option></select></span>
			</div>
		<?php } ?>
			<div class="row">
				<span class="cull">Amount:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_amount"><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
		<?php if ($x_game == "Broken Urthe"){ ?>
			<div class="row">
				<span class="cull"><?php echo $hdu; ?> Dice:</span>
				<span class="cell"><input type="text" value="1" id="InputOption" name="x_might1" size="2" style="text-align: center"> d <input type="text" id="InputOption" name="x_might2" value="<?php echo $hdc; ?>" size="2" style="text-align: center"></span>
			</div>
		<?php } if (($x_game == "Broken Urthe") || ($x_game == "Gamma World") || ($x_game == "Metamorphosis Alpha")) { ?>
			<div class="row">
				<span class="cull">Mutants Only:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_mutants" value="1"></span>
			</div>
		<?php } ?>
			<div class="row">
				<span class="cull">Add <?php echo $loot; ?>:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_loot" value="1"></span>
			</div>
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
			<div class="row">
				<span class="cull">Money Amount:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_cut"><option><?php if ($x_game == "Swords & Six-Siders"){ echo "10"; } else { echo "100"; } ?></option><?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
		<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cull">Weapons/Armor:</span>
				<span class="cell"><input type="radio" value="0" checked id="InputOption" name="x_oldway">Use T&amp;T&trade; Weapons/Armor<br><input type="radio" value="1" id="InputOption" name="x_oldway">Use Magestykc&trade; Simple Weapons/Armor</span>
			</div>
		<?php } ?>
		<?php if ( ($x_game == "OSRIC") || ($x_game == "Swords & Six-Siders") || ($x_game == "AD&D") || ($x_game == "BD&D") || ($x_game == "BFRPG") || ($x_game == "Labyrinth Lord") || ($x_game == "Swords & Wizardry") ){ ?>
			<div class="row">
				<span class="cull">Magic Items:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_whichmagic"><option>50</option><?php $runner=101; $running=0; while ($runner > 0) : echo "<option>" . $running . "</option>"; $runner = $runner-1; $running = $running+1; endwhile; ?></select> % from the Game &amp; the remaining created by Wizardawn</span>
			</div>
		<?php } ?>
		</div>

		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create"><br><br>

		<div id="div_table">
		<?php if ($pagame == 1){?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose a CURRENCY that your world uses (quarters, bottle caps, dollars, gold, etc).*</span>
			</div>
		<?php } ?>
		<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Enter the total of DICE + ADDS for the entire group facing the encounter.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose a DIFFICULTY you want for your game. Each one raises the encounter's abilties.</span>
			</div>
		<?php } else { ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose an average LEVEL of the characters facing this encounter.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose how many CHARACTERS and followers are going to face this encounter.</span>
			</div>
		<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Select the encounter that the characters will face.</span>
			</div>
		<?php if ($x_game == "Swords & Wizardry"){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Decide on the hit dice you want for the encounters, either 1d6 or 1d8.</span>
			</div>
		<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Decide how many encounters you want to create with this opponent.</span>
			</div>
		<?php if ($x_game == "Broken Urthe"){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose the dice you use to determine health or stamina for the encounter in your game system.  Default is 1d<?php echo $hdc; ?>.*</span>
			</div>
		<?php } if (($x_game == "Metamorphosis Alpha") || ($x_game == "Broken Urthe") || ($x_game == "Gamma World")) { ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Checking the MUTANTS ONLY box will give the mutation information for the encounter, including the mutant name for it.*</span>
			</div>
		<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">You can have each encounter produce some type of <?php echo strtolower($loot); ?> by checking the ADD <?php echo strtoupper($loot); ?> box.*</span>
			</div>
<?php if ($x_game == "AD&D"){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If you are adding treasure, you can include such items from the Unearthed Arcana.</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Do you notice too much money for a 3 character group? Maybe the characters are getting a little too rich. Then you can set the MONEY AMOUNT to a lower percentage of money that appear in the loot. This also reduces the value of other items.*</span>
			</div>
		<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">For WEAPONS/ARMOR, you can choose whether to use the Tunnels &amp; Trolls weapons and armor...or the Magestykc simple armor and weapons.</span>
			</div>
		<?php } ?>
		<?php if ( ($x_game == "OSRIC") || ($x_game == "BD&D") || ($x_game == "BFRPG") || ($x_game == "Labyrinth Lord") || ($x_game == "Swords & Wizardry") ){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">For MAGIC ITEMS, you can choose to use the game's magic items...or Wizardawn's magic items.</span>
			</div>
		<?php } ?>
		</div>
		<br>*These fields are optional

		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

$ttlvl = $_POST['x_ttlvl'];
$tt_dice = $_POST['tt_dice']+0;
$tt_adds = $_POST['tt_adds']+0;
$tt_vary = 1;

$ua = $_SESSION["SESSION_ADD_UA"] = $_POST['ua']+0;
$aec = $_SESSION["SESSION_ADD_AEC"] = $_POST['aec']+0;

$x_whichmagic = $_POST['x_whichmagic'];
$x_level = $_POST['x_level']+0;
$x_cut = $_POST['x_cut']+0;
$x_characters = $_POST['x_characters']+0;
$x_oldway = $_POST['x_oldway']; // USED FOR T&T CLASSIC WEAPONS/ARMOR...OR THE SIMPLE WEAPONS/ARMOR
	if ($x_oldway == 1){ $_SESSION['tt_easy_items'] = 1; } else { unset($_SESSION['tt_easy_items']); }
$x_game = $_POST['x_package'];
$x_enemy = $_POST['x_enemy'];
$x_amount = $_POST['x_amount'];
$x_loot = $_POST['x_loot'];

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////// POST-APOCALYPTIC GAMES //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$x_mutants = $_POST['x_mutants'];
$x_money = $_POST['x_money'];
	if ($x_game == "Mutant Future"){ if (str_replace(" ", "", $x_money) == ""){$x_money = "gold";} $hdc=8;}
	else if ($x_game == "Broken Urthe"){ if (str_replace(" ", "", $x_money) == ""){$x_money = "xormite";} $hdc=8;}
	else if ($x_game == "Metamorphosis Alpha"){ if (str_replace(" ", "", $x_money) == ""){$x_money = "domars";} $hdc=6;}
	else { if (str_replace(" ", "", $x_money) == ""){$x_money = "domars";} $hdc=6;}
$x_might1 = $_POST['x_might1'];
$x_might2 = $_POST['x_might2'];
	if ($x_might1 > 0){} else {$x_might1 = 1;}
	if ($x_might2 > 0){} else {$x_might2 = $hdc;}
	if ($x_might1 > $x_might2){$x_might1 = $x_might2;}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if ($x_game == "OSRIC")
	{
		$bottom_notices = 1;
		$genre = "Fantasy";
	}
	else if ($x_game == "Swords & Wizardry")
	{
		$bottom_notices = 5;
		$genre = "Fantasy";
		$x_hit_dice = $_POST['x_hit_dice']+0;
	}
	else if ($x_game == "BFRPG")
	{
		$bottom_notices = 11;
		$genre = "Fantasy";
	}
	else if ($x_game == "Swords & Six-Siders")
	{
		$bottom_notices = 18;
		$genre = "Fantasy";
	}
	else if ($x_game == "Labyrinth Lord")
	{
		$bottom_notices = 2;
		$genre = "Fantasy";
	}
	else if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
	{
		$bottom_notices = 7;
		$x_extra = $ttlvl; // T&T USES THIS FOR DIFFICULTY LEVEL SINCE THEIR ARE NO MONSTER MANUAL CHOICES
		if ( ( ($tt_dice * 6) + $tt_adds) > 0){} else {$do_not_show_creatures = 1;} // DO NOT DO # APP IF THEY DON'T PICK THESE OPTIONS
		$genre = "Fantasy";
	}
	else if ($x_game == "Mutant Future")
	{
		$bottom_notices = 3;
		$x_mappack = "Ruined City";
		$genre = "Post-Apocalyptic";
	}
	else if (($x_game == "Broken Urthe") || ($x_game == "Gamma World"))
	{
		if ($x_game == "Broken Urthe"){$bottom_notices = 8;}
		if ($x_game == "Gamma World"){$bottom_notices = 14;}
		$take = "creator='BU'";
		$x_mappack = "Ruined City";
		$genre = "Post-Apocalyptic";
	}
	else if ($x_game == "Metamorphosis Alpha")
	{
		$bottom_notices = 15;
		$take = "creator='BU'";
		$x_mappack = "Spaceship";
		$genre = "Post-Apocalyptic";
	}
	else if ($x_game == "BD&D" && $x_game == "AD&D")
	{
		$bottom_notices = 13;
		$genre = "Fantasy";
	}
	else
	{
		$take = "creator='WIZ'";
		$genre = "Fantasy";
	}

	echo "<font size='2'>";

while ($x_amount > 0) :

	$show_detail_monster_info = 1;

	$sayit = 0;

	$x_amount = $x_amount - 1;

	if ($genre == "Fantasy") ////////////////////////////////////////////////// FANTASY //////////////////////////////////////////////////////////////////////////////////////////////
	{
		if ($topit != 1){ echo "<img border='0' src='pics_tools/tools_encounters.jpg'><br>"; $topit = 1; }	

		/// DO THE ENCOUNTER ///
		$qry = "SELECT * FROM monsters_rpgs WHERE id=$x_enemy";
		$res = wz_query( $connection, $qry ); /*qry*/
		$ary = wz_fetch_assoc($res);

		include("functions/stat_blocks.php");

		echo $monster_info . "<br>";

		if ($x_hit_dice == 0){$x_hit_dice = $tt_dice;}
		echo calculateLife($x_level,$x_characters,$ary['m_app_min'],$ary['m_app_max'],$ary['m_hp_min'],$ary['m_hp_max'],$ary['m_hp_mod'],$x_game,$my_mr_is,$x_hit_dice,$tt_adds,$tt_vary,0) . "<br>";

		/// DO THE TREASURE ///
		if ($x_loot > 0)
		{
			$treasure_level = $ary['difficulty'];
			if (mt_rand(1,100) > 70)
			{
				$tbox = "LYING ABOUT IN THE AREA IS...<br>";
			}
			else
			{
				$tbox = "LOCATED IN A " . strtoupper(boxMakerRoom()) . " IS...<br>";
			}
			$loot_size = 3;
			$loot_max = ceil($ary['difficulty']/2); if ($loot_max < 3){$loot_max = 2;} if ($loot_max > 10){$loot_max = 10;}
			$max_of_loots = mt_rand(1,$loot_max);

			while ($max_of_loots > 0) :

				if ($sayit != 1){ echo $tbox; $sayit = 1; }	
				if ($sack_of_coins > 0){$ghrz = 91;} else {$ghrz = 1;}
				$my_reward = mt_rand($ghrz,100);
				if ($my_reward < 91)
				{
					$my_prize = currencyBuilder($treasure_level,$loot_size,1,$x_cut,1,$x_game);

					if (mt_rand(1,$rarecash) == 1)
					{
						$other_coins = mt_rand(1,3);
						$other_coin = "";

						while ($other_coins > 0) :

							$other_coin = $other_coin . otherThanCoins($loot_size,$x_cut,$x_game,$other_coins,$treasure_level) . "&nbsp;...and...<br>";
							$other_coins = $other_coins - 1;

						endwhile;

						$my_prize = substr($other_coin, 0, -19);
					}
					$sack_of_coins = 1;
				}
				else if ($my_reward < 96){$my_prize = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator($x_cut));}
				else if ($my_reward < 98){$my_prize = "JEWELRY:&nbsp;" . ucwords(jewelCreator($x_cut));}
				else if (80 >= mt_rand(1,100))
				{
					if ($x_whichmagic >= mt_rand(1,100))
					{
						$my_prize = makeRPGmagic($x_game,0);
					}
					else
					{
						$my_prize = makeMagicItem($treasure_level,$loot_size,0,$x_game,$x_extra,$x_cut);
					}
				}
				else { $my_prize = makeNiceItem($loot_size,$x_cut,$x_game); }
				echo $my_prize . "<br>";

			$max_of_loots = $max_of_loots - 1;

			endwhile;
		}
	}
	else ////////////////////////////////////////////////// POST-APOCALYPTIC /////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		if ($topit != 1){ echo "<img border='0' src='pics_tools/tools_encounters_pa.jpg'><br>"; $topit = 1; }	

		/// DO THE ENCOUNTER ///
		$qry = "SELECT * FROM monsters_rpgs WHERE id=$x_enemy";
		$res = wz_query( $connection, $qry ); /*qry*/
		$ary = wz_fetch_assoc($res);

		include("functions/stat_blocks.php");

		echo $monster_info . "<br>";

		if ($x_game == "Mutant Future"){ $x_might1=$ary['m_hp_min']; $x_might2=$ary['m_hp_max']; }
		echo PAcalculateLife($x_level,$x_characters,$x_game,$ary['hd'],$ary['difficulty'],$x_might1,$x_might2,area,0) . "<br>";

		/// DO THE TREASURE ///
		if ($x_loot > 0)
		{
			$v_tech = mt_rand(0,1);		if ($x_game == "Metamorphosis Alpha"){ $v_tech = 1; }
			$v_boxt = 1;
			$treasure_level = $ary['difficulty'];
			if (mt_rand(1,100) > 70)
			{
				$tbox = "LYING ABOUT IN THE AREA IS...<br>";
			}
			else
			{
				$tbox = "LOCATED IN A " . strtoupper(PAboxMakerRoom($v_boxt)) . " IS...<br>";
			}
			$loot_size = 3;
			$loot_max = ceil($ary['difficulty']/2); if ($loot_max < 3){$loot_max = 2;} if ($loot_max > 10){$loot_max = 10;}
			$max_of_loots = mt_rand(1,$loot_max);

			while ($max_of_loots > 0) :

				if ($sayit != 1){ echo $tbox; $sayit = 1; }	
				if ($sack_of_coins > 0){$ghrz = 91;} else {$ghrz = 1;}
				$my_reward = mt_rand($ghrz,100);
				if ($my_reward < 91){$my_prize = PAcurrencyBuilder($treasure_level,$loot_size,1,$x_cut,1,$x_money,$x_mappack);	$sack_of_coins = 1;}
				else if (80 >= mt_rand(1,100))
				{
					if ($x_game == "Metamorphosis Alpha"){$my_prize = makeMAItem($treasure_level,$loot_size);}
					else if ($x_game == "Gamma World"){$my_prize = makeGWItem($treasure_level,$loot_size);}
					else if ($x_game != "Broken Urthe"){$my_prize = makePAItem($treasure_level,$loot_size,0);}
					else {$my_prize = makeBUItem($treasure_level,$loot_size,0);}
					$my_list_of_wonders = $my_prize . "^" . $room . "___" . $my_list_of_wonders;
				}
				else {$my_prize = ucfirst(PAmakeNormalItem(1,1,$x_money,$v_tech,$x_game));}
					echo $my_prize . "<br>";

			$max_of_loots = $max_of_loots - 1;

			endwhile;
		}
	}

	if ($x_amount > 0){echo "<hr align='center' size='1'>";}

endwhile;

	echo "</font>";

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>