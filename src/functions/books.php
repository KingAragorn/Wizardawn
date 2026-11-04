<?php

function tomeMaker($game)
{
	$book1 = array('Exotic', 'Mysterious', 'Enchanted', 'Marvelous', 'Amazing', 'Astonishing', 'Mystical', 'Astounding', 'Magical', 'Divine', 'Excellent', 'Magnificent', 'Phenomenal', 'Fantastic', 'Incredible', 'Miraculous', 'Extraordinary', 'Fabulous', 'Wondrous', 'Glorious', 'Dreadful', 'Horrific', 'Terrible', 'Disturbing', 'Frightful', 'Awful', 'Dire', 'Grim', 'Vile', 'Lost', 'Fabled', 'Legendary', 'Mythical', 'Missing', 'Doomed', 'Endless', 'Eternal', 'Exalted', 'Glimmering', 'Sadistic', 'Disrupting', 'Spiritual', 'Demonic', 'Holy', 'Heavenly', 'Ancestral', 'Ornate', 'Ultimate', 'Abyssmal', 'Crazed', 'Elven', 'Orcish', 'Dwarvish', 'Gnomish', 'Cursed', 'Sylvan', 'Wizardly', 'Sturdy', 'Disturbing', 'Odd', 'Rare', 'Treasured', 'Damned', 'Evil', 'Lawful', 'Foul', 'Infernal', 'Royal', 'Worldy', 'Blasphemous', 'Planar', 'Wonderful', 'Perfected', 'Vicious', 'Chaotic', 'Haunted', 'Travelling', 'Unholy', 'Infernal', 'Villainous', 'Accursed', 'Fiendish', 'Adored', 'Hallowed', 'Glorified', 'Sacred', 'Blissful', 'Almighty', 'Dominant', 'Supreme', 'Fallen', 'Dark', 'Earthly', 'Mighty', 'Unspeakable', 'Unknown', 'Forgotten', 'Deathly', 'Undead', 'Infinite', 'Abyssmal');
	$buuk1 = count($book1)-1;

	$book2 = array('Tale', 'Book', 'Adventures', 'Lexicon', 'Writings', 'Omnibus', 'Mystery', 'Manual', 'Folio', 'Diary', 'Tome', 'Story', 'Events', 'History', 'Chronicles', 'Fable', 'Legend', 'Myth', 'Secrets');
	$buuk2 = count($book2)-1;

	$book3 = array('Demon', 'Devil', 'Dragon', 'Dwarf', 'Elf', 'Hag', 'Hobbit', 'Imp', 'Leprechaun', 'Vampire', 'Ghost', 'Lich', 'Templar', 'Thief', 'Illusionist', 'Princess', 'Invoker', 'Priest', 'Conjurer', 'Bandit', 'Priestess', 'Baron', 'Wizard', 'Cleric', 'Monk', 'Minstrel', 'Defender', 'Cavalier', 'Magician', 'Witch', 'Fighter', 'Seeker', 'Slayer', 'Ranger', 'Barbarian', 'Explorer', 'Heretic', 'Gladiator', 'Sage', 'Rogue', 'Paladin', 'Bard', 'Diviner', 'Lord', 'Outlaw', 'Prophet', 'Mercenary', 'Adventurer', 'Enchanter', 'King', 'Scout', 'Mystic', 'Mage', 'Traveler', 'Summoner', 'Queen', 'Warrior', 'Sorcerer', 'Seer', 'Hunter', 'Knight', 'Prince', 'Necromancer', 'Sorceress', 'Shaman');
	$buuk3 = count($book3)-1;

	$book4 = array('Badger', 'Basilisk', 'Bear', 'Boar', 'Bufallo', 'Bugbear', 'Bull', 'Centaur', 'Chimera', 'Cloud Giant', 'Crocodile', 'Cyclops', 'Demon', 'Devil', 'Dog', 'Dragon', 'Drake', 'Dryad', 'Dwarf', 'Elephant', 'Elf', 'Ettin', 'Fire Giant', 'Fish', 'Frog', 'Frost Giant', 'Gargoyle', 'Genie', 'Gnoll', 'Gnome', 'Goblin', 'Gorgon', 'Griffin', 'Hag', 'Hobbit', 'Harpy', 'Hell Hound', 'Hill Giant', 'Hippogriff', 'Hippopotamus', 'Hobbit', 'Hobgoblin', 'Horse', 'Hydra', 'Imp', 'Jackal', 'Kobold', 'Kraken', 'Leprechaun', 'Lion', 'Lizard', 'Manticore', 'Imp', 'Minotaur', 'Mule', 'Naga', 'Nixie', 'Nymph', 'Froglok', 'Ogre', 'Orc', 'Owlbear', 'Pegasus', 'Phoenix', 'Pixie', 'Giant Worm', 'Dark Pixie', 'Rot Monster', 'Scorpion', 'Serpent', 'Reaper', 'Snake', 'Sphinx', 'Spider', 'Sprite', 'Stone Giant', 'Storm Giant', 'Succubus', 'Tiger', 'Titan', 'Toad', 'Ent', 'Neptar', 'Troglodite', 'Troll', 'Turtle', 'Unicorn', 'Walrus', 'Weasel', 'Werewolf', 'Whale', 'Wisp', 'Wolf', 'Wolverine', 'Wyrm', 'Wyvern', 'Zorn', 'Yeti', 'Templar', 'Thief', 'Illusionist', 'Princess', 'Invoker', 'Priest', 'Conjurer', 'Bandit', 'Priestess', 'Baron', 'Wizard', 'Cleric', 'Monk', 'Minstrel', 'Defender', 'Cavalier', 'Magician', 'Witch', 'Fighter', 'Seeker', 'Slayer', 'Ranger', 'Barbarian', 'Explorer', 'Heretic', 'Gladiator', 'Sage', 'Rogue', 'Paladin', 'Bard', 'Diviner', 'Lord', 'Outlaw', 'Prophet', 'Mercenary', 'Adventurer', 'Enchanter', 'King', 'Scout', 'Mystic', 'Mage', 'Traveler', 'Summoner', 'Queen', 'Warrior', 'Sorcerer', 'Seer', 'Hunter', 'Knight', 'Prince', 'Necromancer', 'Sorceress', 'Shaman');
	$buuk4 = count($book4)-1;

	$book5 = array('Castle', 'Cave', 'Mansion', 'House', 'Cave', 'Dungeon', 'Forest', 'Desert', 'Tower', 'Desert', 'Mountains', 'Swamp', 'Hills', 'Night', 'Darkness', 'Fog', 'Woods', 'Mist', 'Light', 'Bottle', 'Sky', 'Ground', 'Water', 'Sea', 'Sand', 'Trees', 'Clouds', 'Stars', 'Crystal', 'Gem', 'Lamp', 'Jar', 'Chains', 'Keep', 'City', 'Village', 'Tomb', 'Crypt');
	$buuk5 = count($book5)-1;

	$book6 = authorName();

	$book7 = array('Goblet', 'Sword', 'Axe', 'Dagger', 'Armor', 'Crystal', 'Gem', 'Pool', 'Wand', 'Ring', 'Amulet', 'Helm', 'Crown', 'Boots', 'Belt', 'Robe', 'Chalice', 'Mirror', 'Lance', 'Shield', 'Scepter', 'Staff', 'Book', 'Potion', 'Bow', 'Stone', 'Fire', 'Shard', 'Box');
	$buuk7 = count($book7)-1;

	$book8 = array('Search', 'Quest', 'Curse', 'Magic', 'Mystery', 'Power', 'Destruction', 'Murder', 'Desire', 'Nature', 'Legend', 'Myth', 'Lies', 'Location');
	$buuk8 = count($book8)-1;

	$book = mt_rand(1,11);

	if ($book == 1){$tome = "The " . $book1[mt_rand(0,$buuk1)] . " " . $book2[mt_rand(0,$buuk2)] . " of the " . $book4[mt_rand(0,$buuk4)];}
	else if ($book == 2){$tome = "The " . $book2[mt_rand(0,$buuk2)] . " of the " . $book1[mt_rand(0,$buuk1)] . " " . $book4[mt_rand(0,$buuk4)];}
	else if ($book == 3){$tome = "The " . $book4[mt_rand(0,$buuk4)] . " in the " . $book5[mt_rand(0,$buuk5)];}
	else if ($book == 4){$tome = "The " . $book2[mt_rand(0,$buuk2)] . " of the " . $book3[mt_rand(0,$buuk3)] . " in the " . $book5[mt_rand(0,$buuk5)];}
	else if ($book == 5){$tome = "The " . $book1[mt_rand(0,$buuk1)] . " " . $book5[mt_rand(0,$buuk5)] . " of the " . $book3[mt_rand(0,$buuk3)];}
	else if ($book == 6){$tome = "The " . $book8[mt_rand(0,$buuk8)] . " of the " . $book1[mt_rand(0,$buuk1)] . " " . $book7[mt_rand(0,$buuk7)] . " of " . $book6;}
	else if ($book == 7){$tome = "The " . $book8[mt_rand(0,$buuk8)] . " of the " . $book7[mt_rand(0,$buuk7)] . " of " . $book6;}
	else if ($book == 8){$tome = "The " . $book7[mt_rand(0,$buuk7)] . " and the " . $book3[mt_rand(0,$buuk3)];}
	else if ($book == 9){$tome = "The " . $book3[mt_rand(0,$buuk3)] . " and the " . $book7[mt_rand(0,$buuk7)];}
	else if ($book == 10){$tome = "The " . $book2[mt_rand(0,$buuk2)] . " of " . $book6 . " the " . $book3[mt_rand(0,$buuk3)];}
	else {$tome = "The " . $book2[mt_rand(0,$buuk2)] . " of " . $book6 . " the " . $book3[mt_rand(0,$buuk3)];}

	if (mt_rand(1,100) > 70){$tome = substr($tome, 4);}

	$tome = str_replace(" ", "&nbsp;", $tome);

	return $tome;
}

?>