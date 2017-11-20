<?php

$pid = getmypid();

error_log("${pid} START " . $_SERVER['HTTP_X_FORWARDED_FOR'] . ' ' . $_SERVER['HTTP_USER_AGENT']);

sleep(30);

error_log("${pid} FINISH ");

?>
