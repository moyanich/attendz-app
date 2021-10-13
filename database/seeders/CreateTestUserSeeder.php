<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
            'name' => 'Employee User',
            'email' => 'employee@admin.com',
            //'password' => Hash::make('password'),
            'password' => 'password',
        ]);

    
       // $role = Role::create(['name' => 'Admin']);
     
       // $permissions = Permission::pluck('id','id')->all();
   
        //$role->syncPermissions($permissions);
     
       // $user->assignRole([$role->id]);
    }
}
