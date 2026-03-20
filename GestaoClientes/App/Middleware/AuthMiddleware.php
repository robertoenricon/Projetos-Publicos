<?php
namespace App\Middleware;

class AuthMiddleware {

    /**
     * Executa a verificação de autenticação
     */
    public function handle() {
        // Se a sessão não estiver iniciada, inicia
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica se o usuário não está logado
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header('Location: /admin');
            exit;
        }
    }
}