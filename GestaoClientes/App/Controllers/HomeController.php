<?php
namespace App\Controllers;

/**
 * Controller responsável pela Landing Page
 */
class HomeController extends BaseController {

    /**
     * Exibe a página inicial
     */
    public function index() {
        return $this->view('home');
    }
}