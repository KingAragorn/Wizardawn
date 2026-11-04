<?php

/// THIS MAKES A TREASURE ITEM FOR POST-APOCALYPTIC GAMES ///

function makePAItem($level,$size,$condition)
{
	if ($level > 0){$level = mt_rand(1,$level);} else {$level = mt_rand(1,20);}

	if ($size == 1){$i = 50;} else if ($size == 2){$i = 60;} else {$i = 80;}

	$which_item = mt_rand(1,$i);

	if ($which_item < 11){$the_item = "pistol";}
	else if ($which_item < 21){$the_item = "grenade";}
	else if ($which_item < 31){$the_item = "device";}
	else if ($which_item < 41){$the_item = "weapon";}
	else if ($which_item < 51){$the_item = "drug";}
	else if ($which_item < 61){$the_item = "bomb";}
	else if ($which_item < 71){$the_item = "rifle";}
	else {$the_item = "armor";}

	$working = mt_rand(2,12);

	if ($condition != 1)
	{
		if ($working < 6){$work = " (ruined)";}
		else if ($working < 8){$work = " (poor)";}
		else if ($working < 10){$work = " (fair)";}
		else if ($working < 11){$work = " (good)";}
		else if ($working < 12){$work = " (excellent)";}
		else {$work = " (perfect)";}
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ($the_item == "pistol")
	{
		$goods = 1;
		switch (mt_rand(0,13))
		{
			case 0:	$artifact = "slug thrower pistol";					break;
			case 1:	$artifact = "needler pistol";						break;
			case 2:	$artifact = "stun ray pistol";						break;
			case 3:	$artifact = "laser pistol";							break;
			case 4:	$artifact = "mark 5 blaster pistol";				break;
			case 5:	$artifact = "black ray pistol";						break;
			case 6:	$artifact = "automatic pistol";						break;
			case 7:	$artifact = "gun powder pistol";					break;
			case 8:	$artifact = "revolver pistol";						break;
			case 9:	$artifact = "sub machinegun";						break;
			case 10:$artifact = "magnetic-propelled machine pistol";	break;
			case 11:$artifact = "magnetic-propelled pistol";			break;
			case 12:$artifact = "plasma pistol";						break;
			case 13:$artifact = "microwave pistol";						break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "rifle")
	{
		$goods = 1;
		switch (mt_rand(0,18))
		{
			case 0:	$artifact = "stun rifle";					break;
			case 1:	$artifact = "laser rifle";					break;
			case 2:	$artifact = "mark 7 rifle";					break;
			case 3:	$artifact = "fusion rifle";					break;
			case 4:	$artifact = "automatic rifle";				break;
			case 5:	$artifact = "gun powder rifle";				break;
			case 6:	$artifact = "sport rifle";					break;
			case 7:	$artifact = "shotgun";						break;
			case 8:	$artifact = "automatic shotgun";			break;
			case 9:	$artifact = "machinegun";					break;
			case 10:$artifact = "blaster rifle";				break;
			case 11:$artifact = "EMP rifle";					break;
			case 12:$artifact = "fusion rifle";					break;
			case 13:$artifact = "plasma rifle";					break;
			case 14:$artifact = "magnetic-propelled auto rifle";break;
			case 15:$artifact = "magnetic-propelled rifle";		break;
			case 16:$artifact = "microwave rifle";				break;
			case 17:$artifact = "radiation rifle";				break;
			case 18:$artifact = "x-laser rifle";				break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "weapon")
	{
		$goods = 1;
		if ($size == 1){$c = 4;} else if ($size == 2){$c = 8;} else {$c = 10;}
		switch (mt_rand(0,$c))
		{
			case 0:	$artifact = "vibro dagger";			break;
			case 1:	$artifact = "warp-field dagger";	break;
			case 2:	$artifact = "shock gloves";			break;
			case 3:	$artifact = "stun whip";			break;
			case 4:	$artifact = "shock-field glove";	break;
			case 5:	$artifact = "energy baton";			break;
			case 6:	$artifact = "stun baton";			break;
			case 7:	$artifact = "energy mace";			break;
			case 8:	$artifact = "warp-field mace";		break;
			case 9: $artifact = "warp-field sword";		break;
			case 10:$artifact = "vibro blade";			break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "grenade")
	{
		switch (mt_rand(0,17))
		{
			case 0:	$artifact = "gas grenade";				break;
			case 1:	$artifact = "chemical grenade";			break;
			case 2:	$artifact = "frag grenade";				break;
			case 3:	$artifact = "energy grenade";			break;
			case 4:	$artifact = "photon grenade";			break;
			case 5:	$artifact = "disintegration grenade";	break;
			case 6:	$artifact = "blood agent grenade";		break;
			case 7:	$artifact = "concussion grenade";		break;
			case 8:	$artifact = "dynamite";					break;
			case 9:	$artifact = "inferno grenade";			break;
			case 10:$artifact = "irritant gas grenade";		break;
			case 11:$artifact = "molotov cocktail";			break;
			case 12:$artifact = "mutation grenade";			break;
			case 13:$artifact = "nerve gas grenade";		break;
			case 14:$artifact = "plasma grenade";			break;
			case 15:$artifact = "shock grenade";			break;
			case 16:$artifact = "smoke grenade";			break;
			case 17:$artifact = "grenade launcher";			break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "bomb")
	{
		$goods = 1;
		if ($size < 3){$c = 12;} else {$c = 21;}

		switch (mt_rand(0,$c))
		{
			case 0:	$artifact = "small c-4 pack";			break;
			case 1:	$artifact = "fission bomb";				break;
			case 2:	$artifact = "fusion bomb";				break;
			case 3:	$artifact = "concussion bomb";			break;
			case 4:	$artifact = "matter bomb";				break;
			case 5:	$artifact = "negation bomb";			break;
			case 6:	$artifact = "neutron bomb";				break;
			case 7:	$artifact = "disintegration bomb";		break;
			case 8:	$artifact = "mutation bomb";			break;
			case 9:	$artifact = "bio weapon bomb";			break;
			case 10:$artifact = "mutation bomb";			break;
			case 11:$artifact = "plasma bomb";				break;
			case 12:$artifact = "radiation bomb";			break;
			case 13:$artifact = "micro-missile";			break;
			case 14:$artifact = "mini-missile";				break;
			case 15:$artifact = "surface missile";			break;
			case 16:$artifact = "neutron missile";			break;
			case 17:$artifact = "negation missile";			break;
			case 18:$artifact = "fission missile";			break;
			case 19:$artifact = "large c-4 pack";			break;
			case 20:$artifact = "small anti-tank weapon";	break;
			case 21:$artifact = "missile launcher";			break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "armor")
	{
		$goods = 1;
		switch (mt_rand(0,13))
		{
			case 0:	$artifact = "sheath armor";					break;
			case 1:	$artifact = "powered plate armor";			break;
			case 2:	$artifact = "powered alloyed plate armor";	break;
			case 3:	$artifact = "plastic armor";				break;
			case 4:	$artifact = "energized armor";				break;
			case 5:	$artifact = "inertia armor";				break;
			case 6:	$artifact = "powered scout armor";			break;
			case 7:	$artifact = "powered battle armor";			break;
			case 8:	$artifact = "powered attack armor";			break;
			case 9:	$artifact = "powered assault armor";		break;
			case 10:$artifact = "ballistic nylon armor";		break;
			case 11:$artifact = "metal armor insert";			break;
			case 12:$artifact = "advanced metal armor";			break;
			case 13:$artifact = "enviro-armor";					break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "device")
	{
		if ($size == 1){$c = 32;} else if ($size == 2){$c = 38;} else {$c = 41;}

		switch (mt_rand(1,$c))
		{
			case 1:	$artifact = "energy cloak";				$goods = 1; break;
			case 2:	$artifact = "communication sender";		$goods = 1; break;
			case 3:	$artifact = "medi-kit";					break;
			case 4:	$artifact = "ultra-violet goggles";		$goods = 1; break;
			case 5:	$artifact = "infrared goggles";			$goods = 1; break;
			case 6:	$artifact = "chemical energy cells";	break;
			case 7:	$artifact = "solar energy cell";		break;
			case 8:	$artifact = "hydrogen energy cell";		break;
			case 9:	$artifact = "atomic energy cell";		break;
			case 10:$artifact = "energy cell charger";		break;
			case 11:$artifact = "power cell";				break;
			case 12:$artifact = "power pack";				break;
			case 13:$artifact = "power clip";				break;
			case 14:$artifact = "power beltpack";			$goods = 1; break;
			case 15:$artifact = "fusion cell";				break;
			case 16:$artifact = "plutonium cell";			break;
			case 17:$artifact = "radioactive cell";			break;
			case 18:$artifact = "breathing mask";			$goods = 1; break;
			case 19:$artifact = "grappling hook gun";		$goods = 1; break;
			case 20:$artifact = "communicator";				$goods = 1; break;
			case 21:$artifact = "electronic notepad";		$goods = 1; break;
			case 22:$artifact = "flashlight";				$goods = 1; break;
			case 23:$artifact = "force field belt";			$goods = 1; break;
			case 24:$artifact = "gas mask";					$goods = 1; break;
			case 25:$artifact = "chemical sensor";			$goods = 1; break;
			case 26:$artifact = "geiger counter";			$goods = 1; break;
			case 27:$artifact = "motion detector";			$goods = 1; break;
			case 28:$artifact = "optic scanner";			$goods = 1; break;
			case 29:$artifact = "portable radar";			$goods = 1; break;
			case 30:$artifact = "power glove";				$goods = 1; break;
			case 31:$artifact = "x-ray goggles";			$goods = 1; break;
			case 32:$artifact = "identity card";			$goods = 1; break;
			case 33:$artifact = "control baton";			$goods = 1; break;
			case 34:$artifact = "energy tent";				$goods = 1; break;
			case 35:$artifact = "ultra-violet sterilizer";	$goods = 1; break;
			case 36:$artifact = "water purifier";			$goods = 1; break;
			case 37:$artifact = "hologram projector";		$goods = 1; break;
			case 38:$artifact = "light rod";				$goods = 1; break;
			case 39:$artifact = "power backpack";			$goods = 1; break;
			case 40:$artifact = "portable stove";			$goods = 1; break;
			case 41:$artifact = "anti-grav sled";			$goods = 1; break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else
	{
		if ($size == 1){$c = 18;} else if ($size == 2){$c = 19;} else {$c = 21;}

		switch (mt_rand(0,$c))
		{
			case 0:	$artifact = "pain reducer";					break;
			case 1:	$artifact = "mind boosters";				break;
			case 2:	$artifact = "sustenance shot";				break;
			case 3:	$artifact = "truth serum";					break;
			case 4:	$artifact = "stim shot";					break;
			case 5:	$artifact = "cure shot";					break;
			case 6:	$artifact = "hypnotic shot";				break;
			case 7:	$artifact = "healing shot";					break;
			case 8:	$artifact = "radiation serum";				break;
			case 9:	$artifact = "reanimation beam";				break;
			case 10:$artifact = "salt pills";					break;
			case 11:$artifact = "anti-radiation spray can";		break;
			case 12:$artifact = "radiation detector wristband";	$goods = 1; break;
			case 13:$artifact = "dehydrated pills";				break;
			case 14:$artifact = "synthetic alcohol";			break;
			case 15:$artifact = "blood filter shot";			break;
			case 16:$artifact = "medical spray";				break;
			case 17:$artifact = "regeneration shot";			break;
			case 18:$artifact = "healing pack";					break;
			case 19:$artifact = "diagnostic scanner";			$goods = 1; break;
			case 20:$artifact = "rejuvenation pod";				$goods = 1; break;
			case 21:$artifact = "stasis chamber";				$goods = 1; break;
		}
	}

	if ($goods > 0){ $item = ucfirst($artifact) . $work; }
	else { $item = ucfirst($artifact); }
	return $item;
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function makeBUItem($level,$size,$condition)
{
	if ($level > 0){$level = mt_rand(1,$level);} else {$level = mt_rand(1,20);}

	if ($size == 1){$i = 50;} else if ($size == 2){$i = 60;} else {$i = 70;}

	$which_item = mt_rand(1,$i);

	if ($which_item < 11){$the_item = "pistol";}
	else if ($which_item < 21){$the_item = "grenade";}
	else if ($which_item < 31){$the_item = "drug";}
	else if ($which_item < 41){$the_item = "device";}
	else if ($which_item < 51){$the_item = "weapon";}
	else if ($which_item < 61){$the_item = "armor";}
	else {$the_item = "rifle";}

	$working = mt_rand(2,12);

	if ($condition != 1)
	{
		if ($working < 6){$work = " (ruined)";}
		else if ($working < 8){$work = " (poor)";}
		else if ($working < 10){$work = " (fair)";}
		else if ($working < 11){$work = " (good)";}
		else if ($working < 12){$work = " (excellent)";}
		else {$work = " (perfect)";}
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ($the_item == "pistol")
	{
		$goods = 1;
		switch (mt_rand(0,11))
		{
			case 0:	$artifact = "electrical pistol";	break;
			case 1:	$artifact = "freeze pistol";		break;
			case 2:	$artifact = "fusion pistol";		break;
			case 3:	$artifact = "gyrojet pistol";		break;
			case 4:	$artifact = "heavy pistol";			break;
			case 5:	$artifact = "machine pistol";		break;
			case 6:	$artifact = "medium pistol";		break;
			case 7:	$artifact = "small pistol";			break;
			case 8:	$artifact = "stun pistol";			break;
			case 9:	$artifact = "laser pistol";			break;
			case 10:$artifact = "plasma pistol";		break;
			case 11:$artifact = "box of " . mt_rand(10,50) . " bullets";	break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "rifle")
	{
		$goods = 1;
		switch (mt_rand(0,17))
		{
			case 0:	$artifact = "fusion crossbow";		break;
			case 1:	$artifact = "gravitube";			break;
			case 2:	$artifact = "electrical rifle";		break;
			case 3:	$artifact = "frag gun";				break;
			case 4:	$artifact = "freeze rifle";			break;
			case 5:	$artifact = "fusion rifle";			break;
			case 6:	$artifact = "gyrojet rifle";		break;
			case 7:	$artifact = "heavy rifle";			break;
			case 8:	$artifact = "machine rifle";		break;
			case 9:	$artifact = "medium rifle";			break;
			case 10:$artifact = "small rifle";			break;
			case 11:$artifact = "shotgun";				break;
			case 12:$artifact = "flamethrower";			break;
			case 13:$artifact = "laser rifle";			break;
			case 14:$artifact = "missile launcher";		break;
			case 15:$artifact = "missile";				break;
			case 16:$artifact = "plasma rifle";			break;
			case 17:$artifact = "box of " . mt_rand(10,50) . " bullets";	break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "weapon")
	{
		if ($size == 1){$c = 3;} else if ($size == 2){$c = 7;} else {$c = 13;}
		$goods = 1;
		switch (mt_rand(0,$c))
		{
			case 0:	$artifact = "pulse knife";			break;
			case 1:	$artifact = "razor disc";			break;
			case 2:	$artifact = "electrical whip";		break;
			case 3:	$artifact = "plasma knife";			break;
			case 4:	$artifact = "plasma axe";			break;
			case 5:	$artifact = "pulse axe";			break;
			case 6:	$artifact = "pulse sword";			break;
			case 7:	$artifact = "plasma sword";			break;
			case 8:	$artifact = "plasma battle axe";	break;
			case 9:	$artifact = "pulse battle axe";		break;
			case 10:$artifact = "pulse broadsword";		break;
			case 11:$artifact = "electrical staff";		break;
			case 12:$artifact = "searing spear";		break;
			case 13:$artifact = "plasma broadsword";	break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "grenade")
	{
		switch (mt_rand(0,10))
		{
			case 0:	$artifact = "blast disc";		break;
			case 1:	$artifact = "EMP grenade";		break;
			case 2:	$artifact = "flash grenade";	break;
			case 3:	$artifact = "magnetic mine";	break;
			case 4:	$artifact = "netted mine";		break;
			case 5:	$artifact = "proximity mine";	break;
			case 6:	$artifact = "detonix";			break;
			case 7:	$artifact = "grenade";			break;
			case 8:	$artifact = "plasma grenade";	break;
			case 9:	$artifact = "smoke grenade";	break;
			case 10:$artifact = "stun grenade";		break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "armor")
	{
		if ($size < 3){$c = 3;} else {$c = 8;}
		$goods = 1;
		switch (mt_rand(0,$c))
		{
			case 0:	$artifact = "metal helmet";			break;
			case 1:	$artifact = "plastic helmet";		break;
			case 2:	$artifact = "plastoid helmet";		break;
			case 3:	$artifact = "energy shield";		break;
			case 4:	$artifact = "plastoid armor";		break;
			case 5:	$artifact = "silicoid armor";		break;
			case 6:	$artifact = "plastoid shield";		break;
			case 7:	$artifact = "strong shield";		break;
			case 8:	$artifact = "weak shield";			break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else if ($the_item == "device")
	{
		if ($size == 1){$c = 12;} else if ($size == 2){$c = 15;} else {$c = 18;}
		$goods = 1;
		switch (mt_rand(1,$c))
		{
			case 0:	$artifact = "xormite battery casing";	break;
			case 1:	$artifact = "solar battery";			break;
			case 2:	$artifact = "anti-grav belt";			break;
			case 3:	$artifact = "wrist chronometer";		break;
			case 4:	$artifact = "anti-grav folding cart";	break;
			case 5:	$artifact = "crash foamer";				break;
			case 6:	$artifact = "force collar";				break;
			case 7:	$artifact = "force cuffs";				break;
			case 8:	$artifact = "shock gloves";				break;
			case 9:	$artifact = "solar goggles";			break;
			case 10:$artifact = "rad reader";				break;
			case 11:$artifact = "computerized scope";		break;
			case 12:$artifact = "laser sight scope";		break;
			case 13:$artifact = "jump boots";				break;
			case 14:$artifact = "sonix headset";			break;
			case 15:$artifact = "spy glide";				break;
			case 16:$artifact = "camo screen";				break;
			case 17:$artifact = "anti-grav pack";			break;
			case 18:$artifact = "anti-grav pod";			break;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else
	{
		switch (mt_rand(0,6))
		{
			case 0:	$artifact = "stasis belt";		$goods = 1;	break;
			case 1:	$artifact = "adrenaline shot";	break;
			case 2:	$artifact = "mutagen shot";		break;
			case 3:	$artifact = "steroid shot";		break;
			case 4:	$artifact = "medshot";			break;
			case 5:	$artifact = "medwrap";			break;
			case 6:	$artifact = "toxshot";			break;
		}
	}

	if ($goods > 0){ $item = ucfirst($artifact) . $work; }
	else { $item = ucfirst($artifact); }
	return $item;
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function makeMFLLItem($level,$size,$cash,$tech)
{
		if ($size == 1){$i = 50;} else if ($size == 2){$i = 60;} else {$i = 70;}

		$which_item = mt_rand(1,$i);

		if ($which_item < 11){$the_item = "pistol";}
		else if ($which_item < 21){$the_item = "grenade";}
		else if ($which_item < 41){$the_item = "device";}
		else if ($which_item < 51){$the_item = "weapon";}
		else if ($which_item < 61){$the_item = "armor";}
		else {$the_item = "rifle";}

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ($the_item == "pistol")
		{
			if ($tech == 1){$g1 = 5; $g2 = 10;} else if ($tech == 2){$g1 = 0; $g2 = 10;} else {$g1 = 0; $g2 = 4;}
			switch (mt_rand($g1,$g2))
			{
				case 0: $artifact = "Bullets (" . mt_rand(2,12) . ") [ <i>Value: 1 " . $cash . " each | Desc: This small item consists of a metal casing packed with combustible powder.  The top is capped with metal projectile.</i>]"; break;
				case 1:	$artifact = "Pistol, Small [ <i>Value: 15 " . $cash . " | Type: Light | Dmg: 1d8 | Ammo: 6 bullets can be loaded | Ammo Remaining: " . mt_rand(0,6) . " | Desc: This gun uses combustible powder with metal projectiles (bullets).</i>]"; break;
				case 2:	$artifact = "Pistol, Machine [ <i>Value: 75 " . $cash . " | Type: Light | Dmg: 1d10 | Ammo: 24 bullets can be loaded | Ammo Remaining: " . mt_rand(0,24) . " | Desc: This gun uses combustible powder with metal projectiles (bullets) that can potentially hit 2 targets at once.</i>]"; break;
				case 3:	$artifact = "Pistol, Medium [ <i>Value: 20 " . $cash . " | Type: Light | Dmg: 1d10 | Ammo: 12 bullets can be loaded | Ammo Remaining: " . mt_rand(0,12) . " | Desc: This gun uses combustible powder with metal projectiles (bullets).</i>]"; break;
				case 4:	$artifact = "Pistol, Heavy [ <i>Value: 25 " . $cash . " | Type: Light | Dmg: 1d12 | Ammo: 12 bullets can be loaded | Ammo Remaining: " . mt_rand(0,12) . " | Desc: This gun uses combustible powder with metal projectiles (bullets).</i>]"; break;
				case 5:	$artifact = "Pistol, Electrical [ <i>Value: 40 " . $cash . " | Type: Light | Dmg: 1d8 | Ammo: 12 shots per power clip | Ammo Remaining: " . mt_rand(0,12) . " | Desc: This pistol fires a wave of electrical energy that can potentially hit 2 targets at once.</i>]"; break;
				case 6:	$artifact = "Pistol, Freeze [ <i>Value: 500 " . $cash . " | Type: Light | Ammo: 6 shots per power clip | Ammo Remaining: " . mt_rand(0,6) . " | Desc: This pistol fires a beam of icy energy that requires the target to defend for petrification or be frozen for 1d2 turns.</i>]"; break;
				case 7:	$artifact = "Pistol, Fusion [ <i>Value: 120 " . $cash . " | Type: Light | Dmg: 2d8+2 | Ammo: 18 shots per power clip | Ammo Remaining: " . mt_rand(0,18) . " | Desc: This pistol fires an intense beam of red energy.</i>]"; break;
				case 8:	$artifact = "Pistol, Laser [ <i>Value: 32 " . $cash . " | Type: Light | Dmg: 2d6 | Ammo: 24 shots per power clip | Ammo Remaining: " . mt_rand(0,24) . " | Desc: This pistol fires a beam of yellow energy.</i>]"; break;
				case 9:	$artifact = "Pistol, Plasma [ <i>Value: 56 " . $cash . " | Type: Light | Dmg: 2d8 | Ammo: 20 shots per power clip | Ammo Remaining: " . mt_rand(0,20) . " | Desc: This pistol fires a beam of green energy.</i>]"; break;
				case 10:$artifact = "Pistol, Stun [ <i>Value: 135 " . $cash . " | Type: Light | Ammo: 8 shots per power clip | Ammo Remaining: " . mt_rand(0,8) . " | Desc: This pistol fires a beam of energy that requires the target to defend for paralyzation or be stunned for 1d4 rounds.</i>]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if ($the_item == "rifle")
		{
			if ($tech == 1){$g1 = 6; $g2 = 10;} else if ($tech == 2){$g1 = 0; $g2 = 10;} else {$g1 = 0; $g2 = 5;}
			switch (mt_rand($g1,$g2))
			{
				case 0: $artifact = "Bullets (" . mt_rand(2,12) . ") [ <i>Value: 1 " . $cash . " each | Desc: This small item consists of a metal casing packed with combustible powder.  The top is capped with metal projectile.</i>]"; break;
				case 1:	$artifact = "Rifle, Small [ <i>Value: 25 " . $cash . " | Type: Light | Dmg: 1d10 | Ammo: 6 bullets can be loaded | Ammo Remaining: " . mt_rand(0,6) . " | Desc: This gun uses combustible powder with metal projectiles (bullets).</i>]"; break;
				case 2:	$artifact = "Shotgun [ <i>Value: 50 " . $cash . " | Type: Light | Dmg: 1d12 | Ammo: 2 bullets can be loaded | Ammo Remaining: " . mt_rand(0,2) . " | Desc: This gun uses combustible powder with metal projectiles.  It can do an additional 1d8 damage at very close range.</i>]"; break;
				case 3:	$artifact = "Rifle, Machine [ <i>Value: 100 " . $cash . " | Type: Medium | Dmg: 1d12 | Ammo: 24 bullets can be loaded | Ammo Remaining: " . mt_rand(0,24) . " | Desc: This gun uses combustible powder with metal projectiles (bullets) that can potentially hit 2 targets at once.</i>]"; break;
				case 4:	$artifact = "Rifle, Medium [ <i>Value: 30 " . $cash . " | Type: Light | Dmg: 1d12 | Ammo: 12 bullets can be loaded | Ammo Remaining: " . mt_rand(0,12) . " | Desc: This gun uses combustible powder with metal projectiles (bullets).</i>]"; break;
				case 5:	$artifact = "Rifle, Heavy [ <i>Value: 35 " . $cash . " | Type: Medium | Dmg: 1d12+2 | Ammo: 12 bullets can be loaded | Ammo Remaining: " . mt_rand(0,12) . " | Desc: This gun uses combustible powder with metal projectiles (bullets).</i>]"; break;
				case 6:	$artifact = "Rifle, Electrical [ <i>Value: 70 " . $cash . " | Type: Light | Dmg: 1d10 | Ammo: 10 shots per power clip | Ammo Remaining: " . mt_rand(0,10) . " | Desc: This rifle fires a wave of electrical energy that can potentially hit 2 targets at once.</i>]"; break;
				case 7:	$artifact = "Rifle, Freeze [ <i>Value: 1,100 " . $cash . " | Type: Light | Ammo: 4 shots per power clip | Ammo Remaining: " . mt_rand(0,4) . " | Desc: This rifle fires a beam of icy energy that requires the target to defend for petrification or be frozen for 1d4 turns.</i>]"; break;
				case 8:	$artifact = "Rifle, Fusion [ <i>Value: 230 " . $cash . " | Type: Medium | Dmg: 2d10+2 | Ammo: 16 shots per power clip | Ammo Remaining: " . mt_rand(0,16) . " | Desc: This rifle fires an intense beam of red energy.</i>]"; break;
				case 9:	$artifact = "Rifle, Laser [ <i>Value: 45 " . $cash . " | Type: Light | Dmg: 2d8 | Ammo: 12 shots per power clip | Ammo Remaining: " . mt_rand(0,12) . " | Desc: This rifle fires a beam of yellow energy.</i>]"; break;
				case 10:$artifact = "Rifle, Plasma [ <i>Value: 67 " . $cash . " | Type: Medium | Dmg: 2d10 | Ammo: 10 shots per power clip | Ammo Remaining: " . mt_rand(0,10) . " | Desc: This rifle fires a beam of green energy.</i>]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if ($the_item == "weapon")
		{
			if ($size == 1){$c = 3;} else if ($size == 2){$c = 6;} else {$c = 11;}
			switch (mt_rand(0,$c))
			{
				case 0:	$artifact = "Dagger, Plasma [ <i>Value: 12 " . $cash . " | Dmg: 1d6 | Power: 1 day of use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 1:	$artifact = "Whip, Pulse [ <i>Value: 50 " . $cash . " | Dmg: 1d8 | Power: 10 hits per power clip | Power Remaining: " . mt_rand(0,10) . " | Desc: This whip will increase the power of physical hits, but only upon impact.  Any misses do not drain the power clip.</i>]"; break;
				case 2:	$artifact = "Gloves, Pulse [ <i>Value: 115 " . $cash . " | Type: - | Dmg: 1d8 | Power: 10 punches per power clip | Power Remaining: " . mt_rand(0,10) . " | Desc: These gloves will increase the power of physical punches, but only upon impact.  Any missed punches do not drain the power clip.</i>]"; break;
				case 3:	$artifact = "Bladerang [ <i>Value: 380 " . $cash . " | Dmg: 1d12 | Desc: This razor sharp weapon is thrown at a target, where it then returns to the thrower.  If the attack roll is a natural '20', then the target is decapitated if it has a head.  If the attack roll is a '1', then there is a 50% chance the weapon does not return.  Otherwise, an attack roll of '1' will indicate the thrower failed to catch the weapon properly and their hand is severed.</i>]"; break;
				case 4:	$artifact = "Short Sword, Plasma [ <i>Value: 18 " . $cash . " | Type: Light | Dmg: 1d8 | Power: 1 day of use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 5:	$artifact = "Axe, Plasma [ <i>Value: 20 " . $cash . " | Type: Light | Dmg: 1d8 | Power: 1 day of use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 6:	$artifact = "Crossbow, Fusion [ <i>Value: 130 " . $cash . " | Type: Light | Dmg: 2d10+2 | Ammo: 8 shots per power clip | Ammo Remaining: " . mt_rand(0,8) . " | Desc: This weapon fires bolts of red energy.</i>]"; break;
				case 7:	$artifact = "Staff, Pulse [ <i>Value: 165 " . $cash . " | Dmg: 1d10 | Power: 8 hits per power clip | Power Remaining: " . mt_rand(0,8) . " | Desc: This staff will increase the power of physical hits, but only upon impact.  Any misses do not drain the power clip.</i>]"; break;
				case 8:	$artifact = "Axe, Battle, Plasma [ <i>Value: 25 " . $cash . " | Type: Medium | Dmg: 1d10 | Power: 1 day of use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 9:	$artifact = "Flamethrower [ <i>Value: 240 " . $cash . " | Type: Medium | Dmg: 1d20+5 | Ammo: 5 shots per tank of petroleum | Ammo Remaining: " . mt_rand(0,5) . " | Desc: This gun can fire a cone of flame 45' long and 15' wide.  Anyone hit with the flames may defend for breath attacks to suffer only half damage.  A tank holds 2 gallons of petroleum.</i>]"; break;
				case 10:$artifact = "Long Sword, Plasma [ <i>Value: 25 " . $cash . " | Type: Light | Dmg: 1d10 | Power: 1 day of use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 11:$artifact = "Missile Launcher [ <i>Value: 480 " . $cash . " | Type: Heavy | Dmg: 1d20+10 | Ammo: 1 shot per missile loaded | Ammo Remaining: " . mt_rand(0,1) . " | Desc: This large cylindrical weapon can fire a missile up to 1,000 feet away, with the use of a computerized guidance system.</i>]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if ($the_item == "grenade")
		{
			switch (mt_rand(0,6))
			{
				case 0:	$artifact = "Grenade [ <i>Value: 80 " . $cash . " | Dmg: 3d6 | Desc: This thrown device will explode upon impact, damaging all of those within the 30' blast radius.</i>]"; break;
				case 1:	$artifact = "Grenade, EMP [ <i>Value: 78 " . $cash . " | Dmg: - | Desc: This thrown device will explode upon impact, disabling any electrical device within the 30' blast radius.</i>]"; break;
				case 2:	$artifact = "Grenade, Flash [ <i>Value: 64 " . $cash . " | Dmg: - | Desc: This thrown device will explode upon impact, creating a bright light that causes everyone in the 30' radius to be blinded for 1d4 rounds.  If one can defend for magic wands, then they can avoid the effects.</i>]"; break;
				case 3:	$artifact = "Grenade, Plasma [ <i>Value: 100 " . $cash . " | Dmg: 3d8 | Desc: This thrown device will explode upon impact, damaging all of those within the 30' blast radius.</i>]"; break;
				case 4:	$artifact = "Grenade, Smoke [ <i>Value: 58 " . $cash . " | Dmg: - | Desc: This thrown device will explode upon impact, causing a cloud of smoke to consume a 60' radius.</i>]"; break;
				case 5:	$artifact = "Grenade, Stun [ <i>Value: 62 " . $cash . " | Dmg: - | Desc: This thrown device will explode upon impact, stunning all of those within the 30' radius unless they can defend for paralyzation.</i>]"; break;
				case 6:	$artifact = "Mine [ <i>Value: 150 " . $cash . " | Dmg: 3d10 | Desc: This disc-shaped device will explode as soon as pressure is put upon it.</i>]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if ($the_item == "armor")
		{
			if ($size < 3){$c = 2;} else {$c = 8;}
			switch (mt_rand(0,$c))
			{
				case 0:	$artifact = "Helmet, Polycarbonate [ <i>Value: 30 " . $cash . " | Type: Heavy | Armor Bonus: 1 | Desc: This helmet is made of a very hard plastic.  It is often used by police forces and military personnel.</i>]"; break;
				case 1:	$artifact = "Trench Coat, Leather [ <i>Value: 15 " . $cash . " | Type: Light | Armor Bonus: 1 | Desc: This long leather coat provides limited protection.</i>]"; break;
				case 2:	$artifact = "Trench Coat, Leather, Heavy [ <i>Value: 15 " . $cash . " | Type: Light | Armor Bonus: 2 | Desc: This long leather coat is made from a heavier, studded leather and provides limited protection.</i>]"; break;
				case 3:	$artifact = "Armor, Battle [ <i>Value: 600 " . $cash . " | Type: Heavy | Armor Bonus: 5 | Desc: This metal armor comes equipped with a full helmet that has a sun visor and breathing apparatus to provide fresh air to the wearer.  The suit also grants a 1 bonus for breath attack.</i>]"; break;
				case 4:	$artifact = "Armor, Battle, Heavy [ <i>Value: 900 " . $cash . " | Type: Heavy | Armor Bonus: 6 | Desc: This metal armor comes equipped with a full helmet that has a sun visor and breathing apparatus to provide fresh air to the wearer.  The suit also grants a 2 bonus for breath attack.</i>]"; break;
				case 5:	$artifact = "Armor, Chameleon Suit [ <i>Value: 560 " . $cash . " | Type: Light | Armor Bonus: 2 | Power: 4 uses per power clip | Power Remaining: " . mt_rand(0,4) . " | Desc: This armor can be activated to bend light around the wearer, making them virtually invisible.  If used without the power clip, it still provides the armor bonus.</i>]"; break;
				case 6:	$artifact = "Armor, Fiber-Steel [ <i>Value: 450 " . $cash . " | Type: Heavy | Armor Bonus: 4 | Desc: This armor is made from a finely woven para-aramid fiber, with metal plates sewn within.</i>]"; break;
				case 7:	$artifact = "Armor, Polycarbonate [ <i>Value: 100 " . $cash . " | Type: Heavy | Armor Bonus: 3 | Desc: This armor is made of a very hard plastic.</i>]"; break;
				case 8:	$artifact = "Shield, Polycarbonate [ <i>Value: 40 " . $cash . " | Type: Light | Armor Bonus: 1 | Desc: This shield is made of a very hard plastic.  It is often used by police forces and military personnel.</i>]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else
		{
			if ($size == 1){$c = 20;} else if ($size == 2){$c = 31;} else {$c = 38;}
			if ($tech == 1){$ct = 1;} else {$ct=0;} // NO SILENCERS IN LL
			switch (mt_rand($ct,$c))
			{
				case 0:$artifact = "Silencer [ <i>Value: 50 " . $cash . " | Desc: This can be attached to a combustible gun to reduce the sound it creates when fired.</i>]"; break;
				case 1:$artifact = "Alteration Mask [ <i>Value: 430 " . $cash . " | Power: 1 hour of use per battery | Power Remaining: " . mt_rand(0,1) . " | Desc: This mask will change the facial appearance of the wearer to look like someone else.  It requires a camera picture of the individual, whose appearance is being copied.</i>]"; break;
				case 2:$artifact = "Antitox Syringe [ <i>Value: 15 " . $cash . " | Desc: This auto-injecting syringe will give the patient a bonus of 10 for poison resistance.  It can only be used after the moment of poisoning.</i>]"; break;
				case 3:$artifact = "Binoculars [ <i>Value: 125 " . $cash . " | Power: 1 day of use per battery | Power Remaining: " . mt_rand(0,1) . " | Desc: These allow one to see up to 5x the distance of normal vision.</i>]"; break;
				case 4:$artifact = "Bracelet, Chronometer [ <i>Value: 60 " . $cash . " | Desc: This item is worn on the wrist and will give an accurate time of day.</i>]"; break;
				case 5:$artifact = "Camera [ <i>Value: 300 " . $cash . " | Power: 1 day of use per battery | Power Remaining: " . mt_rand(0,1) . " | Desc: This small device can capture video or simply take pictures.</i>]"; break;
				case 6:$artifact = "Communicator [ <i>Value: 30 " . $cash . " | Power: 1 day of use per battery | Power Remaining: " . mt_rand(0,1) . " | Desc: This handheld device can allow communication to another communicator up to 1 mile away.</i>]"; break;
				case 7:$artifact = "Compass [ <i>Value: 20 " . $cash . " | Power: 1 day of use per battery | Power Remaining: " . mt_rand(0,1) . " | Desc: This device can point toward the world's magnetic north pole.</i>]"; break;
				case 8:$artifact = "Computer [ <i>Value: 800 " . $cash . " | Power: 1 day of use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This handheld device can do many things from downloading files, watching videos, keep notes, map the area, or hack into another computer system.  Some also use these to bypass security systems and computerized locks.</i>]"; break;
				case 9:$artifact = "Flashlight [ <i>Value: 5 " . $cash . " | Power: 2 days of use per battery | Power Remaining: " . mt_rand(0,2) . " | Desc: This item can light up a 40’ forward area.</i>]"; break;
				case 10:$artifact = "Gloves, Magnetized [ <i>Value: 60 " . $cash . " | Power: 1 hour of use per battery | Power Remaining: " . mt_rand(0,1) . " | Desc: These gloves allow one to climb metal surfaces.</i>]"; break;
				case 11:$artifact = "Goggles, Darkness [ <i>Value: 360 " . $cash . " | Power: 1 day of use per battery | Power Remaining: " . mt_rand(0,1) . " | Desc: These goggles allow one to see in complete darkness up to 60' away.</i>]"; break;
				case 12:$artifact = "Goggles, Flash [ <i>Value: 90 " . $cash . " | Desc: These goggles protect the eyes from bright lights or sudden flashes of intense light.</i>]"; break;
				case 13:$artifact = "Holster, Ankle [ <i>Value: 8 " . $cash . " | Desc: This can be strapped to an individual to hold a pistol weapon.</i>]"; break;
				case 14:$artifact = "Holster, Concealed [ <i>Value: 10 " . $cash . " | Desc: This can be strapped to an individual to hold a pistol weapon.</i>]"; break;
				case 15:$artifact = "Holster, Hip [ <i>Value: 6 " . $cash . " | Desc: This can be strapped to an individual to hold a pistol weapon.</i>]"; break;
				case 16:$artifact = "Scope, Computerized [ <i>Value: 340 " . $cash . " | Power: 1 day of use per battery | Power Remaining: " . mt_rand(0,1) . " | Desc: When attached to a gun, it grants a bonus of +2 to hit.</i>]"; break;
				case 17:$artifact = "Scope, Laser [ <i>Value: 285 " . $cash . " | Power: 1 day of use per battery | Power Remaining: " . mt_rand(0,1) . " | Desc: When attached to a gun, it grants a bonus of +1 to hit.</i>]"; break;
				case 18:$artifact = "Skin Wrap [ <i>Value: 12 " . $cash . " | Desc: This sheet of synthetic skin can be wrapped around wounds, healing 1d6 damage.</i>]"; break;
				case 19:$artifact = "Translator [ <i>Value: 290 " . $cash . " | Power: 1 day of use per battery | Power Remaining: " . mt_rand(0,1) . " | Desc: This ear piece can translate almost any nearby spoken language with a 90% success rate.</i>]"; break;
				case 20:$artifact = "Air Mask [ <i>Value: 45 " . $cash . " | Power: 1 day of use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This mask fits around the mouth and produces breathable air for the wearer.</i>]"; break;
				case 21:$artifact = "Belt, Anti-Gravity [ <i>Value: 300 " . $cash . " | Power: 5 uses per power clip | Power Remaining: " . mt_rand(0,5) . " | Desc: This belt will detect if the wearer is falling.  Just before impact, it will release a charge of energy that will soften the landing.</i>]"; break;
				case 22:$artifact = "Belt, Shield [ <i>Value: 385 " . $cash . " | Power: 1 hour of use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This belt will create a force field around the wearer, giving a 1 bonus to armor for an hour.</i>]"; break;
				case 23:$artifact = "Belt, Stasis [ <i>Value: 3,200 " . $cash . " | Power: 1 day of use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This belt can be attached to one very close to death.  It will preserve the victim, stopping their condition from getting worse.</i>]"; break;
				case 24:$artifact = "Boots, Jump [ <i>Value: 560 " . $cash . " | Power: 6 uses per power clip | Power Remaining: " . mt_rand(0,6) . " | Desc: These boots allow the wearer to jump 50' across or 20' high.</i>]"; break;
				case 25:$artifact = "Fire Extinguisher [ <i>Value: 25 " . $cash . " | Desc: This small canister can spray a cloud of white mist that would extinguish a fire in a 10' area.</i>]"; break;
				case 26:$artifact = "Helm, Sonic [ <i>Value: 350 " . $cash . " | Power: 8 uses per power clip | Power Remaining: " . mt_rand(0,8) . " | Desc: This metal helm has audio devices built within.  If the wearer focuses on a direction, they can hear almost anything up to 500' away.  Each obstacle reduces the effectiveness by 20'.</i>]"; break;
				case 27:$artifact = "Holographic Lamp [ <i>Value: 125 " . $cash . " | Power: 1 hour of use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This small lamp fits in the palm of a hand.  It can produce a realistic 3D image of anything captured from a camera.</i>]"; break;
				case 28:$artifact = "Lantern, Energy [ <i>Value: 25 " . $cash . " | Power: 1 day of use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This lantern produces a plasma-green glow in a 60' radius.</i>]"; break;
				case 29:$artifact = "Light Stick [ <i>Value: 10 " . $cash . " | Power: 1 day of use per battery | Power Remaining: " . mt_rand(0,1) . " | Desc: This 1' long rod can light up a 30' area.</i>]"; break;
				case 30:$artifact = "Motion Sensor [ <i>Value: 90 " . $cash . " | Power: 1 day of use per battery | Power Remaining: " . mt_rand(0,1) . " | Desc: These small devices must be pointed in a direction, and will produce an alarm if movement is detected within a 180 degree area.</i>]"; break;
				case 31:$artifact = "Multi-Tool [ <i>Value: 12 " . $cash . " | Desc: This small pocket tool has many functions.  They have items like a knife, wire cutters, scissors, wire strippers, and bottle opener.  They are often used to fix electrical devices or physically bypassing security systems and locks.</i>]"; break;
				case 32:$artifact = "Can, Petroleum [ <i>Value: 6 " . $cash . " | Desc: This metal canister comes empty, but it can hold up to 5 gallons of petroleum.</i>]"; break;
				case 33:$artifact = "Raft, Inflatable [ <i>Value: 200 " . $cash . " | Desc: This raft can carry up to 4 people and deflates for easy storage.</i>]"; break;
				case 34:$artifact = "Jet Pack [ <i>Value: 650 " . $cash . " | Power: 3 uses per power clip | Power Remaining: " . mt_rand(0,3) . " | Desc: This device is worn on the back and can allow one to fly 400' above the ground.</i>]"; break;
				case 35:$artifact = "Cart, Anti-Gravity [ <i>Value: 400 " . $cash . " | Power: 1 day of use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This cart hovers above the ground and can carry about 500 pounds.</i>]"; break;
				case 36:$artifact = "Missile [ <i>Value: 100 " . $cash . " | Desc: This item is launched with the use of a missile launcher.</i>]"; break;
				case 37:$artifact = "Petroleum (1 Gallon) [ <i>Value: 10 " . $cash . " | Desc: This combustible liquid is used to power many types of vehicles and flamethrowers.</i>]"; break;
				case 38:$artifact = "Plasma Torch [ <i>Value: 80 " . $cash . " | Power: 1 use per power clip | Power Remaining: " . mt_rand(0,1) . " | Desc: This torch can cut through, or seal, almost any metal with its extremely hot flame.</i>]"; break;
			}
		}

	$item = ucfirst($artifact);

	return $item;
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function makeMAItem($level,$size)
{
		if ($size == 1){$i = 50;} else if ($size == 2){$i = 60;} else {$i = 70;}

		$which_item = mt_rand(1,$i);

		if ($which_item < 11){$the_item = "pistol";}
		else if ($which_item < 21){$the_item = "grenade";}
		else if ($which_item < 41){$the_item = "device";}
		else if ($which_item < 51){$the_item = "weapon";}
		else if ($which_item < 61){$the_item = "armor";}
		else {$the_item = "rifle";}

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ($the_item == "pistol")
		{
			$shoots = mt_rand(7,10);
			$ranges = mt_rand(10,16)*5;
			$rangem = $ranges + 125;
			$rangel = $rangem + 100;
			$shoots = $shoots . "/" . ($shoots+3) . "/" . ($shoots+8);
			$ranges = $ranges . "`/" . $rangem . "`/" . $rangel . "`";

			switch (mt_rand(0,9))
			{
				case 0:	$artifact = "Pistol, Electrical [ <i>Dmg: " . mt_rand(3,12) . "d6 | Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 12 shots per cell | Ammo Remaining: " . mt_rand(0,12) . " | Desc: This pistol fires a wave of electrical energy that can potentially hit 2 targets at once.</i>]"; break;
				case 1:	$artifact = "Pistol, Freeze [ <i>Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 6 shots per cell | Ammo Remaining: " . mt_rand(0,6) . " | Desc: This pistol fires a beam of icy energy that will freeze an opponent for 1d6x10 minutes.</i>]"; break;
				case 2:	$artifact = "Pistol, Fusion [ <i>Dmg: " . mt_rand(12,18) . "d6 | Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 18 shots per cell | Ammo Remaining: " . mt_rand(0,18) . " | Desc: This pistol fires an intense beam of red energy.</i>]"; break;
				case 3:	$artifact = "Pistol, Laser [ <i>Dmg: " . mt_rand(6,12) . "d6 | Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 24 shots per cell | Ammo Remaining: " . mt_rand(0,24) . " | Desc: This pistol fires a beam of yellow energy.</i>]"; break;
				case 4:	$artifact = "Pistol, Plasma [ <i>Dmg: " . mt_rand(9,15) . "d6 | Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 20 shots per cell | Ammo Remaining: " . mt_rand(0,20) . " | Desc: This pistol fires a beam of green energy.</i>]"; break;
				case 5: $artifact = "Pistol, Stun [ <i>Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 8 shots per cell | Ammo Remaining: " . mt_rand(0,8) . " | Desc: This pistol fires a beam of energy that will cause an opponent to fall unconscious for 1d6x5 minutes.</i>]"; break;
				case 6:	$artifact = "Protein Disruption Pistol [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 7:	$artifact = "Sonic Metal Disruption Pistol [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 8:	$artifact = "Slug Launching Pistol [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 9: $artifact = "tranquilizer Pistol [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if ($the_item == "rifle")
		{
			$shoots = mt_rand(6,8);
			$ranges = mt_rand(15,20)*5;
			$rangem = $ranges + 125;
			$rangel = $rangem + 100;
			$shoots = $shoots . "/" . ($shoots+3) . "/" . ($shoots+8);
			$ranges = $ranges . "`/" . $rangem . "`/" . $rangel . "`";

			switch (mt_rand(0,8))
			{
				case 0:	$artifact = "Rifle, Electrical [ <i>Dmg: " . mt_rand(4,13) . "d6 | Weapon Class: " . mt_rand(7,9) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 10 shots per cell | Ammo Remaining: " . mt_rand(0,10) . " | Desc: This rifle fires a wave of electrical energy that can potentially hit 2 targets at once.</i>]"; break;
				case 1:	$artifact = "Rifle, Freeze [ <i>Weapon Class: " . mt_rand(7,9) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | 4 shots per cell | Ammo Remaining: " . mt_rand(0,4) . " | Desc: This rifle fires a beam of icy energy that will freeze an opponent for 1d6x10 minutes.</i>]"; break;
				case 2:	$artifact = "Rifle, Fusion [ <i>Dmg: " . mt_rand(13,19) . "d6 | Weapon Class: " . mt_rand(7,9) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 16 shots per cell | Ammo Remaining: " . mt_rand(0,16) . " | Desc: This rifle fires an intense beam of red energy.</i>]"; break;
				case 3:	$artifact = "Rifle, Laser [ <i>Dmg: " . mt_rand(7,13) . "d6 | Weapon Class: " . mt_rand(7,9) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 12 shots per cell | Ammo Remaining: " . mt_rand(0,12) . " | Desc: This rifle fires a beam of yellow energy.</i>]"; break;
				case 4: $artifact = "Rifle, Plasma [ <i>Dmg: " . mt_rand(10,16) . "d6 | Weapon Class: " . mt_rand(7,9) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 10 shots per cell | Ammo Remaining: " . mt_rand(0,10) . " | Desc: This rifle fires a beam of green energy.</i>]"; break;
				case 5: $artifact = "Protein Disruption Rifle [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 6: $artifact = "Sonic Metal Disruption Rifle [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 7: $artifact = "Slug Launching Rifle [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 8: $artifact = "Tranguilizer Rifle [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if ($the_item == "weapon")
		{
			$shoots = mt_rand(7,10);
			$ranges = mt_rand(10,16)*5;
			$rangem = $ranges + 125;
			$rangel = $rangem + 100;
			$shoots = $shoots . "/" . ($shoots+3) . "/" . ($shoots+8);
			$ranges = $ranges . "`/" . $rangem . "`/" . $rangel . "`";

			if ($size == 1){$c = 3;} else if ($size == 2){$c = 8;} else {$c = 15;}
			switch (mt_rand(0,$c))
			{
				case 0:	$artifact = "Dagger, Plasma [ <i>Dmg: 2d4 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 1:	$artifact = "Whip, Pulse [ <i>Dmg: 1d12 | Weapon Class: " . mt_rand(5,7) . " | Power: 10 hits per cell | Power Remaining: " . mt_rand(0,10) . " | Desc: This whip will increase the power of physical hits, but only upon impact.  Any misses do not drain the cell.</i>]"; break;
				case 2:	$artifact = "Gloves, Pulse [ <i>Dmg: 1d10 | Weapon Class: " . mt_rand(5,7) . " | Power: 10 punches per cell | Power Remaining: " . mt_rand(0,10) . " | Desc: These gloves will increase the power of physical punches, but only upon impact.  Any missed punches do not drain the cell.</i>]"; break;
				case 3:	$artifact = "Bladerang [ <i>Dmg: 1d12 | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This razor sharp weapon is thrown at a target, where it then returns to the thrower.  If the attack roll is the highest it can be, then the target is decapitated if it has a head.  If the attack roll is the lowest it can be, then there is a 50% chance the weapon does not return...otherwise the thrower failed to catch the weapon properly and their hand is severed.</i>]"; break;
				case 4:	$artifact = "Short Sword, Plasma [ <i>Dmg: 2d6 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 5:	$artifact = "Axe, Plasma [ <i>Dmg: 2d6 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 6:	$artifact = "Crossbow, Fusion [ <i>Dmg: " . mt_rand(12,18) . "d6 | Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 8 shots per cell | Ammo Remaining: " . mt_rand(0,8) . " | Desc: This weapon fires bolts of red energy.</i>]"; break;
				case 7: $artifact = "Shock Rod [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 8: $artifact = "Shock Dart Launcher Tube [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 9:	$artifact = "Staff, Pulse [ <i>Dmg: 2d8 | Weapon Class: " . mt_rand(5,7) . " | Power: 8 hits per cell | Power Remaining: " . mt_rand(0,8) . " | Desc: This staff will increase the power of physical hits, but only upon impact.  Any misses do not drain the cell.</i>]"; break;
				case 10:$artifact = "Axe, Battle, Plasma [ <i>Dmg: 2d10 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 11:$artifact = "Flamethrower [ <i>Dmg: 7d6 | Weapon Class: " . mt_rand(4,6) . " | Range: 10`/20`/40` | To Hit: 10/14/18 | Ammo: 5 shots per bottle of flammable chemicals | Ammo Remaining: " . mt_rand(0,5) . " | Desc: This gun can fire a cone of flame 40' long and 15' wide.</i>]"; break;
				case 12:$artifact = "Long Sword, Plasma [ <i>Dmg: 2d8 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 13:$artifact = "Missile Launcher [ <i>Dmg: 20d6 | Weapon Class: " . mt_rand(4,6) . " | Range: 300`/600`/1,000` | To Hit: 8/12/16 | Ammo: 1 shot per missile loaded | Ammo Remaining: " . mt_rand(0,1) . " | Desc: This large cylindrical weapon can fire a missile up to 1,000 feet away, with the use of a computerized guidance system.</i>]"; break;
				case 14:$artifact = "Vibrating Sword [ <i>Dmg: 2d6 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except the blade vibrates when activated, making it a more effective weapon.</i>]"; break;
				case 15:$artifact = "Vibrating Saw [ <i>Dmg: 2d8 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except the saw vibrates when activated, making it a more effective weapon.</i>]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if ($the_item == "grenade")
		{
			switch (mt_rand(0,6))
			{
				case 0:	$artifact = "Grenade [ <i>Dmg: 8d6 | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This thrown device will explode upon impact, damaging all of those within the 30' blast radius.</i>]"; break;
				case 1:	$artifact = "Grenade, EMP [ <i>Dmg: - | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This thrown device will explode upon impact, disabling any electrical device within the 30' blast radius.</i>]"; break;
				case 2:	$artifact = "Grenade, Flash [ <i>Dmg: - | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This thrown device will explode upon impact, creating a bright light that causes everyone in the 30' radius to be blinded for 1d4 minutes.</i>]"; break;
				case 3:	$artifact = "Grenade, Plasma [ <i>Dmg: 12d6 | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This thrown device will explode upon impact, damaging all of those within the 30' blast radius.</i>]"; break;
				case 4:	$artifact = "Grenade, Smoke [ <i>Dmg: - | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This thrown device will explode upon impact, causing a cloud of smoke to consume a 60' radius.</i>]"; break;
				case 5:	$artifact = "Grenade, Stun [ <i>Dmg: - | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This thrown device will explode upon impact, stunning all of those within the 30' for a duration of 1d10 minutes.</i>]"; break;
				case 6:	$artifact = "Mine [ <i>Dmg: 10d6 | Desc: This disc-shaped device will explode as soon as pressure is put upon it.</i>]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if ($the_item == "armor")
		{
			switch (mt_rand(0,15))
			{
				case 0:	$artifact = "Helmet, Polycarbonate [ <i>AC Bonus: -1 | Desc: This helmet is made of a very hard plastic. It was often used by security personnel.</i>]"; break;
				case 1:	$artifact = "Trench Coat, Leather [ <i>AC Bonus: -1 | Desc: This long leather coat provides limited protection.</i>]"; break;
				case 2:	$artifact = "Trench Coat, Leather, Heavy [ <i>AC Bonus: -2 | Desc: This long leather coat is made from a heavier, studded leather and provides limited protection.</i>]"; break;
				case 3:	$artifact = "Armor, Battle [ <i>AC Bonus: -5 | Desc: This metal armor comes equipped with a full helmet that has a sun visor and breathing apparatus to provide fresh air to the wearer.</i>]"; break;
				case 4:	$artifact = "Armor, Battle, Heavy [ <i>AC Bonus: -6 | Desc: This metal armor comes equipped with a full helmet that has a sun visor and breathing apparatus to provide fresh air to the wearer.</i>]"; break;
				case 5:	$artifact = "Armor, Chameleon Suit [ <i>AC Bonus: -2 | Power: 4 uses per power clip | Power Remaining: " . mt_rand(0,4) . " | Desc: This armor can be activated to bend light around the wearer, making them virtually invisible. If used without the power clip, it still provides the armor bonus.</i>]"; break;
				case 6:	$artifact = "Armor, Fiber-Steel [ <i>AC Bonus: -4 | Desc: This armor is made from a finely woven para-aramid fiber, with metal plates sewn within.</i>]"; break;
				case 7:	$artifact = "Armor, Polycarbonate [ <i>AC Bonus: -3 | Desc: This armor is made of a very hard plastic.</i>]"; break;
				case 8:	$artifact = "Shield, Polycarbonate [ <i>AC Bonus: -1 | Desc: This shield is made of a very hard plastic.  It was often used by security personnel.</i>]"; break;
				case 9:	$artifact = "Armor, Heavy Fur [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-1&nbsp;</i>]"; break;
				case 10:$artifact = "Armor, Thick Hide [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-1&nbsp;</i>]"; break;
				case 11:$artifact = "Shield, Wooden [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-1&nbsp;</i>]"; break;
				case 12:$artifact = "Shield, Metal [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-1&nbsp;</i>]"; break;
				case 13:$artifact = "Armor, Cured Hide [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-3&nbsp;</i>]"; break;
				case 14:$artifact = "Armor, Plant Fiber [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-3&nbsp;</i>]"; break;
				case 15:$artifact = "Armor, Thin Metal [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-5&nbsp;</i>]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else
		{
			switch (mt_rand(0,5))
			{
				case 0:	$color = "blue"; break;
				case 1:	$color = "red"; break;
				case 2:	$color = "green"; break;
				case 3:	$color = "gray"; break;
				case 4:	$color = "white"; break;
				case 5:	$color = "brown"; break;
			}
			switch (mt_rand(0,65))
			{
				case 0:$artifact = "Control Bracelet [ <i>Desc: This " . $color . " can control certain systems and open certain doors.</i>]"; break;
				case 1:$artifact = "Alteration Mask [ <i>Power: 1 hour of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This mask will change the facial appearance of the wearer to look like someone else.  It requires a camera picture of the individual, whose appearance is being copied.</i>]"; break;
				case 2:$artifact = "Antitox Syringe [ <i>Desc: This auto-injecting syringe will give the patient a bonus of 10 for poison resistance.  It can only be used after the moment of poisoning.</i>]"; break;
				case 3:$artifact = "Binoculars [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: These allow one to see up to 5x the distance of normal vision.</i>]"; break;
				case 4:$artifact = "Bracelet, Chronometer [ <i>Desc: This item is worn on the wrist and will give an accurate time of day.</i>]"; break;
				case 5:$artifact = "Camera [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This small device can capture video or simply take pictures.</i>]"; break;
				case 6:$artifact = "Communicator [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This handheld device can allow communication to another communicator up to 1 mile away.</i>]"; break;
				case 7:$artifact = "Compass [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This device can point toward the world's magnetic north pole.</i>]"; break;
				case 8:$artifact = "Computer [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This handheld device can do many things from downloading files, watching videos, keep notes, map the area, or hack into another computer system.  Some also use these to bypass security systems and computerized locks.</i>]"; break;
				case 9:$artifact = "Flashlight [ <i>Power: 2 days of use per cell | Power Remaining: " . mt_rand(0,2) . " | Desc: This item can light up a 40' forward area.</i>]"; break;
				case 10:$artifact = "Gloves, Magnetized [ <i>Power: 1 hour of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: These gloves allow one to climb metal surfaces.</i>]"; break;
				case 11:$artifact = "Goggles, Darkness [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: These goggles allow one to see in complete darkness up to 60' away.</i>]"; break;
				case 12:$artifact = "Goggles, Flash [ <i>Desc: These goggles protect the eyes from bright lights or sudden flashes of intense light.</i>]"; break;
				case 13:$artifact = "Holster, Ankle [ <i>Desc: This can be strapped to an individual to hold a pistol weapon.</i>]"; break;
				case 14:$artifact = "Holster, Concealed [ <i>Desc: This can be strapped to an individual to hold a pistol weapon.</i>]"; break;
				case 15:$artifact = "Holster, Hip [ <i>Desc: This can be strapped to an individual to hold a pistol weapon.</i>]"; break;
				case 16:$artifact = "Scope, Computerized [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: When attached to a gun, it grants a bonus of +2 to hit.</i>]"; break;
				case 17:$artifact = "Scope, Laser [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: When attached to a gun, it grants a bonus of +1 to hit.</i>]"; break;
				case 18:$artifact = "Skin Wrap [ <i>Desc: This sheet of synthetic skin can be wrapped around wounds, healing 1d6 damage.</i>]"; break;
				case 19:$artifact = "Translator [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This ear piece can translate almost any nearby spoken language with a 90% success rate.</i>]"; break;
				case 20:$artifact = "Air Mask [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This mask fits around the mouth and produces breathable air for the wearer.</i>]"; break;
				case 21:$artifact = "Belt, Anti-Gravity [ <i>Power: 5 uses per cell | Power Remaining: " . mt_rand(0,5) . " | Desc: This belt will detect if the wearer is falling.  Just before impact, it will release a charge of energy that will soften the landing.</i>]"; break;
				case 22:$artifact = "Belt, Shield [ <i>Power: 1 hour of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This belt will create a force field around the wearer, giving a 1 bonus to armor for an hour.</i>]"; break;
				case 23:$artifact = "Belt, Stasis [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This belt can be attached to one very close to death.  It will preserve the victim, stopping their condition from getting worse.</i>]"; break;
				case 24:$artifact = "Boots, Jump [ <i>Power: 6 uses per cell | Power Remaining: " . mt_rand(0,6) . " | Desc: These boots allow the wearer to jump 50' across or 20' high.</i>]"; break;
				case 25:$artifact = "Fire Extinguisher [ <i>Desc: This small canister can spray a cloud of white mist that would extinguish a fire in a 10' area.</i>]"; break;
				case 26:$artifact = "Helm, Sonic [ <i>Power: 8 uses per cell | Power Remaining: " . mt_rand(0,8) . " | Desc: This metal helm has audio devices built within.  If the wearer focuses on a direction, they can hear almost anything up to 500' away.  Each obstacle reduces the effectiveness by 20'.</i>]"; break;
				case 27:$artifact = "Holographic Lamp [ <i>Power: 1 hour of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This small lamp fits in the palm of a hand.  It can produce a realistic 3D image of anything captured from a camera.</i>]"; break;
				case 28:$artifact = "Lantern, Energy [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This lantern produces a plasma-green glow in a 60' radius.</i>]"; break;
				case 29:$artifact = "Light Stick [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This 1' long rod can light up a 30' area.</i>]"; break;
				case 30:$artifact = "Motion Sensor [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: These small devices must be pointed in a direction, and will produce an alarm if movement is detected within a 180 degree area.</i>]"; break;
				case 31:$artifact = "Multi-Tool [ <i>Desc: This small pocket tool has many functions.  They have items like a knife, wire cutters, scissors, wire strippers, and bottle opener.  They are often used to fix electrical devices or physically bypassing security systems and locks.</i>]"; break;
				case 32:$artifact = "Raft, Inflatable [ <i>Desc: This raft can carry up to 4 people and deflates for easy storage.</i>]"; break;
				case 33:$artifact = "Jet Pack [ <i>Power: 3 uses per cell | Power Remaining: " . mt_rand(0,3) . " | Desc: This device is worn on the back and can allow one to fly 400' above the ground.</i>]"; break;
				case 34:$artifact = "Cart, Anti-Gravity [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This cart hovers above the ground and can carry about 500 pounds.</i>]"; break;
				case 35:$artifact = "Missile [ <i>Desc: This item is launched with the use of a missile launcher.</i>]"; break;
				case 36:$artifact = "Plasma Torch [ <i>Power: 1 use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This torch can cut through, or seal, almost any metal with its extremely hot flame.</i>]"; break;
				case 37:$artifact = "Handheld Life Ecology Analyzer [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 38:$artifact = "Handheld System Engineering Unit [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 39:$artifact = "Handheld Security Unit [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 40:$artifact = "Energy Ecology Tracker Unit [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 41:$artifact = "Security Tracker Unit [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 42:$artifact = "Handheld Medical Analyzer [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 43:$artifact = "Sonic Hand Torch [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 44:$artifact = "Atomic Hand Torch [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 45:$artifact = "Laser Hand Torch [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 46:$artifact = "Water to Hydrogren Energy Conversion Unit [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 47:$artifact = "Space Suit [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 48:$artifact = "Radiation Suit [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 49:$artifact = "Geiger Counter [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 50:$artifact = "Water Breathing Mask [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 51:$artifact = "Infrared Goggles [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 52:$artifact = "Bottle of Chemical Defoliant [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 53:$artifact = "Bottle of Chemical Acid [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 54:$artifact = "Bottle of Flammable Chemicals [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 55:$artifact = "Handheld Energy Lamp [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 56:$artifact = "Handheld Energy Flood Light [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 57:$artifact = "Noise Protection Headphones [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 58:$artifact = "Piece of Durable Alloy [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 59:$artifact = "Chemical Flame Retardant [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 60:$artifact = "Medicine [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 61:$artifact = "Radiation Medicine [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 62:$artifact = "Sensory Enhancing Helm [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 63:$artifact = "Personal Anti-Gravity Unit [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 64:$artifact = "Handheld Shock Dart Charger [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 65:$artifact = "Personal Energy Field Generator [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
			}
		}
		return $artifact;
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function makeGWItem($level,$size)
{
		if ($size == 1){$i = 50;} else if ($size == 2){$i = 60;} else {$i = 70;}

		$which_item = mt_rand(1,$i);

		if ($which_item < 11){$the_item = "pistol";}
		else if ($which_item < 21){$the_item = "grenade";}
		else if ($which_item < 41){$the_item = "device";}
		else if ($which_item < 51){$the_item = "weapon";}
		else if ($which_item < 61){$the_item = "armor";}
		else {$the_item = "rifle";}

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ($the_item == "pistol")
		{
			$shoots = mt_rand(7,10);
			$ranges = mt_rand(10,16)*5;
			$rangem = $ranges + 125;
			$rangel = $rangem + 100;
			$shoots = $shoots . "/" . ($shoots+3) . "/" . ($shoots+8);
			$ranges = $ranges . "`/" . $rangem . "`/" . $rangel . "`";

			switch (mt_rand(0,9))
			{
				case 0:	$artifact = "Pistol, Electrical [ <i>Dmg: " . mt_rand(3,12) . "d6 | Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 12 shots per cell | Ammo Remaining: " . mt_rand(0,12) . " | Desc: This pistol fires a wave of electrical energy that can potentially hit 2 targets at once.</i>]"; break;
				case 1:	$artifact = "Pistol, Freeze [ <i>Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 6 shots per cell | Ammo Remaining: " . mt_rand(0,6) . " | Desc: This pistol fires a beam of icy energy that will freeze an opponent for 1d6x10 minutes.</i>]"; break;
				case 2:	$artifact = "Pistol, Fusion [ <i>Dmg: " . mt_rand(12,18) . "d6 | Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 18 shots per cell | Ammo Remaining: " . mt_rand(0,18) . " | Desc: This pistol fires an intense beam of red energy.</i>]"; break;
				case 3:	$artifact = "Pistol, Laser [ <i>Dmg: " . mt_rand(6,12) . "d6 | Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 24 shots per cell | Ammo Remaining: " . mt_rand(0,24) . " | Desc: This pistol fires a beam of yellow energy.</i>]"; break;
				case 4:	$artifact = "Pistol, Plasma [ <i>Dmg: " . mt_rand(9,15) . "d6 | Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 20 shots per cell | Ammo Remaining: " . mt_rand(0,20) . " | Desc: This pistol fires a beam of green energy.</i>]"; break;
				case 5: $artifact = "Pistol, Stun [ <i>Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 8 shots per cell | Ammo Remaining: " . mt_rand(0,8) . " | Desc: This pistol fires a beam of energy that will cause an opponent to fall unconscious for 1d6x5 minutes.</i>]"; break;
				case 6:	$artifact = "Slug Thrower [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 7:	$artifact = "Needler Pistol [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 8:	$artifact = "Mark V Blaster [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 9:	$artifact = "Black Ray Gun [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if ($the_item == "rifle")
		{
			$shoots = mt_rand(6,8);
			$ranges = mt_rand(15,20)*5;
			$rangem = $ranges + 125;
			$rangel = $rangem + 100;
			$shoots = $shoots . "/" . ($shoots+3) . "/" . ($shoots+8);
			$ranges = $ranges . "`/" . $rangem . "`/" . $rangel . "`";

			switch (mt_rand(0,5))
			{
				case 0:	$artifact = "Rifle, Electrical [ <i>Dmg: " . mt_rand(4,13) . "d6 | Weapon Class: " . mt_rand(7,9) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 10 shots per cell | Ammo Remaining: " . mt_rand(0,10) . " | Desc: This rifle fires a wave of electrical energy that can potentially hit 2 targets at once.</i>]"; break;
				case 1:	$artifact = "Rifle, Freeze [ <i>Weapon Class: " . mt_rand(7,9) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | 4 shots per cell | Ammo Remaining: " . mt_rand(0,4) . " | Desc: This rifle fires a beam of icy energy that will freeze an opponent for 1d6x10 minutes.</i>]"; break;
				case 2:	$artifact = "Rifle, Fusion [ <i>Dmg: " . mt_rand(13,19) . "d6 | Weapon Class: " . mt_rand(7,9) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 16 shots per cell | Ammo Remaining: " . mt_rand(0,16) . " | Desc: This rifle fires an intense beam of red energy.</i>]"; break;
				case 3:	$artifact = "Rifle, Laser [ <i>Dmg: " . mt_rand(7,13) . "d6 | Weapon Class: " . mt_rand(7,9) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 12 shots per cell | Ammo Remaining: " . mt_rand(0,12) . " | Desc: This rifle fires a beam of yellow energy.</i>]"; break;
				case 4: $artifact = "Rifle, Plasma [ <i>Dmg: " . mt_rand(10,16) . "d6 | Weapon Class: " . mt_rand(7,9) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 10 shots per cell | Ammo Remaining: " . mt_rand(0,10) . " | Desc: This rifle fires a beam of green energy.</i>]"; break;
				case 5: $artifact = "Mark VII Rifle [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if ($the_item == "weapon")
		{
			$shoots = mt_rand(7,10);
			$ranges = mt_rand(10,16)*5;
			$rangem = $ranges + 125;
			$rangel = $rangem + 100;
			$shoots = $shoots . "/" . ($shoots+3) . "/" . ($shoots+8);
			$ranges = $ranges . "`/" . $rangem . "`/" . $rangel . "`";

			if ($size == 1){$c = 3;} else if ($size == 2){$c = 8;} else {$c = 15;}
			switch (mt_rand(0,$c))
			{
				case 0:	$artifact = "Dagger, Plasma [ <i>Dmg: 2d4 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 1:	$artifact = "Whip, Pulse [ <i>Dmg: 1d12 | Weapon Class: " . mt_rand(5,7) . " | Power: 10 hits per cell | Power Remaining: " . mt_rand(0,10) . " | Desc: This whip will increase the power of physical hits, but only upon impact.  Any misses do not drain the cell.</i>]"; break;
				case 2:	$artifact = "Gloves, Pulse [ <i>Dmg: 1d10 | Weapon Class: " . mt_rand(5,7) . " | Power: 10 punches per cell | Power Remaining: " . mt_rand(0,10) . " | Desc: These gloves will increase the power of physical punches, but only upon impact.  Any missed punches do not drain the cell.</i>]"; break;
				case 3:	$artifact = "Bladerang [ <i>Dmg: 1d12 | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This razor sharp weapon is thrown at a target, where it then returns to the thrower.  If the attack roll is the highest it can be, then the target is decapitated if it has a head.  If the attack roll is the lowest it can be, then there is a 50% chance the weapon does not return...otherwise the thrower failed to catch the weapon properly and their hand is severed.</i>]"; break;
				case 4:	$artifact = "Short Sword, Plasma [ <i>Dmg: 2d6 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 5:	$artifact = "Axe, Plasma [ <i>Dmg: 2d6 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 6:	$artifact = "Crossbow, Fusion [ <i>Dmg: " . mt_rand(12,18) . "d6 | Weapon Class: " . mt_rand(5,7) . " | Range: " . $ranges . " | To Hit: " . $shoots . " | Ammo: 8 shots per cell | Ammo Remaining: " . mt_rand(0,8) . " | Desc: This weapon fires bolts of red energy.</i>]"; break;
				case 7: $artifact = "Shock Rod [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 8: $artifact = "Shock Dart Launcher Tube [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 9:	$artifact = "Staff, Pulse [ <i>Dmg: 2d8 | Weapon Class: " . mt_rand(5,7) . " | Power: 8 hits per cell | Power Remaining: " . mt_rand(0,8) . " | Desc: This staff will increase the power of physical hits, but only upon impact.  Any misses do not drain the cell.</i>]"; break;
				case 10:$artifact = "Axe, Battle, Plasma [ <i>Dmg: 2d10 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 11:$artifact = "Flamethrower [ <i>Dmg: 7d6 | Weapon Class: " . mt_rand(4,6) . " | Range: 10`/20`/40` | To Hit: 10/14/18 | Ammo: 5 shots per bottle of flammable chemicals | Ammo Remaining: " . mt_rand(0,5) . " | Desc: This gun can fire a cone of flame 40' long and 15' wide.</i>]"; break;
				case 12:$artifact = "Long Sword, Plasma [ <i>Dmg: 2d8 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except for the glowing green energy around the blade when activated.</i>]"; break;
				case 13:$artifact = "Missile Launcher [ <i>Dmg: 20d6 | Weapon Class: " . mt_rand(4,6) . " | Range: 300`/600`/1,000` | To Hit: 8/12/16 | Ammo: 1 shot per missile loaded | Ammo Remaining: " . mt_rand(0,1) . " | Desc: This large cylindrical weapon can fire a missile up to 1,000 feet away, with the use of a computerized guidance system.</i>]"; break;
				case 14:$artifact = "Vibrating Sword [ <i>Dmg: 2d6 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except the blade vibrates when activated, making it a more effective weapon.</i>]"; break;
				case 15:$artifact = "Vibrating Saw [ <i>Dmg: 2d8 | Weapon Class: " . mt_rand(7,9) . " | Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This weapon looks normal except the saw vibrates when activated, making it a more effective weapon.</i>]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if ($the_item == "grenade")
		{
			if ( mt_rand(1,10) == 1 )
			{
				switch (mt_rand(0,15))
				{
					case 0: $artifact = "Small Damage Pack [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 1: $artifact = "Concentrated Damage Pack [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 2: $artifact = "Fission Bomb [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 3: $artifact = "Fusion Bomb [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 4: $artifact = "Concussion Bomb [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 5: $artifact = "Matter Bomb [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 6: $artifact = "Negation Bomb [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 7: $artifact = "Neutron Bomb [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 8: $artifact = "Trek Bomb [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 9: $artifact = "Mutation Bomb [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 10: $artifact = "Micro-Missile [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 11: $artifact = "Mini-Missile [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 12: $artifact = "Surface Missile [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 13: $artifact = "Neutron Missile [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 14: $artifact = "Negation Missile [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 15: $artifact = "Fission Missile [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				}
			}
			else
			{
				switch (mt_rand(0,12))
				{
					case 0:	$artifact = "Grenade [ <i>Dmg: 8d6 | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This thrown device will explode upon impact, damaging all of those within the 30' blast radius.</i>]"; break;
					case 1:	$artifact = "Grenade, EMP [ <i>Dmg: - | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This thrown device will explode upon impact, disabling any electrical device within the 30' blast radius.</i>]"; break;
					case 2:	$artifact = "Grenade, Flash [ <i>Dmg: - | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This thrown device will explode upon impact, creating a bright light that causes everyone in the 30' radius to be blinded for 1d4 minutes.</i>]"; break;
					case 3:	$artifact = "Grenade, Plasma [ <i>Dmg: 12d6 | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This thrown device will explode upon impact, damaging all of those within the 30' blast radius.</i>]"; break;
					case 4:	$artifact = "Grenade, Smoke [ <i>Dmg: - | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This thrown device will explode upon impact, causing a cloud of smoke to consume a 60' radius.</i>]"; break;
					case 5:	$artifact = "Grenade, Stun [ <i>Dmg: - | Weapon Class: 3 | Range: 20`/40`/60` | To Hit: 8/12/16 | Desc: This thrown device will explode upon impact, stunning all of those within the 30' for a duration of 1d10 minutes.</i>]"; break;
					case 6:	$artifact = "Mine [ <i>Dmg: 10d6 | Desc: This disc-shaped device will explode as soon as pressure is put upon it.</i>]"; break;
					case 7: $artifact = "Grenade, Gas [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 8: $artifact = "Grenade, Chemical Explosion [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 9: $artifact = "Grenade, Fragmentation [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 10: $artifact = "Grenade, Energy [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 11: $artifact = "Grenade, Photon [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
					case 12: $artifact = "Grenade, Torc [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				}
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if ($the_item == "armor")
		{
			switch (mt_rand(0,25))
			{
				case 0:	$artifact = "Helmet, Polycarbonate [ <i>AC Bonus: -1 | Desc: This helmet is made of a very hard plastic. It was often used by security personnel.</i>]"; break;
				case 1:	$artifact = "Trench Coat, Leather [ <i>AC Bonus: -1 | Desc: This long leather coat provides limited protection.</i>]"; break;
				case 2:	$artifact = "Trench Coat, Leather, Heavy [ <i>AC Bonus: -2 | Desc: This long leather coat is made from a heavier, studded leather and provides limited protection.</i>]"; break;
				case 3:	$artifact = "Armor, Battle [ <i>AC Bonus: -5 | Desc: This metal armor comes equipped with a full helmet that has a sun visor and breathing apparatus to provide fresh air to the wearer.</i>]"; break;
				case 4:	$artifact = "Armor, Battle, Heavy [ <i>AC Bonus: -6 | Desc: This metal armor comes equipped with a full helmet that has a sun visor and breathing apparatus to provide fresh air to the wearer.</i>]"; break;
				case 5:	$artifact = "Armor, Chameleon Suit [ <i>AC Bonus: -2 | Power: 4 uses per power clip | Power Remaining: " . mt_rand(0,4) . " | Desc: This armor can be activated to bend light around the wearer, making them virtually invisible. If used without the power clip, it still provides the armor bonus.</i>]"; break;
				case 6:	$artifact = "Armor, Fiber-Steel [ <i>AC Bonus: -4 | Desc: This armor is made from a finely woven para-aramid fiber, with metal plates sewn within.</i>]"; break;
				case 7:	$artifact = "Armor, Polycarbonate [ <i>AC Bonus: -3 | Desc: This armor is made of a very hard plastic.</i>]"; break;
				case 8:	$artifact = "Shield, Polycarbonate [ <i>AC Bonus: -1 | Desc: This shield is made of a very hard plastic.  It was often used by security personnel.</i>]"; break;
				case 9:	$artifact = "Armor, Heavy Fur [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-1&nbsp;</i>]"; break;
				case 10:$artifact = "Armor, Thick Hide [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-1&nbsp;</i>]"; break;
				case 11:$artifact = "Shield, Wooden [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-1&nbsp;</i>]"; break;
				case 12:$artifact = "Shield, Metal [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-1&nbsp;</i>]"; break;
				case 13:$artifact = "Armor, Cured Hide [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-3&nbsp;</i>]"; break;
				case 14:$artifact = "Armor, Plant Fiber [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-3&nbsp;</i>]"; break;
				case 15:$artifact = "Armor, Thin Metal [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-5&nbsp;</i>]"; break;
				case 16:$artifact = "Armor, Sheath [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-6&nbsp;</i>]"; break;
				case 17:$artifact = "Armor, Powered Plate [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-7&nbsp;</i>]"; break;
				case 18:$artifact = "Armor, Powered Alloyed Plate [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-8&nbsp;</i>]"; break;
				case 19:$artifact = "Armor, Plastic [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-7&nbsp;</i>]"; break;
				case 20:$artifact = "Armor, Energized [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-8&nbsp;</i>]"; break;
				case 21:$artifact = "Armor, Inertia [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-8&nbsp;</i>]"; break;
				case 22:$artifact = "Armor, Powered Scout [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-8&nbsp;</i>]"; break;
				case 23:$artifact = "Armor, Powered Battle [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-8&nbsp;</i>]"; break;
				case 24:$artifact = "Armor, Powered Attack [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-9&nbsp;</i>]"; break;
				case 25:$artifact = "Armor, Powered Assault [&nbsp;<i>AC&nbsp;Bonus:&nbsp;-9&nbsp;</i>]"; break;
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else
		{
			switch (mt_rand(1,61))
			{
				case 1:$artifact = "Alteration Mask [ <i>Power: 1 hour of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This mask will change the facial appearance of the wearer to look like someone else.  It requires a camera picture of the individual, whose appearance is being copied.</i>]"; break;
				case 2:$artifact = "Antitox Syringe [ <i>Desc: This auto-injecting syringe will give the patient a bonus of 10 for poison resistance.  It can only be used after the moment of poisoning.</i>]"; break;
				case 3:$artifact = "Binoculars [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: These allow one to see up to 5x the distance of normal vision.</i>]"; break;
				case 4:$artifact = "Bracelet, Chronometer [ <i>Desc: This item is worn on the wrist and will give an accurate time of day.</i>]"; break;
				case 5:$artifact = "Camera [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This small device can capture video or simply take pictures.</i>]"; break;
				case 6:$artifact = "Communicator [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This handheld device can allow communication to another communicator up to 1 mile away.</i>]"; break;
				case 7:$artifact = "Compass [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This device can point toward the world's magnetic north pole.</i>]"; break;
				case 8:$artifact = "Computer [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This handheld device can do many things from downloading files, watching videos, keep notes, map the area, or hack into another computer system.  Some also use these to bypass security systems and computerized locks.</i>]"; break;
				case 9:$artifact = "Flashlight [ <i>Power: 2 days of use per cell | Power Remaining: " . mt_rand(0,2) . " | Desc: This item can light up a 40' forward area.</i>]"; break;
				case 10:$artifact = "Gloves, Magnetized [ <i>Power: 1 hour of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: These gloves allow one to climb metal surfaces.</i>]"; break;
				case 11:$artifact = "Goggles, Darkness [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: These goggles allow one to see in complete darkness up to 60' away.</i>]"; break;
				case 12:$artifact = "Goggles, Flash [ <i>Desc: These goggles protect the eyes from bright lights or sudden flashes of intense light.</i>]"; break;
				case 13:$artifact = "Holster, Ankle [ <i>Desc: This can be strapped to an individual to hold a pistol weapon.</i>]"; break;
				case 14:$artifact = "Holster, Concealed [ <i>Desc: This can be strapped to an individual to hold a pistol weapon.</i>]"; break;
				case 15:$artifact = "Holster, Hip [ <i>Desc: This can be strapped to an individual to hold a pistol weapon.</i>]"; break;
				case 16:$artifact = "Scope, Computerized [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: When attached to a gun, it grants a bonus of +2 to hit.</i>]"; break;
				case 17:$artifact = "Scope, Laser [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: When attached to a gun, it grants a bonus of +1 to hit.</i>]"; break;
				case 18:$artifact = "Skin Wrap [ <i>Desc: This sheet of synthetic skin can be wrapped around wounds, healing 1d6 damage.</i>]"; break;
				case 19:$artifact = "Translator [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This ear piece can translate almost any nearby spoken language with a 90% success rate.</i>]"; break;
				case 20:$artifact = "Air Mask [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This mask fits around the mouth and produces breathable air for the wearer.</i>]"; break;
				case 21:$artifact = "Belt, Anti-Gravity [ <i>Power: 5 uses per cell | Power Remaining: " . mt_rand(0,5) . " | Desc: This belt will detect if the wearer is falling.  Just before impact, it will release a charge of energy that will soften the landing.</i>]"; break;
				case 22:$artifact = "Belt, Shield [ <i>Power: 1 hour of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This belt will create a force field around the wearer, giving a 1 bonus to armor for an hour.</i>]"; break;
				case 23:$artifact = "Belt, Stasis [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This belt can be attached to one very close to death.  It will preserve the victim, stopping their condition from getting worse.</i>]"; break;
				case 24:$artifact = "Boots, Jump [ <i>Power: 6 uses per cell | Power Remaining: " . mt_rand(0,6) . " | Desc: These boots allow the wearer to jump 50' across or 20' high.</i>]"; break;
				case 25:$artifact = "Fire Extinguisher [ <i>Desc: This small canister can spray a cloud of white mist that would extinguish a fire in a 10' area.</i>]"; break;
				case 26:$artifact = "Helm, Sonic [ <i>Power: 8 uses per cell | Power Remaining: " . mt_rand(0,8) . " | Desc: This metal helm has audio devices built within.  If the wearer focuses on a direction, they can hear almost anything up to 500' away.  Each obstacle reduces the effectiveness by 20'.</i>]"; break;
				case 27:$artifact = "Holographic Lamp [ <i>Power: 1 hour of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This small lamp fits in the palm of a hand.  It can produce a realistic 3D image of anything captured from a camera.</i>]"; break;
				case 28:$artifact = "Lantern, Energy [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This lantern produces a plasma-green glow in a 60' radius.</i>]"; break;
				case 29:$artifact = "Light Stick [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This 1' long rod can light up a 30' area.</i>]"; break;
				case 30:$artifact = "Motion Sensor [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: These small devices must be pointed in a direction, and will produce an alarm if movement is detected within a 180 degree area.</i>]"; break;
				case 31:$artifact = "Multi-Tool [ <i>Desc: This small pocket tool has many functions.  They have items like a knife, wire cutters, scissors, wire strippers, and bottle opener.  They are often used to fix electrical devices or physically bypassing security systems and locks.</i>]"; break;
				case 32:$artifact = "Raft, Inflatable [ <i>Desc: This raft can carry up to 4 people and deflates for easy storage.</i>]"; break;
				case 33:$artifact = "Jet Pack [ <i>Power: 3 uses per cell | Power Remaining: " . mt_rand(0,3) . " | Desc: This device is worn on the back and can allow one to fly 400' above the ground.</i>]"; break;
				case 34:$artifact = "Cart, Anti-Gravity [ <i>Power: 1 day of use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This cart hovers above the ground and can carry about 500 pounds.</i>]"; break;
				case 35:$artifact = "Missile [ <i>Desc: This item is launched with the use of a missile launcher.</i>]"; break;
				case 36:$artifact = "Plasma Torch [ <i>Power: 1 use per cell | Power Remaining: " . mt_rand(0,1) . " | Desc: This torch can cut through, or seal, almost any metal with its extremely hot flame.</i>]"; break;
				case 37:$artifact = "Portent [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 38:$artifact = "Energy Cloak [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 39:$artifact = "Control Baton [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 40:$artifact = "Communication Sender [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 41:$artifact = "Medi-Kit [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 42:$artifact = "Anti-Grav Sled [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 43:$artifact = "Ultra-Violet Goggles [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 44:$artifact = "Infra-Red Goggles [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 45:$artifact = "Chemical Energy Cells [&nbsp;" . mt_rand(1,5) . " each&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 46:$artifact = "Solar Energy Cells [&nbsp;" . mt_rand(1,5) . " each&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 47:$artifact = "Hydrogen Energy Cells [&nbsp;" . mt_rand(1,5) . " each&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 48:$artifact = "Atomic Energy Cells [&nbsp;" . mt_rand(1,5) . " each&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 49:$artifact = "Energy Cell Charger [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 50:$artifact = "Pain Reducer [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 51:$artifact = "Mind Boosters [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 52:$artifact = "Sustenance Dose [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 53:$artifact = "Interra Shot [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 54:$artifact = "Stim Dose [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 55:$artifact = "Cur-In Dose [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 56:$artifact = "Suggestion Change [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 57:$artifact = "Accelera Dose [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 58:$artifact = "Anti-Radiation Serum [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 59:$artifact = "Rejuv-Chamber [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 60:$artifact = "Stasis Chamber [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
				case 61:$artifact = "Life Ray [&nbsp;<i>See&nbsp;Rules</i>&nbsp;]"; break;
			}
		}
		return $artifact;
}
?>