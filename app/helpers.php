<?php

use App\Models\Historial;
use App\Models\Permiso;
use Illuminate\Support\Facades\Auth;
function verificar_permiso($permiso){
    // public $fillable= ['id','fecha' ,'descripcion','id_empresa'];
    $user= Auth::user();
    $rol= $user->rol;
    if ( $rol && $rol->nombre === "Administrador") {
      
    return true;
    }

    return ($rol && $rol->permisos->contains('nombre',$permiso));

  }
function registrar_bitacora($descripcion,$fecha,$id_empresa){
  // public $fillable= ['id','fecha' ,'descripcion','id_empresa'];
$historial = new Historial();
$historial->fecha= $fecha;
$historial->descripcion= $descripcion;
$historial->id_empresa= $id_empresa;
$historial->save();    


}