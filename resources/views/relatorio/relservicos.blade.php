<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Relatório de Serviços</title>


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


        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
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


        .ranking {
            font-weight: bold;
            color: #c9a84c;
            text-align: center;
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
            <p>Relatório de Ranking de Serviços Mais Realizados</p>
        </div>


        <!-- ESTATÍSTICAS -->
        <div class="stats">
            <div class="stat-box">
                <div class="number">{{ $totalServicos }}</div>
                <div class="label">Total de Serviços</div>
            </div>
            <div class="stat-box">
                <div class="number">{{ $servicosMaisUtilizados }}</div>
                <div class="label">Total de Agendamentos Confirmados</div>
            </div>
            <div class="stat-box">
                <div class="number">R$ {{ number_format($receitaTotal, 2, ',', '.') }}</div>
                <div class="label">Receita Total</div>
            </div>
        </div>


        <!-- TABELA DE SERVIÇOS -->
        @if($servicos->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th class="ranking">Posição</th>
                        <th>Serviço</th>
                        <th>Valor Unitário</th>
                        <th class="ranking">Agendamentos Confirmados</th>
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
        @else
            <div class="empty-message">
                📊 Nenhum serviço com agendamentos confirmados encontrado.
            </div>
        @endif


        <!-- FOOTER -->
        <div class="footer">
            <p>Relatório gerado em {{ now()->format('d/m/Y H:i:s') }} | BarberOS Sistema de Gestão</p>
        </div>


    </div>


</body>

</html>