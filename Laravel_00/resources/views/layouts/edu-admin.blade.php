<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f4f7fe;
            transition: .3s;
        }

        body.dark-mode {
            background: #111827;
            color: #fff;
        }

        /* Sidebar */

        .sidebar {
            position: fixed;
            top: 15px;
            left: 15px;
            width: 260px;
            height: calc(100vh - 30px);
            background: linear-gradient(180deg, #0f172a, #1e293b);
            border-radius: 25px;
            padding: 20px 12px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .15);
            transition: .3s;
            z-index: 1000;
        }

        .sidebar.collapsed {
            width: 90px;
        }

        .logo {
            text-align: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #cbd5e1;
            text-decoration: none;
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 10px;
            transition: .3s;
            font-size: 15px;
        }

        .sidebar a i {
            width: 25px;
            text-align: center;
            font-size: 20px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, .1);
            color: white;
            transform: translateX(5px);
        }

        .sidebar a.active {
            background: linear-gradient(90deg, #2563eb, #3b82f6);
            color: white;
            box-shadow: 0 10px 20px rgba(59, 130, 246, .3);
        }

        .sidebar.collapsed .link-text,
        .sidebar.collapsed .logo-text {
            display: none;
        }

        /* Content */

        .content {
            margin-left: 300px;
            padding: 30px;
            transition: .3s;
        }

        .content.expanded {
            margin-left: 120px;
        }

        /* Topbar */

        .topbar {
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 15px 25px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .05);
        }

        body.dark-mode .topbar {
            background: rgba(30, 41, 59, .9);
        }

        .topbar .btn {
            border-radius: 12px;
        }

        /* Cards */

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
        }

        body.dark-mode .card {
            background: #1e293b;
            color: white;
        }

        /* Responsive */

        @media(max-width:992px) {

            .sidebar {
                left: -300px;
            }

            .sidebar.collapsed {
                left: 15px;
                width: 260px;
            }

            .content,
            .content.expanded {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    @auth
        @if (Auth::user()->role == 'admin')
            <div class="sidebar" id="sidebar">

                <div class="logo">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span class="logo-text">AdminPanel</span>
                </div>

                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="link-text">Dashboard</span>
                </a>

                <a href="{{ route('user') }}" class="{{ request()->routeIs('user*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i>
                    <span class="link-text">Users</span>
                </a>

            </div>
        @endif
    @endauth


    <div class="content" id="content">

        @auth
            @if (Auth::user()->role == 'admin')
                <div class="topbar">

                    <button class="btn btn-outline-primary" onclick="toggleSidebar()">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="gap-2 d-flex">

                        <button class="btn btn-dark" onclick="toggleDarkMode()">
                            <i class="fa fa-moon"></i>
                        </button>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger">
                                <i class="fa fa-sign-out-alt"></i>
                                Logout
                            </button>
                        </form>

                    </div>

                </div>
            @endif
        @endauth

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('expanded');
        }

        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
    </script>

</body>

</html>
