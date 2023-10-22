<?php

namespace App\Livewire\Clientes;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public $crearCliente = false;
    public $editarCliente = false;
    public $clientes;

    public $id_empresa;
    public $id_rol;

    public function mount()
    {   $this->id_empresa= Auth::user()->empresa->id;
        $this->id_rol = 4;
        $this->clientes = DB::select('select usuario.* from usuario, rol, empresa where usuario.id_rol=rol.id and  usuario.id_empresa = empresa.id and rol.id=? and empresa.id=?', [$this->id_rol, $this->id_empresa]);
    }
    public function nuevoEmpleado()
    {
        $this->crearCliente = true;
    }

    #[On('cerrar-vista_cliente')]
    public function cerrar()
    {
        $this->crearCliente = false;
        $this->editarCliente = false;
    }

    public function eliminarCliente($id)
    {

        Usuario::destroy($id);
    }

    public function editar_cliente($id)
    {
        $this->editarCliente = true;
        $this->dispatch('editar_cliente', $id);
    }

    public function render()
    {
        return view('livewire.clientes.show');
    }
}
