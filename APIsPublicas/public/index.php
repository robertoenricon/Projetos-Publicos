<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Caminhos
$prodBasePath = realpath(__DIR__ . '/../../apispublicas_laravel');
$localBasePath = realpath(__DIR__ . '/..');

// Detecta ambiente (antes do Laravel bootar)
$appEnv = getenv('APP_ENV') ?: 'prod';

// Define base path
$basePath = ($appEnv === 'prod' && is_dir($prodBasePath))
    ? $prodBasePath
    : $localBasePath;

$storagePath = $basePath . '/storage';

// Autoload
require $basePath . '/vendor/autoload.php';

// Maintenance
if (file_exists($maintenance = $storagePath . '/framework/maintenance.php')) {
    require $maintenance;
}

// Boot Laravel
/** @var Application $app */
$app = require_once $basePath . '/bootstrap/app.php';

$app->usePublicPath(__DIR__);

// Handle request
$app->handleRequest(Request::capture());