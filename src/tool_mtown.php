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

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Mutant Settlements</p>";
	echo "<p style='text-align: justify;'>Here you can generate a random mutant settlement based off of geomorphs created by <a href='http://www.risusmonkey.com/' target='_blank'>Risus Monkey</a>, a village based off of geomorphs created by <a target='_blank' href='http://stonewerks.wordpress.com/'>Stonewerks</a>, or a ruined city with geomorphs by Amanda Michaels. Simply pick the below criteria for the settlement you want to generate.";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_game'>";
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cell">Settlement Name:</span>
				<span class="cell"><input type="text" id="InputOption" name="name" size="25"></span>
			</div>
			<div class="row">
				<span class="cell">Map Style:</span>
				<span class="cell">
					<select size="1" id="DropOption" name="use_maps">
						<option value="0">New City</option>
						<option value="2">New Village</option>
						<option value="1">Ruined City</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Currency:</span>
				<span class="cell"><input type="text" value="<?php echo $cash; ?>" id="InputOption" name="money" size="4"> ...abbreviated (gp, $, xm)</span>
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
				</select> ...or use your own map...</span>
			</div>
			<div class="row">
				<span class="cell">My Map's Buildings:</span>
				<span class="cell"><select size="1" id="DropOption" name="map_rooms"><option></option>
					<?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select></span>
			</div>
			<div class="row">
				<span class="cell">Populate:</span>
				<span class="cell"><input type="checkbox" checked id="InputOption" name="empty" value="1">Fills Houses With Citizens</span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" checked id="InputOption" name="dress" value="1">Dress Your Citizens</span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" checked id="InputOption" name="possessions" value="1">Citizens Carry A Few Items</span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="dose" value="1">Citizens Are Even More Mutated</span>
			</div>
			<div class="row">
				<span class="cell">Create Stores:</span>
				<span class="cell"><input type="checkbox" checked id="InputOption" name="stores" value="1"></span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="shelf" checked value="1">Merchant Only Stocks So Much Of Each Item</span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><select size="1" id="DropOption" name="stock"><option>70</option>
					<?php $runner=20; $running=0; while ($runner > 0) : $running = $running+5; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select>&nbsp;% Items To Stock</span>
			</div>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell">
					<select size="1" id="DropOption" name="techy">
					<option value="0">High/Low Tech</option>
					<option value="1">Low Tech</option>
					<option value="2">High Tech</option>
					</select>&nbsp;Stores Have More Modern Items
				</span>
			</div>
			<div class="row">
				<span class="cell">Officials:</span>
				<span class="cell"><input type="checkbox" checked id="InputOption" name="law" value="1">Rulers & Law Enforcement</span>
			</div>
		<?php if ($x_game == "Broken Urthe") { ?>
			<div class="row">
				<span class="cell">Stamina Dice:</span>
				<span class="cell"><input type="text" value="1" id="InputOption" name="might1" size="2" style="text-align: center"> d <input type="text" id="InputOption" name="might2" value="8" size="2" style="text-align: center">&nbsp;Dice That Determines The Stamina Score</span>
			</div>
		<?php } ?>
			<div class="row">
				<span class="cell">Inhabitants:</span>
				<span class="cell">
					<div id="div_table">
						<div class="row">
							<span class="cell"><input type="checkbox" checked id="InputOption" name="species_human" value="1">Humans</span>
							<span class="cell"><input type="checkbox" checked id="InputOption" name="species_mhuman" value="1">Mutant Humans</span>
						</div>
						<div class="row">
							<span class="cell"><input type="checkbox" checked id="InputOption" name="species_insect" value="1">Humanoid Insects</span>
							<span class="cell"><input type="checkbox" checked id="InputOption" name="species_animal" value="1">Humanoid Animals</span>
						</div>
						<?php if (($x_game == "Gamma World") || ($x_game == "Mutant Future")){ ?>
						<div class="row">
							<span class="cell"><input type="checkbox" checked id="InputOption" name="species_plant" value="1">Humanoid Plant</span>
							<span class="cell"><input type="checkbox" checked id="InputOption" name="species_robot" value="1">Robot</span>
						</div>
						<?php } ?>
					</div>
				</span>
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
				<span class="cxll">Select a MAP TYPE, whether it is a New City, New Village, or Ruined City.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">What CURRENCY does your world use? Is it cash? Is it gold? You can decide that here.</span>
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
				<span class="cxll">If you want every building to have citizens living in them, choose the POPULATE option. You will get citizens described in great detail, especially if you choose to dress them and have them carry some items. You can also decide if they are humanoid, or maybe more mutated where they may have 4 arms and 6 legs.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">You can choose to CREATE STORES in your settlement. Merchants will stock items in their stores, but they don't have to stock everything. Choosing a % of items they carry can be tweaked here, along with amounts for those items. You should also decide if this is a high tech settlement or a low tech one. This is the difference between stocking laser guns or clubs.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">You can create OFFICIALS...which are the rulers of the settlement, along with any law enforcement personnel that live here.</span>
			</div>
		<?php if ($x_game == "Broken Urthe") { ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Decide on what type of STAMINA DICE you want rolled for the inhabitants.</span>
			</div>
		<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Decide on what type of INHABITANTS that live in your settlement. Is it mutants and humans, or maybe humans only?</span>
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
$cash = $_POST['money'];
$maps = $_POST['use_maps'];
$dose = $_POST['dose'];
$empty = $_POST['empty'];
$techy = $_POST['techy'];
$might1 = $_POST['might1']+0;	if ($might1 > 0){} else {$might1 = 1;}
$might2 = $_POST['might2']+0;	if ($might2 > 0){} else {$might2 = 8;}
$game = $_POST['x_game'];
	if ($game == "Mutant Future"){$bottom_notices = 3;}
	else if ($game == "Broken Urthe"){$bottom_notices = 8;}
	else if ($game == "Gamma World"){$bottom_notices = 16; $might2 = 6;}
	else if ($game == "Broken Urthe"){$bottom_notices = 17; $might2 = 6;}

$categor = $map_wide * $map_high;
  if ($categor > 24){$jpgs = "City";}
  else if ($categor > 16){$jpgs = "Town";}
  else if ($categor > 8){$jpgs = "Village";}
  else {$jpgs = "Hamlet";}

$name = stripslashes($_POST['name']);
	if ($name == ""){$name = $jpgs;}
$dres = $_POST['dress'];
$law = $_POST['law'];
$stores = $_POST['stores'];
$stock = $_POST['stock'];
$shelf = $_POST['shelf'];
$poss = $_POST['possessions'];
$map_rooms = $_POST['map_rooms'];
$keyed = 1;

$species_array = array();
	$species_human = $_POST['species_human']+0;			if ($species_human > 0){array_push($species_array, "Human");}
	$species_mhuman = $_POST['species_mhuman']+0;		if ($species_mhuman > 0){array_push($species_array, "Mutant Human");}
	$species_insect = $_POST['species_insect']+0;		if ($species_insect > 0){array_push($species_array, "Humanoid Insect");}
	$species_animal = $_POST['species_animal']+0;		if ($species_animal > 0){array_push($species_array, "Humanoid Animal");}
	$species_plant = $_POST['species_plant']+0;			if ($species_plant > 0){array_push($species_array, "Humanoid Plant");}
	$species_robot = $_POST['species_robot']+0;			if ($species_robot > 0){array_push($species_array, "Robot");}
	$species_used = $species_human + $species_mhuman + $species_insect + $species_animal + $species_plant + $species_robot;

if ($map_rooms > 0){$key = $map_rooms;} else {

if ($maps == 1){ $terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "terrain='ruins'"; $terra9 = "terrain='ruins'";}
else if ($maps == 2){ $terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = $terra9 = $terraZ = "terrain='village'"; }
else
{
	$dock = mt_rand(1,4);
	if ($dock == 1){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = $terra9 = "(terrain='city' OR image='citdock_4.gif')";}
	else if ($dock == 2){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = $terra9 = "(terrain='city' OR image='citdock_2.gif')";}
	else if ($dock == 3){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = $terra9 = "(terrain='city' OR image='citdock_1.gif')";}
	else {$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = $terra9 = "(terrain='city' OR image='citdock_3.gif')";}
	$terra9 = "terrain='city'";
}

include("functions/map_draw.php"); ?>

<?php } ?>

<hr><font size="8"><?php echo $name; ?></font>

<?php 

$shoptq = "CREATE TEMPORARY TABLE shop_track (building INT(20) NOT NULL, owner VARCHAR(250) NOT NULL, shop INT(2) NOT NULL, type VARCHAR(100) NOT NULL, info LONGTEXT NOT NULL, stats LONGTEXT NOT NULL)";
wz_query( $connection, $shoptq ); /*shoptq*/

if ($empty != 1){ 

while ($key > 0) : $city_size = $city_size + 1;
	if ($species_used > 0){$race_pick = $species_array[mt_rand(0,($species_used-1))];} else {$race_pick = "none";}
	$citizen = nuclearCitizen($game,$race_pick,$might1,$might2,$cash,$dres,$poss,adult,none,$dose,none,none);
	$dwell = $dwell + 1;
	$shopinq = "INSERT INTO shop_track (building, owner, info, stats, type, shop) VALUES ('$dwell', '$citizen[5]', '$citizen[4]', '$citizen[6]', '', '0')";
	wz_query( $connection, $shopinq ); /*shopinq*/
	$key = $key - 1;
endwhile;

} else { ?>

<hr>
<font size="2">This settlement has all of the citizens listed below. Each group of citizens are associated with a dwelling <?php if ($map_rooms > 0){echo "number";} else {echo "numbered on the map above"; } ?>.</font>
<hr>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td NOWRAP align="center" width="80"><b><font size="2">Dwelling</font></b></td>
    <td><b><font size="2">Citizen</font></b></td>
  </tr>

<?php while ($key > 0) : $city_size = $city_size + 1; ?>

<?php if (mt_rand(1,100) > 90) { ?>
  <tr>
    <td style="border-top-style: solid; border-top-width: 1" NOWRAP align="center" width="80"><font size="2"><?php $dwell = $dwell + 1; echo $dwell; ?></font></td>
	<td colspan="3" style="border-top-style: solid; border-top-width: 1"><font size="2">This building is empty.</font></td>
  </tr>
<?php } else { if ($species_used > 0){$race_pick = $species_array[mt_rand(0,($species_used-1))];} else {$race_pick = "none";} $citizen = nuclearCitizen($game,$race_pick,$might1,$might2,$cash,$dres,$poss,adult,none,$dose,none,none); ?>
  <tr>
    <td style="border-top-style: solid; border-top-width: 1" NOWRAP align="center" width="80"><font size="2"><?php $dwell = $dwell + 1; echo $dwell; ?></font></td>
	<td colspan="3" style="border-top-style: solid; border-top-width: 1"><font size="2"><?php echo $citizen[4]; ?></font></td>
  </tr>
<?php

	$shopinq = "INSERT INTO shop_track (building, owner, info, stats, type, shop) VALUES ('$dwell', '$citizen[5]', '$citizen[4]', '$citizen[6]', '', '0')";
	wz_query( $connection, $shopinq ); /*shopinq*/

	if ((mt_rand(1,100) > 50) && ($citizen[1] != "Robot")){$citizen = nuclearCitizen($game,$citizen[1],$might1,$might2,$cash,$dres,$poss,adult,$citizen[0],$dose,$citizen[2],$citizen[3]); ?>
  <tr>
    <td NOWRAP align="center" width="80"><font size="2">&nbsp;</font></td>
	<td width="40"><font size="2">&nbsp;</font></td>
	<td colspan="2" style="border-top-style: solid; border-top-width: 1"><font size="2"><?php echo $citizen[4]; ?></font></td>
  </tr>
<?php } ?>
<?php if ((mt_rand(1,100) > 70) && ($citizen[1] != "Robot")){$citizen = nuclearCitizen($game,$citizen[1],$might1,$might2,$cash,$dres,$poss,child,$citizen[0],$dose,$citizen[2],$citizen[3]); ?>
  <tr>
    <td NOWRAP align="center" width="80"><font size="2">&nbsp;</font></td>
	<td width="40"><font size="2">&nbsp;</font></td>
	<td width="40"><font size="2">&nbsp;</font></td>
	<td style="border-top-style: solid; border-top-width: 1"><font size="2"><?php echo $citizen[4]; ?></font></td>
  </tr>
<?php } ?>
<?php if ((mt_rand(1,100) > 90) && ($citizen[1] != "Robot")){$citizen = nuclearCitizen($game,$citizen[1],$might1,$might2,$cash,$dres,$poss,child,$citizen[0],$dose,$citizen[2],$citizen[3]); ?>
  <tr>
    <td NOWRAP align="center" width="80"><font size="2">&nbsp;</font></td>
	<td width="40"><font size="2">&nbsp;</font></td>
	<td width="40"><font size="2">&nbsp;</font></td>
	<td style="border-top-style: solid; border-top-width: 1"><font size="2"><?php echo $citizen[4]; ?></font></td>
  </tr>
<?php } } $key = $key - 1; endwhile; } echo "</table>"; if ($stores == 1){ ?>
<br><hr>
<u><font size="4">Businesses in the <?php echo ucfirst($jpgs); ?></font></u><br><font size="2">
Businesses are displayed in what building number they are in.&nbsp; There is also an owner along with a possible list of items/services one may 
obtain from them.&nbsp; Businesses will indicate how much money is stored somewhere in the vicinity.&nbsp; This money can be referenced for possible 
theft, or simply how much they can possibly negotiate with if characters attempt to sell items.
<?php if ($shelf > 0){?>
&nbsp; Some items have a [#] indicated.&nbsp; 
This number is how many, of that item, the vendor will have restocked every month.&nbsp; If only [3] of an item are available, and the characters buy all 
[3], then the vendor will not get another [3] until the next month.&nbsp; Vaults will also list what kinds of items are stored in the various lock boxes.
<?php } ?>
</font>
<hr>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">

<?php

if ($city_size > 800){$economy = 3;}
else if ($city_size > 400){$economy = 2;}
else {$economy = 1;}

while ($economy > 0) : $huts = 0;

///////////////////////////////////////////////////// TIME TO BUILD ALL OF THE STORES /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($game == "Broken Urthe"){$shopqty = 11;} else {$shopqty = 9;}
$shopqry = "SELECT * FROM shop_track WHERE shop=0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $shopqty";
$shopres = wz_query( $connection, $shopqry ); /*shopqry*/

while ($shopary=wz_fetch_assoc($shopres)) :

	$huts = $huts + 1;
		if ($huts == 1){$hutname = "Army Surplus";}
		else if ($huts == 2){$hutname = "Tavern";}
		else if ($huts == 3){$hutname = "Tailor";}
		else if ($huts == 4){$hutname = "Doctor";}
		else if ($huts == 5){$hutname = "Stables";}
		else if ($huts == 6){$hutname = "Vehicles";}
		else if ($huts == 7){$hutname = "Supplies";}
		else if ($huts == 8){$hutname = "Junk";}
		else if ($huts == 9){$hutname = "Vault";}
		else if ($huts == 10){$hutname = "Mechanic";}
		else if ($huts == 11){$hutname = "Robotics";}

	$shpq = "UPDATE shop_track SET shop=$huts, type='$hutname' WHERE building=$shopary[building]";
	wz_query( $connection, $shpq ); /*shpq*/

endwhile;

$shopqry = "SELECT * FROM shop_track WHERE shop>0 ORDER BY building";
$shopres = wz_query( $connection, $shopqry ); /*shopqry*/

while ($shopary=wz_fetch_assoc($shopres)) : 

	if ($shopary[shop] == 9){$owned = "Banker";}				else if ($shopary[shop] == 2){$owned = "Bartender";}
	else if ($shopary[shop] == 4){$owned = "Doctor";}
	else if ($shopary[shop] == 7){$owned = "Pawn Broker";}		else {$owned = "Owner (" . $shopary[type] . ")";}

	$business = PABusiness($shopary[shop],$game,$techy,$cash,$stock,$shelf);
?>

  <tr>
    <td style="border-bottom-style: solid; border-bottom-width: 1" valign="top"><font size="2"><?php echo $shopary[building]; ?>&nbsp;-&nbsp;<b><?php echo $business[0]; ?></b>&nbsp;
	<?php echo " [" . number_format(mt_rand(50,3000)) . $cash . "] ";
		  if ($empty < 1){ echo "<b>" . $owned . ":</b> " . $shopary[info] . "<br>"; } else { echo "<b>" . $owned . ":</b> " . $shopary[owner] . " " . $shopary[stats] . "<br>";}

			if ($owned == "Banker")
			{
				$bankboxes = "";
				$boxes = mt_rand(2,10);
				while ($boxes > 0) :
					
					$bank_line = $bank_line + 1;
					$bank_limits = mt_rand(5,15);
					$bankboxes = $bankboxes . "<b>VAULT #" . $bank_line . ":</b> ";

					$junky = $bank_limits;
					while ($junky > 0) :
						$junky = $junky - 1;
						$junker = PickJunk();

						$condition = mt_rand(1,5);
							if ($condition == 1){$cond = "ruined"; $valu = $bary[val1]; $valu = $junker[2]; }
							else if ($condition == 2){$cond = "rough"; $valu = $bary[val2]; $valu = $junker[3]; }
							else if ($condition == 3){$cond = "average"; $valu = $bary[val3]; $valu = $junker[4]; }
							else if ($condition == 4){$cond = "good"; $valu = $bary[val4]; $valu = $junker[5]; }
							else {$cond = "perfect"; $valu = $bary[val5]; $valu = $junker[6]; }

						$tabx = $tabx . "<td NOWRAP><font size='2'>" . ucwords($junker[0]) . " - " . number_format($price) . "" . $cash . "</font></td>";

						$bankboxes = $bankboxes . "" . $cond . "&nbsp;" . $junker[0] . "&nbsp;[" . number_format($valu) . "" . $cash . "]&nbsp;---&nbsp; ";

					endwhile;

					$boxes = $boxes - 1;

					$bankboxes = $bankboxes . PAbagCreator(none) . " filled with [" . number_format(mt_rand(5,5000)) . $cash . "]<br>";

				endwhile;

				echo $bankboxes;
			}
			else {echo $business[1];}

	?></font></td>
  </tr>

<?php endwhile; $economy = $economy - 1; endwhile; } ?>

</table>

<?php if ($law > 0){

if ($city_size > 800){$official = "Governor";}
else if ($city_size > 400){$official = "Mayor";}
else {$official = "Constable";}
$guards = ceil(($map_wide * $map_high)/3) + mt_rand(2,5);

?>

<br><hr>
<u><font size="4"><?php echo ucfirst($jpgs); ?> Officials</font></u><br><font size="2">
These are the <?php echo strtolower($jpgs); ?> officials from the <?php echo $official; ?> to the Law Enforcement officers.
</font>
<hr>

<?php
$popqry = "SELECT * FROM shop_track WHERE shop=0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $guards";
$popres = wz_query( $connection, $popqry ); /*popqry*/
$popnum = wz_num_rows($popres);
if ($popnum < 3)
{
	$popqry = "SELECT * FROM shop_track ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 2";
	$popres = wz_query( $connection, $popqry ); /*popqry*/
}

while ($popary=wz_fetch_assoc($popres)) :

	$ppq = "UPDATE shop_track SET shop=99, type='Cops' WHERE building=$popary[building]";
	wz_query( $connection, $ppq ); /*ppq*/

	if ($techy == 1){$ptype = mt_rand(1,3);}
	else if ($techy == 2){$ptype = mt_rand(4,5);}
	else {$ptype = mt_rand(2,5);}

	if ($police != 1)
	{
		$police = 1;
		if ($empty < 1){ echo "<font size='2'><b>" . strtoupper($official) . ":</b> " . $popary[info] . " (Lives in #" . $popary[building] . ").<br>"; }
		else { echo "<font size='2'><b>" . strtoupper($official) . ": " . $popary[owner] . "</b> " . $popary[stats] . " (Lives in #" . $popary[building] . ").<br>"; }
	}
	else
	{
		if ($empty < 1){ echo "<font size='2'><b>LAW ENFORCEMENT:</b> " . $popary[info] . " (Lives in #" . $popary[building] . " and carries a " . strtolower(PAgetWeapon($ptype,$game)) . " while on duty).<br>"; }
		else { echo "<font size='2'><b>LAW ENFORCEMENT: " . $popary[owner] . "</b> " . $popary[stats] . " (Lives in #" . $popary[building] . " and carries a " . strtolower(PAgetWeapon($ptype,$game)) . " while on duty).<br>"; }
	}
	echo "<hr>";

endwhile;

}

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>