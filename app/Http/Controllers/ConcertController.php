<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        // Retornar al dashboard
        return view('layouts.dashboard');
    }

    public function create()
    {
        return view('concert.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $messages = makeMessages();
        // Validar
        $this->validate($request, [
            'name' => ['required', 'min:5'],
            'price' => ['required', 'numeric', 'min:20000', 'max:2147483647'],
            'stock' => ['required', 'numeric', 'between:100,400'],
            'date' => ['required', 'date']
        ], $messages);

        //  Verificamos si la fecha ingresada es mayor a la fecha actual.
        $invalidDate = validDate($request->date);
        if ($invalidDate) {
            return back()->with('message', 'La fecha debe ser mayor a ' . date("d-m-Y"));
        }


        // Verificar si en la fecha ingresada existe un concierto.
        $existConcert = existConcertDay($request->date);
        if ($existConcert) {
            return back()->with('message', 'Ya existe un concierto para el dia ingresado');
        }

        // Crear Concierto
        Concert::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'date' => $request->date,

        ]);

        return redirect()->route('dashboard');
    }
}
