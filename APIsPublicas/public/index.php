<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Dotenv\Dotenv;

define('LARAVEL_START', microtime(true));

$prodBasePath = __DIR__ . '/../../apispublicas_laravel';
$localBasePath = __DIR__ . '/..';

$basePath = is_dir($prodBasePath) ? $prodBasePath : $localBasePath;
$storagePath = $basePath . '/storage';

require $basePath . '/vendor/autoload.php';

if (file_exists($basePath . '/.env')) {
    $dotenv = Dotenv::createImmutable($basePath);
    $dotenv->load();
}

$appEnv = $_ENV['APP_ENV'] ?? 'production';

if ($basePath === $prodBasePath && $appEnv !== 'prod') {
    die('APP_ENV inválido para produção.');
}

if (file_exists($maintenance = $storagePath . '/framework/maintenance.php')) {
    require $maintenance;
}

/** @var Application $app */
$app = require_once $basePath . '/bootstrap/app.php';

if ($appEnv === 'prod') {
    $app->usePublicPath(__DIR__);
}

$app->handleRequest(Request::capture());