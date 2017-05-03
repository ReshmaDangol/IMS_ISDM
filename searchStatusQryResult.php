<?php 

include 'connection.php';

//ini_set('display_errors', 1);

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
			echo "<br><br>Problem in SQL</br>".$sql;
		}

		$returnStatusSearchResults = "";

		while($row = mysql_fetch_array($result))
		{
			echo "<tr class=''><td>{$row['productID']}</td><td>{$row['type']}</td><td>{$row['itemName']}</td><td>{$row['firstName']} "
			."{$row['lastName']}</td><td><a href='update_hw.php?id={$row['itemID']}' class=editLink'>edit</a></td></tr>";
		}
	break;
	
	case 'assignedUser' :
	
		$fetchedUserID = $_REQUEST['staffID'];
		$sql = "select I.itemid,I.productID, I.itemName, I.dateOfInitialization, I.projectedDateOfTermination, S.Name, AH.StaffID"
			    ." from Items as I , status as S , assignedHistory as AH where AH.hardwareID = I.itemID and S.ID = I.status and AH.StaffID =".$fetchedUserID;
				
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo "<br><br>Problem in SQL</br>".$sql;
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
			echo "<br><br>Problem in SQL</br>".$sql;
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
			echo "<br><br>Problem in SQL</br>".$sql;
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
			echo "<br><br>Problem in SQL</br>".$sql;
		}
		
		$returnTypeSearchResults = "";
		
		while($row = mysql_fetch_array($result))
		{
		
		echo "<tr class=''><td>{$row['productID']}</td><td>{$row['type']}</td><td>{$row['itemName']}</td><td>{$row['firstName']} {$row['lastName']}</td>"
                ."<td><a href='update_hw.php?id={$row['itemID']}' class='editLink'>edit</a></td></tr>";
			
		
		}
		
		}
		
		break;
		
	/*case 'status':

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
			echo "<br><br>Problem in SQL</br>".$sql;
		}

		$returnStatusSearchResults = "";

		while($row = mysql_fetch_array($result))
		{
			echo "<tr class=''><td>{$row['productID']}</td><td>{$row['type']}</td><td>{$row['itemName']}</td><td>{$row['firstName']} "
			."{$row['lastName']}</td><td><a href='update_hw.php?id={$row['itemID']}' class=editLink'>edit</a></td></tr>";
		}
	break;*/
	
	case 'listInUseItems' : 
		
			$fetchedStatusID = $_REQUEST['statusID'];
			
			$sql = "select itemID, productID, type, itemName, firstName, lastName, status  from (select I.itemID,I.productID, I.itemName, "
					." I.status, AH.hardwareID, AH.StaffID from Items as I left join assignedHistory as AH on I.itemID = AH.hardwareID) as tbl1"	
					." LEFT JOIN (select H.id, H.hardwaretype, HT.type from hardwares as H, hardwareTypes as HT"
					." where H.hardwaretype = HT.id) tbl2 on tbl1.itemID = tbl2.id LEFT JOIN staffs as S on tbl1.staffID = S.ID"
					." where status =".$fetchedStatusID;
			
			echo $sql;
			$result = mysql_query($sql);
			
			if(!$result)
			{
				echo "<br><br>Problem in SQL</br>".$sql;
			}
			
		
			while($row = mysql_fetch_array($result))
			{
			
			echo "<tr class=''><td>{$row['productID']}</td><td>{$row['itemName']}</td><td>{$row['firstName']} {$row['lastName']}</td>"
					."<td><a href='update_hw.php?id={$row['itemID']}' class='editLink'>edit</a></td></tr>";
			
			}
		break;
		
		case 'listAvailableItems' : 
		
			$fetchedStatusID = $_REQUEST['statusID'];
			
			$sql = "select itemID, productID, type, itemName, firstName, lastName, status  from (select I.itemID,I.productID, I.itemName, "
					." I.status, AH.hardwareID, AH.StaffID from Items as I left join assignedHistory as AH on I.itemID = AH.hardwareID) as tbl1"	
					." LEFT JOIN (select H.id, H.hardwaretype, HT.type from hardwares as H, hardwareTypes as HT"
					." where H.hardwaretype = HT.id) tbl2 on tbl1.itemID = tbl2.id LEFT JOIN staffs as S on tbl1.staffID = S.ID"
					." where status =".$fetchedStatusID;
			
			//echo $sql;
			$result = mysql_query($sql);
			
			if(!$result)
			{
				echo "<br><br>Problem in SQL</br>".$sql;
			}
			
		
			while($row = mysql_fetch_array($result))
			{
			
			echo "<tr class=''><td>{$row['productID']}</td><td>{$row['itemName']}</td><td>{$row['firstName']} {$row['lastName']}</td>"
					."<td><a href='update_hw.php?id={$row['itemID']}' class='editLink'>edit</a></td></tr>";
			
			}						
		break;
		
		case 'listAllVm' : 
			
			$sql = "select I.itemid, I.productID, V.ipAddress, V.hostname, V.dataCenter from Items as I, VM as V where I.itemid = V.ID";
			echo $sql;
			$result = mysql_query($sql);
			
			if(!$result)
			{
				echo "<br><br>Problem in SQL</br>".$sql;
			}
			
		
			while($row = mysql_fetch_array($result))
			{
			
			echo "<tr class=''><td>{$row['productID']}</td><td>{$row['ipAddress']}</td><td>{$row['hostname']} </td><td>{$row['dataCenter']}</td>"
					."<td><a href='update_vm.php?id={$row['itemid']}' class='editLink'>edit</a></td></tr>";
			
			}
		break;
		
		case 'reportHW' : 
			$hwType = $_REQUEST['type'];
			$sql = "select DISTINCT Status, status.Name as type, count(*) as total from Items, status,hardwares WHERE Items.Status=status.ID and
			hardwares.hardwareType ={$hwType} and hardwares.ID=itemID GROUP by status";
			echo $sql;
			$result = mysql_query($sql);
			/* error from this line*/ 
			$arr=[];
			$i=0;
			while($row = mysql_fetch_array($result))
			{
				$arr[$i]['label']=$row['type'];
				$arr[$i++]['value']=$row['total'];
			}
			echo json_encode($arr);
			break;
			
		case 'reportVM':
			$sql = "SELECT DISTINCT dataCenter, count(*) as total from VM GROUP by dataCenter";
			$result = mysql_query($sql);
			$arr=[];
			$i=0;
			while($row = mysql_fetch_array($result))
			{
				$arr[$i]['label']=$row['dataCenter'];
				$arr[$i++]['No_Of_VM']=$row['total'];
			}
			echo json_encode($arr);
		
		break; 
}
?>