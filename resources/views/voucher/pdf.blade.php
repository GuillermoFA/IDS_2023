

<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $detailOrder->reservationNumber . '-' . $detailOrder->concertDates->date }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap');

        body {
            font-family: 'Merriweather Sans', sans-serif;
            padding: 10px;
        }
        .title {
            font-weight: bold;
            text-align: center;
        }
        h2 {
            color: #D32527;
        }
        h3 {
            font-weight: bold;
        }
        p {
            font-weight: bold;
        }
        span {
            font-weight: 700;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .total {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        .totalPay {
            margin-bottom: 0px;
            text-align: center;
        }
        .methodPay {
            color: #a9a9a9;
            font-weight: bold;
            margin-top: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="title">Comprobante de Entradas: {{ $detailOrder->reservationNumber }}</h1>
    <div>
        <h3>Productora Melody</h3>
        <h3>Fecha:
            <span>{{ $date }}</span>
        </h3>
    </div>
    <div>
        <h2>Datos del concierto</h2>
        <p>Reserva de número:
            <span>{{ $detailOrder->reservationNumber }}</span>
        </p>
        <p>Concierto:
            <span>{{ $detailOrder->concertDates->name }}</span>
        </p>
        <p>Fecha del concierto:
            <span>{{ $detailOrder->concertDates->date }}</span>
        </p>
        <p>Cantidad de entradas:
            <span>{{ $detailOrder->quantity }}</span>
        </p>
        <p>Valor de la Entrada:
            <span>{{ $detailOrder->concertDates->price }}</span>
        </p>
    </div>
    <hr>
    <div>
        <h2>Datos del cliente</h2>
        <p>Cliente:
            <span>{{ $user->name }}</span>
        </p>
        <p>Correo electrónico:
            <span>{{ $user->email }}</span>
        </p>
    </div>
    <hr>
    <div class="total">
        <p class="totalPay">Total pagado: {{ $detailOrder->total }}</p>

        <p class="totalPay">Medio de pago</p>
        @switch($detailOrder->paymentMethod)
            @case(1)
                <p class="methodPay">Efectivo</p>
            @break

            @case(2)
                <p class="methodPay">Transferencia</p>
            @break

            @case(3)
                <p class="methodPay">Tarjeta de Débito</p>
            @break

            @case(4)
                <p class="methodPay">Tarjeta de Crédito</p>
            @break
        @endswitch
    </div>
</body>

</html>