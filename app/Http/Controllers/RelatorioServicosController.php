<?php


namespace App\Http\Controllers;


use App\Models\Servico;
use Barryvdh\DomPDF\Facade\Pdf;


class RelatorioServicosController extends Controller
{
    public function relatorioServicos()
    {
        // Buscar todos os serviços com contagem de agendamentos concluídos
        $servicos = Servico::withCount(['agendamentos' => function ($query) {
            $query->where('status', 'concluido');
        }])
            ->orderBy('agendamentos_count', 'desc')
            ->get();


        // Calcular estatísticas
        $totalServicos = $servicos->count();
        $servicosMaisUtilizados = $servicos->sum('agendamentos_count');
        $receitaTotal = 0;


        foreach ($servicos as $servico) {
            $receitaTotal += $servico->preco * $servico->agendamentos_count;
        }


        // Carregar a view e passar os dados
        $pdf = Pdf::loadView('relatorio.relservicos', compact(
            'servicos',
            'totalServicos',
            'servicosMaisUtilizados',
            'receitaTotal'
        ));


        // Stream (abrir no navegador)
        return $pdf->stream('relatorio_servicos.pdf');
    }
}


