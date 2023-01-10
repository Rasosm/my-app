<?php

use Banktsb\App;

// if (!isset($_SESSION['users']) && $_SERVER['REQUEST_URI'] !== '/login') {
//     App::redirect('/login');
// };

// if (isset($_SESSION['users']) && $_SERVER['REQUEST_URI'] === '/login') {
//     App::redirect('/accounts');
// };

define('URL', 'http://banktsb.lt/');

require __DIR__ . '/../vendor/autoload.php';

$response = App::start();

echo $response;