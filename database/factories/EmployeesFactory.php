<?php

namespace Database\Factories;

use App\Models\Employees;
use App\Models\Genders;
use Illuminate\Database\Eloquent\Factories\Factory;
//use App\Models\User;

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
        //$users = User::all()->pluck('id')->toArray();

        return [
            'id'                => $this->faker->numberBetween($min = 1000, $max = 9000),
            'firstname'         => $this->faker->firstName($gender = 'male'|'female'),
            'middlename'        => $this->faker->lastName(),
            'lastname'          => $this->faker->lastName(),
            'email'             => $this->faker->email(),
            'private_email'     => $this->faker->email(),
            'phone_number'      => $this->faker->tollFreePhoneNumber(),
            'emergency_number'  => $this->faker->tollFreePhoneNumber(),
            'date_of_birth'     => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
            'hire_date'         => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'gender_id'         => Genders::all()->random(), // Get the data from the the Genders Table
            'current_address'   => $this->faker->secondaryAddress,
            'city'              => $this->faker->state,
            'parish_id'         => $this->faker->numberBetween($min = 1, $max = 14),
            'notes'             => $this->faker->text($maxNbChars = 200),
            'status_id'         => $this->faker->numberBetween($min = 1, $max = 8),
        ];
    }
}


