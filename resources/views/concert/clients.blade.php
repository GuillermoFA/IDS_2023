@extends('layouts.app')
@section('title')
    Buscar Cliente
@endsection
</head>
<body>
@section('content')
<div class="findClientForm">
    <form action="{{ route('client.search') }}" class="my-0" method="GET" novalidate>
        <div class="ms-2"></div>
        <div class="p-5 d-flex align-items-center customYellow">
        <label for="email_search" class="text-center fs-3 fw-bold fst-italic">Ingresar correo electrónico</label>
        <div class="position-relative flex-grow-1 p-5 bd-highlight">
            <input type="email" name="email_search" placeholder="ejemplo@correo.com" class="form-control text-center">
        </div>
        <button type="submit" class="submitButtomSearch fs-4">
            <span class="">Buscar cliente</span>
        </button>
        <a href="{{ route('clients.list') }}" class="submitButtomSearch ms-5 fs-4 text-decoration-none">
            <span class="">Refrescar búsqueda</span>
        </a>
        <div class="ms-2"></div>
        </div>
    </form>
  </div>
  @if ($client == null)
        @if ($message)
                <p class="textRed my-2 rounded-lg text-lg text-center">{{$message}}</p>
        @endif
    @elseif($detail_orders->count() > 0)
    <center>
        <h2 class="text-center fs-4 fw-bold py-1">Cliente {{ $client->name }}</h2>
        <div class="table table-responsive table-striped table-bordered border-dark ">
            <table class="">
                <thead class="text-center bg-secondary bg-opacity-25">
                    <tr>
                        <th scope="col" class="px-5 py-1 ">
                            <p class="text-center">
                                N° Reserva
                            </p>
                        </th>
                        <th scope="col" class="px-5 py-1">
                            <p class="text-center">
                                Nombre
                            </p>
                        </th>
                        <th scope="col" class="px-5 py-1">
                            <p class="text-center">
                                Fecha Concierto
                            </p>
                        </th>
                        <th scope="col" class="px-5 py-1">
                            <p class="text-center">
                                Fecha Compra
                            </p>
                        </th>
                        <th scope="col" class="px-5 py-1">
                            <p class="text-center">
                                Cantidad Entradas
                            </p>
                        </th>

                        <th scope="col" class="px-5 py-1">
                            <p class="text-center">
                                Total Pagado
                            </p>
                        </th>
                        <th scope="col" class="px-5 py-1">
                            <p class="text-center">
                                Medio de Pago
                            </p>
                        </th>
                        <th scope="col" class="px-5 py-1">
                            <p class="text-center px-1">
                                Descargar
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_orders as $detail_order)
                        <tr
                            class="">
                            {{-- Numero de reserva --}}
                            <td scope="row"
                                class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <p class="text-center">
                                    {{ $detail_order->reservationNumber }}
                                </p>
                            </td>
                            {{-- Nombre de Concierto --}}
                            <td class="px-6 py-1 ">
                                <p class="text-center">
                                    {{ $detail_order->concertDates->name }}
                                </p>
                            </td>
                            {{-- Fecha Concierto --}}
                            <td class="px-6 py-1">
                                <p class="text-center">
                                    {{ date('d/m/Y', strtotime($detail_order->concertDates->date)) }}
                                </p>
                            </td>
                            {{-- Fecha Compra --}}
                            <td class="px-6 py-1">
                                <p class="text-center">
                                    {{ date('d/m/Y H:i:s', strtotime($detail_order->created_at)) }}
                                </p>
                            </td>
                            {{-- Cantidad Entradas --}}
                            <td class="px-6 py-1">
                                <p class="text-center">
                                    {{ $detail_order->quantity }}
                                </p>
                            </td>
                            {{-- Total Pagado --}}
                            <td class="px-6 py-1">
                                <p class="text-center">
                                    {{'$' . number_format($detail_order->total, 0,',','.')}}
                                </p>
                            </td>
                            {{-- Medio Pago --}}
                            <td class="px-4 py-1">
                                <p class="text-center">
                                    @switch($detail_order->paymentMethod)
                                        @case('1')
                                            Efectivo
                                        @break

                                        @case('2')
                                            Transferencia
                                        @break

                                        @case('3')
                                            Débito
                                        @break

                                        @case('4')
                                            Crédito
                                        @break
                                    @endswitch
                                </p>
                            </td>
                            <td class="px-4 py-4">
                                <a class="w-auto h-auto"
                                    href="{{ route('pdf.download', ['id' => $detail_order->id]) }}">
                                    <img class="mx-auto px-5" src="{{ asset('img/pdfSmall.png') }}" alt="pdf-image">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-1 items-center d-flex justify-content-center paginationUse">
            @if ($detail_orders)
            <div class="">
                {{ $detail_orders->appends(['email_search' => $client->email])->links('pagination::bootstrap-5') }}
            </div>
             @endif
        </div>
        </center>
    @elseif($client)
        <p class="text-2xl text-black text-center text-bold">El cliente {{ $client->name }} no ha adquirido entradas</p>
    @endif


@endsection
