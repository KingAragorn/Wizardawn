<?php

include("db.php");

$xls = 0; if ( isset($_POST['xls']) ){ $xls = $_POST['xls']; }

if ($xls > 0)
{
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
		header("Expires: Sat, 01 Jan 2100 00:00:00 GMT");
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		session_cache_limiter("must-revalidate");
	}
	header ("Content-type: application/x-msexcel");
	header ("Content-Disposition: attachment; filename=listing.xls;");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script language="JavaScript" src="java/openWindow.js"></script>
<script type="text/javascript" src="java/html2canvas.js"></script>
<script type="text/javascript" src="java/jquery.js"></script>
<script type="text/javascript" src="java/jquery.plugin.html2canvas.js"></script>

<LINK REL="SHORTCUT ICON" HREF="<?php echo $mm; ?>pics/favicon.ico">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wizardawn</title>