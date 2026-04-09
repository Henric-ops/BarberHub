<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nome', 'descricao', 'preco', 'duracao_minutos'])]
class Servico extends Model
{
   
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}
