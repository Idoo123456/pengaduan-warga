@extends('layouts.main')
@section('title', 'Tentang SiPAWA')

@section('content')
    <style>
        /* ================= RESET ================= */
        * {
            box-sizing: border-box
        }

        body {
            margin: 0
        }

        /* ================= PAGE ================= */
        .about-page {
            background: #f6f8fc;
            padding: 70px 0 110px;
            font-family: 'Inter', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }

        section {
            margin-bottom: 90px
        }

        /* ================= HERO ================= */
        .hero {
            display: grid;
            grid-template-columns: 1.15fr .85fr;
            gap: 48px;
            align-items: center;
        }

        .hero h1 {
            font-size: 46px;
            font-weight: 800;
            line-height: 1.15;
            color: #0f172a;
        }

        .hero h1 span {
            color: #6366f1
        }

        .hero p {
            margin-top: 18px;
            font-size: 16px;
            color: #64748b;
            line-height: 1.9;
            max-width: 560px;
        }

        .hero-actions {
            margin-top: 36px;
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
            align-items: center;

        }

        .btn-primary {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
            padding: 14px 36px;
            border-radius: 999px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 18px 40px rgba(79, 70, 229, .35);

            /* 🔥 PENTING */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: auto;
            /* jangan full */
            min-width: unset;
            /* reset */
        }

        .btn-outline {
            padding: 14px 30px;
            border-radius: 999px;
            border: 2px solid #c7d2fe;
            text-decoration: none;
            font-weight: 600;
            color: #4f46e5;
        }

        /* INFO CARD */
        .info-card {
            background: #fff;
            border-radius: 30px;
            padding: 44px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, .08);
        }

        .info-card h3 {
            font-size: 20px;
            margin-bottom: 14px;
        }

        .info-card p {
            color: #64748b;
            line-height: 1.8;
        }

        /* ================= METRICS ================= */
        .metrics {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 26px;
            margin-top: -10px;
        }

        .metric {
            background: #fff;
            padding: 34px;
            border-radius: 26px;
            text-align: center;
            box-shadow: 0 24px 50px rgba(0, 0, 0, .08);
        }

        .metric h2 {
            font-size: 30px;
            color: #6366f1;
            margin-bottom: 6px;
        }

        .metric p {
            font-size: 14px;
            color: #64748b;
        }

        /* ================= FEATURES ================= */
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 34px;
            font-weight: 800;
        }

        .section-title p {
            color: #64748b;
            margin-top: 10px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .feature {
            background: #fff;
            padding: 34px;
            border-radius: 26px;
            box-shadow: 0 24px 50px rgba(0, 0, 0, .08);
        }

        /* ================= STEPS (DIPERBAIKI) ================= */
        .steps {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .step {
            background: #fff;
            padding: 36px;
            border-radius: 28px;
            box-shadow: 0 24px 60px rgba(0, 0, 0, .08);
            position: relative;
            overflow: hidden;
        }

        .step::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            opacity: .06;
        }

        .step span {
            font-size: 48px;
            font-weight: 800;
            color: #6366f1;
        }

        .step h4 {
            margin-top: 10px;
            font-size: 20px;
        }

        .step p {
            margin-top: 10px;
            color: #64748b;
            line-height: 1.8;
        }

        /* ================= DEVELOPER (SPECIAL CARD) ================= */
        .developer {
            background: linear-gradient(135deg, #ffffff, #eef2ff);
            padding: 70px;
            border-radius: 40px;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 50px;
            align-items: center;
            box-shadow: 0 50px 120px rgba(79, 70, 229, .25);
            position: relative;
        }

        .developer::after {
            content: "";
            position: absolute;
            bottom: -140px;
            right: -140px;
            width: 300px;
            height: 300px;
            background: rgba(99, 102, 241, .12);
            border-radius: 50%;
        }

        .dev-photo {
            width: 260px;
            height: 260px;
            border-radius: 50%;
            object-fit: cover;
            border: 8px solid #fff;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .25);
        }

        .developer h3 {
            font-size: 36px;
            margin: 0;
        }

        .dev-role {
            margin-top: 6px;
            color: #6366f1;
            font-weight: 600;
        }

        .developer p {
            margin-top: 16px;
            color: #475569;
            line-height: 1.9;
            max-width: 640px;
        }

        .dev-actions {
            margin-top: 28px;
            display: flex;
            gap: 16px;
        }

        .dev-btn {
            padding: 14px 32px;
            border-radius: 999px;
            background: #0f172a;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .dev-btn.outline {
            background: transparent;
            color: #0f172a;
            border: 2px solid #0f172a;
        }

        /* ================= RESPONSIVE ================= */
        @media(max-width:992px) {

            .hero,
            .metrics,
            .feature-grid,
            .steps,
            .developer {
                grid-template-columns: 1fr;
            }

            .developer {
                text-align: center;
            }

            .dev-actions {
                justify-content: center;
            }
        }
    </style>

    <div class="about-page">
        <div class="container">

            <!-- HERO -->
            <section class="hero">
                <div>
                    <h1>Sampaikan Aspirasi dan <br>Pengaduan Warga <span>Secara Mudah</span></h1>
                    <p>
                        SiPAWA adalah sistem pengaduan warga berbasis web yang membantu
                        masyarakat menyampaikan laporan, keluhan, dan aspirasi secara
                        online dengan transparan dan cepat.
                    </p>
                    <div class="hero-actions">
                        <a href="{{ route('pengaduan.create') }}" class="btn-primary">Ajukan Pengaduan</a>
                        <a href="{{ route('pengaduan.index') }}" class="btn-outline">Lihat Pengaduan</a>
                    </div>
                </div>

                <div class="info-card">
                    <h3>Kenapa SiPAWA?</h3>
                    <p>
                        Tidak perlu datang ke kantor desa. Semua laporan tercatat rapi,
                        memiliki status, dan dapat dipantau secara real-time.
                    </p>
                </div>
            </section>

            <!-- METRICS -->
            <section class="metrics">
                <div class="metric">
                    <h2>Online</h2>
                    <p>Tanpa batas waktu</p>
                </div>
                <div class="metric">
                    <h2>Real-Time</h2>
                    <p>Status Pengaduan</p>
                </div>
                <div class="metric">
                    <h2>Aman</h2>
                    <p>Data Tersimpan</p>
                </div>
                <div class="metric">
                    <h2>Mudah</h2>
                    <p>Tanpa Tatap Muka</p>
                </div>
            </section>

            <!-- FEATURES -->
            <section>
                <div class="section-title">
                    <h2>Fitur Unggulan</h2>
                    <p>Solusi pengaduan warga modern dan efisien</p>
                </div>

                <div class="feature-grid">
                    <div class="feature">
                        <h4>📋 Manajemen Laporan</h4>
                        <p>Laporan tersimpan rapi dan mudah ditelusuri.</p>
                    </div>
                    <div class="feature">
                        <h4>🔍 Transparansi</h4>
                        <p>Status pengaduan dapat dipantau warga.</p>
                    </div>
                    <div class="feature">
                        <h4>⚡ Respons Cepat</h4>
                        <p>Mendukung tindak lanjut lebih cepat.</p>
                    </div>
                </div>
            </section>

            <!-- STEPS -->
            <section>
                <div class="section-title">
                    <h2>Langkah Pengaduan</h2>
                    <p>Mudah, cepat, dan terstruktur</p>
                </div>

                <div class="steps">
                    <div class="step"><span>01</span>
                        <h4>Isi Form</h4>
                        <p>Lengkapi data dan keluhan Anda.</p>
                    </div>
                    <div class="step"><span>02</span>
                        <h4>Diproses</h4>
                        <p>Laporan diverifikasi oleh petugas.</p>
                    </div>
                    <div class="step"><span>03</span>
                        <h4>Selesai</h4>
                        <p>Status dapat dipantau hingga selesai.</p>
                    </div>
                </div>
            </section>

            <!-- DEVELOPER -->
            <section>
                <div class="developer">
                    <img src="{{ asset('assets/images/developer.jpg') }}" class="dev-photo">
                    <div>
                        <h3>Mido Herdiansyah</h3>
                        <div class="dev-role">Developer SiPAWA</div>
                        <p>
                            Mahasiswa Sistem Informasi yang mengembangkan SiPAWA sebagai solusi
                            digital pengaduan warga dengan fokus pada desain modern dan
                            pengalaman pengguna yang nyaman.
                        </p>
                        <div class="dev-actions">
                            <a href="{{ route('developer') }}" class="dev-btn">
                                Portfolio
                            </a>

                            <a href="{{ route('developer') }}#kontak" class="dev-btn outline">
                                Kontak
                            </a>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection
