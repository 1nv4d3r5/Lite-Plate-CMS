<?php
function compress_file($files, $contentType, $revalidate, $expiresLength){
    if(substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
    header ('Content-type: ' . $contentType);
    header ("cache-control: must-revalidate");
    $expire = "Expires: " . gmdate ("D, d M Y H:i:s", time() + 345600) . " GMT";
    header ($expire);
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s", time() - 691200) . " GMT");
    header ('Cache-Control: max-age=691200');
    ob_start("compress");
    for($i=0;$i < count($files);$i++){
        include($files[$i]);
    }
    ob_end_flush();
}
function compress($buffer) {
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
    return $buffer;
}
?>