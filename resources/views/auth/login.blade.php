@extends('layouts.app')

@section('no-navbar', true)
@section('body-class', 'login-page')
@section('main-class', 'p-0')
@section('title', 'Login')

@push('styles')
<style>
    body.login-page {
        background: #f8fafc;
    }
    .login-header-bar {
        background: transparent;
        padding: 28px 32px 0;
    }
    .login-header-bar .brand {
        font-weight: 700;
        letter-spacing: .02em;
        color: #0f172a;
    }
    .login-header-bar .brand span {
        color: #2563eb;
    }
    .login-header-bar .nav-links {
        gap: 24px;
    }
    .login-main {
        min-height: calc(100vh - 88px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .login-card {
        border: none;
        border-radius: 28px;
        box-shadow: 0 30px 80px rgba(15, 23, 42, 0.08);
        overflow: hidden;
    }
    .login-card-body {
        padding: 42px 38px;
    }
    .login-title {
        margin-bottom: 10px;
        font-size: 32px;
        font-weight: 700;
        color: #0f172a;
    }
    .login-subtitle {
        margin-bottom: 36px;
        color: #475569;
    }
    .form-control,
    .form-select {
        border-radius: 16px;
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        height: 56px;
    }
    .form-label {
        font-weight: 600;
        color: #475569;
    }
    .btn-login {
        border-radius: 16px;
        height: 56px;
        font-weight: 700;
        letter-spacing: .02em;
    }
    .login-footer {
        text-align: center;
        margin-top: 22px;
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
<div class="login-header-bar d-flex align-items-center justify-content-between">
    <div class="brand">
        <span>APLIKASI</span> SARANA SEKOLAH
    </div>
    <div class="d-none d-md-flex nav-links align-items-center text-muted">
        <a href="#" class="text-decoration-none text-muted">Dashboard</a>
        <a href="#" class="text-decoration-none text-muted">My Reports</a>
        <a href="#" class="text-decoration-none text-muted">Submit</a>
        <button class="btn btn-outline-secondary btn-sm rounded-pill px-3">Login</button>
    </div>
</div>
<div class="login-main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-8">
                <div class="card login-card">
                    <div class="login-card-body">
                        <div class="text-center mb-4">
                            <h1 class="login-title">Selamat Datang</h1>
                            <p class="login-subtitle">Silakan masuk ke akun Anda</p>
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
                                <label for="role" class="form-label">PERAN PENGGUNA</label>
                                <select id="role" name="role" class="form-select" required onchange="updatePlaceholder()">
                                    <option value="siswa" selected>Siswa</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="username" class="form-label"><span id="username-label">NIS</span></label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan NIS Anda" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">PASSWORD</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 btn-login">LOGIN</button>
                        </form>

                        <script>
                            function updatePlaceholder() {
                                const roleSelect = document.getElementById('role');
                                const usernameInput = document.getElementById('username');
                                const usernameLabel = document.getElementById('username-label');

                                if (roleSelect.value === 'admin') {
                                    usernameLabel.textContent = 'USERNAME';
                                    usernameInput.placeholder = 'Masukkan username';
                                } else {
                                    usernameLabel.textContent = 'NIS';
                                    usernameInput.placeholder = 'Masukkan NIS Anda';
                                }
                            }
                        </script>

                        <div class="login-footer">
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
