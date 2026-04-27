@extends('layouts.main')
@section('title', 'Ajukan Pengaduan')

@section('content')
    <style>
        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif
        }

        .create-page {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f3f4f6;
            padding: 40px;
        }

        .create-card {
            width: 100%;
            max-width: 1100px;
            background: #fff;
            border-radius: 28px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
            box-shadow: 0 40px 80px rgba(0, 0, 0, .15);
        }

        .create-left {
            background:
                linear-gradient(180deg, rgba(15, 23, 42, .6), rgba(15, 23, 42, .9)),
                url('{{ asset('assets/images/pengaduan-2.jpg') }}');
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .create-left h2 {
            font-size: 28px;
            font-weight: 700
        }

        .create-left p {
            font-size: 15px;
            line-height: 1.7;
            opacity: .9
        }

        .create-right {
            padding: 50px
        }

        .create-right h3 {
            font-size: 26px;
            font-weight: 800
        }

        .create-right p {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 30px
        }

        .form-group {
            margin-bottom: 18px
        }

        label {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
            display: block
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 14px 16px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            font-size: 14px;
        }

        textarea {
            min-height: 120px
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .file-box {
            border: 2px dashed #c7d2fe;
            border-radius: 16px;
            padding: 18px;
            text-align: center;
        }

        .file-box img {
            max-width: 100%;
            border-radius: 14px;
            margin-bottom: 10px;
            display: none;
        }

        .actions {
            display: flex;
            gap: 14px;
            margin-top: 30px;
        }

        .btn-submit {
            flex: 1;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
            border: none;
            padding: 16px;
            border-radius: 16px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-cancel {
            padding: 16px 26px;
            border-radius: 16px;
            border: 1px solid #6366f1;
            color: #6366f1;
            background: transparent;
            font-weight: 600;
            cursor: pointer;
        }

        .error-box {
            background: #fee2e2;
            padding: 14px;
            border-radius: 14px;
            margin-bottom: 20px;
        }

        .error-box li {
            color: #991b1b;
            font-size: 13px;
        }

        @media(max-width:900px) {
            .create-page {
                min-height: auto;
                align-items: flex-start;
                padding: 18px 14px 32px;
            }

            .create-card {
                grid-template-columns: 1fr;
                border-radius: 18px;
                box-shadow: 0 18px 45px rgba(15, 23, 42, .12);
            }

            .create-left {
                min-height: 150px;
                padding: 24px;
            }

            .create-left h2 {
                font-size: 22px;
            }

            .create-left p:last-child {
                display: none;
            }

            .create-right {
                padding: 24px 18px;
            }

            .create-right h3 {
                font-size: 23px;
                line-height: 1.2;
            }

            .create-right p {
                margin-bottom: 22px;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-group {
                margin-bottom: 14px;
            }

            input,
            select,
            textarea {
                min-height: 46px;
                padding: 11px 13px;
                border-radius: 12px;
                font-size: 16px;
            }

            textarea {
                min-height: 130px;
            }

            .file-box {
                padding: 14px;
                border-radius: 14px;
            }

            .actions {
                display: grid;
                grid-template-columns: 1fr;
                gap: 10px;
                margin-top: 22px;
            }

            .btn-submit,
            .btn-cancel {
                width: 100%;
                padding: 14px;
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

        /* ============= MODAL SUBMIT KEEN ============= */
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

        .btn-submit-confirm {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
            box-shadow: 0 4px 12px rgba(99, 102, 241, .3);
        }

        .btn-submit-confirm:hover {
            background: linear-gradient(135deg, #4f46e5, #3730a3);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(99, 102, 241, .4);
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

    <div class="create-page">
        <div class="create-card">

            <!-- LEFT -->
            <div class="create-left">
                <div>
                    <h2>SiPAWA</h2>
                    <p>Sistem pengaduan warga modern untuk menyampaikan aspirasi dan keluhan.</p>
                </div>
                <p>© {{ date('Y') }} SiPAWA</p>
            </div>

            <!-- RIGHT -->
            <div class="create-right">
                <h3>Ajukan Pengaduan</h3>
                <p>Isi laporan dengan jelas agar dapat segera ditindaklanjuti</p>

                @if ($errors->any())
                    <div class="error-box">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="pengaduanForm" class="no-loading" method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data" onsubmit="return handleFormSubmit(event)">
                    @csrf

                    <div class="grid">
                        <div class="form-group">
                            <label>Nama Pelapor</label>
                            <input value="{{ auth()->user()->name }}" readonly style="background:#f1f5f9">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input value="{{ auth()->user()->email }}" readonly style="background:#f1f5f9">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Judul Pengaduan</label>
                        <input name="judul" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori_pengaduan_id" required>
                            <option value="" disabled {{ old('kategori_pengaduan_id') ? '' : 'selected' }}>Pilih kategori pengaduan</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}" {{ old('kategori_pengaduan_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Isi Pengaduan</label>
                        <textarea name="isi_pengaduan" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Jalan / Lokasi</label>
                        <input name="jalan" required>
                    </div>

                    <div class="grid">
                        <div class="form-group">
                            <label>RT</label>
                            <input name="rt" required>
                        </div>
                        <div class="form-group">
                            <label>RW</label>
                            <input name="rw" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Foto (Opsional)</label>
                        <div class="file-box">
                            <img id="preview">
                            <input type="file" name="foto" id="foto">
                        </div>
                    </div>

                    <div class="actions">
                        <button type="button" class="btn-cancel"
                            onclick="openConfirm(
                            'Apakah Anda yakin untuk kembali? Pengaduan yang belum dikirim tidak akan tersimpan.',
                            () => window.location='{{ route('pengaduan.index') }}'
                        )">
                            Batal
                        </button>

                        <button type="submit" class="btn-submit">
                            Kirim Pengaduan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let formSubmitted = false;

        function handleFormSubmit(e) {
            // Cek validitas form
            const form = e.target;
            if (!form.checkValidity()) {
                e.preventDefault();
                form.reportValidity();
                return false;
            }

            // Jika belum dikonfirmasi, tahan submit
            if (!formSubmitted) {
                e.preventDefault();
                document.getElementById('submitModal').style.display = 'flex';
                return false;
            }

            return true;
        }

        function closeSubmitModal() {
            document.getElementById('submitModal').style.display = 'none';
        }

        function proceedSubmit() {
            closeSubmitModal();
            formSubmitted = true;

            // Tampilkan loading
            const pageLoading = document.getElementById('pageLoading');
            if (pageLoading) {
                pageLoading.classList.add('show');
            }

            // Submit form
            document.getElementById('pengaduanForm').submit();
        }

        /* PREVIEW FOTO */
        document.addEventListener('DOMContentLoaded', function() {
            const fotoInput = document.getElementById('foto');
            if (fotoInput) {
                fotoInput.addEventListener('change', function(e) {
                    const preview = document.getElementById('preview');
                    if (preview && e.target.files[0]) {
                        preview.src = URL.createObjectURL(e.target.files[0]);
                        preview.style.display = 'block';
                    }
                });
            }

            /* DRAFT AUTOSAVE */
            const fields = ['judul', 'isi_pengaduan', 'jalan', 'rt', 'rw'];
            fields.forEach(name => {
                const el = document.querySelector(`[name="${name}"]`);
                if (!el) return;

                // Load draft
                if (localStorage.getItem('draft_' + name)) {
                    el.value = localStorage.getItem('draft_' + name);
                }

                // Save draft on input
                el.addEventListener('input', () => {
                    localStorage.setItem('draft_' + name, el.value);
                });
            });

            // Clear draft setelah submit sukses
            const form = document.getElementById('pengaduanForm');
            if (form) {
                const originalSubmit = form.submit;
                form.submit = function() {
                    fields.forEach(name => localStorage.removeItem('draft_' + name));
                    originalSubmit.call(this);
                };
            }
        });
    </script>

    <!-- MODAL KIRIM PENGADUAN KEEN -->
    <div id="submitModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-icon">📤</div>
            <h3>Kirim Pengaduan?</h3>
            <p>Pastikan data sudah benar. Pengaduan akan diproses oleh petugas terkait.</p>
            <div class="modal-actions">
                <button class="btn-cancel" onclick="closeSubmitModal()">Periksa Lagi</button>
                <button class="btn-submit-confirm" onclick="proceedSubmit()">Ya, Kirim</button>
            </div>
        </div>
    </div>

@endsection
