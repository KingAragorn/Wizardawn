<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "T&T 5e";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' target='_blank' method='POST' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Fantasy Settlements</p>";
	echo "<p style='text-align: justify;'>Here you can generate a random Tunnels &amp; Trolls settlement based off of geomorphs created by <a href='http://www.risusmonkey.com/' target='_blank'>Risus Monkey</a> or you can create a village based off of geomorphs created by <a target='_blank' href='http://stonewerks.wordpress.com/'>Stonewerks</a>. Simply decide the size of map (or how many buildings you have on your own map), whether you want all of the houses filled with citizens, and what type of kindred live in this settlement.";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_package'>";

	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cell">Settlement Name:</span>
				<span class="cell"><input type="text" id="InputOption" name="name" size="25"></span>
			</div>
			<div class="row">
				<span class="cell">Map Type:</span>
				<span class="cell">
					<select size="1" id="DropOption" name="built">
						<option>City</option>
						<option>Keep</option>
						<option>Village</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Map Width:</span>
				<span class="cell"><select size="1" id="DropOption" name="map_wide">
					<?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select></span>
			</div>
			<div class="row">
				<span class="cell">Map Height:</span>
				<span class="cell"><select size="1" id="DropOption" name="map_high">
					<?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select>&nbsp;...or use your own map...</span>
			</div>
				<div class="row">
					<span class="cell">My Map's Buildings:</span>
					<span class="cell"><select size="1" id="DropOption" name="map_rooms"><option></option>
						<?php $runner=991; $running=9; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select></span>
				</div>
			<div class="row">
				<span class="cell">Populate:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="empty" value="1"></span>
			</div>
			<div class="row">
				<span class="cell">Create:</span>
				<span class="cell"><input type="checkbox" checked id="InputOption" name="rulers" value="1">Rulers<br>
									<input type="checkbox" checked id="InputOption" name="stores" value="1">Merchants<br>
									<input type="checkbox" checked id="InputOption" name="guilds" value="1">Guilds<br>
									<input type="checkbox" checked id="InputOption" name="police" value="1">Guards<br>
									<input type="checkbox" checked id="InputOption" name="church" value="1">Churches</span>
			</div>
			<div class="row">
				<span class="cell">Sea Side:</span>
				<span class="cell"><input type="checkbox" checked id="InputOption" name="water" value="1"></span>
			</div>
			<div class="row">
				<span class="cell">Stock:</span>
				<span class="cell"><select size="1" id="DropOption" name="stock"><option>70</option>
					<?php $runner=20; $running=0; while ($runner > 0) : $running = $running+5; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select></span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="shelf" checked value="1">&nbsp;Merchant Only Stocks So Much Of Each Item</span>
			</div>
			<div class="row">
				<span class="cell">Weapons/Armor:</span>
				<span class="cell"><input type="radio" value="0" checked id="InputOption" name="x_oldway">Use T&amp;T Items...or...<input type="radio" value="1" id="InputOption" name="x_oldway">Use Magestykc Items</span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="showcase1" value="1"> Show Weapon/Armor Classifications In Stores</span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="showcase2" value="1"> Show Weapon/Armor Statistics In Stores</span>
			</div>
		</div>

		<br><p style='text-align: justify;'>Kindred Residents: Selecting &quot;all&quot; or &quot;none&quot; below will use all the kindred available...otherwise...check the boxes if you only want a few kindred living in the settlement.<br><br>

		<div id="div_tabex">
			<div class="row">
				<span class="cell"><input type="checkbox" name="x_race_human" value="1">Human</span>
				<span class="cell"><input type="checkbox" name="x_race_brownie" value="1">Brownie</span>
				<span class="cell"><input type="checkbox" name="x_race_centaur" value="1">Centaur</span>
				<span class="cell"><input type="checkbox" name="x_race_cyclops" value="1">Cyclops</span>
				<span class="cell"><input type="checkbox" name="x_race_daklafar" value="1">Daklafar</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="x_race_dwarf" value="1">Dwarf</span>
				<span class="cell"><input type="checkbox" name="x_race_dwurman" value="1">Dwurman</span>
				<span class="cell"><input type="checkbox" name="x_race_elf" value="1">Elf</span>
				<span class="cell"><input type="checkbox" name="x_race_fairy" value="1">Fairy</span>
				<span class="cell"><input type="checkbox" name="x_race_falcoran" value="1">Falcoran</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="x_race_fruglum" value="1">Fruglum</span>
				<span class="cell"><input type="checkbox" name="x_race_gnome" value="1">Gnome</span>
				<span class="cell"><input type="checkbox" name="x_race_goblin" value="1">Goblin</span>
				<span class="cell"><input type="checkbox" name="x_race_gremlin" value="1">Gremlin</span>
				<span class="cell"><input type="checkbox" name="x_race_greyling" value="1">Greyling</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="x_race_hobgoblin" value="1">Hobgoblin</span>
				<span class="cell"><input type="checkbox" name="x_race_hobling" value="1">Hobling</span>
				<span class="cell"><input type="checkbox" name="x_race_imp" value="1">Imp</span>
				<span class="cell"><input type="checkbox" name="x_race_kobold" value="1">Kobold</span>
				<span class="cell"><input type="checkbox" name="x_race_leprechaun" value="1">Leprechaun</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="x_race_mantaran" value="1">Mantaran</span>
				<span class="cell"><input type="checkbox" name="x_race_minotaur" value="1">Minotaur</span>
				<span class="cell"><input type="checkbox" name="x_race_neptar" value="1">Neptar</span>
				<span class="cell"><input type="checkbox" name="x_race_ogre" value="1">Ogre</span>
				<span class="cell"><input type="checkbox" name="x_race_orke" value="1">Orke</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="x_race_pixie" value="1">Pixie</span>
				<span class="cell"><input type="checkbox" name="x_race_rattanu" value="1">Rattanu</span>
				<span class="cell"><input type="checkbox" name="x_race_satyr" value="1">Satyr</span>
				<span class="cell"><input type="checkbox" name="x_race_sauriman" value="1">Sauriman</span>
				<span class="cell"><input type="checkbox" name="x_race_slitheran" value="1">Slitheran</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="x_race_sprite" value="1">Sprite</span>
				<span class="cell"><input type="checkbox" name="x_race_suvart" value="1">Suvart</span>
				<span class="cell"><input type="checkbox" name="x_race_tigran" value="1">Tigran</span>
				<span class="cell"><input type="checkbox" name="x_race_troll" value="1">Troll</span>
				<span class="cell"><input type="checkbox" name="x_race_wulfan" value="1">Wulfan</span>
			</div>
		</div>
		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create"><br><br>

		<div id="div_table">
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose a SETTLEMENT NAME for this area.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Select a MAP TYPE, whether it is a City, Keep, or Village.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose your MAP WIDTH and MAP HEIGHT. This is the amount of geomorphs that will be used to make the map.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If you have your own map that you want to use, then enter the number of buildings on it in MY MAP'S BUILDINGS.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If you want every building to have citizens living in them, choose the POPULATE option. You will get citizens described in great detail.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">You can choose to CREATE Rulers, Merchants, Guilds, Guards, and Churches for your settlement. They will be randomly placed and detailed for you.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If your settlement is next to a body of water, choose the SEA SIDE option so it will make some docks for you.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Merchants will STOCK items in their stores, but they don't have to stock everything. Choosing a % of items they carry can be tweaked here, along with amounts for those items.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">You may use T&amp;T items, or the Magestykc items. The Majestykc items simplifies the armor and weapon system and is the supplement created by Wizardawn for use in T&amp;T.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">The armor and weapons that are sold can be altered on how they are displayed in stores, showing greater or less detail about them.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Lastly, select the kindred that live in this settlement. By default, all kindred shown here will live in harmony.</span>
			</div>
		</div>

		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

$map_wide = $_POST['map_wide'];
$map_high = $_POST['map_high'];
$empty = $_POST['empty'];
$built = $_POST['built'];
$oldway = $_POST['x_oldway']; // USED FOR T&T CLASSIC WEAPONS/ARMOR...OR THE SIMPLE WEAPONS/ARMOR
	if ($oldway > 0){ $_SESSION['tt_easy_items'] = 1; } else { unset($_SESSION['tt_easy_items']); }
$stock = $_POST['stock'];
$shelf = $_POST['shelf'];
$showcase1 = $_POST['showcase1'];
$showcase2 = $_POST['showcase2'];
$bottom_notices = 7;
$game = $_POST['x_package'];

$rulers = $_POST['rulers'];
$stores = $_POST['stores'];
$guilds = $_POST['guilds'];
$police = $_POST['police'];
$church = $_POST['church'];
$water = $_POST['water'];
$columns = $_POST['columns'];

$name = stripslashes($_POST['name']);

$x_race_human = $_POST['x_race_human']+0;
$x_race_brownie = $_POST['x_race_brownie']+0;
$x_race_centaur = $_POST['x_race_centaur']+0;
$x_race_cyclops = $_POST['x_race_cyclops']+0;
$x_race_daklafar = $_POST['x_race_daklafar']+0;
$x_race_dwarf = $_POST['x_race_dwarf']+0;
$x_race_dwurman = $_POST['x_race_dwurman']+0;
$x_race_elf = $_POST['x_race_elf']+0;
$x_race_fairy = $_POST['x_race_fairy']+0;
$x_race_falcoran = $_POST['x_race_falcoran']+0;
$x_race_fruglum = $_POST['x_race_fruglum']+0;
$x_race_gnome = $_POST['x_race_gnome']+0;
$x_race_goblin = $_POST['x_race_goblin']+0;
$x_race_gremlin = $_POST['x_race_gremlin']+0;
$x_race_greyling = $_POST['x_race_greyling']+0;
$x_race_hobgoblin = $_POST['x_race_hobgoblin']+0;
$x_race_hobling = $_POST['x_race_hobling']+0;
$x_race_imp = $_POST['x_race_imp']+0;
$x_race_kobold = $_POST['x_race_kobold']+0;
$x_race_leprechaun = $_POST['x_race_leprechaun']+0;
$x_race_mantaran = $_POST['x_race_mantaran']+0;
$x_race_minotaur = $_POST['x_race_minotaur']+0;
$x_race_neptar = $_POST['x_race_neptar']+0;
$x_race_ogre = $_POST['x_race_ogre']+0;
$x_race_orke = $_POST['x_race_orke']+0;
$x_race_pixie = $_POST['x_race_pixie']+0;
$x_race_rattanu = $_POST['x_race_rattanu']+0;
$x_race_satyr = $_POST['x_race_satyr']+0;
$x_race_sauriman = $_POST['x_race_sauriman']+0;
$x_race_slitheran = $_POST['x_race_slitheran']+0;
$x_race_sprite = $_POST['x_race_sprite']+0;
$x_race_suvart = $_POST['x_race_suvart']+0;
$x_race_troll = $_POST['x_race_troll']+0;
$x_race_tigran = $_POST['x_race_tigran']+0;
$x_race_wulfan = $_POST['x_race_wulfan']+0;

$x_races = $x_race_human . "_" . $x_race_brownie . "_" . $x_race_centaur . "_" . $x_race_cyclops . "_" . $x_race_daklafar . "_" . $x_race_dwarf . "_" . $x_race_dwurman . "_" . $x_race_elf . "_" . $x_race_fairy . "_" . $x_race_falcoran . "_" . $x_race_fruglum . "_" . $x_race_gnome . "_" . $x_race_goblin . "_" . $x_race_gremlin . "_" . $x_race_greyling . "_" . $x_race_hobgoblin . "_" . $x_race_hobling . "_" . $x_race_imp . "_" . $x_race_kobold . "_" . $x_race_leprechaun . "_" . $x_race_mantaran . "_" . $x_race_minotaur . "_" . $x_race_neptar . "_" . $x_race_ogre . "_" . $x_race_orke . "_" . $x_race_pixie . "_" . $x_race_rattanu . "_" . $x_race_satyr . "_" . $x_race_slitheran . "_" . $x_race_sprite . "_" . $x_race_suvart . "_" . $x_race_troll . "_" . $x_race_sauriman . "_" . $x_race_tigran . "_" . $x_race_wulfan;

if (($x_race_human == 0) && ($x_race_brownie == 0) && ($x_race_centaur == 0) && ($x_race_cyclops == 0) && ($x_race_daklafar == 0) && ($x_race_dwarf == 0) && ($x_race_dwurman == 0) && ($x_race_elf == 0) && ($x_race_fairy == 0) && ($x_race_falcoran == 0) && ($x_race_fruglum == 0) && ($x_race_gnome == 0) && ($x_race_goblin == 0) && ($x_race_gremlin == 0) && ($x_race_greyling == 0) && ($x_race_hobgoblin == 0) && ($x_race_hobling == 0) && ($x_race_imp == 0) && ($x_race_kobold == 0) && ($x_race_leprechaun == 0) && ($x_race_mantaran == 0) && ($x_race_minotaur == 0) && ($x_race_neptar == 0) && ($x_race_ogre == 0) && ($x_race_orke == 0) && ($x_race_pixie == 0) && ($x_race_rattanu == 0) && ($x_race_satyr == 0) && ($x_race_sauriman == 0) && ($x_race_slitheran == 0) && ($x_race_sprite == 0) && ($x_race_tigran == 0) && ($x_race_wulfan == 0) && ($x_race_suvart == 0) && ($x_race_troll == 0))
{$x_races = "1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1_1";}

$map_rooms = $_POST['map_rooms'];
$keyed = 1;

if ($rulers > 0)
{
	if ($map_rooms > 0)
	{
		$realm = CEIL($map_rooms/50) + FLOOR($map_rooms/50);
		$kingdom = $map_rooms/10;
	}
	else
	{
		$realm = $map_wide + $map_high;
		$kingdom = $map_wide * $map_high;
	}
	if ($kingdom >= 50){$castle = "terrain='keep_king'";}
	else if ($kingdom >= 20){$castle = "terrain='keep_prince'"; if (mt_rand(1,2) == 1){$castle = "terrain='keep_king'";}}
	else if ($kingdom >= 5){$castle = "terrain='keep_prince'"; if (mt_rand(1,2) == 1){$castle = "terrain='keep_baron'";}}
	else {$castle = "terrain='keep_baron'";}
	$place_castle = mt_rand(1,$kingdom);

	if ($kingdom >= 60){$r_m_title = "King"; $r_f_title = "Queen"; $royal_guards = mt_rand(4,9);}
	else if ($kingdom >= 50){$r_m_title = "Grand Duke"; $r_f_title = "Grand Duchess"; $royal_guards = mt_rand(4,8);}
	else if ($kingdom >= 40){$r_m_title = "Viceroy"; $r_f_title = "Vicereine"; $royal_guards = mt_rand(3,7);}
	else if ($kingdom >= 30){$r_m_title = "Archduke"; $r_f_title = "Archduchess"; $royal_guards = mt_rand(3,6);}
	else if ($kingdom >= 20){$r_m_title = "Prince"; $r_f_title = "Princess"; $royal_guards = mt_rand(2,5);}
	else if ($kingdom >= 10){$r_m_title = "Duke"; $r_f_title = "Duchess"; $royal_guards = mt_rand(2,4);}
	else if ($kingdom >= 5){$r_m_title = "Count"; $r_f_title = "Countess"; $royal_guards = mt_rand(1,3);}
	else {$r_m_title = "Baron"; $r_f_title = "Baroness"; $royal_guards = 1;}
}

if ($map_rooms > 0){$key = $map_rooms;} else {

if ($water > 0){$dock = mt_rand(1,4);}

if ($built == "Keep")
{
	$making_kingdom = 1;
	if ($dock == 1){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain LIKE 'keep%' OR image='keep_d_01.jpg') AND more!='G'";}
	else if ($dock == 2){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain LIKE 'keep%' OR image='keep_d_02.jpg') AND more!='G'";}
	else if ($dock == 3){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain LIKE 'keep%' OR image='keep_d_03.jpg') AND more!='G'";}
	else if ($dock == 4){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain LIKE 'keep%' OR image='keep_d_04.jpg') AND more!='G'";}
	else {$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "terrain='city'";}

	$terra9 = "terrain='city' AND spot=''";
	$terraZ = "terrain='keep' AND more='G'";
}
else if ($built == "Village")
{
	$castle = "terrain='village_ruler'";
	$r_m_title = "Lord";
	$r_f_title = "Lady";
	$royal_guards = 1;
	$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = $terra9 = $terraZ = "terrain='village'";
}
else
{
	if ($dock == 1){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain='city' OR image='citdock_4.gif')";}
	else if ($dock == 2){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain='city' OR image='citdock_2.gif')";}
	else if ($dock == 3){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain='city' OR image='citdock_1.gif')";}
	else if ($dock == 4){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain='city' OR image='citdock_3.gif')";}
	else {$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "terrain='city'";}

	$terra9 = "terrain='city' AND spot=''";
	$terraZ = "terrain='keep' AND more='G'";
}
		include("functions/map_draw.php");?>

<?php } ?>

<hr><font size="6"><?php echo $name; ?></font>

<?php 

$shoptq = "CREATE TEMPORARY TABLE shop_track (building INT(20) NOT NULL, owner VARCHAR(250) NOT NULL, shop INT(2) NOT NULL, type VARCHAR(100) NOT NULL, info LONGTEXT NOT NULL, stats LONGTEXT NOT NULL, gender VARCHAR(10) NOT NULL, didit INT(1) NOT NULL, race VARCHAR(20) NOT NULL)";
wz_query( $connection, $shoptq ); /*shoptq*/

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($rulers > 0){ echo "<br><div style='page-break-after: always; height:1px;'>&nbsp;</div>";
		echo "<img src='pics_tools/wtown_02.jpg'><br><font size='2'>The prominent figures in the local government are listed below. The royal vault contents are also listed.</font><hr>";

	if (mt_rand(1,4) > 1)
	{
		$royal_title = $r_m_title;
		$remp_gender = "Male";
		echo "<font size='2'><b>" . strtoupper($royal_title) . ":</b> <i>[Warrior]</i> "; 
		$equipment = TTequipCitizen(warrior);
		$weaponsize = "medium";
		$remp_kindred = TTRace($x_races);
		$remp_citizen = TTCitizen($remp_kindred,adult,$remp_gender,leader_warrior,$game);
		echo $remp_citizen[2] . " <b>ARMS&nbsp;&amp;&nbsp;ARMOR:</b> " . strtolower(TTgetWeapon($weaponsize)) . ", " . $equipment[0] . ", " . $equipment[1] . "</font>";
			$royal_title = $r_f_title;
			$remp_gender = "Female";
			switch (mt_rand(0,2))
			{
				case 0:	$royal_class = "wizard";	break;
				case 1:	$royal_class = "warrior";	break;
				case 2:	$royal_class = "rogue";		break;
			}
			echo "<hr color='#C0C0C0' size='1'><font size='2'><b>" . strtoupper($royal_title) . ":</b> <i>[" . ucfirst($royal_class) . "]</i> "; 
			$equipment = TTequipCitizen($royal_class);
			$weaponsize = "small";
			$remp_kindred = TTRace($x_races);
			$remp_citizen = TTCitizen($remp_citizen[1],adult,$remp_gender,$royal_class,$game);
			echo $remp_citizen[2] . " <b>ARMS&nbsp;&amp;&nbsp;ARMOR:</b> " . strtolower(TTgetWeapon($weaponsize)) . ", " . $equipment[0] . ", " . $equipment[1] . "</font>";
	}
	else
	{
		if (mt_rand(1,3) > 1){$royal_title = $r_m_title; $remp_gender = "Male";}
		else {$royal_title = $r_f_title; $remp_gender = "Female";}
		echo "<font size='2'><b>" . strtoupper($royal_title) . ":</b> <i>[Warrior]</i> "; 
		$equipment = TTequipCitizen(warrior);
		$weaponsize = "small";
		$remp_kindred = TTRace($x_races);
		$remp_citizen = TTCitizen($remp_kindred,adult,$remp_gender,warrior,$game);
		echo $remp_citizen[2] . " <b>ARMS&nbsp;&amp;&nbsp;ARMOR:</b> " . strtolower(TTgetWeapon($weaponsize)) . ", " . $equipment[0] . ", " . $equipment[1] . "</font>";
	}
		$riches = "";
			$rich_limits = mt_rand(($realm+10),($realm+20));
			$riches = "<hr color='#C0C0C0' size='1'><b>ROYAL VAULT:</b> ";
			while ($rich_limits > 0) :
				$my_reward = mt_rand(1,100);
				if ($my_reward > 60){$my_prize = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator(mt_rand(10,100)));}
				else if ($my_reward > 20){$my_prize = "JEWELRY:&nbsp;" . ucwords(jewelCreator(mt_rand(10,100)));}
				else { $my_prize = makeMagicItem(mt_rand(1,20),3,0,$game,1,100); }
					$riches = $riches . $my_prize . "&nbsp;---&nbsp;";
				$rich_limits = $rich_limits - 1;
			endwhile;
			$riches = $riches . currencyBuilder($realm,3,0,100,1,$game) . "";
		echo "<font size='2'>" . $riches . "</font>";

		if ($realm >= mt_rand(1,20))
		{
			echo "<hr color='#C0C0C0' size='1'><font size='2'><b>ROYAL WIZARD:</b>  <i>[Wizard]</i> "; 
			$equipment = TTequipCitizen(wizard);
			$weaponsize = "small";
			$remp_kindred = TTRace($x_races);
			$remp_gender = "Male"; if (mt_rand(1,2) == 1){$remp_gender = "Female";}
			$remp_citizen = TTCitizen($remp_kindred,adult,$remp_gender,leader_wizard,$game);
			echo $remp_citizen[2] . " <b>ARMS&nbsp;&amp;&nbsp;ARMOR:</b> " . strtolower(TTgetWeapon($weaponsize)) . ", " . $equipment[0] . ", " . $equipment[1] . "</font>";
		}
		if ($realm >= mt_rand(1,15))
		{
			echo "<hr color='#C0C0C0' size='1'><font size='2'><b>ROYAL SPY:</b>  <i>[Rogue]</i> "; 
			$equipment = TTequipCitizen(rogue);
			$weaponsize = "medium";
			$remp_kindred = TTRace($x_races);
			$remp_gender = "Male"; if (mt_rand(1,2) == 1){$remp_gender = "Female";}
			$remp_citizen = TTCitizen($remp_kindred,adult,$remp_gender,leader_rogue,$game);
			echo $remp_citizen[2] . " <b>ARMS&nbsp;&amp;&nbsp;ARMOR:</b> " . strtolower(TTgetWeapon($weaponsize)) . ", " . $equipment[0] . ", " . $equipment[1] . "</font>";
		}
		if ($realm >= mt_rand(1,5))
		{
			if ((mt_rand(1,2) == 1) && ($police > 0)){$royal_title = "CAPTAIN OF THE GUARDS";} else {$royal_title = "SHERIFF";}
			echo "<hr color='#C0C0C0' size='1'><font size='2'><b>" . $royal_title . ":</b>  <i>[Warrior]</i> "; 
			$equipment = TTequipCitizen(warrior);
			$weaponsize = "giant";
			$remp_kindred = TTRace($x_races);
			$remp_gender = "Male"; if (mt_rand(1,2) == 1){$remp_gender = "Female";}
			$remp_citizen = TTCitizen($remp_kindred,adult,$remp_gender,leader_warrior,$game);
			echo $remp_citizen[2] . " <b>ARMS&nbsp;&amp;&nbsp;ARMOR:</b> " . strtolower(TTgetWeapon($weaponsize)) . ", " . $equipment[0] . ", " . $equipment[1] . "</font>";
		}
		if ($police > 0)
		{
			while ($royal_guards > 0) :
				echo "<hr color='#C0C0C0' size='1'><font size='2'><b>ROYAL GUARD:</b> "; 
				$equipment = TTequipCitizen(warrior);
				$weaponsize = "giant";
				$remp_kindred = TTRace($x_races);
				$remp_gender = "Male"; if (mt_rand(1,2) == 1){$remp_gender = "Female";}
				$remp_citizen = TTCitizen($remp_kindred,adult,$remp_gender,warrior,$game);
				echo $remp_citizen[2] . " <b>ARMS&nbsp;&amp;&nbsp;ARMOR:</b> " . strtolower(TTgetWeapon($weaponsize)) . ", " . $equipment[0] . ", " . $equipment[1] . "</font>";
				$royal_guards = $royal_guards - 1;
			endwhile;
		}
} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($empty != 1)
{ 
	while ($key > 0) : $city_size = $city_size + 1;
		$kindred = TTRace($x_races);
		$gender = "Male"; if (mt_rand(1,2) == 1){$gender = "Female";}
		$citizen = TTCitizen($kindred,adult,$gender,citizen,$game);
		$dwell = $dwell + 1;
		$shopinq = "INSERT INTO shop_track (building, owner, info, stats, gender, race, shop, type, didit) VALUES ('$dwell', '$citizen[3]', '$citizen[2]', '$citizen[4]', '$citizen[0]', '$citizen[1]', '0', '', '0')";
		wz_query( $connection, $shopinq ); /*shopinq*/
		$key = $key - 1;
	endwhile;
}
else
{
	echo "<br><div style='page-break-after: always; height:1px;'>&nbsp;</div>"; ?>

	<img src="pics_tools/wtown_01.jpg"><br><font size="2">This settlement has all of the citizens listed below. Each group of citizens are associated with a building <?php if ($map_rooms > 0){echo "number";} else {echo "numbered on the map above"; } ?>.

	<?php while ($key > 0) : $city_size = $city_size + 1;

	if (mt_rand(1,100) > 90)
	{ ?>
		<hr><b><i><font size="3"><?php $dwell = $dwell + 1; echo $dwell; ?></font></i></b><font size="2">&nbsp;-&nbsp;This building is empty.</font><?php
	}
	else
	{
		$kindred = TTRace($x_races);
		$gender = "Male"; if (mt_rand(1,2) == 1){$gender = "Female";}
		$citizen = TTCitizen($kindred,adult,$gender,citizen,$game);
		$dwell = $dwell + 1;
		echo "<hr><b><i><font size='3'>" . $dwell . "</font></i></b><font size='2'>&nbsp;-&nbsp;" . $citizen[2] . "</font>";

		$shopinq = "INSERT INTO shop_track (building, owner, info, stats, gender, race, shop, type, didit) VALUES ('$dwell', '$citizen[3]', '$citizen[2]', '$citizen[4]', '$citizen[0]', '$citizen[1]', '0', '', '0')";
		wz_query( $connection, $shopinq ); /*shopinq*/

		if (mt_rand(1,100) > 50){ if ($citizen[0] == "Male"){$gend = "Female";} else {$gend = "Male";}     $citizen = TTCitizen($citizen[1],adult,$gend,citizen,$game); ?>
			<hr color='#C0C0C0' size='1'><font size="2">&nbsp;-&nbsp;-&nbsp;<?php echo $citizen[2]; ?></font><?php } 

		if (mt_rand(1,100) > 70){ $gend = "Male"; if (mt_rand(1,2) == 1){$gend = "Female";} $citizen = TTCitizen($citizen[1],child,$gend,citizen,$game); ?>
			<hr color='#C0C0C0' size='1'><font size="2">&nbsp;-&nbsp;-&nbsp;-&nbsp;<?php echo $citizen[2]; ?></font><?php } 

		if (mt_rand(1,100) > 90){ $gend = "Male"; if (mt_rand(1,2) == 1){$gend = "Female";} $citizen = TTCitizen($citizen[1],child,$gend,citizen,$game); ?>
			<hr color='#C0C0C0' size='1'><font size="2">&nbsp;-&nbsp;-&nbsp;-&nbsp;<?php echo $citizen[2]; ?></font><?php } 
	}
	$key = $key - 1; endwhile;
}

if ($stores > 0) ////////////////// STORES ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	$shckkq = "SELECT * FROM shop_track WHERE shop=0";
	$shckkr = wz_query( $connection, $shckkq ); /*shckkq*/
	$shckkn = wz_num_rows($shckkr);

	if ($shckkn > 0)
	{
		echo "<br><div style='page-break-after: always; height:1px;'>&nbsp;</div>"; ?>

		<img src="pics_tools/wtown_06.jpg"><br><font size="2">
		Merchants are displayed in what building they are in.&nbsp; There is also an owner along with a possible list of items one may 
		obtain from them.&nbsp; Merchants will indicate how much gold is stored somewhere in the vicinity.&nbsp; This gold can be referenced for possible 
		theft, or simply how much they can possibly negotiate with if characters attempt to sell items.
		<?php if ($shelf > 0){?>&nbsp; Some items have an "In Stock" value.&nbsp; This number is how many, of that item, the merchant will have restocked every month.&nbsp; If only "3" of an item are available, and the characters buy all "3", then the merchant will not get another "3" until the next month.<?php } ?>
		</font>

		<?php $doneit = 1;
		include("functions/fantasy_stores_tt.php");
	} 
} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($guilds > 0) ////////////////// GUILDS ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	$shckkq = "SELECT * FROM shop_track WHERE shop=0";
	$shckkr = wz_query( $connection, $shckkq ); /*shckkq*/
	$shckkn = wz_num_rows($shckkr);

	if ($shckkn > 0)
	{
		echo "<br><div style='page-break-after: always; height:1px;'>&nbsp;</div>"; ?>
		<img src="pics_tools/wtown_07.jpg"><br><font size="2">Each guild has a guild master and members listed.</font>
		<?php $doneit = 2; include("functions/fantasy_stores_tt.php");
	}
} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($police > 0) ////////////////// GUARDS ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	$shckkq = "SELECT * FROM shop_track WHERE shop=0";
	$shckkr = wz_query( $connection, $shckkq ); /*shckkq*/
	$shckkn = wz_num_rows($shckkr);

	if ($shckkn > 0)
	{
		echo "<br><div style='page-break-after: always; height:1px;'>&nbsp;</div>"; ?>
		<img src="pics_tools/wtown_03.jpg"><br><font size="2">Guards are trained fighters hired to protect the city. Each guardhouse is listed below, along with the guards that live there.</font>
		<?php $doneit = 3; include("functions/fantasy_stores_tt.php");
	}
} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($church > 0) ////////////////// CHURCH ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	$shckkq = "SELECT * FROM shop_track WHERE shop=0";
	$shckkr = wz_query( $connection, $shckkq ); /*shckkq*/
	$shckkn = wz_num_rows($shckkr);

	if ($shckkn > 0)
	{
		echo "<br><div style='page-break-after: always; height:1px;'>&nbsp;</div>"; ?>
		<img src="pics_tools/wtown_04.jpg"><br><font size="2">Churches not only provide a place of worship, but also divine services of healing and resurrection.</font>
		<?php $doneit = 4; include("functions/fantasy_stores_tt.php");
	}
}

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>