<?php

include("db.php");

$_SESSION['SESSION_CREDITS'] = "wizardawn";
$_SESSION['SESSION_CREDIT2'] = "tandt";
$_SESSION['SESSION_BKIMAGE'] = "gamma";
$_SESSION['SESSION_APPEARS'] = 3;
$_SESSION['SESSION_SECTION'] = 25;

$menu_on_left = $menu_on_right = $menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

if ($menu_section == 1){ echo "<p><img src='pics/game_tt5.jpg' /><p><img src='pics/game_tt7.jpg' />"; }

else if ($menu_section == 2){
	echo "<p style='font-size:" . round(30 * $font_size_adjust_text) . "px; margin-top: 0; margin-bottom: 0;'>Downloads<p>";
	echo "<a href='games/mm.pdf' target='_blank'>Rule Book</a><p>";
	echo "<a href='games/zendynn_5.pdf' target='_blank'>World of Zendynn (5th)</a><p>";
	echo "<a href='games/zendynn_7.pdf' target='_blank'>World of Zendynn (7th)</a><p>";
}

else if ($menu_section == 3){
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Millenniums &amp; Mutations</p>";
	?>
	<p style='text-align: justify;'>
	Millenniums & Mutations&trade; is a supplement to be used with the Tunnels & Trolls&trade; role-playing game, that allows you to create adventures in a futuristic post-apocalyptic world of adventure. 
	This supplement will provide you with enough information to have you off and running in this radiation altered land where thousands of years have passed since a catastrophe has destroyed life as we know it.
	<br><br>
	This is not a stand-alone game. You will need to get yourself a copy of the Tunnels & Trolls&trade; role-playing game created by Ken St. Andre. Any version should suffice, but this supplement focuses on 5th, 7th, &amp; Deluxe editions of the game. 
	You can get Tunnels & Trolls&trade; from <a target="_blank" href="http://www.flyingbuffalo.com/tandt.htm">Flying Buffalo Inc</a>.
	<br><br>
	The World of Zendynn&trade; is a supplement for the Millenniums & Mutations&trade; game that provides a map of the known world, along with 300 creatures and 100 robots to use in designing your adventures in this post-apocalyptic world. 
	There are versions of Zendynn&trade; that is dependent on the version of Tunnels & Trolls&trade; you are using.</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
<?php
}

else { include("body.php"); }

?>