<?php

use App\Models\Grupo;
use App\Models\GrupoUsuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

function verificar_permiso($permiso)
{
    $user = Auth::user();
    $rol = $user->rol;
    if ($rol && $rol->nombre === "Empresa") {
        return true;
    }
    
    $gp = GrupoUsuario::where('id_usuario', $user->id)->distinct()->get();
    $ids = $gp->map(fn ($item) => $item->id)->toArray();

    $grupos = Grupo::whereIn('id', $ids)->get();
    foreach ($grupos as $grupo) {
        if ($grupo->permisos->contains('nombre', $permiso)) {
            return true;
        }
    }
    return false;
}



// public $fillable= ['id','fecha' ,'descripcion','id_empresa'];
// $historial = new Historial();
// $historial->fecha= $fecha;
// $historial->descripcion= $descripcion;
// $historial->id_empresa= $id_empresa;
// $historial->save();    
