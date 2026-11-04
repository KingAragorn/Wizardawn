<?php

$p_name = $dude[0];
$p_race = $dude[1];
$p_age = $dude[2];
$p_sex = $dude[3];
$p_class = $dude[4];
$p_alignment = $dude[5];
$p_ab_str = $dude[6];
$p_ab_str_xtra = $dude[7];
	if ($p_ab_str_xtra > 0){$p_ab_str = $p_ab_str . "." . $p_ab_str_xtra; }
$p_ab_int = $dude[8];
$p_ab_wis = $dude[9];
$p_ab_dex = $dude[10];
$p_ab_con = $dude[11];
$p_ab_cha = $dude[12];
$p_level = $dude[13];
$p_hp = $dude[14];
$p_armor = $dude[15];
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

if ($adv_list_tp == 1)
{
	echo $p_name . " the " . strtolower($p_race) . " " . strtolower($p_sex) . " " . strtolower($p_class) . " [<b>AGE</b>:&nbsp;" . $p_age . "; <b>AL</b>:&nbsp;" . $p_alignment . "; <b>ST</b>:&nbsp;" . $p_ab_str . "; <b>IN</b>:&nbsp;" . $p_ab_int . "; <b>WI</b>:&nbsp;" . $p_ab_wis . "; <b>DX</b>:&nbsp;" . $p_ab_dex . "; <b>CN</b>:&nbsp;" . $p_ab_con . "; <b>CH</b>:&nbsp;" . $p_ab_cha . "; <b>LV</b>:&nbsp;" . $p_level . "; <b>HP</b>:&nbsp;" . $p_hp . "; <b>AC</b>:&nbsp;" . $p_armor . "; <b>THAC0</b>:&nbsp;" . $p_thaco . "]";
	if (($p_barm != "") || ($p_bsrp != "") || ($p_bhit != "") || ($p_bdmg != "") || ($p_brng != ""))
	{
		$myxtas =  "&nbsp; [";
		if ($p_barm != ""){$myxtas = $myxtas . "<b>AC Bonus</b>:&nbsp;" . $p_barm . "; ";}
		if ($p_bsrp != ""){$myxtas = $myxtas . "<b>Surprise Bonus</b>:&nbsp;" . $p_bsrp . "; ";}
		if ($p_bhit != ""){$myxtas = $myxtas . "<b>Hit Bonus</b>:&nbsp;" . $p_bhit . "; ";}
		if ($p_bdmg != ""){$myxtas = $myxtas . "<b>Damage Bonus</b>:&nbsp;" . $p_bdmg . "; ";}
		if ($p_brng != ""){$myxtas = $myxtas . "<b>Range Bonus</b>:&nbsp;" . $p_brng . "; ";}
		echo substr($myxtas, 0, -2) . "]";
	}
    echo "&nbsp; [<b>Saving Throws</b> - <b>RSW</b>:&nbsp;" . $p_xsv1 . "; <b>BW</b>:&nbsp;" . $p_xsv2 . "; <b>DPP</b>:&nbsp;" . $p_xsv3 . "; <b>PP</b>:&nbsp;" . $p_xsv4 . "; <b>SPL</b>:&nbsp;" . $p_xsv5 . "]&nbsp;&nbsp;";
    echo dressMeup($p_sex,$p_race,$p_class) . " <b>Abilities:&nbsp; </b>" . $p_notes . " " . substr($p_skills, 0, -3) . " &nbsp;<b>Inventory:&nbsp; </b>" . $w_stuff;
}
else
{
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
				<td NOWRAP align="center"><font size="2"><?php echo $p_ab_str; ?></font></td>
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
	<hr size="1" color="#C0C0C0"><p align="left" style="margin-top: 0; margin-bottom: 0"><font size="2"><?php echo dressMeup($p_sex,$p_race,$p_class); ?></font></p>
	<?php if ($p_notes != ""){?><hr size="1" color="#C0C0C0"><p align="left" style="margin-top: 0; margin-bottom: 0"><font size="2"><b>Abilities:&nbsp; </b><?php echo $p_notes; ?></font></p><?php } ?>
	<?php if ($p_skills != ""){?><hr size="1" color="#C0C0C0"><p align="left" style="margin-top: 0; margin-bottom: 0"><font size="2"><b>Skills:&nbsp; </b><?php echo substr($p_skills, 0, -3); ?></font></p><?php } ?>
	<hr size="1" color="#C0C0C0"><p align="left" style="margin-top: 0; margin-bottom: 0"><font size="2"><b>Inventory:&nbsp; </b><?php echo $w_stuff; ?></font></p>
<?php } ?>