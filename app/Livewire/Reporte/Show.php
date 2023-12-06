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
    public $pedidos, $fecha_inferior = 0, $fecha_superior = 0, $detalle_pedido, $swap = false;
    public function exportarExcel()
    {

        return Excel::download(new PedidosExport(collect($this->pedidos)), 'pedidos.xls');
    }
    public function exportarPDF()
    {

        session(['pedidos_filtro' => $this->pedidos]);

      return redirect()->route('filtro_pdf'); 
    }

    public function pdf()
    {
        $pdf = Pdf::loadView('pdf.reportes-pedido');
        $empresa = Auth::user()->empresa;

        // logController::registrar_bitacora('genero un reporte PDF de Pedido', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));
        return   $pdf->stream('doc.pdf');
    }
    public function getNombre($id)
    {
        return Producto::where('id', $id)->first()->nombre;
    }

    public function filtrar()
    {
        try {
            //code...
            $this->validate([
                'fecha_inferior' => 'required|date',
                'fecha_superior' => 'required|date|after_or_equal:fecha_inferior',
            ]);
            $this->swap = true;
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('alerta-fecha', 'Error al selecionar fecha');
        }
    }






    public function render()
    {
        $id_empresa = Auth::user()->empresa->id;

        if ($this->swap) {
            $this->pedidos = DB::select(
                '
            select pd.id, prd.nombre, dp.cantidad,pd.fecha,prd.precio, (dp.cantidad*prd.precio) subtotal
            from  pedido pd, detalle_pedido dp, producto prd
            where  pd.id= dp.id_pedido and dp.id_producto= prd.id and pd.id_empresa=? and date(pd.fecha) between  ? and  ?',
                [$id_empresa, $this->fecha_inferior, $this->fecha_superior]
            );
        } else {
            $this->pedidos = DB::select('
            select pd.id, prd.nombre, dp.cantidad,pd.fecha,prd.precio, (dp.cantidad*prd.precio) subtotal
            from  pedido pd, detalle_pedido dp, producto prd
            where  pd.id= dp.id_pedido and dp.id_producto= prd.id and pd.id_empresa=?', [$id_empresa]);
        }
        session(['pedidos_filtro' => $this->pedidos]);

        return view('livewire.reporte.show');
    }
}
