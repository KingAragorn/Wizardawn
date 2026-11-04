<?php

function nuclearCitizen($game,$race,$might1,$might2,$cash,$dres,$poss,$age,$sex,$dose,$formed,$describe)
{
	if ($race == "none")
	{
		if ($game == "Broken Urthe")
		{
			switch (mt_rand(0,3))
			{
				case 0:	$race = "Humanoid Insect";	break;
				case 1:	$race = "Humanoid Animal";	break;
				case 2:	$race = "Mutant Human";		break;
				case 3:	$race = "Human";			break;
			}
		}
		else
		{
			switch (mt_rand(0,5))
			{
				case 0:	$race = "Humanoid Plant";	break;
				case 1:	$race = "Robot";			break;
				case 2:	$race = "Humanoid Insect";	break;
				case 3:	$race = "Humanoid Animal";	break;
				case 4:	$race = "Mutant Human";		break;
				case 5:	$race = "Human";			break;
			}
		}
	}

//////////////////////////////////////////////////////////////////////////////////// AGE
$ages = array('young', 'young', 'young', 'mature', 'mature', 'mature', 'mature', 'middle-aged', 'old');
	if ($age != "child"){$age = $ages[mt_rand(0,8)];}

//////////////////////////////////////////////////////////////////////////////////// HEALTH
if ($game == "Broken Urthe")
{
	$hitdice = array('1', '1', '1', '1', '1', '2', '2', '2', '3', '4');
	$hd = $hitdice[mt_rand(0,9)];
	$hp = $hd * mt_rand($might1,($might2*$might1));
	if ($age == "child"){$hd = 1; $hp = ceil($hd * mt_rand($might1,($might2*$might1))/2);}
}
else
{
		$hp = 0;
		if ($age == "child"){$hd = mt_rand(3,9); $save = 1;}
		else if ($age == "young"){$hd = mt_rand(5,12); $save = 2;}
		else if ($age == "mature"){$hd = mt_rand(7,18); $save = 3;}
		else if ($age == "middle-aged"){$hd = mt_rand(6,17); $save = 2;}
		else {$hd = mt_rand(4,10); $save = 1;}
		$hitz = $hd;
		while ($hitz > 0) :
			$hp = $hp + mt_rand($might1,$might2);
			$hitz = $hitz - 1;
		endwhile;
}

//////////////////////////////////////////////////////////////////////////////////// DAMAGE
$damage = array('3', '3', '3', '3', '4', '4', '4', '6');
	$damages = $damage[mt_rand(0,7)];
	if ($birth == "child"){$damages = 2;}

//////////////////////////////////////////////////////////////////////////////////// ARMOR
if ($game == "Mutant Future")
{
	$armors = array('9', '9', '9', '9', '9', '8', '8', '7');
	$armor = $armors[mt_rand(0,7)];
	if ($birth == "child"){$armor = 9;}
}
else if ($game == "Gamma World" || $game == "Metamorphosis Alpha")
{
	$armors = array('10', '10', '10', '10', '10', '9', '9', '8');
	$armor = $armors[mt_rand(0,7)];
	if ($birth == "child"){$armor = 10;}
}
else
{
	$armors = array('0', '0', '0', '0', '0', '1', '1', '2');
	$armor = $armors[mt_rand(0,7)];
	if ($birth == "child"){$armor = 0;}
}

//////////////////////////////////////////////////////////////////////////////////// INTELLECT
$iq = array('Low', 'Average', 'Average', 'Average', 'Average', 'Very', 'Very', 'High');

//////////////////////////////////////////////////////////////////////////////////// MORALITY
if ($game == "Mutant Future"){$alignment = array('Lawful','Lawful','Lawful','Neutral','Neutral','Neutral','Neutral','Neutral','Neutral', 'Chaotic'); $aligns = "alignment";}
else {$alignment = array('Good','Good','Good','Fair','Fair','Fair','Fair','Fair','Fair', 'Evil'); $aligns = "morality";}

//////////////////////////////////////////////////////////////////////////////////// TRAITS
$trait1 = array('dirty', 'clean', 'unkempt', 'immaculate', 'rough', 'ragged', 'dandyish', 'foppish', 'average', 'imposing');
$trait2 = array('optimistic', 'pessimistic', 'hedonistic', 'altruistic', 'helpful and kindly', 'careless', 'capricious and mischievous', 'attentive', 'curious and inquisitive', 'moody', 'trusting', 'suspicious and cautious', 'precise and exacting', 'perceptive', 'opinionated', 'violent and warlike', 'studious', 'foul and barbaric', 'cruel and callous', 'a prankster', 'servile and obsequious', 'fanatical and obsessive', 'malevolent', 'loquacious');
$trait4 = array('cheerful', 'morose', 'compassionate', 'insensitive', 'humble', 'proud', 'even tempered', 'hot tempered', 'easy going', 'harsh');
$trait5 = array('soft-hearted', 'forgiving', 'hard-hearted', 'unforgiving', 'jealous', 'vengeful', 'scrupulous', 'honorable', 'truthful', 'deceitful');
$trait6 = array('aesthetic', 'virtuous', 'normal', 'normal', 'lusty', 'lusty', 'lustful', 'immoral', 'amoral', 'aesthetic', 'virtuous', 'normal', 'normal', 'lusty', 'lusty', 'lustful', 'immoral', 'amoral', 'perverted', 'sadistic', 'depraved');

//////////////////////////////////////////////////////////////////////////////////// PERSONALITY
$personality = mt_rand(1,8);
	if ($personality < 6){$trait3 = array('modest', 'egoist and arrogant', 'friendly', 'aloof', 'hostile', 'well-spoken', 'diplomatic', 'abrasive');}
	else if ($personality < 8){$trait3 = array('forceful', 'overbearing', 'friendly', 'blustering', 'antagonistic', 'rude', 'rash', 'diplomatic');}
	else {$trait3 = array('retiring', 'reserved', 'friendly', 'aloof', 'hostile', 'rude', 'courteous', 'solitary and secretive');}

//////////////////////////////////////////////////////////////////////////////////// SEX
if (($sex == "none") && (mt_rand(1,2) == 2)){$sex = "Male";}
else if ($sex == "none"){$sex = "Female";}
else if ($sex == "Male"){$sex = "Female";}
else if ($sex == "Female"){$sex = "Male";}
if (($age == "child") && (mt_rand(1,2) == 2)){$sex = "Male";} else if ($age == "child"){$sex = "Female";}

//////////////////////////////////////////////////////////////////////////////////// RACE VARIATIONS
	if ($race == "Humanoid Plant")
	{
		$forms = array('tree', 'cactus', 'flower', 'weed', 'fruit', 'shrub', 'vegetable', 'mossy creature', 'fungus', 'carnivorous plant');
		$form = $forms[mt_rand(0,9)];
		$forming = " (" . $form . ")";
		if ($formed != "none"){$forming = " (" . $formed . ")"; $form = $formed;}
	}
	else if ($race == "Humanoid Animal")
	{
		$forms = array('aardvark', 'alligator', 'anteater', 'antelope', 'ape', 'armadillo', 'baboon', 'badger', 'bat', 'bear', 'beaver', 'boar', 'buffalo', 'bull', 'camel', 'cat', 'chameleon', 'cheetah', 'chicken', 'chimpanzee', 'chipmunk', 'cobra', 'cougar', 'cow', 'coyote', 'crab', 'crane', 'crocodile', 'crow', 'deer', 'dog', 'donkey', 'duck', 'eagle', 'elephant', 'elk', 'falcon', 'ferret', 'fox', 'frog', 'gerbil', 'giraffe', 'goat', 'gopher', 'gorilla', 'hamster', 'hare', 'hawk', 'hippopotamus', 'horse', 'hyena', 'iguana', 'jackal', 'jaguar', 'kangaroo', 'koala', 'lamb', 'leopard', 'lion', 'lizard', 'mink', 'mole', 'monkey', 'moose', 'mouse', 'mule', 'muskrat', 'opossum', 'ostrich', 'otter', 'owl', 'ox', 'panda', 'panther', 'parrot', 'pelican', 'penguin', 'pig', 'platypus', 'porcupine', 'puma', 'rabbit', 'raccoon', 'ram', 'rat', 'raven', 'rhinoceros', 'salamander', 'seal', 'sheep', 'skunk', 'snail', 'snake', 'squirrel', 'tiger', 'toad', 'turkey', 'turtle', 'walrus', 'weasel', 'wolf', 'wolverine', 'woodchuck', 'worm', 'zebra');
		$form = $forms[mt_rand(0,104)];
		$forming = " (" . $form . ")";
		if ($formed != "none"){$forming = " (" . $formed . ")"; $form = $formed;}
	}
	else if ($race == "Humanoid Insect")
	{
		$forms = array('ant', 'bee', 'beetle', 'cockroach', 'cricket', 'dragonfly', 'fly', 'hornet', 'locust', 'mantis', 'mosquito', 'scorpion', 'spider', 'tick', 'wasp');
		$form = $forms[mt_rand(0,14)];
		$forming = " (" . $form . ")";
		if ($formed != "none"){$forming = " (" . $formed . ")"; $form = $formed;}
	}
	else if ($race == "Robot")
	{
			$hp = 0;						$hd = mt_rand(9,18);	$hitz = $hd;
			$droid = mt_rand(1,3);			$age = "";
			if ($droid == 1){$form = "android";}
			else if ($droid == 2){$form = "synthetic";}
			else {$form = "replicant";}
				while ($hitz > 0) :
					$hp = $hp + mt_rand($might1,$might2);
					$hitz = $hitz - 1;
				endwhile;
	}

//////////////////////////////////////////////////////////////////////////////////// HAIR STYLE
$haircolor = array('black', 'brown', 'red', 'auburn', 'gray', 'white', 'blonde');
	$hcolor = $haircolor[mt_rand(0,6)];
	if ($birth == "child"){$haircolor = array('black', 'brown', 'red', 'auburn', 'blonde'); $hcolor = $haircolor[mt_rand(0,4)];}
	if ($race == "Mutant Human")
	{
		$haircolor = array('blue-green', 'black', 'blue', 'gray', 'green', 'violet', 'red', 'brown', 'orange', 'yellowish-green', 'tan', 'gold', 'yellow', 'purple', 'silver', 'forest-green', 'white');
		$hcolor = $haircolor[mt_rand(0,16)];
	}

	if ($sex == "Male")
	{
		$gender = "Male";
		$hisp = "He";
		$husp = "His";
		$hairy = array('bald', 'long', 'short', 'curly');
		if (mt_rand(1,100) > 70){$beard = 1;}
		if (mt_rand(1,100) > 70){$mustc = 1;}
		$bhair = array('thick', 'long', 'short');
		$hare = $hairy[mt_rand(0,3)];
		if ($birth == "child")
		{
			$beard=0; $mustc=0; $hare = $hairy[mt_rand(1,3)];
		}
	}
	else
	{
		$gender = "Female";
		$hisp = "She";
		$husp = "Her";
		$hairy = array('braided', 'long', 'short', 'curly');
		$hare = $hairy[mt_rand(0,3)];
	}
	
	if (($race == "Human") || ($race == "Mutant Human") || ($race == "Robot"))
	{
		if ($hare != "bald"){$hair1 = $hisp . " has " . $hare . ", " . $hcolor . " hair";}
		else {$hair1 = $hisp . " is bald"; $hair2 = ", " . $hcolor;}

		if ($beard == 1){$hairr = $hair1 . " with a " . $bhair[mt_rand(0,2)] . "" . $hair2 . " beard and moustache.&nbsp; ";}
		else if (($beard != 1) && ($mustc == 1)){$hairr = $hair1 . " with a " . $bhair[mt_rand(0,2)] . "" . $hair2 . " moustache.&nbsp; ";}
		else if ($hare == "bald"){$hairr = $hair1 . " with no facial hair at all.&nbsp; ";}
		else {$hairr = $hair1 . ".&nbsp; ";}
	}
	else {$hairr = "";}

//////////////////////////////////////////////////////////////////////////////////// MUTANT LOOKS
if (($race == "Mutant Human") || ($race == "Humanoid Animal") || ($race == "Humanoid Plant") || ($race == "Humanoid Insect"))
{
	$mutated = "";

	$legs = array('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '4', '4', '6', '6');
		$legs = $legs[mt_rand(0,14)] . " legs";

	$arms = array('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '4', '4', '4', '4');
		$arms = $arms[mt_rand(0,14)] . " arms";

	$eyes = array('1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '3', '4', '5', '6', '7', '8');
		$eyes = $eyes[mt_rand(0,18)];
		if ($eyes > 1){$eyec = "eyes";}
		else {$eyec = "eye";}

	$skin = array('scales', 'fur', 'feathers', 'skin'); $skin = $skin[mt_rand(0,3)];
		if ($race == "Mutant Human"){$skin = array('scales', 'fur', 'feathers', 'skin', 'skin', 'skin', 'skin', 'skin', 'skin', 'skin');
		$skin = $skin[mt_rand(0,9)];}

	$skincolor = array('blue-green', 'black', 'blue', 'gray', 'green', 'violet', 'red', 'brown', 'orange', 'yellowish-green', 'tan', 'gold', 'yellow', 'purple', 'silver', 'forest-green', 'white');
		$skincolor = $skincolor[mt_rand(0,16)];
		$skinhue = array('light', '', 'dark');
		$skinhue = $skinhue[mt_rand(0,2)];
		if (($race == "Mutant Human") && (mt_rand(1,100) > 70)){$skincolor = "pale";}
		if ($race == "Humanoid Plant"){$skinny = "looks similar to a humanoid " . $form . " that is " . $skinhue . " " . $skincolor . " in color";}
		else if ($skin == "skin"){$skinny = "has " . $skinhue . " " . $skincolor . " " . $skin;}
		else {$skinny = "is covered in " . $skinhue . " " . $skincolor . " " . $skin;}

	$eyecolor = array('blue-green', 'black', 'blue', 'gray', 'green', 'violet', 'red', 'brown', 'orange', 'yellowish-green', 'tan', 'gold', 'yellow', 'purple', 'silver', 'forest-green', 'white');
		$eyecolor = $eyecolor[mt_rand(0,16)];
		$eyehue = array('light ', ' ', 'dark');
		$eyehue = $eyehue[mt_rand(0,2)];
		if (($race == "Mutant Human") && (mt_rand(1,100) > 70)){$eyecolor = array('green', 'brown', 'blue'); $eyecolor = $eyecolor[mt_rand(0,2)];}

	if (($dose == 1) && (($race == "Humanoid Animal") || ($race == "Humanoid Insect") || ($race == "Mutant Human")))
	{
		$mutated = " " . $hisp . " has " . $legs . ", " . $arms . ", " . $skinny . ", and has " . $eyes . " " . $eyehue . " " . $eyecolor . " " . $eyec . ". ";
	}
	else if ($race == "Humanoid Plant")
	{
		$mutated = " " . $hisp . " " . $skinny . ", and has " . $eyes . " " . $eyehue . " " . $eyecolor . " " . $eyec . ". ";
	}
	else if ($race == "Mutant Human")
	{
		$mutated = " " . $hisp . " " . $skinny . ", and has " . $eyes . " " . $eyehue . " " . $eyecolor . " " . $eyec . ". ";
	}
}
else {$mutated = "";}

if ($describe != "none")
{
	if ($sex == "Female"){$mutated = str_replace("He", "She", $describe);}
	else if ($sex == "Male"){$mutated = str_replace("She", "He", $describe);}
}

//////////////////////////////////////////////////////////////////////////////////// BRAVERY
$bravery = mt_rand(1,8);
if ($bravery == 4){$brave = $hisp . " is quite foolhardy in the face of danger. ";}
else if ($bravery == 5){$brave = $hisp . " is quite brave in the face of danger. ";}
else if ($bravery == 5){$brave = $hisp . " is quite fearless in the face of danger. ";}
else if ($bravery == 6){$brave = $hisp . " is quite cowardly in the face of danger. ";}
else if ($bravery == 7){$brave = $hisp . " is quite timid in the face of danger. ";}

//////////////////////////////////////////////////////////////////////////////////// ENERGY
$energy = mt_rand(1,8);
if ($energy == 4){$engy = strtolower($hisp) . " comes off as being quite slothful. ";}
else if ($energy == 5){$engy = strtolower($hisp) . " comes off as being quite lazy. ";}
else if ($energy == 5){$engy = strtolower($hisp) . " comes off as being quite energetic. ";}
else if ($energy == 6){$engy = strtolower($hisp) . " comes off as being quite motivated. ";}
else if ($energy == 7){$engy = strtolower($hisp) . " comes off as being quite driven. ";}

//////////////////////////////////////////////////////////////////////////////////// INTERESTS
$interests = array('none', 'none', 'none', 'religion', 'legends', 'history', 'nature', 'exotic animals', 'hunting', 'fishing', 'handicrafts', 'politics', 'wines and spirits', 'cooking', 'gambling', 'herbalism', 'collector', 'collector', 'collector', 'collector');
$interest = $interests[mt_rand(0,19)];
 if ($birth == "child"){$interest = "none";}
  if ($interest != "none")
  {
	if ($interest == "collector")
	{
		$collects = array('plants and flowers', 'computer parts', 'junk', 'guns', 'antiques', 'books', 'minerals and gems', 'ornaments and jewelry', 'coins and tokens', 'trophies and skins', 'porcelain, china and crystal', 'artwork');
		$desire = $hisp . " is a collector of " . $collects[mt_rand(0,11)] . ".&nbsp; ";
	}
	else
	{
		$desire = $hisp . " has a great interest in " . $interest . ".&nbsp; ";
	}
  }

//////////////////////////////////////////////////////////////////////////////////// NAMES

switch (mt_rand(0,14))
{
	case 0:	$name = orcName();			break;
	case 1:	$name = dwarfName();		break;
	case 2:	$name = gnomeName();		break;
	case 3:	$name = elfName();			break;
	case 4:	$name = genericName();		break;
	case 5:	$name = demonName();		break;
	case 6:	$name = impName();			break;
	case 7:	$name = lizardmanName();	break;
	case 8:	$name = ratmanName();		break;
	case 9:	$name = goblinName();		break;
	case 10:$name = impName();			break;
	case 11:$name = wolfName(1);		break;
	case 12:$name = catName(any);		break;
	case 13:if ($gender == "Male"){ $name = MaleName();} else {$name = FemaleName();}				break;
	case 14:if ($gender == "Male"){ $name = humanMaleName();} else {$name = humanFemaleName();}		break;
}

$names = $name;

//////////////////////////////////////////////////////////////////////////////////// EQUIPMENT
	$hcolor = array('blue-green', 'black', 'blue', 'gray', 'dark-gray', 'light-gray', 'green', 'light-gray', 'red', 'brown', 'orange', 'yellowish-green', 'tan', 'light-blue', 'yellow', 'purple', 'light-purple', 'dark-purple', 'light-green', 'forest-green', 'white', 'dark-green', 'dark-red', 'light-red', 'light-brown', 'dark-brown');
	$bcolor = array('black', 'dark-brown', 'gray', 'dark-green', 'dark-red', 'brown', 'tan');
	$scolor = array('gold', 'silver', 'bronze', 'copper', 'platinum', 'metal', 'iron');

		$packs = array('small cloth bag', 'small leather bag', 'belt pouch', 'concealed pouch', 'cloth sack', 'leather sack', 'small wooden box', 'small metal box', 'small plastic box', 'small plastic bag', 'wallet');
		$things = array('action figure', 'adhesive bandages_30_in the box', 'adhesive pad of paper - 3x3 inch_100_sheets', 'audio cassette', 'audio cd', 'baby bottle', 'baby monitor and receiver', 'baseball', 'baseball glove', 'battery', 'bb gun ammo_1000_in the box', 'bicycle bell', 'binoculars', 'blood pressure cuff', 'book', 'bottle of antiseptic_20_oz', 'box cutter', 'cable cutting pliers', 'cable ties_100_in the bag', 'candle', 'cane', 'c-clamp', 'cellular phone', 'ceramic bowl', 'chisel', 'claw hammer', 'combination padlock', 'comic book', 'crayons_20_ colors in the box', 'crescent wrench', 'crimping tool', 'desk stapler', 'digital camera', 'digital cooking thermometer', 'digital music player_20_GB with cable', 'digital pedometer', 'digital stop watch', 'dog bowl', 'drill bit', 'duct tape_100_ft', 'DVD blank', 'DVD movie', 'electric lantern', 'electric toothbrush ', 'electrical extension cord (10 ft)', 'electrical tape_100_ft', 'electronics cable_5_ft', 'etch-a-sketch', 'first aid kit', 'first aid tape_20_ft', 'fishing hooks_20_in the box', 'flashlight', 'floss_20_ft', 'flute', 'folding shovel', 'frisbee', 'glasses', 'golf ball', 'golf tees_50_in the bag', 'hair brush', 'hair trimmer', 'hand mirror', 'hand operated can opener', 'hand torch', 'handheld GPS navigator', 'handheld spotlight', 'hard drive with cable_5_00GB', 'head phones', 'ink pen', 'kitchen utensil', 'large bandage', 'laser pointer', 'leather address book', 'light bulb', 'lip stick', 'magazine', 'map', 'mason chisel', 'mason trowel', 'metal funnel', 'metal hangar', 'model airplane', 'model car', 'multitool', 'nail polish', 'nylon dog collar', 'nylon leash', 'oral thermometer ', 'paint brush', 'paint scraper', 'paper towel', 'penlight', 'permanent marker', 'pipe thread tape_100_ft', 'plastic pencil sharpener', 'plastic pill organizer', 'pliers', 'propane lantern', 'rifle scope', 'rubber mallet', 'scissors', 'sewing needle', 'shock collar with remote', 'socket set', 'solar calculator', 'spark plug', 'spiked dog collar', 'spray cleaner', 'spray paint', 'staple gun', 'staples_1000_in the box', 'stethoscope', 'surge protector (8 outlets)', 'surgical gloves', 'surgical mask', 'swimming goggles', 'syringe with needle', 'tape measure_9_0_ft', 'tennis ball', 'tin snips', 'toothbrush', 'towel', 'toy car with remote control_8_0mph', 'toy train', 'umbrella', 'universal remote', 'video game cartridge', 'video game controller', 'video game disk', 'vise-grip', 'wireless phone ', 'wood chisel', 'wooden toy', 'wrist watch', 'yarn_3000_ft', 'apricot', 'bag of berries', 'bag of nuts', 'bar of soap', 'beeswax', 'candle', 'carrot', 'chalk', 'cherries_8_ea', 'clay cup', 'climbing peg', 'cloth dye', 'corncob pipe', 'dice', 'fish hook', 'flint & steel', 'glue_8_oz', 'hair dye', 'hairbrush', 'hand bell', 'ink_8_oz', 'lantern', 'leather flask', 'lemon', 'lettuce', 'loaded dice', 'manacles', 'metal file', 'orange', 'padlock with key', 'pamphlet with odd text', 'odd coin', 'paint brush', 'peach', 'perfume_8_oz', 'pipe tobacco', 'pliers', 'scissors', 'sewing needle', 'sheet of paper', 'pouch of colored sand', 'sling with_20_bullets', 'small bell', 'small leather bag', 'small mirror', 'silver necklace_10_sp', 'gold necklace_10_gp', 'silver ring_10_sp', 'gold ring_10_gp', 'strawberries_5_ea', 'tongs', 'torch', 'turnip', 'tweezers', 'waterskin', 'whetstone', 'whistle');
		$junky = array('thistle burrs_10_ea', 'rock_8_ea', 'twine_20_ft', 'flask of alcohol', 'wooden hair brush', 'tinderbox', 'acorns_4_ea', 'cork', 'wooden comb', 'wooden figurine', 'small pouch', 'vial of insect repellent', 'small wooden flute', 'dead bug', 'pair of dice', 'set of false teeth', 'deed to a ship', 'feather', 'deck of playing cards', 'canvas bag', 'blue snake (6 in long)', 'glass magnifying lens', 'small glass bottle', 'mousetrap', 'car keys_4_ea', 'cheap cigars_4_ea', 'copper wire_6_ft', 'orange peels', 'cheese', 'small dictionary', 'small portrait of a human', 'shelled nuts_18_ea', 'bag of beans_100_ea', 'dart', 'wooden pipe', 'scarf', 'box of matches_100_ea', 'metal animal figurine', 'flask of water', 'yarn_60_ft', 'handful of seeds_10_ea', 'ball of string', 'note regarding a secret meeting', 'ransom note', 'compass', 'love letter', 'plastic case containing paints', 'cabbage', 'small mirror', 'rodent skull', 'soiled rag', 'vial of perfume', 'city map', 'jar of glue', 'onion', 'lump of coal', 'thimble', 'brass knuckles', 'turnip', 'plastic spoon', 'flyer of a wanted criminal', 'business card', 'map of the surrounding land', 'rusty iron nails_12_ea', 'vial of mild poison', 'odd coin', 'small leather book (black, 50 pg)', 'rubber ball', 'leather strap', 'bank check_1000_gp', 'small beetle', 'letter from_person', 'sealed letter_person', 'rawhide necklace', 'iron key', 'wallet', 'long pin', 'phone book', 'xeno jerky_4_ea', 'small slip of paper', 'small knife', 'candle', 'pouch of sand', 'glass eye', 'wrist watch', 'poker chip', 'poison antidote', 'cloth handkerchief', 'lint', 'cloth napkin', 'sharp metal arrowhead', 'small blank cards_24_ea', 'egg', 'clump of dirt', 'brass tacks_16_ea', 'key to a lockbox', 'pair of cloth gloves', 'wooden stake', 'bread', 'bottle of spice', 'deck of cards', 'metal spoon', 'flower', 'marbles_20_in the bag', 'map', 'potato', 'plastic bag of crushed herbs', 'carrot', 'bottle of cheap wine', 'personal diary', 'small ceramic figurine', 'radish', 'apple', 'lock of hair', 'handkerchief');
		$thingz = count($things)-1;
		$junks = count($junky)-1;

		$rsvp = array('relative', 'governor', 'threatening person', 'store owner', 'friend', 'trader', 'far off region', 'law enforcement officer', 'nearby settlement');

		if (mt_rand(1,100) > 0)
		{
			$thing1 = $things[mt_rand(0,$thingz)]; $trinket = 1;
			$thing1 = explode("_", $thing1);
			if ($thing1[1] == "person"){$thing1 = ", " . $thing1[0] . " a " . $rsvp[mt_rand(0,8)]; }
			else if ($thing1[1] > 0){$thing1 = ", " . $thing1[0] . " (" . mt_rand(1,$thing1[1]) . $thing1[2] . ")";}
			else {$thing1 = ", " . $thing1[0];}
		}
		if (mt_rand(1,100) > 40)
		{
			$thing2 = $things[mt_rand(0,$thingz)]; $trinket = 1;
			$thing2 = explode("_", $thing2);
			if ($thing2[1] == "person"){$thing2 = ", " . $thing2[0] . " from a " . $rsvp[mt_rand(0,8)]; }
			else if ($thing2[1] > 0){$thing2 = ", " . $thing2[0] . " (" . mt_rand(1,$thing2[1]) . $thing2[2] . ")";}
			else {$thing2 = ", " . $thing2[0];}
		}
		if (mt_rand(1,100) > 30)
		{
			$thing3 = $junky[mt_rand(0,$junks)]; $trinket = 1;
			$thing3 = explode("_", $thing3);
			if ($thing3[1] > 0){$thing3 = ", " . $thing3[0] . " (" . mt_rand(1,$thing3[1]) . $thing3[2] . ")";}
			else {$thing3 = ", " . $thing3[0];}
		}
		if (mt_rand(1,100) > 80)
		{
			$weapon = array('knife', 'dagger', 'ice pick', 'baton', 'club', 'crowbar', 'dart_3_ea', 'hand axe', 'razor', 'meat cleaver', 'butcher knife', 'lead pipe', 'brass knuckles', 'screwdriver', 'pipe wrench', 'slingshot_10_rocks', 'BB gun pump pistol_50_BBs', 'revolver_6_bullets', 'rusty revolver_6_bullets');
			$thing4 = $weapon[mt_rand(0,17)]; $trinket = 1;
			$thing4 = explode("_", $thing4);
			if ($thing4[1] > 0){$thing4 = ", " . $thing4[0] . " (" . mt_rand(2,$thing4[1]) . $thing4[2] . ")";}
			else {$thing4 = ", " . $thing4[0];}
		}
		if (mt_rand(1,100) > 60)
		{
			$trinket = 1;
			$thing5 = ", " . $packs[mt_rand(0,10)] . " with " . mt_rand(2,10) . "" . $cash;
		}

		$feet = array('boots', 'fur boots', 'sandals', 'shoes', 'sneakers');
			if ($legs > 0){$w_shoe = ", " . $bcolor[mt_rand(0,6)] . " " . $feet[mt_rand(0,4)];}

		$pants = array('pants', 'shorts', 'short pants', 'pants', 'shorts', 'skirt');
			if ($sex == "Female"){$pantc = 5;} else {$pantc = 4;}
			$w_legs = ", " . $hcolor[mt_rand(0,25)] . " " . $pants[mt_rand(0,$pantc)];

		$head = array('baseball hat', 'cowboy hat', 'skullcap', 'fedora', 'stocking cap', 'cap', 'bandana', 'hat');
			if (mt_rand(1,100) > 60){$w_head = ", " . $hcolor[mt_rand(0,25)] . " " . $head[mt_rand(0,7)];} else {$w_head = "";}

		$robe = array('robe', 'cloak', 'robe', 'cloak', 'trench coat');
			if (mt_rand(1,100) > 80){$w_robe = ", " . $hcolor[mt_rand(0,25)] . " " . $robe[mt_rand(0,4)];} else {$w_robe = "";}

		if (mt_rand(1,100) > 60)
		{
			$w_belt = ", a " . $bcolor[mt_rand(0,6)] . " belt";
			if (mt_rand(1,100) > 60){$w_belt = $w_belt . " with a " . $scolor[mt_rand(0,6)] . " buckle";}

		} else {$w_belt = "";}

		$shirt = array('t-shirt', 'sweatshirt', 'shirt', 'hooded sweatshirt', 'long-sleeved t-shirt', 't-shirt', 'sweatshirt', 'shirt', 'hooded sweatshirt', 'long-sleeved t-shirt', 'sweater', 'tank top', 'buttoned shirt', 'golf shirt', 'jersey', 'sweater', 'tank top', 'buttoned shirt', 'dress');
			if ($sex == "Female"){$shirtc = 18;} else {$shirtc = 17;}
			$dresses = mt_rand(0,$shirtc); if ($dresses > 17){$w_legs = "";}
			$shurt = $shirt[$dresses];
				if ($shurt == "jersey")
				{
					$sides = array('front', 'back', 'front and back');
					$shurt = $shurt . " with a " . $hcolor[mt_rand(0,25)] . " number " . mt_rand(1,20) . " on the " . $sides[mt_rand(0,2)];
				}
			$w_vest = ", and a " . $hcolor[mt_rand(0,25)] . " " . $shurt;

		if ($dres > 0){$stuff = $w_shoe . "" . $w_belt . "" . $w_legs . "" . $w_head . "" . $w_robe . "" . $w_vest; $stuff = substr($stuff, 2); $stuff = "DRESSED IN: " . $stuff . "."; }

		if (($trinket > 0) && ($poss > 0))
		{
			$things = $thing1 . "" . $thing2 . "" . $thing3 . "" . $thing4 . "" . $thing5 . "" . $thing6;
			$things = substr($things, 2);
			$stuff = $stuff . " POSSESSIONS: " . $things . ".";
		}

//////////////////////////////////////////////////////////////////////////////////// ALL DONE
if ($game == "Mutant Future")
{
	$stats = " [ <b>AC:</b> " . $armor . "; <b>HD:</b> " . $hd. "; <b>HP:</b> " . $hp. "; <b>AT:</b> 1; <b>DMG:</b> 1d" . $damages . "; <b>SV:</b> L" . $save . "; <b>AL:</b> " . $alignment[mt_rand(0,9)] . "; <b>IQ:</b> " . $iq[mt_rand(0,7)] . " ] ";
}
else if ($game == "Broken Urthe")
{
	$stats = " [ <b>Prot:</b> " . $armor . "; <b>Lvl:</b> " . $hd. "; <b>Stam:</b> " . $hp. "; <b>Atk:</b> 1; <b>Dmg:</b> 1d" . $damages . "; <b>IQ:</b> " . $iq[mt_rand(0,7)] . " ] ";
}
else
{
	if ($age == "child"){$radx = mt_rand(3,9); $mntx = mt_rand(3,9); $psnx = mt_rand(3,9); $dmgx = "1";}
	else if ($age == "young"){$radx = mt_rand(5,12); $mntx = mt_rand(5,12); $psnx = mt_rand(5,12); $dmgx = "1d3";}
	else if ($age == "mature"){$radx = mt_rand(7,18); $mntx = mt_rand(7,18); $psnx = mt_rand(7,18); $dmgx = "1d4";}
	else if ($age == "middle-aged"){$radx = mt_rand(6,17); $mntx = mt_rand(6,17); $psnx = mt_rand(6,17); $dmgx = "1d4";}
	else {$radx = mt_rand(4,10); $mntx = mt_rand(4,10); $psnx = mt_rand(4,10); $dmgx = "1d2";}

	if ($race == "robot")
	{
		$stats = " [ <b>MV:</b> " . retroNotes($ary[move],$x_game,$ary[level]) . " | <b>SZ:</b> " . $ary[size] . " | <b>AC:</b> " . $old_armor . " | <b>HD:</b> " . $hd . " | <b>ATK:</b> 1 | <b>ATK&nbsp;CLASS:</b> 1 | <b>DMG:</b> " . $dmgx . " | <b>RAD&nbsp;RESIST:</b> " . $radx . "&nbsp;]" . $notes;
	}
	else { $stats = strtoupper($my_real_name) . " [<b>MV:</b> " . retroNotes($ary[move],$x_game,$ary[level]) . " | <b>SZ:</b> " . $ary[size] . " | <b>AC:</b> " . $old_armor . " | <b>HD:</b> " . $hd . " | <b>ATK:</b> 1 | <b>ATK&nbsp;CLASS:</b> 1 | <b>DMG:</b> " . $dmgx . " | <b>RAD&nbsp;RESIST:</b> " . $radx . " | <b>MIND&nbsp;RESIST:</b> " . $mntx . " | <b>POISON&nbsp;RESIST:</b> " . $psnx . "&nbsp;]" . $notes; }
}

$finally = "<b>" . ucfirst($name) . ":</b> " . $stats . " " . $hisp . " is a " . $age . " " . strtolower($sex) . " " . strtolower($race) . $forming . " that is " . $trait1[mt_rand(0,9)] . " in appearance. " . $mutated . $hisp . " is generally " . $trait2[mt_rand(0,23)] . ", but also " . $trait3[mt_rand(0,7)] . ". " . $husp . " disposition is " . $trait4[mt_rand(0,9)] . " but " . strtolower($hisp) . " is " . $trait5[mt_rand(0,9)] . " by nature. " . $brave . $engy . $hisp . " can be perceived as " . $trait6[mt_rand(0,20)] . " when it comes to " . strtolower($husp) . " morality. " . $desire . $stuff;

return array($sex,$race,$form,$mutated,$finally,$name,$stats);

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function PABusiness($type,$game,$tech,$cash,$stock,$shelf)
{
	if ($game == "Mutant Future"){$section = "AND game LIKE '%MF%'";}
	else if ($game == "Broken Urthe"){$section = "AND game LIKE '%BU%'";}
	else {$section = "AND game LIKE '%PA%'";}

	if ($tech == 1){$goods = "WHERE (era='low' OR era='both')";}
	else if ($tech == 2){$goods = "WHERE (era='hi' OR era='both')";}
	else {$goods = "WHERE id>0";}

	if ($game == "Mutant Future"){
		$hut2 = array('Accipitoid', 'Android', 'Ant', 'Ape', 'Apeman', 'Baboon', 'Bat', 'Bat', 'Bear', 'Beast', 'Beetle', 'Bird', 'Boar', 'Camel', 'Canisoid', 'Castoroid', 'Catfish', 'Centipede', 'Cephalopoid', 'Chameleon', 'Charger', 'Chicken', 'Chitterling', 'Cobra', 'Cockroachoid', 'Coyote', 'Crab', 'Crocodile', 'Cyborg', 'Dog', 'Domer', 'Electrophant', 'Elephant', 'Eloi', 'Feeder', 'Ferret', 'Fishmen', 'Fungoid', 'Gecko', 'Goat', 'Goliath', 'Grizzly', 'Grub', 'Hawk', 'Hemofowl', 'Horse', 'Insect', 'Insectoid', 'Jellyfish', 'Kamata', 'Kanga', 'Kelper', 'Lasher', 'Leaper', 'Leech', 'Lion', 'Lizard', 'Lobstrosity', 'Mansquito', 'Mant', 'Medusoid', 'Meerkat', 'Morlock', 'Mule', 'Narcolep', 'Octopus', 'Ooze', 'Panther', 'Pantheroid', 'Pigmen', 'Piranha', 'Porcine', 'Puffball', 'Pufferoid', 'Python', 'Quench', 'Quicken', 'Rabboxen', 'Rat', 'Rattler', 'Rhagodessa', 'Rhinoceros', 'Rockfish', 'Salamander', 'Scorpion', 'Scuirinoid', 'Serpentoid', 'Shark', 'Sheep', 'Shrew', 'Slasher', 'Sloth', 'Slunk', 'Snake', 'Spider', 'Spidergoat', 'Sporer', 'Squid', 'Stalker', 'Sturgeon', 'Suidoid', 'Tiger', 'Toad', 'Tripod', 'Tuatara', 'Ventrilovine', 'Wailer', 'Weasel', 'Whale', 'Wolf', 'Worm', 'Wyrm', 'Xeno', 'Zunicorn');
	} else {
		$hut2 = array('Aklasaurus', 'Algorum', 'Antlerg', 'Ape', 'Atlantix', 'Attoid', 'Babuman', 'Barbuga', 'Barvul', 'Battanor', 'Beast', 'Beetle', 'Bird', 'Boargul', 'Boghound', 'Bruk', 'Bull', 'Burtos', 'Canna', 'Centidon', 'Chikunz', 'Coboar', 'Crabman', 'Crox', 'Cruler', 'Cyclops', 'Dracoshark', 'Drakorian', 'Draygun', 'Draygur', 'Dredlasaur', 'Dydra', 'Eleczard', 'Fish', 'Frogigator', 'Fruglum', 'Fungoid', 'Gargoil', 'Gargul', 'Gatordon', 'Giant', 'Gillard', 'Gorilus', 'Grizzly', 'Gublyn', 'Hawkan', 'Hoppler', 'Horsemen', 'Hound', 'Hydra', 'Insectoid', 'Intruder', 'Lamprey', 'Lion', 'Lizard', 'Lobber', 'Lokist', 'Mantaur', 'Marner', 'Mermen', 'Mirroco', 'Morlock', 'Mucktupus', 'Muskito', 'Mysticul', 'Ogre', 'Ooze', 'Ostradon', 'Porcubus', 'Radigator', 'Raxumar', 'Razorwhale', 'Rhondaran', 'Ripper', 'Rutan', 'Scortzer', 'Serpent', 'Shark', 'Sharktacle', 'Sharz', 'Sheel', 'Shellox', 'Shockeel', 'Shrukar', 'Slime', 'Sludgow', 'Sluskur', 'Snake', 'Snakemen', 'Spider', 'Sulk', 'Tentacle', 'Thorntus', 'Tiger', 'Tinora', 'Torus', 'Trapjaw', 'Troll', 'Turteldon', 'Tusker', 'Unicorn', 'Unihare', 'Vambear', 'Vampere', 'Weeder', 'Wisp', 'Wolf', 'Worm', 'Wrapper', 'Wulog', 'Xorbucon', 'Zombie', 'Zormites');
	}
	$hot2 = count($hut2)-1;
	$hut2 = $hut2[mt_rand(0,$hot2)];

	$hut3 = array('Steel', 'Wooden', 'Twisted', 'Rusty', 'Glowing', 'Radiated', 'Junky', 'Crazy', 'Eerie', 'Wild', 'Sleeping', 'Lone', 'Savage', 'Nuclear', 'Twin', 'Old', 'Dark', 'Needy', 'Wealthy', 'Common', 'Mutated', 'Slimy', 'Great', 'Smiling', 'Toxic', 'Gamma', 'Quiet', 'Jealous', 'Cheap', 'Broken', 'Hidden', 'Welded', 'New');
	$hut3 = $hut3[mt_rand(0,32)];


if ($type == 1) // ARMY SURPLUS ///////////////////////////////////////////////
{
	$hut1 = array('Army Surplus', 'Military Supply', 'Gun Shop', 'Weapon Wholesale', 'Soldier Gear', 'Arms & Armor', 'Army Depot', 'Hunting Shop', 'Firearms');
	$hut1 = $hut1[mt_rand(0,8)];

	if (mt_rand(1,100) > 30)
	{
		$hut2 = array('Outfitters', 'Sniper', 'Warrior', 'Soldier', 'Mercenary', 'Captain', 'Commando', 'General', 'Marine');
		$hut2 = $hut2[mt_rand(0,8)];
	}
	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Drunken', 'Leaping', 'Sleepy', 'Crazy', 'Angry', 'Dancing', 'Bloody', 'Running', 'Screaming', 'Growling', 'Mighty', 'Laughing', 'Broken', 'Wild');
		$hut3 = $hut3[mt_rand(0,13)];
	}
	$store = "AND store='Military'";
}
else if ($type == 2) // BAR ///////////////////////////////////////////////
{
	$hut1 = array('Club', 'Bar', 'Bar', 'Bar');
	$hut1 = $hut1[mt_rand(0,3)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Drunken', 'Leaping', 'Sleepy', 'Crazy', 'Angry', 'Dancing', 'Bloody', 'Running', 'Screaming', 'Growling', 'Mighty', 'Laughing', 'Broken', 'Wild');
		$hut3 = $hut3[mt_rand(0,13)];
	}
	$store = "AND store='Bar'";
}
else if ($type == 3) // TAILOR ///////////////////////////////////////////////
{
	$hut1 = array('Tailor', 'Tailor Shop', 'Sewing Shop', 'Fine Cloth', 'Clothing Shop', 'Dress Shop', 'Dresses');
	$hut1 = $hut1[mt_rand(0,6)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Wooly', 'Knitted', 'Needled', 'Stitched', 'Hooded', 'Dressed', 'Cloaked', 'Robed');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Tailor'";
}
else if ($type == 4) // DOCTOR ///////////////////////////////////////////////
{
	$hut1 = array('Medicine', 'Doctor', 'Physician', 'Hospital', 'Drug Store', 'Healer', 'Medic');
	$hut1 = $hut1[mt_rand(0,6)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Healing', 'Soothing', 'Nursing', 'Curing', 'Stitching', 'Drugged');
		$hut3 = $hut3[mt_rand(0,5)];
	}
	$store = "AND store='Medical'";
}
else if ($type == 5) // STABLES ///////////////////////////////////////////////
{
	$hut1 = array('Stables', 'Pets', 'Animals', 'Stables', 'Barn Yard', 'Animal Trainer', 'Stables');
	$hut1 = $hut1[mt_rand(0,6)];

	if ($game == "Broken Urthe"){$hut2 = array('Beast', 'Centidon', 'Cruler', 'Ostradon', 'Steed', 'Rider', 'Charger', 'Shellox');}
	else {$hut2 = array('Beast', 'Bull', 'Camel', 'Lion', 'Steed', 'Rider', 'Charger', 'Pony');}
	$hut2 = $hut2[mt_rand(0,7)];
	$store = "AND store='Stable'";
}
else if ($type == 6) // VEHICLE ///////////////////////////////////////////////
{
	$hut1 = array('Engineer', 'Metal Shop', 'Wheel', 'Transporation', 'Racer', 'Traveler');
	$hut1 = $hut1[mt_rand(0,5)];

	$store = "AND store='Vehicle'";
}
else if ($type == 7) // SUPPLIES ///////////////////////////////////////////////
{
	$hut1 = array('Pawn', 'Pawn Shop', 'Provisioner', 'Supplies', 'Equipment', 'Goods');
	$hut1 = $hut1[mt_rand(0,5)];

	$store = "AND store='Supplies'";
}
else if ($type == 8) // JUNK SHOP ///////////////////////////////////////////////
{
	$hut1 = array('Junk', 'Scrap', 'Garbage Pickers', 'Trash Heap', 'Salvage', 'Debris', 'Lost & Found', );
	$hut1 = $hut1[mt_rand(0,6)];

	$store = "Junk";
}
else if ($type == 9) // BANK ///////////////////////////////////////////////
{
	$hut1 = array('Bank', 'Bank', 'Vault', 'Vault', 'Treasury');
	$hut1 = $hut1[mt_rand(0,4)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Wealthy', 'Guarded', 'Safe', 'Shiny', 'Rich', 'Hoarding', 'Treasured', 'Locked', 'Chained', 'Watched', 'Bolted', 'Sealed', 'Keyed');
		$hut3 = $hut3[mt_rand(0,12)];
	}
	$store = "AND store='Bank'";
}
else if ($type == 10) // MECHANIC ///////////////////////////////////////////////
{
	$hut1 = array('Garage', 'Mechanics', 'Greasy', 'Nuts & Bolts', 'Engine Repair', 'Wooden Crafts');
	$hut1 = $hut1[mt_rand(0,5)];

	$store = "AND store='Mechanic'";
}
else if ($type == 11) // ROBOTS ///////////////////////////////////////////////
{
	$hut1 = array('Droid Shop', 'Mech Factory', 'Robot Repair', 'Android Market', 'Cyborg Surplus', 'Robotic Design');
	$hut1 = $hut1[mt_rand(0,5)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Iron', 'Steel', 'Rusty', 'Metallic', 'Computerized', 'Mechanical', 'Shiny', 'Haywired');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Robot'";
}

	include("db.php");

	$tabx = "<table border='0' cellpadding='0' style='border-collapse: collapse' width='100%'>";

	if ($store == "Junk")
	{
		$junky = 50;
		while ($junky > 0) :
			$junky = $junky - 1;
			$junker = PickJunk();
			if ((mt_rand(1,100) <= $stock) || ($ary[item] == "Cloning Tube (Cloning Services)"))
			{
				if ($junker[6] > 0){$price = $junker[6];} else {$price = 1;}
				$tablc = $tablc + 1;
				if ($tablc == 1){$tabx = $tabx . "<tr>";}
				if (($ary[qty] != 1) && ($shelf  > 0)){$myshelf = " - [" . mt_rand(1,10) . "]";} else {$myshelf = "";}
				$tabx = $tabx . "<td NOWRAP><font size='2'>" . ucwords($junker[0]) . " - " . number_format($price) . "" . $cash . "</font></td>";
				if ($tablc == 3){$tabx = $tabx . "</tr>"; $tablc = 0;}
			}
		endwhile;
	}
	else
	{
		$qry = "SELECT * FROM store_items $goods $section $store ORDER BY item";
		$res = wz_query( $connection, $qry ); /* qry. */
		while ($ary=wz_fetch_assoc($res)) :
			if ((mt_rand(1,100) <= $stock) || ($ary[item] == "Cloning Tube (Cloning Services)"))
			{
				$tablc = $tablc + 1;
				if ($tablc == 1){$tabx = $tabx . "<tr>";}
				if (($ary[qty] != 1) && ($shelf  > 0)){$myshelf = " - [" . mt_rand(1,10) . "]";} else {$myshelf = "";}
				$tabx = $tabx . "<td NOWRAP><font size='2'>" . $ary[item] . " - " . number_format($ary[cost]) . "" . $cash . $myshelf . "</font></td>";
				if ($tablc == 3){$tabx = $tabx . "</tr>"; $tablc = 0;}
			}
		endwhile;
	}

		if ($tablc == 1){$cycle = 3;} else if ($tablc == 2){$cycle = 2;}

		while ($cycle > 0) :

			$tabx = $tabx . "<td NOWRAP><font size='2'>&nbsp;</font></td>";

			$cycle = $cycle - 1;	$cicl = 1;

		endwhile;

			if ($cicl == 1){$tabx = $tabx . "</tr>";}

		$tabx = $tabx . "</table>";

if (mt_rand(1,100) > 30){$prex = "The ";} else {$prex = "";}
$house = $prex . "" . $hut3 . " " . $hut2 . " " . $hut1;

return array($house,$tabx);

}

?>