@extends('layouts.main')
@section('title', 'Kontak SiPAWA')

@section('content')
<style>
.contact-page {
    background: #f6f8fc;
    padding: 70px 0 110px;
    font-family: 'Inter', sans-serif;
}

.contact-container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 20px;
}

.contact-hero {
    display: grid;
    grid-template-columns: 1fr .9fr;
    gap: 28px;
    align-items: stretch;
}

.contact-panel,
.contact-info {
    background: #fff;
    border-radius: 28px;
    padding: 44px;
    box-shadow: 0 28px 70px rgba(15, 23, 42, .09);
}

.contact-panel h1 {
    margin: 0;
    font-size: 38px;
    line-height: 1.15;
    color: #0f172a;
}

.contact-panel p {
    margin-top: 16px;
    color: #64748b;
    line-height: 1.8;
    max-width: 560px;
}

.contact-actions {
    margin-top: 28px;
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.contact-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 48px;
    padding: 0 24px;
    border-radius: 999px;
    text-decoration: none;
    font-weight: 700;
}

.contact-btn.primary {
    background: #6366f1;
    color: #fff;
}

.contact-btn.secondary {
    background: #eef2ff;
    color: #4338ca;
}

.contact-info {
    display: grid;
    gap: 16px;
}

.contact-item {
    display: grid;
    grid-template-columns: 42px 1fr;
    gap: 14px;
    align-items: start;
    padding: 16px;
    border-radius: 18px;
    background: #f8fafc;
}

.contact-icon {
    width: 42px;
    height: 42px;
    border-radius: 14px;
    display: grid;
    place-items: center;
    background: #e0e7ff;
    color: #4338ca;
    font-weight: 800;
}

.contact-item strong {
    display: block;
    color: #0f172a;
    margin-bottom: 4px;
}

.contact-item p {
    margin: 0;
    color: #64748b;
    line-height: 1.55;
    word-break: break-word;
}

.contact-note {
    margin-top: 28px;
    background: linear-gradient(135deg, #0f172a, #1e293b);
    color: #fff;
    border-radius: 28px;
    padding: 34px 44px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
}

.contact-note h2 {
    margin: 0;
    font-size: 24px;
}

.contact-note p {
    margin: 6px 0 0;
    color: #cbd5e1;
}

@media(max-width:900px) {
    .contact-page {
        padding: 24px 0 48px;
    }

    .contact-container {
        width: 100%;
        padding: 0 14px;
    }

    .contact-hero {
        grid-template-columns: 1fr;
        gap: 14px;
    }

    .contact-panel,
    .contact-info {
        padding: 22px 18px;
        border-radius: 20px;
        box-shadow: 0 14px 34px rgba(15, 23, 42, .08);
    }

    .contact-panel {
        text-align: center;
    }

    .contact-panel h1 {
        font-size: 28px;
    }

    .contact-panel p {
        font-size: 14px;
        line-height: 1.7;
    }

    .contact-actions {
        display: grid;
        grid-template-columns: 1fr;
        gap: 10px;
        margin-top: 22px;
    }

    .contact-btn {
        width: 100%;
        border-radius: 14px;
        padding: 0 14px;
    }

    .contact-info {
        gap: 12px;
    }

    .contact-item {
        grid-template-columns: 36px 1fr;
        gap: 12px;
        padding: 14px;
        border-radius: 16px;
        text-align: left;
    }

    .contact-icon {
        width: 36px;
        height: 36px;
        border-radius: 12px;
    }

    .contact-item p {
        font-size: 13px;
    }

    .contact-note {
        margin-top: 14px;
        padding: 22px 18px;
        border-radius: 20px;
        display: grid;
        grid-template-columns: 1fr;
        text-align: center;
    }

    .contact-note h2 {
        font-size: 22px;
    }

    .contact-note p {
        font-size: 14px;
    }
}
</style>

<div class="contact-page">
    <div class="contact-container">
        <section class="contact-hero">
            <div class="contact-panel">
                <h1>Hubungi SiPAWA</h1>
                <p>
                    Gunakan kontak resmi berikut untuk bertanya tentang layanan,
                    bantuan penggunaan, atau informasi pengaduan warga.
                </p>

                <div class="contact-actions">
                    <a href="mailto:sipawa@desa.id" class="contact-btn primary">Kirim Email</a>
                    <a href="https://wa.me/6283862327274" target="_blank" class="contact-btn secondary">WhatsApp</a>
                </div>
            </div>

            <div class="contact-info">
                <div class="contact-item">
                    <div class="contact-icon">E</div>
                    <div>
                        <strong>Email</strong>
                        <p>sipawa@desa.id</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">W</div>
                    <div>
                        <strong>WhatsApp</strong>
                        <p>+62 838-6232-7274</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">A</div>
                    <div>
                        <strong>Alamat</strong>
                        <p>Kantor Desa, Pekanbaru, Riau, Indonesia</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-note">
            <div>
                <h2>Laporan tetap dikirim lewat menu pengaduan</h2>
                <p>Halaman kontak digunakan untuk bantuan dan informasi layanan.</p>
            </div>
            <a href="{{ route('pengaduan.create') }}" class="contact-btn primary">Ajukan Pengaduan</a>
        </section>
    </div>
</div>
@endsection
