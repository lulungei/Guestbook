<?php
$activeTab = 'signout';
ob_start();

include "private/templates/visitorsignoutcontent.php";
$pageContent = ob_get_clean();

include_once "private/templates/visitorlayout.php";




?>