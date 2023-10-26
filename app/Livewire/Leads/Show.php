<?php

namespace App\Livewire\Leads;

use App\Models\Actividad;
use App\Models\EstadoActividad;
use App\Models\Grupo;
use App\Models\Lead;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Component;

use function Laravel\Prompts\select;

class Show extends Component
{
    public $vistacrear = false;
    public $vistaedit = false;
    public $crear_actividad = false;
    public $leads;
    public $clientes;
    public $empresa_id;
    public $cliente_seleccionado;
    public $lead_seleccionado;
    public $ganancia_esperada;
    public $grupos;
    public $estado_actividades;

    public $estado_seleccionado, $actividad_titulo, $actividad_f_inicio, $actividad_f_fin, $id_grupo_seleccionado;

    public $estados;


    //---------------------LEADS-----------------------------
    //---------------------ACTIVIDADES-----------------------------

    public function vistacrea()
    {
        $this->vistacrear = true;
    }
    public function crear_actividades($id)
    {
        $this->lead_seleccionado = $id;

        $this->crear_actividad = true;
    }
    public function crear_nueva_actividad()
    {
        //public $estado_seleccionado,$actividad_titulo, $actividad_f_inicio, $actividad_f_fin, $id_grupo_seleccionado;
        // dd($this->actividad_f_inicio,$this->actividad_titulo, $this->id_grupo_seleccionado, $this->lead_seleccionado);

        $this->validate([
            'estado_seleccionado' => 'required',
            'actividad_titulo' => 'required',
            'actividad_f_inicio' => 'required|date',
            'actividad_f_fin' => 'required|date|after:actividad_f_inicio',
            'id_grupo_seleccionado' => 'required',
        ]);
        // id | titulo | fecha_inicio | fecha_fin | id_estado | id_grupo | id_lead | id_empresa
        $actividad = new Actividad();
        $actividad->titulo = $this->actividad_titulo;
        $actividad->fecha_inicio = $this->actividad_f_inicio;
        $actividad->fecha_fin = $this->actividad_f_fin;
        $actividad->id_estado = $this->estado_seleccionado;
        $actividad->id_grupo = $this->id_grupo_seleccionado;
        $actividad->id_lead = $this->lead_seleccionado;
        $actividad->id_empresa = $this->empresa_id;
        $actividad->save();
        $this->reset(
            'estado_seleccionado',
            'actividad_titulo',
            'actividad_f_inicio',
            'actividad_f_fin',
            'id_grupo_seleccionado'
        );
     }
    //---------------------LEADS-----------------------------
    public function vistaedi()
    {
        $this->vistaedit = true;
    }
    public function nuevoLeads()
    {
        $this->vistacrear = true;
    }
    public function crear_leads()
    {
        //  protected $fillable = ['id', 'nombre', 'email', 'telefono', 'ganancia_esperada','id_empresa'];

        $cliente = Usuario::find($this->cliente_seleccionado);
        $lead = new Lead();

        $lead->nombre = $cliente->nombre;
        $lead->email = $cliente->email;
        $lead->telefono = $cliente->telefono;
        $lead->ganancia_esperada = $this->ganancia_esperada;
        $lead->id_empresa = $cliente->id_empresa;
        $lead->save();
    }
    public function editar_leads($id)
    {
        $this->vistacrear = false;
        $this->vistaedit = true;
    }




    public function render()
    {
        $this->empresa_id = Auth::user()->empresa->id;
        $this->estado_actividades = DB::select('select * from estado_actividad where id_empresa = ?', [$this->empresa_id]);
        $this->clientes = DB::select('select * from usuario where id_empresa=? and id_rol=?', [$this->empresa_id, 4]);
        $this->grupos = DB::select('select * from grupo where id_empresa=?', [$this->empresa_id]);
        $this->leads = DB::select('select * from lead where id_empresa=?', [$this->empresa_id]);
        return view('livewire.leads.show');
    }
}
