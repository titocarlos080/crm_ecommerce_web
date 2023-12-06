<?php

namespace App\Livewire\Dashboard;

use App\Models\Detalle_Pedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    public $pedidos;
    public $pedidos_graficos=[];
    public $pedidosX ;
    public $productos ;

    public function pedidos()
    {
    }
    public function render()
    {

        $empresa_id =  Auth::user()->empresa->id;

      $this->productos= DB::select('select p.id,p.nombre, count(dp.id_producto) as cantidad, sum(cast(dp.precio_parcial as double precision))as total
      from detalle_pedido dp, producto p 
      where dp.id_producto= p.id and p.id_empresa = ?
      group by p.id
      order by total desc 
      limit 5',[$empresa_id]);

 
        $this->pedidos_graficos =  DB::select('select p.id,sum(cast(dp.precio_parcial as double precision))  total
        from detalle_pedido   dp, pedido   p
        where dp.id_pedido = p.id and p.id_empresa=?
        group by p.id;', [$empresa_id]);
 

         return view('livewire.dashboard.show');
    }
}
