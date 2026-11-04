<?php

include("db.php");

$run_program = 0; if ( isset( $_GET["run"] ) ){ $run_program = $_GET["run"]; }

$for = "AND mn_members LIKE '%x" . $_SESSION["SESSION_SECTION"] . "x%'";

$menu_on_left = "menus/menu_data.php";
$menu_on_right = "menus/menu_generators.php";
$menu_in_center = str_replace($webfld, "", $_SERVER["SCRIPT_FILENAME"]);
$my_form_name = $menu_in_center;

if (wz_num_rows(wz_query($connection, "SELECT * FROM menus WHERE mn_link='$menu_in_center' $for")) == 0){ $game_defaults = "Data";	include("game_defaults.php"); }

if ($run_program != 1){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($menu_section == 3)
{
	echo "<form style='margin-bottom:0; margin-top:0;' method='POST' target='_blank' action='" . $my_form_name . "?run=1'>";
	echo "<input type='hidden' name='program_user' value='1'>";

	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Random Listings</p>";
	echo "<p style='text-align: justify;'>"; ?>

		Here you can generate a random listing to aid in the construction of certain types of data files. This works best for post-apocalyptic games from the 70's and 80's, and even fantasy role-playing games from that same era. With these you can quickly assemble a data file where all you need is a listing of monsters and enemies from your game system. Simply choose a category below with the amount of results you want to produce. The &quot;3 Denominations&quot; will use gold, silver, and copper. The &quot;5 Denominations&quot; will use platinum, gold, electrum, silver, and copper. At the end of the menu are ten separate options to help make data files for use in the Tunnels &amp; Trolls.
		<br>
		<br>
		<select id="DropOption" name="data_lists">

			<option>Dungeon Containers</option>
			<option>Dungeon Decorations</option>
			<option>Dungeon Traps</option>
			<option>Dungeon Treasure (3 Denominations)</option>
			<option>Dungeon Treasure (5 Denominations)</option>

			<option>Post-Apocalyptic Containers</option>
			<option>Post-Apocalyptic Decorations</option>
			<option>Post-Apocalyptic Traps</option>
			<option>Post-Apocalyptic Treasure</option>

			<option>Sci-Fi Containers</option>
			<option>Sci-Fi Decorations</option>
			<option>Sci-Fi Traps</option>
			<option>Sci-Fi Treasure</option>

			<option>T&T 5e Containers</option>
			<option>T&T 5e Decorations</option>
			<option>T&T 5e Traps</option>
			<option value="T&T 5e Treasure">T&T 5e Treasure (Original Weapons/Armor)</option>
			<option value="T&T 5e Simple">T&T 5e Treasure (Simple Weapons/Armor)</option>

			<option value="T&T 7e Containers">T&T 7e/Deluxe Containers</option>
			<option value="T&T 7e Decorations">T&T 7e/Deluxe Decorations</option>
			<option value="T&T 7e Traps">T&T 7e/Deluxe Traps</option>
			<option value="T&T 7e Treasure">T&T 7e Treasure (Original Weapons/Armor)</option>
			<option value="T&T 7e Simple">T&T 7e Treasure (Simple Weapons/Armor)</option>
			<option value="T&T Deluxe Treasure">T&T Deluxe Treasure</option>

		</select>

		<select id="DropOption" name="data_amount">
			<?php $runner=991; $running=9; while ($runner > 0) : $running = $running+1; echo "<option>" . $running . "</option>"; $runner = $runner-1; endwhile; ?>
		</select>

		<br>
		<br>

		<input id="SubmitButton" name="Create" type="submit" value="Create">

		</p></form>
	<?php
}

else { include("body.php");}

} else { //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("top.php");
$bottom_notices = 100;

$program_user = $_POST['program_user'];	if ($program_user != 1){header("Location:../" . $webdir . "/");}

echo "</head><body>";

$lists = $_POST['data_lists'];
$cycle = $_POST['data_amount'];

if (($lists == "Dungeon Containers") || ($lists == "T&T 7e Containers") || ($lists == "T&T 5e Containers"))
{
	while ($cycle > 0):
		if (mt_rand(1,3) > 1){$item = boxMakerRoom();} else {$item = bagCreator();}
		echo $item . "<br>";
		$cycle = $cycle - 1;
	endwhile;
}
else if (($lists == "Dungeon Decorations") || ($lists == "T&T 7e Decorations") || ($lists == "T&T 5e Decorations"))
{
	if ($lists == "T&T 5e Decorations"){$rule_box = "Tunnels & Trolls 5th Edition";}
	else if ($lists == "T&T 7e Decorations"){$rule_box = "Tunnels & Trolls 7th Edition";}
	else {$rule_box = "Fantasy";}
	while ($cycle > 0):
		$item = stuffMakerRoom(1,$rule_box,0,mt_rand(1,30)); $item = $item[0];
		echo $item . "<br>";
		$cycle = $cycle - 1;
	endwhile;
}
else if (($lists == "Dungeon Traps") || ($lists == "T&T 5e Traps") || ($lists == "T&T 7e Traps"))
{
	if ($lists == "T&T 5e Traps"){$rule_box = "Tunnels & Trolls 5th Edition";}
	else if ($lists == "T&T 7e Traps"){$rule_box = "Tunnels & Trolls 7th Edition";}
	else {$rule_box = "Fantasy";}
	while ($cycle > 0):
		$item = trapMaker(mt_rand(1,20),"list",$rule_box,0,0); $item = $item[0];
		echo $item . "<br>";
		$cycle = $cycle - 1;
	endwhile;
}
else if ($lists == "Dungeon Treasure (5 Denominations)")
{
	$game = "Fantasy";
	echo "Riches&nbsp;&nbsp;&nbsp;20&nbsp;&nbsp;&nbsp;1<br>Item&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;2<br>--END--<br>";
	$m_cycle = $cycle / 3;
	$t_cycle = $cycle - $m_cycle;
	while ($m_cycle > 0):
		$roll = mt_rand(1,100);
			if ($roll < 80)
			{
				$item = currencyBuilder(mt_rand(1,20),mt_rand(1,3),0,mt_rand(1,30),0,$game);
				if (mt_rand(1,5) == 1){$item = otherThanCoins(mt_rand(1,3),mt_rand(1,30),$game,1,mt_rand(1,20));}
			}
			else if ($roll < 90){$item = "GEM:&nbsp;" . ucwords(gemCreator(mt_rand(1,30)));}
			else {$item = "JEWELRY:&nbsp;" . ucwords(jewelCreator(mt_rand(1,30)));}
		echo $item . "&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;0<br>";
		$m_cycle = $m_cycle - 1;
	endwhile;
		echo "--END--<br>";
	while ($t_cycle > 0):
			if (90 >= mt_rand(1,100)){$item = makeMagicItem(mt_rand(1,20),mt_rand(1,3),0,$game,0,mt_rand(1,30));}
			else {$item = makeNiceItem(mt_rand(1,20),mt_rand(1,30),$game);}
		echo $item . "&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;0<br>";
		$t_cycle = $t_cycle - 1;
	endwhile;
}
else if (($lists == "Dungeon Treasure (3 Denominations)") || ($lists == "T&T 5e Treasure") || ($lists == "T&T 5e Simple") || ($lists == "T&T 7e Treasure") || ($lists == "T&T 7e Simple"))
{
	if (($lists == "T&T 5e Treasure") || ($lists == "T&T 5e Simple") || ($lists == "T&T 7e Treasure") || ($lists == "T&T 7e Simple"))
	{
		if (($lists == "T&T 5e Treasure") || ($lists == "T&T 5e Simple")){$game = "Tunnels & Trolls 5th Edition";}
		else if (($lists == "T&T 7e Treasure") || ($lists == "T&T 7e Simple")){$game = "Tunnels & Trolls 7th Edition";}
		echo "Riches&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;&nbsp;1<br>Item&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;2<br>--END--<br>";
	}
	else
	{
		$game = "Swords & Wizardry";
		echo "Riches&nbsp;&nbsp;&nbsp;20&nbsp;&nbsp;&nbsp;1<br>Item&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;2<br>--END--<br>";
	}

	if (($lists == "T&T 5e Simple") || ($lists == "T&T 7e Simple")){ $_SESSION['tt_easy_items'] = 1; } else { unset($_SESSION['tt_easy_items']); }

	$m_cycle = $cycle / 3;
	$t_cycle = $cycle - $m_cycle;
	while ($m_cycle > 0):
		$roll = mt_rand(1,100);
			if ($roll < 80)
			{
				$item = currencyBuilder(mt_rand(1,20),mt_rand(1,3),0,mt_rand(1,30),0,$game);
				if (mt_rand(1,5) == 1){$item = otherThanCoins(mt_rand(1,3),mt_rand(1,30),$game,1,mt_rand(1,20));}
			}
			else if ($roll < 90){$item = "GEM:&nbsp;" . ucwords(gemCreator(mt_rand(1,30)));}
			else {$item = "JEWELRY:&nbsp;" . ucwords(jewelCreator(mt_rand(1,30)));}
		echo $item . "&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;0<br>";
		$m_cycle = $m_cycle - 1;
	endwhile;
		echo "--END--<br>";
	while ($t_cycle > 0):
			if (90 >= mt_rand(1,100)){$item = makeMagicItem(mt_rand(1,20),mt_rand(1,3),0,$game,0,mt_rand(1,30));}
			else {$item = makeNiceItem(mt_rand(1,20),mt_rand(1,30),$game);}
		echo $item . "&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;0<br>";
		$t_cycle = $t_cycle - 1;
	endwhile;
}
else if ($lists == "Post-Apocalyptic Containers")
{
	while ($cycle > 0):
		if (mt_rand(1,3) > 1){$item = PAboxMakerRoom(1);} else {$item = PAbagCreator(Spaceship);}
		echo $item . "<br>";
		$cycle = $cycle - 1;
	endwhile;
}
else if ($lists == "Post-Apocalyptic Decorations")
{
	while ($cycle > 0):
		$item = PAstuffMakerRoom(1,"$",ROOM,Ruins,"Gamma World",mt_rand(30,100)); $item = $item[0];
		echo $item . "<br>";
		$cycle = $cycle - 1;
	endwhile;
}
else if ($lists == "Post-Apocalyptic Traps")
{
	while ($cycle > 0):
		$item = PAtrapMaker(mt_rand(1,20),"list","Gamma World",0,1,8,1,ROOM); $item = $item[0];
		echo $item . "<br>";
		$cycle = $cycle - 1;
	endwhile;
}
else if ($lists == "Post-Apocalyptic Treasure")
{
	echo "Money&nbsp;&nbsp;&nbsp;20&nbsp;&nbsp;&nbsp;1<br>Item&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;2<br>--END--<br>";
	$m_cycle = $cycle / 3;
	$t_cycle = $cycle - $m_cycle;
	while ($m_cycle > 0):
		$roll = mt_rand(1,100);
			$item = PAcurrencyBuilder(mt_rand(1,20),mt_rand(1,3),0,mt_rand(1,30),0,"$",Spaceship);
		echo $item . "&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;0<br>";
		$m_cycle = $m_cycle - 1;
	endwhile;
		echo "--END--<br>";
	while ($t_cycle > 0):
			if (90 >= mt_rand(1,100)){$item = makePAItem(mt_rand(1,20),mt_rand(1,3));}
			else {$item = ucfirst(PAmakeNormalItem(1,1,"$",1,"Gamma World"));}
		echo $item . "&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;0<br>";
		$t_cycle = $t_cycle - 1;
	endwhile;
}
else if ($lists == "Sci-Fi Containers")
{
	while ($cycle > 0):
		if (mt_rand(1,3) > 1){$item = PAboxMakerRoom(1);} else {$item = PAbagCreator(Spaceship);}
		echo $item . "<br>";
		$cycle = $cycle - 1;
	endwhile;
}
else if ($lists == "Sci-Fi Decorations")
{
	while ($cycle > 0):
		$item = PAstuffMakerRoom(1,"pc",ROOM,Spaceship,"Metamorphosis Alpha",mt_rand(30,100)); $item = $item[0];
		echo $item . "<br>";
		$cycle = $cycle - 1;
	endwhile;
}
else if ($lists == "Sci-Fi Traps")
{
	while ($cycle > 0):
		$item = PAtrapMaker(mt_rand(1,20),"list","Metamorphosis Alpha",0,1,6,1,ROOM); $item = $item[0];
		echo $item . "<br>";
		$cycle = $cycle - 1;
	endwhile;
}
else if ($lists == "Sci-Fi Treasure")
{
	echo "Money&nbsp;&nbsp;&nbsp;20&nbsp;&nbsp;&nbsp;1<br>Item&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;2<br>--END--<br>";
	$m_cycle = $cycle / 3;
	$t_cycle = $cycle - $m_cycle;
	while ($m_cycle > 0):
		$roll = mt_rand(1,100);
			$item = PAcurrencyBuilder(mt_rand(1,20),mt_rand(1,3),0,mt_rand(1,30),0,"pc",Spaceship);
		echo $item . "&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;0<br>";
		$m_cycle = $m_cycle - 1;
	endwhile;
		echo "--END--<br>";
	while ($t_cycle > 0):
			if (90 >= mt_rand(1,100)){$item = makeMAItem(mt_rand(1,20),mt_rand(1,3));}
			else {$item = ucfirst(PAmakeNormalItem(1,1,"pc",1,"Metamorphosis Alpha"));}
		echo $item . "&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;0<br>";
		$t_cycle = $t_cycle - 1;
	endwhile;
}

include("notices.php");
echo "</body></html>";

} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>