<?php

namespace App\Livewire\Empleados;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
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

    public function mount()
    {
        $this->id_empresa = Auth::user()->empresa->id;
        $this->roles = Rol::all();
    }

    public function guadarEmpleado()
    {

        $usuario = new Usuario();
        $usuario->nombre = $this->nombre;
        $usuario->email = $this->email;
        $usuario->telefono = $this->telefono;
        $usuario->password = bcrypt($this->password);
        $usuario->id_empresa = $this->id_empresa;
        $usuario->id_rol = $this->id_rol;
        $usuario->save();
        // Validar y guardar la imagen
        if ($this->foto->isValid()) {
            $extensionImagen = $this->foto->getClientOriginalExtension() || '';
            $nombreImagen = 'EMPLEADO' . str_pad($usuario->id, STR_PAD_RIGHT) . '.' . $extensionImagen;
            $rutaImagen = $this->foto->storeAs('public/imagenes/empleados', $nombreImagen);
            $usuario->foto = Storage::url($rutaImagen);
           
        }
        $usuario->save();
        $this->redirect('/crm/empleados');

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
