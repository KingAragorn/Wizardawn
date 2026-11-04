<?php

include("db.php");

$_SESSION['SESSION_CREDITS'] = "tandt";
$_SESSION['SESSION_CREDIT2'] = "wizardawn";
$_SESSION['SESSION_BKIMAGE'] = "fantasy";
$_SESSION['SESSION_APPEARS'] = 6;
$_SESSION['SESSION_SECTION'] = 27;

$menu_on_left = $menu_on_right = $menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

if ($menu_section == 1){ echo "<p><img src='pics/game_tt5.jpg' />"; }

else if ($menu_section == 2){
	echo "<p style='font-size:" . round(30 * $font_size_adjust_text) . "px; margin-top: 0; margin-bottom: 0;'>Downloads<p>";
	echo "<a href='games/wizardry_and_warriors.pdf' target='_blank'>Rule Book</a><p>";
	echo "<a href='games/wizardry_and_warriors_monsters.pdf' target='_blank'>Monster Book</a><p>";
	echo "<a href='games/wizardry_and_warriors_dungeons.pdf' target='_blank'>Dungeon Book</a><p>";
	echo "<a href='games/wizardry_and_warriors_csheet.pdf' target='_blank'>Character Sheet</a><p>";
}

else if ($menu_section == 3){
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Wizardry &amp; Warriors</p>";
	?>
	<p style='text-align: justify;'>
		Wizardry &amp; Warriors is a set of supplemental rules that changes elements of the Tunnels &amp; Trolls&trade; 5th edition role-playing game. These rules provide new kindred, character types, and 
		monsters. There is also a simplified equipment listing and a revamped combat system that allows for scalable one-on-one style combats.
		<br><br>
		This is not a stand-alone game. You will need to get yourself a copy of the Tunnels &amp; Trolls&trade; role-playing game created by Ken St. Andre. This supplement focuses on the 5th edition of the game (but 4th edition, 5.5 edition, or 
		Monsters! Monsters! should work as well). You can get Tunnels &amp; Trolls&trade; from <a target="_blank" href="http://www.flyingbuffalo.com/tandt.htm">Flying Buffalo Inc</a>.
	</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
<?php
}

else { include("body.php"); }

?>