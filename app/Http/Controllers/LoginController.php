<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Mail\EmailRessetPassword;
use App\Models\Empresa;
use Illuminate\Support\Facades\Session;
use Stringable;

class LoginController extends Controller
{

    //
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request) //: RedirectResponse
    {




        $credencial = $request->validate(['email' => ['required', 'email'], 'password' => ['required']]);

        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
       
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            Session::put('ip_cliente', $request->ip());
            $usuario = Auth::user();
            $user = Usuario::where('id', $usuario->id)->first();
            $user->update(['ip_add' => $request->ip()]);
            $rol = $usuario->rol->nombre;

            if ($rol === 'Administrador') {
                logController::registrar_bitacora('inicio sesion:', $request->ip(), now()->format('Y-m-d H:i:s'));
                return redirect()->route('admin_vista');
            }
            if ($rol === 'Empresa') {

                logController::registrar_bitacora('inicio sesion:', $request->ip(), now()->format('Y-m-d H:i:s'));
                return redirect()->route('crm_empresa');
            }
            if ($rol === 'Empleado') {
                // IP_CLIENTE =$request->ip()
                logController::registrar_bitacora('inicio sesion:', $request->ip(), now()->format('Y-m-d H:i:s'));
                return redirect()->route('crm_dashboard');
            }

            return redirect('/');
        }
        return back()->with('error', 'Credenciales incorrectas');
    }
    public function contrasena_ovidada()
    {
        return view('auth.passwords.email');
    }

                public function password_email(Request $request)
                {        // funcion para enviar un link si el email es valido
                    try {
                        //code...
                        $request->validate(
                            ['email' => 'required|email']
                        );
                        $user = Usuario::where('email', $request->email)->first();
                                              
                      
                        $token = Str::random(60);
                    

                        $data = [
                            'nombre' => $user->nombre,
                            'empresa' =>   $user->empresa->nombre,
                            'link' => route('new_password', ['token' => $token]),
                        ];
                         $user->update([
                            
                            'password_token' => $token,
                            'password_expiracion' => now()->addMinutes(5),
                        ]  );
                        
                      Mail::to($user->email)->send(new EmailRessetPassword($data));
                     
                        return  back()->with('enviado', 'Se envio un email. por favor ver la bandeja de su email');
                    
                    } catch (\Throwable $th) {
 
                        return  back()->with('error_email', 'No se encontro tu email.'.$th);
                    }
                }

    public function password_resset()
    {
        return view('auth.passwords.email');
    }
    public function new_password($token)
    {
        $user = Usuario::where('password_token', $token)
            ->where('password_expiracion', '>', now())->first();


        if ($user) {
            # code...
            return view('auth.passwords.reset', ['email' => $user->email]);
        }

        return 'Este link expiro ..!!';
    }
    public function save_new_password(Request $request)
    {
        try {
            //code...
            $request->validate(
                [
                    'email' => 'required|email',
                    'password' => 'required|min:3',
                    'password_confirmation' => 'required|same:password',

                ]
            );
            $user = Usuario::where('email', $request->email)->first();

            $user->update([
                'password' => bcrypt($request->password),
                'password_token' => ' ',

            ]);

            return  redirect('/login');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error_message', 'No se puedo cambiar la contraseña ' . $th);
        }



        dd('metodo de cabio de contraseña');
    }



    public function logout(Request $request)
    {
        //registrarBitacora('Ha cerrado sesión.');
        logController::registrar_bitacora('cerro sesion:', $request->ip(), now()->format('Y-m-d H:i:s'));

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
