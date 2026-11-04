<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_data.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Data";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' target='_blank' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Random Area</p>";
	echo "<p style='text-align: justify;'>"; ?>
	Here you can create a custom area for your adventure role-playing games...complete with encounters, traps, and loot.
		<div id="div_table">
			<div class="row">
				<span class="cell">Name:</span>
				<span class="cell"><input type="text" id="InputOption" name="x_area" size="40"></span>
			</div>
			<div class="row">
				<span class="cell">Level:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_level"><option></option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cell">Areas:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_areas"><?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell">&nbsp;</span>
			</div>
			<div class="row">
				<span class="cell">Encounter:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_c_c"><option>30</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %
				&nbsp;&nbsp;Min <select size="1" id="DropOption" name="x_c_c_min"><?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;Max <select size="1" id="DropOption" name="x_c_c_max"><?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;Low <select size="1" id="DropOption" name="x_c_c_low"><option></option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Trap:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_t_c"><option>10</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %
				&nbsp;&nbsp;Min <select size="1" id="DropOption" name="x_t_c_min"><?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;Max <select size="1" id="DropOption" name="x_t_c_max"><?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;Low <select size="1" id="DropOption" name="x_t_c_low"><option></option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Contents:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_u_c"><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %
				&nbsp;&nbsp;Min <select size="1" id="DropOption" name="x_u_c_min"><?php $runner=25; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;Max <select size="1" id="DropOption" name="x_u_c_max"><option>3</option><?php $runner=25; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;Low <select size="1" id="DropOption" name="x_u_c_low"><option></option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Loot:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_l_c"><option>10</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %
				&nbsp;&nbsp;Min <select size="1" id="DropOption" name="x_l_c_min"><?php $runner=25; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;Max <select size="1" id="DropOption" name="x_l_c_max"><option>10</option><?php $runner=25; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;Low <select size="1" id="DropOption" name="x_l_c_low"><option>5</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Loot Trapped:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_rigged_chance"><option>25</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Loot Adjustment:</span>
				<span class="cell"><input type="checkbox" checked id="InputOption" name="x_adjust" value="1">
				&nbsp;&nbsp;With An Extra&nbsp;<select size="1" id="DropOption" name="x_adjustment"><option>5</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>&nbsp;% Per Encounter Level
				</span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell">&nbsp;</span>
			</div>
			<div class="row">
				<span class="cell">Terrain:</span>
				<span class="cell"><input type="text" id="InputOption" name="x_code" size="3"></span>
			</div>
			<div class="row">
				<span class="cell">Main Encounters:</span>
				<span class="cell"><textarea rows="2" id="InputOption" name="x_main" cols="90"></textarea></span>
			</div>
			<div class="row">
				<span class="cell">Main % Appear:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_main_chance"><option>50</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Data:</span>
				<span class="cell"><textarea rows="4" id="InputOption" name="x_data" cols="90"></textarea></span>
			</div>
		</div>

		<input id="SubmitButton" id="InputOption" name="Create" type="submit" value="Create">
		<br><br>
		Just copy and paste from your data file into the DATA section. This information is used to create the area...dependent on the game system you play.
		<br><br>

		<div id="div_table">
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Choose a NAME for your area. It can be simply &quot;Forest&quot; or a specific name.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Enter a numeric value of what difficulty LEVEL the area is.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Enter a numeric value of how many AREAS this place will have.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Then enter your % chances for areas to have ENCOUNTERS and/or TRAPS. Then choose a MINimum, MAXimum, and LOWer amount of such things.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Then enter your % chances for areas to have some loose CONTENTS like chairs, pictures, cobwebs, etc. Then choose a MINimum, MAXimum, and LOWer amount of such CONTENTS.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Then enter your % chances for areas to have LOOT. Then choose a MINimum, MAXimum, and LOWer amount of such LOOT.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Then enter your % chance if the LOOT is TRAPPED.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">If you want to do a LOOT ADJUSTMENT, then check that box and set the additional % chance per level of the encounter.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Enter the TERRAIN of the area you want to draw monsters from.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cell">Then enter any MAIN ENCOUNTERS for your area, if you have any. It may be a common alien or maybe a goblin that you want to appear more often than other creatures. You will then have to enter the % chance that this encounter will appear. You simply copy and paste the particular monsters from your data file here.</span>
			</div>
		</div>
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
$process_1 = 1;
$process_2 = 1;
$process_3 = 1;
$process_4 = 1;

$x_area = stripslashes($_POST['x_area']);
$x_level = $_POST['x_level']+0;
$x_areas = $_POST['x_areas'];
$x_code = $_POST['x_code'];

$x_adjust = $_POST['x_adjust'];
$x_adjustment = $_POST['x_adjustment'];

$x_rigged_chance = $_POST['x_rigged_chance'];

$x_main = $_POST['x_main'];
$x_main_chance = $_POST['x_main_chance'];
	$x_mcreatures = explode("\n", $x_main);
	$t_mcreatures = count($x_mcreatures);
	$c_mcreatures = count($x_mcreatures)-1;

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

$x_webs = $_POST['x_webs'];

$x_main_1 = $_POST['x_main_1'];
$x_main_chance_1 = $_POST['x_main_chance_1'];
$x_main_2 = $_POST['x_main_2'];
$x_main_chance_2 = $_POST['x_main_chance_2'];

$x_datas = $_POST['x_data'];

include("functions/data_process.php");

	if ($x_area != ""){?>

	<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
	  <tr>
	    <td width="75%"><font size='5'><?php if ($x_area != ""){echo stripslashes($x_area);} ?></font></td>
	    <td width="25%" align="right"><font size='5'><?php if ($x_level > 0){echo "Level " . $x_level; } ?></font></td>
	  </tr>
	</table>
	<?php } else if ($x_level > 0){ echo "<p style='margin-top: 0; margin-bottom: 0'><font size='5'>Level ". $x_level . "</font></p>"; }

	echo "<hr size='1' color='#000000'>";

	while ($x_areas > 0) :

		$uhoh = 0;
		$elevel = 0;
		$adjuster = 0;
		$x_line = $x_line + 1;

		echo "<font size='2'><p style='margin-top: 0; margin-bottom: 0'>" . $x_line . ". ";

/////////////////////////////// PUT ANY ENEMIES IN THE ROOM ///////////////////////////////////////////////////////////////////////////////////////////////

		$monster_mash = mt_rand($x_c_c_min,$x_c_c_max);
		$monster_mish = $x_c_c_low;
		while ($monster_mash > 0) :
		if (($x_c_c-($monster_mish-$x_c_c_low)) >= mt_rand(1,100))
		{
			$y_mcreature = $x_mcreatures[mt_rand(0,$c_mcreatures)];
			if (($t_mcreatures > 0) && ($x_main_chance >= mt_rand(1,100)) && (trim($y_mcreature) != ""))
			{
				$z_mcreature = explode("\t", $y_mcreature);
				if (stripslashes($z_mcreature[0]) != ""){$xdash1 = " - ";} else {$xdash1 = "";}
				echo "ENCOUNTER:&nbsp;" . stripslashes($z_mcreature[0]) . "" . $xdash1 . "" . stripslashes($z_mcreature[4]) . "<br>";
				$elevel = ($z_mcreature[1] + 0);
			}
			else if ($u_creatures > 0)
			{
				$my_enemy_pick = explode("^^^", $my_enemy_array[mt_rand(0,$my_enemy_max)]);

				echo "ENCOUNTER:&nbsp;" . $my_enemy_pick[0] . "<br>";

				$elevel = $my_enemy_pick[1];
			}
		}
		$monster_mish = $monster_mish + $x_c_c_low;
		$monster_mash = $monster_mash - 1;
		endwhile;

/////////////////////////////// FILL THE ROOM WITH RANDOM STUFF ///////////////////////////////////////////////////////////////////////////////////////////////

		$random_mash = mt_rand($x_u_c_min,$x_u_c_max);
		$random_mish = $x_u_c_low;
		$random_junk = 0;
		$dfilled = "";
		while ($random_mash > 0) :
			if (($x_u_c-($random_mish-$x_u_c_low)) >= mt_rand(1,100))
			{
				$random_junk = 1;
				$dthisone = str_replace(" ", "&nbsp;", $my_decos_array[mt_rand(0,$my_decos_max)]);
				$dfilled = $dfilled . "" . $dthisone . "&nbsp;&nbsp;&nbsp;&nbsp; ";
			}
			$random_mish = $random_mish + $x_l_c_low;
			$random_mash = $random_mash - 1;
		endwhile;
		if ($random_junk > 0){echo "CONTENTS&nbsp;:&nbsp;" . stripslashes($dfilled) . "<br>";}



		if (($x_adjust > 0) && ($elevel > 0)) ////////////////////////// ANY LOOT ADJUSTMENT FOR CREATURES ////////////////////////////////////////////////////
		{
			$adjuster = $elevel * $x_adjustment;
		}



/////////////////////////////// FILL THE ROOM WITH TREASURE ///////////////////////////////////////////////////////////////////////////////////////////////////

		$loot_mash = mt_rand($x_l_c_min,$x_l_c_max);
		$loot_mish = $x_l_c_low;
		$loot_nums = 0;
		$filled = "";
		while ($loot_mash > 0) :
			if ((($x_l_c-($loot_mish-$x_l_c_low)) + $adjuster) >= mt_rand(1,100))
			{
				$loot_nums = 1;

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

				$thisone = str_replace(" ", "&nbsp;", $treasure_item);
				$filled = $filled . "" . $thisone . "&nbsp;&nbsp;&nbsp;&nbsp; ";
			}
			$loot_mish = $loot_mish + $x_l_c_low;
			$loot_mash = $loot_mash - 1;
		endwhile;
		if ($loot_nums > 0)
		{
			if ($x_rigged_chance >= mt_rand(1,100))
			{
				$my_trap = $my_traps_array[mt_rand(0,$my_traps_max)];
				$rigged = "&nbsp;-&nbsp;TRAPPED: " . $my_trap . "]"; $uhoh = 1;
			}
			else
			{
				$rigged = "]";
			}

			echo "LOOT&nbsp;:&nbsp;[" . $my_boxes_array[mt_rand(0,$my_boxes_max)] . "" . $rigged . ":&nbsp;" . stripslashes($filled) . "<br>";
		}

/////////////////////////////// PUT TRAPS IN THE ROOM /////////////////////////////////////////////////////////////////////////////////////////////////////////

		$trap_jaw = mt_rand($x_t_c_min,$x_t_c_max) - $uhoh;
		$zapper = $x_t_c_low;
		while ($trap_jaw > 0):
			if ((($x_t_c-($zapper-$x_t_c_low)) >= mt_rand(1,100)) && ($trap_jaw > 0))
			{
				$my_trap = $my_traps_array[mt_rand(0,$my_traps_max)];

				echo "ROOM TRAP: " . $my_trap . "<br>";
			}
			$trap_jaw = $trap_jaw - 1;
			$zapper = $zapper + $x_t_c_low;
		endwhile;





		echo "</font><hr size='1' color='#000000'>";

		$x_areas = $x_areas -1;

	endwhile;

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>