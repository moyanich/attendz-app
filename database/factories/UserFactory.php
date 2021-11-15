<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Employees;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        //$collection = Employees::select('id')->get()->toArray();

        //dd($collection);

        $employees = Employees::all();
        dd($employees);
    
       /* foreach ($employees as $employee) {
            Attendance::create([
                'employee_id' => $employee->id,
                'date' => Carbon::today(), 
                'atten_count' => .... ,
            ]);
        } */


        return [
           // 'name' => $this->faker->name(),
            'employee_id' => $collection->random(), 

            'firstname' => $this->faker->firstName($gender = null|'male'|'female'),
            'lastname' => $this->faker->lastName(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
           // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

            'password' => 'password',
            'remember_token' => Str::random(10),
           
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
