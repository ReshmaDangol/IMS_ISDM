<?php include ( "header.html"); ?>
<script>
	 $(function () {
		Morris.Donut({
                            element: hwGraph ,
                            data: [
										{ label: 'In-use', value: 20 },
										{ label: 'Available', value: 10 },
										{ label: 'Needs Repairing', value: 5 },
										{ label: 'Sent for Repair', value: 5 },
										{ label: 'Donated', value: 20 }
									  ],                          
                            labelColor: '#000059',
                            formatter: function (x) { return x }
                        });
						
			Morris.Bar({
			  element: 'vmGraph',
			  data: [
				{x: 'Data Center 1', No_Of_VM: 3},
				{x: 'Data Center 2', No_Of_VM: 4},
				{x: 'Data Center 3', No_Of_VM: 3}
				
			  ],
			  xkey: 'x',
			  ykeys: ['No_Of_VM'],
			  labels: ['No_Of_VM']
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