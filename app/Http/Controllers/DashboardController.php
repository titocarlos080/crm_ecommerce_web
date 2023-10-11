<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function crm_vista()
    {
        return view('crm.dashboard');
    }
    public function crm_empleados()
    {
        return view('crm.empleados');
    }
    public function crm_clientes()
    {
        return view('crm.clientes');
    }
    public function crm_productos()
    {
        return dd('crm_productos');
    }
    public function crm_pedidos()
    {
        return dd('crm_pedidos');
    }
}
