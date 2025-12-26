@extends('layouts.main')

@section('title', 'Hubungi Saya')

@section('content')

<section class="contact-page">

    <!-- Tombol Kembali -->
    <a href="{{ route('tentang') }}" class="btn-back">
        ← Kembali
    </a>

    <div class="contact-container">
        <h1>Hubungi Saya</h1>
        <p class="subtitle">
            Silakan hubungi saya melalui platform berikut
        </p>

        <div class="contact-grid">

            <a href="https://wa.me/+6283862327274" target="_blank" class="contact-card whatsapp">
                <span class="icon">📱</span>
                <div>
                    <h3>WhatsApp</h3>
                    <p>Chat langsung via WhatsApp</p>
                </div>
            </a>

            <a href="https://www.instagram.com/midohrdnsyh_?igsh=ajR0aW4yYmd6MTFj" target="_blank" class="contact-card instagram">
                <span class="icon">📷</span>
                <div>
                    <h3>Instagram</h3>
                    <p>@midohrdnsyh_</p>
                </div>
            </a>

            <a href="https://www.facebook.com/mido.mas.18" target="_blank" class="contact-card facebook">
                <span class="icon">📘</span>
                <div>
                    <h3>Facebook</h3>
                    <p>Profil Facebook</p>
                </div>
            </a>

            <a href="mido24si@mahasiswa.pcr.ac.id" class="contact-card email">
                <span class="icon">✉️</span>
                <div>
                    <h3>Email</h3>
                    <p>mido24si@mahasiswa.pcr.ac.id</p>
                </div>
            </a>

        </div>
    </div>

</section>

@endsection
