<?php

namespace App\Livewire\Ecommerce;

use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Catalogo extends Component
{
    public $productos;
    public $categoria_seleccionada;
    public $categorias = '';
    public $empresa;
    public $buscar;
    public $nombre_empresa = '';

    public function mount()
    {
        $empresa = session('empresa');
        $this->categoria_seleccionada = 0;
        if ($empresa) {

            $this->empresa = $empresa;
        }
    }



    public function cambiarcategoria($id)
    {

        $this->categoria_seleccionada = $id;
    }
    public function todascategorias()
    {
        $this->categoria_seleccionada = '';
    }
    public function render()
    {

        if ($this->categoria_seleccionada == 0) {
            # code...
            $this->productos = DB::select(
                'SELECT * FROM producto WHERE id_empresa = ? AND nombre LIKE ?',
                [$this->empresa->id, '%' . $this->buscar . '%']
            );
        } else {
            $this->productos = DB::select('SELECT * from producto where id_empresa = ? and id_categoria = ? and nombre LIKE ?', [$this->empresa->id, $this->categoria_seleccionada, '%' . $this->buscar . '%']);
        }
        $this->categorias = DB::select('SELECT * from categoria where id_empresa = ?', [$this->empresa->id]);

        return view('livewire.ecommerce.catalogo');
    }
}
