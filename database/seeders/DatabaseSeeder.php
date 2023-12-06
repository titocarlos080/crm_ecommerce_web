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

        Categoria::factory()->create(['nombre' => 'Swithes', 'id_sucursal' => 1, 'id_empresa' => 2]);
        Categoria::factory()->create(['nombre' => 'Computadoras', 'id_sucursal' => 1, 'id_empresa' => 2]);
        Categoria::factory()->create(['nombre' => 'Teclados', 'id_sucursal' => 2, 'id_empresa' => 2]);
        Categoria::factory()->create(['nombre' => 'Celulares', 'id_sucursal' => 3, 'id_empresa' => 2]);

        //categoria teclados
        Producto::factory()->create([
            'nombre' => 'Teclado knup',
            'imagen' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQj1NFPOq5JAWIBk_q8arRduv9ROtXY-XcliM7q2IT2iWvOO9eC8HTi98N7KlDEheQxFZs&usqp=CAU',
            'descripcion' => 'Teclado inalambrico con luces',
            'stock' => 23,
            'costo' => 130,
            'precio' => 150,
            'id_categoria' => 3,
            'id_sucursal' => 2,
            'id_empresa' => 2,

        ]);

        Producto::factory()->create([
            'nombre' => 'Teclado pequeño',
            'imagen' => 'https://www.techadvisor.com/wp-content/uploads/2022/11/marback_teclado.jpg?quality=50&strip=all&w=1024',
            'descripcion' => 'Teclado  color blanco',
            'stock' => 30,
            'costo' => 100,
            'precio' => 150,
            'id_categoria' => 3,
            'id_sucursal' => 2,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Teclado k630RGB',
            'imagen' => 'https://cdn.gameplanet.com/wp-content/uploads/2023/01/05133916/6950376772251-redragon-teclado-k630-dragonborn-negro-1.jpg',
            'descripcion' => 'Teclado  gaming',
            'stock' => 30,
            'costo' => 100,
            'precio' => 150,
            'id_categoria' => 3,
            'id_sucursal' => 2,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Teclado Gaming RGB 60%',
            'imagen' => '
            https://img.pccomponentes.com/articles/43/433862/5858-forgeon-clutch-teclado-gaming-rgb-60-switch-blue-opiniones.jpg',
            'descripcion' => 'Teclado gaming',
            'stock' => 30,
            'costo' => 100,
            'precio' => 150,
            'id_categoria' => 3,
            'id_sucursal' => 2,
            'id_empresa' => 2,

        ]);

        Producto::factory()->create([
            'nombre' => 'Teclado B.GamerPro',
            'imagen' => 'https://bgamer.pro/wp-content/uploads/2019/10/diti1-500x500.jpg',
            'descripcion' => 'Teclado gaming',
            'stock' => 30,
            'costo' => 100,
            'precio' => 150,
            'id_categoria' => 3,
            'id_sucursal' => 2,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Teclado KB869',
            'imagen' => 'https://r.btcdn.co/r/eyJzaG9wX2lkIjozOTUwLCJnIjoiMTAwMHgifQ/96fb868b9b63b51/749452-1560750-1.jpg',
            'descripcion' => 'Teclado gaming',
            'stock' => 30,
            'costo' => 100,
            'precio' => 150,
            'id_categoria' => 3,
            'id_sucursal' => 2,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'K65 PRO MINI',
            'imagen' => 'https://www.lavanguardia.com/andro4all/hero/2023/07/corsair-k65-pro-mini-rgb-portada.jpg?width=768&aspect_ratio=16:9&format=nowebp',
            'descripcion' => 'Teclado gaming',
            'stock' => 50,
            'costo' => 100,
            'precio' => 150,
            'id_categoria' => 3,
            'id_sucursal' => 2,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Teclado MK60 ',
            'imagen' => 'https://www.evenpc.com/system/productos/productos/image_1s/000/004/971/original/mk60-color-2_960x480.jpg?1695722651',
            'descripcion' => 'Teclado gaming',
            'stock' => 30,
            'costo' => 100,
            'precio' => 150,
            'id_categoria' => 3,
            'id_sucursal' => 2,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Teclado Custon',
            'imagen' => 'https://www.profesionalreview.com/wp-content/uploads/2022/03/teclado-custom-guia-1280x720.jpg',
            'descripcion' => 'Teclado Blanco',
            'stock' => 30,
            'costo' => 100,
            'precio' => 150,
            'id_categoria' => 3,
            'id_sucursal' => 2,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Teclado QMK',
            'imagen' => 'https://cdnx.jumpseller.com/prismo-store/image/32740603/Screenshot_2023-03-02_at_14.37.21.png?1680301037',
            'descripcion' => 'Teclado inalambrico',
            'stock' => 30,
            'costo' => 100,
            'precio' => 150,
            'id_categoria' => 3,
            'id_sucursal' => 2,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Teclado D64L',
            'imagen' => 'https://m.media-amazon.com/images/I/71kHTvG-k-L._AC_SX679_.jpg',
            'descripcion' => 'Teclado Blanco',
            'stock' => 30,
            'costo' => 100,
            'precio' => 150,
            'id_categoria' => 3,
            'id_sucursal' => 2,
            'id_empresa' => 2,

        ]);

        //COMPUTADORAS
        Producto::factory()->create([
            'nombre' => 'Computadora Hp pavilon',
            'imagen' => 'https://ssl-product-images.www8-hp.com/digmedialib/prodimg/lowres/c07050238.png',
            'descripcion' => 'Teclado plateado',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 2,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Computadora Hp',
            'imagen' => 'https://revistasociosams.com/wp-content/uploads/2021/04/computadora-desktop-hp-ryzen-.png',
            'descripcion' => 'color plata, SO: windows 100',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 2,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Computadora Hp Pro 240 G9',
            'imagen' => 'https://www.copiadorasinnovadas.es/wp-content/uploads/2023/03/240.jpg',
            'descripcion' => 'Windows 11 home',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 2,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Laptop Hp Pro 240 G9',
            'imagen' => 'https://www.lenovo.com/medias/lenovo-thinkbook-brand-thinkbook-series-hero.png?context=bWFzdGVyfHJvb3R8NjU5MzJ8aW1hZ2UvcG5nfGhhNS9oNDQvMTYwNzk1MjMwODYzNjYucG5nfDgwMWVjYmU1ODA1MzE0YWZmODRiNjE1YmM0YTNhNjgyODBhOWIxNjI0MWJkNmVkMDE5Y2I3OTg1MWNmNWU0MWU',
            'descripcion' => 'Windows 11 home',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 2,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Lenovo ',
            'imagen' => 'https://www.lenovo.com/medias/thinkpadyoga.png?context=bWFzdGVyfHJvb3R8MTczOTJ8aW1hZ2UvcG5nfGg5MC9oMWEvOTUyNjEwNjY4NTQ3MC5wbmd8MzJiMmFiNDk5MzgwZjEzMWM5OTRhYTc1NjI1YzFjMzA1YTc1NmI5ODc4OGRhN2M0OTY4OWY1NzA0YjY4NmU4Mw&w=1920',
            'descripcion' => 'Windows 11 home',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 2,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Lenovo Gamming',
            'imagen' => 'https://www.lenovo.com/medias/lenovo-laptop-thinkpad-x1-carbon-gen-8-series.png?context=bWFzdGVyfHJvb3R8NzE4NzB8aW1hZ2UvcG5nfGgzZC9oZmQvMTQwODA0Njc3NjMyMzAucG5nfDg5MjlmYzA5YTBhMTdmMGRjYTQwM2VmYTFiY2U2Y2E4ZmY2YmYzZjUwZTUxNzJlMzk2MzBkYjFjN2E2MmJhNWM&w=1920',
            'descripcion' => 'Windows 11 home',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 2,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Toshiba ',
            'imagen' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRg6m8Lky9waTXH7X4bKoAzYcEnHI6BeIFxEg&usqp=CAU',
            'descripcion' => 'Windows 11 home',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 2,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Toshiba R30 ',
            'imagen' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsTx73YTiN9Q-4JnZVjacWNKhi3-fNqsetcA&usqp=CAU',
            'descripcion' => 'Windows 11 home',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 2,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Toshiba Satellite Radius 11 ',
            'imagen' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsTx73YTiN9Q-4JnZVjacWNKhi3-fNqsetcA&usqp=CAU',
            'descripcion' => 'Windows 11 home',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 2,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);

        //SWITCHES
        Producto::factory()->create([
            'nombre' => 'Switch 5 puertos',
            'imagen' => 'https://bolivia.solutekla.com/photo/1/tplink/switch/switch_poeswitch_poe_de_escritorio_gigabit_de_5_puertos_que_incluyen_4_puertos_poe_56_watts_de_presupuesto_de_potencia_caja_de_acero/switch_poeswitch_poe_de_escritorio_gigabit_de_5_puertos_que_incluyen_4_puertos_poe_56_watts_de_presupuesto_de_potencia_caja_de_acero_0001',
            'descripcion' => 'Switch pequeño',
            'stock' => 30,
            'costo' => 700,
            'precio' => 900,
            'id_categoria' => 1,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Switch 24 puertos',
            'imagen' => 'https://ekanet.es/7678-home_default/switch-de-red-con-24-puertos-gigabit-no-gestionables-gs324-100eus.jpg',
            'descripcion' => 'Switch Administrable',
            'stock' => 30,
            'costo' => 700,
            'precio' => 900,
            'id_categoria' => 1,
            'id_sucursal' => 1,
            'id_empresa' => 2,


        ]);
        Producto::factory()->create([
            'nombre' => 'Switch 16 puertos',
            'imagen' => 'https://static.tp-link.com/res/images/products/TL-SG1016DE_un_V2_1149_normal_0_20151123111845.jpg',
            'descripcion' => 'Swich Administrable',

            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 1,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Switch TL-SG3452',
            'imagen' => 'https://static.tp-link.com/overview_TL-SG3452%EF%BC%88UN)1_normal_1606297572488s.png',
            'descripcion' => 'Swich Administrable',

            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 1,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Switch TL-SG3452XP',
            'imagen' => 'https://static.tp-link.com/upload/image-header/TL-SG3452XP_UN_1.0_normal_20211223063002i.png',
            'descripcion' => 'Swich Administrable',

            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 1,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Switch  TL-SG3428',
            'imagen' => 'https://static.tp-link.com/TL-SG3428_UN_2.0_normal_1610956403939h.png',
            'descripcion' => 'Swich Administrable',

            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 1,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);
        Producto::factory()->create([
            'nombre' => 'Switch TL-SG3210XHP-M2',
            'imagen' => 'https://static.tp-link.com/1_normal_1606737666723o.png',
            'descripcion' => 'Swich Administrable',

            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 1,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);  Producto::factory()->create([
            'nombre' => 'Switch TL-SG3210
            ',
            'imagen' => 'https://static.tp-link.com/list-page_normal_1607079419437w.png',
            'descripcion' => 'Swich Administrable',

            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 1,
            'id_sucursal' => 1,
            'id_empresa' => 2,

        ]);


        //CELULARES
        Producto::factory()->create([
            'nombre' => 'CELULAR IPHONE 14 PRO 128GB NEGRO',
            'imagen' => 'https://www.tiendaamiga.com.bo/media/catalog/product/cache/deb88dadd509903c96aaa309d3e790dc/c/e/celular_iphone_14_pro_128gb_negro.jpg',
            'descripcion' => 'iPhone 14 Pro Negro. Diseñado para resistir tu día a día.',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 4,
            'id_sucursal' => 3,
            'id_empresa' => 2,

        ]);   Producto::factory()->create([
            'nombre' => 'Galaxy Z Flip5',
            'imagen' => 'https://samsungplusnuevo.s3.amazonaws.com/product-family-item-image/normal/product-family-item-image_FcIEgiLNVtY1HCdMRo5w.png',
            'descripcion' => ' ',
            'stock' => 30,
            'costo' => 8000,
            'precio' => 8928,
            'id_categoria' => 4,
            'id_sucursal' => 3,
            'id_empresa' => 2,

        ]);   Producto::factory()->create([
            'nombre' => 'Galaxy Z Fold5',
            'imagen' => 'https://samsungplusnuevo.s3.amazonaws.com/product-family-item-image/normal/product-family-item-image_EhcslTdeMHD5px9K0rLW.png',
            'descripcion' => 'Celular elegante',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 4,
            'id_sucursal' => 3,
            'id_empresa' => 2,

        ]);   Producto::factory()->create([
            'nombre' => 'Galaxy A54 5G',
            'imagen' => 'https://samsungplusnuevo.s3.amazonaws.com/product-family-item-image/normal/product-family-item-image_6iGYmv4h9BsbR5TwzMOL.png',
            'descripcion' => 'Caracteristicas buenas',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 4,
            'id_sucursal' => 3,
            'id_empresa' => 2,

        ]);   Producto::factory()->create([
            'nombre' => 'Galaxy S23 Ultra',
            'imagen' => 'https://samsungplusnuevo.s3.amazonaws.com/product-family-item-image/normal/product-family-item-image_Os1WeGPhpMBzHxUmjgc4.png',
            'descripcion' => 'Pantalla de 6,8 ',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 4,
            'id_sucursal' => 3,
            'id_empresa' => 2,

        ]);   Producto::factory()->create([
            'nombre' => 'Galaxy Z Flip3 5G',
            'imagen' => 'https://samsungplusnuevo.s3.amazonaws.com/product-family-item-image/normal/product-family-item-image_XrVieldoZA4E8Oj02pMc.png',
            'descripcion' => '	
            Una pantalla en la cobertura que tiene los selfies cubiertos',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6851,
            'id_categoria' => 4,
            'id_sucursal' => 3,
            'id_empresa' => 2,

        ]);   Producto::factory()->create([
            'nombre' => 'Galaxy S22 Ultra',
            'imagen' => 'https://samsungplusnuevo.s3.amazonaws.com/product-family-item-image/normal/product-family-item-image_pW1y72qUA3f9rV46KtDd.png',
            'descripcion' => ' Una pantalla en la cobertura que tiene los selfies cubiertos',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 4,
            'id_sucursal' => 3,
            'id_empresa' => 2,

        ]);   Producto::factory()->create([
            'nombre' => 'Galaxy Z Fold3 5G',
            'imagen' => 'https://samsungplusnuevo.s3.amazonaws.com/product-family-item-image/normal/product-family-item-image_cBKyo8qalFtYm7LkrxpG.png',
            'descripcion' => 'Despliega una nueva forma de mirar',
            'stock' => 30,
            'costo' => 7500,
            'precio' => 11500,
            'id_categoria' => 4,
            'id_sucursal' => 3,
            'id_empresa' => 2,

        ]);   Producto::factory()->create([
            'nombre' => 'Galaxy Note20 Ultra',
            'imagen' => 'https://samsungplusnuevo.s3.amazonaws.com/product-family-item-image/normal/product-family-item-image_csRBhQbEfwFAulzD4pLd.png',
            'descripcion' => '	
            El procesador actualizado proporciona un mejor rendimiento.',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 4,
            'id_sucursal' => 3,
            'id_empresa' => 2,

        ]);   Producto::factory()->create([
            'nombre' => 'Galaxy S22',
            'imagen' => 'https://samsungplusnuevo.s3.amazonaws.com/product-family-item-image/normal/product-family-item-image_DTvfICSkqs0OPizMV25l.png',
            'descripcion' => '	
            El mayor avance en nuestra tecnología de video',
            'stock' => 30,
            'costo' => 3500,
            'precio' => 6500,
            'id_categoria' => 4,
            'id_sucursal' => 3,
            'id_empresa' => 2,

        ]);   Producto::factory()->create([
            'nombre' => 'XIAOMI REDMI NOTE 11',
            'imagen' => 'https://www.tiendaamiga.com.bo/media/catalog/product/cache/deb88dadd509903c96aaa309d3e790dc/e/0/e06828.jpg',
            'descripcion' => 'Espectacular celular Redmi Note 11 ',
            'stock' => 30,
            'costo' => 1500,
            'precio' => 2200,
            'id_categoria' => 4,
            'id_sucursal' => 3,
            'id_empresa' => 2,

        ]);


        //-----------------
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
