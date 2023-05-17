
@extends('layouts.app')
@section('title')
    Iniciar Sesión
@endsection

@section('content')

</head>
<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light navbar-lg backgroundNav">
        <div class="container">
            <div style="" >
                <img src="{{ asset('img/logo.png') }}" class="" >
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="text-right textWhite nav-link active" aria-current="page" href="dashboard">Inicio</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="text-right textWhite nav-link active" aria-current="page" href="register">Registrate</a>
            </div>
        </div>
    </nav> -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="font-weight-bold text-3xl card-header customYellow text-center">
                        <h4>Inicia Sesión en Melody</h4>
                    </div>
                    <div class="card-body rounded-5">
                        <form action="{{ route('loginAuth')}}" method="POST" novalidate>
                            @csrf
                            @if (session('message'))
                                <div class="textRed my-2 rounded-lg text-lg p-2">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="correo" class="form-label">Correo electrónico</label>
                                <input type="email" placeholder="nombre@ejemplo.com" id="email" name="email" class="form-control">
                                @error('email')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" placeholder="Ingrese su contraseña" id="password" name="password" class="form-control">
                                @error('password')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class= "text-center rounded-5">
                                <button type="submit" class="customYellow " >Iniciar Sesión</button>
                            </div>
                            <div class= "textRegister text-center">
                                <label for="cuenta">¿No tiene una cuenta?</label>
                                <a class="textHere" href="register">Registrate</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
