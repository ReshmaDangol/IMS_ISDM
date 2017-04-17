<?php include ( "header.html"); ?>
<div class="col-lg-offset-2 col-lg-8 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
	<div class="row text-center page-header"><h2>Update Hardware</h2></div>
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-xs-12">
            <form action="server.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="type">Product Type:</label>
                    <input type="text" class="form-control" name="type" id="type">
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
                    <label for="pDealer">Purchase Dealer:</label>
                    <input type="text" class="form-control" name="pDealer" id="pDealer">
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
                    <img src="images/bg.jpg" class="productThumb">

                </div>
                      

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status">
                        <option>In-use</option>
                        <option>Available</option>
                        <option>Needs Repairing</option>
                        <option>Sent to Repair</option>
                        <option>Donated</option>
                        <option>Terminated</option>
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
                    <select class="form-control" id="user">
                        <option>Atsadawat</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="aDate">Assigned Date</label>
                    <input type="text" class="form-control datepicker" name="aDate" id="aDate">
                </div>
				<div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" Dame="description" class="form-control" rows="5"></textarea>
                </div>

        </div>
    </div>
    <center>
        <button type="submit" class="btn btn-primary actionButton">Save</button>
        <button type="cancel" class="btn btn-default actionButton">Cancel</button>
    </center>
    </form>
</div>
</div>
<?php ?>