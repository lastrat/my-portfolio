<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Gildas Rochinel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #050505;
            --bg-secondary: #0A0A0A;
            --bg-card: #111111;
            --border: rgba(255,255,255,.10);
            --text-primary: #F5F5F5;
            --text-secondary: #A1A1AA;
            --accent-green: #02C202;
            --accent-cyan: #028a1d;
            --accent-gradient: linear-gradient(135deg, var(--accent-green), var(--accent-cyan));
            --font-display: 'Space Grotesk', sans-serif;
            --font-body: 'Inter', sans-serif;
            --font-code: 'JetBrains Mono', monospace;
            --transition-smooth: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            --transition-fast: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: var(--bg-primary);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            background: var(--bg-secondary);
            border-right: 1px solid var(--border);
            padding: 32px 20px;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
            backdrop-filter: blur(20px);
        }

        .admin-logo {
            font-family: var(--font-display);
            font-size: 28px;
            font-weight: 700;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 6px;
            letter-spacing: -0.02em;
        }

        .admin-badge {
            display: inline-block;
            padding: 5px 12px;
            background: rgba(2, 194, 2, 0.08);
            border: 1px solid rgba(2, 194, 2, 0.25);
            border-radius: 20px;
            font-size: 11px;
            font-family: var(--font-code);
            color: var(--accent-green);
            text-transform: uppercase;
            letter-spacing: 0.12em;
            margin-bottom: 40px;
            font-weight: 500;
        }

        .admin-nav {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .admin-nav-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 13px 16px;
            border-radius: 12px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: var(--transition-fast);
            position: relative;
            overflow: hidden;
        }

        .admin-nav-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 0;
            background: var(--accent-green);
            border-radius: 0 4px 4px 0;
            transition: var(--transition-fast);
        }

        .admin-nav-item:hover {
            background: rgba(2, 194, 2, 0.06);
            color: var(--text-primary);
        }

        .admin-nav-item:hover::before {
            height: 60%;
        }

        .admin-nav-item.active {
            background: rgba(2, 194, 2, 0.1);
            color: var(--accent-green);
            border: 1px solid rgba(2, 194, 2, 0.2);
        }

        .admin-nav-item.active::before {
            height: 60%;
        }

        .admin-nav-icon {
            font-size: 18px;
            width: 24px;
            text-align: center;
            flex-shrink: 0;
        }

        .admin-nav-badge {
            margin-left: auto;
            background: var(--accent-green);
            color: var(--bg-primary);
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 600;
            font-family: var(--font-code);
        }

        .admin-user {
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .admin-user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .admin-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--accent-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 16px;
            color: var(--bg-primary);
            box-shadow: 0 4px 15px rgba(2, 194, 2, 0.3);
        }

        .admin-user-details {
            flex: 1;
            min-width: 0;
        }

        .admin-user-name {
            font-weight: 600;
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .admin-user-email {
            font-size: 12px;
            color: var(--text-secondary);
            font-family: var(--font-code);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .admin-logout-btn {
            width: 100%;
            padding: 10px 16px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            color: var(--text-secondary);
            border-radius: 10px;
            font-family: var(--font-body);
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-fast);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .admin-logout-btn:hover {
            border-color: rgba(255, 255, 255, 0.2);
            color: var(--text-primary);
            transform: translateY(-1px);
        }

        /* Main Content */
        .admin-main {
            flex: 1;
            margin-left: 260px;
            padding: 40px;
            min-height: 100vh;
            position: relative;
        }

        .admin-main::before {
            content: '';
            position: fixed;
            top: 0;
            right: 0;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(2, 194, 2, 0.08), transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .admin-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
        }

        .admin-page-title {
            font-family: var(--font-display);
            font-size: 36px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .admin-header-actions {
            display: flex;
            gap: 12px;
        }

        .admin-btn {
            padding: 10px 20px;
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text-primary);
            text-decoration: none;
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 500;
            transition: var(--transition-fast);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--bg-card);
        }

        .admin-btn:hover {
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .admin-btn-primary {
            background: var(--accent-gradient);
            color: var(--bg-primary);
            border: none;
            font-weight: 600;
        }

        .admin-btn-primary:hover {
            box-shadow: 0 10px 30px rgba(2, 194, 2, 0.3);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-secondary);
            font-family: var(--font-code);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-input {
            width: 100%;
            padding: 14px 18px;
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--text-primary);
            font-family: var(--font-body);
            font-size: 15px;
            transition: var(--transition-fast);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent-green);
            box-shadow: 0 0 0 3px rgba(2, 194, 2, 0.1);
        }

        .alert {
            padding: 14px 18px;
            background: rgba(2, 194, 2, 0.1);
            border: 1px solid rgba(2, 194, 2, 0.3);
            border-radius: 12px;
            color: var(--accent-green);
            font-size: 14px;
            margin-bottom: 24px;
        }

        /* Stats Grid */
        .admin-stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
            position: relative;
            z-index: 1;
        }

        .admin-stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 28px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            transition: var(--transition-smooth);
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            position: relative;
            overflow: hidden;
        }

        .admin-stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--accent-gradient);
            opacity: 0;
            transition: var(--transition-fast);
        }

        .admin-stat-card:hover::before {
            opacity: 1;
        }

        .admin-stat-card:hover {
            border-color: rgba(2, 194, 2, 0.3);
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
        }

        .admin-stat-card:nth-child(1) { animation-delay: 0.05s; }
        .admin-stat-card:nth-child(2) { animation-delay: 0.1s; }
        .admin-stat-card:nth-child(3) { animation-delay: 0.15s; }
        .admin-stat-card:nth-child(4) { animation-delay: 0.2s; }
        .admin-stat-card:nth-child(5) { animation-delay: 0.25s; }
        .admin-stat-card:nth-child(6) { animation-delay: 0.3s; }

        .admin-stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .admin-stat-icon {
            font-size: 32px;
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(2, 194, 2, 0.08);
            border-radius: 14px;
            border: 1px solid rgba(2, 194, 2, 0.15);
        }

        .admin-stat-trend {
            font-size: 12px;
            color: var(--text-secondary);
            font-family: var(--font-code);
            padding: 4px 10px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 8px;
        }

        .admin-stat-value {
            font-family: var(--font-display);
            font-size: 36px;
            font-weight: 700;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
        }

        .admin-stat-label {
            font-size: 13px;
            color: var(--text-secondary);
            font-family: var(--font-code);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 500;
        }

        /* Cards */
        .admin-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            position: relative;
            z-index: 1;
        }

        .admin-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 28px;
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            animation-delay: 0.35s;
            transition: var(--transition-fast);
        }

        .admin-card:hover {
            border-color: rgba(255, 255, 255, 0.15);
        }

        .admin-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .admin-card-title {
            font-family: var(--font-display);
            font-size: 22px;
            font-weight: 600;
            letter-spacing: -0.01em;
        }

        .admin-card-action {
            color: var(--accent-green);
            text-decoration: none;
            font-size: 14px;
            font-family: var(--font-code);
            font-weight: 500;
            transition: var(--transition-fast);
        }

        .admin-card-action:hover {
            color: var(--accent-cyan);
        }

        /* Tables */
        .admin-table-wrapper {
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid var(--border);
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .admin-table th,
        .admin-table td {
            padding: 16px 20px;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }

        .admin-table th {
            font-family: var(--font-code);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--text-secondary);
            font-weight: 600;
            background: rgba(255, 255, 255, 0.02);
        }

        .admin-table td {
            color: var(--text-primary);
        }

        .admin-table tbody tr {
            transition: var(--transition-fast);
        }

        .admin-table tbody tr:hover {
            background: rgba(2, 194, 2, 0.03);
        }

        .admin-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Badges */
        .admin-badge-success {
            display: inline-block;
            padding: 5px 12px;
            background: rgba(2, 194, 2, 0.1);
            border: 1px solid rgba(2, 194, 2, 0.3);
            border-radius: 20px;
            font-size: 11px;
            font-family: var(--font-code);
            color: var(--accent-green);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 500;
        }

        .admin-badge-warning {
            display: inline-block;
            padding: 5px 12px;
            background: rgba(255, 193, 7, 0.1);
            border: 1px solid rgba(255, 193, 7, 0.3);
            border-radius: 20px;
            font-size: 11px;
            font-family: var(--font-code);
            color: #ffc107;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 500;
        }

        /* Quick Actions */
        .admin-quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 14px;
        }

        .admin-quick-action {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 20px 24px;
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: 14px;
            color: var(--text-primary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: var(--transition-smooth);
        }

        .admin-quick-action:hover {
            border-color: var(--accent-green);
            transform: translateX(6px);
            box-shadow: 0 10px 30px rgba(2, 194, 2, 0.15);
            background: rgba(2, 194, 2, 0.05);
        }

        .admin-quick-action-icon {
            font-size: 22px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(2, 194, 2, 0.1);
            border-radius: 10px;
            flex-shrink: 0;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Action Links */
        .admin-action-link {
            color: var(--accent-green);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            margin-right: 14px;
            transition: var(--transition-fast);
        }

        .admin-action-link:hover {
            color: var(--accent-cyan);
            text-decoration: underline;
        }

        .admin-action-link:last-child {
            margin-right: 0;
        }

        /* Buttons */
        .btn-primary {
            background: var(--accent-gradient);
            color: var(--bg-primary);
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-family: var(--font-display);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-fast);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(2, 194, 2, 0.3);
        }

        /* Responsive */
        @media (max-width: 968px) {
            .admin-sidebar {
                width: 100%;
                position: relative;
                padding: 20px;
            }

            .admin-main {
                margin-left: 0;
                padding: 24px;
            }

            .admin-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .admin-stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <aside class="admin-sidebar">
        <div class="admin-logo">GS</div>
        <div class="admin-badge">Admin Panel</div>

        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="admin-nav-icon">📊</span>
                Dashboard
            </a>
            <a href="{{ route('admin.projects') }}" class="admin-nav-item {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                <span class="admin-nav-icon">💼</span>
                Projects
            </a>
            <a href="{{ route('admin.experiences') }}" class="admin-nav-item {{ request()->routeIs('admin.experiences*') ? 'active' : '' }}">
                <span class="admin-nav-icon">💼</span>
                Experience
            </a>
            <a href="{{ route('admin.education') }}" class="admin-nav-item {{ request()->routeIs('admin.education*') ? 'active' : '' }}">
                <span class="admin-nav-icon">🎓</span>
                Education
            </a>
            <a href="{{ route('admin.tech') }}" class="admin-nav-item {{ request()->routeIs('admin.tech*') ? 'active' : '' }}">
                <span class="admin-nav-icon">⚡</span>
                Tech Stack
            </a>
            <a href="{{ route('admin.contacts') }}" class="admin-nav-item {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                <span class="admin-nav-icon">✉️</span>
                Contacts
                @php
                    $unread = \App\Models\Contact::where('is_read', false)->count();
                @endphp
                @if($unread > 0)
                    <span class="admin-nav-badge">{{ $unread }}</span>
                @endif
            </a>
        </nav>

        <div class="admin-user">
            <div class="admin-user-info">
                <div class="admin-avatar">GR</div>
                <div class="admin-user-details">
                    <div class="admin-user-name">{{ Auth::user()->name }}</div>
                    <div class="admin-user-email">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="admin-logout-btn">
                    <span>🚪</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="admin-main">
        <div class="admin-header">
            <h1 class="admin-page-title">@yield('title', 'Dashboard')</h1>
            <div class="admin-header-actions">
                <a href="{{ route('portfolio') }}" target="_blank" class="admin-btn">
                    View Portfolio →
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
