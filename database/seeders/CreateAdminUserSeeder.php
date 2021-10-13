<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
            'name' => 'Admin',
            'email' => 'test@admin.com',
            //'password' => Hash::make('password'),
            'password' => 'password',
        ]);

    
       // $role = Role::create(['name' => 'Admin']);
     
       // $permissions = Permission::pluck('id','id')->all();
   
        //$role->syncPermissions($permissions);
     
       // $user->assignRole([$role->id]);
    }
}
