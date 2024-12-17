<?php

namespace Database\Factories;

use App\Enums\TransportUnitType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransportUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'type' => fake()->randomElement(TransportUnitType::getAllowedTypes()),
        ];
    }

}
