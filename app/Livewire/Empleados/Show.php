<?php

namespace App\Livewire\Empleados;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use PhpParser\Node\Expr\Empty_;

class Show extends Component
{
    use WithFileUploads;
    public $crearEmpleado = false;
    public $editarEmpleado = false;
    public $empleados;
    public $cliente_seleccionado;

    public $id_empresa;
    public $open_edit = false;
    public $id_rol;
    public $foto;
    public $pas;
    public $userEdit = [
        'nombre' => '',
        'email' => '',
        'telefono' => '',
        'password' => '',
    ];
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
        $this->crearEmpleado = false;
        $this->editarEmpleado = false;
        $this->render();
    }
    public function editar()
    {
        $this->editarEmpleado = true;
    }
    public function eliminar_empleado($id)
    {

        $usuario = Usuario::find($id);
        if ($usuario->foto) {
            Storage::delete($usuario->foto);
        }
        Usuario::destroy($id);
        $this->render();
    }
    public function editar_empleado($id)
    {
        $user = Usuario::find($id);
        $this->cliente_seleccionado = $id;
        $this->open_edit = true;
        $user = Usuario::find($id);
        $this->userEdit['nombre'] = $user->nombre;
        $this->userEdit['email'] = $user->email;
        $this->userEdit['telefono'] = $user->telefono;
        $this->userEdit['foto'] = $user->foto;
    }

    public function actualizar_empleado()
    {
        $this->open_edit = true;


        $empleado = Usuario::find($this->cliente_seleccionado);

        if (empty($this->pas)) {
            $empleado->update([
                'nombre' => $this->userEdit['nombre'],
                'email' => $this->userEdit['email'],
                'telefono' => $this->userEdit['telefono'],

            ]);
        } else {
            $empleado->update([
                'nombre' => $this->userEdit['nombre'],
                'email' => $this->userEdit['email'],
                'telefono' => $this->userEdit['telefono'],
                'password' => $this->pas
            ]);
        }
        if (!empty($this->foto)) {
            $extensionImagen = $this->foto->getClientOriginalExtension() || '';
            $nombreImagen = 'EMPLEADO' . str_pad($empleado->id, STR_PAD_RIGHT) . '.' . $extensionImagen;
            $rutaImagen = $this->foto->storeAs('public/imagenes/empleados', $nombreImagen);
            $empleado->update(['foto' => Storage::url($rutaImagen)]);
        }
    }


    public function render()
    {
        $this->id_empresa = Auth::user()->empresa->id;
        // $this->empleados = Usuario::where('id_rol', 3)
        //     ->where('id_empresa', $this->id_empresa)
        //     ->get();
        $this->empleados = DB::select('select * from usuario where id_rol = ? and id_empresa=?', [3, $this->id_empresa]);

        return view('livewire.empleados.show');
    }
}
