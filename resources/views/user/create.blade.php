@extends('layouts.main')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Tambah User</h3>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('user.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text"
                   name="nama"
                   class="form-control"
                   value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password"
                   name="password"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-select">
                <option value="">-- Pilih Role --</option>
                <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role')=='user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('user.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
