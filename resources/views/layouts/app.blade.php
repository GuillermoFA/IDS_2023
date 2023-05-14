<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/resources/scss/custom.scss">

    <!-- Style CSS -->
    @vite('resources/css/color.css')
    @vite('resources/css/app.css')
    <title>Melody - @yield('title')</title>
</head>

<body>
    <header>
        <div>
            @auth
                <a href="{{ route('dashboard') }}">
                    <img src="#" alt="logo-Melody">
                </a>
                <form action="#">
                    @csrf
                    <button type="submit">Cerrar Sesión</button>
                </form>
            @endauth
            @guest
                <a href="{{ route('home') }}">
                    <img src="#" alt="logo-Melody">
                </a>
                <nav>
                    <a href="#">Iniciar Sesión</a>
                    <a href="#">Crear Cuenta</a>
                </nav>
            @endguest
        </div>
    </header>
    <main>
        <h2>@yield('title-page')</h2>
        @yield('content')
    </main>
    <footer>
        Melody - Todos los derechos reservados {{ now()->year }}
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>
</body>
    @yield('alerta')
</html>



