<?php

include_once "private/connection.php";

// get visitor id and department from the page's query parameters
$visitorId = $_GET['visitor'];
$department = $_GET['department'];
$purpose = $_GET['purpose'];


// fetch the visitor from the database by id
$query = "SELECT * FROM visitors WHERE id=$visitorId LIMIT 1";
$result = mysqli_query($db, $query) or die(mysqli_error($db));

$visitor = mysqli_fetch_assoc($result);

// if visitor doesn't exist, show error instead
if(!$visitor) die('Visitor not found');

// find all employees in specified department
$query = "SELECT * FROM users WHERE department='$department'";
$result = mysqli_query($db, $query) or die(mysqli_error($db));

?>
<h3>Welcome, <?= $visitor["name"] ?>. Who do you want to see?</h3>
<form method="POST" action="createvisit.php">
    <input type="hidden" name="visitor" value="<?= $visitor['id'] ?>" >
    <input type="hidden" name="purpose" value="<?=$purpose ?>" >
    <div class="form-group">
        <label>Choose employee to visit</label>
        <select name="employee" class="form-control" required>
        <?php while($employee = mysqli_fetch_assoc($result)) {?>
            <option value="<?= $employee['id'] ?>"><?= $employee['firstName'] . " " . $employee['lastName'] ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-success">Visit Employee</button>
        <a class="btn btn-default" href="visit.php?visitor=<?= $visitorId ?>&department=<?= $department ?>">
            Back
        </a>
    </div>

</form>