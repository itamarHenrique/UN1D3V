<?php

namespace Database\Factories;

use App\Models\Especialidade;
use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        "hospital_id" => Hospital::inRandomOrder()->first(),
        "especialidade_id" => Especialidade::inRandomOrder()->first(),
        "nome" => $this->faker->name()
        ];
    }
}
