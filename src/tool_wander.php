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

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Wandering Enemies</p>";
	echo "<p style='text-align: justify;'>This is the place to make a table of wandering enemies that you can randomly roll against. Many games use these types of tables to add a little bit of a surprise element to characters exploring dangerous areas. This tool will make you a random table based off the level you choose and even the area's terrain if you want. You then need to choose a quantity of table entries you want to have generated (meaning that if you want to roll a 1d12 against the table, then you would need to choose a Quantity of 12).";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_package'>";

	if ( $x_game == "Swords & Six-Siders" ){ $levelcnt = 6; } else { $levelcnt = 100; }
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cell">Level:</span>
			<?php if ($x_game == "Swords & Six-Siders"){ ?>
				<span class="cell"><select size="1" id="DropOption" name="x_level"><option></option><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?><option value='100'>6+</option></select></span>
			<?php } else { ?>
				<span class="cell"><select size="1" id="DropOption" name="x_level"><option></option><?php $runner=19; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?><option value='100'>20+</option></select></span>
			<?php } ?>
			</div>
			<div class="row">
				<span class="cell">Quantity:</span>
				<span class="cell">
					<select id="DropOption" name="x_amount">
						<?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select>
				</span>
			</div>
<?php if ($x_game == "OSRIC"){?>
			<div class="row">
				<span class="cull">Monsters of Myth:</span>
				<span class="cell"><input type="checkbox" name="x_mom" value="1"></span>
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
<?php if ($x_game == "Labyrinth Lord"){ ?>
			<div class="row">
				<span class="cull">AEC:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="aec" value="1"></span>
			</div>
<?php } ?>
<?php if ($x_game == "Broken Urthe" || $x_game == "Gamma World" || $x_game == "Metamorphosis Alpha"){?>
			<div class="row">
				<span class="cull">Mutated Animals:</span>
				<span class="cell"><input type="checkbox" name="x_mutate" value="1"></span>
			</div>
<?php } ?>

<?php if ($x_game == "Tunnels & Trolls 5th Edition" || $x_game == "Tunnels & Trolls 7th Edition" || $x_game == "Tunnels & Trolls Deluxe"){?>
			<div class="row">
				<span class="cell">Difficulty:</span>
				<span class="cell">
					<select id="DropOption" name="x_ttlvl">
						<option value="9">Easy</option>
						<option value="1" selected>Normal</option>
						<option value="2">Challenging</option>
						<option value="3">Difficult</option>
						<option value="4">Heroic</option>
						<option value="5">Epic</option>
					</select>
				</span>
			</div>
<?php } ?>
<?php if ($x_game != "Data") { ?>
			<div class="row">
				<span class="cell">Terrain:</span>
				<span class="cell">
					<select id="DropOption" name="x_terrain">
							<option></option>
							<option value="DG"><?php if (($x_game == "Broken Urthe") || ($x_game == "Mutant Future") || ($x_game == "Gamma World")){ echo "Ruins"; } else if ($x_game == "Metamorphosis Alpha"){ echo "Interior Areas"; } else { echo "Dungeon"; } ?></option>
						<?php if ($x_game == "Mutant Future") { ?>
							<option value="TW">Settlement</option>
							<option value="RD">Wastelands</option>
						<?php } else if (($x_game == "Broken Urthe") || ($x_game == "Gamma World")) { ?>
							<option value="RD">Wastelands</option>
						<?php } else if ($x_game == "Metamorphosis Alpha") { ?>
							<option value="RD">Harsh Lands</option>
						<?php } ?>
							<option value="PF">Forest</option>
							<option value="PH">Hills</option>
							<option value="PM">Mountains</option>
							<option value="PP">Plains</option>
							<option value="PS">Swamp</option>
							<option value="PD">Desert</option>
							<option value="FW">Freshwater</option>
							<option value="SW">Sea</option>
							<option value="CF">Snowy Forest</option>
							<option value="CH">Snowy Hills</option>
							<option value="CM">Snowy Mountains</option>
							<option value="CP">Snowy Plains</option>
							<option value="TF">Jungle/Tropics Forest</option>
							<option value="TH">Jungle/Tropics Hills</option>
							<option value="TM">Jungle/Tropics Mountains</option>
							<option value="TS">Jungle/Tropics Swamp</option>
						<?php if ($x_game == "BD&D") { ?>
							<option value="VG">Settlement</option>
							<option value="LW">Lost World</option>
						<?php } ?>
					</select>
				</span>
			</div>
<?php } ?>
<?php if ($x_game == "Swords & Six-Siders" || $x_game == "BD&D"){?>
			<div class="row">
				<span class="cull">Show Descriptions:</span>
				<span class="cell"><input type="checkbox" id="InputOption" checked name="x_describe" value="1"></span>
			</div>
<?php } ?>
<?php if ($x_game == "Data") { ?>
			<div class="row">
				<span class="cell">Terrain:</span>
				<span class="cell"><input id="InputOption" type="text" name="x_code" size="3"></span>
			</div>
			<div class="row">
				<span class="cell">Data:</span>
				<span class="cell"><textarea id="InputOption" rows="4" name="x_data" cols="90"></textarea></span>
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

$process_0 = 1;

$ttlvl = $_POST['x_ttlvl'];
$x_game = $_POST['x_package'];
$x_level = $_POST['x_level']+0;
$x_code = $_POST['x_code'];
$x_describe = $_POST['x_describe'];
	$show_detail_monster_info = $x_describe;
$x_amount = $_POST['x_amount'];
	$enc_numbers = $x_amount;
$s_amount = $x_amount;
$x_mutants = $_POST['x_mutate'];
$x_mom = $_POST['x_mom'];
$dd_ff = $_POST['dd_ff'];
$dd_mm2 = $_POST['dd_mm2'];
$x_terrain = $_POST['x_terrain'];

$jpg = "tools_wander.jpg";

$x_extra = $_POST['x_extra'];
	if (($x_game == "OSRIC") && ($x_mom > 0))
	{
		$take = "(creator='OSRIC' OR creator='MoM')";
		$bottom_notices = 1;
	}
	else if ($x_game == "OSRIC")
	{
		$take = "creator='OSRIC'";
		$bottom_notices = 1;
	}
	else if ($x_game == "Swords & Six-Siders")
	{
		$take = "creator='SX'";
		$bottom_notices = 18;
	}
	else if ($x_game == "Labyrinth Lord")
	{
		$aec = $_SESSION["SESSION_ADD_AEC"] = $_POST['aec']+0;
		if ($aec > 0){$take = "(creator LIKE 'AEC%' OR creator LIKE 'LL%')";}
		else {$take = "(creator LIKE 'LL%')";}
		$bottom_notices = 2;
	}
	else if ($x_game == "Broken Urthe")
	{
		$take = "creator='BU'";
		$jpg = "tools_wander_apoc.jpg";
		$bottom_notices = 8;
	}
	else if ($x_game == "Gamma World")
	{
		$take = "creator='BU'";
		$jpg = "tools_wander_apoc.jpg";
		$bottom_notices = 14;
	}
	else if ($x_game == "Metamorphosis Alpha")
	{
		$take = "creator='BU'";
		$jpg = "tools_wander_apoc.jpg";
		$bottom_notices = 15;
	}
	else if ($x_game == "Mutant Future")
	{
		$take = "creator='MF'";
		$bottom_notices = 3;
		$jpg = "tools_wander_apoc.jpg";
	}
	else if ($x_game == "Swords & Wizardry")
	{
		$take = "creator='SW'";
		$bottom_notices = 5;
	}
	else if ($x_game == "BFRPG")
	{
		$take = "creator='BFRPG'";
		$bottom_notices = 11;
	}
	else if ($x_game == "BD&D")
	{
		$take = "creator='BX'";
		$bottom_notices = 13;
	}
	else if ($x_game == "AD&D")
	{
		$take = "(creator LIKE 'SRC: MM %' OR ";
		if ($dd_ff > 0){$take = $take . "creator LIKE 'SRC: FF %' OR ";}
		if ($dd_mm2 > 0){$take = $take . "creator LIKE 'SRC: MM2 %' OR ";}
		$take = $take . "creator = 'ADDDD')";
		$bottom_notices = 13;
	}
	else if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
	{
		$take = "creator='TT'";
		$bottom_notices = 6;
		if ($x_game == "Tunnels & Trolls 5th Edition"){$tt5 = 1;} else {$tt7 = 1;}
	}
	else {$x_datas = $_POST['x_data']; include("functions/data_process.php"); $running_data = 1;}

?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
	<tr>
		<td width="75%"><img border="0" src="pics_tools/<?php echo $jpg; ?>"></td>
		<td width="25%" align="right"><font size='5'><?php if ($x_level > 0){echo "Level " . $x_level; } ?></font></td>
	</tr>
</table>

<hr size='1' color='#000000'>

<?php

if (($my_enemy_max > 0) || ($running_data != 1))
{

echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";

	if ($running_data == 1)
	{
		shuffle($my_enemy_array);

		$i = 0;

		while ($x_amount > 0) :

			$my_enemy_pick = explode("^^^", $my_enemy_array[$i]);

			if ( $my_enemy_pick[0] == "")
			{
				shuffle($my_enemy_array);
				$i = 0;
				$my_enemy_pick = explode("^^^", $my_enemy_array[$i]);
			}

			if ($ocolor == "FFFFFF"){$ocolor = "D7D7D7";} else {$ocolor = "FFFFFF";} $onct = $onct + 1; if ($s_amount >= $onct){ ?>

			<tr>
				<td valign="middle" align="center" bgcolor="#<?php echo $ocolor; ?>"><font size="2">&nbsp;&nbsp;&nbsp;<?php echo $onct; ?>&nbsp;&nbsp;&nbsp;</font></td>
				<td bgcolor="#<?php echo $ocolor; ?>"><p style="margin-top: 0; margin-bottom: 0"><font size="2"><?php echo $my_enemy_pick[0]; ?></font></p></td>
			</tr>

			<?php } $x_amount = $x_amount - 1;	$i = $i + 1;

		endwhile;
	}
	else
	{
		$table = "creatures" . createRandomCode();
		if ($x_level > 0){$x_level = $x_level + $lvl_modifier;} else {$x_level = 100;}

		$qry = "CREATE TEMPORARY TABLE $table SELECT id FROM monsters_rpgs WHERE $take AND location LIKE '%$x_terrain%' AND difficulty<=($x_level)";
		wz_query( $connection, $qry ); /*qry*/

		$qry = "SELECT id, freq_code FROM monsters_rpgs WHERE $take AND location LIKE '%$x_terrain%' AND level<=($x_level) AND freq_code>1";
		$res = wz_query( $connection, $qry ); /*qry*/
		$num = wz_num_rows($res);

		while ($ary=wz_fetch_assoc($res)) :
			$frequency = $ary[freq_code] - 1;
			while ($frequency > 0) :
				$valids = $valids . $ary[id] . ", ";
				$frequency = $frequency - 1;
			endwhile;
		endwhile;

		if ($num > 0){ $valids = substr($valids, 0, -2); wz_query($connection, "INSERT INTO $table (id) VALUES ($valids)"); }

		while ($enc_numbers > 0) :

			$qry = "SELECT * FROM $table, monsters_rpgs WHERE $table.id=monsters_rpgs.id ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), 
				RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), 
				RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $enc_numbers";
			$res = wz_query( $connection, $qry ); /*qry*/

			while ($ary=wz_fetch_assoc($res)) :

				$show_detail_monster_info = $x_describe; 

				include("functions/stat_blocks.php");

				if ($enc_numbers > 0)
				{
					if ($ocolor == "FFFFFF"){$ocolor = "D7D7D7";} else {$ocolor = "FFFFFF";} $onct = $onct + 1; if ($s_amount >= $onct){ ?>

					<tr>
						<td valign="middle" align="center" bgcolor="#<?php echo $ocolor; ?>"><font size="2">&nbsp;&nbsp;&nbsp;<?php echo $onct; ?>&nbsp;&nbsp;&nbsp;</font></td>
						<td bgcolor="#<?php echo $ocolor; ?>"><p style="margin-top: 0; margin-bottom: 0"><font size="2"><?php echo $monster_info; ?></font></p></td>
					</tr>

					<?php }
				}

				$enc_numbers = $enc_numbers - 1;

			endwhile;

		endwhile;
	}

?></table>

<?php } else { echo "<font size='6'>No Enemies Found!</font>";}

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>