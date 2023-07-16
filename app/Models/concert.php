<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'stock',
        'date' ,
        'originalStock'
    ];

    public static function getConcerts()
    {
        return self::all();
    }

    public function detailOrder()
    {
        return $this->hasMany(Sales::class, 'concertId');
    }

}
