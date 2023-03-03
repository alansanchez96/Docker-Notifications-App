<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('welcome')->with('create', 'Usuario registrado con éxito');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (
            !Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])
        ) {
            return redirect()->back()->with('fail', 'Credenciales invalidas');
        }

        $request->session()->regenerate();

        return redirect()->route('welcome')->with('create', 'Logged In');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome')->with('create', 'Logout exitoso');
    }
}
