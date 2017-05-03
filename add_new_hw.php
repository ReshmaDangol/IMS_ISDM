<script>
function setHidden()
{
	document.getElementById("hiddenField").value = "add_new_hw";
};

</script>



<?php include ( "header.php"); ?>
		
		<?php 
			if(isset($_GET['qryMsg']))
			{
				$qryMsg = $_GET['qryMsg'];  
				
				if($qryMsg=='add_new_hw_saved')
				{
					echo '<div><label for="qryMsg">Successfully Saved !</label></div>';
				}	
			}	
			?>
    <div class="col-lg-offset-2 col-lg-8 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
        <div class="row text-center page-header">
		
            <h2>Add New Hardware</h2></div>
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12">
                <form action="queries.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="type">Product Type:</label>					
                        <select class="form-control" id="type" name="type">
						<?php include "hardwareType.php"; ?>
                        </select>
                        <!-- <input type="text" class="form-control" name="type" id="type"> -->
                    </div>

                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <div class="form-group">
                        <label for="mac">Mac Address</label>
                        <input type="text" class="form-control" name="mac" id="mac">
                    </div>

                    <div class="form-group">
                        <label for="pId">Product id:</label>
                        <input type="text" class="form-control" name="pId" id="pId">
                    </div>

                    <div class="form-group">
                        <label for="dPurchase">Date of purchase:</label>
                        <input type="text" class="form-control datepicker" name="dPurchase" id="dPurchase">
                    </div>

                    <div class="form-group">
                        <label for="dTermination">Projected Date of Termination</label>
                        <input type="text" class="form-control datepicker" name="dTermination" id="dTermination">
                    </div>

                    <div class="form-group">
                        <label for="remark">Remark</label>
                        <textarea id="remark" name="remark" class="form-control" rows="5"></textarea>
                    </div>

            </div>

            <div class="col-lg-6 col-sm-12 col-xs-12">
                <form>
                    <div class="form-group">
                        <div style="position:relative;">
                            <a class='btn btn-default uploadBtn' href='javascript:;' style=''>
						Upload Image.
						<input type="file" class="btn-file" name="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());' >
					</a> &nbsp;
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status">
						<?php include "status.php"; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pDealer">Purchase Dealer:</label>
                        <input type="text" class="form-control" name="pDealer" id="pDealer">
                    </div>
					<div class="form-group">
						<div style="position:relative;">
							<a class='btn btn-default uploadBtn' href='javascript:;' style=''>
							Photo of Purchase Reciept
							<input type="file" class="btn-file" name="pReciept" size="40" onchange='$("#upload-file-info").html($(this).val());' >
							</a> &nbsp;
							<span class='label label-info' id="upload-file-info"></span>
						</div>
					</div>

                    <div class="form-group">
                        <label for="user">Assigned User</label>
                        <select class="form-control" id="user" name="user">
                            <?php include "staffs.php"; ?>
							<?php echo "<option value = 'none'>None</option>"; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="aDate">Assigned Date</label>
                        <input type="text" class="form-control datepicker" name="aDate" id="aDate">
                    </div>

            </div>
        </div>
        <center>
			<button type="submit" class="btn btn-primary actionButton" id="saveBtn" onClick = "setHidden();">Save</button>
            <button type="cancel" class="btn btn-default actionButton">Cancel</button>
			<input type="hidden" id="hiddenField" name = "hiddenField" value="">
        </center>
        </form>
    </div>
	</div>
    <?php ?>