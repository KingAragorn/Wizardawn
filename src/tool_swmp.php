<?php

include("db.php");
include_once("functions/geomorphs.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Post-Apocalyptic";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' target='_blank' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Sewer Maps</p>";
	echo "<p style='text-align: justify;'>Here you can generate a random sewer map based off of geomorphs created by <a href='http://aeonsnaugauries.blogspot.com/' target='_blank'>J.D. Jarvis</a>. Simply pick the below criteria for the sewers you want to generate. Sewers are generally tunnels under a city, with very few (if any) rooms.&nbsp; Make sure you choose the % chance that a tile with rooms appear in your map.";
	?>
		<br>
		<div id="div_table">
			<div class="row">
				<span class="cull">Width:</span>
				<span class="cell">
					<select id="DropOption" name="map_wide">
						<?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">Height:</span>
				<span class="cell">
					<select id="DropOption" name="map_high">
						<?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">Number Areas:</span>
				<span class="cell"><input type="checkbox" name="keyed" value="1"></span>
			</div>
			<div class="row">
				<span class="cull">Start With Number:</span>
				<span class="cell">
					<select id="DropOption" name="map_numbers">
						<?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">Chance of Rooms:</span>
				<span class="cell">
					<select id="DropOption" name="halls">
						<?php $runner=101; $running=0; while ($runner > 0) : echo "<option>" . $running . "</option>"; $running = $running+1; $runner = $runner-1; endwhile; ?>
					</select>
				</span>
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

$map_wide = $_POST['map_wide'];
$map_high = $_POST['map_high'];
$keyed = $_POST['keyed'];
$map_numbers = $_POST['map_numbers']-1;
$halls = $_POST['halls']+0;
$geomorphic_tiles = $geomorphs;
$map_type = "sewer map";

$geomorphic_tiles = preg_grep("/EEEsewersFFF/", $geomorphic_tiles);

include_once("functions/geomorphs_draw.php");

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>