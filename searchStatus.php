<div class="col-lg-4  col-md-4 col-sm-12 col-xs-12">
    <form action="server.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status">
                <option>In-use</option>
                <option>Available</option>
                <option>Needs Repairing</option>
                <option>Sent to Repair</option>
                <option>Donated</option>
                <option>Terminated</option>
            </select>
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