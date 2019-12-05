<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {

        $credencials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credencials)) {
            return redirect()->route('dashboard');
        }

        return redirect('/')->withErrors(['incorrect' => 'E-mail ou senha incorretos']);

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');

    }

}
