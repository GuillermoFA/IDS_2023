<?php

function makeMessages()
{$messages =['name.required' => 'Este campo es obligatorio*',
    'name.min' => 'El largo del nombre es inferior a 3 caracteres*',
    'email.required' => 'Este campo es obligatorio*',
    'email.email' => 'El correo debe seguir el formato ejemplo@correo.com*',
    'email.unique' => 'El correo ingresado ya existe en el sistema. Intente iniciar sesion*',
    'password.required' => 'Este campo es obligatorio*',
    'password.min' => 'La contraseña posee menos de 8 caracteres*',
    'name.alpha' => 'El nombre tiene caracteres no permitidos. Ingrese solo letras',
    'password.alpha_num' => 'La contraseña ingresada no es alfanumérica'
    ];

    return $messages;}
