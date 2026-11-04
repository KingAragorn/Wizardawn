<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "BD&D";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' target='_blank' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Adventurers Guild</p>";
	echo "<p style='text-align: justify;'>"; ?>
			If you need a henchman, a quick character to play, or a detailed non-player character...the Adventurers Guild is where you would look. This will 
			create some unique characters complete with statistics, abilities, skills, experience, coins, spells, descriptions, 
			appearances, and inventory. If you choose a level range, it will try to stay within that range but it will not leave level-limit characters out (meaning if you choose a level 
			range between 10 and 14, it may grab a level 8 halfling [<i>the highest level for that character type</i>] to fill the list of adventurers. To print the results, &frac12;" borders work best while turning off any headers and footers.
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
				<span class="cell"><select id="DropOption" size="1" name="x_lvl1"><option>1</option><?php $runner=13; $running=1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>&nbsp;&nbsp;to&nbsp;&nbsp;
					<select id="DropOption" size="1" name="x_lvl2"><option>14</option><?php $runner=14; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
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
		</div>
		<div id='div_line'>&nbsp;</div>
		<div id="div_tabex">
			<div class="row">
				<span class="cell">Classes:</span>
				<span class="cell">&nbsp;</span>
				<span class="cell">Cleric</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_cleric"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cell">Dwarf</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_dwarf"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
				<span class="cell">Elf</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_elf"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cell">Fighter</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_fighter"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
				<span class="cell">Halfling</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_halfling"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
			</div>
			<div class="row">
				<span class="cell">Magic-User</span>
				<span class="cell"><select size="1" id="DropOption" name="x_qty_mage"><?php $runner=21; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select></span>
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
				<span class="cull"><input id="InputOption" type="checkbox" name="x_show_ss" value="1">Spell Lists</span>
				<span class="cull"><input id="InputOption" checked type="checkbox" name="x_lang_set" value="1">Choose Languages</span>
			</div>
			<div class="row">
				<span class="cull"><input id="InputOption" checked type="checkbox" name="x_show_al" value="1">Alignment</span>
				<span class="cull"><input id="InputOption" type="checkbox" name="x_show_age" value="1">Show Age</span>
			</div>
			<div class="row">
				<span class="cull"><input id="InputOption" type="checkbox" name="x_rand_xp" value="1">Random Experience</span>
				<span class="cull"><input id="InputOption" checked type="checkbox" name="x_var_dmg" value="1">Variable Weapon Damage</span>
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
		Character information does not take into account any changes from magical items (other than magical armor) the characters may have (rings of protection...for example).

		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

include("functions/bx_rules.php");

$x_output = $_POST['x_output'];
$x_img = $_POST['x_img']+0;
$x_maxhp = $_POST['x_maxhp']+0;

$x_qty_cleric = $_POST['x_qty_cleric'];
$x_qty_dwarf = $_POST['x_qty_dwarf'];
$x_qty_elf = $_POST['x_qty_elf'];
$x_qty_fighter = $_POST['x_qty_fighter'];
$x_qty_halfling = $_POST['x_qty_halfling'];
$x_qty_mage = $_POST['x_qty_mage'];
$x_qty_thief = $_POST['x_qty_thief'];

$x_qty = $x_qty_halfling + $x_qty_cleric + $x_qty_dwarf + $x_qty_fighter + $x_qty_elf + $x_qty_mage + $x_qty_thief;
if ($x_qty > 0){} else {$x_qty=1; $x_qty_fighter=1;}

$x_relics = $_POST['x_relics']+0;
$x_name = $_POST['x_name']+0;
$x_sex = $_POST['x_sex'];

$x_lvl1 = $_POST['x_lvl1']+0;
$x_lvl2 = $_POST['x_lvl2']+0;
	if ($x_lvl1 > $x_lvl2){$x_lvl1 = $x_lvl2;}

$x_show_sk = $_POST['x_show_sk']+0;
$x_show_eq = $_POST['x_show_eq']+0;
$x_show_me = $_POST['x_show_me']+0;
$x_show_ss = $_POST['x_show_ss']+0;
$x_rand_xp = $_POST['x_rand_xp']+0;
$x_show_al = $_POST['x_show_al']+0;
$x_show_age = $_POST['x_show_age']+0;
$x_lang_set = $_POST['x_lang_set']+0;
$x_var_dmg = $_POST['x_var_dmg']+0;

if ( $x_show_age > 0 ){ $sheet_used = "bx_char_sheet_age.jpg"; $mod_stat_version = 0; $mod_font_size=20; $mod_font_move=0; }
else { $sheet_used = "bx_char_sheet.jpg"; $mod_stat_version = 0; $mod_font_size=20; $mod_font_move=0; }

while ($x_qty > 0) :

	$cha_level = mt_rand($x_lvl1,$x_lvl2);

	$str_min=3; 	$dex_min=3; 	$con_min=3; 	$int_min=3; 	$wis_min=3; 	$cha_min=3;
	$str_max=18;	$dex_max=18;	$con_max=18;	$int_max=18;	$wis_max=18;	$cha_max=18;

	if ($x_qty_cleric > 0){ $x_qty_cleric = $x_qty_cleric - 1; $class="Cleric"; $wis_min = $wis_max = max(mt_rand(3,18),mt_rand(3,18),mt_rand(3,18),mt_rand(3,18)); }
	else if ($x_qty_dwarf > 0){ $x_qty_dwarf = $x_qty_dwarf - 1; $class="Dwarf"; if ($con_min<9){$con_min=9;} if ($cha_level > 12){$cha_level = 12;} $str_min = $str_max = max(mt_rand(3,18),mt_rand(3,18),mt_rand(3,18),mt_rand(3,18)); }
	else if ($x_qty_elf > 0){ $x_qty_elf = $x_qty_elf - 1; $class="Elf"; if ($int_min<9){$int_min=9;} if ($cha_level > 10){$cha_level = 10;} $str_min = $str_max = max(mt_rand(3,18),mt_rand(3,18),mt_rand(3,18),mt_rand(3,18)); }
	else if ($x_qty_fighter > 0){ $x_qty_fighter = $x_qty_fighter - 1; $class="Fighter"; $str_min = $str_max = max(mt_rand(3,18),mt_rand(3,18),mt_rand(3,18),mt_rand(3,18)); }
	else if ($x_qty_halfling > 0){ $x_qty_halfling = $x_qty_halfling - 1; $class="Halfling"; if ($dex_min<9){$dex_min=9;} if ($con_min<9){$con_min=9;} if ($cha_level > 8){$cha_level = 8;} }
	else if ($x_qty_mage > 0){ $x_qty_mage = $x_qty_mage - 1; $class="Magic-User"; $int_min = $int_max = max(mt_rand(3,18),mt_rand(3,18),mt_rand(3,18),mt_rand(3,18)); }
	else if ($x_qty_thief > 0){ $x_qty_thief = $x_qty_thief - 1; $class="Thief"; $dex_min = $dex_max = max(mt_rand(3,18),mt_rand(3,18),mt_rand(3,18),mt_rand(3,18)); }

	$stat_str = bx_basic_stat("Strength", $str_min, $str_max, $class, $class, $mod_stat_version);			$mod_stats_str = $stat_str[2];
	$stat_dex = bx_basic_stat("Dexterity", $dex_min, $dex_max, $class, $class, $mod_stat_version);			$mod_stats_dex1 = $stat_dex[3];		$mod_stats_dex2 = $stat_dex[4];		$mod_stats_dex3 = $stat_dex[5];
	$stat_con = bx_basic_stat("Constitution", $con_min, $con_max, $class, $class, $mod_stat_version);		$mod_stats_con = $stat_con[6];
	$stat_int = bx_basic_stat("Intelligence", $int_min, $int_max, $class, $class, $mod_stat_version);		$mod_stats_int = $stat_int[7];		$languages_known = $stat_int[12];	$max_spells_known = $stat_int[18]; if (($max_spells_known == "Unlimited") || ($sheet_used != "bx_char_sheet_basic_aec.jpg")){$max_spells_known = 100;}
	$stat_wis = bx_basic_stat("Wisdom", $wis_min, $wis_max, $class, $class, $mod_stat_version);				$mod_stats_wis = $stat_wis[8];
	$stat_cha = bx_basic_stat("Charisma", $cha_min, $cha_max, $class, $class, $mod_stat_version);			$mod_stats_cha1 = $stat_cha[9];		$mod_stats_cha2 = $stat_cha[10];	$mod_stats_cha3 = $stat_cha[11];

	$saving_throws = bx_basic_saves($class, $cha_level);

	$attack_table = bx_basic_attacks($class, $cha_level);
		$attacks = explode("_", $attack_table);

	$level_table = bx_basic_level($class, $cha_level, $x_rand_xp, $max_spells_known, $stat_dex[0], $mod_stat_version);

	$hit_points = bx_basic_hit_points($class, $cha_level, $stat_con[0], $x_maxhp);

	$bonus_xp = bx_basic_xp_bonus($class, $stat_str[0], $stat_dex[0], $stat_con[0], $stat_wis[0], $stat_cha[0], $stat_int[0]);

	if (($x_sex == "Any") && (mt_rand(1,2) == 1)){$gender = "Male";} else if ($x_sex == "Any"){$gender = "Female";} else {$gender = $x_sex;}
	if ($x_name > 0){$my_name = bx_basic_name($class, $gender); $my_gender = $gender;}

	$character_age = bx_basic_age($class, $cha_level);

	$my_stuff = bx_basic_gear($class, $cha_level, $stat_dex[0], $x_relics, $x_var_dmg);
	if ($x_show_eq > 0)
	{
		$my_gear = $my_stuff[0] . packBuilder(1,0,$class,'BD&D');
		if ($x_output == "Character Sheets"){$coins_have = 0;} else {$coins_have = 1;}
		$pocket_change = bx_basic_pocket_change($cha_level,$coins_have);
		if ($x_relics > 0){ $magic_items = bx_basic_magic_items($cha_level, $class);
			if (($magic_items != "") && ($x_output == "Character Sheets")){$magic_items = ",&nbsp;&nbsp;&nbsp;&nbsp; " . $magic_items;}
		}
	}

	$magic_book = "";
	$my_notes = "";

	if (($x_show_me > 0) && ($x_name > 0)){ $my_notes = dressMeup($gender,$class,$class); }

	if ($x_show_ss > 0)
	{
		$maximum_spebx_level_for_class = $level_table[4];
		if ($level_table[0] != "")
		{
			$magic_book = str_replace(" ", "&nbsp;", $level_table[0]);
			$magic_book = str_replace("_", ",&nbsp;&nbsp;&nbsp;&nbsp; ", $magic_book);
			$magic_book = "Spell Book:&nbsp;&nbsp;&nbsp;&nbsp; " . $magic_book;
		}
		if ($x_output == "Character Sheets"){ if ($my_notes != ""){ $my_notes = $my_notes . "<br><br>" . $magic_book; } else { $my_notes = $magic_book; } }
		else { $my_spebx_book = $magic_book; }
	}

	if ($x_output == "Character Sheets")
	{
		$sheet_high_adjust = -20;
		?>
		<div style="position:relative; left:3px; top:0px; width:700px;" width="700" height="905">
			<img style="position:relative; left:0px; top:0px;" src="pics_tools/<?php echo $sheet_used; ?>" width="700" height="905">
			<p style="z-index:100; position:absolute; color:black; font-size:16px; left:53px; top:<?php echo 60+$sheet_high_adjust; ?>px; width: 220px;"><?php echo $my_name; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:16px; left:53px; top:<?php echo 120+$sheet_high_adjust; ?>px; width: 220px;"><?php echo $my_gender; ?> <?php echo $class; ?></p>

			<p style="z-index:100; position:absolute; color:black; font-size:16px; left:325px; top:<?php echo 60+$sheet_high_adjust; ?>px; width: 80px;"><?php if ($x_show_al>0){echo bx_basic_alignment();} ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:16px; left:240px; top:<?php echo 120+$sheet_high_adjust; ?>px; width: 80px; text-align: center;"><?php echo $cha_level; ?></p>

			<?php if ($x_show_age>0){ ?><p style="z-index:100; position:absolute; color:black; font-size:16px; left:325px; top:<?php echo 120+$sheet_high_adjust; ?>px; width: 80px; text-align: center;"><?php echo $character_age; ?></p><?php } ?>

			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:57px; top:<?php echo 328+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $stat_str[0]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:57px; top:<?php echo 381+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $stat_int[0]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:57px; top:<?php echo 434+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $stat_wis[0]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:57px; top:<?php echo 487+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $stat_dex[0]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:57px; top:<?php echo 540+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $stat_con[0]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:57px; top:<?php echo 593+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $stat_cha[0]; ?></p>

			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:430px; top:<?php echo 343+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $saving_throws[0]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:430px; top:<?php echo 407+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $saving_throws[1]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:430px; top:<?php echo 467+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $saving_throws[2]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:430px; top:<?php echo 530+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $saving_throws[3]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:430px; top:<?php echo 592+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $saving_throws[4]; ?></p>

			<p style="z-index:100; position:absolute; color:black; font-size:20px; left:232px; top:<?php echo 336+$sheet_high_adjust; ?>px; width: 160px; text-align: center;"><?php echo $stat_str[1]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:<?php echo $mod_font_size; ?>px; left:250px; top:<?php echo 389+$mod_font_move+$sheet_high_adjust; ?>px; width: 141px; text-align: center;"><?php echo $stat_int[1]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:<?php echo $mod_font_size; ?>px; left:232px; top:<?php echo 442+$mod_font_move+$sheet_high_adjust; ?>px; width: 160px; text-align: center;"><?php echo $stat_wis[1]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:20px; left:232px; top:<?php echo 495+$sheet_high_adjust; ?>px; width: 160px; text-align: center;"><?php echo $stat_dex[1]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:<?php echo $mod_font_size; ?>px; left:250px; top:<?php echo 548+$mod_font_move+$sheet_high_adjust; ?>px; width: 141px; text-align: center;"><?php echo $stat_con[1]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:20px; left:232px; top:<?php echo 601+$sheet_high_adjust; ?>px; width: 160px; text-align: center;"><?php echo $stat_cha[1]; ?></p>

			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:280px; top:<?php echo 175+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $hit_points; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:24px; left:127px; top:<?php echo 175+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php $my_armor = (9+$my_stuff[1]); if ($my_armor > 9){$my_armor=9;} echo $my_armor; ?></p>

			<p style="z-index:100; position:absolute; color:black; font-size:18px; left:239px; top:<?php echo 871+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $attacks[0]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:18px; left:284px; top:<?php echo 871+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $attacks[1]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:18px; left:327px; top:<?php echo 871+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $attacks[2]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:18px; left:371px; top:<?php echo 871+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $attacks[3]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:18px; left:415px; top:<?php echo 871+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $attacks[4]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:18px; left:457px; top:<?php echo 871+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $attacks[5]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:18px; left:503px; top:<?php echo 871+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $attacks[6]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:18px; left:548px; top:<?php echo 871+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $attacks[7]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:18px; left:592px; top:<?php echo 871+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $attacks[8]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:18px; left:637px; top:<?php echo 871+$sheet_high_adjust; ?>px; width: 31px; text-align: center;"><?php echo $attacks[9]; ?></p>

			<p style="z-index:100; position:absolute; color:black; font-size:14px; left:135px; top:<?php echo 677+$sheet_high_adjust; ?>px; width: 536px; text-align: left; height: 72px;"><?php echo bx_languages($x_lang_set,$class,$languages_known,$x_lang_aec); ?></p>

			<p style="z-index:100; position:absolute; color:black; font-size:14px; left:50px; top:<?php echo 730+$sheet_high_adjust; ?>px; width: 587px; text-align: left; height: 72px;"><?php if ($x_show_sk > 0){echo $level_table[1];} ?></p>
		</div>
		<div style='page-break-after: always; height:1px;'>&nbsp;</div>
		<div style="position:relative; left:3px; top:0px;" width="700" height="905">
			<img style="position:relative; left:0px; top:0px;" src="pics_tools/bx_char_sheet_notes.jpg" width="700" height="905">
			<p style="z-index:100; position:absolute; color:black; font-size:16px; left:57px; top:<?php echo 55+$sheet_high_adjust; ?>px; width: 580px; text-align: left; height: 254px;"><?php echo $my_gear . $magic_items; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:16px; left:57px; top:<?php echo 400+$sheet_high_adjust; ?>px; width: 580px; text-align: left; height: 268px;"><?php echo $my_notes; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:16px; left:150px; top:<?php echo 750+$sheet_high_adjust; ?>px; width: 230px; text-align: left; height: 74px;"><?php echo $pocket_change; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:18px; left:450px; top:<?php echo 750+$sheet_high_adjust; ?>px; width: 123px; text-align: center;"><?php if ($level_table[2] != "0"){echo $level_table[2];} ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:14px; left:450px; top:<?php echo 785+$sheet_high_adjust; ?>px; width: 123px; text-align: center;"><?php echo $bonus_xp[0]; ?></p>
			<p style="z-index:100; position:absolute; color:black; font-size:18px; left:530px; top:<?php echo 852+$sheet_high_adjust; ?>px; width: 123px; text-align: center;"><?php if ($level_table[3] != "0"){echo $level_table[3];} else {echo "Max Level";} ?></p>
		</div>
		<div style='page-break-after: always; height:1px;'>&nbsp;</div>
		<?php
	}
	else
	{
		if (($x_img + $x_show_sk + $x_show_eq + $x_show_me + x_show_ss) > 2){$when_to_break = 1;}
		else if (($x_img + $x_show_sk + $x_show_eq + $x_show_me + x_show_ss) > 1){$when_to_break = 2;}
		else {$when_to_break = 3;}
	?>
      <div align='center'><table width="700" border="0" cellspacing="0" cellpadding="0">
		<?php if ($show_rules != 1){ $show_rules = 1; ?>
        <tr style="font-size:12px;">
          <td colspan="22">
			<img border="0" src="pics_tools/aguild2.jpg" width="382" height="49"><br>
			Each adventurer is listed below with their strength (ST), intelligence (IN), wisdom (WS), dexterity (DX), constitution (CN), charisma (CH), level (LV), hit points (HP), armor class (AC), <?php if ($x_show_al>0){ echo "alignment (AL), "; } ?> gender (GD), <?php if ($x_show_age>0){ echo "age, "; } ?> and experience reward modifier (XM). Their saving throws are listed for poison or death (PD), magic wand (MW), turn to stone or paralysis (TP), dragon breath (DB), and spells or magic staff (SP). Thier attack table is displayed from armor classes 0 through 9. Their bonuses are listed for hit/damage and forcing doors (SB), armor class modifiers (AB), missile attack modifiers (MA), initiative bonus (IB), hit point modifiers (CB), additional languages (LG), saving throw modifiers for magical effects (SM), reaction adjustments (RA), retainers allowed (RT), and retainer morale (RM). Other than magical armors listed, any other magical devices are not incorporated into the values presented, such as armor class bonus rings of protection.
			<hr width="700" color="#000000">
		  </td>
        </tr>
		<?php } ?>
        <tr style="font-size:12px;">
          <td colspan="10"><strong>Name:</strong> <?php echo $my_name; ?></td>
          <td colspan="4"><strong>XP:</strong> <?php if ($level_table[2] != "0"){echo $level_table[2];} ?></td>
          <td colspan="5"><strong>XP Needed:</strong> <?php if ($level_table[3] != "0"){echo $level_table[3];} else {echo "Max Level";} ?></td>
          <td colspan="3" align="right"><strong>Class:</strong> <?php echo $class; ?></td>
        </tr>
        <tr style="font-size:12px; text-align: center;">
          <td colspan="22"><hr /></td>
        </tr>
        <tr style="font-size:12px; text-align: center; font-weight: bold;">
          <td width="4%">ST</td>
          <td width="4%">IN</td>
          <td width="4%">WS</td>
          <td width="4%">DX</td>
          <td width="4%">CN</td>
          <td width="4%">CH</td>
          <td width="4%">&nbsp;</td>
          <td width="4%">LV</td>
          <td width="4%">HP</td>
          <td width="4%">AC</td>
          <td width="4%">&nbsp;</td>
          <td width="6%">&nbsp;</td>
          <td width="5%"><?php if ($x_show_al>0){ echo "AL"; } else { echo "&nbsp;";} ?></td>
          <td width="5%">GD</td>
          <td width="5%">XM</td>
          <td width="5%"><?php if ($x_show_age>0){ echo "Age"; } else { echo "&nbsp;";} ?></td>
          <td width="5%">&nbsp;</td>
          <td width="5%">PD</td>
          <td width="5%">MW</td>
          <td width="5%">TP</td>
          <td width="5%">DB</td>
          <td width="5%">SP</td>
        </tr>
        <tr style="font-size:12px; text-align: center;">
          <td width="4%"><?php echo $stat_str[0]; ?></td>
          <td width="4%"><?php echo $stat_int[0]; ?></td>
          <td width="4%"><?php echo $stat_wis[0]; ?></td>
          <td width="4%"><?php echo $stat_dex[0]; ?></td>
          <td width="4%"><?php echo $stat_con[0]; ?></td>
          <td width="4%"><?php echo $stat_cha[0]; ?></td>
          <td width="4%">&nbsp;</td>
          <td width="4%"><?php echo $cha_level; ?></td>
          <td width="4%"><?php echo $hit_points; ?></td>
          <td width="4%"><?php $my_armor = (9+$my_stuff[1]); if ($my_armor > 9){$my_armor=9;} echo $my_armor; ?></td>
          <td width="4%">&nbsp;</td>
          <td width="6%">&nbsp;</td>
          <td width="5%"><?php if ($x_show_al>0){ echo substr(bx_basic_alignment(), 0, 1);} else { echo "&nbsp;";} ?></td>
          <td width="5%"><?php if ($gender == "Male"){echo "M";} else {echo "F";} ?></td>
          <td width="5%"><?php echo $bonus_xp[1]; ?></td>
          <td width="5%"><?php if ($x_show_age>0){ echo $character_age; } else { echo "&nbsp;";} ?></td>
          <td width="5%">&nbsp;</td>
          <td width="5%"><?php echo $saving_throws[0]; ?></td>
          <td width="5%"><?php echo $saving_throws[1]; ?></td>
          <td width="5%"><?php echo $saving_throws[2]; ?></td>
          <td width="5%"><?php echo $saving_throws[3]; ?></td>
          <td width="5%"><?php echo $saving_throws[4]; ?></td>
        </tr>
        <tr>
          <td colspan="22"><hr /></td>
        </tr>
        <tr style="font-size:12px; text-align: center; font-weight: bold;">
          <td width="4%"><em>AC</em></td>
          <td width="4%"><em>9</em></td>
          <td width="4%"><em>8</em></td>
          <td width="4%"><em>7</em></td>
          <td width="4%"><em>6</em></td>
          <td width="4%"><em>5</em></td>
          <td width="4%"><em>4</em></td>
          <td width="4%"><em>3</em></td>
          <td width="4%"><em>2</em></td>
          <td width="4%"><em>1</em></td>
          <td width="4%"><em>0</em></td>
          <td width="6%">&nbsp;</td>
          <td width="5%">SB</td>
          <td width="5%">AB</td>
          <td width="5%">MA</td>
          <td width="5%">IB</td>
          <td width="5%">CB</td>
          <td width="5%">LG</td>
          <td width="5%">SM</td>
          <td width="5%">RA</td>
          <td width="5%">RT</td>
          <td width="5%">RM</td>
        </tr>
        <tr style="font-size:12px; text-align: center;">
          <td width="4%"><em>Roll</em></td>
          <td width="4%"><em><?php echo $attacks[0]; ?></em></td>
          <td width="4%"><em><?php echo $attacks[1]; ?></em></td>
          <td width="4%"><em><?php echo $attacks[2]; ?></em></td>
          <td width="4%"><em><?php echo $attacks[3]; ?></em></td>
          <td width="4%"><em><?php echo $attacks[4]; ?></em></td>
          <td width="4%"><em><?php echo $attacks[5]; ?></em></td>
          <td width="4%"><em><?php echo $attacks[6]; ?></em></td>
          <td width="4%"><em><?php echo $attacks[7]; ?></em></td>
          <td width="4%"><em><?php echo $attacks[8]; ?></em></td>
          <td width="4%"><em><?php echo $attacks[9]; ?></em></td>
          <td width="6%">&nbsp;</td>
          <td width="5%"><?php echo str_replace("0", "-", $mod_stats_str); ?></td>
          <td width="5%"><?php echo str_replace("0", "-", $mod_stats_dex1); ?></td>
          <td width="5%"><?php echo str_replace("0", "-", $mod_stats_dex2); ?></td>
          <td width="5%"><?php echo str_replace("0", "-", $mod_stats_dex3); ?></td>
          <td width="5%"><?php echo str_replace("0", "-", $mod_stats_con); ?></td>
          <td width="5%"><?php echo str_replace("0", "-", $mod_stats_int); ?></td>
          <td width="5%"><?php echo str_replace("0", "-", $mod_stats_wis); ?></td>
          <td width="5%"><?php echo str_replace("0", "-", $mod_stats_cha1); ?></td>
          <td width="5%"><?php echo str_replace("0", "-", $mod_stats_cha2); ?></td>
          <td width="5%"><?php echo str_replace("0", "-", $mod_stats_cha3); ?></td>
        </tr>

		<?php if ($x_show_me > 0){ ?>
			<tr style="font-size:12px;">
			  <td colspan="22"><hr /></td>
			</tr>
			<tr style="font-size:12px;">
			  <td colspan="22"><strong>Description:</strong>&nbsp;<?php echo $my_notes; ?></td>
			</tr>
		<?php } ?>

		<?php 
			$my_abilities = "";
			$my_abilities = $my_abilities . bx_languages($x_lang_set,$class,$languages_known,$x_lang_aec) . "<br>";
			if ($level_table[1] != ""){ $my_abilities = $my_abilities . $level_table[1] . "<br>"; }
			if (my_spebx_book != ""){ $my_abilities = $my_abilities . $my_spebx_book . "<br>"; }
			$my_abilities = substr($my_abilities, 0, -4);
		if (($x_show_sk > 0) && ($my_abilities != "")){?>
			<tr style="font-size:12px;">
			  <td colspan="22"><hr /></td>
			</tr>
			<tr style="font-size:12px;">
			  <td colspan="22"><strong>Abilities:</strong>&nbsp;<?php echo $my_abilities; ?>
				
			  </td>
			</tr>
		<?php } else { ?>
			<tr style="font-size:12px;">
			  <td colspan="22"><hr /></td>
			</tr>
			<tr style="font-size:12px;">
			  <td colspan="22"><strong>Languages:</strong>&nbsp;<?php echo bx_languages($x_lang_set,$class,$languages_known,$x_lang_aec); ?></td>
			</tr>
		<?php } ?>

		<?php if ($x_show_eq > 0){ ?>
			<tr style="font-size:12px;">
			  <td colspan="22"><hr /></td>
			</tr>
			<tr style="font-size:12px;">
			  <td colspan="22"><strong>Equipment:</strong>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $my_gear; ?><?php if ($magic_items != ""){echo ",&nbsp;&nbsp;&nbsp;&nbsp; ";} echo $magic_items . $pocket_change; ?></td>
			</tr>
		<?php } ?>

      </table></div>
	<?php

		if ($breaker >= $when_to_break){echo "<div style='page-break-after: always; height:1px;'>&nbsp;</div>"; $breaker = 0;} else {$breaker = $breaker + 1;}

		if (($x_img > 0) && ($x_qty > 0)){?><p align="center"><img border="0" src="pics_tools/aguild1.jpg" width="650" height="55"></p><?php } else if ($x_qty > 0){ ?><hr width="700" color="#000000"><?php }
	}

	$x_qty = $x_qty - 1;

endwhile;

echo "<p>&nbsp;</p><p>&nbsp;</p>";

$bottom_notices = 13;

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>