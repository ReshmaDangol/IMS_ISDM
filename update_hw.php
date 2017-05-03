<script>
function setHidden()
{
	document.getElementById("hiddenField").value = "update_hw";
};
</script>

<?php 

include 'header.php';
include 'connection.php';

//$itemID = $_REQUEST['id'];
$boolEdit = "true";
//echo $itemID;

if(isset($_GET['id']))
	{
				$itemID = $_GET['id'];  			
				
	}
	else
	{
		$itemID = $_REQUEST['id'];
	}
$updateHW_SQL = "select itemID, statusName, productID ,purchasedDealer,hardwareTypeID as hardwareTypeID, projectedDateOfTermination," 
				." dateOfInitialization, remarks, statusID,macaddress ,type, itemName, firstName, lastName , staffID, assignedDate," 
				." description from (select I.itemID, I.Status as statusID, status.Name as statusName,I.purchasedDealer,I.dateOfInitialization,"
				." I.productID,I.itemName,I.remarks, I.projectedDateOfTermination,I.description, AH.hardwareID, AH.StaffID , AH.assignedDate"
				." from Items as I left join assignedHistory as AH  on I.itemID = AH.hardwareID left join status on I.Status = status.ID"
				." ) as tbl1	LEFT JOIN (select H.id , H.hardwaretype ,H.MacAddress as macaddress, HT.ID as hardwareTypeID, HT.type from" 
				." hardwares as H, hardwareTypes as HT where H.hardwaretype = HT.id) tbl2 on tbl1.itemID = tbl2.id	LEFT JOIN staffs "
				." as S on tbl1.staffID = S.ID where itemID=".$itemID;

$resultUpdateHW = mysql_query($updateHW_SQL);
//echo $updateHW_SQL;

while($rowHW = mysql_fetch_array($resultUpdateHW))
	{
		$hardwareTypeID = $rowHW['hardwareTypeID'];
		$hardwareTypeName = $rowHW['type'];
		$statusName = $rowHW['statusName'];
		//$itemID = $rowHW['itemID'];
		$itemName = $rowHW['itemName'];
		$MacAddress = $rowHW['macaddress'];
		$productID = $rowHW['productID'];
		$purchasedDealer = $rowHW['purchasedDealer'];
		$dateOfInitialization = $rowHW['dateOfInitialization'];
		$projectedDateOfTermination = $rowHW['projectedDateOfTermination'];
		$remarks = $rowHW['remarks'];
		$statusID = $rowHW['statusID'];
		$staffID = $rowHW['staffID'];
		$assignedDate = $rowHW['assignedDate'];
		$description = $rowHW['description'];
		$firstName = $rowHW['firstName'];
		$lastName = $rowHW['lastName'];
	}
	
//Code to fetch all the options from the HardwareTypes Table
$sqlHwTypes = "SELECT id,type FROM hardwareTypes";
$resultHwTypes = mysql_query($sqlHwTypes);

//Code to fetch all the options from the Status Table
$sqlStatus = "SELECT id,name FROM status";
$resultStatus = mysql_query($sqlStatus);

//Code to fetch all the options from the Staffs Table
$sqlStaffInfo = "SELECT id,firstName,lastName FROM staffs";
$resultStaffInfo = mysql_query($sqlStaffInfo);

?>

<?php 
			if(isset($_GET['qryMsg']))
			{
				$qryMsg = $_GET['qryMsg'];  
				
				if($qryMsg=='update_hw_saved')
				{
					echo '<div><label for="qryMsg">Record Successfully Edited !</label></div>';
				}	
			}	
?>

<div class="col-lg-offset-2 col-lg-8 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
	<div class="row text-center page-header"><h2>Update Hardware</h2></div>
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-xs-12">
            <form action="queries.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="type">Product Type:</label>
					<select class="form-control" id="type" name="type">
					<?php //include 'hardwareType.php'; ?>
					<?php 
						while($rowHwTypes = mysql_fetch_array($resultHwTypes))
						{
						if($rowHwTypes['id'] == $hardwareTypeID)	
							echo "<option value = '{$rowHwTypes['id']}' selected='selected'>{$rowHwTypes['type']}</option>";
						else
							echo "<option value = '{$rowHwTypes['id']}'>{$rowHwTypes['type']}</option>";
						}
					?> 
                    </select><!-- <input type="text" class="form-control" name="type" id="type"> -->
                </div>

                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $itemName; ?>">
                </div>

                <div class="form-group">
                    <label for="mac">Mac Address</label>
                    <input type="text" class="form-control" name="mac" id="mac" value="<?php echo $MacAddress; ?>">
                </div>

                <div class="form-group">
                    <label for="pId">Product id:</label>
                    <input type="text" class="form-control" name="pId" id="pId" value ="<?php echo $productID; ?>">
                </div>
				<div class="form-group">
                    <label for="pDealer">Purchase Dealer:</label>
                    <input type="text" class="form-control" name="pDealer" id="pDealer" value ="<?php echo $purchasedDealer; ?>">
                </div>
				
                <div class="form-group">
                    <label for="dPurchase">Date of purchase:</label>
                    <input type="text" class="form-control datepicker" name="dPurchase" id="dPurchase" value ="<?php 
					$myDateTime = DateTime::createFromFormat('Y-m-d', $dateOfInitialization);
					$newDateString = $myDateTime->format('m/d/Y'); echo $newDateString; ?>">
                </div>
				
				<div class="form-group">
                    <label for="dTermination">Projected Date of Termination</label>
                    <input type="text" class="form-control datepicker" name="dTermination" id="dTermination" value ="<?php 
					$myDateTime = DateTime::createFromFormat('Y-m-d', $projectedDateOfTermination);
					$newDateString = $myDateTime->format('m/d/Y'); echo $newDateString; ?>">
                </div>
				
         

                <div class="form-group">
                    <label for="remark">Remark</label>
                    <textarea id="remark" name="remark" class="form-control" rows="5"><?php echo $remarks; ?></textarea>
                </div>

        </div>

        <div class="col-lg-6 col-sm-12 col-xs-12">
            <form>
                <div class="form-group">
                    <img src="images/bg.jpg" class="productThumb">

                </div>
                      

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status">
						<?php //include "status.php"; ?>
						<?php 
							while($row = mysql_fetch_array($resultStatus))
							{
							if($row['id']==$statusID)	
								echo "<option value = '{$row['id']}' selected='selected'>{$row['name']}</option>";
							else
								echo "<option value = '{$row['id']}'>{$row['name']}</option>";
							}
						?>
						
                    </select>
                </div>

                <div class="form-group row">
                    <div class="col-xs-4">
						<label for="dRepair">Date of repair</label>
						<input type="text" class="form-control datepicker" name="dRepair" id="dRepair">
					</div>
					<div style="position:relative;" class="col-xs-8">
                        <a class='btn btn-default uploadBtn' href='javascript:;' style=''>
						Photo of Reciept
						<input type="file" class="btn-file" name="reciept" size="40" onchange='$("#upload-file-info").html($(this).val());' >
						</a> &nbsp;
                        <span class='label label-info' id="upload-file-info"></span>
                    </div>

                </div>
				<div class="form-group">
                    <label for="rDealer">Repair Dealer:</label>
                    <input type="text" class="form-control" name="pDealer" id="rDealer">
                </div>
					
                <div class="form-group">
                    <label for="user">Assigned User</label>
                    <select class="form-control" id="user" name="user">
                            <?php //include "staffs.php"; ?>
							<?php 
							if ($staffID == null)
								echo "<option value = 'none' selected = 'selected' >None</option>";
							
							else 
								echo "<option value = 'none'>None</option>";

							while($rowStaffInfo = mysql_fetch_array($resultStaffInfo))
							{
								if($rowStaffInfo['id']==$staffID)
								{
										echo "<option value = '{$rowStaffInfo['id']}' selected = 'selected' >{$rowStaffInfo['firstName']}&nbsp{$rowStaffInfo['lastName']}</option>";
								}
								
								else 
									echo "<option value = '{$rowStaffInfo['id']}'>{$rowStaffInfo['firstName']}&nbsp{$rowStaffInfo['lastName']}</option>";
									
									//echo "<option value = '{$rowStaffInfo['id']}'>{$rowStaffInfo['firstName']}&nbsp{$rowStaffInfo['lastName']}</option>";
									//echo "<option value = 'none'>None</option>";
								
							}
							?>
							
                    </select>
                </div>

                <div class="form-group">
                    <label for="aDate">Assigned Date</label>
                    <input type="text" class="form-control datepicker" name="aDate" id="aDate" value=<?php 
					if($assignedDate){
					$myDateTime = DateTime::createFromFormat('Y-m-d', $assignedDate);
					$newDateString = $myDateTime->format('m/d/Y'); echo $newDateString;
					}
					else echo "";
					?>>
                </div>
				<div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="5"><?php echo $description ?></textarea>
                </div>

        </div>
    </div>
    <center>
        <button type="submit" class="btn btn-primary actionButton" onclick="setHidden()">Save</button>
        <button type="cancel" class="btn btn-default actionButton">Cancel</button>
		<input type="hidden" id="hiddenField" name="hiddenField" />
		<input type="hidden" id="hiddenField" name="hiddenFieldItemID" value="<?php echo $itemID ?>" />
    </center>
    </form>
</div>
</div>


<?php ?>