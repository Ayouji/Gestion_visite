<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Calendar</title>
    <!-- Styles Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    {{-- @dd(session('isadmin')) --}}
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('calendar.index') }}">Calendar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        @if(session('isadmin'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.commercial')}}">Admin</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.commerce')}} ">commercial</a>
                            </li> --}}
                        @endif
                        
                        @if (session('id_login'))
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('auth.logout') }}" method="GET">
                                @csrf
                                <button type="submit" class="btn nav-link">Logout</button>
                            </form>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('auth.create')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('auth.register')}}">Register</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container py-4">
            @yield('content')
        </main>
    </div>
    <footer class="text-center fixed-bottom bg-light p-2">&copy; 2024 - fullCalendar</footer>
</body>
</html>
