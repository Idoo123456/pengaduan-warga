@extends('layouts.main')

@section('title', 'Riwayat Pengaduan')

@section('content')

    <style>
        .riwayat-page {
            padding: 60px 24px 180px;
            background: #f4f7fb;
        }

        .riwayat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .riwayat-title {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
        }

        .btn-back {
            padding: 12px 22px;
            border-radius: 999px;
            background: #e0e7ff;
            color: #3730a3;
            font-weight: 700;
            text-decoration: none;
        }

        /* ================= STATISTIK ================= */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: #fff;
            border-radius: 24px;
            padding: 28px;
            text-align: center;
            box-shadow: 0 20px 45px rgba(15, 23, 42, .08);
        }

        .stat-card h2 {
            font-size: 36px;
            margin: 0;
            color: #4f46e5;
        }

        .stat-card p {
            margin-top: 8px;
            font-weight: 700;
            color: #64748b;
        }

        /* ================= GRID ================= */
        .riwayat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .riwayat-card {
            background: #fff;
            border-radius: 26px;
            padding: 26px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, .08);
        }

        .badge-selesai {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 999px;
            background: #dcfce7;
            color: #166534;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .lokasi {
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        /* ================= RATING ================= */
        .rating {
            display: flex;
            gap: 6px;
            margin-bottom: 12px;
        }

        .rating label,
        .rating span,
        .rating button {
            font-size: 22px;
            color: #cbd5f5;
            line-height: 1;
        }

        .rating button {
            appearance: none;
            border: 0;
            background: transparent;
            padding: 0;
            cursor: pointer;
        }

        .rating label {
            cursor: pointer;
        }

        .rating label.active,
        .rating span.active,
        .rating button.active {
            color: #facc15;
        }

        .rating-hint {
            margin: -4px 0 10px;
            color: #64748b;
            font-size: 13px;
        }

        .comment-box textarea {
            width: 100%;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            padding: 12px;
            resize: none;
            margin-bottom: 12px;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            border-radius: 999px;
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: #fff;
            font-weight: 700;
            border: none;
        }

        .btn-disabled {
            width: 100%;
            padding: 12px;
            border-radius: 999px;
            background: #e5e7eb;
            color: #64748b;
            font-weight: 700;
            border: none;
        }

        .pagination-wrapper {
            margin-top: 60px;
            display: flex;
            justify-content: center;
        }

        @media(max-width:1000px) {

            .riwayat-grid,
            .stat-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width:640px) {
            .riwayat-page {
                padding: 24px 14px 48px;
            }

            .riwayat-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
                margin-bottom: 20px;
            }

            .riwayat-title {
                font-size: 24px;
                line-height: 1.2;
            }

            .btn-back {
                width: 100%;
                text-align: center;
                border-radius: 12px;
            }

            .riwayat-grid,
            .stat-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .stat-grid {
                margin-bottom: 22px;
            }

            .stat-card,
            .riwayat-card {
                padding: 20px;
                border-radius: 18px;
            }

            .stat-card h2 {
                font-size: 30px;
            }

            .comment-box textarea {
                font-size: 16px;
                border-radius: 12px;
            }

            .pagination-wrapper {
                margin-top: 32px;
                overflow-x: auto;
                justify-content: flex-start;
            }
        }
    </style>

    <div class="riwayat-page">

        <div class="riwayat-header">
            <div class="riwayat-title">Riwayat Pengaduan</div>
            <a href="{{ route('pengaduan.index') }}" class="btn-back">← Kembali</a>
        </div>

        {{-- ================= STATISTIK ================= --}}
        <div class="stat-grid">
            <div class="stat-card">
                <h2>{{ $total }}</h2>
                <p>Total Laporan</p>
            </div>
            <div class="stat-card">
                <h2>{{ $belum }}</h2>
                <p>Belum Selesai</p>
            </div>
            <div class="stat-card">
                <h2>{{ $selesai }}</h2>
                <p>Selesai</p>
            </div>
        </div>

        {{-- ================= GRID ================= --}}
        <div class="riwayat-grid">
            @foreach ($pengaduan as $p)
                <div class="riwayat-card">

                    <span class="badge-selesai">Selesai</span>

                    <h3>{{ $p->judul }}</h3>
                    <p>{{ Str::limit($p->isi_pengaduan, 90) }}</p>
                    <div class="lokasi">RT {{ $p->rt }} / RW {{ $p->rw }}</div>

                    {{-- ================= RATING ================= --}}
                    @if ($p->rating)
                        <div class="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <label class="{{ $i <= $p->rating ? 'active' : '' }}">★</label>
                            @endfor
                        </div>

                        <div class="comment-box">
                            <textarea rows="3" disabled>{{ $p->ulasan ?? 'Tidak ada komentar' }}</textarea>
                        </div>

                        <button class="btn-disabled">Penilaian Terkirim</button>
                    @else
                        <form method="POST" action="{{ route('pengaduan.rating', $p->id) }}" class="rating-form no-loading">
                            @csrf
                            <input type="hidden" name="rating" value="{{ old('rating') }}">

                            <div class="rating" data-rating>
                                @for ($i = 1; $i <= 5; $i++)
                                    <label>★</label>
                                @endfor
                            </div>

                            <div class="rating-hint">Pilih 1 sampai 5 bintang</div>

                            <div class="comment-box">
                                <textarea name="ulasan" rows="3" placeholder="Tulis komentar untuk petugas..."></textarea>
                            </div>

                            <button type="submit" class="btn-submit">
                                Kirim Penilaian
                            </button>
                        </form>
                    @endif

                </div>
            @endforeach
        </div>

        {{-- PAGINATION --}}
        <div class="pagination-wrapper">
            {{ $pengaduan->links('vendor.pagination.sipawa') }}
        </div>

    </div>

    <script>
        document.querySelectorAll('[data-rating]').forEach(rating => {
            const stars = rating.querySelectorAll('label');
            const input = rating.closest('form').querySelector('input[name="rating"]');

            stars.forEach((star, index) => {
                star.addEventListener('click', () => {
                    input.value = index + 1;
                    stars.forEach(s => s.classList.remove('active'));
                    for (let i = 0; i <= index; i++) {
                        stars[i].classList.add('active');
                    }
                });
            });
        });

        document.querySelectorAll('.rating-form').forEach(form => {
            form.addEventListener('submit', event => {
                const input = form.querySelector('input[name="rating"]');

                if (!input || !input.value) {
                    event.preventDefault();
                    if (typeof openNotify === 'function') {
                        openNotify('Pilih jumlah bintang terlebih dahulu.');
                    } else {
                        alert('Pilih jumlah bintang terlebih dahulu.');
                    }
                    return;
                }

                if (typeof showLoading === 'function') {
                    showLoading();
                }
            });
        });
    </script>

@endsection
