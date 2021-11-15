<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Employees::factory(10)->create();

        $this->faker = Faker::create();
        
        DB::table('employees')->insert([
            'id' => $this->faker->randomDigit(),
            'firstname' => 'Admin',
            'lastname' => 'User',
            'email' => 'test@admin.com',
        ]);
    }
}
