<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($map_to_make_here == "normal_delve_map") ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	// TOP LEFT CORNER ///////////////////////////////////////////////////////////////////////////
	$qry1 = "SELECT * FROM geomorphs WHERE done=1 AND spot='tl' AND delve!='X' AND terrain='$pix' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// TOP RIGHT CORNER ///////////////////////////////////////////////////////////////////////////
	$qry2 = "SELECT * FROM geomorphs WHERE done=1 AND spot='tr' AND delve!='X' AND terrain='$pix' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// BOTTOM LEFT CORNER ///////////////////////////////////////////////////////////////////////////
	$qry3 = "SELECT * FROM geomorphs WHERE done=1 AND spot='bl' AND delve!='X' AND terrain='$pix' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// BOTTOM RIGHT CORNER ///////////////////////////////////////////////////////////////////////////
	$qry4 = "SELECT * FROM geomorphs WHERE done=1 AND spot='br' AND delve!='X' AND terrain='$pix' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// TOP ///////////////////////////////////////////////////////////////////////////
	$qry5 = "SELECT * FROM geomorphs WHERE done=1 AND spot='t' AND delve!='X' AND terrain='$pix' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// LEFT ///////////////////////////////////////////////////////////////////////////
	$qry6 = "SELECT * FROM geomorphs WHERE done=1 AND spot='l' AND delve!='X' AND terrain='$pix' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// RIGHT ///////////////////////////////////////////////////////////////////////////
	$qry7 = "SELECT * FROM geomorphs WHERE done=1 AND spot='r' AND delve!='X' AND terrain='$pix' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// BOTTOM ///////////////////////////////////////////////////////////////////////////
	$qry8 = "SELECT * FROM geomorphs WHERE done=1 AND spot='b' AND delve!='X' AND terrain='$pix' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// TILE ///////////////////////////////////////////////////////////////////////////
	$qry9 = "SELECT * FROM geomorphs WHERE done=1 $dlwt AND spot='' AND delve!='X' AND terrain='$pix' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	?>
	<table border="0" cellpadding="0" cellspacing="0" width="<?php echo $table_wide; ?>" height="<?php echo $table_high; ?>">

		<?php $higher=$map_high+2; while ($higher > 0): ?>

		<tr>

		<?php $wider = $map_wide+2; while ($wider > 0):
			if ($wider == ($map_wide+2))
			{
				if ($higher == ($map_high+2))
				{
					$x=150; $y=150; $trow=5; $tcol=5;
					$res = wz_query( $connection, $qry1 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else if ($higher == 1)
				{
					$x=150; $y=150; $trow=5; $tcol=5;
					$res = wz_query( $connection, $qry3 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else
				{
					$x=300; $y=150; $trow=10; $tcol=5;
					$res = wz_query( $connection, $qry6 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
			}
			else if ($wider == 1)
			{
				if ($higher == ($map_high+2))
				{
					$x=150; $y=150; $trow=5; $tcol=5;
					$res = wz_query( $connection, $qry2 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else if ($higher == 1)
				{
					$x=150; $y=150; $trow=5; $tcol=5;
					$res = wz_query( $connection, $qry4 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else
				{
					$x=300; $y=150; $trow=10; $tcol=5;
					$res = wz_query( $connection, $qry7 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
			}
			else
			{
				if ($higher == ($map_high+2))
				{
					$x=150; $y=300; $trow=5; $tcol=10;
					$res = wz_query( $connection, $qry5 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else if ($higher == 1)
				{
					$x=150; $y=300; $trow=5; $tcol=10;
					$res = wz_query( $connection, $qry8 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else
				{
					$x=300; $y=300; $trow=10; $tcol=10;
					$res = wz_query( $connection, $qry9 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
			}

			$grids = explode("_", $tile[coord]);
		?>
			<td style="background: url(maps/<?php echo $tile[image]; ?>) no-repeat 0 0;" height="<?php echo $x; ?>" width="<?php echo $y; ?>">

				<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">

				<?php $rowz=$trow; $grid=0; $cyc=0; while ($rowz > 0): ?>
				<tr>
					<?php $colz=$tcol; while ($colz > 0): $grid=$grid+1; if ($grid == $grids[$cyc]){$key=$key+1; $gridder = "<font color='#FF0000'><span style='background-color: #FFFFFF'>" . $key . "</span></font>"; $cyc=$cyc+1; } else {$gridder = "&nbsp;";} ?>
					<td align="center" width="30" height="30"><font size="2"><?php echo $gridder; ?></font></td>
					<?php $colz=$colz-1; endwhile; ?>
				</tr>
				<?php $rowz=$rowz-1; endwhile; ?>

				</table>

			</td>

			<?php $wider=$wider-1; endwhile; ?>

		</tr>

		<?php $higher=$higher-1; endwhile; ?>

	</table><?php
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if ($map_to_make_here == "normal_hex_map") /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	if ($do_a_sewer_map == 1){$sewer_need_room = "AND coord!=''";} else {$sewer_need_room = "";}

	// TOP LEFT CORNER ///////////////////////////////////////////////////////////////////////////
	$qry1 = "SELECT * FROM geomorphs WHERE done=1 AND spot='tl' AND terrain='$pix' $no_way_out ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	// TOP RIGHT CORNER ///////////////////////////////////////////////////////////////////////////
	$qry2 = "SELECT * FROM geomorphs WHERE done=1 AND spot='tr' AND terrain='$pix' $no_way_out ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	// BOTTOM LEFT CORNER ///////////////////////////////////////////////////////////////////////////
	$qry3 = "SELECT * FROM geomorphs WHERE done=1 AND spot='bl' AND terrain='$pix' $no_way_out ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	// BOTTOM RIGHT CORNER ///////////////////////////////////////////////////////////////////////////
	$qry4 = "SELECT * FROM geomorphs WHERE done=1 AND spot='br' AND terrain='$pix' $no_way_out ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	// TOP ///////////////////////////////////////////////////////////////////////////
	$qry5 = "SELECT * FROM geomorphs WHERE done=1 AND spot='t' AND terrain='$pix' $no_way_out ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	// LEFT ///////////////////////////////////////////////////////////////////////////
	$qry6 = "SELECT * FROM geomorphs WHERE done=1 AND spot='l' AND terrain='$pix' $no_way_out ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	// RIGHT ///////////////////////////////////////////////////////////////////////////
	$qry7 = "SELECT * FROM geomorphs WHERE done=1 AND spot='r' AND terrain='$pix' $no_way_out ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	// BOTTOM ///////////////////////////////////////////////////////////////////////////
	$qry8 = "SELECT * FROM geomorphs WHERE done=1 AND spot='b' AND terrain='$pix' $no_way_out ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	// TILE ///////////////////////////////////////////////////////////////////////////
	$qry9 = "SELECT * FROM geomorphs WHERE done=1 $sewer_need_room AND spot='' AND terrain='$pix' $no_way_out ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	?>
	<table border="0" cellpadding="0" cellspacing="0" width="<?php echo $table_wide; ?>" height="<?php echo $table_high; ?>">

		<?php $higher=$map_high+2; while ($higher > 0): ?>

		<tr>

		<?php $wider = $map_wide+2; while ($wider > 0):
			if ($wider == ($map_wide+2))
			{
				if ($higher == ($map_high+2))
				{
					$x=150; $y=150; $trow=5; $tcol=5;
					$res = wz_query( $connection, $qry1 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else if ($higher == 1)
				{
					$x=150; $y=150; $trow=5; $tcol=5;
					$res = wz_query( $connection, $qry3 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else
				{
					$x=300; $y=150; $trow=10; $tcol=5;
					$res = wz_query( $connection, $qry6 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
			}
			else if ($wider == 1)
			{
				if ($higher == ($map_high+2))
				{
					$x=150; $y=150; $trow=5; $tcol=5;
					$res = wz_query( $connection, $qry2 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else if ($higher == 1)
				{
					$x=150; $y=150; $trow=5; $tcol=5;
					$res = wz_query( $connection, $qry4 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else
				{
					$x=300; $y=150; $trow=10; $tcol=5;
					$res = wz_query( $connection, $qry7 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
			}
			else
			{
				if ($higher == ($map_high+2))
				{
					$x=150; $y=300; $trow=5; $tcol=10;
					$res = wz_query( $connection, $qry5 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else if ($higher == 1)
				{
					$x=150; $y=300; $trow=5; $tcol=10;
					$res = wz_query( $connection, $qry8 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else
				{
					$x=300; $y=300; $trow=10; $tcol=10;
					$res = wz_query( $connection, $qry9 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
			}

			$grids = explode("_", $tile[coord]);
		?>
			<td style="background: url(maps/<?php echo $hx_tl_px . $tile[image]; ?>) no-repeat 0 0;" height="<?php echo $x; ?>" width="<?php echo $y; ?>">

				<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">

				<?php $rowz=$trow; $grid=0; $cyc=0; while ($rowz > 0): ?>
				<tr>
					<?php $colz=$tcol; while ($colz > 0): $grid=$grid+1; if ($grid == $grids[$cyc]){$key=$key+1; $gridder = "<font color='#FF0000'><span style='background-color: #FFFFFF'>" . $key . "</span></font>"; $cyc=$cyc+1; } else {$gridder = "&nbsp;";} ?>
					<td align="center" width="30" height="30"><font size="2"><?php echo $gridder; ?></font></td>
					<?php $colz=$colz-1; endwhile; ?>
				</tr>
				<?php $rowz=$rowz-1; endwhile; ?>

				</table>

			</td>

			<?php $wider=$wider-1; endwhile; ?>

		</tr>

		<?php $higher=$higher-1; endwhile; ?>

	</table><?php
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if ($map_to_make_here == "normal_keep_map") ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
	$making_kingdom = 1;
	$dock = mt_rand(1,4);
	//if ($dock == 1){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain LIKE 'keep%' OR image='keep_d_01.jpg') AND more!='G'";}
	//else if ($dock == 2){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain LIKE 'keep%' OR image='keep_d_02.jpg') AND more!='G'";}
	//else if ($dock == 3){$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain LIKE 'keep%' OR image='keep_d_03.jpg') AND more!='G'";}
	//else {$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "(terrain LIKE 'keep%' OR image='keep_d_04.jpg') AND more!='G'";}

	$terra1 = $terra2 = $terra3 = $terra4 = $terra5 = $terra6 = $terra7 = $terra8 = "terrain LIKE 'keep%'";

	$terra9 = "terrain='city'";
	$terraZ = "terrain='keep' AND more='G'";

	// TOP LEFT CORNER ///////////////////////////////////////////////////////////////////////////
	$qry1 = "SELECT * FROM geomorphs WHERE done=1 AND $terra1 AND spot='tl' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// TOP RIGHT CORNER ///////////////////////////////////////////////////////////////////////////
	$qry2 = "SELECT * FROM geomorphs WHERE done=1 AND $terra2 AND spot='tr' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// BOTTOM LEFT CORNER ///////////////////////////////////////////////////////////////////////////
	$qry3 = "SELECT * FROM geomorphs WHERE done=1 AND $terra3 AND spot='bl' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// BOTTOM RIGHT CORNER ///////////////////////////////////////////////////////////////////////////
	$qry4 = "SELECT * FROM geomorphs WHERE done=1 AND $terra4 AND spot='br' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// TOP ///////////////////////////////////////////////////////////////////////////
	$qry5 = "SELECT * FROM geomorphs WHERE done=1 AND $terra5 AND spot='t' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// LEFT ///////////////////////////////////////////////////////////////////////////
	$qry6 = "SELECT * FROM geomorphs WHERE done=1 AND $terra6 AND spot='l' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// RIGHT ///////////////////////////////////////////////////////////////////////////
	$qry7 = "SELECT * FROM geomorphs WHERE done=1 AND $terra7 AND spot='r' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// BOTTOM ///////////////////////////////////////////////////////////////////////////
	$qry8 = "SELECT * FROM geomorphs WHERE done=1 AND $terra8 AND spot='b' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// TILE ///////////////////////////////////////////////////////////////////////////
	$qry9 = "SELECT * FROM geomorphs WHERE done=1 AND $terra9 AND spot='' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	// KEEP CITY GATES ////////////////////////////////////////////////////////////////
	// TOP ///////////////////////////////////////////////////////////////////////////
	$qry5z = "SELECT * FROM geomorphs WHERE done=1 AND $terraZ AND spot='t' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	// LEFT ///////////////////////////////////////////////////////////////////////////
	$qry6z = "SELECT * FROM geomorphs WHERE done=1 AND $terraZ AND spot='l' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	// RIGHT ///////////////////////////////////////////////////////////////////////////
	$qry7z = "SELECT * FROM geomorphs WHERE done=1 AND $terraZ AND spot='r' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	// BOTTOM ///////////////////////////////////////////////////////////////////////////
	$qry8z = "SELECT * FROM geomorphs WHERE done=1 AND $terraZ AND spot='b' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
	// CASTLE ///////////////////////////////////////////////////////////////////////////
	$qryAz = "SELECT * FROM geomorphs WHERE done=1 AND $castle ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

	?>
	<table border="0" cellpadding="0" cellspacing="0" width="<?php echo $table_wide; ?>" height="<?php echo $table_high; ?>">

		<?php $higher=$map_high+2; while ($higher > 0): ?>

		<tr>

		<?php $wider = $map_wide+2; while ($wider > 0):
			if ($wider == ($map_wide+2))
			{
				if ($higher == ($map_high+2))
				{
					$x=150; $y=150; $trow=5; $tcol=5;
					$res = wz_query( $connection, $qry1 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else if ($higher == 1)
				{
					$x=150; $y=150; $trow=5; $tcol=5;
					$res = wz_query( $connection, $qry3 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else
				{
					$x=300; $y=150; $trow=10; $tcol=5;
					if (($making_kingdom == 1) && (mt_rand(1,4) == 1) && ($keep_left_gate != 1)){$res = wz_query( $connection, $qry6z ); /* qry. */ $keep_left_gate = 1;}
					else {$res = wz_query( $connection, $qry6 ); /* qry. */}
					$tile = wz_fetch_assoc($res);
				}
			}
			else if ($wider == 1)
			{
				if ($higher == ($map_high+2))
				{
					$x=150; $y=150; $trow=5; $tcol=5;
					$res = wz_query( $connection, $qry2 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else if ($higher == 1)
				{
					$x=150; $y=150; $trow=5; $tcol=5;
					$res = wz_query( $connection, $qry4 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else
				{
					$x=300; $y=150; $trow=10; $tcol=5;
					if (($making_kingdom == 1) && (mt_rand(1,4) == 1) && ($keep_right_gate != 1)){$res = wz_query( $connection, $qry7z ); /* qry. */ $keep_right_gate = 1;}
					else {$res = wz_query( $connection, $qry7 ); /* qry. */}
					$tile = wz_fetch_assoc($res);
				}
			}
			else
			{
				if ($higher == ($map_high+2))
				{
					$x=150; $y=300; $trow=5; $tcol=10;
					$res = wz_query( $connection, $qry5 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else if ($higher == 1)
				{
					$x=150; $y=300; $trow=5; $tcol=10;
					$res = wz_query( $connection, $qry8 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
				else
				{
					$x=300; $y=300; $trow=10; $tcol=10;
					$res = wz_query( $connection, $qry9 ); /* qry. */
					$tile = wz_fetch_assoc($res);
				}
			}

			$grids = explode("_", $tile[coord]);
		?>
			<td style="background: url(maps/<?php echo $tile[image]; ?>) no-repeat 0 0;" height="<?php echo $x; ?>" width="<?php echo $y; ?>">

				<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">

				<?php $rowz=$trow; $grid=0; $cyc=0; while ($rowz > 0): ?>
				<tr>
					<?php $colz=$tcol; while ($colz > 0): $grid=$grid+1; if ($grid == $grids[$cyc]){$key=$key+1; $gridder = "<font color='#FF0000'><span style='background-color: #FFFFFF'>" . $key . "</span></font>"; $cyc=$cyc+1; } else {$gridder = "&nbsp;";} ?>
					<td align="center" width="30" height="30"><font size="2"><?php echo $gridder; ?></font></td>
					<?php $colz=$colz-1; endwhile; ?>
				</tr>
				<?php $rowz=$rowz-1; endwhile; ?>

				</table>

			</td>

			<?php $wider=$wider-1; endwhile; ?>

		</tr>

		<?php $higher=$higher-1; endwhile; ?>

	</table><?php




}
?>