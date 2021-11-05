<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Hash;


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
        $user = User::create([
            //'name' => 'Admin',
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
