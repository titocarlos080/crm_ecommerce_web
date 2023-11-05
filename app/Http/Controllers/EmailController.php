<?php

namespace App\Http\Controllers;

use App\Mail\EmailPrueba;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'App CRM ecommerce',
            'body' => 'cuerpo del email',
        ];
        Mail::to('titocarlos080@gmail.com')->send(new EmailPrueba($data));
        dd('correo enviado');
    }
 



}
