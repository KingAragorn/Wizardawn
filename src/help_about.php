<?php

include("db.php");

$game_defaults = "Help";
include("game_defaults.php");

$menu_on_left = $menu_in_center = str_replace($webfld, "", $_SERVER['SCRIPT_FILENAME']);

$menu_on_right = "menus/menu_help_right.php";

if ($menu_section == 1){ echo "<img src='pics/help_about.jpg'><br><br>"; include_once("menus/menu_help_left.php"); }
else if ($menu_section == 2){ echo ""; }
else if ($menu_section == 3)
{
	echo "<p style='font-size:" . round(45 * $font_size_adjust_main) . "px; font-family: WizardawnTitle; line-height: 50px; width:600px; margin-top: 0; margin-bottom: 0'>About Wizardawn</p>";
	echo "<p style='text-align: justify;'>"; ?>
With inspiration from books such as the Dungeons Masters Guide and the Monster &amp; Treasure Assortment, Wizardawn started making tools for random dungeon contents, and then discovered the many geomorphs created by others. Work began on random map generators using such geomorphs. It only made sense to combine them together to make a really quick way to create adventures.<br />
<br />
<img src="pics/about_wizardawn_1.jpg" width="200" height="258" hspace="5" vspace="5" align="left" />All of these tools here will not do 100% of the work for you. These tools are best left in the hands of the creative game master. The kind that has a story in mind, but simply needs the grunt work done of drawing maps and filling rooms that do not have an impact on the overall story.<br />
<br />
Also with the help of geomorphs, you can create random cities and villages. You no longer need a campaign world written by someone else. You can quickly make your own. Just like a dungeon adventure, campaign settings are usually something that starts in the imagination of an overall theme. You may have a world in mind where dwarves rule over all, or a land where many humanoid races live together. Again...Wizardawn does the heavy lifting for you in this regard. You can make a city in about 2 minutes here, complete with a population of well-described citizens. All you would maybe have to do is flesh out the details that support your vision. You might have to create the royalty exactly how you want, or indicate on the map where the secret death cult hides.<br />
<br />
<img src="pics/about_wizardawn_2.jpg" width="200" height="258" hspace="5" vspace="5" align="right" />You don't have to limit yourself to cities. How about a world? You can create a world using classic hex map styles. The <a href="files/darboria_map.jpg" target="_blank">World of Darboria</a> was created in about an hour. It took about a minute to generate the map. Then it was brought into an image editing program where the landscape was tweaked and names were added to all of the places on it. You don't know what is in all of those places...and you don't need to. You can make that up as the game moves along.<br />
<br />
Keep in mind during your visit here, Wizardawn strongly focus on a few specific games. There are some tools here that are generic per genre (fantasy, sci-fi, survival horror, or post-apocalyptic), but many tools rely on a game system to create the material needed for it (like random dungeons or treasure). If you play one of these games, you are in luck. If you play a game closely resembling one here...again...you are in luck. If you don't play any of these games, you are free to play around and maybe something will inspire you for your game.<br />
<br />
So don't hold off any game plans because you insist on spending a year creating a huge game world for your setting. Don't feel paralyzed because your friends can suddenly play together but you don't have anything prepared. Don't avoid these games because you feel you don't have the time to make a great adventure. Just stop on by and let Wizardawn help you make your save versus time.

<?php
}

else { include("body.php");}

?>