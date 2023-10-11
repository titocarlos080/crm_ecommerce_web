<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ServicioController;
use App\Models\Empresa;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(
    function () {
        Route::get('/probar', function () {
            $id = request('id'); // Capturamos el valor del parámetro "id" de la URL
            return $id;
        });
        //  http://127.0.0.1:8000/probar?id=2

        Route::get('/', [ServicioController::class, 'index'])->name('index');
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/login', [LoginController::class, 'authenticate']);
        Route::get('/registro', [RegistroController::class, 'registro'])->name('registro');
        Route::post('/registrar', [RegistroController::class, 'registrar'])->name('register');
    }
);
Route::middleware('auth.empresa')->group(function () {
    Route::get('/empresa', [DashboardController::class, 'crm_vista'])->name('crm_empresa');
    Route::get('/empresa/empleados', [DashboardController::class, 'crm_empleados'])->name('empresa_empleados');
    Route::get('/empresa/clientes', [DashboardController::class, 'crm_clientes'])->name('empresa_clientes');
    Route::get('/empresa/gestionar_productos', [DashboardController::class, 'crm_productos'])->name('empresa_gestionar_productos');
    Route::get('/empresa/gestionar_pedidos', [DashboardController::class, 'crm_pedidos'])->name('empresa_gestionar_pedidos');
});
Route::middleware('auth.empleado')->group(function () {
    Route::get('/crm', [DashboardController::class, 'crm_vista'])->name('crm_dashboard');
    Route::get('/crm/empleados', [DashboardController::class, 'crm_empleados'])->name('crm_empleados');
    Route::get('/crm/clientes', [DashboardController::class, 'crm_clientes'])->name('crm_clientes');
    Route::get('/crm/gestionar_productos', [DashboardController::class, 'crm_productos'])->name('crm_gestionar_productos');
    Route::get('/crm/gestionar_pedidos', [DashboardController::class, 'crm_pedidos'])->name('crm_gestionar_pedidos');
});
Route::middleware('auth.admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin_vista'])->name('admin_vista');
    Route::get('/admin/gestionar_planes', [AdminController::class, 'admin_gestionar_planes'])->name('admin_gestionar_planes');
    Route::get('/admin/gestionar_empresas', [AdminController::class, 'admin_gestionar_empresas'])->name('admin_gestionar_empresas');
});



Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
