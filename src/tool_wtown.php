<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "OSRIC";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' target='_blank' method='POST' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	include("game_options.php");

	if ( $x_game == "AD&D"){ $tgame = "AD&amp;D"; } else { $tgame = "OSRIC&trade;"; }

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Fantasy Settlements</p>";
	echo "<p style='text-align: justify;'>Here you can generate a random " . $tgame . " settlement based off of geomorphs created by <a href='http://www.risusmonkey.com/' target='_blank'>Risus Monkey</a> or you can create a village based off of geomorphs created by <a target='_blank' href='http://stonewerks.wordpress.com/'>Stonewerks</a>. Simply pick the below criteria for the settlement you want to generate.";

	echo "<input type='hidden' value='" . $x_game . "' name='x_game'>";

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
				<span class="cell"><input type="checkbox" id="InputOption" name="empty" value="1"><br><input type="checkbox" checked id="InputOption" name="dress" value="1">Dress The Citizens<br><input type="checkbox" checked id="InputOption" name="possessions" value="1">Citizens Carry Items</span>
			</div>
			<div class="row">
				<span class="cell">Create:</span>
				<span class="cell"><input type="checkbox" checked id="InputOption" name="ruler" value="1">Rulers<br>
									<input type="checkbox" checked id="InputOption" name="stores" value="1">Merchants...with single column store lists <input type="checkbox" name="columns" value="1"><br>
									<input type="checkbox" checked id="InputOption" name="banks" value="1">Banks<br>
									<input type="checkbox" checked id="InputOption" name="guilds" value="1">Guilds<br>
									<input type="checkbox" checked id="InputOption" name="police" value="1">Guards<br>
									<input type="checkbox" checked id="InputOption" name="church" value="1">Churches</span>
			</div>
			<div class="row">
				<span class="cell">Stock:</span>
				<span class="cell"><select size="1" id="DropOption" name="stock"><option>70</option>
					<?php $runner=20; $running=0; while ($runner > 0) : $running = $running+5; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select> % Items To Stock</span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="shelf" checked value="1">&nbsp;Merchant Only Stocks So Much Of Each Item</span>
			</div>
			<div class="row">
				<span class="cell">Major NPC Levels:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_lvl1"><option>1</option><?php $runner=19; $running=1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>&nbsp;&nbsp;to&nbsp;&nbsp;
					<select size="1" id="DropOption" name="x_lvl2"><option>20</option><?php $runner=20; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cell">Dominant Race:</span>
				<span class="cell">
				<select size="1" id="DropOption" name="race">
					<option>Any</option>
					<option>Dwarf</option>
					<option>Elf</option>
					<option>Gnome</option>
					<option>Halfling</option>
					<option>Human</option>
				</select>
				</span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><select size="1" id="DropOption" name="race_part"><?php $runner=100; $running=101; while ($runner > 0) : $running = $running-1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> % Dominant Race Lives In The Settlement</span>
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
				<span class="cxll">If you want every building to have citizens living in them, choose the POPULATE option. You will get citizens described in great detail, especially if you choose to dress them and have them carry some items.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">You can choose to CREATE Rulers, Merchants, Banks, Guilds, Guards, and Churches for your settlement. They will be randomly placed and detailed for you.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Merchants will STOCK items in their stores, but they don't have to stock everything. Choosing a % of items they carry can be tweaked here, along with amounts for those items.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">You can set the range in MAJOR NPC LEVELS. These are levels of the rulers of the settlement, guild members, etc.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Select the DOMINANT RACE that lives in this settlement.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">How much does this race dominate the settlement? Is it 100% human? Is it 50% dwarf and 50% halfling? You can tweak that as well.</span>
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
$might1 = $_POST['might1']+0;	if ($might1 > 0){} else {$might1 = 1;}
$might2 = $_POST['might2']+0;	if ($might2 > 0){} else {$might2 = 8;}

$game = $_POST['x_game'];

if ($game == "OSRIC")
{
	$bottom_notices = 1;
}
else if ($game == "AD&D")
{
	$bottom_notices = 13;
}

$x_lvl1 = $_POST['x_lvl1'];
$x_lvl2 = $_POST['x_lvl2'];
	if ($x_lvl1 > $x_lvl2){$x_lvl1 = $x_lvl2;}

$columns = $_POST['columns'];
$name = stripslashes($_POST['name']);
$dres = $_POST['dress'];
$stores = $_POST['stores'];
$ruler = $_POST['ruler'];
$guilds = $_POST['guilds'];
$banks = $_POST['banks'];
$guardz = $_POST['guards'];
$church = $_POST['church'];
$stock = $_POST['stock'];
$shelf = $_POST['shelf'];
$poss = $_POST['possessions'];
$built = $_POST['built'];

$xrace = $_POST['race'];
$xracep = $_POST['race_part'];
	if ($xrace == "Any"){$xrace = ""; $xracep = 0;}

$map_rooms = $_POST['map_rooms'];
$keyed = 1;

if ($ruler > 0)
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
	$realm = $map_wide + $map_high;
	$kingdom = $map_wide * $map_high;
	if ($kingdom >= 50){$castle = "terrain='keep_king'";}
	else if ($kingdom >= 20){$castle = "terrain='keep_prince'"; if (mt_rand(1,2) == 1){$castle = "terrain='keep_king'";}}
	else if ($kingdom >= 5){$castle = "terrain='keep_prince'"; if (mt_rand(1,2) == 1){$castle = "terrain='keep_baron'";}}
	else {$castle = "terrain='keep_baron'";}
	$place_castle = mt_rand(1,$kingdom);

	if ($kingdom >= 60){$r_m_title = "King"; $r_f_title = "Queen"; $royal_guards = 1; $royal_guards = mt_rand(4,9);}
	else if ($kingdom >= 50){$r_m_title = "Grand Duke"; $r_f_title = "Grand Duchess"; $royal_guards = mt_rand(4,8);}
	else if ($kingdom >= 40){$r_m_title = "Viceroy"; $r_f_title = "Vicereine"; $royal_guards = mt_rand(3,7);}
	else if ($kingdom >= 30){$r_m_title = "Archduke"; $r_f_title = "Archduchess"; $royal_guards = mt_rand(3,6);}
	else if ($kingdom >= 20){$r_m_title = "Prince"; $r_f_title = "Princess"; $royal_guards = mt_rand(2,5);}
	else if ($kingdom >= 10){$r_m_title = "Duke"; $r_f_title = "Duchess"; $royal_guards = mt_rand(2,4);}
	else if ($kingdom >= 5){$r_m_title = "Count"; $r_f_title = "Countess"; $royal_guards = mt_rand(1,3);}
	else {$r_m_title = "Baron"; $r_f_title = "Baroness"; $royal_guards = 1;}
}

if ($map_rooms > 0){$key = $map_rooms;} else {

if ($built == "Keep")
{
	$making_kingdom = 1;
	$dock = mt_rand(1,4);
	if ($dock == 1){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain LIKE 'keep%' OR image='keep_d_01.jpg') AND more!='G'";}
	else if ($dock == 2){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain LIKE 'keep%' OR image='keep_d_02.jpg') AND more!='G'";}
	else if ($dock == 3){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain LIKE 'keep%' OR image='keep_d_03.jpg') AND more!='G'";}
	else {$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain LIKE 'keep%' OR image='keep_d_04.jpg') AND more!='G'";}

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
	$dock = mt_rand(1,4);
	if ($dock == 1){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain='city' OR image='citdock_4.gif')";}
	else if ($dock == 2){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain='city' OR image='citdock_2.gif')";}
	else if ($dock == 3){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain='city' OR image='citdock_1.gif')";}
	else {$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain='city' OR image='citdock_3.gif')";}

	$terra9 = "terrain='city' AND spot=''";
	$terraZ = "terrain='keep' AND more='G'";
}
		include("functions/map_draw.php");?>

<?php } ?>

<hr><font size="6"><?php echo $name; ?></font>

<?php 

$shoptq = "CREATE TEMPORARY TABLE shop_track (building INT(20) NOT NULL, owner VARCHAR(250) NOT NULL, shop INT(2) NOT NULL, type VARCHAR(100) NOT NULL, info LONGTEXT NOT NULL, stats LONGTEXT NOT NULL, gender VARCHAR(10) NOT NULL, didit INT(1) NOT NULL)";
wz_query( $connection, $shoptq ); /*shoptq*/

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($ruler > 0){ echo "<br><div style='page-break-after: always; height:1px;'>&nbsp;</div>";
		echo "<img src='pics_tools/wtown_02.jpg'><br><font size='2'>The prominent figures in the local government are listed below. They have extra gear listed in case they accompany a group of adventurers. The royal vault contents are also listed.</font><hr>";

	if ($xracep >= mt_rand(1,100)){$royal_race = $xrace;} else {$royal_race = "none";}

	if (mt_rand(1,4) > 1)
	{
		$royal_title = $r_m_title; $royal_gender = "Male";
		$dude = makeAdventurer(Fighter,$royal_race,0,$x_lvl2,$x_lvl2,1,$royal_gender);
		$adv_list_tp = 1;
			echo "<font size='2'><b>" . strtoupper($royal_title) . ":</b> "; 
				include("functions/stat_adventurer.php");
			echo "</font>";
		$royal_title = $r_f_title; $royal_gender = "Female";
		if (($p_race == "Half-Elf") || ($p_race == "Half-Orc")){$royal_race = "Human";} else {$royal_race = $p_race;}
		$dude = makeAdventurer(0,$royal_race,0,$x_lvl1,$x_lvl2,1,$royal_gender);
		$adv_list_tp = 1;
			echo "<hr color='#C0C0C0' size='1'><font size='2'><b>" . strtoupper($royal_title) . ":</b> "; 
				include("functions/stat_adventurer.php");
			echo "</font>";
	}
	else
	{
		if (mt_rand(1,3) > 1){$royal_title = $r_m_title; $royal_gender = "Male";} else {$royal_title = $r_f_title; $royal_gender = "Female";}
		$dude = makeAdventurer(Fighter,$royal_race,0,$x_lvl2,$x_lvl2,1,$royal_gender);
		$adv_list_tp = 1;
			echo "<font size='2'><b>" . strtoupper($royal_title) . ":</b> "; 
				include("functions/stat_adventurer.php");
			echo "</font>";
	}
				$riches = "";
					$rich_limits = mt_rand(($realm+10),($realm+20));
					$riches = "<hr color='#C0C0C0' size='1'><b>ROYAL VAULT:</b> ";
					while ($rich_limits > 0) :
						$my_reward = mt_rand(1,100);
						if ($my_reward > 60){$my_prize = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator(mt_rand(10,100)));}
						else if ($my_reward > 20){$my_prize = "JEWELRY:&nbsp;" . ucwords(jewelCreator(mt_rand(10,100)));}
						else {$my_prize = OsricMagicItem('',1,'',0,0); $my_prize = $my_prize[0]; }
							$riches = $riches . $my_prize . "&nbsp;---&nbsp;";
						$rich_limits = $rich_limits - 1;
					endwhile;
					$riches = $riches . currencyBuilder($realm,3,0,100,1,$game) . "";
				echo "<font size='2'>" . $riches . "</font>";

		if ($realm >= mt_rand(1,20))
		{
			if ($xracep >= mt_rand(1,100)){$royal_race = $xrace;} else {$royal_race = "none";}
			if (mt_rand(1,4) > 1){$royal_wizard = "Magic-User";} else {$royal_wizard = "Illusionist";}
			$dude = makeAdventurer($royal_wizard,$royal_race,0,$x_lvl1,$x_lvl2,1,0);
			$adv_list_tp = 1;
				echo "<hr color='#C0C0C0' size='1'><font size='2'><b>ROYAL WIZARD:</b> "; 
					include("functions/stat_adventurer.php");
				echo "</font>";
		}
		if ($realm >= mt_rand(1,20))
		{
			if ($xracep >= mt_rand(1,100)){$royal_race = $xrace;} else {$royal_race = "none";}
			$dude = makeAdventurer(Thief,$royal_race,0,$x_lvl1,$x_lvl2,1,0);
			$adv_list_tp = 1;
				echo "<hr color='#C0C0C0' size='1'><font size='2'><b>ROYAL JESTER:</b> "; 
					include("functions/stat_adventurer.php");
				echo "</font>";
		}
		if ($realm >= mt_rand(1,15))
		{
			if ($xracep >= mt_rand(1,100)){$royal_race = $xrace;} else {$royal_race = "none";}
			$dude = makeAdventurer(Assassin,$royal_race,0,$x_lvl1,$x_lvl2,1,0);
			$adv_list_tp = 1;
				echo "<hr color='#C0C0C0' size='1'><font size='2'><b>ROYAL SPY:</b> "; 
					include("functions/stat_adventurer.php");
				echo "</font>";
		}
		if ($realm >= mt_rand(1,5))
		{
			if ($xracep >= mt_rand(1,100)){$royal_race = $xrace;} else {$royal_race = "none";}
			if ((mt_rand(1,2) == 1) && ($guardz > 0)){$royal_title = "CAPTAIN OF THE GUARDS";} else {$royal_title = "SHERIFF";}
			if (mt_rand(1,4) > 1){$royal_cop = "Fighter";} else {$royal_cop = "Paladin";}
			$dude = makeAdventurer($royal_cop,$royal_race,0,$x_lvl2,$x_lvl2,1,0);
			$adv_list_tp = 1;
				echo "<hr color='#C0C0C0' size='1'><font size='2'><b>" . $royal_title . ":</b> "; 
					include("functions/stat_adventurer.php");
				echo "</font>";
		}
		if ($guardz > 0)
		{
			while ($royal_guards > 0) :
				if ($xracep >= mt_rand(1,100)){$racy = $xrace;} else {$racy = "none";}
				$dude = makeAdventurer(Fighter,$racy,0,$x_lvl1,$x_lvl2,1,0);
				$adv_list_tp = 1;
					echo "<hr color='#C0C0C0' size='1'><font size='2'><b>ROYAL GUARD:</b> "; 
						include("functions/stat_adventurer.php");
					echo "</font>";
				$royal_guards = $royal_guards - 1;
			endwhile;
		}
} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($empty != 1)
{ 
	while ($key > 0) : $city_size = $city_size + 1;
		if ($xracep >= mt_rand(1,100)){$racy = $xrace;} else {$racy = "none";}
		$citizen = wizardCitizen($game,$racy,$might1,$might2,$dres,$poss,adult,none);
		$dwell = $dwell + 1;
		$shopinq = "INSERT INTO shop_track (building, owner, info, stats, gender, shop, type, didit) VALUES ('$dwell', '$citizen[3]', '$citizen[2]', '$citizen[4]', '$citizen[0]', '0', '', '0')";
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
		if ($xracep >= mt_rand(1,100)){$racy = $xrace;} else {$racy = "none";} $citizen = wizardCitizen($game,$racy,$might1,$might2,$dres,$poss,adult,none); ?>
		<hr><b><i><font size="3"><?php $dwell = $dwell + 1; echo $dwell; ?></font></i></b><font size="2">&nbsp;-&nbsp;<?php echo $citizen[2]; ?></font><?php

		$shopinq = "INSERT INTO shop_track (building, owner, info, stats, gender, shop, type, didit) VALUES ('$dwell', '$citizen[3]', '$citizen[2]', '$citizen[4]', '$citizen[0]', '0', '', '0')";
		wz_query( $connection, $shopinq ); /*shopinq*/

		if (mt_rand(1,100) > 50){$citizen = wizardCitizen($game,$citizen[1],$might1,$might2,$dres,$poss,adult,$citizen[0]); ?>
			<hr color='#C0C0C0' size='1'><font size="2">&nbsp;-&nbsp;-&nbsp;<?php echo $citizen[2]; ?></font><?php } 

		if (mt_rand(1,100) > 70){$citizen = wizardCitizen($game,$citizen[1],$might1,$might2,$dres,$poss,child,$citizen[0]); ?>
			<hr color='#C0C0C0' size='1'><font size="2">&nbsp;-&nbsp;-&nbsp;-&nbsp;<?php echo $citizen[2]; ?></font><?php } 

		if (mt_rand(1,100) > 90){$citizen = wizardCitizen($game,$citizen[1],$might1,$might2,$dres,$poss,child,$citizen[0]); ?>
			<hr color='#C0C0C0' size='1'><font size="2">&nbsp;-&nbsp;-&nbsp;-&nbsp;<?php echo $citizen[2]; ?></font><?php } 
	}
	$key = $key - 1; endwhile;
}

if ($stores > 0){ 
			$shckkq = "SELECT * FROM shop_track WHERE shop=0";
			$shckkr = wz_query( $connection, $shckkq ); /*shckkq*/
			$shckkn = wz_num_rows($shckkr); if ($shckkn > 0){
echo "<br><div style='page-break-after: always; height:1px;'>&nbsp;</div>"; ?>

<img src="pics_tools/wtown_06.jpg"><br><font size="2">
Merchants are displayed in what building they are in.&nbsp; There is also an owner along with a possible list of items one may 
obtain from them.&nbsp; Merchants will indicate how much gold is stored somewhere in the vicinity.&nbsp; This gold can be referenced for possible 
theft, or simply how much they can possibly negotiate with if characters attempt to sell items.
<?php if ($shelf > 0){?>&nbsp; Some items have a [#] indicated.&nbsp; This number is how many, of that item, the merchant will have restocked every month.&nbsp; If only [3] of an item are available, and the characters buy all [3], then the merchant will not get another [3] until the next month.<?php } ?>
</font>

<?php $doneit = 1; include("functions/fantasy_stores_osric.php"); } 
			} $shckkq = "SELECT * FROM shop_track WHERE shop=0";
			$shckkr = wz_query( $connection, $shckkq ); /*shckkq*/
			$shckkn = wz_num_rows($shckkr); if ($shckkn > 0){
?>

<?php if ($guilds > 0){ echo "<br><div style='page-break-after: always; height:1px;'>&nbsp;</div>"; ?>
<img src="pics_tools/wtown_07.jpg"><br><font size="2">Each guild has a guild master and members listed. Their statistic values do not take into account any magical items, skills, or abilities they may have. They have extra gear listed in case they accompany a group of adventurers.</font>
<?php $doneit = 2; include("functions/fantasy_stores_osric.php"); }
			} $shckkq = "SELECT * FROM shop_track WHERE shop=0";
			$shckkr = wz_query( $connection, $shckkq ); /*shckkq*/
			$shckkn = wz_num_rows($shckkr); if ($shckkn > 0){
?>

<?php if ($banks > 0){ echo "<br><div style='page-break-after: always; height:1px;'>&nbsp;</div>"; ?>
<img src="pics_tools/wtown_05.jpg"><br><font size="2">Banks can be used to store various riches. Each bank has some guards on duty at all times with extra gear listed in case they accompany a group of adventurers. Each chest has the valuables listed along with the amount of gold the bank keeps on hand.</font>
<?php $doneit = 3; include("functions/fantasy_stores_osric.php"); }
			} $shckkq = "SELECT * FROM shop_track WHERE shop=0";
			$shckkr = wz_query( $connection, $shckkq ); /*shckkq*/
			$shckkn = wz_num_rows($shckkr); if ($shckkn > 0){
?>

<?php if ($guardz > 0){ echo "<br><div style='page-break-after: always; height:1px;'>&nbsp;</div>"; ?>
<img src="pics_tools/wtown_03.jpg"><br><font size="2">Guards are trained fighters hired to protect the city. Each guardhouse is listed below, along with the guards that live there. They have extra gear listed in case they accompany a group of adventurers.</font>
<?php $doneit = 4; include("functions/fantasy_stores_osric.php"); }
			} $shckkq = "SELECT * FROM shop_track WHERE shop=0";
			$shckkr = wz_query( $connection, $shckkq ); /*shckkq*/
			$shckkn = wz_num_rows($shckkr); if ($shckkn > 0){
?>

<?php if ($church > 0){ echo "<br><div style='page-break-after: always; height:1px;'>&nbsp;</div>"; ?>
<img src="pics_tools/wtown_04.jpg"><br><font size="2">Churches not only provide a place of worship, but also divine services of healing and resurrection. The church members' statistic values do not take into account any magical items, skills, or abilities they may have. They have extra gear listed in case they accompany a group of adventurers.</font>
<?php $doneit = 5; include("functions/fantasy_stores_osric.php"); } }

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>