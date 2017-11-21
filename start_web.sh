#!/bin/bash

set -x

export TZ=JST-9

httpd -V
httpd -M
php --version
whereis php
printenv

if [ ! -v LOGGLY_TOKEN ]; then
  echo "Error : LOGGLY_TOKEN not defined."
  exit
fi

curl -H "content-type:text/plain" -d 'HP INSTANCE START' http://logs-01.loggly.com/inputs/${LOGGLY_TOKEN}/tag/hp/

vendor/bin/heroku-php-apache2 -C apache.conf www
