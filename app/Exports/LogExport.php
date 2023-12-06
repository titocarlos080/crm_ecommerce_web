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

class logExport implements FromCollection
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
   
    public function array(): array
    {
        // Divide el texto en líneas y devuelve un array
        return explode("\n", $this->data);
    }

    public function headings(): array
    {
        return [
            'Log Entry',
        ];
    }

   



}
