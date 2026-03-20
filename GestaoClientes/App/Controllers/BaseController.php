<?php
namespace App\Controllers;

/**
 * Fornece os métodos essenciais comuns a todos os controllers da aplicação.
 */
abstract class BaseController {
    
    /**
     * Renderiza uma view passando dados para ela
     */
    protected function view(string $view, array $data = []) {
        extract($data);

        $file = "App/Views/{$view}.php";

        if (file_exists($file)) {
            require_once $file;
        } else {
            http_response_code(500);
            echo "Erro: A view '{$view}' não foi encontrada.";
            exit;
        }
    }

    /**
     * Retorna uma resposta em formato JSON
     */
    protected function json($data, int $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Abstração/encapsulamentos para redirecionamentos HTTP
     */
    protected function redirect(string $url) {
        header("Location: {$url}");
        exit;
    }

    /**
     * Verifica se existe um usuário autenticado na sessão ativa
     */
    protected function isAuthenticated(): bool {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
}