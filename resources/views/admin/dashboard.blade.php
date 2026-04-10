@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<h1>Selamat Datang di Dashboard Admin</h1>
<p>Ini adalah halaman dashboard untuk admin.</p>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Kelola Admin</h5>
                <a href="{{ route('admin.admins.index') }}" class="btn btn-primary">Lihat Admin</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Kelola Kategori</h5>
                <a href="#" class="btn btn-primary">Lihat Kategori</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Kelola Aspirasi</h5>
                <a href="#" class="btn btn-primary">Lihat Aspirasi</a>
            </div>
        </div>
    </div>
</div>
@endsection