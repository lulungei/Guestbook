<?php

// include script to connect to the database
// it stores the connection in a variable called $db 
include_once "private/connection.php";


// fetch visits from database
$query = "SELECT * FROM visits LEFT JOIN (visitors, users) ON " .
    " (visitors.id=visits.visitor_id AND users.id=visits.user_id)";

if(isset($_GET['search']))
{
    $keyword = $_GET['keyword'];
    $user = $_GET['user'];
    $whereClause = "";
    if ($keyword) {
        $whereClause .= "where (department LIKE '%$keyword%'
            OR name LIKE '%$keyword%'
            OR id_number LIKE '%$keyword%'
            OR phone_number LIKE '%$keyword%'
            OR purpose LIKE '%$keyword%'
            OR date_in LIKE '%$keyword%'
            OR date_out LIKE '%$keyword%'
            )";
    }
    if ($user) {
        $whereClause .= $whereClause? " AND user_id='$user'" : " WHERE user_id='$user'";
    }
    $query .= $whereClause;
}
$visits = mysqli_query($db, $query);
$query ="SELECT * FROM users";
$users =mysqli_query($db, $query);
?>

<!-- heading for the table -->
<h3>Visitors Records</h3>

<form>
    <div class= "form-group col-sm-3">
        <input type="text" name="keyword" class= "form-control" placeholder="Search keyword"></br></br>
    </div>
    <div class="form-group col-sm-3">
        <select name="user" class="form-control col-sm-3">
            <option value="">Employee</option>
            <?php while($user = mysqli_fetch_assoc($users)) { ?>
                <option value="<?= $user[ "id"] ?>"><?= $user["firstName"]." ".$user["lastName"]?></option>
            <?php } ?>
        </select>
    </div>
    <div class ="form-group col-sm-3">
        <input type="submit" name="search" class="btn btn-success form-control" value="Filter"></br></br>
    </div>
</form>

<table class="table table-striped">
    <tr>
        <th>Visitor</th>
        <th>ID Number</th>
        <th>Phone Number</th>
        <th>Employee</th>
        <th>Department</th>
        <th>Time In</th>
        <th>Time Out</th>
        <th>Served</th>
        <th>Purpose</th>
    </tr>

    <!-- table data -->
    <?php
    // fetch each row
    while($visit = mysqli_fetch_assoc($visits)){
        echo "<tr>"
            ."<td>". $visit["name"] ."</td>"
            ."<td>". $visit["id_number"] ."</td>"
            ."<td>". $visit["phone_number"] ."</td>"
            ."<td>". $visit["firstName"] . " " . $visit["lastName"] . "</td>"
            ."<td>". $visit["department"] . "</td>"
            ."<td>". $visit["date_in"] . "</td>"
            ."<td>". $visit["date_out"] ."</td>"
            ."<td>". ($visit["visitor_served"]? "Yes" : "No") ."</td>"
            ."<td>". $visit["purpose"] ."</td>"
            ."</tr>";
    }
    ?>
</table>