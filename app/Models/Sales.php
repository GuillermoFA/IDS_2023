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
        'total',
        'quantity',
        'pdf_name',
        'path',
        'date'
    ];

    public function concertDates()
    {
        return $this->belongsTo(Concert::class, "concertId");
    }

     public function userData()
    {
         return $this->belongsTo(User::class, "id");
    }
}
