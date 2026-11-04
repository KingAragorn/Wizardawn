<style type="text/css">
<!--

<?php
	$color_div_line = "#000000";
	$color_background = "#FFFFFF";
	$color_link = "#000000";
	$color_link_hover = "#000000";
	$color_fonts = "#000000";
	$color_shadow = "#868686";
	$menu_spacing = 5;
?>

<?php if ($_SESSION['SESSION_APPEARS'] == 1){ ////////////////////////// THE FONTS FOR BASIC D&D TYPE GAMES /////////////////////////////////////////////////// 
	$font_size_adjust_text = 1;
	$font_size_adjust_main = 0.9;
	$height_menu_bar = 32;
?>
	@font-face {
	  font-family: 'WizardawnTitle';
	  src: url('<?php echo $mm; ?>fonts/BDDTitle.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/BDDTitle.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/BDDTitle.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/BDDTitle.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnRegular';
	  src: url('<?php echo $mm; ?>fonts/BDDBookRegular.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/BDDBookRegular.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/BDDBookRegular.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/BDDBookRegular.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBold';
	  src: url('<?php echo $mm; ?>fonts/BDDBookBold.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/BDDBookBold.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/BDDBookBold.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/BDDBookBold.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnItalic';
	  src: url('<?php echo $mm; ?>fonts/BDDBookItalic.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/BDDBookItalic.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/BDDBookItalic.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/BDDBookItalic.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBoldItalic';
	  src: url('<?php echo $mm; ?>fonts/BDDBookBoldItalic.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/BDDBookBoldItalic.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/BDDBookBoldItalic.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/BDDBookBoldItalic.svg') format('svg');
	}
<?php } else if ($_SESSION['SESSION_APPEARS'] == 2){ ///////////////////// THE FONTS FOR OD&D AND AD&D TYPE GAMES ///////////////////////////////////////////// 
	$font_size_adjust_text = 1;
	$font_size_adjust_main = 1;
	$height_menu_bar = 32;
?>
	@font-face {
	  font-family: 'WizardawnTitle';
	  src: url('<?php echo $mm; ?>fonts/ODDTitle.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/ODDTitle.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/ODDTitle.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/ODDTitle.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnRegular';
	  src: url('<?php echo $mm; ?>fonts/ODDBookRegular.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/ODDBookRegular.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/ODDBookRegular.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/ODDBookRegular.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBold';
	  src: url('<?php echo $mm; ?>fonts/ODDBookBold.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/ODDBookBold.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/ODDBookBold.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/ODDBookBold.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnItalic';
	  src: url('<?php echo $mm; ?>fonts/ODDBookItalic.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/ODDBookItalic.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/ODDBookItalic.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/ODDBookItalic.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBoldItalic';
	  src: url('<?php echo $mm; ?>fonts/ODDBookBoldItalic.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/ODDBookBoldItalic.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/ODDBookBoldItalic.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/ODDBookBoldItalic.svg') format('svg');
	}
<?php } else if ($_SESSION['SESSION_APPEARS'] == 3){ ///////////////////// THE FONTS FOR GAMMA WORLD TYPE GAMES /////////////////////////////////////////////// 
	$font_size_adjust_text = 1;
	$font_size_adjust_main = 1;
	$height_menu_bar = 32;
?>
	@font-face {
	  font-family: 'WizardawnTitle';
	  src: url('<?php echo $mm; ?>fonts/GammaTitle.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/GammaTitle.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/GammaTitle.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/GammaTitle.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnRegular';
	  src: url('<?php echo $mm; ?>fonts/GammaFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/GammaFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/GammaFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/GammaFont.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBold';
	  src: url('<?php echo $mm; ?>fonts/GammaFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/GammaFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/GammaFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/GammaFont.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnItalic';
	  src: url('<?php echo $mm; ?>fonts/GammaFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/GammaFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/GammaFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/GammaFont.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBoldItalic';
	  src: url('<?php echo $mm; ?>fonts/GammaFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/GammaFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/GammaFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/GammaFont.svg') format('svg');
	}
<?php } else if ($_SESSION['SESSION_APPEARS'] == 4){ /////////////////////// THE FONTS FOR SCI-FI TYPE GAMES //////////////////////////////////////////////////
	$font_size_adjust_text = 0.93;
	$font_size_adjust_main = 1;
	$height_menu_bar = 32;
?>
	@font-face {
	  font-family: 'StarWars';
	  src: url('<?php echo $mm; ?>fonts/StarWars.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/StarWars.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/StarWars.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/StarWars.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnTitle';
	  src: url('<?php echo $mm; ?>fonts/SpaceTitle.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/SpaceTitle.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/SpaceTitle.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/SpaceTitle.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnRegular';
	  src: url('<?php echo $mm; ?>fonts/SpaceFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/SpaceFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/SpaceFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/SpaceFont.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBold';
	  src: url('<?php echo $mm; ?>fonts/SpaceFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/SpaceFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/SpaceFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/SpaceFont.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnItalic';
	  src: url('<?php echo $mm; ?>fonts/SpaceFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/SpaceFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/SpaceFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/SpaceFont.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBoldItalic';
	  src: url('<?php echo $mm; ?>fonts/SpaceFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/SpaceFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/SpaceFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/SpaceFont.svg') format('svg');
	}
<?php } else if ($_SESSION['SESSION_APPEARS'] == 5){ ///////////////////// THE FONTS FOR ZOMBIE TYPE GAMES //////////////////////////////////////////////////// 
	$font_size_adjust_text = 0.9;
	$font_size_adjust_main = 1;
	$height_menu_bar = 31;
?>
	@font-face {
	  font-family: 'WizardawnTitle';
	  src: url('<?php echo $mm; ?>fonts/ZombieTitle.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/ZombieTitle.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/ZombieTitle.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/ZombieTitle.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnRegular';
	  src: url('<?php echo $mm; ?>fonts/ZombieFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/ZombieFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/ZombieFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/ZombieFont.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBold';
	  src: url('<?php echo $mm; ?>fonts/ZombieFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/ZombieFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/ZombieFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/ZombieFont.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnItalic';
	  src: url('<?php echo $mm; ?>fonts/ZombieFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/ZombieFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/ZombieFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/ZombieFont.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBoldItalic';
	  src: url('<?php echo $mm; ?>fonts/ZombieFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/ZombieFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/ZombieFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/ZombieFont.svg') format('svg');
	}
<?php } else if ($_SESSION['SESSION_APPEARS'] == 6){ /////////////////////// THE FONTS FOR TUNNELS & TROLLS GAMES /////////////////////////////////////////////
	$font_size_adjust_text = 0.9;
	$font_size_adjust_main = 1;
	$height_menu_bar = 31;
?>
	@font-face {
	  font-family: 'WizardawnTitle';
	  src: url('<?php echo $mm; ?>fonts/TTTitle.eot');
	  src: url('<?php echo $mm; ?>fonts/TTTitle.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/TTTitle.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/TTTitle.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/TTTitle.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnRegular';
	  src: url('<?php echo $mm; ?>fonts/TTFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/TTFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/TTFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/TTFont.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBold';
	  src: url('<?php echo $mm; ?>fonts/TTFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/TTFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/TTFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/TTFont.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnItalic';
	  src: url('<?php echo $mm; ?>fonts/TTFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/TTFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/TTFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/TTFont.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBoldItalic';
	  src: url('<?php echo $mm; ?>fonts/TTFont.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/TTFont.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/TTFont.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/TTFont.svg') format('svg');
	}
<?php } else { /////////////////////// WIZARDAWN MAIN FONTS ////////////////////////////////////////////////////////////////////////////////////////////
	$font_size_adjust_text = 1.15;
	$font_size_adjust_main = 1;
	$height_menu_bar = 37;
?>
	@font-face {
	  font-family: 'WizardawnTitle';
	  src: url('<?php echo $mm; ?>fonts/WizardawnTitle.eot');
	  src: url('<?php echo $mm; ?>fonts/WizardawnTitle.eot?#iefix') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/WizardawnTitle.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/WizardawnTitle.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/WizardawnTitle.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnRegular';
	  src: url('<?php echo $mm; ?>fonts/WizardawnRegular.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/WizardawnRegular.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/WizardawnRegular.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/WizardawnRegular.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBold';
	  src: url('<?php echo $mm; ?>fonts/WizardawnBold.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/WizardawnBold.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/WizardawnBold.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/WizardawnBold.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnItalic';
	  src: url('<?php echo $mm; ?>fonts/WizardawnItalic.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/WizardawnItalic.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/WizardawnItalic.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/WizardawnItalic.svg') format('svg');
	}
	@font-face {
	  font-family: 'WizardawnBoldItalic';
	  src: url('<?php echo $mm; ?>fonts/WizardawnBoldItalic.otf') format('embedded-opentype'),
		   url('<?php echo $mm; ?>fonts/WizardawnBoldItalic.woff') format('woff'),
		   url('<?php echo $mm; ?>fonts/WizardawnBoldItalic.ttf')  format('truetype'),
		   url('<?php echo $mm; ?>fonts/WizardawnBoldItalic.svg') format('svg');
	}
<?php } ?>

body,td,th {
	font-size: <?php echo round(16 * $font_size_adjust_text); ?>px;
	color: <?php echo $color_fonts; ?>;
}

body {
	background-color: <?php echo $color_background; ?>;
	font-size: <?php echo round(16 * $font_size_adjust_text); ?>px;
	font-family: WizardawnRegular; 
}

#div_main {
  width: 1200px;
  height: 5000px;
  margin-left: auto;
  margin-right: auto;
  background-color: <?php echo $color_background; ?>;
}

#div_credit {
  width: 1200px;
  margin-left: auto;
  margin-right: auto;
  background-color: <?php echo $color_background; ?>;
}

#div_table {display: table; border-collapse: collapse;}
#div_tabex {display: table; width: 100%; table-layout: fixed; border-collapse: collapse;}
.row {display: table-row;}
.row_line {display: table-row; border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:<?php echo $color_fonts; ?>;}
.cell {display: table-cell; padding: 3px; vertical-align: top;}
.cull {display: table-cell; padding: 3px; white-space: pre; vertical-align: top;}
.cxll {display: table-cell; text-align: justify; padding: 3px; vertical-align: top;}

#div_line {
  z-index:50; 
  width: 98%;
  height: 1px;
  margin-left: auto;
  margin-right: auto;
  background-color: <?php echo $color_div_line; ?>;
}

#div_area {
  margin-left: auto;
  margin-right: auto;
  background-color: <?php echo $color_background; ?>;
}

-->
</style>