<?php include ( "header.php"); ?>
<style>

</style>
<script>
$(function () {
$(document).ready(function() {
    $("#statusTabBtnInUse").trigger('click');
	
	$('#typeHW').change(function(){		
		loadHWGraph();						
	});
});
});	
function loadHWGraph()
{
	var val = $('#typeHW').val();
		$('#hwGraph').remove();
		 $.get("searchStatusQryResult.php?searchType=reportHW&type="+val,function(data){
			 var data = $.parseJSON(data);
			 $("#hwGraphArea").append("<div id='hwGraph'></div>");
			 Morris.Donut({
                            element: hwGraph ,
                            data: data,                          
                            labelColor: '#000059',
                            formatter: function (x) { return x },
							resize: true
                        });
		 })
}

	 $(function () {
		
			$('#typeHW').val(2).trigger('change');loadHWGraph();
			 $.get("searchStatusQryResult.php?searchType=reportVM",function(data){
				var data = $.parseJSON(data);
				Morris.Bar({
				  element: 'vmGraph',
				  data: data,
				  xkey: 'label',
				  ykeys: ['No_Of_VM'],
				  labels: ['No_Of_VM']
				});
			 });
        });


</script>
<div class="col-lg-offset-2 col-lg-8 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
    <div class="row text-center page-header">
        <h2>Hardware Inventory Overview</h2>
    </div>
    <div class="row reportHW">
        <?php include ( "reportHW.php"); ?> </div>
    <div class="row text-center page-header">
        <h2>VM Inventory Overview</h2>
    </div>
    <div class="row reportVM">
		<?php include ( "reportVM.php"); ?> 
	</div>
</div>
<?php ?>