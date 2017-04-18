<?php include 'connection.php';

//Code to fetch all the options from the Status Table
$sql = "SELECT id,name FROM STATUS";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
echo "<option value = '{$row['id']}'>{$row['name']}</option>";
}
?>