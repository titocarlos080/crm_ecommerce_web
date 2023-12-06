<?php

namespace App\Livewire\Ecommerce;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetallePedido extends Component
{

    public function imprimir($pedido){
        dd('HOla');
    $empresa= Auth::user()->empresa;
      $pdf= Pdf::loadView('pdf.nota_pedido',['empresa'=>$empresa,'pedido',$pedido]);
       $pdf->stream('recibo.pdf');
    }
    public function render()
    {
        return view('livewire.ecommerce.detalle-pedido');
    }
}
