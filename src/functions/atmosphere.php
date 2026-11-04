<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function dungeonWall()
{
	$make = array('wall', 'ceiling', 'floor');
	return $make[mt_rand(0,2)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function smellMakerRoom()
{
	$smell = "smells dusty";
	switch (mt_rand(0,34))
	{
		case 0:		$smell = "smells acrid";			break;
		case 1:		$smell = "smells of chlorine";			break;
		case 2:		$smell = "smells dank and moldy";		break;
		case 3:		$smell = "smells earthy";			break;
		case 4:		$smell = "smells of manure";			break;
		case 5:		$smell = "smells metallic";			break;
		case 6:		$smell = "smells of ozone";			break;
		case 7:		$smell = "smells putrid";			break;
		case 8:		$smell = "smells of rotting vegetation";	break;
		case 9:		$smell = "smells salty and damp";		break;
		case 10:	$smell = "smells of smoke";			break;
		case 11:	$smell = "smells fetid and stale";		break;
		case 12:	$smell = "smells of sulphur";			break;
		case 13:	$smell = "smells of urine";			break;
		case 14:	$smell = "smells of rotten meat";		break;
		case 15:	$smell = "smells dusty";			break;
		case 16:	$smell = "smells dusty";			break;
		case 17:	$smell = "smells stale";			break;
		case 18:	$smell = "smells musty";			break;
		case 19:	$smell = "smells bitter";			break;
		case 20:	$smell = "smells clean";			break;
		case 21:	$smell = "smells rancid";			break;
		case 22:	$smell = "smells putrid";			break;
		case 23:	$smell = "smells stale";			break;
		case 24:	$smell = "smells pungent";			break;
		case 25:	$smell = "smells dusty";			break;
		case 26:	$smell = "smells dusty";			break;
		case 27:	$smell = "smells stale";			break;
		case 28:	$smell = "smells musty";			break;
		case 29:	$smell = "smells bitter";			break;
		case 30:	$smell = "smells clean";			break;
		case 31:	$smell = "smells rancid";			break;
		case 32:	$smell = "smells putrid";			break;
		case 33:	$smell = "smells stale";			break;
		case 34:	$smell = "smells pungent";			break;
	}
	return $smell;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function airMakerRoom()
{
	$air = "has a stillness in the air...with an average temperature for the area";
	switch (mt_rand(0,20))
	{
		case 0:		$air = "has a slight breeze";						break;
		case 1:		$air = "has a slight, damp breeze";					break;
		case 2:		$air = "has a gusting breeze";						break;
		case 3:		$air = "has a cold current";						break;
		case 4:		$air = "has a slight downdraft";					break;
		case 5:		$air = "has a strong downdraft";					break;
		case 6:		$air = "has a slight updraft";						break;
		case 7:		$air = "has a strong updraft";						break;
		case 8:		$air = "has a strong wind";						break;
		case 9:		$air = "has a strong, gusting wind";					break;
		case 10:	$air = "has a strong, moaning wind";					break;
		case 11:	$air = "has an oddly still air...with " . fogMakerRoom();		break;
		case 12:	$air = "has an oddly still air, but cold...with " . fogMakerRoom();	break;
		case 13:	$air = "has an oddly still air, but warm...with " . fogMakerRoom();	break;
	}
	return $air;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function fogMakerRoom()
{
	$fog = "dust in the air";
	switch (mt_rand(0,18))
	{
		case 0:	$fog = "a " . fogColor() . " colored fog in the air";		break;
		case 1:	$fog = "a " . fogColor() . " colored steam in the air";		break;
		case 2:	$fog = "a " . fogColor() . " colored mist on the floor";	break;
		case 3:	$fog = "a " . fogColor() . " colored haziness to the air";	break;
		case 4:	$fog = "a " . fogColor() . " colored haze of smoke";		break;
		case 5:	$fog = "a " . fogColor() . " colored mist near the ceiling";	break;
		case 6:	$fog = "a " . fogColor() . " colored smoke near the ceiling";	break;
		case 7:	$fog = "moisture in the air";					break;
		case 8:	$fog = "dryness in the air";					break;
		case 9:	$fog = "stillness in the air";					break;
		case 10:$fog = "moldiness in the air";					break;
		case 11:$fog = "dampness in the air";					break;
		case 12:$fog = "dust in the air";					break;
		case 13:$fog = "moisture in the air";					break;
		case 14:$fog = "dryness in the air";					break;
		case 15:$fog = "stillness in the air";					break;
		case 16:$fog = "moldiness in the air";					break;
		case 17:$fog = "dampness in the air";					break;
		case 18:$fog = "dust in the air";					break;
	}
	return $fog;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function soundWhereRoom()
{
	$sound = array('a faint', 'a loud', 'a quiet', 'an eerie', 'a strange', 'an odd', 'an echoey', 'a muffled', 'a distant', 'a close');
	return $sound[mt_rand(0,9)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function soundMakerRoom()
{
	$sound = "shuffling";
	switch (mt_rand(0,58))
	{
		case 0: $sound = "banging"; break;
		case 1: $sound = "slamming"; break;
		case 2: $sound = "bellowing"; break;
		case 3: $sound = "bonging"; break;
		case 4: $sound = "buzzing"; break;
		case 5: $sound = "chanting"; break;
		case 6: $sound = "chiming"; break;
		case 7: $sound = "chirping"; break;
		case 8: $sound = "clanking"; break;
		case 9: $sound = "clashing"; break;
		case 10: $sound = "clicking"; break;
		case 11: $sound = "coughing"; break;
		case 12: $sound = "creaking"; break;
		case 13: $sound = "drumming"; break;
		case 14: $sound = "walking"; break;
		case 15: $sound = "dripping"; break;
		case 16: $sound = "glopping"; break;
		case 17: $sound = "crying"; break;
		case 18: $sound = "scraping"; break;
		case 19: $sound = "giggling"; break;
		case 20: $sound = "gong"; break;
		case 21: $sound = "grating"; break;
		case 22: $sound = "groaning"; break;
		case 23: $sound = "grunting"; break;
		case 24: $sound = "hissing"; break;
		case 25: $sound = "hooting"; break;
		case 26: $sound = "trumpeting"; break;
		case 27: $sound = "howling"; break;
		case 28: $sound = "humming"; break;
		case 29: $sound = "jingling"; break;
		case 30: $sound = "knocking"; break;
		case 31: $sound = "laughing"; break;
		case 32: $sound = "moaning"; break;
		case 33: $sound = "murmuring"; break;
		case 34: $sound = "musical"; break;
		case 35: $sound = "rattling"; break;
		case 36: $sound = "ringing"; break;
		case 37: $sound = "roaring"; break;
		case 38: $sound = "rustling"; break;
		case 39: $sound = "scratching"; break;
		case 40: $sound = "screaming"; break;
		case 41: $sound = "scuttling"; break;
		case 42: $sound = "shuffling"; break;
		case 43: $sound = "slithering"; break;
		case 44: $sound = "snapping"; break;
		case 45: $sound = "sneezing"; break;
		case 46: $sound = "sobbing"; break;
		case 47: $sound = "splashing"; break;
		case 48: $sound = "splintering"; break;
		case 49: $sound = "squeaking"; break;
		case 50: $sound = "squealing"; break;
		case 51: $sound = "tapping"; break;
		case 52: $sound = "thudding"; break;
		case 53: $sound = "thumping"; break;
		case 54: $sound = "tinkling"; break;
		case 55: $sound = "twanging"; break;
		case 56: $sound = "whining"; break;
		case 57: $sound = "whispering"; break;
		case 58: $sound = "whistling"; break;
	}
	return $sound;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////

function mapMood($map,$atmo)
{

  if ($map == "Ruined City")
  {
	if ($atmo > mt_rand(1,100)){$mood = mt_rand(1,59);} else {$mood = mt_rand(60,100);}
	$seer = mt_rand(0,19);

	if ($seer == 0){$seeing = ". Most of the ceiling seems to be caved in";}
	else if ($seer == 1){$seeing = ". The entire structure seems to creak and moan from age";}
	else if ($seer == 2){$seeing = ". Most of the walls are crumbling in certain areas";}
	else if ($seer == 3){$seeing = ". The floor is warped and cracked in places";}
	else if ($seer == 4){$seeing = ". Most of the windows seem oddly intact";}
	else if ($seer < 7)
	{
		if (($x_terrain == "PD") || ($x_terrain == "DS"))
		{
			if ($seer == 5){$seeing = ". There are areas covered from the blowing desert sands";}
			else if ($seer == 6){$seeing = ". There are odd " . candleColor(0) . " cactus looking plants around";}
		}
		else if (($x_terrain == "CF") || ($x_terrain == "CH") || ($x_terrain == "CM") || ($x_terrain == "CP") || ($x_terrain == "CD"))
		{
			if ($seer == 5){$seeing = ". There are areas covered from the drifting snow";}
			else if ($seer == 6){$seeing = ". There are many icicles hanging from parts of the ceiling";}
		}
		else
		{
			if ($seer == 5){$seeing = ". " . PAgrowthMaker();}
			else if ($seer == 6){$seeing = ". Tall grasses seem to cover most of the floor";}
		}
	}
	else if ($seer == 7){$seeing = ". It appears an explosion may have happened here in the past";}
	else if ($seer == 8){$seeing = ". There are chunks of the wall and ceiling on the floor";}
	else if ($seer == 9){$seeing = ". The walls seem covered in bullet holes";}
	else if ($seer == 10){$seeing = ". The walls seem scorched in places from laser fire";}
	else if ($seer == 11){$seeing = ". There are scorch marks on the wall";}
	else if ($seer == 12){$seeing = ". Parts of the floor are sunken in";}
	else if ($seer == 13){$seeing = ". There are large holes in the ceiling";}
	else {$seeing = "";}

	if ($mood < 60)
	{
		switch (mt_rand(0,4))
		{
			case 0:	$feeling = "This building seems normal for this type of place";						break;
			case 1:	$feeling = "This building appears similar to the rest of the city";					break;
			case 2:	$feeling = "This building looks average compared with other sections of this city";	break;
			case 3:	$feeling = "This building is pretty unextraordinary at first glance";				break;
			case 4:	$feeling = "This building seems plain when you first look upon it";					break;
		}
	}
	else if ($mood < 85){$feeling = "The inside of this building " . smellMakerRoom();} 
	else if ($mood < 95){$feeling = "The inside of this building " . smellMakerRoom() . " and has a " . fogMakerRoom();} 
	else {$feeling = "The inside of this building has " . fogMakerRoom();}
	if (mt_rand(1,100) > 90){$feeling = $feeling . ". You can make out " . soundWhereRoom() . " " . soundMakerRoom() . " sound coming from somewhere";}
  }
  else if ($map == "Building")
  {
	if ($atmo > mt_rand(1,100)){$mood = mt_rand(1,59);} else {$mood = mt_rand(60,100);}
	$seer = mt_rand(0,17);

	if ($seer == 0){$seeing = ". Most of the ceiling seems to be caved in";}
	else if ($seer == 1){$seeing = ". The entire room seems to creak and moan from age";}
	else if ($seer == 2){$seeing = ". Some of the walls are crumbling in certain areas";}
	else if ($seer == 3){$seeing = ". The floor is warped and cracked in places";}
	else if ($seer == 4){$seeing = ". Most of the walls seem oddly intact";}
	else if ($seer == 5){$seeing = ". It appears an explosion may have happened here in the past";}
	else if ($seer == 6){$seeing = ". There are chunks of the wall and ceiling on the floor";}
	else if ($seer == 7){$seeing = ". The walls seem covered in bullet holes";}
	else if ($seer == 8){$seeing = ". The walls seem scorched in places from laser fire";}
	else if ($seer == 9){$seeing = ". There are scorch marks on the wall";}
	else if ($seer == 10){$seeing = ". Parts of the floor are sunken in";}
	else if ($seer == 11){$seeing = ". There are large holes in the ceiling";}
	else {$seeing = "";}

	if ($mood < 60)
	{
		switch (mt_rand(0,4))
		{
			case 0:	$feeling = "This room seems normal for this type of building";						break;
			case 1:	$feeling = "This room appears similar to the rest of the building";					break;
			case 2:	$feeling = "This room looks average compared with other sections of this building";	break;
			case 3:	$feeling = "This room is pretty unextraordinary at first glance";					break;
			case 4:	$feeling = "This room seems plain when you first look upon it";						break;
		}
	}
	else if ($mood < 85){$feeling = "The inside of this room " . smellMakerRoom();} 
	else if ($mood < 95){$feeling = "The inside of this room " . smellMakerRoom() . " and has a " . fogMakerRoom();} 
	else {$feeling = "The inside of this room has " . fogMakerRoom();}
	if (mt_rand(1,100) > 90){$feeling = $feeling . ". You can make out " . soundWhereRoom() . " " . soundMakerRoom() . " sound coming from somewhere";}
  }
  else
  {
	if ($atmo > mt_rand(1,100)){$mood = mt_rand(1,59);} else {$mood = mt_rand(60,100);}
	$seer = mt_rand(0,17);

	if ($seer == 0){$seeing = ". Most of the ceiling seems to be rusted and corroded";}
	else if ($seer == 1){$seeing = ". The entire room seems to have some lights that flicker";}
	else if ($seer == 2){$seeing = ". Some of the walls have various computer panels";}
	else if ($seer == 3){$seeing = ". The floor is covered in dried chemicals of varying colors";}
	else if ($seer == 4){$seeing = ". Most of the walls seem oddly untouched";}
	else if ($seer == 5){$seeing = ". It appears an explosion may have occurred in here";}
	else if ($seer == 6){$seeing = ". There are chunks of the wall and ceiling on the floor";}
	else if ($seer == 7){$seeing = ". The walls seem dented inward in certain spots";}
	else if ($seer == 8){$seeing = ". The walls seem scorched in places from weapons fire";}
	else if ($seer == 9){$seeing = ". There are scorch marks on the wall";}
	else if ($seer == 10){$seeing = ". Parts of the floor have small holes melted into it";}
	else if ($seer == 11){$seeing = ". There are many smashed computer consoles on the wall";}
	else {$seeing = "";}

	if ($mood < 60)
	{
		switch (mt_rand(0,4))
		{
			case 0:	$feeling = "This room seems normal for this type of ship";						break;
			case 1:	$feeling = "This room appears similar to the rest of the ship";					break;
			case 2:	$feeling = "This room looks average compared with other sections of this ship";	break;
			case 3:	$feeling = "This room is pretty unextraordinary at first glance";				break;
			case 4:	$feeling = "This room seems plain when you first look upon it";					break;
		}
	}
	else if ($mood < 85){$feeling = "The inside of this room " . smellMakerRoom();} 
	else if ($mood < 95){$feeling = "The inside of this room " . smellMakerRoom() . " and has a " . fogMakerRoom();} 
	else {$feeling = "The inside of this room has " . fogMakerRoom();}
	if (mt_rand(1,100) > 90){$feeling = $feeling . ". You can make out " . soundWhereRoom() . " " . soundMakerRoom() . " sound coming from somewhere";}
  }
	return $feeling . $seeing;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAgrowthMaker()
{
	switch (mt_rand(0,6))
	{
		case 0:	$plant = "vines";			break;
		case 1:	$plant = "weeds";			break;
		case 2:	$plant = "mushrooms";		break;
		case 3:	$plant = "flowers";			break;
		case 4:	$plant = "bushes";			break;
		case 5:	$plant = "thorny vines";	break;
		case 6:	$plant = "thorny bushes";	break;
	}
	switch (mt_rand(0,5))
	{
		case 0:	$size = "small";	break;
		case 1:	$size = "thin";		break;
		case 2:	$size = "large";	break;
		case 3:	$size = "thick";	break;
		case 4:	$size = "tall";		break;
		case 5:	$size = "rotten";	break;
	}
	switch (mt_rand(0,5))
	{
		case 0:	$where = "on the ceiling";				break;
		case 1:	$where = "on the walls";				break;
		case 2:	$where = "on the floor";				break;
		case 3:	$where = "on the floor and walls";		break;
		case 4:	$where = "on the walls and ceiling";	break;
		case 5:	$where = "all over";					break;
	}
	$weed = "There are " . $size . " " . candleColor(0) . " " . $plant . " growing " . $where;
	return $weed;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function weather($climate)
{
	switch (mt_rand(0,5))
	{
		case 0:	$time = "most of the day";					break;
		case 1:	$time = "during the morning";				break;
		case 2:	$time = "during the night";					break;
		case 3:	$time = "during the middle of the day";		break;
		case 4:	$time = "all day";							break;
		case 5:	$time = "all day and night";				break;
	}

	$looks = mt_rand(1,100);

	if ($climate == "cold") ///////////////////////////////////////////////////////////
	{
		switch (mt_rand(0,3))
		{
			case 0:	$feel = "chilly";	break;
			case 1:	$feel = "cold";		break;
			case 2:	$feel = "frigid";	break;
			case 3:	$feel = "freezing";	break;
		}
			if ($looks > 85){$look = "is sunny";}
			else if ($looks > 75){$look = "is clear";}
			else if ($looks > 30){$look = "is cloudy"; $rain = 1;}
			else if ($looks > 20){$look = "is hazy";}
			else if ($looks > 10){$look = "has an overcast";}
			else {$look = "is filled with storm clouds"; $rain = 1;}

		$air = "is quite calm";
		switch (mt_rand(0,7))
		{
			case 0:	$air = "is breezy";			break;
			case 1:	$air = "is windy";			break;
			case 2:	$air = "is foggy";			break;
			case 3:	$air = "has gusting winds";	break;
		}
		$drops = ", with no precipitation for the day";
		if ($rain > 0)
		{
			switch (mt_rand(0,7))
			{
				case 0:	$drops = ", with snow falling " . $time;			break;
				case 1:	$drops = ", with hail falling " . $time;			break;
				case 2:	$drops = ", with freezing rain falling " . $time;	break;
				case 3:	$drops = ", with a blizzard " . $time;				break;
			}
		}
	}
	else if ($climate == "mountains") /////////////////////////////////////////////////
	{
		switch (mt_rand(0,3))
		{
			case 0:	$feel = "chilly";	break;
			case 1:	$feel = "cold";		break;
			case 2:	$feel = "frigid";	break;
			case 3:	$feel = "mild";		break;
		}
			if ($looks > 85){$look = "is sunny";}
			else if ($looks > 75){$look = "is clear";}
			else if ($looks > 30){$look = "is cloudy"; $rain = 1;}
			else if ($looks > 20){$look = "is hazy";}
			else if ($looks > 10){$look = "has an overcast";}
			else {$look = "is filled with storm clouds"; $rain = 1;}

		switch (mt_rand(0,4))
		{
			case 0:	$air = "is breezy";			break;
			case 1:	$air = "is windy";			break;
			case 2:	$air = "is foggy";			break;
			case 3:	$air = "has gusting winds";	break;
			case 4:	$air = "is quite calm";		break;
		}
		$drops = ", with no precipitation for the day";
		if ($rain > 0)
		{
			switch (mt_rand(0,10))
			{
				case 0:	$drops = ", with snow falling " . $time;			break;
				case 1:	$drops = ", with hail falling " . $time;			break;
				case 2:	$drops = ", with freezing rain falling " . $time;	break;
				case 3:	$drops = ", with some slight drizzle " . $time;		break;
				case 4:	$drops = ", with rain falling " . $time;			break;
				case 5:	$drops = ", with a downpour " . $time;				break;
				case 6:	$drops = ", with a thunderstorm " . $time;			break;
			}
		}
	}
	else if ($climate == "desert") ////////////////////////////////////////////////////
	{
		switch (mt_rand(0,2))
		{
			case 0:	$feel = "hot";			break;
			case 1:	$feel = "mild";			break;
			case 2:	$feel = "sweltering";	break;
		}
			if ($looks > 40){$look = "is sunny";}
			else if ($looks > 10){$look = "is clear";}
			else {$look = "is cloudy"; $rain = 1;}

		$air = "is quite calm";
		switch (mt_rand(0,5))
		{
			case 0:	$air = "is breezy";			break;
			case 1:	$air = "is windy";			break;
			case 2:	$air = "has gusting winds";	break;
		}
		$drops = ", with no precipitation for the day";
		if ($rain > 0)
		{
			$sky = mt_rand(1,100);
			if ($sky > 90){$drops = ", with slight rain falling " . $time;}
			else if ($sky > 80){$drops = ", with a sandstorm " . $time;}
		}
	}
	else if ($climate == "tropics") ///////////////////////////////////////////////////
	{
		switch (mt_rand(0,2))
		{
			case 0:	$feel = "hot";		break;
			case 1:	$feel = "mild";		break;
			case 2:	$feel = "warm";		break;
		}
			if ($looks > 80){$look = "is sunny";}
			else if ($looks > 60){$look = "is clear";}
			else if ($looks > 20){$look = "is cloudy"; $rain = 1;}
			else if ($looks > 15){$look = "is hazy";}
			else if ($looks > 10){$look = "has an overcast";}
			else {$look = "is filled with storm clouds"; $rain = 1;}

		$air = "is quite calm";
		switch (mt_rand(0,5))
		{
			case 0:	$air = "is breezy";			break;
			case 1:	$air = "is windy";			break;
			case 2:	$air = "is humid";			break;
		}
		$drops = ", with no precipitation for the day";
		if ($rain > 0)
		{
			switch (mt_rand(0,5))
			{
				case 0:	$drops = ", with some slight drizzle " . $time;		break;
				case 1:	$drops = ", with rain falling " . $time;			break;
				case 2:	$drops = ", with a downpour " . $time;				break;
				case 3:	$drops = ", with a thunderstorm " . $time;			break;
			}
		}
	}
	else if ($climate == "sea") ///////////////////////////////////////////////////////
	{
		switch (mt_rand(0,4))
		{
			case 0:	$feel = "chilly";	break;
			case 1:	$feel = "cold";		break;
			case 2:	$feel = "hot";		break;
			case 3:	$feel = "mild";		break;
			case 4:	$feel = "warm";		break;
		}
			if ($looks > 75){$look = "is sunny";}
			else if ($looks > 50){$look = "is clear";}
			else if ($looks > 25){$look = "is cloudy"; $rain = 1;}
			else if ($looks > 15){$look = "is hazy";}
			else if ($looks > 5){$look = "has an overcast";}
			else {$look = "is filled with storm clouds"; $rain = 1;}

		switch (mt_rand(0,7))
		{
			case 0:	$air = "is breezy";			break;
			case 1:	$air = "is windy";			break;
			case 2:	$air = "is windy";			break;
			case 3:	$air = "is foggy";			break;
			case 4:	$air = "is humid";			break;
			case 5:	$air = "has gusting winds";	break;
			case 6:	$air = "has gusting winds";	break;
			case 7:	$air = "is quite calm";		break;
		}
		$drops = ", with no precipitation for the day";
		if ($rain > 0)
		{
			switch (mt_rand(0,7))
			{
				case 0:	$drops = ", with some slight drizzle " . $time;		break;
				case 1:	$drops = ", with rain falling " . $time;			break;
				case 2:	$drops = ", with a downpour " . $time;				break;
				case 3:	$drops = ", with a thunderstorm " . $time;			break;
			}
		}
	}
	else //////////////////////////////////////////////////////////////////////////////
	{
		switch (mt_rand(0,4))
		{
			case 0:	$feel = "chilly";	break;
			case 1:	$feel = "cold";		break;
			case 2:	$feel = "hot";		break;
			case 3:	$feel = "mild";		break;
			case 4:	$feel = "warm";		break;
		}
			if ($looks > 75){$look = "is sunny";}
			else if ($looks > 50){$look = "is clear";}
			else if ($looks > 25){$look = "is cloudy"; $rain = 1;}
			else if ($looks > 15){$look = "is hazy";}
			else if ($looks > 5){$look = "has an overcast";}
			else {$look = "is filled with storm clouds"; $rain = 1;}

		$air = "is quite calm";
		switch (mt_rand(0,9))
		{
			case 0:	$air = "is breezy";			break;
			case 1:	$air = "is windy";			break;
			case 2:	$air = "is foggy";			break;
			case 3:	$air = "is humid";			break;
			case 4:	$air = "has gusting winds";	break;
		}
		$drops = ", with no precipitation for the day";
		if ($rain > 0)
		{
			switch (mt_rand(0,7))
			{
				case 0:	$drops = ", with some slight drizzle " . $time;		break;
				case 1:	$drops = ", with rain falling " . $time;			break;
				case 2:	$drops = ", with a downpour " . $time;				break;
				case 3:	$drops = ", with a thunderstorm " . $time;			break;
			}
		}
	}

	$weather = "The temperature feels " . $feel . " and the sky " . $look . ". The air " . $air . $drops . ".";

	return $weather;
}
?>