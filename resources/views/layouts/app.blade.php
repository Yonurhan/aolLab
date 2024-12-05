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

<nav class="navbar navbar-expand-lg bg-danger text-light">
  <div class="container-fluid">
    <a class="navbar-brand">CuantiN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/homepage">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/menu-items">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/outlets">Outlets</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="bg-dark text-white py-4">
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
                    <a href="#" class="text-white text-decoration-none">Facebook</a>
                    <span class="mx-2">|</span>
                    <a href="#" class="text-white text-decoration-none">Twitter</a>
                    <span class="mx-2">|</span>
                    <a href="#" class="text-white text-decoration-none">Instagram</a>
                </p>
            </div>
        </div>
    </div>
</footer>


</body>
</html>
