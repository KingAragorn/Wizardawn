<?php

include("db.php");

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
	else if ($x_game == "AD&D")
	{
		$source = "There are all the creatures from Advanced Dungeons & Dragons here.";
		$boxset = "Advanced Dungeons & Dragons";
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
	else if ($x_game == "Swords & Six-Siders")
	{
		$source = "There are almost 500 creatures used here.";
		$boxset = "Swords & Six-Siders";
		$lifes = "hit points";
	}
	else if ($x_game == "BD&D")
	{
		$source = "There are all the creatures from Basic Dungeons & Dragons here.";
		$boxset = "Basic Dungeons & Dragons";
		$lifes = "hit points";
	}
	else if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
	{
		$source = "There are almost 500 creatures from the Magestykc supplement for Tunnels &amp; Trolls.";
		$boxset = "Tunnels &amp; Trolls";
		$lifes = "appropriate monsters";
	}
	else if ($x_game == "Mutant Future")
	{
		$cash = "gold";
		$lifes = "hit points";
		$pagame = 1;
		$rowpic = 6;
		$source = "There are all the creatures from Mutant Future&trade; here.";
		$boxset = "Mutant Future&trade;";
		$lifes = "hit points";
	}
	else if ($x_game == "Broken Urthe")
	{
		$hdc = 8;
		$cash = "xormite";
		$lifes = "life points";
		$hdu = "Life";
		$pagame = 1;
		$rowpic = 8;
		$source = "There are all the creatures from Broken Urthe&trade; here.";
		$boxset = "Broken Urthe&trade;";
		$lifes = "stamina";
	}
	else if ($x_game == "Gamma World")
	{
		$hdc = 6;
		$cash = "domars";
		$pagame = 1;
		$rowpic = 8;
		$source = "There are creatures and robots from the Broken Urthe&trade; role-playing game...converted to be compatible with Gamma World.";
		$boxset = "Gamma World";
		$lifes = "hit points";
	}
	else
	{
		$source = "There are about 500 creatures from lore, myth, and legend.";
		$boxset = "fantasy";
		$lifes = "life points";
	}

	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' action='" . $my_form_name . "'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>World Adventure</p>";

	echo "</form><form style='height: 1px;' style='margin-bottom:0; margin-top:0;' target='_blank' method='POST' action='" . $my_form_name . "?run=1'>";
	echo "<input style='height: 1px;' type='hidden' name='program_user' value='1'>";
	echo "<input style='height: 1px;' type='hidden' value='" . $x_game . "' name='x_package'>";

	echo "<p style='text-align: justify;'>";
	?>
		This will create a totally unique adventure for an area of your world (providing some information for a single hex on your world hex map). <?php echo $source; ?>  
	<?php if ($pagame == 1){?>
		There are various traps and room decorations to make any bases, buildings, and caves...dangerous places.  
		This should help you quickly create a world adventure for your <?php echo $boxset; ?> role-playing game.  
		The various bases, buildings, and caves maps are based off of geomorphs created by...<br>

		<div id="div_tabex">
			<div class="row">
				<span class="cell">- <a target="_blank" href="http://rpgcharacters.wordpress.com/">Dyson Logos</a></span>
				<span class="cell">- <a target="_blank" href="http://shashnia.blogspot.com/">Infinite Zer0</a></span>
				<span class="cell">- <a target="_blank" href="http://stonewerks.wordpress.com/">Stonewerks</font></a></span>
				<span class="cell">- <a target="_blank" href="http://rorschachhamster.wordpress.com/">Rorschachhamster</a></span>
			</div>
			<div class="row">
				<span class="cell">- <a target="_blank" href="http://www.risusmonkey.com/">Risus Monkey</a></span>
				<span class="cell">- <a target="_blank" href="http://aeonsnaugauries.blogspot.com/">J.D. Jarvis</a></span>
				<span class="cell">- Amanda Michaels</span>
				<span class="cell">- Wizardawn</span>
			</div>
		</div>
	<?php } else { ?>
		There are various traps and room decorations to make any dungeons, temples, castles, and tombs...dangerous places.  
		It will also create a very unique set of magic items &quot;just&quot; for your adventure.  
		This should help you quickly create a world adventure for your <?php echo $boxset; ?> role-playing game.  
		The various dungeon, cave, and fort maps are based off of geomorphs created by...<br>

		<div id="div_tabex">
			<div class="row">
				<span class="cell">- <a target="_blank" href="http://rpgcharacters.wordpress.com/">Dyson Logos</a></span>
				<span class="cell">- <a target="_blank" href="http://shashnia.blogspot.com/">Infinite Zer0</a></span>
				<span class="cell">- <a target="_blank" href="http://stonewerks.wordpress.com/">Stonewerks</a></span>
				<span class="cell">- <a target="_blank" href="http://rorschachhamster.wordpress.com/">Rorschachhamster</a></span>
			</div>
			<div class="row">
				<span class="cell">- <a target="_blank" href="http://www.risusmonkey.com/">Risus Monkey</a></span>
				<span class="cell">- <a target="_blank" href="http://seekingwing.blogspot.com/">Glenn Jupp</a></span>
				<span class="cell">- <a target="_blank" href="http://strangemagic.robertsongames.com/">Stuart Robertson</a></span>
				<span class="cell">&nbsp;</span>
			</div>
		</div>
	<?php } ?>

		<br>
		<div id="div_table">
			<div class="row">
				<span class="cell">Name:</span>
				<span class="cell"><input type="text" id="InputOption" name="x_area" size="30"></span>
			</div>
<?php if ($pagame == 1){?>
			<div class="row">
				<span class="cell">Currency:</span>
				<span class="cell"><input type="text" value="<?php echo $cash; ?>" id="InputOption" name="x_money" size="10"></span>
			</div>
<?php } ?>
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
<?php if ($x_game == "Broken Urthe"){ ?>
			<div class="row">
				<span class="cell"><?php echo $hdu; ?> Dice:</span>
				<span class="cell"><input type="text" value="1" id="InputOption" name="x_might1" size="3" style="text-align: center"> d <input type="text" id="InputOption" name="x_might2" value="<?php echo $hdc; ?>" size="3" style="text-align: center"></span>
			</div>
<?php } if (($x_game == "Broken Urthe") || ($x_game == "Gamma World")) { ?>
			<div class="row">
				<span class="cell">Mutants Only:</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_mutants" value="1"></span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell">Outside Terrain:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_terrain">
					<option value="100">Desert</option>
					<option value="101">Forest</option>
					<option value="102">Hills</option>
					<option value="103">Jungle</option>
					<option value="110">Lake</option>
					<option value="104">Mountains</option>
					<option value="105">Plains</option>
					<option value="106">Sea</option>
					<option value="107">Snow</option>
					<option value="108">Swamp</option>
					<option value="109">Tropics</option>
					<option value="112">Underworld</option>
				<?php if ($pagame == 1){?>
					<option value="111">Wasteland</option>
				<?php } ?>
				</select>&nbsp;&nbsp;<input type="checkbox" id="InputOption" name="color" value="1"> Color Map</span>
			</div>
<?php if ($x_game == "OSRIC"){ ?>
			<div class="row">
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="x_extra" value="1">&nbsp;&nbsp;Include material from Monster of Myth</span>
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
				<span class="cell">&nbsp;</span>
				<span class="cell"><input type="checkbox" id="InputOption" name="aec" value="1">&nbsp;&nbsp;Include AEC</span>
			</div>
<?php } ?>
		<?php if ($x_game == "Swords & Six-Siders" || $x_game == "BD&D"){?>
			<div class="row">
				<span class="cell">Show Descriptions:</span>
				<span class="cell"><input type="checkbox" id="InputOption" checked name="x_describe" value="1"></span>
			</div>
		<?php } ?>
<?php if ($x_game == "Swords & Wizardry"){ ?>
			<div class="row">
				<span class="cell">Hit Dice:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_hit_dice"><option value="6">1d6</option><option value="8" selected>1d8</option></select></span>
			</div>
<?php } ?>
		</div>

		<p style='text-align: justify;'>The settings below only apply to areas that can be explored within the hex area (<?php if ($pagame == 1){echo "buildings";} else {echo "dungeons";} ?>, caves. etc.).</p>

		<div id="div_table">
			<div class="row">
				<span class="cell">Atmosphere:</span>
				<span class="cell"><select size="1" id="DropOption" name="atmo"><option value="999">No Atmosphere</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %&nbsp;chance of ordinary atmosphere</span>
			</div>
<?php if ($pagame != 1) { ?>
			<div class="row">
				<span class="cell">Furnish Rooms:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_furnish"><option value="1">Yes</option><option value="0">No</option></select></span>
			</div>
<?php } ?>
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
<?php if ($pagame == 1) { ?>
			<div class="row">
				<span class="cell">Contents:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_tu_c"><option>10</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %
				&nbsp;&nbsp;&nbsp;Min <select size="1" id="DropOption" name="x_u_c_min"><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Max <select size="1" id="DropOption" name="x_u_c_max"><?php $runner=5; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				&nbsp;&nbsp;&nbsp;Low <select size="1" id="DropOption" name="x_u_c_low"><option>0</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
				</span>
				</div>
			</tr>
<?php } ?>
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
<?php if ( ($x_game == "OSRIC") || ($x_game == "Swords & Six-Siders") || ($x_game == "AD&D") || ($x_game == "BFRPG") || ($x_game == "AD&D") || ($x_game == "BD&D") || ($x_game == "Labyrinth Lord") || ($x_game == "Swords & Wizardry") ){ ?>
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
<?php if ($pagame == 1){?>
			<div class="row">
				<span class="cell">Tech Items:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_low_tech"><option>100</option><?php $runner=101; $running=-1; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Cash Amount:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_cut"><option>100</option><?php $runner=1000; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Stranded Robots:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_frob"><option>2</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
			<div class="row">
				<span class="cell">Stranded Vehicles:</span>
				<span class="cell"><select size="1" id="DropOption" name="x_fveh"><option>2</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select> %</span>
			</div>
<?php } else { ?>
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
<?php } ?>
		</div>

		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create"><br><br>

		<div id="div_table">
<?php if ($pagame == 1){?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Before you begin, you should have your own world map...or you can create one <a href="tool_world.php">HERE</a>. Whatever map you use, it should have the areas marked with your towns, cities, and major areas of interest (ruined cities, main villain bases, etc).</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If you need to make a larger area, <a href="tool_uruins.php">THIS</a> may help you. If you need to create the details of a city or village, you might find help <a href="tool_mtown.php">HERE</a>.</span>
			</div>
<?php } else { ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Before you begin, you should have your own world map...or you can create one <a href="tool_world.php">HERE</a>. Whatever map you use, it should have the areas marked with your towns, cities, and major areas of interest (mega-dungeons, main villain lairs, etc).</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If you need to make a larger dungeon area, <a href="tool_ultimate.php">THIS</a> may help you. If you need to create the details of a city or village, you might find help <a href="tool_ftown.php">HERE</a>.</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">This tool assumes you have a hex map of the world, where this tool will only flesh out a single hex at a time. Also this tool is meant to be used with hexes that have no landmark indicated on the world map (meaning hexes with cities, villges, or main locations of interest).</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose a NAME for this section of land you are creating.*</span>
			</div>
<?php if ($pagame == 1){?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose a CURRENCY that your world uses (quarters, bottle caps, dollars, gold, etc).*</span>
			</div>
<?php } ?>
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
				<span class="cxll">Choose a LEVEL for your area.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose how many CHARACTERS and followers are going to traverse this area. Choosing this option will better calculate some <?php echo $lifes; ?> for encounters but requires to have the LEVEL set to do it.*</span>
			</div>
<?php } ?>
<?php if ($x_game == "Swords & Six-Siders" || $x_game == "BD&D"){?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If you have selected SHOW DESCRIPTIONS, monsters may have detailed notes that will display with the rest of their information.*</span>
			</div>
<?php } ?>
<?php if ($x_game == "Broken Urthe"){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Choose the dice you use to determine health or stamina for enemies in your game system.  Default is 1d<?php echo $hdc; ?>.*</span>
			</div>
<?php } if (($x_game == "Broken Urthe") || ($x_game == "Gamma World")) { ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Checking the MUTANTS ONLY box will give the mutation information for normal creatures, including the mutant name for the creature.*</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Select a TERRAIN that the area is in.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Decide if you want the hex map in color or black &amp; white.*</span>
			</div>
<?php if ($x_game == "Swords & Wizardry"){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Decide on the hit dice you want for the encounters, either 1d6 or 1d8.</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Then enter your % chance for having an atmosphere in an area that is ordinary. You can also decide to have no atmosphere listed for the areas.</span>
			</div>
<?php if ($pagame != 1) { ?>
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
<?php } else { ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Then enter your % chances for areas to have ENCOUNTERS, TRAPS, CONTENTS, and LOOT appear.</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Select a MINimum and MAXimum amount of ENCOUNTERS, TRAPS, CONTENTS, and LOOT that may appear.</span>
			</div>
<?php } ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Select a LOW ratio for your MIN and MAX values. This allows you to fine tune how often a MAX value occurs. The higher your LOW value, the less often the MAX value will be achieved.</span>
			</div>
<?php if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">For WEAPONS/ARMOR, you can choose whether to use the Tunnels &amp; Trolls&trade; weapons and armor...or the Magestykc&trade; simple armor and weapons.</span>
			</div>
<?php } ?>
<?php if ( ($x_game == "OSRIC") || ($x_game == "Swords & Six-Siders") || ($x_game == "AD&D") || ($x_game == "BFRPG") || ($x_game == "BD&D") || ($x_game == "Labyrinth Lord") || ($x_game == "Swords & Wizardry") ){ ?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">For MAGIC ITEMS, you can choose to use <?php echo $x_game; ?>&trade; magic items...or Wizardawn magic items.</span>
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
<?php if ($pagame == 1){?>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Do you notice too much cash for a 3 character group? Maybe the characters are getting a little too rich. Then you can set the CASH AMOUNT to a lower percentage of cash that appear in the loot.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">Do you want the more advanced items rare? Then you can set the TECH ITEMS to a lower percentage that appear in the loot.*</span>
			</div>
			<div class="row">
				<span class="cell"><?php $lnum = $lnum + 1; echo $lnum; ?>.</span>
				<span class="cxll">If you want characters to maybe find a stranded robot or vehicle, set that % chance for each.*</span>
			</div>
<?php } else { ?>
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
<?php } ?>
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

$this_app_is = "Hex Crawl";

$ttlvl = $_POST['x_ttlvl'];
$tt_adds = $_POST['tt_adds']+0;
$tt_vary = $_POST['tt_vary'];
$x_extra = $_POST['x_extra'];
$x_hit_dice = $_POST['x_hit_dice']+0;
$x_whichmagic = $_POST['x_whichmagic'];
$x_level = $_POST['x_level']+0;
$x_characters = $_POST['x_characters']+0;
$x_describe = $_POST['x_describe'];
	$show_detail_monster_info = $x_describe;
$x_weird = $_POST['x_weird'];
$x_cut = $_POST['x_cut'];
$x_rich = $_POST['x_rich'];
$x_furnish = $_POST['x_furnish'];
$x_atmo = $_POST['x_atmo'];

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

$x_oldway = $_POST['x_oldway']; // USED FOR T&T CLASSIC WEAPONS/ARMOR...OR THE SIMPLE WEAPONS/ARMOR
	if ($x_oldway == 1){ $_SESSION['tt_easy_items'] = 1; } else { unset($_SESSION['tt_easy_items']); }

$x_game = $_POST['x_package'];

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////// POST-APOCALYPTIC GAMES //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$x_low_tech = $_POST['x_low_tech'];
$x_mutants = $_POST['x_mutants'];
$x_money = $_POST['x_money'];
	if (str_replace(" ", "", $x_money) == "")
	{
		if ($x_game == "Mutant Future"){$x_money = "gold";}
		else if ($x_game == "Broken Urthe"){$x_money = "xormite"; $hdc=8;}
		else {$x_money = "domars"; $hdc=6;}
	}
$x_might1 = $_POST['x_might1'];
$x_might2 = $_POST['x_might2'];
	if ($x_might1 > 0){} else {$x_might1 = 1;}
	if ($x_might2 > 0){} else {$x_might2 = $hdc;}
	if ($x_might1 > $x_might2){$x_might1 = $x_might2;}

$x_frob = $_POST['x_frob'];
$x_fveh = $_POST['x_fveh'];
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if (($x_game == "OSRIC") && ($x_extra > 0))
	{
		$take = "(creator='OSRIC' OR creator='MoM')";
		$bottom_notices = 1;
		$genre = "Fantasy";
	}
	else if ($x_game == "OSRIC")
	{
		$take = "creator='OSRIC'";
		$bottom_notices = 1;
		$genre = "Fantasy";
	}
	else if ($x_game == "Swords & Wizardry")
	{
		$take = "creator='SW'";
		$bottom_notices = 5;
		$genre = "Fantasy";
		$x_hit_dice = $_POST['x_hit_dice']+0;
	}
	else if ($x_game == "BFRPG")
	{
		$take = "creator='BFRPG'";
		$bottom_notices = 11;
		$genre = "Fantasy";
	}
	else if ($x_game == "Swords & Six-Siders")
	{
		$take = "creator='SX'";
		$bottom_notices = 18;
		$genre = "Fantasy";
	}
	else if ($x_game == "BD&D")
	{
		$take = "creator='BX'";
		$bottom_notices = 13;
		$genre = "Fantasy";
	}
	else if ($x_game == "AD&D")
	{
		$genre = "Fantasy";
		$dd_ff = $_SESSION["SESSION_ADD_FF"] = $_POST['dd_ff'];
		$dd_mm2 = $_SESSION["SESSION_ADD_MM2"] = $_POST['dd_mm2'];
		$ua = $_SESSION["SESSION_ADD_UA"] = $_POST['ua']+0;
		$take = "(creator LIKE 'SRC: MM %' OR ";
		if ($dd_ff > 0){$take = $take . "creator LIKE 'SRC: FF %' OR ";}
		if ($dd_mm2 > 0){$take = $take . "creator LIKE 'SRC: MM2 %' OR ";}
		$take = $take . "creator = 'ADDDD')";
		$bottom_notices = 13;
	}
	else if ($x_game == "Labyrinth Lord")
	{
		$aec = $_SESSION["SESSION_ADD_AEC"] = $_POST['aec']+0;
		if ($aec > 0){$take = "(creator LIKE 'AEC%' OR creator LIKE 'LL%')";}
		else {$take = "(creator LIKE 'LL%')";}
		$bottom_notices = 2;
		$genre = "Fantasy";
	}
	else if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe"))
	{
		$take = "creator='TT'";
		$bottom_notices = 7;
		$x_extra = $ttlvl; // T&T USES THIS FOR DIFFICULTY LEVEL SINCE THEIR ARE NO MONSTER MANUAL CHOICES
		if ( ( ($tt_dice * 6) + $tt_adds) > 0){} else {$do_not_show_creatures = 1;} // DO NOT DO # APP IF THEY DON'T PICK THESE OPTIONS
		$genre = "Fantasy";
	}
	else if ($x_game == "Mutant Future")
	{
		$take = "(creator='MF')";
		$bottom_notices = 3;
		$x_mappack = "Ruined City";
		$genre = "Post-Apocalyptic";
	}
	else if (($x_game == "Broken Urthe") || ($x_game == "Gamma World"))
	{
		if ($x_game == "Broken Urthe"){$bottom_notices = 8;}
		if ($x_game == "Gamma World"){$bottom_notices = 14;}
		$take = "creator='BU'";
		$x_mappack = "Ruined City";
		$genre = "Post-Apocalyptic";
	}
	else
	{
		$take = "creator='WIZ'";
		$genre = "Fantasy";
	}

$x_area = stripslashes($_POST['x_area']);
   if ($x_area == ""){$x_area = "Land Area";}
$x_rigged_chance = $_POST['x_rigged_chance'];
$x_adjust = $_POST['x_adjust'];
$x_low_magic = $_POST['x_low_magic'];
$x_terrain = $_POST['x_terrain'];
	if ($x_terrain == 100){$area_monsters = "(location LIKE '%PD%')"; $weather = "desert"; $chk_terrain = "PD";}
	else if ($x_terrain == 101){$area_monsters = "(location LIKE '%PF%')"; $weather = "normal"; $chk_terrain = "PF";}
	else if ($x_terrain == 102){$area_monsters = "(location LIKE '%PH%')"; $weather = "normal"; $chk_terrain = "PH";}
	else if ($x_terrain == 103){$area_monsters = "(location LIKE '%TF%' OR location LIKE '%TH%')"; $weather = "tropics"; $chk_terrain = "TF%' OR location LIKE '%TH";}
	else if ($x_terrain == 104){$area_monsters = "(location LIKE '%PM%' OR location LIKE '%CM%')"; $weather = "mountains"; $chk_terrain = "PM%' OR location LIKE '%CM";}
	else if ($x_terrain == 105){$area_monsters = "(location LIKE '%PP%')"; $weather = "normal"; $chk_terrain = "PP";}
	else if ($x_terrain == 106){$area_monsters = "(location LIKE '%SW%')"; $weather = "sea"; $chk_terrain = "SW";}
	else if ($x_terrain == 107){$area_monsters = "(location LIKE '%CF%' OR location LIKE '%CH%' OR location LIKE '%CP%')"; $weather = "cold"; $chk_terrain = "CF%' OR location LIKE '%CH%' OR location LIKE '%CP";}
	else if ($x_terrain == 108){$area_monsters = "(location LIKE '%PS%' OR location LIKE '%TS%')"; $weather = "tropics"; $chk_terrain = "PS%' OR location LIKE '%TS";}
	else if ($x_terrain == 109){$area_monsters = "(location LIKE '%TF%' OR location LIKE '%TH%')"; $weather = "tropics"; $chk_terrain = "TF%' OR location LIKE '%TH";}
	else if ($x_terrain == 110){$area_monsters = "(location LIKE '%FW%')"; $x_terrain = 106; $weather = "sea"; $chk_terrain = "FW";}
	else if ($x_terrain == 111){$area_monsters = "(location LIKE '%RD%')"; $weather = "desert"; $chk_terrain = "RD";}
	else if ($x_terrain == 112){$area_monsters = "(location LIKE '%DG%')"; $weather = "none"; $chk_terrain = "DG"; $underground = "AND underground=1";}

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
$x_u_c = $_POST['x_u_c']; // DECO
	if ($x_furnish > 0){$x_u_c = 1;}
$x_u_c_min = $_POST['x_u_c_min']; // MIN
$x_u_c_max = $_POST['x_u_c_max']; // MAX
$x_u_c_low = 0 + $_POST['x_u_c_low']; // LOW
	if ($x_u_c_min > $x_u_c_max){$x_u_c_min = $x_u_c_max;}
$x_l_c = $_POST['x_l_c']; // LOOT
$x_l_c_min = $_POST['x_l_c_min']; // MIN
$x_l_c_max = $_POST['x_l_c_max']; // MAX
$x_l_c_low = 0 + $_POST['x_l_c_low']; // LOW
	if ($x_l_c_min > $x_l_c_max){$x_l_c_min = $x_l_c_max;}



$delve_table = "delve_" . createRandomCode();
$tadlv = "CREATE TEMPORARY TABLE $delve_table (vkey INT(20) NOT NULL, vtype CHAR(1) NOT NULL, vsize CHAR(1) NOT NULL)";
wz_query( $connection, $tadlv ); /*tadlv_hxm*/

$keyed = 1;

$map_wide = 2;
$map_high = 2;

$info = $_POST['info'];
$equals = $_POST['map_equals'];
$planet = $_POST['map_name'];
$climate = $_POST['map_climate'];
	if (($climate == 8) && ($genre != "Empty")){$genre = "Lunar";}
	if (mt_rand(1,2) == 1){$moon_color = "moon";} else {$moon_color = "mars";}
$climate = $x_terrain;
$legend = 0;
$color = $_POST['color'];
$colorl = 0;

$terrain_latitude = -1;

include("functions/hex_map.php");

$my_hex_areas_list = substr($my_hex_areas_list, 0, -1); // THE DIFFERENT AREAS IN THIS HEX
$my_areas_of_interest = explode("^", $my_hex_areas_list);
$my_area_count = count($my_areas_of_interest);
if (($my_area_count > 0) && ($my_areas_of_interest[0] != ""))
{
	$area_count = $my_area_count;
	if ($my_area_count > 1){$listing_notice = "With&nbsp;" . $area_count . "&nbsp;Unique&nbsp;Areas&nbsp;Listed&nbsp;In&nbsp;Detail&nbsp;Below...";}
	else {$listing_notice = "With&nbsp;" . $area_count . "&nbsp;Unique&nbsp;Area&nbsp;Listed&nbsp;In&nbsp;Detail&nbsp;Below...";}
}
else
{
	$area_count = "No"; $my_area_count = 0;
	$listing_notice = "With&nbsp;No&nbsp;Areas&nbsp;Of&nbsp;Interest.";
}

echo "<div style='position:absolute;top:5px; left:10px; z-index:100;'><img src='land/hex_huge.gif'></div>";

echo "<div style='height:" . (($map_high * 272) + 40) . "px;'>&nbsp;</div>";

echo "<font size='6'>" . $x_area . $x_module . "</font><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $listing_notice;

$y_rulez = 2; if ($x_game == "Fantasy"){ echo "<hr>"; include("functions/rules.php"); }

echo "<hr><div style='page-break-after: always; height:1px;'>&nbsp;</div>";

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////// MAKE THE RANDOM ENCOUNTERS FOR THIS AREA ///////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$table = "creatures" . createRandomCode();

	if ($x_level > 0){$f_level = $x_level + $x_characters + $lvl_modifier;} else {$f_level = 100;}

		$qry = "CREATE TEMPORARY TABLE $table SELECT * FROM monsters_rpgs WHERE $take AND $area_monsters AND difficulty<=$f_level AND id>0";
		wz_query( $connection, $qry ); /*qry_hxm1*/

			$stop_processing = 0;
			while ($stop_processing != 1) :
				$qry = "SELECT * FROM $table WHERE freq_code=2";
				$res = wz_query( $connection, $qry ); /*qry*/
				$num = wz_num_rows($res);
					wz_query($connection, "INSERT INTO $table SELECT * FROM $table WHERE freq_code=2");
					wz_query($connection, "UPDATE $table SET freq_code=(freq_code-1)");
				if ($num < 1){$stop_processing = 1;}
			endwhile;

		if ($x_terrain == 106)
		{
			if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){$enc_numbers = 21; $dirl = "4d6"; $counts_enct=3;} else {$enc_numbers = 20; $dirl = "1d20";}
			echo "<hr color='#C0C0C0' size='8'><b>RANDOM ENCOUNTERS ON THE SURFACE</b>";
		}
		else
		{
			if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){$enc_numbers = 19; $dirl = "4d6"; $counts_enct=3;} else {$enc_numbers = 18; $dirl = "1d20";}
			echo "<hr color='#C0C0C0' size='8'><b>RANDOM ENCOUNTERS</b>";
		}
		echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
		echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;&nbsp;" . $dirl . "&nbsp;&nbsp;&nbsp;&nbsp;</font></td>";
		echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>ENCOUNTER</font></td></tr>";

	while ($enc_numbers > 0) :

		$qry = "SELECT * FROM $table ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), 
			RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), 
			RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $enc_numbers";
		$res = wz_query( $connection, $qry ); /*qry_hxm5*/

		while ($ary=wz_fetch_assoc($res)) :

			$show_detail_monster_info = $x_describe;
			include("functions/stat_blocks.php");

			$counts_enct = $counts_enct + 1;
			echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_enct . "</font></td>";
			echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $monster_info . "</font></td></tr>";

			$enc_numbers = $enc_numbers - 1;

		endwhile;

		if ($x_terrain != 106)
		{
			$counts_enct = $counts_enct + 1;
			echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_enct . "</font></td>";
			echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>ROLL ON THE RANDOM ITEM I TABLE</font></td></tr>";
			$counts_enct = $counts_enct + 1;
			echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_enct . "</font></td>";
			echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>ROLL ON THE RANDOM ITEM II TABLE</font></td></tr>";
		}

	endwhile;

		echo "</table>";

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////// MAKE THE FRESH WATER ENCOUNTERS FOR THIS AREA IF NEEDED ////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if (($make_water_encounter_table > 0) && ($x_terrain != 112))
	{
		echo "<div style='page-break-after: always; height:1px;'>&nbsp;</div>";

		$table = "water" . createRandomCode();
		$counts_enct = 0;

		if ($x_level > 0){$f_level = $x_level + $x_characters + $lvl_modifier;} else {$f_level = 100;}

			$qry = "CREATE TEMPORARY TABLE $table SELECT * FROM monsters_rpgs WHERE $take AND location LIKE '%FW%' AND difficulty<=$f_level AND id>0";
			wz_query( $connection, $qry ); /*qry_hxm*/

			$stop_processing = 0;
			while ($stop_processing != 1) :
				$qry = "SELECT * FROM $table WHERE freq_code=2";
				$res = wz_query( $connection, $qry ); /*qry*/
				$num = wz_num_rows($res);
					wz_query($connection, "INSERT INTO $table SELECT * FROM $table WHERE freq_code=2");
					wz_query($connection, "UPDATE $table SET freq_code=(freq_code-1)");
				if ($num < 1){$stop_processing = 1;}
			endwhile;

		if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){$enc_numbers = 11; $dirl = "2d6"; $counts_enct=1;} else {$enc_numbers = 12; $dirl = "1d12"; $counts_enct=0;}

			echo "<hr color='#C0C0C0' size='8'><b>RANDOM FRESHWATER ENCOUNTERS</b>";
			echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
			echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;&nbsp;" . $dirl . "&nbsp;&nbsp;&nbsp;&nbsp;</font></td>";
			echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>ENCOUNTER</font></td></tr>";

		while ($enc_numbers > 0) :

			$qry = "SELECT * FROM $table ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), 
				RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), 
				RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $enc_numbers";
			$res = wz_query( $connection, $qry ); /*qry_hxm8*/

			while ($ary=wz_fetch_assoc($res)) :

				$show_detail_monster_info = $x_describe;
				include("functions/stat_blocks.php");

				$counts_enct = $counts_enct + 1;
				echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_enct . "</font></td>";
				echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $monster_info . "</font></td></tr>";

				$enc_numbers = $enc_numbers - 1;

			endwhile;

		endwhile;

			echo "</table>";
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////// MAKE ENCOUNTERS FOR UNDER THE WATER ////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if (($x_terrain == 106) || ($x_terrain == 112))
	{
		if ($x_terrain == 106){$water_take = $area_monsters;} else {$water_take = "(location LIKE '%SW%' OR location LIKE '%FW%')";}

		echo "<div style='page-break-after: always; height:1px;'>&nbsp;</div>";

		$table = "uwater" . createRandomCode();
		$counts_enct = 0;

		if ($x_level > 0){$f_level = $x_level + $x_characters + $lvl_modifier;} else {$f_level = 100;}

			$qry = "CREATE TEMPORARY TABLE $table SELECT * FROM monsters_rpgs WHERE $take AND $water_take AND difficulty<=$f_level AND swimmer=1 AND id>0";
			wz_query( $connection, $qry ); /*qry_hxm*/

			$stop_processing = 0;
			while ($stop_processing != 1) :
				$qry = "SELECT * FROM $table WHERE freq_code=2";
				$res = wz_query( $connection, $qry ); /*qry*/
				$num = wz_num_rows($res);
					wz_query($connection, "INSERT INTO $table SELECT * FROM $table WHERE freq_code=2");
					wz_query($connection, "UPDATE $table SET freq_code=(freq_code-1)");
				if ($num < 1){$stop_processing = 1;}
			endwhile;

		if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){$enc_numbers = 11; $dirl = "2d6"; $counts_enct=1;} else {$enc_numbers = 12; $dirl = "1d12"; $counts_enct=0;}

			echo "<hr color='#C0C0C0' size='8'><b>RANDOM UNDERWATER ENCOUNTERS</b>";
			echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
			echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;&nbsp;" . $dirl . "&nbsp;&nbsp;&nbsp;&nbsp;</font></td>";
			echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>ENCOUNTER</font></td></tr>";

		while ($enc_numbers > 0) :

			$qry = "SELECT * FROM $table ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), 
				RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), 
				RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT $enc_numbers";
			$res = wz_query( $connection, $qry ); /*qry_hxm8*/

			while ($ary=wz_fetch_assoc($res)) :

				$show_detail_monster_info = $x_describe;
				include("functions/stat_blocks.php");

				$counts_enct = $counts_enct + 1;
				echo "<tr><td align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_enct . "</font></td>";
				echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $monster_info . "</font></td></tr>";

				$enc_numbers = $enc_numbers - 1;

			endwhile;

		endwhile;

			echo "</table>";
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////// MAKE THE RANDOM ITEMS ONE MAY FIND ON THE GROUND ///////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if ($x_terrain != 106)
	{
			echo "<div style='page-break-after: always; height:1px;'>&nbsp;</div>";

		if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){$enc_numbers = 21; $dirl = "4d6"; $counts_enct=3;} else {$enc_numbers = 20; $dirl = "1d20"; $counts_enct=0;}

			echo "<hr color='#C0C0C0' size='8'><b>RANDOM ITEMS FOUND ON THE GROUND</b>";
			echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
			echo "<tr><td width='5' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;&nbsp;" . $dirl . "&nbsp;&nbsp;&nbsp;&nbsp;</font></td>";
			echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>RANDOM ITEM I</font></td>";
			echo "<td width='5' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;&nbsp;" . $dirl . "&nbsp;&nbsp;&nbsp;&nbsp;</font></td>";
			echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>RANDOM ITEM II</font></td></tr>";

		while ($enc_numbers > 0) :

			if ($genre == "Post-Apocalyptic"){$junkA = gammaGroundItem($x_money,$x_game,$x_cut);} else {$junkA = fantasyGroundItem($x_game);}
			if ($genre == "Post-Apocalyptic"){$junkB = gammaGroundItem($x_money,$x_game,$x_cut);} else {$junkB = fantasyGroundItem($x_game);}

			$counts_enct = $counts_enct + 1;
			echo "<tr><td width='5' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_enct . "</font></td>";
			echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $junkA . "</font></td>";
			echo "<td align='center' width='5' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_enct . "</font></td>";
			echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $junkB . "</font></td></tr>";

			$enc_numbers = $enc_numbers - 1;

		endwhile;

			echo "</table>";
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////// MAKE THE RANDOM WEATHER FOR THE AREA ///////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ($weather != "none")
	{
		if (($x_game == "Swords & Six-Siders") || ($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){$enc_numbers = 21; $dirl = "4d6"; $counts_enct=3;} else {$enc_numbers = 20; $dirl = "1d20"; $counts_enct=0;}

			echo "<hr color='#C0C0C0' size='8'><b>RANDOM WEATHER (ROLL ONCE EACH DAY)</b>";
			echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
			echo "<tr><td width='5' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;&nbsp;" . $dirl . "&nbsp;&nbsp;&nbsp;&nbsp;</font></td>";
			echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>WEATHER</font></td></tr>";

		while ($enc_numbers > 0) :

			$counts_enct = $counts_enct + 1;
			echo "<tr><td width='5' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_enct . "</font></td>";
			echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . weather($weather) . "</font></td></tr>";

			$enc_numbers = $enc_numbers - 1;

		endwhile;

		echo "</table>";
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////// MAKE THE AREAS /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

while ($my_area_count > 0) :

	$my_area_count = $my_area_count - 1;
	$this_area_of_interest = explode("|", $my_areas_of_interest[$my_area_count]);
	$hex_num_area = $hex_num_area + 1;
	if ($this_area_of_interest[1] == "U"){} // UNDERWATER
	$do_some_monsters = 0;
	$do_a_map = 0;
	$limits_in_hex = "";
	$no_way_out  = "";
	$do_extra_floors = 1;
	$floor_close_out = 0;
	$no_sounds = 0;
	$no_moods = 0;
	$map_to_make_here = "normal_hex_map";
	$map_wide = 1;
	$map_high = 1;
	$do_some_contents = $x_u_c;
	$do_some_traps = $x_t_c;
	$do_some_chest_traps = $x_rigged_chance;
	$do_some_weirds = $x_weird;
	$this_spot_monsters = $area_monsters;
	$pa_maps = 0;
	$sealed_up = 0;
	$do_some_robots = $x_frob;
	$do_some_vehicles = $x_fveh;
	$fort_lived = 0;
	$do_a_sewer_map = 0;
	$hx_tl_px = "";

	if ($genre == "Fantasy") ///// FANTASY //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		///// PICK A NAME TO USE FOR LATER AREAS //////
		switch (mt_rand(0,12))
		{
			case 0:	$word = demonName();	break;
			case 1:	$word = dragonName();	break;
			case 2:	$word = mageName();		break;
			case 3:	$word = orcName();		break;
			case 4:	$word = elfName();		break;
			case 5:	$word = genericName();	break;
			case 6:	$word = dwarfName();	break;
			case 7:	$word = gnomeName();	break;
			case 8:	$word = genericName();	break;
			case 9:	$word = authorName();	break;
			case 10:$word = goblinName();	break;
			case 11:$word = orcName();		break;
			case 12:$word = impName();		break;
		}
		if (substr($word, -1) == "s"){$possesive = $word . "`";} else {$possesive = $word . "`s";}

		///// IS THE AREA GOING TO BE HAUNTED /////
		if (mt_rand(1,4) == 1)
		{
			$tomb = 1;
			switch (mt_rand(0,6))
			{
				case 0:	$scary = "Haunted ";	break;
				case 1:	$scary = "Cursed ";		break;
				case 2:	$scary = "Accursed ";	break;
				case 3:	$scary = "Blighted ";	break;
				case 4:	$scary = "Infernal ";	break;
				case 5:	$scary = "Unholy ";		break;
				case 6:	$scary = "Forsaken ";	break;
			}
		} else {$tomb = 0; $scary = "";}

		// DO SOME RANDOM STUFF WITH THE SKULL ICONS
		$skull_does = 0;
		if ($this_area_of_interest[0] == "skull.png")
		{
			$skull_does = 2;
			if (mt_rand(1,3) == 1){$skull_does = 1;}
		}

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		if (($this_area_of_interest[0] == "skull.png") && ($skull_does == 1))
		{
			if ($this_area_of_interest[1] == "U") // UNDERWATER
			{
				$tomb = 0;		$scary = "";
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}

			if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
			$lair_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level AND m_lair>0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
			$lair_res = wz_query( $connection, $lair_qry ); /*lair_qry_hxm9*/
			$lair_num = wz_num_rows($lair_res);
			if ($lair_num == 0)
			{
				$lair_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND m_lair>0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
				$lair_res = wz_query( $connection, $lair_qry ); /*lair_qry_hxm10*/
				$lair_num = wz_num_rows($lair_res);
				if (($lair_num == 0) && ($this_area_of_interest[1] != "U"))
				{
					$lair_qry = "SELECT * FROM monsters_rpgs WHERE $take AND location LIKE '%DG%' AND m_lair>0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
					$lair_res = wz_query( $connection, $lair_qry ); /*lair_qry_hxm11*/
				}
			}
			$lair_ary = wz_fetch_assoc($lair_res);
			$lair_owner = $lair_ary[id];

			if ($lair_ary[m_lair] == 1)
			{
				$do_some_weirds = 0;
				$pix = "cave";
				$do_some_contents = 0;
				switch (mt_rand(0,3))
				{
					case 0:	$flur = "Cave of the " . $lair_ary[m_fort_name];	break;
					case 1:	$flur = "Den of the " . $lair_ary[m_fort_name];		break;
					case 2:	$flur = "Lair of the " . $lair_ary[m_fort_name];	break;
					case 3:	$flur = "Cavern of the " . $lair_ary[m_fort_name];	break;
				}
			}
			else
			{
				$floors_to_make = mt_rand(1,100); if ($floors_to_make > 95){$do_extra_floors = 4;} else if ($floors_to_make > 85){$do_extra_floors = 3;} else if ($floors_to_make > 70){$do_extra_floors = 2;}
				$pix = "dungeon";
				switch (mt_rand(0,6))
				{
					case 0:	$flur = $scary . "Castle of the " . $lair_ary[m_fort_name];				break;
					case 1:	$flur = $scary . "Citadel of the " . $lair_ary[m_fort_name];			break;
					case 2:	$flur = $scary . "Donjon of the " . $lair_ary[m_fort_name];				break;
					case 3:	$flur = $scary . "Fort of the " . $lair_ary[m_fort_name];				break;
					case 4:	$flur = $scary . "Hold of the " . $lair_ary[m_fort_name];				break;
					case 5:	$flur = $scary . "Palace of the " . $lair_ary[m_fort_name];				break;
					case 6:	$flur = $scary . "Stronghold of the " . $lair_ary[m_fort_name];			break;
				}
			}
			if ($ary[turn] > 0){$tomb = 1;} else {$tomb = 0;}
			$do_some_monsters = 1;
			$do_a_map = 1;
		}
		else if (($this_area_of_interest[0] == "skull.png") && ($skull_does == 2)) ////////////////////////////////////////////////////////////////////////////////////////////////////////
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			$floors_to_make = mt_rand(1,100); if ($floors_to_make > 95){$do_extra_floors = 4;} else if ($floors_to_make > 85){$do_extra_floors = 3;} else if ($floors_to_make > 70){$do_extra_floors = 2;}
			if ($this_area_of_interest[1] == "U") // UNDERWATER
			{
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}
			switch (mt_rand(0,13))
			{
				case 0:	$flur = $scary . "Crypt of " . $word;				$tomb = 1; break;
				case 1:	$flur = $scary . "Tomb of " . $word;				$tomb = 1; break;
				case 2:	$flur = $possesive . " " . $scary . "Tomb";			$tomb = 1; break;
				case 3:	$flur = $possesive . " " . $scary . "Crypt";		$tomb = 1; break;
				case 4:	$flur = $scary . "Dungeon of " . $word;				break;
				case 5:	$flur = $scary . "Chamber of " . $word;				break;
				case 6:	$flur = $scary . "Vault of " . $word;				break;
				case 7:	$flur = $possesive . " " . $scary . "Dungeon";		break;
				case 8: $flur = $possesive . " " . $scary . "Chamber";		break;
				case 9: $flur = $possesive . " " . $scary . "Vault";		break;
				case 10:$flur = $possesive . " Dungeon";					$tomb = 0; break;
				case 11:$flur = "Dungeon of " . $word;						$tomb = 0; break;
				case 12:$flur = $possesive . " Dungeon";					$tomb = 0; break;
				case 13:$flur = "Dungeon of " . $word;						$tomb = 0; break;
			}
			$pix = "dungeon";
			$do_some_monsters = 1;
			$do_a_map = 1;
		}
		else if ($this_area_of_interest[0] == "boat.png") /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		{
			///// PICK A NAME TO USE FOR THE BOAT //////
			switch (mt_rand(0,7))
			{
				case 0:	$ship_job = ucfirst(jobName());				break;
				case 1:	$ship_job = classMaleName();				break;
				case 2:	$ship_job = classFemaleName();				break;
				case 3:	$ship_job = ucfirst(designType(1));			break;
				case 4:	$ship_job = ucfirst(jobName()) . "s";		break;
				case 5:	$ship_job = classMaleName() . "s";			break;
				case 6:	$ship_job = classFemaleName() . "s";		break;
				case 7:	$ship_job = ucfirst(designType(1)) . "s";	break;
			}
			switch (mt_rand(0,20))
			{
				case 0:	$ship_type = "Weeping";		break;
				case 1:	$ship_type = "Sailing";		break;
				case 2:	$ship_type = "Sunken";		break;
				case 3:	$ship_type = "Drifting";	break;
				case 4:	$ship_type = "Floating";	break;
				case 5:	$ship_type = "Anchored";	break;
				case 6:	$ship_type = "Sea";			break;
				case 7:	$ship_type = "Voyaging";	break;
				case 8:	$ship_type = "Journeying";	break;
				case 9:	$ship_type = "Cursed";		break;
				case 10:$ship_type = "Fearful";		break;
				case 11:$ship_type = "Angry";		break;
				case 12:$ship_type = "Howling";		break;
				case 13:$ship_type = "Shameful";	break;
				case 14:$ship_type = "Screaming";	break;
				case 15:$ship_type = "Plundering";	break;
				case 16:$ship_type = "Bloody";		break;
				case 17:$ship_type = "Damned";		break;
				case 18:$ship_type = "Hateful";		break;
				case 19:$ship_type = "Courageous";	break;
				case 20:$ship_type = "Peaceful";	break;
			}
			switch (mt_rand(0,5))
			{
				case 0:	$flur = "The " . adjName() . " Ship of " . $word;	break;
				case 1:	$flur = "The " . adjName() . " Ship of the " . $ship_job;	break;
				case 2:	$flur = "The " . $ship_type . " Ship of " . $word;	break;
				case 3:	$flur = "The " . $ship_type . " Ship of the " . $ship_job;	break;
				case 4:	$flur = $possesive . " Ship of the " . adjName() . " " . $ship_job;	break;
				case 5:	$flur = "The " . $ship_type . " " . $ship_job;	break;
			}
			switch (mt_rand(0,5))
			{
				case 0:	$ship_wreck = "vanished";		break;
				case 1:	$ship_wreck = "disappeared";	break;
				case 2:	$ship_wreck = "sank";			break;
				case 3:	$ship_wreck = "was sunk";		break;
				case 4:	$ship_wreck = "went missing";	break;
				case 5:	$ship_wreck = "was lost";		break;
			}
			if ($x_terrain != 106){$this_spot_monsters = "(location LIKE '%FW%')";} else {$this_spot_monsters = $area_monsters;}
			$lair_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty>4 AND m_no_dungeon!=1 AND swimmer=1 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
			$lair_res = wz_query( $connection, $lair_qry ); /*lair_qry_hxm12*/
			$lair_ary = wz_fetch_assoc($lair_res);
			$lair_owner = $lair_ary[id];
				$do_some_monsters = 0;
				$do_a_map = 0;
		}
		else if ( ($this_area_of_interest[0] == "dungeon.png") || ($this_area_of_interest[0] == "castle.png") || ($this_area_of_interest[0] == "castle_evil.png") ) ///////////////////////////////////////////////////////////////////////
		{
			$floors_to_make = mt_rand(1,100); if ($floors_to_make > 95){$do_extra_floors = 4;} else if ($floors_to_make > 85){$do_extra_floors = 3;} else if ($floors_to_make > 70){$do_extra_floors = 2;}
			if ($this_area_of_interest[1] == "U") // UNDERWATER
			{
				$tomb = 0;		$scary = "";
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}

			if ($this_area_of_interest[0] == "dungeon.png")
			{
				switch (mt_rand(0,7))
				{
					case 0:	$flur = $scary . "Dungeon of " . $word;				break;
					case 1:	$flur = $scary . "Labyrinth of " . $word;			break;
					case 2:	$flur = $scary . "Dungeon of " . $word;				break;
					case 3:	$flur = $scary . "Maze of " . $word;				break;
					case 4:	$flur = $possesive . " " . $scary . "Dungeon";		break;
					case 5:	$flur = $possesive . " " . $scary . "Labyrinth";	break;
					case 6: $flur = $possesive . " " . $scary . "Dungeon";		break;
					case 7: $flur = $possesive . " " . $scary . "Maze";			break;
				}
			}
			else
			{
				switch (mt_rand(0,13))
				{
					case 0:	$flur = $scary . "Castle of " . $word;				break;
					case 1:	$flur = $scary . "Citadel of " . $word;				break;
					case 2:	$flur = $scary . "Donjon of " . $word;				break;
					case 3:	$flur = $scary . "Fortress of " . $word;			break;
					case 4:	$flur = $scary . "Hold of " . $word;				break;
					case 5:	$flur = $scary . "Palace of " . $word;				break;
					case 6:	$flur = $scary . "Stronghold of " . $word;			break;
					case 7:	$flur = $possesive . " " . $scary . "Castle";		break;
					case 8:	$flur = $possesive . " " . $scary . "Citadel";		break;
					case 9:	$flur = $possesive . " " . $scary . "Donjon";		break;
					case 10:$flur = $possesive . " " . $scary . "Fortress";		break;
					case 11:$flur = $possesive . " " . $scary . "Hold";			break;
					case 12:$flur = $possesive . " " . $scary . "Palace";		break;
					case 13:$flur = $possesive . " " . $scary . "Stronghold";	break;
				}
			}
			$pix = "dungeon";
			$do_some_monsters = 1;
			$do_a_map = 1;
		}
		else if ( $this_area_of_interest[0] == "cave.png")
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			if ($this_area_of_interest[1] == "U") // UNDERWATER
			{
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}

			switch (mt_rand(0,5))
			{
				case 0:	$flur = "Cave of " . $word;		break;
				case 1:	$flur = "Grotto of " . $word;	break;
				case 2:	$flur = "Cavern of " . $word;	break;
				case 3:	$flur = $possesive . " Cave";	break;
				case 4:	$flur = $possesive . " Grotto";	break;
				case 5:	$flur = $possesive . " Cavern";	break;
			}
			$pix = "cave";
			$tomb = 0;
			$do_some_monsters = 1;
			$do_some_contents = 0;
			$do_some_weirds = 0;
			$do_a_map = 1;
		}
		else if ( ( $this_area_of_interest[0] == "fort.png" ) && ( mt_rand(1,3) == 1 ) ) //////////////////////////////////////////////////////////////////////////////////////////////////
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			switch (mt_rand(0,1))
			{
				case 0:	$flur = " Fort";				break;
				case 1:	$flur = " Outpost";				break;
			}
			$pix = "city";
			$tomb = 0;
			$do_some_monsters = 1;
			$do_some_weirds = 0;
			$no_sounds = 1;
			$no_moods = 1;
			$map_to_make_here = "normal_keep_map"; 
			$do_a_map = 1;
			$this_spot_monsters = substr($area_monsters, 0, -1);
			$this_spot_monsters = $this_spot_monsters . ") AND m_fort=1 $underground AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			$limits_in_hex = "LIMIT 1";
			$fort_lived = 1;
		}
		else if ( $this_area_of_interest[0] == "fort.png" ) ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			$floors_to_make = mt_rand(1,100); if ($floors_to_make > 95){$do_extra_floors = 4;} else if ($floors_to_make > 85){$do_extra_floors = 3;} else if ($floors_to_make > 70){$do_extra_floors = 2;}
			switch (mt_rand(0,2))
			{
				case 0:	$fort_is = "Deserted ";		break;
				case 1:	$fort_is = "Abandoned ";	break;
				case 2:	$fort_is = "Forgotten ";	break;
			}
			if ($scary != "")
			{
				switch (mt_rand(0,3))
				{
					case 0:	$flur = $possesive . " " . $scary . "Fort";			break;
					case 1:	$flur = $possesive . " " . $scary . "Outpost";		break;
					case 2:	$flur = $fort_is . " " . $scary . "Fort";			break;
					case 3:	$flur = $fort_is . " " . $scary . "Outpost";		break;
				}
			}
			else
			{
				switch (mt_rand(0,3))
				{
					case 0:	$flur = $possesive . " " . $fort_is . "Fort";		$tomb = 0;		break;
					case 1:	$flur = $possesive . " " . $fort_is . "Outpost";	$tomb = 0;		break;
					case 2:	$flur = $fort_is . "Fort of " . $word;				$tomb = 0;		break;
					case 3:	$flur = $fort_is . "Outpost of " . $word;			$tomb = 0;		break;
				}
			}
			$pix = "city";
			$do_some_monsters = 1;
			$do_some_weirds = 0;
			$no_sounds = 1;
			$no_moods = 1;
			$map_to_make_here = "normal_keep_map"; 
			$do_a_map = 1;
			$this_spot_monsters = substr($area_monsters, 0, -1);
			$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
		}
		else if ( ( ($this_area_of_interest[0] == "camp.png") || ($this_area_of_interest[0] == "u_primitive.png") || ($this_area_of_interest[0] == "sf_primitive.png") ) && ( mt_rand(1,2) == 1 ) ) ///////////////////////////////////////////
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			$flur = " Camp";
			$pix = "village"; if ($x_terrain == 112){$pix = "cave"; $flur = " Dwelling";}
			$tomb = 0;
			$do_some_monsters = 1;
			$do_some_weirds = 0;
			$no_sounds = 1;
			$no_moods = 1;
			$do_a_map = 1;
			$this_spot_monsters = substr($area_monsters, 0, -1);
			$this_spot_monsters = $this_spot_monsters . ") AND m_fort=1 $underground AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			$limits_in_hex = "LIMIT 1";
			$fort_lived = 1;
		}
		else if ( ($this_area_of_interest[0] == "camp.png") || ($this_area_of_interest[0] == "u_primitive.png") || ($this_area_of_interest[0] == "sf_primitive.png") ) ////////////////////////////////////////////////////////////////////////
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			switch (mt_rand(0,2))
			{
				case 0:	$fort_is = "Deserted ";		break;
				case 1:	$fort_is = "Abandoned ";	break;
				case 2:	$fort_is = "Forgotten ";	break;
			}
			if ($scary != "")
			{
				switch (mt_rand(0,1))
				{
					case 0:	$flur = $possesive . " " . $scary . "Camp";		break;
					case 1:	$flur = $fort_is . " " . $scary . "Camp";		break;
				}
			}
			else
			{
				switch (mt_rand(0,1))
				{
					case 0:	$flur = $possesive . " " . $fort_is . "Camp";	$tomb = 0;		break;
					case 1:	$flur = $fort_is . "Camp of " . $word;			$tomb = 0;		break;
				}
			}
			$pix = "village";
			if ($x_terrain == 112)
			{
				$pix = "cave";
				if ($scary != "")
				{
					switch (mt_rand(0,1))
					{
						case 0:	$flur = $possesive . " " . $scary . "Dwelling";		break;
						case 1:	$flur = $fort_is . " " . $scary . "Cave";		break;
					}
				}
				else
				{
					switch (mt_rand(0,1))
					{
						case 0:	$flur = $possesive . " " . $fort_is . "Dwelling";	$tomb = 0;		break;
						case 1:	$flur = $fort_is . "Cavern of " . $word;			$tomb = 0;		break;
					}
				}
			}
			$do_some_monsters = 1;
			$do_some_weirds = 0;
			$no_sounds = 1;
			$no_moods = 1;
			$do_a_map = 1;
			$this_spot_monsters = substr($area_monsters, 0, -1);
			$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
		}
		else if ($this_area_of_interest[0] == "totem.png") ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			switch (mt_rand(0,1))
			{
				case 0:	$flur = " Temple";	break;
				case 1:	$flur = " Shrine";	break;
			}
			$pix = "dungeon";
			$tomb = 0;
			$do_some_monsters = 1;
			$do_some_weirds = 0;
			$no_sounds = 1;
			$no_moods = 1;
			$do_a_map = 1;
			$this_spot_monsters = substr($area_monsters, 0, -1);
			$this_spot_monsters = $this_spot_monsters . ") AND m_fort=1 $underground AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			$limits_in_hex = "LIMIT 1";
			$fort_lived = 1;
		}
		else if ( $this_area_of_interest[0] == "mine.png" ) ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			///// PICK A NAME TO USE FOR THE DESCRIPTION //////
			$mines = "";
			$mineral = "";
			switch (mt_rand(0,4))
			{
				case 0:	$mines = " Dangerous";	break;
				case 1:	$mines = " Ruined";		break;
				case 2:	$mines = " Forgotten";	break;
				case 3:	$mines = " Abandoned";	break;
				case 4:	$mines = " Deserted";	break;
			}
			switch (mt_rand(0,4))
			{
				case 0:	$mineral = " Silver";	break;
				case 1:	$mineral = " Gold";		break;
				case 2:	$mineral = " Diamond";	break;
				case 3:	$mineral = " Iron";		break;
				case 4:	$mineral = " Ore";		break;
			}
			switch (mt_rand(0,7))
			{
				case 0:	$flur = "The" . $mines . $mineral . " Excavation of " . $word;	break;
				case 1:	$flur = "The" . $mines . $mineral . " Mines of " . $word;		break;
				case 2:	$flur = "The" . $mines . $mineral . " Pit of " . $word;			break;
				case 3:	$flur = "The" . $mines . $mineral . " Quarry of " . $word;		break;
				case 4:	$flur = $possesive . $mines . $mineral . " Excavation";			break;
				case 5:	$flur = $possesive . $mines . $mineral . " Mines";				break;
				case 6:	$flur = $possesive . $mines . $mineral . " Pit";				break;
				case 7:	$flur = $possesive . $mines . $mineral . " Quarry";				break;
			}
			$pix = "cave";
			$tomb = 0;
			$do_some_monsters = 1;
			$do_some_contents = 0;
			$do_some_weirds = 0;
			$do_a_map = 1;
			$this_spot_monsters = substr($area_monsters, 0, -1);
			$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
		}
		else if ( ( $this_area_of_interest[0] == "ruins.png") || ($this_area_of_interest[0] == "sf_ruins.png") || ($this_area_of_interest[0] == "stones.png") ) /////////////////////////////
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			$floors_to_make = mt_rand(1,100); if ($floors_to_make > 95){$do_extra_floors = 4;} else if ($floors_to_make > 85){$do_extra_floors = 3;} else if ($floors_to_make > 70){$do_extra_floors = 2;}
			if ($this_area_of_interest[1] == "U") // UNDERWATER
			{
				$tomb = 0;		$scary = "";
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}

			switch (mt_rand(0,1))
			{
				case 0:	$flur = $scary . "Ruins of " . $word;			break;
				case 1:	$flur = $possesive . " " . $scary . "Ruins";	break;
			}
			$pix = "dungeon";
			$do_some_monsters = 1;
			$do_a_map = 1;
		}
		else if (($this_area_of_interest[0] == "temple.png") || ($this_area_of_interest[0] == "temple2.png")) ////////////////////////////////////////////////////////////////////////////////
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			$floors_to_make = mt_rand(1,100); if ($floors_to_make > 95){$do_extra_floors = 4;} else if ($floors_to_make > 85){$do_extra_floors = 3;} else if ($floors_to_make > 70){$do_extra_floors = 2;}
			if ($this_area_of_interest[1] == "U") // UNDERWATER
			{
				$scary = "";
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}
			switch (mt_rand(0,9))
			{
				case 0:	$flur = $scary . "Crypt of " . $word;				$tomb = 1; break;
				case 1:	$flur = $scary . "Tomb of " . $word;				$tomb = 1; break;
				case 2:	$flur = $scary . "Temple of " . $word;				break;
				case 3:	$flur = $scary . "Monastery of " . $word;			break;
				case 4:	$flur = $scary . "Cathedral of " . $word;			break;
				case 5:	$flur = $possesive . " " . $scary . "Tomb";			$tomb = 1; break;
				case 6:	$flur = $possesive . " " . $scary . "Crypt";		$tomb = 1; break;
				case 7:	$flur = $possesive . " " . $scary . "Temple";		break;
				case 8: $flur = $possesive . " " . $scary . "Monastery";	break;
				case 9: $flur = $possesive . " " . $scary . "Cathedral";	break;
			}
			if ($this_area_of_interest[1] == "U"){ $tomb = 0; } // UNDERWATER
			$pix = "dungeon";
			$do_some_monsters = 1;
			$do_a_map = 1;
		}
		else if ($this_area_of_interest[0] == "tower.png") ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		{
			$map_wide = 0;
			$map_high = 0;
			$floors_to_make = mt_rand(1,100); if ($floors_to_make > 90){$do_extra_floors = 6;} else if ($floors_to_make > 70){$do_extra_floors = 5;} else if ($floors_to_make > 40){$do_extra_floors = 4;} else {$do_extra_floors = 3;}
			if ($this_area_of_interest[1] == "U") // UNDERWATER
			{
				$tomb = 0;		$scary = "";
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}
			switch (mt_rand(0,1))
			{
				case 0:	$flur = $scary . "Tower of " . $word;				break;
				case 1:	$flur = $possesive . " " . $scary . "Tower";		break;
			}
			$pix = "dungeon";
			$do_some_monsters = 1;
			$do_a_map = 1;
		}

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		if ($do_some_monsters > 0)
		{
			$table = $hex_num_area . "creatures" . createRandomCode();
			if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}

			$qry = "CREATE TEMPORARY TABLE $table SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level AND id>0 $limits_in_hex";
			wz_query( $connection, $qry ); /*qry_hxm*/

			$stop_processing = 0;
			while ($stop_processing != 1) :
				$qry = "SELECT * FROM $table WHERE freq_code=2";
				$res = wz_query( $connection, $qry ); /*qry*/
				$num = wz_num_rows($res);
					wz_query($connection, "INSERT INTO $table SELECT * FROM $table WHERE freq_code=2");
					wz_query($connection, "UPDATE $table SET freq_code=(freq_code-1)");
				if ($num < 1){$stop_processing = 1;}
			endwhile;
		}

		// FORT NAMES
		if ( ($fort_lived > 0) && (($this_area_of_interest[0] == "fort.png") || ($this_area_of_interest[0] == "totem.png") || ($this_area_of_interest[0] == "camp.png") || ($this_area_of_interest[0] == "u_primitive.png") || ($this_area_of_interest[0] == "sf_primitive.png")) )
		{
			// GET A FORT NAME
			$frt_qry = "SELECT * FROM $table";
			$frt_res = wz_query( $connection, $frt_qry ); /*frt_qry*/
			$frt_ary = wz_fetch_assoc($frt_res);
			$flur = $frt_ary[m_fort_name] . $flur;
		}

		echo "<br><br><div style='page-break-after: always; height:1px;'>&nbsp;</div>";
?>
<table border="1" cellpadding="3" cellspacing="3" width="100%" bordercolorlight="#C0C0C0" bordercolordark="#C0C0C0">
	<tr>
		<td width="40" height="40" align="center"><img src="land/<?php echo $this_area_of_interest[0]; ?>"></td>
		<td height="40" bgcolor="#C0C0C0">
			<font size="5">&nbsp;<?php echo $hex_num_area; ?>&nbsp;-&nbsp;<?php echo $flur; ?>
				<?php if (($this_area_of_interest[1] == "U") || ($this_area_of_interest[0] == "boat.png"))
						{
							$sink_depth = number_format(mt_rand(2,20)*100);
							echo "&nbsp;&nbsp;&nbsp;<i>(" . $sink_depth . " Feet Below The Surface)";
						}
				?>
			</font>
		</td>
	</tr>
</table><br>
<?php
		if ( $do_a_map > 0 )
		{
			$key = 0;
			$room = 0;
			$levs = 0;

			while ( $do_extra_floors > 0 ) :

				$table_wide = ($map_wide * 300) + 300;
				$table_high = ($map_high * 300) + 300;

				include("functions/map_draw_delves.php");

				$levs = $levs + 1;

				if (($do_extra_floors > 1) && ($floor_close_out != 1))
				{
					$no_way_out  = "AND wayout!=1";
					$floor_close_out = 1;
				}

				if ($floor_close_out == 1){echo "<font size='4'>Level " . $levs . "</font>";}

				echo "</p>";

				$do_extra_floors = $do_extra_floors - 1;

				if (($map_high == 0) && ($map_wide == 0) && (($levs == 2) || ($levs == 4) || ($levs == 6)))
				{
					echo "<div style='page-break-after: always; height:1px;'>&nbsp;</div>";
				}
				else if (($map_high == 1) && ($map_wide == 1) && ($floor_close_out == 1))
				{
					echo "<div style='page-break-after: always; height:1px;'>&nbsp;</div>";
				}

				if ( $this_area_of_interest[0] == "fort.png" )
				{
					$pix = "dungeon";
					$do_some_monsters = 1;
					$do_a_map = 1;
					$no_sounds = 0;
					$no_moods = 0;
					$map_to_make_here = "normal_hex_map";
					$do_some_contents = $x_u_c;
					$do_some_traps = $x_t_c;
					$do_some_chest_traps = $x_rigged_chance;
					$do_some_weirds = $x_weird;
					$this_spot_monsters = "AND location LIKE '%DG%' AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
				}

			endwhile;
		}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////// DOES THIS AREA HAVE A BIG BAD GUY ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ( (($this_area_of_interest[0] == "skull.png") && ($skull_does == 1)) || ($this_area_of_interest[0] == "boat.png") )
	{
		echo "</font><hr color='#C0C0C0' size='4'>";

		$sepr = "&nbsp;&nbsp;&nbsp;&nbsp; ";
		$qry = "SELECT * FROM monsters_rpgs WHERE id=$lair_owner";
		$res = wz_query( $connection, $qry ); /*qry_hxmz*/
		$ary = wz_fetch_assoc($res);

		$show_detail_monster_info = $x_describe;
		include("functions/stat_blocks.php");

		if ($this_area_of_interest[0] == "boat.png")
		{
			if (mt_rand(1,3) == 1){$map_found = 1; $sink_time = mt_rand(2,40);} else {$map_found = 0; $sink_time = mt_rand(1,70)*10;}
			echo "</font><font size='4'>The `" . $flur . "` " . $ship_wreck . " about " . $sink_time . " years ago and now rests " . $sink_depth . " feet below the surface. Lurking nearby the ship is...</font><font size='2'><br>"; $lair_box = "S";
		}

		else {echo "</font><font size='4'>Somewhere in this lair is a...</font><font size='2'><br>"; $lair_box = "?";}

		echo $monster_info . "<br>";

		if ($this_area_of_interest[0] == "boat.png")
		{
			if ($map_found == 1){$treasure_map = " " . mapMaker(999,$game);} else {$treasure_map = "";}
			echo "...and inside the ship is a treasure in a " . boxMakerRoom() . ":" . $treasure_map . " ";
		}
		else if ($pix == "cave"){echo "...that has treasure scattered around the cave, lost from past explorers: ";}
		else {echo "...that has a nearby treasure in a " . boxMakerRoom() . ": ";}

			$t_level = $ary[difficulty] + $lvl_modifier;
			$x_min = mt_rand(1,3);
			$x_max = mt_rand(3,(3+$t_level));

			$loot_mash = mt_rand($x_min,$x_max);
			$filled = "";
			$bags_of_coins = 0;

			while ($loot_mash > 0) :

				if ((($x_package == "Tunnels & Trolls 5th Edition") || ($x_package == "Tunnels & Trolls 7th Edition") || ($x_package == "Tunnels & Trolls Deluxe")) || ($x_package == "AD&D"))
				{
					if ($bags_of_coins > 0){$ghrz = 81;} else {$ghrz = 1;}
					$my_reward = mt_rand($ghrz,100);
					if ($my_reward < 81){$dynamic_loot = currencyBuilder($t_level,3,0,$x_cut,1,$x_game); $bags_of_coins = 1;}
					else if ($my_reward < 86){$dynamic_loot = otherThanCoins(3,$x_cut,$x_game,1,$t_level);}
					else if ($my_reward < 90){$dynamic_loot = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator($x_cut));}
					else if ($my_reward < 92){$dynamic_loot = "JEWELRY:&nbsp;" . ucwords(jewelCreator($x_cut));}
					else {$dynamic_loot = makeMagicItem($t_level,3,0,$x_game,0,$x_cut); $my_list_of_wonders = $dynamic_loot . "^" . $lair_box . "^" . $hex_num_area . "___" . $my_list_of_wonders;}
						$treasure_item = $dynamic_loot;
				}
				else // if (($x_package == "Swords & Wizardry") || ($x_package == "Labyrinth Lord") || ($x_package == "OSRIC"))
				{
					if ($bags_of_coins > 0){$ghrz = 81;} else {$ghrz = 1;}
					$my_reward = mt_rand($ghrz,100);
					if ($my_reward < 81){$dynamic_loot = currencyBuilder($t_level,3,0,$x_cut,1,$x_game); $bags_of_coins = 1;}
					else if ($my_reward < 86){$dynamic_loot = otherThanCoins(3,$x_cut,$x_game,1,$t_level);}
					else if ($my_reward < 90){$dynamic_loot = "GEMS&nbsp;[" . mt_rand(1,3) . " each]:&nbsp;" . ucwords(gemCreator($x_cut));}
					else if ($my_reward < 92){$dynamic_loot = "JEWELRY:&nbsp;" . ucwords(jewelCreator($x_cut));}
					else
					{
						if ($x_whichmagic >= mt_rand(1,100))
						{
							$dynamic_loot = makeRPGmagic($x_game,0);
						}
						else
						{
							$dynamic_loot = makeMagicItem($treasure_level,$loot_size,0,$x_game,$x_extra,$x_cut);
						}
						$my_list_of_wonders = $dynamic_loot . "^" . $lair_box . "^" . $hex_num_area . "___" . $my_list_of_wonders;
					}
					$treasure_item = $dynamic_loot;
				}

				$thisone = str_replace(" ", "&nbsp;", $treasure_item);
				$filled = $filled . "" . $thisone . "" . $sepr;
				$loot_mash = $loot_mash - 1;

			endwhile;

		echo stripslashes($filled);
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////// MAKE THE CONTENTS FOR THIS FLOOR ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$random_room = $key;

	while ($key > 0) :

		$room = $room + 1; 
		$key = $key - 1;

		////////////////////////////////////// ATMOSPHERE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$feeling = "";

			if ($x_atmo > mt_rand(1,100)){$mood = mt_rand(1,49);} else {$mood = mt_rand(50,100);}
			$sounds = mt_rand(1,100);

			if ($no_moods == 1){$mood = mt_rand(1,74);}
			if ($no_sounds == 1){$sounds = 0;}

			if (($this_area_of_interest[1] == "U") || ( $pix == "cave")) /////
			{
				$mood = 0;
				$sounds = 0;
				$do_some_contents = 0;
				$do_some_weirds = 0;
				$do_some_traps = 0;
				$do_some_chest_traps = 0;
			} ////////////////////////////////////////////////////////////////

			if (( $this_area_of_interest[0] == "cave.png" || $this_area_of_interest[0] == "mine.png" ) && $this_area_of_interest[1] != "U")
			{
				$feeling = caveDescription();
				if ( mt_rand(1,100) > 60 ) // IS THERE STUFF ON THE FLOOR OF THE CAVE
				{
					$fill_cave_floor = mt_rand(1,7);
					$feeling = $feeling . " On the floor there is [";
					while ($fill_cave_floor > 0) :
						$fill_cave_floor = $fill_cave_floor - 1;
						$feeling = $feeling . fantasyGroundItem($x_game);
						if ( $fill_cave_floor > 0 ){ $feeling = $feeling . ", "; } else { $feeling = $feeling . "]."; }
					endwhile;
				}
			} 
			else if ($mood < 50)
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

			if ($x_atmo == 999){$feeling = "";} else if ($sounds > 90){$feeling = $feeling . ". You can make out " . soundWhereRoom() . " " . soundMakerRoom() . " sound coming from somewhere";}

			////////////////////////////////////// CONTENTS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			if ($do_some_contents > 0){ $furniture = furnishRoom($x_game,$x_cut,$x_level); } else { $furniture = array(); }

			if (( $this_area_of_interest[0] == "cave.png" || $this_area_of_interest[0] == "mine.png" ) && $this_area_of_interest[1] != "U")
			{
				echo "</font><hr color='#C0C0C0' size='8'><b>" . $room . "</b><font size='2'> - " . $feeling;
			}
			else if ($x_atmo == 999){ echo "</font><hr color='#C0C0C0' size='8'><b>" . $room . "</b><font size='2'> - " . $furniture[0]; }
			else { echo "</font><hr color='#C0C0C0' size='8'><b>" . $room . "</b><font size='2'> - " . $feeling . ". " . $furniture[0]; }

			if ($do_some_contents > 0)
			{
				if ($furniture[2] != "") // IS THERE ODDBALL STUFF IN/ON THE FURNITURE
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
			}

		////////////////////////////////////// SPECIAL ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		if ($do_some_weirds >= mt_rand(1,100))
		{
			echo "<hr align='center' size='1'>";
			echo "<b>SOMETHING UNUSUAL IN THE AREA...</b><br>";
			echo specialMakerRoom($x_cut,$random_room,$random_room,$x_game,$x_extra);
		}

		////////////////////////////////////// MONSTERS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$roll_for_enemy = $x_c_c;
		$max_of_monsters = $x_c_c_max;
		$min_of_monsters = $x_c_c_min;
		$cmd_villain = "WHERE id>0";
		$level_of_monster = 0;
		$how_many_monsters = 0;

		if (mt_rand(1,100) <= $x_c_c)
		{
			$roll_for_enemy = 100;

			// DETERMINE HOW MANY MONSTERS ARE IN THE ROOM //
			while ($max_of_monsters > 0) :
				$min_of_monsters = $min_of_monsters - 1;
				if ($min_of_monsters > 0){$roll_for_enemy = 100;} else if ($min_of_monsters == 0){$roll_for_enemy = $x_c_c - ceil($x_c_c*(0.01*$x_c_c_low));} else {$roll_for_enemy = $roll_for_enemy - ceil($x_c_c*(0.01*$x_c_c_low));}
				$max_of_monsters = $max_of_monsters - 1;
				if (mt_rand(1,100) <= $roll_for_enemy){ $how_many_monsters = $how_many_monsters + 1; }
			endwhile;

			if ($how_many_monsters < 1){$how_many_monsters = 1;}

			if ($how_many_monsters > 0){echo "<hr align='center' size='1'>";}

			while ($how_many_monsters > 0) :

				$cq_num = 0;
				$how_many_monsters = $how_many_monsters - 1;

				if (($tomb > 0) && (mt_rand(1,100) > 20))
				{
					$qry = "SELECT * FROM $table WHERE turn>0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
					$cq_res = wz_query( $connection, $qry ); /*qry_cfd*/
					$cq_num = wz_num_rows($cq_res);
					if ($cq_num == 0)
					{
						$qry = "SELECT * FROM monsters_rpgs WHERE $take AND turn>0 AND difficulty<=($x_level + $lvl_modifier)";
						$cq_res = wz_query( $connection, $qry ); /*qry_cfd*/
						$cq_num = wz_num_rows($cq_res);
					}
				}
				if ($cq_num == 0){$qry = "SELECT * FROM $table ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";}
					$res = wz_query( $connection, $qry ); /*qry_hxm15*/
					$ary = wz_fetch_assoc($res);

					$show_detail_monster_info = 1;

					if (($x_game == "Tunnels & Trolls 5th Edition") || ($x_game == "Tunnels & Trolls 7th Edition") || ($x_game == "Tunnels & Trolls Deluxe")){ if ($do_not_show_creatures == 1){$skip_the_num_appearing = 1;} $show_detail_monster_info = $x_describe; include("functions/stat_blocks.php"); $skip_the_num_appearing = 0;}
					else { $show_detail_monster_info = $x_describe; include("functions/stat_blocks.php"); }

					echo $monster_info . "<br>";

					if ($x_hit_dice == 0){$x_hit_dice = $tt_dice;}
					if ($do_not_show_creatures != 1){echo calculateLife($x_level,$x_characters,$ary[m_app_min],$ary[m_app_max],$ary[m_hp_min],$ary[m_hp_max],$ary[m_hp_mod],$x_game,$my_mr_is,$x_hit_dice,$tt_adds,$tt_vary,$how_many_monsters) . "<br>";}

					$cmd_villain = $cmd_villain . " AND id!= " . $ary[id];

					if ($ary[difficulty] > $level_of_monster){$level_of_monster = $ary[difficulty];}
					if ($x_rich > 0)
					{
						if ($ary[m_hoard] == 3){$xx_hord = 50;} else if ($ary[m_hoard] == 2){$xx_hord = 90;} else if ($ary[m_hoard] == 1){$xx_hord = 70;}
						if (($ary[m_hoard] > 0) && ($x_l_c > 0)){$level_of_monster = $xx_hord + $x_l_c;}
					}

			endwhile;
		}

		////////////////////////////////////// TRAPS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$roll_for_trap = $do_some_traps;
		$max_of_traps = $x_t_c_max;
		$min_of_traps = $x_t_c_min;

		if (mt_rand(1,100) <= $do_some_traps)
		{
			$roll_for_trap = 100;

			echo "<hr align='center' size='1'>";

			while ($max_of_traps > 0) :
			$this_trap = trapMaker($x_level,room,$x_game,$x_extra,$x_undead);
			if (mt_rand(1,100) <= $roll_for_trap){ echo $this_trap[0] . "<br>"; }
			$min_of_traps = $min_of_traps - 1;
				if ($min_of_traps > 0){$roll_for_trap = 100;}
				else if ($min_of_traps == 0){$roll_for_trap = $do_some_traps - ceil($do_some_traps*(0.01*$x_t_c_low));}
				else {$roll_for_trap = $roll_for_trap - ceil($do_some_traps*(0.01*$x_t_c_low));}

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
						$my_list_of_wonders = $my_prize . "^" . $room . "___" . $my_list_of_wonders;
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
						$my_list_of_wonders = $my_prize . "^" . $room . "___" . $my_list_of_wonders;
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

	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	else ///// POST APOCALYPTIC /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{
		///// PICK A NAME TO USE FOR LATER AREAS //////
		switch (mt_rand(0,5))
		{
			case 0:	$word = mutantName();					break;
			case 1:	$word = speciesName();					break;
			case 2:	$word = mutantName() . speciesName();	break;
			case 3:	$word = speciesName() . mutantName();	break;
			case 4:	$word = mutantName() . alienName();		break;
			case 5:	$word = speciesName() . alienName();	break;
		}

		$word = strtolower($word);
		$word = ucwords($word);

		if (substr($word, -1) == "s"){$possesive = $word . "`";} else {$possesive = $word . "`s";}

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		if ($this_area_of_interest[0] == "animal.png")
		{
			if ($this_area_of_interest[1] == "U") // UNDERWATER
			{
				$tomb = 0;		$scary = "";
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}

			if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
			$lair_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level AND m_lair>0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
			$lair_res = wz_query( $connection, $lair_qry ); /*lair_qry_hxm9*/
			$lair_num = wz_num_rows($lair_res);
			if ($lair_num == 0)
			{
				$lair_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND m_lair>0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
				$lair_res = wz_query( $connection, $lair_qry ); /*lair_qry_hxm10*/
				$lair_num = wz_num_rows($lair_res);
				if (($lair_num == 0) && ($this_area_of_interest[1] != "U"))
				{
					$lair_qry = "SELECT * FROM monsters_rpgs WHERE $take AND location LIKE '%DG%' AND m_lair>0 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
					$lair_res = wz_query( $connection, $lair_qry ); /*lair_qry_hxm11*/
				}
			}
			$lair_ary = wz_fetch_assoc($lair_res);
			$lair_owner = $lair_ary[id];

			$pix = "cave";
			$do_some_contents = 0;
			switch (mt_rand(0,3))
			{
				case 0:	$flur = "Cave of the " . $lair_ary[m_fort_name];	break;
				case 1:	$flur = "Den of the " . $lair_ary[m_fort_name];		break;
				case 2:	$flur = "Lair of the " . $lair_ary[m_fort_name];	break;
				case 3:	$flur = "Cavern of the " . $lair_ary[m_fort_name];	break;
			}

			$do_some_monsters = 1;
			$do_a_map = 1;
		}
		else if ($this_area_of_interest[0] == "pa_boat.png") /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		{
			switch (mt_rand(0,35))
			{
				case 0: $ship_type = "Aircraft Carrier"; break;
				case 1: $ship_type = "Ammunition Ship"; break;
				case 2: $ship_type = "Amphibious Assault Ship"; break;
				case 3: $ship_type = "Amphibious Transport Dock"; break;
				case 4: $ship_type = "Aviation Support Ship"; break;
				case 5: $ship_type = "Cable Repair Ship"; break;
				case 6: $ship_type = "Cargo Ship"; break;
				case 7: $ship_type = "Classic Frigate"; break;
				case 8: $ship_type = "Command Ship"; break;
				case 9: $ship_type = "Container Ship"; break;
				case 10: $ship_type = "Crane Ship"; break;
				case 11: $ship_type = "Cruiser"; break;
				case 12: $ship_type = "Destroyer"; break;
				case 13: $ship_type = "Dock Landing Ship"; break;
				case 14: $ship_type = "Dry Cargo Ship"; break;
				case 15: $ship_type = "Fast Combat Support"; break;
				case 16: $ship_type = "Fleet Ocean Tug"; break;
				case 17: $ship_type = "Frigate"; break;
				case 18: $ship_type = "Hospital Ship"; break;
				case 19: $ship_type = "Instrumentation Ship"; break;
				case 20: $ship_type = "Joint High Speed Vessel"; break;
				case 21: $ship_type = "Large Harbor Tug"; break;
				case 22: $ship_type = "Littoral Combat Ship"; break;
				case 23: $ship_type = "Maritime Prepositioning Ship"; break;
				case 24: $ship_type = "Mine Countermeasures Ship"; break;
				case 25: $ship_type = "Ocean Surveillance Ship"; break;
				case 26: $ship_type = "Oceanographic Research Ship"; break;
				case 27: $ship_type = "Patrol Boat"; break;
				case 28: $ship_type = "Replenishment Oiler"; break;
				case 29: $ship_type = "Salvage Ship"; break;
				case 30: $ship_type = "Self Defense Test Ship"; break;
				case 31: $ship_type = "Survey Ship"; break;
				case 32: $ship_type = "Technical Research Ship"; break;
				case 33: $ship_type = "Transport Oiler"; break;
				case 34: $ship_type = "Tugboat"; break;
				case 35: $ship_type = "Vehicle Cargo Ship"; break;
			}
			$flur = "A Sunken " . $ship_type;

			if ($x_terrain != 106){$this_spot_monsters = "(location LIKE '%FW%')";} else {$this_spot_monsters = $area_monsters;}
			$lair_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty>4 AND m_no_dungeon!=1 AND swimmer=1 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
			$lair_res = wz_query( $connection, $lair_qry ); /*lair_qry_hxm12*/
			$lair_ary = wz_fetch_assoc($lair_res);
			$lair_owner = $lair_ary[id];
				$do_some_monsters = 0;
				$do_a_map = 0;
		}
		else if ( ($this_area_of_interest[0] == "cave.png") || ($this_area_of_interest[0] == "skull.png"))
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			if ($this_area_of_interest[1] == "U") // UNDERWATER
			{
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}

			switch (mt_rand(0,5))
			{
				case 0:	$flur = "Cave of " . $word;		break;
				case 1:	$flur = "Grotto of " . $word;	break;
				case 2:	$flur = "Cavern of " . $word;	break;
				case 3:	$flur = $possesive . " Cave";	break;
				case 4:	$flur = $possesive . " Grotto";	break;
				case 5:	$flur = $possesive . " Cavern";	break;
			}
			$pix = "cave";
			$tomb = 0;
			$do_some_monsters = 1;
			$do_some_contents = 0;
			$do_a_map = 1;
		}
		else if ( ( ($this_area_of_interest[0] == "pa_camp.png") || ($this_area_of_interest[0] == "u_primitive.png") || ($this_area_of_interest[0] == "sf_primitive.png") ) && ( mt_rand(1,2) != 91 ) ) ///////////////////////////////////////////
		{
			$x_mappack = "Ruined City";
			$v_scare = "building";
			$v_loot = "CITY";
			$v_room = "BUILDING";
			$v_tech = 0;
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			if (mt_rand(1,2) == 1){$flur = " Village";} else {$flur = " Camp";}
			$pix = "village";  if ($x_terrain == 112){$pix = "cave"; $flur = " Dwelling";}
			$tomb = 0;
			$do_some_monsters = 1;
			$no_sounds = 1;
			$no_moods = 1;
			$do_a_map = 1;
			$this_spot_monsters = substr($area_monsters, 0, -1);
			$this_spot_monsters = $this_spot_monsters . ") AND m_fort=1 $underground AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			$limits_in_hex = "LIMIT 1";
			$fort_lived = 1;
		}
		else if ( ($this_area_of_interest[0] == "pa_camp.png") || ($this_area_of_interest[0] == "u_primitive.png") || ($this_area_of_interest[0] == "sf_primitive.png") ) ////////////////////////////////////////////////////////////////////////
		{
			$x_mappack = "Ruined City";
			$v_scare = "building";
			$v_loot = "CITY";
			$v_room = "BUILDING";
			$v_tech = 0;
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			switch (mt_rand(0,2))
			{
				case 0:	$fort_is = "Deserted ";		break;
				case 1:	$fort_is = "Abandoned ";	break;
				case 2:	$fort_is = "Forgotten ";	break;
			}
			$flur = $fort_is . " Camp";
			$pix = "village";  if ($x_terrain == 112){$pix = "cave"; $flur = $fort_is . " Dwelling";}
			$do_some_monsters = 1;
			$no_sounds = 1;
			$no_moods = 1;
			$do_a_map = 1;
			$this_spot_monsters = substr($area_monsters, 0, -1);
			$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
		}
		else if ($this_area_of_interest[0] == "totem.png") ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			switch (mt_rand(0,1))
			{
				case 0:	$flur = " Temple";	break;
				case 1:	$flur = " Shrine";	break;
			}
			$pix = "dungeon";
			$tomb = 0;
			$do_some_monsters = 1;
			$do_some_weirds = 0;
			$no_sounds = 1;
			$no_moods = 1;
			$do_a_map = 1;
			$this_spot_monsters = substr($area_monsters, 0, -1);
			$this_spot_monsters = $this_spot_monsters . ") AND m_fort=1 $underground AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			$limits_in_hex = "LIMIT 1";
			$fort_lived = 1;
		}
		else if ( $this_area_of_interest[0] == "mine.png" ) ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		{
			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			///// PICK A NAME TO USE FOR THE DESCRIPTION //////
			$mines = "";
			$mineral = "";
			switch (mt_rand(0,4))
			{
				case 0:	$mines = " Dangerous";	break;
				case 1:	$mines = " Ruined";		break;
				case 2:	$mines = " Forgotten";	break;
				case 3:	$mines = " Abandoned";	break;
				case 4:	$mines = " Deserted";	break;
			}
			switch (mt_rand(0,14))
			{
				case 0:	$mineral = " Silver";		break;
				case 1:	$mineral = " Gold";			break;
				case 2:	$mineral = " Diamond";		break;
				case 3:	$mineral = " Iron";			break;
				case 4:	$mineral = " Ore";			break;
				case 5:	$mineral = " Coal";			break;
				case 6:	$mineral = " Rock Salt";	break;
				case 7:	$mineral = " Gravel";		break;
				case 8:	$mineral = " Clay";			break;
				case 9:	$mineral = " Lead";			break;
				case 10:$mineral = " Nickel";		break;
				case 11:$mineral = " Uranium";		break;
				case 12:$mineral = " Zinc";			break;
				case 13:$mineral = " Cobalt";		break;
				case 14:$mineral = " Lead";			break;
			}
			switch (mt_rand(0,7))
			{
				case 0:	$flur = "The" . $mines . $mineral . " Excavation of " . $word;	break;
				case 1:	$flur = "The" . $mines . $mineral . " Mines of " . $word;		break;
				case 2:	$flur = "The" . $mines . $mineral . " Pit of " . $word;			break;
				case 3:	$flur = "The" . $mines . $mineral . " Quarry of " . $word;		break;
				case 4:	$flur = $possesive . $mines . $mineral . " Excavation";			break;
				case 5:	$flur = $possesive . $mines . $mineral . " Mines";				break;
				case 6:	$flur = $possesive . $mines . $mineral . " Pit";				break;
				case 7:	$flur = $possesive . $mines . $mineral . " Quarry";				break;
			}
			$pix = "cave";
			$tomb = 0;
			$do_some_monsters = 1;
			$do_some_contents = 0;
			$do_a_map = 1;
			$this_spot_monsters = substr($area_monsters, 0, -1);
			$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
		}
		else if ( ( $this_area_of_interest[0] == "pa_military.png") || ($this_area_of_interest[0] == "pa_ruins.png") || ($this_area_of_interest[0] == "sf_military.png") ) /////////////////////////////
		{
			if ($this_area_of_interest[1] != "U"){$floors_to_make = mt_rand(1,100); if ($floors_to_make > 85){$do_extra_floors = 2;}}
			$x_mappack = "Ruined City";
			$v_scare = "building";
			$v_loot = "CITY";
			$v_room = "BUILDING";
			$v_tech = 0;
			if ($this_area_of_interest[0] == "pa_ruins.png")
			{
				switch (mt_rand(0,4))
				{
					case 0:	$placet = "Ruins";			break;
					case 1:	$placet = "Ruined City";	break;
					case 2:	$placet = "Town Ruins";		break;
					case 3:	$placet = "City Ruins";		break;
					case 4:	$placet = "Ruined Town";	break;
				}
			}
			else
			{
				switch (mt_rand(0,4))
				{
					case 0:	$placet = "Military Base";			break;
					case 1:	$placet = "Army Base";				break;
					case 2:	$placet = "Navy Base";				break;
					case 3:	$placet = "Air Force Base";			break;
					case 4:	$placet = "Marine Base";			break;
				}
			}

			switch (mt_rand(0,9))
			{
				case 0:	$ruint = "Lost";		break;
				case 1:	$ruint = "Devastated";	break;
				case 2:	$ruint = "Ancient";		break;
				case 3:	$ruint = "Abandoned";	break;
				case 4:	$ruint = "Deserted";	break;
				case 5:	$ruint = "Wrecked";		break;
				case 6:	$ruint = "Forgotten";	break;
				case 7: $ruint = "Legendary";	break;
				case 8: $ruint = "Old";			break;
				case 9: $ruint = "Fabled";		break;
			}

			if ($this_area_of_interest[1] == "U") // UNDERWATER
			{
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}

			switch (mt_rand(0,1))
			{
				case 0:	$flur = "The " . $ruints . " " . $placet . " of " . $word;	break;
				case 1:	$flur = $possesive . " " . $ruint . " " . $placet;			break;
			}

			$pix = "ruins";
			$do_some_monsters = 1;
			$do_a_map = 1;
		}
		else if (($this_area_of_interest[0] == "pa_factory.png") || ($this_area_of_interest[0] == "atomic.png") || ($this_area_of_interest[0] == "research.png") || ($this_area_of_interest[0] == "computers.png") || ($this_area_of_interest[0] == "medical.png") || ($this_area_of_interest[0] == "pa_airport.png") || ($this_area_of_interest[0] == "pa_communicate.png") || ($this_area_of_interest[0] == "pa_communicate2.png") || ($this_area_of_interest[0] == "pa_power_plant.png") || ($this_area_of_interest[0] == "pa_prison.png") || ($this_area_of_interest[0] == "pa_vault.png") || ($this_area_of_interest[0] == "pa_science.png") || ($this_area_of_interest[0] == "pa_space_station.png")) ////////////////////////////////////////////////////////////////////////////////
		{
			$radio_station = 0;
			$x_mappack = "Building";
			$v_scare = "room";
			$v_loot = "BUILDING";
			$v_room = "ROOM";
			$v_tech = 0;
			switch (mt_rand(0,9))
			{
				case 0:	$ruint = "Lost";		break;
				case 1:	$ruint = "Ruined";		break;
				case 2:	$ruint = "Ancient";		break;
				case 3:	$ruint = "Abandoned";	break;
				case 4:	$ruint = "Deserted";	break;
				case 5:	$ruint = "Wrecked";		break;
				case 6:	$ruint = "Forgotten";	break;
				case 7: $ruint = "Legendary";	break;
				case 8: $ruint = "Old";			break;
				case 9: $ruint = "Fabled";		break;
			}

			if ($this_area_of_interest[0] == "pa_factory.png"){$placet = "Factory";}
			else if ($this_area_of_interest[0] == "pa_airport.png"){$placet = "Airport";}


			else if ($this_area_of_interest[0] == "atomic.png")
			{
				switch (mt_rand(0,2))
				{
					case 0:	$placet = "Atomic Research Station";	break;
					case 1:	$placet = "Atom Particle Lab";			break;
					case 2: $placet = "Atomic Weapons Lab";			break;
				}
			}
			else if ($this_area_of_interest[0] == "research.png")
			{
				switch (mt_rand(0,2))
				{
					case 0:	$placet = "Research Lab";		break;
					case 1:	$placet = "Research Center";	break;
					case 2: $placet = "Research Facility";	break;
				}
			}
			else if ($this_area_of_interest[0] == "computers.png")
			{
				switch (mt_rand(0,2))
				{
					case 0:	$placet = "Computer Lab";			break;
					case 1:	$placet = "Computer Manufacturer";	break;
					case 2: $placet = "Data Center";			break;
				}
			}
			else if ($this_area_of_interest[0] == "medical.png")
			{
				switch (mt_rand(0,2))
				{
					case 0:	$placet = "Hospital";			break;
					case 1:	$placet = "Medical Center";		break;
					case 2: $placet = "Veterinary Clinic";	break;
				}
			}
			else if ($this_area_of_interest[0] == "pa_communicate.png")
			{
				switch (mt_rand(0,5))
				{
					case 0:	$placet = "Comm Station";			break;
					case 1:	$placet = "Radar Station";			break;
					case 2: $placet = "S.E.T.I. Station";		break;
					case 3:	$placet = "Relay Station";			break;
					case 4: $placet = "Missile Command";		break;
					case 5:	$placet = "Surveillance Station";	break;
				}
			}
			else if ($this_area_of_interest[0] == "pa_communicate2.png")
			{
				switch (mt_rand(0,3))
				{
					case 0:	$placet = "W" . strtoupper(createRandomLetter(3)) . " Radio Station";	$radio_station = 1; break;
					case 1:	$placet = "Telephone Station";											break;
					case 2: $placet = "Cell Phone Station";											break;
					case 3:	$placet = "Television Station";											break;
				}
			}
			else if ($this_area_of_interest[0] == "pa_power_plant.png"){$placet = "Power Plant";}
			else if ($this_area_of_interest[0] == "pa_prison.png"){$placet = "Prison";}
			else if ($this_area_of_interest[0] == "pa_vault.png")
			{
				switch (mt_rand(0,2))
				{
					case 0:	$placet = "Vault";			break;
					case 1:	$placet = "Bomb Shelter";	break;
					case 2: $placet = "Bunker";			break;
				}
				if (mt_rand(1,2) == 1){ $sealed_up = 1; }
			}
			else if ($this_area_of_interest[0] == "pa_science.png"){$placet = "Laboratory";}
			else if ($this_area_of_interest[0] == "pa_space_station.png"){$placet = "Space Station";}

			if (mt_rand(1,3) == 1){$map_wide = 0; $map_high = 0;}
			$floors_to_make = mt_rand(1,100); if ($floors_to_make > 95){$do_extra_floors = 3;} else if ($floors_to_make > 85){$do_extra_floors = 2;}

			if (($this_area_of_interest[1] == "U") && ($sealed_up != 1)) // UNDERWATER
			{
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else if ($this_area_of_interest[1] == "U") // VAULTS MIGHT BE SEALED
			{
				$this_spot_monsters = "location LIKE '%DG%' AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}
			if ($radio_station == 1)
			{
				$flur = "The " . $ruint . " " . $placet;
			}
			else
			{
				switch (mt_rand(0,1))
				{
					case 0:	$flur = "The " . $ruint . " " . $placet . " of " . $word;	break;
					case 1: $flur = $possesive . " " . $ruint . " " . $placet;			break;
				}
			}
			$pix = "scifi-building";
			$hx_tl_px = "bw_";
			$do_some_monsters = 1;
			$do_some_vehicles = 0;
			$do_a_map = 1;
		}
		else if (($this_area_of_interest[0] == "power.png") || ($this_area_of_interest[0] == "pa_oil.png") || ($this_area_of_interest[0] == "crater.png")) /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		{
			switch (mt_rand(0,9))
			{
				case 0:	$ruint = "Lost";		break;
				case 1:	$ruint = "Ruined";		break;
				case 2:	$ruint = "Ancient";		break;
				case 3:	$ruint = "Abandoned";	break;
				case 4:	$ruint = "Deserted";	break;
				case 5:	$ruint = "Wrecked";		break;
				case 6:	$ruint = "Forgotten";	break;
				case 7: $ruint = "Legendary";	break;
				case 8: $ruint = "Old";			break;
				case 9: $ruint = "Fabled";		break;
			}

			$cratermnd = "";
			if ($this_area_of_interest[1] == "U"){ $cratermnd = "AND swimmer=1"; } // UNDERWATER

			if ($this_area_of_interest[0] == "pa_oil.png"){$placet = "Oil Rig";}
			else if ($this_area_of_interest[0] == "power.png"){$placet = "Power Station";}
			else {$placet = "Crater";}

			switch (mt_rand(0,1))
			{
				case 0:	$flur = "The " . $ruints . " " . $placet . " of " . $word;	break;
				case 1:	$flur = $possesive . " " . $ruint . " " . $placet;			break;
			}

			$lair_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $area_monsters AND difficulty>4 AND m_no_dungeon!=1 $cratermnd ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
			$lair_res = wz_query( $connection, $lair_qry ); /*lair_qry_hxm12*/
			$lair_ary = wz_fetch_assoc($lair_res);
			$lair_owner = $lair_ary[id];
				$do_some_monsters = 0;
				$do_a_map = 0;
		}
		else if ($this_area_of_interest[0] == "sf_ship_crash.png") ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		{
			if (mt_rand(1,2) == 1)
			{
				$map_wide = 0;		$map_high = 0;
				$floors_to_make = mt_rand(1,100); if ($floors_to_make > 90){$do_extra_floors = 6;} else if ($floors_to_make > 70){$do_extra_floors = 5;} else if ($floors_to_make > 40){$do_extra_floors = 4;} else {$do_extra_floors = 3;}
			}
			else
			{
				$floors_to_make = mt_rand(1,100); if ($floors_to_make > 95){$do_extra_floors = 3;} else if ($floors_to_make > 85){$do_extra_floors = 2;}
			}

			if (($this_area_of_interest[1] == "U") && (mt_rand(1,2) == 1)) // UNDERWATER
			{
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else if ($this_area_of_interest[1] == "U") // UNDERWATER BUT SEALED SHUT
			{
				$sealed_up = 1;
				$this_spot_monsters = "location LIKE '%DG%' AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}
			switch (mt_rand(0,2))
			{
				case 0:	$ruint = "An Ancient";		break;
				case 1: $ruint = "An Old";			break;
				case 2: $ruint = "An Odd";			break;
			}
			$flur = $ruint . " " . $word . " Spaceship";
			$pix = "scifi-ship";
			$hx_tl_px = "bw_";
			$x_mappack = "Spaceship";
			$v_scare = "room";
			$v_loot = "SPACESHIP";
			$v_room = "ROOM";
			$v_tech = 1;
			$do_some_monsters = 1;
			$do_some_vehicles = 0;
			$do_a_map = 1;
		}
		else if ($this_area_of_interest[0] == "sf_evil_fortress.png") //////////////////////////////////////////////////////////////////////////////////////////////
		{
			$x_mappack = "Building";
			$v_scare = "room";
			$v_loot = "BUILDING";
			$v_room = "ROOM";
			$v_tech = 0;
			if (mt_rand(1,2) == 1){ $pix = "scifi-building"; $hx_tl_px = "bw_"; } else{ $pix = "dungeon"; }
			$do_some_monsters = 1;
			$do_some_vehicles = 0;
			$do_a_map = 1;

			$floors_to_make = mt_rand(1,100); if ($floors_to_make > 95){$do_extra_floors = 3;} else if ($floors_to_make > 85){$do_extra_floors = 2;}
			if ($this_area_of_interest[1] == "U") // UNDERWATER
			{
				if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}
				$this_spot_monsters = $area_monsters . " AND m_no_dungeon!=1 AND swimmer=1";
				$test_u_qry = "SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level $limits_in_hex";
				$test_u_res = wz_query( $connection, $test_u_qry ); /*test_u_qry*/
				$test_u_num = wz_num_rows($test_u_res);
				if ($test_u_num > 0){} else {$this_spot_monsters = "m_no_dungeon!=1 AND swimmer=1 AND LOCATION LIKE '%FW%'";}
			}
			else
			{
				$this_spot_monsters = substr($area_monsters, 0, -1);
				$this_spot_monsters = $this_spot_monsters . " OR location LIKE '%DG%') AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
			}

			switch (mt_rand(0,7))
			{
				case 0:	$flur = "Castle of " . $word;		break;
				case 1:	$flur = "Fortress of " . $word;		break;
				case 2:	$flur = "Palace of " . $word;		break;
				case 3:	$flur = "Stronghold of " . $word;	break;
				case 4:	$flur = $possesive . " Castle";		break;
				case 5: $flur = $possesive . " Fortress";	break;
				case 6: $flur = $possesive . " Palace";		break;
				case 7: $flur = $possesive . " Stronghold";	break;
			}
		}

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		if ($do_some_monsters > 0)
		{
			$table = $hex_num_area . "creatures" . createRandomCode();
			if ($x_level > 0){$f_level = $x_level + $lvl_modifier;} else {$f_level = 100;}

			$qry_build = "CREATE TEMPORARY TABLE $table SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND difficulty<=$f_level AND id>0 $limits_in_hex";
			wz_query( $connection, $qry_build ); /*qry_build*/


			$dubchc = wz_query($connection, "SELECT * FROM $table");
			$dubchk = wz_num_rows($dubchc);
			if ($dubchk == 0)
			{
				$qry_build = "INSERT INTO $table SELECT * FROM monsters_rpgs WHERE $take AND $this_spot_monsters AND id>0 $limits_in_hex";
				wz_query( $connection, $qry_build ); /*qry_build*/
			}

			$stop_processing = 0;
			while ($stop_processing != 1) :
				$qry = "SELECT * FROM $table WHERE freq_code=2";
				$res = wz_query( $connection, $qry ); /*qry*/
				$num = wz_num_rows($res);
					wz_query($connection, "INSERT INTO $table SELECT * FROM $table WHERE freq_code=2");
					wz_query($connection, "UPDATE $table SET freq_code=(freq_code-1)");
				if ($num < 1){$stop_processing = 1;}
			endwhile;
		}

		// FORT NAMES
		if ( ($fort_lived > 0) && (($this_area_of_interest[0] == "totem.png") || ($this_area_of_interest[0] == "pa_camp.png") || ($this_area_of_interest[0] == "u_primitive.png") || ($this_area_of_interest[0] == "sf_primitive.png")) )
		{
			// GET A FORT NAME
			$frt_qry = "SELECT * FROM $table";
			$frt_res = wz_query( $connection, $frt_qry ); /*frt_qry*/
			$frt_ary = wz_fetch_assoc($frt_res);
			$flur = $frt_ary[m_fort_name] . $flur;
		}

		echo "<br><br><div style='page-break-after: always; height:1px;'>&nbsp;</div>";
?>
<table border="1" cellpadding="3" cellspacing="3" width="100%" bordercolorlight="#C0C0C0" bordercolordark="#C0C0C0">
	<tr>
		<td width="40" height="40" align="center"><img src="land/<?php echo $this_area_of_interest[0]; ?>"></td>
		<td height="40" bgcolor="#C0C0C0">
			<font size="5">&nbsp;<?php echo $hex_num_area; ?>&nbsp;-&nbsp;<?php echo $flur; ?>
				<?php if (($this_area_of_interest[1] == "U") || ($this_area_of_interest[0] == "pa_boat.png"))
						{
							$sink_depth = number_format(mt_rand(2,20)*100);
							if ($sealed_up == 1){echo "&nbsp;&nbsp;&nbsp;<i>(" . $sink_depth . " Feet Below The Surface And Sealed Air Tight)";}
							else {echo "&nbsp;&nbsp;&nbsp;<i>(" . $sink_depth . " Feet Below The Surface)";}
						}
				?>
			</font>
		</td>
	</tr>
</table><br>
<?php
		if ( $do_a_map > 0 )
		{
			$key = 0;
			$room = 0;
			$levs = 0;

			while ( $do_extra_floors > 0 ) :

				$table_wide = ($map_wide * 300) + 300;
				$table_high = ($map_high * 300) + 300;

				include("functions/map_draw_delves.php");

				$levs = $levs + 1;

				if (($do_extra_floors > 1) && ($floor_close_out != 1))
				{
					$no_way_out  = "AND wayout!=1";
					$floor_close_out = 1;
				}

				if ($floor_close_out == 1){echo "<font size='4'>Level " . $levs . "</font>";}

				echo "</p>";

				$do_extra_floors = $do_extra_floors - 1;

				if (($map_high == 0) && ($map_wide == 0) && (($levs == 2) || ($levs == 4) || ($levs == 6)))
				{
					echo "<div style='page-break-after: always; height:1px;'>&nbsp;</div>";
				}
				else if (($map_high == 1) && ($map_wide == 1) && ($floor_close_out == 1))
				{
					echo "<div style='page-break-after: always; height:1px;'>&nbsp;</div>";
				}

				if ( ( $this_area_of_interest[0] == "pa_military.png") || ($this_area_of_interest[0] == "pa_ruins.png") || ($this_area_of_interest[0] == "sf_military.png") )
				{
					$do_a_sewer_map = 1;
					$pix = "sewers";
					$do_some_monsters = 1;
					$do_a_map = 1;
					$no_sounds = 0;
					$no_moods = 0;
					$map_to_make_here = "normal_hex_map";
					$do_some_contents = $x_u_c;
					$do_some_traps = $x_t_c;
					$do_some_chest_traps = $x_rigged_chance;
					$do_some_weirds = $x_weird;
					$this_spot_monsters = "location LIKE '%DG%' AND m_no_dungeon!=1 AND location NOT LIKE '%FW%' AND location NOT LIKE '%SW%'";
				}

			endwhile;
		}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////// DOES THIS AREA HAVE A BIG BAD GUY ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ( ($this_area_of_interest[0] == "animal.png") || ($this_area_of_interest[0] == "pa_boat.png") || ($this_area_of_interest[0] == "power.png") || ($this_area_of_interest[0] == "pa_oil.png") || ($this_area_of_interest[0] == "crater.png") )
	{
		$no_crater_cash = 0;
		//echo "</font><hr color='#C0C0C0' size='4'>";

		$sepr = "&nbsp;&nbsp;&nbsp;&nbsp; ";
		$qry = "SELECT * FROM monsters_rpgs WHERE id=$lair_owner";
		$res = wz_query( $connection, $qry ); /*qry_hxmz*/
		$ary = wz_fetch_assoc($res);

		$show_detail_monster_info = $x_describe;
		include("functions/stat_blocks.php");

		if ($this_area_of_interest[0] == "pa_boat.png"){ echo "</font><font size='4'>This `" . $ship_type . "` rests " . $sink_depth . " feet below the surface. Lurking nearby the ship is...</font><font size='2'><br>"; $lair_box = "S"; }
		else if ($this_area_of_interest[0] == "pa_oil.png"){ echo "</font><font size='4'>Lurking nearby the oil rig is...</font><font size='2'><br>"; $lair_box = "R"; }
		else if ($this_area_of_interest[0] == "power.png"){ echo "</font><font size='4'>Lurking nearby the power station is...</font><font size='2'><br>"; $lair_box = "R"; }
		else if ($this_area_of_interest[0] == "crater.png"){ echo "</font><font size='4'>Lurking nearby the crater is...</font><font size='2'><br>"; $lair_box = "C"; }
		else {echo "</font><font size='4'>Somewhere in this lair is a...</font><font size='2'><br>"; $lair_box = "?";}

		echo $monster_info . "<br>";

		if ($this_area_of_interest[0] == "pa_boat.png"){ echo "...and inside the ship are some goods in a " . PAboxMakerRoom(0) . ": "; }
		else if ($this_area_of_interest[0] == "pa_oil.png"){ echo "...and near the oil rig are " . mt_rand(2,6) . " drums of oil and some goods in a " . PAboxMakerRoom(0) . ": "; }
		else if ($this_area_of_interest[0] == "power.png"){ echo "...and near the power station is " . mt_rand(2,6) . " large batteries and some goods in a " . PAboxMakerRoom(0) . ": "; }
		else if ($this_area_of_interest[0] == "crater.png")
		{
			switch (mt_rand(0,9))
			{
				case 0:	$bighole = "...and inside the crater are " . mt_rand(2,6) . " " . PAGemMaker($x_cut,$x_money);		$no_crater_cash = 1;	break;
				case 1:	$bighole = "...and that has an odd metal object inside the crater that seems to open: ";		break;
				case 2:	$bighole = "...and that has an ancient crashed airplane inside the crater that has some goods in a " . PAboxMakerRoom(0) . ": ";		break;
				case 3:	$bighole = "...and that has an ancient crashed jet inside the crater that has some goods in a " . PAboxMakerRoom(1) . ": ";		break;
				case 4:	$bighole = "...and that has an old crashed rocket inside the crater that has some goods in a " . PAboxMakerRoom(1) . ": ";		break;
				case 5:	$bighole = "...and that has an odd crashed spaceship inside the crater that has some goods in a " . PAboxMakerRoom(1) . ": ";		break;
				case 6:	$bighole = "...and inside the crater is a nuclear bomb that failed to detonate";		$no_crater_cash = 1;	break;
				case 7: $bighole = "...and inside the crater is a huge chunk of useless rock";		$no_crater_cash = 1;	break;
				case 8: $bighole = "...and inside the crater is a large meteor";		$no_crater_cash = 1;	break;
				case 9: $bighole = "...and inside the crater is the partial remains of a settlement";		$no_crater_cash = 1;	break;
			}
			echo  $bighole;
		}
		else if ($pix == "cave"){echo "...and that has some goods scattered around the cave, lost from past explorers: ";}
		else {echo "...and that has a nearby goods in a " . PAboxMakerRoom(0) . ": ";}

			$t_level = $ary[difficulty] + $lvl_modifier;
			$x_min = mt_rand(1,3);
			$x_max = mt_rand(3,(3+$t_level));

			$loot_mash = mt_rand($x_min,$x_max);
			if ($no_crater_cash == 1){$loot_mash = 0;}
			$filled = "";
			$bags_of_coins = 0;

			while ($loot_mash > 0) :

				if ($bags_of_coins > 0){$ghrz = 91;} else {$ghrz = 1;}
				$my_reward = mt_rand($ghrz,100);
				if ($my_reward < 91){$dynamic_loot = PAcurrencyBuilder($t_level,3,0,$x_cut,1,$x_money,$x_mappack);	$bags_of_coins = 1;}
				else
				{
					if ($x_low_tech >= mt_rand(1,100))
					{
						if ($x_game == "Metamorphosis Alpha"){$dynamic_loot = makeMAItem($t_level,3,$x_cond);}
						else if ($x_game == "Gamma World"){$dynamic_loot = makeGWItem($t_level,3,$x_cond);}
						else if ($x_game != "Broken Urthe"){$dynamic_loot = makePAItem($t_level,3,$x_cond);}
						else {$dynamic_loot = makeBUItem($t_level,3,$x_cond);}
					}
					else {$dynamic_loot  = ucfirst(PAmakeNormalItem(1,1,$x_money,0,$x_game));}
					$my_list_of_wonders = $dynamic_loot . "^" . $lair_box . "^" . $hex_num_area . "___" . $my_list_of_wonders;
				}
				$treasure_item = $dynamic_loot;

				$thisone = str_replace(" ", "&nbsp;", $treasure_item);
				$filled = $filled . "" . $thisone . "" . $sepr;
				$loot_mash = $loot_mash - 1;

			endwhile;

		echo stripslashes($filled);
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////// MAKE THE CONTENTS FOR THIS FLOOR ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$random_room = $key;

	while ($key > 0) :

		$room = $room + 1; 
		$key = $key - 1;

		////////////////////////////////////// ATMOSPHERE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$feeling = "";
			$decoration = "";

			if ($x_atmo > mt_rand(1,100)){$mood = mt_rand(1,49);} else {$mood = mt_rand(50,100);}
			$sounds = mt_rand(1,100);

			if ($no_moods == 1){$mood = mt_rand(1,74);}
			if ($no_sounds == 1){$sounds = 0;}

			if ((($this_area_of_interest[1] == "U") && ($sealed_up != 1)) || ( $pix == "cave")) /////
			{
				$mood = 0;
				$do_some_contents = 0;
				$do_some_weirds = 0;
				$do_some_traps = 0;
				$do_some_chest_traps = 0;
			} ////////////////////////////////////////////////////////////////

			if (( $this_area_of_interest[0] == "cave.png" || $this_area_of_interest[0] == "mine.png" ) && $this_area_of_interest[1] != "U")
			{
				$mood_atmo = caveDescription();
				if ( mt_rand(1,100) > 60 ) // IS THERE STUFF ON THE FLOOR OF THE CAVE
				{
					$fill_cave_floor = mt_rand(1,7);
					$mood_atmo = $mood_atmo . " On the floor there is [";
					while ($fill_cave_floor > 0) :
						$fill_cave_floor = $fill_cave_floor - 1;
						$mood_atmo = $mood_atmo . fantasyGroundItem($x_game);
						if ( $fill_cave_floor > 0 ){ $mood_atmo = $mood_atmo . ", "; } else { $mood_atmo = $mood_atmo . "]."; }
					endwhile;
				}
			}
			else if ($mood == 0)
			{
				switch (mt_rand(0,4))
				{
					case 0:	$mood_atmo = "The area seems normal for this type of place";						break;
					case 1:	$mood_atmo = "The area appears similar to the rest of the place";					break;
					case 2:	$mood_atmo = "The area looks average compared with other sections of this place";	break;
					case 3:	$mood_atmo = "The area is pretty ordinary at first glance";					break;
					case 4:	$mood_atmo = "The area seems plain when you first look upon it";					break;
				}
			}
			else
			{
				$mood_atmo = mapMood($x_mappack,0);
				if ( ($this_area_of_interest[0] == "pa_camp.png") || ($this_area_of_interest[0] == "u_primitive.png") || ($this_area_of_interest[0] == "sf_primitive.png") )
				{
					$mood_atmo = str_replace("city", "camp", $mood_atmo);
				}
			}

			$max_of_decos = $x_u_c_max;
			$min_of_decos = $x_u_c_min;
			$how_many_deco = 0;
			$decoration = "";
			$hiding_places = "START";

			if (mt_rand(1,100) <= $do_some_contents)
			{
				$roll_for_deco = 100;

				while ($max_of_decos > 0) :
				$items_deco = PAstuffMakerRoom($how_many_deco,$x_money,$v_scare,$x_mappack,$x_game,$x_cut);
				if (mt_rand(1,100) <= $roll_for_deco)
				{
					if ($items_deco[2] > 0){$hiding_places = $hiding_places . "^" . $items_deco[0] . "_" . $items_deco[1] . "_" . $items_deco[2] . "_" . $items_deco[3];}
					$decoration = $decoration . "" . $items_deco[4];
					$how_many_deco = 1;
				}
				$min_of_decos = $min_of_decos - 1;
				if ($min_of_decos > 0){$roll_for_deco = 100;} else if ($min_of_decos == 0){$roll_for_deco = $x_u_c - ceil($x_u_c*(0.01*$x_u_c_low));} else {$roll_for_deco = $roll_for_deco - ceil($x_u_c*(0.01*$x_u_c_low));}
				$max_of_decos = $max_of_decos - 1;
				endwhile;
			}

			if (( $this_area_of_interest[0] == "cave.png" || $this_area_of_interest[0] == "mine.png" ) && $this_area_of_interest[1] != "U")
			{
				echo "</font><hr color='#C0C0C0' size='8'><b>" . $room . "</b><font size='2'> - " . $feeling;
			}
			else if ($x_atmo == 999)
			{
				echo "</font><hr color='#C0C0C0' size='8'><b>" . $room . "</b><font size='2'> - ";

				if ($decoration == "")
				{
					echo "Empty of mundane items.";
				}
				else
				{
					$decoration = str_replace(". Throughout the building is...&nbsp;", "", $decoration);
					$decoration = str_replace(". Throughout the room is...&nbsp;", "", $decoration);
					echo "This area contains..." . $decoration . ".";
				}
			}
			else { echo "</font><hr color='#C0C0C0' size='8'><b>" . $room . "</b><font size='2'> - " . $mood_atmo . "" . $decoration . "."; }

		////////////////////////////////////// ROBOTS OR VEHICLES /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if ($do_some_vehicles > 0)
		{
			if ($x_fveh >= mt_rand(1,100))
			{
				echo "<hr align='center' size='1'>";
				echo "<b>STRANDED VEHICLE "; if ($pix == "cave"){ echo "IN THE CAVE"; } else { echo "NEXT TO THE BUILDING";} echo "...</b><br>";
				echo VehicleRobotMaker($x_game,1,$x_level);
			}
		}
		if ($do_some_robots > 0)
		{
			if ($x_frob >= mt_rand(1,100))
			{
				echo "<hr align='center' size='1'>";

				if ($x_mappack == "Ruined City")
				{
					if (mt_rand(1,2) == 1){echo "<b>STRANDED ROBOT INSIDE THE BUILDING...</b><br>";} else {echo "<b>STRANDED ROBOT NEXT TO THE BUILDING...</b><br>";}
				}
				else if ($pix == "cave")
				{
					echo "<b>DERELICT ROBOT IN THE CAVE...</b><br>";
				}
				else
				{
					echo "<b>DERELICT ROBOT IN THE ROOM...</b><br>";
				}

				echo VehicleRobotMaker($x_game,0,$x_level);
			}
		}

		////////////////////////////////////// MONSTERS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$roll_for_enemy = $x_c_c;
		$max_of_monsters = $x_c_c_max;
		$min_of_monsters = $x_c_c_min;
		$cmd_villain = "WHERE id>0";
		$level_of_monster = 0;
		$how_many_monsters = 0;

		if (mt_rand(1,100) <= $x_c_c)
		{
			$roll_for_enemy = 100;

			// DETERMINE HOW MANY MONSTERS ARE IN THE ROOM //
			while ($max_of_monsters > 0) :
				$min_of_monsters = $min_of_monsters - 1;
				if ($min_of_monsters > 0){$roll_for_enemy = 100;} else if ($min_of_monsters == 0){$roll_for_enemy = $x_c_c - ceil($x_c_c*(0.01*$x_c_c_low));} else {$roll_for_enemy = $roll_for_enemy - ceil($x_c_c*(0.01*$x_c_c_low));}
				$max_of_monsters = $max_of_monsters - 1;
				if (mt_rand(1,100) <= $roll_for_enemy){ $how_many_monsters = $how_many_monsters + 1; }
			endwhile;

			if ($how_many_monsters > 0){echo "<hr align='center' size='1'>";}

			while ($how_many_monsters > 0) :

				$how_many_monsters = $how_many_monsters - 1;

				$mqry = "SELECT * FROM $table $cmd_villain $cmd_enemy ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
				$mres = wz_query( $connection, $mqry ); /*mqry4*/
				$ary = wz_fetch_assoc($mres);


				$show_detail_monster_info = $x_describe;
				include("functions/stat_blocks.php");

				echo $monster_info . "<br>";

				if ($x_game == "Mutant Future"){ $x_might1=$ary[m_hp_min]; $x_might2=$ary[m_hp_max]; }

				echo PAcalculateLife($x_level,$x_characters,$x_game,$ary[hd],$ary[difficulty],$x_might1,$x_might2,$v_scare,$how_many_monsters) . "<br>";

				$cmd_villain = $cmd_villain . " AND id!=" . $ary[id];

				if ($ary[difficulty] > $level_of_monster){$level_of_monster = $ary[difficulty];}

			endwhile;
		}

		////////////////////////////////////// TRAPS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$roll_for_trap = $do_some_traps;
		$max_of_traps = $x_t_c_max;
		$min_of_traps = $x_t_c_min;

		if (mt_rand(1,100) <= $do_some_traps)
		{
			$roll_for_trap = 100;

			echo "<hr align='center' size='1'>";

			while ($max_of_traps > 0) :
			$this_trap = PAtrapMaker($x_level,room,$x_game,$x_mutants,$x_might1,$x_might2,$v_tech,$v_scare);
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

		$hiding_places = str_replace("START^", "", $hiding_places);
		$hiding_places = str_replace("START", "", $hiding_places);
		$hiding_spots = explode("^", $hiding_places);
		$hiding_length = strlen($hiding_places);
		$hiding = count($hiding_spots);
		$hide_it = 0;
		$sayit = 0;
		$bags_of_coins = 0;
		$sack_of_coins = 0;

		if (mt_rand(1,100) > 70){$tbox = "lying about";} else {$tbox = "in a " . PAboxMakerRoom($v_tech);}

		$treasure_chest = "<b>THESE SPECIAL ITEMS ARE LOCATED:</b> " . $tbox . ".<br>";

		if ($level_of_monster > 0){$treasure_level = $level_of_monster;} else if ($x_level > 0){$treasure_level = $x_level;} else {$treasure_level = mt_rand(1,20);}

			if ($do_some_chest_traps >= mt_rand(1,100))
			{
				$picked_trap = PAtrapMaker($treasure_level,box,$x_game,$x_mutants,$x_might1,$x_might2,$v_tech,$v_scare);
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
						if ($chesty[2] > 0)
						{
							$my_box = explode(" [", $chesty[0]);

							if (($chesty[3] > 0) && ($do_some_chest_traps >= mt_rand(1,100)))
							{
								$picked_trap = PAtrapMaker($treasure_level,box,$x_game,$x_mutants,$x_might1,$x_might2,$v_tech,$v_scare);
								$trap_zap = "-&nbsp;TRAPPED:&nbsp;" . $picked_trap[0];
							} else {$trap_zap = "";}
							$chest = "&nbsp;(<i> Located " . $chesty[1] . " the " . $my_box[0] . "&nbsp;" . $trap_zap . "</i>)";
							$secret_box = $chest;
							$loot_size = $chesty[2];
							$secret_size = $chesty[2];
						}
					}
					if (mt_rand(1,100) <= $roll_for_loot){
						if ($bags_of_coins > 0){$ghrz = 91;} else {$ghrz = 1;}
						$my_reward = mt_rand($ghrz,100);
						if ($my_reward < 91){$my_prize = PAcurrencyBuilder($treasure_level,$loot_size,0,$x_cut,1,$x_money,$x_mappack);	$bags_of_coins = 1;}
						else if ($x_low_tech >= mt_rand(1,100))
						{
							if ($x_game == "Metamorphosis Alpha"){$my_prize = makeMAItem($treasure_level,loot_size);}
							else if ($x_game == "Gamma World"){$my_prize = makeGWItem($treasure_level,loot_size);}
							else if ($x_game != "Broken Urthe"){$my_prize = makePAItem($treasure_level,$loot_size,0);}
							else {$my_prize = makeBUItem($treasure_level,$loot_size,0);}
							$my_list_of_wonders = $my_prize . "^" . $room . "^" . $hex_num_area . "___" . $my_list_of_wonders;
						}
						else {$my_prize = ucfirst(PAmakeNormalItem(1,1,$x_money,$v_tech,$x_game));}
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
						if ($my_reward < 91){$my_prize = PAcurrencyBuilder($treasure_level,$loot_size,1,$x_cut,1,$x_money,$x_mappack);	$sack_of_coins = 1;}
						else if ($x_low_tech >= mt_rand(1,100))
						{
							if ($x_game != "Broken Urthe"){$my_prize = makePAItem($treasure_level,$loot_size,0);}
							else {$my_prize = makeBUItem($treasure_level,$loot_size,0);}
							$my_list_of_wonders = $my_prize . "^" . $room . "^" . $hex_num_area . "___" . $my_list_of_wonders;
						}
						else {$my_prize = ucfirst(PAmakeNormalItem(1,1,$x_money,$v_tech,$x_game));}
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
	}
endwhile;




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




	$my_list_of_wonders = substr($my_list_of_wonders, 0, -3);
	$my_list_of_wonders = str_replace("<u>", "", $my_list_of_wonders);
	$my_list_of_wonders = str_replace("</u>", "", $my_list_of_wonders);
	$all_my_wonders = explode("___", $my_list_of_wonders);
	sort($all_my_wonders);
	$count_wonders = count($all_my_wonders);

	if (strlen($my_list_of_wonders) > 5)
	{
		echo "<br><br><div style='page-break-after: always; height:1px;'>&nbsp;</div>";
		?>
			<table border="1" cellpadding="3" cellspacing="3" width="100%" bordercolorlight="#C0C0C0" bordercolordark="#C0C0C0">
				<tr>
				<?php if ($genre != "Fantasy"){ ?>
					<td width="40" height="40" align="center"><img src="land/tech.png"></td>
					<td height="40" bgcolor="#C0C0C0"><font size="5">&nbsp;&nbsp;Artifacts Found In These Areas</font></td>
				<?php } else { ?>
					<td width="40" height="40" align="center"><img src="land/magic.png"></td>
					<td height="40" bgcolor="#C0C0C0"><font size="5">&nbsp;&nbsp;Magic Items Found In These Areas</font></td>
				<?php } ?>
				</tr>
			</table><br>
		<?php
		$counts_wonder = 0;
		echo "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
		echo "<tr><td width='50' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;ITEM&nbsp;</font></td>";
		echo "<td align='center' width='50' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;AREA&nbsp;</font></td>";
		echo "<td align='center' width='50' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>&nbsp;ROOM&nbsp;</font></td>";
		echo "<td style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>DESCRIPTION</font></td></tr>";

	while ($count_wonders > 0) :
		$wonderful = $all_my_wonders[$counts_wonder];
		$wonder = explode("^", $wonderful);
		$counts_wonder = $counts_wonder + 1;
		echo "<tr><td width='50' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $counts_wonder . "</font></td>";
		echo "<td width='50' align='center' NOWRAP style='border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-width: 1px'><font size='2'>" . $wonder[2] . "</font></td>";
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