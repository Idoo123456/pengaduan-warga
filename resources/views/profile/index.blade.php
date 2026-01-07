@extends('layouts.main')
@section('title', 'Profil Saya')

@section('content')

    <style>
        .profile-page {
            padding: 100px 24px;
            background: #f4f7fb;
        }

        /* CARD */
        .profile-card {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            border-radius: 28px;
            padding: 50px;
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 60px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, .12);
        }

        /* ==== LEFT SIDE ==== */
        .profile-left {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* AVATAR */
        .profile-avatar {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            overflow: hidden;
            background: #6366f1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 72px;
            font-weight: 800;
            color: #fff;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* UPLOAD */
        .upload-wrapper {
            margin-top: 18px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .upload-btn {
            background: #6366f1;
            color: #fff;
            padding: 12px 26px;
            border-radius: 999px;
            font-weight: 700;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 10px 25px rgba(99, 102, 241, .35);
        }

        .upload-btn:hover {
            background: #4f46e5;
        }

        .file-name {
            font-size: 12px;
            color: #64748b;
        }

        /* DELETE */
        .btn-delete {
            margin-top: 14px;
            padding: 10px 22px;
            background: #fee2e2;
            color: #991b1b;
            border: none;
            border-radius: 999px;
            font-weight: 700;
            cursor: pointer;
        }

        /* ==== RIGHT SIDE ==== */
        .profile-info h1 {
            margin-bottom: 24px;
        }

        .profile-info label {
            font-size: 13px;
            color: #64748b;
            display: block;
            margin-top: 18px;
        }

        .profile-info input[type="text"] {
            width: 100%;
            padding: 14px 18px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            font-size: 15px;
            font-weight: 600;
        }

        .btn-save {
            margin-top: 32px;
            padding: 16px 36px;
            background: #22c55e;
            color: #fff;
            border: none;
            border-radius: 18px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-password {
            display: inline-block;
            margin-top: 18px;
            padding: 14px 28px;
            background: #6366f1;
            color: #fff;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 700;
        }

        /* ALERT */
        .alert {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 14px;
            margin-bottom: 20px;
        }

        /* RESPONSIVE */
        @media(max-width:900px) {
            .profile-card {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
    </style>

    <div class="profile-page">

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="profile-card">

                {{-- LEFT --}}
                <div class="profile-left">
                    <div class="profile-avatar">
                        @if (auth()->user()->photo)
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}?v={{ auth()->user()->updated_at }}">
                        @else
                            {{ strtoupper(substr(auth()->user()->nama, 0, 1)) }}
                        @endif
                    </div>

                    <div class="upload-wrapper">
                        <label class="upload-btn">
                            📷 Pilih Foto
                            <input type="file" name="photo" accept=".jpg,.jpeg,.png" hidden>
                        </label>
                        <span class="file-name" id="fileName">Belum ada file</span>
                    </div>

                    @if (auth()->user()->photo)
                        <button type="submit" name="hapus_foto" value="1" class="btn-delete"
                            onclick="return confirm('Hapus foto profil?')">
                            Hapus Foto Profil
                        </button>
                    @endif
                </div>

                {{-- RIGHT --}}
                <div class="profile-info">
                    <h1>Profil Saya</h1>

                    @if (session('success'))
                        <div class="alert">{{ session('success') }}</div>
                    @endif

                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ auth()->user()->nama }}" required>

                    <label>Email</label>
                    <p>{{ auth()->user()->email }}</p>

                    <label>NIK</label>
                    <p>{{ auth()->user()->nik }}</p>

                    <button type="submit" class="btn-save">
                        Simpan Perubahan
                    </button>

                    <br>
                    <a href="{{ route('profile.password') }}" class="btn-password">
                        Ganti Password
                    </a>
                </div>

            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const input = document.querySelector('input[name="photo"]');
            const fileName = document.getElementById('fileName');

            if (!input) return;

            input.addEventListener('change', () => {
                fileName.textContent = input.files.length ?
                    input.files[0].name :
                    'Belum ada file';
            });
        });
    </script>

@endsection
