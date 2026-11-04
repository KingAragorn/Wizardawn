<?php

include("db.php");

$game_defaults = "Data";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_data.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Custom Tools</p>";
	echo "<p style='text-align: justify;'>"; ?>
	Data files allow you to customize the output by allowing you to add your own monsters, treasure, traps...and even removing things you do not want. 
	It is assembled to your particular game system and style. You are now in control of what these generators can create for you. 
	No longer are you limited to just a couple of game systems, you can use whatever you want.
	<br><br>
	On the right, you will find many data files that you can download and use. Once downloaded, you can easily edit these files to your particular style. You can add more treasure. You can add more spells, you can remove monsters you don't want.
	<br><br>
	The generators on the right are particular tools that allow you to paste information from data files to create custom information you want.
	</p>
	<?php
}

else { include("body.php");}

?>