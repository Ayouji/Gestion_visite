<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Calendar</title>
    <!-- Styles Bootstrap -->
    <link rel="icon" href="img/hc.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    

    <div class="body">
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
               
               <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                     <a class="navbar " href="#">
                        <img src="{{ asset('img/hc.jpg') }}" alt="" width="30" height="24">&nbsp;Ingenierie</a>
               
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" >
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Calendar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="{{ route('calendar.index') }}">Calendar</a>
                            </li> 
                            @if (session('isadmin'))
                                <li class="nav-item">
                                    <a class="nav-link mx-lg-2" href="{{ route('admin.commercial') }}">Admin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mx-lg-2" href="{{ route('admin.client') }} ">Client</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mx-lg-2" href="{{url('admin/chart')}} ">Visite chart</a>
                                </li>
                            @endif
                      
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @if (session('id_login'))
                        @if (session('admin'))
                        <li class="nav-item dropdown">
                            
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                
                                <img src="{{ Storage::url(session('admin')->image) }}" alt="Profile Picture" style="width: 32px; height: 32px; object-fit: cover; border-radius: 50%;">
                                
                            </a>
                            <ul style="border: none" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                               <DIV class="PRO"> <li><a class="dropdown-item" href="{{url('auth/profil/'.session('admin')->id)}}">Mon Profil</a></li></DIV>
                                <li><hr class="dropdown-divider"></li>
                                <DIV class="LOU">  <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a></li></DIV>
                            </ul>
                        </li>
                        @endif
                        @else
                    
                            <br> <a class="login-button" href="{{route('auth.create')}}">Login</a>
                      
                            &nbsp;&nbsp;&nbsp;
                            <a class="register-button" href="{{route('auth.register')}}">Register</a>
                        @endif
                    </ul>
                   
                </div>
            </div>
            
        </div>
        
        </nav>
        <!--hero sectin-->
        <section class="hero-section">
        <!--End hero sectin-->
        <main class="container py-4 mt-5">
            @yield('content')
        </main>
    </div>

    
    <footer class="text-center fixed-bottom bg-light p-2">&copy; 2024 - fullCalendar</footer>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>