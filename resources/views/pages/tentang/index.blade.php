@extends('layouts.main')

@section('title', 'Tentang SiPAWA')

@section('content')

{{-- HERO TENTANG --}}
<section class="about-hero">
    <div class="container text-center">
        <h1>Tentang <span>SiPAWA</span></h1>
        <p>Sistem Pengaduan Warga berbasis web yang modern, cepat, aman, dan transparan yang memudahkan warga dalam menyampaikan aspirasi dan keluhan secara online.</p>
    </div>
</section>

{{-- ABOUT CARDS --}}
<section class="about-section">
    <div class="container about-grid">

        {{-- WEBSITE --}}
        <a href="{{ route('tentang.website') }}" class="about-card">
            <div class="about-icon">📌</div>
            <h3>Tentang Website</h3>
            <p>
                Mengenal tujuan, fungsi, dan manfaat SiPAWA
                bagi masyarakat desa.
            </p>
            <span class="about-link">Baca Selengkapnya →</span>
        </a>

        {{-- SAYA --}}
        <a href="{{ route('tentang.saya') }}" class="about-card">
            <div class="about-profile">
                <img src="{{ asset('assets/images/developer.jpg') }}" alt="Foto Saya">
            </div>
            <h3>Tentang Saya</h3>
            <p>
                Profil singkat pengembang SiPAWA dan latar
                belakang pembuatannya.
            </p>
            <span class="about-link">Lihat Profil →</span>
        </a>

        {{-- KONTAK --}}
        <a href="{{ route('tentang.kontak') }}" class="about-card">
            <div class="about-icon">📬</div>
            <h3>Hubungi Saya</h3>
            <p>
                Terhubung langsung melalui WhatsApp,
                Instagram, Facebook.
            </p>
            <span class="about-link">Hubungi →</span>
        </a>

    </div>
</section>

@endsection
