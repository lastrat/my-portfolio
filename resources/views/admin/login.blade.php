<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Gildas Rochinel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #050505;
            --bg-secondary: #0A0A0A;
            --bg-card: #111111;
            --border: rgba(255, 255, 255, 0.10);
            --text-primary: #F5F5F5;
            --text-secondary: #A1A1AA;
            --accent-green: #02C202;
            --accent-cyan: #028a1d;
            --accent-gradient: linear-gradient(135deg, var(--accent-green), var(--accent-cyan));
            --transition-fast: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            --transition-smooth: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            --font-display: 'Space Grotesk', sans-serif;
            --font-body: 'Inter', sans-serif;
            --font-code: 'JetBrains Mono', monospace;
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
            align-items: center;
            justify-content: center;
            padding: 24px;
            overflow: hidden;
            position: relative;
        }

        /* ===== BACKGROUND STAGE ===== */
        .bg-stage {
            position: fixed;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
        }

        /* Layered ambient light */
        .bg-ambient {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 50% -10%, rgba(2, 194, 2, 0.16), transparent 60%),
                radial-gradient(ellipse 60% 50% at 10% 100%, rgba(2, 138, 29, 0.14), transparent 65%),
                radial-gradient(ellipse 50% 40% at 95% 80%, rgba(2, 194, 2, 0.10), transparent 60%),
                linear-gradient(180deg, #070807 0%, var(--bg-primary) 45%, #060806 100%);
        }

        /* Technical grid, faded towards the edges */
        .bg-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.025) 1px, transparent 1px);
            background-size: 56px 56px;
            mask-image: radial-gradient(ellipse 75% 75% at 50% 50%, black 15%, transparent 75%);
            -webkit-mask-image: radial-gradient(ellipse 75% 75% at 50% 50%, black 15%, transparent 75%);
            animation: gridDrift 40s linear infinite;
        }

        @keyframes gridDrift {
            from { background-position: 0 0, 0 0; }
            to { background-position: 56px 56px, 56px 56px; }
        }

        /* Floating light blobs */
        .bg-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(110px);
            opacity: 0.28;
            will-change: transform;
        }

        .bg-orb--1 {
            width: 480px;
            height: 480px;
            background: var(--accent-green);
            top: -140px;
            right: -120px;
            animation: orbDriftA 22s ease-in-out infinite;
        }

        .bg-orb--2 {
            width: 420px;
            height: 420px;
            background: var(--accent-cyan);
            bottom: -160px;
            left: -110px;
            opacity: 0.22;
            animation: orbDriftB 28s ease-in-out infinite;
        }

        .bg-orb--3 {
            width: 260px;
            height: 260px;
            background: #05ef05;
            top: 55%;
            left: 62%;
            opacity: 0.10;
            filter: blur(90px);
            animation: orbDriftA 18s ease-in-out infinite reverse;
        }

        @keyframes orbDriftA {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(70px, 60px) scale(1.12); }
        }

        @keyframes orbDriftB {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-60px, -50px) scale(1.08); }
        }

        /* Fine horizontal scanlines for a technical feel */
        .bg-scanlines {
            position: absolute;
            inset: 0;
            background: repeating-linear-gradient(
                to bottom,
                rgba(255, 255, 255, 0.018) 0px,
                rgba(255, 255, 255, 0.018) 1px,
                transparent 1px,
                transparent 4px
            );
        }

        /* Edge vignette to focus the centre */
        .bg-vignette {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 100% 90% at 50% 50%, transparent 45%, rgba(0, 0, 0, 0.55) 100%);
        }

        /* Film grain */
        .bg-noise {
            position: absolute;
            inset: 0;
            opacity: 0.035;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
        }

        /* ===== LOGIN CARD ===== */
        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 430px;
            background: rgba(17, 17, 17, 0.72);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 48px 40px;
            box-shadow:
                0 24px 70px rgba(0, 0, 0, 0.55),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            animation: cardIn 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Accent hairline on top + cursor spotlight */
        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 24px;
            right: 24px;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--accent-green), transparent);
            opacity: 0.8;
        }

        .login-spotlight {
            position: absolute;
            inset: 0;
            border-radius: inherit;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.4s ease;
            background: radial-gradient(
                240px circle at var(--mx, 50%) var(--my, 0%),
                rgba(2, 194, 2, 0.10),
                transparent 70%
            );
        }

        .login-container:hover .login-spotlight {
            opacity: 1;
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(28px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* ===== HEADER ===== */
        .login-header {
            text-align: center;
            margin-bottom: 36px;
        }

        .login-logo {
            width: 64px;
            height: 64px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.02em;
            color: var(--bg-primary);
            background: var(--accent-gradient);
            border-radius: 18px;
            box-shadow: 0 12px 32px rgba(2, 194, 2, 0.28);
            transition: var(--transition-smooth);
        }

        .login-container:hover .login-logo {
            transform: translateY(-2px);
            box-shadow: 0 16px 40px rgba(2, 194, 2, 0.38);
        }

        .login-subtitle {
            color: var(--text-secondary);
            font-size: 13px;
            font-family: var(--font-code);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        /* ===== FORM ===== */
        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 500;
            color: var(--text-secondary);
            font-family: var(--font-code);
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .form-input {
            width: 100%;
            padding: 14px 18px;
            background: rgba(0, 0, 0, 0.35);
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--text-primary);
            font-family: var(--font-body);
            font-size: 15px;
            transition: var(--transition-fast);
        }

        .form-input::placeholder {
            color: rgba(161, 161, 170, 0.65);
        }

        .form-input:hover {
            border-color: rgba(255, 255, 255, 0.18);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent-green);
            background: rgba(0, 0, 0, 0.5);
            box-shadow: 0 0 0 3px rgba(2, 194, 2, 0.15);
        }

        .btn {
            width: 100%;
            padding: 15px 24px;
            margin-top: 6px;
            border: none;
            border-radius: 12px;
            font-family: var(--font-display);
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-smooth);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--accent-gradient);
            color: var(--bg-primary);
            position: relative;
            overflow: hidden;
        }

        /* Sheen sweep on hover */
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transition: left 0.6s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(2, 194, 2, 0.32);
        }

        .btn-primary:hover::after {
            left: 100%;
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* ===== ALERT ===== */
        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 16px;
            background: rgba(255, 0, 0, 0.08);
            border: 1px solid rgba(255, 80, 80, 0.28);
            border-radius: 12px;
            color: #ff8080;
            font-size: 14px;
            margin-bottom: 24px;
            animation: shakeIn 0.45s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .alert-icon {
            flex: none;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255, 80, 80, 0.16);
            font-size: 13px;
            font-weight: 700;
        }

        @keyframes shakeIn {
            0% { opacity: 0; transform: translateX(-8px); }
            60% { transform: translateX(3px); }
            100% { opacity: 1; transform: translateX(0); }
        }

        /* ===== FOOTER ===== */
        .login-footer {
            text-align: center;
            margin-top: 26px;
            padding-top: 22px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            color: var(--text-secondary);
            font-size: 13px;
        }

        .login-footer a {
            color: var(--accent-green);
            text-decoration: none;
            font-family: var(--font-code);
            font-size: 13px;
            transition: var(--transition-fast);
        }

        .login-footer a:hover {
            text-decoration: underline;
            opacity: 0.85;
        }

        @media (max-width: 480px) {
            body { padding: 16px; }

            .login-container {
                padding: 36px 26px;
                border-radius: 20px;
            }

            .bg-orbs,
            .bg-scanlines {
                display: none;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .bg-grid,
            .bg-orb {
                animation: none;
            }

            .login-container,
            .alert {
                animation: none;
            }
        }
    </style>
</head>
<body>
    <div class="bg-stage">
        <div class="bg-ambient"></div>
        <div class="bg-grid"></div>
        <div class="bg-orbs">
            <div class="bg-orb bg-orb--1"></div>
            <div class="bg-orb bg-orb--2"></div>
            <div class="bg-orb bg-orb--3"></div>
        </div>
        <div class="bg-scanlines"></div>
        <div class="bg-vignette"></div>
        <div class="bg-noise"></div>
    </div>

    <div class="login-container">
        <div class="login-spotlight"></div>

        <div class="login-header">
            <div class="login-logo">GS</div>
            <div class="login-subtitle">Admin Dashboard</div>
        </div>

        @if($errors->any())
            <div class="alert">
                <span class="alert-icon">!</span>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-input"
                    placeholder="admin@example.com"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-input"
                    placeholder="••••••••"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary">
                Sign In →
            </button>
        </form>

        <div class="login-footer">
            <a href="{{ route('portfolio') }}">← Back to Portfolio</a>
        </div>
    </div>

    <script>
        (function () {
            var card = document.querySelector('.login-container');
            if (!card || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

            card.addEventListener('mousemove', function (e) {
                var rect = card.getBoundingClientRect();
                card.style.setProperty('--mx', ((e.clientX - rect.left) / rect.width * 100) + '%');
                card.style.setProperty('--my', ((e.clientY - rect.top) / rect.height * 100) + '%');
            });
        })();
    </script>
</body>
</html>
