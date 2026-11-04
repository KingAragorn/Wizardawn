<?php

$qry = wz_query( $connection, "SELECT * FROM menus WHERE mn_inactive=0 AND mn_group='Free Game' ORDER BY mn_name");

while ($ary=wz_fetch_assoc($qry)) :

	echo "<li><a href='" . $ary['mn_link'] . "'>" . $ary['mn_name'] . "</a></li>";

endwhile;

?>