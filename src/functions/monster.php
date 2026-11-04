<?php

function PArandomMonster($level,$type,$game,$mutate,$might1,$might2)
{
	$level = $level + 0;		if ($level > 15){$level = 15;}		if ($level < 2){$level = 2;}		$level_max = $level+4;

	include("db.php");

  if ($game == "Mutant Future")
  {
	$qry = "SELECT * FROM monsters_rpgs WHERE creator='MF' AND m_trap=$type AND difficulty>=$level AND difficulty<=$level_max ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	$res = wz_query( $connection, $qry ); /* qry. */
	$num = wz_num_rows($res);
	if ($num < 1)
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='MF' AND m_trap=$type ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
		$res = wz_query( $connection, $qry ); /* qry. */
	}
	$ary = wz_fetch_assoc($res);
  }
  else if ($game == "Labyrinth Lord")
  {
	$x_crossover = "Goblinoid";
	$qry = "SELECT * FROM monsters_rpgs WHERE creator='MF' AND m_trap=$type AND difficulty>=$level AND difficulty<=$level_max ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	$res = wz_query( $connection, $qry ); /* qry. */
	$num = wz_num_rows($res);
	if ($num < 1)
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='MF' AND m_trap=$type ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
		$res = wz_query( $connection, $qry ); /* qry. */
	}
	$ary = wz_fetch_assoc($res);
  }
  else
  {
	if ($type == 2){$twe = "AND (location LIKE '%FW%' OR location LIKE '%SW%')";} else {$twe = "AND location LIKE '%DG%'";}
	if (mt_rand(1,100) > 10){ $mdn = "AND type!='R' AND iq='Animal'";} else { $mdn = "AND type='R'"; }
	$qry = "SELECT * FROM monsters_rpgs WHERE difficulty>=$level AND difficulty<=$level_max AND creator='BU' $twe $mdn ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	$res = wz_query( $connection, $qry ); /* qry. */
	$num = wz_num_rows($res);
	if ($num < 1)
	{
		$qry = "SELECT * FROM monsters_rpgs WHERE creator='BU' $twe $mdn ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
		$res = wz_query( $connection, $qry ); /* qry. */
	}
	$ary = wz_fetch_assoc($res);
  }

	$x_game = $game;

	$x_mutants = $mutate;

	include("functions/stat_blocks.php");

  return $monster_info;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function randomMonster($level,$type,$game,$extra,$undead)
{
	$level = $level + 0;

	if ($game == "Swords & Six-Siders")
	{
		$level = 1;		$level_max = $level+1;
	}
	else
	{
		if ($level > 15){$level = 15;}		if ($level < 2){$level = 2;}		$level_max = $level+4;
	}

	include("db.php");

	if ($undead > 0){$haunted = "AND turn>0";}

	if (($game == "OSRIC") && ($extra > 0)){$mnn = "(creator='OSRIC' OR creator='MoM')";}
	else if ($game == "OSRIC"){$mnn = "creator='OSRIC'";}
	else if ($game == "AD&D")
	{
		$dd_ff = $_SESSION["SESSION_ADD_FF"];
		$dd_mm2 = $_SESSION["SESSION_ADD_MM2"];
		$mnn = "(creator LIKE 'SRC: MM %' OR ";
		if ($dd_ff > 0){$mnn = $mnn . "creator LIKE 'SRC: FF %' OR ";}
		if ($dd_mm2 > 0){$mnn = $mnn . "creator LIKE 'SRC: MM2 %' OR ";}
		$mnn = $mnn . "creator = 'ADDDD')";
	}
	else if ($game == "Swords & Wizardry"){$mnn = "creator='SW'";}
	else if ($game == "Swords & Six-Siders"){$mnn = "creator='SX'";}
	else if ($game == "BD&D"){$mnn = "creator='BX'";}
	else if ($game == "BFRPG"){$mnn = "creator='BFRPG'";}
	else if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$mnn = "creator='TT'"; $ttlvl = $extra;}
	else if ($game == "Labyrinth Lord")
	{
		$aec = $_SESSION["SESSION_ADD_AEC"];
		if ($aec > 0){$mnn = "(creator LIKE 'AEC%' OR creator LIKE 'LL%')";}
		else {$mnn = "(creator LIKE 'LL%')";}
	}

	$qry = "SELECT * FROM monsters_rpgs WHERE $mnn AND m_trap=$type AND difficulty>=$level $haunted AND difficulty<=$level_max ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	$res = wz_query( $connection, $qry ); /* qry. */
	$ary = wz_fetch_assoc($res);
	$num = wz_num_rows($res);
	if ($num == 0)
	{	$level_max = $level_max + 5;
		$qry = "SELECT * FROM monsters_rpgs WHERE $mnn AND m_trap=$type $haunted ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
		$res = wz_query( $connection, $qry ); /* qry. */
		$ary = wz_fetch_assoc($res);
	}

	$x_game = $game;

	include("functions/stat_blocks.php");

	return $monster_info;
}
?>