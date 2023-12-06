<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Usuario::class;
    public function definition(): array
    {
        $idEmpresa = $this->faker->randomElement([1, 2]);
        return [
            'nombre' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'foto' => $this->faker->imageUrl(),
            'telefono' => $this->faker->phoneNumber,
            'password' => bcrypt($this->faker->password),
            'id_rol' => $this->faker->numberBetween(1, 3), // Cambia según tus necesidades
            'id_empresa' => $idEmpresa,
        ];
    }
    // Nuevo estado para establecer id_empresa a 2
    public function empleados()
    {
        return $this->state([
            'id_empresa' => 2,
            'id_rol' => 3,
        ]);
    }
    public function clientes()
    {
        return $this->state([
            'id_empresa' => 2,
            'id_rol' => 4,
        ]);
    }
}
