<?php
namespace App\Services;

class ClienteService {
    private $arquivo = 'clientes.json';

    /**
     * Retorna a lista de clientes formatada
     */
    public function findAll(): array {
        if (!file_exists($this->arquivo)) {
            return [];
        }
        $dados = file_get_contents($this->arquivo);
        return json_decode($dados, true) ?? [];
    }

    /**
     * Salvar os dados vindos do formulário
     */
    public function store(array $dados): bool {
        $json = json_encode($dados, JSON_PRETTY_PRINT);
        return file_put_contents($this->arquivo, $json) !== false;
    }
}