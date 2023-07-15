<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Attribute;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class User extends Authenticatable
{
    public $timestamps = false;
    public $rememberToken =false;
    use HasApiTokens, HasFactory, Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'email',
        'role',
        'password',
        'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Obtiene los datos de las ventas que coinciden con el 'id' del usuario.
    public function salesData()
    {
        return $this->hasMany(Sales::class, 'userId');
    }
}
