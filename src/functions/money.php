<?php

function PAcurrencyBuilder($level,$size,$where,$cut,$bagged,$money,$map)
{
	$coins = mt_rand(1,90);

	if ($size == 1){$coins = mt_rand(1,65);} else if ($size == 2){$coins = mt_rand(1,80);}
	if (($level + 0) < 1){$level = 1;}
	if ($coins < 36){$copper = (500 * $level);}
	else if ($coins < 66){$copper = (1000 * $level);}
	else if ($coins < 81){$copper = (2000 * $level);}
	else {$copper = (5000 * $level);}

	$copper = mt_rand((round($copper/4)), $copper);

	$copper = ceil($copper*(0.01*$cut));

	if ($bagged == 1)
	{
		if (($where != 1) || (mt_rand(1,100) > 70)){$words = "A " . strtoupper(PAbagCreator($map)) . " CONTAINING: ";}
		else {$words = "A PILE OF " . strtoupper($money) . ": ";}
	}
	$words = $words . "" . number_format($copper) . " " . $money;

	return $words;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

function currencyBuilder($level,$size,$where,$cut,$bagged,$game)
{
	if ($size == 1){$varx = 80;} else if ($size == 2){$varx = 50;} else {$varx = 0;}
	if (($level + 0) < 1){$level = 1;}
	$coins = mt_rand(1,90);
	if ($coins < 36){$copper = (1500 * $level);}
	else if ($coins < 66){$copper = (7500 * $level);}
	else if ($coins < 81){$copper = (25000 * $level);}
	else {$copper = (50000 * $level);}

	$copper = ceil($copper*(0.01*$cut));

	if ($game == "Swords & Six-Siders")
	{
		$gold = ceil($copper/100);
		$copper = 0;
	}
	else
	{
		if ((mt_rand(1,100) > (90-$varx)) && ($game != "Swords & Wizardry") && ($game != "Tunnels & Trolls 5th Edition") 
																			&& ($game != "Tunnels & Trolls 7th Edition") 
																			&& ($game != "Tunnels & Trolls Deluxe")){			$pp = 500;	$ppp = floor($copper/$pp);	if ($ppp > 0){$platinum = mt_rand(1,$ppp);}	$copper = $copper - ($platinum * $pp);}
		   if (mt_rand(1,100) > (70-$varx)){																					$gp = 100;	$gpp = floor($copper/$gp);	if ($gpp > 0){$gold = mt_rand(1,$gpp);}		$copper = $copper - ($gold * $gp);}
			  if ((mt_rand(1,100) > (60-$varx)) && ($game != "Swords & Wizardry") 
												&& ($game != "Tunnels & Trolls 5th Edition") 
												&& ($game != "Tunnels & Trolls 7th Edition") 
												&& ($game != "Tunnels & Trolls Deluxe")){										$ep = 50;	$epp = floor($copper/$ep);	if ($epp > 0){$electrum = mt_rand(1,$epp);}	$copper = $copper - ($electrum * $ep);}
				 if (mt_rand(1,100) > (30-$varx)){																				$sp = 20;	$spp = floor($copper/$sp);	if ($spp > 0){$silver = mt_rand(1,$spp);}	$copper = $copper - ($silver * $sp);}
					if ($copper > 0){$copper = $copper;}
	}

	if ($bagged == 1)
	{
		if (($where != 1) || (mt_rand(1,100) > 70)){$words = "A " . strtoupper(bagCreator()) . " CONTAINING: ";}
		else {$words = "A PILE OF COINS CONTAINING: ";}
	}
	if ($platinum > 0){$words = $words . "" . number_format($platinum) . "pp&nbsp;/&nbsp;";}
	if ($gold > 0){$words = $words . "" . number_format($gold) . "gp&nbsp;/&nbsp;";}
	if ($electrum > 0){$words = $words . "" . number_format($electrum) . "ep&nbsp;/&nbsp;";}
	if ($silver > 0){$words = $words . "" . number_format($silver) . "sp&nbsp;/&nbsp;";}
	if ($copper > 0){$words = $words . "" . number_format($copper) . "cp&nbsp;/&nbsp;";}

	$words = substr($words, 0, -13);

	return $words;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

function coinBuilder($value,$game,$size)
{
	if ($size == 1){$varx = 80; $coincut = 2;} else if ($size == 2){$varx = 50; $coincut = 4;} else {$varx = 0; $coins = 1;}
	if (($game == "Labyrinth Lord") || ($game == "AD&D") || ($game == "BFRPG") || ($game == "OSRIC") || ($game == "BD&D")){ $pp=500; $gp=100; $ep=50; $sp=10;}
	else if ($game == "Swords & Wizardry"){ $gp=100; $sp=10; }
	else if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){ $gp=100; $sp=10; }
	else { $pp=500; $gp=100; $ep=50; $sp=20; }

	$copper = $value * $gp;

	if ($game != "Swords & Six-Siders")
	{
		$gpp = floor($copper/$gp);
		$gold = $gpp;
	}
	else
	{
		if ((mt_rand(1,100) > (90-$varx)) && ($pp > 0)){			$ppp = floor($copper/$pp);	if ($coins==1){$coincut=$ppp;}	if ($ppp > 0){$platinum = mt_rand(ceil($ppp/$coincut),$ppp);}	$copper = $copper - ($platinum * $pp);}
		   if ((mt_rand(1,100) > (70-$varx)) && ($gp > 0)){			$gpp = floor($copper/$gp);	if ($coins==1){$coincut=$gpp;}	if ($gpp > 0){$gold = mt_rand(ceil($ppp/$coincut),$gpp);}		$copper = $copper - ($gold * $gp);}
			  if ((mt_rand(1,100) > (50-$varx)) && ($ep > 0)){		$epp = floor($copper/$ep);	if ($coins==1){$coincut=$epp;}	if ($epp > 0){$electrum = mt_rand(ceil($ppp/$coincut),$epp);}	$copper = $copper - ($electrum * $ep);}
				 if ((mt_rand(1,100) > (20-$varx)) && ($sp > 0)){	$spp = floor($copper/$sp);	if ($coins==1){$coincut=$spp;}	if ($spp > 0){$silver = mt_rand(ceil($ppp/$coincut),$spp);}		$copper = $copper - ($silver * $sp);}
					if ($copper > 0){															if (($coins!=1) && ($copper > 100)){$copper = mt_rand(5,95);}									$copper = $copper;}
	}

	if ($bagged == 1)
	{
		if (($where != 1) || (mt_rand(1,100) > 70)){$words = "A " . strtoupper(bagCreator()) . " CONTAINING: ";}
		else {$words = "A PILE OF COINS CONTAINING: ";}
	}
	if ($platinum > 0){$words = $words . "" . number_format($platinum) . "pp&nbsp;/&nbsp;";}
	if ($gold > 0){$words = $words . "" . number_format($gold) . "gp&nbsp;/&nbsp;";}
	if ($electrum > 0){$words = $words . "" . number_format($electrum) . "ep&nbsp;/&nbsp;";}
	if ($silver > 0){$words = $words . "" . number_format($silver) . "sp&nbsp;/&nbsp;";}
	if ($copper > 0){$words = $words . "" . number_format($copper) . "cp&nbsp;/&nbsp;";}

	$words = substr($words, 0, -13);

	return $words;
}
?>