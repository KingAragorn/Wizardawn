<?php

/// THIS MAKES A ROOM/CLUTTER ITEM FOR FANTASY GAMES ///

function stuffMakerRoom($line,$game,$extra,$cut)
{
	$loot_place = "";
	$loot_size=0;
	$loot_trap=0;
	switch (mt_rand(0,176))
	{
		case 0:		$stuff = mt_rand(2,8) . " " . conditionType(item) . "arrows";  if (mt_rand(1,2) == 1){$stuff = mt_rand(2,8) . " " . conditionType(item) . "crossbow bolts";}	break;
		case 1:		$stuff = "scattered ashes";														break;
		case 2:		$stuff = "humanoid bones";	if (mt_rand(1,2) == 1){$stuff = "animal bones";}							break;
		case 3:		$stuff = conditionType(jar) . "" . bottlePicker();											break;
		case 4:		$stuff = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron chain";								break;
		case 5:		$stuff = conditionType(wood) . "wooden club";												break;
		case 6:		$stuff = "cobwebs";															break;
		case 7:		$stuff = "cracks in the " . dungeonWall();												break;
		case 8:		$stuff = conditionType(iron) . "dagger hilt";												break;
		case 9:		$stuff = "moisture on the " . dungeonWall();												break;
		case 10:	$stuff = "blood smears on the " . dungeonWall();											break;
		case 11:	$stuff = "liquid dripping from the ceiling";												break;
		case 12:	$stuff = "dried blood on the " . dungeonWall();												break;
		case 13:	$stuff = "a pile of dung";							$loot_place = "inside"; 	$loot_size=1;		break;
		case 14:	$stuff = "dust throughout";														break;
		case 15:	$stuff = "patches of moss";														break;
		case 16:	$stuff = "food scraps";															break;
		case 17:	$stuff = "fungus growing";														break;
		case 18:	$stuff = "some piles of guano";														break;
		case 19:	$stuff = "bits of fur and hair";													break;
		case 20:	$stuff = conditionType(iron) . "" . steelMaker() . " hammer head";									break;
		case 21:	$stuff = conditionType(iron) . "" . steelMaker() . " dented helm";									break;
		case 22:	$stuff = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron bar";								break;
		case 23:	$stuff = "blunt " . conditionType(iron) . "spear head";											break;
		case 24:	$stuff = "leather boot";							$loot_place = "inside"; 	$loot_size=1;		break;
		case 25:	$stuff = "scattered leaves and twigs";													break;
		case 26:	$stuff = "areas with mold";														break;
		case 27:	$stuff = conditionType(wood) . "pick handle";												break;
		case 28:	$stuff = mt_rand(5,10) . " foot " . conditionType(wood) . "wood pole";									break;
		case 29:	$stuff = "pottery shards scattered around";												break;
		case 30:	$stuff = conditionType(cloth) . "rags";													break;
		case 31:	$stuff = mt_rand(10,50) . " foot " . conditionType(cloth) . " rope";									break;
		case 32:	$stuff = "rubble and dirt scattered around";												break;
		case 33:	$stuff = conditionType(item) . "" . bagCreator();				$loot_place = "inside"; 	$loot_size=1;		break;
		case 34:	$stuff = slimeColor() . " slime on the " . dungeonWall();										break;
		case 35:	$stuff = mt_rand(2,8) . " " . conditionType(iron) . "" . steelMaker() . " spikes";							break;
		case 36:	$stuff = mt_rand(2,8) . " sticks scattered around";											break;
		case 37:	$stuff = mt_rand(2,8) . " small stones scattered around";										break;
		case 38:	$stuff = "pile of straw";							$loot_place = "inside"; 	$loot_size=3;		break;
		case 39:	$stuff = "straw scattered around";													break;
		case 40:	$stuff = conditionType(iron) . "sword blade";												break;
		case 41:	$stuff = "scattered bits of bones and teeth";												break;
		case 42:	$stuff = conditionType(item) . "torch";													break;
		case 43:	$stuff = "scratches and claw marks on the " . dungeonWall();										break;
		case 44:	$stuff = "small puddle of " . conditionType(water) . "water";			$loot_place = "inside"; 	$loot_size=1;		break;
		case 45:	$stuff = "large puddle of " . conditionType(water) . "water";			$loot_place = "inside"; 	$loot_size=2;		break;
		case 46:	$stuff = candleColor(0) . " wax drippings";												break;
		case 47:	$stuff = mt_rand(2,20) . " wax blobs from " . candleColor(0) . " candles";								break;
		case 48:	$stuff = mt_rand(2,10) . " pieces of " . conditionType(wood) . "wood";									break;
		case 49:	$stuff = furnitureMake() . " armchair";													break;
		case 50:	$stuff = conditionType(wood) . "" . woodenType() . " bed";			$loot_place = "under"; 		$loot_size=3;		break;
		case 51:	$stuff = furnitureMake() . " bench";						$loot_place = "under"; 		$loot_size=3;		break;
		case 52:	$stuff = conditionType(iron) . "brazier";												break;
		case 53:	$stuff = "charcoal";															break;
		case 54:	$stuff = conditionType(iron) . "" . steelMaker() . " bucket";			$loot_place = "inside"; 	$loot_size=1;		break;
		case 55:	$stuff = conditionType(wood) . "" . woodenType() . " bunk bed";			$loot_place = "under"; 		$loot_size=3;		break;
		case 56:	$stuff = carpetMaker(1);							$loot_place = "under"; 		$loot_size=3;		break;
		case 57:	$stuff = "chandelier"; 															break;
		case 58:	$stuff = furnitureMake() . " chair"; 						$loot_place = "under"; 		$loot_size=1;		break;
		case 59:	$stuff = "padded " . furnitureMake() . " chair"; 				$loot_place = "under"; 		$loot_size=1;		break;
		case 60:	$stuff = conditionType(cloth) . "" . candleColor(0) . " couch";			$loot_place = "under"; 		$loot_size=1;		break;
		case 61:	$stuff = conditionType(cloth) . "" . candleColor(0) . " cushion";		$loot_place = "inside";		$loot_size=1;		break;
		case 62:	$stuff = "fireplace"; if (mt_rand(1,2) == 1){$stuff = "fireplace with wood inside";}	$loot_place = "inside";	$loot_size=3;		break;
		case 63:	$stuff = "grindstone";															break;
		case 64:	$stuff = "mounted " . headMount() . " head";					$loot_place = "inside"; 	$loot_size=1;		break;
		case 65:	$stuff = conditionType(wood) . "loom"; 													break;
		case 66:	$stuff = conditionType(cloth) . "mat"; 						$loot_place = "under"; 		$loot_size=3;		break;
		case 67:	$stuff = conditionType(cloth) . "mattress"; 					$loot_place = "inside";		$loot_size=2;		break;
		case 68:	$stuff = conditionType(iron) . "" . steelMaker() . " pail"; 			$loot_place = "inside";		$loot_size=1;		break;
		case 69:	$stuff = conditionType(wood) . "pallet";					$loot_place = "under"; 		$loot_size=3;		break;
		case 70:	$stuff = furnitureMake() . " pedestal"; 		$loot_trap=1;		$loot_place = "on top of";	$loot_size=3;		break;
		case 71:	$stuff = mt_rand(2,10) . " " . conditionType(iron) . "" . steelMaker() . " wall sconces"; 						break;
		case 72:	$stuff = conditionType(cloth) . "" . candleColor(0) . " sheet"; 									break;
		case 73:	$stuff = furnitureMake() . " shelf"; 						$loot_place = "on top of";	$loot_size=3;		break;
		case 74:	$stuff = conditionType(iron) . "" . steelMaker() . " dented shield";									break;
		case 75:	$stuff = "high " . woodenType() . " stool"; 												break;
		case 76:	$stuff = conditionType(wood) . "" . woodenType() . " stool";										break;
		case 77:	$stuff = sizeMake() . " " . furnitureMake() . " table";				$loot_place = "under";		$loot_size=3;		break;
		case 78:	$stuff = furnitureMake() . " throne"; 						$loot_place = "behind";		$loot_size=3;		break;
		case 79:	$stuff = furnitureMake() . " tub";						$loot_place = "inside"; 	$loot_size=3;		break;
		case 80:	$stuff = furnitureMake() . " wall basin";					$loot_place = "inside"; 	$loot_size=1;		break;
		case 81:	$stuff = furnitureMake() . " workbench";					$loot_place = "under"; 		$loot_size=3;		break;
		case 82:	$stuff = conditionType(wood) . "" . woodenType() . " chest of drawers " . closetFiller(0,10,1,$game,0);	$loot_place = "inside"; $loot_size=2;	break;
		case 83:	$stuff = conditionType(wood) . "" . woodenType() . " armoire " . closetFiller(1,10,1,$game,0);		$loot_place = "inside"; $loot_size=3;	break;
		case 84:	$stuff = conditionType(wood) . "" . woodenType() . " plate";										break;
		case 85:	$stuff = mt_rand(2,10) . " " . candleColor(0) . " candles";										break;
		case 86:	$stuff = "shredded and torn clothing";													break;
		case 87:	$stuff = mt_rand(2,10) . " bandages";	if (mt_rand(1,2) == 1){$stuff = mt_rand(2,10) . " bloody bandages";}				break;
		case 88:	$stuff = conditionType(iron) . "" . steelMaker() . " dented plate armor";								break;
		case 89:	$stuff = headoffMaker(0);														break;
		case 90:	$stuff = conditionType(wood) . "basket";					$loot_place = "inside"; 	$loot_size=2;		break;
		case 91:	$stuff = conditionType(iron) . "" . steelMaker() . " bowl";										break;
		case 92:	$stuff = conditionType(wood) . "whip";													break;
		case 93:	$stuff = conditionType(wood) . "" . woodenType() . " brush";										break;
		case 94:	$stuff = candleColor(0) . " candle";													break;
		case 95:	$stuff = conditionType(iron) . "" . steelMaker() . " candle snuffer";									break;
		case 96:	$stuff = preciousChooser() . " candle stick worth " . mt_rand(2,100) . " " . coinMaker($game);						break;
		case 97:	$stuff = conditionType(wood) . "" . woodenType() . " cane";										break;
		case 98:	$stuff = conditionType(iron) . "" . steelMaker() . " pliers";										break;
		case 99:	$stuff = conditionType(wood) . "" . woodenType() . " coffer";	$loot_trap=1;	$loot_place = "inside";		$loot_size=1;		break;
		case 100:	$stuff = bottlePicker() . " of perfume";												break;
		case 101:	$stuff = preciousChooser() . " music box worth " . mt_rand(2,100) . " " . coinMaker($game);	$loot_place = "inside";	$loot_size=1;		break;
		case 102:	$stuff = conditionType(iron) . "" . steelMaker() . " goblet";										break;
		case 103:	$stuff = conditionType(iron) . "" . steelMaker() . " dented helm with a " . headoffMaker(0) . " still in it";				break;
		case 104:	$stuff = conditionType(iron) . "" . steelMaker() . " dipper";										break;
		case 105:	$stuff = conditionType(wood) . "wooden dish";												break;
		case 106:	$stuff = conditionType(wood) . "wooden flagon";												break;
		case 107:	$stuff = conditionType(wood) . "basket with a " . headoffMaker(0) . " inside it";							break;
		case 108:	$stuff = conditionType(iron) . "" . steelMaker() . " fork";										break;
		case 109:	$stuff = conditionType(item) . "hourglass";												break;
		case 110:	$stuff = "jar (" . contentsChooser(0,$game,1) . ")"; if (mt_rand(1,2) == 1){$stuff = "bottle (" . contentsChooser(0,$game,1) . ")";}			break;
		case 111:	$stuff = conditionType(iron) . "" . steelMaker() . " kettle";										break;
		case 112:	$stuff = conditionType(iron) . "" . steelMaker() . " knife";										break;
		case 113:	$stuff = "a " . mt_rand(1,4) . " foot wide hole that is about " . mt_rand(2,8) . " feet deep";						break;
		case 114:	$stuff = conditionType(iron) . "" . steelMaker() . " ladle";										break;
		case 115:	$stuff = conditionType(wood) . "" . woodenType() . " weapon rack " . weaponRack($game,0);							break;
		case 116:	$stuff = "small " . conditionType(iron) . "" . steelMaker() . " mirror";								break;
		case 117:	$stuff = conditionType(iron) . "" . steelMaker() . " mug";										break;
		case 118:	$stuff = conditionType(iron) . "" . steelMaker() . " sewing needle";									break;
		case 119:	$stuff = "pile of dirt";							$loot_place = "inside"; 	$loot_size=3;		break;
		case 120:	$stuff = conditionType(iron) . "" . steelMaker() . " pan";										break;
		case 121:	$stuff = mt_rand(2,20) . " pieces of " . conditionType(paper) . " parchment";	if (mt_rand(1,2) == 1){$stuff = mt_rand(2,20) . " " . conditionType(paper) . " scrolls";}	break;
		case 122:	$stuff = conditionType(wood) . "wooden pitcher";											break;
		case 123:	$stuff = musicChooser(1);														break;
		case 124:	$stuff = conditionType(item) . "smoking pipe";												break;
		case 125:	$stuff = conditionType(iron) . "" . steelMaker() . " pot";			$loot_place = "inside"; 	$loot_size=1;		break;
		case 126:	$stuff = "small bottle of ink";														break;
		case 127:	$stuff = conditionType(item) . "quill";													break;
		case 128:	$stuff = conditionType(iron) . "" . steelMaker() . " rusty razor";									break;
		case 129:	$stuff = "some " . footprintMaker() . " in various spots";										break;
		case 130:	$stuff = "a scattered chess set";	if (mt_rand(1,2) == 1){$stuff = "an incomplete and scattered chess set";}			break;
		case 131:	$stuff = conditionType(iron) . "" . steelMaker() . " sifter";										break;
		case 132:	$stuff = mt_rand(2,20) . " hardened blobs of once melted " . steelMaker();								break;
		case 133:	$stuff = conditionType(iron) . "" . steelMaker() . " spoon";										break;
		case 134:	$stuff = conditionType(iron) . "" . steelMaker() . " tankard";										break;
		case 135:	$stuff = candleColor(0) . " thread (" . mt_rand(2,10) . "0 feet)";									break;
		case 136:	$stuff = conditionType(wood) . "tinderbox";												break;
		case 137:	$stuff = conditionType(cloth) . "" . candleColor(0) . " towel";										break;
		case 138:	$stuff = conditionType(wood) . "wooden tray";												break;
		case 139:	$stuff = mt_rand(2,10) . "0 feet of twine";												break;
		case 140:	$stuff = conditionType(cloth) . "" . candleColor(0) . " washcloth";									break;
		case 141:	$stuff = "whetstone";															break;
		case 142:	$stuff = mt_rand(2,10) . "0 feet of " . candleColor(0) . " yarn";									break;
		case 143:	$stuff = conditionType(cloth) . "" . candleColor(0) . " pillow";		$loot_place = "inside"; 	$loot_size=2;		break;
		case 144:	$stuff = ashMaker($game);								$loot_place = "inside"; 	$loot_size=2;		break;
		case 145:	$stuff = conditionType(cloth) . "" . candleColor(0) . " blanket";									break;
		case 146:	$stuff = drawWith() . " drawings of " . drawingTypes() . " on the " . dungeonWall();							break;
		case 147:	$stuff = drawWith() . " writings on the " . dungeonWall() . " that " . chickenScratch($game);						break;
		case 148:	$stuff = kegFiller(cask,$game,$extra,$cut);	if (mt_rand(1,2) == 1){$stuff = kegFiller(keg,$game,$extra,$cut);}							break;
		case 149:	$stuff = "a huge pile of various bones";					$loot_place = "inside";		$loot_size=3;		break;
		case 150:	$stuff = "a large pile of rocks"; if (mt_rand(1,2) == 1){$stuff = "a large pile of stone blocks";}	$loot_place = "inside"; $loot_size=3;	break;
		case 151:	$stuff = mt_rand(2,10) . " ingots of " . ingotMaker();											break;
		case 152:	$stuff = conditionType(wood) . "" . woodenType() . " cupboard " . foodFiller(10,0); 	$loot_place = "inside"; $loot_size=1;		break;
		case 153:	$stuff = conditionType(wood) . "" . woodenType() . " desk " . makeNormalItem(10,2,1,$game,$cut,0);	$loot_trap=1;	$loot_place = "inside"; $loot_size=2;	break;
		case 154:	$stuff = conditionType(item) . "blacksmith hammer";											break;
		case 155:	$stuff = conditionType(iron) . "" . steelMaker() . " small bell";									break;
		case 156:	$stuff = tortureMaker($game,$cut,0);	break;
		case 157:	$stuff = cageMaker();									$loot_place = "inside"; $loot_size=3;		break;
		case 158:	$stuff = "fire pit";	if (mt_rand(1,2) == 1){$stuff = "fire pit with ashes";}	if (mt_rand(1,4) == 1){$stuff = "fire pit with wood";}	break;
		case 159:	$stuff = mt_rand(2,10) . " " . conditionType(iron) . "" . steelMaker() . " hooks on the wall";						break;
		case 160:	$torches = mt_rand(5,10); $stuff = $torches . " torches on the walls held in " . steelMaker() . " wall sconces...but only " . ceil($torches/mt_rand(2,4)) . " of them are still useable";	break;
		case 161:	$stuff = conditionType(iron) . "" . steelMaker() . " manacles on the " . dungeonWall();							break;
		case 162:	$stuff = conditionType(iron) . "" . steelMaker() . " manacles on the " . dungeonWall() . " with a " . corpseMaker(). " " . makeNormalItem(5,3,1,$game,$cut,0);	break;
		case 163:	$stuff = "jar of lantern oil"; if (mt_rand(1,2) == 1){$stuff = "barrel of lantern oil";	$loot_place = "inside";	$loot_size=2;}		break;
		case 164:	$stuff = conditionType(iron) . "" . steelMaker() . " branding iron";									break;
		case 165:	$stuff = conditionType(wood) . "" . woodenType() . " " . lockerMaker() . " " . makeNormalItem(5,2,1,$game,$cut,0);	$loot_trap=1;	$loot_place = "inside"; 	$loot_size=2;	break;
		case 166:	$stuff = mt_rand(2,6) . " " . eggMaker();												break;
		case 167:	$stuff = paintingMaker(1,0);							$loot_place = "behind"; 	$loot_size=3;		break;
		case 168:	$stuff = paintingMaker(1,1);							$loot_place = "behind"; 	$loot_size=3;		break;
		case 169:	$stuff = conditionType(iron) . "" . steelMaker() . " hand saw";										break;
		case 170:	$stuff = cauldronMaker($game,$extra,$cut);							$loot_place = "inside"; 	$loot_size=2;		break;
		case 171:	$stuff = "small " . conditionType(iron) . "" . steelMaker() . " hanging mirror";$loot_place = "behind"; 	$loot_size=3;		break;
		case 172:	$stuff = normalWeapons(1,3,$game);														break;
		case 173:	$stuff = normalArmor(1,$game);														break;
		case 174:	$stuff = corpseMaker(). " " . makeNormalItem(5,3,1,$game,$cut,0);				$loot_place = "on"; 		$loot_size=3;		break;
		case 175:	$stuff = conditionType(wood) . "" . woodenType() . " armor rack " . armorRack($game,0);							break;
		case 176:	$stuff = scrollContents($game);	break;
	}

	if ($line > 0){$stuffing = ", " . $stuff;}
	else {$stuffing = ". Throughout the area is...&nbsp;" . $stuff;}
	return array($stuff, $loot_place, $loot_size, $loot_trap, $stuffing);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function coinMaker($game)
{
	if (($game == "Swords & Wizardry") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$val = mt_rand(0,2);} else {$val = mt_rand(0,4);}
	if ($game == "Swords & Six-Siders"){$val = 2;}
	switch ($val)
	{
		case 0:	$coin = "copper";	break;
		case 1:	$coin = "silver";	break;
		case 2:	$coin = "gold";		break;
		case 3:	$coin = "electrum";	break;
		case 4:	$coin = "platinum";	break;
	}
	return $coin;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function libraryFiller($amount,$game,$cut)
{
	$amount = mt_rand(1,$amount);

	while ($amount > 0) :
	switch (mt_rand(0,21))
	{
		case 0:	$item = headoffMaker(1);	break;
		case 1:	$item = "hourglass";		break;
		case 2:	$item = "vial of ink";		break;
		case 3:	$item = "quill";			break;
		case 4:	$item = tomeType() . " titled `" . tomeMaker($game) . "` and is bound in " . leatherColor() . " " . materialType(leather) . " skin with " . designColor() . " colored symbols of a " . designType(0) . " on the front and a " . designType(0) . " on the back";	break;
		case 5:	$item = tomeType() . " titled `" . tomeMaker($game) . "` and is bound in " . leatherColor() . " " . materialType(leather) . " skin with a " . designColor() . " colored symbol of a " . designType(0) . " on the front";	break;
		case 6:	$item = tomeType() . " titled `" . tomeMaker($game) . "` and is bound in " . leatherColor() . " " . materialType(leather) . " skin";	break;
		case 7:	$item = "page torn from a spell book";	break;
		case 8:	$item = "small " . leatherColor() . " leather book";	break;
		case 9: $item = "small " . leatherColor() . " leather book of prayers, "; break;
		case 10:$item = "book {<u>" . tomeMaker($game) . "" . tomePower(10,0,mt_rand(1,20),$cut,$game) . "</u>}";	break;
		case 11:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$item = "blank book bound in " . leatherColor() . " leather with a symbol of a " . designType(0) . " on the cover";}
				else {$item = "blank spell book bound in " . leatherColor() . " leather with a symbol of a " . designType(0) . " on the cover";}
			break;
		case 12:
				if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$item = "a small diary of " . authorName() . " the adventurer...that explored this area long ago...but this book will give one a " . mt_rand(1,5) . " in 6 chance to know the secrets of each room in this place";}
				else {$item = "small diary of " . authorName() . " the adventurer...that explored this area long ago...but this book will give one a " . (mt_rand(1,6)*5) . "% chance to know the secrets of each room in this place";}
			break;
		case 13: $m_stuff = "blank book bound in " . leatherColor() . " leather (" . (mt_rand(5,20)*10) . " pages)"; break;

		case 14:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$item = scrollContents($game);}
				else {$item = "scroll with " . powerUp($level) . " level " . spellSchool($game) . " spell";		if (($game == "OSRIC") || ($game == "AD&D") || ($game == "BD&D") || ($game == "BFRGP") || ($game == "Swords & Six-Siders") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry")){$item = "scroll with a " . gameSpellChooser($game,$level,'');}}
			break;
		case 15:	$item = "leather scrollcase";	break;
		case 16:	$item = "bone scrollcase";	break;
		case 17:	$item = mt_rand(2,20) . " pieces of " . conditionType(paper) . " parchment"; if (mt_rand(1,2) == 1){$item = mt_rand(2,20) . " " . conditionType(paper) . " scrolls";}	break;
		case 18: 	$item = "scroll with smudged writing";	break;
		case 19: 	$item = "small parchment describing where some nearby treasure is hidden";	break;
		case 20:	$item = "sheet of parchment";	break;
		case 21:	$item = "small parchment describing how to bypass a nearby trap";	break;
	}
		$amount = $amount - 1;

		$stuff = $item . "&nbsp;--- " . $stuff;

	endwhile;

	return substr($stuff, 0, -10);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function foodFiller($amount,$type)
{
	$amount = mt_rand(1,$amount);

	while ($amount > 0) :
	switch (mt_rand(0,33))
	{
		case 0:		$food = "apricots";			break;
		case 1:		$food = "apples";			break;
		case 2:		$food = "beans";			break;
		case 3:		$food = "berries";			break;
		case 4:		$food = "biscuits";			break;
		case 5:		$food = "bread";			break;
		case 6:		$food = "butter";			break;
		case 7:		$food = "cakes";			break;
		case 8:		$food = "cheese";			break;
		case 9:		$food = "cookies";			break;
		case 10:	$food = "eggs";				break;
		case 11:	$food = "fish";				break;
		case 12:	$food = "fowl";				break;
		case 13:	$food = "grapes";			break;
		case 14:	$food = "greens";			break;
		case 15:	$food = "bottle of honey";	break;
		case 16:	$food = "jar of jam";		break;
		case 17:	$food = "meat";				break;
		case 18:	$food = "bottle of milk";	break;
		case 19:	$food = "muffins";			break;
		case 20:	$food = "mushrooms";		break;
		case 21:	$food = "nuts";				break;
		case 22:	$food = "onions";			break;
		case 23:	$food = "pastries";			break;
		case 24:	$food = "peaches";			break;
		case 25:	$food = "pears";			break;
		case 26:	$food = "peas";				break;
		case 27:	$food = "jar of pickles";	break;
		case 28:	$food = "pie";				break;
		case 29:	$food = "plums";			break;
		case 30:	$food = "prunes";			break;
		case 31:	$food = "pudding";			break;
		case 32:	$food = "raisins";			break;
		case 33:	$food = "tea";				break;
	}
		$amount = $amount - 1;

		$yum = $food . "&nbsp;--- " . $yum;

	endwhile;

	if ($type == 1){$stuff = "spoiled foods of " . substr($yum, 0, -10);}
	else {$stuff = "[<i>SPOILED&nbsp;CONTENTS:&nbsp;" . substr($yum, 0, -10) . "</i>]";}

	return $stuff;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function closetFiller($size,$amount,$where,$game,$type)
{
	if ($size == 1){$rn = 37;} else {$rn = 34;}
	$amount = mt_rand(1,$amount);

	while ($amount > 0) :

		$leather = 0;

	   switch (mt_rand(0,$rn))
	   {
		case 0:	$cloth = "apron";	break;
		case 1:	$cloth = "belt";	$leather = 1;	break;
		case 2:	$cloth = "blouse";	break;
		case 3:	$cloth = "vest";	break;
		case 4:	$cloth = "cap";		break;
		case 5:	$cloth = "cape";	break;
		case 6:	$cloth = "cloak";	break;
		case 7:	$cloth = "coat";	break;
		case 8:	$cloth = "doublet";	break;
		case 9:	$cloth = "dress";	break;
		case 10:$cloth = "girdle";	break;
		case 11:$cloth = "gloves";	$leather = 2;	break;
		case 12:$cloth = "gown";	break;
		case 13:$cloth = "hat";		break;
		case 14:$cloth = "hood";	break;
		case 15:$cloth = "hose";	break;
		case 16:$cloth = "jerkin";	break;
		case 17:$cloth = "kerchief";	break;
		case 18:$cloth = "leggings";	break;
		case 19:$cloth = "mantle";	break;
		case 20:$cloth = "pantaloons";	break;
		case 21:$cloth = "petticoat";	break;
		case 22:$cloth = "pouch";	$leather = 3;	break;
		case 23:$cloth = "pouch";	$leather = 2;	break;
		case 24:$cloth = "robe";	break;
		case 25:$cloth = "veil";	break;
		case 26:$cloth = "scarf";	break;
		case 27:$cloth = "shawl";	break;
		case 28:$cloth = "shirt";	break;
		case 29:$cloth = "tunic";	break;
		case 30:$cloth = "smock";	break;
		case 31:$cloth = "stockings";	break;
		case 32:$cloth = "surcoat";	break;
		case 33:$cloth = "toga";	break;
		case 34:$cloth = "trousers";	break;
		case 35:$cloth = "slippers";	break;
		case 36:$cloth = "sandals";	$leather = 1;	break;
		case 37:$cloth = "boots";	$leather = 1;	break;
	   }

		if ($leather == 1){$clothing = leatherColor() . " leather " . $cloth;}
		else if (($leather == 2) && (mt_rand(1,100) > 50)){$clothing = leatherColor() . " leather " . $cloth;}
		else if ($leather == 2){$clothing = candleColor(0) . " cloth " . $cloth;}
		else if ($leather == 3){$clothing = candleColor(0) . " cloth " . $cloth . " (contains " . mt_rand(3,30) . " " . coinMaker($game) . ")";}
		else {$clothing = candleColor(0) . " " . $cloth;}

		if (($where > 0) && ($cloth != "pouch") && (mt_rand(1,100) > 30))
		{
			switch (mt_rand(0,4))
			{
				case 0:	$torn = "torn";		break;
				case 1:	$torn = "ripped";	break;
				case 2:	$torn = "ruined";	break;
				case 3:	$torn = "moldy";	break;
				case 4:	$torn = "dirty";	break;
			}
			$clothing = $torn . " " . $clothing;
		}

		$amount = $amount - 1;

		$wardrobe = $clothing . "&nbsp;--- " . $wardrobe;

	endwhile;

	if ($type == 1){$stuff = substr($wardrobe, 0, -10);}
	else {$stuff = "[<i>CONTAINS:&nbsp;" . substr($wardrobe, 0, -10) . "</i>]";}

	return $stuff;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function musicChooser($condition)
{
	$flute = array('bandora', 'chime', 'drum', 'fife', 'flute', 'gong', 'harp', 'horn', 'lute', 'lyre', 'mandolin', 'pipes', 'rebeck', 'recorder');
	$flute = $flute[mt_rand(0,13)];
	if (($condition == 1) && (mt_rand(1,100) > 30)){$flute = "broken " . $flute;}
	return $flute;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function contentsChooser($fillmeup,$game,$reg)
{
	if ((mt_rand(1,100) < 30) && ($fillmeup != 1)){$goop = "empty";}

	if ($reg > 0){$reg = mt_rand(1,$reg);} else {$reg = mt_rand(1,3);}

	if ($reg == 1)
	{
		if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
		{
			$value = array('ant', 'animal', 'bat', 'bear', 'beetle', 'boar', 'brownie', 'bugbear', 'basilisk', 'bull', 'fruglum', 'cat', 'centaur', 'chimera', 'cow', 'crocodile', 'cyclops', 'daklafar', 'demon', 'devil', 'doppelganger', 'dragon', 'drake', 'dryad', 'dwarf', 'elf', 'ettin', 'frog', 'gargoyle', 'ghoul', 'giant', 'gnoll', 'gnome', 'goblin', 'gorilla', 'gremlin', 'griffin', 'hag', 'hobling', 'harpy', 'hippogriff', 'hobgoblin', 'horse', 'hydra', 'imp', 'kobold', 'kraken', 'leprechaun', 'lizard', 'sauriman', 'medusa', 'human', 'minotaur', 'mouse', 'naga', 'slitheran', 'nixie', 'ogre', 'orke', 'pixie', 'pegasus', 'phoenix', 'rattanu', 'rat', 'neptar', 'satyr', 'scorpion', 'serpent', 'shark', 'snake', 'sphinx', 'mantaran', 'spider', 'sylvan', 'sprite', 'succubus', 'sylvan', 'titan', 'toad', 'troglodite', 'troll', 'unicorn', 'vampire', 'weasel', 'greyling', 'falcoran', 'werewolf', 'werecat', 'wolf', 'worm', 'wyrm', 'wyvern', 'yeti', 'zombie');
		}
		else
		{
			$value = array('ant', 'animal', 'bat', 'bear', 'beetle', 'boar', 'brownie', 'bugbear', 'basilisk', 'bull', 'froglok', 'cat', 'centaur', 'chimera', 'cow', 'crocodile', 'cyclops', 'dark elf', 'demon', 'devil', 'doppelganger', 'dragon', 'drake', 'dryad', 'dwarf', 'elf', 'ettin', 'frog', 'gargoyle', 'ghoul', 'giant', 'gnoll', 'gnome', 'goblin', 'gorilla', 'gremlin', 'griffin', 'hag', 'hobbit', 'harpy', 'hippogriff', 'hobgoblin', 'horse', 'hydra', 'imp', 'kobold', 'kraken', 'leprechaun', 'lizard', 'lizard man', 'medusa', 'human', 'minotaur', 'mouse', 'naga', 'nightmare', 'nixie', 'ogre', 'orc', 'pixie', 'pegasus', 'phoenix', 'giant lizard', 'rat', 'giant snake', 'satyr', 'scorpion', 'serpent', 'shark', 'snake', 'sphinx', 'giant spider', 'spider', 'sylvan', 'sprite', 'succubus', 'sylvan', 'titan', 'toad', 'troglodite', 'troll', 'unicorn', 'vampire', 'weasel', 'werebear', 'wererat', 'werewolf', 'werecat', 'wolf', 'worm', 'wyrm', 'wyvern', 'yeti', 'zombie');
		}
		$stufv = count($value)-1;
		$filled = $value[mt_rand(0,$stufv)];
		$stuff = array('bile', 'blood', 'bone dust', 'essence', 'extract', 'eyes', 'hair/skin', 'herbs', 'juice', 'oil', 'powder', 'salt', 'sauce', 'scent', 'serum', 'spice', 'spit', 'tears', 'teeth', 'urine');
		$stuffing = $stuff[mt_rand(0,19)];
	    $goop =  "filled with " . $filled . " " . $stuffing;
		if ($fillmeup == 1){$goop =  $filled . " " . $stuffing;}
	}
	else if ($reg == 2)
	{
		$stuff = array('ants', 'bat whiskers', 'bees', 'black cat hair', 'black salt', 'bloodworms', 'cat whiskers', 'centipedes', 'coffin shavings', 'crystal moonbeams', 'cyclops eyelashes', 'dragon scales', 'efreet dust', 'elemental dust', 'eye of newt', 'fairy dust', 'fairy wings', 'fire giant ash', 'gelatinous goo', 'genie smoke', 'ghoul skin flakes', 'graveyard dirt', 'slime', 'hell hound ash', 'leeches', 'lich dust', 'love honey', 'mosquitoes', 'mummy spice', 'mystic dust', 'ochre jelly', 'phoenix ash', 'pixie dust', 'pixie wings', 'ritual powder', 'sea serpent salt', 'serpent scales', 'snake scales', 'sorcerer sand', 'sprite wings', 'tree leaves', 'tree root', 'tree sap', 'vampire ash', 'viper essence', 'wasps', 'wisp dust', 'witch hazel', 'worms', 'zombie flesh');
		$stufc = count($stuff)-1;
		$stuffing = $stuff[mt_rand(0,$stufc)];

		if ($stuffing == "slime"){$stuffing = slimeColor() . " slime";}
		else if (($stuffing == "bees") || ($stuffing == "ants") || ($stuffing == "wasps") || ($stuffing == "leeches") || ($stuffing == "mosquitoes") || ($stuffing == "worms") || ($stuffing == "bloodworms") || ($stuffing == "centipedes"))
		{
			if (mt_rand(1,100) > 30){$status = "dead";} else {$status = "live";}
			$stuffing = $status . " " . $stuffing;
		}
		$goop =  "filled with " . $stuffing;
		if ($fillmeup == 1){$goop =  $stuffing;}
	}
	else
	{
		switch (mt_rand(0,54))
		{
			case 0: $reagent = "glands from a " . strtolower(animalPicker()); break;
			case 1: $reagent = "human thalamus glands"; break;
			case 2: $reagent = "simian thalamus glands"; break;
			case 3: $reagent = "ears of a cat"; break;
			case 4: $reagent = "eyes of a bird"; break;
			case 5: $reagent = "organs from a " . strtolower(animalPicker()); break;
			case 6: $reagent = "brains of a " . giantType(1); break;
			case 7: $reagent = "brains of a " . dragonType(1); break;
			case 8: $reagent = "brains of a demon"; break;
			case 9: $reagent = "devil tongues"; break;
			case 10: $reagent = "doppleganger flesh"; break;
			case 11: $reagent = "dragon blood"; break;
			case 12: $reagent = "dryad hair"; break;
			case 13: $reagent = "elf blood"; break;
			case 14: $reagent = "fire elemental ashes"; break;
			case 15: $reagent = "gargoyle horns"; break;
			case 16: $reagent = "ghost ectoplasm"; break;
			case 17: $reagent = "giant insect legs"; break;
			case 18: $reagent = "giant pike livers"; break;
			case 19: $reagent = "giant weasel blood"; break;
			case 20: $reagent = "giant wolverine blood"; break;
			case 21: $reagent = "giant worm glands"; break;
			case 22: $reagent = "gold dragon scales"; break;
			case 23: $reagent = "harpy tongues"; break;
			case 24: $reagent = "lion hearts"; break;
			case 25: $reagent = "hippogriff feathers"; break;
			case 26: $reagent = "invisible ghostly ichor"; break;
			case 27: $reagent = "lich tongues"; break;
			case 28: $reagent = "lycanthrope skin"; break;
			case 29: $reagent = "minotaur hearts"; break;
			case 30: $reagent = "nixie blood"; break;
			case 31: $reagent = "nixie organs"; break;
			case 32: $reagent = "ogre mage blood"; break;
			case 33: $reagent = "ogre mage glands"; break;
			case 34: $reagent = "ogre mage teeth"; break;
			case 35: $reagent = "pegasus hearts"; break;
			case 36: $reagent = "powdered gem stones"; break;
			case 37: $reagent = "powdered kobold horns"; break;
			case 38: $reagent = "rakshasa ichor"; break;
			case 39: $reagent = "screaming mushroom spores"; break;
			case 40: $reagent = "slamander scales"; break;
			case 41: $reagent = "spectre dust"; break;
			case 42: $reagent = "succubus hair"; break;
			case 43: $reagent = "sweat from a " . giantType(1); break;
			case 44: $reagent = "telepath brains"; break;
			case 45: $reagent = "triton blood"; break;
			case 46: $reagent = "troll blood"; break;
			case 47: $reagent = "vampire brains"; break;
			case 48: $reagent = "vampire dust"; break;
			case 49: $reagent = "vampire eyes"; break;
			case 50: $reagent = "water elemental eyes"; break;
			case 51: $reagent = "water naga blood"; break;
			case 52: $reagent = "wererat blood"; break;
			case 53: $reagent = "will-o-wisp essence"; break;
			case 54: $reagent = "wyvern blood"; break;
		}
		$goop =  "filled with " . $reagent;
		if ($fillmeup == 1){$goop =  $reagent;}
	}
	return $goop;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function normalArmor($condition,$game) 
{
	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")) // USE THE SIMPLE ITEMS FROM MAGESTYKC ///////////////////////////////////
	{
		$tt_easy_items = $_SESSION['tt_easy_items'];
		if ( $tt_easy_items == 1 ) // USE THE SIMPLE ARMOR FROM MAGESTYKC ////////////////////////////
		{
			if ($game == "Tunnels & Trolls Deluxe"){ $item_from_tt = TTArmsArmor(2,0,42,$game); } else { $item_from_tt = TTArmsArmor(2,0,32,$game); }
				$nt_type = $item_from_tt[0];
				$nt_category = $item_from_tt[1];
				$nt_name = $item_from_tt[2];
				$nt_str = $item_from_tt[5];
				$nt_val = $item_from_tt[8];
				$nt_hits = $item_from_tt[11];
				$nt_material = $item_from_tt[12];

			if ($nt_category == "Shield"){$nt_iam = "shield";} else if ($nt_category == "Suit"){$nt_iam = "full suit of armor";} else {$nt_iam = "armor for " . strtolower($nt_category);}

			if ( ($nt_category == "Shield") && (mt_rand(1,100) > 60) ){$logo = "...with a " . designType(0) . " symbol on the front that is " . designColor() . " in color";}
			if ( ( ($nt_category == "Suit") || ($nt_category == "Chest") ) && (mt_rand(1,100) > 60))
			{
				if (mt_rand(1,100) > 50){$sew = "back";} else if (mt_rand(1,100) > 50){$sew = "front";} else {$sew = "front and back";
			}
				$logo = "...with a " . designType(0) . " symbol on the " . $sew . " that is " . designColor() . " in color";}
		
			if ($nt_material == "L"){$decorate = "[made of " . materialType(leather) . " hide and is " . leatherColor() . " in color" . $logo. "]";}
			else if ($nt_material == "C"){$decorate = "[made of " . materialType(cloth) . " and is " . leatherColor() . " in color" . $logo. "]";}
			else if ($nt_material == "W"){$decorate = "[made of " . materialType(wood) . " and is " . leatherColor() . " in color" . $logo. "]";}
			else {$decorate = "[made of " . materialType(iron) . "" . $logo. "]";}

			if (($condition == 1) && (mt_rand(1,100) > 30))
			{
				$item = strtolower($nt_name);

				if ( ($nt_material == "L" ) || ($nt_material == "C") )
				{
					if (mt_rand(1,100) > 50){$item = "torn " . $item;}
					else {$item = "ruined " . $item;}
				}
				else if ($nt_material == "W")
				{	switch (mt_rand(0,3))
					{
						case 0:	$dmng = "warped";	break;
						case 1:	$dmng = "cracked";	break;
						case 2:	$dmng = "ruined";	break;
						case 3:	$dmng = "rotton";	break;
					}
					$item = $dmng . " " . $item;
				}
				else
				{	switch (mt_rand(0,3))
					{
						case 0:	$dmng = "broken";	break;
						case 1:	$dmng = "rusted";	break;
						case 2:	$dmng = "ruined";	break;
						case 3:	$dmng = "dented";	break;
					}
					$item = $dmng . " " . $item;
				}
			}
			else
			{
				$item = strtolower($nt_name) . " (" . $nt_iam . "&nbsp;/&nbsp;HITS:" . $nt_hits . "&nbsp;/&nbsp;STR:" . $nt_str . "]";
				$item = $item . " " . $decorate;
			}
		}
		else // USE THE ARMOR FROM THE T&T GAME ////////////////////////////////////////////////////////
		{
			if ($game == "Tunnels & Trolls Deluxe"){	if ($size == 1){$r_min=0; $r_max = 14;} else if ($size == 2){$r_min=0; $r_max = 36;} else {$r_min=0; $r_max = 42;} }
			else {										if ($size == 1){$r_min=0; $r_max = 13;} else if ($size == 2){$r_min=0; $r_max = 23;} else {$r_min=0; $r_max = 41;} }

			$item_from_tt = TTArmsArmor(3,$r_min,$r_max,$game);

				$tt_armor = $item_from_tt[0] . " - " . $item_from_tt[2];
				$tt_material = $item_from_tt[12];

			$item = strtolower($tt_armor);

			$item_sx = explode(" - ", $item);

			if (mt_rand(1,100) > 60){$logo = "...with a " . designType(0) . " symbol on it that is " . designColor() . " in color";}

			if ($tt_material == "L"){$decorate = "[made of " . materialType(leather) . " hide and is " . leatherColor() . " in color" . $logo. "]";}
			else if ($tt_material == "M"){$decorate = "[made of " . materialType(iron) . "" . $logo. "]";}
			else {$decorate = "[it is " . candleColor(0) . " in color" . $logo. "]";}

			if (($condition == 1) && (mt_rand(1,100) > 30))
			{
				if ($tt_material != "M")
				{
					switch (mt_rand(0,2))
					{
						case 0:	$dmng = "torn";	break;
						case 1:	$dmng = "ruined";	break;
						case 2:	$dmng = "damaged";	break;
					}
					$item = "[" . $item_sx[0] . "]" . $dmng . " " . $item_sx[1];

				}
				else
				{
					switch (mt_rand(0,4))
					{
						case 0:	$dmng = "broken";	break;
						case 1:	$dmng = "rusted";	break;
						case 2:	$dmng = "ruined";	break;
						case 3:	$dmng = "dented";	break;
						case 4:	$dmng = "damaged";	break;
					}
					$item = "[" . $item_sx[0] . "]" . $dmng . " " . $item_sx[1];
				}
			}
			else {$item = "[" . $item_sx[0] . "]" . $item_sx[1] . " " . $decorate;}
		}
	}
	else
	{
		if ($game == "Swords & Six-Siders")
		{
			$dr_lit = "(light) ";
			$dr_med = "(medium) ";
			$dr_hev = "(heavy) ";
		}
		$smithy = mt_rand(1,20);
		if ($smithy < 2){$item = $dr_hev . "banded mail armor";}
		else if ($smithy < 5){$item = $dr_med . "chain mail armor";}
		else if ($smithy < 7){$item = $dr_lit . "leather armor"; $leather = 1;}
		else if ($smithy < 10){$item = $dr_hev . "plate mail armor";}
		else if ($smithy < 11){$item = $dr_med . "ring mail armor";}
		else if ($smithy < 13){$item = $dr_hev . "splint mail armor";}
		else if ($smithy < 15){$item = $dr_lit . "studded leather armor"; $leather = 1;}
		else
		{	switch (mt_rand(0,4))
			{
				case 0:	$item = "small shield";	break;
				case 1:	$item = "large shield";	break;
				case 2:	$item = "tower shield";	break;
				case 3:	$item = "buckler";		break;
				case 4:	$item = "shield";		break;
			}
		}
		if (($smithy > 14) && (mt_rand(1,100) > 60)){$logo = "...with a " . designType(0) . " symbol on the front that is " . designColor() . " in color";}
		if (($smithy < 15) && (mt_rand(1,100) > 60))
		{
			if (mt_rand(1,100) > 50){$sew = "back";} else if (mt_rand(1,100) > 50){$sew = "front";} else {$sew = "front and back";
		}
			$logo = "...with a " . designType(0) . " symbol on the " . $sew . " that is " . designColor() . " in color";}
	
		if ($leather == 1){$decorate = "[made of " . materialType(leather) . " hide and is " . leatherColor() . " in color" . $logo. "]";}
		else {$decorate = "[made of " . materialType(iron) . "" . $logo. "]";}

		if (($condition == 1) && (mt_rand(1,100) > 30)){

			if ($leather > 0){ if (mt_rand(1,100) > 50){$item = "torn " . $item;} else {$item = "ruined " . $item;} }
			else
			{	switch (mt_rand(0,3))
				{
					case 0:	$dmng = "broken";	break;
					case 1:	$dmng = "rusted";	break;
					case 2:	$dmng = "ruined";	break;
					case 3:	$dmng = "dented";	break;
				}
				$item = $dmng . " " . $item;
			}
		}
		else {$item = $item . " " . $decorate;}
	}

	return $item;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function normalWeapons($condition,$size,$game)
{
	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe"))
	{
		$term = "DICE";
		$turm = "";
		if ( $game == "Tunnels & Trolls Deluxe" ){ $term = "DMG"; $turm = "d6"; }

		$tt_easy_items = $_SESSION['tt_easy_items'];
		if ( $tt_easy_items == 1 ) // USE THE SIMPLE WEAPONS FROM MAGESTYKC ////////////////////////////
		{
			if ($game == "Tunnels & Trolls Deluxe"){	if ($size == 1){$r_min=0; $r_max = 25;} else if ($size == 2){$r_min=0; $r_max = 44;} else {$r_min=0; $r_max = 89;} }
			else {										if ($size == 1){$r_min=0; $r_max = 21;} else if ($size == 2){$r_min=0; $r_max = 43;} else {$r_min=0; $r_max = 94;} }

			$item_from_tt = TTArmsArmor(1,$r_min,$r_max,$game);
				$nt_type = $item_from_tt[0];
				$nt_category = $item_from_tt[1];
				$nt_name = $item_from_tt[2];
				$nt_dice = $item_from_tt[3];
				$nt_adds = $item_from_tt[4];
				$nt_str = $item_from_tt[5];
				$nt_dex1 = $item_from_tt[6];
				$nt_dex2 = $item_from_tt[7];
				$nt_val = $item_from_tt[8];
				$nt_hands = $item_from_tt[9];
				$nt_range = $item_from_tt[10];
				$nt_hits = $item_from_tt[11];
				$nt_material = $item_from_tt[12];
				$bow = $item_from_tt[13];
				$quiver = $item_from_tt[14];
				$pole = $item_from_tt[15];
				$smith2 = $item_from_tt[16];
				$smith1 = $item_from_tt[17];

			if ($nt_dex2 > 0){ $nt_dex = $nt_dex1 . "/" . $nt_dex2; } else { $nt_dex = $nt_dex1; }
			if ($nt_range > 0){ $nt_haul = "&nbsp;/&nbsp;RNG:" . $nt_range; } else { $nt_haul = ""; }
			if ($nt_adds > 0){ $nt_roll = $nt_dice . $turm . "+" . $nt_adds; } else if ($nt_adds < 0){ $nt_roll = $nt_dice . $turm . $nt_adds; } else { $nt_roll = $nt_dice . $turm; }

			$item = strtolower($nt_name) . " (" . $term . ":" . $nt_roll . "&nbsp;/&nbsp;STR:" . $nt_str . "&nbsp;/&nbsp;DEX:" . $nt_dex . "&nbsp;/&nbsp;HND:" . $nt_hands . $nt_haul . ")";

			$owner = manyName();
			if ($smith2 == "hilt")
			{
				if (mt_rand(1,100) > 80){$smith3 = materialType(leather) . " leather";} else {$smith3 = "leather";}
					$decorate = "[the " . $smith1 . " is made of " . materialType(iron) . " with a " . $smith3 . " grip";
				if (mt_rand(1,100) > 50){$etch = $smith1;} else {$etch = $smith2;}
				if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is engraved on the " . $etch;}
				if (mt_rand(1,100) > 80){$decorate = $decorate . "...the " . $etch . " is decorated with " . mt_rand(3,12) . " gems {" . gemChooser() . "}]";}
				else {$decorate = $decorate . "" . $belongs . "]";}
			}
			else if ($smith1 != "")
			{
				if (mt_rand(1,100) > 80){$smith3 = materialType(leather) . " leather";} else {$smith3 = "leather";}
					$decorate = "[the " . $smith1 . " is made of " . materialType(iron) . " and has a " . materialType(handle) . " " . $smith2 . " with a " . $smith3 . " grip";
					if ($pole == 1){$decorate = "[the " . $smith1 . " is made of " . materialType(iron) . " and has a " . materialType(handle) . " " . $smith2;}
				if (mt_rand(1,100) > 50){$etch = $smith1;} else {$etch = $smith2;}
				if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is engraved on the " . $etch;}
				if (mt_rand(1,100) > 80){$decorate = $decorate . "...the " . $etch . " is decorated with " . mt_rand(3,12) . " gems {" . gemChooser() . "}]";}
				else {$decorate = $decorate . "" . $belongs . "]";}
			}
			else if ($bow == 1){ $decorate = "[" . materialType(bow);
				if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is carved on it";}
				$decorate = $decorate . "" . $belongs . "]";
			}
			else if ($bow == 2){ $decorate = "[made of " . materialType(leather) . " hide";
				if (mt_rand(1,100) > 50){$etch = "burned";} else {$etch = "stitched";}
				if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is " . $etch . " on it";}
				if (mt_rand(1,100) > 80){$belongs = $belongs . "...the cradle is decorated with a " . gemChooser();}
				$decorate = $decorate . "" . $belongs . "]";
			}
			else if ($nt_material == "M"){ $decorate = "[made of " . materialType(iron) . "]"; }
			else if ($nt_material == "W"){ $decorate = "[made of " . materialType(wood) . "]"; }

			if (($condition == 1) && (mt_rand(1,100) > 30))
			{
				$item = strtolower($nt_name);
				if ($bow == 2){ if (mt_rand(1,100) > 50){$item = "torn " . $item;} else {$item = "ruined " . $item;} }
				else if ($bow == 1){ if (mt_rand(1,100) > 50){$item = "broken " . $item;} else {$item = "warped " . $item;} }
				else if ($quiver != ""){$item = "broken " . $item;}
				else if ($smith1 == "blade"){ if (mt_rand(1,100) > 50){$item = "rusty " . $item;} else {$item = "broken " . $item;} }
				else { if (mt_rand(1,100) > 50){$item = "broken " . $item;} else {$item = "ruined " . $item;} }
			}
			else {$item = $item . "" . $quiver . " " . $decorate;}
		}
		else // USE THE WEAPONS FROM THE T&T GAME //////////////////////////////////////////////////////
		{
			$which_tt_weapon = mt_rand(1,100);
			$decorate = "";

			if ($which_tt_weapon > 40)
			{
				if ($game == "Tunnels & Trolls Deluxe"){	if ($size == 1){$r_min=0; $r_max = 23;} else if ($size == 2){$r_min=0; $r_max = 83;} else {$r_min=0; $r_max = 164;} }
				else {										if ($size == 1){$r_min=0; $r_max = 17;} else if ($size == 2){$r_min=0; $r_max = 47;} else {$r_min=0; $r_max = 121;} }

				$item_from_tt = TTArmsArmor(4,$r_min,$r_max,$game);
				$item = $item_from_tt[2];

				if (($condition == 1) && (mt_rand(1,100) > 30))
				{
					switch (mt_rand(0,4))
					{
						case 0:	$decorate = "useless";	break;
						case 1:	$decorate = "broken";	break;
						case 2:	$decorate = "ruined";	break;
						case 3:	$decorate = "worn";		break;
						case 3:	$decorate = "damaged";	break;
					}
				}
				else
				{
					switch (mt_rand(0,20))
					{
						case 0:	$decorate = "silvery";		break;
						case 1:	$decorate = "golden";		break;
						case 2:	$decorate = "ancient";		break;
						case 3:	$decorate = "fine-crafted";	break;
						case 4:	$decorate = "pristine";		break;
						case 5:	$decorate = "old";			break;
					}
				}
			}
			else if ($which_tt_weapon > 10)
			{
				if ($game == "Tunnels & Trolls Deluxe"){	if ($size == 1){$r_min=0; $r_max = 6;} else if ($size == 2){$r_min=0; $r_max = 8;} else {$r_min=0; $r_max = 17;} }
				else {										if ($size == 1){$r_min=0; $r_max = 4;} else if ($size == 2){$r_min=0; $r_max = 10;} else {$r_min=0; $r_max = 26;} }

				$item_from_tt = TTArmsArmor(5,$r_min,$r_max,$game);
				$item = "runmeone";
				switch (mt_rand(0,32))
				{
					case 0:	$item = "Crossbow - Quarrels (" . mt_rand(6,24) . ")"; break;
					case 1:	$item = "Longbow - Sheaf Of Arrows (" . mt_rand(6,24) . ")"; break;
					case 2:	$item = "Ranged - Darts (" . mt_rand(10,30) . ")"; break;
					case 3:	$item = "Ranged - Pouch Of " . mt_rand(1,10) . "0 Stones"; break;
				}
				if ($item == "runmeone"){$item = $item_from_tt[2];}
				if (($condition == 1) && (mt_rand(1,100) > 30))
				{
					switch (mt_rand(0,4))
					{
						case 0:	$decorate = "useless";	break;
						case 1:	$decorate = "broken";	break;
						case 2:	$decorate = "ruined";	break;
						case 3:	$decorate = "worn";		break;
						case 4:	$decorate = "damaged";	break;
					}
				}
				else
				{
					switch (mt_rand(0,12))
					{
						case 0:	$decorate = "ancient";		break;
						case 1:	$decorate = "fine-crafted";	break;
						case 2:	$decorate = "pristine";		break;
						case 3:	$decorate = "old";			break;
					}
				}
			}
			else
			{
				if ($game == "Tunnels & Trolls Deluxe"){	if ($size == 1){$r_min=0; $r_max = 15;} else if ($size == 2){$r_min=0; $r_max = 16;} else {$r_min=0; $r_max = 16;} }
				else {										if ($size == 1){$r_min=0; $r_max = 6;} else if ($size == 2){$r_min=0; $r_max = 13;} else {$r_min=0; $r_max = 14;} }

				$item_from_tt = TTArmsArmor(6,$r_min,$r_max,$game);
				$item = $item_from_tt[2];

				if (($condition == 1) && (mt_rand(1,100) > 30))
				{
					switch (mt_rand(0,4))
					{
						case 0:	$decorate = "useless";	break;
						case 1:	$decorate = "broken";	break;
						case 2:	$decorate = "ruined";	break;
						case 3:	$decorate = "worn";		break;
						case 4:	$decorate = "damaged";	break;
					}
				}
				else
				{
					switch (mt_rand(0,12))
					{
						case 0:	$decorate = "ancient";		break;
						case 1:	$decorate = "fine-crafted";	break;
						case 2:	$decorate = "pristine";		break;
						case 3:	$decorate = "old";			break;
					}
				}
			}

			$item = strtolower($item);

			$item_sx = explode(" - ", $item);

			$item = $decorate . " " . $item_sx[1] . " [" . $item_sx[0] . "]";
		}
	}
	else
	{
		if ($size == 1){$r_min=0; $r_max = 4;} else if ($size == 2){$r_min=0; $r_max = 21;} else {$r_min=0; $r_max = 36;}
		switch (mt_rand($r_min,$r_max))
		{
			case 0:	$item = "knife";		$smith1 = "blade";	$smith2 = "handle";	break;
			case 1:	$item = "arrow";		$quiver = " {" . mt_rand(5,20) . " each}";	break;
			case 2:	$item = "bolt";			$quiver = " {" . mt_rand(5,20) . " each}";	break;
			case 3:	$item = "dagger";		$smith1 = "blade";	$smith2 = "handle";	break;
			case 4:	$item = "sling";		$bow = 2;					break;
			case 5:	$item = "scimitar";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 6:	$item = "axe";			$smith1 = "blade";	$smith2 = "handle";	break;
			case 7:	$item = "hand axe";		$smith1 = "blade";	$smith2 = "handle";	break;
			case 8:	$item = "battle axe";		$smith1 = "blade";	$smith2 = "handle";	break;
			case 9:	$item = "bow";			$bow = 1;					break;
			case 10:$item = "crossbow";		$bow = 1;					break;
			case 11:$item = "light flail";		$smith1 = "end";	$smith2 = "handle";	break;
			case 12:$item = "heavy flail";		$smith1 = "end";	$smith2 = "handle";	break;
			case 13:$item = "light warhammer";	$smith1 = "blunt end";	$smith2 = "handle";	break;
			case 14:$item = "heavy warhammer";	$smith1 = "blunt end";	$smith2 = "handle";	break;
			case 15:$item = "light mace";		$smith1 = "blunt end";	$smith2 = "handle";	break;
			case 16:$item = "heavy mace";		$smith1 = "blunt end";	$smith2 = "handle";	break;
			case 17:$item = "morning star";		$smith1 = "star";	$smith2 = "handle";	break;
			case 18:$item = "light pick";		$smith1 = "pick";	$smith2 = "handle";	break;
			case 19:$item = "heavy pick";		$smith1 = "pick";	$smith2 = "handle";	break;
			case 20:$item = "short sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 21:$item = "short sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 22:$item = "long sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 23:$item = "bastard sword";	$smith1 = "blade";	$smith2 = "hilt";	break;
			case 24:$item = "broad sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 25:$item = "two-handed sword";	$smith1 = "blade";	$smith2 = "hilt";	break;
			case 26:$item = "halberd";		$smith1 = "blade";	$smith2 = "handle";	$pole = 1;	break;
			case 27:$item = "pole arm";		$smith1 = "tip";	$smith2 = "handle";	$pole = 1;	break;
			case 28:$item = "battle staff";		$smith1 = "length";	$smith2 = "handle";	$pole = 1;	break;
			case 29:$item = "spear";		$smith1 = "tip";	$smith2 = "handle";	$pole = 1;	break;
			case 30:$item = "trident";		$smith1 = "fork";	$smith2 = "handle";	$pole = 1;	break;
			case 31:$item = "kryss";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 32:$item = "great sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 33:$item = "long sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 34:$item = "bastard sword";	$smith1 = "blade";	$smith2 = "hilt";	break;
			case 35:$item = "broad sword";		$smith1 = "blade";	$smith2 = "hilt";	break;
			case 36:$item = "two-handed sword";	$smith1 = "blade";	$smith2 = "hilt";	break;
		}
		$owner = manyName();
		if ($smith2 == "hilt")
		{
			if (mt_rand(1,100) > 80){$smith3 = materialType(leather) . " leather";} else {$smith3 = "leather";}
				$decorate = "[the " . $smith1 . " is made of " . materialType(iron) . " with a " . $smith3 . " grip";
			if (mt_rand(1,100) > 50){$etch = $smith1;} else {$etch = $smith2;}
			if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is engraved on the " . $etch;}
			if (mt_rand(1,100) > 80){$decorate = $decorate . "...the " . $etch . " is decorated with " . mt_rand(3,12) . " gems {" . gemChooser() . "}]";}
			else {$decorate = $decorate . "" . $belongs . "]";}
		}
		else if ($smith1 != "")
		{
			if (mt_rand(1,100) > 80){$smith3 = materialType(leather) . " leather";} else {$smith3 = "leather";}
				$decorate = "[the " . $smith1 . " is made of " . materialType(iron) . " and has a " . materialType(handle) . " " . $smith2 . " with a " . $smith3 . " grip";
				if ($pole == 1){$decorate = "[the " . $smith1 . " is made of " . materialType(iron) . " and has a " . materialType(handle) . " " . $smith2;}
			if (mt_rand(1,100) > 50){$etch = $smith1;} else {$etch = $smith2;}
			if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is engraved on the " . $etch;}
			if (mt_rand(1,100) > 80){$decorate = $decorate . "...the " . $etch . " is decorated with " . mt_rand(3,12) . " gems {" . gemChooser() . "}]";}
			else {$decorate = $decorate . "" . $belongs . "]";}
		}
		else if ($bow == 1){ $decorate = "[" . materialType(bow);
			if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is carved on it";}
			$decorate = $decorate . "" . $belongs . "]";
		}
		else if ($bow == 2){ $decorate = "[made of " . materialType(leather) . " hide";
			if (mt_rand(1,100) > 50){$etch = "burned";} else {$etch = "stitched";}
			if (mt_rand(1,100) > 80){$belongs = "...the name of <i>" . $owner . "</i> is " . $etch . " on it";}
			if (mt_rand(1,100) > 80){$belongs = $belongs . "...the cradle is decorated with a " . gemChooser();}
			$decorate = $decorate . "" . $belongs . "]";
		}

		if (($condition == 1) && (mt_rand(1,100) > 30)){

			if ($bow == 2){ if (mt_rand(1,100) > 50){$item = "torn " . $item;} else {$item = "ruined " . $item;} }
			else if ($bow == 1){ if (mt_rand(1,100) > 50){$item = "broken " . $item;} else {$item = "warped " . $item;} }
			else if ($quiver != ""){$item = "broken " . $item;}
			else if ($smith1 == "blade"){ if (mt_rand(1,100) > 50){$item = "rusty " . $item;} else {$item = "broken " . $item;} }
			else { if (mt_rand(1,100) > 50){$item = "broken " . $item;} else {$item = "ruined " . $item;} }
		}
		else {$item = $item . "" . $quiver . " " . $decorate;}
	}

	return $item;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function makeNiceItem($size,$cut,$game)
{
	switch (mt_rand(0,5))
	{
		case 0:	$item = ucfirst(normalArmor(0,$game));								break;
		case 1:	$item = ucfirst(normalWeapons(0,$size,$game));						break;
		case 2:	$item = $item = "GEM:	" . ucwords(gemCreator($cut));				break;
		case 3:	$item = $item = "JEWELRY:	" . ucwords(jewelCreator($cut));		break;
		case 4:	$item = ucfirst(normalArmor(0,$game));								break;
		case 5:	$item = ucfirst(normalWeapons(0,$size,$game));						break;
	}
	return $item;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function otherThanCoins($size,$cut,$game,$amount,$level)
{
	if ($size == 1)
	{
		$div=3; $coinz=10; $x=12; $tall=mt_rand(3,8); $gemsz=", small"; $bagsz="small ";
	}
	else if ($size == 2)
	{
		$div=2; $coinz=50; $x=15; $tall=mt_rand(6,14);
	}
	else
	{
		$div=1; $coinz=100; $x=23; $tall=mt_rand(12,24); $gemsz=", large"; $bagsz="large ";
	}
	if (($level + 0) < 1){$level = 1;}
	$coins = mt_rand(1,90);
		if ($coins < 36){$copper = (1500 * $level);}
		else if ($coins < 66){$copper = (7500 * $level);}
		else if ($coins < 81){$copper = (25000 * $level);}
		else {$copper = (50000 * $level);}
			$gold = ceil( ( ( ( $copper*( 0.01*$cut ) ) / 100 ) / $div ) / $amount );
				if ($gold < 5){$gold = mt_rand(3,7);}

	$gem = explode(" (", gemCreator(0));		// IN CASE I NEED GEM
	$jewel = explode(" (", jewelCreator(0));	// IN CASE I NEED JEWEL

	if (mt_rand(1,2) == 1)
	{
		$figure = "statue";
		$figs = 2;
		$alck = "alchemist";
		$mage = "mage";
	}
	else
	{
		$figure = "carving";
		$figs = 1;
		$alck = "herbalist";
		$mage = "wizard";
	}
	switch (mt_rand(0,18))
	{
		case 0:	$pretty = "a rare";	break;
		case 1:	$pretty = "a nice";	break;
		case 2:	$pretty = "a pretty";	break;
		case 3:	$pretty = "a superb";	break;
		case 4:	$pretty = "a delightful";	break;
		case 5:	$pretty = "an elegant";	break;
		case 6:	$pretty = "an exquisite";	break;
		case 7:	$pretty = "a fine";	break;
		case 8:	$pretty = "a gorgeous";	break;
		case 9:	$pretty = "a lovely";	break;
		case 10:$pretty = "a magnificent";	break;
		case 11:$pretty = "a marvelous";	break;
		case 12:$pretty = "a splendid";	break;
		case 13:$pretty = "a wonderful";	break;
		case 14:$pretty = "an extraordinary";	break;
		case 15:$pretty = "a strange";	break;
		case 16:$pretty = "an odd";	break;
		case 17:$pretty = "a unique";	break;
		case 18:$pretty = "an unusual";	break;
	}

	switch (mt_rand(0,2))
	{
		case 0:	$library = $pretty . $gemsz . " " . tomeType() . " titled `" . tomeMaker($game) . "` and is bound in " . leatherColor() . " " . materialType(leather) . " skin with " . designColor() . " colored symbols of a " . designType(0) . " on the front and a " . designType(0) . " on the back, and is worth " . number_format($gold) . "gp";	break;
		case 1:	$library = $pretty . $gemsz . " " . tomeType() . " titled `" . tomeMaker($game) . "` and is bound in " . leatherColor() . " " . materialType(leather) . " skin with a " . designColor() . " colored symbol of a " . designType(0) . " on the front, and is worth " . number_format($gold) . "gp";												break;
		case 2:	$library = $pretty . $gemsz . " " . tomeType() . " titled `" . tomeMaker($game) . "` and is bound in " . leatherColor() . " " . materialType(leather) . " skin, and is worth " . number_format($gold) . "gp";												break;
	}

	$cute = explode(" ", $pretty);

	switch (mt_rand(0,$x))
	{
		case 0:  $item = scrollCase() . " worth " . number_format($gold) . "gp";	break;
		case 1:  $item = $pretty . " " . bottlePicker() . " of perfume worth " . number_format($gold) . "gp";	break;
		case 2:  
			switch (mt_rand(0,10))
			{
				case 0:	$item = "door handle made of " . materialType(iron) . " with a " . $gem[0] . " pressed in it worth " . number_format($gold) . "gp"; break;
				case 1:	$item = "eyepatch made of " . materialType(leather) . " leather with a " . $gem[0] . " set in it worth " . number_format($gold) . "gp";	break;
				case 2:	$item = "sword hilt made of " . materialType(iron) . " with " . mt_rand(2,5) . " gems (" . $gem[0] . ") decorating the handle worth " . number_format($gold) . "gp";	break;
				case 3:	$item = "war hammer head made of " . materialType(iron) . " with " . mt_rand(2,5) . " gems (" . $gem[0] . ") decorating the head worth " . number_format($gold) . "gp";	break;
				case 4:	$item = "axe blade made of " . materialType(iron) . " with " . mt_rand(2,5) . " gems (" . $gem[0] . ") decorating the blade worth " . number_format($gold) . "gp";	break;
				case 5:	$item = "dagger hilt made of " . materialType(iron) . " with " . mt_rand(2,5) . " gems (" . $gem[0] . ") decorating the handle worth " . number_format($gold) . "gp";	break;
				case 6:	$item = "mace head made of " . materialType(iron) . " with " . mt_rand(2,5) . " gems (" . $gem[0] . ") decorating the head worth " . number_format($gold) . "gp";	break;
				case 7:	$item = "morning star ball made of " . materialType(iron) . " with " . mt_rand(2,5) . " gems (" . $gem[0] . ") decorating the ball worth " . number_format($gold) . "gp";	break;
				case 8:	$item = "dinner plate made of " . materialType(iron) . " with " . mt_rand(4,12) . " gems (" . $gem[0] . ") decorating the edges worth " . number_format($gold) . "gp"; break;
				case 9:	$item = "false hand made of " . materialType(iron) . " decorated with " . mt_rand(2,10) . " gems (" . $gem[0] . ") worth " . number_format($gold) . "gp"; break;
				case 10:$item = "peg leg made of " . materialType(wood) . " decorated with " . mt_rand(2,10) . " gems (" . $gem[0] . ") worth " . number_format($gold) . "gp"; break;
			}
			break;
		case 3: $item = "scroll with information on a spell called *" . researchSpell() . "* worth " . number_format($gold) . "gp to a " . $mage;	break;
		case 4:
			switch (mt_rand(0,3))
			{
				case 0:	$cup = "tankard"; break;
				case 1:	$cup = "flagon"; break;
				case 2:	$cup = "stein"; break;
				case 3:	$cup = "mug"; break;
			}
			switch (mt_rand(0,2))
			{
				case 0:	$item = $cup . " made of " . materialType(iron) . " with " . mt_rand(2,10) . " gems (" . $gem[0] . ") set around the top and bottom and an etching of a " . designType(0) . " on the side worth " . number_format($gold) . "gp"; break;
				case 1:	$item = $cup . " made of " . materialType(iron) . " with " . mt_rand(2,10) . " gems (" . $gem[0] . ") set around the bottom and an etching of a " . designType(0) . " on the side worth " . number_format($gold) . "gp"; break;
				case 2:	$item = $cup . " made of " . materialType(iron) . " with " . mt_rand(2,10) . " gems (" . $gem[0] . ") set around the top and an etching of a " . designType(0) . " on the side worth " . number_format($gold) . "gp"; break;
			}
			break;
		case 5:  $item = "set of silverware (" . mt_rand(2,20) . " forks, " . mt_rand(2,20) . " spoons, " . mt_rand(2,20) . " knives) worth " . number_format($gold) . "gp";	break;
		case 6:  $item = $pretty . " " . bottlePicker() . " of wine worth " . number_format($gold) . "gp";	break;
		case 7:	 $item = $tall . " inch tall " . carvingMaterial($figs) . " " . $figure . " of a " . designType(0) . " worth " . number_format($gold) . "gp";	break;
		case 8:  $item = $pretty . " " . displayWeapon($size) . " worth " . number_format($gold) . "gp";	break;
		case 9:  $item = $pretty . " " . niceClothType($size) . " worth " . number_format($gold) . "gp";	break;
		case 10: $item = $pretty . " " . bottlePicker() . " of " . contentsChooser(1,$game,1) . " worth " . number_format($gold) . "gp to an " . $alck;	break;
		case 11: $item = $library; break;
		case 12: $item = "a " . $bagsz . bagCreator() . " of " . $cute[1] . " " . rareCoins($coinz,0) . " worth a total of " . number_format($gold) . "gp";	break;
		case 13: $item = $pretty . " musical " . bardType() . " worth " . number_format($gold) . "gp";	break;
		case 14: $item = "set of " . mt_rand(2,10) . " " . materialType(iron) . " bars worth " . number_format($gold) . "gp";	break;
		case 15: $item = "set of " . mt_rand(2,10) . " baked and glazed clay tiles with a " . designType(0) . " painted on them worth " . number_format($gold) . "gp";	break;
		case 16: $item = $pretty . " " . furMaker($gold) . " worth " . number_format($gold) . "gp";	break;
		case 17: $item = $pretty . " bundle of " . materialType(leather) . " leather worth " . number_format($gold) . "gp";	break;
		case 18: $item = $pretty . " " . potteryRare() . " worth " . number_format($gold) . "gp";	break;
		case 19: $item = $pretty . " " . paintingMaker(0,2) . " worth " . number_format($gold) . "gp";	break;
		case 20: $item = $pretty . " " . carpetMaker(2) . " worth " . number_format($gold) . "gp";	break;
		case 21:
			switch (mt_rand(0,2))
			{
				case 0:	$item = "cane " . materialType(mwood) . " with a " . $gem[0] . " on the top worth " . number_format($gold) . "gp";	break;
				case 1:	$item = "staff " . materialType(mwood) . " with a " . $gem[0] . " on the top worth " . number_format($gold) . "gp";	break;
				case 2:	$item = "bow stave " . materialType(mwood) . " with a " . materialType(leather) . " leather grip worth " . number_format($gold) . "gp";	break;
			}
			break;
		case 22: 
			switch (mt_rand(0,2))
			{
				case 0:	$item = "candelabra made of " . materialType(iron) . " decorated with " . mt_rand(5,15) . " gems (" . $gem[0] . ") worth " . number_format($gold) . "gp";	break;
				case 1:	$item = "lamp made of " . materialType(iron) . " decorated with " . mt_rand(5,15) . " gems (" . $gem[0] . ") worth " . number_format($gold) . "gp";	break;
				case 2:	$item = "set of " . mt_rand(2,5) . " candlesticks made of " . materialType(iron) . ", each decorated with " . mt_rand(2,6) . " gems (" . $gem[0] . ") worth " . number_format($gold) . "gp each";	break;
			}
			break;
		case 23:
			switch (mt_rand(0,2))
			{
				case 0:	$shirt = "robes"; break;
				case 1:	$shirt = "cloaks"; break;
				case 2:	$shirt = "shirts"; break;
			}
			$item = $pretty . " bundle of " . $shirt . " " . materialType(mcloth) . " worth " . number_format($gold) . "gp";
			break;
	}
	return $item;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function makeNormalItem($amount,$size,$condition,$game,$cut,$type)
{
	$amount = mt_rand(1,$amount);

	while ($amount > 0) :

	if (mt_rand(1,4) > 1){$casting = steelMaker(); $mquality = 0;} else {$casting = goodmetalChooser(); $mquality = 1;}
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

	switch (mt_rand(0,160))
	{
		case 0:	 $item = mt_rand(2,8) . " sling stones";									break;
		case 1:	 $item = mt_rand(2,10) . " feet of twine";									break;
		case 2:	 $item = "quill";												break;
		case 3:	 $item = $casting . " flask of alcohol" . itemValues($game,$mquality);								break;
		case 4:	 $item = $casting . " arrowhead" . itemValues($game,$mquality);									break;
		case 5:	 $item = $casting . " hair brush" . itemValues($game,$mquality);									break;
		case 6:	 $item = "tinderbox";												break;
		case 7:	 $item = mt_rand(2,5) . " acorns";										break;
		case 8:	 $item = "cork";												break;
		case 9:	 $item = $casting . " goblet" . itemValues($game,$mquality);									break;
		case 10:	$item = "wooden figurine";											break;
		case 11:	$item = candleColor(0) . " cloth pouch of " . mt_rand(3,22) . " " . coinMaker($game);				break;
		case 12:	$item = "page torn from a spell book";										break;
		case 13:	$item = "vial of insect repellent";										break;
		case 14:	$item = "small wooden flute";											break;
		case 15:	$item = mt_rand(2,20) . " dead bugs";										break;
		case 16:	$item = "pair of bone dice";											break;
		case 17:	$item = "set of wooden teeth";											break;
		case 18:	$item = candleColor(0) . " feather";										break;
		case 19:	$item = "deck of playing cards";										break;
		case 20:	$item = mt_rand(2,20) . " foreign " . coinMaker($game) . " coins of unknown origin";				break;
		case 21:	$item = "glass magnifying lens";										break;
		case 22:	$item = "small glass bottle (" . contentsChooser(0,$game,1) . ")";							break;
		case 23:	$item = "mousetrap";												break;
		case 24:
				if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$item = "iron key (" . mt_rand(1,5) . " in 6 chance to unlock one " . $ulok . " in this place)";}
				else {$item = "iron key (" . mt_rand(1,5) . "0% chance to unlock one " . $ulok . " in this place)";}
			break;
		case 25:	$item = mt_rand(2,5) . " cheap cigars"; if (mt_rand(1,2) == 1){$item = mt_rand(2,5) . " fine cigars";}		break;
		case 26:	$item = mt_rand(2,12) . " feet of copper wire";								break;
		case 27:	$item = "small portrait of a woman";										break;
		case 28:	$item = "small portrait of a man";										break;
		case 29:	$item = "dart";												break;
		case 30:	$item = "corncob pipe";											break;
		case 31:	$item = candleColor(0) . " scarf";										break;
		case 32:	$item = "box of matches (" . mt_rand(10,100) . " each)";							break;
		case 33:	$item = $casting . " " . figureMaker() . " figurine" . itemValues($game,$mquality);						break;
		case 34:	$item = bottlePicker() . " of water";										break;
		case 35:	$item = mt_rand(12,54) . " feet of " . candleColor(0) . " yarn";						break;
		case 36:	$item = "glass inkpot";											break;
		case 37:	$item = gemCreator($cut);						break;
		case 38:	$item = mt_rand(10,50) . " foot ball of " . candleColor(0) . " string";					break;
		case 39:	$item = "sheet of parchment";											break;
		case 40:	$item = "compass";												break;
		case 41:	$item = "wooden case containing paints";									break;
		case 42:	$item = "small " . steelMaker() . " mirror";									break;
		case 43:	$item = headoffMaker(1);											break;
		case 44:	$item = "blackjack";												break;
		case 45:	$item = "soiled " . candleColor(0) . " rag";									break;
		case 46:	$item = "vial of perfume";											break;
		case 47:	$item = mapMaker(999,$game);												break;
		case 48:	$item = "jar of glue";												break;
		case 49:	$item = "lump of coal";											break;
		case 50:	$item = "thimble";												break;
		case 51:	$item = "wooden snuff box with " . mt_rand(2,5) . " pinches remaining";					break;
		case 52:	$item = "brass knuckles";											break;
		case 53:	$item = $casting . " spoon " . itemValues($game,$mquality);									break;
		case 54:	$item = mt_rand(2,8) . " arrows";	if (mt_rand(1,2) == 1){$item = mt_rand(2,8) . " crossbow bolts";}	break;
		case 55:	$item = mt_rand(2,8) . " pieces of fake " . coinMaker($game);							break;
		case 56:	$item = "a map of this dungeon level";										break;
		case 57:	$item = "small leather pouch of " . candleColor(0) . " powder";						break;
		case 58:	$item = mt_rand(2,12) . " " . steelMaker() . " nails";								break;
		case 59:	$item = "vial of mild poison";											break;
		case 60:	$item = "small " . candleColor(0) . " leather book";										break;
		case 61:	$item = "rubber ball";												break;
		case 62:	$item = mt_rand(12,36) . " inch leather strap";								break;
		case 63:	$item = "rawhide necklace";											break;
		case 64:
				if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$item = "ornate " . $casting . " key (" . mt_rand(1,5) . " in 6 chance to unlock one " . $ulok . " in this place)";}
				else {$item = "ornate " . $casting . " key (" . mt_rand(1,5) . "0% chance to unlock one " . $ulok . " in this place)";}
			break;
		case 65:	$item = "small parchment describing how to bypass a nearby trap";						break;
		case 66:	$item = mt_rand(1,9) . " inch straight pin";									break;
		case 67:	$item = "small " . candleColor(0) . " leather book containing prayers";								break;
		case 68:	$item = "small slip of parchment";										break;
		case 69:	$item = "small " . $casting . " knife" . itemValues($game,$mquality);								break;
		case 70:	$item = "wooden brooch";											break;
		case 71:	$item = candleColor(0) . " candle";										break;
		case 72:	$item = "small leather pouch of " . candleColor(0) . " sand";							break;
		case 73:	$item = "glass eye";												break;
		case 74:	$item = "wooden wrist sundial";										break;
		case 75:	$item = "chess piece";												break;
		case 76:	$item = "poison antidote";											break;
		case 77:	$item = candleColor(0) . " silk handkerchief";									break;
		case 78:	$item = candleColor(0) . " cloth napkin";									break;
		case 79:	$item = "stone arrowhead";											break;
		case 80:	$item = "small " . $casting . " holy symbol" . itemValues($game,$mquality);							break;
		case 81:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$item = scrollContents($game);}
				else {$item = "scroll with " . powerUp($level) . " level " . spellSchool($game) . " spell";		if (($game == "OSRIC") || ($game == "AD&D") || ($game == "BD&D") || ($game == "BFRGP") || ($game == "Swords & Six-Siders") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry")){$item = "scroll with a " . gameSpellChooser($game,$level,'');}}
			break;
		case 82:	$item = "a parchment suicide note";										break;
		case 83:	$item = mt_rand(2,16) . " " . steelMaker() . " tacks";								break;
		case 84:	$item = "pair of " . candleColor(0) . " cloth gloves";								break;
		case 85:	$item = "wooden stake";											break;
		case 86:	$item = mt_rand(2,4) . " heads of garlic";									break;
		case 87:	$item = bottlePicker() . " of spice";										break;
		case 88:	$item = "deck of tarot cards";											break;
		case 89:	$item = $casting . " spoon" . itemValues($game,$mquality);										break;
		case 90:	$item = candleColor(0) . " flower";										break;
		case 91:	$item = mt_rand(2,8) . " " . slimeColor() . " glass spheres (1 inch diameter)";				break;
		case 92:	$item = "cloth bag of crushed herbs";										break;
		case 93:	$item = "bottle of cheap wine";										break;
		case 94:	$item = "small lead figurine";											break;
		case 95:	$item = "rabbit`s foot"; if (mt_rand(1,100) > 90){$item = "lucky rabbit`s foot that gives you " . $luck;}	break;
		case 96:	$item = candleColor(0) . " handkerchief";									break;
		case 97:	$item = jewelCreator($cut);						break;
		case 98:	$item = "book {<u>" . tomeMaker($game) . "" . tomePower(10,0,mt_rand(1,20),$cut,$game) . "</u>}";						break;
		case 99:	$item = steelMaker() . " lockpick";										break;
		case 100:	$item = mt_rand(2,4) . " wolfsbane flowers";									break;
		case 101:	$item = steelMaker() . " tweezers";										break;
		case 102:	$item = $casting . " medallion" . itemValues($game,$mquality);									break;
		case 103:	$item = $casting . " ring" . itemValues($game,$mquality);										break;
		case 104:	$item = "corkscrew";												break;
		case 105:	$item = "wooden whistle";											break;
		case 106:	$item = "mortar and pestle";											break;
		case 107:	$item = "pint of lamp oil";											break;
		case 108:	$item = steelMaker() . " padlock with key";									break;
		case 109:	$item = "pint of " . plainColor() . " paint";									break;
		case 110:	$item = "paint brush";											break;
		case 111:	$item = "small " . steelMaker() . " carving knife";								break;
		case 112:	$item = "pipe tobacco";											break;
		case 113:	$item = mt_rand(2,10) . " bandages";										break;
		case 114:	$item = "eyeglasses";												break;
		case 115:	$item = "torch";												break;
		case 116:	$item = steelMaker() . " pliers";										break;
		case 117:	$item = steelMaker() . " scissors";										break;
		case 118:	$item = "leather scrollcase";											break;
		case 119:	$item = "sewing needle";											break;
		case 120:	$item = steelMaker() . " folding shovel";									break;
		case 121:	$item = "whetstone";												break;
		case 122:	$item = "bar of " . candleColor(0) . " soap";									break;
		case 123:
				if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$item = "blank book bound in " . leatherColor() . " leather with a symbol of a " . designType(0) . " on the cover";}
				else {$item = "blank spell book bound in " . leatherColor() . " leather with a symbol of a " . designType(0) . " on the cover";}
			break;
		case 124:	$item = "spyglass";												break;
		case 125:	$item = "thief tools";											break;
		case 126:	$item = $casting . " earrings" . itemValues($game,$mquality);									break;
		case 127:	$item = "ivory dice";												break;
		case 128:	$item = "loaded ivory dice";											break;
		case 129:	$item = "bottle of " . candleColor(0) . " cloth dye";								break;
		case 130:	$item = "bottle of " . candleColor(0) . " hair dye";								break;
		case 131:	$item = "fish hook";												break;
		case 132:
				if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$item = "a small diary of " . authorName() . " the adventurer...that explored this area long ago...but this book will give one a " . mt_rand(1,5) . " in 6 chance to know the secrets of each room in this place";}
				else {$item = "a small diary of " . authorName() . " the adventurer...that explored this area long ago...but this book will give one a " . (mt_rand(1,6)*5) . "% chance to know the secrets of each room in this place";}
			break;
		case 133:	$item = "flint and steel";											break;
		case 134:	$item = "funnel";												break;
		case 135:	$item = "small toy doll";											break;
		case 136:	$item = "small leather pouch of silver powder" . itemValues($game,$mquality);							break;
		case 137:	$item = "hacksaw";												break;
		case 138:	$item = mt_rand(2,8) . " gold nuggets worth " . mt_rand(1,5) . " gold each";					break;
		case 139:	$item = "hammer and chisel";											break;
		case 140:	$item = "wooden holy symbol";											break;
		case 141:	$item = "bottle of holy water";										break;
		case 142:	$item = "hourglass";												break;
		case 143:	$item = "incense stick";											break;
		case 144:	$item = "three-leaf clover"; if (mt_rand(1,100) > 90){$item = "four-leaf clover that gives you " . $luck;}	break;
		case 145:	$item = mt_rand(2,12) . " iron spikes";									break;
		case 146:	$item = steelMaker() . " horseshoe"; if (mt_rand(1,100) > 90){$item = goodmetalChooser() . " horseshoe " . $luck;}	break;
		case 147:	$item = steelMaker() . " manacles";										break;
		case 148:	$item = steelMaker() . " metal file";										break;
		case 149:	$item = "prayer beads";											break;
		case 150:	$item = "beeswax";												break;
		case 151:	$item = steelMaker() . " cow bell";										break;
		case 152:	$item = "sea shell";												break;
		case 153:	$item = "unusual coin of unknown metal with a symbol of a " . designType(0) . " on it";			break;
		case 154:	$item = "chalk";												break;
		case 155:	$item = mt_rand(2,30) . " square yards of " . candleColor(0) . " cloth";					break;
		case 156:	$item = steelMaker() . " crowbar";										break;
		case 157:	$item = "crucible";												break;
		case 158:	$item = normalWeapons($condition,$size,$game);									break;
		case 159:	$item = "small parchment describing where some nearby treasure is hidden";					break;
		case 160:	$item = steelMaker() . " tongs";										break;
	}

		$amount = $amount - 1;

		$stuff = $item . "&nbsp;--- " . $stuff;

	endwhile;

	if ($type == 1){ $stuff = substr($stuff, 0, -10); }
	else { $stuff = "[<i>CONTAINS:&nbsp;" . substr($stuff, 0, -10) . "</i>]"; }

	return $stuff;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function paintingMaker($condition,$type)
{
	if ($type == 1)
	{
		if (($condition == 1) && (mt_rand(1,100) > 50)){$pfx = "ruined painting of "; if (mt_rand(1,100) > 50){$pfx = "torn painting of ";}} else {$pfx = "painting of ";}
	}
	else if ($type == 2)
	{
		$pfx = "painting of "; if (mt_rand(1,3) == 1){$pfx = "tapestry of ";}
	}
	else
	{
		if (($condition == 1) && (mt_rand(1,100) > 50)){$pfx = "ruined tapestry of "; if (mt_rand(1,100) > 50){$pfx = "torn tapestry of ";}} else {$pfx = "tapestry of ";}
	}

	switch (mt_rand(0,11))
	{
		case 0:	$item = "a scenic forest view";	break;
		case 1:	$item = "a scenic ocean view";	break;
		case 2:	$item = "a scenic desert view";	break;
		case 3:	$item = "a scenic jungle view";	break;
		case 4:	$item = "a keep";		break;
		case 5:	$item = "a house";		break;
		case 6:	$item = "some ruins";		break;
		case 7:	$item = "a castle";		break;
		case 8:	$item = "a city";		break;
		case 9:	$item = "a mountain";		break;
		case 10:$item = "a " . designType(1);	break;
		case 11:$item = genericName() . " the " . ucfirst(jobName());	break;
	}
	return $pfx . "" . $item;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function scrollContents($game)
{
	switch (mt_rand(0,2))
	{
		case 0:	$paper = "parchment";	break;
		case 1:	$paper = "scroll";		break;
		case 2:	$paper = "note";		break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$dirc = "north";	break;
		case 1:	$dirc = "south";	break;
		case 2:	$dirc = "east";		break;
		case 3:	$dirc = "west";		break;
	}
	switch (mt_rand(0,7))
	{
		case 0:	$locc = "island";		break;
		case 1:	$locc = "dungeon";		break;
		case 2:	$locc = "crypt";		break;
		case 3:	$locc = "castle";		break;
		case 4:	$locc = "temple";		break;
		case 5:	$locc = "ruins";		break;
		case 6:	$locc = "graveyard";	break;
		case 7:	$locc = "cave";			break;
	}
	switch (mt_rand(0,8))
	{
		case 0: $who = mageName();			break;
		case 1:	$who = elfName();			break;
		case 2:	$who = FemaleName();		break;
		case 3:	$who = MaleName();			break;
		case 4: $who = humanFemaleName();	break;
		case 5: $who = humanMaleName();		break;
		case 6: $who = genericName();		break;
		case 7: $who = gnomeName();			break;
		case 8: $who = dwarfName();			break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$mine = "gold";		break;
		case 1:	$mine = "silver";	break;
		case 2:	$mine = "gem";		break;
		case 3:	$mine = "iron";		break;
	}
	switch (mt_rand(0,8))
	{
		case 0:	$code = "a nearby thieves guild";			break;
		case 1:	$code = "a nearby assassins guild";			break;
		case 2:	$code = "a local lord's spy network";		break;
		case 3:	$code = "an evil lord's spy network";		break;
		case 4:	$code = "a nearby bandit group";			break;
		case 5:	$code = "a nearby smuggling operation";		break;
		case 6:	$code = "a well known group of pirates";	break;
		case 7:	$code = "a little known rebel group";		break;
		case 8:	$code = "an unusual cult";					break;
	}

	switch (mt_rand(0,15))
	{
		case 0:	$notes = "a map to some unknown " . $locc . " to the " . $dirc . " of here";	break;
		case 1:	$notes = "a recipe of some type of meal";	break;
		case 2:	$notes = "lyrics to a song";	break;
		case 3:	$notes = "a poem written by someone named " . $who;	break;
		case 4:	$notes = "musical notes";	break;
		case 5:	$notes = "a prayer for some unknown religion";	break;
		case 6:	$notes = "a list of food items";	break;
		case 7:	$notes = "a map of a nearby area showing where " . mt_rand(2,4) . " " . $mine . " mines may be located";	break;
		case 8:	$notes = "a map of a nearby royal home showing secret doors and treasure vaults";	break;
		case 9:	$notes = "a ransom demand from a group of bandits holding a captive";	break;
		case 10:$notes = "a map of a nearby city's sewer system";	break;
		case 11:$notes = "a plain letter written to " . $who;	break;
		case 12:$notes = "a translation of coded letters from " . $code;	break;
		case 13:$notes = "the last will and testament of someone named " . $who;	break;
		case 14:$notes = "a list of alchemy reagents and some are checked off";	break;
		case 15:$notes = "a suicide note";	break;
	}

	$scroll = "a " . $paper . " containing " . $notes;

	return $scroll;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function bottlePicker()
{
	switch (mt_rand(0,11))
	{
		case 0:	$bottle = "crystal bottle";				break;
		case 1:	$bottle = "ceramic jug";				break;
		case 2:	$bottle = "glass bottle";				break;
		case 3:	$bottle = "glass jar";					break;
		case 4:	$bottle = "test tube";					break;
		case 5:	$bottle = "clay jug";					break;
		case 6:	$bottle = "waterskin";					break;
		case 7:	$bottle = "iron flask";					break;
		case 8:	$bottle = "spherical, glass bottle";			break;
		case 9:	$bottle = "wine bottle";				break;
		case 10:$bottle = plainColor() . "-colored, glass bottle";	break;
		case 11:$bottle = plainColor() . "-colored, decanter";		break;
	}
	return $bottle;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function fantasyGroundItem($game)
{
	if (mt_rand(1,4) > 1){$casting = steelMaker(); $mquality = 0;} else {$casting = goodmetalChooser(); $mquality = 1;}

	switch (mt_rand(0,205))
	{
		case 0: $item = mt_rand(2,8) . " " . conditionType(item) . "arrows";  if (mt_rand(1,2) == 1){$item = mt_rand(2,8) . " " . conditionType(item) . "crossbow bolts";} break;
		case 1: $item = "scattered ashes"; break;
		case 2: $item = "humanoid bones"; if (mt_rand(1,2) == 1){$item = "animal bones";} break;
		case 3: $item = conditionType(jar) . "" . bottlePicker(); break;
		case 4: $item = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron chain"; break;
		case 5: $item = conditionType(wood) . "wooden club"; break;
		case 6: $item = conditionType(iron) . "dagger hilt"; break;
		case 7: $item = "a pile of dung"; break;
		case 8: $item = "food scraps"; break;
		case 9: $item = "some piles of guano"; break;
		case 10: $item = "bits of fur and hair"; break;
		case 11: $item = conditionType(iron) . "" . steelMaker() . " hammer head"; break;
		case 12: $item = conditionType(iron) . "" . steelMaker() . " dented helm"; break;
		case 13: $item = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron bar"; break;
		case 14: $item = "blunt " . conditionType(iron) . "spear head"; break;
		case 15: $item = "leather boot"; break;
		case 16: $item = "scattered sticks"; break;
		case 17: $item = conditionType(wood) . "pick handle"; break;
		case 18: $item = mt_rand(5,10) . " foot " . conditionType(wood) . "wood pole"; break;
		case 19: $item = "pottery shards scattered around"; break;
		case 20: $item = conditionType(cloth) . "rags"; break;
		case 21: $item = mt_rand(10,50) . " foot " . conditionType(cloth) . " rope"; break;
		case 22: $item = conditionType(item) . "" . bagCreator(); break;
		case 23: $item = mt_rand(2,8) . " " . conditionType(iron) . "" . steelMaker() . " spikes"; break;
		case 24: $item = mt_rand(2,8) . " sticks scattered around"; break;
		case 25: $item = "pile of straw"; break;
		case 26: $item = "straw scattered around"; break;
		case 27: $item = conditionType(iron) . "sword blade"; break;
		case 28: $item = "scattered bits of bones and teeth"; break;
		case 29: $item = conditionType(item) . "torch"; break;
		case 30: $item = "scratches and claw marks on the " . dungeonWall(); break;
		case 31: $item = "small puddle of " . conditionType(water) . "water"; break;
		case 32: $item = "large puddle of " . conditionType(water) . "water"; break;
		case 33: $item = mt_rand(2,10) . " pieces of " . conditionType(wood) . "wood"; break;
		case 34: $item = conditionType(iron) . "" . steelMaker() . " bucket"; break;
		case 35: $item = conditionType(iron) . "" . steelMaker() . " pail"; break;
		case 36: $item = conditionType(iron) . "" . steelMaker() . " dented shield"; break;
		case 37: $item = "shredded and torn clothing"; break;
		case 38: $item = mt_rand(2,10) . " bandages"; if (mt_rand(1,2) == 1){$item = mt_rand(2,10) . " bloody bandages";} break;
		case 39: $item = conditionType(iron) . "" . steelMaker() . " dented plate armor"; break;
		case 40: $item = headoffMaker(0); break;
		case 41: $item = conditionType(wood) . "basket"; break;
		case 42: $item = conditionType(wood) . "whip"; break;
		case 43: $item = conditionType(wood) . "" . woodenType() . " cane"; break;
		case 44: $item = conditionType(iron) . "" . steelMaker() . " dented helm with a " . headoffMaker(0) . " still in it"; break;
		case 45: $item = conditionType(wood) . "wooden dish"; break;
		case 46: $item = conditionType(wood) . "wooden flagon"; break;
		case 47: $item = conditionType(wood) . "basket with a " . headoffMaker(0) . " inside it"; break;
		case 48: $item = conditionType(iron) . "" . steelMaker() . " fork"; break;
		case 49: $item = "jar (" . contentsChooser(0,$game,1) . ")"; if (mt_rand(1,2) == 1){$item = "bottle (" . contentsChooser(0,$game,1) . ")";} break;
		case 50: $item = conditionType(iron) . "" . steelMaker() . " kettle"; break;
		case 51: $item = conditionType(iron) . "" . steelMaker() . " knife"; break;
		case 52: $item = conditionType(iron) . "" . steelMaker() . " ladle"; break;
		case 53: $item = conditionType(iron) . "" . steelMaker() . " mug"; break;
		case 54: $item = "pile of dirt"; break;
		case 55: $item = conditionType(iron) . "" . steelMaker() . " pan"; break;
		case 56: $item = mt_rand(2,20) . " pieces of " . conditionType(paper) . " parchment"; if (mt_rand(1,2) == 1){$item = mt_rand(2,20) . " " . conditionType(paper) . " scrolls";} break;
		case 57: $item = conditionType(wood) . "wooden pitcher"; break;
		case 58: $item = musicChooser(1); break;
		case 59: $item = conditionType(item) . "smoking pipe"; break;
		case 60: $item = conditionType(iron) . "" . steelMaker() . " pot"; break;
		case 61: $item = "small bottle of ink"; break;
		case 62: $item = conditionType(item) . "quill"; break;
		case 63: $item = conditionType(iron) . "" . steelMaker() . " rusty razor"; break;
		case 64: $item = "some " . footprintMaker() . " in various spots"; break;
		case 65: $item = conditionType(iron) . "" . steelMaker() . " spoon"; break;
		case 66: $item = conditionType(iron) . "" . steelMaker() . " tankard"; break;
		case 67: $item = conditionType(wood) . "tinderbox"; break;
		case 68: $item = mt_rand(2,10) . "0 feet of twine"; break;
		case 69: $item = "whetstone"; break;
		case 70: $item = ashMaker($game); break;
		case 71: $item = conditionType(cloth) . "" . candleColor(0) . " blanket"; break;
		case 72: $item = kegFiller(cask,$game,$extra,$cut); if (mt_rand(1,2) == 1){$item = kegFiller(keg,$game,$extra,$cut);} break;
		case 73: $item = "a huge pile of various bones"; break;
		case 74: $item = "a large pile of rocks"; if (mt_rand(1,2) == 1){$item = "a large pile of stone blocks";} break;
		case 75: $item = conditionType(iron) . "" . steelMaker() . " small bell"; break;
		case 76: $item = cageMaker(); break;
		case 77: $item = "fire pit"; if (mt_rand(1,2) == 1){$item = "fire pit with ashes";} if (mt_rand(1,4) == 1){$item = "fire pit with wood";} break;
		case 78: $item = mt_rand(2,6) . " " . eggMaker(); break;
		case 79: $item = conditionType(iron) . "" . steelMaker() . " hand saw"; break;
		case 80: $item = normalWeapons(1,3,$game); break;
		case 81: $item = normalArmor(1,$game); break;
		case 82: $item = corpseMaker(). " " . makeNormalItem(5,3,1,$game,$cut,0); break;
		case 83: $item = mt_rand(2,8) . " sling stones"; break;
		case 84: $item = mt_rand(2,10) . " feet of twine"; break;
		case 85: $item = $casting . " flask of alcohol" . itemValues($game,$mquality); break;
		case 86: $item = $casting . " arrowhead" . itemValues($game,$mquality); break;
		case 87: $item = $casting . " hair brush" . itemValues($game,$mquality); break;
		case 88: $item = "cork"; break;
		case 89: $item = $casting . " goblet" . itemValues($game,$mquality); break;
		case 90: $item = "wooden figurine"; break;
		case 91: $item = candleColor(0) . " cloth pouch of " . mt_rand(3,22) . " " . coinMaker($game); break;
		case 92: $item = "page torn from a spell book"; break;
		case 93: $item = "vial of insect repellent"; break;
		case 94: $item = "small wooden flute"; break;
		case 95: $item = mt_rand(2,20) . " dead bugs"; break;
		case 96: $item = "pair of bone dice"; break;
		case 97: $item = "set of wooden teeth"; break;
		case 98: $item = candleColor(0) . " feather"; break;
		case 99: $item = "deck of playing cards"; break;
		case 100: $item = mt_rand(2,20) . " foreign " . coinMaker($game) . " coins of unknown origin"; break;
		case 101: $item = "glass magnifying lens"; break;
		case 102: $item = "small glass bottle (" . contentsChooser(0,$game,1) . ")"; break;
		case 103: $item = "small portrait of a woman"; break;
		case 104: $item = "small portrait of a man"; break;
		case 105: $item = "dart"; break;
		case 106: $item = "corncob pipe"; break;
		case 107: $item = candleColor(0) . " scarf"; break;
		case 108: $item = "box of matches (" . mt_rand(10,100) . " each)"; break;
		case 109: $item = $casting . " " . figureMaker() . " figurine" . itemValues($game,$mquality); break;
		case 110: $item = bottlePicker() . " of water"; break;
		case 111: $item = gemCreator($cut); break;
		case 112: $item = mt_rand(10,50) . " foot ball of " . candleColor(0) . " string"; break;
		case 113: $item = "sheet of parchment"; break;
		case 114: $item = "compass"; break;
		case 115: $item = "wooden case containing paints"; break;
		case 116: $item = "small " . steelMaker() . " mirror"; break;
		case 117: $item = headoffMaker(1); break;
		case 118: $item = "blackjack"; break;
		case 119: $item = "soiled " . candleColor(0) . " rag"; break;
		case 120: $item = "vial of perfume"; break;
		case 121: $item = steelMaker() . " tongs"; break;
		case 122: $item = "jar of glue"; break;
		case 123: $item = "wooden snuff box with " . mt_rand(2,5) . " pinches remaining"; break;
		case 124: $item = "brass knuckles"; break;
		case 125: $item = $casting . " spoon " . itemValues($game,$mquality); break;
		case 126: $item = mt_rand(2,8) . " arrows"; if (mt_rand(1,2) == 1){$item = mt_rand(2,8) . " crossbow bolts";} break;
		case 127: $item = mt_rand(2,8) . " pieces of fake " . coinMaker($game); break;
		case 128: $item = "a map of this area"; break;
		case 129: $item = "small leather pouch of " . candleColor(0) . " powder"; break;
		case 130: $item = mt_rand(2,12) . " " . steelMaker() . " nails"; break;
		case 131: $item = "vial of mild poison"; break;
		case 132: $item = "small " . candleColor(0) . " leather book"; break;
		case 133: $item = mt_rand(12,36) . " inch leather strap"; break;
		case 134: $item = "rawhide necklace"; break;
		case 135: $item = "small leather book containing prayers"; break;
		case 136: $item = "small " . $casting . " knife" . itemValues($game,$mquality); break;
		case 137: $item = "wooden brooch"; break;
		case 138: $item = "small leather pouch of " . candleColor(0) . " sand"; break;
		case 139: $item = "wooden wrist sundial"; break;
		case 140: $item = "poison antidote"; break;
		case 141: $item = candleColor(0) . " silk handkerchief"; break;
		case 142: $item = "stone arrowhead"; break;
		case 143: $item = "small " . $casting . " holy symbol" . itemValues($game,$mquality); break;
		case 144:	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$item = "scroll with smudged writing";}
					else {$item = "scroll with " . powerUp($level) . " level " . spellSchool($game) . " spell"; if (($game == "OSRIC") || ($game == "AD&D") || ($game == "BD&D") || ($game == "BFRGP") || ($game == "Swords & Six-Siders") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry")){$item = "scroll with a " . gameSpellChooser($game,$level,'');}} break;
		case 145: $item = "a parchment suicide note"; break;
		case 146: $item = "pair of " . candleColor(0) . " cloth gloves"; break;
		case 147: $item = "wooden stake"; break;
		case 148: $item = bottlePicker() . " of spice"; break;
		case 149: $item = "deck of tarot cards"; break;
		case 150: $item = $casting . " spoon" . itemValues($game,$mquality); break;
		case 151: $item = "cloth bag of crushed herbs"; break;
		case 152: $item = "bottle of cheap wine"; break;
		case 153: $item = "small lead figurine"; break;
		case 154: $item = "rabbit`s foot";  break;
		case 155: $item = candleColor(0) . " handkerchief"; break;
		case 156: $item = jewelCreator($cut); break;
		case 157: $item = "book {<u>" . tomeMaker($game) . "" . tomePower(10,0,mt_rand(1,20),$cut,$game) . "</u>}"; break;
		case 158: $item = $casting . " medallion" . itemValues($game,$mquality); break;
		case 159: $item = $casting . " ring" . itemValues($game,$mquality); break;
		case 160: $item = "wooden whistle"; break;
		case 161: $item = "mortar and pestle"; break;
		case 162: $item = "pint of lamp oil"; break;
		case 163: $item = steelMaker() . " padlock with key"; break;
		case 164: $item = "pint of " . plainColor() . " paint"; break;
		case 165: $item = "paint brush"; break;
		case 166: $item = "small " . steelMaker() . " carving knife"; break;
		case 167: $item = "pipe tobacco"; break;
		case 168: $item = mt_rand(2,10) . " bandages"; break;
		case 169: $item = "eyeglasses"; break;
		case 170: $item = "torch"; break;
		case 171: $item = steelMaker() . " pliers"; break;
		case 172: $item = steelMaker() . " scissors"; break;
		case 173: $item = "leather scrollcase"; break;
		case 174: $item = steelMaker() . " folding shovel"; break;
		case 175: $item = "bar of " . candleColor(0) . " soap"; break;
		case 176:	if (($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$item = "blank book bound in " . leatherColor() . " leather with a symbol of a " . designType(0) . " on the cover";}
					else {$item = "blank spell book bound in " . leatherColor() . " leather with a symbol of a " . designType(0) . " on the cover";} break;
		case 177: $item = "spyglass"; break;
		case 178: $item = "thief tools"; break;
		case 179: $item = $casting . " earrings" . itemValues($game,$mquality); break;
		case 180: $item = "ivory dice"; break;
		case 181: $item = "loaded ivory dice"; break;
		case 182: $item = "bottle of " . candleColor(0) . " cloth dye"; break;
		case 183: $item = "bottle of " . candleColor(0) . " hair dye"; break;
		case 184:	if (($game == "Swords & Six-Siders") || ($game == "Tunnels & Trolls 5th Edition") || ($game == "Tunnels & Trolls 7th Edition") || ($game == "Tunnels & Trolls Deluxe")){$item = "a small diary of " . authorName() . " the adventurer...that explored this area long ago...but this book will give one a " . mt_rand(1,5) . " in 6 chance to know the location of a nearby landmark";}
					else {$item = "a small diary of " . authorName() . " the adventurer...that explored this area long ago...but this book will give one a " . (mt_rand(1,6)*5) . "% chance to know the location of a nearby landmark";} break;
		case 185: $item = "flint and steel"; break;
		case 186: $item = "small toy doll"; break;
		case 187: $item = "small leather pouch of silver powder" . itemValues($game,$mquality); break;
		case 188: $item = "hacksaw"; break;
		case 189: $item = mt_rand(2,8) . " gold nuggets worth " . mt_rand(1,5) . " gold each"; break;
		case 190: $item = "hammer and chisel"; break;
		case 191: $item = "wooden holy symbol"; break;
		case 192: $item = "bottle of holy water"; break;
		case 193: $item = mt_rand(2,12) . " iron spikes"; break;
		case 194: $item = steelMaker() . " horseshoe";  break;
		case 195: $item = steelMaker() . " manacles"; break;
		case 196: $item = steelMaker() . " metal file"; break;
		case 197: $item = "prayer beads"; break;
		case 198: $item = "beeswax"; break;
		case 199: $item = steelMaker() . " cow bell"; break;
		case 200: $item = "unusual coin of unknown metal with a symbol of a " . designType(0) . " on it"; break;
		case 201: $item = "chalk"; break;
		case 202: $item = steelMaker() . " crowbar"; break;
		case 203: $item = "crucible"; break;
		case 204: $item = "small parchment describing where some nearby treasure is hidden"; break;
		case 205: $item = scrollContents($game); break;
	}
	return $item;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function packBuilder($eat,$money,$class,$game)
{
	$pile = mt_rand(5,15);
	$drink = mt_rand(2,4);
	$food = mt_rand(4,8);
	$key_array = array();

	if ($eat > 0)
	{
		$m_food = "rations (" . mt_rand(4,8) . " ea), ";
		$m_drink = "waterskin (" . mt_rand(2,4) . " ea), ";
	}
	else
	{

		while ($food > 0) : ////////// FOOD ///////////////////////////////

			switch (mt_rand(0,24))
			{
				case 0:	$m_food = $m_food . "head of lettuce, "; break;
				case 1:	$m_food = $m_food . "bag of nuts, "; break;
				case 2:	$m_food = $m_food . "onion, "; break;
				case 3:	$m_food = $m_food . "orange, "; break;
				case 4:	$m_food = $m_food . "peach, "; break;
				case 5:	$m_food = $m_food . "apple, "; break;
				case 6:	$m_food = $m_food . "turnip, "; break;
				case 7:	$m_food = $m_food . "bag of berries, "; break;
				case 8:	$m_food = $m_food . "loaf of bread, "; break;
				case 10:$m_food = $m_food . "head of cabbage, "; break;
				case 11:$m_food = $m_food . "bag of cherries, "; break;
				case 12:$m_food = $m_food . "carrot, "; break;
				case 13:$m_food = $m_food . "dried beef, "; break;
				case 14:$m_food = $m_food . "apricot, "; break;
				case 15:$m_food = $m_food . "dried pork, "; break;
				case 16:$m_food = $m_food . "wheel of cheese, "; break;
				case 17:$m_food = $m_food . "dried pork, "; break;
				case 18:$m_food = $m_food . "wheel of cheese, "; break;
				case 19:$m_food = $m_food . "loaf of bread, "; break;
				case 20:$m_food = $m_food . "dried beef, "; break;
				case 21:$m_food = $m_food . "dried pork, "; break;
				case 22:$m_food = $m_food . "wheel of cheese, "; break;
				case 23:$m_food = $m_food . "loaf of bread, "; break;
				case 24:$m_food = $m_food . "dried beef, "; break;
			}
			$food = $food - 1;

		endwhile;

		while ($drink > 0) : ////////// DRINK ///////////////////////////////

			$m_liq = "water";
			if (mt_rand(1,4) == 1)
			{
				switch (mt_rand(0,7))
				{
					case 0:	$m_liq = "ale"; break;
					case 1:	$m_liq = "beer"; break;
					case 2:	$m_liq = "brandy"; break;
					case 3:	$m_liq = "cider"; break;
					case 4:	$m_liq = "grog"; break;
					case 5:	$m_liq = "mead"; break;
					case 6:	$m_liq = "rum"; break;
					case 7:	$m_liq = "wine"; break;
				}
			}
			switch (mt_rand(0,13))
			{
				case 0:	$m_drink = $m_drink . "waterskin of " . $m_liq . ", "; break;
				case 1:	$m_drink = $m_drink . "waterskin of " . $m_liq . ", "; break;
				case 2:	$m_drink = $m_drink . "waterskin of " . $m_liq . ", "; break;
				case 3:	$m_drink = $m_drink . "iron flask of " . $m_liq . ", "; break;
				case 4:	$m_drink = $m_drink . "iron flask of " . $m_liq . ", "; break;
				case 5:	$m_drink = $m_drink . "copper flask of " . $m_liq . ", "; break;
				case 6:	$m_drink = $m_drink . "pewter flask of " . $m_liq . ", "; break;
				case 7:	$m_drink = $m_drink . "glass bottle of " . $m_liq . ", "; break;
				case 8:	$m_drink = $m_drink . "clay bottle of " . $m_liq . ", "; break;
				case 9:	$m_drink = $m_drink . "glass jar of " . $m_liq . ", "; break;
				case 10:$m_drink = $m_drink . "clay jar of " . $m_liq . ", "; break;
				case 11:$m_drink = $m_drink . "waterskin of " . $m_liq . ", "; break;
				case 12:$m_drink = $m_drink . "waterskin of " . $m_liq . ", "; break;
				case 13:$m_drink = $m_drink . "waterskin of " . $m_liq . ", "; break;
			}
			$drink = $drink - 1;

		endwhile;
	}

	switch (mt_rand(0,1)) ////////// BED ///////////////////////////////
	{
		case 0:	$m_sleep = "bedroll, "; break;
		case 1:	$m_sleep = candleColor(0) . " blanket, "; break;
	}

	switch (mt_rand(0,5)) ////////// BAG ///////////////////////////////
	{
		case 0:	$m_pack = "leather backpack, "; break;
		case 1:	$m_pack = "large leather bag, "; break;
		case 2:	$m_pack = "large " . candleColor(0) . " sack, "; break;
		case 3:	$m_pack = "leather satchel, "; break;
		case 4:	$m_pack = "leather backpack, "; break;
		case 5:	$m_pack = "leather satchel, "; break;
	}

	switch (mt_rand(0,4)) ////////// LIGHT ///////////////////////////////
	{
		case 0:	$bottle = "ceramic jug";				break;
		case 1:	$bottle = "glass bottle";				break;
		case 2:	$bottle = "glass jar";					break;
		case 3:	$bottle = "clay jug";					break;
		case 4:	$bottle = "waterskin";					break;
	}
	switch (mt_rand(0,4))
	{
		case 0: $m_light = "bullseye lantern, " . $bottle . " of lamp oil (" . mt_rand(2,5) . " pints), "; array_push($key_array, 35); break;
		case 1: $m_light = "hooded lantern, " . $bottle . " of lamp oil (" . mt_rand(2,5) . " pints), "; array_push($key_array, 35); break;
		case 2: $m_light = "clay oil lamp, " . $bottle . " of lamp oil (" . mt_rand(2,5) . " pints), "; array_push($key_array, 35); break;
		case 3: $m_light = "torches (" . mt_rand(2,4) . " ea), "; break;
		case 4: $m_light = "brass oil-burning torch, " . $bottle . " of lamp oil (" . mt_rand(2,5) . " pints), "; array_push($key_array, 35); break;
	}

	if (mt_rand(1,10) == 1) //////// MUSICAL INSTRUMENT /////////////////
	{
		switch (mt_rand(0,5))
		{
			case 0:	$m_tune = "small drum, "; break;
			case 1:	$m_tune = "flute, "; break;
			case 2:	$m_tune = "harp, "; break;
			case 3:	$m_tune = "horn, "; break;
			case 4:	$m_tune = "lute, "; break;
			case 5:	$m_tune = "mandolin, "; break;
		}
	}

	switch (mt_rand(0,9)) ////////// CLOTHES /////////////////////////////
	{
		case 0:	$m_boot = "heavy boots, "; break;
		case 1:	$m_boot = "high hard boots, "; break;
		case 2:	$m_boot = "soft high boots, "; break;
		case 3:	$m_boot = "hard low boots, "; break;
		case 4:	$m_boot = "soft low boots, "; break;
		case 5:	$m_boot = "soft boots, "; break;
		case 6:	$m_boot = "fur boots, "; break;
		case 7:	$m_boot = "shoes, "; break;
		case 8:	$m_boot = "sandals, "; break;
		case 9:	$m_boot = "thigh boots, "; break;
	}
	switch (mt_rand(0,1))
	{
		case 0:	$m_shirt = candleColor(0) . " shirt, "; break;
		case 1:	$m_shirt = candleColor(0) . " tunic, "; break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$m_pants = candleColor(0) . " heavy trousers, "; break;
		case 1:	$m_pants = candleColor(0) . " kilt, "; break;
		case 2:	$m_pants = candleColor(0) . " light trousers, "; break;
		case 3:	$m_pants = "leather trousers, "; break;
	}
	if (mt_rand(1,3) == 1)
	{
		$m_belt = "leather belt, ";
	}
	if (mt_rand(1,5) == 1)
	{
		switch (mt_rand(0,9))
		{
			case 0:	$m_hat = candleColor(0) . " cloth cap, "; break;
			case 1:	$m_hat = "leather cap, "; break;
			case 2:	$m_hat = candleColor(0) . " hat, "; break;
			case 3:	$m_hat = "straw hat, "; break;
			case 4:	$m_hat = "tall straw hat, "; break;
			case 5:	$m_hat = candleColor(0) . " feathered hat, "; break;
			case 6:	$m_hat = candleColor(0) . " floppy hat, "; break;
			case 7:	$m_hat = candleColor(0) . " skullcap, "; break;
			case 8:	$m_hat = candleColor(0) . " wide-brim hat, "; break;
			case 9:	$m_hat = candleColor(0) . " bandana, "; break;
		}
	}
	if (mt_rand(1,5) == 1)
	{
		switch (mt_rand(0,3))
		{
			case 0:	$m_hand = "leather gloves, "; break;
			case 1:	$m_hand = "leather gloves, "; break;
			case 2:	$m_hand = "leather gloves, "; break;
			case 3:	$m_hand = candleColor(0) . " cloth gloves, "; break;
		}
	}
	if (mt_rand(1,3) == 1)
	{
		switch (mt_rand(0,2))
		{
			case 0:	$m_back = candleColor(0) . " cape, "; break;
			case 1:	$m_back = "fur cloak, "; break;
			case 2:	$m_back = candleColor(0) . " cloak, "; break;
		}
	}
	if (mt_rand(1,5) == 1)
	{
		switch (mt_rand(0,1))
		{
			case 0:	$m_robe = candleColor(0) . " silk robe, "; break;
			case 1:	$m_robe = candleColor(0) . " linen robe, "; break;
		}
	}

	while ($pile > 0) :

		switch (mt_rand(0,6))
		{
			case 0:	$made_of = "iron";		break;
			case 1:	$made_of = "steel";		break;
			case 2:	$made_of = "bronze";	break;
			case 3:	$made_of = "wooden";	break;
			case 4:	$made_of = "wooden";	break;
			case 5:	$made_of = "silver";	break;
			case 6:	$made_of = "copper";	break;
		}
		switch (mt_rand(0,1))
		{
			case 0:	$rope_of = "silk";		break;
			case 1:	$rope_of = "hemp";		break;
		}
		switch (mt_rand(0,4))
		{
			case 0:	$bottle = "ceramic jug";				break;
			case 1:	$bottle = "glass bottle";				break;
			case 2:	$bottle = "glass jar";					break;
			case 3:	$bottle = "clay jug";					break;
			case 4:	$bottle = "waterskin";					break;
		}

		// ANY SPECIAL CLASS GEAR NEEDED ////////////////////////////////////////////////////////////
		if (($class == "Thief") && ($class_gear != 1)){ $s_stuff = "lockpicks (" . mt_rand(2,6) . " ea), "; $class_gear=1; $m_bag = $m_bag . $s_stuff;}
		if (($class == "Cleric") && ($class_gear != 1)){ $s_stuff = $made_of . " holy symbol, "; $class_gear=1; $m_bag = $m_bag . $s_stuff;}
		if (($class == "Magic-User") && ($class_gear != 1)){ $s_stuff = "spell book bound in " . leatherColor() . " leather, "; $class_gear=1; $m_bag = $m_bag . $s_stuff;}
		if (($class == "Elf") && ($class_gear != 1)){ $s_stuff = "spell book bound in " . leatherColor() . " leather, "; $class_gear=1; $m_bag = $m_bag . $s_stuff;}

		if ($class == "Any"){$max_look = 73;} else {$max_look = 71;}

		switch (mt_rand(0,$max_look))
		{
			case 0: $m_stuff = "small bag of rocks, "; $m_used=1; break;
			case 1: $m_stuff = "small bell, "; $m_used=2; break;
			case 2: $m_stuff = "beeswax, "; $m_used=3; break;
			case 3: $m_stuff = "block & tackle, "; $m_used=4; break;
			case 4: $m_stuff = "blank book bound in " . leatherColor() . " leather (" . (mt_rand(5,20)*10) . " pages), "; $m_used=5; break;
			case 5: $m_stuff = bottlePicker() . ", "; $m_used=6; break;
			case 6: $m_stuff = candleColor(0) . " candles (" . mt_rand(2,8) . " ea), "; $m_used=7; break;
			case 7: $m_stuff = "iron chain (" . mt_rand(2,10) . "'), "; $m_used=8; break;
			case 8: $m_stuff = "chalk, "; $m_used=9; break;
			case 9: $m_stuff = "small bag of charcoal, "; $m_used=10; break;
			case 10: $m_stuff = "crowbar, "; $m_used=11; break;
			case 11: $m_stuff = $made_of . " tankard, "; $m_used=12; break;
			case 12: $m_stuff = "set of ivory dice, "; $m_used=13; break;
			case 13: $m_stuff = "firewood (" . mt_rand(2,5) . " pieces), "; $m_used=14; break;
			case 14: $m_stuff = "fishing net (25' sq), "; $m_used=15; break;
			case 15: $m_stuff = "flint & steel, "; $m_used=16; break;
			case 16: $m_stuff = "hacksaw, "; $m_used=17; break;
			case 17: $m_stuff = "hammer & chisel, "; $m_used=18; break;
			case 18: $m_stuff = "wooden snuff box with " . mt_rand(2,5) . " pinches, "; $m_used=19; break;
			case 19: $m_stuff = "grappling hook & " . $rope_of . " rope (" . (mt_rand(5,10)*10) . "'), "; $m_used=20; break;
			case 20: $m_stuff = $rope_of . " rope (" . (mt_rand(5,10)*10) . "'), "; $m_used=21; break;
			case 21: $m_stuff = bottlePicker() . " of holy water, "; $m_used=22; break;
			case 22: $m_stuff = "hourglass, "; $m_used=23; break;
			case 23: $m_stuff = "bottle of ink (2 oz), "; $m_used=24; break;
			case 24: $m_stuff = "iron spikes (" . mt_rand(6,12) . " ea), "; $m_used=25; break;
			case 25: $m_stuff = "glass jar, "; $m_used=26; break;
			case 26: $m_stuff = "clay jar, "; $m_used=27; break;
			case 27: $m_stuff = "small pouch of " . candleColor(0) . " sand, "; $m_used=28; break;
			case 28: $m_stuff = (mt_rand(2,10)*10) . "' ball of " . candleColor(0) . " string, "; $m_used=29; break;
			case 29: $m_stuff = "magnifying lense, "; $m_used=30; break;
			case 30: $m_stuff = "manacles, "; $m_used=31; break;
			case 31: $m_stuff = "metal file, "; $m_used=32; break;
			case 32: $m_stuff = "small steel mirror, "; $m_used=33; break;
			case 33: $m_stuff = "mortar & pestal, "; $m_used=34; break;
			case 34: $m_stuff = $bottle . " of lamp oil (" . mt_rand(2,5) . " pints), "; $m_used=35; break;
			case 35: $m_stuff = "padlock with key, "; $m_used=36; break;
			case 36: $m_stuff = "jar of " . candleColor(0) . " paint with brush, "; $m_used=37; break;
			case 37: $m_stuff = "parchment (" . mt_rand(5,50) . " sheets), "; $m_used=38; break;
			case 38: $m_stuff = "pick axe, "; $m_used=39; break;
			case 39: $m_stuff = "corncob pipe with tobacco, "; $m_used=40; break;
			case 40: $m_stuff = "wooden pole (10'), "; $m_used=41; break;
			case 41: $m_stuff = "iron pot, "; $m_used=42; break;
			case 42: $m_stuff = "quill, "; $m_used=43; break;
			case 43: $m_stuff = "razor, "; $m_used=44; break;
			case 44: $m_stuff = "scissors, "; $m_used=45; break;
			case 45: $m_stuff = "leather scrollcase, "; $m_used=46; break;
			case 46: $m_stuff = "shovel, "; $m_used=47; break;
			case 47: $m_stuff = "skillet, "; $m_used=48; break;
			case 48: $m_stuff = "spyglass, "; $m_used=49; break;
			case 49: $m_stuff = "leather strap (" . mt_rand(3,10) . "'), "; $m_used=50; break;
			case 50: $m_stuff = "tent (" . mt_rand(1,4) . " person), "; $m_used=51; break;
			case 51: $m_stuff = "tinderbox, "; $m_used=52; break;
			case 52: $m_stuff = "brass knuckles, "; $m_used=53; break;
			case 53: $m_stuff = "tongs, "; $m_used=54; break;
			case 54: $m_stuff = "small " . $made_of . " sundial, "; $m_used=55; break;
			case 55: $m_stuff = "twine (" . (mt_rand(1,5)*10) . "'), "; $m_used=56; break;
			case 56: $m_stuff = "whetstone, "; $m_used=57; break;
			case 57: $m_stuff = "whistle, "; $m_used=58; break;
			case 58: $m_used=59;
				$dice = mt_rand(1,6);
				if ($dice == 1){ $m_stuff = "small pouch of belladonna (" . mt_rand(2,10) . " oz), "; }
				else if ($dice == 2){ $m_stuff = "small pouch of garlic (" . mt_rand(2,10) . " ea), "; }
				else if ($dice == 3){ $m_stuff = "small pouch of spiderwort (" . mt_rand(2,10) . " oz), "; }
				else if ($dice == 4){ $m_stuff = "small pouch of wolfsbane (" . mt_rand(2,10) . " oz), "; }
				else { $m_stuff = "small pouch of yarrow (" . mt_rand(2,10) . " oz), "; }
				break;
			case 59: $m_stuff = "small carving knife, "; $m_used=60; break;
			case 60: $m_stuff = "bottle of " . candleColor(0) . " cloth dye, "; $m_used=61; break;
			case 61: $m_stuff = "bottle of " . candleColor(0) . " hair dye, "; $m_used=62; break;
			case 62: $m_used=63;
				$dice = mt_rand(1,6);
				if ($dice == 1){ $m_stuff = steelMaker() . " necklace, "; }
				else if ($dice == 2){ $m_stuff = steelMaker() . " ring, "; }
				else if ($dice == 3){ $m_stuff = steelMaker() . " ring, "; }
				else if ($dice == 4){ $m_stuff = steelMaker() . " earrings, "; }
				else if ($dice == 5){ $m_stuff = steelMaker() . " earring, "; }
				else { $m_stuff = steelMaker() . " medallion, "; }
				break;
			case 63: $m_stuff = "deck of tarot cards, "; $m_used=64; break;
			case 64: $m_stuff = "hammer, "; $m_used=65; break;
			case 65: $m_used=66;
				$dice = mt_rand(1,3);
				if ($dice == 1){ $m_stuff = candleColor(0) . " cloth rag, "; }
				else if ($dice == 2){ $m_stuff = candleColor(0) . " silk handkerchief, "; }
				else { $m_stuff = candleColor(0) . " handkerchief, "; }
				break;
			case 66: $m_stuff = "bandages (" . mt_rand(5,20) . " ea), "; $m_used=67; break;
			case 67: $m_stuff = "wooden stake (" . mt_rand(2,6) . " ea), "; $m_used=68; break;
			case 68: $m_stuff = "mallet, "; $m_used=69; break;
			case 69: $m_stuff = "rabbit's foot, "; $m_used=70; break;
			case 70: $m_stuff = "blackjack, "; $m_used=71; break;
			case 71: $m_stuff = "small pouch of nut shells, "; $m_used=72; break;
			case 72: $m_stuff = "lockpicks (" . mt_rand(2,6) . " ea), "; $m_used=73; break;
			case 73: $m_stuff = $made_of . " holy symbol, "; $m_used=74; break;
		}

		if (in_array($m_used, $key_array)){}
		else
		{
			$m_bag = $m_bag . $m_stuff;
			array_push($key_array, $m_used);
			$pile = $pile - 1;
		}

	endwhile;

	if ($money > 0)
	{
		$money_grab = mt_rand(1,10);
		switch (mt_rand(0,2))
		{
			case 0:	$m_cash = "and a small pouch (" . currencyBuilder(1,1,0,$money_grab,0,$game) . ").";	break;
			case 1:	$m_cash = "and a belt pouch (" . currencyBuilder(1,1,0,$money_grab,0,$game) . ").";	break;
			case 2:	$m_cash = "and a small sack (" . currencyBuilder(1,1,0,$money_grab,0,$game) . ").";	break;
		}
	}

	$items = $m_bag . $m_food . $m_drink . $m_sleep . $m_light . $m_pack . $m_tune . $m_boot . $m_shirt . $m_pants . $m_belt . $m_hat . $m_hand . $m_back . $m_robe . $m_cash;
	$items = str_replace(" ", "&nbsp;", $items);
	$items = str_replace(",&nbsp;", ",&nbsp;&nbsp;&nbsp;&nbsp; ", $items);
	if ($money != 1){$items = substr($items, 0, -26);}
	else {$items = ucfirst($items);}

	return $items;
}

?>