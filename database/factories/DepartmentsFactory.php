<?php

namespace Database\Factories;

use App\Models\Departments;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Departments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->unique()->randomElement([
                'Accounts',
                'Manufacturing',
                'Administration',
                'Information Technology'
            ]),
            'description' => $this->faker->text($maxNbChars = 200)
        ];
    }
}
