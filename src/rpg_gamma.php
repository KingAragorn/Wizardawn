<?php

include("db.php");

$game_defaults = "Gamma World";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Gamma World</p>";
	echo "<p style='text-align: justify;'>";
	echo "Gamma World was a post-apocalyptic role-playing game created by TSR in 1978. Can you survive in a world gone mad? A world where civilization as we know it has been destroyed in a cataclysmic holocaust? What is left in this world? Find out and encounter such bizarre things as mutated plants and animals more terrible than you can imagine, radiation wastelands that stretch as far as the eye can see, and fearless machines gone uncontrollably berserk.";
	echo "</p>";
}

else { include("body.php");}

?>