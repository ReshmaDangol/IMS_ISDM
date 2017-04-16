<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 activeStaff staffInfo"><!-- only to show css of active staff -->
	<img src="images/staff.png" class="staffThumb"/>
	<div class="stafffName text-center">Mr. Atsadawat</div>
	<div class="staffDesignation text-center">IT Manager</div>
</div>
<?php 
	for($i=0; $i<6 ; $i++)
	{
?>
<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 staffInfo">
	<img src="images/staff.png" class="staffThumb"/>
	<div class="stafffName text-center">Mr. Atsadawat</div>
	<div class="staffDesignation text-center">IT Manager</div>
</div>
<?php
	}
?>


<div class="col-xs-12 tableArea">
    <table class="table resultTable">
        <thead>
            <tr>
                <th>SNo</th>
                <th>Device</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Device Status</th>
				<th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td>1</td>
                <td>Philips MC 303</td>
                <td>02/02/2016</td>
				<td>-</td>
				<td>In-Use</td>
                <td><a href="update.php?id=1234" class="editLink">edit</a>
                </td>
            </tr>

        </tbody>
    </table>
</div>