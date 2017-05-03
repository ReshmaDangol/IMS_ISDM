

<div class="col-lg-8 col-md-7 col-sm-8 col-xs-12">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active" value="1" id="listInUse"><a href="#inuseHW" aria-controls="home" role="tab" data-toggle="tab" id="statusTabBtnInUse" >In-use</a>
        <input type="hidden" id ="searchType" name = "searchType" />
		</li>
        <li role="presentation" value="3" id="listAvailable"><a href="#avaHW" aria-controls="profile" role="tab" data-toggle="tab" id="statusTabBtnAvailable">Available</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="inuseHW">

            <table class="table resultTable">
                <thead>
                    <tr>
                        <th>SNo</th>
                        <th>Hardware Name</th>
                        <th>Assigned User</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="homeInUseResult">
                </tbody>
            </table>

        </div>
        <div role="tabpanel" class="tab-pane" id="avaHW">
			<table class="table resultTable">
                <thead>
                    <tr>
                        <th>SNo</th>
                        <th>Hardware Name</th>
                        <th>Assigned User</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="homeAvailableResult">
                </tbody>
            </table>

        </div>
    </div>
</div>
<div class="col-lg-offset-1 col-md-offset-1 col-lg-3 col-md-4 col-sm-4 col-xs-12">
	<form action="server.php" method="post" enctype="multipart/form-data"  style="margin-top:54px;">
	<div class="row">
		<div class="form-group col-xs-9">
		<select class="form-control" id="typeHW">
				<?php include "hardwareType.php"; ?>
		</select>
		</div>	
		</div>
	</form>
    <div id="hwGraphArea"><div id="hwGraph"></div></div>
</div>

<script>



$(function () {
	$('#statusTabBtnInUse').click(function(){
		var statusID = $('#listInUse').val();
		//alert(statusID);
		if(statusID == 1)
			$.get("searchStatusQryResult.php?searchType=listInUseItems&statusID="+statusID,function(data){
				$("#homeInUseResult").html(data);
			});	
	});
});

$(function () {
	$('#statusTabBtnAvailable').click(function(){
		var statusID = $('#listAvailable').val();
		//alert(statusID);
		if(statusID == 3)
			$.get("searchStatusQryResult.php?searchType=listAvailableItems&statusID="+statusID,function(data){
				$("#homeAvailableResult").html(data);
			});	
	});
});

	
</script>