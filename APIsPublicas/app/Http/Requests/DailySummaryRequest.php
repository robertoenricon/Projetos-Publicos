<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DailySummaryRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer essa requisição.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepara os dados para a validação.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'date' => $this->route('date'),
        ]);
    }

    /**
     * Retorna as regras de validação.
     */
    public function rules(): array
    {
        return [
            'date' => [
                'required',
                'date_format:Y-m-d',
                'before_or_equal:today'
            ],
        ];
    }

    /**
     * Retorna as mensagens de erro personalizadas.
     */
    public function messages(): array
    {
        return [
            'date.date_format' => 'O formato da data deve ser exatamente YYYY-MM-DD.',
            'date.before_or_equal' => 'Não é possível consultar uma data futura.',
        ];
    }
}
