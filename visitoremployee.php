<?php

$activeTab = 'signin';

ob_start();
include "private/templates/visitoremployeecontent.php";
$pageContent = ob_get_clean();


include_once "private/templates/visitorlayout.php";

?>