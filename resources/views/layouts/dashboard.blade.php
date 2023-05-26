@extends('layouts.app')
@section('title')
    Menu
@endsection
</head>
<body>
@section('content')
<div >
    <div class="concertRow">
        <img src="{{ asset('img/concertIcon.png') }}" class="img"></img>
        <img src="{{ asset('img/concertIcon.png') }}" class="img"></img>
        <img src="{{ asset('img/concertIcon.png') }}" class="img"></img>
        <img src="{{ asset('img/concertIcon.png') }}" class="img"></img>
    </div>
    <div class="concertInfoRow">
        <div>
            <p class="concertInfo">Concierto 1</p>
            <p class="concertInfo">Día: 10 de Mayo</p>
            <p class="concertInfo">Valor de entrada: $25.000</p>
        </div>
        <div>
            <p class="concertInfo">Concierto 2</p>
            <p class="concertInfo">Día: 15 de Abril</p>
            <p class="concertInfo">Valor de entrada: $25.000</p>
        </div>
        <div>
            <p class="concertInfo">Concierto 3</p>
            <p class="concertInfo">Día: 25 de Enero</p>
            <p class="concertInfo">Valor de entrada: $18.000</p>
        </div>
        <div>
            <p class="concertInfo">Concierto 4</p>
            <p class="concertInfo">Día: 8 de Febrero</p>
            <p class="concertInfo">Valor de entrada: $19.990</p>
        </div>
    </div>
    <div class="buttonRow">
        <button class="buyButton">Comprar</button>
        <button class="buyButton">Comprar</button>
        <button class="buyButton">Comprar</button>
        <button class="buyButton">Comprar</button>
    </div>
    <div class="concertRow">
        <img src="{{ asset('img/concertIcon.png') }}" class="img"></img>
        <img src="{{ asset('img/concertIcon.png') }}" class="img"></img>
        <img src="{{ asset('img/concertIcon.png') }}" class="img"></img>
        <img src="{{ asset('img/concertIcon.png') }}" class="img"></img>
    </div>
    <div class="concertInfoRow">
        <div>
            <p class="concertInfo">Concierto 5</p>
            <p class="concertInfo">Día: 16 de Noviembre</p>
            <p class="concertInfo">Valor de entrada: $21.000</p>
        </div>
        <div>
            <p class="concertInfo">Concierto 6</p>
            <p class="concertInfo">Día: 13 de Abril</p>
            <p class="concertInfo">Valor de entrada: $45.000</p>
        </div>
        <div>
            <p class="concertInfo">Concierto 7</p>
            <p class="concertInfo">Día: 4 de Abril</p>
            <p class="concertInfo">Valor de entrada: $30.000</p>
        </div>
        <div>
            <p class="concertInfo">Concierto 8</p>
            <p class="concertInfo">Día: 12 de Abril</p>
            <p class="concertInfo">Valor de entrada: $50.000</p>
        </div>
    </div>
    <div class="buttonRow">
        <button class="buyButton">Comprar</button>
        <button class="buyButton">Comprar</button>
        <button class="buyButton">Comprar</button>
        <button class="buyButton">Comprar</button>
    </div>
</div>
@endsection
</body>
</html>

