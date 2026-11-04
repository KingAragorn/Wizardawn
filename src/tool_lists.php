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
	echo "<form style='margin-bottom:0; margin-top:0;' target='_blank' method='POST' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Monster Listing</p>";
	echo "<p style='text-align: justify;'>Here you can produce a listing of fantasy creatures that may help in your game. You can even export the results to an XLS table.";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_game'>";

	if ($_SESSION["SESSION_SECTION"] == 1){ $listing = 1; }
	else if ($_SESSION["SESSION_SECTION"] == 2){ $listing = 99; }
	else if ($_SESSION["SESSION_SECTION"] == 3){ $listing = 6; }
	else if ($_SESSION["SESSION_SECTION"] == 4){ $listing = "Broken Urthe"; }
	else if ($_SESSION["SESSION_SECTION"] == 5){ $listing = "Gamma World"; }
	else if ($_SESSION["SESSION_SECTION"] == 6){ $listing = 3; }
	else if ($_SESSION["SESSION_SECTION"] == 7){ $listing = "Metamorphosis Alpha"; }
	else if ($_SESSION["SESSION_SECTION"] == 8){ $listing = 8; }
	else if ($_SESSION["SESSION_SECTION"] == 9){ $listing = "Mutant Future"; }
	else if ($_SESSION["SESSION_SECTION"] == 10){ $listing = "Necropalyx"; }
	else if ($_SESSION["SESSION_SECTION"] == 11){ $listing = 2; }
	else if ($_SESSION["SESSION_SECTION"] == 12){ $listing = "Space Ryft"; }
	else if ($_SESSION["SESSION_SECTION"] == 13){ $listing = 4; }
	else if ($_SESSION["SESSION_SECTION"] == 14){ $listing = 5; echo "<input type='hidden' name='tt_vs' value='5'>"; }
	else if ($_SESSION["SESSION_SECTION"] == 15){ $listing = 5; echo "<input type='hidden' name='tt_vs' value='7'>"; }
	else if ($_SESSION["SESSION_SECTION"] == 147){ $listing = 51; }
	else if ($_SESSION["SESSION_SECTION"] == 165){ $listing = 165; }
	else if ($_SESSION["SESSION_SECTION"] == 173){ $listing = 5; echo "<input type='hidden' name='tt_vs' value='9'>"; }

	echo "<input type='hidden' name='listing' value='$listing'>";

	?>
		<div id="div_table">
		<?php if ($x_game == "Labyrinth Lord"){?>
			<div class="row">
				<span class="cull">Advanced Edition Companion:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="aec" value="1"></span>
			</div>
		<?php } ?>
		<?php if ($x_game == "OSRIC"){?>
			<div class="row">
				<span class="cull">Monsters of Myth:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="mom" value="1"></span>
			</div>
		<?php } ?>
		<?php if ($x_game == "AD&D"){ ?>
			<div class="row">
				<span class="cull">Fiend Folio:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="dd_ff" value="1"></span>
			</div>
			<div class="row">
				<span class="cull">Monster Manual II:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="dd_mm2" value="1"></span>
			</div>
		<?php } ?>
		<?php if ($x_game == "Tunnels & Trolls 5th Edition" || $x_game == "Tunnels & Trolls 7th Edition" || $x_game == "Tunnels & Trolls Deluxe"){?>
			<div class="row">
				<span class="cull">Difficulty:</span>
				<span class="cell">
					<select id="DropOption" name="ttlvl">
						<option value="9">Easy</option>
						<option selected value="1">Normal</option>
						<option value="2">Challenging</option>
						<option value="3">Difficult</option>
						<option value="4">Heroic</option>
						<option value="5">Epic</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">&nbsp;</span>
				<span class="cell"><i>&nbsp;&nbsp;&nbsp;This uses the Magestykc supplement for T&amp;T</i></span>
			</div>
		<?php } ?>
		<?php if ($x_game == "Wizardry & Warriors"){?>
			<div class="row">
				<span class="cull">Difficulty:</span>
				<span class="cell">
					<select id="DropOption" name="wwlvl">
						<option value="9">Easy</option>
						<option selected value="1">Normal</option>
						<option value="2">Challenging</option>
						<option value="3">Difficult</option>
						<option value="4">Heroic</option>
						<option value="5">Epic</option>
					</select>
				</span>
			</div>
		<?php } ?>
		<?php if ($x_game == "Millenniums & Mutations"){?>
			<div class="row">
				<span class="cull">Difficulty:</span>
				<span class="cell">
					<select id="DropOption" name="mmttlvl">
						<option value="9">Easy</option>
						<option selected value="1">Normal</option>
						<option value="2">Challenging</option>
						<option value="3">Difficult</option>
						<option value="4">Heroic</option>
						<option value="5">Epic</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">Edition:</span>
				<span class="cell">
					<select id="DropOption" name="mmtt_vs">
						<option value="5">T&amp; 5th Edition</option>
						<option value="7">T&amp; 7th Edition</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">All Mutants:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_mutants" value="1"></span>
			</div>
			<div class="row">
				<span class="cull">&nbsp;</span>
				<span class="cell"><i>&nbsp;&nbsp;&nbsp;This uses the Zendynn supplement for T&amp;T</i></span>
			</div>
		<?php } ?>

			<div class="row">
				<span class="cell">Sort By:</span>
				<span class="cell">
					<select id="DropOption" name="sorting">
						<option value="1">Name</option>
						<option value="2">Level</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Type:</span>
				<span class="cell">
					<select id="DropOption" name="type">
						<option value="1">List</option>
						<option value="2">Terrain</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Appearance:</span>
				<span class="cell">
					<select id="DropOption" name="statb">
						<option value="1">Columns</option>
						<option value="2">Stat Blocks</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Output:</span>
				<span class="cell">
					<select id="DropOption" name="xls">
						<option value="0">Plain</option>
						<option value="1">Spreadsheet</option>
					</select>
				</span>
			</div>
		<?php if ($x_game == "Swords & Six-Siders" || $x_game == "BD&D"){?>
			<div class="row">
				<span class="cull">Show Descriptions:</span>
				<span class="cell"><input type="checkbox" id="InputOption" checked name="x_describe" value="1"></span>
			</div>
		<?php } ?>
		<?php if ($x_game == "AD&D"){ ?>
			<div class="row">
				<span class="cull">Show Special Info:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_describe" value="1"></span>
			</div>
		<?php } ?>
			<div class="row">
				<span class="cull">Show Terrain:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="show_terrain" value="1"><i>&nbsp;Show a Terrain column when generating a Type of <u>List</u></i></span>
			</div>
		</div>

		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create">

		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

$listing = $_POST['listing'];
$sorting = $_POST['sorting'];
$x_describe = $_POST['x_describe'];
	$show_detail_monster_info = $x_describe;
$statb = $_POST['statb'];
$mom = $_POST['mom'];
$aec = $_POST['aec']+0;
$type = $_POST['type'];
$ttlvl = $_POST['ttlvl'];
$wwlvl = $_POST['wwlvl'];
$tt_vs = $_POST['tt_vs'];
$x_mutants = $_POST['x_mutants'];
$show_terrain = $_POST['show_terrain'];
$do_not_show_creatures = 1;
$no_name_creatures = 1;

if ($listing == 1)
{
	$x_game = "AD&D";
	$bottom_notices = 13;
	$list_omit = 1;
}
else if ($listing == 2)
{
	$x_game = "OSRIC";
	$bottom_notices = 1;
}
else if ($listing == 3)
{
	$x_game = "Labyrinth Lord";
	$bottom_notices = 2;
}
else if ($listing == 4)
{
	$x_game = "Swords & Wizardry";
	$bottom_notices = 5;
}
else if ($listing == 5)
{
	if ($tt_vs == 7){$x_game = "Tunnels & Trolls 7th Edition";} else if ($tt_vs == 9){$x_game = "Tunnels & Trolls Deluxe";} else {$x_game = "Tunnels & Trolls 5th Edition";}
	$bottom_notices = 7;
}
else if ($listing == 6)
{
	$x_game = "BFRPG";
	$bottom_notices = 11;
}
else if ($listing == 8)
{
	$ttlvl = $_POST['mmttlvl'];
	$tt_vs = $_POST['mmtt_vs'];
	if ($tt_vs == 7){$x_game = "Millenniums & Mutations 7th Edition";} else {$x_game = "Millenniums & Mutations 5th Edition";}
	$bottom_notices = 12;
}
else if ($listing == 51)
{
	$x_game = "Tunnels & Trolls 5th Edition";
	$x_supplement = "WW";
	$ttlvl = $wwlvl;
	$tt_vs = 5;
	$bottom_notices = 6;
}
else if ($listing == 99)
{
	$x_game = "BD&D";
	$bottom_notices = 13;
}
else if ($listing == 165)
{
	$x_game = "Swords & Six-Siders";
	$bottom_notices = 18;
}
else
{
	$x_game = "Fantasy";
}



if ($type == 2)
{
	if (($x_game == "Broken Urthe") || 
		($x_game == "Gamma World") || 
		($x_game == "Millenniums & Mutations 5th Edition") || 
		($x_game == "Millenniums & Mutations 7th Edition"))
	{
		$cytrval = 20;
		$switch = 20; // FOR EACH TERRAIN TYPE
	}
	else if ($x_game == "Mutant Future" || $x_game == "BD&D")
	{
		$cytrval = 21;
		$switch = 21; // FOR EACH TERRAIN TYPE
	}
	else
	{
		$cytrval = 19;
		$switch = 19; // FOR EACH TERRAIN TYPE
	}
}
else
{
	$switch = 1;
	if ($listing == 1)
	{
		$dd_ff = $_POST['dd_ff'];
		$dd_mm2 = $_POST['dd_mm2'];
		$take = "(creator LIKE 'SRC: MM %' OR ";
		if ($dd_ff > 0){$take = $take . "creator LIKE 'SRC: FF %' OR ";}
		if ($dd_mm2 > 0){$take = $take . "creator LIKE 'SRC: MM2 %' OR ";}
		$take = $take . "creator = 'ADDDD')";
		$bottom_notices = 13;
		if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
		$qry = "SELECT * FROM monsters_rpgs WHERE $take $smd";
		$res = wz_query( $connection, $qry ); /*qry*/
	}
	else if ($listing == 2)
	{
		if ($mom > 0){$mnd = "OR creator='MoM'";} else {$mnd = "";}
		if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
		$qry = "SELECT * FROM monsters_rpgs WHERE (creator='OSRIC' $mnd) $smd";
		$res = wz_query( $connection, $qry ); /*qry*/
	}
	else if ($listing == 3)
	{
		if ($aec > 0){$mnd = "OR creator='AEC'";} else {$mnd = "";}
		if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
		$qry = "SELECT * FROM monsters_rpgs WHERE (creator='LL' $mnd) $smd";
		$res = wz_query( $connection, $qry ); /*qry*/
	}
	else if ($listing == 4)
	{
		if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='SW' $smd";
		$res = wz_query( $connection, $qry ); /*qry*/
	}
	else if ($listing == 5)
	{
		if ($sorting == 2){$smd = "ORDER BY ( m_hp_min+ac+difficulty ), name";} else {$smd = "ORDER BY name";}
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='TT' $smd";
		$res = wz_query( $connection, $qry ); /*qry*/
	}
	else if ($listing == 51)
	{
		if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='TT' $smd";
		$res = wz_query( $connection, $qry ); /*qry*/
	}
	else if ($listing == 165)
	{
		if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='SX' $smd";
		$res = wz_query( $connection, $qry ); /*qry*/
	}
	else if ($listing == 6)
	{
		if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='BFRPG' $smd";
		$res = wz_query( $connection, $qry ); /*qry*/
	}
	else if ($listing == 7)
	{
		if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='TT' $smd";
		$res = wz_query( $connection, $qry ); /*qry*/
	}
	else if ($listing == 8)
	{
		if ($x_mutants > 0){$sort_l_name = "loot";} else {$sort_l_name = "name";}
		if ($sorting == 2){$smd = "ORDER BY difficulty, " . $sort_l_name;} else {$smd = "ORDER BY " . $sort_l_name;}
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='BU' $smd";
		$res = wz_query( $connection, $qry ); /*qry*/
	}
	else if ($listing == 99)
	{
		if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='BX' $smd";
		$res = wz_query( $connection, $qry ); /*qry*/
	}
	else
	{
		if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='WIZ' $smd";
		$res = wz_query( $connection, $qry ); /*qry*/
	}
}
?>

<table border="0" cellpadding="2" cellspacing="2" style="border-collapse: collapse; font-size: 12" width="100%">

<?php

while ($switch > 0) :

	if ($type == 2)
	{

		if (($x_game == "Broken Urthe") || 
			($x_game == "Gamma World") || 
			($x_game == "Millenniums & Mutations 5th Edition") || 
			($x_game == "Millenniums & Mutations 7th Edition"))
		{
			if ($switch == 20){ $trn = "DG";		$terrain = "Ruins";}
			else if ($switch == 19){$trn = "RD";	$terrain = "Wastelands";}
			else if ($switch == 18){$trn = "PF";	$terrain = "Forest";}
			else if ($switch == 17){$trn = "PH";	$terrain = "Hills";}
			else if ($switch == 16){$trn = "PM";	$terrain = "Mountains";}
			else if ($switch == 15){$trn = "PP";	$terrain = "Plains";}
			else if ($switch == 14){$trn = "PS";	$terrain = "Swamp";}
			else if ($switch == 13){$trn = "PD";	$terrain = "Desert";}
			else if ($switch == 12){$trn = "FW%' AND swimmer LIKE '0";	$terrain = "Freshwater, Above";}
			else if ($switch == 11){$trn = "FW%' AND swimmer LIKE '1";	$terrain = "Freshwater, Below";}
			else if ($switch == 10){$trn = "SW%' AND swimmer LIKE '0";	$terrain = "Sea, Above";}
			else if ($switch == 9){$trn = "SW%' AND swimmer LIKE '1";	$terrain = "Sea, Below";}
			else if ($switch == 8){$trn = "CF";		$terrain = "Snowy Forest";}
			else if ($switch == 7){$trn = "CH";		$terrain = "Snowy Hills";}
			else if ($switch == 6){$trn = "CM";		$terrain = "Snowy Mountains";}
			else if ($switch == 5){$trn = "CP";		$terrain = "Snowy Plains";}
			else if ($switch == 4){$trn = "TF";		$terrain = "Jungle/Tropics Forest";}
			else if ($switch == 3){$trn = "TH";		$terrain = "Jungle/Tropics Hills";}
			else if ($switch == 2){$trn = "TM";		$terrain = "Jungle/Tropics Mountains";}
			else if ($switch == 1){$trn = "TS";		$terrain = "Jungle/Tropics Swamp";}
		}
		else if ($x_game == "Mutant Future")
		{
			if ($switch == 21){ $trn = "DG";		$terrain = "Ruins";}
			else if ($switch == 20){$trn = "TW";	$terrain = "Settlement";}
			else if ($switch == 19){$trn = "RD";	$terrain = "Wastelands";}
			else if ($switch == 18){$trn = "PF";	$terrain = "Forest";}
			else if ($switch == 17){$trn = "PH";	$terrain = "Hills";}
			else if ($switch == 16){$trn = "PM";	$terrain = "Mountains";}
			else if ($switch == 15){$trn = "PP";	$terrain = "Plains";}
			else if ($switch == 14){$trn = "PS";	$terrain = "Swamp";}
			else if ($switch == 13){$trn = "PD";	$terrain = "Desert";}
			else if ($switch == 12){$trn = "FW%' AND swimmer LIKE '0";	$terrain = "Freshwater, Above";}
			else if ($switch == 11){$trn = "FW%' AND swimmer LIKE '1";	$terrain = "Freshwater, Below";}
			else if ($switch == 10){$trn = "SW%' AND swimmer LIKE '0";	$terrain = "Sea, Above";}
			else if ($switch == 9){$trn = "SW%' AND swimmer LIKE '1";	$terrain = "Sea, Below";}
			else if ($switch == 8){$trn = "CF";		$terrain = "Snowy Forest";}
			else if ($switch == 7){$trn = "CH";		$terrain = "Snowy Hills";}
			else if ($switch == 6){$trn = "CM";		$terrain = "Snowy Mountains";}
			else if ($switch == 5){$trn = "CP";		$terrain = "Snowy Plains";}
			else if ($switch == 4){$trn = "TF";		$terrain = "Jungle/Tropics Forest";}
			else if ($switch == 3){$trn = "TH";		$terrain = "Jungle/Tropics Hills";}
			else if ($switch == 2){$trn = "TM";		$terrain = "Jungle/Tropics Mountains";}
			else if ($switch == 1){$trn = "TS";		$terrain = "Jungle/Tropics Swamp";}
		}
		else if ($x_game == "BD&D")
		{
			if ($switch == 21){ $trn = "DG";		$terrain = "Dungeon";}
			else if ($switch == 20){$trn = "VG";	$terrain = "Settlement";}
			else if ($switch == 19){$trn = "PF";	$terrain = "Forest";}
			else if ($switch == 18){$trn = "PH";	$terrain = "Hills";}
			else if ($switch == 17){$trn = "PM";	$terrain = "Mountains";}
			else if ($switch == 16){$trn = "PP";	$terrain = "Plains";}
			else if ($switch == 15){$trn = "PS";	$terrain = "Swamp";}
			else if ($switch == 14){$trn = "PD";	$terrain = "Desert";}
			else if ($switch == 13){$trn = "FW%' AND swimmer LIKE '0";	$terrain = "Freshwater, Above";}
			else if ($switch == 12){$trn = "FW%' AND swimmer LIKE '1";	$terrain = "Freshwater, Below";}
			else if ($switch == 11){$trn = "SW%' AND swimmer LIKE '0";	$terrain = "Sea, Above";}
			else if ($switch == 10){$trn = "SW%' AND swimmer LIKE '1";	$terrain = "Sea, Below";}
			else if ($switch == 9){$trn = "CF";		$terrain = "Snowy Forest";}
			else if ($switch == 8){$trn = "CH";		$terrain = "Snowy Hills";}
			else if ($switch == 7){$trn = "CM";		$terrain = "Snowy Mountains";}
			else if ($switch == 6){$trn = "CP";		$terrain = "Snowy Plains";}
			else if ($switch == 5){$trn = "TF";		$terrain = "Jungle/Tropics Forest";}
			else if ($switch == 4){$trn = "TH";		$terrain = "Jungle/Tropics Hills";}
			else if ($switch == 3){$trn = "TM";		$terrain = "Jungle/Tropics Mountains";}
			else if ($switch == 2){$trn = "TS";		$terrain = "Jungle/Tropics Swamp";}
			else if ($switch == 1){$trn = "LW";		$terrain = "Lost World";}
		}
		else
		{
			if ($switch == 19){ $trn = "DG";		$terrain = "Dungeon";}
			else if ($switch == 18){$trn = "PF";	$terrain = "Forest";}
			else if ($switch == 17){$trn = "PH";	$terrain = "Hills";}
			else if ($switch == 16){$trn = "PM";	$terrain = "Mountains";}
			else if ($switch == 15){$trn = "PP";	$terrain = "Plains";}
			else if ($switch == 14){$trn = "PS";	$terrain = "Swamp";}
			else if ($switch == 13){$trn = "PD";	$terrain = "Desert";}
			else if ($switch == 12){$trn = "FW%' AND swimmer LIKE '0";	$terrain = "Freshwater, Above";}
			else if ($switch == 11){$trn = "FW%' AND swimmer LIKE '1";	$terrain = "Freshwater, Below";}
			else if ($switch == 10){$trn = "SW%' AND swimmer LIKE '0";	$terrain = "Sea, Above";}
			else if ($switch == 9){$trn = "SW%' AND swimmer LIKE '1";	$terrain = "Sea, Below";}
			else if ($switch == 8){$trn = "CF";		$terrain = "Snowy Forest";}
			else if ($switch == 7){$trn = "CH";		$terrain = "Snowy Hills";}
			else if ($switch == 6){$trn = "CM";		$terrain = "Snowy Mountains";}
			else if ($switch == 5){$trn = "CP";		$terrain = "Snowy Plains";}
			else if ($switch == 4){$trn = "TF";		$terrain = "Jungle/Tropics Forest";}
			else if ($switch == 3){$trn = "TH";		$terrain = "Jungle/Tropics Hills";}
			else if ($switch == 2){$trn = "TM";		$terrain = "Jungle/Tropics Mountains";}
			else if ($switch == 1){$trn = "TS";		$terrain = "Jungle/Tropics Swamp";}
		}

		if ($listing == 1)
		{
			$dd_ff = $_POST['dd_ff'];
			$dd_mm2 = $_POST['dd_mm2'];
			$take = "(creator LIKE 'SRC: MM %' OR ";
			if ($dd_ff > 0){$take = $take . "creator LIKE 'SRC: FF %' OR ";}
			if ($dd_mm2 > 0){$take = $take . "creator LIKE 'SRC: MM2 %' OR ";}
			$take = $take . "creator = 'ADDDD')";
			$mnd = "AND location LIKE '%$trn%'";
			if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
			$qry = "SELECT * FROM monsters_rpgs WHERE $take $mnd $smd";
			$res = wz_query( $connection, $qry ); /*qry*/
		}
		else if ($listing == 2)
		{
			if ($mom > 0){$mnd = "AND location LIKE '%$trn%'";} else {$mnd = "AND location LIKE '%$trn%' AND creator='OSRIC'";}
			if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
			$qry = "SELECT * FROM monsters_rpgs WHERE (creator='OSRIC' OR creator='MoM') $mnd $smd";
			$res = wz_query( $connection, $qry ); /*qry*/
		}
		else if ($listing == 3)
		{
			if ($aec > 0){$mnd = "AND location LIKE '%$trn%'";} else {$mnd = "AND location LIKE '%$trn%' AND creator='LL'";}
			if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
			$qry = "SELECT * FROM monsters_rpgs WHERE (creator='LL' OR creator='AEC') $mnd $smd";
			$res = wz_query( $connection, $qry ); /*qry*/
		}
		else if ($listing == 4)
		{
			$mnd = "WHERE creator='SW' AND location LIKE '%$trn%'";
			if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
			$qry = "SELECT * FROM monsters_rpgs $mnd $smd";
			$res = wz_query( $connection, $qry ); /*qry*/
		}
		else if ($listing == 5)
		{
			$mnd = "WHERE creator='TT' AND location LIKE '%$trn%'";
			if ($sorting == 2){$smd = "ORDER BY ( m_hp_min+ac+difficulty ), name";} else {$smd = "ORDER BY name";}
			$qry = "SELECT * FROM monsters_rpgs $mnd $smd";
			$res = wz_query( $connection, $qry ); /*qry*/
		}
		else if ($listing == 51)
		{
			$mnd = "WHERE creator='TT' AND location LIKE '%$trn%'";
			if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
			$qry = "SELECT * FROM monsters_rpgs $mnd $smd";
			$res = wz_query( $connection, $qry ); /*qry*/
		}
		else if ($listing == 165)
		{
			$mnd = "WHERE creator='SX' AND location LIKE '%$trn%'";
			if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
			$qry = "SELECT * FROM monsters_rpgs $mnd $smd";
			$res = wz_query( $connection, $qry ); /*qry*/
		}
		else if ($listing == 6)
		{
			$mnd = "WHERE creator='BFRPG' AND location LIKE '%$trn%'";
			if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
			$qry = "SELECT * FROM monsters_rpgs $mnd $smd";
			$res = wz_query( $connection, $qry ); /*qry*/
		}
		else if ($listing == 7)
		{
			$mnd = "WHERE creator='TT' AND location LIKE '%$trn%'";
			if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
			$qry = "SELECT * FROM monsters_rpgs $mnd $smd";
			$res = wz_query( $connection, $qry ); /*qry*/
		}
		else if ($listing == 8)
		{
			if ($x_mutants > 0){$sort_l_name = "loot";} else {$sort_l_name = "name";}
			$mnd = "WHERE creator='BU' AND location LIKE '%$trn%'";
			if ($sorting == 2){$smd = "ORDER BY difficulty, " . $sort_l_name;;} else {$smd = "ORDER BY " . $sort_l_name;;}
			$qry = "SELECT * FROM monsters_rpgs $mnd $smd";
			$res = wz_query( $connection, $qry ); /*qry*/
		}
		else if ($listing == 99)
		{
			$mnd = "WHERE creator='BX' AND location LIKE '%$trn%'";
			if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
			$qry = "SELECT * FROM monsters_rpgs $mnd $smd";
			$res = wz_query( $connection, $qry ); /*qry*/
		}
		else
		{
			$mnd = "WHERE creator='WIZ' AND location LIKE '%$trn%'";
			if ($sorting == 2){$smd = "ORDER BY difficulty, name";} else {$smd = "ORDER BY name";}
			$qry = "SELECT * FROM monsters_rpgs $mnd $smd";
			$res = wz_query( $connection, $qry ); /*qry*/
		}
	}

if ($listing == 1) ///////////////////////////////////////// AD&D
{
	if ($statb == 2)
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ echo "<tr><td colspan='2' NOWRAP>&nbsp;</td>"; }
		echo "<tr>";
		if ($type == 2){ echo "<td NOWRAP><b>Terrain</b></td>"; }
		echo "<td NOWRAP><b>Statistics</b></td></tr>";
		while ($ary=wz_fetch_assoc($res)) : include("functions/stat_blocks.php");
			echo "<tr>";
			if ($type == 2){ echo "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'>" . $terrain . "&nbsp;</td>"; }
			echo "<td style='border-top-style: solid; border-top-width: 1px'>" . $monster_info . "</td></tr>";
		endwhile;
	}
	else
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ ?>
		<tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP>&nbsp;</td><?php } ?>
			<?php if ($show_detail_monster_info > 0){ ?><td NOWRAP>&nbsp;</td><?php } ?>
		</tr>
		<?php } ?>
		<tr>
			<?php if ($type == 2){?><td NOWRAP><b>Terrain</b></td><?php } ?>
			<td NOWRAP><b>Name</b></td>
			<td NOWRAP align="center"><b>Freq</b></td>
			<td NOWRAP align="center"><b>#Enc</b></td>
			<td NOWRAP align="center"><b>Size</b></td>
			<td NOWRAP align="center"><b>Move</b></td>
			<td NOWRAP align="center"><b>AC</b></td>
			<td NOWRAP align="center"><b>HD</b></td>
			<td NOWRAP align="center"><b>HP</b></td>
			<td NOWRAP align="center"><b>#AT</b></td>
			<td NOWRAP align="center"><b>DMG</b></td>
			<td NOWRAP align="center"><b>MR</b></td>
			<td NOWRAP align="center"><b>THAC0</b></td>
			<td NOWRAP align="center"><b>INT</b></td>
			<td NOWRAP align="center"><b>AL</b></td>
			<td NOWRAP align="center"><b>Lvl</b></td>
			<td NOWRAP align="center"><b>XP</b></td>
			<td NOWRAP align="center"><b>Source</b></td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP><b>Terrain</b></td><?php } ?>
			<?php if ($show_detail_monster_info > 0){ ?><td NOWRAP><b>Special</b></td><?php } ?>
		</tr>
		<?php while ($ary=wz_fetch_assoc($res)) :

			$add_freq = str_replace('FREQ: ', '', $ary[freq]);
			$add_enc = str_replace('APP: ', '', $ary[enc]);
			$add_size = str_replace('SZ: ', '', $ary[size]);
			$add_move = str_replace('MV: ', '', $ary[move]);
			$add_ac = str_replace('AC: ', '', $ary[ac]);
			$add_hd = str_replace('HD: ', '', $ary[hd]);
			$add_hp = str_replace('HP: ', '', $ary[description]);
			$add_atk = str_replace('ATK: ', '', $ary[atk]);
			$add_dmg = str_replace('DMG: ', '', $ary[dmg]);
			$add_mr = str_replace('MR: ', '', $ary[mr]); $ary[mr];
			$add_thaco = str_replace('THAC0: ', '', $ary[thaco]);
			$add_iq = str_replace('INT: ', '', $ary[iq]); $ary[iq];
			$add_al = str_replace('AL: ', '', $ary[al]); $ary[al];
			$add_xp = str_replace('XP: ', '', $ary[xp]); $ary[xp];
			$add_src = str_replace('SRC: ', '', $ary[creator]);

			$add_freq = str_replace(';', '', $add_freq);
			$add_enc = str_replace(';', '', $add_enc);
			$add_size = str_replace(';', '', $add_size);
			$add_move = str_replace(';', '', $add_move);
			$add_ac = str_replace(';', '', $add_ac);
			$add_hd = str_replace(';', '', $add_hd);
			$add_hp = str_replace(';', '', $add_hp);
			$add_atk = str_replace(';', '', $add_atk);
			$add_dmg = str_replace(';', '', $add_dmg);
			$add_mr = str_replace(';', '', $add_mr);
			$add_thaco = str_replace(';', '', $add_thaco);
			$add_iq = str_replace(';', '', $add_iq);
			$add_al = str_replace(';', '', $add_al);
			$add_xp = str_replace(';', '', $add_xp);
			$add_src = str_replace(';', '', $add_src);

			$add_spc = str_replace('SPATK', 'ATTACK', $ary[treasure]);
			$add_spc = str_replace('SPDEF', 'DEFENSE', $add_spc);
			$add_spc = str_replace(';', '', $add_spc);
		?>
			<tr>
				<?php if ($type == 2){?><td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $terrain; ?>&nbsp;</td><?php } ?>
				<td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[name]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_freq; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_enc; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_size; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_move; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_ac; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_hd; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_hp; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_atk; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_dmg; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_mr; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_thaco; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_iq; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_al; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[level]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $add_xp; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px"><?php echo $add_src; ?>&nbsp;</td>
				<?php if ($show_terrain > 0 && $type != 2){ ?><td style="border-top-style: solid; border-top-width: 1px"><?php echo getTerrains($x_game, $ary[location], $ary[swimmer]); ?></td><?php } ?>
				<?php if ($show_detail_monster_info > 0){ ?><td style="border-top-style: solid; border-top-width: 1px"><?php echo $add_spc; ?>&nbsp;</td><?php } ?>
			</tr>
		<?php endwhile;
	}

} else if ($listing == 2) ///////////////////////////////////////// OSRIC
{
	if ($statb == 2)
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ echo "<tr><td colspan='2' NOWRAP>&nbsp;</td>"; }
		echo "<tr>";
		if ($type == 2){ echo "<td NOWRAP><b>Terrain</b></td>"; }
		echo "<td NOWRAP><b>Statistics</b></td></tr>";
		while ($ary=wz_fetch_assoc($res)) : include("functions/stat_blocks.php");
			echo "<tr>";
			if ($type == 2){ echo "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'>" . $terrain . "&nbsp;</td>"; }
			echo "<td style='border-top-style: solid; border-top-width: 1px'>" . $monster_info . "</td></tr>";
		endwhile;
	}
	else
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ ?>
		<tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP>&nbsp;</td><?php } ?>
		</tr>
		<?php } ?>
		<tr>
			<?php if ($type == 2){?><td NOWRAP><b>Terrain</b></td><?php } ?>
			<td NOWRAP><b>Name</b></td>
			<td NOWRAP align="center"><b>Freq</b></td>
			<td NOWRAP align="center"><b>#Enc</b></td>
			<td NOWRAP align="center"><b>Size</b></td>
			<td NOWRAP align="center"><b>Move</b></td>
			<td NOWRAP align="center"><b>AC</b></td>
			<td NOWRAP align="center"><b>HD</b></td>
			<td NOWRAP align="center"><b>#AT</b></td>
			<td NOWRAP align="center"><b>DMG</b></td>
			<td NOWRAP><b>SpAT</b></td>
			<td NOWRAP><b>SpDF</b></td>
			<td NOWRAP align="center"><b>MR</b></td>
			<td NOWRAP align="center"><b>Lair</b></td>
			<td NOWRAP align="center"><b>INT</b></td>
			<td NOWRAP align="center"><b>AL</b></td>
			<td NOWRAP align="center"><b>Lvl</b></td>
			<td NOWRAP align="center"><b>XP</b></td>
			<td NOWRAP align="center"><b>Source</b></td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP><b>Terrain</b></td><?php } ?>
		</tr>
		<?php while ($ary=wz_fetch_assoc($res)) : ?>
			<tr>
				<?php if ($type == 2){?><td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $terrain; ?>&nbsp;</td><?php } ?>
				<td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[name]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[freq]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[enc]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[size]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[move]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[ac]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[hd]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[atk]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[dmg]; ?>&nbsp;</td>
				<td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[spatk]; ?>&nbsp;</td>
				<td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[spdef]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[mr]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[lair]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[iq]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[al]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[level]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[xp]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[creator]; ?>&nbsp;</td>
				<?php if ($show_terrain > 0 && $type != 2){ ?><td style="border-top-style: solid; border-top-width: 1px"><?php echo getTerrains($x_game, $ary[location], $ary[swimmer]); ?></td><?php } ?>
			</tr>
		<?php endwhile;
	}

} else if ($listing == 3) ///////////////////////////////////////// LL
{
	if ($statb == 2)
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ echo "<tr><td colspan='2' NOWRAP>&nbsp;</td>"; }
		echo "<tr>";
		if ($type == 2){ echo "<td NOWRAP><b>Terrain</b></td>"; }
		echo "<td NOWRAP><b>Statistics</b></td></tr>";
		while ($ary=wz_fetch_assoc($res)) : include("functions/stat_blocks.php");
			echo "<tr>";
			if ($type == 2){ echo "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'>" . $terrain . "&nbsp;</td>"; }
			echo "<td style='border-top-style: solid; border-top-width: 1px'>" . $monster_info . "</td></tr>";
		endwhile;
	}
	else
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ ?>
		<tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP>&nbsp;</td><?php } ?>
		</tr>
		<?php } ?>
		<tr>
			<?php if ($type == 2){?><td NOWRAP><b>TERRAIN</b></td><?php } ?>
			<td NOWRAP><b>NAME</b></td>
			<td NOWRAP align="center"><b>ENC</b></td>
			<td NOWRAP align="center"><b>AL</b></td>
			<td NOWRAP align="center"><b>MV</b></td>
			<td NOWRAP align="center"><b>AC</b></td>
			<td NOWRAP align="center"><b>HD</b></td>
			<td NOWRAP align="center"><b>AT</b></td>
			<td NOWRAP align="center"><b>DMG</b></td>
			<td NOWRAP align="center"><b>SV</b></td>
			<td NOWRAP align="center"><b>LV</b></td>
			<td NOWRAP align="center"><b>ML</b></td>
			<td NOWRAP align="center"><b>HC</b></td>
			<td NOWRAP align="center"><b>XP</b></td>
			<td NOWRAP align="center"><b>BOOK</b></td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP><b>TERRAIN</b></td><?php } ?>
		</tr>
		<?php while ($ary=wz_fetch_assoc($res)) : ?>
			<tr>
				<?php if ($type == 2){?><td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $terrain; ?>&nbsp;</td><?php } ?>
				<td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[name]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[enc]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[al]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[move]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[ac]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[hd]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[atk]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[dmg]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[spdef]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[level]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[bravery]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[loot]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[xp]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[creator]; ?>&nbsp;</td>
				<?php if ($show_terrain > 0 && $type != 2){ ?><td style="border-top-style: solid; border-top-width: 1px"><?php echo getTerrains($x_game, $ary[location], $ary[swimmer]); ?></td><?php } ?>
			</tr>
		<?php endwhile;
	}

} else if ($listing == 165) ///////////////////////////////////////// Swords & Six-Siders
{
	if ($statb == 2)
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ echo "<tr><td colspan='2' NOWRAP>&nbsp;</td>"; }
		echo "<tr>";
		if ($type == 2){ echo "<td NOWRAP><b>Terrain</b></td>"; }
		echo "<td NOWRAP><b>Statistics</b></td></tr>";
		while ($ary=wz_fetch_assoc($res)) : $show_detail_monster_info = $x_describe; include("functions/stat_blocks.php");
			echo "<tr>";
			if ($type == 2){ echo "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'>" . $terrain . "&nbsp;</td>"; }
			echo "<td style='border-top-style: solid; border-top-width: 1px'>" . $monster_info . "</td></tr>";
		endwhile;
	}
	else
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ ?>
		<tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP>&nbsp;</td><?php } ?>
		</tr>
		<?php } ?>
		<tr>
			<?php if ($type == 2){?><td NOWRAP><b>TERRAIN</b></td><?php } ?>
			<td NOWRAP><b>NAME</b></td>
			<td NOWRAP align="center"><b>LVL</b></td>
			<td NOWRAP align="center"><b>AC</b></td>
			<td NOWRAP align="center"><b>DR</b></td>
			<td NOWRAP align="center"><b>TO HIT</b></td>
			<td NOWRAP align="center"><b>DMG</b></td>
			<td NOWRAP align="center"><b>SV</b></td>
			<td NOWRAP align="center"><b>TYPE</b></td>
			<td NOWRAP align="center"><b>LANG</b></td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP><b>TERRAIN</b></td><?php } ?>
		</tr>
		<?php while ($ary=wz_fetch_assoc($res)) :
			if ( $ary[thaco] < 1 ){ $svsx = $ary[thaco]; } else { $svsx = "+" . $ary[thaco]; }
		?>
			<tr>
				<?php if ($type == 2){?><td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $terrain; ?>&nbsp;</td><?php } ?>
				<td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[name]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[al]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[ac]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[atk]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $svsx; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[dmg]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $svsx; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[type]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[spdef]; ?>&nbsp;</td>
				<?php if ($show_terrain > 0 && $type != 2){ ?><td style="border-top-style: solid; border-top-width: 1px"><?php echo getTerrains($x_game, $ary[location], $ary[swimmer]); ?></td><?php } ?>
			</tr>
			<?php if ( $ary[description] != "" && $show_detail_monster_info > 0 ){ ?>
				<tr>
					<?php if ($type == 2){?><td NOWRAP>&nbsp;</td><?php } ?>
					<td colspan="9"><?php echo $ary[description]; ?></td>
				</tr>
			<?php } ?>
		<?php endwhile;
	}

} else if ($listing == 6) ///////////////////////////////////////// BFRPG
{
	if ($statb == 2)
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ echo "<tr><td colspan='2' NOWRAP>&nbsp;</td>"; }
		echo "<tr>";
		if ($type == 2){ echo "<td NOWRAP><b>Terrain</b></td>"; }
		echo "<td NOWRAP><b>Statistics</b></td></tr>";
		while ($ary=wz_fetch_assoc($res)) : include("functions/stat_blocks.php");
			echo "<tr>";
			if ($type == 2){ echo "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'>" . $terrain . "&nbsp;</td>"; }
			echo "<td style='border-top-style: solid; border-top-width: 1px'>" . $monster_info . "</td></tr>";
		endwhile;
	}
	else
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ ?>
		<tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP>&nbsp;</td><?php } ?>
		</tr>
		<?php } ?>
		<tr>
			<?php if ($type == 2){?><td NOWRAP><b>TERRAIN</b></td><?php } ?>
			<td NOWRAP><b>NAME</b></td>
			<td NOWRAP align="center"><b>AC</b></td>
			<td NOWRAP align="center"><b>HD</b></td>
			<td NOWRAP align="center"><b>ATK</b></td>
			<td NOWRAP align="center"><b>DMG</b></td>
			<td NOWRAP align="center"><b>MV</b></td>
			<td NOWRAP align="center"><b>#APP</b></td>
			<td NOWRAP align="center"><b>SV</b></td>
			<td NOWRAP align="center"><b>ML</b></td>
			<td NOWRAP align="center"><b>TRS</b></td>
			<td NOWRAP align="center"><b>XP</b></td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP><b>TERRAIN</b></td><?php } ?>
		</tr>
		<?php while ($ary=wz_fetch_assoc($res)) : ?>
			<tr>
				<?php if ($type == 2){?><td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $terrain; ?>&nbsp;</td><?php } ?>
				<td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[name]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php $ac = str_replace("‡", "&#8225;", $ary[ac]); $ac = str_replace("†", "&#8224;", $ac); echo $ac; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[hd]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[atk]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[dmg]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[move]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[enc]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[spdef]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[bravery]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[treasure]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[xp]; ?>&nbsp;</td>
				<?php if ($show_terrain > 0 && $type != 2){ ?><td style="border-top-style: solid; border-top-width: 1px"><?php echo getTerrains($x_game, $ary[location], $ary[swimmer]); ?></td><?php } ?>
			</tr>
		<?php endwhile;
	}

} else if ($listing == 4) ///////////////////////////////////////// SW
{
	if ($statb == 2)
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ echo "<tr><td colspan='2' NOWRAP>&nbsp;</td>"; }
		echo "<tr>";
		if ($type == 2){ echo "<td NOWRAP><b>Terrain</b></td>"; }
		echo "<td NOWRAP><b>Statistics</b></td></tr>";
		while ($ary=wz_fetch_assoc($res)) : include("functions/stat_blocks.php");
			echo "<tr>";
			if ($type == 2){ echo "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'>" . $terrain . "&nbsp;</td>"; }
			echo "<td style='border-top-style: solid; border-top-width: 1px'>" . $monster_info . "</td></tr>";
		endwhile;
	}
	else
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ ?>
		<tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP>&nbsp;</td><?php } ?>
		</tr>
		<?php } ?>
		<tr>
			<?php if ($type == 2){?><td NOWRAP><b>TERRAIN</b></td><?php } ?>
			<td NOWRAP><b>NAME</b></td>
			<td NOWRAP align="center"><b>LV</b></td>
			<td NOWRAP align="center"><b>HD</b></td>
			<td NOWRAP align="center"><b>AC</b></td>
			<td NOWRAP align="center"><b>ATK</b></td>
			<td NOWRAP align="center"><b>SV</b></td>
			<td NOWRAP align="center"><b>SPEC</b></td>
			<td NOWRAP align="center"><b>MV</b></td>
			<td NOWRAP align="center"><b>AL</b></td>
			<td NOWRAP align="center"><b>XP</b></td>
			<td NOWRAP align="center"><b>TOHIT</b></td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP><b>TERRAIN</b></td><?php } ?>
		</tr>
		<?php while ($ary=wz_fetch_assoc($res)) : ?>
			<tr>
				<?php if ($type == 2){?><td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $terrain; ?>&nbsp;</td><?php } ?>
				<td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[name]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[level]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[hd]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[ac]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[atk]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[spdef]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[spatk]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[move]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[al]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[xp]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[thaco]; ?>&nbsp;</td>
				<?php if ($show_terrain > 0 && $type != 2){ ?><td style="border-top-style: solid; border-top-width: 1px"><?php echo getTerrains($x_game, $ary[location], $ary[swimmer]); ?></td><?php } ?>
			</tr>
		<?php endwhile;
	}

} else if (($listing == 5) || ($listing == 8)) ///////////////////////////////////////// TUNNELS & TROLLS /// MILLENNIUMS & MUTATIONS
{
	if ($statb == 2)
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ echo "<tr><td colspan='2' NOWRAP>&nbsp;</td>"; }
		echo "<tr>";
		if ($type == 2){ echo "<td NOWRAP><b>Terrain</b></td>"; }
		echo "<td NOWRAP><b>Statistics</b></td></tr>";
		while ($ary=wz_fetch_assoc($res)) : include("functions/stat_blocks.php");
			echo "<tr>";
			if ($type == 2){ echo "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'>" . $terrain . "&nbsp;</td>"; }
			echo "<td style='border-top-style: solid; border-top-width: 1px'>" . $monster_info . "</td></tr>";
		endwhile;
	}
	else
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ ?>
		<tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<?php if ($_SESSION["SESSION_SECTION"] == 173){?><td NOWRAP>&nbsp;</td><?php } ?>
			<?php if ($listing == 5){?><td NOWRAP>&nbsp;</td><?php } ?>
			<?php if ($listing == 5){?><td NOWRAP>&nbsp;</td><?php } ?>
			<?php if ($listing == 5){?><td NOWRAP>&nbsp;</td><?php } ?>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP>&nbsp;</td><?php } ?>
		</tr>
		<?php } ?>
		<tr>
			<?php if ($type == 2){?><td NOWRAP><b>Terrain</b></td><?php } ?>
			<td NOWRAP><b>Name</b></td>
			<?php if ($listing == 5){?><td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;Type&nbsp;&nbsp;&nbsp;</b></td><?php } ?>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;MR&nbsp;&nbsp;&nbsp;</b></td>
			<?php if ($_SESSION["SESSION_SECTION"] == 173){?><td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;LVL&nbsp;&nbsp;&nbsp;</b></td><?php } ?>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;Dice&nbsp;&nbsp;&nbsp;</b></td>
			<?php if ($listing == 5){?><td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;#App&nbsp;&nbsp;&nbsp;</b></td><?php } ?>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;Size&nbsp;&nbsp;&nbsp;</b></td>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;Move&nbsp;&nbsp;&nbsp;</b></td>
			<?php if ($listing == 5){?><td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;Languages&nbsp;&nbsp;&nbsp;</b></td><?php } ?>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP><b>Terrain</b></td><?php } ?>
			<td NOWRAP><b>Notes</b></td>
		</tr>
		<?php	while ($ary=wz_fetch_assoc($res)) :	include("functions/monsters_tt.php");	if ($my_real_name != ""){$creature_name = $my_real_name;} else {$creature_name = $ary[name];} ?>
			<tr>
				<?php if ($type == 2){?><td NOWRAP valign="top" style="border-top-style: solid; border-top-width: 1px"><?php echo $terrain; ?>&nbsp;</td><?php } ?>
				<td NOWRAP valign="top" style="border-top-style: solid; border-top-width: 1px"><?php echo $creature_name; ?>&nbsp;</td>
				<?php if ($listing == 5){?><td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[type]; ?>&nbsp;</td><?php } ?>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $my_mr_is; ?>&nbsp;</td>
				<?php if ($_SESSION["SESSION_SECTION"] == 173){?><td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo CEIL($my_mr_is/25); ?>&nbsp;</td><?php } ?>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $my_dc_is; ?>&nbsp;</td>
				<?php if ($listing == 5){?><td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[enc]; ?>&nbsp;</td><?php } ?>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[size]; ?>&nbsp;</td>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[move]; ?>&nbsp;</td>
				<?php if ($listing == 5){?><td valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[spdef]; ?>&nbsp;</td><?php } ?>
				<?php if ($show_terrain > 0 && $type != 2){ ?><td style="border-top-style: solid; border-top-width: 1px"><?php echo getTerrains($x_game, $ary[location], $ary[swimmer]); ?></td><?php } ?>
				<td style="border-top-style: solid; border-top-width: 1px"><?php echo $description; ?>&nbsp;</td>
			</tr>
		<?php endwhile;
	}
} else if ($listing == 51) ///////////////////////////////////////// WIZARDRY & WARRIORS
{
	if ($statb == 2)
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ echo "<tr><td colspan='2' NOWRAP>&nbsp;</td>"; }
		echo "<tr>";
		if ($type == 2){ echo "<td NOWRAP><b>Terrain</b></td>"; }
		echo "<td NOWRAP><b>Statistics</b></td></tr>";
		while ($ary=wz_fetch_assoc($res)) : include("functions/stat_blocks.php");
			echo "<tr>";
			if ($type == 2){ echo "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'>" . $terrain . "&nbsp;</td>"; }
			echo "<td style='border-top-style: solid; border-top-width: 1px'>" . $monster_info . "</td></tr>";
		endwhile;
	}
	else
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ ?>
		<tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP>&nbsp;</td><?php } ?>
		</tr>
		<?php } ?>
		<tr>
			<?php if ($type == 2){?><td NOWRAP><b>Terrain</b></td><?php } ?>
			<td NOWRAP><b>Name</b></td>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;Level&nbsp;&nbsp;&nbsp;</b></td>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;Type&nbsp;&nbsp;&nbsp;</b></td>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;#App&nbsp;&nbsp;&nbsp;</b></td>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;Size&nbsp;&nbsp;&nbsp;</b></td>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;Move&nbsp;&nbsp;&nbsp;</b></td>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;MR&nbsp;<i>(Life)</i>&nbsp;&nbsp;&nbsp;</b></td>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;Atk&nbsp;&nbsp;&nbsp;</b></td>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;Dmg&nbsp;&nbsp;&nbsp;</b></td>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;CR&nbsp;&nbsp;&nbsp;</b></td>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;Lang&nbsp;&nbsp;&nbsp;</b></td>
			<td NOWRAP align="center"><b>&nbsp;&nbsp;&nbsp;AP&nbsp;&nbsp;&nbsp;</b></td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP><b>Terrain</b></td><?php } ?>
			<td NOWRAP><b>Notes</b></td>
		</tr>
		<?php	while ($ary=wz_fetch_assoc($res)) :	include("functions/monsters_tt.php"); ?>
			<tr>
				<?php if ($type == 2){?><td NOWRAP valign="top" style="border-top-style: solid; border-top-width: 1px"><?php echo $terrain; ?>&nbsp;</td><?php } ?>
				<td NOWRAP valign="top" style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[name]; ?>&nbsp;</td>

				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[difficulty]; ?>&nbsp;</td>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[type]; ?>&nbsp;</td>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[enc]; ?>&nbsp;</td>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[size]; ?>&nbsp;</td>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[move]; ?>&nbsp;</td>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $my_mr_is; ?>&nbsp;</td>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;+<?php echo $mn_mod_attack; ?>&nbsp;</td>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;1d6+<?php echo $mn_mod_damage; ?>&nbsp;</td>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $mn_mod_level; ?>&nbsp;<i>(<?php echo $cr_monster; ?>)</i>&nbsp;</td>
				<td valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[spdef]; ?>&nbsp;</td>
				<td NOWRAP valign="top" align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $my_mr_is; ?>&nbsp;</td>
				<?php if ($show_terrain > 0 && $type != 2){ ?><td style="border-top-style: solid; border-top-width: 1px"><?php echo getTerrains($x_game, $ary[location], $ary[swimmer]); ?></td><?php } ?>
				<td style="border-top-style: solid; border-top-width: 1px"><?php echo $description; ?>&nbsp;</td>
			</tr>
		<?php endwhile;
	}
} else if ($listing == 99) ///////////////////////////////////////// Basic Dungeons & Dragons
{
	if ($statb == 2)
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ echo "<tr><td colspan='2' NOWRAP>&nbsp;</td>"; }
		echo "<tr>";
		if ($type == 2){ echo "<td NOWRAP><b>Terrain</b></td>"; }
		echo "<td NOWRAP><b>Statistics</b></td></tr>";
		while ($ary=wz_fetch_assoc($res)) : $show_detail_monster_info = $x_describe; include("functions/stat_blocks.php");
			echo "<tr>";
			if ($type == 2){ echo "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'>" . $terrain . "&nbsp;</td>"; }
			echo "<td style='border-top-style: solid; border-top-width: 1px'>" . $monster_info . "</td></tr>";
		endwhile;
	}
	else
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ ?>
		<tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP>&nbsp;</td><?php } ?>
		</tr>
		<?php } ?>
		<tr>
			<?php if ($type == 2){?><td NOWRAP><b>TERRAIN</b></td><?php } ?>
			<td NOWRAP><b>NAME</b></td>
			<td NOWRAP align="center"><b>AC</b></td>
			<td NOWRAP align="center"><b>HD</b></td>
			<td NOWRAP align="center"><b>MV</b></td>
			<td NOWRAP align="center"><b>THAC0</b></td>
			<td NOWRAP align="center"><b>ATK</b></td>
			<td NOWRAP align="center"><b>DMG</b></td>
			<td NOWRAP align="center"><b>#APP</b></td>
			<td NOWRAP align="center"><b>SV</b></td>
			<td NOWRAP align="center"><b>ML</b></td>
			<td NOWRAP align="center"><b>TT</b></td>
			<td NOWRAP align="center"><b>AL</b></td>
			<td NOWRAP align="center"><b>LV</b></td>
			<td NOWRAP align="center"><b>XP</b></td>
			<td NOWRAP align="center"><b>PAGE</b></td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP><b>TERRAIN</b></td><?php } ?>
		</tr>
		<?php while ($ary=wz_fetch_assoc($res)) : ?>
			<tr>
				<?php if ($type == 2){?><td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $terrain; ?>&nbsp;</td><?php } ?>
				<td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[name]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[ac]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[hd]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[move]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[thaco]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[atk]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[dmg]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[enc]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[spdef]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[bravery]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[loot]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[al]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[difficulty]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[xp]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[lair]; ?>&nbsp;</td>
				<?php if ($show_terrain > 0 && $type != 2){ ?><td style="border-top-style: solid; border-top-width: 1px"><?php echo getTerrains($x_game, $ary[location], $ary[swimmer]); ?></td><?php } ?>
			</tr>
			<?php if ( $ary[description] != "" && $show_detail_monster_info > 0 ){ ?>
				<tr>
					<?php if ($type == 2){?><td NOWRAP>&nbsp;</td><?php } ?>
					<td colspan="15"><?php echo $ary[description]; ?></td>
				</tr>
			<?php } ?>
		<?php endwhile;
	}

} else {
	if ($statb == 2)
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ echo "<tr><td colspan='2' NOWRAP>&nbsp;</td>"; }
		echo "<tr>";
		if ($type == 2){ echo "<td NOWRAP><b>Terrain</b></td>"; }
		echo "<td NOWRAP><b>Statistics</b></td></tr>";
		while ($ary=wz_fetch_assoc($res)) : include("functions/stat_blocks.php");
			echo "<tr>";
			if ($type == 2){ echo "<td NOWRAP style='border-top-style: solid; border-top-width: 1px'>" . $terrain . "&nbsp;</td>"; }
			echo "<td style='border-top-style: solid; border-top-width: 1px'>" . $monster_info . "</td></tr>";
		endwhile;
	}
	else
	{
		if (($switch > 0) && ($switch < $cytrval) && ($trn != "")){ ?>
		<tr>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<td NOWRAP>&nbsp;</td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP>&nbsp;</td><?php } ?>
		</tr>
		<?php } ?>
		<tr>
			<?php if ($type == 2){?><td NOWRAP><b>Terrain</b></td><?php } ?>
			<td NOWRAP><b>Name</b></td>
			<td NOWRAP align="center"><b>Rarity</b></td>
			<td NOWRAP align="center"><b>Group</b></td>
			<td NOWRAP align="center"><b>Size</b></td>
			<td NOWRAP align="center"><b>Move</b></td>
			<td NOWRAP align="center"><b>Armor</b></td>
			<td NOWRAP align="center"><b>Might</b></td>
			<td NOWRAP align="center"><b>Atks</b></td>
			<td NOWRAP align="center"><b>Dmg</b></td>
			<td NOWRAP align="center"><b>Hit<br>Score</b></td>
			<td NOWRAP><b>Unique<br>Attacks</b></td>
			<td NOWRAP><b>Unique<br>Defenses</b></td>
			<td NOWRAP align="center"><b>Magic<br>Protection</b></td>
			<td NOWRAP align="center"><b>Dwelling</b></td>
			<td NOWRAP align="center"><b>Intellect</b></td>
			<td NOWRAP align="center"><b>Morality</b></td>
			<td NOWRAP align="center"><b>Level</b></td>
			<?php if ($show_terrain > 0 && $type != 2){ ?><td NOWRAP><b>Terrain</b></td><?php } ?>
		</tr>
	<?php while ($ary=wz_fetch_assoc($res)) : ?>
			<tr>
				<?php if ($type == 2){?><td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $terrain; ?>&nbsp;</td><?php } ?>
				<td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[name]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[freq]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[enc]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[size]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[move]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[ac]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[hd]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[atk]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[dmg]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[thaco]; ?>&nbsp;</td>
				<td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[spatk]; ?>&nbsp;</td>
				<td NOWRAP style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[spdef]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[mr]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[lair]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[iq]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px"><?php echo $ary[al]; ?>&nbsp;</td>
				<td NOWRAP align="center" style="border-top-style: solid; border-top-width: 1px">&nbsp;<?php echo $ary[level]; ?>&nbsp;</td>
				<?php if ($show_terrain > 0 && $type != 2){ ?><td style="border-top-style: solid; border-top-width: 1px"><?php echo getTerrains($x_game, $ary[location], $ary[swimmer]); ?></td><?php } ?>
			</tr>
		<?php endwhile;
	}
}
	$switch = $switch - 1;

	endwhile; ?>

</table><?php

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>