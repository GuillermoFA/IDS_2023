@extends('layouts.app')

@section('title')
    Detalle
@endsection

@section('content')

<!-- Tabla con datos de las ventas realizadas por el usuario autenticado -->
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
                        {{$saleDetail->created_at}}
                    </th>
                    <th>
                        {{$saleDetail->quantity}}
                    </th>
                    <th>
                        ${{$saleDetail->total/1000}}.000
                    </th>
                    <th>
                        {{$saleDetail->paymentMethod}}
                    </th>
                    <th>
                        <a href={{ route('pdf.download', ['id' => $saleDetail->id ]) }}>
                            <img src="{{ asset('img/pdf_icon.png') }}" width="50" height="50" style="rounded">
                        </a>
                    </th>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

@endsection
