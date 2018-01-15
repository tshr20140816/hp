<?php

$pid = getmypid();

$url = 'http://freegeoip.net/json/' . $_SERVER['HTTP_X_FORWARDED_FOR'];

$json = json_decode(file_get_contents($url), true);

error_log("${pid} START HTTP_X_FORWARDED_FOR " . $_SERVER['HTTP_X_FORWARDED_FOR'] . ' ' . $json['country_name'] . ' ' . $_SERVER['HTTP_USER_AGENT']);

error_log("${pid} START HTTP_CLIENT_IP " . $_SERVER['HTTP_CLIENT_IP'];
error_log("${pid} START REMOTE_ADDR " . $_SERVER['REMOTE_ADDR'];

$url = 'https://logs-01.loggly.com/inputs/' . getenv('LOGGLY_TOKEN') . '/tag/hp/';

$context = [
  'http' => [
    'method' => 'POST',
    'header' => array(
      'Content-Type: text/plain'
      ),
    'content' => 'HonneypotR ' . $_SERVER['HTTP_X_FORWARDED_FOR'] . ' ' . $json['country_name']
    ]];
$res = file_get_contents($url, false, stream_context_create($context));

sleep(25);

error_log("${pid} FINISH ");

?>
