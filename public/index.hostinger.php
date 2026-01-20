<?php

/**
 * Laravel Entry Point for Hostinger
 * 
 * File ini menggantikan index.php default
 * Sesuaikan path jika struktur folder berbeda
 */

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Path ke folder Laravel (sesuaikan dengan struktur Hostinger Anda)
$laravelPath = __DIR__ . '/../laravel';

// Jika folder laravel tidak ada, coba path alternatif
if (!is_dir($laravelPath)) {
    $laravelPath = __DIR__ . '/../homeputra-laravel';
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = $laravelPath . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require $laravelPath . '/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
$app = require_once $laravelPath . '/bootstrap/app.php';

// Set the public path to current directory
$app->usePublicPath(__DIR__);

// Handle the incoming request
$app->handleRequest(Request::capture());
