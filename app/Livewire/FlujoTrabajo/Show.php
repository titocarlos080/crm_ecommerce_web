<?php

namespace App\Livewire\FlujoTrabajo;

use App\Models\Actividad;
use App\Models\EstadoActividad;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $estados;
    public $actividades;
    public function render()
    {    $user= Auth::user();
        $empresa= $user->empresa;
      
        $this->estados=$empresa->estados_actividad;
       $this->actividades=Actividad::where('id_empresa',$empresa->id)->get();
         return view('livewire.flujo-trabajo.show');
    }
}
