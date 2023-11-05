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
        
        return [
            'nombre' => 'Tito Carlos',
            'email' => 'proyectostito12@gmail.com',
            'foto' => '/assets/images/users/adm_proyecto.jpg',
            'telefono' => '72465939',
            'password' => '$2y$10$rBxTIT8OiLpYoE6k2yML9eWLbmWPnwNuU5d4Ed29mrsC9o52HuVYa',
            'id_rol' => 1,
            'id_empresa' => 1,
        ];
    }
}
