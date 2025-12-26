@extends('layouts.main')

@section('title', 'Beranda')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="hero-section">
    <video class="hero-video" autoplay muted loop playsinline>
        <source src="{{ asset('assets/images/istock.mp4') }}" type="video/mp4">
    </video>

    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1>
            Selamat Datang di <span>SiPAWA</span>
        </h1>
        <p>
            Sistem Pengaduan Warga yang modern, cepat, dan transparan.
        </p>
        <a href="{{ route('pengaduan.create') }}" class="btn-hero">
            Ajukan Pengaduan

        </a>
    </div>
</section>


{{-- ================= LAYANAN ================= --}}
<section class="service-section">
    <div class="container">
        <h2 class="section-title">Layanan Kami</h2>

        <div class="service-cards">
            <div class="service-card">
                <div class="icon">📢</div>
                <h4>Pengaduan Online</h4>
                <p>Sampaikan keluhan tanpa harus datang ke kantor desa.</p>
            </div>

            <div class="service-card">
                <div class="icon">⚡</div>
                <h4>Proses Cepat</h4>
                <p>Pengaduan diproses secara cepat dan terstruktur.</p>
            </div>

            <div class="service-card">
                <div class="icon">🔒</div>
                <h4>Aman & Transparan</h4>
                <p>Data pengaduan tersimpan aman dan dapat dipantau.</p>
            </div>
        </div>
    </div>
</section>

{{-- ================= ALUR ================= --}}
<section class="flow-section">
    <div class="container">
        <h2 class="section-title">Alur Pengaduan</h2>

        <div class="flow-steps">
            <div class="flow-step">
                <span>1</span>
                <h5>Isi Form</h5>
                <p>Lengkapi data dan keluhan Anda.</p>
            </div>

            <div class="flow-step">
                <span>2</span>
                <h5>Verifikasi Admin</h5>
                <p>Laporan diverifikasi oleh admin.</p>
            </div>

            <div class="flow-step">
                <span>3</span>
                <h5>Tindak Lanjut</h5>
                <p>Pengaduan ditindaklanjuti.</p>
            </div>

            <div class="flow-step">
                <span>4</span>
                <h5>Selesai</h5>
                <p>Pengaduan selesai dan dilaporkan.</p>
            </div>
        </div>
    </div>
</section>

{{-- ================= CTA ================= --}}
<!-- CTA SECTION -->
{{-- CALL TO ACTION SECTION --}}
<section class="cta-section">
    <div class="cta-container">
        <h2>Punya Keluhan atau Aspirasi?</h2>
        <p>
            Gunakan <strong>SiPAWA</strong> sekarang dan sampaikan aspirasi Anda
            dengan mudah, aman, dan transparan.
        </p>

        <a href="{{ route('pengaduan.create') }}" class="btn-cta">
            Mulai Pengaduan
        </a>
    </div>
</section>


@endsection
