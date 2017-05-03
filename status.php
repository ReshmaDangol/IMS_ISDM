<?php 

include 'connection.php';

//Code to fetch all the options from the Status Table
$sql = "SELECT id,name FROM status";

$result = mysql_query($sql);

echo "<option></option>";

while($row = mysql_fetch_array($result))
{
echo "<option value = '{$row['id']}'>{$row['name']}</option>";
}
?>