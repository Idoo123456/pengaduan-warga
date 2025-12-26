@extends('layouts.main')

@section('title', 'Tentang | SiPAWA')

@section('content')

<section class="about-hero">
    <div class="container">
        <h1>Tentang <span>SiPAWA</span></h1>
        <p>Sistem Pengaduan Warga berbasis web yang modern, cepat, dan transparan.</p>
    </div>
</section>

<section class="about-section">
    <div class="container about-grid">

        {{-- ABOUT WEBSITE --}}
        <div class="about-card">
            <h3>📌 Tentang Website</h3>
            <p>
                SiPAWA dibuat untuk mempermudah warga dalam menyampaikan aspirasi,
                keluhan, dan laporan secara online tanpa harus datang ke kantor desa.
            </p>
        </div>

        {{-- ABOUT ME --}}
        <div class="about-card about-me">
            <img src="{{ asset('assets/images/developer.jpg') }}" alt="Foto Saya">
            <div>
                <h3>👤 Tentang Saya</h3>
                <p>
                    Saya adalah mahasiswa Sistem Informasi yang membangun SiPAWA
                    sebagai proyek pembelajaran web dengan fokus UI modern
                    dan pengalaman pengguna.
                </p>
            </div>
        </div>

        {{-- CONTACT --}}
        <div class="about-card">
            <h3>📬 Hubungi Saya</h3>
            <div class="social-links">
                <a href="https://wa.me/+6283862327274" target="_blank">📱 WhatsApp</a>
                <a href="https://www.instagram.com/midohrdnsyh_?igsh=ajR0aW4yYmd6MTFj" target="_blank">📸 Instagram</a>
                <a href="https://www.facebook.com/mido.mas.18" target="_blank">📘 Facebook</a>
                <a href="mido24si@mahasiswa.pcr.ac.id">✉️ Email</a>
            </div>
        </div>

    </div>
</section>

@endsection
