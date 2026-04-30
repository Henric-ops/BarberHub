<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
        $cliente = $this->route('cliente'); // objeto
        $clienteId = $cliente?->id; // pega o ID com segurança

        return [
            'nome' => 'nullable|string|max:255',
            'cpf' => 'nullable|string|unique:clientes,cpf,' . $clienteId,
            'email' => 'nullable|email',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string',
        ];
    }
}
