@extends('layouts.app')
@section('title')
    Comprar Entrada
@endsection
</head>
<body>

@section('content')
    @if (session('success'))
    @endif
    {{-- @if (session('info'))
    @endif --}}
    <div class="formBuyTicket">
        <div class="">
            <div class="">
                <div class="">
                    <div>
                        <h4 class="formBuyTicketTitle">Comprar Entrada</h4>
                    </div>
                    <div class="card-body rounded-5">
                        <form id="formulario" action="{{ route('concert.order.pay', ['id' => $concert->id]) }}" method="POST" class="" novalidate>
                            @csrf
                            <div class="row rounded-3">
                                <h2>Nombre del concierto:</h2>
                                <div>
                                    <h2 class="formBuyTicketText">{{ $concert->name }}</h2>
                                </div>
                            </div>
                            <div class="row rounded-3 justify-content-start my-4">
                                <h2>Fecha del concierto:</h2>
                                <div>
                                    <h2 class="formBuyTicketText">{{ date('d/m/Y', strtotime($concert->date)) }}</h2>
                                </div>
                            </div>
                            <div class="row rounded-3 justify-content-start my-4">
                                <h2>Valor de la entrada:</h2>
                                <div >
                                    <h2 class="formBuyTicketText">{{'$' . number_format($concert->price, 0,',','.') . ' CLP'}}</h2>
                                </div>
                            </div>
                            <hr>
                            <div class="">
                                <label for="quantity" class="formBuyTicketLabel">Cantidad de entradas:</label>
                                <input type="stock" placeholder="--Ingrese la cantidad de entradas--" id="quantity" name="quantity" class="form-control formBuyTicketInput">
                            </div>
                            @error('quantity')
                                <p class="textRed my-2 rounded-lg text-lg"> {{ $message }}</p>
                            @enderror

                            @if (session('message'))
                                <p class="textRed my-2 rounded-lg text-lg"> {{ session('message') }}</p>
                            @endif
                            <div class="">

                                <label for="paymentMethod" class="formBuyTicketLabel">Medio de pago:</label>
                                <select id="paymentMethod" name="paymentMethod" class="form-select formBuyTicketInput" aria-label="Default select ">
                                    <option selected value="">--Seleccione un medio de pago--</option>
                                    <option value="1">Efectivo</option>
                                    <option value="2">Transferencia</option>
                                    <option value="3">Tarjeta de Débito</option>
                                    <option value="4">Tarjeta de Crédito</option>
                                </select>
                            </div>

                            @error('paymentMethod')
                                <p class="textRed my-2 rounded-lg text-lg"> {{ $message }} </p>
                            @enderror
                            <div class="m-4">
                                <input id="totalSum" name="total" value="{{ $concert->price }}" hidden>
                                <button id="BuyButton" type="button" class="btn buyButton">
                                    <p>Comprar entrada</p>
                                </button>
                            <a class="btn cancelButtonColorRed " onclick="history.back()">Cancelar</a>
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
                title:`Monto Total: $ ${total.value} CLP`,
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
    <script>
        const cantidad = document.getElementById('quantity');
        cantidad.addEventListener('change', (e) => {
            e.preventDefault();
            const venta = {{ $concert->price }} * cantidad.value;
            document.getElementById('totalSum').value = venta;
            //Si es un valor negativo, deja el total en cero
            if(venta < 0){
                document.getElementById('totalSum').value = 0;
            }
        })
    </script>
@endsection
