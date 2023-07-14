<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Concert;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ConcertController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $currentDate = Carbon::now();
        $concerts = Concert::whereDate('date','>',$currentDate)->get();
        //$concerts = concert::getConcerts();
        return view('layouts.dashboard',['concerts'=>$concerts]);
    }

    public function create()
    {
        return view('concert.create');
    }

    public function store(Request $request)
    {

        $messages = makeMessages();
        // Validar
        $this->validate($request, [
            'name' => ['required', 'min:5'],
            'price' => ['required', 'numeric', 'min:20000', 'max:2147483647'],
            'stock' => ['required', 'numeric', 'between:100,400'],
            'date' => ['required', 'date', 'after:today','unique:Concerts,date']
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
        echo "<script> alert('El concierto se creó correctamente'); location.href='dashboard'; </script>";
        //return redirect()->route('dashboard');
    }

    public function concertsList()
    {
        //Solamente los clientes pueden ver los conciertos.
        if(Auth()->user()->role == '2')
        {
            return redirect()->route('dashboard');
        }

        $concerts = Concert::getConcerts();
        return view('layouts.dashboard', [
            'concerts' => $concerts,
        ]);
    }

    public function searchDate(Request $request)
    {

        $currentDate = Carbon::now();
        $concerts = Concert::whereDate('date','>',$currentDate)->get();
        $date=$request->date;

        if($date === null){
            $concerts = Concert::getConcerts();
            return view('layouts.dashboard', [
                'concerts' => $concerts,
            ]);
        }

        if($date>$currentDate){
            $concerts = Concert::whereDate('date','=',$date)->get();
        }
        else
        //if($concerts->count() == 0)
        {
            return redirect(url('dashboard'))->with('successmessage','data saved successfully');
        }

        return view('layouts.dashboard',compact('concerts'));

    }
    //Obtiene las datos del usuario que inició sesión.
    public function myConcerts()
    {
        if(Auth()->user()->role == '2')
        {
            return redirect()->route('dashboard');
        }
        return view('detail.detail', ['user' => auth()->user()]);

    }

    public function clients()
    {
        $client = null;
        return view('concert.clients', [
            'message' => null,
            'client' => $client,
            'detail_orders' => null
        ]);
    }

    public function searchClient(Request $request)
    {

        $email = $request->email_search;
        $client = User::where('email', "=", $email)->first();

        if (!$client) {
            return view('concert.clients', [
                'message' => 'El correo electrónico no existe, intente nuevamente.',
                'client' => $client,
                'detail_orders' => null
            ]);
        }

        $detail_orders = Sales::where('userId', $client->id)->paginate(5);
        return view('concert.clients', [
            'message' => null,
            'client' => $client,
            'detail_orders' => $detail_orders
        ]);

    }
}
