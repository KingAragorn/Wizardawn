<?php

function varyingColors()
{
	switch (mt_rand(0,14))
	{
		case 0:	$color = "bright ";	break;
		case 1:	$color = "dark ";	break;
		case 2:	$color = "deep ";	break;
		case 3:	$color = "dirty ";	break;
		case 4:	$color = "dull ";	break;
		case 5:	$color = "light ";	break;
		case 6:	$color = "shiny ";	break;
		case 7:	$color = "vibrant ";	break;
	}
	return $color;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function clothingColors()
{
	switch (mt_rand(0,11))
	{
		case 0:	$color = "black";							break;
		case 1:	$color = varyingColors() . "blue";			break;
		case 2:	$color = varyingColors() . "brown";			break;
		case 3:	$color = varyingColors() . "gray";			break;
		case 4:	$color = varyingColors() . "green";			break;
		case 5:	$color = varyingColors() . "orange";		break;
		case 6:	$color = varyingColors() . "purple";		break;
		case 7: $color = varyingColors() . "red";			break;
		case 8: $color = varyingColors() . "tan";			break;
		case 9: $color = varyingColors() . "violet";		break;
		case 10:$color = varyingColors() . "white";			break;
		case 11:$color = varyingColors() . "yellow";		break;
	}
	return $color;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function militaryColor()
{
	switch (mt_rand(0,5))
	{
		case 0:	$color = "black";				break;
		case 1:	$color = "green camouflage";	break;
		case 2:	$color = "desert camouflage";	break;
		case 3:	$color = "snow camouflage";		break;
		case 4:	$color = "gray camouflage";		break;
		case 5:	$color = "green";				break;
	}
	return $color;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function fogColor()
{
	$color = array('dark', 'blue', 'gray', 'gray', 'gray', 'gray', 'green', 'red', 'brown', 'orange', 'yellow', 'purple', 'white', 'white', 'white', 'white');
	return $color[mt_rand(0,15)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function beamColor()
{
	$color = array('red', 'blue', 'green', 'orange', 'yellow', 'purple', 'white');
	return $color[mt_rand(0,6)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function candleColor($white)
{
	$color = array('black', 'blue', 'gray', 'green', 'red', 'brown', 'orange', 'yellow', 'purple', 'white');
	if ($white == 1){$zn = 8;} else {$zn = 9;}
	return $color[mt_rand(0,$zn)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function slimeColor()
{
	$color = array('dark', 'blue', 'gray', 'black', 'green', 'red', 'brown', 'orange', 'yellow', 'purple', 'clear', 'white');
	return $color[mt_rand(0,11)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function plainColor()
{
	$color = array('black', 'blue', 'gray', 'green', 'red', 'brown', 'orange', 'yellow', 'tan', 'purple', 'white', 'gold', 'silver', 'bronze', 'copper', 'platinum');
	return $color[mt_rand(0,15)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function leatherColor()
{
	$color = array('black', 'blue', 'gray', 'green', 'red', 'brown', 'brown', 'brown', 'brown', 'brown', 'brown', 'brown', 'brown', 'brown', 'orange', 'yellow', 'tan', 'purple', 'white');
	return $color[mt_rand(0,18)];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function designColor()
{
	$color = array('gold', 'silver', 'scarlet', 'amber', 'azure', 'emerald', 'indigo', 'ivory', 'jade', 'maroon', 'royal blue', 'violet');
	return $color[mt_rand(0,11)];
}

?>