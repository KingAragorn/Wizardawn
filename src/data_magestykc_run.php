<?php

function languageSkill($speak)
{
	if ($speak == "Common"){$value = 1;}
	else if ($speak == "Elven"){$value = 1;}
	else if ($speak == "Dwarvish"){$value = 1;}
	else if ($speak == "Hobling"){$value = 1;}
	else if ($speak == "Goblin"){$value = 2;}
	else if ($speak == "Gremlin"){$value = 2;}
	else if ($speak == "Orkish"){$value = 2;}
	else if ($speak == "Antaur"){$value = 2;}
	else if ($speak == "Brownie"){$value = 2;}
	else if ($speak == "Gnoll"){$value = 2;}
	else if ($speak == "Sauriman"){$value = 2;}
	else if ($speak == "Centaur"){$value = 2;}
	else if ($speak == "Falcoran"){$value = 2;}
	else if ($speak == "Fruglum"){$value = 2;}
	else if ($speak == "Mantaran"){$value = 2;}
	else if ($speak == "Mermen"){$value = 2;}
	else if ($speak == "Minotaur"){$value = 2;}
	else if ($speak == "Neptar"){$value = 2;}
	else if ($speak == "Rattanu"){$value = 2;}
	else if ($speak == "Slitheran"){$value = 2;}
	else if ($speak == "Trollish"){$value = 3;}
	else if ($speak == "Giant"){$value = 3;}
	else if ($speak == "Tigran"){$value = 3;}
	else if ($speak == "Wulfan"){$value = 3;}
	else if ($speak == "Ogrish"){$value = 3;}
	else if ($speak == "Naga"){$value = 4;}
	else if ($speak == "Fey"){$value = 4;}
	else if ($speak == "Simian"){$value = 4;}
	else if ($speak == "Treekin"){$value = 5;}
	else if ($speak == "Gargoyle"){$value = 5;}
	else if ($speak == "Chimera"){$value = 5;}
	else if ($speak == "Harpy"){$value = 5;}
	else if ($speak == "Manticore"){$value = 5;}
	else if ($speak == "Vampire"){$value = 6;}
	else if ($speak == "Zorn"){$value = 7;}
	else if ($speak == "Sphinx"){$value = 7;}
	else if ($speak == "Dragon"){$value = 8;}
	else if ($speak == "Undead"){$value = 9;}
	else if ($speak == "Balrog"){$value = 10;}
	else if ($speak == "Devlish"){$value = 10;}
	else if ($speak == "Avian"){$value = 11;}
	else if ($speak == "Canine"){$value = 11;}
	else if ($speak == "Feline"){$value = 11;}
	else if ($speak == "Rodent"){$value = 11;}
	else if ($speak == "Saurian"){$value = 12;}
	else if ($speak == "Porker"){$value = 12;}
	else if ($speak == "Ursine"){$value = 12;}
	else if ($speak == "Equine"){$value = 12;}
	else if ($speak == "Bovine"){$value = 12;}
	else if ($speak == "Pachyderm"){$value = 12;}
	else if ($speak == "Hippopotamus"){$value = 12;}
	else if ($speak == "Serpentine"){$value = 13;}
	else if ($speak == "Spider"){$value = 13;}
	else if ($speak == "Cetacean"){$value = 14;}
	else if ($speak == "Fish"){$value = 14;}
	else if ($speak == "Amphibian"){$value = 14;}
	else if ($speak == "Slug"){$value = 14;}
	else if ($speak == "Insect"){$value = 15;}
	else if ($speak == "Wisp"){$value = 16;}
	else if ($speak == "Plant"){$value = 17;}
	else if ($speak == "Wizard Speech"){$value = 18;}

	$skill = "L" . $value . "SR";

	return $skill;
}

include("top.php");

echo "</head><body>";

$id = $_GET['id'];
$tt_vs = $_GET['ttvs'];
if ($tt_vs == 7){$tt7 = 1;} else {$tt5 = 1;}


if ($id == "lang")
{
	$qry = "SELECT * FROM monsters_rpgs WHERE creator='TT' AND spdef!='None' AND spdef!='Any' GROUP BY spdef ORDER BY spdef";
	$res = wz_query( $connection, $qry ); /* qry. */


	//// PROCESS ALL OF THE LANGUAGES ////
	$tab = "CREATE TEMPORARY TABLE speakers (languages VARCHAR(100) NOT NULL)";
	wz_query( $connection, $tab ); /* tab. */

	while ($ary=wz_fetch_assoc($res)) :

		$living = explode("/", $ary['spdef']);
		$c = count($living);
		$s = 0;

		while ($c > 0) :

			if ($living[$s] == "Common"){ $speech = "AAAA"; } else { $speech = $living[$s]; }
		
			$fill = "INSERT INTO speakers (languages) VALUES ('$speech')";
			wz_query( $connection, $fill ); /* fill. */

			$s = $s + 1;
			$c = $c - 1;
		endwhile;

	endwhile;

	$qry = "SELECT * FROM speakers GROUP BY languages ORDER BY languages";
	$res = wz_query( $connection, $qry ); /* qry. */

	?>
	<div align="center">

	<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
		<tr>
			<td>
				<thead></thead>
					<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
						<tr>
							<td width="315"><img src="pics_tools/tt_bw_logo.jpg"></td>
							<td align="right"><img src="pics_tools/tt_mg_magestykc.jpg"><br><img src="pics_tools/tt_mg_languages.jpg"></td>
						</tr>
					</table>

					<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
						<tr>
							<td>
									This is a complete listing of all the languages spoken in Magestykc.&nbsp; 
									When used with the Tome of Monsters, you could one day have a character 
									that is able to speak to almost all creatures of the world.&nbsp; They 
									are listed below in alphabetical order.&nbsp; Each one has a number 
									showing how many different creatures speak the language. 
									<hr>
							</td>
						</tr>
					</table>

					<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">

					<?php $cols = 1; while ($ary=wz_fetch_assoc($res)) :

						if ($ary['languages'] == "AAAA"){$speech = "Common";} else {$speech = $ary['languages'];}

							/// COUNT EVERYONE THAT SPEAKS THIS ///
							$tak = "SELECT * FROM monsters_rpgs WHERE creator='TT' AND (spdef='Any' OR spdef LIKE '%$speech%')";
							$rak = wz_query( $connection, $tak ); /* tak. */
							$nak = wz_num_rows($rak);

						if ($cols == 1){echo "<tr><td width='5%'>" . $nak . "</td><td width='8%'>" . languageSkill($speech) . "</td><td width='23%'>" . $speech . "</td>";}
		
						else if ($cols == 2){echo "<td width='5%'>" . $nak . "</td><td width='8%'>" . languageSkill($speech) . "</td><td width='23%'>" . $speech . "</td>";}

						else {echo "<td width='5%'>" . $nak . "</td><td width='8%'>" . languageSkill($speech) . "</td><td width='14%'>" . $speech . "</td></tr>"; $cols = 0;}

					$cols = $cols + 1;

					endwhile;

					if ($cols == 2){echo "<td width='5%'>&nbsp;</td><td width='8%'>&nbsp;</td><td width='23%'>&nbsp;</td>";}
					else if ($cols == 3){echo "<td width='5%'>&nbsp;</td><td width='8%'>&nbsp;</td><td width='14%'>&nbsp;</td></tr>";}

					?>

					</table>
					<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
						<tr>
							<td>
									<hr>
									There is also an SR value one must make in order to learn the language.&nbsp; 
									When someone wants to learn a new language, they must make the SR vs. INT to see 
									if they are able to learn the one they chose.&nbsp; They will then get a book 
									that they can take on their travels that will teach them the language.&nbsp; 
									This means another 1d6 roll determines how many adventures one must go on before 
									they finished their studies.&nbsp; This &quot;number of adventures&quot; takes into 
									account reading during adventure rest periods and during the break between 
									adventures at a home, tavern, or inn.&nbsp; If they fail the SR, then they 
									cannot attempt to learn another language until that same amount of time has passed.
									<hr>
									Humans begin their journey knowing &quot;common&quot;, as the other races begin with 
									their language listed in the kindred supplement for Magestyck.&nbsp; Any 
									additional language may be chosen at character creation time, that require an 
									L2SR or lower, immediately...without the learning time.&nbsp; Any other 
									languages, with higher SR requirements...or after the game session begins, must 
									be learned by the method described above.
							</td>
						</tr>
					</table>
			</td>
		</tr>
	</table>

	</div>

	<br><?php
}
else if ($id == "kin")
{
	$qry = "SELECT * FROM monsters_rpgs WHERE creator='TT' and loot!='' ORDER BY xp DESC, name";
	$res = wz_query( $connection, $qry ); /* qry. */
	$tab = wz_query( $connection, $qry ); /* qry. */

	$cut = 6;
	$breaker = 1;

	?>

	<style type="text/css">
		thead { display:table-header-group }
	</style>

	<div align="center">

	<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
		<tr>
			<td>
				<thead></thead>
					<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
						<tr>
							<td width="315"><img src="pics_tools/tt_bw_logo.jpg"></td>
							<td align="right"><img src="pics_tools/tt_mg_magestykc.jpg"><br><img src="pics_tools/tt_mg_kindred.jpg"></td>
						</tr>
					</table>

					<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
						<tr>
							<td><font size="2">
								This is a listing of the different types of kindred for the Tunnels &amp; Trolls&trade; supplement, Magestyck&trade;.&nbsp; These kindred are 
								derived from the Tome of Monsters section for Magestykc&trade;.&nbsp; Humanoids that are sized enough to fit into the dungeons and tunnels of the world.&nbsp; 
								Unlike the monster counterparts of the few, some of these creatures simply decided to join society for one reason or another. All kindred below 
								can choose whatever `Type` they want to be, but must also qualify for it. Some kindred are limited to what they can choose, but that information is included with 
								the kindred.</font><hr>
							</td>
						</tr>
					</table>

					<?php while ($ary=wz_fetch_assoc($res)) : ?>

						<?php $breaker = $breaker + 1; if ($breaker > $cut){echo "<div style='page-break-after:always; height:1px'>&nbsp;</div>"; $breaker = 1; $cut = 6;} ?>

						<table cellpadding="2" style="border-collapse: collapse" width="700" cellspacing="2">

							<tr>
								<td NOWRAP width="18%"><font size="4"><?php if ($ary['name'] == "Man, Merchant"){echo "Human";} else {echo $ary['name'];} ?></font></td>
								<td NOWRAP width="18%" align="center">Type: <i><?php echo $ary['type']; ?></i></td>
								<td NOWRAP width="18%" align="center">Size: <i><?php echo $ary['size']; ?></i></td>
								<td NOWRAP width="18%" align="center">Move: <i><?php echo $ary['move']; ?></i></td>
								<td NOWRAP width="28%" align="right">Language: <i><?php $talker = explode("/", $ary['spdef']); echo $talker['0']; ?></i></td>
							</tr>
							<tr>
								<?php	if ($tt7 > 0){ echo "<td NOWRAP colspan='5' align='center'><u>" . $ary['loot'] . "</u></td>"; }
										else if ($tt5 > 0)
										{
											echo "<td NOWRAP colspan='5' align='center'><u>";
											$stat = explode(" ", $ary['loot']);
											echo "STR: " . $stat['1'] . " / CON: " . $stat['4'] . " / DEX: " . $stat['7'] . " / INT: " . $stat['10'] . " / LCK: " . $stat['13'] . " / CHR: " . $stat['16'] . " / HGT: " . $stat['22'] . " / WGT: " . $stat['25'];
											echo "</u></td>";
										} ?>
							</tr>
							<tr>
								<td colspan="5"><i><?php $generals = explode("_", $ary['treasure']); if (($tt7 == 1) || ($generals['1'] == "")){$general = $generals['0'];} else {$general = $generals['1'];} echo $general; ?></i><hr></td>
							</tr>

						</table>

					<?php endwhile; ?>

				<div style="page-break-after:always; height:1px;">&nbsp;</div>
					<p align="center"><font size="5">Kindred Attribute Modifier Table</font></p>
					<table border="0" cellpadding="2" style="border-collapse: collapse" width="700">
						<tr>
							<td NOWRAP bgcolor="#000000"><font color="#FFFFFF"><b>Kindred</b></font></td>
							<td NOWRAP align="center" bgcolor="#000000"><font color="#FFFFFF"><b>STR</b></font></td>
							<td NOWRAP align="center" bgcolor="#000000"><font color="#FFFFFF"><b>CON</b></font></td>
							<td NOWRAP align="center" bgcolor="#000000"><font color="#FFFFFF"><b>DEX</b></font></td>
							<td NOWRAP align="center" bgcolor="#000000"><font color="#FFFFFF"><b>INT</b></font></td>
							<td NOWRAP align="center" bgcolor="#000000"><font color="#FFFFFF"><b>LCK</b></font></td>
							<td NOWRAP align="center" bgcolor="#000000"><font color="#FFFFFF"><b>CHR</b></font></td>
						<?php if ($tt7 > 0){?><td NOWRAP align="center" bgcolor="#000000"><font color="#FFFFFF"><b>WIZ</b></font></td><?php } ?>
							<td NOWRAP align="center" bgcolor="#000000"><font color="#FFFFFF"><b>HGT</b></font></td>
							<td NOWRAP align="center" bgcolor="#000000"><font color="#FFFFFF"><b>WGT</b></font></td>
						</tr>
				<?php while ($ary=wz_fetch_assoc($tab)) :

					if ($barnum == 1){$barcol = "bgcolor='#C0C0C0'"; $barnum = 0;}
					else {$barcol = ""; $barnum = 1;} 

					$stat = explode(" ", $ary['loot']);
				?>
						<tr>
							<td NOWRAP <?php echo $barcol; ?>><?php if ($ary['name'] == "Man, Merchant"){echo "Human";} else {echo $ary['name'];} ?></td>
							<td NOWRAP align="center" <?php echo $barcol; ?>><?php echo $stat['1']; ?></td>
							<td NOWRAP align="center" <?php echo $barcol; ?>><?php echo $stat['4']; ?></td>
							<td NOWRAP align="center" <?php echo $barcol; ?>><?php echo $stat['7']; ?></td>
							<td NOWRAP align="center" <?php echo $barcol; ?>><?php echo $stat['10']; ?></td>
							<td NOWRAP align="center" <?php echo $barcol; ?>><?php echo $stat['13']; ?></td>
							<td NOWRAP align="center" <?php echo $barcol; ?>><?php echo $stat['16']; ?></td>
						<?php if ($tt7 > 0){?><td NOWRAP align="center" <?php echo $barcol; ?>><?php echo $stat['19']; ?></td><?php } ?>
							<td NOWRAP align="center" <?php echo $barcol; ?>><?php echo $stat['22']; ?></td>
							<td NOWRAP align="center" <?php echo $barcol; ?>><?php echo $stat['25']; ?></td>
						</tr>
				<?php endwhile; ?>
					</table>

			</td>
		</tr>
	</table>

	</div>

<?php } else
{
	if ($tt_vs == 7){$x_game = "Tunnels & Trolls 7th Edition";} else if ($tt_vs == 9){$x_game = "Tunnels & Trolls Deluxe";} else {$x_game = "Tunnels & Trolls 5th Edition";}

	$ttlvl = $_GET['lvl'];
		if ($ttlvl == 1){$difficult = "a normal";}
		else if ($ttlvl == 2){$difficult = "a challenging";}
		else if ($ttlvl == 3){$difficult = "a difficult";}
		else if ($ttlvl == 4){$difficult = "a heroic";}
		else if ($ttlvl == 9){$difficult = "a simple";}
		else {$difficult = "an epic";}

	$qry = "SELECT * FROM monsters_rpgs WHERE creator='TT' ORDER BY name";
	$res = wz_query( $connection, $qry ); /* qry. */

	$cut = 8;
	$breaker = 1;

	?>

	<style type="text/css">
		thead { display:table-header-group }
	</style>

	<div align="center">

	<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
		<tr>
			<td>
				<thead></thead>
				<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
					<tr>
						<td width="315"><img src="pics_tools/tt_bw_logo.jpg"></td>
						<td align="right"><img src="pics_tools/tt_mg_magestykc.jpg"><br><img src="pics_tools/tt_mg_monsters.jpg"></td>
					</tr>
				</table>

				<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
					<tr>
						<td>
							<font size="2">This is a listing of the different monsters for 
							the Tunnels &amp; Trolls&trade; supplement, Magestyck&trade;.&nbsp; 
							These monsters are determined for <?php echo $difficult; ?> 
							adventure.  Monsters are listed with a 
							<i>Type</i> to help determine what family the 
							monster belongs to.&nbsp; They also have their <i>MR</i> 
							and <i>Dice</i> calculated, where any natural 
							protection is calculated into the <i>MR</i> instead 
							of hit absorption.&nbsp; There is a <i>#App</i> for 
							a guidance of how many monsters are encountered at a 
							given time.&nbsp; There are <i>Size</i> and <i>Move</i> 
							values to give an indication on how big they are and 
							how fast they can move during a normal minute or two 
							of travel.&nbsp; They also have their attributes in case they are needed during certain game situations.&nbsp; 
							Some monsters may have a description if needed, an explanation of special abilities, languages spoken, and where they dwell in the world.</font>
						</td>
					</tr>
				</table>

					<?php while ($ary=wz_fetch_assoc($res)) :

						$breaker = $breaker + 1; if ($breaker > $cut){echo "<div style='page-break-after:always; height:1px'>&nbsp;</div>"; $breaker = 1; $cut = 7;}

						echo "<hr color='#000000' size='1' width='700'>";

						include("functions/monsters_tt.php");

							$living = explode(" ", $ary['location']);
							sort($living);
							$dwell = "";
							$c = count($living);
							$i = count($living);
							$s = 0;

							while ($c > 0) :
								if ($living[$s] == "PF"){$where = "forests";}
								else if ($living[$s] == "PH"){$where = "hills";}
								else if ($living[$s] == "PM"){$where = "mountains";}
								else if ($living[$s] == "PP"){$where = "plains";}
								else if ($living[$s] == "PS"){$where = "swamps";}
								else if ($living[$s] == "PD"){$where = "deserts";}
								else if ($living[$s] == "FW"){$where = "rivers/lakes";}
								else if ($living[$s] == "SW"){$where = "oceans";}
								else if ($living[$s] == "CF"){$where = "snowy forests";}
								else if ($living[$s] == "CH"){$where = "snowy hills";}
								else if ($living[$s] == "CM"){$where = "snowy mountains";}
								else if ($living[$s] == "CP"){$where = "snowy plains";}
								else if ($living[$s] == "TF"){$where = "jungle/tropical forests";}
								else if ($living[$s] == "TH"){$where = "jungle/tropical hills";}
								else if ($living[$s] == "TM"){$where = "jungle/tropical mountains";}
								else if ($living[$s] == "TS"){$where = "jungle/tropical swamps";}
								else {$where = "dungeons";}

								if ($i == 1){$dwell = $where;}
								else if ($c == 1){$dwell = $dwell . " and " . $where;}
								else {$dwell = $dwell . " " . $where . ",";}
								$s = $s + 1;
								$c = $c - 1;
							endwhile;

							if ($description != ""){$info = $description . "&nbsp;The areas they dwell are the " . $dwell . ".";}
							else {$info = "The areas they dwell are the " . $dwell . ".";}

							$speak = explode("/", $ary['spdef']);
							sort($speak);
							$talking = "";
							$c = count($speak);
							$i = count($speak);
							$s = 0;

							while ($c > 0) :
								if ($i == 1){$talking = $speak[$s];}
								else if ($c == 1){$talking = $talking . " and " . $speak[$s];}
								else {$talking = $talking . " " . $speak[$s] . ",";}
								$s = $s + 1;
								$c = $c - 1;
							endwhile;

							if ($talking != "None"){$info = $info . "&nbsp;They are able to speak " . $talking . ".";}
					?>
					<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
						<tr>
							<td>
								<?php echo $ary['name']; ?><font size="2">
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td><font size="2">Type: <i><?php echo $ary['type']; ?></i></font></td>
										<td align="center"><font size="2">MR: <i><?php echo $my_mr_is; ?></i></font></td>
										<?php
												if ($x_game == "Tunnels & Trolls Deluxe")
												{
													echo "<td align='center'><font size='2'>Lvl: <i>" . CEIL($my_mr_is/25) . "</i></font></td>";
												}
										?>
										<td align="center"><font size="2">Dice: <i><?php echo $my_dc_is; ?></i></font></td>
										<td align="center"><font size="2">#App: <i><?php echo $ary['enc']; ?></i></font></td>
										<td align="center"><font size="2">Size: <i><?php echo $ary['size']; ?></i></font></td>
										<td align="right"><font size="2">Move: <i><?php echo $ary['move']; ?></i></font></td>
									</tr>
								</table>
								<?php echo $info; ?></font>
							</td>
						</tr>
					</table>
				<?php endwhile; ?>
			</td>
		</tr>
	</table>

	</div>

	<hr color='#000000' size='1' width='700'>

<?php }

$bottom_notices = 7;
include("notices.php");

echo "</body></html>";

?>