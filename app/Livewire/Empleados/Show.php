<?php

namespace App\Livewire\Empleados;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public $crearEmpleado=false;
    public $editarEmpleado=false;
    public $empleados;
    
    public $id_empresa;
    public $id_rol;

    public function mount()
    {

        $this->id_empresa = Auth::user()->empresa->id;
        $this->empleados = Usuario::where('id_empresa', $this->id_empresa)->get();
    }
    public function nuevoEmpleado()
    {
        $this->crearEmpleado = true;
    }

    #[On('cerrar-vista_crear')] 
    public function cerrar()
    {
     $this->crearEmpleado=false;
     $this->editarEmpleado=false;
    }
    public function editar()
    {
        $this->editarEmpleado = true;
    }
    public function eliminarEmpleado($id)
    {
        Usuario::destroy('id', $id);
    }
    public function render()
    { $this->id_empresa = Auth::user()->empresa->id;
        $this->empleados = Usuario::where('id_empresa', $this->id_empresa)
        ->where('id_rol',3)
        ->get();

        return view('livewire.empleados.show');
    }
}
