<?php

namespace App\Livewire\Empleados;

use App\Http\Controllers\logController;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;


    public  $id_empresa;
    public  $id_rol;
    public  $roles;
    public  $nombre;
    public  $email;
    public  $telefono;
    public  $password;
    public  $foto;
    public  $mensaje;
    public  $estado_error;

    public function mount()
    {
        $this->id_empresa = Auth::user()->empresa->id;
        $this->roles = Rol::all();
    }

    public function guadarEmpleado()
    {
        try {
            DB::beginTransaction();
            //code...
            $usuario = new Usuario();
            $usuario->nombre = $this->nombre;
            $usuario->email = $this->email;
            $usuario->telefono = $this->telefono;
            $usuario->password = bcrypt($this->password);
            $usuario->id_empresa = $this->id_empresa;
            $usuario->id_rol = 3;
            $usuario->save();
            // Validar y guardar la imagen
            if (!empty($this->foto)) {
                $extensionImagen = $this->foto->getClientOriginalExtension() ;
                $nombreImagen = 'EMPLEADO' . str_pad($usuario->id, STR_PAD_RIGHT) . '.' . $extensionImagen;
                $rutaImagen = $this->foto->storeAs('public/imagenes/empleados', $nombreImagen);
                $usuario->update(['foto' => Storage::url($rutaImagen)]);
            }
            
            DB::commit();
        logController::registrar_bitacora('creo nuevo empleado '.$usuario->nombre,Session::get('ip_cliente'),now()->format('Y-m-d H:i:s'));

            $this->mensaje = "Empleado creado correctamente";
            $this->estado_error = false;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $this->mensaje = "Ups Ocurrio un error.";

            $this->estado_error = true;
        }
    }
   
    public function cancelar()
    {
        $this->dispatch('cerrar-vista_crear');
    }
    public function render()
    {
        return view('livewire.empleados.create');
    }
}
