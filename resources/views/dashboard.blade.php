<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BarberOS — Dashboard</title>
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

        *,
        *::before,
        *::after {
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

        /* ── LAYOUT ──────────────────────────────────── */
        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* ── SIDEBAR ─────────────────────────────────── */
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

        /* ── MAIN ────────────────────────────────────── */
        .main {
            flex: 1;
            padding: 32px 36px;
            overflow-y: auto;
        }

        /* ── TOPBAR ──────────────────────────────────── */
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
        }

        .btn-primary-gold:hover {
            filter: brightness(1.1);
            transform: translateY(-1px);
        }

        /* ── KPI STRIP ───────────────────────────────── */
        .kpi-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
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

        .kpi-card:nth-child(1) {
            animation-delay: .05s;
        }

        .kpi-card:nth-child(2) {
            animation-delay: .1s;
        }

        .kpi-card:nth-child(3) {
            animation-delay: .15s;
        }

        .kpi-card:nth-child(4) {
            animation-delay: .2s;
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

        .kpi-trend.down {
            background: var(--red-dim);
            color: var(--red);
        }

        .kpi-trend.neu {
            background: var(--bg-card);
            color: var(--text-muted);
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

        /* ── CONTENT GRID ────────────────────────────── */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 20px;
        }

        /* ── PANEL ───────────────────────────────────── */
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

        .panel-sub {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 1px;
        }

        .tab-pills {
            display: flex;
            gap: 4px;
        }

        .tab-pill {
            font-size: 11.5px;
            font-weight: 500;
            padding: 5px 12px;
            border-radius: 6px;
            cursor: pointer;
            color: var(--text-muted);
            transition: all .2s;
            border: none;
            background: transparent;
        }

        .tab-pill.active {
            background: var(--gold-dim);
            color: var(--gold);
        }

        .tab-pill:hover:not(.active) {
            background: var(--bg-card);
            color: var(--text);
        }

        /* ── SCHEDULE TABLE ──────────────────────────── */
        .schedule-body {
            padding: 0 8px 8px;
        }

        .sched-row {
            display: grid;
            grid-template-columns: 70px 1fr auto;
            align-items: center;
            gap: 14px;
            padding: 13px 16px;
            border-radius: var(--radius-sm);
            transition: background .2s;
            cursor: default;
        }

        .sched-row:hover {
            background: var(--bg-hover);
        }

        .sched-time {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
        }

        .sched-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sched-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .sched-dot.gold {
            background: var(--gold);
        }

        .sched-dot.green {
            background: var(--green);
        }

        .sched-dot.blue {
            background: var(--blue);
        }

        .sched-dot.red {
            background: var(--red);
        }

        .sched-name {
            font-size: 13.5px;
            font-weight: 500;
            color: var(--text);
        }

        .sched-service {
            font-size: 11.5px;
            color: var(--text-muted);
        }

        .status-pill {
            font-size: 11px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
            white-space: nowrap;
        }

        .status-pill.confirmed {
            background: var(--green-dim);
            color: var(--green);
        }

        .status-pill.pending {
            background: var(--gold-dim);
            color: var(--gold);
        }

        .status-pill.done {
            background: var(--bg-card);
            color: var(--text-dim);
        }

        .status-pill.cancelled {
            background: var(--red-dim);
            color: var(--red);
        }

        /* ── CHART BAR ───────────────────────────────── */
        .chart-wrap {
            padding: 20px 24px;
        }

        .bar-chart {
            display: flex;
            align-items: flex-end;
            gap: 8px;
            height: 100px;
            margin-top: 8px;
        }

        .bar-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            flex: 1;
        }

        .bar-fill {
            width: 100%;
            border-radius: 5px 5px 0 0;
            background: var(--gold-mid);
            transition: height .6s ease;
            position: relative;
            overflow: hidden;
        }

        .bar-fill::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(201, 168, 76, .5) 0%, transparent 100%);
        }

        .bar-fill.active {
            background: var(--gold);
        }

        .bar-label {
            font-size: 10px;
            color: var(--text-dim);
        }

        /* ── RIGHT COLUMN ────────────────────────────── */
        .right-col {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* ── HERO CARD ───────────────────────────────── */
        .hero-card {
            background: var(--bg-panel);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 28px 24px;
            position: relative;
            overflow: hidden;
            animation: fadeUp .5s ease .1s both;
        }

        .hero-card::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, var(--gold-dim) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-scissors {
            font-size: 80px;
            position: absolute;
            right: 16px;
            bottom: -12px;
            color: var(--gold-mid);
            transform: rotate(-30deg);
            pointer-events: none;
        }

        .hero-date {
            font-size: 11px;
            color: var(--gold);
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--text);
            line-height: 1.25;
            margin-bottom: 10px;
        }

        .hero-sub {
            font-size: 12.5px;
            color: var(--text-muted);
            margin-bottom: 20px;
        }

        .metric-row {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .mini-metric {
            flex: 1;
            background: var(--bg-card);
            border-radius: 10px;
            padding: 12px 14px;
        }

        .mini-metric-val {
            font-size: 20px;
            font-weight: 700;
            color: var(--text);
            font-family: 'Playfair Display', serif;
        }

        .mini-metric-lbl {
            font-size: 11px;
            color: var(--text-muted);
        }

        /* ── QUICK ACTIONS ───────────────────────────── */
        .actions-panel {
            background: var(--bg-panel);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            animation: fadeUp .5s ease .3s both;
        }

        .action-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border);
            cursor: pointer;
            transition: background .2s;
        }

        .action-item:last-child {
            border-bottom: none;
        }

        .action-item:hover {
            background: var(--bg-hover);
        }

        .action-icon {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            flex-shrink: 0;
        }

        .action-text {
            flex: 1;
        }

        .action-title {
            font-size: 13px;
            font-weight: 500;
            color: var(--text);
        }

        .action-sub {
            font-size: 11.5px;
            color: var(--text-muted);
        }

        .action-badge {
            font-size: 11px;
            font-weight: 600;
            padding: 2px 9px;
            border-radius: 20px;
        }

        /* ── PROGRESS ────────────────────────────────── */
        .progress-wrap {
            padding: 20px 24px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .prog-item {}

        .prog-head {
            display: flex;
            justify-content: space-between;
            font-size: 12.5px;
            margin-bottom: 6px;
        }

        .prog-name {
            font-weight: 500;
            color: var(--text);
        }

        .prog-pct {
            color: var(--text-muted);
        }

        .prog-bar {
            height: 5px;
            background: var(--bg-card);
            border-radius: 10px;
            overflow: hidden;
        }

        .prog-fill {
            height: 100%;
            border-radius: 10px;
            transition: width 1s ease;
        }

        /* ── DIVIDER ─────────────────────────────────── */
        .divider {
            height: 1px;
            background: var(--border);
            margin: 0;
        }

        /* ── ANIMATIONS ──────────────────────────────── */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ── SCROLLBAR ───────────────────────────────── */
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-base);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--bg-card);
            border-radius: 10px;
        }

        /* ── RESPONSIVE ──────────────────────────────── */
        @media (max-width: 1200px) {
            .kpi-strip {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main {
                padding: 20px 18px;
            }

            .kpi-strip {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .topbar-left h1 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="layout">

        <!-- ── SIDEBAR ── -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                <div class="brand-icon"><i class="fas fa-scissors"></i></div>
                <div>
                    <div class="brand-text">BarberOS</div>
                    <div class="brand-sub">Studio</div>
                </div>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section-label">Principal</div>
                <ul style="list-style:none;padding:0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}"><i class="fas fa-chart-line"></i>
                            Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agendamentos.index') }}"><i class="fas fa-calendar-alt"></i>
                            Agendamentos <span class="nav-badge">3</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clientes.index') }}"><i class="fas fa-users"></i>
                            Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('servicos.index') }}"><i class="fas fa-cut"></i> Serviços</a>
                    </li>
                </ul>

                <div class="nav-section-label">Gestão</div>
                <ul style="list-style:none;padding:0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barbeiros.index') }}"><i class="fas fa-user-tie"></i>
                            Barbeiros</a>
                    </li>

                </ul>
            </nav>

            <div class="sidebar-footer">
                <div class="user-chip" onclick="document.getElementById('logout-form').submit();">
                    <div class="avatar">{{ substr(auth()->user()->name, 0, 2) }}</div>
                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->name }}</div>
                        <div class="user-role">{{ ucfirst(auth()->user()->cargo) }}</div>
                    </div>
                    <i class="fas fa-sign-out-alt" style="font-size:10px;color:var(--text-dim)"></i>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </aside>

        <!-- ── MAIN ── -->
        <main class="main">

            <!-- TOPBAR -->
            <div class="topbar">
                <div class="topbar-left">
                    <h1>Olá, Rafael 👋</h1>
                    <p>Visão geral da sua barbearia — <span id="js-date" style="color:var(--gold)"></span></p>
                </div>
                <div class="topbar-right">
                    <div class="icon-btn">
                        <i class="fas fa-bell" style="font-size:13px"></i>
                        <span class="notif-dot"></span>
                    </div>
                    <div class="icon-btn"><i class="fas fa-search" style="font-size:13px"></i></div>
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
                        <span class="kpi-trend up"><i class="fas fa-arrow-up"></i> +12%</span>
                    </div>
                    <div>
                        <div class="kpi-val" data-target="248">0</div>
                        <div class="kpi-label">Agendamentos totais</div>
                    </div>
                </div>

                <div class="kpi-card">
                    <div class="kpi-head">
                        <div class="kpi-icon green"><i class="fas fa-users"></i></div>
                        <span class="kpi-trend up"><i class="fas fa-arrow-up"></i> +8%</span>
                    </div>
                    <div>
                        <div class="kpi-val" data-target="134">0</div>
                        <div class="kpi-label">Clientes cadastrados</div>
                    </div>
                </div>

                <div class="kpi-card">
                    <div class="kpi-head">
                        <div class="kpi-icon blue"><i class="fas fa-dollar-sign"></i></div>
                        <span class="kpi-trend up"><i class="fas fa-arrow-up"></i> +7%</span>
                    </div>
                    <div>
                        <div class="kpi-val" id="receita-val">R$&nbsp;0</div>
                        <div class="kpi-label">Faturamento do mês</div>
                    </div>
                </div>

                <div class="kpi-card">
                    <div class="kpi-head">
                        <div class="kpi-icon red"><i class="fas fa-exclamation-circle"></i></div>
                        <span class="kpi-trend down"><i class="fas fa-arrow-down"></i> &nbsp;Atenção</span>
                    </div>
                    <div>
                        <div class="kpi-val" data-target="3">0</div>
                        <div class="kpi-label">Pendentes de confirmação</div>
                    </div>
                </div>

            </div>

            <!-- CONTENT GRID -->
            <div class="content-grid">

                <!-- LEFT: agenda + chart -->
                <div style="display:flex;flex-direction:column;gap:20px;">

                    <!-- Agenda de hoje -->
                    <div class="panel">
                        <div class="panel-header">
                            <div>
                                <div class="panel-title"><i class="fas fa-calendar-day"></i> Agenda de hoje</div>
                                <div class="panel-sub">Sexta-feira, 24 de abril</div>
                            </div>
                            <div class="tab-pills">
                                <button class="tab-pill active">Todos</button>
                                <button class="tab-pill">Confirmados</button>
                                <button class="tab-pill">Pendentes</button>
                            </div>
                        </div>
                        <div class="schedule-body">

                            <div class="sched-row">
                                <span class="sched-time">08:30</span>
                                <div class="sched-info">
                                    <span class="sched-dot green"></span>
                                    <div>
                                        <div class="sched-name">Lucas Mendonça</div>
                                        <div class="sched-service">Corte + Barba • Rafael G.</div>
                                    </div>
                                </div>
                                <span class="status-pill confirmed">Confirmado</span>
                            </div>

                            <div class="sched-row">
                                <span class="sched-time">09:15</span>
                                <div class="sched-info">
                                    <span class="sched-dot gold"></span>
                                    <div>
                                        <div class="sched-name">Carlos Andrade</div>
                                        <div class="sched-service">Corte Social • Diego A.</div>
                                    </div>
                                </div>
                                <span class="status-pill pending">Pendente</span>
                            </div>

                            <div class="sched-row">
                                <span class="sched-time">10:00</span>
                                <div class="sched-info">
                                    <span class="sched-dot blue"></span>
                                    <div>
                                        <div class="sched-name">Fernando Lima</div>
                                        <div class="sched-service">Barba Terapia • Rafael G.</div>
                                    </div>
                                </div>
                                <span class="status-pill confirmed">Confirmado</span>
                            </div>

                            <div class="sched-row">
                                <span class="sched-time">11:00</span>
                                <div class="sched-info">
                                    <span class="sched-dot gold"></span>
                                    <div>
                                        <div class="sched-name">Pedro Alves</div>
                                        <div class="sched-service">Corte + Barba • Diego A.</div>
                                    </div>
                                </div>
                                <span class="status-pill pending">Pendente</span>
                            </div>

                            <div class="sched-row">
                                <span class="sched-time">13:30</span>
                                <div class="sched-info">
                                    <span class="sched-dot green"></span>
                                    <div>
                                        <div class="sched-name">Bruno Farias</div>
                                        <div class="sched-service">Corte Degradê • Rafael G.</div>
                                    </div>
                                </div>
                                <span class="status-pill done">Concluído</span>
                            </div>

                            <div class="sched-row">
                                <span class="sched-time">15:00</span>
                                <div class="sched-info">
                                    <span class="sched-dot red"></span>
                                    <div>
                                        <div class="sched-name">Thiago Rocha</div>
                                        <div class="sched-service">Corte Social • Diego A.</div>
                                    </div>
                                </div>
                                <span class="status-pill cancelled">Cancelado</span>
                            </div>

                        </div>
                    </div>

                    <!-- Faturamento semanal -->
                    <div class="panel">
                        <div class="panel-header">
                            <div>
                                <div class="panel-title"><i class="fas fa-chart-bar"></i> Faturamento semanal</div>
                                <div class="panel-sub">Últimos 7 dias</div>
                            </div>
                            <span style="font-size:20px;font-family:'Playfair Display',serif;color:var(--text)">R$
                                1.717</span>
                        </div>
                        <div class="chart-wrap">
                            <div class="bar-chart" id="bar-chart"></div>
                        </div>

                        <!-- progress dos serviços -->
                        <div class="divider"></div>
                        <div class="progress-wrap">
                            <div class="prog-item">
                                <div class="prog-head"><span class="prog-name">Corte + Barba</span><span
                                        class="prog-pct">68%</span></div>
                                <div class="prog-bar">
                                    <div class="prog-fill" style="width:0;background:var(--gold)" data-w="68"></div>
                                </div>
                            </div>
                            <div class="prog-item">
                                <div class="prog-head"><span class="prog-name">Corte Social</span><span
                                        class="prog-pct">48%</span></div>
                                <div class="prog-bar">
                                    <div class="prog-fill" style="width:0;background:var(--blue)" data-w="48"></div>
                                </div>
                            </div>
                            <div class="prog-item">
                                <div class="prog-head"><span class="prog-name">Barba Terapia</span><span
                                        class="prog-pct">31%</span></div>
                                <div class="prog-bar">
                                    <div class="prog-fill" style="width:0;background:var(--green)" data-w="31"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="right-col">

                    <!-- Hero card -->
                    <div class="hero-card">
                        <i class="fas fa-cut hero-scissors"></i>
                        <div class="hero-date">📍 Hoje, Sexta-feira</div>
                        <div class="hero-title">Gestão inteligente da sua barbearia</div>
                        <div class="hero-sub">Controle total em um único painel.</div>

                        <div class="metric-row">
                            <div class="mini-metric">
                                <div class="mini-metric-val">8</div>
                                <div class="mini-metric-lbl">Agenda hoje</div>
                            </div>
                            <div class="mini-metric">
                                <div class="mini-metric-val">5</div>
                                <div class="mini-metric-lbl">Barbeiros</div>
                            </div>
                            <div class="mini-metric">
                                <div class="mini-metric-val">12</div>
                                <div class="mini-metric-lbl">Serviços</div>
                            </div>
                        </div>

                        <a href="{{ route('agendamentos.create') }}" class="btn-primary-gold"
                            style="width:100%;justify-content:center;text-decoration:none;display:flex">
                            <i class="fas fa-plus"></i> Novo agendamento
                        </a>
                    </div>

                    <!-- Quick actions -->
                    <div class="actions-panel">
                        <div class="panel-header">
                            <div class="panel-title"><i class="fas fa-bolt"></i> Ações rápidas</div>
                        </div>

                        <a href="{{ route('clientes.index') }}" class="action-item"
                            style="text-decoration: none; color: inherit; cursor: pointer;">
                            <div class="action-icon" style="background:var(--green-dim);color:var(--green)"><i
                                    class="fas fa-user-plus"></i></div>
                            <div class="action-text">
                                <div class="action-title">Clientes novos</div>
                                <div class="action-sub">4 cadastros hoje</div>
                            </div>
                            <span class="action-badge"
                                style="background:var(--green-dim);color:var(--green)">Hoje</span>
                        </a>

                        <a href="{{ route('servicos.index') }}" class="action-item"
                            style="text-decoration: none; color: inherit; cursor: pointer;">
                            <div class="action-icon" style="background:var(--blue-dim);color:var(--blue)"><i
                                    class="fas fa-scissors"></i></div>
                            <div class="action-text">
                                <div class="action-title">Serviços</div>
                                <div class="action-sub">2 adicionados esta semana</div>
                            </div>
                            <span class="action-badge"
                                style="background:var(--blue-dim);color:var(--blue)">Semana</span>
                        </a>

                        <a href="{{ route('agendamentos.index') }}" class="action-item"
                            style="text-decoration: none; color: inherit; cursor: pointer;">
                            <div class="action-icon" style="background:var(--gold-dim);color:var(--gold)"><i
                                    class="fas fa-exclamation-triangle"></i></div>
                            <div class="action-text">
                                <div class="action-title">Confirmação</div>
                                <div class="action-sub">1 agendamento pendente</div>
                            </div>
                            <span class="action-badge" style="background:var(--red-dim);color:var(--red)">Urgente</span>
                        </a>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('relatorio.agendamentos') }}" target="_blank"><i
                                    class="fas fa-file-pdf"></i> Rel. Agendamentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('relatorio.servicos') }}" target="_blank"><i
                                    class="fas fa-chart-bar"></i> Rel. Serviços</a>
                        </li>




                        <div class="action-item" onclick="document.getElementById('logout-form-quick').submit();"
                            style="cursor: pointer;">
                            <div class="action-icon" style="background:var(--bg-card);color:var(--text-muted)"><i
                                    class="fas fa-sign-out-alt"></i></div>
                            <div class="action-text">
                                <div class="action-title">Sair</div>
                                <div class="action-sub">Encerrar sessão</div>
                            </div>
                        </div>
                        <form id="logout-form-quick" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>

                    </div>

                </div>
            </div>

        </main>
    </div>

    <script>
        // ── DATE ──
        const d = new Date();
        document.getElementById('js-date').textContent = d.toLocaleDateString('pt-BR', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });

        // ── COUNT-UP ──
        function countUp(el, target, prefix = '', suffix = '') {
            let start = 0;
            const step = target / 60;
            const timer = setInterval(() => {
                start = Math.min(start + step, target);
                el.textContent = prefix + Math.round(start).toLocaleString('pt-BR') + suffix;
                if (start >= target) clearInterval(timer);
            }, 16);
        }

        document.querySelectorAll('[data-target]').forEach(el => {
            countUp(el, +el.dataset.target);
        });

        // receita R$
        countUp(document.getElementById('receita-val'), 4820, 'R$\u00A0');

        // ── BAR CHART ──
        const days = ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'];
        const vals = [55, 70, 40, 85, 95, 100, 30];
        const chart = document.getElementById('bar-chart');

        days.forEach((day, i) => {
            const col = document.createElement('div');
            col.className = 'bar-col';

            const fill = document.createElement('div');
            fill.className = 'bar-fill' + (i === 4 ? ' active' : '');
            fill.style.height = '0px';

            const label = document.createElement('div');
            label.className = 'bar-label';
            label.textContent = day;

            col.appendChild(fill);
            col.appendChild(label);
            chart.appendChild(col);

            setTimeout(() => {
                fill.style.height = vals[i] + 'px';
                fill.style.transition = 'height .7s cubic-bezier(.4,0,.2,1)';
            }, 200 + i * 60);
        });

        // ── PROGRESS BARS ──
        setTimeout(() => {
            document.querySelectorAll('.prog-fill[data-w]').forEach(el => {
                el.style.width = el.dataset.w + '%';
            });
        }, 400);

        // ── TAB PILLS ──
        document.querySelectorAll('.tab-pill').forEach(btn => {
            btn.addEventListener('click', () => {
                btn.closest('.tab-pills').querySelectorAll('.tab-pill').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });
    </script>

</body>

</html>