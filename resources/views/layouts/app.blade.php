<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-secondary bg-danger">
            <div class="container-fluid">
                <a class="navbar-brand" style="color: white;">CuantiN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" style="color: white;" aria-current="page" href="/homepage">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="/menu-items">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="/outlets">Outlets</a>
                        </li>
                        @guest
                        @else
                            @if (Auth::user()->is_admin)
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;" href="/add-menu">Add Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;" href="/add-outlet">Add Outlets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;" href="/bookings">Bookings</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;" href="/bookings">Bookings</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color: white;" href="/login">Login</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" style="color: white;" href="/profile">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color: white;" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div>
            <main class="flex-grow-1 py-4">
                @yield('content')
            </main>
        </div>

        <footer class="bg-dark text-secondary py-4 mt-auto">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>About Us</h5>
                        <p>
                            CuantiN is dedicated to providing the best dining experience with our diverse menu and welcoming outlets.
                        </p>
                    </div>

                    <div class="col-md-4">
                        <h5>Contact</h5>
                        <p>Email: info@cuantin.com</p>
                        <p>Phone: (123) 456-7890</p>
                    </div>

                    <div class="col-md-4">
                        <h5>Follow Us</h5>
                        <p>
                            <a href="#" class="text-secondary text-decoration-none">Facebook</a>
                            <span class="mx-2">|</span>
                            <a href="#" class="text-secondary text-decoration-none">Twitter</a>
                            <span class="mx-2">|</span>
                            <a href="#" class="text-secondary text-decoration-none">Instagram</a>
                        </p>
                    </div>

                    <p class="text-center mt-3">&copy; 2024 CuantiN. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
