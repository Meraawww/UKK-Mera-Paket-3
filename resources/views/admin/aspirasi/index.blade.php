@extends('layouts.admin')

@section('title', 'Daftar Semua Aspirasi - Admin Dashboard')

@push('styles')
<style>
    /* Page Header */
    .page-header {
        margin-bottom: 30px;
    }

    .page-title {
        font-size: 28px;
        font-weight: 700;
        color: #2d3436;
        margin-bottom: 8px;
    }

    .page-subtitle {
        font-size: 14px;
        color: #6c7d92;
    }

    /* Filter Section */
    .filter-section {
        background: white;
        border-radius: 8px;
        border: 1px solid #e0e6ed;
        padding: 20px;
        margin-bottom: 25px;
    }

    .filter-row {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr auto;
        gap: 15px;
        align-items: flex-end;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
    }

    .filter-label {
        font-size: 11px;
        font-weight: 600;
        color: #6c7d92;
        text-transform: uppercase;
        margin-bottom: 8px;
        letter-spacing: 0.5px;
    }

    .filter-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e0e6ed;
        border-radius: 6px;
        font-size: 13px;
        font-family: inherit;
        transition: border-color 0.3s ease;
    }

    .filter-control:focus {
        outline: none;
        border-color: #0052cc;
        box-shadow: 0 0 0 2px rgba(0, 82, 204, 0.1);
    }

    .btn-filter {
        background-color: #0052cc;
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: background-color 0.3s ease;
        white-space: nowrap;
    }

    .btn-filter:hover {
        background-color: #003ba3;
        color: white;
        text-decoration: none;
    }

    /* Table Container */
    .table-container {
        background: white;
        border-radius: 8px;
        border: 1px solid #e0e6ed;
        overflow: hidden;
        margin-bottom: 25px;
    }

    .table-header {
        padding: 20px;
        border-bottom: 1px solid #e0e6ed;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-title {
        font-size: 16px;
        font-weight: 600;
        color: #2d3436;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background-color: #f5f7fa;
    }

    th {
        padding: 15px 20px;
        text-align: left;
        font-weight: 600;
        font-size: 11px;
        color: #6c7d92;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid #e0e6ed;
    }

    td {
        padding: 15px 20px;
        border-bottom: 1px solid #e0e6ed;
        font-size: 13px;
        color: #2d3436;
    }

    tbody tr:hover {
        background-color: #f9fafb;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    .id-cell {
        font-weight: 600;
        color: #0052cc;
    }

    .siswa-cell {
        font-weight: 600;
        color: #2d3436;
    }

    .siswa-nis {
        font-size: 12px;
        color: #6c7d92;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
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

    .kategori-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 11px;
        background-color: #f0f4f9;
        color: #0052cc;
        font-weight: 600;
    }

    .btn-update {
        background-color: #0052cc;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        font-size: 12px;
        transition: background-color 0.3s ease;
    }

    .btn-update:hover {
        background-color: #003ba3;
        color: white;
        text-decoration: none;
    }

    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        gap: 5px;
        padding: 20px;
        font-size: 12px;
    }

    .pagination-wrapper a,
    .pagination-wrapper span {
        padding: 8px 11px;
        border-radius: 4px;
        border: 1px solid #e0e6ed;
        color: #0052cc;
        text-decoration: none;
        font-weight: 500;
    }

    .pagination-wrapper span.active {
        background-color: #0052cc;
        color: white;
        border-color: #0052cc;
    }

    .pagination-wrapper a:hover {
        background-color: #f0f4f9;
    }

    /* Stats Cards */
    .stats-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .stat-card {
        background: linear-gradient(135deg, #0052cc 0%, #0041a3 100%);
        color: white;
        border-radius: 8px;
        padding: 25px;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        right: -20px;
        top: -20px;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .stat-card-content {
        position: relative;
        z-index: 1;
    }

    .stat-label {
        font-size: 13px;
        opacity: 0.9;
        margin-bottom: 10px;
        font-weight: 500;
    }

    .stat-number {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .stat-change {
        font-size: 12px;
        opacity: 0.85;
    }

    .stat-change.positive {
        color: #d4edda;
    }

    /* Alert */
    .alert {
        padding: 12px 16px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6c7d92;
    }

    .empty-state-icon {
        font-size: 48px;
        margin-bottom: 15px;
    }

    .empty-state-text {
        font-size: 14px;
    }

    @media (max-width: 1200px) {
        .filter-row {
            grid-template-columns: repeat(2, 1fr);
        }

        .btn-filter {
            grid-column: 1 / -1;
        }

        .stats-cards {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Daftar Semua Aspirasi</h1>
    <p class="page-subtitle">Kelola dan tinjau semua pengaduan fasilitas dari siswa secara real-time.</p>
</div>

<!-- Filter Section -->
<form method="GET" action="{{ route('admin.aspirasi.index') }}" class="filter-section">
    <div class="filter-row">
        <div class="filter-group">
            <label class="filter-label">Per Tanggal</label>
            <input type="date" name="tanggal" class="filter-control" value="{{ request('tanggal') }}">
        </div>

        <div class="filter-group">
            <label class="filter-label">Per Bulan</label>
            <select name="bulan" class="filter-control">
                <option value="">-- Pilih Bulan --</option>
                <option value="01" @if(request('bulan') == '01') selected @endif>Januari</option>
                <option value="02" @if(request('bulan') == '02') selected @endif>Februari</option>
                <option value="03" @if(request('bulan') == '03') selected @endif>Maret</option>
                <option value="04" @if(request('bulan') == '04') selected @endif>April</option>
                <option value="05" @if(request('bulan') == '05') selected @endif>Mei</option>
                <option value="06" @if(request('bulan') == '06') selected @endif>Juni</option>
                <option value="07" @if(request('bulan') == '07') selected @endif>Juli</option>
                <option value="08" @if(request('bulan') == '08') selected @endif>Agustus</option>
                <option value="09" @if(request('bulan') == '09') selected @endif>September</option>
                <option value="10" @if(request('bulan') == '10') selected @endif>Oktober</option>
                <option value="11" @if(request('bulan') == '11') selected @endif>November</option>
                <option value="12" @if(request('bulan') == '12') selected @endif>Desember</option>
            </select>
        </div>

        <div class="filter-group">
            <label class="filter-label">Per Siswa</label>
            <input type="text" name="siswa" class="filter-control" placeholder="Nama/NIS..." value="{{ request('siswa') }}">
        </div>

        <div class="filter-group">
            <label class="filter-label">Per Kategori</label>
            <select name="kategori" class="filter-control">
                <option value="">Semua Kategori</option>
                @php
                    $kategoris = \App\Models\Kategori::all();
                @endphp
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id_kategori }}" @if(request('kategori') == $kategori->id_kategori) selected @endif>
                        {{ $kategori->ket_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-filter">
            <i class="fas fa-check"></i> Terapkan
        </button>
    </div>
</form>

@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    </div>
@endif

<!-- Table -->
<div class="table-container">
    <div class="table-header">
        <span class="table-title">Data Aspirasi Terbaru</span>
    </div>

    @if($aspirasis->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIS / Siswa</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aspirasis as $aspirasi)
                    @php
                        $inputAspirasi = $aspirasi->inputAspirasi;
                        $siswa = $inputAspirasi?->siswa;
                        $namaSiswa = $siswa->nama_siswa ?? null;
                    @endphp
                    <tr>
                        <td><span class="id-cell">#ASP-{{ str_pad($aspirasi->id_aspirasi, 4, '0', STR_PAD_LEFT) }}</span></td>
                        <td>
                            <div class="siswa-cell">{{ $namaSiswa ?: ($siswa->nis ?? 'N/A') }}</div>
                            <div class="siswa-nis">{{ $siswa->nis ?? 'N/A' }}</div>
                        </td>
                        <td><span class="kategori-badge">{{ $aspirasi->kategori->ket_kategori ?? '-' }}</span></td>
                        <td>{{ $aspirasi->created_at->format('d M Y') }}</td>
                        <td>{{ $inputAspirasi ? $inputAspirasi->lokasi : '-' }}</td>
                        <td>{{ Str::limit($inputAspirasi ? $inputAspirasi->ket : $aspirasi->feedback, 40) ?? '-' }}</td>
                        <td><span class="status-badge status-{{ $aspirasi->status }}">{{ ucfirst($aspirasi->status) }}</span></td>
                        <td>
                            <a href="{{ route('admin.aspirasi.edit', $aspirasi) }}" class="btn-update">Update</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination-wrapper">
            {{ $aspirasis->links() }}
        </div>
    @else
        <div class="empty-state">
            <div class="empty-state-icon">📭</div>
            <p class="empty-state-text">Belum ada data aspirasi dari siswa. Gunakan filter dan coba lagi.</p>
        </div>
    @endif
</div>

<!-- Statistics Cards -->
<div class="stats-cards">
    <div class="stat-card">
        <div class="stat-card-content">
            <div class="stat-label">Total Aspirasi</div>
            <div class="stat-number">{{ \App\Models\Aspirasi::count() }}</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up"></i> +25% dari bulan lalu
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-content">
            <div class="stat-label">Rata-rata Respon</div>
            <div class="stat-number">1.5<span style="font-size: 20px;">Hari</span></div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-down"></i> -10% lebih cepat
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-content">
            <div class="stat-label">Paling Sering Dilaporkan</div>
            @php
                $mostReportedCategory = \App\Models\Kategori::withCount('aspirasis')
                    ->orderByDesc('aspirasis_count')
                    ->first();
            @endphp
            <div class="stat-number" style="font-size: 24px;">{{ $mostReportedCategory ? $mostReportedCategory->ket_kategori : 'N/A' }}</div>
            <div class="stat-change positive">
                {{ $mostReportedCategory ? $mostReportedCategory->aspirasis_count . ' laporan' : '0 laporan' }}
            </div>
        </div>
    </div>
</div>

@endsection
