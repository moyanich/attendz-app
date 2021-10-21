<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Hash;

class CreateSuperUserSeeder extends Seeder
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
            'name' => 'SuperAdmin',
            'email' => 'supertest@admin.com',
            //'password' => Hash::make('password'),
            'password' => 'password',
        ]);

        //$user->roles()->sync([1, 2, 3]); // works

        // testing
        $role = Role::where('name', '=', 'Superuser')
        ->get();

        $user->roles()->sync($role);
    }
}
