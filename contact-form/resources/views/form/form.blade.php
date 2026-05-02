@extends('components.form-layout')

@push('styles')
    <style>
        .page-title {
            font-family: var(--font-display);
            font-weight: 400;
            font-size: 32px;
            color: var(--color-primary);
            text-align: center;
            letter-spacing: 0.08em;
            margin-bottom: 50px;
        }

        .contact-form {
            max-width: 860px;
            margin: 0 auto;
        }

        .form-row {
            display: flex;
            align-items: flex-start;
            margin-bottom: 28px;
            gap: 24px;
        }

        .form-label {
            width: 200px;
            min-width: 200px;
            padding-top: 10px;
            font-size: 14px;
            font-weight: 400;
            color: var(--color-text);
            font-family: var(--font-body);
        }

        .required-mark {
            color: var(--color-required);
            margin-left: 4px;
            font-size: 13px;
        }

        .form-control-wrap {
            flex: 1;
        }

        .form-input {
            width: 100%;
            padding: 10px 14px;
            background-color: var(--color-input-bg);
            border: none;
            border-radius: 2px;
            font-family: var(--font-body);
            font-size: 13px;
            color: var(--color-text);
            outline: none;
            transition: background-color 0.2s ease;
        }

        .form-input:focus {
            background-color: #ece7e0;
        }

        .form-input::placeholder {
            color: var(--color-text-muted);
            font-size: 12px;
        }

        /* Name fields */
        .name-fields {
            display: flex;
            gap: 12px;
            flex: 1;
        }

        .name-fields .form-input {
            flex: 1;
        }

        /* Gender radio */
        .radio-group {
            display: flex;
            gap: 32px;
            padding-top: 10px;
        }

        .radio-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 14px;
            color: var(--color-text);
        }

        .radio-label input[type="radio"] {
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid var(--color-primary-light);
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            transition: border-color 0.2s;
        }

        .radio-label input[type="radio"]:checked {
            border-color: var(--color-primary);
            background-color: var(--color-primary);
        }

        .radio-label input[type="radio"]:checked::after {
            content: '';
            display: block;
            width: 6px;
            height: 6px;
            background: white;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Phone fields */
        .phone-fields {
            display: flex;
            align-items: center;
            gap: 8px;
            flex: 1;
        }

        .phone-fields .form-input {
            text-align: center;
        }

        .phone-sep {
            color: var(--color-text-muted);
            font-size: 16px;
        }

        /* Select */
        .form-select-wrap {
            position: relative;
            flex: 0 0 auto;
            width: 240px;
        }

        .form-select {
            width: 100%;
            padding: 10px 40px 10px 14px;
            background-color: var(--color-input-bg);
            border: none;
            border-radius: 2px;
            font-family: var(--font-body);
            font-size: 13px;
            color: var(--color-text);
            appearance: none;
            cursor: pointer;
            outline: none;
        }

        .select-arrow {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: var(--color-primary);
            font-size: 10px;
        }

        /* Textarea */
        .form-textarea {
            width: 100%;
            padding: 12px 14px;
            background-color: var(--color-input-bg);
            border: none;
            border-radius: 2px;
            font-family: var(--font-body);
            font-size: 13px;
            color: var(--color-text);
            resize: vertical;
            min-height: 120px;
            outline: none;
            transition: background-color 0.2s ease;
        }

        .form-textarea:focus {
            background-color: #ece7e0;
        }

        .form-textarea::placeholder {
            color: var(--color-text-muted);
            font-size: 12px;
        }

        /* Error messages */
        .error-message {
            color: var(--color-required);
            font-size: 11px;
            margin-top: 5px;
        }

        /* Submit button area */
        .form-submit {
            text-align: center;
            margin-top: 50px;
        }

        .btn-primary {
            display: inline-block;
            padding: 14px 56px;
            background-color: var(--color-primary-dark);
            color: white;
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 0.1em;
            border: none;
            cursor: pointer;
            transition: background-color 0.25s ease;
            text-decoration: none;
            border-radius: 2px;
        }

        .btn-primary:hover {
            background-color: var(--color-primary);
        }
    </style>
@endpush

@section('content')
    <h2 class="page-title">Contact</h2>

    <div class="contact-form">
        @if ($errors->any())
            <div style="margin-bottom:24px; color: var(--color-required); font-size:13px;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('/confirm') }}" method="POST">
            @csrf

            {{-- お名前 --}}
            <div class="form-row">
                <label class="form-label">お名前 <span class="required-mark">※</span></label>
                <div class="name-fields">
                    <input type="text" name="last_name" class="form-input" placeholder="例: 山田"
                        value="{{ old('first_name') }}">
                    <input type="text" name="first_name" class="form-input" placeholder="例: 太郎"
                        value="{{ old('last_name') }}">
                </div>
            </div>

            {{-- 性別 --}}
            <div class="form-row">
                <label class="form-label">性別 <span class="required-mark">※</span></label>
                <div class="form-control-wrap">
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="gender" value="男性" {{ old('gender', '男性') === '男性' ? 'checked' : '' }}>
                            男性
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="gender" value="女性" {{ old('gender') === '女性' ? 'checked' : '' }}>
                            女性
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="gender" value="その他" {{ old('gender') === 'その他' ? 'checked' : '' }}>
                            その他
                        </label>
                    </div>
                    @error('gender')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- メールアドレス --}}
            <div class="form-row">
                <label class="form-label">メールアドレス <span class="required-mark">※</span></label>
                <div class="form-control-wrap">
                    <input type="email" name="email" class="form-input" placeholder="例: test@example.com"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- 電話番号 --}}
            <div class="form-row">
                <label class="form-label">電話番号 <span class="required-mark">※</span></label>
                <div class="form-control-wrap">
                    <div class="phone-fields">
                        <input type="text" name="phone1" class="form-input" placeholder="080" maxlength="4"
                            style="width:100px;" value="{{ old('phone1') }}">
                        <span class="phone-sep">-</span>
                        <input type="text" name="phone2" class="form-input" placeholder="1234" maxlength="4"
                            style="width:120px;" value="{{ old('phone2') }}">
                        <span class="phone-sep">-</span>
                        <input type="text" name="phone3" class="form-input" placeholder="5678" maxlength="4"
                            style="width:120px;" value="{{ old('phone3') }}">
                    </div>
                    @error('phone1')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- 住所 --}}
            <div class="form-row">
                <label class="form-label">住所 <span class="required-mark">※</span></label>
                <div class="form-control-wrap">
                    <input type="text" name="address" class="form-input" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3"
                        value="{{ old('address') }}">
                    @error('address')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- 建物名 --}}
            <div class="form-row">
                <label class="form-label">建物名</label>
                <div class="form-control-wrap">
                    <input type="text" name="building" class="form-input" placeholder="例: 千駄ヶ谷マンション101"
                        value="{{ old('building') }}">
                </div>
            </div>

            {{-- お問い合わせの種類 --}}
            <div class="form-row">
                <label class="form-label">お問い合わせの種類 <span class="required-mark">※</span></label>
                <div class="form-control-wrap">
                    <div class="form-select-wrap">
                        <select name="detail" class="form-select">
                            <option value="" disabled {{ old('detail') ? '' : 'selected' }}>選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->content }}</option>
                            @endforeach
                        </select>
                        <span class="select-arrow">▼</span>
                    </div>
                    @error('detail')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- お問い合わせ内容 --}}
            <div class="form-row">
                <label class="form-label">お問い合わせ内容 <span class="required-mark">※</span></label>
                <div class="form-control-wrap">
                    <textarea name="message" class="form-textarea"
                        placeholder="お問い合わせ内容をご記載ください">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-submit">
                <button type="submit" class="btn-primary">確認画面</button>
            </div>
        </form>
    </div>
@endsection