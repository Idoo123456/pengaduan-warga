<div class="group">
    <label>Judul Pengaduan</label>
    <input name="judul" value="{{ old('judul',$pengaduan->judul ?? '') }}" required>
</div>

<div class="group">
    <label>Kategori</label>
    <select name="kategori_pengaduan_id" required>
        @foreach($kategori as $k)
            <option value="{{ $k->id }}"
                {{ old('kategori_pengaduan_id',$pengaduan->kategori_pengaduan_id ?? '')==$k->id?'selected':'' }}>
                {{ $k->nama }}
            </option>
        @endforeach
    </select>
</div>

<div class="group">
    <label>Isi Pengaduan</label>
    <textarea name="isi_pengaduan" required>{{ old('isi_pengaduan',$pengaduan->isi_pengaduan ?? '') }}</textarea>
</div>

<div class="grid">
    <div class="group">
        <label>RT</label>
        <input name="rt" value="{{ old('rt',$pengaduan->rt ?? '') }}" required>
    </div>
    <div class="group">
        <label>RW</label>
        <input name="rw" value="{{ old('rw',$pengaduan->rw ?? '') }}" required>
    </div>
</div>

<div class="group">
    <label>Foto</label>
    <div class="photo">
        @if(!empty($pengaduan->foto))
            <img id="preview" src="{{ asset('storage/'.$pengaduan->foto) }}">
        @else
            <img id="preview" style="display:none">
        @endif
        <input type="file" name="foto" id="foto">
    </div>
</div>
