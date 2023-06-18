<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Models\Sales;
use App\Models\User;
use App\Models\Concert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SalesController extends Controller
{

    //Genera un pdf con la información de una compra realizada.
    public function generatePdf(Request $idSale)
    {

        $pdf = new Dompdf();
        // $sale = Sales::findOrFail($idSale);
        // $sale = new Sales();
        $sale = Sales::findOrFail( $idSale)->first();

        $user = User::where('id', $sale->userId)->first();
        $concert = Concert::where('id', $sale->concertId)->first();
        
        $view = view('detail.viewPdf', ['sale' => $sale])->render();

        $pdf->loadHtml($view);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $pdfName = 'pdf_' . Str::random(10) . '.pdf';
        $path= 'pdfs\\' . $pdfName;

        Storage::disk('public')->put($path, $pdf->output());

        $saleDara = Sales::create([
            'userId' => $sale->userId,
            'concertId' => $sale->concertId,
            'reservationNumber' => $sale->reservationNumber,
            'paymentMethod' => $sale->paymentMethod,
            'totalSale' => $sale->totalSale,
            'quantity' => $sale->quantity,
            'created_at' => $sale->created_at
        ]);

        
        return view('detail.detail', ['user' => auth()->user()]);
    }
}
