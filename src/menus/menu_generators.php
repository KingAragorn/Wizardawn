<?php

$qry = wz_query( $connection, "SELECT * FROM menus WHERE mn_inactive=0 AND mn_group='Generators' $for ORDER BY mn_name");
$num = wz_num_rows($qry);

	if ($num > 0){echo "<p style='font-size:" . round(30 * $font_size_adjust_text) . "px; margin-top: 0; margin-bottom: 0;'>Generators<p>";}

while ($ary=wz_fetch_assoc($qry)) :

	echo "<p style='margin-top: " . $menu_spacing . "px; margin-bottom: " . $menu_spacing . "px;'><a href='" . $ary['mn_link'] . "'>" . $ary['mn_name'] . "</a></p>";

endwhile;

?>