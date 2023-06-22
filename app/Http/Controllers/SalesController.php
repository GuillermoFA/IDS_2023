<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Concert;
use App\Models\Sales;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SalesController extends Controller
{


    public function create($id)
    {
        if (auth()->user() == null)
        {
            return redirect()->route('login');
        }

        $concert = Concert::find($id);
        return view('client.buy_ticket', [
            'concert' => $concert
        ]);
    }

    public function store(Request $request, $id)
    {
        $reservationNumber = generateReservationNumber();

        $request->request->add(['reservationNumber' => $reservationNumber]);

        $messages = makeMessages();
        $this->validate($request, [
            'quantity' => ['required', 'numeric', 'min:1'],
            'payMethod' => ['required'],
            'total' => ['required']
        ], $messages);

        // Validar el stock del concierto
        $validStock = verifyStock($id, $request->quantity);

        if (!$validStock) {
            return back()->with('message', 'No se dispone del stock suficiente para este concierto.');
        }

        //Crear la orden de compra
        $detail_order = Sales::create([
            'reservationNumber' => $request->reservationNumber,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'paymentMethod' => $request->payMethod,
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
            'detail_order' => $detail_order,
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


        $detail_order->pdfName = $filename;
        $detail_order->path = $path;
        $detail_order->date = date("Y-m-d");
        $detail_order->save();


        // Terminada la transaccion, redireccionar al usuario
        return redirect()->route('dashboard');
    }


    public function downloadPDF($id)
    {
        // Obtener la información del PDF desde la base de datos
        $pdf = Sales::findOrFail($id);

        // Obtener la ruta del archivo PDF
        $path = storage_path('app\public\pdfs\\' . $pdf->pdfName);

        // Obtener el nombre original del archivo
        $filename = $pdf->pdf_name;

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
