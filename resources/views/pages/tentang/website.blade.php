@extends('layouts.main')

@section('title', 'Tentang Website')

@section('content')
<section class="about-page">
    <div class="about-container">

        <div class="about-card">
            <h1>Tentang Website</h1>
            <p>
                <strong>SiPAWA</strong> adalah Sistem Pengaduan Warga berbasis web
                yang dirancang untuk mempermudah masyarakat dalam menyampaikan
                aspirasi, keluhan, dan laporan secara online tanpa harus datang
                langsung ke kantor desa.
            </p>

            <div class="about-grid">
                <div class="about-box">
                    <h4>🎯 Tujuan</h4>
                    <p>Meningkatkan pelayanan publik yang cepat dan transparan.</p>
                </div>

                <div class="about-box">
                    <h4>⚙️ Fitur</h4>
                    <p>Pengaduan online, pelacakan status, dan notifikasi.</p>
                </div>

                <div class="about-box">
                    <h4>🔒 Keamanan</h4>
                    <p>Data tersimpan aman dan hanya diakses pihak berwenang.</p>
                </div>
            </div>

            <a href="{{ route('tentang') }}" class="btn-back">← Kembali</a>
        </div>

    </div>
</section>
@endsection
