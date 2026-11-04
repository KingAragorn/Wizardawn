<?php

include("db.php");

$game_defaults = "BD&D";
include("game_defaults.php");

activeGame($connection,$_SESSION['SESSION_SECTION'],$webdir);

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);


if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; width:600px; margin-top: 0; margin-bottom: 0'>Dungeons &amp; Dragons</p>";
	echo "<p style='text-align: justify;'>";
	echo "The Dungeons &amp; Dragons set was revised in 1981 by Tom Moldvay. This edition draws solely on the original D&D boxed set for inspiration, rather than including material from its supplements. The game was not brought in line with AD&D but instead further away from that ruleset, and thus the Basic D&amp;D game became a separate and distinct product from TSR's flagship game AD&amp;D. Although simpler overall than the Advanced game, it included some rules that did not exist in AD&D at the time. The Moldvay Basic Set was immediately followed by the accompanying release of an Expert Dungeons &amp; Dragons set by Dave Cook and Steve Marsh that supported character levels four through fourteen.";
	echo "<br><br><br>You can find many Dungeons &amp; Dragons products at <a target='_blank' href='http://www.dndclassics.com/'>Dungeons &amp Dragons Classics</a>.";
	echo "</p>";
}

else { include("body.php");}

?>