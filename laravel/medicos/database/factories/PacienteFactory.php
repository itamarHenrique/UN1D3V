<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'cpf' => $this->gerarCpf()
        ];
    }


    private function gerarCpf()
    {
        return str_pad(rand(0, 99999999999), 11, '0', STR_PAD_LEFT);
    }
}
