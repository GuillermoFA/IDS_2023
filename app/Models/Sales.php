<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'id',
        'userId',
        'concertId',
        'reservationNumber',
        'paymentMethod',
        'total',
        'quantity',
        'pdfName',
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


    public function user()
    {
     
        return $this->belongsTo(User::class, 'userId', 'id');

    }
    
    public static function getSales()
    {
        return self::all();
    }
}
