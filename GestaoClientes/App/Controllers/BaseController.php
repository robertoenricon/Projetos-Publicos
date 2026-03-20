<?php
namespace App\Controllers;

abstract class BaseController {
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

    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}