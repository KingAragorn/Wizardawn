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

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Piles of Coins</p>";
	echo "<p style='text-align: justify;'>Here you can generate a random set of coin denominations for use in your fantasy role-playing game. Simply choose a game, and a value range of gold that you want the coins valued at...along with how many different piles you want.";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_game'>";
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cell">Gold Value:</span>
				<span class="cell">Between&nbsp;&nbsp;<input type="text" id="InputOption" name="x_value1" value="1" size="5">&nbsp;&nbsp;&amp;&nbsp;&nbsp;<input type="text" id="InputOption" name="x_value2" value="100" size="5">&nbsp;&nbsp;gold</span>
			</div>
			<div class="row">
				<span class="cell">Piles:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_pile"><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
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

$game = $_POST['x_game'];
$x_pile = $_POST['x_pile'];
$value1 = $_POST['x_value1']+0;
$value2 = $_POST['x_value2']+0;
	if ($value1 < 1){$value1 = 1;}
	if ($value1 > $value2){$value2 = $value1;}

if ($game == "OSRIC"){$bottom_notices = 1;}
else if ($game == "Labyrinth Lord"){$bottom_notices = 2;}
else if ($game == "BFRPG"){$bottom_notices = 11;}
else if ($game == "BD&D"){$bottom_notices = 13;}
else if ($game == "Swords & Wizardry") {$bottom_notices = 5;}
else if (($game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){$bottom_notices = 6;}

?>

<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
</style>

<div align="center">
<table border="0" cellpadding="0" cellspacing="0" width="700">
	<tr>
		<td>
		<p style="margin-top: 0; margin-bottom: 0" align="center"><img border="0" src="pics_tools/tools_coins.jpg"></p>
		<hr>

		<table border="0" cellpadding="2" cellspacing="0" width="100%">
			<?php while ($x_pile > 0) :

				$x_pile = $x_pile - 1;
				$line = $line + 1;
				$value = mt_rand($value1,$value2);

				echo "<tr><td width='40' style='border-bottom-style: solid; border-bottom-width: 1px'><font size='2'>" . $line . "</font></td>";
				echo "<td style='border-bottom-style: solid; border-bottom-width: 1px'><font size='2'>" . coinBuilder($value,$game,0) . "</font></td></tr>";

			endwhile; ?>
		</table>
</table>

</div><?php

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>