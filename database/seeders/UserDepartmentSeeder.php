<?php

namespace Database\Seeders;

use App\Models\Departments;
use Illuminate\Database\Seeder;

class UserDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Get users from database
        $users = User::all();

            // Attach a role to each user
            Departments::all()->each(function ($department) use ($users) {
                $user->departments()->attach(
                $roles->random(2)->pluck('id') //return 1, 2, 3, 4....
                 // Changing Random attaches more roles to each User
             );
         });
    }
}
