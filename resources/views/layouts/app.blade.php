<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CheapMeals.ma') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') . "?" . time() }}" rel="stylesheet">

    <!-- Space for header -->
    <script>
        function setBodyPadding() {
            let body, header;
            body = document.body;
            header = document.getElementById("header");
            body.style.paddingTop = "" + header.offsetHeight + "px";
        }
        window.onload = setBodyPadding;
    </script>

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


</head>
<body class="min-vh-100 position-relative d-flex flex-column justify-content-between">
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

        <div id="logo">
            <a href="{{ route('/') }}"><img src="/img/logo.png" width="200" alt=""></a>
        </div>

        <a class="btn btn-secondary px-2 py-1" style="font-size: .8rem;">For Restaurants</a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#all_restaurants">All Restaurants</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                @guest
                    @if (Route::has('client.login'))
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('client.login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('client.register'))
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('client.register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(Auth::user()->IMG_USER == null)
                                <img src="{{asset('storage/uploads/default.png')}}" alt="mdo" width="32" height="32" class="rounded-circle m-1">
                            @else
                                <img src="{{asset('storage/uploads/' . Auth::user()->IMG_USER)}}" alt="mdo" width="32" height="32" class="rounded-circle m-1">
                            @endif
                            <div class="m-1 text-secondary">{{ Auth::user()->USERNAME }}</div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                            @auth('gerant')
                                <a class="dropdown-item text-primary text-lowercase" href="{{ route('gerant.profile') }}">{{ __('Profile') }}</a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item text-primary text-lowercase" href="{{ route('gerant.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            @elseauth('client')
                                <a class="dropdown-item text-primary text-lowercase" href="{{ route('gerant.profile') }}">{{ __('Profile') }}</a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item text-primary text-lowercase" href="{{ route('client.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                            @endif



                            <form id="logout-form" action="{{ route('client.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
<!-- End Header -->

<!-- ======= Main ======= -->
<main>
    @yield('content')
</main>
<!-- End Main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="py-3">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>CheapMeals.ma</strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="#">A. A. W.</a>
        </div>
    </div>
</footer>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
