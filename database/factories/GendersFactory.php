<?php

namespace Database\Factories;

use App\Models\Genders;
use Illuminate\Database\Eloquent\Factories\Factory;

class GendersFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Genders::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Male',
                'Female'
            ]),
            'retirementYears' => $this->faker->unique()->randomElement([
                '65',
                '60'
            ])
        ];
    }
}
