<?php

include("db.php");

$game_defaults = "Broken Urthe";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Broken Urthe</p>";
	echo "<p style='text-align: justify;'>"; ?>
		Broken Urthe is a post-apocalyptic fantasy role-playing game set in the 45th century, thousands of years after an unknown cataclysmic event. Take on the role of a human exploring 
		this vast new world, in search of artifacts, fame, or answers to what the world has become. Broken Urthe&trade; is free to 
		download and play. The Broken Urthe - Creature Guide is a supplement to the Broken Urthe role-playing game. This book contains 300 creatures you can use in your adventures.
		<br><br>
		The Broken Urthe - World Guide is a supplement to the Broken Urthe role-playing game. This books contains some more information on Urthe as well as new vehicles, artifacts, items, 
		and many robots to use in your games. This supplement also provides rules to make mutants for characters to become, like humanoid insects or animals.&nbsp; Included are tables to 
		create encounters based on habitat or terrain, along with some traps to add danger to your adventures.
		<br><br>
		Broken Urthe is fully compatible with the Wizardawn post-apocalyptic fantasy role-playing game Space Ryft.
	<?php
	echo "<br><br><br>You can find Broken Urthe here at <a href='game_urthe.php'>Wizardawn</a>.";
	echo "</p>";
}

else { include("body.php");}

?>