<?php

include("db.php");
include_once("functions/geomorphs.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Fantasy";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' target='_blank' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Settlement Maps</p>";
	echo "<p style='text-align: justify;'>Here you can generate a random city or keep map based off of geomorphs created by <a href='http://www.risusmonkey.com/' target='_blank'>Risus Monkey</a> or you can create a random village map based off of geomorphs created by <a target='_blank' href='http://stonewerks.wordpress.com/'>Stonewerks</a>. Simply pick a dimension and whether you want the buildings numbered.";
	?>
		<br>
		<div id="div_table">
			<div class="row">
				<span class="cull">Settlement Type:</span>
				<span class="cell">
					<select id="DropOption" size="1" name="type">
						<option>City</option>
						<option>Keep</option>
						<option>Village</option>
					</select>
				</span>
			</div>
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
$geomorphic_city = $geomorphs;
$kingdom = $map_wide * $map_high;
$place_castle = mt_rand(1,$kingdom);
	if (mt_rand(1,2) == 1){$place_castle = 0;}

if ($map_type == "Keep")
{
	$dock = mt_rand(1,4);
	if ($dock == 1){$geomorphic_tiles = preg_grep("/EEEkeepFFF|keep_d_01.jpg/", $geomorphic_tiles);}
	else if ($dock == 2){$geomorphic_tiles = preg_grep("/EEEkeepFFF|keep_d_02.jpg/", $geomorphic_tiles);}
	else if ($dock == 3){$geomorphic_tiles = preg_grep("EEEkeepFFF|keep_d_03.jpg/", $geomorphic_tiles);}
	else {$geomorphic_tiles = preg_grep("/EEEkeepFFF|keep_d_04.jpg/", $geomorphic_tiles);}

	if ($kingdom >= 50){$castle = "keep_king";}
	else if ($kingdom >= 20){$castle = "keep_prince"; if (mt_rand(1,2) == 1){$castle = "keep_king";}}
	else if ($kingdom >= 5){$castle = "keep_prince"; if (mt_rand(1,2) == 1){$castle = "keep_baron";}}
	else {$castle = "keep_baron";}
}
else if ($map_type == "Village"){$geomorphic_tiles = preg_grep("/EEEvillageFFF/", $geomorphic_tiles); $castle = "village_ruler"; }
else
{
	$dock = mt_rand(1,4);
	if ($dock == 1){$geomorphic_tiles = preg_grep("/EEEcityFFF|citdock_4.gif/", $geomorphic_tiles);}
	else if ($dock == 2){$geomorphic_tiles = preg_grep("/EEEcityFFF|citdock_2.gif/", $geomorphic_tiles);}
	else if ($dock == 3){$geomorphic_tiles = preg_grep("/EEEcityFFF|citdock_1.gif/", $geomorphic_tiles);}
	else {$geomorphic_tiles = preg_grep("/EEEcityFFF|citdock_3.gif/", $geomorphic_tiles);}

	if ($kingdom >= 50){$castle = "keep_king";}
	else if ($kingdom >= 20){$castle = "keep_prince"; if (mt_rand(1,2) == 1){$castle = "keep_king";}}
	else if ($kingdom >= 5){$castle = "keep_prince"; if (mt_rand(1,2) == 1){$castle = "keep_baron";}}
	else {$castle = "keep_baron";}
}

include_once("functions/geomorphs_draw.php");

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>