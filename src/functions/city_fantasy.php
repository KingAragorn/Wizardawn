<?php

function GameLvlChar($game,$lvl)
{
	if ( $game == "Swords & Six-Siders")
	{
		$value = mt_rand(1,2);
		if ($lvl == 2){ $value = mt_rand(2,3); }
		if ($lvl == 3){ $value = mt_rand(3,4); }
		if ($lvl == 4){ $value = mt_rand(4,6); }
	}
	else
	{
		$value = mt_rand(1,5);
		if ($lvl == 2){ $value = mt_rand(4,9); }
		if ($lvl == 3){ $value = mt_rand(5,10); }
		if ($lvl == 4){ $value = mt_rand(10,20); }
	}
	return $value;
}

function dressMeup($sex,$race,$class) ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	//////////////////////////////////////////////////////////////////////////////////// PERSONALITY
	$personality = mt_rand(1,8);
		if ($class == "Paladin"){$trait3 = array('modest', 'friendly', 'well-spoken', 'diplomatic', 'courteous', 'friendly', 'well-spoken', 'courteous');}
		else if ($personality < 6){$trait3 = array('modest', 'egoist and arrogant', 'friendly', 'aloof', 'hostile', 'well-spoken', 'diplomatic', 'abrasive');}
		else if ($personality < 8){$trait3 = array('forceful', 'overbearing', 'friendly', 'blustering', 'antagonistic', 'rude', 'rash', 'diplomatic');}
		else {$trait3 = array('retiring', 'reserved', 'friendly', 'aloof', 'hostile', 'rude', 'courteous', 'solitary and secretive');}

	//////////////////////////////////////////////////////////////////////////////////// TRAITS
	if ($class == "Paladin")
	{
		$trait1 = array('clean', 'immaculate', 'average');
		$trait2 = array('optimistic', 'pessimistic', 'helpful and kindly', 'attentive', 'curious and inquisitive', 'trusting', 'suspicious and cautious', 'precise and exacting', 'perceptive', 'opinionated');
		$trait4 = array('cheerful', 'compassionate', 'humble', 'proud', 'even tempered', 'easy going');
		$trait5 = array('soft-hearted', 'forgiving', 'honorable', 'truthful');
		$trait6 = array('virtuous', 'normal', 'normal');
			$trait1x = $trait1[mt_rand(0,2)];
			$trait2x = $trait2[mt_rand(0,9)];
			$trait3x = $trait3[mt_rand(0,7)];
			$trait4x = $trait4[mt_rand(0,5)];
			$trait5x = $trait5[mt_rand(0,3)];
			$trait6x = $trait6[mt_rand(0,2)];
	}
	else
	{
		$trait1 = array('dirty', 'clean', 'unkempt', 'immaculate', 'rough', 'ragged', 'dandyish', 'foppish', 'average', 'imposing');
		$trait2 = array('optimistic', 'pessimistic', 'hedonistic', 'altruistic', 'helpful and kindly', 'careless', 'capricious and mischievous', 'attentive', 'curious and inquisitive', 'moody', 'trusting', 'suspicious and cautious', 'precise and exacting', 'perceptive', 'opinionated', 'violent and warlike', 'studious', 'foul and barbaric', 'cruel and callous', 'a prankster', 'servile and obsequious', 'fanatical and obsessive', 'malevolent', 'loquacious');
		$trait4 = array('cheerful', 'morose', 'compassionate', 'insensitive', 'humble', 'proud', 'even tempered', 'hot tempered', 'easy going', 'harsh');
		$trait5 = array('soft-hearted', 'forgiving', 'hard-hearted', 'unforgiving', 'jealous', 'vengeful', 'scrupulous', 'honorable', 'truthful', 'deceitful');
		$trait6 = array('aesthetic', 'virtuous', 'normal', 'normal', 'lusty', 'lusty', 'lustful', 'immoral', 'amoral', 'aesthetic', 'virtuous', 'normal', 'normal', 'lusty', 'lusty', 'lustful', 'immoral', 'amoral', 'perverted', 'sadistic', 'depraved');
			$trait1x = $trait1[mt_rand(0,9)];
			$trait2x = $trait2[mt_rand(0,23)];
			$trait3x = $trait3[mt_rand(0,7)];
			$trait4x = $trait4[mt_rand(0,9)];
			$trait5x = $trait5[mt_rand(0,9)];
			$trait6x = $trait6[mt_rand(0,20)];
	}
		//////////////////////////////////////////////////////////////////////////////////// HAIR STYLE
		$haircolor = array('black', 'brown', 'red', 'auburn', 'gray', 'white', 'blonde');
			$hcolor = $haircolor[mt_rand(0,6)];

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
				else if (($class == "ELF") || ($class == "Elf")){ $beard=0; $mustc=0; $hare = $hairy[mt_rand(1,2)]; }
			}
			else
			{
				$gender = "Female";
				$hisp = "She";
				$husp = "Her";
				$hairy = array('braided', 'long', 'short', 'curly');
				$hare = $hairy[mt_rand(0,3)];
				if (($class == "ELF") || ($class == "Elf")){ $hare = $hairy[mt_rand(1,2)]; }
			}
			
				if ($hare != "bald"){$hair1 = "has " . $hare . " " . $hcolor . " hair";}
				else {$hair1 = "is bald"; $hair2 = ", " . $hcolor;}

				if ($beard == 1){$hairr = $hair1 . " with a " . $bhair[mt_rand(0,2)] . "" . $hair2 . " beard and moustache";}
				else if (($beard != 1) && ($mustc == 1)){$hairr = $hair1 . " with a " . $bhair[mt_rand(0,2)] . "" . $hair2 . " moustache";}
				else if ($hare == "bald"){$hairr = $hair1 . " with no facial hair at all";}
				else {$hairr = $hair1;}

		//////////////////////////////////////////////////////////////////////////////////// BRAVERY
		$bravery = mt_rand(1,8); if ($class == "Paladin"){$bravery = mt_rand(1,5);}
		if ($bravery == 4){$brave = $hisp . " is quite brave in the face of danger. ";}
		else if ($bravery == 5){$brave = $hisp . " is quite fearless in the face of danger. ";}
		else if ($bravery == 6){$brave = $hisp . " is quite foolhardy in the face of danger. ";}
		else if ($bravery == 7){$brave = $hisp . " is quite cowardly in the face of danger. ";}
		else if ($bravery == 8){$brave = $hisp . " is quite timid in the face of danger. ";}

		//////////////////////////////////////////////////////////////////////////////////// ENERGY
		$energy = mt_rand(1,8); if ($class == "Paladin"){$energy = mt_rand(1,6);}
		if ($energy == 4){$engy = $hisp . " comes off as being quite energetic. ";}
		else if ($energy == 5){$engy = $hisp . " comes off as being quite motivated. ";}
		else if ($energy == 6){$engy = $hisp . " comes off as being quite driven. ";}
		else if ($energy == 7){$engy = $hisp . " comes off as being quite slothful. ";}
		else if ($energy == 8){$engy = $hisp . " comes off as being quite lazy. ";}

		//////////////////////////////////////////////////////////////////////////////////// INTERESTS
		$interests = array('none', 'none', 'none', 'religion', 'legends', 'history', 'nature', 'exotic animals', 'hunting', 'fishing', 'handicrafts', 'politics', 'wines and spirits', 'cooking', 'gambling', 'herbalism', 'collector', 'collector', 'collector', 'collector');
		$interest = $interests[mt_rand(0,19)];
		 if ($birth == "child"){$interest = "none";}
		  if ($interest != "none")
		  {
			if ($interest == "collector")
			{
				$collects = array('plants and flowers', 'knives and daggers', 'swords', 'weapons', 'shields and armor', 'books and scrolls', 'minerals and gems', 'ornaments and jewelry', 'coins and tokens', 'trophies and skins', 'porcelain, china and crystal', 'artwork');
				$desire = $hisp . " is a collector of " . $collects[mt_rand(0,11)] . ".&nbsp; ";
			}
			else
			{
				$desire = $hisp . " has a great interest in " . $interest . ".&nbsp; ";
			}
		  }

	return $hisp . " is " . $trait1x . " in appearance, " . $hairr . ", and is generally " . $trait2x . ", but also " . $trait3x . ". " . $husp . " disposition is " . $trait4x . " but " . strtolower($hisp) . " is " . $trait5x . " by nature. " . $brave . $engy . $hisp . " can be perceived as " . $trait6x . " when it comes to " . strtolower($husp) . " morality. " . $desire;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function wizardCitizen($game,$race,$might1,$might2,$dres,$poss,$age,$sex)
{
	if ($race == "none")
	{
		switch (mt_rand(0,4))
		{
			case 0:	$race = "Dwarf";	break;
			case 1:	$race = "Elf";		break;
			case 2:	$race = "Gnome";	break;
			case 3:	$race = "Halfling";	break;
			case 4:	$race = "Human";	break;
		}
	}
	else {$race = $race;}

//////////////////////////////////////////////////////////////////////////////////// AGE
$ages = array('young', 'young', 'young', 'mature', 'mature', 'mature', 'mature', 'middle-aged', 'old');
	if ($age != "child"){$age = $ages[mt_rand(0,8)];}

//////////////////////////////////////////////////////////////////////////////////// HEALTH
	$hitdice = array('1', '1', '1', '1', '1', '2', '2', '2', '3', '4');
	$hd = $hitdice[mt_rand(0,9)];
	$hp = $hd * mt_rand($might1,($might2*$might1));
	if ($age == "child"){$hd = 1; $hp = ceil($hd * mt_rand($might1,($might2*$might1))/2);}

//////////////////////////////////////////////////////////////////////////////////// DAMAGE
$damage = array('3', '3', '3', '3', '4', '4', '4', '6');
	$damages = $damage[mt_rand(0,7)];
	if ($birth == "child"){$damages = 2;}

//////////////////////////////////////////////////////////////////////////////////// ARMOR
if ($game == "Labyrinth Lord")
{
	$armors = array('9', '9', '9', '9', '9', '8', '8', '7');
	$armor = $armors[mt_rand(0,7)];
	if ($birth == "child"){$armor = 9;}
}
else
{
	$armors = array('10', '10', '10', '10', '10', '9', '9', '8');
	$armor = $armors[mt_rand(0,7)];
	if ($birth == "child"){$armor = 10;}
}

//////////////////////////////////////////////////////////////////////////////////// INTELLECT
$iq = array('Low', 'Average', 'Average', 'Average', 'Average', 'Very', 'Very', 'High');

//////////////////////////////////////////////////////////////////////////////////// MORALITY
if ($game != "Fantasy"){$alignment = array('Lawful','Lawful','Lawful','Neutral','Neutral','Neutral','Neutral','Neutral','Neutral', 'Chaotic');}
else {$alignment = array('Good','Good','Good','Fair','Fair','Fair','Fair','Fair','Fair', 'Evil');}

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

//////////////////////////////////////////////////////////////////////////////////// HAIR STYLE
$haircolor = array('black', 'brown', 'red', 'auburn', 'gray', 'white', 'blonde');
	$hcolor = $haircolor[mt_rand(0,6)];
	if ($birth == "child"){$haircolor = array('black', 'brown', 'red', 'auburn', 'blonde'); $hcolor = $haircolor[mt_rand(0,4)];}

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

		if (($hare != "bald") || ($race == "Elf")){$hair1 = $hisp . " has " . $hare . ", " . $hcolor . " hair";}
		else {$hair1 = $hisp . " is bald"; $hair2 = ", " . $hcolor;}

		if ($beard == 1){$hairr = $hair1 . " with a " . $bhair[mt_rand(0,2)] . "" . $hair2 . " beard and moustache.&nbsp; ";}
		else if (($beard != 1) && ($mustc == 1)){$hairr = $hair1 . " with a " . $bhair[mt_rand(0,2)] . "" . $hair2 . " moustache.&nbsp; ";}
		else if ($hare == "bald"){$hairr = $hair1 . " with no facial hair at all.&nbsp; ";}
		else {$hairr = $hair1 . ".&nbsp; ";}

//////////////////////////////////////////////////////////////////////////////////// BRAVERY
$bravery = mt_rand(1,8);
if ($bravery == 4){$brave = $hisp . " is quite foolhardy in the face of danger. ";}
else if ($bravery == 5){$brave = $hisp . " is quite brave in the face of danger. ";}
else if ($bravery == 6){$brave = $hisp . " is quite fearless in the face of danger. ";}
else if ($bravery == 7){$brave = $hisp . " is quite cowardly in the face of danger. ";}
else if ($bravery == 8){$brave = $hisp . " is quite timid in the face of danger. ";}

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
		$collects = array('plants and flowers', 'knives and daggers', 'swords', 'weapons', 'shields and armor', 'books and scrolls', 'minerals and gems', 'ornaments and jewelry', 'coins and tokens', 'trophies and skins', 'porcelain, china and crystal', 'artwork');
	    $desire = $hisp . " is a collector of " . $collects[mt_rand(0,11)] . ".&nbsp; ";
	}
	else
	{
		$desire = $hisp . " has a great interest in " . $interest . ".&nbsp; ";
	}
  }

//////////////////////////////////////////////////////////////////////////////////// NAMES
if (mt_rand(1,100) > 75){ $name = genericName(); }
else if (($race == "Dwarf") && (mt_rand(1,100) > 50)){ $name = dwarfName(); }
else if ((($race == "Gnome") || ($race == "Halfling") || ($race == "Hobbit")) && (mt_rand(1,100) > 50)){ $name = gnomeName(); }
else if (($race == "Elf") && (mt_rand(1,100) > 50)){ $name = elfName(); }
else
{
	if ($gender == "Male"){$dcn = mt_rand(0,1);} else {$dcn = mt_rand(1,2);}
	switch ($dcn)
	{
		case 0:	$name = MaleName();			break;
		case 1: $name = genericName();		break;
		case 2:	$name = FemaleName();		break;
	}
}

$names = $name;

//////////////////////////////////////////////////////////////////////////////////// EQUIPMENT
	$hcolor = array('blue-green', 'black', 'blue', 'gray', 'dark-gray', 'light-gray', 'green', 'light-gray', 'red', 'brown', 'orange', 'yellowish-green', 'tan', 'light-blue', 'yellow', 'purple', 'light-purple', 'dark-purple', 'light-green', 'forest-green', 'white', 'dark-green', 'dark-red', 'light-red', 'light-brown', 'dark-brown');
	$bcolor = array('black', 'dark-brown', 'gray', 'dark-green', 'dark-red', 'brown', 'tan');
	$scolor = array('gold', 'silver', 'bronze', 'copper', 'platinum', 'metal', 'iron');

		$packs = array('small cloth bag', 'small leather bag', 'belt pouch', 'concealed pouch', 'cloth sack', 'leather sack', 'small wooden box', 'small metal box');
		$things = array('thistle burrs_10_ea', 'mouse', 'rat', 'rock_8_ea', 'twine_20_ft', 'quill', 'clay flask of alcohol', 'silver arrowhead', 'wooden hair brush', 'tinderbox', 'acorns_4_ea', 'cork', 'wooden comb', 'wooden figurine', 'small pouch', 'vial of insect repellent', 'list of alchemy reagents', 'small wooden flute', 'dead bug', 'pair of bone dice', 'set of wooden teeth', 'deed to a ship', 'feather', 'deck of playing cards', 'invitation to a royal event', 'canvas bag', 'green snake (6 in long)', 'glass magnifying lens', 'small glass bottle', 'mousetrap', 'iron keys_4_ea', 'cheap cigars_4_ea', 'copper wire_6_ft', 'orange peels', 'cheese', 'small dictionary', 'small portrait of a woman', 'small portrait of a man', 'shelled nuts_18_ea', 'bag of beans_100_ea', 'dart', 'wooden pipe', 'scarf', 'box of matches_100_ea', 'silver animal figurine', 'flask of water', 'yarn_60_ft', 'handful of seeds_10_ea', 'glass inkpot', 'ball of string', 'sheet of parchment', 'note regarding a secret meeting', 'ransom note', 'compass', 'love letter', 'wooden case containing paints', 'cabbage', 'small mirror', 'rodent skull', 'soiled rag', 'vial of perfume', 'fake treasure map', 'jar of glue', 'message about a rebellion', 'onion', 'lump of coal', 'thimble', 'wooden snuff box_4_pinch', 'one-quarter pound sack of oats', 'brass knuckles', 'turnip', 'wooden spoon', 'flyer of a wanted criminal', 'stiff parchment business card', 'map to a nearby dungeon', 'smoke powder', 'rusty iron nails_12_ea', 'vial of mild poison', 'bent copper piece', 'small leather book (black, 50 pg)', 'rubber ball', 'leather strap', 'list of corrupt guards', 'promissory note_1000_gp', 'small toad', 'letter from_person', 'sealed letter_person', 'rawhide necklace', 'ornate iron key', 'cowhide wallet', 'long pin', 'book containing prayers', 'tattered map of the area', 'jerky_4_ea', 'small slip of parchment', 'small knife', 'wooden brooch', 'candle', 'pouch of sand', 'glass eye', 'wooden wrist sundial', 'chess piece', 'poison antidote', 'silk handkerchief', 'lint', 'cloth napkin', 'stone arrowhead', 'small silver holy symbol', 'small blank cards_24_ea', 'egg', 'clump of dirt', 'brass tacks_16_ea', 'key to a crypt', 'pair of cloth gloves', 'wooden stake', 'bread', 'map for castle secret entrance', 'sand', 'wooden vial of spice', 'deck of tarot cards', 'silver spoon', 'flower', 'colored glass spheres_8_ea - 1 inch in diameter', 'treasure map', 'potato', 'cloth bag of crushed herbs', 'carrot', 'flask of cheap wine', 'personal diary', 'small lead figurine', 'radish', 'apple', 'lock of hair', 'rabbit foot', 'handkerchief');
		$junky = array('apricot', 'bag of berries', 'bag of nuts', 'bar of soap', 'beeswax', 'belladonna_8_oz', 'bone scrollcase', 'bottle of holy water', 'candle', 'carrot', 'chalk', 'cherries_8_ea', 'evil holy symbol', 'clay cup', 'climbing peg', 'cloth dye', 'corncob pipe', 'crystal vial', 'dice', 'empty spell book', 'feverfew_8_oz', 'fife', 'fish hook', 'flint & steel', 'garlic', 'glass flask', 'glass tube', 'glue_8_oz', 'hair dye', 'hairbrush', 'hand bell', 'hollyhock_8_oz', 'incense stick', 'ink_8_oz', 'lantern', 'leather flask', 'leather scrollcase', 'lemon', 'lettuce', 'loaded dice', 'manacles', 'metal file', 'orange', 'padlock with key', 'scroll with ancient text', 'spell scroll', 'fake gold coin', 'paint brush', 'peach', 'perfume_8_oz', 'pewter cup', 'pewter holy symbol', 'pipe tobacco', 'pliers', 'prayer beads', 'quill', 'rue_8_oz', 'sage_8_oz', 'scissors', 'sewing needle', 'sheet of parchment', 'pouch of colored sand', 'sheet of vellum', 'silver cup', 'silver holy symbol', 'sling with_20_bullets', 'small bell', 'small leather bag', 'small mirror', 'spiderwort_8_oz', 'copper necklace_10_cp', 'silver necklace_10_sp', 'gold necklace_10_gp', 'platinum necklace_10_pp', 'copper ring_10_cp', 'silver ring_10_sp', 'gold ring_10_gp', 'platinum ring_10_pp', 'strawberries_5_ea', 'tongs', 'torch', 'turnip', 'tweezers', 'waterskin', 'whetstone', 'whistle', 'wolfsbane_8_oz', 'wooden cup', 'wooden holy symbol', 'yarrow_8_oz');
		$thingz = count($things)-1;
		$junks = count($junky)-1;

		$royalty = array('king', 'queen', 'prince', 'princess', 'baron', 'mayor', 'govenor', 'priest', 'noble', 'emperor', 'duke', 'duchess', 'wizard', 'knight', 'necromancer', 'wanted criminal');

		if (mt_rand(1,100) > 0)
		{
			$thing1 = $things[mt_rand(0,$thingz)]; $trinket = 1;
			$thing1 = explode("_", $thing1);
			if ($thing1[1] == "person"){$thing1 = ", " . $thing1[0] . " a " . $royalty[mt_rand(0,15)]; }
			else if ($thing1[1] > 0){$thing1 = ", " . $thing1[0] . " (" . mt_rand(1,$thing1[1]) . " " . $thing1[2] . ")";}
			else {$thing1 = ", " . $thing1[0];}
		}
		if (mt_rand(1,100) > 40)
		{
			$thing2 = $things[mt_rand(0,$thingz)]; $trinket = 1;
			$thing2 = explode("_", $thing2);
			if ($thing2[1] == "person"){$thing2 = ", " . $thing2[0] . " from a " . $royalty[mt_rand(0,15)]; }
			else if ($thing2[1] > 0){$thing2 = ", " . $thing2[0] . " (" . mt_rand(1,$thing2[1]) . " " . $thing2[2] . ")";}
			else {$thing2 = ", " . $thing2[0];}
		}
		if (mt_rand(1,100) > 30)
		{
			$thing3 = $junky[mt_rand(0,$junks)]; $trinket = 1;
			$thing3 = explode("_", $thing3);
			if ($thing3[1] > 0){$thing3 = ", " . $thing3[0] . " (" . mt_rand(1,$thing3[1]) . " " . $thing3[2] . ")";}
			else {$thing3 = ", " . $thing3[0];}
		}
		if (mt_rand(1,100) > 80)
		{
			$weapon = array('knife', 'dagger', 'stilleto', 'blackjack', 'club', 'short sword', 'darts_3_ea', 'hand axe', 'razor', 'sling_10_stones');
			$thing4 = $weapon[mt_rand(0,9)]; $trinket = 1;
			$thing4 = explode("_", $thing4);
			if ($thing4[1] > 0){$thing4 = ", " . $thing4[0] . " (" . mt_rand(2,$thing4[1]) . " " . $thing4[2] . ")";}
			else {$thing4 = ", " . $thing4[0];}
		}
		if (mt_rand(1,100) > 60)
		{
			$coins = array('cp', 'sp');
			$trinket = 1;
			$thing5 = ", " . $packs[mt_rand(0,7)] . " with " . mt_rand(2,10) . "" . $coins[mt_rand(0,1)];
			if ((mt_rand(1,100) > 70) && ($poor != 1) && ($stage != 2))
			{
				$coinz = array('ep', 'gp', 'pp');
				$thing5 = $thing5 . " and " . mt_rand(2,10) . "" . $coinz[mt_rand(0,2)];
			}
		}
		if ((mt_rand(1,100) > 80) && ($poor != 1) && ($stage != 2))
		{
			$gem1 = array('alexandrite', 'amethyst', 'azurite', 'black opal', 'black star sapphire', 'blue diamond', 'blue sapphire', 'blue-white diamond', 'canary diamond', 'chalcedony', 'chrysoprase', 'coral', 'emerald', 'fiery yellow corundum', 'freshwater pearl', 'golden pearl', 'green emerald', 'hematite', 'jacinth', 'jasper', 'malachite', 'moss agate', 'onyx', 'pink diamond', 'red spinel', 'rich purple corundum', 'rose quartz', 'sardonyx quartz', 'smoky quartz', 'star ruby', 'tourmaline', 'violet garnet', 'white pearl');
			$gem2 = array('amber', 'aquamarine', 'banded agate', 'black pearl', 'bloodstone', 'blue quartz', 'blue star sapphire', 'brown diamond', 'carnelian', 'chrysoberyl', 'citrine', 'deep blue spinel', 'eye agate', 'fire opal', 'garnet', 'golden yellow topaz', 'green spinel', 'iolite', 'jade', 'lapis lazuli', 'moonstone', 'obsidian', 'peridot', 'pink pearl', 'rhodochrosite', 'rock crystal', 'sard quartz', 'silver pearl', 'star rose quartz', 'tiger eye', 'turquoise', 'white opal', 'zircon');

			$trinket = 1;
			$thing6 = ", " . $packs[mt_rand(0,7)] . " with precious stones (" . $gem1[mt_rand(0,32)] . " - " . mt_rand(1,5) . "ea worth " . mt_rand(100,500) . "gp)";
			if (mt_rand(1,100) > 80)
			{
				$coinz = array('gp', 'pp');
				$thing6 = $thing6 . " and (" . $gem2[mt_rand(0,32)] . " - " . mt_rand(1,5) . "ea worth " . mt_rand(100,500) . "gp)";
			}
		}

		$feet = array('boots', 'fur boots', 'sandals', 'thigh boots', 'shoes');
			$w_shoe = ", " . $bcolor[mt_rand(0,6)] . " " . $feet[mt_rand(0,4)];

		$pants = array('kilt', 'long pants', 'short pants', 'long pants', 'short pants', 'long pants', 'short pants', 'skirt');
			if ($sex == "Female"){$pantc = 7;} else {$pantc = 6;}
			$w_legs = ", " . $hcolor[mt_rand(0,25)] . " " . $pants[mt_rand(0,$pantc)];

		$head = array('feathered hat', 'floppy hat', 'skullcap', 'tricorne hat', 'wide-brim hat', 'cap', 'bandana', 'bonnet');
			if ($sex == "Female"){$hatc = 7;} else {$hatc = 6;}
			if (mt_rand(1,100) > 60){$w_head = ", " . $hcolor[mt_rand(0,25)] . " " . $head[mt_rand(0,$hatc)];} else {$w_head = "";}

		$robe = array('robe', 'cloak');
			if (mt_rand(1,100) > 80){$w_robe = ", " . $hcolor[mt_rand(0,25)] . " " . $robe[mt_rand(0,1)];} else {$w_robe = "";}

		if (mt_rand(1,100) > 60)
		{
			$w_belt = ", a " . $bcolor[mt_rand(0,6)] . " belt";
			if (mt_rand(1,100) > 60){$w_belt = $w_belt . " with a " . $scolor[mt_rand(0,6)] . " buckle";}

		} else {$w_belt = "";}

		$shirt = array('fancy shirt', 'formal shirt', 'doublet', 'tunic', 'shirt', 'plain dress', 'gilded dress', 'fancy dress');
			if ($sex == "Female"){$shirtc = 7;} else {$shirtc = 4;}
			$dresses = mt_rand(0,$shirtc); if ($dresses > 4){$w_legs = "";}
			$w_vest = ", and a " . $hcolor[mt_rand(0,25)] . " " . $shirt[$dresses];

		if ($dres > 0){$stuff = $w_shoe . "" . $w_belt . "" . $w_legs . "" . $w_head . "" . $w_robe . "" . $w_vest; $stuff = substr($stuff, 2); $stuff = "DRESSED IN: " . $stuff . "."; }

		if (($trinket > 0) && ($poss > 0))
		{
			$things = $thing1 . "" . $thing2 . "" . $thing3 . "" . $thing4 . "" . $thing5 . "" . $thing6;
			$things = substr($things, 2);
			$stuff = $stuff . " POSSESSIONS: " . $things . ".";
		}


//////////////////////////////////////////////////////////////////////////////////// ALL DONE
if ($game == "Labyrinth Lord")
{
	$stats = "&nbsp;[&nbsp;<b>AC:</b>&nbsp;" . $armor . "; <b>HD:</b>&nbsp;" . $hd. "; <b>HP:</b>&nbsp;" . $hp. "; <b>AT:</b>&nbsp;1; <b>DMG:</b>&nbsp;1d" . $damages . "; <b>SV:</b>&nbsp;F" . $hd . "; <b>AL:</b>&nbsp;" . $alignment[mt_rand(0,9)] . "; <b>INT:</b>&nbsp;" . $iq[mt_rand(0,7)] . "&nbsp;] ";
}
else
{
	$stats = "&nbsp;[&nbsp;<b>AC:</b>&nbsp;" . $armor . "; <b>HD:</b>&nbsp;" . $hd. "; <b>HP:</b>&nbsp;" . $hp. "; <b>Atk:</b>&nbsp;1; <b>Dmg:</b>&nbsp;1d" . $damages . "; <b>Save:</b>&nbsp;Lvl " . $hd. "; <b>AL:</b>&nbsp;" . $alignment[mt_rand(0,9)] . "; <b>Int:</b>&nbsp;" . $iq[mt_rand(0,7)] . "&nbsp;] ";
}

$finally = "<b>" . ucfirst($name) . ":</b>&nbsp;" . $stats . " " . $hisp . " is a " . $age . " " . strtolower($sex) . " " . strtolower($race) . " that is " . $trait1[mt_rand(0,9)] . " in appearance. " . $hairr . " " . $hisp . " is generally " . $trait2[mt_rand(0,23)] . ", but also " . $trait3[mt_rand(0,7)] . ". " . $husp . " disposition is " . $trait4[mt_rand(0,9)] . " but " . strtolower($hisp) . " is " . $trait5[mt_rand(0,9)] . " by nature. " . $brave . $engy . $hisp . " can be perceived as " . $trait6[mt_rand(0,20)] . " when it comes to " . strtolower($husp) . " morality. " . $desire . $stuff;

return array($sex,$race,$finally,$name,$stats);
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function wizardBusiness($type,$game,$stock,$jack,$columns,$shelf)
{
  $hut2 = array('Badger', 'Basilisk', 'Bear', 'Boar', 'Bufallo', 'Bugbear', 'Bull', 'Centaur', 'Chimera', 'Cloud Giant', 'Crocodile', 'Cyclops', 'Demon', 'Devil', 'Dog', 'Dragon', 'Drake', 'Dryad', 'Dwarf', 'Elephant', 'Elf', 'Ettin', 'Fire Giant', 'Fish', 'Frog', 'Frost Giant', 'Gargoyle', 'Genie', 'Gnoll', 'Gnome', 'Goblin', 'Gorgon', 'Griffin', 'Hag', 'Hobbit', 'Harpy', 'Hell Hound', 'Hill Giant', 'Hippogriff', 'Hippopotamus', 'Hobbit', 'Hobgoblin', 'Horse', 'Hydra', 'Imp', 'Jackal', 'Kobold', 'Kraken', 'Leprechaun', 'Lion', 'Lizard', 'Manticore', 'Mephit', 'Minotaur', 'Mule', 'Naga', 'Nixie', 'Nymph', 'Bullywug', 'Ogre', 'Orc', 'Owlbear', 'Pegasus', 'Phoenix', 'Pixie', 'Purple Worm', 'Quickling', 'Rust Monster', 'Scorpion', 'Serpent', 'Reaper', 'Snake', 'Sphinx', 'Spider', 'Sprite', 'Stone Giant', 'Storm Giant', 'Succubus', 'Tiger', 'Titan', 'Toad', 'Treant', 'Triton', 'Troglodyte', 'Troll', 'Turtle', 'Unicorn', 'Walrus', 'Weasel', 'Werewolf', 'Whale', 'Wisp', 'Wolf', 'Wolverine', 'Wyrm', 'Wyvern', 'Xorn', 'Yeti');
  $hut2 = $hut2[mt_rand(0,97)];

   if (mt_rand(1,100) > 70)
   {
	$hut2 = array('Adventurer', 'Axe', 'Bandit', 'Barbarian', 'Bard', 'Baron', 'Berserker', 'Claw', 'Club', 'Coin', 'Conjurer', 'Dagger', 'Dancer', 'Druid', 'Dutchess', 'Eye', 'Fighter', 'Hammer', 'Helm', 'Hermit', 'Hunter', 'Idol', 'Jester', 'King', 'Knife', 'Knight', 'Mace', 'Mage', 'Magician', 'Monk', 'Nail', 'Pirate', 'Priest', 'Prince', 'Princess', 'Prophet', 'Queen', 'Ranger', 'Scout', 'Shield', 'Singer', 'Sorcerer', 'Sword', 'Thief', 'Tracker', 'Tree', 'Warlock', 'Warrior', 'Whip', 'Witch', 'Wizard', 'Staff');
	$hut2 = $hut2[mt_rand(0,51)];
   }

  $hut3 = array('Steel', 'Wooden', 'Iron', 'Bronze', 'Silver', 'Gold', 'Copper', 'Stone', 'Platinum', 'Wild', 'Sleeping', 'Lone', 'Savage', 'Scarlett', 'Twin', 'Old', 'Dark', 'Needy', 'Wealthy', 'Common', 'Cursed', 'Elegant', 'Great', 'Smiling', 'Keen', 'Needy', 'Quiet', 'Jealous', 'Cheap', 'Fiery', 'Hidden', 'Mighty', 'New');
  $hut3 = $hut3[mt_rand(0,32)];

  $store = "AND store='NONE'";

if ($type == 5) // BOWYER ///////////////////////////////////////////////
{
	$hut1 = array('Bows', 'Bowyer Shoppe', 'Fletcher Shoppe', 'Bow Shoppe', 'Archery Shoppe', 'Bow Crafters', 'Archery Supplies', 'Archer Store', 'Bow & Arrow Dealer');
	$hut1 = $hut1[mt_rand(0,8)];

	if (mt_rand(1,100) > 30)
	{
		$hut2 = array('Shot', 'Arrow', 'Bolt', 'Target', 'Trueshot', 'Aim', 'Feather', 'Tipped');
		$hut2 = $hut2[mt_rand(0,7)];
	}
	$store = "AND store='Bowyer'";
}
else if ($type == 1) // TAVERN ///////////////////////////////////////////////
{
	$hut1 = array('Alehouse', 'Tavern', 'Saloon', 'Bar', 'Stein', 'Keg', 'Barrel', 'Flagon', 'Mug');
	$hut1 = $hut1[mt_rand(0,8)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Drunken', 'Leaping', 'Sleepy', 'Crazy', 'Angry', 'Dancing', 'Bloody', 'Running', 'Screaming', 'Growling', 'Mighty', 'Laughing', 'Broken', 'Wild');
		$hut3 = $hut3[mt_rand(0,13)];
	}
	$store = "AND store='Tavern'";
}
else if ($type == 2) // INN ///////////////////////////////////////////////
{
	$hut1 = array('Inn', 'Inn', 'Inn', 'Inn', 'Inn', 'Hostel', 'Lodge', 'Boarding House', 'Cabin');
	$hut1 = $hut1[mt_rand(0,8)];
	$hut1 = $hut1 . " </b><i>(" . mt_rand(2,7) . "sp per night)</i><b>";

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Weary', 'Restful', 'Sleepy', 'Cozy', 'Tired', 'Restless', 'Dreamy', 'Silent', 'Calm', 'Faint', 'Yawning', 'Dead', 'Tuckered', 'Dozing', 'Tranquil');
		$hut3 = $hut3[mt_rand(0,14)];
	}
	$store = "AND store='Inn'";
}
else if ($type == 7) // TAILOR ///////////////////////////////////////////////
{
	$hut1 = array('Tailor', 'Tailor Shoppe', 'Sewing Shoppe', 'Fine Cloth', 'Clothing Shoppe', 'Dress Shoppe', 'Dresses');
	$hut1 = $hut1[mt_rand(0,6)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Wooly', 'Knitted', 'Needled', 'Stitched', 'Hooded', 'Dressed', 'Cloaked', 'Robed');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Tailor'";
}
else if ($type == 10) // ALCHEMIST ///////////////////////////////////////////////
{
	$hut1 = array('Herbalist', 'Herb Shoppe', 'Alchemist', 'Potion Shoppe', 'Elixirs', 'Alchemy Shoppe', 'Cauldron');
	$hut1 = $hut1[mt_rand(0,6)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Brewed', 'Boiled', 'Stirred', 'Fermented', 'Concocted', 'Brewed');
		$hut3 = $hut3[mt_rand(0,5)];
	}
	$store = "AND store='Alchemist'";
}
else if ($type == 4) // BLACKSMITH ///////////////////////////////////////////////
{
	$hut1 = array('Anvil', 'Smithy', 'Forge', 'Hammer', 'Blacksmith', 'Blacksmith', 'Smithy', 'Arms & Armor', 'Weapons', 'Shields');
	$hut1 = $hut1[mt_rand(0,9)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Melted', 'Steel', 'Iron', 'Dented', 'Armored', 'Metal', 'Smelted', 'Heated');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Blacksmith'";
}
else if ($type == 8) // STABLES ///////////////////////////////////////////////
{
	$hut1 = array('Stables', 'Pets', 'Animals', 'Stables', 'Barn Yard', 'Animal Trainer', 'Stables');
	$hut1 = $hut1[mt_rand(0,6)];

	$hut2 = array('Beast', 'Bear', 'Boar', 'Horse', 'Steed', 'Rider', 'Mule', 'Pony');
	$hut2 = $hut2[mt_rand(0,7)];

	$store = "AND store='Stables'";
}
else if ($type == 9) // CARPENTER ///////////////////////////////////////////////
{
	$hut1 = array('Carpenter', 'Wood Shoppe', 'Carvings', 'Woodworking', 'Carpentry Shoppe', 'Wooden Crafts');
	$hut1 = $hut1[mt_rand(0,5)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Oak', 'Cedar', 'Pine', 'Ash', 'Maple', 'Birch', 'Mahogany', 'Spruce');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Carpenter'";
}
else if ($type == 6) // LEATHER ///////////////////////////////////////////////
{
	$hut1 = array('Leatherworking', 'Tanning Shoppe', 'Leather Market', 'Stitched Hide', 'Rawhide', 'Thick Skins');
	$hut1 = $hut1[mt_rand(0,5)];

	$store = "AND store='Leatherworker'";
}
else if ($type == 11) // BAKER ///////////////////////////////////////////////
{
	$hut1 = array('Baked Goods', 'Bakery', 'Bake Shoppe', 'Foods', 'Food Market');
	$hut1 = $hut1[mt_rand(0,4)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Delightful', 'Tasty', 'Homemade', 'Oven Fresh', 'Toasty', 'Yummy', 'Savory', 'Sweet', 'Hungry', 'Starving');
		$hut3 = $hut3[mt_rand(0,9)];
	}
	$store = "AND store='Baker'";
}
else if ($type == 3) // PROVISIONER ///////////////////////////////////////////////
{
	$hut1 = array('Pawn', 'Pawn Shoppe', 'Provisioner', 'Supplies', 'Equipment', 'Goods');
	$hut1 = $hut1[mt_rand(0,5)];

	if ((mt_rand(1,100) > 30) && ($gamma != 2))
	{
		$hut3 = array('Adventurous', 'Impish', 'Treasured', 'Royal', 'Traveling', 'Cheap', 'Golden', 'Grand');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Provisioner'";
	if ($jack == 1){$store = "AND (store='Provisioner' OR store='Leatherworker')";}
	else if ($jack == 2){$store = "AND (store='Provisioner' OR store='Leatherworker' OR store='Bowyer')";}
}
else if ($type == 12) // LIBRARY ///////////////////////////////////////////////
{
	$hut1 = array('Books', 'Writings', 'Library', 'Atheneum', 'Scrolls', 'Book Shoppe');
	$hut1 = $hut1[mt_rand(0,5)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Cryptic', 'Ancient', 'Runic', 'Mysterious', 'Wizardly', 'Thinking', 'Royal', 'Scribbled');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Library'";
}
else if ($type == 16) // CHURCH ///////////////////////////////////////////////
{
	$hut2 = array('Temple', 'Church', 'Abbey', 'Shrine', 'Sanctuary', 'Temple', 'Church', 'House');
	$hut2 = $hut2[mt_rand(0,7)];

	$hut3 = array('Holy', 'Sacred', 'Virtuous', 'Devoted', 'Devout', 'Divine', 'Faithful', 'Glorious', 'Righteous', 'Saintly', 'Sanctified');
	$hut3 = $hut3[mt_rand(0,10)];

	$hut1 = array('the Gods', 'the Creator', 'the Father', 'the Mother', 'the Almighty', 'the Lord', 'the Goddess', 'the Maker', 'Devotion', 'Praise', 'Worship');
	$hut1 = $hut1[mt_rand(0,10)];
	$hut1 = "of " . $hut1;
	$store = "AND store='Church'";
}
else if ($type == 15) // BANK ///////////////////////////////////////////////
{
	$hut1 = array('Bank', 'Bank', 'Bank', 'Vault', 'Treasury');
	$hut1 = $hut1[mt_rand(0,4)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Wealthy', 'Guarded', 'Safe', 'Shiny', 'Rich', 'Hoarding', 'Treasured', 'Noble', 'Royal', 'Locked', 'Chained', 'Watched', 'Bolted', 'Sealed', 'Keyed');
		$hut3 = $hut3[mt_rand(0,14)];
	}
}
else if ($type == 14) // MUSIC ///////////////////////////////////////////////
{
	$hut1 = array('Music Shoppe', 'Instruments', 'Instrument Crafters', 'Drummer', 'Lute Makers', 'Stringed Instruments');
	$hut1 = $hut1[mt_rand(0,5)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Singing', 'Humming', 'Harmonic', 'Lyrical', 'Choral', 'Melodic', 'Harmonious', 'Tuneful');
		$hut3 = $hut3[mt_rand(0,7)];
	}
	$store = "AND store='Music'";
}
else if ($type == 13) // JEWELER ///////////////////////////////////////////////
{
	$hut1 = array('Jeweler', 'Gem Shoppe', 'Jewelry Shoppe', 'Fine Stones', 'Precious Gems', 'Diamonds', 'Emeralds', 'Rubies', 'Pearls');
	$hut1 = $hut1[mt_rand(0,8)];

	if (mt_rand(1,100) > 30)
	{
		$hut3 = array('Shiny', 'Sparkly', 'Twinkling', 'Gleaming', 'Shimmering', 'Glinting', 'Rare', 'Priceless');
		$hut3 = $hut3[mt_rand(0,7)];
	}
}
else if ($type == 17) // GUARD HOUSE ///////////////////////////////////////////////
{
	$hut1 = array('Guardhouse', 'Barracks', 'Sleeping Quarters', 'Sentry Post', 'Guardhouse', 'Barracks');
	$hut1 = $hut1[mt_rand(0,5)];

	$hut3 = array('Patrolling', 'Watchful', 'Guarding', 'Defending', 'Protecting');
	$hut3 = $hut3[mt_rand(0,4)];
}
else if ($type > 17) // GUILDS /////////////////////////////////////////////////
{
	$hut1 = array('Guild', 'Guild', 'Lodge', 'League', 'Order', 'Society', 'Clan', 'Fraternity', 'Circle', 'Ring', 'Union');
	$hut1 = $hut1[mt_rand(0,10)];

	if ($type == 18){$hut3 = array('Fighters', 'Warriors', 'Champions', 'Soldiers', 'Gladiators', 'Defenders', 'Mercenaries', 'Legionnaires');}
	else if ($type == 19){$hut3 = array('Wizards', 'Mages', 'Sorcerers', 'Magicians', 'Magic-Users', 'Occultists', 'Enchanters', 'Conjurers');}
	else if ($type == 20){$hut3 = array('Thieves', 'Bandits', 'Burglars', 'Sneaks', 'Prowlers', 'Highwaymen', 'Muggers', 'Swindlers');}
	else if ($type == 21){$hut3 = array('Rangers', 'Hunters', 'Woodsmen', 'Travelers', 'Adventurers', 'Rangers', 'Hunters', 'Woodsmen');}
	else if ($type == 22){$hut3 = array('Assassins', 'Murderers', 'Killers', 'Slayers', 'Executioners', 'Cut-Throats', 'Assassins', 'Cut-Throats');}
	else {$hut3 = array('Artists', 'Bards', 'Minstrels', 'Actors', 'Musicians', 'Poets', 'Singers', 'Entertainers');}

	$hut3 = $hut3[mt_rand(0,7)];

	$hut2 = array('Dark', '', 'Hidden', 'Grand', 'Glorious', 'Mysterious', 'Secret', 'Great', 'Marvelous', 'Amazing', 'Mystical', 'Legendary', 'Eternal', 'Exalted', 'Ultimate', 'Royal', 'Almighty', 'Supreme', 'Dominant', 'Fallen', 'Mighty', 'Unknown', 'Forgotten');
	$hut2 = $hut2[mt_rand(0,22)];

	$guild = "The " . $hut2 . " " . $hut1 . " of " . $hut3;
}
	/////////////////////////// FILL UP THE BUSINESSES ////////////////////////////////////////////////////////////////////////////////////
	if ($type == 13)
	{
				$inventory = mt_rand(10,40);
				$tabx = "<table border='0' cellpadding='0' style='border-collapse: collapse' width='100%'>";
			while ($inventory > 0) :
					$tablc = $tablc + 1;

					if ($columns > 0){$tablc = 1;}
						if ($tablc == 1){$tabx = $tabx . "<tr>";}

							if (mt_rand(1,2) == 1){$tabx = $tabx . "<td NOWRAP><font size='2'>" . ucwords(gemCreator(mt_rand(10,100))) . "</font></td>";}
							else {$tabx = $tabx . "<td NOWRAP><font size='2'>" . ucwords(jewelCreator(mt_rand(10,100))) . "</font></td>";}

					if ($columns > 0){$tablc = 3;}
						if ($tablc == 3){$tabx = $tabx . "</tr>"; $tablc = 0;}

				$inventory = $inventory - 1;
			endwhile;
				if ($tablc == 1){$cycle = 3;} else if ($tablc == 2){$cycle = 2;}
			while ($cycle > 0) :
				$tabx = $tabx . "<td NOWRAP><font size='2'>&nbsp;</font></td>";
				$cycle = $cycle - 1;	$cicl = 1;
			endwhile;
				if ($cicl == 1){$tabx = $tabx . "</tr>";}
			$tabx = $tabx . "</table>";
	}
	else
	{
		include("db.php");

			if ($type == 99){$qry = "SELECT * FROM store_items WHERE game='DD' AND store='Priest' and era<=$stock ORDER BY item"; $stock = 100;}
			else {$qry = "SELECT * FROM store_items WHERE game='DD' $store ORDER BY item";}
				$res = wz_query( $connection, $qry ); /* qry. */
				$num = wz_num_rows($res);
					$tabx = "<table border='0' cellpadding='0' style='border-collapse: collapse' width='100%'>";
				while ($ary=wz_fetch_assoc($res)) :
					$num = $num - 1;
					if (mt_rand(1,100) <= $stock)
					{
						$tablc = $tablc + 1;

						if ($columns > 0){$tablc = 1;}
							if ($tablc == 1){$tabx = $tabx . "<tr>";}

							if (($ary[qty] != 1) && ($shelf > 0)){$myshelf = " - [" . mt_rand(1,10) . "]";} else {$myshelf = "";}
								if ($type == 99){$tabx = $tabx . "<td NOWRAP><font size='2'>" . $ary[item] . " - " . number_format($ary[cost]) . "gp</font></td>";}
								else {$tabx = $tabx . "<td NOWRAP><font size='2'>" . $ary[item] . " - " . $ary[cost] . $myshelf . "</font></td>";}

						if ($columns > 0){$tablc = 3;}
							if ($tablc == 3){$tabx = $tabx . "</tr>"; $tablc = 0;}
					}
					if (($num == 0) && ($type == 12)) /// ANY EXTRA LIBRARY BOOKS ///
					{
						$books = mt_rand(5,15);
						while ($books > 0) :
							if (mt_rand(1,100) <= $stock)
							{
								$tablc = $tablc + 1;

								if ($columns > 0){$tablc = 1;}
									if ($tablc == 1){$tabx = $tabx . "<tr>";}

									$tabx = $tabx . "<td NOWRAP><font size='2'>" . tomeMaker($game) . " - " . mt_rand(5,200) . "gp</font></td>";


								if ($columns > 0){$tablc = 3;}
									if ($tablc == 3){$tabx = $tabx . "</tr>"; $tablc = 0;}
							}
							$books = $books - 1;
						endwhile;
					}
				endwhile;
					if ($tablc == 1){$cycle = 3;} else if ($tablc == 2){$cycle = 2;}
				while ($cycle > 0) :
					$tabx = $tabx . "<td NOWRAP><font size='2'>&nbsp;</font></td>";
					$cycle = $cycle - 1;	$cicl = 1;
				endwhile;
					if ($cicl == 1){$tabx = $tabx . "</tr>";}
				$tabx = $tabx . "</table>";
	}

if (mt_rand(1,100) > 30){$prex = "The ";} else {$prex = "";}
$house = $prex . "" . $hut3 . " " . $hut2 . " " . $hut1;

return array($house,$tabx);

}

?>
