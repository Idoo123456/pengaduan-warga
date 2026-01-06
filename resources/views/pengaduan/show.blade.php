@extends('layouts.main')

@section('title', $pengaduan->judul)

@section('content')
<style>
/* ===== PAGE ===== */
.page{
    background:#f6f8fc;
    padding:80px 0;
}

.container{
    max-width:1000px;
    margin:auto;
}

/* ===== CARD ===== */
.detail-card{
    background:#fff;
    border-radius:28px;
    padding:40px;
    box-shadow:0 40px 80px rgba(0,0,0,.1);
}

/* ===== HEADER ===== */
.detail-header{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    gap:20px;
    margin-bottom:24px;
}

.detail-header h1{
    font-size:32px;
    font-weight:800;
    margin:0;
    color:#0f172a;
}

/* ===== BADGE ===== */
.badge{
    padding:8px 18px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
    background:#dbeafe;
    color:#2563eb;
}

/* ===== CONTENT ===== */
.section{
    margin-top:28px;
}

.label{
    font-weight:700;
    font-size:14px;
    color:#475569;
    margin-bottom:6px;
}

.value{
    font-size:15px;
    color:#0f172a;
    line-height:1.7;
}

/* ===== IMAGE ===== */
.photo{
    margin-top:30px;
}

.photo img{
    width:100%;
    max-height:420px;
    object-fit:cover;
    border-radius:20px;
    box-shadow:0 20px 40px rgba(0,0,0,.12);
}

/* ===== ACTIONS ===== */
.actions{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:40px;
    gap:16px;
}

.left-actions{
    display:flex;
    gap:12px;
}

.btn{
    padding:12px 26px;
    border-radius:999px;
    font-weight:600;
    text-decoration:none;
    border:none;
    cursor:pointer;
}

.btn-primary{
    background:linear-gradient(135deg,#6366f1,#4f46e5);
    color:#fff;
    box-shadow:0 14px 28px rgba(79,70,229,.4);
}

.btn-warning{
    background:#facc15;
    color:#854d0e;
}

.btn-danger{
    background:#ef4444;
    color:#fff;
}

.btn-secondary{
    border:1px solid #cbd5f5;
    color:#4338ca;
    background:#fff;
}

/* ===== MOBILE ===== */
@media(max-width:768px){
    .detail-header{
        flex-direction:column;
        align-items:flex-start;
    }

    .actions{
        flex-direction:column-reverse;
        align-items:stretch;
    }

    .left-actions{
        flex-direction:column;
    }
}
</style>

<div class="page">
    <div class="container">

        <div class="detail-card">

            {{-- HEADER --}}
            <div class="detail-header">
                <h1>{{ $pengaduan->judul }}</h1>
                <span class="badge">{{ $pengaduan->status }}</span>
            </div>

            {{-- ISI --}}
            <div class="section">
                <div class="label">Isi Pengaduan</div>
                <div class="value">{{ $pengaduan->isi_pengaduan }}</div>
            </div>

            {{-- ALAMAT --}}
            <div class="section">
                <div class="label">Alamat</div>
                <div class="value">
                    {{ $pengaduan->jalan }},
                    RT {{ $pengaduan->rt }} / RW {{ $pengaduan->rw }}
                </div>
            </div>

            {{-- FOTO --}}
            @if($pengaduan->foto)
                <div class="photo">
                    <img src="{{ asset('storage/'.$pengaduan->foto) }}">
                </div>
            @endif

            {{-- ACTIONS --}}
            <div class="actions">

                <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">
                    ← Kembali
                </a>

                <div class="left-actions">
                    <a href="{{ route('pengaduan.edit',$pengaduan->id) }}" class="btn btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('pengaduan.destroy',$pengaduan->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            Hapus
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
