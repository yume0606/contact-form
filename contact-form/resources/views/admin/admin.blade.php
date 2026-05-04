@extends('components.admin')

@push('styles')
    <style>
        /* ── Page title ── */
        .page-title {
            font-family: var(--font-display);
            font-weight: 400;
            font-size: 34px;
            color: var(--color-primary);
            text-align: center;
            letter-spacing: 0.08em;
            margin-bottom: 36px;
        }

        /* ══════════════════════════════
               Search bar
            ══════════════════════════════ */
        .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search-text {
            flex: 1;
            min-width: 220px;
            padding: 10px 16px;
            border: 1px solid var(--color-border);
            background: #fff;
            border-radius: 3px;
            font-family: var(--font-body);
            font-size: 13px;
            color: var(--color-text);
            outline: none;
        }

        .search-text::placeholder {
            color: var(--color-text-muted);
        }

        .search-text:focus {
            border-color: var(--color-primary-light);
        }

        /* Select with arrow */
        .select-wrap {
            position: relative;
        }

        .search-select {
            padding: 10px 36px 10px 14px;
            border: 1px solid var(--color-border);
            background: #fff;
            border-radius: 3px;
            font-family: var(--font-body);
            font-size: 13px;
            color: var(--color-text-muted);
            appearance: none;
            cursor: pointer;
            outline: none;
            min-width: 130px;
        }

        .search-select:focus {
            border-color: var(--color-primary-light);
        }

        .select-arrow {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: var(--color-primary-light);
            font-size: 10px;
        }

        /* Date picker */
        .date-wrap {
            position: relative;
        }

        .search-date {
            padding: 10px 36px 10px 14px;
            border: 1px solid var(--color-border);
            background: #fff;
            border-radius: 3px;
            font-family: var(--font-body);
            font-size: 13px;
            color: var(--color-text-muted);
            cursor: pointer;
            outline: none;
            min-width: 130px;
        }

        .search-date:focus {
            border-color: var(--color-primary-light);
        }

        .date-arrow {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: var(--color-primary-light);
            font-size: 10px;
        }

        /* Buttons */
        .btn-search {
            padding: 10px 28px;
            background-color: var(--color-primary-dark);
            color: #fff;
            border: none;
            border-radius: 3px;
            font-family: var(--font-body);
            font-size: 13px;
            letter-spacing: 0.06em;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-search:hover {
            background-color: var(--color-primary);
        }

        .btn-reset {
            padding: 10px 28px;
            background-color: var(--color-primary-light);
            color: #fff;
            border: none;
            border-radius: 3px;
            font-family: var(--font-body);
            font-size: 13px;
            letter-spacing: 0.06em;
            cursor: pointer;
            transition: background-color 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-reset:hover {
            background-color: var(--color-primary);
        }

        /* ══════════════════════════════
               Toolbar (export + pagination)
            ══════════════════════════════ */
        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .btn-export {
            padding: 8px 20px;
            border: 1px solid var(--color-border);
            background: #fff;
            color: var(--color-text-muted);
            font-family: var(--font-body);
            font-size: 13px;
            border-radius: 3px;
            cursor: pointer;
            transition: border-color 0.2s, color 0.2s;
            text-decoration: none;
        }

        .btn-export:hover {
            border-color: var(--color-primary-light);
            color: var(--color-primary);
        }

        /* Pagination */
        .pagination {
            display: flex;
            align-items: center;
            gap: 2px;
        }

        .page-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border: 1px solid var(--color-border);
            background: #fff;
            color: var(--color-text-muted);
            font-size: 13px;
            font-family: var(--font-body);
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;
            border-radius: 2px;
        }

        .page-btn:hover,
        .page-btn.active {
            background-color: var(--color-primary-dark);
            color: #fff;
            border-color: var(--color-primary-dark);
        }

        .page-btn.disabled {
            pointer-events: none;
            opacity: 0.4;
        }

        /* ══════════════════════════════
               Table
            ══════════════════════════════ */
        .contact-table {
            width: 100%;
            border-collapse: collapse;
        }

        .contact-table thead tr {
            background-color: var(--color-primary);
        }

        .contact-table thead th {
            padding: 16px 20px;
            color: #fff;
            font-family: var(--font-body);
            font-weight: 400;
            font-size: 14px;
            text-align: left;
            letter-spacing: 0.04em;
        }

        .contact-table tbody tr {
            border-bottom: 1px solid var(--color-border);
            transition: background-color 0.15s;
        }

        .contact-table tbody tr:hover {
            background-color: #f7f3ef;
        }

        .contact-table tbody td {
            padding: 18px 20px;
            font-size: 14px;
            font-family: var(--font-body);
            font-weight: 300;
            color: var(--color-text);
            vertical-align: middle;
        }

        .btn-detail {
            padding: 6px 16px;
            border: 1px solid var(--color-border);
            background: #fff;
            color: var(--color-text-muted);
            font-family: var(--font-body);
            font-size: 12px;
            border-radius: 2px;
            cursor: pointer;
            transition: border-color 0.2s, color 0.2s;
        }

        .btn-detail:hover {
            border-color: var(--color-primary-light);
            color: var(--color-primary);
        }

        /* ══════════════════════════════
               Modal overlay
            ══════════════════════════════ */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal {
            background: #fff;
            border-radius: 6px;
            width: 680px;
            max-width: 90vw;
            max-height: 90vh;
            overflow-y: auto;
            padding: 52px 60px 48px;
            position: relative;
            animation: modalIn 0.2s ease;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: translateY(-12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-close {
            position: absolute;
            top: 16px;
            right: 20px;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 1px solid var(--color-border);
            background: #fff;
            font-size: 16px;
            color: var(--color-text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: border-color 0.2s, color 0.2s;
            line-height: 1;
        }

        .modal-close:hover {
            border-color: var(--color-primary-light);
            color: var(--color-primary);
        }

        /* Modal detail rows */
        .detail-row {
            display: flex;
            gap: 32px;
            padding: 16px 0;
            border-bottom: 1px solid var(--color-border);
        }

        .detail-row:first-child {
            border-top: 1px solid var(--color-border);
        }

        .detail-label {
            width: 140px;
            min-width: 140px;
            font-size: 14px;
            font-weight: 500;
            color: var(--color-text);
            font-family: var(--font-body);
        }

        .detail-value {
            flex: 1;
            font-size: 14px;
            font-weight: 300;
            color: var(--color-text);
            font-family: var(--font-body);
            line-height: 1.7;
        }

        /* Delete button in modal */
        .modal-actions {
            text-align: center;
            margin-top: 36px;
        }

        .btn-delete {
            padding: 12px 52px;
            background-color: #b04e38;
            color: #fff;
            border: none;
            border-radius: 3px;
            font-family: var(--font-body);
            font-size: 14px;
            letter-spacing: 0.08em;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-delete:hover {
            background-color: #8f3c28;
        }
    </style>
@endpush

@section('content')
    <h2 class="page-title">Admin</h2>

    {{-- ── Search bar ── --}}
    <form method="GET" action="{{ route('admin.index') }}">
        <div class="search-bar">
            <input type="text" name="keyword" class="search-text" placeholder="名前やメールアドレスを入力してください"
                value="{{ request('keyword') }}">

            <div class="select-wrap">
                <select name="gender" class="search-select">
                    <option value="">性別</option>
                    <option value="男性" {{ request('gender') === '男性' ? 'selected' : '' }}>男性</option>
                    <option value="女性" {{ request('gender') === '女性' ? 'selected' : '' }}>女性</option>
                    <option value="その他" {{ request('gender') === 'その他' ? 'selected' : '' }}>その他</option>
                </select>
                <span class="select-arrow">▼</span>
            </div>

            <div class="select-wrap">
                <select name="inquiry_type" class="search-select" style="min-width:170px;">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('inquiry_type') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <span class="select-arrow">▼</span>
            </div>

            <div class="date-wrap">
                <input type="date" name="date" class="search-date" value="{{ request('date') }}">
            </div>

            <button type="submit" class="btn-search">検索</button>
            <a href="{{ route('admin.index') }}" class="btn-reset">リセット</a>
        </div>
    </form>

    {{-- ── Toolbar ── --}}
    <div class="toolbar">
        <a href="{{ route('admin.export') }}" class="btn-export">エクスポート</a>

        <div class="pagination">
            {{-- Previous --}}
            @if ($contacts->onFirstPage())
                <span class="page-btn disabled">‹</span>
            @else
                <a href="{{ $contacts->previousPageUrl() }}" class="page-btn">‹</a>
            @endif

            {{-- Page numbers --}}
            @for ($i = 1; $i <= $contacts->lastPage(); $i++)
                <a href="{{ $contacts->url($i) }}"
                    class="page-btn {{ $contacts->currentPage() === $i ? 'active' : '' }}">{{ $i }}</a>
            @endfor

            {{-- Next --}}
            @if ($contacts->hasMorePages())
                <a href="{{ $contacts->nextPageUrl() }}" class="page-btn">›</a>
            @else
                <span class="page-btn disabled">›</span>
            @endif
        </div>
    </div>

    {{-- ── Table ── --}}
    <table class="contact-table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name }}　{{ $contact->first_name }}</td>
                    <td>{{ $contact->gender }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->name ?? '—' }}</td>
                    <td>
                        <button class="btn-detail" onclick="openModal({{ $contact->id }})">詳細</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding:40px; color:var(--color-text-muted);">
                        該当するデータがありません
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- ══════════════════════════════
    Modal (one per contact)
    ══════════════════════════════ --}}
    @foreach ($contacts as $contact)
        <div class="modal-overlay" id="modal-{{ $contact->id }}">
            <div class="modal">
                <button class="modal-close" onclick="closeModal({{ $contact->id }})">×</button>

                <div class="detail-row">
                    <span class="detail-label">お名前</span>
                    <span class="detail-value">{{ $contact->last_name }}　{{ $contact->first_name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">性別</span>
                    <span class="detail-value">{{ $contact->gender }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">メールアドレス</span>
                    <span class="detail-value">{{ $contact->email }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">電話番号</span>
                    <span class="detail-value">{{ $contact->tel }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">住所</span>
                    <span class="detail-value">{{ $contact->address }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">建物名</span>
                    <span class="detail-value">{{ $contact->building ?? '—' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">お問い合わせの種類</span>
                    <span class="detail-value">{{ $contact->category->name ?? '—' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">お問い合わせ内容</span>
                    <span class="detail-value">{!! nl2br(e($contact->detail)) !!}</span>
                </div>

                <div class="modal-actions">
                    <form action="{{ route('admin.destroy', $contact->id) }}" method="POST"
                        onsubmit="return confirm('本当に削除しますか？')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">削除</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Overlay click to close --}}
    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).classList.remove('open');
            document.body.style.overflow = '';
        }

        // Click outside modal to close
        document.querySelectorAll('.modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', function (e) {
                if (e.target === this) {
                    this.classList.remove('open');
                    document.body.style.overflow = '';
                }
            });
        });

        // ESC key to close
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal-overlay.open').forEach(el => {
                    el.classList.remove('open');
                    document.body.style.overflow = '';
                });
            }
        });
    </script>
@endsection