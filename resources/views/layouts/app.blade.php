<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Melody - menu</menu></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
    <!-- Style CSS -->
    @vite('resources/css/color.css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-lg backgroundNav">
        <div class="container">
            <img src="{{ asset('img/logo.png') }}" class="" style="float: left">
            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="text-right textWhite nav-link active" aria-current="page" href="dashboard">Inicio</a>
            </div>
            @if(!auth()->user())
            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="text-right textWhite nav-link active" aria-current="page" href="login">Inicia Sesión</a>
            </div>
            @endif
            @if(!auth()->user())
            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="text-right textWhite nav-link active" aria-current="page" href="register">Registrate</a>
            </div>
            @endif
            @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
            @endauth


        </div>
    </nav>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Style CSS -->
    @vite('resources/css/color.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <title>Melody - @yield('title')</title>
</head>

<body>
    <header>
        <div>
            @auth
                <nav class="navbar navbar-expand-lg navbar-light navbar-lg backgroundNav">
                    <div class="container">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid rounded-pill" style="float: left" alt="logo-Melody">
                        <div>
                            <a href="{{ route('dashboard')}}" class="textWhite nav-link" aria-current="page">Inicio</a>
                        </div>
                        <div>
                            <form action="">
                                @csrf
                                <button href="/dashboard" type="submit" class="btn textWhite">Cerrar Sesión</button>
                            </form>
                        </div>
                    </div>
                    
                </nav>
            @endauth
            @guest
                <nav class="navbar navbar-expand-lg navbar-light navbar-lg backgroundNav">
                    <div class="container">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid rounded-pill" style="float: left" alt="logo-Melody">
                        <div>
                            <a href="{{ route('home') }}" class="textWhite nav-link" aria-current="page">Inicio</a>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div>
                                <a href="{{ route('login') }}" class="text-right textWhite nav-link active" aria-current="page">Iniciar Sesión</a>
                            </div>
                            <div>
                                <a href="{{ route('register') }}" class="text-right textWhite nav-link active" aria-current="page">Crear Cuenta</a>
                            </div>
                        </div>
                    </div>
                </nav>
            @endguest
        </div>
    </header>
    <main>
        @yield('title-page')
        @yield('content')
    </main>
    <footer>
        <div class="container text-center customYellow mw-100 mt-4">
            {{-- agregar un posicionamiento de bottom --}}
            Melody - Todos los derechos reservados {{ now()->year }}
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
    @yield('alerta')
</html>




