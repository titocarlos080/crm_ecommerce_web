<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Empresa::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'descripcion' => $this->faker->sentence,
            'id_plan' => $this->faker->numberBetween(1, 10), // Ajusta el rango según tus necesidades
            'logo' => '/assets/images/users/logo_empresa.png', // Cambia esto a la ruta deseada para el logo
        ];
    }
}
