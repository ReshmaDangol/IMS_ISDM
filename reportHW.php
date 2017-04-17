<div class="col-lg-8 col-md-7 col-sm-8 col-xs-12">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#inuseHW" aria-controls="home" role="tab" data-toggle="tab">In-use</a>
        </li>
        <li role="presentation"><a href="#avaHW" aria-controls="profile" role="tab" data-toggle="tab">Available</a>
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
                <tbody>
                    <tr class="">
                        <td>1</td>
                        <td>Philips MC 303</td>
                        <td>Atsadawat</td>
                        <td><a href="update.php?id=1234" class="editLink">edit</a>
                        </td>
                    </tr>

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
                <tbody>
                    <tr class="">
                        <td>1</td>
                        <td>Philips MC 303</td>
                        <td>Atsadawat</td>
                        <td><a href="update.php?id=1234" class="editLink">edit</a>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
</div>
<div class="col-lg-offset-1 col-md-offset-1 col-lg-3 col-md-4 col-sm-4 col-xs-12">
	<form action="server.php" method="post" enctype="multipart/form-data"  style="margin-top:54px;">
	<div class="row">
		<div class="form-group col-xs-9">
		<select class="form-control" id="type">
			<option>Laptop</option>
			<option>VOIP</option>
		</select>
		</div>
		<div class="form-group col-xs-3">
			<button type="submit" class="btn btn-primary ">Search</button>
		</div>
		</div>
	</form>
    <div id="hwGraph"></div>
</div>