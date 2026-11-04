<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Labyrinth Lord";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' target='_blank' method='POST' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Potion Appearances</p>";
	echo "<p style='text-align: justify;'>Here you can create a completely random set of tastes, smells, and appearances for potions to use in your fantasy role-playing game.";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_game'>";

	if ($x_game == "Fantasy"){ echo " Select how many appearances you want below..."; $drop=100; $running=1; }
	else { echo " Simply press the button to get a list of potions for your game. If you just want a list of potions appearances, to be used with any potions, then select an amount below."; $drop=101; $running=0;}
	?>
		<div id="div_table">
			<div class="row">
				<span class="cell">Amount:</span>
				<span class="cell">
					<select id="DropOption" name="amount">
						<?php $runner=$drop; while ($runner > 0) : echo "<option>" . $running . "</option>"; $runner = $runner-1; $running = $running+1; endwhile; ?>
					</select>
				</span>
			</div>
<?php if ($x_game == "AD&D"){ ?>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="ua" value="1">&nbsp;&nbsp;Include Unearthed Arcana</span>
			</div>
<?php } ?>
<?php if ($x_game == "Labyrinth Lord"){ ?>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="aec" value="1">&nbsp;&nbsp;Include AEC</span>
			</div>
<?php } ?>
		</div>
		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create">

		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

$x_package = $_POST['x_game'];
$ua = $_POST['ua']+0;

$tt_mg_list = $_GET['tml']+0;
	if ($tt_mg_list == 5){$x_package = "Tunnels & Trolls 5th Edition";}
	else if ($tt_mg_list == 7){$x_package = "Tunnels & Trolls 7th Edition";}
	else if ($tt_mg_list == 9){$x_package = "Tunnels & Trolls Deluxe";}

$potqty = $_POST['amount'];

if ($potqty > 0)
{
}
else if ($x_package == "OSRIC")
{
	$bottom_notices = 1;
	$t_potions = array('Oil of Etherealness', 'Oil of Slipperiness', 'Philtre of Love', 'Philtre of Persuasiveness', 'Potion of Animal Control (Amphibians & Reptiles)', 'Potion of Animal Control (Amphibians, Reptiles, & Fish)', 'Potion of Animal Control (Any)', 'Potion of Animal Control (Avian)', 'Potion of Animal Control (Fish)', 'Potion of Animal Control (Mammal & Avian)', 'Potion of Animal Control (Mammal)', 'Potion of Clairaudience', 'Potion of Clairvoyance', 'Potion of Climbing', 'Potion of Diminution', 'Potion of Dragon Control (Black)', 'Potion of Dragon Control (Blue)', 'Potion of Dragon Control (Brass)', 'Potion of Dragon Control (Bronze)', 'Potion of Dragon Control (Copper)', 'Potion of Dragon Control (Evil)', 'Potion of Dragon Control (Gold)', 'Potion of Dragon Control (Good)', 'Potion of Dragon Control (Green)', 'Potion of Dragon Control (Red)', 'Potion of Dragon Control (Silver)', 'Potion of Dragon Control (White)', 'Potion of ESP', 'Potion of Extra-Healing', 'Potion of Gaseous Form', 'Potion of Giant Control (Cloud)', 'Potion of Giant Control (Fire)', 'Potion of Giant Control (Frost)', 'Potion of Giant Control (Hill)', 'Potion of Giant Control (Stone)', 'Potion of Giant Control (Storm)', 'Potion of Giant Strength (Cloud)', 'Potion of Giant Strength (Fire)', 'Potion of Giant Strength (Frost)', 'Potion of Giant Strength (Hill)', 'Potion of Giant Strength (Stone)', 'Potion of Giant Strength (Storm)', 'Potion of Growth', 'Potion of Healing', 'Potion of Heroism', 'Potion of Human Control (Dwarves)', 'Potion of Human Control (Elves & Half-Elves)', 'Potion of Human Control (Gnomes)', 'Potion of Human Control (Halflings)', 'Potion of Human Control (Half-Orcs)', 'Potion of Human Control (Humans)', 'Potion of Human Control (Humans, Elves & Half-Elves)', 'Potion of Human Control (Orcs, Gnolls, Goblinoids, etc)', 'Potion of Invisibility', 'Potion of Invulnerability', 'Potion of Levitaion', 'Potion of Longevity', 'Potion of Plant Control', 'Potion of Polymorph', 'Potion of Speed', 'Potion of Super-Heroism', 'Potion of Sweet Water', 'Potion of Treasure Finding', 'Potion of Undead Control (Ghasts)', 'Potion of Undead Control (Ghosts)', 'Potion of Undead Control (Ghouls)', 'Potion of Undead Control (Shadows)', 'Potion of Undead Control (Skeletons)', 'Potion of Undead Control (Spectres)', 'Potion of Undead Control (Vampires)', 'Potion of Undead Control (Wights)', 'Potion of Undead Control (Wraiths)', 'Potion of Undead Control (Zombies)', 'Potion of Water Breathing');
	$potqty = count($t_potions);
	$t_count = 0;
}
else if ($x_package == "Labyrinth Lord")
{
	$bottom_notices = 2;
	$aec = $_SESSION["SESSION_ADD_AEC"] = $_POST['aec']+0;
	if ($aec > 0){$t_potions = array('Potion of Animal Control', 'Potion of Clairaudience', 'Potion of Clairvoyance', 'Potion of Climbing', 'Potion of Delusion', 'Potion of Diminution', 'Potion of Black Dragon Control', 'Potion of Blue Dragon Control', 'Potion of Brass Dragon Control', 'Potion of Bronze Dragon Control', 'Potion of Copper Dragon Control', 'Potion of Gold Dragon Control', 'Potion of Green Dragon Control', 'Potion of Red Dragon Control', 'Potion of Silver Dragon Control', 'Potion of White Dragon Control', 'Potion of ESP', 'Potion of Extra-Healing', 'Potion of Fire Resistance', 'Potion of Flying', 'Potion of Gaseous Form', 'Potion of Cloud Giant Control', 'Potion of Fire Giant Control', 'Potion of Frost Giant Control', 'Potion of Hill Giant Control', 'Potion of Stone Giant Control', 'Potion of Storm Giant Control', 'Potion of Giant Strength', 'Potion of Growth', 'Potion of Healing', 'Potion of Heroism', 'Potion of Dwarf Control', 'Potion of Elf Control', 'Potion of Elf & Human Control', 'Potion of Gnome Control', 'Potion of Halfling Control', 'Potion of Human Control', 'Potion of Other Humanoid Control', 'Potion of Invisibility', 'Potion of Invulnerability', 'Potion of Levitation', 'Potion of Longevity', 'Oil of Etherealness', 'Oil of Slipperiness', 'Philter of Love', 'Potion of Plant Control', 'Poison', 'Potion of Polymorph', 'Potion of Speed', 'Potion of Super-Heroism', 'Potion of Sweet Water', 'Potion of Treasure Finding', 'Potion of Undead Control', 'Potion of Water Breathing');}
	else {$t_potions = array('Potion of Animal Control', 'Potion of Clairaudience', 'Potion of Clairvoyance', 'Potion of Climbing', 'Potion of Delusion', 'Potion of Diminution', 'Potion of Black Dragon Control', 'Potion of Blue Dragon Control', 'Potion of Gold Dragon Control', 'Potion of Green Dragon Control', 'Potion of Red Dragon Control', 'Potion of White Dragon Control', 'Potion of ESP', 'Potion of Extra-Healing', 'Potion of Fire Resistance', 'Potion of Flying', 'Potion of Gaseous Form', 'Potion of Cloud Giant Control', 'Potion of Fire Giant Control', 'Potion of Frost Giant Control', 'Potion of Hill Giant Control', 'Potion of Stone Giant Control', 'Potion of Storm Giant Control', 'Potion of Giant Strength', 'Potion of Growth', 'Potion of Healing', 'Potion of Heroism', 'Potion of Dwarf Control', 'Potion of Elf Control', 'Potion of Elf & Human Control', 'Potion of Gnome Control', 'Potion of Halfling Control', 'Potion of Human Control', 'Potion of Other Humanoid Control', 'Potion of Invisibility', 'Potion of Invulnerability', 'Potion of Levitation', 'Potion of Longevity', 'Oil of Etherealness', 'Oil of Slipperiness', 'Philter of Love', 'Potion of Plant Control', 'Potion of Poison', 'Potion of Polymorph', 'Potion of Speed', 'Potion of Super-Heroism', 'Potion of Sweet Water', 'Potion of Treasure Finding', 'Potion of Undead Control', 'Potion of Water Breathing');}
	$potqty = count($t_potions);
	$t_count = 0;
}
else if ($x_package == "BD&D")
{
	$bottom_notices = 13;
	$t_potions = array('Poison', 'Potion of Clairaudience', 'Potion of Clairvoyance', 'Potion of Control Animal', 'Potion of Control Black Dragon', 'Potion of Control Blue Dragon', 'Potion of Control Cloud Giant', 'Potion of Control Fire Giant', 'Potion of Control Frost Giant', 'Potion of Control Gold Dragon', 'Potion of Control Green Dragon', 'Potion of Control Hill Giant', 'Potion of Control Human', 'Potion of Control Plant', 'Potion of Control Red Dragon', 'Potion of Control Stone Giant', 'Potion of Control Storm Giant', 'Potion of Control Undead', 'Potion of Control White Dragon', 'Potion of Delusion', 'Potion of Diminution', 'Potion of ESP', 'Potion of Fire Resistance', 'Potion of Flying', 'Potion of Gaseous Form', 'Potion of Giant Strength', 'Potion of Growth', 'Potion of Healing', 'Potion of Heroism', 'Potion of Invisibility', 'Potion of Invulnerability', 'Potion of Levitation', 'Potion of Longevity', 'Potion of Polymorph Self', 'Potion of Speed', 'Potion of Treasure Finding');
	$potqty = count($t_potions);
	$t_count = 0;
}
else if ($x_package == "AD&D")
{
	$bottom_notices = 13;
	if ($ua != 1){ $t_potions = array('Oil of Etherealness', 'Oil of Slipperiness', 'Philter of Love', 'Philter of Persuasiveness', 'Poison', 'Potion of All Animal Control', 'Potion of Avian Control', 'Potion of Fish Control', 'Potion of Mammal/Marsupial Control', 'Potion of Mammal/Marsupial/Avian Control', 'Potion of Reptile/Amphbian/Fish Control', 'Potion of Reptile/Amphibian Control', 'Potion of Clairaudience', 'Potion of Clairvoyance', 'Potion of Climbing', 'Potion of Delusion', 'Potion of Diminution', 'Potion of Black Dragon Control', 'Potion of Blue Dragon Control', 'Potion of Brass Dragon Control', 'Potion of Bronze Dragon Control', 'Potion of Copper Dragon Control', 'Potion of Evil Dragon Control', 'Potion of Gold Dragon Control', 'Potion of Good Dragon Control', 'Potion of Green Dragon Control', 'Potion of Red Dragon Control', 'Potion of Silver Dragon Control', 'Potion of White Dragon Control', 'Potion of ESP', 'Potion of Extra-Healing', 'Potion of Fire Resistance', 'Potion of Flying', 'Potion of Gaseous Form', 'Potion of Cloud Giant Control', 'Potion of Fire Giant Control', 'Potion of Frost Giant Control', 'Potion of Hill Giant Control', 'Potion of Stone Giant Control', 'Potion of Storm Giant Control', 'Potion of Cloud Giant Strength', 'Potion of Fire Giant Strength', 'Potion of Frost Giant Strength', 'Potion of Hill Giant Strength', 'Potion of Stone Giant Strength', 'Potion of Storm Giant Strength', 'Potion of Growth', 'Potion of Healing', 'Potion of Heroism', 'Potion of Dwarf Control', 'Potion of Elf/Half-Elf Control', 'Potion of Elf/Half-Elf/Human Control', 'Potion of Gnome Control', 'Potion of Halfling Control', 'Potion of Half-Orc Control', 'Potion of Human Control', 'Potion of Monstrous Humanoid Control', 'Potion of Invisibility', 'Potion of Invulnerability', 'Potion of Levitation', 'Potion of Longevity', 'Potion of Plant Control', 'Potion of Polymorph Self', 'Potion of Speed', 'Potion of Super-Heroism ', 'Potion of Sweet Water', 'Potion of Treasure Finding', 'Potion of Undead Ghast Control', 'Potion of Undead Ghost Control', 'Potion of Undead Ghoul Control', 'Potion of Undead Shadow Control', 'Potion of Undead Skeleton Control', 'Potion of Undead Spectre Control', 'Potion of Undead Vampire Control', 'Potion of Undead Wight Control', 'Potion of Undead Wraith Control', 'Potion of Undead Zombie Control', 'Potion of Water Breathing'); }
	else { $t_potions = array('Elixir of Health', 'Elixir of Life', 'Elixir of Madness', 'Elixir of Youth', 'Oil of Acid Resistance', 'Oil of Disenchantment', 'Oil of Elemental Invulnerability', 'Oil of Etherealness', 'Oil of Fiery Burning', 'Oil of Fumbling', 'Oil of Impact', 'Oil of Sharpness +1', 'Oil of Sharpness +2', 'Oil of Sharpness +3', 'Oil of Sharpness +4', 'Oil of Sharpness +5', 'Oil of Sharpness +6', 'Oil of Slipperiness', 'Oil of Timelessness', 'Philter of Beauty', 'Philter of Glibness', 'Philter of Love', 'Philter of Persuasiveness', 'Philter of Stammering & Stuttering', 'Poison', 'Potion of All Animal Control', 'Potion of Avian Control', 'Potion of Fish Control', 'Potion of Mammal/Marsupial Control', 'Potion of Mammal/Marsupial/Avian Control', 'Potion of Reptile/Amphbian/Fish Control', 'Potion of Reptile/Amphibian Control', 'Potion of Clairaudience', 'Potion of Clairvoyance', 'Potion of Climbing', 'Potion of Delusion', 'Potion of Diminution', 'Potion of Black Dragon Control', 'Potion of Blue Dragon Control', 'Potion of Brass Dragon Control', 'Potion of Bronze Dragon Control', 'Potion of Copper Dragon Control', 'Potion of Evil Dragon Control', 'Potion of Gold Dragon Control', 'Potion of Good Dragon Control', 'Potion of Green Dragon Control', 'Potion of Red Dragon Control', 'Potion of Silver Dragon Control', 'Potion of White Dragon Control', 'Potion of ESP', 'Potion of Extra-Healing', 'Potion of Fire Breath', 'Potion of Fire Resistance', 'Potion of Flying', 'Potion of Gaseous Form', 'Potion of Cloud Giant Control', 'Potion of Fire Giant Control', 'Potion of Frost Giant Control', 'Potion of Hill Giant Control', 'Potion of Stone Giant Control', 'Potion of Storm Giant Control', 'Potion of Cloud Giant Strength', 'Potion of Fire Giant Strength', 'Potion of Frost Giant Strength', 'Potion of Hill Giant Strength', 'Potion of Stone Giant Strength', 'Potion of Storm Giant Strength', 'Potion of Growth', 'Potion of Healing', 'Potion of Heroism', 'Potion of Dwarf Control', 'Potion of Elf/Half-Elf Control', 'Potion of Elf/Half-Elf/Human Control', 'Potion of Gnome Control', 'Potion of Halfling Control', 'Potion of Half-Orc Control', 'Potion of Human Control', 'Potion of Monstrous Humanoid Control', 'Potion of Invisibility', 'Potion of Invulnerability', 'Potion of Levitation', 'Potion of Longevity', 'Potion of Plant Control', 'Potion of Polymorph Self', 'Potion of Rainbow Hues', 'Potion of Speed', 'Potion of Super-Heroism ', 'Potion of Sweet Water', 'Potion of Treasure Finding', 'Potion of Undead Ghast Control', 'Potion of Undead Ghost Control', 'Potion of Undead Ghoul Control', 'Potion of Undead Shadow Control', 'Potion of Undead Skeleton Control', 'Potion of Undead Spectre Control', 'Potion of Undead Vampire Control', 'Potion of Undead Wight Control', 'Potion of Undead Wraith Control', 'Potion of Undead Zombie Control', 'Potion of Ventriloquism', 'Potion of Vitality', 'Potion of Water Breathing'); }
	$potqty = count($t_potions);
	$t_count = 0;
}
else if ($x_package == "Swords & Six-Siders")
{
	$bottom_notices = 18;
	$t_potions = array('Poison', 'Potion of Flying', 'Potion of Gaseous Form', 'Potion of Giant Strength', 'Potion of Growth', 'Potion of Healing', 'Potion of Invisibility', 'Potion of Levitation', 'Potion of Neutralize Poison', 'Potion of Remove Disease', 'Potion of Remove Paralysis', 'Potion of Shrinking', 'Potion of Stone to Flesh');
	$potqty = count($t_potions);
	$t_count = 0;
}
else if ($x_package == "BFRPG")
{
	$bottom_notices = 11;
	$t_potions = array('Potion of Clairaudience', 'Potion of Clairvoyance', 'Potion of Control Animal', 'Potion of Control Dragon', 'Potion of Control Giant', 'Potion of Control Human', 'Potion of Control Plant', 'Potion of Control Undead', 'Potion of Delusion', 'Potion of Diminution', 'Potion of ESP', 'Potion of Fire Resistance', 'Potion of Flying', 'Potion of Gaseous Form', 'Potion of Giant Strength', 'Potion of Growth', 'Potion of Healing', 'Potion of Heroism', 'Potion of Invisibility', 'Potion of Invulnerability', 'Potion of Levitation', 'Potion of Longevity', 'Poison', 'Potion of Polymorph Self', 'Potion of Speed', 'Potion of Treasure Finding');
	$potqty = count($t_potions);
	$t_count = 0;
}
else if ($x_package == "Swords & Wizardry")
{
	$bottom_notices = 5;
	$t_potions = array('Potion of Animal Control', 'Potion of Clairaudience', 'Potion of Clairvoyance', 'Potion of Diminution', 'Potion of Dragon Control (Black)', 'Potion of Dragon Control (Blue)', 'Potion of Dragon Control (Gold)', 'Potion of Dragon Control (Green)', 'Potion of Dragon Control (Red)', 'Potion of Dragon Control (White)', 'Potion of Ethereality', 'Potion of Fire Resistance', 'Potion of Flying', 'Potion of Frozen Concoction', 'Potion of Gaseous Form', 'Potion of Giant Strength', 'Potion of Growth', 'Potion of Heroism', 'Potion of Invisibility', 'Potion of Invulnerability', 'Potion of Levitation', 'Potion of Plant Control', 'Poison', 'Potion of Slipperiness', 'Potion of Treasure Finding', 'Potion of Undead Control', 'Potion of Extra Healing', 'Potion of Healing');
	$potqty = count($t_potions);
	$t_count = 0;
}

if ($tt_mg_list > 0)
{ ?>

<div align="center">

<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
	<tr>
		<td>

	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td width="344"><img src="pics_tools/tt_bw_logo.jpg"></td>
			<td align="right"><img src="pics_tools/potions_logo.jpg"><br>Here is a complete listing of potions for use in the<br>Tunnels &amp; Trolls&trade; fantasy role-playing game.</td>
		</tr>
	</table>
<?php }
else
{
	echo "<p style='margin-top: 0; margin-bottom: 0' align='center'><img border='0' src='pics_tools/tools_potions.jpg'>";
}

if (($x_package == "Tunnels & Trolls 5th Edition") || ($x_package == "Tunnels & Trolls 7th Edition") || ($x_package == "Tunnels & Trolls Deluxe"))
{
	$bottom_notices = 7;
	$ttpots = 0;

	if ($tt_mg_list == 0){echo "<br>&nbsp;";}
	echo "<table border='0' cellpadding='3' cellspacing='0' width='100%'>";

	while ($ttpots < 69) :

		$level = mt_rand(5,15);
		$poisonuse = "this poison can be put on weapons";
		$effective = "but is only effective for " . mt_rand(2,17) . " hits with the weapon before it loses effectiveness";

		switch (mt_rand(0,5))
		{
			case 0:	$lqud = "Potion";		break;
			case 1:	$lqud = "Elixir";		break;
			case 2:	$lqud = "Concoction";	break;
			case 3:	$lqud = "Draught";		break;
			case 4:	$lqud = "Liquid";		break;
			case 5:	$lqud = "Mixture";		break;
		}

		switch ($ttpots)
		{
			case 0: $item = "Acid Resistance " . $lqud . " (rub on self or items...lasts until acid is splashed on them)";	break;
			case 1:	$item = "Animal Domination " . $lqud . " (lasts for " . ($level+1) . " hours)";	break;
			case 2: $item = "Blessing " . $lqud . " (drinker will have a curse lifted, or it can be poured on an item to remove a curse from it)";	break;
			case 3: $item = "Bluntness " . $lqud . " (any blunt weapon it is rubbed on has an extra " . mt_rand(2,4) . " dice for  " . ($level+1) . " hours)";	break;
			case 4: $item = "Cleansing " . $lqud . " (drinker will have a curse lifted, or it can be poured on an item to remove a curse from it)";	break;
			case 5: $item = "Cold Resistance " . $lqud . " (lasts for " . ($level+1) . " hours)";	break;
			case 6: $item = "Curare Poison (" . $poisonuse . "...which the opponent loses combat adds for every hit by the poisoned weapon..." . $effective . ")";	break;
			case 7:	$item = "Curing " . $lqud . " (cures disease and illness)";	break;
			case 8: $item = "Cursed " . $lqud . " (" . curseType($level,drinker,item,$x_package) . ")";	break;
			case 9: $item = "Dexterity " . $lqud . " (increases the drinker's " . abilityTranslate($x_package,DEX) . " by 5 for " . ($level+1) . " hours)";	break;
			case 10:$item = "Disenchanting " . $lqud . " (remove enchantments on those it is rubbed on)";	break;
			case 11:$item = "Dragon Breath " . $lqud . " (drinker can breath fire instead of a normal attack with a 6+6)";	break;
			case 12:$item = "Dragon Domination " . $lqud . " (lasts for " . ($level+1) . " hours)";	break;
			case 13:$item = "Dragon Venom (" . $poisonuse . "...which the opponent suffers an additional 4 hits of damage from the weapon..." . $effective . ")";	break;
			case 14:$item = "Elemental Protection " . $lqud . " (lasts for " . ($level+1) . " hours)";	break;
			case 15:$item = "Etherealness " . $lqud . " (can pass through " . mt_rand(2,10) . " feet thick walls for " . ($level+5) . " minutes)";	break;
			case 16:$item = "Fire Resistance " . $lqud . " (lasts for " . ($level+1) . " hours)";	break;
			case 17:$item = "Flaming " . $lqud . " (burns as soon as it is exposed to air for " . ($level+1) . " hours)";	break;
			case 18:$item = "Flying " . $lqud . " (lasts for " . ($level+10) . " minutes)";	break;
			case 19:$item = "Giant Domination " . $lqud . " (lasts for " . ($level+1) . " hours)";	break;
			case 20:$item = "Giant Strength " . $lqud . " (increases the drinker's " . abilityTranslate($x_package,STR) . " by 10 for " . ($level+1) . " hours)";	break;
			case 21:$item = "Growing " . $lqud . " (drinker and items grow to 4x normal size for " . ($level+1) . " minutes)";	break;
			case 22:$item = "Healing " . $lqud . " (restores " . mt_rand(1,2) . "d6+" . $level . " " . abilityTranslate($x_package,CON) . ")";	break;
			case 23:$item = "Hellfire Juice (" . $poisonuse . "...which the opponent takes additional damage [1st time is 1d6 - 2nd time is 2d6 - 3rd time is 3d6 - ect] from hits by the weapon..." . $effective . ")";	break;
			case 24:$item = "Heroic " . $lqud . " (drinker gets to add an extra dice to everything they do for " . ($level *2) . " minutes)";	break;
			case 25:$item = "Humanoid Domination " . $lqud . " (lasts for " . ($level+1) . " hours)";	break;
			case 26:$item = "Infernal " . $lqud . " (" . curseType($level,drinker,item,$x_package) . ")";	break;
			case 27:$item = "Intellect " . $lqud . " (increases the drinker's " . abilityTranslate($x_package,INT) . " by 5 for " . ($level+1) . " hours)";	break;
			case 28:$item = "Invisibility " . $lqud . " (lasts for " . ($level+1) . " minutes)";	break;
			case 29:$item = "Invulnerable " . $lqud . " (lasts for " . ($level *2) . " minutes)";	break;
			case 30:$item = "Levitation " . $lqud . " (can levitate " . mt_rand(1,6) . " feet off the ground for " . ($level+10) . " minutes)";	break;
			case 31:$item = "Life Giving " . $lqud . " (brings those back from the dead)";	break;
			case 32:$item = "Lore " . $lqud . " (can identify and appraise any item " . (($level+1)*10) . " minutes)";	break;
			case 33:$item = "Luck " . $lqud . " (increases the drinker's " . abilityTranslate($x_package,LCK) . " by 5 for " . ($level+1) . " hours)";	break;
			case 34:$item = "Lycanthropy " . $lqud . " (drinker will turn into a " . lycanthrope() . " for " . mt_rand(2,12) . " hours, but is not permanent and it unaffects those suffering from lycanthropy)";	break;
			case 35:$item = "Lying " . $lqud . " (drinker can convincely tell lies for " . mt_rand(10,20) . " minutes)";	break;
			case 36:$item = "Manbane Paste (" . $poisonuse . "...causes 2d6 damage and a 1d6 reduction from a character`s two highest attributes..." . $effective . ")";	break;
			case 37:$item = "Mandrake Powder (" . $poisonuse . "...where the victim loses 1/10th of their " . abilityTranslate($x_package,CON) . " permanently..." . $effective . ")";	break;
			case 38:$item = "Mind Reading " . $lqud . " (lasts for " . ($level *2) . " minutes)";	break;
			case 39:$item = "Mist " . $lqud . " (drinker and items turn to mist for " . ($level *2) . " minutes)";	break;
			case 40:
					if ($x_package == "Tunnels & Trolls 5th Edition"){$item = "Naga Spittle (" . $poisonuse . "...where it reduces " . abilityTranslate($x_package,INT) . " by half...down to 1 where the victim would fall unconscious..." . $effective . ")";}
					else {$item = "Naga Spittle (" . $poisonuse . "...where it reduces " . abilityTranslate($x_package,INT) . " and " . abilityTranslate($x_package,WIZ) . " by half their maximum...down to 1 where the victim would fall unconscious..." . $effective . ")";}
				break;
			case 41:$item = "Persuasive " . $lqud . " (can convince others to so something non-life threatening for " . ($level *2) . " minutes)";	break;
			case 42:$item = "Plant Control " . $lqud . " (lasts for " . ($level+1) . " hours)";	break;
			case 43:$item = "Poison Antidote (allows +" . $level . " for any SR against poison)";	break;
			case 44:$item = "Poison Cure " . $lqud . " (can cure any poison if consumed quick enough)";	break;
			case 45:$item = "Poison Immunity " . $lqud . " (can provide poison immunity for " . mt_rand(2,24) . " hours)";	break;
			case 46:$item = "Polymorph " . $lqud . " (can turn into another creature the same size for " . ($level+1) . " hours)";	break;
			case 47:$item = "Purity " . $lqud . " (turns impure liquids to pure)";	break;
			case 48:$item = "Scorpion Venom (" . $poisonuse . "...and it will reduce a victim`s combat adds to 75%..." . $effective . ")";	break;
			case 49:$item = "Secret Doors " . $lqud . " (drinker can see secret doors and compartments for about an hour)";	break;
			case 50:$item = "Sharpening " . $lqud . " (any sharp weapon it is rubbed on has an extra " . mt_rand(2,4) . " dice for  " . ($level+1) . " hours)";	break;
			case 51:$item = "Shrinking " . $lqud . " (drinker and items shrink to 5% normal size for " . ($level+1) . " minutes)";	break;
			case 52:$item = "Slippery " . $lqud . " (poured on the floor where anyone slips and falls)";	break;
			case 53:$item = "Speech " . $lqud . " (can talk in the same language as the one you are trying to converse with for " . (($level+1)*10) . " minutes)";	break;
			case 54:$item = "Speed " . $lqud . " (increases the drinker's " . abilityTranslate($x_package,SPD) . " by 5 for " . ($level+1) . " hours)";	break;
			case 55:$item = "Spider " . $lqud . " (can walk on walls and ceilings for " . (($level+1)*10) . " minutes)";	break;
			case 56:$item = "Spider Venom (" . $poisonuse . "...and can only affect human sized creatures or smaller...where they will suffer paralysis...which wears off after 5 combat rounds..." . $effective . ")";	break;
			case 57:$item = "Stone-Fish Toxin (" . $poisonuse . "...where the opponent hit would suffer 3d6 damage and make an L1SR vs. " . abilityTranslate($x_package,CON) . " or drop dead..." . $effective . ")";	break;
			case 58:$item = "Super Heroic " . $lqud . " (drinker gets to add two extra dice to everything they do for " . ($level *2) . " minutes)";	break;
			case 59:$item = "Swimming " . $lqud . " (drinker can move through water as though they are moving on land for an hour)";	break;
			case 60:$item = "Treasure Seeking " . $lqud . " (can find nearby treasure for " . ($level*2) . " minutes)";	break;
			case 61:$item = "Truthfulness " . $lqud . " (drinker tells nothing but the truth for " . mt_rand(10,20) . " minutes unless they may an " . TTSaves($level) . " vs. " . abilityTranslate($x_package,INT) . ")";	break;
			case 62:$item = "Undead Domination " . $lqud . " (lasts for " . ($level+1) . " hours)";	break;
			case 63:$item = "Underwater Breathing " . $lqud . " (lasts for " . ($level + 1) . " hours)";	break;
			case 64:$item = "Ventriloquism " . $lqud . " (drinker can throw their voice " . mt_rand(10,20) . " minutes)";	break;
			case 65:$item = "Vile " . $lqud . " (" . curseType($level,drinker,item,$x_package) . ")";	break;
			case 66:$item = "Werebane Syrup (" . $poisonuse . "...does 2 extra damage to non-weres, but weres suffer 4x damage from the weapon and must make an L2SR vs. " . abilityTranslate($x_package,CON) . " or take 8d6 damage [if the SR fails, they are cured of lycanthropy]..." . $effective . ")";	break;
			case 67:$item = "Wolfbane Powder (" . $poisonuse . "...where the opponent suffers a loss of 3 points where going to 0 kills the victim..." . $effective . ")";	break;
			case 68:$item = "Youth " . $lqud . " (drinker becomes " . mt_rand(2,20) . " years younger)";	break;
		}
		$ttpots = $ttpots + 1;

		echo "<tr><td width='20' valign='top' style='border-top-style: solid; border-top-width: 1px'><font size='2'>" . $ttpots . ".</font></td>";
		echo "<td style='border-top-style: solid; border-top-width: 1px'><font size='2'>" . $item . "&nbsp;-&nbsp;" . potionPretty() . "</font></td></tr>";

	endwhile;

	echo "</table>";
}
else
{
	echo "</p><hr>";
	$bottles = $potqty;

	while ($bottles > 0) :
		if ($t_potions > 0){$potluck = $t_potions[$t_count] . " - ";}
		echo $potluck . "" . potionPretty() . "<br>";
		$bottles = $bottles - 1;
		$t_count = $t_count + 1;
	endwhile;
}

if ($tt_mg_list > 0)
{ ?>
		</td>
	</tr>
</table>

</div>

<?php }

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>