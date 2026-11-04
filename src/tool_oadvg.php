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
	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' target='_blank' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Adventurers Guild</p>";
	echo "<p style='text-align: justify;'>"; ?>
			If you need a henchman, a quick character to play, or a detailed non-player character...the Adventurers Guild is where you would look. This will 
			create some unique characters complete with statistics, abilities, skills, appearances, and inventory. If you choose an illegal combination of race 
			and class, the class will take precedence and still generate some characters for you. If you choose a level range, it will try to stay within that range 
			but it will not leave level-limit characters out (meaning if you choose a level range between 15 and 20, it may grab a level 4 halfling fighter [<i>the highest 
			level for that character type</i>] to fill the list of adventurers. To print the results, &frac12;" borders work best while turning off any headers and footers.
		<br>
		<div id="div_table">
			<div class="row">
				<span class="cull">Type:</span>
				<span class="cell">
					<select id="DropOption" size="1" name="x_output">
						<option>Character Listing</option>
						<option>Character Sheets</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">Levels:</span>
				<span class="cell"><select id="DropOption" size="1" name="x_lvl1"><option>1</option><?php $runner=19; $running=1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>&nbsp;&nbsp;to&nbsp;&nbsp;
					<select id="DropOption" size="1" name="x_lvl2"><option>20</option><?php $runner=20; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
			<div class="row">
				<span class="cull">Gender:</span>
				<span class="cell">
					<select id="DropOption" size="1" name="x_sex">
						<option>Any</option>
						<option>Male</option>
						<option>Female</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cull">Race:</span>
				<span class="cell">
					<select id="DropOption" size="1" name="x_race">
						<option value="0">Any</option>
						<option>Dwarf</option>
						<option>Elf</option>
						<option>Gnome</option>
						<option>Half-Elf</option>
						<option>Halfling</option>
						<option>Half-Orc</option>
						<option>Human</option>
					</select>
				</span>
			</div>
		</div>
		<div id='div_line'>&nbsp;</div>
		<div id="div_tabex">
			<div class="row">
				<span class="cell">Classes:</span>
				<span class="cell">&nbsp;</span>
				<span class="cell">Assassin</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_assassin"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cell">Cleric</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_cleric"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
				<span class="cell">Druid</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_druid"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cell">Fighter</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_fighter"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
				<span class="cell">Illusionist</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_illusionist"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cell">Magic-User</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_mage"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
				<span class="cell">Paladin</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_paladin"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cell">Ranger</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_ranger"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
				<span class="cell">Thief</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_thief"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
		</div>
		<div id='div_line'>&nbsp;</div>
		<div id="div_table">
			<div class="row">
				<span class="cull"><input id="InputOption" type="checkbox" checked name="x_name" value="1">Name Characters</span>
				<span class="cull"><input id="InputOption" type="checkbox" name="x_relics" value="1">Add Magic Items ('Show Equipment' Required)</span>
			</div>
			<div class="row">
				<span class="cull"><input id="InputOption" type="checkbox" name="x_maxhp" value="1">Use Maximum Hit Points</span>
				<span class="cull"><input id="InputOption" type="checkbox" checked name="x_show_me" value="1">Descriptions ('Name Characters' Required)</span>
			</div>
			<div class="row">
				<span class="cull"><input id="InputOption" type="checkbox" checked name="x_show_eq" value="1">Equipment</span>
				<span class="cull"><input id="InputOption" type="checkbox" checked name="x_show_sk" value="1">Skills &amp; Abilities</span>
			</div>
			<div class="row">
				<span class="cull"><input id="InputOption" type="radio" value="1" checked name="x_img">Image Separator In Between**</span>
				<span class="cull"><input id="InputOption" type="radio" value="0" name="x_img">Line Separator In Between**</span>
			</div>
		</div>
		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create"><br>

		</p><p style='text-align: justify;'>
		* For 'Character Sheets' only&nbsp;&nbsp;&nbsp;&nbsp;** For 'Character Listing' only

		<br>
		<br>
		Character information does not take into account any changes from magical items, skills, or abilities the characters may have

		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

include("functions/ll_rules.php");

$x_output = $_POST['x_output'];
$x_img = $_POST['x_img'];
$x_maxhp = $_POST['x_maxhp'];

$x_qty_assassin = $_POST['x_qty_assassin'];
$x_qty_cleric = $_POST['x_qty_cleric'];
$x_qty_druid = $_POST['x_qty_druid'];
$x_qty_fighter = $_POST['x_qty_fighter'];
$x_qty_illusionist = $_POST['x_qty_illusionist'];
$x_qty_mage = $_POST['x_qty_mage'];
$x_qty_paladin = $_POST['x_qty_paladin'];
$x_qty_ranger = $_POST['x_qty_ranger'];
$x_qty_thief = $_POST['x_qty_thief'];

$x_qty = $x_qty_assassin + $x_qty_cleric + $x_qty_druid + $x_qty_fighter + $x_qty_illusionist + $x_qty_mage + $x_qty_paladin + $x_qty_ranger + $x_qty_thief;
if ($x_qty > 0){} else {$x_qty = 1; $x_class = 0;}

$x_relics = $_POST['x_relics'];
$x_name = $_POST['x_name'];
$x_sex = $_POST['x_sex'];

$x_lvl1 = $_POST['x_lvl1'];
$x_lvl2 = $_POST['x_lvl2'];

$x_race = $_POST['x_race'];

$x_show_sk = $_POST['x_show_sk'];
$x_show_eq = $_POST['x_show_eq'];
$x_show_me = $_POST['x_show_me'];

$bottom_notices = 1;

if ($x_output == "Character Sheets")
{
	while ($x_qty > 0) : $x_qty = $x_qty - 1;

	if ($x_qty_assassin > 0){$x_qty_assassin = $x_qty_assassin - 1; $x_class = "Assassin";}
	else if ($x_qty_cleric > 0){$x_qty_cleric = $x_qty_cleric - 1; $x_class = "Cleric";}
	else if ($x_qty_druid > 0){$x_qty_druid = $x_qty_druid - 1; $x_class = "Druid";}
	else if ($x_qty_illusionist > 0){$x_qty_illusionist = $x_qty_illusionist - 1; $x_class = "Illusionist";}
	else if ($x_qty_mage > 0){$x_qty_mage = $x_qty_mage - 1; $x_class = "Magic-User";}
	else if ($x_qty_paladin > 0){$x_qty_paladin = $x_qty_paladin - 1; $x_class = "Paladin";}
	else if ($x_qty_ranger > 0){$x_qty_ranger = $x_qty_ranger - 1; $x_class = "Ranger";}
	else if ($x_qty_thief > 0){$x_qty_thief = $x_qty_thief - 1; $x_class = "Thief";}
	else if ($x_qty_fighter > 0){$x_qty_fighter = $x_qty_fighter - 1; $x_class = "Fighter";}

	echo "<div align='center'><table width='700'><tr><td valign='top'>";

	$dude = makeAdventurer($x_class,$x_race,$x_maxhp,$x_lvl1,$x_lvl2,$x_relics,$x_sex);
	$p_name = $dude[0]; if ($x_name > 0){} else {$p_name = "&nbsp;";}
	$p_race = $dude[1];
	$p_age = $dude[2];
	$p_sex = $dude[3];
	$p_class = $dude[4];
	$p_alignment = $dude[5];
	$p_ab_str = $dude[6];
	$p_ab_str_xtra = $dude[7];
	$p_ab_int = $dude[8];
	$p_ab_wis = $dude[9];
	$p_ab_dex = $dude[10];
	$p_ab_con = $dude[11];
	$p_ab_cha = $dude[12];
	$p_level = $dude[13];
	$p_hp = $dude[14];
	$p_armor = $dude[15];
		if ($x_show_eq > 0){} else {$p_armor = 10-$dude[30]; if ($p_armor > 10){$p_armor = 10;} if ($p_armor < -10){$p_armor = -10;}}
		$dex_info = "";
	$p_bsrp = $dude[17]; if ($p_bsrp != ""){$dex_info = $dex_info . " / Surprise: " . $p_bsrp;}
	$p_brng = $dude[20]; if ($p_brng != ""){$dex_info = $dex_info . " / Range: " . $p_brng;}
	$p_barm = $dude[16]; if ($p_barm != ""){$dex_info = $dex_info . " / AC: " . $p_barm;}
		$dex_info = substr($dex_info, 3);
		$dex_info = "<font size='2'>" . $dex_info . "</font>&nbsp;";
		$str_info = "";
	$p_bhit = $dude[18];		if ($p_bhit != ""){$str_info = $str_info . " / Hit: " . $p_bhit;}
	$p_bdmg = $dude[19];		if ($p_bdmg != ""){$str_info = $str_info . " / Dmg: " . $p_bdmg;}
	$p_minor_test = $dude[31];	if ($p_minor_test != ""){$str_info = $str_info . " / Min: " . $p_minor_test;}
	$p_major_test = $dude[32];	if ($p_major_test != ""){$str_info = $str_info . " / Maj: " . $p_major_test;}
		$str_info = substr($str_info, 3);
		$str_info = "<font size='2'>" . $str_info . "</font>&nbsp;";
		$con_info = "";
	$p_bhps = $dude[35];	if ($p_bhps != ""){$con_info = $con_info . " / HP: " . $p_bhps;}
	$p_consv = $dude[33];	if ($p_consv != ""){$con_info = $con_info . " / Res: " . $p_consv;}
	$p_consh = $dude[34];	if ($p_consh != ""){$con_info = $con_info . " / Sys Shk: " . $p_consh;}
		$con_info = substr($con_info, 3);
		$con_info = "<font size='2'>" . $con_info . "</font>&nbsp;";
		$int_info = "";
	$p_lngu = $dude[36];
		$int_info = "<font size='2'>" . $p_lngu . "</font>&nbsp;";
		$wis_info = "";
	$p_msvt = $dude[37];	if ($p_msvt != ""){$wis_info = "Magic Save Bonus: " . $p_msvt;}
		$wis_info = "<font size='2'>" . $wis_info . "</font>&nbsp;";
		$cha_info = "";
	$p_hench = $dude[38];
		$cha_info = "<font size='2'>" . $p_hench . "</font>&nbsp;";
	$p_thaco = $dude[21];
	$p_xsv1 = $dude[22];
	$p_xsv2 = $dude[23];
	$p_xsv3 = $dude[24];
	$p_xsv4 = $dude[25];
	$p_xsv5 = $dude[26];
	$p_notes = $dude[27];
	$p_skills = $dude[28];
	$w_stuff = $dude[29];

?>
				<p style="margin-top: 0; margin-bottom: 0" align="center"><img border="0" src="pics_tools/ocsht_26.jpg" width="680" height="67"></p>
				<p style="margin-top: 0; margin-bottom: 0" align="center">&nbsp;</p>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td height="35" valign="top" width="125"><img border="0" src="pics_tools/ocsht_01.jpg" width="51" height="25"></td>
						<td height="35" valign="top"><table width="200" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_name; ?></td></tr></table></td>
						<td height="35" valign="top" width="135"><img border="0" src="pics_tools/ocsht_02.jpg" width="55" height="18"></td>
						<td height="35" align="right" width="146" valign="top"><table width="130" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_class; ?></td></tr></table></td>
					</tr>
					<tr>
						<td height="35" valign="top" width="125"><img border="0" src="pics_tools/ocsht_03.jpg" width="50" height="18"></td>
						<td height="35" valign="top"><table width="150" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_sex; ?> <?php echo $p_race; ?></td></tr></table></td>
						<td height="35" valign="top" width="135"><img border="0" src="pics_tools/ocsht_04.jpg" width="39" height="20"></td>
						<td height="35" align="right" width="146" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_age; ?></td></tr></table></td>
					</tr>
					<tr>
						<td height="35" valign="top" width="125"><img border="0" src="pics_tools/ocsht_05.jpg" width="105" height="20"></td>
						<td height="35" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_alignment; ?></td></tr></table></td>
						<td height="35" valign="top" width="135"><img border="0" src="pics_tools/ocsht_06.jpg" width="112" height="19"></td>
						<td height="35" align="right" width="146" valign="top"><table width="130" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo number_format(givemeXP($p_class,$p_level)); ?></td></tr></table></td>
					</tr>
					<tr>
						<td height="35" valign="top" width="125"><img border="0" src="pics_tools/ocsht_07.jpg" width="55" height="19"></td>
						<td height="35" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_level; ?></td></tr></table></td>
						<td height="35" valign="top" width="135"><img border="0" src="pics_tools/ocsht_22.jpg" width="71" height="18"></td>
						<td height="35" align="right" width="146" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_thaco; ?></td></tr></table></td>
					</tr>
					<tr>
						<td height="35" valign="top" width="125"><img border="0" src="pics_tools/ocsht_10.jpg" width="104" height="19"></td>
						<td height="35" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_hp; ?></td></tr></table></td>
						<td height="35" valign="top" width="135"><img border="0" src="pics_tools/ocsht_08.jpg" width="127" height="18"></td>
						<td height="35" align="right" width="146" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_armor; ?></td></tr></table></td>
					</tr>
				</table>
				<p style="margin-top: 0; margin-bottom: 0" align="center">&nbsp;</p>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td height="40" valign="top"><img border="0" src="pics_tools/ocsht_09.jpg" width="129" height="23"></td>
						<td align="right" height="40" valign="top"><img border="0" src="pics_tools/ocsht_11.jpg" width="211" height="30"></td>
					</tr>
				</table>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td width="63" height="35" valign="top"><img border="0" src="pics_tools/ocsht_18.jpg" width="43" height="18"></td>
						<td height="35" width="68" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_ab_str; if ($p_ab_str_xtra > 0){echo "." . $p_ab_str_xtra; } ?></td></tr></table></td>
						<td height="35" valign="top"><table width="240" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $str_info; ?></td></tr></table></td>
						<td height="35" width="247" valign="top"><img border="0" src="pics_tools/ocsht_20.jpg" width="176" height="20"></td>
						<td height="35" align="right" width="64" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_xsv1; ?></td></tr></table></td>
					</tr>
					<tr>
						<td width="63" height="35" valign="top"><img border="0" src="pics_tools/ocsht_17.jpg" width="42" height="24"></td>
						<td height="35" width="68" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_ab_dex; ?></td></tr></table></td>
						<td height="35" valign="top"><table width="240" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $dex_info; ?></td></tr></table></td>
						<td height="35" width="247" valign="top"><img border="0" src="pics_tools/ocsht_21.jpg" width="162" height="19"></td>
						<td height="35" align="right" width="64" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_xsv2; ?></td></tr></table></td>
					</tr>
					<tr>
						<td width="63" height="35" valign="top"><img border="0" src="pics_tools/ocsht_16.jpg" width="42" height="23"></td>
						<td height="35" width="68" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_ab_con; ?></td></tr></table></td>
						<td height="35" valign="top"><table width="240" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $con_info; ?></td></tr></table></td>
						<td height="35" width="247" valign="top"><img border="0" src="pics_tools/ocsht_23.jpg" width="239" height="24"></td>
						<td height="35" align="right" width="64" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_xsv3; ?></td></tr></table></td>
					</tr>
					<tr>
						<td width="63" height="35" valign="top"><img border="0" src="pics_tools/ocsht_15.jpg" width="37" height="23"></td>
						<td height="35" width="68" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_ab_int; ?></td></tr></table></td>
						<td height="35" valign="top"><table width="240" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $int_info; ?></td></tr></table></td>
						<td height="35" width="247" valign="top"><img border="0" src="pics_tools/ocsht_24.jpg" width="195" height="20"></td>
						<td height="35" align="right" width="64" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_xsv4; ?></td></tr></table></td>
					</tr>
					<tr>
						<td width="63" height="35" valign="top"><img border="0" src="pics_tools/ocsht_19.jpg" width="41" height="18"></td>
						<td height="35" width="68" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_ab_wis; ?></td></tr></table></td>
						<td height="35" valign="top"><table width="240" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $wis_info; ?></td></tr></table></td>
						<td height="35" width="247" valign="top"><img border="0" src="pics_tools/ocsht_25.jpg" width="63" height="18"></td>
						<td height="35" align="right" width="64" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_xsv5; ?></td></tr></table></td>
					</tr>
					<tr>
						<td width="63" height="35" valign="top"><img border="0" src="pics_tools/ocsht_14.jpg" width="42" height="18"></td>
						<td height="35" width="68" valign="top"><table width="50" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $p_ab_cha; ?></td></tr></table></td>
						<td height="35" valign="top"><table width="240" style="border-bottom-style: solid; border-color: #000000; border-bottom-width: 1px"><tr><td align="center"><?php echo $cha_info; ?></td></tr></table></td>
						<td height="35" width="311" valign="top" colspan="2" align="center"><p style="margin-top: 0; margin-bottom: 0">
						<img border="0" src="pics_tools/ocsht_27.jpg" width="250" height="50"></td>
					</tr>
				</table>
				<p style="margin-top: 0; margin-bottom: 0"><font size="1">&nbsp;</font></p>
					<table border="1" width="100%" style="border-color: #000000; border-collapse: collapse" cellspacing="3" cellpadding="3">
						<tr>
							<td><img border="0" src="pics_tools/ocsht_12.jpg" width="147" height="29"><font size="2"><br><?php if ($x_show_eq > 0){echo $w_stuff . "<br><br><br><br>";} else {echo "<br><br><br><br><br><br><br><br>";} ?></font></td>
						</tr>
					</table>
				<p style="margin-top: 0; margin-bottom: 0"><font size="1">&nbsp;</font></p>
					<table border="1" width="100%" style="border-color: #000000; border-collapse: collapse" cellspacing="3" cellpadding="3">
						<tr>
							<td><img border="0" src="pics_tools/ocsht_13.jpg" width="87" height="29"><font size="2"><br><?php
								if ($x_show_me > 0){ echo dressMeup($p_sex,$p_race,$p_class) . "<br><br>"; } else {$nolin = 1;}
								if ($x_show_sk > 0){ echo $p_notes . "<br><br>" . substr($p_skills, 0, -3); }  else {$nolin = 2;}
								if ($nolin == 1){echo "<br><br><br><br>";} 
								if ($nolin == 2){echo "<br><br><br><br><br><br><br><br>";}?></font></td>
						</tr>
					</table>
<?php
		echo "</td></tr></table></div><br><div style='page-break-after: always; height:1px;'>&nbsp;</div>"; endwhile;

}
else
{

if (($x_img + $x_show_sk + $x_show_eq + $x_show_me) > 2){$when_to_break = 1;}
else if (($x_img + $x_show_sk + $x_show_eq + $x_show_me) > 1){$when_to_break = 2;}
else {$when_to_break = 3;}

echo "<div align='center'><table border='0' cellpadding='0' cellspacing='0' width='700'><tr><td>";

?>
		<p style="margin-top: 0; margin-bottom: 0" align="center">
		<img border="0" src="pics_tools/aguild2.jpg" width="382" height="49"></p>
		<p style="margin-top: 0; margin-bottom: 0"><font size="2">Each adventurer is listed below with their alignment (<i>AL</i>), strength (<i>ST</i>), 
		intelligence (<i>IN</i>), wisdom (<i>WI</i>), dexterity (<i>DX</i>), constitution (<i>CN</i>), charisma (<i>CH</i>), level (<i>LV</i>), hit 
		points (<i>HP</i>), armor class (<i>AC</i>), armor bonus (<i>AB</i>), surprise bonus (<i>SB</i>), hit bonus (<i>HB</i>), damage bonus (<i>DB</i>), range hit bonus (<i>RB</i>), 
		and score needed to hit an AC of 0 (<i>TH</i>).&nbsp; They also have their saving throws of 
		<?php if ($x_game != "Labyrinth Lord"){?><i>RSW</i> (rod, staff, or wand), <i>BW</i> (breath weapons), <i>DPP</i> (death, paralysis, or poison), <i>PP</i> (petrifaction or polymorph), and <i>SPL</i> (spells).&nbsp; 
		<?php } else {?><i>BA</i> (breath attacks), <i>PD</i> (poison or death), <i>PP</i> (petrify or paralyze), <i>WD</i> (wands), and <i>SD</i> (spells or spell devices).&nbsp; <?php } ?>
		These values do not take into account any magical items, skills, or abilities the character may have.</font></p>
		<hr color="#000000">
<?php

echo "</td></tr></table></div>";	

while ($x_qty > 0) : $x_qty = $x_qty - 1;

	if ($x_qty_assassin > 0){$x_qty_assassin = $x_qty_assassin - 1; $x_class = "Assassin";}
	else if ($x_qty_cleric > 0){$x_qty_cleric = $x_qty_cleric - 1; $x_class = "Cleric";}
	else if ($x_qty_druid > 0){$x_qty_druid = $x_qty_druid - 1; $x_class = "Druid";}
	else if ($x_qty_illusionist > 0){$x_qty_illusionist = $x_qty_illusionist - 1; $x_class = "Illusionist";}
	else if ($x_qty_mage > 0){$x_qty_mage = $x_qty_mage - 1; $x_class = "Magic-User";}
	else if ($x_qty_paladin > 0){$x_qty_paladin = $x_qty_paladin - 1; $x_class = "Paladin";}
	else if ($x_qty_ranger > 0){$x_qty_ranger = $x_qty_ranger - 1; $x_class = "Ranger";}
	else if ($x_qty_thief > 0){$x_qty_thief = $x_qty_thief - 1; $x_class = "Thief";}
	else {$x_qty_fighter = $x_qty_fighter - 1; $x_class = "Fighter";}

echo "<div align='center'><table width='700'><tr><td valign='top'>";

$dude = makeAdventurer($x_class,$x_race,$x_maxhp,$x_lvl1,$x_lvl2,$x_relics,$x_sex);
$p_name = $dude[0]; if ($x_name > 0){} else {$p_name = "&nbsp;";}
$p_race = $dude[1];
$p_age = $dude[2];
$p_sex = $dude[3];
$p_class = $dude[4];
$p_alignment = $dude[5];
$p_ab_str = $dude[6];
$p_ab_str_xtra = $dude[7];
$p_ab_int = $dude[8];
$p_ab_wis = $dude[9];
$p_ab_dex = $dude[10];
$p_ab_con = $dude[11];
$p_ab_cha = $dude[12];
$p_level = $dude[13];
$p_hp = $dude[14];
$p_armor = $dude[15];
	if ($x_show_eq > 0){} else {$p_armor = 10-$dude[30]; if ($p_armor > 10){$p_armor = 10;} if ($p_armor < -10){$p_armor = -10;}}
$p_barm = $dude[16];
$p_bsrp = $dude[17];
$p_bhit = $dude[18];
$p_bdmg = $dude[19];
$p_brng = $dude[20];
$p_thaco = $dude[21];
$p_xsv1 = $dude[22];
$p_xsv2 = $dude[23];
$p_xsv3 = $dude[24];
$p_xsv4 = $dude[25];
$p_xsv5 = $dude[26];
$p_notes = $dude[27];
$p_skills = $dude[28];
$w_stuff = $dude[29];

?>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td NOWRAP style="border-bottom-style: solid; border-color: #C0C0C0; border-bottom-width: 1px" width="20%"><font size="2"><b>Name:&nbsp; </b><?php echo $p_name; ?></font></td>
				<td NOWRAP style="border-bottom-style: solid; border-color: #C0C0C0; border-bottom-width: 1px" width="20%" align="center"><font size="2"><b>Race: </b><?php echo $p_race; ?></font></td>
				<td NOWRAP style="border-bottom-style: solid; border-color: #C0C0C0; border-bottom-width: 1px" width="20%" align="center"><font size="2"><b>Age: </b><?php echo $p_age; ?></font></td>
				<td NOWRAP style="border-bottom-style: solid; border-color: #C0C0C0; border-bottom-width: 1px" width="20%" align="center"><font size="2"><b>Gender: </b><?php echo $p_sex; ?></font></td>
				<td NOWRAP style="border-bottom-style: solid; border-color: #C0C0C0; border-bottom-width: 1px" width="20%" align="right"><font size="2"><b>Class: </b><?php echo $p_class; ?></font></td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td NOWRAP width="5%" align="center"><b><font size="2">&nbsp;</font></b></td>
				<td NOWRAP width="30%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px" colspan="6"><b><font size="2">Ability Scores</font></b></td>
				<td NOWRAP width="5%" align="center"><b><font size="2">&nbsp;</font></b></td>
				<td NOWRAP width="5%" align="center"><b><font size="2">&nbsp;</font></b></td>
				<td NOWRAP width="5%" align="center"><b><font size="2">&nbsp;</font></b></td>
				<td NOWRAP width="20%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px" colspan="5"><b><font size="2">Bonuses</font></b></td>
				<td NOWRAP width="5%" align="center"><b><font size="2">&nbsp;</font></b></td>
				<td NOWRAP width="25%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px" colspan="5"><b><font size="2">Saving Throws</font></b></td>
			</tr>
			<tr>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">AL</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">ST</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">IN</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">WI</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">DX</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">CN</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">CH</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">LV</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">HP</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">AC</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">AB</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">SB</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">HB</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">DB</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">RB</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">TH</font></b></td>
		<?php if ($x_game != "Labyrinth Lord"){?>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">RSW</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">BW</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">DPP</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">PP</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">SPL</font></b></td>
		<?php } else { ?>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">BA</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">PD</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">PP</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">WD</font></b></td>
				<td NOWRAP width="5%" align="center" style="border-bottom-style: solid; border-bottom-width: 1px"><b><font size="2">SD</font></b></td>
		<?php } ?>
			</tr>
			<tr>
				<td NOWRAP align="center"><font size="2"><?php echo $p_alignment; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_ab_str; if ($p_ab_str_xtra > 0){echo "." . $p_ab_str_xtra; } ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_ab_int; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_ab_wis; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_ab_dex; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_ab_con; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_ab_cha; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_level; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_hp; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_armor; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_barm; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_bsrp; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_bhit; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_bdmg; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_brng; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_thaco; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_xsv1; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_xsv2; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_xsv3; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_xsv4; ?></font></td>
				<td NOWRAP align="center"><font size="2"><?php echo $p_xsv5; ?></font></td>
			</tr>
		</table>

<?php if ($x_show_me > 0){?>
	<hr size="1" color="#C0C0C0"><p align="left" style="margin-top: 0; margin-bottom: 0"><font size="2"><?php echo dressMeup($p_sex,$p_race,$p_class); ?></font></p>
<?php } if ($x_show_sk > 0){?>
	<?php if ($p_notes != ""){?><hr size="1" color="#C0C0C0"><p align="left" style="margin-top: 0; margin-bottom: 0"><font size="2"><b>Abilities:&nbsp; </b><?php echo $p_notes; ?></font></p><?php } ?>
	<?php if ($p_skills != ""){?><hr size="1" color="#C0C0C0"><p align="left" style="margin-top: 0; margin-bottom: 0"><font size="2"><b>Skills:&nbsp; </b><?php echo substr($p_skills, 0, -3); ?></font></p><?php } ?>
<?php } if ($x_show_eq > 0){?>
	<hr size="1" color="#C0C0C0"><p align="left" style="margin-top: 0; margin-bottom: 0"><font size="2"><b>Inventory:&nbsp; </b><?php echo $w_stuff; ?></font></p>
<?php } ?>

<?php echo "</td></tr></table></div>"; if ($breaker >= $when_to_break){echo "<div style='page-break-after: always; height:1px;'>&nbsp;</div>"; $breaker = 0;} else {$breaker = $breaker + 1;}

	if (($x_img > 0) && ($x_qty > 0)){?><p align="center"><img border="0" src="pics_tools/aguild1.jpg" width="650" height="55"></p><?php } else if ($x_qty > 0){ ?><hr width="700" color="#000000"><?php } ?>

<?php endwhile; ?>

<?php } if ($x_output != "Character Sheets"){echo "<div style='page-break-after: always; height:1px;'>&nbsp;</div>";}

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>