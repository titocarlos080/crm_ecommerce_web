<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    //
    public function index()
    {

        $planes= Plan::all();
        return view('welcome',['planes'=>$planes]);
    }
}
