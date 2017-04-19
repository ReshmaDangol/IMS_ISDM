<?php 

include 'connection.php';

//Code to fetch all the options from the Staffs Table
$sql = "SELECT id,firstName,lastName FROM staffs";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
	echo "<option value = '{$row['id']}'>{$row['firstName']}&nbsp{$row['lastName']}</option>";
	
}
?>



