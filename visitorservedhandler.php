<?php

include_once "private/connection.php";
include_once "private/session.php";

// restrict access to logged-in employees
ensureLoggedIn();

// get visit from form data
$visitId = $_POST['visit'];

// update visit in db
$query = "UPDATE visits SET visitor_served=1 WHERE id='$visitId'";
mysqli_query($db, $query) or die(mysqli_error($db));

// redirect to the employee's home page
header('Location: employeehome.php');