@extends('layouts.admin')

@section('title', 'Dashboard Admin - Pengaduan Sarana Sekolah')

@push('styles')
<style>
    /* Stats Cards */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        border: 1px solid #e0e6ed;
        position: relative;
    }

    .stat-card-header {
        font-size: 12px;
        font-weight: 600;
        color: #6c7d92;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
    }

    .stat-card-number {
        font-size: 32px;
        font-weight: 700;
        color: #2d3436;
        margin-bottom: 5px;
    }

    .stat-card-label {
        font-size: 13px;
        color: #6c7d92;
    }

    .stat-card-icon {
        position: absolute;
        right: 20px;
        top: 20px;
        font-size: 24px;
        opacity: 0.1;
    }

    /* Main Layout - Activities and Right Sidebar */
    .dashboard-main {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 20px;
    }

    /* Activities */
    .activities-section {
        background: white;
        border-radius: 8px;
        border: 1px solid #e0e6ed;
        padding: 20px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 16px;
        font-weight: 600;
        color: #2d3436;
    }

    .section-link {
        color: #0052cc;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
    }

    .section-link:hover {
        text-decoration: underline;
    }

    .activity-list {
        list-style: none;
        padding: 0;
    }

    .activity-item {
        display: flex;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid #e0e6ed;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        min-width: 40px;
        border-radius: 6px;
        background-color: #f0f4f9;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0052cc;
        font-size: 18px;
    }

    .activity-content {
        flex: 1;
    }

    .activity-title {
        font-size: 13px;
        font-weight: 600;
        color: #2d3436;
        margin-bottom: 4px;
    }

    .activity-description {
        font-size: 12px;
        color: #6c7d92;
        line-height: 1.5;
    }

    .activity-meta {
        display: flex;
        gap: 10px;
        margin-top: 8px;
    }

    .status-badge {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 3px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-menunggu {
        background-color: #fef3cd;
        color: #856404;
    }

    .status-proses {
        background-color: #cce5ff;
        color: #004085;
    }

    .status-selesai {
        background-color: #d4edda;
        color: #155724;
    }

    .activity-time {
        font-size: 12px;
        color: #6c7d92;
    }

    /* Right Sidebar */
    .right-sidebar {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .card {
        background: white;
        border-radius: 8px;
        border: 1px solid #e0e6ed;
        padding: 20px;
    }

    .card-blue {
        background: linear-gradient(135deg, #0052cc 0%, #0041a3 100%);
        color: white;
        border: none;
    }

    .card-title {
        font-size: 16px;
        font-weight: 600;
        color: white;
        margin-bottom: 10px;
    }

    .card-description {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 15px;
        line-height: 1.5;
    }

    .card-btn {
        background: white;
        color: #0052cc;
        border: none;
        padding: 10px 16px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .card-btn:hover {
        background-color: #f0f4f9;
    }

    /* Distribution */
    .distribution-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #e0e6ed;
    }

    .distribution-item:last-child {
        border-bottom: none;
    }

    .distribution-label {
        font-size: 13px;
        color: #2d3436;
    }

    .distribution-bar {
        flex: 1;
        margin: 0 15px;
        height: 6px;
        background-color: #e0e6ed;
        border-radius: 3px;
        overflow: hidden;
    }

    .distribution-fill {
        height: 100%;
        background: linear-gradient(90deg, #0052cc, #004ba3);
        border-radius: 3px;
    }

    .distribution-percent {
        font-size: 13px;
        font-weight: 600;
        color: #2d3436;
        min-width: 35px;
        text-align: right;
    }

    /* Tip Card */
    .tip-card {
        background: #e8e4f3;
        border: none;
    }

    .tip-title {
        font-size: 14px;
        font-weight: 600;
        color: #2d3436;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
    }

    .tip-text {
        font-size: 13px;
        color: #5a5878;
        line-height: 1.5;
    }

    @media (max-width: 1200px) {
        .stats-container {
            grid-template-columns: repeat(2, 1fr);
        }

        .dashboard-main {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .stats-container {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<!-- Stats Cards -->
<div class="stats-container">
    <div class="stat-card">
        <div class="stat-card-icon">📋</div>
        <div class="stat-card-header">HARI INI</div>
        <div class="stat-card-number">{{ $todayCount }}</div>
        <div class="stat-card-label">Total Aspirasi Hari ini</div>
    </div>

    <div class="stat-card">
        <div class="stat-card-icon">⏳</div>
        <div class="stat-card-header">QUEUE</div>
        <div class="stat-card-number">{{ $queueCount }}</div>
        <div class="stat-card-label">Menunggu</div>
    </div>

    <div class="stat-card">
        <div class="stat-card-icon">⚙️</div>
        <div class="stat-card-header">ACTIVE</div>
        <div class="stat-card-number">{{ $activeCount }}</div>
        <div class="stat-card-label">Dalam Proses</div>
    </div>

    <div class="stat-card">
        <div class="stat-card-icon">✅</div>
        <div class="stat-card-header">RESOLVED</div>
        <div class="stat-card-number">{{ $resolvedCount }}</div>
        <div class="stat-card-label">Selesai</div>
    </div>
</div>

<!-- Main Layout -->
<div class="dashboard-main">
    <!-- Activities -->
    <div class="activities-section">
        <div class="section-header">
            <h3 class="section-title">Aktivitas Terkini</h3>
            <a href="#" class="section-link">Lihat Semua</a>
        </div>

        <ul class="activity-list">
            <li class="activity-item">
                <div class="activity-icon">📢</div>
                <div class="activity-content">
                    <div class="activity-title">Kerusakan AC di Ruang Kelas 10-A</div>
                    <div class="activity-description">AC tidak mengeluarkan udara dingin sejak pagi ini, membuat siswa tidak nyaman saat belajar.</div>
                    <div class="activity-meta">
                        <span class="status-badge status-menunggu">MENUNGGU</span>
                        <span class="activity-time">2 jam yang lalu</span>
                    </div>
                </div>
            </li>

            <li class="activity-item">
                <div class="activity-icon">🏀</div>
                <div class="activity-content">
                    <div class="activity-title">Ring Basket Lapangan Barat Patah</div>
                    <div class="activity-description">Terpasir saat latihan ekskul tadi sore. Membutuhkan pengelasan ulang atau penggantian unit.</div>
                    <div class="activity-meta">
                        <span class="status-badge status-proses">DALAM PROSES</span>
                        <span class="activity-time">5 jam yang lalu</span>
                    </div>
                </div>
            </li>

            <li class="activity-item">
                <div class="activity-icon">💡</div>
                <div class="activity-content">
                    <div class="activity-title">Lampu Koridor Gedung B Mati</div>
                    <div class="activity-description">Sudah diganti oleh bagian saprass. Pencahayaan sudah kembali normal.</div>
                    <div class="activity-meta">
                        <span class="status-badge status-selesai">SELESAI</span>
                        <span class="activity-time">Kemarin</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <!-- Right Sidebar -->
    <div class="right-sidebar">
        <!-- Manajemen Aspirasi Card -->
        <div class="card card-blue">
            <div class="card-title">Manajemen Aspirasi</div>
            <div class="card-description">Lihat, kelola, dan tidak lanjuti semua laporan pengaduan siswa dalam satu dashboard terintegrasi.</div>
            <a href="{{ route('admin.aspirasi.index') }}" class="card-btn" style="display: block; text-align: center;">Lihat Semua Aspirasi</a>
        </div>

        <!-- Distribution Category -->
        <div class="card">
            <h4 class="section-title" style="margin-bottom: 15px; font-size: 14px;">DISTRIBUSI KATEGORI</h4>

            @foreach($kategoris as $kategori)
                @php
                    $count = $kategori->aspirasis()->count();
                    $percent = $totalAspirasi > 0 ? round(($count / $totalAspirasi) * 100) : 0;
                @endphp
                <div class="distribution-item">
                    <div class="distribution-label">{{ $kategori->ket_kategori }}</div>
                    <div class="distribution-bar">
                        <div class="distribution-fill" style="width: {{ $percent }}%"></div>
                    </div>
                    <div class="distribution-percent">{{ $percent }}%</div>
                </div>
            @endforeach
        </div>

        <!-- Tip Admin -->
        <div class="card tip-card">
            <h4 class="tip-title">
                <i class="fas fa-lightbulb"></i>
                Tip Admin
            </h4>
            <p class="tip-text">Berikan update status secara berkala untuk meningkatkan kepuasan pelaporar.</p>
        </div>
    </div>
</div>

@push('scripts')
@endpush
@endsection
