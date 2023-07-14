<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //Cierra la sesión actual
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
