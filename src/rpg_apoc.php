<?php

include("db.php");

$game_defaults = "Post-Apocalyptic";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Post-Apocalyptic</p>";
	echo "<p style='text-align: justify;'>";
	echo "Many of us have a morbid curiosity about the fate of the world if devastation took over. Movies like 'The Planet of the Apes', or Saturday morning cartoons like 'Thundarr the Barbarian', cause us to think of the possibilities of such events. Some like to play games where the world recently fell, like the Fallout computer game series. Others like a distant future world of fantastical possibilities. Whatever entertains you, you may find some tools here to help you construct these worlds easier.";
	echo "</p>";
}

else { include("body.php");}

?>