<?php

include("db.php");

$game_defaults = "Swords & Wizardry";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Swords &amp; Wizardry</p>";
	echo "<p style='text-align: justify;'>";
	echo "Light your torches, don your helmets, and ready your spells...the Swords &amp; Wizardry Core Rules are a 'clone' of the original Gary Gygax 1974 fantasy roleplaying game that started it all. With a thriving internet community and tons of support products, Swords &amp; Wizardry is bringing back a lost style of fantasy roleplaying. Forget huge rule books...just play. If you can imagine it, you can do it in Swords &amp; Wizardry. The rules are simple and quick to learn, and they are infinitely flexible.";
	echo "<br><br><br>You can find Swords &amp; Wizardry at <a target='_blank' href='http://www.swordsandwizardry.com/'>Mythmere Games</a>.";
	echo "</p>";
}

else { include("body.php");}

?>