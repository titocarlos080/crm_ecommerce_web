<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function admin_vista()
    {
        return view('crm.dashboard');
    }  public function admin_gestionar_empresas()
    {
        return dd('crm.dashboard');
    }
}
