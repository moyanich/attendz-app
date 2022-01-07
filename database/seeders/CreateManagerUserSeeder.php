<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Hash;

class CreateManagerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            //'name' => 'ManagerAdmin',
            'employee_id' => '40101',
            'firstname' => 'Manager',
            'lastname' => 'User',
            'username' => 'manager',
            'email' => 'managertest@admin.com',
            //'password' => Hash::make('password'),
            'password' => 'password',
        ]);

        //$user->roles()->sync([1, 2, 3]); // works

        // testing
        $role = Role::where('name', '=', 'Manager')
        ->get();

        $user->roles()->sync($role);
    }
}
