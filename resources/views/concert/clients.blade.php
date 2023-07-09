@extends('layouts.app')
@section('title')
    Buscar Cliente
@endsection

@section('content')
<form action="{{ route('client.search') }}" class="my-0" method="GET" novalidate>
    <div class="ms-2"></div>
    <div class="d-flex align-items-center customCyan">
      <label for="email_search" class="text-center fs-3 fw-bold fst-italic">Ingrese el correo electrónico del cliente que desea buscar</label>
      <div class="position-relative flex-grow-1 p-5 bd-highlight">
        <input type="email" name="email_search" placeholder="@correo.com" class="form-control text-center">
      </div>
      <button type="submit" class="submitButtomSearch rounded-pill fs-4">
        <span class="">Buscar cliente</span>
      </button>
      <a href="{{ route('clients.list') }}" class="submitButtomSearch ms-5 rounded-pill fs-4 text-decoration-none">
        <span class="">Refrescar busqueda</span>
      </a>
    <div class="ms-2"></div>
    </div>
  </form>

  @if ($client == null)
        @if ($message)
                <p class="textRed my-2 rounded-lg text-lg p-2">{{$message}}</p>
        @endif
    @elseif($detail_orders->count() > 0)
        <h2 class="text-center text-white text-3xl font-bold uppercase my-10">Cliente {{ $client->name }}</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                N° Reserva
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Nombre
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Fecha Concierto
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Fecha Compra
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Cantidad Entradas
                            </p>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Total Pagado
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Medio de Pago
                            </p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-center">
                                Descargar
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_orders as $detail_order)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            {{-- Numero de reserva --}}
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <p class="text-center">
                                    {{ $detail_order->reservationNumber }}
                                </p>
                            </td>
                            {{-- Nombre de Concierto --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ $detail_order->concertDates->name }}
                                </p>
                            </td>
                            {{-- Fecha Concierto --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ date('d/m/Y', strtotime($detail_order->concertDates->date)) }}
                                </p>
                            </td>
                            {{-- Fecha Compra --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ date('d/m/Y H:i:s', strtotime($detail_order->created_at)) }}
                                </p>
                            </td>
                            {{-- Cantidad Entradas --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ $detail_order->quantity }}
                                </p>
                            </td>
                            {{-- Total Pagado --}}
                            <td class="px-6 py-4">
                                <p class="text-center">
                                    {{ $detail_order->total }}
                                </p>
                            </td>
                            {{-- Medio Pago --}}
                            <td class="px-6 py-4">
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
                            <td class="px-6 py-4">
                                <a class="w-auto h-auto"
                                    href="{{ route('pdf.download', ['id' => $detail_order->id]) }}">
                                    <img class="mx-auto" src="{{ asset('img/pdfSmall.png') }}" alt="pdf-image">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($detail_orders)
            <div class="flex justify-center items-center mx-auto my-8">
                {{ $detail_orders->appends(['email_search' => $client->email])->links('pagination::tailwind') }}
            </div>
        @endif
    @elseif($client)
        <p class="text-2xl text-black text-center font-bold">El cliente {{ $client->name }} no ha adquirido entradas</p>
    @endif


@endsection
