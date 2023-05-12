<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class registerUser extends Controller
{
    public function make()
    {
        User::create([
            'name' => 'Ignacio',
            'email' => 'i@g',
            'password' => '123',
            'role' => 1
        ]);

        auth()->attempt([
            'email' => 'i@g',
            'password' => '123'
        ]);
        return view('welcome');
    }
}

