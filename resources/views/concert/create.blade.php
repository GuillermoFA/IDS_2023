
<!doctype html>

<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Melody - crear concierto</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
    <!-- Style CSS -->
    @vite('resources/css/color.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>
<script>
    function confirmacion(){
        var respuesta= confirm("desea crear el concierto?");
        if(respuesta== true){
            return true;
        }
        else return false;
    }
</script>
<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light navbar-lg backgroundNav">
        <div class="container">
            <img src="img/real 3.png" class="" style="float: left">
            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="text-right textWhite nav-link active" aria-current="page" href="dashboard">Inicio</a>
            </div>
            @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="customTransparent">Cerrar Sesión</button>
            </form>
            @endauth
        </div>
    </nav> -->

@extends('layouts.app')
@section('title')
    Crear Concierto
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="font-weight-bold text-3xl card-header customYellow text-center">
                        <h4>Crear concierto</h4>
                    </div>
                    <div class="card-body rounded-5">

                        <form id="formulario" action="{{ route('concert')}}" method="POST" class="fomulario-crear"novalidate>

                            @csrf
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text"  id="name" name="name" placeholder="Ingrese el nombre del concierto" class="form-control">
                                @error('name')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="ticket_price" class="form-label">Precio</label>
                                <input type="price" placeholder="Ingrese el precio" id="price" name="price" class="form-control">
                                @error('price')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="stock" class="form-label">Stock de entradas</label>
                                <input type="stock" placeholder="Ingrese stock de entradas" id="stock" name="stock" class="form-control">
                                @error('stock')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="date" class="form-label">Fecha</label>
                                <input type="date" placeholder="Ingrese la fecha" id="date" name="date" class="form-control">
                                @error('date')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="text-center rounded-5">
                                <input id="boton" type="button" value="Crear Concierto" class="customYellow">
                              </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>
    <!-- doble confirmacion-->
    <script>

    // Aqui va nuestro script de sweetalert
    const boton = document.getElementById("boton");
    const formulario = document.getElementById("formulario");

    boton.addEventListener('click', (e) => {
        e.preventDefault();
        Swal.fire({

            title: '¿Estás seguro que quieres crear un concierto con estos datos?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4DD091',
            cancelButtonColor: '#FF5C77',

            confirmButtonText: 'Enviar',
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

