<?php require_once('H_D_Industrie.php'); ?>
<?php
$colname_Recordset1 = "-1";
if (isset($_POST['Num_prod'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_POST['Num_prod'] : addslashes($_POST['Num_prod']);
}
mysql_select_db($database_H_D_Industrie, $H_D_Industrie);
$query_Recordset1 = sprintf("SELECT * FROM produit WHERE Num_prod = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $H_D_Industrie) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><style type="text/css">
<!--
body {
	background-image: url(../Image/IMG_1210.PNG);
}
-->
</style><form name="form1" method="post" action="">
Num_prod
  <label>
  <input name="Num_prod" type="text" id="Num_prod">
  </label>
  <label>
  <input type="submit" name="Submit" value="Rechercher">
  </label>
</form>
<p>&nbsp;</p>

<table border="1">
  <tr>
    <td>Num_prod</td>
    <td>Nom_prod</td>
    <td>Poids</td>
    <td>Date_fabrication</td>
    <td>Date_expiration</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['Num_prod']; ?></td>
      <td><?php echo $row_Recordset1['Nom_prod']; ?></td>
      <td><?php echo $row_Recordset1['Poids']; ?></td>
      <td><?php echo $row_Recordset1['Date_fabrication']; ?></td>
      <td><?php echo $row_Recordset1['Date_expiration']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p>
  <?php
mysql_free_result($Recordset1);
?>
</p>
<p><a href="index"><span class="Style1">Accueil&nbsp;</p>
