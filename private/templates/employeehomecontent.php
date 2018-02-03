<?php

include_once "private/connection.php";
include_once "private/session.php";

// get current user from session
$employee = getCurrentUser();
$employeeId = $employee['id'];
$employeeName = $employee['firstName'] . ' ' . $employee['lastName'];

// fetch current visits for this employee from the db
// the query finds all visits for this employee and where the date_out has not been set
// it also joins the visitors to the result
// returns most recently signed-in first (order by date_in desc)
$query = "SELECT visits.*, visitors.name FROM visits  "
        ." LEFT JOIN (visitors) ON (visitors.id = visits.visitor_id)"
        ." WHERE user_id=$employeeId AND date_out = '0000-00-00 00:00:00' AND visitor_served=0"
        ." ORDER BY date_in DESC";
$result = mysqli_query($db, $query) or die(mysqli_error($db));

?>

<p>Hello <b><?= $employeeName ?></b>, Here are your guests:</p>

<div class="list-group">
    <?php while($visit = mysqli_fetch_assoc($result)) { ?>
    <div class="list-group-item">
        <div class="pull-left">
            <b><?= $visit['name'] ?></b><br>
            <small>Signed it at <?= $visit['date_in'] ?></small>
        </div>
        <div class="pull-right">
            <form class="inline-form" method="POST" action="visitorservedhandler.php">
                <input type="hidden" name="visit" value="<?= $visit['id'] ?>">
                <button class="btn btn-success">I've attended to this guest</button>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php } ?>
</div>