<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{


    public function crm_vista()
    {
        logController::registrar_bitacora('ingreso a la vista crm', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));
        return view('crm.dashboard');
    }
    public function crm_empleados()
    {
        logController::registrar_bitacora('ingreso a la vista vistaempleado', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.empleados');
    }
    public function crm_clientes()
    {
        logController::registrar_bitacora('ingreso a la vista cliente', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.clientes');
    }
    public function crm_productos()
    {
        logController::registrar_bitacora('ingreso a la vista producto', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return dd('crm_productos');
    }
    public function clientes_potenciales()
    {
        logController::registrar_bitacora('ingreso a la vista leads', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.leads');
    }
    public function crm_pedidos()
    {
        logController::registrar_bitacora('ingreso a la vista vista pedidos', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return dd('crm_pedidos');
    }
    public function crm_actividades()
    {
        logController::registrar_bitacora('ingreso a la vista vista actividades', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.actividad');
    }
    public function empresa_equipos()
    {
        logController::registrar_bitacora('ingreso a la vista vista equipos', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.empresa_equipos');
    }
    public function flujo_trabajo()
    {
        logController::registrar_bitacora('ingreso a la vista vista flujo de trabajo', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.flujo_trabajo');   
    }
    public function categorias()
    {
        logController::registrar_bitacora('ingreso a la vista vista categorias', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.categorias');
    }
    public function productos()
    {
        logController::registrar_bitacora('ingreso a la vista vista gestionar productos', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.productos');
    }
    public function sucursales()
    {
        logController::registrar_bitacora('ingreso a la vista vista gestionar sucursales', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.sucursales');
    }
    public function ajustes()
    {
        logController::registrar_bitacora('ingreso a la vista vista gestionar ajustes', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.ajustes');
    }
    public function pedido()
    {
        logController::registrar_bitacora('ingreso a la vista vista gestionar pedidos', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.pedidos');
    } public function informes()
    {
        logController::registrar_bitacora('ingreso a la vista vista gestionar informes', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.informes');
    }
    public function reportes()
    {
        logController::registrar_bitacora('ingreso a la vista vista gestionar reportes', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('crm.reportes');
    }
}
