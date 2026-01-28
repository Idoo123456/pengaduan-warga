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
            .create-card {
                grid-template-columns: 1fr
            }

            .create-left {
                min-height: 260px
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

                <form id="pengaduanForm" method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
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
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
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
                            'Pengaduan belum dikirim. Yakin ingin membatalkan?',
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
        const form = document.getElementById('pengaduanForm');
        let confirmed = false;

        form.addEventListener('submit', function(e) {

            // Jika belum dikonfirmasi, tahan submit
            if (!confirmed) {
                e.preventDefault();

                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                openConfirm(
                    'Yakin ingin mengirim pengaduan ini?',
                    () => {
                        confirmed = true; // ✅ tandai sudah konfirmasi
                        form.submit(); // ✅ submit asli (tanpa loop)
                    }
                );
            }
        });

        /* PREVIEW FOTO */
        document.getElementById('foto').addEventListener('change', function(e) {
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(e.target.files[0]);
            preview.style.display = 'block';
        });
    </script>

@endsection
