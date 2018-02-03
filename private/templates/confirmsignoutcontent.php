<?php

include_once "private/connection.php";

// get visit from the page's query parameters
$visitId = $_GET['visit'];

$query = "SELECT * FROM visits LEFT JOIN (visitors, users) ON "
    . " (visitors.id=visits.visitor_id AND users.id=visits.user_id) WHERE visits.id=$visitId";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$visit = mysqli_fetch_assoc($result);

$employeeName = $visit['firstName'] . " " . $visit['lastName'];
$visitorName = $visit['name'];

?>
<p class="well">
Goodbye, <?= $visitorName ?>.
</p>

<a class="btn btn-default" href="index.php">Back</a>