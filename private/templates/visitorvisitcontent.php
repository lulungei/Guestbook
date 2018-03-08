<?php

include_once "private/connection.php";

// get visitor id from the page's query parameters
$visitor_id = $_GET['visitor'];

// fetch the visitor from the database by id
$query = "SELECT * FROM visitors WHERE id=$visitor_id LIMIT 1";
$result = mysqli_query($db, $query) or die(mysqli_error($db));

$visitor = mysqli_fetch_assoc($result);

// if visitor doesn't exist, show error instead
if(!$visitor) die('Visitor not found');

?>
<h3>Welcome, <?= $visitor["name"] ?>. Which deparment do you want to visit?</h3>
<form method="GET" action="visitoremployee.php">
    <input type="hidden" name="visitor" value="<?= $visitor['id'] ?>" >
    <div class="form-group">
        <label>Select department to visit</label>
        <select name="department" class="form-control">
            <option value="HR">HR</option>
            <option value="Marketing">Marketing</option>
            <option value="Sales">Sales</option>
            <option value="CEO">CEO</option>
        </select>
    </div>
    <div class="form-group">
        <label>Purpose for visit</label>
        <select name="purpose" class="form-control" required>
            <option value="Admissions">Admissions</option>
            <option value="Enquiries">Enquiries</option>
            <option value="Sports">Sports</option>
            <option value="Event">Event</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-success">Visit Department</button>
        <a class="btn btn-default" href="index.php">Back</a>
    </div>

</form>