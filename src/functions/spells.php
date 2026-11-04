<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////
function researchSpell()
{
	$Name1 = array('Clyz', 'Achug', 'Theram', 'Quale', 'Lutin', 'Gad', 'Croeq', 'Achund', 'Therrisi', 'Qualorm', 'Lyeit', 'Garaso', 'Crul', 'Ackhine', 'Thritai', 'Quaso', 'Lyetonu', 'Garck', 'Cuina', 'Ackult', 'Tig', 'Quealt', 'Moin', 'Garund', 'Daror', 'Aeny', 'Tinalt', 'Rador', 'Moragh', 'Ghagha', 'Deet', 'Aeru', 'Tinkima', 'Rakeld', 'Morir', 'Ghatas', 'Deldrad', 'Ageick', 'Tinut', 'Rancwor', 'Morosy', 'Gosul', 'Deldrae', 'Agemor', 'Tonk', 'Ranildu', 'Mosat', 'Hatalt', 'Delz', 'Aghai', 'Tonolde', 'Ranot', 'Mosd', 'Hatash', 'Denad', 'Ahiny', 'Tonper', 'Ranper', 'Mosrt', 'Hatque', 'Denold', 'Aldkely', 'Torint', 'Ransayi', 'Mosyl', 'Hatskel', 'Denyl', 'Aleler', 'Trooph', 'Ranzmor', 'Moszight', 'Hattia', 'Drahono', 'Anagh', 'Turbelm', 'Raydan', 'Naldely', 'Hiert', 'Draold', 'Anclor', 'Uighta', 'Rayxwor', 'Nalusk', 'Hinalde', 'Dynal', 'Anl', 'Uinga', 'Rhit', 'Nalwar', 'Hinall', 'Dyndray', 'Antack', 'Umnt', 'Risormy', 'Nas', 'Hindend', 'Eacki', 'Ardburo', 'Undaughe', 'Risshy', 'Nat', 'Iade', 'Earda', 'Ardmose', 'Untdran', 'Rodiz', 'Nator', 'Iaper', 'Echal', 'Ardurne', 'Untld', 'Rodkali', 'Nayth', 'Iass', 'Echind', 'Ardyn', 'Uoso', 'Rodrado', 'Neil', 'Iawy', 'Echwaro', 'Ashaugha', 'Urnroth', 'Roort', 'Nenal', 'Iechi', 'Eeni', 'Ashdend', 'Urode', 'Ruina', 'New', 'Ightult', 'Einea', 'Ashye', 'Uskdar', 'Rynm', 'Nia', 'Ildaw', 'Eldsera', 'Asim', 'Uskmdan', 'Rynryna', 'Nikim', 'Ildoq', 'Eldwen', 'Athdra', 'Usksough', 'Ryns', 'Nof', 'Inabel', 'Eldyril', 'Athskel', 'Usktoro', 'Rynut', 'Nook', 'Inaony', 'Elmkach', 'Atkin', 'Ustagee', 'Samgha', 'Nybage', 'Inease', 'Elmll', 'Aughint', 'Ustld', 'Samnche', 'Nyiy', 'Ineegh', 'Emath', 'Aughthere', 'Ustton', 'Samssam', 'Nyseld', 'Ineiti', 'Emengi', 'Avery', 'Verporm', 'Sawor', 'Nysklye', 'Ineun', 'Emild', 'Awch', 'Vesrade', 'Sayimo', 'Nyw', 'Ingr', 'Emmend', 'Banend', 'Voraughe', 'Sayn', 'Oasho', 'Isbaugh', 'Emnden', 'Beac', 'Vorril', 'Sayskelu', 'Oendy', 'Islyei', 'Endvelm', 'Belan', 'Vorunt', 'Scheach', 'Oenthi', 'Issy', 'Endych', 'Beloz', 'Whedan', 'Scheyer', 'Ohato', 'Istin', 'Engeh', 'Beltiai', 'Whisam', 'Serat', 'Oldack', 'Iumo', 'Engen', 'Bliorm', 'Whok', 'Sernd', 'Oldar', 'Jyhin', 'Engh', 'Burold', 'Worath', 'Skell', 'Oldr', 'Jyon', 'Engraki', 'Buror', 'Worav', 'Skelser', 'Oldtar', 'Kalov', 'Engroth', 'Byt', 'Worina', 'Slim', 'Omdser', 'Kelol', 'Engum', 'Cakal', 'Worryno', 'Snaest', 'Ond', 'Kinser', 'Enhech', 'Carr', 'Worunty', 'Sniund', 'Oron', 'Koor', 'Enina', 'Cayld', 'Worwaw', 'Sosam', 'Orrbel', 'Lear', 'Enk', 'Cerar', 'Yary', 'Stayl', 'Osnt', 'Leert', 'Enlald', 'Cerl', 'Yawi', 'Stol', 'Peright', 'Legar', 'Enskele', 'Cerv', 'Yena', 'Strever', 'Perpban', 'Lerev', 'Eoru', 'Chaur', 'Yero', 'Swaih', 'Phiunt', 'Lerzshy', 'Ernysi', 'Chayn', 'Yerrves', 'Tagar', 'Poll', 'Llash', 'Erque', 'Cheimo', 'Yhone', 'Taienn', 'Polrad', 'Llotor', 'Errusk', 'Chekim', 'Yradi', 'Taiyild', 'Polsera', 'Loem', 'Ervory', 'Chreusk', 'Zhugar', 'Tanen', 'Puon', 'Loing', 'Essisi', 'Chrir', 'Zirt', 'Tasaf', 'Quaev', 'Lorelmo', 'Essnd', 'Chroelt', 'Zoine', 'Tasrr', 'Quahang', 'Lorud', 'Estech', 'Cloran', 'Zotin', 'Thaeng', 'Qual', 'Lour', 'Estkunt', 'Etoth', 'Esule', 'Estnight');
	$Came1 = count($Name1)-1;
	$Name1 = $Name1[mt_rand(0,$Came1)];

	$Name2 = array('Acidic', 'Summoning', 'Scrying', 'Obscure', 'Iron', 'Ghoulish', 'Enfeebling', 'Altered', 'Secret', 'Obscuring', 'Irresistible', 'Gibbering', 'Enlarged', 'Confusing', 'Analyzing', 'Sympathetic', 'Secure', 'Permanent', 'Keen', 'Glittering', 'Ethereal', 'Contacting', 'Animal', 'Telekinetic', 'Seeming', 'Persistent', 'Lawful', 'Evil', 'Continual', 'Animated', 'Telepathic', 'Shadow', 'Phantasmal', 'Legendary', 'Good', 'Expeditious', 'Control', 'Antimagic', 'Teleporting', 'Shattering', 'Phantom', 'Lesser', 'Grasping', 'Explosive', 'Crushing', 'Arcane', 'Temporal', 'Shocking', 'Phasing', 'Levitating', 'Greater', 'Fabricated', 'Cursed', 'Articulated', 'Tiny', 'Shouting', 'Planar', 'Limited', 'Guarding', 'Faithful', 'Dancing', 'Binding', 'Transmuting', 'Shrinking', 'Poisonous', 'Lucubrating', 'Fearful', 'Dazzling', 'Black', 'Undead', 'Silent', 'Polymorphing', 'Magical', 'Hallucinatory', 'Delayed', 'Blinding', 'Undetectable', 'Slow', 'Prismatic', 'Magnificent', 'Hideous', 'Fire', 'Demanding', 'Blinking', 'Unseen', 'Solid', 'Programmed', 'Major', 'Holding', 'Flaming', 'Dimensional', 'Vampiric', 'Soul', 'Projected', 'Mass', 'Horrid', 'Discern', 'Burning', 'Vanishing', 'Spectral', 'Mending', 'Hypnotic', 'Floating', 'Disintegrating', 'Cat', 'Protective', 'Mind', 'Ice', 'Flying', 'Disruptive', 'Chain', 'Spidery', 'Prying', 'Minor', 'Illusionary', 'Force', 'Dominating', 'Changing', 'Warding', 'Stinking', 'Pyrotechnic', 'Mirrored', 'Improved', 'Forceful', 'Dreaming', 'Chaotic', 'Water', 'Stone', 'Rainbow', 'Misdirected', 'Incendiary', 'Freezing', 'Elemental', 'Charming', 'Watery', 'Misleading', 'Instant', 'Gaseous', 'Emotional', 'Chilling', 'Weird', 'Storming', 'Resilient', 'Mnemonic', 'Interposing', 'Gentle', 'Enduring', 'Whispering', 'Suggestive', 'Reverse', 'Moving', 'Invisible', 'Ghostly', 'Energy', 'Clenched', 'Climbing', 'Comprehending', 'Colorful', 'True', 'False');
	$Came2 = count($Name2)-1;
	$Name2 = $Name2[mt_rand(0,$Came2)];

	$Name3 = array('Acid', 'Tentacles', 'Sigil', 'Plane', 'Legend', 'Gravity', 'Emotion', 'Chest', 'Alarm', 'Terrain', 'Simulacrum', 'Poison', 'Lightning', 'Grease', 'Endurance', 'Circle', 'Anchor', 'Thoughts', 'Skin', 'Polymorph', 'Lights', 'Growth', 'Enervation', 'Clairvoyance', 'Animal', 'Time', 'Sleep', 'Prestidigitation', 'Location', 'Guards', 'Enfeeblement', 'Clone', 'Antipathy', 'Tongues', 'Soul', 'Projection', 'Lock', 'Hand', 'Enhancer', 'Cloud', 'Arcana', 'Touch', 'Sound', 'Pyrotechnics', 'Lore', 'Haste', 'Etherealness', 'Cold', 'Armor', 'Transformation', 'Spells', 'Refuge', 'Lucubration', 'Hat', 'Evil', 'Color', 'Arrows', 'Trap', 'Sphere', 'Repulsion', 'Magic', 'Hound', 'Evocation', 'Confusion', 'Aura', 'Trick', 'Spider', 'Resistance', 'Mansion', 'Hypnotism', 'Eye', 'Conjuration', 'Banishment', 'Turning', 'Spray', 'Retreat', 'Mask', 'Ice', 'Fall', 'Contagion', 'Banshee', 'Undead', 'Stasis', 'Rope', 'Maze', 'Image', 'Fear', 'Creation', 'Bear', 'Vanish', 'Statue', 'Runes', 'Message', 'Imprisonment', 'Feather', 'Curse', 'Binding', 'Veil', 'Steed', 'Scare', 'Meteor', 'Insanity', 'Field', 'Dance', 'Vision', 'Stone', 'Screen', 'Mind', 'Invisibility', 'Fireball', 'Darkness', 'Blindness', 'Vocation', 'Storm', 'Script', 'Mirage', 'Invulnerability', 'Flame', 'Daylight', 'Blink', 'Wail', 'Strength', 'Scrying', 'Misdirection', 'Iron', 'Flesh', 'Dead', 'Blur', 'Walk', 'Strike', 'Seeing', 'Missile', 'Item', 'Fog', 'Deafness', 'Body', 'Wall', 'Stun', 'Self', 'Mist', 'Jar', 'Force', 'Death', 'Bolt', 'Wards', 'Suggestion', 'Sending', 'Monster', 'Jaunt', 'Foresight', 'Demand', 'Bond', 'Water', 'Summons', 'Servant', 'Mouth', 'Jump', 'Form', 'Disjunction', 'Breathing', 'Weapon', 'Sunburst', 'Shadow', 'Mud', 'Kill', 'Freedom', 'Disk', 'Burning', 'Weather', 'Swarm', 'Shape', 'Nightmare', 'Killer', 'Frost', 'Dismissal', 'Cage', 'Web', 'Symbol', 'Shelter', 'Object', 'Knock', 'Gate', 'Displacement', 'Chain', 'Wilting', 'Sympathy', 'Shield', 'Page', 'Languages', 'Good', 'Door', 'Chaos', 'Wind', 'Telekinesis', 'Shift', 'Pattern', 'Laughter', 'Grace', 'Drain', 'Charm', 'Wish', 'Teleport', 'Shout', 'Person', 'Law', 'Grasp', 'Dream', 'Elements', 'Edge', 'Earth', 'Dust');
	$Came3 = count($Name3)-1;
	$Name3 = $Name3[mt_rand(0,$Came3)];

	return $Name1 . "`s Spell of " . $Name2 . " " . $Name3;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function spellSchool($game)
{
	$roll = mt_rand(1,100);

		if (($game == "OSRIC") || ($game == "AD&D") || ($game == "Labyrinth Lord" && $_SESSION["SESSION_ADD_AEC"] > 0))
		{
			if ($roll < 71){$value = "magic-user"; if (mt_rand(1,100) > 89){$value = "illusionist";}}
			else {$value = "cleric"; if (mt_rand(1,100) > 74){$value = "druid";}}
		}
		else if ($game == "Swords & Six-Siders")
		{
			$value = "wizard";
		}
		else // (($game == "BFRPG") || ($game == "Swords & Wizardry") || ($game == "BD&D") || ($game == "Labyrinth Lord"))
		{
			if ($roll < 71){$value = "magic-user";}
			else {$value = "cleric";}
		}

	return $value;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function powerUp($level)
{
	if ($level > 0){} else {$level = mt_rand(1,20);}

	if ($level < 4){$power = "the lowest";}
	else if ($level < 7){$power = "a lower";}
	else if ($level < 10){$power = "a low";}
	else if ($level < 13){$power = "a medium";}
	else if ($level < 16){$power = "a high";}
	else if ($level < 19){$power = "a higher";}
	else {$power = "the highest";}

	return $power;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function gameSpellChooser($game,$level,$class)
{
	if ($level > 0){} else {$level = mt_rand(1,20);}

	$roll = mt_rand(1,100);
	if ($roll < 71)
	{
		$magic = "mage";
		if ((mt_rand(1,100) > 89) && ($game != "BD&D") && ($game != "BFRPG") && ($game != "Swords & Wizardry")){$magic = "illusionist";}
		if ($game == "Labyrinth Lord" && $_SESSION["SESSION_ADD_AEC"] != 1){$magic = "mage";}
	}
	else
	{
		$magic = "cleric";
		if ((mt_rand(1,100) > 74) && ($game != "BD&D") && ($game != "BFRPG") && ($game != "Swords & Wizardry")){$magic = "druid";}
		if ($game == "Labyrinth Lord" && $_SESSION["SESSION_ADD_AEC"] != 1){$magic = "cleric";}
	}

	if ($class == "Illusionist"){$magic = "illusionist";}
	else if ($class == "Magic-User"){$magic = "mage";} 
	else if ($class == "Cleric"){$magic = "cleric";} 
	else if ($class == "Druid"){$magic = "druid";} 
	else if ($class == "Elf"){$magic = "mage";} 

	if ($game == "BD&D") // BECAUSE THERE ARE LESS LEVELS HERE
	{
		if ($level < 4){$level = 1;}
		else if ($level < 7){$level = 2;}
		else if ($level < 10){$level = 3;}
		else if ($level < 13){$level = 4;}
		else if ($level < 16){$level = 5;}
		else {$level = 6; if ($magic != "mage"){$level = 5;}}
	}
	else if ($game == "Swords & Six-Siders") // BECAUSE THERE ARE EVEN LESS LEVELS HERE
	{
		$magic = "wizard";
		if ($level < 4){$level = 1;}
		else if ($level < 6){$level = 2;}
		else {$level = 3;}
	}
	else
	{
		if ($level < 4){$level = 1;}
		else if ($level < 7){$level = 2;}
		else if ($level < 10){$level = 3;}
		else if ($level < 13){$level = 4;}
		else if ($level < 16){$level = 5;}
		else if ($level < 19){$level = 6; if ($magic == "mage"){$level = mt_rand(6,7);}}
		else {$level = 7; if ($magic == "mage"){$level = mt_rand(8,9);}}
	}

if ($game == "Swords & Six-Siders")
{
	if ($level == 1){ $item = mt_rand(1, 13); }
	else if ($level == 2){ $item = mt_rand(1, 26); }
	else { $item = mt_rand(1, 41); }

	switch ($item)
	{
		case 1 : $spell = "Arcane Portal"; break;
		case 2 : $spell = "Light"; break;
		case 3 : $spell = "Darkness"; break;
		case 4 : $spell = "Charm Person"; break;
		case 5 : $spell = "Magic Eyebeam"; break;
		case 6 : $spell = "Darkvision"; break;
		case 7 : $spell = "Mirror Image"; break;
		case 8 : $spell = "Detection"; break;
		case 9 : $spell = "Sleep"; break;
		case 10 : $spell = "Grease"; break;
		case 11 : $spell = "Tongues"; break;
		case 12 : $spell = "Illusion"; break;
		case 13 : $spell = "Turn Undead"; break;

		case 14 : $spell = "Beast Master"; break;
		case 15 : $spell = "Haste"; break;
		case 16 : $spell = "Slow"; break;
		case 17 : $spell = "Dispel Magic"; break;
		case 18 : $spell = "Invisibility"; break;
		case 19 : $spell = "ESP"; break;
		case 20 : $spell = "Levitate"; break;
		case 21 : $spell = "Fireball"; break;
		case 22 : $spell = "Life Drain"; break;
		case 23 : $spell = "Freeze"; break;
		case 24 : $spell = "Lightning Bolt"; break;
		case 25 : $spell = "Gaseous Form"; break;
		case 26 : $spell = "Stinking Cloud"; break;

		case 27 : $spell = "Arcane Eye"; break;
		case 28 : $spell = "Plant Master"; break;
		case 29 : $spell = "Cloudkill"; break;
		case 30 : $spell = "Polymorph"; break;
		case 31 : $spell = "Contact Other Plane"; break;
		case 32 : $spell = "Restoration"; break;
		case 33 : $spell = "Fly"; break;
		case 34 : $spell = "Telekinesis"; break;
		case 35 : $spell = "Insect Plague"; break;
		case 36 : $spell = "Teleport"; break;
		case 37 : $spell = "Invisibility Sphere"; break;
		case 38 : $spell = "Wall of Fire"; break;
		case 38 : $spell = "Wall of Ice"; break;
		case 40 : $spell = "Wall of Stone"; break;
		case 41 : $spell = "Wall of Thorns"; break;
	}
}
else if ($game == "Labyrinth Lord")
{
	$aec = $_SESSION["SESSION_ADD_AEC"];

	if (($magic == "cleric") && ($level == 1)){ if ($aec > 0){ $item = mt_rand(1, 11); } else { $item = mt_rand(1, 8); } }
	else if (($magic == "cleric") && ($level == 2)){ if ($aec > 0){ $item = mt_rand(12, 24); } else { $item = mt_rand(12, 19); } }
	else if (($magic == "cleric") && ($level == 3)){ if ($aec > 0){ $item = mt_rand(25, 37); } else { $item = mt_rand(25, 32); } }
	else if (($magic == "cleric") && ($level == 4)){ if ($aec > 0){ $item = mt_rand(38, 48); } else { $item = mt_rand(38, 45); } }
	else if (($magic == "cleric") && ($level == 5)){ if ($aec > 0){ $item = mt_rand(49, 58); } else { $item = mt_rand(49, 56); } }
	else if (($magic == "cleric") && ($level == 6)){ if ($aec > 0){ $item = mt_rand(59, 68); } else { $item = mt_rand(59, 66); } }
	else if (($magic == "cleric") && ($level == 7)){ if ($aec > 0){ $item = mt_rand(69, 78); } else { $item = mt_rand(69, 76); } }
	else if (($magic == "druid") && ($level == 1)){ $item = mt_rand(79, 90); }
	else if (($magic == "druid") && ($level == 2)){ $item = mt_rand(91, 102); }
	else if (($magic == "druid") && ($level == 3)){ $item = mt_rand(103, 114); }
	else if (($magic == "druid") && ($level == 4)){ $item = mt_rand(115, 126); }
	else if (($magic == "druid") && ($level == 5)){ $item = mt_rand(127, 136); }
	else if (($magic == "druid") && ($level == 6)){ $item = mt_rand(137, 146); }
	else if (($magic == "druid") && ($level == 7)){ $item = mt_rand(147, 156); }
	else if (($magic == "illusionist") && ($level == 1)){ $item = mt_rand(157, 168); }
	else if (($magic == "illusionist") && ($level == 2)){ $item = mt_rand(169, 180); }
	else if (($magic == "illusionist") && ($level == 3)){ $item = mt_rand(181, 191); }
	else if (($magic == "illusionist") && ($level == 4)){ $item = mt_rand(192, 199); }
	else if (($magic == "illusionist") && ($level == 5)){ $item = mt_rand(200, 207); }
	else if (($magic == "illusionist") && ($level == 6)){ $item = mt_rand(208, 215); }
	else if (($magic == "illusionist") && ($level == 7)){ $item = mt_rand(216, 220); }
	else if (($magic == "mage") && ($level == 1)){ if ($aec > 0){ $item = mt_rand(221, 251); } else { $item = mt_rand(221, 232); } }
	else if (($magic == "mage") && ($level == 2)){ if ($aec > 0){ $item = mt_rand(252, 276); } else { $item = mt_rand(252, 263); } }
	else if (($magic == "mage") && ($level == 3)){ if ($aec > 0){ $item = mt_rand(277, 297); } else { $item = mt_rand(277, 288); } }
	else if (($magic == "mage") && ($level == 4)){ if ($aec > 0){ $item = mt_rand(298, 320); } else { $item = mt_rand(298, 309); } }
	else if (($magic == "mage") && ($level == 5)){ if ($aec > 0){ $item = mt_rand(321, 341); } else { $item = mt_rand(321, 332); } }
	else if (($magic == "mage") && ($level == 6)){ if ($aec > 0){ $item = mt_rand(342, 364); } else { $item = mt_rand(342, 353); } }
	else if (($magic == "mage") && ($level == 7)){ if ($aec > 0){ $item = mt_rand(365, 380); } else { $item = mt_rand(365, 376); } }
	else if (($magic == "mage") && ($level == 8)){ if ($aec > 0){ $item = mt_rand(381, 396); } else { $item = mt_rand(381, 392); } }
	else { if ($aec > 0){ $item = mt_rand(397, 408); } else { $item = mt_rand(397, 405); } }

	switch ($item)
	{
		case 1 : $spell = "Create Water"; break; // Cleric 1 B
		case 2 : $spell = "Detect Evil"; break; // Cleric 1 B
		case 3 : $spell = "Detect Magic"; break; // Cleric 1 B
		case 4 : $spell = "Light"; break; // Cleric 1 B
		case 5 : $spell = "Protection from Evil"; break; // Cleric 1 B
		case 6 : $spell = "Purify Food and Drink"; break; // Cleric 1 B
		case 7 : $spell = "Remove Fear"; break; // Cleric 1 B
		case 8 : $spell = "Resist Cold"; break; // Cleric 1 B
		case 9 : $spell = "Command"; break; // Cleric 1 
		case 10 : $spell = "Cure Light Wounds"; break; // Cleric 1 
		case 11 : $spell = "Sanctuary"; break; // Cleric 1 
		case 12 : $spell = "Bless"; break; // Cleric 2 B
		case 13 : $spell = "Find Traps"; break; // Cleric 2 B
		case 14 : $spell = "Hold Person"; break; // Cleric 2 B
		case 15 : $spell = "Know Alignment"; break; // Cleric 2 B
		case 16 : $spell = "Resist Fire"; break; // Cleric 2 B
		case 17 : $spell = "Silence 15` Radius"; break; // Cleric 2 B
		case 18 : $spell = "Snake Charm"; break; // Cleric 2 B
		case 19 : $spell = "Speak with Animal"; break; // Cleric 2 B
		case 20 : $spell = "Augury"; break; // Cleric 2 
		case 21 : $spell = "Delay Poison"; break; // Cleric 2 
		case 22 : $spell = "Holy Chant"; break; // Cleric 2 
		case 23 : $spell = "Reveal Charm"; break; // Cleric 2 
		case 24 : $spell = "Spiritual Weapon"; break; // Cleric 2 
		case 25 : $spell = "Animal Growth"; break; // Cleric 3 B
		case 26 : $spell = "Animate Dead"; break; // Cleric 3 B
		case 27 : $spell = "Continual Light"; break; // Cleric 3 B
		case 28 : $spell = "Cure Disease"; break; // Cleric 3 B
		case 29 : $spell = "Dispel Magic"; break; // Cleric 3 B
		case 30 : $spell = "Locate Object"; break; // Cleric 3 B
		case 31 : $spell = "Remove Curse"; break; // Cleric 3 B
		case 32 : $spell = "Striking"; break; // Cleric 3 B
		case 33 : $spell = "Cure Blindness"; break; // Cleric 3 
		case 34 : $spell = "Feign Death"; break; // Cleric 3 
		case 35 : $spell = "Glyph of Warding"; break; // Cleric 3 
		case 36 : $spell = "Prayer"; break; // Cleric 3 
		case 37 : $spell = "Speak with Dead"; break; // Cleric 3 
		case 38 : $spell = "Create Food and Water"; break; // Cleric 4 B
		case 39 : $spell = "Cure Serious Wounds"; break; // Cleric 4 B
		case 40 : $spell = "Detect Lie"; break; // Cleric 4 B
		case 41 : $spell = "Lower Water"; break; // Cleric 4 B
		case 42 : $spell = "Neutralize Poison"; break; // Cleric 4 B
		case 43 : $spell = "Protection from Evil 10` Radius"; break; // Cleric 4 B
		case 44 : $spell = "Speak with Plants"; break; // Cleric 4 B
		case 45 : $spell = "Sticks to Snakes"; break; // Cleric 4 B
		case 46 : $spell = "Divination"; break; // Cleric 4 
		case 47 : $spell = "Exorcise"; break; // Cleric 4 
		case 48 : $spell = "Tongues"; break; // Cleric 4 
		case 49 : $spell = "Commune"; break; // Cleric 5 B
		case 50 : $spell = "Cure Critical Wounds"; break; // Cleric 5 B
		case 51 : $spell = "Dispel Evil"; break; // Cleric 5 B
		case 52 : $spell = "Flame Strike"; break; // Cleric 5 B
		case 53 : $spell = "Insect Plague"; break; // Cleric 5 B
		case 54 : $spell = "Quest"; break; // Cleric 5 B
		case 55 : $spell = "Raise Dead"; break; // Cleric 5 B
		case 56 : $spell = "True Seeing"; break; // Cleric 5 B
		case 57 : $spell = "Atonement"; break; // Cleric 5 
		case 58 : $spell = "Plane Shift"; break; // Cleric 5 
		case 59 : $spell = "Animate Objects"; break; // Cleric 6 B
		case 60 : $spell = "Blade barrier"; break; // Cleric 6 B
		case 61 : $spell = "Conjure Animals"; break; // Cleric 6 B
		case 62 : $spell = "Find the Path"; break; // Cleric 6 B
		case 63 : $spell = "Heal"; break; // Cleric 6 B
		case 64 : $spell = "Part Water"; break; // Cleric 6 B
		case 65 : $spell = "Stone Tell"; break; // Cleric 6 B
		case 66 : $spell = "Word of Recall"; break; // Cleric 6 B
		case 67 : $spell = "Speak with Creatures"; break; // Cleric 6 
		case 68 : $spell = "Summon Aerial Servant"; break; // Cleric 6 
		case 69 : $spell = "Control Weather"; break; // Cleric 7 B
		case 70 : $spell = "Earthquake"; break; // Cleric 7 B
		case 71 : $spell = "Holy Word"; break; // Cleric 7 B
		case 72 : $spell = "Regenerate"; break; // Cleric 7 B
		case 73 : $spell = "Restoration"; break; // Cleric 7 B
		case 74 : $spell = "Resurrection"; break; // Cleric 7 B
		case 75 : $spell = "Symbol"; break; // Cleric 7 B
		case 76 : $spell = "Wind Walk"; break; // Cleric 7 B
		case 77 : $spell = "Astral Projection"; break; // Cleric 7 
		case 78 : $spell = "Gate"; break; // Cleric 7 
		case 79 : $spell = "Animal Companion"; break; // Druid 1 
		case 80 : $spell = "Detect Magic"; break; // Druid 1 
		case 81 : $spell = "Detect Snares and Pits"; break; // Druid 1 
		case 82 : $spell = "Divine Weather"; break; // Druid 1 
		case 83 : $spell = "Entangle"; break; // Druid 1 
		case 84 : $spell = "Faerie Fire"; break; // Druid 1 
		case 85 : $spell = "Invisibility, Animal"; break; // Druid 1 
		case 86 : $spell = "Locate Creature"; break; // Druid 1 
		case 87 : $spell = "Pass without Trace"; break; // Druid 1 
		case 88 : $spell = "Purify Water"; break; // Druid 1 
		case 89 : $spell = "Shillelagh"; break; // Druid 1 
		case 90 : $spell = "Speak with Animals"; break; // Druid 1 
		case 91 : $spell = "Barkskin"; break; // Druid 2 
		case 92 : $spell = "Charm Person or Mammal"; break; // Druid 2 
		case 93 : $spell = "Create Water"; break; // Druid 2 
		case 94 : $spell = "Cure Light Wounds"; break; // Druid 2 
		case 95 : $spell = "Feign Death"; break; // Druid 2 
		case 96 : $spell = "Find Plant"; break; // Druid 2 
		case 97 : $spell = "Fire Trap"; break; // Druid 2 
		case 98 : $spell = "Heat Metal"; break; // Druid 2 
		case 99 : $spell = "Obscuring Mist"; break; // Druid 2 
		case 100 : $spell = "Produce Flame"; break; // Druid 2 
		case 101 : $spell = "Stumble"; break; // Druid 2 
		case 102 : $spell = "Warp Wood"; break; // Druid 2 
		case 103 : $spell = "Call Lightning"; break; // Druid 3 
		case 104 : $spell = "Cure Disease"; break; // Druid 3 
		case 105 : $spell = "Hold Animal"; break; // Druid 3 
		case 106 : $spell = "Insect Swarm"; break; // Druid 3 
		case 107 : $spell = "Neutralize Poison"; break; // Druid 3 
		case 108 : $spell = "Plant Growth"; break; // Druid 3 
		case 109 : $spell = "Protection from Fire"; break; // Druid 3 
		case 110 : $spell = "Pyrotechnics"; break; // Druid 3 
		case 111 : $spell = "Snare"; break; // Druid 3 
		case 112 : $spell = "Stone Shape"; break; // Druid 3 
		case 113 : $spell = "Tree Shape"; break; // Druid 3 
		case 114 : $spell = "Water Breathing"; break; // Druid 3 
		case 115 : $spell = "Cure Serious Wounds"; break; // Druid 4 
		case 116 : $spell = "Dispel Magic"; break; // Druid 4 
		case 117 : $spell = "Flash Fire"; break; // Druid 4 
		case 118 : $spell = "Hallucinatory Terrain"; break; // Druid 4 
		case 119 : $spell = "Hold Vegetation and Fungus"; break; // Druid 4 
		case 120 : $spell = "Passplant"; break; // Druid 4 
		case 121 : $spell = "Protection from Electricity"; break; // Druid 4 
		case 122 : $spell = "Repel Vermin"; break; // Druid 4 
		case 123 : $spell = "Speak with Plants"; break; // Druid 4 
		case 124 : $spell = "Summon Animal I"; break; // Druid 4 
		case 125 : $spell = "Summon Sylvan Beings"; break; // Druid 4 
		case 126 : $spell = "Temperature Control"; break; // Druid 4 
		case 127 : $spell = "Animal Growth"; break; // Druid 5 
		case 128 : $spell = "Anti-Plant Shell"; break; // Druid 5 
		case 129 : $spell = "Commune with Nature"; break; // Druid 5 
		case 130 : $spell = "Control Winds"; break; // Druid 5 
		case 131 : $spell = "Insect Plague"; break; // Druid 5 
		case 132 : $spell = "Sticks to Snakes"; break; // Druid 5 
		case 133 : $spell = "Summon Animal II"; break; // Druid 5 
		case 134 : $spell = "Transmute Rock to Mud"; break; // Druid 5 
		case 135 : $spell = "Tree Stride"; break; // Druid 5 
		case 136 : $spell = "Wall of Fire"; break; // Druid 5 
		case 137 : $spell = "Anti-Animal Shell"; break; // Druid 6 
		case 138 : $spell = "Conjure Fire Elemental"; break; // Druid 6 
		case 139 : $spell = "Control Weather"; break; // Druid 6 
		case 140 : $spell = "Cure Critical Wounds"; break; // Druid 6 
		case 141 : $spell = "Feeblemind"; break; // Druid 6 
		case 142 : $spell = "Fire Seeds"; break; // Druid 6 
		case 143 : $spell = "Repel Wood"; break; // Druid 6 
		case 144 : $spell = "Summon Animal III"; break; // Druid 6 
		case 145 : $spell = "Transport via Plants"; break; // Druid 6 
		case 146 : $spell = "Wall of Thorns"; break; // Druid 6 
		case 147 : $spell = "Animate Mineral"; break; // Druid 7 
		case 148 : $spell = "Confusion"; break; // Druid 7 
		case 149 : $spell = "Conjure Earth Elemental"; break; // Druid 7 
		case 150 : $spell = "Control Weather (Greater)"; break; // Druid 7 
		case 151 : $spell = "Creeping Doom"; break; // Druid 7 
		case 152 : $spell = "Finger of Death"; break; // Druid 7 
		case 153 : $spell = "Fire Chariot"; break; // Druid 7 
		case 154 : $spell = "Fire Storm"; break; // Druid 7 
		case 155 : $spell = "Reincarnate"; break; // Druid 7 
		case 156 : $spell = "Transmute Metal to Wood"; break; // Druid 7 
		case 157 : $spell = "Auditory Illusion"; break; // Illusionist 1 
		case 158 : $spell = "Color Spray"; break; // Illusionist 1 
		case 159 : $spell = "Dancing Lights"; break; // Illusionist 1 
		case 160 : $spell = "Darkness Globe"; break; // Illusionist 1 
		case 161 : $spell = "Detect Illusion"; break; // Illusionist 1 
		case 162 : $spell = "Detect Invisibility"; break; // Illusionist 1 
		case 163 : $spell = "Doppelganger"; break; // Illusionist 1 
		case 164 : $spell = "Hypnotism"; break; // Illusionist 1 
		case 165 : $spell = "Light"; break; // Illusionist 1 
		case 166 : $spell = "Phantasmal Force"; break; // Illusionist 1 
		case 167 : $spell = "Refraction"; break; // Illusionist 1 
		case 168 : $spell = "Wall of Vapor"; break; // Illusionist 1 
		case 169 : $spell = "Blindness"; break; // Illusionist 2 
		case 170 : $spell = "Blur"; break; // Illusionist 2 
		case 171 : $spell = "Deafness"; break; // Illusionist 2 
		case 172 : $spell = "Detect Magic"; break; // Illusionist 2 
		case 173 : $spell = "Fog Cloud"; break; // Illusionist 2 
		case 174 : $spell = "Hypnotic Pattern"; break; // Illusionist 2 
		case 175 : $spell = "Invisibility"; break; // Illusionist 2 
		case 176 : $spell = "Magic Mouth"; break; // Illusionist 2 
		case 177 : $spell = "Mirror Image"; break; // Illusionist 2 
		case 178 : $spell = "Misdirection"; break; // Illusionist 2 
		case 179 : $spell = "Phantasmal Force, Greater"; break; // Illusionist 2 
		case 180 : $spell = "Ventriloquism"; break; // Illusionist 2 
		case 181 : $spell = "Continual Light (reversible)"; break; // Illusionist 3 
		case 182 : $spell = "Dispel Phantasm"; break; // Illusionist 3 
		case 183 : $spell = "Fear"; break; // Illusionist 3 
		case 184 : $spell = "Hallucinatory Terrain"; break; // Illusionist 3 
		case 185 : $spell = "Illusionary Script"; break; // Illusionist 3 
		case 186 : $spell = "Invisibility 10' Radius"; break; // Illusionist 3 
		case 187 : $spell = "Nondetection"; break; // Illusionist 3 
		case 188 : $spell = "Paralyze"; break; // Illusionist 3 
		case 189 : $spell = "Rope Trick"; break; // Illusionist 3 
		case 190 : $spell = "Spectral Force"; break; // Illusionist 3 
		case 191 : $spell = "Suggestion"; break; // Illusionist 3 
		case 192 : $spell = "Confusion"; break; // Illusionist 4 
		case 193 : $spell = "Illusory Stamina"; break; // Illusionist 4 
		case 194 : $spell = "Implant Emotion"; break; // Illusionist 4 
		case 195 : $spell = "Invisibility, Greater"; break; // Illusionist 4 
		case 196 : $spell = "Massmorph"; break; // Illusionist 4 
		case 197 : $spell = "Minor Creation"; break; // Illusionist 4 
		case 198 : $spell = "Phantasmal Killer"; break; // Illusionist 4 
		case 199 : $spell = "Phantasmal Monsters"; break; // Illusionist 4 
		case 200 : $spell = "Confusion, Greater"; break; // Illusionist 5 
		case 201 : $spell = "Major Creation"; break; // Illusionist 5 
		case 202 : $spell = "Maze"; break; // Illusionist 5 
		case 203 : $spell = "Phantasmal Door"; break; // Illusionist 5 
		case 204 : $spell = "Phantasmal Monsters, Greater"; break; // Illusionist 5 
		case 205 : $spell = "Project Image"; break; // Illusionist 5 
		case 206 : $spell = "Shadow Evocation"; break; // Illusionist 5 
		case 207 : $spell = "Summon Shadow"; break; // Illusionist 5 
		case 208 : $spell = "Conjure Animals"; break; // Illusionist 6 
		case 209 : $spell = "Phantasmal Monsters, Advanced"; break; // Illusionist 6 
		case 210 : $spell = "Shadow Evocation, Greater"; break; // Illusionist 6 
		case 211 : $spell = "Spectral Force, Permanent"; break; // Illusionist 6 
		case 212 : $spell = "Spectral Force, Programmed"; break; // Illusionist 6 
		case 213 : $spell = "Suggestion, Mass"; break; // Illusionist 6 
		case 214 : $spell = "True Seeing"; break; // Illusionist 6 
		case 215 : $spell = "Veil"; break; // Illusionist 6 
		case 216 : $spell = "Astral Spell"; break; // Illusionist 7 
		case 217 : $spell = "Limited Wish"; break; // Illusionist 7 
		case 218 : $spell = "Prismatic Spray"; break; // Illusionist 7 
		case 219 : $spell = "Prismatic Wall"; break; // Illusionist 7 
		case 220 : $spell = "Vision"; break; // Illusionist 7 
		case 221 : $spell = "Charm Person"; break; // Mage 1 B
		case 222 : $spell = "Detect Magic"; break; // Mage 1 B
		case 223 : $spell = "Floating Disc"; break; // Mage 1 B
		case 224 : $spell = "Hold Portal"; break; // Mage 1 B
		case 225 : $spell = "Light"; break; // Mage 1 B
		case 226 : $spell = "Magic Missile"; break; // Mage 1 B
		case 227 : $spell = "Protection from Evil"; break; // Mage 1 B
		case 228 : $spell = "Read Languages"; break; // Mage 1 B
		case 229 : $spell = "Read Magic"; break; // Mage 1 B
		case 230 : $spell = "Shield"; break; // Mage 1 B
		case 231 : $spell = "Sleep"; break; // Mage 1 B
		case 232 : $spell = "Ventriloquism"; break; // Mage 1 B
		case 233 : $spell = "Allure"; break; // Mage 1 
		case 234 : $spell = "Burning Hands"; break; // Mage 1 
		case 235 : $spell = "Comprehend Languages"; break; // Mage 1 
		case 236 : $spell = "Dancing Lights"; break; // Mage 1 
		case 237 : $spell = "Enlarge"; break; // Mage 1 
		case 238 : $spell = "Erase"; break; // Mage 1 
		case 239 : $spell = "Feather Fall"; break; // Mage 1 
		case 240 : $spell = "Identify"; break; // Mage 1 
		case 241 : $spell = "Jarring Hand"; break; // Mage 1 
		case 242 : $spell = "Jump"; break; // Mage 1 
		case 243 : $spell = "Magic Aura"; break; // Mage 1 
		case 244 : $spell = "Manipulate Fire"; break; // Mage 1 
		case 245 : $spell = "Mending"; break; // Mage 1 
		case 246 : $spell = "Message"; break; // Mage 1 
		case 247 : $spell = "Scribe"; break; // Mage 1 
		case 248 : $spell = "Shocking Grasp"; break; // Mage 1 
		case 249 : $spell = "Spider Climb"; break; // Mage 1 
		case 250 : $spell = "Summon Familiar"; break; // Mage 1 
		case 251 : $spell = "Unseen Servant"; break; // Mage 1 
		case 252 : $spell = "Arcane Lock"; break; // Mage 2 B
		case 253 : $spell = "Continual Light"; break; // Mage 2 B
		case 254 : $spell = "Detect Evil"; break; // Mage 2 B
		case 255 : $spell = "Detect Invisible"; break; // Mage 2 B
		case 256 : $spell = "ESP"; break; // Mage 2 B
		case 257 : $spell = "Invisibility"; break; // Mage 2 B
		case 258 : $spell = "Knock"; break; // Mage 2 B
		case 259 : $spell = "Levitate"; break; // Mage 2 B
		case 260 : $spell = "Locate Object"; break; // Mage 2 B
		case 261 : $spell = "Mirror Image"; break; // Mage 2 B
		case 262 : $spell = "Phantasmal Force"; break; // Mage 2 B
		case 263 : $spell = "Web"; break; // Mage 2 B
		case 264 : $spell = "Amnesia"; break; // Mage 2 
		case 265 : $spell = "Auditory Illusion"; break; // Mage 2 
		case 266 : $spell = "Darkness Globe"; break; // Mage 2 
		case 267 : $spell = "False Gold"; break; // Mage 2 
		case 268 : $spell = "False Trap"; break; // Mage 2 
		case 269 : $spell = "Magic Mouth"; break; // Mage 2 
		case 270 : $spell = "Pyrotechnics"; break; // Mage 2 
		case 271 : $spell = "Ray of Enfeeblement"; break; // Mage 2 
		case 272 : $spell = "Rope Trick"; break; // Mage 2 
		case 273 : $spell = "Scare"; break; // Mage 2 
		case 274 : $spell = "Shatter"; break; // Mage 2 
		case 275 : $spell = "Stinking Cloud"; break; // Mage 2 
		case 276 : $spell = "Strength"; break; // Mage 2 
		case 277 : $spell = "Clairvoyance"; break; // Mage 3 B
		case 278 : $spell = "Dispel Magic"; break; // Mage 3 B
		case 279 : $spell = "Fire Ball"; break; // Mage 3 B
		case 280 : $spell = "Fly"; break; // Mage 3 B
		case 281 : $spell = "Haste"; break; // Mage 3 B
		case 282 : $spell = "Hold Person"; break; // Mage 3 B
		case 283 : $spell = "Infravision"; break; // Mage 3 B
		case 284 : $spell = "Invisibility 10` radius"; break; // Mage 3 B
		case 285 : $spell = "Lightning Bolt"; break; // Mage 3 B
		case 286 : $spell = "Protection from Evil 10` radius"; break; // Mage 3 B
		case 287 : $spell = "Protection from Normal Missiles"; break; // Mage 3 B
		case 288 : $spell = "Water Breathing"; break; // Mage 3 B
		case 289 : $spell = "Blink"; break; // Mage 3 
		case 290 : $spell = "Clairaudience"; break; // Mage 3 
		case 291 : $spell = "Explosive Runes"; break; // Mage 3 
		case 292 : $spell = "Feign Death"; break; // Mage 3 
		case 293 : $spell = "Gust of Wind"; break; // Mage 3 
		case 294 : $spell = "Suggestion"; break; // Mage 3 
		case 295 : $spell = "Summon Monster I"; break; // Mage 3 
		case 296 : $spell = "Tiny Hut"; break; // Mage 3 
		case 297 : $spell = "Tongues"; break; // Mage 3 
		case 298 : $spell = "Arcane Eye"; break; // Mage 4 B
		case 299 : $spell = "Charm Monster"; break; // Mage 4 B
		case 300 : $spell = "Confusion"; break; // Mage 4 B
		case 301 : $spell = "Dimension Door"; break; // Mage 4 B
		case 302 : $spell = "Hallucinatory Terrain"; break; // Mage 4 B
		case 303 : $spell = "Massmorph"; break; // Mage 4 B
		case 304 : $spell = "Plant Growth"; break; // Mage 4 B
		case 305 : $spell = "Polymorph Others"; break; // Mage 4 B
		case 306 : $spell = "Polymorph Self"; break; // Mage 4 B
		case 307 : $spell = "Remove Curse"; break; // Mage 4 B
		case 308 : $spell = "Wall of Fire"; break; // Mage 4 B
		case 309 : $spell = "Wall of Ice"; break; // Mage 4 B
		case 310 : $spell = "Enchant Arms"; break; // Mage 4 
		case 311 : $spell = "Fear"; break; // Mage 4 
		case 312 : $spell = "Fire Shield"; break; // Mage 4 
		case 313 : $spell = "Fire Trap"; break; // Mage 4 
		case 314 : $spell = "Flame Charm"; break; // Mage 4 
		case 315 : $spell = "Fumble"; break; // Mage 4 
		case 316 : $spell = "Globe of Invulnerability, Lesser"; break; // Mage 4 
		case 317 : $spell = "Ice Storm"; break; // Mage 4 
		case 318 : $spell = "Mnemonic Enhancer"; break; // Mage 4 
		case 319 : $spell = "Move Earth, lesser"; break; // Mage 4 
		case 320 : $spell = "Summon Monster II"; break; // Mage 4 
		case 321 : $spell = "Animate Dead"; break; // Mage 5 B
		case 322 : $spell = "Cloudkill"; break; // Mage 5 B
		case 323 : $spell = "Conjure Elemental"; break; // Mage 5 B
		case 324 : $spell = "Contact Other Plane"; break; // Mage 5 B
		case 325 : $spell = "Feeblemind"; break; // Mage 5 B
		case 326 : $spell = "Hold Monster"; break; // Mage 5 B
		case 327 : $spell = "Magic Jar"; break; // Mage 5 B
		case 328 : $spell = "Passwall"; break; // Mage 5 B
		case 329 : $spell = "Telekinesis"; break; // Mage 5 B
		case 330 : $spell = "Teleport"; break; // Mage 5 B
		case 331 : $spell = "Transmute Rock to Mud"; break; // Mage 5 B
		case 332 : $spell = "Wall of Stone"; break; // Mage 5 B
		case 333 : $spell = "Atmosphere Bubble"; break; // Mage 5 
		case 334 : $spell = "Cone of Cold"; break; // Mage 5 
		case 335 : $spell = "Distort Distance"; break; // Mage 5 
		case 336 : $spell = "Faithful Hound"; break; // Mage 5 
		case 337 : $spell = "Interposing Hand"; break; // Mage 5 
		case 338 : $spell = "Secret Chest"; break; // Mage 5 
		case 339 : $spell = "Stone Shape"; break; // Mage 5 
		case 340 : $spell = "Wall of Force"; break; // Mage 5 
		case 341 : $spell = "Wall of Iron"; break; // Mage 5 
		case 342 : $spell = "Anti-Magic Shell"; break; // Mage 6 B
		case 343 : $spell = "Control Weather"; break; // Mage 6 B
		case 344 : $spell = "Death Spell"; break; // Mage 6 B
		case 345 : $spell = "Disintegrate"; break; // Mage 6 B
		case 346 : $spell = "Geas"; break; // Mage 6 B
		case 347 : $spell = "Invisible Stalker"; break; // Mage 6 B
		case 348 : $spell = "Lower Water"; break; // Mage 6 B
		case 349 : $spell = "Move Earth"; break; // Mage 6 B
		case 350 : $spell = "Part Water"; break; // Mage 6 B
		case 351 : $spell = "Project Image"; break; // Mage 6 B
		case 352 : $spell = "Reincarnate"; break; // Mage 6 B
		case 353 : $spell = "Stone to Flesh"; break; // Mage 6 B
		case 354 : $spell = "Arcane Window"; break; // Mage 6 
		case 355 : $spell = "Dweomer of Rage"; break; // Mage 6 
		case 356 : $spell = "Extension III"; break; // Mage 6 
		case 357 : $spell = "Forceful Hand"; break; // Mage 6 
		case 358 : $spell = "Freezing Sphere"; break; // Mage 6 
		case 359 : $spell = "Globe of Invulnerability"; break; // Mage 6 
		case 360 : $spell = "Guards and Wards"; break; // Mage 6 
		case 361 : $spell = "Legend Lore"; break; // Mage 6 
		case 362 : $spell = "Monster Summoning IV"; break; // Mage 6 
		case 363 : $spell = "Repulsion"; break; // Mage 6 
		case 364 : $spell = "Spiritwrath"; break; // Mage 6 
		case 365 : $spell = "Delayed Blast Fireball"; break; // Mage 7 B
		case 366 : $spell = "Duo-Dimension"; break; // Mage 7 B
		case 367 : $spell = "Grasping Hand"; break; // Mage 7 B
		case 368 : $spell = "Instant Summons"; break; // Mage 7 B
		case 369 : $spell = "Limited Wish"; break; // Mage 7 B
		case 370 : $spell = "Magic Sword"; break; // Mage 7 B
		case 371 : $spell = "Mass Invisibility"; break; // Mage 7 B
		case 372 : $spell = "Phase Door"; break; // Mage 7 B
		case 373 : $spell = "Power Word Stun"; break; // Mage 7 B
		case 374 : $spell = "Reverse Gravity"; break; // Mage 7 B
		case 375 : $spell = "Simulacrum"; break; // Mage 7 B
		case 376 : $spell = "Statue"; break; // Mage 7 B
		case 377 : $spell = "Charm Plants"; break; // Mage 7 
		case 378 : $spell = "Summon Demon"; break; // Mage 7 
		case 379 : $spell = "Summon Monster V"; break; // Mage 7 
		case 380 : $spell = "Vanish"; break; // Mage 7 
		case 381 : $spell = "Antipathy/Sympathy"; break; // Mage 8 B
		case 382 : $spell = "Clenched Fist"; break; // Mage 8 B
		case 383 : $spell = "Clone"; break; // Mage 8 B
		case 384 : $spell = "Glass Like Steel"; break; // Mage 8 B
		case 385 : $spell = "Incendiary Cloud"; break; // Mage 8 B
		case 386 : $spell = "Irresistible Dance"; break; // Mage 8 B
		case 387 : $spell = "Mass Charm"; break; // Mage 8 B
		case 388 : $spell = "Maze"; break; // Mage 8 B
		case 389 : $spell = "Mind Blank"; break; // Mage 8 B
		case 390 : $spell = "Polymorph Any Object"; break; // Mage 8 B
		case 391 : $spell = "Symbol"; break; // Mage 8 B
		case 392 : $spell = "Trap the Soul"; break; // Mage 8 B
		case 393 : $spell = "Permanency"; break; // Mage 8 
		case 394 : $spell = "Power Word Blind"; break; // Mage 8 
		case 395 : $spell = "Spell Resistance"; break; // Mage 8 
		case 396 : $spell = "Summon Monster VI"; break; // Mage 8 
		case 397 : $spell = "Crushing Hand"; break; // Mage 9 B
		case 398 : $spell = "Imprisonment"; break; // Mage 9 B
		case 399 : $spell = "Meteor Swarm"; break; // Mage 9 B
		case 400 : $spell = "Power Word Kill"; break; // Mage 9 B
		case 401 : $spell = "Prismatic Sphere"; break; // Mage 9 B
		case 402 : $spell = "Shape Change"; break; // Mage 9 B
		case 403 : $spell = "Temporal Stasis"; break; // Mage 9 B
		case 404 : $spell = "Time Stop"; break; // Mage 9 B
		case 405 : $spell = "Wish"; break; // Mage 9 B
		case 406 : $spell = "Astral Projection"; break; // Mage 9 
		case 407 : $spell = "Gate"; break; // Mage 9 
		case 408 : $spell = "Summon Monster VII"; break; // Mage 9 
	}
}
else if ($game == "AD&D")
{
	$ua = $_SESSION["SESSION_ADD_UA"];

	if (($magic == "cleric") && ($level == 1)){ if ($ua > 0){ $item = mt_rand(1, 20); } else { $item = mt_rand(9, 20); } }
	else if (($magic == "cleric") && ($level == 2)){ if ($ua > 0){ $item = mt_rand(21, 40); } else { $item = mt_rand(29, 40); } }
	else if (($magic == "cleric") && ($level == 3)){ if ($ua > 0){ $item = mt_rand(41, 60); } else { $item = mt_rand(49, 60); } }
	else if (($magic == "cleric") && ($level == 4)){ if ($ua > 0){ $item = mt_rand(61, 76); } else { $item = mt_rand(67, 76); } }
	else if (($magic == "cleric") && ($level == 5)){ if ($ua > 0){ $item = mt_rand(77, 92); } else { $item = mt_rand(83, 92); } }
	else if (($magic == "cleric") && ($level == 6)){ if ($ua > 0){ $item = mt_rand(93, 104); } else { $item = mt_rand(95, 104); } }
	else if (($magic == "cleric") && ($level == 7)){ if ($ua > 0){ $item = mt_rand(105, 116); } else { $item = mt_rand(107, 116); } }
	else if (($magic == "druid") && ($level == 1)){ if ($ua > 0){ $item = mt_rand(117, 132); } else { $item = mt_rand(121, 132); } }
	else if (($magic == "druid") && ($level == 2)){ if ($ua > 0){ $item = mt_rand(133, 148); } else { $item = mt_rand(137, 148); } }
	else if (($magic == "druid") && ($level == 3)){ if ($ua > 0){ $item = mt_rand(149, 164); } else { $item = mt_rand(153, 164); } }
	else if (($magic == "druid") && ($level == 4)){ if ($ua > 0){ $item = mt_rand(165, 176); } else { $item = mt_rand(165, 176); } }
	else if (($magic == "druid") && ($level == 5)){ if ($ua > 0){ $item = mt_rand(177, 188); } else { $item = mt_rand(179, 188); } }
	else if (($magic == "druid") && ($level == 6)){ if ($ua > 0){ $item = mt_rand(189, 200); } else { $item = mt_rand(191, 200); } }
	else if (($magic == "druid") && ($level == 7)){ if ($ua > 0){ $item = mt_rand(201, 212); } else { $item = mt_rand(203, 212); } }
	else if (($magic == "illusionist") && ($level == 1)){ if ($ua > 0){ $item = mt_rand(213, 228); } else { $item = mt_rand(217, 228); } }
	else if (($magic == "illusionist") && ($level == 2)){ if ($ua > 0){ $item = mt_rand(229, 244); } else { $item = mt_rand(233, 244); } }
	else if (($magic == "illusionist") && ($level == 3)){ if ($ua > 0){ $item = mt_rand(245, 260); } else { $item = mt_rand(249, 260); } }
	else if (($magic == "illusionist") && ($level == 4)){ if ($ua > 0){ $item = mt_rand(261, 272); } else { $item = mt_rand(265, 272); } }
	else if (($magic == "illusionist") && ($level == 5)){ if ($ua > 0){ $item = mt_rand(273, 284); } else { $item = mt_rand(277, 284); } }
	else if (($magic == "illusionist") && ($level == 6)){ if ($ua > 0){ $item = mt_rand(285, 296); } else { $item = mt_rand(289, 296); } }
	else if (($magic == "illusionist") && ($level == 7)){ if ($ua > 0){ $item = mt_rand(297, 303); } else { $item = mt_rand(299, 303); } }
	else if (($magic == "mage") && ($level == 1)){ if ($ua > 0){ $item = mt_rand(304, 343); } else { $item = mt_rand(314, 343); } }
	else if (($magic == "mage") && ($level == 2)){ if ($ua > 0){ $item = mt_rand(344, 379); } else { $item = mt_rand(356, 379); } }
	else if (($magic == "mage") && ($level == 3)){ if ($ua > 0){ $item = mt_rand(380, 411); } else { $item = mt_rand(388, 411); } }
	else if (($magic == "mage") && ($level == 4)){ if ($ua > 0){ $item = mt_rand(412, 442); } else { $item = mt_rand(419, 442); } }
	else if (($magic == "mage") && ($level == 5)){ if ($ua > 0){ $item = mt_rand(443, 472); } else { $item = mt_rand(449, 472); } }
	else if (($magic == "mage") && ($level == 6)){ if ($ua > 0){ $item = mt_rand(473, 502); } else { $item = mt_rand(479, 502); } }
	else if (($magic == "mage") && ($level == 7)){ if ($ua > 0){ $item = mt_rand(503, 526); } else { $item = mt_rand(511, 526); } }
	else if (($magic == "mage") && ($level == 8)){ if ($ua > 0){ $item = mt_rand(527, 546); } else { $item = mt_rand(531, 546); } }
	else { if ($ua > 0){ $item = mt_rand(547, 562); } else { $item = mt_rand(551, 562); } }

	switch ($item)
	{
		case 1 : $spell = "Ceremony"; break; // LEVEL 1 Cleric UA
		case 2 : $spell = "Combine"; break; // LEVEL 1 Cleric UA
		case 3 : $spell = "Endure Cold/Heat"; break; // LEVEL 1 Cleric UA
		case 4 : $spell = "Invisibility to Undead"; break; // LEVEL 1 Cleric UA
		case 5 : $spell = "Magic Stone"; break; // LEVEL 1 Cleric UA
		case 6 : $spell = "Penetrate Disguise"; break; // LEVEL 1 Cleric UA
		case 7 : $spell = "Portent"; break; // LEVEL 1 Cleric UA
		case 8 : $spell = "Precipitation"; break; // LEVEL 1 Cleric UA
		case 9 : $spell = "Bless"; break; // LEVEL 1 Cleric 
		case 10 : $spell = "Command"; break; // LEVEL 1 Cleric 
		case 11 : $spell = "Create Water"; break; // LEVEL 1 Cleric 
		case 12 : $spell = "Cure Light Wounds"; break; // LEVEL 1 Cleric 
		case 13 : $spell = "Detect Evil"; break; // LEVEL 1 Cleric 
		case 14 : $spell = "Detect Magic"; break; // LEVEL 1 Cleric 
		case 15 : $spell = "Light"; break; // LEVEL 1 Cleric 
		case 16 : $spell = "Protection From Evil"; break; // LEVEL 1 Cleric 
		case 17 : $spell = "Purify Food & Drink"; break; // LEVEL 1 Cleric 
		case 18 : $spell = "Remove Fear"; break; // LEVEL 1 Cleric 
		case 19 : $spell = "Resist Cold"; break; // LEVEL 1 Cleric 
		case 20 : $spell = "Sanctuary"; break; // LEVEL 1 Cleric -------------------------
		case 21 : $spell = "Aid"; break; // LEVEL 2 Cleric UA
		case 22 : $spell = "Detect Life"; break; // LEVEL 2 Cleric UA
		case 23 : $spell = "Dust Devil"; break; // LEVEL 2 Cleric UA
		case 24 : $spell = "Enthrall"; break; // LEVEL 2 Cleric UA
		case 25 : $spell = "Holy Symbol"; break; // LEVEL 2 Cleric UA
		case 26 : $spell = "Messenger"; break; // LEVEL 2 Cleric UA
		case 27 : $spell = "Withdraw"; break; // LEVEL 2 Cleric UA
		case 28 : $spell = "Wyvern Watch"; break; // LEVEL 2 Cleric UA
		case 29 : $spell = "Augury"; break; // LEVEL 2 Cleric 
		case 30 : $spell = "Chant"; break; // LEVEL 2 Cleric 
		case 31 : $spell = "Detect Charm"; break; // LEVEL 2 Cleric 
		case 32 : $spell = "Find Traps"; break; // LEVEL 2 Cleric 
		case 33 : $spell = "Hold Person"; break; // LEVEL 2 Cleric 
		case 34 : $spell = "Know Alignment"; break; // LEVEL 2 Cleric 
		case 35 : $spell = "Resist Fire"; break; // LEVEL 2 Cleric 
		case 36 : $spell = "Silence 15` Radius"; break; // LEVEL 2 Cleric 
		case 37 : $spell = "Slow Poison"; break; // LEVEL 2 Cleric 
		case 38 : $spell = "Snake Charm"; break; // LEVEL 2 Cleric 
		case 39 : $spell = "Speak With Animals"; break; // LEVEL 2 Cleric 
		case 40 : $spell = "Spiritual Hammer"; break; // LEVEL 2 Cleric -------------------------
		case 41 : $spell = "Cloudburst"; break; // LEVEL 3 Cleric UA
		case 42 : $spell = "Death`s Door"; break; // LEVEL 3 Cleric UA
		case 43 : $spell = "Flame Walk"; break; // LEVEL 3 Cleric UA
		case 44 : $spell = "Magical Vestment"; break; // LEVEL 3 Cleric UA
		case 45 : $spell = "Meld Into Stone"; break; // LEVEL 3 Cleric UA
		case 46 : $spell = "Negative Plane Protection"; break; // LEVEL 3 Cleric UA
		case 47 : $spell = "Remove Paralysis"; break; // LEVEL 3 Cleric UA
		case 48 : $spell = "Water Walk"; break; // LEVEL 3 Cleric UA
		case 49 : $spell = "Animate Dead"; break; // LEVEL 3 Cleric 
		case 50 : $spell = "Continual Light"; break; // LEVEL 3 Cleric 
		case 51 : $spell = "Create Food & Water"; break; // LEVEL 3 Cleric 
		case 52 : $spell = "Cure Blindness"; break; // LEVEL 3 Cleric 
		case 53 : $spell = "Cure Disease"; break; // LEVEL 3 Cleric 
		case 54 : $spell = "Dispel Magic"; break; // LEVEL 3 Cleric 
		case 55 : $spell = "Feign Death"; break; // LEVEL 3 Cleric 
		case 56 : $spell = "Glyph Of Warding"; break; // LEVEL 3 Cleric 
		case 57 : $spell = "Locate Object"; break; // LEVEL 3 Cleric 
		case 58 : $spell = "Prayer"; break; // LEVEL 3 Cleric 
		case 59 : $spell = "Remove Curse"; break; // LEVEL 3 Cleric 
		case 60 : $spell = "Speak With Dead"; break; // LEVEL 3 Cleric -------------------------
		case 61 : $spell = "Abjure"; break; // LEVEL 4 Cleric UA
		case 62 : $spell = "Cloak of Fear"; break; // LEVEL 4 Cleric UA
		case 63 : $spell = "Giant Insect"; break; // LEVEL 4 Cleric UA
		case 64 : $spell = "Imbue With Spell Ability"; break; // LEVEL 4 Cleric UA
		case 65 : $spell = "Spell Immunity"; break; // LEVEL 4 Cleric UA
		case 66 : $spell = "Spike Stones"; break; // LEVEL 4 Cleric UA
		case 67 : $spell = "Cure Serious Wounds"; break; // LEVEL 4 Cleric 
		case 68 : $spell = "Detect Lie"; break; // LEVEL 4 Cleric 
		case 69 : $spell = "Divination"; break; // LEVEL 4 Cleric 
		case 70 : $spell = "Exorcise"; break; // LEVEL 4 Cleric 
		case 71 : $spell = "Lower Water"; break; // LEVEL 4 Cleric 
		case 72 : $spell = "Neutralize Poison"; break; // LEVEL 4 Cleric 
		case 73 : $spell = "Prot. from Evil 10` Radius"; break; // LEVEL 4 Cleric 
		case 74 : $spell = "Speak With Plants"; break; // LEVEL 4 Cleric 
		case 75 : $spell = "Sticks To Snakes"; break; // LEVEL 4 Cleric 
		case 76 : $spell = "Tongues"; break; // LEVEL 4 Cleric -------------------------
		case 77 : $spell = "Air Walk"; break; // LEVEL 5 Cleric UA
		case 78 : $spell = "Animate Dead Monsters"; break; // LEVEL 5 Cleric UA
		case 79 : $spell = "Golem"; break; // LEVEL 5 Cleric UA
		case 80 : $spell = "Magic Font"; break; // LEVEL 5 Cleric UA
		case 81 : $spell = "Rainbow"; break; // LEVEL 5 Cleric UA
		case 82 : $spell = "Spike Growth"; break; // LEVEL 5 Cleric UA
		case 83 : $spell = "Atonement"; break; // LEVEL 5 Cleric 
		case 84 : $spell = "Commune"; break; // LEVEL 5 Cleric 
		case 85 : $spell = "Cure Critical Wounds"; break; // LEVEL 5 Cleric 
		case 86 : $spell = "Dispel Evil"; break; // LEVEL 5 Cleric 
		case 87 : $spell = "Flame Strike"; break; // LEVEL 5 Cleric 
		case 88 : $spell = "Insect Plague"; break; // LEVEL 5 Cleric 
		case 89 : $spell = "Plane Shift"; break; // LEVEL 5 Cleric 
		case 90 : $spell = "Quest"; break; // LEVEL 5 Cleric 
		case 91 : $spell = "Raise Dead"; break; // LEVEL 5 Cleric 
		case 92 : $spell = "True Seeing"; break; // LEVEL 5 Cleric -------------------------
		case 93 : $spell = "Forbiddance"; break; // LEVEL 6 Cleric UA
		case 94 : $spell = "Heroes` Feast"; break; // LEVEL 6 Cleric UA
		case 95 : $spell = "Aerial Servant"; break; // LEVEL 6 Cleric 
		case 96 : $spell = "Animate Object"; break; // LEVEL 6 Cleric 
		case 97 : $spell = "Blade Barrier"; break; // LEVEL 6 Cleric 
		case 98 : $spell = "Conjure Animals"; break; // LEVEL 6 Cleric 
		case 99 : $spell = "Find The Path"; break; // LEVEL 6 Cleric 
		case 100 : $spell = "Heal"; break; // LEVEL 6 Cleric 
		case 101 : $spell = "Part Water"; break; // LEVEL 6 Cleric 
		case 102 : $spell = "Speak With Monsters"; break; // LEVEL 6 Cleric 
		case 103 : $spell = "Stone Tell"; break; // LEVEL 6 Cleric 
		case 104 : $spell = "Word Of Recall"; break; // LEVEL 6 Cleric -------------------------
		case 105 : $spell = "Exaction"; break; // LEVEL 7 Cleric UA
		case 106 : $spell = "Succor"; break; // LEVEL 7 Cleric UA
		case 107 : $spell = "Astral Spell"; break; // LEVEL 7 Cleric 
		case 108 : $spell = "Control Weather"; break; // LEVEL 7 Cleric 
		case 109 : $spell = "Earthquake"; break; // LEVEL 7 Cleric 
		case 110 : $spell = "Gate"; break; // LEVEL 7 Cleric 
		case 111 : $spell = "Holy (Unholy) Word"; break; // LEVEL 7 Cleric 
		case 112 : $spell = "Regenerate"; break; // LEVEL 7 Cleric 
		case 113 : $spell = "Restoration"; break; // LEVEL 7 Cleric 
		case 114 : $spell = "Resurrection"; break; // LEVEL 7 Cleric 
		case 115 : $spell = "Symbol"; break; // LEVEL 7 Cleric 
		case 116 : $spell = "Wind Walk"; break; // LEVEL 7 Cleric -------------------------
		case 117 : $spell = "Ceremony"; break; // LEVEL 1 Druid UA
		case 118 : $spell = "Detect Balance"; break; // LEVEL 1 Druid UA
		case 119 : $spell = "Detect Poison"; break; // LEVEL 1 Druid UA
		case 120 : $spell = "Precipitation"; break; // LEVEL 1 Druid UA
		case 121 : $spell = "Animal Friendship"; break; // LEVEL 1 Druid 
		case 122 : $spell = "Detect Magic"; break; // LEVEL 1 Druid 
		case 123 : $spell = "Detect Snares & Pits"; break; // LEVEL 1 Druid 
		case 124 : $spell = "Entangle"; break; // LEVEL 1 Druid 
		case 125 : $spell = "Faerie Fire"; break; // LEVEL 1 Druid 
		case 126 : $spell = "Invisibility To Animals"; break; // LEVEL 1 Druid 
		case 127 : $spell = "Locate Animals"; break; // LEVEL 1 Druid 
		case 128 : $spell = "Pass Without Trace"; break; // LEVEL 1 Druid 
		case 129 : $spell = "Predict Weather"; break; // LEVEL 1 Druid 
		case 130 : $spell = "Purify Water"; break; // LEVEL 1 Druid 
		case 131 : $spell = "Shillelagh"; break; // LEVEL 1 Druid 
		case 132 : $spell = "Speak With Animals"; break; // LEVEL 1 Druid -------------------------
		case 133 : $spell = "Flame Blade"; break; // LEVEL 2 Druid UA
		case 134 : $spell = "Goodberry"; break; // LEVEL 2 Druid UA
		case 135 : $spell = "Reflecting Pool"; break; // LEVEL 2 Druid UA
		case 136 : $spell = "Slow Poison"; break; // LEVEL 2 Druid UA
		case 137 : $spell = "Barkskin"; break; // LEVEL 2 Druid 
		case 138 : $spell = "Charm Person/Mammal"; break; // LEVEL 2 Druid 
		case 139 : $spell = "Create Water"; break; // LEVEL 2 Druid 
		case 140 : $spell = "Cure Light Wounds"; break; // LEVEL 2 Druid 
		case 141 : $spell = "Feign Death"; break; // LEVEL 2 Druid 
		case 142 : $spell = "Fire Trap"; break; // LEVEL 2 Druid 
		case 143 : $spell = "Heat Metal"; break; // LEVEL 2 Druid 
		case 144 : $spell = "Locate Plants"; break; // LEVEL 2 Druid 
		case 145 : $spell = "Obscurement"; break; // LEVEL 2 Druid 
		case 146 : $spell = "Produce Flame"; break; // LEVEL 2 Druid 
		case 147 : $spell = "Trip"; break; // LEVEL 2 Druid 
		case 148 : $spell = "Warp Wood"; break; // LEVEL 2 Druid -------------------------
		case 149 : $spell = "Cloudburst"; break; // LEVEL 3 Druid UA
		case 150 : $spell = "Know Alignment"; break; // LEVEL 3 Druid UA
		case 151 : $spell = "Spike Growth"; break; // LEVEL 3 Druid UA
		case 152 : $spell = "Starshine"; break; // LEVEL 3 Druid UA
		case 153 : $spell = "Call Lightning"; break; // LEVEL 3 Druid 
		case 154 : $spell = "Cure Disease"; break; // LEVEL 3 Druid 
		case 155 : $spell = "Hold Animal"; break; // LEVEL 3 Druid 
		case 156 : $spell = "Neutralize Poison"; break; // LEVEL 3 Druid 
		case 157 : $spell = "Plant Growth"; break; // LEVEL 3 Druid 
		case 158 : $spell = "Protection From Fire"; break; // LEVEL 3 Druid 
		case 159 : $spell = "Pyrotechnics"; break; // LEVEL 3 Druid 
		case 160 : $spell = "Snare"; break; // LEVEL 3 Druid 
		case 161 : $spell = "Stone Shape"; break; // LEVEL 3 Druid 
		case 162 : $spell = "Summon Insects"; break; // LEVEL 3 Druid 
		case 163 : $spell = "Tree"; break; // LEVEL 3 Druid 
		case 164 : $spell = "Water Breathing"; break; // LEVEL 3 Druid -------------------------
		case 165 : $spell = "Animal Summoning I"; break; // LEVEL 4 Druid 
		case 166 : $spell = "Call Woodland Beings"; break; // LEVEL 4 Druid 
		case 167 : $spell = "Control Temperature"; break; // LEVEL 4 Druid 
		case 168 : $spell = "Cure Serious Wounds"; break; // LEVEL 4 Druid 
		case 169 : $spell = "Dispel Magic"; break; // LEVEL 4 Druid 
		case 170 : $spell = "Hallucinatory Forest"; break; // LEVEL 4 Druid 
		case 171 : $spell = "Hold Plant"; break; // LEVEL 4 Druid 
		case 172 : $spell = "Plant Door"; break; // LEVEL 4 Druid 
		case 173 : $spell = "Produce Fire"; break; // LEVEL 4 Druid 
		case 174 : $spell = "Protection From Lightning"; break; // LEVEL 4 Druid 
		case 175 : $spell = "Repel Insects"; break; // LEVEL 4 Druid 
		case 176 : $spell = "Speak With Plants"; break; // LEVEL 4 Druid -------------------------
		case 177 : $spell = "Moonbeam"; break; // LEVEL 5 Druid UA
		case 178 : $spell = "Spike Stones"; break; // LEVEL 5 Druid UA
		case 179 : $spell = "Animal Growth"; break; // LEVEL 5 Druid 
		case 180 : $spell = "Animal Summoning II"; break; // LEVEL 5 Druid 
		case 181 : $spell = "Anti-Plant Shell"; break; // LEVEL 5 Druid 
		case 182 : $spell = "Commune With Nature"; break; // LEVEL 5 Druid 
		case 183 : $spell = "Control Winds"; break; // LEVEL 5 Druid 
		case 184 : $spell = "Insect Plague"; break; // LEVEL 5 Druid 
		case 185 : $spell = "Pass Plant"; break; // LEVEL 5 Druid 
		case 186 : $spell = "Sticks To Snakes"; break; // LEVEL 5 Druid 
		case 187 : $spell = "Transmute Rock To Mud"; break; // LEVEL 5 Druid 
		case 188 : $spell = "Wall Of Fire"; break; // LEVEL 5 Druid -------------------------
		case 189 : $spell = "Liveoak"; break; // LEVEL 6 Druid UA
		case 190 : $spell = "Transmute Water To Dust"; break; // LEVEL 6 Druid UA
		case 191 : $spell = "Animal Summoning III"; break; // LEVEL 6 Druid 
		case 192 : $spell = "Anti-Animal Shell"; break; // LEVEL 6 Druid 
		case 193 : $spell = "Conjure Fire Elemental"; break; // LEVEL 6 Druid 
		case 194 : $spell = "Cure Critical Wounds"; break; // LEVEL 6 Druid 
		case 195 : $spell = "Feeblemind"; break; // LEVEL 6 Druid 
		case 196 : $spell = "Fire Seeds"; break; // LEVEL 6 Druid 
		case 197 : $spell = "Transport Via Plants"; break; // LEVEL 6 Druid 
		case 198 : $spell = "Turn Wood"; break; // LEVEL 6 Druid 
		case 199 : $spell = "Wall Of Thorns"; break; // LEVEL 6 Druid 
		case 200 : $spell = "Weather Summoning"; break; // LEVEL 6 Druid -------------------------
		case 201 : $spell = "Changestaff"; break; // LEVEL 7 Druid UA
		case 202 : $spell = "Sunray"; break; // LEVEL 7 Druid UA
		case 203 : $spell = "Animate Rock"; break; // LEVEL 7 Druid 
		case 204 : $spell = "Chariot Of Sustarre"; break; // LEVEL 7 Druid 
		case 205 : $spell = "Confusion"; break; // LEVEL 7 Druid 
		case 206 : $spell = "Conjure Earth Elemental"; break; // LEVEL 7 Druid 
		case 207 : $spell = "Control Weather"; break; // LEVEL 7 Druid 
		case 208 : $spell = "Creeping Doom"; break; // LEVEL 7 Druid 
		case 209 : $spell = "Finger Of Death"; break; // LEVEL 7 Druid 
		case 210 : $spell = "Fire Storm"; break; // LEVEL 7 Druid 
		case 211 : $spell = "Reincarnate"; break; // LEVEL 7 Druid 
		case 212 : $spell = "Transmute Metal To Wood"; break; // LEVEL 7 Druid -------------------------
		case 213 : $spell = "Chromatic Orb"; break; // LEVEL 1 Illusionist UA
		case 214 : $spell = "Phantom Armor"; break; // LEVEL 1 Illusionist UA
		case 215 : $spell = "Read Illusionist Magic"; break; // LEVEL 1 Illusionist UA
		case 216 : $spell = "Spook"; break; // LEVEL 1 Illusionist UA
		case 217 : $spell = "Audible Glamour"; break; // LEVEL 1 Illusionist 
		case 218 : $spell = "Change Self"; break; // LEVEL 1 Illusionist 
		case 219 : $spell = "Colour Spray"; break; // LEVEL 1 Illusionist 
		case 220 : $spell = "Dancing Lights"; break; // LEVEL 1 Illusionist 
		case 221 : $spell = "Darkness"; break; // LEVEL 1 Illusionist 
		case 222 : $spell = "Detect Illusion"; break; // LEVEL 1 Illusionist 
		case 223 : $spell = "Detect Invisibility"; break; // LEVEL 1 Illusionist 
		case 224 : $spell = "Gaze Reflection"; break; // LEVEL 1 Illusionist 
		case 225 : $spell = "Hypnotism"; break; // LEVEL 1 Illusionist 
		case 226 : $spell = "Light"; break; // LEVEL 1 Illusionist 
		case 227 : $spell = "Phantasmal Force"; break; // LEVEL 1 Illusionist 
		case 228 : $spell = "Wall Of Fog"; break; // LEVEL 1 Illusionist -------------------------
		case 229 : $spell = "Alter Self"; break; // LEVEL 2 Illusionist UA
		case 230 : $spell = "Fascinate"; break; // LEVEL 2 Illusionist UA
		case 231 : $spell = "Ultravision"; break; // LEVEL 2 Illusionist UA
		case 232 : $spell = "Whispering Wind"; break; // LEVEL 2 Illusionist UA
		case 233 : $spell = "Blindness"; break; // LEVEL 2 Illusionist 
		case 234 : $spell = "Blur"; break; // LEVEL 2 Illusionist 
		case 235 : $spell = "Deafness"; break; // LEVEL 2 Illusionist 
		case 236 : $spell = "Detect Magic"; break; // LEVEL 2 Illusionist 
		case 237 : $spell = "Fog Cloud"; break; // LEVEL 2 Illusionist 
		case 238 : $spell = "Hypnotic Pattern"; break; // LEVEL 2 Illusionist 
		case 239 : $spell = "Improved Phantasmal Force"; break; // LEVEL 2 Illusionist 
		case 240 : $spell = "Invisibility"; break; // LEVEL 2 Illusionist 
		case 241 : $spell = "Magic Mouth"; break; // LEVEL 2 Illusionist 
		case 242 : $spell = "Mirror Image"; break; // LEVEL 2 Illusionist 
		case 243 : $spell = "Misdirection"; break; // LEVEL 2 Illusionist 
		case 244 : $spell = "Ventriloquism"; break; // LEVEL 2 Illusionist -------------------------
		case 245 : $spell = "Delude"; break; // LEVEL 3 Illusionist UA
		case 246 : $spell = "Phantom Steed"; break; // LEVEL 3 Illusionist UA
		case 247 : $spell = "Phantom Wind"; break; // LEVEL 3 Illusionist UA
		case 248 : $spell = "Wraithform"; break; // LEVEL 3 Illusionist UA
		case 249 : $spell = "Continual Darkness"; break; // LEVEL 3 Illusionist 
		case 250 : $spell = "Continual Light"; break; // LEVEL 3 Illusionist 
		case 251 : $spell = "Dispel Illusion"; break; // LEVEL 3 Illusionist 
		case 252 : $spell = "Fear"; break; // LEVEL 3 Illusionist 
		case 253 : $spell = "Hallucinatory Terrain"; break; // LEVEL 3 Illusionist 
		case 254 : $spell = "Illusionary Script"; break; // LEVEL 3 Illusionist 
		case 255 : $spell = "Invisibility 10` Radius"; break; // LEVEL 3 Illusionist 
		case 256 : $spell = "Non-detection"; break; // LEVEL 3 Illusionist 
		case 257 : $spell = "Paralyzation"; break; // LEVEL 3 Illusionist 
		case 258 : $spell = "Rope Trick"; break; // LEVEL 3 Illusionist 
		case 259 : $spell = "Spectral Force"; break; // LEVEL 3 Illusionist 
		case 260 : $spell = "Suggestion"; break; // LEVEL 3 Illusionist -------------------------
		case 261 : $spell = "Dispel Magic"; break; // LEVEL 4 Illusionist UA
		case 262 : $spell = "Rainbow Pattern"; break; // LEVEL 4 Illusionist UA
		case 263 : $spell = "Solid Fog"; break; // LEVEL 4 Illusionist UA
		case 264 : $spell = "Vacancy"; break; // LEVEL 4 Illusionist UA
		case 265 : $spell = "Confusion"; break; // LEVEL 4 Illusionist 
		case 266 : $spell = "Dispel Exhaustion"; break; // LEVEL 4 Illusionist 
		case 267 : $spell = "Emotion"; break; // LEVEL 4 Illusionist 
		case 268 : $spell = "Improved Invisibility"; break; // LEVEL 4 Illusionist 
		case 269 : $spell = "Massmorph"; break; // LEVEL 4 Illusionist 
		case 270 : $spell = "Minor Creation"; break; // LEVEL 4 Illusionist 
		case 271 : $spell = "Phantasmal Killer"; break; // LEVEL 4 Illusionist 
		case 272 : $spell = "Shadow Monsters"; break; // LEVEL 4 Illusionist -------------------------
		case 273 : $spell = "Advanced Illusion"; break; // LEVEL 5 Illusionist UA
		case 274 : $spell = "Dream"; break; // LEVEL 5 Illusionist UA
		case 275 : $spell = "Magic Mirror"; break; // LEVEL 5 Illusionist UA
		case 276 : $spell = "Tempus Fugit"; break; // LEVEL 5 Illusionist UA
		case 277 : $spell = "Chaos"; break; // LEVEL 5 Illusionist 
		case 278 : $spell = "Demi-Shadow Monsters"; break; // LEVEL 5 Illusionist 
		case 279 : $spell = "Major Creation"; break; // LEVEL 5 Illusionist 
		case 280 : $spell = "Maze"; break; // LEVEL 5 Illusionist 
		case 281 : $spell = "Projected Image"; break; // LEVEL 5 Illusionist 
		case 282 : $spell = "Shadow Door"; break; // LEVEL 5 Illusionist 
		case 283 : $spell = "Shadow Magic"; break; // LEVEL 5 Illusionist 
		case 284 : $spell = "Summon Shadow"; break; // LEVEL 5 Illusionist -------------------------
		case 285 : $spell = "Death Fog"; break; // LEVEL 6 Illusionist UA
		case 286 : $spell = "Mirage Arcane"; break; // LEVEL 6 Illusionist UA
		case 287 : $spell = "Mislead"; break; // LEVEL 6 Illusionist UA
		case 288 : $spell = "Phantasmagoria"; break; // LEVEL 6 Illusionist UA
		case 289 : $spell = "Conjure Animals"; break; // LEVEL 6 Illusionist 
		case 290 : $spell = "Demi-Shadow Magic"; break; // LEVEL 6 Illusionist 
		case 291 : $spell = "Mass Suggestion"; break; // LEVEL 6 Illusionist 
		case 292 : $spell = "Permanent Illusion"; break; // LEVEL 6 Illusionist 
		case 293 : $spell = "Programmed Illusion"; break; // LEVEL 6 Illusionist 
		case 294 : $spell = "Shades"; break; // LEVEL 6 Illusionist 
		case 295 : $spell = "True Sight"; break; // LEVEL 6 Illusionist 
		case 296 : $spell = "Veil"; break; // LEVEL 6 Illusionist -------------------------
		case 297 : $spell = "Weird"; break; // LEVEL 7 Illusionist UA
		case 298 : $spell = "Shadow Walk"; break; // LEVEL 7 Illusionist UA
		case 299 : $spell = "Alter Reality"; break; // LEVEL 7 Illusionist 
		case 300 : $spell = "Astral Spell"; break; // LEVEL 7 Illusionist 
		case 301 : $spell = "Prismatic Spray"; break; // LEVEL 7 Illusionist 
		case 302 : $spell = "Prismatic Wall"; break; // LEVEL 7 Illusionist 
		case 303 : $spell = "Vision"; break; // LEVEL 7 Illusionist -------------------------
		case 304 : $spell = "Alarm"; break; // LEVEL 1 Magic-User UA
		case 305 : $spell = "Armor"; break; // LEVEL 1 Magic-User UA
		case 306 : $spell = "Firewater"; break; // LEVEL 1 Magic-User UA
		case 307 : $spell = "Grease"; break; // LEVEL 1 Magic-User UA
		case 308 : $spell = "Melt"; break; // LEVEL 1 Magic-User UA
		case 309 : $spell = "Mount"; break; // LEVEL 1 Magic-User UA
		case 310 : $spell = "Precipitation"; break; // LEVEL 1 Magic-User UA
		case 311 : $spell = "Run"; break; // LEVEL 1 Magic-User UA
		case 312 : $spell = "Taunt"; break; // LEVEL 1 Magic-User UA
		case 313 : $spell = "Wizard Mark"; break; // LEVEL 1 Magic-User UA
		case 314 : $spell = "Affect Normal Fires"; break; // LEVEL 1 Magic-User 
		case 315 : $spell = "Burning Hands"; break; // LEVEL 1 Magic-User 
		case 316 : $spell = "Charm Person"; break; // LEVEL 1 Magic-User 
		case 317 : $spell = "Comprehend Languages"; break; // LEVEL 1 Magic-User 
		case 318 : $spell = "Dancing Lights"; break; // LEVEL 1 Magic-User 
		case 319 : $spell = "Detect Magic"; break; // LEVEL 1 Magic-User 
		case 320 : $spell = "Enlarge"; break; // LEVEL 1 Magic-User 
		case 321 : $spell = "Erase"; break; // LEVEL 1 Magic-User 
		case 322 : $spell = "Feather Fall"; break; // LEVEL 1 Magic-User 
		case 323 : $spell = "Find Familiar"; break; // LEVEL 1 Magic-User 
		case 324 : $spell = "Friends"; break; // LEVEL 1 Magic-User 
		case 325 : $spell = "Hold Portal"; break; // LEVEL 1 Magic-User 
		case 326 : $spell = "Identify"; break; // LEVEL 1 Magic-User 
		case 327 : $spell = "Jump"; break; // LEVEL 1 Magic-User 
		case 328 : $spell = "Light"; break; // LEVEL 1 Magic-User 
		case 329 : $spell = "Magic Missile"; break; // LEVEL 1 Magic-User 
		case 330 : $spell = "Mending"; break; // LEVEL 1 Magic-User 
		case 331 : $spell = "Message"; break; // LEVEL 1 Magic-User 
		case 332 : $spell = "Nystul`s Magic Aura"; break; // LEVEL 1 Magic-User 
		case 333 : $spell = "Protection From Evil"; break; // LEVEL 1 Magic-User 
		case 334 : $spell = "Push"; break; // LEVEL 1 Magic-User 
		case 335 : $spell = "Read Magic"; break; // LEVEL 1 Magic-User 
		case 336 : $spell = "Shield"; break; // LEVEL 1 Magic-User 
		case 337 : $spell = "Shocking Grasp"; break; // LEVEL 1 Magic-User 
		case 338 : $spell = "Sleep"; break; // LEVEL 1 Magic-User 
		case 339 : $spell = "Spider Climb"; break; // LEVEL 1 Magic-User 
		case 340 : $spell = "Tenser`s Floating Disc"; break; // LEVEL 1 Magic-User 
		case 341 : $spell = "Unseen Servant"; break; // LEVEL 1 Magic-User 
		case 342 : $spell = "Ventriloquism"; break; // LEVEL 1 Magic-User 
		case 343 : $spell = "Write"; break; // LEVEL 1 Magic-User -------------------------
		case 344 : $spell = "Bind"; break; // LEVEL 2 Magic-User UA
		case 345 : $spell = "Deeppockets"; break; // LEVEL 2 Magic-User UA
		case 346 : $spell = "Flaming Sphere"; break; // LEVEL 2 Magic-User UA
		case 347 : $spell = "Irritation"; break; // LEVEL 2 Magic-User UA
		case 348 : $spell = "Know Alignment"; break; // LEVEL 2 Magic-User UA
		case 349 : $spell = "Melf`s Acid Arrow"; break; // LEVEL 2 Magic-User UA
		case 350 : $spell = "Preserve"; break; // LEVEL 2 Magic-User UA
		case 351 : $spell = "Protection From Cantrips"; break; // LEVEL 2 Magic-User UA
		case 352 : $spell = "Tasha`s Uncontrollable Hideous Laughter"; break; // LEVEL 2 Magic-User UA
		case 353 : $spell = "Vocalize"; break; // LEVEL 2 Magic-User UA
		case 354 : $spell = "Whip"; break; // LEVEL 2 Magic-User UA
		case 355 : $spell = "Zephyr"; break; // LEVEL 2 Magic-User UA
		case 356 : $spell = "Audible Glamour"; break; // LEVEL 2 Magic-User 
		case 357 : $spell = "Continual Light"; break; // LEVEL 2 Magic-User 
		case 358 : $spell = "Darkness 15` Radius"; break; // LEVEL 2 Magic-User 
		case 359 : $spell = "Detect Evil"; break; // LEVEL 2 Magic-User 
		case 360 : $spell = "Detect Invisibility"; break; // LEVEL 2 Magic-User 
		case 361 : $spell = "ESP"; break; // LEVEL 2 Magic-User 
		case 362 : $spell = "Fools Gold"; break; // LEVEL 2 Magic-User 
		case 363 : $spell = "Forget"; break; // LEVEL 2 Magic-User 
		case 364 : $spell = "Invisibility"; break; // LEVEL 2 Magic-User 
		case 365 : $spell = "Knock"; break; // LEVEL 2 Magic-User 
		case 366 : $spell = "Leomund`s Trap"; break; // LEVEL 2 Magic-User 
		case 367 : $spell = "Levitate"; break; // LEVEL 2 Magic-User 
		case 368 : $spell = "Locate Object"; break; // LEVEL 2 Magic-User 
		case 369 : $spell = "Magic Mouth"; break; // LEVEL 2 Magic-User 
		case 370 : $spell = "Mirror Image"; break; // LEVEL 2 Magic-User 
		case 371 : $spell = "Pyrotechnics"; break; // LEVEL 2 Magic-User 
		case 372 : $spell = "Ray Of Enfeeblement"; break; // LEVEL 2 Magic-User 
		case 373 : $spell = "Rope Trick"; break; // LEVEL 2 Magic-User 
		case 374 : $spell = "Scare"; break; // LEVEL 2 Magic-User 
		case 375 : $spell = "Shatter"; break; // LEVEL 2 Magic-User 
		case 376 : $spell = "Stinking Cloud"; break; // LEVEL 2 Magic-User 
		case 377 : $spell = "Strength"; break; // LEVEL 2 Magic-User 
		case 378 : $spell = "Web"; break; // LEVEL 2 Magic-User 
		case 379 : $spell = "Wizard Lock"; break; // LEVEL 2 Magic-User -------------------------
		case 380 : $spell = "Cloudburst"; break; // LEVEL 3 Magic-User UA
		case 381 : $spell = "Detect Illusion"; break; // LEVEL 3 Magic-User UA
		case 382 : $spell = "Item"; break; // LEVEL 3 Magic-User UA
		case 383 : $spell = "Material"; break; // LEVEL 3 Magic-User UA
		case 384 : $spell = "Melf`s Minute Meteor"; break; // LEVEL 3 Magic-User UA
		case 385 : $spell = "Secret Page"; break; // LEVEL 3 Magic-User UA
		case 386 : $spell = "Sepia Snake Sigil"; break; // LEVEL 3 Magic-User UA
		case 387 : $spell = "Wind Wall"; break; // LEVEL 3 Magic-User UA
		case 388 : $spell = "Blink"; break; // LEVEL 3 Magic-User 
		case 389 : $spell = "Clairaudience"; break; // LEVEL 3 Magic-User 
		case 390 : $spell = "Clairvoyance"; break; // LEVEL 3 Magic-User 
		case 391 : $spell = "Dispel Magic"; break; // LEVEL 3 Magic-User 
		case 392 : $spell = "Explosive Runes"; break; // LEVEL 3 Magic-User 
		case 393 : $spell = "Feign Death"; break; // LEVEL 3 Magic-User 
		case 394 : $spell = "Fireball"; break; // LEVEL 3 Magic-User 
		case 395 : $spell = "Flame Arrow"; break; // LEVEL 3 Magic-User 
		case 396 : $spell = "Fly"; break; // LEVEL 3 Magic-User 
		case 397 : $spell = "Gust Of Wind"; break; // LEVEL 3 Magic-User 
		case 398 : $spell = "Haste"; break; // LEVEL 3 Magic-User 
		case 399 : $spell = "Hold Person"; break; // LEVEL 3 Magic-User 
		case 400 : $spell = "Infravision"; break; // LEVEL 3 Magic-User 
		case 401 : $spell = "Invisibility 10` Radius"; break; // LEVEL 3 Magic-User 
		case 402 : $spell = "Leomund`s Tiny Hut"; break; // LEVEL 3 Magic-User 
		case 403 : $spell = "Lightning Bolt"; break; // LEVEL 3 Magic-User 
		case 404 : $spell = "Monster Summoning I"; break; // LEVEL 3 Magic-User 
		case 405 : $spell = "Phantasmal Force"; break; // LEVEL 3 Magic-User 
		case 406 : $spell = "Protection From Evil 10` Radius"; break; // LEVEL 3 Magic-User 
		case 407 : $spell = "Protection From Normal Missiles"; break; // LEVEL 3 Magic-User 
		case 408 : $spell = "Slow"; break; // LEVEL 3 Magic-User 
		case 409 : $spell = "Suggestion"; break; // LEVEL 3 Magic-User 
		case 410 : $spell = "Tongues"; break; // LEVEL 3 Magic-User 
		case 411 : $spell = "Water Breathing"; break; // LEVEL 3 Magic-User -------------------------
		case 412 : $spell = "Dispel Illusion"; break; // LEVEL 4 Magic-User UA
		case 413 : $spell = "Evard`s Black Tentacles"; break; // LEVEL 4 Magic-User UA
		case 414 : $spell = "Leomund`s Secure Shelter"; break; // LEVEL 4 Magic-User UA
		case 415 : $spell = "Magic Mirror"; break; // LEVEL 4 Magic-User UA
		case 416 : $spell = "Otiluke`s Resilient Sphere"; break; // LEVEL 4 Magic-User UA
		case 417 : $spell = "Shout"; break; // LEVEL 4 Magic-User UA
		case 418 : $spell = "Ultravision"; break; // LEVEL 4 Magic-User UA
		case 419 : $spell = "Charm Monster"; break; // LEVEL 4 Magic-User 
		case 420 : $spell = "Confusion"; break; // LEVEL 4 Magic-User 
		case 421 : $spell = "Dig"; break; // LEVEL 4 Magic-User 
		case 422 : $spell = "Dimension Door"; break; // LEVEL 4 Magic-User 
		case 423 : $spell = "Enchanted Weapon"; break; // LEVEL 4 Magic-User 
		case 424 : $spell = "Extension I"; break; // LEVEL 4 Magic-User 
		case 425 : $spell = "Fear"; break; // LEVEL 4 Magic-User 
		case 426 : $spell = "Fire Charm"; break; // LEVEL 4 Magic-User 
		case 427 : $spell = "Fire Shield"; break; // LEVEL 4 Magic-User 
		case 428 : $spell = "Fire Trap"; break; // LEVEL 4 Magic-User 
		case 429 : $spell = "Fumble"; break; // LEVEL 4 Magic-User 
		case 430 : $spell = "Hallucinatory Terrain"; break; // LEVEL 4 Magic-User 
		case 431 : $spell = "Ice Storm"; break; // LEVEL 4 Magic-User 
		case 432 : $spell = "Massmorph"; break; // LEVEL 4 Magic-User 
		case 433 : $spell = "Minor Globe Of Invulnerability"; break; // LEVEL 4 Magic-User 
		case 434 : $spell = "Monster Summoning II"; break; // LEVEL 4 Magic-User 
		case 435 : $spell = "Plant Growth"; break; // LEVEL 4 Magic-User 
		case 436 : $spell = "Polymorph Other"; break; // LEVEL 4 Magic-User 
		case 437 : $spell = "Polymorph Self"; break; // LEVEL 4 Magic-User 
		case 438 : $spell = "Rary`s Mnemonic Enhancer"; break; // LEVEL 4 Magic-User 
		case 439 : $spell = "Remove Curse"; break; // LEVEL 4 Magic-User 
		case 440 : $spell = "Wall Of Fire"; break; // LEVEL 4 Magic-User 
		case 441 : $spell = "Wall Of Ice"; break; // LEVEL 4 Magic-User 
		case 442 : $spell = "Wizard Eye"; break; // LEVEL 4 Magic-User -------------------------
		case 443 : $spell = "Avoidance"; break; // LEVEL 5 Magic-User UA
		case 444 : $spell = "Dismissal"; break; // LEVEL 5 Magic-User UA
		case 445 : $spell = "Dolor"; break; // LEVEL 5 Magic-User UA
		case 446 : $spell = "Fabricate"; break; // LEVEL 5 Magic-User UA
		case 447 : $spell = "Leomund`s Lamentable Belabourment"; break; // LEVEL 5 Magic-User UA
		case 448 : $spell = "Sending"; break; // LEVEL 5 Magic-User UA
		case 449 : $spell = "Airy Water"; break; // LEVEL 5 Magic-User 
		case 450 : $spell = "Animal Growth"; break; // LEVEL 5 Magic-User 
		case 451 : $spell = "Animate Dead"; break; // LEVEL 5 Magic-User 
		case 452 : $spell = "Bigby`s Interposing Hand"; break; // LEVEL 5 Magic-User 
		case 453 : $spell = "Cloudkill"; break; // LEVEL 5 Magic-User 
		case 454 : $spell = "Conjure Elemental"; break; // LEVEL 5 Magic-User 
		case 455 : $spell = "Cone Of Cold"; break; // LEVEL 5 Magic-User 
		case 456 : $spell = "Contact Other Plane"; break; // LEVEL 5 Magic-User 
		case 457 : $spell = "Distance Distortion"; break; // LEVEL 5 Magic-User 
		case 458 : $spell = "Extension II"; break; // LEVEL 5 Magic-User 
		case 459 : $spell = "Feeblemind"; break; // LEVEL 5 Magic-User 
		case 460 : $spell = "Hold Monster"; break; // LEVEL 5 Magic-User 
		case 461 : $spell = "Leomund`s Secret Chest"; break; // LEVEL 5 Magic-User 
		case 462 : $spell = "Magic Jar"; break; // LEVEL 5 Magic-User 
		case 463 : $spell = "Monster Summoning III"; break; // LEVEL 5 Magic-User 
		case 464 : $spell = "Mordenkainen`s Faithful Hound"; break; // LEVEL 5 Magic-User 
		case 465 : $spell = "Passwall"; break; // LEVEL 5 Magic-User 
		case 466 : $spell = "Stone Shape"; break; // LEVEL 5 Magic-User 
		case 467 : $spell = "Telekinesis"; break; // LEVEL 5 Magic-User 
		case 468 : $spell = "Teleport"; break; // LEVEL 5 Magic-User 
		case 469 : $spell = "Transmute Rock To Mud"; break; // LEVEL 5 Magic-User 
		case 470 : $spell = "Wall Of Force"; break; // LEVEL 5 Magic-User 
		case 471 : $spell = "Wall Of Iron"; break; // LEVEL 5 Magic-User 
		case 472 : $spell = "Wall Of Stone"; break; // LEVEL 5 Magic-User -------------------------
		case 473 : $spell = "Chain Lightning"; break; // LEVEL 6 Magic-User UA
		case 474 : $spell = "Contingency"; break; // LEVEL 6 Magic-User UA
		case 475 : $spell = "Ensnarement"; break; // LEVEL 6 Magic-User UA
		case 476 : $spell = "Eyebite"; break; // LEVEL 6 Magic-User UA
		case 477 : $spell = "Mordenkainen`s Lucubration"; break; // LEVEL 6 Magic-User UA
		case 478 : $spell = "Transmute Water To Dust"; break; // LEVEL 6 Magic-User UA
		case 479 : $spell = "Anti-Magic Shell"; break; // LEVEL 6 Magic-User 
		case 480 : $spell = "Bigby`s Forceful Hand"; break; // LEVEL 6 Magic-User 
		case 481 : $spell = "Control Weather"; break; // LEVEL 6 Magic-User 
		case 482 : $spell = "Death Spell"; break; // LEVEL 6 Magic-User 
		case 483 : $spell = "Disintegrate"; break; // LEVEL 6 Magic-User 
		case 484 : $spell = "Enchant An Item"; break; // LEVEL 6 Magic-User 
		case 485 : $spell = "Extension III"; break; // LEVEL 6 Magic-User 
		case 486 : $spell = "Geas"; break; // LEVEL 6 Magic-User 
		case 487 : $spell = "Glassee"; break; // LEVEL 6 Magic-User 
		case 488 : $spell = "Globe Of Invulnerability"; break; // LEVEL 6 Magic-User 
		case 489 : $spell = "Guards And Wards"; break; // LEVEL 6 Magic-User 
		case 490 : $spell = "Invisible Stalker"; break; // LEVEL 6 Magic-User 
		case 491 : $spell = "Legend Lore"; break; // LEVEL 6 Magic-User 
		case 492 : $spell = "Lower Water"; break; // LEVEL 6 Magic-User 
		case 493 : $spell = "Monster Summoning IV"; break; // LEVEL 6 Magic-User 
		case 494 : $spell = "Move Earth"; break; // LEVEL 6 Magic-User 
		case 495 : $spell = "Otiluke`s Freezing Sphere"; break; // LEVEL 6 Magic-User 
		case 496 : $spell = "Part Water"; break; // LEVEL 6 Magic-User 
		case 497 : $spell = "Project Image"; break; // LEVEL 6 Magic-User 
		case 498 : $spell = "Reincarnation"; break; // LEVEL 6 Magic-User 
		case 499 : $spell = "Repulsion"; break; // LEVEL 6 Magic-User 
		case 500 : $spell = "Spiritwrack"; break; // LEVEL 6 Magic-User 
		case 501 : $spell = "Stone To Flesh"; break; // LEVEL 6 Magic-User 
		case 502 : $spell = "Tenser`s Transformation"; break; // LEVEL 6 Magic-User -------------------------
		case 503 : $spell = "Banishment"; break; // LEVEL 7 Magic-User UA
		case 504 : $spell = "Forcecage"; break; // LEVEL 7 Magic-User UA
		case 505 : $spell = "Mordenkainen`s Magnificient Mansion"; break; // LEVEL 7 Magic-User UA
		case 506 : $spell = "Sequester"; break; // LEVEL 7 Magic-User UA
		case 507 : $spell = "fsd"; break; // LEVEL 7 Magic-User UA
		case 508 : $spell = "Torment"; break; // LEVEL 7 Magic-User UA
		case 509 : $spell = "Truename"; break; // LEVEL 7 Magic-User UA
		case 510 : $spell = "Volley"; break; // LEVEL 7 Magic-User UA
		case 511 : $spell = "Bigby`s Grasping Hand"; break; // LEVEL 7 Magic-User 
		case 512 : $spell = "Cacodemon"; break; // LEVEL 7 Magic-User 
		case 513 : $spell = "Charm Plants"; break; // LEVEL 7 Magic-User 
		case 514 : $spell = "Delayed Blast Fireball"; break; // LEVEL 7 Magic-User 
		case 515 : $spell = "Drawmij`s Instant Summons"; break; // LEVEL 7 Magic-User 
		case 516 : $spell = "Duo-Dimension"; break; // LEVEL 7 Magic-User 
		case 517 : $spell = "Limited Wish"; break; // LEVEL 7 Magic-User 
		case 518 : $spell = "Mass Invisibility"; break; // LEVEL 7 Magic-User 
		case 519 : $spell = "Monster Summoning V"; break; // LEVEL 7 Magic-User 
		case 520 : $spell = "Mordenkainen`s Sword"; break; // LEVEL 7 Magic-User 
		case 521 : $spell = "Phase Door"; break; // LEVEL 7 Magic-User 
		case 522 : $spell = "Power Word Stun"; break; // LEVEL 7 Magic-User 
		case 523 : $spell = "Reverse Gravity"; break; // LEVEL 7 Magic-User 
		case 524 : $spell = "Simulacrum"; break; // LEVEL 7 Magic-User 
		case 525 : $spell = "Statue"; break; // LEVEL 7 Magic-User 
		case 526 : $spell = "Vanish"; break; // LEVEL 7 Magic-User -------------------------
		case 527 : $spell = "Binding"; break; // LEVEL 8 Magic-User UA
		case 528 : $spell = "Demand"; break; // LEVEL 8 Magic-User UA
		case 529 : $spell = "Otiluke`s Telekinetic Sphere"; break; // LEVEL 8 Magic-User UA
		case 530 : $spell = "Sink"; break; // LEVEL 8 Magic-User UA
		case 531 : $spell = "Antipathy/Sympathy"; break; // LEVEL 8 Magic-User 
		case 532 : $spell = "Bigby`s Clenched Fist"; break; // LEVEL 8 Magic-User 
		case 533 : $spell = "Clone"; break; // LEVEL 8 Magic-User 
		case 534 : $spell = "Glassteel"; break; // LEVEL 8 Magic-User 
		case 535 : $spell = "Incendiary Cloud"; break; // LEVEL 8 Magic-User 
		case 536 : $spell = "Mass Charm"; break; // LEVEL 8 Magic-User 
		case 537 : $spell = "Maze"; break; // LEVEL 8 Magic-User 
		case 538 : $spell = "Mind Blank"; break; // LEVEL 8 Magic-User 
		case 539 : $spell = "Monster Summoning VI"; break; // LEVEL 8 Magic-User 
		case 540 : $spell = "Otto`s Irresistible Dance"; break; // LEVEL 8 Magic-User 
		case 541 : $spell = "Permanency"; break; // LEVEL 8 Magic-User 
		case 542 : $spell = "Polymorph Any Object"; break; // LEVEL 8 Magic-User 
		case 543 : $spell = "Power Word Blind"; break; // LEVEL 8 Magic-User 
		case 544 : $spell = "Serten`s Spell Immunity"; break; // LEVEL 8 Magic-User 
		case 545 : $spell = "Symbol"; break; // LEVEL 8 Magic-User 
		case 546 : $spell = "Trap The Soul"; break; // LEVEL 8 Magic-User -------------------------
		case 547 : $spell = "Crystalbrittle"; break; // LEVEL 9 Magic-User UA
		case 548 : $spell = "Energy Drain"; break; // LEVEL 9 Magic-User UA
		case 549 : $spell = "Mordenkainen`s Disjunction"; break; // LEVEL 9 Magic-User UA
		case 550 : $spell = "Succor"; break; // LEVEL 9 Magic-User UA
		case 551 : $spell = "Astral Spell"; break; // LEVEL 9 Magic-User 
		case 552 : $spell = "Bigby`s Crushing Hand"; break; // LEVEL 9 Magic-User 
		case 553 : $spell = "Gate"; break; // LEVEL 9 Magic-User 
		case 554 : $spell = "Imprisonment"; break; // LEVEL 9 Magic-User 
		case 555 : $spell = "Meteor Swarm"; break; // LEVEL 9 Magic-User 
		case 556 : $spell = "Monster Summoning VII"; break; // LEVEL 9 Magic-User 
		case 557 : $spell = "Power Word Kill"; break; // LEVEL 9 Magic-User 
		case 558 : $spell = "Prismatic Sphere"; break; // LEVEL 9 Magic-User 
		case 559 : $spell = "Shape Change"; break; // LEVEL 9 Magic-User 
		case 560 : $spell = "Temporal Stasis"; break; // LEVEL 9 Magic-User 
		case 561 : $spell = "Time Stop"; break; // LEVEL 9 Magic-User 
		case 562 : $spell = "Wish"; break; // LEVEL 9 Magic-User 
	}
}
else if ($game == "BD&D")
{
	if (($magic == "cleric") && ($level == 1)){ $item = mt_rand(1,8); }
	else if (($magic == "cleric") && ($level == 2)){ $item = mt_rand(9,16); }
	else if (($magic == "cleric") && ($level == 3)){ $item = mt_rand(17,22); }
	else if (($magic == "cleric") && ($level == 4)){ $item = mt_rand(23,28); }
	else if (($magic == "cleric") && ($level == 5)){ $item = mt_rand(29,34); }
	else if (($magic == "mage") && ($level == 1)){ $item = mt_rand(35,46); }
	else if (($magic == "mage") && ($level == 2)){ $item = mt_rand(47,58); }
	else if (($magic == "mage") && ($level == 3)){ $item = mt_rand(59,70); }
	else if (($magic == "mage") && ($level == 4)){ $item = mt_rand(71,82); }
	else if (($magic == "mage") && ($level == 5)){ $item = mt_rand(83,94); }
	else { $item = mt_rand(95,106); }
	switch ($item)
	{
		case 1 : $spell = "Cure Light Wounds"; break; // Cleric 1
		case 2 : $spell = "Detect Evil"; break; // Cleric 1
		case 3 : $spell = "Detect Magic"; break; // Cleric 1
		case 4 : $spell = "Light"; break; // Cleric 1
		case 5 : $spell = "Protection from Evil"; break; // Cleric 1
		case 6 : $spell = "Purify Food and Water"; break; // Cleric 1
		case 7 : $spell = "Remove Fear"; break; // Cleric 1
		case 8 : $spell = "Resist Cold"; break; // Cleric 1
		case 9 : $spell = "Bless"; break; // Cleric 2
		case 10 : $spell = "Hold Person"; break; // Cleric 2
		case 11 : $spell = "Silence 15` Radius"; break; // Cleric 2
		case 12 : $spell = "Find Traps"; break; // Cleric 2
		case 13 : $spell = "Know Alignment"; break; // Cleric 2
		case 14 : $spell = "Resist Fire"; break; // Cleric 2
		case 15 : $spell = "Snake Charm"; break; // Cleric 2
		case 16 : $spell = "Speak with Animals"; break; // Cleric 2
		case 17 : $spell = "Continual Light"; break; // Cleric 3
		case 18 : $spell = "Cure Disease"; break; // Cleric 3
		case 19 : $spell = "Growth of Animals"; break; // Cleric 3
		case 20 : $spell = "Locate Object"; break; // Cleric 3
		case 21 : $spell = "Remove Curse"; break; // Cleric 3
		case 22 : $spell = "Striking"; break; // Cleric 3
		case 23 : $spell = "Create Water"; break; // Cleric 4
		case 24 : $spell = "Cure Serious Wounds"; break; // Cleric 4
		case 25 : $spell = "Neutralize Poison"; break; // Cleric 4
		case 26 : $spell = "Protection from Evil 10` Radius"; break; // Cleric 4
		case 27 : $spell = "Speak with Plants"; break; // Cleric 4
		case 28 : $spell = "Sticks to Snakes"; break; // Cleric 4
		case 29 : $spell = "Commune"; break; // Cleric 5
		case 30 : $spell = "Create Food"; break; // Cleric 5
		case 31 : $spell = "Dispel Evil"; break; // Cleric 5
		case 32 : $spell = "Insect Plague"; break; // Cleric 5
		case 33 : $spell = "Quest"; break; // Cleric 5
		case 34 : $spell = "Raise Dead"; break; // Cleric 5
		case 35 : $spell = "Charm Person"; break; // Mage 1
		case 36 : $spell = "Detect Magic"; break; // Mage 1
		case 37 : $spell = "Floating Disc"; break; // Mage 1
		case 38 : $spell = "Hold Portal"; break; // Mage 1
		case 39 : $spell = "Light"; break; // Mage 1
		case 40 : $spell = "Magic Missile"; break; // Mage 1
		case 41 : $spell = "Protection from Evil"; break; // Mage 1
		case 42 : $spell = "Read Languages"; break; // Mage 1
		case 43 : $spell = "Read Magic"; break; // Mage 1
		case 44 : $spell = "Shield"; break; // Mage 1
		case 45 : $spell = "Sleep"; break; // Mage 1
		case 46 : $spell = "Ventriloquism"; break; // Mage 1
		case 47 : $spell = "Continual Light"; break; // Mage 2
		case 48 : $spell = "Detect Evil"; break; // Mage 2
		case 49 : $spell = "Detect Invisible"; break; // Mage 2
		case 50 : $spell = "ESP"; break; // Mage 2
		case 51 : $spell = "Invisibility"; break; // Mage 2
		case 52 : $spell = "Knock"; break; // Mage 2
		case 53 : $spell = "Levitate"; break; // Mage 2
		case 54 : $spell = "Locate Object"; break; // Mage 2
		case 55 : $spell = "Mirror Image"; break; // Mage 2
		case 56 : $spell = "Phantasmal Force"; break; // Mage 2
		case 57 : $spell = "Web"; break; // Mage 2
		case 58 : $spell = "Wizard Lock"; break; // Mage 2
		case 59 : $spell = "Dispel Magic"; break; // Mage 3
		case 60 : $spell = "Fire Ball"; break; // Mage 3
		case 61 : $spell = "Fly"; break; // Mage 3
		case 62 : $spell = "Clairvoyance"; break; // Mage 3
		case 63 : $spell = "Haste"; break; // Mage 3
		case 64 : $spell = "Hold Person"; break; // Mage 3
		case 65 : $spell = "Infravision"; break; // Mage 3
		case 66 : $spell = "Invisibility 10` Radius"; break; // Mage 3
		case 67 : $spell = "Lightning Bolt"; break; // Mage 3
		case 68 : $spell = "Protection from Evil 10` Radius"; break; // Mage 3
		case 69 : $spell = "Protection from Normal Missiles"; break; // Mage 3
		case 70 : $spell = "Water Breathing"; break; // Mage 3
		case 71 : $spell = "Charm Monster"; break; // Mage 4
		case 72 : $spell = "Confusion"; break; // Mage 4
		case 73 : $spell = "Dimension Door"; break; // Mage 4
		case 74 : $spell = "Growth of Plants"; break; // Mage 4
		case 75 : $spell = "Hallucinatory Terrain"; break; // Mage 4
		case 76 : $spell = "Massmorph"; break; // Mage 4
		case 77 : $spell = "Polymorph Others"; break; // Mage 4
		case 78 : $spell = "Polymorph Self"; break; // Mage 4
		case 79 : $spell = "Remove Curse"; break; // Mage 4
		case 80 : $spell = "Wall of Fire"; break; // Mage 4
		case 81 : $spell = "Wall of Ice"; break; // Mage 4
		case 82 : $spell = "Wizard Eye"; break; // Mage 4
		case 83 : $spell = "Animate Dead"; break; // Mage 5
		case 84 : $spell = "Cloudkill"; break; // Mage 5
		case 85 : $spell = "Conjure Elemental"; break; // Mage 5
		case 86 : $spell = "Contact Higher Plane"; break; // Mage 5
		case 87 : $spell = "Feeblemind"; break; // Mage 5
		case 88 : $spell = "Hold Monster"; break; // Mage 5
		case 89 : $spell = "Magic Jar"; break; // Mage 5
		case 90 : $spell = "Pass-Wall"; break; // Mage 5
		case 91 : $spell = "Telekinesis"; break; // Mage 5
		case 92 : $spell = "Teleport"; break; // Mage 5
		case 93 : $spell = "Transmute Rock to Mud"; break; // Mage 5
		case 94 : $spell = "Wall of Stone"; break; // Mage 5
		case 95 : $spell = "Anti-Magic Shell"; break; // Mage 6
		case 96 : $spell = "Control Weather"; break; // Mage 6
		case 97 : $spell = "Death Spell"; break; // Mage 6
		case 98 : $spell = "Disintegrate"; break; // Mage 6
		case 99 : $spell = "Geas"; break; // Mage 6
		case 100 : $spell = "Invisible Stalker"; break; // Mage 6
		case 101 : $spell = "Lower Water"; break; // Mage 6
		case 102 : $spell = "Move Earth"; break; // Mage 6
		case 103 : $spell = "Part Water"; break; // Mage 6
		case 104 : $spell = "Projected Image"; break; // Mage 6
		case 105 : $spell = "Reincarnation"; break; // Mage 6
		case 106 : $spell = "Stone to Flesh"; break; // Mage 6
	}
}
else if ($game == "Swords & Wizardry")
{
	if (($magic == "cleric") && ($level == 1)){ switch (mt_rand(0,5)){
		case 0: $spell = "Cure Light Wounds"; break;
		case 1: $spell = "Detect Evil"; break;
		case 2: $spell = "Detect Magic"; break;
		case 3: $spell = "Light"; break;
		case 4: $spell = "Protection from Evil"; break;
		case 5: $spell = "Purify Food and Drink"; break;
	}} else if (($magic == "cleric") && ($level == 2)){ switch (mt_rand(0,5)){
		case 0: $spell = "Bless"; break;
		case 1: $spell = "Find Traps"; break;
		case 2: $spell = "Hold Person"; break;
		case 3: $spell = "Silence, 15-foot Radius"; break;
		case 4: $spell = "Snake Charm"; break;
		case 5: $spell = "Speak with Animals"; break;
	}} else if (($magic == "cleric") && ($level == 3)){ switch (mt_rand(0,5)){
		case 0: $spell = "Continual Light"; break;
		case 1: $spell = "Cure Disease"; break;
		case 2: $spell = "Locate Object"; break;
		case 3: $spell = "Prayer"; break;
		case 4: $spell = "Remove Curse"; break;
		case 5: $spell = "Speak with Dead"; break;
	}} else if (($magic == "cleric") && ($level == 4)){ switch (mt_rand(0,5)){
		case 0: $spell = "Create Water"; break;
		case 1: $spell = "Cure Serious Wounds"; break;
		case 2: $spell = "Neutralize Poison"; break;
		case 3: $spell = "Protection from Evil, 10-ft Radius"; break;
		case 4: $spell = "Speak with Plants"; break;
		case 5: $spell = "Sticks to Snakes"; break;
	}} else if (($magic == "cleric") && ($level == 5)){ switch (mt_rand(0,6)){
		case 0: $spell = "Commune"; break;
		case 1: $spell = "Create Food"; break;
		case 2: $spell = "Dispel Evil"; break;
		case 3: $spell = "Finger of Death"; break;
		case 4: $spell = "Insect Plague"; break;
		case 5: $spell = "Quest"; break;
		case 6: $spell = "Raise Dead"; break;
	}} else if (($magic == "cleric") && ($level == 6)){ switch (mt_rand(0,5)){
		case 0: $spell = "Animate Object"; break;
		case 1: $spell = "Blade Barrier"; break;
		case 2: $spell = "Conjuration of Animals"; break;
		case 3: $spell = "Find the Path"; break;
		case 4: $spell = "Speak with Monsters"; break;
		case 5: $spell = "Word of Recall"; break;
	}} else if (($magic == "cleric") && ($level == 7)){ switch (mt_rand(0,9)){
		case 0: $spell = "Aerial Servant"; break;
		case 1: $spell = "Astral Spell"; break;
		case 2: $spell = "Control Weather"; break;
		case 3: $spell = "Earthquake"; break;
		case 4: $spell = "Holy Word"; break;
		case 5: $spell = "Part Water"; break;
		case 6: $spell = "Restoration"; break;
		case 7: $spell = "Resurrection"; break;
		case 8: $spell = "Symbol"; break;
		case 9: $spell = "Wind Walk"; break;
	}} else if (($magic == "mage") && ($level == 1)){ switch (mt_rand(0,9)){
		case 0: $spell = "Charm Person"; break;
		case 1: $spell = "Detect Magic"; break;
		case 2: $spell = "Hold Portal"; break;
		case 3: $spell = "Light"; break;
		case 4: $spell = "Magic Missile"; break;
		case 5: $spell = "Protection from Evil"; break;
		case 6: $spell = "Read Languages"; break;
		case 7: $spell = "Read Magic"; break;
		case 8: $spell = "Shield"; break;
		case 9: $spell = "Sleep"; break;
	}} else if (($magic == "mage") && ($level == 2)){ switch (mt_rand(0,15)){
		case 0: $spell = "Continual Light"; break;
		case 1: $spell = "Darkness, 15-foot Radius"; break;
		case 2: $spell = "Detect Evil"; break;
		case 3: $spell = "Detect Invisibility"; break;
		case 4: $spell = "ESP"; break;
		case 5: $spell = "Invisibility"; break;
		case 6: $spell = "Knock"; break;
		case 7: $spell = "Levitate"; break;
		case 8: $spell = "Locate Object"; break;
		case 9: $spell = "Magic Mouth"; break;
		case 10: $spell = "Mirror Image"; break;
		case 11: $spell = "Phantasmal Force"; break;
		case 12: $spell = "Pyrotechnics"; break;
		case 13: $spell = "Strength"; break;
		case 14: $spell = "Web"; break;
		case 15: $spell = "Wizard Lock"; break;
	}} else if (($magic == "mage") && ($level == 3)){ switch (mt_rand(0,17)){
		case 0: $spell = "Clairaudience"; break;
		case 1: $spell = "Clairvoyance"; break;
		case 2: $spell = "Darkvision"; break;
		case 3: $spell = "Dispel Magic"; break;
		case 4: $spell = "Explosive Runes"; break;
		case 5: $spell = "Fireball"; break;
		case 6: $spell = "Fly"; break;
		case 7: $spell = "Haste"; break;
		case 8: $spell = "Hold Person"; break;
		case 9: $spell = "Invisibility, 10-foot Radius"; break;
		case 10: $spell = "Lightning Bolt"; break;
		case 11: $spell = "Monster Summoning I"; break;
		case 12: $spell = "Protection from Evil, 10-foot Radius"; break;
		case 13: $spell = "Protection from Normal Missiles"; break;
		case 14: $spell = "Rope Trick"; break;
		case 15: $spell = "Slow"; break;
		case 16: $spell = "Suggestion"; break;
		case 17: $spell = "Water Breathing"; break;
	}} else if (($magic == "mage") && ($level == 4)){ switch (mt_rand(0,15)){
		case 0: $spell = "Charm Monster"; break;
		case 1: $spell = "Confusion"; break;
		case 2: $spell = "Dimension Door"; break;
		case 3: $spell = "Extension I"; break;
		case 4: $spell = "Fear"; break;
		case 5: $spell = "Hallucinatory Terrain"; break;
		case 6: $spell = "Ice Storm"; break;
		case 7: $spell = "Massmorph"; break;
		case 8: $spell = "Monster Summoning II"; break;
		case 9: $spell = "Plant Growth"; break;
		case 10: $spell = "Polymorph Other"; break;
		case 11: $spell = "Polymorph Self"; break;
		case 12: $spell = "Remove Curse"; break;
		case 13: $spell = "Wall of Fire"; break;
		case 14: $spell = "Wall of Ice"; break;
		case 15: $spell = "Wizard Eye"; break;
	}} else if (($magic == "mage") && ($level == 5)){ switch (mt_rand(0,15)){
		case 0: $spell = "Animal Growth"; break;
		case 1: $spell = "Animate Dead"; break;
		case 2: $spell = "Cloudkill"; break;
		case 3: $spell = "Conjuration of Elementals"; break;
		case 4: $spell = "Contact Other Plane"; break;
		case 5: $spell = "Extension II"; break;
		case 6: $spell = "Feeblemind"; break;
		case 7: $spell = "Hold Monster"; break;
		case 8: $spell = "Magic Jar"; break;
		case 9: $spell = "Monster Summoning III"; break;
		case 10: $spell = "Passwall"; break;
		case 11: $spell = "Telekinesis"; break;
		case 12: $spell = "Teleport"; break;
		case 13: $spell = "Transmute Rock to Mud"; break;
		case 14: $spell = "Wall of Iron"; break;
		case 15: $spell = "Wall of Stone"; break;
	}} else if (($magic == "mage") && ($level == 6)){ switch (mt_rand(0,15)){
		case 0: $spell = "Anti-Magic Shell"; break;
		case 1: $spell = "Control Weather"; break;
		case 2: $spell = "Death Spell"; break;
		case 3: $spell = "Disintegrate"; break;
		case 4: $spell = "Enchant Item"; break;
		case 5: $spell = "Geas"; break;
		case 6: $spell = "Invisible Stalker"; break;
		case 7: $spell = "Legend Lore"; break;
		case 8: $spell = "Lower Water"; break;
		case 9: $spell = "Monster Summoning IV"; break;
		case 10: $spell = "Move Earth"; break;
		case 11: $spell = "Part Water"; break;
		case 12: $spell = "Project Image"; break;
		case 13: $spell = "Reincarnation"; break;
		case 14: $spell = "Repulsion"; break;
		case 15: $spell = "Stone to Flesh"; break;
	}} else if (($magic == "mage") && ($level == 7)){ switch (mt_rand(0,10)){
		case 0: $spell = "Charm Plants"; break;
		case 1: $spell = "Conjuration of Demons"; break;
		case 2: $spell = "Delayed Blast Fireball"; break;
		case 3: $spell = "Extension III"; break;
		case 4: $spell = "Limited Wish"; break;
		case 5: $spell = "Mass Invisibility"; break;
		case 6: $spell = "Monster Summoning V"; break;
		case 7: $spell = "Phase Door"; break;
		case 8: $spell = "Power Word, Stun"; break;
		case 9: $spell = "Reverse Gravity"; break;
		case 10: $spell = "Simulacrum"; break;
	}} else if (($magic == "mage") && ($level == 8)){ switch (mt_rand(0,7)){
		case 0: $spell = "Clone"; break;
		case 1: $spell = "Mass Charm"; break;
		case 2: $spell = "Mind Blank"; break;
		case 3: $spell = "Monster Summoning VI"; break;
		case 4: $spell = "Permanency"; break;
		case 5: $spell = "Polymorph Object"; break;
		case 6: $spell = "Power Word, Blind"; break;
		case 7: $spell = "Symbol"; break;
	}} else if (($magic == "mage") && ($level == 9)){ switch (mt_rand(0,9)){
		case 0: $spell = "Astral Spell"; break;
		case 1: $spell = "Maze"; break;
		case 2: $spell = "Gate"; break;
		case 3: $spell = "Meteor Swarm"; break;
		case 4: $spell = "Monster Summoning VII"; break;
		case 5: $spell = "Power Word, Kill"; break;
		case 6: $spell = "Prismatic Sphere"; break;
		case 7: $spell = "Shape Change"; break;
		case 8: $spell = "Time Stop"; break;
		case 9: $spell = "Wish "; break;
	}}
}
else if ($game == "BFRPG")
{
	if ($plevel < 6){$level = 1;}
	else if ($plevel < 9){$level = 2;}
	else if ($plevel < 12){$level = 3;}
	else if ($plevel < 15){$level = 4;}
	else if ($plevel < 18){$level = 5;}
	else {$level = 6;}

	if (($magic == "cleric") && ($level == 1)){ switch (mt_rand(0,7)){
		case 0: $spell = "Cure Light Wounds"; break;
		case 1: $spell = "Detect Evil"; break;
		case 2: $spell = "Detect Magic"; break;
		case 3: $spell = "Light"; break;
		case 4: $spell = "Protection from Evil"; break;
		case 5: $spell = "Purify Food and Drink"; break;
		case 6: $spell = "Remove Fear"; break;
		case 7: $spell = "Resist Cold"; break;
	}} else if (($magic == "cleric") && ($level == 2)){ switch (mt_rand(0,7)){
		case 0: $spell = "Bless"; break;
		case 1: $spell = "Charm Animal"; break;
		case 2: $spell = "Find Traps"; break;
		case 3: $spell = "Hold Person"; break;
		case 4: $spell = "Resist Fire"; break;
		case 5: $spell = "Speak with Animals"; break;
		case 6: $spell = "Silence 15` Radius"; break;
		case 7: $spell = "Spiritual Hammer"; break;
	}} else if (($magic == "cleric") && ($level == 3)){ switch (mt_rand(0,7)){
		case 0: $spell = "Continual Light"; break;
		case 1: $spell = "Cure Disease"; break;
		case 2: $spell = "Locate Object"; break;
		case 3: $spell = "Striking"; break;
		case 4: $spell = "Remove Curse"; break;
		case 5: $spell = "Speak with Dead"; break;
		case 6: $spell = "Growth of Animals"; break;
		case 7: $spell = "Cure Blindness"; break;
	}} else if (($magic == "cleric") && ($level == 4)){ switch (mt_rand(0,7)){
		case 0: $spell = "Animate Dead"; break;
		case 1: $spell = "Create Water"; break;
		case 2: $spell = "Cure Serious Wounds"; break;
		case 3: $spell = "Protection from Evil 10` Radius"; break;
		case 4: $spell = "Dispel Magic"; break;
		case 5: $spell = "Sticks to Snakes"; break;
		case 6: $spell = "Neutralize Poison"; break;
		case 7: $spell = "Speak with Plants"; break;
	}} else if (($magic == "cleric") && ($level == 5)){ switch (mt_rand(0,7)){
		case 0: $spell = "Commune"; break;
		case 1: $spell = "Create Food"; break;
		case 2: $spell = "Dispel Evil"; break;
		case 3: $spell = "Insect Plague"; break;
		case 4: $spell = "Raise Dead"; break;
		case 5: $spell = "Quest"; break;
		case 6: $spell = "True Seeing"; break;
		case 7: $spell = "Wall of Fire"; break;
	}} else if (($magic == "cleric") && ($level == 6)){ switch (mt_rand(0,7)){
		case 0: $spell = "Animate Object"; break;
		case 1: $spell = "Blade Barrier"; break;
		case 2: $spell = "Heal"; break;
		case 3: $spell = "Find the Path"; break;
		case 4: $spell = "Speak with Monsters"; break;
		case 5: $spell = "Word of Recall"; break;
		case 6: $spell = "Regenerate"; break;
		case 7: $spell = "Restoration"; break;
	}} else if (($magic == "mage") && ($level == 1)){ switch (mt_rand(0,11)){
		case 0: $spell = "Charm Person"; break;
		case 1: $spell = "Detect Magic"; break;
		case 2: $spell = "Floating Disc"; break;
		case 3: $spell = "Hold Portal"; break;
		case 4: $spell = "Light"; break;
		case 5: $spell = "Magic Missile"; break;
		case 6: $spell = "Magic Mouth"; break;
		case 7: $spell = "Protection from Evil"; break;
		case 8: $spell = "Read Languages"; break;
		case 9: $spell = "Shield"; break;
		case 10:$spell = "Sleep"; break;
		case 11:$spell = "Ventriloquism"; break;
	}} else if (($magic == "mage") && ($level == 2)){ switch (mt_rand(0,11)){
		case 0: $spell = "Continual Light"; break;
		case 1: $spell = "Detect Evil"; break;
		case 2: $spell = "Detect Invisible"; break;
		case 3: $spell = "ESP"; break;
		case 4: $spell = "Invisibility"; break;
		case 5: $spell = "Knock"; break;
		case 6: $spell = "Levitate"; break;
		case 7: $spell = "Locate Object"; break;
		case 8: $spell = "Mirror Image"; break;
		case 9: $spell = "Phantasmal Force"; break;
		case 10:$spell = "Web"; break;
		case 11:$spell = "Wizard Lock"; break;
	}} else if (($magic == "mage") && ($level == 3)){ switch (mt_rand(0,11)){
		case 0: $spell = "Clairvoyance"; break;
		case 1: $spell = "Darkvision"; break;
		case 2: $spell = "Dispel Magic"; break;
		case 3: $spell = "Fireball"; break;
		case 4: $spell = "Fly"; break;
		case 5: $spell = "Haste"; break;
		case 6: $spell = "Hold Person"; break;
		case 7: $spell = "Invisibility 10` Radius"; break;
		case 8: $spell = "Lightning Bolt"; break;
		case 9: $spell = "Protection from Evil 10` Radius"; break;
		case 10:$spell = "Protection from Normal Missiles"; break;
		case 11:$spell = "Water Breathing"; break;
	}} else if (($magic == "mage") && ($level == 4)){ switch (mt_rand(0,11)){
		case 0: $spell = "Charm Monster"; break;
		case 1: $spell = "Confusion"; break;
		case 2: $spell = "Dimension Door"; break;
		case 3: $spell = "Growth of Plants"; break;
		case 4: $spell = "Hallucinatory Terrain"; break;
		case 5: $spell = "Ice Storm"; break;
		case 6: $spell = "Massmorph"; break;
		case 7: $spell = "Polymorph Other"; break;
		case 8: $spell = "Polymorph Self"; break;
		case 9: $spell = "Remove Curse"; break;
		case 10:$spell = "Wall of Fire"; break;
		case 11:$spell = "Wizard Eye"; break;
	}} else if (($magic == "mage") && ($level == 5)){ switch (mt_rand(0,9)){
		case 0: $spell = "Animate Dead"; break;
		case 1: $spell = "Cloudkill"; break;
		case 2: $spell = "Conjure Elemental"; break;
		case 3: $spell = "Feeblemind"; break;
		case 4: $spell = "Hold Monster"; break;
		case 5: $spell = "Magic Jar"; break;
		case 6: $spell = "Passwall"; break;
		case 7: $spell = "Telekinesis"; break;
		case 8: $spell = "Teleport"; break;
		case 9: $spell = "Wall of Stone"; break;
	}} else if (($magic == "mage") && ($level == 6)){ switch (mt_rand(0,9)){
		case 0: $spell = "Anti-Magic Shell"; break;
		case 1: $spell = "Death Spell"; break;
		case 2: $spell = "Disintegrate"; break;
		case 3: $spell = "Flesh to Stone"; break;
		case 4: $spell = "Geas"; break;
		case 5: $spell = "Invisible Stalker"; break;
		case 6: $spell = "Lower Water"; break;
		case 7: $spell = "Projected Image"; break;
		case 8: $spell = "Reincarnate"; break;
		case 9: $spell = "Wall of Iron"; break;
	}}
}
else
{
	if (($magic == "cleric") && ($level == 1)){ switch (mt_rand(0,11)){
		case 0: $spell = "Bless"; break;
		case 1: $spell = "Command"; break;
		case 2: $spell = "Create Water"; break;
		case 3: $spell = "Cure Light Wounds"; break;
		case 4: $spell = "Detect Evil"; break;
		case 5: $spell = "Detect Magic"; break;
		case 6: $spell = "Light"; break;
		case 7: $spell = "Protection From Evil"; break;
		case 8: $spell = "Purify Food and Drink"; break;
		case 9: $spell = "Remove Fear"; break;
		case 10: $spell = "Resist Cold"; break;
		case 11: $spell = "Sanctuary"; break;
	}} else if (($magic == "cleric") && ($level == 2)){ switch (mt_rand(0,11)){
		case 0: $spell = "Augury"; break;
		case 1: $spell = "Chant"; break;
		case 2: $spell = "Detect Charm"; break;
		case 3: $spell = "Find Traps"; break;
		case 4: $spell = "Hold Person"; break;
		case 5: $spell = "Know Alignment"; break;
		case 6: $spell = "Resist Fire"; break;
		case 7: $spell = "Silence 15` Radius"; break;
		case 8: $spell = "Slow Poison"; break;
		case 9: $spell = "Snake Charm"; break;
		case 10: $spell = "Speak With Animals"; break;
		case 11: $spell = "Spiritual Weapon"; break;
	}} else if (($magic == "cleric") && ($level == 3)){ switch (mt_rand(0,11)){
		case 0: $spell = "Animate Dead"; break;
		case 1: $spell = "Continual Light"; break;
		case 2: $spell = "Create Food and Water"; break;
		case 3: $spell = "Cure Blindness"; break;
		case 4: $spell = "Cure Disease"; break;
		case 5: $spell = "Dispel Magic"; break;
		case 6: $spell = "Feign Death"; break;
		case 7: $spell = "Glyph of Warding"; break;
		case 8: $spell = "Locate Object"; break;
		case 9: $spell = "Prayer"; break;
		case 10: $spell = "Remove Curse"; break;
		case 11: $spell = "Speak with Dead"; break;
	}} else if (($magic == "cleric") && ($level == 4)){ switch (mt_rand(0,9)){
		case 0: $spell = "Cure Serious Wounds"; break;
		case 1: $spell = "Detect Lie"; break;
		case 2: $spell = "Divination"; break;
		case 3: $spell = "Exorcise"; break;
		case 4: $spell = "Lower Water"; break;
		case 5: $spell = "Neutralise Poison"; break;
		case 6: $spell = "Protection From Evil 10 ft Radius"; break;
		case 7: $spell = "Speak With Plants"; break;
		case 8: $spell = "Sticks to Snakes"; break;
		case 9: $spell = "Tongues"; break;
	}} else if (($magic == "cleric") && ($level == 5)){ switch (mt_rand(0,9)){
		case 0: $spell = "Atonement"; break;
		case 1: $spell = "Commune"; break;
		case 2: $spell = "Cure Critical Wounds"; break;
		case 3: $spell = "Dispel Evil"; break;
		case 4: $spell = "Flame Strike"; break;
		case 5: $spell = "Insect Plague"; break;
		case 6: $spell = "Plane Shift"; break;
		case 7: $spell = "Quest"; break;
		case 8: $spell = "Raise Dead"; break;
		case 9: $spell = "True Seeing"; break;
	}} else if (($magic == "cleric") && ($level == 6)){ switch (mt_rand(0,9)){
		case 0: $spell = "Aerial Servant"; break;
		case 1: $spell = "Animate Object"; break;
		case 2: $spell = "Blade Barrier"; break;
		case 3: $spell = "Conjure Animals"; break;
		case 4: $spell = "Find the Path"; break;
		case 5: $spell = "Heal"; break;
		case 6: $spell = "Part Water"; break;
		case 7: $spell = "Speak With Monsters"; break;
		case 8: $spell = "Stone Tell"; break;
		case 9: $spell = "Word of Recall"; break;
	}} else if (($magic == "cleric") && ($level == 7)){ switch (mt_rand(0,9)){
		case 0: $spell = "Astral Spell"; break;
		case 1: $spell = "Control Weather"; break;
		case 2: $spell = "Earthquake"; break;
		case 3: $spell = "Gate"; break;
		case 4: $spell = "Holy Word"; break;
		case 5: $spell = "Regenerate"; break;
		case 6: $spell = "Restoration"; break;
		case 7: $spell = "Resurrection"; break;
		case 8: $spell = "Symbol"; break;
		case 9: $spell = "Wind Walk"; break;
	}} else if (($magic == "druid") && ($level == 1)){ switch (mt_rand(0,11)){
		case 0: $spell = "Animal Friendship"; break;
		case 1: $spell = "Detect Magic"; break;
		case 2: $spell = "Detect Pits and Snares"; break;
		case 3: $spell = "Entangle"; break;
		case 4: $spell = "Faerie Fire"; break;
		case 5: $spell = "Invisibility to Animals"; break;
		case 6: $spell = "Locate Animals"; break;
		case 7: $spell = "Pass Without Trace"; break;
		case 8: $spell = "Predict Weather"; break;
		case 9: $spell = "Purify Water"; break;
		case 10: $spell = "Shillelagh"; break;
		case 11: $spell = "Speak with Animals"; break;
	}} else if (($magic == "druid") && ($level == 2)){ switch (mt_rand(0,11)){
		case 0: $spell = "Barkskin"; break;
		case 1: $spell = "Charm Person or Mammal"; break;
		case 2: $spell = "Create Water"; break;
		case 3: $spell = "Cure Light Wounds"; break;
		case 4: $spell = "Feign Death"; break;
		case 5: $spell = "Fire Trap"; break;
		case 6: $spell = "Heat Metal"; break;
		case 7: $spell = "Locate Plants"; break;
		case 8: $spell = "Obscurement"; break;
		case 9: $spell = "Produce Flame"; break;
		case 10: $spell = "Trip"; break;
		case 11: $spell = "Warp Wood"; break;
	}} else if (($magic == "druid") && ($level == 3)){ switch (mt_rand(0,11)){
		case 0: $spell = "Call Lightning"; break;
		case 1: $spell = "Cure Disease"; break;
		case 2: $spell = "Hold Animal"; break;
		case 3: $spell = "Neutralise Poison"; break;
		case 4: $spell = "Plant Growth"; break;
		case 5: $spell = "Protection From Fire"; break;
		case 6: $spell = "Pyrotechnics"; break;
		case 7: $spell = "Snare"; break;
		case 8: $spell = "Stone Shape"; break;
		case 9: $spell = "Summon Insects"; break;
		case 10: $spell = "Tree"; break;
		case 11: $spell = "Water Breathing"; break;
	}} else if (($magic == "druid") && ($level == 4)){ switch (mt_rand(0,11)){
		case 0: $spell = "Animal Summoning I"; break;
		case 1: $spell = "Call Woodland Beings"; break;
		case 2: $spell = "Control Temperature 100 ft r."; break;
		case 3: $spell = "Cure Serious Wounds"; break;
		case 4: $spell = "Dispel Magic"; break;
		case 5: $spell = "Hallucinatory Forest"; break;
		case 6: $spell = "Hold Plant"; break;
		case 7: $spell = "Plant Door"; break;
		case 8: $spell = "Produce Fire"; break;
		case 9: $spell = "Protection From Lightning"; break;
		case 10: $spell = "Repel Insects"; break;
		case 11: $spell = "Speak with Plants"; break;
	}} else if (($magic == "druid") && ($level == 5)){ switch (mt_rand(0,9)){
		case 0: $spell = "Animal Growth"; break;
		case 1: $spell = "Animal Summoning II"; break;
		case 2: $spell = "Anti-Plant Shell"; break;
		case 3: $spell = "Commune With Nature"; break;
		case 4: $spell = "Control Winds"; break;
		case 5: $spell = "Insect Plague"; break;
		case 6: $spell = "Pass Plant"; break;
		case 7: $spell = "Sticks to Snakes"; break;
		case 8: $spell = "Transmute Rock to Mud"; break;
		case 9: $spell = "Wall of Fire"; break;
	}} else if (($magic == "druid") && ($level == 6)){ switch (mt_rand(0,9)){
		case 0: $spell = "Animal Summoning III"; break;
		case 1: $spell = "Anti-Animal Shell"; break;
		case 2: $spell = "Conjure Fire Elemental"; break;
		case 3: $spell = "Cure Critical Wounds"; break;
		case 4: $spell = "Feeblemind"; break;
		case 5: $spell = "Fire Seeds"; break;
		case 6: $spell = "Transport via Plants"; break;
		case 7: $spell = "Turn Wood"; break;
		case 8: $spell = "Wall of Thorns"; break;
		case 9: $spell = "Weather Summoning"; break;
	}} else if (($magic == "druid") && ($level == 7)){ switch (mt_rand(0,9)){
		case 0: $spell = "Animate Rock"; break;
		case 1: $spell = "Chariot of Fire"; break;
		case 2: $spell = "Confusion"; break;
		case 3: $spell = "Conjure Earth Elemental"; break;
		case 4: $spell = "Control Weather"; break;
		case 5: $spell = "Creeping Doom"; break;
		case 6: $spell = "Finger of Death"; break;
		case 7: $spell = "Fire Storm"; break;
		case 8: $spell = "Reincarnate"; break;
		case 9: $spell = "Transmute Metal to Wood"; break;
	}} else if (($magic == "illusionist") && ($level == 1)){ switch (mt_rand(0,11)){
		case 0: $spell = "Audible Glamour"; break;
		case 1: $spell = "Change Self"; break;
		case 2: $spell = "Colour Spray"; break;
		case 3: $spell = "Dancing Lights"; break;
		case 4: $spell = "Darkness"; break;
		case 5: $spell = "Detect Illusion"; break;
		case 6: $spell = "Detect Invisibility"; break;
		case 7: $spell = "Gaze Refl ection"; break;
		case 8: $spell = "Hypnotism"; break;
		case 9: $spell = "Light"; break;
		case 10: $spell = "Phantasmal Force"; break;
		case 11: $spell = "Wall of Fog"; break;
	}} else if (($magic == "illusionist") && ($level == 2)){ switch (mt_rand(0,11)){
		case 0: $spell = "Blindness"; break;
		case 1: $spell = "Blur"; break;
		case 2: $spell = "Deafness"; break;
		case 3: $spell = "Detect Magic"; break;
		case 4: $spell = "Fog Cloud"; break;
		case 5: $spell = "Hypnotic Pattern"; break;
		case 6: $spell = "Improved Phantasmal Force"; break;
		case 7: $spell = "Invisibility"; break;
		case 8: $spell = "Magic Mouth"; break;
		case 9: $spell = "Mirror Image"; break;
		case 10: $spell = "Misdirection"; break;
		case 11: $spell = "Ventriloquism"; break;
	}} else if (($magic == "illusionist") && ($level == 3)){ switch (mt_rand(0,11)){
		case 0: $spell = "Continual Darkness"; break;
		case 1: $spell = "Continual Light"; break;
		case 2: $spell = "Dispel Illusion"; break;
		case 3: $spell = "Fear"; break;
		case 4: $spell = "Hallucinatory Terrain"; break;
		case 5: $spell = "Illusory Script"; break;
		case 6: $spell = "Invisibility 10 ft Radius"; break;
		case 7: $spell = "Non-Detection"; break;
		case 8: $spell = "Paralysation"; break;
		case 9: $spell = "Rope Trick"; break;
		case 10: $spell = "Spectral Force"; break;
		case 11: $spell = "Suggestion"; break;
	}} else if (($magic == "illusionist") && ($level == 4)){ switch (mt_rand(0,7)){
		case 0: $spell = "Confusion"; break;
		case 1: $spell = "Dispel Exhaustion"; break;
		case 2: $spell = "Emotion"; break;
		case 3: $spell = "Improved Invisibility"; break;
		case 4: $spell = "Massmorph"; break;
		case 5: $spell = "Minor Creation"; break;
		case 6: $spell = "Phantasmal Killer"; break;
		case 7: $spell = "Shadow Monsters"; break;
	}} else if (($magic == "illusionist") && ($level == 5)){ switch (mt_rand(0,7)){
		case 0: $spell = "Chaos"; break;
		case 1: $spell = "Demi-Shadow Monsters"; break;
		case 2: $spell = "Major Creation"; break;
		case 3: $spell = "Maze"; break;
		case 4: $spell = "Project Image"; break;
		case 5: $spell = "Shadow Door"; break;
		case 6: $spell = "Shadow Magic"; break;
		case 7: $spell = "Summon Shadow"; break;
	}} else if (($magic == "illusionist") && ($level == 6)){ switch (mt_rand(0,7)){
		case 0: $spell = "Conjure Animals"; break;
		case 1: $spell = "Demi-Shadow Magic"; break;
		case 2: $spell = "Mass Suggestion"; break;
		case 3: $spell = "Permanent Illusion"; break;
		case 4: $spell = "Programmed Illusion"; break;
		case 5: $spell = "Shades"; break;
		case 6: $spell = "True Sight"; break;
		case 7: $spell = "Veil"; break;
	}} else if (($magic == "illusionist") && ($level == 7)){ switch (mt_rand(0,5)){
		case 0: $spell = "Alter Reality"; break;
		case 1: $spell = "Astral Spell"; break;
		case 2: $spell = "Prismatic Spray"; break;
		case 3: $spell = "Prismatic Wall"; break;
		case 4: $spell = "Vision"; break;
		case 5: $spell = "Arcane Spells level 1"; break;
	}} else if (($magic == "mage") && ($level == 1)){ switch (mt_rand(0,29)){
		case 0: $spell = "Affect Normal Fires"; break;
		case 1: $spell = "Burning Hands"; break;
		case 2: $spell = "Charm Person"; break;
		case 3: $spell = "Comprehend Languages"; break;
		case 4: $spell = "Dancing Lights"; break;
		case 5: $spell = "Detect Magic"; break;
		case 6: $spell = "Enlarge"; break;
		case 7: $spell = "Erase"; break;
		case 8: $spell = "Feather Fall"; break;
		case 9: $spell = "Find Familiar"; break;
		case 10: $spell = "Floating Disk"; break;
		case 11: $spell = "Friends"; break;
		case 12: $spell = "Hold Portal"; break;
		case 13: $spell = "Identify"; break;
		case 14: $spell = "Jump"; break;
		case 15: $spell = "Light"; break;
		case 16: $spell = "Magic Aura"; break;
		case 17: $spell = "Magic Missile"; break;
		case 18: $spell = "Mending"; break;
		case 19: $spell = "Message"; break;
		case 20: $spell = "Protection From Evil"; break;
		case 21: $spell = "Push"; break;
		case 22: $spell = "Read Magic"; break;
		case 23: $spell = "Shield"; break;
		case 24: $spell = "Shocking Grasp"; break;
		case 25: $spell = "Sleep"; break;
		case 26: $spell = "Spider Climb"; break;
		case 27: $spell = "Unseen Servant"; break;
		case 28: $spell = "Ventriloquism"; break;
		case 29: $spell = "Write"; break;
	}} else if (($magic == "mage") && ($level == 2)){ switch (mt_rand(0,23)){
		case 0: $spell = "Audible Glamour"; break;
		case 1: $spell = "Continual Light"; break;
		case 2: $spell = "Darkness 15 ft Radius"; break;
		case 3: $spell = "Detect Evil"; break;
		case 4: $spell = "Detect Invisibility"; break;
		case 5: $spell = "ESP"; break;
		case 6: $spell = "Fool`s Gold"; break;
		case 7: $spell = "Forget"; break;
		case 8: $spell = "Invisibility"; break;
		case 9: $spell = "Knock"; break;
		case 10: $spell = "False Trap"; break;
		case 11: $spell = "Levitate"; break;
		case 12: $spell = "Locate Object"; break;
		case 13: $spell = "Magic Mouth"; break;
		case 14: $spell = "Mirror Image"; break;
		case 15: $spell = "Pyrotechnics"; break;
		case 16: $spell = "Ray of Enfeeblement"; break;
		case 17: $spell = "Rope Trick"; break;
		case 18: $spell = "Scare"; break;
		case 19: $spell = "Shatter"; break;
		case 20: $spell = "Stinking Cloud"; break;
		case 21: $spell = "Strength"; break;
		case 22: $spell = "Web"; break;
		case 23: $spell = "Wizard Lock"; break;
	}} else if (($magic == "mage") && ($level == 3)){ switch (mt_rand(0,23)){
		case 0: $spell = "Blink"; break;
		case 1: $spell = "Clairaudience"; break;
		case 2: $spell = "Clairvoyance"; break;
		case 3: $spell = "Dispel Magic"; break;
		case 4: $spell = "Explosive Runes"; break;
		case 5: $spell = "Feign Death"; break;
		case 6: $spell = "Fireball"; break;
		case 7: $spell = "Flame Arrow"; break;
		case 8: $spell = "Fly"; break;
		case 9: $spell = "Gust of Wind"; break;
		case 10: $spell = "Haste"; break;
		case 11: $spell = "Hold Person"; break;
		case 12: $spell = "Infravision"; break;
		case 13: $spell = "Invisibility 10 ft Radius"; break;
		case 14: $spell = "Lightning Bolt"; break;
		case 15: $spell = "Monster Summoning I"; break;
		case 16: $spell = "Phantasmal Force"; break;
		case 17: $spell = "Protection From Evil 10 ft Radius"; break;
		case 18: $spell = "Protection From Normal Missiles"; break;
		case 19: $spell = "Slow"; break;
		case 20: $spell = "Suggestion"; break;
		case 21: $spell = "Tiny Hut"; break;
		case 22: $spell = "Tongues"; break;
		case 23: $spell = "Water Breathing"; break;
	}} else if (($magic == "mage") && ($level == 4)){ switch (mt_rand(0,23)){
		case 0: $spell = "Charm Monster"; break;
		case 1: $spell = "Confusion"; break;
		case 2: $spell = "Dig"; break;
		case 3: $spell = "Dimension Door"; break;
		case 4: $spell = "Enchanted Weapon"; break;
		case 5: $spell = "Extension I"; break;
		case 6: $spell = "Fear"; break;
		case 7: $spell = "Fire Charm"; break;
		case 8: $spell = "Fire Shield"; break;
		case 9: $spell = "Fire Trap"; break;
		case 10: $spell = "Fumble"; break;
		case 11: $spell = "Hallucinatory Terrain"; break;
		case 12: $spell = "Ice Storm"; break;
		case 13: $spell = "Massmorph"; break;
		case 14: $spell = "Minor Globe of Invulnerability"; break;
		case 15: $spell = "Mnemonic Enhancement"; break;
		case 16: $spell = "Monster Summoning II"; break;
		case 17: $spell = "Plant Growth"; break;
		case 18: $spell = "Polymorph Other"; break;
		case 19: $spell = "Polymorph Self"; break;
		case 20: $spell = "Remove Curse"; break;
		case 21: $spell = "Wall of Fire"; break;
		case 22: $spell = "Wall of Ice"; break;
		case 23: $spell = "Wizard Eye"; break;
	}} else if (($magic == "mage") && ($level == 5)){ switch (mt_rand(0,23)){
		case 0: $spell = "Airy Water"; break;
		case 1: $spell = "Animal Growth"; break;
		case 2: $spell = "Animate Dead"; break;
		case 3: $spell = "Cloudkill"; break;
		case 4: $spell = "Cone of Cold"; break;
		case 5: $spell = "Conjure Elemental"; break;
		case 6: $spell = "Contact Other Plane"; break;
		case 7: $spell = "Distance Distortion"; break;
		case 8: $spell = "Extension II"; break;
		case 9: $spell = "Feeblemind"; break;
		case 10: $spell = "Hold Monster"; break;
		case 11: $spell = "Interposing Hand"; break;
		case 12: $spell = "Mage`s Faithful Hound"; break;
		case 13: $spell = "Magic Jar"; break;
		case 14: $spell = "Monster Summoning III"; break;
		case 15: $spell = "Passwall"; break;
		case 16: $spell = "Secret Chest"; break;
		case 17: $spell = "Stone Shape"; break;
		case 18: $spell = "Telekinesis"; break;
		case 19: $spell = "Teleport"; break;
		case 20: $spell = "Transmute Rock to Mud"; break;
		case 21: $spell = "Wall of Force"; break;
		case 22: $spell = "Wall of Iron"; break;
		case 23: $spell = "Wall of Stone"; break;
	}} else if (($magic == "mage") && ($level == 6)){ switch (mt_rand(0,23)){
		case 0: $spell = "Anti-Magic Shell"; break;
		case 1: $spell = "Control Weather"; break;
		case 2: $spell = "Death Spell"; break;
		case 3: $spell = "Disintegrate"; break;
		case 4: $spell = "Enchant an Item"; break;
		case 5: $spell = "Extension III"; break;
		case 6: $spell = "Forceful Hand"; break;
		case 7: $spell = "Freezing Sphere"; break;
		case 8: $spell = "Geas"; break;
		case 9: $spell = "Glasseye"; break;
		case 10: $spell = "Globe of Invulnerability"; break;
		case 11: $spell = "Guards and Wards"; break;
		case 12: $spell = "Invisible Stalker"; break;
		case 13: $spell = "Legend Lore"; break;
		case 14: $spell = "Lower Water"; break;
		case 15: $spell = "Monster Summoning IV"; break;
		case 16: $spell = "Move Earth"; break;
		case 17: $spell = "Part Water"; break;
		case 18: $spell = "Project Image"; break;
		case 19: $spell = "Reincarnation"; break;
		case 20: $spell = "Repulsion"; break;
		case 21: $spell = "Spirit-rack"; break;
		case 22: $spell = "Stone to Flesh"; break;
		case 23: $spell = "Transformation"; break;
	}} else if (($magic == "mage") && ($level == 7)){ switch (mt_rand(0,15)){
		case 0: $spell = "Cacodemon"; break;
		case 1: $spell = "Charm Plants"; break;
		case 2: $spell = "Delayed Blast Fireball"; break;
		case 3: $spell = "Duo-Dimension"; break;
		case 4: $spell = "Grasping Hand"; break;
		case 5: $spell = "Instant Summons"; break;
		case 6: $spell = "Limited Wish"; break;
		case 7: $spell = "Mage`s Sword"; break;
		case 8: $spell = "Mass Invisibility"; break;
		case 9: $spell = "Monster Summoning V"; break;
		case 10: $spell = "Phase Door"; break;
		case 11: $spell = "Power Word Stun"; break;
		case 12: $spell = "Reverse Gravity"; break;
		case 13: $spell = "Simulacrum"; break;
		case 14: $spell = "Statue"; break;
		case 15: $spell = "Vanish"; break;
	}} else if (($magic == "mage") && ($level == 8)){ switch (mt_rand(0,15)){
		case 0: $spell = "Antipathy/ Sympathy"; break;
		case 1: $spell = "Clenched Fist"; break;
		case 2: $spell = "Clone"; break;
		case 3: $spell = "Glass-steel"; break;
		case 4: $spell = "Incendiary Cloud"; break;
		case 5: $spell = "Irresistible Dance"; break;
		case 6: $spell = "Mass Charm"; break;
		case 7: $spell = "Maze"; break;
		case 8: $spell = "Mind Blank"; break;
		case 9: $spell = "Monster Summoning VI"; break;
		case 10: $spell = "Permanency"; break;
		case 11: $spell = "Polymorph Object"; break;
		case 12: $spell = "Power Word Blind"; break;
		case 13: $spell = "Spell Immunity"; break;
		case 14: $spell = "Symbol"; break;
		case 15: $spell = "Trap the Soul"; break;
	}} else if (($magic == "mage") && ($level == 9)){ switch (mt_rand(0,11)){
		case 0: $spell = "Astral Spell"; break;
		case 1: $spell = "Crushing Hand"; break;
		case 2: $spell = "Gate"; break;
		case 3: $spell = "Imprisonment"; break;
		case 4: $spell = "Meteor Swarm"; break;
		case 5: $spell = "Monster Summoning VII"; break;
		case 6: $spell = "Power Word Kill"; break;
		case 7: $spell = "Prismatic Sphere"; break;
		case 8: $spell = "Shape Change"; break;
		case 9: $spell = "Temporal Stasis"; break;
		case 10: $spell = "Time Stop"; break;
		case 11: $spell = "Wish"; break;
	}}
}
	return "level " . $level . " " . $magic . " spell..." . $spell;
}

?>