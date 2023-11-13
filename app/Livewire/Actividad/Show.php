<?php

namespace App\Livewire\Actividad;

use App\Http\Controllers\logController;
use App\Models\Actividad;
use App\Models\EstadoActividad;
use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Show extends Component
{
    public $estados;
    #[Rule('required|min:3')]
    public $estado_nombre;
    public $crear_tarea = false;
    public $crear_estado = false;
    public $actividad_tarea;
    public $encargado_tarea;
    public $encargados;
    public $actividades;
    public $empresa_id;
    public $contenido;
    public $finalizado=false;

    public function crear_nueva_actividad()
    {
    }
    public function crear_tareas($id)
    {     //           <!-- id | contenido | finalizado | id_grupo_usuario | id_actividad -->

        $this->crear_tarea = true;
        $this->actividad_tarea = $id;
        $grupo_aux = DB::table('actividad')
            ->select('id_grupo')
            ->where('id', $this->actividad_tarea)
            ->first();     
        $this->encargados = DB::select('select * from grupo_usuario where id_grupo=?', [$grupo_aux->id_grupo]);
    }
    public function crear_estados()
    {
        $this->validate();
        $estado = new  EstadoActividad();
        $estado->nombre = $this->estado_nombre;
        $estado->id_empresa = $this->empresa_id;
        $estado->save();
        $this->reset('estado_nombre');
    } public function crear_nueva_tarea()
    { 
        $tarea= new Tarea();
        
        $tarea->contenido= $this->contenido;;
        $tarea->finalizado=$this->finalizado;;
        $tarea->id_grupo_usuario=$this->encargado_tarea;
        $tarea->id_actividad=$this->actividad_tarea;
        
       $tarea->save();
       logController::registrar_bitacora('creo nueva tarea ID:'.$tarea->id.'_',Session::get('ip_cliente'),now()->format('Y-m-d H:i:s'));

      $this->reset('contenido','finalizado','encargado_tarea','actividad_tarea');

    }


     



    public function render()
    {
        $this->empresa_id = Auth::user()->empresa->id;
        $this->estados = DB::select('select * from estado_actividad where id_empresa = ?', [$this->empresa_id]);
         
        $this->actividades =  DB::select('select actividad.id,actividad.titulo ,actividad.fecha_inicio,actividad.fecha_fin, estado_actividad.nombre estado, actividad.id_grupo ,actividad.id_lead, actividad.id_empresa 
        from actividad,estado_actividad
        where  actividad.id_estado=estado_actividad.id and 
        actividad.id_empresa = ?', [$this->empresa_id]);
        return view('livewire.actividad.show');
    }
}
