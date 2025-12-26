<form action="{{ route('pengaduan.store') }}" method="POST">
    @csrf

    {{-- ALERT ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- NAMA --}}
    <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text"
               class="form-control"
               name="nama"
               value="{{ old('nama') }}">
    </div>

    {{-- EMAIL --}}
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email"
               class="form-control"
               name="email"
               value="{{ old('email') }}">
    </div>

    {{-- JUDUL --}}
    <div class="mb-3">
        <label class="form-label">Judul Pengaduan</label>
        <input type="text"
               class="form-control"
               name="judul"
               value="{{ old('judul') }}">
    </div>

    {{-- KATEGORI --}}
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori_id" class="form-select">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($kategori as $k)
                <option value="{{ $k->kategori_id }}"
                    {{ old('kategori_id') == $k->kategori_id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- DESKRIPSI --}}
    <div class="mb-3">
        <label class="form-label">Isi Pengaduan</label>
        <textarea name="deskripsi"
                  class="form-control"
                  rows="4">{{ old('deskripsi') }}</textarea>
    </div>

    <button type="submit" class="btn-submit">
    Kirim Pengaduan
</button>

</form>
