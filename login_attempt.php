<?php
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
include_once('/var/www/inc/constants.php');
include_once(DOC_ROOT . 'inc/Page.php');
include_once(DOC_ROOT . 'inc/UserSystem.php');
$page = new Page(
	'Login Attempt',
	'login_attempt',
	'<?php $user_system = new UserSystem(); $user_system->attempt_login(); unset($user_system); ?>'
);
$page->display();
unset($page);
?>