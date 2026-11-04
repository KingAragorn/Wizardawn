<?php

/// THIS MAKES A ROOM/CLUTTER ITEM FOR POST-APOCALYPTIC GAMES ///

function PAstuffMakerRoom($line,$cash,$v_scare,$map,$game,$cut)
{
	$loot_place = "";
	$loot_size=0;
	$loot_trap=0;

	if (($map == "Spaceship") || ($map == "Exodus Spaceship"))
	{
		if (($game == "Labyrinth Lord") || ($game == "Metamorphosis Alpha")){$xg = 142;} else {$xg = 143;} // NO BULLETS FOR LL-MF GAMES

	  if (mt_rand(1,100) > 80){$stuff = PAmakeNormalItem(1,1,$cash,1,$game);}
	  else if (($game == "Labyrinth Lord") && (mt_rand(1,100) > 90))
	  {
		  switch (mt_rand(0,2))
		  {
			case 0:		$stuff = "power clip (worth 30 " . $cash . ")"; break;
			case 1:		$stuff = "battery (worth 10 " . $cash . ")"; break;
			case 2:		$stuff = candleColor(0) . " plastic keycard (can unlock " . mt_rand(1,5) . "0% of the containers/doors)";	break;
		  }
	  }
	  else if (($game == "Metamorphosis Alpha") && (mt_rand(1,100) > 90))
	  {
		  switch (mt_rand(0,9))
		  {
			case 0:		$stuff = "hydrogren cell (" . mt_rand(1,5) . " each)"; break;
			case 1:		$stuff = "solar cell (" . mt_rand(1,5) . " each)"; break;
			case 2:		$stuff = "chemical cell (" . mt_rand(1,5) . " each)"; break;
			case 3:		$stuff = "shock dart (" . mt_rand(1,5) . " each)"; break;
			case 4:		$stuff = "arrow (" . mt_rand(1,20) . " each)"; break;
			case 5:		$stuff = "quarrel (" . mt_rand(1,20) . " each)"; break;
			case 6:		$stuff = "sling stone (" . mt_rand(1,20) . " each)"; break;
			case 7:		$stuff = "slug (" . mt_rand(1,10) . " each)"; break;
			case 8:		$stuff = "tranquilizer pellet (" . mt_rand(1,5) . " each)"; break;
			case 9:		$stuff = candleColor(0) . " plastic keycard (can unlock " . mt_rand(1,5) . "0% of the containers/doors)";	break;
		  }
	  }
	  else
	  {
		  switch (mt_rand(0,$xg))
		  {
			case 0:		$stuff = mt_rand(2,8) . " " . conditionType(item) . "steel arrows";  if (mt_rand(1,2) == 1){$stuff = mt_rand(2,8) . " " . conditionType(item) . "steel crossbow bolts";}	break;
			case 1:		$stuff = "scattered ashes";														break;
			case 2:		$stuff = "humanoid bones";	if (mt_rand(1,2) == 1){$stuff = "alien bones";}							break;
			case 3:		$stuff = conditionType(jar) . " " . PAbottlePicker();											break;
			case 4:		$stuff = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron chain";								break;
			case 5:		$stuff = conditionType(iron) . "metal club";												break;
			case 6:		$stuff = "splattered " . candleColor(0) . " liquid on the " . dungeonWall();															break;
			case 7:		$stuff = "dents in the " . dungeonWall();												break;
			case 8:		$stuff = conditionType(iron) . "knife handle";												break;
			case 9:		$stuff = "moisture on the " . dungeonWall();												break;
			case 10:	$stuff = "blood smears on the " . dungeonWall();											break;
			case 11:	$stuff = "liquid dripping from the ceiling";												break;
			case 12:	$stuff = "dried blood on the " . dungeonWall();												break;
			case 13:	$stuff = "a large pile of circuit boards";							$loot_place = "inside"; 	$loot_size=1;		break;
			case 14:	$stuff = "dust throughout";														break;
			case 15:	$stuff = mt_rand(2,5) . " odd alien dice";														break;
			case 16:	$stuff = "food scraps";															break;
			case 17:	$stuff = candleColor(0) . " fungus growing";														break;
			case 18:	$stuff = "some piles of " . candleColor(0) . " rocks";														break;
			case 19:	$stuff = "bits of fur and hair";													break;
			case 20:	$stuff = conditionType(iron) . "metal probe";									break;
			case 21:	$stuff = conditionType(iron) . "metal dented space helmet";									break;
			case 22:	$stuff = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron bar";								break;
			case 23:	$stuff = "blunt " . conditionType(iron) . " scalpel";											break;
			case 24:	$stuff = "leather boot";							$loot_place = "inside"; 	$loot_size=1;		break;
			case 25:	$stuff = "scattered medical tools";													break;
			case 26:	$stuff = "areas with mold";														break;
			case 27:	$stuff = "an odd " . conditionType(iron) . " metal tool";												break;
			case 28:	$stuff = mt_rand(5,10) . " foot " . conditionType(iron) . "metal pole";									break;
			case 29:	$stuff = "glass shards scattered around";												break;
			case 30:	$stuff = conditionType(cloth) . "rags";													break;
			case 31:	$stuff = mt_rand(10,50) . " foot " . conditionType(cloth) . " rope";									break;
			case 32:	$stuff = "metal and glass scattered around";												break;
			case 33:	$stuff = conditionType(item) . "" . PAbagCreator($map);				$loot_place = "inside"; 	$loot_size=1;		break;
			case 34:	$stuff = slimeColor() . " slime on the " . dungeonWall();										break;
			case 35:	$stuff = mt_rand(2,8) . " " . conditionType(iron) . "" . steelMaker() . " spikes";							break;
			case 36:	$stuff = mt_rand(2,8) . " pieces of strange ore scattered around";											break;
			case 37:	$stuff = mt_rand(2,8) . " small glowing stones scattered around";										break;
			case 38:	$stuff = "pile of " . mt_rand(5,20) . " dirty syringes";							break;
			case 39:	$stuff = "bloody rags scattered around";													break;
			case 40:	$stuff = conditionType(iron) . "alien sword blade";												break;
			case 41:	$stuff = "scattered bits of bones and teeth";												break;
			case 42:	$stuff = conditionType(item) . "flashlight";													break;
			case 43:	$stuff = "scratches and claw marks on the " . dungeonWall();										break;
			case 44:	$stuff = "small puddle of " . conditionType(water) . "water";			$loot_place = "inside"; 	$loot_size=1;		break;
			case 45:	$stuff = "large puddle of " . conditionType(water) . "water";			$loot_place = "inside"; 	$loot_size=2;		break;
			case 46:	$stuff = "small " . conditionType(iron) . "" . steelMaker() . " hanging mirror";	$loot_place = "behind"; 	$loot_size=3;		break;
			case 47:	$stuff = conditionType(iron) . "" . steelMaker() . " bone saw";
			case 48:	$stuff = mt_rand(2,10) . " pieces of " . conditionType(iron) . "metal";									break;
			case 49:	$stuff = AlienfurnitureMake() . " chair";													break;
			case 50:	$stuff = AlienfurnitureMake() . " bed";			$loot_place = "under"; 		$loot_size=3;		break;
			case 51:	$stuff = AlienfurnitureMake() . " bench";						$loot_place = "under"; 		$loot_size=3;		break;
			case 52:	$stuff = AlienpaintingMaker(1);							$loot_place = "behind"; 	$loot_size=3;		break;
			case 53:	$stuff = "box of odd " . candleColor(0) . " ore";															break;
			case 54:	$stuff = conditionType(iron) . "metal bucket";			$loot_place = "inside"; 	$loot_size=1;		break;
			case 55:	$stuff = AlienfurnitureMake() . " bunk bed";			$loot_place = "under"; 		$loot_size=3;		break;
			case 56:	$stuff = carpetMaker(1);							$loot_place = "under"; 		$loot_size=3;		break;
			case 57:	$stuff = mt_rand(2,10) . " " . candleColor(0) . " 1 inch glass orbs"; 															break;
			case 58:	$stuff = AlienfurnitureMake() . " desk chair"; 						$loot_place = "under"; 		$loot_size=1;		break;
			case 59:	$stuff = "padded " . AlienfurnitureMake() . " chair"; 				$loot_place = "under"; 		$loot_size=1;		break;
			case 60:	$stuff = conditionType(cloth) . "" . candleColor(0) . " couch";			$loot_place = "under"; 		$loot_size=1;		break;
			case 61:	$stuff = conditionType(cloth) . "" . candleColor(0) . " cushion";		$loot_place = "inside";		$loot_size=1;		break;
			case 62:	$stuff = mt_rand(2,6) . " " . eggMaker();												break;
			case 63:	$stuff = "metal can with 1 gallon of a " . candleColor(0) . " flammable liquid"; if (mt_rand(1,2) == 1){$stuff = "metal drum with 50 gallons of " . candleColor(0) . " flammable liquid";	$loot_place = "inside";	$loot_size=2;}		break;
			case 64:	$stuff = "mounted alien animal head";					$loot_place = "inside"; 	$loot_size=1;		break;
			case 65:	$stuff = conditionType(iron) . "book shelf"; 													break;
			case 66:	$stuff = conditionType(cloth) . "mat"; 						$loot_place = "under"; 		$loot_size=3;		break;
			case 67:	$stuff = conditionType(cloth) . "mattress"; 					$loot_place = "inside";		$loot_size=2;		break;
			case 68:	$stuff = conditionType(iron) . "metal pail"; 			$loot_place = "inside";		$loot_size=1;		break;
			case 69:	$stuff = candleColor(0) . " plastic pallet";					$loot_place = "under"; 		$loot_size=3;		break;
			case 70:	$stuff = AlienfurnitureMake() . " pedestal"; 		$loot_trap=1;		$loot_place = "on top of";	$loot_size=3;		break;
			case 71:	$torches = mt_rand(5,10); $stuff = $torches . " light bulbs on the ceiling held...but only " . ceil($torches/mt_rand(2,4)) . " of them are still useable";	break;
			case 72:	$stuff = conditionType(cloth) . "" . candleColor(0) . " sheet"; 									break;
			case 73:	$stuff = AlienfurnitureMake() . " shelf"; 						$loot_place = "on top of";	$loot_size=3;		break;
			case 74:	$stuff = conditionType(iron) . "detached hatch lid";									break;
			case 75:	$stuff = "high " . AlienfurnitureMake() . " stool"; 												break;
			case 76:	$stuff = AlienfurnitureMake() . " stool";										break;
			case 77:	$stuff = sizeMake() . " " . AlienfurnitureMake() . " table";				$loot_place = "under";		$loot_size=3;		break;
			case 78:	$stuff = AlienfurnitureMake() . " computer stand"; 						$loot_place = "behind";		$loot_size=3;		break;
			case 79:	$stuff = AlienfurnitureMake() . " storage cabinet";						$loot_place = "inside"; 	$loot_size=3;		break;
			case 80:	$stuff = AlienfurnitureMake() . " filing cabinet";					$loot_place = "inside"; 	$loot_size=1;		break;
			case 81:	$stuff = AlienfurnitureMake() . " small table";					$loot_place = "under"; 		$loot_size=3;		break;
			case 82:	$stuff = AlienfurnitureMake() . " drawers " . PAclosetFiller(10,1);	$loot_place = "inside"; $loot_size=2;	break;
			case 83:	$stuff = AlienfurnitureMake() . " clothes cabinet " . PAclosetFiller(10,1);	$loot_place = "inside"; $loot_size=3;	break;
			case 84:	$stuff = "broken metal food plate";										break;
			case 85:	$stuff = mt_rand(2,10) . " " . conditionType(iron) . "metal coat hooks on the wall";						break;
			case 86:	$stuff = "shredded and torn clothing";													break;
			case 87:	$stuff = mt_rand(2,10) . " bandages";	if (mt_rand(1,2) == 1){$stuff = mt_rand(2,10) . " bloody bandages";}				break;
			case 88:	$stuff = conditionType(iron) . " metal trash can";		$loot_place = "inside";		$loot_size=3;		break;
			case 89:	$stuff = "broken " . candleColor(0) . " key card";									break;
			case 90:	$stuff = AlienfurnitureMake() . " basin";					$loot_place = "inside"; 	$loot_size=2;		break;
			case 91:	$stuff = AlienfurnitureMake() . " bowl";										break;
			case 92:	$stuff = conditionType(wood) . "whip";													break;
			case 93:	$stuff = AlienfurnitureMake() . " brush";										break;
			case 94:	$stuff = cageMaker();									$loot_place = "inside"; $loot_size=3;		break;
			case 95:	$stuff = "small " . conditionType(iron) . "metal bell";									break;
			case 96:	$stuff = PApreciousChooser() . " candle stick worth " . mt_rand(2,100) . " " . $cash;						break;
			case 97:	$stuff = conditionType(iron) . "cane";										break;
			case 98:	$stuff = conditionType(iron) . "pliers";										break;
			case 99:	$stuff = conditionType(iron) . "metal drawer";	$loot_trap=1;	$loot_place = "inside";		$loot_size=1;		break;
			case 100:	$stuff = bottlePicker() . " of water";												break;
			case 101:	$stuff = PAGemMaker($cut,$cash); break;
			case 102:	$stuff = conditionType(cloth) . "" . candleColor(0) . " blanket";									break;
			case 103:	$stuff = conditionType(iron) . "metal dented space helmet with an " . AlienheadoffMaker() . " still in it";				break;
			case 104:	$stuff = mt_rand(2,10) . "0 feet of " . candleColor(0) . " string";									break;
			case 105:	$stuff = conditionType(cloth) . "" . candleColor(0) . " pillow";		$loot_place = "inside"; 	$loot_size=2;		break;
			case 106:	$stuff = AlienashMaker();								$loot_place = "inside"; 	$loot_size=2;		break;
			case 107:	$stuff = "a huge pile of various bones";					$loot_place = "inside";		$loot_size=3;		break;
			case 108:	$stuff = "a large pile of moon rocks";							$loot_place = "inside"; 	$loot_size=3;		break;
			case 109:	$stuff = conditionType(item) . "wall clock";												break;
			case 110:	$stuff = AliencorpseMaker(). " " . PAmakeNormalItem(5,0,$cash,1,$game);				$loot_place = "on"; 		$loot_size=3;		break;
			case 111:	$stuff = conditionType(iron) . "metal tea pot";										break;
			case 112:	$stuff = conditionType(iron) . "metal knife";										break;
			case 113:	$stuff = "a " . mt_rand(1,4) . " foot wide hole that is about " . mt_rand(2,8) . " feet deep";						break;
			case 114:	$stuff = conditionType(cloth) . "" . candleColor(0) . " washcloth";									break;
			case 115:	$stuff = mt_rand(2,20) . " thumbtacks";															break;
			case 116:	$stuff = "small " . conditionType(iron) . "metal mirror";								break;
			case 117:	$stuff = conditionType(iron) . "metal mug";										break;
			case 118:	$stuff = conditionType(iron) . "metal sewing needle";									break;
			case 119:	$stuff = "pile of dirt";							$loot_place = "inside"; 	$loot_size=3;		break;
			case 120:	$stuff = conditionType(iron) . "metal dust pan";										break;
			case 121:	$stuff = mt_rand(2,20) . " pieces of " . conditionType(paper) . " paper";	break;
			case 122:	$stuff = conditionType(jar) . "glass pitcher";											break;
			case 123:	$stuff = mt_rand(2,10) . "0 feet of wire";												break;
			case 124:	$stuff = mt_rand(2,4) . " foot long " . conditionType(iron) . "metal pipe";												break;
			case 125:	$stuff = conditionType(iron) . "metal pot";			$loot_place = "inside"; 	$loot_size=1;		break;
			case 126:	$stuff = "small bottle of " . candleColor(0) . " liquid";														break;
			case 127:	$stuff = conditionType(item) . "ink pen";													break;
			case 128:	$stuff = conditionType(iron) . "metal razor";									break;
			case 129:	$stuff = "some " . footprintMaker() . " in various spots";										break;
			case 130:	$stuff = "a scattered alien chess-type set";												break;
			case 131:	$stuff = conditionType(iron) . "metal tray";												break;
			case 132:	$stuff = mt_rand(2,20) . " hardened blobs of once melted glass"; if (mt_rand(1,2) == 1){$stuff = mt_rand(2,20) . " hardened blobs of once melted steel";}	break;								break;
			case 133:	$stuff = conditionType(iron) . "metal spoon";										break;
			case 134:	$stuff = conditionType(iron) . "metal pitcher";										break;
			case 135:	$stuff = candleColor(0) . " string (" . mt_rand(2,10) . "0 feet)";									break;
			case 136:	$stuff = conditionType(iron) . "plaque";												break;
			case 137:	$stuff = conditionType(cloth) . "" . candleColor(0) . " towel";										break;
			case 138:	$stuff = AliennormalWeapons(1,3);														break;
			case 139:	$stuff = AliennormalArmor(1);														break;
			case 140:	$stuff = conditionType(iron) . " locker " . PAmakeNormalItem(5,0,$cash,1,$game);	$loot_trap=1;	$loot_place = "inside"; 	$loot_size=3;	break;
			case 141:	$stuff = candleColor(0) . " plastic keycard (can unlock " . mt_rand(1,10) . "0% of the containers/doors)";	break;
			case 142:	$stuff = "a pack of " . mt_rand(2,8) . " batteries";	break;
			case 143:	$stuff = "a box of " . mt_rand(10,30) . " bullets";		break;
		  }
	  }
	}
	else
	{
	  if (mt_rand(1,100) > 80){$stuff = PAmakeNormalItem(1,1,$cash,0,$game);}
	  else
	  {
	  switch (mt_rand(0,143))
	  {
		case 0:		$stuff = mt_rand(2,8) . " " . conditionType(item) . "arrows";  if (mt_rand(1,2) == 1){$stuff = mt_rand(2,8) . " " . conditionType(item) . "crossbow bolts";}	break;
		case 1:		$stuff = "scattered ashes";														break;
		case 2:		$stuff = "humanoid bones";	if (mt_rand(1,2) == 1){$stuff = "animal bones";}							break;
		case 3:		$stuff = conditionType(jar) . " " . PAbottlePicker();											break;
		case 4:		$stuff = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron chain";								break;
		case 5:		$stuff = conditionType(wood) . "wooden club";												break;
		case 6:		$stuff = "cobwebs";															break;
		case 7:		$stuff = "cracks in the " . dungeonWall();												break;
		case 8:		$stuff = conditionType(iron) . "knife handle";												break;
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
		case 21:	$stuff = conditionType(iron) . "" . steelMaker() . " dented pot";									break;
		case 22:	$stuff = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron bar";								break;
		case 23:	$stuff = "blunt " . conditionType(iron) . "spear head";											break;
		case 24:	$stuff = "leather boot";							$loot_place = "inside"; 	$loot_size=1;		break;
		case 25:	$stuff = "scattered leaves and twigs";													break;
		case 26:	$stuff = "areas with mold";														break;
		case 27:	$stuff = conditionType(wood) . "pick handle";												break;
		case 28:	$stuff = mt_rand(5,10) . " foot " . conditionType(wood) . "wood pole";									break;
		case 29:	$stuff = "glass shards scattered around";												break;
		case 30:	$stuff = conditionType(cloth) . "rags";													break;
		case 31:	$stuff = mt_rand(10,50) . " foot " . conditionType(cloth) . " rope";									break;
		case 32:	$stuff = "rubble and dirt scattered around";												break;
		case 33:	$stuff = conditionType(item) . "" . PAbagCreator($map);				$loot_place = "inside"; 	$loot_size=1;		break;
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
		case 46:	$stuff = "small " . conditionType(iron) . "" . steelMaker() . " hanging mirror";$loot_place = "behind"; 	$loot_size=3;		break;
		case 47:	$stuff = conditionType(iron) . "" . steelMaker() . " hand saw";		break;
		case 48:	$stuff = mt_rand(2,10) . " pieces of " . conditionType(wood) . "wood";									break;
		case 49:	$stuff = PAfurnitureMake() . " chair";													break;
		case 50:	$stuff = conditionType(wood) . "" . woodenType() . " bed";			$loot_place = "under"; 		$loot_size=3;		break;
		case 51:	$stuff = PAfurnitureMake() . " bench";						$loot_place = "under"; 		$loot_size=3;		break;
		case 52:	$stuff = PApaintingMaker(1);							$loot_place = "behind"; 	$loot_size=3;		break;
		case 53:	$stuff = "charcoal";															break;
		case 54:	$stuff = conditionType(iron) . "" . steelMaker() . " bucket";			$loot_place = "inside"; 	$loot_size=1;		break;
		case 55:	$stuff = conditionType(wood) . "" . woodenType() . " bunk bed";			$loot_place = "under"; 		$loot_size=3;		break;
		case 56:	$stuff = carpetMaker(1);							$loot_place = "under"; 		$loot_size=3;		break;
		case 57:	$stuff = mt_rand(2,10) . " sand bags"; 															break;
		case 58:	$stuff = PAfurnitureMake() . " desk chair"; 						$loot_place = "under"; 		$loot_size=1;		break;
		case 59:	$stuff = "padded " . PAfurnitureMake() . " chair"; 				$loot_place = "under"; 		$loot_size=1;		break;
		case 60:	$stuff = conditionType(cloth) . "" . candleColor(0) . " couch";			$loot_place = "under"; 		$loot_size=1;		break;
		case 61:	$stuff = conditionType(cloth) . "" . candleColor(0) . " cushion";		$loot_place = "inside";		$loot_size=1;		break;
		case 62:	$stuff = mt_rand(2,6) . " " . eggMaker();												break;
		case 63:	$stuff = "metal gas can with 1 gallon of gasoline"; if (mt_rand(1,2) == 1){$stuff = "metal drum with 50 gallons of gasoline";	$loot_place = "inside";	$loot_size=2;}		break;
		case 64:	$stuff = "mounted " . PAheadMount() . " head";					$loot_place = "inside"; 	$loot_size=1;		break;
		case 65:	$stuff = conditionType(wood) . "book shelf"; 													break;
		case 66:	$stuff = conditionType(cloth) . "mat"; 						$loot_place = "under"; 		$loot_size=3;		break;
		case 67:	$stuff = conditionType(cloth) . "mattress"; 					$loot_place = "inside";		$loot_size=2;		break;
		case 68:	$stuff = conditionType(iron) . "" . steelMaker() . " pail"; 			$loot_place = "inside";		$loot_size=1;		break;
		case 69:	$stuff = conditionType(wood) . "pallet";					$loot_place = "under"; 		$loot_size=3;		break;
		case 70:	$stuff = PAfurnitureMake() . " pedestal"; 		$loot_trap=1;		$loot_place = "on top of";	$loot_size=3;		break;
		case 71:	$torches = mt_rand(5,10); $stuff = $torches . " light bulbs on the walls held in " . steelMaker() . " wall sconces...but only " . ceil($torches/mt_rand(2,4)) . " of them are still useable";	break;
		case 72:	$stuff = conditionType(cloth) . "" . candleColor(0) . " sheet"; 									break;
		case 73:	$stuff = PAfurnitureMake() . " shelf"; 						$loot_place = "on top of";	$loot_size=3;		break;
		case 74:	$stuff = conditionType(iron) . "" . steelMaker() . " dented shield";									break;
		case 75:	$stuff = "high " . woodenType() . " stool"; 												break;
		case 76:	$stuff = conditionType(wood) . "" . woodenType() . " stool";										break;
		case 77:	$stuff = sizeMake() . " " . PAfurnitureMake() . " table";				$loot_place = "under";		$loot_size=3;		break;
		case 78:	$stuff = PAfurnitureMake() . " television stand"; 						$loot_place = "behind";		$loot_size=3;		break;
		case 79:	$stuff = PAfurnitureMake() . " hutch";						$loot_place = "inside"; 	$loot_size=3;		break;
		case 80:	$stuff = PAfurnitureMake() . " filing cabinet";					$loot_place = "inside"; 	$loot_size=1;		break;
		case 81:	$stuff = PAfurnitureMake() . " coffee table";					$loot_place = "under"; 		$loot_size=3;		break;
		case 82:	$stuff = conditionType(wood) . "" . woodenType() . " drawers " . PAclosetFiller(10,1);	$loot_place = "inside"; $loot_size=2;	break;
		case 83:	$stuff = conditionType(wood) . "" . woodenType() . " armoire " . PAclosetFiller(10,1);	$loot_place = "inside"; $loot_size=3;	break;
		case 84:	$stuff = "broken dinner plate";										break;
		case 85:	$stuff = mt_rand(2,10) . " " . conditionType(iron) . "" . steelMaker() . " coat hooks on the wall";						break;
		case 86:	$stuff = "shredded and torn clothing";													break;
		case 87:	$stuff = mt_rand(2,10) . " bandages";	if (mt_rand(1,2) == 1){$stuff = mt_rand(2,10) . " bloody bandages";}				break;
		case 88:	$stuff = conditionType(iron) . "" . steelMaker() . " trash can";			$loot_size=3;		break;
		case 89:	$stuff = "fire pit";	if (mt_rand(1,2) == 1){$stuff = "fire pit with ashes";}	if (mt_rand(1,4) == 1){$stuff = "fire pit with wood";}	break;
		case 90:	$stuff = conditionType(wood) . "basket";					$loot_place = "inside"; 	$loot_size=2;		break;
		case 91:	$stuff = conditionType(iron) . "" . steelMaker() . " bowl";										break;
		case 92:	$stuff = conditionType(wood) . "whip";													break;
		case 93:	$stuff = conditionType(wood) . "" . woodenType() . " brush";										break;
		case 94:	$stuff = cageMaker();									$loot_place = "inside"; $loot_size=3;		break;
		case 95:	$stuff = conditionType(iron) . "" . steelMaker() . " small bell";									break;
		case 96:	$stuff = PApreciousChooser() . " candle stick worth " . mt_rand(2,100) . " " . $cash;						break;
		case 97:	$stuff = conditionType(wood) . "" . woodenType() . " cane";										break;
		case 98:	$stuff = conditionType(iron) . "" . steelMaker() . " pliers";										break;
		case 99:	$stuff = conditionType(wood) . "" . woodenType() . " drawer";	$loot_trap=1;	$loot_place = "inside";		$loot_size=1;		break;
		case 100:	$stuff = bottlePicker() . " of water";												break;
		case 101:	$stuff = PApreciousChooser() . " music box worth " . mt_rand(2,100) . " " . $cash;	$loot_place = "inside";	$loot_size=1;		break;
		case 102:	$stuff = conditionType(cloth) . "" . candleColor(0) . " blanket";									break;
		case 103:	$stuff = conditionType(iron) . "" . steelMaker() . " dented helmet with a " . PAheadoffMaker() . " still in it";				break;
		case 104:	$stuff = mt_rand(2,10) . "0 feet of " . candleColor(0) . " yarn";									break;
		case 105:	$stuff = conditionType(cloth) . "" . candleColor(0) . " pillow";		$loot_place = "inside"; 	$loot_size=2;		break;
		case 106:	$stuff = PAashMaker();								$loot_place = "inside"; 	$loot_size=2;		break;
		case 107:	$stuff = "a huge pile of various bones";					$loot_place = "inside";		$loot_size=3;		break;
		case 108:	$stuff = "a large pile of rocks";							$loot_place = "inside"; 	$loot_size=3;		break;
		case 109:	$stuff = conditionType(item) . "wall clock";												break;
		case 110:	$stuff = PAcorpseMaker(). " " . PAmakeNormalItem(5,0,$cash,0,$game);				$loot_place = "on"; 		$loot_size=3;		break;
		case 111:	$stuff = conditionType(iron) . "" . steelMaker() . " tea pot";										break;
		case 112:	$stuff = conditionType(iron) . "" . steelMaker() . " knife";										break;
		case 113:	$stuff = "a " . mt_rand(1,4) . " foot wide hole that is about " . mt_rand(2,8) . " feet deep";						break;
		case 114:	$stuff = conditionType(cloth) . "" . candleColor(0) . " washcloth";									break;
		case 115:	$stuff = mt_rand(2,20) . " thumbtacks";															break;
		case 116:	$stuff = "small " . conditionType(iron) . "" . steelMaker() . " mirror";								break;
		case 117:	$stuff = conditionType(iron) . "" . steelMaker() . " mug";										break;
		case 118:	$stuff = conditionType(iron) . "" . steelMaker() . " sewing needle";									break;
		case 119:	$stuff = "pile of dirt";							$loot_place = "inside"; 	$loot_size=3;		break;
		case 120:	$stuff = conditionType(iron) . "" . steelMaker() . " pan";										break;
		case 121:	$stuff = mt_rand(2,20) . " pieces of " . conditionType(paper) . " paper";	break;
		case 122:	$stuff = conditionType(jar) . "glass pitcher";											break;
		case 123:	$stuff = mt_rand(2,10) . "0 feet of wire";												break;
		case 124:	$stuff = conditionType(item) . "smoking pipe";												break;
		case 125:	$stuff = conditionType(iron) . "" . steelMaker() . " pot";			$loot_place = "inside"; 	$loot_size=1;		break;
		case 126:	$stuff = "small bottle of cologne";														break;
		case 127:	$stuff = conditionType(item) . "ink pen";													break;
		case 128:	$stuff = conditionType(iron) . "" . steelMaker() . " rusty razor";									break;
		case 129:	$stuff = "some " . footprintMaker() . " in various spots";										break;
		case 130:	$stuff = "a scattered chess set";	if (mt_rand(1,2) == 1){$stuff = "an incomplete and scattered chess set";}			break;
		case 131:	$stuff = conditionType(wood) . "wooden tray";												break;
		case 132:	$stuff = mt_rand(2,20) . " hardened blobs of once melted " . steelMaker();								break;
		case 133:	$stuff = conditionType(iron) . "" . steelMaker() . " spoon";										break;
		case 134:	$stuff = conditionType(iron) . "" . steelMaker() . " pitcher";										break;
		case 135:	$stuff = candleColor(0) . " thread (" . mt_rand(2,10) . "0 feet)";									break;
		case 136:	$stuff = conditionType(wood) . "plaque";												break;
		case 137:	$stuff = conditionType(cloth) . "" . candleColor(0) . " towel";										break;
		case 138:	$stuff = PAnormalWeapons(1,3);														break;
		case 139:	$stuff = PAnormalArmor(1);														break;
		case 140:	$stuff = conditionType(iron) . " locker " . PAmakeNormalItem(5,0,$cash,0,$game);	$loot_trap=1;	$loot_place = "inside"; 	$loot_size=3;	break;
		case 141:	$stuff = "a box of " . mt_rand(10,30) . " bullets";		break;
		case 142:	$stuff = "a pack of " . mt_rand(2,8) . " batteries";	break;
		case 143:	$stuff = PAGemMaker($cut,$cash); break;
	  }
	 }
	}
	if ($line > 0){$stuffing = ", " . $stuff;}
	else {$stuffing = ". Throughout the " . $v_scare . " is...&nbsp;" . $stuff;}
	return array($stuff, $loot_place, $loot_size, $loot_trap, $stuffing);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAbottlePicker()
{
	switch (mt_rand(0,11))
	{
		case 0:	$bottle = "beer bottle";				break;
		case 1:	$bottle = "soda bottle";				break;
		case 2:	$bottle = "glass bottle";				break;
		case 3:	$bottle = "glass jar";					break;
		case 4:	$bottle = "test tube";					break;
		case 5:	$bottle = "milk jug";					break;
		case 6:	$bottle = "soda can";					break;
		case 7:	$bottle = "beer can";					break;
		case 8:	$bottle = "canteen";					break;
		case 9:	$bottle = "wine bottle";				break;
		case 10:$bottle = plainColor() . "-colored, glass bottle";	break;
		case 11:$bottle = plainColor() . "-colored, liquor bottle";		break;
	}
	return $bottle;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAfurnitureMake()
{
	$make = array('wooden', 'oak', 'metal', 'steel', 'maple', 'broken wood', 'rotting wood', 'warped wood', 'ruined wood', 'rusty metal');
	return $make[mt_rand(0,9)];
}
function AlienfurnitureMake()
{
	$make = array('hard plastic', 'strange metal', 'metal', 'steel', 'dented metal', 'rusty metal');
	return $make[mt_rand(0,5)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAheadMount()
{
	$mount = array('bear', 'lion', 'tiger', 'deer', 'boar', 'tiger', 'polar bear', 'cougar', 'grizzly bear', 'deer', 'elk', 'moose', 'antelope');
	$mounted = $mount[mt_rand(0,12)];
	return $mounted;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PApreciousChooser()
{
	$value = array('copper', 'silver', 'gold', 'platinum', 'iron');
	return $value[mt_rand(0,4)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAheadoffMaker()
{
	switch (mt_rand(0,4))
	{
		case 0:	$look = "bloody";	break;
		case 1:	$look = "decayed";	break;
		case 2:	$look = "rotted";	break;
		case 3:	$look = "half-eaten";	break;
		case 4:	$look = "mutilated";	break;
	}

	if (mt_rand(1,100) > 70){$sex = "female";} else {$sex = "male";}

	if (mt_rand(1,100) > 70){$value = "human";}
	else
	{
		$name = array('aardvark', 'alligator', 'ant', 'anteater', 'antelope', 'ape', 'armadillo', 'baboon', 'badger', 'bat', 'bear', 'beaver', 'bee', 'beetle', 'boar', 'buffalo', 'bull', 'camel', 'cat', 'chameleon', 'cheetah', 'chicken', 'chimpanzee', 'chipmunk', 'cobra', 'cockroach', 'cougar', 'cow', 'coyote', 'crab', 'crane', 'cricket', 'crocodile', 'crow', 'deer', 'dog', 'dolphin', 'donkey', 'dragonfly', 'duck', 'eagle', 'eel', 'elephant', 'elk', 'falcon', 'ferret', 'fish', 'fly', 'fox', 'frog', 'gerbil', 'goat', 'gopher', 'gorilla', 'hare', 'hawk', 'hippopotamus', 'hornet', 'horse', 'hyena', 'iguana', 'jackal', 'jaguar', 'kangaroo', 'koala', 'leopard', 'lion', 'lizard', 'lobster', 'locust', 'mantis', 'mink', 'mole', 'monkey', 'moose', 'mosquito', 'mouse', 'mule', 'muskrat', 'opossum', 'ostrich', 'otter', 'owl', 'ox', 'panda', 'panther', 'parrot', 'pelican', 'penguin', 'platypus', 'porcupine', 'puma', 'rabbit', 'raccoon', 'ram', 'rat', 'raven', 'rhinoceros', 'salamander', 'scorpion', 'seahorse', 'seal', 'shark', 'skunk', 'snake', 'squid', 'squirrel', 'tick', 'tiger', 'toad', 'turkey', 'turtle', 'walrus', 'wasp', 'weasel', 'wolf', 'wolverine', 'woodchuck', 'worm', 'zebra');
		$names = count($name)-1;
		$value = "humanoid " . $name[mt_rand(0,$names)];
	}

	$head = $look . " head of a " . $sex . " " . $value;
	if (mt_rand(1,100) > 80){$head = "skull of a " . $value;}

	return $head;
}
function AlienheadoffMaker()
{
	switch (mt_rand(0,4))
	{
		case 0:	$look = "bloody";	break;
		case 1:	$look = "decayed";	break;
		case 2:	$look = "rotted";	break;
		case 3:	$look = "half-eaten";	break;
		case 4:	$look = "mutilated";	break;
	}

	if (mt_rand(1,100) > 70){$value = "human";}
	else if (mt_rand(1,100) > 50){$value = "alien";}
	else {$value = "humanoid";}

	$head = $look . " head of a " . $value;
	if (mt_rand(1,100) > 80){$head = "skull of a " . $value;}

	return $head;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAcorpseMaker()
{
	switch (mt_rand(0,4))
	{
		case 0:	$look = "bloody";	break;
		case 1:	$look = "decayed";	break;
		case 2:	$look = "rotted";	break;
		case 3:	$look = "half-eaten";	break;
		case 4:	$look = "mutilated";	break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$noun = "body";		break;
		case 1:	$noun = "corpse";	break;
		case 2:	$noun = "remains";	break;
		case 3:	$noun = "bones";	break;
	}

	if (mt_rand(1,100) > 70){$sex = "female";} else {$sex = "male";}

	if (mt_rand(1,100) > 70){$value = "human";}
	else
	{
		$name = array('aardvark', 'alligator', 'ant', 'anteater', 'antelope', 'ape', 'armadillo', 'baboon', 'badger', 'bat', 'bear', 'beaver', 'bee', 'beetle', 'boar', 'buffalo', 'bull', 'camel', 'cat', 'chameleon', 'cheetah', 'chicken', 'chimpanzee', 'chipmunk', 'cobra', 'cockroach', 'cougar', 'cow', 'coyote', 'crab', 'crane', 'cricket', 'crocodile', 'crow', 'deer', 'dog', 'dolphin', 'donkey', 'dragonfly', 'duck', 'eagle', 'eel', 'elephant', 'elk', 'falcon', 'ferret', 'fish', 'fly', 'fox', 'frog', 'gerbil', 'goat', 'gopher', 'gorilla', 'hare', 'hawk', 'hippopotamus', 'hornet', 'horse', 'hyena', 'iguana', 'jackal', 'jaguar', 'kangaroo', 'koala', 'leopard', 'lion', 'lizard', 'lobster', 'locust', 'mantis', 'mink', 'mole', 'monkey', 'moose', 'mosquito', 'mouse', 'mule', 'muskrat', 'opossum', 'ostrich', 'otter', 'owl', 'ox', 'panda', 'panther', 'parrot', 'pelican', 'penguin', 'platypus', 'porcupine', 'puma', 'rabbit', 'raccoon', 'ram', 'rat', 'raven', 'rhinoceros', 'salamander', 'scorpion', 'seahorse', 'seal', 'shark', 'skunk', 'snake', 'squid', 'squirrel', 'tick', 'tiger', 'toad', 'turkey', 'turtle', 'walrus', 'wasp', 'weasel', 'wolf', 'wolverine', 'woodchuck', 'worm', 'zebra');
		$names = count($name)-1;
		$value = "humanoid " . $name[mt_rand(0,$names)];
	}

	if ($noun == "bones"){$body = $look . " " . $noun . " of a " . $value;}
	else {$body = $look . " " . $noun . " of a " . $sex . " " . $value;}

	return $body;
}
function AliencorpseMaker()
{
	switch (mt_rand(0,4))
	{
		case 0:	$look = "bloody";	break;
		case 1:	$look = "decayed";	break;
		case 2:	$look = "rotted";	break;
		case 3:	$look = "half-eaten";	break;
		case 4:	$look = "mutilated";	break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$noun = "body";		break;
		case 1:	$noun = "corpse";	break;
		case 2:	$noun = "remains";	break;
		case 3:	$noun = "bones";	break;
	}

	if (mt_rand(1,100) > 70){$sex = "female";} else {$sex = "male";}

	if (mt_rand(1,100) > 70){$value = "human";}
	else if (mt_rand(1,100) > 50){$value = "alien";}
	else{$value = "humanoid ";}

	if ($noun == "bones"){$body = $look . " " . $noun . " of a " . $value;}
	else {$body = $look . " " . $noun . " of a " . $sex . " " . $value;}

	return $body;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////

function PAashMaker()
{
	switch (mt_rand(0,1))
	{
		case 0:	$look = "a large pile";	break;
		case 1:	$look = "a pile";	break;
	}
	switch (mt_rand(0,7))
	{
		case 0:	$hat = candleColor(0) . " baseball cap";	break;
		case 1:	$hat = candleColor(0) . " stocking cap";	break;
		case 2:	$hat = candleColor(0) . " beret"; break;
		case 3:	$hat = candleColor(0) . " peaked cap"; break;
		case 4:	$hat = candleColor(0) . " cowboy hat"; break;
		case 5:	$hat = candleColor(0) . " fedora"; break;
		case 6:	$hat = candleColor(0) . " flat cap"; break;
		case 7:	$hat = candleColor(0) . " side cap"; break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$value = " with a " . conditionType(iron) . "" . steelMaker() . " helmet lying on top of it";		break;
		case 1:	$value = " with a " . conditionType(cloth) . "" . $hat . " lying on top of it";	break;
		case 2:	$value = " with a " . PAnormalWeapons(1,3) . " next to it";							break;
		case 3:	$value = " with a humanoid skull lying on top of it";							break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$ash = "of ashes";				break;
		case 1:	$ash = "of ashes";				break;
		case 2:	$ash = "of ashes";				break;
		case 3:	$ash = "of " . candleColor(0) . " ashes";	break;
	}
	return $look . " " . $ash . "" . $value;
}
function AlienashMaker()
{
	switch (mt_rand(0,1))
	{
		case 0:	$look = "a large pile";	break;
		case 1:	$look = "a pile";	break;
	}
	switch (mt_rand(0,2))
	{
		case 0:	$value = " with a " . conditionType(iron) . "metal space helmet lying on top of it";		break;
		case 1:	$value = " with a " . AliennormalWeapons(1,3) . " next to it";							break;
		case 2:	$value = " with a humanoid skull lying on top of it";							break;
	}
	switch (mt_rand(0,3))
	{
		case 0:	$ash = "of ashes";				break;
		case 1:	$ash = "of ashes";				break;
		case 2:	$ash = "of ashes";				break;
		case 3:	$ash = "of " . candleColor(0) . " ashes";	break;
	}
	return $look . " " . $ash . "" . $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAnormalWeapons($condition,$size)
{
		if ($size == 1){$r_min=0; $r_max = 3;}
		else if ($size == 2){$r_min=0; $r_max = 7;}
		else {$r_min=0; $r_max = 15;}

		switch (mt_rand($r_min,$r_max))
		{
			case 0:	$item = "small pistol";	break;
			case 1:	$item = "medium pistol";	break;
			case 2:	$item = "heavy pistol";	break;
			case 3:	$item = "knife";	break;
			case 4:	$item = "club";	break;
			case 5:	$item = "axe";	break;
			case 6:	$item = "sword";	break;
			case 7:	$item = "machine pistol";	break;
			case 8:	$item = "small rifle";	break;
			case 9:	$item = "battle axe";	break;
			case 10:$item = "bow";	break;
			case 11:$item = "broadsword";	break;
			case 12:$item = "medium rifle";	break;
			case 13:$item = "spear";	break;
			case 14:$item = "staff";	break;
			case 15:$item = "heavy rifle";	break;
		}

		if (($condition == 1) && (mt_rand(1,100) > 30)){$item = "broken " . $item;}

	return $item;
}
function AliennormalWeapons($condition,$size)
{
		if ($size == 1){$r_min=0; $r_max = 3;}
		else if ($size == 2){$r_min=0; $r_max = 7;}
		else {$r_min=0; $r_max = 15;}

		switch (mt_rand($r_min,$r_max))
		{
			case 0:	$item = "small beam pistol";	break;
			case 1:	$item = "medium beam pistol";	break;
			case 2:	$item = "heavy beam pistol";	break;
			case 3:	$item = "knife";	break;
			case 4:	$item = "metal club";	break;
			case 5:	$item = "axe";	break;
			case 6:	$item = "sword";	break;
			case 7:	$item = "laser pistol";	break;
			case 8:	$item = "small beam rifle";	break;
			case 9:	$item = "large axe";	break;
			case 10:$item = "needle pistol";	break;
			case 11:$item = "large sword";	break;
			case 12:$item = "needle rifle";	break;
			case 13:$item = "spear";	break;
			case 14:$item = "staff";	break;
			case 15:$item = "heavy needle rifle";	break;
		}

		if (($condition == 1) && (mt_rand(1,100) > 30)){$item = "broken " . $item;}

	return $item;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAnormalArmor($condition)
{
		$smithy = mt_rand(1,11);
		if ($smithy == 1){$item = "leather armor";}
		else if ($smithy == 2){$item = "chain armor";}
		else if ($smithy == 3){$item = "plate armor";}
		else if ($smithy == 4){$item = "combat fatigues";}
		else if ($smithy == 5){$item = "interceptor body armor";}
		else if ($smithy == 6){$item = "ballistic vest";}
		else if ($smithy == 7){$item = "scout armor";}
		else if ($smithy == 8){$item = candleColor(0) . " radiation suit";}
		else if ($smithy == 9){$item = "kevlar armor";}
		else if ($smithy == 10)
		{
			switch (mt_rand(0,5))
			{
				case 0:	$item = candleColor(0) . " football helmet";	break;
				case 1:	$item = candleColor(0) . " baseball helmet";	break;
				case 2:	$item = "kevlar helmet";	break;
				case 3:	$item = "riot helmet";		break;
				case 4:	$item = "fireman helmet";	break;
				case 5:	$item = "hard hat";			break;
			}
		}
		else
		{
			switch (mt_rand(0,3))
			{
				case 0:	$item = "riot shield";					break;
				case 1:	$item = "large street sign (shield)";	break;
				case 2:	$item = "large metal can lid (shield)";	break;
				case 3:	$item = "metal shield";					break;
			}
		}

		if (($condition == 1) && (mt_rand(1,100) > 30))
		{
			switch (mt_rand(0,1))
			{
				case 0:	$dmng = "broken ";	break;
				case 1:	$dmng = "ruined ";	break;
			}
		}
		$item = $dmng . $item;

	return $item;
}
function AliennormalArmor($condition)
{
		$smithy = mt_rand(1,11);
		if ($smithy == 1){$item = candleColor(0) . " space suit";}
		else if ($smithy == 2){$item = "combat sport armor";}
		else if ($smithy == 3){$item = "titanium plate armor";}
		else if ($smithy == 4){$item = "combat uniform";}
		else if ($smithy == 5){$item = "interceptor body armor";}
		else if ($smithy == 6){$item = "energy vest";}
		else if ($smithy == 7){$item = "scout armor";}
		else if ($smithy == 8){$item = candleColor(0) . " radiation suit";}
		else if ($smithy == 9){$item = "bio-fit armor";}
		else if ($smithy == 10)
		{
			switch (mt_rand(0,2))
			{
				case 0:	$item = candleColor(0) . " space helmet";			break;
				case 1:	$item = candleColor(0) . " military helmet";		break;
				case 2:	$item = candleColor(0) . " hard plastic helmet";	break;
			}
		}
		else
		{
			switch (mt_rand(0,2))
			{
				case 0:	$item = "hard plastic shield";	break;
				case 1:	$item = "titanium shield";		break;
				case 2:	$item = "metal shield";			break;
			}
		}

		if (($condition == 1) && (mt_rand(1,100) > 30))
		{
			switch (mt_rand(0,1))
			{
				case 0:	$dmng = "broken ";	break;
				case 1:	$dmng = "ruined ";	break;
			}
		}
		$item = $dmng . $item;

	return $item;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PApaintingMaker($condition)
{
	if (($condition == 1) && (mt_rand(1,100) > 50)){$pfx = "ruined painting of "; if (mt_rand(1,100) > 50){$pfx = "torn painting of ";}}
	else {$pfx = "painting of ";}

	switch (mt_rand(0,12))
	{
		case 0:	$item = "a scenic forest view";	break;
		case 1:	$item = "a scenic ocean view";	break;
		case 2:	$item = "a scenic desert view";	break;
		case 3:	$item = "a scenic jungle view";	break;
		case 4:	$item = "an old sailing ship";	break;
		case 5:	$item = "an old building";		break;
		case 6:	$item = "a scenic city view";	break;
		case 7:	$item = "a historic battle";	break;
		case 8:	$item = "flowers";				break;
		case 9:	$item = "a mountain";			break;
		case 10:$item = "a human male";			break;
		case 11:$item = "a human female";		break;
		case 12:$item = "a human family";		break;
	}
	return $pfx . "" . $item;
}
function AlienpaintingMaker($condition)
{
	if (($condition == 1) && (mt_rand(1,100) > 50)){$pfx = "ruined picture of "; if (mt_rand(1,100) > 50){$pfx = "broken picture of ";}}
	else {$pfx = "picture of ";}

	switch (mt_rand(0,12))
	{
		case 0:	$item = "a scenic forest view";	break;
		case 1:	$item = "a scenic ocean view";	break;
		case 2:	$item = "a scenic desert view";	break;
		case 3:	$item = "a scenic jungle view";	break;
		case 4:	$item = "a strange planet";		break;
		case 5:	$item = "an odd spaceship";		break;
		case 6:	$item = "a star system";		break;
		case 7:	$item = "an alien animal";		break;
		case 8:	$item = "strange flowers";		break;
		case 9:	$item = "a mountain";			break;
		case 10:$item = "a alien male";			break;
		case 11:$item = "a alien female";		break;
		case 12:$item = "a alien family";		break;
	}
	return $pfx . "" . $item;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAmakeNormalItem($amount,$view,$cash,$tech,$game)
{
	if ($amount < 2){$amount = 1; $z = 1;} else {$z = 2;}

	$amount = mt_rand($z,$amount);

	while ($amount > 0) :

		$junker = PickJunk();

		if ($game == "Metamorphosis Alpha")
		{
			$e = mt_rand(2,6);
			if ($junker[$e] > 0){ $worth = " (worth&nbsp;" . $junker[$e] . "&nbsp;" . $cash . ")"; } else { $worth = ""; }
			$item = $junker[1] . $worth;
		} 
		else
		{
			$working = mt_rand(2,12);
			if ($tech == 1){$name = $junker[1];} else {$name = $junker[0];}
			if ($working < 6){			$item = $name . " (ruined)";}
			else if ($working < 8){		if ($junker[2] > 0){ $worth = " - worth " . $junker[2] . " " . $cash;} else {$worth = "";}		$item = $name . " (poor" . $worth . ")";}
			else if ($working < 10){	if ($junker[3] > 0){ $worth = " - worth " . $junker[3] . " " . $cash;} else {$worth = "";}		$item = $name . " (fair" . $worth . ")";}
			else if ($working < 11){	if ($junker[4] > 0){ $worth = " - worth " . $junker[4] . " " . $cash;} else {$worth = "";}		$item = $name . " (good" . $worth . ")";}
			else if ($working < 12){	if ($junker[5] > 0){ $worth = " - worth " . $junker[5] . " " . $cash;} else {$worth = "";}		$item = $name . " (excellent" . $worth . ")";}
			else {						if ($junker[6] > 0){ $worth = " - worth " . $junker[6] . " " . $cash;} else {$worth = "";}		$item = $name . " (perfect" . $worth . ")";}
		}
		$amount = $amount - 1;

		$stuff = $item . " | " . $stuff;

	endwhile;

	if ($view == 1)
	{
		$junk = $stuff;
		$junk = str_replace(", ", "/", $junk);
		$junk = str_replace(" | ", ", ", $junk);
		$junk = substr($junk, 0, -2);
	}
	else { $junk = "[<i>CONTAINS:&nbsp;" . substr($stuff, 0, -2) . "</i>]"; }

	return $junk;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAclosetFiller($amount,$where)
{
	$amount = mt_rand(2,$amount);

	while ($amount > 0) :

		$leather = 0;

	   switch (mt_rand(0,28))
	   {
		case 0:	$cloth = "apron";	break;
		case 1:	$cloth = "belt";	$leather = 1;	break;
		case 2:	$cloth = "blouse";	break;
		case 3:	$cloth = "vest";	break;
		case 4:	$cloth = "cap";		break;
		case 5:	$cloth = "cape";	break;
		case 6:	$cloth = "cloak";	break;
		case 7:	$cloth = "coat";	break;
		case 8:	$cloth = "dress";	break;
		case 9: $cloth = "gloves";	$leather = 2;	break;
		case 10:$cloth = "gown";	break;
		case 11:$cloth = "hat";		break;
		case 12:$cloth = "hood";	break;
		case 13:$cloth = "kerchief";	break;
		case 14:$cloth = "purse";	$leather = 3;	break;
		case 15:$cloth = "purse";	$leather = 2;	break;
		case 16:$cloth = "robe";	break;
		case 17:$cloth = "scarf";	break;
		case 18:$cloth = "shawl";	break;
		case 19:$cloth = "stocking cap";	break;
		case 20:$cloth = "t-shirt";	break;
		case 21:$cloth = "sweater vest";	break;
		case 22:$cloth = "socks";	break;
		case 23:$cloth = "sweater";	break;
		case 24:$cloth = "baseball cap";	break;
		case 25:$cloth = "pants";	break;
		case 26:$cloth = "slippers";	break;
		case 27:$cloth = "sandals";	$leather = 1;	break;
		case 28:$cloth = "boots";	$leather = 1;	break;
	   }

		if ($leather == 1){$clothing = leatherColor() . " leather " . $cloth;}
		else if (($leather == 2) && (mt_rand(1,100) > 50)){$clothing = leatherColor() . " leather " . $cloth;}
		else if ($leather == 2){$clothing = candleColor(0) . " cloth " . $cloth;}
		else if ($leather == 3){$clothing = candleColor(0) . " cloth " . $cloth . " (contains " . mt_rand(3,30) . " odd coins";}
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

		$wardrobe = $clothing . " | " . $wardrobe;

	endwhile;

	return "[<i>CONTAINS:&nbsp;" . substr($wardrobe, 0, -2) . "</i>]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAGemMaker($cut,$money)
{
	if (mt_rand(1,2) == 1)
	{
		switch (mt_rand(0,9))
		{
			case 0:	$look = "odd";	break;
			case 1:	$look = "alien";	break;
			case 2:	$look = "bizarre";	break;
			case 3:	$look = "curious";	break;
			case 4:	$look = "eccentric";	break;
			case 5:	$look = "peculiar";	break;
			case 6:	$look = "remarkable";	break;
			case 7:	$look = "strange";	break;
			case 8:	$look = "unique";	break;
			case 9:	$look = "weird";	break;
		}
		switch (mt_rand(0,2))
		{
			case 0:	$gem = "gem";	break;
			case 1:	$gem = "crystal";	break;
			case 2:	$gem = "stone";	break;
		}
		$value = mt_rand(5,20) * 100;
		$value = ceil($value*(0.01*$cut));
		$rock = ucfirst($look) . " " . ucfirst(candleColor(0)) . " " . ucfirst($gem) . " (worth " . number_format($value) . " " . $money . ")";
	}
	else
	{
		switch (mt_rand(0,29))
		{
			case 0: $elem1 = "ar"; break;
			case 1: $elem1 = "bar"; break;
			case 2: $elem1 = "ber"; break;
			case 3: $elem1 = "bis"; break;
			case 4: $elem1 = "cae"; break;
			case 5: $elem1 = "car"; break;
			case 6: $elem1 = "dys"; break;
			case 7: $elem1 = "fran"; break;
			case 8: $elem1 = "haf"; break;
			case 9: $elem1 = "he"; break;
			case 10: $elem1 = "hy"; break;
			case 11: $elem1 = "io"; break;
			case 12: $elem1 = "kryp"; break;
			case 13: $elem1 = "lith"; break;
			case 14: $elem1 = "mag"; break;
			case 15: $elem1 = "ox"; break;
			case 16: $elem1 = "phos"; break;
			case 17: $elem1 = "po"; break;
			case 18: $elem1 = "rad"; break;
			case 19: $elem1 = "ru"; break;
			case 20: $elem1 = "scan"; break;
			case 21: $elem1 = "sil"; break;
			case 22: $elem1 = "so"; break;
			case 23: $elem1 = "stron"; break;
			case 24: $elem1 = "thal"; break;
			case 25: $elem1 = "thul"; break;
			case 26: $elem1 = "ti"; break;
			case 27: $elem1 = "ur"; break;
			case 28: $elem1 = "ytt"; break;
			case 29: $elem1 = "zir"; break;
		}

		switch (mt_rand(0,29))
		{
			case 0: $elem2 = "an"; break;
			case 1: $elem2 = "b"; break;
			case 2: $elem2 = "bid"; break;
			case 3: $elem2 = "c"; break;
			case 4: $elem2 = "con"; break;
			case 5: $elem2 = "d"; break;
			case 6: $elem2 = "dro"; break;
			case 7: $elem2 = "forn"; break;
			case 8: $elem2 = "i"; break;
			case 9: $elem2 = "ic"; break;
			case 10: $elem2 = "l"; break;
			case 11: $elem2 = "m"; break;
			case 12: $elem2 = "min"; break;
			case 13: $elem2 = "n"; break;
			case 14: $elem2 = "nes"; break;
			case 15: $elem2 = "noct"; break;
			case 16: $elem2 = "pho"; break;
			case 17: $elem2 = "pro"; break;
			case 18: $elem2 = "r"; break;
			case 19: $elem2 = "s"; break;
			case 20: $elem2 = "sen"; break;
			case 21: $elem2 = "t"; break;
			case 22: $elem2 = "tan"; break;
			case 23: $elem2 = "tass"; break;
			case 24: $elem2 = "tat"; break;
			case 25: $elem2 = "tet"; break;
			case 26: $elem2 = "ung"; break;
			case 27: $elem2 = "y"; break;
			case 28: $elem2 = "ybden"; break;
			case 29: $elem2 = "yll"; break;
		}

		switch (mt_rand(0,9))
		{
			case 0: $elem3 = "gen"; break;
			case 1: $elem3 = "ic"; break;
			case 2: $elem3 = "ine"; break;
			case 3: $elem3 = "ium"; break;
			case 4: $elem3 = "on"; break;
			case 5: $elem3 = "rus"; break;
			case 6: $elem3 = "sium"; break;
			case 7: $elem3 = "tin"; break;
			case 8: $elem3 = "um"; break;
			case 9: $elem3 = "uth"; break;
		}

		$element = $elem1 . $elem2 . $elem3;

		switch (mt_rand(0,18))
		{
			case 0: $elemz = " radioactive, "; break;
			case 1: $elemz = " explosive, "; break;
			case 2: $elemz = " irradiated, "; break;
			case 3: $elemz = " energized, "; break;
			case 4: $elemz = " magnetic, "; break;
			case 5: $elemz = " thermal, "; break;
			case 6: $elemz = " conductive, "; break;
		}
		switch (mt_rand(0,7))
		{
			case 0: $elem4 = "bottle of " . $elemz . varyingColors() . " " . candleColor(0) . " liquid " . $element; break;
			case 1: $elem4 = "vial of " . $elemz . varyingColors() . " " . candleColor(0) . " liquid " . $element; break;
			case 2: $elem4 = "chunk of " . $elemz . varyingColors() . " " . candleColor(0) . " metallic " . $element; break;
			case 3: $elem4 = "piece of " . $elemz . varyingColors() . " " . candleColor(0) . " " . $element . " metal"; break;
			case 4: $elem4 = "jar of " . $elemz . varyingColors() . " " . candleColor(0) . " powdered " . $element; break;
			case 5: $elem4 = "can of " . $elemz . varyingColors() . " " . candleColor(0) . " powdered " . $element; break;
			case 6: $elem4 = "chunk of " . $elemz . varyingColors() . " " . candleColor(0) . " " . $element . " ore"; break;
			case 7: $elem4 = "piece of " . $elemz . varyingColors() . " " . candleColor(0) . " " . $element . " rock"; break;
		}
		$value = mt_rand(5,20) * 100;
		$value = ceil($value*(0.01*$cut));
		$rock = ucfirst($elem4) . " (worth " . number_format($value) . " " . $money . ")";
	}
	return $rock;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PAspecialMakerRoom($cut,$room,$game)
{
	$room = mt_rand(1,$room);

	if (mt_rand(1,3) > 1)
	{
		$forms = array('aardvark', 'alligator', 'anteater', 'antelope', 'ape', 'armadillo', 'baboon', 'badger', 'bat', 'bear', 'beaver', 'boar', 'buffalo', 'bull', 'camel', 'cat', 'chameleon', 'cheetah', 'chicken', 'chimpanzee', 'chipmunk', 'cobra', 'cougar', 'cow', 'coyote', 'crab', 'crane', 'crocodile', 'crow', 'deer', 'dog', 'donkey', 'duck', 'eagle', 'elephant', 'elk', 'falcon', 'ferret', 'fox', 'frog', 'gerbil', 'giraffe', 'goat', 'gopher', 'gorilla', 'hamster', 'hare', 'hawk', 'hippopotamus', 'horse', 'hyena', 'iguana', 'jackal', 'jaguar', 'kangaroo', 'koala', 'lamb', 'leopard', 'lion', 'lizard', 'mink', 'mole', 'monkey', 'moose', 'mouse', 'mule', 'muskrat', 'opossum', 'ostrich', 'otter', 'owl', 'ox', 'panda', 'panther', 'parrot', 'pelican', 'penguin', 'pig', 'platypus', 'porcupine', 'puma', 'rabbit', 'raccoon', 'ram', 'rat', 'raven', 'rhinoceros', 'salamander', 'seal', 'sheep', 'skunk', 'snail', 'snake', 'squirrel', 'tiger', 'toad', 'turkey', 'turtle', 'walrus', 'weasel', 'wolf', 'wolverine', 'woodchuck', 'worm', 'zebra');
		$form = $forms[mt_rand(0,104)];
	}
	else
	{
		$forms = array('ant', 'bee', 'beetle', 'cockroach', 'cricket', 'dragonfly', 'fly', 'hornet', 'locust', 'mantis', 'mosquito', 'scorpion', 'spider', 'tick', 'wasp');
		$form = $forms[mt_rand(0,14)];
	}

	switch (mt_rand(0,7))
	{
		case 0:	$mutate = "skin turns to " . candleColor(0) . " feathers";	break;
		case 1:	$mutate = "skin turns " . candleColor(0);	break;
		case 2:	$mutate = "skin turns to " . candleColor(0) . " scales";	break;
		case 3:	$mutate = "can see in total darkness but now sensitive to light";	break;
		case 4:	$mutate = "everyone in the area is vaporized";	break;
		case 5:	$mutate = "hair turns " . candleColor(0);	break;
		case 6:	$mutate = "hair falls out";	break;
		case 7:	$mutate = "turns everyone into a humanoid " . $form;	break;
	}

	switch (mt_rand(0,5))
	{
		case 0:	$fruit = "poisonous";	break;
		case 1:	$fruit = "restores 1d6 damage when eaten";	break;
		case 2:	$fruit = "explodes if thrown causing 2d6 damage";	break;
		case 3:	$fruit = "causes sleep for " . mt_rand(1,12) . " turns if eaten";	break;
		case 4:	$fruit = "gives infravision for " . mt_rand(1,12) . " turns if eaten";	break;
		case 5:	$fruit = "gives poison resistance for " . mt_rand(1,12) . " turns if eaten";	break;
	}

	switch (mt_rand(0,12))
	{
		case 0:	$button = "causes self-destruct in " . mt_rand(2,10) . " turns";	break;
		case 1:	$button = "opens every door in the entire ship";	break;
		case 2:	$button = "causes a nearby wall to open, revealing a random creature";	break;
		case 3:	$button = "causes vents to fill the room with " . candleColor(0) . " smoke";	break;
		case 4:	$button = "triggers a loud alarm that can be heard throughout the ship";	break;
		case 5:	$button = "causes a bright flash of light that drains all power clips, batteries, and energy weapons";
			if ($game == "Metamorphosis Alpha"){$button = "causes a bright flash of light that drains all power cells and energy weapons";}
			break;
		case 6:	$button = "triggers soft music to play in the room";	break;
		case 7:	$button = "turns the room's lights on and off";	break;
		case 8:	$button = "launches a missile from the ship";	break;
		case 9:	$button = "fires a large exterior laser cannon";	break;
		case 10:$button = "activates radiation lights that changes everyone in the room [" . $mutate . "]";	break;
		case 11:$button = "closes and locks every door in the entire ship";	break;
		case 12:$button = "triggers a loud alarm that can be heard throughout the ship, with flashing red lights everywhere";	break;
	}

	switch (mt_rand(0,4))
	{
		case 0:	$computer = "the screen shows a live feed of room #" . $room;	break;
		case 1:	$computer = "voice activated and can answer " . mt_rand(2,6) . " questions about the ship";	break;
		case 2:	$computer = "shows a map of a section of the ship";	break;
		case 3:	$computer = "with a series of buttons, and a large " . candleColor(0) . " button [<i>" . $button . "</i>]";	break;
		case 4:	$computer = "with a slot to recharge power clips and batteries";
			if ($game == "Metamorphosis Alpha"){$computer = "with a slot to recharge power cells";}
			break;
	}

	switch (mt_rand(0,5))
	{
		case 0:	$stuff = "A food vending machine that requires a keypad input to dispense food or drink.";	break;
		case 1:	$stuff = "A glowing pad on the floor that teleports anyone standing on it to room #" . $room . ".";	break;
		case 2:	$stuff = "A large " . candleColor(0) . " plant that has " . mt_rand(3,12) . " odd " . candleColor(0) . " fruit (<i>" . $fruit . "</i>).";	break;
		case 3:	$stuff = "A cloning tube that will clone another creature from some of it's dead organic material.";	break;
		case 4:	$stuff = "An escape pod that can hold " . mt_rand(2,10) . " humanoids. If activated, it will launch the pod and land about " . mt_rand(1,10) . "0 miles away.";	break;
		case 5:	$stuff = "A computer terminal (" . $computer . ")";	break;
	}
	return $stuff;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

function gammaGroundItem($cash,$game,$cut)
{
	switch (mt_rand(0,132))
	{
		case 0: $stuff = mt_rand(2,8) . " " . conditionType(item) . "arrows";  if (mt_rand(1,2) == 1){$stuff = mt_rand(2,8) . " " . conditionType(item) . "crossbow bolts";} break;
		case 1: $stuff = "scattered ashes"; break;
		case 2: $stuff = "humanoid bones"; if (mt_rand(1,2) == 1){$stuff = "animal bones";} break;
		case 3: $stuff = conditionType(jar) . " " . PAbottlePicker(); break;
		case 4: $stuff = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron chain"; break;
		case 5: $stuff = conditionType(wood) . "wooden club"; break;
		case 6: $stuff = "a pile of dung"; break;
		case 7: $stuff = "food scraps"; break;
		case 8: $stuff = "fungus growing"; break;
		case 9: $stuff = "some piles of guano"; break;
		case 10: $stuff = "bits of fur and hair"; break;
		case 11: $stuff = conditionType(iron) . "" . steelMaker() . " hammer head"; break;
		case 12: $stuff = conditionType(iron) . "" . steelMaker() . " dented pot"; break;
		case 13: $stuff = mt_rand(2,5) . " foot long " . conditionType(iron) . "iron bar"; break;
		case 14: $stuff = "blunt " . conditionType(iron) . "spear head"; break;
		case 15: $stuff = "leather boot"; break;
		case 16: $stuff = "scattered sticks"; break;
		case 17: $stuff = "areas with dried blood"; break;
		case 18: $stuff = conditionType(wood) . "pick handle"; break;
		case 19: $stuff = mt_rand(5,10) . " foot " . conditionType(wood) . "wood pole"; break;
		case 20: $stuff = "glass shards scattered around"; break;
		case 21: $stuff = conditionType(cloth) . "rags"; break;
		case 22: $stuff = mt_rand(10,50) . " foot " . conditionType(cloth) . " rope"; break;
		case 23: $stuff = "rubble and dirt scattered around"; break;
		case 24: $stuff = conditionType(item) . "" . PAbagCreator($map); break;
		case 25: $stuff = mt_rand(2,8) . " " . conditionType(iron) . "" . steelMaker() . " spikes"; break;
		case 26: $stuff = mt_rand(2,8) . " sticks scattered around"; break;
		case 27: $stuff = mt_rand(2,8) . " large stones scattered around"; break;
		case 28: $stuff = "pile of straw"; break;
		case 29: $stuff = "straw scattered around"; break;
		case 30: $stuff = conditionType(iron) . "sword blade"; break;
		case 31: $stuff = "scattered bits of bones and teeth"; break;
		case 32: $stuff = conditionType(item) . "torch"; break;
		case 33: $stuff = "small puddle of " . conditionType(water) . "water"; break;
		case 34: $stuff = "large puddle of " . conditionType(water) . "water"; break;
		case 35: $stuff = "small " . conditionType(iron) . "" . steelMaker() . " mirror"; break;
		case 36: $stuff = conditionType(iron) . "" . steelMaker() . " hand saw"; break;
		case 37: $stuff = mt_rand(2,10) . " pieces of " . conditionType(wood) . "wood"; break;
		case 38: $stuff = "bag of charcoal"; break;
		case 39: $stuff = conditionType(iron) . "" . steelMaker() . " bucket"; break;
		case 40: $stuff = mt_rand(2,10) . " sand bags"; break;
		case 41: $stuff = mt_rand(2,6) . " " . eggMaker(); break;
		case 42: $stuff = "metal gas can with 1 gallon of gasoline"; if (mt_rand(1,2) == 1){$stuff = "metal drum with 50 gallons of gasoline";} break;
		case 43: $stuff = conditionType(iron) . "" . steelMaker() . " pail"; break;
		case 44: $stuff = conditionType(wood) . "pallet"; break;
		case 45: $stuff = conditionType(iron) . "" . steelMaker() . " dented shield"; break;
		case 46: $stuff = "broken dinner plate"; break;
		case 47: $stuff = conditionType(iron) . "" . steelMaker() . " coat hook"; break;
		case 48: $stuff = "shredded and torn clothing"; break;
		case 49: $stuff = mt_rand(2,10) . " bandages"; if (mt_rand(1,2) == 1){$stuff = mt_rand(2,10) . " bloody bandages";}break;
		case 50: $stuff = conditionType(iron) . "" . steelMaker() . " trash can"; break;
		case 51: $stuff = "fire pit"; if (mt_rand(1,2) == 1){$stuff = "fire pit with ashes";} if (mt_rand(1,4) == 1){$stuff = "fire pit with wood";}break;
		case 52: $stuff = conditionType(wood) . "basket"; break;
		case 53: $stuff = conditionType(iron) . "" . steelMaker() . " bowl"; break;
		case 54: $stuff = conditionType(wood) . "whip"; break;
		case 55: $stuff = conditionType(wood) . "" . woodenType() . " brush"; break;
		case 56: $stuff = cageMaker(); break;
		case 57: $stuff = conditionType(iron) . "" . steelMaker() . " small bell"; break;
		case 58: $stuff = PApreciousChooser() . " candle stick worth " . mt_rand(2,100) . " " . $cash; break;
		case 59: $stuff = conditionType(wood) . "" . woodenType() . " cane"; break;
		case 60: $stuff = conditionType(iron) . "" . steelMaker() . " pliers"; break;
		case 61: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 62: $stuff = bottlePicker() . " of water"; break;
		case 63: $stuff = PApreciousChooser() . " music box worth " . mt_rand(2,100) . " " . $cash; break;
		case 64: $stuff = conditionType(cloth) . "" . candleColor(0) . " blanket"; break;
		case 65: $stuff = conditionType(iron) . "" . steelMaker() . " dented helmet with a " . PAheadoffMaker() . " still in it"; break;
		case 66: $stuff = mt_rand(2,10) . "0 feet of " . candleColor(0) . " yarn"; break;
		case 67: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 68: $stuff = PAashMaker(); break;
		case 69: $stuff = "a huge pile of various bones"; break;
		case 70: $stuff = "a large pile of rocks"; break;
		case 71: $stuff = conditionType(item) . "wall clock"; break;
		case 72: $stuff = PAcorpseMaker(); if (mt_rand(1,4) == 1){$stuff = AliencorpseMaker();} break;
		case 73: $stuff = conditionType(iron) . "" . steelMaker() . " tea pot"; break;
		case 74: $stuff = conditionType(iron) . "" . steelMaker() . " knife"; break;
		case 75: $stuff = "a " . mt_rand(1,4) . " foot wide hole that is about " . mt_rand(2,8) . " feet deep"; break;
		case 76: $stuff = conditionType(cloth) . "" . candleColor(0) . " washcloth"; break;
		case 77: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 78: $stuff = "small " . conditionType(iron) . "" . steelMaker() . " mirror"; break;
		case 79: $stuff = conditionType(iron) . "" . steelMaker() . " mug"; break;
		case 80: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 81: $stuff = "pile of dirt"; break;
		case 82: $stuff = conditionType(iron) . "" . steelMaker() . " pan"; break;
		case 83: $stuff = mt_rand(2,20) . " pieces of " . conditionType(paper) . " paper"; break;
		case 84: $stuff = conditionType(jar) . "glass pitcher"; break;
		case 85: $stuff = mt_rand(2,10) . "0 feet of wire"; break;
		case 86: $stuff = conditionType(item) . "smoking pipe"; break;
		case 87: $stuff = conditionType(iron) . "" . steelMaker() . " pot"; break;
		case 88: $stuff = "small bottle of cologne"; break;
		case 89: $stuff = conditionType(item) . "ink pen"; break;
		case 90: $stuff = conditionType(iron) . "" . steelMaker() . " rusty razor"; break;
		case 91: $stuff = "some " . footprintMaker() . " in various spots"; break;
		case 92: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 93: $stuff = conditionType(wood) . "wooden tray"; break;
		case 94: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 95: $stuff = conditionType(iron) . "" . steelMaker() . " spoon"; break;
		case 96: $stuff = conditionType(iron) . "" . steelMaker() . " pitcher"; break;
		case 97: $stuff = candleColor(0) . " thread (" . mt_rand(2,10) . "0 feet)"; break;
		case 98: $stuff = conditionType(wood) . "plaque"; break;
		case 99: $stuff = conditionType(cloth) . "" . candleColor(0) . " towel"; break;
		case 100: $stuff = PAnormalWeapons(1,3); break;
		case 101: $stuff = PAnormalArmor(1); break;
		case 102: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 103: $stuff = "a box of " . mt_rand(10,30) . " bullets"; break;
		case 104: $stuff = "a pack of " . mt_rand(2,8) . " batteries"; break;
		case 105: $stuff = PAnormalWeapons(1,3); break;
		case 106: $stuff = PAnormalWeapons(1,3); break;
		case 107: $stuff = PAnormalWeapons(1,3); break;
		case 108: $stuff = PAnormalWeapons(1,3); break;
		case 109: $stuff = PAnormalWeapons(1,3); break;
		case 110: $stuff = PAnormalWeapons(1,3); break;
		case 111: $stuff = PAnormalWeapons(1,3); break;
		case 112: $stuff = PAnormalWeapons(1,3); break;
		case 113: $stuff = PAnormalArmor(1); break;
		case 114: $stuff = PAnormalArmor(1); break;
		case 115: $stuff = PAnormalArmor(1); break;
		case 116: $stuff = PAnormalArmor(1); break;
		case 117: $stuff = PAnormalArmor(1); break;
		case 118: $stuff = PAnormalArmor(1); break;
		case 119: $stuff = PAnormalArmor(1); break;
		case 120: $stuff = PAnormalArmor(1); break;
		case 121: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 122: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 123: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 124: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 125: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 126: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 127: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 128: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 129: $stuff = PAmakeNormalItem(1,1,$cash,0,$game); break;
		case 130: $stuff = AliennormalWeapons(1,3); break;
		case 131: $stuff = AliennormalArmor(1); break;
		case 132: $stuff = PAGemMaker($cut,$cash); break;
	}
	return $stuff;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function PickJunk()
{
	switch (mt_rand(1,300))
	{
		case 1: $item_pa = "action figure"; $item_sf = "alien action figure"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 4; $item_val5 = 6; break;
		case 2: $item_pa = "address book, leather"; $item_sf = "computer pad, handheld"; $item_val1 = 2; $item_val2 = 4; $item_val3 = 5; $item_val4 = 8; $item_val5 = 12; break;
		case 3: $item_pa = "adhesive bandages, fabric, box of 30"; $item_sf = "adhesive bandages, fabric, box of 30"; $item_val1 = 0; $item_val2 = 0; $item_val3 = 0; $item_val4 = 1; $item_val5 = 1; break;
		case 4: $item_pa = "air compressor, electric, portable"; $item_sf = "air compressor, nuclear, portable"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 5: $item_pa = "air mattress"; $item_sf = "air mattress"; $item_val1 = 8; $item_val2 = 11; $item_val3 = 17; $item_val4 = 25; $item_val5 = 38; break;
		case 6: $item_pa = "air pump, manual"; $item_sf = "air pump, nuclear powered"; $item_val1 = 2; $item_val2 = 4; $item_val3 = 5; $item_val4 = 8; $item_val5 = 12; break;
		case 7: $item_pa = "air purifier"; $item_sf = "air purifier"; $item_val1 = 9; $item_val2 = 13; $item_val3 = 20; $item_val4 = 29; $item_val5 = 44; break;
		case 8: $item_pa = "answering machine"; $item_sf = "recording device, handheld"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 13; $item_val4 = 20; $item_val5 = 30; break;
		case 9: $item_pa = "antiseptic, bottle, 16 ounces"; $item_sf = "antiseptic, bottle, 16 ounces"; $item_val1 = 5; $item_val2 = 8; $item_val3 = 12; $item_val4 = 17; $item_val5 = 26; break;
		case 10: $item_pa = "audio cassette"; $item_sf = "computer cassette"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 11: $item_pa = "audio cd"; $item_sf = "audio cube, music"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 12: $item_pa = "baby bottle"; $item_sf = "feeding bottle"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 4; break;
		case 13: $item_pa = "baby monitor and receiver"; $item_sf = "remote audio monitor and receiver"; $item_val1 = 8; $item_val2 = 12; $item_val3 = 18; $item_val4 = 27; $item_val5 = 40; break;
		case 14: $item_pa = "baking pan"; $item_sf = "medical pan"; $item_val1 = 2; $item_val2 = 2; $item_val3 = 4; $item_val4 = 5; $item_val5 = 8; break;
		case 15: $item_pa = "bandage, large"; $item_sf = "bandage, large"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 4; $item_val5 = 6; break;
		case 16: $item_pa = "baseball"; $item_sf = "magnetic ball, small"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 1; $item_val4 = 2; $item_val5 = 3; break;
		case 17: $item_pa = "baseball glove"; $item_sf = "safety glove"; $item_val1 = 9; $item_val2 = 13; $item_val3 = 20; $item_val4 = 30; $item_val5 = 45; break;
		case 18: $item_pa = "basketball"; $item_sf = "anti-grav sports ball"; $item_val1 = 5; $item_val2 = 8; $item_val3 = 12; $item_val4 = 18; $item_val5 = 27; break;
		case 19: $item_pa = "bathroom scale"; $item_sf = "humanoid weight scale"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 13; $item_val4 = 20; $item_val5 = 30; break;
		case 20: $item_pa = "battery"; $item_sf = "battery"; $item_val1 = 2; $item_val2 = 4; $item_val3 = 5; $item_val4 = 8; $item_val5 = 12; break;
		case 21: $item_pa = "battery charger, solar powered"; $item_sf = "battery charger, solar powered"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 13; $item_val4 = 20; $item_val5 = 30; break;
		case 22: $item_pa = "bb gun"; $item_sf = "needle gun"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 13; $item_val4 = 20; $item_val5 = 30; break;
		case 23: $item_pa = "bb gun ammo, 1,000 in a carton"; $item_sf = "needle gun ammo, 1,000 in a carton"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 4; $item_val5 = 6; break;
		case 24: $item_pa = "bed sheet"; $item_sf = "bed sheet"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 7; $item_val4 = 10; $item_val5 = 15; break;
		case 25: $item_pa = "bell, small, metal"; $item_sf = "bell, small, metal"; $item_val1 = 0; $item_val2 = 1; $item_val3 = 1; $item_val4 = 1; $item_val5 = 2; break;
		case 26: $item_pa = "bicycle"; $item_sf = "hover board"; $item_val1 = 18; $item_val2 = 27; $item_val3 = 40; $item_val4 = 60; $item_val5 = 90; break;
		case 27: $item_pa = "bicycle basket"; $item_sf = "syringe waste basket"; $item_val1 = 7; $item_val2 = 10; $item_val3 = 16; $item_val4 = 23; $item_val5 = 35; break;
		case 28: $item_pa = "bicycle bell"; $item_sf = "animal whistle"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 29: $item_pa = "bicycle helmet"; $item_sf = "hover board safety helmet"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 30: $item_pa = "binoculars"; $item_sf = "binoculars"; $item_val1 = 7; $item_val2 = 10; $item_val3 = 16; $item_val4 = 23; $item_val5 = 35; break;
		case 31: $item_pa = "blood pressure cuff"; $item_sf = "blood pressure cuff"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 7; $item_val4 = 11; $item_val5 = 16; break;
		case 32: $item_pa = "board game"; $item_sf = "board game"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 7; $item_val4 = 11; $item_val5 = 16; break;
		case 33: $item_pa = "book"; $item_sf = "electronic book"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 34: $item_pa = "bowling ball"; $item_sf = "magnetic ball, sports"; $item_val1 = 12; $item_val2 = 18; $item_val3 = 27; $item_val4 = 40; $item_val5 = 60; break;
		case 35: $item_pa = "bowling pin"; $item_sf = "hover ball, sports"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 5; break;
		case 36: $item_pa = "box cutter, folding"; $item_sf = "laser scalpel"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 13; $item_val4 = 19; $item_val5 = 29; break;
		case 37: $item_pa = "box, fire/water proof, with key"; $item_sf = "box, fire/water proof, with key"; $item_val1 = 7; $item_val2 = 10; $item_val3 = 16; $item_val4 = 23; $item_val5 = 35; break;
		case 38: $item_pa = "boxing gloves"; $item_sf = "combat gloves, padded"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 14; $item_val5 = 21; break;
		case 39: $item_pa = "broom"; $item_sf = "broom"; $item_val1 = 2; $item_val2 = 2; $item_val3 = 4; $item_val4 = 5; $item_val5 = 8; break;
		case 40: $item_pa = "bug zapper"; $item_sf = "bug zapper"; $item_val1 = 9; $item_val2 = 13; $item_val3 = 20; $item_val4 = 30; $item_val5 = 45; break;
		case 41: $item_pa = "cable cutting pliers"; $item_sf = "cable cutting pliers"; $item_val1 = 2; $item_val2 = 2; $item_val3 = 4; $item_val4 = 5; $item_val5 = 8; break;
		case 42: $item_pa = "cable ties, bag of 100"; $item_sf = "cable ties, bag of 100"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 43: $item_pa = "calculator, solar"; $item_sf = "calculator, solar"; $item_val1 = 4; $item_val2 = 7; $item_val3 = 10; $item_val4 = 15; $item_val5 = 22; break;
		case 44: $item_pa = "camera, digital"; $item_sf = "camera, digital"; $item_val1 = 99; $item_val2 = 148; $item_val3 = 222; $item_val4 = 333; $item_val5 = 500; break;
		case 45: $item_pa = "camera, IR, wireless"; $item_sf = "camera, IR, wireless"; $item_val1 = 40; $item_val2 = 59; $item_val3 = 89; $item_val4 = 133; $item_val5 = 200; break;
		case 46: $item_pa = "camping tent, 8 person"; $item_sf = "camping tent, 8 person"; $item_val1 = 20; $item_val2 = 30; $item_val3 = 44; $item_val4 = 67; $item_val5 = 100; break;
		case 47: $item_pa = "can opener, electric"; $item_sf = "can opener, thermal"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 7; $item_val4 = 11; $item_val5 = 16; break;
		case 48: $item_pa = "can opener, hand operated"; $item_sf = "can opener, hand operated"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 49: $item_pa = "candle"; $item_sf = "light stick, small"; $item_val1 = 2; $item_val2 = 2; $item_val3 = 4; $item_val4 = 5; $item_val5 = 8; break;
		case 50: $item_pa = "cane"; $item_sf = "cane"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 6; $item_val5 = 9; break;
		case 51: $item_pa = "carbon monoxide detector"; $item_sf = "carbon monoxide detector"; $item_val1 = 8; $item_val2 = 12; $item_val3 = 18; $item_val4 = 27; $item_val5 = 40; break;
		case 52: $item_pa = "cart, dolly"; $item_sf = "anti-grav cart, small"; $item_val1 = 25; $item_val2 = 37; $item_val3 = 56; $item_val4 = 83; $item_val5 = 125; break;
		case 53: $item_pa = "cash box, metal, with key"; $item_sf = "security box, metal, with key"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 54: $item_pa = "caution tape, 500 feet"; $item_sf = "biohazard warning tape, 500 feet"; $item_val1 = 2; $item_val2 = 2; $item_val3 = 4; $item_val4 = 5; $item_val5 = 8; break;
		case 55: $item_pa = "c-clamp"; $item_sf = "c-clamp"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 1; $item_val4 = 2; $item_val5 = 3; break;
		case 56: $item_pa = "cellular phone"; $item_sf = "communicator, handheld"; $item_val1 = 34; $item_val2 = 50; $item_val3 = 76; $item_val4 = 113; $item_val5 = 170; break;
		case 57: $item_pa = "ceramic bowl"; $item_sf = "metal bowl"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 58: $item_pa = "chemical suit, encapsulated"; $item_sf = "chemical suit, encapsulated"; $item_val1 = 202; $item_val2 = 303; $item_val3 = 454; $item_val4 = 681; $item_val5 = 1; break;
		case 59: $item_pa = "chisel"; $item_sf = "forceps"; $item_val1 = 2; $item_val2 = 2; $item_val3 = 4; $item_val4 = 5; $item_val5 = 8; break;
		case 60: $item_pa = "circular saw"; $item_sf = "bone saw"; $item_val1 = 10; $item_val2 = 15; $item_val3 = 22; $item_val4 = 33; $item_val5 = 50; break;
		case 61: $item_pa = "claw hammer"; $item_sf = "rock hammer"; $item_val1 = 2; $item_val2 = 2; $item_val3 = 4; $item_val4 = 5; $item_val5 = 8; break;
		case 62: $item_pa = "clip lamp"; $item_sf = "clip lamp"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 63: $item_pa = "clock, digital, radio"; $item_sf = "digital time device, small"; $item_val1 = 5; $item_val2 = 8; $item_val3 = 12; $item_val4 = 18; $item_val5 = 27; break;
		case 64: $item_pa = "clothes iron, electric"; $item_sf = "6 inch heating cube"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 65: $item_pa = "coffee maker, 1 cup, electric"; $item_sf = "beverage condenser, 1 cup, thermal"; $item_val1 = 4; $item_val2 = 5; $item_val3 = 8; $item_val4 = 12; $item_val5 = 18; break;
		case 66: $item_pa = "comforter"; $item_sf = "thermal blanket"; $item_val1 = 8; $item_val2 = 12; $item_val3 = 18; $item_val4 = 27; $item_val5 = 40; break;
		case 67: $item_pa = "comic book"; $item_sf = "computer pad, handheld, children stories"; $item_val1 = 0; $item_val2 = 1; $item_val3 = 1; $item_val4 = 1; $item_val5 = 2; break;
		case 68: $item_pa = "computer mouse, wired"; $item_sf = "computer diagnostic tool, wired"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 6; $item_val4 = 9; $item_val5 = 14; break;
		case 69: $item_pa = "computer mouse, wireless"; $item_sf = "computer diagnostic tool, wireless"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 14; $item_val4 = 21; $item_val5 = 32; break;
		case 70: $item_pa = "computer speakers"; $item_sf = "computer access card"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 6; $item_val4 = 9; $item_val5 = 13; break;
		case 71: $item_pa = "controller, video game"; $item_sf = "neural video game interface"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 72: $item_pa = "cooler, wheeled, 50 quart"; $item_sf = "food preserver, wheeled, 50 quart"; $item_val1 = 9; $item_val2 = 14; $item_val3 = 20; $item_val4 = 31; $item_val5 = 46; break;
		case 73: $item_pa = "crayons, 15 colors"; $item_sf = "markers, 15 colors"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 1; $item_val4 = 2; $item_val5 = 3; break;
		case 74: $item_pa = "crescent wrench"; $item_sf = "crescent wrench"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 6; $item_val4 = 9; $item_val5 = 14; break;
		case 75: $item_pa = "crimping tool"; $item_sf = "crimping tool"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 7; $item_val4 = 10; $item_val5 = 15; break;
		case 76: $item_pa = "crowbar"; $item_sf = "crowbar"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 6; $item_val4 = 9; $item_val5 = 13; break;
		case 77: $item_pa = "crutch, aluminum"; $item_sf = "crutch, aluminum"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 13; $item_val4 = 20; $item_val5 = 30; break;
		case 78: $item_pa = "cuckoo clock"; $item_sf = "time device, wall mounted"; $item_val1 = 55; $item_val2 = 82; $item_val3 = 123; $item_val4 = 185; $item_val5 = 277; break;
		case 79: $item_pa = "cup cake pan, metal"; $item_sf = "surgical pan, metal"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 5; $item_val4 = 7; $item_val5 = 11; break;
		case 80: $item_pa = "desk lamp"; $item_sf = "desk lamp"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 8; $item_val4 = 11; $item_val5 = 17; break;
		case 81: $item_pa = "desk stapler"; $item_sf = "medical stapler"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 4; $item_val5 = 6; break;
		case 82: $item_pa = "digital music player (8GB with cable)"; $item_sf = "music player, 6 inch cube"; $item_val1 = 40; $item_val2 = 61; $item_val3 = 91; $item_val4 = 137; $item_val5 = 205; break;
		case 83: $item_pa = "digital thermometer, cooking"; $item_sf = "thermometer, wireless"; $item_val1 = 4; $item_val2 = 5; $item_val3 = 8; $item_val4 = 12; $item_val5 = 18; break;
		case 84: $item_pa = "dog bowl"; $item_sf = "animal food bowl, metal"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 85: $item_pa = "dog collar, nylon"; $item_sf = "animal collar, nylon"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 5; $item_val5 = 7; break;
		case 86: $item_pa = "dog collar, spiked"; $item_sf = "animal collar, spiked"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 13; $item_val4 = 19; $item_val5 = 29; break;
		case 87: $item_pa = "drill bits, 20 bits"; $item_sf = "drill bits, 20 bits"; $item_val1 = 11; $item_val2 = 16; $item_val3 = 24; $item_val4 = 36; $item_val5 = 54; break;
		case 88: $item_pa = "drill, electric"; $item_sf = "drill, sonic"; $item_val1 = 28; $item_val2 = 41; $item_val3 = 62; $item_val4 = 93; $item_val5 = 140; break;
		case 89: $item_pa = "drill, hand crank"; $item_sf = "drill, plasma"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 90: $item_pa = "duct tape, 100 feet"; $item_sf = "adhesive tape, 100 feet"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 91: $item_pa = "dust pan"; $item_sf = "autopsy pan"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 4; break;
		case 92: $item_pa = "DVD blank"; $item_sf = "recording cube, blank"; $item_val1 = 0; $item_val2 = 0; $item_val3 = 0; $item_val4 = 1; $item_val5 = 1; break;
		case 93: $item_pa = "DVD movie"; $item_sf = "recording cube, with odd video"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 94: $item_pa = "electric kettle"; $item_sf = "solar cooking pan"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 8; $item_val4 = 11; $item_val5 = 17; break;
		case 95: $item_pa = "electric sander"; $item_sf = "plasma metal smoother"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 96: $item_pa = "electrical extension cord, 10 feet"; $item_sf = "power cable, 10 feet"; $item_val1 = 0; $item_val2 = 0; $item_val3 = 0; $item_val4 = 0; $item_val5 = 0; break;
		case 97: $item_pa = "electrical tape, 100 feet"; $item_sf = "surgical tape, 100 feet"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 6; $item_val4 = 9; $item_val5 = 14; break;
		case 98: $item_pa = "electronics cable, 5 feet"; $item_sf = "electronics cable, 5 feet"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 5; break;
		case 99: $item_pa = "etch-a-sketch"; $item_sf = "electronic sketch pad"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 7; $item_val4 = 10; $item_val5 = 15; break;
		case 100: $item_pa = "fan, 18 inch"; $item_sf = "fan, 18 inch"; $item_val1 = 10; $item_val2 = 16; $item_val3 = 24; $item_val4 = 35; $item_val5 = 53; break;
		case 101: $item_pa = "fax machine"; $item_sf = "electric text transmitter, handheld"; $item_val1 = 8; $item_val2 = 12; $item_val3 = 18; $item_val4 = 27; $item_val5 = 40; break;
		case 102: $item_pa = "fire escape ladder, portable"; $item_sf = "anti-grav ladder, portable"; $item_val1 = 15; $item_val2 = 22; $item_val3 = 33; $item_val4 = 50; $item_val5 = 75; break;
		case 103: $item_pa = "fire extinguisher"; $item_sf = "fire extinguisher"; $item_val1 = 7; $item_val2 = 11; $item_val3 = 16; $item_val4 = 24; $item_val5 = 36; break;
		case 104: $item_pa = "first aid kit"; $item_sf = "first aid kit"; $item_val1 = 7; $item_val2 = 10; $item_val3 = 16; $item_val4 = 23; $item_val5 = 35; break;
		case 105: $item_pa = "first aid tape, 20 feet"; $item_sf = "first aid tape, 20 feet"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 1; $item_val4 = 2; $item_val5 = 3; break;
		case 106: $item_pa = "fish bowl"; $item_sf = "aquatic animal bowl"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 5; $item_val4 = 7; $item_val5 = 11; break;
		case 107: $item_pa = "fishfinder, electric"; $item_sf = "life form detector, electric"; $item_val1 = 89; $item_val2 = 133; $item_val3 = 200; $item_val4 = 300; $item_val5 = 450; break;
		case 108: $item_pa = "fishing hooks, box of 20"; $item_sf = "aquatic animal food, can"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 1; $item_val4 = 2; $item_val5 = 3; break;
		case 109: $item_pa = "fishing pole"; $item_sf = "animal stun pole"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 14; $item_val5 = 21; break;
		case 110: $item_pa = "flashlight"; $item_sf = "light rod"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 5; $item_val4 = 7; $item_val5 = 11; break;
		case 111: $item_pa = "floss, 20 foot roll"; $item_sf = "thin wire, 20 foot roll"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 4; break;
		case 112: $item_pa = "flute"; $item_sf = "oddly shaped flute"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 4; $item_val5 = 6; break;
		case 113: $item_pa = "folding shovel"; $item_sf = "folding shovel"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 114: $item_pa = "food blender"; $item_sf = "food liquefier"; $item_val1 = 14; $item_val2 = 21; $item_val3 = 31; $item_val4 = 47; $item_val5 = 70; break;
		case 115: $item_pa = "frisbee"; $item_sf = "magnetic sports disk"; $item_val1 = 4; $item_val2 = 5; $item_val3 = 8; $item_val4 = 12; $item_val5 = 18; break;
		case 116: $item_pa = "frying pan"; $item_sf = "solar heating disk"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 7; $item_val4 = 11; $item_val5 = 16; break;
		case 117: $item_pa = "funnel, metal"; $item_sf = "funnel, metal"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 6; $item_val4 = 9; $item_val5 = 13; break;
		case 118: $item_pa = "garden hoe"; $item_sf = "gardening tool"; $item_val1 = 6; $item_val2 = 8; $item_val3 = 12; $item_val4 = 19; $item_val5 = 28; break;
		case 119: $item_pa = "garden hose, 100 feet"; $item_sf = "liquid hose, 100 feet"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 120: $item_pa = "gas can, 1 gallon"; $item_sf = "flammable liquid, 1 gallon can"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 7; $item_val4 = 10; $item_val5 = 15; break;
		case 121: $item_pa = "glasses"; $item_sf = "tinted goggles"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 8; $item_val4 = 11; $item_val5 = 17; break;
		case 122: $item_pa = "globe"; $item_sf = "globe of an unknown planet"; $item_val1 = 9; $item_val2 = 13; $item_val3 = 20; $item_val4 = 30; $item_val5 = 45; break;
		case 123: $item_pa = "golf ball"; $item_sf = "hover ball, sports"; $item_val1 = 0; $item_val2 = 0; $item_val3 = 0; $item_val4 = 1; $item_val5 = 1; break;
		case 124: $item_pa = "golf club"; $item_sf = "racket, hover ball"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 125: $item_pa = "golf tees, bag of 400"; $item_sf = "medical staples, box of 400"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 126: $item_pa = "GPS navigator, handheld"; $item_sf = "global navigator, handheld"; $item_val1 = 100; $item_val2 = 151; $item_val3 = 226; $item_val4 = 339; $item_val5 = 508; break;
		case 127: $item_pa = "grill, portable"; $item_sf = "heating cylinder, 1 foot tall"; $item_val1 = 26; $item_val2 = 39; $item_val3 = 58; $item_val4 = 87; $item_val5 = 130; break;
		case 128: $item_pa = "grout, 1 gallon"; $item_sf = "metal sealer, 1 gallon"; $item_val1 = 16; $item_val2 = 24; $item_val3 = 36; $item_val4 = 53; $item_val5 = 80; break;
		case 129: $item_pa = "guitar, wooden"; $item_sf = "stringed instrument, alien"; $item_val1 = 12; $item_val2 = 18; $item_val3 = 27; $item_val4 = 40; $item_val5 = 60; break;
		case 130: $item_pa = "gym bag"; $item_sf = "sports bag"; $item_val1 = 7; $item_val2 = 10; $item_val3 = 15; $item_val4 = 23; $item_val5 = 34; break;
		case 131: $item_pa = "hair brush"; $item_sf = "hair brush"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 5; $item_val5 = 7; break;
		case 132: $item_pa = "hair curler"; $item_sf = "thermal hair colorer"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 7; $item_val4 = 11; $item_val5 = 16; break;
		case 133: $item_pa = "hair dryer"; $item_sf = "sonic hair dryer"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 13; $item_val4 = 19; $item_val5 = 29; break;
		case 134: $item_pa = "hair trimmer"; $item_sf = "laser hair trimmer"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 135: $item_pa = "hammock"; $item_sf = "hammock, anti-grav"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 136: $item_pa = "hand mirror"; $item_sf = "hand mirror"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 137: $item_pa = "hand saw"; $item_sf = "hand saw"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 6; $item_val4 = 9; $item_val5 = 14; break;
		case 138: $item_pa = "hand torch"; $item_sf = "hand lamp"; $item_val1 = 15; $item_val2 = 23; $item_val3 = 34; $item_val4 = 51; $item_val5 = 77; break;
		case 139: $item_pa = "hard drive 500GB, external, with cable"; $item_sf = "data storage cube"; $item_val1 = 14; $item_val2 = 21; $item_val3 = 31; $item_val4 = 47; $item_val5 = 70; break;
		case 140: $item_pa = "head phones"; $item_sf = "audio amplifier, ear bud"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 8; $item_val4 = 11; $item_val5 = 17; break;
		case 141: $item_pa = "headlight, LED"; $item_sf = "vehicle light, plasma"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 142: $item_pa = "hedge shears"; $item_sf = "gardening cutter, laser"; $item_val1 = 5; $item_val2 = 8; $item_val3 = 12; $item_val4 = 17; $item_val5 = 26; break;
		case 143: $item_pa = "hedge trimmer, electric"; $item_sf = "tree cutter, plasma"; $item_val1 = 18; $item_val2 = 27; $item_val3 = 40; $item_val4 = 60; $item_val5 = 90; break;
		case 144: $item_pa = "hockey stick"; $item_sf = "combat stick, sports"; $item_val1 = 10; $item_val2 = 15; $item_val3 = 22; $item_val4 = 33; $item_val5 = 50; break;
		case 145: $item_pa = "holiday lights, 50 feet"; $item_sf = "fiber optic cable, 50 feet"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 146: $item_pa = "home stereo receiver"; $item_sf = "small motion sensor"; $item_val1 = 35; $item_val2 = 53; $item_val3 = 79; $item_val4 = 119; $item_val5 = 178; break;
		case 147: $item_pa = "humidifier, 1 gallon"; $item_sf = "humidifier, 1 gallon"; $item_val1 = 8; $item_val2 = 12; $item_val3 = 18; $item_val4 = 27; $item_val5 = 40; break;
		case 148: $item_pa = "ice cream maker, 1.5 quart"; $item_sf = "liquid freezing bottle"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 149: $item_pa = "indoor grill"; $item_sf = "heating cylinder, 3 feet tall"; $item_val1 = 13; $item_val2 = 19; $item_val3 = 28; $item_val4 = 43; $item_val5 = 64; break;
		case 150: $item_pa = "inflatable tube, riding"; $item_sf = "anti-grav replacement pad"; $item_val1 = 4; $item_val2 = 5; $item_val3 = 8; $item_val4 = 12; $item_val5 = 18; break;
		case 151: $item_pa = "juice maker, 1 quart"; $item_sf = "water purifier, 1 quart"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 152: $item_pa = "jump starter, portable"; $item_sf = "plasma jolter, portable"; $item_val1 = 18; $item_val2 = 27; $item_val3 = 40; $item_val4 = 60; $item_val5 = 90; break;
		case 153: $item_pa = "kayak with paddle"; $item_sf = "hydro-sled with paddle"; $item_val1 = 109; $item_val2 = 163; $item_val3 = 244; $item_val4 = 367; $item_val5 = 550; break;
		case 154: $item_pa = "keyboard, wired"; $item_sf = "computer access pad, wired"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 155: $item_pa = "keyboard, wireless"; $item_sf = "computer access pad, wireless"; $item_val1 = 14; $item_val2 = 21; $item_val3 = 31; $item_val4 = 47; $item_val5 = 70; break;
		case 156: $item_pa = "kick scooter"; $item_sf = "anti-grav scooter"; $item_val1 = 5; $item_val2 = 8; $item_val3 = 12; $item_val4 = 18; $item_val5 = 27; break;
		case 157: $item_pa = "kitchen utensil"; $item_sf = "eating utensil"; $item_val1 = 0; $item_val2 = 1; $item_val3 = 1; $item_val4 = 1; $item_val5 = 2; break;
		case 158: $item_pa = "lantern, electric"; $item_sf = "lantern, gaseous"; $item_val1 = 7; $item_val2 = 10; $item_val3 = 16; $item_val4 = 23; $item_val5 = 35; break;
		case 159: $item_pa = "lantern, propane"; $item_sf = "lantern, plasma"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 160: $item_pa = "laptop bag, nylon"; $item_sf = "tool bag, nylon"; $item_val1 = 8; $item_val2 = 12; $item_val3 = 18; $item_val4 = 27; $item_val5 = 40; break;
		case 161: $item_pa = "laptop computer"; $item_sf = "folding computer"; $item_val1 = 198; $item_val2 = 296; $item_val3 = 444; $item_val4 = 667; $item_val5 = 1; break;
		case 162: $item_pa = "laser pointer"; $item_sf = "laser pointer"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 4; break;
		case 163: $item_pa = "laundry soap (liquid, bottle)"; $item_sf = "decon gel, bottle"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 5; $item_val4 = 7; $item_val5 = 11; break;
		case 164: $item_pa = "laundry soap (powder, box)"; $item_sf = "decon powder, can"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 6; $item_val5 = 9; break;
		case 165: $item_pa = "leaf blower, electric"; $item_sf = "sterilizer, ultra-violet"; $item_val1 = 14; $item_val2 = 21; $item_val3 = 31; $item_val4 = 47; $item_val5 = 70; break;
		case 166: $item_pa = "leaf blower, gasoline"; $item_sf = "sterilizer, plasma"; $item_val1 = 15; $item_val2 = 23; $item_val3 = 34; $item_val4 = 51; $item_val5 = 77; break;
		case 167: $item_pa = "level, i-beam, 48 inches"; $item_sf = "distance measuring tool, laser"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 16; $item_val5 = 24; break;
		case 168: $item_pa = "light bulb"; $item_sf = "light, glass tube"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 5; break;
		case 169: $item_pa = "lip stick"; $item_sf = "anti-bacteria stick, rubbing"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 6; $item_val4 = 9; $item_val5 = 13; break;
		case 170: $item_pa = "luggage, wheeled with handle"; $item_sf = "hover bag"; $item_val1 = 6; $item_val2 = 8; $item_val3 = 12; $item_val4 = 19; $item_val5 = 28; break;
		case 171: $item_pa = "lunchbox"; $item_sf = "food preserves, box"; $item_val1 = 4; $item_val2 = 5; $item_val3 = 8; $item_val4 = 12; $item_val5 = 18; break;
		case 172: $item_pa = "magazine"; $item_sf = "computer pad, with technical data"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 5; break;
		case 173: $item_pa = "mallet, rubber"; $item_sf = "metal coupler"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 174: $item_pa = "map"; $item_sf = "computer pad, with structure layout"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 10; $item_val4 = 15; $item_val5 = 23; break;
		case 175: $item_pa = "marker, permanent"; $item_sf = "acidic marker, permanent"; $item_val1 = 0; $item_val2 = 1; $item_val3 = 1; $item_val4 = 1; $item_val5 = 2; break;
		case 176: $item_pa = "mason chisel"; $item_sf = "ore chisel"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 7; $item_val4 = 10; $item_val5 = 15; break;
		case 177: $item_pa = "mason trowel"; $item_sf = "ore shovel"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 13; $item_val4 = 20; $item_val5 = 30; break;
		case 178: $item_pa = "meatloaf pan, metal"; $item_sf = "ore pan, metal"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 4; $item_val5 = 6; break;
		case 179: $item_pa = "metal detector"; $item_sf = "ore detector"; $item_val1 = 17; $item_val2 = 26; $item_val3 = 39; $item_val4 = 59; $item_val5 = 88; break;
		case 180: $item_pa = "metal hangar"; $item_sf = "metal hangar"; $item_val1 = 0; $item_val2 = 0; $item_val3 = 0; $item_val4 = 1; $item_val5 = 1; break;
		case 181: $item_pa = "metal pot with lid, 6 quart"; $item_sf = "metal pot with lid, 6 quart"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 13; $item_val4 = 20; $item_val5 = 30; break;
		case 182: $item_pa = "microwave bowl with lid"; $item_sf = "hard plastic bowl with lid"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 4; $item_val5 = 6; break;
		case 183: $item_pa = "microwave oven"; $item_sf = "microwave unit"; $item_val1 = 14; $item_val2 = 21; $item_val3 = 31; $item_val4 = 47; $item_val5 = 70; break;
		case 184: $item_pa = "model airplane"; $item_sf = "model spaceship"; $item_val1 = 4; $item_val2 = 7; $item_val3 = 10; $item_val4 = 15; $item_val5 = 22; break;
		case 185: $item_pa = "model car"; $item_sf = "model space station"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 186: $item_pa = "motion sensor, wall mounted"; $item_sf = "motion sensor, wall mounted"; $item_val1 = 4; $item_val2 = 5; $item_val3 = 8; $item_val4 = 12; $item_val5 = 18; break;
		case 187: $item_pa = "multitool"; $item_sf = "multitool"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 188: $item_pa = "nail polish"; $item_sf = "medical glue, tube"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 5; $item_val5 = 7; break;
		case 189: $item_pa = "nails, box of 2,000"; $item_sf = "thermal nails, box of 2,000"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 14; $item_val5 = 21; break;
		case 190: $item_pa = "nylon leash"; $item_sf = "nylon leash"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 5; $item_val5 = 7; break;
		case 191: $item_pa = "office chair"; $item_sf = "hard plastic chair"; $item_val1 = 7; $item_val2 = 11; $item_val3 = 16; $item_val4 = 24; $item_val5 = 36; break;
		case 192: $item_pa = "padlock, combination"; $item_sf = "padlock, keypad"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 6; $item_val4 = 9; $item_val5 = 14; break;
		case 193: $item_pa = "paint brush"; $item_sf = "ore brush"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 5; $item_val4 = 7; $item_val5 = 11; break;
		case 194: $item_pa = "paint scraper"; $item_sf = "ore scraper"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 5; $item_val4 = 7; $item_val5 = 11; break;
		case 195: $item_pa = "paper towel"; $item_sf = "heated towel"; $item_val1 = 0; $item_val2 = 1; $item_val3 = 1; $item_val4 = 1; $item_val5 = 2; break;
		case 196: $item_pa = "paper, pad, adhesive, 3x3 inch, 100 sheets"; $item_sf = "small vocal recorder"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 7; $item_val4 = 11; $item_val5 = 16; break;
		case 197: $item_pa = "pedometer, digital"; $item_sf = "personal locator device"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 8; $item_val4 = 11; $item_val5 = 17; break;
		case 198: $item_pa = "pen, ink"; $item_sf = "pen, organic surfaces"; $item_val1 = 0; $item_val2 = 1; $item_val3 = 1; $item_val4 = 1; $item_val5 = 2; break;
		case 199: $item_pa = "pencil sharpener, electric"; $item_sf = "pen, metal surfaces"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 200: $item_pa = "pencil sharpener, plastic"; $item_sf = "pen, glass surfaces"; $item_val1 = 0; $item_val2 = 1; $item_val3 = 1; $item_val4 = 1; $item_val5 = 2; break;
		case 201: $item_pa = "penlight"; $item_sf = "penlight"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 16; $item_val5 = 24; break;
		case 202: $item_pa = "pet crate/cage"; $item_sf = "small animal crate/cage"; $item_val1 = 9; $item_val2 = 14; $item_val3 = 21; $item_val4 = 32; $item_val5 = 48; break;
		case 203: $item_pa = "phone, wired"; $item_sf = "communicator, wired"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 204: $item_pa = "phone, wireless"; $item_sf = "communicator, wireless"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 205: $item_pa = "picture frame"; $item_sf = "digital picture frame"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 5; break;
		case 206: $item_pa = "pill organizer, plastic"; $item_sf = "insect organizer, plastic"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 1; $item_val4 = 2; $item_val5 = 3; break;
		case 207: $item_pa = "pipe thread tape, 100 feet"; $item_sf = "organic tape, 100 feet"; $item_val1 = 2; $item_val2 = 2; $item_val3 = 4; $item_val4 = 5; $item_val5 = 8; break;
		case 208: $item_pa = "pizza pan, metal"; $item_sf = "food tray, metal"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 209: $item_pa = "plastic bowl, with lid"; $item_sf = "plastic bowl, with lid"; $item_val1 = 0; $item_val2 = 0; $item_val3 = 0; $item_val4 = 1; $item_val5 = 1; break;
		case 210: $item_pa = "plastic jug, 1 gallon"; $item_sf = "plastic jug, 1 gallon"; $item_val1 = 0; $item_val2 = 1; $item_val3 = 1; $item_val4 = 1; $item_val5 = 2; break;
		case 211: $item_pa = "plastic recycle bin"; $item_sf = "plastic waste bin"; $item_val1 = 9; $item_val2 = 13; $item_val3 = 20; $item_val4 = 30; $item_val5 = 45; break;
		case 212: $item_pa = "pliers"; $item_sf = "pliers"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 7; $item_val4 = 11; $item_val5 = 16; break;
		case 213: $item_pa = "plunger, toilet"; $item_sf = "suction tube, venom"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 214: $item_pa = "pool cue"; $item_sf = "5 foot metal rod"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 6; $item_val4 = 9; $item_val5 = 13; break;
		case 215: $item_pa = "popcorn maker, hot air"; $item_sf = "chemical liquid heater"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 216: $item_pa = "portable heater"; $item_sf = "portable heater"; $item_val1 = 96; $item_val2 = 144; $item_val3 = 216; $item_val4 = 324; $item_val5 = 486; break;
		case 217: $item_pa = "power sprayer, 1 gallon"; $item_sf = "decon sprayer, 1 gallon"; $item_val1 = 8; $item_val2 = 12; $item_val3 = 19; $item_val4 = 28; $item_val5 = 42; break;
		case 218: $item_pa = "printer, uses ink"; $item_sf = "console reader, handheld"; $item_val1 = 32; $item_val2 = 47; $item_val3 = 71; $item_val4 = 107; $item_val5 = 160; break;
		case 219: $item_pa = "pump oiler, quarter pint"; $item_sf = "pump oiler, quarter pint"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 4; break;
		case 220: $item_pa = "raft, inflatable"; $item_sf = "raft, inflatable"; $item_val1 = 39; $item_val2 = 58; $item_val3 = 88; $item_val4 = 131; $item_val5 = 197; break;
		case 221: $item_pa = "ratchet/socket set"; $item_sf = "ratchet/socket set"; $item_val1 = 7; $item_val2 = 11; $item_val3 = 16; $item_val4 = 24; $item_val5 = 36; break;
		case 222: $item_pa = "refrigerator/freezer, small"; $item_sf = "refrigerator/freezer, small"; $item_val1 = 14; $item_val2 = 21; $item_val3 = 31; $item_val4 = 47; $item_val5 = 70; break;
		case 223: $item_pa = "revolving warning light, red"; $item_sf = "revolving warning light, red"; $item_val1 = 4; $item_val2 = 5; $item_val3 = 8; $item_val4 = 12; $item_val5 = 18; break;
		case 224: $item_pa = "roller skates"; $item_sf = "magnetic boots"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 8; $item_val4 = 11; $item_val5 = 17; break;
		case 225: $item_pa = "sander, electric"; $item_sf = "glass buffer, thermal"; $item_val1 = 4; $item_val2 = 7; $item_val3 = 10; $item_val4 = 15; $item_val5 = 22; break;
		case 226: $item_pa = "sandals"; $item_sf = "boots"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 6; $item_val5 = 9; break;
		case 227: $item_pa = "saw blade, circular"; $item_sf = "saw blade, circular"; $item_val1 = 8; $item_val2 = 12; $item_val3 = 18; $item_val4 = 27; $item_val5 = 40; break;
		case 228: $item_pa = "scale (10 lbs.)"; $item_sf = "scale (10 lbs.)"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 7; $item_val4 = 10; $item_val5 = 15; break;
		case 229: $item_pa = "scissor jack"; $item_sf = "scissor jack"; $item_val1 = 4; $item_val2 = 7; $item_val3 = 10; $item_val4 = 15; $item_val5 = 22; break;
		case 230: $item_pa = "scissors"; $item_sf = "scissors"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 6; $item_val5 = 9; break;
		case 231: $item_pa = "scope, rifle"; $item_sf = "scope, rifle"; $item_val1 = 40; $item_val2 = 59; $item_val3 = 89; $item_val4 = 133; $item_val5 = 200; break;
		case 232: $item_pa = "sewing machine"; $item_sf = "tranquilizer gun"; $item_val1 = 40; $item_val2 = 59; $item_val3 = 89; $item_val4 = 133; $item_val5 = 200; break;
		case 233: $item_pa = "sewing needle"; $item_sf = "tranquilizer gun ammo, 10 each"; $item_val1 = 0; $item_val2 = 0; $item_val3 = 0; $item_val4 = 1; $item_val5 = 1; break;
		case 234: $item_pa = "shock collar with remote"; $item_sf = "shock collar with remote"; $item_val1 = 20; $item_val2 = 30; $item_val3 = 44; $item_val4 = 67; $item_val5 = 100; break;
		case 235: $item_pa = "shower curtain"; $item_sf = "radiation curtain"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 7; $item_val4 = 11; $item_val5 = 16; break;
		case 236: $item_pa = "skis, snow"; $item_sf = "snow boots, heated"; $item_val1 = 55; $item_val2 = 83; $item_val3 = 124; $item_val4 = 187; $item_val5 = 280; break;
		case 237: $item_pa = "sleeping bag"; $item_sf = "heated sleeping bag"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 238: $item_pa = "slow cooker"; $item_sf = "food warming disk"; $item_val1 = 14; $item_val2 = 21; $item_val3 = 31; $item_val4 = 47; $item_val5 = 70; break;
		case 239: $item_pa = "smoke detector"; $item_sf = "smoke detector"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 14; $item_val5 = 21; break;
		case 240: $item_pa = "sneakers"; $item_sf = "welding goggles"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 7; $item_val4 = 10; $item_val5 = 15; break;
		case 241: $item_pa = "snow board"; $item_sf = "thermal jacket"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 242: $item_pa = "socket set"; $item_sf = "socket set"; $item_val1 = 4; $item_val2 = 5; $item_val3 = 8; $item_val4 = 12; $item_val5 = 18; break;
		case 243: $item_pa = "spark plug"; $item_sf = "plasma battery"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 4; $item_val5 = 6; break;
		case 244: $item_pa = "spotlight, handheld"; $item_sf = "spotlight, handheld"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 13; $item_val4 = 20; $item_val5 = 30; break;
		case 245: $item_pa = "spray cleaner"; $item_sf = "spray cleaner"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 5; $item_val5 = 7; break;
		case 246: $item_pa = "spray paint"; $item_sf = "spray paint"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 4; break;
		case 247: $item_pa = "sprayer, 1 gallon"; $item_sf = "sprayer, 1 gallon"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 6; $item_val4 = 9; $item_val5 = 13; break;
		case 248: $item_pa = "spring clamp, metal"; $item_sf = "spring clamp, metal"; $item_val1 = 8; $item_val2 = 12; $item_val3 = 19; $item_val4 = 28; $item_val5 = 42; break;
		case 249: $item_pa = "staple gun"; $item_sf = "plasma sealer gun"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 7; $item_val4 = 10; $item_val5 = 15; break;
		case 250: $item_pa = "staples, box, 5,000"; $item_sf = "plasma blobs, box, 5,000 (for plasma sealer gun)"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 5; break;
		case 251: $item_pa = "stethoscope"; $item_sf = "stethoscope"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 252: $item_pa = "stop watch, digital"; $item_sf = "time tracker, handheld"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 7; $item_val4 = 10; $item_val5 = 15; break;
		case 253: $item_pa = "storage chest"; $item_sf = "storage chest"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 254: $item_pa = "stove, portable, gas"; $item_sf = "stove, portable, nuclear"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 8; $item_val4 = 13; $item_val5 = 19; break;
		case 255: $item_pa = "strainer, metal"; $item_sf = "strainer, metal"; $item_val1 = 7; $item_val2 = 10; $item_val3 = 16; $item_val4 = 23; $item_val5 = 35; break;
		case 256: $item_pa = "strap, ratchet, 30 feet"; $item_sf = "strap, ratchet, 30 feet"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 257: $item_pa = "surge protector, 8 outlets"; $item_sf = "surge suppressor clamp"; $item_val1 = 7; $item_val2 = 10; $item_val3 = 16; $item_val4 = 23; $item_val5 = 35; break;
		case 258: $item_pa = "surgical gloves"; $item_sf = "surgical gloves"; $item_val1 = 0; $item_val2 = 0; $item_val3 = 0; $item_val4 = 1; $item_val5 = 1; break;
		case 259: $item_pa = "surgical mask"; $item_sf = "surgical mask"; $item_val1 = 12; $item_val2 = 19; $item_val3 = 28; $item_val4 = 42; $item_val5 = 63; break;
		case 260: $item_pa = "swimming goggles"; $item_sf = "water goggles"; $item_val1 = 2; $item_val2 = 4; $item_val3 = 5; $item_val4 = 8; $item_val5 = 12; break;
		case 261: $item_pa = "syringe with needle"; $item_sf = "syringe with needle"; $item_val1 = 1; $item_val2 = 2; $item_val3 = 3; $item_val4 = 4; $item_val5 = 6; break;
		case 262: $item_pa = "tackle box"; $item_sf = "tool box, empty"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 7; $item_val4 = 10; $item_val5 = 15; break;
		case 263: $item_pa = "tape measure, 25 feet"; $item_sf = "wireless measuring tool (for thickness)"; $item_val1 = 2; $item_val2 = 4; $item_val3 = 5; $item_val4 = 8; $item_val5 = 12; break;
		case 264: $item_pa = "tea kettle"; $item_sf = "food sterilizer"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 7; $item_val4 = 10; $item_val5 = 15; break;
		case 265: $item_pa = "television/monitor flat screen, 20 inch"; $item_sf = "monitor flat screen, 20 inch"; $item_val1 = 79; $item_val2 = 119; $item_val3 = 178; $item_val4 = 267; $item_val5 = 400; break;
		case 266: $item_pa = "tennis ball"; $item_sf = "glow disk, sports"; $item_val1 = 0; $item_val2 = 0; $item_val3 = 0; $item_val4 = 1; $item_val5 = 1; break;
		case 267: $item_pa = "tennis racket"; $item_sf = "glow disk bat, sports"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 268: $item_pa = "thermometer, oral"; $item_sf = "thermometer, biological"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 5; break;
		case 269: $item_pa = "thermometer, outdoor"; $item_sf = "thermometer, outdoor"; $item_val1 = 4; $item_val2 = 5; $item_val3 = 8; $item_val4 = 12; $item_val5 = 18; break;
		case 270: $item_pa = "tin snips"; $item_sf = "thin metal scissors"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 7; $item_val4 = 10; $item_val5 = 15; break;
		case 271: $item_pa = "tire, 10x3 inches"; $item_sf = "wheel, 10x3 inches"; $item_val1 = 11; $item_val2 = 17; $item_val3 = 26; $item_val4 = 39; $item_val5 = 58; break;
		case 272: $item_pa = "toaster"; $item_sf = "thermal drying disk"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 13; $item_val4 = 19; $item_val5 = 29; break;
		case 273: $item_pa = "toaster oven"; $item_sf = "thermal drying disk, large"; $item_val1 = 8; $item_val2 = 12; $item_val3 = 18; $item_val4 = 27; $item_val5 = 40; break;
		case 274: $item_pa = "tool belt, leather"; $item_sf = "tool belt, nylon"; $item_val1 = 14; $item_val2 = 21; $item_val3 = 31; $item_val4 = 47; $item_val5 = 70; break;
		case 275: $item_pa = "tool box, metal, empty"; $item_sf = "tool bag, nylon, empty"; $item_val1 = 10; $item_val2 = 15; $item_val3 = 22; $item_val4 = 33; $item_val5 = 50; break;
		case 276: $item_pa = "toothbrush"; $item_sf = "sonic scrubber"; $item_val1 = 0; $item_val2 = 1; $item_val3 = 1; $item_val4 = 1; $item_val5 = 2; break;
		case 277: $item_pa = "toothbrush, electric"; $item_sf = "plasma scrubber"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 278: $item_pa = "towel"; $item_sf = "towel"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 4; break;
		case 279: $item_pa = "toy car, remote control, 50mph"; $item_sf = "toy spaceship, remote control, 50mph"; $item_val1 = 59; $item_val2 = 89; $item_val3 = 133; $item_val4 = 200; $item_val5 = 300; break;
		case 280: $item_pa = "toy train"; $item_sf = "toy hover car"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 8; $item_val4 = 13; $item_val5 = 19; break;
		case 281: $item_pa = "trash can, stainless steel, 1.3 gallon"; $item_sf = "trash can, metal, 1.3 gallon"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 7; $item_val5 = 10; break;
		case 282: $item_pa = "turpentine, 1 gallon"; $item_sf = "glass dissolving agent, 1 gallon"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 9; $item_val4 = 13; $item_val5 = 20; break;
		case 283: $item_pa = "umbrella"; $item_sf = "sonic precipitation shield, personal"; $item_val1 = 4; $item_val2 = 6; $item_val3 = 8; $item_val4 = 13; $item_val5 = 19; break;
		case 284: $item_pa = "universal remote"; $item_sf = "remote control device"; $item_val1 = 2; $item_val2 = 2; $item_val3 = 4; $item_val4 = 5; $item_val5 = 8; break;
		case 285: $item_pa = "vacuum cleaner, small"; $item_sf = "organic dissolver, small"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 10; $item_val4 = 15; $item_val5 = 23; break;
		case 286: $item_pa = "valve, plumbing"; $item_sf = "valve, piping"; $item_val1 = 3; $item_val2 = 4; $item_val3 = 6; $item_val4 = 9; $item_val5 = 13; break;
		case 287: $item_pa = "video game system"; $item_sf = "holographic game system"; $item_val1 = 55; $item_val2 = 83; $item_val3 = 124; $item_val4 = 187; $item_val5 = 280; break;
		case 288: $item_pa = "video game disc/cartridge"; $item_sf = "holographic game chip"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 289: $item_pa = "vise-grip"; $item_sf = "hand clamp"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 8; $item_val4 = 11; $item_val5 = 17; break;
		case 290: $item_pa = "wall clock, round"; $item_sf = "carbon dating tool, handheld"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 7; $item_val4 = 11; $item_val5 = 16; break;
		case 291: $item_pa = "welder, portable, electric"; $item_sf = "welder, portable, plasma"; $item_val1 = 164; $item_val2 = 247; $item_val3 = 370; $item_val4 = 555; $item_val5 = 832; break;
		case 292: $item_pa = "welding mask"; $item_sf = "welding mask"; $item_val1 = 45; $item_val2 = 68; $item_val3 = 102; $item_val4 = 153; $item_val5 = 230; break;
		case 293: $item_pa = "wet/dry vacuum"; $item_sf = "metallic dissolver, small"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 294: $item_pa = "wheel chair"; $item_sf = "hover chair"; $item_val1 = 20; $item_val2 = 30; $item_val3 = 44; $item_val4 = 67; $item_val5 = 100; break;
		case 295: $item_pa = "wheel, 10x2 inches"; $item_sf = "metal wheel, 10x2 inches"; $item_val1 = 6; $item_val2 = 9; $item_val3 = 14; $item_val4 = 21; $item_val5 = 32; break;
		case 296: $item_pa = "wood chisel"; $item_sf = "glass cutter, laser"; $item_val1 = 3; $item_val2 = 5; $item_val3 = 8; $item_val4 = 11; $item_val5 = 17; break;
		case 297: $item_pa = "wooden toy"; $item_sf = "odd alien toy"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 5; break;
		case 298: $item_pa = "wrench, pipe"; $item_sf = "wrench, large"; $item_val1 = 1; $item_val2 = 1; $item_val3 = 2; $item_val4 = 3; $item_val5 = 5; break;
		case 299: $item_pa = "wrist watch"; $item_sf = "wrist communicator"; $item_val1 = 5; $item_val2 = 7; $item_val3 = 11; $item_val4 = 17; $item_val5 = 25; break;
		case 300: $item_pa = "yarn, 3,000 feet"; $item_sf = "oddly strong string, 3,000 feet, spool"; $item_val1 = 2; $item_val2 = 3; $item_val3 = 4; $item_val4 = 6; $item_val5 = 9; break;
	}
	return array($item_pa,$item_sf,$item_val1,$item_val2,$item_val3,$item_val4,$item_val5);
}
?>