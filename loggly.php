<?php

$type = $argv[1]; // 'A' or 'E'
$prefix = $argv[2];

$stdin = fopen('php://stdin', 'r');
ob_implicit_flush(true);

while ($line = fgets($stdin)) {  
  $url = 'https://logs-01.loggly.com/inputs/' . getenv('LOGGLY_TOKEN') . "/tag/hp/";
  
  $context = array(
    'http' => array(
      'method' => 'POST',
      'header' => array(
        'Content-Type: text/plain'
      ),
      'content' => "${prefix} ${line}"
    ));
  $res = file_get_contents($url, false, stream_context_create($context));
}

?>
