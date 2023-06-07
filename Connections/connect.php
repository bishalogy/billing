<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connect = "localhost";
$database_connect = "billing";
$username_connect = "root";
$password_connect = "";
$connect = @mysql_connect($hostname_connect, $username_connect, $password_connect) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_query("ALTER TABLE `bill` CHANGE `price` `price` INT(20) NOT NULL DEFAULT '10';"); 
?>