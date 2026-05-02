@extends('components.form-layout')

@push('styles')
    <style>
        .thanks-wrapper {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 60vh;
            text-align: center;
            overflow: hidden;
        }

        /* Large decorative "Thank you" text in background */
        .thanks-bg-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: var(--font-display);
            font-weight: 400;
            font-size: clamp(80px, 14vw, 200px);
            color: rgba(176, 158, 142, 0.12);
            white-space: nowrap;
            pointer-events: none;
            user-select: none;
            letter-spacing: -0.01em;
            line-height: 1;
            width: 200%;
            text-align: center;
        }

        /* Foreground content */
        .thanks-content {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 32px;
        }

        .thanks-message {
            font-family: var(--font-body);
            font-size: 16px;
            font-weight: 400;
            color: var(--color-primary);
            letter-spacing: 0.05em;
        }

        .btn-home {
            display: inline-block;
            padding: 13px 48px;
            background-color: var(--color-primary-dark);
            color: white;
            font-family: var(--font-body);
            font-size: 13px;
            font-weight: 400;
            letter-spacing: 0.15em;
            text-decoration: none;
            transition: background-color 0.25s ease;
            border-radius: 2px;
        }

        .btn-home:hover {
            background-color: var(--color-primary);
        }
    </style>
@endpush

@section('content')
    <div class="thanks-wrapper">
        <div class="thanks-bg-text">Thank you</div>

        <div class="thanks-content">
            <p class="thanks-message">お問い合わせありがとうございました</p>
            <a href="{{ route('home') }}" class="btn-home">HOME</a>
        </div>
    </div>
@endsection