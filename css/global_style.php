<?php
include('/var/www/inc/constants.php');
include(DOC_ROOT . 'inc/compress_file.php');
compress_file(array(DOC_ROOT . 'css/reset.css', DOC_ROOT . 'css/global_style.css'),'text/css',true,345600);
?>
