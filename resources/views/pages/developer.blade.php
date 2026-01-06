@extends('layouts.main')
@section('title', 'Developer SiPAWA')

@section('content')
    <style>
        /* ================= PAGE ================= */
        .dev-page {
            background: #f6f8fc;
            padding: 80px 0 120px;
            font-family: 'Inter', sans-serif;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 0 20px;
        }

        section {
            margin-bottom: 90px
        }

        /* ================= BACK BUTTON ================= */
        .back-wrapper {
            margin-bottom: 40px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 34px;
            border-radius: 999px;
            background: #0f172a;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 14px 30px rgba(15, 23, 42, .35);
            transition: .3s ease;
        }

        .btn-back:hover {
            background: #1e293b;
            transform: translateX(-6px);
        }

        /* ================= PROFILE ================= */
        .profile {
            background: linear-gradient(135deg, #ffffff, #eef2ff);
            border-radius: 36px;
            padding: 70px;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 50px;
            align-items: center;
            box-shadow: 0 40px 90px rgba(79, 70, 229, .25);
            position: relative;
            overflow: hidden;
        }

        .profile::after {
            content: "";
            position: absolute;
            bottom: -120px;
            right: -120px;
            width: 260px;
            height: 260px;
            background: rgba(99, 102, 241, .15);
            border-radius: 50%;
        }

        .profile img {
            width: 260px;
            height: 260px;
            border-radius: 50%;
            object-fit: cover;
            border: 8px solid #fff;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .3);
        }

        .profile h1 {
            font-size: 36px;
            margin: 0;
        }

        .role {
            color: #6366f1;
            font-weight: 600;
            margin-top: 8px;
        }

        .profile p {
            margin-top: 18px;
            color: #475569;
            line-height: 1.9;
            max-width: 650px;
        }

        /* ================= ACTIONS ================= */
        .dev-actions {
            margin-top: 26px;
        }

        .dev-btn {
            display: inline-block;
            padding: 14px 34px;
            border-radius: 999px;
            background: #0f172a;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: .3s ease;
        }

        .dev-btn:hover {
            background: #1e293b;
            transform: translateY(-2px);
        }

        /* ================= SKILLS ================= */
        .skills {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .skill {
            background: #fff;
            padding: 28px;
            border-radius: 24px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, .08);
        }

        .skill h4 {
            margin-bottom: 8px;
        }

        /* ================= CONTACT ================= */
        .contact {
            background: #0f172a;
            color: #fff;
            padding: 60px;
            border-radius: 32px;
        }

        .contact h2 {
            margin-bottom: 14px;
        }

        .contact p {
            color: #cbd5f5;
        }

        .contact a {
            display: inline-block;
            margin-top: 18px;
            padding: 14px 34px;
            border-radius: 999px;
            background: #6366f1;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        /* ================= RESPONSIVE ================= */
        @media(max-width:900px) {
            .profile {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .skills {
                grid-template-columns: 1fr;
            }
        }

        /* ================= CONTACT PRO ================= */
        .contact-pro {
            background: linear-gradient(135deg, #0f172a, #020617);
            color: #fff;
            padding: 70px;
            border-radius: 36px;
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 50px;
            box-shadow: 0 40px 90px rgba(15, 23, 42, .6);
        }

        .contact-pro h2 {
            font-size: 30px;
            margin-bottom: 14px;
        }

        .contact-pro p {
            color: #cbd5f5;
            line-height: 1.8;
            max-width: 520px;
        }

        .contact-actions {
            margin-top: 30px;
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-email,
        .btn-wa {
            padding: 14px 34px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            transition: .3s ease;
        }

        .btn-email {
            background: #6366f1;
            color: #fff;
        }

        .btn-email:hover {
            background: #4f46e5;
            transform: translateY(-2px);
        }

        .btn-wa {
            background: transparent;
            color: #fff;
            border: 2px solid #334155;
        }

        .btn-wa:hover {
            background: #1e293b;
        }

        /* RIGHT CARD */
        .contact-card {
            background: rgba(255, 255, 255, .05);
            border-radius: 28px;
            padding: 36px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .contact-item {
            display: flex;
            gap: 18px;
            align-items: flex-start;
        }

        .contact-item span {
            font-size: 22px;
        }

        .contact-item strong {
            display: block;
            margin-bottom: 4px;
        }

        .contact-item p {
            margin: 0;
            color: #cbd5f5;
            font-size: 15px;
        }

        /* RESPONSIVE */
        @media(max-width:900px) {
            .contact-pro {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .contact-actions {
                justify-content: center;
            }

            .contact-item {
                justify-content: center;
                text-align: left;
            }
        }
    </style>

    <div class="dev-page">
        <div class="container">

            <!-- BACK -->
            <div class="back-wrapper">
                <a href="{{ route('tentang') }}" class="btn-back">
                    ← Kembali ke Tentang
                </a>
            </div>

            <!-- PROFILE -->
            <section class="profile">
                <img src="{{ asset('assets/images/developer.jpg') }}" alt="Developer">

                <div>
                    <h1>Mido Herdiansyah</h1>
                    <div class="role">Developer SiPAWA</div>

                    <p>
                        Mahasiswa Sistem Informasi yang berfokus pada pengembangan aplikasi
                        berbasis web dengan pendekatan desain modern, pengalaman pengguna
                        yang nyaman, dan sistem yang mudah digunakan oleh masyarakat.
                    </p>

                    <div class="dev-actions">
                        <a href="#kontak" class="dev-btn">Kontak</a>
                    </div>
                </div>
            </section>

            <!-- SKILLS -->
            <section>
                <h2 style="margin-bottom:30px">Keahlian</h2>

                <div class="skills">
                    <div class="skill">
                        <h4>Web Development</h4>
                        <p>Laravel, PHP, MySQL</p>
                    </div>
                    <div class="skill">
                        <h4>Frontend</h4>
                        <p>HTML, CSS, JavaScript</p>
                    </div>
                    <div class="skill">
                        <h4>UI / UX</h4>
                        <p>Modern layout & clean interface</p>
                    </div>
                </div>
            </section>

            <!-- CONTACT -->
            <section id="kontak" class="contact-pro">
                <div class="contact-left">
                    <h2>Kontak Developer</h2>
                    <p>
                        Terbuka untuk diskusi, kerja sama proyek, maupun pengembangan sistem.
                        Silakan hubungi saya melalui media berikut.
                    </p>

                    <div class="contact-actions">
                        <a href="mailto:mido@email.com" class="btn-email">
                            ✉️ Kirim Email
                        </a>

                        <a href="https://wa.me/+6283862327274" target="_blank" class="btn-wa">
                            💬 WhatsApp
                        </a>
                    </div>
                </div>

                <div class="contact-card">
                    <div class="contact-item">
                        <span>📧</span>
                        <div>
                            <strong>Email</strong>
                            <p>mido24simahasiswa.pcr.ac.id</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <span>🎓</span>
                        <div>
                            <strong>Universitas</strong>
                            <p>Politeknik Caltex Riau</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <span>📍</span>
                        <div>
                            <strong>Domisili</strong>
                            <p>Pekanbaru,Riau, Indonesia</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection
