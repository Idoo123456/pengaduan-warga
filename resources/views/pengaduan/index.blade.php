@extends('layouts.main')

@section('title', 'Pengaduan Saya')

@section('content')

    <style>
        /* ================= PAGE LAYOUT ================= */
        .page-header,
        .filter-box,
        .grid-box {
            max-width: 1320px;
            margin-left: auto;
            margin-right: auto;
        }

        .page-header {
            margin: 48px auto 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
            padding: 0 20px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            color: #0f172a;
        }

        .page-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-add,
        .btn-history {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 52px;
            padding: 0 22px;
            border-radius: 999px;
            font-weight: 700;
            text-decoration: none;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease;
        }

        .btn-add {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: #fff;
            box-shadow: 0 14px 30px rgba(79, 70, 229, .25);
        }

        .btn-add:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 36px rgba(79, 70, 229, .28);
        }

        .btn-history {
            background: #fff;
            color: #4f46e5;
            border: 1px solid #e5e7eb;
        }

        .btn-history:hover {
            background: #eef2ff;
        }

        /* ================= FILTER ================= */
        .filter-box {
            margin: 0 auto 36px;
            padding: 20px 22px;
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, .08);
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            align-items: center;
        }

        .filter-box input,
        .filter-box select {
            flex: 1 1 240px;
            min-width: 0;
            max-width: 360px;
            width: 100%;
            padding: 16px 20px;
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            background: #f8fafc;
            color: #0f172a;
            font-size: 15px;
            outline: none;
        }

        .filter-box input::placeholder {
            color: #94a3b8;
        }

        /* ================= GRID ================= */
        .grid-box {
            margin-bottom: 44px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
            align-items: stretch;
            padding: 0 20px;
        }

        /* ================= CARD ================= */
        .card {
            background: #ffffff;
            border-radius: 28px;
            padding: 32px 28px;
            border: 1px solid rgba(226, 232, 240, .9);
            box-shadow: 0 24px 60px rgba(15, 23, 42, .08);
            transition: transform .2s ease, box-shadow .2s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 320px;
        }

        @media (max-width: 1100px) {
            .grid-box {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 30px 72px rgba(15, 23, 42, .12);
        }

        .badge {
            padding: 9px 18px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            letter-spacing: .01em;
        }

        .badge.dikirim {
            background: #eef2ff;
            color: #4338ca;
        }

        .badge.diproses {
            background: #fef3c7;
            color: #92400e;
        }

        .card h3 {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 14px;
            color: #0f172a;
            line-height: 1.15;
        }

        .card p {
            font-size: 15px;
            color: #475569;
            margin-bottom: 22px;
            line-height: 1.8;
            min-height: 78px;
        }

        .lokasi {
            font-size: 14px;
            color: #334155;
            font-weight: 700;
            margin-bottom: 24px;
        }

        .action {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            min-width: 120px;
            padding: 13px 22px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: transform .2s ease, background .2s ease, color .2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-detail {
            background: #eef2ff;
            color: #4338ca;
        }

        .btn-detail:hover {
            background: #dbeafe;
        }

        .btn-edit {
            background: #fef3c7;
            color: #92400e;
        }

        .btn-edit:hover {
            background: #fde68a;
        }

        /* ================= EMPTY ================= */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 64px 32px;
            background: #fff;
            border-radius: 28px;
            box-shadow: 0 28px 70px rgba(15, 23, 42, .1);
            min-height: 320px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 18px;
        }

        .empty-state .empty-icon {
            width: 82px;
            height: 82px;
            border-radius: 22px;
            background: #eef2ff;
            display: grid;
            place-items: center;
            color: #4f46e5;
            font-size: 32px;
            box-shadow: inset 0 0 0 1px rgba(79, 70, 229, .12);
        }

        .empty-state h3 {
            font-size: 24px;
            margin-bottom: 0;
            color: #0f172a;
        }

        .empty-state p {
            margin: 0;
            color: #64748b;
            max-width: 520px;
            line-height: 1.75;
        }

        /* ================= PAGINATION (FINAL & RAPI) ================= */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin: 56px 0 40px;
        }

        .pagination {
            display: flex;
            gap: 12px;
        }

        .pagination li {
            list-style: none;
        }

        .pagination li a,
        .pagination li span {
            padding: 12px 20px;
            border-radius: 999px;
            background: #ffffff;
            color: #334155;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid #e5e7eb;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            transition: .25s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pagination li a:hover {
            background: #6366f1;
            color: #fff;
            transform: translateY(-2px);
        }

        .pagination li.active span {
            background: #6366f1;
            color: #fff;
            border-color: #6366f1;
        }

        .pagination li.disabled span {
            opacity: .5;
            cursor: not-allowed;
        }

        @media (max-width: 768px) {
            .page-header,
            .filter-box,
            .grid-box {
                width: calc(100% - 32px);
            }

            .page-header {
                margin: 28px auto 18px;
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
                padding: 0;
            }

            .page-title {
                font-size: 24px;
                line-height: 1.2;
            }

            .page-actions {
                width: 100%;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .btn-add,
            .btn-history {
                min-height: 46px;
                padding: 0 12px;
                border-radius: 14px;
                font-size: 13px;
                white-space: nowrap;
            }

            .filter-box {
                margin-bottom: 22px;
                padding: 14px;
                border-radius: 16px;
                display: grid;
                grid-template-columns: 1fr;
                gap: 10px;
                box-shadow: 0 12px 28px rgba(15, 23, 42, .08);
            }

            .filter-box input,
            .filter-box select {
                max-width: 100%;
                width: 100%;
                min-width: 0;
                min-height: 46px;
                padding: 11px 13px;
                border-radius: 12px;
                font-size: 16px;
            }

            .grid-box {
                grid-template-columns: 1fr;
                gap: 14px;
                padding: 0;
                margin-bottom: 28px;
            }

            .card {
                max-width: none;
                width: 100%;
                padding: 20px;
                border-radius: 18px;
                min-height: auto;
            }

            .card h3 {
                font-size: 18px;
                line-height: 1.3;
                margin-bottom: 10px;
            }

            .card p {
                font-size: 14px;
                line-height: 1.65;
                min-height: 0;
                margin-bottom: 16px;
            }

            .badge {
                margin-bottom: 12px;
                padding: 7px 12px;
                font-size: 12px;
            }

            .lokasi {
                margin-bottom: 16px;
            }

            .action {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .btn {
                min-width: 0;
                width: 100%;
                justify-content: center;
                padding: 12px 14px;
                border-radius: 12px;
            }

            .pagination-wrapper {
                padding: 0 16px;
                margin: 32px 0 28px;
                overflow-x: auto;
                justify-content: flex-start;
            }

            .empty-state {
                padding: 34px 18px;
                border-radius: 18px;
                min-height: 260px;
            }
        }
    </style>

    {{-- HEADER --}}
    <div class="page-header">
        <div class="page-title">Pengaduan Saya</div>
        <div class="page-actions">
            <a href="{{ route('pengaduan.riwayat') }}" class="btn-history">Riwayat</a>
            <a href="{{ route('pengaduan.create') }}" class="btn-add">+ Tambah Pengaduan</a>
        </div>
    </div>

    {{-- FILTER --}}
    <form method="GET" class="filter-box" id="filterForm">
        <input type="text" name="search" placeholder="Cari pengaduan…" value="{{ request('search') }}">
        <select name="status">
            <option value="">Semua Status</option>
            <option value="Dikirim" {{ request('status') == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
            <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
        </select>
        <select name="kategori">
            <option value="">Semua Kategori</option>
            @foreach ($kategori as $k)
                <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>
    </form>

    {{-- GRID --}}
    <div class="grid-box">
        @forelse($pengaduan as $p)
            <div class="card">
                <span class="badge {{ strtolower($p->status) }}">{{ $p->status }}</span>
                <h3>{{ $p->judul }}</h3>
                <p>{{ Str::limit($p->isi_pengaduan, 90) }}</p>
                <div class="lokasi">RT {{ $p->rt }} / RW {{ $p->rw }}</div>
                <div class="action">
                    <a href="{{ route('pengaduan.show', $p->id) }}" class="btn btn-detail">Detail</a>
                    <a href="{{ route('pengaduan.edit', $p->id) }}" class="btn btn-edit">Edit</a>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <h3>Belum ada pengaduan</h3>
                <p>Data pengaduan Anda masih kosong. Buat laporan pertama agar aspirasi Anda segera diproses.</p>
                <a href="{{ route('pengaduan.create') }}" class="btn-add">+ Buat Pengaduan</a>
            </div>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    @if ($pengaduan->hasPages())
        <div class="pagination-wrapper">
            {{ $pengaduan->links('vendor.pagination.sipawa') }}

        </div>
    @endif

    <script>
        document.querySelectorAll('#filterForm input, #filterForm select')
            .forEach(el => el.addEventListener('change', () => filterForm.submit()));
    </script>

@endsection
