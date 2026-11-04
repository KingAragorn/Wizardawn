<?php

if ( !isset( $bottom_notices ) ){ $bottom_notices = 0; }
if ( !isset( $_SESSION['SESSION_CREDITS'] ) ){ $_SESSION['SESSION_CREDITS'] = ""; }
if ( !isset( $_SESSION['SESSION_CREDIT2'] ) ){ $_SESSION['SESSION_CREDIT2'] = ""; }

if ($bottom_notices > 0)
{
	echo "<br><br>";
	if (($bottom_notices == 1) && ($xls > 0)) { ?>
	<p align="center"><font size="2">This is published under the Open Game License Version 1.0a (view at <?php echo $webnot; ?>lic_ogl.html)<br>and is in compliance with the OSRIC&trade; Open License (view at <?php echo $webnot; ?>lic_osric.html).</font>
	<?php } else if (($bottom_notices == 2) && ($xls > 0)) { ?>
	<p align="center"><font size="2">This is published under the Open Game License Version 1.0a (view at <?php echo $webnot; ?>lic_ogl.html)<br>and is in compliance with the Labyrinth Lord&trade; Trademark License (view at <?php echo $webnot; ?>lic_ll.pdf).</font>
	<?php } else if ($bottom_notices == 1){ ?>
	<p align="center"><font size="2">This is published under the <a target="_blank" href="lic\lic_ogl.html">Open Game License Version 1.0a</a><br>and is in compliance with the <a target="_blank" href="lic\lic_osric.html">OSRIC&trade; Open License</a>.</font>
	<?php } else if ($bottom_notices == 2){ ?>
	<p align="center"><font size="2">This is published under the <a target="_blank" href="lic\lic_ogl.html">Open Game License Version 1.0a</a><br>and is in compliance with the <a target="_blank" href="lic\lic_ll.pdf">Labyrinth Lord&trade; Trademark License</a>.</font>
	<?php } else if ($bottom_notices == 3){ ?>
	<p align="center"><font size="2">This is published under the <a target="_blank" href="lic\lic_ogl.html">Open Game License Version 1.0a</a><br>and is in compliance with the <a target="_blank" href="lic\lic_mf.pdf">Mutant Future&trade; Trademark License</a>.</font>
	<?php } else if ($bottom_notices == 4){ ?>
	<p align="center"><font size="2">This is published under the <a target="_blank" href="lic\lic_ogl.html">Open Game License Version 1.0a</a><br>and is in compliance with both the <a target="_blank" href="lic\lic_ll.pdf">Labyrinth Lord&trade; Trademark License</a> and the <a target="_blank" href="lic\lic_mf.pdf">Mutant Future&trade; Trademark License</a>.</font>
	<?php } else if ($bottom_notices == 5){ ?>
	<p align="center"><font size="2">This is published under the <a target="_blank" href="lic\lic_ogl.html">Open Game License Version 1.0a</a><br>and is in compliance with both the <a target="_blank" href="lic\lic_sw.html">Swords & Wizardry&trade; Compatibility-Statement License</a>.<br>Wizardawn&trade; are not affiliated with Matthew J. Finch, Mythmere Games&trade;, or Frog God Games.</font>
	<?php } else if ($bottom_notices == 6){ ?>
	<p align="center"><font size="2">&quot;Tunnels &amp; Trolls&quot; and &quot;T&amp;T&quot; are trademarks of Flying Buffalo Inc.<br>Wizardawn&trade; are not affiliated with Rick Loomis, Kent St. Andre, or Flying Buffalo Inc.</font>
	<?php } else if ($bottom_notices == 7){ ?>
	<p align="center"><font size="2">&quot;Magestykc&quot; is a trademark of Wizardawn Entertainment.</font>
	<p align="center"><font size="2">&quot;Tunnels &amp; Trolls&quot; and &quot;T&amp;T&quot; are trademarks of Flying Buffalo Inc.<br>Wizardawn&trade; are not affiliated with Rick Loomis, Kent St. Andre, or Flying Buffalo Inc.</font>
	<?php } else if ($bottom_notices == 8){ ?>
	<p align="center"><font size="2">&quot;Broken Urthe&quot; is a trademark of Wizardawn Entertainment.</font>
	<?php } else if ($bottom_notices == 9){ ?>
	<p align="center"><font size="2">&quot;Space Ryft&quot; is a trademark of Wizardawn Entertainment.</font>
	<?php } else if ($bottom_notices == 10){ ?>
	<p align="center"><font size="2">&quot;Necropalyx&quot; is a trademark of Wizardawn Entertainment.</font>
	<?php } else if ($bottom_notices == 11){ ?>
	<p align="center"><font size="2">Basic Fantasy Role-Playing Game is copyright 2006-<?php echo date(Y); ?> Chris Gonnerman, and the name and logo thereof are Product Identity under the <a target="_blank" href="lic\lic_ogl.html">Open Game License Version 1.0a</a></font>
	<?php } else if ($bottom_notices == 12){ ?>
	<p align="center"><font size="2">&quot;Millenniums &amp; Mutations&quot; and &quot;Zendynn&quot; are a trademarks of Wizardawn Entertainment.</font>
	<p align="center"><font size="2">&quot;Tunnels &amp; Trolls&quot; and &quot;T&amp;T&quot; are trademarks of Flying Buffalo Inc.<br>Wizardawn&trade; are not affiliated with Rick Loomis, Kent St. Andre, or Flying Buffalo Inc.</font>
	<?php } else if ($bottom_notices == 13){ ?>
	<p align="center"><font size="2">Dungeons &amp; Dragons is a trademark of Wizards of the Coast LLC. All Rights Reserved.<br>Wizardawn&trade; are not affiliated with, endorsed, sponsored, or specifically approved by Wizards of the Coast LLC.<br>The information is used on a non-commercial basis and no infringement of copyright is intended.</font>
	<?php } else if ($bottom_notices == 14){ ?>
	<p align="center"><font size="2">Gamma World is a trademark of Wizards of the Coast LLC. All Rights Reserved.<br>Wizardawn&trade; are not affiliated with, endorsed, sponsored, or specifically approved by Wizards of the Coast LLC.<br>The information is used on a non-commercial basis and no infringement of copyright is intended.<br><br>&quot;Broken Urthe&quot; is a trademark of Wizardawn Entertainment.</font>
	<?php } else if ($bottom_notices == 15){ ?>
	<p align="center"><font size="2">&quot;Metamorphosis Alpha&quot; is a trademark of James M. Ward.<br>The information is used on a non-commercial basis and no infringement of copyright is intended.<br><br>&quot;Broken Urthe&quot; is a trademark of Wizardawn Entertainment.</font>
	<?php } else if ($bottom_notices == 16){ ?>
	<p align="center"><font size="2">Gamma World is a trademark of Wizards of the Coast LLC. All Rights Reserved.<br>Wizardawn&trade; are not affiliated with, endorsed, sponsored, or specifically approved by Wizards of the Coast LLC.<br>The information is used on a non-commercial basis and no infringement of copyright is intended.</font>
	<?php } else if ($bottom_notices == 17){ ?>
	<p align="center"><font size="2">&quot;Metamorphosis Alpha&quot; is a trademark of James M. Ward.<br>The information is used on a non-commercial basis and no infringement of copyright is intended.</font>
	<?php } else if ($bottom_notices == 18){ ?>
	<p align="center"><font size="2">&quot;Swords &amp; Six-Siders&quot; is a trademark of Vanquishing Leviathan LLC.<br>This is published under the <a target="_blank" href="lic\lic_ogl.html">Open Game License Version 1.0a</a>.<br>Wizardawn&trade; are not affiliated with Steve Robertson or Vanquishing Leviathan LLC.</font>
	<?php }
}
else
{
?>
<div id="div_line" style="top:30px; position:relative; background-color: <?php echo $color_background; ?>;">&nbsp;</div>
<p>&nbsp;</p>
<p style="text-align: center;">
		Wizardawn Entertainment, provides the content on this website in support of its goal to provide information in aid of playing games.<br>
		Wizardawn invites visitors to use its online content for personal, educational, and other non-commercial purposes (unless otherwise noted).<br>
		By using the Wizardawn website, you accept and agree to abide by these terms.
		<?php

		if ($_SESSION['SESSION_CREDITS']=="all" || $_SESSION['SESSION_CREDITS']=="wizardawn" || $_SESSION['SESSION_CREDIT2']=="wizardawn"){ echo "<br><br>Wizardawn, Broken Urthe, Magestykc, Millenniums &amp; Mutations, Necropalyx,<br>Ruins &amp; Riches, Space Ryft, and Zendynn are trademarks of Wizardawn Entertainment."; }

		if ($_SESSION['SESSION_CREDITS']=="all" || $_SESSION['SESSION_CREDITS']=="osric" || $_SESSION['SESSION_CREDIT2']=="osric"){ echo "<br><br>&quot;OSRIC&quot;, &quot;Osric&quot; and &quot;O.S.R.I.C.&quot; are trademarks of Matthew Finch and Stuart Marshall<br>&quot;Monsters of Myth&quot; is a trademark of Matthew Finch and Stuart Marshall."; }

		if ($_SESSION['SESSION_CREDITS']=="all" || $_SESSION['SESSION_CREDITS']=="sandw" || $_SESSION['SESSION_CREDIT2']=="sandw"){ echo "<br><br>Swords & Wizardry, S&W, and Mythmere Games are trademarks of Matthew J. Finch.<br>Wizardawn&trade; are not affiliated with Matthew J. Finch, Mythmere Games&trade;, or Frog God Games."; }

		if ($_SESSION['SESSION_CREDITS']=="all" || $_SESSION['SESSION_CREDITS']=="tandt" || $_SESSION['SESSION_CREDIT2']=="tandt"){ echo "<br><br>&quot;Tunnels &amp; Trolls&quot; and &quot;T&amp;T&quot; are trademarks of Flying Buffalo Inc.<br>Wizardawn&trade; are not affiliated with Rick Loomis, Kent St. Andre, or Flying Buffalo Inc."; }

		if ($_SESSION['SESSION_CREDITS']=="all" || $_SESSION['SESSION_CREDITS']=="bfrpg" || $_SESSION['SESSION_CREDIT2']=="bfrpg"){ echo "<br><br>Basic Fantasy Role-Playing Game is copyright 2006-" . date(Y) . " Chris Gonnerman,<br>and the name and logo thereof are Product Identity under the Open Game License Version 1.0a."; }

		if ($_SESSION['SESSION_CREDITS']=="all" || $_SESSION['SESSION_CREDITS']=="ll" || $_SESSION['SESSION_CREDIT2']=="ll"){ echo "<br><br>&quot;Labyrinth Lord&quot; is a trademark of Daniel Proctor."; if ($extra_disclaimer == "mf"){echo "<br>&quot;Mutant Future&quot; is a trademark of Daniel Proctor.";} }

		if ($_SESSION['SESSION_CREDITS']=="all" || $_SESSION['SESSION_CREDITS']=="mf" || $_SESSION['SESSION_CREDIT2']=="mf"){ echo "<br><br>&quot;Mutant Future&quot; is a trademark of Daniel Proctor."; }

		if ($_SESSION['SESSION_CREDITS']=="all" || $_SESSION['SESSION_CREDITS']=="sx" || $_SESSION['SESSION_CREDIT2']=="sx"){ echo "<br><br>&quot;Swords &amp; Six-Siders&quot; is a trademark of Vanquishing Leviathan LLC."; }

		if ($_SESSION['SESSION_CREDITS']=="all" || $_SESSION['SESSION_CREDITS']=="gw" || $_SESSION['SESSION_CREDIT2']=="gw"){ echo "<br><br>Gamma World is a trademark of Wizards of the Coast LLC. All Rights Reserved.<br>Wizardawn&trade; are not affiliated with, endorsed, sponsored, or specifically approved by Wizards of the Coast LLC.<br>The information is used on a non-commercial basis and no infringement of copyright is intended."; }

		if ($_SESSION['SESSION_CREDITS']=="all" || $_SESSION['SESSION_CREDITS']=="ma" || $_SESSION['SESSION_CREDIT2']=="ma"){ echo "<br><br>&quot;Metamorphosis Alpha&quot; is a trademark of James M. Ward.<br>The information is used on a non-commercial basis and no infringement of copyright is intended."; }

		if ($_SESSION['SESSION_CREDITS']=="all" || $_SESSION['SESSION_CREDITS']=="add" || $_SESSION['SESSION_CREDIT2']=="add"){ echo "<br><br>Dungeons &amp; Dragons is a trademark of Wizards of the Coast LLC. All Rights Reserved.<br>Wizardawn&trade; are not affiliated with, endorsed, sponsored, or specifically approved by Wizards of the Coast LLC.<br>The information is used on a non-commercial basis and no infringement of copyright is intended."; }

		if ($_SESSION['SESSION_CREDITS']=="bdd" || $_SESSION['SESSION_CREDIT2']=="bdd"){ echo "<br><br>Dungeons &amp; Dragons is a trademark of Wizards of the Coast LLC. All Rights Reserved.<br>Wizardawn&trade; are not affiliated with, endorsed, sponsored, or specifically approved by Wizards of the Coast LLC.<br>The information is used on a non-commercial basis and no infringement of copyright is intended."; }

		if ($_SESSION['SESSION_CREDITS']=="swga" || $_SESSION['SESSION_CREDIT2']=="swga"){ echo "<br><br>Star Wars is a copyrighted property and the Star Wars titles and associated names are the sole property of Lucasfilm Ltd and Disney. This is an unauthorized, unofficial game produced merely for the entertainment of fans and is non-profit making and falls under the definition of 'fair use' under United States copyright laws. The information is used on a non-commercial basis and no infringement of copyright is intended."; }

		?>
		<br><br>All other material on this site is either copyrighted (&copy; 2006 - <?php echo date('Y'); ?>) Wizardawn Entertainment, or indicated otherwise.
	</p>
<?php } ?>
<p>&nbsp;</p>