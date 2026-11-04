<?php

include("db.php");

$game_defaults = "Sci-Fi";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Science-Fiction</p>";
	echo "<p style='text-align: justify;'>";
	echo "Science-fiction role-playing games come in many different flavors. You could have derelict ships filled with mutants. You could have a crew of space pirates stealing everything in the galaxy. Maybe you serve the Federation or have taken sides with the Imperials. Whatever science-fiction game you play, you may find some of the tools here useful to you.";
	echo "</p>";
}

else { include("body.php");}

?>