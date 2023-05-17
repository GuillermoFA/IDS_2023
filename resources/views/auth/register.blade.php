<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Melody - Registrate</title>
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
            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="text-right textWhite nav-link active" aria-current="page" href="login">Inicia Sesión</a>
            </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="font-weight-bold text-3xl card-header customYellow text-center">
                        <h4>Registrar usuario</h4>
                    </div>
                    <div class="card-body rounded-5">
                        <form id="formulario" action="{{ route('registerUser')}}" method="POST" novalidate>
                            @csrf
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text"  id="name" name="name" placeholder="Nombre" class="form-control">
                                @error('name')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="correo" class="form-label">Correo electrónico</label>
                                <input type="email" placeholder="nombre@ejemplo.com" id="email" name="email" class="form-control">
                                @error('email')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="contraseña" class="form-label ">Contraseña</label>
                                <input type="password" placeholder="Ingrese su contraseña" id="password" name="password" class="form-control">
                                @error('password')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class= "text-center rounded-5">
                                <button id="boton" type="button" class="customYellow " >Registrarse</button>
                            </div>
                            <div class= "textRegister text-center">
                                <label for="cuenta">¿Ya tienes una cuenta?</label>
                                <a class="textHere" href="login">Iniciar sesión aquí</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('alerta')
<script>
    // Aqui va nuestro script de sweetalert
    const boton = document.getElementById("boton");
    const formulario = document.getElementById("formulario");

    boton.addEventListener('click', (e) => {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro que quieres enviar estos datos?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#01BA80',
            cancelButtonColor: '#E53537',
            confirmButtonText: 'Enviar',
            cancelButtonText: 'Cancelar',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                formulario.submit();
            }
        })
    })
</script>
@endsection

