<?php

include("db.php");

$game_defaults = "Horror";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Survival Horror</p>";
	echo "<p style='text-align: justify;'>";
	echo "With the release of Wizardawn's Necropalyx role-playing game, players can try to stay alive in a world overrun by the dead. Along with some of the tools and supplements to support that game, some may find these things useful for other zombie apocalypse games they may play.";
	echo "</p>";
}

else { include("body.php");}

?>