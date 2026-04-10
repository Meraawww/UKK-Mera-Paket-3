@extends('layouts.app')

@section('body-class', 'login-page')
@section('title', 'Login')

@push('styles')
<style>
    body.login-page {
        background: #f4f7fb;
    }
    .login-shell {
        min-height: calc(100vh - 0px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 0;
    }
    .login-card {
        border: none;
        border-radius: 24px;
        box-shadow: 0 24px 80px rgba(15, 23, 42, 0.08);
        overflow: hidden;
    }
    .login-card-body {
        padding: 40px 36px;
    }
    .login-header {
        margin-bottom: 32px;
    }
    .login-header h1 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .login-header p {
        color: #667085;
        margin-bottom: 0;
    }
    .form-control {
        border-radius: 16px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        height: 54px;
    }
    .form-select {
        border-radius: 16px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        height: 54px;
    }
    .btn-login {
        border-radius: 16px;
        padding: 14px 24px;
        font-weight: 700;
        letter-spacing: .02em;
    }
    .login-footer {
        text-align: center;
        margin-top: 18px;
    }
    .login-footer a {
        color: #2563eb;
        text-decoration: none;
    }
    .login-footer a:hover {
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<div class="login-shell">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card login-card">
                    <div class="login-card-body">
                        <div class="login-header text-center">
                            <h1>Selamat Datang</h1>
                            <p>Silakan masuk ke akun Anda</p>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="username" class="form-label text-uppercase text-muted small">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                            </div>
                            <div class="mb-4">
                                <label for="role" class="form-label text-uppercase text-muted small">Peran Pengguna</label>
                                <select id="role" class="form-select" disabled>
                                    <option selected>Siswa</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label text-uppercase text-muted small">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 btn-login">Login</button>
                        </form>
                        <div class="login-footer mt-4">
                            <a href="#">Lupa Password?</a>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4 text-muted small">
                    &copy; 2026 SMK - HAK CIPTA KEMENDIKBUD
                </div>
            </div>
        </div>
    </div>
</div>
@endsection