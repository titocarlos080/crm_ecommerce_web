<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Pedido;
use App\Models\Pedido_Estado;
use App\Models\Permiso;
use App\Models\Plan;
use App\Models\Producto;
use App\Models\Rol;
use App\Models\Sucursal;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\Categoria::factory(10)->usuario();
        Plan::factory()->create(
            [   //'Plan Premium', 39.00, '50 GB', '200 GB', true, 5, true, true
                'nombre' => 'Plan Premium',
                'precio' => 39.00,
                'almacenamiento' =>  '50 GB',
                'ancho_de_banda' => '200 GB',
                'logo' => '/assets/images/users/plan_premiun.png',
                'dominio' =>  true,
                'soporte_por_correo' => true,
                'soporte_24x7' => true,
                'usuarios' => 100
            ]
        );

        Empresa::factory()->create([
            'nombre' => 'ADM_CENTER',
            'email' => 'proyectostito12@gmail.com',
            'descripcion' => 'empresa central',
            'id_plan' => 1,
            'logo' => '/assets/images/users/proyecto.png'
        ]);

        Rol::factory()->create([
            'nombre' => 'Administrador',
            'id_empresa' => 1
        ]);
        Rol::factory()->create([
            'nombre' => 'Empresa',
            'id_empresa' => 1
        ]);
        Rol::factory()->create([
            'nombre' => 'Empleado',
            'id_empresa' => 1
        ]);
        Rol::factory()->create([
            'nombre' => 'Cliente',
            'id_empresa' => 1
        ]);

        /*INSERT INTO usuario (nombre, email, foto, telefono, password, id_rol, id_empresa)
VALUES('Tito Carlos', 'titocarlos080@gmail.com', 'ruta/foto.jpg', '123456789', '$2y$10$rBxTIT8OiLpYoE6k2yML9eWLbmWPnwNuU5d4Ed29mrsC9o52HuVYa', 1, 1);
*/
        Usuario::factory()->create([
            'nombre' => 'Tito Carlos',
            'email' => 'proyectostito12@gmail.com',
            'foto' => '/assets/images/users/adm_proyecto.jpg',
            'telefono' => '72465939',
            'password' => '$2y$10$rBxTIT8OiLpYoE6k2yML9eWLbmWPnwNuU5d4Ed29mrsC9o52HuVYa',
            'id_rol' => 1,
            'id_empresa' => 1

        ]);
        //-----segunda enmpresa 
        Empresa::factory()->create([
            'nombre' => 'IDATA',
            'email' => 'data43003@gmail.com',
            'descripcion' => 'empresa comercial',
            'id_plan' => 1,
            'logo' => '/assets/images/users/EMPRESA2.png'
        ]);
        Usuario::factory()->create([
            'nombre' => 'Pedro Data',
            'email' => 'data43003@gmail.com',
            'foto' => '/assets/images/users/adm_proyecto.jpg',
            'telefono' => '72465939',
            'password' => '$2y$10$rBxTIT8OiLpYoE6k2yML9eWLbmWPnwNuU5d4Ed29mrsC9o52HuVYa',
            'id_rol' => 2,
            'id_empresa' => 2

        ]);

        Pedido_Estado::create(['nombre' => 'solicitando']);
        Pedido_Estado::create(['nombre' => 'aceptado']);
        Pedido_Estado::create(['nombre' => 'enviando']);
        Pedido_Estado::create(['nombre' => 'enviado']);
        Pedido_Estado::create(['nombre' => 'entregado']);


        Usuario::factory()->count(20)->empleados()->create();
        Usuario::factory()->count(20)->clientes()->create();


        Sucursal::factory()->create(['nombre' => 'NORTE', 'id_empresa' => 2]);
        Sucursal::factory()->create(['nombre' => 'CENTRO', 'id_empresa' => 2]);
        Sucursal::factory()->create(['nombre' => 'SUR', 'id_empresa' => 2]);

        // Categoria::factory()->count(3)->empresa2()->create();
        Categoria::factory()->count(5)->empresa2(1)->create();
        Categoria::factory()->count(5)->empresa2(2)->create();
        Categoria::factory()->count(5)->empresa2(3)->create();
        Producto::factory()->count(10)->empresa2(1, 1)->create();
        Producto::factory()->count(10)->empresa2(1, 2)->create();
        Producto::factory()->count(10)->empresa2(1, 3)->create();
        Producto::factory()->count(10)->empresa2(2, 3)->create();
        Producto::factory()->count(10)->empresa2(2, 3)->create();
        Producto::factory()->count(10)->empresa2(2, 3)->create();
        Producto::factory()->count(10)->empresa2(3, 3)->create();

        Pedido::factory()->count(10)->create();

        Permiso::factory()->create(['nombre' => 'ventas']);
        Permiso::factory()->create(['nombre' => 'clientes_potenciales']);
        Permiso::factory()->create(['nombre' => 'informes']);
        Permiso::factory()->create(['nombre' => 'configuraciones']);
        Permiso::factory()->create(['nombre' => 'sucursales']);
        Permiso::factory()->create(['nombre' => 'categoria']);
        Permiso::factory()->create(['nombre' => 'productos']);
        Permiso::factory()->create(['nombre' => 'flujo_trabajo']);
        Permiso::factory()->create(['nombre' => 'empresa_actividad']);
        Permiso::factory()->create(['nombre' => 'empresa_equipos']);
        Permiso::factory()->create(['nombre' => 'empresa_clientes']);
        Permiso::factory()->create(['nombre' => 'agregar_producto']);
        Permiso::factory()->create(['nombre' => 'eliminar_producto']);
        Permiso::factory()->create(['nombre' => 'editar_producto']);
        Permiso::factory()->create(['nombre' => 'crear_empleado']);
        Permiso::factory()->create(['nombre' => 'eliminar_empleado']);
    }
}
