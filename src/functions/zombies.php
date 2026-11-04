<?php

function makeZombie($tool)
{
	/// SEX
	if (mt_rand(1,2) == 1){$sex = "male";} else {$sex = "female";}

	/// AGE
	if (mt_rand(1,10) == 1){$age = ", child";} else {$age = "";}

	/// HAT
	switch (mt_rand(0,19))
	{
		case 0:	$hat = "baseball cap";		break;
		case 1:	$hat = "stocking cap";		break;
		case 2:	$hat = "beret";				break;
		case 3:	$hat = "cowboy hat";		break;
		case 4:	$hat = "fedora";			break;
		case 5:	$hat = "floppy hat";		break;
		case 6:	$hat = "cap";				break;
		case 7:	$hat = "hard hat";			break;
		case 8:	$hat = "sun hat";			break;
		case 9:	$hat = "sombrero";			break;
		case 10:$hat = "motorcycle helmet";	break;
		case 11:$hat = "football helmet";	break;
		case 12:$hat = "baseball helmet";	break;
		case 13:$hat = "headband";			break;
		case 14:$hat = "fishing hat";		break;
		case 15:$hat = "flat cap";			break;
		case 16:$hat = "party hat";			break;
		case 17:$hat = "peaked cap";		break;
		case 18:$hat = "turban";			break;
		case 19:$hat = "sun visor";			break;
	}
	if (($hat == "motorcycle helmet") || ($hat == "football helmet") || ($hat == "baseball helmet")){$hat = clothingColors() . " " . $hat . "&nbsp;/ ";}
	else {$hat = zombieCloth(1) . clothingColors() . " " . $hat . "&nbsp;/ ";}
	if (mt_rand(1,4) != 1){$hat = "";}

	/// SHIRT
	if ($sex == "male"){$shirts = mt_rand(0,34);} else {$shirts = mt_rand(5,41);}
	switch ($shirts)
	{
		case 0: $shirt = "dinner jacket";			break;
		case 1: $shirt = "sport coat";				break;
		case 2: $shirt = "headband";				break;
		case 3: $shirt = "blazer";					break;
		case 4: $shirt = "vest";					break;
		case 5:	$shirt = "dress shirt";				break;
		case 6:	$shirt = "t-shirt";					break;
		case 7:	$shirt = "long-sleeved t-shirt";	break;
		case 8:	$shirt = "sleeveless shirt";		break;
		case 9:	$shirt = "polo shirt";				break;
		case 10:$shirt = "sports jersey";			break;
		case 11:$shirt = "sweatshirt";				break;
		case 12:$shirt = "tank top";				break;
		case 13:$shirt = "sweater";					break;
		case 14:$shirt = "cardigan";				break;
		case 15:$shirt = "dress shirt";				break;
		case 16:$shirt = "robe";		 $pantn=1;	break;
		case 17:$shirt = "apron";					break;
		case 18:$shirt = "hoodie";					break;
		case 19:$shirt = "coat";					break;
		case 20:$shirt = "jacket";					break;
		case 21:$shirt = "trench coat";				break;
		case 22:$shirt = "leather jacket";			break;
		case 23:$shirt = "rain coat";				break;
		case 24:$shirt = "windbreaker";				break;
		case 25:$shirt = "parka";					break;
		case 26:$shirt = "sports jacket";			break;
		case 27:$shirt = "chef coat";				break;
		case 28:$shirt = "flannel shirt";			break;
		case 29:$shirt = "denim jacket";			break;
		case 30:$shirt = "lab coat";				break;
		case 31:$shirt = "leather jacket";			break;
		case 32:$shirt = "motorcycle jacket";		break;
		case 33:$shirt = "straitjacket";			break;
		case 34:$shirt = "letterman jacket";		break;
		case 35:$shirt = "night gown"; 	 $pantn=1;	break;
		case 36:$shirt = "blouse";					break;
		case 37:$shirt = "tube top";				break;
		case 38:$shirt = "formal dress"; $pantn=1;	break;
		case 39:$shirt = "sun dress"; 	 $pantn=1;	break;
		case 40:$shirt = "dress"; 		 $pantn=1;	break;
		case 41:$shirt = "halter top";				break;
	}
	$shirt = zombieCloth(1) . clothingColors() . " " . $shirt . "&nbsp;/ ";
	if (mt_rand(1,10) == 1){$shirt = ""; $pantn = 0;}

	/// PANTS
	if ($pantn != 1)
	{
		if ($sex == "male"){$pantss = mt_rand(0,22);} else {$pantss = mt_rand(20,40);}
		switch ($pantss)
		{
			case 0: $pants = "formal pants";		break;
			case 1: $pants = "dress pants";			break;
			case 2: $pants = "blue jeans";			break;
			case 3: $pants = "denim pants";			break;
			case 4: $pants = "baggy jeans";			break;
			case 5: $pants = "cargo pants";			break;
			case 6: $pants = "khakis";				break;
			case 7:	$pants = "bell bottoms";		break;
			case 8:	$pants = "pleated pants";		break;
			case 9:	$pants = "trousers";			break;
			case 10:$pants = "kilt";				$pockets=1;	break;
			case 11:$pants = "denim shorts";		break;
			case 12:$pants = "cargo shorts";		break;
			case 13:$pants = "sweat pants";			break;
			case 14:$pants = "sweat shorts";		break;
			case 15:$pants = "basketball shorts";	$pockets=1;	break;
			case 16:$pants = "running shorts";		$pockets=1;	break;
			case 17:$pants = "boxers";				$pockets=1;	break;
			case 18:$pants = "briefs";				$pockets=1;	break;
			case 19:$pants = "pajama pants";		break;
			case 20:$pants = "snow pants";			break;
			case 21:$pants = "leather pants";		break;
			case 22:$pants = "overalls";			break;
			case 23:$pants = "dress pants";			break;
			case 24:$pants = "blue jeans";			break;
			case 25:$pants = "denim pants";			break;
			case 26:$pants = "tight jeans";			break;
			case 27:$pants = "cargo pants";			break;
			case 28:$pants = "spandex pants";		$pockets=1;	break;
			case 29:$pants = "bell bottoms";		break;
			case 30:$pants = "pleated pants";		break;
			case 31:$pants = "trousers";			break;
			case 32:$pants = "skirt";				$pockets=1;	break;
			case 33:$pants = "denim shorts";		break;
			case 34:$pants = "cargo shorts";		break;
			case 35:$pants = "sweat pants";			break;
			case 36:$pants = "sweat shorts";		break;
			case 37:$pants = "shorts";				break;
			case 38:$pants = "yoga pants";			$pockets=1;	break;
			case 39:$pants = "panties";				$pockets=1;	break;
			case 40:$pants = "pajama pants";		break;
		}
		if ($pants == "blue jeans"){$pants = zombieCloth(1) . $pants . "&nbsp;/ ";}
		else {$pants = zombieCloth(1) . clothingColors() . " " . $pants . "&nbsp;/ ";}
		if (mt_rand(1,10) == 1){$pants = "";}
	}

	/// SOCKS
	$socks = zombieCloth(1) . clothingColors() . " socks&nbsp;/ ";
	if (mt_rand(1,10) == 1){$socks = "";}

	/// SHOES
	if ($sex == "male"){$shoess = mt_rand(0,15);} else {$shoess = mt_rand(1,19);}
	$shoes = clothingColors() . " shoes";
	if (mt_rand(1,4) == 1)
	{
		switch ($shoess)
		{
			case 0: $shoes = varyingColors() . leatherColor() . " loafers";				break;
			case 1: $shoes = varyingColors() . leatherColor() . " boots";				break;
			case 2: $shoes = varyingColors() . leatherColor() . " hiking boots";		break;
			case 3: $shoes = varyingColors() . leatherColor() . " work boots";			break;
			case 4: $shoes = varyingColors() . leatherColor() . " motorcycle boots";	break;
			case 5: $shoes = varyingColors() . leatherColor() . " steel-toed boots";	break;
			case 6: $shoes = varyingColors() . leatherColor() . " cowboy boots";		break;
			case 7: $shoes = clothingColors() . " tennis shoes";						break;
			case 8: $shoes = clothingColors() . " athletic shoes";						break;
			case 9: $shoes = clothingColors() . " flip-flops";							break;
			case 10: $shoes = clothingColors() . " bowling shoes";						break;
			case 11: $shoes = clothingColors() . " snow boots";							break;
			case 12: $shoes = clothingColors() . " high-top shoes";						break;
			case 13: $shoes = varyingColors() . leatherColor() . " sandals";			break;
			case 14: $shoes = varyingColors() . leatherColor() . " dress shoes";		break;
			case 15: $shoes = varyingColors() . leatherColor() . " formal shoes";		break;
			case 16: $shoes = clothingColors() . " dancing shoes";						break;
			case 17: $shoes = clothingColors() . " high-heel shoes";					break;
			case 18: $shoes = clothingColors() . " slingback shoes";					break;
			case 19: $shoes = clothingColors() . " court shoes";						break;
		}
	}
	$shoes = zombieCloth(1) . $shoes . "&nbsp;/ ";
	if (mt_rand(1,10) == 1){$shoes = "";}

	/// HAIR
	$haircolor = array('black', 'brown', 'red', 'auburn', 'gray', 'white', 'blonde');
	$hcolor = $haircolor[mt_rand(0,6)];
	if ($age == ", child"){$haircolor = array('black', 'brown', 'red', 'auburn', 'blonde'); $hcolor = $haircolor[mt_rand(0,4)];}
	$h_brd = 1;			$h_mst = 1;			$h_bld = 1;
	/////////////////////////////////////////////
	if ($sex == "male")
	{
		$hisp = "He";
		$husp = "his";
		$hairy = array('bald', 'long', 'short', 'curly');
		if ((mt_rand(1,100) > 70) && ($h_brd == 1)){$beard = 1;} else if ($h_brd == 2){$beard = 1;}
		if ((mt_rand(1,100) > 70) && ($h_mst == 1)){$mustc = 1;} else if ($h_mst == 2){$mustc = 1;}
		if ((mt_rand(1,100) > 70) && ($h_bld == 1)){$bald = 1;} else if ($h_bld == 2){$bald = 1;}
		$bhair = array('thick', 'long', 'short');
		$hare = $hairy[mt_rand(0,3)];
		if ($age == ", child")
		{
			$beard=0; $mustc=0; $bald=0; $hare = $hairy[mt_rand(1,3)];
		}
	}
	else
	{
		$hisp = "She";
		$husp = "her";
		$hairy = array('braided', 'long', 'short', 'curly');
		$beard=0; $mustc=0; $bald=0; $hare = $hairy[mt_rand(1,3)];
	}
	/////////////////////////////////////////////
	if ($tool == 1)
	{
		if ($hare == "bald"){$hair1 = " was bald"; $hair2 = ", " . $hcolor;}
		else {$hair1 = " had " . $hare . ", " . $hcolor . " hair";}
	}
	else
	{
		if ($hare == "bald"){$hair1 = " is bald"; $hair2 = ", " . $hcolor;}
		else {$hair1 = " has " . $hare . ", " . $hcolor . " hair";}
	}

	if ($beard == 1){$hairr = $hair1 . " with a " . $bhair[mt_rand(0,2)] . "" . $hair2 . " beard and moustache.&nbsp; ";}
	else if (($beard != 1) && ($mustc == 1)){$hairr = $hair1 . " with a " . $bhair[mt_rand(0,2)] . "" . $hair2 . " moustache.&nbsp; ";}
	else if ($hare == "bald"){$hairr = $hair1 . " with no facial hair at all.&nbsp; ";}
	else {$hairr = $hair1 . ".&nbsp; ";}

	/// NAME
	if ($sex == "male"){$fname = todayManName();} else {$fname = todayGirlName();}
	$lname = todayLastName();

	/// WEARING
	$clothes = $hat . $shirt . $pants . $socks . $shoes;
	$clothes = $clothes = substr($clothes, 0, -8);
	$wearing = "&nbsp; CLOTHING&nbsp;<i>[" . $clothes . "]</i>.";
	if (($hat == "") && ($shirt == "") && ($pants == "") && ($socks == "") && ($shoes == "")){$wearing = "";}

	/// INVENTORY
	$scavange = mt_rand(2,8);
	while ($scavange > 0) :
		$goods = $goods . zombieItems(zombie) . "&nbsp;/ ";
		$scavange = $scavange - 1;
	endwhile;
	$goods = substr($goods, 0, -8);
	$goods = "&nbsp; HOLDING&nbsp;<i>[" . $goods . "]</i>.";
	if (($pants == "") || ($pockets == 1) || ($tool == 1)){ $goods = ""; }
	if ($pants == "")
	{
		switch (mt_rand(0,4))
		{
			case 0: $nude = "completely";	break;
			case 1: $nude = "totally";		break;
			case 2: $nude = "entirely";		break;
			case 3: $nude = "fully";		break;
			case 4: $nude = "utterly";		break;
		}
		switch (mt_rand(0,5))
		{
			case 0: $wearing = "&nbsp; " . $hisp . " is " . $nude . " void of any type of clothing.";	break;
			case 1: $wearing = "&nbsp; " . $hisp . " is also " . $nude . " naked.";	break;
			case 2: $wearing = "&nbsp; " . $hisp . " is also " . $nude . " nude.";	break;
			case 3: $wearing = "&nbsp; " . $hisp . " is barely covered with " . zombieCloth(1) . clothingColors() . " rags.";	break;
			case 4: $wearing = "&nbsp; " . $hisp . " is somewhat covered with " . zombieCloth(1) . clothingColors() . " rags.";	break;
			case 5: $wearing = "&nbsp; " . $hisp . " is " . $nude . " covered with " . zombieCloth(1) . clothingColors() . " rags.";	break;
		}
	}

	/// ROT
	if (mt_rand(1,2) == 1){$side = "left";} else {$side = "right";}
	switch (mt_rand(0,19))
	{
		case 0: $rot = "&nbsp; " . $hisp . " is also missing " . $husp . " " . $side . " arm.";	break;
		case 1: $rot = "&nbsp; " . $hisp . " is also missing " . $husp . " " . $side . " hand.";	break;
		case 2: $rot = "&nbsp; " . $hisp . " is also missing " . mt_rand(2,4) . " fingers on " . $husp . " " . $side . " hand.";	break;
		case 3: $rot = "&nbsp; " . $hisp . " is also missing " . $husp . " " . $side . " foot";	break;
		case 4: $rot = "&nbsp; " . $hisp . " is also missing most of the " . $side . " side of " . $husp . " face.";	break;
		case 5: $rot = "&nbsp; " . $hisp . " also has a chunk taken out of " . $husp . " " . $side . " leg.";	break;
		case 6: $rot = "&nbsp; " . $hisp . " also has a chunk taken out of " . $husp . " " . $side . " arm.";	break;
		case 7: $rot = "&nbsp; " . $hisp . " also has a chunk taken out of " . $husp . " face.";	break;
		case 8: $rot = "&nbsp; " . $hisp . " also has a chunk taken out of " . $husp . " stomach.";	break;
		case 9: $rot = "&nbsp; " . $hisp . " has bites all over.";	break;
		case 10:$rot = "&nbsp; " . $hisp . " has bites and cuts all over.";	break;
		case 11:$rot = "&nbsp; " . $hisp . " has bites and scratches all over.";	break;
		case 12:$rot = "&nbsp; " . $hisp . " has some bullet holes in places.";	break;
	}

	/// APPEARANCE
	if ($tool == 1)
	{
		if (mt_rand(1,6) == 1){$look = "&nbsp; " . zombieNone($hisp,$husp) . "."; $rot=""; }
		else {$look = "&nbsp; " . $hisp . " had " . zombieColor() . " skin that was " . zombiePale() . " in appearance."; $goods = " zombie (" . zombieKilled($husp) . ")"; }
	}
	else {$look = "&nbsp; " . $hisp . " has " . zombieColor() . " skin that is " . zombiePale() . " in appearance.";}

	return array($sex,$age,$fname,$lname,$hat,$shirt,$pants,$shoes,$hairr,$rot,$wearing,$look,$goods);
}


function zombieCloth($comma)
{
	$rot = "";
	switch (mt_rand(0,18))
	{
		case 0:	$rot = "rotten";		break;
		case 1:	$rot = "dirty";			break;
		case 2:	$rot = "tattered";		break;
		case 3:	$rot = "worn";			break;
		case 4:	$rot = "bloody";		break;
		case 5:	$rot = "soiled";		break;
		case 6:	$rot = "shredded";		break;
		case 7:	$rot = "frayed";		break;
		case 8:	$rot = "shabby";		break;
		case 9:	$rot = "ripped";		break;
		case 11:$rot = "rugged";		break;
		case 12:$rot = "scraggy";		break;
	}
	if (($comma == 1) && ($rot != "")){$rot = $rot . ", ";} else {$rot = $rot . " ";}
	return $rot;
}


function zombiePale()
{
	$rot = "";
	switch (mt_rand(0,18))
	{
		case 0:	$rot = "rotten";		break;
		case 1:	$rot = "dirty";			break;
		case 2:	$rot = "very rotten";	break;
		case 3:	$rot = "muddy";			break;
		case 4:	$rot = "bloody";		break;
		case 5:	$rot = "blotchy";		break;
		case 6:	$rot = "burned";		break;
		case 7:	$rot = "gross";			break;
		case 8:	$rot = "slimy";			break;
		case 9:	$rot = "gory";			break;
		case 11:$rot = "gruesome";		break;
		case 12:$rot = "ashen";			break;
		case 13:$rot = "horrible";		break;
		case 14:$rot = "disgusting";	break;
		case 15:$rot = "ghastly";		break;
		case 16:$rot = "hideous";		break;
		case 17:$rot = "grisly";		break;
		case 18:$rot = "revolting";		break;
	}
	return $rot;
}


function zombieColor()
{
	switch (mt_rand(0,8))
	{
		case 0:	$skin = "green";		break;
		case 1:	$skin = "light-green";	break;
		case 2:	$skin = "dark-green";	break;
		case 3:	$skin = "yellowish";	break;
		case 4:	$skin = "light-yellow";	break;
		case 5:	$skin = "darkened";		break;
		case 6:	$skin = "sickly";		break;
		case 7:	$skin = "gray";			break;
		case 8:	$skin = "grayish-green";break;
	}
	return $skin;
}

function zombieKilled($pr)
{
	switch (mt_rand(0,5))
	{
		case 0:	$death = "seems to have suffered a gun shot to " . $pr . " head";		break;
		case 1:	$death = "seems to have suffered from a stab wound to " . $pr . " head";	break;
		case 2:	$death = "seems to have suffered a crushing blow to " . $pr . " head";	break;
		case 3:	$death = "seems to have had the top of " . $pr . " head chopped off";	break;
		case 4:	$death = "seems to have had " . $pr . " head smashed in";	break;
		case 5:	$death = "seems to have had " . $pr . " skull crushed";	break;
	}
	return $death;
}


function zombieNone($pr1,$pr2)
{
	if (mt_rand(1,2) == 1){$time = "days";} else {$time = "weeks";}

	switch (mt_rand(0,6))
	{
		case 0:	$bullet = "head";		break;
		case 1:	$bullet = "stomach";	break;
		case 2:	$bullet = "chest";		break;
		case 3:	$bullet = "back";		break;
		case 4:	$bullet = "shoulder";	break;
		case 5:	$bullet = "thigh";		break;
		case 6:	$bullet = "arm";		break;
	}

	switch (mt_rand(0,5))
	{
		case 0:	$club = "blunt weapon";		break;
		case 1:	$club = "bladed weapon";	break;
		case 2:	$club = "knife";			break;
		case 3:	$club = "spiked club";		break;
		case 4:	$club = "severe beating";	break;
		case 5:	$club = "wild animal";		break;
	}

		$hisp = "He";
		$husp = "his";

	switch (mt_rand(0,5))
	{
		case 0:	$look = $pr1 . " seems to have met " . $pr2 . " end roughly " . mt_rand(2,12) . " " . $time . " ago";	break;
		case 1:	$look = $pr1 . " seems to have died from starvation roughly " . mt_rand(2,12) . " " . $time . " ago";	break;
		case 2:	$look = $pr1 . " seems to have died from natural causes roughly " . mt_rand(2,12) . " " . $time . " ago";	break;
		case 3:	$look = $pr1 . " seems to have died from dehydration roughly " . mt_rand(2,12) . " " . $time . " ago";	break;
		case 4:	$look = $pr1 . " seems to have been killed by a gun shot to the " . $bullet . " roughly " . mt_rand(2,12) . " " . $time . " ago";	break;
		case 5:	$look = $pr1 . " seems to have been killed by a " . $club . " roughly " . mt_rand(2,12) . " " . $time . " ago";	break;
	}
	return $look;
}


function zombieQuality()
{
	$q = mt_rand(1,20);

	if ($q == 20){$quality = " (perfect condition)";}
	else if ($q > 17){$quality = " (excellent condition)";}
	else if ($q > 14){$quality = " (good condition)";}
	else if ($q > 10){$quality = " (fair condition)";}
	else if ($q > 15){$quality = " (poor condition)";}
	else {$quality = " (totally ruined)";}

	return "<i>" . $quality . "</i>";
}
?>