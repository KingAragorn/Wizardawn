<?php

include("db.php");
include_once("functions/geomorphs.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Sci-Fi";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' target='_blank' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Sci-Fi Maps</p>";
	echo "<p style='text-align: justify;'>Here you can generate a random building or spaceship map based off of geomorphs created by Wizardawn Entertainment. Simply pick a dimension, map type, and whether you want the areas numbered. The &quot;Exodus Spaceship&quot; map produces a &quot;Noah's Ark&quot; style spaceship with a climate controlled area in the middle...like a forest or desert.";
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
				<span class="cull">Type:</span>
				<span class="cell">
					<select id="DropOption" size="1" name="type">
					<option>Building</option>
					<option>Spaceship</option>
					<option>Exodus Spaceship</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">Color:</span>
				<span class="cell">
					<select id="DropOption" size="1" name="geomorph_colored">
					<option value="0">Classic Blue</option>
					<option value="1">Black &amp; White</option>
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
$map_type = $_POST['type'];
$keyed = $_POST['keyed'];
$map_numbers = $_POST['map_numbers']-1;
$geomorphic_tiles = $geomorphs;

if ($map_type == "Building"){ $geomorphic_tiles = preg_grep("/EEEscifi-buildingFFF/", $geomorphic_tiles); }
else if ($map_type == "Spaceship"){ $geomorphic_tiles = preg_grep("/EEEscifi-shipFFF/", $geomorphic_tiles); }
else
{
	if (mt_rand(1,100) > 30){ $geomorphic_tiles = preg_grep("/EEEscifi-shipFFF|EEEscifi-ma-desertFFF/", $geomorphic_tiles); $inner_climate = "EEEscifi-ma-desertFFF";}
	else { $geomorphic_tiles = preg_grep("/EEEscifi-shipFFF|EEEscifi-ma-woodsFFF/", $geomorphic_tiles); $inner_climate = "EEEscifi-ma-woodsFFF";}
}

include_once("functions/geomorphs_draw.php");

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>