<?php

namespace App\Livewire\Ecommerce;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Catalogo extends Component
{
    public $productos;
    public $categoria_seleccionada = '';
    public $empresa = '';
    
    
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
        $empresa_id = Auth::user()->empresa->id;
        if ($this->categoria_seleccionada == '') {
            # code...
            $this->productos = DB::select('select * from producto where id_empresa = ?', [$empresa_id]);
        } else {
            $this->productos = DB::select('select * from producto where id_empresa = ? and id_categoria=?', [$empresa_id, $this->categoria_seleccionada]);
        }
        return view('livewire.ecommerce.catalogo');
    }
}
