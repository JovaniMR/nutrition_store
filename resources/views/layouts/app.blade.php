<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">

  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- CSS Files -->
  <link href="{{ asset('css/material-kit.css?v=2.0.7') }}" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />
</head>

<body>
  <div id="app" @yield('body-class')>
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100"
      id="sectionsNav">
      <div class="container">
        <div class="navbar-translate">
          <img src="{{ asset('img/logo.png') }}" alt="logo" style="width:200px">
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse">
          <form class="form-inline ml-auto">
            <div class="form-group no-border">
              <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-success btn-just-icon btn-round">
              <i class="material-icons">search</i>
            </button>
          </form>
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">
                <i class="material-icons">store</i> Productos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('shopping-cart') }}">
                <i class="material-icons">shopping_cart</i> Mi carrito
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">account_circle</i>
                Mi cuenta
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @auth

                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  <i class="material-icons">input</i> Cerrar Sesión
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>

                @else
                <a class="nav-link" href="{{ route('login') }}">
                  <i class="material-icons">login</i> Ingresar
                </a>
                <a class="nav-link" href="{{ route('register') }}">
                  <i class="material-icons">person_add</i> Registrarse
                </a>
                @endauth

              </div>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    @yield('content')

    <footer class="footer">
      <div class="container">
        <nav>
          <ul>
            <li>
              <a href="#">
                Trabaja con nosotros
              </a>
            </li>
            <li>
              <a href="#">
                Términos y condiciones
              </a>
            </li>
            <li>
              <a href="#">
                Cómo cuidamos tu privacidad
              </a>
            </li>
            <li>
              <a href="#">
                Guía de seguridad
              </a>
            </li>
            <li>
              <a href="#">
                Ayuda
              </a>
            </li>
          </ul>
        </nav>
        <div>
          Copyright ©&nbsp;2020 -
            <script>
              2020-document.write(new Date().getFullYear())
            </script>
            Página realizada por Jovani Martinez, hecha con 
              <i class="material-icons" style="font-size: 16px !important">favorite</i>
            por
            <a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a>
        </div>
      </div>
    </footer>
  </div>


  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/plugins/moment.min.js') }}"></script>

  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>

  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-kit.js?v=2.0.7') }}" type="text/javascript"></script>
</body>

</html>