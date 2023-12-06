<?php

namespace App\Exports;

use App\Http\Controllers\logController;
use App\Models\Pedido;
use App\Models\Reporte;
use App\Models\Usuario;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;

class PedidosExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $data;
    public function __construct($var)
    {
        $this->data = $var;
    }

    public function collection()
    {
        return $this->data;
    }
    public function headings(): array
    {
        return [
            'Nro',
            'Producto',
            'Cantidad',
            'Fecha',
            'Precio',
            'SubTotal',
        ];
    }


    public function pdf()
    {
        $pdf = Pdf::loadView('pdf.reportes-pedido');
        $empresa = Auth::user()->empresa;
        $reporte = new  Reporte();
        $reporte->id_empresa = $empresa->id;
        $reporte->save();
        $nombre_pdf = $pdf->storeAs("public/reportes/{$empresa->nombre}", $reporte->id . '.pdf');
        $reporte->update(['nombre' =>  $nombre_pdf]);
        logController::registrar_bitacora('genero un reporte PDF de Pedido', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));
        return   $pdf->stream('doc.pdf');
    } 



}
