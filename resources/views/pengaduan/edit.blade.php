@extends('layouts.main')
@section('title', 'Edit Pengaduan')

@section('content')
    <style>
        /* SAMA DENGAN CREATE (BIAR KONSISTEN) */
        .page {
            background: linear-gradient(180deg, #f8fafc, #eef2ff);
            padding: 90px 24px
        }

        .card {
            max-width: 900px;
            margin: auto;
            background: #fff;
            border-radius: 30px;
            padding: 50px;
            box-shadow: 0 40px 90px rgba(0, 0, 0, .12)
        }

        .group {
            margin-bottom: 22px
        }

        label {
            font-weight: 600;
            font-size: 14px
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 14px;
            border-radius: 16px;
            border: 1px solid #e5e7eb
        }

        textarea {
            min-height: 140px
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px
        }

        .photo {
            border: 2px dashed #c7d2fe;
            border-radius: 20px;
            padding: 20px;
            text-align: center
        }

        .photo img {
            max-width: 100%;
            border-radius: 16px;
            margin-bottom: 10px
        }

        .actions {
            margin-top: 36px;
            display: flex;
            gap: 14px
        }

        .btn-main {
            flex: 1;
            background: #6366f1;
            color: #fff;
            padding: 16px;
            border-radius: 18px;
            border: none;
            font-weight: 700
        }

        .btn-back {
            padding: 16px 28px;
            border-radius: 18px;
            border: 1px solid #6366f1;
            color: #6366f1;
            text-decoration: none
        }
    </style>

    <div class="page">
        <div class="card">

            <h2>Edit Pengaduan</h2>
            <p>Perbarui laporan Anda jika ada perubahan</p>

            <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- ⬅️ INI KUNCI UTAMA --}}

                <div class="form-group">
                    <label>Judul Pengaduan</label>
                    <input type="text" name="judul" value="{{ old('judul', $pengaduan->judul) }}" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_pengaduan_id" required>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}"
                                {{ $pengaduan->kategori_pengaduan_id == $k->id ? 'selected' : '' }}>
                                {{ $k->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Isi Pengaduan</label>
                    <textarea name="isi_pengaduan" required>{{ old('isi_pengaduan', $pengaduan->isi_pengaduan) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Jalan</label>
                    <input type="text" name="jalan" value="{{ old('jalan', $pengaduan->jalan) }}" required>
                </div>

                <div class="grid">
                    <div class="form-group">
                        <label>RT</label>
                        <input type="text" name="rt" value="{{ old('rt', $pengaduan->rt) }}" required>
                    </div>

                    <div class="form-group">
                        <label>RW</label>
                        <input type="text" name="rw" value="{{ old('rw', $pengaduan->rw) }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Foto (opsional)</label>

                    @if ($pengaduan->foto)
                        <img src="{{ asset('storage/' . $pengaduan->foto) }}"
                            style="max-width:180px;border-radius:12px;margin-bottom:10px">
                    @endif

                    <input type="file" name="foto">
                </div>

                <div class="actions">
                    <a href="{{ route('pengaduan.index') }}" class="btn-secondary">Batal</a>
                    <button type="submit" class="btn-primary">Simpan Perubahan</button>
                </div>
            </form>


        </div>
    </div>

    <script>
        foto.onchange = e => {
            preview.src = URL.createObjectURL(e.target.files[0]);
            preview.style.display = 'block';
        }
    </script>
@endsection
