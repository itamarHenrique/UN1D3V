<?php

namespace Database\Factories;

use App\Models\Especialidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Especialidade>
 */
class EspecialidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Especialidade::class;
    public function definition(): array
    {
        return [
            "especialidade" => $this->faker->word()
        ];
    }
}
