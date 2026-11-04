<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Horror";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' target='_blank' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Zombie Hordes</p>";
	echo "<p style='text-align: justify;'>Here you can create a completely random set of zombies for your survival horror role-playing game.";

	if ($_SESSION["SESSION_SECTION"] == 10){ echo "<input type='hidden' name='game' value='Necropalyx'>"; } else { echo "<input type='hidden' name='game' value='Generic'>"; }
	?>
		<br>
		<div id="div_table">
			<div class="row">
				<span class="cull">Amount of Zombies:</span>
				<span class="cell">
					<select id="DropOption" name="amount">
						<?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
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

$game = $_POST['game'];
	if ($game == "Necropalyx"){$bottom_notices = 10;}
$qty = $_POST['amount'];

?>
<div align="center">

<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
	<tr>
		<td>
			<p align="center"><img src="pics_tools/tools_zombies.jpg"></p><hr>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<?php while ($qty > 0): $zombie = makeZombie(0);

					switch (mt_rand(0,5))
					{
						case 0:	$bite = "1d4";	break;
						case 1:	$bite = "1d6";	break;
						case 2:	$bite = "1d6";	break;
						case 3:	$bite = "1d6";	break;
						case 4:	$bite = "1d6";	break;
						case 5:	$bite = "1d8";	break;
					}
					switch (mt_rand(0,5))
					{
						case 0:	$claw = "1d4";	break;
						case 1:	$claw = "1d4";	break;
						case 2:	$claw = "1d4";	break;
						case 3:	$claw = "1d4";	break;
						case 4:	$claw = "1d6";	break;
						case 5:	$claw = "1d8";	break;
					}
				if ($game == "Necropalyx")
				{
				?>
					<tr>
						<td width="50%"><?php echo $zombie[2]; ?> <?php echo $zombie[3]; ?>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
									<td><font size="2">Stamina:</font></td>
									<td width="257"><font size="2"><?php echo mt_rand(10,60); ?></font></td>
								</tr>
								<tr>
									<td><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
									<td><font size="2">Protection:</font></td>
									<td width="257"><font size="2"><?php echo mt_rand(0,5); ?></font></td>
								</tr>
								<tr>
									<td><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
									<td><font size="2">Hit:</font></td>
									<td width="257"><font size="2"><?php echo mt_rand(6,10); ?></font></td>
								</tr>
								<tr>
									<td><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
									<td><font size="2">Attacks</font></td>
									<td width="257"><font size="2">1 bite / 1 claw</font></td>
								</tr>
								<tr>
									<td><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
									<td><font size="2">Damage:</font></td>
									<td width="257"><font size="2"><?php echo $bite; ?> bite / <?php echo $claw; ?> claw</font></td>
								</tr>
								<tr>
									<td><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
									<td><font size="2">Move:</font></td>
									<td width="257"><font size="2">12' walk / 120' fast walk</font></td>
								</tr>
							</table>
						</td>
						<td width="50%" valign="top"><font size="2"><br><?php echo $zombie[2]; ?> is a <?php echo $zombie[0] . $zombie[1]; ?> zombie that <?php echo $zombie[8] . $zombie[9] . $zombie[11] . $zombie[10] . $zombie[12]; ?></font></td>
					</tr>
				<?php } else { ?>
						<td width="100%" valign="top"><u><?php echo $zombie[2]; ?> <?php echo $zombie[3]; ?></u><font size="2"><br><?php echo $zombie[2]; ?> is a <?php echo $zombie[0] . $zombie[1]; ?> zombie that <?php echo $zombie[8] . $zombie[9] . $zombie[11] . $zombie[10] . $zombie[12]; ?></font></td>
				<?php } ?>
				<tr>
					<td width="100%" colspan="2"><hr></td>
				</tr>
				<?php $qty = $qty-1; endwhile; ?>
			</table>
		</td>
	</tr>
</table>

</div><?php

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>