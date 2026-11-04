<?php

include("db.php");
include_once("functions/geomorphs.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }
$cave = 0; if ( isset( $_POST["use_cave"] ) ){ $cave = $_POST["use_cave"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Labyrinth Lord";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	include("game_options.php");

	$_SESSION['SESSION_RPG_GAME'] = $x_game;

	if ($x_game == "OSRIC")
	{
		$source = "There are creatures from both OSRIC and Monsters of Myth.";
		$boxset = "OSRIC";
		$lifes = "hit points";
	}
	else if ($x_game == "Labyrinth Lord")
	{
		$source = "There are creatures from both Labyrinth Lord and the Advanced Edition Companion.";
		$boxset = "Labyrinth Lord";
		$lifes = "hit points";
	}
	else if ($x_game == "Swords & Wizardry")
	{
		$source = "There are all the creatures from Swords &amp; Wizardry here.";
		$boxset = "Swords &amp; Wizardry";
		$lifes = "hit points";
	}
	else if ($x_game == "BFRPG")
	{
		$source = "There are all the creatures from the Basic Fantasy Role-Playing Game here.";
		$boxset = "BFRPG";
		$lifes = "hit points";
	}
	else if ($x_game == "BD&D")
	{
		$source = "There are all the creatures from Basic Dungeons & Dragons here.";
		$boxset = "Basic Dungeons & Dragons";
		$lifes = "hit points";
	}
	else if ($x_game == "Swords & Six-Siders")
	{
		$source = "There are almost 500 creatures used here.";
		$boxset = "Swords & Six-Siders";
		$lifes = "hit points";
	}
	else if ($x_game == "AD&D")
	{
		$source = "There are all the creatures from Advanced Dungeons & Dragons here.";
		$boxset = "Advanced Dungeons & Dragons";
		$lifes = "hit points";
	}
	else if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
	{
		$source = "There are almost 500 creatures from the Magestykc supplement for Tunnels &amp; Trolls.";
		$boxset = "Tunnels &amp; Trolls";
		$lifes = "appropriate monsters";
	}
	else
	{
		$source = "There are about 500 creatures from lore, myth, and legend.";
		$boxset = "fantasy";
		$lifes = "life points";
	}

	if ($cave == "Dungeon"){ $word_cave = "dungeon"; $title_cave = "dungeon"; }
	else if ($cave == "Cavernous"){ $word_cave = "cavernous"; $title_cave = "cave"; }
	else { $word_cave = "cavernous dungeon"; $title_cave = "cavernous dungeon"; }

	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' action='" . $my_form_name . "'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Dungeon Builder</p>";

	echo "<p style='text-align: justify;'>";
	?>
		This will create a totally unique <?php echo $title_cave; ?> for you.  <?php echo $source; ?>  
		There are various traps and room decorations to make your dungeon a dangerous place.  
		It will also include some magic items &quot;just&quot; for your dungeon.  
		This should help you quickly create a dungeon for your <?php echo $boxset; ?> role-playing game.

	<br>
	<br>

	Map Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="DropOption" name="use_cave" onchange="submit()">
		<option <?php if ($word_cave == "cavernous dungeon"){echo "selected";} ?>>Cavernous Dungeon</option>
		<option <?php if ($word_cave == "dungeon"){echo "selected";} ?>>Dungeon</option>
		<option <?php if ($word_cave == "cavernous"){echo "selected";} ?>>Cavernous</option>
	</select>

	<?php

	echo "</form><form style='margin-bottom:0; margin-top:0;' method='POST' target='_blank' action='" . $my_form_name . "?run=1'>";

	if ($word_cave == "dungeon"){$srch_typ1 = "0dungeon0";} else if ($word_cave == "cavernous"){$srch_typ1 = "0cave0";} else {$srch_typ1 = "";} 

	$pattern = "/" . $srch_typ1 . "/";
	$srch_typ2 = preg_grep($pattern, $geomorphs);

	$src = preg_grep("/0dyson0/", $srch_typ2);
	$num1 = number_format(count($src));

	$src = preg_grep("/0risus0/", $srch_typ2);
	$num2 = number_format(count($src));

	$src = preg_grep("/0rorschachhamster0/", $srch_typ2);
	$num3 = number_format(count($src));

	$src = preg_grep("/0stonewerks0/", $srch_typ2);
	$num4 = number_format(count($src));

	$src = preg_grep("/0glenn0jupp0/", $srch_typ2);
	$num5 = number_format(count($src));

	$src = preg_grep("/0stuart0/", $srch_typ2);
	$num6 = number_format(count($src));

	$src = preg_grep("/0infinite0zer00/", $srch_typ2);
	$num7 = number_format(count($src));

	?>

	<input type="hidden" name="type" value="<?php echo $word_cave; ?>">

	<div id="div_table">

	<div class="row">
		<span class="cell">- <a target="_blank" href="http://rpgcharacters.wordpress.com/">Dyson Logos</a></span>
		<span class="cell"><input type="checkbox" checked name="cave_dyson" value="1"></span>
		<span class="cell"><?php echo $num1; ?> Tiles</span>
		<span style="width:50px;" class="cell">&nbsp;</span>
		<span class="cell">- <a target="_blank" href="http://www.risusmonkey.com/">Risus Monkey</a></span>
		<span class="cell"><input type="checkbox" checked name="cave_risus" value="1"></span>
		<span class="cell"><?php echo $num2; ?> Tiles</span>
	</div>
	<div class="row">
		<span class="cell">- <a target="_blank" href="http://rorschachhamster.wordpress.com/">Rorschachhamster</a></span>
		<span class="cell"><input type="checkbox" checked name="cave_rorsch" value="1"></span>
		<span class="cell"><?php echo $num3; ?> Tiles</span>
		<span style="width:50px;" class="cell">&nbsp;</span>
		<span class="cell">- <a target="_blank" href="http://stonewerks.wordpress.com/">Stonewerks</a></span>
		<span class="cell"><input type="checkbox" checked name="cave_stone" value="1"></span>
		<span class="cell"><?php echo $num4; ?> Tiles</span>
	</div>

		<?php if (($word_cave == "dungeon") || ($word_cave == "cavernous dungeon")){ ?>

			<div class="row">
				<span class="cell">- <a target="_blank" href="http://seekingwing.blogspot.com/">Glenn Jupp</a></span>
				<span class="cell"><input type="checkbox" checked name="cave_glenn" value="1"></span>
				<span class="cell"><?php echo $num5; ?> Tiles</span>
				<span style="width:50px;" class="cell">&nbsp;</span>
				<span class="cell">- <a target="_blank" href="http://strangemagic.robertsongames.com/">Stuart Robertson</a></span>
				<span class="cell"><input type="checkbox" checked name="cave_stuart" value="1"></span>
				<span class="cell"><?php echo $num6; ?> Tiles</span>
			</div>

		<?php } if (($word_cave == "cavernous") || ($word_cave == "cavernous dungeon")){ ?>

			<div class="row">
				<span class="cell">- <a target="_blank" href="http://shashnia.blogspot.com/">Infinite Zer0</a></span>
				<span class="cell"><input type="checkbox" checked name="cave_zero" value="1"></span>
				<span class="cell"><?php echo $num7; ?> Tiles</span>
				<span style="width:50px;" class="cell">&nbsp;</span>
				<span class="cell">&nbsp;</span>
				<span class="cell">&nbsp;</span>
				<span class="cell">&nbsp;</span>
			</div>

		<?php } ?>

	</div>

	<?php

	echo "<input style='height: 1px;' type='hidden' name='program_user' value='1'>";
	echo "<input style='height: 1px;' type='hidden' value='" . $x_game . "' name='x_package'>";
	echo "<input type='hidden' name='map_type' value='" . $word_cave . "'>";

	echo "<p style='text-align: justify;'>";
	?>
		<div id="div_table">
			<div class="row">
				<span class="cell">Name:</span>
				<span class="cell"><input type="text" id="InputOption" name="x_area" size="30"></span>
			</div>
			<div class="row">
				<span class="cell">Level:</span>
			<?php if ($x_game == "Swords & Six-Siders"){ ?>
				<span class="cell"><select size="1" id="DropOption" name="x_level"><option></option><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?><option value='100'>6+</option></select></span>
			<?php } else { ?>
				<span class="cell"><select size="1" id="DropOption" name="x_level"><option></option><?php $runner=19; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?><option value='100'>20+</option></select></span>
			<?php } ?>
			</div>
<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cell">Dice + Adds:</span>
				<span class="cell"><input type="text" id="InputOption" name="tt_dice" size="3">&nbsp;+&nbsp;<input type="text" id="InputOption" name="tt_adds" size="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vary Amount:&nbsp;<input type="checkbox" id="InputOption" name="tt_vary" value="1"></span>
			</div>
			<div class="row">
				<span class="cell">Difficulty:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_ttlvl">
					<option value="9">Easy</option>
					<option value="1" selected>Normal</option>
					<option value="2">Challenging</option>
					<option value="3">Difficult</option>
					<option value="4">Heroic</option>
					<option value="5">Epic</option>
				</select></span>
			</div>
<?php } else { ?>
			<div class="row">
				<span class="cell">Characters:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_characters"><option></option><?php $runner=20; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>&nbsp; &nbsp;...a &quot;level&quot; is required for this.</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell">Outside Terrain:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_terrain">
					<option></option>
					<option value="PF">Forest</option>
					<option value="PH">Hills</option>
					<option value="PM">Mountains</option>
					<option value="PP">Plains</option>
					<option value="PS">Swamp</option>
					<option value="PD">Desert</option>
					<option value="FW">Freshwater</option>
					<option value="SW">Sea</option>
					<option value="CF">Snowy Forest</option>
					<option value="CH">Snowy Hills</option>
					<option value="CM">Snowy Mountains</option>
					<option value="CP">Snowy Plains</option>
					<option value="TF">Jungle/Tropics Forest</option>
					<option value="TH">Jungle/Tropics Hills</option>
					<option value="TM">Jungle/Tropics Mountains</option>
					<option value="TS">Jungle/Tropics Swamp</option>
				</select></span>
			</div>
			<div class="row">
				<span class="cell">Separate Map:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_sep_map" value="1"></span>
			</div>
			<div class="row">
				<span class="cell">Map Width:</span>
				<span class="cell"><select size="1" id="DropOption" name="map_wide">
					<?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Map Height:</span>
				<span class="cell"><select size="1" id="DropOption" name="map_high">
					<?php $runner=10; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select>&nbsp;&nbsp;&nbsp;&nbsp;...or use your own map...</span>
			</div>
			<div class="row">
				<span class="cell">My Map's Rooms:</span>
				<span class="cell"><select size="1" id="DropOption" name="map_rooms"><option></option>
					<?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
				</select></span>
			</div>
			<div class="row">
				<span class="cull">Start With Number:</span>
				<span class="cell">
					<select id="DropOption" name="map_numbers">
						<?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
					</select>
				</span>
			</div>
<?php if ($x_game == "OSRIC"){ ?>
			<div class="row">
				<span class="cell">Monster of Myth:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_extra" value="1"></span>
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
<?php if ($x_game == "Swords & Wizardry"){ ?>
			<div class="row">
				<span class="cell">Hit Dice:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_hit_dice"><option value="6">1d6</option><option value="8" selected>1d8</option></select></span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell"><a name="Manual of Monsters" title="Manual of Monsters" href="javascript:openWindow('functions/monsters.php',1090,700,0,0,0,0,1,0,10,10)"><img border="0" src="pics/manual_of_monsters.jpg"></a></span>
				<span class="cell"><br>Click on the dragon to bring up a Manual of Monsters.<br>&nbsp;-&nbsp;Read the instructions below about this feature.<br>&nbsp;-&nbsp;Check this <input type="checkbox" name="x_mm" value="1"> to use the Manual of Monsters.</span>
			</div>
		<?php if ($x_game == "Swords & Six-Siders" || $x_game == "BD&D"){?>
			<div class="row">
				<span class="cell">Show Descriptions:</span>
				<span class="cell"><input type="checkbox" id="InputOption" checked name="x_describe" value="1"></span>
			</div>
		<?php } ?>
			<div class="row">
				<span class="cell">Outside Visitors:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_outside" value="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Undead Only:&nbsp;&nbsp;<input type="checkbox" id="InputOption" name="x_undead" value="1"></span>
			</div>
			<div class="row">
				<span class="cell">Atmosphere:</span>
				<span class="cell"><select size="1" id="DropOption" name="atmo"><option value="999">No Atmosphere</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %&nbsp;chance of ordinary atmosphere</span>
			</div>
			<div class="row">
				<span class="cell">Furnish Rooms:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_furnish"><option value="1">Yes</option><option value="0">No</option></select></span>
			</div>
			<div class="row">
				<span class="cell">Encounter:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_c_c"><option>35</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %
				&nbsp;&nbsp;&nbsp;Min <select size="1" id="DropOption" name="x_c_c_min"><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Max <select size="1" id="DropOption" name="x_c_c_max"><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Low <select size="1" id="DropOption" name="x_c_c_low"><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Trap:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_t_c"><option>10</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %
				&nbsp;&nbsp;&nbsp;Min <select size="1" id="DropOption" name="x_t_c_min"><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Max <select size="1" id="DropOption" name="x_t_c_max"><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Low <select size="1" id="DropOption" name="x_t_c_low"><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
			<div class="row">
				<span class="cell">Loot:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_l_c"><option>20</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %
				&nbsp;&nbsp;&nbsp;Min <select size="1" id="DropOption" name="x_l_c_min"><?php $runner=25; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Max <select size="1" id="DropOption" name="x_l_c_max"><option>5</option><?php $runner=25; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Low <select size="1" id="DropOption" name="x_l_c_low"><option>20</option><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
			</div>
<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cell">Weapons/Armor:</span>
				<span class="cell"><input type="radio" value="0" checked id="InputOption" name="x_oldway">Use T&amp;T Items...or...<input type="radio" value="1" id="InputOption" name="x_oldway">Use Magestykc Items</span>
			</div>
<?php } ?>
<?php if ( ($x_game == "OSRIC") || ($x_game == "Swords & Six-Siders") || ($x_game == "BFRPG") || ($x_game == "AD&D") || ($x_game == "BD&D") || ($x_game == "Labyrinth Lord") || ($x_game == "Swords & Wizardry") ){ ?>
			<div class="row">
				<span class="cull">Magic Items:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_whichmagic"><option>50</option><?php $runner=101; $running=0; while ($runner > 0) : echo "<option>" . $running . "</option>"; $runner = $runner-1; $running = $running+1; endwhile; ?></select> % from the Game &amp; the remaining created by Wizardawn</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell">Loot Trapped:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_rigged_chance"><option>30</option><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Loot Adjustment:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_adjust"><option>2</option><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Unusual Items:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_weird"><option>1</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Artifacts:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_low_magic"><option>100</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Coin Amount:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_cut"><option><?php if ($x_game == "Swords & Six-Siders"){ echo "10"; } else { echo "100"; } ?></option><?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Treasured:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_rich" value="1">Dragons, Demons, Devils, &amp; Liches always have treasure</span>
			</div>
		</div>

		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create"><br><br>

		<div id="div_table">
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose the type of map you want, whether it is a cave, dungeon, or cavernous dungeon.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Check the BOXES for the geomorph artists you wish to include in the generated map.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose a NAME for your dungeon.*</span>
			</div>
<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose a LEVEL to help in monster, trap, and treasure selection.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Enter the total of DICE + ADDS for the entire group going on the adventure. If you do not enter anything in here, then monster quantities will not be generated.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Only if you chose to enter DICE + ADDS, will the VARY AMOUNT option work. It allows for an encounter between 1-## instead of every encounterd scaled toward the adventurers.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose a DIFFICULTY you want for your game. Each one raises monster abilties. This does not change the difficulty of the adventure, but allows you to fine tune the adventure if the group is reaching super high (or god like) proportions...by helping you reduce the number of monsters by making them more difficult.</span>
			</div>
<?php } else { ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose a LEVEL for your dungeon.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose how many CHARACTERS and followers are going to traverse this dungeon. Choosing this option will better calculate some <?php echo $lifes; ?> for encounters but requires to have the LEVEL set to do it.*</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Select an OUTSIDE TERRAIN for random encounters outside the dungeon.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If a map will be generated, choosing a SEPARATE MAP will keep the map from appearing on the output. Instead, you will have a map icon on the left that you can click on where the map will appear in a separate web page.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose a MAP WIDTH and HEIGHT if a map is going to be generated for you.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If you already have your own map, then select the number of rooms it has.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If your map's rooms do not start with room #1, you can specify a START WITH NUMBER for which would be the room number your map actually starts with.</span>
			</div>
<?php if ($x_game == "Swords & Wizardry"){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Decide on the hit dice you want for the encounters, either 1d6 or 1d8.</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Use the MANUAL OF MONSTERS to fine tune what appears in this dungeon. Using this will ignore such values as UNDEAD ONLY and OUTSIDE VISITORS <?php if ($x_game == "OSRIC"){ ?>...also whether you are going to use MONSTERS OF MYTH<?php } ?>. If you do not use this manual, then all dungeon monsters will be used. The check box is provided so you can flip the Manual of Monsters on and off quickly.*</span>
			</div>
<?php if ($x_game == "Swords & Six-Siders" || $x_game == "BD&D"){?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If you have selected SHOW DESCRIPTIONS, monsters may have detailed notes that will display with the rest of their information.*</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If you have selected some OUTSIDE TERRAIN, checking this may have those creatures appear in your dungeon. This does not work with freshwater or sea creatures.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Selecting UNDEAD ONLY will only use such creatures, but it can be mixed with OUTSIDE VISITORS.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Then enter your % chance for having an atmosphere in an area that is ordinary. You can also decide to have no atmosphere listed for the areas.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Decide if you want to FURNISH ROOMS with items, decorations, and furniture.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Then enter your % chances for areas to have ENCOUNTERS, TRAPS, and LOOT appear.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Select a MINimum and MAXimum amount of ENCOUNTERS, TRAPS, and LOOT that may appear.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Select a LOW ratio for your MIN and MAX values. This allows you to fine tune how often a MAX value occurs. The higher your LOW value, the less often the MAX value will be achieved.</span>
			</div>
<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">For WEAPONS/ARMOR, you can choose whether to use the Tunnels &amp; Trolls weapons and armor...or the Magestykc simple armor and weapons.</span>
			</div>
<?php } ?>
<?php if (($x_game != "Tunnels & Trolls 5th Edition") && ($x_game != "Tunnels & Trolls 7th Edition") && ($x_game != "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">For MAGIC ITEMS, you can choose to use <?php echo $x_game; ?> magic items...or Wizardawn magic items.</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Although the TRAP section covers rooms, this allows you to set how often LOOT is trapped.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If you want to do a LOOT ADJUSTMENT, then set the additional % chance per level of the encounter added to the LOOT % chance.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">How often do want things like pools, fountains, idols, altars, statues, magical talking mouths, or pentagrams to appear?*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Do you have a low magic setting? Setting the ARTIFACTS to a lower percentage will replace magic items with normal items.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Do you notice too many coins for a 3 character group? Maybe the characters are getting a little too rich. Then you can set the COIN AMOUNT to a lower percentage of coins that appear in the loot. This also reduces the value of gems and jewels.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If you want dragons, demons, devils, and liches to almost always have some type of treasure, then check this box. It will substantially add to the LOOT % to make sure they have something in their area...otherwise, they will use the standard LOOT % settings.*</span>
			</div>
		</div>

		<br>*These fields are optional

		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

$ttlvl = $_POST['x_ttlvl'];
$tt_dice = $_POST['tt_dice']+0;
$tt_adds = $_POST['tt_adds']+0;
$tt_vary = $_POST['tt_vary'];
$x_extra = $_POST['x_extra'];
$x_atmo = $_POST['atmo'];
$x_whichmagic = $_POST['x_whichmagic'];
$x_weird = $_POST['x_weird'];
$x_cut = $_POST['x_cut'];
$x_rich = $_POST['x_rich'];

$x_oldway = $_POST['x_oldway']; // USED FOR T&T CLASSIC WEAPONS/ARMOR...OR THE SIMPLE WEAPONS/ARMOR
	if ($x_oldway == 1){ $_SESSION['tt_easy_items'] = 1; } else { unset($_SESSION['tt_easy_items']); }

$x_game = $_POST['x_package'];

	if (($x_game == "OSRIC") && ($x_extra > 0))
	{
		$take = "(creator='OSRIC' OR creator='MoM')";
		$bottom_notices = 1;
		$sesvar = "SESSION_MM_OSRIC"; $csesvar = "SESSION_CMM_OSRIC"; 
	}
	else if ($x_game == "OSRIC")
	{
		$take = "creator='OSRIC'";
		$bottom_notices = 1;
		$sesvar = "SESSION_MM_OSRIC"; $csesvar = "SESSION_MM_OSRIC"; 
	}
	else if ($x_game == "Swords & Wizardry")
	{
		$take = "creator='SW'";
		$bottom_notices = 5;
		$x_hit_dice = $_POST['x_hit_dice']+0;
		$sesvar = "SESSION_MM_SW"; $csesvar = "SESSION_CMM_SW"; 
	}
	else if ($x_game == "BFRPG")
	{
		$take = "creator='BFRPG'";
		$bottom_notices = 11;
		$sesvar = "SESSION_MM_BFRPG"; $csesvar = "SESSION_CMM_BFRPG"; 
	}
	else if ($x_game == "BD&D")
	{
		$take = "creator='BX'";
		$bottom_notices = 13;
		$sesvar = "SESSION_MM_BX"; $csesvar = "SESSION_CMM_BX"; 
	}
	else if ($x_game == "Swords & Six-Siders")
	{
		$take = "creator='SX'";
		$bottom_notices = 18;
		$sesvar = "SESSION_MM_SX"; $csesvar = "SESSION_CMM_SX";
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
		$sesvar = "SESSION_MM_ADD"; $csesvar = "SESSION_CMM_ADD"; 
	}
	else if ($x_game == "Labyrinth Lord")
	{
		$aec = $_SESSION["SESSION_ADD_AEC"] = $_POST['aec']+0;
		if ($aec > 0){$take = "(creator LIKE 'AEC%' OR creator LIKE 'LL%')";}
		else {$take = "(creator LIKE 'LL%')";}
		$bottom_notices = 2;
		$sesvar = "SESSION_MM_LL"; $csesvar = "SESSION_CMM_LL"; 
	}
	else if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
	{
		$take = "creator='TT'";
		$bottom_notices = 7;
		$x_extra = $ttlvl; // T&T USES THIS FOR DIFFICULTY LEVEL SINCE THEIR ARE NO MONSTER MANUAL CHOICES
		if ( ( ($tt_dice * 6) + $tt_adds) > 0){} else {$do_not_show_creatures = 1;} // DO NOT DO # APP IF THEY DON'T PICK THESE OPTIONS
		if ($x_game == "Tunnels & Trolls 5th Edition"){ $sesvar = "SESSION_MM_TT5"; $csesvar = "SESSION_CMM_TT5"; }
		else if ($x_game == "Tunnels & Trolls 7th Edition"){ $sesvar = "SESSION_MM_TT7"; $csesvar = "SESSION_CMM_TT7"; }
		else { $sesvar = "SESSION_MM_TTD"; $csesvar = "SESSION_CMM_TTD"; }
	}
	else
	{
		$take = "creator='WIZ'";
		$sesvar = "SESSION_MM_WIZ"; $csesvar = "SESSION_CMM_WIZ"; 
	}

$x_monster_manual = $_SESSION[$sesvar];
$x_custom_monsters = $_SESSION[$csesvar];
$x_mm = $_POST['x_mm'];
	if ($x_mm != 1)
	{
		$x_monster_manual = "";
		$x_custom_monsters = "";
	}
$x_area = stripslashes($_POST['x_area']);
   if ($x_area == ""){$x_area = "Dungeon";}
$x_rigged_chance = $_POST['x_rigged_chance'];
$x_adjust = $_POST['x_adjust'];
$x_low_magic = $_POST['x_low_magic'];
$x_terrain = $_POST['x_terrain'];
$x_outside = $_POST['x_outside'];
$x_describe = $_POST['x_describe'];
	$show_detail_monster_info = $x_describe;
$x_level = $_POST['x_level']+0;
$x_characters = $_POST['x_characters']+0;
$x_furnish = $_POST['x_furnish'];
$x_undead = $_POST['x_undead'];
	if ($x_undead > 0){$haunted = "AND turn>0";}

$tt_dice = $_POST['tt_dice']+0;
$tt_adds = $_POST['tt_adds']+0;

	if (($tt_dice > 0) || ($tt_adds > 0))
	{
		if (($tt_dice > 0) && ($tt_adds > 0)){$x_module = "<br><font size='4'>An Adventure For Groups Totalling " . $tt_dice . " Dice &amp; " . $tt_adds . " Adds</font>";}
		else if ($tt_dice > 0){$x_module = "<br><font size='4'>An Adventure For Groups Totalling " . $tt_dice . " Dice</font>";}
		else {$x_module = "<br><font size='4'>An Adventure For Groups Totalling " . $tt_adds . " Adds</font>";}
	}
	else if ($x_level > 0)
	{
		$x_module = "<br><font size='4'>An Adventure For Level " . $x_level . " Characters</font>";
		if ($x_characters > 0){$x_module = "<br><font size='4'>An Adventure For " . $x_characters . " Level " . $x_level . " Characters</font>";}
	}

$x_c_c = $_POST['x_c_c']; // ENEMY
$x_c_c_min = $_POST['x_c_c_min']; // MIN
$x_c_c_max = $_POST['x_c_c_max']; // MAX
$x_c_c_low = 0 + $_POST['x_c_c_low']; // LOW
	if ($x_c_c_min > $x_c_c_max){$x_c_c_min = $x_c_c_max;}
$x_t_c = $_POST['x_t_c']; // TRAP
$x_t_c_min = $_POST['x_t_c_min']; // MIN
$x_t_c_max = $_POST['x_t_c_max']; // MAX
$x_t_c_low = 0 + $_POST['x_t_c_low']; // LOW
	if ($x_t_c_min > $x_t_c_max){$x_t_c_min = $x_t_c_max;}
$x_l_c = $_POST['x_l_c']; // LOOT
$x_l_c_min = $_POST['x_l_c_min']; // MIN
$x_l_c_max = $_POST['x_l_c_max']; // MAX
$x_l_c_low = 0 + $_POST['x_l_c_low']; // LOW
	if ($x_l_c_min > $x_l_c_max){$x_l_c_min = $x_l_c_max;}

$map_wide = $_POST['map_wide'];
$map_high = $_POST['map_high'];
$map_type = $_POST['map_type'];
$map_numbers = $_POST['map_numbers']-1;
$geomorphic_tiles = $geomorphs;
$map_rooms = $_POST['map_rooms'];
$sep_map = $_POST['x_sep_map'];

if ($map_rooms > 0)
{
	$key = $map_rooms;
	$room_min = $map_numbers;
	$room_max = $key + $room_min;
	$room_start = $map_numbers;
	$room_numb = $key;
}
else
{
	$keyed = 1;

	$cave_dyson = $_POST['cave_dyson'];
		if ($cave_dyson == 1){$search_string = $search_string . "0dyson0|";}
	$cave_risus = $_POST['cave_risus'];
		if ($cave_risus == 1){$search_string = $search_string . "0risus0|";}
	$cave_rorsch = $_POST['cave_rorsch'];
		if ($cave_rorsch == 1){$search_string = $search_string . "0rorschachhamster0|";}
	$cave_stone = $_POST['cave_stone'];
		if ($cave_stone == 1){$search_string = $search_string . "0stonewerks0|";}
	$cave_glenn = $_POST['cave_glenn'];
		if ($cave_glenn == 1){$search_string = $search_string . "0glenn0jupp0|";}
	$cave_stuart = $_POST['cave_stuart'];
		if ($cave_stuart == 1){$search_string = $search_string . "0stuart0|";}
	$cave_zero = $_POST['cave_zero'];
		if ($cave_zero == 1){$search_string = $search_string . "0infinite0zer00|";}

	$search_string = "/" . substr($search_string, 0, -1) . "/";
	$geomorphic_tiles = preg_grep($search_string, $geomorphic_tiles);

	if ($map_type == "cavernous")
	{
		$geomorphic_tiles = preg_grep("/EEEcaveFFF/", $geomorphic_tiles);
	}
	else if ($map_type == "dungeon")
	{
		$geomorphic_tiles = preg_grep("/EEEdungeonFFF/", $geomorphic_tiles);
	}
	else
	{
		$geomorphic_tiles = preg_grep("/EEEcaveFFF|EEEdungeonFFF/", $geomorphic_tiles);
	}

	include_once("functions/geomorphs_draw.php");

	$room_min = $map_numbers;
	$room_max = $key;
	$room_start = $map_numbers;

	if ( $sep_map > 0 )
	{
		$map_code = storeMap($tile_stored_in_db,Dungeon);
		$map_link = "<a target='_blank' href='map_window.php?cd=" . $map_code . "&rm=" . $room_min . "&cl=0&mh=" . $map_high . "&mw=" . $map_wide . "&tp=0'><img src='pics_tools/map.jpg'></a>";
	}
}
	?>

	<hr>
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
	  <tr>
		<td NOWRAP><font size="8"><?php echo $x_area . $x_module; ?></font></td>
		<td NOWRAP align="right"><?php echo $map_link; ?></td>
	  </tr>
	</table>

	<?php

	$table = "creatures" . createRandomCode();

	if (($x_outside > 0) && ($x_terrain != "") && ($x_terrain != "FW") && ($x_terrain != "SW")){$more = $x_terrain;} else {$more = "DG";}
	if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}

	if ((($x_monster_manual != "") || ($x_custom_monsters != "")) && ($x_mm > 0)) //////////////// USING MANUAL OF MONSTERS ///////////////////////////////////////////////////////////////////
	{
		$qry = "CREATE TEMPORARY TABLE $table SELECT * FROM monsters_rpgs WHERE name='xxxxx'";
		wz_query( $connection, $qry ); /*qry*/

		if ($x_monster_manual != "")
		{
			$monster_manual = explode("^", $x_monster_manual);
			$m = 0;

			while ($monster_picks != 1) :

				$monster_check = explode("|", $monster_manual[$m]);
				if ($monster_check[0] > 0)
				{
					$monster_pick_cycle = $monster_check[1];

					while ($monster_pick_cycle > 0) :

						$qryf = "INSERT INTO $table SELECT * FROM monsters_rpgs WHERE id=$monster_check[0]";
						wz_query( $connection, $qryf ); /*qryf*/

						$monster_pick_cycle = $monster_pick_cycle - 1;

					endwhile;
				}
				else {$monster_picks = 1;}
				$m = $m + 1;

			endwhile;
		}
		if ($x_custom_monsters != "")
		{
			$monster_manual = explode("|$|", $_SESSION[$csesvar]);
			$ci = 0;

			while ($ci < 5) :

				$monster_check = explode("|^|", $monster_manual[$ci]);

				if ($monster_check[1] != "")
				{
					$monster_pick_cycle = $monster_check[1];

					while ($monster_pick_cycle > 0) :

						$qryf = "INSERT INTO $table (name, description) VALUES ('ENCOUNTER', '$monster_check[0]')";
						wz_query( $connection, $qryf ); /*qryf*/

						$monster_pick_cycle = $monster_pick_cycle - 1;

					endwhile;
				}
				$ci = $ci + 1;

			endwhile;
		}
	}
	else ////////////////////////////////////////////////////////////////////// LET THE SYSTEM PICK //////////////////////////////////////////////////////////////////////////
	{
		$qry = "CREATE TEMPORARY TABLE $table SELECT * FROM monsters_rpgs WHERE $take AND location LIKE '%DG%' $haunted AND difficulty<=$f_level AND m_no_dungeon!=1";
		wz_query( $connection, $qry ); /*qry*/

		if ($more != "DG")
		{
			$qrys2 = "INSERT INTO $table SELECT * FROM monsters_rpgs WHERE $take AND location LIKE '%$more%' AND difficulty<=$f_level AND m_no_dungeon!=1";
			wz_query( $connection, $qrys2 ); /*qrys2*/
		}

		while ($stop_processing != 1) :
			$qry = "SELECT * FROM $table WHERE freq_code=2";
			$res = wz_query( $connection, $qry ); /*qry*/
			$num = wz_num_rows($res);
				wz_query($connection, "INSERT INTO $table SELECT * FROM $table WHERE freq_code=2");
				wz_query($connection, "UPDATE $table SET freq_code=(freq_code-1)");
			if ($num < 1){$stop_processing = 1;}
		endwhile;
	}

while ($room_numb > 0) :

	$room_start++;
	$room_numb = $room_numb - 1;

	$is_a_cave = "-" . $room_start . "-";
	if (strpos($has_a_cave, $is_a_cave) !== FALSE){ $skip_contents = 1; $skip_weirds = 1; } else { $skip_contents = 0; $skip_weirds = 0; }

	////////////////////////////////////// ATMOSPHERE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$feeling = "";
	$decoration = "";
	$furniture = "";

	if ($x_atmo > mt_rand(1,100)){$mood = mt_rand(1,49);} else {$mood = mt_rand(50,100);}

	if ($mood < 50)
	{
		switch (mt_rand(0,4))
		{
			case 0:	$feeling = "The area seems normal for this type of place";						break;
			case 1:	$feeling = "The area appears similar to the rest of the place";					break;
			case 2:	$feeling = "The area looks average compared with other sections of this place";	break;
			case 3:	$feeling = "The area is pretty ordinary at first glance";				break;
			case 4:	$feeling = "The area seems plain when you first look upon it";					break;
		}
	}
	else if ($mood < 75){$feeling = "The area " . smellMakerRoom();} 
	else if ($mood < 85){$feeling = "The area " . smellMakerRoom() . " and " . airMakerRoom();} 
	else if ($mood < 95){$feeling = "The area " . airMakerRoom();} 
	else {$feeling = "The area has " . fogMakerRoom();} 

	if ($x_atmo == 999){$feeling = "";} else if (mt_rand(1,100) > 90){$feeling = $feeling . ". You can make out " . soundWhereRoom() . " " . soundMakerRoom() . " sound coming from somewhere";}

	////////////////////////////////////// FURNISH //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if ($x_furnish > 0 && $skip_contents == 0){ $furniture = furnishRoom($x_game,$x_cut,$x_level); }
	if ( $skip_contents == 1 ){ $caved = caveDescription(); } else { $caved = ""; } 

	if ($x_atmo == 999){ echo "</font><hr color='#C0C0C0' size='8'><b>" . $room_start . "</b><font size='2'> - " . $furniture[0] . $caved; }
	else { echo "</font><hr color='#C0C0C0' size='8'><b>" . $room_start . "</b><font size='2'> - " . $feeling . ". " . $furniture[0] . $caved; }

	if ($skip_contents == 1 && mt_rand(1,100) > 60) // IS THERE STUFF ON THE FLOOR OF THE CAVE
	{
		$fill_cave_floor = mt_rand(1,7);
		echo " On the floor there is [";
		while ($fill_cave_floor > 0) :
			$fill_cave_floor = $fill_cave_floor - 1;
			echo fantasyGroundItem($x_game);
			if ( $fill_cave_floor > 0 ){ echo ", "; } else { echo "]"; }
		endwhile;
	}
	else if ($furniture[2] != "" && $skip_contents == 0) // IS THERE ODDBALL STUFF IN/ON THE FURNITURE
	{
		$fill_shelf = explode("#", $furniture[2]);
		$fill_shelf_n = count($fill_shelf);
		$fs = 0;

		while ($fill_shelf_n  > 0) :

			$fill_shelf_n  = $fill_shelf_n  - 1;

			$fill_shelving = explode("|", $fill_shelf[$fs]);

			if (mt_rand(1,100) > 60)
			{
				if ($fill_shelving[1] == 1){ echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . armorRack($x_game,1) . "."; }
				else if ($fill_shelving[1] == 2){ echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . weaponRack($x_game,1) . "."; }
				else if ($fill_shelving[1] == 3){ echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . fantasyShelfItem($x_game,$x_cut,5) . "."; }
				else if ($fill_shelving[1] == 4){ echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . foodFiller(10,1) . "."; }
				else if ($fill_shelving[1] == 5){ echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . closetFiller(0,10,1,$x_game,1) . "."; }
				else if ($fill_shelving[1] == 6){ echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . fantasyShelfItem($x_game,$x_cut,10) . "."; }
				else if ($fill_shelving[1] == 7){ echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . fantasyShelfItem($x_game,$x_cut,5) . "."; }
				else if ($fill_shelving[1] == 8){ echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . fantasyShelfItem($x_game,$x_cut,2) . "."; }
				else if ($fill_shelving[1] == 9)
				{
					if (mt_rand(1,4) == 1){ echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . libraryFiller(mt_rand(2,7),$x_game,$x_cut) . "."; }
					else { echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . fantasyShelfItem($x_game,$x_cut,2) . "."; }
				}
				else if ($fill_shelving[1] == 10){ echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . fantasyShelfItem($x_game,$x_cut,1) . "."; }
				else if ($fill_shelving[1] == 11){ echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . fantasyShelfItem($x_game,$x_cut,3) . "."; }
				else if ($fill_shelving[1] == 12){ echo "<br>" . ucfirst($fill_shelving[0]) . " is..." . fantasyShelfItem($x_game,$x_cut,6) . "."; }
			}
			$fs = $fs + 1;

		endwhile;
	}

	////////////////////////////////////// SPECIAL ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if ($x_weird >= mt_rand(1,100) && $skip_weirds == 0)
	{
		echo "<hr align='center' size='1'>";
		echo "<b>SOMETHING UNUSUAL IN THE AREA...</b><br>";
		echo specialMakerRoom($x_cut,$room_min,$room_max,$x_game,$x_extra);
	}

	////////////////////////////////////// MONSTERS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$roll_for_enemy = $x_c_c;
	$max_of_monsters = $x_c_c_max;
	$min_of_monsters = $x_c_c_min;
	$cmd_villain = "WHERE id>0";
	$do_enemy_1 = 1;
	$do_enemy_2 = 1;
	$level_of_monster = 0;
	$how_many_monsters = 0;

	if (mt_rand(1,100) <= $x_c_c)
	{
		$roll_for_enemy = 100;

		// DETERMINE HOW MANY MONSTERS ARE IN THE ROOM //
		while ($max_of_monsters > 0) :
			$min_of_monsters = $min_of_monsters - 1;
				if ($min_of_monsters > 0){$roll_for_enemy = 100;}
				else if ($min_of_monsters == 0){$roll_for_enemy = $x_c_c - ceil($x_c_c*(0.01*$x_c_c_low));}
				else {$roll_for_enemy = $roll_for_enemy - ceil($x_c_c*(0.01*$x_c_c_low));}
			$max_of_monsters = $max_of_monsters - 1;
			if (mt_rand(1,100) <= $roll_for_enemy){ $how_many_monsters = $how_many_monsters + 1; }
	    endwhile;

		if ($how_many_monsters < 1){$how_many_monsters = 1;}

		if ($how_many_monsters > 0){echo "<hr align='center' size='1'>";}

		while ($how_many_monsters > 0) :

			$how_many_monsters = $how_many_monsters - 1;

			$qry = "SELECT * FROM $table ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
			$res = wz_query( $connection, $qry ); /*qry*/
			$ary = wz_fetch_assoc($res);

			if ($ary[name] != "ENCOUNTER")
			{
				$show_detail_monster_info = 1;
				if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ if ($do_not_show_creatures == 1){$skip_the_num_appearing = 1;} $show_detail_monster_info = $x_describe; include("functions/stat_blocks.php"); $skip_the_num_appearing = 0;}
				else { $show_detail_monster_info = $x_describe;  include("functions/stat_blocks.php"); }

				echo $monster_info . "<br>";

				if ($do_not_show_creatures != 1)
				{
					if ($x_hit_dice == 0){$x_hit_dice = $tt_dice;}
					echo calculateLife($x_level,$x_characters,$ary[m_app_min],$ary[m_app_max],$ary[m_hp_min],$ary[m_hp_max],$ary[m_hp_mod],$x_game,$my_mr_is,$x_hit_dice,$tt_adds,$tt_vary,$how_many_monsters) . "<br>";
				}

				$cmd_villain = $cmd_villain . " AND id!= " . $ary[id];

				if ($ary[difficulty] > $level_of_monster){$level_of_monster = $ary[difficulty];}
				if ($x_rich > 0)
				{
					if ($ary[m_hoard] == 3){$xx_hord = 50;} else if ($ary[m_hoard] == 2){$xx_hord = 90;} else if ($ary[m_hoard] == 1){$xx_hord = 70;}
					if (($ary[m_hoard] > 0) && ($x_l_c > 0)){$level_of_monster = $xx_hord + $x_l_c;}
				}
			}
			else
			{
				echo "ENCOUNTER:&nbsp;" . $ary[description] . "<br>";
			}

	    endwhile;
	}

	////////////////////////////////////// TRAPS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$roll_for_trap = $x_t_c;
	$max_of_traps = $x_t_c_max;
	$min_of_traps = $x_t_c_min;

	if (mt_rand(1,100) <= $x_t_c)
	{
		$roll_for_trap = 100;

		echo "<hr align='center' size='1'>";

	    while ($max_of_traps > 0) :
		$this_trap = trapMaker($x_level,room,$x_game,$x_extra,$x_undead);
		if (mt_rand(1,100) <= $roll_for_trap){ echo $this_trap[0] . "<br>"; }
		$min_of_traps = $min_of_traps - 1;
			if ($min_of_traps > 0){$roll_for_trap = 100;}
			else if ($min_of_traps == 0){$roll_for_trap = $x_t_c - ceil($x_t_c*(0.01*$x_t_c_low));}
			else {$roll_for_trap = $roll_for_trap - ceil($x_t_c*(0.01*$x_t_c_low));}

			$max_of_traps = $max_of_traps - 1;

			if ($this_trap[1] > $level_of_monster){$level_of_monster = $this_trap[1];}
	    endwhile;
	}

	////////////////////////////////////// TREASURE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$hiding_places = "";

	if ($furniture[1] != "") // WHERE TO HIDE TREASURE
	{
		$fill_shelf = explode("#", $furniture[1]);
		$fill_shelf_n = count($fill_shelf);
		$fs = 0;

		while ($fill_shelf_n  > 0) :

			$fill_shelf_n  = $fill_shelf_n  - 1;
			$fill_shelving = explode("|", $fill_shelf[$fs]);
			if ($fill_shelving[0] != ""){$hiding_places = $hiding_places . "^" . $fill_shelving[0] . "_" . $fill_shelving[1];}
			$fs = $fs + 1;

		endwhile;

		$hiding_places = substr($hiding_places, 1);
	}

	$hiding_spots = explode("^", $hiding_places);
	$hiding_length = strlen($hiding_places);
	$hiding = count($hiding_spots);
	$hide_it = 0;
	$sayit = 0;
	$bags_of_coins = 0;
	$sack_of_coins = 0;

	if (mt_rand(1,100) > 70){$tbox = "lying about...and";} else {$tbox = "in a " . boxMakerRoom() . " that";}

	$treasure_chest = "<b>THESE SPECIAL ITEMS ARE LOCATED:</b> " . $tbox . " " . lootHider() . ".<br>";

	if ($level_of_monster > 0){$treasure_level = $level_of_monster;} else if ($x_level > 0){$treasure_level = $x_level;} else {$treasure_level = mt_rand(1,20);}

	if ($x_rigged_chance >= mt_rand(1,100))
	{
		$picked_trap = trapMaker($treasure_level,box,$x_game,$x_extra,$x_undead);
		$treasure_chest = substr($treasure_chest, 0, -5) . ".<br><b>TRAPPED:</b>&nbsp;" . $picked_trap[0] . "<br>";
	}

	if ($level_of_monster > 0){$loot_adjust = $treasure_level * $x_adjust;} else {$loot_adjust = 0;}
	$roll_for_loot = $x_l_c + $loot_adjust;
	$dice_for_loot = $x_l_c + $loot_adjust;
	$max_of_loots = $x_l_c_max;
	$min_of_loots = $x_l_c_min;

	if (mt_rand(1,100) <= $roll_for_loot)
	{
		$roll_for_loot = 100;

		echo "<hr align='center' size='1'>";

		while ($max_of_loots > 0) :

		$loot_size = 3;

		$chesty = explode("_", $hiding_spots[$hide_it]);

		if (($hide_it < $hiding) && ($hiding_length > 3))
		{
			if ($hide_it == 0){echo "<b>THESE SPECIAL ITEMS ARE LOCATED IN VARIOUS SPOTS...</b><br>";}
			if ((mt_rand(1,100) > 50) && ($hide_it > 0)){$chest = $secret_box; $loot_size = $secret_size;}
			else
			{
				if ($chesty[1] > 0)
				{
					if ($x_rigged_chance >= mt_rand(1,100))
					{
						$picked_trap = trapMaker($treasure_level,item,$x_game,$x_extra,$x_undead);
						$trap_zap = "-&nbsp;TRAPPED:&nbsp;" . $picked_trap[0];
					}
					else
					{
						$trap_zap = "";
					}
					$chest = "&nbsp;(<i> Located " . $chesty[0] . " &nbsp;" . $trap_zap . "</i>)";
					$secret_box = $chest;
					$loot_size = $chesty[1];
					$secret_size = $chesty[1];
				}
			}
			if (mt_rand(1,100) <= $roll_for_loot){
				if ($bags_of_coins > 0){$ghrz = 91;} else {$ghrz = 1;}
				$my_reward = mt_rand($ghrz,100);
				if ($my_reward < 91)
				{
					$my_prize = currencyBuilder($treasure_level,$loot_size,0,$x_cut,1,$x_game);

					if (mt_rand(1,$rarecash) == 1)
					{
						$other_coins = mt_rand(1,3);
						$other_coin = "";

						while ($other_coins > 0) :

							$other_coin = $other_coin . otherThanCoins($loot_size,$x_cut,$x_game,$other_coins,$treasure_level) . "&nbsp;...and...<br>";
							$other_coins = $other_coins - 1;

						endwhile;

						$my_prize = substr($other_coin, 0, -19);
					}
					$bags_of_coins = 1;
				}
				else if ($my_reward < 96){$my_prize = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator($x_cut));}
				else if ($my_reward < 98){$my_prize = "JEWELRY:&nbsp;" . ucwords(jewelCreator($x_cut));}
				else if ($x_low_magic >= mt_rand(1,100))
				{
					if ($x_whichmagic >= mt_rand(1,100))
					{
						$my_prize = makeRPGmagic($x_game,0);
					}
					else
					{
						$my_prize = makeMagicItem($treasure_level,$loot_size,0,$x_game,$x_extra,$x_cut);
					}
					$my_list_of_wonders = $my_prize . "^" . $room_start . "___" . $my_list_of_wonders;
				}
				else { $my_prize = makeNiceItem($loot_size,$x_cut,$x_game); }
				echo $my_prize . " " . $chest . "<br>";
			}
			$hide_it = $hide_it + 1;
		}
		else
		{
			if (mt_rand(1,100) <= $roll_for_loot)
			{
				if ($sayit != 1){if ($hide_it > 0){echo "<hr align='center' size='1'>";} echo $treasure_chest; $sayit = 1;}	
				if ($sack_of_coins > 0){$ghrz = 91;} else {$ghrz = 1;}
				$my_reward = mt_rand($ghrz,100);
				if ($my_reward < 91)
				{
					$my_prize = currencyBuilder($treasure_level,$loot_size,1,$x_cut,1,$x_game);

					if (mt_rand(1,$rarecash) == 1)
					{
						$other_coins = mt_rand(1,3);
						$other_coin = "";

						while ($other_coins > 0) :

							$other_coin = $other_coin . otherThanCoins($loot_size,$x_cut,$x_game,$other_coins,$treasure_level) . "&nbsp;...and...<br>";
							$other_coins = $other_coins - 1;

						endwhile;

						$my_prize = substr($other_coin, 0, -19);
					}
					$sack_of_coins = 1;
				}
				else if ($my_reward < 96){$my_prize = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator($x_cut));}
				else if ($my_reward < 98){$my_prize = "JEWELRY:&nbsp;" . ucwords(jewelCreator($x_cut));}
				else if ($x_low_magic >= mt_rand(1,100))
				{
					if ($x_whichmagic >= mt_rand(1,100))
					{
						$my_prize = makeRPGmagic($x_game,0);
					}
					else
					{
						$my_prize = makeMagicItem($treasure_level,$loot_size,0,$x_game,$x_extra,$x_cut);
					}
					$my_list_of_wonders = $my_prize . "^" . $room_start . "___" . $my_list_of_wonders;
				}
				else { $my_prize = makeNiceItem($loot_size,$x_cut,$x_game); }
				echo $my_prize . "<br>";
			}
		}

		$min_of_loots = $min_of_loots - 1;
			if ($min_of_loots > 0){$roll_for_loot = 100;}
			else if ($min_of_loots == 0){$roll_for_loot = $dice_for_loot - ceil($dice_for_loot*(0.01*$x_l_c_low));}
			else {$roll_for_loot = $roll_for_loot - ceil($dice_for_loot*(0.01*$x_l_c_low));}
		$max_of_loots = $max_of_loots - 1;
		endwhile;
	}



endwhile;


	//////////////////////////////////////////////////////////////////////////////////////////////////////////

	if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){$enc_numbers = 11; $enc_dice = "2d6"; $counts_enct = 1; $counts_onct=1;} else {$enc_numbers = 12; $enc_dice = "1d12";}
		$make_enc = $enc_numbers;

	if ((($x_monster_manual != "") || ($x_custom_monsters != "")) && ($x_mm > 0)){} else { $freqned = "AND freq_code>1 AND m_myname=''"; }

	$qry = "CREATE TEMPORARY TABLE enc_tab_use SELECT DISTINCT * FROM $table WHERE (id>0 OR name!='') $freqned ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $enc_numbers";
	wz_query( $connection, $qry ); /*qry*/

		echo "<hr color='#C0C0C0' size='8'><b>RANDOM ENCOUNTERS IN THIS DUNGEON...</b>";
		echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
		echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;&nbsp;" . $enc_dice . "&nbsp;&nbsp;&nbsp;&nbsp;</font></td>";
		echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>DUNGEON ENCOUNTER</font></td></tr>";

		while ($make_enc > 0) :

			$qry = "SELECT * FROM enc_tab_use ORDER BY name";
			$res = wz_query( $connection, $qry ); /*qry*/

			while ($ary=wz_fetch_assoc($res)) :

				if ($ary[name] != "ENCOUNTER")
				{
					$show_detail_monster_info = $x_describe; 
					include("functions/stat_blocks.php");
				}
				else
				{
					$monster_info = $ary[description];
				}

				if ($make_enc > 0)
				{
					$counts_enct = $counts_enct + 1;
					echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_enct . "</font></td>";
					echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $monster_info . "</font></td></tr>";
				}
				$make_enc = $make_enc - 1;

			endwhile;

		endwhile;

		echo "</table>";

//////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($x_terrain != "")
{
	if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){$enc_num = 11;} else {$enc_num = 12;}

		echo "<hr color='#C0C0C0' size='8'><b>RANDOM ENCOUNTERS OUTDOORS...</b>";
		echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
		echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;&nbsp;" . $enc_dice . "&nbsp;&nbsp;&nbsp;&nbsp;</font></td>";
		echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>OUTDOOR ENCOUNTER</font></td></tr>";

		$make_enc = $enc_num;

		while ($make_enc > 0) :

			$qry = "SELECT * FROM monsters_rpgs WHERE $take AND location LIKE '%$x_terrain%' $freqned AND m_myname='' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $enc_num";
			$res = wz_query( $connection, $qry ); /*qry*/

			while ($ary=wz_fetch_assoc($res)) :

				$show_detail_monster_info = $x_describe; 
				include("functions/stat_blocks.php");
				if ($make_enc > 0)
				{
					$counts_onct = $counts_onct + 1;
					echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_onct . "</font></td>";
					echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $monster_info . "</font></td></tr>";
				}
				$make_enc = $make_enc - 1;

			endwhile;

		endwhile;

		echo "</table>";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	$my_list_of_wonders = substr($my_list_of_wonders, 0, -3);
	$my_list_of_wonders = str_replace("<u>", "", $my_list_of_wonders);
	$my_list_of_wonders = str_replace("</u>", "", $my_list_of_wonders);
	$all_my_wonders = explode("___", $my_list_of_wonders);
	sort($all_my_wonders);
	$count_wonders = count($all_my_wonders);

	if (strlen($my_list_of_wonders) > 5)
	{
		echo "<hr color='#C0C0C0' size='8'><b>MAGIC ITEMS FOUND IN THIS DUNGEON...</b>";
		$counts_wonder = 0;
		echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
		echo "<tr><td width='50' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;ITEM&nbsp;</font></td>";
		echo "<td align='center' width='50' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;ROOM&nbsp;</font></td>";
		echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>DESCRIPTION</font></td></tr>";

	while ($count_wonders > 0) :
		$wonderful = $all_my_wonders[$counts_wonder];
		$wonder = explode("^", $wonderful);
		$counts_wonder = $counts_wonder + 1;
		echo "<tr><td width='50' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_wonder . "</font></td>";
		echo "<td width='50' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $wonder[1] . "</font></td>";
		echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $wonder[0] . "</font></td></tr>";
		$count_wonders = $count_wonders - 1;
	endwhile;

		echo "</table>";

	}

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>