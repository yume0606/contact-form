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
            --color-bg: #faf9f7;
            --color-border: #e0d8d0;
            --color-text: #3a3330;
            --color-text-muted: #9e8e82;
            --color-required: #c0796a;
            --color-input-bg: #f4f1ed;
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

        header {
            border-bottom: 1px solid var(--color-border);
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            font-family: var(--font-display);
            font-weight: 400;
            font-size: 28px;
            color: var(--color-primary);
            letter-spacing: 0.05em;
        }

        main {
            max-width: 960px;
            margin: 0 auto;
            padding: 60px 40px;
        }
    </style>
    @stack('styles')
</head>

<body>
    <header>
        <h1>FashionablyLate</h1>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>