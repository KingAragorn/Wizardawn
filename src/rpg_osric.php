<?php

include("db.php");

$game_defaults = "OSRIC";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>OSRIC</p>";
	echo "<p style='text-align: justify;'>"; ?>

	OSRIC (Old School Reference and Index Compilation) is a fantasy role-playing game that emulates the play style of the advanced edition fantasy game released in the late 1970's. Created by Stuart Marshall, this game comes complete in a single tome and 
	allows players to take on the role of a warrior, mage, cleric, thief, or assassin...exploring dangerous dungeons and wilderness settings. Within the rules you will find over 400 spells, almost 300 monsters, over 
	300 magic items, 7 races, and 9 character classes to play. Here you will find many tools that will help you create worlds in which players can explore.
	<?php
	echo "<br><br><br>You can find the OSRIC rules at the <a target='_blank' href='http://www.knights-n-knaves.com/osric/'>Knights &amp; Knaves Alehouse</a>.";
	echo "</p>";
}

else { include("body.php");}

?>