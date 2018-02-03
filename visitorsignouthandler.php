<?php

include_once "private/connection.php";
$idNumber = $_POST["idNumber"];

$query = "SELECT * FROM visits WHERE visitor_id IN (SELECT id FROM visitors WHERE id_number=$idNumber)"
    ." ORDER BY date_in DESC LIMIT 1";

$result = mysqli_query($db, $query) or die(mysqli_error($db));
$visit = mysqli_fetch_assoc($result) or die("Visit not found");

if(strtotime($visit['date_out'])){
    die('Visitor is not currently signed in');
}

$visitId = $visit['id'];
$currentDate = strftime("%Y-%m-%d %H:%M:%S", time());

$query = "UPDATE visits SET date_out='$currentDate' WHERE id=$visitId";
mysqli_query($db, $query) or die(mysqli_error($db));

header("Location: confirmsignout.php?visit=$visitId");
