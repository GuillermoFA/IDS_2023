<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Concert;
use App\Models\Sales;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class SalesController extends Controller
{


    public function create($id)
    {
        //Antes de poder entrar a comprar, verifica si el usuario está logeado

        if (auth()->user() == null)
        {
            return redirect()->route('login');
        }


        //Solo es posible comprar entradas si es un cliente quien desea hacerlo
        if(auth()->user()->role == '2')
        {
            return redirect()->route('dashboard');
        }

        $concert = Concert::find($id);

        //si el usuario no ha iniciado sesion
        if(!auth()->check()){
            return redirect()->route('dashboard');
        };

        //si el usuario es un administrador
        if(auth()->user()->role == 2){
            return redirect()->route('dashboard');
        }

        //si el usuario es un cliente
        return view('client.buy_ticket', [
            'concert' => $concert
        ]);
    }

    public function store(Request $request, $id)
    {

        //Excepción, soluciona el problema N°4. "No cierra sesión cuando se está comprando una entrada"
        if($request->quantity == null){
            auth()->logout();
            return redirect()->route('login');
        }
        
        $reservationNumber = generateReservationNumber();

        $request->request->add(['reservationNumber' => $reservationNumber]);

        $messages = makeMessages();
        $this->validate($request, [
            'quantity' => ['required', 'numeric', 'min:1'],

            'paymentMethod' => ['required'],

            'total' => ['required']
        ], $messages);

        // Validar el stock del concierto
        $validStock = verifyStock($id, $request->quantity);

        if (!$validStock) {
            return back()->with('message', 'La cantidad de entredas ingresadas supera las entradas disponibles a comprar.');
        }

        //Crear la orden de compra

        $detailOrder = Sales::create([
            'reservationNumber' => $request->reservationNumber,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'paymentMethod' => $request->paymentMethod,
            'userId' => auth()->user()->id,
            'concertId' => $id,

            'pdfName' => NULL,
            'path' => NULL,
            'date' => NULL
        ]);

        // Descontar el stock del concierto
        discountStock($id, $request->quantity);


        $user = auth()->user();

        // Crear una instacia de Dompdf
        $domPDF = new Dompdf();

        $data = [
            'user' => $user,
            'detailOrder' => $detailOrder,
            'date' => date("d-m-Y"),
        ];

        //Vista del pdf constructor
        $view_html = view('voucher.pdf', $data)->render();

        $domPDF->loadHtml($view_html);
        $domPDF->setPaper('A4', 'portrait');
        $domPDF->render();

        // Generar nombre de archivo aleatorio
        $filename = 'user_' . Str::random(10) . '.pdf';

        // Guardar el PDF en la carpeta public
        $path = 'pdfs\\' . $filename;
        Storage::disk('public')->put($path, $domPDF->output());



        $detailOrder->pdfName = $filename;
        $detailOrder->path = $path;
        $detailOrder->date = date("Y-m-d");
        $detailOrder->save();



        // Terminada la transaccion, redireccionar al usuario
        echo "<script> alert('Tu compra se ha realizado con éxito'); location.href='/dashboard'; </script>";
        // return redirect()->route('dashboard');
    }


    public function downloadPDF($id)
    {
        // Obtener la información del PDF desde la base de datos
        $pdf = Sales::findOrFail($id);

        // Obtener la ruta del archivo PDF
        $path = storage_path('app\public\pdfs\\' . $pdf->pdfName);

        // Obtener el nombre original del archivo
        $filename = $pdf->pdfName;

        // Obtener el tipo MIME del archivo PDF
        $mimeType = Storage::mimeType($path);
        // Devolver el archivo PDF como una descarga
        return response()->download($path, $filename, ['Content-Type' => $mimeType]);
    }






    public function pdf()
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $view_html = view('');
        $dompdf->loadHtml($view_html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Output the generated PDF to Browser
        return $dompdf->stream();
    }



}
