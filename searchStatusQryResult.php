<?php 

include 'connection.php';

switch($_REQUEST['searchType']){
	
	case 'status':

		$fetchedStatusID = $_REQUEST['statusID'];

		//Code to query the database to filter out only 'In-Use' devices
		$sql = "select itemID, productID, type, itemName, firstName, lastName, status  from"
				." (select I.itemID,I.productID, I.itemName, I.status, AH.hardwareID, AH.StaffID from Items as I left join assignedHistory as AH"
				." on I.itemID = AH.hardwareID) as tbl1	LEFT JOIN (select H.id, H.hardwaretype, HT.type from hardwares as H, hardwareTypes as HT"
				." where H.hardwaretype = HT.id) tbl2 on tbl1.itemID = tbl2.id LEFT JOIN staffs as S on tbl1.staffID = S.ID" 
				." where status =".$fetchedStatusID;
				
		$result = mysql_query($sql);

		if(!$result)
		{
			echo "Problem in SQL".$sql;
		}

		$returnStatusSearchResults = "";

		while($row = mysql_fetch_array($result))
		{
			echo "<tr class=''><td>{$row['productID']}</td><td>{$row['type']}</td><td>{$row['itemName']}</td><td>{$row['firstName']}</td><td>"
			."{$row['lastName']}</td><td><a href='update_hw.php?id={$row['itemID']}' class=editLink'>edit</a></td></tr>";
		}
	break;
	
	case 'assignedUser' :
	
		$fetchedUserID = $_REQUEST['staffID'];
		$sql = "select I.itemid,I.productID, I.itemName, I.dateOfInitialization, I.projectedDateOfTermination, S.Name, AH.StaffID"
			    ." from Items as I , Status as S , assignedHistory as AH where AH.hardwareID = I.itemID and S.ID = I.status and AH.StaffID =".$fetchedUserID;
				
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo "Problem in sql".$sql;
		}
		
		$returnStaffsSearchResults = "";
		
		while($row = mysql_fetch_array($result))
		{
		echo "<tr class=''><td>{$row['productID']}</td><td>{$row['itemName']}</td><td>{$row['dateOfInitialization']}</td><td>{$row['projectedDateOfTermination']}</td>"
                ."<td>{$row['Name']}</td><td><a href='update_hw.php?id={$row['itemid']}' class='editLink'>edit</a></td></tr>";
			
		}
		break;
		
	case 'type' : 
		
		$fetchedTypeID = $_REQUEST['typeID'];
		$sql = "select itemID, productID, type, itemName, firstName, lastName  from"
				." (select I.itemID,I.productID, I.itemName, AH.hardwareID, AH.StaffID from Items as I left join assignedHistory as AH"
				." on I.itemID = AH.hardwareID) as tbl1	LEFT JOIN "
				." (select H.id, H.hardwaretype, HT.type from hardwares as H, hardwareTypes as HT"
				." where H.hardwaretype = HT.id) tbl2"
				." on tbl1.itemID = tbl2.id	LEFT JOIN staffs as S on tbl1.staffID = S.ID where hardwareType =".$fetchedTypeID;
				
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo "Problem in sql".$sql;
		}
		
		$returnTypeSearchResults = "";
		
		while($row = mysql_fetch_array($result))
		{
		
		echo "<tr class=''><td>{$row['productID']}</td><td>{$row['type']}</td><td>{$row['itemName']}</td><td>{$row['firstName']} {$row['lastName']}</td>"
                ."<td><a href='update_hw.php?id={$row['itemID']}' class='editLink'>edit</a></td></tr>";
			
		
		}
		break;
	
	case 'date' : 
		
		$fetchedDateType = $_REQUEST['searchDateType'];
		$fetchedDateVal = $_REQUEST['dateVal'];
		
		if($fetchedDateType == "Date of Purchase")
		{
		
		$sql = "select itemID, productID, type, itemName, firstName, lastName,dateOfInitialization,projectedDateOfTermination, status"
				." from (select I.itemID,I.productID, I.itemName, I.status, I.dateOfInitialization, I.projectedDateOfTermination, AH.StaffID"
				." from Items as I left join assignedHistory as AH on I.itemID = AH.hardwareID) as tbl1 LEFT JOIN "
				." (select H.id, H.hardwaretype, HT.type from hardwares as H, hardwareTypes as HT where H.hardwaretype = HT.id) tbl2"
				." on tbl1.itemID = tbl2.id LEFT JOIN staffs as S on tbl1.staffID = S.ID where dateOfInitialization=STR_TO_DATE('$fetchedDateVal', '%m/%d/%Y')";
				
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo "Problem in sql".$sql;
		}
		
		$returnTypeSearchResults = "";
		
		while($row = mysql_fetch_array($result))
		{
		
		echo "<tr class=''><td>{$row['productID']}</td><td>{$row['type']}</td><td>{$row['itemName']}</td><td>{$row['firstName']} {$row['lastName']}</td>"
                ."<td><a href='update_hw.php?id={$row['itemID']}' class='editLink'>edit</a></td></tr>";
			
		
		}
		
		}
		
		else if($fetchedDateType == "Date of Termination")
		{
		$sql = "select itemID, productID, type, itemName, firstName, lastName,dateOfInitialization,projectedDateOfTermination, status"
				." from (select I.itemID,I.productID, I.itemName, I.status, I.dateOfInitialization, I.projectedDateOfTermination, AH.StaffID"
				." from Items as I left join assignedHistory as AH on I.itemID = AH.hardwareID) as tbl1 LEFT JOIN "
				." (select H.id, H.hardwaretype, HT.type from hardwares as H, hardwareTypes as HT where H.hardwaretype = HT.id) tbl2"
				." on tbl1.itemID = tbl2.id LEFT JOIN staffs as S on tbl1.staffID = S.ID where projectedDateOfTermination=STR_TO_DATE('$fetchedDateVal', '%m/%d/%Y')";
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo "Problem in sql".$sql;
		}
		
		$returnTypeSearchResults = "";
		
		while($row = mysql_fetch_array($result))
		{
		
		echo "<tr class=''><td>{$row['productID']}</td><td>{$row['type']}</td><td>{$row['itemName']}</td><td>{$row['firstName']} {$row['lastName']}</td>"
                ."<td><a href='update_hw.php?id={$row['itemID']}' class='editLink'>edit</a></td></tr>";
			
		
		}
		
		}
		
		break;
}
?>