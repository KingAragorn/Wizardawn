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

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Alchemy Shelf</p>";
	echo "<p style='text-align: justify;'>Here you can generate a listing of items that might be on the shelf of an alchemy shop or a wizard's laboratory. Simply pick how many different bottles you want and decide if you want to have a price set for each.";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_game'>";
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cell">Amount:</span>
				<span class="cell">
					<select id="DropOption" name="x_amount">
						<?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select>
				</span>
			</div>
<?php if ($_SESSION["SESSION_SECTION"] != 36){ ?>
			<div class="row">
				<span class="cell">Potions Appear:</span>
				<span class="cell">
					<select id="DropOption" name="x_potion">
						<?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select> % of the time
				</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell">Reagent Value Between:</span>
				<span class="cell">
					<select id="DropOption" name="x_value1"><?php $runner=1001; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>&nbsp;&nbsp;&amp;&nbsp;&nbsp;
					<select id="DropOption" name="x_value2"><?php $runner=1001; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>&nbsp;&nbsp;gold*
				</span>
			</div>
<?php if ($x_game == "AD&D"){ ?>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="ua" value="1">&nbsp;&nbsp;Include Unearthed Arcana</span>
			</div>
<?php } ?>
<?php if ($x_game == "Labyrinth Lord"){ ?>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="aec" value="1">&nbsp;&nbsp;Include AEC</span>
			</div>
<?php } ?>
		</div>
		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create">

		</p><p style='text-align: justify;'>* This is optional and leaving it as '0' will simply produce the reagents with no gold values.<?php if ($_SESSION["SESSION_SECTION"] != 36){ ?> Magic potions will not have gold values.<?php } ?>

		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

$x_amount = $_POST['x_amount'];
$x_game = $_POST['x_game'];

$ua = $_SESSION["SESSION_ADD_UA"] = $_POST['ua']+0;
$aec = $_SESSION["SESSION_ADD_AEC"] = $_POST['aec']+0;

$x_potion = $_POST['x_potion'];
$x_value1 = $_POST['x_value1'];
$x_value2 = $_POST['x_value2'];
	if ($x_value1 > $x_value2){$x_value2 = $x_value1;}

if ($x_game == "OSRIC"){ $bottom_notices = 1; }
else if ($x_game == "Swords & Wizardry"){ $bottom_notices = 5; }
else if ($x_game == "BFRPG"){ $bottom_notices = 11; }
else if ($x_game == "Swords & Six-Siders"){ $bottom_notices = 18; }
else if ($x_game == "Labyrinth Lord"){ $bottom_notices = 2; }
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
			<td align="center">
			<img border="0" src="pics_tools/alchemy_shelf.jpg"><hr>
			<table border="0" cellpadding="2" cellspacing="0" width="100%">
				<?php while ($x_amount > 0) :

					$line = $line + 1;

					if (($x_value1 > 0) && ($x_value2 > 0)){$gold = mt_rand($x_value1,$x_value2);} if ($gold < 1){$gold = 1;}

					echo "<tr>";
					echo "<td NOWRAP width='40' style='border-bottom-style: solid; border-bottom-width: 1px'><font size='2'>" . $line ."</font></td>";

					if ($x_potion >= mt_rand(1,100))
					{
						if (($x_game == "OSRIC") || ($x_game == "Swords & Six-Siders") || ($x_game == "AD&D") || ($x_game == "BD&D") || ($x_game == "BFRPG") || ($x_game == "Swords & Wizardry") || ($x_game == "Labyrinth Lord")){ $brew = makeRPGmagic($x_game,1); }
						else { $brew = bottlePicker() . " " . makeMagicItem(mt_rand(1,20),3,1,$x_game,0,100); $brew = strtolower($brew); }
						echo "<td style='border-bottom-style: solid; border-bottom-width: 1px'><font size='2'>" . strtolower($brew) . "</font></td>";
						if ($x_value1 > 0){echo "<td NOWRAP width='60' align='right' style='border-bottom-style: solid; border-bottom-width: 1px'><font size='2'>Magic</font></td>";}
					}
					else
					{
						$reagent = contentsChooser(0,$x_game,0);
						if ($reagent == "empty"){$costs = "-";} else {$costs = number_format($gold) . "gp";}
						echo "<td style='border-bottom-style: solid; border-bottom-width: 1px'><font size='2'>" . bottlePicker() . " (" . $reagent . ")</font></td>";
						if ($x_value1 > 0){echo "<td NOWRAP width='60' align='right' style='border-bottom-style: solid; border-bottom-width: 1px'><font size='2'>" . $costs . "</font></td>";}
					}

					echo "</tr>";
					$x_amount = $x_amount - 1;

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