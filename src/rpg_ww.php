<?php

include("db.php");

$game_defaults = "Wizardry & Warriors";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Wizardry &amp; Warriors</p>";
	echo "<p style='text-align: justify;'>"; ?>
	Wizardry & Warriors&trade; is an alternate rules supplement to be used with the 5th edition of the Tunnels & Trolls&trade; role-playing game. This includes new rules for monsters, combat, and character creation...along with extra kindred and classes to play.
	<br><br>
	This is not a stand-alone game. You will need to get yourself a copy of the 5th edition of the Tunnels & Trolls&trade; role-playing game created by Ken St. Andre. You can get Tunnels & Trolls&trade; from <a target="_blank" href="http://www.flyingbuffalo.com/tandt.htm">Flying Buffalo Inc</a>.
	<?php
	echo "<br><br><br>You can find Wizardry &amp; Warriors here at <a href='game_ww.php'>Wizardawn</a>.";
	echo "<br><br>You can find Tunnels &amp; Trolls products at <a target='_blank' href='http://www.flyingbuffalo.com/tandt.htm'>Flying Buffalo Inc</a>.";
	echo "</p>";
}

else { include("body.php");}

?>