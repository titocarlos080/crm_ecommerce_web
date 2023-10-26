<?php

namespace App\Livewire\Equipos;

use App\Models\Grupo;
use App\Models\GrupoUsuario;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{

    public $vistacrear = false;
    public $vistaedit = false;
    public $crear_actividad = false;
    public $agregar_miembros = false;
    public $cliente_seleccionado;
    public $equipo_seleccionado;
    public $id_empresa;
    public $equipos;
    public $nombre;
    public $mensaje;
    public $estado_mensaje;
    public $usuarios_no_miembros;
    public $usuarios_miembros;
    public $usuario_para_grupo;
    public function crear_equipo()
    {
        try {
            //code...
            $grupo = new Grupo();
            $grupo->nombre = $this->nombre;
            $grupo->id_empresa = $this->id_empresa;
            $grupo->save();
            $this->reset('nombre');
            $this->mensaje = 'Grupo ' . $grupo->nombre . ' fue creado correctamente';
            $this->estado_mensaje = false;
        } catch (\Throwable $th) {
            //throw $th;
            $this->mensaje = 'Error. intente nuevamente';
            $this->estado_mensaje = true;
        }
    }
    public function ver_equipo($id)
    {
        $this->equipo_seleccionado = $id;

        $this->agregar_miembros = true;
        $this->usuarios_no_miembros = DB::select(
            'select usuario.* 
             from usuario
             where id_empresa=? and id_rol=3 and  id not in (
                 select id_usuario 
                 from grupo_usuario
                 where  grupo_usuario.id_grupo=?
             ) ',
            [$this->id_empresa, $this->equipo_seleccionado]
        );

        $this->usuarios_miembros = DB::select('select * from grupo_usuario where id_grupo = ?', [$this->equipo_seleccionado]);
    }
    public function agregar_miembro()
    {

        $this->validate(['usuario_para_grupo' => 'required', 'equipo_seleccionado' => 'required']);
        $user = Usuario::find($this->usuario_para_grupo);
        $miembro = new GrupoUsuario();
        $miembro->nombre = $user->nombre;
        $miembro->id_usuario = $user->id;
        $miembro->id_grupo = $this->equipo_seleccionado;
        $miembro->save();
        $this->reset('usuario_para_grupo');
    }

    public function render()
    {
        $this->id_empresa = Auth::user()->empresa->id;
        $this->equipos = DB::select('select * from grupo where id_empresa=?', [$this->id_empresa]);
        return view('livewire.equipos.show');
    }
}
