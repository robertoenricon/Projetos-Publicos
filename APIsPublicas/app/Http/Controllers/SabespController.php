<?php

namespace App\Http\Controllers;

use App\Services\SabespApiService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\DailySummaryRequest;

class SabespController extends Controller
{
    protected SabespApiService $sabespService;

    public function __construct(SabespApiService $sabespService)
    {
        $this->sabespService = $sabespService;
    }

    /**
     * Processa a requisição para obter o resumo diário de uma data específica.
     *
     * @param string $date Data no formato YYYY-MM-DD
     * @return JsonResponse
     */
    public function showDailySummary(DailySummaryRequest $request, string $date): JsonResponse
    {   
        try {
            $systemsResponse = $this->sabespService->getSystems();
            $summaryResponse = $this->sabespService->getDailySummary($date);

            $systems = $systemsResponse['data'] ?? [];
            $summaries = $summaryResponse['data'] ?? [];

            $systemsMap = collect($systems)->pluck('name', 'id')->toArray();

            $formattedData = collect($summaries)->map(function ($summary) use ($systemsMap) {
                $nameSystem = $systemsMap[$summary['idSistema']] ?? 'Desconhecido';
                $nameSystem = trim(preg_replace('/sistema/i', '', $nameSystem));

                return [
                    'Nome' => $nameSystem,
                    'VolumePorcentagem' => number_format($summary['volumeUtilArmazenadoPorcentagem'] ?? 0, 1, ',', '.'),
                    'PluviometriaDia' => number_format($summary['chuva'] ?? 0, 1, ',', '.'),
                    'PluviometriaAcumuladaMes' => number_format($summary['chuvaAcumuladaNoMes'] ?? 0, 1, ',', '.')
                ];
            })->values()->toArray();

            return response()->json([
                'sistemas' => $formattedData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage() ?: 'Ocorreu um erro ao processar os dados da Sabesp.'
            ], 500);
        }
    }
}