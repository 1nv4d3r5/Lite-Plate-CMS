<?php
include_once '/var/www/inc/constants.php';
include_once DOC_ROOT . 'inc/compress_file.php';
compress_file(array(DOC_ROOT . 'css/reset.css', DOC_ROOT . 'css/global_style.css', DOC_ROOT . 'css/grid.css'), 'text/css', true, 345600);
?>