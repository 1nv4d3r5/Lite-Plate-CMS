<?php
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
include_once '/var/www/inc/constants.php';
include_once DOC_ROOT . 'inc/GlobalController.php';
$controller = new GlobalController();
$controller->error_403();
$controller->display();
unset($controller);
?>