<?php 

include 'connection.php';

//Code to fetch all the options from the HardwareTypes Table
$sql = "SELECT id,type FROM hardwareTypes";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
echo "<option value = '{$row['id']}'>{$row['type']}</option>";
}
?>