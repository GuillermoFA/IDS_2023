<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'reservationNumber',
        'quantity',
        'total',
        'paymentMethod',
        'userId',
        'concertId',

        'pdfName',
        'path',
        'date'
    ];

    public function concertDates()
    {
        return $this->belongsTo(Concert::class, 'concertId');
    }
}
