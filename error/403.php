<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
include_once('/Applications/MAMP/htdocs/inc/constants.php');
include(DOC_ROOT . 'inc/Page.php');
$page = new Page('403 Error', '403', 'inc/content/403_content.php', '');
$page->display();
unset($page);
?>