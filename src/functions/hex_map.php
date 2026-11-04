<?php

$key_array = array();

// DUMP THE TILES INTO A TEMP TABLE FIRST //
$tablez = "myland" . createRandomCode();
	$tqry = "CREATE TEMPORARY TABLE $tablez SELECT * FROM worldmap WHERE lm_done=1";
	wz_query( $connection, $tqry ); /* tqry. */
		$sqry = "SELECT * FROM worldmap WHERE lm_amount>1 AND lm_done=1";
		$sres = wz_query( $connection, $sqry ); /* sqry. */
			while ($sary=wz_fetch_assoc($sres)) :
				$my_amounts = $sary[lm_amount]-1;
					while ($my_amounts > 0):
						$aqry = "INSERT INTO $tablez (lm_category, lm_hexes) VALUES ('$sary[lm_category]', '$sary[lm_hexes]')";
						wz_query( $connection, $aqry ); /* aqry. */
						$my_amounts = $my_amounts - 1;
					endwhile;
			endwhile;

$higher=$map_high;

while ($higher > 0): if ($mixgenre == 1){ switch (mt_rand(0,1)){ case 0:	$genre = "Fantasy"; break; case 1:	$genre = "Post-Apocalyptic"; break; }}

	$wider = $map_wide;

		while ($wider > 0): if ($mixgenre == 1){ switch (mt_rand(0,1)){ case 0:	$genre = "Fantasy"; break; case 1:	$genre = "Post-Apocalyptic"; break; }}

			$land_use = "land";

			// PICK THE CLIMATE FOR THE AREA ///////////////////////////////////////////////////////////////////
			if ($climate == 1)
			{
				if ($wider == ($map_wide))
				{
					if ($higher == $map_high){ $terrain = "arctic"; $terrain_layer = $terrain_layer + 1;}
					else
					{
						$terrain_layer = $terrain_layer + 1;

						if ($map_high == 6)
						{
							if ($terrain_layer == 2){$terrain = "forest";}
							else if ($terrain_layer == 3){$terrain = "jungle";}
							else if ($terrain_layer == 4){$terrain = "desert";}
							else if ($terrain_layer == 5){$terrain = "jungle";}
							else {$terrain = "tropic";}
						}
						else if ($map_high == 7)
						{
							if ($terrain_layer == 2){$terrain = "forest";}
							else if ($terrain_layer == 3){$terrain = "forest";}
							else if ($terrain_layer == 4){$terrain = "jungle";}
							else if ($terrain_layer == 5){$terrain = "desert";}
							else if ($terrain_layer == 6){$terrain = "jungle";}
							else {$terrain = "tropic";}
						}
						else if ($map_high == 8)
						{
							if ($terrain_layer == 2){$terrain = "arctic";}
							else if ($terrain_layer == 3){$terrain = "forest";}
							else if ($terrain_layer == 4){$terrain = "forest";}
							else if ($terrain_layer == 5){$terrain = "jungle";}
							else if ($terrain_layer == 6){$terrain = "desert";}
							else if ($terrain_layer == 7){$terrain = "jungle";}
							else {$terrain = "tropic";}
						}
						else if ($map_high == 9)
						{
							if ($terrain_layer == 2){$terrain = "arctic";}
							else if ($terrain_layer == 3){$terrain = "forest";}
							else if ($terrain_layer == 4){$terrain = "forest";}
							else if ($terrain_layer == 5){$terrain = "jungle";}
							else if ($terrain_layer == 6){$terrain = "desert";}
							else if ($terrain_layer == 7){$terrain = "desert";}
							else if ($terrain_layer == 8){$terrain = "jungle";}
							else {$terrain = "tropic";}
						}
						else if ($map_high > 9)
						{
							if ($terrain_layer == 2){$terrain = "arctic";}
							else if ($terrain_layer == 3){$terrain = "forest";}
							else if ($terrain_layer == 4){$terrain = "forest";}
							else if ($terrain_layer == 5){$terrain = "forest";}
							else if ($terrain_layer == 6){$terrain = "jungle";}
							else if ($terrain_layer == 7){$terrain = "desert";}
							else if ($terrain_layer == 8){$terrain = "desert";}
							else if ($terrain_layer == 9){$terrain = "jungle";}
							else {$terrain = "tropic";}
						}
						else if ($map_high == 2){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "forest";} }
						else if ($map_high == 3)
						{
							if ($terrain_layer == 2){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "forest";} }
							else {$terrain = "desert"; if (mt_rand(1,2) == 1){$terrain = "tropic";} }
						}
						else if ($map_high == 4)
						{
							if ($terrain_layer == 2){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "forest";} }
							else if ($terrain_layer == 3){$terrain = "desert"; if (mt_rand(1,2) == 1){$terrain = "jungle";} }
							else {$terrain = "desert"; if (mt_rand(1,2) == 1){$terrain = "tropic";} }
						}
						else
						{
							if ($terrain_layer == 2){$terrain = "forest";}
							else if ($terrain_layer == 3){$terrain = "jungle";}
							else if ($terrain_layer == 4){$terrain = "desert";}
							else {$terrain = "tropic";}
						}
					}
				}
			}
			else if ($climate == 2)
			{
				if ($wider == ($map_wide))
				{
					if ($higher == $map_high){ $terrain = "tropic"; $terrain_layer = $terrain_layer + 1;}
					else
					{
						$terrain_layer = $terrain_layer + 1;

						if ($map_high == 6)
						{
							if ($terrain_layer == 2){$terrain = "desert";}
							else if ($terrain_layer == 3){$terrain = "jungle";}
							else if ($terrain_layer == 4){$terrain = "forest";}
							else if ($terrain_layer == 5){$terrain = "arctic";}
							else {$terrain = "arctic";}
						}
						else if ($map_high == 7)
						{
							if ($terrain_layer == 2){$terrain = "desert";}
							else if ($terrain_layer == 3){$terrain = "jungle";}
							else if ($terrain_layer == 4){$terrain = "forest";}
							else if ($terrain_layer == 5){$terrain = "forest";}
							else if ($terrain_layer == 6){$terrain = "arctic";}
							else {$terrain = "arctic";}
						}
						else if ($map_high == 8)
						{
							if ($terrain_layer == 2){$terrain = "desert";}
							else if ($terrain_layer == 3){$terrain = "jungle";}
							else if ($terrain_layer == 4){$terrain = "forest";}
							else if ($terrain_layer == 5){$terrain = "forest";}
							else if ($terrain_layer == 6){$terrain = "forest";}
							else if ($terrain_layer == 7){$terrain = "arctic";}
							else {$terrain = "arctic";}
						}
						else if ($map_high == 9)
						{
							if ($terrain_layer == 2){$terrain = "desert";}
							else if ($terrain_layer == 3){$terrain = "desert";}
							else if ($terrain_layer == 4){$terrain = "jungle";}
							else if ($terrain_layer == 5){$terrain = "jungle";}
							else if ($terrain_layer == 6){$terrain = "forest";}
							else if ($terrain_layer == 7){$terrain = "forest";}
							else if ($terrain_layer == 8){$terrain = "arctic";}
							else {$terrain = "arctic";}
						}
						else if ($map_high > 9)
						{
							if ($terrain_layer == 2){$terrain = "desert";}
							else if ($terrain_layer == 3){$terrain = "desert";}
							else if ($terrain_layer == 4){$terrain = "jungle";}
							else if ($terrain_layer == 5){$terrain = "jungle";}
							else if ($terrain_layer == 6){$terrain = "forest";}
							else if ($terrain_layer == 7){$terrain = "forest";}
							else if ($terrain_layer == 8){$terrain = "forest";}
							else if ($terrain_layer == 9){$terrain = "arctic";}
							else {$terrain = "arctic";}
						}
						else if ($map_high == 2){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "forest";} }
						else if ($map_high == 3)
						{
							if ($terrain_layer == 2){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "forest";} }
							else {$terrain = "arctic";}
						}
						else if ($map_high == 4)
						{
							if ($terrain_layer == 2){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 3){$terrain = "forest";}
							else {$terrain = "arctic";}
						}
						else
						{
							if ($terrain_layer == 2){$terrain = "desert";}
							else if ($terrain_layer == 3){$terrain = "jungle";}
							else if ($terrain_layer == 4){$terrain = "forest";}
							else {$terrain = "arctic";}
						}
					}
				}
			}
			else if ($climate == 10)
			{
				if ($wider == ($map_wide))
				{
					if ($higher == $map_high){ $terrain = "arctic"; $terrain_layer = $terrain_layer + 1;}
					else
					{
						$terrain_layer = $terrain_layer + 1;

						if ($map_high == 6)
						{
							if ($terrain_layer == 2){$terrain = "forest";}
							else if ($terrain_layer == 3){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 4){$terrain = "desert"; if (mt_rand(1,2) == 1){$terrain = "jungle";} }
							else if ($terrain_layer == 5){$terrain = "forest";}
							else {$terrain = "arctic";}
						}
						else if ($map_high == 7)
						{
							if ($terrain_layer == 2){$terrain = "forest";}
							else if ($terrain_layer == 3){$terrain = "jungle";}
							else if ($terrain_layer == 4){$terrain = "desert"; if (mt_rand(1,2) == 1){$terrain = "jungle";} }
							else if ($terrain_layer == 5){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 6){$terrain = "forest";}
							else {$terrain = "arctic";}
						}
						else if ($map_high == 8)
						{
							if ($terrain_layer == 2){$terrain = "arctic";}
							else if ($terrain_layer == 3){$terrain = "forest";}
							else if ($terrain_layer == 4){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 5){$terrain = "desert"; if (mt_rand(1,2) == 1){$terrain = "jungle";} }
							else if ($terrain_layer == 6){$terrain = "forest";}
							else if ($terrain_layer == 7){$terrain = "arctic";}
							else {$terrain = "arctic";}
						}
						else if ($map_high == 9)
						{
							if ($terrain_layer == 2){$terrain = "arctic";}
							else if ($terrain_layer == 3){$terrain = "forest";}
							else if ($terrain_layer == 4){$terrain = "jungle";}
							else if ($terrain_layer == 5){$terrain = "desert"; if (mt_rand(1,2) == 1){$terrain = "jungle";} }
							else if ($terrain_layer == 6){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 7){$terrain = "forest";}
							else if ($terrain_layer == 8){$terrain = "arctic";}
							else {$terrain = "arctic";}
						}
						else if ($map_high > 9)
						{
							if ($terrain_layer == 2){$terrain = "arctic";}
							else if ($terrain_layer == 3){$terrain = "forest";}
							else if ($terrain_layer == 4){$terrain = "forest";}
							else if ($terrain_layer == 5){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 6){$terrain = "desert"; if (mt_rand(1,2) == 1){$terrain = "jungle";} }
							else if ($terrain_layer == 7){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 8){$terrain = "forest";}
							else if ($terrain_layer == 9){$terrain = "arctic";}
							else {$terrain = "arctic";}
						}
						else if ($map_high == 2){$terrain = "arctic"; if (mt_rand(1,2) == 1){$terrain = "forest";} }
						else if ($map_high == 3)
						{
							if ($terrain_layer == 2){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "forest";} }
							else {$terrain = "arctic";}
						}
						else if ($map_high == 4)
						{
							if ($terrain_layer == 2){$terrain = "forest"; if (mt_rand(1,2) == 1){$terrain = "jungle";} if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 3){$terrain = "forest"; if (mt_rand(1,2) == 1){$terrain = "jungle";} if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else {$terrain = "arctic";}
						}
						else
						{
							if ($terrain_layer == 2){$terrain = "forest";}
							else if ($terrain_layer == 3){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 4){$terrain = "forest";}
							else {$terrain = "arctic";}
						}
					}
				}
			}
			else if ($climate == 11)
			{
				if ($wider == ($map_wide))
				{
					if ($higher == $map_high){ $terrain = "tropic"; $terrain_layer = $terrain_layer + 1;}
					else
					{
						$terrain_layer = $terrain_layer + 1;

						if ($map_high == 6)
						{
							if ($terrain_layer == 2){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 3){$terrain = "forest";}
							else if ($terrain_layer == 4){$terrain = "forest";}
							else if ($terrain_layer == 5){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else {$terrain = "tropic";}
						}
						else if ($map_high == 7)
						{
							if ($terrain_layer == 2){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 3){$terrain = "forest";}
							else if ($terrain_layer == 4){$terrain = "arctic";}
							else if ($terrain_layer == 5){$terrain = "forest";}
							else if ($terrain_layer == 6){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else {$terrain = "tropic";}
						}
						else if ($map_high == 8)
						{
							if ($terrain_layer == 2){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 3){$terrain = "forest";}
							else if ($terrain_layer == 4){$terrain = "forest"; if (mt_rand(1,2) == 1){$terrain = "arctic";} }
							else if ($terrain_layer == 5){$terrain = "arctic";}
							else if ($terrain_layer == 6){$terrain = "forest";}
							else if ($terrain_layer == 7){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else {$terrain = "tropic";}
						}
						else if ($map_high == 9)
						{
							if ($terrain_layer == 2){$terrain = "desert";}
							else if ($terrain_layer == 3){$terrain = "jungle";}
							else if ($terrain_layer == 4){$terrain = "forest";}
							else if ($terrain_layer == 5){$terrain = "arctic";}
							else if ($terrain_layer == 6){$terrain = "forest"; if (mt_rand(1,2) == 1){$terrain = "arctic";} }
							else if ($terrain_layer == 7){$terrain = "jungle";}
							else if ($terrain_layer == 8){$terrain = "desert";}
							else {$terrain = "tropic";}
						}
						else if ($map_high > 9)
						{
							if ($terrain_layer == 2){$terrain = "desert";}
							else if ($terrain_layer == 3){$terrain = "jungle";}
							else if ($terrain_layer == 4){$terrain = "forest";}
							else if ($terrain_layer == 5){$terrain = "arctic";}
							else if ($terrain_layer == 6){$terrain = "arctic";}
							else if ($terrain_layer == 7){$terrain = "forest";}
							else if ($terrain_layer == 8){$terrain = "jungle";}
							else if ($terrain_layer == 9){$terrain = "desert";}
							else {$terrain = "tropic";}
						}
						else if ($map_high == 2){$terrain = "tropic"; if (mt_rand(1,2) == 1){$terrain = "desert";} if (mt_rand(1,2) == 1){$terrain = "jungle";} }
						else if ($map_high == 3)
						{
							if ($terrain_layer == 2){$terrain = "tropic"; if (mt_rand(1,2) == 1){$terrain = "desert";} if (mt_rand(1,2) == 1){$terrain = "jungle";} }
							else {$terrain = "tropic"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
						}
						else if ($map_high == 4)
						{
							if ($terrain_layer == 2){$terrain = "forest"; if (mt_rand(1,2) == 1){$terrain = "jungle";} }
							else if ($terrain_layer == 3){$terrain = "desert"; if (mt_rand(1,2) == 1){$terrain = "jungle";} }
							else {$terrain = "tropic";}
						}
						else
						{
							if ($terrain_layer == 2){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else if ($terrain_layer == 3){$terrain = "forest";}
							else if ($terrain_layer == 4){$terrain = "jungle"; if (mt_rand(1,2) == 1){$terrain = "desert";} }
							else {$terrain = "tropic";}
						}
					}
				}
			}
			else if ($climate == 3){$terrain = "arctic";}
			else if ($climate == 4){$terrain = "desert";}
			else if ($climate == 5){$terrain = "forest";}
			else if ($climate == 6){$terrain = "jungle";}
			else if ($climate == 7){$terrain = "tropic";}
			else if ($climate == 8){$terrain = "moon";}
			else if ($climate == 9)
			{
				if ($wider == ($map_wide))
				{
					switch (mt_rand(0,4))
					{
						case 0:	$terrain = "desert";	break;
						case 1:	$terrain = "forest";	break;
						case 2:	$terrain = "jungle";	break;
						case 3:	$terrain = "arctic";	break;
						case 4:	$terrain = "tropic";	break;
					}
				}
			}
			else if ($climate == 12){$terrain = "underworld";}
			else if ($climate > 99) ///////// THIS SECTION IS THE TERRAIN FOR THE HEX CRAWLS /////////////
			{
				if ($climate == 100){$terrain = "desert";}
				else if ($climate == 101){$terrain = "forest";}
				else if ($climate == 102){$terrain = "hills";}
				else if ($climate == 103){$terrain = "jungle";}
				else if ($climate == 104){$terrain = "mountains";}
				else if ($climate == 105){$terrain = "plains";}
				else if ($climate == 106){$terrain = "sea";}
				else if ($climate == 107){$terrain = "arctic";}
				else if ($climate == 108){$terrain = "swamp";}
				else if ($climate == 111){$terrain = "desert";}
				else if ($climate == 112){$terrain = "underworld";}
				else {$terrain = "tropic";}
			} ////////////////////////////////////////////////////////////////////////////////////////////
			else
			{
				switch (mt_rand(0,4))
				{
					case 0:	$terrain = "desert";	break;
					case 1:	$terrain = "forest";	break;
					case 2:	$terrain = "jungle";	break;
					case 3:	$terrain = "arctic";	break;
					case 4:	$terrain = "tropic";	break;
				}
			}

			$check_border_type = 0;

			if ( $wider == ($map_wide) )
			{
				$terrain_tracker = $terrain_tracker . $terrain . "_";
				$terrain_latitude = $terrain_latitude + 1;
			}

			if ($wider == ($map_wide))
			{
				if ($higher == $map_high) // TOP LEFT CORNER
				{
					$x=10; $y=10;
					if (($water_n > 0) && ($water_w > 0)){$land_use="ocean_nw"; if (($water_n == 2) || ($water_w == 2)){$check_border_type = 1;} }
					else if ($water_n > 0){$land_use="ocean_n"; if ($water_n == 2){$check_border_type = 1;} }
					else if ($water_w > 0){$land_use="ocean_w"; if ($water_w == 2){$check_border_type = 1;} }
				}
				else if ($higher == 1) // BOTTOM LEFT CORNER
				{
					$x=10; $y=$y+272;
					if (($water_s > 0) && ($water_w > 0)){$land_use="ocean_sw"; if (($water_s == 2) || ($water_w == 2)){$check_border_type = 1;} }
					else if ($water_s > 0){$land_use="ocean_s"; if ($water_s == 2){$check_border_type = 1;} }
					else if ($water_w > 0){$land_use="ocean_w"; if ($water_w == 2){$check_border_type = 1;} }
				}
				else // LEFT SIDE
				{
					$x=10; $y=$y+272;
					if ($water_w > 0){$land_use = "ocean_w"; if ($water_w == 2){$check_border_type = 1;} }
				}
			}
			else if ($wider == 1)
			{
				if ($higher == $map_high) // TOP RIGHT CORNER
				{
					$x=$x+320; $y=10;
					if (($water_n > 0) && ($water_e > 0)){$land_use="ocean_ne"; if (($water_n == 2) || ($water_e == 2)){$check_border_type = 1;} }
					else if ($water_n > 0){$land_use="ocean_n"; if ($water_n == 2){$check_border_type = 1;} }
					else if ($water_e > 0){$land_use="ocean_e"; if ($water_e == 2){$check_border_type = 1;} }
				}
				else if ($higher == 1) // BOTTOM RIGHT CORNER
				{
					$x=$x+320; $y=$y;
					if (($water_s > 0) && ($water_e > 0)){$land_use="ocean_se"; if (($water_s == 2) || ($water_e == 2)){$check_border_type = 1;} }
					else if ($water_s > 0){$land_use="ocean_s"; if ($water_s == 2){$check_border_type = 1;} }
					else if ($water_e > 0){$land_use="ocean_e"; if ($water_e == 2){$check_border_type = 1;} }
				}
				else
				{
					$x=$x+320; $y=$y;
					if ($water_e > 0){$land_use = "ocean_e";} if ($water_e == 2){$check_border_type = 1;} } // RIGHT SIDE
			}
			else
			{
				if ($higher == $map_high) // TOP
				{
					$x=$x+320; $y=10;
					if ($water_n > 0){$land_use = "ocean_n"; if ($water_n == 2){$check_border_type = 1;} }
				}
				else if ($higher == 1) // BOTTOM
				{
					$x=$x+320; $y=$y;
					if ($water_s > 0){$land_use = "ocean_s"; if ($water_s == 2){$check_border_type = 1;} }
				}
				else {$x=$x+320; $y=$y;} // MAIN
			}

			if ($terrain == "moon"){$check_border_type = 1;}

			echo "<div style='position:absolute;top:" . $y . "px; left:" . $x . "px; z-index:1;'><img src='land/hexes.png'>";

			$qry = "SELECT * FROM $tablez WHERE lm_category='$land_use' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
			$res = wz_query( $connection, $qry ); /* qry. */

			while ($ary=wz_fetch_assoc($res)) : if ($mixgenre == 1){ switch (mt_rand(0,1)){ case 0:	$genre = "Fantasy"; break; case 1:	$genre = "Post-Apocalyptic"; break; }}

				$i = 0;

				$l__hex = explode("_", $ary[lm_hexes]);

				$zx__width = 5;
				$zx__height = 16;
				$zy = 0;
				$zx = 0;
				$row = 0;
				$shift__hex__right = 64;
				$shift__hex__down = 17;
				$shift__hex__start = 32;

					$my__height = $zx__height;
					$my__y = $zy;

					while ($my__height > 0): if ($mixgenre == 1){ switch (mt_rand(0,1)){ case 0:	$genre = "Fantasy"; break; case 1:	$genre = "Post-Apocalyptic"; break; }}

						$high = $high + 1;
						$wide = 0;

						if ($row > 0){$row = 0; $my__width = $zx__width; $my__x = $zx+$shift__hex__start;} else {$row = 1; $my__width = $zx__width; $my__x = $zx;}

						while ($my__width > 0):	if ($mixgenre == 1){ switch (mt_rand(0,1)){ case 0:	$genre = "Fantasy"; break; case 1:	$genre = "Post-Apocalyptic"; break; }}

							$l_hexer = explode("^", $l__hex[$i]);

							$l_hex = explode("|", $l_hexer[0]);
							$hex1 = $l_hex[0]; if ($outer_hull != 1 && $hex1 == "T"){$hex1 = $l_hex[1];}
							$hex2 = $l_hex[1]; if ($outer_hull != 1 && $hex2 == "T"){$hex2 = $l_hex[0];}
							if (($hex2 != "") && (mt_rand(1,2) == 1)){$my_symbol = $hex2;} else {$my_symbol = $hex1;}

							//// THIS IS TO DO THE BULK HEAD BORDER FOR EXODUS SPACESHIPS ////
							if ( ($hex2 == "T" || $hex1 == "T") && ($outer_hull > 0) ){$my_symbol = "T";}

								if ( ($this_app_is == "Hex Crawl") && ($terrain == "sea") && ($my_symbol == "S" || $my_symbol == "X") )///// FOR HEX CRAWLS /////
								{
									switch (mt_rand(0,5))
									{
										case 0:	$my_symbol = "U"; 	break;
										case 1:	$my_symbol = "W";	break;
										case 2:	$my_symbol = "O"; 	break;
										case 3:	$my_symbol = "O";	break;
										case 4:	$my_symbol = "O"; 	break;
										case 5:	$my_symbol = "O";	break;
									}
								} ///////////////////////////////////////////////////////////////////////// FOR HEX CRAWLS /////

							$no__icon = 1;
							$wide = $wide + 1;
							$sunken = 0;

							// IF MOUNTAIN BORDER...DON'T DO SEA BUILDINGS
							if ( ( ($my_symbol == "W") || ($my_symbol == "U") || ($my_symbol == "S") ) && ($check_border_type == 1) ){$my_symbol = "X";}

							// THIS IS TO STOP ANY STRUCTURES FROM BEING BUILT ON THIS MAP //
							if (($genre == "Empty") && (($my_symbol == "X") || ($my_symbol == "W") || ($my_symbol == "U") || ($my_symbol == "S")))
							{
								switch (mt_rand(0,8))
								{
									case 0:	$my_symbol = "A"; break;
									case 1:	$my_symbol = "B"; break;
									case 2:	$my_symbol = "C"; break;
									case 3:	$my_symbol = "D"; break;
									case 4:	$my_symbol = "A"; break;
									case 5:	$my_symbol = "B"; break;
									case 6:	$my_symbol = "C"; break;
									case 7:	$my_symbol = "D"; break;
									case 8:	$my_symbol = "M"; break;
								}
							}

							/// DOES THE TERRAIN INHERIT TERRAIN FROM THE NORTH?
							$terrain_changes = explode("_", $terrain_tracker);
							$ter_num = $terrain_latitude - 1;
							$terrain = $terrain_changes[$terrain_latitude];
							if ($ter_num >=0)
							{
								if ($l_hexer[1] == 1){ $terrain = $terrain_changes[$ter_num]; }
								else if ( ($l_hexer[1] == 2) && (mt_rand(1,2) == 1) ){ $terrain = $terrain_changes[$ter_num]; }
							}

							$hex_counting = $hex_counting + 1;
							$hex_no_no = 0;

							if (($this_app_is == "Hex Crawl") && (($hex_counting == 1) || ($hex_counting == 2) || ($hex_counting == 3) || ($hex_counting == 4) || ($hex_counting == 5) || ($hex_counting == 6) || ($hex_counting == 7) || ($hex_counting == 11) || ($hex_counting == 12) || ($hex_counting == 13) || ($hex_counting == 16) || ($hex_counting == 17) || ($hex_counting == 21) || ($hex_counting == 22) || ($hex_counting == 26) || ($hex_counting == 27) || ($hex_counting == 31) || ($hex_counting == 32) || ($hex_counting == 36) || ($hex_counting == 41) || ($hex_counting == 42) || ($hex_counting == 46) || ($hex_counting == 51) || ($hex_counting == 56) || ($hex_counting == 61) || ($hex_counting == 71) || ($hex_counting == 81) || ($hex_counting == 82) || ($hex_counting == 83) || ($hex_counting == 84) || ($hex_counting == 85) || ($hex_counting == 88) || ($hex_counting == 89) || ($hex_counting == 90) || ($hex_counting == 94) || ($hex_counting == 95) || ($hex_counting == 99) || ($hex_counting == 100) || ($hex_counting == 104) || ($hex_counting == 105) || ($hex_counting == 109) || ($hex_counting == 110) || ($hex_counting == 115) || ($hex_counting == 119) || ($hex_counting == 120) || ($hex_counting == 125) || ($hex_counting == 130) || ($hex_counting == 135) || ($hex_counting == 140) || ($hex_counting == 150) || ($hex_counting == 171) || ($hex_counting == 181) || ($hex_counting == 186) || ($hex_counting == 191) || ($hex_counting == 196) || ($hex_counting == 201) || ($hex_counting == 202) || ($hex_counting == 206) || ($hex_counting == 211) || ($hex_counting == 212) || ($hex_counting == 216) || ($hex_counting == 217) || ($hex_counting == 221) || ($hex_counting == 222) || ($hex_counting == 226) || ($hex_counting == 227) || ($hex_counting == 231) || ($hex_counting == 232) || ($hex_counting == 233) || ($hex_counting == 236) || ($hex_counting == 237) || ($hex_counting == 238) || ($hex_counting == 239) || ($hex_counting == 240) || ($hex_counting == 250) || ($hex_counting == 260) || ($hex_counting == 265) || ($hex_counting == 270) || ($hex_counting == 275) || ($hex_counting == 279) || ($hex_counting == 280) || ($hex_counting == 285) || ($hex_counting == 289) || ($hex_counting == 290) || ($hex_counting == 294) || ($hex_counting == 295) || ($hex_counting == 299) || ($hex_counting == 300) || ($hex_counting == 304) || ($hex_counting == 305) || ($hex_counting == 308) || ($hex_counting == 309) || ($hex_counting == 310) || ($hex_counting == 314) || ($hex_counting == 315) || ($hex_counting == 316) || ($hex_counting == 317) || ($hex_counting == 318) || ($hex_counting == 319) || ($hex_counting == 320)))
							{
								switch (mt_rand(0,3))
								{
									case 0:	$my_symbol = "A"; break;
									case 1:	$my_symbol = "B"; break;
									case 2:	$my_symbol = "C"; break;
									case 3:	$my_symbol = "D"; break;
								}
							}
							if (($this_app_is == "Hex Crawl") && ($terrain == "sea") && (mt_rand(1,2) == 1)){$my_symbol = "O";}

							if ( ($terrain == "desert") && ($my_symbol == "A") ){ $my_land = "desert.png"; if (($climate != 111) && (mt_rand(1,10) == 1)){$my_land = "cactus.png";} }
							else if ( ($terrain == "forest") && ($my_symbol == "A") ){ $my_land = "forest.png"; }
							else if ( ($terrain == "jungle") && ($my_symbol == "A") ){ $my_land = "jungle.png"; }
							else if ( ($terrain == "arctic") && ($my_symbol == "A") ){ $my_land = "snow_forest.png"; if ($color > 0){$my_land = "forest.png";} }
							else if ( ($terrain == "tropic") && ($my_symbol == "A") ){ $my_land = "jungle.png"; }
							else if ( ($terrain == "moon") && ($my_symbol == "A") ){ $my_land = "moon_rocky.png"; }
							else if ( ($terrain == "underworld") && ($my_symbol == "A") ){ $my_land = "moon_rocky.png"; if (mt_rand(1,5) == 1){$my_land = "cavern.png"; } else if (mt_rand(1,10) == 1){$my_land = "crystals.png";} }
								else if ( ($terrain == "hills") && ($my_symbol == "A") ){ $my_land = "hills.png"; }
								else if ( ($terrain == "mountains") && ($my_symbol == "A") ){ $my_land = "mountains.png"; }
								else if ( ($terrain == "plains") && ($my_symbol == "A") ){ $my_land = "grasslands.png"; }
								else if ( ($terrain == "sea") && ($my_symbol == "A") ){ $my_land = "water.png"; }
								else if ( ($terrain == "swamp") && ($my_symbol == "A") ){ $my_land = "swamp.png"; }

							else if ( ($terrain == "desert") && ($my_symbol == "B") ){ $my_land = "desert.png"; }
							else if ( ($terrain == "forest") && ($my_symbol == "B") ){ $my_land = "grasslands.png"; }
							else if ( ($terrain == "jungle") && ($my_symbol == "B") ){ $my_land = "grasslands.png"; }
							else if ( ($terrain == "arctic") && ($my_symbol == "B") ){ $my_land = "snow.png"; }
							else if ( ($terrain == "tropic") && ($my_symbol == "B") ){ $my_land = "desert.png"; }
							else if ( ($terrain == "moon") && ($my_symbol == "B") ){ $my_land = "moon_flats.png"; if (mt_rand(1,10) == 1){$my_land = "lava.png";} }
							else if ( ($terrain == "underworld") && ($my_symbol == "B") ){ $my_land = "under_flats.png"; if (mt_rand(1,5) == 1){$my_land = "cavern.png"; } }
								else if ( ($terrain == "hills") && ($my_symbol == "B") ){ $my_land = "grasslands.png"; }
								else if ( ($terrain == "mountains") && ($my_symbol == "B") ){ $my_land = "mountains.png"; }
								else if ( ($terrain == "plains") && ($my_symbol == "B") ){ $my_land = "grasslands.png"; if (mt_rand(1,4) == 1){$my_land="hills.png";} }
								else if ( ($terrain == "sea") && ($my_symbol == "B") ){ $my_land = "water.png"; }
								else if ( ($terrain == "swamp") && ($my_symbol == "B") ){ $my_land = "marsh.png"; }

							else if ( ($terrain == "desert") && ($my_symbol == "C") ){ $my_land = "dune.png"; if ($color > 0){$my_land = "hills.png";} }
							else if ( ($terrain == "forest") && ($my_symbol == "C") ){ $my_land = "hills.png"; }
							else if ( ($terrain == "jungle") && ($my_symbol == "C") ){ $my_land = "hills.png"; }
							else if ( ($terrain == "arctic") && ($my_symbol == "C") ){ $my_land = "snow_hills.png"; if ($color > 0){$my_land = "hills.png";} }
							else if ( ($terrain == "tropic") && ($my_symbol == "C") ){ $my_land = "dune.png"; if ($color > 0){$my_land = "hills.png";} }
							else if ( ($terrain == "moon") && ($my_symbol == "C") ){ $my_land = "hills.png"; }
							else if ( ($terrain == "underworld") && ($my_symbol == "C") ){ $my_land = "fungus.png"; if (mt_rand(1,5) == 1){$my_land = "cavern.png"; } else if (mt_rand(1,10) == 1){$my_land = "thorns.png";} }
								else if ( ($terrain == "hills") && ($my_symbol == "C") ){ $my_land = "hills.png"; }
								else if ( ($terrain == "mountains") && ($my_symbol == "C") ){ $my_land = "mountains.png"; }
								else if ( ($terrain == "plains") && ($my_symbol == "C") ){ $my_land = "grasslands.png"; }
								else if ( ($terrain == "sea") && ($my_symbol == "C") ){ $my_land = "water.png"; }
								else if ( ($terrain == "swamp") && ($my_symbol == "C") ){ $my_land = "swamp.png"; if (mt_rand(1,2) == 1){$my_land = "marsh.png";} }

							else if ( ($terrain == "desert") && ($my_symbol == "D") )
							{
								if ($climate == 111){ $my_land = "barrens.png"; if (mt_rand(1,10) == 1){$my_land = "thorns.png";} }
								else if ($genre == "Sci-Fi" || $genre == "Exodus Spaceship"){ $my_land = "barrens.png"; if (mt_rand(1,10) == 1){$my_land = "thorns.png";} }
								else { $my_land = "barrens.png"; if (mt_rand(1,10) == 1){$my_land = "dead_tree.png";} }
							}
							else if ( (($terrain == "forest") || ($terrain == "swamp") || ($terrain == "hills") || ($terrain == "plains")) && ($my_symbol == "D") )
							{
								if ($genre == "Sci-Fi" || $genre == "Exodus Spaceship"){ $my_land = "swamp.png"; if (mt_rand(1,2) == 1){$my_land = "fungus.png";} if (mt_rand(1,10) == 1){$my_land = "thorns.png";} }
								else { $my_land = "swamp.png"; if (mt_rand(1,2) == 1){$my_land = "marsh.png";} if (mt_rand(1,10) == 1){$my_land = "dead_tree.png";} }
							}
							else if ( ($terrain == "jungle") && ($my_symbol == "D") )
							{
								if ($genre == "Sci-Fi" || $genre == "Exodus Spaceship"){ $my_land = "swamp.png"; if (mt_rand(1,2) == 1){$my_land = "fungus.png";} if (mt_rand(1,10) == 1){$my_land = "thorns.png";} }
								else { $my_land = "swamp.png"; if (mt_rand(1,2) == 1){$my_land = "marsh.png";} if (mt_rand(1,10) == 1){$my_land = "dead_tree.png";} }
							}
							else if ( ($terrain == "arctic") && ($my_symbol == "D") )
							{
								if ($genre == "Sci-Fi" || $genre == "Exodus Spaceship"){ $my_land = "snow_barrens.png"; if ($color > 0){$my_land = "barrens.png";} if (mt_rand(1,10) == 1){$my_land = "thorns.png";} }
								else { $my_land = "snow_barrens.png"; if ($color > 0){$my_land = "barrens.png";} if (mt_rand(1,10) == 1){$my_land = "snow_dead_tree.png"; if ($color > 0){$my_land = "dead_tree.png"; } } }
							}
							else if ( ($terrain == "tropic") && ($my_symbol == "D") )
							{
								if ($genre == "Sci-Fi" || $genre == "Exodus Spaceship"){ $my_land = "swamp.png"; if (mt_rand(1,2) == 1){$my_land = "fungus.png";} if (mt_rand(1,10) == 1){$my_land = "thorns.png";} }
								else { $my_land = "swamp.png"; if (mt_rand(1,2) == 1){$my_land = "marsh.png";} if (mt_rand(1,10) == 1){$my_land = "dead_tree.png";} }
							}
							else if ( ($terrain == "mountains") && ($my_symbol == "D") ){ $my_land = "mountains.png"; }
							else if ( ($terrain == "sea") && ($my_symbol == "D") ){ $my_land = "water.png"; }

							else if ( ($terrain == "moon") && ($my_symbol == "D") ){ $my_land = "moon_crack.png"; }
							else if ( ($terrain == "moon") && ($my_symbol == "V") ){ $my_land = "mountains.png"; }

							else if ( ($terrain == "underworld") && ($my_symbol == "D") ){ $my_land = "moon_crack.png"; if (mt_rand(1,5) == 1){$my_land = "cavern.png"; } else if (mt_rand(1,10) == 1){$my_land = "lava.png";} }
							else if ( ($terrain == "underworld") && ($my_symbol == "M") ){ $my_land = "cavern.png"; if ($terrain == "sea"){$my_land = "water.png";} }
							else if ( ($terrain == "underworld") && ($my_symbol == "V") ){ $my_land = "lava.png"; if ($terrain == "sea"){$my_land = "water.png";} }

							else if ($my_symbol == "M"){$my_land = "mountains.png"; if (($genre == "Exodus Spaceship") && (mt_rand(1,20) == 1)){$my_land = "shards.png";} if ($terrain == "sea"){$my_land = "water.png";} }
							else if ($my_symbol == "V"){$my_land = "volcano.png"; if ($terrain == "sea"){$my_land = "water.png";} }

							else if ( ($my_symbol == "W") || ($my_symbol == "U") )
							{
								if (($my_symbol == "U") && (mt_rand(1,3) == 1)){$sunken = 1;} else {$my_symbol = "W";}
								if ($genre == "Fantasy")
								{
									if ($this_app_is == "Hex Crawl"){$h=0; $g=5;} else {$h=1; $g=8;}
									switch (mt_rand($h,$g))
									{
										case 0: $my_land = "boat.png"; $sunken = 1; break;
										case 1:	$my_land = "castle.png"; if (mt_rand(1,2) == 1){$my_land = "castle_evil.png";} if (mt_rand(1,4) == 1){$my_land = "dungeon.png";} break;
										case 2:	$my_land = "ruins.png"; if ((($terrain == "desert") || ($terrain == "tropic")) && (mt_rand(1,4) > 1)){$my_land = "sf_ruins.png";} break;
										case 3:	$my_land = "skull.png";			break;
										case 4:	$my_land = "tower.png";			break;
										case 5:	$my_land = "temple.png"; if (mt_rand(1,2) == 1){$my_land = "temple2.png";} if (mt_rand(1,6) == 1){$my_land = "totem.png";} if ($terrain == "underworld"){$my_land = "temple2.png";} break;
										case 6: $my_land = "lighthouse.png"; if (mt_rand(1,2) == 1){$my_land = "boat.png"; $sunken = 1;} else if ($terrain == "underworld"){$my_land = "tower.png";} break;
										case 7:	$my_land = "fort.png";			break;
										case 8:	$my_land = "city.png"; if ($terrain == "underworld"){$my_land = "city_underworld.png";} break;
									}
								}
								else if ($genre == "Sci-Fi")
								{
									switch (mt_rand(0,9))
									{
										case 0:	$my_land = "sf_military.png";									break;
										case 1:
											switch (mt_rand(0,3))
											{
												case 0:	$my_land = "city.png"; 			break;
												case 1:	$my_land = "sf_city.png";		break;
												case 2:	$my_land = "sf_city_dome.png";	if (mt_rand(1,3) > 1){$sunken = 1;} break;
												case 3:	$my_land = "sf_city_float.png";	if ($terrain == "underworld"){$my_land = "sf_city_dome.png";} break;
											}
										break;
										case 2:	$my_land = "stones.png"; if ((($terrain == "desert") || ($terrain == "tropic")) && (mt_rand(1,4) > 1)){$my_land = "sf_ruins.png";} if (mt_rand(1,10) == 1){$my_land = "totem.png";} break;
										case 3:	$my_land = "sf_ship_crash.png";	$sunken = 1;					break;
										case 4:	$my_land = "pa_communicate.png";								break;
										case 5:	$my_land = "pa_space_station.png"; if (mt_rand(1,2) == 1){$my_land = "sf_alien_outpost.png";} $sunken = 0; break;
										case 6:	$my_land = "pa_science.png";									break;
										case 7:	$my_land = "mine.png"; if (mt_rand(1,2) == 1){$my_land = "sf_industry.png";} break;
										case 8:	$my_land = "cave.png"; if (mt_rand(1,2) == 1){$my_land = "animal.png";} break;
										case 9:	$my_land = "robots.png"; if (mt_rand(1,2) == 1){$my_land = "robot_factory.png";} break;
									}
								}
								else if ($genre == "Exodus Spaceship")
								{
									switch (mt_rand(0,9))
									{
										case 0:	$my_land = "sf_security.png"; if (mt_rand(1,2) == 1){$my_land = "medical.png";} break;
										case 1: $sunken = 0;
											switch (mt_rand(0,4))
											{
												case 0:	$my_land = "dwelling.png"; 		break;
												case 1:	$my_land = "village.png";		break;
												case 2:	$my_land = "pa_village.png";	break;
												case 3:	$my_land = "city.png";			break;
												case 4:	$my_land = "sf_city_dome.png";	if (mt_rand(1,3) > 1){$sunken = 1;} break;
											}
										break;
										case 2:	$my_land = "hatch.png";	$sunken = 1;					break;
										case 3:	$my_land = "pa_communicate.png"; if (mt_rand(1,2) == 1){$my_land = "hydro.png";} break;
										case 4:	$my_land = "supplies.png"; if (mt_rand(1,2) == 1){$my_land = "food.png";} break;
										case 5:	$my_land = "pa_science.png"; if (mt_rand(1,2) == 1){$my_land = "atomic.png";} break;
										case 6:	$my_land = "research.png"; if (mt_rand(1,2) == 1){$my_land = "computers.png";} break;
										case 7:	$my_land = "sf_generator.png"; if (mt_rand(1,2) == 1){$my_land = "power.png";} break;
										case 8:	$my_land = "cave.png"; if (mt_rand(1,2) == 1){$my_land = "animal.png";} break;
										case 9:	$my_land = "robot_factory.png"; if (mt_rand(1,2) == 1){$my_land = "robots.png";} break;
									}
								}
								else if ($genre == "Lunar")
								{	$sunken = 0;

									if ($lifeless_exodus_ship == 1)
									{
										switch (mt_rand(0,9))
										{
											case 0:	$my_land = "mine.png"; if (mt_rand(1,4) == 1){$my_land = "hatch.png";}	break;
											case 1:	$my_land = "sf_security.png"; if (mt_rand(1,2) == 1){$my_land = "sf_city_dome.png";}		break;
											case 2:	$my_land = "pa_communicate.png"; if (mt_rand(1,2) == 1){$my_land = "atomic.png";}	break;
											case 3: $my_land = "sf_evil_fortress.png"; if (mt_rand(1,2) == 1){$my_land = "skull.png";}			break;
											case 4:	$my_land = "supplies.png"; if (mt_rand(1,2) == 1){$my_land = "food.png";} break;
											case 5:	$my_land = "pa_science.png"; if (mt_rand(1,2) == 1){$my_land = "medical.png";} break;
											case 6:	$my_land = "research.png"; if (mt_rand(1,2) == 1){$my_land = "computers.png";} break;
											case 7:	$my_land = "sf_generator.png"; if (mt_rand(1,2) == 1){$my_land = "power.png";} break;
											case 8:	$my_land = "cave.png"; break;
											case 9:	$my_land = "robot_factory.png"; if (mt_rand(1,2) == 1){$my_land = "robots.png";} break;
										}
									}
									else
									{
										switch (mt_rand(0,8))
										{
											case 0:	$my_land = "sf_military.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}					break;
											case 1: $my_land = "sf_city_dome.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}					break;
											case 2:	$my_land = "stones.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}						break;
											case 3:	$my_land = "sf_ship_crash.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}				break;
											case 4:	$my_land = "pa_communicate.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}				break;
											case 5:	$my_land = "pa_space_station.png"; if (mt_rand(1,2) == 1){$my_land = "sf_alien_outpost.png";}	break;
											case 6:	$my_land = "pa_science.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}					break;
											case 7:	$my_land = "mine.png"; if (mt_rand(1,2) == 1){$my_land = "sf_industry.png";}					break;
											case 8:	$my_land = "cave.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}							break;
										}
									}
								}
								else 
								{
									if ($this_app_is == "Hex Crawl"){$h=0; $g=10;} else {$h=1; $g=13;}
									switch (mt_rand($h,$g))
									{
										case 0: $my_land = "pa_boat.png"; $sunken = 1; break;
										case 1:	$my_land = "pa_oil.png"; if (mt_rand(1,2) == 1){$my_land = "power.png";}	break;
										case 2:	$my_land = "pa_military.png"; if (mt_rand(1,4) == 1){$my_land = "sf_military.png";}	break;
										case 3:	$my_land = "pa_communicate.png"; if (mt_rand(1,2) == 1){$my_land = "pa_communicate2.png";} break;
										case 4:	$my_land = "pa_power_plant.png";	break;
										case 5:	$my_land = "pa_prison.png"; if (mt_rand(1,2) == 1){$my_land = "pa_vault.png";} break;
										case 6:	$my_land = "pa_ruins.png";		if (mt_rand(1,10) == 1){$my_land = "totem.png";} 	break;
										case 7:	$my_land = "pa_science.png";		break;
										case 8:	$my_land = "pa_space_station.png"; if (mt_rand(1,2) == 1){$my_land = "sf_ship_crash.png"; $sunken = 1;} break;
										case 9: $my_land = "atomic.png"; if (mt_rand(1,4) == 1){$my_land = "research.png";}	break;
										case 10:$my_land = "computers.png"; if (mt_rand(1,4) == 1){$my_land = "medical.png";}	break;
										case 11:$my_land = "lighthouse.png"; if (mt_rand(1,2) == 1){$my_land = "pa_boat.png"; $sunken = 1;} break;
										case 12:$my_land = "robots.png"; if (mt_rand(1,4) == 1){$my_land = "robot_factory.png";}	break;
										case 13:
											switch (mt_rand(0,3))
											{
												case 0:	$my_land = "city.png"; 			$sunken = 0;	break;
												case 1:	$my_land = "sf_city.png";		$sunken = 0;	break;
												case 2:	$my_land = "sf_city_dome.png";	if (mt_rand(1,2) == 1){$sunken = 1;} break;
												case 3:	$my_land = "sf_city_float.png";	$sunken = 0; if ($terrain == "underworld"){$my_land = "sf_city_dome.png"; if (mt_rand(1,2) == 1){$sunken = 1;} } break;
											}
										break;
									}
								}
							}
							else if ($my_symbol == "S")
							{
								if ($genre == "Fantasy")
								{
									if ($this_app_is == "Hex Crawl"){$h=2;} else {$h=0;}
									switch (mt_rand($h,3))
									{
										case 0:	$my_land = "dock.png";		break;
										case 1:	$my_land = "waterfall.png";	break;
										case 2:	$my_land = "fort.png";		break;
										case 3: $my_land = "dungeon.png";	break;
									}
								}
								else if ($genre == "Sci-Fi")
								{
									switch (mt_rand(0,10))
									{
										case 0:	$my_land = "mine.png"; if (mt_rand(1,2) == 1){$my_land = "waterfall.png";}		break;
										case 1:	$my_land = "sf_military.png"; if (mt_rand(1,2) == 1){$my_land = "sf_industry.png";}		break;
										case 2:	$my_land = "pa_space_station.png"; if (mt_rand(1,2) == 1){$my_land = "sf_ship_crash.png";}	break;
										case 3:
											switch (mt_rand(0,3))
											{
												case 0:	$my_land = "city.png";			break;
												case 1:	$my_land = "sf_city.png";		break;
												case 2:	$my_land = "sf_city_dome.png";	break;
												case 3:	$my_land = "sf_city_float.png";	if ($terrain == "underworld"){$my_land = "sf_city_dome.png";} break;
											}
										break;
										case 4:	$my_land = "stones.png"; if ((($terrain == "desert") || ($terrain == "tropic")) && (mt_rand(1,4) > 1)){$my_land = "sf_ruins.png";}	break;
										case 5:	$my_land = "pa_communicate.png"; 	break;
										case 6:	$my_land = "sf_village.png";		break;
										case 7:	$my_land = "sf_primitive.png"; if (mt_rand(1,10) == 1){$my_land = "totem.png";} if (mt_rand(1,2) == 1){$my_land = "sf_evil_fortress.png";} else if ($terrain == "underworld"){$my_land = "u_primitive.png";} break;
										case 8:	$my_land = "pa_science.png";		break;
										case 9:	$my_land = "cave.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}	break;
										case 10:$my_land = "sf_alien_outpost.png"; if (mt_rand(1,2) == 1){$my_land = "animal.png";}	break;
									}
								}
								else if ($genre == "Lunar")
								{
									if ($lifeless_exodus_ship == 1)
									{
										switch (mt_rand(0,9))
										{
											case 0:	$my_land = "mine.png"; if (mt_rand(1,4) == 1){$my_land = "hatch.png";}	break;
											case 1:	$my_land = "sf_security.png"; if (mt_rand(1,2) == 1){$my_land = "sf_city_dome.png";}		break;
											case 2:	$my_land = "pa_communicate.png"; if (mt_rand(1,2) == 1){$my_land = "atomic.png";}	break;
											case 3: $my_land = "sf_evil_fortress.png"; if (mt_rand(1,2) == 1){$my_land = "skull.png";}			break;
											case 4:	$my_land = "supplies.png"; if (mt_rand(1,2) == 1){$my_land = "food.png";} break;
											case 5:	$my_land = "pa_science.png"; if (mt_rand(1,2) == 1){$my_land = "medical.png";} break;
											case 6:	$my_land = "research.png"; if (mt_rand(1,2) == 1){$my_land = "computers.png";} break;
											case 7:	$my_land = "sf_generator.png"; if (mt_rand(1,2) == 1){$my_land = "power.png";} break;
											case 8:	$my_land = "cave.png"; break;
											case 9:	$my_land = "robot_factory.png"; if (mt_rand(1,2) == 1){$my_land = "robots.png";} break;
										}
									}
									else
									{
										switch (mt_rand(0,9))
										{
											case 0:	$my_land = "mine.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}						break;
											case 1:	$my_land = "sf_military.png"; if (mt_rand(1,2) == 1){$my_land = "sf_industry.png";}			break;
											case 2:	$my_land = "pa_space_station.png"; if (mt_rand(1,2) == 1){$my_land = "sf_ship_crash.png";}	break;
											case 3: $my_land = "sf_city_dome.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}				break;
											case 4:	$my_land = "stones.png"; if (mt_rand(1,3) > 1){$my_land = "sf_ruins.png";}					break;
											case 5:	$my_land = "pa_communicate.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}			break;
											case 6:	$my_land = "sf_village.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}				break;
											case 7:	$my_land = "pa_science.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}				break;
											case 8:	$my_land = "cave.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}						break;
											case 9: $my_land = "sf_alien_outpost.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}			break;
										}
									}
								}
								else if ($genre == "Exodus Spaceship")
								{
									switch (mt_rand(0,3))
									{
										case 0:	$my_land = "dock.png";			break;
										case 1:	$my_land = "waterfall.png";		break;
										case 2:	$my_land = "hydro.png";	break;
										case 3:	
											switch (mt_rand(0,3))
											{
												case 0:	$my_land = "dwelling.png"; 		break;
												case 1:	$my_land = "village.png";		break;
												case 2:	$my_land = "pa_village.png";	break;
												case 3:	$my_land = "city.png";			break;
											}
										break;
									}
								}
								else 
								{
									if ($this_app_is == "Hex Crawl"){$h=2;} else {$h=0;}
									switch (mt_rand($h,3))
									{
										case 0:	$my_land = "dock.png";			break;
										case 1:	$my_land = "waterfall.png";		break;
										case 2:	$my_land = "pa_military.png";	break;
										case 3: $my_land = "sf_military.png";	break;
									}
								}
							}
							else if ($my_symbol == "X")
							{
								if ($genre == "Fantasy")
								{
									if ($this_app_is == "Hex Crawl"){$h=0; $g=8;} else {$h=0; $g=10;}
									switch (mt_rand($h,$g))
									{
										case 0:	$my_land = "skull.png";		if (mt_rand(1,4) == 1){$my_land = "dungeon.png";} 	break;
										case 1:	$my_land = "mine.png";		if (mt_rand(1,10) == 1){$my_land = "dungeon.png";} 	break;
										case 2:	$my_land = "tower.png";			break;
										case 3:	$my_land = "fort.png";			break;
										case 4:	$my_land = "ruins.png"; if ((($terrain == "desert") || ($terrain == "tropic")) && (mt_rand(1,4) > 1)){$my_land = "sf_ruins.png";} else if (mt_rand(1,2) == 1){$my_land = "stones.png";} break;
										case 5:	$my_land = "temple.png"; if (mt_rand(1,2) == 1){$my_land = "temple2.png";} if ($terrain == "underworld"){$my_land = "temple2.png";} break;
										case 6:	$my_land = "castle.png"; if (mt_rand(1,2) == 1){$my_land = "castle_evil.png";} if (mt_rand(1,4) == 1){$my_land = "dungeon.png";} break;
										case 7:	$my_land = "cave.png";		if (mt_rand(1,10) == 1){$my_land = "dungeon.png";} 	break;
										case 8: $my_land = "camp.png"; if (mt_rand(1,2) == 1){$my_land = "sf_primitive.png";} if (mt_rand(1,10) == 1){$my_land = "totem.png";} if ($terrain == "underworld"){$my_land = "u_primitive.png";} break;
										case 9:	$my_land = "village.png"; if ($terrain == "underworld"){$my_land = "village_underworld.png";} break;
										case 10:$my_land = "city.png"; if ($terrain == "underworld"){$my_land = "city_underworld.png";} break;
									}
								}
								else if ($genre == "Sci-Fi")
								{
									switch (mt_rand(0,10))
									{
										case 0:	$my_land = "mine.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}	break;
										case 1:	$my_land = "sf_military.png"; if (mt_rand(1,2) == 1){$my_land = "sf_industry.png";}		break;
										case 2:	$my_land = "pa_space_station.png";	break;
										case 3:
											switch (mt_rand(0,3))
											{
												case 0:	$my_land = "city.png";			break;
												case 1:	$my_land = "sf_city.png";		break;
												case 2:	$my_land = "sf_city_dome.png";	break;
												case 3:	$my_land = "sf_city_float.png";	if ($terrain == "underworld"){$my_land = "sf_city_dome.png";} break;
											}
										break;
										case 4:	$my_land = "stones.png"; if ((($terrain == "desert") || ($terrain == "tropic")) && (mt_rand(1,4) > 1)){$my_land = "sf_ruins.png";}	break;
										case 5:	$my_land = "pa_communicate.png"; 	break;
										case 6:	$my_land = "sf_village.png";		break;
										case 7:	$my_land = "sf_alien_outpost.png"; if (mt_rand(1,2) == 1){$my_land = "sf_ship_crash.png";}	break;
										case 8:	$my_land = "pa_science.png";		break;
										case 9:	$my_land = "cave.png"; if (mt_rand(1,2) == 1){$my_land = "animal.png";}	break;
										case 10:$my_land = "pa_camp.png"; if (mt_rand(1,2) == 1){$my_land = "sf_primitive.png";} if (mt_rand(1,10) == 1){$my_land = "totem.png";} if ($terrain == "underworld"){$my_land = "u_primitive.png";} break;
									}
								}
								else if ($genre == "Lunar")
								{
									if ($lifeless_exodus_ship == 1)
									{
										switch (mt_rand(0,9))
										{
											case 0:	$my_land = "mine.png"; if (mt_rand(1,4) == 1){$my_land = "hatch.png";}	break;
											case 1:	$my_land = "sf_security.png"; if (mt_rand(1,2) == 1){$my_land = "sf_city_dome.png";}		break;
											case 2:	$my_land = "pa_communicate.png"; if (mt_rand(1,2) == 1){$my_land = "atomic.png";}	break;
											case 3: $my_land = "sf_evil_fortress.png"; if (mt_rand(1,2) == 1){$my_land = "skull.png";}			break;
											case 4:	$my_land = "supplies.png"; if (mt_rand(1,2) == 1){$my_land = "food.png";} break;
											case 5:	$my_land = "pa_science.png"; if (mt_rand(1,2) == 1){$my_land = "medical.png";} break;
											case 6:	$my_land = "research.png"; if (mt_rand(1,2) == 1){$my_land = "computers.png";} break;
											case 7:	$my_land = "sf_generator.png"; if (mt_rand(1,2) == 1){$my_land = "power.png";} break;
											case 8:	$my_land = "cave.png"; break;
											case 9:	$my_land = "robot_factory.png"; if (mt_rand(1,2) == 1){$my_land = "robots.png";} break;
										}
									}
									else
									{
										switch (mt_rand(0,9))
										{
											case 0:	$my_land = "mine.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}						break;
											case 1:	$my_land = "sf_military.png"; if (mt_rand(1,2) == 1){$my_land = "sf_industry.png";}			break;
											case 2:	$my_land = "pa_space_station.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}			break;
											case 3: $my_land = "sf_city_dome.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}				break;
											case 4:	$my_land = "stones.png"; if (mt_rand(1,3) > 1){$my_land = "sf_ruins.png";}					break;
											case 5:	$my_land = "pa_communicate.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}			break;
											case 6:	$my_land = "sf_village.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}				break;
											case 7:	$my_land = "sf_alien_outpost.png"; if (mt_rand(1,2) == 1){$my_land = "sf_ship_crash.png";}	break;
											case 8:	$my_land = "pa_science.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}				break;
											case 9:	$my_land = "cave.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}						break;
										}
									}
								}
								else if ($genre == "Exodus Spaceship")
								{
									switch (mt_rand(0,11))
									{
										case 0:	$my_land = "mine.png"; if (mt_rand(1,4) == 1){$my_land = "hatch.png";}	break;
										case 1:	$my_land = "sf_security.png"; if (mt_rand(1,2) == 1){$my_land = "sf_generator.png";}		break;
										case 2:	$my_land = "power.png";	break;
										case 3:
											switch (mt_rand(0,3))
											{
												case 0:	$my_land = "dwelling.png"; 		break;
												case 1:	$my_land = "village.png";		break;
												case 2:	$my_land = "pa_village.png";	break;
												case 3:	$my_land = "city.png";			break;
											}
										break;
										case 4:	$my_land = "pa_communicate.png"; 	break;
										case 5:	$my_land = "robot_factory.png"; if (mt_rand(1,2) == 1){$my_land = "robots.png";}	break;
										case 6:	$my_land = "medical.png"; if (mt_rand(1,2) == 1){$my_land = "research.png";}	break;
										case 7:	$my_land = "computers.png"; if (mt_rand(1,2) == 1){$my_land = "atomic.png";}	break;
										case 8:	$my_land = "supplies.png"; if (mt_rand(1,2) == 1){$my_land = "food.png";}	break;
										case 9:	$my_land = "cave.png"; if (mt_rand(1,2) == 1){$my_land = "animal.png";}	break;
										case 10:$my_land = "pa_camp.png"; if (mt_rand(1,2) == 1){$my_land = "sf_primitive.png";} if (mt_rand(1,10) == 1){$my_land = "totem.png";} if ($terrain == "underworld"){$my_land = "u_primitive.png";} break;
										case 11:$my_land = "sf_evil_fortress.png"; if (mt_rand(1,2) == 1){$my_land = "skull.png";}			break;
									}
								}
								else 
								{
									if ($this_app_is == "Hex Crawl"){$h=0; $g=10;} else {$h=0; $g=12;}
									switch (mt_rand($h,$g))
									{
										case 0:	$my_land = "pa_oil.png"; if (mt_rand(1,2) == 1){$my_land = "mine.png";} 					break;
										case 1:	$my_land = "pa_military.png"; if (mt_rand(1,4) == 1){$my_land = "sf_military.png";}			break;
										case 2:	$my_land = "pa_space_station.png"; if (mt_rand(1,2) == 1){$my_land = "sf_ship_crash.png";}	break;
										case 3:	$my_land = "pa_ruins.png"; if (mt_rand(1,4) == 1){$my_land = "crater.png";}					break;
										case 4:	$my_land = "pa_communicate.png"; if (mt_rand(1,2) == 1){$my_land = "pa_communicate2.png";}	break;
										case 5:	$my_land = "pa_power_plant.png"; if (mt_rand(1,2) == 1){$my_land = "pa_factory.png";}		break;
										case 6:	$my_land = "pa_science.png"; if (mt_rand(1,2) == 1){$my_land = "pa_airport.png";}			break;
										case 7:	$my_land = "cave.png"; if (mt_rand(1,2) == 1){$my_land = "skull.png";}						break;
										case 8: $my_land = "pa_camp.png"; if (mt_rand(1,2) == 1){$my_land = "sf_primitive.png";} if (mt_rand(1,10) == 1){$my_land = "totem.png";} if ($terrain == "underworld"){$my_land = "u_primitive.png";} break;
										case 9: $my_land = "sf_evil_fortress.png"; if (mt_rand(1,2) == 1){$my_land = "animal.png";}			break;
										case 10:$my_land = "pa_prison.png"; if (mt_rand(1,2) == 1){$my_land = "pa_vault.png";}				break;
										case 11:$my_land = "pa_village.png"; if (mt_rand(1,3) == 1){$my_land = "village.png";}				break;
										case 12:
											switch (mt_rand(0,3))
											{
												case 0:	$my_land = "city.png";			break;
												case 1:	$my_land = "sf_city.png";		break;
												case 2:	$my_land = "sf_city_dome.png";	break;
												case 3:	$my_land = "sf_city_float.png";	if ($terrain == "underworld"){$my_land = "sf_city_dome.png";} break;
											}
										break;
									}
								}
							}
							else {$my_land = ""; if ($color > 0){ if ($climate == 8){$my_search="color_clear.png";} } else {$my_search="color_clear.png";} }

							if ( ( ($my_symbol == "A") || ($my_symbol == "B") || ($my_symbol == "C") || ($my_symbol == "D") ) && (mt_rand(1,200) == 1) && ($climate != 106) )
							{
								if (($genre == "Post-Apocalyptic" || $genre == "Exodus Spaceship") && (mt_rand(1,4) == 1)){$my_land = "sf_biohazard.png";}
								else if (($genre == "Sci-Fi") && (mt_rand(1,2) == 1)){$my_land = "sf_biohazard.png";}
								else if (($genre == "Sci-Fi") || ($genre == "Exodus Spaceship") || ($genre == "Post-Apocalyptic")){$my_land = "pa_radiation.png";}
								else if ($terrain == "moon"){$my_land = "crater.png";}
							}

							if ($my_land != ""){ echo "<div style='position:absolute; top:" . ($my__y+3) . "px; left:" . ($my__x+6) . "px; z-index:2;'><img src='land/" . $my_land . "'></div>"; $my_search=$my_land;}

							else if ($my_symbol == "O")
							{
								if ($terrain != "sea"){$make_water_encounter_table = 1;} /// FOR HEX CRAWL MAPS ///
								if ($color > 0)
								{
									if ($check_border_type > 0)
									{
										if ($terrain == "underworld")
										{
											$my_land = "cavern.png";
											echo "<div style='position:absolute; top:" . ($my__y+3) . "px; left:" . ($my__x+6) . "px; z-index:2;'><img src='land/" . $my_land . "'></div>"; $my_search=$my_land;
											echo "<div style='position:absolute; top:" . ($my__y+1) . "px; left:" . ($my__x+1) . "px; z-index:3;'><img src='land/_color_caverns.png'></div>";
											if (in_array("_color_caverns.png", $key_array)){} else { array_push($key_array, "_color_caverns.png"); }
										}
										else
										{
											$my_land = "mountains.png";
											echo "<div style='position:absolute; top:" . ($my__y+3) . "px; left:" . ($my__x+6) . "px; z-index:2;'><img src='land/" . $my_land . "'></div>"; $my_search=$my_land;
											echo "<div style='position:absolute; top:" . ($my__y+1) . "px; left:" . ($my__x+1) . "px; z-index:3;'><img src='land/_color_mountains.png'></div>";
											if (in_array("_color_mountains.png", $key_array)){} else { array_push($key_array, "_color_mountains.png"); }
										}
									}
									else if ($terrain == "sea"){echo "<div style='position:absolute; top:" . ($my__y+1) . "px; left:" . ($my__x+1) . "px; z-index:2;'><img src='land/_color_water.png'></div>"; $my_search="_color_water.png";}
									else {echo "<div style='position:absolute; top:" . ($my__y+1) . "px; left:" . ($my__x+1) . "px; z-index:2;'><img src='land/_color_sea.png'></div>"; $my_search="_color_sea.png";}
								}
								else
								{
									if ($check_border_type > 0)
									{
										if ($terrain == "underworld")
										{
											$my_land = "cavern.png";
											echo "<div style='position:absolute; top:" . ($my__y+3) . "px; left:" . ($my__x+6) . "px; z-index:2;'><img src='land/" . $my_land . "'></div>"; $my_search=$my_land;
										}
										else
										{
											$my_land = "mountains.png";
											echo "<div style='position:absolute; top:" . ($my__y+3) . "px; left:" . ($my__x+6) . "px; z-index:2;'><img src='land/" . $my_land . "'></div>"; $my_search=$my_land;
										}
									}
									else if ($terrain == "sea"){echo "<div style='position:absolute; top:" . ($my__y+1) . "px; left:" . ($my__x+1) . "px; z-index:2;'><img src='land/sea_cover.png'></div>"; $my_search="color_sea.png";}
									else {echo "<div style='position:absolute; top:" . ($my__y+1) . "px; left:" . ($my__x+1) . "px; z-index:2;'><img src='land/sea.png'></div>"; $my_search="color_sea.png";}
								}
							}
							else if ($my_symbol == "T")
							{
								if ($color > 0){ echo "<div style='position:absolute; top:" . ($my__y+1) . "px; left:" . ($my__x+1) . "px; z-index:2;'><img src='land/_color_hull.png'></div>"; $my_search="_color_hull.png"; }
								else { echo "<div style='position:absolute; top:" . ($my__y+1) . "px; left:" . ($my__x+1) . "px; z-index:2;'><img src='land/color_hull.png'></div>"; $my_search="color_hulli.png"; }
							}

							if (($terrain == "sea") && ($my_symbol != "O") && ($my_symbol != "W")){$sunken = 1;} // FOR HEX CRAWL MAPS

							if (($sunken > 0) && ($check_border_type == 0))
							{
								if ($color > 0)
								{
									echo "<div style='position:absolute; top:" . ($my__y+1) . "px; left:" . ($my__x+1) . "px; z-index:3;'><img src='land/_color_water.png'></div>";
									if (in_array("color_sunken_c.png", $key_array)){} else { array_push($key_array, "color_sunken_c.png"); }
								}
								else
								{
									echo "<div style='position:absolute; top:" . ($my__y+1) . "px; left:" . ($my__x+1) . "px; z-index:3;'><img src='land/sea_cover.png'></div>";
									if (in_array("color_sunken.png", $key_array)){} else { array_push($key_array, "color_sunken.png"); }
								}
							}

							if ( ($color > 0) && ($sunken == 0) && ($my_symbol != "O") )
							{
								if ($my_land == "sf_biohazard.png"){$color_map = "_color_danger.png";}
								else if ($my_land == "pa_radiation.png"){$color_map = "_color_danger.png";}
								else if ($terrain == "underworld")
								{
									if ($my_land == "moon_crack.png"){$color_map = "_color_ucracks.png";}
									else if ($my_land == "moon_rocky.png"){$color_map = "_color_ucracks.png";}
									else if ($my_land == "crystals.png"){$color_map = "_color_ucrystal.png";}
									else if ($my_land == "fungus.png"){$color_map = "_color_uplant.png";}
									else if ($my_land == "thorns.png"){$color_map = "_color_thorns.png";}
									else if ($my_land == "cavern.png"){$color_map = "_color_caverns.png";}
									else if ($my_land == "lava.png"){$color_map = "_color_lava.png";}
									else
									{
										$color_map = "_color_uworld.png";
										if (($colorl > 0) && (($my_symbol == "X") || ($my_symbol == "W") || ($my_symbol == "S"))){$color_map = "_color_highlight.png";}
									}
								}
								else if (($my_land == "hills.png") && ($terrain == "moon")){$color_map = "_color_" . $moon_color . "_hills.png";}
								else if (($my_land == "moon_crack.png") && ($terrain == "moon")){$color_map = "_color_" . $moon_color . "_rocks.png";}
								else if (($my_land == "moon_rocky.png") && ($terrain == "moon")){$color_map = "_color_" . $moon_color . "_rocks.png";}
								else if (($my_land == "crater.png") && ($terrain == "moon")){$color_map = "_color_" . $moon_color . "_flats.png";}
								else if ($my_land == "mountains.png"){$color_map = "_color_mountains.png";}
								else if ($my_land == "shards.png"){$color_map = "_color_shards.png";}
								else if ($terrain == "moon")
								{
									$color_map = "_color_" . $moon_color . "_flats.png";
									if (($colorl > 0) && ($moon_color == "moon") && (($my_symbol == "X") || ($my_symbol == "W") || ($my_symbol == "S"))){$color_map = "_color_highwhite.png";}
									else if (($colorl > 0) && ($moon_color == "mars") && (($my_symbol == "X") || ($my_symbol == "W") || ($my_symbol == "S"))){$color_map = "_color_highlight.png";}
								}
								else if (($terrain == "sea") && ($my_symbol == "W")) // FOR HEX CRAWL MAPS
								{
									switch (mt_rand(0,4))
									{
										case 0:	$color_map = "_color_sand.png";			break;
										case 1:	$color_map = "_color_tree.png";			break;
										case 2:	$color_map = "_color_jungle.png";		break;
										case 3:	$color_map = "_color_grass.png";		break;
										case 4:	$color_map = "_color_sand_hills.png";	break;
									}
								}
								else if (($terrain == "mountains") && ($my_symbol != "V")){$color_map = "_color_mountains.png";} // FOR HEX CRAWL MAPS
								else if ($my_land == "water.png"){$color_map = "_color_water.png";} // FOR HEX CRAWL MAPS
								else if (($my_land == "forest.png") && ($terrain == "arctic")){$color_map = "_color_snow.png";}
								else if (($my_land == "hills.png") && ($terrain == "arctic")){$color_map = "_color_snow.png";}
								else if (($my_land == "hills.png") && ($terrain == "desert")){$color_map = "_color_sand_hills.png";}
								else if (($my_land == "hills.png") && ($terrain == "tropic")){$color_map = "_color_sand_hills.png";}
								else if (($my_land == "barrens.png") && ($terrain == "desert")){$color_map = "_color_sand.png";}
								else if (($my_land == "barrens.png") && ($terrain == "arctic")){$color_map = "_color_snow.png";}
								else if ($my_land == "desert.png"){$color_map = "_color_sand.png";}
								else if ($my_land == "cactus.png"){$color_map = "_color_sand_plants.png";}
								else if ($my_land == "forest.png"){$color_map = "_color_tree.png";}
								else if ($my_land == "jungle.png"){$color_map = "_color_jungle.png";}
								else if ($my_land == "snow_forest.png"){$color_map = "_color_snow.png";}
								else if ($my_land == "grasslands.png"){$color_map = "_color_grass.png";}
								else if ($my_land == "snow.png"){$color_map = "_color_snow.png";}
								else if ($my_land == "dune.png"){$color_map = "_color_sand_hills.png";}
								else if ($my_land == "hills.png"){$color_map = "_color_hills.png";}
								else if ($my_land == "snow_hills.png"){$color_map = "_color_snow.png";}
								else if ($my_land == "thorns.png"){$color_map = "_color_dead.png";}
								else if ($my_land == "dead_tree.png"){$color_map = "_color_dead.png";}
								else if ($my_land == "swamp.png"){$color_map = "_color_swamp.png";}
								else if ($my_land == "fungus.png"){$color_map = "_color_marsh.png";}
								else if ($my_land == "marsh.png"){$color_map = "_color_marsh.png";}
								else if ($my_land == "snow_barrens.png"){$color_map = "_color_snow.png";}
								else if ($my_land == "snow_dead_tree.png"){$color_map = "_color_snow.png";}
								else if ($my_land == "volcano.png"){$color_map = "_color_volcano.png";}
								else if ($terrain == "desert"){$color_map = "_color_sand.png"; if (($colorl > 0) && (($my_symbol == "X") || ($my_symbol == "W") || ($my_symbol == "S"))){$color_map = "_color_highlight.png";} }
								else if ($terrain == "forest"){$color_map = "_color_grass.png"; if (($colorl > 0) && (($my_symbol == "X") || ($my_symbol == "W") || ($my_symbol == "S"))){$color_map = "_color_highlight.png";} }
								else if ($terrain == "jungle"){$color_map = "_color_grass.png"; if (($colorl > 0) && (($my_symbol == "X") || ($my_symbol == "W") || ($my_symbol == "S"))){$color_map = "_color_highlight.png";} }
								else if ($terrain == "arctic"){$color_map = "_color_snow.png"; if (($colorl > 0) && (($my_symbol == "X") || ($my_symbol == "W") || ($my_symbol == "S"))){$color_map = "_color_highlight.png";} }
								else if ($terrain == "tropic"){$color_map = "_color_sand.png"; if (($colorl > 0) && (($my_symbol == "X") || ($my_symbol == "W") || ($my_symbol == "S"))){$color_map = "_color_highlight.png";} }
								else if ($terrain == "hills"){$color_map = "_color_hills.png";} // FOR HEX CRAWL MAPS
								else if ($terrain == "swamp"){$color_map = "_color_swamp.png";} // FOR HEX CRAWL MAPS
								else if ($terrain == "plains"){$color_map = "_color_grass.png";} // FOR HEX CRAWL MAPS

								if ($my_symbol != "T"){echo "<div style='position:absolute; top:" . ($my__y+1) . "px; left:" . ($my__x+1) . "px; z-index:3;'><img src='land/" . $color_map . "'></div>";}

								if (in_array($color_map, $key_array)){} else { array_push($key_array, $color_map); }
							}

							if ($this_app_is == "Hex Crawl") /// FOR HEX CRAWL ADVENTURES ONLY ///
							{
								if (($hex_counting != 1) && ($hex_counting != 2) && ($hex_counting != 3) && ($hex_counting != 4) && ($hex_counting != 5) && ($hex_counting != 6) && ($hex_counting != 7) && ($hex_counting != 11) && ($hex_counting != 12) && ($hex_counting != 13) && ($hex_counting != 16) && ($hex_counting != 17) && ($hex_counting != 21) && ($hex_counting != 22) && ($hex_counting != 26) && ($hex_counting != 27) && ($hex_counting != 31) && ($hex_counting != 32) && ($hex_counting != 36) && ($hex_counting != 41) && ($hex_counting != 42) && ($hex_counting != 46) && ($hex_counting != 51) && ($hex_counting != 56) && ($hex_counting != 61) && ($hex_counting != 71) && ($hex_counting != 81) && ($hex_counting != 82) && ($hex_counting != 83) && ($hex_counting != 84) && ($hex_counting != 85) && ($hex_counting != 88) && ($hex_counting != 89) && ($hex_counting != 90) && ($hex_counting != 94) && ($hex_counting != 95) && ($hex_counting != 99) && ($hex_counting != 100) && ($hex_counting != 104) && ($hex_counting != 105) && ($hex_counting != 109) && ($hex_counting != 110) && ($hex_counting != 115) && ($hex_counting != 119) && ($hex_counting != 120) && ($hex_counting != 125) && ($hex_counting != 130) && ($hex_counting != 135) && ($hex_counting != 140) && ($hex_counting != 150) && ($hex_counting != 171) && ($hex_counting != 181) && ($hex_counting != 186) && ($hex_counting != 191) && ($hex_counting != 196) && ($hex_counting != 201) && ($hex_counting != 202) && ($hex_counting != 206) && ($hex_counting != 211) && ($hex_counting != 212) && ($hex_counting != 216) && ($hex_counting != 217) && ($hex_counting != 221) && ($hex_counting != 222) && ($hex_counting != 226) && ($hex_counting != 227) && ($hex_counting != 231) && ($hex_counting != 232) && ($hex_counting != 233) && ($hex_counting != 236) && ($hex_counting != 237) && ($hex_counting != 238) && ($hex_counting != 239) && ($hex_counting != 240) && ($hex_counting != 250) && ($hex_counting != 260) && ($hex_counting != 265) && ($hex_counting != 270) && ($hex_counting != 275) && ($hex_counting != 279) && ($hex_counting != 280) && ($hex_counting != 285) && ($hex_counting != 289) && ($hex_counting != 290) && ($hex_counting != 294) && ($hex_counting != 295) && ($hex_counting != 299) && ($hex_counting != 300) && ($hex_counting != 304) && ($hex_counting != 305) && ($hex_counting != 308) && ($hex_counting != 309) && ($hex_counting != 310) && ($hex_counting != 314) && ($hex_counting != 315) && ($hex_counting != 316) && ($hex_counting != 317) && ($hex_counting != 318) && ($hex_counting != 319) && ($hex_counting != 320))
								{
									if ( ($my_symbol == "W") || ($my_symbol == "S") || ($my_symbol == "U") || ($my_symbol == "X") )
									{
										if (($my_symbol == "U") || ($sunken == 1)){$my_hex_areas_list = $my_land . "|U^" . $my_hex_areas_list;} else {$my_hex_areas_list = $my_land . "|X^" . $my_hex_areas_list;}
										$hex_value = $hex_value + 1;
										echo "<div style='position:absolute; top:" . ($my__y-2) . "px; left:" . ($my__x+16) . "px; z-index:10;'><b><font color='#FF0000'>" . $hex_value . "</font></b></div>";
									}
								}
							} /////////////////////////////// FOR HEX CRAWL ADVENTURES ONLY ///

							if (in_array($my_search, $key_array)){} else { array_push($key_array, $my_search); }

							$my__x = $my__x + $shift__hex__right;
							$my__width=$my__width-1;

							$i = $i + 1;

						endwhile;

						$my__y = $my__y + $shift__hex__down; $my__height=$my__height-1;

					endwhile;

			endwhile;

			echo "</div>";

			$wider=$wider-1; 

		endwhile; 

	$higher=$higher-1;

endwhile;

function hexmapIcons($key_array)
{
	$c_keys = count($key_array);
	$s = 0;
		while ($c_keys > 0) :

			$image = "";	$name = "";
			$image = $key_array[$s];

			if ($image == "_color_caverns.png"){$name = " Cavernous Region";}
			else if ($image == "_color_danger.png"){$name = " Contaminated Region";}
			else if ($image == "_color_dead.png"){$name = " Dead Region";}
			else if ($image == "_color_grass.png"){$name = " Grassy Region";}
			else if ($image == "_color_hills.png"){$name = " Hilly Region";}
			else if ($image == "_color_hull.png"){$name = " Metal Hull";}
			else if ($image == "_color_jungle.png"){$name = " Jungle Region";}
			else if ($image == "_color_lava.png"){$name = " Lava Region";}
			else if ($image == "_color_marsh.png"){$name = " Marshy Region";}
			else if ($image == "_color_mountains.png"){$name = " Mountainous Region";}
			else if ($image == "_color_sand.png"){$name = " Desert Region";}
			else if ($image == "_color_sand_hills.png"){$name = " Desert Region (Hills)";}
			else if ($image == "_color_sand_plants.png"){$name = " Desert Region (Plants)";}
			else if ($image == "_color_sea.png"){$name = " Water";}
			else if ($image == "_color_shards.png"){$name = " Crystalized Rocks";}
			else if ($image == "_color_snow.png"){$name = " Snowy Region";}
			else if ($image == "_color_swamp.png"){$name = " Swampy Region";}
			else if ($image == "_color_thorns.png"){$name = " Vegetation Region";}
			else if ($image == "_color_tree.png"){$name = " Forest Region";}
			else if ($image == "_color_ucracks.png"){$name = " Treacherous Region";}
			else if ($image == "_color_ucrystal.png"){$name = " Crystalized Area";}
			else if ($image == "_color_uplant.png"){$name = " Fungal Region";}
			else if ($image == "_color_uworld.png"){$name = " Underworld Area";}
			else if ($image == "_color_volcano.png"){$name = " Volcanic Area";}
			else if ($image == "_color_mars_flats.png"){$name = " Flat Lands";}
			else if ($image == "_color_mars_hills.png"){$name = " Hilly Region";}
			else if ($image == "_color_mars_rocks.png"){$name = " Rough Region";}
			else if ($image == "_color_moon_flats.png"){$name = " Flat Lands";}
			else if ($image == "_color_moon_hills.png"){$name = " Hilly Region";}
			else if ($image == "_color_moon_rocks.png"){$name = " Rough Region";}
			else if ($image == "animal.png"){$name = "Dangerous Creatures";}
			else if ($image == "atomic.png"){$name = "Atomic Research Lab";}
			else if ($image == "barrens.png"){$name = "Barren or Broken Land";}
			else if ($image == "boat.png"){$name = "Sunken Ship";}
			else if ($image == "cactus.png"){$name = "Desert (Plants)";}
			else if ($image == "camp.png"){$name = "Camp";}
			else if ($image == "castle.png"){$name = "Castle or Keep";}
			else if ($image == "castle_evil.png"){$name = "Castle";}
			else if ($image == "cave.png"){$name = "Cave";}
			else if ($image == "cavern.png"){$name = "Cavernous Wall";}
			else if ($image == "city.png"){$name = "City";}
			else if ($image == "city_underworld.png"){$name = "City";}
			else if ($image == "color_clear.png"){$name = " Clear Area";}
			else if ($image == "color_sea.png"){$name = " Water";}
			else if ($image == "color_sunken.png"){$name = "Sunken Structure";}
			else if ($image == "color_sunken_c.png"){$name = " Sunken Structure";}
			else if ($image == "color_hulli.png"){$name = " Metal Hull";}
			else if ($image == "computers.png"){$name = "Computer Center";}
			else if ($image == "crater.png"){$name = "Crater";}
			else if ($image == "crystals.png"){$name = "Crystalized Area";}
			else if ($image == "dead_tree.png"){$name = "Dead Vegetation";}
			else if ($image == "desert.png"){$name = "Desert";}
			else if ($image == "dock.png"){$name = "Dock or Port";}
			else if ($image == "dune.png"){$name = "Desert (Dunes)";}
			else if ($image == "dungeon.png"){$name = "Dungeon";}
			else if ($image == "dwelling.png"){$name = "Modular Dwellings";}
			else if ($image == "food.png"){$name = "Food Storage";}
			else if ($image == "forest.png"){$name = "Forest";}
			else if ($image == "fort.png"){$name = "Fort";}
			else if ($image == "fungus.png"){$name = "Fungal Growth";}
			else if ($image == "grasslands.png"){$name = "Grasslands";}
			else if ($image == "hatch.png"){$name = "Hatchway";}
			else if ($image == "hills.png"){$name = "Hills";}
			else if ($image == "hydro.png"){$name = "Hydro-Electric Station";}
			else if ($image == "jungle.png"){$name = "Jungle";}
			else if ($image == "lava.png"){$name = "Lava Region";}
			else if ($image == "lighthouse.png"){$name = "Lighthouse";}
			else if ($image == "marsh.png"){$name = "Marsh";}
			else if ($image == "medical.png"){$name = "Medical Facility";}
			else if ($image == "mine.png"){$name = "Mine";}
			else if ($image == "moon_crack.png"){$name = "Canyon or Crevasse";}
			else if ($image == "moon_flats.png"){$name = "Flat Lands";}
			else if ($image == "moon_rocky.png"){$name = "Rocky Region";}
			else if ($image == "mountains.png"){$name = "Mountains";}
			else if ($image == "pa_airport.png"){$name = "Airport";}
			else if ($image == "pa_boat.png"){$name = "Sunken Ship";}
			else if ($image == "pa_camp.png"){$name = "Camp";}
			else if ($image == "pa_communicate.png"){$name = "Communication Dish";}
			else if ($image == "pa_communicate2.png"){$name = "Communication Tower";}
			else if ($image == "pa_factory.png"){$name = "Factory";}
			else if ($image == "pa_military.png"){$name = "Military Base";}
			else if ($image == "pa_oil.png"){$name = "Oil Rig or Well";}
			else if ($image == "pa_power_plant.png"){$name = "Power Plant";}
			else if ($image == "pa_prison.png"){$name = "Prison";}
			else if ($image == "pa_radiation.png"){$name = "Radiated Area";}
			else if ($image == "pa_ruins.png"){$name = "Ruined City";}
			else if ($image == "pa_science.png"){$name = "Science Lab";}
			else if ($image == "pa_space_station.png"){$name = "Space Station";}
			else if ($image == "pa_vault.png"){$name = "Bomb Shelter or Vault";}
			else if ($image == "pa_village.png"){$name = "Village";}
			else if ($image == "power.png"){$name = "Power Station";}
			else if ($image == "research.png"){$name = "Research Lab";}
			else if ($image == "robot_factory.png"){$name = "Robot Factory";}
			else if ($image == "robots.png"){$name = "Robots";}
			else if ($image == "ruins.png"){$name = "Ruins";}
			else if ($image == "sf_alien_outpost.png"){$name = "Alien Settlement or Outpost";}
			else if ($image == "sf_biohazard.png"){$name = "Biohazard Area";}
			else if ($image == "sf_city.png"){$name = "City";}
			else if ($image == "sf_city_dome.png"){$name = "City (Domed)";}
			else if ($image == "sf_city_float.png"){$name = "City (Sky)";}
			else if ($image == "sf_evil_fortress.png"){$name = "Fortress";}
			else if ($image == "sf_generator.png"){$name = "Generator";}
			else if ($image == "sf_industry.png"){$name = "Industry or Generator";}
			else if ($image == "sf_military.png"){$name = "Military Base";}
			else if ($image == "sf_primitive.png"){$name = "Primitive Settlement";}
			else if ($image == "sf_ruins.png"){$name = "Ruins (Ancient)";}
			else if ($image == "sf_security.png"){$name = "Security Station";}
			else if ($image == "sf_ship_crash.png"){$name = "Crashed Spaceship";}
			else if ($image == "sf_village.png"){$name = "Outpost";}
			else if ($image == "shards.png"){$name = "Crystalized Rocks";}
			else if ($image == "skull.png"){$name = "Dangers Unknown";}
			else if ($image == "snow.png"){$name = "Snow";}
			else if ($image == "snow_barrens.png"){$name = "Snow (Barren or Broken)";}
			else if ($image == "snow_dead_tree.png"){$name = "Snow (Dead Vegetation)";}
			else if ($image == "snow_forest.png"){$name = "Snow (Forest)";}
			else if ($image == "snow_hills.png"){$name = "Snow (Hills)";}
			else if ($image == "stones.png"){$name = "Ruins (Old)";}
			else if ($image == "supplies.png"){$name = "Supply Storage";}
			else if ($image == "swamp.png"){$name = "Swamp";}
			else if ($image == "temple.png"){$name = "Temple";}
			else if ($image == "temple2.png"){$name = "Temple";}
			else if ($image == "thorns.png"){$name = "Thorny Vegetation";}
			else if ($image == "totem.png"){$name = "Primitive Temple";}
			else if ($image == "tower.png"){$name = "Tower";}
			else if ($image == "u_primitive.png"){$name = "Primitive Settlement";}
			else if ($image == "under_flats.png"){$name = "Flat Region";}
			else if ($image == "village.png"){$name = "Village";}
			else if ($image == "village_underworld.png"){$name = "Village";}
			else if ($image == "volcano.png"){$name = "Volcano";}
			else if ($image == "waterfall.png"){$name = "Waterfall";}
			else if ($image == "magic.png"){$name = "Unusual Magical Area";}
			else if ($image == "tech.png"){$name = "Unknown Technology";}


			if (($image != "") && ($name != "")){$value = $value . $name . "|" . $image . "^";}

			$s = $s + 1;
			$c_keys = $c_keys - 1;

		endwhile;

		$value = substr($value, 0, -1);

	return $value;
}

?>