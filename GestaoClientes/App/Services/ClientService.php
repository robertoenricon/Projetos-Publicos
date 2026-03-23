<?php
namespace App\Services;

use App\Models\ClientModel;

/**
 * Service responsável pelas regras de negócio dos clientes.
 */
class ClientService
{
    private $clientModel;

    public function __construct(ClientModel $clientModel)
    {
        $this->clientModel = $clientModel;
    }

    /**
     * Retorna todos os clientes
     */
    public function findAll(): array
    {
        return $this->clientModel->findAll();
    }

    /**
     * Salva clientes
     */
    public function store(array $data): void
    {
        $this->clientModel->save($data);
    }
}