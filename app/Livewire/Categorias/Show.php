<?php

namespace App\Livewire\Categorias;

use App\Models\Categoria;
use App\Models\Sucursal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    public $categorias;
    public $show_vista = false;
    public $show_editar = false;
    public $categoria_selecionada;
    public $sucursales, $sucursal_selecionado;

    public $nombre_seleccionda;
    public $nombre;

    public function vista_crear($id)
    {
        $this->show_vista = true;
        $this->sucursal_selecionado = $id;
    }
    public function crear_categoria()
    {
        $this->validate([
            'nombre' => 'required'
        ]);
        try {
            //code...

            $id_empresa = Auth::user()->empresa->id;
            $categoria = new Categoria();
            $categoria->nombre = $this->nombre;
            $categoria->id_sucursal = $this->sucursal_selecionado;
            $categoria->id_empresa = $id_empresa;
            $categoria->save();

            $this->dispatch('categoria-creada', 'La categoria se creo satisfactoriamente.');
            $this->reset(['nombre', 'sucursal_selecionado']);
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('categoria-error', 'La categoria No se se pudo crear. Intente nuevamente.');
        }
    }
    public function vista_editar($id)
    {
        $this->categoria_selecionada = $id;
       
        $categoria = Categoria::where('id', $id)->first();
        $this->nombre_seleccionda = $categoria->nombre;
        $this->show_editar = true;
    }
    public function editar_categoria()
    {
        $categoria = Categoria::where('id', $this->categoria_selecionada)->first();
        $categoria->update([
            'nombre' => $this->nombre_seleccionda
        ]);
        $this->dispatch('categoria-actualizado', 'La categoria se actulizo correctamente');
        $this->reset(['categoria_selecionada', 'nombre_seleccionda', 'sucursal_selecionado']);
    }
    public function eliminar_categoria($id)
    {
        Categoria::destroy($id);
        $this->dispatch('categoria-eliminada', 'categoria eliminada exitosamente');

    }

    public function render()
    {
        $id_empresa = Auth::user()->empresa->id;
        $this->categorias = DB::select('select * from categoria where id_empresa = ?', [$id_empresa]);

        $this->sucursales = DB::select('select * from sucursal where id_empresa = ?', [$id_empresa]);

        return view('livewire.categorias.show');
    }
}
