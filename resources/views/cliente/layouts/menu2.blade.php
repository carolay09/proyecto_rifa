<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('images/logo.jpeg')}}" alt="" style="width: 100px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-primary-color"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                      
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fas fa-users px-2"></i>Quiénes somos</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('politicas')}}" class="nav-link" target="_blank"><i class="fas fa-file-invoice px-2"></i>Políticas</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('detail_sales')}}" class="nav-link"><i class="fas fa-shopping-cart px-3"></i></a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="{{ route('login') }}"><i class="fas fa-user"></i> Iniciar sesión</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link primary-color" href="{{ route('register') }}"><i class="fas fa-file-alt primary-color" ></i>Registrarse</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> <i class="fas fa-user"></i>
                                    {{ Auth::user()->nombre }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <p class="saludo py-2">Bienvenid@ {{Auth::user()->nombre}}</p>
                                    <a class="dropdown-item" href="">Mis compras</a>
                                    <a class="dropdown-item" href="{{route('mis-sorteos')}}"><i class="fas fa-ticket"></i> Mis Sorteos</a>
                                    <a class="dropdown-item" href="">Mis datos</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="fas fa-power-off"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <main class="py-4 mt-5">
        @yield('content')
    </main>
    <a href="https://api.whatsapp.com/send?phone=51982027069&amp;text=Hola!%20quisiera%20m%C3%A1s%20informacion.%20GRACIAS!
    ">
        <img src="{{asset('images/whatsapp.png')}}" alt="" class="icono-ayuda">
        <p class="palabra-ayuda"><strong>AYUDA</strong></p>
    </a>
   
    <footer class="text-white pt-5 pb-4 footer-home">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-white"><strong>¿Necesitas ayuda?</strong></h5>
                    <a href="{{route('politicas')}}" class="nav-link text-white" target="_blank">Términos y Condiciones</a>
                </div>
                
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-white"><strong>Redes Socialeas</strong></h5>
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/a.clarosmendiet" target="_blank" class="btm-floating btn-sm text-white" style="font-size: 23px;">
                                <i class="fab fa-facebook"></i>
                            </a>

                            <a href="https://www.instagram.com/aclaros95/" target="_blank" class="btm-floating btn-sm text-white" style="font-size: 23px;">
                                <i class="fab fa-instagram"></i>
                            </a>
                            
                        </li>
                    </ul>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-white"><strong>Metodo de pago</strong></h5>
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="" class="btn-floating btn-sm text-white" style="font-size: 23px;">
                                <img src="{{asset('images/interbank.png')}}" class="metodo-pago" alt="">
                            </a>

                            <a href="" class="btn-floating btn-sm text-white" style="font-size: 23px;">
                                <img src="{{asset('images/bcp.png')}}" class="metodo-pago" alt="">
                            </a>

                            <a href="" class="btn-floating btn-sm text-white" style="font-size: 23px;">
                                <img src="{{asset('images/yape.png')}}" class="metodo-pago" alt="">
                            </a>

                            <a href="" class="btn-floating btn-sm text-white" style="font-size: 23px;">
                                <img src="{{asset('images/plin.png')}}" class="metodo-pago" alt="">
                            </a>
                            
                        </li>
                    </ul>
                </div>

                
            </div>
            <hr class="mb-4">

            <div class="row align-items-center">
                <div class="col-md-8 col-lg-12">
                    <p>
                        © All right reserved by:
                        <a href="#" style="text-decoration: none;">
                            <strong class="text-white">Carolay &</strong>
                        </a>

                        <a href="#" style="text-decoration: none;">
                            <strong class="text-white">Manuel</strong>
                        </a>
                    </p>
                </div>
                
            </div>
        </div>
    </footer>
</body>
</html>
