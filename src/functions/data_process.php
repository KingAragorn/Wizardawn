<?php

$random_number = createRandomCode();

$x_stripper = explode("\n", $x_datas);
$c_stripper = count($x_stripper);
$s = 0;
	while ($c_stripper > 0) :
		$x_dutu = $x_dutu . "" . trim($x_stripper[$s]) . "\n";
		$s = $s + 1;
		$c_stripper = $c_stripper - 1;
	endwhile;
$x_datas = $x_dutu;
$x_datas = str_replace("   ", "\t", $x_datas);
$x_dataz = explode("--BEGIN--", $x_datas);
$x_data = explode("--END--", $x_dataz[1]);

//////// ENEMIES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process_0 > 0)
{
	$my_enemy_array = array();

	$x_data_creatures = $x_data[0];
	$x_creatures = explode("\n", $x_data_creatures);
	$c_creatures = count($x_creatures);
	$u_creatures = 1;

	while ($c_creatures > 0) :

		$x_creature = explode("\t", $x_creatures[$u_creatures]);

		$x_rarity = $x_creature[3] + 0;

		if ( $countapp == "Wandering Enemies" ){ $x_rarity = 1; }

		while ($x_rarity > 0) :

			$add_enemy = 1;

			if (trim($x_creature[0]) != "")
			{
				if ( ($x_code == "") && ($x_level+0 < 1) ){}
				else
				{
					$matcher = "/" . $x_code . "/i";
					if ($x_code != ""){ if (preg_match($matcher, $x_creature[1])){} else {$add_enemy = 0;} }
					if ($x_level > 0){ if ($x_creature[2] > $x_level){$add_enemy = 0;} }
				}

				if ($add_enemy > 0)
				{
					$enemy_in_list = $x_creature[0] . " - " . $x_creature[4] . "^^^" . $x_creature[2];
					array_push($my_enemy_array, $enemy_in_list);
				}
			}

			$x_rarity = $x_rarity - 1;

		endwhile;

		$c_creatures = $c_creatures - 1;
		$u_creatures = $u_creatures + 1;

	endwhile;

	$my_enemy_max = count($my_enemy_array)-1;
}

////// TRAPS ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process_1 > 0)
{
	$my_traps_array = array();

	$x_data_traps = $x_data[1];
	$x_traps = explode("\n", $x_data_traps);
	$c_traps = count($x_traps);
	$u_traps = 1;

	while ($c_traps > 0) :

		$x_trap = explode("\t", $x_traps[$u_traps]);

		if (trim($x_trap[0]) != "")
		{
			array_push($my_traps_array, $x_trap[0]);
		}

		$c_traps = $c_traps - 1;
		$u_traps = $u_traps + 1;

	endwhile;

	$my_traps_max = count($my_traps_array)-1;
}

////// DECORATIONS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process_2 > 0)
{
	$my_decos_array = array();

	$x_data_decorations = $x_data[2];
	$x_decorations = explode("\n", $x_data_decorations);
	$c_decorations = count($x_decorations);
	$u_decorations = 1;

	while ($c_decorations > 0) :

		$x_decoration = explode("\t", $x_decorations[$u_decorations]);

		if (trim($x_decoration[0]) != "")
		{
			array_push($my_decos_array, $x_decoration[0]);
		}

		$c_decorations = $c_decorations - 1;
		$u_decorations = $u_decorations + 1;

	endwhile;

	$my_decos_max = count($my_decos_array)-1;
}

////// CONTAINERS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process_3 > 0)
{
	$my_boxes_array = array();

	$x_data_containers = $x_data[3];
	$x_containers = explode("\n", $x_data_containers);
	$c_containers = count($x_containers);
	$u_containers = 1;

	while ($c_containers > 0) :

		$x_container = explode("\t", $x_containers[$u_containers]);

		if (trim($x_container[0]) != "")
		{
			array_push($my_boxes_array, $x_container[0]);
		}

		$c_containers = $c_containers - 1;
		$u_containers = $u_containers + 1;

	endwhile;

	$my_boxes_max = count($my_boxes_array)-1;
}

////// LOOT LISTS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process_4 > 0)
{
	$x_data_treasures = $x_data[4];
	$x_treasures = explode("\n", $x_data_treasures);
	$c_treasures = count($x_treasures);
	$u_treasures = 1;

	if ($c_treasures > 0)
	{
		$gable_treasure = "treasures" . $random_number;
		$qry_treasure = "CREATE TEMPORARY TABLE $gable_treasure (treasure LONGTEXT NOT NULL, chance INT(10) NOT NULL, mylist INT(10) NOT NULL, sublist INT(10) NOT NULL)";
		wz_query( $connection, $qry_treasure ); /* qry_treasure. */
	}

	while ($c_treasures > 0) :

		$x_treasure = explode("\t", $x_treasures[$u_treasures]);

		if (trim($x_treasure[0]) != "")
		{
			$cycle = $x_treasure[1] + 0;

			while ($cycle > 0) :

				$x_val_treasure = str_replace("'", " feet", $x_treasure[0]);
				$x_val_treasure = str_replace('"', ' inches', $x_val_treasure);
				$qry_treasure = "INSERT INTO $gable_treasure VALUES ('$x_val_treasure', '$x_treasure[1]', '0', '$x_treasure[2]')";
				wz_query( $connection, $qry_treasure ); /* qry_treasure. */

				$cycle = $cycle - 1;

			endwhile;
		}

		$c_treasures = $c_treasures - 1;
		$u_treasures = $u_treasures + 1;

	endwhile;

	$sub_loot_lists = 1;
	$loot_listings = 4;

	while ($sub_loot_lists > 0) :

		$loot_listings = $loot_listings + 1;
		$loot_listing = $loot_listing + 1;

		$x_data_treasures = $x_data[$loot_listings];
		$x_treasures = explode("\n", $x_data_treasures);
		$c_treasures = count($x_treasures);
		$u_treasures = 1;

		$sub_loot_lists = 0;

		while ($c_treasures > 0) :

			$x_treasure = explode("\t", $x_treasures[$u_treasures]);

			if (trim($x_treasure[0]) != "")
			{
				$sub_loot_lists = 1;
				$x_val_treasure = str_replace("'", " feet", $x_treasure[0]);
				$x_val_treasure = str_replace('"', ' inches', $x_val_treasure);
				$qry_treasure = "INSERT INTO $gable_treasure VALUES ('$x_val_treasure', '$x_treasure[1]', '$loot_listing', '$x_treasure[2]')";
				wz_query( $connection, $qry_treasure ); /* qry_treasure. */
			}

			$c_treasures = $c_treasures - 1;
			$u_treasures = $u_treasures + 1;

		endwhile;

	endwhile;
}

?>