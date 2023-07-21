@extends('layouts.app')

@section('title')
   Ventas por Concierto
@endsection
</head>
<body>
@section('content')

<!-- Tabla con datos de las ventas totales de los conciertos -->

    <div class="tablePadding">
        <h3 class="text-center">
            {{$concert->name}}    Fecha:{{$concert->date}}
        </h3>
        <table class="table table-striped table-bordered border-dark">
            <thead>
                <tr class="bg-secondary bg-opacity-25">
                    <th scope="col">Numero de reserva</th>
                    <th scope="col">Nombre del cliente</th>
                    <th scope="col">Correo del cliente</th>
                    <th scope="col">Fecha de la compra</th>
                    <th scope="col">Cantidad de entradas compradas</th>
                    <th scope="col">Medio de pago</th>
                    <th scope="col">Total pagado</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($sales as $sale)
                <tr class="">
                    <th>
                        {{$sale->reservationNumber}}
                    </th>
                    <th>
                        {{$sale->user->name}}
                    </th>
                    <th>
                        {{$sale->user->email}}
                    </th>
                    <th>
                        {{$sale->date}}
                    </th>
                    <th>
                        {{$sale->quantity}}
                    </th>
                    <th>
                        @switch($sale->paymentMethod)
                            @case('1')
                                Efectivo
                            @break

                            @case('2')
                                Transferencia
                            @break

                            @case('3')
                                Tarjeta de Débito
                            @break

                            @case('4')
                                Tarjeta de Crédito
                            @break
                        @endswitch
                    </th>
                    <th>
                        {{'$' . number_format($sale->total, 0,',','.')}}
                    </th>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
