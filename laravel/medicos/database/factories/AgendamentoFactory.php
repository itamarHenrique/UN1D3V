<?php

namespace Database\Factories;

use App\Models\Horario;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AgendamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "paciente_id" => Paciente::inRandomOrder()->first(),
            "horario_id" => Horario::inRandomOrder()->first(),
            "descricao" => $this->faker->text(),
            "status" => $this->faker->randomElement(['Sim', 'Não'])
        ];
    }
}
