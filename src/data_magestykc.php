<?php

include("db.php");

$for = "AND mn_members LIKE '%x" . $_SESSION['SESSION_SECTION'] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

if (wz_num_rows(wz_query( $connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "T&T 5e";	include("game_defaults.php"); }

if ($menu_section == 3){

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Magestykc Supplement</p>";
	echo "<p style='text-align: justify;'>"; ?>
		Magestykc is a supplement to the Tunnels &amp; Trolls role-playing game. Tunnels &amp; Trolls is an extremely dynamic game where one person may run it totally different from another...where monsters and kindred are unique. 
		Magic items, traps, and the world may differ. Due to this versatility, I decided to focus on my style of play. Other than the versatility of using 
		your own data files, the Wizardawn site will provide tools that focus on this alternate world of Magestykc. Tools to quickly create your own dungeons, 
		traps, or magic items. Tools that will help you get into the game quicker as a storyteller.
	</p>
	<?php
}

else { include("body.php");}

?>