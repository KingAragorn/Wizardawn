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
	echo "<form style='margin-bottom:0; margin-top:0;' target='_blank' method='POST' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Adventuring Gear</p>";
	echo "<p style='text-align: justify;'>Here you can generate a random set of adventuring gear for use in your fantasy role-playing game. This does not produce weapons and armor, as that is very specific to your game system and should be done by the players. Simply choose how many different packs you want.";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_game'>";
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cull">Packs:</span>
				<span class="cell">
					<select id="DropOption" name="x_packs">
						<?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">Simple Food &amp; Drink:</span>
				<span class="cell"><input type="checkbox" name="x_eat" value="1"></span>
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

$packs = $_POST['x_packs'];
$eat = $_POST['x_eat'];
$x_game = $_POST['x_game'];

if ($x_game == "OSRIC"){ $bottom_notices = 1; }
else if ($x_game == "Swords & Wizardry"){ $bottom_notices = 5; }
else if ($x_game == "BFRPG"){ $bottom_notices = 11; }
else if ($x_game == "Labyrinth Lord"){ $bottom_notices = 2; }
else if ($x_game == "Swords & Six-Siders"){ $bottom_notices = 18; }
else if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ $bottom_notices = 6; }
else if ($x_game == "AD&D"){ $bottom_notices = 13; }
else if ($x_game == "BD&D"){ $bottom_notices = 13; }

?>

<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
</style>

<div align="center">
	<table border="0" cellpadding="0" cellspacing="0" width="700">
		<tr>
			<td><img src="pics_tools/tools_gear.jpg"><hr color="#000000" size="1">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">

			<?php while ($packs > 0) :

				$packs = $packs - 1;
				$line = $line + 1;

				echo "<tr><td width='40' align='center' valign='top' style='border-bottom-style: solid; border-bottom-width: 1px'><font size='2'>" . $line . "</font></td>";
				echo "<td style='border-bottom-style: solid; border-bottom-width: 1px'><font size='2'>" . packBuilder($eat,1,Any,$x_game) . "</font></td></tr>";

			endwhile; ?>

			</table>
			</td>
		</tr>
	</table>
</div>

<?php

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>