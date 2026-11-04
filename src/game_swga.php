<?php

include("db.php");

$_SESSION['SESSION_CREDITS'] = "swga";
$_SESSION['SESSION_CREDIT2'] = "";
$_SESSION['SESSION_BKIMAGE'] = "swga";
$_SESSION['SESSION_APPEARS'] = 4;
$_SESSION['SESSION_SECTION'] = "STAR";

$menu_on_left = $menu_on_right = $menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

if ($menu_section == 1){}

else if ($menu_section == 2){
	echo "<p style='font-size:" . round(30 * $font_size_adjust_text) . "px; margin-top: 0; margin-bottom: 0;'>Downloads<p>";
	echo "<a href='games/swga.pdf' target='_blank'>Rule Book</a><p>";
	echo "<a href='games/swga_csheet.pdf' target='_blank'>Character Sheet</a><p>";
	echo "<a href='games/swga_screen.pdf' target='_blank'>Game Screen</a><p>";
	echo "<a href='games/swga_vehicle.pdf' target='_blank'>Vehicle Sheet</a><p>";
	echo "<a href='games/swga_creature.pdf' target='_blank'>Creature/Citizen Sheet</a><p>";
	echo "<a href='games/swga_items.pdf' target='_blank'>Item Template Sheet</a><p>";
}

else if ($menu_section == 3){
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: StarWars; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'> Star Wars</p>";
	echo "<p style='font-size:" . round(30 * $font_size_adjust_main) . "px; line-height: 35px; width:600px; margin-top: 0; margin-bottom: 0'>Galactic Adventures</p>";
	?>
	<p style='text-align: justify;'>Star Wars Galactic Adventures is a fan created role-playing game that explores the idea, &quot;what if someone made a Star Wars role-playing game in the late 1970's or early 1980's&quot;. This 60 page rule book contains all you need to play in the Star Wars universe, while using a rule set that is familar to those who played games like classic Dungeons &amp; Dragons.
	<br><br>This game provides you with 24 species, along with 9 professions, to give players diverse choices when exploring the universe. Become a group of pirates or smugglers. Take on the role of a bounty hunter. Join the republic as a pilot or be a soldier for the Sith. With the weapons and equipment, or the force powers available, you will be off into the galaxy in no time.</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
<?php
}

else { include("body.php"); }

?>