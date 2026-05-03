@extends('components.register-layout')

@section('header-nav')
    <a href="{{ route('register') }}">register</a>
@endsection

@section('page-title', 'Login')

@push('styles')
    <style>
        .auth-field {
            margin-bottom: 32px;
        }

        .auth-field label {
            display: block;
            font-family: var(--font-body);
            font-size: 15px;
            font-weight: 400;
            color: var(--color-text);
            margin-bottom: 10px;
            letter-spacing: 0.03em;
        }

        .auth-input {
            width: 100%;
            padding: 12px 16px;
            background-color: var(--color-input-bg);
            border: none;
            border-radius: 3px;
            font-family: var(--font-body);
            font-size: 13px;
            color: var(--color-text);
            outline: none;
            transition: background-color 0.2s;
        }

        .auth-input:focus {
            background-color: #e4ddd6;
        }

        .auth-input::placeholder {
            color: var(--color-text-muted);
            font-size: 12px;
        }

        .error-message {
            color: var(--color-required);
            font-size: 11px;
            margin-top: 6px;
        }

        .auth-submit {
            text-align: center;
            margin-top: 48px;
        }

        .btn-auth {
            display: inline-block;
            padding: 14px 60px;
            background-color: var(--color-primary-dark);
            color: #fff;
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 0.12em;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.25s;
        }

        .btn-auth:hover {
            background-color: var(--color-primary);
        }
    </style>
@endpush

@section('content')
    {{-- セッションエラー --}}
    @if (session('status'))
        <p style="color: var(--color-primary); font-size:13px; margin-bottom:20px;">{{ session('status') }}</p>
    @endif

    @if ($errors->any())
        <div style="margin-bottom:20px;">
            @foreach ($errors->all() as $error)
                <p class="error-message">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        {{-- メールアドレス --}}
        <div class="auth-field">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" class="auth-input" placeholder="例: test@example.com"
                value="{{ old('email') }}" autocomplete="email">
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        {{-- パスワード --}}
        <div class="auth-field">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" class="auth-input" placeholder="例: coachtech1106"
                autocomplete="current-password">
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-submit">
            <button type="submit" class="btn-auth">ログイン</button>
        </div>
    </form>
@endsection