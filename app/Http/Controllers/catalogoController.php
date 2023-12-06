<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class catalogoController extends Controller
{
    public function catalogo($nombre)
    {
        $empresaX = Empresa::where('nombre', $nombre)->first();
        if ($empresaX) {
            # code...
            session(['empresa' => $empresaX]);
            return view('ecommerce.catalogo', ["empresa" => $empresaX]);
        } else {
            return  " No hay empresa";
        }
    } public function pedido($nombre)
    {
        $empresaX = Empresa::where('nombre', $nombre)->first();
        if ($empresaX) {
            # code...
            session(['empresa' => $empresaX]);
            return view('ecommerce.pedido', ["empresa" => $empresaX]);
        } else {
            return  " No hay empresa";
        }
    }
}
