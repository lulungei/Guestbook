<?php

include_once "private/connection.php";

// get id number from the form
$idNumber = $_POST['idNumber'];

// retrieve the visitor from database
$query = "SELECT id FROM visitors WHERE id_number='$idNumber' LIMIT 1";

$result = mysqli_query($db, $query) or die(mysqli_error());
$visitor = mysqli_fetch_assoc($result);

// if visitor does not exist, show error
if(!$visitor) die('Visitor not found.');

$visitorId = $visitor['id'];
header("Location: visit.php?visitor=$visitorId");

?>