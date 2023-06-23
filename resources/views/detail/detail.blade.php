@extends('layouts.app')

@section('title')
    Detalle
@endsection

@section('content')

<!-- Tabla con datos de las ventas realizadas por el usuario autenticado -->
    @if ($user->salesData->count() == 0)
            <h1 class="text-center">No hay entradas adquiridas por desplegar</h1>
    @else
    <div class="tablePadding">
        <h3 class="text-center">
            Detalle de Compras Realizadas
        </h3>
        <table class="table table-responsive table-striped table-bordered border-dark">
            <thead>
                <tr class="bg-secondary bg-opacity-25">
                    <th scope="col">Número de reserva</th>
                    <th scope="col">Nombre del concierto</th>
                    <th scope="col">Fecha del concierto</th>
                    <th scope="col">Fecha de compra</th>
                    <th scope="col">Cantidad de entradas</th>
                    <th scope="col">Total pagado</th>
                    <th scope="col">Medio de pago</th>
                    <th scope="col">Descargar</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($user->salesData as $saleDetail)
                <tr class="">
                    <th>
                        {{$saleDetail->reservationNumber}}
                    </th>
                    <th>
                        {{$saleDetail->concertDates->name}}
                    </th>
                    <th>
                        {{$saleDetail->concertDates->date}}
                    </th>
                    <th>
                        {{$saleDetail->created_at->toDateString()}}
                    </th>
                    <th>
                        {{$saleDetail->quantity}}
                    </th>
                    <th>
                        @if ($saleDetail->total/1000 >= 1000000)
                            ${{$saleDetail->total/1000000000}}.000.000.000
                        @elseif ($saleDetail->total/1000 >= 1000)
                            ${{$saleDetail->total/1000000}}.000.000
                        @else
                            ${{$saleDetail->total/1000}}.000
                        @endif
                    </th>
                    <th>
                    @switch($saleDetail->paymentMethod)
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
                        <a href="{{ route('pdf.download', ['id' => $saleDetail->id ]) }}">
                            <img src="{{ asset('img/pdf_icon.png') }}" width='50' height='50'>
                        </a>
                    </th>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    @endif
@endsection
