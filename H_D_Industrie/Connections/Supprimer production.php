<?php require_once('H_D_Industrie.php'); ?>
<?php require_once('../Connections/H_D_Industrie.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

if ((isset($_POST['Code_reference'])) && ($_POST['Code_reference'] != "")) {
  $deleteSQL = sprintf("DELETE FROM production WHERE Code_référence=%s",
                       GetSQLValueString($_POST['Code_reference'], "text"));

  mysql_select_db($database_H_D_Industrie, $H_D_Industrie);
  $Result1 = mysql_query($deleteSQL, $H_D_Industrie) or die(mysql_error());

  $deleteGoTo = "../Index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

mysql_select_db($database_H_D_Industrie, $H_D_Industrie);
$query_Recordset1 = "SELECT * FROM production";
$Recordset1 = mysql_query($query_Recordset1, $H_D_Industrie) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php do { ?>
  <form name="form1" method="post" action="">
    <label>
    <input name="Code_r&eacute;f&eacute;rence" type="text" id="Code_r&eacute;f&eacute;rence" value="<?php echo $row_Recordset1['Code_référence']; ?>">
    </label>
    <label>
    <input name="textfield2" type="text" value="<?php echo $row_Recordset1['Nom_prod']; ?>">
    </label>
    <label>
    <input name="textfield3" type="text" value="<?php echo $row_Recordset1['Quantite']; ?>">
    </label>
    <label>
    <input name="textfield4" type="text" value="<?php echo $row_Recordset1['Date_fabrication']; ?>">
    </label>
    <label>
    <input name="textfield5" type="text" value="<?php echo $row_Recordset1['Numéro_lot']; ?>">
    </label>
    <label>
    <input type="submit" name="Submit" value="Supprimer">
    </label>
  </form>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  <p>
    <?php
mysql_free_result($Recordset1);
?>
</p>
  <p><a href="index"><span class="Style1">Accueil&nbsp;  </p>
