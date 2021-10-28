<?php

namespace Database\Factories;

use App\Models\Employees;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employees::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empID'             => $this->faker->numberBetween($min = 1000, $max = 9000),
            'first_name'        => $this->faker->firstName($gender = 'male'|'female'),
            'middle_name'       => $this->faker->lastName(),
            'last_name'         => $this->faker->lastName(),
            'email_address'     => $this->faker->email(),
            'phone_number1'     => $this->faker->tollFreePhoneNumber(),
            'phone_number2'     => $this->faker->tollFreePhoneNumber(),
            'dob'               => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'hire_date'         => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'gender_id'         => $this->faker->numberBetween($min = 1, $max = 2),
            'address'           => $this->faker->secondaryAddress,
            'city'              => $this->faker->state,
            'parish_id'         => $this->faker->numberBetween($min = 1, $max = 14),
            'notes'             => $this->faker->text($maxNbChars = 200),
            'status_code_id'    => $this->faker->numberBetween($min = 1, $max = 8)
        ];
    }
}


