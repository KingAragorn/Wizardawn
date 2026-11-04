<?php

include("db.php");

$game_defaults = "Fantasy";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Fantasy</p>";
	echo "<p style='text-align: justify;'>";
	echo "One of the dominant factors in published role-playing games...is the fantasy genre. Here at Wizardawn, more fantasy games are supported than any other genre. Many tools here are specific to particular games, but for those who do not play the games supported here...you may still find some of these tools useful.";
	echo "</p>";
}

else { include("body.php");}

?>