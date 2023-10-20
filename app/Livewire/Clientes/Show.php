<?php

namespace App\Livewire\Clientes;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
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
    {

        $this->id_empresa = Auth::user()->empresa->id;
        $this->clientes = Usuario::where('id_empresa', $this->id_empresa)
        ->where('id_rol',4)
        ->get();
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
    public function editar()
    {
        $this->editarCliente = true;
    }
    public function eliminarCliente($id)
    {
        
        Usuario::destroy('id', $id);
    }

    public function render()
    {
        return view('livewire.clientes.show');
    }
}
