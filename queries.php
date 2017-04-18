<?php include 'connection.php';

switch($_REQUEST['hiddenField']){

	case 'add_new_hw' :

		//Insert query for Adding New Hardwares
		//strip_tags
		//trim
		if ($link)
		{
		mysql_query("SET AUTOCOMMIT=0", $link);
		echo "Connection Successful";
		}
		else
		die ("Connection not successful" .mysql_connect_error());
		
		$flag = true; //$flag to check if there is any error thrown by any of the SQL stmnts so that we can rollback the entire transaction

		$type = $_REQUEST['type'];
		$name = $_REQUEST['name'];
		$mac = $_REQUEST['mac'];
		$productID = $_REQUEST['pId'];
		$dateOfPurchase = $_REQUEST['dPurchase'];
		$projDateOfTermination = $_REQUEST['dTermination'];
		$remark = $_REQUEST['remark'];
		$description = $_REQUEST['description'];
		$status = $_REQUEST['status'];
		$pDealer = $_REQUEST['pDealer'];
		$assignedUser = $_REQUEST['user'];
		$assignedDate = $_REQUEST['aDate'];

		//SQL to Insert in Items table
		$sql2 = "INSERT INTO `ims_dotarai`.`items`(itemName, description, dateOfInitialization, purchasedDealer, projectedDateOfTermination, Status, productID)"
				."VALUES ('$name','$description',STR_TO_DATE('$dateOfPurchase', '%m/%d/%Y'),'$pDealer',STR_TO_DATE('$projDateOfTermination',"
				." '%m/%d/%Y'),'$status', '$productID')";

		$retval2 = mysql_query($sql2, $link);
		if(! $retval2)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql2" . mysql_error($link));
		}	

		//SQL to get the itemID of latest entered item in Items table
		$sql3 = "select max(itemid) as itemID from items";
		
		$retval3 = mysql_query($sql3, $link);
		if(! $retval3)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql3" . mysql_error($link));
		}		
		
		$row3 = mysql_fetch_assoc($retval3);
		$maxItemID = $row3['itemID'];
		
		//SQL to insert in Hardwares table	
		$sql4 = "INSERT INTO `ims_dotarai`.`hardwares` (ID, MacAddress, hardwareType) VALUES ('$maxItemID','$mac' , '$type')";
		$retval4 = mysql_query($sql4, $link);
		
		if(! $retval4)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql4" . mysql_error($link));
		}
		
		//SQL to fetch the ID of the assigned staff
		/*$sql5 = "select ID from staffs where firstName = '$assignedUser'";
		$retval5 = mysql_query($sql5, $link);
		if(! $retval5)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql5" . mysql_error($link));
		}
		$row5 = mysql_fetch_assoc($retval5);
		$fetchedStaffID = $row5['ID'];
		*/
		//SQL to insert in AssignedHistory table	
		$sql6 = "INSERT INTO `ims_dotarai`.`assignedHistory` (hardwareID, staffID, assignedDate) VALUES ('$maxItemID','$assignedUser' , STR_TO_DATE('$assignedDate','%m/%d/%Y'))";
		$retval6 = mysql_query($sql6, $link);

		if(! $retval6)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql6" . mysql_error($link));
		}
		
		if($flag)
		{
			mysql_query("commit", $link);
			echo "All queries ran successfully";
		}
		else
		{
			mysql_rollback($link);
			echo "All queries were rolled back";
		}	
		break;	
	
	case 'add_new_vm' :
	
		if ($link)
		{
		mysql_query("SET AUTOCOMMIT=0", $link);
		echo "Connection Successful";
		}
		else
		die ("Connection not successful" .mysql_connect_error());
	
		$flag = true;
		
		$vmId = $_REQUEST['vmId'];
		$dateOfInitialization = $_REQUEST['createdDate'];
		$hName = $_REQUEST['hName'];
		$dCenter = $_REQUEST['dCenter'];
		$osName = $_REQUEST['osName'];
		$osVersion = $_REQUEST['osVersion'];
		$softwareName = $_REQUEST['sName'];
		$softwareVersion = $_REQUEST['sVersion'];
		$ram = $_REQUEST['ram'];
		$hdd = $_REQUEST['hdd'];
		$cpu = $_REQUEST['cpu'];
		$description = $_REQUEST['description'];
		$ipAddr = $_REQUEST['ipAddr'];
		$subnet = $_REQUEST['subnet'];
		$gateway = $_REQUEST['gateway'];
		$vm = $_REQUEST['vm'];
		$pDealer = $_REQUEST['pDealer'];
		$projectedDateOfTermination = $_REQUEST['dTermination'];
		$status = $_REQUEST['status'];
		$remarks = $_REQUEST['remarks'];
		
		mysql_select_db ( "ims_dotarai",  $link );
		
		//SQL to Insert in Items table
		$sql2 = "INSERT INTO `ims_dotarai`.`items`(itemName, description, dateOfInitialization, purchasedDealer, projectedDateOfTermination, Status, productID)"
				."VALUES ('$vm','$description',STR_TO_DATE('$dateOfInitialization', '%m/%d/%Y'),'$pDealer',STR_TO_DATE('$projectedDateOfTermination',"
				." '%m/%d/%Y'),'$status', '$vmId')";

		$retval2 = mysql_query($sql2, $link);
		if(! $retval2)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql2" . mysql_error($link));
		}
		
		//SQL to get the itemID of latest entered item in Items table
		$sql3 = "select max(itemid) as itemID from items";
		
		$retval3 = mysql_query($sql3, $link);
		if(! $retval3)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql3" . mysql_error($link));
		}		
		
		$row3 = mysql_fetch_assoc($retval3);
		$maxItemID = $row3['itemID'];
		
		//SQL to insert in VM table	
		$sql4 = "INSERT INTO `ims_dotarai`.`vm` (ID, hostname, datacenter, OSinstalled, softwaresInstalled, RAM, HDD, CPU, ipAddress, subnet,".
				"gateway, virtualMachine, softwareVersion, OSVersion, vmID )VALUES ('$maxItemID','$hName' , '$dCenter', '$osName', '$softwareName',".
				" '$ram', '$hdd', '$cpu', '$ipAddr', '$subnet', '$gateway', '$vm', '$softwareVersion', '$osVersion', '$vmId')";
		$retval4 = mysql_query($sql4, $link);

		if(! $retval4)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql4" . mysql_error($link));
		}
		
		if($flag)
		{
			mysql_query("commit" , $link);
			echo "All queries ran successfully" ;
		}
		else
		{
			mysql_rollback($link);
			echo "All queries did not run successfully and rolledback";
		}
		
			mysql_close($link);
		
		
}

?>
