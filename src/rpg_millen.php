<?php

include("db.php");

$game_defaults = "Millenniums & Mutations";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Millenniums &amp; Mutations</p>";
	echo "<p style='text-align: justify;'>"; ?>
	Millenniums & Mutations&trade; is a supplement to be used with the Tunnels & Trolls&trade; role-playing game, that allows you to create adventures in a futuristic post-apocalyptic world of adventure. 
	This supplement will provide you with enough information to have you off and running in this radiation altered land where thousands of years have passed since a catastrophe has destroyed life as we know it.
	<br><br>
	This is not a stand-alone game. You will need to get yourself a copy of the Tunnels & Trolls&trade; role-playing game created by Ken St. Andre. Any version should suffice, but this supplement focuses on 5th, 7th, &amp; Deluxe editions of the game. 
	You can get Tunnels & Trolls&trade; from <a target="_blank" href="http://www.flyingbuffalo.com/tandt.htm">Flying Buffalo Inc</a>.
	<br><br>
	The World of Zendynn&trade; is a supplement for the Millenniums & Mutations&trade; game that provides a map of the known world, along with 300 creatures and 100 robots to use in designing your adventures in this post-apocalyptic world. 
	There are versions of Zendynn&trade; that is dependent on the version of Tunnels & Trolls&trade; you are using.
	<?php
	echo "<br><br><br>You can find Millenniums &amp; Mutations here at <a href='game_mm.php'>Wizardawn</a>.";
	echo "<br><br>You can find Tunnels &amp; Trolls products at <a target='_blank' href='http://www.flyingbuffalo.com/tandt.htm'>Flying Buffalo Inc</a>.";
	echo "</p>";
}

else { include("body.php");}

?>