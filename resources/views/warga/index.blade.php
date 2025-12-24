@extends('layouts.main')

@section('content')
<h3>Data Warga</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('warga.create') }}" class="btn btn-primary mb-3">Tambah Warga</a>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>

    @foreach($warga as $w)
    <tr>
        <td>{{ $w->nama }}</td>
        <td>{{ $w->email }}</td>
        <td>
            <a href="{{ route('warga.edit',$w->id) }}" class="btn btn-warning btn-sm">Edit</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
