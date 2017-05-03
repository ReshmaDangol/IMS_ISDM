<?php include ( "header.php"); ?>
<div class="col-lg-offset-2 col-lg-8 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
<div class="row text-center page-header"><h2>Search Options</h2></div>
  <div class="row">
    <div class="col-xs-12">
      <div class="tabs-left">
        <ul class="nav navV nav-tabs nav-tabsV">         
          <li class="active"><a href="#searchStatus" data-toggle="tab">Search By Status</a></li>
          <li><a href="#searchUser" data-toggle="tab">Search By User</a></li>
		  <li><a href="#searchType" data-toggle="tab">Search By Type</a></li>
		  <li><a href="#searchDate" data-toggle="tab">Search By Date</a></li>
        </ul>
        <div class="tab-content tab-contentV">
          <div class="tab-pane active" id="searchStatus">         
            <?php include ( "searchStatus.php"); ?>
          </div>
          <div class="tab-pane" id="searchUser">
            <?php include ( "searchUser.php"); ?>
          </div>
          <div class="tab-pane" id="searchType">
			<?php include ( "searchType.php"); ?>
		  </div>
          <div class="tab-pane" id="searchDate">
			<?php include ( "searchDate.php"); ?>
		  </div>
        </div><!-- /tab-content -->
      </div><!-- /tabbable -->
    </div><!-- /col -->
  </div><!-- /row -->
</div><!-- /container -->
</div>

<script>
 $(function () {
	 $("#status").change(function(){
		 var statusID=$('#status').val();
		 if(statusID == "")
			 return;
		 $.get("searchStatusQryResult.php?searchType=status&statusID="+statusID,function(data){
			 $("#statusSearchResult").html(data);
			 //$('.resultTable').DataTable();
		 })
	 });
 
	$(".staffInfo").click(function(){
		var staffID = $(this).data('staff');
		//alert(staffID);
		$.get("searchStatusQryResult.php?searchType=assignedUser&staffID="+staffID,function(data){
			$("#userSearchResult").html(data);
		})
	});
	
	$("#type").change(function(){
		var typeID = $('#type').val();
		
		if(typeID == "")
			return;
		$.get("searchStatusQryResult.php?searchType=type&typeID="+typeID,function(data){
			$("#typeSearchResult").html(data);
		})
	});
	
	$("#date").change(function(){
		var dateVal = $('#date').val();
		//alert('Clicked');
		if(dateVal == "")
			return;	
		
		$.get("searchStatusQryResult.php?searchDateType="+$('#dType').val()+"&searchType=date&dateVal="+dateVal,function(data){
			$("#dateSearchResult").html(data);
		})
	});
});
</script>