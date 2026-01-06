@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
<section class="hero-modern">
    <div class="container hero-grid">

        {{-- LEFT --}}
        <div class="hero-content">
            <span class="hero-badge">Platform Aspirasi Warga Desa</span>

            <h1>
                Sampaikan Aspirasi <br>
                dan Pengaduan Warga <br>
                <span>Secara Mudah</span>
            </h1>

            <p>
                SiPAWA membantu masyarakat desa menyampaikan laporan,
                keluhan, dan aspirasi secara online dengan transparan
                dan cepat.
            </p>

            <div class="hero-actions">
                <a href="{{ auth()->check() ? route('pengaduan.index') : route('login') }}"
                   class="btn-hero-primary">
                    Ajukan Pengaduan
                </a>

                <a href="{{ route('tentang') }}" class="btn-hero-outline">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="hero-visual">
            <div class="hero-bg-gradient"></div>
            <img src="{{ asset('assets/images/hero.png') }}"
                 alt="Warga Desa"
                 class="hero-img">
        </div>

    </div>
</section>
@endsection
