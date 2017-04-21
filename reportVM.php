<div class="col-lg-8 col-md-7 col-sm-8 col-xs-12">

            <table class="table resultTable">
                <thead>
                    <tr>
                        <th>SNo</th>
                        <th>VM IP</th>
                        <th>Hostname</th>
						<th>Data Center</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="homeListAllVm">
                    

                </tbody>
            </table>

        
</div>
<div class="col-lg-offset-1 col-md-offset-1 col-lg-3 col-md-4 col-sm-4 col-xs-12">
	
    <div id="vmGraph"></div>
</div>

<script>
$(function () {
$(document).ready(function() {
    //$("#statusTabBtnInUse").trigger('click');
	
	$(function () {
		$.get("searchStatusQryResult.php?searchType=listAllVm",function(data){
				$("#homeListAllVm").html(data);
				});	
			});
		});
});
	
</script>