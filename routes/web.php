<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ServicioController;

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
        Route::get('/', [ServicioController::class, 'index'])->name('index');
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/login', [LoginController::class, 'authenticate']);
        Route::get('/registro', [RegistroController::class, 'registro'])->name('registro');
        Route::post('/registrar', [RegistroController::class, 'registrar'])->name('register');
    }
);

Route::middleware(['auth.empresa', 'auth.empleado'])->group(function () {
    Route::get('/crm', [DashboardController::class, 'crm'])->name('dashboard');
    Route::get('/crm/gestionar_productos', [DashboardController::class, 'productos'])->name('gestionar_productos');
    Route::get('/crm/gestionar_pedidos', [DashboardController::class, 'pedidos'])->name('gestionar_pedidos');
    Route::get('/crm/gestionar_sucursales', [DashboardController::class, 'sucursales'])->name('gestionar_sucursales');
});
