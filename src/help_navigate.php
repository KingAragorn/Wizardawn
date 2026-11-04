<?php

include("db.php");

$game_defaults = "Help";
include("game_defaults.php");

$menu_on_left = $menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

$menu_on_right = "menus/menu_help_right.php";

if ($menu_section == 1){ echo "<img src='pics/help_navigate.jpg'><br>"; include_once("menus/menu_help_left.php"); }
else if ($menu_section == 2){ echo ""; }
else if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Navigating Wizardawn</p>";
	echo "<p style='text-align: justify;'>"; ?>
		Although Wizardawn does have some generic tools, it mostly focuses on particular games. When navigating around Wizardawn, keep in mind that it remembers the game or genre you are currently in. This means if you open Wizardawn in a separate browser session, and go to a game that differs from your first browser session...then the new game will be the focus of the tools and supplements. The top menu has various choices, each described below...<br />
		<br />
		The 'Fantasy Game' is where you would choose a fantasy game that you play...or one you may play that is close to it. You will be brought to that game's main page, where you will see the various supplements and tools that have been created for that game...or can be used with that game.<br />
		<br />
		The 'Other Game' is where you would choose a sci-fi or survival horror game that you play...or one you may play that is close to it. You will be brought to that game's main page, where you will see the various supplements and tools that have been created for that game...or can be used with that game.<br />
		<br />
		The 'Generic Genre' does not focus on a particular type of game, but on genres such as science-fiction or fantasy. When using tools or supplements in this area, there will be fewer...but it also means they are generic enough to be used in any game you may be playing in that genre.<br />
		<br />
		The 'Custom Tools' option is a small assortment of tools that allows you to upload your own data file to customize the materials you may want. Here you will find pre-made data files for many of the games you find supported here.<br />
		<br />
		The 'Wizardawn Games' section is the place to get free games created by Wizardawn Entertainment. They are print-and-play and all have a very rules-light approach to gaming. There are even some tools here for those games.<br />
		<br />
		The 'Help' option is where you found this page...just some general information and assistance while here at Wizardawn.<br />
		<br />
		Lastly, the 'Home' option will bring you back to Wizardawn's main page...no matter where you are.<br />
		<br />
		Remember, Wizardawn Entertainment provides the content on this website in support of its goal to provide information in aid of playing games. Wizardawn invites visitors to use its online content for personal, educational, and other non-commercial purposes (unless otherwise noted). By using the Wizardawn website, you accept and agree to abide by these terms.
	</p>
<?php
}

else { include("body.php");}

?>