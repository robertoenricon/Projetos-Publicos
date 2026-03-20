<?php
namespace App\Controllers;

use App\Config\AuthConfig;

class AuthController extends BaseController {

    /**
     * Exibe o formulário de login (Admin)
     */
    public function loginForm() {
        if ($this->isAuthenticated()) {
            $this->redirect('/dashboard');
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
            $this->redirect('/dashboard');
        }
        
        $_SESSION['error'] = 'Usuário ou senha inválidos.';
        $this->redirect('/admin');
    }

    /**
     * Finaliza a sessão do usuário
     */
    public function logout() {
        session_destroy();
        $this->redirect('/admin');
    }

}