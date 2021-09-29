<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\User::factory(5)->create();

       $this->call([
            CalendarSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            CreateAdminUserSeeder::class,
            CreateTestUserSeeder::class,
            
            /* PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            EmployeeSeeder::class,
            GenderSeeder::class,
            ParishSeeder::class,
            DepartmentsSeeder::class,
            RetirementSeeder::class,
            StatusCodeSeeder::class,
            JobsSeeder::class,
            SettingsSeeder::class,
            ContractsSeeder::class,
            
            LeaveTypesSeeder::class,

            //JobTableSeeder::class,
            //EmployeeEmploymentSeeder::class, */
            
        ]);
    }
}
