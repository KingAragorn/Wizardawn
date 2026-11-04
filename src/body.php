<?php

include("top.php");

include_once("css.php");

?>

</head>

<body>

<div id="div_main">

	<div style="font-size:<?php echo round(80 * $font_size_adjust_main); ?>px; line-height: 80px; width:600px; font-family: WizardawnTitle; height:80px; float:left; left:15px; top:10px; position:relative; text-shadow: 6px 6px 12px <?php echo $color_shadow; ?>;">Wizardawn</div>

    <div style="font-size:<?php echo round(40 * $font_size_adjust_main); ?>px; line-height: 80px; width:600px; font-family: WizardawnTitle; height:80px; float:right; right:15px; top:5px; position:relative; text-align: right;">
		<div id="div_table">
			<div class="row">
				<span class="cell" style="width: 520px;">Mage in Black</span>
				<span class="cell" style="width: 80px;"><img src="pics/designer.gif"></span>
			</div>
		</div>
	</div>

	<div id="div_line" style="top:90px; position:relative;">&nbsp;</div>

	<div id="menu_top" style="margin-left: auto; margin-right: auto; width:97%; text-align: justify; position:relative; top:20px;">Welcome to Wizardawn Games. Here you will find many resources that you may find handy for Wizardawn games...along with some of your favorite role-playing games like OSRIC, Swords &amp; Wizardry, Labyrinth Lord, Mutant Future, Basic Fantasy Role-Playing Game, Metamorphosis Alpha, Gamma World, Dungeons &amp; Dragons, Tunnels &amp; Trolls, and Swords &amp; Six-Siders. Choose a game or genre below to begin making your gaming life easier.</div>

	<div id="div_line" style="top:30px; position:relative;">&nbsp;</div>

	<div class="drop" style="top:30px; left:15px; z-index:100; position:relative; width:1100px;">
		<ul class="drop_menu">
			<li><a href='#'>Fantasy Game</a>
				<ul><?php include("menus/menu_fantasy_game.php"); ?></ul>
			</li>
			<li><a href='#'>Other Game</a>
				<ul><?php include("menus/menu_other_game.php"); ?></ul>
			</li>
			<li><a href='#'>Generic Genre</a>
				<ul><?php include("menus/menu_genres.php"); ?></ul>
			</li>
			<li><a href='rpg_data.php'>Custom Tools</a></li>
			<li><a href='#'>Wizardawn Games</a>
				<ul><?php include("menus/menu_wizardawn_games.php"); ?></ul>
			</li>
			<li><a href='#'>Help</a>
				<ul>
					<li><a href='help_about.php'>About Wizardawn</a></li>
					<li><a href='help_navigate.php'>Navigating Wizardawn</a></li>
					<li><a href='help_print.php'>Maps &amp; Printing</a></li>
				</ul>
			</li>
			<li><a href='<?php echo $webadd; ?>'>Home</a></li>
		</ul>
	</div>

	<div id="div_line" style="top:<?php echo $height_menu_bar; ?>px; position:relative;">&nbsp;</div>

	<div id="div_area" style="top:1px; position:relative;">

		<div id="menu_left" style="width:250px; float:left; left:18px; top:40px; position:absolute;"><br><?php echo imageShown($_SESSION['SESSION_SECTION']); $menu_section=1; include($menu_on_left); ?></div>

		<div id="menu_right" style="width:250px; float:right; text-align: right; right:18px; top:40px; position:absolute;"><br><?php $menu_section=2; include($menu_on_right); ?></div>

		<div id="menu_center" style="width:604px; top:40px; left:295px; position:absolute;"><br><?php $menu_section=3; include($menu_in_center); ?></div>

	</div>

</div>

<div id="div_credit">
	<?php include("notices.php"); ?>
</div>

</body>

</html>