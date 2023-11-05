<?php

namespace Database\Factories;

use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rol>
 */
class RolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Rol::class;

    public function definition():array
    {
        return [
            'nombre' => $this->faker->word, // Puedes ajustar el generador de palabras según tus necesidades
            'id_empresa' => 1, // Asegúrate de establecer el ID de la empresa correctamente
        ];
    }
}
