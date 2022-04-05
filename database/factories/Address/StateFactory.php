<?php

namespace Database\Factories\Address;

use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->state(),
            'uf' => $this->faker->unique()->stateAbbr()
        ];
    }
}
