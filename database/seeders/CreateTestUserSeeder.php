<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Hash;

class CreateTestUserSeeder extends Seeder
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
            'firstname' => 'Employee',
            'lastname' => 'User',
           // 'name' => 'Employee User',
            'username' => 'employee',
            'email' => 'employee@admin.com',
            //'password' => Hash::make('password'),
            'password' => 'password',
        ]);


        // testing
        $role = Role::where('name', '=', 'Employee')
        ->get();

        $user->roles()->sync($role);

    
       // $role = Role::create(['name' => 'Admin']);
     
       // $permissions = Permission::pluck('id','id')->all();
   
        //$role->syncPermissions($permissions);
     
       // $user->assignRole([$role->id]);
    }
}
