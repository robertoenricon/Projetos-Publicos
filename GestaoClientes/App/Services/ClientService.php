<?php
namespace App\Services;

/**
 * Service responsável pela persistência e leitura dos dados dos clientes em um arquivo JSON.
 */
class ClientService {
    
    /**
     * @var string Caminho absoluto para o arquivo de dados.
     */
    private $filePath;

    public function __construct(string $filePath) {
        $this->filePath = $filePath;
    }

    /**
     * Recupera e decodifica a lista de todos os clientes.
     *
     * @return array Retorna um array com os clientes ou um array vazio em caso de falha.
     */
    public function findAll(): array {
        if (!file_exists($this->filePath)) {
            return [];
        }
        
        $fileContent = file_get_contents($this->filePath);
        
        if ($fileContent === false) {
            return [];
        }

        $decodedData = json_decode($fileContent, true);

        return is_array($decodedData) ? $decodedData : [];
    }

    /**
     * Converte o array de clientes em JSON e salva no arquivo.
     *
     * @param array $data Array contendo os dados dos clientes a serem salvos.
     * @return bool
     */
    public function store(array $data): bool {
        $json = json_encode($data, JSON_PRETTY_PRINT);
        
        if ($json === false) {
            return false;
        }

        return file_put_contents($this->filePath, $json) !== false;
    }
}