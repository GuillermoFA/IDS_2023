<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
       return view('auth.register');
    }

    public function show()
    {
        // dd('registrando');
        return view('formulario');
    }


    public function store(Request $request)
    {

        $messages = makeMessages();
        // Validación
        $this->validate($request, [
            'name' => ['required', 'min:2'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ], $messages);

        // Crear al usuario
        User::create([
            'name' => $request->name,
            'email' => Str::lower($request->email),
            'password' => Hash::make($request->password),
            'role' => 1
        ]);

        // Autenticar al usuario
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Redireccionar al usuario
        return redirect()->route('dashboard');
    }
}
