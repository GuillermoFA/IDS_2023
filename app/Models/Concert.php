<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'date_of_the_concert',
        'number_of_ticket',
        'ticket_price'
    ];

    public static function getConcerts(){
        return self::all();
    }
}
