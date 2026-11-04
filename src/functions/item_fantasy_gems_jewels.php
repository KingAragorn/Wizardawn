<?php

// MAKE A FANTASY GEM
function gemCreator($cut)
{
	$xgem = mt_rand(1,100);
	if ($cut > 0){} else {$cut = 100;}

	if ($xgem < 31){$value = mt_rand(4,16);
		$xtype = mt_rand(1,13);
		if ($xtype == 1){$xname = "banded agate";}
		else if ($xtype == 2){$xname = "eye agate";}
		else if ($xtype == 3){$xname = "moss agate";}
		else if ($xtype == 4){$xname = "azurite";}
		else if ($xtype == 5){$xname = "blue quartz";}
		else if ($xtype == 6){$xname = "hematite";}
		else if ($xtype == 7){$xname = "lapis lazuli";}
		else if ($xtype == 8){$xname = "malachite";}
		else if ($xtype == 9){$xname = "obsidian";}
		else if ($xtype == 10){$xname = "rhodochrosite";}
		else if ($xtype == 11){$xname = "tiger eye";}
		else if ($xtype == 12){$xname = "turquoise";}
		else {$xname = "freshwater pearl";}
	}
	else if ($xgem < 56){$value = mt_rand(2,8)*10;
		$xtype = mt_rand(1,17);
		if ($xtype == 1){$xname = "bloodstone";}
		else if ($xtype == 2){$xname = "carnelian";}
		else if ($xtype == 3){$xname = "chalcedony";}
		else if ($xtype == 4){$xname = "chrysoprase";}
		else if ($xtype == 5){$xname = "citrine";}
		else if ($xtype == 6){$xname = "iolite";}
		else if ($xtype == 7){$xname = "jasper";}
		else if ($xtype == 8){$xname = "moonstone";}
		else if ($xtype == 9){$xname = "onyx";}
		else if ($xtype == 10){$xname = "peridot";}
		else if ($xtype == 11){$xname = "rock crystal";}
		else if ($xtype == 12){$xname = "sard quartz";}
		else if ($xtype == 13){$xname = "sardonyx quartz";}
		else if ($xtype == 14){$xname = "rose quartz";}
		else if ($xtype == 15){$xname = "smoky quartz";}
		else if ($xtype == 16){$xname = "star rose quartz";}
		else {$xname = "zircon";}
	}
	else if ($xgem < 76){$value = mt_rand(4,16)*10;
		$xtype = mt_rand(1,13);
		if ($xtype == 1){$xname = "amber";}
		else if ($xtype == 2){$xname = "amethyst";}
		else if ($xtype == 3){$xname = "chrysoberyl";}
		else if ($xtype == 4){$xname = "coral";}
		else if ($xtype == 5){$xname = "garnet";}
		else if ($xtype == 6){$xname = "jade";}
		else if ($xtype == 7){$xname = "white pearl";}
		else if ($xtype == 8){$xname = "golden pearl";}
		else if ($xtype == 9){$xname = "pink pearl";}
		else if ($xtype == 10){$xname = "silver pearl";}
		else if ($xtype == 11){$xname = "red spinel";}
		else if ($xtype == 12){$xname = "green spinel";}
		else {$xname = "tourmaline";}
	}
	else if ($xgem < 91){$value = mt_rand(2,8)*100;
		$xtype = mt_rand(1,6);
		if ($xtype == 1){$xname = "alexandrite";}
		else if ($xtype == 2){$xname = "aquamarine";}
		else if ($xtype == 3){$xname = "violet garnet";}
		else if ($xtype == 4){$xname = "black pearl";}
		else if ($xtype == 5){$xname = "deep blue spinel";}
		else {$xname = "golden yellow topaz";}
	}
	else if ($xgem < 100){$value = mt_rand(4,16)*100;
		$xtype = mt_rand(1,10);
		if ($xtype == 1){$xname = "emerald";}
		else if ($xtype == 2){$xname = "white opal";}
		else if ($xtype == 3){$xname = "black opal";}
		else if ($xtype == 4){$xname = "fire opal";}
		else if ($xtype == 5){$xname = "blue sapphire";}
		else if ($xtype == 6){$xname = "fiery yellow corundum";}
		else if ($xtype == 7){$xname = "rich purple corundum";}
		else if ($xtype == 8){$xname = "blue star sapphire";}
		else if ($xtype == 9){$xname = "black star sapphire";}
		else {$xname = "star ruby";}
	}
	else {$value = mt_rand(2,8)*1000;
		$xtype = mt_rand(1,7);
		if ($xtype == 1){$xname = "green emerald";}
		else if ($xtype == 2){$xname = "blue-white diamond";}
		else if ($xtype == 3){$xname = "canary diamond";}
		else if ($xtype == 4){$xname = "pink diamond";}
		else if ($xtype == 5){$xname = "brown diamond";}
		else if ($xtype == 6){$xname = "blue diamond";}
		else {$xname = "jacinth";}
	}
	$value = ceil($value*(0.01*$cut));

return $xname . " (" . number_format($value) . "gp)";
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// MAKE A FANTASY JEWELRY
function jewelCreator($cut)
{
	switch (mt_rand(0,4))
	{
		case 0:	$shape = "sphere";				break;
		case 1:	$shape = "cube";				break;
		case 2:	$shape = "triangular pyramid";	break;
		case 3:	$shape = "square pyramid";		break;
		case 4:	$shape = "cylinder";			break;
	}

	$xjew = mt_rand(1,60);
	$xrank = 0;
	$xtype = mt_rand(1,10);
	if ($cut > 0){} else {$cut = 100;}

	if ($xjew < 4){$xname = "amulet";		if ($xtype < 5){$xrank = 1;}	else if ($xtype < 8){$xrank = 2;}	else if ($xtype < 10){$xrank = 3;}	else {$xrank = 4;} }
	else if ($xjew < 5){$xname = "anklet";		if ($xtype < 4){$xrank = 1;}	else if ($xtype < 7){$xrank = 2;}	else if ($xtype < 9){$xrank = 3;}	else if ($xtype < 10){$xrank = 4;}	else {$xrank = 5;} }
	else if ($xjew < 8){$xname = "arm-ring";	if ($xtype < 4){$xrank = 1;}	else if ($xtype < 7){$xrank = 2;}	else if ($xtype < 9){$xrank = 3;}	else if ($xtype < 10){$xrank = 4;}	else {$xrank = 5;} }
	else if ($xjew < 11){$xname = "belt";		if ($xtype < 5){$xrank = 1;}	else if ($xtype < 7){$xrank = 2;}	else if ($xtype < 10){$xrank = 9;}	else {$xrank = 4;} }
	else if ($xjew < 13){$xname = "box";		if ($xtype < 5){$xrank = 1;}	else if ($xtype < 8){$xrank = 2;}	else if ($xtype < 10){$xrank = 3;}	else {$xrank = 4;} }
	else if ($xjew < 18){$xname = "bracelet";	if ($xtype < 4){$xrank = 1;}	else if ($xtype < 7){$xrank = 2;}	else if ($xtype < 9){$xrank = 3;}	else if ($xtype < 10){$xrank = 4;}	else {$xrank = 5;} }
	else if ($xjew < 21){$xname = "broach";		if ($xtype < 4){$xrank = 1;}	else if ($xtype < 7){$xrank = 2;}	else if ($xtype < 9){$xrank = 3;}	else if ($xtype < 10){$xrank = 4;}	else {$xrank = 5;} }
	else if ($xjew < 24){$xname = "buckle";		if ($xtype < 5){$xrank = 1;}	else if ($xtype < 8){$xrank = 2;}	else if ($xtype < 10){$xrank = 3;}	else {$xrank = 4;} }
	else if ($xjew < 26){$xname = "chain";		if ($xtype < 5){$xrank = 1;}	else if ($xtype < 8){$xrank = 2;}	else if ($xtype < 10){$xrank = 3;}	else {$xrank = 4;} }
	else if ($xjew < 28){$xname = "chalice";	if ($xtype < 4){$xrank = 1;}	else if ($xtype < 7){$xrank = 2;}	else if ($xtype < 9){$xrank = 3;}	else if ($xtype < 10){$xrank = 4;}	else {$xrank = 5;} }
	else if ($xjew < 31){$xname = "choker";		if ($xtype < 5){$xrank = 1;}	else if ($xtype < 8){$xrank = 2;}	else if ($xtype < 10){$xrank = 3;}	else {$xrank = 4;} }
	else if ($xjew < 33){$xname = "clasp";		if ($xtype < 5){$xrank = 1;}	else if ($xtype < 7){$xrank = 2;}	else if ($xtype < 9){$xrank = 3;}	else {$xrank = 4;} }
	else if ($xjew < 36){$xname = "comb/brush";	if ($xtype < 4){$xrank = 1;}	else if ($xtype < 7){$xrank = 2;}	else if ($xtype < 9){$xrank = 3;}	else if ($xtype < 10){$xrank = 4;}	else {$xrank = 5;} }
	else if ($xjew < 38){$xname = "coronet";	if ($xtype < 2){$xrank = 1;}	else if ($xtype < 3){$xrank = 2;}	else if ($xtype < 5){$xrank = 3;}	else if ($xtype < 9){$xrank = 4;}	else if ($xtype < 10){$xrank = 5;}	else {$xrank = 6;} }
	else if ($xjew < 39){$xname = "crown";		if ($xtype < 2){$xrank = 1;}	else if ($xtype < 3){$xrank = 2;}	else if ($xtype < 4){$xrank = 3;}	else if ($xtype < 5){$xrank = 4;}	else if ($xtype < 8){$xrank = 5;}	else {$xrank = 6;} }
	else if ($xjew < 41){$xname = "headband";	if ($xtype < 5){$xrank = 1;}	else if ($xtype < 7){$xrank = 2;}	else if ($xtype < 10){$xrank = 9;}	else {$xrank = 4;} }
	else if ($xjew < 47){$xname = "earring";	if ($xtype < 5){$xrank = 1;}	else if ($xtype < 7){$xrank = 2;}	else if ($xtype < 10){$xrank = 9;}	else {$xrank = 4;} }
	else if ($xjew < 53){$xname = mt_rand(2,6) . " inch " . $shape;		if ($xtype < 5){$xrank = 1;}	else if ($xtype < 8){$xrank = 2;}	else if ($xtype < 10){$xrank = 3;}	else {$xrank = 4;} }
	else {			$xname = "goblet";	if ($xtype < 5){$xrank = 1;}	else if ($xtype < 7){$xrank = 2;}	else if ($xtype < 10){$xrank = 9;}	else {$xrank = 4;} }

	if ($xrank == 1){$value = mt_rand(1,10)*100;		 $xname = "silver " . $xname;}
	else if ($xrank == 2){$value = mt_rand(2,12)*100;	 $xname = "silvery gold " . $xname;}
	else if ($xrank == 3){$value = mt_rand(3,18)*100;	 $xname = "golden " . $xname;}
	else if ($xrank == 4){$value = mt_rand(5,30)*100;	 $xname = "silvery gemmed " . $xname;}
	else if ($xrank == 5){$value = mt_rand(2,8)*1000;	 $xname = "golden gemmed " . $xname;}
	else {$value = mt_rand(2,12)*1000;			 $xname = "exceptional " . $xname;}

	$value = ceil($value*(0.01*$cut));
	return $xname . " (" . number_format($value) . "gp)";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function gemChooser()
{
	$gem = array('banded agate', 'eye agate', 'moss agate', 'azurite', 'blue quartz', 'hematite', 'lapis lazuli', 'malachite', 'obsidian', 'rhodochrosite', 'tiger eye', 'turquoise', 'freshwater pearl', 'bloodstone', 'carnelian', 'chalcedony', 'chrysoprase', 'citrine', 'iolite', 'jasper', 'moonstone', 'onyx', 'peridot', 'rock crystal', 'sard quartz', 'sardonyx quartz', 'rose quartz', 'smoky quartz', 'star rose quartz', 'zircon', 'amber', 'amethyst', 'chrysoberyl', 'coral', 'garnet', 'jade', 'white pearl', 'golden pearl', 'pink pearl', 'silver pearl', 'red spinel', 'green spinel', 'tourmaline', 'alexandrite', 'aquamarine', 'violet garnet', 'black pearl', 'deep blue spinel', 'golden yellow topaz', 'emerald', 'white opal', 'black opal', 'fire opal', 'blue sapphire', 'fiery yellow corundum', 'rich purple corundum', 'blue star sapphire', 'black star sapphire', 'star ruby', 'green emerald', 'blue-white diamond', 'canary diamond', 'pink diamond', 'brown diamond', 'blue diamond', 'jacinth');
	return $gem[mt_rand(0,65)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function preciousChooser()
{
	$value = array('copper', 'silver', 'gold', 'platinum', 'iron', 'copper', 'silver', 'gold', 'platinum', 'iron', 'copper', 'silver', 'gold', 'platinum', 'iron', 'bone');
	return $value[mt_rand(0,15)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function goodmetalChooser()
{
	$value = array('silver', 'gold', 'platinum');
	return $value[mt_rand(0,2)];
}
?>