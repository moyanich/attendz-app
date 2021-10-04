<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;


class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get roles from database
        $roles = Role::all();

        // Attach a role to each user
        User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(2)->pluck('id') //return 1, 2, 3, 4....
                // Changing Random attaches more roles to each User
            );
        });

    }
}
