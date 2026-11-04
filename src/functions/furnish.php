<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function furnishRoom($game,$cut,$level)
{
	$chance = 5;

	if (mt_rand(1,$chance) == 1){$furnish = $furnish . "floor_";}
	if (mt_rand(1,$chance) == 1){$furnish = $furnish . "ceiling_";}
	if (mt_rand(1,$chance) == 1){$furnish = $furnish . "northfloor_";}
	if (mt_rand(1,$chance) == 1){$furnish = $furnish . "southfloor_";}
	if (mt_rand(1,$chance) == 1){$furnish = $furnish . "eastfloor_";}
	if (mt_rand(1,$chance) == 1){$furnish = $furnish . "westfloor_";}
	if (mt_rand(1,$chance) == 1){$furnish = $furnish . "northwall_";}
	if (mt_rand(1,$chance) == 1){$furnish = $furnish . "southwall_";}
	if (mt_rand(1,$chance) == 1){$furnish = $furnish . "eastwall_";}
	if (mt_rand(1,$chance) == 1){$furnish = $furnish . "westwall_";}
	if (mt_rand(1,$chance) == 1){$furnish = $furnish . "scatter_";}

	$decorate = explode("_", $furnish);
	shuffle($decorate);
	$decorations = count($decorate);
	$i = 0;

	while ($decorations > 0) :

		$decorations = $decorations - 1;
		if ($decorate[$i] != "")
		{
			$item = decorateRoom($decorate[$i],$game,$cut);
			$furnishings = $furnishings . $item[0];
			if ($item[1] != ""){$hide = $hide . $item[1] . "#";}
			if ($item[2] != ""){$fill = $fill . $item[2] . "#";}
		}
		$i = $i + 1;

	endwhile;

	if ($furnish == "")
	{
		$hide = 0;
		$fill = 0;

		switch (mt_rand(0,10))
		{
			case 0:	$furnishings = "This room is completely empty."; break;
			case 1:	$furnishings = "This room is totally empty."; break;
			case 2:	$furnishings = "This room had been emptied long ago."; break;
			case 3:	$furnishings = "This room had been emptied recently."; break;
			case 4:	$furnishings = "This room has nothing within."; break;
			case 5:	$furnishings = "This room is void of anything."; break;
			case 6:	$furnishings = "This room is totally bare."; break;
			case 7:	$furnishings = "This room is bare of anything."; break;
			case 8:	$furnishings = "This room is completly bare."; break;
			case 9:	$furnishings = "This room seems to have nothing in it."; break;
			case 10:$furnishings = "This room has nothing in it."; break;
		}
	}

	return array($furnishings,$hide,$fill);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function decorateRoom($decorate,$game,$cut)
{
	$area = "center";
	switch (mt_rand(0,12))
	{
		case 0:	$area = "north end";		break;
		case 1:	$area = "northeast end";	break;
		case 2:	$area = "northwest end";	break;
		case 3:	$area = "south end";		break;
		case 4:	$area = "southeast end";	break;
		case 5:	$area = "southwest end";	break;
		case 6:	$area = "east end";			break;
		case 7:	$area = "west end";			break;
	}

	if ($decorate == "floor")
	{
		$item = decorateRoomFloor($game,$cut);
		$furniture = "There " . $item[0] . " at the " . $area . " of the room";
	}
	else if ($decorate == "ceiling")
	{
		$item = decorateRoomCeiling($game,$cut);
		$furniture = "There " . $item[0] . " on the " . $area . " of the ceiling";
	}
	else if (($decorate == "northfloor") || ($decorate == "southfloor") || ($decorate == "eastfloor") || ($decorate == "westfloor"))
	{
		if ($decorate == "northfloor"){$area = "by the northern wall";}
		else if ($decorate == "southfloor"){$area = "by the southern wall";}
		else if ($decorate == "eastfloor"){$area = "by the eastern wall";}
		else {$area = "by the western wall";}
		$item = decorateRoomNearWall($game,$cut);
		$furniture = "There " . $item[0] . " " . $area;
	}
	else if (($decorate == "northwall") || ($decorate == "southwall") || ($decorate == "eastwall") || ($decorate == "westwall"))
	{
		if ($decorate == "northwall"){$area = "on the north wall";}
		else if ($decorate == "southwall"){$area = "on the south wall";}
		else if ($decorate == "eastwall"){$area = "on the east wall";}
		else {$area = "on the west wall";}
		$item = decorateRoomWall($game,$cut);
		$furniture = "There " . $item[0] . " " . $area;
	}
	else
	{
		$item = decorateRoomScatter($game,$cut);
		$furniture = "There is " . $item[0] . "...scattered around the room";
	}

	if ($item[2] > 0) ///// ARE THEIR ANY LOOT HIDING SPOTS ? /////
	{
		$hidespot = $item[1] . "|" . $item[2];
	}

	if ($item[3] != "") ///// ARE THERE THINGS TO PUT IN STUFF ? /////
	{
		if ($item[4] != ""){ $filler = $item[4] . "|" . $item[3]; }
		else { $filler = $item[1] . "|" . $item[3]; }
	}

	$stuff = $furniture . ". ";

	return array($stuff,$hidespot,$filler);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function decorateAlot()
{
	switch (mt_rand(0,5))
	{
		case 0:	$word = "are some";			break;
		case 1:	$word = "is alot of";		break;
		case 2:	$word = "are many";			break;
		case 3:	$word = "are faint";		break;
		case 4:	$word = "is a few";			break;
		case 5:	$word = "is a bunch of";	break;
	}
	return $word;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function decorateRoomWall($game,$cut)
{
	switch (mt_rand(0,27))
	{
		case 0:		$stuff = "is " . mt_rand(2,5) . " feet of " . conditionType(iron) . "iron chain hanging";	break;
		case 1:		$stuff = decorateAlot() . " cobwebs";		break;
		case 2:		$stuff = decorateAlot() . " cracks";		break;
		case 3:		$stuff = decorateAlot() . " blood smears";	break;
		case 4:		$stuff = decorateAlot() . " areas of dried blood";	break;
		case 5:		$stuff = "is " . mt_rand(10,50) . " feet of " . conditionType(cloth) . " rope hanging";	break;
		case 6:		$bag = conditionType(item) . bagCreator();
					$stuff = "is a " . $bag . " hanging";
						$loot = "inside the " . $bag . " on the wall";
						$fill = 8; // BAG
						$size=1;
					break;
		case 7:		$rack = conditionType(wood) . woodenType() . " armor rack";
					$stuff = "is a " . $rack . " hanging";
						$loot = "on the " . $rack;
						$fill = 1; // ARMOR
						$size=0;
					break;
		case 8:		$stuff = decorateAlot() . " scratches and claw marks";	break;
		case 9:		$stuff = "is a fireplace"; if (mt_rand(1,2) == 1){$stuff = "is a fireplace with wood inside";}
						$loot = "inside the fireplace";
						$stuf = "on the mantle of the fireplace";
						$fill = 10; // ONE THING
						$size=3;
					break;
		case 10:	$head = "mounted " . headMount() . " head";
					$stuff = "is a " . $head;
						$loot = "inside the " . $head;
						$size=1;
					break;
		case 11:	$stuff = "are " . mt_rand(2,10) . " " . conditionType(iron) . steelMaker() . " wall sconces";
							if (mt_rand(1,2) == 1){$stuff = $stuff . " with " . candleColor(0) . " candles";}
							else if (mt_rand(1,2) == 1){$stuff = $stuff . " with " . candleColor(0) . ", burned down candles";}
						break;
		case 12:	$shelf = furnitureMake() . " shelf";
					$stuff = "is a " . $shelf . " hanging";
						$loot = "on top of the hanging " . $shelf;
						$fill = 9; // SHELF
						$size=3;
					break;
		case 13:	$stuff = "is a " . conditionType(iron) . steelMaker() . " shield hanging";	break;
		case 14:	$basin = furnitureMake() . " wall basin";
					$stuff = "is a " . $basin;
						if (mt_rand(1,3) > 1){$stuff = $stuff . ", filled with " . conditionType(water) . "water";}
						$loot = "inside the " . $basin;
						$size=1;
					break;
		case 15:	$mirror = sizeMakeWall() . " " . conditionType(iron) . steelMaker() . " mirror";
					$stuff = "is a " . $mirror . " hanging";
						$loot = "behind the " . $mirror;
						$size=3;
					break;
		case 16:	$painting = paintingMaker(1,1);
					$stuff = "is a " . $painting;
						$loot = "behind a " . $painting;
						$size=3;
					break;
		case 17:	$tapestry = paintingMaker(1,0);
					$stuff = "is a " . $tapestry;
						$loot = "behind a " . $tapestry;
						$size=3;
					break;
		case 18:	$corpse = corpseMaker();
					$stuff = "are " . conditionType(iron) . steelMaker() . " manacles with a " . $corpse;
						$loot = "on a " . $corpse;
						$fill = 3; // CORPSE
						$size=3;
					break;
		case 19:	$rack = conditionType(wood) . woodenType() . " weapon rack";
					$stuff = "is a " . $rack . " hanging";
						$loot = "on the " . $rack;
						$fill = 2; // WEAPONS
						$size=0;
					break;
		case 20:	$stuff = "is " . mt_rand(2,10) . "0 feet of twine hanging";	break;
		case 21:	$stuff = "are " . drawWith() . " drawings of " . drawingTypes();	break;
		case 22:	$stuff = "are " . drawWith() . " writings that " . chickenScratch($game);	break;
		case 23:	$shelf = conditionType(wood) . woodenType() . " cupboard";
					$stuff = "is a " . $shelf . " hanging";
						$loot = "inside the " . $shelf;
						$fill = 4; // FOOD
						$size=1;
					break;
		case 24:	$stuff = "are " . mt_rand(2,10) . " " . conditionType(iron) . "" . steelMaker() . " hooks";	break;
		case 25:		$torches = mt_rand(5,10);
						$stuff = "are " . $torches . " torches held in " . steelMaker() . " wall sconces [only " . ceil($torches/mt_rand(2,4)) . " are useable]";
					break;
		case 26:	$stuff = "are " . conditionType(iron) . steelMaker() . " manacles";	break;
		case 27:	$stuff = decorateAlot() . " areas of moisture";
						if (mt_rand(1,10) == 1){$stuff = "is " . itisStrange() . " " . candleColor(1) . " liquid";}
						if (mt_rand(1,10) == 1){$stuff = "is " . itisStrange() . " " . slimeColor() . " slime";}
					break;
	}
	return array($stuff,$loot,$size,$fill,$stuf);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function decorateRoomNearWall($game,$cut)
{
	switch (mt_rand(0,31))
	{
		case 0:	$chair = furnitureMake() . " armchair";
				$stuff = "is a " . $chair;
						$loot = "under the " . $chair;
						$stuf = "on the " . $chair;
						$fill = 10; // ONE THING
						$size=1;
					break;
		case 1:	$bed = conditionType(wood) . woodenType() . " bed";
				$stuff = "is a " . $bed;
						$loot = "under the " . $bed;
						$stuf = "on the " . $bed;
						$fill = 11; // FEW THINGS
						$size=3;
					break;
		case 2:	$bench = furnitureMake() . " bench";
				$stuff = "is a " . $bench;
						$loot = "under the " . $bench;
						$stuf = "on the " . $bench;
						$fill = 10; // ONE THINGS
						$size=3;
					break;
		case 3:	$stuff = "is a " . conditionType(iron) . "brazier";	break;
		case 4:	$bed = conditionType(wood) . woodenType() . " bunk bed";
				$stuff = "is a " . $bed;
						$loot = "under the " . $bed;
						$stuf = "on the " . $bed;
						$fill = 11; // FEW THINGS
						$size=3;
					break;
		case 5:	$chair = furnitureMake() . " chair";
				$stuff = "is a " . $chair;
						$loot = "under the " . $chair;
						$stuf = "on the " . $chair;
						$fill = 10; // ONE THINGS
						$size=1;
					break;
		case 6:	$chair = "padded " . furnitureMake() . " chair";
				$stuff = "is a " . $chair;
						$loot = "under the " . $chair;
						$stuf = "on the " . $chair;
						$fill = 10; // ONE THINGS
						$size=1;
					break;
		case 7:	$couch = conditionType(cloth) . candleColor(0) . " couch";
				$stuff = "is a " . $couch;
						$loot = "under the " . $couch;
						$stuf = "on the " . $couch;
						$fill = 11; // FEW THINGS
						$size=1;
					break;
		case 8:	$stuff = "is a grindstone";	
						if (mt_rand(1,3) == 1){$stuff = "is a broken grindstone";}
						else if (mt_rand(1,3) == 1){$stuff = "is a worn down grindstone";}
					break;
		case 9:	$stuff = "is a " . conditionType(wood) . "loom";	break;
		case 10:	$bed = conditionType(cloth) . "mattress";
					$stuff = "is a " . $bed;
						$loot = "under the " . $bed;
						$stuf = "on the " . $bed;
						$fill = 11; // FEW THINGS
						$size=2;
					break;
		case 11:	$bed = conditionType(wood) . "pallet";
					$stuff = "is a " . $bed;
						$loot = "under the " . $bed;
						$stuf = "on the " . $bed;
						$fill = 11; // FEW THINGS
						$size=3;
					break;
		case 12:	$shelf = furnitureMake() . " shelf";
					$stuff = "is a " . $shelf;
						$loot = "on top of the " . $shelf;
						$fill = 9; // SHELF
						$size=1;
					break;
		case 13:	$stuff = "is a high " . woodenType() . " stool";	break;
		case 14:	$stuff = "is a " . conditionType(wood) . woodenType() . " stool";	break;
		case 15:	$table = sizeMake() . " " . furnitureMake() . " table";
					$stuff = "is a " . $table;
						$loot = "under the " . $table;
						$stuf = "on the " . $table;
						$fill = 11; // FEW THINGS
						$size=3;
					break;
		case 16:	$chair = furnitureMake() . " throne";
					$stuff = "is a " . $chair;
						$loot = "behind the " . $chair;
						$stuf = "on the " . $chair;
						$fill = 10; // ONE THINGS
						$size=3;
					break;
		case 17:	$tub = furnitureMake() . " tub";
					$stuff = "is a " . $tub;
						$loot = "inside the " . $tub;
						$size=3;
					break;
		case 18:	$bench = furnitureMake() . " workbench";
					$stuff = "is a " . $bench;
						$loot = "under the " . $bench;
						$stuf = "on the " . $bench;
						$fill = 11; // FEW THINGS
						$size=3;
					break;
		case 19:	$shelf = conditionType(wood) . woodenType() . " chest of drawers";
					$stuff = "is a " . $shelf;
						$loot = "inside the " . $shelf;
						$fill = 5; // CLOTHES
						$size=2;
					break;
		case 20:	$shelf = conditionType(wood) . woodenType() . " armoire";
					$stuff = "is a " . $shelf;
						$loot = "inside the " . $shelf;
						$fill = 5; // CLOTHES
						$size=3;
					break;
		case 21:	$rack = conditionType(wood) . woodenType() . " weapon rack";
					$stuff = "is a " . $rack;
						$loot = "on the " . $rack;
						$fill = 2; // WEAPONS
						$size=0;
					break;
		case 22:	$stuff = "is a " . conditionType(iron) . steelMaker() . " standing mirror";	break;
		case 23:	$stuff = "is " . kegFiller(keg,$game,$extra,$cut);	break;
		case 24:	$shelf = conditionType(wood) . woodenType() . " cupboard";
					$stuff = "is a " . $shelf;
						$loot = "inside the " . $shelf;
						$fill = 4; // FOOD
						$size=1;
					break;
		case 25:	$desk = conditionType(wood) . woodenType() . " desk";
					$stuff = "is a " . $desk;
						$loot = "inside the " . $desk;;
						if (mt_rand(1,2) == 1){$stuf = "on the " . $desk;}
						$fill = 6; // DESK
						$size=1;
					break;
		case 26:	$stuff = "is " . tortureMaker($game,$cut,1);
				if (mt_rand(1,10) > 6){ $stuff = $stuff . " with areas of dried blood"; }
				if (mt_rand(1,10) > 7)
				{
					$body = corpseMaker();
					$stuff = $stuff . " and has a " . $body;
					$loot = "on the " . $body;
					$fill = 3; // CORPSE
					$size=3;
				}
				break;
		case 27:	$cage = cageMaker();
					$stuff = "is " . $cage;
						$loot = "inside the " . $cage;
						$size=3;
					break;
		case 28:	$box = conditionType(wood) . woodenType() . " barrel";
					$stuff = "is a " . $box;
						$loot = "inside the " . $box;
						$size=2;
					break;
		case 29:	$box = lockerMaker();
					$stuff = "is a " . conditionType(wood) . woodenType() . " " . $box;
						if (mt_rand(1,4) == 1){ if (mt_rand(1,2) == 1){$stuff = $stuff . " that is locked with a padlock";} else {$stuff = $stuff . " that has a locked keyhole";} }
						$loot = "inside the " . $box;
						$fill = 7; // BOX
						$size=2;
					break;
		case 30:	$stuff = "is a " . cauldronMaker($game,$extra,$cut);
						$loot = "inside the cauldron";
						$size=2;
					break;
		case 31:	$rack = conditionType(wood) . woodenType() . " armor rack";
					$stuff = "is a " . $rack;
						$loot = "on the " . $rack;
						$fill = 1; // ARMOR
						$size=0;
					break;
	}
	return array($stuff,$loot,$size,$fill,$stuf);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function decorateRoomCeiling($game,$cut)
{
	switch (mt_rand(0,22))
	{
		case 0:		$stuff = "is " . mt_rand(2,5) . " feet of " . conditionType(iron) . "iron chain hanging";	break;
		case 1:		$stuff = decorateAlot() . " cobwebs";		break;
		case 2:		$stuff = decorateAlot() . " cracks";		break;
		case 3:		$stuff = decorateAlot() . " blood smears";	break;
		case 4:		$stuff = decorateAlot() . " areas of dried blood";	break;
		case 5:		$stuff = decorateAlot() . " areas of moisture";	break;
		case 6:		$stuff = decorateAlot() . " areas of water dripping";
						if (mt_rand(1,10) == 1){$stuff = decorateAlot() . " areas of " . itisStrange() . " " . candleColor(1) . " liquid dripping";}
						if (mt_rand(1,10) == 1){$stuff = decorateAlot() . " areas of " . itisStrange() . " " . slimeColor() . " slime";}
					break;
		case 7:		$stuff = decorateAlot() . " traces of moss";	if (mt_rand(1,2) == 1){$stuff = decorateAlot() . " traces of mold";} break;
		case 8:		$stuff = decorateAlot() . " fungi growing";
						if (mt_rand(1,10) == 1){$stuff = decorateAlot() . " areas of " . itisStrange() . " " . candleColor(0) . " fungi growing";}
					break;
		case 9:		$stuff = decorateAlot() . " areas of mold";
						if (mt_rand(1,10) == 1){$stuff = decorateAlot() . " areas of " . itisStrange() . " " . candleColor(0) . " mold";}
					break;
		case 10:	$stuff = "is " . mt_rand(10,50) . " feet of " . conditionType(cloth) . " rope hanging";	break;
		case 11:	$stuff = decorateAlot() . " scratches and claw marks"; break;
		case 12:	$stuff = "is a " . conditionType(iron) . "brazier with a " . mt_rand(1,3) . " foot " . conditionType(iron) . " iron chain hanging"; break;
		case 13:	$stuff = "is a " . conditionType(wood) . woodenType() . " chandelier";
						if (mt_rand(1,2) == 1){$stuff = "is a " . conditionType(iron) . steelMaker() . " chandelier";}
						if (mt_rand(1,3) == 1){$stuff = $stuff . " with " . (mt_rand(2,6)*2) . " " . candleColor(0) . " candles in it";}
						if (mt_rand(1,5) == 1){$stuff = $stuff . " with " . (mt_rand(2,6)*2) . " burned down " . candleColor(0) . " candles in it";}
					break;
		case 14:	$stuff = "is a " . conditionType(wood) . woodenType() . " chandelier";
						if (mt_rand(1,2) == 1){$stuff = "is a " . conditionType(iron) . steelMaker() . " chandelier";}
						if (mt_rand(1,3) == 1){$stuff = $stuff . " with " . (mt_rand(2,6)*2) . " " . candleColor(0) . " candles in it";}
						if (mt_rand(1,5) == 1){$stuff = $stuff . " with " . (mt_rand(2,6)*2) . " burned down " . candleColor(0) . " candles in it";}
					break;
		case 15:	$stuff = "is a " . mt_rand(1,4) . " foot wide hole that goes " . mt_rand(1,4) . " feet up";	break;
		case 16:	$stuff = "are " . drawWith() . " drawings of " . drawingTypes();	break;
		case 17:	$stuff = "are " . drawWith() . " writings that " . chickenScratch($game);	break;
		case 18:	$stuff = "is a " . conditionType(iron) . steelMaker() . " bell with a " . mt_rand(1,3) . " foot " . conditionType(iron) . " iron chain hanging";	break;
		case 19:	$stuff = "is " . cageMaker() . " hanging";
						$loot = "inside the cage";
						$size=3;
					break;
		case 20:	$stuff = "are " . mt_rand(2,10) . " " . conditionType(iron) . steelMaker() . " hooks";	break;
		case 21:	$stuff = "are " . conditionType(iron) . steelMaker() . " manacles hanging";	break;
		case 22:	$body = corpseMaker();
					$stuff = "are " . conditionType(iron) . steelMaker() . " manacles with a " . $body . " hanging";
						$loot = "on the " . $body;
						$fill = 3; // CORPSE
						$size=3;
					break;
	}
	return array($stuff,$loot,$size,$fill);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function decorateRoomFloor($game,$cut)
{
	switch (mt_rand(0,48))
	{
		case 0:	$chair = furnitureMake() . " armchair";
				$stuff = "is a " . $chair;
						$loot = "under the " . $chair;
						$stuf = "on the " . $chair;
						$fill = 10; // ONE THINGS
						$size=1;
					break;
		case 1:	$stuff = "is a " . mt_rand(1,4) . " foot wide hole that is " . mt_rand(2,8) . " feet deep";	break;
		case 2:	$bench = furnitureMake() . " bench";
				$stuff = "is a " . $bench;
						$loot = "under the " . $bench;
						$stuf = "on the " . $bench;
						$fill = 10; // ONE THINGS
						$size=3;
					break;
		case 3:	$stuff = "is a " . conditionType(iron) . "brazier";	break;
		case 4:	$stuff = "is " . mt_rand(2,5) . " feet of " . conditionType(iron) . "iron chain fastened";	break;
		case 5:	$chair = furnitureMake() . " chair";
				$stuff = "is a " . $chair;
						$loot = "under the " . $chair;
						$stuf = "on the " . $chair;
						$fill = 10; // ONE THINGS
						$size=1;
					break;
		case 6:	$chair = "padded " . furnitureMake() . " chair";
				$stuff = "is a " . $chair;
						$loot = "under the " . $chair;
						$stuf = "on the " . $chair;
						$fill = 10; // ONE THINGS
						$size=1;
					break;
		case 7:	$stuff = decorateAlot() . " cracks";		break;
		case 8:	$stuff = "is a grindstone";	
						if (mt_rand(1,3) == 1){$stuff = "is a broken grindstone";}
						else if (mt_rand(1,3) == 1){$stuff = "is a worn down grindstone";}
					break;
		case 9:	$stuff = "is a " . conditionType(wood) . "loom";	break;
		case 10:	$bed = conditionType(cloth) . "mattress";
					$stuff = "is a " . $bed;
						$loot = "under the " . $bed;
						$stuf = "on the " . $bed;
						$fill = 11; // FEW THINGS
						$size=2;
					break;
		case 11:	$bed = conditionType(wood) . "pallet";
					$stuff = "is a " . $bed;
						$loot = "under the " . $bed;
						$stuf = "on the " . $bed;
						$fill = 11; // FEW THINGS
						$size=3;
					break;
		case 12:	$shelf = furnitureMake() . " shelf";
					$stuff = "is a " . $shelf;
						$loot = "on top of the " . $shelf;
						$fill = 9; // SHELF
						$size=1;
					break;
		case 13:	$stuff = "is a high " . woodenType() . " stool";	break;
		case 14:	$stuff = "is a " . conditionType(wood) . woodenType() . " stool";	break;
		case 15:	$table = sizeMake() . " " . furnitureMake() . " table";
					$stuff = "is a " . $table;
						$loot = "under the " . $table;
						$stuf = "on the " . $table;
						$fill = 11; // FEW THINGS
						$size=3;
					break;
		case 16:	$chair = furnitureMake() . " throne";
					$stuff = "is a " . $chair;
						$loot = "behind the " . $chair;
						$stuf = "on the " . $chair;
						$fill = 10; // ONE THING
						$size=3;
					break;
		case 17:	$tub = furnitureMake() . " tub";
					$stuff = "is a " . $tub;
						$loot = "inside the " . $tub;
						$size=3;
					break;
		case 18:	$stuff = decorateAlot() . " blood smears";	break;
		case 19:	$stuff = decorateAlot() . " areas of dried blood";	break;
		case 20:	$stuff = decorateAlot() . " areas of moisture";	break;
		case 21:	$stuff = decorateAlot() . " areas of water";
						if (mt_rand(1,10) == 1){$stuff = decorateAlot() . " areas of " . itisStrange() . " " . candleColor(1) . " liquid";}
						if (mt_rand(1,10) == 1){$stuff = decorateAlot() . " areas of " . itisStrange() . " " . slimeColor() . " slime";}
					break;
		case 22:	$stuff = "is a " . conditionType(iron) . steelMaker() . " standing mirror";	break;
		case 23:	$stuff = "is " . kegFiller(keg,$game,$extra,$cut);	break;
		case 24:	$stuff = decorateAlot() . " traces of moss";	if (mt_rand(1,2) == 1){$stuff = decorateAlot() . " traces of mold";}	break;
		case 25:	$stuff = decorateAlot() . " fungi growing";
						if (mt_rand(1,10) == 1){$stuff = decorateAlot() . " areas of " . itisStrange() . " " . candleColor(0) . " fungi growing";}
					break;
		case 26:	$stuff = "is " . tortureMaker($game,$cut,1);
				if (mt_rand(1,10) > 6){ $stuff = $stuff . " with areas of dried blood"; }
				if (mt_rand(1,10) > 7)
				{
					$body = corpseMaker();
					$stuff = $stuff . " and has a " . $body;
					$loot = "on the " . $body;
					$fill = 3; // CORPSE
					$size=3;
				}
				break;
		case 27:	$cage = cageMaker();
					$stuff = "is " . $cage;
						$loot = "inside the " . $cage;
						$size=3;
					break;
		case 28:	$box = conditionType(wood) . woodenType() . " barrel";
					$stuff = "is a " . $box;
						$loot = "inside the " . $box;
						$size=2;
					break;
		case 29:	$box = lockerMaker();
					$stuff = "is a " . conditionType(wood) . woodenType() . " " . $box;
						if (mt_rand(1,4) == 1){ if (mt_rand(1,2) == 1){$stuff = $stuff . " that is locked with a padlock";} else {$stuff = $stuff . " that has a locked keyhole";} }
						$loot = "inside the " . $box;
						$fill = 7; // BOX
						$size=2;
					break;
		case 30:	$stuff = "is a " . cauldronMaker($game,$extra,$cut);
						$loot = "inside the cauldron";
						$size=2;
					break;
		case 31:	$stuff = decorateAlot() . " areas of mold";
						if (mt_rand(1,10) == 1){$stuff = decorateAlot() . " areas of " . itisStrange() . " " . candleColor(0) . " mold";}
					break;
		case 32:	$stuff = "is " . mt_rand(10,50) . " feet of " . conditionType(cloth) . " rope fastened";	break;
		case 33:	$stuff = decorateAlot() . " scratches and claw marks"; break;
		case 34:	$stuff = "is a " . conditionType(iron) . "brazier"; break;
		case 35:	$stuff = "is a " . mt_rand(2,5) . " foot tall " . conditionType(wood) . woodenType() . " candelabrum ";
						if (mt_rand(1,2) == 1){$stuff = "is a " . mt_rand(2,5) . " foot tall " . conditionType(iron) . steelMaker() . " candelabrum ";}
						if (mt_rand(1,3) == 1){$stuff = $stuff . " with " . mt_rand(1,5) . " " . candleColor(0) . " candles in it";}
						if (mt_rand(1,5) == 1){$stuff = $stuff . " with " . mt_rand(1,5) . " burned down " . candleColor(0) . " candles in it";}
					break;
		case 36:	$stuff = "are " . drawWith() . " drawings of " . drawingTypes();	break;
		case 37:	$stuff = "are " . drawWith() . " writings that " . chickenScratch($game);	break;
		case 38:	$cage = cageMaker();
					$stuff = "is " . $cage;
						$loot = "inside the " . $cage;
						$size=3;
					break;
		case 39:	$stuff = "are " . conditionType(iron) . steelMaker() . " manacles fastened";	break;
		case 40:	$body = corpseMaker();
					$stuff = "are " . conditionType(iron) . steelMaker() . " manacles with a " . $body . " fastened";
						$loot = "on the " . $body;
						$fill = 3; // CORPSE
						$size=3;
					break;
		case 41:	$water = conditionType(water) . "water";
					$stuff = "is a small puddle of " . $water;
						$loot = "in the small puddle of " . $water;
						$size=1;
					break;
		case 42:	$water = conditionType(water) . "water";
					$stuff = "is a large puddle of " . water;
						$loot = "in the large puddle of " . water;
						$size=2;
					break;
		case 43:	$mat = conditionType(cloth) . "mat";
					$stuff = "is a " . $mat;
						$loot = "under the " . $mat;
						$size=3;
					break;
		case 44:	$ped = furnitureMake() . " pedestal";
					$stuff = "is a " . $ped;
						$loot = "on top of the " . $ped;
						$size=1;
					break;
		case 45:	$stuff = "are some " . footprintMaker() . " in various spots";	break;
		case 46:	$stuff = "is a fire pit";	if (mt_rand(1,2) == 1){$stuff = "is a fire pit with ashes";}	if (mt_rand(1,4) == 1){$stuff = "is a fire pit with wood";}	break;
		case 47:	$body = corpseMaker();
					$stuff = "is a " . $body;
						$loot = "on the " . $body;
						$fill = 3; // CORPSE
						$size=3;
					break;
		case 48:	$stuff = carpetMaker(1);
						$loot = "under the " . $stuff;
						$size=3;
					break;
	}
	return array($stuff,$loot,$size,$fill,$stuf);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function decorateRoomScatter($game,$cut)
{
	$items = mt_rand(2,10);

	while ($items > 0) :

		$items = $items - 1;
		$stuff = $stuff . fantasyRoomItem($game,$cut) . ", ";

	endwhile;

	$stuff = substr($stuff, 0, -2);

	return array($stuff);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function fantasyRoomItem($game,$cut)
{
	if (mt_rand(1,4) > 1){$casting = steelMaker(); $mquality = 0;} else {$casting = goodmetalChooser(); $mquality = 1;}
	$item = "leather scrollcase";
	switch (mt_rand(0,191))
	{
		case 	0	: 	$item = mt_rand(2,8) . " " . conditionType(item) . "arrows";  if (mt_rand(1,2) == 1){$item = mt_rand(2,8) . " " . conditionType(item) . "crossbow bolts";}	break;
		case 	1	: 	$item = "small piles of ashes";	break;
		case 	2	: 	$item = "humanoid bones"; if (mt_rand(1,2) == 1){$item = "animal bones";}	break;
		case 	3	: 	$item = conditionType(jar) . "" . bottlePicker();	break;
		case 	4	: 	$item = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron chain";	break;
		case 	5	: 	$item = conditionType(wood) . "wooden club";	break;
		case 	6	: 	$item = conditionType(iron) . "dagger hilt";	break;
		case 	7	: 	$item = "a pile of dung";	if (mt_rand(1,4) == 1){ $item = "some piles of guano"; } break;
		case 	8	: 	$item = "food scraps";	break;
		case 	9	: 	$item = "bellows";	if (mt_rand(1,2) == 1){$item = "ruined bellows";} break;
		case 	10	: 	$item = "bits of fur and hair";	break;
		case 	11	: 	$item = conditionType(iron) . "" . steelMaker() . " hammer head";	break;
		case 	12	: 	$item = conditionType(iron) . "" . steelMaker() . " dented helm";	break;
		case 	13	: 	$item = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron bar";	break;
		case 	14	: 	$item = "blunt " . conditionType(iron) . "spear head";	break;
		case 	15	: 	$item = "a " . leatherColor() . " leather boot";	if (mt_rand(1,3) == 1){ $item = leatherColor() . " leather boots"; } break;
		case 	16	: 	$item = mt_rand(5,20) . " small sticks and twigs";	break;
		case 	17	: 	$item = conditionType(wood) . "pick handle";	break;
		case 	18	: 	$item = mt_rand(5,10) . " foot " . conditionType(wood) . "wood pole";	break;
		case 	19	: 	$item = plainColor() . " pottery shards";	break;
		case 	20	: 	$item = conditionType(cloth) . "rags";	break;
		case 	21	: 	$item = mt_rand(10,50) . " foot " . conditionType(cloth) . " rope";	break;
		case 	22	: 	$item = conditionType(item) . "" . bagCreator();	break;
		case 	23	: 	$item = mt_rand(2,8) . " " . conditionType(iron) . "" . steelMaker() . " spikes";	break;
		case 	24	: 	$item = conditionType(iron) . "" . steelMaker() . " candle snuffer"; break;
		case 	25	: 	$item = conditionType(iron) . "" . steelMaker() . " candlestick"; break;
		case 	26	: 	$item = "bits of straw and hay";	break;
		case 	27	: 	$item = conditionType(iron) . "sword blade";	break;
		case 	28	: 	$item = "bits of bones and teeth";	break;
		case 	29	: 	$item = conditionType(item) . "torch";	break;
		case 	30	: 	$item = "small " . conditionType(iron) . "" . steelMaker() . " bird cage";	break;
		case 	31	: 	$item = conditionType(iron) . "" . steelMaker() . " bowl";	break;
		case 	32	: 	$item = mt_rand(2,20) . " square feet of canvas";	break;
		case 	33	: 	$item = mt_rand(2,10) . " pieces of " . conditionType(wood) . "wood";	break;
		case 	34	: 	$item = conditionType(iron) . "" . steelMaker() . " bucket";	break;
		case 	35	: 	$item = conditionType(iron) . "" . steelMaker() . " pail";	break;
		case 	36	: 	$item = conditionType(iron) . "" . steelMaker() . " dented shield";	break;
		case 	37	: 	$item = "shredded and torn clothing";	break;
		case 	38	: 	$item = mt_rand(2,10) . " bandages"; if (mt_rand(1,2) == 1){$item = mt_rand(2,10) . " bloody bandages";}	break;
		case 	39	: 	$item = conditionType(iron) . "" . steelMaker() . " dented plate armor";	break;
		case 	40	: 	$item = headoffMaker(0);	break;
		case 	41	: 	$item = conditionType(wood) . "basket";	break;
		case 	42	: 	$item = conditionType(wood) . "whip";	break;
		case 	43	: 	$item = conditionType(wood) . "" . woodenType() . " cane";	break;
		case 	44	: 	$item = conditionType(iron) . "" . steelMaker() . " dented helm with a " . headoffMaker(0) . " still in it";	break;
		case 	45	: 	$item = conditionType(wood) . "wooden dish";	break;
		case 	46	: 	$item = conditionType(wood) . "wooden flagon";	break;
		case 	47	: 	$item = conditionType(wood) . "basket with a " . headoffMaker(0) . " inside it";	break;
		case 	48	: 	$item = conditionType(iron) . "" . steelMaker() . " fork";	break;
		case 	49	: 	$item = "jar (" . contentsChooser(0,$game,1) . ")"; if (mt_rand(1,2) == 1){$item = "bottle (" . contentsChooser(0,$game,1) . ")";}	break;
		case 	50	: 	$item = conditionType(iron) . "" . steelMaker() . " kettle";	break;
		case 	51	: 	$item = conditionType(iron) . "" . steelMaker() . " knife";	break;
		case 	52	: 	$item = conditionType(iron) . "" . steelMaker() . " ladle";	break;
		case 	53	: 	$item = conditionType(iron) . "" . steelMaker() . " mug";	break;
		case 	54	: 	$item = "a large pile of dirt";	if (mt_rand(1,3) == 1){$item = "small piles of dirt";} break;
		case 	55	: 	$item = conditionType(iron) . "" . steelMaker() . " pan";	break;
		case 	56	: 	$item = mt_rand(2,20) . " pieces of " . conditionType(paper) . " parchment"; if (mt_rand(1,2) == 1){$item = mt_rand(2,20) . " " . conditionType(paper) . " scrolls";}	break;
		case 	57	: 	$item = conditionType(wood) . "wooden pitcher";	break;
		case 	58	: 	$item = musicChooser(1);	break;
		case 	59	: 	$item = conditionType(item) . "smoking pipe";	break;
		case 	60	: 	$item = conditionType(iron) . "" . steelMaker() . " pot"; if (mt_rand(1,2) == 1){ $item = conditionType(iron) . "" . steelMaker() . " kettle"; } break;
		case 	61	: 	$item = "small bottle of ink";	break;
		case 	62	: 	$item = conditionType(item) . "quill";	break;
		case 	63	: 	$item = conditionType(iron) . "" . steelMaker() . " rusty razor";	break;
		case 	64	: 	$item = "some " . footprintMaker() . " in various spots";	break;
		case 	65	: 	$item = conditionType(iron) . "" . steelMaker() . " spoon";	break;
		case 	66	: 	$item = conditionType(iron) . "" . steelMaker() . " tankard";	break;
		case 	67	: 	$item = conditionType(wood) . "tinderbox";	break;
		case 	68	: 	$item = mt_rand(2,10) . "0 feet of twine";	break;
		case 	69	: 	$item = "whetstone";	break;
		case 	70	: 	$item = ashMaker($game);	break;
		case 	71	: 	$item = conditionType(cloth) . "" . candleColor(0) . " blanket";	break;
		case 	72	: 	$item = kegFiller(cask,$game,$extra,$cut); if (mt_rand(1,2) == 1){$item = kegFiller(keg,$game,$extra,$cut);}	break;
		case 	73	: 	$item = "a huge pile of various bones";	break;
		case 	74	: 	$item = "a large pile of rocks"; if (mt_rand(1,2) == 1){$item = "a large pile of stone blocks";}	break;
		case 	75	: 	$item = conditionType(iron) . "" . steelMaker() . " small bell"; if (mt_rand(1,6) == 1){ $item = steelMaker() . " cow bell"; }	break;
		case 	76	: 	$item = "fishing pole"; if (mt_rand(1,2) == 1){$item = "broken fishing pole";} break;
		case 	77	: 	$item = "bronze lamp"; if (mt_rand(1,2) == 1){$item = "dented bronze lamp";} break;
		case 	78	: 	$item = mt_rand(2,6) . " " . eggMaker();	break;
		case 	79	: 	$item = conditionType(iron) . "" . steelMaker() . " hand saw";	break;
		case 	80	: 	$item = normalWeapons(1,3,$game);	break;
		case 	81	: 	$item = normalArmor(1,$game);	break;
		case 	82	: 	$item = conditionType(iron) . "" . steelMaker() . " dinner plate";	break;
		case 	83	: 	$item = mt_rand(2,8) . " sling stones";	break;
		case 	84	: 	$item = mt_rand(2,10) . " feet of twine";	break;
		case 	85	: 	$item = $casting . " flask of alcohol" . itemValues($game,$mquality);	break;
		case 	86	: 	$item = $casting . " arrowhead" . itemValues($game,$mquality);	break;
		case 	87	: 	$item = $casting . " hair brush" . itemValues($game,$mquality);	break;
		case 	88	: 	$item = "cork";	break;
		case 	89	: 	$item = $casting . " goblet" . itemValues($game,$mquality);	break;
		case 	90	: 	$item = steelMaker() . " manacles";	break;
		case 	91	: 	$item = candleColor(0) . " cloth pouch of " . mt_rand(3,22) . " " . coinMaker($game);	break;
		case 	92	: 	$item = "crucible";	break;
		case 	93	: 	$item = "vial of insect repellent";	break;
		case 	94	: 	$item = steelMaker() . " metal file";	break;
		case 	95	: 	$item = mt_rand(2,20) . " dead bugs";	break;
		case 	96	: 	$item = "pair of bone dice";	break;
		case 	97	: 	$item = "set of wooden teeth";	break;
		case 	98	: 	$item = candleColor(0) . " feather";	break;
		case 	99	: 	$item = "deck of playing cards";	break;
		case 	100	: 	$item = mt_rand(2,20) . " foreign " . coinMaker($game) . " coins of unknown origin"; if (mt_rand(1,2) == 1){ $item = "unusual coin of unknown metal with a symbol of a " . designType(0) . " on it";	} break;
		case 	101	: 	$item = "glass magnifying lens";	break;
		case 	102	: 	$item = "small glass bottle (" . contentsChooser(0,$game,1) . ")";	break;
		case 	103	: 	$item = "small portrait of a woman"; if (mt_rand(1,2) == 1){ $item = "small portrait of a man"; } break;
		case 	104	: 	$item = "prayer beads";	break;
		case 	105	: 	$item = "dart";	break;
		case 	106	: 	$item = "corncob pipe";	break;
		case 	107	: 	$item = closetFiller(3,1,1,$game,1); break;
		case 	108	: 	$item = "box of matches (" . mt_rand(10,100) . " each)";	break;
		case 	109	: 	$item = $casting . " " . figureMaker() . " figurine" . itemValues($game,$mquality);	if (mt_rand(1,2) == 1){ $item = "wooden figurine"; } break;
		case 	110	: 	$item = bottlePicker() . " of water";	break;
		case 	111	: 	$item = gemCreator($cut);	break;
		case 	112	: 	$item = mt_rand(10,50) . " foot ball of " . candleColor(0) . " string";	break;
		case 	113	: 	$item = "sheet of parchment";	break;
		case 	114	: 	$item = "compass";	break;
		case 	115	: 	$item = "wooden case containing paints";	break;
		case 	116	: 	$item = "small " . steelMaker() . " mirror";	break;
		case 	117	: 	$item = headoffMaker(1);	break;
		case 	118	: 	$item = "blackjack";	break;
		case 	119	: 	$item = "soiled " . candleColor(0) . " rag";	break;
		case 	120	: 	$item = "vial of perfume";	break;
		case 	121	: 	$item = steelMaker() . " tongs";	break;
		case 	122	: 	$item = "jar of glue";	break;
		case 	123	: 	$item = "wooden snuff box with " . mt_rand(2,5) . " pinches remaining";	break;
		case 	124	: 	$item = "brass knuckles";	break;
		case 	125	: 	$item = $casting . " spoon" . itemValues($game,$mquality);	break;
		case 	126	: 	$item = mt_rand(2,8) . " arrows"; if (mt_rand(1,2) == 1){$item = mt_rand(2,8) . " crossbow bolts";}	break;
		case 	127	: 	$item = mt_rand(2,8) . " pieces of fake " . coinMaker($game);	break;
		case 	128	: 	$item = "a map of this area";	break;
		case 	129	: 	$item = "small leather pouch of " . candleColor(0) . " powder";	break;
		case 	130	: 	$item = mt_rand(2,12) . " " . steelMaker() . " nails";	break;
		case 	131	: 	$item = "vial of mild poison";	break;
		case 	132	: 	$item = "beeswax";	break;
		case 	133	: 	$item = mt_rand(12,36) . " inch leather strap";	break;
		case 	134	: 	$item = "rawhide necklace";	break;
		case 	135	: 	$item = "small bag of charcoal"; break;
		case 	136	: 	$item = "small " . $casting . " knife" . itemValues($game,$mquality);	break;
		case 	137	: 	$item = "wooden brooch";	break;
		case 	138	: 	$item = "small leather pouch of " . candleColor(0) . " sand";	break;
		case 	139	: 	$item = "wooden wrist sundial";	break;
		case 	140	: 	$item = "poison antidote";	break;
		case 	141	: 	$item = candleColor(0) . " silk handkerchief";	if (mt_rand(1,2) == 1){ $item = candleColor(0) . " handkerchief"; } break;
		case 	142	: 	$item = "stone arrowhead";	break;
		case 	143	: 	$item = "small " . $casting . " holy symbol" . itemValues($game,$mquality);	break;
		case 	144	: 	$item = "grappling hook & hemp rope (" . (mt_rand(5,10)*10) . "')"; if (mt_rand(1,2) == 1){ $item = "grappling hook & silk rope (" . (mt_rand(5,10)*10) . "')"; } break;
		case 	145	: 	$item = "hourglass";	break;
		case 	146	: 	$item = bottlePicker() . " of scented oil";	break;
		case 	147	: 	$item = "wooden stake";	break;
		case 	148	: 	$item = bottlePicker() . " of spice";	break;
		case 	149	: 	$item = "deck of tarot cards";	break;
		case 	150	: 	$item = "chalk";	break;
		case 	151	: 	$item = "cloth bag of crushed herbs";	break;
		case 	152	: 	$item = "bottle of cheap wine";	break;
		case 	153	: 	$item = "small lead figurine";	break;
		case 	154	: 	$item = "rabbit`s foot"; break;
		case 	155	: 	$item = "firewood (" . mt_rand(2,5) . " pieces)"; break;
		case 	156	: 	$item = jewelCreator($cut);	break;
		case 	157	: 	$item = libraryFiller(mt_rand(2,7),$game,$cut);	break;
		case 	158	: 	$item = mt_rand(2,12) . " iron spikes";	break;
		case 	159	: 	$item = steelMaker() . " horseshoe"; break;
		case 	160	: 	$item = materialType(whistle) . " whistle";	break;
		case 	161	: 	$item = "mortar and pestle";	break;
		case 	162	: 	$item = "pint of lamp oil";	break;
		case 	163	: 	$item = steelMaker() . " padlock with key";	break;
		case 	164	: 	$item = "pint of " . plainColor() . " paint";	break;
		case 	165	: 	$item = "paint brush";	break;
		case 	166	: 	$item = "small " . steelMaker() . " carving knife";	break;
		case 	167	: 	$item = "pipe tobacco";	break;
		case 	168	:
				$dice = mt_rand(1,4);
				if ($dice == 1){ $item = "bullseye lantern"; if (mt_rand(1,5) == 1){ $item = $item . " with oil"; } }
				else if ($dice == 2){ $item = "hooded lantern"; if (mt_rand(1,5) == 1){ $item = $item . " with oil"; } }
				else if ($dice == 3){ $item = "broken bullseye lantern"; }
				else { $item = "broken hooded lantern"; }
				break;
		case 	169	: 	$item = "eyeglasses";	break;
		case 	170	: 	$item = "torch";	break;
		case 	171	: 	$item = steelMaker() . " pliers";	break;
		case 	172	: 	$item = steelMaker() . " scissors";	break;
		case 	173	: 	$item = "leather scrollcase";	break;
		case 	174	: 	$item = steelMaker() . " folding shovel";	if (mt_rand(1,2) == 1){ $item = steelMaker() . " shovel"; } break;
		case 	175	: 	$item = "bar of " . candleColor(0) . " soap";	break;
		case 	176	: 	$item = "lockpicks (" . mt_rand(2,6) . " ea), "; break;
		case 	177	: 	$item = "spyglass";	break;
		case 	178	: 	$item = "thief tools";	break;
		case 	179	: 	$item = bottlePicker() . " of holy water";	break;
		case 	180	: 	$item = "ivory dice";	if (mt_rand(1,3) == 1){ $item = "loaded ivory dice"; } break;
		case 	181	: 	
				$dice = mt_rand(1,6);
				if ($dice == 1){ $item = "small pouch of belladonna (" . mt_rand(2,10) . " oz)"; }
				else if ($dice == 2){ $item = "small pouch of garlic (" . mt_rand(2,10) . " ea)"; }
				else if ($dice == 3){ $item = "small pouch of spiderwort (" . mt_rand(2,10) . " oz)"; }
				else if ($dice == 4){ $item = "small pouch of wolfsbane (" . mt_rand(2,10) . " oz)"; }
				else { $item = "small pouch of yarrow (" . mt_rand(2,10) . " oz)"; }
				break;
		case 	182	: 	$item = "bottle of " . candleColor(0) . " cloth dye"; if (mt_rand(1,2) == 1){ $item = "bottle of " . candleColor(0) . " hair dye"; } break;
		case 	183	:
				$dice = mt_rand(1,6);
				if ($dice == 1){ $item = $casting . " necklace"; }
				else if ($dice == 2){ $item = $casting . " ring"; }
				else if ($dice == 3){ $item = $casting . " ring"; }
				else if ($dice == 4){ $item = $casting . " earrings"; }
				else if ($dice == 5){ $item = $casting . " earring"; }
				else { $item = $casting . " medallion"; }
				break;
		case 	184	: 	$item = steelMaker() . " crowbar";	break;
		case 	185	: 	$item = "flint and steel";	break;
		case 	186	: 	$item = "small toy doll";	break;
		case 	187	: 	$item = "small leather pouch of silver powder" . itemValues($game,$mquality);	break;
		case 	188	: 	$item = steelMaker() . " hacksaw";	break;
		case 	189	: 	$item = mt_rand(2,8) . " gold nuggets worth " . mt_rand(1,5) . " gold each";	break;
		case 	190	: 	$item = "hammer and chisel";	if (mt_rand(1,5) == 1){ $item = "chisel"; } break;
		case 	191	: 	$item = "wooden holy symbol";	break;
	}
	return $item;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function fantasyShelfItem($game,$cut,$amount)
{
	$amount = mt_rand(1,$amount);

	while ($amount > 0) :

	if (mt_rand(1,4) > 1){$casting = steelMaker(); $mquality=0; } else {$casting = goodmetalChooser(); $mquality=1; }
	if (mt_rand(1,2) == 1){$ulok = "door";} else {$ulok = "container";}

	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
	{
		switch (mt_rand(0,11))
		{
			case 0:	$luck = "1 extra dice to attack rolls but only one good luck charm at any time";			break;
			case 1:	$luck = "+" . mt_rand(1,6) . " to combat adds but only one good luck charm at any time";			break;
			case 2:	$luck = "+" . mt_rand(1,6) . " to any SR but only one good luck charm at any time";		break;
			case 3:	$luck = "+" . mt_rand(1,6) . " absorption bonus to each piece of worm armor but only one good luck charm at any time";		break;
			case 4:	$luck = "the surprise on wandering monsters but only one good luck charm at any time";	break;
			case 5:	$luck = "+" . mt_rand(1,6) . " to any SR vs. " . abilityTranslate($game,STR) . " but only one good luck charm at any time";		break;
			case 6:	$luck = "+" . mt_rand(1,6) . " to any SR vs. " . abilityTranslate($game,INT) . " but only one good luck charm at any time";		break;
			case 7:	$luck = "+" . mt_rand(1,6) . " to any SR vs. " . abilityTranslate($game,SPD) . " but only one good luck charm at any time";		break;
			case 8:	$luck = "+" . mt_rand(1,6) . " to any SR vs. " . abilityTranslate($game,DEX) . " but only one good luck charm at any time";		break;
			case 9:	$luck = "+" . mt_rand(1,6) . " to any SR vs. " . abilityTranslate($game,LCK) . " but only one good luck charm at any time";		break;
			case 10:$luck = "+" . mt_rand(1,6) . " to any SR vs. " . abilityTranslate($game,CHR) . " but only one good luck charm at any time";		break;
			case 11:$luck = "+" . mt_rand(1,6) . " to any SR made for traps but only one good luck charm at any time";		break;
		}
	}
	else
	{
		switch (mt_rand(0,11))
		{
			case 0:	$luck = "+1 to attack rolls but only one good luck charm at any time";				break;
			case 1:	$luck = "+1 to damage rolls but only one good luck charm at any time";				break;
			case 2:	$luck = "1 bonus to poison saves but only one good luck charm at any time";			break;
			case 3:	$luck = "+1 to armor but only one good luck charm at any time";						break;
			case 4:	$luck = "+1 to surprise and initiative but only one good luck charm at any time";	break;
			case 5:	$luck = "1 bonus to poison saves but only one good luck charm at any time";			break;
			case 6:	$luck = "1 bonus to spell saves but only one good luck charm at any time";			break;
			case 7:	$luck = "1 bonus to breath saves but only one good luck charm at any time";			break;
			case 8:	$luck = "1 bonus to petrification saves but only one good luck charm at any time";	break;
			case 9:	$luck = "1 bonus to paralyzing saves but only one good luck charm at any time";		break;
			case 10:$luck = "1 bonus to magic item saves but only one good luck charm at any time";		break;
			case 11:$luck = "1 bonus to polymorph saves but only one good luck charm at any time";		break;
		}
	}
		$item = "leather scrollcase";
		switch (mt_rand(0,173))
		{
			case 	0	: 	$item = mt_rand(2,8) . " " . conditionType(item) . "arrows";  if (mt_rand(1,2) == 1){$item = mt_rand(2,8) . " " . conditionType(item) . "crossbow bolts";}	break;
			case 	1	: 	$item = mt_rand(2,12) . " iron spikes";	break;
			case 	2	: 	$item = steelMaker() . " horseshoe"; break;
			case 	3	: 	$item = conditionType(jar) . "" . bottlePicker();	break;
			case 	4	: 	$item = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron chain";	break;
			case 	5	: 	$item = conditionType(wood) . "wooden club";	break;
			case 	6	: 	$item = conditionType(iron) . "dagger hilt";	break;
			case 	7	: 	$item = bottlePicker() . " of holy water";	break;
			case 	8	: 	$item = "food scraps";	break;
			case 	9	: 	$item = "bellows";	if (mt_rand(1,2) == 1){$item = "ruined bellows";} break;
			case 	10	: 	$item = "wooden holy symbol";	break;
			case 	11	: 	$item = conditionType(iron) . "" . steelMaker() . " hammer head";	break;
			case 	12	: 	$item = conditionType(iron) . "" . steelMaker() . " dented helm";	break;
			case 	13	: 	$item = mt_rand(1,3) . " foot long " . conditionType(iron) . "iron bar";	break;
			case 	14	: 	$item = "blunt " . conditionType(iron) . "spear head";	break;
			case 	15	: 	$item = "a " . leatherColor() . " leather boot";	if (mt_rand(1,3) == 1){ $item = leatherColor() . " leather boots"; } break;
			case 	16	: 	$item = mt_rand(5,20) . " small sticks and twigs";	break;
			case 	17	: 	$item = conditionType(wood) . "pick handle";	break;
			case 	18	: 	$item = "hammer and chisel";	if (mt_rand(1,5) == 1){ $item = "chisel"; } break;
			case 	19	: 	$item = plainColor() . " pottery shards";	break;
			case 	20	: 	$item = conditionType(cloth) . "rags";	break;
			case 	21	: 	$item = mt_rand(10,50) . " foot " . conditionType(cloth) . " rope";	break;
			case 	22	: 	$item = conditionType(item) . "" . bagCreator();	break;
			case 	23	: 	$item = mt_rand(2,8) . " " . conditionType(iron) . "" . steelMaker() . " spikes";	break;
			case 	24	: 	$item = conditionType(iron) . "" . steelMaker() . " candle snuffer"; break;
			case 	25	: 	$item = conditionType(iron) . "" . steelMaker() . " candlestick"; break;
			case 	26	: 	$item = steelMaker() . " hacksaw";	break;
			case 	27	: 	$item = mt_rand(2,8) . " gold nuggets worth " . mt_rand(1,5) . " gold each";	break;
			case 	28	: 	$item = conditionType(iron) . "sword blade";	break;
			case 	29	: 	$item = conditionType(item) . "torch";	break;
			case 	30	: 	$item = "small " . conditionType(iron) . "" . steelMaker() . " bird cage";	break;
			case 	31	: 	$item = conditionType(iron) . "" . steelMaker() . " bowl";	break;
			case 	32	: 	$item = mt_rand(2,20) . " square feet of canvas";	break;
			case 	33	: 	$item = mt_rand(2,10) . " pieces of " . conditionType(wood) . "wood";	break;
			case 	34	: 	$item = conditionType(iron) . "" . steelMaker() . " bucket";	break;
			case 	35	: 	$item = conditionType(iron) . "" . steelMaker() . " pail";	break;
			case 	36	: 	$item = conditionType(iron) . "" . steelMaker() . " dented shield";	break;
			case 	37	: 	$item = "shredded and torn clothing";	break;
			case 	38	: 	$item = mt_rand(2,10) . " bandages"; if (mt_rand(1,2) == 1){$item = mt_rand(2,10) . " bloody bandages";}	break;
			case 	39	: 	$item = conditionType(iron) . "" . steelMaker() . " dented plate armor";	break;
			case 	40	: 	$item = headoffMaker(0);	break;
			case 	41	: 	$item = conditionType(wood) . "basket";	break;
			case 	42	: 	$item = conditionType(wood) . "whip";	break;
			case 	43	: 	$item = conditionType(wood) . "" . woodenType() . " cane";	break;
			case 	44	: 	$item = conditionType(iron) . "" . steelMaker() . " dented helm with a " . headoffMaker(0) . " still in it";	if (mt_rand(1,2) == 1){ $item = conditionType(wood) . "basket with a " . headoffMaker(0) . " inside it"; } break;
			case 	45	: 	$item = conditionType(wood) . "wooden dish";	break;
			case 	46	: 	$item = conditionType(wood) . "wooden flagon";	break;
			case 	47	: 	$item = steelMaker() . " folding shovel"; break;
			case 	48	: 	$item = conditionType(iron) . "" . steelMaker() . " fork";	break;
			case 	49	: 	$item = "jar (" . contentsChooser(0,$game,1) . ")"; if (mt_rand(1,2) == 1){$item = "bottle (" . contentsChooser(0,$game,1) . ")";}	break;
			case 	50	: 	$item = conditionType(iron) . "" . steelMaker() . " kettle";	break;
			case 	51	: 	$item = conditionType(iron) . "" . steelMaker() . " knife";	break;
			case 	52	: 	$item = conditionType(iron) . "" . steelMaker() . " ladle";	break;
			case 	53	: 	$item = conditionType(iron) . "" . steelMaker() . " mug";	break;
			case 	54	: 	$item = "bar of " . candleColor(0) . " soap";	break;
			case 	55	: 	$item = conditionType(iron) . "" . steelMaker() . " pan";	break;
			case 	56	: 	$item = mt_rand(2,20) . " pieces of " . conditionType(paper) . " parchment"; if (mt_rand(1,2) == 1){$item = mt_rand(2,20) . " " . conditionType(paper) . " scrolls";}	break;
			case 	57	: 	$item = conditionType(wood) . "wooden pitcher";	break;
			case 	58	: 	$item = musicChooser(1);	break;
			case 	59	: 	$item = conditionType(item) . "smoking pipe";	break;
			case 	60	: 	$item = conditionType(iron) . "" . steelMaker() . " pot"; if (mt_rand(1,2) == 1){ $item = conditionType(iron) . "" . steelMaker() . " kettle"; } break;
			case 	61	: 	$item = "small bottle of ink";	break;
			case 	62	: 	$item = conditionType(item) . "quill";	break;
			case 	63	: 	$item = conditionType(iron) . "" . steelMaker() . " rusty razor";	break;
			case 	64	: 	$item = "lockpicks (" . mt_rand(2,6) . " ea), "; break;
			case 	65	: 	$item = conditionType(iron) . "" . steelMaker() . " spoon";	break;
			case 	66	: 	$item = conditionType(iron) . "" . steelMaker() . " tankard";	break;
			case 	67	: 	$item = conditionType(wood) . "tinderbox";	break;
			case 	68	: 	$item = mt_rand(2,10) . "0 feet of twine";	break;
			case 	69	: 	$item = "whetstone";	break;
			case 	70	: 	$item = "spyglass";	break;
			case 	71	: 	$item = conditionType(cloth) . "" . candleColor(0) . " blanket";	break;
			case 	72	: 	$item = "ivory dice";	if (mt_rand(1,3) == 1){ $item = "loaded ivory dice"; } break;
			case 	73	: 	
					$dice = mt_rand(1,6);
					if ($dice == 1){ $item = "small pouch of belladonna (" . mt_rand(2,10) . " oz)"; }
					else if ($dice == 2){ $item = "small pouch of garlic (" . mt_rand(2,10) . " ea)"; }
					else if ($dice == 3){ $item = "small pouch of spiderwort (" . mt_rand(2,10) . " oz)"; }
					else if ($dice == 4){ $item = "small pouch of wolfsbane (" . mt_rand(2,10) . " oz)"; }
					else { $item = "small pouch of yarrow (" . mt_rand(2,10) . " oz)"; }
					break;
			case 	74	:
					$dice = mt_rand(1,6);
					if ($dice == 1){ $item = $casting . " necklace"; }
					else if ($dice == 2){ $item = $casting . " ring"; }
					else if ($dice == 3){ $item = $casting . " ring"; }
					else if ($dice == 4){ $item = $casting . " earrings"; }
					else if ($dice == 5){ $item = $casting . " earring"; }
					else { $item = $casting . " medallion"; }
					break;
			case 	75	: 	$item = conditionType(iron) . "" . steelMaker() . " small bell"; if (mt_rand(1,6) == 1){ $item = steelMaker() . " cow bell"; }	break;
			case 	76	: 	$item = "thief tools";	break;
			case 	77	: 	$item = "bronze lamp"; if (mt_rand(1,2) == 1){$item = "dented bronze lamp";} break;
			case 	78	: 	$item = "small leather pouch of silver powder" . itemValues($game,$mquality);	break;
			case 	79	: 	$item = conditionType(iron) . "" . steelMaker() . " hand saw";	break;
			case 	80	: 	$item = normalWeapons(1,3,$game);	break;
			case 	81	: 	$item = normalArmor(1,$game);	break;
			case 	82	: 	$item = conditionType(iron) . "" . steelMaker() . " dinner plate";	break;
			case 	83	: 	$item = mt_rand(2,8) . " sling stones";	break;
			case 	84	: 	$item = mt_rand(2,10) . " feet of twine";	break;
			case 	85	: 	$item = $casting . " flask of alcohol" . itemValues($game,$mquality);	break;
			case 	86	: 	$item = $casting . " arrowhead" . itemValues($game,$mquality);	break;
			case 	87	: 	$item = $casting . " hair brush" . itemValues($game,$mquality);	break;
			case 	88	: 	$item = "cork";	break;
			case 	89	: 	$item = $casting . " goblet" . itemValues($game,$mquality);	break;
			case 	90	: 	$item = steelMaker() . " manacles";	break;
			case 	91	: 	$item = candleColor(0) . " cloth pouch of " . mt_rand(3,22) . " " . coinMaker($game);	break;
			case 	92	: 	$item = "crucible";	break;
			case 	93	: 	$item = "vial of insect repellent";	break;
			case 	94	: 	$item = steelMaker() . " metal file";	break;
			case 	95	: 	$item = mt_rand(2,20) . " dead bugs";	break;
			case 	96	: 	$item = "pair of bone dice";	break;
			case 	97	: 	$item = "set of wooden teeth";	break;
			case 	98	: 	$item = candleColor(0) . " feather";	break;
			case 	99	: 	$item = "deck of playing cards";	break;
			case 	100	: 	$item = mt_rand(2,20) . " foreign " . coinMaker($game) . " coins of unknown origin"; if (mt_rand(1,2) == 1){ $item = "unusual coin of unknown metal with a symbol of a " . designType(0) . " on it";	} break;
			case 	101	: 	$item = "glass magnifying lens";	break;
			case 	102	: 	$item = "small glass bottle (" . contentsChooser(0,$game,1) . ")";	break;
			case 	103	: 	$item = "small portrait of a woman"; if (mt_rand(1,2) == 1){ $item = "small portrait of a man"; } break;
			case 	104	: 	$item = "prayer beads";	break;
			case 	105	: 	$item = "dart";	break;
			case 	106	: 	$item = "corncob pipe";	break;
			case 	107	: 	$item = closetFiller(3,1,1,$game,1); break;
			case 	108	: 	$item = "box of matches (" . mt_rand(10,100) . " each)";	break;
			case 	109	: 	$item = $casting . " " . figureMaker() . " figurine" . itemValues($game,$mquality);	if (mt_rand(1,2) == 1){ $item = "wooden figurine"; } break;
			case 	110	: 	$item = bottlePicker() . " of water";	break;
			case 	111	: 	$item = gemCreator($cut);	break;
			case 	112	: 	$item = mt_rand(10,50) . " foot ball of " . candleColor(0) . " string";	break;
			case 	113	: 	$item = "sheet of parchment";	break;
			case 	114	: 	$item = "compass";	break;
			case 	115	: 	$item = "wooden case containing paints";	break;
			case 	116	: 	$item = "small " . steelMaker() . " mirror";	break;
			case 	117	: 	$item = headoffMaker(1);	break;
			case 	118	: 	$item = "blackjack";	break;
			case 	119	: 	$item = "soiled " . candleColor(0) . " rag";	break;
			case 	120	: 	$item = "vial of perfume";	break;
			case 	121	: 	$item = steelMaker() . " tongs";	break;
			case 	122	: 	$item = "jar of glue";	break;
			case 	123	: 	$item = "wooden snuff box with " . mt_rand(2,5) . " pinches remaining";	break;
			case 	124	: 	$item = "brass knuckles";	break;
			case 	125	: 	$item = $casting . " spoon" . itemValues($game,$mquality);	break;
			case 	126	: 	$item = mt_rand(2,8) . " arrows"; if (mt_rand(1,2) == 1){$item = mt_rand(2,8) . " crossbow bolts";}	break;
			case 	127	: 	$item = mt_rand(2,8) . " pieces of fake " . coinMaker($game);	break;
			case 	128	: 	$item = "a map of this area";	break;
			case 	129	: 	$item = "small leather pouch of " . candleColor(0) . " powder";	break;
			case 	130	: 	$item = mt_rand(2,12) . " " . steelMaker() . " nails";	break;
			case 	131	: 	$item = "vial of mild poison";	break;
			case 	132	: 	$item = "beeswax";	break;
			case 	133	: 	$item = mt_rand(12,36) . " inch leather strap";	break;
			case 	134	: 	$item = "rawhide necklace";	break;
			case 	135	: 	$item = "small bag of charcoal"; break;
			case 	136	: 	$item = "small " . $casting . " knife" . itemValues($game,$mquality);	break;
			case 	137	: 	$item = "wooden brooch";	break;
			case 	138	: 	$item = "small leather pouch of " . candleColor(0) . " sand";	break;
			case 	139	: 	$item = "wooden wrist sundial";	break;
			case 	140	: 	$item = "poison antidote";	break;
			case 	141	: 	$item = candleColor(0) . " silk handkerchief";	if (mt_rand(1,2) == 1){ $item = candleColor(0) . " handkerchief"; } break;
			case 	142	: 	$item = "stone arrowhead";	break;
			case 	143	: 	$item = "small " . $casting . " holy symbol" . itemValues($game,$mquality);	break;
			case 	144	: 	$item = "bottle of " . candleColor(0) . " cloth dye"; if (mt_rand(1,2) == 1){ $item = "bottle of " . candleColor(0) . " hair dye"; } break;
			case 	145	: 	$item = "hourglass";	break;
			case 	146	: 	$item = bottlePicker() . " of scented oil";	break;
			case 	147	: 	$item = "wooden stake";	break;
			case 	148	: 	$item = bottlePicker() . " of spice";	break;
			case 	149	: 	$item = "deck of tarot cards";	break;
			case 	150	: 	$item = "chalk";	break;
			case 	151	: 	$item = "cloth bag of crushed herbs";	break;
			case 	152	: 	$item = "bottle of cheap wine";	break;
			case 	153	: 	$item = "small lead figurine";	break;
			case 	154	: 	$item = "rabbit`s foot"; if (mt_rand(1,100) > 90){$item = "lucky rabbit`s foot that gives you " . $luck;}	break;
			case 	155	: 	$item = "small toy doll";	break;
			case 	156	: 	$item = jewelCreator($cut);	break;
			case 	157	: 	$item = libraryFiller(mt_rand(2,7),$game,$cut);	break;
			case 	158	: 	$item = steelMaker() . " crowbar";	break;
			case 	159	: 	$item = "flint and steel";	break;
			case 	160	: 	$item = materialType(whistle) . " whistle";	break;
			case 	161	: 	$item = "mortar and pestle";	break;
			case 	162	: 	$item = "pint of lamp oil";	break;
			case 	163	: 	$item = steelMaker() . " padlock with key";	break;
			case 	164	: 	$item = "pint of " . plainColor() . " paint";	break;
			case 	165	: 	$item = "paint brush";	break;
			case 	166	: 	$item = "small " . steelMaker() . " carving knife";	break;
			case 	167	: 	$item = "pipe tobacco";	break;
			case 	168	:
					$dice = mt_rand(1,4);
					if ($dice == 1){ $item = "bullseye lantern"; if (mt_rand(1,5) == 1){ $item = $item . " with oil"; } }
					else if ($dice == 2){ $item = "hooded lantern"; if (mt_rand(1,5) == 1){ $item = $item . " with oil"; } }
					else if ($dice == 3){ $item = "broken bullseye lantern"; }
					else { $item = "broken hooded lantern"; }
					break;
			case 	169	: 	$item = "eyeglasses";	break;
			case 	170	: 	$item = "torch";	break;
			case 	171	: 	$item = steelMaker() . " pliers";	break;
			case 	172	: 	$item = steelMaker() . " scissors";	break;
			case 	173	: 	$item = "leather scrollcase";	break;
		}

		$amount = $amount - 1;

		$stuff = $item . "&nbsp;--- " . $stuff;

	endwhile;

	return $stuff = substr($stuff, 0, -10);
}
?>