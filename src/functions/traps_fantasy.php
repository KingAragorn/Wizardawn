<?php

function trapMaker($level,$type,$game,$extra,$undead)
{
	if ($level > 0){$level = mt_rand(1,$level);} else {$level = mt_rand(1,20);}

	if ( ($type != "box") && ($type != "idol") ){$trap_max = 50;} else {$trap_max = 48;}

	/// PIT DEPTHS ///
	if ($level > 18){$pit_depth = mt_rand(91,100); $pit_damage = "25d6";}
	else if ($level > 16){$pit_depth = mt_rand(81,90); $pit_damage = "19d6";}
	else if ($level > 14){$pit_depth = mt_rand(71,80); $pit_damage = "14d6";}
	else if ($level > 12){$pit_depth = mt_rand(61,70); $pit_damage = "10d6";}
	else if ($level > 10){$pit_depth = mt_rand(51,60); $pit_damage = "7d6";}
	else if ($level > 8){$pit_depth = mt_rand(41,50); $pit_damage = "5d6";}
	else if ($level > 6){$pit_depth = mt_rand(31,40); $pit_damage = "4d6";}
	else if ($level > 4){$pit_depth = mt_rand(21,30); $pit_damage = "3d6";}
	else if ($level > 2){$pit_depth = mt_rand(11,20); $pit_damage = "2d6";}
	else {$pit_depth = 10; $pit_damage = "1d6";}

	if ($type == "box")
	{
		$t_where = "come out of the container";
		$t_who = "the opener";
		$t_pit = "in front of the container";
		$t_first = "whoever opens the container";
		$t_close = "container";
		$t_noise = "from the container";
	}
	else if ($type == "item")
	{
		$t_where = "come out near the item";
		$t_who = "the one touching it";
		$t_pit = "in front of the item";
		$t_first = "whoever touches the item";
		$t_close = "item";
		$t_noise = "from the item";
	}
	else if ($type == "idol")
	{
		$t_where = "come out of it";
		$t_who = "the toucher";
		$t_pit = "in front of it";
		$t_first = "whoever touches it";
		$t_close = "thing";
		$t_noise = "from the idol";
	}
	else
	{
		$t_where = "fill the area";
		$t_who = "anyone inside";
		$t_pit = "in the area";
		$t_first = "whoever first enters the area";
		$t_close = "central spot of the area";
		$t_noise = "from the area";
	}

	switch (mt_rand(0,4))
	{
		case 0:	$piles = "trash";	break;
		case 1:	$piles = "straw";	break;
		case 2:	$piles = "dirt";	break;
		case 3:	$piles = "refuse";	break;
		case 4:	$piles = "hay";		break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$noise = "magical noise";			break;
		case 1:	$noise = "ringing bell noise";		break;
		case 2:	$noise = "screeching metal noise";	break;
		case 3:	$noise = "air horn noise";			break;
	}
	switch (mt_rand(0,4))
	{
		case 0:	$place = "just outside the adventuring area";								break;
		case 1:	$place = "to a random location in the adventuring area";					break;
		case 2:	$place = "about " . mt_rand(2,10) . " miles away in a random direction";	break;
		case 3:	$place = "about " . number_format(mt_rand(10,100)*10) . " feet away from the adventuring area";		break;
		case 4:	$place = "to the nearest confined area";									break;
	}

	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")) ////////////////////////////////////////////////////////////////
	{
		$monster_mr = $level * 15;

		if (mt_rand(1,100) > 50)
		{
			$death0 = "die";
			$death1 = "be decapitated"; if (mt_rand(1,100) > 50){$death1 = "be sliced clean in half";}
			$death2 = "be turned into a statue of solid " . statueMake(); if (mt_rand(1,100) > 70){$death2 = "be turned into a statue of pure " . slimeColor() . " crystal";}
			$death3 = "be encased in a block of ice"; if (mt_rand(1,100) > 50){$death3 = "be frozen solid and then shatter to pieces";}
			$death4 = "be turned to ash"; if (mt_rand(1,100) > 50){$death4 = "be set ablaze and melt into a puddle of goo";}
			$death5 = "fall";
			$death6 = "cold";
			$death7 = "be instantly killed from being impaled";
		}
		else
		{
			$death0 = "suffer 1d6x" . (ceil($level/2)+1) . " damage";
			$death1 = $death0;
			$death2 = $death0 . " and become paralyzed for 1d6 hours";
			$death3 = $death0;
			$death4 = $death0;
			$death5 = "rise";
			$death6 = "heat";
			$death7 = $death0;
		}
		switch (mt_rand(0,6))
		{
			case 0:	$shrooms = "blindness for " . mt_rand(2,6) . " hours unless they can make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . "";	break;
			case 1:	$shrooms = "fear for " . mt_rand(2,6) . " hours unless they can make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . "";	break;
			case 2:	$shrooms = "hallucinations for " . mt_rand(2,6) . " hours unless they can make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . "";	break;
			case 3:	$shrooms = "the victim to slowly turn into fungus during the coarse of " . mt_rand(8,16) . " hours unless they can make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . ". If infected, they can be cured by magical means";	break;
			case 4:	$shrooms = "the victim to fall asleep for " . mt_rand(2,6) . " hours unless they can make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . "";	break;
			case 5:	$shrooms = "the victim to slowly have their skin turn into " . candleColor(1) . " scales over the coarse of " . mt_rand(8,16) . " hours unless they can make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . ". If infected, they can only be cured by magical means";	break;
			case 6:	$shrooms = "the victim to become so thirsty they will drink <u>any</u> form of liquid they come across unless they can make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . ". They do not physically need to consume the liquids, but they strongly think they do...attacking all of those who have liquids they will not freely give";	break;
		}
		switch (mt_rand(0,$trap_max))
		{
			case 0:	$trap = ucfirst(fogColor()) . " acidic gases " . $t_where . " causing 1d6+" . $level . " damage to " . $t_who . ".";	break;
			case 1:	$trap = ucfirst(fogColor()) . " poisonous gases " . $t_where . " where " . $t_who . " must make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . " or " . $death0 . ".";	break;
			case 2:	$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage.";	break;
			case 3:	$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep and layered in spikes. Anyone who falls in will take " . $pit_damage . "x" . mt_rand(2,4) . " damage.";	break;
			case 4:	$trap = "A spear comes out of the wall toward " . $t_first . " and does 1d6+" . $level . " damage...but a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . " will avoid it.";	break;
			case 5:	$trap = "The ceiling caves in and causes 1d6x" . (ceil($level/2)+1) . " damage to all inside.";	break;
			case 6:	$trap = "Poison needles shoot from a nearby wall where anyone " . $t_pit . " must make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . " or " . $death0 . ".";	break;
			case 7:	$trap = "A scything blade comes from a nearby wall and will slice at " . $t_first . ". If they get hit, they will " . $death1 . "...but a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . " will avoid it.";	break;
			case 8:	$trap = "Darts fire from the wall at anyone " . $t_pit . ", causing 1d6+" . $level . " damage...but a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . " will avoid it.";	break;
			case 9:	$trap = "A portcullis or wall closes the exits to the area.";	break;
			case 10:$trap = "Arrows fire from the wall at anyone " . $t_pit . ", causing 1d6+" . $level . " damage...but a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . " will avoid it.";	break;
			case 11:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep and filled with lava. Anyone who falls in will be killed.";	break;
			case 12:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep and filled with deadly " . slimeColor() . " ooze. Anyone who falls in will be killed in about " . mt_rand(1,3) . "0 minutes...and be fully dissolved in another " . mt_rand(6,9) . "0 minutes.";	break;
			case 13:$trap = "A wall closes the exits to the area. Water then begins to fill the room.";	break;
			case 14:$trap = "A wall closes the exits to the area. The walls then begin to compact the area where they will crush all inside in about " . mt_rand(1,3) . "0 minutes.";	break;
			case 15:$trap = "A wall closes the exits to the area. The ceiling then begins to descend.";	break;
			case 16:$trap = "A magical beam of energy hits all " . $t_pit . " where they must make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . " or " . $death2 . ".";	break;
			case 17:$trap = "A magical beam of frost hits all " . $t_pit . " where they must make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . " or " . $death3 . ".";	break;
			case 18:$trap = "A magical beam of fire hits all " . $t_pit . " where they must make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . " or " . $death4 . "."; break;
			case 19:$trap = "A net wraps up all of those " . $t_pit . " and lifts them to the ceiling.";		break;
			case 20:$trap = "A wall closes the exits to the area. Oil then begins to fill the room for " . mt_rand(1,2) . "0 minutes (6 inches deep) where a fire source will then drop from the ceiling.";	break;
			case 21:$trap = "A polymorph spell hits " . $t_first . " where they turn into a " . polymorphType() . " for 1d6+" . $level . " hours unless they can make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . ".";	break;
			case 22:
					if ($type == "list"){$trap = "A nearby wall opens to reveal a monster.";}
					else {$trap = "A nearby wall opens to reveal a <u>" . randomMonster($level,1,$game,$extra,$undead) . "</u>.";}
				break;
			case 23:
					if ($type == "list"){$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage. If they survive, they then must face a monster.";}
					else {$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage. If they survive, they then must face a <u>" . randomMonster($level,1,$game,$extra,$undead) . "</u>.";}
				break;
			case 24:$trap = "An explosive spell that causes 1d6x" . (ceil($level/2)+1) . " damage to all of those close to the " . $t_close . ". They only take half damage if they make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . ".";		break;
			case 25:$trap = "An acid liquid that splashes " . $t_who . ", causing 1d6x" . ($level*2) . " damage. They must also make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . " or be blind for " . ($level+1) . " days.";		break;
			case 26:$trap = "A locked iron cage that falls from the ceiling and lands on all of those close to the " . $t_close . ".";	break;
			case 27:$trap = "Poisonous snakes drop on " . $t_who . " where they must make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . " from the bites or " . $death0 . ".";		break;
			case 28:$trap = "Poisonous insects " . $t_where . " where they must make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . " from the bites or " . $death0 . ".";		break;
			case 29:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage...where the opening then closes.";	break;
			case 30:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage...where the walls begin to compact where they will crush all inside in about " . mt_rand(1,3) . "0 minutes.";	break;
			case 31:$trap = "Magical " . fogColor() . " mists " . $t_where . " where " . $t_who . " must make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . " or their magic items become disenchanted.";	break;
			case 32:$trap = "The ceiling becomes highly magnetized, causing all metal objects to fly up to the ceiling...carrying metal armor wearing adventurers up as well.";	break;
			case 33:$trap = "A wall closes the exits to the area. The room then begins to " . $death5 . " in temperature for about " . mt_rand(2,6) . "0 minutes...where no one can survive the extreme " . $death6 . ".";	break;
			case 34:$trap = ucfirst(fogColor()) . " gases " . $t_where . " causing memory loss to " . $t_who . " for about " . mt_rand(2,4) . " hours...where " . abilityTranslate($game,WIZ) . " is also reduced to zero during that time.";	break;
			case 35:$trap = "Many columns of fire shoot up through the floor at all " . $t_pit . " where they must make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . " or " . $death4 . "."; break;
			case 36:$trap = ucfirst(fogColor()) . " gases " . $t_where . " that cause instant unconsciousness to " . $t_who . " for about " . mt_rand(4,10) . " hours...unless they can make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . ".";	break;
			case 37:$trap = ucfirst(fogColor()) . " gases fill the area. Any flame will ignite it causing all " . $t_pit . " to make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " or " . abilityTranslate($game,CON) . " from the explosion or " . $death4 . "."; break;
			case 38:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep (taking " . $pit_damage . " damage from the fall) and filled with some odd " . candleColor(0) . " mushrooms. Anyone who falls in will land on them, causing them to release " . fogColor() . " spores that cause " . $shrooms . ".";	break;
			case 39:$trap = "A very bright magical light flashes in the area...where everyone must make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . " or be blind for " . ($level+2) . " hours.";		break;
			case 40:$trap = "Spikes come out of the floor " . $t_pit . " that are roughly " . mt_rand(3,6) . " feet high and " . mt_rand(1,6) . " inches wide at the base...where " . $t_who . " must make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . " or " . $death7 . ".";	break;
			case 41:$trap = "Vines " . $t_where . " and tangle around " . $t_who . " and can only be removed when the vines suffer " . ($level+18) . " damage from automatic hits. They don't do damage to anyone, but wandering monster checks are made every round to see what the noise is.";	break;
			case 42:$trap = "Thorny vines " . $t_where . " and tangle around " . $t_who . " and can only be removed when the vines suffer " . ($level+12) . " damage from automatic hits.  Each round entangled, those caught suffer 1d6 damage per round. Wandering monster checks are made every round to see what the noise is.";	break;
			case 43:$trap = "A sticky substance is " . $t_pit . " and causes " . $t_who . " to be stuck and must make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,STR) . " to free themselves.";	break;
			case 44:
					if ($type == "list"){$trap = "A pit opens up " . $t_pit . " that drops " . $pit_depth . " feet before landing in water. Anyone who falls in will be in a large underground cave containing a water dwelling monster.";}
					else {$trap = "A pit opens up " . $t_pit . " that drops " . $pit_depth . " feet before landing in water. Anyone who falls in will be in a large underground cave containing a <u>" . randomMonster($level,2,$game,$extra,0) . "</u>.";}
				break;
			case 45:$trap = ucfirst(fogColor()) . " gases " . $t_where . " causing laughter to " . $t_who . " for about " . mt_rand(2,6) . " turns (unless they can make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . ")...where wandering encounter checks are made each turn the laughing continues.";	break;
			case 46:$trap = "A wall closes the exits to the area. Sand then begins to fill the room from above.";	break;
			case 47:$trap = "A loud " . $noise . " is made coming " . $t_noise . " that will continue for " . mt_rand(2,6) . " turns unless deactivated prior. Wandering monsters checks are made each round during the noise and " . mt_rand(2,6) . " rounds after the noise stops.";	break;
			case 48:
				switch (mt_rand(0,3))
				{
					case 0:	$trap = "A magical teleporter will send " . $t_who . " " . $place . ".";	break;
					case 1:	$trap = "A magical teleporter will send " . $t_who . " " . $place . ".";	break;
					case 2:	$trap = "A magical teleporter will send " . $t_who . " " . $place . " naked while their belongings drop to the floor.";	break;
					case 3:	$trap = "A magical teleporter will send " . $t_who . " " . $place . " naked while their belongings are teleported somewhere else in the area.";	break;
				}
				break;
			case 49:$trap = "There is a shallow looking puddle of water in the room that really is " . mt_rand(10,20) . " feet deep.  The first one to walk into the area will fall into the water unless they specifically state they are going to investigate it.";	break;
			case 50:$trap = "There is a pile of " . $piles . " with a bear trap inside. Anyone searching it without caution will have to make an " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK) . " or " . abilityTranslate($game,SPD) . " or suffer 1d6 damage. If a 6 is rolled, the hand is severed.";	break;
		}
	}
	else ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		if (mt_rand(1,100) > 50)
		{
			$death0 = "die";
			$death1 = "be decapitated"; if (mt_rand(1,100) > 50){$death1 = "be sliced clean in half";}
			$death2 = "be turned into a statue of solid " . statueMake(); if (mt_rand(1,100) > 70){$death2 = "be turned into a statue of pure " . slimeColor() . " crystal";}
			$death3 = "be encased in a block of ice"; if (mt_rand(1,100) > 50){$death3 = "be frozen solid and then shatter to pieces";}
			$death4 = "be turned to ash"; if (mt_rand(1,100) > 50){$death4 = "be set ablaze and melt into a puddle of goo";}
			$death5 = "fall";
			$death6 = "cold";
			$death7 = "petrification";
			$death8 = "be instantly killed from being impaled";
		}
		else
		{
			$power = array('4', '6', '8', '10', '12'); $death0 = "suffer 1d" . $power[mt_rand(0,4)] . "x" . (ceil($level/2)+1) . " damage";
				if ($game == "Swords & Six-Siders"){ $death0 = "suffer 1d6x" . (ceil($level/2)+1) . " damage"; }
			$death1 = $death0;
			$death2 = $death0 . " and become paralyzed for 1d4 rounds";
			$death3 = $death0;
			$death4 = $death0;
			$death5 = "rise";
			$death6 = "heat";
			$death7 = "magical spells";
			$death8 = $death0;
		}
		switch (mt_rand(0,6))
		{
			case 0:	$shrooms = "blindness for " . mt_rand(2,6) . " hours unless they can save for poison";	break;
			case 1:	$shrooms = "fear for " . mt_rand(2,6) . " hours unless they can save for poison";	break;
			case 2:	$shrooms = "hallucinations for " . mt_rand(2,6) . " hours unless they can save for poison";	break;
			case 3:	$shrooms = "the victim to slowly turn into fungus during the coarse of " . mt_rand(8,16) . " hours unless they can save for poison. If infected, they can be cured by magical means";	break;
			case 4:	$shrooms = "the victim to fall asleep for " . mt_rand(2,6) . " hours unless they can save for poison";	break;
			case 5:	$shrooms = "the victim to slowly have their skin turn into " . candleColor(1) . " scales over the coarse of " . mt_rand(8,16) . " hours unless they can save for poison. If infected, they can only be cured by magical means";	break;
			case 6:	$shrooms = "the victim to become so thirsty they will drink <u>any</u> form of liquid they come across unless they can save for poison. They do not physically need to consume the liquids, but they strongly think they do...attacking all of those who have liquids they will not freely give";	break;
		}
		switch (mt_rand(0,$trap_max))
		{
			case 0:	$trap = ucfirst(fogColor()) . " acidic gases " . $t_where . " causing 1d8+" . $level . " damage to " . $t_who . ".";
				if ($game == "Swords & Six-Siders"){ $trap = ucfirst(fogColor()) . " acidic gases " . $t_where . " causing 1d6+" . $level . " damage to " . $t_who . "."; }
				break;
			case 1:	$trap = ucfirst(fogColor()) . " poisonous gases " . $t_where . " where " . $t_who . " must save for poison or " . $death0 . ".";	break;
			case 2:	$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage.";	break;
			case 3:	$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep and layered in spikes. Anyone who falls in will take " . $pit_damage . "x" . mt_rand(2,4) . " damage.";	break;
			case 4:	$trap = "A spear comes out of the wall toward " . $t_first . ". It attacks as a warrior (level " . $level . ") and does 1d6+" . $level . " damage.";	break;
			case 5:	$trap = "The ceiling caves in and causes 1d6x" . (ceil($level/2)+1) . " damage to all inside.";	break;
			case 6:	$trap = "Poison needles shoot from a nearby wall, attacking as a warrior (level " . $level . "). Anyone " . $t_pit . " must save for poison or " . $death0 . ".";	break;
			case 7:	$trap = "A scything blade comes from a nearby wall attacking as a warrior (level " . $level . "). It will slice at " . $t_first . ". If they get hit, they will " . $death1 . ".";	break;
			case 8:	$trap = "Darts fire from the wall at anyone " . $t_pit . ", attacking as a warrior (level " . $level . "), causing 1d4+" . $level . " damage.";	break;
			case 9:	$trap = "A portcullis or wall closes the exits to the area.";	break;
			case 10:$trap = "Arrows fire from the wall at anyone " . $t_pit . ", attacking as a warrior (level " . $level . "), causing 1d6+" . $level . " damage.";	break;
			case 11:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep and filled with lava. Anyone who falls in will be killed.";	break;
			case 12:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep and filled with deadly " . slimeColor() . " ooze. Anyone who falls in will be killed in about " . mt_rand(1,3) . "0 minutes...and be fully dissolved in another " . mt_rand(6,9) . "0 minutes.";	break;
			case 13:$trap = "A wall closes the exits to the area. Water then begins to fill the room.";	break;
			case 14:$trap = "A wall closes the exits to the area. The walls then begin to compact the area where they will crush all inside in about " . mt_rand(1,3) . "0 minutes.";	break;
			case 15:$trap = "A wall closes the exits to the area. The ceiling then begins to descend.";	break;
			case 16:$trap = "A magical beam of energy hits all " . $t_pit . " where they must save for petrification or " . $death2 . ".";	break;
			case 17:$trap = "A magical beam of frost hits all " . $t_pit . " where they must save for " . $death7 . " or " . $death3 . ".";	break;
			case 18:$trap = "A magical beam of fire hits all " . $t_pit . " where they must save for breath or " . $death4 . "."; break;
			case 19:$trap = "A net wraps up all of those " . $t_pit . " and lifts them to the ceiling.";		break;
			case 20:$trap = "A wall closes the exits to the area. Oil then begins to fill the room for " . mt_rand(1,2) . "0 minutes (6 inches deep) where a fire source will then drop from the ceiling.";	break;
			case 21:$trap = "A polymorph spell hits " . $t_first . " where they turn into a " . polymorphType() . " for 1d4+" . $level . " turns unless they can save for spells.";
				if ($game == "Swords & Six-Siders"){ $trap = "A polymorph spell hits " . $t_first . " where they turn into a " . polymorphType() . " for 1d6+" . $level . " turns unless they can save for spells."; }
				break;
			case 22:
					if ($type == "list"){$trap = "A nearby wall opens to reveal a monster.";}
					else {$trap = "A nearby wall opens to reveal a <u>" . randomMonster($level,1,$game,$extra,$undead) . "</u>.";}
				break;
			case 23:
					if ($type == "list"){$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage. If they survive, they then must face a monster.";}
					else {$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage. If they survive, they then must face a <u>" . randomMonster($level,1,$game,$extra,$undead) . "</u>.";}
				break;
			case 24:$trap = "An explosion spell that causes 1d10x" . (ceil($level/2)+1) . " damage to all of those close to the " . $t_close . ". They only take half damage if they save for spells.";
				if ($game == "Swords & Six-Siders"){ $trap = "An explosion spell that causes 1d6x" . (ceil($level/2)+1) . " damage to all of those close to the " . $t_close . ". They only take half damage if they save for spells."; }
				break;
			case 25:$trap = "An acid liquid that splashes " . $t_who . ", causing 1d4x" . ($level*2) . " damage. They must also save for breath or be blind for " . ($level+1) . " days.";
				if ($game == "Swords & Six-Siders"){ $trap = "An acid liquid that splashes " . $t_who . ", causing 1d6x" . ($level*2) . " damage. They must also save for breath or be blind for " . ($level+1) . " days."; }
				break;
			case 26:$trap = "A locked iron cage that falls from the ceiling and lands on all of those close to the " . $t_close . ".";	break;
			case 27:$trap = "Poisonous snakes drop on " . $t_who . " where they must save for poison from the bites or " . $death0 . ".";		break;
			case 28:$trap = "Poisonous insects " . $t_where . " where they must save for poison from the bites or " . $death0 . ".";		break;
			case 29:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage...where the opening then closes.";	break;
			case 30:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage...where the walls begin to compact where they will crush all inside in about " . mt_rand(1,3) . "0 minutes.";	break;
			case 31:$trap = "Magical " . fogColor() . " mists " . $t_where . " where " . $t_who . " must save for spells or their magic items become disenchanted.";	break;
			case 32:$trap = "The ceiling becomes highly magnetized, causing all metal objects to fly up to the ceiling...carrying metal armor wearing adventurers up as well.";	break;
			case 33:$trap = "A wall closes the exits to the area. The room then begins to " . $death5 . " in temperature for about " . mt_rand(2,6) . "0 minutes...where no one can survive the extreme " . $death6 . ".";	break;
			case 34:$trap = ucfirst(fogColor()) . " gases " . $t_where . " causing memory loss to " . $t_who . " for about " . mt_rand(2,4) . " hours...where memorized spells are also lost.";	break;
			case 35:$trap = "Many columns of fire shoot up through the floor at all " . $t_pit . " where they must save for breath or " . $death4 . "."; break;
			case 36:$trap = ucfirst(fogColor()) . " gases " . $t_where . " that cause instant unconsciousness to " . $t_who . " for about " . mt_rand(4,10) . " turns...unless they can save for paralysis.";	break;
			case 37:$trap = ucfirst(fogColor()) . " gases fill the area. Any flame will ignite it causing all " . $t_pit . " to save for breath from the explosion or " . $death4 . "."; break;
			case 38:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep (taking " . $pit_damage . " damage from the fall) and filled with some odd " . candleColor(0) . " mushrooms. Anyone who falls in will land on them, causing them to release " . fogColor() . " spores that cause " . $shrooms . ".";	break;
			case 39:$trap = "A very bright magical light flashes in the area...where everyone must save for spells or be blind for " . ($level+2) . " turns.";		break;
			case 40:$trap = "Spikes come out of the floor " . $t_pit . " that are roughly " . mt_rand(3,6) . " feet high and " . mt_rand(1,6) . " inches wide at the base...where " . $t_who . " must save for paralyzation or " . $death8 . ".";	break;
			case 41:$trap = "Vines " . $t_where . " and tangle around " . $t_who . " and can only be removed after " . ($level * 20) . " points of damage have been done to the thick vines.";	break;
			case 42:$trap = "Thorny vines " . $t_where . " and tangle around " . $t_who . " causing 1d4+" . $level . " damage each round and can only be removed after " . ($level * 20) . " points of damage have been done to the thick vines.";
				if ($game == "Swords & Six-Siders"){ $trap = "Thorny vines " . $t_where . " and tangle around " . $t_who . " causing 1d6+" . $level . " damage each round and can only be removed after " . ($level * 20) . " points of damage have been done to the thick vines."; }
				break;
			case 43:$trap = "A sticky substance is " . $t_pit . " and causes " . $t_who . " to be stuck and must find a way to free themselves.";	break;
			case 44:
					if ($type == "list"){$trap = "A pit opens up " . $t_pit . " that drops " . $pit_depth . " feet before landing in water. Anyone who falls in will be in a large underground cave containing a water dwelling monster.";}
					else {$trap = "A pit opens up " . $t_pit . " that drops " . $pit_depth . " feet before landing in water. Anyone who falls in will be in a large underground cave containing a <u>" . randomMonster($level,2,$game,$extra,0) . "</u>.";}
				break;
			case 45:$trap = ucfirst(fogColor()) . " gases " . $t_where . " causing laughter to " . $t_who . " for about " . mt_rand(2,6) . " turns (unless they can save for poison)...where wandering encounter checks are made each turn the laughing continues.";	break;
			case 46:$trap = "A wall closes the exits to the area. Sand then begins to fill the room from above.";	break;
			case 47:$trap = "A loud " . $noise . " is made coming " . $t_noise . " that will continue for " . mt_rand(2,6) . " turns unless deactivated prior. Wandering monsters checks are made each round during the noise and " . mt_rand(2,6) . " rounds after the noise stops.";	break;
			case 48:
				switch (mt_rand(0,3))
				{
					case 0:	$trap = "A magical teleporter will send " . $t_who . " " . $place . ".";	break;
					case 1:	$trap = "A magical teleporter will send " . $t_who . " " . $place . ".";	break;
					case 2:	$trap = "A magical teleporter will send " . $t_who . " " . $place . " naked while their belongings drop to the floor.";	break;
					case 3:	$trap = "A magical teleporter will send " . $t_who . " " . $place . " naked while their belongings are teleported somewhere else in the area.";	break;
				}
				break;
			case 49:$trap = "There is a shallow looking puddle of water in the room that really is " . mt_rand(10,20) . " feet deep.  The first one to walk into the area will fall into the water unless they specifically state they are going to investigate it.";	break;
			case 50:$trap = "There is a pile of " . $piles . " with a bear trap inside. Anyone searching it without caution will suffer 1d6 damage. If a 6 is rolled, the hand is severed.";	break;
		}
	}

	$trap = $trap . trapDisarm($level,$type,$game);

	if ($type == "list"){$trap = $trap;} // FOR DATA FILE LISTINGS
	else if ($type != "box"){$trap = "ROOM&nbsp;TRAP:&nbsp;" . $trap;}

	return array($trap, $level);
}

function trapDisarm($level,$type,$game)
{
	if ($type == "box")
	{
		$tripwire = "within the container";
	}
	else if ($type == "item")
	{
		$tripwire = "attached to the item";
	}
	else if ($type == "idol")
	{
		$tripwire = "attached to the idol";
	}
	else
	{
		$tripwire = "somewhere on the floor";
	}
	////////////////////////////////////////////////////////////////////////////////////////////
	switch (mt_rand(0,4))
	{
		case 0:	$where = "on the " . dungeonWall();										break;
		case 1:	$where = "on the " . dungeonWall() . " of the previous area";			break;
		case 2:	$where = "on the " . dungeonWall() . " of the nearest secret room";		break;
		case 3:	$where = "on the " . dungeonWall();										break;
		case 4:	$where = "on the " . dungeonWall();										break;
	}
	////////////////////////////////////////////////////////////////////////////////////////////
	switch (mt_rand(0,2))
	{
		case 0:	$room = "somewhere within this area";					break;
		case 1:	$room = "somewhere within the previous area";			break;
		case 2:	$room = "somewhere within the nearest secret room";		break;
	}
	////////////////////////////////////////////////////////////////////////////////////////////
	switch (mt_rand(0,4))
	{
		case 0:	$paper = "a piece of parchment";	break;
		case 1:	$paper = "a scroll";				break;
		case 2:	$paper = "a stone tablet";			break;
		case 3:	$paper = "a piece of paper";		break;
		case 4:	$paper = "a small book";			break;
	}
	////////////////////////////////////////////////////////////////////////////////////////////
	switch (mt_rand(0,3))
	{
		case 0:	$button = "lever";	break;
		case 1:	$button = "switch";	break;
		case 2:	$button = "button";	break;
		case 3:	$button = "handle";	break;
	}
	////////////////////////////////////////////////////////////////////////////////////////////
	switch (mt_rand(0,6))
	{
		case 0:	$hide = "hidden " . $where;							break;
		case 1:	$hide = "disguised to look like something else";	break;
		case 2:	$hide = "magically hidden " . $where;				break;
		case 3:	$hide = "in plain site " . $where;					break;
		case 4:	$hide = "in plain site " . $where;					break;
		case 5:	$hide = "concealed " . $where;						break;
		case 6:	$hide = "concealed " . $where;						break;
	}
	////////////////////////////////////////////////////////////////////////////////////////////
	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
	{
		switch (mt_rand(0,4))
		{
			case 0:	$words = "mystical runic symbols {that can be read by a wizard-type if they can make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . "}";	break;
			case 1:	$words = "a riddle {requiring one to make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . "}";	break;
			case 2:	$words = languageType($game);	break;
			case 3:	$words = "simple instructions";	break;
			case 4:	$words = "complicated instructions {requiring one to make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,INT) . " to follow}";	break;
		}
	}
	else
	{
		switch (mt_rand(0,4))
		{
			case 0:	$words = "mystical runic symbols {that can be read by a wizard-type with an intelligence check}";	break;
			case 1:	$words = "a riddle {requiring a wisdom check to solve}";	break;
			case 2:	$words = languageType($game);	break;
			case 3:	$words = "simple instructions";	break;
			case 4:	$words = "complicated instructions {requiring an intelligence check to follow}";	break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////
	switch (mt_rand(0,5))
	{
		case 0:	$tell = "that shows how to disable the trap";										break;
		case 1:	$tell = "that shows how one can simply avoid the trap";								break;
		case 2:	$tell = "that shows how the trap can be triggered safely";							break;
		case 3:	$tell = "that shows how the trap can be broken";									break;
		case 4:	$tell = "that shows how the trap can be activated and deactivated";					break;
		case 5:	$tell = "that shows the word that must be spoken out loud {" . castingName() . "} to disable the trap";		break;
	}
	////////////////////////////////////////////////////////////////////////////////////////////
	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
	{
		$deactivate = "at the trap's source and by a rogue if they can make a " . TTSaves($level,$game) . " vs. " . abilityTranslate($game,LCK);
	}
	else
	{
		$deactivate = "at the trap's source and by a thief, or one with a disarm trap skill";
	}
	switch (mt_rand(0,8))
	{
		case 0:	$deactivate = "by deciphering the " . drawWith() . " writings of " . $words . " " . $where . " " . $tell;	break;
		case 1:	$deactivate = "by tapping the " . dungeonWall() . " in a particular spot...and from a safe distance";	break;
		case 2:	$deactivate = "by tapping the " . dungeonWall() . " in a particular spot...and from a safe distance";	break;
		case 3:	$deactivate = "by a " . $button . " " . $hide;	break;
		case 4:	$deactivate = "by a " . $button . " " . $hide;	break;
		case 5:	$deactivate = "by tripping a thin wire " . $tripwire;	break;
		case 6:	$deactivate = "by finding " . $paper . " " . $room . ", " . $tell;	break;
	}

	return " [It can be deactivated " . $deactivate . "]";
}

?>