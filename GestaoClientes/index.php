<?php
session_start();

require_once 'autoload.php';

use App\Controllers\HomeController;
use App\Controllers\AuthController;

// Pega a URL vinda do navegador
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// AJUSTE PARA SUBPASTA: 
// Remove "/GestaoClientes" da string para que o switch entenda apenas a rota interna.
// Exemplo: "/GestaoClientes/dashboard" vira "/dashboard"
$uri = str_replace('/GestaoClientes', '', $uri);

// Garante que se a URL for vazia ou apenas "/", caia no case '/'
if ($uri == '' || $uri == '/') {
    $uri = '/';
}

switch ($uri) {
    case '/':
        (new HomeController())->index();
        break;

    case '/admin':
        (new AuthController())->loginForm();
        break;

    case '/dashboard':
        (new AuthController())->dashboard();
        break;

    case '/login':
        (new AuthController())->login();
        break;

    case '/logout':
        (new AuthController())->logout();
        break;

    case '/save-customers':
        (new App\Controllers\AuthController())->save();
        break;

    case '/list-customers':
        (new App\Controllers\AuthController())->list();
        break;

    default:
        http_response_code(404);
        echo "Página não encontrada dentro de GestaoClientes. URI processada: " . $uri;
        break;
}