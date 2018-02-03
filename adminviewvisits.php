<?php
$activeTab = 'signin';
ob_start();

include "private/templates/adminviewvisitscontent.php";
$pageContent = ob_get_clean();

include_once "private/templates/adminlayout.php";


?>