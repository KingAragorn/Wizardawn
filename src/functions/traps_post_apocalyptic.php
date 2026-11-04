<?php

function PAtrapMaker($level,$type,$game,$mutants,$might1,$might2,$tech,$v_scare)
{
	if ($level > 0){$level = mt_rand(1,$level);} else {$level = mt_rand(1,20);}

	$rad_level = $level;  if ($rad_level > 18){$rad_level = 18;}

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

	if ($level < 3){$hitscore = 10;}
	else if ($level < 5){$hitscore = 9;}
	else if ($level < 7){$hitscore = 8;}
	else if ($level < 9){$hitscore = 7;}
	else if ($level < 11){$hitscore = 6;}
	else if ($level < 13){$hitscore = 5;}
	else if ($level < 15){$hitscore = 4;}
	else if ($level < 17){$hitscore = 3;}
	else if ($level < 19){$hitscore = 2;}
	else {$hitscore = 1;}

	if ($type == "box")
	{
		$t_where = "come out of the container";
		$t_who = "the opener";
		$t_pit = "in front of the container";
		$t_first = "whoever opens the container";
		$t_close = "container";
	}
	else
	{
		$t_where = "fill the area";
		$t_who = "anyone inside";
		$t_pit = "in the area";
		$t_first = "whoever first enters the area";
		$t_close = "central spot of the area";
	}
	if (mt_rand(1,100) > 50)
	{
		$death0 = "die";
		$death1 = "be decapitated"; if (mt_rand(1,100) > 50){$death1 = "be sliced clean in half";}
		$death2 = "be mutated into creating a new mutant character (keeping all items and experience intact)";
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
		$death1 = $death0;
		$death2 = $death0 . " and become stunned for 1d4 rounds";
		$death3 = $death0;
		$death4 = $death0;
		$death5 = "rise";
		$death6 = "heat";
		$death7 = "magical spells";
		$death8 = $death0;
	}

	if ($game == "Mutant Future")
	{
		$mfp = ".";
		$save1 = "save for poison";
		$save2 = "save for radiation";
		$save3 = "save for energy attacks";
		$save4 = "save for stun attacks";
		$save5 = "make a willpower check";
		$scorez = "THAC0";
	}
	else if ($game == "Metamorphosis Alpha" || $game == "Gamma World")
	{
		if ($level < 3){$hitscore = 1;}
		else if ($level < 5){$hitscore = 2;}
		else if ($level < 7){$hitscore = 3;}
		else if ($level < 9){$hitscore = 4;}
		else if ($level < 11){$hitscore = 5;}
		else if ($level < 13){$hitscore = 6;}
		else if ($level < 15){$hitscore = 7;}
		else {$hitscore = 8;}

		$save1 = "resist the poison (strength&nbsp;" . $rad_level . ")";
		$save2 = "resist the radiation (intensity&nbsp;" . $rad_level . ")";
		$save3 = "resist the radiation (intensity&nbsp;" . $rad_level . ")";
		$save4 = "roll equal or under their constitution on 1d20";
		$save5 = "resist the mind effect (power&nbsp;" . $rad_level . ")";
		$scorez = "weapon";
	}
	else if ($game == "Labyrinth Lord")
	{
		$mfp = ".";
		$save1 = "save for poison";
		$save2 = "save for wands";
		$save3 = "save for breath attacks";
		$save4 = "save for paralysis";
		$save5 = "save for spells";
		$scorez = "THAC0";
	}
	else
	{
		$save1 = "defend for toxins";
		$save2 = "defend for radiation";
		$save3 = "defend for energy";
		$save4 = "defend for shock";
		$save5 = "defend for the mind";
		$scorez = "HIT";
	}

	if ($tech == 1){$tp1 = 10; $tp2 = 54;} else {$tp1=0; $tp2 = 44;}

	switch (mt_rand($tp1,$tp2))
	{
		case 0:	$trap = "A spear comes out of the wall toward " . $t_first . ". It attacks with a " . $scorez . " score of " . $hitscore . " and does 1d6+" . $level . " damage.";	break;
		case 1:	$trap = "The ceiling caves in and causes 1d6x" . (ceil($level/2)+1) . " damage to all inside.";	break;
		case 2: $trap = "Arrows fire from the wall at anyone " . $t_pit . ", attacking with a " . $scorez . " score of " . $hitscore . ", causing 1d6+" . $level . " damage.";	break;
		case 3: $trap = "A net wraps up all of those " . $t_pit . " and lifts them to the ceiling.";		break;
		case 4: $trap = "A solid door closes the exits to the area. Gasoline then begins to fill the room for " . mt_rand(1,2) . "0 minutes (6 inches deep) where a fire source will then ignite it.";	break;
		case 5: $trap = "An old x-ray device was rigged to hit " . $t_who . " where they suffer 1d4x" . (ceil($level/2)+1) . " damage unless they can " . $save2 . ".";	break;
		case 6: $trap = "Vines " . $t_where . " and tangle around " . $t_who . " and can only be removed after " . ($level * 20) . " points of damage have been done to the thick vines.";	break;
		case 7: $trap = "Thorny vines " . $t_where . " and tangle around " . $t_who . " causing 1d4+" . $level . " damage each round and can only be removed after " . ($level * 20) . " points of damage have been done to the thick vines.";	break;
		case 8:
				if ($type == "list"){$trap = "A pit opens up " . $t_pit . " that drops " . $pit_depth . " feet before landing in water. Anyone who falls in this large flooded basement will encounter a creature.";}
				else {$trap = "A pit opens up " . $t_pit . " that drops " . $pit_depth . " feet before landing in water. Anyone who falls in this large flooded basement will encounter a <u>" . PArandomMonster($level,2,$game,$mutants,$might1,$might2) . "</u>" . $mfp . "";}
			break;
		case 9: $trap = "A " . mt_rand(1,6) . " foot tall " . candleColor(0) . " flower emerges " . $t_pit . " that sprays a " . candleColor(0) . " pollen that " . PAflowerPower($game) . ".";	break;
		case 10:$trap = ucfirst(fogColor()) . " acidic gases " . $t_where . " causing 1d8+" . $level . " damage to " . $t_who . ".";	break;
		case 11:$trap = ucfirst(fogColor()) . " poisonous gases " . $t_where . " where " . $t_who . " must " . $save1 . " or " . $death0 . ".";	break;
		case 12:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage.";	break;
		case 13:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep and layered in spikes. Anyone who falls in will take " . $pit_damage . "x" . mt_rand(2,4) . " damage.";	break;
		case 14:$trap = "Poison needles shoot from a nearby wall, attacking with a " . $scorez . " score of " . $hitscore . ". Anyone " . $t_pit . " must " . $save1 . " or " . $death0 . ".";	break;
		case 15:$trap = "A long razor blade comes from a nearby wall attacking with a " . $scorez . " score of " . $hitscore . ". It will slice at " . $t_first . ". If they get hit, they will " . $death1 . ".";	break;
		case 16:$trap = "Darts fire from the wall at anyone " . $t_pit . ", attacking with a " . $scorez . " score of " . $hitscore . ", causing 1d4+" . $level . " damage.";	break;
		case 17:$trap = "A solid door closes the exits to the area.";	break;
		case 18:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep and filled with " . candleColor(0) . " acid. Anyone who falls in will be killed.";	break;
		case 19:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep and filled with acidic, " . slimeColor() . " ooze. Anyone who falls in will be killed in about " . mt_rand(1,3) . "0 minutes...and be fully dissolved in another " . mt_rand(6,9) . "0 minutes.";	break;
		case 20:$trap = "A solid door closes the exits to the area. Water then begins to fill the room.";	break;
		case 21:$trap = "A solid door closes the exits to the area. The walls then begin to compact the area where they will crush all inside in about " . mt_rand(1,3) . "0 minutes.";	break;
		case 22:$trap = "A solid door closes the exits to the area. The ceiling then begins to descend.";	break;
		case 23:$trap = "A " . candleColor(0) . " radioactive beam hits all " . $t_pit . " where they must " . $save2 . " or " . $death2 . ".";	break;
		case 24:$trap = "An energy beam of frost hits all " . $t_pit . " where they must " . $save3 . " or " . $death3 . ".";	break;
		case 25:$trap = "An energy beam of fire hits all " . $t_pit . " where they must " . $save3 . " or " . $death4 . "."; break;
		case 26:$trap = "Rad lamps shine onto " . $t_first . " where they suffer 1d8x" . (ceil($level/2)+1) . " damage unless they can " . $save2 . ".";	break;
		case 27:
				if ($type == "list"){$trap = "A nearby wall opens to reveal a creature.";}
				else {$trap = "A nearby wall opens to reveal a <u>" . PArandomMonster($level,1,$game,$mutants,$might1,$might2) . "</u>" . $mfp . "";}
			break;
		case 28:
				if ($type == "list"){$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage. If they survive, they then must face a creature.";}
				else {$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage. If they survive, they then must face a <u>" . PArandomMonster($level,1,$game,$mutants,$might1,$might2) . "</u>" . $mfp . "";}
			break;
		case 29:$trap = "A bomb explodes that causes 1d10x" . (ceil($level/2)+1) . " damage to all of those close to the " . $t_close . ". They only take half damage if they " . $save3 . ".";		break;
		case 30:$trap = "A " . candleColor(0) . " acid liquid that splashes " . $t_who . ", causing 1d4x" . ($level*2) . " damage. They must also " . $save4 . " or be blind for " . ($level+1) . " days.";		break;
		case 31:$trap = "A " . candleColor(0) . " energy force shield surrounds those close to the " . $t_close . ". It requires one to " . $save3 . " to get free.";	break;
		case 32:$trap = "Strobe lights blink at " . $t_who . " where they must " . $save5 . " or be hypnotized into doing random actions for " . mt_rand(10,50) . " minutes.";		break;
		case 33:$trap = "Bio-Safe acidic " . fogColor() . " mists " . $t_where . " where " . $t_who . " must roll 1d6 for each item carried. A roll of 1 indicates the item is destroyed.";	break;
		case 34:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage...where the opening then closes.";	break;
		case 35:$trap = "A pit opens up " . $t_pit . " that is " . $pit_depth . " feet deep. Anyone who falls in will take " . $pit_damage . " damage...where the walls begin to compact where they will crush all inside in about " . mt_rand(1,3) . "0 minutes.";	break;
		case 36:
			if ($game == "Mutant Future" || $game == "Broken Urthe"){ $trap = "Chemical " . fogColor() . " mists " . $t_where . " where " . $t_who . " must " . $save1 . " or suffer from amnesia and lose a level (cannot go below level 1)."; }
			else { $trap = "Chemical " . fogColor() . " mists " . $t_where . " where " . $t_who . " must " . $save1 . " or suffer from amnesia for 1d4+" . $level . " hours."; }
		break;
		case 37:$trap = "The ceiling becomes highly magnetized, causing all metal objects to fly up to the ceiling...carrying metal armor wearing explorers up as well.";	break;
		case 38:$trap = "A solid door closes the exits to the area. The room then begins to " . $death5 . " in temperature for about " . mt_rand(2,6) . "0 minutes...where no one can survive the extreme " . $death6 . ".";	break;
		case 39:$trap = ucfirst(fogColor()) . " neural gases " . $t_where . " causing memory loss to " . $t_who . " for about " . mt_rand(2,4) . " hours.";	break;
		case 40:$trap = "Microwaves shoot up through the floor at all " . $t_pit . " where they must " . $save2 . " or " . $death4 . "."; break;
		case 41:$trap = ucfirst(fogColor()) . " gases " . $t_where . " that cause instant unconsciousness to " . $t_who . " for about " . mt_rand(4,10) . " turns...unless they can " . $save4 . ".";	break;
		case 42:$trap = ucfirst(fogColor()) . " flammable gases fill the area. Any flame will ignite it causing all " . $t_pit . " to " . $save3 . " from the explosion or " . $death4 . "."; break;
		case 43:$trap = "A very bright light flashes in the area...where everyone must " . $save4 . " or be blind for " . ($level+2) . " turns.";		break;
		case 44:$trap = "A " . candleColor(0) . " sticky substance is " . $t_pit . " and causes " . $t_who . " to be stuck and must succeed at a strength test to free themselves.";	break;
		case 45:$trap = "A razor pole comes out of the wall toward " . $t_first . ". It attacks with a " . $scorez . " score of " . $hitscore . " and does 1d6+" . $level . " damage.";	break;
		case 46:$trap = "The ceiling jets down powerful forced air which causes 1d6x" . (ceil($level/2)+1) . " damage to all inside.";	break;
		case 47:$trap = "Steel spikes shoot from the wall at anyone " . $t_pit . ", attacking with a " . $scorez . " score of " . $hitscore . ", causing 1d6+" . $level . " damage.";	break;
		case 48:$trap = "A steel net wraps up all of those " . $t_pit . " and lifts them to the ceiling.";		break;
		case 49:$trap = "A solid door closes the exits to the area. A flammable " . candleColor(0) . " liquid then begins to fill the room for " . mt_rand(1,2) . "0 minutes (6 inches deep) where a fire source will then ignite it.";	break;
		case 50:$trap = "An old x-ray device was rigged to hit " . $t_who . " where they suffer 1d4x" . (ceil($level/2)+1) . " damage unless they can " . $save2 . ".";	break;
		case 51:$trap = "Robotic coils " . $t_where . " and tangle around " . $t_who . " and can only be removed after " . ($level * 20) . " points of damage have been done to the metal tentacles.";	break;
		case 52:$trap = "Spiked robotic coils " . $t_where . " and tangle around " . $t_who . " causing 1d4+" . $level . " damage each round and can only be removed after " . ($level * 20) . " points of damage have been done to the sharp metal tentacles.";	break;
		case 53:
				if ($type == "list"){$trap = "A pit opens up " . $t_pit . " that drops " . $pit_depth . " feet before landing in water. Anyone who falls in this pool will encounter a creature.";}
				else {$trap = "A pit opens up " . $t_pit . " that drops " . $pit_depth . " feet before landing in water. Anyone who falls in this pool will encounter a <u>" . PArandomMonster($level,2,$game,$mutants,$might1,$might2) . "</u>" . $mfp . "";}
			break;
		case 54:$trap = "A wall exhaust fan sprays a " . candleColor(0) . " dust that " . PAflowerPower($game) . ".";	break;
	}
	if ($type == "list"){$trap = $trap;} // FOR DATA FILE LISTS
	else if ($type != "box"){$trap = strtoupper($v_scare) . "&nbsp;TRAP:&nbsp;" . $trap;}

	return array($trap, $level);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAflowerPower($game)
{
	$power = array('4', '6', '8', '10', '12');
	$hurt = "suffer 1d" . $power[mt_rand(0,4)] . " damage";


	if ($game == "Mutant Future")
	{
		$save1 = "save for poison";
		$save2 = "save for radiation";
		$save3 = "save for energy attacks";
		$save4 = "save for stun attacks";
		$save5 = "make a willpower check";
	}
	else if ($game == "Metamorphosis Alpha" || $game == "Gamma World")
	{
		$save1 = "resist the poison (poison level " . $rad_level . ")";
		$save2 = "resist the radiation (radiation level " . $rad_level . ")";
		$save3 = "resist the radiation (radiation level " . $rad_level . ")";
		$save4 = "roll equal or over their constitution on 1d20";
		$save5 = "resist the mind effect (mental power " . $rad_level . ")";
	}
	else if ($game == "Labyrinth Lord")
	{
		$save1 = "save for poison";
		$save2 = "save for wands";
		$save3 = "save for breath attacks";
		$save4 = "save for paralysis";
		$save5 = "save for spells";
	}
	else
	{
		$save1 = "defend for toxins";
		$save2 = "defend for radiation";
		$save3 = "defend for energy";
		$save4 = "defend for shock";
		$save5 = "defend for the mind";
	}

	switch (mt_rand(0,4))
	{
		case 0:	$plant = "will cause blindness for " . mt_rand(2,12) . " hours unless the victim can " . $save4;											break;
		case 1:	$plant = "will cause insanity for " . mt_rand(2,12) . " hours unless the victim can " . $save5;												break;
		case 2:	$plant = "will poison the victim, causing death unless they can " . $save1;																	break;
		case 3:	$plant = "will cover the victim in radioactive dust where they will suffer " . $hurt . " unless they can " . $save2;						break;
		case 4:	$plant = "will cover the victim in a dust that will ignite upon contact where they will suffer " . $hurt . " unless they can " . $save3;	break;
	}

	return $plant;
}
?>