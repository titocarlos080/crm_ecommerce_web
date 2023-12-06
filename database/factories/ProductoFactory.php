<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Producto;
use App\Models\Sucursal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Producto::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'imagen' => $this->faker->imageUrl(),
            'descripcion' => $this->faker->sentence,
            'stock' => $this->faker->randomDigitNotNull(2, 1, 1000),
            'costo' => $this->faker->randomFloat(2, 1, 1000),
            'precio' => $this->faker->randomFloat(2, 1, 1000),
            'id_categoria' =>2 ,
            'id_sucursal' => 2 ,
            'id_empresa' => 2 ,
            
        ];
    }
    public function empresa2($sucursal,$categoria)
    {
        return $this->state([
            'id_sucursal' => $sucursal,
            'id_categoria' =>$categoria ,
            'id_empresa' => 2 ,
            
        ]);
    }
}
