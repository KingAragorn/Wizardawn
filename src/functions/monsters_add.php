<?php

include("../db.php");

$game_choice = $_POST['game'];

if ($game_choice == "BD&D"){ $cmd = "creator='BX'"; $sesvar = "SESSION_MM_BX"; $csesvar = "SESSION_CMM_BX"; }
else if ($game_choice == "BFRPG"){ $cmd = "creator='BFRPG'"; $sesvar = "SESSION_MM_BFRPG"; $csesvar = "SESSION_CMM_BFRPG"; }
else if ($game_choice == "Labyrinth Lord"){ $cmd = "(creator LIKE 'AEC%' OR creator LIKE 'LL%')"; $sesvar = "SESSION_MM_LL"; $csesvar = "SESSION_CMM_LL"; }
else if ($game_choice == "OSRIC"){ $cmd = "(creator='OSRIC' OR creator='MoM')"; $sesvar = "SESSION_MM_OSRIC"; $csesvar = "SESSION_CMM_OSRIC"; }
else if ($game_choice == "AD&D"){ $cmd = "(creator LIKE 'SRC%')"; $sesvar = "SESSION_MM_ADD"; $csesvar = "SESSION_CMM_ADD"; }
else if ($game_choice == "Swords & Wizardry"){ $cmd = "creator='SW'"; $sesvar = "SESSION_MM_SW"; $csesvar = "SESSION_CMM_SW"; }
else if ($game_choice == "Tunnels & Trolls 5th Edition"){ $cmd = "creator='TT'"; $sesvar = "SESSION_MM_TT5"; $csesvar = "SESSION_CMM_TT5"; }
else if ($game_choice == "Tunnels & Trolls 7th Edition"){ $cmd = "creator='TT'"; $sesvar = "SESSION_MM_TT7"; $csesvar = "SESSION_CMM_TT7"; }
else if ($game_choice == "Tunnels & Trolls Deluxe"){ $cmd = "creator='TT'"; $sesvar = "SESSION_MM_TTD"; $csesvar = "SESSION_CMM_TTD"; }
else if ($game_choice == "Swords & Six-Siders"){ $cmd = "creator='SX'"; $sesvar = "SESSION_MM_SX"; $csesvar = "SESSION_CMM_SX"; }

$qry = "SELECT * FROM monsters_rpgs WHERE $cmd ORDER BY name";
$res = wz_query( $connection, $qry ); /* qry. */
$list = 0;

while ($ary=wz_fetch_assoc($res)) :

	$pick = 0;
	$chance = 1;
	if ( isset( $_POST["pick_".$ary['id'].""] ) )
	{
		$pick = $_POST["pick_".$ary['id'].""]+0;
		$chance = $_POST["chance_".$ary['id'].""]+0;
	}
	if ($pick > 0){ $list = $list + 1; $monster_manual = $monster_manual . $ary['id'] . "|" . $chance . "^"; }

endwhile;

if ($list > 0){$_SESSION[$sesvar] = $monster_manual;} else {unset($_SESSION[$sesvar]);}

	$xchance = $_POST['xchance_1'];
	$xmonster = $_POST['xmonster_1'];
	$clist = $clist + 1; $cmonster_manual = $cmonster_manual . $xmonster . "|^|" . $xchance . "|$|";
	$xchance = $_POST['xchance_2'];
	$xmonster = $_POST['xmonster_2'];
	$clist = $clist + 1; $cmonster_manual = $cmonster_manual . $xmonster . "|^|" . $xchance . "|$|";
	$xchance = $_POST['xchance_3'];
	$xmonster = $_POST['xmonster_3'];
	$clist = $clist + 1; $cmonster_manual = $cmonster_manual . $xmonster . "|^|" . $xchance . "|$|";
	$xchance = $_POST['xchance_4'];
	$xmonster = $_POST['xmonster_4'];
	$clist = $clist + 1; $cmonster_manual = $cmonster_manual . $xmonster . "|^|" . $xchance . "|$|";
	$xchance = $_POST['xchance_5'];
	$xmonster = $_POST['xmonster_5'];
	$clist = $clist + 1; $cmonster_manual = $cmonster_manual . $xmonster . "|^|" . $xchance . "|$|";

if ($clist > 0){$_SESSION[$csesvar] = $cmonster_manual;} else {unset($_SESSION[$csesvar]);}

header("Location:monsters.php");

?>