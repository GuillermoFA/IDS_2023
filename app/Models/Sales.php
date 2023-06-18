<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'userId',
        'concertId',
        'reservationNumber',
        'paymentMethod',
        'totalSale',
        'quantity',
        'created_at'
    ];

    //Obtiene los datos del conciertos que coinciden con la 'concertoId' de la venta.
    public function concertData()
    {
        
        return $this->belongsTo(Concert::class, "concertId");

    }

    // public function userData()
    // {
    //     return $this->belongsTo(User::class, "id");
    // }
}
