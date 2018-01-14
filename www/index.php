<?php

$pid = getmypid();

$url = 'http://freegeoip.net/json/' . $_SERVER['HTTP_X_FORWARDED_FOR'];

$json = json_decode(file_get_contents($url), true);

error_log("${pid} START " . $_SERVER['HTTP_X_FORWARDED_FOR'] . ' ' . $json['country_name'] . ' ' . $_SERVER['HTTP_USER_AGENT']);

sleep(25);

error_log("${pid} FINISH ");

?>
