<?php

include("db.php");

$game_defaults = "Help";
include("game_defaults.php");

$menu_on_left = $menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

$menu_on_right = "menus/menu_help_right.php";

if ($menu_section == 1){ echo "<img src='pics/help_pdf.jpg'><br><br>"; include_once("menus/menu_help_left.php"); }
else if ($menu_section == 2){ echo ""; }
else if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>Maps &amp; Printing</p>";
	echo "<p style='text-align: justify;'>"; ?>
		Sometimes you may want to save the output of a generated report into a PDF file that you can then use at a later time, whether on a laptop or to print at a later date. All browsers now have 
		this function built into their normal functions. When you print, or export to PDF, your output may not have any images on it. If this occurs, check your browser's print settings. They usually 
		have a setting for printing background images. Changing this should help with this issue.
		<br><br>
		You can also produce very large maps here at Wizardawn, but to save them as an image would require a browser addon. Firefox and Safari already have a web page screenshot program built into it. 
		There is, however, plugins you can use to add to Chrome to give you this same functionality. One such plugin is 
		<a target="_blank" href="https://chrome.google.com/webstore/detail/take-webpage-screenshots/mcbpblocgmgfnpjjppndjkmgjaogfceg?hl=en">Fireshot</a>, but there are many others you can find. 
		They all do similar things, where it takes your current web page and converts it into an image for you.
	</p>
<?php
}

else { include("body.php");}

?>