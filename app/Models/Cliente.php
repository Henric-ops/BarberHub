<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nome', 'cpf', 'email', 'telefone', 'endereco'])]
class Cliente extends Model
{

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}
