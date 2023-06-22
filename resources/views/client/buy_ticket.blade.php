@extends('layouts.app')
@section('title')
    Comprar Entrada
@endsection


@section('content')

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="font-weight-bold text-3xl card-header customYellow text-center">
                        <h4>Comprar Entrada</h4>
                    </div>
                    <div class="card-body rounded-5">
                        <form id="formulario" action="{{ route('concert.order.pay', ['id' => $concert->id]) }}" method="POST" class="" novalidate>
                            @csrf

                            <div class="row customTab rounded-3 my-4">
                                <h2>Nombre del concierto:</h2>
                                <div class=" text-center position-relative top-0 start-50 translate-middle ">
                                    <h2>{{ $concert->name }}</h2>
                                </div>
                            </div>

                            <div class="row customTab rounded-3 justify-content-start my-4">
                                <div class="col-5">
                                    <h2>Fecha del concierto:</h2>
                                </div>
                                <div class="col-5">
                                    <h2>{{ date('d/m/Y', strtotime($concert->date)) }}</h2>
                                </div>

                            </div>

                            <div class="row customTab rounded-3 justify-content-start my-4">
                                <div class="col-5">
                                    <h2>Valor de la entrada:</h2>
                                </div>
                                <div class="col-5">
                                    <h2>{{ $concert->price }}</h2>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="quantity" class="">Cantidad de entradas:</label>
                                <input type="stock" placeholder="--Ingrese la cantidad de entradas--" id="quantity" name="quantity" class="form-control">

                            </div>
                            @error('quantity')
                                <p class="textRed my-2 rounded-lg text-lg p-2"> {{ $message }}</p>
                            @enderror

                            @if (session('message'))
                                <p class="textRed my-2 rounded-lg text-lg p-2"> {{ session('message') }}</p>
                            @endif

                            <div class="mb-4">

                                <label for="paymentMethod" class="">Medio de pago</label>
                                <select id="paymentMethod" name="paymentMethod" class="form-select" aria-label="Default select ">
                                    <option selected value="">--Seleccione un método de pago--</option>
                                    <option value="1">Efectivo</option>
                                    <option value="2">Transferencia</option>
                                    <option value="3">Tarjeta de Débito</option>
                                    <option value="4">Tarjeta de Crédito</option>
                                </select>
                            </div>


                            @error('paymentMethod')

                                <p class="textRed my-2 rounded-lg text-lg p-2"> {{ $message }} </p>
                            @enderror


                             <input id="totalSum" name="total" value="{{ $concert->price }}" hidden>
                            <button id="BuyButton" type="button" class="buyButton">Comprar entrada</button>
                            <a id="CancelButton" class="cancelButton btn" onclick="history.back()">Cancelar</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection


@section('alerta')
    <script>
        const boton = document.getElementById("BuyButton");
        const formulario = document.getElementById("formulario");

        boton.addEventListener('click', (e) => {
            e.preventDefault();
            const total = document.getElementById("totalSum");

            Swal.fire({
                title:`Monto Total: ${total.value}`,
                text: '¿Estás seguro que quieres confirmar estos datos?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4DD091',
                cancelButtonColor: '#FF5C77',
                confirmButtonText: 'Comprar',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    formulario.submit();
                    // Swal.fire({
                    //     position: 'top-end',
                    //     icon: 'success',
                    //     title: 'Tu compra se ha realizado con éxito',
                    //     showConfirmButton: false,
                    //     timer: 1500
                    // })
                }
            })
        })
    </script>
@endsection

@section('script')
    <!-- <script>
        const cantidad = document.getElementById('quantity');
        cantidad.addEventListener('change', (e) => {
            e.preventDefault();
            const venta = {{ $concert->price }} * cantidad.value;
            document.getElementById('totalSum').value = venta;
        })
    </script> -->
@endsection
