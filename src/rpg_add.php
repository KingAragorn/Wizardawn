<?php

include("db.php");

$game_defaults = "AD&D";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Advanced Dungeons &amp; Dragons</p>";
	echo "<p style='text-align: justify;'>";
	echo "Advanced Dungeons &amp; Dragons is a fantasy role-playing game originally released as a set of three rulebooks, compiled by Gary Gygax, between 1977 and 1979. The AD&D rules are better organized than the original D&D, and also incorporate so many extensions, additions, and revisions of the original rules as to make a new game. The term 'advanced' does not imply a higher level of skill required to play, nor exactly a higher level of or better gameplay; only the rules themselves are a new and advanced game. In a sense this version name split off to be viewed separately from the basic version. The three core rulebooks are the Monster Manual (1977), the Player's Handbook (1978), and the Dungeon Master's Guide (1979). Wizardawn also has options to use material from the Fiend Folio (1981), the Monster Manual II (1983), and the Unearthed Arcana (1985).";
	echo "<br><br><br>You can find many Advanced Dungeons &amp; Dragons products at <a target='_blank' href='http://www.dndclassics.com/'>Dungeons &amp Dragons Classics</a>.";
	echo "</p>";
}

else { include("body.php");}

?>