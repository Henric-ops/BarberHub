<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Relatório de Agendamentos</title>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }


        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
        }


        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #c9a84c;
            padding-bottom: 20px;
        }


        .header h1 {
            font-size: 28px;
            color: #0d0f14;
            margin-bottom: 5px;
        }


        .header p {
            color: #666;
            font-size: 12px;
        }


        .periodo {
            background-color: #f5f5f5;
            padding: 10px 15px;
            margin-bottom: 20px;
            border-left: 4px solid #c9a84c;
            font-size: 13px;
            color: #555;
        }


        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }


        .stat-box {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
        }


        .stat-box .number {
            font-size: 24px;
            font-weight: bold;
            color: #c9a84c;
        }


        .stat-box .label {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }


        th {
            background-color: #c9a84c;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            font-size: 13px;
        }


        td {
            border: 1px solid #ddd;
            padding: 10px 12px;
            font-size: 12px;
        }


        tr:nth-child(even) {
            background-color: #f9f9f9;
        }


        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 11px;
            font-weight: bold;
        }


        .status-confirmado {
            background-color: #2ec88a;
            color: white;
        }


        .status-pendente {
            background-color: #c9a84c;
            color: white;
        }


        .status-cancelado {
            background-color: #e05858;
            color: white;
        }


        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 11px;
            color: #999;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }


        .empty-message {
            text-align: center;
            padding: 30px;
            color: #999;
            font-size: 14px;
        }
    </style>
</head>

<body>


    <div class="container">


        <!-- HEADER -->
        <div class="header">
            <h1>BarberOS</h1>
            <p>Relatório de Agendamentos</p>
        </div>


        <!-- PERÍODO -->
        <div class="periodo">
            <strong>Período:</strong> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $dataInicio)->format('d/m/Y') }}
            até {{ \Carbon\Carbon::createFromFormat('Y-m-d', $dataFim)->format('d/m/Y') }}
        </div>


        <!-- ESTATÍSTICAS -->
        <div class="stats">
            <div class="stat-box">
                <div class="number">{{ $total }}</div>
                <div class="label">Total de Agendamentos</div>
            </div>
            <div class="stat-box">
                <div class="number">{{ $agendados }}</div>
                <div class="label">Agendados</div>
            </div>
            <div class="stat-box">
                <div class="number">{{ $concluidos }}</div>
                <div class="label">Concluídos</div>
            </div>
            <div class="stat-box">
                <div class="number">{{ $cancelados }}</div>
                <div class="label">Cancelados</div>
            </div>
        </div>


        <!-- TABELA DE AGENDAMENTOS -->
        @if($agendamentos->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Data/Hora</th>
                        <th>Cliente</th>
                        <th>Barbeiro</th>
                        <th>Serviço</th>
                        <th>Valor</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agendamentos as $agendamento)
                        <tr>
                            <td>{{ $agendamento->data_hora->format('d/m/Y H:i') }}</td>
                            <td>{{ $agendamento->cliente->nome ?? 'N/A' }}</td>
                            <td>{{ $agendamento->barbeiro->name ?? 'N/A' }}</td>
                            <td>{{ $agendamento->servico->nome ?? 'N/A' }}</td>
                            <td>R$ {{ number_format($agendamento->servico->preco ?? 0, 2, ',', '.') }}</td>
                            <td>
                                <span class="status-badge status-{{ $agendamento->status }}">
                                    {{ ucfirst($agendamento->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-message">
                📋 Nenhum agendamento encontrado neste período.
            </div>
        @endif


        <!-- FOOTER -->
        <div class="footer">
            <p>Relatório gerado em {{ now()->format('d/m/Y H:i:s') }} | BarberOS Sistema de Gestão</p>
        </div>


    </div>


</body>

</html>