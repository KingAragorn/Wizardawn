<?php

include("db.php");

$game_defaults = "Mutant Future";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Mutant Future</p>";
	echo "<p style='text-align: justify;'>";
	echo "Mutant Future is a post-apocalyptic, science fantasy role-playing game by Goblinoid Games. The game is thematically patterned after genre predecessors such as Metamorphosis Alpha and its more widely known and published follow-up, Gamma World. Mutant Future's in-game setting is one of post-apocalyptic science fiction tropes, including global post-nuclear radiation, genetic mutation, dystopian societies, and advanced technology. Players choose from a variety of mutant animals, humans or plants; robots; and un-mutated 'pure' human characters to portray.";
	echo "<br><br><br>You can find Mutant Future at <a target='_blank' href='http://www.goblinoidgames.com/mutantfuture.html'>Goblinoid Games</a>.";
	echo "</p>";
}

else { include("body.php");}

?>