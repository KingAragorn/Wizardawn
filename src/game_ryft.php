<?php

include("db.php");

$_SESSION['SESSION_CREDITS'] = "wizardawn";
$_SESSION['SESSION_CREDIT2'] = "";
$_SESSION['SESSION_BKIMAGE'] = "scifi";
$_SESSION['SESSION_APPEARS'] = 4;
$_SESSION['SESSION_SECTION'] = 24;

$menu_on_left = $menu_on_right = $menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

if ($menu_section == 1){}

else if ($menu_section == 2){
	echo "<p style='font-size:" . round(30 * $font_size_adjust_text) . "px; margin-top: 0; margin-bottom: 0;'>Downloads<p>";
	echo "<a href='games/space_ryft.pdf' target='_blank'>Rule Book</a><p>";
	echo "<a href='games/space_ryft_character_sheet.pdf' target='_blank'>Character Sheet</a><p>";
	echo "<a href='games/space_ryft_ship_robot.pdf' target='_blank'>Vehicle/Robot Sheet</a><p>";
}

else if ($menu_section == 3){
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Space Ryft</p>";
	?>
	<p style='text-align: justify;'>
		Space Ryft is a futuristic adventure role-playing game of deep space. Assemble a crew, get yourself a ship, and head off to alien worlds in search of 
		artifacts, technology, and discovery.&nbsp; Space Ryft is free to download and play.
		<br><br>
		Space Ryft is fully compatible with the Wizardawn post-apocalyptic fantasy role-playing game Broken Urthe.
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