<?php

$pid = getmypid();

$url = 'http://freegeoip.net/json/' . $_SERVER['HTTP_X_FORWARDED_FOR'];

$json = json_decode(file_get_contents($url), true);

error_log("${pid} START " . $_SERVER['HTTP_X_FORWARDED_FOR'] . ' ' . $json['country_name'] . ' ' . $_SERVER['HTTP_USER_AGENT']);

$url = 'https://logs-01.loggly.com/inputs/' . getenv('LOGGLY_TOKEN') . '/tag/hp/';

$context = array(
  'http' => array(
    'method' => 'POST',
    'header' => array(
      'Content-Type: text/plain'
      ),
    'content' => 'HonneypotR MARKER' . $_SERVER['HTTP_X_FORWARDED_FOR'] . ' ' . $json['country_name'];
    ));
$res = file_get_contents($url, false, stream_context_create($context));

sleep(25);

error_log("${pid} FINISH ");

?>
