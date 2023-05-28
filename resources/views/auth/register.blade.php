@extends('layouts.app')
@section('title')
    Registrar
@endsection

@section('content')

</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="font-weight-bold text-3xl card-header customYellow text-center">
                        <h4>Registrar usuario</h4>
                    </div>
                    <div class="card-body rounded-5">

                        <form id="formulario" action="{{ route('register')}}" method="POST" novalidate>

                            @csrf
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="name_user" class="form-label">Nombre</label>
                                <input type="text"  id="name_user" name="name_user" placeholder="Nombre" class="form-control">
                                @error('name_user')
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
                            <div class="text-center rounded-5">
                                <input id="boton" type="button" value="Registrarse >" class="formButton">
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
    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>

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
                confirmButtonColor: '#00D3A2',
                cancelButtonColor: '#FF5733',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    formulario.submit();
                }
            })
        })
    </script>
@endsection
</body>
</html>
</html>

