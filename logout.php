<?php

include_once "private/session.php";

// logout and redirect to home page
logout();
header('Location: index.php');