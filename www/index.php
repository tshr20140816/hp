<?php

$pid = getmypid();

error_log("${pid} START " . $_SERVER['HTTP_X_FORWARDED_FOR'] . ' ' . $_SERVER['HTTP_USER_AGENT']);

$url = 'http://freegeoip.net/xml/' . $_SERVER['HTTP_X_FORWARDED_FOR'];

$xml = file_get_contents($url);

sleep(25);

error_log("${pid} FINISH ");

?>
