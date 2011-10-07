<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
include_once('/var/www/inc/constants.php');
include(DOC_ROOT . 'inc/Page.php');
$page = new Page('Sign In', 'login', 'inc/content/login_content.php', 'inc/content/login_subcontent.php', 'script/form_scripts_min.php');
$page->display();
unset($page);
?>