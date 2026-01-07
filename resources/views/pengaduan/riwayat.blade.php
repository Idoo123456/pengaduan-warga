@extends('layouts.main')

@section('title', 'Riwayat Pengaduan')

@section('content')

    <style>
        /* ================= PAGE ================= */
        .riwayat-page {
            padding: 60px 24px 100px;
            background: #f4f7fb;
        }

        /* ================= HEADER ================= */
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

        /* ================= GRID ================= */
        .riwayat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        /* ================= CARD ================= */
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

        .riwayat-card h3 {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .riwayat-card p {
            font-size: 14px;
            color: #64748b;
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

        .rating label {
            font-size: 22px;
            cursor: pointer;
            color: #cbd5f5;
        }

        .rating label.active {
            color: #facc15;
        }

        /* ================= COMMENT ================= */
        .comment-box textarea {
            width: 100%;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            padding: 12px;
            font-size: 14px;
            resize: none;
            margin-bottom: 12px;
        }

        /* ================= BUTTON ================= */
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

        /* ================= EMPTY ================= */
        .empty {
            grid-column: 1 / -1;
            background: #fff;
            padding: 80px 20px;
            border-radius: 28px;
            text-align: center;
        }

        /* ================= PAGINATION (MEWAH) ================= */
        .pagination-wrapper {
            margin-top: 60px;
            display: flex;
            justify-content: center;
        }

        .pagination {
            display: flex;
            gap: 10px;
        }

        .pagination li {
            list-style: none;
        }

        .pagination li a,
        .pagination li span {
            min-width: 44px;
            height: 44px;
            padding: 0 16px;
            border-radius: 999px;
            background: #ffffff;
            color: #334155;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .08);
            border: 1px solid #e5e7eb;
            transition: .25s;
        }

        .pagination li a:hover {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: #fff;
            transform: translateY(-2px);
        }

        .pagination li.active span {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: #fff;
            border: none;
        }

        .pagination li.disabled span {
            opacity: .4;
        }

        /* ================= RESPONSIVE ================= */
        @media(max-width:1000px) {
            .riwayat-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width:640px) {
            .riwayat-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="riwayat-page">

        {{-- HEADER --}}
        <div class="riwayat-header">
            <div class="riwayat-title">Riwayat Pengaduan</div>
            <a href="{{ route('pengaduan.index') }}" class="btn-back">← Kembali</a>
        </div>

        {{-- GRID --}}
        <div class="riwayat-grid">

            @forelse ($pengaduan as $p)
                <div class="riwayat-card">

                    <span class="badge-selesai">Selesai</span>

                    <h3>{{ $p->judul }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit($p->isi_pengaduan, 90) }}</p>

                    <div class="lokasi">RT {{ $p->rt }} / RW {{ $p->rw }}</div>

                    @if ($p->rating)
                        <div class="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <label class="{{ $i <= $p->rating ? 'active' : '' }}">★</label>
                            @endfor
                        </div>

                        <div class="comment-box">
                            <textarea rows="3" disabled>{{ $p->ulasan ?? 'Tidak ada komentar' }}</textarea>
                        </div>

                        <button type="button" class="btn-disabled"
                            onclick="openNotify('Anda sudah memberikan penilaian untuk pengaduan ini.')">
                            Penilaian Terkirim
                        </button>
                    @else
                        <form method="POST" action="{{ route('pengaduan.rating', $p->id) }}">
                            @csrf
                            <input type="hidden" name="rating">

                            <div class="rating" data-rating>
                                @for ($i = 1; $i <= 5; $i++)
                                    <label>★</label>
                                @endfor
                            </div>

                            <div class="comment-box">
                                <textarea name="ulasan" rows="3" placeholder="Tulis komentar untuk petugas..."></textarea>
                            </div>

                            <button type="submit" class="btn-submit">
                                Kirim Penilaian
                            </button>
                        </form>
                    @endif

                </div>
            @empty
                <div class="empty">
                    <h3>Belum ada riwayat pengaduan</h3>
                    <p>Pengaduan yang sudah selesai akan muncul di sini.</p>
                </div>
            @endforelse

        </div>

        {{-- PAGINATION --}}
        @if ($pengaduan->hasPages())
            <div class="pagination-wrapper">
                {{ $pengaduan->links('vendor.pagination.sipawa') }}

            </div>
        @endif

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
    </script>

@endsection
