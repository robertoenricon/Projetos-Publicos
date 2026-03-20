<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\ClientController;
use App\Middleware\AuthMiddleware;
use App\Services\ClientService;

// Pega a URL vinda do navegador
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// 1. Array de rotas que exigem o usuário logado
$rotasProtegidas = [
    '/dashboard',
    '/save-customers',
    '/list-customers'
];

// 2. Aplica o Middleware automaticamente se a rota for protegida
if (in_array($uri, $rotasProtegidas)) {
    (new AuthMiddleware())->handle();
}

// 3. Roteamento para os Controllers corretos
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
        // Passando o caminho absoluto do arquivo
        $caminhoArquivo = __DIR__ . '/clientes.json'; 
        $clientService = new ClientService($caminhoArquivo);
        (new ClientController($clientService))->save();
        break;

    case '/list-customers':
        $caminhoArquivo = __DIR__ . '/clientes.json';
        $clientService = new ClientService($caminhoArquivo);
        (new ClientController($clientService))->list();
        break;

    default:
        http_response_code(404);
        echo "Página não encontrada. URI processada: " . $uri;
        break;
}