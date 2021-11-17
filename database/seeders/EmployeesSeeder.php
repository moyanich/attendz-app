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
            'id' => '101',
            'firstname' => 'Admin',
            'lastname' => 'User',
            'email' => 'test@admin.com',
        ]);

        DB::table('employees')->insert([
            'id' => '102',
            'firstname' => 'HR',
            'lastname' => 'User',
            'email' => 'hr@admin.com',
        ]);

        DB::table('employees')->insert([
            'id' => '103',
            'firstname' => 'Manager',
            'lastname' => 'User',
            'email' => 'managertest@admin.com',
        ]);

        DB::table('employees')->insert([
            'id' => '104',
            'firstname' => 'Employee',
            'lastname' => 'User',
            'email' => 'employee@admin.com',
        ]);
    }
}
