@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('warga.store') }}">
    @csrf

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control"
               value="{{ old('nama') }}">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
               value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
