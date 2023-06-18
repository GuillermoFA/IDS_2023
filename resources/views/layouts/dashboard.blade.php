@extends('layouts.app')
@section('title')
    Menu
@endsection
</head>
<body>
@section('content')
<div >
    @auth
    @if (auth()->user()->role===2)
    <div class = "container">
        <div class = "container">
            <ul class="nav flex-column menuVertical">
                <li class="nav-item">
                  <a class="nav-link textDark badge fs-5" href="concert">CREAR CONCIERTO</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link textDark badge fs-5" href="#">COMPRAS REALIZADAS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link textDark badge fs-5" href="#">RECAUDACIONES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link textDark badge fs-5 " href="#">BUSCAR CLIENTE</a>
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
                <img src="./img/Carrusel1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./img/Carrusel2.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./img/Carrusel3.jpg" class="d-block w-100" alt="...">
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

    @if (auth()->user()->role===1)
        <div class="container"></div>
        <div class="container"></div>

    @endif
    @endauth

</div>
@endsection
</body>
</html>
