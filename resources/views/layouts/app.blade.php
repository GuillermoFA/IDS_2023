
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Style CSS -->
    @vite('resources/css/color.css')
    @vite('resources/css/styles.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <title>Melody - @yield('title')</title>

    <link rel="icon" href="{{ asset('img/melody_icon.png') }}" type="image/png" sizes="16x16 32x32" >

</head>
<body>
    <header>
        <div>
            @auth
                <nav class="navbar navbar-expand-lg navbar-light navbar-lg backgroundNav z-index-0">
                    <div>
                        <div class="rectanguleRotado z-index-1"></div>
                    </div>
                    <div class="container">
                        <a href="{{ route('dashboard')}}">
                            <img src="{{ asset('img/real 3.png') }}" class="imagen img-fluid rounded-pill" style="float: left" alt="logo-Melody"/>
                        </a>
                        <div class="jumbotron bg-black z-index-2">
                            <h1 class="display-7 text-white jumbotronCustom">Bienvenido/a {{auth()->user()->name}}</h1>
                        </div>
                    </div>
                    <div class="rectangule z-index-0">
                        <div class="nav-item">
                            <form id="logOut" action="logout" method="POST">
                                @csrf
                                <button id="logOutButton" href="/dashboard" type="submit" class="btn logOutButton">Cerrar Sesión</button>
                            </form>
                        </div>
                        @if(auth()->user()->role===2)
                        <div class="collapse navbar-collapse">
                            <a class="text-right textWhite nav-link active btn createConcertButton" aria-current="page" href="concert">Crear concierto</a>
                        </div>
                        @endif
                        @if(auth()->user()->role===1)
                        <div class="">
                            <a class="btn detailButton" aria-current="page" href="/detail">Detalle de Compras</a>
                        </div>
                        @endif
                    </div>
                    <div class="rectanguleRotated z-index-2">
                    </div>
                </nav>
            @endauth
            @guest
                <nav class="navbar navbar-expand-lg navbar-light navbar-lg backgroundNav">
                    <div class="container ">
                        <a href="{{ route('login')}}">
                            <img src="{{ asset('img/real 3.png') }}" class="img-fluid rounded-pill imagen" style="float: left" alt="logo-Melody"/>
                        </a>
                        <div>
                            <ul class="nav justify-content-end">

                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="login textWhite nav-link active" aria-current="page">Iniciar Sesión</a>

                                </li>
                                <li class="nav-item rectangule">
                                    <a href="{{ route('register') }}" class="register nav-link active" aria-current="page">Regístrate</a>
                                </li>
                                <div class="rectanguleRotated"></div>
                            </ul>
                        </div>
                    </div>
                </nav>
            @endguest
        </div>
    </header>
    <main>
        @yield('title-page')
        <div class="whiteSpace">white space</div>
        @yield('content')
    </main>
    <footer class="footer">
        <div class="">
            {{-- agregar un posicionamiento de bottom --}}
            Melody - Todos los derechos reservados {{ now()->year }}
        </div>
    </footer>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
    @yield('script')
    @yield('alerta')
</html>




