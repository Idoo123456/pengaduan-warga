@extends('layouts.main')
@section('title','Edit Pengaduan')

@section('content')
<style>
.page{
    background:linear-gradient(180deg,#f8fafc,#eef2ff);
    padding:90px 24px;
}
.card{
    max-width:920px;
    margin:auto;
    background:#fff;
    border-radius:36px;
    padding:60px;
    box-shadow:0 50px 120px rgba(79,70,229,.25);
}
.header{
    margin-bottom:40px;
}
.header h2{
    font-size:32px;
    margin:0;
}
.header p{
    color:#64748b;
}
.group{margin-bottom:26px}
label{
    font-weight:600;
    font-size:14px;
    display:block;
    margin-bottom:8px;
}
input,select,textarea{
    width:100%;
    padding:16px 18px;
    border-radius:20px;
    border:1px solid #e5e7eb;
    font-size:14px;
}
textarea{min-height:160px}
.grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;
}
.photo-box{
    background:#f1f5f9;
    border-radius:26px;
    padding:26px;
    text-align:center;
}
.photo-box img{
    max-width:100%;
    border-radius:18px;
    margin-bottom:14px;
}
.photo-actions{
    display:flex;
    justify-content:center;
    gap:14px;
    margin-top:10px;
}
.btn-danger{
    background:#fee2e2;
    color:#991b1b;
    border:none;
    padding:12px 20px;
    border-radius:14px;
    font-weight:600;
}
.actions{
    margin-top:50px;
    display:flex;
    gap:16px;
}
.btn-main{
    flex:1;
    background:#6366f1;
    color:#fff;
    padding:18px;
    border-radius:22px;
    border:none;
    font-weight:700;
}
.btn-back{
    padding:18px 30px;
    border-radius:22px;
    border:1px solid #6366f1;
    color:#6366f1;
    text-decoration:none;
    font-weight:600;
}
@media(max-width:900px){
    .card{padding:40px}
}
</style>

<div class="page">
<div class="card">

<div class="header">
    <h2>Edit Pengaduan</h2>
    <p>Perbarui laporan Anda jika ada perubahan</p>
</div>

<form method="POST" action="{{ route('pengaduan.update',$pengaduan->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="group">
<label>Judul Pengaduan</label>
<input name="judul" value="{{ $pengaduan->judul }}">
</div>

<div class="group">
<label>Kategori</label>
<select name="kategori_pengaduan_id">
@foreach($kategori as $k)
<option value="{{ $k->id }}" {{ $pengaduan->kategori_pengaduan_id==$k->id?'selected':'' }}>
{{ $k->nama }}
</option>
@endforeach
</select>
</div>

<div class="group">
<label>Isi Pengaduan</label>
<textarea name="isi_pengaduan">{{ $pengaduan->isi_pengaduan }}</textarea>
</div>

<div class="group">
<label>Jalan</label>
<input name="jalan" value="{{ $pengaduan->jalan }}">
</div>

<div class="grid">
<div class="group">
<label>RT</label>
<input name="rt" value="{{ $pengaduan->rt }}">
</div>
<div class="group">
<label>RW</label>
<input name="rw" value="{{ $pengaduan->rw }}">
</div>
</div>

{{-- FOTO --}}
<div class="group">
<label>Foto Pengaduan</label>
<div class="photo-box">
@if($pengaduan->foto)
    <img src="{{ asset('storage/'.$pengaduan->foto) }}">
    <div class="photo-actions">
        <label class="btn-main" style="padding:12px 20px;cursor:pointer">
            Ganti Foto
            <input type="file" name="foto" hidden>
        </label>
        <button name="hapus_foto" value="1" class="btn-danger"
            onclick="return confirm('Hapus foto ini?')">
            Hapus Foto
        </button>
    </div>
@else
    <p style="color:#64748b">Tidak ada foto</p>
    <input type="file" name="foto">
@endif
</div>
</div>

<div class="actions">
<a href="{{ route('pengaduan.show',$pengaduan->id) }}"
   class="btn-back"
   onclick="event.preventDefault(); openConfirm('Apakah Anda yakin untuk kembali? Perubahan yang belum disimpan akan hilang.', () => window.location='{{ route('pengaduan.show',$pengaduan->id) }}')">
    Batal
</a>
<button type="button" class="btn-main" onclick="confirmUpdate()">Simpan Perubahan</button>
</div>

</form>
</div>
</div>

<script>
function confirmUpdate() {
    if (window.confirm('Simpan perubahan pada pengaduan ini?')) {
        // Tampilkan loading jika tersedia
        const pageLoading = document.getElementById('pageLoading');
        if (pageLoading) {
            pageLoading.classList.add('show');
        }

        // Submit form
        setTimeout(() => {
            document.querySelector('form').submit();
        }, 200);
    }
}
</script>
@endsection
