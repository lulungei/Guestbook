<?php
$activeTab = 'signin';
ob_start();

include "private/templates/visitorsignincontent.php";
$pageContent = ob_get_clean();

include_once "private/templates/visitorlayout.php";




?>