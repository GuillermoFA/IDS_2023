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

    }
    public function user()
    {
        // La relación belongsTo (pertenece a) indica que cada venta pertenece a un usuario.
        // 'userId' es la clave foránea en la tabla de ventas que hace referencia a la clave primaria en la tabla de usuarios.
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
