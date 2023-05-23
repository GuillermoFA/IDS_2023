
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

</head>

<body>
    <header>
        <div>
            @auth
                <nav class="navbar navbar-expand-lg navbar-light navbar-lg backgroundNav">
                    <div class="container">
                        <a href="{{ route('dashboard')}}">
                        <img src="{{ asset('img/real 3.png') }}" class="img-fluid rounded-pill" style="float: left" alt="logo-Melody"/>
                        </a>
                        <div>
                            <ul class="nav justify-content-end">
                                @if(auth()->user()->role===2)
                                <div class="collapse navbar-collapse" id="navbarNav">
                                        <a class="text-right textWhite nav-link active" aria-current="page" href="concert">Crear concierto</a>
                                </div>
                                @endif
                                <li class="nav-item">
                                    <form action="logout" method="POST"">
                                        @csrf
                                        <button href="/dashboard" type="submit" class="btn textWhite">Cerrar Sesión</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                </nav>
            @endauth
            @guest
                <nav class="navbar navbar-expand-lg navbar-light navbar-lg backgroundNav">
                    <div class="container">
                        <a href="{{ route('dashboard')}}">
                            <img src="{{ asset('img/real 3.png') }}" class="img-fluid rounded-pill" style="float: left" alt="logo-Melody"/>
                            </a>
                        <div>
                            <ul class="nav justify-content-end">
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="textWhite nav-link active" aria-current="page">Iniciar Sesión</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="textWhite nav-link active" aria-current="page">Registrate</a>
                                </li>
                            </ul>
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




