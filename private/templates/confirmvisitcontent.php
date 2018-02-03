<?php

include_once "private/connection.php";

// get visit from the page's query parameters
$visitId = $_GET['visit'];

// retrieve visit from database with details of the employee and visitor
$query = "SELECT * FROM visits LEFT JOIN (visitors, users) ON "
    . " (visitors.id=visits.visitor_id AND users.id=visits.user_id) WHERE visits.id=$visitId";

$result = mysqli_query($db, $query) or die(mysqli_error($db));
$visit = mysqli_fetch_assoc($result);

$employeeName = $visit['firstName'] . " " . $visit['lastName'];
$visitorName = $visit['name'];
$department = $visit['department'];

?>
<p class="well">
Sign in successful, <?= $visitorName ?>. You can proceed to visit <b><?= $employeeName ?></b> of <b><?= $department ?></b> department.
</p>

<a class="btn btn-default" href="index.php">Back</a>