<?php

use Banktsb\App;


define('URL', 'http://banktsb.lt/');

require __DIR__ . '/../vendor/autoload.php';

$response = App::start();

echo $response;