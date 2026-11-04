<?php

$geomorph_colored = $_POST['geomorph_colored'];
	if ($geomorph_colored > 0){$hx_tl_px = "bw_";} // CHANGES SCI-FI GEOS TO BW

if ($map_numbers > 0){ $key = $map_numbers; } else { $key = 0; }

$table_wide = ($map_wide * 300) + 300;
$table_high = ($map_high * 300) + 300;

$map_shift_x = 20;
$map_shift_y = 20;

if ($map_type == "side view"){$add_more_div_height = 150;}
if ($map_type == "suburb map"){$divide_x_and_y_by = 2; $add_more_div_height = -150; $add_more_div_width = -150;} else {$divide_x_and_y_by = 1;}

	if ( $sep_map != 1 )
	{
		echo "<div id='myMap' style='background-color: #FFFFFF; width: " . ($table_wide+$add_more_div_width+$map_shift_x) . "px; height: " . ($table_high+$add_more_div_height+$map_shift_y) . "px;'>";
	}

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
					if ($map_type == "side view"){$this_tile = preg_grep("/dgside_c/", $geomorphic_tiles); $this_tile = preg_grep("/BBBtlCCC/", $this_tile);}
					else {$this_tile = preg_grep("/BBBtlCCC/", $geomorphic_tiles);}
				$this_tile = array_values(array_filter($this_tile)); $pick_tile = array_rand($this_tile, 1);
			}
			else if ($higher == 1) // BOTTOM LEFT
			{
				$high_g = 150/$divide_x_and_y_by; $wide_g = 150/$divide_x_and_y_by;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = $img_x + 150/$divide_x_and_y_by;
					if ($map_type == "side view"){$this_tile = preg_grep("/dgside_b/", $geomorphic_tiles); $this_tile = preg_grep("/BBBblCCC/", $this_tile);}
					else {$this_tile = preg_grep("/BBBblCCC/", $geomorphic_tiles);}
				$this_tile = array_values(array_filter($this_tile)); $pick_tile = array_rand($this_tile, 1);
			}
			else // LEFT
			{
				$high_g = 300; $wide_g = 150/$divide_x_and_y_by;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = $img_x + 150/$divide_x_and_y_by;
					if ($map_type == "side view"){$this_tile = preg_grep("/dgside_s/", $geomorphic_tiles); $this_tile = preg_grep("/BBBlCCC/", $this_tile);}
					else if (($map_type == "Keep") && (mt_rand(1,4) == 1) && ($keep_left_gate != 1)){$keep_left_gate = 1; $this_tile = preg_grep("/EEEkeepFFF/", $geomorphic_tiles); $this_tile = preg_grep("/CCCGDDD/", $this_tile); $this_tile = preg_grep("/BBBlCCC/", $this_tile);}
					else if ($map_type == "Keep"){$this_tile = preg_grep("/EEEkeepFFF|EEEdocksFFF/", $geomorphic_tiles); $this_tile = preg_grep("/CCCDDD/", $this_tile); $this_tile = preg_grep("/BBBlCCC/", $this_tile);}
					else {$this_tile = preg_grep("/BBBlCCC/", $geomorphic_tiles);}
				$this_tile = array_values(array_filter($this_tile)); $pick_tile = array_rand($this_tile, 1);
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
					if ($map_type == "side view"){$this_tile = preg_grep("/dgside_c/", $geomorphic_tiles); $this_tile = preg_grep("/BBBtrCCC/", $this_tile);}
					else {$this_tile = preg_grep("/BBBtrCCC/", $geomorphic_tiles);}
				$this_tile = array_values(array_filter($this_tile)); $pick_tile = array_rand($this_tile, 1);
			}
			else if ($higher == 1) // BOTTOM RIGHT
			{
				$high_g = 150/$divide_x_and_y_by; $wide_g = 150/$divide_x_and_y_by;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); 
					if ($map_type == "side view"){$this_tile = preg_grep("/dgside_b/", $geomorphic_tiles); $this_tile = preg_grep("/BBBbrCCC/", $this_tile);}
					else {$this_tile = preg_grep("/BBBbrCCC/", $geomorphic_tiles);}
				$this_tile = array_values(array_filter($this_tile)); $pick_tile = array_rand($this_tile, 1);
			}
			else // RIGHT
			{
				$high_g = 300; $wide_g = 150/$divide_x_and_y_by;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = 0; $img_y = $img_y + 300;
					if ($map_type == "side view"){$this_tile = preg_grep("/dgside_s/", $geomorphic_tiles); $this_tile = preg_grep("/BBBrCCC/", $this_tile);}
					else if (($map_type == "Keep") && (mt_rand(1,4) == 1) && ($keep_right_gate != 1)){$keep_right_gate = 1; $this_tile = preg_grep("/EEEkeepFFF/", $geomorphic_tiles); $this_tile = preg_grep("/CCCGDDD/", $this_tile); $this_tile = preg_grep("/BBBrCCC/", $this_tile);}
					else if ($map_type == "Keep"){$this_tile = preg_grep("/EEEkeepFFF|EEEdocksFFF/", $geomorphic_tiles); $this_tile = preg_grep("/CCCDDD/", $this_tile); $this_tile = preg_grep("/BBBrCCC/", $this_tile);}
					else {$this_tile = preg_grep("/BBBrCCC/", $geomorphic_tiles);}
				$this_tile = array_values(array_filter($this_tile)); $pick_tile = array_rand($this_tile, 1);
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
					if ($map_type == "side view"){$this_tile = preg_grep("/dgside_t/", $geomorphic_tiles); $this_tile = preg_grep("/BBBtCCC/", $this_tile);}
					else if (($map_type == "Keep") && (mt_rand(1,4) == 1) && ($keep_top_gate != 1)){$keep_top_gate = 1; $this_tile = preg_grep("/EEEkeepFFF/", $geomorphic_tiles); $this_tile = preg_grep("/CCCGDDD/", $this_tile); $this_tile = preg_grep("/BBBtCCC/", $this_tile);}
					else if ($map_type == "Keep"){$this_tile = preg_grep("/EEEkeepFFF|EEEdocksFFF/", $geomorphic_tiles); $this_tile = preg_grep("/CCCDDD/", $this_tile); $this_tile = preg_grep("/BBBtCCC/", $this_tile);}
					else {$this_tile = preg_grep("/BBBtCCC/", $geomorphic_tiles);}
				$this_tile = array_values(array_filter($this_tile)); $pick_tile = array_rand($this_tile, 1);
			}
			else if ($higher == 1) // BOTTOM
			{
				$high_g = 150/$divide_x_and_y_by; $wide_g = 300;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = $img_x + 300;
					if ($map_type == "side view"){$this_tile = preg_grep("/dgside_b/", $geomorphic_tiles); $this_tile = preg_grep("/BBBbCCC/", $this_tile);}
					else if (($map_type == "Keep") && (mt_rand(1,4) == 1) && ($keep_bottom_gate != 1)){$keep_bottom_gate = 1; $this_tile = preg_grep("/EEEkeepFFF/", $geomorphic_tiles); $this_tile = preg_grep("/CCCGDDD/", $this_tile); $this_tile = preg_grep("/BBBbCCC/", $this_tile);}
					else if ($map_type == "Keep"){$this_tile = preg_grep("/EEEkeepFFF|EEEdocksFFF/", $geomorphic_tiles); $this_tile = preg_grep("/CCCDDD/", $this_tile); $this_tile = preg_grep("/BBBbCCC/", $this_tile);}
					else {$this_tile = preg_grep("/BBBbCCC/", $geomorphic_tiles);}
				$this_tile = array_values(array_filter($this_tile)); $pick_tile = array_rand($this_tile, 1);
			}
			else // MAIN
			{
				$main_tile_count = $main_tile_count + 1;
				$high_g = 300; $wide_g = 300;
				$placement = "top: " . ($img_y+$map_shift_y) . "px; left: " . ($img_x+$map_shift_x) . "px; position:absolute; height: " . $high_g . "px; width: " . $wide_g . "px";
				$pix_y = ($img_y+$map_shift_y); $pix_x = ($img_x+$map_shift_x); $img_x = $img_x + 300;

					if ($map_type == "side view"){$this_tile = preg_grep("/dgside/", $geomorphic_tiles); $this_tile = preg_grep("/BBBCCC/", $this_tile);}
					else if (($map_type == "sewer map") && ($halls <= mt_rand(1,100))){$this_tile = preg_grep("/AAABBB/", $geomorphic_tiles); $this_tile = preg_grep("/BBBCCC/", $this_tile);}
					else if ($map_type == "sewer map"){$this_tile = preg_grep("/AAABBB/", $geomorphic_tiles, PREG_GREP_INVERT); $this_tile = preg_grep("/BBBCCC/", $this_tile);}
					else if (($place_castle == $main_tile_count) && ($place_castle > 0)){ $this_tile = preg_grep("/$castle/", $geomorphic_city); $this_tile = preg_grep("/BBBCCC/", $this_tile); $place_castle = 0; }
					else if (($map_type == "Keep") || ($map_type == "City")){$this_tile = preg_grep("/EEEcityFFF/", $geomorphic_city); $this_tile = preg_grep("/BBBCCC/", $this_tile);}
					else if ($map_type == "Exodus Spaceship")
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
								if ($noah_t != ""){$this_tile = preg_grep("/$noah_t/", $geomorphic_tiles); $this_tile = preg_grep("/BBBCCC/", $this_tile);}
								else {$this_tile = preg_grep("/BBBCCC/", $geomorphic_tiles); $this_tile = preg_grep("/tleft.jpg|top.jpg|tright.jpg|bleft.jpg|bright.jpg|bottom.jpg|xleft.jpg|xright.jpg/", $this_tile, PREG_GREP_INVERT); $this_tile = preg_grep("/$inner_climate/", $this_tile);}
					}
					else {$this_tile = preg_grep("/BBBCCC/", $geomorphic_tiles);}

				$this_tile = array_values(array_filter($this_tile));
				$pick_tile = array_rand($this_tile, 1);
			}
		}

		$used_tile = explodeGeomorph( $this_tile[$pick_tile] );

		$tile_stored_in_db = $tile_stored_in_db . $this_tile[$pick_tile] . "|";

		if ( $sep_map != 1 )
		{
			echo "<div style='" . $placement . "'><img src='maps/" . $hx_tl_px . $used_tile[0] . "'></div>";
		}

		if ($keyed > 0)
		{
			if (($x_delve == "Complex") || ($x_delve == "Progressive")){ $grids = explode("_", $used_tile[3]); }
			else { $grids = explode("_", $used_tile[1]); }

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
					if (($grid == $grids[0]) && (mt_rand(1,100) >= $x_floor))
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
						if ( $sep_map != 1 )
						{
							echo "<div style='top:" . ($room[1]+$pix_y) . "px; left:" . ($room[0]+$pix_x) . "px; background-image: url(maps/number_backing.png); background-repeat:repeat; background-attachment:fixed; z-index:100; font-size:12px; color: #FF0000; position:absolute;'>" . $key . "</div>";
						}
					}
					$cyc=$cyc+1;
				}

				if (strpos($this_tile[$pick_tile], '0cave0') !== FALSE){ $has_a_cave = $has_a_cave . "-" . $room_numb; }

				$room_count = $room_count - 1;

			endwhile;
}

		$wider=$wider-1; endwhile;

	$higher=$higher-1; endwhile;

	if (strpos($this_tile[$pick_tile], '0cave0') !== FALSE){ $has_a_cave = $has_a_cave . "-"; }

if ( $sep_map != 1 )
{
	echo "</div>";
}

if ( $allow_image_download == 1 && $sep_map != 1 ){ ?>
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