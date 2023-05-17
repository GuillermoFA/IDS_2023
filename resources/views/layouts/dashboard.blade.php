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
            <img src="{{ asset('img/real 3.png') }}" class="" style="float: left">
            <ul class="nav justify-content-end">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="text-right textWhite nav-link active" aria-current="page" href="dashboard">Inicio</a>
                </div>
                @if(!auth()->user())
                <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="text-right textWhite nav-link active" aria-current="page" href="login">Inicia Sesión</a>
                </div>
                @endif
                    @if (auth()->user())
                        @if(auth()->user()->role===2)
                    <div class="collapse navbar-collapse" id="navbarNav">
                            <a class="text-right textWhite nav-link active" aria-current="page" href="concert">Crear concierto</a>
                    </div>
                    @endif
                    @endif
                @if(!auth()->user())
                <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="text-right textWhite nav-link active" aria-current="page" href="register">Registrate</a>
                </div>
                @endif
                @auth
                <form action="logout" method="POST">
                    @csrf
                    <!-- <button type="submit" class="customTransparent">Cerrar Sesión</button> -->
                    <button href="/dashboard" type="submit" class="btn textWhite text-right nav-link">Cerrar Sesión</button>
                </form>
                @endauth
            </ul>
        </div>
    </nav>
</head>
</html>