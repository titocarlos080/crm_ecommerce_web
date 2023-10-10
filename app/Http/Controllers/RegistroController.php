<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    //
    public function registro()
    {
        return view('auth.register');
    }   
      public function registrar()
    {
        return dd('auth.register');
    }  

}
