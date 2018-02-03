<?php

ob_start();
include "private/templates/confirmvisitcontent.php";
$pageContent = ob_get_clean();


include_once "private/templates/visitorlayout.php";

?>