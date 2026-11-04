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

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Alchemy Recipes</p>";
	echo "<p style='text-align: justify;'>Here you can generate a random set of alchemy recipes for use in your fantasy role-playing game. Simply choose a game, and a value range of gold that you want the reagents to cost.";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_game'>";
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cell">Reagent Values:</span>
				<span class="cell">
					<select id="DropOption" name="x_value1"><?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option style='color:#FFFFFF'>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>&nbsp;&nbsp;&amp;&nbsp;&nbsp;
					<select id="DropOption" name="x_value2"><?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option style='color:#FFFFFF'>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>&nbsp;&nbsp;gold</font>
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

$bottles = 0;
$mix_array = array();
$t_count = 0;

$game = $_POST['x_game'];
$ua = $_SESSION["SESSION_ADD_UA"] = $_POST['ua']+0;
$potion = $_POST['x_potion'];
$value1 = $_POST['x_value1'];
$value2 = $_POST['x_value2'];
	if ($value1 > $value2){$value2 = $value1;}

////////////////////////////////////////////////////
if ($game == "OSRIC")
{
	$game = "OSRIC";
	$bottom_notices = 1;
	$t_potions = array('Oil of Etherealness', 'Oil of Slipperiness', 'Philtre of Love', 'Philtre of Persuasiveness', 'Potion of Animal Control (Amphibians & Reptiles)', 'Potion of Animal Control (Amphibians, Reptiles, & Fish)', 'Potion of Animal Control (Any)', 'Potion of Animal Control (Avian)', 'Potion of Animal Control (Fish)', 'Potion of Animal Control (Mammal & Avian)', 'Potion of Animal Control (Mammal)', 'Potion of Clairaudience', 'Potion of Clairvoyance', 'Potion of Climbing', 'Potion of Diminution', 'Potion of Dragon Control (Black)', 'Potion of Dragon Control (Blue)', 'Potion of Dragon Control (Brass)', 'Potion of Dragon Control (Bronze)', 'Potion of Dragon Control (Copper)', 'Potion of Dragon Control (Evil)', 'Potion of Dragon Control (Gold)', 'Potion of Dragon Control (Good)', 'Potion of Dragon Control (Green)', 'Potion of Dragon Control (Red)', 'Potion of Dragon Control (Silver)', 'Potion of Dragon Control (White)', 'Potion of ESP', 'Potion of Extra-Healing', 'Potion of Gaseous Form', 'Potion of Giant Control (Cloud)', 'Potion of Giant Control (Fire)', 'Potion of Giant Control (Frost)', 'Potion of Giant Control (Hill)', 'Potion of Giant Control (Stone)', 'Potion of Giant Control (Storm)', 'Potion of Giant Strength (Cloud)', 'Potion of Giant Strength (Fire)', 'Potion of Giant Strength (Frost)', 'Potion of Giant Strength (Hill)', 'Potion of Giant Strength (Stone)', 'Potion of Giant Strength (Storm)', 'Potion of Growth', 'Potion of Healing', 'Potion of Heroism', 'Potion of Human Control (Dwarves)', 'Potion of Human Control (Elves & Half-Elves)', 'Potion of Human Control (Gnomes)', 'Potion of Human Control (Halflings)', 'Potion of Human Control (Half-Orcs)', 'Potion of Human Control (Humans)', 'Potion of Human Control (Humans, Elves & Half-Elves)', 'Potion of Human Control (Orcs, Gnolls, Goblinoids, etc)', 'Potion of Invisibility', 'Potion of Invulnerability', 'Potion of Levitaion', 'Potion of Longevity', 'Potion of Plant Control', 'Potion of Polymorph', 'Potion of Speed', 'Potion of Super-Heroism', 'Potion of Sweet Water', 'Potion of Treasure Finding', 'Potion of Undead Control (Ghasts)', 'Potion of Undead Control (Ghosts)', 'Potion of Undead Control (Ghouls)', 'Potion of Undead Control (Shadows)', 'Potion of Undead Control (Skeletons)', 'Potion of Undead Control (Spectres)', 'Potion of Undead Control (Vampires)', 'Potion of Undead Control (Wights)', 'Potion of Undead Control (Wraiths)', 'Potion of Undead Control (Zombies)', 'Potion of Water Breathing');
	$bottles = count($t_potions);

	$info = "This is a set of alchemy recipes for use with the OSRIC&trade; role-playing game.";
}
else if ($game == "Labyrinth Lord")
{
	$bottom_notices = 2;
	$aec = $_SESSION["SESSION_ADD_AEC"] = $_POST['aec']+0;
	if ($aec > 0){$t_potions = array('Animal Control', 'Clairaudience', 'Clairvoyance', 'Climbing', 'Delusion', 'Diminution', 'Black Dragon Control', 'Blue Dragon Control', 'Brass Dragon Control', 'Bronze Dragon Control', 'Copper Dragon Control', 'Gold Dragon Control', 'Green Dragon Control', 'Red Dragon Control', 'Silver Dragon Control', 'White Dragon Control', 'ESP', 'Extra-Healing', 'Fire Resistance', 'Flying', 'Gaseous Form', 'Cloud Giant Control', 'Fire Giant Control', 'Frost Giant Control', 'Hill Giant Control', 'Stone Giant Control', 'Storm Giant Control', 'Giant Strength', 'Growth', 'Healing', 'Heroism', 'Dwarf Control', 'Elf Control', 'Elf & Human Control', 'Gnome Control', 'Halfling Control', 'Human Control', 'Other Humanoid Control', 'Invisibility', 'Invulnerability', 'Levitation', 'Longevity', 'Oil of Etherealness', 'Oil of Slipperiness', 'Philter of Love', 'Plant Control', 'Poison', 'Polymorph', 'Speed', 'Super-Heroism', 'Sweet Water', 'Treasure Finding', 'Undead Control', 'Water Breathing');}
	else {$t_potions = array('Animal Control', 'Clairaudience', 'Clairvoyance', 'Climbing', 'Delusion', 'Diminution', 'Black Dragon Control', 'Blue Dragon Control', 'Gold Dragon Control', 'Green Dragon Control', 'Red Dragon Control', 'White Dragon Control', 'ESP', 'Extra-Healing', 'Fire Resistance', 'Flying', 'Gaseous Form', 'Cloud Giant Control', 'Fire Giant Control', 'Frost Giant Control', 'Hill Giant Control', 'Stone Giant Control', 'Storm Giant Control', 'Giant Strength', 'Growth', 'Healing', 'Heroism', 'Dwarf Control', 'Elf Control', 'Elf & Human Control', 'Gnome Control', 'Halfling Control', 'Human Control', 'Other Humanoid Control', 'Invisibility', 'Invulnerability', 'Levitation', 'Longevity', 'Oil of Etherealness', 'Oil of Slipperiness', 'Philter of Love', 'Plant Control', 'Poison', 'Polymorph', 'Speed', 'Super-Heroism', 'Sweet Water', 'Treasure Finding', 'Undead Control', 'Water Breathing');}
	$bottles = count($t_potions);
	$info = "This is a set of alchemy recipes for use with the Labyrinth Lord&trade; role-playing game.";
}
else if ($game == "BD&D")
{
	$bottom_notices = 13;
	$t_potions = array('Poison', 'Clairaudience', 'Clairvoyance', 'Control Animal', 'Control Black Dragon', 'Control Blue Dragon', 'Control Cloud Giant', 'Control Fire Giant', 'Control Frost Giant', 'Control Gold Dragon', 'Control Green Dragon', 'Control Hill Giant', 'Control Human', 'Control Plant', 'Control Red Dragon', 'Control Stone Giant', 'Control Storm Giant', 'Control Undead', 'Control White Dragon', 'Delusion', 'Diminution', 'ESP', 'Fire Resistance', 'Flying', 'Gaseous Form', 'Giant Strength', 'Growth', 'Healing', 'Heroism', 'Invisibility', 'Invulnerability', 'Levitation', 'Longevity', 'Polymorph Self', 'Speed', 'Treasure Finding');
	$bottles = count($t_potions);
	$info = "This is a set of alchemy recipes for use with the Dungeons & Dragons (1981) role-playing game.";
}
else if ($game == "Swords & Six-Siders")
{
	$bottom_notices = 18;
	$t_potions = array('Poison', 'Flying', 'Gaseous Form', 'Giant Strength', 'Growth', 'Healing', 'Invisibility', 'Levitation', 'Neutralize Poison', 'Remove Disease', 'Remove Paralysis', 'Shrinking', 'Stone to Flesh');
	$bottles = count($t_potions);
	$info = "This is a set of alchemy recipes for use with the Swords & Six-Siders&trade; role-playing game.";
}
else if ($game == "AD&D")
{
	$bottom_notices = 13;
	if ($ua != 1){ $t_potions = array('Oil of Etherealness', 'Oil of Slipperiness', 'Philter of Love', 'Philter of Persuasiveness', 'Poison', 'Potion of All Animal Control', 'Potion of Avian Control', 'Potion of Fish Control', 'Potion of Mammal/Marsupial Control', 'Potion of Mammal/Marsupial/Avian Control', 'Potion of Reptile/Amphbian/Fish Control', 'Potion of Reptile/Amphibian Control', 'Potion of Clairaudience', 'Potion of Clairvoyance', 'Potion of Climbing', 'Potion of Delusion', 'Potion of Diminution', 'Potion of Black Dragon Control', 'Potion of Blue Dragon Control', 'Potion of Brass Dragon Control', 'Potion of Bronze Dragon Control', 'Potion of Copper Dragon Control', 'Potion of Evil Dragon Control', 'Potion of Gold Dragon Control', 'Potion of Good Dragon Control', 'Potion of Green Dragon Control', 'Potion of Red Dragon Control', 'Potion of Silver Dragon Control', 'Potion of White Dragon Control', 'Potion of ESP', 'Potion of Extra-Healing', 'Potion of Fire Resistance', 'Potion of Flying', 'Potion of Gaseous Form', 'Potion of Cloud Giant Control', 'Potion of Fire Giant Control', 'Potion of Frost Giant Control', 'Potion of Hill Giant Control', 'Potion of Stone Giant Control', 'Potion of Storm Giant Control', 'Potion of Cloud Giant Strength', 'Potion of Fire Giant Strength', 'Potion of Frost Giant Strength', 'Potion of Hill Giant Strength', 'Potion of Stone Giant Strength', 'Potion of Storm Giant Strength', 'Potion of Growth', 'Potion of Healing', 'Potion of Heroism', 'Potion of Dwarf Control', 'Potion of Elf/Half-Elf Control', 'Potion of Elf/Half-Elf/Human Control', 'Potion of Gnome Control', 'Potion of Halfling Control', 'Potion of Half-Orc Control', 'Potion of Human Control', 'Potion of Monstrous Humanoid Control', 'Potion of Invisibility', 'Potion of Invulnerability', 'Potion of Levitation', 'Potion of Longevity', 'Potion of Plant Control', 'Potion of Polymorph Self', 'Potion of Speed', 'Potion of Super-Heroism ', 'Potion of Sweet Water', 'Potion of Treasure Finding', 'Potion of Undead Ghast Control', 'Potion of Undead Ghost Control', 'Potion of Undead Ghoul Control', 'Potion of Undead Shadow Control', 'Potion of Undead Skeleton Control', 'Potion of Undead Spectre Control', 'Potion of Undead Vampire Control', 'Potion of Undead Wight Control', 'Potion of Undead Wraith Control', 'Potion of Undead Zombie Control', 'Potion of Water Breathing'); }
	else { $t_potions = array('Elixir of Health', 'Elixir of Life', 'Elixir of Madness', 'Elixir of Youth', 'Oil of Acid Resistance', 'Oil of Disenchantment', 'Oil of Elemental Invulnerability', 'Oil of Etherealness', 'Oil of Fiery Burning', 'Oil of Fumbling', 'Oil of Impact', 'Oil of Sharpness +1', 'Oil of Sharpness +2', 'Oil of Sharpness +3', 'Oil of Sharpness +4', 'Oil of Sharpness +5', 'Oil of Sharpness +6', 'Oil of Slipperiness', 'Oil of Timelessness', 'Philter of Beauty', 'Philter of Glibness', 'Philter of Love', 'Philter of Persuasiveness', 'Philter of Stammering & Stuttering', 'Poison', 'Potion of All Animal Control', 'Potion of Avian Control', 'Potion of Fish Control', 'Potion of Mammal/Marsupial Control', 'Potion of Mammal/Marsupial/Avian Control', 'Potion of Reptile/Amphbian/Fish Control', 'Potion of Reptile/Amphibian Control', 'Potion of Clairaudience', 'Potion of Clairvoyance', 'Potion of Climbing', 'Potion of Delusion', 'Potion of Diminution', 'Potion of Black Dragon Control', 'Potion of Blue Dragon Control', 'Potion of Brass Dragon Control', 'Potion of Bronze Dragon Control', 'Potion of Copper Dragon Control', 'Potion of Evil Dragon Control', 'Potion of Gold Dragon Control', 'Potion of Good Dragon Control', 'Potion of Green Dragon Control', 'Potion of Red Dragon Control', 'Potion of Silver Dragon Control', 'Potion of White Dragon Control', 'Potion of ESP', 'Potion of Extra-Healing', 'Potion of Fire Breath', 'Potion of Fire Resistance', 'Potion of Flying', 'Potion of Gaseous Form', 'Potion of Cloud Giant Control', 'Potion of Fire Giant Control', 'Potion of Frost Giant Control', 'Potion of Hill Giant Control', 'Potion of Stone Giant Control', 'Potion of Storm Giant Control', 'Potion of Cloud Giant Strength', 'Potion of Fire Giant Strength', 'Potion of Frost Giant Strength', 'Potion of Hill Giant Strength', 'Potion of Stone Giant Strength', 'Potion of Storm Giant Strength', 'Potion of Growth', 'Potion of Healing', 'Potion of Heroism', 'Potion of Dwarf Control', 'Potion of Elf/Half-Elf Control', 'Potion of Elf/Half-Elf/Human Control', 'Potion of Gnome Control', 'Potion of Halfling Control', 'Potion of Half-Orc Control', 'Potion of Human Control', 'Potion of Monstrous Humanoid Control', 'Potion of Invisibility', 'Potion of Invulnerability', 'Potion of Levitation', 'Potion of Longevity', 'Potion of Plant Control', 'Potion of Polymorph Self', 'Potion of Rainbow Hues', 'Potion of Speed', 'Potion of Super-Heroism ', 'Potion of Sweet Water', 'Potion of Treasure Finding', 'Potion of Undead Ghast Control', 'Potion of Undead Ghost Control', 'Potion of Undead Ghoul Control', 'Potion of Undead Shadow Control', 'Potion of Undead Skeleton Control', 'Potion of Undead Spectre Control', 'Potion of Undead Vampire Control', 'Potion of Undead Wight Control', 'Potion of Undead Wraith Control', 'Potion of Undead Zombie Control', 'Potion of Ventriloquism', 'Potion of Vitality', 'Potion of Water Breathing'); }
	$bottles = count($t_potions);
	$info = "This is a set of alchemy recipes for use with the Advanced Dungeons & Dragons (1979) role-playing game.";
}
else if ($game == "Swords & Wizardry")
{
	$bottom_notices = 5;
	$t_potions = array('Animal Control', 'Clairaudience', 'Clairvoyance', 'Diminution', 'Dragon Control (Black)', 'Dragon Control (Blue)', 'Dragon Control (Gold)', 'Dragon Control (Green)', 'Dragon Control (Red)', 'Dragon Control (White)', 'Ethereality', 'Fire Resistance', 'Flying', 'Frozen Concoction', 'Gaseous Form', 'Giant Strength', 'Growth', 'Heroism', 'Invisibility', 'Invulnerability', 'Levitation', 'Plant Control', 'Poison', 'Slipperiness', 'Treasure Finding', 'Undead Control', 'Extra Healing', 'Healing');
	$bottles = count($t_potions);
	$info = "This is a set of alchemy recipes for use with the Swords &amp; Wizardry&trade; role-playing game.";
}
else if ($game == "BFRPG")
{
	$bottom_notices = 11;
	$t_potions = array('Clairaudience', 'Clairvoyance', 'Control Animal', 'Control Dragon', 'Control Giant', 'Control Human', 'Control Plant', 'Control Undead', 'Delusion', 'Diminution', 'ESP', 'Fire Resistance', 'Flying', 'Gaseous Form', 'Giant Strength', 'Growth', 'Healing', 'Heroism', 'Invisibility', 'Invulnerability', 'Levitation', 'Longevity', 'Poison', 'Polymorph Self', 'Speed', 'Treasure Finding');
	$bottles = count($t_potions);
	$info = "This is a set of alchemy recipes for use with the Basic Fantasy Role-Playing Game.";
}
else
{
	$bottom_notices = 7;
	$info = "This is a set of alchemy recipes in Magestykc&trade;, for use with the Tunnels &amp; Trolls&trade; role-playing game.&nbsp; Each potion is described in detail along with the recipe, and also the SR needed to successfully make it.";
}


////////////////////////////////////////////////////
?>

<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
</style>

<div align="center">
<table border="0" cellpadding="0" cellspacing="0" width="700">
	<tr>
		<td>
		<p style="margin-top: 0; margin-bottom: 0"><img border="0" src="pics_tools/alchemy_potions.jpg" width="478" height="54"></p>
		<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="47"><img border="0" src="pics_tools/alchemy_potions_icon.jpg"></td>
					<td><?php echo $info; ?></td>
				</tr>
			</table>
		<hr>
		<table border="0" cellpadding="0" cellspacing="0" width="100%"><?php

			if (($game == "OSRIC") || ($game == "AD&D") || ($game == "Swords & Six-Siders") || ($game == "BD&D") || ($game == "BFRPG") || ($game == "Labyrinth Lord") || ($game == "Swords & Wizardry"))
			{
				while ($bottles > 0) : $potion = $t_potions[$t_count]; $recipe = ttPotionMixer($game); $t_count = $t_count + 1; if ($game == "OSRIC" || $game == "AD&D" || $game == "BD&D"){} else {$potion = "Potion of " . $potion;} ?>
				<tr>
					<td style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><font size="2"><?php echo $potion; ?></font></td>
					<td NOWRAP style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
					<td style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><font size="2"><?php echo potionPretty() . "&nbsp; " . $recipe[5]; ?></font></td>
				</tr>
				<?php
						if ( strlen($recipe[0]) > 2 ){array_push($mix_array, $recipe[0]);}
						if ( strlen($recipe[1]) > 2 ){array_push($mix_array, $recipe[1]);}
						if ( strlen($recipe[2]) > 2 ){array_push($mix_array, $recipe[2]);}
						if ( strlen($recipe[3]) > 2 ){array_push($mix_array, $recipe[3]);}
						if ( strlen($recipe[4]) > 2 ){array_push($mix_array, $recipe[4]);}
					$bottles = $bottles - 1;
				endwhile;
			}
			else
			{
				while ($bottles < 58) : $potion = ttPotionMaker($game,$bottles); $recipe = ttPotionMixer($game); ?>
				<tr>
					<td NOWRAP style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><font size="2"><?php echo ucwords($potion[0]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<br>&nbsp;-&nbsp;<?php echo $potion[2]; ?> vs. INT</font></td>
					<td style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><font size="2"><?php echo ucfirst($potion[1]) . ".&nbsp; " . potionPretty() . "&nbsp; " . $recipe[5]; ?></font></td>
				</tr>
				<?php
						if ( strlen($recipe[0]) > 2 ){array_push($mix_array, $recipe[0]);}
						if ( strlen($recipe[1]) > 2 ){array_push($mix_array, $recipe[1]);}
						if ( strlen($recipe[2]) > 2 ){array_push($mix_array, $recipe[2]);}
						if ( strlen($recipe[3]) > 2 ){array_push($mix_array, $recipe[3]);}
						if ( strlen($recipe[4]) > 2 ){array_push($mix_array, $recipe[4]);}
					$bottles = $bottles + 1;
				endwhile;
			}
		?></table>

<?php
	$my_mix = "";
	$line = 1;
	sort($mix_array);
	$sh_cycle = count($mix_array);
	$i = 0;
?>
		<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="47"><img border="0" src="pics_tools/alchemy_potions_icon.jpg"></td>
					<td>Alchemists sell the below items with the following prices...</td>
				</tr>
			</table>
		<hr>
			<table border="0" cellpadding="2" cellspacing="0" width="100%">
				<?php while ($sh_cycle > 0) :
					if ($my_mix != $mix_array[$i])
					{
						$my_mix = $mix_array[$i];
						if ($line == 1){echo "<tr><td style='border-bottom-style: solid; border-bottom-width: 1px' NOWRAP><font size='2'>" . ucwords($mix_array[$i]) . ", " . ttbottlePicker() . "</font></td><td NOWRAP style='border-bottom-style: solid; border-bottom-width: 1px'  align='right' width='40'><font size='2'>" . mt_rand($value1,$value2) . "gp</font></td><td NOWRAP width='20'><font size='2'>&nbsp;</font></td>"; $line = 0;}
						else {echo "<td NOWRAP style='border-bottom-style: solid; border-bottom-width: 1px'><font size='2'>" . ucwords($mix_array[$i]) . ", " . ttbottlePicker() . "</font></td><td NOWRAP style='border-bottom-style: solid; border-bottom-width: 1px' width='40' align='right'><font size='2'>" . mt_rand($value1,$value2) . "gp</font></td></tr>"; $line = 1;}
					}
					$i=$i+1;
					$sh_cycle = $sh_cycle - 1;
				endwhile;

				if ($line != 1){echo "<td NOWRAP><font size='2'>&nbsp;</font></td><td NOWRAP width='40'><font size='2'>&nbsp;</font></td></tr>";}
				?>
			</table>
		</td>
	</tr>
</table>
</div><?php

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>