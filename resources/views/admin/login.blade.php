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
            --bg-primary: #0a0a0a;
            --bg-secondary: #111111;
            --bg-card: #161616;
            --border: #262626;
            --text-primary: #f0f0f0;
            --text-secondary: #a0a0a0;
            --accent-green: #02c202;
            --accent-gradient: linear-gradient(135deg, #02c202 0%, #00c6ff 100%);
            --transition-fast: all 0.2s ease;
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
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 48px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 0.6s ease;
        }

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

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-logo {
            font-family: var(--font-display);
            font-size: 32px;
            font-weight: 700;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: var(--text-secondary);
            font-size: 14px;
            font-family: var(--font-code);
        }

        .form-group {
            margin-bottom: 24px;
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

        .btn {
            width: 100%;
            padding: 14px 24px;
            border: none;
            border-radius: 12px;
            font-family: var(--font-display);
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-fast);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--accent-gradient);
            color: var(--bg-primary);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(2, 194, 2, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .login-footer {
            text-align: center;
            margin-top: 24px;
            color: var(--text-secondary);
            font-size: 13px;
        }

        .login-footer a {
            color: var(--accent-green);
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 14px 18px;
            background: rgba(255, 0, 0, 0.1);
            border: 1px solid rgba(255, 0, 0, 0.3);
            border-radius: 12px;
            color: #ff6b6b;
            font-size: 14px;
            margin-bottom: 24px;
        }

        .login-decoration {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 200px;
            background: radial-gradient(circle at 50% 0%, rgba(2, 194, 2, 0.15), transparent 70%);
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="login-decoration"></div>
    
    <div class="login-container">
        <div class="login-header">
            <div class="login-logo">GS</div>
            <div class="login-subtitle">Admin Dashboard</div>
        </div>

        @if($errors->any())
            <div class="alert">
                {{ $errors->first() }}
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
</body>
</html>
