<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function admin_vista()
    {
        logController::registrar_bitacora('ingreso a la vista vista dashboard', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('admin.dashboard_admin');
    }
    public function admin_gestionar_empresas()
    {
        logController::registrar_bitacora('ingreso a la vista vista gestionar empresas', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('admin.empresas');
    }
    public function admin_gestionar_planes()
    {
        logController::registrar_bitacora('ingreso a la vista vista gestionar planes', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));

        return view('admin.planes');
    }
    public function realizar_backup()
    {
        try {
            //code...
            // Ejecutar el comando de backup
            Artisan::call('backup:run');
           
            dd(Artisan::output());
            
            $rutaBackup = storage_path('app/CRM-ServicioSI2');
            $usuario = config('app.scp_usuario');

            //  $usuario = Config::get('app.scp_usuario');
            $servidor = config('app.scp_servidor');
            $rutaDestino = config('app.scp_ruta_destino');
            $clave =  config('app.scp_clave');
            $app= config('app.url');
            // Construir el comando de scp con la clave SSH
           // $comandoScp = "scp -i {$app.'/'.$clave} {$rutaBackup}/backup.zip {$usuario}@{$servidor}:{$rutaDestino}";
          
            //shell_exec($comandoScp);

            return "Backup ejecutado y copiado con éxito.";

            logController::registrar_bitacora('realizo backup ', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));
        } catch (\Throwable $th) {
            //throw $th;

            logController::registrar_bitacora('realizo backup pero fallo', Session::get('ip_cliente'), now()->format('Y-m-d H:i:s'));
            return "Ocurrio un error. \n".$th;
        }
    }
}
