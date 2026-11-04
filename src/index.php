<?php

include("db.php");

$_SESSION['SESSION_CREDITS'] = "wizardawn";
$_SESSION['SESSION_APPEARS'] = 0;
$_SESSION['SESSION_BKIMAGE'] = "fantasy";
$_SESSION['SESSION_SECTION'] = "";

$menu_on_left = "menus/menu_left.php";

$menu_on_right = "menus/menu_right.php";

$menu_in_center = "menus/menu_center.php";

include("body.php");

?>