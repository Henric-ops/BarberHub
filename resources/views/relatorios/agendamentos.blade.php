<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatório de Agendamentos</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
        }
        
        .header h1 {
            font-size: 22px;
            margin-bottom: 5px;
        }
        
        .periodo {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 13px;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 25px;
            padding: 15px;
            border: 1px solid #eee;
        }
        
        .stat {
            text-align: center;
        }
        
        .stat .number {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 3px;
        }
        
        .stat .label {
            font-size: 11px;
            text-transform: uppercase;
            color: #666;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        th, td {
            padding: 10px 8px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        th {
            background: #f8f9fa;
            font-weight: bold;
            font-size: 11px;
            text-transform: uppercase;
        }
        
        .status {
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .status-agendado { background: #e3f2fd; color: #1565c0; }
        .status-concluido { background: #e8f5e8; color: #2e7d32; }
        .status-cancelado { background: #ffebee; color: #c62828; }
        
        .empty {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }
        
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 11px;
            color: #666;
        }
        
        @media print {
            body { margin: 0; padding: 10px; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>BarberHub</h1>
        <p>Relatório de Agendamentos</p>
    </div>
    
    <div class="periodo">
        Período: {{ \Carbon\Carbon::createFromFormat('Y-m-d', $dataInicio)->format('d/m/Y') }} 
        até {{ \Carbon\Carbon::createFromFormat('Y-m-d', $dataFim)->format('d/m/Y') }}
    </div>
    
    <div class="stats">
        <div class="stat">
            <div class="number">{{ $total }}</div>
            <div class="label">Total</div>
        </div>
        <div class="stat">
            <div class="number">{{ $agendados }}</div>
            <div class="label">Agendados</div>
        </div>
        <div class="stat">
            <div class="number">{{ $concluidos }}</div>
            <div class="label">Concluídos</div>
        </div>
        <div class="stat">
            <div class="number">{{ $cancelados }}</div>
            <div class="label">Cancelados</div>
        </div>
    </div>
    
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
                        <td>{{ $agendamento->data_hora_inicio->format('d/m/Y H:i') }}</td>
                        <td>{{ $agendamento->cliente->nome ?? 'N/A' }}</td>
                        <td>{{ $agendamento->barbeiro->name ?? 'N/A' }}</td>
                        <td>{{ $agendamento->servico->nome ?? 'N/A' }}</td>
                        <td>R$ {{ number_format($agendamento->servico->preco ?? 0, 2, ',', '.') }}</td>
                        <td><span class="status status-{{ $agendamento->status }}">{{ ucfirst($agendamento->status) }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty">Nenhum agendamento encontrado</div>
    @endif
    
    <div class="footer">
        Gerado em {{ now()->format('d/m/Y H:i:s') }}
    </div>
</body>
</html>