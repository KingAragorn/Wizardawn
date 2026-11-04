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

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Spell Books</p>";
	echo "<p style='text-align: justify;'>"; ?>
		Here you can create yourself a custom listing of spells for the OSRIC fantasy role-playing game or Advanced Edition Fantasy games. Maybe you need a better defined spell 
		book for your character. Perhaps you want a complete listing sorted the way you want.&nbsp; Each spell can be listed with detailed information about the spell, so you don't have to reference the rule 
		book during play. There is also an option to include descriptions of a spell that another mimics. This means if a spell states it is similar to another class's spell, you can include that description so 
		you don't have to cross reference other spells. Choose your criteria below and get ready to unleash the magic.
	<?php

	$res_c = wz_query($connection, "SELECT * FROM osric_spells WHERE mage='Cleric' ORDER BY name");
	$res_d = wz_query($connection, "SELECT * FROM osric_spells WHERE mage='Druid' ORDER BY name");
	$res_i = wz_query($connection, "SELECT * FROM osric_spells WHERE mage='Illusionist' ORDER BY name");
	$res_m = wz_query($connection, "SELECT * FROM osric_spells WHERE mage='Magic-User' ORDER BY name");
	$res_t = wz_query($connection, "SELECT * FROM osric_spells WHERE type!='Various' GROUP BY type ORDER BY type");

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
					<option>Cleric</option>
					<option>Druid</option>
					<option>Illusionist</option>
					<option>Magic-User</option>
						<?php while ($ary_t=wz_fetch_assoc($res_t)) : ?>
							<option><?php echo $ary_t['type']; ?></option>
						<?php endwhile; ?>
					<option>Abjuration</option>
					<option>Alteration</option>
					<option>Charm</option>
					<option>Conjuration</option>
					<option>Divination</option>
					<option>Enchantment</option>
					<option>Evocation</option>
					<option>Illusion</option>
					<option>Invocation</option>
					<option>Necromancy</option>
					<option>Phantasm</option>
					<option>Possession</option>
					<option>Summoning</option>
					<option>Transmutation</option>
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

		</p><p style='text-align: justify;'>...or you can leave the &quot;Spell Type&quot; blank and use this section to produce a listing of &quot;specific&quot; spells you choose below. This often comes in handy for a couple of sheets of spells to keep with a character sheet...<br>

		<div id="div_tabex">
			<div class="row">
				<span class="cell">Cleric Spells</span>
				<span class="cell">Druid Spells</span>
				<span class="cell">Illusionist Spells</span>
				<span class="cell">Magic-User Spells</span>
			</div>
			<div class="row">
				<span class="cell" style="font-size: 10px;">
					<?php while ($ary_c=wz_fetch_assoc($res_c)) : ?>
						<input type="checkbox" name="spell_<?php echo $ary_c[id]; ?>" value="<?php echo $ary_c[id]; ?>"><?php echo str_replace(" radius)", ")", "$ary_c[name]"); ?><br>
					<?php endwhile; ?>
				</span>
				<span class="cell" style="font-size: 10px;">
					<?php while ($ary_d=wz_fetch_assoc($res_d)) : ?>
						<input type="checkbox" name="spell_<?php echo $ary_d[id]; ?>" value="<?php echo $ary_d[id]; ?>"><?php echo str_replace(" radius)", ")", "$ary_d[name]"); ?><br>
					<?php endwhile; ?>
				</span>
				<span class="cell" style="font-size: 10px;">
					<?php while ($ary_i=wz_fetch_assoc($res_i)) : ?>
						<input type="checkbox" name="spell_<?php echo $ary_i[id]; ?>" value="<?php echo $ary_i[id]; ?>"><?php echo str_replace(" radius)", ")", "$ary_i[name]"); ?><br>
					<?php endwhile; ?>
				</span>
				<span class="cell" style="font-size: 10px;">
					<?php while ($ary_m=wz_fetch_assoc($res_m)) : ?>
						<input type="checkbox" name="spell_<?php echo $ary_m[id]; ?>" value="<?php echo $ary_m[id]; ?>"><?php echo str_replace(" radius)", ")", "$ary_m[name]"); ?><br>
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

$level = $_POST['level']+0;

$sort = $_POST['sort'];
	if ($sort == 2){$sort_list = "ORDER BY mage, name";}
	else if ($sort == 3){$sort_list = "ORDER BY mage, level, name";}
	else if ($sort == 4){$sort_list = "ORDER BY level, name";}
	else if ($sort == 5){$sort_list = "ORDER BY level, mage, name";}
	else {$sort_list = "ORDER BY name";}

$extra = $_POST['extra'];
$mins = $_POST['mins'];
$listing = $_POST['listing'];

if ($listing != "")
{
	$cmd = "id>0";

	$get1 = "SELECT * FROM osric_spells WHERE mage='$listing'";
	$got1 = wz_query( $connection, $get1 ); /*get1*/
	$num1 = wz_num_rows($got1);

	if ($num1 > 0){$cmd = "mage='" . $listing . "'";}
	else
	{
		$get2 = "SELECT * FROM osric_spells WHERE type='$listing'";
		$got2 = wz_query( $connection, $get2 ); /*get2*/
		$num2 = wz_num_rows($got2);
	}

	if ($num2 > 0){$cmd = "type='" . $listing . "'";}
	else
	{
		$get3 = "SELECT * FROM osric_spells WHERE school LIKE '%$listing%'";
		$got3 = wz_query( $connection, $get3 ); /*get3*/
		$num3 = wz_num_rows($got3);
	}

	if ($num3 > 0){$cmd = "school LIKE '%" . $listing . "%'";}

	if ($level > 0)
	{
		if ($mins == 1){ $cmd = $cmd . " AND level<='" . $level . "'"; }
		else if ($mins == 2) { $cmd = $cmd . " AND level>='" . $level . "'"; }
		else { $cmd = $cmd . " AND level='" . $level . "'"; }
	}
}
else
{
	$qry = "SELECT * FROM osric_spells";
	$res = wz_query( $connection, $qry ); /*qry*/
	$cmd = "(id=0";
		while ($ary=wz_fetch_assoc($res)) :
			$v = "spell_" . $ary[id];
			$spell = $_POST["$v"];
				if ($spell > 0){$cmd = $cmd . " OR id=" . $spell;}
		endwhile;
	$cmd = $cmd . ")";
}

$qry = "SELECT * FROM osric_spells WHERE $cmd $sort_list";
$res = wz_query( $connection, $qry ); /*qry*/

?>
<div align="center">
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="700" bordercolorlight="#000000" bordercolordark="#000000">
		<tr>
			<td>
			<img border="0" src="pics_tools/tools_spell_book.jpg">
		<?php while ($ary=wz_fetch_assoc($res)) : ?>
			<hr color="#000000" size="1">
			<p style="margin-top: 0; margin-bottom: 0"><font size="4"><?php echo $ary[name]; if ($ary[reverse] > 0){ echo "&nbsp;&nbsp;<i>(Reversible)</i>"; } ?></font></p>
			<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" bordercolorlight="#000000" bordercolordark="#000000">
				<tr>
					<td width="50%" colspan="2"><i><font size="2">&nbsp; <?php echo $ary[type]; ?></font></i></td>
					<td width="13%"><b><font size="2">Area of Effect:</font></b></td>
					<td width="37%"><font size="2"><?php echo ucfirst($ary[area]); ?></font></td>
				</tr>
				<tr>
					<td width="12%"><b><font size="2">&nbsp; Level:</font></b></td>
					<td width="38%"><font size="2"><?php echo $ary[mage]; ?> <?php echo $ary[level]; ?></font></td>
					<td width="13%"><b><font size="2">Components:</font></b></td>
					<td width="37%"><font size="2"><?php echo ucfirst($ary[components]); ?></font></td>
				</tr>
				<tr>
					<td width="12%"><b><font size="2">&nbsp; Range:</font></b></td>
					<td width="38%"><font size="2"><?php echo ucfirst($ary[range]); ?></font></td>
					<td width="13%"><b><font size="2">Casting Time:</font></b></td>
					<td width="37%"><font size="2"><?php echo ucfirst($ary[casting]); ?></font></td>
				</tr>
				<tr>
					<td width="12%"><b><font size="2">&nbsp; Duration:</font></b></td>
					<td width="38%"><font size="2"><?php echo ucfirst($ary[duration]); ?></font></td>
					<td width="13%"><b><font size="2">Saving Throw:</font></b></td>
					<td width="37%"><font size="2"><?php echo ucfirst($ary[save]); ?></font></td>
				</tr>
				</table>
			<p style="margin-top: 0; margin-bottom: 0"><font size="1">&nbsp;</font></p>
			<p style="margin-top: 0; margin-bottom: 0"><font size="2"><?php $notes = str_replace("", "", "$ary[description]"); echo $notes; ?>
				<?php	if (($extra > 0) && ($ary[refs] > 0))
						{
							$rqry = "SELECT * FROM osric_spells WHERE id=$ary[refs]";
							$rres = wz_query( $connection, $rqry ); /*rqry*/
							$rary = wz_fetch_assoc($rres);
							$more = str_replace("font-size: 12pt", "font-size:12pt", "$rary[description]");
							echo "<br><br><b>SPELL REFERENCE:&nbsp;</b>" . $more;
						}
				?></font>
		<?php endwhile; ?>
			<hr color="#000000" size="1">
			</td>
		</tr>
	</table>
</div>

<?php

$bottom_notices = 1;

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>