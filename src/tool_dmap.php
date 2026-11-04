<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }
$cave = 0; if ( isset( $_POST["use_cave"] ) ){ $cave = $_POST["use_cave"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Fantasy";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	if ($cave == "Side View"){$word_cave = "side view";}
	else if ($cave == "Dungeon"){$word_cave = "dungeon";}
	else if ($cave == "Cavernous"){$word_cave = "cavernous";}
	else {$word_cave = "cavernous dungeon";}

	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' action='" . $my_form_name . "'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Dungeon Maps</p>";
	echo "<p style='text-align: justify;'>"; ?>

		Here you can generate a random <?php echo $word_cave; ?> map based off of geomorphs created by...
		<br>
		<br>
		Map Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="DropOption" name="use_cave" onchange="submit()">
			<option <?php if ($word_cave == "cavernous dungeon"){echo "selected";} ?>>Cavernous Dungeon</option>
			<option <?php if ($word_cave == "dungeon"){echo "selected";} ?>>Dungeon</option>
			<option <?php if ($word_cave == "cavernous"){echo "selected";} ?>>Cavernous</option>
			<option <?php if ($word_cave == "side view"){echo "selected";} ?>>Side View</option>
		</select>

	<?php
		echo "</form><form style='margin-bottom:0; margin-top:0;' method='POST' target='_blank' action='" . $my_form_name . "?run=1'>";

		echo "<input type='hidden' name='program_user' value='1'>";

		if ($word_cave != "side view") // COUNT HOW MANY TILES I HAVE IN THE SYSTEM //
		{
			if ($word_cave == "dungeon"){$srch_typ1 = "0dungeon0";} else if ($word_cave == "cavernous"){$srch_typ1 = "0cave0";} else {$srch_typ1 = "";} 

			$pattern = "/" . $srch_typ1 . "/";
			$srch_typ2 = preg_grep($pattern, $geomorphs);

			$src = preg_grep("/0dyson0/", $srch_typ2);
			$num1 = number_format(count($src));

			$src = preg_grep("/0risus0/", $srch_typ2);
			$num2 = number_format(count($src));

			$src = preg_grep("/0rorschachhamster0/", $srch_typ2);
			$num3 = number_format(count($src));

			$src = preg_grep("/0stonewerks0/", $srch_typ2);
			$num4 = number_format(count($src));

			$src = preg_grep("/0glenn0jupp0/", $srch_typ2);
			$num5 = number_format(count($src));

			$src = preg_grep("/0stuart0/", $srch_typ2);
			$num6 = number_format(count($src));

			$src = preg_grep("/0infinite0zer00/", $srch_typ2);
			$num7 = number_format(count($src));
		}
	?>

		<input type="hidden" name="type" value="<?php echo $word_cave; ?>">

<div id="div_table">

<?php if ($word_cave == "side view"){ ?>
	<div class="row">
		<span class="cell">&nbsp;</span>
		<span class="cell">- <a target="_blank" href="http://rpgcharacters.wordpress.com/">Dyson Logos</a></span>
		<span class="cell">&nbsp;</span>
		<span style="width:50px;" class="cell">&nbsp;</span>
		<span class="cell">&nbsp;</span>
		<span class="cell">- <a target="_blank" href="http://stonewerks.wordpress.com/">Stonewerks</a></span>
		<span class="cell">&nbsp;</span>
	</div>

<?php } else { ?>

	<div class="row">
		<span class="cell">- <a target="_blank" href="http://rpgcharacters.wordpress.com/">Dyson Logos</a></span>
		<span class="cell"><input type="checkbox" checked name="cave_dyson" value="1"></span>
		<span class="cell"><?php echo $num1; ?> Tiles</span>
		<span style="width:50px;" class="cell">&nbsp;</span>
		<span class="cell">- <a target="_blank" href="http://www.risusmonkey.com/">Risus Monkey</a></span>
		<span class="cell"><input type="checkbox" checked name="cave_risus" value="1"></span>
		<span class="cell"><?php echo $num2; ?> Tiles</span>
	</div>
	<div class="row">
		<span class="cell">- <a target="_blank" href="http://rorschachhamster.wordpress.com/">Rorschachhamster</a></span>
		<span class="cell"><input type="checkbox" checked name="cave_rorsch" value="1"></span>
		<span class="cell"><?php echo $num3; ?> Tiles</span>
		<span style="width:50px;" class="cell">&nbsp;</span>
		<span class="cell">- <a target="_blank" href="http://stonewerks.wordpress.com/">Stonewerks</a></span>
		<span class="cell"><input type="checkbox" checked name="cave_stone" value="1"></span>
		<span class="cell"><?php echo $num4; ?> Tiles</span>
	</div>

		<?php if (($word_cave == "dungeon") || ($word_cave == "cavernous dungeon")){ ?>

			<div class="row">
				<span class="cell">- <a target="_blank" href="http://seekingwing.blogspot.com/">Glenn Jupp</a></span>
				<span class="cell"><input type="checkbox" checked name="cave_glenn" value="1"></span>
				<span class="cell"><?php echo $num5; ?> Tiles</span>
				<span style="width:50px;" class="cell">&nbsp;</span>
				<span class="cell">- <a target="_blank" href="http://strangemagic.robertsongames.com/">Stuart Robertson</a></span>
				<span class="cell"><input type="checkbox" checked name="cave_stuart" value="1"></span>
				<span class="cell"><?php echo $num6; ?> Tiles</span>
			</div>

		<?php } if (($word_cave == "cavernous") || ($word_cave == "cavernous dungeon")){ ?>

			<div class="row">
				<span class="cell">- <a target="_blank" href="http://shashnia.blogspot.com/">Infinite Zer0</a></span>
				<span class="cell"><input type="checkbox" checked name="cave_zero" value="1"></span>
				<span class="cell"><?php echo $num7; ?> Tiles</span>
				<span style="width:50px;" class="cell">&nbsp;</span>
				<span class="cell">&nbsp;</span>
				<span class="cell">&nbsp;</span>
				<span class="cell">&nbsp;</span>
			</div>

		<?php } ?>

<?php } ?>

</div>
		</p><p style='text-align: justify;'>Simply pick a dimension and whether you want the areas numbered. Check the boxes above for the artists you wish to include in the generated map.
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

$cave_dyson = $_POST['cave_dyson'];
	if ($cave_dyson == 1){$search_string = $search_string . "0dyson0|";}
$cave_risus = $_POST['cave_risus'];
	if ($cave_risus == 1){$search_string = $search_string . "0risus0|";}
$cave_rorsch = $_POST['cave_rorsch'];
	if ($cave_rorsch == 1){$search_string = $search_string . "0rorschachhamster0|";}
$cave_stone = $_POST['cave_stone'];
	if ($cave_stone == 1){$search_string = $search_string . "0stonewerks0|";}
$cave_glenn = $_POST['cave_glenn'];
	if ($cave_glenn == 1){$search_string = $search_string . "0glenn0jupp0|";}
$cave_stuart = $_POST['cave_stuart'];
	if ($cave_stuart == 1){$search_string = $search_string . "0stuart0|";}
$cave_zero = $_POST['cave_zero'];
	if ($cave_zero == 1){$search_string = $search_string . "0infinite0zer00|";}

if ($map_type != "side view")
{
	$search_string = "/" . substr($search_string, 0, -1) . "/";
	$geomorphic_tiles = preg_grep($search_string, $geomorphic_tiles);
}

if ($map_type == "side view")
{
	$geomorphic_tiles = preg_grep("/dgside/", $geomorphic_tiles);
}
else if ($map_type == "cavernous")
{
	$geomorphic_tiles = preg_grep("/EEEcaveFFF/", $geomorphic_tiles);
}
else if ($map_type == "dungeon")
{
	$geomorphic_tiles = preg_grep("/EEEdungeonFFF/", $geomorphic_tiles);
}
else
{
	$geomorphic_tiles = preg_grep("/EEEcaveFFF|EEEdungeonFFF/", $geomorphic_tiles);
}

include_once("functions/geomorphs_draw.php");

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>