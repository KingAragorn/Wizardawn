<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_supplements.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Fantasy";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' target='_blank' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Fantasy Names</p>";
	echo "<p style='text-align: justify;'>Here you can generate a quick set of some random names to use in your fantasy role-playing game. Simply pick which types of names you want to generate where you would then get 10 of each.";
	?>
		<br>
		<div id="div_tabex">
			<div class="row">
				<span class="cell"><input type="checkbox" name="n_demon" value="1">Demon</span>
				<span class="cell"><input type="checkbox" name="n_dragon" value="1">Dragon</span>
				<span class="cell"><input type="checkbox" name="n_dwarf" value="1">Dwarf</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="n_elf_f" value="1">Elf - Female</span>
				<span class="cell"><input type="checkbox" name="n_elf_m" value="1">Elf - Male</span>
				<span class="cell"><input type="checkbox" name="n_delf_f" value="1">Elf, Dark - Female</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="n_delf_m" value="1">Elf, Dark - Male</span>
				<span class="cell"><input type="checkbox" name="n_fairy" value="1">Fairy</span>
				<span class="cell"><input type="checkbox" name="n_catf" value="1">Feline Humanoid - Female</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="n_catm" value="1">Feline Humanoid - Male</span>
				<span class="cell"><input type="checkbox" name="n_female" value="1">Generic - Female</span>
				<span class="cell"><input type="checkbox" name="n_male" value="1">Generic - Male</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="n_generic" value="1">Generic</span>
				<span class="cell"><input type="checkbox" name="n_gnome" value="1">Gnome</span>
				<span class="cell"><input type="checkbox" name="n_goblin" value="1">Goblin</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="n_holm_f" value="1">Holmesian - Female *</span>
				<span class="cell"><input type="checkbox" name="n_holm_m" value="1">Holmesian - Male *</span>
				<span class="cell"><input type="checkbox" name="n_human_f" value="1">Human - Female</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="n_human_m" value="1">Human - Male</span>
				<span class="cell"><input type="checkbox" name="n_imp" value="1">Imp</span>
				<span class="cell"><input type="checkbox" name="n_lizardman" value="1">Lizardman</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="n_orc" value="1">Orc</span>
				<span class="cell"><input type="checkbox" name="n_ratman" value="1">Ratman</span>
				<span class="cell"><input type="checkbox" name="n_spell" value="1">Spell</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="n_tavern" value="1">Tavern</span>
				<span class="cell"><input type="checkbox" name="n_village" value="1">Village</span>
				<span class="cell"><input type="checkbox" name="n_wizard" value="1">Wizard</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="n_wolf" value="1">Wolfen Humanoid</span>
				<span class="cell">&nbsp;</span>
				<span class="cell">&nbsp;</span>
			</div>
		</div>
		<br>Hyborian Names<br><br>
		<div id="div_tabex">
			<div class="row">
				<span class="cell"><input type="checkbox" name="n_hb_aqm" value="1">Aquilonian - Male</span>
				<span class="cell"><input type="checkbox" name="n_hb_cim" value="1">Cimmerian - Male</span>
				<span class="cell"><input type="checkbox" name="n_hb_stm" value="1">Stygian - Male</span>
			</div>
			<div class="row">
				<span class="cell"><input type="checkbox" name="n_hb_aqf" value="1">Aquilonian - Female</span>
				<span class="cell"><input type="checkbox" name="n_hb_cif" value="1">Cimmerian - Female</span>
				<span class="cell"><input type="checkbox" name="n_hb_stf" value="1">Stygian - Female</span>
			</div>
		</div>
		<br>
		<div id="div_table">
			<div class="row">
				<span class="cull">Amount of Names to Make for Each Category:</span>
				<span class="cell">
					<select id="DropOption" name="amount">
						<option>10</option><?php $runner=100; $running=0; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?></select>
					</select>
				</span>
			</div>
		</div>
		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create">

		</p></form>

		<p style='text-align: justify;'>* Thanks to <a target="_blank" href="http://zenopusarchives.blogspot.com/">Zenopus</a> for assembling the random name generator based off of names from the John Eric Holmes rules of the most popular fantasy role-playing game, and adventures for such game written by John Eric Holmes and Mike Carr.</p>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

$listing = "";
$amount = $_POST['amount'];

$n_demon = $_POST['n_demon'];
	if ($n_demon > 0){$listing = $listing . "<p><u><font size='4'>Demon Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . demonName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_dragon = $_POST['n_dragon'];
	if ($n_dragon > 0){$listing = $listing . "<p><u><font size='4'>Dragon Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . dragonName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_dwarf = $_POST['n_dwarf'];
	if ($n_dwarf > 0){$listing = $listing . "<p><u><font size='4'>Dwarf Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . dwarfName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_elf_f = $_POST['n_elf_f'];
	if ($n_elf_f > 0)
	{
		$listing = $listing . "<p><u><font size='4'>Elf Female Names</font></u>"; while ($i < $amount):
			switch (mt_rand(0,1))
			{
				case 0:	$name_pick = elfgirlName();	break;
				case 1:	$name_pick = elfName();	break;
			}
		$listing = $listing . "<br>&nbsp;-&nbsp;" . $name_pick; $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";
	}
$n_elf_m = $_POST['n_elf_m'];
	if ($n_elf_m > 0)
	{
		$listing = $listing . "<p><u><font size='4'>Elf Male Names</font></u>"; while ($i < $amount):
			switch (mt_rand(0,1))
			{
				case 0:	$name_pick = elfboyName();	break;
				case 1:	$name_pick = elfName();	break;
			}
		$listing = $listing . "<br>&nbsp;-&nbsp;" . $name_pick; $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";
	}
$n_delf_f = $_POST['n_delf_f'];
	if ($n_delf_f > 0)
	{
		$listing = $listing . "<p><u><font size='4'>Dark Elf Female Names</font></u>"; while ($i < $amount):
			$name_pick = DarkElfName(female);
		$listing = $listing . "<br>&nbsp;-&nbsp;" . $name_pick; $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";
	}
$n_delf_m = $_POST['n_delf_m'];
	if ($n_delf_m > 0)
	{
		$listing = $listing . "<p><u><font size='4'>Dark Elf Male Names</font></u>"; while ($i < $amount):
			$name_pick = DarkElfName(male);
		$listing = $listing . "<br>&nbsp;-&nbsp;" . $name_pick; $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";
	}
$n_fairy = $_POST['n_fairy'];
	if ($n_fairy > 0)
	{
		$listing = $listing . "<p><u><font size='4'>Fairy Names</font></u>"; while ($i < $amount):
			switch (mt_rand(0,1))
			{
				case 0:	$name_pick = elfboyName();	break;
				case 1:	$name_pick = elfgirlName();	break;
			}
		$listing = $listing . "<br>&nbsp;-&nbsp;" . $name_pick; $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";
	}
$n_catf = $_POST['n_catf'];
	if ($n_catf > 0)
	{
		$listing = $listing . "<p><u><font size='4'>Feline Humanoid - Female Names</font></u>"; while ($i < $amount):
			switch (mt_rand(0,1))
			{
				case 0:	$name_pick = catName(female);	break;
				case 1:	$name_pick = catName('');			break;
			}
		$listing = $listing . "<br>&nbsp;-&nbsp;" . $name_pick; $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";
	}
$n_catm = $_POST['n_catm'];
	if ($n_catm > 0)
	{
		$listing = $listing . "<p><u><font size='4'>Feline Humanoid - Male Names</font></u>"; while ($i < $amount):
			switch (mt_rand(0,1))
			{
				case 0:	$name_pick = catName(male);	break;
				case 1:	$name_pick = catName('');		break;
			}
		$listing = $listing . "<br>&nbsp;-&nbsp;" . $name_pick; $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";
	}
$n_generic = $_POST['n_generic'];
	if ($n_generic > 0)
	{
		$listing = $listing . "<p><u><font size='4'>Generic Names</font></u>"; while ($i < $amount):
			switch (mt_rand(0,1))
			{
				case 0:	$name_pick = genericName();	break;
				case 1:	$name_pick = authorName();	break;
			}
		$listing = $listing . "<br>&nbsp;-&nbsp;" . $name_pick; $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";
	}
$n_female = $_POST['n_female'];
	if ($n_female > 0){$listing = $listing . "<p><u><font size='4'>Generic Female Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . FemaleName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_male = $_POST['n_male'];
	if ($n_male > 0){$listing = $listing . "<p><u><font size='4'>Generic Male Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . MaleName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_gnome = $_POST['n_gnome'];
	if ($n_gnome > 0){$listing = $listing . "<p><u><font size='4'>Gnome Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . gnomeName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_goblin = $_POST['n_goblin'];
	if ($n_goblin > 0){$listing = $listing . "<p><u><font size='4'>Goblin Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . goblinName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_holm_f = $_POST['n_holm_f'];
	if ($n_holm_f > 0){$listing = $listing . "<p><u><font size='4'>Holmesian Female Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . holmesName(female,0); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_holm_m = $_POST['n_holm_m'];
	if ($n_holm_m > 0){$listing = $listing . "<p><u><font size='4'>Holmesian Male Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . holmesName(male,0); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_human_f = $_POST['n_human_f'];
	if ($n_human_f > 0){$listing = $listing . "<p><u><font size='4'>Human Female Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . humanFemaleName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_human_m = $_POST['n_human_m'];
	if ($n_human_m > 0){$listing = $listing . "<p><u><font size='4'>Human Male Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . humanMaleName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_imp = $_POST['n_imp'];
	if ($n_imp > 0){$listing = $listing . "<p><u><font size='4'>Imp Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . impName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_lizardman = $_POST['n_lizardman'];
	if ($n_lizardman > 0){$listing = $listing . "<p><u><font size='4'>Lizardman Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . lizardmanName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_orc = $_POST['n_orc'];
	if ($n_orc > 0){$listing = $listing . "<p><u><font size='4'>Orc Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . orcName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_ratman = $_POST['n_ratman'];
	if ($n_ratman > 0){$listing = $listing . "<p><u><font size='4'>Ratman Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . ratmanName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_spell = $_POST['n_spell'];
	if ($n_spell > 0){$listing = $listing . "<p><u><font size='4'>Spell Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . researchSpell(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_tavern = $_POST['n_tavern'];
	if ($n_tavern > 0){$listing = $listing . "<p><u><font size='4'>Tavern Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . tavernName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_village = $_POST['n_village'];
	if ($n_village > 0){$listing = $listing . "<p><u><font size='4'>Village Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . villageName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_wizard = $_POST['n_wizard'];
	if ($n_wizard > 0){$listing = $listing . "<p><u><font size='4'>Wizard Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . mageName(); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_wolf = $_POST['n_wolf'];
	if ($n_wolf > 0){$listing = $listing . "<p><u><font size='4'>Wolfen Humanoid Names</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . wolfName(''); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_hb_aqm = $_POST['n_hb_aqm'];
	if ($n_hb_aqm > 0){$listing = $listing . "<p><u><font size='4'>Hyborian Names - Aquilonian - Male</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . ConanName(Aquilonian,male); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_hb_aqf = $_POST['n_hb_aqf'];
	if ($n_hb_aqf > 0){$listing = $listing . "<p><u><font size='4'>Hyborian Names - Aquilonian - Female</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . ConanName(Aquilonian,female); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_hb_cim = $_POST['n_hb_cim'];
	if ($n_hb_cim > 0){$listing = $listing . "<p><u><font size='4'>Hyborian Names - Cimmerian - Male</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . ConanName(Cimmerian,male); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_hb_cif = $_POST['n_hb_cif'];
	if ($n_hb_cif > 0){$listing = $listing . "<p><u><font size='4'>Hyborian Names - Cimmerian - Female</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . ConanName(Cimmerian,female); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_hb_stm = $_POST['n_hb_stm'];
	if ($n_hb_stm > 0){$listing = $listing . "<p><u><font size='4'>Hyborian Names - Stygian - Male</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . ConanName(Stygian,male); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}
$n_hb_stf = $_POST['n_hb_stf'];
	if ($n_hb_stf > 0){$listing = $listing . "<p><u><font size='4'>Hyborian Names - Stygian - Female</font></u>"; while ($i < $amount): $listing = $listing . "<br>&nbsp;-&nbsp;" . ConanName(Stygian,female); $i=$i+1; endwhile; $i=0; $listing = $listing . "</p>";}

?>
<div align="center">
<table border="0" cellpadding="0" style="border-collapse: collapse" width="700">
	<tr>
		<td>
			<p style="margin-top: 0; margin-bottom: 0" align="center"><img border="0" src="pics_tools/tools_random_names.jpg"></p><hr><?php echo $listing;	?>
		</td>
	</tr>
</table>
</div><?php

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>