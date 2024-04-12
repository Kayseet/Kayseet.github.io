<?php require_once('H_D_Industrie.php'); ?>
<?php
$colname_Recordset1 = "-1";
if (isset($_POST['Num_frs'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_POST['Num_frs'] : addslashes($_POST['Num_frs']);
}
mysql_select_db($database_H_D_Industrie, $H_D_Industrie);
$query_Recordset1 = sprintf("SELECT * FROM fournisseur WHERE Num_frs = '%s'", $colname_Recordset1);
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
Num_frs
  <label>
  <input name="Num_frs" type="text" id="Num_frs">
  </label>
  <label>
  <input type="submit" name="Submit" value="Rechercher">
  </label>
</form>
<p>&nbsp;</p>

<table border="1">
  <tr>
    <td>Num_frs</td>
    <td>Nom</td>
    <td>Prénom</td>
    <td>Adresse</td>
    <td>Num_tel</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['Num_frs']; ?></td>
      <td><?php echo $row_Recordset1['Nom']; ?></td>
      <td><?php echo $row_Recordset1['Prénom']; ?></td>
      <td><?php echo $row_Recordset1['Adresse']; ?></td>
      <td><?php echo $row_Recordset1['Num_tel']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p>
  <?php
mysql_free_result($Recordset1);
?>
</p>
<p><a href="index"><span class="Style1">Accueil&nbsp;</p>
