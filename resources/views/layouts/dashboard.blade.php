@extends('layouts.app')
@section('title')
    Menu
@endsection
</head>
<body>
@section('content')

@if (auth()->user()->role === 1)
        {{-- Opciones Cliente --}}
        <section class="container mt-4">
            <div class="row">

                <form action="{{ route('concert.search') }}" id=filtro method="POST">
                    @csrf
                    <div class="col mt-2">
                        <label for="date" class="form-label">Filtrar fecha</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>

                    <button type="submit" class="btn btn-info btn-sm"> Filtrar </button>
                </form>
                @if(session('successmessage'))
                <div class="jumbotron text-center" ">
                    <h1 class="display-13  big">No hay conciertos disponibles para el día seleccionado, intenta con otra fecha o recarga la página</h1>
                  </div>
        @elseif ($concerts->count() > 0)
        @foreach ($concerts as $concert)

        <div class="col-md-3 mb-4">
                <div class="card card-body text-center">
                    <img src="{{ asset('img/concertIcon.png') }}" class="img"> </img>
                    <h2 class="font-weight-bold mt-3 titulo-concierto" style="color: black; text-decoration: none;">{{$concert->name}}</h2>
                    <p>
                        Fecha del concierto: {{$concert->date}}<br>
                    </p>
                    <p>
                        stock: {{$concert->stock}}<br>
                    </p>
                    <strong class="precio">
                        Valor de la entrada: ${{$concert->price}} CLP
                    </strong>
                    @if($concert->stock>0)
                    <div class="text-center">
                        <button href="#####" type="button" class="formButton">Comprar</button>
                    </div>
                    @else
                    <div class="text-center">
                        <button href="#####" type="button" disabled class="disableformButton">Agotado</button>
                    </div>
                    @endif

                </div>
        </div>
        @endforeach
        </div>
        @else
        <div class="jumbotron text-center" ">
            <h1 class="display-13  big">No hay conciertos disponibles, Intenta más tarde</h1>
          </div>
        @endif
    @endif
@endsection
<script>
 const formulario = document.getElementById("formulario");
</script>
</body>
</html>
