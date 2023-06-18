<?php

use Carbon\Carbon;
use App\Models\Concert;

function makeMessages()
{
    $messages = [
        'name.required' => 'Debe completar el campo nombre',
        'name_user.required' => 'Debe completar el campo nombre',
        'name_user.min' => 'El largo del nombre es inferior a :min caracteres',
        'name.min' => 'El campo nombre debe tener al menos :min caracteres',
        'email.required' => 'Debe completar el campo correo',
        'password.required' => 'Debe completar el campo contraseña',
        'price.required' => 'El campo precio es obligatorio',
        'date.after' => 'La fecha debe ser mayor a ' . date("d-m-Y"),
        'date.unique' => 'la fecha ya se encuentra ocupada',
        'date.required' => 'El campo fecha es obligatorio',
        'stock.required' => 'El campo stock es obligatorio',
        'stock.between' => 'El rango de entradas es de 100 y 400',

        'email.email' => 'Ingrese una dirección de correo electrónico válida',
        'email.unique' => 'El correo ingresado ya existe en el sistema. Intente iniciar sesión',
        'password.min' => 'La contraseña posee menos de :min caracteres.',
        'name_user.regex' => 'El nombre tiene caracteres no permitidos. Ingrese solo letras',
        'password.regex' => 'La contraseña ingresada no es alfanumerica',
        'stock.numeric' => 'El valor ingresado no es numérico.',
        'price.numeric' => 'El valor ingresado no es numérico.',
        'name.min' => 'El campo nombre del concierto no puede ser inferior a :min caracteres.',
        'price.min' => 'El valor de la entrada no puede ser inferior a $20.000 pesos',

        'quantity.required' => 'El campo cantidad de entradas es requerido.',
        'quantity.min' => 'La cantidad de entradas debe ser mayor o igual a :min.',
        'quantity.numeric' => 'La cantidad de entradas ingresadas no es numérica.',
        'payMethod.required' => 'El método de pago es requerido.',


    ];

    return $messages;
}

function validDate($date)
{
    $fechaActual = date("d-m-Y");
    $fechaVerificar = Carbon::parse($date);

    if ($fechaVerificar->lessThanOrEqualTo($fechaActual)) {
        return true;
    }

    return false;
}

function existConcertDay($date_concert)
{
    $concerts = Concert::getConcerts();
    $date = date($date_concert);

    foreach ($concerts as $concert) {

        if ($concert->date == $date) {
            return true;
        }
    }
    return false;
}


function verifyStock($id, $quantity)
{
    $concert = Concert::find($id);

    if ($quantity > $concert->stock) {
        return false;
    }
    return true;
}

function discountStock($id, $quantity)
{
    $concert = Concert::find($id);

    $concert->stock -= $quantity;
    $concert->save();
    return true;
}


function generateReservationNumber()
{
    do {
        $number = mt_rand(1000, 9999);

        // ejecutar foreach
    } while (substr($number, 0, 1) === '0');

    return $number;
}
