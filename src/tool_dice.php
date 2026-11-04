<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "T&T 5e";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' target='_blank' method='POST' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Combat Dice Sheets</p>";
	echo "<p style='text-align: justify;'>The Tunnels & Trolls game can be one where the game master may have to roll alot of dice. Playing at normal levels of monster difficulty, you may need to roll 40 dice to resolve a combat...which isn't too much...but when you get up to epic level proportions, you could possible roll a few hundred dice. This supplement will generate randomly pre-rolled numbers that you can use during game play to make this process quicker and easier. Just look over the creatures in your adventure and find a range of minimum/maximum dice that would be rolled for them during combat. Enter that range below, and how many of each dice amount you want to have rolled. Each set will display how many of each dice came up along with the total for the entire roll. Displaying the dice that face up will help those that do spite damage or have special abilities triggered when a certain amount of dice face up. Print out the sheets and off you go.";

	if ( $_SESSION["SESSION_SECTION"] == 14 ){ echo "<input type='hidden' name='tt_vs' value='5'>"; } else { echo "<input type='hidden' name='tt_vs' value='7'>"; }
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cull">Minimum Dice:</span>
				<span class="cell">
					<select id="DropOption" name="dice_min">
						<?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">Maximum Dice:</span>
				<span class="cell">
					<select id="DropOption" name="dice_max">
						<?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">Sets to Roll for Each:</span>
				<span class="cell">
					<select id="DropOption" name="dice_num">
						<?php $runner=500; $running=0; while ($runner > 0) : $running = $running+2; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
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

$dice_min = $_POST['dice_min'];
$dice_max = $_POST['dice_max'];
$dice_num = $_POST['dice_num']/2;

$tt_vs = $_POST['tt_vs'];
if ($tt_vs == 7){$tt7 = 1;} else {$tt5 = 1;}

if ($dice_min > $dice_max){$dice_max = $dice_min;}

$run_dice = ($dice_max - $dice_min) + 1;
$the_dice = $dice_min;

?>

<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
    div { page-break-after:auto }
</style>

<div align="center">

<table cellpadding="0" cellspacing="0" width="700">
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0" width="100%">
				<thead>
				<tr>
					<td width="35" align="center"><b><font size="2">DICE</font></b></td>
					<td width="310" align="center"><b><font size="2">RESULTS</font></b></td>
					<td width="10" align="center"><b><font size="2">&nbsp;</font></b></td>
					<td width="35" align="center"><b><font size="2">DICE</font></b></td>
					<td width="310" align="center"><b><font size="2">RESULTS</font></b></td>
				</tr>
				<tr>
					<td width="700" align="center" colspan="5"><hr color="#000000" size="1"></td>
				</tr>
				</thead>
			<?php while ($run_dice > 0) : $run_dice = $run_dice - 1; $dice_sets = $dice_num; while ($dice_sets > 0): $dice_sets = $dice_sets - 1; ?>
				<tr>
					<?php
						$dice_cycle = $the_dice;	$dice_total = 0;	$dice_1 = 0;	$dice_2 = 0;	$dice_3 = 0;	$dice_4 = 0;	$dice_5 = 0;	$dice_6 = 0;

						while ($dice_cycle > 0):

							$roller = mt_rand(1,6);		$dice_cycle = $dice_cycle - 1;
							if ($roller == 1){$dice_1 = $dice_1 + 1;}		else if ($roller == 2){$dice_2 = $dice_2 + 1;}		else if ($roller == 3){$dice_3 = $dice_3 + 1;}
							else if ($roller == 4){$dice_4 = $dice_4 + 1;}	else if ($roller == 5){$dice_5 = $dice_5 + 1;}		else {$dice_6 = $dice_6 + 1;}

						endwhile;

						$dice_total = $dice_1+(2*$dice_2)+(3*$dice_3)+(4*$dice_4)+(5*$dice_5)+(6*$dice_6);
					?>
					<td width="35" valign="top" align="center"><font size="2"><?php echo $the_dice; ?></font></td>
					<td width="310" align="center"><font size="2">
						<img src="pics_tools/dice_1.jpg">&nbsp;<?php echo $dice_1; ?>&nbsp;/&nbsp;
						<img src="pics_tools/dice_2.jpg">&nbsp;<?php echo $dice_2; ?>&nbsp;/&nbsp;
						<img src="pics_tools/dice_3.jpg">&nbsp;<?php echo $dice_3; ?>&nbsp;/&nbsp;
						<img src="pics_tools/dice_4.jpg">&nbsp;<?php echo $dice_4; ?>&nbsp;/&nbsp;
						<img src="pics_tools/dice_5.jpg">&nbsp;<?php echo $dice_5; ?>&nbsp;/&nbsp;
						<img src="pics_tools/dice_6.jpg">&nbsp;<?php echo $dice_6; ?><br>Total: <?php echo $dice_total; ?><?php if ($tt7 == 1){?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Spite Damage: <?php echo $dice_6; ?><?php } ?><hr color="#000000" size="1"></font>
					</td>
					<td width="10" align="center"><font size="2">&nbsp;</font></td>
					<?php
						$dice_cycle = $the_dice;	$dice_total = 0;	$dice_1 = 0;	$dice_2 = 0;	$dice_3 = 0;	$dice_4 = 0;	$dice_5 = 0;	$dice_6 = 0;

						while ($dice_cycle > 0):

							$roller = mt_rand(1,6);		$dice_cycle = $dice_cycle - 1;
							if ($roller == 1){$dice_1 = $dice_1 + 1;}		else if ($roller == 2){$dice_2 = $dice_2 + 1;}		else if ($roller == 3){$dice_3 = $dice_3 + 1;}
							else if ($roller == 4){$dice_4 = $dice_4 + 1;}	else if ($roller == 5){$dice_5 = $dice_5 + 1;}		else {$dice_6 = $dice_6 + 1;}

						endwhile;

						$dice_total = $dice_1+(2*$dice_2)+(3*$dice_3)+(4*$dice_4)+(5*$dice_5)+(6*$dice_6);
					?>
					<td width="35" valign="top" align="center"><font size="2"><?php echo $the_dice; ?></font></td>
					<td width="310" align="center"><font size="2">
						<img src="pics_tools/dice_1.jpg">&nbsp;<?php echo $dice_1; ?>&nbsp;/&nbsp;
						<img src="pics_tools/dice_2.jpg">&nbsp;<?php echo $dice_2; ?>&nbsp;/&nbsp;
						<img src="pics_tools/dice_3.jpg">&nbsp;<?php echo $dice_3; ?>&nbsp;/&nbsp;
						<img src="pics_tools/dice_4.jpg">&nbsp;<?php echo $dice_4; ?>&nbsp;/&nbsp;
						<img src="pics_tools/dice_5.jpg">&nbsp;<?php echo $dice_5; ?>&nbsp;/&nbsp;
						<img src="pics_tools/dice_6.jpg">&nbsp;<?php echo $dice_6; ?><br>Total: <?php echo $dice_total; ?><?php if ($tt7 == 1){?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Spite Damage: <?php echo $dice_6; ?><?php } ?><hr color="#000000" size="1"></font>
					</td>
				</tr>
			<?php endwhile; $the_dice = $the_dice + 1; endwhile; ?>
			</table>
		</td>
	</tr>
</table>

</div>

<?php

$bottom_notices = 6;

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>