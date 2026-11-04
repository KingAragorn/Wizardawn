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

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>The Dungeon Door</p>";
	echo "<p style='text-align: justify;'>Welcome to the Dungeon Door. This tool will give you an extensive listing of creatures, traps, treasure, containers, and other items that go with the exploration of a dangerous dungeon. You can use this listing for help with those impromptu games. You may want to play an apocalyptic role-playing game without the need for a game master. Maybe you simply need some ideas to stock your own areas. Whatever the reason, prepare to delve into the dungeon. Select the 'Rules' if you have no game master or want to play a solitaire game.";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_package'>";
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cull">Dungeon Level:</span>
			<?php if ($x_game == "Swords & Six-Siders"){ ?>
				<span class="cell"><select size="1" id="DropOption" name="x_level"><option></option><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?><option value='100'>6+</option></select></span>
			<?php } else { ?>
				<span class="cell"><select size="1" id="DropOption" name="x_level"><option></option><?php $runner=19; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?><option value='100'>20+</option></select></span>
			<?php } ?>
			</div>
			<div class="row">
				<span class="cull">Include...</span>
				<span class="cell">&nbsp;</span>
			</div>
			<div class="row">
				<span class="cull">Rules:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_ru" value="1"></span>
			</div>
<?php if ($x_game == "OSRIC"){ ?>
			<div class="row">
				<span class="cull">Monster of Myth</span>
				<span class="cell"><input type="checkbox" name="x_extra" value="1"></span>
			</div>
<?php } ?>
<?php if ($x_game == "AD&D"){ ?>
			<div class="row">
				<span class="cull">Fiend Folio:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="dd_ff" value="1"></span>
			</div>
			<div class="row">
				<span class="cull">Monster Manual II:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="dd_mm2" value="1"></span>
			</div>
			<div class="row">
				<span class="cull">Unearthed Arcana:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="ua" value="1"></span>
			</div>
<?php } ?>
<?php if ($x_game == "Labyrinth Lord"){ ?>
			<div class="row">
				<span class="cull">AEC:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="aec" value="1"></span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cull">Mundane Items:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_mi" value="1" checked></span>
			</div>
			<div class="row">
				<span class="cull">Unusual Items:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_ui" value="1" checked></span>
			</div>
			<div class="row">
				<span class="cull">Room Traps:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_rt" value="1" checked></span>
			</div>
			<div class="row">
				<span class="cull">Containers:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_c" value="1" checked></span>
			</div>
			<div class="row">
				<span class="cull">Container Traps:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_ct" value="1" checked></span>
			</div>
			<div class="row">
				<span class="cull">Curses:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_cs" value="1" checked></span>
			</div>
			<div class="row">
				<span class="cull">Coins, Gems &amp; Jewels:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_ggj" value="1" checked></span>
			</div>
			<div class="row">
				<span class="cull">Exceptional Items:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_ei" value="1" checked></span>
			</div>
			<div class="row">
				<span class="cull">Treasure Hoards:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_th" value="1" checked></span>
			</div>
			<div class="row">
				<span class="cull">Encounters:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_en" value="1" checked></span>
			</div>
<?php if ($x_game == "Swords & Six-Siders" || $x_game == "BD&D"){?>
			<div class="row">
				<span class="cull">Show Descriptions:</span>
				<span class="cell"><input type="checkbox" id="InputOption" checked name="x_describe" value="1"></span>
			</div>
<?php } ?>
<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cull">Difficulty:</span>
				<span class="cell">
					<select size="1" id="DropOption" name="x_ttlvl">
						<option value="9">Easy</option>
						<option value="1" selected>Normal</option>
						<option value="2">Challenging</option>
						<option value="3">Difficult</option>
						<option value="4">Heroic</option>
						<option value="5">Epic</option>
					</select>
				</span>
			</div>
<?php } ?>
<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cull">Weapons/Armor:</span>
				<span class="cell"><input type="radio" value="0" checked id="InputOption" name="x_oldway">Use T&amp;T Items...or...<input type="radio" value="1" id="InputOption" name="x_oldway">Use Magestykc Items</span>
			</div>
<?php } ?>
<?php if ( ($x_game == "OSRIC") || ($x_game == "Swords & Six-Siders") || ($x_game == "AD&D") || ($x_game == "BD&D") || ($x_game == "BFRPG") || ($x_game == "Labyrinth Lord") || ($x_game == "Swords & Wizardry") ){ ?>
			<div class="row">
				<span class="cull">Magic Items:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_whichmagic"><option>50</option><?php $runner=101; $running=0; while ($runner > 0) : echo "<option>" . $running . "</option>"; $runner = $runner-1; $running = $running+1; endwhile; ?></select> % from the Game &amp; the remaining created by Wizardawn</span>
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

$x_game = $_POST['x_package'];

$x_describe = $_POST['x_describe'];
	$show_detail_monster_info = $x_describe;
$x_extra = $_POST['x_extra'];
$x_whichmagic = $_POST['x_whichmagic'];

$x_oldway = $_POST['x_oldway']; // USED FOR T&T CLASSIC WEAPONS/ARMOR...OR THE SIMPLE WEAPONS/ARMOR
	if ($x_oldway == 1){ $_SESSION['tt_easy_items'] = 1; } else { unset($_SESSION['tt_easy_items']); }

	if (($x_game == "OSRIC") && ($x_extra > 0))
	{
		$take = "(creator='OSRIC' OR creator='MoM')";
		$bottom_notices = 1;
	}
	else if ($x_game == "OSRIC")
	{
		$take = "creator='OSRIC'";
		$bottom_notices = 1;
	}
	else if ($x_game == "Labyrinth Lord")
	{
		$aec = $_SESSION["SESSION_ADD_AEC"] = $_POST['aec']+0;
		if ($aec > 0){$take = "(creator LIKE 'AEC%' OR creator LIKE 'LL%')";}
		else {$take = "(creator LIKE 'LL%')";}
		$bottom_notices = 2;
	}
	else if ($x_game == "Swords & Wizardry")
	{
		$take = "creator='SW'";
		$bottom_notices = 5;
	}
	else if ($x_game == "BFRPG")
	{
		$take = "creator='BFRPG'";
		$bottom_notices = 11;
	}
	else if ($x_game == "AD&D")
	{
		$dd_ff = $_SESSION["SESSION_ADD_FF"] = $_POST['dd_ff'];
		$dd_mm2 = $_SESSION["SESSION_ADD_MM2"] = $_POST['dd_mm2'];
		$ua = $_SESSION["SESSION_ADD_UA"] = $_POST['ua']+0;
		$take = "(creator LIKE 'SRC: MM %' OR ";
		if ($dd_ff > 0){$take = $take . "creator LIKE 'SRC: FF %' OR ";}
		if ($dd_mm2 > 0){$take = $take . "creator LIKE 'SRC: MM2 %' OR ";}
		$take = $take . "creator = 'ADDDD')";
		$bottom_notices = 13;
	}
	else if ($x_game == "Swords & Six-Siders")
	{
		$take = "creator='SX'";
		$bottom_notices = 18;
	}
	else if ($x_game == "BD&D")
	{
		$take = "creator='BX'";
		$bottom_notices = 13;
	}
	else if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
	{
		$take = "creator='TT'";
		$bottom_notices = 7;
		$x_extra = $ttlvl = $_POST['x_ttlvl'];
	}
	else
	{
		$take = "creator='WIZ'";
	}

$x_level = $_POST['x_level']+0;

$x_show_ru = $_POST['x_show_ru'];
$x_show_mi = $_POST['x_show_mi'];
$x_show_ui = $_POST['x_show_ui'];
$x_show_rt = $_POST['x_show_rt'];
$x_show_c = $_POST['x_show_c'];
$x_show_ct = $_POST['x_show_ct'];
$x_show_cs = $_POST['x_show_cs'];
$x_show_ggj = $_POST['x_show_ggj'];
$x_show_ei = $_POST['x_show_ei'];
$x_show_th = $_POST['x_show_th'];
$x_show_en = $_POST['x_show_en'];

$barw = 4;
?>

<img border="0" src="pics_tools/tools_dungeon_door.jpg">
<?php if ($x_show_ru > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/tools_dungeon_door_rules.jpg">
<?php if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){$y_rulez = 5;} else {$y_rulez = 1;} include("functions/rules.php"); ?>
<?php } if ($x_show_mi > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/tools_dungeon_door_mundane_items.jpg">
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">

	<?php $runit = 100; if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { $runit = 96; ?>
		<tr>
			<td height="25" style="border-top: 1px solid #000000" width="40" align="center"><img src="pics_tools/dice_5.jpg"></td>
			<td height="25" style="border-top: 1px solid #000000"><font size="2">Roll 1d6 for the S#, and then 3d6 for the results in that section.</font></td>
		</tr>
	<?php } ?>

	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2"><?php if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { echo "&nbsp;&nbsp;Result&nbsp;&nbsp;"; } else { echo "Roll 1d00"; } ?></font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">&nbsp;&nbsp;&nbsp;Mundane Items</font></b></td>
	</tr>
	<?php $dice = 0; $sval = 1; $mundane = $runit; while ($mundane > 0) :

			$dice = $dice + 1;

			if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
			{
				if ($dice < 3){$dice = 3;}
				if ($dice > 18){ $dice = 3; $sval = $sval + 1; }
				$rollers = "S" . $sval . "/" . $dice;
			}
			else
			{
				$rollers = $dice;
			}

		$decorate = mt_rand(3,13);
		$decoration = "";
		while ($decorate > 0) :
			$items = stuffMakerRoom(1,$x_game,$x_extra,mt_rand(1,30));
			$decorate = $decorate - 1;
			$decoration = $decoration . $items[4];
		endwhile;
	?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $rollers; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo substr($decoration, 2); ?></font></td>
	</tr>	
	<?php $mundane = $mundane - 1; endwhile; ?>
	</table>
<?php } if ($x_show_ui > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/tools_dungeon_door_unusual_items.jpg"><br>
	<?php $runit = 20; $dice = 0; $roller = "Roll 1d20"; if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { $runit = 16; $dice = 2; $roller = "Roll 3d6"; } ?>
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2"><?php echo $roller; ?></font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">&nbsp;&nbsp;&nbsp;Unusual Item</font></b></td>
	</tr>
	<?php $unusual = $runit; while ($unusual > 0) : $dice = $dice + 1; ?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo lcfirst(specialMakerRoom(100,1,mt_rand(1,40),$x_game,$x_extra)); ?></font></td>
	</tr>	
	<?php $unusual = $unusual - 1; endwhile; ?>
	</table>
<?php } if ($x_show_rt > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/tools_dungeon_door_room_traps.jpg">
	<?php $runit = 20; $dice = 0; $roller = "Roll 1d20"; if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { $runit = 16; $dice = 2; $roller = "Roll 3d6"; } ?>
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2"><?php echo $roller; ?></font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">&nbsp;&nbsp;&nbsp;Room Trap</font></b></td>
	</tr>
	<?php $traps = $runit; while ($traps > 0) : if ($x_level > 0){} else if ($x_game == "Swords & Six-Siders"){$x_level = mt_rand(1,6);} else {$x_level = mt_rand(1,20);} $dice = $dice + 1; 
		$trap = trapMaker($x_level,room,$x_game,$x_extra,0); $trap = substr($trap[0], 21); ?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo lcfirst($trap); ?></font></td>
	</tr>	
	<?php $traps = $traps - 1; endwhile; ?>
	</table>
<?php } if ($x_show_c > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/tools_dungeon_door_containers.jpg">
	<?php $runit = 20; $dice = 0; $roller = "Roll 1d20"; if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { $runit = 16; $dice = 2; $roller = "Roll 3d6"; } ?>
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2"><?php echo $roller; ?></font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">&nbsp;&nbsp;&nbsp;Large Container</font></b></td>
		<td width="20" align="center" style="border-top: 1px solid #000000"><b><font size="2">&nbsp;</font></b></td>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2"><?php echo $roller; ?></font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">&nbsp;&nbsp;&nbsp;Small Container</font></b></td>
	</tr>
	<?php $box = $runit; while ($box > 0) : $dice = $dice + 1; ?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php 

			if (mt_rand(1,100) > 25){
				$deco = "";
				switch (mt_rand(0,8))
				{
				case 0:	$deco = "ornate ";		break;
				case 1:	$deco = "huge ";		break;
				case 2:	$deco = "large ";		break;
				case 3:	$deco = "decorative ";	break;
				case 4:	$deco = "large ";		break;
				case 5:	$deco = "huge ";		break;
				case 6:	$deco = "";				break;
				case 7:	$deco = "";				break;
				case 8:	$deco = "";				break;
				}
				echo $deco . boxMakerRoom(); 
			}
			else
			{
				$deco = "";
				switch (mt_rand(0,1))
				{
				case 0:	$deco = "huge ";		break;
				case 1:	$deco = "large ";		break;
				}
				echo $deco . bagCreator(); 
			}
			?></font></td>
		<td width="20" align="center" style="border-top: 1px solid #000000"><font size="2">&nbsp;</font></td>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php 

			if (mt_rand(1,100) > 25){

				switch (mt_rand(0,2))
				{
				case 0:	$deco = "small ";		break;
				case 1:	$deco = "little ";		break;
				case 2:	$deco = "medium ";		break;
				}
				echo $deco . bagCreator(); 
			}
			else
			{
				switch (mt_rand(0,4))
				{
				case 0:	$deco = "little ";		break;
				case 1:	$deco = "small ";		break;
				case 2:	$deco = "";				break;
				case 3:	$deco = "";				break;
				case 4:	$deco = "";				break;
				}
				echo $deco . boxMakerRoom(); 
			}
			?></font></td>
	</tr>	
	<?php $box = $box - 1; endwhile; ?>
	</table>
<?php } if ($x_show_ct > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/tools_dungeon_door_treasure_traps.jpg">
	<?php $runit = 20; $dice = 0; $roller = "Roll 1d20"; if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { $runit = 16; $dice = 2; $roller = "Roll 3d6"; } ?>
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2"><?php echo $roller; ?></font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">&nbsp;&nbsp;&nbsp;Container Trap</font></b></td>
	</tr>
	<?php $traps = $runit; while ($traps > 0) : if ($x_level > 0){} else if ($x_game == "Swords & Six-Siders"){$x_level = mt_rand(1,6);} else {$x_level = mt_rand(1,20);} $dice = $dice + 1; 
		$trap = trapMaker($x_level,box,$x_game,$x_extra,0); $trap = $trap[0]; ?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo lcfirst($trap); ?></font></td>
	</tr>	
	<?php $traps = $traps - 1; endwhile; ?>
	</table>
<?php } if ($x_show_cs > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/tools_dungeon_door_curses.jpg">
	<?php $runit = 20; $dice = 0; $roller = "Roll 1d20"; if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { $runit = 16; $dice = 2; $roller = "Roll 3d6"; } ?>
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2"><?php echo $roller; ?></font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">&nbsp;&nbsp;&nbsp;Curse</font></b></td>
	</tr>
	<?php $curse = $runit; while ($curse > 0) : if ($x_level > 0){} else if ($x_game == "Swords & Six-Siders"){$x_level = mt_rand(1,6);} else {$x_level = mt_rand(1,20);} $dice = $dice + 1; ?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo curseType($x_level,person,item,$x_game); ?></font></td>
	</tr>	
	<?php $curse = $curse - 1; endwhile; ?>
	</table>
<?php } if ($x_show_ggj > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/tools_dungeon_door_loot.jpg">
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">

	<?php $runit = 50; if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { $runit = 48; ?>
		<tr>
			<td height="25" style="border-top: 1px solid #000000" width="40" align="center"><img src="pics_tools/dice_5.jpg"></td>
			<td height="25" colspan="4" style="border-top: 1px solid #000000"><font size="2">Roll 1d6 for the S#, and then 3d6 for the results in that section.</font></td>
		</tr>
	<?php } ?>

	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2"><?php if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { echo "&nbsp;&nbsp;Result&nbsp;&nbsp;"; } else { echo "Roll 1d00"; } ?></font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">&nbsp;&nbsp;&nbsp;Coins, Gems, Jewels</font></b></td>
		<td width="20" align="center" style="border-top: 1px solid #000000"><b><font size="2">&nbsp;</font></b></td>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2"><?php if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { echo "&nbsp;&nbsp;Result&nbsp;&nbsp;"; } else { echo "Roll 1d00"; } ?></font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">&nbsp;&nbsp;&nbsp;Coins, Gems, Jewels</font></b></td>
	</tr>
	<?php $dice = 0; $sval = 1; $loot = $runit; while ($loot > 0) :

			$dice = $dice + 1;

			if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
			{
				if ($dice < 3){$dice = 3;}
				if ($dice > 18){ $dice = 3; $sval = $sval + 1; }
				$rollers = "S" . $sval . "/" . $dice;
			}
			else
			{
				$rollers = $dice;
			}

			$the_loot = mt_rand(1,100);
			$x_cut = mt_rand(5,10); if ($x_game == "Swords & Six-Siders"){$x_cut = mt_rand(1,2);}
			if ($x_level > 0){} else if ($x_game == "Swords & Six-Siders"){$x_level = mt_rand(1,6);} else {$x_level = mt_rand(1,20);}
			if ($the_loot < 60){$the_prize = currencyBuilder($x_level,3,0,$x_cut,0,$x_game);}
			else if ($the_loot < 80){$the_prize = otherThanCoins(3,$x_cut,$x_game,1,$x_level);}
			else if ($the_loot < 90){$the_prize = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator($x_cut));}
			else {$the_prize = "JEWELRY:&nbsp;" . ucwords(jewelCreator($x_cut));}
	?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $rollers; $dice = $dice + 1; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo $the_prize; 
			$the_loot = mt_rand(1,100);
			$x_cut = mt_rand(5,10); if ($x_game == "Swords & Six-Siders"){$x_cut = mt_rand(1,2);}
			if ($x_level > 0){} else if ($x_game == "Swords & Six-Siders"){$x_level = mt_rand(1,6);} else {$x_level = mt_rand(1,20);}
			if ($the_loot < 60){$the_prize = currencyBuilder($x_level,3,0,$x_cut,0,$x_game);}
			else if ($the_loot < 80){$the_prize = otherThanCoins(3,$x_cut,$x_game,1,$x_level);}
			else if ($the_loot < 90){$the_prize = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator($x_cut));}
			else {$the_prize = "JEWELRY:&nbsp;" . ucwords(jewelCreator($x_cut));}

			if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
			{
				if ($dice < 3){$dice = 3;}
				if ($dice > 18){ $dice = 3; $sval = $sval + 1; }
				$rollers = "S" . $sval . "/" . $dice;
			}
			else
			{
				$rollers = $dice;
			}

		?></font></td>
		<td width="20" align="center" style="border-top: 1px solid #000000"><font size="2">&nbsp;</font></td>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $rollers; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo $the_prize; ?></font></td>
	</tr>	
	<?php $loot = $loot - 1; endwhile; ?>
	</table>
<?php } if ($x_show_ei > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/tools_dungeon_door_treasure.jpg">
	<?php $runit = 20; $dice = 0; $roller = "Roll 1d20"; if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { $runit = 16; $dice = 2; $roller = "Roll 3d6"; } ?>
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2"><?php echo $roller; ?></font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">&nbsp;&nbsp;&nbsp;Exceptional Item</font></b></td>
	</tr>
	<?php $loot = $runit; while ($loot > 0) : $dice = $dice + 1;
		if ($x_level > 0){} else if ($x_game == "Swords & Six-Siders"){$x_level = mt_rand(1,6);} else {$x_level = mt_rand(1,20);}
		if ($x_whichmagic >= mt_rand(1,100))
		{
			$the_prize = makeRPGmagic($x_game,0);
		}
		else
		{
			if (mt_rand(1,100) > 10){$the_prize = makeMagicItem($x_level,3,0,$x_game,0,0);}
			else {$the_prize = makeNiceItem(3,$x_cut,$x_game);}
		}
	?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo $the_prize; ?></font></td>
	</tr>	
	<?php $loot = $loot - 1; endwhile; ?>
	</table>
<?php } if ($x_show_th > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/tools_dungeon_door_treasure_hoards.jpg">
	<?php $runit = 20; $dice = 0; $roller = "Roll 1d20"; if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { $runit = 16; $dice = 2; $roller = "Roll 3d6"; } ?>
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2"><?php echo $roller; ?></font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">&nbsp;&nbsp;&nbsp;Treasure Hoard</font></b></td>
	</tr>
	<?php $loot = $runit; while ($loot > 0) : $my_hoard = ""; $bags_of_coins = 0; $dice = $dice + 1; $filled = mt_rand(5,15);
		while ($filled > 0) :
			if ($bags_of_coins > 0){$noco = 91;} else {$noco = 1;}
			$x_cut = mt_rand(5,10); if ($x_game == "Swords & Six-Siders"){$x_cut = mt_rand(1,2);}
			$loot_size = mt_rand(1,3);
			if ($x_level > 0){} else if ($x_game == "Swords & Six-Siders"){$x_level = mt_rand(1,6);} else {$x_level = mt_rand(1,20);}
			$my_reward = mt_rand($noco,100);
				if ($my_reward < 91)
				{
					$my_prize = currencyBuilder($x_level,$loot_size,0,$x_cut,1,$x_game);

					if (mt_rand(1,$rarecash) == 1)
					{
						$my_prize = otherThanCoins($loot_size,$x_cut,$x_game,1,$treasure_level);
					}
					$bags_of_coins = 1;
				}
				else if ($my_reward < 96){$my_prize = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator($x_cut));}
				else if ($my_reward < 98){$my_prize = "JEWELRY:&nbsp;" . ucwords(jewelCreator($x_cut));}
				else if (mt_rand(1,100) > 25){$my_prize = makeMagicItem($x_level,3,0,$x_game,0,0); if ($x_whichmagic == 1){ $my_prize = makeRPGmagic($x_game,0); }}
				else {$my_prize = makeNiceItem(3,$x_cut,$x_game); if ($x_whichmagic == 1){ $my_prize = makeRPGmagic($x_game,0); }}
					$my_hoard = $my_hoard . " ----- " . $my_prize;
			$filled = $filled - 1;
		endwhile;
	?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo substr($my_hoard, 7); ?></font></td>
	</tr>	
	<?php $loot = $loot - 1; endwhile; ?>
	</table>
<?php } if ($x_show_en > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/tools_dungeon_door_encounters.jpg">
<?php if ($x_game == "Fantasy"){echo "<br>"; $y_rulez = 2; include("functions/rules.php");}
	$table = "creatures" . createRandomCode();

	if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}

	$dice = 0;
	$sval = 1;

	$qry = "CREATE TEMPORARY TABLE $table SELECT * FROM monsters_rpgs WHERE $take AND location LIKE '%DG%' AND difficulty<=$f_level AND m_no_dungeon!=1";
	wz_query( $connection, $qry ); /*qry*/

	$qry = "SELECT * FROM monsters_rpgs WHERE $take AND location LIKE '%DG%' AND difficulty<=$f_level AND freq>1 AND m_no_dungeon!=1";
	$res = wz_query( $connection, $qry ); /*qry*/

	while ($ary=wz_fetch_array($res)) :

		$frequency = $ary[freq_code] - 1;

		while ($frequency > 0) :

			$qry = "INSERT INTO $table SELECT * FROM monsters_rpgs WHERE $take AND id=$ary[id]";
			wz_query( $connection, $qry ); /*qry*/

			$frequency = $frequency - 1;

		endwhile;

	endwhile;

		echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";


	$enc_numbers = 100; if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { $enc_numbers = 96; ?>
		<tr>
			<td height="25" style="border-top: 1px solid #000000" width="40" align="center"><img src="pics_tools/dice_5.jpg"></td>
			<td height="25" style="border-top: 1px solid #000000"><font size="2">Roll 1d6 for the S#, and then 3d6 for the results in that section.</font></td>
		</tr>
	<?php } if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")) { $rollup = "&nbsp;&nbsp;Result&nbsp;&nbsp;"; } else { $rollup = "Roll 1d00"; }


		echo "<tr><td align='center' width='40' NOWRAP style='border-top: 1px solid #000000'><font size='2'><b>" . $rollup . "</b></font></td>";
		echo "<td style='border-top: 1px solid #000000'><font size='2'><b>&nbsp;&nbsp;&nbsp;Encounter</b></font></td></tr>";

	while ($enc_numbers > 0) :

		$qry = "SELECT * FROM $table ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), 
			RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), 
			RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $enc_numbers";
		$res = wz_query( $connection, $qry ); /*qry*/

		while ($ary=wz_fetch_assoc($res)) :

			$show_detail_monster_info = $x_describe;
			include("functions/stat_blocks.php");

			if ($enc_numbers > 0)
			{
				$dice = $dice + 1;

				if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
				{
					if ($dice < 3){$dice = 3;}
					if ($dice > 18){ $dice = 3; $sval = $sval + 1; }
					$rollers = "S" . $sval . "/" . $dice;
				}
				else
				{
					$rollers = $dice;
				}

				echo "<tr><td align='center' width='40' NOWRAP style='border-top: 1px solid #000000'><font size='2'>" . $rollers . "</font></td>";
				echo "<td style='border-top: 1px solid #000000'><font size='2'>" . $monster_info . "</font></td></tr>";
				$count_wonders = $count_wonders - 1;
			}

			$enc_numbers = $enc_numbers - 1;

		endwhile;

	endwhile;

		echo "</table>";
	}

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>