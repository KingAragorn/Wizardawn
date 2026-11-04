<?php

include_once("top.php");

$keyed = 1;
$code = $_GET['cd'];
$key = $_GET['rm'];
$type = $_GET['tp'];
	if ($type == 1){ $map_type = "side_view"; }
	///////////////////////////////////////$key = $key - 1; if ($key < 0){ $key = 0; }
$color = $_GET['cl'];
$map_wide = $_GET['mw'];
$map_high = $_GET['mh'];

$qry = wz_query( $connection, "SELECT * FROM maps_created WHERE mc_code='$code'");
$num = wz_num_rows($qry);
$ary = wz_fetch_assoc($qry);

$drawing = explode("|", $ary['mc_layout']);
$dw = 0;

if ($num == 0){ header("Location:../" . $webdir . "/"); }

echo "</head><body>";

if ($color > 0){$hx_tl_px = "bw_";} // CHANGES SCI-FI GEOS TO BW

$table_wide = ($map_wide * 300) + 300;
$table_high = ($map_high * 300) + 300;

$map_shift_x = 20;
$map_shift_y = 20;

if ($map_type == "side view"){$add_more_div_height = 150;}

$divide_x_and_y_by = 1;

?>

<div id="myMap" style="background-color: #FFFFFF; width: <?php echo $table_wide+$add_more_div_width+$map_shift_x; ?>px; height: <?php echo $table_high+$add_more_div_height+$map_shift_y; ?>px;">

	<?php

	$higher=$map_high+2; while ($higher > 0):

		$wider = $map_wide+2; while ($wider > 0):

		if ($wider == ($map_wide+2))
		{
			if ($higher == ($map_high+2)) // TOP LEFT
			{
				$high_g = 150/$divide_x_and_y_by; $wide_g = 150/$divide_x_and_y_by;
					if ($map_type == "side view"){$high_g = $high_g + 150;}
				$img_y = 0; $img_x = 0;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = $img_x + 150/$divide_x_and_y_by;
			}
			else if ($higher == 1) // BOTTOM LEFT
			{
				$high_g = 150/$divide_x_and_y_by; $wide_g = 150/$divide_x_and_y_by;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = $img_x + 150/$divide_x_and_y_by;
			}
			else // LEFT
			{
				$high_g = 300; $wide_g = 150/$divide_x_and_y_by;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = $img_x + 150/$divide_x_and_y_by;
			}
		}
		else if ($wider == 1)
		{
			if ($higher == ($map_high+2)) // TOP RIGHT
			{
				$high_g = 150/$divide_x_and_y_by; $wide_g = 150/$divide_x_and_y_by;
					if ($map_type == "side view"){$high_g = $high_g + 150;}
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = 0; $img_y = $img_y + 150/$divide_x_and_y_by;
					if ($map_type == "side view"){$img_y = $img_y + 150;}
			}
			else if ($higher == 1) // BOTTOM RIGHT
			{
				$high_g = 150/$divide_x_and_y_by; $wide_g = 150/$divide_x_and_y_by;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x);
			}
			else // RIGHT
			{
				$high_g = 300; $wide_g = 150/$divide_x_and_y_by;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = 0; $img_y = $img_y + 300;
			}
		}
		else
		{
			if ($higher == ($map_high+2)) // TOP
			{
				$high_g = 150/$divide_x_and_y_by; $wide_g = 300;
					if ($map_type == "side view"){$high_g = $high_g + 150;}
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = $img_x + 300;
			}
			else if ($higher == 1) // BOTTOM
			{
				$high_g = 150/$divide_x_and_y_by; $wide_g = 300;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = $img_x + 300;
			}
			else // MAIN
			{
				$main_tile_count = $main_tile_count + 1;
				$high_g = 300; $wide_g = 300;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = $img_x + 300;
			}
		}

		$used_tile = explodeGeomorph( $drawing[$dw] ); $dw++;

	?>
		<div style="<?php echo $placement; ?>"><img src="maps/<?php echo $hx_tl_px . $used_tile['0']; ?>"></div>

<?php

		if ($keyed > 0)
		{
			if (($x_delve == "Complex") || ($x_delve == "Progressive")){ $grids = explode("_", $used_tile['3']); }
			else { $grids = explode("_", $used_tile['1']); }

			$cyc = 0;
			$room_count = count($grids);

			/// TWEAK NUMBER PLACEMENT //////////////////////////////////////
			if ($key > 999){ $pix_y = $pix_y - 9; $pix_x = $pix_x - 9; }
			else if ($key > 99){ $pix_y = $pix_y - 6; $pix_x = $pix_x - 6; }
			else if ($key > 9){ $pix_y = $pix_y - 3; $pix_x = $pix_x - 3; }
			else { $pix_y = $pix_y - 0; $pix_x = $pix_x - 0; }

			while ($room_count > 0) :

				if (($x_delve == "Complex") || ($x_delve == "Progressive"))
				{
					$grids = explode("^", $gridz[$cyc]);
					if (($grid == $grids['0']) && (mt_rand(1,100) >= $x_floor))
					{
						$key=$key+1;
						$room_numb=$room_numb+1;
						$gridder = "<font color='#FF0000'><span style='background-color: #FFFFFF'>" . $key . "</span></font>";
						$cyc=$cyc+1;
					}
				}
				else
				{
					if ($grids[$cyc] > 0)
					{
						$room = roomGeomorph($grids[$cyc],$high_g,$wide_g);
						$key=$key+1;
						$room_numb=$room_numb+1;
						echo "<div style='top:" . ($room['1']+$pix_y) . "px; left:" . ($room['0']+$pix_x) . "px; background-image: url(maps/number_backing.png); background-repeat:repeat; background-attachment:fixed; z-index:100; font-size:12px; color: #FF0000; position:absolute;'>" . $key . "</div>";
					}
					$cyc=$cyc+1;
				}

				$room_count = $room_count - 1;

			endwhile;
} ?>

		<?php $wider=$wider-1; endwhile; ?>

	<?php $higher=$higher-1; endwhile; ?>

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

echo "</body></html>";

?>