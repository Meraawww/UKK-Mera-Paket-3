<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Aspirasi - Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7fb;
            color: #111827;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 100vh;
            gap: 24px;
        }
        .sidebar {
            padding: 28px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }
        .brand {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .brand h3 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
        }
        .brand p {
            margin: 0;
            color: #6b7280;
            font-size: 13px;
        }
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 10px;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            border-radius: 16px;
            text-decoration: none;
            color: #475569;
            font-weight: 600;
            border: 1px solid transparent;
            transition: all 0.2s ease;
        }
        .sidebar-menu a.active,
        .sidebar-menu a:hover {
            background: #eff6ff;
            color: #1d4ed8;
            border-color: #dbeafe;
        }
        .sidebar-cta {
            margin-top: auto;
        }
        .sidebar-cta a {
            width: 100%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 14px 16px;
            border-radius: 16px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            font-weight: 700;
        }
        .content {
            padding: 28px 32px;
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }
        .topbar-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .topbar-logo {
            display: grid;
            place-items: center;
            width: 48px;
            height: 48px;
            border-radius: 16px;
            background: #eff6ff;
            color: #2563eb;
        }
        .topbar-title {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        .topbar-title strong {
            font-size: 16px;
        }
        .topbar-title span {
            color: #6b7280;
            font-size: 12px;
        }
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 10px 14px;
            min-width: 320px;
        }
        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            font-size: 14px;
            background: transparent;
            color: #111827;
        }
        .topbar-icon {
            color: #475569;
            font-size: 18px;
            cursor: pointer;
        }
        .profile-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #2563eb;
            display: grid;
            place-items: center;
            color: white;
            font-weight: 700;
        }
        .page-heading {
            display: flex;
            justify-content: space-between;
            gap: 24px;
            align-items: flex-start;
            margin-bottom: 24px;
        }
        .breadcrumb {
            display: inline-flex;
            gap: 6px;
            align-items: center;
            color: #6b7280;
            font-size: 13px;
        }
        .breadcrumb span {
            color: #2563eb;
            font-weight: 700;
        }
        .page-heading h1 {
            font-size: 32px;
            margin: 8px 0 0;
        }
        .page-heading p {
            margin: 10px 0 0;
            color: #6b7280;
            max-width: 640px;
        }
        .badge-block {
            display: inline-flex;
            flex-direction: column;
            align-items: flex-end;
            background: #eef2ff;
            color: #1d4ed8;
            border-radius: 18px;
            padding: 16px 18px;
            font-weight: 700;
            min-width: 140px;
            text-align: right;
        }
        .badge-block span {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #2563eb;
        }
        .badge-block strong {
            font-size: 28px;
        }
        .panel {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }
        .search-panel {
            background: white;
            border-radius: 24px;
            border: 1px solid #e5e7eb;
            padding: 24px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.05);
        }
        .search-row {
            display: grid;
            grid-template-columns: 1.5fr 1fr auto;
            gap: 16px;
            align-items: center;
        }
        .form-control,
        .form-select {
            border-radius: 16px;
            border: 1px solid #d1d5db;
            padding: 18px 20px;
            font-size: 14px;
            color: #111827;
            background: #f8fafc;
        }
        .btn-filter {
            border-radius: 16px;
            padding: 16px 20px;
            min-width: 72px;
        }
        .stats-card {
            background: #f8fafc;
            border-radius: 18px;
            padding: 18px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #e5e7eb;
        }
        .stats-card .label {
            color: #6b7280;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.08em;
        }
        .stats-card .value {
            font-size: 30px;
            font-weight: 800;
            color: #111827;
        }
        .history-table-card {
            background: white;
            border-radius: 24px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.05);
            overflow: hidden;
        }
        .history-table-card .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 28px;
            border-bottom: 1px solid #e5e7eb;
        }
        .history-table-card .header h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }
        .history-table-card .header p {
            margin: 4px 0 0;
            color: #6b7280;
            font-size: 13px;
        }
        .history-table-card table {
            width: 100%;
            border-collapse: collapse;
        }
        .history-table-card th,
        .history-table-card td {
            padding: 18px 24px;
            color: #475569;
            font-size: 14px;
            border-bottom: 1px solid #eef2f7;
        }
        .history-table-card thead th {
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-size: 12px;
            color: #6b7280;
        }
        .history-table-card tbody tr:hover {
            background: #f8fafc;
        }
        .status-chip {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }
        .status-menunggu { background: #fef3cd; color: #92400e; }
        .status-proses { background: #ede9fe; color: #5b21b6; }
        .status-selesai { background: #dcfce7; color: #166534; }
        .action-icon {
            color: #475569;
            transition: color .2s ease;
        }
        .action-icon:hover {
            color: #2563eb;
        }
        .action-button {
            border: none;
            background: transparent;
            padding: 0;
        }
        .feedback-box {
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            background: #f8fafc;
            padding: 18px;
            margin-top: 18px;
        }
        .feedback-box strong {
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #1d4ed8;
            margin-bottom: 8px;
        }
        .feedback-box p {
            margin: 0;
            color: #475569;
            line-height: 1.7;
        }
        .bottom-panel {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
            margin-top: 24px;
        }
        .highlight-card,
        .info-card {
            background: white;
            border-radius: 24px;
            border: 1px solid #e5e7eb;
            padding: 24px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.05);
        }
        .highlight-card {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 24px;
            overflow: hidden;
        }
        .highlight-card .tag {
            display: inline-flex;
            padding: 8px 14px;
            border-radius: 999px;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 16px;
        }
        .highlight-card h3 {
            margin-top: 0;
            font-size: 22px;
        }
        .highlight-card p {
            color: #475569;
            line-height: 1.7;
            margin-bottom: 22px;
        }
        .highlight-card img {
            width: 100%;
            border-radius: 20px;
            object-fit: cover;
            min-height: 190px;
        }
        .info-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 250px;
        }
        .info-card h5 {
            margin: 0 0 12px;
            font-size: 16px;
        }
        .info-card p {
            color: #475569;
            font-size: 14px;
            line-height: 1.7;
            margin: 0 0 20px;
        }
        .info-card .btn {
            border-radius: 16px;
            width: fit-content;
            padding: 14px 18px;
        }
        .info-card .status-note {
            display: inline-flex;
            gap: 10px;
            align-items: center;
            background: #eef2ff;
            color: #1d4ed8;
            border-radius: 16px;
            padding: 12px 16px;
            font-weight: 700;
            margin-bottom: 16px;
        }
        .info-card .status-note i {
            font-size: 16px;
        }
        @media (max-width: 1100px) {
            .layout,
            .panel,
            .bottom-panel,
            .highlight-card {
                grid-template-columns: 1fr;
            }
        }
        @media (max-width: 768px) {
            .topbar { flex-direction: column; align-items: stretch; }
            .topbar-right { justify-content: space-between; }
            .search-box { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="brand">
                <h3>Academic Affairs</h3>
                <p>Complaint Portal</p>
            </div>
            <ul class="sidebar-menu">
                <li><a href="{{ route('siswa.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="{{ route('siswa.histori', Auth::guard('siswa')->user()->nis) }}" class="active"><i class="fas fa-history"></i> Histori Aspirasi</a></li>
                <li><a href="{{ route('siswa.status') }}"><i class="fas fa-check-circle"></i> Status Penyelesaian</a></li>
            </ul>
            <div class="sidebar-cta">
                <a href="{{ route('siswa.dashboard') }}"><i class="fas fa-plus"></i> Buat Laporan Baru</a>
            </div>
        </aside>

        <section class="content">
            <div class="topbar">
                <div class="topbar-left">
                    <div class="topbar-logo"><i class="fas fa-university"></i></div>
                    <div class="topbar-title">
                        <strong>The Ombudsman</strong>
                        <span>Histori Aspirasi</span>
                    </div>
                </div>
                <div class="topbar-right">
                    <div class="search-box">
                        <i class="fas fa-search text-muted"></i>
                        <input type="search" placeholder="Cari aspirasi..." disabled>
                    </div>
                    <i class="fas fa-bell topbar-icon"></i>
                    <div class="profile-avatar">{{ strtoupper(substr(Auth::guard('siswa')->user()->nama_siswa, 0, 1)) }}</div>
                </div>
            </div>

            <div class="page-heading">
                <div>
                    <div class="breadcrumb">
                        <span>Aplikasi</span>
                        <i class="fas fa-chevron-right"></i>
                        <span>Histori Aspirasi</span>
                    </div>
                    <h1>Histori Aspirasi Saya</h1>
                    <p>Pantau dan tinjau semua aspirasi sarana prasarana yang telah Anda kirimkan kepada pihak sekolah secara transparan.</p>
                </div>
                <div class="badge-block">
                    <span>Total Laporan</span>
                    <strong>{{ $aspirasi->count() }}</strong>
                </div>
            </div>

            <div class="panel">
                <div class="search-panel">
                    <div class="search-row">
                        <input type="search" class="form-control" placeholder="Cari berdasarkan keterangan atau lokasi..." disabled>
                        <select class="form-select" disabled>
                            <option>Semua Kategori</option>
                            @foreach($aspirasi->pluck('kategori.ket_kategori')->unique() as $category)
                                @if($category)
                                    <option>{{ $category }}</option>
                                @endif
                            @endforeach
                        </select>
                        <button class="btn btn-outline-primary btn-filter" disabled><i class="fas fa-sliders-h"></i></button>
                    </div>
                </div>
                <div class="stats-card">
                    <div>
                        <div class="label">Total Laporan</div>
                        <div class="value">{{ $aspirasi->count() }}</div>
                    </div>
                    <div style="text-align:right;">
                        <div class="label">Selesai</div>
                        <div class="value">{{ $aspirasi->filter(fn($item) => optional($item->aspirasi)->status === 'selesai')->count() }}</div>
                    </div>
                </div>
            </div>

            <div class="history-table-card">
                <div class="header">
                    <div>
                        <h2>Histori Aspirasi</h2>
                        <p>Lihat semua laporan Anda beserta status terbaru dan detail singkat.</p>
                    </div>
                    <div style="font-size: 13px; color: #6b7280;">Menampilkan {{ $aspirasi->count() }} dari {{ $aspirasi->count() }} entri</div>
                </div>

                @if($aspirasi->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aspirasi as $index => $item)
                                <tr>
                                    <td>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ $item->created_at->translatedFormat('d M Y') }}</td>
                                    <td>{{ $item->kategori->ket_kategori ?? '-' }}</td>
                                    <td>{{ $item->lokasi ?? '-' }}</td>
                                    <td>{{ Str::limit($item->ket, 40) }}</td>
                                    <td>
                                        @php $status = optional($item->aspirasi)->status ?? 'menunggu'; @endphp
                                        <span class="status-chip status-{{ $status }}">{{ strtoupper($status) }}</span>
                                    </td>
                                    <td>
                                        <button type="button" class="action-icon action-button" data-bs-toggle="modal" data-bs-target="#detailAspirasi{{ $item->id_pelaporan }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach($aspirasi as $item)
                        @php
                            $status = optional($item->aspirasi)->status ?? 'menunggu';
                            $feedback = optional($item->aspirasi)->feedback;
                        @endphp
                        <div class="modal fade" id="detailAspirasi{{ $item->id_pelaporan }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="border-radius: 24px; border: none;">
                                    <div class="modal-header" style="border-bottom: 1px solid #e5e7eb; padding: 22px 24px;">
                                        <div>
                                            <h5 class="modal-title mb-1">{{ $item->kategori->ket_kategori ?? 'Aspirasi Siswa' }}</h5>
                                            <small class="text-muted">{{ $item->created_at->translatedFormat('d M Y H:i') }}</small>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="padding: 24px;">
                                        <p class="mb-3"><strong>Lokasi:</strong> {{ $item->lokasi ?? '-' }}</p>
                                        <p class="mb-3"><strong>Status:</strong> <span class="status-chip status-{{ $status }}">{{ strtoupper($status) }}</span></p>
                                        <p class="mb-0"><strong>Keterangan:</strong></p>
                                        <p class="text-muted mt-2">{{ $item->ket }}</p>
                                        @if($item->foto_pendukung)
                                            <div class="mb-3" style="border-radius:18px; overflow:hidden;">
                                                <img src="{{ asset('storage/'.$item->foto_pendukung) }}" alt="Foto Pendukung" style="width:100%; height:auto; display:block;" />
                                            </div>
                                        @endif
                                        <div class="feedback-box">
                                            <strong>Feedback Admin</strong>
                                            <p>{{ $feedback ?: 'Belum ada feedback dari admin untuk laporan ini.' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state" style="padding:48px; text-align:center; color:#6b7280;">
                        <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:72px;height:72px;margin-bottom:18px;">
                            <circle cx="40" cy="40" r="40" fill="#E0E7FF"/>
                            <path d="M24 52C24 48 28 44 34 44H46C52 44 56 48 56 52" stroke="#1D4ED8" stroke-width="4" stroke-linecap="round"/>
                            <path d="M28 32C28 28 32 24 40 24C48 24 52 28 52 32" stroke="#1D4ED8" stroke-width="4" stroke-linecap="round"/>
                            <path d="M24 44H56" stroke="#1D4ED8" stroke-width="4" stroke-linecap="round"/>
                        </svg>
                        <p class="mt-3">Belum ada histori aspirasi. Silakan ajukan aspirasi baru melalui Dashboard.</p>
                    </div>
                @endif
            </div>

            <div class="bottom-panel">
                <div class="highlight-card">
                    <div>
                        <span class="tag">Sorotan Resolusi</span>
                        <h3>Perbaikan Fasilitas Lab Komputer Telah Selesai!</h3>
                        <p>Pihak sekolah telah melakukan pengadaan 20 unit UPS baru untuk menjaga kestabilan daya di Lab Komputer 1 sesuai aspirasi siswa minggu lalu.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail Progress</a>
                    </div>
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80" alt="Sorotan Resolusi">
                </div>
                <div class="info-card">
                    <div>
                        <div class="status-note"><i class="fas fa-check-circle"></i>Histori berhasil diperbarui</div>
                        <h5>Punya aspirasi baru?</h5>
                        <p>Jangan biarkan fasilitas yang kurang memadai menghambat proses belajar Anda. Suarakan segera laporan baru dan pantau status perbaikannya.</p>
                    </div>
                    <a href="{{ route('siswa.dashboard') }}" class="btn btn-outline-primary">Buat Laporan Baru</a>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
