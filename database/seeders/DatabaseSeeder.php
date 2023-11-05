<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Empresa;
use App\Models\Plan;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

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
         'nombre'=>'Administrador',
         'id_empresa'=> 1
      ]);
       Rol::factory()->create([
         'nombre'=>'Empresa',
         'id_empresa'=> 1
      ]);
       Rol::factory()->create([
         'nombre'=>'Empleado',
         'id_empresa'=> 1
      ]);
       Rol::factory()->create([
         'nombre'=>'Cliente',
         'id_empresa'=> 1
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
    }
}
