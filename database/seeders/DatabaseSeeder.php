<?php

namespace Database\Seeders;

use App\Models\TransportUnit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        TransportUnit::factory(100)->create([
            'name' => fake()->name(),
            'type' => 'trailer',
        ]);
        TransportUnit::factory(100)->create([
            'name' => fake()->name(),
            'type' => 'truck',
        ]);
    }
}
