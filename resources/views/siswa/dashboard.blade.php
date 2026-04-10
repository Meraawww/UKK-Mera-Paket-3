<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - Pusat Aspirasi Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fb;
            color: #1f2937;
        }

        .topbar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 18px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .topbar-brand {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
        }

        .topbar-brand span {
            color: #2563eb;
        }

        .topbar-menu {
            display: flex;
            align-items: center;
            gap: 24px;
            font-size: 14px;
        }

        .topbar-menu a {
            color: #475569;
            text-decoration: none;
        }

        .topbar-menu a.active,
        .topbar-menu a:hover {
            color: #2563eb;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-user strong {
            font-weight: 700;
        }

        .topbar-logout {
            padding: 8px 14px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background: white;
            color: #475569;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .topbar-logout:hover {
            background: #f8fafc;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 280px 1fr 320px;
            gap: 24px;
            padding: 32px;
        }

        .sidebar-card,
        .content-card,
        .summary-card,
        .latest-card,
        .news-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 22px 70px rgba(15, 23, 42, 0.05);
            border: 1px solid #e5e7eb;
        }

        .sidebar-card {
            padding: 28px;
            height: fit-content;
        }

        .profile-badge {
            width: 56px;
            height: 56px;
            border-radius: 18px;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 18px;
        }

        .profile-label {
            font-size: 14px;
            color: #111827;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .profile-meta {
            font-size: 13px;
            color: #6b7280;
        }

        .nav-list {
            margin-top: 30px;
            list-style: none;
            padding: 0;
            display: grid;
            gap: 10px;
        }

        .nav-list a {
            display: block;
            padding: 14px 18px;
            border-radius: 16px;
            color: #475569;
            text-decoration: none;
            border: 1px solid transparent;
            transition: all 0.2s ease;
        }

        .nav-list a.active,
        .nav-list a:hover {
            border-color: #dbeafe;
            background: #eff6ff;
            color: #1d4ed8;
        }

        .content-card {
            padding: 32px;
            border-radius: 24px;
            background: white;
            box-shadow: 0 22px 70px rgba(15, 23, 42, 0.05);
            border: 1px solid #e5e7eb;
        }

        .content-card h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .content-card p {
            color: #6b7280;
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            font-size: 12px;
            color: #6b7280;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 16px 18px;
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            background: #f8fafc;
            font-size: 14px;
            color: #111827;
        }

        .form-textarea {
            min-height: 160px;
            resize: vertical;
        }

        .attach-box {
            border: 2px dashed #e5e7eb;
            border-radius: 18px;
            padding: 24px;
            text-align: center;
            color: #6b7280;
            margin-bottom: 24px;
        }

        .attach-box i {
            display: block;
            font-size: 24px;
            margin-bottom: 12px;
            color: #2563eb;
        }

        .btn-submit {
            width: 100%;
            padding: 16px 22px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 18px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
        }

        .summary-card,
        .latest-card {
            padding: 24px;
        }

        .summary-title,
        .latest-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .summary-item span {
            color: #6b7280;
        }

        .summary-item strong {
            color: #111827;
        }

        .latest-card .badge {
            padding: 8px 12px;
            border-radius: 999px;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 700;
        }

        .news-card {
            background: linear-gradient(180deg, #eff6ff 0%, #f8fafc 100%);
            border-radius: 24px;
            padding: 22px;
            margin-top: 24px;
            border: 1px solid #dbeafe;
        }

        .news-card h6 {
            font-size: 15px;
            margin-bottom: 8px;
        }

        .news-card p {
            color: #475569;
            font-size: 13px;
            line-height: 1.6;
        }

        .alert-custom {
            border-radius: 18px;
            padding: 16px 20px;
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            margin-bottom: 24px;
        }

        @media (max-width: 1200px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .topbar-menu {
                gap: 14px;
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="topbar-brand"><span>Ombudsman</span> Akademik</div>
        <div class="topbar-menu">
            <a href="{{ route('siswa.dashboard') }}" class="active">Beranda</a>
            <a href="{{ route('siswa.histori', $siswa->nis) }}">Histori Aspirasi</a>
            <a href="{{ route('siswa.status') }}">Status Penyelesaian</a>
        </div>
        <div class="topbar-user">
            <span>Halo, {{ $siswa->nama_siswa }}</span>
            <form action="{{ route('siswa.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="topbar-logout">Logout</button>
            </form>
        </div>
    </header>

    <div class="dashboard-grid">
        <aside class="sidebar-card">
            <div class="profile-badge">{{ strtoupper(substr($siswa->nama_siswa,0,2)) }}</div>
            <div class="profile-label">Siswa Aktif</div>
            <div class="profile-meta">Kelas {{ $siswa->kelas }}</div>
            <ul class="nav-list">
                <li><a href="{{ route('siswa.dashboard') }}" class="active">Beranda</a></li>
                <li><a href="{{ route('siswa.histori', $siswa->nis) }}">Histori Aspirasi</a></li>
                <li><a href="{{ route('siswa.status') }}">Status Penyelesaian</a></li>
            </ul>
            <div class="news-card">
                <h6>Bantuan</h6>
                <p>Butuh panduan pengaduan? Hubungi operator kesiswaan untuk bantuan lebih lanjut.</p>
            </div>
        </aside>

        <section class="content-card">
            @if(session('success'))
                <div class="alert-custom">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2>Pusat Aspirasi Siswa</h2>
            <p>Sampaikan keluhan atau saran mengenai sarana dan prasarana sekolah untuk kenyamanan belajar bersama.</p>

            <form action="{{ route('siswa.aspirasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Kategori Sarana</label>
                    <select class="form-select form-select-lg form-input" name="id_kategori" required>
                        <option value="">Pilih Kategori Sarana</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id_kategori }}">{{ $category->ket_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Lokasi Spesifik</label>
                    <input class="form-input" type="text" name="lokasi" placeholder="Misal: Kelas 10A, Lab Fisika" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Keterangan Aspirasi</label>
                    <textarea class="form-textarea" name="ket" placeholder="Ceritakan detail keluhan atau saran Anda di sini..." required></textarea>
                </div>

                <div class="attach-box">
                    <i class="fas fa-camera"></i>
                    <p>Lampirkan Foto Pendukung (Opsional)</p>
                    <input type="file" name="foto_pendukung" accept="image/*" style="margin-top: 12px;" />
                </div>

                <button type="submit" class="btn-submit">Kirim Aspirasi</button>
            </form>
        </section>

        <aside>
            <div class="summary-card">
                <h5 class="summary-title">Informasi Dashboard</h5>
                <div class="summary-item">
                    <span>Total Aspirasi</span>
                    <strong>{{ $totalAspirasi }}</strong>
                </div>
                <div class="summary-item">
                    <span>Selesai Ditindak</span>
                    <strong>{{ str_pad($resolvedCount, 2, '0', STR_PAD_LEFT) }}</strong>
                </div>
            </div>

            <div class="latest-card">
                <h5 class="latest-title">Aspirasi Terakhir Anda</h5>
                @if($latestAspirasi)
                    <div class="mb-3">
                        <span class="badge bg-warning text-dark">{{ strtoupper($latestAspirasi->aspirasi->status ?? 'MENUNGGU') }}</span>
                    </div>
                    <h6>{{ Str::limit($latestAspirasi->ket, 60) }}</h6>
                    <p class="text-muted" style="font-size: 13px; margin-bottom: 18px;">{{ $latestAspirasi->created_at->format('d M Y') }}</p>
                    <a href="{{ route('siswa.histori', $siswa->nis) }}" class="text-primary">Lihat Detail →</a>
                @else
                    <p class="text-muted">Belum ada aspirasi yang dikirim.</p>
                @endif
            </div>

            <div class="news-card">
                <h6>Update Sarana</h6>
                <p>Renovasi Laboratorium Kimia telah selesai. Silakan cek histori jika ingin melihat status terbaru.</p>
            </div>
        </aside>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
