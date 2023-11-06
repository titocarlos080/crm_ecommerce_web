<?php

namespace App\Livewire\FlujoTrabajo;

use App\Models\Actividad;
use App\Models\EstadoActividad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    public $estados;
    public $actividades;
    public function render()
    {    $user= Auth::user();
        $empresa= $user->empresa;
      
        $this->estados=$empresa->estados_actividad;
        $this->estados=DB::select('select * from estado_actividad where id_empresa = ?', [$empresa->id]);
    //   $this->actividades=Actividad::where('id_empresa',$empresa->id)->get();
       $this->actividades=DB::select('select * from actividad where id_empresa = ?', [$empresa->id]);
         return view('livewire.flujo-trabajo.show');
    }
}
