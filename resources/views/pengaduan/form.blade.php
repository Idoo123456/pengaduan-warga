@extends('layouts.main')

@section('title', 'Pengaduan Warga')
@section('body-class', 'page-pengaduan')

@section('content')
<div class="container py-5">
    <div class="row g-5 align-items-start">

        <!-- ================= SLIDER KIRI ================= -->
        <div class="col-lg-6">
            <div id="pengaduanSlider"
                 class="carousel slide pengaduan-slider"
                 data-bs-ride="carousel"
                 data-bs-interval="4500">

                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="{{ asset('assets/images/pengaduan-illustration.jpg') }}" alt="">
                        <div class="slider-overlay">
                            <h4>Bersama Membangun Desa</h4>
                            <p>Partisipasi warga adalah kunci perubahan</p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/pengaduan-2.jpg') }}" alt="">
                        <div class="slider-overlay">
                            <h4>Transparansi & Terbuka</h4>
                            <p>Setiap laporan diproses secara jelas</p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/pengaduan-3.jpg') }}" alt="">
                        <div class="slider-overlay">
                            <h4>Tindak Lanjut Nyata</h4>
                            <p>Ditangani oleh pihak berwenang</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ================= FORM KANAN (CARD) ================= -->
        <div class="col-lg-6">

            <div class="form-card">

                <h3 class="mb-1">Form Pengaduan Warga</h3>
                <p class="text-muted mb-4">
                    Sampaikan laporan Anda secara jelas dan lengkap.
                </p>

                {{-- FLASH SUCCESS --}}
                @if (session('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- FLASH ERROR --}}
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('pengaduan.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text"
                               name="nama"
                               class="form-control"
                               value="{{ old('nama') }}"
                               placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}"
                               placeholder="email@gmail.com">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Pengaduan</label>
                        <input type="text"
                               name="judul"
                               class="form-control"
                               value="{{ old('judul') }}"
                               placeholder="Judul laporan">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                            <option value="Kebersihan" {{ old('kategori') == 'Kebersihan' ? 'selected' : '' }}>Kebersihan</option>
                            <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Isi Pengaduan</label>
                        <textarea name="isi"
                                  rows="4"
                                  class="form-control"
                                  placeholder="Tuliskan isi pengaduan Anda">{{ old('isi') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold">
                        Kirim Pengaduan
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
