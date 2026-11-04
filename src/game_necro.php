<?php

include("db.php");

$_SESSION['SESSION_CREDITS'] = "wizardawn";
$_SESSION['SESSION_CREDIT2'] = "";
$_SESSION['SESSION_BKIMAGE'] = "zombie";
$_SESSION['SESSION_APPEARS'] = 5;
$_SESSION['SESSION_SECTION'] = 22;

$for = "AND mn_members LIKE '%x10x%'";

$menu_on_left = $menu_on_right = $menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

if ($menu_section == 1){}
else if ($menu_section == 2){
	echo "<p style='font-size:" . round(30 * $font_size_adjust_text) . "px; margin-top: 0; margin-bottom: 0;'>Downloads<p>";
	echo "<a href='games/necropalyx.pdf' target='_blank'>Rule Book</a><p>";
	echo "<a href='games/necropalyx_csheet.pdf' target='_blank'>Character Sheet</a><p>";
}

else if ($menu_section == 3){
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Necropalyx</p>";
	?>
	<p style='text-align: justify;'>Wake up in a world of survival horror. Zombies have overrun the Earth and you suddenly realize that you are the only help you are going to get! Prepare yourself for Necropalyx. Look around, gather some gear, and head out the door to fight for your own survival.<br>
  <br>
  In Necropalyx, you create a character that has survived the initial outbreak of a zombie apocalypse. One of the unique features of character creation, is that you would look around your home (or wherever you are playing) and write down your list of equipment from what you see. The goal is simple. How long can you stay alive?</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
<?php
}

else { include("body.php"); }

?>