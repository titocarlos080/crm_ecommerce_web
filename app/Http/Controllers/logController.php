<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class logController extends Controller
{
    public static function registrar_bitacora($descripcion, $ip_cliente, $fecha_cliente)
    {
        $usuario = Usuario::where('id', Auth::user()->id)->first();
        $id_empresa = $usuario->empresa->id;
        $fecha = date('Y-m-d H:i:s');
        $historialFile = storage_path('app/historial_' . $id_empresa . '.txt');
        $evento = $usuario->nombre . ' ' . $descripcion . ' IP:' . $ip_cliente . ' Fecha_cliente:' . $fecha_cliente . ' Fecha_servidor:' . $fecha;
        // Comprobar si el archivo existe
        if (file_exists($historialFile)) {
            // Si el archivo existe, añadir el evento al contenido existente
            $historial = file_get_contents($historialFile);
            $historial .= $evento . "\n";
        } else {
            // Si el archivo no existe, crearlo y añadir el evento
            $historial = $evento . "\n";
        }
        // Guardar el contenido en el archivo
        file_put_contents($historialFile, $historial);
    }


    public static function leer_bitacora()
    {
        $usuario = Usuario::where('id', Auth::user()->id)->first();
        $id_empresa = $usuario->empresa->id;
        $historialFile = storage_path('app/historial_' . $id_empresa . '.txt');

        // Verifica si el archivo existe antes de intentar leerlo
        if (file_exists($historialFile)) {
            // Lee el contenido del archivo
            $contenido = file_get_contents($historialFile);

            // Haz lo que necesites con el contenido, por ejemplo, imprimirlo
            return $contenido;
        } else {
            dd( "El archivo no se encontró.");
        }
    }
}
