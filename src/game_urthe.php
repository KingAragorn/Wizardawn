<?php

include("db.php");

$_SESSION['SESSION_CREDITS'] = "wizardawn";
$_SESSION['SESSION_CREDIT2'] = "";
$_SESSION['SESSION_BKIMAGE'] = "gamma";
$_SESSION['SESSION_APPEARS'] = 3;
$_SESSION['SESSION_SECTION'] = 20;

$menu_on_left = $menu_on_right = $menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

if ($menu_section == 1){}

else if ($menu_section == 2){
	echo "<p style='font-size:" . round(30 * $font_size_adjust_text) . "px; margin-top: 0; margin-bottom: 0;'>Downloads<p>";
	echo "<a href='games/broken_urthe.pdf' target='_blank'>Rule Book</a><p>";
	echo "<a href='games/broken_urthe_csheet.pdf' target='_blank'>Character Sheet</a><p>";
	echo "<a href='games/broken_urthe_vsheet.pdf' target='_blank'>Vehicle/Robot Sheet</a><p>";
	echo "<a href='games/broken_urthe_creature_guide.pdf' target='_blank'>Creature Guide</a><p>";
	echo "<a href='games/broken_urthe_world_guide.pdf' target='_blank'>World Guide</a><p>";
	echo "<a href='games/broken_urthe_map.jpg' target='_blank'>World Map</a><p>";
}

else if ($menu_section == 3){
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Broken Urthe</p>";
	?>
	<p style='text-align: justify;'>
		Broken Urthe is a post-apocalyptic fantasy role-playing game set in the 45th century, thousands of years after an unknown cataclysmic event. Take on the role of a human exploring 
		this vast new world, in search of artifacts, fame, or answers to what the world has become. Broken Urthe&trade; is free to 
		download and play. The Broken Urthe - Creature Guide is a supplement to the Broken Urthe role-playing game. This book contains 300 creatures you can use in your adventures.
		<br><br>
		The Broken Urthe - World Guide is a supplement to the Broken Urthe role-playing game. This books contains some more information on Urthe as well as new vehicles, artifacts, items, 
		and many robots to use in your games. This supplement also provides rules to make mutants for characters to become, like humanoid insects or animals.&nbsp; Included are tables to 
		create encounters based on habitat or terrain, along with some traps to add danger to your adventures.
		<br><br>
		Broken Urthe is fully compatible with the Wizardawn futuristic adventure role-playing game Space Ryft.
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