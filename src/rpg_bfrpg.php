<?php

include("db.php");

$game_defaults = "BFRPG";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(35 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 40px; width:600px; margin-top: 0; margin-bottom: 0'>Basic Fantasy Role-Playing Game</p>";
	echo "<p style='text-align: justify;'>";
	echo "The Basic Fantasy Role-Playing Game is a rules-light game system based on the d20 SRD v3.5, but heavily rewritten with inspiration from early RPG game systems. It is suitable for those who are fans of 'old-school' game mechanics, and it's simple enough for children in perhaps second or third grade to play, yet still having enough depth for adults as well.";
	echo "<br><br><br>You can find many Basic Fantasy Role-Playing Game products at <a target='_blank' href='http://www.basicfantasy.org/'>their website</a>.";
	echo "</p>";
}

else { include("body.php");}

?>