@extends('layouts.app')

@section('title')
   Ventas Concierto
@endsection
</head>
<body>
@section('content')

<!-- Tabla con datos de las ventas totales de los conciertos -->
    @if ($concerts->count() === 0)
            <h1 class="text-center">No hay concierto por mostrar</h1>
    @else
    <div class="tablePadding">
        <h3 class="text-center">
            Detalle de ventas de conciertos
        </h3>
        <table class="table table-responsive table-striped table-bordered border-dark">
            <thead>
                <tr class="bg-secondary bg-opacity-25">
                    <th scope="col">Nombre del concierto</th>
                    <th scope="col">Fecha del concierto</th>
                    <th scope="col">Cantidad de entradas</th>
                    <th scope="col">Cantidad de entradas vendidas</th>
                    <th scope="col">Cantidad de entradas restantes</th>
                    <th scope="col">Monto Total Vendido</th>
                    <th scope="col">Ver detalle</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($concerts as $concert)
                <tr class="">
                    <th>
                        {{$concert->name}}
                    </th>
                    <th>
                        {{$concert->date}}
                    </th>
                    <th>
                        {{$concert->originalStock}}
                    </th>
                    <th>
                        {{$concert->originalStock - $concert->stock}}
                    </th>
                    <th>
                        {{$concert->originalStock - ($concert->originalStock - $concert->stock)}}
                    </th>
                    <th>
                        {{$concert->price * ($concert->originalStock - $concert->stock)}}
                    </th>
                    <th>
                    @if ($concert->originalStock === $concert->stock)


                    @else
                        <div class="text-center">
                            <a href="{{ route("dashboard", ['id' => $concert->id]) }}"
                                class="buyButton btn"
                                type="submit">
                                Ver detalle
                            </a>
                        </div>


                    @endif
                    </th>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    @endif
@endsection
