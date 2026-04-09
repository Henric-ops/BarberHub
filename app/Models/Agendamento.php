<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['cliente_id', 'barbeiro_id', 'servico_id', 'data_hora_inicio', 'data_hora_fim', 'status'])]
class Agendamento extends Model
{
    protected $casts = [
        'data_hora_inicio' => 'datetime',
        'data_hora_fim' => 'datetime',
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }


    public function barbeiro()
    {
        return $this->belongsTo(User::class, 'barbeiro_id');
    }


    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }


    public function isAgendado(): bool
    {
        return $this->status === 'agendado';
    }


    public function isConcluido(): bool
    {
        return $this->status === 'concluido';
    }


    public function isCancelado(): bool
    {
        return $this->status === 'cancelado';
    }
}
