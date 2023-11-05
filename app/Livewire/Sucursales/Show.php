<?php

namespace App\Livewire\Sucursales;

use App\Models\Sucursal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    public $crear_sucursal = false;
    public $editar_sucursales = false;
    public $sucursales;
    public $nombre;
    public $nombre_seleccinado;
    public $sucursal_seleccinado;



    public function mount()
    {
        // inicializando las varibles 
    }
    public function crear_vista()
    {
        $this->crear_sucursal = true;
    }
    public function crear()
    {
        $this->crear_sucursal = true;
    }
    public function crear_nuevo_sucursal()
    {
        try {
            $this->validate([
                'nombre' => 'required'
            ]);
            $id_empresa = Auth::user()->empresa->id;

            $sucursal = new Sucursal();
            $sucursal->nombre = $this->nombre;
            $sucursal->id_empresa = $id_empresa;

            $sucursal->save();

            $this->dispatch('sucursal-creada', 'La sucursal se creó satisfactoriamente.');
            $this->reset('nombre');
        } catch (\Throwable $th) {
            $this->dispatch('crear-error', 'La sucursal No se pudo crear satisfactoriamente.');
        }

        //como responderle al componete con un ok
    }

    public function eliminar_sucursal($id)
    {
        Sucursal::destroy($id);
        $this->dispatch('sucursal-eliminada', 'La sucursal se actualizo satisfactoriamente.');
        $this->render();
    }
    public function editar_sucursal($id)
    {    $this->editar_sucursales = true;
        $su = Sucursal::where('id', $id)->first();
        $this->sucursal_seleccinado = $su->id;
        $this->nombre_seleccinado = $su->nombre;
    }
    public function actualizar_sucursal()
    {
        

        try {
            //code...
            $sucursal = Sucursal::where('id', $this->sucursal_seleccinado)->first();
            $sucursal->update([
                'nombre' => $this->nombre_seleccinado
            ]);
            $this->dispatch('sucursal-actualizada', 'La sucursal se actualizo satisfactoriamente.');
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('sucursal-no-actualizada', 'La sucursal no se pudo actualizar');
        }
    }






    public function render()
    {
        $id_empresa = Auth::user()->empresa->id;

        $this->sucursales = DB::select('select * from sucursal where id_empresa = ?', [$id_empresa]);
        return view('livewire.sucursales.show');
    }
}
