@extends('layouts.main')
@section('title', 'Pengaduan Saya')

@section('content')
<style>
/* ===== HEADER ===== */
.pengaduan-header{
    background: linear-gradient(135deg, rgba(99,102,241,.12), #fff);
    border-radius:20px;
    padding:28px 32px;
    margin-bottom:36px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 20px 40px rgba(0,0,0,.08);
}

.pengaduan-header h1{
    margin:0;
    font-size:28px;
    font-weight:800;
    color:#0f172a;
}

.pengaduan-header p{
    margin-top:6px;
    font-size:15px;
    color:#64748b;
}

.btn-ajukan{
    background:linear-gradient(135deg,#6366f1,#4f46e5);
    color:#fff;
    padding:14px 30px;
    border-radius:999px;
    font-weight:600;
    text-decoration:none;
    box-shadow:0 12px 24px rgba(79,70,229,.35);
    transition:.25s;
}
.btn-ajukan:hover{
    transform:translateY(-2px);
}

/* ===== GRID CARD ===== */
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(300px,1fr));
    gap:24px;
}

.card{
    background:#fff;
    border-radius:22px;
    padding:24px;
    box-shadow:0 20px 40px rgba(0,0,0,.08);
    transition:.3s;
    position:relative;
}
.card:hover{
    transform:translateY(-6px);
}

.badge{
    display:inline-block;
    padding:6px 14px;
    border-radius:999px;
    font-size:12px;
    background:#dbeafe;
    color:#2563eb;
    margin-bottom:12px;
}

.card h3{
    margin:6px 0 10px;
    font-size:18px;
    font-weight:700;
}

.meta{
    font-size:14px;
    color:#6b7280;
    margin-bottom:16px;
}

.actions{
    display:flex;
    gap:10px;
}

.actions a{
    padding:8px 16px;
    border-radius:10px;
    font-size:13px;
    text-decoration:none;
    font-weight:600;
}

.btn-view{
    background:#e0e7ff;
    color:#3730a3;
}

.btn-edit{
    background:#fef3c7;
    color:#92400e;
}

/* FLASH */
.flash{
    background:#dcfce7;
    color:#166534;
    padding:14px 18px;
    border-radius:14px;
    margin-bottom:28px;
}

/* MOBILE */
@media(max-width:768px){
    .pengaduan-header{
        flex-direction:column;
        align-items:flex-start;
        gap:18px;
    }
    .btn-ajukan{
        width:100%;
        text-align:center;
    }
}
</style>

<div class="pengaduan-header">
    <div>
        <h1>Pengaduan Saya</h1>
        <p>Setiap laporan Anda membantu lingkungan menjadi lebih baik 🌱</p>
    </div>
    <a href="{{ route('pengaduan.create') }}" class="btn-ajukan">
        + Ajukan Pengaduan
    </a>
</div>

@if(session('success'))
    <div class="flash" id="flash">{{ session('success') }}</div>
    <script>
        setTimeout(()=>document.getElementById('flash')?.remove(),2500);
    </script>
@endif

<div class="grid">
    @forelse($pengaduan as $p)
        <div class="card">
            <span class="badge">{{ $p->status }}</span>
            <h3>{{ $p->judul }}</h3>
            <div class="meta">
                {{ Str::limit($p->isi_pengaduan, 80) }} <br>
                RT {{ $p->rt }} / RW {{ $p->rw }}
            </div>
            <div class="actions">
                <a href="{{ route('pengaduan.show',$p->id) }}" class="btn-view">Detail</a>
                <a href="{{ route('pengaduan.edit',$p->id) }}" class="btn-edit">Edit</a>
            </div>
        </div>
    @empty
        <p>Belum ada pengaduan.</p>
    @endforelse
</div>
@endsection
