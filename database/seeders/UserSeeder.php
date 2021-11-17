<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory(10)->create();
        
       User::create([
            'employee_id' => '101',
            'firstname' => 'Admin',
            'lastname' => 'User',
            'username' => 'admin',
            'email' => 'test@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        User::create([
            'employee_id' => '102',
            'firstname' => 'HR',
            'lastname' => 'User',
            'username' => 'hr',
            'email' => 'hr@admin.com',
            'password' => 'password',
        ]);
       
        User::create([
            'employee_id' => '103',
            'firstname' => 'Manager',
            'lastname' => 'User',
            'username' => 'manager',
            'email' => 'managertest@admin.com',
            'password' => 'password',
        ]);

        User::create([
            'employee_id' => '104',
            'firstname' => 'Employee',
            'lastname' => 'User',
            'username' => 'employee',
            'email' => 'employee@admin.com',
            'password' => 'password',
        ]);



       

       /* 

        \App\Models\Users::factory(10)->create();

        */

        
    }
}
