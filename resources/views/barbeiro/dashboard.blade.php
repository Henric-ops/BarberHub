<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BarberOS — Dashboard Barbeiro</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet" />

    <style>
        :root {
            --bg-base: #0d0f14;
            --bg-panel: #13161e;
            --bg-card: #1a1e28;
            --bg-hover: #20263380;
            --border: #ffffff0f;
            --border-light: #ffffff18;
            --gold: #c9a84c;
            --gold-dim: #c9a84c22;
            --gold-mid: #c9a84c55;
            --green: #2ec88a;
            --green-dim: #2ec88a18;
            --red: #e05858;
            --red-dim: #e0585818;
            --blue: #4d8ef0;
            --blue-dim: #4d8ef018;
            --text: #f0ede6;
            --text-muted: #8a8fa0;
            --text-dim: #555b6e;
            --radius: 14px;
            --radius-sm: 8px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg-base);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: var(--bg-panel);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            padding: 0;
            flex-shrink: 0;
            position: sticky;
            top: 0;
            align-self: flex-start;
        }

        .sidebar-brand {
            padding: 28px 24px 22px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            background: var(--gold);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .brand-icon i {
            color: #0d0f14;
            font-size: 16px;
        }

        .brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--text);
            letter-spacing: .3px;
        }

        .brand-sub {
            font-size: 11px;
            color: var(--text-muted);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-nav {
            flex: 1;
            padding: 16px 12px;
        }

        .nav-section-label {
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--text-dim);
            padding: 14px 12px 8px;
        }

        .nav-item {
            list-style: none;
            margin-bottom: 2px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: var(--radius-sm);
            color: var(--text-muted);
            font-size: 13.5px;
            font-weight: 500;
            text-decoration: none;
            transition: all .2s;
            cursor: pointer;
        }

        .nav-link:hover {
            background: var(--bg-hover);
            color: var(--text);
        }

        .nav-link.active {
            background: var(--gold-dim);
            color: var(--gold);
        }

        .nav-link i {
            width: 18px;
            text-align: center;
            font-size: 13px;
            flex-shrink: 0;
        }

        .nav-badge {
            margin-left: auto;
            background: var(--red);
            color: #fff;
            font-size: 10px;
            font-weight: 600;
            padding: 2px 7px;
            border-radius: 20px;
        }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid var(--border);
        }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: var(--radius-sm);
            background: var(--bg-card);
            cursor: pointer;
            transition: background .2s;
        }

        .user-chip:hover {
            background: var(--bg-hover);
        }

        .avatar {
            width: 34px;
            height: 34px;
            background: var(--gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            color: #0d0f14;
            flex-shrink: 0;
        }

        .user-info {
            flex: 1;
            overflow: hidden;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role {
            font-size: 11px;
            color: var(--text-muted);
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 32px 36px;
            overflow-y: auto;
        }

        /* TOPBAR */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 36px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .topbar-left h1 {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 700;
            color: var(--text);
        }

        .topbar-left p {
            font-size: 13.5px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .icon-btn {
            width: 38px;
            height: 38px;
            background: var(--bg-panel);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            cursor: pointer;
            transition: all .2s;
            position: relative;
        }

        .icon-btn:hover {
            background: var(--bg-card);
            color: var(--text);
            border-color: var(--border-light);
        }

        .notif-dot {
            position: absolute;
            top: 7px;
            right: 7px;
            width: 7px;
            height: 7px;
            background: var(--gold);
            border-radius: 50%;
            border: 1.5px solid var(--bg-base);
        }

        .btn-primary-gold {
            background: var(--gold);
            color: #0d0f14;
            border: none;
            border-radius: var(--radius-sm);
            padding: 9px 18px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 7px;
            transition: filter .2s, transform .15s;
            text-decoration: none;
        }

        .btn-primary-gold:hover {
            filter: brightness(1.1);
            transform: translateY(-1px);
            text-decoration: none;
            color: #0d0f14;
        }

        /* KPI STRIP */
        .kpi-strip {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 16px;
            margin-bottom: 28px;
        }

        .kpi-card {
            background: var(--bg-panel);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 22px 20px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            transition: border-color .25s, transform .2s;
            animation: fadeUp .5s ease both;
        }

        .kpi-card:hover {
            border-color: var(--border-light);
            transform: translateY(-2px);
        }

        .kpi-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .kpi-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .kpi-icon.gold {
            background: var(--gold-dim);
            color: var(--gold);
        }

        .kpi-icon.green {
            background: var(--green-dim);
            color: var(--green);
        }

        .kpi-icon.blue {
            background: var(--blue-dim);
            color: var(--blue);
        }

        .kpi-icon.red {
            background: var(--red-dim);
            color: var(--red);
        }

        .kpi-trend {
            font-size: 11.5px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 20px;
        }

        .kpi-trend.up {
            background: var(--green-dim);
            color: var(--green);
        }

        .kpi-val {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            font-weight: 700;
            color: var(--text);
            line-height: 1;
        }

        .kpi-label {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 3px;
        }

        /* CONTENT GRID */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 20px;
        }

        /* PANEL */
        .panel {
            background: var(--bg-panel);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            animation: fadeUp .5s ease .25s both;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
        }

        .panel-title {
            font-size: 14.5px;
            font-weight: 600;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .panel-title i {
            color: var(--gold);
            font-size: 13px;
        }

        .table {
            color: var(--text);
            border-color: var(--border);
        }

        .table thead th {
            border-color: var(--border);
            color: var(--text-muted);
            font-weight: 600;
            font-size: 12px;
        }

        .table tbody td {
            border-color: var(--border);
            font-size: 13px;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: var(--bg-hover);
        }

        .badge {
            font-weight: 600;
            font-size: 11px;
            padding: 4px 10px;
        }

        .badge-success {
            background: var(--green-dim);
            color: var(--green);
        }

        .badge-warning {
            background: var(--gold-dim);
            color: var(--gold);
        }

        .badge-danger {
            background: var(--red-dim);
            color: var(--red);
        }

        .badge-info {
            background: var(--blue-dim);
            color: var(--blue);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .sidebar-brand,
            .nav-section-label,
            .nav-link span:not(.nav-badge),
            .user-info {
                display: none;
            }

            .main {
                padding: 16px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .kpi-strip {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="layout">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                <div class="brand-icon"><i class="fas fa-cut"></i></div>
                <div>
                    <div class="brand-text">BarberOS</div>
                    <div class="brand-sub">Barbeiro</div>
                </div>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section-label">Menu</div>
                <ul style="list-style:none;padding:0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('barbeiro.dashboard') }}"><i class="fas fa-chart-line"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agendamentos.index') }}"><i class="fas fa-calendar-alt"></i> Meus Agendamentos <span
                                class="nav-badge">{{ $agendamentosCount ?? 0 }}</span></a>
                    </li>
                </ul>
            </nav>

            <div class="sidebar-footer">
                <div class="user-chip" onclick="document.getElementById('logout-form').submit();">
                    <div class="avatar">{{ substr(auth()->user()->name, 0, 2) }}</div>
                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->name }}</div>
                        <div class="user-role">Barbeiro</div>
                    </div>
                    <i class="fas fa-sign-out-alt" style="font-size:10px;color:var(--text-dim)"></i>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </aside>

        <!-- MAIN -->
        <main class="main">

            <!-- TOPBAR -->
            <div class="topbar">
                <div class="topbar-left">
                    <h1>Olá, {{ auth()->user()->name }} 👋</h1>
                    <p>Seus agendamentos — <span id="js-date" style="color:var(--gold)"></span></p>
                </div>
                <div class="topbar-right">
                    <div class="icon-btn">
                        <i class="fas fa-bell" style="font-size:13px"></i>
                        <span class="notif-dot"></span>
                    </div>
                    <a href="{{ route('agendamentos.create') }}" class="btn-primary-gold">
                        <i class="fas fa-plus"></i> Novo agendamento
                    </a>
                </div>
            </div>

            <!-- KPI STRIP -->
            <div class="kpi-strip">

                <div class="kpi-card">
                    <div class="kpi-head">
                        <div class="kpi-icon gold"><i class="fas fa-calendar-check"></i></div>
                    </div>
                    <div>
                        <div class="kpi-val">{{ $agendamentosCount ?? 0 }}</div>
                        <div class="kpi-label">Agendamentos totais</div>
                    </div>
                </div>

            </div>

            <!-- CONTENT GRID -->
            <div class="content-grid">

                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title"><i class="fas fa-calendar"></i> Próximos Agendamentos</div>
                    </div>

                    <div style="overflow-x: auto;">
                        <table class="table table-sm" style="margin-bottom: 0">
                            <thead style="background: var(--bg-card)">
                                <tr>
                                    <th style="padding: 14px 16px;">Data</th>
                                    <th style="padding: 14px 16px;">Cliente</th>
                                    <th style="padding: 14px 16px;">Serviço</th>
                                    <th style="padding: 14px 16px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 12px 16px;">24 de abril</td>
                                    <td style="padding: 12px 16px;">João Silva</td>
                                    <td style="padding: 12px 16px;">Corte + Barba</td>
                                    <td style="padding: 12px 16px;"><span class="badge badge-success">Confirmado</span></td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 16px;">25 de abril</td>
                                    <td style="padding: 12px 16px;">Carlos Santos</td>
                                    <td style="padding: 12px 16px;">Corte</td>
                                    <td style="padding: 12px 16px;"><span class="badge badge-warning">Pendente</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div style="display: flex; flex-direction: column; gap: 20px;">

                    <div class="panel">
                        <div class="panel-header">
                            <div class="panel-title"><i class="fas fa-info-circle"></i> Informações</div>
                        </div>
                        <div style="padding: 20px 24px;">
                            <div style="display: flex; flex-direction: column; gap: 12px;">
                                <div>
                                    <div style="font-size: 11px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Seu nome</div>
                                    <div style="font-size: 14px; font-weight: 600; color: var(--text);">{{ auth()->user()->name }}</div>
                                </div>
                                <div>
                                    <div style="font-size: 11px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Email</div>
                                    <div style="font-size: 14px; font-weight: 600; color: var(--text);">{{ auth()->user()->email }}</div>
                                </div>
                                <div>
                                    <div style="font-size: 11px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Telefone</div>
                                    <div style="font-size: 14px; font-weight: 600; color: var(--text);">{{ auth()->user()->telefone ?? 'Não informado' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </main>
    </div>

    <script>
        // Atualizar data
        const dateElement = document.getElementById('js-date');
        const today = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        dateElement.textContent = today.toLocaleDateString('pt-BR', options);
    </script>
</body>

</html>
