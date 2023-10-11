<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    //
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {

        $credencial = $request->validate(['email' => ['required', 'email'], 'password' => ['required']]);

        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            $usuario = Auth::user();
            $rol = $usuario->rol->nombre;
        
            if ($rol === 'Administrador') {
                return redirect()->route('admin_vista');
            }
           if ($rol === 'Empleado') {
                return redirect()->route('crm_dashboard');
            }
            return redirect('/');
        }
        return back()->with('error', 'Credenciales incorrectas');
    }
    public function logout(Request $request)
    {
        //registrarBitacora('Ha cerrado sesión.');

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
