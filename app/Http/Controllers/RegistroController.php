<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
       
        $request->validate(
            [
                'nombre' => 'required',
                'email' => 'required',
                'nombre_empresa' => 'required',
                'password' => 'required|min:3',
                'email_empresa' => 'required',
            ]
        );
        
        DB::beginTransaction();
        try {
            //code...
            // Crear una nueva empresa
            $empresa = new Empresa();
            $empresa->nombre = $request->nombre_empresa;
            $empresa->email = $request->email_empresa;
            $empresa->logo = '';
            $empresa->descripcion = $request->descripcion_empresa;
            $empresa->dominio = $request->nombre_empresa;
            $empresa->id_plan = $request->id_plan;
            $empresa->save();

            if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
                $extensionImagen = $request->file('logo')->getClientOriginalExtension();
                $nombreImagen = 'EMPRESA' . str_pad($empresa->id, STR_PAD_RIGHT) . '.' . $extensionImagen;
                $rutaImagen = $request->file('logo')->storeAs('public/imagenes/empresa', $nombreImagen);
                $empresa->update(['logo'=>Storage::url($rutaImagen)]);
                 
            }

            // Crear un nuevo usuario
            $usuario = new Usuario();
            $usuario->nombre = $request->nombre;
            $usuario->email = $request->email;
            $usuario->foto =  '';
            $usuario->telefono = $request->telefono || '';
            $usuario->password = bcrypt($request->password);
            $usuario->id_rol = 2;
            $usuario->id_empresa = $empresa->id;
            $usuario->save();
            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                $extensionImagen = $request->file('foto')->getClientOriginalExtension();
                $nombreImagen = 'USUARIOEMPRESA' . str_pad($usuario->id, STR_PAD_RIGHT) . '.' . $extensionImagen;
                $rutaImagen = $request->file('foto')->storeAs('public/imagenes/empresa', $nombreImagen);
                $usuario->update(['foto'=>Storage::url($rutaImagen)]);

            }
            DB::commit();
            return redirect()->route('login');
        } catch (\Throwable $th) {
            DB::rollBack();
           
        }
    }

    
}
