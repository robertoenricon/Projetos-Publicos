<?php
namespace App\Controllers;

/**
 * Controller responsável pela Landing Page do sistema, onde o usuário pode acessar informações 
 * sobre o sistema e realizar login.
 */
class HomeController extends BaseController {

    /**
     * Exibe a página inicial
     */
    public function index() {
        return $this->view('home');
    }
}