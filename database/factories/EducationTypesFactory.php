<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EducationTypesFactory extends Factory
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
                'High School',
                'Certificate',
                'Diploma',
                'Associates Degree',
                'Bachelor\'s Degree',
                'Graduate Certificate',
                'Postgraduate Diploma',
                'Masters Degree',
                'Doctoral Degree'
            ])
        ];
    }
}
