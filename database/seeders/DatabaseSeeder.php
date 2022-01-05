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
        //\App\Models\User::factory(11)->create();

       $this->call([
            CalendarSeeder::class,
            GendersSeeder::class,
            ParishesSeeder::class,
            DepartmentsSeeder::class,
            EmployeesSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            RoleUserSeeder::class,
            EducationTypesSeeder::class,
            StatusCodesSeeder::class,
            JobsSeeder::class,
        
            
          /* 
            //CreateAdminUserSeeder::class,
            //CreateTestUserSeeder::class,
           // CreateManagerUserSeeder::class,
           // CreateHrUserSeeder::class,
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            EmployeeSeeder::class,
            
            
           
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
