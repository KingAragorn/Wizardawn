<?php

include("db.php");

$game_defaults = "Labyrinth Lord";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Labyrinth Lord</p>";
	echo "<p style='text-align: justify;'>";
	echo "Enter a world filled with labyrinths, magic, and monsters! You can take the role of a cleric, dwarf, elf, fighter, halfling, magic-user, or thief on your quest for glory, treasure, and adventure! This is a complete role playing game. All you need are a few sheets of paper and some dice. Welcome back to a simpler old-school gaming experience. The Labyrinth Lord awaits your arrival. Can you survive the dangers of the labyrinth?";
	echo "<br><br>";
	echo "With the Advanced Edition Companion...you will get the play experience of the old editions of the world's most popular fantasy roleplaying game. Play the race and class possibilities from the 'advanced' first edition 1978 rules. Introduce the essential first edition monsters, spells, and magic items to your Labyrinth Lord game. All of these options are fully compatible with the core Labyrinth Lord rules, so that you can continue to play race-classes right along with all of the advanced classes and races. In this book you will find...A player's guide to advanced play Additional core first edition monsters The full range of first edition spells and spellcasters The essential first edition magic items Advanced rules for greater depth of play.";
	echo "<br><br><br>You can find Labyrinth Lord at <a target='_blank' href='http://www.goblinoidgames.com/labyrinthlord.html'>Goblinoid Games</a>.";
	echo "</p>";
}

else { include("body.php");}

?>