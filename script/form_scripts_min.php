<?php
include_once '/var/www/inc/constants.php';
include_once DOC_ROOT . 'inc/Compress.php';
Compress::compress_file(array(DOC_ROOT . 'script/form_scripts.js'), 'text/javascript', true, 345600);
?>