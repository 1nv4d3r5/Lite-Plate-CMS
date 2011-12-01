<?php
include_once '/var/www/inc/constants.php';
include_once DOC_ROOT . 'inc/Compress.php';
Compress::compress_file(array(DOC_ROOT . 'css/reset.css', DOC_ROOT . 'css/grid.css', DOC_ROOT . 'css/template.css', DOC_ROOT . 'css/forms.css',), 'text/css', true, 345600);
?>