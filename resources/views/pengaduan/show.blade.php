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
            .page {
                padding: 24px 14px 34px;
            }

            .pengaduan-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
                padding: 22px 18px;
                border-radius: 18px;
                margin-bottom: 18px;
                box-shadow: 0 18px 45px rgba(15, 23, 42, .1);
            }

            .pengaduan-header h1 {
                font-size: 24px;
                line-height: 1.25;
            }

            .content {
                grid-template-columns: 1fr;
                gap: 22px;
            }

            .card {
                padding: 18px;
                border-radius: 20px;
                box-shadow: 0 18px 45px rgba(79, 70, 229, .14);
            }

            .photo-box {
                height: 220px;
                border-radius: 16px;
            }

            .info {
                grid-template-columns: 1fr;
                row-gap: 6px;
            }

            .info b {
                margin-top: 12px;
            }

            .actions {
                margin-top: 28px;
                display: grid;
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .actions .btn,
            .actions form {
                width: 100%;
            }

            .btn {
                padding: 13px;
                border-radius: 12px;
            }

            .modal-content {
                width: calc(100% - 32px);
                padding: 24px 18px;
                border-radius: 18px;
            }

            .modal-actions {
                flex-direction: column;
            }
        }

        /* ============= MODAL DELETE KEEN ============= */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .6);
            backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            animation: modalFade .3s ease;
        }

        .modal-content {
            background: #fff;
            border-radius: 24px;
            padding: 32px;
            width: 90%;
            max-width: 420px;
            text-align: center;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .15);
            animation: modalSlide .4s cubic-bezier(.34, 1.56, .64, 1);
        }

        .modal-icon {
            font-size: 48px;
            margin-bottom: 16px;
            animation: bounceIn .6s ease;
        }

        .modal-content h3 {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 12px;
        }

        .modal-content p {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .modal-actions button {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all .2s ease;
            border: none;
        }

        .btn-cancel {
            background: #f3f4f6;
            color: #6b7280;
        }

        .btn-cancel:hover {
            background: #e5e7eb;
            transform: translateY(-1px);
        }

        .btn-delete-confirm {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: #fff;
            box-shadow: 0 4px 12px rgba(220, 38, 38, .3);
        }

        .btn-delete-confirm:hover {
            background: linear-gradient(135deg, #b91c1c, #991b1b);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(220, 38, 38, .4);
        }

        @keyframes modalFade {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes modalSlide {
            from {
                opacity: 0;
                transform: scale(.9) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(.3);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
            70% {
                transform: scale(.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
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

                    <button type="button" class="btn btn-delete" onclick="confirmDelete()">
                        Hapus
                    </button>
                </div>

                <!-- FORM DELETE (HIDDEN) -->
                <form method="POST" action="{{ route('pengaduan.destroy', $pengaduan->id) }}" id="deleteForm" style="display:none">
                    @csrf
                    @method('DELETE')
                </form>


            </div>

        </div>
    </div>

    <!-- MODAL DELETE KEEN -->
    <div id="deleteModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-icon">🗑️</div>
            <h3>Hapus Pengaduan?</h3>
            <p>Data pengaduan ini akan dihapus secara permanen dan tidak dapat dikembalikan.</p>
            <div class="modal-actions">
                <button class="btn-cancel" onclick="closeDeleteModal()">Batal</button>
                <button class="btn-delete-confirm" onclick="proceedDelete()">Ya, Hapus</button>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        function proceedDelete() {
            closeDeleteModal();
            // Show loading
            const pageLoading = document.getElementById('pageLoading');
            if (pageLoading) {
                pageLoading.classList.add('show');
            }
            // Submit delete form
            document.getElementById('deleteForm').submit();
        }
    </script>

@endsection
