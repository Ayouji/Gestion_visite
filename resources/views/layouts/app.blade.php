<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Calendar</title>
    <!-- Styles Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Calendar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('calendar.index') }}">Calendar</a>
                        </li>
                        
                        @if(session('isadmin'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.commercial')}}">Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.client')}} ">Client</a>
                            </li>
                        @endif
                        
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @if (session('id_login'))
                        @if(session('admin'))
                        <li class="nav-item dropdown">
                            
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                
                                <img src="{{ Storage::url(session('admin')->image) }}" alt="Profile Picture" style="width: 32px; height: 32px; object-fit: cover; border-radius: 50%;">
                                
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Mon Profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a></li>
                            </ul>
                        </li>
                        @endif
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

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
