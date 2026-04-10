@extends('layouts.app')

@section('title', 'Daftar Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Admin</h1>
    <div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-2">Kembali ke Dashboard</a>
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Admin</a>
    </div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->username }}</td>
                <td>
                    <a href="{{ route('admin.edit', $admin) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="{{ route('admin.destroy', $admin) }}" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection