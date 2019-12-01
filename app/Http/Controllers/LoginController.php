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
            return redirect()->route('dashbord');
        }

        return redirect('/')->withErrors(['incorrect' => 'E-mail ou senha incorretos']);

    }

    public function create(Request $request)
    {
        return view('login.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        Auth::attempt(['email' => $user->email, 'password' => $user->password]);

        return redirect()->route('dashbord');

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');

    }

}
