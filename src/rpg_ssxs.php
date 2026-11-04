<?php

include("db.php");

$game_defaults = "Swords & Six-Siders";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(35 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 40px; width:600px; margin-top: 0; margin-bottom: 0'>Swords & Six-Siders</p>";
	echo "<p style='text-align: justify;'>";
	echo "Swords & Six-Siders is a fantasy role-playing game inspired by the works of Gary Gygax, Dave Arneson, and Ken St. Andre. This is a rules-lite game of dungeon exploration and fantasy adventure, and only uses six-sided dice. All that is needed to play are the Player & Game Master books, pencil and paper, six-sided dice, two or more players, and your imagination.";
	echo "<br><br><br>You can find Swords & Six-Siders at the <a target='_blank' href='http://www.vanquishingleviathan.com/'>Vanquishing Leviathan</a> website.";
	echo "</p>";
}

else { include("body.php");}

?>