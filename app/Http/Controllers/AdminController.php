<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function admin_vista()
    {
        return view('admin.dashboard_admin');
    } 
     public function admin_gestionar_empresas()
    {
        return view('admin.empresas');
    } 
    public function admin_gestionar_planes()
    {
        return view('admin.planes');
    }
}
