<?php
require_once 'vendor/autoload.php';

if (preg_match('/\.(css|js|png|jpg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

\App\Kernel\Router::start();