<script>
function setHidden()
{
	document.getElementById("hiddenField").value = "add_new_vm";
	alert(document.getElementById("hiddenField").value);
};

</script>

<?php include ( "header.html"); ?>
    <div class="col-lg-offset-2 col-lg-8 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
        <div class="row text-center page-header">
            <h2>Add Virtual Machine</h2></div>
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12">
                <form action="queries.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
						<div class="col-xs-6">
							<label for="vmId">ID No.</label>
							<input type="text" class="form-control" name="vmId" id="vmId">
						</div>
						<div class="col-xs-6">
							<label for="createdDate">Created Date</label>
							<input type="text" class="form-control datepicker" name="createdDate" id="createdDate">
						</div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="hName">Host Name:</label>
                            <input type="text" class="form-control" name="hName" id="hName">
                        </div>
                        <div class="col-xs-6">
                            <label for="dCenter">Data Center:</label>
                            <input type="text" class="form-control" name="dCenter" id="dCenter">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="osName">OS Name:</label>
                            <input type="text" class="form-control" name="osName" id="osName">
                        </div>
                        <div class="col-xs-6">
                            <label for="osVersion">OS Version:</label>
                            <input type="text" class="form-control" name="osVersion" id="osVersion">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="sName">Software Name:</label>
                            <input type="text" class="form-control" name="sName" id="sName">
                        </div>
                        <div class="col-xs-6">
                            <label for="sVersion">Software Version:</label>
                            <input type="text" class="form-control" name="sVersion" id="sVersion">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-4">
                            <label for="ram">RAM:</label>
                            <input type="text" class="form-control" name="ram" id="ram">
                        </div>
                        <div class="col-xs-4">
                            <label for="hdd">HDD:</label>
                            <input type="text" class="form-control" name="hdd" id="hdd">
                        </div>
                        <div class="col-xs-4">
                            <label for="ram">CPU:</label>
                            <input type="text" class="form-control" name="cpu" id="cpu">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="ipAddr">IP Address:</label>
                            <input type="text" class="form-control" name="ipAddr" id="ipAddr">
                        </div>
                        <div class="col-xs-6">
                            <label for="subnet">Subnet masek:</label>
                            <input type="text" class="form-control" name="subnet" id="subnet">
                        </div>
                    </div>

            </div>

            <div class="col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="gateway">Gateway:</label>
                    <input type="text" class="form-control" name="gateway" id="gateway">
                </div>
                <div class="form-group">
                    <label for="vm">Virtual Machine</label>
                    <input type="text" class="form-control" name="vm" id="vm">
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
                        <input type="text" class="form-control" name="pDealer" id="pDealer">
                    </div>

                    <div class="form-group">
                        <label for="dTermination">Projected Date of Termination</label>
                        <input type="text" class="form-control datepicker" name="dTermination" id="dTermination">
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name = "status">
						<?php include "status.php"; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="remarks">Remarks:</label>
                        <textarea id="remarks" name="remarks" class="form-control" rows="5"></textarea>
                    </div>

            </div>
        </div>
        <center>
            <button type="submit" class="btn btn-primary actionButton" onClick = "setHidden();">Save</button>
            <button type="cancel" class="btn btn-default actionButton">Cancel</button>
			<input type="hidden" id="hiddenField" name = "hiddenField" value="">
        </center>
        </form>
    </div>
	</div>
    <?php ?>