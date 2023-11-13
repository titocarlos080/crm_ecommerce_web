<?php

namespace Database\Factories;

use App\Models\Permiso;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PermisoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Permiso::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word
        ];
    }
}
