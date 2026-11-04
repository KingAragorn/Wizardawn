<?php

$art_qry = wz_query( $connection, "SELECT ar_title, ar_text, DATE_FORMAT(ar_date,'%M %D') as ar_day, DATE_FORMAT(ar_date,'%Y') as ar_year FROM articles WHERE TO_DAYS(CURRENT_DATE)<(TO_DAYS(ar_date)+30) ORDER BY ar_id DESC LIMIT 10");
$art_num = wz_num_rows($art_qry);

if ( $art_num > 0 ){ ?>

<table width="100%" border="0" cellspacing="5" cellpadding="5">
<?php while ($art_ary=wz_fetch_assoc($art_qry)) : ?>
  <tr>
    <td width="12%"><img src="pics/article.jpg" width="100" height="100" /></td>
    <td width="88%" valign="top">
		<font size="7"><?php echo $art_ary['ar_title']; ?></font><br />
		<?php echo $art_ary['ar_day']; ?>, <?php echo $art_ary['ar_year']; ?>
	</td>
  </tr>
  <tr>
    <td colspan="2" style="text-align: justify;"><?php echo $art_ary['ar_text']; ?><br><br><br></td>
  </tr>
<?php endwhile; ?>
</table>

<?php } else { ?>

<div align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img src="pics/wizardawn_banner.gif" width="565" height="96" /></td>
  </tr>
  <tr>
    <td align="center"><img src="pics/main.jpg" width="552" height="552" /></td>
  </tr>
</table>
</div>

<?php } ?>