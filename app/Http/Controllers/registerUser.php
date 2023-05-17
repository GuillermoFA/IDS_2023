<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class registerUser extends Controller
{
    public function make()
    {
        dd();
        User::create([
            'name' => 'Ignacio',
            'email' => 'i@g',
            'password' => Hash::make('123'),
            'role' => 2
        ]);

        auth()->attempt([
            'email' => 'i@g',
            'password' => '123'
        ]);
    }
}

