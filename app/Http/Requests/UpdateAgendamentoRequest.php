<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAgendamentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cliente_id' => 'nullable|exists:clientes,id',
            'barbeiro_id' => 'nullable|exists:users,id',
            'servico_id' => 'nullable|exists:servicos,id',
            'data_hora_inicio' => 'nullable|date_format:Y-m-d H:i',
            'data_hora_fim' => 'nullable|date_format:Y-m-d H:i|after:data_hora_inicio',
            'status' => 'nullable|in:agendado,concluido,cancelado',
        ];
    }
}
