<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use app\Database\Seeders;
use app\Models\User;
use app\Models\Estandar;
use app\Models\EstandarElemento;
use app\Models\Criterio;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        $this->call(EstandarSeeder::class);
        $this->call(ElementoSeeder::class);
        $this->call(DesProdAhvSeeder::class);
        $this->call(CriterioSeeder::class);


        User::factory(10)->create();
    }
}