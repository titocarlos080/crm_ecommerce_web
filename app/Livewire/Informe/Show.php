<?php

namespace App\Livewire\Informe;

use App\Exports\logExport;
use App\Http\Controllers\logController;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Show extends Component
{
    public function leerBitacora()
    {
        $log = logController::leer_bitacora();
        dd($log);
        return Excel::download(new logExport(collect($log)), 'pedidos.xls');

    } 
    
    public function render()
    {
        return view('livewire.informe.show');
    }
}
