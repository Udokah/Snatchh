<?php
$host="localhost";
$databaseuser="root";
$databasepassword="";
$database="snatchh";
$connect = mysql_connect($host,$databaseuser,$databasepassword) or die ("unable to connect to server");
$db = mysql_select_db($database,$connect) or die ("unable to select database.");
?>
