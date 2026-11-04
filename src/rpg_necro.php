<?php

include("db.php");

$game_defaults = "Necropalyx";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Necropalyx</p>";
	echo "<p style='text-align: justify;'>"; ?>
	In Necropalyx, you create a character that has survived the initial outbreak of a zombie apocalypse. One of the unique features of character creation, is that you would look around your home (or wherever you are playing) and write down your list of equipment from what you see. The goal is simple. How long can you stay alive?</p>
	<?php
	echo "<br><br><br>You can find Necropalyx here at <a href='game_necro.php'>Wizardawn</a>.";
	echo "</p>";
}

else { include("body.php");}

?>