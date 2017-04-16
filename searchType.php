<div class="col-lg-5  col-md-5 col-sm-12 col-xs-12">
    <form action="server.php" method="post" enctype="multipart/form-data">
        <div class="form-group col-xs-9">
            <select class="form-control" id="type">
                <option>Laptop</option>
                <option>VOIP</option>
            </select>
        </div>
        <div class="form-group col-xs-3">
            <button type="submit" class="btn btn-primary ">Search</button>
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
        <tbody>
            <tr class="">
                <td>1</td>
                <td>VOIP</td>
                <td>Philips MC 303</td>
                <td>Atsadawat</td>
                <td><a href="update.php?id=1234" class="editLink">edit</a>
                </td>
            </tr>

        </tbody>
    </table>
</div>