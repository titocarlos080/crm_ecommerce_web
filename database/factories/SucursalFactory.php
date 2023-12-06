<?php

namespace Database\Factories;

use App\Models\Sucursal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sucursal>
 */
class SucursalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Sucursal::class;

    public function definition(): array
    {
        return [
            'nombre'=> $this->faker->company(),
             'id_empresa'=> $this->faker->numberBetween(1, 10),
            //
        ];
    }
    public function empresa2()
    {
        return $this->state([
            'id_empresa' => 2,
            
        ]);
    }
}
