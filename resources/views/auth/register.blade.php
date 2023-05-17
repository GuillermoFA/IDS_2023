
@extends('layouts.app')
@section('title')
    Registrar Cliente
@endsection

@section('content')

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
                                <input type="text"  id="name" name="name" placeholder="Nombre" class="form-control
                            @error('name')
                                textRed
                            @enderror">
                                @error('name')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="correo" class="form-label">Correo electrónico</label>
                                <input type="email" placeholder="nombre@ejemplo.com" id="email" name="email" class="form-control
                            @error('email')
                                    textRed
                            @enderror">
                                @error('email')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" placeholder="Ingrese su contraseña" id="password" name="password" class="form-control
                            @error('password')
                                textRed
                            @enderror">
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

