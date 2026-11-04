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

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Books &amp; Tomes</p>";
	echo "<p style='text-align: justify;'>Here you can create a completely random set of books to use in your fantasy role-playing game.";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_game'>";
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cell">Books:</span>
				<span class="cell"><select size="1" id="DropOption" name="amount">
					<?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select></span>
			</div>
			<div class="row">
				<span class="cell">Unusual Books:</span>
				<span class="cell"><select size="1" id="DropOption" name="unusual">
					<?php $runner=101; $running=0; while ($runner > 0) : echo "<option>" . $running . "</option>"; $running = $running+1; $runner = $runner-1; endwhile; ?>
				</select>&nbsp;%</span>
			</div>
<?php if ($x_game == "Labyrinth Lord"){ ?>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="aec" value="1">&nbsp;&nbsp;Include AEC</span>
			</div>
<?php } ?>
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

$cut = 100;

$x_game = $_POST['x_game'];
$qty = $_POST['amount'];
$unusual = $_POST['unusual'];

if ($x_game == "OSRIC"){$bottom_notices = 1;}
else if ($x_game == "Swords & Wizardry"){$bottom_notices = 5;}
else if ($x_game == "BD&D" || $x_game == "AD&D"){$bottom_notices = 13;}
else if ($x_game == "Labyrinth Lord"){$bottom_notices = 2; $aec = $_SESSION["SESSION_ADD_AEC"] = $_POST['aec']+0;}
else if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){$bottom_notices = 6;}

?>

<p style="margin-top: 0; margin-bottom: 0" align="center"><img border="0" src="pics_tools/tools_random_books.jpg"></p><hr>

  <?php 

while ($qty > 0) :

$number = $number + 1;

if ($unusual >= mt_rand(1,100)){

	if (mt_rand(1,100) > 97){$curse_me = 1;} else {$curse_me = 0;}
	$level = mt_rand(1,20);

	$item = tomeType() . "___{" . tomePower(100,$curse_me,$level,$cut,$x_game) . "}";
	$itemm = explode("___", $item);
	$item = ucwords($itemm[0]);
	$item = str_replace(" Of ", " of ", $item);
	$item = str_replace(" And ", " and ", $item);
	$item = str_replace(" The ", " the ", $item);
	$item = artifactNaming($item,'',$curse_me,2) . " " . $itemm[1];
	$item = ucfirst($item);

} else {

	$item = tomeMaker($x_game);

}

echo $number . ".&nbsp;" . $item . "<br>";

$qty = $qty - 1;

endwhile;

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>