<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/*use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;*/

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginAuth(Request $request)
    {
        $messages = makeMessages();
        
        // Validar la información
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ], $messages);

        if(!auth()->attempt($request->only('email', 'password'), $request->remember))
        {
            return back()->with('message', 'Usuario no registrado o contraseña incorrecta');
        }

        return redirect()->route('dashboard');
    }

    // public function logout(request $request){
    //     auth()->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();
    //     return redirect()->route('dashboard');
    // }


}
