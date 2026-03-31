<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Serviço para interagir com a API da Sabesp para dados dos mananciais.
 */
class SabespApiService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.sabesp.base_url');
    }

    /**
     * Busca a lista de sistemas de mananciais disponíveis.
     *
     * @return array|null
     */
    public function getSystems(): ?array
    {
        $url = "{$this->baseUrl}/sistemas";
        try {
            $response = Http::timeout(10)->get($url);

            if ($response->clientError()) {
                Log::warning("Erro de cliente na API Sabesp", [
                    'url' => $url,
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                throw new \Exception("Erro de requisição ({$response->status()})");
            }

            if ($response->serverError()) {
                Log::error("Erro interno na API Sabesp", [
                    'url' => $url,
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                throw new \Exception("API indisponível ({$response->status()})");
            }

            return $response->json();

        } catch (\Exception $e) {
            Log::error("Erro na API Sabesp {$url}", [
                'message' => $e->getMessage()
            ]);

            throw $e;
        }
    }

    /**
     * Busca o resumo diário dos mananciais para uma data específica.
     *
     * @param string $date Formato YYYY-MM-DD
     * @return array|null
     */
    public function getDailySummary(string $date): ?array
    {
        $url = "{$this->baseUrl}/sistemas/dados/resumo-diario/{$date}";
        
        try {
            $response = Http::timeout(10)->get($url);

            if ($response->clientError()) {
                Log::warning("Erro de cliente na API Sabesp", [
                    'url' => $url,
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                throw new \Exception("Erro de requisição ({$response->status()})");
            }

            if ($response->serverError()) {
                Log::error("Erro interno na API Sabesp", [
                    'url' => $url,
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                throw new \Exception("API indisponível ({$response->status()})");
            }

            return $response->json();

        } catch (\Exception $e) {
            Log::error("Erro na API Sabesp {$url}", [
                'message' => $e->getMessage()
            ]);

            throw $e;
        }
    }
}