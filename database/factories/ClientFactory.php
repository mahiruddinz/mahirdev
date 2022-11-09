<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'number_phone' => rand(1000000,5000000),
            'address' => 'Jl. Indraloka 1 No 17',
            'created_at' => now()
        ];
    }
}
