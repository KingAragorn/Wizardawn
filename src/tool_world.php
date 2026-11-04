<?php

include("db.php");

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

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>World Maps</p>";
	echo "<p style='text-align: justify;'>Here you can generate a random world (or underworld) using hexes and classic map icons. This map can be used to inspire an idea for a new world or give you a quick setting in which to host your current game. Simply pick a style, dimensions, climate, and any sides that face a large body of water or mountain range. You can also choose to label some information on the map. The hex distance does not change the appearance of the map, but simply notes the miles in length a hex is. This type of information will only appear on the map if you decide to show 'Information'.";
	?>
		</p>
		<div id="div_table">
			<div class="row">
				<span class="cull">World Name:</span>
				<span class="cell"><input id="InputOption" type="text" name="map_name" size="30"></span>
			</div>
			<div class="row">
				<span class="cull">Map Style:</span>
				<span class="cell">
					<select id="DropOption" name="map_genre">
						<?php
							include("game_options.php");
							if ($x_game == "Broken Urthe" || $x_game == "Gamma World" || $x_game == "Millenniums & Mutations" || $x_game == "Mutant Future" || $x_game == "Post-Apocalyptic"){ $style_apoc = " selected"; }
							else if ($x_game == "Metamorphosis Alpha"){ $style_noah = " selected"; }
							else if ($x_game == "Space Ryft" || $x_game == "Science-Fiction"){ $style_scifi = " selected"; }
							else { $style_fantasy = " selected"; }
						?>
						<option<?php echo $style_fantasy; ?>>Fantasy</option>
						<option<?php echo $style_apoc; ?>>Post-Apocalyptic</option>
						<option<?php echo $style_noah; ?>>Exodus Spaceship</option>
						<option<?php echo $style_scifi; ?>>Sci-Fi</option>
						<option>Post-Apocalyptic Fantasy</option>
						<option>Empty</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">Climate:</span>
				<span class="cell">
					<select id="DropOption" name="map_climate">
						<option value="1">Cold North &amp; Warm South</option>
						<option value="2">Warm North &amp; Cold South</option>
						<option value="10">Cold North &amp; South</option>
						<option value="11">Warm North &amp; South</option>
						<option value="3">Snow</option>
						<option value="4">Desert</option>
						<option value="5">Forest</option>
						<option value="6">Jungle</option>
						<option value="7">Tropics</option>
						<option value="8">Lifeless</option>
						<option value="12">Underworld</option>
						<option value="9">Random</option>
					</select>*
				</span>
			</div>
			<div class="row">
				<span class="cull">Width:</span>
				<span class="cell">
					<select id="DropOption" name="map_wide">
						<?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option value='" . $running . "' >" . ($running*10) . "</option>"; $runner = $runner-1; endwhile; ?>
					</select>&nbsp;Hexes
				</span>
			</div>
			<div class="row">
				<span class="cull">Height:</span>
				<span class="cell">
					<select id="DropOption" name="map_high">
						<?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option value='" . $running . "' >" . ($running*8) . "</option>"; $runner = $runner-1; endwhile; ?>
					</select>&nbsp;Hexes
				</span>
			</div>
			<div class="row">
				<span class="cull">Hex Equals:</span>
				<span class="cell">
					<select id="DropOption" name="map_equals">
						<?php $runner=496; $running=4; while ($runner > 0) : $running = $running+1; echo "<option value='" . $running . "' >" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select>&nbsp;Miles
				</span>
			</div>
		</div>
		<br>
		<div id="div_tabex">
			<div class="row">
				<span class="cull">Color Map:</span>
				<span class="cell"><input type="checkbox" name="color" value="1">**</span>
				<span class="cull">Highlight Landmarks:</span>
				<span class="cell"><input type="checkbox" name="colorl" value="1">**</span>
			</div>
			<div class="row">
				<span class="cull">Information:</span>
				<span class="cell"><input checked type="checkbox" name="info" value="1">***</span>
				<span class="cull">Legend:</span>
				<span class="cell"><input checked type="checkbox" name="legend" value="1">***</span>
			</div>
			<div class="row">
				<span class="cull">Outer Hull:</span>
				<span class="cell"><input type="checkbox" name="hull" value="1">****</span>
				<span class="cull">&nbsp;</span>
				<span class="cell">&nbsp;</span>
			</div>
		</div>
		<br>
		<div id="div_tabex">
			<div class="row">
				<span class="cull">Borders:</span>
				<span class="cell">
					<select id="DropOption" name="water_n">
						<option value="0">No Northern Border</option>
						<option value="2">Northern Mountains</option>
						<option value="1">Northern Water</option>
					</select>
				</span>
				<span class="cell">
					<select id="DropOption" name="water_s">
						<option value="0">No Southern Border</option>
						<option value="2">Southern Mountains</option>
						<option value="1">Southern Water</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">&nbsp;</span>
				<span class="cell">
					<select id="DropOption" name="water_e">
						<option value="0">No Eastern Border</option>
						<option value="2">Eastern Mountains</option>
						<option value="1">Eastern Water</option>
					</select>
				</span>
				<span class="cell">
					<select id="DropOption" name="water_w">
						<option value="0">No Western Border</option>
						<option value="2">Western Mountains</option>
						<option value="1">Western Water</option>
					</select>
				</span>
			</div>
		</div>
		<p style='text-align: justify;'>
		<input id="SubmitButton" name="Create" type="submit" value="Create">
		<br>
		<br>
		*&nbsp;'Lifeless' climates produce only 'Sci-Fi', 'Exodus Spaceship', or 'Empty' styles, with 'Sci-Fi' being the default style. Climates that are 'Random' have a climate for each latitude that may, or may not, follow the order of an Earth style planet. 'Underworld' climates will use lava and cavernous walls instead of volcanos and mountains.
		<br>
		<br>
		**&nbsp;If you decide to have a 'Color' map, then selecting 'Highlight Landmarks' will set the landmark hexes to an easily visible color. If you do not highlight the landmark color, they will be the same color as the terrain they are located in.
		<br>
		<br>
		***&nbsp;The 'Information' box must be checked for the map's 'name', 'hex distance', 'compass', and/or 'legend' to appear. If you only want a map, with no information, then uncheck this box.
		<br>
		<br>
		****&nbsp;The 'Outer Hull' box is an option for those that want a map surrounded by the metallic bulkheads of a ship or dome. The 'No Border' options do not work with this style of map as the mountains or border will surround the inner most layer of the metallic hull. This is a rarely used option, but it does allow one to have maps that take place on a ship (Metamorphosis Alpha) and off the wall fantasy campaigns that are enclosed in a space station (Might &amp; Magic).
		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include_once("css_reports.php");
include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

$map_wide = $_POST['map_wide'];
$map_high = $_POST['map_high'];

$outer_hull = $_POST['hull'];

$water_n = $_POST['water_n'];
$water_s = $_POST['water_s'];
$water_e = $_POST['water_e'];
$water_w = $_POST['water_w'];

	if ($water_n == 0 && $outer_hull > 0){$water_n = 2;}
	if ($water_s == 0 && $outer_hull > 0){$water_s = 2;}
	if ($water_e == 0 && $outer_hull > 0){$water_e = 2;}
	if ($water_w == 0 && $outer_hull > 0){$water_w = 2;}

$info = $_POST['info'];
$genre = $_POST['map_genre'];
	if ($genre == "Exodus Spaceship"){$lifeless_exodus_ship = 1;}
$equals = $_POST['map_equals'];
$planet = $_POST['map_name'];
$climate = $_POST['map_climate'];
	if ($genre == "Post-Apocalyptic Fantasy")
	{
		if ($climate == 8){$climate = 9;}
		$mixgenre = 1;
	}
	else if (($climate == 8) && ($genre != "Empty")){$genre = "Lunar";}
	if (mt_rand(1,2) == 1){$moon_color = "moon";} else {$moon_color = "mars";}
$legend = $_POST['legend'];
$color = $_POST['color'];
$colorl = $_POST['colorl'];

$terrain_latitude = -1;

include("functions/hex_map.php");

if ($info > 0)
{
	echo "<div style='height:" . (($map_high * 272) + 40) . "px;'>&nbsp;</div>";

	if ($climate == 8){$genre = "Sci-Fi"; $legend_limit = "AND ll_image NOT LIKE '%mountain%'";}
	$lego = 1;
	$legend_width = ($map_wide * 320) + 10; if ($map_wide < 2){$legend_width = (2 * 320) + 10;}

	if ($planet != ""){echo "<font style='font-size: 60px; font-family: WizardawnTitle;'>" . $planet . "</font>";}

	echo "<table style='width:" . $legend_width . "px;'>";

	if ($planet != ""){echo "<tr><td colspan='15'><hr size='1'></td></tr>";}
	echo "<tr><td><font style='font-size: 35px; font-family: WizardawnTitle;'>1 Hex = " . $equals . " Miles</font></td>";
	echo "<td align='right' rowspan='2'>";
		echo "<table><tr><td align='center'><font style='font-size: 35px; font-family: WizardawnTitle;'>N</font></td></tr><tr><td align='center'><img src='land/compass.png'></td></tr></table>";
	echo "</td>";
	echo "</tr><tr><td valign='bottom'>";
	if ($legend > 0){echo "<font style='font-size: 45px; font-family: WizardawnTitle;'>Legend</font>";} else {echo "&nbsp;";}
	echo "</td></tr></table>";

	if ($legend > 0)
	{
		$ticons = explode("^", hexmapIcons($key_array));
		sort($ticons);
		$c_keys = count($ticons);
		$s = 0;
		$icon_legend_width = $map_wide; if ($map_wide < 2){$icon_legend_width = 2;}
		echo "<br><div id='div_tabex' style='width: " . $legend_width . "px;'>";

		while ($c_keys > 0) :

			$images = explode("|", $ticons[$s]);

				$colz_for_icons = $colz_for_icons + 1;
				if ( $colz_for_icons == 1){ echo "<div class='row'>"; }
				echo "<span class='cull' style='padding: 10px;'><img src='land/" . $images[1] . "'>&nbsp;&nbsp;" . $images[0] . "</span>";
				if ( $colz_for_icons == $icon_legend_width){ echo "</div>"; $colz_for_icons = 0;}

			$s = $s + 1;
			$c_keys = $c_keys - 1;

		endwhile;

		echo "</div>";
	}
}
?>

<br>
<div style="width: <?php echo $map_wide*322; ?>px; height: 1; ?>px; overflow: hidden; display: inline-block;"></div>

<?php if ($allow_image_download == 1 ){ ?>
<script language="javascript">
	function capture() {
		$('body').html2canvas({
			width: 3600,
			height:3600,
			onrendered: function (canvas) {
				$('#img_val').val(canvas.toDataURL("image/png"));
				document.getElementById("myForm").submit();
			}
		});
	}
</script>
<br><input type="submit" value="Save Map As Image" onclick="capture();" />
<form method="POST" enctype="multipart/form-data" action="functions/save_image.php" id="myForm">
    <input type="hidden" name="img_val" id="img_val" value="" />
</form>
<?php }

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>