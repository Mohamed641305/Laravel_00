<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EduPanel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            background: #f5f7fb;
            min-height: 100vh;
        }

        .navbar-custom {
            background: rgba(255, 255, 255, .85);
            backdrop-filter: blur(10px);
            border-radius: 18px;
            margin: 15px auto;
            width: 95%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: 700;
            color: #4f46e5 !important;
        }

        main {
            padding-top: 20px;
        }
    </style>
</head>

<body>

    <div id="app">

        {{-- NAVBAR --}}
        @if (!Request::routeIs('login') && !Request::routeIs('register'))
            <nav class="navbar navbar-expand-lg navbar-custom">

                <div class="container">

                    <a class="navbar-brand" href="{{ url('/') }}">
                        <i class="fas fa-graduation-cap me-2"></i>
                        EduPanel
                    </a>

                    <div class="ms-auto">

                        @auth
                            <div class="dropdown">

                                <a class="btn btn-light dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown">

                                    <i class="fas fa-user-circle me-1"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">

                                    {{-- 👑 Admin Only --}}
                                    @if (auth()->user()->role === 'admin')
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            <i class="fas fa-gauge me-2"></i>
                                            Dashboard
                                        </a>

                                        <hr class="dropdown-divider">
                                    @endif

                                    {{-- Logout للجميع --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">

                                        <i class="fas fa-right-from-bracket me-2"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>

                            </div>
                        @endauth

                    </div>

                </div>

            </nav>
        @endif

        <main>
            @yield('content')
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
