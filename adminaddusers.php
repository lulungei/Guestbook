<?php
ob_start();

include "private/templates/adminadduserscontent.php";

$pageContent = ob_get_clean();

include_once "private/templates/adminlayout.php";
?>