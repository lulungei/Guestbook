<?php

include_once "private/connection.php";
include_once "private/session.php";

// get user credentials from login form
$username = $_POST['username'];
$password = $_POST['password'];

// find user in db
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($db, $query) or die(mysqli_error($db, error));

$user = mysqli_fetch_assoc($result) or die(mysqli_error($db));
//verify password 
if(!password_verify($password, $user['password'])){
    // password is incorrect
    die('Incorrect username or password');
}

// setup session
login($user);

if($user['role'] == 'admin'){
    // redirect to admin home if user is admin
    header('Location: adminhome.php');
}
else {
    // redirect to employee home otherwise
    header('Location: employeehome.php');
}
?>