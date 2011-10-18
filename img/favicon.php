<?php
include_once '/var/www/inc/constants.php';
$image = imagecreatefrompng(DOC_ROOT . 'img/favicon.png');
header('Content-Type: image/png');
$expire = "Expires: " . gmdate ("D, d M Y H:i:s", time() + 691200) . " GMT";
header ($expire);
header("Last-Modified: " . gmdate("D, d M Y H:i:s", time() - 691200) . " GMT");
header('Cache-Control: max-age=691200');
imagepng($image);
imagedestroy($image);
?>