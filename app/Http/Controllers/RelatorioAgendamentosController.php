<?php


namespace App\Http\Controllers;


use App\Models\Agendamento;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class RelatorioAgendamentosController extends Controller
{
    public function relatorioAgendamentos(Request $request)
    {
        // Definir período padrão (últimos 30 dias)
        $dataInicio = $request->input('data_inicio', now()->subDays(30)->format('Y-m-d'));
        $dataFim = $request->input('data_fim', now()->format('Y-m-d'));


        // Buscar agendamentos no período com relacionamentos
        $agendamentos = Agendamento::whereBetween('data_hora_inicio', [$dataInicio . ' 00:00:00', $dataFim . ' 23:59:59'])
            ->with(['cliente', 'barbeiro', 'servico'])
            ->orderBy('data_hora_inicio', 'desc')
            ->get();


        // Contar agendamentos por status
        $total = $agendamentos->count();
        $agendados = $agendamentos->where('status', 'agendado')->count();
        $concluidos = $agendamentos->where('status', 'concluido')->count();
        $cancelados = $agendamentos->where('status', 'cancelado')->count();

        


        // Carregar a view e passar os dados
        $pdf = Pdf::loadView('relatorios.agendamentos', compact(
            'agendamentos',
            'dataInicio',
            'dataFim',
            'total',
            'agendados',
            'concluidos',
            'cancelados'
        ));


        // Stream (abrir no navegador) ou download
        return $pdf->stream('relatorio_agendamentos.pdf');
    }
}
