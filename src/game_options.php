<?php

	// THIS FILE IS FOR SORTING OUT THE GAMES FOR THE VARIOUS TOOLS //

	if ($_SESSION['SESSION_SECTION'] == 1){ $x_game = "AD&D"; }
	else if ($_SESSION['SESSION_SECTION'] == 2){ $x_game = "BD&D"; }
	else if ($_SESSION['SESSION_SECTION'] == 3){ $x_game = "BFRPG"; }
	else if ($_SESSION['SESSION_SECTION'] == 4){ $x_game = "Broken Urthe"; }
	else if ($_SESSION['SESSION_SECTION'] == 5){ $x_game = "Gamma World"; }
	else if ($_SESSION['SESSION_SECTION'] == 6){ $x_game = "Labyrinth Lord"; }
	else if ($_SESSION['SESSION_SECTION'] == 7){ $x_game = "Metamorphosis Alpha"; }
	else if ($_SESSION['SESSION_SECTION'] == 8){ $x_game = "Millenniums & Mutations"; }
	else if ($_SESSION['SESSION_SECTION'] == 9){ $x_game = "Mutant Future"; }
	else if ($_SESSION['SESSION_SECTION'] == 10){ $x_game = "Necropalyx"; }
	else if ($_SESSION['SESSION_SECTION'] == 11){ $x_game = "OSRIC"; }
	else if ($_SESSION['SESSION_SECTION'] == 12){ $x_game = "Space Ryft"; }
	else if ($_SESSION['SESSION_SECTION'] == 13){ $x_game = "Swords & Wizardry"; }
	else if ($_SESSION['SESSION_SECTION'] == 14){ $x_game = "Tunnels & Trolls 5th Edition"; }
	else if ($_SESSION['SESSION_SECTION'] == 15){ $x_game = "Tunnels & Trolls 7th Edition"; }
	else if ($_SESSION['SESSION_SECTION'] == 36){ $x_game = "Fantasy"; }
	else if ($_SESSION['SESSION_SECTION'] == 37){ $x_game = "Survival Horror"; }
	else if ($_SESSION['SESSION_SECTION'] == 38){ $x_game = "Science-Fiction"; }
	else if ($_SESSION['SESSION_SECTION'] == 39){ $x_game = "Post-Apocalyptic"; }
	else if ($_SESSION['SESSION_SECTION'] == 147){ $x_game = "Wizardry & Warriors"; }
	else if ($_SESSION['SESSION_SECTION'] == 165){ $x_game = "Swords & Six-Siders"; }
	else if ($_SESSION['SESSION_SECTION'] == 173){ $x_game = "Tunnels & Trolls Deluxe"; }
	else if ($_SESSION['SESSION_SECTION'] == "DATA"){ $x_game = "Data"; }

?>