<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Plan::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'precio' => $this->faker->randomFloat(2, 10, 1000), // Precio aleatorio
            'logo' => $this->faker->imageUrl(), // URL de imagen aleatoria
            'almacenamiento' => $this->faker->text(20),
            'ancho_de_banda' => $this->faker->text(20),
            'dominio' => $this->faker->boolean,
            'usuarios' => $this->faker->numberBetween(1, 100),
            'soporte_por_correo' => $this->faker->boolean,
            'soporte_24x7' => $this->faker->boolean,
        ];
    }
}
