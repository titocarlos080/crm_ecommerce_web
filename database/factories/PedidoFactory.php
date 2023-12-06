<?php

namespace Database\Factories;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     protected $model = Pedido::class;

    public function definition()
    {
        return [
            'fecha' => $this->faker->dateTimeThisMonth,
            'id_empresa' => 2,  // Ajusta el valor según tus necesidades
            'id_usuario' => 3, // Ajusta el valor según tus necesidades
            'id_estado_pedido' => 1, // Ajusta el valor según tus necesidades
             
       
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Pedido $pedido) {
            $productos = Producto::inRandomOrder()->limit(rand(4, 8))->get();
            $detallePedido = [];

            foreach ($productos as $producto) {
                $detallePedido[$producto->id] = [
                    'id_pedido'=>$pedido->id,
                    'id_producto'=>$producto->id,
                    'cantidad' => $this->faker->numberBetween(1, 5),
                    'precio_parcial' => $producto->precio * $this->faker->numberBetween(1, 5),
                ];
            }
            $pedido->productos()->attach($detallePedido);
             // como estado las indignante de las misma forma comun de las cosas  

        });
    }
}
