<?php
$im = imagecreatefrompng('/Applications/MAMP/htdocs/img/back1.png');
header('Content-Type: image/png');
$expire = "Expires: " . gmdate ("D, d M Y H:i:s", time() + 691200) . " GMT";
header ($expire);
header("Last-Modified: " . gmdate("D, d M Y H:i:s", time() - 691200) . " GMT");
header('Cache-Control: max-age=691200');
imagepng($im);
imagedestroy($im);
?>
