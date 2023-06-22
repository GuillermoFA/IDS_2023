@extends('layouts.app')
@section('title')
{{ $concert->name }}
@endsection


@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="font-weight-bold text-3xl card-header customYellow text-center">
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
                                <select id="quantity" name="quantity" class="form-select">
                                    <option selected value="0">--Seleccione la cantidad de entradas--</option>
                                    @for ($i = 1; $i <= $concert->stock; $i++)
                                        <option value = "{{ $i }}"> {{ $i }} </option>
                                    @endfor
                                </select>
                            </div>
                            @error('quantity')
                                <p class="textRed my-2 rounded-lg text-lg p-2"> {{ $message }}</p>
                            @enderror

                            @if (session('message'))
                                <p class="textRed my-2 rounded-lg text-lg p-2"> {{ session('message') }}</p>
                            @endif

                            <div class="mb-4">
                                <label for="payMethod" class="">Forma de pago</label>
                                <select id="payMethod" name="payMethod" class="form-select" aria-label="Default select ">
                                    <option selected value="">--Seleccione un método de pago--</option>
                                    <option value="1">Efectivo</option>
                                    <option value="2">Transferencia</option>
                                    <option value="3">Débito</option>
                                    <option value="4">Crédito</option>
                                </select>
                            </div>

                            @error('payMethod')
                                <p class="textRed my-2 rounded-lg text-lg p-2"> {{ $message }} </p>
                            @enderror

                            <input id="total-sum" name="total" value="{{ $concert->price }}" hidden>
                            <button id="boton" type="button" class="btn customYellow">Comprar entrada</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection


@section('alerta')
    <script>
        const boton = document.getElementById("boton");
        const formulario = document.getElementById("formulario");

        boton.addEventListener('click', (e) => {
            e.preventDefault();
            const total = document.getElementById("total-sum");

            Swal.fire({
                title:`Monto Total: ${total.value}`,
                text: '¿Estás seguro que quieres comfirmar estos datos?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4DD091',
                cancelButtonColor: '#FF5C77',
                confirmButtonText: 'Enviar',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    formulario.submit();

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tu compra se ha realizado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        })
    </script>
@endsection

@section('script')
    <script>
        const cantidad = document.getElementById('quantity');
        cantidad.addEventListener('click', (e) => {
            e.preventDefault();
            const venta = {{ $concert->price }} * cantidad.value;
            document.getElementById('total-sum').value = venta;
        })
    </script>
@endsection
