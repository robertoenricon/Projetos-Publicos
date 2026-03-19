<?php
session_start();

require_once 'autoload.php';

use App\Controllers\HomeController;
use App\Controllers\AuthController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

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
    case '/salvar-clientes':
        (new App\Controllers\AuthController())->salvarClientes();
        break;
    case '/listar-clientes':
        (new App\Controllers\AuthController())->listarClientes();
        break;
    default:
        http_response_code(404);
        echo 'Página não encontrada.';
        break;
}