<?php
session_start();
include_once "private/connection.php";
// helper functions to make it easier to work with current user

/**
 * login the specified user
 */
function login($user){
    $_SESSION['currentUser'] = ["username" => $user["username"], "role" => $user["role"]];
}

/**
 * logs the current user out (clears session user)
 */
function logout(){
    unset($_SESSION['currentUser']);
}

/**
 * check whether the user is logged in
 */
function isLoggedIn(){
    return isset($_SESSION['currentUser']);
}

/**
 * get the currently logged-in user 
 */
function getCurrentUser(){
    global $db;
    if(!isLoggedIn()) return null;
    $username = $_SESSION['currentUser']['username'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $user = mysqli_fetch_assoc($result) or die(mysqli_error($db));
    return $user;
}

/**
 * check if current user is an admin 
 */
function isAdmin(){
    return isLoggedIn() && $_SESSION['currentUser']['role'] == 'admin';
}

/**
 * redirect to login page if current user is not an admin
 */
function ensureAdmin(){
    if(!isAdmin()){
        header('Location: adminlogin.php');
    }
}

/**
 * redirect to login page if user is not logged in
 */
function ensureLoggedIn(){
    if(!isLoggedIn()){
        header('Location: adminlogin.php');
    }
}