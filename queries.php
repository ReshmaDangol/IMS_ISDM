<?php 

include 'connection.php';
include 'header.html';

$qryMsg = '';

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
		$sql2 = "INSERT INTO `ims_web`.`Items`(itemName, description, dateOfInitialization, purchasedDealer, projectedDateOfTermination, Status, productID, remarks)"
				."VALUES ('$name','$description',STR_TO_DATE('$dateOfPurchase', '%m/%d/%Y'),'$pDealer',STR_TO_DATE('$projDateOfTermination',"
				." '%m/%d/%Y'),'$status', '$productID','$remark')";

		$retval2 = mysql_query($sql2, $link);
		if(! $retval2)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql2" . mysql_error($link));
		}	

		//SQL to get the itemID of latest entered item in Items table
		$sql3 = "select max(itemid) as itemID from Items";
		
		$retval3 = mysql_query($sql3, $link);
		if(! $retval3)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql3" . mysql_error($link));
		}		
		
		$row3 = mysql_fetch_assoc($retval3);
		$maxItemID = $row3['itemID'];
		
		//SQL to insert in Hardwares table	
		$sql4 = "INSERT INTO `ims_web`.`hardwares` (ID, MacAddress, hardwareType) VALUES ('$maxItemID','$mac' , '$type')";
		$retval4 = mysql_query($sql4, $link);
		
		if(! $retval4)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql4" . mysql_error($link));
		}
		

		//SQL to insert in AssignedHistory table	
		if($assignedUser!= 'none')
		{	
			$sql6 = "INSERT INTO `ims_web`.`assignedHistory` (hardwareID, staffID, assignedDate) VALUES ('$maxItemID','$assignedUser' , STR_TO_DATE('$assignedDate','%m/%d/%Y'))";
			$retval6 = mysql_query($sql6, $link);

			if(! $retval6)
			{
				$flag = false;
				die( "ERROR: Could not execute $sql6" . mysql_error($link));
			}
		}

		if($flag)
			{
				mysql_query("commit", $link);
				$qryMsg = 'add_new_hw_saved' ;
				header("Location: /add_new_hw.php?qryMsg=$qryMsg");				
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
		
		mysql_select_db ( "ims_web",  $link );
		
		//SQL to Insert in Items table
		$sql2 = "INSERT INTO `ims_web`.`Items`(itemName, description, dateOfInitialization, purchasedDealer, projectedDateOfTermination, Status, productID, remarks)"
				."VALUES ('$vm','$description',STR_TO_DATE('$dateOfInitialization', '%m/%d/%Y'),'$pDealer',STR_TO_DATE('$projectedDateOfTermination',"
				." '%m/%d/%Y'),'$status', '$vmId','$remarks')";

		$retval2 = mysql_query($sql2, $link);
		if(! $retval2)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql2" . mysql_error($link));
		}
		
		//SQL to get the itemID of latest entered item in Items table
		$sql3 = "select max(itemid) as itemID from Items";
		
		$retval3 = mysql_query($sql3, $link);
		if(! $retval3)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql3" . mysql_error($link));
		}		
		
		$row3 = mysql_fetch_assoc($retval3);
		$maxItemID = $row3['itemID'];
		
		//SQL to insert in VM table	
		$sql4 = "INSERT INTO `ims_web`.`VM` (ID, hostname, datacenter, OSinstalled, softwaresInstalled, RAM, HDD, CPU, ipAddress, subnet,".
				"gateway, virtualMachine, softwareVersion, OSVersion )VALUES ('$maxItemID','$hName' , '$dCenter', '$osName', '$softwareName',".
				" '$ram', '$hdd', '$cpu', '$ipAddr', '$subnet', '$gateway', '$vm', '$softwareVersion', '$osVersion')";
		$retval4 = mysql_query($sql4, $link);

		if(! $retval4)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql4" . mysql_error($link));
		}
		
		if($flag)
		{
			mysql_query("commit" , $link);
			$qryMsg = 'add_new_vm_saved';
			header("Location: /add_new_vm.php?qryMsg=$qryMsg");		
			echo "All queries ran successfully" ;
		}
		else
		{
			mysql_rollback($link);
			echo "All queries did not run successfully and rolledback";
		}
		break;
		
		/*****************/
		case 'update_hw' :

		if ($link)
		{
		mysql_query("SET AUTOCOMMIT=0", $link);
		echo "Connection Successful";
		}
		else
		die ("Connection not successful" .mysql_connect_error());
		
		$flag = true; //$flag to check if there is any error thrown by any of the SQL stmnts so that we can rollback the entire transaction

		$itemID = $_REQUEST['hiddenFieldItemID'];
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

		//SQL to Update in Items table
		$sql2 = "update `ims_web`.`Items` set itemName ='$name',description = '$description',"
				." dateOfInitialization = STR_TO_DATE('$dateOfPurchase', '%m/%d/%Y'), purchasedDealer = '$pDealer',"
				." projectedDateOfTermination= STR_TO_DATE('$projDateOfTermination',"
				." '%m/%d/%Y'), Status = '$status', productID = '$productID', remarks = '$remark' where itemID = ".$itemID;
				
		$retval2 = mysql_query($sql2, $link);
		if(! $retval2)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql2" . mysql_error($link));
		}	
		//echo $sql2;

		//SQL to update in Hardwares table	
		$sql4 = "update `ims_web`.`hardwares` set MacAddress = '$mac' , hardwareType = '$type' where id=".$itemID;
		$retval4 = mysql_query($sql4, $link);
		
		if(! $retval4)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql4" . mysql_error($link));
		}
		

		//SQL to update in AssignedHistory table	
		if($assignedUser!= 'none')
		{ 
			$sql6 = "INSERT INTO assignedHistory (hardwareID, staffID, assignedDate) VALUES ($itemID, $assignedUser,"
			." STR_TO_DATE('$assignedDate','%m/%d/%Y')) ON DUPLICATE KEY UPDATE "
			." staffID=".$assignedUser.", assignedDate=STR_TO_DATE('$assignedDate','%m/%d/%Y')";
			$retval6 = mysql_query($sql6, $link);

			if(! $retval6)
			{
				$flag = false;
				die( "ERROR: Could not execute $sql6" . mysql_error($link));
			}
			
		echo "<br>Assigned User is : ".$assignedUser;
		echo "<br>$sql6";
		}
		else if($assignedUser == 'none')
		{
			$sql7 = "UPDATE assignedHistory set staffID = null , assignedDate = NULL WHERE hardwareID =".$itemID;
			$retval7 = mysql_query($sql7, $link);
			
			if(!$retval7)
			{
				$flag = false;
				die("ERROR: Could not execute $sql7" . mysql_error($link));
			}
		}

		if($flag)
			{
				mysql_query("commit", $link);
				$qryMsg = 'update_hw_saved';
				header("Location: /update_hw.php?qryMsg=$qryMsg&id=$itemID");		
				echo "All queries ran successfully";
			}
		else
			{
				mysql_rollback($link);
				echo "All queries were rolled back";
			}
			
		echo '<meta http-equiv="refresh" content="=0;URL=update_hw.php?id=64" />';
		break;
		
		/*****************/
	case 'update_vm' :

		if ($link)
		{
			mysql_query("SET AUTOCOMMIT=0", $link);
			echo "Connection Successful";
		}
		else
			die ("Connection not successful" .mysql_connect_error());
		
		$flag = true; //$flag to check if there is any error thrown by any of the SQL stmnts so that we can rollback the entire transaction

		$itemID = $_REQUEST['hiddenFieldItemID'];
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

		//echo "Item ID : ".$itemID." </br>";
		//SQL to Update in Items table
		$sql2 = "update `ims_web`.`Items` set itemName ='$vm',description = '$description',"
				." dateOfInitialization = STR_TO_DATE('$dateOfInitialization', '%m/%d/%Y'), purchasedDealer = '$pDealer',"
				." projectedDateOfTermination= STR_TO_DATE('$projectedDateOfTermination',"
				." '%m/%d/%Y'), Status = '$status', productID = '$vmId', remarks = '$remarks' where itemID =".$itemID;
		
		//echo $sql2;
				
		$retval2 = mysql_query($sql2, $link);
		if(! $retval2)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql2" . mysql_error($link));
		}	
		//echo $sql2;

		//SQL to update in Hardwares table	
		$sql4 = "UPDATE `ims_web`.`VM` SET hostname = '$hName', datacenter = '$dCenter', OSinstalled = '$osName', "
				." softwaresInstalled = '$softwareName', RAM = '$ram' , HDD = '$hdd' , CPU ='$cpu' , ipAddress = '$ipAddr' ,"
				." subnet = '$subnet', gateway = '$gateway', virtualMachine = '$vm', softwareVersion = '$softwareVersion' ,"
				." OSVersion = '$osVersion' where ID =".$itemID;
		$retval4 = mysql_query($sql4, $link);
		
		//echo $sql4;
		
		if(! $retval4)
		{
			$flag = false;
			die( "ERROR: Could not execute $sql4" . mysql_error($link));
		}

		if($flag)
			{
				mysql_query("commit", $link);
				$qryMsg = 'update_vm_saved';
				header("Location: /update_vm.php?qryMsg=$qryMsg&id=$itemID");
				echo "All queries ran successfully";
			}
		else
			{
				mysql_rollback($link);
				echo mysqli_errno($this->$link);
				echo "All queries were rolled back";
			}
			
		echo '<meta http-equiv="refresh" content="=0;URL=update_hw.php?id=64" />';
		break;
		
		mysql_close($link);
		
		
}

?>
