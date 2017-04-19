<?php 

include 'connection.php';

$itemID = $_REQUEST['id'];

$updateHW_SQL = "select itemID, productID ,purchasedDealer,hardwareTypeID as hardwareTypeID, projectedDateOfTermination, "
				." dateOfInitialization, remarks, statusID,	macaddress ,type, itemName, firstName, lastName , staffID, assignedDate,"
				." description from (select I.itemID, I.Status as statusID, I.purchasedDealer,I.dateOfInitialization, I.productID,"
				." I.itemName,I.remarks, I.projectedDateOfTermination,I.description, AH.hardwareID, AH.StaffID , AH.assignedDate"
				." from Items as I left join assignedHistory as AH on I.itemID = AH.hardwareID) as tbl1	LEFT JOIN" 
				
				." (select H.id , H.hardwaretype, H.MacAddress as macaddress, HT.ID as hardwareTypeID, HT.type from hardwares as H, "
				. "hardwareTypes as HT where H.hardwaretype = HT.id) tbl2"
				. "where itemID =".$itemID;

$resultUpdateHW = mysql_query($resultUpdateHW);

while($rowHW = mysql_fetch_array($result))
	{
		$hardwareType = $rowHW['hardwareType'];
		//$itemID = $rowHW['itemID'];
		$itemName = $rowHW['itemName'];
		$MacAddress = $rowHW['MacAddress'];
		$productID = $rowHW['productID'];
		$purchasedDealer = $rowHW['purchasedDealer'];
		$dateOfInitialization = $rowHW['dateOfInitialization'];
		$projectedDateOfTermination = $rowHW['projectedDateOfTermination'];
		$remarks = $rowHW['remarks'];
		$status = $rowHW['status'];
		$StaffID = $rowHW['StaffID'];
		$assignedDate = $rowHW['assignedDate'];
		$description = $rowHW['description'];
	}
	
	$updateParamStr = ".&hardwareType=$hardwareType&itemName=$itemName&MacAddress=$MacAddress&productID=$productID&"
					   ."purchasedDealer=$purchasedDealer&dateOfInitialization=$dateOfInitialization&projectedDateOfTermination=$projectedDateOfTermination"
					   ."&remarks=$remarks&status=$status&StaffID=$StaffID&assignedDate=$assignedDate&description=$description";

	echo $updateParamStr;
?>