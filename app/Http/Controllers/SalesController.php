<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Concert;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SalesController extends Controller
{

    public function create($id)
    {
        $concert = Concert::find($id);
        return view('client.buy_ticket', [
            'concert' => $concert
        ]);
    }

    public function store(Request $request, $id)
    {
        $reservation_number = generateReservationNumber();

        $request->request->add(['reservation_number' => $reservation_number]);

        $messages = makeMessages();
        $this->validate($request, [
            'quantity' => ['required', 'numeric', 'min:1'],
            'pay_method' => ['required'],
            'total' => ['required']
        ], $messages);

        // Validar el stock del concierto
        $validStock = verifyStock($id, $request->quantity);

        if (!$validStock) {
            return back()->with('message', 'No se dispone del stock suficiente para este concierto.');
        }

        //Crear la orden de compra
        $detail_order = Sales::create([
            'reservation_number' => $request->reservation_number,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'payment_method' => $request->pay_method,
            'user_id' => auth()->user()->id,
            'concert_id' => $id,

            'pdf_name' => NULL,
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


        $detail_order->pdf_name = $filename;
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
        $path = storage_path('app\public\pdfs\\' . $pdf->pdf_name);

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
