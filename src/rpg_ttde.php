<?php

include("db.php");

$game_defaults = "T&T Deluxe";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Tunnels &amp; Trolls</p>";
	echo "<p style='font-size:" . round(35 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 40px; width:600px; margin-top: 0; margin-bottom: 0'>&nbsp;Deluxe</p>";
	echo "<p style='text-align: justify;'>";
	echo "Tunnels &amp; Trolls is one of the easiest role playing games to learn and play. All you need are paper &amp; pencil and some six-sided dice. One of the best things about T&amp;T is that you can play it solitaire, where the book is the gamemaster. Most of the following rules are written as if you are playing a solitaire adventure. If you are playing with a gamemaster, he or she will roll the dice for any opponents or monsters, and normally you will not be told the Monster Rating, or armor of your enemy, only what you might be able to see, and the total of any dice rolls.";
	echo "<br><br><br>You can find Tunnels &amp; Trolls products at <a target='_blank' href='http://www.flyingbuffalo.com/tandt.htm'>Flying Buffalo Inc</a>.";
	echo "</p>";
}

else { include("body.php");}

?>