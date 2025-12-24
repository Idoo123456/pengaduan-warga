@extends('layouts.main')

@section('title','Beranda')
@section('body-class','page-home')

@section('content')

<section class="hero-video">
    <video autoplay muted loop playsinline class="hero-bg-video">
        <source src="{{ asset('assets/images/istock.mp4') }}" type="video/mp4">
    </video>

    <div class="hero-overlay"></div>

    <div class="hero-content">
        <span class=></span>
        <h1>Selamat Datang di <span>SiPAWA</span></h1>
        <p>
            Sampaikan aspirasi, keluhan, dan laporan Anda secara online
            dengan mudah, cepat, dan transparan.
        </p>

        <a href="{{ url('pengaduan') }}" class="hero-btn">
            Ajukan Pengaduan
        </a>
    </div>
</section>


<section class="info-section">
    <h2 class="info-title">Layanan Kami</h2>

    <div class="info-grid">
        <div class="info-card">
            <h4>Pengaduan Online</h4>
            <p>Laporkan masalah kapan saja.</p>
        </div>
        <div class="info-card">
            <h4>Transparan</h4>
            <p>Proses terbuka dan jelas.</p>
        </div>
        <div class="info-card">
            <h4>Tindak Lanjut</h4>
            <p>Ditangani pihak berwenang.</p>
        </div>
    </div>
</section>

@endsection
