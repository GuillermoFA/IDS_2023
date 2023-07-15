@extends('layouts.app')
@section('title')
    Menu
@endsection
</head>
<body>

@section('content')

<div>
    @auth
    @if (auth()->user()->role===2)
    <div class = "container z">
        <div class = "container">
            <ul class="nav flex-column menuVertical">
                <li class="nav-item">
                  <a class="nav-link textDark badge fs-4 adminButtonLeft" href="concert">Crear Concierto</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link textDark badge fs-4 adminButtonLeft" href="{{ route('concert.sales') }}">Compras Realizadas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link textDark badge fs-4 adminButtonLeft" href="#">Recaudaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link textDark badge fs-4 adminButtonLeft" href="clients">Buscar Cliente</a>
                  </li>
              </ul>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide carrousel" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./img/Carrusel1.jpg" class="d-block w-100 carruselImg" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./img/Carrusel2.jpg" class="d-block w-100 carruselImg" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./img/Carrusel3.jpg" class="d-block w-100 carruselImg" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
    @endif
    @endauth
</div>
@if (auth()->user()->role === 1)
        {{-- Opciones Cliente --}}
        <section class="container mt-4">
            <div class="row">

                <form action="{{ route('concert.search') }}" id=filtro method="POST">
                    @csrf
                    <div class="col mt-2 filter">
                        <label for="date" class="form-label">Filtrar fecha</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                  <button type="submit" class="btn btn-info btn-sm"> Filtrar </button>
                </form>
              @if(session('successmessage'))
              <div class="jumbotron text-center" >
                <h1 class="display-13  big">No hay conciertos disponibles para el día seleccionado, intenta con otra fecha o recarga la página</h1>
              </div>
              @elseif ($concerts->count() > 0)
              @foreach ($concerts as $concert)

              <div class="col-md-3 mb-4">
                <div class="card card-body text-center">
                    <img src="{{ asset('img/concertIcon.png') }}" class="img">
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
                    <a href="{{ route('concert.buy', ['id' => $concert->id]) }}"
                        class="buyButton btn"
                        type="submit">
                        Comprar Entrada
                    </a>
                </div>
                    @else
                    <div class="text-center">
                        <button href= ## type="button" disabled class="disableformButton">Agotado</button>
                    </div>
                    @endif
                </div>
              </div>
        @endforeach
        </div>
        @else
        <div class="jumbotron text-center" >
            <h1 class="display-13  big">No hay conciertos disponibles, Intenta más tarde</h1>
          </div>
        @endif
    @endif
@endsection

