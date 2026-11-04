<?php

if (mt_rand(1,100) > 98) // 2% CHANCE OF INTELLIGENT SWORD
{

if ($game == "Labyrinth Lord")
{
	$swint = mt_rand(1,6);
	if ($swint == 1){$sword_int = 7; $sword_detect_powers = 1; $sword_spells = 0; $sword_communicate = "way of communion";}
	else if ($swint == 2){$sword_int = 8; $sword_detect_powers = 2; $sword_spells = 0; $sword_communicate = "way of communion";}
	else if ($swint == 3){$sword_int = 9; $sword_detect_powers = 3; $sword_spells = 0; $sword_communicate = "way of communion";}
	else if ($swint == 4){$sword_int = 10; $sword_detect_powers = 3; $sword_spells = 0; $sword_communicate = "verbal means";}
	else if ($swint == 5){$sword_int = 11; $sword_detect_powers = 3; $sword_spells = 0; $sword_communicate = "verbal means and can read magic";}
	else {$sword_int = 12; $sword_detect_powers = 3; $sword_spells = 1; $sword_communicate = "verbal means and can read magic";}

	/////////////////////////////////////////////////////

	$swlang = mt_rand(1,20);
	if ($swlang >= 20){$sword_languages = mt_rand(1,5) + mt_rand(1,5);}
	else if ($swlang >= 19){$sword_languages = 5;}
	else if ($swlang >= 18){$sword_languages = 4;}
	else if ($swlang >= 15){$sword_languages = 3;}
	else if ($swlang >= 11){$sword_languages = 2;}
	else {$sword_languages = 1;}

	/////////////////////////////////////////////////////

	$swalng = mt_rand(1,100);
	if ($swalng >= 31){$sword_alignment = "lawful";}
	else if ($swalng >= 11){$sword_alignment = "neutral";}
	else {$sword_alignment = "chaotic";}

	$sword_psyche = mt_rand(1,12);
	$sword_willpower = $sword_psyche + $sword_int + $sword_spells;

	/////////////////////////////////////////////////////

	$swmotv = mt_rand(1,6);
	if ($swmotv == 1){$sword_motivation = "Motivated to Destroy Clerics";}
	else if ($swmotv == 2){$sword_motivation = "Motivated to Destroy Dwarves, Fighters, & Halflings";}
	else if ($swmotv == 3){$sword_motivation = "Motivated to Destroy Elves & Magic-Users";}
	else if ($swmotv == 4)
	{
		if ($sword_alignment == "lawful"){$sword_motivation = "Motivated to Destroy Chaotic Beings";}
		else if ($sword_alignment == "chaotic"){$sword_motivation = "Motivated to Destroy Lawful Beings";}	
		else {$swmotv = 5;}
	}
	if ($swmotv == 5)
	{
		$swkills = mt_rand(1,13);
		if ($swkills == 1){$sword_motivation = "Motivated to Destroy Lycanthropes";}
		else if ($swkills == 2){$sword_motivation = "Motivated to Destroy Spell Casters";}
		else if ($swkills == 3){$sword_motivation = "Motivated to Destroy Undead";}
		else if ($swkills == 4){$sword_motivation = "Motivated to Destroy Dragons";}
		else if ($swkills == 5){$sword_motivation = "Motivated to Destroy Regenerating Monsters";}
		else if ($swkills == 6){$sword_motivation = "Motivated to Destroy Magical Monsters";}
		else if ($swkills == 7){$sword_motivation = "Motivated to Destroy Reptiles";}
		else if ($swkills == 8){$sword_motivation = "Motivated to Destroy Elementals";}
		else if ($swkills == 9){$sword_motivation = "Motivated to Destroy Golems";}
		else if ($swkills == 10){$sword_motivation = "Motivated to Destroy Sea Creatures";}
		else if ($swkills == 11){$sword_motivation = "Motivated to Destroy Avians";}
		else if ($swkills == 12){$sword_motivation = "Motivated to Destroy Humanoid Monsters";}
		else {$sword_motivation = "Motivated to Destroy Spiders";}
	}
	if (mt_rand(1,100) > 5){$sword_motivation = "";} else {$sword_motivation = " It is " . strtolower($sword_motivation) . "."; }

	/////////////////////////////////////////////////////

	if ($aec == 1){$max = 46;} else {$max = 32;}
	$talk_array = array();
	array_push($talk_array, "Common");
	$amount = $sword_languages - 1;

	while ($amount > 0) :

		switch (mt_rand(1,$max))
		{
			case 1: $talk = "Bugbear"; break;
			case 2: $talk = "Centaur"; break;
			case 3: $talk = "Cyclops"; break;
			case 4: $talk = "Doppelganger"; break;
			case 5: $talk = "Dragon"; break;
			case 6: $talk = "Dryad"; break;
			case 7: $talk = "Dwarf"; break;
			case 8: $talk = "Elf"; break;
			case 9: $talk = "Ettin"; break;
			case 10: $talk = "Gargoyle"; break;
			case 11: $talk = "Giant"; break;
			case 12: $talk = "Gnoll"; break;
			case 13: $talk = "Gnome"; break;
			case 14: $talk = "Goblin"; break;
			case 15: $talk = "Halfling"; break;
			case 16: $talk = "Harpy"; break;
			case 17: $talk = "Hobgoblin"; break;
			case 18: $talk = "Kobold"; break;
			case 19: $talk = "Lizardfolk"; break;
			case 20: $talk = "Medusa"; break;
			case 21: $talk = "Merfolk"; break;
			case 22: $talk = "Minotaur"; break;
			case 23: $talk = "Morlock"; break;
			case 24: $talk = "Neanderthal"; break;
			case 25: $talk = "Nixie"; break;
			case 26: $talk = "Ogre"; break;
			case 27: $talk = "Orc"; break;
			case 28: $talk = "Pixie"; break;
			case 29: $talk = "Sprite"; break;
			case 30: $talk = "Treant"; break;
			case 31: $talk = "Troglodyte"; break;
			case 32: $talk = "Troll"; break;
			case 33: $talk = "Brownie"; break; // BEGIN AEC MONSTERS
			case 34: $talk = "Demon"; break;
			case 35: $talk = "Devil"; break;
			case 36: $talk = "Hag"; break;
			case 37: $talk = "Lammasu"; break;
			case 38: $talk = "Leprechaun"; break;
			case 39: $talk = "Locathah"; break;
			case 40: $talk = "Naga"; break;
			case 41: $talk = "Nymph"; break;
			case 42: $talk = "Sahuagin"; break;
			case 43: $talk = "Satyr"; break;
			case 44: $talk = "Sphinx"; break;
			case 45: $talk = "Titan"; break;
			case 46: $talk = "Triton"; break;
		}

		if (in_array($talk, $talk_array)){} else { array_push($talk_array, $talk); $amount = $amount - 1; }

	endwhile;

	$talk_count = count($talk_array);
	$comma_use = $talk_count;
	$s = 0;
	while ($talk_count > 0) :
		if ($talk_count > 1){$speech = $speech . $talk_array[$s] . ", ";} else {$speech = $speech . "&amp; " . $talk_array[$s] . ", ";} 
		$s = $s + 1;
		$talk_count = $talk_count - 1;
	endwhile;

	$speech = "Languages Known: " . substr(strtolower($speech), 0, -2);
	if ( $comma_use == 2 ){ $speech = str_replace(", &amp;", " &amp;", $speech); }
	if ( $comma_use == 1 ){ $speech = str_replace(",", "", $speech); $speech = str_replace("&amp;", "", $speech); }

	/////////////////////////////////////////////////////

	$detect_array = array();
	$amount = $sword_detect_powers;
	$max = 100; 

	while ($amount > 0) :

		$catchd = $catchd + 1;

		$dtc_dice = mt_rand(1,$max);

		switch ($dtc_dice)
		{
			case $dtc_dice >= 1 and $dtc_dice <= 5: $detection = "Detect Evil 20` Range"; break;
			case $dtc_dice >= 6 and $dtc_dice <= 10: $detection = "Detect Good 20` Range"; break;
			case $dtc_dice >= 11 and $dtc_dice <= 15: $detection = "Detect Gems and Jewelry 60` Range"; break;
			case $dtc_dice >= 16 and $dtc_dice <= 25: $detection = "Detect Invisible and Hidden 20` Range"; break;
			case $dtc_dice >= 26 and $dtc_dice <= 35: $detection = "Detect Secret Doors 10` Range 3 Time per Day"; break;
			case $dtc_dice >= 36 and $dtc_dice <= 45: $detection = "Detect Metals 60` Range but Blocked by Lead"; break;
			case $dtc_dice >= 46 and $dtc_dice <= 60: $detection = "Detect Moving Walls and Rooms 10` Range"; break;
			case $dtc_dice >= 61 and $dtc_dice <= 80: $detection = "Detect Sloping Passages 10` Range"; break;
			case $dtc_dice >= 81 and $dtc_dice <= 96: $detection = "Detect Traps 10` Range"; break;
			case $dtc_dice == 97: $amount = $amount + 2; $max = 96; break;
			case $dtc_dice >= 98: $sword_spells = $sword_spells + 1; break;
		}

		if ($dtc_dice <= 96){if (in_array($detection, $detect_array)){} else { array_push($detect_array, $detection); $amount = $amount - 1; }}
		if ($catchd > 100){$amount = 0;}

	endwhile;

	$detect_count = count($detect_array);
	$comma_use = $detect_count;
	$s = 0;
	while ($detect_count > 0) :
		if ($detect_count > 1){$detects = $detects . $detect_array[$s] . ", ";} else {$detects = $detects . "&amp; " . $detect_array[$s] . ", ";} 
		$s = $s + 1;
		$detect_count = $detect_count - 1;
	endwhile;

	$detects = "Detection Powers: " . substr(strtolower($detects), 0, -2);
	if ( $comma_use == 2 ){ $detects = str_replace(", &amp;", " &amp;", $detects); }
	if ( $comma_use == 1 ){ $detects = str_replace(",", "", $detects); $detects = str_replace("&amp;", "", $detects); }

	/////////////////////////////////////////////////////

	$magic_array = array();
	$amount = $sword_spells;
	$max = 100;

	if ($sword_spells > 0)
	{
		while ($amount > 0) :

			$catchs = $catchs + 1;

			$mag_dice = mt_rand(1,$max);

			switch ($mag_dice)
			{
				case $mag_dice >= 1 and $mag_dice <= 10: $magicion = "Clairaudience"; break;
				case $mag_dice >= 11 and $mag_dice <= 20: $magicion = "Clairvoyance"; break;
				case $mag_dice >= 21 and $mag_dice <= 25: $magicion = "Extra Damage"; $sword_damage = $sword_damage + 2; break;
				case $mag_dice >= 26 and $mag_dice <= 35: $magicion = "ESP"; break;
				case $mag_dice >= 36 and $mag_dice <= 40: $magicion = "Fly for 3 turns"; break;
				case $mag_dice >= 41 and $mag_dice <= 45: $magicion = "Regenerate 1 Hit Point per Round"; $sword_regen = $sword_regen + 6; break;
				case $mag_dice >= 46 and $mag_dice <= 50: $magicion = "Levitate for 3 turns"; break;
				case $mag_dice >= 51 and $mag_dice <= 57: $magicion = "Phantasmal Force"; break;
				case $mag_dice >= 58 and $mag_dice <= 67: $magicion = "Telekinesis"; break;
				case $mag_dice >= 68 and $mag_dice <= 77: $magicion = "Telepathy"; break;
				case $mag_dice >= 78 and $mag_dice <= 86: $magicion = "Teleportation"; break;
				case $mag_dice >= 87 and $mag_dice <= 96: $magicion = "X-Ray Vision"; break;
				case $mag_dice >= 97 and $mag_dice <= 99: $amount = $amount + 2; $max = 96; break;
				case $mag_dice >= 100: $amount = $amount + 3; $max = 96; break;
			}

			if ($mag_dice <= 96){if (in_array($magicion, $magic_array)){} else { array_push($magic_array, $magicion); $amount = $amount - 1; }}
			if ($catchs > 100){$amount = 0;}

		endwhile;

		$magic_count = count($magic_array);
		$comma_use = $magic_count;
		$s = 0;
		while ($magic_count > 0) :
			if ($magic_count > 1)
			{
				$magics = $magics . $magic_array[$s] . ", ";
			}
			else
			{
				$magics = $magics . "&amp; " . $magic_array[$s] . ", ";
			}
			if ($magic_array[$s] == "Extra Damage")
			{
				$magics = substr(strtolower($magics), 0, -2);
				$magics = $magics . " x" . $sword_damage . ", ";
			}
			else if ($magic_array[$s] == "Regenerate 1 Hit Point per Round")
			{
				$magics = substr(strtolower($magics), 0, -2);
				$magics = $magics . " at " . $sword_regen . " Hit Points per Day, ";
			}
			$s = $s + 1;
			$magic_count = $magic_count - 1;
		endwhile;

		$magics = "Spell-Like Powers: " . substr(strtolower($magics), 0, -2);
		if ( $comma_use == 2 ){ $magics = str_replace(", &amp;", " &amp;", $magics); }
		if ( $comma_use == 1 ){ $magics = str_replace(",", "", $magics); $magics = str_replace("&amp;", "", $magics); }
		$magics = $magics . ".";
	}

	/////////////////////////////////////////////////////

	$item = $item . " [ This sapient sword has a " . $sword_int . " intelligence and communicates by " . $sword_communicate . ". " . $speech . ". It has a " . $sword_alignment . " alignment with a psyche of " . $sword_psyche . " and a willpower of " . $sword_willpower . ". " . $sword_motivation . " " . $detects . ". " . $magics . " ]";
}






else if ($game == "AD&D") /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	$swint = mt_rand(76,100);
	if ($swint >= 100){$sword_int = 17; $sword_detect_powers = 3; $sword_spells = 1; $sword_communicate = "way of telepathy and speech, but can also read languages both normal and magical"; $ego = $ego + 7;}
	else if ($swint >= 98){$sword_int = 16; $sword_detect_powers = 3; $sword_spells = 0; $sword_communicate = "verbal means, but can also read languages and maps"; $ego = $ego + 3;}
	else if ($swint >= 95){$sword_int = 15; $sword_detect_powers = 3; $sword_spells = 0; $sword_communicate = "verbal means"; $ego = $ego + 3;}
	else if ($swint >= 90){$sword_int = 14; $sword_detect_powers = 2; $sword_spells = 0; $sword_communicate = "verbal means"; $ego = $ego + 2;}
	else if ($swint >= 84){$sword_int = 13; $sword_detect_powers = 2; $sword_spells = 0; $sword_communicate = "way of empathy"; $ego = $ego + 2;}
	else {$sword_int = 12; $sword_detect_powers = 1; $sword_spells = 0; $sword_communicate = "way of semi-empathy"; $ego = $ego + 1;}

	/////////////////////////////////////////////////////

	$swlang = mt_rand(1,20);
	if ($swlang >= 20){$sword_languages = 6;}
	else if ($swlang >= 19){$sword_languages = 5;}
	else if ($swlang >= 18){$sword_languages = 4;}
	else if ($swlang >= 15){$sword_languages = 3;}
	else if ($swlang >= 11){$sword_languages = 2;}
	else {$sword_languages = 1;}
	
	$ego = $ego + ceil($sword_languages/2);

	/////////////////////////////////////////////////////

	$lgn = 1;
	$swalng = mt_rand(1,100);
	if ($swalng >= 81){$sword_alignment = "neutral good"; $hate = "evil"; $despise = "neutral evil";}
	else if ($swalng >= 61){$sword_alignment = "neutral"; $lgn = 31;}
	else if ($swalng >= 56){$sword_alignment = "lawful neutral"; $hate = "chaotic"; $despise = "chaotic neutral";}
	else if ($swalng >= 31){$sword_alignment = "lawful good"; $hate = "chaotic"; $despise = "chaotic evil";}
	else if ($swalng >= 26){$sword_alignment = "lawful evil"; $hate = "chaotic"; $despise = "chaotic good"; $dmgp=1;}
	else if ($swalng >= 21){$sword_alignment = "neutral evil"; $hate = "good"; $despise = "neutral good"; $dmgp=1;}
	else if ($swalng >= 16){$sword_alignment = "chaotic evil"; $hate = "lawful"; $despise = "lawful good"; $dmgp=1;}
	else if ($swalng >= 6){$sword_alignment = "chaotic neutral"; $hate = "lawful"; $despise = "lawful neutral";}
	else {$sword_alignment = "chaotic good"; $hate = "lawful"; $despise = "lawful evil";}

	/////////////////////////////////////////////////////

	$talk_array = array();
	array_push($talk_array, "Common");
	$amount = $sword_languages - 1;

	while ($amount > 0) :

		switch (mt_rand(1,48))
		{
			case 1: $talk = "Beholder"; break;
			case 2: $talk = "Brownie"; break;
			case 3: $talk = "Bugbear"; break;
			case 4: $talk = "Centaur"; break;
			case 5: $talk = "Demon"; break;
			case 6: $talk = "Dryad"; break;
			case 7: $talk = "Devil"; break;
			case 8: $talk = "Dragon"; break;
			case 9: $talk = "Doppleganger"; break;
			case 10: $talk = "Dryad"; break;
			case 11: $talk = "Dwarf"; break;
			case 12: $talk = "Elf"; break;
			case 13: $talk = "Ettin"; break;
			case 14: $talk = "Gargoyle"; break;
			case 15: $talk = "Giant"; break;
			case 16: $talk = "Gnoll"; break;
			case 17: $talk = "Gnome"; break;
			case 18: $talk = "Goblin"; break;
			case 19: $talk = "Halfling"; break;
			case 20: $talk = "Harpy"; break;
			case 21: $talk = "Hobgoblin"; break;
			case 22: $talk = "Kobold"; break;
			case 23: $talk = "Lamia"; break;
			case 24: $talk = "Lammasu"; break;
			case 25: $talk = "Leprechaun"; break;
			case 26: $talk = "Lizard Man"; break;
			case 27: $talk = "Medusa"; break;
			case 28: $talk = "Merman"; break;
			case 29: $talk = "Mind Flayer"; break;
			case 30: $talk = "Minotaur"; break;
			case 31: $talk = "Naga"; break;
			case 32: $talk = "Hag"; break;
			case 33: $talk = "Nixie"; break;
			case 34: $talk = "Nymph"; break;
			case 35: $talk = "Ogre"; break;
			case 36: $talk = "Orc"; break;
			case 37: $talk = "Pixie"; break;
			case 38: $talk = "Sahuagin"; break;
			case 39: $talk = "Satyr"; break;
			case 40: $talk = "Shedu"; break;
			case 41: $talk = "Sphinx"; break;
			case 42: $talk = "Sprite"; break;
			case 43: $talk = "Sylph"; break;
			case 44: $talk = "Titan"; break;
			case 45: $talk = "Treant"; break;
			case 46: $talk = "Triton"; break;
			case 47: $talk = "Troglodyte"; break;
			case 48: $talk = "Troll"; break;
		}

		if (in_array($talk, $talk_array)){} else { array_push($talk_array, $talk); $amount = $amount - 1; }

	endwhile;

	$talk_count = count($talk_array);
	$comma_use = $talk_count;
	$s = 0;
	while ($talk_count > 0) :
		if ($talk_count > 1){$speech = $speech . $talk_array[$s] . ", ";} else {$speech = $speech . "&amp; " . $talk_array[$s] . ", ";} 
		$s = $s + 1;
		$talk_count = $talk_count - 1;
	endwhile;

	$speech = "Languages Known: " . substr(strtolower($speech), 0, -2);
	if ( $comma_use == 2 ){ $speech = str_replace(", &amp;", " &amp;", $speech); }
	if ( $comma_use == 1 ){ $speech = str_replace(",", "", $speech); $speech = str_replace("&amp;", "", $speech); }

	/////////////////////////////////////////////////////

	$detect_array = array();
	$amount = $sword_detect_powers;
	$max = 100; 

	while ($amount > 0) :

		$catchd = $catchd + 1;

		$dtc_dice = mt_rand(1,$max);

		switch ($dtc_dice)
		{
			case $dtc_dice >= 1 and $dtc_dice <= 6: $detection = "Detect Evil 10` Range"; break;
			case $dtc_dice >= 7 and $dtc_dice <= 11: $detection = "Detect Good 10` Range"; break;
			case $dtc_dice >= 12 and $dtc_dice <= 22: $detection = "Detect Precious Metals (amount and type) 20` Range"; break;
			case $dtc_dice >= 23 and $dtc_dice <= 33: $detection = "Detect Shifting/Elevating Rooms or Walls 10` Range"; break;
			case $dtc_dice >= 34 and $dtc_dice <= 44: $detection = "Detect Sloping Passages 10` Range"; break;
			case $dtc_dice >= 45 and $dtc_dice <= 55: $detection = "Detect Traps 10` Range"; break;
			case $dtc_dice >= 56 and $dtc_dice <= 66: $detection = "Detect Gems (amount and type) 5`"; break;
			case $dtc_dice >= 67 and $dtc_dice <= 77: $detection = "Detect Magic 10` Range"; break;
			case $dtc_dice >= 78 and $dtc_dice <= 82: $detection = "Detect Secret Doors 5` Range"; break;
			case $dtc_dice >= 83 and $dtc_dice <= 87: $detection = "Detect Invisible 10` Range"; break;
			case $dtc_dice >= 88 and $dtc_dice <= 92: $detection = "Locate Object 120` Range"; break;
			case $dtc_dice >= 93 and $dtc_dice <= 98: $amount = $amount + 2; $max = 92; break;
			case $dtc_dice >= 99: $sword_spells = $sword_spells + 1; $max = 92; break;
		}

		if ($dtc_dice <= 92){if (in_array($detection, $detect_array)){} else { array_push($detect_array, $detection); $amount = $amount - 1; } }
		if ($catchd > 100){$amount = 0;}

	endwhile;

	$detect_count = count($detect_array);
	$comma_use = $detect_count;
	$s = 0;
	while ($detect_count > 0) :
		if ($detect_count > 1){$detects = $detects . $detect_array[$s] . ", ";} else {$detects = $detects . "&amp; " . $detect_array[$s] . ", ";} 
		$s = $s + 1;
		$detect_count = $detect_count - 1;
	endwhile;

	$detects = "Minor Powers: " . substr(strtolower($detects), 0, -2);
	if ( $comma_use == 2 ){ $detects = str_replace(", &amp;", " &amp;", $detects); }
	if ( $comma_use == 1 ){ $detects = str_replace(",", "", $detects); $detects = str_replace("&amp;", "", $detects); }

	/////////////////////////////////////////////////////

	$magic_array = array();
	$amount = $sword_spells;
	$swmotv = 0;

	if ($sword_spells > 0)
	{
		while ($amount > 0) :

			$catchs = $catchs + 1;

			$mag_dice = mt_rand(1,95);

			switch ($mag_dice)
			{
				case $mag_dice >= 1 and $mag_dice <= 7: $magicion = "charm person on contact for three times per day"; break;
				case $mag_dice >= 8 and $mag_dice <= 15: $magicion = "clairaudience 30` range for 1 round and three times per day"; break;
				case $mag_dice >= 16 and $mag_dice <= 22: $magicion = "clairvoyance 30` range for 1 round and three times per day"; break;
				case $mag_dice >= 23 and $mag_dice <= 28: $magicion = "determine direction and depth twice per day"; break;
				case $mag_dice >= 29 and $mag_dice <= 34: $magicion = "ESP 30` range for 1 round and three times per day"; break;
				case $mag_dice >= 35 and $mag_dice <= 41: $magicion = "flying for 1 hour per day and 120` move"; break;
				case $mag_dice >= 42 and $mag_dice <= 47: $magicion = "heal once per day"; break;
				case $mag_dice >= 48 and $mag_dice <= 54: $magicion = "illusion as per the wand of illusions for twice per day"; break;
				case $mag_dice >= 55 and $mag_dice <= 61: $magicion = "levitate at 6th level for 1 turn and three times per day"; break;
				case $mag_dice >= 62 and $mag_dice <= 67: $magicion = "strength as the spell for once per day on wielder only"; break;
				case $mag_dice >= 68 and $mag_dice <= 75: $magicion = "telekinesis up to 250 lbs for 1 round and twice per day"; break;
				case $mag_dice >= 76 and $mag_dice <= 81: $magicion = "telepathy 60` range for twice per day"; break;
				case $mag_dice >= 82 and $mag_dice <= 88: $magicion = "teleport as the spell for 600 lbs max and once per day"; break;
				case $mag_dice >= 89 and $mag_dice <= 94: $magicion = "x-ray vision 40` range for 1 turn and twice per day"; break;
				case $mag_dice >= 95: $swmotv = mt_rand($lgn,110); $ego = $ego + 6; break;
			}

			if ($mag_dice <= 94){if (in_array($magicion, $magic_array)){} else { array_push($magic_array, $magicion); $amount = $amount - 1; }}
			if ($catchs > 100){$amount = 0;}

		endwhile;

		$magic_count = count($magic_array);
		$comma_use = $magic_count;
		$s = 0;
		while ($magic_count > 0) :
			if ($magic_count > 1)
			{
				$magics = $magics . $magic_array[$s] . ", ";
			}
			else
			{
				$magics = $magics . "&amp; " . $magic_array[$s] . ", ";
			}
			$s = $s + 1;
			$magic_count = $magic_count - 1;
		endwhile;

		$magics = "Major Powers: " . substr(strtolower($magics), 0, -2);
		if ( $comma_use == 2 ){ $magics = str_replace(", &amp;", " &amp;", $magics); }
		if ( $comma_use == 1 ){ $magics = str_replace(",", "", $magics); $magics = str_replace("&amp;", "", $magics); }
		$magics = $magics . ".";
	}

	/////////////////////////////////////////////////////

	if ($swmotv > 0)
	{
		switch ($swmotv)
		{	
			case $swmotv >= 1 and $swmotv <= 20: $sword_motivation = " It has a special purpose to defeat those that are " . $hate . "."; break;
			case $swmotv >= 21 and $swmotv <= 30: $sword_motivation = " It has a special purpose to defeat those that are " . $despise . "."; break;
			case $swmotv >= 31 and $swmotv <= 40: $sword_motivation = " It has a special purpose to slay druids/clerics."; break;
			case $swmotv >= 41 and $swmotv <= 50: $sword_motivation = " It has a special purpose to slay fighters/paladins/rangers."; break;
			case $swmotv >= 51 and $swmotv <= 60: $sword_motivation = " It has a special purpose to slay magic-users/illusionists."; break;
			case $swmotv >= 61 and $swmotv <= 90: $sword_motivation = " It has a special purpose to slay non-human monsters."; break;
			case $swmotv >= 91 and $swmotv <= 100: $sword_motivation = " It has a special purpose to slay thieves/assassins."; break;
			case $swmotv >= 101 and $swmotv <= 110: $sword_motivation = " It has a special purpose to slay bards/monks."; break;
		}
		$badness = mt_rand(1,100);
		if ($badness >= 81){ $sword_motivation = $sword_motivation . " If it strikes such opponents, they will suffer penalty of 2 to saves and 1 to damage they deal per dice of damage."; }
		else if ($badness >= 66){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause paralysis for 1d4 rounds."; }
		else if ($badness >= 56){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause insanity for 1d4 rounds."; }
		else if ($badness >= 26){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause fear for 1d4 rounds."; }
		else if ($badness >= 21){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause disintegration."; }
		else if ($badness >= 11){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause confusion for 2d6 rounds."; }
		else { $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause blindness for 2d6 rounds."; }
	}

	/////////////////////////////////////////////////////

	$item = $item . " [ This unusual sword has a " . $sword_int . " intelligence and communicates by " . $sword_communicate . ". " . $speech . ". It has a " . $sword_alignment . " alignment with an ego of " . $ego . ". " . $sword_motivation . " " . $detects . ". " . $magics . " ]";
}






else if ($game == "OSRIC") /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	$swint = mt_rand(76,100);
	if ($swint >= 100){$sword_int = 18; $sword_detect_powers = 3; $sword_spells = 1; $sword_communicate = "way of telepathy"; $ego = $ego + 7;}
	else if ($swint >= 98){$sword_int = 17; $sword_detect_powers = 3; $sword_spells = 0; $sword_communicate = "verbal means"; $ego = $ego + 3;}
	else if ($swint >= 95){$sword_int = 16; $sword_detect_powers = 3; $sword_spells = 0; $sword_communicate = "verbal means"; $ego = $ego + 3;}
	else if ($swint >= 90){$sword_int = 15; $sword_detect_powers = 2; $sword_spells = 0; $sword_communicate = "verbal means"; $ego = $ego + 2;}
	else if ($swint >= 84){$sword_int = 14; $sword_detect_powers = 2; $sword_spells = 0; $sword_communicate = "way of high empathy"; $ego = $ego + 2;}
	else {$sword_int = 13; $sword_detect_powers = 1; $sword_spells = 0; $sword_communicate = "way of low empathy"; $ego = $ego + 1;}

	/////////////////////////////////////////////////////

	$swlang = mt_rand(1,20);
	if ($swlang >= 20){$sword_languages = 6;}
	else if ($swlang >= 19){$sword_languages = 5;}
	else if ($swlang >= 18){$sword_languages = 4;}
	else if ($swlang >= 15){$sword_languages = 3;}
	else if ($swlang >= 11){$sword_languages = 2;}
	else {$sword_languages = 1;}
	
	$ego = $ego + $sword_languages;

	/////////////////////////////////////////////////////

	$lgn = 1;
	$swalng = mt_rand(1,100);
	if ($swalng >= 81){$sword_alignment = "neutral good"; $hate = "evil"; $despise = "neutral evil";}
	else if ($swalng >= 61){$sword_alignment = "neutral"; $lgn = 31;}
	else if ($swalng >= 56){$sword_alignment = "lawful neutral"; $hate = "chaotic"; $despise = "chaotic neutral";}
	else if ($swalng >= 31){$sword_alignment = "lawful good"; $hate = "chaotic"; $despise = "chaotic evil";}
	else if ($swalng >= 26){$sword_alignment = "lawful evil"; $hate = "chaotic"; $despise = "chaotic good"; $dmgp=1;}
	else if ($swalng >= 21){$sword_alignment = "neutral evil"; $hate = "good"; $despise = "neutral good"; $dmgp=1;}
	else if ($swalng >= 16){$sword_alignment = "chaotic evil"; $hate = "lawful"; $despise = "lawful good"; $dmgp=1;}
	else if ($swalng >= 6){$sword_alignment = "chaotic neutral"; $hate = "lawful"; $despise = "lawful neutral";}
	else {$sword_alignment = "chaotic good"; $hate = "lawful"; $despise = "lawful evil";}

	/////////////////////////////////////////////////////

	$talk_array = array();
	array_push($talk_array, "Common");
	$amount = $sword_languages - 1;

	while ($amount > 0) :

		switch (mt_rand(1,51))
		{
			case 1: $talk = "Bugbear"; break;
			case 2: $talk = "Centaur"; break;
			case 3: $talk = "Cyclops"; break;
			case 4: $talk = "Doppelganger"; break;
			case 5: $talk = "Dragon"; break;
			case 6: $talk = "Dryad"; break;
			case 7: $talk = "Dwarf"; break;
			case 8: $talk = "Elf"; break;
			case 9: $talk = "Ettin"; break;
			case 10: $talk = "Gargoyle"; break;
			case 11: $talk = "Giant"; break;
			case 12: $talk = "Gnoll"; break;
			case 13: $talk = "Gnome"; break;
			case 14: $talk = "Goblin"; break;
			case 15: $talk = "Halfling"; break;
			case 16: $talk = "Harpy"; break;
			case 17: $talk = "Hobgoblin"; break;
			case 18: $talk = "Kobold"; break;
			case 19: $talk = "Lizard Man"; break;
			case 20: $talk = "Medusa"; break;
			case 21: $talk = "Merman"; break;
			case 22: $talk = "Minotaur"; break;
			case 23: $talk = "Grimlock"; break;
			case 24: $talk = "Caveman"; break;
			case 25: $talk = "Nixie"; break;
			case 26: $talk = "Ogre"; break;
			case 27: $talk = "Orc"; break;
			case 28: $talk = "Pixie"; break;
			case 29: $talk = "Sprite"; break;
			case 30: $talk = "Treant"; break;
			case 31: $talk = "Troglodyte"; break;
			case 32: $talk = "Troll"; break;
			case 33: $talk = "Brownie"; break;
			case 34: $talk = "Demon"; break;
			case 35: $talk = "Devil"; break;
			case 36: $talk = "Hag"; break;
			case 37: $talk = "Lammasu"; break;
			case 38: $talk = "Leprechaun"; break;
			case 39: $talk = "Locathah"; break;
			case 40: $talk = "Naga"; break;
			case 41: $talk = "Nymph"; break;
			case 42: $talk = "Shedu"; break;
			case 43: $talk = "Satyr"; break;
			case 44: $talk = "Sphinx"; break;
			case 45: $talk = "Titan"; break;
			case 46: $talk = "Triton"; break;
			case 47: $talk = "Batrachian"; break;
			case 48: $talk = "Quickling"; break;
			case 49: $talk = "Sylph"; break;
			case 50: $talk = "Lamia"; break;
			case 51: $talk = "Nereid"; break;
		}

		if (in_array($talk, $talk_array)){} else { array_push($talk_array, $talk); $amount = $amount - 1; }

	endwhile;

	$talk_count = count($talk_array);
	$comma_use = $talk_count;
	$s = 0;
	while ($talk_count > 0) :
		if ($talk_count > 1){$speech = $speech . $talk_array[$s] . ", ";} else {$speech = $speech . "&amp; " . $talk_array[$s] . ", ";} 
		$s = $s + 1;
		$talk_count = $talk_count - 1;
	endwhile;

	$speech = "Languages Known: " . substr(strtolower($speech), 0, -2);
	if ( $comma_use == 2 ){ $speech = str_replace(", &amp;", " &amp;", $speech); }
	if ( $comma_use == 1 ){ $speech = str_replace(",", "", $speech); $speech = str_replace("&amp;", "", $speech); }

	/////////////////////////////////////////////////////

	$detect_array = array();
	$amount = $sword_detect_powers;
	$max = 100; 

	while ($amount > 0) :

		$catchd = $catchd + 1;

		$dtc_dice = mt_rand(1,$max);

		switch ($dtc_dice)
		{
			case $dtc_dice >= 1 and $dtc_dice <= 6: $detection = "Detect Evil 10` Range"; break;
			case $dtc_dice >= 7 and $dtc_dice <= 11: $detection = "Detect Good 10` Range"; break;
			case $dtc_dice >= 12 and $dtc_dice <= 22: $detection = "Detect Gold or Silver 20` Range"; break;
			case $dtc_dice >= 23 and $dtc_dice <= 33: $detection = "Detect Shifting Rooms or Walls 10` Range"; break;
			case $dtc_dice >= 34 and $dtc_dice <= 44: $detection = "Detect Sloping Passages 10` Range"; break;
			case $dtc_dice >= 45 and $dtc_dice <= 55: $detection = "Detect Traps 10` Range"; break;
			case $dtc_dice >= 56 and $dtc_dice <= 66: $detection = "Detect Gems (amount and type) 5`"; break;
			case $dtc_dice >= 67 and $dtc_dice <= 77: $detection = "Detect Magic 10` Range"; break;
			case $dtc_dice >= 78 and $dtc_dice <= 82: $detection = "Detect Secret Doors 5` Range"; break;
			case $dtc_dice >= 83 and $dtc_dice <= 87: $detection = "Detect Invisible 10` Range"; break;
			case $dtc_dice >= 88 and $dtc_dice <= 92: $detection = "Locate Object 120` Range"; break;
			case $dtc_dice >= 93 and $dtc_dice <= 98: $amount = $amount + 2; $max = 92; break;
			case $dtc_dice >= 99: $sword_spells = $sword_spells + 1; $max = 92; break;
		}

		if ($dtc_dice <= 92){if (in_array($detection, $detect_array)){} else { array_push($detect_array, $detection); $amount = $amount - 1; } }
		if ($catchd > 100){$amount = 0;}

	endwhile;

	$detect_count = count($detect_array);
	$comma_use = $detect_count;
	$s = 0;
	while ($detect_count > 0) :
		if ($detect_count > 1){$detects = $detects . $detect_array[$s] . ", ";} else {$detects = $detects . "&amp; " . $detect_array[$s] . ", ";} 
		$s = $s + 1;
		$detect_count = $detect_count - 1;
	endwhile;

	$detects = "Minor Powers: " . substr(strtolower($detects), 0, -2);
	if ( $comma_use == 2 ){ $detects = str_replace(", &amp;", " &amp;", $detects); }
	if ( $comma_use == 1 ){ $detects = str_replace(",", "", $detects); $detects = str_replace("&amp;", "", $detects); }

	/////////////////////////////////////////////////////

	$magic_array = array();
	$amount = $sword_spells;
	$swmotv = 0;

	if ($sword_spells > 0)
	{
		while ($amount > 0) :

			$catchs = $catchs + 1;

			$mag_dice = mt_rand(1,95);

			switch ($mag_dice)
			{
				case $mag_dice >= 1 and $mag_dice <= 7: $magicion = "charm person on contact for three times per day"; break;
				case $mag_dice >= 8 and $mag_dice <= 15: $magicion = "clairaudience 30` range for 1 round and three times per day"; break;
				case $mag_dice >= 16 and $mag_dice <= 22: $magicion = "clairvoyance 30` range for 1 round and three times per day"; break;
				case $mag_dice >= 23 and $mag_dice <= 28: $magicion = "determine direction and depth three times per day"; break;
				case $mag_dice >= 29 and $mag_dice <= 34: $magicion = "ESP 30` range for 1 round and three times per day"; break;
				case $mag_dice >= 35 and $mag_dice <= 41: $magicion = "flying for 1 hour per day and 120` move"; break;
				case $mag_dice >= 42 and $mag_dice <= 47: $magicion = "heal once per day"; break;
				case $mag_dice >= 48 and $mag_dice <= 54: $magicion = "illusion as per the wand of illusions for twice per day"; break;
				case $mag_dice >= 55 and $mag_dice <= 61: $magicion = "levitate up to 600 lbs for 1 turn and three times per day"; break;
				case $mag_dice >= 62 and $mag_dice <= 67: $magicion = "strength as the spell for once per day on wielder only"; break;
				case $mag_dice >= 68 and $mag_dice <= 75: $magicion = "telekinesis up to 250 lbs for 1 round and once per day"; break;
				case $mag_dice >= 76 and $mag_dice <= 81: $magicion = "telepathy 60` range for twice per day"; break;
				case $mag_dice >= 82 and $mag_dice <= 88: $magicion = "teleport as the spell for 600 lbs max and once per day"; break;
				case $mag_dice >= 89 and $mag_dice <= 94: $magicion = "x-ray vision 40` range for 1 turn and twice per day"; break;
				case $mag_dice >= 95: $swmotv = mt_rand($lgn,100); $ego = $ego + 6; break;
			}

			if ($mag_dice <= 94){if (in_array($magicion, $magic_array)){} else { array_push($magic_array, $magicion); $amount = $amount - 1; }}
			if ($catchs > 100){$amount = 0;}

		endwhile;

		$magic_count = count($magic_array);
		$comma_use = $magic_count;
		$s = 0;
		while ($magic_count > 0) :
			if ($magic_count > 1)
			{
				$magics = $magics . $magic_array[$s] . ", ";
			}
			else
			{
				$magics = $magics . "&amp; " . $magic_array[$s] . ", ";
			}
			$s = $s + 1;
			$magic_count = $magic_count - 1;
		endwhile;

		$magics = "Major Powers: " . substr(strtolower($magics), 0, -2);
		if ( $comma_use == 2 ){ $magics = str_replace(", &amp;", " &amp;", $magics); }
		if ( $comma_use == 1 ){ $magics = str_replace(",", "", $magics); $magics = str_replace("&amp;", "", $magics); }
		$magics = $magics . ".";
	}

	/////////////////////////////////////////////////////

	if ($swmotv > 0)
	{
		switch ($swmotv)
		{	
			case $swmotv >= 1 and $swmotv <= 20: $sword_motivation = " It has a special purpose to defeat those that are " . $hate . "."; break;
			case $swmotv >= 21 and $swmotv <= 30: $sword_motivation = " It has a special purpose to defeat those that are " . $despise . "."; break;
			case $swmotv >= 31 and $swmotv <= 40: $sword_motivation = " It has a special purpose to slay druids/clerics."; break;
			case $swmotv >= 41 and $swmotv <= 50: $sword_motivation = " It has a special purpose to slay fighters/paladins/rangers."; break;
			case $swmotv >= 51 and $swmotv <= 60: $sword_motivation = " It has a special purpose to slay magic-users/illusionists."; break;
			case $swmotv >= 61 and $swmotv <= 90: $sword_motivation = " It has a special purpose to slay non-human monsters."; break;
			case $swmotv >= 91 and $swmotv <= 100: $sword_motivation = " It has a special purpose to slay thieves/assassins."; break;
		}
		$badness = mt_rand(1,100);
		if ($badness >= 91){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause slowness for 2d6 rounds."; }
		else if ($badness >= 82){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause silence for 1d4 rounds."; }
		else if ($badness >= 81){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause petrifaction."; }
		else if ($badness >= 66){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause paralysis for 1d4 rounds."; }
		else if ($badness >= 56){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause insanity for 1d4 rounds."; }
		else if ($badness >= 36){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause fear for 1d4 rounds."; }
		else if ($badness >= 31){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause magic to be dispelled on a single target."; }
		else if ($badness >= 26){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause disintegration."; }
		else if ($badness >= 16){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause confusion for 2d6 rounds."; }
		else if ($badness >= 11)
		{
			if ( $dmgp == 1 ){ $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause disease for 2d6 rounds."; }
			else { $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause sleep for 2d6 rounds."; }
		}
		else { $sword_motivation = $sword_motivation . " If it strikes such opponents, it will cause blindness for 2d6 rounds."; }
	}

	/////////////////////////////////////////////////////

	$item = $item . " [ This unusual sword has a " . $sword_int . " intelligence and communicates by " . $sword_communicate . ". " . $speech . ". It has a " . $sword_alignment . " alignment with an ego of " . $ego . ". " . $sword_motivation . " " . $detects . ". " . $magics . " ]";
}





else if ($game == "BD&D") //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	$swint = mt_rand(1,6);
	if ($swint == 1){$sword_int = 7; $sword_detect_powers = 1; $sword_spells = 0; $sword_communicate = "way of empathy";}
	else if ($swint == 2){$sword_int = 8; $sword_detect_powers = 2; $sword_spells = 0; $sword_communicate = "way of empathy";}
	else if ($swint == 3){$sword_int = 9; $sword_detect_powers = 3; $sword_spells = 0; $sword_communicate = "way of empathy";}
	else if ($swint == 4){$sword_int = 10; $sword_detect_powers = 3; $sword_spells = 0; $sword_communicate = "speaking";}
	else if ($swint == 5){$sword_int = 11; $sword_detect_powers = 3; $sword_spells = 0; $sword_communicate = "speaking and can read magic";}
	else {$sword_int = 12; $sword_detect_powers = 3; $sword_spells = 1; $sword_communicate = "speaking and can read magic";}

	/////////////////////////////////////////////////////

	$swlang = mt_rand(1,20);
	if ($swlang >= 20){$sword_languages = mt_rand(1,5) + mt_rand(1,5);}
	else if ($swlang >= 19){$sword_languages = 5;}
	else if ($swlang >= 18){$sword_languages = 4;}
	else if ($swlang >= 15){$sword_languages = 3;}
	else if ($swlang >= 11){$sword_languages = 2;}
	else {$sword_languages = 1;}

	/////////////////////////////////////////////////////

	$swalng = mt_rand(1,100);
	if ($swalng >= 31){$sword_alignment = "lawful";}
	else if ($swalng >= 11){$sword_alignment = "neutral";}
	else {$sword_alignment = "chaotic";}

	$sword_psyche = mt_rand(1,12);
	$sword_willpower = $sword_psyche + $sword_int + $sword_spells;

	/////////////////////////////////////////////////////

	$swmotv = mt_rand(1,6);
	if ($swmotv == 1){$sword_motivation = "Purpose is to Slay Clerics";}
	else if ($swmotv == 2){$sword_motivation = "Purpose is to Slay Dwarves, Fighters, & Halflings";}
	else if ($swmotv == 3){$sword_motivation = "Purpose is to Slay Elves & Magic-Users";}
	else if ($swmotv == 4)
	{
		if ($sword_alignment == "lawful"){$sword_motivation = "Purpose is to Slay Chaotic Beings";}
		else if ($sword_alignment == "chaotic"){$sword_motivation = "Purpose is to Slay Lawful Beings";}	
		else {$swmotv = 5;}
	}
	if ($swmotv == 5)
	{
		$swkills = mt_rand(1,13);
		if ($swkills == 1){$sword_motivation = "Purpose is to Slay Lycanthropes";}
		else if ($swkills == 2){$sword_motivation = "Purpose is to Slay Spell Casters";}
		else if ($swkills == 3){$sword_motivation = "Purpose is to Slay Undead";}
		else if ($swkills == 4){$sword_motivation = "Purpose is to Slay Dragons";}
		else if ($swkills == 5){$sword_motivation = "Purpose is to Slay Regenerating Monsters";}
		else if ($swkills == 6){$sword_motivation = "Purpose is to Slay Magical Monsters";}
		else if ($swkills == 7){$sword_motivation = "Purpose is to Slay Reptiles";}
		else if ($swkills == 8){$sword_motivation = "Purpose is to Slay Elementals";}
		else if ($swkills == 9){$sword_motivation = "Purpose is to Slay Golems";}
		else if ($swkills == 10){$sword_motivation = "Purpose is to Slay Sea Creatures";}
		else if ($swkills == 11){$sword_motivation = "Purpose is to Slay Avians";}
		else if ($swkills == 12){$sword_motivation = "Purpose is to Slay Humanoid Monsters";}
		else {$sword_motivation = "Purpose is to Slay Spiders";}
	}
	if (mt_rand(1,100) > 5){$sword_motivation = "";}
	else
	{
		$sword_motivation = " Its " . strtolower($sword_motivation) . " ";
		if ($sword_alignment == "lawful"){$sword_motivation = $sword_motivation . " and it will paralyze these beings if they are chaotic...upon a hit unless the victim saves vs spells.";}
		else if ($sword_alignment == "chaotic"){$sword_motivation = $sword_motivation . " and it will turn to stone these beings if they are chaotic...unless the victim saves vs spells.";}
		else {$sword_motivation = $sword_motivation . " and it will give +1 to the wielder`s saving throws, but only when attacking these types of beings.";}
	}

	/////////////////////////////////////////////////////

	$talk_array = array();
	array_push($talk_array, "Common");
	$amount = $sword_languages - 1;

	while ($amount > 0) :

		switch (mt_rand(1,30))
		{
			case 1: $talk = "Bugbear"; break;
			case 2: $talk = "Centaur"; break;
			case 3: $talk = "Cyclops"; break;
			case 4: $talk = "Doppleganger"; break;
			case 5: $talk = "Dragon"; break;
			case 6: $talk = "Dryad"; break;
			case 7: $talk = "Dwarf"; break;
			case 8: $talk = "Elf"; break;
			case 9: $talk = "Gargoyle"; break;
			case 10: $talk = "Giant"; break;
			case 11: $talk = "Gnoll"; break;
			case 12: $talk = "Gnome"; break;
			case 13: $talk = "Goblin"; break;
			case 14: $talk = "Halfling"; break;
			case 15: $talk = "Harpy"; break;
			case 16: $talk = "Hobgoblin"; break;
			case 17: $talk = "Kobold"; break;
			case 18: $talk = "Lizard Man"; break;
			case 19: $talk = "Medusa"; break;
			case 20: $talk = "Merman"; break;
			case 21: $talk = "Minotaur"; break;
			case 22: $talk = "Neanderthal"; break;
			case 23: $talk = "Nixie"; break;
			case 24: $talk = "Ogre"; break;
			case 25: $talk = "Orc"; break;
			case 26: $talk = "Pixie"; break;
			case 27: $talk = "Sprite"; break;
			case 28: $talk = "Treant"; break;
			case 29: $talk = "Troglodyte"; break;
			case 30: $talk = "Troll"; break;
		}

		if (in_array($talk, $talk_array)){} else { array_push($talk_array, $talk); $amount = $amount - 1; }

	endwhile;

	$talk_count = count($talk_array);
	$comma_use = $talk_count;
	$s = 0;
	while ($talk_count > 0) :
		if ($talk_count > 1){$speech = $speech . $talk_array[$s] . ", ";} else {$speech = $speech . "&amp; " . $talk_array[$s] . ", ";} 
		$s = $s + 1;
		$talk_count = $talk_count - 1;
	endwhile;

	$speech = "Languages Known: " . substr(strtolower($speech), 0, -2);
	if ( $comma_use == 2 ){ $speech = str_replace(", &amp;", " &amp;", $speech); }
	if ( $comma_use == 1 ){ $speech = str_replace(",", "", $speech); $speech = str_replace("&amp;", "", $speech); }

	/////////////////////////////////////////////////////

	$detect_array = array();
	$amount = $sword_detect_powers;
	$max = 100;

	while ($amount > 0) :

		$catchd = $catchd + 1;

		$dtc_dice = mt_rand(1,$max);

		switch ($dtc_dice)
		{
			case $dtc_dice >= 1 and $dtc_dice <= 15: $detection = "Detect Shifting Walls and Rooms"; break;
			case $dtc_dice >= 16 and $dtc_dice <= 30: $detection = "Detect Sloping Passages"; break;
			case $dtc_dice >= 31 and $dtc_dice <= 40: $detection = "Find Secret Doors"; break;
			case $dtc_dice >= 41 and $dtc_dice <= 50: $detection = "Find Traps"; break;
			case $dtc_dice >= 51 and $dtc_dice <= 60: $detection = "See Invisible Objects"; break;
			case $dtc_dice >= 61 and $dtc_dice <= 65: $detection = "Detect Evil"; break;
			case $dtc_dice >= 66 and $dtc_dice <= 70: $detection = "Detect Good"; break;
			case $dtc_dice >= 71 and $dtc_dice <= 80: $detection = "Detect Metal"; break;
			case $dtc_dice >= 81 and $dtc_dice <= 90: $detection = "Detect Magic"; break;
			case $dtc_dice >= 91 and $dtc_dice <= 95: $detection = "Detect Gems"; break;
			case $dtc_dice >= 96 and $dtc_dice <= 99: $sword_spells = $sword_spells + 1; break;
			case $dtc_dice >= 100: $amount = $amount + 2; $max = 95; break;
		}

		if ($dtc_dice <= 95){if (in_array($detection, $detect_array)){} else { array_push($detect_array, $detection); $amount = $amount - 1; }}
		if ($catchd > 100){$amount = 0;}

	endwhile;

	$detect_count = count($detect_array);
	$comma_use = $detect_count;
	$s = 0;
	while ($detect_count > 0) :
		if ($detect_count > 1){$detects = $detects . $detect_array[$s] . ", ";} else {$detects = $detects . "&amp; " . $detect_array[$s] . ", ";} 
		$s = $s + 1;
		$detect_count = $detect_count - 1;
	endwhile;

	$detects = "Primary Powers: " . substr(strtolower($detects), 0, -2);
	if ( $comma_use == 2 ){ $detects = str_replace(", &amp;", " &amp;", $detects); }
	if ( $comma_use == 1 ){ $detects = str_replace(",", "", $detects); $detects = str_replace("&amp;", "", $detects); }

	/////////////////////////////////////////////////////

	$magic_array = array();
	$amount = $sword_spells;
	$max = 100;

	if ($sword_spells > 0)
	{
		while ($amount > 0) :

			$catchs = $catchs + 1;

			$mag_dice = mt_rand(1,$max);

			switch ($mag_dice)
			{
				case $mag_dice >= 1 and $mag_dice <= 10: $magicion = "Clairaudience"; break;
				case $mag_dice >= 11 and $mag_dice <= 20: $magicion = "Clairvoyance"; break;
				case $mag_dice >= 21 and $mag_dice <= 25: $magicion = "Extra Damage"; $sword_damage = $sword_damage + 2; break;
				case $mag_dice >= 26 and $mag_dice <= 35: $magicion = "ESP"; break;
				case $mag_dice >= 36 and $mag_dice <= 40: $magicion = "Flying"; break;
				case $mag_dice >= 41 and $mag_dice <= 45: $magicion = "Healing 1 Hit Point per Round"; $sword_regen = $sword_regen + 6; break;
				case $mag_dice >= 46 and $mag_dice <= 50: $magicion = "Levitation for 3 turns"; break;
				case $mag_dice >= 51 and $mag_dice <= 57: $magicion = "Illusion"; break;
				case $mag_dice >= 58 and $mag_dice <= 67: $magicion = "Telekinesis"; break;
				case $mag_dice >= 68 and $mag_dice <= 77: $magicion = "Telepathy"; break;
				case $mag_dice >= 78 and $mag_dice <= 86: $magicion = "Teleportation"; break;
				case $mag_dice >= 87 and $mag_dice <= 96: $magicion = "X-Ray Vision"; break;
				case $mag_dice >= 97 and $mag_dice <= 99: $amount = $amount + 2; $max = 95; break;
				case $mag_dice >= 100: $amount = $amount + 3; $max = 96; break;
			}

			if ($mag_dice <= 96){if (in_array($magicion, $magic_array)){} else { array_push($magic_array, $magicion); $amount = $amount - 1; }}
			if ($catchs > 100){$amount = 0;}

		endwhile;

		$magic_count = count($magic_array);
		$comma_use = $magic_count;
		$s = 0;
		while ($magic_count > 0) :
			if ($magic_count > 1)
			{
				$magics = $magics . $magic_array[$s] . ", ";
			}
			else
			{
				$magics = $magics . "&amp; " . $magic_array[$s] . ", ";
			}
			if ($magic_array[$s] == "Extra Damage")
			{
				$magics = substr(strtolower($magics), 0, -2);
				$magics = $magics . " x" . $sword_damage . ", ";
			}
			else if ($magic_array[$s] == "Healing 1 Hit Point per Round")
			{
				$magics = substr(strtolower($magics), 0, -2);
				$magics = $magics . " at " . $sword_regen . " Hit Points per Day, ";
			}
			$s = $s + 1;
			$magic_count = $magic_count - 1;
		endwhile;

		$magics = "Extraordinary Powers: " . substr(strtolower($magics), 0, -2);
		if ( $comma_use == 2 ){ $magics = str_replace(", &amp;", " &amp;", $magics); }
		if ( $comma_use == 1 ){ $magics = str_replace(",", "", $magics); $magics = str_replace("&amp;", "", $magics); }
		$magics = $magics . ".";
	}

	/////////////////////////////////////////////////////

	$item = $magic_relic . " [ This intelligent sword has a " . $sword_int . " intelligence and communicates by " . $sword_communicate . ". " . $speech . ". It has a " . $sword_alignment . " alignment with an ego of " . $sword_psyche . " and a will of " . $sword_willpower . ". " . $sword_motivation . " " . $detects . ". " . $magics . " ]";
}





else if ($game == "Swords & Wizardry")
{
	switch (mt_rand(1,20))
	{
		case 1: $power = " Flaming Sword "; break;
		case 2: $power = " Dancing Sword "; break;
		case 3: $power = " Allows the wielder to detect traps. "; break;
		case 4: $power = " Allows the wielder to see invisible objects. "; break;
		case 5: $power = " Allows the wielder to detect magic. "; break;
		case 6: $power = " Allows the wielder to do clairaudience. "; break;
		case 7: $power = " Allows the wielder to fly. "; break;
		case 8: $power = " Allows the wielder to levitate. "; break;
		case 9: $power = " Allows the wielder to heal 1d6 hit points per day. "; break;
		case 10: $power = " Gives the wielder the abilities of a dwarf when drawn. "; break;
		case 11: $power = " Gives the wielder the abilities of an elf when drawn. "; break;
		case 12: $power = " Allows the wielder to confuse an enemy once per day. "; break;
		case 13: $power = " Allows the wielder to deflect arrows 25% of the time. "; break;
		case 14: $power = " Will wake a sleeping owner when danger is near. "; break;
		case 15: $power = " The sword detects the presence of ";
			$warns = mt_rand(1,13);
			if ($warns == 1){$power = $power . "lycanthropes ";}
			else if ($warns == 2){$power = $power . "spell casters ";}
			else if ($warns == 3){$power = $power . "undead ";}
			else if ($warns == 4){$power = $power . "dragons ";}
			else if ($warns == 5){$power = $power . "regenerating monsters ";}
			else if ($warns == 6){$power = $power . "magical monsters ";}
			else if ($warns == 7){$power = $power . "reptiles ";}
			else if ($warns == 8){$power = $power . "elementals ";}
			else if ($warns == 9){$power = $power . "golems ";}
			else if ($warns == 10){$power = $power . "sea creatures ";}
			else if ($warns == 11){$power = $power . "avians ";}
			else if ($warns == 12){$power = $power . "humanoid monsters ";}
			else {$power = $power . "spiders ";}
			break;
		case 16:
			if (mt_rand(1,2) == 1){$power = " Allows the wielder to detect lawful alignments within 20`. ";}
			else {$power = " Allows the wielder to detect chaotic alignments within 20`. ";}
			break;
		case 17: $power = " Allows the wielder to disguise themselves with illusion. "; break;
		case 18: $power = " Allows the wielder to detect cursed items 50% of the time. "; break;
		case 19: $power = " Allows the wielder to walk through 20` of solid rock twice per day. "; break;
		case 20: $power = " Allows the wielder to be immune to level-draining effects. "; break;
	}

	switch (mt_rand(1,20))
	{
		case 1: $brains = " Has an intelligence of " . mt_rand(3,18) . " and communicates with the wielder through telepathy. "; break;
		case 2: $brains = " Has an intelligence of " . mt_rand(3,18) . " and communicates with anyone through telepathy within 10`. "; break;
		case 3: $brains = " Has an intelligence of " . mt_rand(3,18) . " and communicates with the wielder through telepathy, but can also speak aloud. "; break;
		case 4: $brains = " Has an intelligence of " . mt_rand(3,18) . " and communicates with anyone through telepathy, but can also speak aloud. "; break;
	}

	/////////////////////////////////////////////////////

	$item = $item . " +" . mt_rand(1,4) . " [ " . $brains . $power . " ]";
}





$item = str_replace("  ", " ", $item);
$item = str_replace("[ ", "[&nbsp;", $item);
$item = str_replace(" ]", "&nbsp;]", $item);

$magic_relic = $item;

}
?>
