@extends('layouts.main')

@section('title', 'Pengaduan Saya')

@section('content')

    <style>
        /* ================= HEADER ================= */
        .page-header {
            margin: 36px auto 24px;
            max-width: 1100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
        }

        .page-actions {
            display: flex;
            gap: 12px;
        }

        .btn-add {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: #fff;
            padding: 14px 22px;
            border-radius: 999px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 12px 30px rgba(79, 70, 229, .35);
        }

        .btn-history {
            background: #fff;
            color: #4f46e5;
            padding: 14px 22px;
            border-radius: 999px;
            font-weight: 700;
            text-decoration: none;
            border: 1px solid #e5e7eb;
        }

        /* ================= FILTER ================= */
        .filter-box {
            max-width: 1100px;
            margin: 0 auto 36px;
            padding: 18px;
            background: #fff;
            border-radius: 22px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, .08);
            display: flex;
            gap: 14px;
        }

        .filter-box input,
        .filter-box select {
            padding: 14px 18px;
            border-radius: 999px;
            border: 1px solid #e5e7eb;
            background: #f8fafc;
            min-width: 240px;
        }

        /* ================= GRID ================= */
        .grid-box {
            max-width: 1100px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        /* ================= CARD ================= */
        .card {
            background: #fff;
            border-radius: 26px;
            padding: 26px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, .08);
        }

        .badge {
            padding: 6px 16px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 16px;
            display: inline-block;
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
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .card p {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 18px;
        }

        .lokasi {
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .action {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
        }

        .btn-detail {
            background: #eef2ff;
            color: #4338ca;
        }

        .btn-edit {
            background: #fef3c7;
            color: #92400e;
        }

        /* ================= EMPTY ================= */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 80px 20px;
            background: #fff;
            border-radius: 28px;
            box-shadow: 0 25px 60px rgba(15, 23, 42, .1);
        }

        /* ================= PAGINATION (FINAL & RAPI) ================= */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin: 60px 0 40px;
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
                <h3>Belum ada pengaduan</h3>
                <p>Silakan buat pengaduan pertama Anda.</p>
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
