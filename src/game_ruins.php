<?php

include("db.php");

$_SESSION['SESSION_CREDITS'] = "wizardawn";
$_SESSION['SESSION_CREDIT2'] = "";
$_SESSION['SESSION_BKIMAGE'] = "fantasy";
$_SESSION['SESSION_APPEARS'] = 0;
$_SESSION['SESSION_SECTION'] = 23;

$menu_on_left = $menu_on_right = $menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

if ($menu_section == 1){}

else if ($menu_section == 2){
	echo "<p style='font-size:" . round(30 * $font_size_adjust_text) . "px; margin-top: 0; margin-bottom: 0;'>Downloads<p>";
	echo "<a href='games/ruins_and_riches.pdf' target='_blank'>Rule Book</a><p>";
	echo "<a href='games/ruins_and_riches_enemies.pdf' target='_blank'>Monster Tome</a><p>";
	echo "<a href='games/ruins_and_riches_tables.pdf' target='_blank'>Storyteller Tables</a><p>";
	echo "<a href='games/ruins_and_riches_csheet.pdf' target='_blank'>Character Sheet</a><p>";
}

else if ($menu_section == 3){
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Ruins &amp; Riches</p>";
	?>
	<p style='text-align: justify;'>
		Ruins & Riches&trade; is a simple fantasy role-playing game that allows you to take on the role of a character in a fantasy world of adventure. 
		You will brave dangerous areas in search of treasure and artifacts. You will come face to face with perilous traps and horrible creatures. 
		You may live to tell your tales...or you may suffer a horrible fate.
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