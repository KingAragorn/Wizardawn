<?php

$qry = wz_query( $connection, "SELECT * FROM menus WHERE mn_inactive=0 AND mn_group='Supplements' $for ORDER BY mn_name");
$num = wz_num_rows($qry);

if ($num > 0){echo "<p style='font-size:" . round(30 * $font_size_adjust_text) . "px; margin-top: 0; margin-bottom: 0;'>Supplements<p>"; $menu_break = "<br><br>";}

while ($ary=wz_fetch_assoc($qry)) :

	if ($ary['mn_newwindow'] == 1){ echo "<p style='margin-top: " . $menu_spacing . "px; margin-bottom: " . $menu_spacing . "px;'><a href='" . $ary['mn_link'] . "'>" . $ary['mn_name'] . "</a></p>"; }
	else if ($ary['mn_newwindow'] == 2){ echo "<p style='margin-top: " . $menu_spacing . "px; margin-bottom: " . $menu_spacing . "px;'><a target='_blank' href='" . $ary['mn_link'] . "'>" . $ary['mn_name'] . "</a></p>"; }
	else { echo "<p style='margin-top: " . $menu_spacing . "px; margin-bottom: " . $menu_spacing . "px;'><a target='_blank' href='files/" . $ary['mn_link'] . "'>" . $ary['mn_name'] . "</a></p>"; }

endwhile;

echo $menu_break; $menu_break = "";

$qry = wz_query( $connection, "SELECT * FROM menus WHERE mn_inactive=0 AND mn_group='Non' $for ORDER BY mn_name");
$num = wz_num_rows($qry);

if ($num > 0){echo "<p style='font-size:" . round(30 * $font_size_adjust_text) . "px; margin-top: 0; margin-bottom: 0;'>Downloads<p>"; $menu_break = "<br><br>";}

while ($ary=wz_fetch_assoc($qry)) :

	$works_by = explode("-BY-", $ary['mn_name']);

	echo "<p style='margin-top: " . $menu_spacing . "px; margin-bottom: " . $menu_spacing . "px;'><a target='_blank' href='" . $ary['mn_link'] . "'>" . $works_by['0'] . "<br><span style='color: " . $color_fonts . ";'>&nbsp;&nbsp;&nbsp;by " . $works_by['1'] . "</span></a></p><br>";

endwhile;

?>