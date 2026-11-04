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

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Scavenging Lists</p>";

	include("game_options.php");
	echo "<input type='hidden' value='" . $x_game . "' name='x_game'>";

	$set = "post-apocalyptic";
	if ($x_game == "Broken Urthe"){$x_genre = "urthe";}
	else if ($x_game == "Gamma World"){$x_genre = "gammaworld";}
	else if ($x_game == "Metamorphosis Alpha"){$x_genre = "metalpha";}
	else if ($x_game == "Millenniums & Mutations" || $x_game == "Mutant Future" || $x_game == "Post-Apocalyptic") {$x_genre = "wasteland";}
	else {$x_genre = "zombies"; $set = "survival horror";}
	echo "<input type='hidden' value='" . $x_genre . "' name='genre'>";

	echo "<p style='text-align: justify;'>Here you can create a completely random set of scavenging items for your " . $set . " role-playing game.";

	?>
		<div id="div_table">
			<div class="row">
				<span class="cell">Building:</span>
				<span class="cell">
					<select size="1" id="DropOption" name="building">
					<option value="random">Random</option>
					<option value="book_store">Book Store</option>
					<option value="cloth_store">Clothing Store</option>
					<option value="dept_store">Department Store</option>
					<option value="electric_store">Electronics Store</option>
					<option value="fire_station">Fire Station</option>
					<option value="gas_store">Gas Station/Convenient Store</option>
					<option value="generic">Generic Building</option>
					<option value="food_store">Grocery Store</option>
					<option value="tool_store">Hardware Store</option>
					<option value="home">Home</option>
					<option value="hospital">Hospital/Pharmacy</option>
					<option value="army_base">Military Base/Army Surplus Store</option>
					<option value="police_station">Police Station</option>
					<option value="restaurant">Restaurant</option>
					<option value="sport_store">Sporting Goods Store</option>
					<option value="toy_store">Toy Store</option>
					</select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Building Sets:</span>
				<span class="cell"><select size="1" id="DropOption" name="sets">
					<option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select></span>
			</div>
			<div class="row">
				<span class="cell">Amount Per Set:</span>
				<span class="cell">Between:&nbsp;&nbsp;
				<select size="1" id="DropOption" name="amount1">
					<?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select>&nbsp;&amp;&nbsp;
				<select size="1" id="DropOption" name="amount2">
					<?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Corpses:</span>
				<span class="cell"><select size="1" id="DropOption" name="csets">
					<option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select></span>
			</div>
			<div class="row">
				<span class="cell">Amount Per Corpse:</span>
				<span class="cell">Between:&nbsp;&nbsp;
				<select size="1" id="DropOption" name="camount1">
					<?php $runner=20; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select>&nbsp;&amp;&nbsp;
				<select size="1" id="DropOption" name="camount2">
					<?php $runner=20; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Condition Items:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="condition" value="1"></span>
			</div>
		</div>
		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create"><br><br>

		<div id="div_table">
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose the GAME TYPE, as it will mostly determine what types of corpses are created.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Select the type of BUILDING you want to produce items for.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose how many BUILDING SETS you want (example: if you want 10 fire stations, select "10").</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Decide on how many items you want in each building, choosing a minimum and maximum.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose how many CORPSES you want, which will have items on them.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Decide on how many items you want on/near each corpse, choosing a minimum and maximum.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Decide if you want to CONDITION ITEMS, meaning some may be broken or ruined...while others may be in excellent condition.*</span>
			</div>
		</div>

		<br>*These fields are optional<br>

		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

$building = $_POST['building'];
$sets = $_POST['sets'];
$amount1 = $_POST['amount1'];
$amount2 = $_POST['amount2'];
	if ($amount1 > $amount2){$amount1 = $amount2;}

$csets = $_POST['csets'];
$camount1 = $_POST['camount1'];
$camount2 = $_POST['camount2'];
	if ($camount1 > $camount2){$camount1 = $camount2;}

$quality = $_POST['condition'];
$genre = $_POST['genre'];
?>

<div align="center">
	<table border="0" cellpadding="0" cellspacing="0" width="700">
		<tr>
			<td>
			<?php if ($sets > 0){ $breaker=1; ?>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="50%"><img src="pics_tools/tools_scavenge<?php if ($genre != "zombies"){echo "_pa";}?>.jpg"></td>
					<td width="50%" align="right" valign="bottom"><img src="pics_tools/tools_scavenge_building<?php if ($genre != "zombies"){echo "_pa";}?>.jpg"></td>
				</tr>
			</table>
			<hr>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<?php while ($sets > 0) :
					$qty = mt_rand($amount1,$amount2);
					$num=1;
					$snum=ceil($qty/2)+1;

						if ($building == "random")
						{
							switch (mt_rand(0,15))
							{
								case 0: $build = "book_store"; break;
								case 1: $build = "cloth_store"; break;
								case 2: $build = "dept_store"; break;
								case 3: $build = "electric_store"; break;
								case 4: $build = "fire_station"; break;
								case 5: $build = "gas_store"; break;
								case 6: $build = "generic"; break;
								case 7: $build = "food_store"; break;
								case 8: $build = "tool_store"; break;
								case 9: $build = "home"; break;
								case 10:$build = "hospital"; break;
								case 11:$build = "army_base"; break;
								case 12:$build = "police_station"; break;
								case 13:$build = "restaurant"; break;
								case 14:$build = "sport_store"; break;
								case 15:$build = "toy_store"; break;
							}
						}
						else {$build = $building;}

						if ($build == "book_store"){$title = "Book Store";}
						else if ($build == "cloth_store"){$title = "Clothing Store";}
						else if ($build == "dept_store"){$title = "Department Store";}
						else if ($build == "electric_store"){$title = "Electronics Store";}
						else if ($build == "fire_station"){$title = "Fire Station";}
						else if ($build == "gas_store"){$title = "Gas Station/Convenient Store";}
						else if ($build == "food_store"){$title = "Grocery Store";}
						else if ($build == "tool_store"){$title = "Hardware Store";}
						else if ($build == "home"){$title = "Home";}
						else if ($build == "hospital"){$title = "Hospital/Pharmacy";}
						else if ($build == "army_base"){$title = "Military Base/Army Surplus Store";}
						else if ($build == "police_station"){$title = "Police Station";}
						else if ($build == "restaurant"){$title = "Restaurant";}
						else if ($build == "sport_store"){$title = "Sporting Goods Store";}
						else if ($build == "toy_store"){$title = "Toy Store";}
						else {$title = "Building";}
				?>
				<tr>
					<td colspan="4"><font size="4"><?php echo $title; ?></font></td>
				</tr>
					<?php while ($qty > 0) : if ($cols != 1){ $cols = 1; ?>
						<tr>
							<td width="25" align="right"><font size="2"><?php echo $num; $num=$num+1; ?></font></td>
							<td width="325"><font size="2">:&nbsp;<?php echo zombieItems($build); if ($quality > 0){ echo zombieQuality(); } ?></font></td>
						<?php } else {$cols = 0; ?>
							<td width="25" align="right"><font size="2"><?php echo $snum; $snum=$snum+1; ?></font></td>
							<td width="325"><font size="2">:&nbsp;<?php echo zombieItems($build); if ($quality > 0){ echo zombieQuality(); } ?></font></td>
						</tr>
						<?php } ?>
					<?php $qty=$qty-1; endwhile; ?>
					<?php if ($cols == 1){ $cols=0; ?>
							<td width="25" align="right">&nbsp;</font></td>
							<td width="325"><font size="2">&nbsp;</font></td>
						</tr>
					<?php } ?>
				<tr>
					<td align="right" colspan="4"><hr size="1"></td>
				</tr>
				<?php $sets=$sets-1; endwhile; ?>
			</table>
			<?php } if ($csets > 0){ if ($breaker > 0){echo "<p>&nbsp;";} ?>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="50%"><img src="pics_tools/tools_scavenge<?php if ($genre != "zombies"){echo "_pa";}?>.jpg"></td>
					<td width="50%" align="right" valign="bottom"><img src="pics_tools/tools_scavenge_corpse<?php if ($genre != "zombies"){echo "_pa";}?>.jpg"></td>
				</tr>
			</table>
			<hr>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<?php while ($csets > 0) :
					$qty = mt_rand($camount1,$camount2);
					$num=1;
					$snum=ceil($qty/2)+1;
					$zombie = makeZombie(1);

					switch (mt_rand(0,12))
					{
						case 0:	$mname = orcName();			break;
						case 1:	$mname = dwarfName();		break;
						case 2:	$mname = gnomeName();		break;
						case 3:	$mname = elfName();			break;
						case 4:	$mname = genericName();		break;
						case 5:	$mname = demonName();		break;
						case 6:	$mname = impName();			break;
						case 7:	$mname = lizardmanName();	break;
						case 8:	$mname = ratmanName();		break;
						case 9:	$mname = goblinName();		break;
						case 10:$mname = impName();			break;
						case 11:$mname = wolfName(1);		break;
						case 12:$mname = catName(any);		break;
					}
					switch (mt_rand(0,5))
					{
						case 0:	$reason = "seems to have left behind the";			break;
						case 1:	$reason = "seems to have been reduced to the";		break;
						case 2:	$reason = "is now nothing more than the";			break;
						case 3:	$reason = "is now reduced to a simple";				break;
						case 4:	$reason = "has died here, leaving behind the";		break;
						case 5:	$reason = "has perished here, leaving this";		break;
					}
					if (mt_rand(1,2) == 1){$lname = ucfirst(strtolower(speciesName() . mutantName()));} else {$lname = ucfirst(strtolower(mutantName() . speciesName()));}

					if ($genre != "zombies"){$person = "corpse";} else if (mt_rand(1,4) == 1){$person = "corpse";} else {$person = "zombie";}
				?>
				<tr>
					<?php if ($genre == "zombies"){ ?>
						<td colspan="4"><font size="4"><?php echo $zombie[2]; ?> <?php echo $zombie[3]; ?></font><font size="2">&nbsp;-&nbsp;<?php echo $zombie[2]; ?> was a <?php echo $zombie[0] . $zombie[1] . $zombie[12]; ?> that <?php echo $zombie[8] . $zombie[9] . $zombie[11] . $zombie[10] ?>&nbsp Found on or near the corpse is...</font></td>
					<?php } else { ?>
						<td colspan="4"><font size="4"><?php echo $mname; ?> <?php echo $lname; ?></font><font size="2">&nbsp;-&nbsp;<?php echo $mname; ?> <?php echo $reason; ?> <?php echo PAcorpseMaker(); ?>.&nbsp Found on or near the corpse is...</font></td>
					<?php } ?>
				</tr>
					<?php while ($qty > 0) : if ($cols != 1){ $cols = 1; ?>
						<tr>
							<td width="25" align="right"><font size="2"><?php echo $num; $num=$num+1; ?></font></td>
							<td width="325"><font size="2">:&nbsp;<?php
								if ($genre == "zombies"){echo zombieItems($person); if ($quality > 0){ echo zombieQuality(); } }
								else
								{
									if (mt_rand(1,10) == 1)
									{
										if ($genre == "urthe" || $genre == "gammaworld" || $genre == "metalpha")
										{
											if ($genre == "urthe"){$this_odd_things = strtolower(makeBUItem(mt_rand(1,20),mt_rand(1,3),1)); }
											else if ($genre == "gammaworld"){$this_odd_things = strtolower(makeGWItem(mt_rand(1,20),mt_rand(1,3),1)); }
											else if ($genre == "metalpha"){$this_odd_things = strtolower(makeMAItem(mt_rand(1,20),mt_rand(1,3),1)); }
											$this_odd_thing = explode( ' [', $this_odd_things );
											if ($quality > 0){ $this_quality = zombieQuality(); }
											echo $this_odd_thing[0] . $this_quality;
										}
										else {echo strtolower(makePAItem(mt_rand(1,20),mt_rand(1,3),1)); if ($quality > 0){ echo zombieQuality(); } }
									}
									else { echo zombieItems($person); if ($quality > 0){ echo zombieQuality(); } }
								}
								?></font></td>
						<?php } else {$cols = 0; ?>
							<td width="25" align="right"><font size="2"><?php echo $snum; $snum=$snum+1; ?></font></td>
							<td width="325"><font size="2">:&nbsp;<?php
								if ($genre == "zombies"){echo zombieItems($person); if ($quality > 0){ echo zombieQuality(); } }
								else
								{
									if (mt_rand(1,10) == 1)
									{
										if ($genre == "urthe" || $genre == "gammaworld" || $genre == "metalpha")
										{
											if ($genre == "urthe"){$this_odd_things = strtolower(makeBUItem(mt_rand(1,20),mt_rand(1,3),1)); }
											else if ($genre == "gammaworld"){$this_odd_things = strtolower(makeGWItem(mt_rand(1,20),mt_rand(1,3),1)); }
											else if ($genre == "metalpha"){$this_odd_things = strtolower(makeMAItem(mt_rand(1,20),mt_rand(1,3),1)); }
											$this_odd_thing = explode( ' [', $this_odd_things );
											if ($quality > 0){ $this_quality = zombieQuality(); }
											echo $this_odd_thing[0] . $this_quality;
										}
										else {echo strtolower(makePAItem(mt_rand(1,20),mt_rand(1,3),1)); if ($quality > 0){ echo zombieQuality(); } }
									}
									else { echo zombieItems($person); if ($quality > 0){ echo zombieQuality(); } }
								}
								?></font></td>
						</tr>
						<?php } ?>
					<?php $qty=$qty-1; endwhile; ?>
					<?php if ($cols == 1){ $cols=0; ?>
							<td width="25" align="right">&nbsp;</font></td>
							<td width="325"><font size="2">&nbsp;</font></td>
						</tr>
					<?php } ?>
				<tr>
					<td align="right" colspan="4"><hr size="1"></td>
				</tr>
				<?php $csets=$csets-1; endwhile; ?>
			</table>
			<?php } ?>
			</td>
		</tr>
	</table>
</div>

<?php

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>