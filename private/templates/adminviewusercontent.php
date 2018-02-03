<?php

//include script to connect to the database
// it stores the conection in a variable called $db
include_once "private/connection.php";

//fetch users from database

$query ="SELECT * FROM users";
$users =mysqli_query($db, $query)

?>

<!-- heading for the table -->
<h3>Employees</h3>
<table class ="table table-striped">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>username</th>
        <th>Phone Number</th>
        <th>Department</th>
        <th>Roles</th>
     </tr>   

     <!-- table data-->

     <?php
     //fetch each row

     while($user = mysqli_fetch_assoc($users)){
         echo "<tr>"
              ."<td>".$user["firstName"]."</td>"
              ."<td>".$user["lastName"]."</td>"
              ."<td>".$user["username"]."</td>"
              ."<td>".$user["phoneNumber"]."</td>"
              ."<td>".$user["department"]."</td>"
              ."<td>".$user["role"]."</td>"
              ."</tr>";
 }
 ?>
 </table>