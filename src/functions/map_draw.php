<?php

$geomorph_colored = $_POST['geomorph_colored'];
	if ($geomorph_colored > 0){$hx_tl_px = "bw_";} // CHANGES SCI-FI GEOS TO BW

if ($map_numbers > 0){ $key = $map_numbers; } else { $key = 0; }

$table_wide = ($map_wide * 300) + 300;
$table_high = ($map_high * 300) + 350;

if ($side_view > 0) ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{

// TOP LEFT CORNER ///////////////////////////////////////////////////////////////////////////
$qry1 = "SELECT * FROM geomorphs WHERE done=1 AND image LIKE 'dgside_c%' AND spot='tl' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

// TOP RIGHT CORNER ///////////////////////////////////////////////////////////////////////////
$qry2 = "SELECT * FROM geomorphs WHERE done=1 AND image LIKE 'dgside_c%' AND spot='tr' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

// BOTTOM LEFT CORNER ///////////////////////////////////////////////////////////////////////////
$qry3 = "SELECT * FROM geomorphs WHERE done=1 AND image LIKE 'dgside_b%' AND spot='bl' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

// BOTTOM RIGHT CORNER ///////////////////////////////////////////////////////////////////////////
$qry4 = "SELECT * FROM geomorphs WHERE done=1 AND image LIKE 'dgside_b%' AND spot='br' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

// TOP ///////////////////////////////////////////////////////////////////////////
$qry5 = "SELECT * FROM geomorphs WHERE done=1 AND image LIKE 'dgside_t%' AND spot='t' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

// LEFT ///////////////////////////////////////////////////////////////////////////
$qry6 = "SELECT * FROM geomorphs WHERE done=1 AND image LIKE 'dgside_s%' AND spot='l' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

// RIGHT ///////////////////////////////////////////////////////////////////////////
$qry7 = "SELECT * FROM geomorphs WHERE done=1 AND image LIKE 'dgside_s%' AND spot='r' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

// BOTTOM ///////////////////////////////////////////////////////////////////////////
$qry8 = "SELECT * FROM geomorphs WHERE done=1 AND image LIKE 'dgside_b%' AND spot='b' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

// TILE ///////////////////////////////////////////////////////////////////////////
$qry9 = "SELECT * FROM geomorphs WHERE done=1 AND image LIKE 'dgside%' AND spot='' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

?>
<div style="width: <?php echo $table_wide; ?>px; height: <?php echo $table_high+150; ?>px; overflow: hidden; display: inline-block;" id="myMap"><table border="0" cellpadding="0" cellspacing="0" width="<?php echo $table_wide; ?>" height="<?php echo $table_high; ?>">

	<?php $higher=$map_high+2; while ($higher > 0): ?>

	<tr>

	<?php $wider = $map_wide+2; while ($wider > 0):
		if ($wider == ($map_wide+2))
		{
			if ($higher == ($map_high+2))
			{
				$x=300; $y=150; $trow=10; $tcol=5;
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
				$x=300; $y=150; $trow=10; $tcol=5;
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
				$x=300; $y=300; $trow=10; $tcol=10;
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

		if (($x_delve == "Complex") || ($x_delve == "Progressive"))
		{
			$gridz = explode("_", $tile[more]);
		}
		else
		{
			$grids = explode("_", $tile[coord]);
		}
	?>
		<td style="background: url(maps/<?php echo $tile[image]; ?>) no-repeat 0 0;" height="<?php echo $x; ?>" width="<?php echo $y; ?>">

<?php if ($keyed > 0){?>

			<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">

			<?php $rowz=$trow; $grid=0; $cyc=0; while ($rowz > 0): ?>
			<tr>
			    <?php $colz=$tcol;
					while ($colz > 0):
						$grid=$grid+1;

						if (($x_delve == "Complex") || ($x_delve == "Progressive"))
						{
							$grids = explode("^", $gridz[$cyc]);
							if (($grid == $grids[0]) && (mt_rand(1,100) >= $x_floor))
							{
								$key=$key+1;
								if ($map_type != "Side View")
								{
									$tadlvf = "INSERT INTO $delve_table (vkey, vtype, vsize) VALUES ('$key', '$grids[1]', '$grids[2]')";
									wz_query( $connection, $tadlvf ); /* tadlvf. */
								}
								$gridder = "<font color='#FF0000'><span style='background-color: #FFFFFF'>" . $key . "</span></font>";
								$cyc=$cyc+1;
							}
							else {$gridder = "&nbsp;";}
						}
						else
						{
							if ($grid == $grids[$cyc])
							{
								$key=$key+1;
								$gridder = "<font color='#FF0000'><span style='background-color: #FFFFFF'>" . $key . "</span></font>";
								$cyc=$cyc+1;
							}
							else {$gridder = "&nbsp;";}
						}
				?>
				<td align="center" width="30" height="30"><font size="2"><?php echo $gridder; ?></font></td>
			    <?php $colz=$colz-1; endwhile; ?>
			</tr>
			<?php $rowz=$rowz-1; endwhile; ?>

			</table>

<?php } ?>

		</td>

		<?php $wider=$wider-1; endwhile; ?>

	</tr>

	<?php $higher=$higher-1; endwhile; ?>

</table></div>

<?php if ($allow_image_download == 1 ){ ?>
<script language="javascript">
	function capture() {
		$('#myMap').html2canvas({
			width: 3600,
			height: 3600,
			onrendered: function (canvas) {
				$('#img_val').val(canvas.toDataURL("image/png"));
				document.getElementById("myForm").submit();
			}
		});
	}
</script>
<br><input type="submit" value="Save Map As Image" onclick="capture();" />
<form method="POST" enctype="multipart/form-data" action="functions/save_image.php" id="myForm">
    <input type="hidden" name="img_val" id="img_val" value="" />
</form>
<?php } ?>

<?php

}
else /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
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
$qry9m = "SELECT * FROM geomorphs WHERE done=1 AND $terra9 ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";

// SEWER ROOM TILE ////////////////////////////////////////////////////////////////
$qry10 = "SELECT * FROM geomorphs WHERE done=1 AND $terra9 AND coord!='' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
$qry11 = "SELECT * FROM geomorphs WHERE done=1 AND $terra9 AND coord='' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";


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

?><div style="width: <?php echo $table_wide+5; ?>px; height: <?php echo $table_high+5; ?>px; overflow: hidden; display: inline-block;" id="myMap"><?php

$higher=$map_high+2; while ($higher > 0): $wider = $map_wide+2; while ($wider > 0):

		if ($wider == ($map_wide+2))
		{
			if ($higher == ($map_high+2)) // TOP LEFT CORNER
			{
				$coorx = 1; $x=10; $y=10; $do_x=150; $res = wz_query( $connection, $qry1 ); /* qry. */
			}
			else if ($higher == 1) ///////// BOTTOM LEFT CORNER
			{
				$coorx = 1; $x=10; $y=$y+300; $do_x=150; $res = wz_query( $connection, $qry3 ); /* qry. */
			}
			else /////////////////////////// LEFT SIDE
			{
				$coorx = 2; $x=10; $y=$y+$do_y; $do_x=150; $do_y = 300;
				if (($making_kingdom == 1) && (mt_rand(1,4) == 1) && ($keep_left_gate != 1)){$res = wz_query( $connection, $qry6z ); /* qry. */ $keep_left_gate = 1;}
				else {$res = wz_query( $connection, $qry6 ); /* qry. */}
			}
		}
		else if ($wider == 1)
		{
			if ($higher == ($map_high+2)) // TOP RIGHT CORNER
			{
				$coorx = 1; $x=$x+300; $y=10; $do_y = 150; $res = wz_query( $connection, $qry2 ); /* qry. */
			}
			else if ($higher == 1) ///////// BOTTOM RIGHT CORNER
			{
				$coorx = 1; $x=$x+300; $y=$y; $res = wz_query( $connection, $qry4 ); /* qry. */
			}
			else /////////////////////////// RIGHT SIDE
			{
				$coorx = 2; $x=$x+300; $y=$y;
				if (($making_kingdom == 1) && (mt_rand(1,4) == 1) && ($keep_right_gate != 1)){$res = wz_query( $connection, $qry7z ); /* qry. */ $keep_right_gate = 1;}
				else {$res = wz_query( $connection, $qry7 ); /* qry. */}
			}
		}
		else
		{
			if ($higher == ($map_high+2)) // TOP
			{
				$coorx = 4; $x=$x+$do_x; $y=10; $do_x=300;
				if (($making_kingdom == 1) && (mt_rand(1,4) == 1) && ($keep_top_gate != 1)){$res = wz_query( $connection, $qry5z ); /* qry. */ $keep_top_gate = 1;}
				else {$res = wz_query( $connection, $qry5 ); /* qry. */}
			}
			else if ($higher == 1) //////// BOTTOM
			{
				$coorx = 4; $x=$x+$do_x; $y=$y; $do_x=300;
				if (($making_kingdom == 1) && (mt_rand(1,4) == 1) && ($keep_bottom_gate != 1)){$res = wz_query( $connection, $qry8z ); /* qry. */ $keep_bottom_gate = 1;}
				else {$res = wz_query( $connection, $qry8 ); /* qry. */}
			}
			else ////////////////////////// MAIN
			{
				$coorx = 3; $x=$x+$do_x; $y=$y; $do_x=300;

				$main_tile_count = $main_tile_count + 1; // COUNT THE MAIN TILES AS THEY ARE USED

				if (($countapp == "Sewer Maps") && (mt_rand(1,100) > $halls))
				{
					$res = wz_query( $connection, $qry11 ); /* qry. */
				}
				else if ($countapp == "Sewer Maps")
				{
					$res = wz_query( $connection, $qry10 ); /* qry. */
				}
				else if (($place_castle == $main_tile_count) && ($place_castle > 0))
				{
					$res = wz_query( $connection, $qryAz ); /* qry. */ $place_castle = 0;
				}
				else if (($countapp == "Sci-Fi Maps") || ($countapp == "Future Labyrinth") || ($countapp == "Mutant Adventure"))
				{
					$noah_tic = $noah_tic + 1;

					if ($noah_tic == 1){ $noah_t = "tleft.jpg"; $noah_new = 1 + $map_wide; }
					else if ($noah_tic < $map_wide){ $noah_t = "top.jpg"; }
					else if ($noah_tic == $map_wide){ $noah_t = "tright.jpg"; $noah_end = $map_wide * 2; }
					else if ($noah_tic == (($map_high * $map_wide) - ($map_wide - 1))){ $noah_t = "bleft.jpg"; }
					else if ($noah_tic == ($map_high * $map_wide)){ $noah_t = "bright.jpg"; }
					else if ($noah_tic > (($map_high * $map_wide) - ($map_wide - 1))){ $noah_t = "bottom.jpg"; }
					else if ($noah_tic == $noah_new){ $noah_t = "xleft.jpg"; $noah_new = $noah_new + $map_wide; }
					else if ($noah_tic == $noah_end){ $noah_t = "xright.jpg"; $noah_end = $noah_end + $map_wide; }
					else {$noah_t = "";}

					if (($x_mappack == "Exodus Spaceship") && ($noah_t != ""))
					{
						$maq = "SELECT * FROM geomorphs WHERE done=1 AND $terra9m AND spot='' AND image LIKE '%$noah_t' ORDER BY RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND(), RAND() LIMIT 1";
						$res = wz_query( $connection, $maq ); /* maq. */
					}
					else
					{
						$res = wz_query( $connection, $qry9m ); /* qry. */
					}
				}
				else
				{
					$res = wz_query( $connection, $qry9 ); /* qry. */
				}
			}
		}

		$tile = wz_fetch_assoc($res);

		$grids = explode("_", $tile[coord]);
	?>
		<div style="position:absolute;top:<?php echo $y; ?>px; left:<?php echo $x; ?>px; z-index:1;"><img src="maps/<?php echo $hx_tl_px . $tile[image]; ?>">

		<?php if ($keyed == 1)
			{
				$cyc=0;
				$grid = count($grids);

				while ($grid > 0) :

				
					if ($key > 999){$xm=10; $xi=29;}
					else if ($key > 99){$xm=5; $xi=22;}
					else if ($key > 9){$xm=2; $xi=15;}
					else {$xm=0; $xi=10;}
				$grid=$grid-1;

				if ($grids[$cyc] > 0)
				{

				$x1 = 10;	$x2 = 30;

				if ($coorx == 1) // CORNERS
				{
					if ($grids[$cyc] < 6){$tb_y=$x1;}
					else if ($grids[$cyc] < 11){$tb_y=($x1+$x2);}
					else if ($grids[$cyc] < 16){$tb_y=($x1+($x2*2));}
					else if ($grids[$cyc] < 21){$tb_y=($x1+($x2*3));}
					else {$tb_y=($x1+($x2*4));}

					if (($grids[$cyc] == 1) || ($grids[$cyc] == 6) || ($grids[$cyc] == 11) || ($grids[$cyc] == 16) || ($grids[$cyc] == 21)){$tb_x=$x1;}
					else if (($grids[$cyc] == 2) || ($grids[$cyc] == 7) || ($grids[$cyc] == 12) || ($grids[$cyc] == 17) || ($grids[$cyc] == 22)){$tb_x=($x1+$x2);}
					else if (($grids[$cyc] == 3) || ($grids[$cyc] == 8) || ($grids[$cyc] == 13) || ($grids[$cyc] == 18) || ($grids[$cyc] == 23)){$tb_x=($x1+($x2*2));}
					else if (($grids[$cyc] == 4) || ($grids[$cyc] == 9) || ($grids[$cyc] == 14) || ($grids[$cyc] == 19) || ($grids[$cyc] == 24)){$tb_x=($x1+($x2*3));}
					else {$tb_x=($x1+($x2*4));}
				}
				else if (($coorx == 2) || ($coorx == 11)) // SIDES
				{
					if ($grids[$cyc] < 6){$tb_y=$x1;}
					else if ($grids[$cyc] < 11){$tb_y=($x1+$x2);}
					else if ($grids[$cyc] < 16){$tb_y=($x1+($x2*2));}
					else if ($grids[$cyc] < 21){$tb_y=($x1+($x2*3));}
					else if ($grids[$cyc] < 26){$tb_y=($x1+($x2*4));}
					else if ($grids[$cyc] < 31){$tb_y=($x1+($x2*5));}
					else if ($grids[$cyc] < 36){$tb_y=($x1+($x2*6));}
					else if ($grids[$cyc] < 41){$tb_y=($x1+($x2*7));}
					else if ($grids[$cyc] < 46){$tb_y=($x1+($x2*8));}
					else {$tb_y=($x1+($x2*9));}

					if (($grids[$cyc] == 1) || ($grids[$cyc] == 6) || ($grids[$cyc] == 11) || ($grids[$cyc] == 16) || ($grids[$cyc] == 21) || ($grids[$cyc] == 26) || ($grids[$cyc] == 31) || ($grids[$cyc] == 36) || ($grids[$cyc] == 41) || ($grids[$cyc] == 46)){$tb_x=$x1;}
					else if (($grids[$cyc] == 2) || ($grids[$cyc] == 7) || ($grids[$cyc] == 12) || ($grids[$cyc] == 17) || ($grids[$cyc] == 22) || ($grids[$cyc] == 27) || ($grids[$cyc] == 32) || ($grids[$cyc] == 37) || ($grids[$cyc] == 42) || ($grids[$cyc] == 47)){$tb_x=($x1+$x2);}
					else if (($grids[$cyc] == 3) || ($grids[$cyc] == 8) || ($grids[$cyc] == 13) || ($grids[$cyc] == 18) || ($grids[$cyc] == 23) || ($grids[$cyc] == 28) || ($grids[$cyc] == 33) || ($grids[$cyc] == 38) || ($grids[$cyc] == 43) || ($grids[$cyc] == 48)){$tb_x=($x1+($x2*2));}
					else if (($grids[$cyc] == 4) || ($grids[$cyc] == 9) || ($grids[$cyc] == 14) || ($grids[$cyc] == 19) || ($grids[$cyc] == 24) || ($grids[$cyc] == 29) || ($grids[$cyc] == 34) || ($grids[$cyc] == 39) || ($grids[$cyc] == 44) || ($grids[$cyc] == 49)){$tb_x=($x1+($x2*3));}
					else {$tb_x=($x1+($x2*4));}
				}
				else if (($coorx == 3) || ($coorx == 14)) // MAIN
				{
					if ($grids[$cyc] < 11){$tb_y=$x1;}
					else if ($grids[$cyc] < 21){$tb_y=($x1+$x2);}
					else if ($grids[$cyc] < 31){$tb_y=($x1+($x2*2));}
					else if ($grids[$cyc] < 41){$tb_y=($x1+($x2*3));}
					else if ($grids[$cyc] < 51){$tb_y=($x1+($x2*4));}
					else if ($grids[$cyc] < 61){$tb_y=($x1+($x2*5));}
					else if ($grids[$cyc] < 71){$tb_y=($x1+($x2*6));}
					else if ($grids[$cyc] < 81){$tb_y=($x1+($x2*7));}
					else if ($grids[$cyc] < 91){$tb_y=($x1+($x2*8));}
					else {$tb_y=($x1+($x2*9));}

					if (($grids[$cyc] == 1) || ($grids[$cyc] == 11) || ($grids[$cyc] == 21) || ($grids[$cyc] == 31) || ($grids[$cyc] == 41) || ($grids[$cyc] == 51) || ($grids[$cyc] == 61) || ($grids[$cyc] == 71) || ($grids[$cyc] == 81) || ($grids[$cyc] == 91)){$tb_x=$x1;}
					else if (($grids[$cyc] == 2) || ($grids[$cyc] == 12) || ($grids[$cyc] == 22) || ($grids[$cyc] == 32) || ($grids[$cyc] == 42) || ($grids[$cyc] == 52) || ($grids[$cyc] == 62) || ($grids[$cyc] == 72) || ($grids[$cyc] == 82) || ($grids[$cyc] == 92)){$tb_x=($x1+$x2);}
					else if (($grids[$cyc] == 3) || ($grids[$cyc] == 13) || ($grids[$cyc] == 23) || ($grids[$cyc] == 33) || ($grids[$cyc] == 43) || ($grids[$cyc] == 53) || ($grids[$cyc] == 63) || ($grids[$cyc] == 73) || ($grids[$cyc] == 83) || ($grids[$cyc] == 93)){$tb_x=($x1+($x2*2));}
					else if (($grids[$cyc] == 4) || ($grids[$cyc] == 14) || ($grids[$cyc] == 24) || ($grids[$cyc] == 34) || ($grids[$cyc] == 44) || ($grids[$cyc] == 54) || ($grids[$cyc] == 64) || ($grids[$cyc] == 74) || ($grids[$cyc] == 84) || ($grids[$cyc] == 94)){$tb_x=($x1+($x2*3));}
					else if (($grids[$cyc] == 5) || ($grids[$cyc] == 15) || ($grids[$cyc] == 25) || ($grids[$cyc] == 35) || ($grids[$cyc] == 45) || ($grids[$cyc] == 55) || ($grids[$cyc] == 65) || ($grids[$cyc] == 75) || ($grids[$cyc] == 85) || ($grids[$cyc] == 95)){$tb_x=($x1+($x2*4));}
					else if (($grids[$cyc] == 6) || ($grids[$cyc] == 16) || ($grids[$cyc] == 26) || ($grids[$cyc] == 36) || ($grids[$cyc] == 46) || ($grids[$cyc] == 56) || ($grids[$cyc] == 66) || ($grids[$cyc] == 76) || ($grids[$cyc] == 86) || ($grids[$cyc] == 96)){$tb_x=($x1+($x2*5));}
					else if (($grids[$cyc] == 7) || ($grids[$cyc] == 17) || ($grids[$cyc] == 27) || ($grids[$cyc] == 37) || ($grids[$cyc] == 47) || ($grids[$cyc] == 57) || ($grids[$cyc] == 67) || ($grids[$cyc] == 77) || ($grids[$cyc] == 87) || ($grids[$cyc] == 97)){$tb_x=($x1+($x2*6));}
					else if (($grids[$cyc] == 8) || ($grids[$cyc] == 18) || ($grids[$cyc] == 28) || ($grids[$cyc] == 38) || ($grids[$cyc] == 48) || ($grids[$cyc] == 58) || ($grids[$cyc] == 68) || ($grids[$cyc] == 78) || ($grids[$cyc] == 88) || ($grids[$cyc] == 98)){$tb_x=($x1+($x2*7));}
					else if (($grids[$cyc] == 9) || ($grids[$cyc] == 19) || ($grids[$cyc] == 29) || ($grids[$cyc] == 39) || ($grids[$cyc] == 49) || ($grids[$cyc] == 59) || ($grids[$cyc] == 69) || ($grids[$cyc] == 79) || ($grids[$cyc] == 89) || ($grids[$cyc] == 99)){$tb_x=($x1+($x2*8));}
					else {$tb_x=($x1+($x2*9));}
				}
				else // CAPS
				{
					if ($grids[$cyc] < 11){$tb_y=$x1;}
					else if ($grids[$cyc] < 21){$tb_y=($x1+$x2);}
					else if ($grids[$cyc] < 31){$tb_y=($x1+($x2*2));}
					else if ($grids[$cyc] < 41){$tb_y=($x1+($x2*3));}
					else {$tb_y=($x1+($x2*4));}

					if (($grids[$cyc] == 1) || ($grids[$cyc] == 11) || ($grids[$cyc] == 21) || ($grids[$cyc] == 31) || ($grids[$cyc] == 41)){$tb_x=$x1;}
					else if (($grids[$cyc] == 2) || ($grids[$cyc] == 12) || ($grids[$cyc] == 22) || ($grids[$cyc] == 32) || ($grids[$cyc] == 42)){$tb_x=($x1+$x2);}
					else if (($grids[$cyc] == 3) || ($grids[$cyc] == 13) || ($grids[$cyc] == 23) || ($grids[$cyc] == 33) || ($grids[$cyc] == 43)){$tb_x=($x1+($x2*2));}
					else if (($grids[$cyc] == 4) || ($grids[$cyc] == 14) || ($grids[$cyc] == 24) || ($grids[$cyc] == 34) || ($grids[$cyc] == 44)){$tb_x=($x1+($x2*3));}
					else if (($grids[$cyc] == 5) || ($grids[$cyc] == 15) || ($grids[$cyc] == 25) || ($grids[$cyc] == 35) || ($grids[$cyc] == 45)){$tb_x=($x1+($x2*4));}
					else if (($grids[$cyc] == 6) || ($grids[$cyc] == 16) || ($grids[$cyc] == 26) || ($grids[$cyc] == 36) || ($grids[$cyc] == 46)){$tb_x=($x1+($x2*5));}
					else if (($grids[$cyc] == 7) || ($grids[$cyc] == 17) || ($grids[$cyc] == 27) || ($grids[$cyc] == 37) || ($grids[$cyc] == 47)){$tb_x=($x1+($x2*6));}
					else if (($grids[$cyc] == 8) || ($grids[$cyc] == 18) || ($grids[$cyc] == 28) || ($grids[$cyc] == 38) || ($grids[$cyc] == 48)){$tb_x=($x1+($x2*7));}
					else if (($grids[$cyc] == 9) || ($grids[$cyc] == 19) || ($grids[$cyc] == 29) || ($grids[$cyc] == 39) || ($grids[$cyc] == 49)){$tb_x=($x1+($x2*8));}
					else {$tb_x=($x1+($x2*9));}
				}
			?>

				<div style="position:absolute;top:<?php echo $tb_y; ?>px; left:<?php echo ($tb_x-$xm); ?>px; z-index:3; font-size: 12px; color: #FF0000;"><?php echo $key=$key+1; $key; ?></div>
				<div style="position:absolute;top:<?php echo ($tb_y+2); ?>px; left:<?php echo (($tb_x-$xm)-2); ?>px; z-index:2; font-size: 12px; color: #FF0000;"><img width="<?php echo $xi; ?>" height="13" src="maps/number_backing.png"></div>
			<?php } $cyc=$cyc+1; endwhile; }

		echo "</div>";

		$wider=$wider-1; endwhile; $higher=$higher-1; endwhile;

	?>

		</div>

<?php if ($allow_image_download == 1 ){ ?>
<script language="javascript">
	function capture() {
		$('#myMap').html2canvas({
			width: 3600,
			height: 3600,
			onrendered: function (canvas) {
				$('#img_val').val(canvas.toDataURL("image/png"));
				document.getElementById("myForm").submit();
			}
		});
	}
</script>
<br><input type="submit" value="Save Map As Image" onclick="capture();" />
<form method="POST" enctype="multipart/form-data" action="functions/save_image.php" id="myForm">
    <input type="hidden" name="img_val" id="img_val" value="" />
</form>

	<?php } 

}
?>