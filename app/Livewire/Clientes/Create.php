<?php

namespace App\Livewire\Clientes;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Create extends Component
{   use WithFileUploads;

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

    public function guardarCliente()
    {
          
        $usuario = new Usuario();
        $usuario->nombre = $this->nombre;
        $usuario->email = $this->email;
        $usuario->telefono = $this->telefono;
        $usuario->password = $this->password;
        $usuario->id_empresa = $this->id_empresa;
        $usuario->id_rol = $this->id_rol;
        $usuario->save();


        if ($this->foto->isValid()) {

            $extensionImagen = $this->foto->getClientOriginalExtension();
            $nombreImagen = 'CLIENTE' . str_pad($usuario->id, STR_PAD_RIGHT) . '.' . $extensionImagen;
            $rutaImagen = $this->foto->storeAs('public/imagenes/clientes', $nombreImagen);
            $usuario->foto = Storage::url($rutaImagen);
        }
        $usuario->save();
        $this->redirect('/crm/clientes');
    }

    public function cancelar()
    {
        $this->dispatch('cerrar-vista_cliente');
    }

    public function render()
    {
        return view('livewire.clientes.create');
    }
}