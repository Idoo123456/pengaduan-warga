@extends('layouts.main')

@section('title', 'Tentang Saya')

@section('content')

<section class="about-me">
    <!-- tombol kembali -->
    <a href="{{ route('tentang') }}" class="btn-back">← Kembali</a>

    <div class="about-grid">

        <!-- FOTO -->
        <div class="photo-card">
            <img src="{{ asset('assets/images/profile.jpg') }}" alt="Mido Herdiansyah">

            <div class="photo-overlay">
                <h2>Mido Herdiansyah</h2>
                <span>Mahasiswa Sistem Informasi</span>
            </div>
        </div>

        <!-- DATA DIRI (CARD BARU – INI KUNCI) -->
        <div class="profile-card">
            <h3>Data Diri</h3>
            <ul>
                <li><strong>Nama:</strong> Mido Herdiansyah</li>
                <li><strong>Status:</strong> Mahasiswa</li>
                <li><strong>Jurusan:</strong> Sistem Informasi</li>
                <li><strong>Project:</strong> SiPAWA</li>
                <li><strong>Fokus:</strong> UI Modern & UX</li>
            </ul>
        </div>

        <!-- DESKRIPSI -->
        <div class="desc-card">
            <h3>Tentang Saya</h3>
            <p>
                Saya adalah mahasiswa Sistem Informasi yang membangun
                <strong>SiPAWA</strong> sebagai proyek pembelajaran web
                dengan fokus pada UI modern dan pengalaman pengguna.
            </p>

            <a href="{{ route('tentang.kontak') }}" class="btn-primary">
                Hubungi Saya
            </a>
        </div>

    </div>
</section>

@endsection
