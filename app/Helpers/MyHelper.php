<?php

use Carbon\Carbon;
use App\Models\Concert;

function makeMessages()
{
    $messages = [
        'name.required' => 'El campo nombre es obligatorio.',
        'name_user.required' => 'El campo nombre es obligatorio.',
        'name_user.min' => 'El campo nombre debe tener al menos :min caracteres.',
        'name.min' => 'El campo nombre debe tener al menos :min caracteres.',
        'email.required' => 'El campo correo electrónico es obligatorio.',
        'password.required' => 'El campo contraseña es obligatorio.',
        'price.required' => 'El campo precio es obligatorio.',
        'date.after' => 'La fecha debe ser mayor a ' . date("d-m-Y"),
        'date.unique' => 'la fecha ya se encuentra ocupada',
        'date.required' => 'El campo fecha es obligatorio.',
        'stock.required' => 'El campo stock es obligatorio.',
        'stock.between' => 'El rango de entradas es de 100 y 400.',
        'email.email' => 'Ingrese una dirección de correo electrónico válida',
        'email.unique' => 'El correo electrónico ya está registrado',
        'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        'name_user.regex' => 'El nombre tiene caracteres no permitidos. Ingrese solo letras',
        'password.regex' => 'La contraseña ingresada no es alfanumerica',
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
