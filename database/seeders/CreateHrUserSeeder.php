<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Hash;

class CreateHrUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            //'name' => 'HR User',
            'firstname' => 'HR',
            'lastname' => 'User',
            'username' => 'hr',
            'email' => 'hr@admin.com',
            'password' => 'password',
        ]);

        $role = Role::where('name', '=', 'HR')
        ->get();

        $user->roles()->sync($role);
    }
}
