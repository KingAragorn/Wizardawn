<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; } }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Mutant Future";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	include("game_options.php");

	if ($x_game == "Mutant Future")
	{
		$cash = "gold";
	}
	else if ($x_game == "Broken Urthe")
	{
		$cash = "xormite";
	}
	else if ($x_game == "Gamma World")
	{
		$cash = "domars";
	}
	else if ($x_game == "Metamorphosis Alpha")
	{
		$cash = "domars";
	}

	echo "<form style='margin-bottom:0; margin-top:0;' target='_blank' method='POST' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>The Apocalypse</p>";
	echo "<p style='text-align: justify;'>Welcome to the Apocalypse. This tool will give you an extensive listing of creatures, traps, relics, containers, and other items that go with the exploration of an apocalyptic environment. You can use this listing for help with those impromptu games. You may want to play an apocalyptic role-playing game without the need for a game master. Maybe you simply need some ideas to stock your own areas. Whatever the reason, prepare to delve into the apocalypse. Select the 'Rules' if you have no game master or want to play a solitaire game.";

	echo "<input type='hidden' value='" . $x_game . "' name='x_package'>";
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cull">Adventure Level:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_level"><option></option><?php $runner=19; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?><option value='100'>20+</option></select></span>
			</div>
		<?php if ($x_game != "Mutant Future"){ ?>
			<div class="row">
				<span class="cull">Mutants Only:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_mutants" value="1">*</span>
			</div>
		<?php } ?>
			<div class="row">
				<span class="cull">Currency:</span>
				<span class="cell"><input type="text" value="<?php echo $cash; ?>" id="InputOption" name="x_money" size="10"></span>
			</div>
			<div class="row">
				<span class="cull">Include...</span>
				<span class="cell">&nbsp;</span>
			</div>
			<div class="row">
				<span class="cull">Rules:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_ru" value="1"></span>
			</div>
			<div class="row">
				<span class="cull">Mundane Items:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_mi" value="1" checked></span>
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
				<span class="cull">Money:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_ggj" value="1" checked></span>
			</div>
			<div class="row">
				<span class="cull">Exceptional Items:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_ei" value="1" checked></span>
			</div>
			<div class="row">
				<span class="cull">Hoards of Goods:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_th" value="1" checked></span>
			</div>
			<div class="row">
				<span class="cull">Encounters:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_show_en" value="1" checked></span>
			</div>
		</div>

		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create">

<?php if ($x_game != "Mutant Future") { ?>
		<br></p><p style='text-align: justify;'>*If you do not want any animals from the present, check this box and they will be mutated.
<?php } ?>
<?php if ($x_game == "Gamma World" || $x_game == "Metemorphosis Alpha") { ?>
		<br></p><p style='text-align: justify;'>The creatures used here are converted from the Wizardawn post-apocalyptic game, Broken Urthe.
<?php } ?>

		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

$x_mutants = $_POST['x_mutants'];
$x_tech = mt_rand(0,1);
$x_game = $_POST['x_package'];

	if ($x_game == "Mutant Future")
	{
		$take = "creator='MF'";
		$bottom_notices = 3;
		$x_mutants = 0;
		$x_might1 = 1;
		$x_might2 = 8;
	}
	else
	{
		$x_might1 = 1;
		$x_might2 = 8;
		$bottom_notices = 8;
		if ($x_game == "Metamorphosis Alpha"){$x_might2 = 6; $bottom_notices = 15;}
		if ($x_game == "Gamma World"){$x_might2 = 6; $bottom_notices = 14;}
		$take = "creator='BU'";
	}

$x_level = $_POST['x_level']+0;
$x_money = $_POST['x_money'];
	if (str_replace(" ", "", $x_money) == "")
	{
		if ($x_game == "Mutant Future"){$x_money = "gold";}
		else if ($x_game == "Broken Urthe"){$x_money = "xormite";}
		else {$x_money = "domars";}
	}

$x_show_ru = $_POST['x_show_ru'];
$x_show_mi = $_POST['x_show_mi'];
$x_show_rt = $_POST['x_show_rt'];
$x_show_c = $_POST['x_show_c'];
$x_show_ct = $_POST['x_show_ct'];
$x_show_ggj = $_POST['x_show_ggj'];
$x_show_ei = $_POST['x_show_ei'];
$x_show_th = $_POST['x_show_th'];
$x_show_en = $_POST['x_show_en'];

$barw = 4;
?>

<img border="0" src="pics_tools/apoc_title.jpg">
<?php if ($x_show_ru > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/apoc_rules.jpg">
<?php $y_rulez = 4; include("functions/rules.php"); ?>
<?php } if ($x_show_mi > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/apoc_mundane.jpg">
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2">Roll</font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">Mundane Items</font></b></td>
	</tr>
	<?php $dice = 0; $mundane = 100; while ($mundane > 0) : $dice = $dice + 1; 
		$decorate = mt_rand(3,13);
		$decoration = "";
		while ($decorate > 0) :
			$items = PAstuffMakerRoom(1,$x_money,0,0,$x_game,mt_rand(30,100));
			$decorate = $decorate - 1;
			$decoration = $decoration . $items[4];
		endwhile;
	?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo substr($decoration, 2); ?></font></td>
	</tr>	
	<?php $mundane = $mundane - 1; endwhile; ?>
	</table>
<?php } if ($x_show_rt > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/apoc_trap.jpg">
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2">Roll</font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">Room Trap</font></b></td>
	</tr>
	<?php $dice = 0; $traps = 20; while ($traps > 0) : if ($x_level > 0){} else {$x_level = mt_rand(1,20);} $dice = $dice + 1; 
		$trap = PAtrapMaker($x_level,room,$x_game,$x_mutants,$x_might1,$x_might2,$x_tech,0); $trap = substr($trap[0], 18); ?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo lcfirst($trap); ?></font></td>
	</tr>	
	<?php $traps = $traps - 1; endwhile; ?>
	</table>
<?php } if ($x_show_c > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/apoc_cont.jpg">
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2">Roll</font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">Large Container</font></b></td>
		<td width="20" align="center" style="border-top: 1px solid #000000"><b><font size="2">&nbsp;</font></b></td>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2">Roll</font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">Small Container</font></b></td>
	</tr>
	<?php $dice = 0; $box = 20; while ($box > 0) : $dice = $dice + 1; ?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo PAboxMakerRoom($x_tech); ?></font></td>
		<td width="20" align="center" style="border-top: 1px solid #000000"><font size="2">&nbsp;</font></td>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo PAbagCreator(0); ?></font></td>
	</tr>	
	<?php $box = $box - 1; endwhile; ?>
	</table>
<?php } if ($x_show_ct > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/apoc_ctrap.jpg">
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2">Roll</font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">Container Trap</font></b></td>
	</tr>
	<?php $dice = 0; $traps = 20; while ($traps > 0) : if ($x_level > 0){} else {$x_level = mt_rand(1,20);} $dice = $dice + 1; 
		$trap = PAtrapMaker($x_level,box,$x_game,$x_mutants,$x_might1,$x_might2,$x_tech,0); $trap = $trap[0]; ?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo lcfirst($trap); ?></font></td>
	</tr>	
	<?php $traps = $traps - 1; endwhile; ?>
	</table>
<?php } if ($x_show_ggj > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/apoc_money.jpg">
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2">Roll</font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">Money</font></b></td>
		<td width="20" align="center" style="border-top: 1px solid #000000"><b><font size="2">&nbsp;</font></b></td>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2">Roll</font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">Money</font></b></td>
	</tr>
	<?php $dice = 0; $loot = 50; while ($loot > 0) : $dice = $dice + 1;
			$the_loot = mt_rand(1,100);
			$x_cut = mt_rand(5,10);
			if ($x_level > 0){} else {$x_level = mt_rand(1,20);}
			$the_prize = PAcurrencyBuilder($x_level,3,0,$x_cut,0,$x_money,0);
	?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; $dice = $dice + 1; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo $the_prize; 
			$the_loot = mt_rand(1,100);
			$x_cut = mt_rand(5,10);
			if ($x_level > 0){} else {$x_level = mt_rand(1,20);}
			$the_prize = PAcurrencyBuilder($x_level,3,0,$x_cut,0,$x_money,0);
		?></font></td>
		<td width="20" align="center" style="border-top: 1px solid #000000"><font size="2">&nbsp;</font></td>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo $the_prize; ?></font></td>
	</tr>	
	<?php $loot = $loot - 1; endwhile; ?>
	</table>
<?php } if ($x_show_ei > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/apoc_items.jpg">
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2">Roll</font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">Exceptional Item</font></b></td>
		<td width="20" align="center" style="border-top: 1px solid #000000"><b><font size="2">&nbsp;</font></b></td>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2">Roll</font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">Exceptional Item</font></b></td>
	</tr>
	<?php $dice = 0; $loot = 50; while ($loot > 0) : $dice = $dice + 1;
		if ($x_level > 0){} else {$x_level = mt_rand(1,20);}
			if ($x_game == "Metamorphosis Alpha"){$the_prize = makeMAItem($x_level,mt_rand(1,3));}
			else if ($x_game == "Gamma World"){$the_prize = makeGWItem($x_level,mt_rand(1,3));}
			else if ($x_game == "Broken Urthe"){$the_prize = makeBUItem($x_level,mt_rand(1,3),0);}
			else {$the_prize = makePAItem($x_level,mt_rand(1,3));}
	?>
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; $dice = $dice + 1; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo $the_prize; 
		if ($x_level > 0){} else {$x_level = mt_rand(1,20);}
			if ($x_game == "Metamorphosis Alpha"){$the_prize = makeMAItem($x_level,mt_rand(1,3));}
			else if ($x_game == "Gamma World"){$the_prize = makeGWItem($x_level,mt_rand(1,3));}
			else if ($x_game == "Broken Urthe"){$the_prize = makeBUItem($x_level,mt_rand(1,3),0);}
			else {$the_prize = makePAItem($x_level,mt_rand(1,3));}
		?></font></td>
		<td width="20" align="center" style="border-top: 1px solid #000000"><font size="2">&nbsp;</font></td>
		<td width="40" align="center" style="border-top: 1px solid #000000"><font size="2"><?php echo $dice; ?></font></td>
		<td style="border-top: 1px solid #000000"><font size="2"><?php echo $the_prize; ?></font></td>
	</tr>	
	<?php $loot = $loot - 1; endwhile; ?>
	</table>
<?php } if ($x_show_th > 0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/apoc_hoard.jpg">
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
	<tr>
		<td width="40" align="center" style="border-top: 1px solid #000000"><b><font size="2">Roll</font></b></td>
		<td style="border-top: 1px solid #000000"><b><font size="2">Hoard</font></b></td>
	</tr>
	<?php $dice = 0; $loot = 20; while ($loot > 0) : $my_hoard = ""; $bags_of_coins = 0; $dice = $dice + 1; $filled = mt_rand(5,15);
		while ($filled > 0) :
			if ($bags_of_coins > 0){$noco = 91;} else {$noco = 1;}
			$x_cut = mt_rand(30,100);
			$loot_size = mt_rand(1,3);
			if ($x_level > 0){} else {$x_level = mt_rand(1,20);}
			$my_reward = mt_rand($noco,100);
				if ($my_reward < 91){$my_prize = PAcurrencyBuilder($x_level,$loot_size,0,$x_cut,1,$x_money,0);	$bags_of_coins = 1;}
				else if ($my_reward < 93){$my_prize = PAGemMaker($x_cut,$x_money);}
				else
				{
					if ($x_game == "Metamorphosis Alpha"){$my_prize = makeMAItem($x_level,$loot_size);}
					else if ($x_game == "Gamma World"){$my_prize = makeGWItem($x_level,$loot_size);}
					else if ($x_game == "Broken Urthe"){$my_prize = makeBUItem($x_level,$loot_size,0);}
					else {$my_prize = makePAItem($x_level,$loot_size);}
				}
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
<hr color="#000000" size="<?php echo $barw; ?>"><img border="0" src="pics_tools/apoc_enc.jpg">
<?php if ($x_game == "Fantasy"){echo "<br>"; $y_rulez = 2; include("functions/rules.php");}
	$table = "creatures" . createRandomCode();
	if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}

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

	$enc_numbers = 100;

		echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
		echo "<tr><td align='center' width='40' NOWRAP style='border-top: 1px solid #000000'><font size='2'><b>Roll</b></font></td>";
		echo "<td style='border-top: 1px solid #000000'><font size='2'><b>Encounter</b></font></td></tr>";

	while ($enc_numbers > 0) :

		$qry = "SELECT * FROM $table ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), 
			RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), 
			RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $enc_numbers";
		$res = wz_query( $connection, $qry ); /*qry*/

		while ($ary=wz_fetch_assoc($res)) :

			include("functions/stat_blocks.php");

			if ($enc_numbers > 0)
			{
				$counts_enct = $counts_enct + 1;
				echo "<tr><td align='center' width='40' NOWRAP style='border-top: 1px solid #000000'><font size='2'>" . $counts_enct . "</font></td>";
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