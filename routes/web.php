<?php

use App\Exports\PedidosExport;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\catalogoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\StripeController;
use App\Livewire\Ecommerce\Catalogo;
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
// Route::middleware('empresa.subdomain')->group(function () {
//     // Rutas específicas para una empresa
//     Route::get('/', [LoginController::class, 'login'])->name('loginx');
// });

Route::middleware('guest')->group(
    function () {
        Route::get('/probar', function () {
            $id = request('id'); // Capturamos el valor del parámetro "id" de la URL
            return $id;
        });
        //  http://127.0.0.1:8000/probar?id=2

        Route::get('/send-email', [EmailController::class, 'index']);
        Route::get('/', [ServicioController::class, 'index'])->name('index');
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/login', [LoginController::class, 'authenticate']);
        Route::get('/registro', [RegistroController::class, 'registro'])->name('registro');
        Route::post('/registrar', [RegistroController::class, 'registrar'])->name('register');
        Route::get('/contrasena_ovidada', [LoginController::class, 'contrasena_ovidada'])->name('contrasena_ovidada');
        Route::post('/password_email', [LoginController::class, 'password_email'])->name('password_email');
        Route::get('/password_resset', [LoginController::class, 'password_resset'])->name('password_resset');
        Route::get('/new_password/{token}', [LoginController::class, 'new_password'])->name('new_password');
        Route::post('/save_new_password', [LoginController::class, 'save_new_password'])->name('save_new_password');
        Route::get('/{empresa}/catalogo', [catalogoController::class, 'catalogo'])->name('catalogo');
        //Route::get('/{empresa}/pedido', [catalogoController::class, 'pedido'])->name('pedido');

    }
);
Route::middleware('auth')->group(function () {
    Route::get('/empresa', [DashboardController::class, 'crm_vista'])->name('crm_empresa');
    Route::get('/empresa/empleados', [DashboardController::class, 'crm_empleados'])->name('empresa_empleados');
    Route::get('/empresa/clientes', [DashboardController::class, 'crm_clientes'])->name('empresa_clientes');
    Route::get('/empresa/gestionar_productos', [DashboardController::class, 'crm_productos'])->name('empresa_gestionar_productos');
    Route::get('/empresa/gestionar_pedidos', [DashboardController::class, 'crm_pedidos'])->name('empresa_gestionar_pedidos');
    Route::get('/crm/clientes_potenciales', [DashboardController::class, 'clientes_potenciales'])->name('clientes_potenciales');
    Route::get('/crm/empresa_equipos', [DashboardController::class, 'empresa_equipos'])->name('empresa_equipos');
    Route::get('/crm/crm_actividades', [DashboardController::class, 'crm_actividades'])->name('empresa_actividad');
    Route::get('/crm/flujo_trabajo', [DashboardController::class, 'flujo_trabajo'])->name('flujo_trabajo');
    Route::get('/crm/categorias', [DashboardController::class, 'categorias'])->name('categorias');
    Route::get('/crm/productos', [DashboardController::class, 'productos'])->name('productos');
    Route::get('/crm/sucursales', [DashboardController::class, 'sucursales'])->name('sucursales');
    Route::get('/crm/productos', [DashboardController::class, 'productos'])->name('productos');
    Route::get('/crm/ajustes', [DashboardController::class, 'ajustes'])->name('ajustes');
    Route::get('/crm/informes', [DashboardController::class, 'informes'])->name('informes');
    Route::get('/crm/reportes', [DashboardController::class, 'reportes'])->name('reportes');
    Route::get('/crm/export', [PedidosExport::class, 'collection'])->name('expot_excel');
    Route::get('/crm/export', [PedidosExport::class, 'pdf'])->name('expot_pdf');
    Route::get('/crm/pedidos', [DashboardController::class, 'pedido'])->name('pedidos');
    Route::get('/{empresa}/catalogo_admin', [catalogoController::class, 'catalogo'])->name('catalogo_admin');

    Route::get('/{empresa}/pedido', [catalogoController::class, 'pedido'])->name('pedido');
    Route::get('/success', [StripeController::class, 'success'])->name('success');
    Route::post('/session', [StripeController::class, 'session'])->name('session');
    Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
    Route::post('/stripe/webhook', [StripeController::class, 'webhook']);
    Route::get('/imprimir/boleta/{boleta}', [StripeController::class, 'boleta'])->name('boleta');
Route::get('/generate-pdf', [StripeController::class, 'generatePdf'])->name('filtro_pdf');
});
Route::middleware('auth.empleado')->group(function () {
    Route::get('/crm', [DashboardController::class, 'crm_vista'])->name('crm_dashboard');
    Route::get('/crm/empleados', [DashboardController::class, 'crm_empleados'])->name('crm_empleados');
    Route::get('/crm/clientes', [DashboardController::class, 'crm_clientes'])->name('crm_clientes');
    Route::get('/crm/gestionar_productos', [DashboardController::class, 'crm_productos'])->name('crm_gestionar_productos');
    Route::get('/crm/gestionar_pedidos', [DashboardController::class, 'crm_pedidos'])->name('crm_gestionar_pedidos');
    Route::get('/crm/cclientes_potenciales', [DashboardController::class, 'cclientes_potenciales'])->name('cclientes_potenciales');
});
Route::middleware('auth.admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin_vista'])->name('admin_vista');
    Route::get('/admin/gestionar_planes', [AdminController::class, 'admin_gestionar_planes'])->name('admin_gestionar_planes');
    Route::get('/admin/gestionar_empresas', [AdminController::class, 'admin_gestionar_empresas'])->name('admin_gestionar_empresas');
    Route::get('/admin/realizar_backup', [AdminController::class, 'realizar_backup'])->name('realizar_backup');
});



Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Ruta para manejar el caso en que la empresa no se encuentra
//Route::get('/servicios', [ServicioController::class, 'index'])->name('empresa.no_encontrada');
