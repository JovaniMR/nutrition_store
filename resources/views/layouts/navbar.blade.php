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
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="material-icons">shopping_cart</i> Mi carrito
                        <span
                            class="badge badge-pill badge-success">{{ Cart::session(auth()->user()->id)->getContent()->count()}}</span>
                    </a>
                </li>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">account_circle</i>
                        Mi cuenta
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        @if (auth()->check())
                        @if (auth()->user()->admin == 0)
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i> Cerrar Sesión
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endif

                        @if (auth()->user()->admin)
                        <a class="nav-link" href="{{ route('products.index') }}">
                            <i class="material-icons">dashboard</i> Gestionar
                        </a>
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i> Cerrar Sesión
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endif
                        @endif


                        @if (!auth()->check())
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="material-icons">login</i> Ingresar
                        </a>
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="material-icons">person_add</i> Registrarse
                        </a>
                        @endif

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>