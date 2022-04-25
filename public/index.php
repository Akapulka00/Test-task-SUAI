<?php
require  '../vendor/autoload.php';

if (preg_match('/\.(css|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}


\App\Kernel\Router::start();
