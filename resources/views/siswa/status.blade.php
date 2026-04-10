<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Penyelesaian Aspirasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fb;
            color: #27313f;
        }

        .status-shell {
            min-height: 100vh;
            background: #f5f7fb;
        }

        .status-topbar {
            height: 78px;
            padding: 0 42px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #ffffff;
            border-bottom: 1px solid #ebeff5;
        }

        .status-brand {
            font-size: 18px;
            font-weight: 800;
            color: #2d5bff;
        }

        .status-user {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .status-user-meta {
            text-align: right;
            line-height: 1.2;
        }

        .status-user-meta strong {
            display: block;
            font-size: 16px;
            font-weight: 700;
            color: #2d3648;
        }

        .status-user-meta span {
            font-size: 12px;
            color: #8b95a7;
        }

        .status-avatar {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: linear-gradient(135deg, #ffb067 0%, #ff824d 100%);
            color: #fff;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .status-logout {
            color: #53627d;
            font-size: 18px;
            text-decoration: none;
        }

        .status-body {
            display: grid;
            grid-template-columns: 191px 1fr;
            min-height: calc(100vh - 78px);
        }

        .status-sidebar {
            background: #ffffff;
            border-right: 1px solid #ebeff5;
            padding: 42px 22px 28px;
            display: flex;
            flex-direction: column;
        }

        .status-nav {
            display: grid;
            gap: 10px;
        }

        .status-nav a {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 10px;
            color: #78849a;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            border-radius: 12px;
        }

        .status-nav a i {
            width: 18px;
            text-align: center;
        }

        .status-nav a.active {
            color: #2d5bff;
            background: transparent;
        }

        .status-nav a.active::after {
            content: "";
            position: absolute;
            right: -1px;
            top: 8px;
            width: 3px;
            height: calc(100% - 16px);
            border-radius: 999px;
            background: #2d5bff;
        }

        .status-sidebar-cta {
            margin-top: auto;
        }

        .status-sidebar-cta a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 16px 18px;
            border-radius: 11px;
            background: #0f5fd4;
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            box-shadow: 0 10px 20px rgba(15, 95, 212, 0.18);
        }

        .status-content {
            padding: 34px 34px 30px;
        }

        .status-breadcrumb {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 14px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #98a1b2;
        }

        .status-breadcrumb .active {
            color: #2d5bff;
        }

        .status-hero h1 {
            margin: 0;
            font-size: 54px;
            line-height: 1.08;
            font-weight: 800;
            color: #2b3442;
        }

        .status-hero p {
            margin: 14px 0 0;
            font-size: 16px;
            line-height: 1.6;
            color: #6f7b90;
            max-width: 660px;
        }

        .status-cards {
            margin-top: 38px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .status-card {
            background: #fff;
            border: 1px solid #eef2f7;
            border-radius: 16px;
            padding: 22px 24px 26px;
            box-shadow: 0 12px 30px rgba(30, 41, 59, 0.04);
            min-height: 365px;
            display: flex;
            flex-direction: column;
        }

        .status-card-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .status-card-icon {
            width: 40px;
            height: 40px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .status-card-date {
            padding: 6px 12px;
            border-radius: 999px;
            background: #eff3f6;
            font-size: 11px;
            font-weight: 700;
            color: #7f8a9c;
            letter-spacing: 0.08em;
        }

        .status-card h3 {
            margin: 0 0 10px;
            font-size: 21px;
            font-weight: 800;
            color: #2f3947;
        }

        .status-card p {
            margin: 0;
            color: #6f7b90;
            font-size: 14px;
            line-height: 1.55;
        }

        .status-feedback {
            margin-top: 20px;
            padding: 14px 14px 16px;
            background: #f6f7fb;
            border-left: 4px solid #2d5bff;
            min-height: 88px;
        }

        .status-feedback strong {
            display: block;
            margin-bottom: 6px;
            font-size: 11px;
            font-weight: 800;
            color: #58667d;
            text-transform: uppercase;
        }

        .status-feedback em {
            color: #697487;
            font-size: 13px;
            line-height: 1.6;
        }

        .status-progress {
            margin-top: auto;
            padding-top: 26px;
        }

        .status-progress-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: 800;
            color: #667188;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .status-progress-bar {
            height: 5px;
            border-radius: 999px;
            background: #e7edf4;
            overflow: hidden;
        }

        .status-progress-fill {
            height: 100%;
            border-radius: 999px;
        }

        .status-pill {
            margin-top: 18px;
            border-radius: 6px;
            text-align: center;
            padding: 12px 12px;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .status-detail {
            margin-top: 16px;
            text-align: center;
        }

        .status-detail a {
            color: #2d5bff;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
        }

        .status-summary {
            margin-top: 44px;
            background: #ffffff;
            border: 1px solid #eef2f7;
            border-radius: 18px;
            padding: 26px 30px;
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 20px;
            align-items: center;
        }

        .status-summary h2 {
            margin: 0 0 8px;
            font-size: 32px;
            font-weight: 800;
            color: #2d3648;
        }

        .status-summary p {
            margin: 0;
            color: #6f7b90;
            font-size: 15px;
            line-height: 1.6;
        }

        .status-summary strong {
            color: #627084;
        }

        .status-summary-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            text-align: center;
        }

        .status-summary-stats .value {
            font-size: 34px;
            line-height: 1;
            font-weight: 800;
            color: #1f4fa8;
        }

        .status-summary-stats .label {
            margin-top: 8px;
            font-size: 12px;
            font-weight: 800;
            color: #667188;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .state-empty {
            margin-top: 38px;
            padding: 40px;
            border-radius: 18px;
            border: 1px dashed #d6ddea;
            text-align: center;
            color: #7a869a;
            background: #fff;
        }

        .status-menunggu .status-card-icon {
            background: #e8e7f0;
            color: #595b63;
        }

        .status-menunggu .status-progress-fill {
            width: 33.333%;
            background: #636b78;
        }

        .status-menunggu .status-pill {
            background: #e3e2ea;
            color: #666875;
        }

        .status-proses .status-card-icon {
            background: #dfe8ff;
            color: #1d5fd2;
        }

        .status-proses .status-progress-fill {
            width: 66.666%;
            background: #1e63d8;
        }

        .status-proses .status-pill {
            background: #d8e3ff;
            color: #245fd0;
        }

        .status-selesai .status-card-icon {
            background: #e8e0ff;
            color: #665c8e;
        }

        .status-selesai .status-progress-fill {
            width: 100%;
            background: #6b6294;
        }

        .status-selesai .status-pill {
            background: #ddd4fb;
            color: #665e8e;
        }

        @media (max-width: 1280px) {
            .status-cards {
                grid-template-columns: 1fr;
            }

            .status-summary {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 980px) {
            .status-body {
                grid-template-columns: 1fr;
            }

            .status-sidebar {
                border-right: none;
                border-bottom: 1px solid #ebeff5;
            }

            .status-topbar {
                padding: 18px 20px;
                height: auto;
                gap: 16px;
                align-items: flex-start;
                flex-direction: column;
            }

            .status-content {
                padding: 24px 20px 28px;
            }

            .status-hero h1 {
                font-size: 38px;
            }
        }

        @media (max-width: 640px) {
            .status-summary-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="status-shell">
        <header class="status-topbar">
            <div class="status-brand">AspirasiSiswa</div>
            <div class="status-user">
                <div class="status-user-meta">
                    <strong>{{ $siswa->nama_siswa }}</strong>
                    <span>{{ $siswa->kelas }}</span>
                </div>
                <div class="status-avatar">{{ strtoupper(substr($siswa->nama_siswa, 0, 1)) }}</div>
                <form action="{{ route('siswa.logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="border:0;background:none;padding:0;" class="status-logout" aria-label="Logout">
                        <i class="fas fa-arrow-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </header>

        <div class="status-body">
            <aside class="status-sidebar">
                <nav class="status-nav">
                    <a href="{{ route('siswa.dashboard') }}">
                        <i class="fas fa-house"></i>
                        <span>Beranda</span>
                    </a>
                    <a href="{{ route('siswa.histori', $siswa->nis) }}">
                        <i class="fas fa-clock-rotate-left"></i>
                        <span>Histori Aspirasi</span>
                    </a>
                    <a href="{{ route('siswa.status') }}" class="active">
                        <i class="fas fa-square-check"></i>
                        <span>Status Penyelesaian</span>
                    </a>
                </nav>

                <div class="status-sidebar-cta">
                    <a href="{{ route('siswa.dashboard') }}">Submit Complaint</a>
                </div>
            </aside>

            <main class="status-content">
                <div class="status-breadcrumb">
                    <span>Portal Siswa</span>
                    <span>&gt;</span>
                    <span class="active">Status Penyelesaian</span>
                </div>

                <section class="status-hero">
                    <h1>Status Penyelesaian Aspirasi</h1>
                    <p>Pantau perkembangan laporan aspirasi dan keluhan sarana prasarana sekolah Anda secara real-time.</p>
                </section>

                @if($statusCards->isEmpty())
                    <div class="state-empty">
                        Belum ada laporan aspirasi yang bisa ditampilkan. Silakan kirim laporan baru dari dashboard siswa.
                    </div>
                @else
                    <section class="status-cards">
                        @foreach($statusCards as $card)
                            <article class="status-card status-{{ $card->status }}">
                                <div class="status-card-head">
                                    <div class="status-card-icon">
                                        @if($card->status === 'selesai')
                                            <i class="fas fa-person-booth"></i>
                                        @elseif($card->status === 'proses')
                                            <i class="fas fa-microscope"></i>
                                        @else
                                            <i class="fas fa-door-open"></i>
                                        @endif
                                    </div>
                                    <div class="status-card-date">{{ $card->date }}</div>
                                </div>

                                <h3>{{ $card->title }}</h3>
                                <p>{{ $card->description }}</p>

                                @if($card->status !== 'menunggu')
                                    <div class="status-feedback">
                                        <strong>Admin Feedback:</strong>
                                        <em>"{{ $card->feedback }}"</em>
                                    </div>
                                @endif

                                <div class="status-progress">
                                    <div class="status-progress-meta">
                                        <span>Progress</span>
                                        <span>{{ $card->progress }}/3</span>
                                    </div>
                                    <div class="status-progress-bar">
                                        <div class="status-progress-fill"></div>
                                    </div>
                                    <div class="status-pill">{{ $card->status }}</div>
                                    <div class="status-detail">
                                        <a href="{{ route('siswa.histori', $siswa->nis) }}">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </section>
                @endif

                <section class="status-summary">
                    <div>
                        <h2>Efektivitas Aspirasi</h2>
                        <p>Terima kasih telah berkontribusi! <strong>{{ $totalAspirasi > 0 ? round(($resolvedCount / $totalAspirasi) * 100) : 0 }}%</strong> aspirasi Anda telah diproses oleh pihak sekolah.</p>
                    </div>
                    <div class="status-summary-stats">
                        <div>
                            <div class="value">{{ $totalAspirasi }}</div>
                            <div class="label">Total Diajukan</div>
                        </div>
                        <div>
                            <div class="value">{{ $processCount }}</div>
                            <div class="label">Dalam Proses</div>
                        </div>
                        <div>
                            <div class="value">{{ $resolvedCount }}</div>
                            <div class="label">Telah Selesai</div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
</html>
