<?php 


ob_start();
include "private/templates/employeehomecontent.php";
$pageContent = ob_get_clean();


include_once "private/templates/employeelayout.php";

?>