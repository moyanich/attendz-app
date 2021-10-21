<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\Role::factory(4)->create();

        DB::table('roles')->insert([
            'name' => 'Admin'
        ]);

        DB::table('roles')->insert([
            'name' => 'Super User'
        ]);

        DB::table('roles')->insert([
            'name' => 'Employee'
        ]);

        DB::table('roles')->insert([
            'name' => 'Supervisor'
        ]);

        DB::table('roles')->insert([
            'name' => 'Manager'
        ]);

        DB::table('roles')->insert([
            'name' => 'Security'
        ]);

    }
}
