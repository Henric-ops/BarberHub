<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAgendamentoRequest extends FormRequest
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
            'cliente_id' => 'required|exists:clientes,id',
            'barbeiro_id' => 'required|exists:users,id',
            'servico_id' => 'required|exists:servicos,id',
            'data_hora_inicio' => 'required|date_format:Y-m-d H:i',
            'data_hora_fim' => 'required|date_format:Y-m-d H:i|after:data_hora_inicio',
            'status' => 'nullable|in:agendado,concluido,cancelado',
        ];
    }
}
