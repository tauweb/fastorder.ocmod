<?php
$url = 'http://stat.tauweb.ru/';

$params = array(
    'cms'               => 'OpenCart',
    'cms_ver'           => VERSION,
    'host'              => $_SERVER['SERVER_NAME'],
    'extension_name'    => 'fastorder.ocmod',
    'extension_ver'     => '1.3.1'
);

@$result = file_get_contents($url, false, stream_context_create( array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($params)
    )
)));
?>
