@extends('components.register-layout')

@section('header-nav')
    <a href="{{ route('login') }}">login</a>
@endsection

@section('page-title', 'Register')

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
    @if ($errors->any())
        <div style="margin-bottom:20px;">
            @foreach ($errors->all() as $error)
                <p class="error-message">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        {{-- お名前 --}}
        <div class="auth-field">
            <label for="name">お名前</label>
            <input type="text" id="name" name="name" class="auth-input" placeholder="例: 山田 太郎" value="{{ old('name') }}"
                autocomplete="name">
            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

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
                autocomplete="new-password">
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        {{-- Fortify は password_confirmation を要求する --}}
        <input type="hidden" name="password_confirmation" id="password_confirmation">

        <div class="auth-submit">
            <button type="submit" class="btn-auth">登録</button>
        </div>
    </form>

    {{-- password_confirmationを自動的にpasswordと同期させる --}}
    <script>
        document.querySelector('form').addEventListener('submit', function () {
            const pw = document.getElementById('password').value;
            document.getElementById('password_confirmation').value = pw;
        });
    </script>
@endsection