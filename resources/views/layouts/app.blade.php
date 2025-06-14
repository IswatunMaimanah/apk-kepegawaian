<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #2e2e2e;
            color: white;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

        .sidebar .profile {
            display: flex;
            align-items: center;
            padding: 20px;
        }

        .sidebar .avatar {
            width: 50px;
            height: 50px;
            background: #ddd;
            border-radius: 50%;
            margin-right: 15px;
        }

        .sidebar .username {
            font-size: 20px;
            font-weight: bold;
        }

        .sidebar .nav-section {
            padding: 10px 20px;
            font-weight: bold;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-grow: 1;
        }

        .sidebar ul li {
            transition: background 0.3s;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 8px 20px;
            gap: 10px;
        }

        .sidebar ul li.active {
            background: #7496F4;
        }

        .sidebar ul li:hover {
            background: #4c4c4c;
            cursor: pointer;
        }

        .sidebar ul li a i {
            width: 20px;
            text-align: center;
        }

        .main {
            flex: 1;
            background: #4773EE;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background: #7496F4;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logout {
            background: red;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
    </style>
</head>
<body>

<div class="wrapper">

    {{-- Sidebar --}}
    <div class="sidebar">
        <div class="profile">
            <div class="avatar"></div>
            <div class="username">{{ Auth::user()->name }}</div>
        </div>
        <div class="nav-section">Menu Navigasi</div>
        <ul>
            <li class="{{ Request::is('welcome') ? 'active' : '' }}">
                <a href="{{ route('welcome.index') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>

            <li class="{{ Request::is('pegawai') ? 'active' : '' }}">
                <a href="{{ route('pegawai.index') }}">
                    <i class="fas fa-users"></i> Manajemen Data Pegawai
                </a>
            </li>

            <li class="{{ Request::is('absensi') ? 'active' : '' }}">
                <a href="{{ route('absensi.index') }}">
                    <i class="fas fa-calendar-check"></i> Absensi
                </a>
            </li>

            <li class="{{ Request::is('penggajian') ? 'active' : '' }}">
                <a href="{{ route('penggajian.index') }}">
                    <i class="fas fa-money-bill-wave"></i> Informasi Penggajian
                </a>
            </li>

            <li class="{{ Request::is('penilaian_kerja') ? 'active' : '' }}">
                <a href="{{ route('penilaian_kerja.index') }}">
                    <i class="fas fa-chart-line"></i> Penilaian Kinerja Pegawai
                </a>
            </li>

            <li class="{{ Request::is('laporan') ? 'active' : '' }}">
                <a href="{{ route('laporan.index') }}">
                    <i class="fas fa-file-alt"></i> Rekap Laporan Bulanan
                </a>
            </li>
        </ul>
    </div>

    {{-- Main Area --}}
    <div class="main">
        <div class="header">
            <h1>@yield('page_title', 'Dashboard')</h1>

            @if (Request::is('welcome'))
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout">LOGOUT</button>
                </form>
            @endif
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>

</div>

</body>
</html>
