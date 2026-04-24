<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    /**
     * Campos permitidos para preenchimento em massa
     */
    protected $fillable = [
        'cliente_id',
        'barbeiro_id',
        'servico_id',
        'data_hora_inicio',
        'data_hora_fim',
        'status'
    ];

    /**
     * Casts automáticos para datas
     */
    protected $casts = [
        'data_hora_inicio' => 'datetime',
        'data_hora_fim' => 'datetime',
    ];


    public function getDataHoraAttribute()
    {
        return $this->data_hora_inicio;
    }

    /**
     * Relacionamento: Cliente
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Relacionamento: Barbeiro (User)
     */
    public function barbeiro()
    {
        return $this->belongsTo(User::class, 'barbeiro_id');
    }

    /**
     * Relacionamento: Serviço
     */
    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }

    /**
     * Status: agendado
     */
    public function isAgendado(): bool
    {
        return $this->status === 'agendado';
    }

    /**
     * Status: concluído
     */
    public function isConcluido(): bool
    {
        return $this->status === 'concluido';
    }

    /**
     * Status: cancelado
     */
    public function isCancelado(): bool
    {
        return $this->status === 'cancelado';
    }
}