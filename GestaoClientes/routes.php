<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\ClientController;
use App\Middleware\AuthMiddleware;
use App\Services\ClientService;
use App\Models\ClientModel;

// Pega a URL vinda do navegador
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// 1. Rotas protegidas
$rotasProtegidas = [
    '/dashboard',
    '/save-customers',
    '/list-customers'
];

// 2. Middleware
if (in_array($uri, $rotasProtegidas)) {
    (new AuthMiddleware())->handle();
}

// 3. Roteamento
switch ($uri) {
    case '/':
        (new HomeController())->index();
        break;

    case '/admin':
        (new AuthController())->loginForm();
        break;

    case '/login':
        (new AuthController())->login();
        break;

    case '/logout':
        (new AuthController())->logout();
        break;

    case '/dashboard':
        (new DashboardController())->index();
        break;

    case '/save-customers':
        $filePath = __DIR__ . '/clientes.json';

        $clientModel = new ClientModel($filePath);
        $clientService = new ClientService($clientModel);

        (new ClientController($clientService))->save();
        break;

    case '/list-customers':
        $filePath = __DIR__ . '/clientes.json';

        $clientModel = new ClientModel($filePath);
        $clientService = new ClientService($clientModel);

        (new ClientController($clientService))->list();
        break;

    default:
        http_response_code(404);
        echo "Página não encontrada. URI processada: " . $uri;
        break;
}