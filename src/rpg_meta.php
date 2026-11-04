<?php

include("db.php");

$game_defaults = "Metamorphosis Alpha";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Metamorphosis Alpha</p>";
	echo "<p style='text-align: justify;'>";
	echo "Metamorphosis Alpha was a science-fiction role-playing game created by TSR in 1976. In METAMORPHOSIS ALPHA, you are aboard the stricken starship and struggling to survive, trying to gain knowledge of the strange devices and mechanical apparatus of the vessel, attempting to learn the secrets of the strange world you inhabit. As a player, you may be a human or mutant - human or otherwise. Your course is up to your skill and imagination.";
	echo "<br><br><br>You can find Metamorphosis Alpha at <a target='_blank' href='http://rpg.drivethrustuff.com/product/50526/Metamorphosis-Alpha-1st-Edition'>DriveThruRPG</a>.";
	echo "</p>";
}

else { include("body.php");}

?>