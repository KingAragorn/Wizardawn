<?php

/// MAKES A RANDOM ROBOT OR VEHICLE FOR A POST-APOCALYPTIC SETTING ///

function VehicleRobotMaker($game,$type,$level)
{
	if ($level > 0){$level = mt_rand(1,$level);} else {$level = mt_rand(1,20);}

	$working = mt_rand(2,12);

	if ($working < 6){$work = " (totally ruined)";}
	else if ($working < 8){$work = " (poor condition)";}
	else if ($working < 10){$work = " (fair condition)";}
	else if ($working < 11){$work = " (good condition)";}
	else if ($working < 12){$work = " (excellent condition)";}
	else {$work = " (perfect condition)";}

	if (mt_rand(1,3) == 1)
	{
		$full1 = " totally drained of power.";
		$full2 = " totally drained of fuel.";
	}
	else
	{
		$full1 = " with " . mt_rand(1,10) . "0% power.";
		$full2 = " with " . mt_rand(1,10) . "0% fuel.";
	}

	if (($game == "Metamorphosis Alpha") && ($type == 1))
	{
		switch (mt_rand(0,7))
		{
			case 0:	$item = candleColor(0) . " hover car";			break;
			case 1:	$item = candleColor(0) . " anti-grav car";		break;
			case 2:	$item = candleColor(0) . " environmental car";	break;
			case 3:	$item = candleColor(0) . " bubble car";			break;
			case 4: $item = candleColor(0) . " hover bike";			break;
			case 5: $item = candleColor(0) . " hover bus";			break;
			case 6: $item = candleColor(0) . " hover truck";		break;
			case 7:	$item = candleColor(0) . " anti-grav cart";		break;
		}
		$item = ucwords($item) . $work . $full2;
	}
	else if ($game == "Metamorphosis Alpha")
	{
		switch (mt_rand(0,10))
		{
			case 0:	$item = "agricultural ecology bot";		break;
			case 1:	$item = "wilderness ecology bot";		break;
			case 2:	$item = "standard engineering bot";		break;
			case 3:	$item = "light engineering bot";		break;
			case 4:	$item = "heavy engineering bot";		break;
			case 5:	$item = "medical bot";					break;
			case 6: $item = "general household bot";		break;
			case 7: $item = "security bot";					break;
			case 8: $item = "supervisory bot";				break;
			case 9: $item = "android";						break;
			case 10:$item = "standard bot";					break;
		}
		$item = ucwords($item) . $work . $full1;
	}
	else if ($game == "Gamma World" && $type != 1)
	{
		switch (mt_rand(0,16))
		{
			case 0:		$item = "light cargo lifter";			break;
			case 1:		$item = "heavy cargo lifter";			break;
			case 2:		$item = "light cargo transport";		break;
			case 3:		$item = "heavy cargo transport";		break;
			case 4:		$item = "ecology bot (ag)";				break;
			case 5:		$item = "ecology bot (wild)";			break;
			case 6: 	$item = "engineering bot (std)";		break;
			case 7: 	$item = "engineering bot (lt)";			break;
			case 8: 	$item = "engineering bot (hvy)";		break;
			case 9: 	$item = "medical robotoid";				break;
			case 10:	$item = "security robotoid";			break;
			case 11:	$item = "general household robotoid";	break;
			case 12:	$item = "supervisory borg";				break;
			case 13:	$item = "defense borg";					break;
			case 14:	$item = "attack borg";					break;
			case 15:	$item = "war bot";						break;
			case 16:	$item = "death machine";				break;
		}
		$item = ucwords($item) . $work . $full1;
	}
	else if (($game != "Broken Urthe") && ($type == 1))
	{
		switch (mt_rand(0,15))
		{
			case 0:	$item = militaryColor() . " military jeep";		break;
			case 1:	$item = militaryColor() . " military truck";	break;
			case 2:	$item = militaryColor() . " military tank";		break;
			case 3:	$item = candleColor(0) . " turbine car";		break;
			case 4:	$item = candleColor(0) . " hover car";			break;
			case 5:	$item = candleColor(0) . " anti-grav car";		break;
			case 6:	$item = candleColor(0) . " environmental car";	break;
			case 7:	$item = candleColor(0) . " bubble car";			break;
			case 8:	$item = candleColor(0) . " motorcycle";			break;
			case 9:	$item = candleColor(0) . " bus";				break;
			case 10:$item = candleColor(0) . " car";				break;
			case 11:$item = candleColor(0) . " truck";				break;
			case 12:$item = candleColor(0) . " helicopter";			break;
			case 13:$item = candleColor(0) . " hover bike";			break;
			case 14:$item = candleColor(0) . " hover bus";			break;
			case 15:$item = candleColor(0) . " hover truck";		break;
		}
		$item = ucwords($item) . $work . $full2;
	}
	else if ($game != "Broken Urthe")
	{
		switch (mt_rand(0,18))
		{
			case 0:	$item = "light cargo litter";				break;
			case 1:	$item = "heavy cargo litter";				break;
			case 2:	$item = "small cargo transport";			break;
			case 3:	$item = "large cargo transport";			break;
			case 4:	$item = "agricultural ecology robot";		break;
			case 5:	$item = "wilderness ecology robot";			break;
			case 6:	$item = "standard engineering robot";		break;
			case 7:	$item = "light engineering robot";			break;
			case 8:	$item = "heavy engineering robot";			break;
			case 9:	$item = "medical robotoid";					break;
			case 10:$item = "general household robot";			break;
			case 11:$item = "security robot";					break;
			case 12:$item = "supervisory borg";					break;
			case 13:$item = "defense borg";						break;
			case 14:$item = "attack borg";						break;
			case 15:$item = "warbot";							break;
			case 16:$item = "death machine";					break;
			case 17:$item = "cybernetic installation";			break;
			case 18:$item = "think tank";						break;
		}
		$item = ucwords($item) . $work . $full1;
	}
	else if ($type == 1)
	{
		switch (mt_rand(0,23))
		{
			case 0:	$item = candleColor(0) . " motorcycle";					break;
			case 1:	$item = candleColor(0) . " anti-grav cycle";			break;
			case 2:	$item = candleColor(0) . " jeep";						break;
			case 3:	$item = candleColor(0) . " anti-grav car";				break;
			case 4:	$item = candleColor(0) . " explorer";					break;
			case 5:	$item = candleColor(0) . " anti-grav explorer";			break;
			case 6:	$item = candleColor(0) . " helicopter";					break;
			case 7:	$item = candleColor(0) . " jet";						break;
			case 8:	$item = candleColor(0) . " semi truck";					break;
			case 9:	$item = candleColor(0) . " semi truck with trailer";	break;
			case 10:$item = candleColor(0) . " ATV";						break;
			case 11:$item = candleColor(0) . " bus";						break;
			case 12:$item = candleColor(0) . " mini bus";					break;
			case 13:$item = candleColor(0) . " car";						break;
			case 14:$item = candleColor(0) . " dune buggy";					break;
			case 15:$item = candleColor(0) . " hovercraft";					break;
			case 16:$item = candleColor(0) . " moped";						break;
			case 17:$item = militaryColor() . " robotic tank";				break;
			case 18:$item = militaryColor() . " tank";						break;
			case 19:$item = militaryColor() . " anti-grav tank";			break;
			case 20:$item = militaryColor() . " cargo truck";				break;
			case 21:$item = militaryColor(0) . " jeep";						break;
			case 22:$item = candleColor(0) . " pickup truck";				break;
			case 23:$item = candleColor(0) . " van";						break;
		}
		$item = ucwords($item) . $work . $full2;
	}
	else 
	{
		if ($level < 3){$soft = "I";}
		else if ($level < 5){$soft = "II";}
		else if ($level < 7){$soft = "III";}
		else if ($level < 9){$soft = "IV";}
		else if ($level < 11){$soft = "V";}
		else if ($level < 13){$soft = "VI";}
		else if ($level < 15){$soft = "VII";}
		else if ($level < 17){$soft = "VIII";}
		else if ($level < 19){$soft = "IX";}
		else {$soft = "X";}

		$fuel = array('alien technology', 'petroleum', 'electricity', 'radiation', 'plutonium', 'uranium', 'nuclear', 'xormite', 'xormite', 'xormite', 'xormite');
		$fuel = $fuel[mt_rand(0,10)];

		$metal = array('iron', 'aluminium', 'steel', 'plastoid', 'durasteel', 'crystal alloy', 'adamant', 'promethium', 'unobtainium', 'unknown metal');
		$metal = $metal[mt_rand(0,9)];

		if ($fuel == "alien technology")
		{
			$name = alienName() . "" . $aldash . "" . $aliensub;
			$name = ucfirst($name);
		}
		else
		{
			$spaces = mt_rand(4,6);
			$dashit = 0;
			$name = "";
			$perc = 100;

			while ($spaces > 0) :

				$perc = $perc - 20;
				if ((mt_rand(1,100) > $perc) && ($name != "") && ($dashit != 1)){$dashit = 1; $entf = "-";}
				if (mt_rand(1,100) > 60){$name = randLetter() . "" . $entf . "" . $name;} else {$name = mt_rand(0,9) . "" . $entf . "" . $name;}
				$entf = "";
				$spaces = $spaces - 1;

			endwhile;

			$name = strtoupper($name);
		}
		switch (mt_rand(0,11))
		{
			case 0:	$bot = "exploration";		$skill = "geography";	break;
			case 1:	$bot = "medical";			$skill = "medicine";	break;
			case 2:	$bot = "science";			$skill = "science";		break;
			case 3:	$bot = "communication";		$skill = "sociology";	break;
			case 4:	$bot = "security";			$skill = "security";	break;
			case 5:	$bot = "tracking";			$skill = "sneaking";	break;
			case 6:	$bot = "spy";				$skill = "tracking";	break;
			case 7:	$bot = "operations";		$skill = "computers";	break;
			case 8:	$bot = "repair";			$skill = "mechanics";	break;
			case 9:	$bot = "piloting";			$skill = "piloting";	break;
			case 10:$bot = "engineering";		$skill = "robotics";	break;
			case 11:$bot = "battle";			$skill = "ranged";	break;
		}
		switch (mt_rand(0,2))
		{
			case 0:	$model = "droid";		break;
			case 1:	$model = "bot";			break;
			case 2:	$model = "mech";		break;
		}
		$item = $name . " " . $bot . " " . $model;
		$runs = "made mostly of " . $metal . " and runs on " . $fuel . " for fuel";
		$item = ucwords($item) . $work . " " . $runs . ". It has Software " . $soft . " in " . ucfirst($skill) . " installed and is" . $full1;
	}
	return $item;
}

?>