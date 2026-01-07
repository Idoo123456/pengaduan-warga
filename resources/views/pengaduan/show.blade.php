@extends('layouts.main')
@section('title', 'Detail Pengaduan')

@section('content')

    <style>
        /* ================= PAGE ================= */
        .page {
            background: linear-gradient(180deg, #f8fafc, #eef2ff);
            padding: 80px 24px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        /* ================= HEADER ================= */
        .pengaduan-header {
            background: #ffffff;
            border-radius: 28px;
            padding: 36px 44px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 30px 80px rgba(0, 0, 0, .12);
            margin-bottom: 40px;
        }

        .pengaduan-header h1 {
            font-size: 34px;
            margin: 0;
            font-weight: 800;
        }

        .pengaduan-header p {
            margin-top: 8px;
            font-size: 14px;
            color: #64748b;
        }

        /* ================= STATUS ================= */
        .status-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 22px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 14px;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .status-dikirim {
            background: #e0e7ff;
            color: #3730a3;
        }

        .status-dikirim .status-dot {
            background: #6366f1
        }

        .status-diproses {
            background: #fef3c7;
            color: #92400e;
        }

        .status-diproses .status-dot {
            background: #f59e0b
        }

        .status-selesai {
            background: #dcfce7;
            color: #166534;
        }

        .status-selesai .status-dot {
            background: #22c55e
        }

        /* ================= CARD ================= */
        .card {
            background: #ffffff;
            border-radius: 32px;
            padding: 50px;
            box-shadow: 0 40px 90px rgba(79, 70, 229, .18);
        }

        /* ================= CONTENT ================= */
        .content {
            display: grid;
            grid-template-columns: 420px 1fr;
            gap: 50px;
        }

        /* ================= FOTO ================= */
        .photo-box {
            background: #f1f5f9;
            border-radius: 24px;
            height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-photo {
            text-align: center;
            color: #64748b;
        }

        .no-photo span {
            font-size: 48px;
            display: block;
            margin-bottom: 10px;
        }

        /* ================= INFO ================= */
        .info {
            display: grid;
            grid-template-columns: 180px 1fr;
            row-gap: 18px;
            column-gap: 20px;
        }

        .info b {
            color: #0f172a;
        }

        .info p {
            margin: 0;
            color: #475569;
        }

        /* ================= ACTIONS ================= */
        .actions {
            margin-top: 50px;
            display: flex;
            gap: 18px;
            align-items: center;
        }

        /* SEMUA tombol */
        .actions .btn,
        .actions form {
            width: 150px;
            /* ⬅️ KUNCI UTAMA */
        }

        /* tombol di dalam form */
        .actions form button {
            width: 100%;
        }

        /* style tombol */
        .btn {
            padding: 14px 0;
            border-radius: 18px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-back {
            border: 1px solid #6366f1;
            color: #6366f1;
            background: #fff;
        }

        .btn-edit {
            background: #fde68a;
            color: #92400e;
        }

        .btn-delete {
            background: #fee2e2;
            color: #991b1b;
            border: none;
        }

        /* ================= RESPONSIVE ================= */
        @media(max-width:900px) {
            .pengaduan-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .content {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="page">
        <div class="container">

            <!-- HEADER -->
            <div class="pengaduan-header">
                <div>
                    <h1>{{ $pengaduan->judul }}</h1>
                    <p>Laporan pengaduan masyarakat</p>
                </div>

                {{-- STATUS --}}
                @if ($pengaduan->status === 'Dikirim')
                    <div class="status-badge status-dikirim">
                        <span class="status-dot"></span> Dikirim
                    </div>
                @elseif($pengaduan->status === 'Diproses')
                    <div class="status-badge status-diproses">
                        <span class="status-dot"></span> Diproses
                    </div>
                @elseif($pengaduan->status === 'Selesai')
                    <div class="status-badge status-selesai">
                        <span class="status-dot"></span> Selesai
                    </div>
                @endif
            </div>

            <!-- CARD -->
            <div class="card">

                <div class="content">

                    <!-- FOTO -->
                    <div class="photo-box">
                        @if ($pengaduan->foto)
                            <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Pengaduan">
                        @else
                            <div class="no-photo">
                                <span>📷</span>
                                <p>Tidak ada foto lampiran</p>
                            </div>
                        @endif
                    </div>

                    <!-- INFO -->
                    <div class="info">
                        <b>Nama Pelapor</b>
                        <p>{{ $pengaduan->nama }}</p>

                        <b>Kategori</b>
                        <p>{{ $pengaduan->kategori->nama }}</p>

                        <b>Isi Pengaduan</b>
                        <p>{{ $pengaduan->isi_pengaduan }}</p>

                        <b>Alamat</b>
                        <p>{{ $pengaduan->jalan }}, RT {{ $pengaduan->rt }} / RW {{ $pengaduan->rw }}</p>

                        <b>Tanggal</b>
                        <p>{{ $pengaduan->created_at->format('d M Y, H:i') }}</p>
                    </div>

                </div>

                <!-- ACTION -->
                <!-- ACTION -->
                <div class="actions">
                    <a href="{{ route('pengaduan.index') }}" class="btn btn-back">Kembali</a>

                    <a href="{{ route('pengaduan.edit', $pengaduan->id) }}" class="btn btn-edit">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('pengaduan.destroy', $pengaduan->id) }}" id="deleteForm">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-delete"
                            onclick="openConfirm(
                'Apakah Anda yakin ingin menghapus pengaduan ini?',
                () => document.getElementById('deleteForm').submit()
            )">
                            Hapus
                        </button>
                    </form>
                </div>


            </div>

        </div>
    </div>

@endsection
