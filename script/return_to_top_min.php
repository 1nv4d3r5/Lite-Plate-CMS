<?php
include_once '/var/www/inc/constants.php';
include_once DOC_ROOT . 'inc/Compress.php';
Compress::compress_file(array(DOC_ROOT . 'script/return_to_top.js'), 'text/javascript', true, 345600);
?>