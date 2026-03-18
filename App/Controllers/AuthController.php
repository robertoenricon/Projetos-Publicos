<?php
namespace App\Controllers;

use App\Config\AuthConfig;
use App\Services\ClienteService;

class AuthController extends BaseController {

    /**
     * @var ClienteService
     */
    private $clienteService;

    public function __construct() {
        $this->clienteService = new ClienteService();
    }

    /**
     * Exibe o formulário de login (Admin)
     */
    public function loginForm() {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            header('Location: /dashboard');
            exit;
        }

        $error = $_SESSION['error'] ?? '';
        unset($_SESSION['error']);
        
        return $this->view('admin', ['error' => $error]);
    }

    /**
     * Processa a tentativa de login
     */
    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === AuthConfig::USERNAME && $password === AuthConfig::PASSWORD) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            header('Location: /dashboard');
            exit;
        }
        
        $_SESSION['error'] = 'Usuário ou senha inválidos.';
        header('Location: /admin');
        exit;
    }

    /**
     * Exibe a tela do Dashboard
     */
    public function dashboard() {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header('Location: /admin');
            exit;
        }
        
        return $this->view('dashboard');
    }

    /**
     * Finaliza a sessão do usuário
     */
    public function logout() {
        session_destroy();
        header('Location: /admin');
        exit;
    }

    /**
     * Salva a lista de clientes enviada pelo Dashboard
     */
    public function salvarClientes() {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            return $this->json(['erro' => 'Não autorizado'], 403);
        }

        $input = file_get_contents('php://input');
        $dados = json_decode($input, true);

        if ($dados === null) {
            return $this->json(['erro' => 'Formato de dados inválido'], 400);
        }

        if ($this->clienteService->salvar($dados)) {
            return $this->json(['status' => 'sucesso']);
        }

        return $this->json(['erro' => 'Falha ao salvar arquivo no servidor'], 500);
    }

    /**
     * Retorna o conteúdo do JSON para preencher a tabela
     */
    public function listarClientes() {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            return $this->json(['erro' => 'Não autorizado'], 403);
        }

        $clientes = $this->clienteService->listarTudo();
        
        return $this->json($clientes);
    }
}