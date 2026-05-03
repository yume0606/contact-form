<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FashionablyLate</title>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --color-primary: #7a6355;
            --color-primary-light: #b09e8e;
            --color-primary-dark: #4d3e35;
            --color-bg: #e8e0d8;
            --color-card: #ffffff;
            --color-border: #d4cac0;
            --color-text: #3a3330;
            --color-text-muted: #9e8e82;
            --color-required: #c0796a;
            --color-input-bg: #ede8e2;
            --font-display: 'Cormorant Garamond', serif;
            --font-body: 'Noto Serif JP', serif;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--color-bg);
            color: var(--color-text);
            min-height: 100vh;
            font-size: 14px;
            font-weight: 300;
        }

        /* ── Header ── */
        header {
            background-color: #fff;
            border-bottom: 1px solid var(--color-border);
            padding: 16px 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        header h1 {
            font-family: var(--font-display);
            font-weight: 400;
            font-size: 26px;
            color: var(--color-primary);
            letter-spacing: 0.05em;
        }

        .header-nav {
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
        }

        .header-nav a {
            display: inline-block;
            padding: 6px 18px;
            border: 1px solid var(--color-border);
            color: var(--color-text-muted);
            font-family: var(--font-display);
            font-size: 13px;
            letter-spacing: 0.08em;
            text-decoration: none;
            transition: border-color 0.2s, color 0.2s;
        }

        .header-nav a:hover {
            border-color: var(--color-primary-light);
            color: var(--color-primary);
        }

        /* ── Main ── */
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 60px 20px 80px;
        }

        .page-title {
            font-family: var(--font-display);
            font-weight: 400;
            font-size: 32px;
            color: var(--color-primary);
            letter-spacing: 0.08em;
            margin-bottom: 36px;
        }

        /* ── Card ── */
        .auth-card {
            background-color: var(--color-card);
            border-radius: 8px;
            width: 100%;
            max-width: 660px;
            padding: 56px 64px 60px;
        }
    </style>
    @stack('styles')
</head>

<body>
    <header>
        <h1>FashionablyLate</h1>
        <nav class="header-nav">
            @yield('header-nav')
        </nav>
    </header>

    <main>
        <h2 class="page-title">@yield('page-title')</h2>
        <div class="auth-card">
            @yield('content')
        </div>
    </main>
</body>

</html>