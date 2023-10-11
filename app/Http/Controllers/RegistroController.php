<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    //
    public function registro(Request $request)
    {
        $planId = $request->input('id');


        return view('auth.register', ['planId' => $planId]);
    }
    public function registrar(Request $request)
    {

 
        try {
            //code...
            // Crear una nueva empresa
            $empresa = new Empresa();
            $empresa->nombre = $request->nombre_empresa;
            $empresa->email = $request->email_empresa;
            $empresa->descripcion = $request->descripcion_empresa;
            $empresa->id_plan = $request->id_plan;
            $empresa->save();
            // Crear un nuevo usuario

            $usuario = new Usuario();
            $usuario->nombre = $request->nombre;
            $usuario->email = $request->email;
            $usuario->foto = $request->foto || '';
            $usuario->telefono = $request->telefono || '';
            $usuario->password = bcrypt($request->password);
            $usuario->id_rol = 2;
            $usuario->id_empresa = $empresa->id;
            $usuario->save();
            return redirect()->route('login');
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }

        
    }
}
