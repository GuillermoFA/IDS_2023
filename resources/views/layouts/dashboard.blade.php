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
                <button type="submit" class="font-bold uppercase hover:text-white transition">Cerrar Sesión</button>
            </form>
            @endauth


        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body rounded-5">
                        @if (auth()->user())
                            @if(auth()->user()->role===2)
                            <div> <a href="{{ route('concert.create') }}"
                                class= "text-center rounded-5">
                               <button type="submit" class="customYellow " >crear concierto</button>
                           </div>
                           @endif
                        @endif




                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>
</body>
</html>
</html>
