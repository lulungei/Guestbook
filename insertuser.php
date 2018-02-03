<?php
include_once "private/connection.php";

$firstName = $_POST ['firstName'];
$lastName = $_POST['lastName'];
$phoneNumber =$_POST['phoneNumber'];
$username =$_POST['username'];
$password =$_POST['password'];
$department =$_POST['department'];
$role =$_POST['role'];

// hash the password for security

$securePassword = password_hash($password, PASSWORD_DEFAULT);

//Store the data in the database

// prepare the insert statement

$query ="INSERT INTO users (firstName, lastName, phoneNumber, userName, password, department, role) VALUES".
        " ( '$firstName', '$lastName', '$phoneNumber', '$username', '$securePassword', '$department', '$role')";

// run the query in the database

mysqli_query($db, $query) or die(mysqli_error($db));

//redirect to the admin home password_get_info

header('Location: adminviewusers.php');

?>