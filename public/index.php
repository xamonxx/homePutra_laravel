<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| HOSTINGER CONFIGURATION - Single Codebase Approach
|--------------------------------------------------------------------------
|
| Struktur:
| - public_html/ = folder public Laravel
| - ~/laravel/   = folder app Laravel (di luar public_html)
|
| Kedua domain (homeputrainterior.com & admin.homeputrainterior.com)
| menunjuk ke public_html yang sama.
|
*/

// Path ke folder Laravel (di luar public_html untuk keamanan)
$laravelPath = dirname(__DIR__);

// Jika Laravel ada di folder terpisah (production Hostinger)
if (!file_exists($laravelPath . '/vendor/autoload.php')) {
    $laravelPath = $_SERVER['HOME'] . '/laravel';
}

// Fallback ke folder homeputra-laravel jika ada
if (!file_exists($laravelPath . '/vendor/autoload.php')) {
    $laravelPath = $_SERVER['HOME'] . '/homeputra-laravel';
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = $laravelPath . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require $laravelPath . '/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
$app = require_once $laravelPath . '/bootstrap/app.php';

// Set the public path to the current directory (public_html)
$app->usePublicPath(__DIR__);

// Handle the incoming request
$app->handleRequest(Request::capture());
