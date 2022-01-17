<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LeaveManagementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'            => $this->faker->unique()->randomElement([
                'Sick Leave',
                'Vacation',
                'Maternity Leave',
            ]), 
            'allottedDays'          => $this->faker->numberBetween($min = 1, $max = 7),
            'minServiceDays'        => $this->faker->numberBetween($min = 1, $max = 120),
            'maxDaysAllowed'        => $this->faker->numberBetween($min = 1, $max = 5),
            'description'           => $this->faker->text($maxNbChars = 200),
            'status_id'             => $this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}
