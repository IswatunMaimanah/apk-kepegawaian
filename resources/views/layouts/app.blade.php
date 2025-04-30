<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { margin: 0; font-family: 'Segoe UI', sans-serif; }
        .sidebar {
            width: 250px; background: #2e2e2e; height: 100vh; float: left; color: white;
        }
        .sidebar h2 {
            margin: 20px; font-size: 24px; color: #fff;
        }
        .sidebar .nav-section {
            padding: 10px 20px; font-weight: bold;
        }
        .sidebar ul {
            list-style: none; padding: 0;
        }
        .sidebar ul li {
            padding: 10px 20px; background: #2e2e2e; color: white; display: flex; align-items: center;
        }
        .sidebar ul li.active {
            background: #7496F4;
        }
        .sidebar ul li:hover {
            background: #4c4c4c; cursor: pointer;
        }
        .circle {
            width: 20px; height: 20px; background: #ccc; border-radius: 50%; margin-right: 10px;
        }

        .header {
            background: #7496F4; padding: 10px; display: flex; justify-content: space-between; align-items: center;
        }

        .main {
            margin-left: 250px; background: #4773EE; height: 100vh; color: black; padding: 20px;
        }

        .logout {
            background: red; color: white; padding: 8px 15px; text-decoration: none; font-weight: bold;
        }

        .profile {
            display: flex; align-items: center; padding: 20px;
        }

        .avatar {
            width: 50px; height: 50px; background: #ddd; border-radius: 50%; margin-right: 15px;
        }

        .username {
            font-size: 20px; font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="profile">
            <div class="avatar"></div>
            <div class="username">Regina</div>
        </div>
        <div class="nav-section">Menu Navigasi</div>
        <ul>
            <li class="{{ Request::is('welcome') ? 'active' : '' }}">
                <a href="{{ route('welcome.index') }}" style="color: white; text-decoration: none; display: flex; align-items: center; padding: 10px 20px;">
                    <div class="circle"></div>
                    Dashboard
                </a>
            </li>

            <li class="{{ Request::is('pegawai') ? 'active' : '' }}">
                <a href="{{ route('pegawai.index') }}" style="color: white; text-decoration: none; display: flex; align-items: center; padding: 10px 20px;">
                    <div class="circle"></div>
                    Manajemen Data Pegawai
                </a>
            </li>

            <li class="{{ Request::is('absensi') ? 'active' : '' }}">
                <a href="{{ route('absensi.index') }}" style="color: white; text-decoration: none; display: flex; align-items: center; padding: 10px 20px;">
                    <div class="circle"></div>
                    Absensi
                </a>
            </li>

            <li class="{{ Request::is('penggajian') ? 'active' : '' }}">
                <a href="{{ route('penggajian.index') }}" style="color: white; text-decoration: none; display: flex; align-items: center; padding: 10px 20px;">
                    <div class="circle"></div>
                    Informasi Penggajian
                </a>
            </li>

            <li class="{{ Request::is('penilaian_kerja') ? 'active' : '' }}">
                <a href="{{ route('penilaian_kerja.index') }}" style="color: white; text-decoration: none; display: flex; align-items: center; padding: 10px 20px;">
                    <div class="circle"></div>
                    Penilaian Kinerja Pegawai
                </a>
            </li>

            <li class="{{ request()->routeIs('laporan.index') ? 'active' : '' }}">
                <a href="{{ route('laporan.index') }}" style="color: white; text-decoration: none; display: flex; align-items: center; padding: 10px 20px;">
                    <div class="circle"></div>
                    Rekap Laporan Bulanan
                </a>
            </li>
        </ul>
    </div>

    <div class="main">
        <div class="header">
            <h1>@yield('page_title', 'Dashboard')</h1>
            <a href="#" class="logout">LOGOUT</a>
        </div>
        @yield('content')
    </div>

</body>
</html>
