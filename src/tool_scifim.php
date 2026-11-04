<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Mutant Future";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' target='_blank' method='POST' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Sci-Fi Enemies</p>";
	echo "<p style='text-align: justify;'>Here you can create a completely random set of mutants, robots, or aliens for your science-fiction, or post-apocalyptic, role-playing game. Simply choose how many you want.";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_game'>";
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cell">Robots:</span>
				<span class="cell"><select size="1" id="DropOption" name="r_amount"><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cell"><?php if ($x_game == "Space Ryft"){echo "Aliens";} else {echo "Mutants";} ?>:</span>
				<span class="cell"><select size="1" id="DropOption" name="m_amount"><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>

		<?php if ($x_game != "Mutant Future"){?>
			<div class="row">
				<span class="cell">Terrain:</span>
				<span class="cell">
				<select size="1" id="DropOption" name="x_terrain">
					<option></option>
					<option value="deserts">Desert</option>
					<option value="forests">Forest</option>
					<option value="hills">Hills</option>
					<option value="jungles">Jungles</option>
					<option value="mountains">Mountains</option>
					<option value="plains & grasslands">Plains &amp; Grasslands</option>
					<option value="snow & icy regions">Snow &amp; Icy Regions</option>
					<option value="swamps & marshes">Swamps &amp; Marshes</option>
					<option value="rivers & lakes">Rivers &amp; Lakes</option>
					<option value="oceans">Oceans</option>
					<option value="underground areas">Underground Areas</option>
					<?php if ($x_game == "Broken Urthe"){?><option value="wastelands">Wastelands</option><?php } ?>
				</select>
				</span>
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

$game = $_POST['x_game'];

if ($game != "Mutant Future")
{
	$amount = $_POST['m_amount'];
	$robots = $_POST['r_amount'];
	$livein = $_POST['x_terrain'];

	if ($game == "Broken Urthe"){$bottom_notices = 8;} else {$bottom_notices = 9;}

	echo "<div align='center'><table border='0' cellpadding='0' cellspacing='0' width='700'><tr><td>";

	/////////////////////////////////////////////////////////// ROBOTS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if ($robots > 0)
	{
			if (($livein == "oceans") || ($livein == "rivers & lakes")){$liveinr = 1;}
			else if ($livein == "underground areas"){$liveinr = 2;}
			else if ($livein == ""){$liveinr = 0;}
			else {$liveinr = 3;}
		?>
			<img border="0" src="pics_tools/tools_scifim_r.jpg">
		<?php
		while ($robots > 0) :

			$bot_level = mt_rand(1,20);

			$salvage = round(100 - (($bot_level-1) * 5));

			$dwell = "Anywhere but Water";

			$have_weapons = 0;

			////////// GET THE FUEL //
				$x_fuel = array('steam', 'clockworks', 'alien technology', 'petroleum', 'electricity', 'radiation', 'plutonium', 'uranium', 'nuclear', 'xormite', 'xormite', 'xormite', 'xormite');
				$x_fuel = $x_fuel[mt_rand(0,12)];
					if (($x_fuel == "steam") || ($x_fuel == "clockworks")){ $weapon_tech = 1; $bot_stage = "Industrial";}
					else if (($x_fuel == "alien technology")){ $weapon_tech = 4; $bot_stage = "Advanced"; }
					else if (($x_fuel == "petroleum")){ $weapon_tech = 2; $bot_stage = "Industrial";}
					else if ($x_fuel == "electricity"){$weapon_tech = mt_rand(2,3); $bot_stage = "Modern";}
					else
					{	$bot_stage = "Modern";
						$weapon_tech = 3;
						$x_battery = array('batteries', 'cells', 'clips', 'liquid', 'generators');
						$x_fuel = $x_fuel . " " . $x_battery[mt_rand(0,4)];
					}

			////////// GET THE METAL & ARMOR //
				$x_metal = array('iron', 'aluminium', 'steel', 'plastoid', 'durasteel', 'crystal alloy', 'adamant', 'promethium', 'unobtainium', 'unknown metal');
					if (($x_fuel == "steam") || ($x_fuel == "clockworks")){ $i_metal = mt_rand(0,2); }
					else if (($x_fuel == "alien technology")){ $i_metal = mt_rand(5,9); }
					else { $i_metal = mt_rand(0,9); }
						$x_metal = $x_metal[$i_metal];

						if ($x_metal == "iron"){$x_armor = mt_rand(1,2);}
						else if ($x_metal == "aluminium"){$x_armor = mt_rand(2,3);}
						else if ($x_metal == "steel"){$x_armor = mt_rand(3,4);}
						else if ($x_metal == "plastoid"){$x_armor = mt_rand(5,6);}
						else if ($x_metal == "durasteel"){$x_armor = mt_rand(6,7);}
						else if ($x_metal == "crystal alloy"){$x_armor = mt_rand(7,8);}
						else if ($x_metal == "adamant"){$x_armor = mt_rand(8,9);}
						else if ($x_metal == "promethium"){$x_armor = mt_rand(9,10);}
						else if ($x_metal == "unobtainium"){$x_armor = mt_rand(10,11);}
						else {$x_armor = mt_rand(5,15);}

			////////// GET THE LEGS //
				$x_legs = array('hover', 'legs', 'legs', 'legs', 'legs', 'legs', 'propeller', 'water propulsion', 'rotor', 'stationary', 'tracks', 'treads', 'wheels', 'rockets', 'anti-gravity');
				$x_legs = $x_legs[mt_rand(0,14)];

			////////// GET THE THINKING //
				$x_iq = array('programmed', 'programmed', 'programmed', 'artificial intelligence');
				$x_iq = $x_iq[mt_rand(0,3)];

			////////// GET THE PROGRAMMING //
				if ($x_iq == "programmed")
				{
					$x_job = array('combat', 'combat', 'combat', 'combat', 'combat', 'retrieval', 'spying', 'guarding', 'escorting', 'exploration');
					$x_job = $x_job[mt_rand(0,9)];
					if ($x_legs == "stationary"){$x_job = "guarding";}
					$software = 1;
				}
				else
				{
					$software = 0;
				}

			////////// GET THE FRAME //
				$bot_size = mt_rand(3,12);
				$shape = " It is a standard robot build and is about " . $bot_size . " feet in size. ";

				$x_hands = array('claw', 'jaw', 'pincer', 'fist');
				$x_hands = $x_hands[mt_rand(0,3)];

				$attacks = mt_rand(1,2);

				if ($attacks > 1){$hitters = $attacks . " " . $x_hands . "s";}
				else{$hitters = $attacks . " " . $x_hands . "";}

				$x_hurt = array('1d4', '1d4', '1d4', '1d4', '1d4', '1d6', '1d6', '1d6', '1d6', '1d8', '1d8', '1d8', '1d10', '1d10', '1d12');
				$x_hurto = $x_hurt[mt_rand(0,14)];

				if ($attacks > 1){$hitting = $x_hurto . " " . $x_hands . " / " . $x_hurto . " " . $x_hands;}
				else {$hitting = $x_hurto . " " . $x_hands;}

					if (mt_rand(1,100) > 30){$animal = "a humanoid";}
					else
					{
						$animals = array('a bear', 'a beetle', 'a lizard', 'a crab', 'a rat', 'a scorpion', 'a snake', 'a spider', 'a tiger', 'a wolf', 'a worm', 'an ant', 'an ape', 'a dragon', 'a wasp', 'a bird', 'a bat', 'a fly', 'an eel', 'a fish', 'a dolphin', 'a shark', 'a squid', 'a sea serpent', 'a lobster');
						$animal = $animals[mt_rand(0,24)];
					}

					if ($animal != "a humanoid")
					{
						$x_legs == "legs";

						$x_pain = $x_hurt[mt_rand(0,14)];
						$x_pain2 = $x_hurt[mt_rand(0,14)];

						if (($animal == "a beetle") || ($animal == "an ant")) { $attacks = 1; $hitters = "1 pincer"; $hitting = $x_pain . " pincer"; $walkers = 6; $x_legs == "legs";}
						else if ($animal == "a wasp"){ $attacks = 1; $hitters = "1 stinger"; $hitting = $x_pain . " stinger"; $walkers = 0; $x_legs = "wings";}
						else if (($animal == "a lobster") || ($animal == "a crab"))
						{
							$attacks = 2; $hitters = "1 pincer"; $hitting = $x_pain . " pincer"; 
							if (mt_rand(1,100) > 60){$walkers = 0; $x_legs = "propeller";} else if (mt_rand(1,100) > 80){$walkers = 0; $x_legs = "water propulsion";} else {$walkers = 10; $x_legs = "legs";}
						}
						else if ($animal == "a scorpion"){ $attacks = 3; $hitters = "1 pincer / 1 tail"; $hitting = $x_pain . " pincer / " . $x_pain2 . " tail"; $walkers = 8; $x_legs = "legs";}
						else if ($animal == "a spider"){ $attacks = 1; $hitters = "1 bite "; $hitting = $x_pain . " bite"; $walkers = 8; $x_legs = "legs";}
						else if (($animal == "a bat") || ($animal == "a fly")){ $hitters = "1 bite"; $hitting = $x_pain . " bite"; $walkers = 0; $x_legs = "wings";}
						else if ($animal == "a bird"){ $hitters = "1 talon / 1 beak"; $attacks = 3; $hitting = $x_pain . " talon / " . $x_pain2 . " beak"; $walkers = 0; $x_legs = "wings";}
						else if ($animal == "an ape"){ $attacks = 2; $hitters = "1 claw"; $hitting = $x_pain . " claw"; $walkers = 2; $x_legs = "legs";}
						else if ($animal == "a squid")
						{
							$attacks = 8; $hitters = "2 tentacles "; $hitting = $x_pain . " tentacles";
							if (mt_rand(1,100) > 60){$walkers = 0; $x_legs = "propeller";} else {$walkers = 0; $x_legs = "water propulsion";}
						}
						else if (($animal == "a sea serpent") || ($animal == "a shark") || ($animal == "a dolphin") || ($animal == "a fish") || ($animal == "an eel"))
						{
							$hitters = "1 jaw "; $attacks = 1; $hitting = $x_pain . " jaw";
							if (mt_rand(1,100) > 60){$walkers = 0; $x_legs = "propeller";} else {$walkers = 0; $x_legs = "water propulsion";}
						}
						else if (($animal == "a worm") || ($animal == "a snake")){$hitters = "1 jaw "; $attacks = 1; $hitting = $x_pain . " jaw"; $walkers = 0; $x_legs = "legs";}
						else
						{
							$hitters = "1 claw / 1 jaw"; $attacks = 3; $hitting = $x_pain . " claw / " . $x_pain2 . " jaw"; $walkers = 4; $x_legs = "legs";
						}

						$shape = " It is built in the form of " . $animal . " and is about " . $bot_size . " feet in size. ";
					}
					else
					{
						$shape = " It is built in standard robotic form and is about " . $bot_size . " feet in size. ";
						$walkers = 2;
					}

				if (($walkers == 0) && ($x_legs == "legs"))
				{
					$travel = "It has no legs so it mechanically slithers around.";
				}
				else if ((($x_legs == "legs") || ($x_legs == "tracks") || ($x_legs == "treads") || ($x_legs == "wheels") || ($x_legs == "rockets")) && ($walkers > 1))
				{
					$travel = "It can move around on " . $walkers . " " . $x_legs . ".";
				}
				else if (($x_legs == "legs") || ($x_legs == "tracks") || ($x_legs == "treads") || ($x_legs == "wheels") || ($x_legs == "rockets"))
				{
					$travel = "It can move around on 2 " . $x_legs . ".";
				}
				else if (($x_legs == "hover") || ($x_legs == "propeller") || ($x_legs == "anti-gravity"))
				{
					$travel = "It can hover around with an installed " . $x_legs . " device.";
				}
				else if (($x_legs == "water propulsion") || ($x_legs == "rotor"))
				{
					$travel = "It moves only in water with an installed " . $x_legs . " device."; $dwell = "Water Only";
				}
				else if ($x_legs == "wings") 
				{
					$travel = "It can fly around with a set of wings."; $dwell = "Outdoors Only";
				}
				else {$travel = "It is stationary and cannot move around.";}

				$travel = " " . $travel . " ";

			////////// MOVEMENT //
				$movement = mt_rand(1,16);			if ($movement == 1){$moving = 30;}		else if ($movement == 2){$moving = 40;}		else if ($movement == 3){$moving = 50;}
				else if ($movement == 4){$moving = 60;}		else if ($movement == 5){$moving = 70;}		else if ($movement == 6){$moving = 80;}		else if ($movement == 7){$moving = 90;}
				else if ($movement == 8){$moving = 100;}	else if ($movement == 9){$moving = 110;}	else if ($movement == 10){$moving = 120;}	else if ($movement == 11){$moving = 130;}
				else if ($movement == 12){$moving = 140;}	else if ($movement == 13){$moving = 150;}	else if ($movement == 14){$moving = 160;}	else if ($movement == 15){$moving = 170;}
				else if ($movement == 16){$moving = 180;}	if ($x_legs == "stationary"){$moving = 0;}

			////////// NAME //

				$alienbuilt = "";

				if ($x_fuel == "alien technology")
				{
					if (mt_rand(1,100) > 25){ if (mt_rand(1,100) > 75){$aldash = "-";} else {$aldash = "";} $aliensub = alienName(); }

					$name = alienName() . "" . $aldash . "" . $aliensub;
					$name = ucfirst($name);

					$builders = mt_rand(1,6);
					if ($builders == 1){ $alienbuilt = " (built by an ancient alien race known as the " . $name . ")"; }
					else if ($builders == 2){ $alienbuilt = " (constructed by an alien race known as the " . $name . ")"; }
					else if ($builders == 3){ $alienbuilt = " (from a crashed spaceship of an alien race known as the " . $name . ")"; }
					else if ($builders == 4){ $alienbuilt = " (from an ancient war with aliens known as the " . $name . ")"; }
					else if ($builders == 5){ $alienbuilt = " (used by a group of aliens known as the " . $name . ")"; }
					else { $alienbuilt = " (left behind by race of aliens known as the " . $name . ")"; }
				}
				else
				{
					$spaces = mt_rand(4,6);
					$dashit = 0;
					$name = "";
					$perc = 100;

					while ($spaces > 0) :

						$perc = $perc - 20;
						if ((mt_rand(1,100) > $perc) && ($name != "") && ($dashit != 1)){$dashit = 1; $entf = "-";}
						if (mt_rand(1,100) > 60){$name = randLetter() . "" . $entf . "" . $name;} else {$name = mt_rand(0,9) . "" . $entf . "" . $name;}
						$entf = "";
						$spaces = $spaces - 1;

					endwhile;

					$name = strtoupper($name);
				}

				if ($x_iq == "artificial intelligence")
				{
					$user = mt_rand(1,3);
					if ($user == 1){$ending = " Robot"; $with = "a robot with advanced AI";}
					else if ($user == 2){$ending = " Cyborg"; $with = "a cybernetic machine with human-like intellect";}
					else {$ending = " Android"; $with = "an android built with artificial intelligence";}

					$softwares = "2 Skills";
				}
				else if ($software == 1)
				{
					$user = mt_rand(1,4);
					if ($user == 1){$ender = " Robot";}
					else if ($user == 2){$ender = " Bot";}
					else if ($user == 3){$ender = " Droid";}
					else {$ender = " Mech";}

					if ($x_job == "combat")
					{
						$with = "a combat" . strtolower($ender);
						$have_weapons = $have_weapons + 1;
						$weapon_bonus = 20;
						$user = mt_rand(1,9);
						if ($user == 1){$ending = " Battle " . $ender;}
						else if ($user == 2){$ending = " War " . $ender;}
						else if ($user == 3){$ending = " Combat " . $ender;}
						else if ($user == 4){$ending = " Military " . $ender;}
						else if ($user == 5){$ending = " Fighting " . $ender;}
						else if ($user == 6){$ending = " Assassin " . $ender;}
						else if ($user == 7){$ending = " Hunter " . $ender;}
						else if ($user == 8){$ending = " Assault " . $ender;}
						else {$ending = " Attack " . $ender;}
						$softwares = "2 Military Skills";
					}
					else if ($x_job == "retrieval")
					{
						$with = "a retrieval" . strtolower($ender);
						if (mt_rand(1,100) > 75){$have_weapons = $have_weapons + 1;}
						$weapon_bonus = 90;
						$user = mt_rand(1,5);
						if ($user == 1){$ending = " Retrieval " . $ender;}
						else if ($user == 2){$ending = " Recovery " . $ender;}
						else if ($user == 3){$ending = " Recall " . $ender;}
						else if ($user == 4){$ending = " Search " . $ender;}
						else {$ending = " Capture " . $ender;}
						$softwares = "1 Technical Skill and 1 Military Skill";
					}
					else if ($x_job == "spying")
					{
						$with = "a spy" . strtolower($ender);
						if (mt_rand(1,100) > 65){$have_weapons = $have_weapons + 1;}
						$weapon_bonus = 80;
						$user = mt_rand(1,9);
						if ($user == 1){$ending = " Spy " . $ender;}
						else if ($user == 2){$ending = " Tactical Surveillance " . $ender;}
						else if ($user == 3){$ending = " Surveillance " . $ender;}
						else if ($user == 4){$ending = " Recon " . $ender;}
						else if ($user == 5){$ending = " Scout " . $ender;}
						else if ($user == 6){$ending = " Observation " . $ender;}
						else if ($user == 7){$ending = " Examination " . $ender;}
						else if ($user == 8){$ending = " Scanner " . $ender;}
						else {$ending = " Discovery " . $ender;}
						$softwares = "2 Spying Skills";
					}
					else if ($x_job == "guarding")
					{
						$with = "a guard" . strtolower($ender);
						$have_weapons = $have_weapons + 1;
						$weapon_bonus = 20;
						$user = mt_rand(1,9);
						if ($user == 1){$ending = " Guard " . $ender;}
						else if ($user == 2){$ending = " Protection " . $ender;}
						else if ($user == 3){$ending = " Defender " . $ender;}
						else if ($user == 4){$ending = " Guardian " . $ender;}
						else if ($user == 5){$ending = " Lookout " . $ender;}
						else if ($user == 6){$ending = " Sentinel " . $ender;}
						else if ($user == 7){$ending = " Sentry " . $ender;}
						else if ($user == 8){$ending = " Defense " . $ender;}
						else {$ending = " Security " . $ender;}
						$softwares = "2 Military Skills";
					}
					else if ($x_job == "escorting")
					{
						$with = "an escort" . strtolower($ender);
						if (mt_rand(1,100) > 25){$have_weapons = $have_weapons + 1;}
						$weapon_bonus = 50;
						$user = mt_rand(1,6);
						if ($user == 1){$ending = " Escort " . $ender;}
						else if ($user == 2){$ending = " Attendant " . $ender;}
						else if ($user == 3){$ending = " Convoy " . $ender;}
						else if ($user == 4){$ending = " Company " . $ender;}
						else if ($user == 5){$ending = " Guide " . $ender;}
						else {$ending = " Travel " . $ender;}
						$softwares = "1 Technical Skill and 1 Academic Skill";
					}
					else if ($x_job == "exploration")
					{
						$with = "an exploration" . strtolower($ender);
						if (mt_rand(1,100) > 80){$have_weapons = $have_weapons + 1;}
						$weapon_bonus = 95;
						$user = mt_rand(1,8);
						if ($user == 1){$ending = " Exploration " . $ender;}
						else if ($user == 2){$ending = " Investigation " . $ender;}
						else if ($user == 3){$ending = " Survey " . $ender;}
						else if ($user == 4){$ending = " Inspection " . $ender;}
						else if ($user == 5){$ending = " punch " . $ender;}
						else if ($user == 6){$ending = " Research " . $ender;}
						else if ($user == 7){$ending = " Excavation " . $ender;}
						else {$ending = " Pioneer " . $ender;}
						$softwares = "2 Academic Skills";
					}
				}
				$name = $name . "" . $ending;

			////////// WEAPONS //

				if (mt_rand(1,100) > $weapon_bonus){$have_weapons = $have_weapons + 1;} // BONUS WEAPON
				$bot_weapon = "";
				$bot_hurt = "";

				if ($have_weapons > 0){

					if ($weapon_tech == 1)
					{	$weper = mt_rand(1,17);
						if ($weper == 1){$bot_weapon="Attached Axe"; $bot_hurt = "1d6 axe";}
						else if ($weper == 2){$bot_weapon="Attached Battle Axe"; $bot_hurt = "1d8 axe";}
						else if ($weper == 3){$bot_weapon="Attached Broadsword"; $bot_hurt = "1d8 sword";}
						else if ($weper == 4){$bot_weapon="Attached Spear"; $bot_hurt = "1d6 spear";}
						else if ($weper == 5){$bot_weapon="Attached Sword"; $bot_hurt = "1d6 sword";}
						else if ($weper == 6){$bot_weapon="Built-In Flamethrower"; $bot_hurt = "1d20+5 gun";}
						else if ($weper == 7){$bot_weapon="Built-In Grenade Launcher"; $bot_hurt = "3d6 grenade";}
						else if ($weper == 8){$bot_weapon="Built-In Heavy Pistol"; $bot_hurt = "1d12 gun";}
						else if ($weper == 9){$bot_weapon="Built-In Heavy Rifle"; $bot_hurt = "1d12+2 gun";}
						else if ($weper == 10){$bot_weapon="Built-In Light Pistol"; $bot_hurt = "1d8 gun";}
						else if ($weper == 11){$bot_weapon="Built-In Light Rifle"; $bot_hurt = "1d10 gun";}
						else if ($weper == 12){$bot_weapon="Built-In Machine Pistol"; $bot_hurt = "1d10 gun";}
						else if ($weper == 13){$bot_weapon="Built-In Machine Rifle"; $bot_hurt = "1d12 gun";}
						else if ($weper == 14){$bot_weapon="Built-In Medium Pistol"; $bot_hurt = "1d10 gun";}
						else if ($weper == 15){$bot_weapon="Built-In Medium Rifle"; $bot_hurt = "1d12 gun";}
						else if ($weper == 16){$bot_weapon="Built-In Razor Disc Launcher"; $bot_hurt = "1d12 disc";}
						else {$bot_weapon="Built-In Shotgun"; $bot_hurt = "1d12 gun";}
					}
					else if ($weapon_tech == 2)
					{	$weper = mt_rand(1,16);
						if ($weper == 1){$bot_weapon="Attached Laser Axe"; $bot_hurt = "1d6+1 axe";}
						else if ($weper == 2){$bot_weapon="Attached Laser Battle Axe"; $bot_hurt = "1d8+1 axe";}
						else if ($weper == 3){$bot_weapon="Attached Laser Broadsword"; $bot_hurt = "1d8+1 sword";}
						else if ($weper == 4){$bot_weapon="Attached Laser Spear"; $bot_hurt = "1d6+1 spear";}
						else if ($weper == 5){$bot_weapon="Attached Laser Sword"; $bot_hurt = "1d6+1 sword";}
						else if ($weper == 6){$bot_weapon="Built-In Electrical Pistol"; $bot_hurt = "1d8 gun";}
						else if ($weper == 7){$bot_weapon="Built-In Electrical Rifle"; $bot_hurt = "1d10 gun";}
						else if ($weper == 8){$bot_weapon="Built-In Flamethrower"; $bot_hurt = "1d20+5 gun";}
						else if ($weper == 9){$bot_weapon="Built-In Frag Gun"; $bot_hurt = "2d8 gun";}
						else if ($weper == 10){$bot_weapon="Built-In Grenade Launcher"; $bot_hurt = "3d6 grenade";}
						else if ($weper == 11){$bot_weapon="Built-In Gyrojet Pistol"; $bot_hurt = "2d10 gun";}
						else if ($weper == 12){$bot_weapon="Built-In Gyrojet Rifle"; $bot_hurt = "2d12 gun";}
						else if ($weper == 13){$bot_weapon="Built-In Laser Pistol"; $bot_hurt = "2d6 gun";}
						else if ($weper == 14){$bot_weapon="Built-In Laser Rifle"; $bot_hurt = "3d8 gun";}
						else if ($weper == 15){$bot_weapon="Built-In Missile Launcher"; $bot_hurt = "1d20+10 missile";}
						else {$bot_weapon="Built-In Razor Disc Launcher"; $bot_hurt = "1d12 disc";}
					}
					else if ($weapon_tech == 3)
					{	$weper = mt_rand(1,15);
						if ($weper == 1){$bot_weapon="Attached Plasma Axe"; $bot_hurt = "1d8 axe";}
						else if ($weper == 2){$bot_weapon="Attached Plasma Battle Axe"; $bot_hurt = "1d10 axe";}
						else if ($weper == 3){$bot_weapon="Attached Plasma Broadsword"; $bot_hurt = "1d10 sword";}
						else if ($weper == 4){$bot_weapon="Attached Plasma Knife"; $bot_hurt = "1d6 knife";}
						else if ($weper == 5){$bot_weapon="Attached Plasma Pistol"; $bot_hurt = "2d8 gun";}
						else if ($weper == 6){$bot_weapon="Attached Plasma Rifle"; $bot_hurt = "2d10";}
						else if ($weper == 7){$bot_weapon="Attached Plasma Sword"; $bot_hurt = "1d8 sword";}
						else if ($weper == 8){$bot_weapon="Built-In Flamethrower"; $bot_hurt = "1d20+5 gun";}
						else if ($weper == 9){$bot_weapon="Built-In Frag Gun"; $bot_hurt = "2d8 gun";}
						else if ($weper == 10){$bot_weapon="Built-In Gravitube"; $bot_hurt = "2d6 gun";}
						else if ($weper == 11){$bot_weapon="Built-In Laser Pistol"; $bot_hurt = "2d6 gun";}
						else if ($weper == 12){$bot_weapon="Built-In Laser Rifle"; $bot_hurt = "3d8 gun";}
						else if ($weper == 13){$bot_weapon="Built-In Missile Launcher"; $bot_hurt = "1d20+10 missile";}
						else if ($weper == 14){$bot_weapon="Built-In Plasma Grenade Launcher"; $bot_hurt = "3d8 grenade";}
						else {$bot_weapon="Built-In Razor Disc Launcher"; $bot_hurt = "1d12 disc";}
					}
					else if ($weapon_tech == 4)
					{	$weper = mt_rand(1,11);
						if ($weper == 1){$bot_weapon="Attached Pulse Axe"; $bot_hurt = "1d10 axe";}
						else if ($weper == 2){$bot_weapon="Attached Pulse Battle Axe"; $bot_hurt = "1d12 axe";}
						else if ($weper == 3){$bot_weapon="Attached Pulse Broadsword"; $bot_hurt = "1d12 sword";}
						else if ($weper == 4){$bot_weapon="Attached Pulse Knife"; $bot_hurt = "1d8 knife";}
						else if ($weper == 5){$bot_weapon="Attached Pulse Sword"; $bot_hurt = "1d10 sword";}
						else if ($weper == 6){$bot_weapon="Attached Searing Spear"; $bot_hurt = "2d12 spear";}
						else if ($weper == 7){$bot_weapon="Built-In Flamethrower"; $bot_hurt = "1d20+5 gun";}
						else if ($weper == 8){$bot_weapon="Built-In Fusion Pistol"; $bot_hurt = "2d8+2 gun";}
						else if ($weper == 9){$bot_weapon="Built-In Fusion Rifle"; $bot_hurt = "2d10+2 gun";}
						else if ($weper == 10){$bot_weapon="Built-In Missile Launcher"; $bot_hurt = "1d20+10 missile";}
						else {$bot_weapon="Built-In Plasma Grenade Launcher"; $bot_hurt = "3d8 grenade";}
					}
				}

				////////// COLOR //
				$xcolor = array('black', 'blue', 'gray', 'green', 'red', 'rust', 'orange', 'gold', 'bronze', 'silver', 'white');
				$xcolor = $xcolor[mt_rand(0,10)];

				$xdut = array('metallic', 'dull', 'shiny', 'smooth', 'rough', 'light', 'dark', 'metallic');
				$xdut = $xdut[mt_rand(0,7)];

				$xhue = array('colored', 'tinted', 'shaded', 'hued', 'painted', 'coated', 'looking');
				$xhue = $xhue[mt_rand(0,6)];

			if ($bot_level < 2){$stamina = mt_rand(39,41); $hit = mt_rand(8,12); $energy = mt_rand(3,7); $mind = mt_rand(1,5); $radiation = mt_rand(3,7); $shock = mt_rand(3,7); $toxin = mt_rand(2,6);}
			else if ($bot_level == 2){$stamina = mt_rand(46,50); $hit = mt_rand(8,12); $energy = mt_rand(4,8); $mind = mt_rand(2,6); $radiation = mt_rand(4,8); $shock = mt_rand(4,8); $toxin = mt_rand(3,7);}
			else if ($bot_level == 3){$stamina = mt_rand(53,59); $hit = mt_rand(7,11); $energy = mt_rand(4,8); $mind = mt_rand(3,7); $radiation = mt_rand(5,9); $shock = mt_rand(5,9); $toxin = mt_rand(4,8);}
			else if ($bot_level == 4){$stamina = mt_rand(60,68); $hit = mt_rand(7,11); $energy = mt_rand(5,9); $mind = mt_rand(4,8); $radiation = mt_rand(6,10); $shock = mt_rand(6,10); $toxin = mt_rand(5,9);}
			else if ($bot_level == 5){$stamina = mt_rand(67,77); $hit = mt_rand(6,10); $energy = mt_rand(5,9); $mind = mt_rand(5,9); $radiation = mt_rand(7,11); $shock = mt_rand(6,10); $toxin = mt_rand(6,10);}
			else if ($bot_level == 6){$stamina = mt_rand(74,86); $hit = mt_rand(6,10); $energy = mt_rand(6,10); $mind = mt_rand(6,10); $radiation = mt_rand(8,12); $shock = mt_rand(7,11); $toxin = mt_rand(7,11);}
			else if ($bot_level == 7){$stamina = mt_rand(81,95); $hit = mt_rand(5,9); $energy = mt_rand(6,10); $mind = mt_rand(7,11); $radiation = mt_rand(9,13); $shock = mt_rand(7,11); $toxin = mt_rand(7,11);}
			else if ($bot_level == 8){$stamina = mt_rand(88,104); $hit = mt_rand(5,9); $energy = mt_rand(7,11); $mind = mt_rand(8,12); $radiation = mt_rand(10,14); $shock = mt_rand(8,12); $toxin = mt_rand(8,12);}
			else if ($bot_level == 9){$stamina = mt_rand(95,113); $hit = mt_rand(4,8); $energy = mt_rand(7,11); $mind = mt_rand(8,12); $radiation = mt_rand(10,14); $shock = mt_rand(8,12); $toxin = mt_rand(8,12);}
			else if ($bot_level == 10){$stamina = mt_rand(102,122); $hit = mt_rand(4,8); $energy = mt_rand(7,11); $mind = mt_rand(8,12); $radiation = mt_rand(10,14); $shock = mt_rand(9,13); $toxin = mt_rand(9,13);}
			else if ($bot_level == 11){$stamina = mt_rand(109,131); $hit = mt_rand(3,7); $energy = mt_rand(8,12); $mind = mt_rand(9,13); $radiation = mt_rand(11,15); $shock = mt_rand(9,13); $toxin = mt_rand(9,13);}
			else if ($bot_level == 12){$stamina = mt_rand(116,140); $hit = mt_rand(3,7); $energy = mt_rand(8,12); $mind = mt_rand(9,13); $radiation = mt_rand(11,15); $shock = mt_rand(10,14); $toxin = mt_rand(10,14);}
			else if ($bot_level == 13){$stamina = mt_rand(123,149); $hit = mt_rand(2,6); $energy = mt_rand(8,12); $mind = mt_rand(9,13); $radiation = mt_rand(11,15); $shock = mt_rand(10,14); $toxin = mt_rand(10,14);}
			else if ($bot_level == 14){$stamina = mt_rand(130,158); $hit = mt_rand(2,6); $energy = mt_rand(9,13); $mind = mt_rand(10,14); $radiation = mt_rand(12,16); $shock = mt_rand(11,15); $toxin = mt_rand(11,15);}
			else if ($bot_level == 15){$stamina = mt_rand(137,167); $hit = mt_rand(1,5); $energy = mt_rand(9,13); $mind = mt_rand(10,14); $radiation = mt_rand(12,16); $shock = mt_rand(11,15); $toxin = mt_rand(11,15);}
			else if ($bot_level == 16){$stamina = mt_rand(144,176); $hit = mt_rand(1,5); $energy = mt_rand(9,13); $mind = mt_rand(10,14); $radiation = mt_rand(12,16); $shock = mt_rand(12,16); $toxin = mt_rand(11,15);}
			else if ($bot_level == 17){$stamina = mt_rand(151,185); $hit = mt_rand(0,4); $energy = mt_rand(10,14); $mind = mt_rand(11,15); $radiation = mt_rand(13,17); $shock = mt_rand(12,16); $toxin = mt_rand(12,16);}
			else if ($bot_level == 18){$stamina = mt_rand(158,194); $hit = mt_rand(0,4); $energy = mt_rand(10,14); $mind = mt_rand(11,15); $radiation = mt_rand(13,17); $shock = mt_rand(13,17); $toxin = mt_rand(12,16);}
			else if ($bot_level == 19){$stamina = mt_rand(165,203); $hit = mt_rand(-1,3); $energy = mt_rand(10,14); $mind = mt_rand(11,15); $radiation = mt_rand(13,17); $shock = mt_rand(13,17); $toxin = mt_rand(12,16);}
			else if ($bot_level >= 20){$stamina = mt_rand(172,212); $hit = mt_rand(-1,3); $energy = mt_rand(11,15); $mind = mt_rand(12,16); $radiation = mt_rand(14,18); $shock = mt_rand(14,18); $toxin = mt_rand(13,17);}

			if ($bot_level < 5){}
			else if ($bot_level < 9){$stamina = round(($stamina * 0.25) + $stamina);}
			else if ($bot_level < 13){$stamina = round(($stamina * 0.50) + $stamina);}
			else if ($bot_level < 17){$stamina = round(($stamina * 0.75) + $stamina);}
			else {$stamina = round(($stamina * 1.0) + $stamina);}

			$des = "The " . $name . "" . $alienbuilt . " is " . $with . " that runs on " . $x_fuel . " and is made mostly of a " . $xdut . ", " . $xcolor . " " . $xhue . ", " . $x_metal . ". " . $shape . "" . $travel . "";
			if ($moving == 0){$uspeed = "None";} else {$uspeed = $moving . "`";}
			if ($bot_weapon != ""){ $hitters = $hitters . " or 1 " . strtolower($bot_weapon); }
			if ($bot_weapon != ""){ $hitting = $hitting . " or " . strtolower($bot_hurt); }
			$udef = "E:" . $energy . "/R:" . $radiation;
			$cost_level = round($bot_level/2);
				if ($cost_level < 2){$valug = 200; $software = "I";}
				else if ($cost_level < 3){$valug = 600; $software = "II";}
				else if ($cost_level < 4){$valug = 1000; $software = "III";}
				else if ($cost_level < 5){$valug = 1600; $software = "IV";}
				else if ($cost_level < 6){$valug = 2600; $software = "V";}
				else if ($cost_level < 7){$valug = 4200; $software = "VI";}
				else if ($cost_level < 8){$valug = 6800; $software = "VII";}
				else if ($cost_level < 9){$valug = 11000; $software = "VIII";}
				else if ($cost_level < 10){$valug = 17800; $software = "IX";}
				else {$valug = 28800; $software = "X";}
				$valug = $valug + ($cost_level * 200) + 500;
			$ufurm = $software . " in " . $softwares;

			///// DO IT IF IT FITS THE TERRAIN TYPE OR TERRAIN IS BLANK //////////////////////////////////
			$run_the_bot = 0;
			if (($liveinr == 1) && (($dwell == "Water Only") || ($dwell == "Outdoors Only"))){$run_the_bot = 1;}
			else if (($liveinr == 2) && ($dwell == "Anywhere but Water")){$run_the_bot = 1;}
			else if (($liveinr == 3) && (($dwell == "Anywhere but Water") || ($dwell == "Outdoors Only"))){$run_the_bot = 1;}
			else if ($liveinr == 0){$run_the_bot = 1;}

			if ($run_the_bot > 0)
			{
			?>
			<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%">
				<tr>
					<td colspan="4">
						<hr>
					</td>
				</tr>
				<tr>
					<td width="320" colspan="2"><b><font size="3"><?php echo $name; ?></font></b></td>
					<td width="380" colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td width="20">&nbsp;</td>
					<td width="300" valign="top">
					<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%">
						<tr>
							<td width="79"><font size="2">Condition:</font></td>
							<td><font size="2"><?php echo $stamina; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Protection:</font></td>
							<td><font size="2"><?php echo $x_armor; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Hit:</font></td>
							<td><font size="2"><?php echo $hit; ?></font></td>
						</tr>
						<tr>
							<td width="79" valign="top"><font size="2">Attacks:</font></td>
							<td><font size="2"><?php echo $hitters; ?></font></td>
						</tr>
						<tr>
							<td width="79" valign="top"><font size="2">Damage:</font></td>
							<td><font size="2"><?php echo $hitting; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Speed:</font></td>
							<td><font size="2"><?php if ($moving == 0){echo "None";} else {echo $moving; ?>'<?php } ?></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Stage:</font></td>
							<td><font size="2"><?php echo $bot_stage; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Size:</font></td>
							<td><font size="2"><?php echo $bot_size; ?>'</font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Defenses:</font></td>
							<td><font size="2">E:<?php echo $energy; ?>/R:<?php echo $radiation; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Found In:</font></td>
							<td><font size="2"><?php echo $dwell; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Level:</font></td>
							<td><font size="2"><?php echo $bot_level; ?></font></td>
						</tr>
						<tr>
							<td width="79" valign="top"><font size="2">Software:</font></td>
							<td><font size="2"><?php echo $software; ?> in <?php echo $softwares; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Salvage:</font></td>
							<td><font size="2"><?php echo $salvage; ?>%</font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Value:</font></td>
							<td><font size="2"><?php	$cost_level = round($bot_level/2);
									if ($cost_level < 2){$valug = 200; $software = "I";}
									else if ($cost_level < 3){$valug = 600; $software = "II";}
									else if ($cost_level < 4){$valug = 1000; $software = "III";}
									else if ($cost_level < 5){$valug = 1600; $software = "IV";}
									else if ($cost_level < 6){$valug = 2600; $software = "V";}
									else if ($cost_level < 7){$valug = 4200; $software = "VI";}
									else if ($cost_level < 8){$valug = 6800; $software = "VII";}
									else if ($cost_level < 9){$valug = 11000; $software = "VIII";}
									else if ($cost_level < 10){$valug = 17800; $software = "IX";}
									else {$valug = 28800; $software = "X";}
									$valug = $valug + ($cost_level * 200) + 500;
								echo number_format($valug);
								?>xm</font>
							</td>
						</tr>
					</table>
					</td>
					<td width="20"><font size="1">&nbsp;</font></td>
					<td width="360" valign="top"><font size="2"><?php echo "The " . $name . "" . $alienbuilt . " is " . $with . " that runs on " . $x_fuel . " and is made mostly of a " . $xdut . ", " . $xcolor . " " . $xhue . ", " . $x_metal . ". " . $shape . "" . $travel . ""; ?></font></td>
				</tr>
			</table>
			<?php

			$robots = $robots - 1;
			}

		endwhile;

		echo "<p>&nbsp;</p>";
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	function specialAbility($level,$game,$eyes,$swims)
	{
		if ($level < 1){$level = mt_rand(1,20);}

		switch (mt_rand(0,1))
		{
			case 0: $word1 = "by bending light around them"; break;
			case 1: $word1 = "by chemically changing their color"; break;
		}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,2))
		{
			case 0: $word2 = "hit with energy based weapons"; break;
			case 1: $word2 = "hit with blunt objects"; break;
			case 2: $word2 = "they feel threatened"; break;
		}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,1))
		{
			case 0: $word3 = "they want to escape a dangerous situation"; break;
			case 1: $word3 = "they are preparing for a stealthy attack"; break;
		}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,1))
		{
			case 0: $word4 = "powder substance on themselves"; break;
			case 1: $word4 = "slimy substance on themselves"; break;
		}
		if ($swims > 0){$word4 = "slimy substance on themselves";}
		//////////////////////////////////////////////////////////
		$word5 = "suffer 1d4 damage";
		switch (mt_rand(0,round($level/2)))
		{
			case 0: $word5 = "die"; break;
			case 1: $word5 = "suffer 1d4 damage"; break;
			case 2: $word5 = "suffer 1d6 damage"; break;
			case 3: $word5 = "suffer 1d8 damage"; break;
			case 4: $word5 = "suffer 2d4 damage"; break;
			case 5: $word5 = "suffer 2d6 damage"; break;
			case 6: $word5 = "suffer 2d8 damage"; break;
			case 7: $word5 = "suffer 3d6 damage"; break;
			case 8: $word5 = "suffer 2d10 damage"; break;
			case 9: $word5 = "suffer 2d12 damage"; break;
			case 10: $word5 = "suffer 3d8 damage"; break;
		}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,3))
		{
			case 0: $word6 = "electrical";	$word6_save = "energy";		break;
			case 1: $word6 = "freezing";	$word6_save = "energy";		break;
			case 2: $word6 = "scorching";	$word6_save = "energy";		break;
			case 3: $word6 = "irradiated";	$word6_save = "radiation";	break;
		}
		//////////////////////////////////////////////////////////
		$word7 = "1d4";
		switch (mt_rand(0,round($level/5)))
		{
			case 1: $word7 = "1d4"; break;
			case 2: $word7 = "1d6"; break;
			case 3: $word7 = "1d8"; break;
			case 4: $word7 = "2d4"; break;
		}
		if (mt_rand(1,3) == 1){$word7 = $word7 . "+" . mt_rand(1,4);}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,4))
		{
			case 0: $word8 = "suffer a -" . ceil($level/5) . " to attack rolls"; break;
			case 1: $word8 = "fall down gagging for " . ceil($level/5) . " rounds."; break;
			case 2: $word8 = "forced to retreat."; break;
			case 3: $word8 = "be put into a trance for " . ceil($level/5) . " rounds."; break;
			case 4: $word8 = "fall unconscious for " . ceil($level/5) . " rounds."; break;
		}
		//////////////////////////////////////////////////////////
		if ($eyes == 1){$word9 = "eye";}
		else if ($eyes > 1){$word9 = "eyes";}
		else {$word9 = "mouth";}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,3))
		{
			case 0: $word10 = "spikes"; break;
			case 1: $word10 = "quills"; break;
			case 2: $word10 = "bristles"; break;
			case 3: $word10 = "needles"; break;
		}
		//////////////////////////////////////////////////////////
		if (($eyes > 0) && (mt_rand(1,2) == 1))
		{
			if ($eyes == 1){$word11 = "eye";}
			else if ($eyes > 1){$word11 = "eyes";}
		}
		else {$word11 = "body";}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,9))
		{
			case 0: $word12 = "mercury"; break;
			case 1: $word12 = "a " . slimeColor() . " acid"; break;
			case 2: $word12 = "a " . slimeColor() . " bile"; break;
			case 3: $word12 = "a " . slimeColor() . " poison"; break;
			case 4: $word12 = "a " . slimeColor() . " flammable liquid"; break;
			case 5: $word12 = "a " . slimeColor() . " liquid, that can cause a euphoric effect if ingested, "; break;
			case 6: $word12 = "a " . slimeColor() . " liquid, that can cure many illnesses if ingested, "; break;
			case 7: $word12 = "a " . slimeColor() . " liquid, that can slowly kill one over a period of " . mt_rand(2,15) . " days if ingested, "; break;
			case 8: $word12 = "a " . slimeColor() . " liquid, that has healing properties if rubbed on wounds, "; break;
			case 9: $word12 = "a " . slimeColor() . " liquid, that has a numbing effect if rubbed on skin, "; break;
		}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,2))
		{
			case 0: $word13 = "become electrified for " . ceil(($level/2)+1) . " rounds, where anyone touching it must make an energy defense test or " . $word5 . "."; break;
			case 1: $word13 = "emit an electrical field for " . ceil(($level/2)+1) . " rounds, where anyone within " . ($level+4). " feet of it must make an energy defense test or " . $word5 . "."; break;
			case 2: $word13 = "emit an electro-magnetic field for " . ceil(($level/2)+1) . " rounds, where any electronic device within " . ($level+4) . " feet will be deactivated."; break;
		}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,8))
		{
			case 0: $word14 = "an acidic substance that will corrode items or cause " . $word7 . " damage if touched.";				break;
			case 1: $word14 = "a slippery substance that will allow it to fit through smaller openings or escape one`s grasp.";		break;
			case 2: $word14 = "an hallucinogenic substance that will cause one to hallucinate for " . ceil(($level/2)+1) . " rounds unless the can make a mind defense test.";		break;
			case 3: $word14 = "a numbing substance that will cause one to drop their items, unable to pick them up for about " . ceil(($level/2)+1) . " rounds unless they can make a defense test for toxin.";		break;
			case 4: $word14 = "a paralytic substance that will cause one to fall over, unable to move for about " . ceil(($level/2)+1) . " rounds unless they can make a defense test for toxin.";		break;
			case 5: $word14 = "a sticky substance that will cause melee weapons or others to stick to it for about " . ceil(($level/2)+1) . " rounds.";		break;
			case 6: $word14 = "a toxic substance that will cause " . $word7 . " damage if touched, unless one makes a defense test for toxins.";				break;
			case 7: $word14 = "a smelly substance that will cause anyone that touches it to smell horrible for about " . ceil(($level/2)+1) . " days unless they chemically clean themselves.";		break;
			case 8: $word14 = "an irradiates substance that will cause " . $word7 . " damage if touched, unless one can make a defense test against radiation.";				break;
		}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,8))
		{
			case 0: $word15 = "is acidic and will corrode items or cause " . $word7 . " damage to those within the " . (mt_rand(1,4)*5) . " foot cloud.";	break;
			case 1: $word15 = "will cause blindness to those within the " . (mt_rand(1,4)*5) . " foot cloud unless they can make a defense test for toxin.";	break;
			case 2: $word15 = "will cause one to hallucinate for " . ceil(($level/2)+1) . " rounds unless the can make a mind defense test.";		break;
			case 3: $word15 = "will cause eye irritation to those within the " . (mt_rand(1,4)*5) . " foot cloud, suffering a -" . ceil($level/5) . " to attack rolls unless they can make a defense test for toxin.";	break;
			case 4: $word15 = "will cause paralysis, unable to move for about " . (($level/2)+1) . " rounds unless they can make a defense test for toxin.";		break;
			case 5: $word15 = "is toxic and will cause " . $word7 . " damage to those within the " . (mt_rand(1,4)*5) . " foot cloud, unless one makes a defense test for toxins.";				break;
			case 6: $word15 = "smells horrible and will cause anyone within the " . (mt_rand(1,4)*5) . " foot cloud to stink for about " . ceil(($level/2)+1) . " days unless they chemically clean themselves.";		break;
			case 7: $word15 = "is irradiated and will cause " . $word7 . " damage to anyone within the " . (mt_rand(1,4)*5) . " foot cloud, unless one can make a defense test against radiation.";				break;
			case 8: $word15 = "will cause those to fall asleep for " . ceil(($level/2)+1) . " rounds if within the " . (mt_rand(1,4)*5) . " foot cloud, and only if they fail to make a defense test for toxin.";				break;
		}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,4))
		{
			case 0: $word16 = "has an ability to control the minds of opponents for " . ceil(($level/2)+1) . " rounds unless they can make a mind defense test.";	break;
			case 1: $word16 = "has an ability to reflect any energy based projectiles (lasers and plasma weapons) back at the attacker, allowing them to make a range attack back at the attacker.";	break;
			case 2: $word16 = "has an ability to track prey that has been in the area recently and no more than " . number_format(($level*100)+100) . " feet away.";	break;
			case 3: $word16 = "has a long sticky tongue that can grab nearby objects, disarm enemies, or grab prey."; break;
			case 4: $word16 = "has the ability to stretch their limbs up to " . ($level*5) . " feet, allowing them to get to objects or opponents from a greater distance."; break;
		}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,3))
		{
			case 0: $word17 = "another humanoid";	break;
			case 1: $word17 = "a rock";	break;
			case 2: $word17 = "a plant";	break;
			case 3: $word17 = "a harmless creature";	break;
		}
		//////////////////////////////////////////////////////////
		switch (mt_rand(0,6))
		{
			case 0: $word18 = "an electrical breath weapon that has a range of " . (ceil(($level/2)+1)*5) . " feet, where anyone hit by it, that fails to make a defense test for energy, will " . $word5 . ".";	break;
			case 1: $word18 = "a frost breath weapon that has a range of " . (ceil(($level/2)+1)*5) . " feet, where anyone hit by it will suffer " . $word7 . " damage.";	break;
			case 2: $word18 = "a flaming breath weapon that has a range of " . (ceil(($level/2)+1)*5) . " feet, where anyone hit by it will suffer " . $word7 . " damage.";	break;
			case 3: $word18 = "a plasma breath weapon that has a range of " . (ceil(($level/2)+1)*5) . " feet, where anyone hit by it, that fails to make a defense test for energy, will " . $word5 . ".";	break;
			case 4: $word18 = "a poison breath weapon that has a range of " . (ceil(($level/2)+1)*5) . " feet, where anyone hit by it, that fails to make a defense test for toxins, will " . $word5 . ".";	break;
			case 5: $word18 = "a sonic breath weapon that has a range of " . (ceil(($level/2)+1)*5) . " feet, where anyone hit by it will suffer " . $word7 . " damage.";	break;
			case 6: $word18 = "a radiation breath weapon that has a range of " . (ceil(($level/2)+1)*5) . " feet, where anyone hit by it, that fails to make a defense test for radiation, will " . $word5 . ".";	break;
		}
		//////////////////////////////////////////////////////////
		if ($word6 == "electrical"){$word6_effect = "turn into a pile of dust";}
		else if ($word6 == "freezing"){$word6_effect = "turn into a solid block of ice";}
		else if ($word6 == "scorching"){$word6_effect = "turn into a pile of melted goo";}
		else {$word6_effect = "turn into a scorched corpse";}
		switch (mt_rand(0,2))
		{
			case 0: $word19 = "causes " . $word7 . " damage unless one can make a defense test against " . $word6_save;	break;
			case 1: $word19 = "causes " . $word7 . " damage, but will do double damage unless one can make a defense test against " . $word6_save;	break;
			case 2: $word19 = "causes one to " . $word6_effect . " unless one can make a defense test against " . $word6_save;	break;
		}
		//////////////////////////////////////////////////////////

		if ($swims > 0){$xax = 22;} else {$xax = 26;}
		switch (mt_rand(0,$xax))
		{
			case 0: $special_ability = "can change their color to match the surrounding area, with a " . mt_rand(1,5) . "0% chance to be noticed by others. They do this " . $word1 . "."; break;
			case 1: $special_ability = "can grow " . mt_rand(5,10) . "0% larger when " . $word2 . "."; break;
			case 2: $special_ability = "can shrink " . mt_rand(5,10) . "0% smaller when " . $word3 . "."; break;
			case 3: $special_ability = "has a poisonous " . $word4 . " where, if one touches them, must make a defense test for toxin or " . $word5 . "."; break;
			case 4: $special_ability = "can turn almost invisible, with a " . (mt_rand(1,5)*5) . "% chance to be noticed by others. They do this " . $word1 . "."; break;
			case 5: $special_ability = "can emit a beam of " . beamColor() . " " . $word6 . " energy from their " . $word9 . " that " . $word19 . "."; break;
			case 6: $special_ability = "can heal up to " . $word7 . " damage when hit with energy-based weapons."; break;
			case 7: $special_ability = "can change their appearance to look like a " . $word17 . " for " . ceil(($level/2)+1) . " turns unless they are attacked."; break;
			case 8:
					if (mt_rand(1,2) == 1){$special_ability = "can have their body protrude " . $word10 . " that are poisonous to the touch where one must make a defense test for toxin or " . $word5 . ".";}
					else {$special_ability = "can have their body protrude " . $word10 . " that can cause " . $word7 . " damage if touched.";}
				break;
			case 9:
					if (mt_rand(1,2) == 1){$special_ability = "can launch a sticky " . slimeColor() . " substance from their mouth as a separate ranged attack...which will immobilize the victim for " . ceil(($level/2)+1) . " rounds.";}
					else {$special_ability = "can launch a sticky " . slimeColor() . " substance from their mouth as a separate ranged attack...which will immobilize the victim until " . ($level*5) . " points of damage can be done to the substance to free the victim.";}
				break;
			case 10: $special_ability = "can emit a " . beamColor() . " light from their " . $word11 . " that will light up a " . (mt_rand(2,20)*5) . " foot area for " . ceil(($level/2)+1) . " turns."; break;
			case 11: $special_ability = "has " . $word12 . " in their system instead of normal blood."; break;
			case 12:
					if (mt_rand(1,2) == 1){$special_ability = "can cause an illness if physically touched that will cause " . $word7 . " damage per day if not treated.";}
					else {$special_ability = "can cause an illness if physically touched that will cause " . $word7 . " damage per day, and death occurs after " . mt_rand(4,10) . " days, if not treated.";}
				break;
			case 13: $special_ability = "can " . $word13; break;
			case 14: $special_ability = "can excrete " . $word14; break;
			case 15:
					if (mt_rand(1,2) == 1){$special_ability = "can super heat their external temperature for " . ceil(($level/2)+1) . " rounds where anyone within " . (mt_rand(1,4)*5) . " feet will suffer " . $word7 . " damage per round.";}
					else {$special_ability = "can super cool their external temperature for " . ceil(($level/2)+1) . " rounds where anyone within " . (mt_rand(1,4)*5) . " feet will suffer " . $word7 . " damage per round.";}
				break;
			case 16: $special_ability = $word16; break;
			case 17: $special_ability = "can regenerate themselves at the rate of " . ($level*2) . " points per turn"; break;
			case 18: $special_ability = "can change the molecular structure of their bodies and pass through objects up to " . ceil(($level/2)+1) . " feet at a single time."; break;
			case 19:
					$travel = mt_rand(1,3);
					if ($travel == 1){$special_ability = "can teleport up to " . ($level*10) . " feet at a single time.";}
					else if ($travel == 2){$special_ability = "can turn into a " . fogColor() . " colored gas for up to " . ceil(($level/2)+1) . " rounds before having to turn back to normal.";}
					else {$special_ability = "can turn into a " . slimeColor() . " colored liquid for up to " . ceil(($level/2)+1) . " rounds before having to turn back to normal.";}
				break;
			case 20: $special_ability = "can produce a force field around themselves for " . ceil(($level/2)+1) . " rounds and can absorb up to " . ($level * 4). " damage."; break;
			case 21:
					if (mt_rand(1,2) == 1){$special_ability = "can mimic any sound they hear, often confusing others and luring them toward them.";}
					else {$special_ability = "can throw any sound they make, often confusing others and distracting them.";}
				break;
			case 22: 
					if (($eyes > 0) && (mt_rand(1,2) == 1)){$special_ability = "can see perfectly in total darkness, without the need for a light source.";}
					else if ($eyes > 0){$special_ability = "can see through objects that are no more than " . ceil(($level/2)+1) . " feet thick.";}
					else if ($swims > 0){$special_ability = "can release a " . slimeColor() . " ink that will consume a " . ($level*10) . " foot area, causing others to be unable to see while in it.";}
					else {$special_ability = "will explode if they are killed, leaving quite a mess."; break;}
				break;
			// NO SWIMMERS ///////////////////////////////////////////////////
			case 23:
					if (mt_rand(1,2) == 1){$special_ability = "can emit an odor for " . ceil(($level/2)+1) . " rounds, where anyone breathing it in must make a defense test for toxin or " . $word8 . ".";}
					else {$special_ability = "can emit a fragrance for " . ceil(($level/2)+1) . " rounds, where anyone nearbry breathing it in must make a defense test for toxin or be lured in by it.";}
				break;
			case 24: $special_ability = "can breath a " . fogColor() . " colored gas that " . $word15; break;
			case 25: $special_ability = word18; break;
			case 26: $special_ability = "can move around without making a single sound."; break;
		}

		$ability = retroNotes($special_ability,$game,0);

		return $ability;
	}


	/////////////////////////////////////////////////////////// ALIENS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if ($amount > 0)
	{

	////////// COLOR //
	$xcolors = array('blue-green', 'black', 'blue', 'gray', 'green', 'violet', 'red', 'brown', 'orange', 'yellowish-green', 'tan', 'gold', 'yellow', 'purple', 'silver', 'forest-green', 'white');
		// ANY COLOR VARIATION //
		$xcolors2 = array('bright ', '', 'dark ', 'light ', 'dull ', 'vibrant ', 'thick ', 'faded ', 'deep ', 'rich ', 'shiny ');

	$n = 0;
	$names_to_make = $amount;
	$name_array = array();

		while ($names_to_make > 0):

			////////// COME UP WITH NAMES AND SORT ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			$my_name = strtolower(speciesName());

			$myname_top = substr($my_name, 0, 1);
			$myname_end = substr($my_name, -1);

			$consonants = array('b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z');
			$vowels = array('a', 'e', 'i', 'o', 'u');

			if ( (($myname_end == "a") || ($myname_end == "e") || ($myname_end == "i") || ($myname_end == "o") || ($myname_end == "u")) && (mt_rand(1,4) != 1) ){$my_name = $my_name . $consonants[mt_rand(0,19)];}
			else if ( (($myname_end != "a") && ($myname_end != "e") && ($myname_end != "i") && ($myname_end != "o") && ($myname_end != "u")) && (mt_rand(1,4) != 1) ){$my_name = $my_name . $vowels[mt_rand(0,4)];}

			if ( (($myname_top == "a") || ($myname_top == "e") || ($myname_top == "i") || ($myname_top == "o") || ($myname_top == "u")) && (mt_rand(1,3) != 1) ){$my_name = $consonants[mt_rand(0,19)] . $my_name;}
			else if ( (($myname_top != "a") && ($myname_top != "e") && ($myname_top != "i") && ($myname_top != "o") && ($myname_top != "u")) && (mt_rand(1,3) != 1) ){$my_name = $vowels[mt_rand(0,4)] . $my_name;}

			if (mt_rand(1,2) == 1)
			{
				$myname_top = substr($my_name, 0, 1);
				$myname_end = substr($my_name, -1);

				if ( (($myname_end == "a") || ($myname_end == "e") || ($myname_end == "i") || ($myname_end == "o") || ($myname_end == "u")) && (mt_rand(1,4) != 1) ){$my_name = $my_name . $consonants[mt_rand(0,19)];}
				else if ( (($myname_end != "a") && ($myname_end != "e") && ($myname_end != "i") && ($myname_end != "o") && ($myname_end != "u")) && (mt_rand(1,4) != 1) ){$my_name = $my_name . $vowels[mt_rand(0,4)];}

				if ( (($myname_top == "a") || ($myname_top == "e") || ($myname_top == "i") || ($myname_top == "o") || ($myname_top == "u")) && (mt_rand(1,3) != 1) ){$my_name = $consonants[mt_rand(0,19)] . $my_name;}
				else if ( (($myname_top != "a") && ($myname_top != "e") && ($myname_top != "i") && ($myname_top != "o") && ($myname_top != "u")) && (mt_rand(1,3) != 1) ){$my_name = $vowels[mt_rand(0,4)] . $my_name;}
			}

			array_push($name_array, $my_name);

			$names_to_make = $names_to_make - 1;

		endwhile;

		sort($name_array);

	?>

	<img border="0" src="pics_tools/tools_scifim_<?php if ($game == "Space Ryft"){echo "a";} else {echo "m";} ?>.jpg">
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
	<?php

	while ($amount > 0) :

	$callme = ucwords($name_array[$n]);

	$flies = 0;
	$swims = 0;
	$legs = 0;
	$arms = 0;
	$skin_spec = 0;

	////////// STAGE //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$xsmart = mt_rand(1,100);
		if ($xsmart > 25){$stage = "Animal";}
		else if ($xsmart > 16){$stage = "Primitive";}
		else if ($xsmart > 9){$stage = "Industrial";}
		else if ($xsmart > 5){$stage = "Modern";}
		else {$stage = "Advanced";}

	////////// SPECIES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$my_similar = "";
		switch (mt_rand(0,8))
		{
			case 0: $specluk = "almost similar to"; break;
			case 1: $specluk = "somewhat similar to"; break;
			case 2: $specluk = "almost like"; break;
			case 3: $specluk = "somewhat like"; break;
			case 4: $specluk = "close to"; break;
			case 5: $specluk = "roughly like"; break;
			case 6: $specluk = "relatively like"; break;
			case 7: $specluk = "like a mutated version of"; break;
			case 8: $specluk = "like a deformed"; break;
		}

		switch (mt_rand(0,5))
		{
			case 0: $species = "amphibian"; $swims=1; $legs=1; $skin_picker = mt_rand(4,7); break;
			case 1: $species = "bird"; if (mt_rand(1,10) > 1){$flies=1;} $legs=1; $skin_picker = mt_rand(12,15); break;
			case 2: $species = "fish"; break;
			case 3: $species = "invertebrate"; break;
			case 4: $species = "mammal"; $legs=1; $skin_picker = mt_rand(4,11); break;
			case 5: $species = "reptile"; if ((mt_rand(1,10) == 1) && ($stage > 25)){$swims = 1;} $skin_picker = mt_rand(0,3); break;
		}
		if ($species == "invertebrate")
		{
			switch (mt_rand(0,5))
			{
				case 0: $species = "insect"; break;
				case 1: $species = "worm"; $legs=98; $skin_picker = mt_rand(4,7); if (mt_rand(1,4) != 1){$stage = "Instinctual";} break;
				case 2: $species = "slug"; $legs=98; $skin_picker = mt_rand(4,7); if (mt_rand(1,4) != 1){$stage = "Instinctual";} break;
				case 3: $species = "squid"; $swims=1; if (mt_rand(1,2) == 1){$legs=1;} $skin_picker = mt_rand(4,7); break;
				case 4: $species = "crab"; if (mt_rand(1,2) == 1){$species = "lobster";} $swims=1; $legs=1; break;
				case 5: $species = "arachnid"; if (mt_rand(1,2) == 1){$species = "spider";} $legs=8; if (mt_rand(1,3) == 1){$legs=6;} break;
			}
		}
		if ($species == "reptile")
		{
			if ( mt_rand(1,6) == 1)
			{
				$species = "snake";		$legs=99;
			}
			else
			{
				$species = "lizard";	$legs=1;
			}
		}
		if ($species == "insect")
		{
			switch (mt_rand(0,7))
			{
				case 0: $species = "moth"; if (mt_rand(1,2) == 1){$species = "butterfly";} $flies=1; $legs=1; $skin_picker = 16; break;
				case 1: $species = "grasshopper"; if (mt_rand(1,2) == 1){$species = "cricket";} if (mt_rand(1,2) == 1){$flies=1;} $legs=1; $skin_picker = 16; break;
				case 2: $species = "dragonfly"; $flies=1; $legs=1; $skin_picker = 16; break;
				case 3: $species = "fly"; $flies=1; $legs=1; $skin_picker = 16; break;
				case 4: $species = "bee"; if (mt_rand(1,2) == 1){$species = "wasp";} $flies=1; $legs=1; $skin_picker = 16; break;
				case 5: $species = "ant"; $legs=1; $skin_picker = 16; break;
				case 6: $species = "beetle"; if (mt_rand(1,3) == 1){$flies=1;} $legs=1; $skin_picker = 16; break;
				case 7: $species = "catepillar"; $legs=6; $skin_picker = mt_rand(4,7); if (mt_rand(1,2) == 1){$species = "centipede"; $legs=(mt_rand(2,10)*10); $skin_picker = 16; } break;
			}
		}
		if ($species == "fish")
		{
			$species = "fish"; $swims=1; $skin_picker = mt_rand(0,3);

			if (mt_rand(1,4) == 1)
			{
				switch (mt_rand(0,6))
				{
					case 0: $species = "shark"; $skin_picker = mt_rand(0,3); break;
					case 1: $species = "whale"; $skin_picker = mt_rand(4,7); break;
					case 2: $species = "hippocampus"; $skin_picker = mt_rand(4,7); $skin_spec=1; break;
					case 3: $species = "seal"; $skin_picker = mt_rand(4,7); break;
					case 4: $species = "eel"; $skin_picker = mt_rand(4,7); break;
					case 5: $species = "turtle"; $skin_picker = mt_rand(4,7); $skin_spec=2; break;
					case 6: $species = "ray"; $skin_picker = mt_rand(4,7); $skin_picker = 16; break;
				}
			}
			if (($xsmart < 26) && (mt_rand(1,5) == 1)){$legs=1;} 
		}
		if ($species == "mammal")
		{
			switch (mt_rand(0,11))
			{
				case 0: $similar = "cat"; if (mt_rand(1,2) == 1){$similar = "tiger";} if (mt_rand(1,4) == 1){$similar = "lion";} break;
				case 1: $similar = "dog"; if (mt_rand(1,2) == 1){$similar = "wolf";} break;
				case 2: $similar = "bear"; break;
				case 3: $similar = "horse"; break;
				case 4: $similar = "cow"; if (mt_rand(1,2) == 1){$similar = "bull";} break;
				case 5: $similar = "monkey"; if (mt_rand(1,2) == 1){$similar = "gorilla";} break;
				case 6: $similar = "deer"; if (mt_rand(1,2) == 1){$similar = "moose";} if (mt_rand(1,4) == 1){$similar = "elk";} break;
				case 7: $similar = "armadillo"; if (mt_rand(1,2) == 1){$similar = "badger";} if (mt_rand(1,4) == 1){$similar = "beaver";} break;
				case 8: $similar = "elephant"; break;
				case 9: $similar = "hippo"; break;
				case 10: $similar = "rhino"; break;
				case 11: $similar = "pig"; if (mt_rand(1,2) == 1){$similar = "boar";} break;
			}
			if (mt_rand(1,3) == 1){$my_similar = "They look " . $specluk . " a " . $similar . ".";}
		}
		if ($species == "amphibian")
		{
			switch (mt_rand(0,1))
			{
				case 0: $similar = "frog"; break;
				case 1: $similar = "salamander"; break;
			}
			if (mt_rand(1,3) == 1){$my_similar = "They look " . $specluk . " a " . $similar . ".";}
		}

	////////// SKIN ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (mt_rand(1,10) == 1){$skin_picker = mt_rand(0,16);}
		switch ($skin_picker)
		{
			case 0: $skin = "scales"; break;
			case 1: $skin = "small scales"; break;
			case 2: $skin = "thick scales"; break;
			case 3: $skin = "large scales"; break;
			case 4: $skin = "squishy skin"; break;
			case 5: $skin = "fleshy skin"; break;
			case 6: $skin = "leathery skin"; break;
			case 7: $skin = "tough skin"; break;
			case 8: $skin = "fur"; break;
			case 9: $skin = "thick fur"; break;
			case 10:$skin = "short fur"; break;
			case 11:$skin = "long fur"; break;
			case 12:$skin = "feathers"; break;
			case 13:$skin = "long feathers"; break;
			case 14:$skin = "short feathers"; break;
			case 15:$skin = "thick feathers"; break;
			case 16:$skin = "exoskeleton"; break;
		}

		// SPECIAL COVERED ANIMALS
		if ($skin_spec == 1){$skin = $skin . " over bony plates";}
		else if ($skin_spec == 2){$skin = $skin . " with a " . $xcolors2[mt_rand(0,10)] . $xcolors[mt_rand(0,16)] . " shell";}

		$skin_color_a = $xcolors2[mt_rand(0,10)];
		$skin_color_b = $xcolors[mt_rand(0,16)];
		$skin_color = $skin_color_a . $skin_color_b;

		$my_skin = "They are covered in " . $skin_color . " " . $skin;
		if ($skin_picker == 16){$my_skin = "They are covered in a " . $skin_color . " " . $skin;} // EXOSKELETON

			$fingers = mt_rand(2,10);

			if ( ($skin == "scales") || ($skin == "small scales") || ($skin == "thick scales") || ($skin == "large scales") )
			{
				$flappers = mt_rand(1,100);
					if ($flappers > 50){$my_wings = "leathery";}
					else if ($flappers > 30){$my_wings = $xcolors2[mt_rand(0,10)] . $skin_color_b . " leathery";}
					else if ($flappers > 20){$my_wings = $xcolors2[mt_rand(0,10)] . $xcolors[mt_rand(0,16)] . " leathery";}
					else if ($flappers > 10){$my_wings = "feathery";}
					else if ($flappers > 5){$my_wings = $xcolors2[mt_rand(0,10)] . $xcolors[mt_rand(0,16)] . " feathery";}
					else {$my_wings = $xcolors2[mt_rand(0,10)] . $skin_color_b . " feathery";}
				switch (mt_rand(0,1))
				{
					case 0: $my_hands = "scaly claws";	break;
					case 1: $my_hands = "scaly hands";	break;
				}
			}
			else if ( ($skin == "squishy skin") || ($skin == "fleshy skin") || ($skin == "leathery skin") || ($skin == "tough skin") )
			{
				$flappers = mt_rand(1,100);
					if ($flappers > 50){$my_wings = "leathery";}
					else if ($flappers > 30){$my_wings = $xcolors2[mt_rand(0,10)] . $skin_color_b . " leathery";}
					else {$my_wings = $xcolors2[mt_rand(0,10)] . $xcolors[mt_rand(0,16)] . " leathery";}
				switch (mt_rand(0,1))
				{
					case 0: $my_hands = "claws";	break;
					case 1: $my_hands = "hands";	break;
				}
			}
			else if ( ($skin == "fur") || ($skin == "thick fur") || ($skin == "short fur") || ($skin == "long fur") )
			{
				switch (mt_rand(0,2))
				{
					case 0: $my_wung = "furry";	break;
					case 1: $my_wung = "hairy";	break;
					case 2: $my_wung = "fuzzy";	break;
				}
				$flappers = mt_rand(1,100);
					if ($flappers > 50){$my_wings = "leathery";}
					else if ($flappers > 30){$my_wings = $xcolors2[mt_rand(0,10)] . $skin_color_b . " leathery";}
					else if ($flappers > 20){$my_wings = $xcolors2[mt_rand(0,10)] . $xcolors[mt_rand(0,16)] . " leathery";}
					else if ($flappers > 10){$my_wings = $my_wung . " skinned";}
					else if ($flappers > 5){$my_wings = $xcolors2[mt_rand(0,10)] . $xcolors[mt_rand(0,16)] . " " . $my_wung . " skinned";}
					else {$my_wings = $xcolors2[mt_rand(0,10)] . $skin_color_b . " " . $my_wung . " skinned";}
				switch (mt_rand(0,3))
				{
					case 0: $my_hands = "furry claws";	break;
					case 1: $my_hands = "furry hands";	break;
					case 2: $my_hands = "claws";		break;
					case 3: $my_hands = "hands";		break;
				}
			}
			else if ( ($skin == "feathers") || ($skin == "long feathers") || ($skin == "short feathers") || ($skin == "thick feathers") )
			{
				$flappers = mt_rand(1,100);
					if ($flappers > 50){$my_wings = "feathery";}
					else if ($flappers > 30){$my_wings = $xcolors2[mt_rand(0,10)] . $skin_color_b . " feathery";}
					else if ($flappers > 20){$my_wings = $xcolors2[mt_rand(0,10)] . $xcolors[mt_rand(0,16)] . " feathery";}
					else if ($flappers > 10){$my_wings = "leathery";}
					else if ($flappers > 5){$my_wings = $xcolors2[mt_rand(0,10)] . $xcolors[mt_rand(0,16)] . " leathery";}
					else {$my_wings = $xcolors2[mt_rand(0,10)] . $skin_color_b . " leathery";}
				switch (mt_rand(0,3))
				{
					case 0: $my_hands = "talons";	break;
					case 1: $my_hands = "talons";	break;
					case 2: $my_hands = "claws";	break;
					case 3: $my_hands = "hands";	break;
				}
			}
			else
			{
				$flappers = mt_rand(1,100);
					if ($flappers > 50){$my_wings = "leathery";}
					else if ($flappers > 30){$my_wings = $xcolors2[mt_rand(0,10)] . $skin_color_b . " leathery";}
					else {$my_wings = $xcolors2[mt_rand(0,10)] . $xcolors[mt_rand(0,16)] . " leathery";}
				switch (mt_rand(0,1))
				{
					case 0: $my_hands = "claws";	break;
					case 1: $my_hands = "hands";	break;
				}
			}
			if ($stage == "Animal")
			{
				switch (mt_rand(0,8))
				{
					case 0: $sharp_hand = "sharp ";			break;
					case 1: $sharp_hand = "huge ";			break;
					case 2: $sharp_hand = "small ";			break;
					case 3: $sharp_hand = "blunt ";			break;
					case 4: $sharp_hand = "crushing ";		break;
					case 5: $sharp_hand = "razor sharp ";	break;
					case 6: $sharp_hand = "monstrous ";		break;
					case 7: $sharp_hand = "";				break;
					case 8: $sharp_hand = "";				break;
				}
				switch (mt_rand(0,6))
				{
					case 0: $sharp_claw = "sharp ";			break;
					case 1: $sharp_claw = "huge ";			break;
					case 2: $sharp_claw = "small ";			break;
					case 3: $sharp_claw = "razor sharp ";	break;
					case 4: $sharp_claw = "monstrous ";		break;
					case 5: $sharp_claw = "";				break;
					case 6: $sharp_claw = "";				break;
				}

				if ($species == "amphibian"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,2) == 1){$my_hands = $sharp_claw . "webbed claws";}}
				else if ($species == "bird"){$my_hands = $sharp_claw . "talons"; if (mt_rand(1,4) == 1){$my_hands = $sharp_claw . "claws";}}
				else if ($species == "mammal"){$my_hands = $sharp_claw . "claws";}
				else if ($species == "reptile"){$my_hands = $sharp_claw . "claws";}
				else if ($species == "squid"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,2) == 1){$my_hands = $sharp_claw . "webbed claws";}}
				else if ($species == "crab"){$fingers = 0; $my_hands = $sharp_hand . "pincers";}
				else if ($species == "lobster"){$fingers = 0; $my_hands = $sharp_hand . "pincers";}
				else if ($species == "arachnid"){$fingers = 0; $my_hands = $sharp_hand . "pincers";}
				else if ($species == "spider"){$fingers = 0; $my_hands = $sharp_hand . "pincers";}

				else if ($species == "snake"){$my_hands = $sharp_claw . "claws";}
				else if ($species == "lizard"){$my_hands = $sharp_claw . "claws";}

				else if ($species == "moth"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,3) == 1){$fingers = 0; $my_hands = $sharp_hand . "pincers";}}
				else if ($species == "butterfly"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,3) == 1){$fingers = 0; $my_hands = $sharp_hand . "pincers";}}
				else if ($species == "grasshopper"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,3) == 1){$fingers = 0; $my_hands = $sharp_hand . "pincers";}}
				else if ($species == "cricket"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,3) == 1){$fingers = 0; $my_hands = $sharp_hand . "pincers";}}
				else if ($species == "dragonfly"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,3) == 1){$fingers = 0; $my_hands = $sharp_hand . "pincers";}}
				else if ($species == "fly"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,3) == 1){$fingers = 0; $my_hands = $sharp_hand . "pincers";}}
				else if ($species == "bee"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,3) == 1){$fingers = 0; $my_hands = $sharp_hand . "pincers";}}
				else if ($species == "wasp"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,3) == 1){$fingers = 0; $my_hands = $sharp_hand . "pincers";}}
				else if ($species == "ant"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,3) == 1){$fingers = 0; $my_hands = $sharp_hand . "pincers";}}
				else if ($species == "beetle"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,3) == 1){$fingers = 0; $my_hands = $sharp_hand . "pincers";}}
				else if ($species == "catepillar"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,3) == 1){$fingers = 0; $my_hands = $sharp_hand . "pincers";}}
				else if ($species == "centipede"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,3) == 1){$fingers = 0; $my_hands = $sharp_hand . "pincers";}}

				else if ($species == "fish"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,2) == 1){$my_hands = $sharp_claw . "webbed claws";}}
				else if ($species == "shark"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,2) == 1){$my_hands = $sharp_claw . "webbed claws";}}
				else if ($species == "whale"){$my_hands = $sharp_claw . "claws";}
				else if ($species == "hippocampus"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,2) == 1){$my_hands = $sharp_claw . "webbed claws";}}
				else if ($species == "seal"){$my_hands = $sharp_claw . "claws";}
				else if ($species == "eel"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,2) == 1){$my_hands = $sharp_claw . "webbed claws";}}
				else if ($species == "turtle"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,2) == 1){$my_hands = $sharp_claw . "webbed claws";}}
				else if ($species == "ray"){$my_hands = $sharp_claw . "claws"; if (mt_rand(1,2) == 1){$my_hands = $sharp_claw . "webbed claws";}}
			}

		$d_feet = explode(" ", $my_hands);
		$c_feet = count($d_feet);
		$f = 0;
			while ($c_feet > 0) :

				if ($d_feet[$f] == "talons"){$swiper = "talon";}
				else if ($d_feet[$f] == "hands"){$swiper = "fist";}
				else if ($d_feet[$f] == "pincers"){$swiper = "pincer";}
				else {$swiper = "claw";}

				$f = $f + 1;
				$c_feet = $c_feet - 1;

			endwhile;

	////////// GET THE MOBILITY /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ( (($legs == 1) && (mt_rand(1,100) > 75)) || ($species == "bird") )
		{
			$walkers = array("2", "2", "2", "2", "2", "4", "4", "6", "8");
			$legs = $walkers[mt_rand(0,8)];
		}
		else if ($legs == 1)
		{
			$walkers = array("2", "4", "4", "4", "4", "4", "6", "6", "8");
			$legs = $walkers[mt_rand(0,8)];
		}
		$leg_size = array("", "", "", "short ", "long ", "large ", "small ");
		$leg_wide = array("", "", "", "muscular ", "thin ");

		if ($legs == 2){$movement = mt_rand(4,10);}
		else if ($legs == 4){$movement = mt_rand(6,12);}
		else if ($legs == 6){$movement = mt_rand(8,14);}
		else if ($legs == 8){$movement = mt_rand(10,16);}
		else {$movement = mt_rand(4,16);}

		$movement = $movement * 10;
		$move_swim = mt_rand(6,16) * 10;
		$move_fly = mt_rand(6,16) * 10;
		$mover = 0;

		// LEGS
		if ($legs == 99){$my_legs = "They slither around, moving " . $movement . "' per turn."; $mover=1;} // SLITHER CREATURES
		if ($legs == 98){$my_legs = "They use their muscles to push themselves along, moving " . $movement . "' per turn."; $mover=1;} // WORM CREATURES
		else if ($legs > 0)
		{
			$my_legs = "They move about " . $movement . "' per turn on " . $legs . " " . $leg_size[mt_rand(0,6)] . "legs"; $mover=1;
			if (($stage == "Animal") && ($swiper != "pincer")){$my_legs = $my_legs . " with " . $my_hands . " for feet.";} else {$my_legs = $my_legs . ".";}
		}

		// SWIM
		if (($swims > 0) && ($mover > 0)){$my_legs = $my_legs . " They can also swim at about " . $move_swim . "' per turn."; $mover=1;}
		else if ($swims > 0){$my_legs = "They can swim at about " . $move_swim . "' per turn."; $mover=1;}

		// FLY
		if (mt_rand(1,100) > 96){$flies = 1;} // ONE LAST CHANCE TO SEE IF THEY CAN FLY AROUND OR NOT
		if (($flies > 0) && ($mover > 0)){$my_legs = $my_legs . " They have " . $my_wings . " wings that allow them to fly at about " . $move_fly . "' per turn."; $mover=1;}
		else if ($flies > 0){$my_legs = "They can fly at about " . $move_fly . "' per turn with their " . $my_wings . " wings."; $mover=1;}

	////////// WHERE LIVE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ($swims > 0){ $my_dwell = mt_rand(10,11); }
		else { if ($game == "Broken Urthe"){$my_dwell = mt_rand(0,9);} else {$my_dwell = mt_rand(1,9);} }
		switch ($my_dwell)
		{
			case 0: $dwell = "wastelands"; break;
			case 1: $dwell = "forests"; break;
			case 2: $dwell = "hills"; break;
			case 3: $dwell = "mountains"; break;
			case 4: $dwell = "plains & grasslands"; break;
			case 5: $dwell = "swamps & marshes"; break;
			case 6: $dwell = "deserts"; if (mt_rand(1,4) == 1){$dwell = "deserts & tropics";} break;
			case 7: $dwell = "jungles"; if (mt_rand(1,4) == 1){$dwell = "jungles & tropics";} break;
			case 8: $dwell = "snow & icy regions"; break;
			case 9: $dwell = "underground areas"; break;
			case 10: $dwell = "rivers & lakes"; if ($flies == 0){$swims = 1;} break;
			case 11: $dwell = "oceans"; if ($flies == 0){$swims = 1;} break;
		}

	////////// ACTIVE CYCLE //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (mt_rand(1,100) > 50){ $sleep = "any"; }
		else { $sleep = array('any', 'day', 'night'); $sleep = $sleep[mt_rand(0,2)]; }

		$my_daily = "They inhabit the " . $dwell . " and are active during varying times of day or night.";

		switch (mt_rand(0,8))
		{
			case 0: $my_daily = "They inhabit the " . $dwell . " and are more active during the day.";		break;
			case 1: $my_daily = "They inhabit the " . $dwell . " and are more active during the night.";	break;
			case 2: $my_daily = "They inhabit the " . $dwell . " and are only active during the day.";		break;
			case 3: $my_daily = "They inhabit the " . $dwell . " and are only active during the night.";	break;
		}
		if ($dwell == "underground areas"){$my_daily = "They inhabit the " . $dwell . " like caves and tunnels.";}

	////////// DIET /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$my_food_plant = array("leafy plants", "plant roots", "fruits", "vegetables", "shrubs and bushes", "tree bark", "succulent plants", "grasses");
		$my_food_meats = array("meat", "smaller creatures", "live creatures", "creature carcasses", "insects", "reptiles", "birds", "any meat");

			$my_p_food = $my_food_plant[mt_rand(0,7)];
			$my_m_food = $my_food_meats[mt_rand(0,7)];

		if ( (($swims > 0) && ($legs == 0)) || (($swims > 0) && ($legs > 0) && (mt_rand(1,3) == 1)) )
		{
			$my_food_plant = array("seaweed", "algae");
			$my_food_meats = array("meat", "smaller creatures", "shellfish", "fish", "reptiles", "any meat");
				$my_p_food = $my_food_plant[mt_rand(0,1)];
				$my_m_food = $my_food_meats[mt_rand(0,5)];
		}

		switch (mt_rand(0,2))
		{
			case 0: $my_diet = "They are carnivores, eating " . $my_m_food . " as their main diet.";	break;
			case 1: $my_diet = "They are herbivores, eating " . $my_p_food . " as their main diet.";	break;
			case 2: $my_diet = "They are omnivores, eating " . $my_m_food . " or " . $my_p_food . ".";		break;
		}
		if (($stage == "Primitive") || ($stage == "Industrial") || ($stage == "Modern") || ($stage == "Advanced"))
		{
			switch (mt_rand(0,3))
			{
				case 0: $my_diet = "They are mainly carnivores, eating various meats.";	break;
				case 1: $my_diet = "They are mainly herbivores, eating various fruits and vegetables.";	break;
				case 2: $my_diet = "They are mainly omnivores, eating various fruits, vegetables, and meat.";		break;
				case 3: $my_diet = "They are mainly omnivores, eating various fruits, vegetables, and meat.";		break;
			}
		}

	////////// ARMS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ( ( ($species == "slug") || ($species == "worm") || ($species == "snake") ) && ( $stage == "Animal" || $stage == "Instinctual" ) ){$arms = 0;}
		else if ( ( ($stage == "Animal") || ($stage == "Instinctual") ) && (mt_rand(1,10) != 1) ){$arms = 0;}
		else if (mt_rand(1,100) > 25){ $arms = 2; }
		else { $arms = 2 * mt_rand(1,3); }

		$arm_size = array("", "short ", "long ", "muscular ", "thin ", "large ", "small ");

		if ($arms == 0){$my_arms = "";}
		else if ($fingers == 0){ $my_arms = "They have " . $arms . " " . $arm_size[mt_rand(0,6)]. "arms with " . $my_hands . "."; }
		else { $my_arms = "They have " . $arms . " " . $arm_size[mt_rand(0,6)]. "arms with " . $fingers . " digit " . $my_hands . "."; }

	////////// SIZE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$size_high = 0;
		$size_wide = 0;
		$size_long = 0;
		$humanoid = 0;

		if ( ($stage == "Instinctual") || ($stage == "Animal") )
		{
			$xsize = mt_rand(1,100);
			if ($xsize > 40){$size_high = mt_rand(1,5); if ($species == "whale"){$species = "dolphin";} }
			else if ($xsize > 20){$size_high = mt_rand(3,8); if ($species == "whale"){$species = "dolphin";} }
			else if ($xsize > 10){$size_high = mt_rand(5,12); if ($species == "whale"){$species = "dolphin";} }
			else if ($xsize > 5){$size_high = mt_rand(15,30);}
			else {$size_high = mt_rand(20,60);}
		}
		else
		{
			$xsize = mt_rand(1,100);
			if ($xsize > 80){$size_high = mt_rand(1,5); if ($species == "whale"){$species = "dolphin";} }
			else if ($xsize > 30){$size_high = mt_rand(3,8); if ($species == "whale"){$species = "dolphin";} }
			else if ($xsize > 2){$size_high = mt_rand(5,12); if ($species == "whale"){$species = "dolphin";} }
			else {$size_high = mt_rand(15,30);}
		}

		if ( ($stage == "Instinctual") || ($stage == "Animal") )
		{
			if ( ($species == "squid") || ($species == "catepillar") || ($species == "centipede") || ($species == "eel") || ($species == "snake") || ($species == "slug") || ($species == "worm") )
			{
				$size_long = $size_high;
				$size_high = $size_long / mt_rand(8,12);
					if ($size_high < 1){$size_high = 1;}
					if ($size_high == $size_long){$size_long = $size_high * mt_rand(3,12);}
				$size_wide = $size_high;
				if ($species == "centipede"){$size_wide = $size_high/3;} else if ($species == "squid"){$size_wide = $size_high + mt_rand(-2,2);}
			}
			else if ( ($species == "hippocampus") || ($species == "seal") || ($species == "shark") || ($species == "dolphin") || ($species == "whale") || ($species == "fish") || ($species == "lobster") || ($species == "lizard") )
			{
				$size_long = $size_high;
				$size_high = $size_long / mt_rand(5,10);
					if ($size_high < 1){$size_high = 1;}
				$size_wide = $size_high/mt_rand(2,3);
			}
			else if ( ($species == "turtle") || ($species == "amphibian") || ($species == "crab") || ($species == "spider") || ($species == "arachnid") )
			{
				$size_long = $size_high;
				$size_high = $size_long / mt_rand(2,3);
					if ($size_high < 1){$size_high = 1;}
				$size_wide = $size_high/mt_rand(2,3);
			}
			else if ( ($species == "bird") )
			{
				$size_wide = $size_high/5;
				$size_long = $size_high * mt_rand(2,3);
			}
			else if ( ($species == "mammal") )
			{
				$size_wide = $size_high/2;
				$size_long = $size_high * mt_rand(3,5);
			}
			else if ( ($species == "moth") || ($species == "butterfly") || ($species == "grasshopper") || ($species == "cricket") || ($species == "dragonfly") || ($species == "wasp") || ($species == "ant") )
			{
				$size_long = $size_high;
				$size_high = $size_long / mt_rand(3,6);
					if ($size_high < 1){$size_high = 1;}
				$size_wide = $size_high;
			}
			else if ( ($species == "fly") || ($species == "bee") || ($species == "beetle") )
			{
				$size_long = $size_high;
				$size_high = $size_long / mt_rand(2,4);
					if ($size_high < 1){$size_high = 1;}
				$size_wide = $size_high * mt_rand(1,2);
			}
			else if ( ($species == "ray") )
			{
				$size_wide = $size_high;
				$size_long = $size_high * mt_rand(1,3);
					$size_high = $size_high/10;
			}
		}
		else
		{
			if ( ($species == "squid") || ($species == "catepillar") || ($species == "centipede") || ($species == "eel") || ($species == "snake") || ($species == "slug") || ($species == "worm") )
			{
				$size_long = $size_high;
				$size_high = $size_long / 2;
					if ($size_high < 1){$size_high = 1;}
					if ($size_high == $size_long){$size_long = $size_high * mt_rand(3,12);}
				$size_wide = $size_high;
				if ($species == "centipede"){$size_wide = $size_high/3;} else if ($species == "squid"){$size_wide = $size_high + mt_rand(-2,2);}
			}
			else
			{
				$humanoid = 1;
			}
		}

		$size_high = floor($size_high);
		$size_wide = floor($size_wide);
		$size_long = floor($size_long);
		$size_wing = $size_high + $size_long + mt_rand(1,5);
		if ($size_high < 1){$size_high = mt_rand(4,11) . '"';} else {$size_high = $size_high . "'";}
		if ($size_wide < 1){$size_wide = mt_rand(4,11) . '"';} else {$size_wide = $size_wide . "'";}
		if ($size_long < 1){$size_long = mt_rand(4,11) . '"';} else {$size_long = $size_long . "'";}

		$mes_size = array("roughly ", "usually ", "normally ", "", "about ");

		if ($humanoid > 0)
		{
			$my_size = "that is " . $mes_size[mt_rand(0,4)] . $size_high . " tall";
			$my_big = $size_high . " tall";
		}
		else if ($size_high == $size_wide)
		{
			$my_size = "that is " . $mes_size[mt_rand(0,4)] . $size_wide . " wide, and " . $size_long . " long";
			$my_big = $size_wide . " wide&nbsp;/&nbsp;" . $size_long . " long";
		}
		else
		{
			$my_size = "that is " . $mes_size[mt_rand(0,4)] . $size_high . " tall, " . $size_wide . " wide, and " . $size_long . " long";
			$my_big = $size_high . " tall&nbsp;/&nbsp;" . $size_wide . " wide&nbsp;/&nbsp;" . $size_long . " long";
		}

		if ($flies > 0)
		{
			$my_size = $my_size . ", with a wingspan of " . $size_wing . "'";
		}

	////////// EYES ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$xeyes = array("0", "1", "2", "2", "2", "2", "3", "4", "6", "8");
		$eyes = $xeyes[mt_rand(0,9)];

		$ecolor = $xcolors[mt_rand(0,16)];
		$ecolor2 = $xcolors2[mt_rand(0,10)];
		$eye_color = $ecolor2 . $ecolor;

		$eye_size = array("", "small ", "large ", "bulbous ", "small ", "large ", "small ", "large ");

		if (($flies > 0) || ($swims > 0)){$eyes = $xeyes[mt_rand(1,9)];}
		if ($eyes == 1){$my_eyes = "and they can see with a single " . $eye_size[mt_rand(0,7)] . $eye_color . " eye.";}
		else if ($eyes > 0){$my_eyes = "and they see with " . $eyes . " " . $eye_size[mt_rand(0,7)] . $eye_color . " eyes.";}
		else
		{
			switch (mt_rand(0,4))
			{
				case 0: $my_eyes = "and they cannot see but sense heat patterns in the area."; break;
				case 1: $my_eyes = "and they cannot see but feel vibrations in the area."; break;
				case 2: $my_eyes = "and they cannot see but emit a sonar sound to detect objects in the area."; break;
				case 3: $my_eyes = "and they cannot see but listen to their surroundings."; break;
				case 4: $my_eyes = "and they cannot see but touch and feel everything around them instead."; break;
			}
		}

	////////// LEVEL //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$level = mt_rand(1,20);

	////////// PROTECTION // HIT SCORE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ($level == 1){$protection = mt_rand(-2,6); $hit = 10;}
		else if ($level == 2){$protection = mt_rand(-1,7); $hit = 10;}
		else if ($level == 3){$protection = mt_rand(0,8); $hit = 9;}
		else if ($level == 4){$protection = mt_rand(1,9); $hit = 9;}
		else if ($level == 5){$protection = mt_rand(2,10); $hit = 8;}
		else if ($level == 6){$protection = mt_rand(2,10); $hit = 8;}
		else if ($level == 7){$protection = mt_rand(3,11); $hit = 7;}
		else if ($level == 8){$protection = mt_rand(3,11); $hit = 7;}
		else if ($level == 9){$protection = mt_rand(4,12); $hit = 6;}
		else if ($level == 10){$protection = mt_rand(4,12); $hit = 6;}
		else if ($level == 11){$protection = mt_rand(5,13); $hit = 5;}
		else if ($level == 12){$protection = mt_rand(5,13); $hit = 5;}
		else if ($level == 13){$protection = mt_rand(6,14); $hit = 4;}
		else if ($level == 14){$protection = mt_rand(6,14); $hit = 4;}
		else if ($level == 15){$protection = mt_rand(7,15); $hit = 3;}
		else if ($level == 16){$protection = mt_rand(7,15); $hit = 3;}
		else if ($level == 17){$protection = mt_rand(8,16); $hit = 2;}
		else if ($level == 18){$protection = mt_rand(8,16); $hit = 2;}
		else if ($level == 19){$protection = mt_rand(9,17); $hit = 1;}
		else {$protection = mt_rand(10,18); $hit = 1;}

	////////// HIT ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$hit = $hit - mt_rand(-2,2);

	////////// STAMINA ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$stamina = ($level * 8) + mt_rand(0,$level);

	////////// DEFENSES ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ($level == 2){$save_e=6; $save_m=4; $save_r=5; $save_s=6; $save_t=5; $dmg_d = 1;}
	else if ($level == 3){$save_e=6; $save_m=5; $save_r=5; $save_s=7; $save_t=6; $dmg_d = 2;}
	else if ($level == 4){$save_e=7; $save_m=6; $save_r=6; $save_s=8; $save_t=7; $dmg_d = 2;}
	else if ($level == 5){$save_e=7; $save_m=7; $save_r=6; $save_s=8; $save_t=8; $dmg_d = 3;}
	else if ($level == 6){$save_e=8; $save_m=8; $save_r=6; $save_s=9; $save_t=9; $dmg_d = 3;}
	else if ($level == 7){$save_e=8; $save_m=9; $save_r=7; $save_s=9; $save_t=9; $dmg_d = 4;}
	else if ($level == 8){$save_e=9; $save_m=10; $save_r=7; $save_s=10; $save_t=10; $dmg_d = 4;}
	else if ($level == 9){$save_e=9; $save_m=10; $save_r=7; $save_s=10; $save_t=10; $dmg_d = 5;}
	else if ($level == 10){$save_e=9; $save_m=10; $save_r=8; $save_s=11; $save_t=11; $dmg_d = 5;}
	else if ($level == 11){$save_e=10; $save_m=11; $save_r=8; $save_s=11; $save_t=11; $dmg_d = 6;}
	else if ($level == 12){$save_e=10; $save_m=11; $save_r=8; $save_s=12; $save_t=12; $dmg_d = 6;}
	else if ($level == 13){$save_e=10; $save_m=11; $save_r=9; $save_s=12; $save_t=12; $dmg_d = 7;}
	else if ($level == 14){$save_e=11; $save_m=12; $save_r=9; $save_s=13; $save_t=13; $dmg_d = 8;}
	else if ($level == 15){$save_e=11; $save_m=12; $save_r=9; $save_s=13; $save_t=13; $dmg_d = 9;}
	else if ($level == 16){$save_e=11; $save_m=12; $save_r=10; $save_s=14; $save_t=13; $dmg_d = 10;}
	else if ($level == 17){$save_e=12; $save_m=13; $save_r=10; $save_s=14; $save_t=14; $dmg_d = 11;}
	else if ($level == 18){$save_e=12; $save_m=13; $save_r=11; $save_s=15; $save_t=14; $dmg_d = 12;}
	else if ($level == 19){$save_e=12; $save_m=13; $save_r=11; $save_s=15; $save_t=14; $dmg_d = 13;}
	else if ($level == 20){$save_e=13; $save_m=14; $save_r=12; $save_s=16; $save_t=15; $dmg_d = 14;}
	else {$save_e=5; $save_m=3; $save_r=4; $save_s=5; $save_t=4; $dmg_d = 1;}

		$save_e = ($save_e + mt_rand(-1,1));
		$save_m = ($save_m + mt_rand(-1,1));
		$save_r = ($save_r + mt_rand(-1,1));
		$save_s = ($save_s + mt_rand(-1,1));
		$save_t = ($save_t + mt_rand(-1,1));

			if ($stage == "Instinctual"){$save_m = "-";}
			else if ($stage == "Animal"){$save_m = $save_m - 3;}
			else if ($stage == "Primitive"){$save_m = $save_m - 2;}
			else if ($stage == "Industrial"){$save_m = $save_m - 1;}
			else if ($stage == "Modern"){}
			else {$save_m = $save_m + 2;}

			if ($dwell == "wastelands"){$save_r = mt_rand(16,19);}

				$defenses = "E:" . $save_e . "&nbsp;/&nbsp;M:" . $save_m . "&nbsp;/&nbsp;R:" . $save_r . "&nbsp;/&nbsp;S:" . $save_s . "&nbsp;/&nbsp;T:" . $save_t;

	////////// ATTACKS ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$my_attack = "";
		$my_damage = "";
		$my_weapon = "";

		$damage_dice = array('1d4', '1d6', '1d8', '2d4', '1d10', '1d12', '2d6', '2d8', '1d20', '2d10', '2d12', '3d6', '3d8', '3d10', '3d12');
		$damage_mods = array('+1', '+1', '+1', '+1', '+1', '+1', '+1', '+1', '+2', '+2', '+2', '+2', '+2', '+2', '+2', '+2', '+2', '+2', '+3', '+3', '+3', '+3', '+4');
		$dmg_min = $dmg_d - 5;
			if ($dmg_min < 1){$dmg_min = 0;}
		$dmg_max = $dmg_d;
		$damage_done = $damage_dice[mt_rand(0,$dmg_max)];
		if (mt_rand(1,10) == 1){$damage_done = $damage_done . $damage_mods[mt_rand(0,22)];}

			if ($stage == "Instinctual")
			{
				$my_attack = "1 bite";
				$my_damage = $damage_done;
			}
			else if ($stage == "Animal")
			{
				if ((mt_rand(1,4) != 1) || (($legs == 0) && ($my_arms == "")) || ($swiper == "fist") || ($swiper == "pincer"))
				{
					$my_attack = "1 bite";
					$my_damage = $damage_done;
				}
				if (((mt_rand(1,4) == 1) || ($my_attack == "")) && ((($legs > 0) && ($legs < 9)) || ($my_arms != "")) && ($swiper != "fist") && ($swiper != "pincer"))
				{
					$damage_swipe = $damage_dice[mt_rand(0,$dmg_max)];
					if (mt_rand(1,10) == 1){$damage_swipe = $damage_swipe . $damage_mods[mt_rand(0,22)];}
					if ($my_attack != ""){$my_attack = $my_attack . "&nbsp;/&nbsp;1 " . $swiper; $my_damage = $my_damage . "&nbsp;/&nbsp;" . $damage_swipe;}
					else
					{
						if (mt_rand(1,4) == 1){$my_attack = "2 " . $swiper . "s"; $my_damage = $damage_swipe . " each";}
						else {$my_attack = "1 " . $swiper; $my_damage = $damage_swipe;}
					}
				}
			}
			else
			{
				if ((mt_rand(1,2) == 1) && (($swiper == "talon") || ($swiper == "claw")))
				{
					$my_attack = "1 " . $swiper;
					$my_damage = $damage_done;
				}
				if (($my_attack == "") || (mt_rand(1,4) != 1) || ($stage != "Primitive"))
				{
					if ($my_attack != ""){$my_attack = $my_attack . "&nbsp;/&nbsp;1 weapon"; $my_damage = $my_damage . "&nbsp;/&nbsp;weapon";}
					else {$my_attack = "1 weapon"; $my_damage = "weapon";}

					if ($stage == "Primitive")
					{
						$how_primitive = mt_rand(0,2);
						$guns = PAgetWeapon($how_primitive,"Broken Urthe");
						if ($how_primitive == 0){}
						else if ($how_primitive == 1){}
						else {}
					}
					else if ($stage == "Industrial"){$guns = PAgetWeapon(3,"Broken Urthe");}
					else if ($stage == "Modern"){$guns = PAgetWeapon(mt_rand(3,4),"Broken Urthe");}
					else {$guns = PAgetWeapon(mt_rand(4,5),"Broken Urthe");}

						switch (mt_rand(0,5))
						{
							case 0: $reason = " as their combat weapon."; break;
							case 1: $reason = " for the battles they fight."; break;
							case 2: $reason = " as their favored weapon."; break;
							case 3: $reason = " for any attacks."; break;
							case 4: $reason = " for attacking enemies."; break;
							case 5: $reason = " as their primary weapon."; break;
						}

					$my_weapon = "They often carry a " . strtolower($guns) . $reason;
				}
				if ($my_attack == "")
				{
					$my_attack = "1 " . $swiper;
					$my_damage = $damage_done;
				}
			}

	////////// GARMENTS ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		switch (mt_rand(0,2))
		{
			case 0: $my_garb_color = plainColor(); break;
			case 1: $my_garb_color = leatherColor(); break;
			case 2: $my_garb_color = designColor(); break;
		}
		$my_garb = "";
		if ($stage == "Primitive") //////////////////////////////////////////////////////////
		{
			if ($how_primitive == 1)
			{
				switch (mt_rand(0,3))
				{
					case 0: $my_garb = " and often wear leathery type armor made from nearby animals."; break;
					case 1: $my_garb = " and often wear animal furs they collected from nearby animals."; break;
					case 2: $my_garb = " and often wear " . leatherColor() . " colored leathery type armor."; break;
					case 3: $my_garb = " and often wear " . leatherColor() . " colored animal furs."; break;
				}
			}
			else if ($how_primitive == 2)
			{
				switch (mt_rand(0,4))
				{
					case 0: $my_garb = " and often wear hand-stitched clothing."; break;
					case 1: $my_garb = " and often wear medieval looking armors."; break;
					case 2: $my_garb = " and often wear ragged clothing."; break;
					case 3: $my_garb = " and often wear leathery type armor made from nearby animals."; break;
					case 4: $my_garb = " and often wear " . leatherColor() . " colored leathery type armor."; break;
				}
			}
			else
			{
				switch (mt_rand(0,4))
				{
					case 0: $my_garb = " and often wear leafy plants over some of their bodies."; break;
					case 1: $my_garb = " and often wear animal furs they collected from nearby animals."; break;
					case 2: $my_garb = " and often paint parts of their bodies in some type of " . $my_garb_color . " color."; break;
					case 3: $my_garb = "."; break;
					case 4: $my_garb = "."; break;
				}
			}
			if ($swims > 0){$my_garb = "";}
		}
		else if ($stage == "Industrial") //////////////////////////////////////////////////////////
		{
			switch (mt_rand(0,4))
			{
				case 0: $my_garb = " and often wear finely-stitched clothing."; break;
				case 1: $my_garb = " and often wear rugged clothing."; break;
				case 2: $my_garb = " and often wear steel plated military type armors that are mostly " . $my_garb_color . " in color."; break;
				case 3: $my_garb = " and often wear colorfully designed clothing."; break;
				case 4: $my_garb = " and often wear a similar cloth uniform that is mostly " . $my_garb_color . " in color."; break;
			}
			if ($swims > 0)
			{
				switch (mt_rand(0,5))
				{
					case 0: $my_garb = " and often wear skin tight, water resistant, clothing of varying colors."; break;
					case 1: $my_garb = "."; break;
					case 2: $my_garb = "."; break;
					case 3: $my_garb = "."; break;
					case 4: $my_garb = "."; break;
					case 5: $my_garb = " and often wear a skin tight uniform that is mainly " . $my_garb_color . " in color."; break;
				}
			}
		}
		else if (($stage == "Modern") || ($stage == "Advanced")) //////////////////////////////////////////////////////////
		{
			switch (mt_rand(0,4))
			{
				case 0: $my_garb = " and often wear finely-stitched clothing."; break;
				case 1: $my_garb = " and often wear average clothing."; break;
				case 2: $my_garb = " and often wear modern military type armor that is mostly " . $my_garb_color . " in color."; break;
				case 3: $my_garb = " and often wear colorfully designed clothing."; break;
				case 4: $my_garb = " and often wear a similar cloth uniform that is mostly " . $my_garb_color . " in color."; break;
			}
			if ($swims > 0)
			{
				switch (mt_rand(0,4))
				{
					case 0: $my_garb = " and often wear skin tight, water resistant, clothing of varying colors."; break;
					case 1: $my_garb = " and often wear a plastoid type armor that is mostly " . $my_garb_color . " in color."; break;
					case 2: $my_garb = " and often wear a silicoid type armor that is mostly " . $my_garb_color . " in color."; break;
					case 3: $my_garb = "."; break;
					case 4: $my_garb = " and often wear a skin tight uniform that is mainly " . $my_garb_color . " in color."; break;
				}
			}
		}

	////////// HOUSING ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$my_city = "";
		if (($stage != "Animal") && ($stage != "Instinctual"))
		{
			switch (mt_rand(0,4))
			{
				case 0: $my_city_group = "tribes"; break;
				case 1: $my_city_group = "communities"; break;
				case 2: $my_city_group = "groups"; break;
				case 3: $my_city_group = "settlements"; break;
				case 4: $my_city_group = "villages"; break;
			}
			switch (mt_rand(0,4))
			{
				case 0: $my_city_knight = "towns"; break;
				case 1: $my_city_knight = "communities"; break;
				case 2: $my_city_knight = "groups"; break;
				case 3: $my_city_knight = "settlements"; break;
				case 4: $my_city_knight = "villages"; break;
			}
			switch (mt_rand(0,3))
			{
				case 0: $my_city_industry = "towns"; break;
				case 1: $my_city_industry = "cities"; break;
				case 2: $my_city_industry = "forts"; break;
				case 3: $my_city_industry = "villages"; break;
			}
			switch (mt_rand(0,2))
			{
				case 0: $my_city_tech = "cities"; break;
				case 1: $my_city_tech = "outposts"; break;
				case 2: $my_city_tech = "bases"; break;
			}
			switch (mt_rand(0,3))
			{
				case 0: $my_city_size = "large "; break;
				case 1: $my_city_size = "small "; break;
				case 2: $my_city_size = ""; break;
				case 3: $my_city_size = ""; break;
			}
				if ( ($dwell == "forests") || ($dwell == "jungles") || ($dwell == "jungles & tropics") || ($dwell == "deserts & tropics") )
				{
					if ($stage == "Primitive")
					{
						$city = mt_rand(0,4);
						if ($how_primitive == 1){$city = mt_rand(4,5);}
						else if ($how_primitive == 2){$city = mt_rand(5,8);}
					}
					else if ($stage == "Industrial"){$city = mt_rand(9,10);}
					else if ($stage == "Modern"){$city = 11;}
					else if ($stage == "Advanced"){$city = 12;}
						switch ($city)
						{
							case 0: $my_city = "They live in " . $my_city_size . $my_city_group . " within the large tree roots"; break;
							case 1: $my_city = "They live in " . $my_city_size . $my_city_group . " high in the trees"; break;
							case 2: $my_city = "They live in " . $my_city_size . $my_city_group . " within burrows in the ground"; break;
							case 3: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of leaves and branches"; break;
							case 4: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of furs and skins"; break;
							case 5: $my_city = "They live in " . $my_city_size . $my_city_group . " within houses built from trees"; break;
							case 6: $my_city = "They live in " . $my_city_size . $my_city_group . " within wood and stone houses"; break;
							case 7: $my_city = "They live in " . $my_city_size . $my_city_knight . " within wood and stone houses"; break;
							case 8: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses"; break;
							case 8: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses and buildings"; break;
							case 9: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with wood and stone"; break;
							case 10: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with wood, stone, and metal"; break;
							case 11: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . ""; break;
							case 12: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . ""; break;
						}
				}
				else if ( ($dwell == "hills") || ($dwell == "plains & grasslands") )
				{
					if ($stage == "Primitive")
					{
						$city = mt_rand(0,2);
						if ($how_primitive == 1){$city = mt_rand(2,4);}
						else if ($how_primitive == 2){$city = mt_rand(5,7);}
					}
					else if ($stage == "Industrial"){$city = mt_rand(5,9);}
					else if ($stage == "Modern"){$city = 10;}
					else if ($stage == "Advanced"){$city = 11;}
						switch ($city)
						{
							case 0: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of leaves and grasses"; break;
							case 1: $my_city = "They live in " . $my_city_size . $my_city_group . " within burrows in the ground"; break;
							case 2: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of leaves and grasses"; break;
							case 3: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of furs and skins"; break;
							case 4: $my_city = "They live in " . $my_city_size . $my_city_group . " within wood and mud houses"; break;
							case 5: $my_city = "They live in " . $my_city_size . $my_city_knight . " within wood and plaster houses"; break;
							case 6: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses"; break;
							case 7: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses and buildings"; break;
							case 8: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with concrete"; break;
							case 9: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with concrete and metal"; break;
							case 10: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . ""; break;
							case 11: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . ""; break;
						}
				}
				else if ($dwell == "mountains")
				{
					if ($stage == "Primitive")
					{
						$city = mt_rand(0,2);
						if ($how_primitive == 1){$city = mt_rand(2,3);}
						else if ($how_primitive == 2){$city = mt_rand(3,6);}
					}
					else if ($stage == "Industrial"){$city = mt_rand(6,8);}
					else if ($stage == "Modern"){$city = 9;}
					else if ($stage == "Advanced"){$city = 10;}
						switch ($city)
						{
							case 0: $my_city = "They live in " . $my_city_size . $my_city_group . " within mountain caves"; break;
							case 1: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of furs and skins"; break;
							case 2: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of furs and skins"; break;
							case 3: $my_city = "They live in " . $my_city_size . $my_city_group . " within wood and mud houses"; break;
							case 4: $my_city = "They live in " . $my_city_size . $my_city_knight . " within wood and plaster houses"; break;
							case 5: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses"; break;
							case 6: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses and buildings"; break;
							case 7: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with concrete"; break;
							case 8: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with concrete and metal"; break;
							case 9: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . ""; break;
							case 10: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . ""; break;
						}
				}
				else if ($dwell == "swamps & marshes")
				{
					if ($stage == "Primitive")
					{
						$city = mt_rand(0,1);
						if ($how_primitive == 1){$city = mt_rand(1,3);}
						else if ($how_primitive == 2){$city = mt_rand(4,6);}
					}
					else if ($stage == "Industrial"){$city = mt_rand(5,8);}
					else if ($stage == "Modern"){$city = 9;}
					else if ($stage == "Advanced"){$city = 10;}
						switch ($city)
						{
							case 0: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of leaves and branches"; break;
							case 1: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of furs and skins"; break;
							case 2: $my_city = "They live in " . $my_city_size . $my_city_group . " within houses built from trees"; break;
							case 3: $my_city = "They live in " . $my_city_size . $my_city_group . " within wood and stone houses"; break;
							case 4: $my_city = "They live in " . $my_city_size . $my_city_knight . " within wood and stone houses"; break;
							case 5: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses"; break;
							case 6: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses and buildings"; break;
							case 7: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with wood and stone"; break;
							case 8: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with wood, stone, and metal"; break;
							case 9: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . ""; break;
							case 10: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . ""; break;
						}
				}
				else if ($dwell == "deserts")
				{
					if ($stage == "Primitive")
					{
						$city = mt_rand(0,2);
						if ($how_primitive == 1){$city = mt_rand(2,4);}
						else if ($how_primitive == 2){$city = mt_rand(5,7);}
					}
					else if ($stage == "Industrial"){$city = mt_rand(7,9);}
					else if ($stage == "Modern"){$city = 10;}
					else if ($stage == "Advanced"){$city = 11;}
						switch ($city)
						{
							case 0: $my_city = "They live in " . $my_city_size . $my_city_group . " under the sand dunes"; break;
							case 1: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of furs and skins"; break;
							case 2: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of furs and skins"; break;
							case 3: $my_city = "They live in " . $my_city_size . $my_city_group . " within houses built from mud and sticks"; break;
							case 4: $my_city = "They live in " . $my_city_size . $my_city_group . " within mud and stone houses"; break;
							case 5: $my_city = "They live in " . $my_city_size . $my_city_knight . " within plaster and stone houses"; break;
							case 6: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses"; break;
							case 7: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses and buildings"; break;
							case 8: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with wood and stone"; break;
							case 9: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with wood, stone, and metal"; break;
							case 10: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . ""; break;
							case 11: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . ""; break;
						}
				}
				else if ($dwell == "snow & icy regions")
				{
					if ($stage == "Primitive")
					{
						$city = mt_rand(0,3);
						if ($how_primitive == 1){$city = mt_rand(2,5);}
						else if ($how_primitive == 2){$city = mt_rand(5,9);}
					}
					else if ($stage == "Industrial"){$city = mt_rand(9,11);}
					else if ($stage == "Modern"){$city = 12;}
					else if ($stage == "Advanced"){$city = 13;}
						switch ($city)
						{
							case 0: $my_city = "They live in " . $my_city_size . $my_city_group . " within small caves"; break;
							case 1: $my_city = "They live in " . $my_city_size . $my_city_group . " within burrows under the ice and snow"; break;
							case 2: $my_city = "They live in " . $my_city_size . $my_city_group . " within ice stacked homes"; break;
							case 3: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of furs and skins"; break;
							case 4: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents made of furs and skins"; break;
							case 5: $my_city = "They live in " . $my_city_size . $my_city_group . " within houses built from trees"; break;
							case 6: $my_city = "They live in " . $my_city_size . $my_city_group . " within wood and stone houses"; break;
							case 7: $my_city = "They live in " . $my_city_size . $my_city_knight . " within wood and stone houses"; break;
							case 8: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses"; break;
							case 9: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses and buildings"; break;
							case 10: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with wood and stone"; break;
							case 11: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with wood, stone, and metal"; break;
							case 12: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . ""; break;
							case 13: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . ""; break;
						}
				}
				else if ($dwell == "underground areas")
				{
					if ($stage == "Primitive")
					{
						$city = mt_rand(0,1);
						if ($how_primitive == 1){$city = mt_rand(1,3);}
						else if ($how_primitive == 2){$city = mt_rand(2,3);}
					}
					else if ($stage == "Industrial"){$city = mt_rand(3,4);}
					else if ($stage == "Modern"){$city = 5;}
					else if ($stage == "Advanced"){$city = 6;}
						switch ($city)
						{
							case 0: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " caves"; break;
							case 1: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " caverns with tents made of furs and skins"; break;
							case 2: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " caverns with tents made of furs and skins"; break;
							case 3: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " caverns with homes carved into the stone"; break;
							case 4: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " caverns with stone structures"; break;
							case 5: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . " in gigantic caverns below the surface"; break;
							case 6: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . " in gigantic caverns below the surface"; break;
						}
				}
				else if ( ($dwell == "rivers & lakes") || ($dwell == "oceans") )
				{
					if ( ($flies > 0) && ($swims > 0) )
					{
						if ($stage == "Primitive")
						{
							$city = mt_rand(0,3);
							if ($how_primitive == 1){$city = mt_rand(3,6);}
							else if ($how_primitive == 2){$city = mt_rand(5,9);}
						}
						else if ($stage == "Industrial"){$city = mt_rand(9,12);}
						else if ($stage == "Modern"){$city = mt_rand(13,14);}
						else if ($stage == "Advanced"){$city = mt_rand(15,16);}

						switch ($city)
						{
							case 0: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " underwater caves"; break;
							case 1: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " underwater caverns"; break;
							case 2: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents on the shore made of leaves and branches"; break;
							case 3: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents on the shore made of furs and skins"; break;
							case 4: $my_city = "They live in " . $my_city_size . $my_city_group . " within houses built from trees on the shore"; break;
							case 5: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " underwater caverns with homes carved into the stone"; break;
							case 6: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " underwater caverns with stone structures"; break;
							case 7: $my_city = "They live in " . $my_city_size . $my_city_group . " within wood and stone houses on the shore"; break;
							case 8: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses on the shore"; break;
							case 9: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses and buildings on the shore"; break;
							case 10: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with wood and stone on the shore"; break;
							case 11: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " underwater caverns with stone structures"; break;
							case 12: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with wood, stone, and metal on the shore"; break;
							case 13:
								switch (mt_rand(0,2))
								{
									case 0: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . " on the shore"; break;
									case 1: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . " floating on the water"; break;
									case 2: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . " floating in the sky above"; break;
								}
								break;
							case 14: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . " under the water"; break;
							case 15:
								switch (mt_rand(0,2))
								{
									case 0: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . " on the shore"; break;
									case 1: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . " floating on the water"; break;
									case 2: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . " floating in the sky above"; break;
								}
								break;
							case 16: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . " under the water"; break;
						}
					}
					else if ($swims > 0)
					{
						if ($stage == "Primitive")
						{
							$city = mt_rand(0,1);
							if ($how_primitive == 1){$city = mt_rand(0,2);}
							else if ($how_primitive == 2){$city = mt_rand(0,3);}
						}
						else if ($stage == "Industrial"){$city = 3;}
						else if ($stage == "Modern"){$city = 4;}
						else if ($stage == "Advanced"){$city = 5;}
							switch ($city)
							{
								case 0: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " underwater caves"; break;
								case 1: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " underwater caverns"; break;
								case 2: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " underwater caverns with homes carved into the stone"; break;
								case 3: $my_city = "They live in " . $my_city_size . $my_city_group . " within " . $my_city_size . " underwater caverns with stone structures"; break;
								case 4: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . " under the water"; break;
								case 5: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . " under the water"; break;
							}
					}
					else
					{
						if ($stage == "Primitive")
						{
							$city = mt_rand(0,1);
							if ($how_primitive == 1){$city = mt_rand(1,2);}
							else if ($how_primitive == 2){$city = mt_rand(3,5);}
						}
						else if ($stage == "Industrial"){$city = mt_rand(6,7);}
						else if ($stage == "Modern"){$city = 8;}
						else if ($stage == "Advanced"){$city = 9;}
							switch ($city)
							{
								case 0: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents on the shore made of leaves and branches"; break;
								case 1: $my_city = "They live in " . $my_city_size . $my_city_group . " within tents on the shore made of furs and skins"; break;
								case 2: $my_city = "They live in " . $my_city_size . $my_city_group . " within houses built from trees on the shore"; break;
								case 3: $my_city = "They live in " . $my_city_size . $my_city_group . " within wood and stone houses on the shore"; break;
								case 4: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses on the shore"; break;
								case 5: $my_city = "They live in " . $my_city_size . $my_city_knight . " within stone houses and buildings on the shore"; break;
								case 6: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with wood and stone on the shore"; break;
								case 7: $my_city = "They live in " . $my_city_size . $my_city_industry . " built with wood, stone, and metal on the shore"; break;
								case 8:
									switch (mt_rand(0,2))
									{
										case 0: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . " on the shore"; break;
										case 1: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . " floating on the water"; break;
										case 2: $my_city = "They live in modern looking " . $my_city_size . $my_city_industry . " floating in the sky above"; break;
									}
									break;
								case 9:
									switch (mt_rand(0,2))
									{
										case 0: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . " on the shore"; break;
										case 1: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . " floating on the water"; break;
										case 2: $my_city = "They live in technologically advanced " . $my_city_size . $my_city_industry . " floating in the sky above"; break;
									}
									break;
							}
					}
				}
			}



	////////// REPRODUCTION ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$birth = mt_rand(1,100);
		if ($birth < 20){$births = 0;}
		else if ($birth < 40){$births = 1;}
		else if ($birth < 60){$births = 2;}
		else if ($birth < 80){$births = 3;}
		else if ($birth < 96){$births = 4;}
		else if ($birth < 97){$births = 5;}
		else if ($birth < 98){$births = 6;}
		else if ($birth < 99){$births = 7;}
		else if ($birth < 100){$births = 8;}
		else {$births = 9;}
		switch ($births)
		{
			case 0: $my_live_on = "They reproduce by laying up to " . mt_rand(2,10) . " " . candleColor(0) . " eggs that have a " . mt_rand(1,12) . " month incubation period before they hatch."; break;
			case 1: $my_live_on = "They reproduce by laying a single " . candleColor(0) . " egg that has a " . mt_rand(1,12) . " month incubation period before it hatches."; break;
			case 2: $my_live_on = "They reproduce by giving birth to a single baby " . strtolower($callme) . ", which the female would have carried up to " . mt_rand(2,12) . " months before giving birth."; break;
			case 3: $my_live_on = "They reproduce by giving birth to about " . mt_rand(2,10) . " " . strtolower($callme) . " babies, which the female would have carried up to " . mt_rand(2,12) . " months before giving birth."; break;
			case 4: $my_live_on = "They reproduce by making some form of physical contact with another biological species, where the victim would slowly become a " . strtolower($callme) . " after about " . (mt_rand(1,12)*10) . " days."; break;
			case 5: $my_live_on = "They reproduce by making some form of physical contact with another biological species, which puts an egg into the new host. After about " . (mt_rand(1,12)*10) . " days of incubation, the egg will hatch and burst through the body of the host where a new " . strtolower($callme) . " is born."; break;
			case 6: $my_live_on = "They reproduce by making some form of physical contact with another biological species, which puts an egg into the new host. After about " . (mt_rand(1,12)*10) . " days of incubation, the egg will hatch and the baby " . strtolower($callme) . " will eat the host from the inside out."; break;
			case 7: $my_live_on = "They reproduce by making some form of physical contact with another biological species, which puts eggs into the new host. After about " . (mt_rand(1,12)*10) . " days of incubation, the eggs will hatch and burst through the body of the host where the new " . strtolower($callme) . " babies are born."; break;
			case 8: $my_live_on = "They reproduce by making some form of physical contact with another biological species, which puts eggs into the new host. After about " . (mt_rand(1,12)*10) . " days of incubation, the eggs will hatch and the " . strtolower($callme) . " babies will eat the host from the inside out."; break;
			case 9: $my_live_on = "They reproduce when there is swelling begins on various parts of themselves that will pop off after about " . (mt_rand(1,12)*10) . " days, giving birth up to " . mt_rand(2,10) . " " . strtolower($callme) . " babies."; break;
		}



	////////// SPECIAL ABILITIES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if (mt_rand(1,3) == 1){$my_special = "The " . strtolower($callme) . " " . specialAbility($level,$game,$eyes,$swims);} else {$my_special = "";}



	////////// FINAL TOUCHES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ( ($stage != "Instinctual") && ($stage != "Animal") ){$model_after = "humanoid ";} else {$model_after = "";}
		$my_style = "The " . strtolower($callme) . " is some type of " . $model_after . $species . " " . $my_size . ".";



		$run_the_beast = 0;
		if ($livein == ""){$run_the_beast = 1;}
		else if ($livein == $dwell){$run_the_beast = 1;}

		if ($run_the_beast > 0)
		{
		$n = $n + 1; // NAME USE INT INCREASE

		?>
		<tr>
			<td>
				<hr>
			</td>
		</tr>
		<tr>
			<td>
			<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%">
				<tr>
					<td width="320" colspan="2"><b><font size="3"><?php echo ucfirst($callme); ?></font></b></td>
					<td width="380">&nbsp;</td>
				</tr>
				<tr>
					<td width="20">&nbsp;</td>
					<td width="300" valign="top">
					<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%">
						<tr>
							<td width="79"><font size="2">Stamina:</font></td>
							<td><font size="2"><?php echo $stamina; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Protection:</font></td>
							<td><font size="2"><?php echo $protection; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Hit:</font></td>
							<td><font size="2"><?php echo $hit; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Attacks:</font></td>
							<td><font size="2"><?php echo $my_attack; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Damage:</font></td>
							<td><font size="2"><?php echo $my_damage; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Speed:</font></td>
							<td><font size="2"><?php
								if ($legs > 0){echo $movement . "'&nbsp;&nbsp;";}
								if ($swims > 0){echo "Swim: " . $move_swim . "'&nbsp;&nbsp;";}
								if ($flies > 0){echo "Fly: " . $move_fly . "'";}
							?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Stage:</font></td>
							<td><font size="2"><?php echo $stage; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Size:</font></td>
							<td><font size="2"><?php echo $my_big; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Defenses:</font></td>
							<td><font size="2"><?php echo $defenses; ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Habitat:</font></td>
							<td><font size="2"><?php echo ucwords($dwell); ?></font></td>
						</tr>
						<tr>
							<td width="79"><font size="2">Level:</font></td>
							<td><font size="2"><?php echo $level; ?></font></td>
						</tr>
					</table>
					</td>
					<td width="380" valign="top"><font size="2"><?php echo $my_style . " " . $my_similar . " " . $my_skin . " " . $my_eyes . " " . $my_legs . " " . $my_arms . " " . $my_daily . " " . $my_diet . " " . $my_live_on . " " . $my_special . " " . $my_city . $my_garb . " " . $my_weapon; ?></font></td>
				</tr>
			</table>
			</td>
		</tr>
	<?php

		$amount = $amount - 1;

		}

		endwhile;

	?>
	</table>
	<?php }

	echo "</td></tr></table></div>";

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else ////////////////////////////////////////// MUTANT FUTURE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	$bottom_notices = 3;

	/////////////////////////////////////////////////////////// ALIENS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$amount = $_POST['a_amount'];

	if ($amount > 0){
	?>

	<img border="0" src="pics_tools/tools_scifim_a.jpg">
	<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
	<?php }

	while ($amount > 0) :

	////////// GET THE TOP HALF //
		$qry = "SELECT * FROM mutants ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
		$res = wz_query( $connection, $qry ); /*qry*/
		$ary = wz_fetch_array($res);

	////////// ACTIVE CYCLE //
		if (mt_rand(1,100) > 50){ $sleep = "any"; }
		else { $sleep = array('any', 'day', 'night'); $sleep = $sleep[mt_rand(0,2)]; }

	////////// WHERE LIVE //
		$dwell = array('desert', 'forest', 'swampy', 'jungle', 'ruins', 'underground', 'radioactive', 'cold or snowy', 'grassland', 'mountainous', 'hilly', 'freshwater', 'sea');
		$dwell = $dwell[mt_rand(0,12)];

	////////// GET THE BOTTOM HALF //
		$sea_creature = 0;
		if (($dwell == "freshwater") || ($dwell == "sea"))
		{
			$sea_creature = 1;
			$qry4 = "SELECT * FROM mutants WHERE fins=1 AND id!=$ary[0] ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
		}
		else
		{
			$qry4 = "SELECT * FROM mutants WHERE legs=1 AND id!=$ary[0] ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
		}
		$res4 = wz_query( $connection, $qry4 ); /*qry4*/
		$ary4 = wz_fetch_array($res4);

	////////// SEE IF THEY HAVE WINGS //
		$flies = mt_rand(1,100);
		if (($flies > 25) && ($sea_creature != 1) && (($ary[6] == 1) || ($ary4[6] == 1))){$wings = 1;} else {$wings = 0;}
		if ($wings == 1){ if ($ary4[6] == 1){$flylike = $ary4[1];} else {$flylike = $ary[1];} }

	////////// GET THE LEGS //
		$walks = mt_rand(1,100);
		if (($walks > 25) && ($ary4[7] == 1)){ $legs = 0; $snake = 1; }
		else if (($walks > 25) && ($ary4[5] == 1)){ $legs = 0; $fish = 1; }
		else { $legs = array('2', '4', '6', '8'); $legs = $legs[mt_rand(0,3)]; $snake = 0; $fish = 0; }
			if ($legs == 2){$movement = mt_rand(4,10);}
			else if ($legs == 4){$movement = mt_rand(6,12);}
			else if ($legs == 6){$movement = mt_rand(8,14);}
			else if ($legs == 8){$movement = mt_rand(10,16);}
			else {$movement = mt_rand(1,10);}

	////////// SKIN //
		$xskin = array('scales', 'fur', 'feathers', 'skin'); $xskin = $xskin[mt_rand(0,3)];

	////////// COLOR //
		$xcolors = array('blue-green', 'black', 'blue', 'gray', 'green', 'violet', 'red', 'brown', 'orange', 'yellowish-green', 'tan', 'gold', 'yellow', 'purple', 'silver', 'forest-green', 'white');
		$xcolor = $xcolors[mt_rand(0,16)];

	////////// ANY COLOR VARIATION //
		$xcolors2 = array('bright', '', 'dark', 'light', 'dull', 'vibrant', 'thick', 'dirty', 'deep', 'rich', 'shiny');
		$xcolor2 = $xcolors2[mt_rand(0,10)];

	////////// INTELLIGENCE //
		$xiq = array('animal', 'low', 'average', 'high', 'genius');
		$xiq = $xiq[mt_rand(0,4)];
			if ($xiq == "animal"){$smarty = "exhibit animal behavior"; $willpower = mt_rand(3,8);}
			else if ($xiq == "low"){$smarty = "are not very intelligent"; $willpower = mt_rand(3,13);}
			else if ($xiq == "average"){$smarty = "have average intelligence"; $willpower = mt_rand(3,18);}
			else if ($xiq == "high"){$smarty = "are quite intelligent"; $willpower = mt_rand(7,19);}
			else if ($xiq == "genius"){$smarty = "are extremely intelligent"; $willpower = mt_rand(11,21);}

	////////// EYES //
		$xeyes = mt_rand(1,8); $xecolor = $xcolors[mt_rand(0,16)];

	////////// HEADS //
		if (mt_rand(1,100) > 95){$heads = 2;}

	////////// HEIGHT //
		$xheight = array('3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
		$xheight = $xheight[mt_rand(0,9)];

	////////// ENCOUNTER //
		$xenc = array('1', '1d2', '1d4', '1d6', '1d8', '1d10', '2d4', '2d6', '2d8', '2d10');
		$xenc = $xenc[mt_rand(0,9)];

	////////// LAIR //
		if (mt_rand(1,100) > 30){ $lair = $xenc; }
		else
		{
			if ($xenc == "1"){$lairv = 0;}
			else if ($xenc == "1d2"){$lairv = 1;}
			else if ($xenc == "1d4"){$lairv = 2;}
			else if ($xenc == "1d6"){$lairv = 3;}
			else if ($xenc == "1d8"){$lairv = 4;}
			else if ($xenc == "1d10"){$lairv = 5;}
			else if ($xenc == "2d4"){$lairv = 6;}
			else if ($xenc == "2d6"){$lairv = 7;}
			else if ($xenc == "2d8"){$lairv = 8;}
			else {$lairv = 9;}

			$lair = array('1d2', '1d4', '1d6', '1d8', '1d10', '2d4', '2d6', '2d8', '2d10', '3d6', '3d4');
			$lair = $lair[mt_rand($lairv,10)];
		}

	////////// ALIGNMENT //
		if ($xiq == "animal"){ $alignment = "Neutral"; }
		else { $alignment = array('Lawful', 'Neutral', 'Chaotic'); $alignment = $alignment[mt_rand(0,2)]; }

	////////// ARMOR CLASS //
		$xarmor = 10 - mt_rand(1,16);

	////////// HIT DICE //
		$hitdice = mt_rand(1,20);

	////////// HIT DICE MOD //
		$hmod = mt_rand(1,100);
		if ($hmod > 25){ $hd_mod = 0; }
		else
		{
			$xhdmod = array('+1', '+2', '+3', '+4', '+5', '+6', '+7', '+8', '+9', '+10', '-1', '-2', '-3', '-4', '-5', '-6');
			$hd_mod = $xhdmod[mt_rand(0,15)];
			if (($hd_mod + 0) > 0){$hitdice = $hitdice + 1;}
		}

	////////// THACO //
		if ($hitdice < 8){$thaco = 20 - $hitdice;}	else if ($hitdice < 10){$thaco = 12;}	else if ($hitdice < 12){$thaco = 11;}
		else if ($hitdice < 14){$thaco = 10;}		else if ($hitdice < 16){$thaco = 9;}	else if ($hitdice < 18){$thaco = 8;}
		else if ($hitdice < 20){$thaco = 7;}		else if ($hitdice < 22){$thaco = 6;}	else {$thaco = 5;}

	////////// MORALE //
		$xbrave = mt_rand(3,11);

	////////// LOOT //
		if ($xiq == "animal"){ $loot = "None"; }
		else if (($xiq == "low") && (mt_rand(1,100) > 50)){ $loot = "None"; }
		else if ($xiq == "low"){	$cash = array('I', 'II', 'III', 'IV', 'V');	$loot = $cash[mt_rand(0,4)]; }
		else if ($xiq == "average"){$cash = array('I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII');	$loot = $cash[mt_rand(0,7)]; }
		else if ($xiq == "high"){	$cash = array('VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII', 'XIII', 'XIV', 'XV', 'XVI');	$loot = $cash[mt_rand(0,10)]; }
		else if ($xiq == "genius"){	$cash = array('VIII', 'IX', 'X', 'XI', 'XII', 'XIII', 'XIV', 'XV', 'XVI', 'XVII', 'XVIII', 'XIX', 'XX', 'XXI', 'XXII');	$loot = $cash[mt_rand(0,14)]; }

	////////// MOVEMENT //
		if ($movement == 1){$moving = 30;}		else if ($movement == 2){$moving = 40;}		else if ($movement == 3){$moving = 50;}
		else if ($movement == 4){$moving = 60;}		else if ($movement == 5){$moving = 70;}		else if ($movement == 6){$moving = 80;}
		else if ($movement == 7){$moving = 90;}		else if ($movement == 8){$moving = 100;}	else if ($movement == 9){$moving = 110;}
		else if ($movement == 10){$moving = 120;}	else if ($movement == 11){$moving = 130;}	else if ($movement == 12){$moving = 140;}
		else if ($movement == 13){$moving = 150;}	else if ($movement == 14){$moving = 160;}	else if ($movement == 15){$moving = 170;}
		else if ($movement == 16){$moving = 180;}

		if ($wings == 1){$flying = $moving * 2;} else {$flying = 0;}

		if (($sea_creature == 1) && (75 > mt_rand(1,100))){$swimming = $moving * 2;}
		else if ($sea_creature == 1){$swimming = $moving;}
		else {$swimming = 0;}

	////////// ARMS //
		if (mt_rand(1,100) > 25){ $arms = 2; } else { $arms = 2 * mt_rand(1,3); }

	////////// ATTACKS //
		$fight=0; $fight1=0; $fight2=0; $fight3=0; $fight4=0; $fight5=0; $fight6=0; $fight7=0; $fight8=0; $fight9=0;
		$hitters = ""; $hurts = "";
		$xdamage = array('1d4', '1d4', '1d4', '1d4', '1d4', '1d4', '1d4', '1d6', '1d6', '1d6', '1d6', '1d6', '1d6', '1d8', '1d8', '1d8', '1d8', '2d4', '2d4', '1d10', '1d10', '1d12', '1d12', '2d6', '2d8');

		/// HAND ATTACKS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (($ary[2] == "talons") || ($ary[2] == "claw") || ($ary[2] == "fist") || ($ary[2] == "pincer") || ($ary[2] == "pincers"))
		{
			if ((mt_rand(1,100) > 25) && ($arms == 2)){ $fight1 = $arms - 1; }
			else { $fight1 = $arms; }
			if ($fight1 > 1){$hitters = $fight1 . " " . $ary[2] . ", " . $hitters;} else {$hitters = $ary[2] . ", " . $hitters;}
				$fightc = $fight1;
				while ($fightc > 0) :
					$hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
					$fightc = $fightc - 1;
				endwhile;
		}
		if (($ary[3] == "talons") || ($ary[3] == "claw") || ($ary[3] == "fist") || ($ary[3] == "pincer") || ($ary[3] == "pincers"))
		{
			if ((mt_rand(1,100) > 25) && ($arms == 2)){ $fight2 = $arms - 1; }
			else { $fight2 = $arms; }
			if ($fight2 > 1){$hitters = $fight2 . " " . $ary[3] . ", " . $hitters;} else {$hitters = $ary[3] . ", " . $hitters;}
				$fightc = $fight2;
				while ($fightc > 0) :
					$hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
					$fightc = $fightc - 1;
				endwhile;
		}

		/// HEAD ATTACKS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (($ary[2] == "antlers") || ($ary[2] == "horn") || ($ary[2] == "horns") || ($ary[2] == "peck") || ($ary[2] == "bite") || ($ary[2] == "tusks") || ($ary[2] == "tongue"))
		{
			if ((mt_rand(1,100) > 25) && ($heads > 1)){ $fight3 = 2; }
			else { $fight3 = 1; }
			if ($fight3 > 1){$hitters = $fight3 . " " . $ary[2] . ", " . $hitters;} else {$hitters = $ary[2] . ", " . $hitters;}
				$fightc = $fight3;
				while ($fightc > 0) :
					$hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
					$fightc = $fightc - 1;
				endwhile;
		}
		if (($ary[3] == "antlers") || ($ary[3] == "horn") || ($ary[3] == "horns") || ($ary[3] == "peck") || ($ary[3] == "bite") || ($ary[3] == "tusks") || ($ary[3] == "tongue"))
		{
			if ((mt_rand(1,100) > 25) && ($heads > 1)){ $fight4 = 2; }
			else { $fight4 = 1; }
			if ($fight4 > 1){$hitters = $fight4 . " " . $ary[3] . ", " . $hitters;} else {$hitters = $ary[3] . ", " . $hitters;}
				$fightc = $fight4;
				while ($fightc > 0) :
					$hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
					$fightc = $fightc - 1;
				endwhile;
		}

		/// BOTTOM ATTACKS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (($ary4[2] == "spray") || ($ary4[2] == "stinger") || ($ary4[2] == "ink"))
		{
			$fight5 = 1; $hitters = $ary4[2] . ", " . $hitters; $hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
		}
		if (($ary4[3] == "spray") || ($ary4[3] == "stinger") || ($ary4[3] == "ink"))
		{
			$fight6 = 1; $hitters = $ary4[3] . ", " . $hitters; $hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
		}

		/// OTHER ATTACKS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (($ary4[2] == "quills") || ($ary4[3] == "quills") || ($ary[2] == "quills") || ($ary[3] == "quills"))
		{
			$fight7 = 1; $hitters = "quills, " . $hitters; $hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
		}
		if (($ary[2] == "sonic") || ($ary[3] == "sonic"))
		{
			$fight8 = 1; $hitters = "sonic, " . $hitters; $hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
		}
		if (($ary4[2] == "tail") || ($ary4[3] == "tail"))
		{
			$fight9 = 1; $hitters = "tail, " . $hitters; $hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
		}

		$fight = $fight1 + $fight2 + $fight3 + $fight4 + $fight5 + $fight6 + $fight7 + $fight8 + $fight9;
		if ($fight < 1){$fight = 1;}

		if ($hurts != "")
		{
			$hurts = substr($hurts, 0, -1);
		}
		else { $hurts = $xdamage[mt_rand(0,24)]; }

		if ($hitters != ""){ $hitters = substr($hitters, 0, -2); $hitters = "(" . $hitters . ")"; }

	////////// NAME THE CREATURE //
		$callme = "";
		$vowel1 = 0;
		$vowel2 = 0;

		if (mt_rand(1,100) > 50){$myname = $ary[1];} else {$myname = $ary4[1];}

		$name_long = strlen($myname);
		$name_short = ceil($name_long / 3);
		$name_total = mt_rand($name_short,$name_long);
		$myname = substr($myname, 0, $name_total);
		$myname_end = substr($myname, -1);

		$suf_use = strtolower(mutantName());
		$suf_start = substr($suf_use, -1);

		if (($myname_end == "a") || ($myname_end == "e") || ($myname_end == "i") || ($myname_end == "o") || ($myname_end == "u")){$vowel1 = 1;}
		if (($suf_start == "a") || ($suf_start == "e") || ($suf_start == "i") || ($suf_start == "o") || ($suf_start == "u")){$vowel2 = 1;}

		if (($vowel1 == 1) && ($vowel2 == 1))
		{
			$vowel_pick = mt_rand(1,100);
			if ($vowel_pick > 50)
			{
				$myname = substr($myname, 0, -1);
				$callme = $myname . "" . $suf_use;	
			}
			else
			{
				$suf_use = substr($suf_use, 1);
				$callme = $myname . "" . $suf_use;	
			}

		}
		else if (($vowel1 == 0) && ($vowel2 == 0))
		{
			$vowel_pick = mt_rand(1,5);
			if ($vowel_pick == 1){$vowel_use = "a";}
			else if ($vowel_pick == 1){$vowel_use = "e";}
			else if ($vowel_pick == 1){$vowel_use = "i";}
			else if ($vowel_pick == 1){$vowel_use = "o";}
			else {$vowel_use = "u";}
			$callme = $myname . "" . $vowel_use . "" . $suf_use;
		}
		else
		{
			$callme = $myname . "" . $suf_use;
		}

	////////// NOT EVERY CREATURE HAS ARMS //
		$weapon_use = "";
		$weapon_has = 0;

		if (($fight1 + $fight2) > 0){} else
		{
			if ($xiq == "animal"){$arms = 0; if ($legs < 3){$legs = $legs + $arms;}}
			else if (($xiq == "low") && (mt_rand(1,100) > 25)){$arms = 0; if ($legs < 3){$legs = $legs + $arms;}}
			else if (($xiq == "average") && (mt_rand(1,100) > 50)){$arms = 0; if ($legs < 3){$legs = $legs + $arms;}}
		}
		if (($arms > 0) && ($xiq == "low") && (mt_rand(1,100) > 70))
		{
			$weapon_has = 1; $weapon_use = "They sometimes use weapons such as crude spears and clubs. ";
		}
		else if (($arms > 0) && ($xiq == "average") && (mt_rand(1,100) > 50))
		{
			$weapon_has = 1; $weapon_use = "They sometimes use weapons such as swords and bows. ";
		}
		else if (($arms > 0) && ($xiq == "high") && (mt_rand(1,100) > 30))
		{
			$weapon_has = 1; $weapon_use = "They sometimes use weapons such as swords, bows and primitive firearms. ";
		}
		else if (($arms > 0) && ($xiq == "genius") && (mt_rand(1,100) > 10))
		{
			$weapon_has = 1; $weapon_use = "They sometimes use advanced weaponry and other technology. ";
		}

	$mixer = mt_rand(1,13);

	if ($mixer == 1){$mix = "a mixture of";}
	else if ($mixer == 2){$mix = "a mutation of";}
	else if ($mixer == 3){$mix = "a hybrid of";}
	else if ($mixer == 4){$mix = "a combination of";}
	else if ($mixer == 5){$mix = "a cross between";}
	else if ($mixer == 6){$mix = "a blend of";}
	else if ($mixer == 7){$mix = "a fusion of";}
	else if ($mixer == 8){$mix = "a merger of";}
	else if ($mixer == 9){$mix = "a union of";}
	else if ($mixer == 10){$mix = "an abomination of";}
	else if ($mixer == 11){$mix = "a mongrel of";}
	else if ($mixer == 12){$mix = "a monster in the form of";}
	else {$mix = "a beast in the form of";}

	$adja = mt_rand(1,14);
	if ($adja == 1){$adj1 = "short ";}
	else if ($adja == 2){$adj1 = "long ";}
	else if ($adja == 3){$adj1 = "muscular ";}
	else if ($adja == 4){$adj1 = "thin ";}
	else if ($adja == 5){$adj1 = "large ";}
	else if ($adja == 6){$adj1 = "small ";}
	else {$adj1 = "";}

	$adjb = mt_rand(1,14);
	if ($adjb == 1){$adj2 = "short ";}
	else if ($adjb == 2){$adj2 = "long ";}
	else if ($adjb == 3){$adj2 = "muscular ";}
	else if ($adjb == 4){$adj2 = "thin ";}
	else if ($adjb == 5){$adj2 = "large ";}
	else if ($adjb == 6){$adj2 = "small ";}
	else {$adj2 = "";}

	$adjc = mt_rand(1,16);
	if ($adjc == 1){$adj3 = "small ";}
	else if ($adjc == 2){$adj3 = "large ";}
	else if ($adjc == 3){$adj3 = "bulbous ";}
	else if ($adjc == 4){$adj3 = "small ";}
	else if ($adjc == 5){$adj3 = "large ";}
	else if ($adjc == 6){$adj3 = "small ";}
	else if ($adjc == 7){$adj3 = "large ";}
	else {$adjc = "";}

	$lands = $dwell; 
	if ($dwell != "ruins"){ $lands = $lands . " areas"; }
	if ($dwell == "ruins"){ $lands = "ruins"; }
	else if ($dwell == "sea"){ $lands = "oceans & seas"; }
	else if ($dwell == "freshwater"){ $lands = "lakes & rivers"; }
	else if ((($lands == "oceans & seas") || ($lands == "lakes & rivers")) && ($sea_creature != 1)){ $lands = "forest areas"; }
	?>

	<p style="margin-top: 0; margin-bottom: 0"><b><font size="4"><?php echo ucfirst($callme); ?></font></b></p>
	<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="45%">
		<tr>
			<td width="103">Appearing:</td>
			<td><?php echo $xenc; ?> (<?php echo $lair; ?>)</td>
		</tr>
		<tr>
			<td width="103">Alignment:</td>
			<td><?php echo $alignment; ?></td>
		</tr>
		<tr>
			<td width="103">Movement:</td>
			<td><?php if (($swimming > 0) && ($legs == 0) && ($snake != 1)){echo "Swim: "; echo $swimming; ?>' (<?php echo ($swimming/2); ?>')<?php } else { echo $moving; ?>' (<?php echo ($moving/2); ?>')<?php } ?></td>
		</tr>

	<?php if (($swimming > 0) && ($legs > 0)){ ?>
		<tr>
			<td width="103" align="right"><i>Swim:&nbsp;</i></td>
			<td><i><?php echo $swimming; ?>' (<?php echo ($swimming/2); ?>')</i></td>
		</tr>
	<?php } if ($flying > 0){ ?>
		<tr>
			<td width="103" align="right"><i>Flying:&nbsp;</i></td>
			<td><i><?php echo $flying; ?>' (<?php echo ($flying/2); ?>')</i></td>
		</tr>
	<?php } ?>

		<tr>
			<td width="103">Armor Class:</td>
			<td><?php echo $xarmor; ?></td>
		</tr>
		<tr>
			<td width="103">Hit Dice:</td>
			<td><?php echo $hitdice; if ($hd_mod != 0){ ?> <?php echo $hd_mod; } ?></td>
		</tr>
		<tr>
			<td width="103">Attacks:</td>
			<td><?php echo $fight; echo " "; if ($hitters != ""){echo $hitters;} if ($weapon_has == 1){ echo " or weapon"; } ?></td>
		</tr>
		<tr>
			<td width="103">Damage:</td>
			<td><?php echo $hurts; if ($weapon_has == 1){ echo " or by weapon"; } ?></td>
		</tr>
		<tr>
			<td width="103">THAC0:</td>
			<td><?php echo $thaco; ?></td>
		</tr>
		<tr>
			<td width="103">Save:</td>
			<td>L<?php echo mt_rand(1,20); ?></td>
		</tr>
		<tr>
			<td width="103">Morale:</td>
			<td><?php echo $xbrave ?></td>
		</tr>
		<tr>
			<td width="103">Intellect:</td>
			<td><?php echo ucfirst($xiq); ?></td>
		</tr>
		<tr>
			<td width="103">Willpower:</td>
			<td><?php echo $willpower; ?></td>
		</tr>
		<tr>
			<td width="103">Habitat:</td>
			<td><?php echo ucwords($lands); ?></td>
		</tr>
		<tr>
			<td width="103">Hoard Class:</td>
			<td><?php echo $loot; ?></td>
		</tr>
	</table>
	<p>

	The <?php echo ucfirst($callme); ?> seem to be <?php echo $mix; ?> a <?php echo $ary[1]; ?> and a <?php echo $ary4[1]; ?>. Their upper body is mostly <?php echo $ary[1]; if ($heads > 1){?>, with two heads,<?php } ?> and the lower part is mostly <?php echo $ary4[1]; ?>. 

	They <?php if ($snake == 1){?>slither around<?php } else if ($fish == 1){ ?>have fins for swimming<?php } else { ?>have <?php echo $legs; ?> <?php echo $adj1; ?>legs<?php } if ($arms > 0){?> and also have <?php echo $arms; ?> <?php echo $adj2; ?>arms<?php } ?>. 

	<?php if ($wings == 1){?>They also have wings, like a <?php echo $flylike; ?>, that allow them to fly around. <?php } ?>

	They are usually about <?php echo $xheight ?> feet <?php if ($legs == 0){echo "long";} else {echo "tall";} ?> and <?php echo $smarty; ?>. 

	Their bodies are covered in <?php if (($xcolor != "white") && ($xcolor != "black")){echo $xcolor2;} ?> <?php echo $xcolor; ?> colored <?php echo $xskin; ?>. 

	They have <?php echo $xeyes; ?> <?php echo $adj3; ?><?php if ($xeyes > 1){echo "eyes that are";} else {echo "eye that is";} ?> <?php echo $xecolor; ?> in color. 

	They inhabit the <?php echo $lands; ?> of the world<?php if ($sleep != "any"){ echo " and only come out during the " . $sleep; } ?>. <?php echo $weapon_use; ?>

	</p>
	<?php

	$amount = $amount - 1;

	echo "<hr>";

	endwhile;

	/////////////////////////////////////////////////////////// ROBOTS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$amount = $_POST['r_amount'];

	if ($amount > 0){
	?>

	<img border="0" src="pics_tools/tools_scifim_r.jpg">
	<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
	<?php }

	while ($amount > 0) :

	////////// GET THE FUEL //
		$x_fuel = array('steam', 'clockworks', 'alien technology', 'petroleum', 'electricity', 'radiation', 'plutonium', 'uranium', 'nuclear');
		$x_fuel = $x_fuel[mt_rand(0,8)];
			if (($x_fuel == "steam") || ($x_fuel == "clockworks")){ $weapon_tech = 1; }
			else if (($x_fuel == "alien technology")){ $weapon_tech = 4; }
			else if (($x_fuel == "petroleum")){ $weapon_tech = 2; }
			else if ($x_fuel == "electricity"){$weapon_tech = mt_rand(2,3);}
			else
			{
				$weapon_tech = 3;
				$x_battery = array('batteries', 'cells', 'clips', 'liquid', 'generators');
				$x_fuel = $x_fuel . " " . $x_battery[mt_rand(0,4)];
			}

	////////// GET THE METAL & ARMOR //
		$x_metal = array('iron', 'aluminium', 'steel', 'silicon steel', 'durasteel', 'crystal alloy', 'adamant', 'promethium', 'unobtainium', 'an uknown metal');
			if (($x_fuel == "steam") || ($x_fuel == "clockworks")){ $i_metal = mt_rand(0,2); }
			else if (($x_fuel == "alien technology")){ $i_metal = mt_rand(5,9); }
			else { $i_metal = mt_rand(0,9); }
				$x_metal = $x_metal[$i_metal];
				$x_armor = 7 - $i_metal;

	////////// GET THE LEGS //
		$x_legs = array('hover', 'legs', 'legs', 'legs', 'legs', 'legs', 'propeller', 'water propulsion', 'rotor', 'stationary', 'tracks', 'treads', 'wheels', 'rockets', 'anti-gravity');
		$x_legs = $x_legs[mt_rand(0,14)];

	////////// GET THE EXTRAS ... IF ANY //

		$have_weapons = 0; // START WITH
		$robocop = "";     // NO
		$weapon_bonus = 0; // WEAPONS
		$assec1 = ""; $assec1a = "";
		$someadd = 0;

		$x_more = array('Recorder', 'Fire Extinguisher', 'Storage Unit', 'Arming Mechanism', 'Mounted Tool', 'Voice', 'Mounted Weapon', 'Magnetic Force Field', 'Self-Destruct System', 'Holographic Screen', 'Gravity Field', 'Self-Repair Tools', 'Camouflage', 'Repair Unit', 'Transmitter', 'Remote Control');

		if (mt_rand(1,100) > 40)
		{
			$extra1 = $x_more[mt_rand(0,15)];
			if (($extra1 == "Arming Mechanism") || ($extra1 == "Mounted Weapon")){$have_weapons = $have_weapons + 1;}
			$assec1 = $extra1 . "; ";
			$someadd = 1;
		}
		$assec2 = ""; $assec2a = "";
		if ((mt_rand(1,100) > 60) && ($assec1 != ""))
		{
			$extra2 = $x_more[mt_rand(0,15)];
			if ($extra1 != $extra2)
			{
				if (($extra2 == "Arming Mechanism") || ($extra2 == "Mounted Weapon")){$have_weapons = $have_weapons + 1;}
				$assec2 = $extra2 . "; ";
				$someadd = 2;
			}
		}
		$assec3 = ""; $assec3a = "";
		if ((mt_rand(1,100) > 80) && ($assec2 != ""))
		{
			$extra3 = $x_more[mt_rand(0,15)];
			if (($extra1 != $extra3) && ($extra2 != $extra3))
			{
				if (($extra3 == "Arming Mechanism") || ($extra3 == "Mounted Weapon")){$have_weapons = $have_weapons + 1;}
				$assec3 = $extra3 . "; ";
				$someadd = 3;
			}
		}
		if ($someadd > 0){$x_extras = $assec1 . "" . $assec2 . "" . $assec3; $x_extras = substr($x_extras, 0, -2);} else {$x_extras = "None";}

	////////// GET THE SENSORS //
		$x_eyes = array('an audio receiver and video camera', 'an audio receiver and video camera', 'an audio receiver and video camera', 'an audio receiver and video camera', 'an audio receiver and video camera', 'an audio receiver and video camera', 'an audio receiver and video camera', 'an audio receiver and video camera', 'an audio receiver and video camera', 'an audio receiver and video camera', 'an audio receiver, chemical sensor, and thermal video camera', 'an audio receiver, chemical sensor, and thermal video camera', 'an audio receiver, chemical sensor, and thermal video camera', 'an audio receiver, chemical sensor, and thermal video camera', 'an audio receiver, chemical sensor, and thermal video camera', 'an audio receiver, chemical sensor, and thermal video camera', 'an audio receiver, chemical sensor, and thermal video camera', 'an audio receiver, chemical sensor, and thermal video camera', 'audio sensors, chemical sensor, impact sensor, and an advanced video camera', 'audio sensors, chemical sensor, impact sensor, and an advanced video camera', 'audio sensors, chemical sensor, impact sensor, and an advanced video camera', 'audio sensors, chemical sensor, impact sensor, and an advanced video camera', 'audio sensors, chemical sensor, impact sensor, and an advanced video camera', 'audio sensors, chemical sensor, impact sensor, and an advanced video camera', 'audio sensors, chemical sensor, impact sensor, an advanced video camera with 60 feet night vision, and sonar/radar', 'audio sensors, chemical sensor, impact sensor, an advanced video camera with 60 feet night vision, and sonar/radar', 'audio sensors, chemical sensor, impact sensor, an advanced video camera with 60 feet night vision, and sonar/radar', 'audio sensors, chemical sensor, impact sensor, an advanced video camera with 60 feet night vision, and sonar/radar', 'audio sensors, chemical sensor, impact sensor, an advanced video camera with 60 feet night/thermal vision, and sonar/radar', 'audio sensors, chemical sensor, impact sensor, an advanced video camera with 60 feet night/thermal vision, and sonar/radar', 'audio sensors, chemical sensor, impact sensor, an advanced video camera with 120 feet night vision, and sonar/radar', 'audio sensors, chemical sensor, impact sensor, an advanced video camera with 180 feet night/thermal vision, and sonar/radar');
		$x_eyes = $x_eyes[mt_rand(0,31)];

	////////// GET THE THINKING //
		$x_iq = array('programmed', 'programmed', 'programmed', 'artificial intelligence');
		$x_iq = $x_iq[mt_rand(0,3)];

	////////// GET THE PROGRAMMING //
		if ($x_iq == "programmed")
		{
			$x_job = array('combat', 'combat', 'combat', 'combat', 'combat', 'retrieval', 'spying', 'guarding', 'escorting', 'exploration');
			$x_job = $x_job[mt_rand(0,9)];
			if ($x_legs == "stationary"){$x_job = "guarding";}
			$software = 1;
		}
		else
		{
			$software = 0;
		}

	////////// GET THE FRAME //
		if (mt_rand(1,100) > 35){$framez = 0;}
		else if (($x_legs == "rotor") || ($x_legs == "rockets")){$framez = mt_rand(63,68);}
		else if ($x_legs == "propeller"){$framez = mt_rand(69,75);}
		else if ($x_legs == "legs"){$framez = mt_rand(51,63);}
		else {$framez = 0;}

		$shape = " It is a standard robot build and is about " . mt_rand(3,12) . " feet in size. ";

		$x_hands = array('claws', 'jaws', 'pincers', 'probes', 'grips', 'hands');
		$x_hands = $x_hands[mt_rand(0,5)];

		$attacks = mt_rand(1,2);

		$hitters = $attacks . "(" . $x_hands . ")";

		$x_hurt = array('1d4', '1d4', '1d4', '1d4', '1d4', '1d6', '1d6', '1d6', '1d6', '1d8', '1d8', '1d8', '1d10', '1d10', '1d12');
		$x_hurto = $x_hurt[mt_rand(0,14)];

		if ($attacks > 1){$hitting = $x_hurto . "/" . $x_hurto;}
		else {$hitting = $x_hurto;}

		if (mt_rand(1,100) > 75)
		{
			$handy = explode("_", "claws_jaws_pincers_probes_grips_hands");
			$xfer = 6;
			$r = 0;

			while ($xfer > 0) :
				if ($handy[$r] != $x_hands){$xfers = $xfers . "_" . $handy[$r];}
				$r = $r + 1;
				$xfer = $xfer - 1;
			endwhile;

			$handy = explode("_", $xfers);
			$x_hands2 = $handy[mt_rand(1,5)];

			$attacks2 = mt_rand(1,2);
			$hitters = $hitters . "/" . $attacks2 . "(" . $x_hands2 . ")";

			$x_hurt2 = $x_hurt[mt_rand(0,14)];

			if ($attacks2 > 1){$hitting = $hitting . "/" . $x_hurt2 . "/" . $x_hurt2;}
			else {$hitting = $hitting . "/" . $x_hurt2;}

			$attacks = $attacks + $attacks2;
		}

		if ($framez > 0)
		{
			if (mt_rand(1,100) > 50){$animal = "a humanoid";}
			else
			{
				$animal = array('a bear', 'a beetle', 'a lizard', 'a crab', 'a rat', 'a scorpion', 'a snake', 'a spider', 'a tiger', 'a wolf', 'a worm', 'an ant', 'an ape', 'a dragon', 'a wasp', 'a bird', 'a bat', 'a fly', 'an eel', 'a fish', 'a dolphin', 'a shark', 'a squid', 'a sea serpent', 'a lobster');
				$animal = $animal[mt_rand(0,24)];
			}

			if ($animal != "a humanoid")
			{
				$x_pain = $x_hurt[mt_rand(0,14)];
				$x_pain2 = $x_hurt[mt_rand(0,14)];

				if (($animal == "a beetle") || ($animal == "an ant")) { $attacks = 1; $hitters = "1(pincer)"; $hitting = $x_pain; $walkers = 6;}
				else if ($animal == "a wasp"){ $attacks = 1; $hitters = "1(stinger)"; $hitting = $x_pain; $walkers = 0; $x_legs = "wings";}
				else if (($animal == "a lobster") || ($animal == "a crab"))
				{
					$attacks = 2; $hitters = "2(pincers)"; $hitting = $x_pain . "/" . $x_pain; 
					if (mt_rand(1,100) > 60){$walkers = 0; $x_legs = "propeller";} else if (mt_rand(1,100) > 80){$walkers = 0; $x_legs = "water propulsion";} else {$walkers = 10; $x_legs = "legs";}
				}
				else if ($animal == "a scorpion"){ $attacks = 3; $hitters = "2(pincers)/1(tail)"; $hitting = $x_pain . "/" . $x_pain . "/" . $x_pain2; $walkers = 8; $x_legs = "legs";}
				else if ($animal == "a spider"){ $attacks = 1; $hitters = "1(bite)"; $hitting = $x_pain; $walkers = 8; $x_legs = "legs";}
				else if (($animal == "a bat") || ($animal == "a fly")){ $hitters = "1(bite)"; $hitting = $x_pain; $walkers = 0; $x_legs = "wings";}
				else if ($animal == "a bird"){ $hitters = "2(talons)/1(beak)"; $attacks = 3; $hitting = $x_pain . "/" . $x_pain . "/" . $x_pain2; $walkers = 0; $x_legs = "wings";}
				else if ($animal == "an ape"){ $attacks = 2; $hitters = "2(claws)"; $hitting = $x_pain . "/" . $x_pain; $walkers = 2; $x_legs = "legs";}
				else if ($animal == "a squid")
				{
					$attacks = 8; $hitters = "8(tentacles)"; $hitting = "8x(" . $x_pain . ")";
					if (mt_rand(1,100) > 60){$walkers = 0; $x_legs = "propeller";} else {$walkers = 0; $x_legs = "water propulsion";}
				}
				else if (($animal == "a sea serpent") || ($animal == "a shark") || ($animal == "a dolphin") || ($animal == "a fish") || ($animal == "an eel"))
				{
					$hitters = "1(jaw)"; $attacks = 1; $hitting = $x_pain;
					if (mt_rand(1,100) > 60){$walkers = 0; $x_legs = "propeller";} else {$walkers = 0; $x_legs = "water propulsion";}
				}
				else if (($animal == "a worm") || ($animal == "a snake")){$hitters = "1(jaw)"; $attacks = 1; $hitting = $x_pain; $walkers = 0; $x_legs = "legs";}
				else
				{
					$hitters = "2(claws)/1(jaw)"; $attacks = 3; $hitting = $x_pain . "/" . $x_pain . "/" . $x_pain2; $walkers = 4; $x_legs = "legs";
				}

				$shape = " It is built in the form of " . $animal . " and is about " . mt_rand(3,12) . " feet in size. ";
			}
			else
			{
				$shape = " It is built in standard mechanical form and is about " . mt_rand(3,12) . " feet in size. ";
				$walkers = 2;
			}
		}

		if (($walkers == 0) && ($x_legs == "legs"))
		{
			$travel = "It has no legs so it mechanically slithers around.";
		}
		else if (($x_legs == "legs") || ($x_legs == "tracks") || ($x_legs == "treads") || ($x_legs == "wheels") || ($x_legs == "rockets"))
		{
			$travel = "It can move around on " . $walkers . " " . $x_legs . ".";
		}
		else if (($x_legs == "hover") || ($x_legs == "propeller") || ($x_legs == "water propulsion") || ($x_legs == "rotor") || ($x_legs == "anti-gravity"))
		{
			$travel = "It can move around with an installed " . $x_legs . " device.";
		}
		else if ($x_legs == "wings") 
		{
			$travel = "It can fly around with a set of wings.";
		}
		else {$travel = "It is stationary and cannot move around.";}

		$travel = " " . $travel . " ";

	////////// GET THE ENCOUNTERS //
		if (mt_rand(1,100) > 50)
		{
			$x_encounter = 1;
		}
		else
		{
			$x_encounter = array('1d4', '1d4', '1d4', '1d4', '1d4', '1d6', '1d6', '1d6', '1d6', '1d8', '1d8', '1d8', '1d10', '1d10', '1d12');
			$x_encounter = $x_encounter[mt_rand(0,14)];
		}

	////////// MOVEMENT //
		$movement = mt_rand(1,16);			if ($movement == 1){$moving = 30;}		else if ($movement == 2){$moving = 40;}		else if ($movement == 3){$moving = 50;}
		else if ($movement == 4){$moving = 60;}		else if ($movement == 5){$moving = 70;}		else if ($movement == 6){$moving = 80;}		else if ($movement == 7){$moving = 90;}
		else if ($movement == 8){$moving = 100;}	else if ($movement == 9){$moving = 110;}	else if ($movement == 10){$moving = 120;}	else if ($movement == 11){$moving = 130;}
		else if ($movement == 12){$moving = 140;}	else if ($movement == 13){$moving = 150;}	else if ($movement == 14){$moving = 160;}	else if ($movement == 15){$moving = 170;}
		else if ($movement == 16){$moving = 180;}	if ($x_legs == "stationary"){$moving = 0;}

	////////// NAME //

		$alienbuilt = "";

		if ($x_fuel == "alien technology")
		{
			if (mt_rand(1,100) > 25){ if (mt_rand(1,100) > 75){$aldash = "-";} else {$aldash = "";} $aliensub = alienName(); }

			$name = alienName() . "" . $aldash . "" . $aliensub;
			$name = ucfirst($name);

			$builders = mt_rand(1,6);
			if ($builders == 1){ $alienbuilt = " (built by an ancient alien race known as the " . $name . ")"; }
			else if ($builders == 2){ $alienbuilt = " (constructed by an alien race known as the " . $name . ")"; }
			else if ($builders == 3){ $alienbuilt = " (from a crashed spaceship of an alien race known as the " . $name . ")"; }
			else if ($builders == 4){ $alienbuilt = " (from an ancient war with aliens known as the " . $name . ")"; }
			else if ($builders == 5){ $alienbuilt = " (used by a group of aliens known as the " . $name . ")"; }
			else { $alienbuilt = " (left behind by race of aliens known as the " . $name . ")"; }
		}
		else
		{
			$spaces = mt_rand(4,6);
			$dashit = 0;
			$name = "";
			$perc = 100;

			while ($spaces > 0) :

				$perc = $perc - 20;
				if ((mt_rand(1,100) > $perc) && ($name != "") && ($dashit != 1)){$dashit = 1; $entf = "-";}
				if (mt_rand(1,100) > 60){$name = randLetter() . "" . $entf . "" . $name;} else {$name = mt_rand(0,9) . "" . $entf . "" . $name;}
				$entf = "";
				$spaces = $spaces - 1;

			endwhile;

			$name = strtoupper($name);
		}

		if ($x_iq == "artificial intelligence")
		{
			$user = mt_rand(1,3);
			if ($user == 1){$ending = " Robot"; $with = "a robot with advanced AI";}
			else if ($user == 2){$ending = " Cyborg"; $with = "a cybernetic machine with human-like intellect";}
			else {$ending = " Android"; $with = "an android built with artificial intelligence";}
		}
		else if ($software == 1)
		{
			$user = mt_rand(1,4);
			if ($user == 1){$ender = " Robot";}
			else if ($user == 2){$ender = " Bot";}
			else if ($user == 3){$ender = " Droid";}
			else {$ender = " Mech";}

			if ($x_job == "combat")
			{
				$with = "a combat" . strtolower($ender);
				$have_weapons = $have_weapons + 1;
				$weapon_bonus = 20;
				$user = mt_rand(1,9);
				if ($user == 1){$ending = " Battle " . $ender;}
				else if ($user == 2){$ending = " War " . $ender;}
				else if ($user == 3){$ending = " Combat " . $ender;}
				else if ($user == 4){$ending = " Military " . $ender;}
				else if ($user == 5){$ending = " Fighting " . $ender;}
				else if ($user == 6){$ending = " Assassin " . $ender;}
				else if ($user == 7){$ending = " Hunter " . $ender;}
				else if ($user == 8){$ending = " Assault " . $ender;}
				else {$ending = " Attack " . $ender;}
			}
			else if ($x_job == "retrieval")
			{
				$with = "a retrieval" . strtolower($ender);
				if (mt_rand(1,100) > 75){$have_weapons = $have_weapons + 1;}
				$weapon_bonus = 90;
				$user = mt_rand(1,5);
				if ($user == 1){$ending = " Retrieval " . $ender;}
				else if ($user == 2){$ending = " Recovery " . $ender;}
				else if ($user == 3){$ending = " Recall " . $ender;}
				else if ($user == 4){$ending = " Search " . $ender;}
				else {$ending = " Capture " . $ender;}
			}
			else if ($x_job == "spying")
			{
				$with = "a spy" . strtolower($ender);
				if (mt_rand(1,100) > 65){$have_weapons = $have_weapons + 1;}
				$weapon_bonus = 80;
				$user = mt_rand(1,9);
				if ($user == 1){$ending = " Spy " . $ender;}
				else if ($user == 2){$ending = " Tactical Surveillance " . $ender;}
				else if ($user == 3){$ending = " Surveillance " . $ender;}
				else if ($user == 4){$ending = " Recon " . $ender;}
				else if ($user == 5){$ending = " Scout " . $ender;}
				else if ($user == 6){$ending = " Observation " . $ender;}
				else if ($user == 7){$ending = " Examination " . $ender;}
				else if ($user == 8){$ending = " Scanner " . $ender;}
				else {$ending = " Discovery " . $ender;}
			}
			else if ($x_job == "guarding")
			{
				$with = "a guard" . strtolower($ender);
				$have_weapons = $have_weapons + 1;
				$weapon_bonus = 20;
				$user = mt_rand(1,9);
				if ($user == 1){$ending = " Guard " . $ender;}
				else if ($user == 2){$ending = " Protection " . $ender;}
				else if ($user == 3){$ending = " Defender " . $ender;}
				else if ($user == 4){$ending = " Guardian " . $ender;}
				else if ($user == 5){$ending = " Lookout " . $ender;}
				else if ($user == 6){$ending = " Sentinel " . $ender;}
				else if ($user == 7){$ending = " Sentry " . $ender;}
				else if ($user == 8){$ending = " Defense " . $ender;}
				else {$ending = " Security " . $ender;}
			}
			else if ($x_job == "escorting")
			{
				$with = "an escort" . strtolower($ender);
				if (mt_rand(1,100) > 25){$have_weapons = $have_weapons + 1;}
				$weapon_bonus = 50;
				$user = mt_rand(1,6);
				if ($user == 1){$ending = " Escort " . $ender;}
				else if ($user == 2){$ending = " Attendant " . $ender;}
				else if ($user == 3){$ending = " Convoy " . $ender;}
				else if ($user == 4){$ending = " Company " . $ender;}
				else if ($user == 5){$ending = " Guide " . $ender;}
				else {$ending = " Travel " . $ender;}
			}
			else if ($x_job == "exploration")
			{
				$with = "an exploration" . strtolower($ender);
				if (mt_rand(1,100) > 80){$have_weapons = $have_weapons + 1;}
				$weapon_bonus = 95;
				$user = mt_rand(1,8);
				if ($user == 1){$ending = " Exploration " . $ender;}
				else if ($user == 2){$ending = " Investigation " . $ender;}
				else if ($user == 3){$ending = " Survey " . $ender;}
				else if ($user == 4){$ending = " Inspection " . $ender;}
				else if ($user == 5){$ending = " Probe " . $ender;}
				else if ($user == 6){$ending = " Research " . $ender;}
				else if ($user == 7){$ending = " Excavation " . $ender;}
				else {$ending = " Pioneer " . $ender;}
			}
		}
		$name = $name . "" . $ending;

	////////// WEAPONS //

		if (mt_rand(1,100) > $weapon_bonus){$have_weapons = $have_weapons + 1;} // BONUS WEAPON
		$wepgold = $have_weapons;

		while ($have_weapons > 0) :

			if ($weapon_tech == 1)
			{
				$gunz = array('Automatic Pistol', 'Pistol', 'Sub-Machine Gun', 'Carbine Rifle', 'Automatic Rifle', 'Shotgun', 'Automatic Shotgun', 'Cannon', 'Grenade Launcher', 'Machine Gun');
				$gunz = $gunz[mt_rand(0,9)];
			}
			else if ($weapon_tech == 2)
			{
				$gunz = array('Automatic Pistol', 'Pistol', 'Sub-Machine Gun', 'Carbine Rifle', 'Automatic Rifle', 'Shotgun', 'Automatic Shotgun', 'Cannon', 'Grenade Launcher', 'Machine Gun', 'Automatic Pistol', 'Pistol', 'Sub-Machine Gun', 'Carbine Rifle', 'Automatic Rifle', 'Shotgun', 'Automatic Shotgun', 'Cannon', 'Grenade Launcher', 'Machine Gun', 'Chemical Grenade', 'Concussion Grenade', 'Dynamite', 'Energy Grenade', 'Frag Grenade', 'Fire Grenade', 'Gas Grenade', 'MutagenGrenade', 'Nerve Gas Grenade', 'Photon Grenade', 'Photon Grenade', 'Plasma Grenade', 'Shock Grenade', 'Smoke Grenade');
				$gunz = $gunz[mt_rand(0,33)];
			}
			else if ($weapon_tech == 3)
			{
				$gunz = array('Chemical Grenade', 'Concussion Grenade', 'Energy Grenade', 'Frag Grenade', 'Fire Grenade', 'Gas Grenade', 'MutagenGrenade', 'Nerve Gas Grenade', 'Photon Grenade', 'Photon Grenade', 'Plasma Grenade', 'Shock Grenade', 'Smoke Grenade', 'Sonic Pistol', 'Energy Pistol', 'Laser Pistol', 'Heavy Laser Pistol', 'Photon Pistol', 'Plasma Pistol', 'Stun Pistol', 'Sonic Pistol', 'Energy Pistol', 'Laser Pistol', 'Heavy Laser Pistol', 'Photon Pistol', 'Plasma Pistol', 'Stun Pistol', 'Sonic Pistol', 'Energy Pistol', 'Laser Pistol', 'Heavy Laser Pistol', 'Photon Pistol', 'Plasma Pistol', 'Stun Pistol');
				$gunz = $gunz[mt_rand(0,33)];
			}
			else if ($weapon_tech == 4)
			{
				$gunz = array('Blaster Rifle', 'EMP Rifle', 'Fusion Rifle', 'Plasma Rifle', 'Plutonium Rifle', 'Pulse Rifle', 'Laser Rifle', 'Heavy Laser Rifle', 'Nuclear Rifle', 'Stun Rifle', 'Sonic Rifle', 'Blaster Rifle', 'EMP Rifle', 'Fusion Rifle', 'Plasma Rifle', 'Plutonium Rifle', 'Pulse Rifle', 'Laser Rifle', 'Heavy Laser Rifle', 'Nuclear Rifle', 'Stun Rifle', 'Sonic Rifle', 'Blaster Rifle', 'EMP Rifle', 'Fusion Rifle', 'Plasma Rifle', 'Plutonium Rifle', 'Pulse Rifle', 'Laser Rifle', 'Heavy Laser Rifle', 'Nuclear Rifle', 'Stun Rifle', 'Sonic Rifle', 'Toxic Bomb', 'Concussion Bomb', 'Anti-Tank Weapon', 'Mutagen Bomb', 'Energy Bomb', 'Plasma Bomb', 'Radiation Bomb', 'Grenade Launcher', 'Mini-Missile Launcher', 'Missile Launcher');
				$gunz = $gunz[mt_rand(0,42)];
			}

			$have_weapons = $have_weapons - 1;

			$robocop = $gunz . "; " . $robocop;

		endwhile;

			$robocop = substr($robocop, 0, -2);
			if ($robocop == ""){$robocop = "None";}

	?>

	<p style="margin-top: 0; margin-bottom: 0"><b><font size="4"><?php echo $name; ?></font></b></p>
	<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="45%">
		<tr>
			<td width="103">Appearing:</td>
			<td><?php echo $x_encounter; ?></td>
		</tr>
		<tr>
			<td width="103">Move:</td>
			<td><?php if ($moving == 0){echo "None";} else {echo $moving; ?>' (<?php echo ($moving/2); ?>')<?php } ?></td>
		</tr>
		<tr>
			<td width="103">Armor Class:</td>
			<td><?php echo $x_armor; ?></td>
		</tr>
		<tr>
			<td width="103">Hit Dice:</td>
			<td><?php $hitsd = (mt_rand(1,10)*5); echo $hitsd; ?></td>
		</tr>
		<tr>
			<td width="103">Attacks:</td>
			<td><?php echo $hitters; if ($wepgold > 0){ echo " or 1(weapon)"; } ?></td>
		</tr>
		<tr>
			<td width="103">Damage:</td>
			<td><?php echo $hitting; if ($wepgold > 0){ echo " or by weapons"; } ?></td>
		</tr>
		<tr>
			<td width="103">Save:</td>
			<td>L<?php $saved = mt_rand(5,20); echo $saved ?></td>
		</tr>
		<tr>
			<td width="103">THAC0:</td>
			<td><?php if ($hitsd == 5){echo "15";} else if ($hitsd == 10){echo "11";} else if ($hitsd == 15){echo "9";} else if ($hitsd == 20){echo "7";} else {echo "5";} ?></td>
		</tr>
		<tr>
			<td width="103">Extras:</td>
			<td><?php echo $x_extras; ?></td>
		</tr>
		<tr>
			<td width="103">Weapons:</td>
			<td><?php echo $robocop; ?></td>
		</tr>
		<tr>
			<td width="103">Value:</td>
			<td>$<?php
					$valug = 0;
					$valug = $valug + ($hitsd * 100);
					$valug = $valug + ($attacks * 100);
					$valug = $valug + ($saved * 50);
					$valug = $valug + ($someadd * 50);
					$valug = $valug + ($wepgold * 100);
				echo number_format($valug);
				?>
			</td>
		</tr>
	</table>
	<p>

	<?php echo "The " . $name . "" . $alienbuilt . " is " . $with . " that runs on " . $x_fuel . " and is made mostly of " . $x_metal . ". " . $shape . "" . $travel . ""; ?>

	<?php echo "It has " . $x_eyes . "."; ?>

	</p>
	<?php 

	$amount = $amount - 1;

	echo "<hr>";

	endwhile;

	/////////////////////////////////////////////////////////// MUTANTS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$amount = $_POST['m_amount'];

	if ($amount > 0){
	?>

	<img border="0" src="pics_tools/tools_scifim_m.jpg">
	<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
	<?php }

	while ($amount > 0) :

	////////// GET THE TOP HALF //
		$qry = "SELECT * FROM mutants ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
		$res = wz_query( $connection, $qry ); /*qry*/
		$ary = wz_fetch_array($res);

	////////// ACTIVE CYCLE //
		if (mt_rand(1,100) > 50){ $sleep = "any"; }
		else { $sleep = array('any', 'day', 'night'); $sleep = $sleep[mt_rand(0,2)]; }

	////////// WHERE LIVE //
		$dwell = array('desert', 'forest', 'swampy', 'jungle', 'ruins', 'underground', 'radioactive', 'cold or snowy', 'grassland', 'mountainous', 'hilly', 'freshwater', 'sea');
		$dwell = $dwell[mt_rand(0,12)];

	////////// GET THE BOTTOM HALF //
		$sea_creature = 0;
		if (($dwell == "freshwater") || ($dwell == "sea"))
		{
			$sea_creature = 1;
			$qry4 = "SELECT * FROM mutants WHERE fins=1 AND id!=$ary[0] ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
		}
		else
		{
			$qry4 = "SELECT * FROM mutants WHERE legs=1 AND id!=$ary[0] ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
		}
		$res4 = wz_query( $connection, $qry4 ); /*qry4*/
		$ary4 = wz_fetch_array($res4);

	////////// SEE IF THEY HAVE WINGS //
		$flies = mt_rand(1,100);
		if (($flies > 25) && ($sea_creature != 1) && (($ary[6] == 1) || ($ary4[6] == 1))){$wings = 1;} else {$wings = 0;}
		if ($wings == 1){ if ($ary4[6] == 1){$flylike = $ary4[1];} else {$flylike = $ary[1];} }

	////////// GET THE LEGS //
		$walks = mt_rand(1,100);
		if (($walks > 25) && ($ary4[7] == 1)){ $legs = 0; $snake = 1; }
		else if (($walks > 25) && ($ary4[5] == 1)){ $legs = 0; $fish = 1; }
		else { $legs = array('2', '4', '6', '8'); $legs = $legs[mt_rand(0,3)]; $snake = 0; $fish = 0; }
			if ($legs == 2){$movement = mt_rand(4,10);}
			else if ($legs == 4){$movement = mt_rand(6,12);}
			else if ($legs == 6){$movement = mt_rand(8,14);}
			else if ($legs == 8){$movement = mt_rand(10,16);}
			else {$movement = mt_rand(1,10);}

	////////// SKIN //
		$xskin = array('scales', 'fur', 'feathers', 'skin'); $xskin = $xskin[mt_rand(0,3)];

	////////// COLOR //
		$xcolors = array('blue-green', 'black', 'blue', 'gray', 'green', 'violet', 'red', 'brown', 'orange', 'yellowish-green', 'tan', 'gold', 'yellow', 'purple', 'silver', 'forest-green', 'white');
		$xcolor = $xcolors[mt_rand(0,16)];

	////////// ANY COLOR VARIATION //
		$xcolors2 = array('bright', '', 'dark', 'light', 'dull', 'vibrant', 'thick', 'dirty', 'deep', 'rich', 'shiny');
		$xcolor2 = $xcolors2[mt_rand(0,10)];

	////////// INTELLIGENCE //
		$xiq = array('animal', 'low', 'average', 'high', 'genius');
		$xiq = $xiq[mt_rand(0,4)];
			if ($xiq == "animal"){$smarty = "exhibit animal behavior"; $willpower = mt_rand(3,8);}
			else if ($xiq == "low"){$smarty = "are not very intelligent"; $willpower = mt_rand(3,13);}
			else if ($xiq == "average"){$smarty = "have average intelligence"; $willpower = mt_rand(3,18);}
			else if ($xiq == "high"){$smarty = "are quite intelligent"; $willpower = mt_rand(7,19);}
			else if ($xiq == "genius"){$smarty = "are extremely intelligent"; $willpower = mt_rand(11,21);}

	////////// EYES //
		$xeyes = mt_rand(1,8); $xecolor = $xcolors[mt_rand(0,16)];

	////////// HEADS //
		if (mt_rand(1,100) > 95){$heads = 2;}

	////////// HEIGHT //
		$xheight = array('3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
		$xheight = $xheight[mt_rand(0,9)];

	////////// ENCOUNTER //
		$xenc = array('1', '1d2', '1d4', '1d6', '1d8', '1d10', '2d4', '2d6', '2d8', '2d10');
		$xenc = $xenc[mt_rand(0,9)];

	////////// LAIR //
		if (mt_rand(1,100) > 30){ $lair = $xenc; }
		else
		{
			if ($xenc == "1"){$lairv = 0;}
			else if ($xenc == "1d2"){$lairv = 1;}
			else if ($xenc == "1d4"){$lairv = 2;}
			else if ($xenc == "1d6"){$lairv = 3;}
			else if ($xenc == "1d8"){$lairv = 4;}
			else if ($xenc == "1d10"){$lairv = 5;}
			else if ($xenc == "2d4"){$lairv = 6;}
			else if ($xenc == "2d6"){$lairv = 7;}
			else if ($xenc == "2d8"){$lairv = 8;}
			else {$lairv = 9;}

			$lair = array('1d2', '1d4', '1d6', '1d8', '1d10', '2d4', '2d6', '2d8', '2d10', '3d6', '3d4');
			$lair = $lair[mt_rand($lairv,10)];
		}

	////////// ALIGNMENT //
		if ($xiq == "animal"){ $alignment = "Neutral"; }
		else { $alignment = array('Lawful', 'Neutral', 'Chaotic'); $alignment = $alignment[mt_rand(0,2)]; }

	////////// ARMOR CLASS //
		$xarmor = 10 - mt_rand(1,16);

	////////// HIT DICE //
		$hitdice = mt_rand(1,20);

	////////// HIT DICE MOD //
		$hmod = mt_rand(1,100);
		if ($hmod > 25){ $hd_mod = 0; }
		else
		{
			$xhdmod = array('+1', '+2', '+3', '+4', '+5', '+6', '+7', '+8', '+9', '+10', '-1', '-2', '-3', '-4', '-5', '-6');
			$hd_mod = $xhdmod[mt_rand(0,15)];
			if (($hd_mod + 0) > 0){$hitdice = $hitdice + 1;}
		}

	////////// THACO //
		if ($hitdice < 8){$thaco = 20 - $hitdice;}	else if ($hitdice < 10){$thaco = 12;}	else if ($hitdice < 12){$thaco = 11;}
		else if ($hitdice < 14){$thaco = 10;}		else if ($hitdice < 16){$thaco = 9;}	else if ($hitdice < 18){$thaco = 8;}
		else if ($hitdice < 20){$thaco = 7;}		else if ($hitdice < 22){$thaco = 6;}	else {$thaco = 5;}

	////////// MORALE //
		$xbrave = mt_rand(3,11);

	////////// LOOT //
		if ($xiq == "animal"){ $loot = "None"; }
		else if (($xiq == "low") && (mt_rand(1,100) > 50)){ $loot = "None"; }
		else if ($xiq == "low"){	$cash = array('I', 'II', 'III', 'IV', 'V');	$loot = $cash[mt_rand(0,4)]; }
		else if ($xiq == "average"){$cash = array('I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII');	$loot = $cash[mt_rand(0,7)]; }
		else if ($xiq == "high"){	$cash = array('VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII', 'XIII', 'XIV', 'XV', 'XVI');	$loot = $cash[mt_rand(0,10)]; }
		else if ($xiq == "genius"){	$cash = array('VIII', 'IX', 'X', 'XI', 'XII', 'XIII', 'XIV', 'XV', 'XVI', 'XVII', 'XVIII', 'XIX', 'XX', 'XXI', 'XXII');	$loot = $cash[mt_rand(0,14)]; }

	////////// MOVEMENT //
		if ($movement == 1){$moving = 30;}		else if ($movement == 2){$moving = 40;}		else if ($movement == 3){$moving = 50;}
		else if ($movement == 4){$moving = 60;}		else if ($movement == 5){$moving = 70;}		else if ($movement == 6){$moving = 80;}
		else if ($movement == 7){$moving = 90;}		else if ($movement == 8){$moving = 100;}	else if ($movement == 9){$moving = 110;}
		else if ($movement == 10){$moving = 120;}	else if ($movement == 11){$moving = 130;}	else if ($movement == 12){$moving = 140;}
		else if ($movement == 13){$moving = 150;}	else if ($movement == 14){$moving = 160;}	else if ($movement == 15){$moving = 170;}
		else if ($movement == 16){$moving = 180;}

		if ($wings == 1){$flying = $moving * 2;} else {$flying = 0;}

		if (($sea_creature == 1) && (75 > mt_rand(1,100))){$swimming = $moving * 2;}
		else if ($sea_creature == 1){$swimming = $moving;}
		else {$swimming = 0;}

	////////// ARMS //
		if (mt_rand(1,100) > 25){ $arms = 2; } else { $arms = 2 * mt_rand(1,3); }

	////////// ATTACKS //
		$fight=0; $fight1=0; $fight2=0; $fight3=0; $fight4=0; $fight5=0; $fight6=0; $fight7=0; $fight8=0; $fight9=0;
		$hitters = ""; $hurts = "";
		$xdamage = array('1d4', '1d4', '1d4', '1d4', '1d4', '1d4', '1d4', '1d6', '1d6', '1d6', '1d6', '1d6', '1d6', '1d8', '1d8', '1d8', '1d8', '2d4', '2d4', '1d10', '1d10', '1d12', '1d12', '2d6', '2d8');

		/// HAND ATTACKS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (($ary[2] == "talons") || ($ary[2] == "claw") || ($ary[2] == "fist") || ($ary[2] == "pincer") || ($ary[2] == "pincers"))
		{
			if ((mt_rand(1,100) > 25) && ($arms == 2)){ $fight1 = $arms - 1; }
			else { $fight1 = $arms; }
			if ($fight1 > 1){$hitters = $fight1 . " " . $ary[2] . ", " . $hitters;} else {$hitters = $ary[2] . ", " . $hitters;}
				$fightc = $fight1;
				while ($fightc > 0) :
					$hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
					$fightc = $fightc - 1;
				endwhile;
		}
		if (($ary[3] == "talons") || ($ary[3] == "claw") || ($ary[3] == "fist") || ($ary[3] == "pincer") || ($ary[3] == "pincers"))
		{
			if ((mt_rand(1,100) > 25) && ($arms == 2)){ $fight2 = $arms - 1; }
			else { $fight2 = $arms; }
			if ($fight2 > 1){$hitters = $fight2 . " " . $ary[3] . ", " . $hitters;} else {$hitters = $ary[3] . ", " . $hitters;}
				$fightc = $fight2;
				while ($fightc > 0) :
					$hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
					$fightc = $fightc - 1;
				endwhile;
		}

		/// HEAD ATTACKS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (($ary[2] == "antlers") || ($ary[2] == "horn") || ($ary[2] == "horns") || ($ary[2] == "peck") || ($ary[2] == "bite") || ($ary[2] == "tusks") || ($ary[2] == "tongue"))
		{
			if ((mt_rand(1,100) > 25) && ($heads > 1)){ $fight3 = 2; }
			else { $fight3 = 1; }
			if ($fight3 > 1){$hitters = $fight3 . " " . $ary[2] . ", " . $hitters;} else {$hitters = $ary[2] . ", " . $hitters;}
				$fightc = $fight3;
				while ($fightc > 0) :
					$hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
					$fightc = $fightc - 1;
				endwhile;
		}
		if (($ary[3] == "antlers") || ($ary[3] == "horn") || ($ary[3] == "horns") || ($ary[3] == "peck") || ($ary[3] == "bite") || ($ary[3] == "tusks") || ($ary[3] == "tongue"))
		{
			if ((mt_rand(1,100) > 25) && ($heads > 1)){ $fight4 = 2; }
			else { $fight4 = 1; }
			if ($fight4 > 1){$hitters = $fight4 . " " . $ary[3] . ", " . $hitters;} else {$hitters = $ary[3] . ", " . $hitters;}
				$fightc = $fight4;
				while ($fightc > 0) :
					$hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
					$fightc = $fightc - 1;
				endwhile;
		}

		/// BOTTOM ATTACKS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (($ary4[2] == "spray") || ($ary4[2] == "stinger") || ($ary4[2] == "ink"))
		{
			$fight5 = 1; $hitters = $ary4[2] . ", " . $hitters; $hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
		}
		if (($ary4[3] == "spray") || ($ary4[3] == "stinger") || ($ary4[3] == "ink"))
		{
			$fight6 = 1; $hitters = $ary4[3] . ", " . $hitters; $hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
		}

		/// OTHER ATTACKS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (($ary4[2] == "quills") || ($ary4[3] == "quills") || ($ary[2] == "quills") || ($ary[3] == "quills"))
		{
			$fight7 = 1; $hitters = "quills, " . $hitters; $hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
		}
		if (($ary[2] == "sonic") || ($ary[3] == "sonic"))
		{
			$fight8 = 1; $hitters = "sonic, " . $hitters; $hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
		}
		if (($ary4[2] == "tail") || ($ary4[3] == "tail"))
		{
			$fight9 = 1; $hitters = "tail, " . $hitters; $hurts = $xdamage[mt_rand(0,24)] . "/" . $hurts;
		}

		$fight = $fight1 + $fight2 + $fight3 + $fight4 + $fight5 + $fight6 + $fight7 + $fight8 + $fight9;
		if ($fight < 1){$fight = 1;}

		if ($hurts != "")
		{
			$hurts = substr($hurts, 0, -1);
		}
		else { $hurts = $xdamage[mt_rand(0,24)]; }

		if ($hitters != ""){ $hitters = substr($hitters, 0, -2); $hitters = "(" . $hitters . ")"; }

	////////// NAME THE CREATURE //
		$callme = "";
		$vowel1 = 0;
		$vowel2 = 0;

		if (mt_rand(1,100) > 50){$myname = $ary[1];} else {$myname = $ary4[1];}

		$name_long = strlen($myname);
		$name_short = ceil($name_long / 3);
		$name_total = mt_rand($name_short,$name_long);
		$myname = substr($myname, 0, $name_total);
		$myname_end = substr($myname, -1);

		$suf_use = strtolower(mutantName());
		$suf_start = substr($suf_use, -1);

		if (($myname_end == "a") || ($myname_end == "e") || ($myname_end == "i") || ($myname_end == "o") || ($myname_end == "u")){$vowel1 = 1;}
		if (($suf_start == "a") || ($suf_start == "e") || ($suf_start == "i") || ($suf_start == "o") || ($suf_start == "u")){$vowel2 = 1;}

		if (($vowel1 == 1) && ($vowel2 == 1))
		{
			$vowel_pick = mt_rand(1,100);
			if ($vowel_pick > 50)
			{
				$myname = substr($myname, 0, -1);
				$callme = $myname . "" . $suf_use;	
			}
			else
			{
				$suf_use = substr($suf_use, 1);
				$callme = $myname . "" . $suf_use;	
			}

		}
		else if (($vowel1 == 0) && ($vowel2 == 0))
		{
			$vowel_pick = mt_rand(1,5);
			if ($vowel_pick == 1){$vowel_use = "a";}
			else if ($vowel_pick == 1){$vowel_use = "e";}
			else if ($vowel_pick == 1){$vowel_use = "i";}
			else if ($vowel_pick == 1){$vowel_use = "o";}
			else {$vowel_use = "u";}
			$callme = $myname . "" . $vowel_use . "" . $suf_use;
		}
		else
		{
			$callme = $myname . "" . $suf_use;
		}

	////////// NOT EVERY CREATURE HAS ARMS //
		$weapon_use = "";
		$weapon_has = 0;

		if (($fight1 + $fight2) > 0){} else
		{
			if ($xiq == "animal"){$arms = 0; if ($legs < 3){$legs = $legs + $arms;}}
			else if (($xiq == "low") && (mt_rand(1,100) > 25)){$arms = 0; if ($legs < 3){$legs = $legs + $arms;}}
			else if (($xiq == "average") && (mt_rand(1,100) > 50)){$arms = 0; if ($legs < 3){$legs = $legs + $arms;}}
		}
		if (($arms > 0) && ($xiq == "low") && (mt_rand(1,100) > 70))
		{
			$weapon_has = 1; $weapon_use = "They sometimes use weapons such as crude spears and clubs. ";
		}
		else if (($arms > 0) && ($xiq == "average") && (mt_rand(1,100) > 50))
		{
			$weapon_has = 1; $weapon_use = "They sometimes use weapons such as swords and bows. ";
		}
		else if (($arms > 0) && ($xiq == "high") && (mt_rand(1,100) > 30))
		{
			$weapon_has = 1; $weapon_use = "They sometimes use weapons such as swords, bows and primitive firearms. ";
		}
		else if (($arms > 0) && ($xiq == "genius") && (mt_rand(1,100) > 10))
		{
			$weapon_has = 1; $weapon_use = "They sometimes use advanced weaponry and other technology. ";
		}

	$mixer = mt_rand(1,13);

	if ($mixer == 1){$mix = "a mixture of";}
	else if ($mixer == 2){$mix = "a mutation of";}
	else if ($mixer == 3){$mix = "a hybrid of";}
	else if ($mixer == 4){$mix = "a combination of";}
	else if ($mixer == 5){$mix = "a cross between";}
	else if ($mixer == 6){$mix = "a blend of";}
	else if ($mixer == 7){$mix = "a fusion of";}
	else if ($mixer == 8){$mix = "a merger of";}
	else if ($mixer == 9){$mix = "a union of";}
	else if ($mixer == 10){$mix = "an abomination of";}
	else if ($mixer == 11){$mix = "a mongrel of";}
	else if ($mixer == 12){$mix = "a monster in the form of";}
	else {$mix = "a beast in the form of";}

	$adja = mt_rand(1,14);
	if ($adja == 1){$adj1 = "short ";}
	else if ($adja == 2){$adj1 = "long ";}
	else if ($adja == 3){$adj1 = "muscular ";}
	else if ($adja == 4){$adj1 = "thin ";}
	else if ($adja == 5){$adj1 = "large ";}
	else if ($adja == 6){$adj1 = "small ";}
	else {$adj1 = "";}

	$adjb = mt_rand(1,14);
	if ($adjb == 1){$adj2 = "short ";}
	else if ($adjb == 2){$adj2 = "long ";}
	else if ($adjb == 3){$adj2 = "muscular ";}
	else if ($adjb == 4){$adj2 = "thin ";}
	else if ($adjb == 5){$adj2 = "large ";}
	else if ($adjb == 6){$adj2 = "small ";}
	else {$adj2 = "";}

	$adjc = mt_rand(1,16);
	if ($adjc == 1){$adj3 = "small ";}
	else if ($adjc == 2){$adj3 = "large ";}
	else if ($adjc == 3){$adj3 = "bulbous ";}
	else if ($adjc == 4){$adj3 = "small ";}
	else if ($adjc == 5){$adj3 = "large ";}
	else if ($adjc == 6){$adj3 = "small ";}
	else if ($adjc == 7){$adj3 = "large ";}
	else {$adjc = "";}

	$lands = $dwell; 
	if ($dwell != "ruins"){ $lands = $lands . " areas"; }
	if ($dwell == "ruins"){ $lands = "ruins"; }
	else if ($dwell == "sea"){ $lands = "oceans & seas"; }
	else if ($dwell == "freshwater"){ $lands = "lakes & rivers"; }
	else if ((($lands == "oceans & seas") || ($lands == "lakes & rivers")) && ($sea_creature != 1)){ $lands = "forest areas"; }
	?>

	<p style="margin-top: 0; margin-bottom: 0"><b><font size="4"><?php echo ucfirst($callme); ?></font></b></p>
	<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="45%">
		<tr>
			<td width="103">Appearing:</td>
			<td><?php echo $xenc; ?> (<?php echo $lair; ?>)</td>
		</tr>
		<tr>
			<td width="103">Alignment:</td>
			<td><?php echo $alignment; ?></td>
		</tr>
		<tr>
			<td width="103">Movement:</td>
			<td><?php if (($swimming > 0) && ($legs == 0) && ($snake != 1)){echo "Swim: "; echo $swimming; ?>' (<?php echo ($swimming/2); ?>')<?php } else { echo $moving; ?>' (<?php echo ($moving/2); ?>')<?php } ?></td>
		</tr>

	<?php if (($swimming > 0) && ($legs > 0)){ ?>
		<tr>
			<td width="103" align="right"><i>Swim:&nbsp;</i></td>
			<td><i><?php echo $swimming; ?>' (<?php echo ($swimming/2); ?>')</i></td>
		</tr>
	<?php } if ($flying > 0){ ?>
		<tr>
			<td width="103" align="right"><i>Flying:&nbsp;</i></td>
			<td><i><?php echo $flying; ?>' (<?php echo ($flying/2); ?>')</i></td>
		</tr>
	<?php } ?>

		<tr>
			<td width="103">Armor Class:</td>
			<td><?php echo $xarmor; ?></td>
		</tr>
		<tr>
			<td width="103">Hit Dice:</td>
			<td><?php echo $hitdice; if ($hd_mod != 0){ ?> <?php echo $hd_mod; } ?></td>
		</tr>
		<tr>
			<td width="103">Attacks:</td>
			<td><?php echo $fight; echo " "; if ($hitters != ""){echo $hitters;} if ($weapon_has == 1){ echo " or weapon"; } ?></td>
		</tr>
		<tr>
			<td width="103">Damage:</td>
			<td><?php echo $hurts; if ($weapon_has == 1){ echo " or by weapon"; } ?></td>
		</tr>
		<tr>
			<td width="103">THAC0:</td>
			<td><?php echo $thaco; ?></td>
		</tr>
		<tr>
			<td width="103">Save:</td>
			<td>L<?php echo mt_rand(1,20); ?></td>
		</tr>
		<tr>
			<td width="103">Morale:</td>
			<td><?php echo $xbrave ?></td>
		</tr>
		<tr>
			<td width="103">Intellect:</td>
			<td><?php echo ucfirst($xiq); ?></td>
		</tr>
		<tr>
			<td width="103">Willpower:</td>
			<td><?php echo $willpower; ?></td>
		</tr>
		<tr>
			<td width="103">Habitat:</td>
			<td><?php echo ucwords($lands); ?></td>
		</tr>
		<tr>
			<td width="103">Hoard Class:</td>
			<td><?php echo $loot; ?></td>
		</tr>
	</table>
	<p>

	The <?php echo ucfirst($callme); ?> seem to be <?php echo $mix; ?> a <?php echo $ary[1]; ?> and a <?php echo $ary4[1]; ?>. Their upper body is mostly <?php echo $ary[1]; if ($heads > 1){?>, with two heads,<?php } ?> and the lower part is mostly <?php echo $ary4[1]; ?>. 

	They <?php if ($snake == 1){?>slither around<?php } else if ($fish == 1){ ?>have fins for swimming<?php } else { ?>have <?php echo $legs; ?> <?php echo $adj1; ?>legs<?php } if ($arms > 0){?> and also have <?php echo $arms; ?> <?php echo $adj2; ?>arms<?php } ?>. 

	<?php if ($wings == 1){?>They also have wings, like a <?php echo $flylike; ?>, that allow them to fly around. <?php } ?>

	They are usually about <?php echo $xheight ?> feet <?php if ($legs == 0){echo "long";} else {echo "tall";} ?> and <?php echo $smarty; ?>. 

	Their bodies are covered in <?php if (($xcolor != "white") && ($xcolor != "black")){echo $xcolor2;} ?> <?php echo $xcolor; ?> colored <?php echo $xskin; ?>. 

	They have <?php echo $xeyes; ?> <?php echo $adj3; ?><?php if ($xeyes > 1){echo "eyes that are";} else {echo "eye that is";} ?> <?php echo $xecolor; ?> in color. 

	They inhabit the <?php echo $lands; ?> of the world<?php if ($sleep != "any"){ echo " and only come out during the " . $sleep; } ?>. <?php echo $weapon_use; ?>

	</p>
	<?php

	$amount = $amount - 1;

	echo "<hr>";

	endwhile;
}

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>