<?php 

$servername = "localhost";
$username = "root";
$password = "";

//$username = "ims_web";
//$password = "wzf0h1ooyuwLX5XJ";

$link = mysql_connect($servername, $username, $password);

mysql_select_db ( "ims_web",  $link );
?>


