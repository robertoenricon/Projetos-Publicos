<?

namespace App\Models;

/**
 * Classe responsável por manipular os dados dos clientes.
 * 
 * Esta Model realiza a persistência dos dados em um arquivo JSON,
 * permitindo salvar e recuperar informações dos clientes.
 */

class ClientModel
{
    /**
     * Caminho do arquivo JSON onde os dados são armazenados
     * @var string
     */
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Salva um novo cliente no arquivo JSON
     *
     * @param array $data Dados do cliente a serem salvos
     */
    public function save(array $data): void
    {
        $result = file_put_contents(
            $this->file,
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        if ($result === false) {
            throw new \Exception('Erro ao salvar arquivo');
        }
    }

    /**
     * Retorna todos os clientes cadastrados
     *
     * @return array Lista de clientes
     */
    public function findAll(): array
    {
        if (!file_exists($this->file)) {
            return [];
        }

        $content = file_get_contents($this->file);
        $clientes = json_decode($content, true);

        return $clientes ?? [];
    }
}