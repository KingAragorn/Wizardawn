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

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Basic Spell Books</p>";
	echo "<p style='text-align: justify;'>"; ?>
		Here you can create yourself a custom listing of spells for the Labyrinth Lord basic fantasy role-playing game. Maybe you need a better defined spell book for your character. Perhaps you want a complete listing 
		sorted the way you want. Each spell can be listed with detailed information about the spell, so you don't have to reference the rule book during play. There is also an option to include descriptions 
		of a spell that another mimics. This means if a spell states it is similar to another class's spell, you can include that description so you don't have to cross reference other spells. Choose your 
		criteria below and get ready to unleash the magic.
	<?php

	$res_c = wz_query($connection, "SELECT * FROM lablord_spells WHERE ls_class='Cleric' ORDER BY ls_name");
	$res_m = wz_query($connection, "SELECT * FROM lablord_spells WHERE ls_class='Mage' ORDER BY ls_name");
	$res_e = wz_query($connection, "SELECT * FROM lablord_spells WHERE ls_class='Mage' AND ls_level<6 ORDER BY ls_name");
	?>
		<br>

		<div id="div_table">
			<div class="row">
				<span class="cell">Sort Spells:</span>
				<span class="cell">
					<select id="DropOption" size="1" name="sort">
					<option selected value="1">Alphabetical</option>
					<option value="2">Class / Alphabetical</option>
					<option value="3">Class / Level / Alphabetical</option>
					<option value="4">Level / Alphabetical</option>
					<option value="5">Level / Class / Alphabetical</option>
					</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="checkbox" name="extra" value="1">Include Any Spell References
				</span>
			</div>
		</div>

		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create"><br>

		<br>This section will produce spells dependent on the &quot;type&quot; you select below...<br><br>

		<div id="div_table">
			<div class="row">
				<span class="cell">Type:</span>
				<span class="cell">
					<select id="DropOption" size="1" name="listing">
					<option selected></option>
					<option>All</option>
					<option value="Cleric">Cleric</option>
					<option value="Elf">Elf</option>
					<option value="Magic-User">Magic-User</option>
					</select>&nbsp;
					<select id="DropOption" size="1" name="mins">
						<option value="0">=</option>
						<option value="1"><=</option>
						<option value="2">>=</option>
					</select>&nbsp;
					Level:&nbsp;&nbsp;<select id="DropOption" size="1" name="level"><option></option><?php $runner=9; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
		</div>

		</p><p style='text-align: justify;'>...or you can leave the &quot;Spell Type&quot; blank and use this section to produce a listing of &quot;specific&quot; spells you choose below.&nbsp; This often comes in handy for a couple of sheets of spells to keep with a character sheet...<br>

		<div id="div_tabex">
			<div class="row">
				<span class="cell">Cleric Spells</span>
				<span class="cell">Elf Spells</span>
				<span class="cell">Magic-User Spells</span>
			</div>
			<div class="row">
				<span class="cell" style="font-size: 12px;">
					<?php while ($ary_c=wz_fetch_assoc($res_c)) : ?>
						<input type="checkbox" id="InputOption" name="spell_<?php echo $ary_c['ls_id']; ?>" value="<?php echo $ary_c['ls_id']; ?>"><?php echo $ary_c['ls_name']; ?><br>
					<?php endwhile; ?>
				</span>
				<span class="cell" style="font-size: 12px;">
					<?php while ($ary_e=wz_fetch_assoc($res_e)) : ?>
						<input type="checkbox" id="InputOption" name="spell_<?php echo $ary_e['ls_id']; ?>" value="<?php echo $ary_e['ls_id']; ?>"><?php echo $ary_e['ls_name']; ?><br>
					<?php endwhile; ?>
				</span>
				<span class="cell" style="font-size: 12px;">
					<?php while ($ary_m=wz_fetch_assoc($res_m)) : ?>
						<input type="checkbox" id="InputOption" name="spell_<?php echo $ary_m['ls_id']; ?>" value="<?php echo $ary_m['ls_id']; ?>"><?php echo $ary_m['ls_name']; ?><br>
					<?php endwhile; ?>
				</span>
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

$bottom_notices = 2;

$level = $_POST['level']+0;

$sort = $_POST['sort'];
	if ($sort == 2){$sort_list = "ORDER BY ls_class, ls_name";}
	else if ($sort == 3){$sort_list = "ORDER BY ls_class, ls_level, ls_name";}
	else if ($sort == 4){$sort_list = "ORDER BY ls_level, ls_name";}
	else if ($sort == 5){$sort_list = "ORDER BY ls_level, ls_class, ls_name";}
	else {$sort_list = "ORDER BY ls_name";}

$extra = $_POST['extra'];
$mins = $_POST['mins'];
$listing = $_POST['listing'];
	if ($listing == "Elf"){$the_class = "ls_class='Mage'"; $limit_scope = "AND ls_level<6";}
	else if ($listing == "Magic-User"){$the_class = "ls_class='Mage'";}
	else if ($listing == "Cleric"){$the_class = "ls_class='Cleric'";}
	else if ($listing == "All"){$the_class = "(ls_class='Mage' OR ls_class='Cleric')";}

if ($listing != "")
{
	$cmd = "ls_id>0";

	$get1 = "SELECT * FROM lablord_spells WHERE $the_class";
	$got1 = wz_query( $connection, $get1 ); /*get1*/
	$num1 = wz_num_rows($got1);

	if ($num1 > 0){$cmd = $the_class;}
	else
	{
		$get2 = "SELECT * FROM lablord_spells WHERE $the_class";
		$got2 = wz_query( $connection, $get2 ); /*get2*/
		$num2 = wz_num_rows($got2);
	}

	if ($level > 0)
	{
		if ($mins == 1){ $cmd = $cmd . " AND ls_level<='" . $level . "'"; }
		else if ($mins == 2) { $cmd = $cmd . " AND ls_level>='" . $level . "'"; }
		else { $cmd = $cmd . " AND ls_level='" . $level . "'"; }
	}
}
else
{
	$qry = "SELECT * FROM lablord_spells";
	$res = wz_query( $connection, $qry ); /*qry*/
	$cmd = "(ls_id=0";
		while ($ary=wz_fetch_assoc($res)) :
			$v = "spell_" . $ary[ls_id];
			$spell = $_POST["$v"];
				if ($spell > 0){$cmd = $cmd . " OR ls_id=" . $spell;}
		endwhile;
	$cmd = $cmd . ")";
}

$qry = "SELECT * FROM lablord_spells WHERE $cmd $limit_scope $sort_list";
$res = wz_query( $connection, $qry ); /*qry*/

?>
<div align="center">
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="700" bordercolorlight="#000000" bordercolordark="#000000">
		<tr>
			<td>
			<img border="0" src="pics_tools/tools_spell_book.jpg">
		<?php while ($ary=wz_fetch_assoc($res)) : if ($ary[ls_class] == "Cleric"){$my_class = "Cleric";} else {$my_class = "Magic-User/Elf";} ?>
			<hr color="#000000" size="1">
			<p style="margin-top: 0; margin-bottom: 0"><font size="4"><?php echo $ary[ls_name]; if ($ary[ls_reverse] > 0){ echo "&nbsp;&nbsp;<i>(Reversible)</i>"; } ?></font></p>
			<table border="0" cellpadding="5" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
				<tr>
					<td width="25%"><font size="2"><b>Class:</b> <?php echo $my_class; ?></font></td>
					<td width="25%"><font size="2"><b>Level:</b> <?php echo $ary[ls_level]; ?></font></td>
					<td width="25%"><font size="2"><b>Duration:</b> <?php echo $ary[ls_duration]; ?></font></td>
					<td width="25%" align="right"><font size="2"><b>Range:</b> <?php echo $ary[ls_range]; ?></font></td>
				</tr>
				</table>
			<p style="margin-top: 0; margin-bottom: 0"><font size="2"><?php
				$notes = str_replace("\n", "<br>", $ary[ls_text]);
				$notes = str_replace("<table ", "<table style='font-size:13px;' ", $notes);
				$notes = str_replace("</table>\r<br>", "</table>", $notes);
				echo $notes;

				if (($extra > 0) && ($ary[ls_ref] > 0))
				{
					$rqry = "SELECT * FROM lablord_spells WHERE ls_id=$ary[ls_ref]";
					$rres = wz_query( $connection, $rqry ); /*rqry*/
					$rary = wz_fetch_assoc($rres);
					$more = str_replace("\n", "<br>", $rary[ls_text]);
					$more = str_replace("<table ", "<table style='font-size:13px;' ", $more);
					$more = str_replace("</table>\r<br>", "</table>", $more);
					echo "<br><br><b>SPELL REFERENCE:&nbsp;</b>" . $more;
				}
				?></font>
		<?php endwhile; ?>
			<hr color="#000000" size="1">
			</td>
		</tr>
	</table>
</div><?php

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>