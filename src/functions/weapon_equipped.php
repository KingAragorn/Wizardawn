<?php

/// THIS FILE CHOOSES WEAPONS THAT SOME CREATURES MAY BE USING ///

function PAgetWeapon($type,$game)
{
	if (($game != "Broken Urthe") && ($game != "Labyrinth Lord"))
	{
		$mod1 = "(x2)";
		$mod2 = "(x3)";
	}
		if ($type == 1)
		{
			switch (mt_rand(0,6))
			{
				case 0:	$weapon = "axe (1d6 dmg)";			break;
				case 1:	$weapon = "battle axe (1d8 dmg)";	break;
				case 2:	$weapon = "broadsword (1d8 dmg)";	break;
				case 3:	$weapon = "club (1d4 dmg)";			break;
				case 4: $weapon = "knife (1d4 dmg)";		break;
				case 5: $weapon = "spear (1d6 dmg)";		break;
				case 6: $weapon = "sword (1d6 dmg)";		break;
			}
		}
		else if ($type == 2)
		{
			switch (mt_rand(0,9))
			{
				case 0:	$weapon = "crossbow (1d6 dmg)";	break;
				case 1:	$weapon = "bow (1d6 dmg)";	break;
				case 2:	$weapon = "sling (1d4 dmg)";		break;
				case 3:	$weapon = "axe (1d6 dmg)";			break;
				case 4:	$weapon = "battle axe (1d8 dmg)";	break;
				case 5:	$weapon = "broadsword (1d8 dmg)";	break;
				case 6:	$weapon = "club (1d4 dmg)";			break;
				case 7: $weapon = "knife (1d4 dmg)";		break;
				case 8: $weapon = "spear (1d6 dmg)";		break;
				case 9: $weapon = "sword (1d6 dmg)";		break;
			}
		}
		else if ($type == 3)
		{
			if ($game == "Labyrinth Lord"){$mt = 11;} else {$mt = 0;}

			if ($game == "Metamorphosis Alpha")
			{
				switch (mt_rand(0,11))
				{
					case 0: $weapon = "crossbow (1d8 dmg)";							break;
					case 1: $weapon = "bow (1d8 dmg)";								break;
					case 2: $weapon = "sling (1d8 dmg)";							break;
					case 3: $weapon = "axe (1d6 dmg)";								break;
					case 4: $weapon = "great axe (1d10 dmg)";						break;
					case 5: $weapon = "great sword (1d10 dmg)";						break;
					case 6: $weapon = "club (1d6 dmg)";								break;
					case 7: $weapon = "knife (1d4 dmg)";							break;
					case 8: $weapon = "spear (1d6 dmg)";							break;
					case 9: $weapon = "sword (1d6 dmg)";							break;
					case 10:$weapon = "laser pistol (" . mt_rand(6,12) . "d6 dmg)";	break;
					case 11:$weapon = "laser rifle (" . mt_rand(7,13) . "d6 dmg)";	break;
				}
			}
			else
			{
				switch (mt_rand($mt,22))
				{
					case 0:	$weapon = "gunpowder pistol (1d10 dmg)";			break;
					case 1:	$weapon = "gunpowder rifle (1d12 dmg)";				break;
					case 2: $weapon = "heavy pistol (1d12 dmg)";				break;
					case 3: $weapon = "small pistol (1d8 dmg)";					break;
					case 4: $weapon = "medium pistol (1d10 dmg)";				break;
					case 5: $weapon = "machine pistol (1d10 dmg/2 attacks)";	break;
					case 6: $weapon = "heavy rifle (1d12+2 dmg)";				break;
					case 7: $weapon = "small rifle (1d10 dmg)";					break;
					case 8: $weapon = "medium rifle (1d12 dmg)";				break;
					case 9: $weapon = "machine rifle (1d12 dmg/2 attacks)";		break;
					case 10:$weapon = "shotgun (1d12" . $mod1 . " dmg)";		break;
					case 11:$weapon = "crossbow (1d6 dmg)";						break;
					case 12:$weapon = "bow (1d6 dmg)";							break;
					case 13:$weapon = "sling (1d4 dmg)";						break;
					case 14:$weapon = "axe (1d6 dmg)";							break;
					case 15:$weapon = "battle axe (1d8 dmg)";					break;
					case 16:$weapon = "broadsword (1d8 dmg)";					break;
					case 17:$weapon = "club (1d4 dmg)";							break;
					case 18:$weapon = "knife (1d4 dmg)";						break;
					case 19:$weapon = "spear (1d6 dmg)";						break;
					case 20:$weapon = "sword (1d6 dmg)";						break;
					case 21:$weapon = "laser pistol (2d6" . $mod2 . " dmg)";	break;
					case 22:$weapon = "laser rifle (3d8" . $mod2 . " dmg)";		break;
				}
			}
		}
		else if ($type == 4)
		{
			if ($game == "Labyrinth Lord"){$mt = 12;} else {$mt = 0;}

			if ($game == "Metamorphosis Alpha")
			{
				switch (mt_rand(0,10))
				{
					case 0:	$weapon = "laser pistol (" . mt_rand(6,12) . "d6 dmg)";					break;
					case 1:	$weapon = "laser rifle (" . mt_rand(7,13) . "d6 dmg)";					break;
					case 2: $weapon = "plasma short sword (2d6 dmg)";								break;
					case 3: $weapon = "plasma knife (2d4 dmg)";										break;
					case 4: $weapon = "plasma pistol (" . mt_rand(9,15) . "d6 dmg)";				break;
					case 5: $weapon = "plasma rifle (" . mt_rand(10,16) . "d6 dmg)";				break;
					case 6: $weapon = "plasma long sword (2d8 dmg)";								break;
					case 7: $weapon = "plasma axe (2d6 dmg)";										break;
					case 8: $weapon = "plasma battle axe (2d10 dmg)";								break;
					case 9: $weapon = "electrical pistol (" . mt_rand(3,12) . "d6 dmg/2 targets)";	break;
					case 10:$weapon = "electrical rifle (" . mt_rand(4,13) . "d6 dmg/2 targets)";	break;
				}
			}
			else
			{
				switch (mt_rand($mt,22))
				{
					case 0:	$weapon = "gyrojet pistol (2d10 dmg)";							break;
					case 1:	$weapon = "frag gun (2d10 dmg)";								break;
					case 2:	$weapon = "gyrojet rifle (2d12 dmg)";							break;
					case 3: $weapon = "heavy pistol (1d12 dmg)";							break;
					case 4: $weapon = "small pistol (1d8 dmg)";								break;
					case 5: $weapon = "medium pistol (1d10 dmg)";							break;
					case 6: $weapon = "machine pistol (1d10 dmg/2 attacks)";				break;
					case 7: $weapon = "heavy rifle (1d12+2 dmg)";							break;
					case 8: $weapon = "small rifle (1d10 dmg)";								break;
					case 9: $weapon = "medium rifle (1d12 dmg)";							break;
					case 10:$weapon = "machine rifle (1d12 dmg/2 attacks)";					break;
					case 11:$weapon = "shotgun (1d12" . $mod1 . " dmg)";					break;
					case 12:$weapon = "laser pistol (2d6" . $mod2 . " dmg)";				break;
					case 13:$weapon = "laser rifle (3d8" . $mod2 . " dmg)";					break;
					case 14:$weapon = "plasma broadsword (1d10 dmg)";						break;
					case 15:$weapon = "plasma dagger (1d6 dmg)";							break;
					case 16:$weapon = "plasma pistol (2d8" . $mod2 . " dmg)";				break;
					case 17:$weapon = "plasma rifle (2d10" . $mod2 . " dmg)";				break;
					case 18:$weapon = "plasma sword (1d8 dmg)";								break;
					case 19:$weapon = "plasma axe (1d8 dmg)";								break;
					case 20:$weapon = "plasma battle axe (1d10 dmg)";						break;
					case 21:$weapon = "electrical pistol (1d8" . $mod1 . " dmg/2 targets)";	break;
					case 22:$weapon = "electrical rifle (1d10" . $mod1 . " dmg/2 targets)";	break;
				}
			}
		}
		else if ($type == 5)
		{
			if ($game == "Labyrinth Lord"){$mt = 7;} else {$mt = 0;}

			if ($game == "Metamorphosis Alpha")
			{
				switch (mt_rand(0,15))
				{
					case 0:	$weapon = "pulse gloves (1d10 dmg)";							break;
					case 1:	$weapon = "pulse whip (1d12 dmg)";								break;
					case 2:	$weapon = "shock rod";											break;
					case 3:	$weapon = "vibrating sword (2d6 dmg)";							break;
					case 4:	$weapon = "vibrating saw (2d8 dmg)";							break;
					case 5:	$weapon = "pulse staff (2d8 dmg)";								break;
					case 6:	$weapon = "fusion crossbow (" . mt_rand(12,18) . "d6 dmg)";		break;
					case 7:	$weapon = "fusion pistol (" . mt_rand(12,18) . "d6 dmg)";		break;
					case 8:	$weapon = "fusion rifle (" . mt_rand(13,19) . "d6 dmg)";		break;
					case 9: $weapon = "plasma short sword (2d6 dmg)";						break;
					case 10:$weapon = "plasma dagger (2d4 dmg)";							break;
					case 11:$weapon = "plasma pistol (2d8" . $mod2 . " dmg)";				break;
					case 12:$weapon = "plasma rifle (2d10" . $mod2 . " dmg)";				break;
					case 13:$weapon = "plasma long sword (2d8 dmg)";						break;
					case 14:$weapon = "plasma axe (2d6 dmg)";								break;
					case 15:$weapon = "plasma battle axe (2d10 dmg)";						break;
				}
			}
			else
			{
				switch (mt_rand($mt,16))
				{
					case 0:	$weapon = "pulse axe (1d10 dmg)";					break;
					case 1:	$weapon = "pulse battle axe (1d12 dmg)";			break;
					case 2:	$weapon = "pulse broadsword (1d12 dmg)";			break;
					case 3:	$weapon = "shock gloves (2d8+2 dmg)";				break;
					case 4:	$weapon = "gravitube (2d6" . $mod2 . " dmg)";		break;
					case 5:	$weapon = "pulse knife (1d8 dmg)";					break;
					case 6:	$weapon = "pulse sword (1d10 dmg)";					break;
					case 7:	$weapon = "fusion crossbow (2d10+2 dmg)";			break;
					case 8:	$weapon = "fusion pistol (2d8+2" . $mod2 . " dmg)";	break;
					case 9:	$weapon = "fusion rifle (2d10+2" . $mod2 . " dmg)";	break;
					case 10:$weapon = "plasma broadsword (1d10 dmg)";			break;
					case 11:$weapon = "plasma knife (1d6 dmg)";					break;
					case 12:$weapon = "plasma pistol (2d8" . $mod2 . " dmg)";	break;
					case 13:$weapon = "plasma rifle (2d10" . $mod2 . " dmg)";	break;
					case 14:$weapon = "plasma sword (1d8 dmg)";					break;
					case 15:$weapon = "plasma axe (1d8 dmg)";					break;
					case 16:$weapon = "plasma battle axe (1d10 dmg)";			break;
				}
			}
		}
		else
		{
			switch (mt_rand(0,2))
			{
				case 0:	$weapon = "rock (1d6 dmg)";		break;
				case 1:	$weapon = "stick (1d4 dmg)";	break;
				case 2:	$weapon = "branch (1d6 dmg)";	break;
			}
		}

	return ucfirst($weapon);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// PICK A FANTASY WEAPON FOR SOMEONE TO USE
function getWeapon($type)
{
	if ($type == "giant")
	{
		switch (mt_rand(0,5))
		{
			case 0:	$weapon = "battle axe (1d8 damage)";		break;
			case 1:	$weapon = "club (1d4 damage)";				break;
			case 2:	$weapon = "heavy flail (1d6+1 damage)";		break;
			case 3:	$weapon = "heavy warhammer (1d6+1 damage)";	break;
			case 4: $weapon = "two-handed sword (1d10 damage)";	break;
			case 5: $weapon = "bastard sword (2d4 damage)";		break;
		}
	}
	else if ($type == "small")
	{
		switch (mt_rand(0,5))
		{
			case 0:	$weapon = "hand axe (1d6 damage)";		break;
			case 1:	$weapon = "dagger (1d4 damage)";		break;
			case 2: $weapon = "light mace (1d4+1 damage)";	break;
			case 3: $weapon = "short sword (1d6 damage)";	break;
			case 4: $weapon = "short sword (1d6 damage)";	break;
			case 5: $weapon = "short sword (1d6 damage)";	break;
		}
	}
	else if ($type == "demon")
	{
		switch (mt_rand(0,5))
		{
			case 0:	$adj = "burning";	break;
			case 1:	$adj = "blazing";	break;
			case 2:	$adj = "flaming";	break;
			case 3:	$adj = "fiery";		break;
			case 4:	$adj = "scorching";	break;
			case 5:	$adj = "flaring";	break;
		}

		switch (mt_rand(0,9))
		{
			case 0:	$weapon = $adj . " trident (1d6+" . mt_rand(1,5) . " fire damage)";		break;
			case 1:	$weapon = $adj . " longsword (2d4+" . mt_rand(1,5) . " fire damage)";	break;
			case 2:	$weapon = $adj . " spear (1d6+" . mt_rand(1,5) . " fire damage)";		break;
			case 3:	$weapon = $adj . " staff (1d6+" . mt_rand(1,5) . " fire damage)";		break;
			case 4:	$weapon = $adj . " whip (1d2+" . mt_rand(1,5) . " fire damage)";		break;
			case 5:	$weapon = "whip (1d2 damage)";			break;
			case 6:	$weapon = "trident (1d6+1 damage)";		break;
			case 7:	$weapon = "longsword (2d4 damage)";		break;
			case 8:	$weapon = "spear (1d6 damage)";			break;
			case 9:	$weapon = "staff (1d6 fire damage)";	break;
		}
	}
	else
	{
		switch (mt_rand(0,36))
		{
			case 0:	$weapon = "battle axe (1d8 damage)";		break;
			case 1:	$weapon = "hand axe (1d6 damage)";			break;
			case 2:	$weapon = "club (1d4 damage)";				break;
			case 3:	$weapon = "dagger (1d4 damage)";			break;
			case 4:	$weapon = "heavy flail (1d6+1 damage)";		break;
			case 5:	$weapon = "light flail (1d4+1 damage)";		break;
			case 6:	$weapon = "halberd (1d10 damage)";			break;
			case 7:	$weapon = "heavy warhammer (1d6+1 damage)";	break;
			case 8:	$weapon = "light warhammer (1d4+1 damage)";	break;
			case 9:	$weapon = "heavy mace (1d6+1 damage)";		break;
			case 10:$weapon = "light mace (1d4+1 damage)";		break;
			case 11:$weapon = "morning star (2d4 damage)";		break;
			case 12:$weapon = "heavy pick (1d6+1 damage)";		break;
			case 13:$weapon = "light pick (1d4+1 damage)";		break;
			case 14:$weapon = "pole arm (1d6+1 damage)";		break;
			case 15:$weapon = "spear (1d6 damage)";				break;
			case 16:$weapon = "staff (1d6 damage)";				break;
			case 17:$weapon = "trident (1d6+1 damage)";			break;
			case 18:$weapon = "claymore (2d4 damage)";			break;
			case 19:$weapon = "bastard sword (2d4 damage)";		break;
			case 20:$weapon = "broadsword (2d4 damage)";		break;
			case 21:$weapon = "two-handed sword (1d10 damage)";	break;
			case 22:$weapon = "shortsword (1d6 damage)";		break;
			case 23:$weapon = "longsword (1d8 damage)";			break;
			case 24:$weapon = "shortsword (1d6 damage)";		break;
			case 25:$weapon = "longsword (1d8 damage)";			break;
			case 26:$weapon = "shortsword (1d6 damage)";		break;
			case 27:$weapon = "longsword (1d8 damage)";			break;
			case 28:$weapon = "shortsword (1d6 damage)";		break;
			case 29:$weapon = "longsword (1d8 damage)";			break;
			case 30:$weapon = "shortsword (1d6 damage)";		break;
			case 31:$weapon = "longsword (1d8 damage)";			break;
			case 32:$weapon = "shortsword (1d6 damage)";		break;
			case 33:$weapon = "longsword (1d8 damage)";			break;
			case 34:$weapon = "bow (1d6 damage) with about " . (mt_rand(10,30)) . " arrows each";		break;
			case 35:$weapon = "crossbow (1d4+1 damage) with about " . (mt_rand(10,30)) . " bolts each";	break;
			case 36:$weapon = "sling (1d4 damage) with about " . (mt_rand(10,30)) . " stones each";		break;
		}
	}
	
	return $weapon;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// PICK A FANTASY WEAPON FOR SOMEONE TO USE IN SWORDS & SIX-SIDERS
function getSXWeapon($type)
{
	if ($type == "giant")
	{
		switch (mt_rand(0,5))
		{
			case 0:	$weapon = "battle axe (large*)";		break;
			case 1:	$weapon = "club (large*)";				break;
			case 2:	$weapon = "heavy flail (large*)";		break;
			case 3:	$weapon = "heavy warhammer (large*)";	break;
			case 4: $weapon = "two-handed sword (large*)";	break;
			case 5: $weapon = "bastard sword (large)";		break;
		}
	}
	else if ($type == "small")
	{
		switch (mt_rand(0,5))
		{
			case 0:	$weapon = "hand axe (small)";		break;
			case 1:	$weapon = "dagger (small)";			break;
			case 2: $weapon = "light mace (medium)";	break;
			case 3: $weapon = "short sword (small)";	break;
			case 4: $weapon = "short sword (small)";	break;
			case 5: $weapon = "short sword (small)";	break;
		}
	}
	else if ($type == "demon")
	{
		switch (mt_rand(0,5))
		{
			case 0:	$adj = "burning";	break;
			case 1:	$adj = "blazing";	break;
			case 2:	$adj = "flaming";	break;
			case 3:	$adj = "fiery";		break;
			case 4:	$adj = "scorching";	break;
			case 5:	$adj = "flaring";	break;
		}

		switch (mt_rand(0,9))
		{
			case 0:	$weapon = $adj . " trident (medium)";	break;
			case 1:	$weapon = $adj . " longsword (medium)";	break;
			case 2:	$weapon = $adj . " spear (medium)";		break;
			case 3:	$weapon = $adj . " staff (medium)";		break;
			case 4:	$weapon = $adj . " whip (small)";		break;
			case 5:	$weapon = "whip (small)";				break;
			case 6:	$weapon = "trident (medium)";			break;
			case 7:	$weapon = "longsword (medium)";			break;
			case 8:	$weapon = "spear (medium)";				break;
			case 9:	$weapon = "staff (medium)";				break;
		}
	}
	else
	{
		switch (mt_rand(0,36))
		{
			case 0:	$weapon = "battle axe (medium)";		break;
			case 1:	$weapon = "hand axe (small)";			break;
			case 2:	$weapon = "club (small)";				break;
			case 3:	$weapon = "dagger (small)";				break;
			case 4:	$weapon = "heavy flail (large*)";		break;
			case 5:	$weapon = "light flail (medium)";		break;
			case 6:	$weapon = "halberd (large*)";			break;
			case 7:	$weapon = "heavy warhammer (large*)";	break;
			case 8:	$weapon = "light warhammer (medium)";	break;
			case 9:	$weapon = "heavy mace (large*)";		break;
			case 10:$weapon = "light mace (medium)";		break;
			case 11:$weapon = "morning star (medium)";		break;
			case 12:$weapon = "heavy pick (large)";			break;
			case 13:$weapon = "light pick (medium)";		break;
			case 14:$weapon = "pole arm (large*)";			break;
			case 15:$weapon = "spear (medium)";				break;
			case 16:$weapon = "staff (medium)";				break;
			case 17:$weapon = "trident (medium)";			break;
			case 18:$weapon = "claymore (large*)";			break;
			case 19:$weapon = "bastard sword (large)";		break;
			case 20:$weapon = "broadsword (large)";			break;
			case 21:$weapon = "two-handed sword (large*)";	break;
			case 22:$weapon = "shortsword (small)";			break;
			case 23:$weapon = "longsword (medium)";			break;
			case 24:$weapon = "shortsword (small)";			break;
			case 25:$weapon = "longsword (medium)";			break;
			case 26:$weapon = "shortsword (small)";			break;
			case 27:$weapon = "longsword (medium)";			break;
			case 28:$weapon = "shortsword (small)";			break;
			case 29:$weapon = "longsword (medium)";			break;
			case 30:$weapon = "shortsword (small)";			break;
			case 31:$weapon = "longsword (medium)";			break;
			case 32:$weapon = "shortsword (small)";			break;
			case 33:$weapon = "longsword (medium)";			break;
			case 34:$weapon = "bow (medium*) with about " . (mt_rand(10,30)) . " arrows each";		break;
			case 35:$weapon = "crossbow (medium*) with about " . (mt_rand(10,30)) . " bolts each";	break;
			case 36:$weapon = "sling (small) with about " . (mt_rand(10,30)) . " stones each";		break;
		}
	}
	
	return $weapon;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// PICK A T&T WEAPON FOR SOMEONE TO USE
function TTgetWeapon($type)
{
	$tt_easy_items = $_SESSION['tt_easy_items'];
	if ( $tt_easy_items == 1 ) // USE THE SIMPLE WEAPONS FROM MAGESTYKC ////////////////////////////
	{
		if ($type == "giant")
		{
			switch (mt_rand(0,25))
			{
				case 0: $weapon = "War Axe"; break;
				case 1: $weapon = "Two-Handed Sword"; break;
				case 2: $weapon = "Orkish War Axe"; break;
				case 3: $weapon = "Great Sword"; break;
				case 4: $weapon = "Battle Axe"; break;
				case 5: $weapon = "Bastard Sword"; break;
				case 6: $weapon = "Heavy Flail"; break;
				case 7: $weapon = "Great Axe"; break;
				case 8: $weapon = "Light Flail"; break;
				case 9: $weapon = "Dwarven Warhammer"; break;
				case 10: $weapon = "Battle Hammer"; break;
				case 11: $weapon = "Spiked Warhammer"; break;
				case 12: $weapon = "Heave Mace"; break;
				case 13: $weapon = "Broad Axe"; break;
				case 14: $weapon = "Morningstar"; break;
				case 15: $weapon = "Mace"; break;
				case 16: $weapon = "Long Sword"; break;
				case 17: $weapon = "Warhammer"; break;
				case 18: $weapon = "Halberd"; break;
				case 19: $weapon = "Dagger Mace"; break;
				case 20: $weapon = "Sledgehammer"; break;
				case 21: $weapon = "Pole Cleaver"; break;
				case 22: $weapon = "Pike"; break;
				case 23: $weapon = "Bardiche"; break;
				case 24: $weapon = "Broadsword"; break;
				case 25: $weapon = "Executioner Axe"; break;
			}
		}
		else if ($type == "small")
		{
			switch (mt_rand(0,14))
			{
				case 0: $weapon = "Battle Dagger"; break;
				case 1: $weapon = "Blackjack"; break;
				case 2: $weapon = "Brass Knuckles"; break;
				case 3: $weapon = "Dagger"; break;
				case 4: $weapon = "Dirk"; break;
				case 5: $weapon = "Elven Dagger"; break;
				case 6: $weapon = "Knife"; break;
				case 7: $weapon = "Kris"; break;
				case 8: $weapon = "Large Dagger"; break;
				case 9: $weapon = "Long Dagger"; break;
				case 10: $weapon = "Orkish Dagger"; break;
				case 11: $weapon = "Sacrificial Knife"; break;
				case 12: $weapon = "Spiked Punching Gloves"; break;
				case 13: $weapon = "Stiletto"; break;
				case 14: $weapon = "Tiger Claws"; break;
			}
		}
		else if ($type == "demon")
		{
			switch (mt_rand(0,5))
			{
				case 0:	$adj = "burning";	break;
				case 1:	$adj = "blazing";	break;
				case 2:	$adj = "flaming";	break;
				case 3:	$adj = "fiery";		break;
				case 4:	$adj = "scorching";	break;
				case 5:	$adj = "flaring";	break;
			}

			switch (mt_rand(0,9))
			{
				case 0:	$weapon = $adj . " trident";	break;
				case 1:	$weapon = $adj . " longsword";	break;
				case 2:	$weapon = $adj . " spear";		break;
				case 3:	$weapon = $adj . " staff";		break;
				case 4:	$weapon = $adj . " whip";		break;
				case 5:	$weapon = "whip";				break;
				case 6:	$weapon = "trident";			break;
				case 7:	$weapon = "sword";				break;
				case 8:	$weapon = "spear";				break;
				case 9:	$weapon = "staff";				break;
			}
		}
		else
		{
			switch (mt_rand(0,79))
			{
				case 0: $weapon = "Axe"; break;
				case 1: $weapon = "Bardiche"; break;
				case 2: $weapon = "Bastard Sword"; break;
				case 3: $weapon = "Battle Axe"; break;
				case 4: $weapon = "Battle Dagger"; break;
				case 5: $weapon = "Battle Hammer"; break;
				case 6: $weapon = "Blackjack"; break;
				case 7: $weapon = "Brass Knuckles"; break;
				case 8: $weapon = "Broad Axe"; break;
				case 9: $weapon = "Broadsword"; break;
				case 10: $weapon = "Bullwhip"; break;
				case 11: $weapon = "Cleaver"; break;
				case 12: $weapon = "Club"; break;
				case 13: $weapon = "Cutlass"; break;
				case 14: $weapon = "Dagger"; break;
				case 15: $weapon = "Dagger Mace"; break;
				case 16: $weapon = "Dirk"; break;
				case 17: $weapon = "Dwarven Warhammer"; break;
				case 18: $weapon = "Elven Dagger"; break;
				case 19: $weapon = "Elven Long Sword"; break;
				case 20: $weapon = "Executioner Axe"; break;
				case 21: $weapon = "Forkspear"; break;
				case 22: $weapon = "Great Axe"; break;
				case 23: $weapon = "Great Sword"; break;
				case 24: $weapon = "Halberd"; break;
				case 25: $weapon = "Hatchet"; break;
				case 26: $weapon = "Heave Mace"; break;
				case 27: $weapon = "Heavy Flail"; break;
				case 28: $weapon = "Knife"; break;
				case 29: $weapon = "Kris"; break;
				case 30: $weapon = "Large Dagger"; break;
				case 31: $weapon = "Light Flail"; break;
				case 32: $weapon = "Long Dagger"; break;
				case 33: $weapon = "Long Spear"; break;
				case 34: $weapon = "Long Sword"; break;
				case 35: $weapon = "Mace"; break;
				case 36: $weapon = "Morningstar"; break;
				case 37: $weapon = "Orkish Dagger"; break;
				case 38: $weapon = "Orkish Scimitar"; break;
				case 39: $weapon = "Orkish War Axe"; break;
				case 40: $weapon = "Pickaxe"; break;
				case 41: $weapon = "Pike"; break;
				case 42: $weapon = "Pitchfork"; break;
				case 43: $weapon = "Pole Axe"; break;
				case 44: $weapon = "Pole Cleaver"; break;
				case 45: $weapon = "Quarterstaff"; break;
				case 46: $weapon = "Rapier"; break;
				case 47: $weapon = "Saber"; break;
				case 48: $weapon = "Sacrificial Knife"; break;
				case 49: $weapon = "Scimitar"; break;
				case 50: $weapon = "Scythe"; break;
				case 51: $weapon = "Short Halberd"; break;
				case 52: $weapon = "Short Saber"; break;
				case 53: $weapon = "Short Spear"; break;
				case 54: $weapon = "Short Sword"; break;
				case 55: $weapon = "Sickle"; break;
				case 56: $weapon = "Sledgehammer"; break;
				case 57: $weapon = "Spear"; break;
				case 58: $weapon = "Spiked Club"; break;
				case 59: $weapon = "Spiked Punching Gloves"; break;
				case 60: $weapon = "Spiked Warhammer"; break;
				case 61: $weapon = "Stiletto"; break;
				case 62: $weapon = "Throwing Axe"; break;
				case 63: $weapon = "Tiger Claws"; break;
				case 64: $weapon = "Trident"; break;
				case 65: $weapon = "Two-Handed Sword"; break;
				case 66: $weapon = "War Axe"; break;
				case 67: $weapon = "War Spear"; break;
				case 68: $weapon = "Warhammer"; break;
				case 69: $weapon = "Woodsman Axe"; break;
				case 70: $weapon = "Bow with about " . (mt_rand(10,30)) . " arrows each"; break;
				case 71: $weapon = "Long Bow with about " . (mt_rand(10,30)) . " arrows each"; break;
				case 72: $weapon = "Hand Crossbow with about " . (mt_rand(10,30)) . " bolts each"; break;
				case 73: $weapon = "Sling with about " . (mt_rand(10,30)) . " stones each"; break;
				case 74: $weapon = "Heavy Crossbow with about " . (mt_rand(10,30)) . " bolts each"; break;
				case 75: $weapon = "War Crossbow with about " . (mt_rand(10,30)) . " bolts each"; break;
				case 76: $weapon = "Crossbow with about " . (mt_rand(10,30)) . " bolts each"; break;
				case 77: $weapon = "Short Bow with about " . (mt_rand(10,30)) . " arrows each"; break;
				case 78: $weapon = "Light Crossbow with about " . (mt_rand(10,30)) . " bolts each"; break;
				case 79: $weapon = "Blowpipe with about " . (mt_rand(10,30)) . " darts each"; break;
			}
		}
	}
	else // USE THE WEAPONS FROM THE T&T GAME //////////////////////////////////////////////////////
	{
		if ($type == "giant")
		{
			switch (mt_rand(0,54))
			{
				case 0: $weapon = "Spear - Long Spear (8')"; break;
				case 1: $weapon = "Spear - Pilum (5' - 8')"; break;
				case 2: $weapon = "Sword - Estok"; break;
				case 3: $weapon = "Sword - Falchion (4')"; break;
				case 4: $weapon = "Sword - Fish Spine Sword (4')"; break;
				case 5: $weapon = "Polearm - Fauchard (12')"; break;
				case 6: $weapon = "Polearm - Half-Halbard (5')"; break;
				case 7: $weapon = "Spear - Boar Spear (5')"; break;
				case 8: $weapon = "Hafted - Headsman Axe"; break;
				case 9: $weapon = "Polearm - Billhook (11')"; break;
				case 10: $weapon = "Polearm - Falx-Arr (7')"; break;
				case 11: $weapon = "Polearm - Guisarme (9')"; break;
				case 12: $weapon = "Polearm - Poleaxe (10')"; break;
				case 13: $weapon = "Spear - Forkspear (7')"; break;
				case 14: $weapon = "Spear - Harpoon (5')"; break;
				case 15: $weapon = "Sword - Pata (Long Katar) (3' - 4')"; break;
				case 16: $weapon = "Sword - Urukish Scimitar (4 1/2')"; break;
				case 17: $weapon = "Hafted - Thrusting Axe"; break;
				case 18: $weapon = "Hafted - Dagger Mace"; break;
				case 19: $weapon = "Hafted - Pickaxe"; break;
				case 20: $weapon = "Hafted - Sledgehammer"; break;
				case 21: $weapon = "Polearm - Bardiche (9')"; break;
				case 22: $weapon = "Polearm - Chauves Souris (12')"; break;
				case 23: $weapon = "Polearm - Partisan (8')"; break;
				case 24: $weapon = "Polearm - Pike (12')"; break;
				case 25: $weapon = "Polearm - Ranseur (Runka) (12')"; break;
				case 26: $weapon = "Polearm - Voulge (10')"; break;
				case 27: $weapon = "Sword - Black Eagle Blade (3 1/2')"; break;
				case 28: $weapon = "Sword - Broadsword (3' - 4')"; break;
				case 29: $weapon = "Sword - Great Shamsheer (4 1/2' - 5')"; break;
				case 30: $weapon = "Hafted - Bullova"; break;
				case 31: $weapon = "Hafted - War Hammer"; break;
				case 32: $weapon = "Polearm - Halbard (10')"; break;
				case 33: $weapon = "Sword - Hand-And-A-Half Sword (4')"; break;
				case 34: $weapon = "Hafted - Broad Axe"; break;
				case 35: $weapon = "Hafted - Heavy Mace"; break;
				case 36: $weapon = "Hafted - Morningstar"; break;
				case 37: $weapon = "Polearm - Brandestock (6')"; break;
				case 38: $weapon = "Sword - Cross Thrust Sword (5')"; break;
				case 39: $weapon = "Sword - Two-Handed Broadsword (5')"; break;
				case 40: $weapon = "Hafted - Elephant Axe"; break;
				case 41: $weapon = "Hafted - Flanged Mace"; break;
				case 42: $weapon = "Hafted - Ravenbeak"; break;
				case 43: $weapon = "Hafted - Light Flail"; break;
				case 44: $weapon = "Hafted - Maul"; break;
				case 45: $weapon = "Polearm - Extended Brandestock (9')"; break;
				case 46: $weapon = "Hafted - Great Axe"; break;
				case 47: $weapon = "Hafted - Heavy Flail"; break;
				case 48: $weapon = "Hafted - Double-Bladed Broad Axe"; break;
				case 49: $weapon = "Sword - Flamberge (6')"; break;
				case 50: $weapon = "Sword - Great Sword (6')"; break;
				case 51: $weapon = "Sword - Grand Shamsheer (6')"; break;
				case 52: $weapon = "Hafted - Orkish War Axe"; break;
				case 53: $weapon = "Hafted - Dwarven War Axe"; break;
				case 54: $weapon = "Sword - Bonesplitter (6')"; break;
			}
		}
		else if ($type == "small")
		{
			switch (mt_rand(0,12))
			{
				case 0:	$weapon = "Dagger - Bank";				break;
				case 1:	$weapon = "Dagger - Bich'wa";			break;
				case 2:	$weapon = "Dagger - Dirk";				break;
				case 3:	$weapon = "Dagger - Ice Pick";			break;
				case 4:	$weapon = "Dagger - Misericorde";		break;
				case 5:	$weapon = "Dagger - Poniard";			break;
				case 6:	$weapon = "Dagger - Stiletto";			break;
				case 7:	$weapon = "Dagger - Haladie";			break;
				case 8:	$weapon = "Dagger - Jambiya";			break;
				case 9:	$weapon = "Dagger - Katar";				break;
				case 10:$weapon = "Dagger - Butterfly Knife";	break;
				case 11:$weapon = "Hafted - Baton";				break;
				case 12:$weapon = "Hafted - Club";				break;
			}
		}
		else if ($type == "demon")
		{
			switch (mt_rand(0,5))
			{
				case 0:	$adj = "burning";	break;
				case 1:	$adj = "blazing";	break;
				case 2:	$adj = "flaming";	break;
				case 3:	$adj = "fiery";		break;
				case 4:	$adj = "scorching";	break;
				case 5:	$adj = "flaring";	break;
			}

			switch (mt_rand(0,9))
			{
				case 0:	$weapon = $adj . " trident";	break;
				case 1:	$weapon = $adj . " longsword";	break;
				case 2:	$weapon = $adj . " spear";		break;
				case 3:	$weapon = $adj . " staff";		break;
				case 4:	$weapon = $adj . " whip";		break;
				case 5:	$weapon = "whip";				break;
				case 6:	$weapon = "trident";			break;
				case 7:	$weapon = "longsword";			break;
				case 8:	$weapon = "spear";				break;
				case 9:	$weapon = "staff";				break;
			}
		}
		else
		{
			switch (mt_rand(0,104))
			{
				case 0: $weapon = "Hafted - Club"; break;
				case 1: $weapon = "Hafted - Piton Hammer"; break;
				case 2: $weapon = "Spear - Javelin (6')"; break;
				case 3: $weapon = "Spear - Stabguard (5')"; break;
				case 4: $weapon = "Hafted - Hatchet"; break;
				case 5: $weapon = "Dagger - Kukri"; break;
				case 6: $weapon = "Hafted - Pacifier"; break;
				case 7: $weapon = "Spear - Stinger (4')"; break;
				case 8: $weapon = "Sword - Terbutje"; break;
				case 9: $weapon = "Spear - Assegai (6')"; break;
				case 10: $weapon = "Sword - Foil (3' - 4')"; break;
				case 11: $weapon = "Dagger - Hungamunga"; break;
				case 12: $weapon = "Dagger - Sax"; break;
				case 13: $weapon = "Spear - Shield-Spear (4')"; break;
				case 14: $weapon = "Sword - Short Sabre (2' - 2 1/2')"; break;
				case 15: $weapon = "Sword - Short Sword (2' - 2 1/2')"; break;
				case 16: $weapon = "Hafted - Taper Axe"; break;
				case 17: $weapon = "Hafted - Cleaver"; break;
				case 18: $weapon = "Spear - Common Spear (6')"; break;
				case 19: $weapon = "Sword - Cutlass (3')"; break;
				case 20: $weapon = "Dagger - Fang-Wing"; break;
				case 21: $weapon = "Dagger - Kris"; break;
				case 22: $weapon = "Hafted - Mitre"; break;
				case 23: $weapon = "Sword - Swamp Blade"; break;
				case 24: $weapon = "Hafted - Truncheon"; break;
				case 25: $weapon = "Hafted - Adze"; break;
				case 26: $weapon = "Hafted - Throwing Axe"; break;
				case 27: $weapon = "Sword - Epee (3' - 5')"; break;
				case 28: $weapon = "Sword - Sabre (3')"; break;
				case 29: $weapon = "Spear - Spontoon (8')"; break;
				case 30: $weapon = "Hafted - Woodsman Axe"; break;
				case 31: $weapon = "Spear - Footman's Lance (8')"; break;
				case 32: $weapon = "Sword - Gladius (2 1/2' - 3')"; break;
				case 33: $weapon = "Spear - Hoko (6')"; break;
				case 34: $weapon = "Polearm - Kumade (Rake) (5')"; break;
				case 35: $weapon = "Dagger - Main Gauche"; break;
				case 36: $weapon = "Sword - Manople (2' - 3')"; break;
				case 37: $weapon = "Hafted - Mattock"; break;
				case 38: $weapon = "Spear - Oxtongue (6')"; break;
				case 39: $weapon = "Polearm - Pitchfork (6')"; break;
				case 40: $weapon = "Hafted - Prybar"; break;
				case 41: $weapon = "Sword - Rapier (3' - 5')"; break;
				case 42: $weapon = "Sword - Scimitar (3')"; break;
				case 43: $weapon = "Sword - Shotel (3' - 4')"; break;
				case 44: $weapon = "Sword - Sword Cane (2' - 3')"; break;
				case 45: $weapon = "Dagger - Swordbreaker"; break;
				case 46: $weapon = "Spear - Trident (6')"; break;
				case 47: $weapon = "Hafted - Zaghnal"; break;
				case 48: $weapon = "Sword - Punch Sword (2 1/2')"; break;
				case 49: $weapon = "Polearm - Scythe (Long) (6')"; break;
				case 50: $weapon = "Hafted - Sickle (3')"; break;
				case 51: $weapon = "Hafted - Crowbar (5')"; break;
				case 52: $weapon = "Polearm - Demi-Lune (Halfmoon) (12')"; break;
				case 53: $weapon = "Sword - Estok"; break;
				case 54: $weapon = "Sword - Falchion (4')"; break;
				case 55: $weapon = "Sword - Fish Spine Sword (4')"; break;
				case 56: $weapon = "Spear - Long Spear (8')"; break;
				case 57: $weapon = "Spear - Pilum (5' - 8')"; break;
				case 58: $weapon = "Spear - Boar Spear (5')"; break;
				case 59: $weapon = "Polearm - Fauchard (12')"; break;
				case 60: $weapon = "Polearm - Half-Halbard (5')"; break;
				case 61: $weapon = "Hafted - Headsman Axe"; break;
				case 62: $weapon = "Polearm - Billhook (11')"; break;
				case 63: $weapon = "Polearm - Falx-Arr (7')"; break;
				case 64: $weapon = "Spear - Forkspear (7')"; break;
				case 65: $weapon = "Polearm - Guisarme (9')"; break;
				case 66: $weapon = "Spear - Harpoon (5')"; break;
				case 67: $weapon = "Sword - Pata (Long Katar) (3' - 4')"; break;
				case 68: $weapon = "Polearm - Poleaxe (10')"; break;
				case 69: $weapon = "Sword - Urukish Scimitar (4 1/2')"; break;
				case 70: $weapon = "Hafted - Thrusting Axe"; break;
				case 71: $weapon = "Polearm - Bardiche (9')"; break;
				case 72: $weapon = "Sword - Black Eagle Blade (3 1/2')"; break;
				case 73: $weapon = "Sword - Broadsword (3' - 4')"; break;
				case 74: $weapon = "Polearm - Chauves Souris (12')"; break;
				case 75: $weapon = "Hafted - Dagger Mace"; break;
				case 76: $weapon = "Sword - Great Shamsheer (4 1/2' - 5')"; break;
				case 77: $weapon = "Polearm - Partisan (8')"; break;
				case 78: $weapon = "Hafted - Pickaxe"; break;
				case 79: $weapon = "Polearm - Pike (12')"; break;
				case 80: $weapon = "Polearm - Ranseur (Runka) (12')"; break;
				case 81: $weapon = "Hafted - Sledgehammer"; break;
				case 82: $weapon = "Polearm - Voulge (10')"; break;
				case 83: $weapon = "Hafted - Bullova"; break;
				case 84: $weapon = "Polearm - Halbard (10')"; break;
				case 85: $weapon = "Hafted - War Hammer"; break;
				case 86: $weapon = "Sword - Hand-And-A-Half Sword (4')"; break;
				case 87: $weapon = "Hafted - Broad Axe"; break;
				case 88: $weapon = "Polearm - Brandestock (6')"; break;
				case 89: $weapon = "Sword - Cross Thrust Sword (5')"; break;
				case 90: $weapon = "Hafted - Heavy Mace"; break;
				case 91: $weapon = "Hafted - Morningstar"; break;
				case 92: $weapon = "Sword - Two-Handed Broadsword (5')"; break;
				case 93: $weapon = "Longbow Extra-Heavy with about " . (mt_rand(10,30)) . " arrows each";		break;
				case 94: $weapon = "Longbow Heavy with about " . (mt_rand(10,30)) . " arrows each";		break;
				case 95: $weapon = "Longbow Medium with about " . (mt_rand(10,30)) . " arrows each";		break;
				case 96: $weapon = "Crossbow with about " . (mt_rand(10,30)) . " bolts each";	break;
				case 97: $weapon = "Hand crossbow with about " . (mt_rand(10,30)) . " bolts each";	break;
				case 98: $weapon = "Light crossbow with about " . (mt_rand(10,30)) . " bolts each";	break;
				case 99: $weapon = "Self Bow Extra-Heavy with about " . (mt_rand(10,30)) . " arrows each";		break;
				case 100:$weapon = "Self Bow Heavy with about " . (mt_rand(10,30)) . " arrows each";		break;
				case 101:$weapon = "Self Bow Light with about " . (mt_rand(10,30)) . " arrows each";		break;
				case 102:$weapon = "Self Bow Medium with about " . (mt_rand(10,30)) . " arrows each";		break;
				case 103:$weapon = "Sling with about " . (mt_rand(10,30)) . " stones each";		break;
				case 104:$weapon = "Staff Sling with about " . (mt_rand(10,30)) . " stones each";		break;
			}
		}
	}
	return $weapon;
}

?>