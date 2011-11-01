<?php
include_once '/var/www/inc/constants.php';
include_once DOC_ROOT . 'inc/compress_file.php';
compress_file(array(DOC_ROOT . 'script/form_scripts.js'), 'text/javascript', true, 345600);
?>