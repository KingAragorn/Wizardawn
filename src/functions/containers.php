<?php

function PAbagCreator($map)
{
	if (($map == "Spaceship") || ($map == "Exodus Spaceship"))
	{
		switch (mt_rand(0,6))
		{
			case 0:	$make = "bag";			break;
			case 1:	$make = "sack";			break;
			case 2:	$make = "mining bag";	break;
			case 3:	$make = "backpack";		break;
			case 4:	$make = "medical bag";	break;
			case 5:	$make = "tool pouch";	break;
			case 6:	$make = "pouch";		break;
		}
		switch (mt_rand(0,3))
		{
			case 0:	$model = leatherColor() . " nylon";	break;
			case 1:	$model = "woven titanium mesh";			break;
			case 2:	$model = candleColor(0) . " cloth";	break;
			case 3:	$model = leatherColor() . " silicon";	break;
		}
	}
	else
	{
		switch (mt_rand(0,6))
		{
			case 0:	$make = "bag";			$m1=0; $m2=4;	break;
			case 1:	$make = "sack";			$m1=0; $m2=4;	break;
			case 2:	$make = "satchel";		$m1=0; $m2=4;	break;
			case 3:	$make = "backpack";		$m1=0; $m2=4;	break;
			case 4:	$make = "duffel bag";	$m1=0; $m2=4;	break;
			case 5:	$make = "garbage bag";	$m1=5; $m2=5;	break;
			case 6:	$make = "briefcase";	$m1=0; $m2=2;	break;
		}
		switch (mt_rand($m1,$m2))
		{
			case 0:	$model = leatherColor() . " leather";	break;
			case 1:	$model = "leather";			break;
			case 2:	$model = leatherColor() . " canvas";	break;
			case 3:	$model = candleColor(0) . " cloth";	break;
			case 4:	$model = candleColor(0) . " nylon";	break;
			case 5:	$model = candleColor(0) . " plastic";	break;
		}
	}
	return $model . " " . $make;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function PAboxMakerRoom($tech)
{
  if ($tech == 1)
  {
	switch (mt_rand(0,9))
	{
		case 0:	$safe = 1; $box = "metal safe with a bio-mechanical lock";	break;
		case 1:	$safe = 1; $box = "metal safe with a keypad combination in odd alien symbols";	break;
		case 2:	$safe = 1; $box = "metal safe with a broken door";	break;
		case 3:	$make = "chest";		break;
		case 4:	$make = "trunk";		break;
		case 5:	$make = "footlocker";	break;
		case 6:	$make = "case";			break;
		case 7:	$make = "desk";			break;
		case 8:	$make = "cabinet";		break;
		case 9:	$make = "box";			break;
	}

	if ($safe != 1)
	{
		if (mt_rand(1,100) > 50){$lock = "retina scanner lock";} else {$lock = "thermal scanner lock";}

		switch (mt_rand(0,3))
		{
			case 0:	$box = "metal " . $make . " with a " . $lock;			break;
			case 1:	$box = "metal " . $make . " with a broken " . $lock;	break;
			case 2:	$box = "metal " . $make;								break;
			case 3:	$box = "hard plastic " . $make;							break;
		}
	}
  }
  else
  {
	switch (mt_rand(0,9))
	{
		case 0:	$safe = 1; $box = "steel safe with a dial combination of " . mt_rand(1,39) . "R " . mt_rand(1,39) . "L " . mt_rand(1,39) . "R";	break;
		case 1:	$safe = 1; $box = "steel safe with a keypad combination of " . mt_rand(0,9) . mt_rand(0,9) . mt_rand(0,9) . mt_rand(0,9);	break;
		case 2:	$safe = 1; $box = "steel safe with a broken door";	break;
		case 3:	$make = "chest";		break;
		case 4:	$make = "trunk";		break;
		case 5:	$make = "footlocker";	break;
		case 6:	$make = "case";			break;
		case 7:	$make = "desk";			break;
		case 8:	$make = "cabinet";		break;
		case 9:	$make = "box";			break;
	}

	if ($safe != 1)
	{
		if (mt_rand(1,100) > 50){$lock = "locked padlock";} else {$lock = "locked keyhole";}

		switch (mt_rand(0,3))
		{
			case 0:	$box = woodenType() . " " . $make . " with a " . $lock;	break;
			case 1:	$box = "iron " . $make . " with a " . $lock;			break;
			case 2:	$box = woodenType() . " " . $make;						break;
			case 3:	$box = "iron " . $make;									break;
		}
	}
  }
	return $box;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function lockerMaker()
{
	switch (mt_rand(0,6))
	{
		case 0:	$box = "box";			break;
		case 1:	$box = "cabinet";		break;
		case 2:	$box = "footlocker";	break;
		case 3:	$box = "chest";			break;
		case 4:	$box = "crate";			break;
		case 5:	$box = "casket";		break;
		case 6:	$box = "trunk";			break;
	}
	return $box;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function bagCreator()
{
	switch (mt_rand(0,6))
	{
		case 0:	$make = "bag";		break;
		case 1:	$make = "sack";		break;
		case 2:	$make = "satchel";	break;
		case 3:	$make = "backpack";	break;
		case 4:	$make = "rucksack";	break;
		case 5:	$make = "knapsack";	break;
		case 6:	$make = "pouch";	break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$model = leatherColor() . " leather";	break;
		case 1:	$model = "leather";			break;
		case 2:	$model = candleColor(0) . " cloth";	break;
		case 3:	$model = leatherColor() . " canvas";	break;
	}

	return $model . " " . $make;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function boxMakerRoom()
{
	switch (mt_rand(0,7))
	{
		case 0:	$make = "chest";	break;
		case 1:	$make = "trunk";	break;
		case 2:	$make = "footlocker";	break;
		case 3:	$make = "case";		break;
		case 4:	$make = "casket";	break;
		case 5:	$make = "strongbox";	break;
		case 6:	$make = "box";		break;
		case 7:	$make = "coffer";	break;
	}
	if (mt_rand(1,100) > 50){$lock = "locked padlock";} else {$lock = " locked keyhole";}

	switch (mt_rand(0,3))
	{
		case 0:	$box = woodenType() . " " . $make . " with a " . $lock;	break;
		case 1:	$box = "iron " . $make . " with a " . $lock;		break;
		case 2:	$box = woodenType() . " " . $make;			break;
		case 3:	$box = "iron " . $make;					break;
	}
	return $box;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function lootHider()
{
	$where = mt_rand(1,100);

	if ($where < 35){$hide = "is hidden under a concealed floor panel";}
	else if ($where < 70){$hide = "is hidden behind a concealed wall panel";}
	else if ($where < 80){$hide = "is hidden above a concealed ceiling panel";}
	else if ($where < 85){$hide = "is in a nearby secret room";}
	else if ($where < 90){$hide = "is invisible by magical means";}
	else if ($where < 95){$hide = "is behind an illusionary wall";}
	else {$hide = "is illusioned to look like something else";}

	return $hide;
}
?>