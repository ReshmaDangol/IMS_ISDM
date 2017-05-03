<script>
function setHidden()
{
	document.getElementById("hiddenField").value = "update_vm";
};
</script>

<?php 

include 'header.html';
include 'connection.php';

$itemID = $_REQUEST['id'];
$boolEdit = "true";
//echo $itemID;

$updateVM_SQL = "select I.itemID, I.productID, I.dateOfInitialization, I.description,I.purchasedDealer, I.projectedDateOfTermination," 
				." I.status, I.remarks, V.hostname, V.dataCenter, V.OSInstalled, V.OSVersion, V.softwaresInstalled, V.SoftwareVersion,"
				." V.RAM, V.HDD, V.CPU, V.ipAddress, V.subnet, V.gateway, V.virtualMachine from Items as I , VM as V"
				." where I.itemID = V.ID and I.itemID =".$itemID;

$resultUpdateVM = mysql_query($updateVM_SQL);


while($rowVM = mysql_fetch_array($resultUpdateVM))
	{
		$virtualMachine = $rowVM['virtualMachine'];
		$productID = $rowVM['productID'];
		$purchasedDealer = $rowVM['purchasedDealer'];
		$dateOfInitialization = $rowVM['dateOfInitialization'];
		$projectedDateOfTermination = $rowVM['projectedDateOfTermination'];
		$remarks = $rowVM['remarks'];
		$statusID = $rowVM['status'];
		$hostname = $rowVM['hostname'];
		$dataCenter = $rowVM['dataCenter'];
		$OSInstalled = $rowVM['OSInstalled'];
		$OSVersion = $rowVM['OSVersion'];
		$softwaresInstalled = $rowVM['softwaresInstalled'];
		$SoftwareVersion = $rowVM['SoftwareVersion'];
		$RAM = $rowVM['RAM'];
		$HDD = $rowVM['HDD'];
		$CPU = $rowVM['CPU'];
		$ipAddr = $rowVM['ipAddress'];
		$subnet = $rowVM['subnet'];
		$gateway = $rowVM['gateway'];
		$description = $rowVM['description'];
	}
	
//Code to fetch all the options from the Status Table
$sqlStatus = "SELECT id,name FROM status";
$resultStatus = mysql_query($sqlStatus);

?>

    <div class="col-lg-offset-2 col-lg-8 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
        <div class="row text-center page-header">
            <h2>Update Virtual Machine</h2></div>
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12">
                <form action="queries.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
						<div class="col-xs-6">
							<label for="vmId">ID No.</label>
							<input type="text" class="form-control" name="vmId" id="vmId" value = "<?php echo $productID; ?>">
							
						</div>
						<div class="col-xs-6">
							<label for="createdDate">Created Date</label>
							<input type="text" class="form-control datepicker" name="createdDate" id="createdDate" value = "<?php 
							$myDateTime = DateTime::createFromFormat('Y-m-d', $dateOfInitialization);
							$newDateString = $myDateTime->format('m/d/Y'); echo $newDateString; ?>">
						
						</div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="hName">Host Name:</label>
                            <input type="text" class="form-control" name="hName" id="hName" value = "<?php echo $hostname  ; ?>">
                        </div>
                        <div class="col-xs-6">
                            <label for="dCenter">Data Center:</label>
                            <input type="text" class="form-control" name="dCenter" id="dCenter" value = "<?php echo $dataCenter  ; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="osName">OS Name:</label>
                            <input type="text" class="form-control" name="osName" id="osName" value = "<?php echo $OSInstalled ; ?>">
                        </div>
                        <div class="col-xs-6">
                            <label for="osVersion">OS Version:</label>
                            <input type="text" class="form-control" name="osVersion" id="osVersion" value = "<?php echo $OSVersion ; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="sName">Software Name:</label>
                            <input type="text" class="form-control" name="sName" id="sName" value = "<?php echo $softwaresInstalled  ; ?>">
                        </div>
                        <div class="col-xs-6">
                            <label for="sVersion">Software Version:</label>
                            <input type="text" class="form-control" name="sVersion" id="sVersion" value = "<?php echo $SoftwareVersion  ; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-4">
                            <label for="ram">RAM:</label>
                            <input type="text" class="form-control" name="ram" id="ram" value = "<?php echo $RAM ; ?>">
                        </div>
                        <div class="col-xs-4">
                            <label for="hdd">HDD:</label>
                            <input type="text" class="form-control" name="hdd" id="hdd" value = "<?php echo $HDD ; ?>">
                        </div>
                        <div class="col-xs-4">
                            <label for="ram">CPU:</label>
                            <input type="text" class="form-control" name="cpu" id="cpu" value = "<?php echo $CPU ; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="5"><?php echo $description ; ?></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="ipAddr">IP Address:</label>
                            <input type="text" class="form-control" name="ipAddr" id="ipAddr" value = "<?php echo $ipAddr ; ?>">
                        </div>
                        <div class="col-xs-6">
                            <label for="subnet">Subnet mask:</label>
                            <input type="text" class="form-control" name="subnet" id="subnet" value = "<?php echo $subnet ; ?>">
                        </div>
                    </div>

            </div>

            <div class="col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="gateway">Gateway:</label>
                    <input type="text" class="form-control" name="gateway" id="gateway" value = "<?php echo $gateway ?>">
                </div>
                <div class="form-group">
                    <label for="vm">Virtual Machine</label>
                    <input type="text" class="form-control" name="vm" id="vm" value = "<?php echo $virtualMachine ?>">
                </div>
                <form>
                    <div class="form-group">
                        <div style="position:relative;">
                            <a class='btn btn-default uploadBtn' href='javascript:;' style=''>
						Photo of Reciept
						<input type="file" class="btn-file" name="reciept" size="40" onchange='$("#upload-file-info").html($(this).val());' >
					</a> &nbsp;
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="pDealer">Purchase Dealer:</label>
                        <input type="text" class="form-control" name="pDealer" id="pDealer" value = "<?php echo $purchasedDealer ?>">
                    </div>

                    <div class="form-group">
                        <label for="dTermination">Projected Date of Termination</label>
                        <input type="text" class="form-control datepicker" name="dTermination" id="dTermination" value = "<?php 
					$myDateTime = DateTime::createFromFormat('Y-m-d', $projectedDateOfTermination);
					$newDateString = $myDateTime->format('m/d/Y'); echo $newDateString; ?>">
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name = "status">
						<?php //echo include "status.php"; ?>
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

                    <div class="form-group">
                        <label for="remarks">Remarks:</label>
                        <textarea id="remarks" name="remarks" class="form-control" rows="5"><?php echo $remarks ?></textarea>
                    </div>

            </div>
        </div>
        <center>
            <button type="submit" class="btn btn-primary actionButton" onClick = "setHidden();">Save</button>
            <button type="cancel" class="btn btn-default actionButton">Cancel</button>
			// <input type="hidden" id="hiddenField" name = "hiddenField" value="" onclick="setHidden();">
			<input type="hidden" id="hiddenField" name="hiddenFieldItemID" value="<?php echo $itemID ?>" >
        </center>
        </form>
    </div>
	</div>
    <?php ?>