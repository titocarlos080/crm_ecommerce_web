<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Sucursal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Categoria::class;

    public function definition()
    {

        return [
            'nombre' => $this->faker->word,
            'id_sucursal' =>$this->faker->numberBetween(1, 10),
            'id_empresa' =>2,
        ];
    }
    public function empresa2($sucursal)
    {
        return $this->state([
            'id_empresa' => 2,
            'id_sucursal'=> $sucursal
        ]);
    }
}
