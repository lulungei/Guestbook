<?php

// include script to connect to the database
// it stores the connection in a variable called $db 
include_once "private/connection.php";


// fetch visits from database
$query = "SELECT * FROM visits LEFT JOIN (visitors, users) ON " .
    " (visitors.id=visits.visitor_id AND users.id=visits.user_id)";

$visits = mysqli_query($db, $query);

?>

<!-- heading for the table -->
<h3>Visitors Records</h3>
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
            ."</tr>";
    }
    ?>
</table>