<?php

namespace Database\Seeders;

use App\Models\Especialidade;
use App\Models\Medico;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {



        $this->call(EspecialidadeSeeder::class); // Se necessário

        $this->call(HospitalSeeder::class);

        $this->call(MedicoSeeder::class);



        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
