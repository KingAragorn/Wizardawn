<?php

$mm = "../"; // USED FOR CSS FONT DIRS
include("../db.php");
include("../css.php");

$tabcycle = 1;

$game_choice = $_SESSION['SESSION_RPG_GAME'];

$level_details = "an average level";

if ($game_choice == "BD&D"){ $systemg = "Dungeons & Dragons (1981)"; $cmd = "creator='BX'"; $sesvar = "SESSION_MM_BX"; $csesvar = "SESSION_CMM_BX"; }
else if ($game_choice == "BFRPG"){ $systemg = "Basic Fantasy Role-Playing"; $cmd = "creator='BFRPG'"; $sesvar = "SESSION_MM_BFRPG"; $csesvar = "SESSION_CMM_BFRPG"; }
else if ($game_choice == "Labyrinth Lord"){ $systemg = "Labyrinth Lord"; $cmd = "(creator LIKE 'AEC%' OR creator LIKE 'LL%')"; $sesvar = "SESSION_MM_LL"; $csesvar = "SESSION_CMM_LL"; }
else if ($game_choice == "OSRIC"){ $systemg = "OSRIC"; $cmd = "(creator='OSRIC' OR creator='MoM')"; $sesvar = "SESSION_MM_OSRIC"; $csesvar = "SESSION_CMM_OSRIC"; }
else if ($game_choice == "AD&D"){ $systemg = "Advanced Dungeons & Dragons (1979)"; $cmd = "(creator LIKE 'SRC%')"; $sesvar = "SESSION_MM_ADD"; $csesvar = "SESSION_CMM_ADD"; }
else if ($game_choice == "Swords & Wizardry"){ $systemg = "Swords & Wizardry"; $cmd = "creator='SW'"; $sesvar = "SESSION_MM_SW"; $csesvar = "SESSION_CMM_SW"; }
else if ($game_choice == "Tunnels & Trolls 5th Edition"){ $systemg = "Tunnels & Trolls 5th Edition"; $cmd = "creator='TT'"; $sesvar = "SESSION_MM_TT5"; $csesvar = "SESSION_CMM_TT5"; $level_details = "a difficulty value from 1 to 20+"; }
else if ($game_choice == "Tunnels & Trolls 7th Edition"){ $systemg = "Tunnels & Trolls 7th Edition"; $cmd = "creator='TT'"; $sesvar = "SESSION_MM_TT7"; $csesvar = "SESSION_CMM_TT7"; $level_details = "a difficulty value from 1 to 20+"; }
else if ($game_choice == "Tunnels & Trolls Deluxe"){ $systemg = "Deluxe Tunnels & Trolls"; $cmd = "creator='TT'"; $sesvar = "SESSION_MM_TTD"; $csesvar = "SESSION_CMM_TTD"; $level_details = "a difficulty value from 1 to 20+"; }
else if ($game_choice == "Swords & Six-Siders"){ $systemg = "Swords & Six-Siders"; $cmd = "creator='SX'"; $sesvar = "SESSION_MM_SX"; $csesvar = "SESSION_CMM_SX"; }

$qry = "SELECT * FROM monsters_rpgs WHERE $cmd ORDER BY name";
$res = wz_query( $connection, $qry ); /* qry. */

$monster_manual = explode("^", $_SESSION[$sesvar]);
$m = 0;

?>

<head>

<LINK REL="SHORTCUT ICON" HREF="<?php echo $mm; ?>pics/favicon.ico">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Wizardawn - Manual of Monsters</title>

</head>

<body style="background-color: <?php echo $color_background; ?>; background-image: none;">

<form style="margin-bottom:0; margin-top:0;" method="POST" action="monsters_add.php">

<input type="hidden" value="<?php echo $game_choice; ?>" name="game">

<?php echo "<p style='font-size:" . round(55 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 60px; margin-top: 0; margin-bottom: 0'>Manual of Monsters</p>"; ?>

<p style='text-align: justify;'>Here you can select individual monsters from <?php echo $systemg; ?>. Check the boxes of the monsters you want to appear in your dungeon with a 1 to 100 chance of them appearing in it. '1' is very seldom 
while '100' is more often. Each monster has <?php echo $level_details; ?> listed to the right of the name in [#] To help you decide which monsters to choose. There is a section at the bottom where you may add up to 5 unique creatures of your own design with the same options for appearing in the dungeon. Make sure to press the
'UPDATE' button below to save any changes you make here. Any italicized monsters indicates a non-dungeon dwelling monster.</p>

<input id="SubmitButton" name="Update" type="submit" value="Update"></p>

<table border="0" cellpadding="3" cellspacing="3" width="100%">

<?php while ($ary=wz_fetch_assoc($res)) :

if ($game_choice == "Swords & Wizardry"){$pulnam = explode("^", $ary['name']); $pulnam = explode("(", $pulnam[0]);} else if ($game_choice == "BFRPG"){$pulnam = explode("(", $ary['description']);} else {$pulnam = explode("(", $ary['name']);}

	if (strpos($ary['location'], 'DG') !== false){$iw1 = "<font style='font-size:12px;'>"; $iw2 = "</font>";} else {$iw1 = "<font style='font-size:12px; font-style: italic; font-family: WizardawnItalic;'>"; $iw2 = "</font>";}

	$check_box = "";
	$chance_box = "";
	$monster_check = explode("|", $monster_manual[$m]);
	if ($monster_check[0] == $ary['id'])
	{
		$m = $m + 1;
		$check_box = "checked";
		$chance_box = "<option selected>" . $monster_check[1] . "</option>";
	}

	if ($tabcycle == 1)
	{
		?>
		<tr><td width="33%" style="border-bottom-style: solid; border-bottom-width: 1px">
				<input type="checkbox" <?php echo $check_box; ?> id="InputOption" name="pick_<?php echo $ary['id']; ?>" value="1">
					<select size="1" id="InputOption" style="font-size: 8pt" name="chance_<?php echo $ary['id']; ?>">
						<?php echo $chance_box; ?><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select> 
						<?php echo $iw1; ?><?php echo $pulnam[0] . "&nbsp;[" . $ary['difficulty'] . "]"; ?><?php echo $iw2; ?>
		</td>
		<?php
		$tabcycle = 2;
	}
	else if ($tabcycle == 2)
	{
		?>
		<td width="34%" style="border-bottom-style: solid; border-bottom-width: 1px">
				<input type="checkbox" <?php echo $check_box; ?> id="InputOption" name="pick_<?php echo $ary['id']; ?>" value="1">
					<select size="1" id="InputOption" style="font-size: 8pt" name="chance_<?php echo $ary['id']; ?>">
						<?php echo $chance_box; ?><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select> 
						<?php echo $iw1; ?><?php echo $pulnam[0] . "&nbsp;[" . $ary['difficulty'] . "]"; ?><?php echo $iw2; ?>
		</td>
		<?php
		$tabcycle = 3;
	}
	else if ($tabcycle == 3)
	{
		?>
		<td width="33%" style="border-bottom-style: solid; border-bottom-width: 1px">
				<input type="checkbox" <?php echo $check_box; ?> id="InputOption" name="pick_<?php echo $ary['id']; ?>" value="1">
					<select size="1" id="InputOption" style="font-size: 8pt" name="chance_<?php echo $ary['id']; ?>">
						<?php echo $chance_box; ?><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select> 
						<?php echo $iw1; ?><?php echo $pulnam[0] . "&nbsp;[" . $ary['difficulty'] . "]"; ?><?php echo $iw2; ?>
		</td></tr>
		<?php
		$tabcycle = 1;
	}

endwhile;

	if ($tabcycle == 2){echo "<td width='34%'>&nbsp;</td><td width='33%'>&nbsp;</td></tr>";}
	else if ($tabcycle == 3){echo "<td width='33%'>&nbsp;</td></tr>";}

?>

</table>

</p><input id="SubmitButton" name="Update" type="submit" value="Update"><br><br>

<p style='font-size:20px; margin-top: 0; margin-bottom: 0'>Custom Encounters For This Dungeon</p>
<p style='text-align: justify;'>Select a chance for the encounter to appear and then enter the encounter information (name, stat block, etc.). Keep in mind that these encounters will not generate monster quantities or health by the system.<br>

<?php $monster_manual = explode("|$|", $_SESSION[$csesvar]); ?>

<div id="div_table">
	<div class="row">
		<span class="cell">
			<?php
				$chance_box = "";	$text_box = "";		$monster_check = explode("|^|", $monster_manual[0]);
				if ($monster_check[1] != ""){ $chance_box = "<option selected>" . $monster_check[1] . "</option>"; $text_box = $monster_check[0]; }
			?>
			<select size="1" id="InputOption" style="font-size: 8pt" name="xchance_1">
				<?php echo $chance_box; ?><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
			</select> 
		</span>
		<span class="cell"><textarea rows="5" id="InputOption" name="xmonster_1" style="font-size: 8pt" cols="160"><?php echo $text_box; ?></textarea></span>
	</div>
	<div class="row">
		<span class="cell">
			<?php
				$chance_box = "";	$text_box = "";		$monster_check = explode("|^|", $monster_manual[1]);
				if ($monster_check[1] != ""){ $chance_box = "<option selected>" . $monster_check[1] . "</option>"; $text_box = $monster_check[0]; }
			?>
			<select size="1" id="InputOption" style="font-size: 8pt" name="xchance_2">
				<?php echo $chance_box; ?><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
			</select> 
		</span>
		<span class="cell"><textarea rows="5" id="InputOption" name="xmonster_2" style="font-size: 8pt" cols="160"><?php echo $text_box; ?></textarea></span>
	</div>
	<div class="row">
		<span class="cell">
			<?php
				$chance_box = "";	$text_box = "";		$monster_check = explode("|^|", $monster_manual[2]);
				if ($monster_check[1] != ""){ $chance_box = "<option selected>" . $monster_check[1] . "</option>"; $text_box = $monster_check[0]; }
			?>
			<select size="1" id="InputOption" style="font-size: 8pt" name="xchance_3">
				<?php echo $chance_box; ?><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
			</select> 
		</span>
		<span class="cell"><textarea rows="5" id="InputOption" name="xmonster_3" style="font-size: 8pt" cols="160"><?php echo $text_box; ?></textarea></span>
	</div>
	<div class="row">
		<span class="cell">
			<?php
				$chance_box = "";	$text_box = "";		$monster_check = explode("|^|", $monster_manual[3]);
				if ($monster_check[1] != ""){ $chance_box = "<option selected>" . $monster_check[1] . "</option>"; $text_box = $monster_check[0]; }
			?>
			<select size="1" id="InputOption" style="font-size: 8pt" name="xchance_4">
				<?php echo $chance_box; ?><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
			</select> 
		</span>
		<span class="cell"><textarea rows="5" id="InputOption" name="xmonster_4" style="font-size: 8pt" cols="160"><?php echo $text_box; ?></textarea></span>
	</div>
	<div class="row">
		<span class="cell">
			<?php
				$chance_box = "";	$text_box = "";		$monster_check = explode("|^|", $monster_manual[4]);
				if ($monster_check[1] != ""){ $chance_box = "<option selected>" . $monster_check[1] . "</option>"; $text_box = $monster_check[0]; }
			?>
			<select size="1" id="InputOption" style="font-size: 8pt" name="xchance_5">
				<?php echo $chance_box; ?><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
			</select> 
		</span>
		<span class="cell"><textarea rows="5" id="InputOption" name="xmonster_5" style="font-size: 8pt" cols="160"><?php echo $text_box; ?></textarea></span>
	</div>
</div>

</form>

</body>

</html>