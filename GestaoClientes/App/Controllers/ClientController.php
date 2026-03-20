<?php
namespace App\Controllers;

use App\Services\ClientService;

/**
 * Controlador responsável por lidar com as requisições relacionadas aos clientes.
 * Ele recebe as requisições do Dashboard, processa os dados e interage com o ClientService.
 * Salvar ou recuperar as informações dos clientes. 
 * O controlador também é responsável por retornar o status para o Dashboard.
 */
class ClientController extends BaseController {

    private $clientService;

    public function __construct(ClientService $clientService) {
        $this->clientService = $clientService;
    }

    /**
     * Salva a lista de clientes enviada pelo Dashboard
     */
    public function save() {

        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        if ($data === null) {
            return $this->json(['erro' => 'Formato de dados inválido'], 400);
        }

        if ($this->clientService->store($data)) {
            return $this->json(['status' => 'sucesso']);
        }

        return $this->json(['erro' => 'Falha ao salvar arquivo no servidor'], 500);
    }

    /**
     * Retorna o conteúdo do JSON para preencher a tabela
     */
    public function list() {

        $clientes = $this->clientService->findAll();
        
        return $this->json($clientes);
    }
    
}