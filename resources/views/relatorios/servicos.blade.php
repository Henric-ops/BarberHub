<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatório de Serviços</title>
    <style>
        /* RESET & BASE */
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
        
        /* HEADER */
        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
        }
        
        .header h1 { font-size: 22px; margin-bottom: 5px; }
        .header p { font-size: 14px; color: #666; }
        
        /* SEÇÕES */
        .section {
            margin-bottom: 30px;
        }
        
        .section-title {
            font-size: 13px;
            font-weight: bold;
            color: #333;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* TABELAS */
        .table-container {
            border: 1px solid #eee;
            border-radius: 4px;
            overflow: hidden;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 12px 10px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }
        
        th {
            background: #f8f9fa;
            font-weight: bold;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        
        /* RESUMO GERAL - Tabela Especial */
        .resumo-table th,
        .resumo-table td {
            padding: 15px 10px;
            text-align: center;
        }
        
        .resumo-table .number {
            font-size: 22px;
            font-weight: bold;
        }
        
        .resumo-table .label {
            font-size: 11px;
            color: #666;
            text-transform: uppercase;
        }
        
        /* RANKING */
        .ranking {
            text-align: center;
            font-weight: bold;
            width: 80px;
        }
        
        tr:hover td {
            background: #f9f9f9;
        }
        
        /* ESTADOS ESPECIAIS */
        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #888;
            font-style: italic;
            border: 1px dashed #eee;
        }
        
        /* FOOTER */
        .footer {
            text-align: center;
            padding-top: 25px;
            border-top: 1px solid #eee;
            font-size: 11px;
            color: #777;
        }
        
        /* PRINT */
        @media print {
            body { margin: 0; padding: 10px; }
        }
    </style>
</head>
<body>
    
    <div class="header">
        <h1>BarberHub</h1>
        <p>Relatório de Ranking de Serviços</p>
    </div>
    
    <!-- RESUMO GERAL -->
    <div class="section">
        <div class="section-title">Resumo Geral</div>
        <div class="table-container">
            <table class="resumo-table">
                <thead>
                    <tr>
                        <th>Serviços Cadastrados</th>
                        <th>Agendamentos Confirmados</th>
                        <th>Receita Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="number">{{ $totalServicos }}</td>
                        <td class="number">{{ $servicosMaisUtilizados }}</td>
                        <td class="number">R$ {{ number_format($receitaTotal, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- RANKING DE SERVIÇOS -->
    <div class="section">
        <div class="section-title">Ranking de Serviços Mais Realizados</div>
        
        @if($servicos->count() > 0 && $servicos->where('agendamentos_count', '>', 0)->count() > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th class="ranking">Posição</th>
                            <th>Serviço</th>
                            <th>Valor Unitário</th>
                            <th class="ranking">Agendamentos</th>
                            <th>Receita Gerada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($servicos as $index => $servico)
                            @if($servico->agendamentos_count > 0)
                                <tr>
                                    <td class="ranking">{{ $index + 1 }}º</td>
                                    <td>{{ $servico->nome }}</td>
                                    <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                                    <td class="ranking">{{ $servico->agendamentos_count }}</td>
                                    <td>R$ {{ number_format($servico->preco * $servico->agendamentos_count, 2, ',', '.') }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty">
                Nenhum serviço com agendamentos confirmados
            </div>
        @endif
    </div>
    
    <!-- FOOTER -->
    <div class="footer">
        Gerado em {{ now()->format('d/m/Y H:i:s') }} | BarberOS
    </div>
    
</body>
</html>