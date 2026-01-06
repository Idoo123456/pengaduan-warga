@extends('layouts.main')
@section('title','Ajukan Pengaduan')

@section('content')
<style>
.page{
    background:linear-gradient(180deg,#f8fafc,#eef2ff);
    padding:90px 24px;
}
.card{
    max-width:900px;
    margin:auto;
    background:#fff;
    border-radius:30px;
    padding:50px;
    box-shadow:0 40px 90px rgba(0,0,0,.12);
}
.group{margin-bottom:22px}
label{font-weight:600;font-size:14px}
input,select,textarea{
    width:100%;
    padding:14px;
    border-radius:16px;
    border:1px solid #e5e7eb;
}
textarea{min-height:140px}
.grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;
}
.photo{
    border:2px dashed #c7d2fe;
    border-radius:20px;
    padding:20px;
    text-align:center;
}
.photo img{
    max-width:100%;
    border-radius:16px;
    margin-bottom:10px;
}
.actions{
    margin-top:36px;
    display:flex;
    gap:14px;
}
.btn-main{
    flex:1;
    background:#6366f1;
    color:#fff;
    padding:16px;
    border-radius:18px;
    border:none;
    font-weight:700;
}
.btn-back{
    padding:16px 28px;
    border-radius:18px;
    border:1px solid #6366f1;
    color:#6366f1;
    text-decoration:none;
}
</style>

<div class="page">
<div class="card">

<h2>Ajukan Pengaduan</h2>
<p>Isi laporan Anda dengan jelas dan lengkap</p>

<form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
@csrf

<div class="group">
    <label>Judul</label>
    <input name="judul" required>
</div>

<div class="group">
    <label>Kategori</label>
    <select name="kategori_pengaduan_id" required>
        @foreach($kategori as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
        @endforeach
    </select>
</div>

<div class="group">
    <label>Isi Pengaduan</label>
    <textarea name="isi_pengaduan" required></textarea>
</div>

<div class="grid">
    <div class="group">
        <label>RT</label>
        <input name="rt" required>
    </div>
    <div class="group">
        <label>RW</label>
        <input name="rw" required>
    </div>
</div>

<div class="group">
    <label>Foto</label>
    <div class="photo">
        <img id="preview" style="display:none">
        <input type="file" name="foto" id="foto">
    </div>
</div>

<div class="actions">
    <a href="{{ route('pengaduan.index') }}" class="btn-back">Batal</a>
    <button class="btn-main">Kirim Pengaduan</button>
</div>

</form>
</div>
</div>

<script>
foto.onchange=e=>{
    preview.src=URL.createObjectURL(e.target.files[0]);
    preview.style.display='block';
}
</script>
@endsection
