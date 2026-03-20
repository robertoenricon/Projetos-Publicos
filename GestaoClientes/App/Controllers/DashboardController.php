<?php
namespace App\Controllers;

/**
 * Controller responsável pelo Dashboard do sistema, onde o usuário pode visualizar informações gerais 
 * e acessar outras funcionalidades.
 */
class DashboardController extends BaseController {
    public function index() {
        return $this->view('dashboard');
    }
}