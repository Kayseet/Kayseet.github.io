<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_H_D_Industrie = "localhost";
$database_H_D_Industrie = "h_d_industrie";
$username_H_D_Industrie = "root";
$password_H_D_Industrie = "";
$H_D_Industrie = mysql_pconnect($hostname_H_D_Industrie, $username_H_D_Industrie, $password_H_D_Industrie) or trigger_error(mysql_error(),E_USER_ERROR); 
?>