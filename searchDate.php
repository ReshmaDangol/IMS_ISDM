<div class="col-lg-7  col-md-7 col-sm-12 col-xs-12">
    <form action="server.php" method="post" enctype="multipart/form-data">
        <div class="form-group col-xs-6">
            <select class="form-control" id="dType" onchange="setDatePicker()">
                <option>Date of Purchase</option>
                <option>Date of Termination</option>
            </select>
        </div>
		<div class="form-group col-xs-3">
            <input type="text" class="form-control datepicker" name="date" id="date">
        </div>
        <div class="form-group col-xs-2">
           <!-- <button type="submit" class="btn btn-primary ">Search</button> -->
        </div>
    </form>
</div>

<div class="col-xs-12 tableArea">
    <table class="table resultTable">
        <thead>
            <tr>
                <th>SNo</th>
                <th>Hardware Type</th>
                <th>Hardware Name</th>
                <th>Assigned User</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody id ="dateSearchResult">
        </tbody>
    </table>
</div>

<script>
function setDatePicker()
{
	document.getElementById("date").value = "";
};
</script>
