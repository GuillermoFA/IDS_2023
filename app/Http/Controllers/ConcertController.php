<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        // Retornar al dashboard
        return view('layouts.dashboard');
    }
    public function welcome()
    {
        return view('welcome');
    }

}
