<?php

namespace Database\Factories;

use App\Models\StatusCodes;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusCodesFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StatusCodes::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Inactive',
                'Active',
                'New',
                'Expired',
                'Cancelled',
                'Approved',
                'Not Approved',
                'Pending'
            ])
        ];
    }
}
