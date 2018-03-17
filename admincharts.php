<?php
ob_start();

include "private/templates/adminchartscontent.php";
$pageContent = ob_get_clean();

include_once "private/templates/adminlayout.php";




?>