<?php

function mapMaker($level,$game)
{
	if (mt_rand(1,20) < 5){ if (mt_rand(1,100) < 50){$faked = "[<i>False Map</i>] ";} else {$faked = "[<i>Treasure Was Already Looted</i>] ";} } else { $faked = ""; }

	// GET THE TYPE OF MAP //
	$types = "0_I_II_III_IV_V_VI_VII_VIII_IX_X_XI_XII_XIII_XIV_XV_XVI_XVII_XVIII_XIX_XX";
	$typem = explode("_", $types);
	$type = $typem[$level];

	// WHAT IS IT MADE OUT OF //
	$paper = mt_rand(1,20);
	if ($level == 998 || $level == 997){$paper = 10;}
	if ($paper < 2){
		$metal = mt_rand(1,5);
		if ($level == 999){$metal = mt_rand(2,5);}
		if ($metal == 1){$iron = "shield";}
		else if ($metal == 2){$iron = "helm";}
		else if ($metal == 3){$iron = "axe";}
		else if ($metal == 4){$iron = "breastplate";}
		else {$iron = "sword";}

		$ona = "a metal " . $iron . ", with etchings";
	}
	else if ($paper < 3){$ona = "made of leather, with burned markings";}
	else if ($paper < 4){$ona = "a stone tablet, with carvings";}
	else if ($paper < 5){$ona = "an amulet, with etchings";}
	else if ($paper < 6){$ona = "a book with notes and sketches";}
	else if ($paper < 7){$ona = "inside a clay bowl, with paintings";}
	else if ($paper < 8){$ona = "made of cloth, with stitching";}
	else if ($paper < 9){$ona = "made of tree bark, with carvings";}
	else {$ona = "made of parchment, with drawings";}
		$ona = "The map is " . $ona . " of the treasure's surrounding area.&nbsp;";

	// WHAT IS IT WRITTEN IN /////////////////////////////////////////////////////////////////////////////////////////////////////////
	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
	{
		
		if ($level > 20){$tt_level = mt_rand(1,20);} else {$tt_level = $level;}
		$write = mt_rand(1,15);
		if ($write < 2){$written = "It is written in the thieves' code, so only a rogue will be able to read the map.";}
		else if ($write < 3){$written = "It is written with magical symbols, so only a wizard will be able to read the map.";}
		else if ($write < 4){$written = "The words only appear magically scattered every few seconds, requiring an " . TTSaves($tt_level+4,$game) . " vs. " . abilityTranslate($game,INT) . " to read the map.";}
		else if ($write < 5){$written = "It is written with religious symbols, so only a priest will be able to read the map.";}
		else if ($write < 6){$written = "It is written in " . languageType($game) . ", and only those that speak the language will be able to read the map.";}
		else if ($write < 7){$written = "It is written backwards, requiring a mirror to read the map.";}
		else if ($write < 8){$written = "It is written in some strange code, requiring an " . TTSaves($tt_level,$game) . " vs. " . abilityTranslate($game,INT) . " to read the map.";}
		else if ($write < 9){$written = "It is written in the form of a riddle, requiring an " . TTSaves(($tt_level+5),$game) . " vs. " . abilityTranslate($game,INT) . " to read the map.";}
		else {$written = "";}
	}
	else if ($game == "Swords & Six-Siders")
	{
		$write = mt_rand(1,15);
		if ($write < 2){$written = "It is written in the thieves' code, so only a thief will be able to read the map.";}
		else if ($write < 3){$written = "It is written with magical symbols, so only a wizard will be able to read the map.";}
		else if ($write < 4){$written = "The words only appear magically scattered every few seconds, requiring a " . mt_rand(3,6) . " intelligence to read the map.";}
		else if ($write < 5){$written = "It is written with religious symbols, so only a wizard or myrmidon will be able to read the map.";}
		else if ($write < 6){$written = "It is written in " . languageType($game) . ", and only those that speak the language will be able to read the map.";}
		else if ($write < 7){$written = "It is written backwards, requiring a mirror to read the map.";}
		else if ($write < 8){$written = "It is written in some strange code, requiring a " . mt_rand(3,6) . " intelligence to read the map.";}
		else if ($write < 9){$written = "It is written in the form of a riddle, requiring a " . mt_rand(3,6) . " wisdom to read the map.";}
		else {$written = "";}
	}
	else
	{
		$write = mt_rand(1,15);
		if ($write < 2){$written = "It is written in the thieves' code, so only a thief or assassin will be able to read the map.";}
		else if ($write < 3){$written = "It is written with magical symbols, so only a mage or illusionist (or maybe those with a Read Languages skill) will be able to read the map.";}
		else if ($write < 4){$written = "It is written with druidic symbols so only a druid or ranger (or maybe those with a Read Languages skill) will be able to read the map.";}
		else if ($write < 5)
		{
			if (($game == "OSRIC") || ($game == "AD&D") || ($game == "BD&D") || ($game == "BFRPG") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry"))
			{
				$written = "It is written with religious symbols, so only a cleric or paladin (or maybe those with a Read Languages skill) will be able to read the map.";
			}
			else
			{
				$written = "It is written with religious symbols, so only a priest or knight (or maybe those with a Read Languages skill) will be able to read the map.";
			}
		}
		else if ($write < 6){$written = "It is written in " . languageType($game) . ", and only those that speak the language will be able to read the map.";}
		else if ($write < 7){$written = "It is written backwards, requiring a mirror to read the map.";}
		else if ($write < 8)
		{
			if (($game == "OSRIC") || ($game == "AD&D") || ($game == "BD&D") || ($game == "BFRPG") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry"))
			{
				$written = "It is written in some strange code, requiring an intelligence of at least 17 to read the map.";
			}
			else
			{
				$written = "It is written in some strange code, requiring an intellect of at least 17 to read the map.";
			}
		}
		else if ($write < 9){$written = "It is written in some form of riddle, requiring a wisdom of at least 17 to read the map.";}
		else {$written = "";}
	}
	// BUILD THE STORY BEHIND IT //
	$owner = genericName();
	$prefix = adjName();
	$job = jobName();

	$fate = mt_rand(1,4);
	if ($fate == 1){$fates = "died";}
	else if ($fate == 2){$fates = "disappeared";}
	else if ($fate == 3){$fates = "lived";}
	else {$fates = "vanished";}


	$story = "This is a map to the " . strtolower($prefix) . " treasure of " . $owner . " the " . ucfirst($job) . ".  Known to have " . $fates . " about " . mt_rand(5,90) . "0 years ago, their treasure is shown to be in an area just " . (mt_rand(1,100)*5) . " miles from here.&nbsp;";


	if (mt_rand(1,100) > 30)
	{
		$legend = mt_rand(1,6);
		if ($legend == 1){$legends = "Legends";}
		else if ($legend == 2){$legends = "Stories";}
		else if ($legend == 3){$legends = "Rumors";}
		else if ($legend == 4){$legends = "Tales";}
		else if ($legend == 5){$legends = "Myths";}
		else {$legends = "Fables";}

		if (mt_rand(1,100) > 50)
		{
			$victim = mt_rand(1,100);

			if ($victim < 10)
			{
				$class3 = "Demon";
				$gender = demonName();
			}
			else if ($victim < 20)
			{
				$class3 = "Dragon";
				$gender = dragonName();
			}
			else
			{
				if (mt_rand(1,100) > 50)
				{
					$gender = humanFemaleName();
					$class = classFemaleName();
				}
				else
				{
					$gender = humanMaleName();
					$class = classMaleName();
				}

				$class1 = explode("_", $class);
				$class2 = count($class1);
				$class3 = $class1[mt_rand(1,$class2)];
			}

			if ($class3 == ""){$class3 = "Merchant";}

			$legends = $legends . " tell of " . $owner . " stealing this treasure from a " . $class3 . " known as " . $gender . ".&nbsp;";
		}
		else
		{
			$deed = mt_rand(1,5);
			if ($deed == 1){$deeds = "riches";}
			else if ($deed == 2){$deeds = "deeds";}
			else if ($deed == 3){$deeds = "adventures";}
			else if ($deed == 4){$deeds = "exploits";}
			else {$deeds = "treasure";}

			$legends = $legends . " tell of " . $owner . " and their " . $deeds . ".&nbsp;";
		}
	}
	else {$legends = "";}

	// WHERE IS THE TREASURE //
	$haunt = mt_rand(1,6);
	if ($haunt == 1){$haunts = "an ancient";}
	else if ($haunt == 2){$haunts = "a haunted";}
	else if ($haunt == 3){$haunts = "a crumbling";}
	else if ($haunt == 4){$haunts = "a mysterious";}
	else if ($haunt == 5){$haunts = "a cursed";}
	else {$haunts = "an abandoned";}

	$domain = mt_rand(1,12);
	if ($domain == 1){$domains = "an outdoor area";}
	else if ($domain == 2){$domains = "a dungeon";}
	else if ($domain == 3){$domains = "a cave";}
	else if ($domain == 4){$domains = $haunts . " ruins";}
	else if ($domain == 5){$domains = $haunts . " temple";}
	else if ($domain == 6){$domains = $haunts . " castle";}
	else if ($domain == 7){$domains = "a graveyard";}
	else if ($domain == 8){$domains = "a crypt";}
	else if ($domain == 9){$domains = "a tomb";}
	else if ($domain == 10){$domains = "a chest at the bottom of the nearest lake";}
	else if ($domain == 11){$domains = "a chest at the bottom of the widest part of the nearest river";}
	else {$domains = "sunken ship about " . mt_rand(1,9) . "00 feet off of the nearest sea shore";}

	$dug = mt_rand(1,4);
	if ($dug == 1){$dugs = "hidden";}
	else if ($dug == 2){$dugs = "buried";}
	else if ($dug == 3){$dugs = "left";}
	else {$dugs = "put";}

	$where = "The map reads that " . $owner . " had " . $dugs . " this treasure in " . $domains;

	if (mt_rand(1,100) > 50)
	{
		if (($level > 20) || ($level < 1)){$hit_dice = mt_rand(5,15);} else {$hit_dice = $level;}
		$monster = mt_rand(1,3);
		if ($monster == 1){$monsters = ", hexed by a magical spell.&nbsp;";}
		else if ($monster == 2)
		{
			if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
			{
				$my_mr_is = $tt_level * 10;
				$my_dc_is = (FLOOR($my_mr_is/10)+1) . "&nbsp;+&nbsp;" . (CEIL($my_mr_is/2));
				$monsters = ", guarded by a creature (MR " . $my_mr_is . " with " . $my_dc_is . " DICE).&nbsp;";
			}
			else if ($game == "Swords & Six-Siders")
			{
				$sx_level = mt_rand(3,6);
					if ( $sx_level > 5 && mt_rand(1,4)==1 ){ $sx_level = $sx_level . "+"; }
				$monsters = ", guarded by a powerful beast (M" . $sx_level . " Creature).&nbsp;";
			}
			else {$monsters = ", guarded by a powerful beast (" . $hit_dice . "HD Creature).&nbsp;";}
		}
		else {$monsters = ", protected by a lethal trap.&nbsp;";}
	}
	else {$monsters = ".&nbsp;";}

	if (($level == 998) || ($level == 999))
	{
		$map = "<u>TREASURE MAP&nbsp;- " . $faked . " " . $ona . " " . $written . " " . $story . " " . $legends . " " . $where . "" . $monsters;
		$map = substr($map, 0, -6) . "</u>";
	}
	else if ($level == 997)
	{
		$map = "Treasure Map&nbsp;[" . $faked . " " . $ona . " " . $written . " " . $story . " " . $legends . " " . $where . "" . $monsters;
		$map = substr($map, 0, -6) . "]";
	}
	else
	{
		$map = "<p style='margin-top: 0; margin-bottom: 0'><font size='2'><b>Treasure Map</b> [ Type " . $type . " ] " . $faked . "- " . $ona . " " . $written . " " . $story . " " . $legends . " " . $where . "" . $monsters . " " . $owner . " was known to have had:&nbsp;";
	}

return $map;

}

?>