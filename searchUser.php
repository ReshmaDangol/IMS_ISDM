<?php 
include 'connection.php';

//Code to fetch all the count from the Staffs Table
$sql2 = "Select id, firstName, lastName,designation from staffs";
$result2 = mysql_query($sql2);
?>

<form action="server.php" method="post" enctype="multipart/form-data">
    <?php //for($i=0; $i<$staffCount ; $i++) { ?>
    <!-- <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 staffInfo">
        <img src="images/staff.png" class="staffThumb" />
        <div class="stafffName text-center">Mr. Atsadawat</div>
        <div class="staffDesignation text-center">IT Manager</div>

        <input type="hidden" value="staffID" />

    </div> -->
    <?php // } ?>
	<?php while($row2 = mysql_fetch_array($result2)){ ?>
    <?php if($row2['id']!=9) { ?>
	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 staffInfo" data-staff=<?php echo $row2['id'];?> >
		<img src="images/staff.png" class="staffThumb" />
        <div class="stafffName text-center"><?php echo "<b>".$row2['firstName']." ".$row2['lastName']."</b>"; ?></div>
        <div class="staffDesignation text-center"><?php echo $row2['designation']; ?></div>

        <input type="hidden" value="staffID" />

    </div>
	<?php } ?>
    <?php } ?>

    <div class="form-group text-center">
        <!-- <button type="submit" class="btn btn-primary ">Search</button> -->
    </div>
</form>

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
        <tbody id= "userSearchResult">
        </tbody>
    </table>
</div>