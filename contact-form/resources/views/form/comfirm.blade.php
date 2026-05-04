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

        .confirm-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            max-width: 860px;
        }

        .confirm-table tr {
            border-bottom: 1px solid var(--color-border);
        }

        .confirm-table tr:first-child {
            border-top: 1px solid var(--color-border);
        }

        .confirm-table th {
            width: 220px;
            padding: 20px 24px;
            background-color: var(--color-primary-light);
            color: white;
            font-family: var(--font-body);
            font-weight: 400;
            font-size: 13px;
            letter-spacing: 0.05em;
            text-align: center;
            vertical-align: middle;
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }

        .confirm-table td {
            padding: 20px 28px;
            font-size: 14px;
            color: var(--color-text);
            font-family: var(--font-body);
            font-weight: 300;
            line-height: 1.7;
            vertical-align: middle;
            background-color: white;
        }

        /* Action buttons */
        .confirm-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            margin-top: 50px;
        }

        .btn-submit {
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
            border-radius: 2px;
        }

        .btn-submit:hover {
            background-color: var(--color-primary);
        }

        .btn-back {
            font-family: var(--font-body);
            font-size: 14px;
            color: var(--color-text);
            text-decoration: underline;
            cursor: pointer;
            background: none;
            border: none;
            letter-spacing: 0.05em;
            transition: color 0.2s;
        }

        .btn-back:hover {
            color: var(--color-primary);
        }
    </style>
@endpush

@section('content')
    <h2 class="page-title">Confirm</h2>

    <table class="confirm-table">
        <tr>
            <th>お名前</th>
            <td>{{ $data['last_name'] }} {{ $data['first_name'] }}</td>
        </tr>
        <tr>
            <th>性別</th>
            <td>{{ $data['gender'] }}</td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $data['email'] }}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $data['phone1'] }}{{ $data['phone2'] }}{{ $data['phone3'] }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $data['address'] }}</td>
        </tr>
        <tr>
            <th>建物名</th>
            <td>{{ $data['building'] ?? '—' }}</td>
        </tr>
        <tr>
            <th>お問い合わせの種類</th>
            <td>{{ $categories->find($contact['category_id'])->content }}</td>
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td>{!! nl2br(e($data['message'])) !!}</td>
        </tr>
    </table>

    <div class="confirm-actions">
        <form action="{{ route('contact.send') }}" method="POST" style="display:inline;">
            @csrf
            @foreach ($data as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <button type="submit" class="btn-submit">送信</button>
        </form>

        <form action="{{ route('contact.back') }}" method="POST" style="display:inline;">
            @csrf
            @foreach ($data as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <button type="submit" class="btn-back">修正</button>
        </form>
    </div>
@endsection