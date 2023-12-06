<?php

namespace App\Livewire\Reporte;

use App\Exports\PedidosExport;
use App\Livewire\Ecommerce\DetallePedido;
use App\Models\Detalle_Pedido;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Show extends Component
{
    public $pedidos, $fecha_inferior = 0, $fecha_superior = 0,$detalle_pedido;
    public function exportarExcel()
    {
         
        return Excel::download(new PedidosExport(collect($this->pedidos)),'pedidos.xls');
    }   
    public function exportarPDF()
    {
         
        return   redirect()->route('expot_pdf');
        
    }
    public function getNombre($id)  {
        return Producto::where('id',$id)->first()->nombre;
    }

  public function filtrar()  {

dd('Hola');
}






    public function render()
    {
        $id_empresa = Auth::user()->empresa->id;

        if ($this->fecha_inferior != 0 and $this->fecha_superior != 0) {
            $this->pedidos = Pedido::where('id_empresa', $id_empresa)
                ->where('fecha', '>=', $this->fecha_inferior)
                ->where('fecha', '<=', $this->fecha_superior)
                ->get();
        } elseif ($this->fecha_inferior != 0 and $this->fecha_superior == 0) {
            $this->pedidos = Pedido::where('id_empresa', $id_empresa)
                ->where('fecha', '>=', $this->fecha_inferior)
                ->get();
        } elseif ($this->fecha_inferior == 0 and $this->fecha_superior != 0) {
            $this->pedidos = Pedido::where('id_empresa', $id_empresa)
                ->where('fecha', '<=', $this->fecha_superior)
                ->get();
        }else{
            $this->pedidos = DB::select('
            select pd.id, prd.nombre, dp.cantidad,pd.fecha,prd.precio, (dp.cantidad*prd.precio) subtotal
            from  pedido pd, detalle_pedido dp, producto prd
            where  pd.id= dp.id_pedido and dp.id_producto= prd.id and pd.id_empresa=?', [$id_empresa]);
       
        }

        return view('livewire.reporte.show');
    }
}
