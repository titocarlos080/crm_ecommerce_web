<?php

namespace App\Livewire\Clientes;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Edit extends Component
{  use WithFileUploads;
    public $usuario;
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
    }

    public function actualizarCliente()
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




    #[On('editar_clienteUP')]
    public function buscar_cliente($id)
    {

        $usuario_ = Usuario::find($id);

        $this->nombre = $usuario_->nombre;
        $this->email = $usuario_->email;
        $this->telefono = $usuario_->telefono;
        $this->password = $usuario_->password;
        $this->id_empresa = $usuario_->id_empresa;
        $this->foto = $usuario_->foto;
        $this->id_rol = $usuario_->id_rol;
        $this->roles = Rol::all();
        return view('livewire.clientes.edit');
      
    }


    public function cancelar()
    {
        $this->dispatch('cerrar-vista_cliente');
    }
   
}
