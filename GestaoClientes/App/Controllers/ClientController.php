<?php
namespace App\Controllers;

use App\Services\ClientService;

/**
 * Controlador responsável por lidar com as requisições relacionadas aos clientes.
 */
class ClientController extends BaseController
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Valida a lista de clientes enviada pelo Dashboard
     */
    public function save()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        // Verifica JSON inválido
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->json([
                'erro' => 'JSON inválido: ' . json_last_error_msg()
            ], 400);
        }

        if (empty($data)) {
            return $this->json([
                'erro' => 'Dados vazios'
            ], 422);
        }

        try {
            $this->clientService->store($data);

            return $this->json([
                'status' => 'sucesso'
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'erro' => 'Erro ao salvar: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Retorna o conteúdo do JSON para preencher a tabela
     */
    public function list()
    {
        try {
            $clientes = $this->clientService->findAll();

            return $this->json($clientes);
        } catch (\Exception $e) {
            return $this->json([
                'erro' => 'Erro ao buscar dados'
            ], 500);
        }
    }
}