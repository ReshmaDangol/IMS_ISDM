<?php 

$servername = "localhost";
$username = "root";
$password = "admin";

$link = mysql_connect($servername, $username, $password);
mysql_select_db ( "ims_dotarai",  $link );
?>