<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
                $roles->random(1)->pluck('id') //return 1, 2, 3, 4....
                // Changing Random attaches more roles to each User
            );
        });


        DB::table('role_user')->where('user_id', 11)->update(['role_id' => 1]);
        DB::table('role_user')->where('user_id', 12)->update(['role_id' => 6]);
        DB::table('role_user')->where('user_id', 13)->update(['role_id' => 2]);
        DB::table('role_user')->where('user_id', 14)->update(['role_id' => 4]);

    }
}
