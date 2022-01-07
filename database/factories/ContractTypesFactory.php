<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContractTypesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Contract',
                'Temporary',
                'Full-Time',
                'Part-Time'
            ]),
            'description'   => $this->faker->text($maxNbChars = 200),
        ];
    }
}
