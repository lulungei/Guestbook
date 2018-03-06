<?php

include_once "private/connection.php";

//collect data entered by the student/staff on the form.
$name =$_POST['name'];
$idNumber=$_POST['idNumber'];
$phoneNumber=$_POST['phoneNumber'];

//store the data in the database

//INSERT INTO visitors (name, id_number, phone_number)
//VALUES ('Lulu', '33368532', '0726166685')

$query="INSERT INTO visitors(name, id_number, phone_number)VALUES" . 
" ('$name', '$idNumber', '$phoneNumber')";
mysqli_query($db, $query);

$visitorId = mysqli_insert_id($db);

header("Location: visit.php?visitor=$visitorId");



?> 

