<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Employees;
use Hash;
use Faker\Factory as Faker;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->faker = Faker::create();

        $user = Employees::create([
            //'name' => 'Admin',
            'employee_id' => $this->faker->randomDigit(),
            'firstname' => 'Admin',
            'lastname' => 'User',
            'username' => 'admin',
            'email' => 'test@admin.com',
            //'password' => Hash::make('password'),
            'password' => 'password',
        ]);

        //$user->roles()->sync([1, 2, 3]); // works

        // testing
        $role = Role::where('name', '=', 'Admin')
        ->get();

        $user->roles()->sync($role);


        $role = Role::create(['name' => 'Admin']);

        //dd($role);
     
       // $permissions = Permission::pluck('id','id')->all();
   
        //$role->syncPermissions($permissions);
     
       // $user->assignRole([$role->id]);

       //$user->roles()->attach($role->id); */


        //$role = Role::create(['name' => 'Admin']);
     
        //$role = Role::pluck('id','id')->all();

   
        //$role->sync($role);

        //

        
     
       // $user->assignRole([$role->id]);
    }
}
