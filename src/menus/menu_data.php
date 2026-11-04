<?php

$qry = wz_query( $connection, "SELECT * FROM menus WHERE mn_inactive=0 AND mn_group='Data Files' ORDER BY mn_name");

	echo "<p style='font-size:" . round(30 * $font_size_adjust_text) . "px; margin-top: 0; margin-bottom: 0;'>Data Files<p>";

while ($ary=wz_fetch_assoc($qry)) :

	echo "<p style='margin-top: " . $menu_spacing . "px; margin-bottom: " . $menu_spacing . "px;'><a target='_blank' href='data/" . $ary['mn_link'] . "'>" . $ary['mn_name'] . "</a></p>";

endwhile;

?>