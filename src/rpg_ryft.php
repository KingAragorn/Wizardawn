<?php

include("db.php");

$game_defaults = "Space Ryft";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Space Ryft</p>";
	echo "<p style='text-align: justify;'>"; ?>
		Space Ryft is a futuristic adventure role-playing game of deep space. Assemble a crew, get yourself a ship, and head off to alien worlds in search of 
		artifacts, technology, and discovery.&nbsp; Space Ryft is free to download and play.
		<br><br>
		Space Ryft is fully compatible with the Wizardawn post-apocalyptic fantasy role-playing game Broken Urthe.
	<?php
	echo "<br><br><br>You can find Space Ryft here at <a href='game_ryft.php'>Wizardawn</a>.";
	echo "</p>";
}

else { include("body.php");}

?>