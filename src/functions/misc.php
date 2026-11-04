<?php

function getTerrains($game, $dwell, $swim)
{
	$lives = explode(" ", $dwell);
	$c_lives = count($lives);
	$u_lives = 0;

	while ($c_lives > 0) :

		$c_lives--;
		$trn = $lives[$u_lives];
		$u_lives++;

		if ($trn == "DG"){ $terrain = $terrain . "Dungeon, ";}
		else if ($trn == "PF"){ $terrain = $terrain . "Forest, ";}
		else if ($trn == "PH"){ $terrain = $terrain . "Hills, ";}
		else if ($trn == "PM"){ $terrain = $terrain . "Mountains, ";}
		else if ($trn == "PP"){ $terrain = $terrain . "Plains, ";}
		else if ($trn == "PS"){ $terrain = $terrain . "Swamp, ";}
		else if ($trn == "PD"){ $terrain = $terrain . "Desert, ";}
		else if ($trn == "FW" AND $swim == 0){ $terrain = $terrain . "Freshwater (Above), ";}
		else if ($trn == "FW" AND $swim == 1){ $terrain = $terrain . "Freshwater (Below), ";}
		else if ($trn == "SW" AND $swim == 0){ $terrain = $terrain . "Sea (Above), ";}
		else if ($trn == "SW" AND $swim == 1){ $terrain = $terrain . "Sea (Below), ";}
		else if ($trn == "CF"){ $terrain = $terrain . "Snowy Forest, ";}
		else if ($trn == "CH"){ $terrain = $terrain . "Snowy Hills, ";}
		else if ($trn == "CM"){ $terrain = $terrain . "Snowy Mountains, ";}
		else if ($trn == "CP"){ $terrain = $terrain . "Snowy Plains, ";}
		else if ($trn == "TF"){ $terrain = $terrain . "Jungle Forest, Tropical Forest, ";}
		else if ($trn == "TH"){ $terrain = $terrain . "Jungle Hills, Tropical Hills, ";}
		else if ($trn == "TM"){ $terrain = $terrain . "Jungle Mountains, Tropical Mountains, ";}
		else if ($trn == "TS"){ $terrain = $terrain . "Jungle Swamp, Tropical Swamp, ";}

		if (($game == "Broken Urthe") || ($game == "Gamma World") || ($game == "Millenniums & Mutations 5th Edition") || ($game == "Millenniums & Mutations 7th Edition"))
		{
			if ($trn == "DG"){ $terrain = $terrain . "Ruins, ";}
			else if ($trn == "RD"){ $terrain = $terrain . "Wastelands, ";}
		}
		else if ($game == "Mutant Future")
		{
			if ($trn == "DG"){ $terrain = $terrain . "Ruins, ";}
			else if ($trn == "TW"){ $terrain = $terrain . "Settlement, ";}
			else if ($trn == "RD"){ $terrain = $terrain . "Wastelands, ";}
		}
		else if ($game == "BD&D")
		{
			if ($trn == "VG"){ $terrain = $terrain . "Settlement, ";}
			else if ($trn == "LW"){ $terrain = $terrain . "Lost World, ";}
		}

	endwhile;

	$terrain = substr($terrain, 0, -2);

	return $terrain;
}

function randLetter()
{
return chr(97 + mt_rand(0, 25));
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// THIS DECIDES ON THE IMAGE AND LINKS FOR THE GAME PAGES
function imageShown($area)
{
	$image = "";
	$link=""; 

	if ($area == 1)
	{
		$link="add"; $img = mt_rand(1,6);
		if ($img == 1){$image = "game_add_ph.jpg";} else if ($img == 2){$image = "game_add_dm.jpg";} else if ($img == 3){$image = "game_add_mm.jpg";}
		else if ($img == 4){$image = "game_add_ff.jpg";} else if ($img == 5){$image = "game_add_ua.jpg";} else {$image = "game_add_mm2.jpg";}
	}
	else if ($area == 2){ $link="bdd"; $image = "game_bxddb.jpg"; if (mt_rand(1,2) == 1){ $image = "game_bxdde.jpg"; } }
	else if ($area == 3){ $link="bfrpg"; $image = "game_bfrpg.jpg"; }
	else if ($area == 4){ $link="urthe"; $image = "game_urthe.jpg"; }
	else if ($area == 5){ $link="gamma"; $image = "game_gamma.jpg"; if (mt_rand(1,2) == 1){ $image = "game_gamma1.jpg"; } }
	else if ($area == 6){ $link="lablord"; $img = mt_rand(1,3); if ($img == 1){$image = "game_ll.jpg";} else if ($img == 2){$image = "game_llaec.jpg";} else {$image = "game_llold.jpg";} }
	else if ($area == 7){ $link="meta"; $image = "game_ma.jpg"; }
	else if ($area == 8){ $link="millen"; $image = "game_mm.jpg"; }
	else if ($area == 9){ $link="mutfut"; $image = "game_mf.jpg"; if (mt_rand(1,2) == 1){ $image = "game_mfold.jpg"; } }
	else if ($area == 10){ $link="necro"; $image = "game_necro.jpg"; }
	else if ($area == 11){ $link="osric"; $img = mt_rand(1,3); if ($img == 1){$image = "game_osric.jpg";} else if ($img == 2){$image = "game_osric1.jpg";} else {$image = "game_osric2.jpg";} }
	else if ($area == 12){ $link="ryft"; $image = "game_ryft.jpg"; }
	else if ($area == 13){ $link="sandw"; $image = "game_sw.jpg"; if (mt_rand(1,2) == 1){ $image = "game_swc.jpg"; } }
	else if ($area == 14){ $link="tt5e"; $image = "game_tt5.jpg"; }
	else if ($area == 15){ $link="tt7e"; $image = "game_tt7.jpg"; }
	else if ($area == 20){ $image = "game_urthe.jpg"; }
	else if ($area == 21){ $image = "game_djarhun.jpg"; }
	else if ($area == 22){ $image = "game_necro.jpg"; }
	else if ($area == 23){ $image = "game_ruins.jpg"; }
	else if ($area == 24){ $image = "game_ryft.jpg"; }
	else if ($area == 25){ $image = "game_mm.jpg"; }
	else if ($area == 27){ $image = "game_ww.jpg"; }
	else if ($area == 36){ $link="fantasy"; $image = "game_fantasy.jpg"; }
	else if ($area == 37){ $link="horror"; $image = "game_horror.jpg"; }
	else if ($area == 38){ $link="scifi"; $image = "game_scifi.jpg"; }
	else if ($area == 39){ $link="apoc"; $image = "game_apoc.jpg"; }
	else if ($area == 147){ $link="ww"; $image = "game_ww.jpg"; }
	else if ($area == 165){ $link="sx"; $image = "game_ssx.jpg"; }
	else if ($area == 173){ $link="ttde"; $image = "game_ttd.jpg"; }
	else if ($area == "STAR"){ $image = "game_swga.jpg"; }
	else if ($area == "DATA"){ $link="data"; $image = "game_data.jpg"; }

	if ($link != ""){ $image = "<a href='rpg_" . $link . ".php'><img src='pics/" . $image . "'></a><br><br>"; }
	else if ($image != ""){ $image = "<img src='pics/" . $image . "'><br><br>"; }

	return $image;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// THIS FUNCTION SEES IF A GAME IS SET TO ACTIVE TO SHOW ON THE WEBSITE OR NOT
function activeGame($connection,$game,$webdir)
{
	$qry = wz_query( $connection, "SELECT * FROM menus WHERE mn_id='$game'" );
	$ary = wz_fetch_assoc($qry);
	if ($ary['mn_inactive'] == 0){$status = "true";} else {$status = "false"; header("Location:../" . $webdir . "/");}
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// THIS FUNCTION GENERATES A RANDOM NUMBER //
function createRandomCode() {
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 5) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}

// THIS FUNCTION GENERATES A RANDOM LETTER //
function createRandomLetter($qty)
{
	if ($qty > 0){} else {$qty = 1;}
	$let = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
	$chars = count($let)-1;
    $letter = "";
    while ($qty > 0) :
		$letter = $letter . $let['mt_rand(0,$chars)'];
        $qty = $qty - 1;
    endwhile;

    return $letter;
}

?>