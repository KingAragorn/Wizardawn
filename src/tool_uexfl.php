<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }
$cave = 0; if ( isset( $_POST["use_cave"] ) ){ $cave = $_POST["use_cave"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Labyrinth Lord";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	$extra_disclaimer = "mf";

	if ($cave == "Crashed Spaceship"){$word_cave = "Crashed Spaceship";}
	else {$word_cave = "Exodus Spaceship";}

	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' action='" . $my_form_name . "'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Futuristic Maze</p>";
	echo "<p style='text-align: justify;'>";
	?>

	<?php if ($word_cave != "Crashed Spaceship") { ?>
		This will create a totally unique exodus spaceship for your wizards and warriors to explore.  This is for use with Labyrinth Lord, but uses Mutant Future creatures for the ship inhabitants.  There are various traps and room decorations to make this ship a dangerous place.  The exodus spaceship provides an adventure on a derelict ship that was carrying many different animals on various decks, with different types of climates.  An irradiated accident, and many passing years, have caused most crew to perish and many living creatures on board to mutate into something new.  This should help you quickly create a unique futuristic adventure for your Labyrinth Lord game.
	<?php } else { ?>
		This will create a totally unique crashed spaceship for your wizards and warriors to explore.  This is for use with Labyrinth Lord, but uses Mutant Future creatures for the ship inhabitants.  There are various traps and room decorations to make this ship a dangerous place.  This should help you quickly create a unique futuristic adventure for your Labyrinth Lord game.
	<?php } ?>
		<br><br>

		<div id="div_table">
			<div class="row">
				<span class="cell">Map Type:</span>
				<span class="cell">
					<select id="DropOption" name="use_cave" onchange="submit()">
						<option <?php if ($word_cave == "Exodus Spaceship"){echo "selected";} ?>>Exodus Spaceship</option>
						<option <?php if ($word_cave == "Crashed Spaceship"){echo "selected";} ?>>Crashed Spaceship</option>
					</select>
				</span>
			</div>
			<div style="height:" 1px; class="row">
				<span style="height:" 1px;class="cell">&nbsp;</span>
				<span style="height:" 1px;class="cell">
					<?php

					echo "</form><form style='height: 1px;' style='margin-bottom:0; margin-top:0;' target='_blank' method='POST' action='" . $my_form_name . "?run=1'>";
					echo "<input style='height: 1px;' type='hidden' name='program_user' value='1'>";

					echo "<input style='height: 1px;' type='hidden' name='x_mappack' value='" . $cave . "'>";

					include("game_options.php");
					echo "<input style='height: 1px;' type='hidden' value='" . $x_game . "' name='x_package'>";

					$res1 = wz_query($connection, "SELECT * FROM monsters_rpgs WHERE creator='MF' ORDER BY name");
					$res2 = wz_query($connection, "SELECT * FROM monsters_rpgs WHERE creator='MF' ORDER BY name");

					$res3 = wz_query($connection, "SELECT * FROM monsters_rpgs WHERE creator='LL' OR creator='AEC' ORDER BY name");
					$res4 = wz_query($connection, "SELECT * FROM monsters_rpgs WHERE creator='LL' OR creator='AEC' ORDER BY name");
					?>
				</span>
			</div>
			<div class="row">
				<span class="cell">Map Style:</span>
				<span class="cell"><input type="radio" value="0" checked id="InputOption" name="geomorph_colored">Classic Blue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="1" name="geomorph_colored">Black &amp; White</font></span>
			</div>
			<div class="row">
				<span class="cell">Name:</span>
				<span class="cell"><input type="text" id="InputOption" name="x_area" size="30"></span>
			</div>
			<div class="row">
				<span class="cell">Currency:</span>
				<span class="cell"><input type="text" value="gold" id="InputOption" name="x_money" size="10"></span>
			</div>
			<div class="row">
				<span class="cell">Level:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_level"><option></option><?php $runner=19; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?><option value='100'>20+</option></select></span>
			</div>
			<div class="row">
				<span class="cell">Characters:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_characters"><option></option><?php $runner=20; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>&nbsp; &nbsp;...a &quot;level&quot; is required for this.</span>
			</div>
			<div class="row">
				<span class="cell"><?php if ($word_cave != "Exodus Spaceship") { ?>Outer<?php } else { ?>Climate<?php } ?> Terrain:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_terrain">
				<?php if ($word_cave != "Exodus Spaceship") { ?><option></option><?php } ?>
					<option value="PF">Forest</option>
					<option value="PH">Hills</option>
					<option value="PM">Mountains</option>
					<option value="PP">Plains</option>
					<option value="PS">Swamp</option>
					<option value="PD">Desert</option>
				<?php if ($word_cave != "Exodus Spaceship") { ?>
					<option value="FW">Freshwater</option>
					<option value="SW">Sea</option>
				<?php } ?>
					<option value="CF">Snowy Forest</option>
					<option value="CH">Snowy Hills</option>
					<option value="CM">Snowy Mountains</option>
					<option value="CP">Snowy Plains</option>
					<option value="TF">Jungle/Tropics Forest</option>
					<option value="TH">Jungle/Tropics Hills</option>
					<option value="TM">Jungle/Tropics Mountains</option>
					<option value="TS">Jungle/Tropics Swamp</option>
				</select></span>
			</div>
			<div class="row">
				<span class="cell">Map Width:</span>
				<span class="cell"><select size="1" id="DropOption" name="map_wide">
					<?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select></span>
			</div>
			<div class="row">
				<span class="cell">Map Height:</span>
				<span class="cell"><select size="1" id="DropOption" name="map_high">
					<?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select>&nbsp;&nbsp;&nbsp;&nbsp;...or use your own map...</span>
			</div>
			<div class="row">
				<span class="cell">My Map's Rooms:</span>
				<span class="cell"><select size="1" id="DropOption" name="map_rooms"><option></option>
					<?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select></span>
			</div>
			<div class="row">
				<span class="cell">First Main Enemy:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_enemy_1">
					<option></option>
					<?php while ($ary=wz_fetch_assoc($res1)) : ?>
							<option value="<?php echo $ary['id']; ?>"><?php echo $ary['name']; ?> [<?php echo $ary['level']; ?>]</option>
					<?php endwhile; ?>
					<?php while ($ary=wz_fetch_assoc($res3)) : $pulnam = explode("(", $ary['name']); ?>
							<option style="color: #FCFF00" value="<?php echo $ary['id']; ?>"><?php echo $pulnam[0]; ?> [<?php echo $ary['level']; ?>]</option>
					<?php endwhile; ?>
				</select>&nbsp;&nbsp;<select size="1" id="DropOption" name="x_main_chance_1"><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Second Main Enemy:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_enemy_2">
					<option></option>
					<?php while ($ary=wz_fetch_assoc($res2)) : ?>
							<option value="<?php echo $ary['id']; ?>"><?php echo $ary['name']; ?> [<?php echo $ary['level']; ?>]</option>
					<?php endwhile; ?>
					<?php while ($ary=wz_fetch_assoc($res4)) : $pulnam = explode("(", $ary['name']); ?>
							<option style="color: #FCFF00" value="<?php echo $ary['id']; ?>"><?php echo $pulnam[0]; ?> [<?php echo $ary['level']; ?>]</option>
					<?php endwhile; ?>
				</select>&nbsp;&nbsp;<select size="1" id="DropOption" name="x_main_chance_2"><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell"><?php if ($word_cave != "Exodus Spaceship") { ?>Outer<?php } else { ?>Climate<?php } ?> Visitors:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_outside" value="1"></span>
			</div>
			<div class="row">
				<span class="cell">Mix Monsters:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_mixup" value="1"></span>
			</div>
			<div class="row">
				<span class="cell">Atmosphere:</span>
				<span class="cell"><select size="1" id="DropOption" name="atmo"><option value="999">No Atmosphere</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %&nbsp;chance of unusual atmosphere</span>
			</div>
			<div class="row">
				<span class="cell">Enemy:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_c_c"><option>35</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %
				&nbsp;&nbsp;&nbsp;Min <select size="1" id="DropOption" name="x_c_c_min"><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Max <select size="1" id="DropOption" name="x_c_c_max"><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Low <select size="1" id="DropOption" name="x_c_c_low"><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Trap:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_t_c"><option>10</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %
				&nbsp;&nbsp;&nbsp;Min <select size="1" id="DropOption" name="x_t_c_min"><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Max <select size="1" id="DropOption" name="x_t_c_max"><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Low <select size="1" id="DropOption" name="x_t_c_low"><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Contents:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_u_c"><option>70</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %
				&nbsp;&nbsp;&nbsp;Min <select size="1" id="DropOption" name="x_u_c_min"><?php $runner=25; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Max <select size="1" id="DropOption" name="x_u_c_max"><option>10</option><?php $runner=25; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Low <select size="1" id="DropOption" name="x_u_c_low"><option>5</option><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Loot:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_l_c"><option>20</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %
				&nbsp;&nbsp;&nbsp;Min <select size="1" id="DropOption" name="x_l_c_min"><?php $runner=25; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Max <select size="1" id="DropOption" name="x_l_c_max"><option>5</option><?php $runner=25; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Low <select size="1" id="DropOption" name="x_l_c_low"><option>20</option><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Loot Trapped:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_rigged_chance"><option>30</option><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Loot Adjustment:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_adjust"><option>2</option><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Cash Amount:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_cut"><option>100</option><?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Tech Items:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_low_tech"><option>100</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
		</div>

		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create"><br><br>

		<div id="div_table">
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Choose a NAME for your adventure.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Choose a CURRENCY for your world, which is defaulted to "gold". You may have silver, bronze, or batteries. If left blank, the currency will be "gold".*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Choose a LEVEL for your adventure.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Choose how many CHARACTERS and followers are going to traverse this adventure. Choosing this option will better calculate some hit points for enemies but requires to have the LEVEL set to do it.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Select <?php if ($word_cave != "Exodus Spaceship") { ?>an OUTER<?php } else { ?>a CLIMATE<?php } ?> TERRAIN for random encounters <?php if ($word_cave == "Exodus Spaceship") { ?>in the climate area<?php } else { ?>outside the spaceship<?php } ?>.<?php if ($word_cave != "Exodus Spaceship") { ?>*<?php } ?></span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Choose a MAP WIDTH and HEIGHT. If you have your own map, then select the number of rooms it has.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Enter up to 2 MAIN ENEMIES that are often found in this ship, with the % chance they appear.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">If you have selected some <?php if ($word_cave != "Exodus Spaceship") { ?>OUTER<?php } else { ?>CLIMATE<?php } ?> TERRAIN, checking the <?php if ($word_cave != "Exodus Spaceship") { ?>OUTER<?php } else { ?>CLIMATE<?php } ?> VISITORS box may have those creatures wander <?php if ($word_cave == "Exodus Spaceship") { ?>into the main ship areas<?php } else { ?>into your spaceship<?php } ?>. This does not work with freshwater or sea creatures.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">You may MIX monsters from both Mutant Future &amp; Labyrinth Lord.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Then enter your % chance for having an atmosphere in an area that is unusual. You can also decide to have no atmosphere listed for the areas.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Then enter your % chances for areas to have ENEMIES, TRAPS, CONTENTS, and LOOT appear in the complex.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Select a MINimum and MAXimum amount of ENEMIES, TRAPS, CONTENTS, and LOOT that may appear in the complex.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Select a LOW ratio for your MIN and MAX values. This allows you to fine tune how often a MAX value occurs. The higher your LOW value, the less often the MAX value will be achieved.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Although the TRAP section covers rooms, this allows you to set how often LOOT is trapped.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">If you want to do a LOOT ADJUSTMENT, then set the additional % chance per level of the enemy added to the LOOT % chance.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Do you notice too much cash for a 3 character group? Maybe the characters are getting a little too rich. Then you can set the CASH AMOUNT to a lower percentage of cash that appear in the loot.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Do you want the more advanced items rare? Then you can set the TECH ITEMS to a lower percentage that appear in the loot.*</span>
			</div>
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

$x_mappack = $_POST['x_mappack'];
	if ($x_mappack == "Crashed Spaceship"){$x_mappack = "Spaceship";}
$x_terrain = $_POST['x_terrain'];
$x_crossover = "Goblinoid";
$atmo = $_POST['atmo'];

if ($x_mappack == "Spaceship")
{
	$v_scare = "room";
	$v_loot = "SPACESHIP";
	$v_enct = "OUTSIDE THE SPACESHIP";
	$v_tech = 1;
	$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "terrain='scifi-ship'";
	$terra9 = "terrain='scifi-ship' AND spot=''";
}
else
{
	$v_scare = "room";
	$v_loot = "SPACESHIP";
	$v_enct = "IN THE CLIMATE AREA";
	$v_tech = 1;
	if (mt_rand(1,100) > 30)
	{
		$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "terrain='scifi-ma-desert'";
		$terra9 = "terrain='scifi-ma-desert' AND more='plain'";
		$terra9m = "terrain='scifi-ma-desert' AND more!='plain'";
	}
	else
	{
		$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "terrain='scifi-ma-woods'";
		$terra9 = "terrain='scifi-ma-woods' AND more='plain'";
		$terra9m = "terrain='scifi-ma-woods' AND more!='plain'";
	}
}

$x_area = stripslashes($_POST['x_area']);
   if ($x_area == ""){$x_area = $x_mappack;}

$x_enemy_1 = $_POST['x_enemy_1'];
$x_main_chance_1 = $_POST['x_main_chance_1'];
	if (($x_enemy_1 > 0) && ($x_main_chance_1 > 0)){$cmd_monster_1 = "OR id=" . $x_enemy_1;}
$x_enemy_2 = $_POST['x_enemy_2'];
$x_main_chance_2 = $_POST['x_main_chance_2'];
	if (($x_enemy_2 > 0) && ($x_main_chance_2 > 0)){$cmd_monster_2 = "OR id=" . $x_enemy_2;}

$x_rigged_chance = $_POST['x_rigged_chance'];
$x_adjust = $_POST['x_adjust'];
$x_outside = $_POST['x_outside'];
$x_level = $_POST['x_level']+0;
$x_characters = $_POST['x_characters']+0;
$x_cut = $_POST['x_cut'];
$x_low_tech = $_POST['x_low_tech'];
$x_mixup = $_POST['x_mixup'];

	if ($x_level > 0)
	{
		$x_module = "<br><font size='4'>An Adventure For Level " . $x_level . " Characters</font>";
		if ($x_characters > 0){$x_module = "<br><font size='4'>An Adventure For " . $x_characters . " Level " . $x_level . " Characters</font>";}
	}

$x_game = "Labyrinth Lord";
$x_money = $_POST['x_money'];
	if (str_replace(" ", "", $x_money) == ""){$x_money = "gold";}

$x_might1 = 1;
$x_might2 = 8;

$x_c_c = $_POST['x_c_c']; // ENEMY
$x_c_c_min = $_POST['x_c_c_min']; // MIN
$x_c_c_max = $_POST['x_c_c_max']; // MAX
$x_c_c_low = 0 + $_POST['x_c_c_low']; // LOW
	if ($x_c_c_min > $x_c_c_max){$x_c_c_min = $x_c_c_max;}
$x_t_c = $_POST['x_t_c']; // TRAP
$x_t_c_min = $_POST['x_t_c_min']; // MIN
$x_t_c_max = $_POST['x_t_c_max']; // MAX
$x_t_c_low = 0 + $_POST['x_t_c_low']; // LOW
	if ($x_t_c_min > $x_t_c_max){$x_t_c_min = $x_t_c_max;}
$x_u_c = $_POST['x_u_c']; // DECO
$x_u_c_min = $_POST['x_u_c_min']; // MIN
$x_u_c_max = $_POST['x_u_c_max']; // MAX
$x_u_c_low = 0 + $_POST['x_u_c_low']; // LOW
	if ($x_u_c_min > $x_u_c_max){$x_u_c_min = $x_u_c_max;}
$x_l_c = $_POST['x_l_c']; // LOOT
$x_l_c_min = $_POST['x_l_c_min']; // MIN
$x_l_c_max = $_POST['x_l_c_max']; // MAX
$x_l_c_low = 0 + $_POST['x_l_c_low']; // LOW
	if ($x_l_c_min > $x_l_c_max){$x_l_c_min = $x_l_c_max;}

$map_wide = $_POST['map_wide'];
$map_high = $_POST['map_high'];
$map_rooms = $_POST['map_rooms'];

if ($map_rooms > 0){$key = $map_rooms;} else {

$keyed = 1;

include("functions/map_draw.php"); ?> 

<hr>
<?php } ?>
<font size="8"><?php echo $x_area . $x_module; ?></font><hr>
<?php

	if ($x_level > 0){$r_level = $x_level; $f_level = $x_level + $lvl_modifier;} else {$r_level = mt_rand(1,10); $f_level = 100;}

$ship_robot = "GOLEM, METAL (Robot) [ <b>ENC:</b> 1d8 <b>| MV:</b> 180` (60`) <b>| AC:</b> " . PAconvertArmor(($r_level - 2)) . " <b>| HD:</b> " . $r_level . " <b>| ATK:</b> 1 (weapon) <b>| DMG:</b> " . PAgetWeapon(5,$x_game) . " <b>| SV:</b> " . $r_level . " <b>| LVL:</b> " . $r_level . " <b>| THAC0:</b> " . PAconvertHit($r_level) . " ]";

	$table = "expd_ref_" . createRandomCode();

		$bottom_notices = 4;

		if ($x_mixup > 0){$edor = "(creator='MF' OR creator='LL' OR creator='AEC')";} else {$edor = "creator='MF'";}

		$my_terrain = "";

		if ($x_terrain != "")
		{
			if ($x_mixup > 0){$org = "";} else {$org = "AND creator!='AEC' AND creator!='LL'";}
			if ($x_terrain == "PF"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "PH"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "PM"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "PP"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "PS"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "PD"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "FW"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "SW"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "CF"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "CH"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "CM"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "CP"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "TF"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "TH"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "TM"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
			else if ($x_terrain == "TS"){$my_terrain = "location LIKE '%" . $x_terrain . "%' AND (creator='LL' OR creator='MF' OR creator='AEC') $org";}
		}

		if (($x_outside > 0) && ($x_terrain != "") && ($x_terrain != "FW") && ($x_terrain != "SW"))
		{
			$more = $my_terrain;
		}
		else
		{
			$more = "location LIKE '%DG%'";
		}

		$qry = "CREATE TEMPORARY TABLE $table SELECT * FROM monsters_rpgs WHERE $edor AND $more AND level<=$f_level";
		wz_query( $connection, $qry ); /*qry1*/

		if ($x_mixup > 0)
		{
			$qry = "INSERT INTO $table SELECT * FROM monsters_rpgs WHERE creator='MF' AND $more AND level<=$f_level";
			wz_query( $connection, $qry ); /*qry1b*/

			$qry = "INSERT INTO $table SELECT * FROM monsters_rpgs WHERE creator='MF' AND $more AND level<=$f_level";
			wz_query( $connection, $qry ); /*qry1b*/

			$qry = "INSERT INTO $table SELECT * FROM monsters_rpgs WHERE creator='MF' AND $more AND level<=$f_level";
			wz_query( $connection, $qry ); /*qry1b*/
		}

		$qry = "INSERT INTO $table SELECT * FROM monsters_rpgs WHERE $edor AND (id=0 $cmd_monster_1 $cmd_monster_2)";
		wz_query( $connection, $qry ); /*qry1b*/

$random_room = $key;

$y_rulez = 3; include("functions/rules.php");

while ($key > 0) :

	$room = $room + 1; 
	$key = $key - 1;

	////////////////////////////////////// ATMOSPHERE & CONTENTS /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$feeling = "";
	$decoration = "";

	$max_of_decos = $x_u_c_max;
	$min_of_decos = $x_u_c_min;
	$how_many_deco = 0;
	$decoration = "";
	$hiding_places = "START";

	if (mt_rand(1,100) <= $x_u_c)
	{
		$roll_for_deco = 100;

	    while ($max_of_decos > 0) :
		$items_deco = PAstuffMakerRoom($how_many_deco,$x_money,$v_scare,$x_mappack,$x_game,$x_cut);
		if (mt_rand(1,100) <= $roll_for_deco)
		{
			if ($items_deco[2] > 0){$hiding_places = $hiding_places . "^" . $items_deco[0] . "_" . $items_deco[1] . "_" . $items_deco[2] . "_" . $items_deco[3];}
			$decoration = $decoration . "" . $items_deco[4];
			$how_many_deco = 1;
		}
		$min_of_decos = $min_of_decos - 1;
		if ($min_of_decos > 0){$roll_for_deco = 100;} else if ($min_of_decos == 0){$roll_for_deco = $x_u_c - ceil($x_u_c*(0.01*$x_u_c_low));} else {$roll_for_deco = $roll_for_deco - ceil($x_u_c*(0.01*$x_u_c_low));}
		$max_of_decos = $max_of_decos - 1;
	    endwhile;
	}
	//echo "</font><hr color='#C0C0C0' size='8'><b>" . $room . "</b><font size='2'> - " . mapMood($x_mappack,$atmo) . $seeing . "" . $decoration . ".";

	if ($atmo == 999){ echo "</font><hr color='#C0C0C0' size='8'><b>" . $room . "</b><font size='2'> - "; if ($decoration == ""){echo "Empty of mundane items.";} else {echo "This area contains..." . substr($decoration, 33); echo ".";} }
	else { echo "</font><hr color='#C0C0C0' size='8'><b>" . $room . "</b><font size='2'> - " . mapMood($x_mappack,$atmo) . $seeing . "" . $decoration . "."; }

	////////////////////////////////////// SPECIAL ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if (2 >= mt_rand(1,100))
	{
		echo "<hr align='center' size='1'>";
		echo "<b>SOMETHING UNUSUAL IN THE ROOM...</b><br>";
		echo PAspecialMakerRoom($x_cut,$random_room,$x_game);
	}

	////////////////////////////////////// MONSTERS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$roll_for_enemy = $x_c_c;
	$max_of_monsters = $x_c_c_max;
	$min_of_monsters = $x_c_c_min;
	$cmd_villain = "WHERE id>0";
	$do_enemy_1 = 1;
	$do_enemy_2 = 1;
	$do_robot = 0;
	$level_of_monster = 0;
	$how_many_monsters = 0;

	if (mt_rand(1,100) <= $x_c_c)
	{
		$roll_for_enemy = 100;

		// DETERMINE HOW MANY MONSTERS ARE IN THE ROOM //
		while ($max_of_monsters > 0) :
			$min_of_monsters = $min_of_monsters - 1;
			if ($min_of_monsters > 0){$roll_for_enemy = 100;} else if ($min_of_monsters == 0){$roll_for_enemy = $x_c_c - ceil($x_c_c*(0.01*$x_c_c_low));} else {$roll_for_enemy = $roll_for_enemy - ceil($x_c_c*(0.01*$x_c_c_low));}
			$max_of_monsters = $max_of_monsters - 1;
			if (mt_rand(1,100) <= $roll_for_enemy){ $how_many_monsters = $how_many_monsters + 1; }
	    endwhile;

		if ($how_many_monsters > 0){echo "<hr align='center' size='1'>";}

	    while ($how_many_monsters > 0) :

			$cmd_enemy = "";
			$how_many_monsters = $how_many_monsters - 1;

			if (($x_enemy_1 > 0) && ($do_enemy_1 > 0) && (mt_rand(1,100) <= $x_main_chance_1))	{$cmd_enemy = "AND id=" . $x_enemy_1;	$do_enemy_1 = 0;}
			else if (($x_enemy_2 > 0) && ($do_enemy_2 > 0) && (mt_rand(1,100) <= $x_main_chance_2))	{$cmd_enemy = "AND id=" . $x_enemy_2;	$do_enemy_2 = 0;}

			$mqry = "SELECT * FROM $table $cmd_villain $cmd_enemy ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
			$mres = wz_query( $connection, $mqry ); /*mqry4*/
			$ary = wz_fetch_assoc($mres);

			if ((mt_rand(1,100) > 95) && ($do_robot == 0))
			{
				$do_robot = 1;
				echo $ship_robot . "<br>";
				echo calculateLife($x_level,$x_characters,1,8,$r_level,$r_level,0,$x_game) . "<br>";
				if ($r_level > $level_of_monster){$level_of_monster = $r_level;}
			}
			else
			{
				include("functions/stat_blocks.php");
				echo $monster_info . "<br>";
				if ($ary[creator] == "MF"){ $x_might1=$ary[m_hp_min]; $x_might2=$ary[m_hp_max]; echo PAcalculateLife($x_level,$x_characters,'Mutant Future',$ary[hd],$ary[difficulty],$x_might1,$x_might2,$v_scare,$how_many_monsters) . "<br>"; }
				else { echo calculateLife($x_level,$x_characters,$ary[m_app_min],$ary[m_app_max],$ary[m_hp_min],$ary[m_hp_max],$ary[m_hp_mod],$x_game,0,0,0,0,0) . "<br>"; }
				$cmd_villain = $cmd_villain . " AND id!=" . $ary[id];
				if ($ary[difficulty] > $level_of_monster){$level_of_monster = $ary[difficulty];}
			}

	    endwhile;
	}

	////////////////////////////////////// TRAPS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$roll_for_trap = $x_t_c;
	$max_of_traps = $x_t_c_max;
	$min_of_traps = $x_t_c_min;

	if (mt_rand(1,100) <= $x_t_c)
	{
		$roll_for_trap = 100;

		echo "<hr align='center' size='1'>";

	    while ($max_of_traps > 0) :
		$this_trap = PAtrapMaker($x_level,room,$x_game,$x_mutants,$x_might1,$x_might2,$v_tech,$v_scare);
		if (mt_rand(1,100) <= $roll_for_trap){ echo $this_trap[0] . "<br>"; }
		$min_of_traps = $min_of_traps - 1;
			if ($min_of_traps > 0){$roll_for_trap = 100;}
			else if ($min_of_traps == 0){$roll_for_trap = $x_t_c - ceil($x_t_c*(0.01*$x_t_c_low));}
			else {$roll_for_trap = $roll_for_trap - ceil($x_t_c*(0.01*$x_t_c_low));}

			$max_of_traps = $max_of_traps - 1;

			if ($this_trap[1] > $level_of_monster){$level_of_monster = $this_trap[1];}
	    endwhile;
	}

	////////////////////////////////////// TREASURE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$hiding_places = str_replace("START^", "", $hiding_places);
	$hiding_places = str_replace("START", "", $hiding_places);
	$hiding_spots = explode("^", $hiding_places);
	$hiding_length = strlen($hiding_places);
	$hiding = count($hiding_spots);
	$hide_it = 0;
	$sayit = 0;
	$bags_of_coins = 0;
	$sack_of_coins = 0;

	if (mt_rand(1,100) > 70){$tbox = "lying about";} else {$tbox = "in a " . PAboxMakerRoom($v_tech);}

	$treasure_chest = "<b>THESE SPECIAL ITEMS ARE LOCATED:</b> " . $tbox . ".<br>";

	if ($level_of_monster > 0){$treasure_level = $level_of_monster;} else if ($x_level > 0){$treasure_level = $x_level;} else {$treasure_level = mt_rand(1,20);}

	if (($x_rigged_chance >= mt_rand(1,100)) && ($tbox != "lying about"))
	{
		$picked_trap = PAtrapMaker($treasure_level,box,$x_game,$x_mutants,$x_might1,$x_might2,$v_tech,$v_scare);
		$treasure_chest = substr($treasure_chest, 0, -5) . ".<br><b>TRAPPED:</b>&nbsp;" . $picked_trap[0] . "<br>";
	}
		if ($level_of_monster > 0){$loot_adjust = $treasure_level * $x_adjust;} else {$loot_adjust = 0;}
		$roll_for_loot = $x_l_c + $loot_adjust;
		$dice_for_loot = $x_l_c + $loot_adjust;
		$max_of_loots = $x_l_c_max;
		$min_of_loots = $x_l_c_min;

		if (mt_rand(1,100) <= $roll_for_loot)
		{
			$roll_for_loot = 100;

			echo "<hr align='center' size='1'>";

		    while ($max_of_loots > 0) :

			$loot_size = 3;

			$chesty = explode("_", $hiding_spots[$hide_it]);

			if (($hide_it < $hiding) && ($hiding_length > 3))
			{
				if ($hide_it == 0){echo "<b>THESE SPECIAL ITEMS ARE LOCATED IN VARIOUS SPOTS...</b><br>";}
				if ((mt_rand(1,100) > 50) && ($hide_it > 0)){$chest = $secret_box; $loot_size = $secret_size;}
				else
				{
					if ($chesty[2] > 0)
					{
						$my_box = explode(" [", $chesty[0]);

						if (($chesty[3] > 0) && ($x_rigged_chance >= mt_rand(1,100)))
						{
							$picked_trap = PAtrapMaker($treasure_level,box,$x_game,$x_mutants,$x_might1,$x_might2,$v_tech,$v_scare);
							$trap_zap = "-&nbsp;TRAPPED:&nbsp;" . $picked_trap[0];
						} else {$trap_zap = "";}
						$chest = "&nbsp;(<i> Located " . $chesty[1] . " the " . $my_box[0] . "&nbsp;" . $trap_zap . "</i>)";
						$secret_box = $chest;
						$loot_size = $chesty[2];
						$secret_size = $chesty[2];
					}
				}
				if (mt_rand(1,100) <= $roll_for_loot){
					if ($bags_of_coins > 0){$ghrz = 91;} else {$ghrz = 1;}
					$my_reward = mt_rand($ghrz,100);
					if ($my_reward < 91){$my_prize = PAcurrencyBuilder($treasure_level,$loot_size,0,$x_cut,1,$x_money,$x_mappack);	$bags_of_coins = 1;}
					else if ($my_reward < 96)
					{
						$my_prize = PAGemMaker($x_cut,$x_money);
						$my_list_of_wonders = $my_prize . "^" . $room . "___" . $my_list_of_wonders;
					}
					else if ($x_low_tech >= mt_rand(1,100))
					{
						$my_prize = makeMFLLItem($treasure_level,$loot_size,$x_money,1);
						$my_list_of_wonders = $my_prize . "^" . $room . "___" . $my_list_of_wonders;
					}
					else {$my_prize = ucfirst(PAmakeNormalItem(1,1,$x_money,$v_tech,$x_game));}
						echo $my_prize . " " . $chest . "<br>";
				}
				$hide_it = $hide_it + 1;
			}
			else
			{
				if (mt_rand(1,100) <= $roll_for_loot)
				{
					if ($sayit != 1){if ($hide_it > 0){echo "<hr align='center' size='1'>";} echo $treasure_chest; $sayit = 1;}	
					if ($sack_of_coins > 0){$ghrz = 91;} else {$ghrz = 1;}
					$my_reward = mt_rand($ghrz,100);
					if ($my_reward < 91){$my_prize = PAcurrencyBuilder($treasure_level,$loot_size,1,$x_cut,1,$x_money,$x_mappack);	$sack_of_coins = 1;}
					else if ($my_reward < 96)
					{
						$my_prize = PAGemMaker($x_cut,$x_money);
						$my_list_of_wonders = $my_prize . "^" . $room . "___" . $my_list_of_wonders;
					}
					else if ($x_low_tech >= mt_rand(1,100))
					{
						$my_prize = makeMFLLItem($treasure_level,$loot_size,$x_money,1);
						$my_list_of_wonders = $my_prize . "^" . $room . "___" . $my_list_of_wonders;
					}
					else {$my_prize = ucfirst(PAmakeNormalItem(1,1,$x_money,$v_tech,$x_game));}
						echo $my_prize . "<br>";
				}
			}
			$min_of_loots = $min_of_loots - 1;
				if ($min_of_loots > 0){$roll_for_loot = 100;}
				else if ($min_of_loots == 0){$roll_for_loot = $dice_for_loot - ceil($dice_for_loot*(0.01*$x_l_c_low));}
				else {$roll_for_loot = $roll_for_loot - ceil($dice_for_loot*(0.01*$x_l_c_low));}
			$max_of_loots = $max_of_loots - 1;
		    endwhile;
		}
endwhile;


//////////////////////////////////////////////////////////////////////////////////////////////////////////

	echo "<hr color='#C0C0C0' size='8'><b>RANDOM ENCOUNTERS IN THE " . $v_loot . "...</b>";
	echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
	echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'><b>&nbsp;&nbsp;1d12&nbsp;&nbsp;&nbsp;&nbsp;</b></font></td>";
	echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'><b>" . $v_loot . " ENCOUNTER</b></font></td></tr>";

	$enc_numbers = 11;
	$xtable = "creatures_" . createRandomCode();
	
	if ($x_enemy_1 > 0){$enc_numbers = $enc_numbers - 1;	$ecmd_enemy1 = "AND id!=" . $x_enemy_1;}
	if ($x_enemy_2 > 0){$enc_numbers = $enc_numbers - 1;	$ecmd_enemy2 = "AND id!=" . $x_enemy_2;}

	$mqry = "CREATE TEMPORARY TABLE $xtable SELECT * FROM $table WHERE m_no_dungeon=0 $ecmd_enemy1 $ecmd_enemy2 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $enc_numbers";
	wz_query( $connection, $mqry ); /*mqry1*/

	if (($x_enemy_1 > 0) || ($x_enemy_2 > 0))
	{
		$mqry = "INSERT INTO $xtable SELECT * FROM $table WHERE m_no_dungeon=0 AND (id=($x_enemy_1+0) OR id=($x_enemy_2+0))";
		wz_query( $connection, $mqry ); /*mqry2*/
	}

		// ADD THE ROBOT FIRST
		$counts_enct = $counts_enct + 1;
		echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_enct . "</font></td>";
		echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $ship_robot . "</font></td></tr>";

		$make_enc = 11;

		while ($make_enc > 0) :

			$xqry = "SELECT * FROM $xtable GROUP BY name ORDER BY name";
			$xres = wz_query( $connection, $xqry ); /*xqry*/

			while ($ary=wz_fetch_assoc($xres)) :

				include("functions/stat_blocks.php");
				if ($make_enc > 0)
				{
					$counts_enct = $counts_enct + 1;
					echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_enct . "</font></td>";
					echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $monster_info . "</font></td></tr>";
				}
				$make_enc = $make_enc - 1;

			endwhile;

		endwhile;

		echo "</table>";
//////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($x_terrain != "")
{
	echo "<hr color='#C0C0C0' size='8'><b>RANDOM ENCOUNTERS " . $v_enct . "...</b>";
	echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
	echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'><b>&nbsp;&nbsp;1d12&nbsp;&nbsp;&nbsp;&nbsp;</b></font></td>";
	echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'><b>ENCOUNTER</b></font></td></tr>";

	$counts_enct = 0;

		$make_enc = 12;

		while ($make_enc > 0) :

			$xqry = "SELECT * FROM monsters_rpgs WHERE $edor AND $my_terrain ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 12";
			$xres = wz_query( $connection, $xqry ); /*xqry*/

			while ($ary=wz_fetch_assoc($xres)) :

				include("functions/stat_blocks.php");
				if ($make_enc > 0)
				{
					$counts_enct = $counts_enct + 1;
					echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_enct . "</font></td>";
					echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $monster_info . "</font></td></tr>";
				}
				$make_enc = $make_enc - 1;

			endwhile;

		endwhile;

		echo "</table>";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////

	$my_list_of_wonders = substr($my_list_of_wonders, 0, -3);
	$my_list_of_wonders = str_replace("<u>", "", $my_list_of_wonders);
	$my_list_of_wonders = str_replace("</u>", "", $my_list_of_wonders);
	$all_my_wonders = explode("___", $my_list_of_wonders);
	sort($all_my_wonders);
	$count_wonders = count($all_my_wonders);

	if (strlen($my_list_of_wonders) > 5)
	{
		echo "<hr color='#C0C0C0' size='8'><b>ARTIFACTS FOUND IN THIS " . $v_loot . "...</b>";
		$counts_wonder = 0;
		echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
		echo "<tr><td width='50' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;&nbsp;ITEM&nbsp;&nbsp;</font></td>";
		echo "<td align='center' width='50' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;&nbsp;&nbsp;ROOM&nbsp;&nbsp;&nbsp;</font></td>";
		echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>DESCRIPTION</font></td></tr>";

	while ($count_wonders > 0) :
		$wonderful = $all_my_wonders[$counts_wonder];
		$wonder = explode("^", $wonderful);
		$counts_wonder = $counts_wonder + 1;
		echo "<tr><td width='50' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_wonder . "</font></td>";
		echo "<td width='50' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $wonder[1] . "</font></td>";
		echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $wonder[0] . "</font></td></tr>";
		$count_wonders = $count_wonders - 1;
	endwhile;

		echo "</table>";

	}

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>