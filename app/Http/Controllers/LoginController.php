<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');  
    }

    public function loginAuth(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        if(!auth()->attempt($request->only('email', 'password'), $request->remember))
        {
            return view('login');
        }

        return view('welcome');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
