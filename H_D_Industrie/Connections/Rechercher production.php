<?php require_once('H_D_Industrie.php'); ?>
<?php
$colname_Recordset1 = "-1";
if (isset($_POST['Code_référence'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_POST['Code_référence'] : addslashes($_POST['Code_référence']);
}
mysql_select_db($database_H_D_Industrie, $H_D_Industrie);
$query_Recordset1 = sprintf("SELECT * FROM production WHERE Code_référence = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $H_D_Industrie) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<style type="text/css">
<!--
body {
	background-image: url(../Image/IMG_1210.PNG);
}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
Code_r&eacute;f&eacute;rence
<label>
<input name="Code_r&eacute;f&eacute;rence" type="text" id="Code_r&eacute;f&eacute;rence" />
</label>
<label>
<input type="submit" name="Submit" value="Rechercher" />
</label>
</form>
<p>&nbsp;</p>

<table border="1">
  <tr>
    <td>Code_r&eacute;f&eacute;rence</td>
    <td>Nom_prod</td>
    <td>Quantite</td>
    <td>Date_fabrication</td>
    <td>Num&eacute;ro_lot</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['Code_référence']; ?></td>
      <td><?php echo $row_Recordset1['Nom_prod']; ?></td>
      <td><?php echo $row_Recordset1['Quantite']; ?></td>
      <td><?php echo $row_Recordset1['Date_fabrication']; ?></td>
      <td><?php echo $row_Recordset1['Numéro_lot']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p><a href="index"><span class="Style1">Accueil&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
