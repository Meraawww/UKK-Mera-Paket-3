<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f7fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        .me-2 {
            margin-right: 0.5rem !important;
        }

        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
            background-color: #f5f7fa;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: white;
            border-right: 1px solid #e0e6ed;
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            left: 0;
            top: 0;
            z-index: 1000;
        }

        .sidebar-brand {
            padding: 0 20px 20px;
            border-bottom: 1px solid #e0e6ed;
            margin-bottom: 20px;
        }

        .sidebar-brand h3 {
            font-size: 16px;
            font-weight: 600;
            color: #0052cc;
            margin-bottom: 2px;
        }

        .sidebar-brand small {
            font-size: 11px;
            color: #6c7d92;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin: 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #6c7d92;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover {
            background-color: #f0f4f9;
            color: #0052cc;
        }

        .sidebar-menu a.active {
            background-color: #f0f4f9;
            color: #0052cc;
            border-left-color: #0052cc;
        }

        .sidebar-menu i {
            width: 20px;
            text-align: center;
        }

        .sidebar-button {
            padding: 20px;
            margin-top: 20px;
            border-top: 1px solid #e0e6ed;
        }

        .btn-view-all {
            width: 100%;
            background-color: #0052cc;
            color: white !important;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: block;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn-view-all:hover {
            background-color: #003ba3;
            text-decoration: none;
            color: white !important;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 0;
        }

        .top-bar {
            background: white;
            border-bottom: 1px solid #e0e6ed;
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar-title {
            font-size: 16px;
            font-weight: 600;
            color: #2d3436;
        }

        .top-bar-user {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #0052cc;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
            color: #2d3436;
        }

        .logout-btn {
            background: none;
            border: none;
            color: #dc2626;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            padding: 0;
        }

        .logout-btn:hover {
            color: #b91c1c;
        }

        .content-area {
            padding: 30px;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .content-area {
                padding: 15px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="dashboard-wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-brand">
                <h3>Admin Panel</h3>
                <small>School Ombudsman</small>
            </div>

            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) active @endif">
                        <i class="fas fa-chart-line"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.aspirasi.index') }}" class="@if(request()->routeIs('admin.aspirasi.*')) active @endif">
                        <i class="fas fa-inbox"></i>
                        Semua Aspirasi
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.aspirasi.index') }}?status=menunggu">
                        <i class="fas fa-hourglass-half"></i>
                        Menunggu
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.aspirasi.index') }}?status=proses">
                        <i class="fas fa-cog"></i>
                        Dalam Proses
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.aspirasi.index') }}?status=selesai">
                        <i class="fas fa-check-circle"></i>
                        Selesai
                    </a>
                </li>
            </ul>

            <div class="sidebar-button">
                <a href="{{ route('admin.aspirasi.create') }}" class="btn-view-all">
                    <i class="fas fa-plus me-2"></i>Tambah Aspirasi
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar -->
            <div class="top-bar">
                <div class="top-bar-title">Admin Panel - Pengaduan Sarana Sekolah</div>
                <div class="top-bar-user">
                    <div class="user-info">
                        <div class="user-avatar">A</div>
                        <div>
                            <div class="user-name">Admin Budi</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </div>

            <!-- Content Area -->
            <div class="content-area">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
