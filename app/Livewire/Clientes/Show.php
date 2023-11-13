<?php

namespace App\Livewire\Clientes;

use App\Http\Controllers\logController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Show extends Component
{  use WithFileUploads;
    public $crearCliente = false;
    public $editarCliente = false;
    public $clientes;

    public $id_empresa;
    public $id_rol;
    public $cliente_seleccionado;
    public $open = false;

    public $userEdit = [
        'nombre' => '',
        'email' => '',
        'telefono' => '',
        'foto' => ''
    ];

    public function mount()
    {
        logController::registrar_bitacora('vio la vista cliente ',Session::get('ip_cliente'),now()->format('Y-m-d H:i:s'));

    }
    public function nuevoEmpleado()
    {
        $this->crearCliente = true;
    }

    #[On('vista_editar')]
    public function vista_editar()
    {
        $this->editarCliente = true;
    }

    #[On('cerrar-vista_cliente')]
    public function cerrar_editar()
    {

        $this->crearCliente = false;
        $this->open = false;
    }

    public function eliminar_cliente($id)
    {

        Usuario::destroy($id);
        $this->render();
    }

    public function editar_cliente($id)
    {
        $this->cliente_seleccionado = $id;
        $this->open = true;
        $user = Usuario::find($id);
        $this->userEdit['nombre'] = $user->nombre;
        $this->userEdit['email'] = $user->email;
        $this->userEdit['telefono'] = $user->telefono;
        $this->userEdit['foto'] = $user->foto;
    }
    public function actualizar_cliente()
    {
        $this->open = true;
        
        $cliente = Usuario::find($this->cliente_seleccionado);
        $cliente->update([
            'nombre' => $this->userEdit['nombre'],
            'email' => $this->userEdit['email'],
            'telefono' => $this->userEdit['telefono'],
        ]);
    }

    public function render()
    {
        $this->id_empresa = Auth::user()->empresa->id;
        $this->id_rol = 4;
        $this->clientes = DB::select('select usuario.* from usuario, rol, empresa where usuario.id_rol=rol.id and  usuario.id_empresa = empresa.id and rol.id=? and empresa.id=?', [$this->id_rol, $this->id_empresa]);

        return view('livewire.clientes.show');
    }
}
