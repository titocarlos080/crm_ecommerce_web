<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'tenant',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    
    // Route::get('/send-email', [EmailController::class, 'index']);
    // Route::get('/', [ServicioController::class, 'index'])->name('index');
    // Route::get('/login', [LoginController::class, 'login'])->name('login');
    // Route::post('/login', [LoginController::class, 'authenticate']);
    // Route::get('/registro', [RegistroController::class, 'registro'])->name('registro');
    // Route::post('/registrar', [RegistroController::class, 'registrar'])->name('register');
    // Route::get('/contrasena_ovidada', [LoginController::class, 'contrasena_ovidada'])->name('contrasena_ovidada');
    // Route::post('/password_email', [LoginController::class, 'password_email'])->name('password_email');
    // Route::get('/password_resset', [LoginController::class, 'password_resset'])->name('password_resset');
    // Route::get('/new_password/{token}', [LoginController::class, 'new_password'])->name('new_password');
    // Route::post('/save_new_password', [LoginController::class, 'save_new_password'])->name('save_new_password');



});
